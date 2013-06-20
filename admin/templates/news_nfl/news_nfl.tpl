<script type="text/javascript" src="{$tconfig['tsite_admin_ckeditor_path']}ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=ne-news_nfl&mode=view">News</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add News{else}Edit News{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add News</h2>
		{else}
		
		<h2 class="left">Edit News</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=ne-news_nfl_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iNewsId" id="iNewsId" value="{$iNewsId}" />
				<input type="hidden" name="vOldVideo" id="vOldVideo" value="{$db_news[0].vVideo}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_news[0].vImage}" />
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>News Title:</strong></label>
					<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="{$db_news[0].vTitle}" lang="*" title="News Title" style="width:900px"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>News Description:</strong></label>
					<textarea id="vDescription" name="Data[vDescription]" class="inputbox" title="News Description" style="width:900px; height:200px">{$db_news[0].vDescription}</textarea>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>News Added Date :</strong></label>					
					<input type="text" id="dAddedDate"  name="Data[dAddedDate]" class="inputbox" lang="*" title="News Added Date" value="{$db_news[0].dAddedDate}" style="width:150px"/>
				</div>
				<!--<p>
					<label for="textfield"><strong>Image :</strong></label>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_news[0].vImage}" title="vImage"/>
					{if $mode eq edit}
						<label for="textfield"><strong>Old Image :</strong></label>
						<img src="{$tconfig["tsite_upload_images_news"]}{$db_news[0].vImage}" height="100" width="100"/>
					{/if}
				</p>-->
				<!--<div class="inputboxes">
					<label for="textfield"><strong>Upload Video File:</strong></label>
					{if $db_news[0].vVideo eq ''}
					<input type="file" id="vVideo" name="vVideo" class="inputbox" value="{$db_news[0].vVideo}"  title="Video File" onchange="CheckValidVideoFile(this.value,this.name)" style="width:200px;"/>
					{else}
					<input type="file" id="vVideo" name="vVideo" class="inputbox" value="{$db_news[0].vVideo}"  onchange="CheckValidVideoFile(this.value,this.name)" style="width:200px;"/>
					{/if}
				</div>
				{if $db_news[0].vVideo neq ''}
				<div class="inputboxes">
					<label for="textfield"><strong>Current Video File:</strong></label>
					<a class="video"  title="The Falltape" href="{$tconfig["tsite_upload_images_news"]}{$db_news[0].iNewsId}/{$db_news[0].vVideo}?fs=1&amp;autoplay=1"><img src="{{$tconfig["tsite_images"]}}video_btn.png"/></a>
					
					
				</div>
				{/if}-->
				<div style="display:block; width:1000px;">
					<div style="width:480px;float:left;" class="inputboxes">
						<label for="textfield"><strong>Image:</strong></label>
						{if $db_news[0].vImage eq ''}
						<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_news[0].vImage}" lang="*"  title="vImage" onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						{else}
						<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_news[0].vImage}"  onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						{/if}
					</div>
					{if $db_news[0].vImage neq ''}
					<div style="float:left; width:450px;">
							<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
							<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
							
							<div style="display:none;">
								<div id="view1">
									<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_news"]}{$db_news[0].iNewsId}/{$db_news[0].vImage}" /></div>
									
									</div>
								</div>
							</div>
					</div>					
					{/if}
				</div>
				<div style="clear:both;"></div>
				<!--<div style="width:1000px;">
					<div class="inputboxes">
						<label for="textfield"><strong>Order No :</strong></label>
						<select id="iOrderNo" name="Data[iOrderNo]" lang="*" title="Order No" style="width:223px;">
							<option value=''>Select Order No</option>
							{if $mode eq add}
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
				</div>-->
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:223px;">
						<option value="Active" {if $db_news[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_news[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				

               			{if $mode eq add}
   				<input type="submit" value="Add News" class="btn" onclick="return validate(document.frmadd);" title="Add News" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit News" class="btn" onclick="return validate(document.frmadd);" title="Edit News" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

				
		</form>
	</div>
</div>
{literal}


<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'ne-news_nfl';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=ne-news_nfl&mode=view";
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

function CheckValidVideoFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'flv' || a == 'avi' || a == 'mp4')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (flv,mp4,avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}


</script>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dAddedDate').datepicker({dateFormat: 'yy-mm-dd'});});
 });
 </script>
<script type="text/javascript">
	CKEDITOR.replace('vDescription');
</script>
{/literal}


