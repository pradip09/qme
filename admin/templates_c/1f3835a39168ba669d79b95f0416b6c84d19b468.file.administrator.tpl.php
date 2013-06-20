<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 09:50:42
         compiled from "/var/www/qme_theme/admin/templates/administrator/administrator.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38306127450078b1ad01fa8-51919084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f3835a39168ba669d79b95f0416b6c84d19b468' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/administrator/administrator.tpl',
      1 => 1342438360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38306127450078b1ad01fa8-51919084',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content">
        <!-- Table styles start -->           
        <div class="container">
                <div class="conthead">
                    	<h2>Add Administrator</h2>
                </div>
                <div class="contentbox">
			<form id="frmadd" name="frmadd" action="index.php?file=ad-administrator_a" method="post">
            <input type="hidden" name="iAdminId" id="iAdminId" value="<?php echo $_smarty_tpl->getVariable('iAdminId')->value;?>
" />
            <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<div class="inputboxes">
					<label for="textfield"><strong>First Name :</strong></label>
					<input type="text" id="vLastName" name="Data[vFirstName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vFirstName'];?>
" lang="*" title="First Name"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Last Name :</strong></label>
					<input type="text" id="vLastName" name="Data[vLastName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vLastName'];?>
" lang="*" title="Last Name"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>E-mail :</strong></label>
					<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vEmail'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>User Name :</strong></label>
					<input type="text" id="vUserName" name="Data[vUserName]" class="inputbox" lang="*{P}6:0" title="User Name" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vUserName'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Password :</strong></label>
					<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox" lang="*{P}6:0" title="Password" value="<?php echo $_smarty_tpl->getVariable('db_admin')->value[0]['vPassword'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_admin')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_admin')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='edit'){?>
				<input type="submit" value="Edit Administrator" class="btn" onclick="return validate(document.frmadd);" title="Edit Administrator"/>
				      <?php }else{ ?>
   				<input type="submit" value="Add Administrator" class="btn" onclick="return validate(document.frmadd);" title="Add Administrator"/>
  				
				      
				      <?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
                </div>
        </div>
        <!-- Table styles end -->
</div>


<script>
function redirectcancel()
{
    window.location="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=ad-administrator&mode=view";
    return false;
}
</script>
