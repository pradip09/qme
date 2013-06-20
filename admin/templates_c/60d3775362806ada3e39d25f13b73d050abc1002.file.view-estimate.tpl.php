<?php /* Smarty version Smarty-3.0.7, created on 2012-06-23 11:59:41
         compiled from "/var/www/quotation/admin/templates/order/view-estimate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3805236134fe56255a76e80-29606700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60d3775362806ada3e39d25f13b73d050abc1002' => 
    array (
      0 => '/var/www/quotation/admin/templates/order/view-estimate.tpl',
      1 => 1340432979,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3805236134fe56255a76e80-29606700',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jlist.js"></script>
<div class="contentcontainer">
	<div class="headings altheading">
		<h2>Estimate</h2>
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
        
        <table width="100%" border="0">
		<tbody>
			<tr>
				<td width="10%"><label for="textfield"><strong>Search:</strong></label><td>
				<td width="10%"><input type="Text" id="keyword" name="keyword" value="<?php echo $_smarty_tpl->getVariable('keyword')->value;?>
"  class="inputbox" /><td>
				<td width="10%" >
					<select name="option" id="option">
						<option  value='vCode'>Product Code</option>
						<option value="concat(vFirstName,' ',vLastName)">Name</option>
						<option value="fGrandTotal">Grang Total</option>
						<option value="eStatus">Status</option>
					</select>
				</td>
				<td width="60%"><input type="button" value="Search" class="btnalt" id="Search" name="Search" title="Search" onclick="Searchoption();"/></td>
				<!--<td width="10%"><input type="button" value="Add New" onclick="Redirect('index.php?file=o-estimate&mode=add');" class="btnalt" /></td>-->
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
        <form name="frmlist" id="frmlist"  action="index.php?file=o-estimate_a" method="post">
        
		<table width="100%" border="0">
		<input type="hidden" name="action" id="action" value="" />
        <input  type="hidden" name="iEstimateId" value=""/>
	<thead>
			<tr>	
				<th><a class="matterlink" href="index.php?file=o-estimate&mode=view&sorton=1&st=<?php echo $_smarty_tpl->getVariable('st')->value;?>
">Name</a></th>
				<th><a class="matterlink" href="index.php?file=o-estimate&mode=view&sorton=2&st=<?php echo $_smarty_tpl->getVariable('st')->value;?>
">GrandTotal</a></th>
				<th><a class="matterlink" href="index.php?file=o-estimate&mode=view&sorton=3&st=<?php echo $_smarty_tpl->getVariable('st')->value;?>
">Status</a></th>
				<th><a class="matterlink" href="index.php?file=o-estimate&mode=view&sorton=4&st=<?php echo $_smarty_tpl->getVariable('st')->value;?>
">Date</a></th>
				<th>Action</th>
				
				<th><input type="checkbox" id="check_all" name="check_all" onclick="checkAll(document.frmlist);"/></th>
			</tr>
		</thead>
		<tbody>
        <?php if (count($_smarty_tpl->getVariable('db_est')->value)>0){?>
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_est')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
            
        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']%2){?>
            <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("alt", null, null);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable('', null, null);?>
        <?php }?>
        <tr class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
">
			<td><a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=o-estimate&mode=edit&iEstimateId=<?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateId'];?>
" title=""><?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['Name'];?>
</a></td>
			<td><?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fGrandTotal'];?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['eStatus'];?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['dAddedDate'];?>
</td>
			<td>
				<a href="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_url'];?>
/index.php?file=o-estimate&mode=edit&iEstimateId=<?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateId'];?>
" title=""><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" title="Edit" /></a>
				<a href="javascript:void(0);" title="Requested" onclick="MakeAction('<?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateId'];?>
','Requested');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" title="Requested" /></a>
				<a href="javascript:void(0);" title="Completed" onclick="MakeAction('<?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateId'];?>
','Completed');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" title="Completed" /></a>
				<a href="javascript:void(0);" title="Delete" onclick="MakeAction('<?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateId'];?>
','Deletes');"><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" title="Delete" /></a>
			</td>
			<td><input name="iEstimateId[]" type="checkbox" id="iId" value="<?php echo $_smarty_tpl->getVariable('db_est')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateId'];?>
"/></td>
		</tr>
        <?php endfor; endif; ?>
        <?php }else{ ?>
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
		</tr>
        <?php }?>
		</tbody>
		</table>
        </form>
		<div class="extrabottom">
			<ul>
				<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_edit.png" alt="Edit" /> Edit</li>
				<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_approve.png" alt="Approve" />Requested</li>
				<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_unapprove.png" alt="Unapprove" />Complete</li>
				<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_delete.png" alt="Delete" /> Remove</li>
			</ul>
			<div class="bulkactions">
				<select name="newaction" id="newaction">
					<option value="">Select Action</option>
					<option value="Requested">Make Requested</option>
					<option value="Completed">Make Complete</option>
					<option value="Deletes">Make Delete</option>
					<option value="Show All">Show All</option>
				</select>
				<input type="submit" value="Apply" class="btn" onclick="return Doaction(document.getElementById('newaction').value,'o-estimate',document.frmlist);"/>
			</div>
		</div>
        <div>
            <div class="pagination">
            <?php if (count($_smarty_tpl->getVariable('db_est')->value)>0){?>
	        <span class="switch" style="float: left;"><?php echo $_smarty_tpl->getVariable('recmsg')->value;?>
</span>
	        <?php }?>
            </div>
            <?php echo $_smarty_tpl->getVariable('page_link')->value;?>

        </div>
		
        <!--<ul class="pagination">
			<li class="text">Previous</li>
			<li class="page"><a href="#" title="">1</a></li>
			<li><a href="#" title="">2</a></li>
			<li><a href="#" title="">3</a></li>
			<li><a href="#" title="">4</a></li>
			<li class="text"><a href="#" title="">Next</a></li>
		</ul>-->
		<div style="clear: both;"></div></div>
</div>

<script>
function Searchoption(){
    document.getElementById('frmsearch').submit();
}
function AlphaSearch(val){
    var alphavalue = val;
    var file = 'o-estimate';
    window.location="index.php?file="+file+"&alp="+alphavalue+"&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iEstimateId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}
function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>

