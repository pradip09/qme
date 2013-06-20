<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<link rel="stylesheet" href="{$tconfig["front_javascript"]}datepicker/css/jquery.datepick.css" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}datepicker/js/jquery.datepick.js"></script>
<div id="services_box" class="desboard_body">
	
{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right" style="min-height:840px;">
		<div class="MyVedioTitle">
			<h1>Blog Post</h1>
		</div>
		<div class="cl"></div>
		<div class="ProcessingIndication Navigation Myaccount" id="addblog_loading">Please wait while your Video is uploading.</div>
		<div class="MyEventContentPart" id="blogdetails"> {if $mode eq 'add'}
			<div class="AddneweventTitle">Create Blog</div>
			{else}
			<div class="AddneweventTitle">Edit Blog</div>
			{/if}
			<div id="divmsgid" class="error_massage"></div>
			<div class="AddneweventContent">
			<div class="Eventfield">
			<form name="addmyblog" id="addmyblog" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajaddmyblog">
				<input type="hidden" name="iBlogId" id="iBlogId" value="{$db_blog[0].iBlogId}" />
				<input type="hidden" name="mode" id="mode" value="{$mode}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_blog[0].vImage}" />
				<div class="AddneweventLeftPart1">
					<div class="Eventfield">
						<h4>Entry Title : </h4>
						<input type="text" value="{$db_blog[0].vBlogTitle}" id="blogtitle" name="blogtitle"/>
					</div>
					
					<div class="Eventfield">
						<h4>Create  Date:</h4>
						<input type="text" id="dCreateDate"  name="dCreateDate" class="inputbox" value="{$db_blog[0].dCreateDate}" title="CreateDate" />
					</div>
					<div class="Eventfield">
						<h4>Description</h4>
						<div class="EventDiscriptionTextarea">
							<textarea rows="3" cols="3" id="vText" name="vText" placeholder="description" >{$db_blog[0].vText}</textarea>
						</div>
					</div>
					<div class="HideEvent" > <strong>Hide Blog:</strong>
						<input style="width:20px; height:13px;" type="checkbox" name="HideEvent" id="HideEvent"{if $db_blog[0].eHideEntry eq 'Yes'}checked{/if}/>
					</div>
					<div class="upload_new_img">
						<div class="Eventfield">
							<h4>Upload Blog Image :</h4>
							<input type="file" id="blogimage" name="blogimage"/>
							{if $db_blog[0].vImage neq ''}
							<div class="viewimage1" style="float:none;"><a href="#view1" id="test"><img src="{$tconfig["front_images"]}view.png"/></a></div>
							{/if} </div>
						<div style="display:none;">
							<div id="view1">
								<div>
									<div> <img src="{$tconfig["tsite_upload_images_blog"]}/{$db_blog[0].iMemberId}/{$db_blog[0].vImage}"/> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="AddneweventrightPart" style="margin-right:13px;width:340px;">
					<div class="myprofile_select_box">
						<div class="Eventfield1">
							<h4>Blog Category:</h4>
						</div>
						<br/>
						{if  $db_bloginterest|@count gt 0}
						<div class="event_skill">
						{section name=j loop=$db_bloginterest}
							<div class="event_slikk_inner"><input type="checkbox" value="{$db_bloginterest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_bloginterest[j].iInterestId|in_array:$relatedArrIntrest}checked{/if}/>   {$db_bloginterest[j].vInterest}</div>
						{/section}
						</div>
						{/if} 
						</div>
					<div class="Eventfield1">
						
						<h4>Other Category :</h4>
					</div>
					<div id="otherintrest">
						<input type="text" name="vOtherInterest" class="inpuname" placeholder="Other Category" id="vOtherInterest" value="{$db_blog[0].vOtherInterest}" title="Other Interest"/>
						<br/>
					</div>
					<div class="myprofile_select_box">
						<div class="Eventfield1">
							<label>
							<h4 style="font-size:14px;">Select Groups that may benefit from this blog</h4>
							</label>
						</div>
						<br/>
						{if  $db_blogskill|@count gt 0}
						<div class="event_skill">
						{section name=j loop=$db_blogskill}
							<div class="event_slikk_inner"><input type="checkbox" value="{$db_blogskill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_blogskill[j].iSkillId|in_array:$relatedArr}checked{/if}/>   {$db_blogskill[j].vSkill}</div>
						{/section}
						</div>
						{/if} 
						</div>
					<div class="Eventfield1">
						
						<h4>Other Group :</h4>
					</div>
					<div id="otherskill">
						<input type="text" name="vOtherSkill" class="inpuname_other" placeholder="Other Group" id="vOtherSkill" value="{$db_blog[0].vOtherSkill}" title="Other Skill"/>
						<br/>
					</div>
				</div>
				</div>
			</form>
			<div class="cl"></div>
			<div class="submitbutton_new submitbutton_myblog">
				<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return addBlog();" style="margin-left: 20px;"/>
				<a href="{$site_url}/myblog"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
		</div>
	</div>
	<div class="cl"></div>
</div>
<div class="cl"></div>
</div>
</div>
<!--body part end here -->
<!--footer part start here -->
{literal}
<script type="text/javascript">
	
		
function addBlog()
{
	
	//alert('hii');
	if($('#blogtitle')){
		if($('#blogtitle').val() ==''){
			$('#divmsgid').html("Please enter Blog Title").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	if($('#iAlbum')){
		if(($('#iAlbum').val() =='') && ($('#new_category').val() =='')){
			$('#divmsgid').html("Please select Category OR enter new category").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#description')){
		if(($('#description').val() =='') && ($('#new_category').val() =='')){
			$('#divmsgid').html("Please enter Description").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	if($('#mode').val() =='add')
	{
			if($('#blogimage').val() ==''){
				
			$('#divmsgid').html("Please select image file").addClass('errormsg').fadeTo(900,1);
			return false;
		}	
	}
	
	$('#divmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#blogdetails').hide();
	$('#addblog_loading').show();
	$("#addmyblog").ajaxForm({
		target: '#divmsgid',
		success: finish
		}).submit();
	
}

function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myblog/';
}




$(document).ready(function(){
	$('#test').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

	</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script type="text/javascript">

 
showdropdownvalue($('#iAlbum').val());
function showdropdownvalue(val){
	if(val != '0'){
		$('#newcat').hide();
		$('#newtext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="new_category" name="new_category" />';
		$('#newtext').html(html);
		$('#newcat').show();
	}
} 
 </script>
<script type="text/javascript">
$(function() {
	$('#dCreateDate').datepick({dateFormat: 'mm-dd-yyyy'});
	
});
      
       
</script>

{/literal} 