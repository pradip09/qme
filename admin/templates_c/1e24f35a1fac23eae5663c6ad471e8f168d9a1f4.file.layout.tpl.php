<?php /* Smarty version Smarty-3.0.7, created on 2012-12-26 03:57:16
         compiled from "/home/qmemedia/public_html/admin/templates/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159169607850dac9fcaea859-95466475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e24f35a1fac23eae5663c6ad471e8f168d9a1f4' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/layout.tpl',
      1 => 1356511167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159169607850dac9fcaea859-95466475',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::Welcome to <?php echo $_smarty_tpl->getVariable('CPANEL_TITLE')->value;?>
 Control Panel  ::</title>


<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/wysiwyg.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/fullcalendar.css" rel="stylesheet" type="text/css" />
 <!-- Theme Start -->
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_theme'];?>
styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->

        <script type="text/javascript">
        var  admin_url = "<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
"; 
        </script>


</head>
<body>

<!-- Top header/black bar start -->
	<div id="header">
		<?php $_template = new Smarty_Internal_Template("header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>
 <!-- Top header/black bar end -->   
    
<!-- Left side bar start -->
        <div id="left">
<!-- Left side bar start -->

	<?php $_template = new Smarty_Internal_Template("left.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	</div>      
<!-- Left side bar start end -->   

<!-- Right side start -->     
        <div id="right">
		
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('include_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<!-- Footer start --> 
		<!--<p id="footer">&copy; Copyright 2011 php2india.com</p>-->
		<!-- Footer end -->  
        </div>
<!-- Right side end -->

<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jquery-latest.js"></script>
<script type="text/javascript" src="http://dwpe.googlecode.com/svn/trunk/_shared/EnhanceJS/enhance.js"></script>	
<script type='text/javascript' src='http://dwpe.googlecode.com/svn/trunk/charting/js/excanvas.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js'></script>
<script type='text/javascript' src='<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_javascript'];?>
jquery.wysiwyg.js'></script>
<script type='text/javascript' src='<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_javascript'];?>
visualize.jQuery.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_javascript'];?>
functions.js'></script>
<script type="text/javascript" src='<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_javascript'];?>
general.js'></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
validate.js"></script>

<script type='application/javascript' src='<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_javascript'];?>
fullcalendar.min.js'></script>

<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
fancybox/jquery.fancybox-1.3.4.css" media="screen" />


<script>
var	tsite_url = '<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_url'];?>
';
var	tpanel_url = '<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
';
var	tcp_javascript = '<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
';        
</script>

</body>
</html>
