<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>

<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Photos</h2>
	</div>
	<!--  Add/Edit category starts here -->
	<div class="contentbox" id="tabs-1">
		<form id="frmaddphotocat" name="frmaddphotocat" action="index.php?file=ph-photocategory_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPhotoCategoryId" id="iPhotoCategoryId" value="{$iPhotoCategoryId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_photocategory[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$modePhotoCat}"/>
			<input type="hidden" name="actionalb" id="actionalb" value=""/>
			<table align="center" class="admin_top_table" width="50%">
				<tr>
					<td><div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Photo Category:</strong></label>
							<input type="text" id="vPhotoCategory" name="Data[vPhotoCategory]" class="inputbox" value="{$db_photocategory[0].vPhotoCategory}" lang="*" title="Photo Category" lang="*"/>
						</div></td>
				</tr>
				<tr>
					<td><div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Select Image:</strong></label>
							{if $db_photocategory[0].vImage eq ''}
							<input type="file"  id="vImage" name="vImage"  value="{$db_photocategory[0].vImage}"  title="Image" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
							{else}
							<input type="file" id="vImage" name="vImage" value="{$db_photocategory[0].vImage}" style="float:left; margin-right:10px; width:auto;"   title="Image" onchange="CheckValidFile(this.value,this.name)"/>
							<div class="view_btn"><a href="#view11" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="PhalbImageDelete();" style="margin-left:8px;"/></div>
							{/if}
							<div style="display:none;">
								<div id="view11">
									<div class="popup_box">
										<div><img src="{$tconfig["tsite_upload_images_photo"]}{$db_photocategory[0].iMemberId}/{$db_photocategory[0].vImage}" /></div>
									</div>
								</div>
							</div>
						</div></td>
				</tr>
				<tr>
					<td><div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" {if $db_photocategory[0].eStatus eq Active}selected{/if}>Active</option>
								<option value="Inactive" {if $db_photocategory[0].eStatus eq Inactive}selected{/if}>Inactive</option>
							</select>
						</div></td>
				</tr>
				<tr>
					<td align="right" class="add_photo_btn"> {if $modePhotoCat eq add}
						<input type="submit" value="Add Photo Category" class="btn" onclick="return validate(document.frmaddphotocat);" title="Add Photo Category"/>
						{else}
						<input type="submit" value="Edit Photo Category" class="btn" onclick="return validate(document.frmaddphotocat);" title="Edit Photo Category"/>
						{/if}
						<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
					</td>
				</tr>
			</table>
		</form>
	</div>
	<!--  Add/Edit category ends here -->
	<form name="frmsearchphcat" id="frmsearchphcat" action="#tab-photo" method="post">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="10%"><label for="textfield"><strong>Search:</strong></label>
					<td>
					<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword3" name="keyword3" value="{$keyword}" class="inputbox" /></div>
					<td>
					<td width="10%" ><div class="bulkactions"><select name="option3" id="option3">
							<option value="vPhotoCategory">Photo Album</option>
							<option value="eStatus">Status</option>
						</select></div>
					</td>
					<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionphcat();"/></div></td>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<!-- category listing starts here -->
	<div class="contentbox contentbox_admin" id="tabs-1">
		<form name="frmlist" id="frmlist"  action="index.php?file=ph-photocategory_a" method="post">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_main_table">
				<input type="hidden" name="action" id="action" value="" />
				<input  type="hidden" name="iPhotoCategoryId" value=""/>
				<input  type="hidden" name="iMemberId" value=""/>
				<thead class="admin_table_title">
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
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewphotocategory[i].iMemberId}&iPhotoCategoryId={$db_viewphotocategory[i].iPhotoCategoryId}#tab-photo" title="">{$db_viewphotocategory[i].vPhotoCategory}</a></td>
					<td>{$db_viewphotocategory[i].eStatus}</td>
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewphotocategory[i].iMemberId}&iPhotoCategoryId={$db_viewphotocategory[i].iPhotoCategoryId}#tab-photo" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionPhotoCat('{$db_viewphotocategory[i].iPhotoCategoryId}','{$db_viewphotocategory[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionPhotoCat('{$db_viewphotocategory[i].iPhotoCategoryId}','{$db_viewphotocategory[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionPhotoCat('{$db_viewphotocategory[i].iPhotoCategoryId}','{$db_viewphotocategory[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a> </td>
					<td><input name="iPhotoCategoryId[]" type="checkbox" id="iId" value="{$db_viewphotocategory[i].iPhotoCategoryId}"/>
						<input name="iMemberId" type="hidden" id="mId" value="{$db_viewphotocategory[i].iMemberId}"/></td>
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
			<div class="pagination"> {if $db_viewphotocategory|@count gt 0} <span class="switch" style="float: left;">{$recmsg3}</span> {/if} </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'m-member',document.frmlist);"/>
			</div></td>
			</tr></table>
		</div>
	</div>
	<!--- Add/Edit Photo starts here --->
	<div class="contentbox" id="tabs-1">
		<form id="frmphotoadd" name="frmphotoadd" action="index.php?file=ph-photo_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPhotoId" id="iPhotoId" value="{$iPhotoId}" />
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_photo[0].vImage}" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_photo[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$modePhoto}" />
			<input type="hidden" name="actionPhoto" id="actionPhoto" value="" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<table align="center" class="photo_edit_table" width="50%">
				<tr>
					<td><div class="inputboxes">
							<label for="textfield"><strong>Photo Title:</strong></label>
							<input type="text" id="vPhotoTitle" name="Data[vPhotoTitle]" class="inputbox" value="{$db_photo[0].vPhotoTitle}" lang="*" title="Photo Title"/>
						</div>
			<!--<div class="inputboxes">
				<label for="textfield"><strong>Order No :</strong></label>
				<select id="iOrderNo" name="Data[iOrderNo]">
					
					{if $my_mode2 eq add}
						{while ($totalRec+1) >= $initOrder}
						<option value="{$initOrder}" {if $db_photo[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>					
						{/while}
					{else}
						{while ($totalRec) >= $initOrder}
						<option value="{$initOrder}" {if $db_photo[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>				
						{/while}
					{/if}
				</select>
			</div>-->
						<div class="inputboxes" >
							<label for="textfield"><strong>Select Image:</strong></label>
							{if $db_photo[0].vImage eq ''}
							<input type="file" id="vImage" name="vImage"  value="{$db_photo[0].vImage}"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
							{else}
							<input type="file" id="vImage" name="vImage" value="{$db_photo[0].vImage}"  title="vImage" onchange="CheckValidFile(this.value,this.name)" style=" float:left; width:auto;" />
							{/if}
							
							{if $db_photo[0].vImage neq ''}
							<div style="float:left; ">
								<div style="float:left; margin:5px 5px 0px 10px; "><a href="#viewPhoto" id="testPhoto"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
								<p style="margin:5px 0 0px 0; padding-bottom:0; float:left; "><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="PhotoImageDelete();"/></p>
								<div style="display:none;">
									<div id="viewPhoto">
										<div class="popup_box">
											<div><img src="{$tconfig["tsite_upload_images_photo"]}{$db_photo[0].iMemberId}/{$db_photo[0].vImage}" /></div>
										</div>
									</div>
								</div>
							</div>
							{/if} </div>
						<div class="inputboxes"><label for="textfield"><strong>Category:</strong></label>
							<select id="iPhotoCategoryId" name="Data[iPhotoCategoryId]" title="Photo Category" onchange="showdropdownvalue(this.value);">
								<option value=''>--Select photo category--</option>
								
					{section name=i loop=$db_photocat}
					
								<option value='{$db_photocat[i].iPhotoCategoryId}' {if $db_photocat[i].iPhotoCategoryId eq $db_photo[0].iPhotoCategoryId}selected{/if}>{$db_photocat[i].vPhotoCategory}</option>
								
					{/section}
				
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" {if $db_photo[0].eStatus eq Active}selected{/if}>Active</option>
								<option value="Inactive" {if $db_photo[0].eStatus eq Inactive}selected{/if}>Inactive</option>
							</select>
						</div>
						<div class="add_photo_cancel"> {if $modePhoto eq add}
							<input type="submit" value="Add Photo" class="btn" onclick="return validate(document.frmphotoadd);" title="Add Photo"/>
							{else}
							<input type="submit" value="Edit Photo" class="btn" onclick="return validate(document.frmphotoadd);" title="Edit Photo"/>
							{/if}
							<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
						</div></td>
				</tr>
			</table>
		</form>
		<div id='preview'> </div>
	</div>
	<!--- Add/Edit Photo ends here --->
	<form name="frmsearchphoto" id="frmsearchphoto" action="#tab-photo" method="post">
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="10%"><label for="textfield"><strong>Search:</strong></label>
					<td>
					<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword8" name="keyword8" value="{$keyword}" class="inputbox" /></div>
					<td>
					<td width="10%" ><div class="bulkactions"><select name="option8" id="option8">
							<option value="vPhotoTitle">Photo Title</option>
							<option value="eStatus">Status</option>
						</select></div>
					</td>
					<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionphoto();"/></div></td>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	<!--  photo listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmphotolist" id="frmphotolist"  action="index.php?file=ph-photo_a" method="post">
			<table width="100%" border="0" class="admin_photo_table">
				<input type="hidden" name="action" id="action" value="" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="" />
				<input  type="hidden" name="iPhotoId" value=""/>
				<thead class="admin_table_title" style="width:490px">
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
					<td><img width="76" height="68" src="{$tconfig.tsite_upload_images_photo}/{$db_viewphoto[i].iMemberId}/2_{$db_viewphoto[i].vImage}"/></td>
					<!--<td><img src="{$tconfig.tsite_upload_images_photo}/{$db_viewphoto[i].iMemberId}/{$db_viewphoto[i].iPhotoCategoryId}/2_{$db_viewphoto[i].vImage}"></td>-->
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewphoto[i].iMemberId}&iPhotoId={$db_viewphoto[i].iPhotoId}#tab-photo" title="">{$db_viewphoto[i].vPhotoTitle}</a></td>
					{if $db_viewphoto[i].vPhotoCategory neq ''}
					<td>{$db_viewphoto[i].vPhotoCategory}</td>
					{else}
					<td>....</td>
					{/if}
					<td>{$db_viewphoto[i].eStatus}</td>
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewphoto[i].iMemberId}&iPhotoId={$db_viewphoto[i].iPhotoId}#tab-photo" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a> <a href="javascript:void(0);" title="Active" onclick="MakeActionPhoto('{$db_viewphoto[i].iPhotoId}','{$db_viewphoto[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a> <a href="javascript:void(0);" title="Inactive" onclick="MakeActionPhoto('{$db_viewphoto[i].iPhotoId}','{$db_viewphoto[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a> <a href="javascript:void(0);" title="Delete" onclick="MakeActionPhoto('{$db_viewphoto[i].iPhotoId}','{$db_viewphoto[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a> </td>
					<td><input name="iPhotoId[]" type="checkbox" id="iId" value="{$db_viewphoto[i].iPhotoId}"/>
						<input name="iMemberId[]" type="hidden" id="mId" value="{$db_viewphoto[i].iMemberId}"/></td>
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
			<div class="pagination"> {if $db_viewphoto|@count gt 0} <span class="switch" style="float: left;">{$recmsg4}</span> {/if} </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newaction2">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction2').value,'m-member',document.frmphotolist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  photo listing ends here -->
</div>
{literal}
<script>
function Searchoptionphoto(){
	
    document.getElementById('frmsearchphoto').submit();
}
function Searchoptionphcat(){
	
    document.getElementById('frmsearchphcat').submit();
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

function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'ph-photo';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
}

$(document).ready(function(){
	$('#testPhoto').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
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
function PhotoImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionPhoto')){
			$('#actionPhoto').val("DeleteImage");
		}
		
		if($('#frmphotoadd')){
			$('#frmphotoadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
function PhalbImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#actionalb')){
			$('#actionalb').val("DeleteImage");
		}
		
		if($('#frmaddphotocat')){
			$('#frmaddphotocat').submit();
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
{/literal} 