<?php
	
	$iMemberId    = $_REQUEST['iMemberId'];
	$sql = "SELECT * FROM  qme_friend AS qf LEFT JOIN members AS m ON(qf.iMemberId = m.iMemberId) where qf.iFriendId='".$iMemberId."' AND m.eStatus = 'Active' AND qf.eStatus='Approve'";
        $frnddata =$obj->MySQLSelect($sql);
	for($i=0;$i<count($frnddata);$i++){
		
		if($frnddata[$i]['vProfileImage'] =='' && !is_file(TPATH_SERVER_IMAGES_MEMBER."/".$frnddata[$i]['iMemberId']."/".$frnddata[$i]['vProfileImage'])){
			$frnddata[$i]['vProfileImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$frnddata[$i]['vProfileImage'] = $tconfig["tsite_upload_images_member"].$frnddata[$i]['iMemberId']."/"."1_".$frnddata[$i]['vProfileImage'];
		}
	}
	
	$smarty->assign("frnddata", $frnddata);
	$smarty->assign("iMemberId",$iMemberId);
?>

 