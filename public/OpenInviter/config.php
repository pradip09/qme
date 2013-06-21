<?php
session_start();
$openinviter_settings=array(
'username'=>"demodev", 'private_key'=>"b90a43da5ae430b34805486f4fb0138e", 'cookie_path'=>"/tmp", 'message_body'=>"You are invited to http://myqme.com/sign_up/".$_SESSION['vMemberUrl'], 'message_subject'=>" is inviting you to http://myqme.com/qme/", 'transport'=>"curl", 'local_debug'=>"on_error", 'remote_debug'=>"", 'hosted'=>"", 'proxies'=>array(),
'stats'=>"", 'plugins_cache_time'=>"1800", 'plugins_cache_file'=>"oi_plugins.php", 'update_files'=>"1", 'stats_user'=>"", 'stats_password'=>"");
?>