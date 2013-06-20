<?php

session_destroy();
header("location:".$tconfig["tpanel_url"]."/");
exit();

?>