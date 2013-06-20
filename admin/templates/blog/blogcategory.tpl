<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>

<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Blogs</h2>
	</div>
	<!--  Add/Edit  Blogcategory starts here -->
	<div class="contentbox" id="tabs-1">

		<form id="frmaddblogcat" name="frmaddblogcat" action="index.php?file=bc-blogcategory_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iBlogCategoryId" id="iBlogCategoryId" value="{$iBlogCategoryId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_blogcategory[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$modeBlogCat}"/>
			<table align="center" class="admin_top_table">  
				<tr>
					<td>
						<div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Blog Category:</strong></label>
							<input type="text" id="vBlogCategory" name="Data[vBlogCategory]" class="inputbox" value="{$db_blogcategory[0].vBlogCategory}" title="Blog Category" lang="*"/>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" {if $db_blogcategory[0].eStatus eq Active}selected{/if}>Active</option>
								<option value="Inactive" {if $db_blogcategory[0].eStatus eq Inactive}selected{/if}>Inactive</option>
							</select>
						</div>			
					</td>
				</tr>
				<tr>
					<td align="right" class="add_photo_btn"> 
						{if $modeBlogCat eq add}
						<input type="submit" value="Add Blog Category" class="btn" onclick="return validate(document.frmaddblogcat);" title="Add Blog Category"/>
						{else}
						<input type="submit" value="Edit Blog Category" class="btn" onclick="return validate(document.frmaddblogcat);" title="Edit Blog Category"/>
						{/if}
						<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
					</td>
				</tr>
			</table>									
		</form>
	</div>
	<!--  Add/Edit Blog category ends here -->
	
	<!-- Blog category listing starts here -->
	<div class="contentbox contentbox_admin" id="tabs-1">
		<form name="frmblogcatlist" id="frmblogcatlist" action="index.php?file=bc-blogcategory_a" method="post">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_main_table">
				<input type="hidden" name="action" id="action" value="" />
				<input  type="hidden" name="iBlogCategoryId" value=""/>
				<input  type="hidden" name="iMemberId" value=""/>
				<thead class="admin_table_title">
					<tr>
						<th>Blog Category</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmblogcatlist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				{if $db_viewblogcategory|@count gt 0}
				{section name=i loop=$db_viewblogcategory}
				
				{if $smarty.section.i.index % 2}
				{assign var="class" value="alt"}
				{else}
				{assign var="class" value=""}
				{/if}
				<tr class="{$class}">
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewblogcategory[i].iMemberId}&iBlogCategoryId={$db_viewblogcategory[i].iBlogCategoryId}#tab-blog" title="">{$db_viewblogcategory[i].vBlogCategory}</a></td>
					<td>{$db_viewblogcategory[i].eStatus}</td>
					<td>
						<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewblogcategory[i].iMemberId}&iBlogCategoryId={$db_viewblogcategory[i].iBlogCategoryId}#tab-blog" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionBlcat('{$db_viewblogcategory[i].iBlogCategoryId}','{$db_viewblogcategory[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionBlcat('{$db_viewblogcategory[i].iBlogCategoryId}','{$db_viewblogcategory[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionBlcat('{$db_viewblogcategory[i].iBlogCategoryId}','{$db_viewblogcategory[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td><input name="iBlogCategoryId[]" type="checkbox" id="iId" value="{$db_viewblogcategory[i].iBlogCategoryId}"/>
						<input name="iMemberId[]" type="hidden" id="mId" value="{$db_viewblogcategory[i].iMemberId}"/></td>
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
				<select name="newaction" id="newactionBlogcat">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Active</option>
					<option value="Inactive">InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionBlogcat').value,'b-blog',document.newactionBlogcat);"/>
			</div>
		</div>
	</div>
	<!-- Blog category listing ends here -->
	
	<!--- Add/Edit Blog starts here --->
	<div class="contentbox" id="tabs-1">
		<form id="frmblogadd" name="frmblogadd" action="index.php?file=b-blog_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iBlogId" id="iBlogId" value="{$iBlogId}"/>			
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_blog[0].vImage}"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_blog[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$modeBlog}" />
			<input type="hidden" name="actionBlog" id="actionBlog" value="" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}"/>
			<table align="center" class="photo_edit_table">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Entry Title:</strong></label>
				<input type="text" id="vBlogTitle" name="Data[vBlogTitle]" class="inputbox" value="{$db_blog[0].vBlogTitle}" lang="*" title="Entry Title"/>
			</div>
			<div class="inputboxes">
				<label for="textfield"><strong>Existing Category:</strong></label>
					<select id="iBlogCategoryId" name="Data[iBlogCategoryId]" lang="*" title="Blog Category" onchange="showdropdownvalue(this.value);">
						<option value=''>--Select Blog Category--</option>
						{section name=i loop=$db_blogcat}
						<option value='{$db_blogcat[i].iBlogCategoryId}' {if $db_blogcat[i].iBlogCategoryId eq $db_blog[0].iBlogCategoryId}selected{/if}>{$db_blogcat[i].vBlogCategory}</option>
						{/section}
						<option value="0">New Entry category</option>
					</select>
					<!--<input type="text" id="vNewCategory" name="vNewCategory" class="inputbox" title="New Category" style="display:none;"/>-->
			</div>
			<div class="inputboxes" id="newcat" style="display:none;">
					<label for="textfield"><strong>New Entry Category:</strong></label>
					<div id="newtext"></div>
				</div>
			<div class="inputboxes">
					<label for="textfield"><strong>Create  Date:</strong></label>
					<input type="text" id="dCreateDate" name="Data[dCreateDate]" class="inputbox" value="{$db_blog[0].dCreateDate}" lang="*" title="CreateDate" style="width:228px"/>
				</div>
			<div class="inputboxes">
					<label style="margin-bottom:7px;" for="textfield"><strong>Entry text:</strong></label>
					<!--<label for="textfield"><strong>Entry Text:</strong></label>-->
					<textarea id="vText" name="Data[vText]" class="inputbox" title="Text" lang="*" style="width:900px; height:200px">{$db_blog[0].vText}</textarea>
				</div>
			
					
					<!--<textarea id="tText" name="Data[tText]" class="inputbox" lang="*" title="Text" style="width:900px; height:200px">{$db_blog[0].tText}</textarea>-->
				
				<div class="inputboxes">
					<label for="textfield"><strong>Hide Entry:</strong></label>
				</div>
				<div class="inputboxes">
					<input type="checkbox" id="eHideEntry" name="eHideEntry" lang="*" value="1" {if $db_blog[0].eHideEntry eq 'Yes'}checked{/if}>
				<div class="inputboxes">
				
				<div style="display:block;width:1000px;">
				<div style="width:303px;float:left;">
				<label for="textfield"><strong>Upload Image:</strong></label>
				<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_blog[0].vImage}"  lang="*" title="Image" onchange="CheckValidFile(this.value,this.name)"/>
				</div>
				{if $db_blog[0].vImage neq ''}
				
				<div style="float:left; width:450px;">
						<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="BlogImageDelete();"/></p>
						
						<div style="display:none;">
						<div id="view1">
							<div class="popup_box">
								<div><img src="{$tconfig["tsite_upload_images_blog"]}{$db_blog[0].iMemberId}/{$db_blog[0].vImage}" /></div>
							</div>
						</div>
						</div>
					
				</div>
				{/if}
				</div>
				<div style="clear:both;"></div>
									
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" {if $db_blog[0].eStatus eq Active}selected{/if}>Active</option>
					<option value="Inactive" {if $db_blog[0].eStatus eq Inactive}selected{/if}>Inactive</option>
				</select>
			</div>
			
			<div class="add_photo_cancel">
				{if $modeBlog eq add}
				<input type="submit" value="Add Blog" class="btn" onclick="return validate(document.frmsongadd);" title="Add Blog"/>
				{else}
				<input type="submit" value="Edit Blog" class="btn" on click="return validate(document.frmsongadd);" title="Edit Blog"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Blog ends here --->
	
	
	<!--  Blog listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmbloglist" id="frmbloglist"  action="index.php?file=b-blog_a" method="post">
			<table width="100%" border="0" class="admin_photo_table">
				<input type="hidden" name="action" id="action" value="" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="" />
				<input  type="hidden" name="iBlogId" value=""/>
				<thead class="admin_table_title">
					<tr>						
						<th>Entry Title</th>
						<th>Create Date</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmbloglist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				{if $db_viewblog|@count gt 0}
				{section name=i loop=$db_viewblog}
				
				{if $smarty.section.i.index % 2}
				{assign var="class" value="alt"}
				{else}
				{assign var="class" value=""}
				{/if}
				<tr class="{$class}">					
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewblog[i].iMemberId}&iBlogId={$db_viewblog[i].iBlogId}#tab-blog" title="">{$db_viewblog[i].vBlogTitle}</a></td>					
					<td>{$db_viewblog[i].dCreateDate}</td>
					<td>{$db_viewsong[i].eStatus}</td>
					<td>
						<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewblog[i].iMemberId}&iBlogId={$db_viewblog[i].iBlogId}#tab-blog" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionBlog('{$db_viewblog[i].iBlogId}','{$db_viewblog[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionBlog('{$db_viewblog[i].iBlogId}','{$db_viewblog[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionBlog('{$db_viewblog[i].iBlogId}','{$db_viewblog[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iBlogId[]" type="checkbox" id="iId" value="{$db_viewblog[i].iBlogId}"/>
						<input name="iMemberId[]" type="hidden" id="mId" value="{$db_viewblog[i].iMemberId}"/>
					</td>
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
				<select name="newaction" id="newactionBlog">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Active</option>
					<option value="Inactive">InActive</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionBlog').value,'b-blog',document.frmbloglist);"/>
			</div>
		</div>
	</div>
	<!--  Blog listing ends here -->
	
</div>
{literal}
<script>

function Searchoption(){
	
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'b-blog';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeActionBlcat(loopid,member,type){

    document.frmblogcatlist.iBlogCategoryId.value = loopid;
    document.frmblogcatlist.iMemberId.value = member;
    document.frmblogcatlist.action.value = type;
	document.frmblogcatlist.submit();	
}
function MakeActionBlog(loopid,member,type){
    document.frmbloglist.iSongId.value = loopid;
    document.frmbloglist.iMemberId.value = member;
    document.frmbloglist.action.value = type;    
	document.frmbloglist.submit();	
}

function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'b-blog';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=m-member&mode=view";
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

function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}

function BlogImageDelete(){
	var r=confirm("Are you sure to delete this Image File");
	if (r==true)
	{
	      if($('#actionBlog')){
		      $('#actionBlog').val("DeleteBlogImage");
	      }
	      
	      if($('#frmblogadd')){
		      $('#frmblogadd').submit();
	      }
	}
      else
	{
	      return false;
	} 
}

</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
{/literal}
