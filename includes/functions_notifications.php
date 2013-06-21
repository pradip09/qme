<?php
/*
|| #################################################################### ||
|| #                             ArrowChat                            # ||
|| # ---------------------------------------------------------------- # ||
|| #         Copyright ©2010 GloTouch LLC. All Rights Reserved.       # ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- ARROWCHAT IS NOT FREE SOFTWARE ---------------- # ||
|| #   http://www.arrowchat.com | http://www.arrowchat.com/license/   # ||
|| #################################################################### ||
*/

	function getMarkup($author_id, $author_name, $type, $message_time, $misc1, $misc2, $misc3) {
	
		$markup = "";
		$longago = getLogoAgo($message_time);
	
		$sql = "SELECT markup FROM arrowchat_notifications_markup WHERE type='".$type."'";
		$result = mysql_query($sql);
		if ($result && mysql_num_rows($result) > 0) {
			$row = mysql_fetch_array($result);
			$markup = $row['markup'];
			
			$markup = str_replace("{author_name}", $author_name, $markup);
			$markup = str_replace("{author_id}", $author_id, $markup);
			$markup = str_replace("{longago}", $longago, $markup);
			$markup = str_replace("{message_time}", $message_time, $markup);
			$markup = str_replace("{misc1}", $misc1, $markup);
			$markup = str_replace("{misc2}", $misc2, $markup);
			$markup = str_replace("{misc3}", $misc3, $markup);
		}
		
		return $markup;

	}

	function getLogoAgo($message_time) {
		$time = time();
		$longago = $time - $message_time;
		if ($longago < 60) {
			$longago = $longago . (($longago == 1) ? " second ago" : " seconds ago");
		} else if ($longago >= 60 && $longago < 3600) {
			$longago = round($longago / 60) . ((round($longago / 60) == 1) ? " minute ago" : " minutes ago");
		} else if ($longago >= 3600 && $longago < 86400) {
			$longago = round($longago / 3600) . ((round($longago / 3600) == 1) ? " hour ago" : " hours ago");
		} else if ($longago >= 86400 && $longago < 2073600) {
			$longago = round($longago / 86400) . ((round($longago / 86400) == 1) ? " day ago" : " days ago");
		} else if ($longago >= 2073600 && $longago < 24883200) {
			$longago = round($longago / 2073600) . ((round($longago / 2073600) == 1) ? " month ago" : " months ago");
		} else if ($longago >= 24883200) {
			$longago = round($longago / 24883200) . ((round($longago / 24883200) == 1) ? " year ago" : " years ago");
		}
			
		return $longago;
	}

?>