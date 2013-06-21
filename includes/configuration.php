<?php
if($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "192.168.1.12")
{
	$tconfig["tsite_folder"] = "/qme";
}	
else
{
	$tconfig["tsite_folder"] = "";
}
$tconfig["tsite_admin"] = "admin";
$tconfig["tsite_url"] = "http://".$_SERVER["HTTP_HOST"].$tconfig["tsite_folder"];

$site_path	= $_SERVER["DOCUMENT_ROOT"].$tconfig["tsite_folder"];
$site_url = $tconfig["tsite_url"];

$agencypath_path	= $_SERVER["DOCUMENT_ROOT"].$tconfig["tsite_folder"]."/agencysupport";
$agencysupport_url = $tconfig["tsite_url"]."/agencysupport";

$tconfig["tpanel_url"] = "http://".$_SERVER["HTTP_HOST"]."/".$tconfig["tsite_admin"];

$admin_url = $tconfig["tpanel_url"];


$tconfig["tsite_stylesheets"] = $tconfig["tsite_url"]."/admin/public_html/stylesheets/";
$tconfig["tsite_images"] = $tconfig["tsite_url"]."/admin/public_html/images/";
$tconfig["tsite_javascript"] = $tconfig["tsite_url"]."/admin/public_html/javascripts/";
$tconfig["tsite_ckeditor"] = $tconfig["tsite_url"]."/admin/public_html/ckeditor/";
$tconfig["tsite_music"] = $tconfig["tsite_url"]."/admin/public_html/music/";
$tconfig["tpanel_theme"] = $tconfig["tsite_stylesheets"]."cp/theme/green/";
$tconfig["tpanel_theme_img"] = $tconfig["tsite_stylesheets"]."cp/theme/green/img/";
$tconfig["tpanel_img"] = $tconfig["tsite_images"]."cp/";
$tconfig["tcp_javascript"] = $tconfig["tsite_url"]."/admin/public_html/cp-javascripts/";
$tconfig["front_images"] = $tconfig["tsite_url"]."/public/images/";
$tconfig["front_css"] = $tconfig["tsite_url"]."/public/css/";
$tconfig["front_javascript"] = $tconfig["tsite_url"]."/public/javascript/";
$tconfig["front_stylesheets"] = $tconfig["tsite_url"]."/public/css/";

//print_r($tconfig["front_javascript"]);exit;

$tconfig["tsite_upload_images"] = $tconfig["tsite_url"]."/uploads";
$tconfig["tsite_upload_images_series"] = $tconfig["tsite_url"]."/uploads/series/";
$tconfig["tsite_upload_images_episodes"] = $tconfig["tsite_url"]."/uploads/episodes/";
$tconfig["tsite_upload_images_server"] = $tconfig["tsite_url"]."/uploads/";
$tconfig["tsite_upload_images_event"] = $tconfig["tsite_url"]."/uploads/event/";
$tconfig["tsite_upload_images_campaign"] = $tconfig["tsite_url"]."/uploads/campaign/";
$tconfig["tsite_upload_images_contests"] = $tconfig["tsite_url"]."/uploads/contests/";
$tconfig["tsite_upload_images_blog"] = $tconfig["tsite_url"]."/uploads/blog/";
$tconfig["tsite_upload_images_video"] = $tconfig["tsite_url"]."/uploads/video_image/";
$tconfig["tsite_upload_images_channel"] = $tconfig["tsite_url"]."/uploads/channel/";
$tconfig["tsite_upload_images_photo"] = $tconfig["tsite_url"]."/uploads/photo/";
$tconfig["tsite_upload_music_song"] = $tconfig["tsite_url"]."/uploads/song/";
$tconfig["tsite_upload_images_store"] = $tconfig["tsite_url"]."/uploads/store/";
$tconfig["tsite_upload_images_product"] = $tconfig["tsite_url"]."/uploads/product/";
$tconfig["tsite_upload_images_banner"] = $tconfig["tsite_url"]."/uploads/banner/";
$tconfig["tsite_upload_images_agencybanner"] = $tconfig["tsite_url"]."/uploads/agencybanner/";
$tconfig["tsite_upload_images_news"] = $tconfig["tsite_url"]."/uploads/news/";
$tconfig["tsite_upload_images_member"] = $tconfig["tsite_url"]."/uploads/member/";
$tconfig["tsite_upload_images_public_store_images"] = $tconfig["tsite_url"]."/uploads/public_store_images/";
$tconfig["tsite_upload_images_fundraiser_campaign"] = $tconfig["tsite_url"]."/uploads/fundraiser_campaign/";
$tconfig["tsite_upload_images_hometab"] = $tconfig["tsite_url"]."/uploads/hometab/";

$tconfig["tsite_admin_creditor_url"] = $site_url."/".$tconfig["tsite_admin"].'/public_html/ckeditor';
//print_r($tconfig["tsite_upload_images_store"]);exit;



define( 'TPATH_ADMIN_CKEDITOR_PATH', 		$site_path."/".$tconfig["tsite_admin"].'/public_html/ckeditor' );
define( 'TPATH_ADMIN_CKEDITOR_URL', 		$site_url."/".$tconfig["tsite_admin"].'/public_html/ckeditor' );

$FB_APPID = '331786620236245';
$FB_APPSEC = 'b9abe78fe960ca9e38fd0677849830f4';
$FB_PATH = $site_path."/libraries/fb/";

?>
