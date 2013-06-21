<?php

$iRecentActivityId = $_POST['iRecentActivityId'];
$lBody = $_POST['msg_data'];
$respond_link = $_POST['respond_link'];
$iPostJobId = $_POST['iPostJobId'];

$sql = "SELECT * FROM  post_job where iPostJobId = $iPostJobId";
$job_data =$obj->MySQLSelect($sql);
$toId =$job_data[0]['iAdminId'];

$sql12 = "SELECT * FROM  administrators where iAdminId = $toId";
$mem_data12 = $obj->MySQLSelect($sql12);

$sql_admin = "select * from configurations where vName ='EMAIL_ADMIN'";
$user_admin = $obj->MySQLSelect($sql_admin);
//$EMAIL_ADMIN=$user_admin[0]['vValue'];

$iMemberId = $job_data[0]['iMemberId'];
$sql1 = "SELECT * FROM  members where iMemberId = $iMemberId";
$mem_data = $obj->MySQLSelect($sql1);


$sql_recent = "SELECT * FROM  recent_activities where iRecentActivityId = $iRecentActivityId";
$mem_recent = $obj->MySQLSelect($sql_recent);
$memid=$mem_recent[0]['iMemberId'];
$sql11 = "SELECT * FROM  members where iMemberId = $memid";
$mem_data1 = $obj->MySQLSelect($sql11);

$path = TPATH_SERVER_IMAGES;
$path = $path.'/respond_attachment';
$vSubject=$lBody;
$date = date("Y-m-d H:i:s");




if(!is_dir($path)){
        @mkdir($path, 0777);
}
if(move_uploaded_file($_FILES['Afile']['tmp_name'],$path.'/'.$_FILES['Afile']['name'])) {
   /* echo "The file ".  basename( $_FILES['Afile']['name']). 
    " has been uploaded";*/
     $file_name = $_FILES['Afile']['name'];
     $file_data = "Success";
} else{
    $file_data = '';
}

 $path_new = $path.'/'.$_FILES['Afile']['name'];

 # Open a file
  $file = fopen( $path_new, "r" );
  if( $file == false )
  {
     echo "Error in opening file";
     exit();
  }
  # Read the file into a variable
  $size = filesize($path_new);  
  $content = fread( $file, $size);
  
  # encode the data for safe transit
  # and insert \r\n after every 76 chars.
  $encoded_content = chunk_split( base64_encode($content));
  
  # Get a random 32 bit number using time() as seed.
  $num = md5( time() );

# Define the main headers.
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'From: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
		'Reply-To: myqme.com <bcharlemagne@qmemedia.com>'. "\r\n".
		'Return-Path: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
		'X-Mailer: PHP/' . phpversion();
  
$Subject = $lBody;

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
				   <td align="left"><img src="'.$site_url.'/public/images/logo.png" /></td>          
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
							   <td style="padding-left:5px">';
							   if($iPostJobId != ''){
								if($toId == 0){
								$htmlMail .=' Dear '.$mem_data[0]['vName'].',</td>';	
								}else{
								$htmlMail .=' Dear Administrator,</td>';
								
								}
								}
							    if($iRecentActivityId != ''){
								$htmlMail .=' Dear '.$mem_data1[0]['vName'].',</td>';
								}
						     $htmlMail .='  </tr>
						       <tr>
							   <td>
							    &nbsp;</td>
						       </tr>						       
						       <tr>
							   <td colspan="3">
							       <table width="666" cellspacing="2" cellpadding="2" border="0" style="min-height:auto">
								   <tbody>
								   <tr>
								       <td colspan="3">
									       <div style="font-size:18px;color:#000000;">Massage Infromation.</div>
								       </td>
								   </tr>
								   <tr>
								       <td colspan="3">Leave Your Massage : '.$lBody.'</td>
								   </tr>
                                                                   <tr>';
								   if($respond_link != ''){
								   $htmlMail .='     <td colspan="3">Attached Link : '.$respond_link.'</td>';
								   }
								  $htmlMail .='  </tr>
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
		    </div>
		    </body>
	    </html>';
$message = $htmlMail;
//echo $message;exit;

# Define the attachment section
if($file_data !='')
{
      $headers .= "Content-Type:  multipart/mixed; ";
      $headers .= "name=\"$file_name\"\r\n";
      $headers .= "Content-Transfer-Encoding:base64\r\n";
      $headers .= "Content-Disposition:attachment; ";
      $headers .= "filename=\"$file_name\"\r\n\n";
      $headers .= "$encoded_content\r\n";
      $headers .= "--$num--";
}
  
if($iPostJobId != ''){
	if($toId == 0){
	$To = $mem_data[0]['vEmail'];
	}else{
	$To =$user_admin[0]['vValue'];;
	}
}
//echo $To;exit;
if($iRecentActivityId != ''){
	$To = $mem_data1[0]['vEmail'];
}

$res = @mail($To,$Subject,$message,$headers);

if($res)
{
	echo "Message sent successfully...";
	if($iPostJobId != ''){
	if($toId != 0){
   
	$Dataa	=	array	(
				'iFromId'	=>	$_SESSION['iUserId'],
				'eFromType'	=>	'Member',
				'iToId'		=>	$toId,
				'eToType'	=>	'Admin',
				'vSubject'	=>	addslashes($vSubject),
				'lBody'		=>	$lBody,
				'dMaildate'	=>	$date,
				'eRead'		=>	0);
	$iMailId = $obj->MySQLQueryPerform("qme_inbox",$Dataa,'insert');
	}else{
		
	$Data	=	array	(
				'iFromId'	=>	$_SESSION['iUserId'],
				'eFromType'	=>	'Member',
				'iToId'		=>	$iMemberId,
				'eToType'	=>	'Member',
				'vSubject'	=>	addslashes($vSubject),
				'lBody'		=>	$lBody,
				'dMaildate'	=>	$date,
				'eRead'		=>	0);
	$iMailId = $obj->MySQLQueryPerform("qme_inbox",$Data,'insert');
	}
	
	
	$Data1	=	array	(
				'iFromId'	=>	 '',
				'eFromType'	=>	'Member',
				'iToId'		=>	$_SESSION['iUserId'],
				'eToType'	=>	'Member',
				'vSubject'	=>	addslashes($vSubject),
				'lBody'		=>	$lBody,
				'dMaildate'	=>	$date,
				'eRead'		=>	0);
	$iMailId_id = $obj->MySQLQueryPerform("qme_inbox",$Data1,'insert');
	
	if($toId != 0){
	$Data2	=	        array  (
				'iFromId'   	=>	$_SESSION['iUserId'],
				'iMailId'	=>	$iMailId_id,
				'eFromType'	=>	'Member',
				'iToId'		=>	 $toId,
				'eToType'	=>	'Admin');
	
	$iSentMailId = $obj->MySQLQueryPerform("qme_sentmails",$Data2,'insert');
	}else{
	
	$Data2	=	        array  (
				'iFromId'   	=>	$_SESSION['iUserId'],
				'iMailId'	=>	$iMailId_id,
				'eFromType'	=>	'Member',
				'iToId'		=>	 $iMemberId,
				'eToType'	=>	'Member');
	
	$iSentMailId = $obj->MySQLQueryPerform("qme_sentmails",$Data2,'insert');
	
	}
}
	
if($iRecentActivityId != ''){
		
	$Datta	=	array	(
				'iFromId'	=>	$_SESSION['iUserId'],
				'eFromType'	=>	'Member',
				'iToId'		=>	$memid,
				'eToType'	=>	'Member',
				'vSubject'	=>	addslashes($vSubject),
				'lBody'		=>	$lBody,
				'dMaildate'	=>	$date,
				'eRead'		=>	0);
	$iMailId = $obj->MySQLQueryPerform("qme_inbox",$Datta,'insert');	
		
	$Data11	=	array	(
				'iFromId'	=>	 '',
				'eFromType'	=>	'Member',
				'iToId'		=>	$_SESSION['iUserId'],
				'eToType'	=>	'Member',
				'vSubject'	=>	addslashes($vSubject),
				'lBody'		=>	$lBody,
				'dMaildate'	=>	$date,
				'eRead'		=>	0);
	$iMailId_idd = $obj->MySQLQueryPerform("qme_inbox",$Data11,'insert');	
		
	$Data22	=	        array  (
				'iFromId'   	=>	$_SESSION['iUserId'],
				'iMailId'	=>	$iMailId_idd,
				'eFromType'	=>	'Member',
				'iToId'		=>	 $memid,
				'eToType'	=>	'Member');
	
	$iSentMailId = $obj->MySQLQueryPerform("qme_sentmails",$Data22,'insert');	
		
	}
	}

else
{
   echo "Message could not be sent...";
}
exit;
?> 