<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 11:49:34
         compiled from "/var/www/quotation/admin/templates/breadcrumbs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11440903774ffe6c768cf547-36209600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f86115bae619df5add6c289529117c814874b807' => 
    array (
      0 => '/var/www/quotation/admin/templates/breadcrumbs.tpl',
      1 => 1342073965,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11440903774ffe6c768cf547-36209600',
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