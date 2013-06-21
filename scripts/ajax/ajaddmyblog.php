<?php

	$path = TPATH_SERVER_IMAGES_BLOG;
	$Data['dCreateDate'] = $_REQUEST['dCreateDate'];
	
	$mode = $_REQUEST['mode'];
	$Data = array();
	if($_REQUEST['HideEvent']){ $Data['eHideEntry']= 'Yes'; } else { $Data['eHideEntry']= 'No'; }
	
	list($m, $d, $y) = explode('-', $_REQUEST['dCreateDate']);
	$Data['dCreateDate'] = date('Y-m-d', mktime(0,0,0,$m,$d,$y));
	
	
	$Data['iMemberId'] = $_SESSION['iUserId'];
	$Data['vBlogTitle'] = $_REQUEST['blogtitle']; 
	
	$Data['vText'] = addslashes($_REQUEST['vText']);   
	$Data['iSkillId'] = implode(",",$_REQUEST['iSkillId']);
	$Data['iInterestId'] = implode(",",$_REQUEST['iInterestId']);
	
	
	$Data['vOtherSkill'] = $_REQUEST['vOtherSkill'];
	$Data['vOtherInterest'] = $_REQUEST['vOtherInterest'];
	$Data['iBlogCategoryId'] = $_REQUEST['new_category'];



	if($Data['iBlogCategoryId'] == '')
	{
		$Data['iBlogCategoryId'] = $_REQUEST['iAlbum'];
		
	}else{
		$Data1['dAddedDate'] = date('Y-m-d H:i:s');
		$Data1['vBlogCategory'] = $_REQUEST['new_category'];
		$Data1['eStatus'] = "Active";
		$id = $obj->MySQLQueryPerform("blogcategory",$Data1,'insert');
		$sql = "select * from blogcategory where vBlogCategory = '".$Data['iBlogCategoryId']."'";
		$result =$obj->MySQLSelect($sql);
		$Data['iBlogCategoryId'] = $result[0]['iBlogCategoryId'];
	}

	$Data['dAddedDate'] = date('Y-m-d H:i:s');
	$Data['eStatus'] = "Active";	
	$memberId = $_SESSION['iUserId'];

	if(!is_dir($path."/".$memberId)){
		@mkdir($path."/".$memberId, 0777);
	    }
	$_FILES['vImage'] = $_FILES['blogimage'];
	if ($_FILES['vImage']['name'] != "")
	{
	    $PARAM_ARRAY = array
		(
		 "TARGET_DIR" =>$path."/".$memberId,
			array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
			array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
			array('WIDTH_HEIGHT' => "128X110", 'PREFIX' => "2"),
			array('WIDTH_HEIGHT' => "71X71", 'PREFIX' => "3"),
			array('WIDTH_HEIGHT' => "252X180", 'PREFIX' => "7")
		);
		$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage']);
		if($image !=''){ $Data['vImage'] = $image; }
	}
	if($mode == 'add')
	{
		$id = $obj->MySQLQueryPerform("blog",$Data,'insert');
		$newId = $id;
		if($_SESSION['eGender'] == 'Male')
		{
			$word = 'his';
		}elseif($_SESSION['eGender'] == 'Female'){
			$word = 'her';
		}else{
			$word = '';
		}
		$Recent['iMemberId'] = $Data['iMemberId'];
		$Recent['eType'] = 'blog';
		$Recent['iTypeId'] = $id;
		$Recent['vImage'] = $Data['vImage'];
		$Recent['vDescription'] = $_SESSION['Name'].' added new blog.';
		$Recent['dAddedDate'] = $Data['dAddedDate'];
		$Recent['eNameActivity'] = $Data['vBlogTitle'];
		$id = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
		if($id){
		$var_msg = "Your Blog upload successfully";
		
		//Twitter Status Update Start
		$twUploadType = 'BLOG';
		$twBlogId = $newId;
		include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
		//Twitter Status Update End
	
		//Facebook Status Update Start
		$fbUploadType = 'BLOG';
		$fbBlogId = $newId;
		include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
		//Facebook Status Update End
			
		
		}
		else{
		    $var_msg = 'Error in upload ypur photo';
		}
	}
	else
	{
		$iBlogId = $_REQUEST['iBlogId'];
		$where = " iBlogId = '".$iBlogId."'";
		
		$id1 = $obj->MySQLQueryPerform("blog",$Data,'update',$where);
		if($_SESSION['eGender'] == 'Male')
		{
			$word = 'his';
		}elseif($_SESSION['eGender'] == 'Female'){
			
			$word = 'her';
		}else{
			$word = '';
		}
		$Recent['iMemberId'] = $Data['iMemberId'];
		$Recent['eType'] = 'blog';
		$Recent['iTypeId'] = $iBlogId;
		//$Recent['vImage'] = $Data['vImage'];
		   if($Data['vImage'] != ''){
			$Recent['vImage'] = $Data['vImage'];
		    }else{
			$Recent['vImage'] = $_REQUEST['vOldImage'];
		    }
		$Recent['vDescription'] = $_SESSION['Name'].' updated blog.';
		$Recent['dAddedDate'] = $Data['dAddedDate'];
		$Recent['eNameActivity'] = $Data['vBlogTitle'];
		$id1 = $obj->MySQLQueryPerform("recent_activities",$Recent,'insert');
		if($id1){
			$var_msg = "Your Blog update successfully";
		}
		else{
			$var_msg = 'Error in update ypur photo';
		}
	}
	 //header('Location:'.$site_url.'/myblog');
   echo $var_msg; exit;

?>