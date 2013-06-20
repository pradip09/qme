<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<div class="fix_widthhome">
	<div class="main_body_box">
		<div id="top_area">
			<h1 class="title_heading">What is <span>QME</span><span style="color:#3B4648;margin-left:4px;">?</span></h1>
			<p> <b>{$qme[0].tMetaTitle}</b>
				{$qme[0].lContents}</p>
			<a href="#signup" class="btnget" id="popregister"></a> </div>
	<div style="display:none;">
	<div id="signup" class="registerbg">
		<div id="registerwhitebg">
			<div id="registermsgid" style="text-align:center;line-height:24px; color:red; font-size:18px;"></div>
			<div class="registertopbg">
				<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tr>
						<td width="50%" class="rightborder"><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="17%" align="center"><img src="{$tconfig["front_images"]}img_2.png" width="24" height="23" alt="" /></td>
									<td width="68" align="center"><img src="{$tconfig["front_images"]}img_3.png" width="47" height="52" alt="" /></td>
									<td class="greentext">Create Your Free Account</td>
								</tr>
							</table></td>
						<td><table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="17%" align="center"><img src="{$tconfig["front_images"]}img_4.png" width="26" height="23" alt="" /></td>
									<td width="68" align="center"><img src="{$tconfig["front_images"]}img_5.png" alt="" /></td>
									<td class="graytext"><div class="texta"><a href="#" id='Fblogin'>Sign in with Facebook</a></div></td>
								</tr>
							</table></td>
					</tr>
				</table>
				<div class="arrowwhite"><img src="{$tconfig["front_images"]}arrow.png" width="16" height="12" alt="" /></div>
			</div>
			<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="45%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="50%"><input name="vFirstName" id="vfirstName" type="text" class="registerinput" placeholder="First name" /></td>
								<td><input name="vLastName" id="vlastName" type="text" class="registerinput" placeholder="Last name" /></td>
							</tr>
						</table>
						<input id="vemailId" name="vEmailId" type="text" class="registerinput1" placeholder="Email" />
						<input name="Password" id="password" type="password" class="registerinput1" placeholder="Password" />
						<input name="confPassword" id="ConnfPassword" type="password" class="registerinput1" placeholder="Confirm Password" />
						<div class="singbox" style="margin-top: 15px; width: 371px; padding:4px 0px;">
							<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td width="75%" class="registerwhitetext">By clicking 'Create Account' you agree to<br />
										the <strong><a href="#Term1" id="term1" >Terms of Service and Privacy policies.</a></strong><br /></td>
									<td width="25%" align="right"><a href="javascript:void(0);" onclick="validform();" ><img src="{$tconfig["front_images"]}create-account.png"/></a></td>
								</tr>
							</table>
						</div></td>
					<td align="center"><img src="{$tconfig["front_images"]}img5.png" width="220" height="177" alt="" /></td>
				</tr>
			</table>
		</div>
	</div>
	</div>
<div style="display:none;">
<div id="Term1" class="readpoppup" style="position:relative;">
<div >
<a href="#signup" id="signup12"><div style="position:absolute; right:-4px; top:-4px;  z-index:9999999999999999;"><img src="{$tconfig["front_images"]}close.png" alt="" /></div></a>
</div>
		
		<div style="height:255px; overflow-y:scroll;" >
		
			<div class="popupheadding">Terms and Conditions</div>
			{if  $db_term|@count gt 0}
			{section name=i loop=$db_term}
			<div class="popuptext"> {$db_term[i].lContents} </div>
			{/section}
			{else}
			{/if}
		</div>
	</div>
	{literal}
	<script type="text/javascript">
		$(document).ready(function(){
		$('#signup12').fancybox({
			'overlayShow'	: true,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic',
			'margin' : '0',
			'padding' : '0',
			'scrolling' : 'no'
		});
		});
	</script>
	{/literal}
</div>
		<!--end toparea-->
		
<!-- bottom four-->		
<div id="memberbox">
	<div class="home_tab"><h3>{$hometabmember[0].vTitle}</h3>
	<p>{$hometabmember[0].tSortDescription}</p>
	<div class="learnmore"><a class="formember" href="#members">(Learn more)</a></div>
	<div class="imgbox"><a class="formember" href="#members"><img src="{$tconfig["tsite_upload_images_hometab"]}/{$hometabmember[0].vImage}" width="245" height="178" alt="" /></a></div>
	</div>
	
	<div class="home_tab"><h3>{$hometabpro[0].vTitle}</h3>
	<p>{$hometabpro[0].tSortDescription}</p>
	<div class="learnmore"><a class="forprof" href="#professionals">(Learn more)</a></div>
	<div class="imgbox"><a class="forprof" href="#professionals"><img src="{$tconfig["tsite_upload_images_hometab"]}/{$hometabpro[0].vImage}" width="245" height="178" alt="" /></a></div>
	</div>
	
	
	<div class="home_tab"><h3>{$hometabbus[0].vTitle}</h3>
	<p>{$hometabbus[0].tSortDescription}</p>
	<div class="learnmore"><a class="forbiss" href="#businesses">(Learn more)</a></div>
	<div class="imgbox"><a class="forbiss" href="#businesses"><img src="{$tconfig["tsite_upload_images_hometab"]}/{$hometabbus[0].vImage}" width="245" height="178" alt="" /></a></div>
	</div>
	
	
	<div class="home_tab"><h3>{$hometabnonprofit[0].vTitle}</h3>
	<p>{$hometabnonprofit[0].tSortDescription}</p>
	<div class="learnmore"><a class="fornonprofit" href="#nonprofits">(Learn more)</a></div>
	<div class="imgbox"><a class="fornonprofit" href="#nonprofits"><img src="{$tconfig["tsite_upload_images_hometab"]}/{$hometabnonprofit[0].vImage}" width="245" height="178" alt="" /></a></div>
	</div>
		
<div class="cl"></div>

</div>
 		
<!--end bottom four-->				
		<div class="clear"></div>
		<div class="spacer40"></div>	
		<div class="cl"></div>
	</div>
</div>
</div>
</div>
</div>
<!---bottom seven part start here--->

<!---bottom seven part end here--->
<!--bottom new four-->
<div style="display:none;">
	<div id="members" class="readpoppup">
		<div>
			<div class="popupheadding">{$hometabmember[0].vTitle}</div>
			<div class="popuptext"> {$hometabmember[0].tLongDescription} </div>
		</div>
	</div>
</div>
<div style="display:none;">
	<div id="professionals" class="readpoppup">
		<div>
			<div class="popupheadding">{$hometabpro[0].vTitle}</div>
			<div class="popuptext"> {$hometabpro[0].tLongDescription} </div>
		</div>
	</div>
</div>
<div style="display:none;">
	<div id="businesses" class="readpoppup">
		<div>
			<div class="popupheadding">{$hometabbus[0].vTitle}</div>
			<div class="popuptext"> {$hometabbus[0].tLongDescription} </div>
		</div>
	</div>
</div>
<div style="display:none;">
	<div id="nonprofits" class="readpoppup">
		<div>
			<div class="popupheadding">{$hometabnonprofit[0].vTitle}</div>
			<div class="popuptext"> {$hometabnonprofit[0].tLongDescription} </div>
		</div>
	</div>
</div>
<!--end of bottom new four-->
{literal}
<script>
if('{/literal}{$type}{literal}' == 'Signup'){
	$(document).ready(function() {
        $("#signin").fancybox({
        'padding'           : 0,
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'changeFade'        : 0
    }).trigger('click');
    });
}



    $(window).load(function() {
	$('#slider').nivoSlider({
		animSpeed: 500, // Slide transition speed
		pauseTime: 4000// How long each slide will show
	});
        $('#slider').nivoSlider();
    });

function validform(){
	//alert('hello');
	$("#registermsgid").removeClass('popup-err').addClass('errormsg').fadeIn(1000);
	var extra='';
	if($('#vfirstName')){
		if($('#vfirstName').val() ==''){
			$('#registermsgid').html("Please enter First Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vFirstName = $('#vfirstName').val();
			extra+='&vFirstName='+vFirstName;
		}
	}
	if($('#vlastName')){
		if($('#vlastName').val() ==''){
			$('#registermsgid').html("Please enter Last Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vLastName = $('#vlastName').val();
			extra+='&vLastName='+vLastName;
		}
	}
	if($('#vemailId')){
		if($('#vemailId').val() ==''){
			$("#registermsgid").html('Please enter email').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var vEmailId = $('#vemailId').val();
			var msg = isValidEmail(vEmailId);
			if(msg !='0'){
				$("#registermsgid").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}else{
				extra+='&vEmailId='+vEmailId;
			}
		}
	}
	if($('#password')){
		if($('#password').val() ==''){
			$('#registermsgid').html("Please enter your password").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	if($('#ConnfPassword')){
		if($('#ConnfPassword').val() ==''){
			$('#registermsgid').html("Please enter your password confirm").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#password').val() != $('#ConnfPassword').val()){
		$('#registermsgid').html("Password do not match").addClass('errormsg').fadeTo(900,1);
		return false;
	}else{
		
		var confPassword = $('#ConnfPassword').val();
		var Password = $('#password').val();
		extra+='&Password='+Password;
	}
	
	//alert(extra);
	
	var url = site_url+"/index.php?file=a-ajregister";
    
	var pars = extra; 
	
	$.post(url+pars,
            function(data) {
                
                //$('#productlist_loading').hide();
                var khtml = data;
		if(data == 'success')
		{ $('#vfirstName').val('');
		    $('#vlastName').val('');
		    $('#vemailId').val('');
		    $('#password').val('');
		    $('#ConnfPassword').val('')
		$('#registermsgid').html('Go to your email to confirm your MYQME account.');
		}
		else{
		     $('#vfirstName').val('');
		    $('#vlastName').val('');
		    $('#vemailId').val('');
		    $('#password').val('');
		    $('#ConnfPassword').val('')
		    $('#registermsgid').html(data);
		    }
		
		   
		
		
       });
}
</script>
<script>
$(document).ready(function(){
$('#professional').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('.nonprofit').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#artist').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#connect').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#jobseekers').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#members').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#biz').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#popregister').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('#term1').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'showCloseButton' : false,
	'padding' : '0',
	'scrolling' : 'no'
});
});


//bottom new four pop-up starts

$(document).ready(function(){
$('.formember').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('.forprof').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('.forbiss').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
$(document).ready(function(){
$('.fornonprofit').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
//bottom new four pop-up ends
</script>
{/literal} 