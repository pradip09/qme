<?php /* Smarty version Smarty-3.0.7, created on 2013-01-18 08:18:55
         compiled from "/home/qmemedia/public_html/admin/templates/tools/hometab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194484942750f959cfc021e1-36777143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c75c35fec5d016d5a6905c6f22b13ff7b073c62' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/tools/hometab.tpl',
      1 => 1358518538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194484942750f959cfc021e1-36777143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
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
/index.php?file=to-hometab&mode=view">Home Tab</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Home Tab<?php }else{ ?>Edit Home Tab<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Home Tab</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Home Tab</h2>
		<?php }?>
	</div>
	<div id="divBannermsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"><?php echo $_smarty_tpl->getVariable('var_msg')->value;?>
</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-hometab_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iBannerId" id="iBannerId" value="<?php echo $_smarty_tpl->getVariable('iBannerId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['vImage'];?>
" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Title:</strong></label>
					<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['vTitle'];?>
" lang="*" title="Title" style="width:500px"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Short Description:</strong></label>
				</div>	
				<div style="padding-left: 135px;"><textarea id="tSortDescription" name="Data[tSortDescription]" class="inputbox" title="Short Description" style="margin-left:140px;width:357px; height:90px;"><?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['tSortDescription'];?>
</textarea></div>
				<div style="clear:both;"></div>
				<br>
				<div class="inputboxes">
					<label for="textfield"><strong>Long Description:</strong></label>
				</div>	
				<div style="padding-left: 135px;"><textarea id="tLongDescription" name="Data[tLongDescription]" class="inputbox" title="Long Description" ><?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['tLongDescription'];?>
</textarea></div>
				<div style="clear:both;"></div>
				<br>
				
				<div style="display:block; width:1000px;">
					<div style="width:480px;float:left;" class="inputboxes">
						<label for="textfield"><strong>Image:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_hometab')->value[0]['vImage']==''){?>
						<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['vImage'];?>
"  title="vImage" onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						<?php }else{ ?>
						<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['vImage'];?>
"  onchange="CheckValidFile(this.value,this.name)" style="width:200px;"/>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->getVariable('db_hometab')->value[0]['vImage']!=''){?>
					<div style="float:left; width:450px;">
							<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
							<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
							
							<div style="display:none;">
								<div id="view1">
									<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_hometab"];?>
/<?php echo $_smarty_tpl->getVariable('db_hometab')->value[0]['vImage'];?>
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
					<select id="eStatus" name="Data[eStatus]" style="width:223px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_hometab')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_hometab')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				

               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Hometab" class="btn" onclick="return validate(document.frmadd);" title="Add Hometab" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit HomeTab" class="btn" onclick="return validate(document.frmadd);" title="Edit HomeTab" style="margin-left:140px;"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

				
		</form>
	</div>
</div>



<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
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



