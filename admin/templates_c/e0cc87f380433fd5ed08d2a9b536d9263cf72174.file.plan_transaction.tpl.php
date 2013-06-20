<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:29:00
         compiled from "/var/www/qme/admin/templates/plan_transaction/plan_transaction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192659556650b4d534b36b51-93789571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0cc87f380433fd5ed08d2a9b536d9263cf72174' => 
    array (
      0 => '/var/www/qme/admin/templates/plan_transaction/plan_transaction.tpl',
      1 => 1354028322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192659556650b4d534b36b51-93789571',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script src="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/public_html/javascripts/jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=pt-plan_transaction&mode=view">Plan Trasaction</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Plan Trasaction<?php }else{ ?>Edit Plan Trasaction<?php }?></li>
	</ul>
</div>
<div id="content">
	<form id="frmadd" name="frmadd" action="index.php?file=pt-plan_transaction_a" enctype="multipart/form-data" method="post">
	<input type="hidden" id="" name="" value="" />
	<div class="member_reapt_box">
		<div class="member_info_title">Member Info</div>
		<div class="mem_reapt_pad">
			<table width="100%" cellspacing="0" cellpadding="0">
				<tbody><tr>
					<td><label>Name</label><span class="dou_colan">:</span><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['vName'];?>
</td>
				</tr>
				<tr>
					<td><label>Email</label><span class="dou_colan">:</span><span id="vEmail"><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['vEmail'];?>
</span></td>
				</tr></tbody>
			</table>
		</div>
	</div>
	
	
	<div class="member_reapt_box" style=" float:right; margin-right:27px;">
		<div class="member_info_title">Mail Notification</div>
		<div class="mem_reapt_pad">
			 <div class="status success" id="errormsgdiv"> 
				<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p> 
				<p id="msg"></p> 
			</div> 
			<div id="propertymessageid" class="error_massage" align="center"></div>
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td><label>Status</label><span class="dou_colan">:</span>
						<div class="bulkactions" style="float:left;">
						<select id="eTransactionStatus" name="eTransactionStatus">
							<option value="Success" <?php if ($_smarty_tpl->getVariable('db_plan')->value[0]['eTransactionStatus']=='Success'){?>selected<?php }?>>Success</option>
							<option value="Cancelled" <?php if ($_smarty_tpl->getVariable('db_plan')->value[0]['eTransactionStatus']=='Cancelled'){?>selected<?php }?>>Cancelled</option>
							<option value="InProcess" <?php if ($_smarty_tpl->getVariable('db_plan')->value[0]['eTransactionStatus']=='InProcess'){?>selected<?php }?>>InProcess</option>
						</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><label>Comment</label><span class="dou_colan">:</span><textarea id="tComment" name="tComment" style="width:218px;height:56px;" ></textarea></td>
				</tr>
				<tr>
					<td><label>Notification Email</label><span class="dou_colan">:</span><input type="checkbox" id="eNotification" name="eNotification" /></td>
				</tr>
				<tr>
					<td><div class="order_send_btn"><input type="button" class="btn" value="Send" onclick="return checkOrder(<?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['iPlanTransactionId'];?>
);"/></div></td>
				</tr>
			</table>			
			<div id="comment_data"></div>
		</div>
	</div>
	
	
	
	<div class="member_reapt_box">
		<div class="member_info_title">Card Information</div>
		<div class="mem_reapt_pad">
			<table width="100%" cellspacing="0">
				<tbody><tr>
					<td><label>Card Type</label><span class="dou_colan">:</span><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['vPaymentType'];?>
</td>
				</tr>
				<tr>
					<td><label>Card Number</label><span class="dou_colan">:</span><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['vCardNo'];?>
</td>
				</tr>
				<tr>
					<td><label>CVV Number</label><span class="dou_colan">:</span><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['vCCV'];?>
</td>
				</tr>
				<tr>
					<td><label>Expaire Date</label><span class="dou_colan">:</span><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['dExpiaryDate'];?>
</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="member_reapt_box">
		<div class="member_info_title">Payment Information</div>
		<div class="mem_reapt_pad">
			<table width="100%" cellspacing="0">
				<tbody>
				<tr>
					<td><label>Payment Date</label><span class="dou_colan">:</span><span id="TransactionDate"><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['dTransactionDate'];?>
</span></td>
				</tr>
				<tr>
					<td><label>Payment Status</label><span class="dou_colan">:</span><span id="TransactionStatus"><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['eTransactionStatus'];?>
</span></td>
				</tr></tbody>
			</table>
		</div>
	</div>
	
	<div style="clear:both"></div>
	
	<div class="chapter_pop_table">
		<table width="100%" cellspacing="0" border="0" cellpadding="0">
			<tbody><tr>
				<th width="120px" class="administrator_heading_tbl">Plan Name</th>
				<th width="190px" class="administrator_heading_tbl">Plan Price</th>
				<th width="107px" class="administrator_heading_tbl">Item Limit</th>
				<th width="87px" class="administrator_heading_tbl">Amount</th>
			</tr>
			<tr>
				<td width="120px" class="chapter_pop administrator_right_tbl"><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['vStorePlanName'];?>
</td>
				<td width="190px" class="chapter_pop administrator_right_tbl">$ <?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['fPrice'];?>
</td>
				<td width="107px" class="chapter_pop administrator_right_tbl"><?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['item_limit'];?>
</td>
				<td width="41px" class="chapter_pop administrator_right_tbl">$ <?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['fPrice'];?>
</td>
			</tr>
			<tr>
				<td valign="top" class="term_condition chapter_pop" rowspan="3" style="padding-left: 20px;" colspan="2"><div class="termcon_div" style="margin-left: 435px;"> <strong></strong><br>
						<br>
						<strong></strong><br>
						 </div></td>
				<td valign="top" colspan="3" class="aubtotal chapter_pop" style="height:48px;"><div style="width:175px;" class="total_text"><strong>Total Amount :</strong> </div>
					<div class="total_price"> $ <?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['fPrice'];?>
</div>
					<div style="width:175px;" class="total_text"><strong>Payment Received :</strong> </div>
					<div class="total_price"> $ <?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['fPrice'];?>
</div>
				</td>
			</tr>
		</tbody></table>
	</div>
	
	<div style="clear:both"></div>
		<p>&nbsp;</p>
	<div align="center">
		<input type="button" value="Back" class="btn" title="Back" onclick="redirectcancel();"/>
		<input type="button" value="Print" class="btn" title="Print" onClick="javascript:popup_invoice();"/>
		<!--<input type="submit" value="Send Email" class="btn" title="Send Email"/>
		<input type="button" value="Print" class="btn" title="Print" onClick="javascript:popup_invoice();"/>-->
	</div>
	</form>
	<div style="clear:both"></div>

</div>

	

<script>
function popup_invoice(){	
	var iPlanTransactionId= '<?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['iPlanTransactionId'];?>
';
	var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
	var url = admin_url+"/index.php?file=pt-printinvoice&iPlanTransactionId="+iPlanTransactionId+"&admin_url="+admin_url;
	var w= 800;
	var h = 650;
	
	pollwindow=window.open(url,'pollwindow','top=0,left=0,status=no,toolbars=no,scrollbars=yes,width='+w+',height='+h+',maximize=no,resizable');
	    pollwindow.focus();
	function pollwin(url,w, h){
	
	}
}
	
window.onload = function(){	
    var url = admin_url+"/index.php?file=pt-checkOrder";    
    //var pars = extra;
    $.post(url,
    function(data) {
		$('#comment_data').html(data);
		$('#errormsgdiv').hide();
    });
};
function checkOrder(iPlanTransactionId){

var extra ='';
if ($('#eNotification').is(':checked')) {
    eNotification.value='Yes';
} else {
    eNotification.value='No';
}

extra+='&iPlanTransactionId='+iPlanTransactionId;
extra+='&eTransactionStatus='+eTransactionStatus.value;
if($('#tComment')){
		if($('#tComment').val() == ''){
			//$('#propertymessageid').html("Please enter comment").addClass('errormsg').fadeTo(900,1);
			$('#msg').html("Please enter comment");
			$('#errormsgdiv').show();
			return false;
		}else{
			 extra+='&tComment='+tComment.value;
		}
	}


extra+='&eNotification='+eNotification.value;
//alert(extra);
    var url = admin_url+"/index.php?file=pt-checkOrder";    
    var pars = extra;
    $.post(url+pars,
    function(data) {
		$('#comment_data').html(data);
		if($('#tComment').val() != ''){
			$('#msg').html("Plan status Upgrade successfully");
			$('#errormsgdiv').show();
		}
		else{
			$('#errormsgdiv').hide();			
		}
		$('#tComment').val('');
    });
}


function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
     var iPlanTransactionId= '<?php echo $_smarty_tpl->getVariable('db_plan')->value[0]['iPlanTransactionId'];?>
';
    var file = 'pt-plan_transaction';
    window.location=admin_url+"/index.php?file=pt-plan_transaction&mode=view&iPlanTransactionId="+iPlanTransactionId;
    return false;
}

function PrintDiv()
{
var sayfa = window.open('','','width=1000,height=1000');
sayfa.document.open("text/html");
sayfa.document.write(document.getElementById('content').innerHTML);
sayfa.document.close();
sayfa.print();
}

function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}
</script>
