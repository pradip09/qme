<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 12:46:45
         compiled from "/var/www/qme_theme/admin/templates/breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15637188834ffe79dd3fb4f8-82304393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc58be342fc2128ae671ddd035fcb9a8927df6fe' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/breadcrumbs.tpl',
      1 => 1342073965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15637188834ffe79dd3fb4f8-82304393',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul>	
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="#" title="">Sub Section</a></li>
		<li>/</li>
		<li class="current">Control Panel</li>
</ul>