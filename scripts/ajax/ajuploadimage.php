<?php

$Data = array();
$mode = $_REQUEST['mode'];
$path = TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES;
$Data['iMemberId'] = $_SESSION['iUserId'];
$Data['iFileId'] = $_REQUEST['iFileId'];
$memberId =$Data['iMemberId'];


		if($_REQUEST['deletevideo'] == 'deletevideo')
		{
			$sql_store_public_video = "select * from store_public_image  WHERE iMemberId='".$_SESSION['iUserId']."' AND eType ='video'";
			$db_store_public_video = $obj->MySQLSelect($sql_store_public_video);
			unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$memberId."/".$db_store_public_video[0]['vFile']);
			$sql="Delete from store_public_image where iMemberId='".$_SESSION['iUserId']."' AND eType ='video'"; 
			$db_sql_del=$obj->sql_query($sql);
			$var_msg = 'Video deleted successfully';
			echo $var_msg; exit;
		}
		if($_REQUEST['deleteimg'] == 'deleteimg')
		{
			$sql_store_public_img = "select * from store_public_image  WHERE iMemberId='".$_SESSION['iUserId']."' AND eType ='image' AND iFileId = '".$_REQUEST['FileId']."'";
			$db_store_public_img = $obj->MySQLSelect($sql_store_public_img);
			unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$_SESSION['iUserId']."/1_".$db_store_public_img[0]['vFile']);
			unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$_SESSION['iUserId']."/2_".$db_store_public_img[0]['vFile']);
			unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$_SESSION['iUserId']."/".$db_store_public_img[0]['vFile']);
			$sql="Delete from store_public_image where iMemberId='".$_SESSION['iUserId']."' AND eType ='image' AND iFileId ='".$_REQUEST['FileId']."'"; 
			$db_sql_del=$obj->sql_query($sql);
			$var_msg = 'Image deleted successfully';
			echo $var_msg; exit;
		}
	

			$sql_stimage = "SELECT * FROM store_public_image  WHERE iMemberId='".$memberId."'AND eType ='image'";
			$db_store_image = $obj->MySQLSelect($sql_stimage);
			
			if(!is_dir($path."/".$memberId)){
				@mkdir($path."/".$memberId, 0777);
			}	
			
			$_FILES['vImage1'] = $_FILES['vImageFile'];
		
			if (count($_FILES['vImage1']['name']) > 0) {
		
				for($i = 0 ;$i < count($_FILES['vImage1']['name']); $i++)
				{
					
					if($_POST['vOldImage'][$i] !='' && $_FILES['vImage1']['name'][$i] !=''){
						$PARAM_ARRAY = array
							(
							 "TARGET_DIR" =>$path."/".$memberId,
							array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
							array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
							array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "2")
						);
						$_FILES['vImage'][$i] = array(
									"name"=>$_FILES['vImage1']['name'][$i],
									"type"=>$_FILES['vImage1']['type'][$i],
									"tmp_name"=>$_FILES['vImage1']['tmp_name'][$i],
									"error"=>$_FILES['vImage1']['error'][$i],
									"size"=>$_FILES['vImage1']['size'][$i]
									);
				
						$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage'][$i]);
						unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$memberId."/2_".$_POST['vOldImage'][$i]);				
						unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$memberId."/1_".$_POST['vOldImage'][$i]);				
						unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES.'/'.$memberId."/".$_POST['vOldImage'][$i]);
						
						if($image !=''){ $Data['vFile'] = $image; $Data['eType'] = 'image';$_FILES['vImage'] ='';}
						
						$where = "iFileId ='".$_REQUEST['iFileId'][$i]."'";
						$Data['iFileId'] = $_REQUEST['iFileId'][$i];
						
						
						$Id = $obj->MySQLQueryPerform(" store_public_image",$Data,'update',$where);			
					}
			
			elseif($_POST['vOldImage'][$i] =='' && $_FILES['vImage1']['name'][$i] !=''){
				if(!is_dir($path."/".$memberId)){
					@mkdir($path."/".$memberId, 0777);
				}
				
				$PARAM_ARRAY = array
					(
					 "TARGET_DIR" =>$path."/".$memberId,
						array('WIDTH_HEIGHT' => '0x0', 'PREFIX' => ''),
						array('WIDTH_HEIGHT' => "100X100", 'PREFIX' => "1"),
						array('WIDTH_HEIGHT' => "535X339", 'PREFIX' => "2")
					 );
					 $_FILES['vImage'][$i] = array(
									"name"=>$_FILES['vImage1']['name'][$i],
									"type"=>$_FILES['vImage1']['type'][$i],
									"tmp_name"=>$_FILES['vImage1']['tmp_name'][$i],
									"error"=>$_FILES['vImage1']['error'][$i],
									"size"=>$_FILES['vImage1']['size'][$i]
									);
	
					$image=$generalobj->import($PARAM_ARRAY, $_FILES['vImage'][$i]);
					#echo $imagegal;exit;
					if($image !=''){ $Data['vFile'] = $image; $Data['eType'] = 'image';$_FILES['vImage'] ='';}
					$Id = $obj->MySQLQueryPerform("store_public_image",$Data,'insert');
					
		        }
			elseif($_POST['vOldImage'][$i] !='' && $_FILES['vImage1']['name'][$i] ==''){			
					$Data['vFile'] = $_POST['vOldImage'][$i];
					$Data['eType'] = 'image';
					$_FILES['vImage'] ='';
					$where = "iFileId = '".$_FILES['vImage1']['iFileId'][$i]."'";
					$Data['iFileId'] = $_REQUEST['iFileId'][$i+1];
					$Id = $obj->MySQLQueryPerform("store_public_image",$Data,'update',$where);
				
		        }
		}
		
		
	}
	
					$sql_galvid = "SELECT * FROM store_public_image  WHERE iMemberId='".$memberId."'AND eType ='video'";
					$db_store_video = $obj->MySQLSelect($sql_galvid);
					if(!in_array($db_store_video['vFile'],$_POST['vOldvideo'])){
						unlink(TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES."/".$memberId."/".$_POST['vOldvideo']);
						}
					
					$sql_delvid="Delete from store_public_image where iMemberId='".$memberId."'AND eType ='video'";
					$db_video_delete=$obj->sql_query($sql_delvid);
					
					if($_POST['vOldVideo'] !='' && $_FILES['vVideoFile']['name'] !=''){
						$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/".$memberId."/".$_FILES["vVideoFile"]["name"]);
						if($video) { $Data['vFile'] = $_FILES["vVideoFile"]["name"]; $Data['eType'] = 'video';}
						$Id = $obj->MySQLQueryPerform(" store_public_image",$Data,'insert');
					}
					
					elseif($_POST['vOldVideo'] =='' && $_FILES['vVideoFile']['name'] !=''){
						$video = move_uploaded_file($_FILES["vVideoFile"]["tmp_name"],$path."/".$memberId."/".$_FILES["vVideoFile"]["name"]);
						if($video) { $Data['vFile'] = $_FILES["vVideoFile"]["name"]; $Data['eType'] = 'video';}
						$Id = $obj->MySQLQueryPerform(" store_public_image",$Data,'insert');
					}
						
					elseif($_POST['vOldVideo'] !='' && $_FILES['vVideoFile']['name'] ==''){
						$Data['vFile'] = $_POST['vOldVideo'];
						$Data['eType'] = 'video';
						$Id = $obj->MySQLQueryPerform(" store_public_image",$Data,'insert');
					}
	
					if($Id){
					    $var_msg = "Data updated Successfully";
					}
					else{
					    $var_msg = 'Error in creating video album';
					}
				    
					echo $var_msg; exit;

?>