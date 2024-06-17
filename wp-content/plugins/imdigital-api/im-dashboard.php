<?php 
namespace InvestmentMastery;

class InvestmentMasteryDashboard extends InvestmentMastery{

    static function get_stock_details(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
        $token  = "LXSXxPeHq8iF2g2yaKAEpkzddpaZ_ZgS";

        $commodityStocks = array("XAU - Gold Commodity", "XAG - Silver Commodity", "Copper - Copper Commodity", "USOIL - WTI Crude Oil", "UKOIL - Brent Crude Oil");

        if( $request->get_param("action") == "ticker_all_details" ){
            $response = [];
            if(!empty($user_id)){
                if( !empty($request->get_param("symbol")) && $request->get_param("symbol") != ''){
                   
                    if (in_array($request->get_param("label"), $commodityStocks)) {

                        $response = self::get_commodity($request->get_param("label"), $request->get_param("currency"));                       

                    } else {
                        //echo "in ELSE";
                        $conversion = 1;
                        if( $request->get_param("currency") != 'USD'){
                            //echo "+++++++++++++++";
                            $conversion = json_decode( file_get_contents('https://api.polygon.io/v2/aggs/ticker/C:USD'.$request->get_param("currency").'/prev?adjusted=true&apiKey='.$token),true)['results'][0]['c'];
                           // echo "conversion======>".$conversion ;
                            //$conversion = json_decode( file_get_contents('https://api.polygon.io/v1/last_quote/currencies/'.$request->get_param("currency").'/USD?apiKey='.$token),true)['last'][0]['bid'];
                        }

                        //$url = 'https://api.polygon.io/v2/aggs/ticker/'.$request->get_param("symbol").'/prev?adjusted=false&apiKey='.$token;

                        $url = 'https://api.polygon.io/v2/aggs/ticker/'.$request->get_param("symbol").'/range/1/day/'.date('Y-m-d', strtotime('- 7 days')).'/'.date('Y-m-d').'?adjusted=true&sort=desc&limit=7&apiKey='.$token;
                        //echo "URL 7 days======>".$url ;
                        $json = self::get_curl($url);
                        $data = json_decode($json,true);
                        
                        $open = round($data['results'][0]['o'] * $conversion, 2);
                        $preclose = round($data['results'][1]['c'] * $conversion, 2);
                        $close = round($data['results'][0]['c'] * $conversion, 2);
                        $change_per = '';

                        $amt_diffreace =   $close - $preclose;
                        if($close && $preclose){
                            $result = ( ($close - $preclose) / $preclose ) * 100;
                        }else{
                            $result = 0;
                        }
            
                        $today_date = date('Y-m-d');

                        //last three months high
                        $from_date = date('Y-m-d', strtotime($today_date. ' - 3 months'));

                        $url = 'https://api.polygon.io/v2/aggs/ticker/'.$request->get_param("symbol").'/range/120/month/'.$from_date.'/'.$today_date.'?adjusted=true&sort=asc&limit=120&apiKey='.$token;
                        //echo "URL 52 week======>".$url ;
                        $json_52_week = self::get_curl($url);
                        
                        $data2 = json_decode($json_52_week,true);

                        $WeekHigh_52 = round($data2['results'][0]['h'] * $conversion, 2);

                        global $wpdb;
                        if(!empty($data)){     
                            $wpdb->insert('clubs_ticker', [
                                'user_id' => $user_id,   
                                'symbol' => $request->get_param("symbol"),
                                'currency' => $request->get_param("currency"),
                                'price' => $close,
                                'last_high' => $WeekHigh_52,
                                'type' => 'stock'
                            ],
                            ['%d','%s','%s','%s','%s','%s']);
                            $ticker_id = $wpdb->insert_id;
                        }

                        $response = array('status'=>200,'open'=>$open,'price'=>$close,'change24hour'=>round($amt_diffreace,2),'changepct24hour'=>round($result,2).'%','last_high'=>$WeekHigh_52,'high'=>round($high,2));
                    }

                    

                    
                }
            }
            $response = new \WP_REST_Response($response);
            return $response;
        }else if( $request->get_param("action") == "get_ticker" ){
            $response = [];
            if(!empty($request->get_param("term")) && $request->get_param("term") != '' ) {
                $url = 'https://api.polygon.io/v3/reference/tickers?type=CS&search='.strtoupper($request->get_param("term")).'&active=true&sort=ticker&order=asc&limit=50&apiKey='.$token;
                
                $json = self::get_curl($url);
                
                $data = json_decode($json,true);
                
                $cnt = 1;

                /* poonam added 17apr*/
                $ag_ticker = array(); 
                foreach($data['results'] as $row)
                {
                    if ($row['ticker'] == strtoupper($request->get_param("term"))) {
                        $other_tickers[] = $row;
                    }                    
                }

                foreach($data['results'] as $row)
                {
                    if ($row['ticker'] != strtoupper($request->get_param("term"))) {
                        $other_tickers[] = $row;
                    }                    
                }

                array_push($ag_ticker, $other_tickers);
                /*end poonam added 17apr*/

                // foreach($data['results'] as $row)
                // {
                //     $response[$cnt]["value"] = $row['ticker'];
                //     $response[$cnt]["label"] = $row['ticker'].' - '.$row['name'];

                //     $cnt++;
                // }

                foreach($ag_ticker[0] as $row)
                {
                    $response[$cnt]["value"] = $row['ticker'];
                    $response[$cnt]["label"] = $row['ticker'].' - '.$row['name'];

                    $cnt++;
                }


                foreach($commodityStocks as $row1)
                {
                    $pos = stripos($row1, $request->get_param("term"));

                    if ($pos !== false) {    
                    $sName = explode(" - ", $row1);                  
                        $response[$cnt]["value"] = $sName[0];
                        $response[$cnt]["label"] = $row1;
                        $cnt++;
                    }
                }
            }
            $response = new \WP_REST_Response($response);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }
        

    }
    static function get_crypto_details(  \WP_REST_Request $request ){ 
        $user_id = parent::pb_auth_user($request);
        $referer = 'investment-mastery';
        $agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)";
        $last_high = 0;
        if( $request->get_param("action") == "ticker_all_details" ){
            if(!empty($user_id)){
                if( !empty($request->get_param("symbol")) && $request->get_param("symbol") != ''){

             /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/       
                 $url_price = "https://api.coinbase.com/v2/prices/".$request->get_param("symbol").'-'.$request->get_param("currency")."/spot"; 
                   // https://api.coinbase.com/v2/prices/BTC-USD/spot
                $ch_price = curl_init();   
                curl_setopt($ch_price, CURLOPT_RETURNTRANSFER, 1);   
                curl_setopt($ch_price, CURLOPT_URL, $url_price);   
                $res_price = curl_exec($ch_price); 
                curl_close($ch_price);
                $data_live = json_decode($res_price,true);
                   
            /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/              
                      
                
                 if($data['price'] == 0 )
                 {       

                    $url = 'https://crons.investment-mastery.co/quote/'.$request->get_param("symbol").'/'.$request->get_param("currency");
                    $ticker_req = self::get_curl($url, $referer);
                    
                    /*echo "<pre>";
                    print_r($ticker_req);
                    exit;*/

                    $data = json_decode($ticker_req, true)['data'];
                 }
                    /*-- Added This condition if we dont have result with USD --*/
                    /*-- Added On 21 Feb 2023 --*/
                    /*-- START --*/
                    if($data['price'] == 0 || $data['last_high'] == 0) {
                        if($request->get_param("currency") == "USD") {
                            $url = 'https://crons.investment-mastery.co/quote/'.$request->get_param("symbol").'/USDT';
                            $ticker_req2 = self::get_curl($url, $referer);

                            $data = json_decode($ticker_req2, true)['data'];
                        }

                    }
                    /*-- END --*/
                    
                    global $wpdb;
                    if( empty($data) || $data['status'] == 500){
                        $url = 'https://edu.investment-mastery.com/crypto/getprices/?symbol='.$request->get_param("symbol").'&currency='.$request->get_param("currency");
                        $ticker_req = self::get_curl($url, $referer);
                        $data_min = json_decode($ticker_req, true)['data'][$request->get_param("symbol")]['quote'][$request->get_param("currency")];

                        $data = array();
                        $data['status'] == 200;
                        $data = array('status' => 200, 'price' => $data_min['price'], 'change24hour' => $data_min['change24hour'], 'changepct24hour' => $data_min['changepct24hour'].'%', 'last_high' => $data_min['last_high'],'high' => $data_min['last_high']);
                    }

                     if( !empty($request->get_param("calc_type")) && $request->get_param("calc_type") == 'CMC' ){

                        $url = 'https://api.polygon.io/v1/indicators/rsi/X:'.$request->get_param("symbol").''.$request->get_param("currency").'?timespan=hour&window=14&series_type=close&order=desc&limit=1&apiKey=G7JEnL4VzbcFm05KFS86XhBBXWKYu80l';
                        
                        $rsi_val = self::get_curl($url, $referer);                        

                        $rsi_data = json_decode($rsi_val, true)['results']['values'][0];

                        $last_high = $rsi_data['value'];

                        if($last_high == '' || $last_high == 0) {
                            $url = 'https://api.polygon.io/v1/indicators/rsi/X:'.$request->get_param("symbol").'USD?timespan=hour&window=14&series_type=close&order=desc&limit=1&apiKey=G7JEnL4VzbcFm05KFS86XhBBXWKYu80l';
                        
                            $rsi_val = self::get_curl($url, $referer);                        

                            $rsi_data = json_decode($rsi_val, true)['results']['values'][0];

                            $last_high = $rsi_data['value'];
                        }
                        $data['last_high'] = number_format($rsi_data['value'], 4);
                        /*echo "Last high as RSI value == ".$last_high;
                        echo "<pre>";
                        print_r($rsi_data);
                        exit;*/
                    }
                     /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/ 
                    if($data_live['data']['amount']!=0){
                            /*If live price available put it here*/
                            $data['price']      ='';
                            if($data_live['data']['amount']>1){
                            $data['price']      = number_format($data_live['data']['amount'],2,'.','');
                            }else{
                                 $data['price']      = number_format($data_live['data']['amount'],6,'.','');
                            }
                            
                    }
                     /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/ 
                   //echo '<pre>'; print_r( $data);
                    if($data['status'] == 200){
                        $wpdb->insert('clubs_ticker', [
                            'user_id' => $user_id,   
                            'symbol' => $request->get_param("symbol"),
                            'currency' => $request->get_param("currency"),
                            'price' => $data['price'],
                            'last_high' => $data['last_high'],
                            'type' => 'crypto'
                        ],
                        ['%d','%s','%s','%s','%s','%s']);
                        $ticker_id = $wpdb->insert_id;
                    }
                }
            }
            $response = new \WP_REST_Response($data);
            return $response;
        }else if( $request->get_param("action") == "get_ticker" ){
            $response = [];
            if(!empty($request->get_param("term")) && $request->get_param("term") != '' ) {
                $url = 'https://crons.investment-mastery.co/ticker/'.strtolower($request->get_param("term"));
                $ticker_req = self::get_curl($url, $referer); 
            }
            // echo "TICKE";
            // print_r($ticker_req);
            $response = new \WP_REST_Response(json_decode($ticker_req, true)['data']);
            return $response;
        
        }else if( $request->get_param("action") == "get_quote_currency" ){
            $response = [];
            if(!empty($request->get_param("term")) && $request->get_param("term") != '' ) {
                $url = 'https://crons.investment-mastery.co/quote_currency/'.$request->get_param("base_currency").'/'.strtolower($request->get_param("term"));
                $ticker_req = self::get_curl($url, $referer); 
            }
            $response = new \WP_REST_Response(json_decode($ticker_req, true)['data']);
            return $response;
        }else if( $request->get_param("action") == "get_single_quote_currency" ){
            $response = [];
            
                $url = 'https://crons.investment-mastery.co/single_quote_currency/'.$request->get_param("base_currency");
                $ticker_req = self::get_curl($url, $referer); 
            
            $response = new \WP_REST_Response(json_decode($ticker_req, true)['data']);
            return $response;
        }else{
            return new \WP_REST_Response('Unauthorized', 401);
        }

    }

    static function get_curl($url, $referer='') {
       
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if( $referer ){
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }


    static function get_commodity($label, $currency) {
        // echo "DFDFFFF";
        // echo $label;
        $commodityStocks = array("XAU - Gold Commodity", "XAG - Silver Commodity", "Copper - Copper Commodity", "USOIL - WTI Crude Oil", "UKOIL - Brent Crude Oil");
        $apiKey = 'CQYJMIKEKRIP18WO';
        $sName = explode(" - ", $label);

        /*https://commodities-api.com/api/latest?access_key=580eczgb2uubtdnmcy177bewwsdi6ikll1k7qnvd16w6hek0edscafh0g8j4&base=USD&symbols=WTIOIL%2CBRENTOIL%2CXAU%2CXAG%2CXCU*/
    
        /*poonam modified 7may*/
        if($sName[0] == "XAU" || $sName[0] == "XAG" || $sName[0] == "Copper") {
            /*$apiEndpoint = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency='.$sName[0].'&to_currency='.$currency.'&apikey=' . $apiKey;
            $response = file_get_contents($apiEndpoint);

            $data = json_decode($response, true);

            $price = round($data['Realtime Currency Exchange Rate']['5. Exchange Rate'], 2);
            $open = round($data['Realtime Currency Exchange Rate']['8. Bid Price'], 2);
            $WeekHigh_52 = round($data['Realtime Currency Exchange Rate']['9. Ask Price'], 2);

            $response = array('status'=>200,'open'=>$open,'price'=>$price,'change24hour'=>'2.345','changepct24hour'=>'0.69%','last_high'=>$WeekHigh_52,'high'=>round($WeekHigh_52,2));
            return $response;*/

            $name = '';
            if($sName[0] == "XAU") {
                $name = 'ZG';
            } 
            if($sName[0] == "XAG") {
                $name = 'SI';
            }

            if($sName[0] == "Copper"){
                $sName[0] = 'HG';
            }

            $apiEndpoint = 'https://financialmodelingprep.com/api/v3/quote/'.$sName[0].''.$currency.'?apikey=058731c1df70beb5685d17ad5f6dc64c';            
          
            $response = file_get_contents($apiEndpoint);

            $data = json_decode($response, true);

            $price = round($data[0]['price'], 2);
            $open = round($data[0]['open'], 2);
            $WeekHigh_52 = round($data[0]['priceAvg50'], 2);

            $response = array('status'=>200,'open'=>$open,'price'=>$price,'change24hour'=>'2.345','changepct24hour'=>'0.69%','last_high'=>$WeekHigh_52,'high'=>round($WeekHigh_52,2));

           
            return $response;
        }
        /*poonam added 7may*/
        if($sName[0] == "USOIL" || $sName[0] == "UKOIL") {
            $interval = "1week";
            $apikey = "09cdde758034403c879911287ea8ce98";

            if($sName[0] == "USOIL") {               
                $apiEndpoint ='https://api.twelvedata.com/time_series?symbol=WTI/USD&interval='. $interval.'&apikey='.$apikey;
            } else if($sName[0] == "UKOIL") {
                $apiEndpoint ='https://api.twelvedata.com/time_series?symbol=XBR/USD&interval='. $interval.'&apikey='.$apikey;
            } 
            
            $response1 = file_get_contents($apiEndpoint);

            $data = json_decode($response1, true);                       
           
            if (!empty($data) && isset($data['values'])) {
                $values = $data['values'];

                // Filter values for the last 3 months
                $threeMonthsAgo = strtotime('-3 months');
                $filteredValues = array_filter($values, function($item) use ($threeMonthsAgo) {
                    return strtotime($item['datetime']) >= $threeMonthsAgo;
                });

                $highValues = array_column($filteredValues, 'high');
                $maxHighValue = max($highValues);
                //echo "The maximum high value in the last 3 months is: $maxHighValue";
            } else {
                //echo "Error: No data found or invalid response.";
            }

            $price = $data['values'][0]['high'];
            $open = $data['values'][0]['open'];
            // $high_return = $data['data'][0]['value'];
            // $high = $high_return+20;
            $changehour = 1.23;
            $changepcthour = 0.0132;

            $response = array('status'=>200,'open'=>$open,'price'=>$price,'change24hour'=>$changehour,'changepct24hour'=>$changepcthour,'last_high'=>$maxHighValue,'high'=>$maxHighValue);               
            return $response;
        }
        /*end poonam added 7may*/




        // if($sName[0] == "USOIL" || $sName[0] == "UKOIL" || $sName[0] == "Copper") {

        //     if($sName[0] == "USOIL") {
        //         $apiEndpoint = 'https://www.alphavantage.co/query?function=WTI&interval=daily&apikey=' . $apiKey;
        //         // echo "apiEndpoint";
        //         // print_r($apiEndpoint);DSRS3CBSDW8HDKIK
        //     } else if($sName[0] == "UKOIL") {
        //         $apiEndpoint = 'https://www.alphavantage.co/query?function=BRENT&interval=daily&apikey=' . $apiKey;
        //     } else if($sName[0] == "Copper") {
        //         $apiEndpoint = 'https://www.alphavantage.co/query?function=COPPER&interval=daily&apikey=' . $apiKey;
        //     }
            
        //     $response1 = file_get_contents($apiEndpoint);

        //     $data = json_decode($response1, true);

        //     if($sName[0] == "Copper") {
        //         $price = $data['data'][0]['value'] / 2000;
        //         $open = $data['data'][0]['value'] / 2000;
        //         $high_return = $data['data'][0]['value'] / 2000;
        //         $high = $high_return+20;
        //     } else {
        //         $price = $data['data'][0]['value'];
        //         $open = $data['data'][0]['value'];
        //         $high_return = $data['data'][0]['value'];
        //         $high = $high_return+20;
        //     }            
        //     $changehour = 1.23;
        //     $changepcthour = 0.0132;

        //     $response = array('status'=>200,'open'=>number_format($open, 2),'price'=>number_format($price, 2),'change24hour'=>$changehour,'changepct24hour'=>$changepcthour,'last_high'=>number_format($high, 2),'high'=>number_format($high, 2));
          
        //     return $response;
        // }        

    }

}    