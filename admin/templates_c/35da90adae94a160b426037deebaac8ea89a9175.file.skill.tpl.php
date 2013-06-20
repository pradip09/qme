<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:23:16
         compiled from "/var/www/qme/admin/templates/tools/skill.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3862143650b4d3dc3802f6-94656706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35da90adae94a160b426037deebaac8ea89a9175' => 
    array (
      0 => '/var/www/qme/admin/templates/tools/skill.tpl',
      1 => 1354027979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3862143650b4d3dc3802f6-94656706',
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
/index.php?file=to-skill&mode=view">Skill</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Skill<?php }else{ ?>Edit Skill<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Skill</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Skill</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-skill_a" method="post">
				<input type="hidden" name="iSkillId" id="iSkillId" value="<?php echo $_smarty_tpl->getVariable('iSkillId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Skill:</strong></label>
					<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_skill')->value[0]['vSkill'];?>
" lang="*" title="Skill"/>
				</div> 
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_skill')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_skill')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div> <br/><br/>
				
				
				  <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add Skill" class="btn" onclick="return validate(document.frmadd);" title="Add Skill" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit Skill" class="btn" onclick="return validate(document.frmadd);" title="Edit Skill" style="margin-left:140px;"/>
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
    var file = 'to-skill';
    window.location=admin_url+"/index.php?file=to-skill&mode=view";
    return false;
}
</script>


