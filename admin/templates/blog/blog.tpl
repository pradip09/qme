<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Blogs</h2>
	</div>
	
	<div class="contentbox" id="tabs-1" style="margin-left:129px;">
		<form id="frmblogadd" name="frmblogadd" action="index.php?file=b-blog_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_blog[0].vImage}"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_blog[0].iMemberId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$memberId}" />
			<input type="hidden" name="iBlogId" id="iBlogId" value="{$iBlogId}"/>
			<input type="hidden" name="action" id="action" value="{$modeBlog}" />
			<input type="hidden" name="actiondel" id="actiondel" value="" />
			<table align="center" class="photo_edit_table" width="70%">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Entry Title:</strong></label>
				<input type="text" id="vBlogTitle" name="Data[vBlogTitle]" class="inputbox" value="{$db_blog[0].vBlogTitle}" lang="*" title="Entry Title"/>
			</div>
			
				<div class="inputboxes">
					<label for="textfield"><strong>Create  Date:</strong></label>
					<input type="text" id="dCreateDate" name="Data[dCreateDate]" class="inputbox" value="{$db_blog[0].dCreateDate}" lang="*" title="CreateDate" />
				</div>
				<div class="inputboxes">
					<label style="margin-bottom:7px;" for="textfield"><strong>Description:</strong></label>
					<!--<label for="textfield"><strong>Entry Text:</strong></label>-->
					<textarea id="vText" name="Data[vText]" class="inputbox" title="Text" lang="*" style="width:300px; height:150px">{$db_blog[0].vText}</textarea>
				</div>
			
				<div class="inputboxes">
					<label for="textfield"><strong>Hide Entry:</strong></label>
					<input type="checkbox" id="eHideEntry" name="eHideEntry"  value="1" {if $db_blog[0].eHideEntry eq 'Yes'}checked{/if}>
				</div>
				
				<div class="inputboxes">
				<label for="textfield"><strong>Upload Image:</strong></label>
				{if $db_blog[0].vImage eq ''}
				<input type="file" id="vImage" name="vImage"  value="{$db_blog[0].vImage}"  lang="*" title="Image" onchange="CheckValidFile(this.value,this.name)"  />
				<!--</div>-->
				{else}
				<input type="file" id="vImage" name="vImage"  value="{$db_blog[0].vImage}" title="Image" onchange="CheckValidFile(this.value,this.name)" style="float:left; width:auto;" />
				<div style="float:left; width:350px;">
						<div style="float:left; margin:0px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin:0px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="BlogImageDelete();"/></p>
						
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
				<div class="inputboxes">
						<label><strong>Blog Category:</strong></label>
						<br/>
						{if  $db_interest|@count gt 0}
						<div class="event_skill">
							{section name=j loop=$db_interest}
							<div class="event_slikk_inner">
								<input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]" {if $db_interest[j].iInterestId|in_array:$Arrintrest}checked{/if}/>{$db_interest[j].vInterest}
							</div>
							{/section}
						</div>
						{/if}
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Category:</strong></label>
							<input type="text" name="Data[vOtherInterest]" class="inputbox" id="vOtherInterest" value="{$db_blog[0].vOtherInterest}" title="Other Interest"/>
						</div>
						<div class="inputboxes">
							<label><strong>Select Groups that may benefit from this blog:</strong></label>
							<br/>
							{if  $db_skill|@count gt 0}
							<div class="event_skill" style="margin-left:137px;">
								{section name=j loop=$db_skill}
								<div class="event_slikk_inner">
									<input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$Arrskill}checked{/if}/>
									{$db_skill[j].vSkill}
								</div>
								{/section}
							</div>
						{/if}
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Group:</strong></label>
							<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="{$db_blog[0].vOtherSkill}" title="Other Skill"/>
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
				{if $modeBlog eq 'add'}
				<input type="submit" value="Add Blog" class="btn" onclick="return validate(document.frmblogadd);" title="Add Blog"/>
				{else}
				<input type="submit" value="Edit Blog" class="btn" on click="return validate(document.frmblogadd);" title="Edit Blog"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Blog ends here --->
	<form name="frmsearchblog" id="frmsearchblog" action="#tab-blog" method="post">       
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="{$keyword}" class="inputbox" /></div><td>
				<td width="10%" ><div class="bulkactions">
					<select name="option" id="option">
						<option value="vBlogTitle">Blog Title</option>
						<option value="eStatus">Status</option>
						
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchopt();"/></div></td>
			</tr>	

		</tbody>			
		</table> 
        </form>
	
	<!--  Blog listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmbloglist" id="frmbloglist"  action="index.php?file=b-blog_a" method="post">
			<input type="hidden" name="action" id="action" value="" />
			<input  type="hidden" name="iBlogId" id="iBlogId" value=""/>
			<input  type="hidden" name="iMemberId" id="iMemberId" value=""/>
			<table width="100%" border="0" class="admin_photo_table">
				<thead class="admin_table_title">
					<tr>						
						<th>Entry Title</th>
						<th>Create Date</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmbloglist);"/></th>
					</tr>
					<tr>
				<td colspan="7" align="center">
					<div style="width:821px; margin:auto;"></div>
				</td>
				</tr>
				</thead>
				<tbody>
				
				{if $db_blog_view|@count gt 0}
				{section name=i loop=$db_blog_view}
				
				{if $smarty.section.i.index % 2}
				{assign var="class" value="alt"}
				{else}
				{assign var="class" value=""}
				{/if}
				<tr class="{$class}">					
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_blog_view[i].iMemberId}&iBlogId={$db_blog_view[i].iBlogId}#tab-blog" title="">{$db_blog_view[i].vBlogTitle}</a></td>					
					<td>{$db_blog_view[i].dCreateDate}</td>
					<td>{$db_blog_view[i].eStatus}</td>
					<td>
						<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_blog_view[i].iMemberId}&iBlogId={$db_blog_view[i].iBlogId}#tab-blog" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionBlog('{$db_blog_view[i].iBlogId}','{$db_blog_view[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionBlog('{$db_blog_view[i].iBlogId}','{$db_blog_view[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionBlog('{$db_blog_view[i].iBlogId}','{$db_blog_view[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iBlogId[]" type="checkbox" id="iId" value="{$db_blog_view[i].iBlogId}"/>
						<input name="iMemberId" type="hidden" id="mId" value="{$db_blog_view[i].iMemberId}"/>
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
		<div class="extrabottom"><table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<div class="pagination">
			{if $db_blog_view|@count gt 0}
			    <span class="switch" style="float: left;">{$recmsg}</span>
			    {/if}
			 </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionBlog">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionBlog').value,'m-member',document.frmbloglist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  Blog listing ends here -->
	
</div>
{literal}
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dCreateDate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
 </script>
<script>

function Searchopt(){
	
    document.getElementById('frmsearchblog').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'm-member';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}

function MakeActionBlog(loopid,member,type){
	//alert("hello");
    document.frmbloglist.iBlogId.value = loopid;
    document.frmbloglist.iMemberId.value = member;
    document.frmbloglist.action.value = type;    
    document.frmbloglist.submit();	
}

function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'm-member';
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
		
	      if($('#actiondel')){
		      $('#actiondel').val("DeleteBlogImage");
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
{/literal}
