<?php
/*
 * Template name: Small Cap Download Excel
 *
 */
ob_clean();
/*echo "<pre>";
print_r($_REQUEST);
exit;*/

$total_invested_val = str_replace("$", "", $_REQUEST['total_invested_val']);
$total_invested_val = str_replace("₿", "", $total_invested_val);
$total_invested_val = str_replace("£", "", $total_invested_val);
$total_invested_val = str_replace("€", "", $total_invested_val);

$total_gain_loss_val = str_replace("$", "", $_REQUEST['total_gain_loss_val']);
$total_gain_loss_val = str_replace("₿", "", $total_gain_loss_val);
$total_gain_loss_val = str_replace("£", "", $total_gain_loss_val);
$total_gain_loss_val = str_replace("€", "", $total_gain_loss_val);

$profit_investment = $total_invested_val + $total_gain_loss_val;
if($_REQUEST['strategy_name'] == '' ) {
	$_REQUEST['strategy_name'] = "Small_cap";
}

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');    
header('Content-disposition: attachment; filename='.$_REQUEST['strategy_name'].'_'.date('d-M-Y').'.xls');  

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
<body style="font-family: 'Avenir LT Std'; font-weight: normal !important;">


     <div style="width:40%">
     	 <h1 class="head-title">Small Cap Crypto Calculator</h1>     	 
     </div>
<br /><br /><br />

     <div style="width:100%; float:left; padding-bottom: 30px; padding-top: 30px;">
     	<table style="width:90%;">
		  <tr>
		    <th style="font-size:15px; text-align: center; width: 18%;">COIN</th>
		    <th style="font-size:15px; text-align: center; width: 22%;">ACCOUNT CURRENCY</th>
		    <th style="font-size:15px; text-align: center; width: 20%;">TRADING PAIR</th>
		    <th style="font-size:15px; text-align: center; width: 20%;">CURRENT PRICE</th>
		    <th style="font-size:15px; text-align: center; width: 20%;">PROFIT/LOSS</th>
		  </tr>
		  <tr>
		    <td style="font-size:20px; text-align: center;" class="blue-box"><?php echo $_REQUEST['symbol']?></td>
		    <td style="font-size:20px; text-align: center;" class="blue-box"><?php echo $_REQUEST['currency']?></td>
		    <td style="font-size:20px; text-align: center;" class="yellow-box"><?php echo $_REQUEST['symbol']."/".$_REQUEST['currency']?></td>
		    <td style="font-size:20px; text-align: center;" class="yellow-box"><?php echo $_REQUEST['current_price_excel']?></td>
		    <td style="font-size:20px; text-align: center;" class="yellow-box"><?php echo $_REQUEST['total_gain_loss_val']?></td>
		  </tr>
		</table>
     </div>

<br /><br /><br />


		<table style="width:35%; border:none; margin-top: 40px;">
		  <tr style="font-size: 20px;">
		    <th style="font-weight: 200; border:none; width:35%;">
		       <span style="float:right; ">Latest Top 80%</span> </th>
		    <th class="blue-box" style="width: 25%;   border: 1px solid black;"><?php echo $_REQUEST['current_hight']?></th>
		    
		  </tr>

		  <tr style="font-size: 20px;">
		    <th style="font-weight: 200;  border:none; width:35%;">
		       <span style="float:right; ">Your Total Investment</span> </th>
		    <th class="blue-box" style="width: 25%; border: 1px solid black;"><?php echo $_REQUEST['investment']?></th>
		   
		  </tr>
		</table>

<br /><br /><br />
		<table style="margin-top: 40px; text-align: center;">

			<tr class="green-box" style="font-size: 20px; ">
		    <th style="">Entry levels</th>
		    <th style="">Entry Price</th>
		    <th>Investment</th>
		    <th>% of the total investment</th>
		    <th>Number of token you buy</th>
		    <th>Total number of token you hold</th>
		    <th>Average price / token</th>
		  </tr>

		  <?php echo $_REQUEST['section1'];?>	
		</table>
<br /><br /><br />

		<table style="width:30%; border:none; margin-top: 40px;">
		  <tr class="green-box" style="font-size: 20px;">
		    <th style="font-weight: 100;"> First Entry in %</th>
		    <th style="font-weight: 100;">Entry Sum</th>
		  </tr>

		  <tr style="font-size: 20px;">
		  	<th class="blue-box" style="text-align:center;">-<?php echo $_REQUEST['excel_entery_tbl_level1']?>%</th>
		    <th class="yellow-box"><?php echo $_REQUEST['excel_entery_tbl_invest1']?></th>  
		  </tr>
		</table>

<br /><br /><br />		

		<div style="width:100%; float:left; margin-top:20px;">
			<h1 style="float:left;">STRATEGY</h1>
<br /><br />

		<table style="border:none; margin-top: 80px; float: left;">
		  <tr style=" ">
		    <td class="green-box">Return on invested money: </td>	
		    <td style="background-color: #fff2cc;"><?php echo $_REQUEST['result_val']?></td>
		    <th style="border:none;"></th>	 
		    <td class="green-box">Profit + Investment </td>
		    <th style="border:none;"></th>
		    <td class="green-box">Exchange Fee %</td>		      
		  </tr>

		  <tr style="font-size: 20px;">
		  	<td class="green-box" style="text-align:center;">Total Profit/ Loss: </td>
		  	<td style="background-color: #fff2cc;"><?php echo $_REQUEST['total_gain_loss_val']?></td>
		  	<th style="border:none;"></th>	 
		    <td style="background-color: #fff2cc;"><?php echo $profit_investment; ?></td>
		    <th style="border:none;"></th>
		    <td class="blue-box">0.50</td>
		  </tr>
		</table>
		</div>
<br /><br /><br />

	<table>
		<tr> 
			<td width="70%">
				<table style="margin-top:40px; float:left; width: 100%; text-align: center; font-size: 16px;">
					<tr class="green-box">
						<td>Date</td>
						<td>Invested money</td>
						<td>Real Amount</td>
						<td>Entry Price</td>
						<td>Shares</td>
						<td>Cost</td>		    
					</tr>

					<?php echo stripcslashes($_REQUEST['section2']);?>
				</table>
			</td>
			<td  width="30%" style="padding: 0; margin: 0; ">
				<table style="margin-top: 40px; float:left; width: 100%; text-align: center; border: 1px solid #0000; font-size: 16px; ">
					<tr class="green-box">
						<td>Total Invested</td>
						<td>Total amount of shares</td>
					</tr>
					<tr class="yellow-box">
						<td><?php echo $_REQUEST['total_invested_val'];?></td>
						<td><?php echo $_REQUEST['total_amt_share_val'];?></td>
					</tr>
					<tr class="green-box">
						<td>Average Price</td>
						<td>Difference in Price</td>
					</tr>
					<tr class="yellow-box">
						<td><?php echo $_REQUEST['avg_price_val'];?></td>
						<td><?php echo $_REQUEST['differance_in_price_val'];?></td>
					</tr>					
				</table>
			</td>
		</tr>
	</table>	
		  
	</body>