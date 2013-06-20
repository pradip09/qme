<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jlogin.js"></script>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
				<form id="frmfrngreg" name="frmfrngreg" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajfriendregister">
                                    <input type="hidden" name="friend_code" id="friend_code" value="{$code}">
				<div class="register_page">
					<div class="reg_title">You are Invited by {$name}</div>
					<div id="regfrdmsgid" style="color:red; font-size:15px; padding: 0px 0px 0px 165px;"></div>
					<div class="reg_inputbox">
						<div class="reg_label">Name&nbsp;:</div>
						<div class="reg_input">
								<input name="firstname" id="firstname" type="text" placeholder="First name" class="reg_nameinput"/>
								<input name="lastname" id="lastname" type="text" placeholder="Last name" class="reg_nameinput"/>
						</div>
					</div>
					<div class="reg_inputbox">
						<div class="reg_label">Email&nbsp;:</div>
						<div class="reg_input">
								<input id="emailid" name="emailid" type="text" class="reg_input" placeholder="Enter Your Email" />
						</div>
					</div>
					<div class="reg_inputbox">
						<div class="reg_label">Password&nbsp;:</div>
						<div class="reg_input">
								<input name="password" id="password" type="password" class="reg_input" placeholder="Enter Your Password" />
						</div>
					</div>
					<div class="reg_inputbox">
						<div class="reg_label">Confirm Password &nbsp;:</div>
						<div class="reg_input">
								<input name="confpassword" id="confpassword" type="password" class="reg_input" placeholder="Enter Your Confirm Password" />
						</div>
					</div>
					<div class="reg_btn">
						<a href="javascript:void(0);" onclick="validateregrequestform();" ><img src="{$tconfig["front_images"]}btn_register.png"/></a>
					</div>
					
				</div>
				</form>
				<div class="cl"></div>
			</div>

{literal}
<script type="text/javascript">
    function validateregrequestform(){
        //$("#regfrdmsgid").removeClass('popup-err').addClass('errormsg').fadeIn(1000);
	var extra='';
	if($('#firstname').val() ==''){
		$('#regfrdmsgid').html("Please enter First Name").addClass('errormsg').fadeTo(900,1);
		return false;
	}else if($('#lastname').val() ==''){
			$('#regfrdmsgid').html("Please enter Last Name").addClass('errormsg').fadeTo(900,1);
			return false;
	}else if($('#emailid').val() ==''){
		$("#regfrdmsgid").html('Please enter email').addClass('errormsg').fadeTo(900,1);
		return false;
	}else if($('#password').val() ==''){
			$('#regfrdmsgid').html("Please enter your password").addClass('errormsg').fadeTo(900,1);
			return false;
	}else if($('#confpassword').val() ==''){
			$('#regfrdmsgid').html("Please enter your password confirm").addClass('errormsg').fadeTo(900,1);
			return false;
	}else if($('#password').val() != $('#confpassword').val()){
		$('#regfrdmsgid').html("Password do not match").addClass('errormsg').fadeTo(900,1);
		return false;
	}else if($('#emailid').val() !=''){
			var vEmailId = $('#emailid').val();
			var msg = isValidEmail(vEmailId);
			if(msg !='0'){
				$("#regfrdmsgid").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}
        }
            
                $("#frmfrngreg").ajaxForm({
                        target: '#regfrdmsgid',
                        success: function(data){
				if(data == 'success')
				{
					$('#regfrdmsgid').html('');
					window.location = site_url+"/thankyou_reg";		
				}else if(data == 'error'){
					$('#regfrdmsgid').html("Error in Registration.").addClass('errormsg').fadeTo(900,1);
				}else{
					$('#regfrdmsgid').html(data).addClass('errormsg').fadeTo(900,1);
				}
			}
                        }).submit();
        
    }
</script>
{/literal}