<?php
unset($_SESSION['iUserId']);
unset($_SESSION['Name']);
unset($_SESSION['vEmail']);
unset($_SESSION['Cart']);
$var_msg="You are logout successfully";
header("Location: ".$tconfig["tsite_url"]."/home/".$var_msg);
exit;
?>