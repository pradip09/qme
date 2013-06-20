<?php

$vUserName = $_POST['vUserName'];
if(isset($_POST) && $_POST !="")
{	
	$data = $_POST['data'];
	if($data['mode'] == "authenticate")
	{
	   if($vUserName =='' && $vPassword ==''){
            header("location:".$tconfig["tpanel_url"]."/index.php?file=au-login");
            exit;
	   }else{
            
            $vPassword = $generalobj->encrypt($_POST['vPassword']);
            $sql = "select * from administrators WHERE vUserName = '".$vUserName."' and vPassword = '".$vPassword."' and eStatus ='Active' ";
            $result = $obj->MySQLSelect($sql);
            
            if($result)
            {
            	$ses_varid = $result[0]["iAdminId"];
            	$ses_username = $result[0]["vUserName"];
            	$ses_fname = $result[0]["vFirstName"];
            	$ses_lname = $result[0]["vLastName"];
                $ses_email = $result[0]["vEmail"];
            	
                $_SESSION["sess_iAdminId"]=$result[0]["iAdminId"];
            	$_SESSION["sess_vUserName"]= $result[0]["vUserName"];
            	$_SESSION["sess_vFirstName"]=$result[0]["vFirstName"];
            	$_SESSION["sess_vLastName"]=$result[0]["vLastName"];
                $_SESSION["sess_vEmail"]=$result[0]["vEmail"];
                $_SESSION["sess_iGroupId"]=$result[0]["iGroupId"];
                
            	$_SESSION["sess_Name"]= $_SESSION["sess_vFirstName"]." ".$_SESSION["sess_vLastName"];
            	#------------------------------------------------------
            	# FOR LAST LOGIN LOG.
            	#------------------------------------------------------
            	$tLastLogin="NOW()";
		//echo $tLastLogin;exit;
            	$vFromIP=$_SERVER["REMOTE_ADDR"];
            	$sql_upd = "update administrators set dLastLogin=".$tLastLogin.", vFromIP='".$vFromIP."' WHERE iAdminId='".$_SESSION["sess_iAdminId"]."'";
            	$db_upd = $obj->sql_query($sql_upd);
            	//echo $sql_upd;
                $sql = "insert into login_histories (iId, eType, vFirstName, vLastName, vEmail, vUsername, vFromIP, dLoginDate) 
                VALUES ('".$_SESSION["sess_iAdminId"]."','Administrator','".$_SESSION["sess_vFirstName"]."','".$_SESSION["sess_vLastName"]."',
                '".$_SESSION["sess_vEmail"]."','".$_SESSION["sess_vUserName"]."','".$vFromIP."',NOW())";
                $db_sql = $obj->sql_query($sql);
		//echo $sql;exit;
		$sql_loghistory="select * from login_histories where iLoginHistoryId order by iLoginHistoryId desc limit 0,1";
		$db_loghistory=$obj->MySqlSelect($sql_loghistory);
                $_SESSION["iLoginHistoryId"]=$db_loghistory[0]["iLoginHistoryId"];
                
                if($db_sql > 0){
                    $var_msg = "You login Successfully.";
                    header("location:".$tconfig["tpanel_url"]."/index.php?file=home-dashboard&var_msg=$var_msg");
                    exit;
                }else{
                    $var_msg="Invalid Username or Password.";
                    header("location:".$tconfig["tpanel_url"]."/index.php?file=au-login&var_msg=$var_msg");
                    exit;
                }
            }
            else
            {
		    $var_msg = "Invalid Username or Password";
		    header("location:".$tconfig["tpanel_url"]."/index.php?file=au-login&var_msg=$var_msg");
		    exit;
            }
	   }
        
	}elseif($data['mode'] == "forgotpassword"){
		$vEmail = $_POST['vEmail'];
                
		$sql = "select * from administrators WHERE vEmail = '".$vEmail."' and eStatus ='Active' ";
		$result = $obj->MySQLSelect($sql);
         
         if(count($result) > 0){
            $vUserName = $result[0]['vUserName'];
            $vPassword = $generalobj->decrypt($result[0]['vPassword']);
            $name =  $result[0]['vFirstName']." ".$result[0]['vLastName'];
             
            $bodyArr_Admin = array("#NAME#", "#USERNAME#", "#PASSWORD#", "#SITE_URL#", "#MAIL_FOOTER#");
            $postArr_Admin = array($name, $vUserName, $vPassword, $site_url, $MAIL_FOOTER);
            
            $SendPHPMailobj->Send('Forgot Password','Admin',$vEmail,$bodyArr_Admin,$postArr_Admin);
            $var_msg = "Forgot password mail sent successfully.";
	    
            header("location:".$tconfig["tpanel_url"]."/index.php?file=au-login&var_msg=$var_msg");
            exit;
               
         }else{
            $var_msg = "Please Enter valid email address.";
            header("location:".$tconfig["tpanel_url"]."/index.php?file=au-login&var_msg=$var_msg");
            exit;
         }
         
	}
}

?>
