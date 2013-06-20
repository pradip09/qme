<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:23:30
         compiled from "/var/www/qme/admin/templates/tools/interest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156890695250b4d3eac53c75-81939811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '578c0c62f4d75f34eae6b53f988fd3083926326d' => 
    array (
      0 => '/var/www/qme/admin/templates/tools/interest.tpl',
      1 => 1354027927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156890695250b4d3eac53c75-81939811',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=to-interest&mode=view">Interest</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Interest<?php }else{ ?>Edit Interest<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Interest</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Interest</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-interest_a" method="post">
				<input type="hidden" name="iInterestId" id="iInterestId" value="<?php echo $_smarty_tpl->getVariable('iInterestId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Interest:</strong></label>
					<input type="text" id="vInterest" name="Data[vInterest]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_interest')->value[0]['vInterest'];?>
" lang="*" title="Interest"/>
				</div> 
				
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_interest')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_interest')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div> 
				
				
                <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Interest" class="btn" onclick="return validate(document.frmadd);" title="Add Interest" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Interest" class="btn" onclick="return validate(document.frmadd);" title="Edit Interest" style="margin-left:140px;"/>
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
    var file = 'u-user';
    window.location=admin_url+"/index.php?file=to-interest&mode=view";
    return false;
}
</script>



