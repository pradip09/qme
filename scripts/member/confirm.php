<?php
//http://09php.com/demo/qme/index.php?file=m-confirm&verify=yes&email=nirav.changela@php2india.com&pn=7FLdgdXisLXKkqvmGlhaVyXtnqSxCt4N

$verify = $_GET['verify'];
$email = $_GET['email'];
$pin = $_GET['pn'];
if(($verify) && ($email)) {
   $sql = "SELECT * FROM members WHERE vEmail='$email' AND eStatus='Inactive'";
   $member = $obj->MySQLSelect($sql);
   $checkpin = $member[0]['vActivationCode'];
           
   if($member[0]['vActivationCode'] == ''){
      
        $success  = "Your account has already been activated.";
   }else{
      
       if($pin == $member[0]['vActivationCode']){

          $statusupdate = "UPDATE members set eStatus='Active',vActivationCode='' where iMemberId='".$member[0]['iMemberId']."'";
          $updateval = $obj->sql_query($statusupdate);

          $EarnData = array(
              'iMemberId'=>$member[0]['iMemberId'],
	      'Total_earnpoints'=>0,	      
              );
          $id_points = $obj->MySQLQueryPerform("qme_earnpoints",$EarnData,'insert');

	  $Data1 = array(
              'iMemberId'=>$member[0]['iMemberId'],	      
	      'Total_purchagepoints'=>0,
              );

	  $id_points1 = $obj->MySQLQueryPerform("qme_purchagepnts",$Data1,'insert');

          $success = "Your account has been activated successfully. Please SIGNIN with your SIGNIN details.";
       }else{
          $success = "Your activation code doesn't match in our database.";
       } 
   }
   
}
//echo "<pre>";
//print_r($member);exit;
//ASSIGN VARIABLE TO SMARTY
$smarty->assign("db_res", $db_res);
$smarty->assign("verify", $verify); 
$smarty->assign("email", $email);
$smarty->assign("success", $success); 
$smarty->assign("member", $member);
$smarty->assign("pin", $pin);
$smarty->assign("checkpin",$checkpin);


?>
