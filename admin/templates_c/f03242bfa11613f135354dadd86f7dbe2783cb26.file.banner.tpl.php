<?php /* Smarty version Smarty-3.0.7, created on 2012-07-12 19:56:39
         compiled from "/var/www/qme_theme/admin/templates/tools/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16725883994ffede9f6765e6-41909228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f03242bfa11613f135354dadd86f7dbe2783cb26' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/tools/banner.tpl',
      1 => 1342103198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16725883994ffede9f6765e6-41909228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
	<h2 class="left">Add Banner</h2>
	<?php }else{ ?>
	<h2 class="left">Edit Banner</h2>
	<?php }?>
	</div>
        <div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-banner_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="iBannerId" id="iBannerId" value="<?php echo $_smarty_tpl->getVariable('iBannerId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
                                <input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_banner')->value[0]['vImage'];?>
" />
                                <div class="inputboxes">
					<label for="textfield"><strong>Select Page</strong></label>
					<select id="vTitle" name="Data[vTitle]">
					<option value="Home" <?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['vTitle']=='Home'){?>selected<?php }?>>Home</option>
					<option value="Bottom" <?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['vTitle']=='Bottom'){?>selected<?php }?>>Bottom</option>
						
					</select>
				 </div>
				<div class="inputboxes">
					<label for="textfield"><strong>Title:</strong></label>
					<input type="text" id="vPage"  name="Data[vPage]" class="inputbox"  lang="*" title="Title" value="<?php echo $_smarty_tpl->getVariable('db_banner')->value[0]['vPage'];?>
"/>
					
				 </div>
			       
			      
				<div class="inputboxes">
					<label for="textfield"><strong>Type:</strong></label>
					<select id="eType" name="Data[eType]" onchange="showdropdownvalue(this.value);">
					<option value="Image" <?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['eType']=='Image'){?>selected<?php }?>>Image</option>
					<option value="Custom Code" <?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['eType']=='Custom Code'){?>selected<?php }?>>Custorm Code</option>
					</select>
				</div>
                                  
				<div class="inputboxes" id="imageid" style="display:none;">
				<label for="textfield"><strong>Image :</strong></label>
				<div id="textimage"></div>
				
				<?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['vImage']!=''){?>
				<div  style="width:350px; float:left;">
						<div id="view" style="float:left; margin-right:5px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<div id="delete" style="float:left;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></div>
						
						<div style="display:none;">
						<div id="view1">
							<div class="popup_box">
							<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_banner"];?>
<?php echo $_smarty_tpl->getVariable('db_banner')->value[0]['vImage'];?>
"/></div>
							</div>
						</div>
						</div>
					
				</div>	
					<?php }?>
				</div>
				
                            
				<div class="inputboxes" id="customid" style="display:none;">
					<label for="textfield"><strong>Custom Code:</strong></label>
					<div id="textcustom"></div>
				</div>
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus " name="Data[eStatus ]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_banner')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				
				 </div>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				<input type="submit" value="Add Banner" class="btn" title="Add Banner" onclick="return validate(document.frmadd);"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Banner" class="btn" title="Edit Baneer" onclick="return validate(document.frmadd);"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
                               
                                
		        </form>
        </div>
</div>
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    window.location=admin_url+"/index.php?file=to-banner&mode=view";
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
	
	if(val == 'Image'){
		$('#imageid').show();
		$('#view').show();
		$('#delete').show();
		var html ='';
		html ='<input type="file" id="vImage" name="vImage" class="inputbox" value="{$db_banner[0].vImage}"  title="Image" onchange="CheckValidFile(this.value,this.name)" lang="*"  />';
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
		html ='<textarea id="tCustomCode" name="Data[tCustomCode]" COLS=50 ROWS=10  title="Custom Code" lang="*" ><?php echo $_smarty_tpl->getVariable('db_banner')->value[0]['tCustomCode'];?>
</textarea>';
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
	document.getElementById(name).value = "";
	return false; 
}
</script>


