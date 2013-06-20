<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ckeditor_old/ckeditor.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<div id="services_box" class="desboard_body">{include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right" style="min-height:840px;">
	<div class="MyVedioTitle">
		<h1> Edit About us</h1>
	</div>
	<div class="cl"></div>
	<div id="divmsgid" class="error_massage">{$msg}</div>
	<div class="AddneweventContent">
		<form name="frmaboutus" id="frmaboutus" method="post" action="index.php?file=a-ajaboutus">
			<div id="readAbout" class="readpoppupaboutus2">
				<div class="popupheadding"></div>
				<div id="divaboutus"></div>
				<table>
					<tr>
						<td>
							<table>
								<tr>
									<td class="aboutus_popuptxt"> Tell us about You or your company ? </td>
								</tr>
								<tr>
									<td><textarea id="about_company" name="about_company" rows="5" cols="34" >{$db_aboutus[0].vYourself}</textarea></td>
								</tr>
								<tr>
									<td class="aboutus_popuptxt"> Experience . Qualifications . Certifications . Education . </td>
								</tr>
								<tr>
									<td><textarea id="about_exp" name="about_exp" rows="5" cols="37">{$db_aboutus[0].vYourexperience}</textarea></td>
								</tr>
							</table>
						</td>
						<td>
							<table>
								<tr>
									<td class="aboutus_popuptxt"> Our Mission Statement </td>
								</tr>
								<tr>
									<td><textarea id="about_mission" name="about_mission" rows="5" cols="33">{$db_aboutus[0].vYourmission}</textarea></td>
								</tr>
								<tr>
									<td class="aboutus_popuptxt"> Our Service </td>
								</tr>
								<tr>
									<td><textarea id="about_service" name="about_service" rows="5" cols="33">{$db_aboutus[0].vYourservice}</textarea></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<div style="padding: 10px 0px 0px 10px;">
					<input type="button" value="Save" onclick="return uploadAboutUs();" class="btnbg" style="cursor:pointer;text-decoration:none;"/>
					<a href="{$site_url}/myprofile" class="continu_btnbg">Cancel</a> </div>
			</div>
		</form>
		<div class="cl"></div>
	</div>
</div>
<div class="cl"></div>
</div>
</div>
<!--body part end here -->
<!--footer part start here -->
{literal}
<script type="text/javascript">
	
CKEDITOR.config.width = 330;
CKEDITOR.replace( 'about_company',
		 
	{
		
		toolbar :
		[
			//{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : [ 'Styles','Format' ] },
			//{ name: 'styles', items : ['Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList'] },
		]
	}
	
	);
CKEDITOR.replace( 'about_exp',
	{
		toolbar :
		[
			//{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Styles','Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList'] },
		]
	});
CKEDITOR.replace( 'about_mission',
	{
		toolbar :
		[
			//{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Styles','Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList'] },
		]
	});
CKEDITOR.replace( 'about_service',
	{
		toolbar :
		[
			//{ name: 'document', items : ['Save','NewPage','Print',] },
			{ name: 'styles', items : ['Styles','Format' ] },
			{ name: 'basicstyles', items : [ 'Bold','Italic',] },
			{ name: 'paragraph', items : [ 'NumberedList'] },
		]
	});
        
        	
function uploadAboutUs()
{
	
	/*var editor_company = CKEDITOR.instances['about_company'].getData();
	var editor_exp = CKEDITOR.instances['about_exp'].getData();
	var editor_mission = CKEDITOR.instances['about_mission'].getData();
	var editor_service = CKEDITOR.instances['about_service'].getData();
	
          if(editor_company=="")
		{
		$('#divmsgid').html("Please enter text for about you or your company").addClass('errormsg').fadeTo(900,1);
		return false;
		}
         if(editor_exp=="")
		{
		$('#divmsgid').html("Please  enter text for your experience,qualifications,certifications,education").addClass('errormsg').fadeTo(900,1);	
		return false;
		}
	if(editor_mission=="")
		{
		$('#divmsgid').html("Please enter text for your mission statement").addClass('errormsg').fadeTo(900,1);	
		return false;
		}
        if(editor_service=="")
		{
		$('#divmsgid').html("Please tell us about your service statement").addClass('errormsg').fadeTo(900,1);
		return false;
		}*/
	document.frmaboutus.submit();
}

</script>
{/literal} 