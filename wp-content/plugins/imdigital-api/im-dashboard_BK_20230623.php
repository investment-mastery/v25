<?php 
namespace InvestmentMastery;

class InvestmentMasteryDashboard extends InvestmentMastery{

    static function get_stock_details(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
        $token  = "LXSXxPeHq8iF2g2yaKAEpkzddpaZ_ZgS";
        if( $request->get_param("action") == "ticker_all_details" ){
            $response = [];
            if(!empty($user_id)){
                if( !empty($request->get_param("symbol")) && $request->get_param("symbol") != ''){
                    
                    $conversion = 1;
                    if( $request->get_param("currency") != 'USD'){
                        $conversion = json_decode( file_get_contents('https://api.polygon.io/v2/aggs/ticker/C:USD'.$request->get_param("currency").'/prev?adjusted=true&apiKey='.$token),true)['results'][0]['c'];

                        //$conversion = json_decode( file_get_contents('https://api.polygon.io/v1/last_quote/currencies/'.$request->get_param("currency").'/USD?apiKey='.$token),true)['last'][0]['bid'];
                    }

                    //$url = 'https://api.polygon.io/v2/aggs/ticker/'.$request->get_param("symbol").'/prev?adjusted=false&apiKey='.$token;

                    $url = 'https://api.polygon.io/v2/aggs/ticker/'.$request->get_param("symbol").'/range/1/day/'.date('Y-m-d', strtotime('- 7 days')).'/'.date('Y-m-d').'?adjusted=true&sort=desc&limit=7&apiKey='.$token;
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
            $response = new \WP_REST_Response($response);
            return $response;
        }else if( $request->get_param("action") == "get_ticker" ){
            $response = [];
            if(!empty($request->get_param("term")) && $request->get_param("term") != '' ) {
                $url = 'https://api.polygon.io/v3/reference/tickers?type=CS&search='.$request->get_param("term").'&active=true&sort=ticker&order=asc&limit=50&apiKey='.$token;
                $json = self::get_curl($url);
                
                $data = json_decode($json,true);
                $cnt = 1;
                foreach($data['results'] as $row)
                {
                    $response[$cnt]["value"] = $row['ticker'];
                    $response[$cnt]["label"]=$row['ticker'].' - '.$row['name'];

                    $cnt++;
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
        if( $request->get_param("action") == "ticker_all_details" ){
            if(!empty($user_id)){
                if( !empty($request->get_param("symbol")) && $request->get_param("symbol") != ''){
                    $url = 'https://crypto.investment-mastery.co/quote/'.$request->get_param("symbol").'/'.$request->get_param("currency");
                    $ticker_req = self::get_curl($url, $referer);

                    //print_r($ticker_req);
                    //exit;

                    $data = json_decode($ticker_req, true)['data'];

                    /*-- Added This condition if we dont have result with USD --*/
                    /*-- Added On 21 Feb 2023 --*/
                    /*-- START --*/
                    if($data['price'] == 0 || $data['last_high'] == 0) {
                        if($request->get_param("currency") == "USD") {
                            $url = 'https://crypto.investment-mastery.co/quote/'.$request->get_param("symbol").'/USDT';
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
                $url = 'https://crypto.investment-mastery.co/ticker/'.strtolower($request->get_param("term"));
                $ticker_req = self::get_curl($url, $referer); 
            }
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

}    