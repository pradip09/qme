<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Photos</h2>
	</div>

<!--  Add/Edit category starts here -->

	<div class="contentbox" id="tabs-1">
		
		{if $var_msg_new neq ''}
		<div class="status success" id="errormsgdiv"> 
		<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
		<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
		{$var_msg_new}</p> 
		</div>     
		<div></div>
		{elseif $var_msg neq ''}
		<div class="status success" id="errormsgdiv"> 
		<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
		<p><img src="{$tconfig.tpanel_img}icons/icon_success.png" title="Success" />
		{$var_msg}</p> 
		</div>     
		<div></div>
		{/if}
		
		<form id="frmadd" name="frmadd" action="index.php?file=ph-photocategory_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPhotoCategoryId" id="iPhotoCategoryId" value="{$iPhotoCategoryId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_photocategory[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$my_mode}"/>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Photo Category:</strong></label>
				<input type="text" id="vPhotoCategory" name="Data[vPhotoCategory]" class="inputbox" value="{$db_photocategory[0].vPhotoCategory}" title="Photo Category" lang="*"/>
			</div>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" {if $db_photocategory[0].eStatus eq Active}selected{/if}>Active</option>
					<option value="Inactive" {if $db_photocategory[0].eStatus eq Inactive}selected{/if}>Inactive</option>
				</select>
			</div>
			
			{if $my_mode eq add}
			<input type="submit" value="Add Photo Category" class="btn" onclick="return validate(document.frmadd);" title="Add Photo Category"/>
			{else}
			<input type="submit" value="Edit Photo Category" class="btn" onclick="return validate(document.frmadd);" title="Edit Photo Category"/>
			{/if}
			<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
		</form>
	</div>	
	
	

<!--  Add/Edit category ends here -->

	
<!-- category listing starts here -->
	<div class="contentbox" id="tabs-1">	
		<form name="frmlist" id="frmlist"  action="index.php?file=ph-photocategory_a" method="post">
		<table width="100%" border="0">
			<input type="hidden" name="action" id="action" value="" />
			<input  type="hidden" name="iPhotoCategoryId" value=""/>
			<input  type="hidden" name="iMemberId" value=""/>
			
			<thead>
			<tr>
			<th>Photo Category</th>
			<th>Status</th>
			<th>Action</th>
			<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
			</thead>
			<tbody>
			{if $db_viewphotocategory|@count gt 0}
			{section name=i loop=$db_viewphotocategory}
			
			{if $smarty.section.i.index % 2}
			{assign var="class" value="alt"}
			{else}
			{assign var="class" value=""}
			{/if}
			<tr class="{$class}">
			<td><a href="{$tconfig.tpanel_url}/index.php?file=ph-photo&mode=edit&iMemberId={$db_viewphotocategory[i].iMemberId}&iPhotoCategoryId={$db_viewphotocategory[i].iPhotoCategoryId}" title="">{$db_viewphotocategory[i].vPhotoCategory}</a></td>
			<td>{$db_viewphotocategory[i].eStatus}</td>
			<td>
			<a href="{$tconfig.tpanel_url}/index.php?file=ph-photo&mode=edit&iMemberId={$db_viewphotocategory[i].iMemberId}&iPhotoCategoryId={$db_viewphotocategory[i].iPhotoCategoryId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
			<a href="javascript:void(0);" title="Active" onclick="MakeActionPhotoCat('{$db_viewphotocategory[i].iPhotoCategoryId}','{$db_viewphotocategory[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
			<a href="javascript:void(0);" title="Inactive" onclick="MakeActionPhotoCat('{$db_viewphotocategory[i].iPhotoCategoryId}','{$db_viewphotocategory[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
			<a href="javascript:void(0);" title="Delete" onclick="MakeActionPhotoCat('{$db_viewphotocategory[i].iPhotoCategoryId}','{$db_viewphotocategory[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
			</td>
			
			<td><input name="iPhotoCategoryId[]" type="checkbox" id="iId" value="{$db_viewphotocategory[i].iPhotoCategoryId}"/><input name="iMemberId[]" type="hidden" id="mId" value="{$db_viewphotocategory[i].iMemberId}"/></td>

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
			<div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Active</option>
					<option value="Inactive">InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'ph-photo',document.frmlist);"/>
			</div>
		</div>
	</div>
	

<!--- Add/Edit Photo starts here --->
	<div class="contentbox" id="tabs-1">	
		<form id="frmphotoadd" name="frmphotoadd" action="index.php?file=ph-photo_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPhotoId" id="iPhotoId" value="{$iPhotoId}" />
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_photo[0].vImage}" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_photo[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$my_mode2}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			
			<div class="inputboxes">
				<label for="textfield"><strong>Photo Title:</strong></label>
				<input type="text" id="vPhotoTitle" name="Data[vPhotoTitle]" class="inputbox" value="{$db_photo[0].vPhotoTitle}" lang="*" title="Photo Title"/>
			</div>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Existing Category:</strong></label>
				<select id="iPhotoCategoryId" name="Data[iPhotoCategoryId]" lang="*" title="Photo Category" onchange="showdropdownvalue(this.value);">
					<option value=''>--Select Photo Category--</option>
					{section name=i loop=$db_photocat}
					<option value='{$db_photocat[i].iPhotoCategoryId}' {if $db_photocat[i].iPhotoCategoryId eq $db_photo[0].iPhotoCategoryId}selected{/if}>{$db_photocat[i].vPhotoCategory}</option>
					{/section}
				</select>
			</div>
			<div class="inputboxes">
				<label for="textfield"><strong>Order No :</strong></label>
				<select id="iOrderNo" name="Data[iOrderNo]">
					{if $my_mode2 eq add}
						{while ($totalRec+1) >= $initOrder}
							<option value="{$initOrder}" {if $db_news[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>
						{/while}
					{else}
						{while ($totalRec) >= $initOrder}
							<option value="{$initOrder}" {if $db_news[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>
						{/while}
					{/if}
				</select>
			</div>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Upload New Image:</strong></label>
				{if $db_photo[0].vImage eq ''}
				<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_photo[0].vImage}"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
				{else}
				<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_photo[0].vImage}"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
				{/if}
			</div>
			
			
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" {if $db_photo[0].eStatus eq Active}selected{/if}>Active</option>
					<option value="Inactive" {if $db_photo[0].eStatus eq Inactive}selected{/if}>Inactive</option>
				</select>
			</div>

			{if $my_mode2 eq add}
			<input type="submit" value="Add Photo" class="btn" onclick="return validate(document.frmadd);" title="Add Photo"/>
			{else}
			<input type="submit" value="Edit Photo" class="btn" onclick="return validate(document.frmadd);" title="Edit Photo"/>
			{/if}
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
		<div id='preview'>
		</div>
		
	</div>
<!--- Add/Edit Photo ends here --->



<!--  photo listing starts here -->
	<div class="contentbox" id="tabs-1">	
		<form name="frmphotolist" id="frmphotolist"  action="index.php?file=ph-photo_a" method="post">
		
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
		<input type="hidden" name="iMemberId" id="iMemberId" value="" />
		<input  type="hidden" name="iPhotoId" value=""/>
		
		<thead>
		<tr>
		<th>Photo</th>
		<th>Photo Title</th>
		<th>Photo Category</th>
		<th>Status</th>
		<th>Action</th>
		<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmphotolist);"/></th>
		</tr>
		</thead>
		<tbody>
		{if $db_viewphoto|@count gt 0}
		{section name=i loop=$db_viewphoto}
		
		{if $smarty.section.i.index % 2}
		{assign var="class" value="alt"}
		{else}
		{assign var="class" value=""}
		{/if}
		<tr class="{$class}">
		<td><img src="{$tconfig.tsite_upload_images_photo}/{$db_viewphoto[i].iMemberId}/2_{$db_viewphoto[i].vImage}"></td>
		<!--<td><img src="{$tconfig.tsite_upload_images_photo}/{$db_viewphoto[i].iMemberId}/{$db_viewphoto[i].iPhotoCategoryId}/2_{$db_viewphoto[i].vImage}"></td>-->
		<td><a href="{$tconfig.tpanel_url}/index.php?file=ph-photo&mode=edit&iMemberId={$db_viewphoto[i].iMemberId}&iPhotoId={$db_viewphoto[i].iPhotoId}" title="">{$db_viewphoto[i].vPhotoTitle}</a></td>
		<td>{$db_viewphoto[i].PhotoCategory}</td>
		
		<td>{$db_viewphoto[i].eStatus}</td>
		<td>
		<a href="{$tconfig.tpanel_url}/index.php?file=ph-photo&mode=edit&iMemberId={$db_viewphoto[i].iMemberId}&iPhotoId={$db_viewphoto[i].iPhotoId}" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
		<a href="javascript:void(0);" title="Active" onclick="MakeActionPhoto('{$db_viewphoto[i].iPhotoId}','{$db_viewphoto[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
		<a href="javascript:void(0);" title="Inactive" onclick="MakeActionPhoto('{$db_viewphoto[i].iPhotoId}','{$db_viewphoto[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
		<a href="javascript:void(0);" title="Delete" onclick="MakeActionPhoto('{$db_viewphoto[i].iPhotoId}','{$db_viewphoto[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
		</td>
		
		<td><input name="iPhotoId[]" type="checkbox" id="iId" value="{$db_viewphoto[i].iPhotoId}"/><input name="iMemberId[]" type="hidden" id="mId" value="{$db_viewphoto[i].iMemberId}"/></td>
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
			<div class="bulkactions">
				<select name="newaction" id="newaction2">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Active</option>
					<option value="Inactive">InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction2').value,'ph-photo',document.frmphotolist);"/>
			</div>
		</div>
	</div>
<!--  photo listing ends here -->
	
</div>

{literal}


<script>
function Searchoption(){
	
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'ph-photo';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeActionPhotoCat(loopid,member,type){
    document.frmlist.iPhotoCategoryId.value = loopid;
    document.frmlist.iMemberId.value = member;
    document.frmlist.action.value = type;
    
	document.frmlist.submit();	
}
function MakeActionPhoto(loopid,member,type){
    document.frmphotolist.iPhotoId.value = loopid;
    document.frmphotolist.iMemberId.value = member;
    document.frmphotolist.action.value = type;
    
	document.frmphotolist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>

<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'ph-photo';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}
</script>
<script>

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
function ImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteImage");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
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
</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tPhotoCaption' );
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
$(function() {

$(".comment_button").click(function() {

var element = $(this);
   
    var test = $("#content").val();
	
    var dataString = 'content='+ test;
	
	if(test=='')
	{
	alert("Please Enter Some Text");
	
	}
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="http://tiggin.com/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
	
		
		$.ajax({
		type: "POST",
  url: "demo_insert.php",
   data: dataString,
  cache: false,
  success: function(html){
  
  
  
    $("#display").after(html);

 document.getElementById('content').value='';
 $("#flash").hide();
	
  }
  
  
});
	}
		

    return false;
	});



});
</script>



{/literal}


