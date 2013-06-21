<?php
    require_once TPATH_ROOT.'/facebook-php-sdk-master/src/facebook.php';
    
    $iMemberId = $_SESSION['iUserId'];
    $sql = "select * from member_social_network where iMemberId = '".$iMemberId."'";
    $db_id = $obj->MySQLSelect($sql);
    $username = $db_id[0]['vFacebookUserName'];
    $message = $_REQUEST['body'];
    
    $access_token = $db_id[0]['vFacebookAccessToken'];
    
// Create FB Object Instance
    $facebook = new Facebook(array(
        'appId'  => $FB_APPID,
        'secret' => $FB_APPSEC,
        'cookie' => false,
    ));


//Get App Token
$token = $access_token;

//Try to Publish on wall or catch the Facebook exception
try {
    $attachment = array('message' => 'Dharmesh have uploaded New Photo on QME',
                'access_token' => $token,
                        //'name' => 'First Love',
                        //'caption' => 'First Love',
                        //'link' => 'http://apps.facebook.com/xxxxxx/',
                        //'description' => 'Description .....',
                        //'picture' => 'http://09php.com/demo/qme/uploads/photo/65/1354016271first-love_1.JPG',
                        //'actions' => array(array('name' => 'Action Text', 
                        //'link' => 'http://apps.facebook.com/xxxxxx/'))
                        );
    
    $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
    echo $result;
    exit;
}

//If the post is not published, print error details
catch (FacebookApiException $e) {
echo '<pre>';
print_r($e);
echo '</pre>';
}
exit;
?>


<?php
    $iMemberId = $_SESSION['iUserId'];
    $sql = "select * from member_social_network where iMemberId = '".$iMemberId."'";
    $db_id = $obj->MySQLSelect($sql);
    
    $username = $db_id[0]['vFacebookUserName'];
    $message = $_REQUEST['body'];
    
    #$message ='<h1>Uploaded new photo</h1>';
    #$message.='<img src="http://09php.com/demo/qme/public/images/user_img.png">';
    
    $access_token = $db_id[0]['vFacebookAccessToken'];
    $url=curl_init();
    
    $attachment=array('access_token'=>$access_token, 'message'=>$message);
    
    curl_setopt($url, CURLOPT_URL, "https://graph.facebook.com/".$username."/feed");
    curl_setopt($url, CURLOPT_POST, true);
    curl_setopt($url, CURLOPT_POSTFIELDS, $attachment);
    curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
    
    $result = curl_exec($url);
    echo $result;exit;
?>