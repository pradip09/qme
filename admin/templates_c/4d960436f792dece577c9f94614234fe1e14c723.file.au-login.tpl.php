<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 12:24:21
         compiled from "/var/www/quotation/admin/templates/authentication/au-login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7691938394ffe749d9572c8-45365997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d960436f792dece577c9f94614234fe1e14c723' => 
    array (
      0 => '/var/www/quotation/admin/templates/authentication/au-login.tpl',
      1 => 1342076056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7691938394ffe749d9572c8-45365997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CP Login</title>
<link href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_stylesheets'];?>
cp/login.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jquery-latest.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
validate.js"></script>    
</head>
<body>
	<div id="logincontainer">
    	<h1>CP<span>access</span></h1>
        <?php if ($_smarty_tpl->getVariable('var_msg')->value!=''){?>
        <div style="text-align:center;">
            <?php echo $_smarty_tpl->getVariable('var_msg')->value;?>

        </div>
        <?php }?>
	<div id="showloginid">
		<div id="loginbox">
			<form name="frmlogin" id="frmlogin" action="index.php?file=au-login" method="post"  >
			<input type="hidden" name="data[mode]" value="authenticate">
			<div class="inputcontainer">
			    <img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_username.png" alt="Username" />
			    <label for="username">Username:</label>
			    <input type="text"  name="vUserName" id="vUserName" title="User Name"/>
			</div>
			<div class="inputcontainer">
			    <img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_locked.png" alt="Password" />
			    <label for="password">Password:</label>
			    <input type="password"  id="vPassword" name="vPassword" title="Password"/>
			</div>
			<input type="submit" class="loginsubmit" value="Submit"  title="Submit" onclick="return CheckLogin();"/>
			<p><a href="javascript:void(0);" title="Forgoteen Password?" onclick="showforgot();">Forgotten Password?</a></p>
		    </form>
		</div>
	</div>
	<div id="forgotpasswordid" style="display:none;">
		<div id="loginbox">
			<form name="frmforgot" id="frmforgot" action="index.php?file=au-login" method="post"  >
			<input type="hidden" name="data[mode]" value="forgotpassword">
			<div class="inputcontainer">
			    <img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_username.png" alt="Username" />
			    <label for="username">Email:</label>
			    <input type="text"  name="vEmail" id="vEmail" title="Email" lang="*{E}"/>
			</div>
			<input type="submit" class="loginsubmit" value="Submit"  title="Submit" onclick="return validate(document.frmforgot);"/>
			<p><a href="javascript:void(0);" title="Back to Login" onclick="showlogin();">Back to Login</a></p>
		    </form>
		</div>
	</div>	
	
    </div>
</body>
</html>

<script type="text/javascript">
function CheckLogin()
{
	if (document.frmlogin.vUserName.value == "")
	{
		alert("Enter your Username");
		document.frmlogin.vUserName.focus();
		return false;
	}
	if (document.frmlogin.vPassword.value == "")
	{
		alert("Enter your password");
		document.frmlogin.vPassword.focus();
		return false;
	}
	document.frmlogin.submit()
}

</script>
<script>
function showforgot(){
    jQuery("#showloginid").hide("slow");
    jQuery("#forgotpasswordid").show("slow");
}
function showlogin(){
    jQuery("#forgotpasswordid").hide("slow");
    jQuery("#showloginid").show("slow");
}  
</script>






