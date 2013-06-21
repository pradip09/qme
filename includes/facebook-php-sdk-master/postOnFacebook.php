<?php    
    $iMemberId = $_SESSION['iUserId'];
    $sql = "select * from member_social_network where iMemberId = '".$iMemberId."'";
    $db_id = $obj->MySQLSelect($sql);
    if(count($db_id)){
            require_once TPATH_ROOT.'/includes/facebook-php-sdk-master/src/facebook.php';
            $name = $db_id[0]['vFacebookName'];
            $username = $db_id[0]['vFacebookUserName'];
            $access_token = $db_id[0]['vFacebookAccessToken'];
            if($name != '' && $username != '' && $access_token!= ''){
                    $facebook = new Facebook(array(
                        'appId'  => $FB_APPID,
                        'secret' => $FB_APPSEC,
                        'cookie' => false,
                    ));
                    $token = $access_token;
                    
                    if($fbUploadType == 'PHOTO')
                    {
                        $sql = "select * from photo where iMemberId = '".$iMemberId."' AND iPhotoId='".$fbUploadId."'";
                        $db_photo_data = $obj->MySQLSelect($sql);
                       
                        $attachment = array('message' => $name.' Uploaded Photo on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_photo_data[0]['vPhotoTitle'],
                                'caption' => $db_photo_data[0]['dAddedDate'],
                                'link' => $site_url.'/publiPhotoalbum/'.$_SESSION['vMemberUrl'],
                                'description' => 'Click here to open photo gallery',
                                'picture' => $site_url.'/uploads/photo/'.$iMemberId.'/'.$db_photo_data[0]['vImage'],
                                
                                );
                    
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);    
                    }
		    elseif($fbUploadType == 'BLOG')
                    {
                        $sql_blog = "select * from blog where iMemberId = '".$iMemberId."' AND iBlogId='".$fbBlogId."'";
                        $db_blog_data = $obj->MySQLSelect($sql_blog);
                        
                        $attachment = array('message' => $name.' Posted Blog on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_blog_data[0]['vBlogTitle'],
                                'caption' => $db_blog_data[0]['dCreateDate'],
                                'link' => $site_url.'/public_blogs/'.$_SESSION['vMemberUrl'],
                                'description' => $db_blog_data[0]['vText'],
                                'picture' => $site_url.'/uploads/blog/'.$iMemberId.'/'.$db_blog_data[0]['vImage'],
                                //'actions' => array(array('name' => 'Action Text', 
                                //'link' => 'http://apps.facebook.com/xxxxxx/'))
                                );
                    
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);    
                    }
		    elseif($fbUploadType == 'POSTJOB')
                    {
                        $sql_job = "select * from post_job where iMemberId = '".$iMemberId."' AND iPostJobId='".$fbJobId."'";
                        $db_job_data = $obj->MySQLSelect($sql_job);
			
                        $attachment = array('message' => $name.' Posted  Job on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_job_data[0]['vSkill'],
                                'caption' => $db_job_data[0]['dAddedDate'],
                                'link' => $site_url.'/publicJob/'.$_SESSION['vMemberUrl'],
                                'description' => $db_job_data[0]['tDescription'],
                                'picture' => $site_url.'/public/images/member_user.png',
                                //'actions' => array(array('name' => 'Action Text', 
                                //'link' => 'http://apps.facebook.com/xxxxxx/'))
                                );
                    
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);    
                    }
		    elseif($fbUploadType == 'CONNECTIONS')
                    {
                        $sql_qmein = "select * from qmein where iMemberId = '".$iMemberId."' AND iQmeInId='".$fbQmeconId."'";
                        $db_qmein_data = $obj->MySQLSelect($sql_qmein);
                      
                       $attachment = array('message' => $name.' Posted Qme Connections on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_qmein_data[0]['Connect_With'],
                                'caption' => $db_qmein_data[0]['vOtherSkill'],
                                'description' => $db_qmein_data[0]['dAddedDate'],
				'picture' => $site_url.'/public/images/admin_user.png',
                                //'actions' => array(array('name' => 'Action Text', 
                                //'link' => 'http://apps.facebook.com/xxxxxx/'))
                                );
                     
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);    
                    }
		    elseif($fbUploadType == 'FUNDRAISER')
                    {
                        $sql_fund = "select * from request_fundraiser where  iFundraiserId='".$fbFundId."'";
                        $db_fund_data = $obj->MySQLSelect($sql_fund);
			
                      
                       $attachment = array('message' => $name.' Posted Fundraiser on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_fund_data[0]['vOrganizationName'],
                                'caption' => $db_fund_data[0]['vAdditionalDesign'],
                                'link' => $site_url.'/public_fund_capmp/'.$_SESSION['vMemberUrl'],
                                'description' => $db_fund_data[0]['vBrand'],
				 'picture' => $site_url.'/uploads/member/'.$iMemberId.'/2_'.$_SESSION['vProfileImage'],
                                
                                );
                     
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);    
                    }
		    elseif($fbUploadType == 'EVENT')
                    {
                        $sql_event = "select * from events where iMemberId = '".$iMemberId."' AND iEventId='".$fbEventId."'";
                        $db_event_data = $obj->MySQLSelect($sql_event);
                      
                       $attachment = array('message' => $name.' Posted Event on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_event_data[0]['vTitle'],
                                'caption' => $db_event_data[0]['dEventDate'],
                                'link' => $site_url.'/public_events/'.$_SESSION['vMemberUrl'],
                                'description' => $db_event_data[0]['vDescription'],
				'picture' => $site_url.'/uploads/event/'.$iMemberId.'/1_'.$db_event_data[0]['vEventImage'],
                                //'actions' => array(array('name' => 'Action Text', 
                                //'link' => 'http://apps.facebook.com/xxxxxx/'))$site_url.'/uploads/song/'.$iMemberId.'/'.$db_song_data[0]['vSong']
                                );
                     
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);    
                    }
		    elseif($fbUploadType == 'SONG')
                    {
                        $sql_song = "select * from song where iMemberId = '".$iMemberId."' AND iSongId='".$fbUploadsongId."'";
                        $db_song_data = $obj->MySQLSelect($sql_song);
			
			  $attachment = array('message' => $name.' Uploaded Song on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_song_data[0]['vSongTitle'],
				'caption' => $db_song_data[0]['dAddedDate'],
				'description' => 'Click here to play song',
                                'link' => $site_url.'/public_songs/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/public/images/mp3_icon.jpg',
                                );
			
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		     elseif($fbUploadType == 'VIDEO')
                    {
                        $sql_video = "select * from video where iMemberId = '".$iMemberId."' AND iVideoId='".$fbUploadvidId."'";
                        $db_video_data = $obj->MySQLSelect($sql_video);
			
			   $attachment = array('message' => $name.' Uploaded Video on MYQME.COM',
                                'access_token' => $token,
				'type'=>'video',
				'source'=> 'http://myqme.com/admin/public_html/music/player.swf', 
                                'picture' => $site_url.'/uploads/video_image/'.$iMemberId.'/'.$db_video_data[0]['vImage'],
				'name' => $db_video_data[0]['vVideoName'],
				'caption' => $db_video_data[0]['dAddedDate'],
				'description' => 'Click here to play video',
                                //'link' => $site_url.'/public_videos/'.$_SESSION['vMemberUrl'],
				
				//'picture' => $site_url.'/public/images/Video_icon1.png',
                                );
			
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		    elseif($fbUploadType == 'POSTCAMPAIGN')
                    {
                        $sql_campaign = "select * from post_campaign where iMemberId = '".$iMemberId."' AND iCampaignId='".$fbPostcampId."'";
                        $db_postcampaign_data = $obj->MySQLSelect($sql_campaign);
			
			   $attachment = array('message' => $name.' Posted Campaign on MYQME.COM',
                                'access_token' => $token,
                                'name' => $db_postcampaign_data[0]['vCampaignName'],
				'caption' => $db_postcampaign_data[0]['dAddedDate'],
				//'caption' => 'Click here to play video',
				'description' => $db_postcampaign_data[0]['tContent'],
                                'link' => $site_url.'/publicCompaign/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/uploads/campaign/member/'.$iMemberId.'/2_'.$db_postcampaign_data[0]['vImage'],
				
                                );
			
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		    elseif($fbUploadType == 'BANNER')
                    {
                        $sql_banner = "select * from banner_image where iMemberId = '".$iMemberId."' AND iBannerId='".$fbUploadbannerId."'";
                        $db_banner_data = $obj->MySQLSelect($sql_banner);
			
			   $attachment = array('message' => $name.' Uploaded Banner on MYQME.COM',
                                'access_token' => $token,                                
				'name' => 'Click here to see banner',
				//'caption' => 'Click here to see banner',
				'description' => 'A social platform designed to reward you.Manage your social world from Qme and get rewarded for connecting and sharing.Connect to friends + Connect to business + Share + Earn = SMART SOCIAL YOU!',
                                'link' => $site_url.'/'.$_SESSION['vMemberUrl'],				
				'picture' => $site_url.'/uploads/member/'.$iMemberId.'/banner/'.$db_banner_data[0]['vBannerImage'],
                                );
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		    elseif($fbGeneralItemType == 'GENERAL_ITEMS')
                    {
                        $sql_generalitem = "select * from  product_general_item where iMemberId = '".$iMemberId."' AND iProductId='".$fbGeneralItemId."'";
                        $db_generalitem_data = $obj->MySQLSelect($sql_generalitem);
			
			   $attachment = array('message' => $name.' Uploaded General Item Product on MYQME.COM',
                                'access_token' => $token,                                
				'name' => $db_generalitem_data[0]['vProductName'],
				'caption' => 'Click here to see General Item',
				'description' => $db_generalitem_data[0]['tDescription'],
                                'link' => $site_url.'/publicMystore/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/uploads/store/'.$db_generalitem_data[0]['iStoreCategoryId'].'/'.$db_generalitem_data[0]['iProductId'].'/2_'.$db_generalitem_data[0]['vProductImage'],
                                //'picture' => $site_url.'/public/images/demo-icon.jpg',
			        );
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		    elseif($fbClothingType == 'CLOTHING')
                    {
                        $sql_clothing = "select * from  product_clothing_accessories where iMemberId = '".$iMemberId."' AND iProductId='".$fbClothingId."'";
                        $db_clothing_data = $obj->MySQLSelect($sql_clothing);
			
			   $attachment = array('message' => $name.' Uploaded Clothing Product item on MYQME.COM',
                                'access_token' => $token,                                
				'name' => $db_clothing_data[0]['vProductName'],
				'caption' => 'Click here to see Clothing Item Product',
				'description' => $db_clothing_data[0]['tProductDescription'],
                                'link' => $site_url.'/publicMystore/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/uploads/store/'.$db_clothing_data[0]['iStoreCategoryId'].'/'.$db_clothing_data[0]['iProductId'].'/2_'.$db_clothing_data[0]['vProductImage'],
				//'picture' => $site_url.'/public/images/demo-icon.jpg',
                                );
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		    elseif($fbAutomotiveType == 'AUTOMOTIVE')
                    {
                        $sql_automotive = "select * from  product_automotive where iMemberId = '".$iMemberId."' AND iProductId='".$fbAutomotiveId."'";
                        $db_automotive_data = $obj->MySQLSelect($sql_automotive);
			
			   $attachment = array('message' => $name.' Uploaded Automotive Product on MYQME.COM',
                                'access_token' => $token,                                
				'name' => $db_automotive_data[0]['vType'],
				'caption' => 'Click here to see Automotive product',
				'description' => $db_automotive_data[0]['tDescription'],
                                'link' => $site_url.'/publicMystore/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/uploads/store/'.$db_automotive_data[0]['iStoreCategoryId'].'/'.$db_automotive_data[0]['iProductId'].'/2_'.$db_automotive_data[0]['vVehicleImage'],
				
                                );
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		    elseif($fbRealestateType == 'REALESTATE')
                    {
                        $sql_realestate = "select * from  product_real_estate where iMemberId = '".$iMemberId."' AND iProductId='".$fbRealestateId."'";
                        $db_realestate_data = $obj->MySQLSelect($sql_realestate);
			
			   $attachment = array('message' => $name.' Uploaded Realestate Product on MYQME.COM',
                                'access_token' => $token,                                
				'name' => $db_realestate_data[0]['vFirstName'],
				'caption' => 'Click here to see Realestate product',
				'description' => $db_realestate_data[0]['tDescription'],
                                'link' => $site_url.'/publicMystore/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/uploads/store/'.$db_realestate_data[0]['iStoreCategoryId'].'/'.$db_realestate_data[0]['iProductId'].'/2_'.$db_realestate_data[0]['vImage'],
				
                                );
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		     elseif($fbUploadType == 'FRIENDREQUEST')
                    {
                        $sql_friend = "select * from  qme_friend where iMemberId = '".$iMemberId."' AND iFriendRequestId='".$fbUploadId."'";
                        $db_friend_data = $obj->MySQLSelect($sql_friend);
			
			   $attachment = array('message' => $name.' accepted one friend request on MYQME.COM',
                                'access_token' => $token,                                
				'caption' => 'Click here to see Friend list',
				//'description' => $db_realestate_data[0]['tDescription'],
                                'link' => $site_url.'/public_frientlist/'.$_SESSION['vMemberUrl'],
				'picture' => $site_url.'/public/images/friends-img.png',
                                );
                        $result = $facebook->api('/'.$username.'/feed/', 'post', $attachment);
                    }
		   
            }
    }
?>