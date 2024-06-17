<?php
/*
 * Template name: Small Cap Template
 *
 */

get_header();

$club = get_club_slug();
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/vca.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<div class="container vca-cca-calculator" id="allData">
    <div class="row">
        <div class="tab_mobile_scroll"> 
        <div class="entry-header tab">
            <a class="tablinks active" onclick="openContent(event, 'home')"><?php the_title(); ?></a>
            <a class="tablinks" onclick="openContent(event, 'small-cap-strategy')">Strategy</a>
            <a class="tablinks" onclick="saveStrategyAlert('/small-cap-my-strategy')">My Strategies</a>
            <a class="tablinks" onclick="saveStrategyAlert('/small-cap-my-alerts')">My Alerts <span id="alert_notify_cnt"></span></a>
			

        </div>
	
    </div>
			<?php echo do_shortcode( '[elementor-template id="18672"]' ); ?>
        <p class="x-error"></p>
		
		
    </div>

    <!-- Tab panes -->
    <div class="tab-content" id="fullpage">

        <div id="home" class="tab-pane active">
            <div class="row" id="test">
                <div class="col-lg-4  col-sm-12">
                    <div class="percent1" id="stock_div">
                        <h4 style="">Crypto</h4>
                        <input type="text" class="btn-primary percent1_input" name="stock" id="stock_ticker"  value="AVAX" title="Symbol Search..." >
                    </div>

                    <div class="percent1" id="currency_div">
                        <h4 style="">Currency</h4>
                        <select class="form-select form-select-lg form-control" name="currency" id="currency">
                            <option value="USD" selected>USD</option>
                            <option value="GBP">GBP</option>
                            <option value="EUR">EUR</option>
                            <option class="currency-btc" value="BTC">BTC</option>
                        </select>
                    </div>
                    <input type="hidden" name="open_prize" id="open_prize"> 
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="blue-box">
                        <h4>Live Crypto Price</h4>
                        <h3><span class="currSymbol">$</span><span id="stock_price"></span></h3>
                        <h6 id="stock_diff_h" style="color:#67c275;">
                            <span class="currSymbol">$</span>
                            <span id="stock_diff"> <i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                        </h6>
                    </div>                                        
                </div>

                <div class="col-lg-4 col-sm-12">
                    <div class="percent1" id="high_div">
                        <h4 style=""> Current High</h4>
                        <input type="number" class="btn-primary percent1_input input_num_validate" name="current_hight" id="current_hight"  value="150" title="Last 3 Months High">
                    </div>

                    <div class="percent1" id="invest_div">
                        <h4 style="">Total Investment</h4>
                        <input type="number" class="btn-primary percent1_input input_num_validate" name="investment" id="investment" value="400" title="Your Total Investment Amount">
                    </div>
                    <input type="hidden" name="ticker_high" id="ticker_high">   
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="col-lg-4 col-sm-12">
                        <div id="div_sel_entry" class="calculate">
                            <div>&nbsp;
                                <!-- <i class="fa fa-angle-down entry_lvl_dropdown"></i>  -->
                            </div>
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
                                    <th>% of The Total Investment</th>
                                    <th>Number of Tokens You Buy</th>
                                    <th>Total Number of Tokens You Hold</th>
                                    <th>Average Price / Token</th>
                                </tr>
                            </thead>
                            <tbody id="entery_table">                            
                                                      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                        
            <div class="row" id="TVChart">
                <div class="col-lg-12 col-sm-12 row-0-padding">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_c9767"></div>
                        <div class="tradingview-widget-copyright">&nbsp;</div>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
                        
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <button type="button" onclick="window.print()" class="btn-dark">Print this page</button>
                    <button type="button" onclick="downloadExcel()" class="btn-dark">Download Excel</button>
                </div>
            </div>

        </div> 

 

        <div style="display:none" id="small-cap-strategy"> 
            
                <div class="col-lg-12 col-sm-12 row-0-padding">
                    <div class="table-responsive-lg cca_strategy_table" id="strategy_table">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr class="vca_table_head">
                                    <th>Date</th>
                                    <th>Your Entry Price</th>
                                    <th>Invested Money</th>
                                    <th>Number of Tokens</th>
                                    <th>Total # token</th>
                                    <th>Average Price / Token</th>
                                    <th>Trade Cost</th> 
                                    <th>Alert <input type="checkbox" name="checkAll" id="checkAll"></th>           
                                </tr>
                            </thead>
                            <tbody id="stratergy_table_values">
                                        
                            </tbody> 
                        </table>

                    </div>
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
                                <h2 style="color:#67c275;"> <span id="total_gain"><span class="currSymbol">$</span>0.00</span></h2>
                                <h3>Total Gain/Loss </h3>
                            </div>                              
                                                             
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12"></div>
                </div>
               
                <div class="col-lg-12 col-sm-12">
                    
                        <div class="div-strategy-details" style="padding-left: 0px !important;">
                            <div class="price">
                                <h1>Total<br> Invested</h1>
                                <h2><span id="tot_invseted"></span></h2>
                            </div>              
                        </div>                              
                        <div class="div-strategy-details">
                            <div class="price" >
                                <h1>Total Amount<br> of Tokens</h1>
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
                </div>
            
            
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <a class="save_link open_popup" data-popup="#save_popup"><button type="button" class="btn-light">Save Strategy</button></a>
                    <button type="button" onclick="window.print()" class="btn-dark">Print this page</button>
                    <button type="button" onclick="downloadExcel()" class="btn-dark">Download Excel</button>
                </div>
            </div>
        </div>

    </div>
    <div class="row" style="display: none;" >
        <form method="Post" id="pdf_gen" action="/small-cap-download-excel/" target="_blank">
        
            <input type="hidden" name="symbol" id="symbol_excel">
            <input type="hidden" name="currency" id="currency_excel">
            <input type="hidden" name="investment" id="investment_excel">
            <input type="hidden" name="current_hight" id="current_hight_excel">
            <input type="hidden" name="current_price_excel" id="current_price_excel">
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
#currency_div .select-dropdown {
  display: block;
}
#currency_div button {
  display: none;
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

.ui-tooltip-content {
    font-size: 15px;
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
#strategy_table tbody, td, tfoot, th, thead, tr {
    width: 100% !important;
}

.cca_strategy_table td, .cca_strategy_table th, .cca_strategy_table tr {
    min-width: 140px !important;
}

#first_table td, #first_table th, #first_table tr {
    min-width: 170px !important;
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

.invested_val, .investment_val, .entry_val {
    width: 80% !important;
    text-align: center;
}

.purchase_date {
    width: 90% !important;
    text-align: center;
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
    color: #ffffff;
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
.result-stratergy{
    width: 50%;
    float: left;
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

.btn-light {
    font-size: 20px !important;
    background-color: #55a9f5 !important;
    margin: 20px;
    font-family: 'Montserrat', sans-serif;
    padding: 8px 40px;
    text-transform: uppercase;
    border-radius: 4px;
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


.select-dropdown__list {
    width: 95% !important;
    margin: 0px 0px 0px 0px !important;
    -webkit-box-shadow: 0px 0px 0px !important; 
    box-shadow: 0px 0px 0px !important;
}
button.btn-calculate i{
    color: #b0b0b0;
    margin-right: 8px;
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
    margin-left: 6px;
    width: 80%;
}

.select-dropdown button, .select-dropdown__button {
    border-radius: 6px !important;
    padding: 8px 10px !important;
}

.alert_unseen_cnt {
    position: relative;
    top: -11px;
    right: 6px;
    padding: 4px 8px;
    border-radius: 50%;
    /*background-color: #a6b0ba;
    background-color: #55a9f5;*/
    background-color: #1F3C61;
    color: #fff;    
    font-size: 12px !important;
    font-weight: normal;
    vertical-align: middle;
}

@media (max-width: 960px){
        .my-stra-text, .my-stra-text1 {
            width: 100%;
            margin: 10px 0;
        }
        .tab a {
            font-size:13px;
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
        .entry-header  {
            width: 100%;
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
        .entry-header  {
            width: 100%;
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
        .tab a {
            font-size: 13px;
            padding: 14px 5px;
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
        #div_sel_entry {
            display: inline-block;
            vertical-align: middle;
            margin-bottom: 15px;
            float: initial;
        }
        
    }

</style>
<!---Jquery---->			
<script type="text/javascript">
var strategy_detail_json = '';
var strategy_detail = '';

var strategy_profit_detail_json = '';
var strategy_profit_detail = '';

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

function printThisPage() {

    $("#TVChart").css("padding-top", "320px");
    window.print();

    setTimeout(function() { 
        $("#TVChart").css("padding-top", "1px");
    }, 2000); 
    
}

$(document).ready(function() {

    $.ajax({
        url: `${apiBaseurl}/get-alert-count`,
        data : {
                'calc_type' : 'Small Cap'
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

    $("#strategy_table").on("keypress", ".input_num_validate", function(e) {
        
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
            "calc_type": "Small Cap", 
            "strategy_name": strategy_name, 
            "stock_name": stock_ticker, 
            "currency": $("#currency").val(), 
            "stock_price": ($("#stock_price").text()), 
            "52_week_high": (week_high), 
            "your_investment": your_investment, 
            "total_gain_loss": ($("#total_gain").text()).slice(1).replace("$", ""), 
            "total_gain_loss_percentage": ($("#vca_result").text()).replace("%", ""), 
            "total_investment": $("#tot_invseted").text().slice(1).replace("$", ""), 
            "total_share_buy": $("#tot_amt_share").text(), 
            "average_share_price": ($("#avg_all_share_price").text()).slice(1).replace("$", ""), 
            "share_price_difference": ($("#diff_price").text()).slice(1).replace("$", "")
        };
                       
        $("#strategy_table .date_box").each(function (index, value) {   
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
                    strategy_detail_json = '';
                    strategy_detail = '';

                    $("#save_popup .content").html("<h1>Congratulations!</h1><p>You have successfully saved your strategy.</p>");
                    
                    setTimeout(function() { 
                        $("#save_popup").fadeOut();
                        location.reload(); 
                    }, 1000); 
                } 
                if(data['status'] == "300"){
                   $('#save_strategy_error').css('display','block');
                }                 
            }
        });  
    }
});

jQuery(document).ready(function ($) {

    let apiBaseurl = "<?=site_url("wp-json/api")?>";
    let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&#8364;',"BTC":'₿'};
    let firstEntryLevel = {1:100, 2:44.44, 3:26.23, 4:17.3437, 5:12.185, 6:8.882, 7:6.6344, 8:5.04, 9:3.876};
    $(".currency-btc").hide();

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

    $("#div_sel_entry").prop("title", "Select your entry levels");

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


    $('#div_sel_entry').on('click', '.select-dropdown__list-item', function() {
        $( '#calculate_btn' ).click(); 
    });
    
	var ticker = $("#stock_ticker").val();
	getTickerDeatils(ticker);

    function getTickerDeatils(val, tvw=true){
        $.ajax({
            url: `${apiBaseurl}/cca`,
            type : 'GET',
            data : {
                'symbol' : $("#stock_ticker").val(),
                'currency' : $("#currency").val(),
                'action':'ticker_all_details',
            },
            dataType:'json',
            beforeSend : xhr => {
                xhr.setRequestHeader('X-WP-Nonce', "<?=wp_create_nonce( 'wp_rest' );?>");
                $("#calculate_btn").html('Fetching Data...');
                $("#currency").load();
            },
            success : function(data) { 
            //console.log("response === "+data['price']);    
                if(data['status'] == "200"){
                    if(data['price'] && data['last_high']){
                        console.log("in check -- response === "+data['price']);
                        $("#open_prize").val(data['price']);
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
                            new TradingView.widget(
                              {
                                    "width": "100%",
                                    "height": 550,
                                    "symbol": val+$("#currency").val(),
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
                                }
                            );
                        }
                    }else{                        
                        $(".x-error").html('No data available, please try a different one.');
                        $("#calculate_btn").html('Calculate');

                        setTimeout(function() { 
                            $(".x-error").html(''); 
                            $("#stock_ticker").val($("#stock_name").val());
                            if( $("#stock_name").val() == 'BTC' ){
                                $(".currency-btc").hide();

                                if($("#currency").val() == "BTC") {
                                    $("#currency").val("USD").change();
                                }
                            }else{
                                $(".currency-btc").show();
                            }
                        }, 2000);
                    }
                }              
            }
        });
    }

    $( "#stock_ticker" ).autocomplete({
        source: '/wp-json/api/cca/?action=get_ticker',
        minLength: 2,
        response: function (event, ui) {
            if (ui.content.length === 0) {
                $('#stock_div').css('border', 'solid 1px red');
            } else {
                $('#stock_div').css('border', 'solid 1px #e1e1e1');
            }
        }
    }).focus(function() {
        $(this).autocomplete('search', $(this).val())
    });

    $("#stock_ticker").keypress(function(e) {
        if(e.which == 13) {
            $('#stock_ticker').trigger("focus");
        }
    });

    $('#stock_ticker').on('autocompleteselect', function (e, ui) {
        var stock = ui.item.value;
        $('#stock_ticker').val(stock);
        if( stock == 'BTC' ){
            $(".currency-btc").hide();

            if($("#currency").val() == "BTC") {
                $("#currency").val("USD").change();
            }
        }else{
            $(".currency-btc").show();
        }

    	getTickerDeatils(stock);        

    });
    $('#currency').on('change', function() {
        getTickerDeatils($("#stock_ticker").val(), false); 
    });

    /*poonam add code 1/02/24*/

    $(document).on('keyup', '#current_hight', function() {
        $('#calculate_btn').click(); 
    });

    $(document).on('keyup', '#investment', function() {
        $('#calculate_btn').click(); 
    });
    
    $('#sel_entry_level').on('change', function() {
        $('#calculate_btn').click(); 
    });

    /*end poonam added code 1/02/24*/

    $( "#calculate_btn" ).click(function() {
    
        var stock                   = $("#stock_ticker").val();
        var currency                = $("#currency").val();
        var investment_tot          = $("#investment").val();
        var current_hight           = $("#current_hight").val();
        var open                    = $("#open_prize").val();
        var high                    = $("#current_hight").val(); 
        var sel_entry_level         = 3;
        var stock_current_price     = $("#stock_price").text();

        $("#checkAll").removeAttr('checked');
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


        var stratergy_table_values  = '';
        var share_change24hour      = 0;
        var cnt                     = 1;
        var table_values            = '';
        var strategy_table_values   = '';
        var open_percentage         = open / 100;
        var high_percentage         = high / 100;
        var total_avg_price_show2   = 0;
        var total_trade_cost        = 0;
        var has_error               = 0;
        strategy_detail = [];

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

        if(stock !="" && currency !="" && investment !="" && current_hight !=""){
            var entery_level_arr        = new Array();
            var per_tot_amt             = firstEntryLevel[sel_entry_level];
            var prev_per_tot_amt        = 0;
            var tot_used_investment     = 0;
            var tot_used_investment_per = 0;
            var tot_no_of_share_buy     = 0;
            var tot_avg_share_pice      = 0;
            var avg_share_price         = 0;
            var avg_share_price2        = 0;
            var sum_reaml_amt           = 0;
            var avg_all_share_price     = 0;
            var no_of_share_buy         = 0;
            var balance_amt             = 0;
            var investmentTotalCal      = 0;
            var entry_limit_val         = 25;

            $("#stock_name").val(stock);
            $("#currency_input").val(currency);
            $("#current_price").val(stock_current_price);
            $("#week_high").val(current_hight);
            $("#your_invest").val(investment_tot);

            for(var z=1; z <= sel_entry_level; z++) {
                entery_level_arr.push(entry_limit_val);
                entry_limit_val = entry_limit_val + 25;
            }

            // below we set date obj
            dt = new Date(); 


            //loop of enetry level 
            $.each(entery_level_arr, function (index, value) {
                
                if(current_hight < 1)
                {
                    var entery_price_val = parseFloat((current_hight * value) / 100).toFixed(6);
                    var entery_price = parseFloat(current_hight-entery_price_val).toFixed(6);
                }
                else if(current_hight > 1 && current_hight < 10)
                {
                    var entery_price_val = parseFloat((current_hight * value) / 100).toFixed(2);
                    var entery_price = parseFloat(current_hight-entery_price_val).toFixed(2);
                }
                else
                {
                    var entery_price_val = Math.round((current_hight * value) / 100);
                    var entery_price = Math.round(current_hight-entery_price_val);
                }

                prev_per_tot_amt = (prev_per_tot_amt==0) ? per_tot_amt : prev_per_tot_amt*1.25;

                prev_per_tot_amt = parseFloat(prev_per_tot_amt).toFixed(5);
                          
                var investment =   investment_tot * prev_per_tot_amt  / 100;
               
                investment = parseFloat(investment).toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
   
                tot_used_investment_per = tot_used_investment_per + parseFloat(prev_per_tot_amt);

                /*No of Share Buy start */
                var updated_investment  = parseFloat(investment) +  balance_amt;
                tot_used_investment     = tot_used_investment + parseFloat(investment);
                investmentTotalCal = parseFloat(investmentTotalCal) + parseFloat(investment);
                   
                if(current_hight ==0)
                {
                    no_of_share_buy = 0;
                    tot_no_of_share_buy=0;

                }
                else
                {
                    no_of_share_buy = updated_investment / entery_price;
                    no_of_share_buy = no_of_share_buy.toFixed(5);
                    tot_no_of_share_buy = parseFloat(tot_no_of_share_buy) + parseFloat(no_of_share_buy);
                    tot_no_of_share_buy = parseFloat(tot_no_of_share_buy.toFixed(5));
                }
                
                balance_amt =  Math.abs(updated_investment -(entery_price *  no_of_share_buy));
                    
                if(avg_share_price == 0)
                {
                    avg_price_show  = avg_price = entery_price * no_of_share_buy;
                    avg_price_show2  = avg_price2 = parseFloat(investmentTotalCal) / tot_no_of_share_buy;
                    avg_share_price = avg_share_price + avg_price;
                    avg_share_price2 = avg_share_price + avg_price2;
                }else{
                    avg_price       = entery_price * Math.floor(no_of_share_buy);
                    avg_price2       = parseFloat(investmentTotalCal) / tot_no_of_share_buy;
                    avg_share_price = avg_share_price + avg_price;
                    avg_share_price2 = avg_share_price + avg_price2;
                    avg_price_show  = avg_share_price / tot_no_of_share_buy;
                    avg_price_show2  = parseFloat(investmentTotalCal) / tot_no_of_share_buy;
                }

                if(current_hight ==0)
                {
                    avg_price_show2  =0;
                }
                else
                {   
                    if(avg_price_show2 < 1){
                        avg_price_show2  = parseFloat(avg_price_show2).toFixed(6);
                    }else{
                        avg_price_show2  = parseFloat(avg_price_show2).toFixed(2);
                    }

                }
                table_values  +=' <tr><td>-'+value+'%</td><td>'+currencySymbol[currency]+entery_price+'</td><td>'+currencySymbol[currency]+parseFloat(investment).toFixed(2)+'</td><td>'+parseFloat(prev_per_tot_amt).toFixed(2)+'%</td><td>'+parseFloat(no_of_share_buy).toFixed(5)+'</td><td>'+tot_no_of_share_buy.toFixed(5)+'</td><td>'+currencySymbol[currency]+parseFloat(avg_price_show2).toFixed(2)+'</td></tr>';
                
                str_invested_money = entery_price * no_of_share_buy;
                sum_reaml_amt = sum_reaml_amt + str_invested_money;

                let d = new Date();
                d.setMonth(d.getMonth() + cnt, 1);
                future = d.toLocaleDateString('en-GB');
                future = future.replaceAll('/', '-');
                future_split = future.split('-');
                future_date = future_split[2]+'-'+future_split[1]+'-'+future_split[0];

                trade_cost = investment;
                total_trade_cost = parseFloat(total_trade_cost) + parseFloat(trade_cost);
                /*stratergy_table_values +=' <tr><td> <input type="date" class="date_box purchase_date" name="stock_buy_date'+cnt+'" id="stock_buy_date'+cnt+'" value="" onchange="setdatetospan(this.id, '+cnt+'); cost();" required><span class="d-none" style="display:none;" id="span_stock_buy_date'+cnt+'"> </span></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control entry_val input_num_validate" name="entry_cost_'+cnt+'" id="entry_cost_'+cnt+'" value="'+entery_price.toFixed(2)+'" onkeyup="cost()"></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control invested_val input_num_validate" name="invested_cost_'+cnt+'" id="invested_cost_'+cnt+'" value="'+str_invested_money.toFixed(2)+'" onkeyup="cost()"></td><td>'+currencySymbol[currency]+parseFloat(prev_per_tot_amt).toFixed(2)+'%</td><td>'+parseFloat(no_of_share_buy).toFixed(5)+'</td><td>'+tot_no_of_share_buy.toFixed(5)+'</td><td>'+currencySymbol[currency]+parseFloat(avg_price_show2).toFixed(2)+'</td><td>'+currencySymbol[currency]+parseFloat(trade_cost).toFixed(2)+'</td></tr>';*/
                var set_alert = 0;
                if ($('#chkSetAlert_'+cnt).is(":checked")) {
                    set_alert = 1;
                }

                if(cnt == 1){
                         
                    $("#excel_entery_tbl_level1").val(value);
                    $("#excel_entery_tbl_invest1").val(currencySymbol[currency]+entery_price);
                    $("#excel_entery_tbl_no_shares1").val(no_of_share_buy);
                }

                stratergy_table_values +=' <tr><td> <input type="date" class="date_box purchase_date" name="stock_buy_date'+cnt+'" id="stock_buy_date'+cnt+'" value="" onchange="setdatetospan(this.id, '+cnt+'); cost('+cnt+');" required><span class="d-none" style="display:none;" id="span_stock_buy_date'+cnt+'"> </span></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control entry_val input_num_validate" name="entry_cost_'+cnt+'" id="entry_cost_'+cnt+'" value="'+entery_price+'" onkeyup="cost('+cnt+')"></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control invested_val input_num_validate" name="invested_cost_'+cnt+'" id="invested_cost_'+cnt+'" value="'+str_invested_money.toFixed(2)+'" onkeyup="cost('+cnt+')"></td><td><span class="no_share_val" id="no_share_val_'+cnt+'"></span></td><td><span class="tot_no_share_val" id="tot_no_share_val_'+cnt+'"></span></td><td><span class="tot_no_share_val" id="ave_price_per_token_'+cnt+'"></span></td><td>'+currencySymbol[currency]+' <input type="number" class="form-control investment_val input_num_validate" name="cost_'+cnt+'" id="cost_'+cnt+'" value="0" onkeyup="cost('+cnt+')"><input type="hidden" name="no_of_share_buy_'+cnt+'" id="no_of_share_buy_'+cnt+'" value="'+no_of_share_buy+'" /><span id="span_cost_'+cnt+'" class="d-none"  style="display:none;" ></span></td><td><input type="checkbox" name="chkSetAlert_'+cnt+'" id="chkSetAlert_'+cnt+'" class="alert_chk" value="1"/></td></tr>';

                var temp_array = '';
                var temp_array = {
                        "entry_level": value, 
                        "purchase_date": $("#stock_buy_date"+cnt).val(), 
                        "investment_amount": $("#invested_cost_"+cnt).val(), 
                        "real_amount": $("#invested_cost_"+cnt).val(), 
                        "entry_price": $("#entry_cost_"+cnt).val(), 
                        "no_of_shares_to_buy": $("#no_share_val_"+cnt).val(), 
                        "additional_cost": $("#cost_"+cnt).val(), 
                        "alert_flag": set_alert 
                    };

                strategy_detail.push(temp_array);  


                cnt++;                    

            });
            total_avg_price_show2 = parseFloat(tot_used_investment) / parseFloat(tot_no_of_share_buy);
            var inve_per = tot_used_investment / investment_tot * 100;
            table_values +=' <tr><td  style=" border-color:none; border-width:0 !important;"></td><td class="total">Total</td><td class="total">'+currencySymbol[currency]+Math.round(tot_used_investment)+'</td><td class="total">'+Math.round(inve_per)+'%</td><td class="total">'+tot_no_of_share_buy+'</td><td class="total">'+tot_no_of_share_buy+'</td></tr>';
            /*stratergy_table_values +='<tr style="font-size: 15px;"><td colspan="2" class="total">Total planned investment:</td><td class="total">'+currencySymbol[currency]+tot_used_investment.toFixed(2)+'</td><td class="total">'+tot_no_of_share_buy.toFixed(5)+'</td><td class="total">'+tot_no_of_share_buy.toFixed(5)+'</td><td class="total">'+currencySymbol[currency]+total_avg_price_show2.toFixed(2)+'</td><td class="total">'+currencySymbol[currency]+total_trade_cost.toFixed(2)+'</td></tr>';
            stratergy_table_values +='<tr style="font-size: 15px;"><td colspan="2" class="total">Total invested amount:</td><td class="total">'+currencySymbol[currency]+tot_used_investment.toFixed(2)+'</td><td class="total">'+tot_no_of_share_buy.toFixed(5)+'</td><td class="total">'+tot_no_of_share_buy.toFixed(5)+'</td><td class="total">'+currencySymbol[currency]+total_avg_price_show2.toFixed(2)+'</td><td class="total">'+currencySymbol[currency]+total_trade_cost.toFixed(2)+'</td></tr>';*/
            $("#entery_table").empty().append(table_values);
            $("#stratergy_table_values").empty().append(stratergy_table_values);


            total_cost = 0;
            avg_all_share_price =  sum_reaml_amt / tot_no_of_share_buy;
            share_change24hour = open - avg_all_share_price;
            total_gain = Math.round(tot_no_of_share_buy * share_change24hour);
            vca_result = (total_gain / (tot_used_investment + total_cost)) * 100; 
            vca_result = vca_result.toFixed(2);            

            var change24hour =   high - open;

            /*if(total_gain > 0)
            {
                var gain_str = total_gain+ ' &#8593;';
                $("#total_gain").empty().html(currencySymbol[currency]+gain_str).css('color','#67c275');
            }
            else
            {
                var gain_str = total_gain+' &#8595;'; 
                $("#total_gain").empty().html(currencySymbol[currency]+gain_str).css('color','red');
            }
           
            // $("#stock_diff").empty().text(change24hour+"("+result+")");
            $("#tot_invseted").empty().html(currencySymbol[currency]+tot_used_investment.toFixed(2));
            $("#tot_invseted_input").val(currencySymbol[currency]+tot_used_investment);
            $("#tot_amt_share").empty().text(tot_no_of_share_buy);
            $("#avg_all_share_price").empty().html(currencySymbol[currency]+avg_all_share_price.toFixed(2)); 
            $("#diff_price").empty().html(currencySymbol[currency]+share_change24hour.toFixed(2));
            
            $("#vca_result").empty().text(vca_result+"%");*/
            $("#total_gain").empty().html(currencySymbol[currency]+"0.00").css('color','#67c275');
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
        }        

    });   
});

function setdatetospan(divid, cnt){
    $(".date_box").each(function (index, value) {                
        $("#span_"+this.id).text(this.value);
        enable_checkbox(index);
    }); 
}

 function downloadExcel(){

    var stock       = $("#stock_ticker").val();
    var currency    = $("#currency").val();
    var investment  = $("#investment").val();
    var current_hight = $("#current_hight").val();
    var first_table   = $("#entery_table").html();            
    var strategy_table   = $("#strategy_table").html(); 
    var stock_price =  $("#stock_price").html();
    var stock_current_price     = $("#stock_price").text();

    var result_val = $("#vca_result").text();
    var total_gain_loss_val = $("#total_gain").html();
    var total_invested_val  = $("#tot_invseted").text();
    var total_amt_share_val = $("#tot_amt_share").text();
    var avg_price_val = $("#avg_all_share_price").text();
    var differance_in_price_val  = $("#diff_price").text(); 
            
    $("#symbol_excel").val(stock);
    $("#currency_excel").val(currency);
    $("#investment_excel").val(investment);
    $("#current_hight_excel").val(current_hight);
    $("#current_price_excel").val(stock_current_price);
    $("#section1").val(first_table);
    $("#section2").val(strategy_table);
    $("#current_price").val(stock_price);

    $("#result_val").val(result_val);
    $("#total_gain_loss_val").val(total_gain_loss_val);
    $("#total_invested_val").val(total_invested_val);
    $("#total_amt_share_val").val(total_amt_share_val);
    $("#avg_price_val").val(avg_price_val);
    $("#differance_in_price_val").val(differance_in_price_val);        

    $("#pdf_gen").submit();
        
}  


function openContent(evt, contentName) {
    $('#home').css('display','none');
    $('#small-cap-strategy').css('display','none');

    $('.tablinks').removeClass('active');
    $('.tablinks').removeClass('active');

    $('#'+contentName).css('display','block');
    evt.currentTarget.className += " active";   
}

/*Below function used to update startergy section result*/
function cost(cnt_id) {
    var currency        = $("#currency").val();
    let currencySymbol = {"USD":'&#36;', "GBP":'&pound;', "EUR":'&euro;', "BTC":'₿'};
    var sum_total_invested = 0;
    var sum_total_invested_only = 0;        
    var new_total_inveted = 0;
    var new_total_entry = 0;
    var total_share_buy = 0;
    var ave_price_per_token = 0;
    var total_real_cost = 0;
    var total_cost = 0;
    var shares_to_buy = 0;

    var new_added_stock_buy_date = $("#stock_buy_date"+cnt_id).val();
    var new_added_entry_cost = $("#entry_cost_"+cnt_id).val();
        
    $("#stratergy_table_values .purchase_date").each(function (index, value) {   
        cnt_val = index + 1;
        shares_to_buy = 0;

        if(cnt_val < cnt_id) {

            if($("#stock_buy_date"+cnt_val).val() == "") {

                $("#stock_buy_date"+cnt_val).val(new_added_stock_buy_date);
                $("#entry_cost_"+cnt_val).val(new_added_entry_cost);
            }
        }

    
            if($("#stock_buy_date"+cnt_val).val() != '' && $("#invested_cost_"+cnt_val).val() > 0 && $("#entry_cost_"+cnt_val).val() > 0 ) {
                sum_total_invested = +(sum_total_invested) + +($("#invested_cost_"+cnt_val).val());
                sum_total_invested_only = sum_total_invested;

                total_cost = +(total_cost) + +($("#cost_"+cnt_val).val());

                shares_to_buy = ($("#invested_cost_"+cnt_val).val() / $("#entry_cost_"+cnt_val).val()).toFixed(5);

                new_total_entry = +(new_total_entry) + +($("#entry_cost_"+cnt_val).val() * shares_to_buy);
                
                total_share_buy = (+(total_share_buy) + +(shares_to_buy)).toFixed(5);

                ave_price_per_token = sum_total_invested / total_share_buy;

                if(ave_price_per_token < 1){
                    $("#ave_price_per_token_"+cnt_val).empty().html(currencySymbol[currency]+ave_price_per_token.toFixed(6));
                } else {
                    $("#ave_price_per_token_"+cnt_val).empty().html(currencySymbol[currency]+ave_price_per_token.toFixed(2));
                }

                $("#real_cost_"+cnt_val).empty().html(currencySymbol[currency]+$("#invested_cost_"+cnt_val).val());
                $("#no_share_val_"+cnt_val).empty().html(shares_to_buy);
                $("#tot_no_share_val_"+cnt_val).empty().html(total_share_buy);
                
                enable_checkbox(index);
            } else {
                $("#real_cost_"+cnt_val).empty().html('');
                $("#no_share_val_"+cnt_val).empty().html('');
                $("#tot_no_share_val_"+cnt_val).empty().html('');
                $("#ave_price_per_token_"+cnt_val).empty().html('');
            }
            
        });
        
        sum_total_invested = (+sum_total_invested) + (+total_cost);

        if(sum_total_invested > 0 && total_share_buy > 0) {
            $("#total_cost").empty().html(currencySymbol[currency]+total_cost.toFixed(2));
            total_invseted = $("#tot_invseted_input").val();
            var new_total_inveted = sum_total_invested;
            
            $("#tot_invseted").empty().html(currencySymbol[currency]+new_total_inveted.toFixed(2));

            var new_tot_amt_share = total_share_buy;        
            var total_share = total_share_buy;        
            //var avg_price = new_total_inveted /total_share;  
            var avg_price = new_total_inveted / total_share_buy;      
            //var current_high   = $("#current_hight").val();
            var current_high = $("#stock_price").text();
            //console.log("current_high === "+current_high);
            var diff_price = current_high - avg_price;        
            //var new_total_gainLoss = total_share * diff_price;  
            var new_total_gainLoss = parseFloat(total_share_buy * diff_price);       
            var new_result = (new_total_gainLoss / new_total_inveted) * 100;  
        } else {
            $("#total_cost").empty().html(currencySymbol[currency]+"0");
            new_total_inveted =  sum_total_invested;
            $("#tot_invseted").empty().html(currencySymbol[currency]+new_total_inveted);

            var new_tot_amt_share = total_share_buy;        
            var total_share = total_share_buy;        
            var avg_price = 0;
            var diff_price = 0;        
            var new_total_gainLoss = 0;        
            var new_result = 0;  
        }        

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

        if(diff_price < 1) {
            $("#diff_price").empty().html(currencySymbol[currency]+diff_price.toFixed(6));
        } else {
            $("#diff_price").empty().html(currencySymbol[currency]+diff_price.toFixed(2));
        }

        $("#tot_invseted").html(currencySymbol[currency]+new_total_inveted.toFixed(2));        
        $("#tot_amt_share").empty().text(total_share_buy);
        $("#vca_result").empty().text(new_result.toFixed(2)+"%");

        $("#final_total_share").empty().val(total_share_buy);

        //calculate_profit(avg_price, total_share_buy);
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

function saveStrategyAlert(url) {

    var is_data_added = 0;
    
    $("#stratergy_table_values .date_box").each(function (index, value) {   
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
        var entry_limit_val             = 100;

        for(var z=1; z <= 11; z++) {
            profit_entry_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 100;
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
                sale_sum = total_tokens * take_profit_price * ( 20 / 100);
                tot_sale_sum = tot_sale_sum + sale_sum;

                number_of_tokens = ( sale_sum / take_profit_price );
                tot_number_of_tokens = tot_number_of_tokens + number_of_tokens;

                current_holdings = total_tokens - tot_number_of_tokens;
                tot_current_holdings = tot_current_holdings + current_holdings;
                current_holdings_prev = current_holdings;
            } else {
                sale_sum = current_holdings_prev * take_profit_price * ( 20 / 100);
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
        var entry_limit_val             = 100;

        for(var z=1; z <= 11; z++) {
            profit_entry_level_arr.push(entry_limit_val);
            entry_limit_val = entry_limit_val + 100;
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