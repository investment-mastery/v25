<?php
/*
 * Template name: CMC My Alerts Template
 *
 */

get_header();

$club = get_club_slug();

?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/vca.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<div class="container-fluid vca-cca-calculator" id="allData">
    <div class="col-lg-12 col-sm-12"> 
      <div class="tab_mobile_scroll">      
        <div class="entry-header tab">
            <a class="tablinks tab_first" href="/cm-calculator">Contrarian Momentum Calculator</a>
            <!-- <a class="tablinks" href="/cmc-calculator">Strategy</a> -->
            <a class="tablinks" href="/cmc-my-strategy">My Strategies</a>
            <a class="tablinks active" onclick="openContent(event, 'my-alerts')">My Alerts</a>
        </div>
       </div> 
    </div>
    
    <!-- Tab panes -->
    <div class="tab-content" id="fullpage">

        <div id="my-alerts" class="container tab-pane">
            <div class="col-lg-12 col-sm-12">
                <div class="search-filters">
                    <!-- <p>All are your saved startegies get listed below.</p> -->
                    <div class="col-lg-3 col-sm-12 my-stra-text" style="margin-left:0;">
                        <button type="button" class="btn btn-default" id="sevieces_tbl_date"S>
                            <span>
                                <i class="fa fa-calendar mr-1" style="color: #9da5ae;"></i> 
                                <span class="date-range-lbl"><?php echo date("m-d-Y", strtotime('-30 days'))." - ".date("m-d-Y");?></span>
                            </span>
                            <i class="fa fa-angle-down date-btn"></i>
                        </button>  
                    </div>  

                    <div class="col-lg-2 col-sm-12 my-stra-text2">
                        <i class="fa fa-signal mr-1 stock-icon"></i>
                        <input type="text" class="" name="stock" id="stock_filter"  value="" title="Crypto Search..." placeholder="Crypto" >
                    </div>

                    <div class="col-lg-2 col-sm-12 my-stra-text2">
                        <i class="fa fa-money mr-1 stock-icon"></i> <select name="currency_search" class="form-select form-select-lg form-control" id="currency_search" placeholder-text="Currency">
                            <option value=""></option>
                            <option value="GBP">GBP</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="AUD">AUD</option>
                            <option value="BTC">BTC</option>
                        </select>
                    </div>

                    <div class="col-lg-2 col-sm-12 my-stra-text2">
                        <i class="fa fa-money mr-1 stock-icon"></i> <select name="alert_search" class="form-select form-select-lg form-control" id="alert_search" placeholder-text="Alert for">
                            <option value=""></option>
                            <option value="Buy">Buy</option>
                            <option value="Sell">Sell</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-sm-12 my-stra-text1" style="margin-right:0;">
                        <i class="fa fa-search mr-1 stock-icon"></i><input type="text" class="search_input" name="txtSearch" id="txtSearch" placeholder="Search" />
                    </div>

                </div>
                <div class="calculate">
                    <p>You are now looking at your latest <span id="alert_total"></span> strategy alerts.</p>   
                </div>
                <div class="table-responsive-lg my-strategy-table">
                    <table id="my_alert_listing" class="table table-striped text-center display" >
                        <thead>
                            <tr>
                                <th class="first_row">Date</th>
                                <th>Strategy</th>
                                <th>Crypto</th>
                                <th>Triggered Price</th>
                                <th class="last_row">Alert for</th>
                                <th class="last_row">Chart</th>
                                <th class="last_row">Edit Strategy</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
                              
            </div>
        </div>       
             
    </div>      
</div>

<div id="vca_popup" class="overlay">
        <div class="popup"  style="max-width:1150px !important;">
            <a class="close close_popup" data-popup="#vca_popup">&times;</a>
            <div class="content">
                <div id="popup_message"></div>
                <div id="outer_tab_content">
                <div class="new_scroll"> 
                <div class="entry-header popup_tab">
                    <a class="popup_tablinks tab_first link_strategy_recap_tab_content active" id="link_strategy_recap_tab_content" onclick="openPopupContent(event, 'strategy_recap_tab_content')">Strategy Recap</a>
                    <a class="popup_tablinks link_strategy_edit_tab_content" id="link_strategy_edit_tab_content" onclick="openPopupContent(event, 'strategy_edit_tab_content')">Edit Strategy</a>
                    <a class="popup_tablinks link_strategy_profit_tab_content" id="link_strategy_profit_tab_content" onclick="openPopupContent(event, 'strategy_profit_tab_content')">Strategy Profit</a>
                    <a class="popup_tablinks link_graph_tab_content" id="link_graph_tab_content" onclick="openPopupContent(event, 'graph_tab_content')">Chart</a>
                </div>
                </div>
                <!-- START : Recap popup content tab -->
                <div id="strategy_recap_tab_content">
                    <div class="calculate">
                        <div class="edit_header_row">
                            <div class="edit_header_row_1_3 row_left">
                                <p>Strategy Name: <span id="view_header_strategy_name"></span></p>
                            </div>
                            <div class="edit_header_row_1_4 row_right">
                                <p>Live Crypto Price <button class="edit_blue_box" id="view_header_live_price"></button></p>
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left">
                                        <p>Base Currency  <button class="edit_blue_box" id="view_header_stock_name"></button></p>
                                    </div>
                                    <div class="edit_header_row_1 row_right">
                                        <p>Quote Currency <button class="edit_blue_box" id="view_header_currency"></button></p>
                                    </div>
                                </div>
                            </div>
                            <div class="edit_header_row_1 row_right">                                
                                <div class="edit_header_row_1 row_left">
                                    <p>Trade Amount <button class="edit_blue_box" id="view_header_investment"></button></p>
                                </div>
                                <div class="edit_header_row_1 row_right">
                                    <p>Current RSI <button class="edit_blue_box" id="view_header_curr_high"></button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="view-strategy-table">
                        <table class="table table-striped text-center" style="background-color:#efefef;">
                            <thead>
                                <tr class="vca_table_head">
                                    <!-- <th>Entry Levels</th> -->
                                    <th>Entry Price</th>
                                    <th>Investment (<span class="currency1_symbol">USD</span>)</th>
                                    <th>% of The Total Investment</th>
                                    <th>Value (<span class="currency2_symbol">USD</span>)</th>
                                    <th>Total # Value (<span class="currency2_symbol">USD</span>)</th>
                                    <th>Average Price / Token</th>
                                </tr>
                            </thead>
                            <tbody id="recap_tbl_body">
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="calculate">
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <p>Result: <span id="view_header_result"></span></p>
                            </div>
                            <div class="edit_header_row_1 row_right">
                                <p>Total Gain/Loss: <span id="view_header_gain_loss"></span></p>
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left edit_header_outer_left">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left edit_header_outer_div_left">
                                        <div class="edit_header_top_div">Total Invested To Date</div>
                                        <div class="edit_header_bottom_div" id="view_header_total_invest"></div>
                                    </div>
                                    <div class="edit_header_row_1 row_right edit_header_outer_div_right">
                                        <div class="edit_header_top_div">Total Amount Purchased</div>
                                        <div class="edit_header_bottom_div" id="view_header_total_share"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="edit_header_row_1 row_right edit_header_outer_right">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left edit_header_outer_div_left">
                                        <div class="edit_header_top_div">Average Price</div>
                                        <div class="edit_header_bottom_div" id="view_header_average_price"></div>
                                    </div>
                                    <div class="edit_header_row_1 row_right edit_header_outer_div_right">
                                        <div class="edit_header_top_div">Difference in Price</div>
                                        <div class="edit_header_bottom_div" id="view_header_price_diff"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END : Recap popup content tab -->

                <!-- START : Edit popup content tab -->
                <div class="content_edit" id="strategy_edit_tab_content">
                    <div class="calculate">
                        <div class="edit_header_row">
                            <div class="edit_header_row_1_3 row_left">
                                <p id="edit_strategy_name_p">Strategy Name: <span id="edit_header_strategy_name"></span></p>
                                <input type="hidden" name="edit_header_strategy_name_old" id="edit_header_strategy_name_old">
                            </div>
                            <div class="edit_header_row_1_4 row_right">
                                <p>Live Crypto Price <button class="edit_blue_box" id="edit_header_live_price"></button></p>
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left">
                                        <p>Base Currency  <button class="edit_blue_box" id="edit_header_stock_name"></button></p>
                                    </div>
                                    <div class="edit_header_row_1 row_right">
                                        <p>Quote Currency <button class="edit_blue_box" id="edit_header_currency"></button></p>
                                    </div>
                                </div>
                            </div>
                            <div class="edit_header_row_1 row_right">
                                <div class="edit_header_row_1 row_left">
                                    <p id="edit_header_investment_p">Trade Amount <button class="edit_blue_box" id="edit_header_investment"></button></p>
                                    <input type="hidden" name="edit_header_investment_old" id="edit_header_investment_old">
                                </div>
                                <div class="edit_header_row_1 row_right">
                                    <p>Current RSI <button class="edit_blue_box" id="edit_header_curr_high"></button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Strategy-table edit-popup-table" id="edit-Strategy-table">
                        <table class="table table-striped text-center" id="edit_strategy_table" style="background-color:#efefef;">
                            <thead style="text-align: center;">
                                <tr>
                                    <!-- <th>Entry Levels</th> -->
                                    <th>Date</th>
                                    <th>Your Entry Price</th>
                                    <th>Volume (<span class="currency1_symbol">USD</span>)</th>
                                    <th>Value (<span class="currency2_symbol">USD</span>)</th>
                                    <th>Total # Value (<span class="currency2_symbol">USD</span>)</th>
                                    <!-- <th>Average Price / Token</th> -->
                                    <th>Cost</th>
                                    <th>Alerts</th>
                                </tr>
                            </thead>
                            <tbody id="edit-Strategy-table-body">
                                
                            </tbody>
                        </table>

                        <input type="hidden" name="edit_strategy_id" id="edit_strategy_id">
                        <input type="hidden" name="edit_stock_ticker" id="edit_stock_ticker">
                        <input type="hidden" name="edit_currency" id="edit_currency">
                        <input type="hidden" name="edit_investment" id="edit_investment">
                        <input type="hidden" name="edit_current_high" id="edit_current_high">
                        <input type="hidden" name="edit_open_prize" id="edit_open_prize">

                        <input type="hidden" name="edit_result_val" id="edit_result_val">
                        <input type="hidden" name="edit_total_gain_loss_val" id="edit_total_gain_loss_val">
                        <input type="hidden" name="edit_total_gain_loss_percentage" id="edit_total_gain_loss_percentage">


                        <input type="hidden" name="edit_total_invested_val" id="edit_total_invested_val">
                        <input type="hidden" name="edit_total_amt_share_val" id="edit_total_amt_share_val">
                        <input type="hidden" name="edit_avg_price_val" id="edit_avg_price_val">
                        <input type="hidden" name="edit_differance_in_price_val" id="edit_differance_in_price_val">

                        <input type="hidden" name="edit_entery_tbl_level1" id="edit_entery_tbl_level1">
                        <input type="hidden" name="edit_entery_tbl_no_shares1" id="edit_entery_tbl_no_shares1">
                        <input type="hidden" name="edit_entery_tbl_invest1" id="edit_entery_tbl_invest1">
                        <input type="hidden" name="edit_entery_level_val" id="edit_entery_level_val">
                        <input type="hidden" name="edit_cm_type" id="edit_cm_type">
                        <input type="hidden" name="edit_strategy_type" id="edit_strategy_type">
                        <div style="display:none">
                        
                        </div>
                        
                    </div>

                    <div class="calculate">
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <p>Result: <span id="edit_header_result"></span></p>
                            </div>
                            <div class="edit_header_row_1 row_right">
                                <p>Total Gain/Loss: <span id="edit_header_gain_loss"></span></p>
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left edit_header_outer_left" >
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left edit_header_outer_div_left">
                                        <div class="edit_header_top_div">Total Invested To Date</div>
                                        <div class="edit_header_bottom_div" id="edit_header_total_invest"></div>
                                    </div>
                                    <div class="edit_header_row_1 row_right edit_header_outer_div_right">
                                        <div class="edit_header_top_div">Total Amount Purchased</div>
                                        <div class="edit_header_bottom_div" id="edit_header_total_share"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="edit_header_row_1 row_right edit_header_outer_right">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left edit_header_outer_div_left">
                                        <div class="edit_header_top_div">Average Price</div>
                                        <div class="edit_header_bottom_div" id="edit_header_average_price"></div>
                                    </div>
                                    <div class="edit_header_row_1 row_right edit_header_outer_div_right">
                                        <div class="edit_header_top_div">Difference in Price</div>
                                        <div class="edit_header_bottom_div" id="edit_header_price_diff"></div>
                                         <input type="hidden" name="edit_header_average_price_input" id="edit_header_average_price_input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="clear: both;">
                        <div class="edit-link-div">
                           <a href="/cm-calculator"> <button type="button" class="btn-calculate"><i class="fa fa-calculator" aria-hidden="true"></i>CM Calculator</button></a>
                            <button type="button" class="btn-calculate" onclick="downloadExcel()"> <i class="fa fa-download" aria-hidden="true" ></i>Download Excel</button>
                        </div>
                        <div class="edit-button-div">
                            <button type="button" class="btn-light-save" id="update_stratergy">SAVE</button> 
                            <button type="button" class="btn-light-save close_popup" data-popup="#vca_popup">CANCEL</button>
                        </div>
                    </div>
                </div>
                <!-- END : Edit popup content tab -->

                <!-- START : Profit popup content tab -->
                <div id="strategy_profit_tab_content">
                    <div class="calculate">
                        <div class="edit_header_row">
                            <div class="edit_header_row_1_3 row_left">
                                <p id="edit_strategy_name_p2">Strategy Name: <span id="profit_header_strategy_name"></span></p>
                                <input type="hidden" name="profit_header_strategy_name_old" id="profit_header_strategy_name_old">
                            </div>
                            <div class="edit_header_row_1_4 row_right">
                                <p>Live Crypto Price <button class="edit_blue_box" id="profit_header_live_price"></button></p>
                                <input type="hidden" name="profit_header_live_price_input" id="profit_header_live_price_input">
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left">
                                        <p>Base Currency  <button class="edit_blue_box" id="profit_header_stock_name"></button></p>
                                    </div>
                                    <div class="edit_header_row_1 row_right">
                                        <p>Quote Currency <button class="edit_blue_box" id="profit_header_currency"></button></p>
                                    </div>
                                </div>
                            </div>
                            <div class="edit_header_row_1 row_right">
                                <div class="edit_header_row_1 row_left">
                                    <p id="profit_header_investment_p">Trade Amount <button class="edit_blue_box" id="profit_header_investment"></button></p>
                                    <input type="hidden" name="profit_header_investment_old" id="profit_header_investment_old">
                                </div>
                                <div class="edit_header_row_1 row_right">
                                    <p>Current RSI <button class="edit_blue_box" id="profit_header_curr_high"></button></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profit-strategy-table">
                        <table class="table table-striped text-center" id="edit_profit_table" style="background-color:#efefef;">
                            <thead>
                                <tr class="vca_table_head">
                                    <th>Date</th>
                                    <th>% Profit</th>
                                    <th>Current Holdings (<span class="profit_currency2_symbol">USD</span>)</th>
                                    <th>Sale Sum (<span class="profit_currency2_symbol">USD</span>)</th>
                                    <th>Take Profit Price</th>
                                    <th>Your Take Profit Price</th>
                                    <th>Profit Value (<span class="profit_currency1_symbol">USD</span>)</th>
                                    <th>Exchange Fees %</th>
                                    <th>Trade Cost</th>                                    
                                    <th>Alerts <!-- <input type="checkbox" name="checkAllP" id="checkAllP"> --></th>
                                </tr>
                            </thead>
                            <tbody id="profit_tbl_body">
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="calculate">
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <p>Result: <span id="profit_header_result"></span></p>
                            </div>
                            <div class="edit_header_row_1 row_right">
                                <p>Total Gain/Loss: <span id="profit_header_gain_loss"></span></p>
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left">
                                <p>Average Price: <span id="profit_header_average_price"></span></p>
                            </div>
                            <div class="edit_header_row_1 row_right">
                                <p>Difference in Price: <span id="profit_header_price_diff"></span></p>
                            </div>
                        </div>
                        <div class="edit_header_row">
                            <div class="edit_header_row_1 row_left edit_header_outer_left">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left edit_header_outer_div_left">
                                        <div class="edit_header_top_div">Current Value of Holdings (<span class="currency1_symbol">USD</span>)</div>
                                        <div class="edit_header_bottom_div" id="profit_header_current_holding_value"></div>
                                    </div>
                                    <div class="edit_header_row_1 row_right edit_header_outer_div_right">
                                        <div class="edit_header_top_div">Total Sold Amount (<span class="currency2_symbol">USD</span>)</div>
                                        <div class="edit_header_bottom_div" id="profit_header_total_sold"></div>
                                        <input type="hidden" name="profit_header_total_token_sell" id="profit_header_total_token_sell">
                                    </div>
                                </div>
                            </div>
                            <div class="edit_header_row_1 row_right edit_header_outer_right">
                                <div class="edit_header_row">
                                    <div class="edit_header_row_1 row_left edit_header_outer_div_left">
                                        <div class="edit_header_top_div">Total Profit Value (<span class="currency1_symbol">USD</span>)</div>
                                        <div class="edit_header_bottom_div" id="profit_header_total_share_sell"></div>
                                    </div>
                                    <div class="edit_header_row_1 row_right edit_header_outer_div_right">
                                        <div class="edit_header_top_div">Current Holdings  (<span class="currency2_symbol">USD</span>)</div>
                                        <div class="edit_header_bottom_div" id="profit_header_holding_share"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="clear: both;">
                        <div class="edit-link-div">
                           <a href="/cm-calculator"> <button type="button" class="btn-calculate"><i class="fa fa-calculator" aria-hidden="true"></i>CM Calculator</button></a>
                            <button type="button" class="btn-calculate" onclick="downloadExcel()"> <i class="fa fa-download" aria-hidden="true" ></i>Download Excel</button>
                        </div>
                        <div class="edit-button-div">
                            <button type="button" class="btn-light-save" id="update_stratergy">SAVE</button> 
                            <button type="button" class="btn-light-save close_popup" data-popup="#vca_popup">CANCEL</button>
                        </div>
                    </div>
                </div>
                <!-- END : Profit popup content tab -->

                <!-- START : Graph popup content tab -->
                <div id="graph_tab_content">
                    <div class="content">
                        <div class="Strategy-table edit-popup-table">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div id="tradingview_c9767"></div>
                                <div class="tradingview-widget-copyright">&nbsp;</div>
                            </div>
                            <!-- TradingView Widget END -->    
                        </div>
                    </div>
                </div>
                <!-- END : Graph popup content tab -->
                </div>
            </div>
        </div>
</div>



    <!------------------> 
    <div class="row d-none" style="display: none;" >
        <form method="Post" id="pdf_gen" action="/cmc-download-excel/" target="_blank">
            <input type="hidden" name="strategy_name" id="strategy_name_excel">
            <input type="hidden" name="symbol" id="symbol_excel">
            <input type="hidden" name="currency" id="currency_excel">
            <input type="hidden" name="investment" id="investment_excel">
            <input type="hidden" name="current_hight" id="current_hight_excel">
            <!-- <textarea name="section1" id="section1"></textarea> -->
            <textarea name="section2" id="section2"></textarea>
            <input type="hidden" name="result_val" id="result_val">
            <input type="hidden" name="total_gain_loss_val" id="total_gain_loss_val">
            <input type="hidden" name="total_invested_val" id="total_invested_val">
            <input type="hidden" name="total_amt_share_val" id="total_amt_share_val">
            <input type="hidden" name="avg_price_val" id="avg_price_val">
            <input type="hidden" name="differance_in_price_val" id="differance_in_price_val">
            <input type="hidden" name="excel_entery_tbl_level1" id="excel_entery_tbl_level1">
            <input type="hidden" name="excel_entery_tbl_no_shares1" id="excel_entery_tbl_no_shares1">
            <input type="hidden" name="excel_entery_tbl_invest1" id="excel_entery_tbl_invest1">
        </form>
    </div>
    <!------------------>
    
<style>
input[type=date]:required:invalid::-webkit-datetime-edit {
    color: transparent;
}
input[type=date]:focus::-webkit-datetime-edit {
    color: black !important;
}

@supports (-moz-appearance:button) and (contain:paint) {
    input[type=date]:required:invalid {
        color: transparent;
    }
    input[type=date]:focus {
        color: black !important;
    }
}

.select-dropdown {
    width: 100%;
}
.my-stra-text2 {
    width: 15%;
    margin: 0 6px;
    float: left;
}

.my-stra-text1 {
    width: 27% !important;
}

#vca_popup .popup {
    font-family: "Source Sans Pro", sans-serif !important;
}

#vca_popup h3 {
    font-family: "Source Sans Pro", sans-serif !important;
}
#vca_popup h1 {
    font-family: "Source Sans Pro", sans-serif !important;
}


.purchase_date {
    width: 125px;
    padding-right: 5px !important;
}

.edit-link-div {
    float: left;
}

.edit-button-div {
    float: right;
}

.edit_header_row {
    width: 100%;
    clear: both;
}

.edit_header_row_1 {
    width: 50%;
    display: inline-block;
}

.edit_header_row_1_3 {
    width: 75%;
    display: inline-block;
}

.edit_header_row_1_4 {
    width: 25%;
    display: inline-block;
}

.edit_header_row .row_left {
    float: left;    
}

.row_left p{
    margin-right: 10px;
}
.row_right p{
    margin-left: 10px;
}

.edit_header_row .row_right{
    float: right;
}

.edit_header_row p {    
    padding: 5px;
    padding-left: 15px;
    border-radius: 4px;
    border: 1px solid #d0d0d0;
    text-align: left;
    font-family: "Source Sans Pro", sans-serif !important;
    font-size: 16px;
}

.edit_header_outer_div_left { 
    border-radius: 4px;
    border: 1px solid #d0d0d0;    
    text-align: center;
    font-family: "Source Sans Pro", sans-serif !important;
    font-size: 16px;
    line-height: 40px;
    width: 48%;
}

.edit_header_outer_div_right { 
    border-radius: 4px;
    border: 1px solid #d0d0d0;  
    text-align: center;
    font-family: "Source Sans Pro", sans-serif !important;
    font-size: 16px;
    line-height: 40px;
    width: 48%;
}

.edit_header_outer_left {
  padding-right: 10px;
  padding-bottom: 30px;
}

.edit_header_outer_right {
  padding-left: 10px;
  padding-bottom: 30px;
}

.edit_header_top_div {
    background-color: #e3e3e3;
}
.edit_header_bottom_div {
    font-weight: bold;
    font-size: 18px;
}

.edit_header_row span {    
    font-weight: bold;
}

.edit_blue_box {
    float: right;
    padding: 3px 20px;
    border-radius: 4px;
    background-color: #55a9f5;
    color: #ffffff;
    width: 105px;
}

#popup_message {
    text-align: center;
    vertical-align: middle;
}
#my-alerts {
    padding: 0 !important;
}
.overlay {
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}
.dismiss_link {
    font-size: 14px;
    padding: 3px 7px;
    background-color: #55a9f5;
    border-radius: 4px;
    color: #ffffff !important;
    cursor: pointer;
}
table.display {
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed;         
  word-wrap:break-word;       
}

div .dataTables_processing {
    width: 100% !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #55a9f5 !important;
}
.toolbar {
    float: left;
    width: 75%;
}
.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    padding-bottom: 10px;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
}
.page-item:first-child .page-link {
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}
.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}
.page-link {
    padding: 0.375rem 0.75rem !important;
    position: relative;
    display: block;
    color: #0d6efd;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #dee2e6;
    transition: color .15s
}
.my-strategy-table {
    padding-bottom: 50px !important;
}


#save_popup .popup {
    width: 650px !important;
}

#save_popup .content {
    min-height:120px; 
    text-align: left;
}

#save_popup .save_strategy_lbl {
    font-size: 22px;
    line-height: 40px;
    color: #909090;
}

#save_popup input {
    width: 100%;
}

.popup .close {
    cursor: pointer !important;
}
#save_popup .popup-heading {
    font-size: 36px; 
    font-weight: bold; 
    line-height: 50px;
}

#save_popup .save_popup_buttons {
    width: 100%;
    text-align: right;
}

#save_popup button {
    font-size: 14px !important;
    margin-right: 0px !important;
    margin-left: 10px !important;
    margin-bottom: 5px !important;
}

#vca_popup .calculate {
    text-align: center;
}
#vca_popup .popup {
    max-width:1100px !important;
}

#vca_popup .edit_real_cost {
    width: 100px;
}
    
pl-0{
    padding-left:0 !important;
}
    
button.btn-calculate {
    background-color: #fff;
    color: #1d395c;
    font-size: 18px;
    font-weight: 600;
}
button.btn-calculate:hover {
     background-color: #fff;
   
}
    
button.btn-calculate i{
    color: #b0b0b0;
    margin-right: 8px;
}
    
.btn-light-save {
    font-size: 18px !important;
    background-color: #55a9f5 !important;
    margin-left: 20px;
    font-family: 'Montserrat', sans-serif;
    padding: 8px 40px;
    text-transform: uppercase;
    border-radius: 5px;
}
    
#my_alert_listing td a {
    cursor: pointer !important;
}    

.select-dropdown__list {
    width: 95% !important;
    margin: 0px 0px 0px 0px !important;
    -webkit-box-shadow: 0px 0px 0px !important; 
    box-shadow: 0px 0px 0px !important;
}
    
i.zmdi.zmdi-chevron-down:before {
    content: "\f2f9";
    background-image :url("/wp-content/uploads/2021/06/arrowdown.png");
    background-repeat: no-repeat;
    background-position:center;
    float: right;
    color: #fff0;
}
    
span.select-dropdown.select-dropdown--0 {
    float: left;
    margin-left: 28px;
    width: 72%;
}
span.select-dropdown.select-dropdown--1 {
    float: left;
    margin-left: 28px;
    width: 72%;
}
    
.stock-icon {
    position: absolute;
    z-index: 1;
    padding: 10px;
    color: #9da5ae;
}

.search_input {
    background-color: #e7e7e7 !important;
    width: 100%;
    text-align: left !important;
    padding: 14px 6px;
    font-size: 16px !important;
    border: 1px solid #CACACA !important;
    font-weight: normal !important;
    height: 3.00em !important;
}

.row {
    clear: both;
    margin-left: -15px;
    margin-right: -15px;
}
.col-lg-3 {
    width: 23%;
    margin: 0 1%;
    float: left;
}
.my-stra-text {
    width: 20%;
    margin: 0 6px;
    float: left;
}

.my-stra-text1 {
    width: 37%;
    margin: 0 5px;
    float: left;
}

.daterangepicker td,.daterangepicker th {
    padding: 0px 0px !important;
}
.search-filters {
    min-height: 60px;
}

.search-filters button {
    background-color: #ffffff !important;
    width: 100%;
    border-radius: 6px !important;
    border : 1px solid #CACACA !important;
    font-size: 16px;
    color: #122b46;
    height: 38px !important;
    padding: 8px 10px !important;
}
    
input#txtSearch, input#stock_filter {
    background-color: #ffffff !important;
    font-size: 16px !important;
    padding: 8px 10px 8px 36px;
    height: 38px !important;
    color: #122b46;
    text-align: left;
    width: 100%;
}
    
input#txtSearch::placeholder, input#stock_filter::placeholder {
    color: #122b46;
    font-weight: normal !important;
}

.daterangepicker .btn-primary {
    color: #fff; 
    background-color: #0096f0 !important; 
    border-color: #f0f0f0 !important; 
    width: auto !important; 
    font-size: 11px !important; 
}
    


.select-dropdown button, .select-dropdown__button {
    border-radius: 6px !important;
    padding: 8px 10px !important;
}

.btn-light {
    font-size: 20px !important;
    background-color: #007CFF !important;
    margin: 20px;
    font-family: 'Montserrat', sans-serif;
    padding: 8px 40px;
    text-transform: uppercase;
    border-radius: 5px;
}
    
.date-btn {
    float: right;
    color: #818b97;
    font-size: 21px;
}

.btn {
    border-width: 2px;
    font-weight: 400;
    font-size: .8571em;
    line-height: 1.35em;
    border: none;
    border-radius: 0.1875rem;
    padding: 10px;
    cursor: pointer;    
    color: #212529;
    display: inline-block;    
    text-align: left;
    white-space: nowrap;
    vertical-align: middle;    
    user-select: none;   
    transition: all .2s ease-in-out;
}
.ui-tooltip-content {
    font-size: 16px;
}
.ui-tooltip, .arrow:after {
    background: #fff;
    box-shadow: 0px 0px 5px #666666 !important;
    border: 1px solid #c5c5c5 !important;
}
.ui-tooltip {
    padding: 10px 20px;
    font: 500 15px Montserrat, sans-serif;
}
.arrow {
    width: 70px;
    height: 16px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    margin-left: -35px;
    bottom: -16px;
}
.arrow.top {
    top: -16px;
    bottom: auto;
}
.arrow.left {
    left: 20%;
}
.arrow:after {
    content: "";
    position: absolute;
    left: 20px;
    top: -20px;
    width: 25px;
    height: 25px;
    box-shadow: 6px 5px 9px -9px black;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.arrow.top:after {
    bottom: -20px;
    top: auto;
}
.tab {
    margin-bottom: 2.1875rem;
    padding-bottom: 58px;
    background: 0 0;
    border-bottom:2px solid #122b46; 
}

.tab a {
    background-color: inherit;
    float: left;    
    outline: none;
    cursor: pointer;
    font-size: 1.75rem;
    font-family: 'Montserrat', sans-serif;
    font-weight: 700;    
    border: 1px solid transparent;
    box-sizing: border-box;
    padding: 15px;
    padding-bottom: 15px;
    color: #a6b0ba;
}

.tab a:hover {
    color: #a6b0ba;
}

.tab a.active {
    background-color: #0000;
    
    color: #122b46;
    border-bottom: 2px solid #0099f0 !important;
    padding-bottom: 15px;
}

.tab_first {
    padding-left: 0px !important;
}


.div-strategy-details{
    width: 25%;
    float: left;
    padding: 10px;
}

.div-strategy-details .price{
    width: 100%;
    height: auto;
    z-index: 0 !important;
}
.result-stratergy{
    width: 50%;
    float: left;
}

.tab-content input{
    height: 2.25em;
    text-align: center;
}

.Strategy-table tbody, .Strategy-table td, .Strategy-table tfoot,  .Strategy-table thead, .Strategy-table tr{
    width: 100% !important;
    min-width: 130px !important;
}

.Strategy-table th {
    width: 100% !important;
    min-width: 130px !important;
    text-align: center !important;
}
.edit-popup-table tbody, .edit-popup-table td, .edit-popup-table tfoot,  .edit-popup-table thead, .edit-popup-table tr {
    width: 100% !important;
    min-width: 150px !important;
}
a.edit_link, a.delete_link {
    padding: 0 10px;
    font-size: 16px;
    cursor: pointer;
}

a.view_link {
    cursor: pointer !important;
}

.edit-popup-table td, .edit-popup-table th{
    padding:  10px !important;
    /*min-width: 122px !important;*/
}
    
.my-strategy-table thead, .my-strategy-table th {
    width: 100% !important;
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 100px !important;
    font-size: 16px !important;
    color: #fff !important;
}
.my-strategy-table tbody, .my-strategy-table tr{
    width: 100% !important;
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 100px !important;
    font-size: 16px !important;
    color: #54595f !important;
    font-weight: normal !important;
    padding: 10px 16px !important;
}

 .my-strategy-table td{
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 100px !important;
    font-size: 16px !important;
    color: #54595f !important;
    font-weight: normal !important;
    padding: 10px 16px !important;
}

.my-strategy-table tr, .my-strategy-table td {
    padding: 10px 16px !important;
}

#my_alert_listing .first_row {
    width: 120px !important;
}

#my_alert_listing .last_row {
    width: 80px !important;
    text-align: center !important;
}

.my-alert-table thead, .my-alert-table th {
    width: 100% !important;
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 120px !important;
    font-size: 16px !important;
    color: #fff !important;
}
.my-alert-table tbody, .my-alert-table tr{
    /*width: 100% !important;*/
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 120px !important;
    font-size: 16px !important;
    color: #54595f !important;
    font-weight: normal !important;
    padding: 10px 16px !important;
}

.view-strategy-table .table {
    display: inline-table !important;
}

 .my-alert-table td{
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 120px !important;
    font-size: 16px !important;
    color: #54595f !important;
    font-weight: normal !important;
    padding: 10px 16px !important;
}
.invested_val {
   /* display: revert !important;*/
    width: 80% !important;
}
.entry_val {
    display: revert !important;
    width: 80% !important;
}

.no_share_val {
    display: revert !important;
    width: 50% !important;
}
.real_val {
    display: revert !important;
    width: 80% !important;
}
.my-strategy-table i {
    color: #A7A7A7;
}
.my-strategy-table i:hover {
    color: #232323 !important;
    cursor: pointer;
}

.pagination-div {
   padding-bottom: 60px;
    font-size: 16px;
}

.pagination-div a {
    padding: 4px 10px !important;
    border-radius: 3px;
    color: #54595f;
    font-family: "Source Sans Pro", sans-serif !important;
    font-size: 15px;
    font-weight: 600;
}

.pagination-div a:hover {
    padding: 4px 10px !important;
    border-radius: 3px;
    color: #ffffff;
    background-color: #0096f0;
}

.pager-current-page {
    padding: 2px 10px !important;
    border-radius: 3px;
    color: #fff;
    background-color: #0096f0;
}
.pagination-div span {
    margin: 7px;
}

.date-search {
    border: 1px solid #c9c9c9;
    border-radius: 3px;
    padding: 7px 14px;
}

.date-range-lbl {
    margin-left: 6px;
}
    
    @media (max-width: 960px){
        .my-stra-text, .my-stra-text1 {
            width: 100%;
            margin: 10px 0;
        }
        .tab a {
            font-size:12px;
        }
        .entry-header a {
            font-size:12px;
        }
        .entry-header  {
            width: 100%;
        }
        .popup_tab {
            width: 100%;
        }
        .popup_tab a {
            font-size:12px;
            padding: 0px 15px 0 0px;
        }

        .vca-cca-calculator .col-lg-4 {
            width: 100%;
        }
        button.btn-calculate {
            padding: 10px 5px;
        }
        .div-strategy-details {
                width: 50%;
                
            }
        .price h1{
             height:96px;
        }

        .edit_header_outer_left {
          padding-right: 0px;
          padding-bottom: 0px;
        }

        .edit_header_outer_right {
          padding-left: 0px;
          padding-bottom: 0px;
        }
        .edit_header_outer_div_left {
            margin-bottom: 10px;
        }
        .edit_header_outer_div_right {
            margin-bottom: 10px;
        }
    }
        @media (min-width: 960px) and (max-width: 1400px){
        .percent1_input, .percent1 .form-select {
            width: 36%;
            font-size: 18px !important;
        }
        .percent1 h4 {
            font-size: 14px;
        }
        .blue-box h4{
            font-size:22px;
        }
        .price h1 {
            font-size: 16px;
            margin-bottom: 0;
            height: 70px;
            line-height: 25px;
        }
        .price h2 {
            font-size: 30px;
            margin-bottom: 0;
        }
        .percent h3 {
            margin-bottom: 0;
        }
        .my-stra-text {
            width: 50%;
            margin: 10px 0;
        }
        .search-filters button{
            width: 98%;
        }
        .my-stra-text1 {
            width: 50%;
            margin: 10px 0;
        }
            
    }
    @media (max-width: 768px){
        .my-stra-text {
            margin:10px 0 !important;
        }
        .my-stra-text2 {
            margin:10px 0 !important;
        }
        .vca-cca-calculator .col-sm-12 {
            width: 100% !important;
        }        
        .edit_header_row_1 {
            width: 100%;
        }
        .edit_header_row_1_3{
            width: 100%;
        }
        .edit_header_row_1_4{
             width: 100%;
        }
        .edit-button-div {
            width: 100%;
        }
        .row_left p{
            margin-right: 0px;
        }
        .row_right p{
            margin-left: 0px;
        }
        .edit_header_outer_left {
          padding-right: 0px;
          padding-bottom: 0px;
        }

        .edit_header_outer_right {
          padding-left: 0px;
          padding-bottom: 0px;
        }
        .edit_header_outer_div_left {
            margin-bottom: 10px;
        }
        .edit_header_outer_div_right {
            margin-bottom: 10px;
        }
        .calculate p {
            width: 100%;
        }
        .my-stra-text1 {
            margin-bottom: 15px !important;
        }
        .tab a {
            font-size: 12px;
            padding: 14px 4px;
        }
        .entry-header a {
            font-size:12px;
        }
        .entry-header  {
            width: 100%;
        }
        .popup_tab {
            width: 100%;
        }
        .popup_tab a {
            font-size:12px;
            padding: 0px 15px 0 0px;
        }

        .div-strategy-details {
            width: 100%;}
        .percent h2 {
            font-size: 22px;
            margin: 0;
        }
        .percent h3 {
            font-size: 13px;
            margin: 0;
        }
        .btn-light-save {
            font-size: 14px !important;
            margin:5px 5px;
        }
    }
    @media (max-width: 900px){
        .my-stra-text, .my-stra-text1 {
            width: 100%;
            margin: 10px 0;
        }
        .calculate p {
            width: 100%;
        }
        
        .edit_header_row_1 {
            width: 100%;
        }
        .row_left p{
            margin-right: 0px;
        }
        .row_right p{
            margin-left: 0px;
        }
        .edit_header_outer_left {
          padding-right: 0px;
          padding-bottom: 0px;
        }

        .edit_header_outer_right {
          padding-left: 0px;
          padding-bottom: 0px;
        }
        .edit_header_outer_div_left {
            margin-bottom: 10px;
        }
        .edit_header_outer_div_right {
            margin-bottom: 10px;
        }
        .entry-header a {
            font-size:12px;
        }
        .entry-header  {
            width: 100%;
        }
        .popup_tab {
            width: 100%;
        }
        .popup_tab a {
            font-size:12px;
            padding: 0px 15px 0 0px;
        }
    }



</style>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
var apiBaseurl = "<?=site_url("wp-json/api")?>";
var wpNonce = "<?=wp_create_nonce( 'wp_rest' )?>";

var filter_start_date = ''; 
var filter_end_date = '';
var strategy_detail_json = '';
var strategy_detail_array = [];
var profit_detail = [];
strategy_detail = [];

$("#my_alert_listing").on("click", ".open_popup", function(){
    
    $($(this).data("popup") + '.overlay').css('display', 'flex');
    $($(this).data("popup")).fadeIn();

    getStrategyDetails($(this).data("strategyid"));    
    openPopupContent(event, $(this).data("action"));
    var link_id = ".link_"+$(this).data("action");    
    $(link_id).addClass('active');
    
});

function getRecapData(entryLvl, strategyid, strategyname, stockname, currency, weekhigh, investment_total, stockprice, cm_strategy_for) {
    $("#recap_strategy_name").empty().html(strategyname);
    //let currencySymbol          = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿', "AUD":'A&#36;'};
    let firstEntryLevel = {1:100, 2:44.44, 3:26.23, 4:17.334, 5:12.185, 6:8.882, 7:6.635, 8:5.04, 9:3.876};
    var table_values            = '';

    var entery_level_arr        = new Array();
    var per_tot_amt             = firstEntryLevel[entryLvl];
    var prev_per_tot_amt        = 0;
    var tot_used_investment     = 0;
    var tot_used_investment_per = 0;
    var tot_no_of_share_buy     = 0;
    var tot_avg_share_pice      = 0;
    var avg_share_price         = 0;
    var sum_reaml_amt           = 0;
    var avg_all_share_price     = 0;
    var no_of_share_buy         = 0;
    var balance_amt             = 0;
    var tot_cost_val            = 0;
    var cnt                     = 1;
    var entry_limit_val         = 5;

    for(var z=1; z <= entryLvl; z++) {
        entery_level_arr.push(entry_limit_val);
        entry_limit_val = entry_limit_val + 5;
    }

    $.each(entery_level_arr, function (index, value) {
        var entery_price_val = ((stockprice * value) / 100);         
        if(cm_strategy_for == "SELL") {
            var entery_price = parseFloat(+stockprice + +entery_price_val).toFixed(6);
        } else {
            var entery_price = parseFloat(stockprice-entery_price_val).toFixed(6);
        }  
                   
        prev_per_tot_amt = (prev_per_tot_amt==0) ? per_tot_amt : prev_per_tot_amt*1.25;
        prev_per_tot_amt = prev_per_tot_amt.toFixed(2);

        var investment = (investment_total * prev_per_tot_amt  / 100).toFixed(2);
          
        tot_used_investment_per = +(tot_used_investment_per) + +(prev_per_tot_amt);
        var updated_investment  = +(investment) +  +(balance_amt);
        tot_used_investment     = +(tot_used_investment) + +(investment);

        /*if(entery_price <= updated_investment) {*/
            if(tot_no_of_share_buy ==0) {
                if(cm_strategy_for == "SELL") {
                    no_of_share_buy = (investment * entery_price).toFixed(6);
                } else {
                    no_of_share_buy = (investment / entery_price).toFixed(6);
                }
                tot_no_of_share_buy = +(tot_no_of_share_buy) + +(no_of_share_buy);
            } else {
                if(cm_strategy_for == "SELL") {
                    var buy_share_string =  investment * entery_price;
                } else {
                    var buy_share_string =  investment / entery_price;
                }                            
                no_of_share_buy = (buy_share_string).toFixed(5);
                tot_no_of_share_buy = +(tot_no_of_share_buy) + +(no_of_share_buy);
            }

            if(no_of_share_buy >0) {
                used_amt = (no_of_share_buy * entery_price) - updated_investment;
                balance_amt =  Math.abs(updated_investment -(entery_price *  no_of_share_buy));
            }
        /*} else {
            no_of_share_buy = 0;
            balance_amt = balance_amt + investment;
        }*/

        if(avg_share_price == 0) {
            avg_price_show  = avg_price = entery_price * no_of_share_buy;
            avg_share_price = avg_share_price + avg_price;
            if(tot_no_of_share_buy >0) {
                avg_price_show  = avg_price_show   / tot_no_of_share_buy;
            } else {
                avg_price_show  =0;
            }
        } else {
            avg_price       = entery_price * no_of_share_buy;
            avg_share_price = avg_share_price + avg_price;
            avg_price_show  = avg_share_price / tot_no_of_share_buy;
        }
        avg_price_show  = parseFloat(avg_price_show).toFixed(2);
        sell_after_15 = avg_price_show*1.15;
        sell_after_20 = avg_price_show*1.20;
                            
        sell_after_15  = parseFloat(sell_after_15).toFixed(2);
        sell_after_20  = parseFloat(sell_after_20).toFixed(2);
        var tr_class="red-box";
        
        if(entery_price < 1) {
            var cmp_entery_price = parseFloat(entery_price).toFixed(6);
        } else {
            var cmp_entery_price = parseFloat(entery_price).toFixed(2);
        }

        if(parseInt(cmp_entery_price) > parseInt(stockprice)) {
            tr_class="green-box";
        }

        table_values  +=' <tr class="yellow-box"><td class="'+tr_class+'">'+cmp_entery_price+'</td><td id="entery_tbl_invest'+cnt+'">'+investment+'</td><td>'+prev_per_tot_amt+'%</td><td id="entery_tbl_no_shares'+cnt+'">'+no_of_share_buy+'</td><td>'+tot_no_of_share_buy.toFixed(6)+'</td><td>'+avg_price_show+'</td></tr>';

        str_invested_money = entery_price * no_of_share_buy;                    
        sum_reaml_amt = sum_reaml_amt + str_invested_money;
        cnt++;
    });

     var inve_per = tot_used_investment / investment_total * 100;
    table_values +=' <tr style="background-color: #f3f3f3; font-size: 20px; "><td class="total">Total</td><td class="total">'+tot_used_investment.toFixed(2)+'</td><td class="total">'+Math.round(inve_per)+'%</td><td class="total">'+tot_no_of_share_buy.toFixed(6)+'</td><td  style=" border-color:none; border-width:0 !important;"></td></tr>';

    $("#view_header_strategy_name").empty().text(strategyname);
    $("#view_header_stock_price").empty().html(stockprice);
    $("#view_header_stock_name").empty().text(stockname);
    
    if(weekhigh > 1) {
        $("#view_header_curr_high").empty().html(parseFloat(weekhigh).toFixed(2));
    } else {
        $("#view_header_curr_high").empty().html(parseFloat(weekhigh).toFixed(6));
    }

    $("#view_header_currency").empty().text(currency);
    $("#view_header_investment").empty().html(parseFloat(investment_total).toFixed(2));

    if(cm_strategy_for == "SELL") {
        var price_diff_recap = (avg_price_show - stockprice).toFixed(2);
        var new_total_gainLoss = tot_no_of_share_buy / stockprice; 
    } else {
        var price_diff_recap = (stockprice - avg_price_show).toFixed(2);
        var new_total_gainLoss = tot_no_of_share_buy * price_diff_recap;
    }
     
    var new_result = (new_total_gainLoss / investment_total) * 100;
    $("#view_header_total_invest").empty().html(parseFloat(investment_total).toFixed(2));
    $("#view_header_total_share").empty().html(tot_no_of_share_buy.toFixed(6));
    $("#view_header_average_price").empty().html(avg_price_show);
    $("#view_header_price_diff").empty().html(price_diff_recap);

    $("#view_header_result").empty().html(new_result.toFixed(2)+"%");

    if(new_total_gainLoss >= 0) {
        $("#view_header_gain_loss").empty().html(new_total_gainLoss.toFixed(2)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>");            
        $("#view_header_gain_loss").css('color','#67c275');
    } else {
        $("#view_header_gain_loss").empty().html(new_total_gainLoss.toFixed(2)+" <i class='fa fa-arrow-down' aria-hidden='true'></i>");
        $("#view_header_gain_loss").css('color','red');
    }
    
    $("#recap_tbl_body").empty().append(table_values);
}

$("#strategy_edit_tab_content").on("change", "#checkAll", function() {
    $('#strategy_edit_tab_content input:checkbox').filter(function () {
        return !this.disabled
    }).prop('checked', this.checked);
});

$("#strategy_profit_tab_content").on("change", "#checkAllP", function() {
    $('#strategy_profit_tab_content input:checkbox').filter(function () {
        return !this.disabled
    }).prop('checked', this.checked);
});

$(".close_popup").on("click", function(){
    $($(this).data("popup")).fadeOut();
});

$(document).ready(function () {

    fetch_alert_data();

    function fetch_alert_data(calc_type = 'CMC', start_date = '', end_date = '', stock_name ='', currency = '', alert_for = '', search_keyword = '') {

        $('#my_alert_listing').DataTable().destroy();

        $('#my_alert_listing').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            order: [[0, 'desc']],
            autoWidth: false,
            paging: false,
            bInfo : false,
            columnDefs: [
                { className: "first_row", "targets": [ 0 ]},
                { className: "last_row", "targets": [ 4,5,6 ]},
            ],
            dom: '<"toolbar">frtip',
            ajax: {
                url: `${apiBaseurl}/get-alerts`,
                type : 'POST',
                dataType : "json",
                beforeSend : xhr => {
                    xhr.setRequestHeader('X-WP-Nonce', wpNonce);
                },
                data: function (d) {
                    d.calc_type = calc_type;
                    d.start_date = start_date;
                    d.end_date = end_date;
                    d.stock_name = stock_name;
                    d.currency = currency;
                    d.alert_for = alert_for;
                    d.search_keyword = search_keyword;
                },
                "complete": function (data, type) {
                    $("#alert_total").html(data['responseJSON']['recordsTotal']);
                },
            },        
        });

        checkAlertUrl();
        $("#my_alert_listing th").removeClass("sorting_asc");
        $('div.toolbar').html('');    
    }

    $('#sevieces_tbl_date').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(30, 'days'),
            endDate  : moment()
          },
          function (start, end) {       
            $('#sevieces_tbl_date .date-range-lbl').html(start.format('MM-DD-YYYY') + ' - ' + end.format('MM-DD-YYYY'));  

            filter_start_date = start.format('YYYY-MM-DD'); 
            filter_end_date = end.format('YYYY-MM-DD');  
            
            fetch_alert_data('CMC', start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), $( "#stock_filter" ).val(), $("#currency_search").val(), $("#alert_search").val(), $('#txtSearch').val());
          }
        );


    $( "#stock_filter" ).autocomplete({
        source: '/wp-json/api/cca/?action=get_ticker&t='+jQuery.now(),
        minLength: 2
    }).focus(function() {
        $(this).autocomplete('search', $(this).val())
    });

    $( "#stock_filter" ).on('autocompleteselect', function (e, ui) {
        var stock = ui.item.label;
        var myArray = stock.split(" - ");
        
        fetch_alert_data('CMC', filter_start_date, filter_end_date, myArray[0], $("#currency_search").val(), $("#alert_search").val(), $('#txtSearch').val());        
    });
    
    $('body').on('keydown', '#txtSearch', function(e) {
        if (e.which == 9 || e.which == 13) {
            e.preventDefault();
            console.log("key up == "+e.which);
            fetch_alert_data('CMC', filter_start_date, filter_end_date, $( "#stock_filter" ).val(), $("#currency_search").val(), $("#alert_search").val(), $('#txtSearch').val());  
        }
    });

    $(document.body).on("click",".select-dropdown__list--0 .select-dropdown__list-item",function() {
        fetch_alert_data('CMC', filter_start_date, filter_end_date, $( "#stock_filter" ).val(), $(this).data("value"), $("#alert_search").val(), $('#txtSearch').val()); 
        //alert("Alert for == "+$(this).data("value"));
    });

    $(document.body).on("click",".select-dropdown__list--1 .select-dropdown__list-item",function() {
        fetch_alert_data('CMC', filter_start_date, filter_end_date, $( "#stock_filter" ).val(), $("#currency_search").val(), $(this).data("value"), $('#txtSearch').val()); 
        //alert("Alert for == "+$(this).data("value"));
    });

    function checkAlertUrl() {
        var alert_id = '<?php echo base64_decode($_REQUEST['alert']); ?>';
console.log("decoded alert id ==== "+alert_id);
        if(alert_id != '') {
            $("#vca_popup").css("display", "flex");
            $("#vca_popup").fadeIn();
            
            getStrategyDetails(alert_id);    
            openPopupContent(event, 'graph_tab_content');
            var link_id = ".link_graph_tab_content";    
            $(link_id).addClass('active');
        }
    }

    $("#edit_strategy_table").on("keypress", ".input_num_validate", function(e) {
        
        var keyCode = e.which;
        var keyVal = String.fromCharCode(keyCode);
        var inputVal = this.value;
        var condition = '';
    
        if ( (keyCode != 8 || keyCode == 32 ) && (keyCode < 48 || keyCode > 57)) { 
          
            if (keyCode == 46) {
                if(inputVal.indexOf(".") != -1) {
                    return false;
                } else {
                    return true;
                }        
            } 
            return false;
        }         
    });

    $("#edit_profit_table").on("keypress", ".input_num_validate", function(e) {
       
        var keyCode = e.which;
        var keyVal = String.fromCharCode(keyCode);
        var inputVal = this.value;
        var condition = '';
       
        if ( (keyCode != 8 || keyCode == 32 ) && (keyCode < 48 || keyCode > 57)) { 
          
            if (keyCode == 46) {

                if(inputVal.indexOf(".") != -1) {
                    return false;
                } else {
                    return true;
                }        
            } 
            return false;
        }         
    });


    $("#my_alert_listing").on("click", ".dismiss_link", function(){

        console.log("Dismiss alert === "+$(this).data("alertid"));
        $.ajax({
            url: `${apiBaseurl}/delete-alert`,
            data : {
                    'alert_id' : JSON.stringify($(this).data("alertid"))
            },
            type : 'POST',
            dataType : "json",
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', wpNonce);
            },
            success: (data) => {
                //location.reload();  
                fetch_alert_data();         
            }
        });
    });
    
    /*Edit Stratergy Data Fetching : END  */

    $("#strategy_edit_tab_content").on("click", "#edit_header_strategy_name", function() {

        var old_strategy_name = $("#edit_header_strategy_name_old").val();
        $("#edit_strategy_name_p").empty().html('Strategy Name: <input type="text" name="edit_header_strategy_name_input" id="edit_header_strategy_name_input" value="'+old_strategy_name+'" style="width: 380px; height: 30px;">');    
    });

    $("#strategy_edit_tab_content").on("blur", "#edit_header_strategy_name_input", function() {

        var old_strategy_name = $("#edit_header_strategy_name_old").val();
        var new_strategy_name = $("#edit_header_strategy_name_input").val(); 
        var strategy_id = $("#edit_strategy_id").val();

        console.log("new strategy name = "+new_strategy_name+" :: for strategy id = "+strategy_id);
        
        $("#edit_strategy_name_p").empty().html('Strategy Name: <span id="edit_header_strategy_name">'+new_strategy_name+'</span>');  

        if(old_strategy_name != new_strategy_name) {
            $.ajax({
                url: `${apiBaseurl}/update-strategy-name`,
                data : {
                    'strategy_name' : new_strategy_name,
                    'calc_type': "CMC",
                    'id': strategy_id
                },
                type : 'POST',
                dataType : "json",
                beforeSend : xhr => {
                    xhr.setRequestHeader('X-WP-Nonce', wpNonce);
                },
                success: (data) => {
                    if(data['status'] == "200") {                
                        console.log("Strategy name updated successfully...");
                        $("#edit_header_strategy_name_old").val(new_strategy_name);
                        fetch_alert_data();
                    } else {
                        console.log("Something went wrong ");
                    }                    
                }
            });
        }
    });

});

$("#strategy_profit_tab_content").on("click", "#profit_header_strategy_name", function() {

    var old_strategy_name = $("#profit_header_strategy_name_old").val();
    $("#edit_strategy_name_p2").empty().html('Strategy Name: <input type="text" name="profit_header_strategy_name_input" id="profit_header_strategy_name_input" value="'+old_strategy_name+'" style="width: 380px; height: 30px;">');    
});

    $("#strategy_profit_tab_content").on("blur", "#profit_header_strategy_name_input", function() {

        var old_strategy_name = $("#profit_header_strategy_name_old").val();
        var new_strategy_name = $("#profit_header_strategy_name_input").val(); 
        var strategy_id = $("#edit_strategy_id").val();

        console.log("new strategy name = "+new_strategy_name+" :: for strategy id = "+strategy_id);
        
        $("#edit_strategy_name_p2").empty().html('Strategy Name: <span id="profit_header_strategy_name">'+new_strategy_name+'</span>');  

        if(old_strategy_name != new_strategy_name) {
            $.ajax({
                url: `${apiBaseurl}/update-strategy-name`,
                data : {
                    'strategy_name' : new_strategy_name,
                    'id': strategy_id
                },
                type : 'POST',
                dataType : "json",
                beforeSend : xhr => {
                    xhr.setRequestHeader('X-WP-Nonce', wpNonce);
                },
                success: (data) => {
                    if(data['status'] == "200") {                
                        console.log("Strategy name updated successfully...");
                        $("#edit_header_strategy_name_old").val(new_strategy_name);
                        $("#profit_header_strategy_name_old").val(new_strategy_name);
                        fetch_strategy_data();
                    } else {
                        console.log("Something went wrong ");
                    }                    
                }
            });
        }
    });


/* START : EDIT INVESTMENT - Strategy Popup */

    $("#strategy_edit_tab_content").on("click", "#edit_header_investment", function() {

        var old_investment = $("#edit_header_investment_old").val();
        var chkEntries = 0;

        $("#edit-Strategy-table .date_box").each(function (index, value) { 
            
            if($("#edit_stock_buy_date"+index).val() == "") {
                chkEntries = 1;
            }
        });

        if(chkEntries == 1) {
            $("#edit_header_investment_p").empty().html('Total Investment: <input type="number" class="form-control invested_val input_num_validate" name="edit_header_investment_input" id="edit_header_investment_input" value="'+old_investment+'" style="width: 95px !important; height: 25px !important;" >');
        }
            
    });

    $("#strategy_edit_tab_content").on("blur", "#edit_header_investment_input", function() {

        var old_investment = $("#edit_header_investment_old").val();
        var new_investment = $("#edit_header_investment_input").val(); 
        var strategy_id = $("#edit_strategy_id").val();
        //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;', "AUD":'A&#36;'};
        var currency= $("#edit_currency").val();
        //var currencySymbol_val =  currencySymbol[currency];
        
        $("#edit_header_investment_p").empty().html('Total Investment <button class="edit_blue_box" id="edit_header_investment">'+new_investment+'</button>');  

        if(old_investment != new_investment) {
            recalculate_strategy(strategy_id, new_investment);            
        }
    });



    $("#strategy_profit_tab_content").on("click", "#profit_header_investment", function() {

        var old_investment = $("#profit_header_investment_old").val();
        var chkEntries = 0;

        $("#edit-Strategy-table .date_box").each(function (index, value) { 
            
            if($("#edit_stock_buy_date"+index).val() == "") {
                chkEntries = 1;
            }
        });

        if(chkEntries == 1) {
            $("#profit_header_investment_p").empty().html('Total Investment: <input type="number" class="form-control invested_val input_num_validate" name="profit_header_investment_input" id="profit_header_investment_input" value="'+old_investment+'" style="width: 95px !important; height: 25px !important;" >');
        }
            
    });

    $("#strategy_profit_tab_content").on("blur", "#profit_header_investment_input", function() {

        var old_investment = $("#profit_header_investment_old").val();
        var new_investment = $("#profit_header_investment_input").val(); 
        var strategy_id = $("#edit_strategy_id").val();
        //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;', "AUD":'A&#36;'};
        var currency= $("#edit_currency").val();
        //var currencySymbol_val =  currencySymbol[currency];
        
        $("#profit_header_investment_p").empty().html('Total Investment <button class="edit_blue_box" id="profit_header_investment">'+new_investment+'</button>');  

        if(old_investment != new_investment) {
            recalculate_strategy(strategy_id, new_investment);            
        }
    });


    function recalculate_strategy(strategy_id, new_investment) {

        let firstEntryLevel = {1:100, 2:44.44, 3:26.23, 4:17.334, 5:12.185, 6:8.882, 7:6.635, 8:5.04, 9:3.876};
        var totalEmptyEntries = 0;
        var totalInvestedTillDate = 0;
        var entryPriceArr = [];

        $("#edit-Strategy-table-body .purchase_date").each(function (index, value) {

            cnt_val = index;
            if($("#edit_stock_buy_date"+cnt_val).val() == "") {
                totalEmptyEntries++;
                entryPriceArr[totalEmptyEntries] = $("#edit_entry_cost_"+cnt_val).val();
            }
            cnt_val++;
        });  

        totalInvestedTillDate = $("#edit_header_total_invest").html().slice(1);
        var remaining_investment = (new_investment - totalInvestedTillDate);

        var entery_level_arr        = new Array();
        var my_strategy_detail      = [];
        var per_tot_amt             = firstEntryLevel[totalEmptyEntries];
        var entry_limit_val         = 20;

        for(var z=1; z <= totalEmptyEntries; z++) {
            entery_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 10;
        }

        var prev_per_tot_amt        = 0;

        var current_high = $("#edit_header_curr_high").html().slice(1);

        $.each(entery_level_arr, function (index, value) {

            prev_per_tot_amt = (prev_per_tot_amt==0) ? per_tot_amt : prev_per_tot_amt*1.25;        
            var strategy_investment = (remaining_investment * prev_per_tot_amt) / 100;
            
            my_strategy_detail.push({'investment_amount':strategy_investment, 'entry_price':entryPriceArr[index+1]})
            
        });

        $.ajax({
            url: `${apiBaseurl}/update-investment`,
            data : {
                'new_investment' : new_investment,
                'strategy_detail_json' : JSON.stringify(my_strategy_detail),
                'id': strategy_id
            },
            type : 'POST',
            dataType : "json",
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', wpNonce);
            },
            success: (data) => {
                if(data['status'] == "200") {                
                    console.log("Investment updated successfully...");
                    $("#edit_header_investment_old").val(new_investment);
                    $("#profit_header_investment_old").val(new_investment);
                    getStrategyDetails(strategy_id);
                    fetch_strategy_data();
                } else {
                    console.log("Something went wrong ");
                }                    
            }
        });
    }

    /* END : EDIT INVESTMENT - Strategy Popup */


/*Below function used to Update Stratergy start */
$(document).on("click", "#update_stratergy", e => {
    var strategy_detail_json = '';
    //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿', "AUD":'A&#36;'};
    var strategy_name = $.trim($("#edit-popup-title").text());
        var strategy_name_old = $.trim($("#edit_header_strategy_name_old").val());
        var strategy_json = '';
        var stock_ticker = $("#edit_stock_ticker").val();
        var week_high = $("#edit_current_high").val();
        var cm_strategy_for = $("#edit_strategy_type").val();
        var currency= $("#edit_currency").val();
        //var currencySymbol_val =  currencySymbol[currency];
        var your_investment = $("#edit_total_invested_val").val();
console.log("your_investment === "+your_investment);
        var strategy_id = $("#edit_strategy_id").val();
        $('#txtStrategyName').removeClass("error");  

        /*if(cm_strategy_for == "SELL") {
            var total_share_buy = $("#edit_header_total_invest").html();
            var total_investment = $("#edit_entery_tbl_no_shares1").val();
        } else {
            var total_investment = $("#edit_header_total_invest").html();
            var total_share_buy = $("#edit_entery_tbl_no_shares1").val();
        }*/   
            var total_investment = $("#edit_header_total_invest").html();
            var total_share_buy = $("#edit_entery_tbl_no_shares1").val();    

        var temp_strategy = {
            "calc_type": "CMC", 
            "strategy_name": strategy_name, 
            "stock_name": stock_ticker, 
            "currency": $("#edit_currency").val(), 
            "stock_price": $("#edit_open_prize").val(), 
            "52_week_high": (week_high), 
            "your_investment": your_investment, 
            "total_gain_loss": $("#edit_total_gain_loss_val").val(), 
            "total_gain_loss_percentage": ($("#edit_total_gain_loss_percentage").val()).replace("%", ""), 
            "total_investment": total_investment, 
            "total_share_buy": total_share_buy, 
            "average_share_price": $("#edit_avg_price_val").val(), 
            "share_price_difference": $("#edit_differance_in_price_val").val()
        };
                       
        $("#edit-Strategy-table .date_box").each(function (index, value) {   
            cnt_val = index ;
            console.log("This is Purchase date="+$("#edit_stock_buy_date"+cnt_val).val());
            strategy_detail[index]['purchase_date'] = $("#edit_stock_buy_date"+cnt_val).val();
            strategy_detail[index]['investment_amount'] = $("#edit_invested_cost_"+cnt_val).val();
            strategy_detail[index]['real_amount'] = $("#edit_real_cost_"+cnt_val).text(); 
            strategy_detail[index]['entry_price'] = $("#edit_entry_cost_"+cnt_val).val(); 
            strategy_detail[index]['no_of_shares_to_buy'] = $("#edit_no_share_val_"+cnt_val).text(); 
            strategy_detail[index]['additional_cost'] = $("#edit_cost_"+cnt_val).val(); 
            
            var set_alert = 0;
            if (strategy_detail[index]['purchase_date'] != '' && strategy_detail[index]['no_of_shares_to_buy'] > 0) {
                set_alert = 2;
            } 
            if ($('#edit_chkSetAlert_'+cnt_val).is(":checked")) {
                set_alert = 1;
            }
            strategy_detail[index]['alert_flag'] = set_alert;
        });

        $("#profit_tbl_body .sale_date").each(function (index, value) {   
                cnt_val = index ;
                
                profit_detail[index]['date_sale'] = $("#edit_stock_sale_date"+cnt_val).val();
                profit_detail[index]['sale_sum'] = $("#edit_sale_sum_"+cnt_val).text();
                profit_detail[index]['your_fiat_sale_sum'] = $("#edit_your_fiat_sale_sum_"+cnt_val).val(); 
                profit_detail[index]['take_profit_price'] = $("#edit_take_profit_price_"+cnt_val).text(); 
                profit_detail[index]['your_take_profit_price'] = $("#edit_your_take_profit_price_"+cnt_val).val(); 
                profit_detail[index]['number_of_tokens'] = $("#edit_number_of_tokens_"+cnt_val).text(); 
                profit_detail[index]['exchange_fees'] = $("#edit_exchange_fees_"+cnt_val).val(); 
                profit_detail[index]['trade_cost'] = $("#edit_trade_cost_"+cnt_val).text(); 
                profit_detail[index]['current_holding'] = $("#edit_current_holding_"+cnt_val).text(); 

                var set_alert = 0;
                if (profit_detail[index]['date_sale'] != '' && profit_detail[index]['your_fiat_sale_sum'] > 0 && profit_detail[index]['your_take_profit_price'] > 0) {
                    set_alert = 2;
                } 
                if ($('#profit_chkSetAlert_'+cnt_val).is(":checked")) {
                    set_alert = 1;
                }
                profit_detail[index]['alert_flag'] = set_alert;
            });
        
         $.ajax({
            url: `${apiBaseurl}/save-vca`,
            data : {
                'strategy_json' : JSON.stringify(temp_strategy),
                'strategy_detail_json' : JSON.stringify(strategy_detail),
                'profit_detail_json' : JSON.stringify(profit_detail),
                'id': strategy_id
            },
            type : 'POST',
            dataType : "json",
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', wpNonce);
                $("#popup_message").css("display", "block");
                $("#popup_message").html('<h2>Updating your changes ...</h2>');
                $("#outer_tab_content").css("display", "none");
            },
            success: (data) => {
                 console.log("response == "+data);
                if(data['status'] == "200"){
                    $("#popup_message").html('<h1>Success !</h1><h3>Your changes saved successfully.</h3>');
                    
                    strategy_detail_json = '';
                    strategy_detail = [];

                    profit_detail_json = '';
                    profit_detail = [];

                    setTimeout(function() { 
                        $("#vca_popup").fadeOut();
                    }, 1000); 
                } 
                else{
                    console.log("Something went wrong ");
                }
                
            }
        }); 
        
});
     /*Above function used to Update Stratergy end */

      /*Following function is used to download excel start*/
    function downloadExcel(){
        var strategy_id = $("#edit_strategy_id").val();
        var entryLvl = $("#edit_entery_level_val").val();
        
        //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿', "AUD":'A&#36;'};
        let firstEntryLevel = {1:100, 2:44.44, 3:26.23, 4:17.334, 5:12.185, 6:8.882, 7:6.635, 8:5.04, 9:3.876};
        var stock       = $("#edit_stock_ticker").val();
            var currency    = $("#edit_currency").val();
            var investment  = $("#edit_investment").val();
            var current_hight = $("#edit_current_high").val();
        var open            = $("#edit_open_prize").val();
        var high            = $("#edit_current_high").val(); 
        var stock_current_price = $("#edit_open_prize").val();
        var edit_total_gain_loss_percentage = $().val();

        var stratergy_table_values = '';
        var share_amt_diffreace = 0;
        var cnt                 = 1;
        var table_values        = '';
        

        if(stock !="" && currency!="" && investment !="" && current_hight !=""){
            var entery_level_arr        = new Array();
            var per_tot_amt             = firstEntryLevel[entryLvl];
            var prev_per_tot_amt        = 0;
            var tot_used_investment     = 0;
            var tot_used_investment_per = 0;
            var tot_no_of_share_buy     = 0;
            var tot_avg_share_pice      = 0;
            var avg_share_price         = 0;
            var sum_reaml_amt           = 0;
            var avg_all_share_price     = 0;
            var no_of_share_buy         = 0;
            var balance_amt             = 0;
            var tot_cost_val            = 0;
            var entry_limit_val         = 5;
            var stratergy_table_data_string = '';

            $("#edit_strategy_table .purchase_date").each(function (index, value) {   
                cnt_val = index;

                if(stratergy_table_data_string == '') {
                    stratergy_table_data_string += $("#edit_invested_cost_"+cnt_val).val() + "|" + $("#edit_entry_cost_"+cnt_val).val() + "|" + $("#edit_no_share_val_"+cnt_val).text();
                } else {
                    stratergy_table_data_string += "##"+$("#edit_invested_cost_"+cnt_val).val() + "|" + $("#edit_entry_cost_"+cnt_val).val() + "|" + $("#edit_no_share_val_"+cnt_val).text();
                }        
            });


            
            total_cost = 0;

           
            avg_all_share_price =  Math.round(tot_cost_val / tot_no_of_share_buy);
            share_change24hour = open - avg_all_share_price;
            total_gain = Math.round(tot_no_of_share_buy * share_change24hour);
            vca_result = (total_gain / (tot_used_investment + total_cost)) * 100; 
            vca_result = vca_result.toFixed(2);

           

            var stock       = $("#edit_stock_ticker").val();
            var currency    = $("#edit_currency").val();
            var investment  = $("#edit_investment").val();
            var current_hight = $("#edit_current_high").val();
                    
            var second_table  = stratergy_table_values;

            var total_gain_loss_val = $("#edit_total_gain_loss_val").val();
            var total_invested_val  = $("#edit_header_total_invest").html();
            var avg_price_val       = $("#edit_avg_price_val").val();
            var differance_in_price_val  = $("#edit_differance_in_price_val").val(); 
            var tot_no_of_share_buy_pass = $("#edit_entery_tbl_no_shares1").val();

            $("#symbol_excel").val(stock);
            $("#strategy_name_excel").val( $("#edit_header_strategy_name").text());
            $("#currency_excel").val(currency);
            $("#investment_excel").val(investment);
            $("#current_hight_excel").val(current_hight);
            /* $("#current_share_price").val(current_share_price); */
            //$("#section1").val(first_table);
            $("#section2").val(stratergy_table_data_string);

            $("#total_gain_loss_val").val(total_gain_loss_val);
            $("#total_invested_val").val(total_invested_val);
            $("#avg_price_val").val(avg_price_val);
            $("#differance_in_price_val").val(differance_in_price_val);
            $("#total_amt_share_val").val(parseInt(tot_no_of_share_buy_pass));
            $("#result_val").val($("#edit_result_val").val());
            $("#pdf_gen").submit();
        }
        
    }
    /*Following function is used to download excel start*/

    function setdatetospan(divid, cnt){
    $(".date_box").each(function (index, value) {                
        $("#span_"+this.id).text(this.value);
        enable_checkbox(index);
    }); 
}

function enable_checkbox(index_val) {
    var cnt_val = index_val;

    var date_s = $.trim($("#edit_stock_buy_date"+cnt_val).val());
    var invested_cost_val = $.trim($("#edit_invested_cost_"+cnt_val).val());
    var cost_val = $.trim($("#edit_cost_"+cnt_val).val());

    var date_sale = $.trim($("#edit_stock_sale_date"+cnt_val).val());
    var fiat_sale_sum = $.trim($("#edit_your_fiat_sale_sum_"+cnt_val).val());
    var take_profit_price = $.trim($("#edit_your_take_profit_price_"+cnt_val).val());

    if(date_s != '' && invested_cost_val > 0 && (cost_val >=0 || cost_val == '')) {  
        $("#edit_chkSetAlert_"+cnt_val).removeAttr('checked');
        $("#edit_chkSetAlert_"+cnt_val).attr('disabled','disabled');
    } else {
        $("#edit_chkSetAlert_"+cnt_val).removeAttr('disabled');
    }

    if(date_sale != '' && fiat_sale_sum > 0 && take_profit_price > 0 ) {  
        $("#profit_chkSetAlert_"+cnt_val).removeAttr('checked');
        $("#profit_chkSetAlert_"+cnt_val).attr('disabled','disabled');
    } else {
        $("#profit_chkSetAlert_"+cnt_val).removeAttr('disabled');
    }
}
    /*Below function used to update startergy section result*/
    function edit_cost(cnt_id){
        var currency        = $("#edit_currency").val();
        //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿', "AUD":'A&#36;'};
        var sum_total_invested = 0;
        var sum_total_invested_only = 0;        
        var new_total_inveted = 0;
        var total_share_buy = 0;
        var total_share_buy_frac = 0;
        var total_real_cost = 0;
        var total_cost = 0;
        var shares_to_buy = 0;

        var cm_type = $("#edit_cm_type").val();
        var cm_strategy_for = $("#edit_strategy_type").val();

        var new_added_stock_buy_date = $("#edit_stock_buy_date"+cnt_id).val();
        var new_added_entry_cost = $("#edit_entry_cost_"+cnt_id).val();

        $("#edit-Strategy-table-body .purchase_date").each(function (index, value) {   
            cnt_val = index;
            shares_to_buy = 0;
            
            if(cnt_val < cnt_id) {

                if($("#edit_stock_buy_date"+cnt_val).val() == "") {

                    $("#edit_stock_buy_date"+cnt_val).val(new_added_stock_buy_date);
                    $("#edit_entry_cost_"+cnt_val).val(new_added_entry_cost);
                }
            }
            
            if($("#edit_stock_buy_date"+cnt_val).val() != '' && $("#edit_invested_cost_"+cnt_val).val() > 0 && $("#edit_entry_cost_"+cnt_val).val() > 0 ) {
                sum_total_invested = +(sum_total_invested) + +($("#edit_invested_cost_"+cnt_val).val());
                sum_total_invested_only = sum_total_invested;

                total_cost = +(total_cost) + +($("#edit_cost_"+cnt_val).val());

                if(cm_strategy_for == "SELL") {
                    shares_to_buy = parseFloat($("#edit_invested_cost_"+cnt_val).val() * $("#edit_entry_cost_"+cnt_val).val()).toFixed(2);
                } else {
                    shares_to_buy = parseFloat($("#edit_invested_cost_"+cnt_val).val() / $("#edit_entry_cost_"+cnt_val).val()).toFixed(5);
                }

                total_share_buy_frac = +(total_share_buy_frac) + +(($("#edit_invested_cost_"+cnt_val).val() / $("#edit_entry_cost_"+cnt_val).val()).toFixed(1));
               
                total_share_buy = +(total_share_buy) + +(shares_to_buy);
/*console.log("edit_cost_ == "+$("#edit_cost_"+cnt_val).val());
console.log("edit_invested_cost_ == "+$("#edit_invested_cost_"+cnt_val).val());
console.log("edit_entry_cost_ == "+$("#edit_entry_cost_"+cnt_val).val());
console.log("total_share_buy_frac == "+total_share_buy_frac);*/
                $("#edit_real_cost_"+cnt_val).empty().html($("#edit_invested_cost_"+cnt_val).val());
                if(shares_to_buy < 1) {
                    $("#edit_no_share_val_"+cnt_val).empty().html(shares_to_buy.toFixed(6));
                    $("#edit_tot_no_share_val_"+cnt_val).empty().html(total_share_buy.toFixed(6));
                } else {
                    $("#edit_no_share_val_"+cnt_val).empty().html(shares_to_buy.toFixed(2));
                    $("#edit_tot_no_share_val_"+cnt_val).empty().html(total_share_buy.toFixed(2));
                }
                enable_checkbox(index);
            } else {
                $("#edit_real_cost_"+cnt_val).empty().html('');
                $("#edit_no_share_val_"+cnt_val).empty().html('');
                $("#edit_tot_no_share_val_"+cnt_val).empty().html('');
            }            
        });
        sum_total_invested = (+sum_total_invested) + (+total_cost);

        if(sum_total_invested > 0 && total_share_buy > 0) {
            if(cm_strategy_for == "SELL") {
                $("#edit_total_cost").empty().html(parseFloat(total_share_buy).toFixed(2));

                total_invseted = parseFloat(total_share_buy).toFixed(2);

                var new_total_inveted = sum_total_invested;
                var new_tot_amt_share = sum_total_invested;        
                var total_share = sum_total_invested;  
                var avg_price = total_share_buy / new_total_inveted; 
                var current_high = $("#edit_header_live_price").text();
                var diff_price = avg_price - current_high;
                var new_total_gainLoss = parseFloat(sum_total_invested * diff_price);
                var new_result = (new_total_gainLoss / total_share_buy) * 100;

            } else {

                $("#edit_total_cost").empty().html(total_cost.toFixed(2));
                total_invseted = $("#tot_invseted_input").val();
                var new_total_inveted = sum_total_invested;
                
                var new_tot_amt_share = total_share_buy;        
                var total_share = total_share_buy;        
                var avg_price = new_total_inveted /total_share;        
                //var current_high   = $("#current_hight").val();
                var current_high = $("#edit_header_live_price").text();
                //console.log("current_high === "+current_high);
                var diff_price = current_high - avg_price;         
                //var new_total_gainLoss = total_share * diff_price;  
                var new_total_gainLoss = total_share_buy * diff_price;        
                var new_result = (new_total_gainLoss / new_total_inveted) * 100;  
            }
        } else {
            $("#edit_total_cost").empty().html("0");
            new_total_inveted =  sum_total_invested;
            var new_tot_amt_share = total_share_buy;        
            var total_share = total_share_buy;        
            var avg_price = 0;
            var diff_price = 0;        
            var new_total_gainLoss = 0;        
            var new_result = 0;  
        }

        if(new_total_gainLoss >= 0){
            $("#edit_total_gain_loss_val").val(new_total_gainLoss.toFixed(2));
            $("#edit_header_gain_loss").empty().html(new_total_gainLoss.toFixed(2)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>");
            
            $("#edit_header_gain_loss").css('color','#67c275');
        }else{
            $("#edit_total_gain_loss_val").val(new_total_gainLoss.toFixed(2));
            $("#edit_header_gain_loss").empty().html(new_total_gainLoss.toFixed(2)+" <i class='fa fa-arrow-down' aria-hidden='true'></i>");
            $("#edit_header_gain_loss").css('color','red');
        }

        if(cm_strategy_for == "SELL") {

            $("#edit_total_gain_loss_percentage").val(new_result.toFixed(2)+"%");
            $("#edit_total_invested_val").val(total_share_buy.toFixed(2));
            $("#edit_avg_price_val").val(avg_price.toFixed(2));
            $("#edit_differance_in_price_val").val(diff_price.toFixed(2));
            $("#edit_total_amt_share_val").val(new_total_inveted.toFixed(6));
            $("#edit_entery_tbl_no_shares1").val(total_share_buy.toFixed(6));
            $("#edit_result_val").val(new_result.toFixed(2)+"%");
            $("#edit_header_result").empty().html(new_result.toFixed(2)+"%");       
            /*$("#edit_header_total_invest").empty().html(total_share_buy.toFixed(2));
            $("#edit_header_total_share").empty().html(new_total_inveted.toFixed(6));*/
            $("#edit_header_total_invest").empty().html(new_total_inveted.toFixed(6));

            if(total_share_buy < 1){
                $("#edit_header_total_share").empty().html(total_share_buy.toFixed(6));
            } else {
                $("#edit_header_total_share").empty().html(total_share_buy.toFixed(2));
            }            

            $("#edit_header_average_price").empty().html(avg_price.toFixed(2));
            $("#edit_header_price_diff").empty().html(diff_price.toFixed(2));
            $("#edit_header_average_price_input").val(avg_price.toFixed(2));

        } else {

            $("#edit_total_gain_loss_percentage").val(new_result.toFixed(2)+"%");
            $("#edit_total_invested_val").val(new_total_inveted.toFixed(2));
            $("#edit_avg_price_val").val(avg_price.toFixed(2));
            $("#edit_differance_in_price_val").val(diff_price.toFixed(2));
            $("#edit_total_amt_share_val").val(total_share_buy.toFixed(6));
            $("#edit_entery_tbl_no_shares1").val(total_share_buy.toFixed(6));
            $("#edit_result_val").val(new_result.toFixed(2)+"%");
            $("#edit_header_result").empty().html(new_result.toFixed(2)+"%");           
            $("#edit_header_total_invest").empty().html(new_total_inveted.toFixed(2));

            if(total_share_buy < 1){
                $("#edit_header_total_share").empty().html(total_share_buy.toFixed(6));
            } else {
                $("#edit_header_total_share").empty().html(total_share_buy.toFixed(2));
            }    
            
            $("#edit_header_average_price").empty().html(avg_price.toFixed(2));
            $("#edit_header_price_diff").empty().html(diff_price.toFixed(2));
            $("#edit_header_average_price_input").val(avg_price.toFixed(2));
        }
        edit_profit_table();
    }

/* START : Function to update the profit details table calculation */
function edit_profit_table() {
//console.log("Inside edit_profit_table function....");    
    var currency        = $("#edit_currency").val();
    //let currencySymbol  = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿'};

    var total_tokens    = $("#edit_header_total_share").text();
    var avg_price       = $("#edit_header_average_price_input").val();

    var avg_price       = $("#edit_header_average_price_input").val();

    var strategy_type = $("#edit_strategy_type").val();

    if(strategy_type == "BUY") {
        var total_tokens    = $("#edit_header_total_share").text();
        var total_invest    = $("#edit_header_total_invest").text();
    } else {
        var total_invest    = $("#edit_header_total_share").text();
        var total_tokens    = $("#edit_header_total_invest").text();
    }
    
//console.log("total_share_buy :: "+total_tokens);
//console.log("avg_price :: "+avg_price);
    var tot_take_profit_price   = 0;
    var tot_sale_sum            = 0;
    var tot_number_of_tokens    = 0;
    var tot_current_holdings    = 0;
    var current_holdings_prev   = 0;
    var my_row                  = 0;

    var tot_planned_take_profit_price    = 0;

    var profit_entry_level_arr      = new Array();
    var entry_limit_val             = 5;

    for(var z=1; z <= 1; z++) {
        profit_entry_level_arr.push(entry_limit_val);
        entry_limit_val = entry_limit_val + 5;
    }

    var take_profit_price       = 0;
            var sale_sum                = 0;
            var number_of_tokens        = 0;
            var current_holdings        = 0;
            var current_holdings_prev   = 0;
            var trade_cost              = 0;
            var total_trade_cost        = 0;
    var actual_holdings         = total_tokens;
    var tot_current_invest      = total_invest;
    var actual_invest           = total_invest;
    
    if(avg_price > 0 && total_tokens > 0) { 

        current_holdings_prev = total_tokens - $("#profit_header_total_token_sell").val();

        $("#profit_tbl_body .sale_date").each(function (index, value) {   
            cnt_val = index;
            
            if(strategy_type == "BUY") {
                take_profit_price = avg_price * (1 + (profit_entry_level_arr[cnt_val] / 100));
            } else {
                take_profit_price = avg_price * (1 - (profit_entry_level_arr[cnt_val] / 100));
            }
            tot_take_profit_price = +(tot_take_profit_price) + +(take_profit_price);
//console.log("--------------------------------------------- ");           
//console.log("cnt_val === "+cnt_val);   
            if($("#edit_stock_sale_date"+cnt_val).val() != '' && $("#edit_your_fiat_sale_sum_"+cnt_val).val() > 0 && $("#edit_your_take_profit_price_"+cnt_val).val() > 0) {  

                /*number_of_tokens = ( sale_sum / take_profit_price );
                tot_number_of_tokens = tot_number_of_tokens + number_of_tokens;

                current_holdings = $("#edit_current_holding_"+cnt_val).val();  */  
                sale_sum = $("#edit_your_fiat_sale_sum_"+cnt_val).val();
                tot_sale_sum = +(tot_sale_sum) + +(sale_sum);

                number_of_tokens = $("#edit_number_of_tokens_"+cnt_val).text();
                tot_number_of_tokens = +(tot_number_of_tokens) + +(number_of_tokens);

                actual_holdings = actual_holdings - sale_sum;
                tot_current_holdings = +(tot_current_holdings) + +(current_holdings);
                //current_holdings_prev = current_holdings; 

            } else {

                if(my_row == 0) {
                    if(strategy_type == "BUY") {
                        sale_sum = actual_holdings;
                        current_holdings = actual_holdings;
                    } else {
                        sale_sum = actual_invest;
                        current_holdings = actual_invest;
                    }
                    
                } else {
                    sale_sum = 0;
                    current_holdings = 0;
                }
                my_row++; 
                tot_sale_sum = tot_sale_sum + sale_sum;

                if(strategy_type == "BUY") {
                    number_of_tokens = sale_sum * take_profit_price;
                } else {
                    number_of_tokens = ( sale_sum / take_profit_price );
                }
                tot_number_of_tokens = +(tot_number_of_tokens) + +(number_of_tokens);
                    
                tot_current_holdings = +(tot_current_holdings) + +(current_holdings);
                current_holdings_prev = current_holdings;
                
            
                if(sale_sum < 1) {
                    $("#edit_your_fiat_sale_sum_"+cnt_val).text(parseFloat(sale_sum).toFixed(6));
                } else {
                    $("#edit_your_fiat_sale_sum_"+cnt_val).text(parseFloat(sale_sum).toFixed(2));
                }

                if(take_profit_price < 1) {
                    $("#edit_take_profit_price_"+cnt_val).text(take_profit_price.toFixed(6));
                } else {
                    $("#edit_take_profit_price_"+cnt_val).text(take_profit_price.toFixed(2));
                }

                if(number_of_tokens < 1) {
                    $("#edit_number_of_tokens_"+cnt_val).empty().html(number_of_tokens.toFixed(6));
                } else {
                    $("#edit_number_of_tokens_"+cnt_val).empty().html(number_of_tokens.toFixed(2));
                } 

                if(current_holdings < 1) {
                    $("#edit_current_holding_"+cnt_val).text(parseFloat(current_holdings).toFixed(6));
                } else {
                    $("#edit_current_holding_"+cnt_val).text(parseFloat(current_holdings).toFixed(2));
                }

            }    
     
        });          
        
    }
}
/* END : Function to update the profit details table calculation */


/* START : Function to update the profit details table calculation */
function edit_profit(cnt_id) {
  cnt_id = cnt_id - 1;
    var currency        = $("#edit_currency").val();
    //let currencySymbol  = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿'};

    var total_tokens = $("#edit_header_total_share").text();
    var total_invest = $("#edit_header_total_invest").text();
    var avg_price       = $("#edit_header_average_price_input").val();
    var strategy_type   = $("#edit_strategy_type").val();
    
    var tot_take_profit_price   = 0;
    var total_sale_sum          = 0;
    var tot_number_of_tokens    = 0;
    var tot_current_holdings    = total_tokens;
    var actual_holdings         = total_tokens;

    var tot_current_invest      = total_invest;
    var actual_invest           = total_invest;

    var current_holdings_prev   = 0;

    var total_holding = 0;
    var total_holding_value = 0;

    var tot_planned_take_profit_price    = 0;

    var profit_entry_level_arr      = new Array();
    var entry_limit_val             = 5;

    for(var z=1; z <= 7; z++) {
        profit_entry_level_arr.push(entry_limit_val);
        entry_limit_val = entry_limit_val + 5;
    }
    
    if(avg_price > 0 && total_tokens > 0) { 

        var new_edit_stock_sale_date = $("#edit_stock_sale_date"+cnt_id).val();
        var new_edit_take_profit_price = $("#edit_take_profit_price_"+cnt_id).text();

        $("#profit_tbl_body .sale_date").each(function (index, value) {   
            cnt_val = index;
          
            var take_profit_price   = 0;
            var sale_sum            = 0.0;
            var number_of_tokens    = 0;
            var current_holdings    = 0;
            var trade_cost          = 0;
            var total_trade_cost    = 0;

            if(cnt_val < cnt_id) {

                if($("#edit_stock_sale_date"+cnt_val).val() == "") {
                    $("#edit_stock_sale_date"+cnt_val).val(new_edit_stock_sale_date);
                    $("#edit_take_profit_price_"+cnt_val).text(new_edit_take_profit_price);
                }
            }

            if($("#edit_stock_sale_date"+cnt_val).val() != '' && $("#edit_your_fiat_sale_sum_"+cnt_val).val() == 0 && $("#edit_your_take_profit_price_"+cnt_val).val() == 0) {

                //var sale_sum_temp = $("#edit_your_fiat_sale_sum_"+cnt_val).val();
                var sale_sum_temp = $("#edit_current_holding_"+cnt_val).text();
                var take_profit_price_temp = $("#edit_take_profit_price_"+cnt_val).text();

                if(sale_sum_temp > 1) {
                   $("#edit_your_fiat_sale_sum_"+cnt_val).empty().val(parseFloat(sale_sum_temp).toFixed(2)); 
               } else {
                $("#edit_your_fiat_sale_sum_"+cnt_val).empty().val(parseFloat(sale_sum_temp).toFixed(6));
               }
                
                if(take_profit_price_temp == 0) {
                    $("#edit_your_take_profit_price_"+cnt_val).empty().val(parseFloat(take_profit_price_temp).toFixed(2));
                } else if(take_profit_price_temp < 1 && take_profit_price_temp != 0) {
                    $("#edit_your_take_profit_price_"+cnt_val).empty().val(parseFloat(take_profit_price_temp).toFixed(6));
                } else {
                    $("#edit_your_take_profit_price_"+cnt_val).empty().val(parseFloat(take_profit_price_temp).toFixed(2));
                } 
                actual_holdings = actual_holdings - sale_sum;
            }
    
            if($("#edit_stock_sale_date"+cnt_val).val() != '' && $("#edit_your_fiat_sale_sum_"+cnt_val).val() > 0 && $("#edit_your_take_profit_price_"+cnt_val).val() > 0) {
                
                take_profit_price = $("#edit_your_take_profit_price_"+cnt_val).val();
              
                tot_take_profit_price = +(tot_take_profit_price) + +(take_profit_price);

                if(cnt_val == 0) {

                    sale_sum = $("#edit_your_fiat_sale_sum_"+cnt_val).val();                    
                    
                    total_sale_sum = +(total_sale_sum) + +(sale_sum);

                    if(strategy_type == "BUY") {
                        number_of_tokens = sale_sum * take_profit_price;
                        current_holdings = total_tokens - sale_sum;
                        tot_current_holdings = tot_current_holdings - sale_sum;
                    } else {
                        number_of_tokens = ( sale_sum / take_profit_price );
                        current_holdings = total_tokens - sale_sum;
                        tot_current_invest = tot_current_invest - sale_sum;
                    }
                    
                    tot_number_of_tokens = +(tot_number_of_tokens) + +(number_of_tokens);
                    
                    //current_holdings = total_tokens - tot_number_of_tokens;                    
                    current_holdings_prev = current_holdings;  
/*console.log("sale_sum =====IF :: "+sale_sum); 
console.log("total_tokens =====IF :: "+total_tokens);
console.log("current_holdings ======IF :: "+current_holdings);*/             
                    
                } else {

                    sale_sum = $("#edit_your_fiat_sale_sum_"+cnt_val).val();
                  
                    total_sale_sum = +(total_sale_sum) + +(sale_sum);

                    if(strategy_type == "BUY") {
                        number_of_tokens = sale_sum * take_profit_price;
                        current_holdings = total_tokens - total_sale_sum;
                        tot_current_holdings = tot_current_holdings - sale_sum;
                    } else {
                        number_of_tokens = ( sale_sum / take_profit_price );
                        current_holdings = total_tokens - total_sale_sum;
                        tot_current_invest = tot_current_invest - sale_sum;
                    }

                    tot_number_of_tokens = +(tot_number_of_tokens) + +(number_of_tokens);

                    
//console.log("current_holdings :: "+current_holdings);
                    //current_holdings = total_tokens - tot_number_of_tokens;
                    
                    current_holdings_prev = current_holdings;
                }
//console.log("total_sale_sum :: "+total_sale_sum);
                if($("#edit_exchange_fees_"+cnt_val).val() > 0) {
                    trade_cost = sale_sum * ($("#edit_exchange_fees_"+cnt_val).val() / 100);
                } else {
                    trade_cost = 0;
                }

                tot_planned_take_profit_price = tot_planned_take_profit_price + (take_profit_price * number_of_tokens);

                total_trade_cost = +(total_trade_cost) + +(trade_cost);

                //$("#edit_your_fiat_sale_sum_"+cnt_val).val(parseFloat(sale_sum));
                //$("#edit_your_take_profit_price_"+cnt_val).val(parseFloat(take_profit_price));
                $("#edit_trade_cost_"+cnt_val).empty().html(trade_cost.toFixed(6));
                $("#edit_number_of_tokens_"+cnt_val).empty().html(number_of_tokens.toFixed(6));
                
                var next_val = cnt_val + 1;
                $("#edit_current_holding_"+next_val).empty().html(current_holdings.toFixed(6));

                enable_checkbox(index);
            } else {
                /*$("#edit_your_fiat_sale_sum_"+cnt_val).empty().val(0.0);
                $("#edit_your_take_profit_price_"+cnt_val).empty().val(0.0);
                $("#edit_exchange_fees_"+cnt_val).empty().val('');
                $("#edit_trade_cost_"+cnt_val).empty().html('0.00');*/
            }            
        });

console.log("tot_current_invest :: "+tot_current_invest);
        
        if(strategy_type == "BUY") {
            total_holding_value = tot_current_holdings * $("#profit_header_live_price_input").val();
        } else {
            total_holding_value = tot_current_invest / $("#profit_header_live_price_input").val();
        }
        

        if(total_holding_value == 0) {
            $("#profit_header_current_holding_value").empty().html(total_holding_value);
        } else if(total_holding_value > 0 && total_holding_value < 1) {
            $("#profit_header_current_holding_value").empty().html(total_holding_value.toFixed(6));
        } else {
            $("#profit_header_current_holding_value").empty().html(total_holding_value.toFixed(2));
        }

        if(total_sale_sum < 1) {
            $("#profit_header_total_sold").empty().html(parseFloat(total_sale_sum).toFixed(6)); 
        } else {
            $("#profit_header_total_sold").empty().html(parseFloat(total_sale_sum).toFixed(2)); 
        } 
        
    }
}
/* END : Function to update the profit details table calculation */

function openContent(evt, contentName) {
  $('#home').css('display','none');
  $('#vca-strategy').css('display','none');

  $('.tablinks').removeClass('active');
  $('.tablinks').removeClass('active');

  $('#'+contentName).css('display','block');
  evt.currentTarget.className += " active";   
}

function openPopupContent(evt, contentName) {
    console.log("in openPopupContent function contentName == "+contentName)
    $('#strategy_recap_tab_content').css('display','none');
    $('#strategy_edit_tab_content').css('display','none');  
    $('#strategy_profit_tab_content').css('display','none');
    $('#graph_tab_content').css('display','none');

    $('.popup_tablinks').removeClass('active');
    $('.popup_tablinks').removeClass('active');
    $('.popup_tablinks').removeClass('active');

    $('#'+contentName).css('display','block');
    evt.currentTarget.className += " active";   
}


/*Edit Stratergy Data Fetching : START  */
function getStrategyDetails(strategy_id) {
       
        var cnt = 1;
        var strategy_id = strategy_id;
        //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿', "AUD":'A&#36;'};
        strategy_detail = [];

        $.ajax({
            url: `${apiBaseurl}/get-vca`,
            data : {
                'strategy_id' : strategy_id,              
            },
            type : 'POST',
            dataType : "json",
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', wpNonce);
                $("#popup_message").css("display", "block");
                $("#popup_message").html('<h3>Fetching Your Strategy Data...</h3>');
                $("#outer_tab_content").css("display", "none");
            },
            success: (data) => {
                /* console.log(data['strategy'][0]['strategy_name']); */
                
                var table_body = "";
                var stratergy_table_values = "";
                var total_cost = 0;
                var total_no_share_buy = 0;
                //var currency_symbol = currencySymbol[data['strategy'][0]['currency']];
                var entry_limit_val = 20;

                var entery_level_arr = new Array();
                for(var z=1; z <= data['details'].length; z++) {
                    entery_level_arr.push(entry_limit_val);
                    entry_limit_val = entry_limit_val + 10;
                }

                getRecapData(data['details'].length, data['strategy'][0]['strategy_id'], data['strategy'][0]['strategy_name'], data['strategy'][0]['stock_name'], data['strategy'][0]['currency'], data['strategy'][0]['52_week_high'], data['strategy'][0]['your_investment'], data['strategy'][0]['stock_price'], data['strategy'][0]['strategy_type'] );

                var chart_stock = data['strategy'][0]['stock_name'] + data['strategy'][0]['currency'];
                getChartData(chart_stock);

                getStrategyProfitData(data);

                $("#popup_message").css("display", "none");
                $("#outer_tab_content").css("display", "block");                

                for (var i = 0; i < data['details'].length; i++) {
                    total_cost = parseFloat(total_cost) + parseFloat(data['details'][i]['additional_cost']);

                    var checked = '';
                    if(data['details'][i]['alert_flag'] == 1) {
                        checked = 'checked';
                    } else if(data['details'][i]['alert_flag'] == 2) {
                        checked = 'disabled';
                    } else {
                        checked = '';
                    }

                    var d_detail_entry_price = '';

                    if(data['details'][i]['purchase_date'] != '' && data['details'][i]['investment_amount'] > 0 && data['details'][i]['entry_price'] > 0 && data['details'][i]['no_of_shares_to_buy'] > 0) {
                        checked = 'disabled';

                        if(data['details'][i]['entry_price'] > 1) {
                            d_detail_entry_price = parseFloat(data['details'][i]['entry_price']).toFixed(2);
                        } else {
                            d_detail_entry_price = parseFloat(data['details'][i]['entry_price']).toFixed(6);
                        }
                    }

                    if(data['details'][i]['no_of_shares_to_buy'] < 1){
                        var no_of_shares_to_buy_tbl = parseFloat(data['details'][i]['no_of_shares_to_buy']).toFixed(6);
                    } else {
                        var no_of_shares_to_buy_tbl = parseFloat(data['details'][i]['no_of_shares_to_buy']).toFixed(2);
                    }

                    total_no_share_buy = (+(total_no_share_buy) + +(data['details'][i]['no_of_shares_to_buy'])).toFixed(6);

                    if(total_no_share_buy < 1){
                        total_no_share_buy = parseFloat(total_no_share_buy).toFixed(6);
                    } else {
                        total_no_share_buy = parseFloat(total_no_share_buy).toFixed(2);
                    }                    

                    table_body +='<tr><td> <input type="date" class="date_box purchase_date" name="edit_stock_buy_date'+i+'" id="edit_stock_buy_date'+i+'" value="'+data['details'][i]['purchase_date']+'" onchange="setdatetospan(this.id, '+cnt+'); edit_cost('+i+');" required><span class="d-none" style="display:none;" id="span_stock_buy_date'+i+'"> </span></td><td><input type="number" class="form-control entry_val input_num_validate" name="edit_entry_cost_'+i+'" id="edit_entry_cost_'+i+'" value="'+d_detail_entry_price+'" onkeyup="edit_cost('+i+')"></td><td><input type="number" class="form-control invested_val input_num_validate" name="edit_invested_cost_'+i+'" id="edit_invested_cost_'+i+'" value="'+data['details'][i]['investment_amount']+'" onkeyup="edit_cost('+i+')"></td><td><span class="no_share_val" id="edit_no_share_val_'+i+'">'+no_of_shares_to_buy_tbl+'</span></td><td><span class="tot_no_share_val" id="edit_tot_no_share_val_'+i+'">'+(total_no_share_buy)+'</span></td><td><input type="number" class="form-control investment_val input_num_validate" name="edit_cost_'+i+'" id="edit_cost_'+i+'" value="'+data['details'][i]['additional_cost']+'" onkeyup="edit_cost('+i+')"><input type="hidden" name="no_of_share_buy_'+i+'" id="no_of_share_buy_'+i+'" value="'+data['details'][i]['no_of_shares_to_buy']+'"><span id="span_cost_'+i+'" class="d-none" style="display:none;"></span></td><td><input type="checkbox" name="edit_chkSetAlert_'+i+'" id="edit_chkSetAlert_'+i+'" class="alert_chk" '+checked+'></td></tr>';
                    
                    stratergy_table_values +='<tr><td>'+data['details'][i]['purchase_date']+'</td><td>'+data['details'][i]['investment_amount']+'</td><td>'+data['details'][i]['real_amount']+'</td><td>'+data['details'][i]['entry_price']+'</td><td>'+parseInt(data['details'][i]['no_of_shares_to_buy'])+'</td><td>'+data['details'][i]['additional_cost']+'</td></tr>';

                    var set_alert = 0;
                    
                    var temp_array = '';
                    var temp_array = {
                            "detail_id" :  data['details'][i]['detail_id'], 
                            "purchase_date": data['details'][i]['purchase_date'], 
                            "investment_amount": parseFloat(data['details'][i]['investment_amount']).toFixed(2), 
                            "real_amount": $("#edit_real_cost_"+cnt).val(), 
                            "entry_price": parseFloat(data['details'][i]['entry_price']).toFixed(2), 
                            "no_of_shares_to_buy": parseInt(data['details'][i]['no_of_shares_to_buy']), 
                            "additional_cost": $("#edit_cost_"+cnt).val(), 
                            "alert_flag": set_alert 
                        };
                    strategy_detail.push(temp_array);   
                    cnt++;       
                }
                table_body += '<tr class="yellow-box"> <td colspan="4"></td> <td class="total">Total Cost</td><td class="total"><span id="edit_total_cost">'+total_cost.toFixed(2)+'</span></td> </tr>';
                /* alert(table_body); */
                $("#section2").val(stratergy_table_values);

                /*Below values are used for download excel */
                $("#edit_entery_level_val").val(data['details'].length);
                $("#edit_cm_type").val(data['strategy'][0]['cmc_type']);
                $("#edit_strategy_type").val(data['strategy'][0]['strategy_type']);

                $("#profit_cm_type").val(data['strategy'][0]['cmc_type']);
                $("#profit_strategy_type").val(data['strategy'][0]['strategy_type']);

                $("#edit_stock_ticker").val(data['strategy'][0]['stock_name']);
                $("#edit_currency").val(data['strategy'][0]['currency']);
                $("#edit_investment").val(data['strategy'][0]['your_investment']);
                $("#edit_current_high").val(data['strategy'][0]['52_week_high']);
                $("#edit_open_prize").val(data['strategy'][0]['stock_price']);

                $("#edit_total_gain_loss_val").val(data['strategy'][0]['total_gain_loss']);
                $("#edit_avg_price_val").val(data['strategy'][0]['average_share_price']);
                $("#edit_header_average_price_input").val(data['strategy'][0]['average_share_price']);
                $("#edit_total_gain_loss_percentage").val(data['strategy'][0]['total_gain_loss_percentage']);

                $("#edit_result_val").val(data['strategy'][0]['total_gain_loss_percentage']+"%");

                $("#edit_differance_in_price_val").val(data['strategy'][0]['share_price_difference']);                
                
                $("#edit_total_invested_val").val(data['strategy'][0]['your_investment']);
                
                /*Below values are used for download excel */

                $("#edit_strategy_id").val(strategy_id);                
                $("#edit-Strategy-table-body").empty().append(table_body);

                $("#edit_header_strategy_name").empty().text(data['strategy'][0]['strategy_name']);
                $("#edit_header_strategy_name_old").val(data['strategy'][0]['strategy_name']);
                $("#edit_header_stock_price").empty().html(data['strategy'][0]['stock_price']);
                $("#edit_header_live_price").empty().html(data['live_stock_price']);
                $("#view_header_live_price").empty().html(data['live_stock_price']);
                $("#edit_header_stock_name").empty().text(data['strategy'][0]['stock_name']);
                
                if(data['strategy'][0]['52_week_high'] > 1) {
                    $("#edit_header_curr_high").empty().html(parseFloat(data['strategy'][0]['52_week_high']).toFixed(2));
                } else {
                    $("#edit_header_curr_high").empty().html(parseFloat(data['strategy'][0]['52_week_high']).toFixed(6));
                }
                
                $("#edit_header_currency").empty().text(data['strategy'][0]['currency']);

                if(data['strategy'][0]['strategy_type'] == "SELL") {
                    $(".currency1_symbol").empty().html(data['strategy'][0]['stock_name']);
                    $(".currency2_symbol").empty().html(data['strategy'][0]['currency']);

                    $(".profit_currency1_symbol").empty().html(data['strategy'][0]['stock_name']);
                    $(".profit_currency2_symbol").empty().html(data['strategy'][0]['currency']);
                } else {
                    $(".currency1_symbol").empty().html(data['strategy'][0]['currency']);
                    $(".currency2_symbol").empty().html(data['strategy'][0]['stock_name']);

                    $(".profit_currency1_symbol").empty().html(data['strategy'][0]['currency']);
                    $(".profit_currency2_symbol").empty().html(data['strategy'][0]['stock_name']);
                }

                $("#edit_header_investment").empty().html(parseFloat(data['strategy'][0]['your_investment']).toFixed(2));
                $("#edit_header_investment_old").empty().val(parseFloat(data['strategy'][0]['your_investment']).toFixed(2));

                $("#edit_header_result").empty().text(data['strategy'][0]['total_gain_loss_percentage']+"%");
                
                if(data['strategy'][0]['strategy_type'] == "SELL") {
                    $("#edit_header_total_invest").empty().html(parseFloat(data['strategy'][0]['total_investment']).toFixed(6));

                    if(data['strategy'][0]['total_share_buy'] < 1){
                        $("#edit_header_total_share").empty().html(parseFloat(data['strategy'][0]['total_share_buy']).toFixed(6));
                    } else {
                        $("#edit_header_total_share").empty().html(parseFloat(data['strategy'][0]['total_share_buy']).toFixed(2));
                    }
                    
                    $("#edit_entery_tbl_no_shares1").val(data['strategy'][0]['total_share_buy']);
                } else {
                    $("#edit_header_total_invest").empty().html(data['strategy'][0]['total_investment']);
                    if(data['strategy'][0]['total_share_buy'] < 1){
                        $("#edit_header_total_share").empty().html(parseFloat(data['strategy'][0]['total_share_buy']).toFixed(6));
                    } else {
                        $("#edit_header_total_share").empty().html(parseFloat(data['strategy'][0]['total_share_buy']).toFixed(2));
                    }
                    $("#edit_entery_tbl_no_shares1").val(data['strategy'][0]['total_share_buy']);
                }

                if(data['strategy'][0]['average_share_price'] < 1) {
                    var tbl_average_share_price = parseFloat(data['strategy'][0]['average_share_price']).toFixed(6);
                } else {
                    var tbl_average_share_price = parseFloat(data['strategy'][0]['average_share_price']).toFixed(2);
                }

                if(data['strategy'][0]['share_price_difference'] < 1) {
                    var tbl_share_price_difference = parseFloat(data['strategy'][0]['share_price_difference']).toFixed(6);
                } else {
                    var tbl_share_price_difference = parseFloat(data['strategy'][0]['share_price_difference']).toFixed(2);
                }
                
                $("#edit_header_average_price").empty().html(tbl_average_share_price);
                $("#edit_header_price_diff").empty().html(tbl_share_price_difference);

                if(data['strategy'][0]['total_gain_loss'] >= 0) {

                    if(data['strategy'][0]['total_gain_loss'] < 1) {
                        $("#edit_header_gain_loss").empty().html(parseFloat(data['strategy'][0]['total_gain_loss']).toFixed(6)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>"); 
                    } else {
                        $("#edit_header_gain_loss").empty().html(parseFloat(data['strategy'][0]['total_gain_loss']).toFixed(2)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>"); 
                    }
                               
                    $("#edit_header_gain_loss").css('color','#67c275');
                } else {

                    if(data['strategy'][0]['total_gain_loss'] < 1) {
                        $("#edit_header_gain_loss").empty().html(parseFloat(data['strategy'][0]['total_gain_loss']).toFixed(6)+" <i class='fa fa-arrow-down' aria-hidden='true'></i>");
                    } else {
                        $("#edit_header_gain_loss").empty().html(parseFloat(data['strategy'][0]['total_gain_loss']).toFixed(2)+" <i class='fa fa-arrow-down' aria-hidden='true'></i>");
                    }
                                
                    $("#edit_header_gain_loss").css('color','red');
                }
                
            }
        });    
    }

    /* Stratergy Profit Data Fetching : START  */
    function getStrategyProfitData(data) {
      
        var cnt = 1;
        var total_filled_rows = 0;
        var avg_take_profit_price = 0;
        var strategy_id = strategy_id;
        //let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;',"BTC":'₿', "AUD":'A&#36;'};
        profit_detail = [];

        /* console.log(data['strategy'][0]['strategy_name']); */
                
        var table_body = "";
        var profit_table_values = "";
        var total_cost = 0;
        var total_no_share_buy = 0;
        //var currency_symbol = currencySymbol[data['strategy'][0]['currency']];
        var entry_limit_val = 5;
        var total_holding = 0;
        var total_holding_value = 0;
        var total_sale_sum = 0;
        var total_token_sell = 0;
        var total_tokens = data['strategy'][0]['total_share_buy'];
        var total_invest = data['strategy'][0]['total_investment'];
        var total_holding_new = total_tokens;
        var total_invest_new = total_invest;

        var profit_header_gain_loss = 0; 
        var profit_header_gain_loss_percent = 0; 

        var cm_strategy_for = $("#profit_strategy_type").val();
console.log("profit_strategy_type === "+cm_strategy_for);
        var entery_level_arr = new Array();
        for(var z=1; z <= 7; z++) {
            entery_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 5;
        }

        $("#popup_message").css("display", "none");
        $("#outer_tab_content").css("display", "block");                

        for (var i = 0; i < data['profits'].length; i++) {
            total_cost = parseFloat(total_cost) + parseFloat(data['profits'][i]['additional_cost']);

            var checked = '';
            if(data['profits'][i]['alert_flag'] == 1) {
                checked = 'checked';
            } else if(data['profits'][i]['alert_flag'] == 2 || data['profits'][i]['current_holding'] == 0) {
                checked = 'disabled';
            } else {
                checked = '';
            }

            if(data['profits'][i]['date_sale'] != '' && data['profits'][i]['your_fiat_sale_sum'] > 0 && data['profits'][i]['your_take_profit_price'] > 0) {
                checked = 'disabled';

                avg_take_profit_price = +avg_take_profit_price + +data['profits'][i]['your_take_profit_price'];
                total_filled_rows = total_filled_rows + 1;

                total_holding = +(total_holding) + +(data['profits'][i]['current_holding']);
                total_holding_new = (total_holding_new - data['profits'][i]['your_fiat_sale_sum']).toFixed(6);
                total_sale_sum = +(total_sale_sum) + +(data['profits'][i]['your_fiat_sale_sum']);
                total_token_sell = +(total_token_sell) + +(data['profits'][i]['number_of_tokens']);

            } else {

                if(cm_strategy_for == "SELL") {
                    total_holding = +(total_holding) + +(data['profits'][i]['current_holding']);
                    total_invest_new = (total_invest_new - data['profits'][i]['your_fiat_sale_sum']).toFixed(6);
                    total_sale_sum = +(total_sale_sum) + +(data['profits'][i]['your_fiat_sale_sum']);
                    total_token_sell = +(total_token_sell) + +(data['profits'][i]['number_of_tokens']);
                } else {
                    total_holding = +(total_holding) + +(data['profits'][i]['current_holding']);
                    total_holding_new = (total_holding_new - data['profits'][i]['your_fiat_sale_sum']).toFixed(6);
                    total_sale_sum = +(total_sale_sum) + +(data['profits'][i]['your_fiat_sale_sum']);
                    total_token_sell = +(total_token_sell) + +(data['profits'][i]['number_of_tokens']);
                }
                
            }
            //total_no_share_buy = (+(total_no_share_buy) + +(data['profits'][i]['no_of_shares_to_buy'])).toFixed(6);
            
            if(data['profits'][i]['take_profit_price'] == 0) {
                var take_profit_price_new = parseFloat(data['profits'][i]['take_profit_price']).toFixed(2);
            } else if(data['profits'][i]['take_profit_price'] != 0 && data['profits'][i]['take_profit_price'] < 1) {
                var take_profit_price_new = parseFloat(data['profits'][i]['take_profit_price']).toFixed(6);
            } else {
                var take_profit_price_new = parseFloat(data['profits'][i]['take_profit_price']).toFixed(2);
            }

            if(data['profits'][i]['your_take_profit_price'] == 0) {
                var your_take_profit_price_new = parseFloat(data['profits'][i]['your_take_profit_price']).toFixed(2);
            } else if(data['profits'][i]['your_take_profit_price'] != 0 && data['profits'][i]['your_take_profit_price'] < 1) {
                var your_take_profit_price_new = parseFloat(data['profits'][i]['your_take_profit_price']).toFixed(6);
            } else {
                var your_take_profit_price_new = parseFloat(data['profits'][i]['your_take_profit_price']).toFixed(2);
            }

            if(data['profits'][i]['current_holding'] < 1) {
                var ptabl_current_holding = parseFloat(data['profits'][i]['current_holding']).toFixed(6);
            } else {
                var ptabl_current_holding = parseFloat(data['profits'][i]['current_holding']).toFixed(2);
            }

            table_body +='<tr><td><input type="date" class="date_box sale_date" name="edit_stock_sale_date'+i+'" id="edit_stock_sale_date'+i+'" value="'+data['profits'][i]['date_sale']+'" onchange="setdatetospan(this.id, '+cnt+'); edit_profit('+cnt+');" required><span class="d-none" style="display:none;" id="span_stock_sale_date'+i+'"> </span></td>';
            table_body +='<td> '+entery_level_arr[i]+'%</td>';
            table_body +='<td><span class="no_share_val" id="edit_current_holding_'+i+'">'+ptabl_current_holding+'</span></td>';
            table_body +='<td><input type="number" class="form-control invested_val input_num_validate" name="edit_your_fiat_sale_sum_'+i+'" id="edit_your_fiat_sale_sum_'+i+'" value="'+data['profits'][i]['your_fiat_sale_sum']+'" onkeyup="edit_profit('+cnt+')"></td>';
            table_body +='<td><span class="no_share_val" id="edit_take_profit_price_'+i+'">'+take_profit_price_new+'</span></td>';
            table_body +='<td><input type="number" class="form-control entry_val input_num_validate" name="edit_your_take_profit_price_'+i+'" id="edit_your_take_profit_price_'+i+'" value="'+your_take_profit_price_new+'" onkeyup="edit_profit('+cnt+')"></td>';
            table_body +='<td><span class="no_share_val" id="edit_number_of_tokens_'+i+'">'+(data['profits'][i]['number_of_tokens'])+'</span></td>';
            table_body +='<td> <input type="number" class="form-control entry_val input_num_validate" name="edit_exchange_fees_'+i+'" id="edit_exchange_fees_'+i+'" value="'+data['profits'][i]['exchange_fees']+'" onkeyup="edit_profit('+cnt+')">%</td>';
            table_body +='<td><span class="no_share_val" id="edit_trade_cost_'+i+'">'+data['profits'][i]['trade_cost']+'</span></td>';
            table_body +='<td><input type="checkbox" name="profit_chkSetAlert_'+i+'" id="profit_chkSetAlert_'+i+'" class="alert_chk" '+checked+'></td></tr>';
                    
            //stratergy_table_values +='<tr><td>'+data['details'][i]['purchase_date']+'</td><td>'+currency_symbol+' '+data['details'][i]['investment_amount']+'</td><td>'+currency_symbol+' '+data['details'][i]['real_amount']+'</td><td>'+currency_symbol+' '+data['details'][i]['entry_price']+'</td><td>'+parseInt(data['details'][i]['no_of_shares_to_buy'])+'</td><td>'+currency_symbol+' '+data['details'][i]['additional_cost']+'</td></tr>';

            var set_alert = 0;
                    
            var temp_array = '';
            var temp_array = {
                "profit_id" :  data['profits'][i]['profit_id'], 
                "date_sale": data['profits'][i]['date_sale'], 
                "sale_sum": data['profits'][i]['sale_sum'], 
                "sale_percent_profit": data['profits'][i]['sale_percent_profit'],
                "your_fiat_sale_sum": data['profits'][i]['your_fiat_sale_sum'],
                "take_profit_price": data['profits'][i]['take_profit_price'],
                "your_take_profit_price": data['profits'][i]['your_take_profit_price'],
                "number_of_tokens": data['profits'][i]['number_of_tokens'],
                "exchange_fees": data['profits'][i]['exchange_fees'],
                "trade_cost": data['profits'][i]['trade_cost'],
                "current_holding": data['profits'][i]['current_holding'], 
                "alert_flag": set_alert 
            };
            profit_detail.push(temp_array);   
            cnt++;       
        }

/*console.log("total_invest_new ::: "+total_invest_new);
console.log("total_holding_value --- ::: "+total_holding_value);  

console.log("total_token_sell ::: "+total_token_sell);
console.log("total_investment --- ::: "+data['strategy'][0]['total_investment']);  */


        if(cm_strategy_for == "SELL") {
            total_holding_value = total_invest_new / data['live_stock_price'];
            var total_sell = (total_holding_value + total_token_sell);

            if(total_sell > data['strategy'][0]['total_investment']) {
                profit_header_gain_loss = total_sell - data['strategy'][0]['total_investment'];
            } else {
                profit_header_gain_loss = data['strategy'][0]['total_investment'] - (total_holding_value + total_token_sell);
            }
            
        } else {
            total_holding_value = total_holding_new * data['live_stock_price'];
            profit_header_gain_loss = (total_holding_value + total_token_sell) - data['strategy'][0]['total_investment'];
        }     
//console.log("total_holding_value ::: "+total_holding_value);         

if(total_holding_value > 0 || total_token_sell > 0) {
    profit_header_gain_loss_percent = (((total_holding_value + total_token_sell) / data['strategy'][0]['total_investment']) * 100);
} else {
    profit_header_gain_loss_percent = 0;
}
/*console.log("total_holding_value ::: "+total_holding_value);
console.log("total_sale_sum ::: "+total_sale_sum);
console.log("profit_header_gain_loss ::: "+profit_header_gain_loss);
console.log("profit_header_gain_loss_percent ::: "+profit_header_gain_loss_percent);
console.log("total_investment ::: "+data['strategy'][0]['your_investment']); */ 
        $("#profit_tbl_body").empty().append(table_body);

        $("#profit_header_total_token_sell").val(total_token_sell);

        $("#profit_header_strategy_name").empty().text(data['strategy'][0]['strategy_name']);
        $("#profit_header_strategy_name_old").val(data['strategy'][0]['strategy_name']);
        $("#profit_header_stock_price").empty().html(data['strategy'][0]['stock_price']);
        $("#profit_header_live_price").empty().html(data['live_stock_price']);
        $("#profit_header_live_price_input").val(data['live_stock_price']);
        $("#view_header_live_price").empty().html(data['live_stock_price']);
        $("#profit_header_stock_name").empty().text(data['strategy'][0]['stock_name']);
                
        if(data['strategy'][0]['52_week_high'] > 1) {
            $("#profit_header_curr_high").empty().html(parseFloat(data['strategy'][0]['52_week_high']).toFixed(2));
        } else {
            $("#profit_header_curr_high").empty().html(parseFloat(data['strategy'][0]['52_week_high']).toFixed(6));
        }

        $("#profit_header_currency").empty().text(data['strategy'][0]['currency']);
        $("#profit_header_investment").empty().html(parseFloat(data['strategy'][0]['your_investment']).toFixed(2));
        $("#profit_header_investment_old").val(parseFloat(data['strategy'][0]['your_investment']).toFixed(2));

        $("#profit_header_result").empty().text(profit_header_gain_loss_percent.toFixed(2)+"%");

        if(total_holding_value == 0) {
            $("#profit_header_current_holding_value").empty().html(total_holding_value);
        } else if(total_holding_value > 0 && total_holding_value < 1) {
            $("#profit_header_current_holding_value").empty().html(parseFloat(total_holding_value).toFixed(6));
        } else {
            $("#profit_header_current_holding_value").empty().html(parseFloat(total_holding_value).toFixed(2));
        }

        if(total_sale_sum < 1) {
            $("#profit_header_total_sold").empty().html(parseFloat(total_sale_sum).toFixed(6)); 
        } else {
            $("#profit_header_total_sold").empty().html(parseFloat(total_sale_sum).toFixed(2)); 
        }

        if(cm_strategy_for == "SELL") {
            var current_holding_tokens = total_tokens - total_sale_sum.toFixed(6);
        } else {
            var current_holding_tokens = total_tokens - total_sale_sum.toFixed(6);
        }
        

        $("#profit_header_total_share_sell").empty().html(total_token_sell.toFixed(6));
        $("#profit_header_holding_share").empty().html(current_holding_tokens.toFixed(6));

        if(total_filled_rows > 0) {
            var avg_share_price_updated = avg_take_profit_price / total_filled_rows;
        } else {
            var avg_share_price_updated = 0;
        }
        
        if(avg_share_price_updated < 1) {
            avg_share_price_updated = avg_share_price_updated.toFixed(6);
        } else {
            avg_share_price_updated = avg_share_price_updated.toFixed(2);
        } 

        $("#profit_header_average_price").empty().html(avg_share_price_updated);
        $("#profit_header_price_diff").empty().html(data['strategy'][0]['share_price_difference']);

        if(profit_header_gain_loss >= 0) {

            if(profit_header_gain_loss < 1){
                $("#profit_header_gain_loss").empty().html(profit_header_gain_loss.toFixed(6)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>");
            } else {
                $("#profit_header_gain_loss").empty().html(profit_header_gain_loss.toFixed(2)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>");
            }
                        
            $("#profit_header_gain_loss").css('color','#67c275');
        } else {
            if(profit_header_gain_loss < 1){
                $("#profit_header_gain_loss").empty().html(profit_header_gain_loss.toFixed(6)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>");
            } else {
                $("#profit_header_gain_loss").empty().html(profit_header_gain_loss.toFixed(2)+" <i class='fa fa-arrow-up' aria-hidden='true'></i>");
            }           
            $("#profit_header_gain_loss").css('color','red');
        }             
            
           
    }

    function getChartData(stock_name) {
        $("#chart-popup-title").html(stock_name);

        new TradingView.widget({
            "width": "100%",
            "height": 550,
            "symbol": stock_name,
            "interval": "H",
            "timezone": "Europe/London",
            "theme": "light",
            "style": "1",
            "locale": "en",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "hide_side_toolbar": false,
            "container_id": "tradingview_c9767",
            "save_image": false,
            "studies": [
                "STD;RSI"
            ],
        });
    }
</script>   
<script>
/*poonam added 08 Apr*/

document.addEventListener('DOMContentLoaded', createSelect, false);
 
function createSelect() {
    var select = document.getElementsByTagName('select'),
      liElement,
      ulElement,
      optionValue,
      iElement,
      optionText,
      selectDropdown,
      elementParentSpan;

      for (var select_i = 0, len = select.length; select_i < len; select_i++) {
        //console.log('selects init');
        /*RAM REMOVED ON 27NOV23
        none to block
        */
      select[select_i].style.display = 'none';
       //select[select_i].style.display = 'block';

      wrapElement(document.getElementById(select[select_i].id), document.createElement('div'), select_i, select[select_i].getAttribute('placeholder-text'));

      for (var i = 0; i < select[select_i].options.length; i++) {
        liElement = document.createElement("li");
        optionValue = select[select_i].options[i].value;
        optionText = document.createTextNode(select[select_i].options[i].text);
        liElement.className = 'select-dropdown__list-item';
        liElement.setAttribute('data-value', optionValue);
        liElement.appendChild(optionText);
      //console.log(ulElement,liElement);
        ulElement.appendChild(liElement);

        liElement.addEventListener('click', function () {
          displyUl(this);
        }, false);
      }
    }
    function wrapElement(el, wrapper, i, placeholder) {
      el.parentNode.insertBefore(wrapper, el);
      wrapper.appendChild(el);

      document.addEventListener('click', function (e) {
        let clickInside = wrapper.contains(e.target);
        if (!clickInside) {
          let menu = wrapper.getElementsByClassName('select-dropdown__list');
          menu[0].classList.remove('active');
        }
      });
      /*RAM REMOVED ON 27NOV23*/
      var buttonElement = document.createElement("button"),
        spanElement = document.createElement("span"),
        //spanText = document.createTextNode('All Categories'); // placeholder
     spanText = document.createTextNode(placeholder);
        iElement = document.createElement("i");
        ulElement = document.createElement("ul");

      wrapper.className = 'select-dropdown select-dropdown--' + i;
      buttonElement.className = 'select-dropdown__button select-dropdown__button--' + i;
      buttonElement.setAttribute('data-value', '');
      buttonElement.setAttribute('type', 'button');
      spanElement.className = 'select-dropdown select-dropdown--' + i;
      iElement.className = 'zmdi zmdi-chevron-down';
      ulElement.className = 'select-dropdown__list select-dropdown__list--' + i;
      ulElement.id = 'select-dropdown__list-' + i;

      wrapper.appendChild(buttonElement);
      spanElement.appendChild(spanText);
      buttonElement.appendChild(spanElement);
      buttonElement.appendChild(iElement);
      wrapper.appendChild(ulElement);
    }

    function displyUl(element) {

      if (element.tagName == 'BUTTON') {
        selectDropdown = element.parentNode.getElementsByTagName('ul');
        //var labelWrapper = document.getElementsByClassName('js-label-wrapper');
        for (var i = 0, len = selectDropdown.length; i < len; i++) {
          selectDropdown[i].classList.toggle("active");
          //var parentNode = $(selectDropdown[i]).closest('.js-label-wrapper');
          //parentNode[0].classList.toggle("active");
        }
      } else if (element.tagName == 'LI') {
        var selectId = element.parentNode.parentNode.getElementsByTagName('select')[0];
        selectElement(selectId.id, element.getAttribute('data-value'));
        elementParentSpan = element.parentNode.parentNode.getElementsByTagName('span');
        element.parentNode.classList.toggle("active");
        elementParentSpan[0].textContent = element.textContent;
        elementParentSpan[0].parentNode.setAttribute('data-value', element.getAttribute('data-value'));
      }

    }
    function selectElement(id, valueToSelect) {
      var element = document.getElementById(id);
      element.value = valueToSelect;
      element.setAttribute('selected', 'selected');
    }
    var buttonSelect = document.getElementsByClassName('select-dropdown__button');
    for (var i = 0, len = buttonSelect.length; i < len; i++) {
      buttonSelect[i].addEventListener('click', function (e) {
        e.preventDefault();
        displyUl(this);
      }, false);
    }
}
/* end poonam added 08 Apr*/

</script> 
<?php
get_footer();