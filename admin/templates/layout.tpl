<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Welcome to {$CPANEL_TITLE} Control Panel  ::</title>


<link href="{$tconfig.tsite_stylesheets}cp/main.css" rel="stylesheet" type="text/css" />
<link href="{$tconfig.tsite_stylesheets}cp/wysiwyg.css" rel="stylesheet" type="text/css" />
<link href="{$tconfig.tsite_stylesheets}cp/fullcalendar.css" rel="stylesheet" type="text/css" />
 <!-- Theme Start -->
<link href="{$tconfig.tpanel_theme}styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->
{literal}
        <script type="text/javascript">
        var  admin_url = "{/literal}{$admin_url}{literal}"; 
        </script>
{/literal}

</head>
<body>

<!-- Top header/black bar start -->
	<div id="header">
		{include file="header.tpl"}
	</div>
 <!-- Top header/black bar end -->   
    
<!-- Left side bar start -->
        <div id="left">
<!-- Left side bar start -->

	{include file="left.tpl"}
	</div>      
<!-- Left side bar start end -->   

<!-- Right side start -->     
        <div id="right">
		
		{include file="$include_template"}
		<!-- Footer start --> 
		<!--<p id="footer">&copy; Copyright 2011 php2india.com</p>-->
		<!-- Footer end -->  
        </div>
<!-- Right side end -->

<script language="JavaScript" src="{$tconfig.tcp_javascript}jquery-latest.js"></script>
<script type="text/javascript" src="http://dwpe.googlecode.com/svn/trunk/_shared/EnhanceJS/enhance.js"></script>	
<script type='text/javascript' src='http://dwpe.googlecode.com/svn/trunk/charting/js/excanvas.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js'></script>
<script type='text/javascript' src='{$tconfig.tsite_javascript}jquery.wysiwyg.js'></script>
<script type='text/javascript' src='{$tconfig.tsite_javascript}visualize.jQuery.js'></script>
<script type="text/javascript" src='{$tconfig.tsite_javascript}functions.js'></script>
<script type="text/javascript" src='{$tconfig.tsite_javascript}general.js'></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}validate.js"></script>

<script type='application/javascript' src='{$tconfig.tsite_javascript}fullcalendar.min.js'></script>

<script type="text/javascript" src="{$tconfig["tsite_javascript"]}fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="{$tconfig["tsite_javascript"]}fancybox/jquery.fancybox-1.3.4.css" media="screen" />

{literal}
<script>
var	tsite_url = '{/literal}{$tconfig.tsite_url}{literal}';
var	tpanel_url = '{/literal}{$tconfig.tpanel_url}{literal}';
var	tcp_javascript = '{/literal}{$tconfig.tcp_javascript}{literal}';        
</script>
{/literal}
</body>
</html>
