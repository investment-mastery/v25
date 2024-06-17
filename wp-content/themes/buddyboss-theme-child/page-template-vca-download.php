<?php
/*
 * Template name: VCA Download Excel
 *
 */
ob_clean();
// echo "<pre>";
// print_r($_REQUEST);
// exit;
header("Content-Type: text/plain; charset=utf-8"); 
header('Content-disposition: attachment; filename='.$_REQUEST['strategy_name'].'_'.date('d-M-Y').'.xls');  
?>

<style type="text/css">

table, tr, td {
	border: 1px solid black;
	border-collapse: collapse;
}
tr,td{
	padding: 15px 20px;
	font-size: 20px;
	text-align: center;
	vertical-align: middle;
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
.date_box{
	display: none;
}
</style>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<body style="font-family: 'Arial';">
	<br/>&nbsp;<br/>
    <div style="width:100%; float:left; padding-bottom: 30px;">
	    <table style="width:40%; border: 0px;">	    	
			<tr style="border: 0px;">
				<td colspan="3" style="border: 0px;font-size:34px;"><span style="font-size:34px;">VCA Calculator for Stocks</span></td>
				<td style="border: 0px;text-align: center;"><span style="float:right; font-size: 22px;text-align: center;">Currency</span></td>
			</tr>
			<tr style="vertical-align: middle;">
			    <td style="background-color: #b6d7a8; width:35%; text-align: right; height: 55px;">
			       <span  class="green-box" style="float:right; font-size:28px;">Stock:</span> </td>
			    <td colspan="2" class="blue-box" style="width: 45%; font-size:28px; text-align: center; "><?php echo $_REQUEST['symbol']?></td>
			    <td class="blue-box" style="font-size:28px;text-align: center;"><?php echo $_REQUEST['currency']?></td>
			</tr>
		</table>
    </div>

	<br/><br/>
	<table style="width:24%; border:none; margin-top: 40px;">
		<tr style="font-size: 20px; height: 40px; vertical-align: middle;">
		    <td style="font-weight: 200; border:none; width:35%; text-align:right;">
		       <span style="text-align:right; font-size:18px; float: right;">Current High</span> </td>
		    <td class="blue-box" style="width: 25%; border: 1px solid black; font-size:18px; text-align: center;"><?php echo $_REQUEST['current_hight']?></td>
		</tr>
		<tr style="font-size: 20px; height: 40px; vertical-align: middle;">
		    <td style="font-weight: 200;  border:none; width:35%;">
		       <span style="text-align:right; font-size:18px; ">Your Total Investment</span> </td>
		    <td class="blue-box" style="width: 25%; border: 1px solid black; font-size:18px; text-align: center;"><?php echo $_REQUEST['investment']?></td>		   
		</tr>
	</table>

	<br/><br/>
	<table style="margin-top: 40px; text-align: center;">
		<tr class="green-box" style="font-size: 16px; text-align: center; vertical-align: middle;">
			<td>Entry levels</td>
			<td>Entry Price</td>
			<td>Investment</td>
			<td>Percent of the total amount</td>
			<td>Number of Shares you buy</td>
			<td>Accumulated amount of Shares</td>
			<td>Average Share Price</td>
			<td>Sell after 15 %</td>
			<td>Sell after 20 %</td>
		</tr>
		<?php echo str_replace('\"', '', $_REQUEST['section1']);?>	
	</table>

	<br/><br/>
	<table style="width:30%; border:none; margin-top: 40px;">
		<tr class="green-box" style="font-size: 18px;">
		    <td>First Entry Price</td>
		    <td>Entry Sum</td>
		    <td>No of shares</td>
		</tr>
		<tr style="font-size: 18px; text-align:center;">
		  	<td class="blue-box">20.00</td>
		    <td class="yellow-box"><?php echo $_REQUEST['total_invested_val'];?></td>			
		    <td class="yellow-box"><?php echo floor($_REQUEST['investment'] / 20);?></td>
		</tr>
	</table>

	<br/><br/>
	<div style="width:80%;">
		<table style="width:30%; border:none; margin-top: 40px; float:right; font-size: 20px;">
			<tr class="green-box" >
			    <td style="width:40%;">Current Share Price</td>	
			    <td>Ticker</td>	    
		  	</tr>
		  	<tr style="font-size: 20px;">
			  	<td style="background-color: #fff2cc; text-align:center;"><?php echo $_REQUEST['current_share_price']?></td>
			  	<td style="background-color: #fff2cc;"><?php echo $_REQUEST['symbol']?></td>
		  	</tr>
		</table>
	</div>

	<br/><br/>
	<div style="width:60%; float:left; margin-top:20px;">
		<table style="border: 0px;">
			<tr>
				<td style="border: 0px; vertical-align: middle;"> <span style="text-align:left; font-size: 25px;">STRATEGY</span></td>
				<td>
					<table style="border:none; margin-top: 40px; float:right;  font-size: 16px;">
						<tr>
							<td class="green-box">Result: </td>	
							<td style="background-color: #fff2cc;"><?php echo $_REQUEST['result_val'];?></td>
						</tr>
						<tr>
							<td class="green-box" style="text-align:center;">Total Gain/Loss: </td>
							<td style="background-color: #fff2cc;"><?php echo str_replace('d-none',' ',$_REQUEST['total_gain_loss_val']);?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>

	<br/><br/>
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
