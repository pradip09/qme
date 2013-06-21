<?php
	
	$vName = $_REQUEST['vName'];
	$vMail = $_REQUEST['vMail'];
	$vPhoneNo = $_REQUEST['vPhoneNo'];
	$tMessage = $_REQUEST['tMessage'];
	$iProductId = $_REQUEST['iProductId'];
	    
	$sql_data = "select r.*, p.vPropertyType from product_real_estate r left JOIN real_estate_property p ON r.iPropertyTypeId = p.iPropertyTypeId where iProductId='".$iProductId."'";        
	$db_allrealestate = $obj->MySQLSelect($sql_data);
    
	$sql_user = "select * from members where  iMemberId='".$db_allrealestate[0]['iMemberId']."' ";
	$db_user = $obj->MySQLSelect($sql_user);
	
	//headers information
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= 'From: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
			'Reply-To: myqme.com <bcharlemagne@qmemedia.com>'. "\r\n".
			'Return-Path: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
			'X-Mailer: PHP/' . phpversion();

	$Subject = "Inquiry about this property";
	$Subject_Client="You send Inquiry about this property";
	$htmlMail .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
					  <head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
							 <title>'.$Subject.'</title>
							 
					  </head>
					  <body>
					<div style="background: none repeat scroll 0 0 #033266; padding: 12px; width:610px;">
							
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%;font-family:Verdana,Arial,Sans-Serif;font-size:12px;color:white">
								<tbody><tr>
									<td style="width:260px;padding-bottom:10px;padding-left:10px">
										<!--<img src="'.$site_url.'/wp-content/themes/hacienda/images/email-logo.png">-->
									</td>
									<td style="text-align:right;padding-right:10px">
										<h1 style="color:#fff;font-family:arial;padding:5px 0 3px 0;margin:0;font-weight:normal;font-size:25px;font-family: Trebuchet MS;">
											Inquiry about this property</h1>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="min-height:40px;background:#FFFFFF;margin:15px 0;padding:20px;font-family: Trebuchet MS;">
										<div style="color:#000000;">
										Dear Administrator,<br>
										<br>
										Below is the  Inquiry about this property with Ref no :&nbsp;<span style="color:#AB273D; font-size:15px;">'.$db_allrealestate["!reference"].'</span>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="min-height:15px">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td colspan="2" style="background:#FFFFFF;margin:15px 0;padding:20px;min-height:40px;font-family: Trebuchet MS;">
										<div style="font-size:18px;color:#000000;">Below is the customer Information :</div>
										<div style="font-size:12px;color:#000000;">Customer Name :&nbsp;'.$vName.'</div>
										<div style="font-size:12px;color:#000000;">Customer Email :&nbsp;'.$vMail.'</div>
										<div style="font-size:12px;color:#000000;">Customer Phone No :&nbsp;'.$vPhoneNo.'</div>
										<div style="font-size:12px;color:#000000;">Customer Message :&nbsp;'.strtr($tMessage, "\r\n" , "  " ).'</div>
									</td>
								</tr>
								
								<tr>
									<td colspan="2" style="min-height:15px">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td colspan="2" style="background:#FFFFFF;margin:15px 0;padding:20px;min-height:140px">
										<table border="0" cellpadding="0" cellspacing="0" style="width:570px;font-family:Verdana,Arial,Sans-Serif;font-size:12px;color:white">
											<tbody><tr style="vertical-align:top">
												<td style="width:200px">';
                                               //echo $tconfig["tsite_url"]/uploads/store/4/$db_allrealestate[0][iProductId];exit;
                                              
													if($totphoto == 1){
													 $htmlMail .= '<a href="'.$db_allrealestate[0]["vImage"].'" target="_blank"><img src="'.$tconfig["tsite_upload_images_store"].'4/'.$db_allrealestate[0]['iProductId'].'/'.$db_allrealestate[0]["vImage"].'" style="border-style:none; width:200px; height:140px;"/></a>';  
													}else{
													  
													 $htmlMail .= '<a href="'.$db_allrealestate[0]["vImage"].'" target="_blank"><img src="'.$tconfig["tsite_upload_images_store"].'4/'.$db_allrealestate[0]['iProductId'].'/'.$db_allrealestate[0]["vImage"].'" style="border-style:none; width:200px; height:140px;"/></a>';  
													}
                                                   
												$htmlMail .= '</td>
												<td style="width:355px;padding-left:15px;vertical-align:top">
													<table border="0" cellpadding="0" cellspacing="0" style="width:355px;font-family:Verdana,Arial,Sans-Serif;font-size:12px;color:white">
														<tbody>
                                                        <tr>
															<td style="font-size:18px;color:#FF0000;font-family: Trebuchet MS;">
																'.$db_allrealestate[0][vPropertyType]." ".in." ".$db_allrealestate[0][vCity].'
															</td>
														</tr>                                                                                                                                                                                                                       
                                                        
														<tr>
															<td style="padding-top:10px;padding-bottom:10px;font-size:18px;color: #000000;font-family: Trebuchet MS;">
																 '.number_format($db_allrealestate[0]['fAskingPrice']).' 
															</td>
														</tr>
														<tr>
															<td style="padding-top:10px;padding-bottom:10px;font-size:12px;color: #000000;font-family: Trebuchet MS;">
																 '.strtr($db_allrealestate[0]['tDescription']|stripslashes, "\r\n" , "  ").' 
															</td>
														</tr>
														<tr>
															<td style="color: #000000;font-size:14px;font-family: Trebuchet MS;">
																'.$db_allrealestate[0]['vCountry'].', '.$db_allrealestate[0]["vState"].', '.$db_allrealestate[0]["vCity"].', '.number_format($db_allrealestate[0]["iBedrooms"]).' Bed Rooms, '.number_format($db_allrealestate[0]["iBaths"]).' Bath Rooms,'.number_format($db_allrealestate[0]["fSqft"]).' Size,'.number_format($db_allrealestate[0]["fLotSize"]).' Lot Size,'.number_format($db_allrealestate[0]["iZipCode"]).'
															</td>
														</tr>
														
													</tbody></table>
												</td>
											</tr>
										</tbody></table>
									</td>
								</tr>

								<tr>
									<td colspan="2" style="background-color:#FFFFFF;padding:2px 4px 0px 4px;margin-top:10px;min-height:8px">
									</td>
								</tr>
								
							</tbody></table><div class="yj6qo"></div><div class="adL">
						</div></div>
					</body>
				</html>';
				
				
				$htmlMail_Client .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
					  <head>
							<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
							 <title>'.$Subject_Client.'</title>
							 
					  </head>
					  <body>
					<div style="background: none repeat scroll 0 0 #033266; padding: 12px; width:610px;">
							
							<table border="0" cellpadding="0" cellspacing="0" style="width:100%;font-family:Verdana,Arial,Sans-Serif;font-size:12px;color:white">
								<tbody><tr>
									<td style="width:260px;padding-bottom:10px;padding-left:10px">
										<!--<img src="'.$site_url.'/wp-content/themes/hacienda/images/email-logo.png">-->
									</td>
									<td style="text-align:right;padding-right:10px">
										<h1 style="color:#fff;font-family:arial;padding:5px 0 3px 0;margin:0;font-weight:normal;font-size:25px;font-family: Trebuchet MS;">
											Inquiry about this property</h1>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="min-height:40px;background:#FFFFFF;margin:15px 0;padding:20px;font-family: Trebuchet MS;">
										<div style="color:#000000;">
										Dear Administrator,<br>
										<br>
										Below is the  Inquiry about this property with Ref no :&nbsp;<span style="color:#AB273D; font-size:15px;">'.$db_allrealestate["!reference"].'</span>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="min-height:15px">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td colspan="2" style="background:#FFFFFF;margin:15px 0;padding:20px;min-height:40px;font-family: Trebuchet MS;">
										<div style="font-size:18px;color:#000000;">Below is the customer Information :</div>
										<div style="font-size:12px;color:#000000;">Customer Name :&nbsp;'.$vName.'</div>
										<div style="font-size:12px;color:#000000;">Customer Email :&nbsp;'.$vMail.'</div>
										<div style="font-size:12px;color:#000000;">Customer Phone No :&nbsp;'.$vPhoneNo.'</div>
										<div style="font-size:12px;color:#000000;">Customer Message :&nbsp;'.strtr($tMessage, "\r\n" , "  " ).'</div>
									</td>
								</tr>
								
								<tr>
									<td colspan="2" style="min-height:15px">
										&nbsp;
									</td>
								</tr>
								<tr>
									<td colspan="2" style="background:#FFFFFF;margin:15px 0;padding:20px;min-height:140px">
										<table border="0" cellpadding="0" cellspacing="0" style="width:570px;font-family:Verdana,Arial,Sans-Serif;font-size:12px;color:white">
											<tbody><tr style="vertical-align:top">
												<td style="width:200px">';
                                               //echo $tconfig["tsite_url"]/uploads/store/4/$db_allrealestate[0][iProductId];exit;
                                              
													if($totphoto == 1){
													 $htmlMail_Client .= '<a href="'.$db_allrealestate[0]["vImage"].'" target="_blank"><img src="'.$tconfig["tsite_upload_images_store"].'4/'.$db_allrealestate[0]['iProductId'].'/'.$db_allrealestate[0]["vImage"].'" style="border-style:none; width:200px; height:140px;"/></a>';  
													}else{
													  
													 $htmlMail_Client .= '<a href="'.$db_allrealestate[0]["vImage"].'" target="_blank"><img src="'.$tconfig["tsite_upload_images_store"].'4/'.$db_allrealestate[0]['iProductId'].'/'.$db_allrealestate[0]["vImage"].'" style="border-style:none; width:200px; height:140px;"/></a>';  
													}
                                                   
												$htmlMail_Client .= '</td>
												<td style="width:355px;padding-left:15px;vertical-align:top">
													<table border="0" cellpadding="0" cellspacing="0" style="width:355px;font-family:Verdana,Arial,Sans-Serif;font-size:12px;color:white">
														<tbody>
                                                        <tr>
															<td style="font-size:18px;color:#FF0000;font-family: Trebuchet MS;">
																'.$db_allrealestate[0][vPropertyType]." ".in." ".$db_allrealestate[0][vCity].'
															</td>
														</tr>                                                                                                                                                                                                                       
                                                        
														<tr>
															<td style="padding-top:10px;padding-bottom:10px;font-size:18px;color: #000000;font-family: Trebuchet MS;">
																 '.number_format($db_allrealestate[0]['fAskingPrice']).' 
															</td>
														</tr>
														<tr>
															<td style="padding-top:10px;padding-bottom:10px;font-size:12px;color: #000000;font-family: Trebuchet MS;">
																 '.strtr($db_allrealestate[0]['tDescription']|stripslashes, "\r\n" , "  ").' 
															</td>
														</tr>
														<tr>
															<td style="color: #000000;font-size:14px;font-family: Trebuchet MS;">
																'.$db_allrealestate[0]['vCountry'].', '.$db_allrealestate[0]["vState"].', '.$db_allrealestate[0]["vCity"].', '.number_format($db_allrealestate[0]["iBedrooms"]).' Bed Rooms, '.number_format($db_allrealestate[0]["iBaths"]).' Bath Rooms,'.number_format($db_allrealestate[0]["fSqft"]).' Size,'.number_format($db_allrealestate[0]["fLotSize"]).' Lot Size,'.number_format($db_allrealestate[0]["iZipCode"]).'
															</td>
														</tr>
														
													</tbody></table>
												</td>
											</tr>
										</tbody></table>
									</td>
								</tr>

								<tr>
									<td colspan="2" style="background-color:#FFFFFF;padding:2px 4px 0px 4px;margin-top:10px;min-height:8px">
									</td>
								</tr>
								
							</tbody></table><div class="yj6qo"></div><div class="adL">
						</div></div>
					</body>
				</html>';
				
				$body_client = $htmlMail_Client;
				$body = $htmlMail;
				$To = $db_user[0]['vEmail'];
				$res = @mail($To,$Subject,$body,$headers);
				//$res1 = @mail($Client,$Subject_Client,$body_client,$headers);
				//echo $res; exit;
				$msg = "Your Inquiry has been sent successfully.";
				echo $msg;exit;	
?>
