<?php
      
    session_start();
    include_once(TPATH_CLASS_GEN."class.sendmail.php");
    $mailObj = new SendPHPMail();
    $type = $_REQUEST['type'];
    if($type == 'fb')
		{
			require($FB_PATH."facebook.php");
			$facebook = new Facebook(array(
			'appId'  => $FB_APPID,
			'secret' => $FB_APPSEC,
			'cookie' => true,
			));
			
			$access_token = $_REQUEST['accesstoken'];
			$userid = $_REQUEST['uid'];
			
			$params = array(
				'method' => 'fql.query',
				'query' => "SELECT first_name,last_name,email FROM user WHERE uid = $userid",
				'access_token' => $access_token
			);
			try {
				$result = $facebook->api($params);	
			} catch (Exception $e) {	
				echo $e;
				exit;
			}
			#echo "<pre>";
			#print_r($result);exit;
			if(!empty($result)){		
			$sql = "select * from members where vEmail = '".$result[0]['email']."' ";
			$pro = $obj->MySQLSelect($sql);
    		
				if(empty($pro))
				{
					$curDate = date("Y-m-d H:i:s");
					
					$firstName = $result[0]['first_name'];
					$lastName = $result[0]['last_name'];
					$email = $result[0]['email'];
					
					$vPassword = generatePassword(8);
					$time = time();
					$vMemberUrl = $time;
					//echo $vMemberUrl;exit;
					function generatePassword1($len) {
						$shuffled = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
						return substr($shuffled, 0, $len);
					}
					$Data = array(
							'vName'=>$firstName.''.$lastName,
							'vEmail'=>$email,
							'vPassword'=>$vPassword,
							'eStatus' =>'Active',
							'vMemberUrl'=>$vMemberUrl,
							);
					
					$id = $obj->MySQLQueryPerform("members",$Data,'insert');
					$Data = array(
					    'iMemberId'=>$id,
					    'Total_points'=>0,
					);
					$id_points = $obj->MySQLQueryPerform("qme_points",$Data,'insert');
					if($id){
					     $Email =  $email;
					     $Name = $firstName." ".$lastName;
					     $password = $vPassword;
					     $body_arr = Array("#NAME#","#SITE_NAME#","#EMAIL#","#MAIL_FOOTER#","#SITE_URL#","#PASSWORD#");
					     $post_arr = Array($Name,$SITE_NAME,$Email,$MAIL_FOOTER,$tconfig["tsite_url"],$password);
					     
					     $mailObj->Send("MEMBER_REGISTER_FB","Member",$Email,$body_arr,$post_arr);
					     $mailObj->Send("MEMBER_REGISTER_FB_ADMIN","Administrator",$EMAIL_ADMIN,$body_arr,$post_arr);
					}
					$var_msg="success";
					
					$sql = "select * from members where vEmail = '".$email."' ";
					$result = $obj->MySQLSelect($sql);
					$_SESSION['iUserId'] =$result[0]['iMemberId'];
					$_SESSION['Name'] =$result[0]['vName'];
					$_SESSION['vEmail'] =$result[0]['vEmail'];
					$_SESSION['vMemberUrl'] =$result[0]['vMemberUrl'];
					$_SESSION['vProfileImage'] =$result[0]['vProfileImage'];
					$var_msg='success';
					//redirect(site_url.'?msg='.$var_msg);
					
				}
				else
				{
					$result=$pro;
					$_SESSION['iUserId'] =$result[0]['iMemberId'];
					$_SESSION['Name'] =$result[0]['vName'];
					$_SESSION['vEmail'] =$result[0]['vEmail'];
					$_SESSION['vMemberUrl'] =$result[0]['vMemberUrl'];
					$_SESSION['vProfileImage'] =$result[0]['vProfileImage'];
					$var_msg='success';
					//redirect(site_url.'?msg='.$var_msg);
				}			
			}
			else{
				echo "Facebook account not valid.";exit;
    		}    		
		}
		else
		{
                        $user_email = $_REQUEST['vEmail'];
                        $password = $_REQUEST['vPassword'];
			$remember = $_REQUEST['remember'];
			if($remember == 'Yes')
			{
				$year = time()+60*60*24*30;
				setcookie('remember_me', $_REQUEST['vEmail'], $year);
				setcookie('password_me', $_REQUEST['vPassword'], $year);
				setcookie('check_me', 1, $year);
			}else if($remember == 'No'){
				$year = time()+60*60*24*30;
				setcookie('remember_me', '', $year);
				setcookie('password_me', '', $year);
				setcookie('check_me', 0, $year);
			}
                        $sql="select * from members WHERE vEmail = '".$user_email."' and vPassword ='".$password."'";
                        //echo $sql;exit; 
                        $row=$obj->MySQLSelect($sql);
			/*
			$Data = array(
			    'iMemberId'=>$row[0]['iMemberId'],
			    'Total_points'=>0,
			);
			$id_points = $obj->MySQLQueryPerform("qme_points",$Data,'insert');
			*/
			if($row){
                                if($row[0]['eStatus'] =='Active'){
                                    $_SESSION['iUserId'] =$row[0]['iMemberId'];
                                    $_SESSION['Name'] =$row[0]['vName'];
                                    $_SESSION['vEmail'] =$row[0]['vEmail'];
				    $_SESSION['eGender'] =$row[0]['eGender'];
				    $_SESSION['vMemberUrl'] =$row[0]['vMemberUrl'];
				    $_SESSION['vProfileImage'] =$row[0]['vProfileImage'];
                                    $var_msg='success';
                                }else{
                                    $var_msg='Your Account has Inactive.';
                                }
                        }else{
                                $var_msg='Please enter currect UserName and Password';
                        }
                }
		
		
		function generatePassword($length = 8)
		    {
			$password = "";
			$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
		    
			$maxlength = strlen($possible);
		    
			if ($length > $maxlength) { $length = $maxlength; }
			    
			$i = 0; 
			while ($i < $length) 
			    { 
			  $char = substr($possible, mt_rand(0, $maxlength-1), 1);
			      
			  if (!strstr($password, $char)) 
			      { 
			    $password .= $char;
			    $i++;
			  }
			    }
			    
			    return $password;
		    }
    echo $var_msg;exit;
?>
