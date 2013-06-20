<div style="display:none;">
    <div  id="LoginId" class="signing" style="padding-bottom:15px;">
	<div id="loginmsgid1" style="text-align:center;line-height:24px;color:red; font-size:18px;"></div>
	<div class="singheader"><img src="{$tconfig["front_images"]}user-login.png" width="161" height="38" alt="" /></div>
		
		<input name="Email" id="Email" class="singinput" type="text" placeholder="E-mail" tabindex="1" value="{if $cookie_name neq ''}{$cookie_name}{/if}" />
		<input name="Password1" id="Password1" class="singinput" type="password" placeholder="Password" tabindex="2" value="{if $cookie_password neq ''}{$cookie_password}{/if}"/>
	
	<div class="singwith">
	    <div class="divleft">
		<div style="float: left;padding-bottom: 2px;vertical-align: middle;width: 19px;">
		   
		    <input name="remember" id="remember" type="checkbox"  tabindex="3" {if $cookie_check eq 1}checked{/if}/>
		</div>
		<label for="radio">  Remember me    </label>
	    </div>
	    <div class="divright">
		<a href="#Forgotpass" id="forgotpass">Forgot your password ?</a>
	    </div>
	</div>

	<div class="singbox">
	    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
		    <td><img src="{$tconfig["front_images"]}img2..png" width="57" height="50" alt="" /></td>
		    <td align="right"><a href="javascript:void(0);" onclick="validateform1();"><img src="{$tconfig["front_images"]}login.png" /></a>
		</tr>
	    </table>
	</div>
    <div class="singwith" style="margin-top:18px;">
	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
	<td class="singtext">Connect + Living + Business + Entertain = You</td>
        <!--<td width="2%"><img src="{$tconfig["front_images"]}icon1.png" width="20" height="13" alt="" /></td>
        <td class="singtext"> Follow Sprout Social</td>
        <td width="2%"><img src="{$tconfig["front_images"]}icon2.png" width="16" height="16" alt="" /></td>
        <td class="singtext">Like Sprout Social</td>-->
      </tr>
    </table>
    </div>
    </div>
</div>
{literal}
<script type="text/javascript">
function validateform1(){
    
	$("#loginmsgid1").removeClass('popup-err').addClass('errormsg').text('Validating....').fadeIn(1000);
	var extra='';
	if($('#Email')){
		if($('#Email').val() ==''){
			$("#loginmsgid1").html('Please enter username').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var vEmail = $('#Email').val();
			var msg = isValidEmail(vEmail);
			if(msg !='0'){
				$("#loginmsgid1").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}else{
				extra+='&vEmail='+vEmail;
			}
		}
	}
	
	if($('#Password1')){
		if($('#Password1').val() ==''){
			$('#loginmsgid1').html("Please enter your password").addClass('errormsg_login').fadeTo(900,1);
			return false;
		}else{
			 var vPassword = $('#Password1').val();
			extra+='&vPassword='+vPassword;
		}
	}
	if($('#remember'))
	{
		if ($('#remember').is(':checked')) {
				remember.value='Yes';
		} else {
				remember.value='No';
		}
		extra+='&remember='+remember.value;
	}
	//alert(extra);
    var url = site_url+"/index.php?file=a-ajlogin";
    var pars = extra;
    
	$.post(url+pars,
            function(data) {
                var khtml = data;
		//alert(khtml);
		if(data == 'success')
		{
		    window.location=site_url+"/qmeoops/"+data;
		}
		else
		{
		    $('#loginmsgid1').html(data);
		}
		    
		
       });
}
</script>
{/literal}
