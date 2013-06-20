
{if !$file|@in_array:$notincludeindex}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Qme</title>
<link href="{$tconfig["tsite_url"]}/public/css/style.css" rel="stylesheet" type="text/css" />
<link href="{$tconfig["tsite_url"]}/public/css/home.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}general.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}scriptslider.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}DD_roundies_0.0.2a.js"></script>
<link rel="stylesheet" type="text/css" href="{$tconfig["front_javascript"]}/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jlogin.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}tabber.js"></script>
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/css/example.css" TYPE="text/css" MEDIA="screen">
<!--<script src="{$tconfig["front_javascript"]}jquery.js" type="text/javascript"></script>-->
<script src="{$tconfig["front_javascript"]}jquery.selectbox-0.5.js" type="text/javascript"></script>
<script src="{$tconfig["front_javascript"]}jqueryselectbox.js" type="text/javascript"></script>
<script src="{$tconfig["front_javascript"]}checkbox.js" type="text/javascript"></script>
<script src="{$tconfig["front_javascript"]}css_browser_selector.js" type="text/javascript"></script>


{literal}
        <script type="text/javascript">
        var  site_url = "{/literal}{$site_url}{literal}"; 
	   /* IE only */
		DD_roundies.addRule('.update_txt a', '4 4px 0px 0px');	
		DD_roundies.addRule('.choose_plan_border_bg', '8 8px 8px 8px');	  
        </script>
{/literal}

</head>
{if $file eq 'c-home'}
<body>

{include file="top/top.tpl"}
{include file= $include_script_template}
{include file="bottom/bottom.tpl"}

</body>
{else}
<body class="inner_page">

{include file="top/top.tpl"}
{include file= $include_script_template}
{include file="bottom/bottom.tpl"}

</body>
{/if}
</html>
{else}
{include file= $include_script_template}
{/if}
