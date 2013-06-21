<?php

$generalobj->checkFrontAuthntication();
    $url = $_REQUEST['mamberurl'];
    $sql_user = "select * from members where vMemberUrl='".$url."'";
    $db_user = $obj->MySQLSelect($sql_user);
    
    if($db_user[0]['iMemberId'] == ''){

        header("location:".$tconfig["tsite_url"]."/home");

    }else{
        $iUserid = $db_user[0]['iMemberId'];

        $sqlblog="SELECT * FROM blog WHERE iMemberId = '".$iUserid."' AND eStatus = 'Active'";

        $db_blogs = $obj->MySQLSelect($sqlblog);

        for($i = 0; $i < count($db_blogs); $i++)
        {
            $db_blogs[$i]['vFullText'] = $db_blogs[$i]['vText'];
            if($db_blogs[$i]['vImage'] =='' && !is_file(TPATH_SERVER_IMAGES_BLOG."/".$db_blogs[$i]['iMemberId']."/".$db_blogs[$i]['vImage'])){
			$db_blogs[$i]['vImage'] = $tconfig["front_images"]."user_img.png";
		}else{
			$db_blogs[$i]['vImage'] = $tconfig["tsite_upload_images_blog"].$db_blogs[$i]['iMemberId']."/"."1_".$db_blogs[$i]['vImage'];
		}
		$db_blogs[$i]['dCreateDate'] = date('m-d-Y',strtotime($db_blogs[$i]['dCreateDate']));
		
		$db_blogs[$i]['vText'] = $generalobj->limit_words($db_blogs[$i]['vText'],30);
        }
    }
    
#echo "<pre>";
#print_r($db_blogs);exit;
    $smarty->assign("BlogListArr", $db_blogs);
    $smarty->assign("db_user", $db_user);
    $smarty->assign("iMemberid", $iUserid);
    $smarty->assign("db_browscamps", $db_browscamps);


?>