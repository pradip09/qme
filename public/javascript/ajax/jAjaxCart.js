function getAjaxCart(mode,productId,categoryid,fPrice){
	
	var extra = '';
	
	if(productId !=''){
		extra+='&productId='+productId;
	}
	if(mode !=''){
		extra+='&mode='+mode;
	}
	if(categoryid !=''){
		extra+='&categoryid='+categoryid;
	}
	if(fPrice !=''){
		extra+='&fPrice='+fPrice;
	}
	
	
	
	var url = site_url+"/index.php?file=a-ajaxshoppingcart";
	var pars = extra; 

	//alert(url+pars);	 
	$.post(url+pars,
            function(data) {
		//alert(data);
		var strArr =data.split("|"); 
        if(strArr[0] == 1){
		//alert(strArr);
			var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Product added in your cart Successfully.</div>';
			html+='<div>';
			//alert(html);
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			});
            if($('#totcartid')){
                $('#totcartid').html('MYCART('+strArr[1]+')');
            }
			
		}else if(strArr[0] == 'success'){
			var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Product deleted successfully.</div>';
			html+='<div>';
			//alert(html);
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			});
            if($('#totcartid')){
		$('#totcartid').html('MYCART('+strArr[1]+')');
		displaycartproduct();
		displaycartpayment();
            }
		}else{
			var html='';
			html+='<div  class="signing" style="height:100px;">';
			html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Product exist.</div>';
			html+='<div>';
			//alert(html);
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			});
            if($('#totcartid')){
                $('#totcartid').html('MYCART('+strArr[1]+')');
            }
		}
		
	});
}



function IsNumeric(sText){
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;
	for (i = 0; i < sText.length && IsNumber == true; i++) { 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) {
			IsNumber = false;
		}
	}
	return IsNumber;
}

function displayslider(){
	var extra ='';
	var url = site_url+"/index.php?file=a-ajbootomslider";
	var pars = extra;
	//alert(url+pars)
	$.post(url+pars,
            function(data) {
		if($('#divslideid')){
			$('#divslideid').html(data);
			//setTimeout("clock()",1000);
			
			if($('#sliderlist')){
				$('#sliderlist').bxSlider({
					infiniteLoop: false,
					hideControlOnEnd: false,
					displaySlideQty: 6,
					moveSlideQty: 6
				});	
			}	
				
		}
	});
	
}
function clock(){
	if($('#sliderlist')){
		$('#sliderlist').bxSlider({
			infiniteLoop: false,
			hideControlOnEnd: false,
			displaySlideQty: 6,
			moveSlideQty: 6
		});	
	}	
}


function displaycartproduct(){
	var extra ='';
	var url = site_url+"/index.php?file=a-ajcartproducttodisplay";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#displaycart')){
			$('#displaycart').html(data);
		}
		
	});
}
function displaycartpayment(){
	var extra ='';
	var url = site_url+"/index.php?file=a-ajcartpaymentdisplay";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#displaypatment')){
			$('#displaypatment').html(data);
		}
		
	});
}
