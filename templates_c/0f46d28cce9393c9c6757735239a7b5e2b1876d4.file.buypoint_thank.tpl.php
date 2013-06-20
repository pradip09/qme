<?php /* Smarty version Smarty-3.0.7, created on 2013-03-01 20:33:54
         compiled from "templates/member/buypoint_thank.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21425270395130c35a9ae022-44024217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f46d28cce9393c9c6757735239a7b5e2b1876d4' => 
    array (
      0 => 'templates/member/buypoint_thank.tpl',
      1 => 1359361708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21425270395130c35a9ae022-44024217',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
        <form id="frmfrngreg" name="frmfrngreg" method="post" enctype="multipart/form-data" action="">
            <input type="hidden" name="friend_code" id="friend_code" value="<?php echo $_smarty_tpl->getVariable('code')->value;?>
">
        <div class="register_page" style="padding: 100px 0px 0px 0px; margin-left: 0px;">
                <div class="reg_title" style="padding: 0px; text-align: center;">Thank you for your QME points Purchase.</div>
                <div style="padding: 10px 0px 0px 0px; text-align: center;">Your order details has been sent to your email.</div>
                 <div style="padding: 10px 0px 0px 0px; text-align: center;"><a style="text-decoration:none;color:blue;" href="<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
/buypoints">Click here back to Purchase.</a></div>
        </div>
        </form>
        <div class="cl"></div>
</div>

