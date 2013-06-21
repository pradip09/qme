<?php

$recent_activitieId = $_REQUEST['iRecentId'];
$user_id = $_REQUEST['iUserId'];
$comment_type = $_REQUEST['type'];
$item_id = $_REQUEST['itemid'];

$sql_comment = "select *, m.vName from comment AS cm LEFT JOIN members AS m ON(m.iMemberId = cm.user_id) where cm.comment_type ='".$comment_type."' AND cm.item_id ='".$item_id."'";
$db_comment = $obj->MySQLSelect($sql_comment);
$count = count($db_comment);
echo '['.$count.']&'.$recent_activitieId;

?>