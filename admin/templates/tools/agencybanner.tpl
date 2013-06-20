
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=to-agencybanner&mode=view">Agency Banner</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Banner{else}Edit Banner{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
	<h2 class="left">Add Banner</h2>
	{else}
	<h2 class="left">Edit Banner</h2>
	{/if}
	</div>
	<div id="divBannermsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;">{$var_msg}</div>
        <div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-agencybanner_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="iAgencybannerId" id="iAgencybannerId" value="{$iAgencybannerId}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
                                <input type="hidden" name="vOldImage" id="vOldImage" value="{$db_agn_banner[0].vImage}" />
                                
				<div class="inputboxes">
					<label for="textfield"><strong>Title:</strong></label>
					<input type="text" id="vTitle"  name="Data[vTitle]" class="inputbox"  lang="*" title="Title" value="{$db_agn_banner[0].vTitle}"/>
					
				 </div>
                                  
				<div class="inputboxes">
				<label for="textfield"><strong>Image :</strong></label>
                                {if $db_agn_banner[0].vImage eq ''}
				<input type="file" id="vImage"  name="vImage" class="inputbox"  lang="*" title="vImage" value="{$db_agn_banner[0].vImage}" style="width: 100px;"/>
                                {else}
                                <input type="file" id="vImage"  name="vImage" class="inputbox" value="{$db_agn_banner[0].vImage}" style="width: 100px;"/>
                                {/if}
				
				{if $db_agn_banner[0].vImage neq ''}
				<div style="float:left; width:450px;margin-left:43px;">
						<div ><a href="#view11" id="test"><img src="{$tconfig["tsite_images"]}view.png"/></a></div>
						<div style="margin-left: 44px;margin-top: -21px;"><img src="{$tconfig["tsite_images"]}delete.png" onclick="ImageDelete();"/></div>
						<div style="display:none;">
						<div id="view11" >
							<div class="popup_box">
							<div><img src="{$tconfig["tsite_upload_images_agencybanner"]}{$db_agn_banner[0].vImage}"/></div>
							</div>
						</div>
						</div>
						
					
				</div>	
					{/if}
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Link:</strong></label>
					<input type="text" id="vlink"  name="Data[vlink]" class="inputbox"  lang="*" title="link" value="{$db_agn_banner[0].vlink}"/>
					
				 </div>
                            <div class="inputboxes">
					<label for="textfield"><strong>Order No:</strong></label>
					<select  id="tOrderNo" name="Data[tOrderNo]" title="order no" style="width:224px;">
                                            <option value="1" {if $db_agn_banner[0].tOrderNo eq 1}selected{/if} >1</option>
                                            <option value="2" {if $db_agn_banner[0].tOrderNo eq 2}selected{/if}>2</option>
                                            <option value="3" {if $db_agn_banner[0].tOrderNo eq 3}selected{/if}>3</option>
                                            <option value="4" {if $db_agn_banner[0].tOrderNo eq 4}selected{/if}>4</option>
                                            <option value="5" {if $db_agn_banner[0].tOrderNo eq 5}selected{/if}>5</option>
                                        </select>
					
				 </div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus " name="Data[eStatus ]" style="width:224px;">
						<option value="Active" {if $db_agn_banner[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_agn_banner[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				
				 </div>
				{if $mode eq add}
				<input type="submit" value="Add Banner" class="btn" title="Add Banner" onclick="return validate(document.frmadd);" style="margin-left:140px;"/>
				{else}
				<input type="submit" value="Edit Banner" class="btn" title="Edit Baneer" onclick="return validate(document.frmadd);" style="margin-left:140px;"/>
				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
                               
                                
		        </form>
        </div>
</div>
</div>

{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    window.location=admin_url+"/index.php?file=to-agencybanner&mode=view";
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



showdropdownvalue($('#eType').val());

function showdropdownvalue(val){
var id='{/literal}{$mode}{literal}';	
	if(val == 'Image'){
		$('#imageid').show();
		$('#view').show();
		$('#delete').show();
		var html ='';
	if(id == 'add'){
		html ='<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_agn_banner[0].vImage}"  title="Image" onchange="CheckValidFile(this.value,this.name)"  lang="*"  style="width:203px;"/>';
	}else{
			html ='<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_agn_banner[0].vImage}"  title="Image" onchange="CheckValidFile(this.value,this.name)"   style="width:203px;"/>';
	}
	//alert(html);
		$('#textimage').html(html);
		$('#customid').hide();
		$('#textcustom').html('');
	}else{
		$('#imageid').hide();
		$('#view').hide();
		$('#delete').hide();
		$('#textimage').html('');
		var html ='';
		html ='<textarea id="tCustomCode" name="Data[tCustomCode]" COLS=50 ROWS=10  title="Custom Code" lang="*" >{/literal}{$db_agn_banner[0].tCustomCode}{literal}</textarea>';
		$('#textcustom').html(html);
		$('#customid').show();
	}
	//alert(val);
}

function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )	
	return true;         
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');	
	return false; 
}

</script>

{/literal}
