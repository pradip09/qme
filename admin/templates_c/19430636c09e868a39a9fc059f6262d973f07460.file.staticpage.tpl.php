<?php /* Smarty version Smarty-3.0.7, created on 2012-06-08 18:25:14
         compiled from "/var/www/quotation/admin/templates/tools/staticpage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17045691104fd1f632ded867-78267894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19430636c09e868a39a9fc059f6262d973f07460' => 
    array (
      0 => '/var/www/quotation/admin/templates/tools/staticpage.tpl',
      1 => 1339160112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17045691104fd1f632ded867-78267894',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('TPATH_ADMIN_CKEDITOR_URL')->value;?>
/ckeditor.js"></script>
<script>
//var stateArr = '{$stateArr}';
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<div class="contentcontainer" id="tabs">
	<div class="headings">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='edit'){?>
		
		
		<h2 class="left">Edit Static Page</h2>
		<?php }?>
	</div>
        <div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=to-staticpage_a" method="post">
				<input type="hidden" name="iPageId" id="iPageId" value="<?php echo $_smarty_tpl->getVariable('iPageId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
                                
                                <p>
					<label for="textfield"><strong>DisplayName:</strong></label>
					<input type="text" id="vDisplayName" name="Data[vDisplayName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['vDisplayName'];?>
" lang="*" title="Display Name"/>
				</p>
                               
                                <p>
					<label for="textfield"><strong>Meta Title:</strong></label>
					<input type="text" id="tMetaTitle"  name="Data[tMetaTitle]" class="inputbox"  lang="*" title="MetaTitle" value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['tMetaTitle'];?>
"/>
				</p>
				<p>
					<label for="textfield"><strong>Meta Keyword:</strong></label>
					<input type="text" id="tMetaKeyword" name="Data[tMetaKeyword]" class="inputbox" lang="*" title="MetaKeyword" value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['tMetaKeyword'];?>
"/>
				</p>
                                  <p>
					<label for="textfield"><strong>Meta Description:</strong></label>
					<input type="text" id="tMetaDesc"  name="Data[tMetaDesc ]" class="inputbox" lang="*" title="MetaDescription " value="<?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['tMetaDesc'];?>
"/>
				</p>
                                
                                 
                                  <p>
					<label for="textfield"><strong>Content:</strong></label>
					<textarea id="lContents" name="Data[lContents]"><?php echo $_smarty_tpl->getVariable('db_static_pages')->value[0]['lContents'];?>
</textarea>
				</p>
                                  
				<p>
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus " name="Data[eStatus ]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_static_pages')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_static_pages')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>
				</p>
                               
                                <input type="submit" value="Edit Page" class="btn" onclick="return validate(document.frmadd);" title="Edit Page"/>
   				
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
                                
		        </form>
        </div>
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'to-staticpage';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=to-staticpage&mode=view";
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
<script type="text/javascript">
	CKEDITOR.replace( 'lContents' );
	
</script>

