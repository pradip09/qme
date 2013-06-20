<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>

<div class="contentcontainer" id="tabs">
	<div class="conthead">
		<h2 class="left">My Videos</h2>
	</div>
	<!--  Add/Edit video Album starts here -->
	<div class="contentbox" id="tabs-1">
	<form id="frmaddvidalbum" name="frmaddvidalbum" action="index.php?file=v-videoalbum_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iVideoAlbumId" id="iVideoAlbumId" value="{$iVideoAlbumId}" />
		<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_video_album[0].vImage}"/>
		<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
		<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_video_album[0].iMemberId}" />
		<input type="hidden" name="action" id="action" value="{$modeVideoAlb}"/>
		<input type="hidden" name="actionVid" id="actionVid" value="" />
		<table align="center" class="admin_top_table" width="50%">
			<tr>
				<td><div class="inputboxes inputboxes_admin">
						<label for="textfield"><strong>Video Album:</strong></label>
						<input type="text" id="vVideoAlbum" name="Data[vVideoAlbum]" class="inputbox" value="{$db_video_album[0].vVideoAlbum}" lang="*" title="Video Album"/>
					</div></td>
			</tr>
			<tr>
				<td><div class="inputboxes inputboxes_admin">
						<label for="textfield"><strong>Select image:</strong></label>
						{if $db_video_album[0].vImage eq ''}
						<input type="file" name="vVideoImage" id="vVideoImage" lang="*" value="{$db_video_album[0].vImage}" onchange="CheckValidFile(this.value,this.name)"  title="image"/>
						{else}
						<input type="file" name="vVideoImage" id="vVideoImage" value="{$db_video_album[0].vImage}" onchange="CheckValidFile(this.value,this.name)" style="float:left; width:auto;"  />
						{/if}
						{if $db_video_album[0].vImage neq ''} <div class="view_btn"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="VidImageDelete();" style="margin-left:7px;"/></div>
					<div style="display:none;">
						<div id="view1"> <img src="{$tconfig["tsite_upload_images_video"]}/{$db_video_album[0].iMemberId}/{$db_video_album[0].vImage}"/> </div>
					</div>
					{else}
			</div>
			
			{/if}
			</td>			
			</tr>			
			<tr>
				<td><div class="inputboxes inputboxes_admin">
						<label for="textfield"><strong>Status:</strong></label>
						<select id="eStatus" name="Data[eStatus]">
							<option value="Active" {if $db_video_album[0].eStatus eq Active}selected{/if}>Active</option>
							<option value="Inactive" {if $db_video_album[0].eStatus eq Inactive}selected{/if}>Inactive</option>
						</select>
					</div></td>
			</tr>
			<tr>
				<td align="right" class="add_photo_btn"> {if $modeVideoAlb eq 'add'}
					<input type="submit" value="Add Video Album" class="btn" onclick="return validate(document.frmaddvidalbum);" title="Add Video Album"/>
					{else}
					<input type="submit" value="Edit Video Album" class="btn" onclick="return validate(document.frmaddvidalbum);" title="Edit Video Album"/>
					{/if}
					<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
				</td>
			</tr>
		</table>
	</form>
</div>
<!--  Add/Edit video Album ends here -->
<form name="frmsearchvidalb" id="frmsearchvidalb" action="#tab-video" method="post">
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label>
				<td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword1" name="keyword1" value="{$keyword}" class="inputbox" /></div>
				<td>
				<td width="10%" ><div class="bulkactions"><select name="option1" id="option1">
						<option value="vVideoAlbum">Video Album</option>
						<option value="eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionvidalb();"/></div></td>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<!-- video Album listing starts here -->
<div class="contentbox contentbox_admin" id="tabs-1" >
	<form name="frmvideocatlist" id="frmvideocatlist" action="index.php?file=v-videoalbum_a" method="post">
		<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_main_table">
			<input type="hidden" name="action" id="action" value="" />
			<input  type="hidden" name="iVideoAlbumId" value=""/>
			<input  type="hidden" name="iMemberId" value=""/>
			<thead class="admin_table_title">
				<tr>
					<th>Video Album</th>
					<th>Status</th>
					<th>Action</th>
					<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmvideocatlist);"/></th>
				</tr>
			</thead>
			<tbody>
			
			{if $db_videoalbum_Alb|@count gt 0}
			{section name=i loop=$db_videoalbum_Alb}
			
			{if $smarty.section.i.index % 2}
			{assign var="class" value="alt"}
			{else}
			{assign var="class" value=""}
			{/if}
			<tr class="{$class}">
				<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_videoalbum_Alb[i].iMemberId}&iVideoAlbumId={$db_videoalbum_Alb[i].iVideoAlbumId}#tab-video" title="">{$db_videoalbum_Alb[i].vVideoAlbum}</a></td>
				<td>{$db_videoalbum_Alb[i].eStatus}</td>
				<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_videoalbum_Alb[i].iMemberId}&iVideoAlbumId={$db_videoalbum_Alb[i].iVideoAlbumId}#tab-video" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionVideo('{$db_videoalbum_Alb[i].iVideoAlbumId}','{$db_videoalbum_Alb[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionVideo('{$db_videoalbum_Alb[i].iVideoAlbumId}','{$db_videoalbum_Alb[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionVideo('{$db_videoalbum_Alb[i].iVideoAlbumId}','{$db_videoalbum_Alb[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a> </td>
				<td><input name="iVideoAlbumId[]" type="checkbox" id="iId" value="{$db_videoalbum_Alb[i].iVideoAlbumId}"/>
					<input name="iMemberId" type="hidden" id="mId" value="{$db_videoalbum_Alb[i].iMemberId}"/></td>
			</tr>
			{/section}
			{else}
			<tr>
				<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
			</tr>
			{/if}
			</tbody>
			
		</table>
	</form>
	<div class="extrabottom">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr><td>
		<div class="pagination"> {if $db_videoalbum_Alb|@count gt 0} <span class="switch" style="float: left;">{$recmsg1}</span> {/if} </div></td>
		<td><div class="bulkactions">
			<select name="newaction" id="newactionVideoCat">
				<option value="">Select Action</option>
				<option value="Deletes">Make Delete</option>
				<option value="Active">Make Active</option>
				<option value="Inactive">Make InActive</option>
				<option value="Show all">Show All</option>
			</select>
			<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionVideoCat').value,'m-member',document.frmvideocatlist);"/>
		</div></td></tr></table>
	</div>
</div>
<!-- video album listing ends here -->
<!--- Add/Edit video starts here --->
<div class="contentbox" id="tabs-1" style="margin-left: -200px;">
	<form id="frmvideoadd" name="frmvideoadd" action="index.php?file=v-video_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iVideoId" id="iVideoId" value="{$iVideoId}"/>
		<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_video_vid[0].vImage}" />
		<input type="hidden" name="vOldVideo" id="vOldVideo" value="{$db_video_vid[0].vVideo}" />
		<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_video_vid[0].iMemberId}" />
		<input type="hidden" name="action" id="action" value="{$modeVideo}" />
		<input type="hidden" name="actionVideo" id="actionVideo" value="" />
		<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}"/>
		<table align="center" class="photo_edit_table">
			<tr>
				<td><div class="inputboxes">
						<label for="textfield" style="padding-left:4px;"><strong>Video Name:</strong></label>
						<input type="text" id="vVideoName" name="Data[vVideoName]" class="inputbox" value="{$db_video_vid[0].vVideoName}" lang="*" title="Video Name"/>
					</div>
					<!--<div class="inputboxes">
					<label for="textfield"><strong>Existing Album:</strong></label>
					<select id="iVideoAlbumId" name="Data[iVideoAlbumId]" lang="*" title="Existing Album" onchange="showdropdownvalue(this.value);">
						<option value=''>--Select Video Album--</option>
						{section name=i loop=$db_videoalbum}
						<option value='{$db_videoalbum[i].iVideoAlbumId}' {if $db_videoalbum[i].iVideoAlbumId eq $db_video[0].iVideoAlbumId}selected{/if}>{$db_videoalbum[i].vVideoAlbum}</option>
						{/section}
						<option value="0">New Video Album</option>
					</select>
					
				</div>-->
					<!--<div class="inputboxes">-->
					<!--<div class="inputboxes" id="newcat" style="display:none;">
					<label for="textfield"><strong>New Video Album:</strong></label>
					<div id="newtext"></div>
				</div>-->
					<div class="inputboxes">
						<label for="textfield" style="padding-left:4px;"><strong>Upload Video File:</strong></label>
						{if $db_video_vid[0].vVideo eq ''}
						<input type="file" id="vVideo" name="vVideo"  value="{$db_video_vid[0].vVideo}"  lang="*" title="Video File" onchange="CheckValidVideoFile(this.value,this.name)"  />
						{else}
						<input type="file" id="vVideo" name="vVideo"  value="{$db_video_vid[0].vVideo}"   title="Video File" onchange="CheckValidVideoFile(this.value,this.name)" />
						<div style="display:inline-block; "><a href="#"><img src="{$tconfig["tsite_images"]}play-vedio-icon.png" onclick="playvideo('{$db_video_vid[0].iVideoId}','{$db_video_vid[0].vVideo}','{$db_video_vid[0].iMemberId}');"/></a></div>
						<div id="displayboxdiv" style="margin: 10px 0px 0px 30%;"></div>
					</div>
					
					{/if}
					<div class="inputboxes">
						<label for="textfield"><strong>Upload Image:</strong></label>
						{if $db_video_vid[0].vImage eq ''}
						<input type="file" id="vImage" name="vImage"  value="{$db_video_vid[0].vImage}" lang="*"  title="Image" onchange="CheckValidFile(this.value,this.name)" style="float:left; margin-right:10px;" />
						{else}
						<input type="file" id="vImage" name="vImage"  value="{$db_video_vid[0].vImage}" title="Image" onchange="CheckValidFile(this.value,this.name)" style="float:left; margin-right:10px;" />
						<div style=" float:left;">
							<div style="float:left; margin:0px 5px 0px 0px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
							<p style="margin:0px 0 0px 0; float:left; padding:0px;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="VideoImgDel();"/></p>
							<div style="display:none;">
								<div id="view1">
									<div class="popup_box">
										<div><img src="{$tconfig["tsite_upload_images_video"]}{$db_video_vid[0].iMemberId}/{$db_video_vid[0].vImage}" /></div>
									</div>
								</div>
							</div>
						</div>
						
						
						{/if} 
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Select Category:</strong></label>
						<select id="iVideoAlbumId" name="Data[iVideoAlbumId]"  title="Category type"  >
							<option value=''>--Select Category--</option>
							
						{section name=i loop=$db_videoalbum_Alb}
						
							<option value='{$db_videoalbum_Alb[i].iVideoAlbumId}' {if $db_videoalbum_Alb[i].iVideoAlbumId eq $db_video_vid[0].iVideoAlbumId}selected{/if}>{$db_videoalbum_Alb[i].vVideoAlbum}</option>
							
						{/section}
						 
					
						</select>
						<!--<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" style="display:none;"/>-->
					</div>
					<div style="clear:both;"></div>
					<div class="inputboxes">
						<label for="textfield"><strong>Status:</strong></label>
						<select id="eStatus" name="Data[eStatus]">
							<option value="Active" {if $db_video_vid[0].eStatus eq Active}selected{/if}>Active</option>
							<option value="Inactive" {if $db_video_vid[0].eStatus eq Inactive}selected{/if}>Inactive</option>
						</select>
					</div>


					<div class="add_photo_cancel"> {if $modeVideo eq add}
						<input type="submit" value="Add Video" class="btn" onclick="return validate(document.frmvideoadd);" title="Add Video"/>
						{else}
						<input type="submit" value="Edit Video" class="btn" onclick="return validate(document.frmvideoadd);" title="Edit Video"/>
						{/if}
						<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
					</div></td>
			<tr>
		</table>
	</form>
</div>
<!--- Add/Edit Video ends here --->
<form name="frmsearchvideo" id="frmsearchvideo" action="#tab-video" method="post">
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label>
				<td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keywordd" name="keywordd" value="{$keywordd}" class="inputbox" /></div>
				<td>
				<td width="10%" ><div class="bulkactions"><select name="optionn" id="optionn">
						<option value="vVideoName">Video Title</option>
						<option value="eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionvid();"/></div></td>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<!--  Video listing starts here -->
<div class="contentbox contentbox_admin_bot" id="tabs-1" >
	<form name="frmvideolist" id="frmvideolist"  action="index.php?file=v-video_a" method="post">
		<table width="100%" border="0" class="admin_photo_table">
			<input type="hidden" name="action" id="action" value="" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="" />
			<input  type="hidden" name="iVideoId" value=""/>
			<thead class="admin_table_title">
				<tr>
					<th>Video Name</th>
					<th>Video Album</th>
					<th>Status</th>
					<th>Action</th>
					<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmvideolist);"/></th>
				</tr>
			</thead>
			<tbody>
			
			{if $db_video|@count gt 0}
			{section name=i loop=$db_video}
			
			{if $smarty.section.i.index % 2}
			{assign var="class" value="alt"}
			{else}
			{assign var="class" value=""}
			{/if}
			<tr class="{$class}">
				<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_video[i].iMemberId}&iVideoId={$db_video[i].iVideoId}#tab-video" title="">{$db_video[i].vVideoName}</a></td>
				{if $db_video[i].vVideoAlbum neq ''}
				<td>{$db_video[i].vVideoAlbum}</td>
				{else}
				<td>.......</td>
				{/if}
				<td>{$db_video[i].eStatus}</td>
				<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_video[i].iMemberId}&iVideoId={$db_video[i].iVideoId}#tab-video" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionVid('{$db_video[i].iVideoId}','{$db_video[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionVid('{$db_video[i].iVideoId}','{$db_video[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionVid('{$db_video[i].iVideoId}','{$db_video[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a> </td>
				<td><input name="iVideoId[]" type="checkbox" id="iId" value="{$db_video[i].iVideoId}"/>
					<input name="iMemberId" type="hidden" id="mId" value="{$db_video[i].iMemberId}"/></td>
			</tr>
			{/section}
			{else}
			<tr>
				<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
			</tr>
			{/if}
			</tbody>
			
		</table>
	</form>
	<div class="extrabottom">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td>
		<div class="pagination"> {if $db_video|@count gt 0} <span class="switch" style="float: left;">{$recmsgg}</span> {/if} </div></td>
		<td><div class="bulkactions">
			<select name="newaction" id="newactionVideo">
				<option value="">Select Action</option>
				<option value="Deletes">Make Delete</option>
				<option value="Active">Make Active</option>
				<option value="Inactive">Make InActive</option>
				<option value="Show all">Show All</option>
			</select>
			<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionVideo').value,'m-member',document.frmvideolist);"/>
		</div></td></tr></table>
	</div>
</div>
<!--  video listing ends here -->
</div>
{literal}
<script>
function playvideo(id,file,userId)
{
						
 var html = '';
	    
	    html = '<embed src="{/literal}{$tconfig["tsite_music"]}/player.swf{literal}" height="180" width="280" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={/literal}{$tconfig["tsite_upload_images_video"]}{literal}'+userId+'/'+file+'&plugins=sharing-2"/>';
	    //alert(html);
	    $('#displayboxdiv').html(html);
}
function Searchoptionvid(){
	
    document.getElementById('frmsearchvideo').submit();
}
function Searchoptionvidalb(){
	
    document.getElementById('frmsearchvidalb').submit();
}
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'v-video';
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}
function MakeActionVideo(loopid,member,type){
	//alert("hello");
    document.frmvideocatlist.iVideoAlbumId.value = loopid;
    document.frmvideocatlist.iMemberId.value = member;
    document.frmvideocatlist.action.value = type;    
    document.frmvideocatlist.submit();	
}
function MakeActionVid(loopid,member,type){
	//alert("hello");
    document.frmvideolist.iVideoId.value = loopid;
    document.frmvideolist.iMemberId.value = member;
    document.frmvideolist.action.value = type;    
    document.frmvideolist.submit();	
}
</script>
<script>

showdropdownvalue($('#iVideoAlbumId').val());
function showdropdownvalue(val){
	if(val != '0'){
		$('#newcat').hide();
		$('#newtext').html('');
	}else{		
		var html ='';
		html ='<input type="text" id="vNewPageCode" name="vNewPageCode" class="inputbox" title="New PageCode" lang="*"/>';
		$('#newtext').html(html);
		$('#newcat').show();
	}
}


//$('#iBlogCategoryId').change(function() {
//    $('#vNewCategory').css('display', ($(this).val() == '0') ? 'block' : 'none');
//    $('#vNewCategory').attr('lang', ($(this).val() == '0') ? '*' : '');
//});

$(document).ready(function(){
	$('#video_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
$(document).ready(function(){
	$('#currentvideo_img').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});

jQuery(document).ready(function() {
	 
    $(".video").click(function() {
	        $.fancybox({
	            'padding'       : 0,
	            'autoScale'     : false,
	            'transitionIn'  : 'none',
	            'transitionOut' : 'none',
	            'title'         : this.title,
	            'width'         : 640,
	            'height'        : 385,
	            'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
	           'type'  : 'iframe',
	            'iframe'           : {
	            'wmode'             : 'transparent',
	            'allowfullscreen'   : 'true'
	            }
	        });
	 
	        return false;
	    });
	});
function VidImageDelete(){
	var r=confirm("Are you sure to delete this Image File");
	if (r==true)
	{
		
	      if($('#actionVid')){
		      $('#actionVid').val("DelvidAlbumImage");
	      }
	      if($('#frmaddvidalbum')){
		      $('#frmaddvidalbum').submit();
	      }
	     
	}
      else
	{
	      return false;
	} 
}
function VideoImgDel(){
	var d=confirm("Are you sure to delete this Image ");
	if (d==true)
	{
		
	      if($('#actionVideo')){
		      $('#actionVideo').val("DeleteImage");
	      }
	      if($('#frmvideoadd')){
		      $('#frmvideoadd').submit();
	      }
	     
	}
      else
	{
	      return false;
	} 
}

function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function CheckValidVideoFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'flv' || a == 'avi' || a == 'mp4')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (flv,mp4,avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
{/literal} 