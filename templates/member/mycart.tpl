<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<div id="services_boxinnerbg" class="desboard_body">
	<div class="MyVedioTitle">
		<h1>My Cart</h1>
	</div>
	<div id="cartmsg" style="padding-top:60px;"></div>
	<div class="cl"></div>
	{if  $cart|@count gt 0}
	<div class="store_top_link">
		<div class="store_reap_link"><a href="{$site_url}/mycart" class="active"><span class="static_ak">1</span>My Cart </a></div>
		<div class="store_reap_link"><a href="{$site_url}/mypayment"><span class="static_ak">2</span>Payment &amp; Review </a></div>
		<div class="store_reap_link"><a href="#"><span class="static_ak">3</span>Conformation </a></div>
		<div class="cl"></div>
	</div>
	{/if}
	<div id="displaycart"></div>
	{if  $cart|@count gt 0}
	<div class="weacc_box">
		<div class="we_accept_title">We Accept</div>
		<div><img src="{$tconfig["front_images"]}we-acce-logo.png" /></div>
	</div>
	{/if}
	<div class="cl"></div>
</div>
</div>


{literal}
<script type="text/javascript">


displaycartproduct();
function emptycart()
{
	var html='';
		html+='<div class="popup_box" style="height:60px;">';			  	
		html+='<div  style="text-align:center;line-height:24px;color:#5E5E5E" class="errormsg">Are you sure for empty cart?</div>';
		html+='<div class="cancelar_btn" style="margin-left:247px;margin-top:10px;" ><a href="javascript:void(0);" onclick="$.fancybox.close();"><img src="http://192.168.1.12/qme/public/images/no_btn.png"  alt="" /></a></div>';
		html+='<div class="cancelar_btn" style="margin-left:191px;margin-top:-30px;"><a href="javascript:void(0);" onclick="DeleteAll();"><img src="http://192.168.1.12/qme/public/images/yes_btn.png"  alt="" /></a></div>';
		html+='<div>';
		$(document).ready(function () {				
			$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		});
		return false;
}

function DeleteAll()
{
	
		var url = site_url+"/index.php?file=a-ajemptycart";
		$.post(url,
			function(data) {
			//alert(data);return false;
			window.location= site_url+'/'+'mycart';
		    });
	    
}

function updatecart(){
	
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
		displaycartproduct();
	});	
}

</script>
{/literal}