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
            $detail_data = json_decode($request->get_param("strategy_detail_json"), true);
            $profit_data = json_decode($request->get_param("profit_detail_json"), true);
            $strategy_id = $request->get_param("id");

            if(!empty($strategy_data) && !empty($detail_data)) {
           
                if($strategy_id) { 
                    $result = $wpdb->get_results("SELECT strategy_id FROM clubs_strategy WHERE strategy_id=$strategy_id AND user_id=$user_id LIMIT 1");
                }
                if(empty($result)) {  
                    
                    $strategy_name = self::get_unique_strategy_name($user_id, $strategy_data['strategy_name'], $strategy_data['calc_type'], $strategy_data['strategy_name'], 1);
                    
                    $wpdb->insert(self::$table_strategy, [
                        'user_id' => $user_id,
                        'calc_type' => $strategy_data['calc_type'],
                        'strategy_name' => $strategy_name,
                        'stock_name' => $strategy_data['stock_name'],
                        'currency' => $strategy_data['currency'],
                        'stock_price' => $strategy_data['stock_price'],
                        '52_week_high' => $strategy_data['52_week_high'],
                        'your_investment' => $strategy_data['your_investment'],
                        'total_gain_loss' => $strategy_data['total_gain_loss'],
                        'total_gain_loss_percentage' => $strategy_data['total_gain_loss_percentage'],
                        'total_investment' => $strategy_data['total_investment'],
                        'total_share_buy' => $strategy_data['total_share_buy'],
                        'average_share_price' => $strategy_data['average_share_price'],
                        'share_price_difference' => $strategy_data['share_price_difference'],
                        'date_added' => date("Y-m-d H:i:s"),
                        'is_deleted' => 1,
                    ],
                    ['%d','%s','%s','%s','%s','%f','%f','%f','%f','%f','%f','%f','%f','%f','%s','%d']);

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
                                'sale_percent_profit' => $profit_row['profit_percent'],
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
                        $wpdb->update(self::$table_profits, [
                            'strategy_id' => $strategy_id,  
                            'alert_id' => 0,                            
                            'date_sale' => $profit_row['date_sale'],
                            'sale_sum' => $profit_row['sale_sum'],
                            'sale_percent_profit' => $profit_row['profit_percent'],
                            'your_fiat_sale_sum' => $profit_row['your_fiat_sale_sum'],
                            'take_profit_price' => $profit_row['take_profit_price'],
                            'your_take_profit_price' => $profit_row['your_take_profit_price'],
                            'number_of_tokens' => $profit_row['number_of_tokens'],
                            'exchange_fees' => $profit_row['exchange_fees'],
                            'trade_cost' => $profit_row['trade_cost'],
                            'current_holding' => $profit_row['current_holding'],
                            'alert_flag' => $profit_row['alert_flag'],
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


    static function get_strategy(  \WP_REST_Request $request ){

        $user_id = parent::pb_auth_user($request);
        
        if(!empty($user_id)){

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
            }
            /* START : Get stock live price */
            if($calc_type == "VCA") {
                $conversion = 1;
                if( $currency != 'USD') {                
                    $conversion = json_decode( file_get_contents('https://api.polygon.io/v2/aggs/ticker/C:USD'.$currency.'/prev?adjusted=true&apiKey='.$token),true)['results'][0]['c'];
                }

                $url = 'https://api.polygon.io/v2/aggs/ticker/'.$stock_name.'/range/1/day/'.date('Y-m-d', strtotime('- 7 days')).'/'.date('Y-m-d').'?adjusted=true&sort=desc&limit=7&apiKey='.$token;
                
                $json = self::get_curl($url);
                $data = json_decode($json,true);
                 
                $live_stock_price = round($data['results'][0]['c'] * $conversion, 2);
            } else {
                $url = 'https://crypto.investment-mastery.co/quote/'.$stock_name.'/'.$currency;
                $ticker_req = self::get_curl($url, $referer);
                $data = json_decode($ticker_req, true)['data'];

                if( empty($data) || $data['status'] == 500) {
                     
                    $url = 'https://edu.investment-mastery.com/crypto/getprices/?symbol='.$stock_name.'&currency='.$currency;
                    $ticker_req = self::get_curl($url, $referer);
                    $data_min = json_decode($ticker_req, true)['data'][$stock_name]['quote'][$currency];
                    $live_stock_price = $data_min['price'];

                } else {
                    $live_stock_price = $data['price'];
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

        $start_date  = $request->get_param("start_date");
        $end_date  = $request->get_param("end_date");
        $stock_name  = $request->get_param("stock_name");
        $currency  = $request->get_param("currency");
        $keyword  = $request->get_param("search_keyword");
        $calc_type  = $request->get_param("calc_type");

        $limit_start  = $request->get_param("start");
        $limit_length  = $request->get_param("length");

        if(!empty( $start_date ) && !empty( $end_date )) {
            $where .= ' AND date_added >= "'.$start_date.' 00:00:00" AND date_added <= "'.$end_date.' 23:59:59"';
        }

        if(!empty( $stock_name ) ) {
            $where .= ' AND stock_name = "'.$stock_name.'" ';
        }

        if(!empty( $currency ) ) {
            $where .= ' AND currency = "'.$currency.'" ';
        }

        if(!empty( $calc_type ) ) {
            $where .= ' AND calc_type = "'.$calc_type.'" ';
        }

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

            $response_data2[] = [
                date("d-m-Y", strtotime($row->date_added)),
                $strategy_name_string,
                $row->stock_name,
                $row->currency,
                $action_string
            ];
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
        $calc_type = trim($request->get_param("calc_type"));

        $where = '';
        $response_data = '';

        $order_by = ' ORDER BY date_sent DESC';
        $limit = ' LIMIT 0, 100';            

        global $wpdb;

        $wpdb->get_results("UPDATE `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id SET a.is_viewed = 1 WHERE s.user_id = '".$user_id."' AND a.is_viewed = 0 AND s.calc_type = '".$calc_type."' ");
        
        $currencySymbol=array("USD"=>"&#36;","GBP"=>"&pound;","EUR"=>"&euro;");

        $total_records = $wpdb->get_row("SELECT sum(T.total_rows) as total_rows FROM (SELECT count(a.alert_id) as total_rows FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."'  AND s.calc_type = '".$calc_type."' AND a.alert_for ='Buy'
            UNION
            SELECT count(a.alert_id) as total_rows FROM `clubs_strategy_alerts` a inner join `clubs_strategy_profits` sd ON a.detail_id = sd.profit_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."'  AND s.calc_type = '".$calc_type."'  AND a.alert_for ='Sell') as T
            ");

         $search_sql = "SELECT a.alert_id, a.detail_id, a.date_sent, a.triggered_price, a.alert_for, s.strategy_id, s.strategy_name, s.stock_name, s.currency, s.`52_week_high` as week_high, s.your_investment, s.stock_price FROM `clubs_strategy_alerts` a inner join `clubs_strategy_details` sd ON a.detail_id = sd.detail_id INNER JOIN `clubs_strategy` s ON sd.strategy_id = s.strategy_id WHERE s.user_id = '".$user_id."' AND s.calc_type = '".$calc_type."' AND a.alert_for ='Buy' 
            UNION 
            SELECT ap.alert_id, ap.detail_id, ap.date_sent, ap.triggered_price, ap.alert_for, sp.strategy_id, sp.strategy_name, sp.stock_name, sp.currency, sp.`52_week_high` as week_high, sp.your_investment, sp.stock_price FROM `clubs_strategy_alerts` ap inner join `clubs_strategy_profits` p ON ap.detail_id = p.profit_id INNER JOIN `clubs_strategy` sp ON p.strategy_id = sp.strategy_id WHERE sp.user_id = '".$user_id."' AND sp.calc_type = '".$calc_type."' AND ap.alert_for ='Sell'
         $order_by $limit";

        $result = $wpdb->get_results( $search_sql );

        $response_data2 = [];
        foreach($result as $row){ 
            $chart_string = '<a class="open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="graph_tab_content"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>';
            $edit_string = '<a class="edit_link open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="strategy_edit_tab_content"><i class="fa fa-edit" aria-hidden="true"></i></a>';
            $action_string = '<a class="dismiss_link" data-alertid="'.$row->alert_id.'">DISMISS</a>';

            $strategy_name_string = '<a class="open_popup" data-popup="#vca_popup" data-strategyid="'.$row->strategy_id.'" data-action="strategy_recap_tab_content">'.$row->strategy_name.'</a>';

            $response_data2[] = [
                date("d-m-Y", strtotime($row->date_sent)),
                $strategy_name_string,
                $row->stock_name,
                $currencySymbol[$row->currency].$row->triggered_price,
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

}    