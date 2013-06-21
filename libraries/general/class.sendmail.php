<?php

Class SendPHPMail
{	
	
	function Send($EmailCode,$SendType,$ToEmail,$bodyArr,$postArr)
	{ 
		global $obj,$MAIL_FOOTER,$SITE_NAME,$EMAIL_ADMIN,$site_url,$COMPANY_NAME;
		
		$sql = "select * from system_email where vEmailCode='".$EmailCode."'";
		$email_info = $obj->MySQLSelect($sql);
		//echo $sql;exit;
		//headers information
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= 'From: '.$COMPANY_NAME.' <'.trim($EMAIL_ADMIN).'>' . "\r\n".
					'Reply-To: '.$COMPANY_NAME.' <'.trim($EMAIL_ADMIN).'>'. "\r\n".
					'Return-Path: '.$COMPANY_NAME.' <'.trim($EMAIL_ADMIN).'>' . "\r\n".
					'X-Mailer: PHP/' . phpversion();

		$Subject = strtr($email_info[0]["vEmailSubject"], "\r\n" , "  " );
		$this->body = $email_info[0]['tEmailMessage'];

		$this->body = str_replace($bodyArr,$postArr, $this->body);

		$To = stripcslashes($ToEmail);
		
		$htmlMail = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
					      <head>
					            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
					             <title>'.$this->xheaders['Subject'].'</title>
					             <style>
	                            	body
	                                {color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;}
                        </style>
					      </head>
					      <body>
					      <table width="610" border="0" cellspacing="0" cellpadding="0" style="border:3px solid #009319;">
                <tr>
                    <td align="left"><img src="'.$site_url.'/public/images/logo2.png" alt=""/></td>                  
                </tr>
                <tr>
                    <td>
                        <table width="90%" border="0" align="center" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>'.$this->body.'</td>
                        </tr>
                        </table>
                    </td>
                 </tr>
                 </table>
					      </body>
					       </html>';
		  $this->body=$htmlMail;
		//echo $htmlMail;
		 
		//if($_SERVER["HTTP_HOST"] != "192.168.32.150"){
		 
			$res = @mail($To,$Subject,$this->body,$headers,'-fbentleyc@myqme.com');
		//}
		return $htmlMail;
	}		
	function SendMail($From, $To,$Subject,$vBody,$name)
	{
		global $obj,$MAIL_FOOTER,$SITE_URL,$SITE_TITLE;
		//headers information
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= 'From: '.trim($From).' <'.trim($From).'>' . "\r\n".
					'Reply-To: '.trim($From).' <'.trim($From).'>'. "\r\n".
					'Return-Path: '.trim($From).' <'.trim($From).'>' . "\r\n".
					'X-Mailer: PHP/' . phpversion();
		$Subject = strtr($Subject, "\r\n" , "  " );
		$this->body = $vBody;
		$ToEmail = $To;
		$htmlMail = '
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td>From  : '.$name.' ( '.trim($From).' )</td>
							</tr>
							<tr>
								<td>To  : '.trim($ToEmail).'</td>
							</tr>
							<tr>
								<td>Subject  : '.$Subject.'</td>
							</tr>
							<tr>
								<td>Body  : '.$this->body.'</td>
							</tr>
						</table>
					';
		##TEMPORARY COMMENT
		//$this->strTo = $this->xheaders['To'];
		
		//echo $ToEmail ."<hr>". $headers."<hr>". $this->body."<hr>".$headers;
		$this->body=$htmlMail;
		$res = @mail( $ToEmail, $Subject, $this->body, $headers);
		
		/*if($_SERVER["HTTP_HOST"] != "192.168.32.150")
			$res = @mail( $ToEmail, $Subject, $this->body, $headers);*/
		return $res;
	}
	// To Send Mail
	function SendMailFriend($From, $To,$Subject,$vBody)
	{
		//echo $From;exit;
		global $obj,$MAIL_FOOTER,$SITE_URL,$SITE_TITLE;
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= 'From: '.trim($From).' <'.trim($From).'>' . "\r\n".
					'Reply-To: '.trim($To).' <'.trim($To).'>'. "\r\n".
					'Return-Path: '.trim($From).' <'.trim($From).'>' . "\r\n".
					'X-Mailer: PHP/' . phpversion();
		$Subject = strtr($Subject, "\r\n" , "  " );
		$this->body = $vBody;
		$ToEmail = $To;
		$this->body=$vBody;
		//print_r($vBody);exit;
		//$res = @mail($ToEmail, $Subject, $this->body, $headers);
		
		//if($_SERVER["HTTP_HOST"] != "192.168.32.150")
			$res = @mail( $ToEmail, $Subject, $this->body, $headers);
			//print_r($res);exit;
		return $res;	
	}

}
?>
