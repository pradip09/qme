<?php /* Smarty version Smarty-3.0.7, created on 2013-01-09 20:46:01
         compiled from "/home/qmemedia/public_html/admin/templates/tools/interest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118505173650ee2b696a9b11-57607678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d8da3249816d7e9d2087a9be6675dd4843cb67c' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/tools/interest.tpl',
      1 => 1356511656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118505173650ee2b696a9b11-57607678',
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



