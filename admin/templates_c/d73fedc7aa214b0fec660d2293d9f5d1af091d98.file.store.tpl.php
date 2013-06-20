<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:27:07
         compiled from "/var/www/qme/admin/templates/store/store.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25288244750b4d4c3e7e4f7-32195513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd73fedc7aa214b0fec660d2293d9f5d1af091d98' => 
    array (
      0 => '/var/www/qme/admin/templates/store/store.tpl',
      1 => 1354028212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25288244750b4d4c3e7e4f7-32195513',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
/index.php?file=st-store&mode=view">Store Plan</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Store Plan<?php }else{ ?>Edit Store Plan<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Store Category</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Store Category</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=st-store_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iStoreCategoryId" id="iStoreCategoryId" value="<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['iStoreCategoryId'];?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['vStoreImage'];?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
               
				<div class="inputboxes">
					<label for="textfield"><strong>Store Category:</strong></label>
					<input type="text" id="vStoreCategory" name="Data[vStoreCategory]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['vStoreCategory'];?>
" lang="*" title="Store Category"/>
				</div>
				<div class="inputboxes">
					<label for="textarea" ><strong>Category Description:</strong></label>                           
					<textarea rows="3" cols="18" id="tDescription" name="Data[tDescription]" class="inputbox"  lang="*" title="Category Description" maxlength="100"><?php echo $_smarty_tpl->getVariable('db_store')->value[0]['tDescription'];?>
</textarea>
					    
				</div>
                
                												
				
					<div class="inputboxes">
					<label for="textfield" style="margin-bottom: 7px;"><strong>Upload New Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_store')->value[0]['vStoreImage']==''){?>
					<input type="file" id="vStoreImage" name="vStoreImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['vStoreImage'];?>
"  title="Store Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }else{ ?>
					<input type="file" id="vStoreImage" name="vStoreImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['vStoreImage'];?>
"  title="Store Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }?>
					
					<?php if ($_smarty_tpl->getVariable('db_store')->value[0]['vStoreImage']!=''){?>
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<p style="margin-left: 120px;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_store"];?>
<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['iStoreCategoryId'];?>
/<?php echo $_smarty_tpl->getVariable('db_store')->value[0]['vStoreImage'];?>
" /></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_store')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_store')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Store" class="btn" onclick="return validate(document.frmadd);" title="Add Item" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Store" class="btn" onclick="return validate(document.frmadd);" title="Edit Item" style="margin-left:140px;"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
	</div>
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
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



