<?php /* Smarty version Smarty-3.0.7, created on 2012-06-27 12:26:28
         compiled from "/var/www/quotation/admin/templates/order/estimate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17695904534feaae9cdd4375-58511915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79b3b9881cd652ee49636ca37e8d01459ddc6cd1' => 
    array (
      0 => '/var/www/quotation/admin/templates/order/estimate.tpl',
      1 => 1340780111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17695904534feaae9cdd4375-58511915',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table border="0">
<tr>
<td style="float:left;">
	<div class="contentcontainer" style="width:550px;">
	<div class="headings">
	<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
	<h2 class="left">Add Estimate</h2>
	<?php }else{ ?>
	<h2 class="left">Customer</h2>	
	<?php }?>
	</div>
	<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=o-estimate_a" method="post">
        <input type="hidden" name="iEstimateId" id="iEstimateId" value="<?php echo $_smarty_tpl->getVariable('iEstimateId')->value;?>
" />
        <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
        <table>
			<tr>
				<td><label for="textfield"><strong>Name :</strong></label></td>
				<td><label for="textfield"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['Name'];?>
</label></td>
				
			</tr>
			</tr>
				<td><label for="textfield"><strong>Email :</strong></label></td>
				<td><label for="textfield"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['vEmail'];?>
</label></td>
				<td><label for="textfield"></label></td>
			</tr>
			</table></form>
			</div>		
	</div>	
	
	</td>
	<td style="float:left;">
		<div class="contentcontainer" style="width:550px;">
		<div class="headings" style="padding-top:0px;">
		<h2 class="left" >Customer details</h2>
		</div>
		<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=o-estimate_a" method="post">
        <input type="hidden" name="iEstimateId" id="iEstimateId" value="<?php echo $_smarty_tpl->getVariable('iEstimateId')->value;?>
" />
        <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
        <table>
			<tr>
			
				<td><label for="textfield"><strong>Status :</strong></label></td>
				<td><label for="textfield"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['eStatus'];?>
</label></td>
			</tr>
			</tr>
				<td><label for="textfield"><strong>Request Date :</strong></label></td>
				<td><label for="textfield"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['dAddedDate'];?>
</label></td>
			</tr>
			<?php ob_start();?><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['fDiscount'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!='0.00'){?>
			</tr>
				<td><label for="textfield"><strong>Discount:</strong></label></td>
				<td><label for="textfield"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['fDiscount'];?>
</label></td>
			</tr>
			<?php }else{ ?>
			<?php }?>
			<tr>
				<td><label for="textfield"><strong>Grand Total :</strong></label></td>
				<td><label for="textfield"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['fGrandTotal']-$_smarty_tpl->getVariable('db_est')->value[0]['fDiscount'];?>
</label></td>

			</tr>
			
			</table></form>
        </div>
		
</div></td></tr></table>

<div class="contentbox" id="tabs-1" style="width:1080px;border-top-left-radius: 10px; border-top-right-radius: 10px;margin-left:9px;">
		<form id="frmadd" name="frmadd" action="index.php?file=o-estimate_a" method="post" onchange="calculate()">
        <input type="hidden" name="iEstimateId" id="iEstimateId" value="<?php echo $_smarty_tpl->getVariable('iEstimateId')->value;?>
" />
        <input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
        
       <table>
		<th style="padding-right:150px;">Product Name</th><th style="padding-right:150px;">Product Code</th><th style="padding-right:150px;">Quntity</th><th style="padding-right:100px;">Price</th><th style="padding-right:50px;">Total Price</th>
		 <?php if (count($_smarty_tpl->getVariable('db_cat')->value)>0){?>
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_cat')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <input type="hidden" name="IdArr[]" id="IdArr[]" value="<?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iEstimateDetailId'];?>
">
        <tr class="<?php echo $_smarty_tpl->getVariable('class')->value;?>
"><td><?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vTitle'];?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vProductCode'];?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iQty'];?>
</td>
			<td><input type="hidden" id="iQty" name="iQty[]"  value="<?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iQty'];?>
"/>
				<input type="text" id="fPrice" style="width:180px;" name="fPrice[]"  value="<?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fPrice'];?>
" title="Price" onkeypress="return checkprice(event);"/></td>
			<td id="fTotalPrice" ><?php echo $_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['fPrice']*$_smarty_tpl->getVariable('db_cat')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iQty'];?>
</td>
		</tr>
		
        <?php endfor; endif; ?>
        <?php }else{ ?>
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
		</tr>
        <?php }?>
		
       </table><span style="margin-left:920px;">------------------</span><br/>
       <span style="font-size:14px;margin-left:800px;"><strong>Grand Total</strong></span><span style="margin-left:45px;"><?php echo $_smarty_tpl->getVariable('db_est')->value[0]['fGrandTotal'];?>
</span><br/><br />
		<div class="sub_input"><input type="submit" value="Send Quotation" class="btn" title="Send Quotation" onclick="sendquotation(<?php echo $_smarty_tpl->getVariable('iEstimateId')->value;?>
);"/>
		<input type="submit" value="Modify" class="btn" title="Modify" onclick="modify(document.frmadd)"/>
		<input type="button" value="Back" class="btnalt" title="Cancel" onclick="redirectcancel();"/></div>
		</form>
</div>



<script>
function calculate(){
	document.frmlist.fTotalPrice = $db_cat[i].fPrice*$db_cat[i].iQty;
	document.frm.submit();
}	
function modify(frm){
	document.frm.submit();
	
}
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=o-estimate&mode=view";
    return false;
}
function MakeAction(loopid,type){
    document.frmlist.iEstimateDetailId.value = loopid;
    document.frmlist.action.value = type;
	document.frmlist.submit();	
}

function sendquotation(iEstimateId){
	var extra ='';
	if(iEstimateId !=''){
		extra+='&iEstimateId='+iEstimateId;
	}
	var url = admin_url+"/index.php?file=o-sendquotationrequest";
	var pars = extra;
	//alert(url+pars);return false;
	$.post(url+pars,
            function(data) {
		var html='';
		html+='<div class="popup_box" style="height:auto;">';
		html+='<div class="errormsg_login" style="font-size:12px;text-align:center;">';
		html+=data;
		html+='</div>';
		html+='</div>';
		$(document).ready(function () {                                
                               $.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                       });
	});
}
</script>


