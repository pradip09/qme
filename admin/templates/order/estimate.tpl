<table border="0">
<tr>
<td style="float:left;">
	<div class="contentcontainer" style="width:550px;">
	<div class="headings">
	{if $mode eq add}
	<h2 class="left">Add Estimate</h2>
	{else}
	<h2 class="left">Customer</h2>	
	{/if}
	</div>
	<div class="contentbox" id="tabs-1">
		<form id="frmadd" name="frmadd" action="index.php?file=o-estimate_a" method="post">
        <input type="hidden" name="iEstimateId" id="iEstimateId" value="{$iEstimateId}" />
        <input type="hidden" name="action" id="action" value="{$mode}" />
        <table>
			<tr>
				<td><label for="textfield"><strong>Name :</strong></label></td>
				<td><label for="textfield">{$db_est[0].Name}</label></td>
				
			</tr>
			</tr>
				<td><label for="textfield"><strong>Email :</strong></label></td>
				<td><label for="textfield">{$db_est[0].vEmail}</label></td>
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
        <input type="hidden" name="iEstimateId" id="iEstimateId" value="{$iEstimateId}" />
        <input type="hidden" name="action" id="action" value="{$mode}" />
        <table>
			<tr>
			
				<td><label for="textfield"><strong>Status :</strong></label></td>
				<td><label for="textfield">{$db_est[0].eStatus}</label></td>
			</tr>
			</tr>
				<td><label for="textfield"><strong>Request Date :</strong></label></td>
				<td><label for="textfield">{$db_est[0].dAddedDate}</label></td>
			</tr>
			{if {$db_est[0].fDiscount} neq '0.00'}
			</tr>
				<td><label for="textfield"><strong>Discount:</strong></label></td>
				<td><label for="textfield">{$db_est[0].fDiscount}</label></td>
			</tr>
			{else}
			{/if}
			<tr>
				<td><label for="textfield"><strong>Grand Total :</strong></label></td>
				<td><label for="textfield">{$db_est[0].fGrandTotal-$db_est[0].fDiscount}</label></td>

			</tr>
			
			</table></form>
        </div>
		
</div></td></tr></table>

<div class="contentbox" id="tabs-1" style="width:1080px;border-top-left-radius: 10px; border-top-right-radius: 10px;margin-left:9px;">
		<form id="frmadd" name="frmadd" action="index.php?file=o-estimate_a" method="post" onchange="calculate()">
        <input type="hidden" name="iEstimateId" id="iEstimateId" value="{$iEstimateId}" />
        <input type="hidden" name="action" id="action" value="{$mode}" />
        
       <table>
		<th style="padding-right:150px;">Product Name</th><th style="padding-right:150px;">Product Code</th><th style="padding-right:150px;">Quntity</th><th style="padding-right:100px;">Price</th><th style="padding-right:50px;">Total Price</th>
		 {if $db_cat|@count gt 0}
		{section name=i loop=$db_cat}
            
        {if $smarty.section.i.index % 2}
            {assign var="class" value="alt"}
        {else}
            {assign var="class" value=""}
        {/if}
        <input type="hidden" name="IdArr[]" id="IdArr[]" value="{$db_cat[i].iEstimateDetailId}">
        <tr class="{$class}"><td>{$db_cat[i].vTitle}</td>
			<td>{$db_cat[i].vProductCode}</td>
			<td>{$db_cat[i].iQty}</td>
			<td><input type="hidden" id="iQty" name="iQty[]"  value="{$db_cat[i].iQty}"/>
				<input type="text" id="fPrice" style="width:180px;" name="fPrice[]"  value="{$db_cat[i].fPrice}" title="Price" onkeypress="return checkprice(event);"/></td>
			<td id="fTotalPrice" >{$db_cat[i].fPrice*$db_cat[i].iQty}</td>
		</tr>
		
        {/section}
        {else}
        <tr>
			<td height="70px;" colspan="8" style="text-align:center; color:#C44C22; font-size:14px; font-weight:bold;">No Record Found.</td>
		</tr>
        {/if}
		
       </table><span style="margin-left:920px;">------------------</span><br/>
       <span style="font-size:14px;margin-left:800px;"><strong>Grand Total</strong></span><span style="margin-left:45px;">{$db_est[0].fGrandTotal}</span><br/><br />
		<input type="submit" style="margin-left:910px;" value="Modify" class="btn" title="Modify" onclick="modify(document.frmadd)"/>
		<input type="button" value="Back" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
</div>
<div>
		<input type="submit" style="margin-left:910px;" value="Send Quotation" class="btn" title="Send Quotation" onclick="sendquotation({$iEstimateId});"/>
</div>


{literal}
<script>
function calculate(){
	document.frmlist.fTotalPrice = $db_cat[i].fPrice*$db_cat[i].iQty;
	document.frm.submit();
}	
function modify(frm){
	document.frm.submit();
	
}
function redirectcancel(){

    window.location="{/literal}{$admin_url}{literal}/index.php?file=o-estimate&mode=view";
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
	alert(url+pars);return false;
	$.post(url+pars,
            function(data) {
		alert(data);
	});
}
</script>
{/literal}

