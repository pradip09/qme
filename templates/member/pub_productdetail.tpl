<link rel="stylesheet" type="text/css" href="{$tconfig["front_javascript"]}productgallery/lib/jquery.ad-gallery.css">
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/default.css" type="text/css" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/nivo-slider.css" type="text/css" media="screen" />

<script type="text/javascript" src="{$tconfig["front_javascript"]}productgallery/lib/jquery.ad-gallery.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductajax.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery.nivo.slider.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jAjaxCart.js"></script>

{if $iCatId eq 1}
<div id="services_boxinnerbg" class="desboard_body">
<div class="myphoto_album_container">
	<div class="top_album_title">
		<div class="top_album_img">
			{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
				<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}
		</div>
		<div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		<div class="cl"></div>
	</div>
	
	<div class="myphoto_album_img">
		<div class="myphoto_album_title">
			<div style="width:345px;float:right;padding-top:10px;" id="linkstore">
				{if $arrvideo[0].vFile neq ''}<a href="#" onclick="showvideofile()" style="color:#E26700;text-align:right;">Video</a>{/if}
			</div>
			<a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s Store</a>
		</div>
		 <div id="propertyid" style="margin-left:91px;color:red;"></div>
		<div class="store_pro_detail">
			<div class="mystore_detail_container">
			
				<div class="mystore_detail_leftimg">
					<a href="#original" id="hrefId"><img  src="{$tconfig["tsite_upload_images_store"]}/{$db_product[0].iStoreCategoryId}/{$db_product[0].iProductId}/1_{$db_product[0].vProductImage}" width="325" height="300" /></a> 
				</div>
				
				<div class="cl"></div><br>
				
				{if $url !== $memurl}
					<div class="add_to_card" style="margin-left:74px; float:left;">
					<input type="image" src="{$tconfig["front_images"]}add-to-card.png" onClick="getAjaxCart('Add','{$db_product[0].iProductId}','{$db_product[0].iStoreCategoryId}','{$db_product[0].fPrice}');" />
					
					
				</div>{/if}
					<br/><br/>
					
				<div style="display:none">
					<div id="original"> <img  src="{$tconfig["tsite_upload_images_store"]}/{$db_product[0].iStoreCategoryId}/{$db_product[0].iProductId}/{$db_product[0].vProductImage}" /> </div>
				</div>
				<div class="mystore_detail_content" style="margin-top: -373px;margin-left: 356px;">
					<div class="prise_store_txt"><strong>Product Name :</strong> {$db_product[0].vProductName}</div>
					<div class="store_detail_title"><strong>Product Price   :</strong>  ${$db_product[0].fPrice}</div>
					<div class="store_detail_title"><strong>Shipping Cost   :</strong>  ${$db_product[0].iShippingCost}</div>
					<strong>Description :</strong> {$db_product[0].tDescription}
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>					
				</div>
				
			</div>
			<div class="cl"></div>
		</div>
	</div>
</div>
</div>
{/if}

{if $iCatId eq 2}
<div id="services_boxinnerbg" class="desboard_body">
<div class="myphoto_album_container">
	<div class="top_album_title">
		<div class="top_album_img">
			{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
				<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}
		</div>
		<div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		<div class="cl"></div>
	</div>
	<div class="myphoto_album_img">
		<div class="myphoto_album_title">
			<div style="width:345px;float:right;padding-top:10px;" id="linkstore">
				{if $arrvideo[0].vFile neq ''}<a href="#" onclick="showvideofile()" style="color:#E26700;text-align:right;">Video</a>{/if}
			</div>
			<a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s Store</a>
		</div>
		<div class="store_pro_detail">
			<div class="mystore_detail_container" >
			
				<div class="mystore_detail_leftimg" >
					<a href="#original" id="hrefId"><img  src="{$tconfig["tsite_upload_images_store"]}/{$db_product[0].iStoreCategoryId}/{$db_product[0].iProductId}/1_{$db_product[0].vProductImage}" width="325" height="300" /></a> 
					
				</div>
					<div class="cl"></div><br>
					{if $url !== $memurl}
					<div class="add_to_card" style="margin-left:74px; float:left;">
					<input type="image" src="{$tconfig["front_images"]}add-to-card.png" onClick="getAjaxCart('Add','{$db_product[0].iProductId}','{$db_product[0].iStoreCategoryId}','{$db_product[0].fPrice}');" />
					
					
				</div>{/if}
					<br/><br/>
				
				<div style="display:none">
					<div id="original"> <img  src="{$tconfig["tsite_upload_images_store"]}/{$db_product[0].iStoreCategoryId}/{$db_product[0].iProductId}/{$db_product[0].vProductImage}" /> </div>
				</div>
				<div class="mystore_detail_content" style="margin-top: -381px;margin-left: 356px;">
					<div class="prise_store_txt"><strong>Product Name :</strong> {$db_product[0].vProductName}</div>
					<div class="store_detail_title"><strong>Product Price :</strong> ${$db_product[0].fPrice}</div>
					<strong>Description: </strong> {$db_product[0].tProductDescription}<br />
					<strong>Purchase Note: </strong> {$db_product[0].tPurchaseNote}<br />
					<strong>Product Size: </strong> {$db_product[0].vProductSize}<br />
					<strong>Product Color: </strong> {$db_product[0].vProductColor}<br />
					<strong>Custom Color: </strong> {$db_product[0].vCustomColor}<br />
					<strong>Quantity: </strong> {$db_product[0].iQuantity}<br />
					<strong>Purchase Limit: </strong> {$db_product[0].iPurchaseLimit}<br />
					<strong>Handling Cost: </strong> {$db_product[0].fHandlingCost}<br />
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					
					
					
				</div>
			</div>
			<div class="cl"></div>
		</div>
	</div>
</div>
</div>
{/if}

{if $iCatId eq 3}
{literal}
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
{/literal}

<div id="services_boxinnerbg" class="desboard_body">
<div class="myphoto_album_container">
	<div class="top_album_title">
		<div class="top_album_img">
			{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
				<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}
		</div>
		<div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		<div class="cl"></div>
	</div>
	<div class="myphoto_album_img">
		<div class="myphoto_album_title">
			<div style="width:345px;float:right;padding-top:10px;" id="linkstore">
				{if $arrvideo[0].vFile neq ''}<a href="#" onclick="showvideofile()" style="color:#E26700;text-align:right;">Video</a>{/if}
			</div>
			<a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s Store</a>
		</div>
		 <div id="propertymessageid" style="margin-left:136px;color:red;"></div>
<div class="my_automotivedetailpage">
			<div class="auto_photo_box">
				<div class="autom_price">Retail Price : ${$db_product[0].fPrice}</div>
				<div class="autom_address">{$db_product[0].iYear} {$db_product[0].make} {$db_product[0].model}</div>
				<div class="myreal_estate_photo" style="height:362px;">
				
								
				<div id="gallery" class="ad-gallery peroperty_img" style="width:430px; height:358px;">
				      <div class="ad-image-wrapper" style="height:280px; border:1px solid #676767;">
				      </div>
				      <div class="ad-nav">
					<div class="ad-thumbs">
					  <ul class="ad-thumb-list">
						<li>
						      <a href="{$tconfig["tsite_upload_images_store"]}3/{$db_product[0].iProductId}/1_{$db_product[0].vVehicleImage}">
							<img src="{$tconfig["tsite_upload_images_store"]}3/{$db_product[0].iProductId}/1_{$db_product[0].vVehicleImage}" width="90" height="60" class="image{$smarty.section.i.index}">
						      </a>
						</li>
						{if  $db_gallery|@count gt 0}
						{section name=i loop=$db_gallery}
						    <li>
						      <a href="{$tconfig["tsite_upload_images_store"]}3/{$db_gallery[i].iProductId}/2_{$db_gallery[i].vGalImage}">
							<img src="{$tconfig["tsite_upload_images_store"]}3/{$db_gallery[i].iProductId}/1_{$db_gallery[i].vGalImage}" width="90" height="60" class="image{$smarty.section.i.index}">
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
	
					
					
					
					
					
					<div class="auto_basicdetail" style="margin-left:10px; float:left;">
						<div class="automotive_heading">Basic Vehicle Information:</div>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td> Type: </td>
								<td><strong>{$db_product[0].vType}</strong></td>
							</tr>
							<tr>
								<td>Year: </td>
								<td><strong>{$db_product[0].iYear}</strong></td>
							</tr>
							<tr>
								<td>Make: </td>
								<td><strong>{$db_product[0].make}</strong></td>
							</tr>
							<tr>
								<td>Model: </td>
								<td><strong>{$db_product[0].model}</strong></td>
							</tr>
							<tr>
								<td>Value/MSRP: </td>
								<td><strong>{$db_product[0].fMsrp}</strong></td>
							</tr>
							<tr>
								<td>Mileage: </td>
								<td><strong>{$db_product[0].iMileage}</strong></td>
							</tr>
							<tr>
								<td>VIN: </td>
								<td><strong>{$db_product[0].vVin}</strong></td>
							</tr>
							<tr>
								<td>Transmission: </td>
								<td><strong>{$db_product[0].vTransmission}</strong></td>
							</tr>
							<tr>
								<td>Body Style: </td>
								<td><strong>{$db_product[0].vBodyStyle}</strong></td>
							</tr>
							<tr>
								<td>Engine Type: </td>
								<td><strong>{$db_product[0].vEngineType}</strong></td>
							</tr>
							<tr>
								<td>Fuel Type: </td>
								<td><strong>{$db_product[0].vFuelType}</strong></td>
							</tr>
							<tr>
								<td>Drive Train: </td>
								<td><strong>{$db_product[0].vDriveTrain}</strong></td>
							</tr>
							<tr>
								<td>Doors: </td>
								<td><strong>{$db_product[0].vDoors}</strong></td>
							</tr>
							<tr>
								<td>Exterior Color: </td>
								<td><strong>{$db_product[0].vExteriorColor}</strong></td>
							</tr>
							<tr>
								<td>Interior Color: </td>
								<td><strong>{$db_product[0].vInteriorColor}</strong></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="cl"></div>
			</div>
			<div style="clear:both;"></div>	
			<div class="vehicle_histry_detail">
				<div class="vehicle_histry_title">Vehicle Options and History</div>
				<table class="vehicle_detail_table" width="100%" cellpadding="0" cellspacing="0">
					{if $vVehicleSafety|@count gt 0}
					<tr>
						<td class="vehicle_type_blank" style="font-weight:bold;">Vehicle Safety and Security:</td>
						<td class="vehicle_dynamic_blank"></td>
					</tr>
					{section name=i start=0 loop=$vVehicleSafety step=2}
					<tr>
						<td class="vehicle_type">{$vVehicleSafety[i]}</td>
						<td class="vehicle_type">{$vVehicleSafety[$smarty.section.i.index+$plusOne]}</td>
					</tr>
					{/section}
					{/if}
					
					{if $vVehicleComfort|@count gt 0}
					<tr>
						<td class="vehicle_type_blank" style="font-weight:bold;">Comfort and Convenience:</td>
						<td class="vehicle_dynamic_blank"></td>
					</tr>
					{section name=i start=0 loop=$vVehicleComfort step=2}
					<tr>
						<td class="vehicle_type">{$vVehicleComfort[i]}</td>
						<td class="vehicle_type">{$vVehicleComfort[$smarty.section.i.index+$plusOne]}</td>
					</tr>
					{/section}
					{/if}
					
					{if $vVehicleAudio|@count gt 0}
					<tr>
						<td class="vehicle_type_blank" style="font-weight:bold;">Audio and Entertainment:</td>
						<td class="vehicle_dynamic_blank"></td>
					</tr>
					{section name=i start=0 loop=$vVehicleAudio step=2}
					<tr>
						<td class="vehicle_type">{$vVehicleAudio[i]}</td>
						<td class="vehicle_type">{$vVehicleAudio[$smarty.section.i.index+$plusOne]}</td>
					</tr>
					{/section}
					{/if}
					
					{if $vVehicleMechanical|@count gt 0}
					<tr>
						<td class="vehicle_type_blank" style="font-weight:bold;">Mechanical and Accessories:</td>
						<td class="vehicle_dynamic_blank"></td>
					</tr>
					{section name=i start=0 loop=$vVehicleMechanical step=2}
					<tr>
						<td class="vehicle_type">{$vVehicleMechanical[i]}</td>
						<td class="vehicle_type">{$vVehicleMechanical[$smarty.section.i.index+$plusOne]}</td>
					</tr>
					{/section}
					{/if}
					
					{if $vVehicleCondition|@count gt 0}
					<tr>
						<td class="vehicle_type_blank" style="font-weight:bold;">Vehicle's Condition and History:</td>
						<td class="vehicle_dynamic_blank"></td>
					</tr>
					{section name=i start=0 loop=$vVehicleCondition step=2}
					<tr>
						<td class="vehicle_type">{$vVehicleCondition[i]}</td>
						<td class="vehicle_type">{$vVehicleCondition[$smarty.section.i.index+$plusOne]}</td>
					</tr>
					{/section}
					{/if}
				
				</table>
			</div>
			<div class="vehicle_histry_detail">
				<div class="vehicle_histry_title">Seller's Contact Information</div>
				<table class="vehicle_detail_table" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="vehicle_type">City Name:</td>
						<td class="vehicle_dynamic">{$db_product[0].vCity}</td>
					</tr>
					<tr>
						<td class="vehicle_type_blank">Contact Name:</td>
						<td class="vehicle_dynamic_blank">{$db_product[0].vContactName}</td>
					</tr>
					<tr>
						<td class="vehicle_type">Dealership Name:</td>
						<td class="vehicle_dynamic">{$db_product[0].vDealershipName}</td>
					</tr>
					<tr>
						<td class="vehicle_type_blank">Dealership Address:</td>
						<td class="vehicle_dynamic_blank">{$db_product[0].vDealershipAddress}</td>
					</tr>
					<tr>
						<td class="vehicle_type">Dealer Number:</td>
						<td class="vehicle_dynamic">{$db_product[0].vDealerNumber}</td>
					</tr>
				</table>
			</div>

			<div class="email_histry_detail">
				<div class="vehicle_histry_title">E-mail To Dealer</div>
				
				<input type="hidden" name="selectedstate" id="selectedstate" value={$db_state[0].vState} />
				<table class="vehicle_histry_email">
					<tr>
						<td class="top_email_text" colspan="4">If you would like more information, complete and submit this form below to contact the seller.</td>
					</tr>
                    
                    <tr>
				     <td id="iProductId" name="iProductId" ></td>
				    </tr>
					<tr>
						<td>First Name :</td>
						<td class="padding15px"><input name="vFirstname" id="vFirstname" type="text" class="inpuname1_first" /></td>
						<td>Last Name :</td>
						<td class="padding15px"><input name="vLastname" id="vLastname" type="text" class="inpuname1_first" /></td>
					</tr>
					<tr>
						<td>Country  : </td>
						<td><select name="vCountry" id="iCountryId"  class="inputlist" onchange="getCountry(this.value);">
						     <option value="select">-Select-</option>
						      {section name=i loop=$db_country}
						      <option value='{$db_country[i].iCountryId}'>{$db_country[i].vCountry}</option>
						      {/section}	
						     </select>
						</td>					
						<td> State  : </td>
						<td><div class="showstates">
						          <select name="vState" id="vState" class="inputlist">
						          <option value="select">-Select-</option>						    
							   </select>						     
						     </div>
						</td>
					</tr>
					<tr>
						<td>E-mail : </td>
						<td><input name="vMail" id="vMail" type="text" class="inpuname1_first" /></td>
						<td>Phone  : </td>
						<td><input name="vPhoneNo"id="vPhoneNo" type="text" class="inpuname1_first" onkeypress="return checknum(event);"/></td>
					</tr>
					<tr>
						<td valign="top" align="left">Message :</td>
						<td colspan="3"><textarea name="tMessage" id="tMessage" cols="" rows="" class="message_textarea"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><a href="#"><img src="{$tconfig["front_images"]}send.png" alt=""  onclick="return ajemailautomotive({$db_product[0].iProductId});"/></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
{/if}

{literal}
<script type="text/javascript">
getId('{/literal}{$db_allautomotive[0].iProductId}{literal}');
function getId(id){
	//alert('hhgjhg');
	if($('#mode').val() == 'edit'){
		var ProductId = id;
		ajemailautomotive(ProductId);
	}
	
}
function getCountry(iCountryId)
{
	//alert(iCountryId);
	var extra ='';
	extra+='&iCountryId='+iCountryId;
	
        if($('#selectedstate').val() !=''){ 
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
		
	
	var url = site_url+"/index.php?file=a-ajstatelist";
	
	var pars = extra;

	$.post(url+pars,
            function(data) {
	//alert (data);
		if($('.showstates')){
			$('.showstates').html(data);
		}
	});
}
	
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
function ajemailautomotive(iProductId){
      //alert(iProductId);exit;
 	var extra ='';
	if($('#vFirstname')){
	   
		if($('#vFirstname').val() ==''){
			if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your First name").addClass('errormsg').fadeTo(900,1);
				return false;
			}
		}else{
			extra+='&vFirstname='+$('#vFirstname').val();
		}
     }
         if($('#vLastname')){
	   
		     if($('#vLastname').val() ==''){
			   if($('#propertymessageid')){
				$('#propertymessageid').html("Please Enter Your Last name").addClass('errormsg').fadeTo(900,1);
				return false;
			  }
		   }else{
			extra+='&vLastname='+$('#vLastname').val();
		  }
        }
         if($('#iCountryId')){
	   
		    if($('#iCountryId').val() == 'select'){
			  if($('#propertymessageid')){
				$('#propertymessageid').html("Please Select Your Country name").addClass('errormsg').fadeTo(900,1);
				return false;
			 }
		   }else{
			extra+='&iCountryId='+$('#iCountryId').val();
		 }
       }
         if($('#vState')){
	   
		    if($('#vState').val() =='select'){
			  if($('#propertymessageid')){
				$('#propertymessageid').html("Please select Your state name").addClass('errormsg').fadeTo(900,1);
				return false;
			 }
		  }else{
			extra+='&vState='+$('#vState').val();
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
				$('#propertymessageid').html("Please Enter Text");
				return false;
			}
		}else{
			extra+='&tMessage='+$('#tMessage').val();
		}     
	}
   
    
	extra+='&iProductId='+iProductId; 
    
    var url = site_url+"/index.php?file=a-ajemailautomotive";
    //alert(url);
	var pars = extra;
 
   //alert(url+pars);
   $.post(url+pars,
    function(data) {
        
       if($('#propertymessageid')){
		   $('#propertymessageid').html(data);
		   $('#vFirstname').val('');
		   $('#vLastname').val('');
		   $('#iCountryId').val('');
		   $('#vState').val('');
		   $('#vMail').val('');
		   $('#vPhoneNo').val('');
		   $('#tMessage').val('');
		} 
    });
   
    }

</script>
{/literal}




{if $iCatId eq 4}

<div id="services_boxinnerbg" class="desboard_body">
<div class="myphoto_album_container">
	<div class="top_album_title">
		<div class="top_album_img">
			{if $db_user[0].vProfileImage neq ''}
				<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
			{else}
				<img src="{$tconfig["front_images"]}user_img.png" alt="" width="52" height="52"/>
			{/if}
		</div>
		<div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
		<div class="cl"></div>
	</div>
	
	<div class="myphoto_album_img">
		<div class="myphoto_album_title">
			<div style="width:345px;float:right;padding-top:10px;" id="linkstore">
				{if $arrvideo[0].vFile neq ''}<a href="#" onclick="showvideofile()" style="color:#E26700;text-align:right;">Video</a>{/if}
			</div>
			<a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s Store</a>
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
									<div id="propertymessageid" class="error_massage" align="center"></div>
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
</div>
</div>
{literal}
<script type="text/javascript">
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
{/literal}
{/if}