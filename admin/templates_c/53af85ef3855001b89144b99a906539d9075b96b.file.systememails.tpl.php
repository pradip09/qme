<?php /* Smarty version Smarty-3.0.7, created on 2012-12-11 11:23:30
         compiled from "/var/www/qme/admin/templates/tools/systememails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200773462250c6ca5ac2c5e4-99558135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53af85ef3855001b89144b99a906539d9075b96b' => 
    array (
      0 => '/var/www/qme/admin/templates/tools/systememails.tpl',
      1 => 1354363262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200773462250c6ca5ac2c5e4-99558135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('TPATH_ADMIN_CKEDITOR_URL')->value;?>
/ckeditor.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=to-systememails&mode=view">System Emails</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add System Emails<?php }else{ ?>Edit System Emails<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add System Email</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit System Email</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-systememails_a" method="post">
				<input type="hidden" name="iEmailTemplateId" id="iEmailTemplateId" value="<?php echo $_smarty_tpl->getVariable('iEmailTemplateId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Email Title:</strong></label>
					<input type="text" id="vEmailTitle" name="Data[vEmailTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_system_email')->value[0]['vEmailTitle'];?>
" lang="*" title="Email Title"/>
				</div> 
				
				<div class="inputboxes">
					<label for="textfield"><strong>Email Subject</strong></label>
					<input type="text" id="vEmailSubject" name="Data[vEmailSubject]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_system_email')->value[0]['vEmailSubject'];?>
" lang="*" title="Email Subject"/>
				</div> 
				<div class="inputboxes">
					<label for="textfield"><strong>From Name</strong></label>
					<input type="text" id="vFromName" name="Data[vFromName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_system_email')->value[0]['vFromName'];?>
" lang="*" title="From Name"/>
				</div> 
				<div class="inputboxes">
					<label for="textfield"><strong>From Email</strong></label>
					<input type="text" id="vFromEmail" name="Data[vFromEmail]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_system_email')->value[0]['vFromEmail'];?>
" lang="*" title="From Email"/>
				</div> 
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_system_email')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_system_email')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</div> 
				<div class="inputboxes">
					<label for="textfield"><strong>Email Message:</strong></label>
				</div>
				<p>
					<textarea id="tEmailMessage" name="tEmailMessage"><?php echo stripslashes($_smarty_tpl->getVariable('db_system_email')->value[0]['tEmailMessage']);?>
</textarea>
				</p>
				
                <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				<input type="submit" value="Add System Email" class="btn" onclick="return validate(document.frmadd);" title="Add System Email" style="margin-left:140px;"/>
   				<?php }else{ ?>
   				<input type="submit" value="Edit System Email" class="btn" onclick="return validate(document.frmadd);" title="Edit System Email" style="margin-left:140px;"/>
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
    window.location=admin_url+"/index.php?file=to-systememails&mode=view";
    return false;
}
</script>
<script type="text/javascript">
	CKEDITOR.config.width=800;
	
	CKEDITOR.replace( 'tEmailMessage' );
</script>


