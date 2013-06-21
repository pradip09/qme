<?php


include_once(TPATH_CLASS_GEN."class.sendmail.php");
$mailObj = new SendPHPMail();

$Data['vOrganizationName'] =$_REQUEST['vOrganizationName'];
$Data['vRegisteredName'] =$_REQUEST['vRegisteredName'];
$Data['vOrganization501c3'] =$_REQUEST['vOrganization501c3'];
$Data['vFundraiserFor'] =$_REQUEST['vFundraiserFor'];
$Data['vHqAddress'] =$_REQUEST['vHqAddress'];
$Data['vPersonName'] =$_REQUEST['vPersonName'];
$Data['vMainNumber'] =$_REQUEST['vMainNumber'];
$Data['vAlternateNumber'] =$_REQUEST['vAlternateNumber'];
if($_REQUEST['eNonProfit']){ $Data['eNonProfit']= 'Yes'; } else { $Data['eNonProfit']= 'No'; }
if($_REQUEST['eChruch']){ $Data['eChruch']= 'Yes'; } else { $Data['eChruch']= 'No'; }
if($_REQUEST['ePolitician']){ $Data['ePolitician']= 'Yes'; } else { $Data['ePolitician']= 'No'; }
if($_REQUEST['eFundraiser']){ $Data['eFundraiser']= 'Yes'; } else { $Data['eFundraiser']= 'No'; }
$Data['vCandidateName'] =$_REQUEST['vCandidateName'];
$Data['vRunningFor'] =$_REQUEST['vRunningFor'];
$Data['vDistrict'] =$_REQUEST['vDistrict'];
$Data['vEmail'] =$_REQUEST['Email'];
$Data['vOfficeNumber'] =$_REQUEST['OfficeNumber'].$_REQUEST['vOfficeNumber2'].$_REQUEST['vOfficeNumber3'];
$phone=$_REQUEST['OfficeNumber'].$_REQUEST['vOfficeNumber2'].$_REQUEST['vOfficeNumber3'];
$Data['vCellNumber'] =$_REQUEST['vCellNumber1'].$_REQUEST['vCellNumber2'].$_REQUEST['vCellNumber3'];
$cell=$_REQUEST['vCellNumber1'].$_REQUEST['vCellNumber2'].$_REQUEST['vCellNumber3'];
$Data['vBrand'] = implode(",",$_REQUEST['vBrand&Corporate']);
$brand=implode(",<br/>",$_REQUEST['vBrand&Corporate']);
$Data['vAdditionalDesign'] = implode(",",$_REQUEST['vAdditionalDesign']);
$AdditionalDesign=implode(",<br/>",$_REQUEST['vAdditionalDesign']);
if($_REQUEST['iRequireBug']){ $Data['iRequireBug']= 'Yes'; } else { $Data['iRequireBug']= 'No'; }
$Data['vProjectDescription'] = $_REQUEST['vProjectDescription'];

$id = $obj->MySQLQueryPerform("request_fundraiser",$Data,'insert');
$newId = $id;
/*
//Twitter Status Update Start
$twUploadType = 'FUNDRAISER';
$twfundId = $newId;
include TPATH_ROOT.'/twitter/postOnTwitter.php'; 
//Twitter Status Update End

//Facebook Status Update Start
$fbUploadType = 'FUNDRAISER';
$fbFundId = $newId;
include TPATH_ROOT.'/includes/facebook-php-sdk-master/postOnFacebook.php'; 
//Facebook Status Update End
*/       
        
$sql="select * from configurations where vName='EMAIL_FUNDRAISER_CAMPAIGN' ";
$db_email=$obj->MysqlSelect($sql);


$to_email=$db_email[0]['vValue'];

//$to_email = 'bamadeb.upadhyaya@php2india.com';


$body_arr = Array("#OrganizationName#","#RegisteredName#","#Organization501c3#","#FundraiserFor#","#HqAddress#","#PersonName#","#MainNumber#","#CandidateName#","#RunningFor#","#District#","#Email#","#phone#","#cell#","#Brand#","#AdditionalDesign#","#ProjectDescription#","#MAIL_FOOTER#","#SITE_URL#");
$post_arr = Array($_REQUEST['vOrganizationName'],$_REQUEST['vRegisteredName'],$_REQUEST['vOrganization501c3'],$_REQUEST['vFundraiserFor'],$_REQUEST['vHqAddress'],$_REQUEST['vPersonName'],$_REQUEST['vMainNumber'],$_REQUEST['vCandidateName'],$_REQUEST['vRunningFor'],$_REQUEST['vDistrict'],$_REQUEST['Email'],$phone,$cell,$brand,$AdditionalDesign,$_REQUEST['vProjectDescription'], $MAIL_FOOTER,$site_url);
$mailObj->Send("FUNDRAISER_CAMPAIGN","Member",$to_email,$body_arr,$post_arr);



    if($id){
    $var_msg = 'Campaign post successfully';
    }
    else
    {
    $var_msg = "There is an error in posting campaign";
    }
    
    echo $var_msg; exit;
    
?>