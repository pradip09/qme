<script language="JavaScript" src="{$tconfig["front_javascript"]}creditcard.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;"> {include file="member/myaccountleft.tpl"} </div>
<!--right part start here -->
<div class="desboard-right">
	<div class="MyVedioTitle">
		<h1>My Store</h1>
	</div>
	<div class="cl"></div>
	<div class="paddingleftright graybox1">
		<!--heaing end -->
		
		<div class="per_info_container_store">
			<form name="frmpaydetail" id="frmpaydetail" method="post" action="{$site_url}/index.php?file=m-mystore_upgrade_a">
			<input type="hidden" value="{$db_sql[0].fPrice}" name="plan_price">
			<input type="hidden" value="{$db_sql[0].iStorePlanId}" name="plan_id">
			<div class="pay_left_part">
				<div class="order_sta_title">Payment information</div>
				<div id="propertymessageid" class="error_massage" align="center" style="width: 487px; color: red;position: absolute;"></div>
				<div class="pay_type_box">
					<div class="pay_ty_title">&nbsp;</div>
					<span class="colan_pay">&nbsp;</span>
					<div class="pay_img"> <a href="#" onclick="setpayment(1);"><img src="{$tconfig["front_images"]}we-acce-logo1.png" /></a> <a href="#" onclick="setpayment(2);"><img src="{$tconfig["front_images"]}we-acce-logo2.png" /></a> <a href="#" onclick="setpayment(3);"><img src="{$tconfig["front_images"]}we-acce-logo3.png" /></a> <a href="#" onclick="setpayment(4);"><img src="{$tconfig["front_images"]}we-acce-logo4.png" /></a>
						
					</div>
				</div>
				<div class="paym_in_box">
					<label>Card Type</label>
					<span class="colan_pay">:</span>
					<select class="card_type" id="cardId" name="cardId">
						<option value="">Select Card Type</option>
						<option  value="Visa">Visa</option>
						<option  value="MasterCard">Master Card</option>
						<option  value="AmEx">American Express</option>
						<option  value="Discover">Discover</option>
						<!--<option  value="Jcb">Jcb</option>
					<option  value="Dinners club">Dinners club</option>-->
					</select>
				</div>
				<div class="paym_in_box">
					<label>Card Number</label>
					<span class="colan_pay">:</span>
					<!--<input type="text" name="cardno" id="cardno" onblur="return checkcard(event);" onkeypress="return checkmobile(event);"/>-->
					<input type="text" name="cardno" id="cardno" onblur="return checkcard(event);"/>
				</div>
				<div class="paym_in_box">
					<label>Expires</label>
					<span class="colan_pay">:</span>
					<select class="month_se_py" id="selmonth" name="selmonth">
						<option value="">Month</option>
						<option value="01">Jan</option>
						<option value="02">Feb</option>
						<option value="03">Mar</option>
						<option value="04">Apr</option>
						<option value="05">May</option>
						<option value="06">Jun</option>
						<option value="07">Jul</option>
						<option value="08">Aug</option>
						<option value="09">Sep</option>
						<option value="10">Oct</option>
						<option value="11">Nov</option>
						<option value="12">Dec</option>
					</select>
					<select class="year_se_py" id="selyear" name="selyear">
						<option value="">Year</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
					</select>
				</div>
				<div class="paym_in_box">
					<label>Security Code</label>
					<span class="colan_pay">:</span>
					<input type="text" class="sec_payme"   maxlength="3" id="secureno" name="secureno" onkeypress="return checkmobile(event);"/>
					<a href="#securitydiv" id="secureId"><img src="{$tconfig["front_images"]}question-mark.png" class="paym_qusmark" /></a> </div>
				<div style="display:none">
					<div id="securitydiv" class="pay_Popup">
						<div class="pay_popup_title" style="font-size:18px;">CARD SECURITY VALUE</div>
						<div class="pop_paym_box">
						<div class="pay_popup_title_sub">VISA / MASTERCARD / DISCOVER</div>
						
						<img src="{$tconfig["front_images"]}help-csv.png" />
						</div>
						<div class="pop_paym_box">
						<div class="pay_popup_title_sub">AMERICAN EXPRESS</div>
						
						<img src="{$tconfig["front_images"]}help-csv-amex.png" />
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
			</div>
			</form>
			<div class="right_pay_info">
				<div class="order_sta_title">Order SUMMARY</div>
				<div class="order_sta_table">
					<table cellpadding="0" cellspacing="1" width="100%">
						<tbody>
							<tr>
								<th>Plan Name</th>
								<th width="50">Price</th>
								<th width="80">Item limit</th>
							</tr>
						</tbody>
						<tbody class="order_strept">
							<tr>
								<td>{$db_sql[0].vStorePlanName}</td>
								<td width=63>$ {$db_sql[0].fPrice}</td>
								<td>{$db_sql[0].item_limit}</td>
							</tr>
						</tbody>
					</table>
					
				</div>
			</div>
			
			<div class="cl"></div>
		</div>
			
		<div class="pay_info_btn">
			<a onclick="return submitform();"><input type="image" src="{$tconfig["front_images"]}purchase.png" class="btnpay_info" /></a>
		</div>
	</div>
		
</div>
<!--right part start end-->
<div class="cl"></div>

{literal}
<script>

$(document).ready(function(){
$('#secureId').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',	
	'scrolling' : 'no'	
});
});

function setpayment(a){
	//alert(a);
	document.getElementById("cardId").selectedIndex = a;
	
	
}
function  checkcard()
	{ 
	myCardNo = $('#cardno').val();
	myCardType = $('#cardId').val();
	if (!checkCreditCard (myCardNo,myCardType)) {
	$('#cardno').focus();
	return false;
        }
	}
	
	
	
	
</script>
<script type="text/javascript">
    function submitform(){
	
	myCardNo = $('#cardno').val();
	myCardType = $('#cardId').val();
	var valid=checkCreditCard (myCardNo,myCardType);
	
	if($('#cardId').val() ==''){
		
		$('#propertymessageid').html("Please select card type").addClass('errormsg').fadeTo(900,1);
		$('#cardId').focus();
		return false;
	}
	if($('#cardno').val() == ''){
		$('#propertymessageid').html("Please enter card no.").addClass('errormsg').fadeTo(900,1);
		$('#cardno').focus();
		return false;
	}
	if(!valid)
	{
		$('#propertymessageid').html("Credit card number is invalid").addClass('errormsg').fadeTo(900,1);
		$('#cardno').focus();
		return false;
	}
	if($('#selmonth').val() == ''){
		$('#propertymessageid').html("Please select month.").addClass('errormsg').fadeTo(900,1);
		$('#selmonth').focus();
		return false;
	}
	if($('#selyear').val() == ''){
		$('#propertymessageid').html("Please select year.").addClass('errormsg').fadeTo(900,1);
		$('#selyear').focus();
		return false;
	}
	if($('#secureno').val() == ''){
		$('#propertymessageid').html("Please enter security no.").addClass('errormsg').fadeTo(900,1);
		$('#secureno').focus();
		return false;
	}
	
	//frmpaydetail.submit();if($('#total').val() !='' && $('#total').val() >'0' ){
     		frmpaydetail.submit();
		return false;
		}
	
	
function checkmobile(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 )){
	            return true;
		}else{
			return false;
		}
	}
}
</script>
{/literal}