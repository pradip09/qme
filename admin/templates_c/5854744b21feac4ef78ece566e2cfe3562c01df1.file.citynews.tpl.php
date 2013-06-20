<?php /* Smarty version Smarty-3.0.7, created on 2013-02-06 08:57:20
         compiled from "/home/qmemedia/public_html/admin/templates/news/citynews.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79039660951126f501fe353-17145068%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5854744b21feac4ef78ece566e2cfe3562c01df1' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/news/citynews.tpl',
      1 => 1360162602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79039660951126f501fe353-17145068',
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
		<li><a href="#">City News</a></li>
		
	</ul>
</div>
<div id="content">
<div class="container">
	<div class="conthead">
		
		<h2 class="left">City News</h2>
		
	</div>
	<div class="contentbox">
		 <?php if ($_smarty_tpl->getVariable('var_msg_new')->value!=''){?>
		<div class="status success" id="errormsgdiv"> 
			   <p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
			   <p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" />
			 <?php echo $_smarty_tpl->getVariable('var_msg_new')->value;?>
</p> 
		</div>     
	       <div></div>
	       <?php }elseif($_smarty_tpl->getVariable('var_msg')->value!=''){?>
	       <div class="status success" id="errormsgdiv"> 
			   <p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
			   <p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" />
			 <?php echo $_smarty_tpl->getVariable('var_msg')->value;?>
</p> 
		</div>     
	       <div></div>
	       <?php }?>
		<form name="frmsearch" id="frmsearch" action="" method="post">
		<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" name="type">
			
		<table width="100%" border="0">
			<tbody>
				<tr>
					<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
					<td width="10%"><div class="inputboxes inputboxes_admin"><input type="Text" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
"  class="inputbox" /></div><td>
					<td width="10%"><div class="bulkactions">
						<select name="option" id="option">
							<option value=''>Select Name</option>
							<option value='vName'>Member Name</option>
													
						</select></div>
					</td>
					<td width="60%"><div class="bulkactions">
					<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" id="type" name="type">
					<input type="button" value="Search" class="btn" id="Search" name="Search" title="Search" onclick="Searchoption();"/></div></td>
					<td width="10%">
					
					</td>
				</tr>	
				<tr>
					<td colspan="7" align="center">
						<div style="width:821px; margin:auto;"><?php echo $_smarty_tpl->getVariable('AlphaBox')->value;?>
</div>
					</td>
				</tr>
			</tbody>			
			</table> 
		</form>
		    
		<form id="frmcatlist" name="frmcatlist" action="index.php?file=n-citynews_a" enctype="multipart/form-data" method="post">
			<div class="administator_table">
				<table width="100%" border="0" id="data_table">
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				
			<div class="inputboxes">
                                 <label for="textfield" style="width:300px;"><strong>Select Member profile:</strong></label><br /><br />  
                                      <hr />                        
                                                <div style="width:200px; float:left; padding:5px;" >
                                                        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_member')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
                                                        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']%6==0&&$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']!=0){?>
                                                 </div>
                                                        <div style="width:200px; float:left;padding:5px;">
                                                          <?php }?>
                                                        <input type="checkbox" id="iCitynewsId[]" name="iCitynewsId[]" value="<?php echo $_smarty_tpl->getVariable('db_member')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iMemberId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_member')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iMemberId'],$_smarty_tpl->getVariable('CityArray')->value)){?>checked="checked"<?php }?> lang="*" title="checkbox" /><?php echo $_smarty_tpl->getVariable('db_member')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vName'];?>
<br />
                                                        <?php endfor; endif; ?>                                                            
                                                </div>
                    	</div>
               			
   		      <input type="submit" value="Save" class="btn" onclick="return validate(document.frmcatlist);" title="Save" style="margin-left:511px;"/>
				</table>
			</div>
		</form>
		<div class="extrabottom">
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
			<td>
			<div class="pagination">
            <?php if (count($_smarty_tpl->getVariable('db_member')->value)>0){?>
	       <!-- <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg')->value;?>
</span>-->
	        <?php }?>
            </div></td>
	    
			<td><div class="bulkactions" style="float: right;">
				<select name="newaction" id="newaction">
					<!--<option value="">Select Action</option>-->
					<option value="Show All">Show All</option>
				</select>
				
				<input type="submit" value="Apply" class="btn" onclick="showAll();"/>
			</div></td>
				<td><div>
	
	 
        </div></td></tr></table>
			
		</div>
	</div>
</div>

<script>
function showAll(abs){
	
    var file = 'n-citynews';
    window.location="index.php?file="+file+"&mode=edit";
    return false;
}

function Searchoption(){
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
//alert($('#type').val());
var type = $('#type').val();

    var alphavalue = val;
    var file = 'n-citynews';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=edit";
    return false;
}

function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}	
</script>






