<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/default.css" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}creditcard.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery.nivo.slider.js"></script>
<div id="services_boxinnerbg" class="desboard_body">
	<div class="MyVedioTitle">
		<h1>Payment &amp; Review</h1>
	</div>
	<div id="cartmsg" style="padding-top:60px;"></div>
	<div class="cl"></div>
	<div class="store_top_link">
		<div class="store_reap_link"><a href="{$site_url}/mycart"><span class="static_ak">1</span>My Cart </a></div>
		<div class="store_reap_link"><a href="{$site_url}/mypayment" class="active"><span class="static_ak">2</span>Payment &amp; Review </a></div>
		<div class="store_reap_link"><a href="#"><span class="static_ak">3</span>Conformation </a></div>
		<div class="cl"></div>
	</div>
	
	<form name="frmpaydetail" id="frmpaydetail" method="post" action="{$site_url}/index.php?file=m-mycartpayment">
	<div class="pay_info_container">
		<div class="cen_part_pyinfo">
		<div id="displaypatment"></div>
		
		<div class="pay_left_part">
			<div class="order_sta_title">Payment information</div>
			<div id="propertymessageid" class="error_massage" align="center" style="width: 487px; color: red;position: absolute;"></div>
			<div class="pay_type_box">
				<div class="pay_ty_title">&nbsp;</div>
				<span class="colan_pay">&nbsp;</span>
				<div class="pay_img">
					<a href="#" onclick="setpayment(1);"><img src="{$tconfig["front_images"]}we-acce-logo1.png" /></a>
					<a href="#" onclick="setpayment(2);"><img src="{$tconfig["front_images"]}we-acce-logo2.png" /></a>
					<a href="#" onclick="setpayment(3);"><img src="{$tconfig["front_images"]}we-acce-logo3.png" /></a>
					<a href="#" onclick="setpayment(4);"><img src="{$tconfig["front_images"]}we-acce-logo4.png" /></a>
					<!--<a href="#" onclick="setpayment(5);"><img src="{$tconfig["front_images"]}we-acce-logo5.png" /></a>
					<a href="#" onclick="setpayment(6);"><img src="{$tconfig["front_images"]}we-acce-logo6.png" /></a>-->
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
				<input type="text" name="cardno" id="cardno" onblur="return checkcard(event);" onkeypress="return checkmobile(event);"/>
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
				<input type="text" class="sec_payme"   maxlength="5" id="secureno" name="secureno" onkeypress="return checkmobile(event);"/>
				<a href="#securitydiv2" id="secureId"><img src="{$tconfig["front_images"]}question-mark.png" class="paym_qusmark" /></a>
			</div>
			<div style="display:none">
					<div id="securitydiv2" class="pay_Popup">
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
		<div class="cl"></div>
		</div>
		<div class="pay_info_btn">
			<a  onclick="return submitform();"><input type="image" src="{$tconfig["front_images"]}place-btn.png" class="btnpay_info" /></a>
		</div>
	</div>
	</form>
	<div class="cl"></div>
</div>


{literal}
<script>
displaycartpayment();

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



function updatecart(){
	//alert("hi");
	var extra = '';
	var itemstr = '';
	$('.productqty1').each(function () {
		itemstr = itemstr+$(this).attr("value")+ ",";
        });
	itemstr = itemstr.substring(0, itemstr.length - 1);
	extra+='&itemstr='+itemstr;
	
	var url = site_url+"/index.php?file=a-ajupdateproductcart";
	var pars = extra;
	
	$.post(url+pars,
		function(data) {
		$('#cartmsg').html('<div class="successMessage">Quantity changed successfully.</div>');
		displaycartpayment();
	});	
}



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