<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<link rel="stylesheet" type="text/css" href="{$tconfig["front_javascript"]}productgallery/lib/jquery.ad-gallery.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}productgallery/lib/jquery.ad-gallery.js"></script>
<script type="text/javascript">
$(function() {
  var galleries = $('.ad-gallery').adGallery();
 
  galleries[0].settings.effect = 'resize';
  $('#switch-effect').change(
    function() {
      galleries[0].settings.effect = $(this).val();
      return false;
    }
  );
  $('#toggle-slideshow').click(
    function() {
      galleries[0].slideshow.toggle();
      return false;
    }
  );
  $('#toggle-description').click(
    function() {
      if(!galleries[0].settings.description_wrapper) {
	galleries[0].settings.description_wrapper = $('#descriptions');
      } else {
	galleries[0].settings.description_wrapper = false;
      }
      return false;
    }
  );
});
</script>


<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
				
				
					{include file="member/myaccountleft.tpl"}
				</div>
				
				<div class="desboard-right" style="padding-bottom:30px;">
					<div class="MyVedioTitle">
						<h1>Product Details</h1>
					</div>
                    
        <div class="bredcums" style="padding-top:60px;">
			<a href="{$site_url}/mystore">My Store</a> > <a href="{$site_url}/myproducts/4"> Real Estate </a> > {$db_product[0].vPropertyType} in {$db_product[0].vCity}
		</div>
        <div id="propertymessageid" class="error_massage" align="center"></div>
					<div class="my_automotivedetailpage">
					  
						<div class="auto_photo_box">
						  
							<div class="autom_price">Asking Price : ${$db_product[0].fAskingPrice}</div>
							<div class="autom_address">{$db_product[0].vPropertyType} in {$db_product[0].vCity}</div>
							
							<div class="myreal_estate_photo">
							<!--
								<div class="automo_img">
									<a href="#original" id="hrefId"><img  src="{$tconfig["tsite_upload_images_store"]}/4/{$db_product[0].iProductId}/1_{$db_product[0].vImage}" width="340" height="280" /></a>
								</div>
							-->	
								<!-- image gallery start -->
								
								<div id="gallery" class="ad-gallery peroperty_img" style="width:430px; height:358px;">
								      <div class="ad-image-wrapper" style="height:280px; border:1px solid #676767;">
								      </div>
								      <div class="ad-nav">
									<div class="ad-thumbs">
									  <ul class="ad-thumb-list">
										<li>
										      <a href="{$tconfig["tsite_upload_images_store"]}/4/{$db_product[0].iProductId}/1_{$db_product[0].vImage}">
											<img src="{$tconfig["tsite_upload_images_store"]}/4/{$db_product[0].iProductId}/1_{$db_product[0].vImage}" width="90" height="60" class="image{$smarty.section.i.index}">
										      </a>
										</li>
										{if  $db_gallery|@count gt 0}
										{section name=i loop=$db_gallery}
										    <li>
										      <a href="{$tconfig["tsite_upload_images_store"]}/4/{$db_gallery[i].iProductId}/2_{$db_gallery[i].vGalImage}">
											<img src="{$tconfig["tsite_upload_images_store"]}/4/{$db_gallery[i].iProductId}/1_{$db_gallery[i].vGalImage}" width="90" height="60" class="image{$smarty.section.i.index}">
										      </a>
										    </li>
										{/section}
										{/if}
									  </ul>
									</div>
								      
								      </div>
									<div style="clear:both;"></div>								      
								    </div>
								
								<!-- image gallery end -->
								
								
								
								<div style="display:none">
									<div id="original">
									<img  src="{$tconfig["tsite_upload_images_store"]}/4/{$db_product[0].iProductId}/{$db_product[0].vImage}" />
									</div>
								</div>
								<div class="property_basicdetail">
									<div class="automotive_heading">Property Information:</div>
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td style="vertical-align:top;">Location: </td>
											<td>{$db_product[0].vStreetAddress}, {$db_product[0].vCity}</td>
										</tr>
										<tr>
											<td>Type: </td>
											<td>{$db_product[0].vPropertyType}</td>
										</tr>
										<tr>
											<td>Bedrooms: </td>
											<td>{$db_product[0].iBedrooms}</td>
										</tr>
										<tr>
											<td>Baths: </td>
											<td>{$db_product[0].iBaths}</td>
										</tr>
										<tr>
											<td>Sq.ft.: </td>
											<td>{$db_product[0].fSqft}</td>
										</tr>
										<tr>
											<td>Lot Size: </td>
											<td>{$db_product[0].fLotSize}</td>
										</tr>		
									</table>
								</div>
								
								<div class="cl"></div>
							</div>
								<div class="cl"></div>
							<div class="vehicle_histry_detail">
								<div class="vehicle_histry_title">Account Information</div>
								<table class="vehicle_detail_table" width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td class="vehicle_type_blank">Name: </td>
										<td class="vehicle_dynamic_blank">{$db_product[0].vFirstName} {$db_product[0].vLastName}</td>
									</tr>
									<tr>
										<td class="vehicle_type">Phone: </td>
										<td class="vehicle_type">{$db_product[0].vPhone}</td>
									</tr>
									<tr>
										<td class="vehicle_type_blank">Real Estate Firm: </td>
										<td class="vehicle_dynamic_blank">{$db_product[0].vRealEstateFirm}</td>
									</tr>
									<tr>
										<td class="vehicle_type">Agent Name: </td>
										<td class="vehicle_type">{$db_product[0].vAgentName}</td>
									</tr>
									<tr>
										<td class="vehicle_type_blank">Agent Email: </td>
										<td class="vehicle_dynamic_blank">{$db_product[0].vAgentEmail}</td>
									</tr>
									<tr>
										<td class="vehicle_type">Agent Main Contact: </td>
										<td class="vehicle_type">{$db_product[0].vAgentMainContact}</td>
									</tr>
									<tr>
										<td class="vehicle_type_blank">Real Estate Office Contact: </td>
										<td class="vehicle_dynamic_blank">{$db_product[0].vRealEstateOfficeContact}</td>
									</tr>			
								</table>
							</div>
							
							<div class="email_histry_detail">
								<div class="vehicle_histry_title">Email us about this property</div>
								<table class="vehicle_histry_email" width="90%">
									
									<tr>
										<td colspan="3"> Reference: MLSV801273</td>
									</tr>
									<tr>
										<td id="iProductId" name="iProductId" ></td>
									</tr>
									<tr>
										<td>Name :</td>
										 <td><input name="vName" id="vName"  type="text" class="inpuname1_first" /></td>
									</tr>
									<tr>
										<td>Email  : </td>
										<td><input name="vMail" id="vMail"  type="text" class="inpuname1_first" /></td>
									</tr>
									<tr>
										<td>Telephone : </td>
										<td><input name="vPhoneNo" id="vPhoneNo"  type="text" class="inpuname1_first" onkeypress="return checknum(event);" /></td>
									</tr>
									<tr>
										<td>Message :</td>
										<td colspan="3"><textarea name="tMessage" id="tMessage" cols="" rows="" class="message_textarea"></textarea></td>
									</tr>
									<tr>
										<td colspan="2" align="center"><a href="#"><img src="{$tconfig["front_images"]}btn_submit.png" alt="" onclick="return emailproperty({$iProductId});" /></a></td>
									</tr>
								</table>
							</div>
							
						</div>
						
					</div>
	</div>
	<div class="cl"></div>
</div>
<div class="cl"></div>
</div>
</div>
			
			
{literal}
<script type="text/javascript">
getId('{/literal}{$db_allrealestate[0].iProductId}{literal}');
function getId(id){
	//alert('hhgjhg');
	if($('#mode').val() == 'edit'){
		var ProductId = id;
		emailtoproperty(ProductId);
	}
	
}

$(document).ready(function(){
$('#hrefId').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});
function checknum(events)
{

	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if( ((unicodes>45 && unicodes<58) || unicodes == 39 || unicodes == 37  || unicodes == 9 || unicodes == 110 || unicodes == 45)){
	            return true;
		}else{
			return false;
		}
	}
}
function emailproperty(iProductId){
     
 	var extra ='';
	if($('#vName')){
	   
		if($('#vName').val() ==''){
			if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your name").addClass('errormsg').fadeTo(900,1);
				return false;
			}
		}else{
			extra+='&vName='+$('#vName').val();
		}
     }
 if($('#vMail')){
	   
		if($('#vMail').val() ==''){
			if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your Email");
				return false;
			}
		}else{
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			 var valid = emailRegex.test($('#vMail').val());
			  if (!valid) {
				if($('#propertymessageid')){
					$('#propertymessageid').html("Invalid e-mail address");
					return false;
				}else{
					return true;
				}
			}
			extra+='&vMail='+$('#vMail').val();
			
		}
	}
  if($('#vPhoneNo')){
	  
		if($('#vPhoneNo').val() ==''){
			if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your Phone No");
				return false;
			}
		}else{
			extra+='&vPhoneNo='+$('#vPhoneNo').val();
		}
	}
    if($('#tMessage')){
	   
		if($('#tMessage').val() ==''){
			if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your Message");
				return false;
			}
		}else{
			extra+='&tMessage='+$('#tMessage').val();
		}     
	}
   
    if($('#vMail')){
	   
		if($('#vMail').val() ==''){
			if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your Email");
				return false;
			}
		}else{
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			 var valid = emailRegex.test($('#vMail').val());
			  if (!valid) {
				if($('#propertymessageid')){
					$('#propertymessageid').html("Invalid e-mail address");
					return false;
				}else{
					return true;
                    $('#propertymessageid').html("Please Enter Your Phone No");
				}
			}
			extra+='&vMail='+$('#vMail').val();
			
		}
	}
	extra+='&iProductId='+iProductId; 
    
    var url = site_url+"/index.php?file=a-emailproperty";
	var pars = extra;
 
    //alert(iProductId);exit;
    $.post(url+pars,
    function(data) {
        
       if($('#propertymessageid')){
		   $('#propertymessageid').html(data);
		   $('#vName').val('');
		   $('#vMail').val('');
		   $('#vPhoneNo').val('');
		   $('#tMessage').val('');
		} 
    });
        
    }

</script>

{/literal}

