<?php /* Smarty version Smarty-3.0.7, created on 2013-02-13 07:00:54
         compiled from "/home/qmemedia/public_html/admin/templates/tools/agencybanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1897453969511b8e86a45616-27676858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd50cf4c0aae4827a37ffdfaea88de15012008ac' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/tools/agencybanner.tpl',
      1 => 1360760208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1897453969511b8e86a45616-27676858',
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
/index.php?file=to-agencybanner&mode=view">Agency Banner</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Banner<?php }else{ ?>Edit Banner<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
	<h2 class="left">Add Banner</h2>
	<?php }else{ ?>
	<h2 class="left">Edit Banner</h2>
	<?php }?>
	</div>
	<div id="divBannermsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"><?php echo $_smarty_tpl->getVariable('var_msg')->value;?>
</div>
        <div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-agencybanner_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="iAgencybannerId" id="iAgencybannerId" value="<?php echo $_smarty_tpl->getVariable('iAgencybannerId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
                                <input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['vImage'];?>
" />
                                
				<div class="inputboxes">
					<label for="textfield"><strong>Title:</strong></label>
					<input type="text" id="vTitle"  name="Data[vTitle]" class="inputbox"  lang="*" title="Title" value="<?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['vTitle'];?>
"/>
					
				 </div>
                                  
				<div class="inputboxes">
				<label for="textfield"><strong>Image :</strong></label>
                                <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['vImage']==''){?>
				<input type="file" id="vImage"  name="vImage" class="inputbox"  lang="*" title="vImage" value="<?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['vImage'];?>
" style="width: 100px;"/>
                                <?php }else{ ?>
                                <input type="file" id="vImage"  name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['vImage'];?>
" style="width: 100px;"/>
                                <?php }?>
				
				<?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['vImage']!=''){?>
				<div style="float:left; width:450px;margin-left:43px;">
						<div ><a href="#view11" id="test"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
view.png"/></a></div>
						<div style="margin-left: 44px;margin-top: -21px;"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
delete.png" onclick="ImageDelete();"/></div>
						<div style="display:none;">
						<div id="view11" >
							<div class="popup_box">
							<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_agencybanner"];?>
<?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['vImage'];?>
"/></div>
							</div>
						</div>
						</div>
						
					
				</div>	
					<?php }?>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Link:</strong></label>
					<input type="text" id="vlink"  name="Data[vlink]" class="inputbox"  lang="*" title="link" value="<?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['vlink'];?>
"/>
					
				 </div>
                            <div class="inputboxes">
					<label for="textfield"><strong>Order No:</strong></label>
					<select  id="tOrderNo" name="Data[tOrderNo]" title="order no" style="width:224px;">
                                            <option value="1" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['tOrderNo']==1){?>selected<?php }?> >1</option>
                                            <option value="2" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['tOrderNo']==2){?>selected<?php }?>>2</option>
                                            <option value="3" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['tOrderNo']==3){?>selected<?php }?>>3</option>
                                            <option value="4" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['tOrderNo']==4){?>selected<?php }?>>4</option>
                                            <option value="5" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['tOrderNo']==5){?>selected<?php }?>>5</option>
                                        </select>
					
				 </div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus " name="Data[eStatus ]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_agn_banner')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				
				 </div>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				<input type="submit" value="Add Banner" class="btn" title="Add Banner" onclick="return validate(document.frmadd);" style="margin-left:140px;"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Banner" class="btn" title="Edit Baneer" onclick="return validate(document.frmadd);" style="margin-left:140px;"/>
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
var id='<?php echo $_smarty_tpl->getVariable('mode')->value;?>
';	
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
		html ='<textarea id="tCustomCode" name="Data[tCustomCode]" COLS=50 ROWS=10  title="Custom Code" lang="*" ><?php echo $_smarty_tpl->getVariable('db_agn_banner')->value[0]['tCustomCode'];?>
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
	return false; 
}

</script>


