<?php /* Smarty version Smarty-3.0.7, created on 2013-01-17 02:49:13
         compiled from "/home/qmemedia/public_html/admin/templates/vehicle/vehicle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112884913650f7bb0961be32-91474915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e373d88fe5caf48080df8be98d08a931c2ac5bd5' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/vehicle/vehicle.tpl',
      1 => 1356511647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112884913650f7bb0961be32-91474915',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=ve-vehicle&mode=view">Vehicle type</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Vehicle type<?php }else{ ?>Edit Vehicle type<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Vehicle Type</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Vehicle Type</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=ve-vehicle_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iVehicleTypeId" id="iVehicleTypeId" value="<?php echo $_smarty_tpl->getVariable('iVehicleTypeId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Name of Vehicle Type:</strong></label>
					<input type="text" id="vName" name="Data[vName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_vehicle_type')->value[0]['vName'];?>
" lang="*" title="Vehicle type"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_vehicle_type')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_vehicle_type')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				
               			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Vehicle Type" class="btn" onclick="return validate(document.frmadd);" title="Add Vehicle Type" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Vehicle Type" class="btn" onclick="return validate(document.frmadd);" title="Edit Vehicle Type" style="margin-left:140px;"/>
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
    var file = 've-vehicle';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=ve-vehicle&mode=view";
    return false;
}

</script>



