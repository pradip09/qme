<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jlogin.js"></script>
<div id="services_boxinnerbg" class="desboard_body" style="padding-top:1px; padding-bottom:20px;	">
<!--heading start here -->    
    
       <div class="MyVedioTitle">
	      <h1>CONTACT US</h1>
       </div>
<div class="cl"></div>
<!--heading end here -->


<!--Contact Box start -->
<div class="contact-box">

<form name="contact" id="contact">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr>
	      <td colspan="3">&nbsp;</td>
       </tr>
       <tr>
	      <td colspan="3"><p class="Contacttoptxt">Thanks for contacting us, We're thrilled about that. We promise to get back with you quickly.</p></td>
       </tr>
       <tr>
	      <td colspan="3">&nbsp;</td>
	</tr>
       <tr>
	     
	      <td width="40%" align="left" valign="top">
		      <div id="cntmsgid" style="text-align:center;line-height:24px; color:red; font-size:15px;"></div>
		     <label for="textfield" class="conctclabel">Email id :</label>
	      	     <input type="text" class="postbloginput" name="email" id="email" />
		     
		     <label for="textfield" class="conctclabel">Phone no :</label><br />
		     <input type="text" class="postbloginput" name="vNumber" id="vNumber" onkeypress="return chkValidPhone(event);"/>
		     
		     <label for="textfield" class="conctclabel">Subject :</label><br />
		     <input type="text" class="postbloginput" name="vSubject" id="vSubject" />
		     
		     <label for="textfield" class="conctclabel">Massage  :</label><br />
		     <textarea name="vMessage" class="postbloginput4" id="vMessage"></textarea>
		     
		     <a href="#" onclick="validatecontact();" style="margin-left:12px;"><img src="{$tconfig["front_images"]}btn_submit.png"/></a>
		     <a href="#" onclick="clearform(document.contact);"><img src="{$tconfig["front_images"]}btn_reset.png"/></a>
		     <!--<input name="input" type="image" src="{$tconfig["front_images"]}btn_submit.png" onclick="validatecontact();"/>-->
		     <!--<input name="input" type="image" src="{$tconfig["front_images"]}btn_reset.png" onclick="clearform(document.contact);"/>-->
	      </td>
	      
	      <td width="10%" align="left" valign="top">
		     <img src="{$tconfig["front_images"]}leftbg.png"  alt="" />
	      </td>
	      
	     <td align="left" valign="top" ><div class="contactheading">Campany Address</div>
							<p class="textp">My QME INC.<br />
1000 Kirk Ave Suite 1000 Wilmington, DE 19806</p>
							<p class="textp"><strong>Phone no :</strong> 302.218.8730<br />
								<strong>Email :</strong> customerservice@qmemedia.com</p></td>
       </tr>
       <tr>
	      <td colspan="3" align="left" valign="top">&nbsp;</td>
       </tr>
</table>
</form>
</div>

<!--Contact Box end -->


</div>
</div>
</div>

{literal}
<script type="text/javascript">

function clearform(frm)
{       
       frm.reset();
}

function validatecontact(){
	$("#cntmsgid").removeClass('popup-err').addClass('errormsg').fadeIn(1000);
	var extra='';
	if($('#email')){
		if($('#email').val() ==''){
		     $("#cntmsgid").html('Please enter Email-Id').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var Email = $('#email').val();
			var msg = isValidEmail(Email);
			if(msg !='0'){
				$("#cntmsgid").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}else{
				extra+='&Email='+Email;
			}
		}
	}
	
	if($('#vNumber')){
		if($('#vNumber').val() ==''){
			$('#cntmsgid').html("Please enter Phone number").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var phone_number = $('#vNumber').val();
			extra+='&phone_number='+phone_number;
		}
	}
	if($('#vSubject')){
		if($('#vSubject').val() ==''){
			$('#cntmsgid').html("Please enter subject").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var subject = $('#vSubject').val();
			extra+='&subject='+subject;
		}
	}
	if($('#vMessage')){
		if($('#vMessage').val() ==''){
			$('#cntmsgid').html("Please enter message").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var message = $('#vMessage').val();
			extra+='&message='+message;
		}
	}
	var url = site_url+"/index.php?file=a-aj_contact";
       var pars = extra;
       //alert(pars);
       $.post(url+pars, function(data) {
       
                $('#email').val('');
		$('#vNumber').val('');
		$('#vSubject').val('');
		$('#vMessage').val('');
		
		var khtml = data;
		var html='';
		html='';
			html+='<div class="popup_box" style="height:auto;">';
			html+='<div class="errormsg_login" style="font-size:20px;text-align:center;">';
			html+=khtml;
			html+='</div>';
			html+='</div>';
			$(document).ready(function () {                                
                               $.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                       });
		//$('#divmsgid').html(data);
       });
	
}



       
</script>
{/literal}

