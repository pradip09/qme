<?php

$type = $_REQUEST['type'];
$id = $_REQUEST['id'];
$iMemberId = $_SESSION['iUserId'];


if($type == 'comment')
{
    $where = "iRecentActivityId='".$id."'";
    $id = $obj->MySQLDelete("recent_activities",$where);    
    echo 'Deleted';exit;

}
   

if($type == 'image')
{
    $iPhotoId = $id;
    $sql_img = "select * from photo where iPhotoId='".$iPhotoId."' AND iMemberId = '".$iMemberId."'";
    $db_img = $obj->MySQLSelect($sql_img);
    $photoCatId = $db_img[0]['iPhotoCategoryId'];
    $oldimage = $db_img[0]['vImage'];
    $path = TPATH_SERVER_IMAGES_PHOTO;
    $sql="Delete from photo where iPhotoId='".$iPhotoId."'"; 
	$db_sql=$obj->sql_query($sql);
        unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/2_".$oldimage);
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/1_".$oldimage);				
	unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/".$oldimage);
	
	if($db_sql)$var_msg = "Photo is Deleted Successfully.";else $var_msg="Eror-in Delete.";
        echo '/myphoto/'.$photoCatId;
	exit;
        
}
if($type == 'photoalbum')
{
    $iPhotoCategoryId = $id;
    $sql_photoalbumimg = "select vImage from photo_category where iPhotoCategoryId='".$iPhotoCategoryId."' AND iMemberId = '".$iMemberId."'";
    
    $db_photoalbumimg = $obj->MySQLSelect($sql_photoalbumimg);
    $oldphotoalbumimage = $db_photoalbumimg[0]['vImage'];
    $path = TPATH_SERVER_IMAGES_PHOTO;
    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/2_".$oldphotoalbumimage);
    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/1_".$oldphotoalbumimage);				
    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/".$oldphotoalbumimage);
    $sql="Delete from photo_category where iPhotoCategoryId='".$iPhotoCategoryId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    $sql_imgs = "select vImage from photo where iPhotoCategoryId='".$iPhotoCategoryId."' AND iMemberId = '".$iMemberId."'";
    $db_imgs = $obj->MySQLSelect($sql_imgs);
    for($k=0;$k>count($db_imgs);$k++)
    {
        
    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/2_".$db_imgs[$k]['vImage']);
    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/1_".$db_imgs[$k]['vImage']);				
    unlink(TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/".$db_imgs[$k]['vImage']);
    }
    
    
    $sql="Delete from photo where iPhotoCategoryId='".$iPhotoCategoryId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    if($db_sql)$var_msg = "Photo album is Deleted Successfully.";else $var_msg="Eror-in Delete.";
    echo '/myphoto/';
    exit;
}
if($type == 'video')
{
    $iVideoId = $id;
    $sql_img = "select * from video where iVideoId='".$iVideoId."' AND iMemberId = '".$iMemberId."'";
    $db_img = $obj->MySQLSelect($sql_img);
    $videoCatId = $db_img[0]['iVideoAlbumId'];
    $oldimage = $db_img[0]['vImage'];
    $oldvideo = $db_img[0]['vVideo'];
    $path = TPATH_SERVER_IMAGES_VIDEO;
    $sql="Delete from video where iVideoId='".$iVideoId."'"; 
	$db_sql=$obj->sql_query($sql);
        
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$iMemberId."/".$oldvideo);				
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$iMemberId."/1_".$oldimage);				
	unlink(TPATH_SERVER_IMAGES_VIDEO."/".$iMemberId."/".$oldimage);
	
	if($db_sql)$var_msg = "Video is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	echo '/myvideo/'.$videoCatId;
	exit;
       
}
if($type == 'videoalbum')
{
    $iVideoAlbumId = $id;
    $sql_videoalbumimg = "select vImage from video_album where iVideoAlbumId='".$iVideoAlbumId."' AND iMemberId = '".$iMemberId."'";
    
    $db_videoalbumimg = $obj->MySQLSelect($sql_videoalbumimg);
    $oldvideoalbumimage = $db_videoalbumimg[0]['vImage'];
    $path = TPATH_SERVER_IMAGES_VIDEO;
    
    unlink($path."/".$iMemberId."/1_".$oldvideoalbumimage);				
    unlink($path."/".$iMemberId."/".$oldvideoalbumimage);
    $sql="Delete from video_album where iVideoAlbumId='".$iVideoAlbumId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    $sql_imgs = "select * from video where iVideoAlbumId='".$iVideoAlbumId."' AND iMemberId = '".$iMemberId."'";
    $db_imgs = $obj->MySQLSelect($sql_imgs);
    for($k=0;$k>count($db_imgs);$k++)
    {
	
    unlink(TPATH_SERVER_IMAGES_VIDEO."/".$iMemberId."/".$db_imgs[$k]['vVideo']);
    unlink(TPATH_SERVER_IMAGES_VIDEO."/".$iMemberId."/1_".$db_imgs[$k]['vImage']);				
    unlink(TPATH_SERVER_IMAGES_VIDEO."/".$iMemberId."/".$db_imgs[$k]['vImage']);
    }
    
    
    $sql="Delete from video where iVideoAlbumId='".$iVideoAlbumId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
        
	
	if($db_sql)$var_msg = "Video album is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	echo '/myvideo/';
	exit;
}

if($type == 'song')
{
    $iSongId = $id;
    $sql_img = "select * from song where iSongId='".$iSongId."' AND iMemberId = '".$iMemberId."'";
    $db_img = $obj->MySQLSelect($sql_img);
    $songCatId = $db_img[0]['iSongAlbumId'];
    $oldimage = $db_img[0]['vCoverImage'];
    $oldsong = $db_img[0]['vSong'];
    $path = TPATH_SERVER_MUSIC_SONG;
    $sql="Delete from song where iSongId='".$iSongId."'"; 
	$db_sql=$obj->sql_query($sql);
        
	unlink($path."/".$iMemberId."/".$oldsong);				
	unlink($path."/".$iMemberId."/1_".$oldimage);			
	unlink($path."/".$iMemberId."/".$oldimage);
	
	if($db_sql)$var_msg = "Song is Deleted Successfully.";else $var_msg="Eror-in Delete.";
        echo '/mysong/'.$songCatId;
	exit;
       
}
if($type == 'songalbum')
{
    $iSongAlbumId = $id;
    $sql_songalbumimg = "select vImage from song_album where iSongAlbumId='".$iSongAlbumId."' AND iMemberId = '".$iMemberId."'";
    
    $db_songalbumimg = $obj->MySQLSelect($sql_songalbumimg);
    $oldsongalbumimage = $db_songalbumimg[0]['vImage'];
    $path = TPATH_SERVER_MUSIC_SONG;
    
    unlink($path."/".$iMemberId."/2_".$oldsongalbumimage);
    unlink($path."/".$iMemberId."/1_".$oldsongalbumimage);				
    unlink($path."/".$iMemberId."/".$oldsongalbumimage);
    $sql="Delete from song_album where iSongAlbumId='".$iSongAlbumId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    $sql_imgs = "select * from song where iSongAlbumId='".$iSongAlbumId."' AND iMemberId = '".$iMemberId."'";
    $db_imgs = $obj->MySQLSelect($sql_imgs);
    for($k=0;$k>count($db_imgs);$k++)
    {
    
    unlink(TPATH_SERVER_MUSIC_SONG."/".$iMemberId."/".$db_imgs[$k]['vSong']);				
    unlink(TPATH_SERVER_MUSIC_SONG."/".$iMemberId."/1_".$db_imgs[$k]['vCoverImage']);				
    unlink(TPATH_SERVER_MUSIC_SONG."/".$iMemberId."/".$db_imgs[$k]['vCoverImage']);
    }
    
    
    $sql="Delete from song where iSongAlbumId='".$iSongAlbumId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
        
	
	if($db_sql)$var_msg = "Song album is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	echo '/mysong/';
	exit;
}
if($type == 'postjob')
{
    $iPostJobId = $id;
    $sql="Delete from post_job where iPostJobId='".$iPostJobId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    
    if($db_sql)$var_msg = "Post Job is Deleted Successfully.";else $var_msg="Eror-in Delete.";
    echo '/mypostjob/';
    exit;
}
if($type == 'blog')
{
    $iBlogId = $id;
    $sql_img = "select vImage from blog where iBlogId='".$iBlogId."' AND iMemberId = '".$iMemberId."'";
    $db_images = $obj->MySQLSelect($sql_img);
    $oldimage = $db_images[0]['vImage'];
    $path = TPATH_SERVER_IMAGES_BLOG;
    
    unlink($path."/".$iMemberId."/2_".$oldimage);
    unlink($path."/".$iMemberId."/1_".$oldimage);				
    unlink($path."/".$iMemberId."/".$oldimage);
    
    $sql="Delete from blog where iBlogId='".$iBlogId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    
    if($db_sql)$var_msg = "Blog is Deleted Successfully.";else $var_msg="Eror-in Delete.";
    echo '/myblog/';
    exit;
}
if($type == 'myevent')
{
    $iEventId = $id;
    $sql_img = "select vImage from events where iEventId='".$iEventId."' AND iMemberId = '".$iMemberId."'";
    $db_images = $obj->MySQLSelect($sql_img);
    $oldimage = $db_images[0]['vImage'];
    $path = TPATH_SERVER_IMAGES_EVENT;
    
    unlink($path."/".$iMemberId."/2_".$oldimage);
    unlink($path."/".$iMemberId."/1_".$oldimage);				
    unlink($path."/".$iMemberId."/".$oldimage);
    
    $sql="Delete from events where iEventId='".$iEventId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    
    if($db_sql)$var_msg = "Events is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	//header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pr-product&mode=view&var_msg=$var_msg");
    echo '/myevent/';
    exit;
}

if($type == 'postcampaign')
{
    $iCampaignId = $id;
    $sql_img = "select vImage from post_campaign where iCampaignId='".$iCampaignId."' AND iMemberId = '".$iMemberId."'";
    $db_images = $obj->MySQLSelect($sql_img);
    $oldimage = $db_images[0]['vImage'];
    $path = TPATH_SERVER_IMAGES_CAMPAIGN;
    
    unlink($path."/member/".$iMemberId."/2_".$oldimage);
    unlink($path."/member/".$iMemberId."/1_".$oldimage);				
    unlink($path."/member/".$iMemberId."/".$oldimage);
    
    $sql="Delete from post_campaign where iCampaignId='".$iCampaignId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    
    if($db_sql)$var_msg = "Campaign is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	//header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pr-product&mode=view&var_msg=$var_msg");
    echo '/mypostcampaign/';
    exit;
}
if($type == 'store')
{
    $iStoreId = $id;    
    $sql_mystore = "select vStoreImage from store where iStoreId='".$iStoreId."' AND iMemberId = '".$iMemberId."'";
    
    $db_mystore = $obj->MySQLSelect($sql_mystore);
    $oldimage = $db_mystore[0]['vStoreImage'];
    $path = TPATH_SERVER_IMAGES_STORE;
    unlink(TPATH_SERVER_IMAGES_STORE."/".$iMemberId."/2_".$oldimage);
    unlink(TPATH_SERVER_IMAGES_STORE."/".$iMemberId."/1_".$oldimage);				
    unlink(TPATH_SERVER_IMAGES_STORE."/".$iMemberId."/".$oldimage);
    
    //echo TPATH_SERVER_IMAGES_PHOTO."/".$iMemberId."/2_".$oldimage;
    $sql="Delete from store where iStoreId='".$iStoreId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    $sql_imgs = "select vProductImage from  product_general_item where iStoreId='".$iStoreId."' AND iMemberId = '".$iMemberId."'";
    $db_imgs = $obj->MySQLSelect($sql_imgs);
    for($k=0;$k>count($db_imgs);$k++)
    {
        
    unlink(TPATH_SERVER_IMAGES_STORE."/".$iStoreId."/2_".$db_imgs[$k]['vProductImage']);
    unlink(TPATH_SERVER_IMAGES_STORE."/".$iStoreId."/1_".$db_imgs[$k]['vProductImage']);				
    unlink(TPATH_SERVER_IMAGES_STORE."/".$iStoreId."/".$db_imgs[$k]['vProductImage']);
    }
    
    
    $sql="Delete from product_general_item where iStoreId='".$iStoreId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
        
	
	if($db_sql)$var_msg = "My store is Deleted Successfully.";else $var_msg="Eror-in Delete.";
	//header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pr-product&mode=view&var_msg=$var_msg");
        echo '/mystore/';
	exit;
}
if($type == 'qmein')
{
    $iQmeInId = $id;
   
    $sql="Delete from qmein where iQmeInId='".$iQmeInId."' AND iMemberId = '".$iMemberId."'";
    $db_sql=$obj->sql_query($sql);
    
    
    if($db_sql)$var_msg = "Delete data Successfully.";else $var_msg="Eror-in Delete.";
	//header("Location: ".$tconfig["tpanel_url"]."/index.php?file=pr-product&mode=view&var_msg=$var_msg");
    echo '/qmein/';
    exit;
}
		
if($type == 'generalproduct')
{
    $iProductId = $id;
   
   $sql1="select vProductImage from product_general_item where iProductId='".$iProductId."'";
   $db_sql1=$obj->sql_query($sql1);
   $vProductImage = $db_sql1[0]['vProductImage'];
   
    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/3_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/2_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/1_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/1/".$iProductId."/".$vProductImage);
   
    $sql="Delete from product_general_item where iProductId='".$iProductId."'";
    $db_sql=$obj->sql_query($sql);
   
    if($db_sql){
	$var_msg = "Delete data Successfully.";
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);    
	$Data2['iMemberId'] = $iMemberId;
	$Data2['iPro_tot_cnt'] = $sql_data[0]['iPro_tot_cnt'] - 1;
	$where2  = "iMemberId = ".$iMemberId;
	$id2 = $obj->MySQLQueryPerform("product_count",$Data2,'update',$where2);
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);
	
	$sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$iMemberId."' ORDER BY iPlanTransactionId DESC Limit 1";
	$db_plan = $obj->MySQLSelect($sql_plan);
	
	$sql_cnt = "SELECT * FROM store_plan WHERE iStorePlanId = '".$db_plan[0]['iPlanId']."'";
	$item_limit = $obj->MySQLSelect($sql_cnt);
	
	$sql_store = "select * from store_plan ";
	$db_storeplan = $obj->MySQLSelect($sql_store);
	
	$item_cnt = $db_storeplan[0]['item_limit'] + $item_limit[0]['item_limit'];
	
	if($item_cnt != $sql_data[0]['iPro_tot_cnt'] && $db_plan[0]['iPlanId'] != '4'){
	    $up_data['ePlanstatus'] ='Continue';
	    $where3 = "iPlanTransactionId='".$db_plan[0]['iPlanTransactionId']."'";
	    $id = $obj->MySQLQueryPerform("plan_transaction",$up_data,'update',$where3);
	}
    }
    else{
	$var_msg="Eror-in Delete.";
    }
    echo '/myproducts/1';
    exit;
}
if($type == 'clothingproduct')
{
    $iProductId = $id;
    
    $sql1="select vProductImage from product_clothing_accessories where iProductId='".$iProductId."'";
    $db_sql1=$obj->sql_query($sql1);
    $vProductImage = $db_sql1[0]['vProductImage'];
   
   unlink(TPATH_SERVER_IMAGES_STORE."/2/".$iProductId."/3_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/2/".$iProductId."/2_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/2/".$iProductId."/1_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/2/".$iProductId."/".$vProductImage);
   
    $sql1="Delete from product_clothing_accessories where iProductId='".$iProductId."'";
    $db_sql1=$obj->sql_query($sql1);
    
    if($db_sql1){
	$var_msg = "Delete data Successfully.";
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);    
	$Data2['iMemberId'] = $iMemberId;
	$Data2['iPro_tot_cnt'] = $sql_data[0]['iPro_tot_cnt'] - 1;
	$where2  = "iMemberId = ".$iMemberId;
	$id2 = $obj->MySQLQueryPerform("product_count",$Data2,'update',$where2);
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);
	
	$sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$iMemberId."' ORDER BY iPlanTransactionId DESC Limit 1";
	$db_plan = $obj->MySQLSelect($sql_plan);
	
	$sql_cnt = "SELECT * FROM store_plan WHERE iStorePlanId = '".$db_plan[0]['iPlanId']."'";
	$item_limit = $obj->MySQLSelect($sql_cnt);
	
	$sql_store = "select * from store_plan ";
	$db_storeplan = $obj->MySQLSelect($sql_store);
	
	$item_cnt = $db_storeplan[0]['item_limit'] + $item_limit[0]['item_limit'];
	
	if($item_cnt != $sql_data[0]['iPro_tot_cnt'] && $db_plan[0]['iPlanId'] != '4'){
	    $up_data['ePlanstatus'] ='Continue';
	    $where3 = "iPlanTransactionId='".$db_plan[0]['iPlanTransactionId']."'";
	    $id = $obj->MySQLQueryPerform("plan_transaction",$up_data,'update',$where3);
	}
    }
    else{
	$var_msg="Eror-in Delete.";
    }
    echo '/myproducts/2';
    exit;
}
if($type == 'automotive')
{
    $iProductId = $id;
    
    $sql1="select vVehicleImage from product_automotive where iProductId='".$iProductId."'";
    $db_sql1=$obj->sql_query($sql1);
    $vProductImage = $db_sql1[0]['vProductImage'];
   
    unlink(TPATH_SERVER_IMAGES_STORE."/3/".$iProductId."/3_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/3/".$iProductId."/2_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/3/".$iProductId."/1_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/3/".$iProductId."/".$vProductImage);
   
    $sql1="Delete from product_automotive where iProductId='".$iProductId."'";
    $db_sql1=$obj->sql_query($sql1);
    
    if($db_sql1){
	$var_msg = "Delete data Successfully.";
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);    
	$Data2['iMemberId'] = $iMemberId;
	$Data2['iPro_tot_cnt'] = $sql_data[0]['iPro_tot_cnt'] - 1;
	$where2  = "iMemberId = ".$iMemberId;
	$id2 = $obj->MySQLQueryPerform("product_count",$Data2,'update',$where2);
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);
	
	$sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$iMemberId."' ORDER BY iPlanTransactionId DESC Limit 1";
	$db_plan = $obj->MySQLSelect($sql_plan);
	
	$sql_cnt = "SELECT * FROM store_plan WHERE iStorePlanId = '".$db_plan[0]['iPlanId']."'";
	$item_limit = $obj->MySQLSelect($sql_cnt);
	
	$sql_store = "select * from store_plan ";
	$db_storeplan = $obj->MySQLSelect($sql_store);
	
	$item_cnt = $db_storeplan[0]['item_limit'] + $item_limit[0]['item_limit'];
	
	if($item_cnt != $sql_data[0]['iPro_tot_cnt'] && $db_plan[0]['iPlanId'] != '4'){
	    $up_data['ePlanstatus'] ='Continue';
	    $where3 = "iPlanTransactionId='".$db_plan[0]['iPlanTransactionId']."'";
	    $id = $obj->MySQLQueryPerform("plan_transaction",$up_data,'update',$where3);
	}
    }
    else{
	$var_msg="Eror-in Delete.";
    }
    echo '/myproducts/3';
    exit;
}
if($type == 'realestate')
{
    $iProductId = $id;
    
    $sql1="select vImage from product_real_estate where iProductId='".$iProductId."'";
    $db_sql1=$obj->sql_query($sql1);
    $vProductImage = $db_sql1[0]['vImage'];
    
    unlink(TPATH_SERVER_IMAGES_STORE."/4/".$iProductId."/3_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/4/".$iProductId."/2_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/4/".$iProductId."/1_".$vProductImage);
    unlink(TPATH_SERVER_IMAGES_STORE."/4/".$iProductId."/".$vProductImage);
   
    $sql1="Delete from product_real_estate where iProductId='".$iProductId."'";
    $db_sql1=$obj->sql_query($sql1);
   
    if($db_sql1){
	$var_msg = "Delete data Successfully.";
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);    
	$Data2['iMemberId'] = $iMemberId;
	$Data2['iPro_tot_cnt'] = $sql_data[0]['iPro_tot_cnt'] - 1;
	$where2  = "iMemberId = ".$iMemberId;
	$id2 = $obj->MySQLQueryPerform("product_count",$Data2,'update',$where2);
	
	$sql = "SELECT * FROM product_count WHERE iMemberId = '".$iMemberId."'";
	$sql_data = $obj->MysqlSelect($sql);
	
	$sql_plan = "SELECT * FROM plan_transaction WHERE iMemberId = '".$iMemberId."' ORDER BY iPlanTransactionId DESC Limit 1";
	$db_plan = $obj->MySQLSelect($sql_plan);
	
	$sql_cnt = "SELECT * FROM store_plan WHERE iStorePlanId = '".$db_plan[0]['iPlanId']."'";
	$item_limit = $obj->MySQLSelect($sql_cnt);
	
	$sql_store = "select * from store_plan ";
	$db_storeplan = $obj->MySQLSelect($sql_store);
	
	$item_cnt = $db_storeplan[0]['item_limit'] + $item_limit[0]['item_limit'];
	
	if($item_cnt != $sql_data[0]['iPro_tot_cnt'] && $db_plan[0]['iPlanId'] != '4'){
	    $up_data['ePlanstatus'] ='Continue';
	    $where3 = "iPlanTransactionId='".$db_plan[0]['iPlanTransactionId']."'";
	    $id = $obj->MySQLQueryPerform("plan_transaction",$up_data,'update',$where3);
	}
    }
    else{
	$var_msg="Eror-in Delete.";
    }
    echo '/myproducts/4';
    exit;
}
if($type == 'status')
{
    $iStatusId = $id;
   
    $sql="Delete from status_update where iStatusId='".$iStatusId."'";
    $sql1="Delete from recent_activities where iTypeId='".$iStatusId."' AND eType='status_update'";
    $db_sql=$obj->sql_query($sql);
    $db_sql1=$obj->sql_query($sql1);
    
    
    if($db_sql)$var_msg = "Delete data Successfully.";else $var_msg="Eror-in Delete.";
    echo '/myaccount/';
    exit;
}

?>