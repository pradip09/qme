<?php

session_start();

require_once(TPATH_ROOT.'/twitter/twitteroauth/twitteroauth.php');
require_once(TPATH_ROOT.'/twitter/config.php');

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
/*$oauth_token=$connection['token']['key'];
$oauth_token=$connection['token']['secret'];*/

/* Request access tokens from twitter */
$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);

$iMemberId = $_SESSION['iUserId'];
$data['iMemberId'] = $iMemberId;
$data['vTwitteruserName'] = $access_token['screen_name'];;
$data['vTwitteruserId'] = $access_token['user_id'];
$data['vTwitterAccessToken'] = $_REQUEST['oauth_token'];

$sql = "select * from member_social_network where iMemberId = '".$iMemberId."'";
$db_id = $obj->MySQLSelect($sql);

if(count($db_id)){
    $where = " iMemberId = '".$iMemberId."'";
    $save_id = $obj->MySQLQueryPerform("member_social_network",$data,'update',$where);        
}else{
    $save_id = $obj->MySQLQueryPerform("member_social_network",$data,'insert');
} 

header('Location: http://twitter.com');
exit;

?>