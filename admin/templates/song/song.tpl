<script language="JavaScript" src="{$tconfig.tcp_javascript}jlist.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>

<div class="container" id="tabs">
	<div class="conthead">
		<h2 class="left">My Songs</h2>
	</div>
	<!--  Add/Edit category starts here -->
	<div class="contentbox" id="tabs-1" >

		<form id="frmaddsongcat" name="frmaddsongcat" action="index.php?file=so-songalbum_a" enctype="multipart/form-data" method="post" >
			<input type="hidden" name="iSongAlbumId" id="iSongAlbumId" value="{$iSongAlbumId}" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}" />
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_songalbum[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$modeSongAlb}"/>
			<input type="hidden" name="actionAlbsong" id="actionAlbsong" value=""/>
			<table align="center" class="admin_top_table" width="50%">  
				<tr>
					<td>
						<div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Song Album:</strong></label>
							<input type="text" id="vSongAlbum" name="Data[vSongAlbum]" class="inputbox" value="{$db_songalbum[0].vSongAlbum}" title="Song Album" lang="*"/>
						</div>
					</td>
				</tr>
				<tr>
				<td><div class="inputboxes inputboxes_admin">
				<label for="textfield"><strong>Select Image:</strong></label>
				{if $db_songalbum[0].vImage eq ''}
				<input type="file" id="vImage" name="vImage"  value="{$db_songalbum[0].vImage}"  title="Image" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
				{else}
				<input type="file" id="vImage" name="vImage" value="{$db_songalbum[0].vImage}" style="float:left; width:auto;"  title="Image" onchange="CheckValidFile(this.value,this.name)"/>
				<div class="view_btn"><a href="#view12" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="AlbImageDelete();" style="margin-left:8px;"/></div>
				{/if}
					<div style="display:none;">
						<div id="view12">
							<div class="popup_box">
								<div><img src="{$tconfig["tsite_upload_music_song"]}{$db_songalbum[0].iMemberId}/{$db_songalbum[0].vImage}" /></div>
							</div>
						</div>
					</div>
				</div>
				</td>			
				</tr>
				<tr>
					<td>
						<div class="inputboxes inputboxes_admin">
							<label for="textfield"><strong>Status:</strong></label>
							<select id="eStatus" name="Data[eStatus]">
								<option value="Active" {if $db_songalbum[0].eStatus eq Active}selected{/if}>Active</option>
								<option value="Inactive" {if $db_songalbum[0].eStatus eq Inactive}selected{/if}>Inactive</option>
							</select>
						</div>			
					</td>
				</tr>
				<tr>
					<td align="right" class="add_photo_btn"> 
						{if $modeSongAlb eq add}
						<input type="submit" value="Add Song Album" class="btn" onclick="return validate(document.frmaddsongcat);" title="Add Song Album"/>
						{else}
						<input type="submit" value="Edit Song Album" class="btn" onclick="return validate(document.frmaddsongcat);" title="Edit Song Album"/>
						{/if}
						<!--<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>-->
					</td>
				</tr>
			</table>
			
			
			
		</form>
	</div>
	<!--  Add/Edit category ends here -->
	<form name="frmsearchsongcat" id="frmsearchsongcat" action="#tab-song" method="post">
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label>
				<td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword4" name="keyword4" value="{$keyword}" class="inputbox" /></div>
				<td>
				<td width="10%" ><div class="bulkactions"><select name="option4" id="option4">
						<option value="vSongAlbum">Song Album</option>
						<option value="eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionsongcat();"/></div></td>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
	<!-- category listing starts here -->
	<div class="contentbox contentbox_admin" id="tabs-1">
		<form name="frmsongcatlist" id="frmsongcatlist" action="index.php?file=so-songalbum_a" method="post">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="admin_main_table">
				<input type="hidden" name="action" id="action" value="" />
				<input  type="hidden" name="iSongAlbumId" value=""/>
				<input  type="hidden" name="iMemberId" value=""/>
				<thead class="admin_table_title">
					<tr>
						<th>Song Album</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmsongcatlist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				{if $db_viewsongalbum|@count gt 0}
				{section name=i loop=$db_viewsongalbum}
				
				{if $smarty.section.i.index % 2}
				{assign var="class" value="alt"}
				{else}
				{assign var="class" value=""}
				{/if}
				<tr class="{$class}">
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewsongalbum[i].iMemberId}&iSongAlbumId={$db_viewsongalbum[i].iSongAlbumId}#tab-song" title="">{$db_viewsongalbum[i].vSongAlbum}</a></td>
					<td>{$db_viewsongalbum[i].eStatus}</td>
					<td>
						<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewsongalbum[i].iMemberId}&iSongAlbumId={$db_viewsongalbum[i].iSongAlbumId}#tab-song" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionCat('{$db_viewsongalbum[i].iSongAlbumId}','{$db_viewsongalbum[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionCat('{$db_viewsongalbum[i].iSongAlbumId}','{$db_viewsongalbum[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionCat('{$db_viewsongalbum[i].iSongAlbumId}','{$db_viewsongalbum[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td><input name="iSongAlbumId[]" type="checkbox" id="iId" value="{$db_viewsongalbum[i].iSongAlbumId}"/>
						<input name="iMemberId" type="hidden" id="mId" value="{$db_viewsongalbum[i].iMemberId}"/></td>
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
			<table cellpadding="0" cellspacing="0" width="100%"><tr><td>
			<div class="pagination"> {if $db_viewsongalbum|@count gt 0} <span class="switch" style="float: left;">{$recmsg11}</span> {/if} </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionSongCat">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionSongCat').value,'m-member',document.frmsongcatlist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!-- category listing ends here -->
	
	<!--- Add/Edit Song starts here --->
	<div class="contentbox" id="tabs-1" style="margin-left: -200px;">
		<form id="frmsongadd" name="frmsongadd" action="index.php?file=so-song_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iSongId" id="iSongId" value="{$iSongId}"/>
			<input type="hidden" name="vOldSong" id="vOldSong" value="{$db_song[0].vSong}"/>
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_song[0].vCoverImage}"/>
			<input type="hidden" name="Data[iMemberId]" id="Data[iMemberId]" value="{$db_song[0].iMemberId}" />
			<input type="hidden" name="action" id="action" value="{$modeSong}" />
			<input type="hidden" name="actionSong" id="actionSong" value="" />
			<input type="hidden" name="iMemberId" id="iMemberId" value="{$iMemberId}"/>
			<table align="center" class="photo_edit_table">
			<tr>
			<td>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Song Title:</strong></label>
				<input type="text" id="vSongTitle" name="Data[vSongTitle]" class="inputbox" value="{$db_song[0].vSongTitle}" lang="*" title="Song Title"/>
			</div>
			<div class="inputboxes">
				<label for="textfield"><strong>Song Album:</strong></label>
				<select id="iSongAlbumId" name="Data[iSongAlbumId]" title="Song Album" onchange="showdropdownvalue(this.value);">
					<option value=''>--Select Song Album--</option>
					{section name=i loop=$db_songAlb}
					<option value='{$db_songAlb[i].iSongAlbumId}' {if $db_songAlb[i].iSongAlbumId eq $db_song[0].iSongAlbumId}selected{/if}>{$db_songAlb[i].vSongAlbum}</option>
					{/section}
				</select>
			</div>
			<div class="inputboxes">
				<label for="textfield"><strong>Song Genre:</strong></label>
				<select id="iSongGenreId" name="Data[iSongGenreId]"  title="Song Genre">
					<option value=''>--Select Song Genre--</option>
					{section name=i loop=$db_songGenre}
					<option value='{$db_songGenre[i].iSongGenreId}' {if $db_songGenre[i].iSongGenreId eq $db_song[0].iSongGenreId}selected{/if}>{$db_songGenre[i].vGenreName}</option>
					{/section}
				</select>
			</div>
			<!--<div class="inputboxes">
				<label for="textfield"><strong>Order No :</strong></label>
				<select id="iOrderNo" name="Data[iOrderNo]">
					{if $modeSong eq add}
						{while ($totalRecSong+1) >= $initOrderSong}
							<option value="{$initOrderSong}" {if $db_song[0].iOrderNo eq $initOrderSong}selected{/if}>{$initOrderSong++}</option>
						{/while}
					{else}
						{while ($totalRecSong) >= $initOrderSong}
							<option value="{$initOrderSong}" {if $db_song[0].iOrderNo eq $initOrderSong}selected{/if}>{$initOrderSong++}</option>
						{/while}
					{/if}
				</select>
			</div>-->
			<div class="inputboxes">
				<div>
					<label for="textfield"><strong>Audio File:</strong></label>
					{if $db_song[0].vSong eq ''}
					<input type="file" id="vSong" name="vSong"  value="{$db_song[0].vSong}"  title="Mp3 File" lang="*" onchange="CheckAudioValidFile(this.value,this.id)"/>
					{else}
					<input type="file" id="vSong" name="vSong" value="{$db_song[0].vSong}"  title="Mp3 File" onchange="CheckAudioValidFile(this.value,this.id)"/>
					{/if}
				</div>
				<div style="clear:both;"></div>
				{if $db_song[0].vSong neq ''}
				<div style="float:left; width:450px;">
					<div style="width:260px; float:left; margin-left:135px;">
						<object type="application/x-shockwave-flash" data="{$tconfig['tsite_music']}/dewplayer-bubble.swf" width="250" height="65" id="dewplayer" name="dewplayer">
							<param name="wmode" value="transparent" />
							<param name="movie" value="{$tconfig['tsite_music']}/dewplayer-bubble.swf" />
							<param name="flashvars" value="mp3={$tconfig['tsite_upload_music_song']}{$db_song[0].iMemberId}/{$db_song[0].vSong}&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
						</object>
					</div>
					<div style="width:50px; float:left">
						<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="SongDelete();"/></p>
					</div>
				</div>
				{/if}
			</div>
			<!--<div class="inputboxes">
				
				<label for="textfield"><strong>Upload Cover Photo:</strong></label>
				{if $db_song[0].vCoverImage eq ''}
				<input type="file" id="vCoverImage" name="vCoverImage" class="inputbox" value="{$db_song[0].vCoverImage}"  title="vImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
				{else}
				<input type="file" id="vCoverImage" name="vCoverImage" class="inputbox" value="{$db_song[0].vCoverImage}"  title="vImage" onchange="CheckValidFile(this.value,this.name)"/>
				{/if}
				<div style="clear:both;"></div>
				{if $db_song[0].vCoverImage neq ''}
				<div style="float:left; width:350px;">
					<div style="float:left; margin:10px 5px 0px 140px;"><a href="#viewSong" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
					<p style="margin:10px 5px 0px 140px;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="CoverImageDelete();"/></p>
					<div style="display:none;">
						<div id="viewSong">
							<div class="popup_box">
								<div><img src="{$tconfig["tsite_upload_music_song"]}{$db_song[0].iMemberId}/{$db_song[0].vCoverImage}" /></div>
							</div>
						</div>
					</div>
				</div>
				{/if}
			</div>-->
			<div style="clear:both;"></div>
			
			<div class="inputboxes">
				<label for="textfield"><strong>Status:</strong></label>
				<select id="eStatus" name="Data[eStatus]">
					<option value="Active" {if $db_song[0].eStatus eq Active}selected{/if}>Active</option>
					<option value="Inactive" {if $db_song[0].eStatus eq Inactive}selected{/if}>Inactive</option>
				</select>
			</div>
			
			<div class="add_photo_cancel">
				{if $modeSong eq add}
				<input type="submit" value="Add Song" class="btn" onclick="return validate(document.frmsongadd);" title="Add Song"/>
				{else}
				<input type="submit" value="Edit Song" class="btn" on click="return validate(document.frmsongadd);" title="Edit Song"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
			</td>
			</tr>
			</table>
		</form>
	</div>
	<!--- Add/Edit Song ends here --->
	<form name="frmsearchsong" id="frmsearchsong" action="#tab-song" method="post">
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label>
				<td>
				<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword5" name="keyword5" value="{$keyword}" class="inputbox" /></div>
				<td>
				<td width="10%" ><div class="bulkactions"><select name="option5" id="option5">
						<option value="vSongTitle">Song Title</option>
						<option value="eStatus">Status</option>
					</select></div>
				</td>
				<td width="60%"><div class="bulkactions"><input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoptionsong();"/></div></td>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
	
	<!--  Song listing starts here -->
	<div class="contentbox contentbox_admin_bot" id="tabs-1">
		<form name="frmsonglist" id="frmsonglist"  action="index.php?file=so-song_a" method="post">
			<table width="100%" border="0" class="admin_photo_table">
				<input type="hidden" name="action" id="action" value="" />
				<input type="hidden" name="iMemberId" id="iMemberId" value="" />
				<input  type="hidden" name="iSongId" value=""/>
				<thead class="admin_table_title">
					<tr>
						<!--<th>Cover Photo</th>-->
						<th>Song Title</th>
						<th>Song Album</th>
						<th>Status</th>
						<th>Action</th>
						<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmsonglist);"/></th>
					</tr>
				</thead>
				<tbody>
				
				{if $db_viewsong|@count gt 0}
				{section name=i loop=$db_viewsong}
				
				{if $smarty.section.i.index % 2}
				{assign var="class" value="alt"}
				{else}
				{assign var="class" value=""}
				{/if}
				<tr class="{$class}">
					<!--<td><img src="{$tconfig.tsite_upload_music_song}/{$db_viewsong[i].iMemberId}/1_{$db_viewsong[i].vCoverImage}"></td>-->
					<td><a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewsong[i].iMemberId}&iSongId={$db_viewsong[i].iSongId}#tab-song" title="">{$db_viewsong[i].vSongTitle}</a></td>
					{if $db_viewsong[i].SongAlbum neq ''}
					<td>{$db_viewsong[i].SongAlbum}</td>
					{else}
					<td>.......</td>
					{/if}
					<td>{$db_viewsong[i].eStatus}</td>
					<td>
						<a href="{$tconfig.tpanel_url}/index.php?file=m-member&mode=edit&iMemberId={$db_viewsong[i].iMemberId}&iSongId={$db_viewsong[i].iSongId}#tab-song" title=""><img src="{$tconfig.tpanel_img}icons/icon_edit.png" title="Edit" /></a>
						<a href="javascript:void(0);" title="Active" onclick="MakeActionSong('{$db_viewsong[i].iSongId}','{$db_viewsong[i].iMemberId}','Active');"><img src="{$tconfig.tpanel_img}icons/icon_approve.png" title="Active" /></a>
						<a href="javascript:void(0);" title="Inactive" onclick="MakeActionSong('{$db_viewsong[i].iSongId}','{$db_viewsong[i].iMemberId}','Inactive');"><img src="{$tconfig.tpanel_img}icons/icon_unapprove.png" title="Inactive" /></a>
						<a href="javascript:void(0);" title="Delete" onclick="MakeActionSong('{$db_viewsong[i].iSongId}','{$db_viewsong[i].iMemberId}','Delete');"><img src="{$tconfig.tpanel_img}icons/icon_delete.png" title="Delete" /></a>
					</td>
					<td>
						<input name="iSongId[]" type="checkbox" id="iId" value="{$db_viewsong[i].iSongId}"/>
						<input name="iMemberId" type="hidden" id="mId" value="{$db_viewsong[i].iMemberId}"/>
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
			<div class="pagination"> {if $db_viewsong|@count gt 0} <span class="switch" style="float: left;">{$recmsg12}</span> {/if} </div></td>
			<td><div class="bulkactions">
				<select name="newaction" id="newactionSong">
					<option value="">Select Action</option>
					<option value="Deletes">Make Delete</option>
					<option value="Active">Make Active</option>
					<option value="Inactive">Make InActive</option>
					<option value="Show all">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newactionSong').value,'m-member',document.frmsonglist);"/>
			</div></td></tr></table>
		</div>
	</div>
	<!--  photo listing ends here -->
	
</div>
{literal}
<script>

function Searchoptionsongcat(){
	
    document.getElementById('frmsearchsongcat').submit();
}
function Searchoptionsong(){
	
    document.getElementById('frmsearchsong').submit();
}
function AlphaSearch(val){
	var type = $('#type').val();
    var alphavalue = val;
    
    var file = 'so-song';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeActionCat(loopid,member,type){

    document.frmsongcatlist.iSongAlbumId.value = loopid;
    document.frmsongcatlist.iMemberId.value = member;
    document.frmsongcatlist.action.value = type;
	document.frmsongcatlist.submit();	
}
function MakeActionSong(loopid,member,type){
    document.frmsonglist.iSongId.value = loopid;
    document.frmsonglist.iMemberId.value = member;
    document.frmsonglist.action.value = type;    
	document.frmsonglist.submit();	
}

function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'so-song';
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
function CheckAudioValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}
function SongDelete(){
	var r=confirm("Are you sure to delete this Image ");
	if (r==true)
	{
	      if($('#actionSong')){
		      $('#actionSong').val("DeleteSong");
	      }
	      
	      if($('#frmsongadd')){
		      $('#frmsongadd').submit();
	      }
	}
      else
	{
	      return false;
	} 
}
function AlbImageDelete(){
	var r=confirm("Are you sure to delete this image ");
	if (r==true)
	{
	      if($('#actionAlbsong')){
		      $('#actionAlbsong').val("DeleteImage");
	      }
	      
	      if($('#frmaddsongcat')){
		      $('#frmaddsongcat').submit();
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
