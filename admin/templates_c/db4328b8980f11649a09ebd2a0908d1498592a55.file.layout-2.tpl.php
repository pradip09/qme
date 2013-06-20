<?php /* Smarty version Smarty-3.0.7, created on 2012-07-20 18:14:05
         compiled from "/var/www/qme/admin/templates/layout-2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:169424332150095295c20279-19651221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db4328b8980f11649a09ebd2a0908d1498592a55' => 
    array (
      0 => '/var/www/qme/admin/templates/layout-2.tpl',
      1 => 1342788104,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169424332150095295c20279-19651221',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->getVariable('CPANEL_TITLE')->value;?>
</title>
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/layout.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/wysiwyg.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/login.css" rel="stylesheet" type="text/css" />
 <!-- Theme Start -->
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_theme'];?>
styles.css" rel="stylesheet" type="text/css" />
<!-- Theme End -->
</head>
<body id="homepage">
		<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('include_template')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
</body>
</html>
