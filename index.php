<?php

define('_TEXEC', 1 );
define('TPATH_BASE', dirname(__FILE__)) ;

define('DS', DIRECTORY_SEPARATOR );
include_once("includes/configuration.php");

include_once("includes/defines.php");
$file  = $_REQUEST['file'];


if(isset($file) && $file != ""){
        $var=explode("-",$file);
        $prefix=$var[0];
        $script=$var[1];
}else{
        $file="c-home";
        $prefix="c";
        $script="home";
}                 
if($script=="")
$script="home";


//find out script location
switch ($prefix){
        case "c":
                $module = "content";
                break;
        case "m":
                $module = "member";
                break;
        case "a":
                $module = "ajax";
                break;
        default:
                $module = "content";
        break;
}


$include_script = "scripts/".$module."/".$script.".php";
$include_script_template ="templates/".$module."/".$script.".tpl";

require_once ( TPATH_BASE.$tconfig["tsite_folder"] .DS.'smarty'.DS.'Smarty.class.php' );

$smarty = new Smarty;
$smarty->setTemplateDir(TPATH_FRONT_TEMPLATES);
$smarty->setCompileDir(TPATH_FRONT_TEMPLATES_C);
$smarty->assign("tconfig",$tconfig);
$smarty->assign("include_script_template",$include_script_template);
$smarty->assign("TPATH_FRONT_PUBLIC_PATH",TPATH_FRONT_PUBLIC_PATH);

//$smarty_array = array_merge($smarty_array,array("module","script","include_script","site_image_path","include_script_template","lan","lbl_required","vMetaTitle","vMetaKeyword","file", "vMetaDesc","vMetaOther","site_path","site_url","admin_url","site_image_url","admin_image_url","site_style_url","msg","SEO_FRIENDLY_URL","site_style_url","secure_url","httpson","prefix","GeneralObj","TableObj","article_image_path","article_image_url","ajax","breadcrumstring","COMPANY_NAME","COMPANY_ADDRESS","COMPANY_COUNTRY","COMPANY_STATE","COMPANY_ZIP","COMPANY_FAX","COMPANY_SUPPORT_EMAIL","COMPANY_TOLL_FREE","FRONT_REC_LIMIT_ALL","facebox_js_url","menu_js_url","site_js_url","product_image_path","category_image_url","storeowner_url"));

$notincludeindex = array('c-popuplogin','a-ajproductlist','a-ajfeedback','a-ajfaq','aj_contact','a-ajpublicprofile','ajcommentlist_actvt','ajcommentlist_news','ajcommentlist_frd','ajcommentlist_blog','a-ajpromotionlist','a-ajregister','a-ajlogin','a-ajpoplogin','a-ajaxshoppingcart','a-quotationrequest','a-ajbootomslider','a-ajstate','a-ajcatloglist','a-ajcartproducttodisplay','a-ajcartproducttodisplay','a-ajchangepassword','a-ajeditprofile','a-ajemptycart','a-ajadmincampaginlist','a-ajadminjoblist','a-ajallcampaginlist','a-ajalljoblist','a-ajpostjob','a-ajpostcampaign','a-ajmyphotocategory','a-ajmyphotos','a-ajmyimages','a-ajmybannerimages','a-mygeneralsetting','a-mycontact','a-ajcropbanner','a-ajuploadbanner','a-ajcropbannerhtml','a-ajmyvideos','a-ajmyallvideos','a-ajmysongs','a-ajmyallsongs','a-ajshowbannerimage','a-ajdeletedata','a-ajeditphoto','a-ajuploadvideocategory','a-ajuploadvideo','a-ajuploadsongcategory','a-ajuploadsong','a-ajmystore','a-ajmyproduct','a-ajmypostjobs','a-ajmybloglist','ajaddmyblog','a-ajmypostcampiagn','a-ajmyevent','at-ajmakelist','a-ajstatelist','a-ajaboutus','a-ajstatejob','a-ajmyqmein','a-ajstateqmein','a-ajaddqmein','a-ajpublicprofilephotoalbum','a-ajmyclothingproduct','re-ajcountrylist','a-ajpublicallphotos','a-ajrecentactivity','a-ajpublicprofilecompaign','at-ajmemberlist','a-ajmyautomotiveproduct','a-ajstatusupdate','a-ajmyrealestateproduct','re-ajmemberlist','pro-ajmemberlist','a-ajpublicprofilejob','a-ajmyclothingproduct_a','a-ajmyautomotiveproduct_a','a-ajmodellist','a-ajpublicallstore','a-ajmypublicproduct','a-ajmyrealestateproduct_a','a-ajpublicgeneralproduct','ajpubliclothingproduct'.'a-ajpublicautomotiveproduct','a-ajpublicrealestateproduct','a-ajcountrieslist','a-ajreleventnews','a-ajpublicbloglist','a-ajmygeneralproduct','a-ajmygeneralproduct_a','a-ajpub_general_product','a-ajpub_clothing_product','a-ajpub_automotive_product','a-ajpub_realestate_product','a-emailproperty','a-ajstatelist','a-ajemailautomotive','a-ajlikeitem','a-ajlikedata','a-ajfundraiser','a-ajdeletebanner','a-ajcommentlist','a-ajmyprofilelist','a-ajcountcomment','a-ajbizprofilelist','a-ajfundcompaign','a-ajpublicallsongs','a-ajpublicallvideos','a-ajsearchdata','a-ajfundpopup','a-ajemptycart','a-ajuploadimage','a-ajcartproducttodisplay','a-ajsearchjob','a-ajprofilepsw','a-ajcartpaymentdisplay','a-ajqmeincount','a-ajCampaigncnt','a-ajpublcampcntlist','a-ajpostjobmemcnt','a-ajfriendregister','a-ajfrient_request','a-ajfrndrequestupdate','a-ajpublicfrndlist','a-ajsendfrndrequest','a-ajmyallfriends','a-ajrecentfriens','a-ajuploadpublicphoto','a-ajSaveFacebookToken','a-ajinboxcontactemail','a-ajsendmessage','a-ajmyinbox_a','a-ajsendmail_a','a-ajreportjob','a-ajmymsgsend','a-ajredeempoints','a-ajbrowsestatelist','a-ajbrowsecamplist','a-ajsearchkeyword','a-ajmyaccountnews');
$smarty_array=array("script","include_script_template");

if(!file_exists($include_script) && !file_exists($smarty->template_dir[0]."/".$include_script_template)){
        $include_script_template = "content/error.tpl";

}else if(file_exists($include_script)){

        include_once($include_script);

        include_once(TPATH_BASE.$tconfig["tsite_folder"]."/scripts/content/common.php");
        
}

if($_SESSION['iUserId'] !='')
{
        $smarty->assign('UserId',$_SESSION['iUserId']);
}
$smarty->assign('file',$file);
$smarty->assign('path',$path);
$smarty->assign('script',$script);
$smarty->assign('notincludeindex',$notincludeindex);
$smarty->assign('site_url',$tconfig["tsite_url"]);
$smarty->assign('FB_APPID',$FB_APPID);
$smarty->assign('FB_APPSEC',$FB_APPSEC);
$smarty->assign('site_url',$site_url);
$smarty->assign('agencysupport_url',$agencysupport_url);

$smarty->display("template.tpl");

$obj->close();
unset($smarty);
unset($obj);
?>
