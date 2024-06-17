<?php 
namespace InvestmentMastery;

class InvestmentMasteryCalculators extends InvestmentMastery{

    static $table_strategy = "clubs_strategy";
    static $table_details = "clubs_strategy_details";
    static $table_alerts = "clubs_strategy_alerts";
    static $table_profits = "clubs_strategy_profits";
    static $per_page = 10;

     static function save_strategy(  \WP_REST_Request $request ) {

        $user_id = parent::pb_auth_user($request);
                
        if(!empty($user_id)) {
            global $wpdb;
            
            $strategy_data = json_decode($request->get_param("strategy_json"), true);
            // echo "<pre>";
            // echo "strategy data=>";
            // print_r($strategy_data);
            
            $detail_data = json_decode($request->get_param("strategy_detail_json"), true);   
           
            // echo "detail_data=>";
            // print_r($detail_data);
                   
            $profit_data = json_decode($request->get_param("profit_detail_json"), true);
            $strategy_id = $request->get_param("id");     
            //echo "profit_data=>";
            //print_r($profit_data);
			//die();
            /*poonam added on 10 apr*/      
            $total_investment = $strategy_data['total_investment'];
            $total_investment = str_replace('$','', $total_investment);
            $total_gain_loss = $strategy_data['total_gain_loss'];
            $total_gain_loss = str_replace('$','', $total_gain_loss);
            $average_price = $strategy_data['average_share_price'];
            $average_price = str_replace('$','', $average_price);
            $share_diffrent_price = $strategy_data['share_price_difference'];
            $share_diffrent_price = str_replace('$','', $share_diffrent_price);
            /*end poonam added on 10 apr*/      

            ///echo "total_gain_loss".$total_gain_loss;
            if(!empty($strategy_data) && !empty($detail_data)) {
           
                if($strategy_id) { 
                    $result = $wpdb->get_results("SELECT strategy_id FROM clubs_strategy WHERE strategy_id=$strategy_id AND user_id=$user_id LIMIT 1");
                }
                if(empty($result)) {  
                    $cmc_type = '';
                    if(isset($strategy_data['cmc_type'])) {
                        $cmc_type = $strategy_data['cmc_type'];
                    }
                    $strategy_type = '';
                    if(isset($strategy_data['strategy_type'])) {
                        $strategy_type = $strategy_data['strategy_type'];
                    }
                    
                    $strategy_name = self::get_unique_strategy_name($user_id, $strategy_data['strategy_name'], $strategy_data['calc_type'], $strategy_data['strategy_name'], 1);
                    
                    $wpdb->insert(self::$table_strategy, [
                        'user_id' => $user_id,
                        'calc_type' => $strategy_data['calc_type'],
                        'cmc_type' => $cmc_type,
                        'club_type' => $strategy_data['club_type'],
                        'strategy_type' => $strategy_type,
                        'strategy_name' => $strategy_name,
                        'stock_name' => $strategy_data['stock_name'],
                        'currency' => $strategy_data['currency'],
                        'stock_price' => $strategy_data['stock_price'],
                        '52_week_high' => $strategy_data['52_week_high'],
                        'your_investment' => $strategy_data['your_investment'],
                        'total_gain_loss' => $total_gain_loss,
                        'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                        'total_investment' => $total_investment,
                        'total_share_buy' => $strategy_data['total_share_buy'],
                        'average_share_price' => $average_price,
                        'share_price_difference' => $share_diffrent_price,
                        'date_added' => date("Y-m-d H:i:s"),
                        'is_deleted' => 1,
                    ],
                    ['%d','%s','%s','%s','%s','%s','%s','%s','%f','%f','%f','%f','%f','%f','%f','%f','%f','%s','%d']);

                    $strategy_id = $wpdb->insert_id;

                    if($strategy_id > 0) {

                        foreach($detail_data as $detail_row) {
                            $wpdb->insert(self::$table_details, [
                                'strategy_id' => $strategy_id,  
                                'alert_id' => 0,
                                'entry_level' => $detail_row['entry_level'],
                                'purchase_date' => $detail_row['purchase_date'],
                                'investment_amount' => $detail_row['investment_amount'],
                                'real_amount' => $detail_row['real_amount'],
                                'entry_price' => $detail_row['entry_price'],
                                'no_of_shares_to_buy' => $detail_row['no_of_shares_to_buy'],
                                'additional_cost' => $detail_row['additional_cost'],
                                'alert_flag' => $detail_row['alert_flag'],
                            ],
                            ['%d','%d','%d','%s','%f','%f','%f','%f','%f','%s']);

                        }  

                        /*---  INSERTING PROFIT DETAILS  ---*/
                        foreach($profit_data as $profit_row) {
                            $wpdb->insert(self::$table_profits, [
                                'strategy_id' => $strategy_id,  
                                'alert_id' => 0,
                                'date_sale' => $profit_row['sale_date'],
                                'sale_sum' => $profit_row['sale_sum'],
                                'sale_percent_profit' => $profit_row['sale_percent_profit'],
                                'your_fiat_sale_sum' => $profit_row['your_fiat_sale_sum'],
                                'take_profit_price' => $profit_row['take_profit_price'],
                                'your_take_profit_price' => $profit_row['your_take_profit_price'],
                                'number_of_tokens' => $profit_row['number_of_tokens'],
                                'exchange_fees' => $profit_row['exchange_fees'],
                                'trade_cost' => $profit_row['trade_cost'],
                                'current_holding' => $profit_row['current_holdings'],
                                'alert_flag' => $profit_row['alert_flag'],
                            ],
                            ['%d','%d','%s','%f','%f','%f','%f','%f','%f','%f','%f','%f','%s']);

                        }
                        
                    } 

                } else { 
                    $strategy_id = $strategy_id;

                   /* $strategy_name = $strategy_data['strategy_name'];
                    if($strategy_data['strategy_name'] == $strategy_data['strategy_name_old']) {
                        $strategy_name = $strategy_data['strategy_name'];
                    } else {
                        $strategy_name = self::get_unique_strategy_name($user_id, $strategy_data['strategy_name'], $strategy_data['calc_type'], $strategy_data['strategy_name'], 1);
                    }*/
                    
                    /** update tracker if date already exist **/     
                  
                   if($strategy_data['total_gain_loss_percentage'] != ""){
                        if($strategy_data['calc_type']=="Small Cap"){
                            if($profit_data[0]['profit_header_total_share_sell'] == ""){  
                                $small_cap_tot_amt = 0;
                                $small_cap_tot_token = 0;                      

                                $wpdb->update(self::$table_strategy, [
                                    'user_id' => $user_id,  
                                    'calc_type' => $strategy_data['calc_type'],                                        
                                    'stock_name' => $strategy_data['stock_name'],
                                    'currency' => $strategy_data['currency'],
                                    'stock_price' => $strategy_data['stock_price'],
                                    '52_week_high' => $strategy_data['52_week_high'],                      
                                    'total_gain_loss' => $strategy_data['total_gain_loss'],
                                    'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                                    'total_investment' => $strategy_data['total_investment'],
                                    'total_share_buy' => $strategy_data['total_share_buy'],
                                    'average_share_price' => $strategy_data['average_share_price'],
                                    'share_price_difference' => $strategy_data['share_price_difference'],
                                    'small_cap_tot_amt' => $small_cap_tot_amt, //poonam added 16may
                                    'small_cap_tot_token' => $small_cap_tot_token, //poonam added 16may
                                    'date_added' => date("Y-m-d H:i:s"),
                                    'is_deleted' => 1,
                                ],['strategy_id'=>$strategy_id]);     
                            }else{
                                if($profit_data[0]['date_sale']==""){									
                                    $small_cap_tot_amt = 0;
                                    $small_cap_tot_token = 0;                      

                                    $wpdb->update(self::$table_strategy, [
                                        'user_id' => $user_id,  
                                        'calc_type' => $strategy_data['calc_type'],                                        
                                        'stock_name' => $strategy_data['stock_name'],
                                        'currency' => $strategy_data['currency'],
                                        'stock_price' => $strategy_data['stock_price'],
                                        '52_week_high' => $strategy_data['52_week_high'],                      
                                        'total_gain_loss' => $strategy_data['total_gain_loss'],
                                        //'total_gain_loss' => $profit_data[0]['profit_header_gain_loss'],
                                        'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                                        //'total_gain_loss_percentage' => $profit_data[0]['profit_header_result'],
                                        'total_investment' => $strategy_data['total_investment'],
                                        //'total_investment' => $profit_data[0]['profit_header_current_holding_value'],
                                        'total_share_buy' => $strategy_data['total_share_buy'],
                                        'small_cap_curr_hold' => 0,
                                        'average_share_price' => $strategy_data['average_share_price'],
                                        'share_price_difference' => $strategy_data['share_price_difference'],
                                        //'share_price_difference' => $profit_data[0]['profit_header_price_diff'],
                                        'small_cap_tot_amt' => $small_cap_tot_amt, //poonam added 16may
                                        'small_cap_tot_token' => $small_cap_tot_token, //poonam added 16may
                                        'date_added' => date("Y-m-d H:i:s"),
                                        'is_deleted' => 1,
                                    ],['strategy_id'=>$strategy_id]);
                                }else{
									
                                    $small_cap_tot_amt = $profit_data[0]['profit_header_total_sold'];
                                    $small_cap_tot_token = $profit_data[0]['profit_header_total_share_sell'];                      

                                    $wpdb->update(self::$table_strategy, [
                                        'user_id' => $user_id,  
                                        'calc_type' => $strategy_data['calc_type'],                                        
                                        'stock_name' => $strategy_data['stock_name'],
                                        'currency' => $strategy_data['currency'],
                                        'stock_price' => $strategy_data['stock_price'],
                                        '52_week_high' => $strategy_data['52_week_high'],                      
                                        //'total_gain_loss' => $strategy_data['total_gain_loss'],
                                        'total_gain_loss' => $profit_data[0]['profit_header_gain_loss'],
                                        //'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                                        'total_gain_loss_percentage' => $profit_data[0]['profit_header_result'],
                                        'total_investment' => $strategy_data['total_investment'],
                                        //'total_investment' => $profit_data[0]['profit_header_current_holding_value'],
                                        //'total_share_buy' => $strategy_data['total_share_buy'],
                                        'small_cap_curr_hold' => $profit_data[0]['profit_header_holding_share'],
                                        'average_share_price' => $strategy_data['average_share_price'],
                                        //'share_price_difference' => $strategy_data['share_price_difference'],
                                        'share_price_difference' => $profit_data[0]['profit_header_price_diff'],
                                        'small_cap_tot_amt' => $small_cap_tot_amt, //poonam added 16may
                                        'small_cap_tot_token' => $small_cap_tot_token, //poonam added 16may
                                        'date_added' => date("Y-m-d H:i:s"),
                                        'is_deleted' => 1,
                                    ],['strategy_id'=>$strategy_id]);
                                }                                     
                            }
                        }else{
                                $wpdb->update(self::$table_strategy, [
                                'user_id' => $user_id,  
                                'calc_type' => $strategy_data['calc_type'],                                        
                                'stock_name' => $strategy_data['stock_name'],
                                'currency' => $strategy_data['currency'],
                                'stock_price' => $strategy_data['stock_price'],
                                '52_week_high' => $strategy_data['52_week_high'],                      
                                'total_gain_loss' => $strategy_data['total_gain_loss'],
                                'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                                'total_investment' => $strategy_data['total_investment'],
                                'total_share_buy' => $strategy_data['total_share_buy'],
                                'average_share_price' => $strategy_data['average_share_price'],
                                'share_price_difference' => $strategy_data['share_price_difference'],
                                'date_added' => date("Y-m-d H:i:s"),
                                'is_deleted' => 1,
                            ],['strategy_id'=>$strategy_id]);      
                        }                            
                    }
                        
                    
                    if($profit_data[0]['your_take_profit_price'] != "0.00"){   
						
                            $string = $profit_data[0]['profit_header_result'];
                            $newString = str_replace('%', '', $string);
                            if($profit_data[0]['profit_header_gain_loss']!=""){
                                $header_fain_loss_percentage = $profit_data[0]['profit_header_result'];
                                $header_gain_loss = $profit_data[0]['profit_header_gain_loss'];
                                $header_share_price_diff = $profit_data[0]['profit_header_price_diff'];
                            }else{
                                $header_fain_loss_percentage = $strategy_data['total_gain_loss_percentage'];
                                $header_gain_loss = $total_gain_loss;
                                $header_share_price_diff = $share_diffrent_price;
                            }
                            $wpdb->update(self::$table_strategy, [
                            'user_id' => $user_id,  
                            'calc_type' => $strategy_data['calc_type'],                                        
                            'stock_name' => $strategy_data['stock_name'],
                            'currency' => $strategy_data['currency'],
                            'stock_price' => $strategy_data['stock_price'],
                            '52_week_high' => $strategy_data['52_week_high'],                      
                            //'total_gain_loss' => $total_gain_loss,
                            //'total_gain_loss' => $profit_data[0]['profit_header_gain_loss'],      //poonam modified 2may
                            'total_gain_loss' => $header_gain_loss,      //poonam modified 14may
                            //'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                            'total_gain_loss_percentage' => $profit_data[0]['profit_header_result'],     //poonam modified 2may
                            'total_gain_loss_percentage' => $header_fain_loss_percentage,     //poonam modified 14may
                            'total_investment' => $total_investment,
                            'total_share_buy' => $strategy_data['total_share_buy'],
                            'average_share_price' => $average_price,
                            //'share_price_difference' => $share_diffrent_price,
                            //'share_price_difference' => $profit_data[0]['profit_header_price_diff'],     //poonam modified 2may
                            'share_price_difference' => $header_share_price_diff,     //poonam modified 14may
                            'date_added' => date("Y-m-d H:i:s"),
                            'is_deleted' => 1,
                        ],['strategy_id'=>$strategy_id]);      
                    }
                    
                    /*Get All details stratergies  */

                    /*update details records */ 
                    foreach($detail_data as $detail_row) {
                        $wpdb->update(self::$table_details, [
                            'strategy_id' => $strategy_id,  
                            'alert_id' => 0,                            
                            'purchase_date' => $detail_row['purchase_date'],
                            'investment_amount' => $detail_row['investment_amount'],
                            'real_amount' => $detail_row['real_amount'],
                            'entry_price' => $detail_row['entry_price'],
                            'no_of_shares_to_buy' => $detail_row['no_of_shares_to_buy'],
                            'additional_cost' => $detail_row['additional_cost'],
                            'alert_flag' => $detail_row['alert_flag'],
                        ],
                        ['detail_id'=>$detail_row['detail_id']]); 

                    } 

                    /*update profit records */ 
                    foreach($profit_data as $profit_row) {
                        /*poonam added 2may*/
                        $profit_header_total_sold = $profit_row['profit_header_total_sold'];
                        $profit_header_total_sold = str_replace('$','', $profit_header_total_sold);
                        /*end poonam added 2may*/

                        $wpdb->update(self::$table_profits, [
                            'strategy_id' => $strategy_id,  
                            'alert_id' => 0,                            
                            'date_sale' => $profit_row['date_sale'],
                            'sale_sum' => $profit_row['sale_sum'],
                            'sale_percent_profit' => $profit_row['sale_percent_profit'],
                            'your_fiat_sale_sum' => $profit_row['your_fiat_sale_sum'],
                            'take_profit_price' => $profit_row['take_profit_price'],
                            'your_take_profit_price' => $profit_row['your_take_profit_price'],
                            'number_of_tokens' => $profit_row['number_of_tokens'],
                            'exchange_fees' => $profit_row['exchange_fees'],
                            'trade_cost' => $profit_row['trade_cost'],
                            'current_holding' => $profit_row['current_holding'],
                            'alert_flag' => $profit_row['alert_flag'],
                            'your_fiat_sale_sum' => $profit_header_total_sold,
                            'sale_sum' => $profit_header_total_sold,
                        ],
                        ['profit_id'=>$profit_row['profit_id']]); 

                    } 
                }

                $response = [
                    'status' => 200,
                    'strategy_id' => $strategy_id
                ];

                $response = new \WP_REST_Response($response);
                    return $response;
            }
        } else {
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
        

    }



    static function update_strategy_name(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
                
        if(!empty($user_id)){

            global $wpdb;
            $strategy_name = trim($request->get_param("strategy_name"));
            $strategy_id = trim($request->get_param("id"));
            $calc_type = trim($request->get_param("calc_type"));

            $strategy_name_new = self::get_unique_strategy_name($user_id, $strategy_name, $calc_type, $strategy_name, 1);

            $wpdb->update(self::$table_strategy, [
                        'user_id' => $user_id,
                        'strategy_name' => $strategy_name_new, 
                    ],['strategy_id'=>$strategy_id]); 

            $response = [
                    'status' => 200,
                    'strategy_id' => $strategy_id
                ];

            $response = new \WP_REST_Response($response);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }


    static function update_investment(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
                
        if(!empty($user_id)){

            global $wpdb;
            $new_investment = trim($request->get_param("new_investment"));
            $strategy_id = trim($request->get_param("id"));
            $detail_data = json_decode($request->get_param("strategy_detail_json"), true);    
            // echo "new_investment";
            // echo $new_investment;
            // echo "Details Data";
            // print_r($detail_data);
            $wpdb->update(self::$table_strategy, [
                        'user_id' => $user_id,
                        'your_investment' => $new_investment, 
                    ],['strategy_id'=>$strategy_id]); 

            /*update details records */ 
            foreach($detail_data as $detail_row) {
                // echo "UPDATE `clubs_strategy_details` SET investment_amount = '".$detail_row['investment_amount']."' WHERE strategy_id = ".$strategy_id." AND entry_price = ".$detail_row['entry_price']."";
                // echo "<br>";

                //*poonam added 15apr*/
                // $execute = $wpdb->get_results("UPDATE `clubs_strategy_details` SET investment_amount = '".$detail_row['investment_amount']."' WHERE strategy_id = ".$strategy_id." AND entry_price = ".$detail_row['entry_price']." AND detail_id = ".$detail_row['details_id']." ");

                $execute = $wpdb->get_results("UPDATE `clubs_strategy_details` SET investment_amount = '".$detail_row['investment_amount']."' WHERE strategy_id = ".$strategy_id." AND entry_price = ".$detail_row['entry_price']." AND detail_id = ".$detail_row['details_id']." ");
                //*end poonam added 15apr*/
            }

            $response = [
                'status' => 200,
                'strategy_id' => $strategy_id
            ];

            $response = new \WP_REST_Response($response);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }

   static function update_profit_percron(){
     global $wpdb;
     $club_strategy = $wpdb->get_results("SELECT * FROM clubs_strategy");
    // print_r($club_strategy);exit;
     foreach($club_strategy as $strategy)
     {
           $strategy_id = $strategy->strategy_id;
           $calc_type = $strategy->calc_type;

           $club_strategy_profits = $wpdb->get_results("SELECT * FROM clubs_strategy_profits WHERE strategy_id=$strategy_id ORDER BY profit_id ASC");
          // print_r($club_strategy_profits);
            if($calc_type == "VCA") {
            $profit_entry_level_arr = array(15);
            } else if($calc_type == "CCA") {
                $profit_entry_level_arr = array(50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700);
            } else if($calc_type == "Small Cap") {
                $profit_entry_level_arr = array(100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100);
            } else if($calc_type == "CMC") {
                $profit_entry_level_arr = array(5, 10, 15, 20, 25, 30, 35);
            }
            $count = 0;
             foreach($club_strategy_profits as $detail_row) {
                  $profit_id = $detail_row->profit_id;
                        $wpdb->update(self::$table_profits, [
                            'sale_percent_profit' => $profit_entry_level_arr[$count],  
                              ],
                        ['profit_id'=>$profit_id]); 

                   $count++; } 


     }
     return true;
   }
    static function get_strategy(  \WP_REST_Request $request ) {

        $user_id = parent::pb_auth_user($request);
       /*self::update_profit_percron();*/
       
        if(!empty($user_id)) {

            global $wpdb; 
            $token  = "LXSXxPeHq8iF2g2yaKAEpkzddpaZ_ZgS";
            $referer = 'investment-mastery';
            $strategy_id = trim($request->get_param("strategy_id"));

            $club_strategy = $wpdb->get_results("SELECT * FROM clubs_strategy WHERE strategy_id=$strategy_id AND user_id=$user_id LIMIT 1");            
            $club_strategy_details = $wpdb->get_results("SELECT * FROM clubs_strategy_details WHERE strategy_id=$strategy_id");
            $club_strategy_profits = $wpdb->get_results("SELECT * FROM clubs_strategy_profits WHERE strategy_id=$strategy_id");            
            foreach($club_strategy as $row) {

                $currency = $row->currency;
                $stock_name = $row->stock_name;
                $calc_type = $row->calc_type;
                $total_tokens = $row->total_share_buy;
                $total_investment = $row->total_investment;
                $avg_price = $row->average_share_price;
                $strategy_type = $row->strategy_type;
            }

            if(count($club_strategy_profits) == 0) {

                if($strategy_type == "SELL") {
                    $club_strategy_profits = self::add_profit_records($strategy_id, $total_tokens, $avg_price, $calc_type, $strategy_type);
                } else {
                    $club_strategy_profits = self::add_profit_records($strategy_id, $total_tokens, $avg_price, $calc_type, $strategy_type);
                }                
            }

            /* START : Get stock live price */
            if($calc_type == "VCA") {
                $commodityStocks = array("XAU", "XAG", "Copper", "USOIL", "UKOIL");

                if (in_array($stock_name, $commodityStocks)) {

                    $live_stock_price = self::get_commodity_live_price($stock_name, $currency);

                } else {

                    $conversion = 1;
                    if( $currency != 'USD') {                
                        $conversion = json_decode( file_get_contents('https://api.polygon.io/v2/aggs/ticker/C:USD'.$currency.'/prev?adjusted=true&apiKey='.$token),true)['results'][0]['c'];
                    }

                    $url = 'https://api.polygon.io/v2/aggs/ticker/'.$stock_name.'/range/1/day/'.date('Y-m-d', strtotime('- 7 days')).'/'.date('Y-m-d').'?adjusted=true&sort=desc&limit=7&apiKey='.$token;
                    
                    $json = self::get_curl($url);
                    $data = json_decode($json,true);
                     
                    $live_stock_price = round($data['results'][0]['c'] * $conversion, 2);
                }
            } else {

                 /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/       
                    $url_price = "https://api.coinbase.com/v2/prices/".$stock_name.'-'.$currency."/spot"; 
                    // https://api.coinbase.com/v2/prices/BTC-USD/spot
                    $ch_price = curl_init();   
                    curl_setopt($ch_price, CURLOPT_RETURNTRANSFER, 1);   
                    curl_setopt($ch_price, CURLOPT_URL, $url_price);   
                    $res_price = curl_exec($ch_price); 
                    curl_close($ch_price);
                    $data_live = json_decode($res_price,true);

                    /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/              
                /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/ 
                    if($data_live['data']['amount']!=0)
                    {
                            /*If live price available put it here*/
                            $data['price']      ='';
                            if($data_live['data']['amount']>1){
                            $live_stock_price    = number_format($data_live['data']['amount'],2,'.','');
                            }else{
                                 $live_stock_price     = number_format($data_live['data']['amount'],6,'.','');
                            }
                            
                    }else{
                     /*RAM FETCH LIVE CRYPTO PRICE ON 5DEC23*/ 
                     
                                $url = 'https://crypto.investment-mastery.co/quote/'.$stock_name.'/'.$currency;
                                $ticker_req = self::get_curl($url, $referer);
                                $data = json_decode($ticker_req, true)['data'];

                                if( empty($data) || $data['status'] == 500) {

                                    if($currency == "USD") {
                                            $url = 'https://crypto.investment-mastery.co/quote/'.$stock_name.'/USDT';
                                            $ticker_req2 = self::get_curl($url, $referer);

                                            $data = json_decode($ticker_req2, true)['data'];

                                             $live_stock_price = $data['price'];
                                        } else {

                                             $url = 'https://edu.investment-mastery.com/crypto/getprices/?symbol='.$stock_name.'&currency='.$currency;
                                            $ticker_req = self::get_curl($url, $referer);
                                            $data_min = json_decode($ticker_req, true)['data'][$stock_name]['quote'][$currency];
                                            $live_stock_price = $data_min['price'];

                                        }                    
                                   

                                } else {
                                    $live_stock_price = $data['price'];
                                }
                         }

                
                /*echo "<pre>";
                print_r($ticker_req);print_r($data);exit;*/
            }
            /* END : Get stock live price */
           
            if( !empty($club_strategy) && !empty($club_strategy_details) ){
                $strategy['strategy'] = $club_strategy;
                $strategy['details'] = $club_strategy_details;
                $strategy['profits'] = $club_strategy_profits;
                $strategy['live_stock_price'] = $live_stock_price;
            }
            $response = new \WP_REST_Response($strategy);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }

    static function add_profit_records($strategy_id, $total_tokens, $avg_price, $calc_type, $strategy_type) {

        global $wpdb;

        if($calc_type == "VCA") {
            $profit_entry_level_arr = array(15);
        } else if($calc_type == "CCA") {
            $profit_entry_level_arr = array(50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700);
        } else if($calc_type == "Small Cap") {
            $profit_entry_level_arr = array(100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100);
        } else if($calc_type == "CMC") {
            $profit_entry_level_arr = array(5, 10, 15, 20, 25, 30, 35);
        }
        
 
        if($total_tokens > 0 && $avg_price > 0) {
            $cnt = 1;
            $take_profit_price   = 0;
            $sale_sum            = 0;
            $number_of_tokens    = 0;
            $current_holdings    = 0;

            if($calc_type == "CMC") {

                foreach($profit_entry_level_arr as $entries) {               

                    if($strategy_type == "BUY" ) {
                        $take_profit_price = $avg_price * ( 1 + ( $entries / 100) );
                    } else {
                        $take_profit_price = $avg_price * ( 1 - ( $entries / 100) );
                    }                

                    if($cnt == 1) {
                        if($strategy_type == "BUY" ) {
                            $current_holdings = $total_tokens;
                        } else {
                            $current_holdings = $total_tokens;
                        }
                    } else {
                        $current_holdings = 0;
                    }

                    $wpdb->insert(self::$table_profits, [
                        'strategy_id' => $strategy_id,  
                        'alert_id' => 0,
                        'date_sale' => '',
                        'sale_sum' => 0,
                        'sale_percent_profit' => $entries,
                        'your_fiat_sale_sum' => '',
                        'take_profit_price' => $take_profit_price,
                        'your_take_profit_price' => '',
                        'number_of_tokens' => 0,
                        'exchange_fees' => '',
                        'trade_cost' => '',
                        'current_holding' => $current_holdings,
                        'alert_flag' => 0,
                    ],
                    ['%d','%d','%s','%f','%f','%f','%f','%f','%f','%f','%f','%f','%s']);

                    $cnt++;
                }

            } else  if($calc_type == "VCA") {


                foreach($profit_entry_level_arr as $entries) {               

                    if($strategy_type == "BUY" || $strategy_type == "") {
                        $take_profit_price = $avg_price * ( 1 + ( $entries / 100) );
                    } else {
                        $take_profit_price = $avg_price * ( 1 - ( $entries / 100) );
                    }                

                    if($cnt == 1) {
                        $sale_sum = $total_tokens * $take_profit_price;//* ( 20 / 100);
                        /*$tot_sale_sum = $tot_sale_sum + $sale_sum;*/

                        $number_of_tokens = ( $sale_sum / $take_profit_price );
                        $tot_number_of_tokens = $tot_number_of_tokens + $number_of_tokens;

                        $current_holdings = $total_tokens - $tot_number_of_tokens;
                        $tot_current_holdings = $tot_current_holdings + $current_holdings;
                        $current_holdings_prev = $current_holdings;
                    } else {
                        $sale_sum = $current_holdings_prev * $take_profit_price;// * ( 20 / 100);
                        $tot_sale_sum = $tot_sale_sum + $sale_sum;

                        $number_of_tokens = ( $sale_sum / $take_profit_price );
                        $tot_number_of_tokens = $tot_number_of_tokens + $number_of_tokens;

                        $current_holdings = $total_tokens - $tot_number_of_tokens;
                        $tot_current_holdings = $tot_current_holdings + $current_holdings;
                        $current_holdings_prev = $current_holdings;
                    }                    

                    $wpdb->insert(self::$table_profits, [
                        'strategy_id' => $strategy_id,  
                        'alert_id' => 0,
                        'date_sale' => '',
                        'sale_sum' => $sale_sum,
                        'sale_percent_profit' => $entries,
                        'your_fiat_sale_sum' => '',
                        'take_profit_price' => $take_profit_price,
                        'your_take_profit_price' => '',
                        'number_of_tokens' => $number_of_tokens,
                        'exchange_fees' => '',
                        'trade_cost' => '',
                        'current_holding' => $current_holdings,
                        'alert_flag' => 0,
                    ],
                    ['%d','%d','%s','%f','%d','%f','%f','%f','%f','%f','%f','%f','%s']);

                    $cnt++;
                }

            }else{

                foreach($profit_entry_level_arr as $entries) {               

                    if($strategy_type == "BUY" || $strategy_type == "") {
                        //echo "IN IF";
                        $take_profit_price = $avg_price * ( 1 + ( $entries / 100) );
                        //  echo "AVG".$avg_price;
                        // echo "ENT".$entries;
                        // echo "SALE".$take_profit_price;
                    } else {
                        //echo "IN ELSE";
                        $take_profit_price = $avg_price * ( 1 - ( $entries / 100) );
                        //  echo "AVG".$avg_price;
                        // echo "ENT".$entries;
                        // echo "SALE".$take_profit_price;
                    }                

                    if($cnt == 1) {
                       
                        $sale_sum = $total_tokens * $take_profit_price* ( 20 / 100);
                        //  echo"hi";
                        // echo "TOT".$total_tokens;
                        // echo "PROFIT".$take_profit_price;
                        // echo "SALE".$sale_sum;
                        /*$tot_sale_sum = $tot_sale_sum + $sale_sum;*/

                        //$number_of_tokens = ( $sale_sum / $take_profit_price );
                        $number_of_tokens = 0;
                        $tot_number_of_tokens = $tot_number_of_tokens + $number_of_tokens;

                        $current_holdings = $total_tokens - $tot_number_of_tokens;
                        $tot_current_holdings = $tot_current_holdings + $current_holdings;
                        $current_holdings_prev = $current_holdings;
                    } else {

                        //$sale_sum = $current_holdings_prev * $take_profit_price * ( 20 / 100);
                        /*poonam modified 11june*/
                        $sale_sum = $total_tokens * $take_profit_price* ( 20 / 100);
                        // echo "<br>";
                        // echo"else";
                        // echo "TOT".$total_tokens;
                        // echo "PROFIT".$take_profit_price;
                        // echo "SALE".$sale_sum;
                        /*end poonam modified 11june*/
                        $tot_sale_sum = $tot_sale_sum + $sale_sum;

                        //$number_of_tokens = ( $sale_sum / $take_profit_price );
                        $number_of_tokens = 1;

                        $tot_number_of_tokens = $tot_number_of_tokens + $number_of_tokens;

                        $current_holdings = $total_tokens - $tot_number_of_tokens;
                        $tot_current_holdings = $tot_current_holdings + $current_holdings;
                        $current_holdings_prev = $current_holdings;
                    }                    
                    //die();
                    $wpdb->insert(self::$table_profits, [
                        'strategy_id' => $strategy_id,  
                        'alert_id' => 0,
                        'date_sale' => '',
                        'sale_sum' => $sale_sum,
                        'sale_percent_profit' => $entries,
                        'your_fiat_sale_sum' => '',
                        'take_profit_price' => $take_profit_price,
                        'your_take_profit_price' => '',
                        'number_of_tokens' => $number_of_tokens,
                        'exchange_fees' => '',
                        'trade_cost' => '',
                        'current_holding' => $current_holdings,
                        'alert_flag' => 0,
                    ],
                    ['%d','%d','%s','%f','%d','%f','%f','%f','%f','%f','%f','%f','%s']);

                    $cnt++;
                }

            }
         
        } else {

            foreach($profit_entry_level_arr as $entries) {

                $wpdb->insert(self::$table_profits, [
                    'strategy_id' => $strategy_id,  
                    'alert_id' => 0,
                    'date_sale' => '',
                    'sale_sum' => 0,
                    'sale_percent_profit' => $entries,
                    'your_fiat_sale_sum' => 0,
                    'take_profit_price' => 0,
                    'your_take_profit_price' => 0,
                    'number_of_tokens' => 0,
                    'exchange_fees' => 0,
                    'trade_cost' => 0,
                    'current_holding' => 0,
                    'alert_flag' => 0,
                ],
                ['%d','%d','%s','%f','%f','%f','%f','%f','%f','%f','%f','%f','%s']);
            }
        }
        return $wpdb->get_results("SELECT * FROM clubs_strategy_profits WHERE strategy_id=$strategy_id");
    }

    static function delete_strategy(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
                
        if(!empty($user_id)){

            global $wpdb;
            $strategy_id = trim($request->get_param("strategy_id"));

            $result = $wpdb->delete( self::$table_strategy, array( 'strategy_id' => $strategy_id, 'user_id' => $user_id ) );
            $result = $wpdb->delete( self::$table_details, array( 'detail_id' => $detail_id, 'strategy_id' => $strategy_id ) );

            $response = [
                    'success' => $result,
                    'strategy_id' => $strategy_id
                ];

            $response = new \WP_REST_Response($response);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }

    static function get_strategies(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);

        $where = '';
        $response_data = '';

        $start_date     = $request->get_param("start_date");
        $end_date       = $request->get_param("end_date");
        $stock_name     = $request->get_param("stock_name");
        $currency       = $request->get_param("currency");
        $strategy_for   = $request->get_param("strategy_for");
        $keyword        = $request->get_param("search_keyword");
        $calc_type      = $request->get_param("calc_type");
        $club_type      = $request->get_param("club_type");
        $limit_start    = $request->get_param("start");
        $limit_length   = $request->get_param("length");

        if(!empty( $start_date ) && !empty( $end_date )) {
            $where .= ' AND date_added >= "'.$start_date.' 00:00:00" AND date_added <= "'.$end_date.' 23:59:59"';
        }

        if(!empty( $stock_name ) ) {
            $where .= ' AND stock_name = "'.$stock_name.'" ';
        }

        if(!empty( $currency ) ) {
            $where .= ' AND currency = "'.$currency.'" ';
        }

        if(!empty( $strategy_for ) ) {
            $where .= ' AND strategy_type = "'.$strategy_for.'" ';
        }

        if(!empty( $calc_type ) ) {
            $where .= ' AND calc_type = "'.$calc_type.'" ';
        }
       /* if(!empty( $club_type ) ) {
            $where .= ' AND club_type = "'.$club_type.'" ';
        }*/

        if(!empty( $keyword )) {
            $where .= ' AND ( ';
            $where .= ' strategy_name LIKE "%'.$keyword.'%" ';
            $where .= ' OR stock_name LIKE "%'.$keyword.'%" ';
            $where .= ' OR currency LIKE "%'.$keyword.'%" ';
            $where .= ' ) ';
        }
        $order_by = ' ORDER BY strategy_id DESC';
        $limit = ' LIMIT '.$limit_start.', '.$limit_length;            

        global $wpdb;

        $total_records = $wpdb->get_row("SELECT count(strategy_id) as total_rows FROM clubs_strategy where user_id = $user_id AND is_deleted = 1 $where");

        $search_sql = "SELECT *, `52_week_high` as week_high FROM clubs_strategy where user_id = $user_id AND is_deleted = 1 $where $order_by $limit";

        $result = $wpdb->get_results( $search_sql );

        $response_data2 = [];
        foreach($result as $row){ 
            $strategy_name_string = '<a class="open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="strategy_recap_tab_content" >'.$row->strategy_name.'</a>';

            $action_string = '<a class="edit_link open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="strategy_edit_tab_content"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;<a class="delete_link open_popup"  data-popup="#delete_popup" data-action="delete" data-strategyid="'.$row->strategy_id.'"><i class="fa fa-trash" aria-hidden="true"></i></a>';

            if($calc_type == "CMC") {
                $response_data2[] = [
                    date("d-m-Y", strtotime($row->date_added)),
                    $strategy_name_string,
                    $row->strategy_type,
                    $row->stock_name,
                    $row->currency,
                    $action_string
                ];
            } else {
                $response_data2[] = [
                    date("d-m-Y", strtotime($row->date_added)),
                    $strategy_name_string,
                    $row->stock_name,
                    $row->currency,
                    $action_string
                ];
            }
        }
       
        $response_data = [
          "draw" => $_REQUEST['draw'],
          "recordsTotal" => $total_records->total_rows,
          "recordsFiltered" => $total_records->total_rows,
          "data" => $response_data2
        ];    

        $response = new \WP_REST_Response($response_data);
        return $response;

        if(!empty($user_id)){
        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }

    static function get_unseen_alert_count(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
        $calc_type = trim($request->get_param("calc_type"));

        $response_data = '';
        global $wpdb; 

        $total_records = $wpdb->get_row("SELECT count(a.alert_id) as total_rows FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."' AND a.is_viewed = 0 AND s.calc_type = '".$calc_type."' ");
       
        $response_data = [
            "status" => 200,
            "recordsTotal" => $total_records->total_rows
        ];    

        $response = new \WP_REST_Response($response_data);
        return $response;

        if(!empty($user_id)){
        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }

    static function get_alerts(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);

        $start_date     = $request->get_param("start_date");
        $end_date       = $request->get_param("end_date");
        $stock_name     = $request->get_param("stock_name");
        $currency       = $request->get_param("currency");
        $alert_for      = $request->get_param("alert_for");
        $keyword        = $request->get_param("search_keyword");
        $calc_type      = $request->get_param("calc_type");

        $where_sql_1    = '';
        $where_sql_2    = '';
        $response_data  = '';

        if(!empty( $start_date ) && !empty( $end_date )) {
            $where_sql_1 .= ' AND a.date_sent >= "'.$start_date.' 00:00:00" AND a.date_sent <= "'.$end_date.' 23:59:59"';
            $where_sql_2 .= ' AND ap.date_sent >= "'.$start_date.' 00:00:00" AND ap.date_sent <= "'.$end_date.' 23:59:59"';
        }

        if(!empty( $stock_name ) ) {
            $where_sql_1 .= ' AND s.stock_name = "'.$stock_name.'" ';
            $where_sql_2 .= ' AND sp.stock_name = "'.$stock_name.'" ';
        }

        if(!empty( $currency ) ) {
            $where_sql_1 .= ' AND s.currency = "'.$currency.'" ';
            $where_sql_2 .= ' AND sp.currency = "'.$currency.'" ';
        }

        if(!empty( $keyword )) {
            $where_sql_1 .= ' AND ( ';
            $where_sql_1 .= ' s.strategy_name LIKE "%'.$keyword.'%" ';
            $where_sql_1 .= ' OR s.stock_name LIKE "%'.$keyword.'%" ';
            $where_sql_1 .= ' OR s.currency LIKE "%'.$keyword.'%" ';
            $where_sql_1 .= ' ) ';

            $where_sql_2 .= ' AND ( ';
            $where_sql_2 .= ' sp.strategy_name LIKE "%'.$keyword.'%" ';
            $where_sql_2 .= ' OR sp.stock_name LIKE "%'.$keyword.'%" ';
            $where_sql_2 .= ' OR sp.currency LIKE "%'.$keyword.'%" ';
            $where_sql_2 .= ' ) ';
        }
        $calc_type = trim($request->get_param("calc_type"));

        

        $order_by = ' ORDER BY date_sent DESC';
        $limit = ' LIMIT 0, 100';            

        global $wpdb;

        $wpdb->get_results("UPDATE `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id SET a.is_viewed = 1 WHERE s.user_id = '".$user_id."' AND a.is_viewed = 0 AND s.calc_type = '".$calc_type."' ");
        
        $currencySymbol=array("USD"=>"&#36;","GBP"=>"&pound;","EUR"=>"&euro;");

        if(!empty( $alert_for ) && $alert_for == "Buy") {

            $total_records = $wpdb->get_row("SELECT sum(T.total_rows) as total_rows FROM (SELECT count(a.alert_id) as total_rows FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."'  AND s.calc_type = '".$calc_type."' AND a.alert_for ='Buy' $where_sql_1 ");

            $search_sql = "SELECT a.alert_id, a.detail_id, a.date_sent, a.triggered_price, a.alert_for, s.strategy_id, s.strategy_name, s.stock_name, s.currency, s.`52_week_high` as week_high, s.your_investment, s.stock_price FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."' AND s.calc_type = '".$calc_type."' AND a.alert_for ='Buy' $where_sql_1 $order_by $limit";

        } else if($alert_for == "Sell") {

            $total_records = $wpdb->get_row("SELECT sum(T.total_rows) as total_rows FROM (
            SELECT count(ap.alert_id) as total_rows FROM `clubs_strategy_alerts` ap inner join `clubs_strategy_profits` sd ON ap.detail_id = sd.profit_id INNER JOIN `clubs_strategy` sp ON sd.strategy_id = sp.strategy_id WHERE sp.user_id = '".$user_id."'  AND sp.calc_type = '".$calc_type."'  AND ap.alert_for ='Sell' $where_sql_2) as T 
            ");

            $search_sql = "SELECT ap.alert_id, ap.detail_id, ap.date_sent, ap.triggered_price, ap.alert_for, sp.strategy_id, sp.strategy_name, sp.stock_name, sp.currency, sp.`52_week_high` as week_high, sp.your_investment, sp.stock_price FROM `clubs_strategy_alerts` ap inner join `clubs_strategy_profits` p ON ap.detail_id = p.profit_id INNER JOIN `clubs_strategy` sp ON p.strategy_id = sp.strategy_id WHERE sp.user_id = '".$user_id."' AND sp.calc_type = '".$calc_type."' AND ap.alert_for ='Sell' $where_sql_2 $order_by $limit";

        } else {

            $total_records = $wpdb->get_row("SELECT sum(T.total_rows) as total_rows FROM (SELECT count(a.alert_id) as total_rows FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."'  AND s.calc_type = '".$calc_type."' AND a.alert_for ='Buy' $where_sql_1
            UNION
            SELECT count(ap.alert_id) as total_rows FROM `clubs_strategy_alerts` ap inner join `clubs_strategy_profits` sd ON ap.detail_id = sd.profit_id INNER JOIN `clubs_strategy` sp ON sd.strategy_id = sp.strategy_id WHERE sp.user_id = '".$user_id."'  AND sp.calc_type = '".$calc_type."'  AND ap.alert_for ='Sell' $where_sql_2) as T 
            ");

            $search_sql = "SELECT a.alert_id, a.detail_id, a.date_sent, a.triggered_price, a.alert_for, s.strategy_id, s.strategy_name, s.stock_name, s.currency, s.`52_week_high` as week_high, s.your_investment, s.stock_price FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."' AND s.calc_type = '".$calc_type."' AND a.alert_for ='Buy' $where_sql_1 
            UNION 
            SELECT ap.alert_id, ap.detail_id, ap.date_sent, ap.triggered_price, ap.alert_for, sp.strategy_id, sp.strategy_name, sp.stock_name, sp.currency, sp.`52_week_high` as week_high, sp.your_investment, sp.stock_price FROM `clubs_strategy_alerts` ap inner join `clubs_strategy_profits` p ON ap.detail_id = p.profit_id INNER JOIN `clubs_strategy` sp ON p.strategy_id = sp.strategy_id WHERE sp.user_id = '".$user_id."' AND sp.calc_type = '".$calc_type."' AND ap.alert_for ='Sell' $where_sql_2  
         $order_by $limit";

        }

        $result = $wpdb->get_results( $search_sql );

        $response_data2 = [];
        foreach($result as $row){ 
            $chart_string = '<a class="open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="graph_tab_content"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>';
            $edit_string = '<a class="edit_link open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="strategy_edit_tab_content"><i class="fa fa-edit" aria-hidden="true"></i></a>';
            $action_string = '<a class="dismiss_link" data-alertid="'.$row->alert_id.'">DISMISS</a>';

            $strategy_name_string = '<a class="open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="strategy_recap_tab_content">'.$row->strategy_name.'</a>';
            if($row->triggered_price >= 1){
                $triggered_price = number_format($row->triggered_price, 2, '.', '');
            }else{
                $triggered_price = number_format($row->triggered_price, 6, '.', '');
            }
            $response_data2[] = [

                date("d-m-Y", strtotime($row->date_sent)),
                $strategy_name_string,
                $row->stock_name,
                $currencySymbol[$row->currency].$triggered_price,
                $row->alert_for,
                $chart_string,
                $edit_string,
                $action_string
            ];
        }
       
        $response_data = [
          "draw" => 1,
          "recordsTotal" => $total_records->total_rows,
          "recordsFiltered" => $total_records->total_rows,
          "data" => $response_data2
        ];    

        $response = new \WP_REST_Response($response_data);
        return $response;

        if(!empty($user_id)){
        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
        }
    }

    static function delete_alert(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
                
        if(!empty($user_id)){

            global $wpdb;
            $alert_id = trim($request->get_param("alert_id"));

            $result = $wpdb->delete( self::$table_alerts, array( 'alert_id' => $alert_id ) );
           
            $response['success'] = $result;

            $response = new \WP_REST_Response($response);
            return $response;

        }else{
            return new \WP_REST_Response('Unauthorized Access', 401);
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

    static function get_unique_strategy_name($user_id, $strategy_name, $calc_type, $original_strategy_name, $cnt) {
        
        global $wpdb;
        $original_strategy_name = $original_strategy_name;

        $chkStrategyName = $wpdb->get_row("SELECT count(`strategy_id`) as total_rows FROM `clubs_strategy` WHERE `user_id` = $user_id AND `calc_type` = '".$calc_type."' AND `strategy_name` = '".$strategy_name."' ");

        $new_strategy_name = '';
                    
        if($chkStrategyName->total_rows == 0) {            
            return $strategy_name; 
        } else { 
            // $base_name = explode(" (", $strategy_name);          
            $new_strategy_name = $original_strategy_name." (".$cnt.")";
            $new_cnt = $cnt + 1;
            return self::get_unique_strategy_name($user_id, $new_strategy_name, $calc_type, $original_strategy_name, $new_cnt);
        }
    }


    static function get_commodity_live_price($label, $currency) {        
        
        $apiKey = 'CQYJMIKEKRIP18WO';
        $sName = explode(" - ", $label);
 
        if($sName[0] == "XAU" || $sName[0] == "XAG") {
            $apiEndpoint = 'https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency='.$sName[0].'&to_currency='.$currency.'&apikey=' . $apiKey;
            $response = file_get_contents($apiEndpoint);

            $data = json_decode($response, true);

            $price = round($data['Realtime Currency Exchange Rate']['5. Exchange Rate'], 2);
            
            return $price;
        }

        /*if($sName[0] == "USOIL" || $sName[0] == "UKOIL") {
            if($sName[0] == "USOIL") {
                $apiEndpoint = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=CL&apikey=' . $apiKey;
            } else {
                $apiEndpoint = 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=BZ&apikey=' . $apiKey;
            }
            
            $response1 = file_get_contents($apiEndpoint);

            $data = json_decode($response1, true);
            $price = $data['Global Quote']['05. price'];

            return $price;
        }*/

        if($sName[0] == "USOIL" || $sName[0] == "UKOIL" || $sName[0] == "Copper") {
            if($sName[0] == "USOIL") {
                $apiEndpoint = 'https://www.alphavantage.co/query?function=WTI&interval=daily&apikey=' . $apiKey;
            } else if($sName[0] == "UKOIL") {
                $apiEndpoint = 'https://www.alphavantage.co/query?function=BRENT&interval=daily&apikey=' . $apiKey;
            } else if($sName[0] == "Copper") {
                $apiEndpoint = 'https://www.alphavantage.co/query?function=COPPER&interval=daily&apikey=' . $apiKey;
            }
            
            $response1 = file_get_contents($apiEndpoint);

            $data = json_decode($response1, true);
            $price = $data['data'][0]['value'];

            if($sName[0] == "Copper") {
               $price =  $data['data'][0]['value'] / 2000;
            }
            return $price;
        }        

    }

}    