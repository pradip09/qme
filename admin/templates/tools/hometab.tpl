<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=to-hometab&mode=view">Home Tab</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Home Tab{else}Edit Home Tab{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Home Tab</h2>
		{else}
		
		<h2 class="left">Edit Home Tab</h2>
		{/if}
	</div>
	<div id="divBannermsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;">{$var_msg}</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-hometab_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iBannerId" id="iBannerId" value="{$iBannerId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_hometab[0].vImage}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Title:</strong></label>
					<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="{$db_hometab[0].vTitle}" lang="*" title="Title" style="width:500px"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Short Description:</strong></label>
				</div>	
				<div style="padding-left: 135px;"><textarea id="tSortDescription" name="Data[tSortDescription]" class="inputbox" title="Short Description" style="margin-left:140px;width:357px; height:90px;">{$db_hometab[0].tSortDescription}</textarea></div>
				<div style="clear:both;"></div>
				<br>
				<div class="inputboxes">
					<label for="textfield"><strong>Long Description:</strong></label>
				</div>	
				<div style="padding-left: 135px;"><textarea id="tLongDescription" name="Data[tLongDescription]" class="inputbox" title="Long Description" >{$db_hometab[0].tLongDescription}</textarea></div>
				<div style="clear:both;"></div>
				<br>
				
				<div style="display:block; width:1000px;">
					<div style="width:480px;float:left;" class="inputboxes">
						<label for="textfield"><strong>Image:</strong></label>
						{if $db_hometab[0].vImage eq ''}
						<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_hometab[0].vImage}"  title="vImage" onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						{else}
						<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_hometab[0].vImage}"  onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						{/if}
					</div>
					{if $db_hometab[0].vImage neq ''}
					<div style="float:left; width:450px;">
							<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
							<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
							
							<div style="display:none;">
								<div id="view1">
									<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_hometab"]}/{$db_hometab[0].vImage}" /></div>
									
									</div>
								</div>
							</div>
					</div>					
					{/if}
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:223px;">
						<option value="Active" {if $db_hometab[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_hometab[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				

               			{if $mode eq add}
   				<input type="submit" value="Add Hometab" class="btn" onclick="return validate(document.frmadd);" title="Add Hometab" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit HomeTab" class="btn" onclick="return validate(document.frmadd);" title="Edit HomeTab" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

				
		</form>
	</div>
</div>
{literal}


<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'to-hometab';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=to-hometab&mode=view";
    return false;
}
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

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script type="text/javascript">
 
 </script>
<script type="text/javascript">
	CKEDITOR.replace('tSortDescription');
	CKEDITOR.config.width=700;
	CKEDITOR.replace('tLongDescription');
</script>
{/literal}


