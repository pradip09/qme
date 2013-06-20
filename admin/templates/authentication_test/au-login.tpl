<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CP Login</title>
<link href="{$tconfig.tsite_stylesheets}cp/login.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="{$tconfig.tcp_javascript}jquery-latest.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}validate.js"></script>    
</head>
<body>
	
	<div id="logincontainer">
	<div style="padding: 0px 0px 66px 143px;">
	 	<img style="padding: 2px 0 0 10px" src="{$tconfig.tpanel_img}logo.png" alt="AdminCP" class="logo" />
	</div>
        {if $var_msg neq ''}
        <div style="text-align:center;">
            {$var_msg}
        </div>
        {/if}
	<div id="showloginid">
		<div id="loginbox">
			<form name="frmlogin" id="frmlogin" action="index.php?file=au-login" method="post"  >
			<input type="hidden" name="data[mode]" value="authenticate">
			<div class="inputcontainer">
			    <img src="{$tconfig.tpanel_img}icons/icon_username.png" alt="Username" />
			    <label for="username">Username:</label>
			    <input type="text"  name="vUserName" id="vUserName" title="User Name"/>
			</div>
			<div class="inputcontainer">
			    <img src="{$tconfig.tpanel_img}icons/icon_locked.png" alt="Password" />
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
			    <img src="{$tconfig.tpanel_img}icons/icon_username.png" alt="Username" />
			    <label for="username">Email:</label>
			    <input type="text"  name="vEmail" id="vEmail" title="Email" lang="{literal}*{E}{/literal}"/>
			</div>
			<input type="submit" class="loginsubmit" value="Submit"  title="Submit" onclick="return validate(document.frmforgot);"/>
			<p><a href="javascript:void(0);" title="Back to Login" onclick="showlogin();">Back to Login</a></p>
		    </form>
		</div>
	</div>	
	
    </div>
</body>
</html>
{literal}
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
{/literal}





