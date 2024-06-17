<?php
/*
 * Template name: CMC Download Excel
 *
 */
/*ob_clean();
echo "<pre>";
print_r($_REQUEST);
exit;*/
$excel_name = '';
if($_REQUEST['strategy_name'] != "") {
	$excel_name = $_REQUEST['strategy_name'];
} else {
	$excel_name = 'CMC_Strategy';
}
header('Content-Type: application/vnd.ms-excel; charset=UTF-8');    
header('Content-disposition: attachment; filename='.$excel_name.'_'.date('d-M-Y').'.xls');  
?>
<style type="text/css">

/*table, th, td {
	  border: 1px solid black;
	  border-collapse: collapse;
	}
th,td{
	padding: 15px 20px;
	font-size: 20px;
}*/
.table_border{
	border: 1px solid black;
	border-collapse: collapse;
}

th,td {
	padding: 15px 20px;
	font-size: 14px;
}

.head-title{
	font-size: 40px;
	float: left;
	margin: 0;

}
.head-title2{
	font-size: 30px;
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
<body style="font-family: 'Avenir LT Std'; font-weight: normal !important;">

<?php
$strategy_data = explode("##", $_REQUEST['section2']);
$profit_percent = 1;
?>
     <div style="width:40%">
     	 <h1 class="head-title">Contrarian Momentum <br/>Strategy Calculator</h1>     	 
     </div>
<br /><br /><br />
	<div>
		<table style="width:90%; border: 3px solid #000;">
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="6"><h2 class="head-title2">Trading Plan</h2> </td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td style="font-weight: bold; text-align: center;">Current Price</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $_REQUEST['current_price']?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td colspan="2" style="font-size: 20px; font-weight: bold; text-align: center;">Trading Pair</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style="font-weight: bold; text-align: center;">Trade Amount</td>
				<td style="font-weight: bold; text-align: center;">Base Currency</td>
				<td style="font-weight: bold; text-align: center;">Quote Currency</td>
				<td style="font-weight: bold; text-align: center;">BUY or SELL</td>
				<td style="font-weight: bold; text-align: center;">Number of Entries</td>
				<td style="font-weight: bold; text-align: center;">Exchange fee %</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo $_REQUEST['investment']?></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo $_REQUEST['symbol']?></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo $_REQUEST['currency']?></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo $_REQUEST['cmc_strategy_for']?></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo count($strategy_data);?></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;">0.00</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="6">BUY = You buy "Base Currency" with "Quote Currency"</td>
				<td>&nbsp;</td>				
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="6">SELL = You sell "Base Currency" to "Quote Currency"</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
		</table>  	 
     </div>
<br /><br /><br />

	<div>
		<table style="width:90%; border: 3px solid #000;">
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="6"><h2 class="head-title2">Execution</h2> </td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="3" style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-size: 22px; font-weight: bold;">Entry</td>
				<td colspan="3" style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-size: 22px; font-weight: bold;">Take Profit</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style="text-align: center; font-weight: bold;">Volume</td>
				<td style="text-align: center; font-weight: bold;">My Entry Price</td>
				<td style="text-align: center; font-weight: bold; border-right: 1px solid #000;">Value</td>
				<td style="text-align: center; font-weight: bold;">Average Price</td>
				<td style="text-align: center; font-weight: bold;">Profit</td>
				<td style="text-align: center; font-weight: bold;">Target Price</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style="text-align: center; font-weight: bold;">
					<?php 
					if($_REQUEST['cmc_strategy_for'] == "BUY") {
						echo $_REQUEST['currency'];
					} else {
						echo $_REQUEST['symbol'];
					}					
					?>						
				</td>
				<td style="text-align: center; font-weight: bold;"><?php echo $_REQUEST['currency']?></td>
				<td style="text-align: center; font-weight: bold; border-right: 1px solid #000;">
					<?php 
					if($_REQUEST['cmc_strategy_for'] == "BUY") {
						echo $_REQUEST['symbol'];
					} else {
						echo $_REQUEST['currency'];
					}					
					?>	
					</td>
				<td style="text-align: center; font-weight: bold;"><?php echo $_REQUEST['currency']?></td>
				<td style="text-align: center; font-weight: bold;">%</td>
				<td style="text-align: center; font-weight: bold;"><?php echo $_REQUEST['currency']?></td>
				<td>&nbsp;</td>
			</tr>	

			<?php			
			for($i = 0; $i < count($strategy_data); $i++) {

				$strategy_row = explode("|", $strategy_data[$i]);
				if($i == 0) {
					?>
					<tr>
						<td>&nbsp;</td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $strategy_row[0]; ?></td>
						<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo $strategy_row[1]; ?></td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $strategy_row[2]; ?></td>
						<td rowspan="7" style="border: 1px solid #000; background-color: #fff2cc; text-align: center; vertical-align: middle; font-size: 24px; font-weight: bold;"><?php echo $_REQUEST['avg_price_val']?></td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $profit_percent;?>%</td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"></td>
						<td>&nbsp;</td>
					</tr>
					<?php

				} else {

					?>
					<tr>
						<td>&nbsp;</td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $strategy_row[0]; ?></td>
						<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"><?php echo $strategy_row[1]; ?></td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $strategy_row[2]; ?></td>						
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $profit_percent;?>%</td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"></td>
						<td>&nbsp;</td>
					</tr>
					<?php

				}
				$profit_percent = $profit_percent + 1;
			}
			
			$remaining_rows = 7 - count($strategy_data);

			if($remaining_rows > 0) {
				for($j = 0; $j < $remaining_rows; $j++) {
					?>
					<tr>
						<td>&nbsp;</td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"></td>
						<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"></td>				
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $profit_percent;?>%</td>
						<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"></td>
						<td>&nbsp;</td>
					</tr>
					<?php
					$profit_percent = $profit_percent + 1;
				}
			}
			?>	
			
			<tr>
				<td>&nbsp;</td>
				<td colspan="3">(+25% Volume / Entry)</td>
				<td colspan="3">We aim for 5% Profit but will set a stop loss at break even when reaching 3% profit to protect the trade from losses</td>
				<td>&nbsp;</td>				
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
		</table>	 
     </div>
<br /><br /><br />

	<div>
		<table style="width:90%; border: 3px solid #000;">
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="3"><h2 class="head-title2">My Results</h2> </td>
				<td style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">Current P/L</td>
				<td style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">Current P/L %</td>
				<td style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">Current Price</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="3"></td>
				<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;">0.00</td>
				<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;">0.00%</td>
				<td style="border: 1px solid #000; background-color: #fff2cc; text-align: center;"><?php echo $_REQUEST['current_price']?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">Date profit taken</td>
				<td style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">Exchange</td>
				<td style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">Profit/Loss</td>
				<td colspan="3" style="border: 1px solid #000; background-color: #b6d7a8; text-align: center; font-weight: bold;">My thoughts about this trade</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">1</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">2</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">3</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">4</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">5</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">6</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">7</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">8</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">9</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">10</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">11</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">12</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">13</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">14</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">15</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">16</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">17</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">18</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td style="text-align: center; font-weight: bold;">19</td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td colspan="3" style="border: 1px solid #000; background-color: #c6dcf1; text-align: center;"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
		</table>	 
     </div>
<br /><br /><br />

		  
	</body>