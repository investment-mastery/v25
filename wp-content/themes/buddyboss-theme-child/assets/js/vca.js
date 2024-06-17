$( window ).load(function() {
   
     getTickerDeatils('AAPL');

    $( "#calculate_btn" ).click(function() {
        // alert( "Handler for .click() called." );

            var stock           = $("#stock_ticker").val();
            var currency        = $("#currency").val();
            var investment_tot  = $("#investment").val();
            var current_hight   = $("#current_hight").val();
            var open            = $("#open_prize").val();
            var high            = $("#current_hight").val(); 
            var stratergy_table_values = '';
            var share_amt_diffreace =0;
            var cnt                 =1;
            var table_values        = '';
            var open_percentage = open / 100;
            var high_percentage = high / 100;
                if(open_percentage > high_percentage)
                {
                    var result = ((open_percentage / high_percentage)*100)-100;
                    result = result.toFixed(2);
                }
                else
                {
                    var result = ((high_percentage / open_percentage)*100)-100;
                    result = result.toFixed(2);
                }


            if(stock !="" && currency!="" && investment !="" && current_hight !="")
            {
                var entery_level_arr        = new Array(20,30,40,50,60,70);
                var per_tot_amt             = 8.88;
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
                    //investment = Math.round(investment /100);
                     tot_used_investment_per = tot_used_investment_per + prev_per_tot_amt;

                        /*No of Share Buy start */
                        var updated_investment  = investment +  balance_amt;
                        tot_used_investment     = tot_used_investment + investment;

                        if(entery_price <= investment)
                        {
                            if(tot_no_of_share_buy ==0)
                            {
                                no_of_share_buy = Math.floor(updated_investment / entery_price);
                                tot_no_of_share_buy = tot_no_of_share_buy + no_of_share_buy;
                            }
                            else
                            {
                                var buy_share_string =  updated_investment / entery_price;                            
                                no_of_share_buy = parseInt(buy_share_string);
                                tot_no_of_share_buy = tot_no_of_share_buy + no_of_share_buy;
                            }

                            if(no_of_share_buy >0)
                            {
                                used_amt = (no_of_share_buy * entery_price) - updated_investment;
                                balance_amt =  Math.abs(updated_investment -(entery_price *  no_of_share_buy));
                            }
                        }
                        else
                        {
                            no_of_share_buy = 0;
                            balance_amt = investment;
                        }
                        /*No of Share Buy End */
                        if(avg_share_price == 0)
                        {
                            avg_price_show  = avg_price = entery_price * no_of_share_buy;
                            avg_share_price = avg_share_price + avg_price;
                        }
                        else
                        {
                            avg_price       = entery_price * Math.floor(no_of_share_buy);
                            avg_share_price = avg_share_price + avg_price;
                            avg_price_show  = avg_share_price / tot_no_of_share_buy;
                        }
            
                        sell_after_15 = avg_price_show*1.15;
                        sell_after_20 = avg_price_show*1.20;
                        // alert(investment);
                        table_values  +=' <tr><td>-'+value+'%</td><td>$'+entery_price.toFixed(2)+'</td><td>$'+investment+'</td><td>'+prev_per_tot_amt+'%</td><td>'+no_of_share_buy+'</td><td>'+tot_no_of_share_buy+'</td><td>$'+Math.round(avg_price_show,2)+'</td><td>$'+Math.round(sell_after_15,2)+'</td><td>$'+Math.round(sell_after_20,2)+'</td></tr>';
                        str_invested_money = entery_price * no_of_share_buy;
                        sum_reaml_amt = sum_reaml_amt + str_invested_money;

                        let d = new Date();
                        d.setMonth(d.getMonth() + cnt, 1);
                        future = d.toLocaleDateString('en-GB');
                        future = future.replaceAll('/', '-');
                        future_split = future.split('-');
                        future_date = future_split[2]+'-'+future_split[1]+'-'+future_split[0];
                        stratergy_table_values += '<tr><td> <input type="date" class="date_box" name="stock_buy_date'+cnt+'" id="stock_buy_date'+cnt+'" value="'+future_date+'" onchange="setdatetospan()"><span class="d-none" id="span_stock_buy_date'+cnt+'">'+future_date+' </span></td><td>$'+str_invested_money.toFixed(2)+'</td><td>$'+str_invested_money.toFixed(2)+'</td><td>$'+entery_price.toFixed(2)+'</td><td>'+no_of_share_buy+'</td><td><input type="text" class="form-control investment_val" name="cost_'+cnt+'" id="cost_'+cnt+'" value="0" onkeyup="cost()"><span id="span_cost_'+cnt+'" class="d-none" >0</span></td></tr>';
                        cnt++;
                        

                });
               var inve_per = tot_used_investment / investment_tot * 100;
                table_values +=' <tr><td  style=" border-color:none; border-width:0 !important;"></td><td class="total">Total</td><td class="total">$'+tot_used_investment+'</td><td class="total">'+Math.round(inve_per)+'%</td><td class="total">'+tot_no_of_share_buy+'</td></tr>';
                stratergy_table_values +='<tr><td colspan="4"></td><td style="background-color: #0c3d61 !important; color: #fff !important; font-size: 16px; font-weight: 600;">Total Cost</td><td style="background-color: #0c3d61 !important; color: #fff !important; font-size: 16px; font-weight: 600;"><span id="total_cost">0.00</span></td></tr>';
                $("#entery_table").empty().append(table_values);
                $("#stratergy_table_values").empty().append(stratergy_table_values); 

                total_cost = 0;
                avg_all_share_price =  Math.round(sum_reaml_amt / tot_no_of_share_buy);
                share_amt_diffreace = open - avg_all_share_price;
                total_gain = Math.round(tot_no_of_share_buy * share_amt_diffreace);
                vca_result = (total_gain / (tot_used_investment + total_cost)) * 100; 
                vca_result = vca_result.toFixed(2);

                

                var amt_diffreace =   high - open;

                if(total_gain > 0)
                {
                    var gain_str = total_gain+ ' &#8593;';
                    $("#total_gain").empty().html(gain_str).css('color','#67c275');
                }
                else
                {
                    var gain_str = total_gain+' &#8595;'; 
                    $("#total_gain").empty().html(gain_str).css('color','red');
                }
               
                // $("#stock_diff").empty().text(amt_diffreace+"("+result+")");
                $("#tot_invseted").empty().text(tot_used_investment);
                $("#tot_invseted_input").val(tot_used_investment);
                $("#tot_amt_share").empty().text(tot_no_of_share_buy);
                $("#avg_all_share_price").empty().text(avg_all_share_price); 
                $("#diff_price").empty().text(share_amt_diffreace.toFixed(2));
                
                $("#vca_result").empty().text(vca_result+"%");
            }

            

    });


    function getTickerDeatils(val)
    {
       if(val.length >=2)
       {
         $.ajax({
                url : '/wp-json/api/vca/',
                headers: {
                    "Content-Type": "application/json",
                    "X-WP-Nonce": `${nnounce}`
                },
                type : 'POST',
                data : {
                    'symbol' : val,
                    'action':'ticker_all_details',
                },
                dataType:'json',
                success : function(data) {     
                    if(data['status'] == "200")
                    {
                        $("#open_prize").val(data['open']);
                        $("#ticker_high").val(data['high']);
                        $("#current_hight").val(data['WeekHigh_52']);
                        $("#stock_price").empty().text(data['high']);
                        $("#stock_diff").empty().text(data['amt_diffreace']+"("+data['percentage_diffrance']+")");
                        $("#calculate_btn").click();
                        
                    }              
                }
            }); 

          new TradingView.widget(
              {
                  "autosize": true,
                  "symbol": val,
                  "interval": "D",
                  "timezone": "Etc/UTC",
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
    }

    $(function() {
        $( "#stock_ticker" ).autocomplete({
          source: '/wp-json/api/vca/?action=get_ticker',
        });
     });

    $('#stock_ticker').on('autocompleteselect', function (e, ui) {
        var stock = ui.item.label;
       var myArray = stock.split(" - ");
       
        // $("#stock_ticker").val(myArray[0]);
        getTickerDeatils(myArray[0]);
        // setTIckerval(myArray[0]);
        
    });

    // function setTIckerval(ticker)
    // {
    //     $("#stock_ticker").val(ticker);
    //     alert(ticker);
    // }

    /*Below function used to update startergy section result*/
        function cost()
       {
            var sum_all_cost = 0;
            $(".investment_val").each(function (index, value) {
                sum_all_cost = (+sum_all_cost) + (+this.value);
                $("#span_"+this.id).text(this.value);
            });

            if(sum_all_cost > 0)
            {
                $("#total_cost").empty().text(sum_all_cost);
                var total_invseted = $("#tot_invseted_input").val();
                var new_total_inveted =  (+total_invseted) + (+sum_all_cost);
                $("#tot_invseted").empty().text(new_total_inveted);
            }
            else
            {
                $("#total_cost").empty().text(0);
                var new_total_inveted = $("#tot_invseted_input").val();
                $("#tot_invseted").empty().text(new_total_inveted);
            }

            var new_tot_amt_share = $("#tot_amt_share").text();
            var total_share = $("#tot_amt_share").text();
            var avg_price = new_total_inveted /total_share;
            var current_hight = $("#ticker_high").val();

            var diff_price = current_hight - avg_price;
            var new_total_gainLoss = total_share * diff_price;
            var new_result = new_total_gainLoss / new_total_inveted * 100;
         
            if(new_total_gainLoss > 0)
            {
                $("#total_gain").empty().text(new_total_gainLoss.toFixed(2)+ ' ↑').css('color','#67c275');
            }
            else
            {
                $("#total_gain").empty().text(new_total_gainLoss.toFixed(2)+ ' ↓').css('color','red');
            }

            $("#tot_invseted").text(new_total_inveted);
            $("#avg_all_share_price").empty().text(avg_price.toFixed(2));
            $("#diff_price").empty().text(diff_price.toFixed(2));
            
            $("#vca_result").empty().text(new_result.toFixed(2)+"%");

       }
    /*Above function used to update startergy section result*/
    /*Below Function used to Update Date in Span tag of startergy section start*/
    function setdatetospan()
    {
        $(".date_box").each(function (index, value) {                
                $("#span_"+this.id).text(this.value);
            });
    }
    /*Below Function used to Update Date in Span tag of startergy section end*/

    
});