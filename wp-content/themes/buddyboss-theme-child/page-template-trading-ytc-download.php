<?php 
/*
 * Template name: Trading YTC Download Excel
 *
 */
?>
<style type="text/css">

table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
th,td{
	padding: 15px 20px;
	font-size: 20px;
}

.head-title{
	font-size: 40px;
	float: left;
	margin: 0;

}

.blue-box{
	background-color: #a4c2f4;
}
.red-box{
	background-color: #e06666;
}
.green-box{
		background-color: #b6d7a8;
}

.high-box{
	background-color: #74fc3a;
}

.yellow-box{
	background-color: #fff2cc;
}
.blank-cell{
	border: 1px solid #ffffff00;
border-collapse: collapse;
background-color: #fff;
}
</style>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<body style="font-family: 'Avenir LT Std'; font-weight: normal !important;">


     <!--<div style="width:40%">
     	 <h1 class="head-title">Advanced CCA Calculator <br/>used for Cryptocurrencies</h1>     	 
     </div>-->
<div style="width:100%; float:left; padding-bottom: 30px; padding-top: 30px;">
     	
     	<!-- TradingView Widget BEGIN -->
<?php 
$page_id = 21943;  //Page ID for trading Ticker view
$page_data = get_page($page_id); 
$content = $page_data->short_description;
//print_r($content);
$explodeData = explode(',',$content);
$symboles = '';
for($i=0;$i<count($explodeData);$i++){
	$symboles .= '{
      "proName": "'.$explodeData[$i].'",
      "title": "'.$explodeData[$i].'"
    },';
}
$symboles = substr($symboles,0,-1);

?>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
   <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [ <?php echo $symboles; ?>],
  "showSymbolLogo": false,
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "in"
}
  </script>
</div>
<!-- TradingView Widget END -->

     </div>

<br /><br /><br />

<button id="btn2" onclick="getHtml();">Show HTML</button>
		
<div id="demo"></div>		  
	</body>
<script>
	function getHtml(){
		//var frameObj = jQuery('iframe').html();
		var frameObj = jQuery('.tradingview-widget-container iframe').contents().find("body").html();
		//var html = document.getElementById('widget-ticker-tape-container').innerHTML;
		//var html = document.getElementsByClassName('tv-ticker-item-tape__short-name');
		//var html = document.querySelector("widget-ticker-tape-container");
		//var frameObj = document.getElementsByTagName('iframe');
		 alert(frameObj);
		 //var iframeWindow = iframe.contentWindow;
		  //var frameContent = frameObj.contentWindow.body.innerHTML;
		 console.log(frameObj);
		 //alert(frameObj);
        //alert(frameContent);
		//var arr = Array.from(frameContent); 
		//var myJsonString = JSON.stringify(arr);
		//document.getElementById("demo").innerHTML =myJsonString;
	}
	 
</script>
	<?php
/*exit;
ob_clean();
// echo "<pre>";
// print_r($_REQUEST);
// exit;
header('Content-Type: application/vnd.ms-excel; charset=UTF-8');    
header('Content-disposition: attachment; filename='.$_REQUEST['strategy_name'].'_'.date('d-M-Y').'.xls');  */

?>