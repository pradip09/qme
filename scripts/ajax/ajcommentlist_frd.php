<?php

   if($_REQUEST['comment'])
   {
      $Data['comment'] = $_REQUEST['comment'];
      $Data['user_id'] = $_REQUEST['iUserId'];
      $Data['comment_type'] = $_REQUEST['type'];
      $Data['item_id'] = $_REQUEST['itemid'];
      $Data['datetime'] = date('Y-m-d H:i:s');
      $id = $obj->MySQLQueryPerform("comment",$Data,'insert');
   }
   $recent_activitieId = $_REQUEST['iRecentId'];
   $user_id = $_REQUEST['iUserId'];
   $comment_type = $_REQUEST['type'];
   $item_id = $_REQUEST['itemid'];
   $datatime = date('Y-m-d H:i:s');

   $sql_comment = "select *, m.vName from comment AS cm LEFT JOIN members AS m ON(m.iMemberId = cm.user_id) where cm.comment_type ='".$comment_type."' AND cm.item_id ='".$item_id."'";
   $db_comment = $obj->MySQLSelect($sql_comment);
   $count = count($db_comment);
   $html = '';
   $html .= '<div class="commentpopup">';
   $html .= '<div class="commentbox">';
   $html .= '<div class="comcontent">';
   for($i = 0 ; $i < $count ; $i++)
   {
       $html .= '<div class="commentmainbox">';
       $html .= '<div class="commenttext">'.$db_comment[$i]['vName'].'  :'.'</div><div class="commenttext1">'.$db_comment[$i]['comment'].'</div></div>';
       
   }
   $html .= '</div>';
   $html .= '<textarea name="" cols="" rows="" class="commentinput" id="usercomment" class="singinput"></textarea>';
   $html .= '<div class="btncommnet" onclick="savecomment4('.$recent_activitieId.','.$user_id.',\''.$comment_type.'\','.$item_id.');"><input name="" type="button" class="btnbg " style="float:right;" value="comment" /></div><div class="cl"></div></div></div>';
   $html .= '</div>';

echo $html;exit;

?>
