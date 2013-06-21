<?php
error_reporting(0);
session_start();
defined( '_TEXEC' ) or die( 'Restricted access' );
$parts = explode( DS, TPATH_BASE );
define( 'TPATH_ROOT',			TPATH_BASE.$tconfig["tsite_folder"] );
define( 'TPATH_ADMINISTRATOR', 	TPATH_ROOT.DS.'admin' );
define( 'TPATH_LIBRARIES', 		TPATH_ROOT.DS.'libraries' );
define( 'TPATH_CLASS_APP', 		TPATH_ROOT.DS.'libraries'.DS.'application' );
define( 'TPATH_TEMPLATES', 		TPATH_ROOT.DS.'templates' );
define( 'TPATH_ADMIN_TEMPLATES', 		TPATH_ADMINISTRATOR.DS.'templates' );
define( 'TPATH_ADMIN_TEMPLATES_C', 		TPATH_ADMINISTRATOR.DS.'templates_c' );
define( 'TPATH_ADMIN_MODULES', 		TPATH_ADMINISTRATOR.DS.'modules' );
define( 'TPATH_CLASS_DATABASE', 		TPATH_ROOT.DS.'libraries'.DS.'database/' );
define( 'TPATH_CLASS_GEN', 		TPATH_ROOT.DS.'libraries'.DS.'general/' );
define( 'TPATH_PUBLIC_HTML', 	TPATH_ADMINISTRATOR.DS.'public_html' );
define( 'TPATH_CACHE', 		TPATH_PUBLIC_HTML.DS.'cache' );
define( 'TPATH_SERVER_IMAGES', 	TPATH_ROOT.DS.'uploads' );
define( 'TPATH_SERVER_IMAGES_EVENT', 	TPATH_ROOT.DS.'uploads/event' );
define( 'TPATH_SERVER_IMAGES_BLOG', 	TPATH_ROOT.DS.'uploads/blog' );
define( 'TPATH_SERVER_IMAGES_VIDEO', 	TPATH_ROOT.DS.'uploads/video_image' );
define( 'TPATH_SERVER_IMAGES_PHOTO', 	TPATH_ROOT.DS.'uploads/photo' );
define( 'TPATH_SERVER_IMAGES_CHANNEL', 	TPATH_ROOT.DS.'uploads/channel' );
define( 'TPATH_SERVER_MUSIC_SONG', 	TPATH_ROOT.DS.'uploads/song' );
define( 'TPATH_SERVER_MUSIC_NEWS', 	TPATH_ROOT.DS.'uploads/news' );
define( 'TPATH_SERVER_IMAGES_STORE', 	TPATH_ROOT.DS.'uploads/store' );
define( 'TPATH_SERVER_IMAGES_PRODUCT', 	TPATH_ROOT.DS.'uploads/product' );
define( 'TPATH_SERVER_IMAGES_BANNER', 	TPATH_ROOT.DS.'uploads/banner' );
define( 'TPATH_SERVER_IMAGES_AGENCY_BANNER', 	TPATH_ROOT.DS.'uploads/agencybanner' );
define( 'TPATH_SERVER_IMAGES_MEMBER', 	TPATH_ROOT.DS.'uploads/member' );
define( 'TPATH_SERVER_IMAGES_CAMPAIGN', TPATH_ROOT.DS.'uploads/campaign' );
define( 'TPATH_SERVER_IMAGES_CONTESTS', TPATH_ROOT.DS.'uploads/contests' );
define( 'TPATH_SERVER_IMAGES_PUBLIC_STORE_IMAGES', TPATH_ROOT.DS.'uploads/public_store_images' );
define( 'TPATH_SERVER_IMAGES_FUNDRAISER_CAMPAIGN', TPATH_ROOT.DS.'uploads/fundraiser_campaign' );
define( 'TPATH_SERVER_IMAGES_HOMETAB', 	TPATH_ROOT.DS.'uploads/hometab' );

define( 'TPATH_UPLOADS', 	TPATH_ROOT.DS.'uploads' );
define( 'TPATH_UPLOADS_SERIES', 	TPATH_UPLOADS.DS.'series' );
define( 'TPATH_UPLOADS_EPISODES', 	TPATH_UPLOADS.DS.'episodes' );
define( 'TPATH_UPLOADS_SLIDER_HOME', 	TPATH_UPLOADS.DS.'slider_home' );
define( 'TPATH_FRONT_TEMPLATES', 		TPATH_ROOT.DS.'templates' );
define( 'TPATH_FRONT_TEMPLATES_C', 		TPATH_ROOT.DS.'templates_c' );

$imagemagickinstalldir='/usr/bin';
$useimagemagick = "Yes";


if($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "192.168.1.12")
{
	define( 'TSITE_SERVER','localhost');
	define( 'TSITE_DB','qme');
	define( 'TSITE_USERNAME','root');
	define( 'TSITE_PASS','root');
}
else
{
	define( 'TSITE_SERVER','localhost');
	define( 'TSITE_DB','qmemedia_qme');
	define( 'TSITE_USERNAME','qmemedia_qme');
	define( 'TSITE_PASS','g$}V}^,PEEU]');
}


if(!isset($obj))
{
	require_once(TPATH_CLASS_DATABASE."class.dbquery.php");
	$obj=	new DBConnection(TSITE_SERVER, TSITE_DB, TSITE_USERNAME,TSITE_PASS);
	
}

if(!isset($generalobj)){
	
	//echo TPATH_CLASS_GEN."class.general.php";
	require_once(TPATH_CLASS_GEN."class.general.php");
	$generalobj=new General();
}

$generalobj->getGeneralVar();

?>
