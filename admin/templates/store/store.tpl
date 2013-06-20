<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=st-store&mode=view">Store Plan</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Store Plan{else}Edit Store Plan{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Store Category</h2>
		{else}
		
		<h2 class="left">Edit Store Category</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=st-store_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iStoreCategoryId" id="iStoreCategoryId" value="{$db_store[0].iStoreCategoryId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_store[0].vStoreImage}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
               
				<div class="inputboxes">
					<label for="textfield"><strong>Store Category:</strong></label>
					<input type="text" id="vStoreCategory" name="Data[vStoreCategory]" class="inputbox" value="{$db_store[0].vStoreCategory}" lang="*" title="Store Category"/>
				</div>
				<div class="inputboxes">
					<label for="textarea" ><strong>Category Description:</strong></label>                           
					<textarea rows="3" cols="18" id="tDescription" name="Data[tDescription]" class="inputbox"  lang="*" title="Category Description" maxlength="100">{$db_store[0].tDescription}</textarea>
					    
				</div>
                
                												
				
					<div class="inputboxes">
					<label for="textfield" style="margin-bottom: 7px;"><strong>Upload New Image:</strong></label>
					{if $db_store[0].vStoreImage eq ''}
					<input type="file" id="vStoreImage" name="vStoreImage" class="inputbox" value="{$db_store[0].vStoreImage}"  title="Store Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{else}
					<input type="file" id="vStoreImage" name="vStoreImage" class="inputbox" value="{$db_store[0].vStoreImage}"  title="Store Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{/if}
					
					{if $db_store[0].vStoreImage neq ''}
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin-left: 120px;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_store"]}{$db_store[0].iStoreCategoryId}/{$db_store[0].vStoreImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" {if $db_store[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_store[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Store" class="btn" onclick="return validate(document.frmadd);" title="Add Item" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit Store" class="btn" onclick="return validate(document.frmadd);" title="Edit Item" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
	</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'st-store';
    window.location=admin_url+"/index.php?file=st-store&mode=view";
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
{/literal}


