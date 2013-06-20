<?php
$iPlanTransactionId = $_REQUEST['iPlanTransactionId'];
$eTransactionStatus = $_REQUEST['eTransactionStatus'];
$tComment = $_REQUEST['tComment'];
//$tCommentDate = $_REQUEST['dCommentDate'];
$eNotification = $_REQUEST['eNotification'];
$Data = array();

if($iPlanTransactionId != ''){
	
	$Data['eNotification']=$eNotification;
	$Data['tComment']=$tComment;
	//$tCommentDate=  mktime(0,0,0,date("m"),date("d"),date("Y"));
	$date=date("Y/m/d");
	$Data['dCommentDate']=$date;
	$Data['iPlanTransactionId']=$iPlanTransactionId;
	$id = $obj->MySQLQueryPerform("plan_comment",$Data,'insert');
	 //$msg='success';
	
}
if($iPlanTransactionId != ''){
	$data['eTransactionStatus']=$eTransactionStatus;
	$iPlanTransactionId = $_REQUEST['iPlanTransactionId'];
	$where = " iPlanTransactionId = '".$iPlanTransactionId."'";
	$sql ="UPDATE `plan_transaction` SET  eTransactionStatus =  '".$eTransactionStatus."' WHERE  $where";
	$res = $obj->sql_query($sql);
	//echo $res;exit;
	 
}

	$comment = "SELECT * FROM `plan_comment` WHERE iPlanTransactionId='".$iPlanTransactionId."' AND iCommentId='".$id."'";
	$db_comment = $obj->MySQLSelect($comment);
	$date = $db_comment[0]['dCommentDate'];
	$db_comment[0]['dCommentDate'] = date("dS-M-Y",strtotime($date));
	
	$sql = "SELECT * FROM `plan_transaction` WHERE iPlanTransactionId='".$iPlanTransactionId."' ";
	$db_plan_transaction = $obj->MySQLSelect($sql);
	
	$sql_res = "SELECT * FROM members WHERE iMemberId='".$db_plan_transaction[0]['iMemberId']."' ";
	$db_user = $obj->MySQLSelect($sql_res);

	$sqll = "SELECT * FROM `plan_transaction` WHERE iPlanTransactionId='".$iPlanTransactionId."' ";
        $db_plan_transactiondetail = $obj->MySQLSelect($sqll);
	
	$sqls = "SELECT * FROM `store_plan` WHERE iStorePlanId='".$db_plan_transactiondetail[0]['iPlanId']."' ";
        $db_store = $obj->MySQLSelect($sqls);
	
	$db_plan_transactiondetail[0]['vCardNo'] = substr_replace($db_plan_transaction[0]['vCardNo'], str_repeat('X', strlen($db_plan_transaction[0]['vCardNo']) - 4), 0, -4);
	
if($eNotification == 'Yes'){
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= 'From: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
			'Reply-To: myqme.com <bcharlemagne@qmemedia.com>'. "\r\n".
			'Return-Path: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
			'X-Mailer: PHP/' . phpversion();
                        
        $Subject = "Your Plan Upgrade Information.";
        $htmlMail .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
							 <title>'.$Subject.'</title>
					</head>
					<body>
					<div style="padding: 12px; width:610px;">
							
							 <table width="610" cellspacing="0" cellpadding="0" border="0" style="border:3px solid #009319">
								<tbody>
								<tr>
								    <td align="left"><img src="'.$admin_url.'/public_html/images/logo.png" /></td>          
								</tr>
								<tr>
								    <td>
									<table width="90%" cellspacing="0" cellpadding="0" border="0" align="center">
									<tbody>
									    <tr>
										<td>
										    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
											<tbody>
											<tr>
											    <td style="padding-left:5px">
											     Dear'.$db_user[0]["vName"].' </td>
											</tr>
											<tr>
											    <td>
											     &nbsp;</td>
											</tr>
											<tr>
											    <td style="padding-left:5px">
											     Thank you for upgrade your plan at MYQme.com .</td>
										       </tr>
											<tr>
											    <td colspan="3">
												<table width="666" cellspacing="2" cellpadding="2" border="0" style="min-height:auto">
												    <tbody>
												    <tr>
													<td colspan="3">
														<div style="font-size:18px;color:#000000;">Below is Your Plan Upgrade Infromation.</div>
													</td>
												    </tr>
												    <tr>
													<td colspan="3">Your Transation Refrence No : '.$db_plan_transaction[0]['vTransaction'].'</td>
												    </tr>
												    <tr>
													<td>Your Plan going to '.$db_plan_transaction[0]['eTransactionStatus'];
													if($db_plan_transaction[0]['eTransactionStatus'] == "Success"){
														$htmlMail .= ', So please add item in Your Store section.';
													}
													else{
														$htmlMail .= ', So please check in payment inssue.';
													}
													$htmlMail .= '</td>
												    </tr>
												    <tr>
													<td height="50" colspan="3">
														<div style="font-size:18px;color:#000000;">Below is the Plan Information :</div>
														<div style="font-size:12px;color:#000000;">Plan Name :&nbsp;'.$db_store[0]['vStorePlanName'].'</div>
														<div style="font-size:12px;color:#000000;">Plan Price :&nbsp;'.$db_store[0]['fPrice'].'</div>
														<div style="font-size:12px;color:#000000;">Plan status :&nbsp;'.$db_plan_transaction[0]['eTransactionStatus'].'</div>
														<div style="font-size:12px;color:#000000;">Comment :&nbsp;'.$db_comment[0]['tComment'].'</div>
													</td>
												    </tr>
												    <tr>
													<td colspan="3">
													<b>Kind Regards</b><br><br>
													<b><a target="_blank" href="mailto:myqme@myqme.com">myqme@myqme.com</a></b></td>
												    </tr>
												    </tbody>
												</table>
											    </td>
											</tr>
											</tbody>
										    </table>
										    <p>&nbsp;</p>
										</td>
									    </tr>
									</tbody>
									</table>
								    </td>
								</tr>
								</tbody>
							     </table>
							<div class="yj6qo"></div>
							<div class="adL"></div>
					</div>
					</body>
				</html>';
$body = $htmlMail;
//echo $body;exit;
$To = $db_user[0]['vEmail'];
$res = @mail($To,$Subject,$body,$headers);
}

$comment = "SELECT * FROM `plan_comment` ORDER BY iCommentId DESC";
$db_data = $obj->MySQLSelect($comment);
for($i=0;$i<count($db_data);$i++){
	$db_data[$i]['dCommentDate'] = date("dS-M-Y",strtotime($db_data[$i]['dCommentDate']));
}
$html_new = '';
$html_new .='<div class="administator_table">
		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
		 <th width="50%" style="border-right:#BCBDC0 solid 1px;">Comment</th>
		 <th width="25%" style="border-right:#BCBDC0 solid 1px;">Date</th>
		 <th width="25%" style="border-right:#BCBDC0 solid 1px;">Notification </th>
		</tr>
	       </table>';
			
		$html_new .= '<div style="overflow-y:scroll; height:129px; "><table cellpadding="0" cellspacing="0" width="100%">';
			if(count($db_data) != 0)
			{
			$html_new .= '<tbody >';
			
			for($i=0;$i<count($db_data);$i++)
			{
				$html_new .= '<tr>
					<td width="229px" style="border-right : #BCBDC0 solid 1px; padding-left:10px;">'.$db_data[$i]['tComment'].'</td>
					<td style="border-right : #BCBDC0 solid 1px; padding-left:10px;" width="110px">'.$db_data[$i]['dCommentDate'].'</td>
					<td style="border-right : #BCBDC0 solid 1px; padding-left:10px;">';
					if($db_data[$i]['eNotification'] == "Yes"){
					$html_new .= '<img src="'.$admin_url.'/public_html/images/cp/icons/icon_success.png" title="Yes" />';
					}else{
					$html_new .= '<img src="'.$admin_url.'/public_html/images/cp/icons/icon_cross.png" title="No" /> </td>';
					}
				$html_new .= '</tr>';
			}
			$html_new .= '</tbody>';
			}
		$html_new .= '</table></div></div>';
echo $html_new;exit;
?>