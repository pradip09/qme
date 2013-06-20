<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>Post Job</h1>
		</div>
		<div class="cl"></div>
		<div class="UploadVideoBtn"> <a href="{$site_url}/mypostjobadd/add"><img src="{$tconfig["front_images"]}add_post_job.png" alt="Add Post Job" title="Add Post Job" border="0" /></a> </div>
		<div class="PostInnerContentPart">
			<div class="ProcessingIndication Navigation Myaccount" id="mypostjob_loading">Please Wait All Jobs Loading...</div>
			<div id="displaymemberjobs"></div>
		</div>
	</div>
	<div class="cl"></div>
</div>
</div>
<div style="display:none">
  <div id="Share" style="width:335px;background:#fff;padding:10px;text-align:center;height:35px;">
    <div class="social_icon">
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
       <a class="addthis_button_preferred_1"></a>
       <a class="addthis_button_preferred_2"></a>
       <a class="addthis_button_preferred_3"></a>
       <a class="addthis_button_preferred_4"></a>
       <a class="addthis_button_compact"></a>
       <a class="addthis_counter addthis_bubble_style"></a>
      </div>
     <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>
   </div>
  </div>
</div>
{literal}
<script type="text/javascript" language="javascript">

displaymyjobs(0,'{/literal}{$iUserId}{literal}');
$(document).ready(function() {
		$('#box1').selectbox({debug: true});
		$('#box2').selectbox({debug: true});
		$('#box3').selectbox({debug: true});
		$('#box4').selectbox({debug: true});
		$('#box5').selectbox({debug: true});
		$('#box6').selectbox({debug: true});
		$('#iStateId').selectbox({debug: true});
		
	});


function validatePostJobForm(){
	
	var extra='';
	if($('#vSkill')){
		if($('#vSkill').val() ==''){
			$('#postjobMsg').html("Please enter Skill, you are looking for").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vSkill = $('#vSkill').val();
			extra+='&vSkill='+vSkill;
		}
	}
	if($('#tDescription')){
		if($('#tDescription').val() ==''){
			$('#postjobMsg').html("Please describe 'What do you need this person to do?'").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var tDescription = $('#tDescription').val();
			extra+='&tDescription='+tDescription;
		}
	}
	if($('#iStateId')){
		if($('#iStateId').val() =='State'){
			$('#postjobMsg').html("Please select the State where the person need to be located").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var iStateId = $('#iStateId').val();
			extra+='&iStateId='+iStateId;
		}
	}
	
	
	$("#postjobMsg").removeClass('popup-err').addClass('errormsg').fadeIn(1000);
	
	var allData = $('#frmPostJob').serialize();
	var url = site_url+"/index.php?file=a-ajpostjob";
	var pars = '&'+allData;
	$.post(url+pars,
        function(data) {
		if(data == 'success'){
			$('#postjobMsg').html('Job posted Successfully.');
			$('#vSkill').val('');
			$('#tDescription').val('');  
			$('#iStateId').val('State');
		}
		else{
			
		}
		
	});
}
</script>
{/literal} 