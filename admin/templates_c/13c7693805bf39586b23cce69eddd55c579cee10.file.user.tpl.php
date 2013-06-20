<?php /* Smarty version Smarty-3.0.7, created on 2012-06-28 16:32:15
         compiled from "/var/www/quotation/admin/templates/users/user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16250162394fec39b75601c7-72641947%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13c7693805bf39586b23cce69eddd55c579cee10' => 
    array (
      0 => '/var/www/quotation/admin/templates/users/user.tpl',
      1 => 1340881332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16250162394fec39b75601c7-72641947',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>

//var stateArr = '{$stateArr}';
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>

<div class="contentcontainer" id="tabs">
	<div class="headings">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add User</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit User</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=u-user_a" method="post">
				<input type="hidden" name="iUserId" id="iUserId" value="<?php echo $_smarty_tpl->getVariable('iUserId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				
				<p>
					<label for="textfield"><strong>First Name:</strong></label>
					<input type="text" id="vFirstName" name="Data[vFirstName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vFirstName'];?>
" lang="*" title="First Name"/>
				</p>
				<p>
					<label for="textfield"><strong>Last Name:</strong></label>
					<input type="text" id="vLastName" name="Data[vLastName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vLastName'];?>
" lang="*" title="Last Name"/>
				</p>
				
				<p>
					<label for="textfield"><strong>E-mail :</strong></label>
					<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vEmail'];?>
"/>
				</p>
				<p>
					<label for="textfield"><strong>Office Phone :</strong></label>
					<input type="text" id="vPhone"  name="Data[vPhone]" class="inputbox" lang="*" title="Phone" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vPhone'];?>
" onkeypress="return chkValidPhone(event);"/>
				</p>
				<p>
					<label for="textfield"><strong>Cell Phone :</strong></label>
					<input type="text" id="vCellPhone" name="Data[vCellPhone]" class="inputbox" title="CellPhone" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vCellPhone'];?>
" onkeypress="return chkValidPhone(event);"/>
					
				</p>
				<p>
					<label for="textfield"><strong>Company Name :</strong></label>
					<input type="text" id="vCompanyName" name="Data[vCompanyName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vCompanyName'];?>
" title="Company Name"/>
				</p>
				<p>
					<label for="textfield"><strong>vPosition :</strong></label>
					<input type="text" id="vPosition" name="Data[vPosition]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vPosition'];?>
" title="Position"/>
				</p>
				<p>
					<label for="textfield"><strong>Address :</strong></label>
					<input type="text" id="vAddress" name="Data[vAddress]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vAddress'];?>
" lang="*" title="Address"/>
				</p>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				<p>
					<label for="textfield"><strong>Password :</strong></label>
					<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox" lang="*{P}6:0" title="Password" value="<?php echo $_smarty_tpl->getVariable('db_user')->value[0]['vPassword'];?>
"/>
				</p>
				<?php }?>
				
				<p>
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_user')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_user')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</p>
				
                <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add User" class="btn" onclick="return validate(document.frmadd);" title="Add User"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit User" class="btn" onclick="return validate(document.frmadd);" title="Edit User"/>
   				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
	</div>    
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'u-user';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=u-user&mode=view";
    return false;
}
/*

window.onload = function()
{

var iCountryId = document.getElementById('iCountryId').value;
var mode='<?php echo $_smarty_tpl->getVariable('mode')->value;?>
';

if (mode== "edit")
{
var iStateId = '<?php echo $_smarty_tpl->getVariable('db_userinfo')->value[0]["user_state"];?>
';
//alert(iStateId);
getRelativeCombo(iCountryId,iStateId,'iStateId','-- Select State --',stateArr);
}
}
*/
</script>

