<?php
error_reporting(0);
define( '_TEXEC', 1 );
define('TPATH_BASE', dirname(dirname(__FILE__)) );
define( 'DS', DIRECTORY_SEPARATOR );

require_once ( TPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( TPATH_BASE .DS.'includes'.DS.'configuration.php' );
require_once ( TPATH_BASE .DS.'smarty'.DS.'Smarty.class.php' );

$smarty = new Smarty;
$smarty->setTemplateDir(TPATH_ADMIN_TEMPLATES);
$smarty->setCompileDir(TPATH_ADMIN_TEMPLATES_C);
$smarty->setCacheDir(TPATH_CACHE);
$smarty->caching = false;
$smarty->cache_lifetime = 120;
$smarty->assign("tconfig",$tconfig);

require_once(TPATH_CLASS_APP.DS."class.routes.php");

$generalobj->checkAuthntication();
$rtObj = new Routes();
$module = $rtObj->GetModule();
$script = $rtObj->GetScript();
$mode = $rtObj->GetMode();

if($mode == 'view'){
    $include_script = TPATH_ADMIN_MODULES.DS.$module.DS.$mode."-".$script.".php";
    $include_template = TPATH_ADMIN_TEMPLATES.DS.$module.DS.$mode."-".$script.".tpl";    
}else if($mode =='add' || $mode =='edit'){
    $include_script = TPATH_ADMIN_MODULES.DS.$module.DS.$script.".php";
    $include_template = TPATH_ADMIN_TEMPLATES.DS.$module.DS.$script.".tpl";
}else if($mode =='au'){
    $include_script = TPATH_ADMIN_MODULES.DS.$module.DS.$mode."-".$script.".php";
    $include_template = TPATH_ADMIN_TEMPLATES.DS.$module.DS.$mode."-".$script.".tpl";
    echo $include_script;
}else{
    $include_script = TPATH_ADMIN_MODULES.DS.$module.DS.$script.".php";
}

#echo $include_script; exit;
if($_REQUEST['file'] == 'au-login'){
    $mode = 'au';
    if($var_msg !=''){
        $include_script = TPATH_ADMIN_MODULES.DS.$module.DS.$mode."-".$script.".php";    
    }    
    $include_template = TPATH_ADMIN_TEMPLATES.DS.$module.DS.$mode."-".$script.".tpl";
    
}


require_once($include_script);

#global var define here for the smarty use
//$smarty->assign('tsess_iAdminId',$_SESSION['tsess_iAdminId']);

$smarty->assign('include_template',$include_template);
$smarty->assign('TPATH_ADMIN_TEMPLATES',TPATH_ADMIN_TEMPLATES);
$smarty->assign('DS',DS);
$smarty->assign('generalobj',$generalobj);
$smarty->assign('admin_images_url',$admin_images_url);
$smarty->assign('admin_url',$tconfig["tpanel_url"]);
$smarty->assign('plugins_url',$plugins_url);
$smarty->assign('upload_images_url',$tconfig["tsite_upload_images"]);

$var_msg = $_REQUEST['var_msg'];
$smarty->assign('sess_iAdminId',$_SESSION["sess_iAdminId"]);
$smarty->assign('sess_vFirstName',$_SESSION["sess_vFirstName"]);
$smarty->assign('sess_vLastName',$_SESSION["sess_vLastName"]);
$smarty->assign('var_msg',$var_msg);
$smarty->assign('admin_url',$admin_url);

$smarty->assign('upload_server_image',$tconfig["tsite_upload_images_server"]);
$smarty->assign('tsite_upload_images_product',$tconfig["tsite_upload_images_product"]);
$smarty->assign('CPANEL_TITLE',$CPANEL_TITLE);

#ends here 


if($module == "authentication")
$smarty->display('layout-2.tpl');
else
$smarty->display('layout.tpl');

?>

