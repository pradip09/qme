<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body"> {include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right">
	<div class="MyVedioTitle">
		<h1>Buy More Points</h1>
	</div>
	<div class="cl"></div>
	<div class="bredcums" style="padding-top:14px;"> <a href="{$site_url}/buypoints">My Points</a> > Buy More Points </div>
	<div class="buy_point_cont">
		<div class="your_totalbox">
			<div style="float:left;margin-left:10px;">My Total Points :<span>{$total_points}</span></div>
			<div style="float:left;margin-left:37px;">Total Earn points :<span>{$total_earn}</span></div>
			<div style="margin-left:409px;">Total Purchase points :<span>{$total_purchase}</span></div>
		</div>
		<div class="buypoint_container">
			<!--<form id="frmUploadPhoto" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=m-buypoints_payment">-->
			<form id="frmUploadPhoto" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/buypoints_payment">
			<input type="hidden" value="10" name="price" id="price"/>
			<input type="hidden" value="500" name="points" id="points"/>
			<div class="premium_rept_box">
				<div class="premium_pricedolor"  >$10</div>
				<div class="plan_text premium_text">
					<ul>
						<li  >500 Points</li>
					</ul>
				</div>
			<input type="submit" name="buypoints" id="buypoints" value="Buy" class="buypoints_btn"/>
			<!--<div class="buy_btn"><a href="#" onclick="buyone();"><img src="{$tconfig["front_images"]}buy-btn.png" alt="" title="" /></a></div>-->
			</div>
			</form>
			<form id="frmUploadPhoto" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/buypoints_payment">
			<input type="hidden" value="20" name="price" id="price"/>
			<input type="hidden" value="1000" name="points" id="points"/>
			<div class="premium_rept_box">
				<div class="premium_pricedolor" >$20</div>
				<div class="plan_text premium_text">
					<ul>
						<li >1,000 Points</li>
					</ul>
				</div>
				<input type="submit" name="buypoints" id="buypoints" value="Buy" class="buypoints_btn"/>
				<!--<div class="buy_btn"><a href="#" onclick="buytwo();"><img src="{$tconfig["front_images"]}buy-btn.png" alt="" title="" /></a></div>-->
			</div>
			</form>
			<form id="frmUploadPhoto" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/buypoints_payment">
				
			<input type="hidden" value="50" name="price" id="price"/>
			<input type="hidden" value="2500" name="points" id="points"/>
			<div class="premium_rept_box">
				<div class="premium_pricedolor"  >$50</div>
				<div class="plan_text premium_text">
					<ul>
						<li >2,500 Points</li>
					</ul>
				</div>
				<input type="submit" name="buypoints" id="buypoints" value="Buy" class="buypoints_btn"/>
				<!--<div class="buy_btn"><a href="#" onclick="buythree();"><img src="{$tconfig["front_images"]}buy-btn.png" alt="" title="" /></a></div>-->
			</div>
			</form>
			<form id="frmUploadPhoto" name="frmUploadPhoto" method="post" enctype="multipart/form-data" action="{$site_url}/buypoints_payment">
			<input type="hidden" value="100" name="price" id="price"/>
			<input type="hidden" value="5000" name="points" id="points"/>
			<div class="premium_rept_box">
				<div class="premium_pricedolor">$100</div>
				<div class="plan_text premium_text">
					<ul>
						<li>5,000 Points</li>
					</ul>
				</div>
				<input type="submit" name="buypoints" id="buypoints" value="Buy" class="buypoints_btn"/>
				<!--<div class="buy_btn"><a href="#" onclick="buyfour();"><img src="{$tconfig["front_images"]}buy-btn.png" alt="" title="" /></a></div>-->
			</div>
			</form>
			
			<form id="frmUpload" name="frmUpload" method="post" enctype="multipart/form-data"  action="{$site_url}/buypoints_payment">
			<div id="divContactmsgid" class="error_massage" style="margin-top: 387px;margin-left: -42px;"></div>
			<input type="hidden"  name="price11" id="price11"/>
			<!--<input type="hidden"  name="points11" id="points11"/>-->
			<div class="premium_purchase_points">
				
				<input type="text"  class="points" value="Enter number of points you want to purchase"  readonly="readonly" />
				 <div class="top_spacing_input">
					<input type="text" placeholder="Enter Points" class="input_prem" name="points11" id="points11" onkeyup="checkmobile(event);calculate_price(this.value);minvalue();" onchange= "maxvalue();"/>
					<input type="text" placeholder="Points Cost" class="input_prem" readonly="readonly" id="my_cal_price" />
					<input type="submit" name="buypoints" id="buypoints" value="Buy" onclick="return buyfive();" class="buypoints_btn_large"/>
					<!--<div class="buy_btn"><a href="#" onclick="buyfive();"><img src="{$tconfig["front_images"]}buy-btn.png" alt="" title="" /></a></div>-->
				</div>
						 
			</div>
			</form>
			<div class="cl"></div>
			
		</div>
	</div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
function buyfive(){

if($('#points11')){
	if($('#points11').val() ==''){
		$('#divContactmsgid').html("Please enter no of point").addClass('errormsg').fadeTo(900,1);
		return false;
	} else if($('#points11').val() < 500)
	{        
	        $('#divContactmsgid').html("Minimum points purchase is 500").addClass('errormsg').fadeTo(900,1);
		return false;	      	
	}else {
	   return true;	
	}
}
	
$("#frmUpload").ajaxForm({
		success: finish
		}).submit();	
}


$(document).ready(function(){
$('.popuppoints').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});

function calculate_price(price)
{
	
	$('#points11').val(price);
	//$('#my_points').val(price);
	if(price != '')
	{
	//$('#price11').val(price/100);	
	$('#my_cal_price').val('$'+price/50);
	$('#price11').val(price/50);	
	}else{
		$('#price11').val(price);
		$('#my_cal_price').val(price);	
	}
	
}

function checkmobile(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	if (unicodes!=8)
	{ 
	        if( ((unicodes>47 && unicodes<58))){
	            return true;
		}else{
			return false;
		}
	}
}
function minvalue()
{	
if($('#points11')){
	if($('#points11').val() <= 500){		
		$('#divContactmsgid').html("Minimum points purchase is 500").addClass('errormsg').fadeTo(900,1);
		
		return false;
	} else{		
	        $('#divContactmsgid').html("").removeClass('errormsg').fadeTo(900,1);
		return true;	
	}
}	
	
}
function maxvalue()
{
	//alert('Hii');
if($('#points11')){
	if($('#points11').val() < 500){				
		$('#points11').val(500);
		//alert($('#price11').val());
		$('#my_cal_price').val('$'+10);
		$('#price11').val(10);
		return false;
	}	
	
}
}

</script>
{/literal} 