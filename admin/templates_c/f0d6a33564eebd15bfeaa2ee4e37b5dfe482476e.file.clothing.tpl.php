<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:40:42
         compiled from "/var/www/qme/admin/templates/clothing/clothing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131126918250b4d7f29b3848-76776774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0d6a33564eebd15bfeaa2ee4e37b5dfe482476e' => 
    array (
      0 => '/var/www/qme/admin/templates/clothing/clothing.tpl',
      1 => 1354028518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131126918250b4d7f29b3848-76776774',
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
/index.php?file=cl-clothing&mode=view">Clothing and Accessories</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Clothing and Accessories<?php }else{ ?>Edit Clothing and Accessories<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Clothing and Accessories</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Clothing and Accessories</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
        								    				             
              <form id="frmadd" name="frmadd" action="index.php?file=cl-clothing_a" enctype="multipart/form-data" method="post">
        
          			<input type="hidden" name="iProductId" id="iProductId" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['iProductId'];?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductImage'];?>
" />
				<input type="hidden" name="selectedstore" id="selectedstore" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['iStoreId'];?>
"/>
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
                
                <div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select  style="width:224px;" id="iMemberId" name="Data[iMemberId]"  title="Member" lang="*" onchange="getMember(this.value);" >
						<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_Clothmember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
						<option value='<?php echo $_smarty_tpl->getVariable('db_Clothmember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_Clothmember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_clothing')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_Clothmember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
						<?php endfor; endif; ?>
					</select>
					 
				</div>
				<!-- <div class="inputboxes">
					<label for="textfield"><strong>Store Name:</strong></label>
					<div class="showallstores">
					<select id="iStoreId" name="Data[iStoreId]" title="Store Name"  lang="*" style="width:220px;" >
						<option value=''>--Select Store Name--</option>                   
					</select>
					 </div>
                </div>-->								                
				<div class="inputboxes">
					<label for="textfield"><strong>Product Name:</strong></label>
					<input type="text" id="vProductName" name="Data[vProductName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductName'];?>
" lang="*" title="Product Name"/>
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Product Description:</strong></label>
					<textarea id="tProductDescription" name="Data[tProductDescription]" class="inputbox" rows="6" cols="30"> <?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['tProductDescription'];?>
</textarea>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Purchase Note:</strong></label>
					<textarea id="tPurchaseNote" name="Data[tPurchaseNote]" class="inputbox" rows="6" cols="30"> <?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['tPurchaseNote'];?>
</textarea>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Product Size:</strong></label>
					<input type="text" id="vProductSize" name="Data[vProductSize]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductSize'];?>
" lang="*" title="Product Size"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Product Color:</strong></label>
					<input type="text" id="vProductColor" name="Data[vProductColor]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductColor'];?>
" lang="*" title="Product Color"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Custom Color:</strong></label>
					<input type="text" id="vCustomColor" name="Data[vCustomColor]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vCustomColor'];?>
" lang="*" title="Custom Color"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Quantity:</strong></label>
					<input type="text" id="iQuantity" name="Data[iQuantity]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['iQuantity'];?>
" onkeypress="return checkprice(event);" lang="*" title="Quantity"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Purchase Limit:</strong></label>
					<input type="text" id="iPurchaseLimit" name="Data[iPurchaseLimit]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['iPurchaseLimit'];?>
" onkeypress="return checkprice(event);" lang="*" title="Purchase Limit"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['fPrice'];?>
" onkeypress="return checkprice(event);" lang="*" title="Price" maxlength="12"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>HandlingCost:</strong></label>
					<input type="text" id="fHandlingCost" name="Data[fHandlingCost]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['fHandlingCost'];?>
" onkeypress="return checkprice(event);" lang="*" title="Handling Cost" maxlength="12"/>
				</div>
                
					<div class="inputboxes">
					<label for="textfield" style="margin-bottom: 7px;"><strong>Upload New Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_clothing')->value[0]['vProductImage']==''){?>
					<input type="file" id="vProductImage" name="vProductImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductImage'];?>
"  title="Product Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }else{ ?>
					<input type="file" id="vProductImage" name="vProductImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductImage'];?>
"  title="Product Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }?>
					
					<?php if ($_smarty_tpl->getVariable('db_clothing')->value[0]['vProductImage']!=''){?>
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
/2/<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['vProductImage'];?>
" /></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div style="clear:both;"></div>
                <div class="inputboxes">
			<label for="textfield"><strong>Hide Product:</strong></label>					
			<input type="checkbox" id="eHideProduct" name="eHideProduct" value="Yes" <?php if ($_smarty_tpl->getVariable('db_clothing')->value[0]['eHideProduct']=='Yes'){?>checked<?php }?>>Yes
                                                				                  
			</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_clothing')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_clothing')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>                    
				</div>
                
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Product" class="btn" onclick="return validate(document.frmadd);" title="Add Clothing and Accessories" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Product" class="btn" onclick="return validate(document.frmadd);" title="Edit Clothing and Accessories" style="margin-left:140px;"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
        
</div>


        
	</div>
</div>


<script type="text/javascript">
getId('<?php echo $_smarty_tpl->getVariable('db_clothing')->value[0]['iMemberId'];?>
');
function getId(id){
	
	if($('#action').val() == 'edit'){
		var memberId = id;
		getMember(memberId);
	}
	
}

function getMember(memberId)
{
	//alert(makeId);
	var extra ='';
	extra+='&memberId='+memberId;
	if($('#selectedstore')){
        if($('#selectedstore').val() !=''){
         var selectedstore = $('#selectedstore').val();
         extra+='&selectedstore='+selectedstore;   
        }
        
	}

	var url = admin_url+"/index.php?file=cl-ajmemberlist";
	var pars = extra;

	$.post(url+pars,
            function(data) {
	
		if($('.showallstores')){
			$('.showallstores').html(data);
		}
	});
}
</script>
<script>

function checkprice(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if (unicodes>47 && unicodes<58){
	            return true;
		}else{
			return false;
		}
	}
}

function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'cl-clothing';
    window.location=admin_url+"/index.php?file=cl-clothing&mode=view";
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



