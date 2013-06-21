<?php

#echo "<pre>";
#print_r($_REQUEST);exit;

$start = $_REQUEST['start'];
$recent_activitieId = $_REQUEST['iRecentId'];
$user_id = $_REQUEST['iUserId'];
$like_type = $_REQUEST['type'];
$item_id = $_REQUEST['itemid'];
$datatime = date('Y-m-d H:i:s');
$page = $_REQUEST['page'];

$sql_like = "select * from qme_like where user_id ='".$user_id."' AND like_type ='".$like_type."' AND item_id ='".$item_id."'";
$db_like = $obj->MySQLSelect($sql_like);
if($start == '1')
{
if($db_like[0]['iLikeId'] == '')
{
    $Data['user_id'] = $user_id;
    $Data['like_type'] = $like_type;
    $Data['item_id'] = $item_id;
    $Data['datatime'] = $datatime;
    $id = $obj->MySQLQueryPerform("qme_like",$Data,'insert');
    
}else{
    $user_id = $_REQUEST['iUserId'];
    $like_type = $_REQUEST['type'];
    $item_id = $_REQUEST['itemid'];
    $where = " user_id = '".$user_id."' AND like_type = '".$like_type."' AND item_id = '".$item_id."'";
    $sql="Delete from qme_like where ".$where; 
    $db_sql=$obj->sql_query($sql);
    
}
}
$sql_like = "select * from qme_like where user_id ='".$user_id."' AND like_type ='".$like_type."' AND item_id ='".$item_id."'";
$db_like = $obj->MySQLSelect($sql_like);

$sql_likecount = "select * from qme_like where like_type ='".$like_type."' AND item_id ='".$item_id."'";
$db_likecount = $obj->MySQLSelect($sql_likecount);
$count = count($db_likecount);

if($db_like[0]['iLikeId'] != '')
    {
        $html = '';
        if($count != '0' || $count != '')
            {
            $html .= '['.$count.'] Unlike';
            $html .=  '&'.$recent_activitieId;
            echo $html;exit;    
            }
        else
            {
            $html .= 'Unlike';
            $html .=  '&'.$recent_activitieId;
            echo $html;exit;    
            }
    }
else{
        $html = '';
        if($count != '0' || $count != '')
            {
            $html .= '['.$count.'] Qlike';
            $html .=  '&'.$recent_activitieId;
            echo $html;exit;    
            }
        else
            {
            $html .= 'Qlike';
            $html .=  '&'.$recent_activitieId;
            echo $html;exit;    
            }
    }

?>