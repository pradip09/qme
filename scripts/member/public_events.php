<?php
$generalobj->checkFrontAuthntication();

    $url = $_REQUEST['mamberurl'];
    $sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);
    
    if($db_user[0]['iMemberId'] == ''){

        header("location:".$tconfig["tsite_url"]."/home");

    }else{
        $iUserid = $db_user[0]['iMemberId'];

        $sqlevent="SELECT * FROM events WHERE iMemberId = '".$iUserid."'  AND eStatus = 'Active'";
        $db_events = $obj->MySQLSelect($sqlevent);
	
	 
        for($i = 0; $i < count($db_events); $i++)
        {
	     $db_events[$i][dEventDate]=date("m-d-Y",strtotime($db_events[$i][dEventDate]));
            $db_events[$i]['vFullDescription'] = $db_events[$i]['vDescription'];
            if($db_events[$i]['vEventImage'] =='' && !is_file(TPATH_SERVER_IMAGES_EVENT."/".$db_events[$i]['iMemberId']."/".$db_events[$i]['vEventImage'])){
			$db_events[$i]['vEventImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$db_events[$i]['vEventImage'] = $tconfig["tsite_upload_images_event"].$db_events[$i]['iMemberId']."/"."1_".$db_events[$i]['vEventImage'];
		}
            if(strlen($db_events[$i]['vDescription'])>15){
                
                $db_events[$i]['vDescription'] = $generalobj->limit_words($db_events[$i]['vDescription'],20);
            }
        }
    }
    
#echo "<pre>";
#print_r($db_events);
    $smarty->assign("event_info", $db_events);
    $smarty->assign("db_user", $db_user);
    $smarty->assign("iMemberid", $iUserid);
    $smarty->assign("db_browscamps", $db_browscamps);


?>