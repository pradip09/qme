<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:25:19
         compiled from "/var/www/qme/admin/templates/storeplan/storeplan.tpl" */ ?>
<?php /*%%SmartyHeaderCode:108015159850b4d457581298-77257250%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de3d692a44325a46dfa8a7985be472dd43f143b2' => 
    array (
      0 => '/var/www/qme/admin/templates/storeplan/storeplan.tpl',
      1 => 1354028099,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108015159850b4d457581298-77257250',
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
/index.php?file=sp-storeplan&mode=view">Store Plan</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Store Plan<?php }else{ ?>Edit Store Plan<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Store Plan</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Store Plan</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=sp-storeplan_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iStorePlanId" id="iStorePlanId" value="<?php echo $_smarty_tpl->getVariable('db_storeplan')->value[0]['iStorePlanId'];?>
" />
				
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
                
               
				<div class="inputboxes">
					<label for="textfield"><strong>Store Plan Name:</strong></label>
					<input type="text" id="vStorePlanName" name="Data[vStorePlanName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_storeplan')->value[0]['vStorePlanName'];?>
" lang="*" title="Store Category"/>			                    
            	</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Point:</strong></label>
					<input type="text" id="iPoint" name="Data[iPoint]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_storeplan')->value[0]['iPoint'];?>
" onkeypress="return checkprice(event);" lang="*" title="Point" />
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_storeplan')->value[0]['fPrice'];?>
" onkeypress="return checkprice(event);" lang="*" title="Price" />
				</div>
		<div class="inputboxes">
					<label for="textfield"><strong>Item limit:</strong></label>
					<input type="text" id="item_limit" name="Data[item_limit]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_storeplan')->value[0]['item_limit'];?>
" onkeypress="return checkprice(event);" lang="*" title="Item limit" />
				</div>
                												
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_storeplan')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_storeplan')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Store Plan" class="btn" onclick="return validate(document.frmadd);" title="Add Item" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Store Plan" class="btn" onclick="return validate(document.frmadd);" title="Edit Item" style="margin-left:140px;"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
	</div>
</div>

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
    var file = 'sp-storeplan';
    window.location=admin_url+"/index.php?file=sp-storeplan&mode=view";
    return false;
}

</script>



