<script src="{$admin_url}/public_html/javascripts/jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=pt-plan_transaction&mode=view">Plan Trasaction</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Plan Trasaction{else}Edit Plan Trasaction{/if}</li>
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
					<td><label>Name</label><span class="dou_colan">:</span>{$db_plan[0].vName}</td>
				</tr>
				<tr>
					<td><label>Email</label><span class="dou_colan">:</span><span id="vEmail">{$db_plan[0].vEmail}</span></td>
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
							<option value="Success" {if $db_plan[0].eTransactionStatus eq Success}selected{/if}>Success</option>
							<option value="Cancelled" {if $db_plan[0].eTransactionStatus eq Cancelled}selected{/if}>Cancelled</option>
							<option value="InProcess" {if $db_plan[0].eTransactionStatus eq InProcess}selected{/if}>InProcess</option>
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
					<td><div class="order_send_btn"><input type="button" class="btn" value="Send" onclick="return checkOrder({$db_plan[0].iPlanTransactionId});"/></div></td>
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
					<td><label>Card Type</label><span class="dou_colan">:</span>{$db_plan[0].vPaymentType}</td>
				</tr>
				<tr>
					<td><label>Card Number</label><span class="dou_colan">:</span>{$db_plan[0].vCardNo}</td>
				</tr>
				<tr>
					<td><label>CVV Number</label><span class="dou_colan">:</span>{$db_plan[0].vCCV}</td>
				</tr>
				<tr>
					<td><label>Expaire Date</label><span class="dou_colan">:</span>{$db_plan[0].dExpiaryDate}</td>
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
					<td><label>Payment Date</label><span class="dou_colan">:</span><span id="TransactionDate">{$db_plan[0].dTransactionDate}</span></td>
				</tr>
				<tr>
					<td><label>Payment Status</label><span class="dou_colan">:</span><span id="TransactionStatus">{$db_plan[0].eTransactionStatus}</span></td>
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
				<td width="120px" class="chapter_pop administrator_right_tbl">{$db_plan[0].vStorePlanName}</td>
				<td width="190px" class="chapter_pop administrator_right_tbl">$ {$db_plan[0].fPrice}</td>
				<td width="107px" class="chapter_pop administrator_right_tbl">{$db_plan[0].item_limit}</td>
				<td width="41px" class="chapter_pop administrator_right_tbl">$ {$db_plan[0].fPrice}</td>
			</tr>
			<tr>
				<td valign="top" class="term_condition chapter_pop" rowspan="3" style="padding-left: 20px;" colspan="2"><div class="termcon_div" style="margin-left: 435px;"> <strong></strong><br>
						<br>
						<strong></strong><br>
						 </div></td>
				<td valign="top" colspan="3" class="aubtotal chapter_pop" style="height:48px;"><div style="width:175px;" class="total_text"><strong>Total Amount :</strong> </div>
					<div class="total_price"> $ {$db_plan[0].fPrice}</div>
					<div style="width:175px;" class="total_text"><strong>Payment Received :</strong> </div>
					<div class="total_price"> $ {$db_plan[0].fPrice}</div>
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

	
{literal}
<script>
function popup_invoice(){	
	var iPlanTransactionId= '{/literal}{$db_plan[0].iPlanTransactionId}{literal}';
	var admin_url = '{/literal}{$admin_url}{literal}';
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
    var admin_url = '{/literal}{$admin_url}{literal}';
     var iPlanTransactionId= '{/literal}{$db_plan[0].iPlanTransactionId}{literal}';
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
{/literal}