<?php /* Smarty version Smarty-3.0.7, created on 2013-02-04 09:01:46
         compiled from "/home/qmemedia/public_html/admin/templates/news/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319402430510fcd5a1a2a19-53416518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2c3e3a688534329e76189129e5b028e7c6f76cc' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/news/news.tpl',
      1 => 1359724618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319402430510fcd5a1a2a19-53416518',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_admin_ckeditor_path'];?>
ckeditor.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=n-news&mode=view">News</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add News<?php }else{ ?>Edit News<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add News</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit News</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=n-news_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iNewsId" id="iNewsId" value="<?php echo $_smarty_tpl->getVariable('iNewsId')->value;?>
" />
				<input type="hidden" name="vOldVideo" id="vOldVideo" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vVideo'];?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vImage'];?>
" />
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>News Title:</strong></label>
					<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vTitle'];?>
" lang="*" title="News Title" style="width:900px"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>News Description:</strong></label>
					<textarea id="vDescription" name="Data[vDescription]" class="inputbox" title="News Description" style="width:900px; height:200px"><?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vDescription'];?>
</textarea>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>News Added Date :</strong></label>					
					<input type="text" id="dAddedDate"  name="Data[dAddedDate]" class="inputbox" lang="*" title="News Added Date" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['dAddedDate'];?>
" style="width:150px"/>
				</div>
				<!--<p>
					<label for="textfield"><strong>Image :</strong></label>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vImage'];?>
" title="vImage"/>
					<?php if ($_smarty_tpl->getVariable('mode')->value=='edit'){?>
						<label for="textfield"><strong>Old Image :</strong></label>
						<img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_news"];?>
<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vImage'];?>
" height="100" width="100"/>
					<?php }?>
				</p>-->
				<!--<div class="inputboxes">
					<label for="textfield"><strong>Upload Video File:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_news')->value[0]['vVideo']==''){?>
					<input type="file" id="vVideo" name="vVideo" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vVideo'];?>
"  title="Video File" onchange="CheckValidVideoFile(this.value,this.name)" style="width:200px;"/>
					<?php }else{ ?>
					<input type="file" id="vVideo" name="vVideo" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vVideo'];?>
"  onchange="CheckValidVideoFile(this.value,this.name)" style="width:200px;"/>
					<?php }?>
				</div>
				<?php if ($_smarty_tpl->getVariable('db_news')->value[0]['vVideo']!=''){?>
				<div class="inputboxes">
					<label for="textfield"><strong>Current Video File:</strong></label>
					<a class="video"  title="The Falltape" href="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_news"];?>
<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['iNewsId'];?>
/<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vVideo'];?>
?fs=1&amp;autoplay=1"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
video_btn.png"/></a>
					
					
				</div>
				<?php }?>-->
				<div style="display:block; width:1000px;">
					<div style="width:480px;float:left;" class="inputboxes">
						<label for="textfield"><strong>Image:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_news')->value[0]['vImage']==''){?>
						<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vImage'];?>
" lang="*"  title="vImage" onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						<?php }else{ ?>
						<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vImage'];?>
"  onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->getVariable('db_news')->value[0]['vImage']!=''){?>
					<div style="float:left; width:450px;">
							<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
view.png"/></a></div>
							<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
delete.png" onclick="ImageDelete();"/></p>
							
							<div style="display:none;">
								<div id="view1">
									<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_news"];?>
<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['iNewsId'];?>
/<?php echo $_smarty_tpl->getVariable('db_news')->value[0]['vImage'];?>
" /></div>
									
									</div>
								</div>
							</div>
					</div>					
					<?php }?>
				</div>
				<div style="clear:both;"></div>
				<!--<div style="width:1000px;">
					<div class="inputboxes">
						<label for="textfield"><strong>Order No :</strong></label>
						<select id="iOrderNo" name="Data[iOrderNo]" lang="*" title="Order No" style="width:223px;">
							<option value=''>Select Order No</option>
							<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
								<?php while (($_smarty_tpl->getVariable('totalRec')->value+1)>=$_smarty_tpl->getVariable('initOrder')->value){?>
									<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_news')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
								<?php }?>
							<?php }else{ ?>
								<?php while (($_smarty_tpl->getVariable('totalRec')->value)>=$_smarty_tpl->getVariable('initOrder')->value){?>
									<option value="<?php echo $_smarty_tpl->getVariable('initOrder')->value;?>
" <?php if ($_smarty_tpl->getVariable('db_news')->value[0]['iOrderNo']==$_smarty_tpl->getVariable('initOrder')->value){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('initOrder')->value++;?>
</option>
								<?php }?>
							<?php }?>
						</select>
					</div>
				</div>-->
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:223px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_news')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_news')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				

               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add News" class="btn" onclick="return validate(document.frmadd);" title="Add News" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit News" class="btn" onclick="return validate(document.frmadd);" title="Edit News" style="margin-left:140px;"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

				
		</form>
	</div>
</div>



<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'n-news';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=n-news&mode=view";
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



