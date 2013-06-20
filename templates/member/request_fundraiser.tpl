<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}view.js"></script>
<link href="{$tconfig["tsite_url"]}/public/css/view.css" rel="stylesheet" type="text/css" />
<div id="services_box" class="desboard_body">
				
					
					{include file="member/myaccountleft.tpl"}
					
				</div>
                                <div class="desboard-right">
					<div class="MyVedioTitle">
					<h1>Fundraiser Campaign Request</h1>
					</div>
					
       <div class="ProcessingIndication Navigation Myaccount" id="fundraiser_loading">Please wait while your event is uploading...</div>               
     <div  id="fundraiser" class="form_container">
	        <div id="divContactmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
		<div class="form_description">Are you interested in working with QME marketing Group? We're Thrilled about that. we promise to get back with you quickly.
		</div>
		
		<form id="frmfundraiser" name="frmfundraiser" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajfundraiser">
		    <div class="form_textbox">
			<div class="form_text_box">
				<label>What is your Organization Name ?<span class="required">*</span></label>
				<input class="form_input" name="vOrganizationName" id="vOrganizationName" type="text" value=""/>
			</div>
			<div class="form_text_box">
				<label>What is the legal registered name of your organization if different from above?<span class="required"></span></label>
				<input class="form_input" name="vRegisteredName" id="vRegisteredName" type="text" value="" />
			</div>
			<div class="form_text_box">
				<label>What is your Organization 501c3#?<span class="required"></span></label>
				<input class="form_input" name="vOrganization501c3" id="vOrganization501c3" type="text" value="" />
			</div>
			<div class="form_text_box">
				<label>What or who is this fundraiser for?<span class="required"></span></label>
				<input class="form_input" type="text" name="vFundraiserFor" id="vFundraiserFor" value="" />
			</div>
			<div class="form_text_box">
				<label>Organization HQ Address?<span class="required">*</span></label>
				<input class="form_input" type="text" name="vHqAddress" id="vHqAddress" value="" />
			</div>
			<div class="form_text_box">
				<label>Organization main person contact name?<span class="required">*</span></label>
				<input class="form_input" name="vPersonName" id="vPersonName" type="text" value="" />
			</div>
			<div class="form_text_box">
				<label>Organization main contact number?<span class="required">*</span></label>
				<input class="form_input" name="vMainNumber" id="vMainNumber" type="text" value="" maxlength="12" onkeypress="return checknum(event);"/>
			</div>
			<div class="form_text_box">
				<label>Organization alternate number?<span class="required"></span></label>
				<input class="form_input" name="vAlternateNumber" id="vAlternateNumber" type="text" maxlength="12" value="" onkeypress="return checknum(event);"/>
			</div>
			<div class="form_checkbox" style="float:left; width:344px;">				
				<input class="custom_checkbox" name="eNonProfit" id="eNonProfit" type="checkbox" {if eNonProfit eq 'Yes'}checked{/if}/>
				<label>Is this a Fundraiser for a non profit?</label>
			</div>
			<div class="form_checkbox" style="float:left; width:344px;" >				
				<input class="custom_checkbox" name="eChruch" id="eChruch" type="checkbox" {if eChruch eq 'Yes'}checked{/if}/>
				<label>Is this a Fundraiser for a Church?</label>
			</div>
			<div class="form_checkbox" style="float:left; width:344px;">				
				<input class="custom_checkbox" name="ePolitician" id="ePolitician" type="checkbox" {if ePolitician eq 'Yes'}checked{/if}/>
				<label>Is this a Fundraiser for a politician?</label>
			</div>
			<div class="form_checkbox" style="float:left; width:344px;">				
				<input class="custom_checkbox" name="eFundraiser" id="eFundraiser" type="checkbox" {if eFundraiser eq 'Yes'}checked{/if}/>
				<label>Is this a Fundraiser for a Cause?</label>
			</div>
			<div class="form_text_box">
				<label>What is the candidate Name?<span class="required">*</span></label>
				<input class="form_input" type="text" name="vCandidateName" id="vCandidateName" value="" />
			</div>
			<div class="form_text_box">
				<label>What office is this candidate running for ?<span class="required"></span></label>
				<input class="form_input" type="text" name="vRunningFor" id="vRunningFor" value="" />
			</div>
			<div class="form_text_box">
				<label>What district does this candidate serve ?<span class="required"></span></label>
				<input class="form_input" type="text" name="vDistrict" id="vDistrict" value="" />
			</div>
			<div class="form_text_box">
				<label>Your email? <span class="required">*</span></label>
				<input class="form_input" type="text" name="Email" id="Email" maxlength="255" value="" />
			</div>
			
			
			<div class="cl"></div>
			
			<div class="form_checkbox">
				<input class="checkbox_input" type="checkbox" name="iRequireBug[]" id="iRequireBug" value="" />
				<label>If fundraiser Requires printing do you require a union bug?</label>
			</div>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<!--<td>
				        <div class="firstname_form">
						<div class="firstname_text">What is your name? <span id="required_1" class="required">*</span></div>
						<div class="first_name_input_box">
							<input class="first_input" name="Firstname" id="Firstname" maxlength="255" size="4" value="" />
							<label>First</label>
						</div>
						<div class="first_name_input_box">
							<input class="first_input" name="vLastName" id="vLastName" maxlength="255" size="6" value="" />
							<label>Last</label>
						</div>
					</div>			
					</td>-->
					<td>
						<div class="phone_no_form">
							<div class="firstname_text">Office Phone Number <span class="required">*</span></div>
							<div class="phone_no_input">
								<input class="phone_text" size="3" name="OfficeNumber" id="OfficeNumber" maxlength="3" value="" type="text" onkeypress="return checknum(event);"/>
								<span class="has_no">(###)</span>
							</div>
							<div class="phone_no_input">
								<input class="phone_text" size="3" name="vOfficeNumber2" id="vOfficeNumber2" maxlength="3" value="" type="text" onkeypress="return checknum(event);" />
								<span class="has_no">(###)</span>
							</div>
							<div class="phone_no_input">
								<input class="phone_text" size="4" name="vOfficeNumber3" id="vOfficeNumber3" maxlength="4" value="" type="text" onkeypress="return checknum(event);"/>
								<span class="has_no">(###)</span>
							</div>
							
						</div>			
					</td>
					<td>
						<div class="phone_no_form">
							<div class="firstname_text">Cell Phone Number <span class="required">*</span></div>
							<div class="phone_no_input">
								<input class="phone_text" size="3" maxlength="3" name="vCellNumber1" id="vCellNumber1" value="" type="text" onkeypress="return checknum(event);"/>
								<span class="has_no">(###)</span>
							</div>
							<div class="phone_no_input">
								<input class="phone_text" size="3" maxlength="3" name="vCellNumber2" id="vCellNumber2" value="" type="text"onkeypress="return checknum(event);" />
								<span class="has_no">(###)</span>
							</div>
							<div class="phone_no_input">
								<input class="phone_text" size="4" maxlength="4" name="vCellNumber3" id="vCellNumber3" value="" type="text" onkeypress="return checknum(event);"/>
								<span class="has_no">(###)</span>
							</div>
							<div class="cl"></div>
						</div>
						
					</td>
				</tr>
			</table>
			<div class="services_check_box">
				<div class="form_plase_tell_text">Please tell us which branding & corporate identity design services you'd like to discuss. (Please select all that apply.) <span id="required_7" class="required"></span></div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vBrand&Corporate1" name="vBrand&Corporate[]" value="Custom Logo Design"/>
					<label>Custom Logo Design</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vBrand&Corporate2" name="vBrand&Corporate[]" value="Corporate Identity Design"/>
					<label>Corporate Identity Design</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vBrand&Corporate3" name="vBrand&Corporate[]" value="Branding Style Guide"/>
					<label>Branding Style Guide</label>
				</div>
				
							
			</div>
			<div class="services_check_box">
				<div class="form_plase_tell_text">Do you need any of our additional design, marketing and technology services? (Please select all that apply.) </div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign1" name="vAdditionalDesign[]" value="Web & Interactive Design"/>
					<label>Web & Interactive Design</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign2" name="vAdditionalDesign[]" value="Print Collateral Design" />
					<label>Print Collateral Design</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign3" name="vAdditionalDesign[]" value="TV/Film & Video Production"/>
					<label>TV/Film & Video Production</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign4" name="vAdditionalDesign[]" value="Package Design" />
					<label>Package Design</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign5" name="vAdditionalDesign[]" value="Email Marketing"/>
					<label>Email Marketing</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign6" name="vAdditionalDesign[]" value="3D & Animation Design" />
					<label>3D & Animation Design</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign7" name="vAdditionalDesign[]" value="Strategic Planning"/>
					<label>Strategic Planning</label>
				</div>
				<div class="services_check_reapt_box">
					<input class="custom_checkbox" type="checkbox" id="vAdditionalDesign8" name="vAdditionalDesign[]" value="Annual Marketing Retainer"/>
					<label>Annual Marketing Retainer</label>
				</div>
							
			</div>
			</form>
		    
		
		
			<div class="services_check_box">
				<div class="form_plase_tell_text">Please tell us more about your project & immediate needs.</div>
				<textarea class="textarea_service_bot" id="vProjectDescription" name="vProjectDescription" style="height:100px;"></textarea>
			</div>
			<!--<div class="social_box">
					<label>How did you learn about QME Creative Group? </label>
					
					<select class="select_socil_link">
						<option value="" selected="selected"></option>
						<option value="1" >Referral - Word of Mouth</option>
						<option value="2" >Search Engine Query</option>
						<option value="3" >Linked over from a QME Creative client site</option>
						<option value="4" >Advertisement</option>
						<option value="5" >Facebook</option>
						<option value="6" >LinkedIn</option>
						<option value="7" >Twitter</option>
						<option value="8" >Pinterest</option>
						<option value="9" >Other</option>
					</select>
				</div>-->
			<div class="form_buttons">				
				<input type="hidden" value="" />
				<input type="hidden" value="" />
				<a href="#" onclick="return validateform();"> <img src="{$tconfig["front_images"]}submit_fund.png" style="cursor:pointer;"/></a>				
				<!--<input class="save_Form_btn" type="button" value="save" onclick="return validateform();"/>-->
			</div>
		</div>
	
</div>
					
									
				</div>
		<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">

function validateform(){

         if($('#vOrganizationName').val() ==''){
    		$('#divContactmsgid').html("Please enter your Organization Name!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
         if($('#vHqAddress').val() ==''){
    		$('#divContactmsgid').html("Please enter address!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vPersonName').val() ==''){
    		$('#divContactmsgid').html("Please enter person name!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }	
	if($('#vMainNumber').val() ==''){
    		$('#divContactmsgid').html("Please enter person contact no!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vCandidateName').val() ==''){
    		$('#divContactmsgid').html("Please enter Candidate name!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#Email')){
		
		if($('#Email').val() ==''){
			$("#divContactmsgid").html('Please enter your email').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			
			var vEmail = $('#Email').val();
			var msg = isValidEmail(vEmail);
			if(msg !='0'){
				$("#divContactmsgid").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}else{
				//extra+='&vEmail='+vEmail;
			}
		}
	}
	if($('#OfficeNumber').val() ==''){
    		$('#divContactmsgid').html("Please enter phone no!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vOfficeNumber2').val() ==''){
    		$('#divContactmsgid').html("Please enter valid phone no!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vOfficeNumber3').val() ==''){
    		$('#divContactmsgid').html("Please enter valid phone no!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vCellNumber1').val() ==''){
    		$('#divContactmsgid').html("Please enter cell no !").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vCellNumber2').val() ==''){
    		$('#divContactmsgid').html("Please enter valid cell no!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vCellNumber3').val() ==''){
    		$('#divContactmsgid').html("Please enter valid cell no!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }
	if($('#vProjectDescription').val() ==''){
    		$('#divContactmsgid').html("Please enter text!").addClass('errormsg').fadeTo(900,1);
    		return false;
        }	
	$('#divContactmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);	     
	       $("#frmfundraiser").ajaxForm({
		    target: '#divContactmsgid',
		    success : finish
		    }).submit();        
      
}
function finish()
{
        window.location='{/literal}{$site_url}{literal}'+'/myfundraiser/';
}
</script>

<script type="text/javascript">
function checknum(events)
{
	
	var unicodes=events.charCode? events.charCode :events.keyCode;
	
	if (unicodes!=8){
		//alert(unicodes);		
	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 40 || unicodes == 41 || unicodes == 45)){
	                return true;
		}else{
			return false;
		}
	}
}
</script>
{/literal}







