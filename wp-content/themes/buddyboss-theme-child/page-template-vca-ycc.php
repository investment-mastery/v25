<?php
/*
 * Template name: YCC VCA Template
 *
 */

get_header();

$club = get_club_slug();

?>
<style>
    @media print {
  body {
    visibility: hidden;
  }
  #content {
    visibility: visible;
    position: absolute;
    top: 0;
  }
}

</style>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/vca.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<div class="container-fluid vca-cca-calculator" id="allData">
    <div class="col-lg-12 col-sm-12">
      <div class="">  
        <!-- <header class="entry-header"><h1 class="entry-title text-center"><?php the_title(); ?></h1></header> --> 
        <div class="tab_mobile_scroll">       
        <div class="entry-header tab">
            <a class="tablinks active tab_first" onclick="openContent(event, 'home')"><?php the_title(); ?></a>
            <a class="tablinks" onclick="openContent(event, 'vca-strategy')">Strategy</a>
            <a class="tablinks" onclick="saveStrategyAlert('/ycc-vca-my-strategy')">My Strategies</a>
            <a class="tablinks" onclick="saveStrategyAlert('/ycc-vca-my-alerts')">My Alerts <span id="alert_notify_cnt"></span></a>
        </div>
       </div>
       <p class="x-error"></p>
    </div>
    </div>
    <div class="watchnow"><?php echo do_shortcode( '[elementor-template id="18140"]' ); ?></div>
    <!-- Tab panes -->
    <div class="tab-content" id="fullpage">

        <div id="home" class="tab-pane active">
          <div class="row" id="test">
                <div class="col-lg-4  col-sm-12">
                    <div class="percent1" id="stock_div">
                        <h4 style="">Stock</h4>
                        <input type="text" class="btn-primary percent1_input" name="stock" id="stock_ticker"  value="AAPL" title="Enter Ticker" >
                    </div>

                    <div class="percent1" id="currency_div">
                        <h4 style="">Currency</h4>
                         <select class="form-select form-select-lg form-control" name="currency" id="currency" placeholder-text="USD" >
                             <option value="USD">USD</option>
                             <option value="GBP">GBP</option>
                             <option value="EUR">EUR</option>
                             <option value="AUD">AUD</option>
                           </select>
                    </div>
                        <input type="hidden" name="open_prize" id="open_prize"> 
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="blue-box">

                        <h4>Live Stock Price</h4>
                        <h3><span class="currSymbol">$</span><span id="stock_price"></span></h3>
                        <h6 id="stock_diff_h" style="color:#67c275;"><span class="currSymbol">$</span><span id="stock_diff"> <i class="fa fa-arrow-up" aria-hidden="true"></i></span></h6>
                    </div>
                            
                </div>



                <div class="col-lg-4 col-sm-12">
                    <div class="percent1" id="high_div">
                        <h4 style=""> Current High</h4>
                        <input type="number" class="btn-primary percent1_input input_num_validate" name="current_hight" id="current_hight" value="150" title="Last 3 Months High">
                    </div>

                    <div class="percent1" id="invest_div">
                        <h4 style="">Your Investment</h4>
                        <input type="number" class="btn-primary percent1_input input_num_validate" name="investment" id="investment" value="2000" title="Your Total Investment Amount">
                    </div>
                    <input type="hidden" name="ticker_high" id="ticker_high">   
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="col-lg-4 col-sm-12">
                        <div id="div_sel_entry" class="calculate">
                            <!-- <div class="div_sel_entry_text">Select series  </div> -->
                            <div>
                                <select class="form-select form-select-lg form-control entry_dropdown" name="sel_entry_level" id="sel_entry_level" placeholder-text="6 -70%" title="Select your total number of entries">
                                    <option value=""></option>
                                    <!-- <option value="1">1 -20%</option>
                                    <option value="2">2 -30%</option>
                                    <option value="3">3 -40%</option> -->
                                    <option value="4">4 -50%</option>
                                    <option value="5">5 -60%</option>
                                    <option value="6" selected>6 -70%</option>
                                    <option value="7">7 -80%</option>
                                    <option value="8">8 -90%</option>
                                </select>
                                <!-- <i class="fa fa-angle-down entry_lvl_dropdown"></i> -->
                            </div>
                            <!-- <span class="entry-lvl-text">(Select your total number of entries)</span> -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center"><button class="btn-dark" style="" id="calculate_btn" type="button" >Calculate</button></div>
                    <div class="col-lg-4 col-sm-12">
                        &nbsp;
                    </div>
                    
                    <input type="hidden" name="stock_name" id="stock_name">
                    <input type="hidden" name="currency_input" id="currency_input">
                    <input type="hidden" name="current_price" id="current_price">
                    <input type="hidden" name="week_high" id="week_high">
                    <input type="hidden" name="your_invest" id="your_invest">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 row-0-padding">
                    
                    <div class="table-responsive-lg" id="first_table">
                                    <table class="table table-striped text-center" >
                                        <thead>
                                          <tr class="vca_table_head">
                                            <th>Entry Levels</th>
                                            <th>Entry Price</th>
                                            <th>Investment</th>
                                            <th>Percent of The Total Amount</th>
                                            <th>Number of Shares You Buy</th>
                                            <th>Accumulated Amount of Shares</th>
                                            <th>Average Share Price</th>
                                            <th>Sell After 15%</th>
                                            <th>Sell After 20%</th>
                                          </tr>
                                        </thead>
                                        <tbody id="entery_table">
                                          
                                          
                                        </tbody>
                                </table>
                                </div>

                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-sm-12 row-0-padding">
                    <!-- <h2>Trading View</h2> -->
                    <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                          <div id="tradingview_c9767"></div>
                          <div class="tradingview-widget-copyright">&nbsp;</div>
                          
                        </div>
                        <!-- TradingView Widget END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center" style="padding-bottom: 18px;">
                    <button type="button" onclick="window.print()" class="btn-dark">Print this page</button>
                    <button type="button" onclick="downloadExcel()" class="btn-dark">Download Excel</button>
                </div>
            </div>
        </div>
            
        <div id="vca-strategy" class="container tab-pane" style="display: none; padding-left: 0px !important;">
            <div class="col-lg-12 col-sm-12">
                <div class="calculate">
                    <p>Enter placed orders. Once the order is realized, enter the date.</p>
                </div>
                <div class="table-responsive-lg Strategy-table">
                    <table class="table table-striped text-center " id="strategy_tbl">
                        <thead style="text-align: center;">
                            <tr >
                                <th>Date</th>
                                <th>Invested Money</th>
                                <th>Balance Amount</th>
                                <th>Real Amount</th>
                                <th>Entry Price</th>
                                <th>Shares</th>
                                <th>Cost</th>
                                <th>Alert <input type="checkbox" name="checkAll" id="checkAll"></th>
                            </tr>
                        </thead>
                        <tbody id="stratergy_table_values">
                                
                        </tbody>
                    </table>
                </div>
                
                    <div class="col-lg-12 col-sm-12">
                        <div class="col-lg-3 col-sm-12"></div>
                        <div class="col-lg-6 col-sm-12" style="margin:20px 0;">
                            <div class="percent" style="padding:20px;">
                                    
                                <div class="result-stratergy" style="border-right: 1px solid #b1b4b8;">
                                    <h2><span id="vca_result"> </span></h2>
                                    <h3>Result</h3>
                                </div>
                                <div class="reult-stratergy">
                                    <h2 style="color:#67c275;"> <span id="total_gain"><span class="currSymbol">$</span>0.00</span> <i class="fa fa-arrow-up" aria-hidden="true"></i></h2>
                                    <h3>Total Gain/Loss </h3>
                                </div>                              
                                                             
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-12"></div>
                    </div>
               <div class="row">
                <div class="col-lg-12 col-sm-12">
                    
                        <div class="div-strategy-details">
                            <div class="price">
                                <h1>Total<br> Invested</h1>
                                <h2><span id="tot_invseted"></span></h2>
                            </div>              
                        </div>                              
                        <div class="div-strategy-details">
                            <div class="price" >
                                <h1>Total Amount<br> of Shares</h1>
                                <h2><span id="tot_amt_share"></span></h2>
                            </div>              
                        </div>
                        <div class="div-strategy-details">
                            <div class="price" >
                                <h1>Average<br> Price</h1>
                                <h2><span id="avg_all_share_price"></span></h2>
                            </div>              
                        </div>
                        <div class="div-strategy-details"  style="padding-right: 0px !important;">
                            <div class="price" >
                                <h1>Difference<br> in Price</h1>
                                <h2><span id="diff_price"></span></h2>
                            </div>              
                        </div>
                    <input type="hidden" name="final_total_share" id="final_total_share" value="0">
                        <input type="hidden" name="final_avg_price" id="final_avg_price" value="0">
                </div></div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center" style="padding-bottom: 18px;">
                    <a class="save_link open_popup" data-popup="#save_popup"><button type="button" class="btn-light">Save Strategy</button></a>
                    <button type="button" onclick="window.print()" class="btn-dark">Print this page</button>
                    <button type="button" onclick="downloadExcel()" class="btn-dark">Download Excel</button>
                </div>
            </div>
        </div>
             
    </div>      
</div>
    
    <div class="row d-none" style="display: none;" >
        <form method="Post" id="pdf_gen" action="/ycc-vca-download-excel/" target="_blank">
            <input type="hidden" name="symbol" id="symbol_excel">
            <input type="hidden" name="currency" id="currency_excel">
            <input type="hidden" name="investment" id="investment_excel">
            <input type="hidden" name="current_hight" id="current_hight_excel">
            <textarea name="section1" id="section1"></textarea>
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

    <div id="save_popup" class="overlay">
        <div class="popup">
            <a class="close close_popup" data-popup="#save_popup">&times;</a>
            <div class="content">                
                <p><span id="save_strategy_lbl" class="save_strategy_lbl">Please enter name for your strategy</span></p>
                <p class="error" id="save_strategy_error" style="display:none;">This strategy name is already used. Please try another one.</p>
                    <input type="text" name="txtStrategyName" id="txtStrategyName">
                <p class="save_popup_buttons">                
                    <button type="button" class="btn-light" id="btn_save_strategy">SAVE</button> 
                    <button type="button" class="btn-light cancel-popup close_popup"  data-popup="#save_popup">CANCEL</button>
                </p>
            </div>
        </div>
    </div>

    <div id="save_alert_popup" class="overlay">
        <div class="popup" style="max-width:560px !important;">
            <a class="close close_popup" data-popup="#save_alert_popup">&times;</a>
            <div class="content" style="text-align: center !important;">
                <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 6em;"></i>
                <p style="font-size: 28px; font-weight: bold; line-height: 50px;">Do you want to leave this page?</p>
                <p style="font-size: 18px; line-height: 35px;">Changes you made may not be saved</p>
                <p>
                    <button type="button" class="btn-light leave_yes">LEAVE</button> 
                    <button type="button" class="btn-light leave_no" data-popup="#save_popup">SAVE</button>
                    <input type="hidden" name="save_alert_redirect_url" id="save_alert_redirect_url">
                </p>
            </div>
        </div>
    </div>

<style>
@page { size: 42cm 29.7cm;margin: 1cm 1cm 1cm 1cm; }

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

#currency_div button {
  display: none;
}

#currency_div .select-dropdown {
  display: block;
}
    
#save_popup .popup {
    font-family: "Source Sans Pro", sans-serif !important;
}
#save_popup h1 {
    font-family: "Source Sans Pro", sans-serif !important;
}
#save_alert_popup .popup {
    font-family: "Source Sans Pro", sans-serif !important;
}

.alert_unseen_cnt {
    position: relative;
    top: -11px;
    right: 6px;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: #1F3C61;
    color: #fff;    
    font-size: 12px !important;
    font-weight: normal;
    vertical-align: middle;
}

.entry-lvl-text {
    font-size: 16px;
    top: 15px;
    position: relative;
}

.entry_lvl_dropdown {
    float: right;
    color: #818b97;
    font-size: 21px;
    top: -27px;
    right: 10px;
    position: relative;
    z-index: -10px;
}

#div_sel_entry {
    display: flex; 
    vertical-align: middle; 
    float: left;
    /*margin-bottom: 15px;*/
}

/*#div_sel_entry select {
    display: block !important;
    background-color: #55a9f5;
    color: #ffffff !important;
}*/

#div_sel_entry select option {    
    background-color: #ffffff;
    color: #818b97;
}

#div_sel_entry button {
    /*display: none !important;*/
    background-color: #55a9f5;
    color: #ffffff;
    width: 120px !important;
}

.div_sel_entry_text {
    line-height: 54px;
    padding-right: 10px;
    font-weight: bold;
}

.entry_dropdown {
  width: 110px;
 text-align: center;
 /*line-height: 30px;*/
}

.entry_dropdown * {
 width: 100px;
 text-align: center;
 line-height: 30px;
}

.overlay {
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}
input .error {
    border: 1px solid #ff0000 !important;
    background-color: #fbeaeb !important;
} 

.tab_first {
    padding-left: 0px !important;
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
    text-align: left;
}

#save_popup button {
    font-size: 14px !important;
    margin-right: 10px !important;
    margin-left: 0px !important;
    margin-bottom: 5px !important;
}

#edit_popup .content {
    min-height:400px;
}
#edit_popup .calculate {
    text-align: center;
}
#edit_popup .popup {
    max-width:1050px !important;
}

#edit_popup .edit_real_cost {
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
    border-radius: 4px;
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
    
span.select-dropdown.select-dropdown--1, span.select-dropdown.select-dropdown--2 {
    float: left;
    /*margin-left: 28px;*/
    margin-left: 6px;
    width: 80%;
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
    background-color: #55a9f5 !important; 
    border-color: #55a9f5 !important; 
    width: auto !important; 
    font-size: 11px !important; 
}
    


.select-dropdown button, .select-dropdown__button {
    border-radius: 6px !important;
    padding: 8px 10px !important;
}

.btn-light {
    font-size: 20px !important;
    background-color: #55a9f5 !important;
    margin: 20px;
    font-family: 'Montserrat', sans-serif;
    padding: 8px 40px;
    text-transform: uppercase;
    border-radius: 4px;
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
    
    .watchnow{
        margin-top:10px;
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
    min-width: 140px !important;
}

.Strategy-table th {
    width: 100% !important;
    min-width: 140px !important;
    text-align: center !important;
}
.edit-popup-table tbody, .edit-popup-table td, .edit-popup-table tfoot,  .edit-popup-table thead, .edit-popup-table tr {
    width: 100% !important;
    min-width: 80px !important;
}
a.edit_link, a.delete_link {
    padding: 0 10px;
    font-size: 16px;
}

a.view_link {
    cursor: pointer !important;
}
    
.my-strategy-table thead, .my-strategy-table th {
    width: 100% !important;
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 120px !important;
    font-size: 16px !important;
    color: #fff !important;
}
.my-strategy-table tbody, .my-strategy-table tr, .my-strategy-table td{
    width: 100% !important;
    text-align: left !important;
    font-family: "Source Sans Pro", sans-serif !important;
    min-width: 120px !important;
    font-size: 16px !important;
    color: #54595f !important;
    font-weight: normal !important;
    padding: 10px 16px !important;
}

.my-strategy-table tr, .my-strategy-table td {
    padding: 10px 16px !important;
}

.no_share_val {
    display: revert !important;
    width: 50% !important;
}
.real_val {
    display: revert !important;
    width: 80% !important;
}
.invested_val {
   /* display: revert !important;*/
    width: 80% !important;
}
.entry_val {
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
            padding: 14px 4px;
        }
        .entry-header a {
            font-size:13px;
        }
        .entry-header  {
            width: 100%;
        }
        .alert_unseen_cnt {
            position: relative;
            top: -11px;
            right: 6px;
            padding: 3px 7px;
            border-radius: 50%;
            background-color: #1F3C61;
            color: #fff;
            font-size: 10px !important;
            font-weight: normal;
            vertical-align: middle;
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

        #div_sel_entry {
            display: inline-block;
            vertical-align: middle;
            margin-bottom: 15px;
            float: initial;
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
    @media (max-width: 900px){
        .my-stra-text, .my-stra-text1 {
            width: 100%;
            margin: 10px 0;
        }
        .calculate p {
            width: 100%;
        }
        .tab a {
            font-size:12px;
            padding: 14px 4px;
        }
        .entry-header a {
            font-size:12px;
        }
        .entry-header  {
            width: 100%;
        }
        .alert_unseen_cnt {
            position: relative;
            top: -11px;
            right: 6px;
            padding: 3px 7px;
            border-radius: 50%;
            background-color: #1F3C61;
            color: #fff;
            font-size: 10px !important;
            font-weight: normal;
            vertical-align: middle;
        }
    }
    @media (max-width: 768px){
        .my-stra-text {
            margin:10px 0 !important;
        }
        .calculate p {
            width: 100%;
        }
        .my-stra-text1 {
            margin-bottom: 15px !important;
        }
        .tab_mobile_scroll{
            max-height: 64px;
            overflow-y: hidden;
        }
        .tab a {
            font-size: 12px;
            padding: 14px 4px;
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
            font-size: 16px !important;
            margin:5px 0;
        }
        .entry-header a {
            font-size:13px;
        }
        .entry-header  {
            width: 100%;
        }
        .alert_unseen_cnt {
            position: relative;
            top: -11px;
            right: 6px;
            padding: 3px 7px;
            border-radius: 50%;
            background-color: #1F3C61;
            color: #fff;
            font-size: 10px !important;
            font-weight: normal;
            vertical-align: middle;
        }
        #div_sel_entry {
            display: inline-block;
            vertical-align: middle;
            margin-bottom: 15px;
            float: initial;
        }

    }


</style>
<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
var strategy_detail_json = '';
var strategy_detail = '';
var apiBaseurl = "<?=site_url("wp-json/api")?>";
var wpNonce = "<?=wp_create_nonce( 'wp_rest' )?>";

$('#checkAll').change(function () {
    $('input:checkbox').filter(function () {
        return !this.disabled
    }).prop('checked', this.checked);
});

$(".open_popup").on("click", function(){
    $($(this).data("popup")).fadeIn();
    $($(this).data("popup") + '.overlay').css('display', 'flex');
});

$(".close_popup").on("click", function(){
    $($(this).data("popup")).fadeOut();
});

/*$( function() {
    $( ".date_box" ).datepicker();
  } );*/
$(document).ready(function() {

    $.ajax({
        url: `${apiBaseurl}/get-alert-count`,
        data : {
                'calc_type' : 'VCA'
            },
        type : 'POST',
        dataType : "json",
        beforeSend : xhr => {
            xhr.setRequestHeader('X-WP-Nonce', wpNonce);
        },
        success: (data) => {
                
            if(data['status'] == "200") {

                if(data['recordsTotal'] > 0) {
                    $("#alert_notify_cnt").html('<span class="alert_unseen_cnt" id="alert_unseen_cnt">'+data['recordsTotal']+'</span>');
                } else {
                    $("#alert_notify_cnt").html('');
                }

            }                 
        }
    });

   
    $(".input_num_validate").keypress(function(e) {
        var keyCode = e.which;
        var keyVal = String.fromCharCode(keyCode);
        var inputVal = this.value;
        var condition = '';
        console.log("keyCode == "+keyCode);
        console.log("keyVal == "+keyVal);
    
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

    
    $("#strategy_tbl").on("keypress", ".input_num_validate", function(e) {
        
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
});


/* save strategy start */
$(document).on("click", "#btn_save_strategy", e => {
    var strategy_name = $.trim($("#txtStrategyName").val());
    var strategy_json = '';
    var stock_ticker = $("#stock_name").val();
    var week_high = $("#week_high").val();
    var your_investment = $("#your_invest").val();

    if(strategy_name == "") {
       $('#txtStrategyName').addClass("error");
    } else {
        $('#txtStrategyName').removeClass("error");      

        var temp_strategy = {
            "club_type": "YCC",
            "calc_type": "VCA", 
            "strategy_name": strategy_name, 
            "stock_name": stock_ticker, 
            "currency": $("#currency").val(), 
            "stock_price": $("#stock_price").text(), 
            "52_week_high": (week_high), 
            "your_investment": your_investment, 
            "total_gain_loss": ($("#total_gain").text()).slice(1), 
            "total_gain_loss_percentage": ($("#vca_result").text()).replace("%", ""), 
            "total_investment": $("#tot_invseted").text().slice(1), 
            "total_share_buy": $("#tot_amt_share").text(), 
            "average_share_price": ($("#avg_all_share_price").text()).slice(1), 
            "share_price_difference": ($("#diff_price").text()).slice(1)
        };
                       
        $("#strategy_tbl .date_box").each(function (index, value) {   
            cnt_val = index + 1;

            strategy_detail[index]['purchase_date'] = $("#stock_buy_date"+cnt_val).val();
            strategy_detail[index]['investment_amount'] = $("#invested_cost_"+cnt_val).val();
            strategy_detail[index]['real_amount'] = $("#invested_cost_"+cnt_val).val();
            strategy_detail[index]['entry_price'] = $("#entry_cost_"+cnt_val).val();
            strategy_detail[index]['no_of_shares_to_buy'] = $("#no_share_val_"+cnt_val).html();
            strategy_detail[index]['additional_cost'] = $("#cost_"+cnt_val).val(); 

            var set_alert = 0;
            if (strategy_detail[index]['purchase_date'] != '' && strategy_detail[index]['no_of_shares_to_buy'] > 0) {
                set_alert = 2;
            } 
            if ($('#chkSetAlert_'+cnt_val).is(":checked")) {
                set_alert = 1;
            }
            strategy_detail[index]['alert_flag'] = set_alert;
        });

        var total_share_buy = $("#final_total_share").val();
        var avg_price = $("#final_avg_price").val();

        var profit_detail = calculate_profit(avg_price, total_share_buy);

        $.ajax({
            url: `${apiBaseurl}/save-vca`,
            data : {
                'strategy_json' : JSON.stringify(temp_strategy),
                'strategy_detail_json' : JSON.stringify(strategy_detail),
                'profit_detail_json' : JSON.stringify(profit_detail)
            },
            type : 'POST',
            dataType : "json",
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', wpNonce);
            },
            success: (data) => {
                
                if(data['status'] == "200"){
                   console.log("I m in success.....");
                   strategy_detail_json = '';
                    strategy_detail = '';

                    $("#save_popup .content").html("<h1>Congratulations!</h1><p>You have successfully saved your strategy.</p>");
                    
                    setTimeout(function() { 
                        $("#save_popup").fadeOut();
                        location.reload(); 
                    }, 1000); 
                } 
                if(data['status'] == "300"){
                   console.log("I m in error.....");
                   $('#save_strategy_error').css('display','block');
                }                 
            }
        });  
    }
});


 jQuery(document).ready(function ($) {

    let apiBaseurl = "<?=site_url("wp-json/api")?>";
    /*let currencySymbol = {"USD":'$', "GBP":'&#163;', "EUR":'€'};*/
    let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;', "AUD":'A&#36;'};
    let firstEntryLevel = {1:100, 2:44.44, 3:26.23, 4:17.334, 5:12.185, 6:8.882, 7:6.635, 8:5.04, 9:3.876};

     $.ajaxSetup({ cache: false });
    $('#home input').tooltip({
      position: {
        my: "center bottom-20",
        at: "center top",
        using: function( position, feedback ) {
          $( this ).css( position );
          $( "<div>" )
            .addClass( "arrow" )
            .addClass( feedback.vertical )
            .addClass( feedback.horizontal )
            .appendTo( this );
        }
      }
    });

    $("#div_sel_entry").prop("title", "Select Your Total Number Of Entries");

    $('#div_sel_entry').tooltip({
        position: {
            my: "center bottom-20",
            at: "center top",
            using: function( position, feedback ) {
                $( this ).css( position );
                $( "<div>" )
                .addClass( "arrow" )
                .addClass( feedback.vertical )
                .addClass( feedback.horizontal )
                .appendTo( this );
            }
        }
    });

    var ticker = $("#stock_ticker").val();
    getTickerDeatils(ticker);
    $('#currency').on('change', function() {
        getTickerDeatils($("#stock_ticker").val(), false); 
    });

    $('#div_sel_entry').on('click', '.select-dropdown__list-item', function() {
        $( '#calculate_btn' ).click(); 
    });

    function getTickerDeatils(val, tvw=true, label=''){

        console.log(val);
        $.ajax({
            url: `${apiBaseurl}/vca`,
            data: {
                'symbol' : val,
                'label' : label,
                'currency' : ($("#currency").val()),
                'action':'ticker_all_details',
            },
            dataType : "json",
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', wpNonce);
                $("#calculate_btn").html('Fetching Data...');
            },
            success: (data) => {
//console.log(JSON.stringify(data, null, 3));
                if( data['status'] == "200" ){
                    if( data['price'] && data['last_high'] ){
                        $("#open_prize").val(data['open']);
                        $("#ticker_high").val(data['high']);
                        $("#current_hight").val(data['last_high']);
                        $("#stock_price").empty().text(data['price']);
                        $("#stock_diff").empty().text(data['change24hour']+"("+data['changepct24hour']+")");
                        $("#calculate_btn").click();
                        $(".currSymbol").html( currencySymbol[$("#currency").val()] );
                        $("#calculate_btn").html('Calculate');

                        if(data['change24hour'] < 0){
                            $('#stock_diff_h').css('color','#ff0000');
                        }
                        else{
                            $('#stock_diff_h').css('color','#67c275');
                        }

                        if(tvw){
                        if(label == "GOLD - Barrick Gold Corp.") {
                            val = "NYSE:GOLD";
                        }
                        if(label == "XAU - Gold Commodity") {
                            val = "XAU"+$("#currency").val();
                        } 
                        if(label == "XAG - Silver Commodity") {
                            val = "XAG"+$("#currency").val();
                        } 
                        if(label == "USOIL - WTI Crude Oil") {
                            val = "USOIL";
                        }
                        if(label == "UKOIL - Brent Crude Oil") {
                            val = "UKOIL";
                        }    
                        
                            new TradingView.widget({
                                "width": "100%",
                                "height": 550,
                                "symbol": val,
                                "interval": "D",
                                "timezone": "Europe/London",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "hide_side_toolbar": false,
                                "container_id": "tradingview_c9767",
                                "save_image": false,
                            });
                        }
                    }else{
                        $(".x-error").html('No data available, please try a different one.');
                        $("#calculate_btn").html('Calculate');
                        setTimeout(function() { 
                            $(".x-error").html(''); 
                            $("#stock_ticker").val($("#stock_name").val());
                        }, 2000);
                    }
                }
            }
        });
  
    }

    $( "#stock_ticker" ).autocomplete({
        source: '/wp-json/api/vca/?action=get_ticker&t='+jQuery.now(),
        minLength: 2,
        response: function (event, ui) {
            if (ui.content.length === 0) {
                $('#stock_div').css('border', 'solid 1px red');
            } else {
                $('#stock_div').css('border', 'solid 1px #e1e1e1');
            }
        }
    }).focus(function() {
        $(this).autocomplete('search', $(this).val());
        console.log("in search stock result....");
    });

    $( "#stock_filter" ).autocomplete({
        source: '/wp-json/api/vca/?action=get_ticker&t='+jQuery.now(),
        minLength: 2
    }).focus(function() {
        $(this).autocomplete('search', $(this).val())
    });


    $("#stock_ticker").keypress(function(e) {
        if(e.which == 13) {
            console.log('hello');
            $('#stock_ticker').trigger("focus");
        }
    });

    $('#stock_ticker').on('autocompleteselect', function (e, ui) {
        var stock = ui.item.label;
        var myArray = stock.split(" - ");
//console.log(JSON.stringify(ui, null, 3));
        // $("#stock_ticker").val(myArray[0]);
        getTickerDeatils(myArray[0], true, stock);
        // setTIckerval(myArray[0]);        
    });


    /*Below Function used to Update Date in Span tag of startergy section end*/
    
    $( "#calculate_btn" ).click(function() {

        var stock           = $("#stock_ticker").val();
        var currency        = $("#currency").val();
        var investment_tot  = $("#investment").val();
        var current_hight   = $("#current_hight").val();
        var open            = $("#open_prize").val();
        var high            = $("#current_hight").val(); 
        var stock_current_price = $("#stock_price").text();
        var sel_entry_level = $("#sel_entry_level").val(); 

        $("#checkAll").removeAttr('checked');
//console.log("sel_entry_level === "+sel_entry_level);
        var has_error = 0;

        if($.trim(stock) == '') {
            has_error = 1;
            $('#stock_div').css('border', 'solid 1px red');
        } else {
            has_error = 0;
            $('#stock_div').css('border', 'solid 1px #e1e1e1');
        }

        if($.trim(current_hight) != '') {
            has_error = 0;
            $('#high_div').css('border', 'solid 1px #e1e1e1');           
        } else {            
            has_error = 1;
            $('#high_div').css('border', 'solid 1px red');
        }

        if($.trim(investment_tot) == '' || investment_tot <= 0) {
            has_error = 1;
             $('#invest_div').css('border', 'solid 1px red');
        } else {
            has_error = 0;
            $('#invest_div').css('border', 'solid 1px #e1e1e1');
        }

        $(".currSymbol").html(currencySymbol[currency]);
        
        var stratergy_table_values = '';
        var share_amt_diffreace = 0;
        var cnt                 = 1;
        var table_values        = '';
        strategy_detail = [];

        if(stock !="" && currency!="" && investment !="" && current_hight !=""){
            var entery_level_arr        = new Array();
            var per_tot_amt             = firstEntryLevel[sel_entry_level];
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
            var entry_limit_val         = 20;

            for(var z=1; z <= sel_entry_level; z++) {
                entery_level_arr.push(entry_limit_val);
                entry_limit_val = entry_limit_val + 10;
            }

//console.log("per_tot_amt === "+per_tot_amt);
            $("#stock_name").val(stock);
            $("#currency_input").val(currency);
            $("#current_price").val(stock_current_price);
            $("#week_high").val(current_hight);
            $("#your_invest").val(investment_tot);

            // below we set date obj
            dt = new Date(); 
            //loop of enetry level 
            $.each(entery_level_arr, function (index, value) {
                //  alert(value);

                var entery_price_val = ((current_hight * value) / 100);         
                var entery_price =current_hight-entery_price_val;   
                   
                 prev_per_tot_amt = (prev_per_tot_amt==0) ? per_tot_amt : prev_per_tot_amt*1.25;
                 prev_per_tot_amt = prev_per_tot_amt.toFixed(2);
                // alert(prev_per_tot_amt);
                //var investment =  Math.round(prev_per_tot_amt * 10);            
                var investment =   Math.round(investment_tot * prev_per_tot_amt  / 100);
                var strategy_investment =   investment_tot * prev_per_tot_amt  / 100;
                //investment = Math.round(investment /100);
                 tot_used_investment_per = tot_used_investment_per + prev_per_tot_amt;
                 
                    /*No of Share Buy start */
                    var updated_investment  = investment +  balance_amt;
                    tot_used_investment     = tot_used_investment + investment;
                    
                        if(current_hight == 0){
                            tr_class= '';
                            no_of_share_buy =0;
                            avg_price_show  =0;
                            sell_after_15 =0;
                            sell_after_20 =0;
                        }
                        else{
                            if(entery_price <= updated_investment){
                                if(tot_no_of_share_buy ==0){
                                    no_of_share_buy = Math.floor(updated_investment / entery_price);
                                    tot_no_of_share_buy = tot_no_of_share_buy + no_of_share_buy;
                                }else{
                                    var buy_share_string =  updated_investment / entery_price;                            
                                    no_of_share_buy = parseInt(buy_share_string);
                                    tot_no_of_share_buy = tot_no_of_share_buy + no_of_share_buy;
                                }

                                if(no_of_share_buy >0){
                                    used_amt = (no_of_share_buy * entery_price) - updated_investment;
                                    balance_amt =  Math.abs(updated_investment -(entery_price *  no_of_share_buy));
                                }
                            }else{
                                no_of_share_buy = 0;
                                balance_amt = balance_amt + investment;
                            }
                            
                            /*No of Share Buy End */
                            if(avg_share_price == 0){
                                avg_price_show  = avg_price = entery_price * no_of_share_buy;
                                avg_share_price = avg_share_price + avg_price;
                                if(tot_no_of_share_buy >0)
                                avg_price_show  = avg_price_show   / tot_no_of_share_buy;
                                else
                                    avg_price_show  =0;
                            }else{
                                avg_price       = entery_price * Math.floor(no_of_share_buy);
                                avg_share_price = avg_share_price + avg_price;
                                avg_price_show  = avg_share_price / tot_no_of_share_buy;
                            }
                            avg_price_show  = parseFloat(avg_price_show).toFixed(2);
                            sell_after_15 = avg_price_show*1.15;
                            sell_after_20 = avg_price_show*1.20;

                            
                            sell_after_15  = parseFloat(sell_after_15).toFixed(2);
                            sell_after_20  = parseFloat(sell_after_20).toFixed(2);

                            // alert(investment);
                            var tr_class="red-box";
                            var cmp_entery_price = entery_price.toFixed(2);
                            if(parseInt(cmp_entery_price) > parseInt(stock_current_price)){
                                tr_class="green-box";
                            }
                        }


                
                    table_values  +=' <tr class="yellow-box"><td id="entery_tbl_level'+cnt+'">-'+value+'%</td><td class="'+tr_class+'">'+currencySymbol[currency]+entery_price.toFixed(2)+'</td><td id="entery_tbl_invest'+cnt+'">'+currencySymbol[currency]+investment+'</td><td>'+prev_per_tot_amt+'%</td><td id="entery_tbl_no_shares'+cnt+'">'+no_of_share_buy+'</td><td>'+tot_no_of_share_buy+'</td><td>'+currencySymbol[currency]+avg_price_show+'</td><td>'+currencySymbol[currency]+sell_after_15+'</td><td>'+currencySymbol[currency]+sell_after_20+'</td></tr>';
                    
                    //str_invested_money = entery_price * no_of_share_buy;
                    str_invested_money = strategy_investment;
                    
                    sum_reaml_amt = sum_reaml_amt + str_invested_money;

                    let d = new Date();
                    d.setMonth(d.getMonth() + cnt, 1);
                    future = d.toLocaleDateString('en-GB');
                    future = future.replaceAll('/', '-');
                    future_split = future.split('-');
                    future_date = future_split[2]+'-'+future_split[1]+'-'+future_split[0];
                    tot_cost_val = tot_cost_val + str_invested_money;
                    
                    var set_alert = 0;
                    if ($('#chkSetAlert_'+cnt).is(":checked")) {
                        set_alert = 1;
                    }
                    var temp_array = '';
                    var temp_array = {
                            "entry_level": value, 
                            "purchase_date": $("#stock_buy_date"+cnt).val(), 
                            "investment_amount": $("#invested_cost_"+cnt).val(), 
                            "real_amount": $("#real_cost_"+cnt).val(), 
                            "entry_price": $("#entry_cost_"+cnt).val(), 
                            "no_of_shares_to_buy": $("#no_share_val_"+cnt).val(), 
                            "additional_cost": $("#cost_"+cnt).val(), 
                            "alert_flag": set_alert 
                        };
                    strategy_detail.push(temp_array);                    

                    stratergy_table_values += '<tr><td> <input type="date" class="date_box purchase_date" name="stock_buy_date'+cnt+'" id="stock_buy_date'+cnt+'" value="" onchange="setdatetospan(this.id, '+cnt+'); cost('+cnt+');" required><span class="d-none" style="display:none;" id="span_stock_buy_date'+cnt+'"> </span></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control invested_val input_num_validate" name="invested_cost_'+cnt+'" id="invested_cost_'+cnt+'" value="'+str_invested_money.toFixed(2)+'" onkeyup="cost('+cnt+')"></td><td><span class="balance_val" name="balance_cost_'+cnt+'" id="balance_cost_'+cnt+'" >'+currencySymbol[currency]+'0.00</span></td><td><span class="real_val" name="real_cost_'+cnt+'" id="real_cost_'+cnt+'" >'+currencySymbol[currency]+'0.00</span></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control entry_val input_num_validate" name="entry_cost_'+cnt+'" id="entry_cost_'+cnt+'" value="'+entery_price.toFixed(2)+'" onkeyup="cost('+cnt+')"></td><td><span class="no_share_val" id="no_share_val_'+cnt+'"></span></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control investment_val input_num_validate" name="cost_'+cnt+'" id="cost_'+cnt+'" value="0" onkeyup="cost('+cnt+')"><input type="hidden" name="no_of_share_buy_'+cnt+'" id="no_of_share_buy_'+cnt+'" value="'+no_of_share_buy+'" /><span id="span_cost_'+cnt+'" class="d-none"  style="display:none;" ></span></td><td><input type="checkbox" name="chkSetAlert_'+cnt+'" id="chkSetAlert_'+cnt+'" class="alert_chk" value="1"/></td></tr>';
                
                    cnt++;                    

            });            

           var inve_per = tot_used_investment / investment_tot * 100;
            table_values +=' <tr style="background-color: #f3f3f3; font-size: 20px; "><td  style=" border-color:none; border-width:0 !important;"></td><td class="total">Total</td><td class="total">'+tot_used_investment+'</td><td class="total">'+Math.round(inve_per)+'%</td><td class="total">'+tot_no_of_share_buy+'</td></tr>';
            stratergy_table_values +='<tr class="yellow-box"><td colspan="5"></td><td class="total">Total Cost</td><td class="total"><span id="total_cost">'+currencySymbol[currency]+'0.00</span></td></tr>';
            $("#entery_table").empty().append(table_values);
            $("#stratergy_table_values").empty().append(stratergy_table_values); 

            total_cost = 0;
            /*Below values commented for new changes in STRATEGY section */
            tot_used_investment =  tot_cost_val; // we can remove this line if calculation changes 
            // avg_all_share_price =  Math.round(sum_reaml_amt / tot_no_of_share_buy);
            

            avg_all_share_price =  (tot_cost_val / tot_no_of_share_buy).toFixed(2);
            var current_high1 = $("#stock_price").text();
            share_amt_diffreace = current_high1 - avg_all_share_price;
            
            total_gain = (tot_no_of_share_buy * share_amt_diffreace).toFixed(2);
            vca_result = (total_gain / (tot_used_investment + total_cost)) * 100; 
            vca_result = vca_result.toFixed(2);

            var amt_diffreace = high - open;

            /*if(total_gain > 0){
                var gain_str = total_gain;
                $("#total_gain").empty().html(currencySymbol[currency]+gain_str).css('color','#67c275');
            }else{
                var gain_str = 0; 
                $("#total_gain").empty().html(currencySymbol[currency]+gain_str).css('color','red');
            }
           
            // $("#stock_diff").empty().text(amt_diffreace+"("+result+")");
            $("#tot_invseted").empty().html(currencySymbol[currency]+tot_used_investment.toFixed(2));
            $("#tot_invseted_input").val(currencySymbol[currency]+tot_used_investment);
            $("#tot_amt_share").empty().text(tot_no_of_share_buy);
            $("#avg_all_share_price").empty().html(currencySymbol[currency]+avg_all_share_price); 
            $("#diff_price").empty().html(currencySymbol[currency]+share_amt_diffreace.toFixed(2));
            
            $("#vca_result").empty().text(vca_result+"%");*/

            var gain_str = 0.00;
            $("#total_gain").empty().html(currencySymbol[currency]+gain_str).css('color','#67c275');
            /*RAM ADDED IT ON 20NOV23*/
            $(".reult-stratergy i").attr('class', 'fa fa-arrow-up');
            $(".reult-stratergy i").css('color','#67c275');
             /*RAM ADDED IT ON 20NOV23*/
            $("#tot_invseted").empty().html(currencySymbol[currency]+"0.00");
            $("#tot_invseted_input").val(currencySymbol[currency]+"0.00");
            $("#tot_amt_share").empty().text("0.00");
            $("#avg_all_share_price").empty().html(currencySymbol[currency]+"0.00"); 
            $("#diff_price").empty().html(currencySymbol[currency]+"0.00");
            
            $("#vca_result").empty().text("0.00%");

            $("#home").click();
        }
    });
}); 
   
function downloadExcel(){
    /* */
    
    var stock       = $("#stock_ticker").val();
    var currency    = $("#currency").val();
    var investment  = $("#investment").val();
    var current_hight = $("#current_hight").val();
    var first_table   = $("#entery_table").html();            
    var second_table  = $("#stratergy_table_values").html();

    var result_val = $("#vca_result").text();
    var total_gain_loss_val = $("#total_gain").html();
    var total_invested_val  = $("#tot_invseted").text();
    var total_amt_share_val = $("#tot_amt_share").text();
    var avg_price_val = $("#avg_all_share_price").text();
    var differance_in_price_val  = $("#diff_price").text(); 

    var entery_tbl_level1       = $("#entery_tbl_level1").text();
    var entery_tbl_no_shares1   = $("#entery_tbl_no_shares1").text();
    var entery_tbl_invest1      = $("#entery_tbl_invest1").text();

    $("#symbol_excel").val(stock);
    $("#currency_excel").val(currency);
    $("#investment_excel").val(investment);
    $("#current_hight_excel").val(current_hight);
    $("#section1").val(first_table);
    $("#section2").val(second_table);

    $("#excel_entery_tbl_level1").val(entery_tbl_level1);
    $("#excel_entery_tbl_no_shares1").val(entery_tbl_no_shares1);
    $("#excel_entery_tbl_invest1").val(entery_tbl_invest1);
   
    $("#result_val").val(result_val);
    $("#total_gain_loss_val").val(total_gain_loss_val);
    $("#total_invested_val").val(total_invested_val);
    $("#total_amt_share_val").val(total_amt_share_val);
    $("#avg_price_val").val(avg_price_val);
    $("#differance_in_price_val").val(differance_in_price_val);        

    $("#pdf_gen").submit();
    
}


/*Below function used to update startergy section result*/
    function cost(cnt_id) {
        var currency       = $("#currency").val();
        let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;', "AUD":'A&#36;'};
        var sum_total_invested = 0;
        var sum_total_invested_only = 0;        
        var new_total_inveted = 0;
        var new_total_entry = 0;
        var total_share_buy = 0;
        var total_share_buy_frac = 0;
        var total_real_cost = 0;
        var total_cost = 0;
        var shares_to_buy = 0;
        var balance_amount = 0;
        var investment_inc_balance_amt = 0;
        var real_cost = 0;

        var new_added_stock_buy_date = $("#stock_buy_date"+cnt_id).val();
        var new_added_entry_cost = $("#entry_cost_"+cnt_id).val();
        
        $("#stratergy_table_values .purchase_date").each(function (index, value) {   
            cnt_val = index + 1;
            shares_to_buy = 0;
            investment_inc_balance_amt = 0;

            if(cnt_val < cnt_id) {

                if($("#stock_buy_date"+cnt_val).val() == "") {

                    $("#stock_buy_date"+cnt_val).val(new_added_stock_buy_date);
                    $("#entry_cost_"+cnt_val).val(new_added_entry_cost);
                }
            }

            if($("#stock_buy_date"+cnt_val).val() != '' && $("#invested_cost_"+cnt_val).val() > 0 && $("#entry_cost_"+cnt_val).val() > 0 ) {
                sum_total_invested = +(sum_total_invested) + +($("#invested_cost_"+cnt_val).val());
                sum_total_invested_only = sum_total_invested;

                investment_inc_balance_amt = +($("#invested_cost_"+cnt_val).val()) + +(balance_amount);

                total_cost = +(total_cost) + +($("#cost_"+cnt_val).val());                

                shares_to_buy = Math.floor(investment_inc_balance_amt / $("#entry_cost_"+cnt_val).val());

                new_total_entry = +(new_total_entry) + +($("#entry_cost_"+cnt_val).val() * shares_to_buy);

                total_share_buy_frac = +(total_share_buy_frac) + +($("#invested_cost_"+cnt_val).val() / $("#entry_cost_"+cnt_val).val()).toFixed(2);

                balance_amount = investment_inc_balance_amt - ($("#entry_cost_"+cnt_val).val() * shares_to_buy);

                real_cost = investment_inc_balance_amt;
                total_share_buy = total_share_buy + shares_to_buy;
                $("#real_cost_"+cnt_val).empty().html(currencySymbol[currency]+real_cost.toFixed(2));
                $("#no_share_val_"+cnt_val).empty().html(shares_to_buy);
                $("#balance_cost_"+cnt_val).empty().html(currencySymbol[currency]+balance_amount.toFixed(2));
                enable_checkbox(index);
            } else {
                $("#real_cost_"+cnt_val).empty().html('');
                $("#no_share_val_"+cnt_val).empty().html('');
            }
            
        });
        
        sum_total_invested = (+sum_total_invested) + (+total_cost);

        if(sum_total_invested > 0 && total_share_buy > 0) {
            $("#total_cost").empty().html(currencySymbol[currency]+total_cost.toFixed(2));
            total_invseted = $("#tot_invseted_input").val();
            /*RAM MODIFIED ON 21NOV23*///new_total_entry ;
            var new_total_inveted =new_total_entry;// sum_total_invested;
            
            $("#tot_invseted").empty().html(currencySymbol[currency]+new_total_inveted.toFixed(2));

            var new_tot_amt_share = total_share_buy;        
            var total_share = total_share_buy;        
            var avg_price = new_total_inveted /total_share;  
            //var avg_price = new_total_inveted / total_share_buy_frac      
            //var current_high   = $("#current_hight").val();
            var current_high = $("#stock_price").text();
            //console.log("current_high === "+current_high);
            var diff_price = current_high - avg_price;        
            //var new_total_gainLoss = total_share * diff_price;  
            var new_total_gainLoss = parseFloat(total_share * diff_price);       
            var new_result = (new_total_gainLoss / new_total_inveted) * 100;  
        } else {
            $("#total_cost").empty().html(currencySymbol[currency]+"0");
             
              /*RAM MODIFIED ON 21NOV23*///new_total_entry ;
            var new_total_inveted =new_total_entry;// sum_total_invested;
            $("#tot_invseted").empty().html(currencySymbol[currency]+new_total_inveted);

            var new_tot_amt_share = total_share_buy;        
            var total_share = total_share_buy;        
            var avg_price = 0;
            var diff_price = 0;        
            var new_total_gainLoss = 0;        
            var new_result = 0;  
        }        
        //alert(new_total_gainLoss);
        if(new_total_gainLoss >= 0){
            $("#total_gain").empty().html(currencySymbol[currency]+new_total_gainLoss.toFixed(2)).css('color','#67c275');
            $(".reult-stratergy i").attr('class', 'fa fa-arrow-up');
            $(".reult-stratergy i").css('color','#67c275');
        }else{
            $("#total_gain").empty().html(currencySymbol[currency]+new_total_gainLoss.toFixed(2)).css('color','red');
            $(".reult-stratergy i").attr('class', 'fa fa-arrow-down');
            $(".reult-stratergy i").css('color','red');
        }

        if(avg_price < 1) {
            $("#avg_all_share_price").empty().html(currencySymbol[currency]+avg_price.toFixed(6));
            $("#final_avg_price").empty().val(avg_price.toFixed(6));
        } else {
            $("#avg_all_share_price").empty().html(currencySymbol[currency]+avg_price.toFixed(2));
            $("#final_avg_price").empty().val(avg_price.toFixed(2));
        }

        $("#tot_invseted").html(currencySymbol[currency]+new_total_inveted.toFixed(2));
        
        $("#diff_price").empty().html(currencySymbol[currency]+diff_price.toFixed(2));
        $("#tot_amt_share").empty().html(total_share_buy.toFixed(2));
        $("#vca_result").empty().text(new_result.toFixed(2)+"%");

        $("#final_total_share").empty().val(total_share_buy);

    }
    /*Above function used to update startergy section result*/

/*Below Function used to Update Date in Span tag of startergy section start*/
function setdatetospan(divid, cnt){
    $(".date_box").each(function (index, value) {                
        $("#span_"+this.id).text(this.value);
        enable_checkbox(index);
    }); 
}

function enable_checkbox(index_val) {
    var cnt_val = index_val + 1;

    var date_s = $.trim($("#stock_buy_date"+cnt_val).val());
    var invested_cost_val = $.trim($("#invested_cost_"+cnt_val).val());
    var cost_val = $.trim($("#cost_"+cnt_val).val());

    if(date_s != '' && invested_cost_val > 0 && (cost_val >=0 || cost_val == '')) {  
        $("#chkSetAlert_"+cnt_val).removeAttr('checked');
        $("#chkSetAlert_"+cnt_val).attr('disabled','disabled');
    } else {
        $("#chkSetAlert_"+cnt_val).removeAttr('disabled');
    }
}

function openContent(evt, contentName) {
  $('#home').css('display','none');
  $('#vca-strategy').css('display','none');

  $('.tablinks').removeClass('active');
  $('.tablinks').removeClass('active');

  $('#'+contentName).css('display','block');
  evt.currentTarget.className += " active";   
}

function saveStrategyAlert(url) {

    var is_data_added = 0;
    
    $("#strategy_tbl .date_box").each(function (index, value) {   
        cnt_val = index + 1;

        if($("#stock_buy_date"+cnt_val).val() != "" ){
            is_data_added = 1;
        }
        if($("#no_share_val_"+cnt_val).html() != "" ){
            is_data_added = 1;
        }
        if ($('#chkSetAlert_'+cnt_val).is(":checked")) {
            is_data_added = 1;
        }
            
    });

    if(is_data_added == 1) {
        $("#save_alert_redirect_url").val(url);

        $('#save_alert_popup').css('display', 'flex');
        $('#save_alert_popup').fadeIn();
    } else {
        window.location = url;
    }
}


$("#save_alert_popup").on("click", ".leave_yes", function() {        
    var url = $("#save_alert_redirect_url").val();
    window.location = url;
});


$("#save_alert_popup").on("click", ".leave_no", function() {
    $('#save_alert_popup').fadeOut(); 
    $('#save_popup').css('display', 'flex');
    $('#save_popup').fadeIn();    
});

function calculate_profit(avg_price, total_share_buy) {

    var avg_price           = avg_price;
    var total_tokens        = total_share_buy;
    var cnt                 = 1;

    var tot_take_profit_price   = 0;
    var tot_sale_sum            = 0;
    var tot_number_of_tokens    = 0;
    var tot_current_holdings    = 0;
    var current_holdings_prev   = 0;
    strategy_profit_detail      = [];

    var tot_planned_take_profit_price    = 0;

    if(avg_price > 0 && total_tokens > 0) {
            
        var profit_entry_level_arr      = new Array();
        /*var entry_limit_val             = 100;

        for(var z=1; z <= 11; z++) {
            profit_entry_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 100;
        }*/

        var entry_limit_val             = 15;

        for(var z=1; z <= 1; z++) {
            profit_entry_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 5;
        }

        //loop of entry level 
        $.each(profit_entry_level_arr, function (index, value) {

            var take_profit_price   = 0;
            var sale_sum            = 0;
            var number_of_tokens    = 0;
            var current_holdings    = 0;

            take_profit_price = avg_price * ( 1 + ( value / 100) );
            tot_take_profit_price = tot_take_profit_price + take_profit_price;

            if(cnt == 1) {
                /*sale_sum = total_tokens * take_profit_price * ( 20 / 100);*/
                sale_sum = total_tokens * take_profit_price;
                tot_sale_sum = tot_sale_sum + sale_sum;

                number_of_tokens = ( sale_sum / take_profit_price );
                tot_number_of_tokens = tot_number_of_tokens + number_of_tokens;

                current_holdings = total_tokens - tot_number_of_tokens;
                tot_current_holdings = tot_current_holdings + current_holdings;
                current_holdings_prev = current_holdings;
            } else {
                /*RAM MODIFIED 23NOV23*/
                 sale_sum = total_tokens * take_profit_price;
               /* sale_sum = current_holdings_prev * take_profit_price * ( 20 / 100);*/
                tot_sale_sum = tot_sale_sum + sale_sum;

                number_of_tokens = ( sale_sum / take_profit_price );
                tot_number_of_tokens = tot_number_of_tokens + number_of_tokens;

                current_holdings = total_tokens - tot_number_of_tokens;
                tot_current_holdings = tot_current_holdings + current_holdings;
                current_holdings_prev = current_holdings;
            }

            tot_planned_take_profit_price = tot_planned_take_profit_price + (take_profit_price * number_of_tokens);

            var temp_profit_array = '';
            var temp_profit_array = {
                "sale_date": "", 
                "sale_sum": sale_sum.toFixed(2), 
                "profit_percent": value, 
                "your_fiat_sale_sum": 0, 
                "take_profit_price": take_profit_price.toFixed(6), 
                "your_take_profit_price": 0, 
                "number_of_tokens": number_of_tokens.toFixed(6), 
                "exchange_fees": 0,
                "trade_cost": 0, 
                "current_holdings": current_holdings.toFixed(6), 
                "alert_flag": 0 
            };

            strategy_profit_detail.push(temp_profit_array);
            cnt++;
                         
        });  

        tot_planned_take_profit_price = tot_planned_take_profit_price / tot_number_of_tokens; 
    } 

    if(avg_price == 0 && total_tokens == 0) {

        var profit_entry_level_arr      = new Array();
        /*var entry_limit_val             = 100;

        for(var z=1; z <= 11; z++) {
            profit_entry_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 100;
        }*/
        var entry_limit_val             = 15;

        for(var z=1; z <= 1; z++) {
            profit_entry_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 5;
        }

        //loop of entry level 
        $.each(profit_entry_level_arr, function (index, value) {
            var temp_profit_array = '';
            var temp_profit_array = {
                "sale_date": "", 
                "sale_sum": 0, 
                "profit_percent": value, 
                "your_fiat_sale_sum": 0, 
                "take_profit_price": 0, 
                "your_take_profit_price": 0, 
                "number_of_tokens": 0, 
                "exchange_fees": 0,
                "trade_cost": 0, 
                "current_holdings": 0, 
                "alert_flag": 0 
            };

            strategy_profit_detail.push(temp_profit_array);
        });
    } 

    return strategy_profit_detail;
}

</script>    
<?php
get_footer();