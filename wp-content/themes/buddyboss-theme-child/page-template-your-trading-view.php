<?php
/*
 * Template name: Your Trading View Template
 *
 */

get_header();

$club = get_club_slug();
?>
<style>.container { max-width:95% !important; }
    .all_list_trading {
        display: flex;
        gap: 10px;
        margin: 20px 0px;
    }
    .all_list_trading .your_trading {
        display: flex;
        align-items: center;
        gap: 10px;
        border: 1px solid #bfbfbf;
        border-radius: 6px;
        padding: 10px 15px;
        background-color: #fff;
        flex: 0 0 auto;
        width: auto;
    }
    .all_list_trading .your_trading img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
    }
    .all_list_trading .your_trading h2 {
        margin-bottom: 0px;
        font-size: 16px;
    }
    .all_list_trading .your_trading:hover {
        border-color: #48A9F5;
        cursor: pointer;
    }
    
</style>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/vca.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<div class="container12" id="">
   
  <!-- 27228 -->
   
  <?php 
$page_id = 27228;  //Page ID for trading view
$page_data = get_page($page_id); 
$content = $page_data->short_description;
$josn_array =  json_decode($content);
//echo '<pre>';print_r($josn_array);

$explodeData = explode(',',$content);
$symboles = '';
foreach($josn_array as $jarray){
 $symboles_id = "'".$jarray->name."'";   
$symboles .= '<a href="javascript:void(0);" onclick="getTickerDeatils('.$symboles_id.')"><div class="your_trading">
                <img src="'.$jarray->link.'"/>
                <h2>'.$jarray->name.'</h2>
            </div></a>';
}
$symboles_id_d =  "'".$josn_array[0]->name."'"; ;
 

?>
   

    <!-- Tab panes -->
    <div class="tab-content" id="fullpage">
   <div class="row">
        <div class="over__scroll row-0-padding">
          <div class="all_list_trading">
          <?php echo $symboles; ?>  
          </div> 
        </div>
    </div>
     <!-- Tab panes -->



      <!-- Tab panes -->

          <div class="row">
                <div class="col-lg-12 col-sm-12 row-0-padding">

                  
<!-- TradingView Widget END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 row-0-padding">
                   <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container12">
                        <div id="tradingview_c9767"></div>
                        <div class="tradingview-widget-copyright">&nbsp;</div>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
          
    </div>
     
</div>


<!---Jquery---->            
<script type="text/javascript">
      var symbol = <?php echo $symboles_id_d; ?>;
    getTickerDeatils(symbol);

    function getTickerDeatils(symbol){
           new TradingView.widget(
                              {
                                    "width": "100%",
                                    "height": 680,
                                    "symbol": symbol,
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

   
 

</script>   
        
  
<?php
get_footer();