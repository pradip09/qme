<?php

    $iPlanTransactionId = $_REQUEST['iPlanTransactionId'];
    $admin_url = $_REQUEST['admin_url'];
    
	
	if($iPlanTransactionId !='')
	{		
		$sql_Plan = "SELECT p.*,m.vName,m.vEmail,s.vStorePlanName,s.fPrice,s.iPoint,s.item_limit FROM plan_transaction AS p LEFT JOIN members AS m on m.iMemberId = p.iMemberId LEFT JOIN store_plan s on p.iPlanId = s.iStorePlanId WHERE iPlanTransactionId='".$iPlanTransactionId."'";
		$db_plan = $obj->MySQLSelect($sql_Plan);
		$db_plan[0]['vCardNo'] = substr_replace($db_plan[0]['vCardNo'], str_repeat('X', strlen($db_plan[0]['vCardNo']) - 4), 0, -4);
		$db_plan[0]['dTransactionDate'] = date('dS-M-Y',strtotime($db_plan[0]['dTransactionDate']));
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="<?php echo $admin_url; ?>/public_html/stylesheets/cp/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $admin_url; ?>/public_html/stylesheets/cp/wysiwyg.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $admin_url; ?>/public_html/stylesheets/cp/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $admin_url; ?>/public_html/stylesheets/cp/theme/green/styles.css" rel="stylesheet" type="text/css" />	
</head>
<body>
<div id="content">
	<form id="frmadd" name="frmadd" action="index.php?file=pt-plan_transaction_a" enctype="multipart/form-data" method="post">
	<input type="hidden" id="" name="" value="" />
	<div class="member_reapt_box">
		<div class="member_info_title">Member Info</div>
		<div class="mem_reapt_pad">
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td><label>Name</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['vName']; ?></td>
				</tr>
				<tr>
					<td><label>Email</label>
						<span id="order_status">: <?php echo $db_plan[0]['vEmail']; ?></span></td>
				</tr>
			</table>
		</div>
	</div>
	
	<div class="member_reapt_box">
		<div class="member_info_title">Card Information</div>
		<div class="mem_reapt_pad">
			<table width="100%" cellspacing="0">
				<tbody>
				<tr>
					<td><label>Card Type</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['vPaymentType']; ?></td>
				</tr>
				<tr>
					<td><label>Card Number</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['vCardNo']; ?></td>
				</tr>
				<tr>
					<td><label>CVV Number</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['vCCV']; ?></td>
				</tr>
				<tr>
					<td><label>Expaire Date</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['dExpiaryDate']; ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="member_reapt_box" style="margin-top: -54px;">
		<div class="member_info_title">Payment Information</div>
		<div class="mem_reapt_pad">
			<table width="100%" cellspacing="0">
				<tbody>
				<tr>
					<td><label>Payment Date</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['dTransactionDate']; ?></td>
				</tr>
				<tr>
					<td><label>Payment Status</label>
						<span class="dou_colan">:</span><?php echo $db_plan[0]['eTransactionStatus']; ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<div style="clear:both"></div>
	
	<div class="chapter_pop_table">
		<table width="100%" cellspacing="0" border="0" cellpadding="0">
			<tbody><tr>
				<th width="120px" class="administrator_heading_tbl">Plan Name</th>
				<th width="190px" class="administrator_heading_tbl">Plan Price</th>
				<th width="107px" class="administrator_heading_tbl">Item Limit</th>
				<th width="87px" class="administrator_heading_tbl">Amount</th>
			</tr>
			<tr>
				<td width="120px" class="chapter_pop administrator_right_tbl"><?php echo $db_plan[0]['vStorePlanName']; ?></td>
				<td width="190px" class="chapter_pop administrator_right_tbl">$ <?php echo $db_plan[0]['fPrice']; ?></td>
				<td width="107px" class="chapter_pop administrator_right_tbl"><?php echo $db_plan[0]['item_limit']; ?></td>
				<td width="41px" class="chapter_pop administrator_right_tbl">$ <?php echo $db_plan[0]['fPrice']; ?></td>
			</tr>
			<tr>
				<td valign="top" width="73%" class="term_condition chapter_pop" rowspan="3" style="padding-left: 20px;" colspan="2"><div class="termcon_div" style="margin-left: 435px;"> <strong></strong><br>
						<br>
						<strong></strong><br>
						 </div></td>
				<td valign="top" width="27%" colspan="3" class="aubtotal chapter_pop" style="height:48px;"><div style="width:175px;" class="total_text"><strong>Total Amount :</strong> </div>
					<div class="total_price">$ <?php echo $db_plan[0]['fPrice']; ?></div>
					<div style="width:175px;" class="total_text"><strong>Payment Received :</strong> </div>
					<div class="total_price">$ <?php echo $db_plan[0]['fPrice']; ?></div>
				</td>
				
				
			</tr>
		</tbody></table>
	</div>
	
	<div style="clear:both"></div>
		<p>&nbsp;</p>
	<div align="center">
		<input type="button" value="Close" class="btn" title="Back" onclick="window.close();"/>
		<input type="button" value="Print" class="btn" title="Print" onClick="window.print();"/>
		<!--<input type="submit" value="Send Email" class="btn" title="Send Email"/>
		<input type="button" value="Print" class="btn" title="Print" onClick="javascript:popup_invoice();"/>-->
	</div>
	</form>
	<div style="clear:both"></div>

</div>
</body>
</html>
<?php
exit;
?>