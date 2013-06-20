<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Product</h1>
		</div>
		<div class="cl"></div>
		<div class="MyPhotoContentPart">
		<div class="ProcessingIndication Navigation Myaccount" id="addreal_loading">Please wait while your Realestate product is uploading.</div>
		<div id="addreal" class="myphoto_album">
		{if $mode eq 'add'}
		<div class="AddneweventTitle_top">Add Realestate Product</div>
		{else}
		<div class="AddneweventTitle">Edit Realestate Product</div>
		{/if}
		 <div id="divContactid" class="error_massage"></div><br />
		<div id="divmsgidinner" class="myphoto_blankspace"></div>
		<form id="frmAddProduct" name="frmAddProduct" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyrealestateproduct_a">
			<input type="hidden" name="iStoreCategoryId" id="iStoreCategoryId" value="{$db_allrealestate[0].iStoreCategoryId}" />
			<input type="hidden" name="iProductId" id="iProductId" value="{$db_allrealestate[0].iProductId}" />
			<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allrealestate[0].vImage}" />
			<input type="hidden" name="selectedstate" id="selectedstate" value="{$db_allrealestate[0].iStateId}"/>
			<input type="hidden" name="mode" id="mode" value="{$mode}" />
			<div class="photo_form_box">
			<div class="AddneweventTitle">Property Information:</div>
			<div class="reail_estate_info">
				<table>
               
					<tr>
						<td class="padding15px"><table>
								<tr>
									<td><label>Property Type :</label></td>
								</tr>
								<tr>
									<td  class="Photo_title">
										<select id="iPropertyTypeId" name="iPropertyTypeId" style="width:320px">
											<option value=''> - Select Property Type - </option>
											{section name=i loop=$db_real_estate_property}                    
                                         		<option value='{$db_real_estate_property[i].iPropertyTypeId}' {if $db_real_estate_property[i].iPropertyTypeId eq $db_allrealestate[0].iPropertyTypeId}selected{/if}>{$db_real_estate_property[i].vPropertyType}</option>
                                        	{/section}					
										</select>
									</td>
								</tr>
								<tr>
									<td><label>Asking Price:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="fAskingPrice" type="text" placeholder="Asking Price" name="fAskingPrice" value="{$db_allrealestate[0].fAskingPrice}" onkeypress="return checknum(event);"></td>
								</tr>
								<tr>
									<td><label>Bedrooms:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="iBedrooms" type="text" placeholder="Bedrooms" name="iBedrooms" value="{$db_allrealestate[0].iBedrooms}" onkeypress="return checknum(event);"></td>
								</tr>
								<tr>
									<td><label>Bathrooms:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="iBaths" type="text" placeholder="Bathrooms" name="iBaths" value="{$db_allrealestate[0].iBaths}" onkeypress="return checknum(event);"></td>
								</tr>
								<tr>
									<td><label>Sqft:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="fSqft" type="text" placeholder="Sqft" name="fSqft" value="{$db_allrealestate[0].fSqft}" onkeypress="return checknum(event);"></td>
								</tr>
								<tr>
									<td><label>Lot Size:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="fLotSize" type="text" placeholder="Lot Size" name="fLotSize" value="{$db_allrealestate[0].fLotSize}" onkeypress="return checknum(event);"></td>
								</tr>
                                
                                <tr>
									<td><label>Property Description:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><textarea id="tDescription" type="text" placeholder="Property Description" name="tDescription" style="width:320px;height:100px">{$db_allrealestate[0].tDescription|stripslashes}</textarea></td>
								</tr>
                                                                                                
								<tr>
									<td><label>Image :</label></td>
								</tr>
								<tr>
									<td><div>
											<input type="file" name="vImage" id="vImage" value="{$db_allrealestate[0].vImage}" onchange="CheckValidFile(this.value,this.name)"/>
								            {if $db_allrealestate[0].vImage neq ''}
											<div class="viewimage"><a href="#view1" id="test"><img src="{{$tconfig["front_images"]}}view.png"/></a></div>
								            </div>
										
										<div style="display:none;">
											<div id="view1">
												<div>
													<div> <img src="{$tconfig["tsite_upload_images_store"]}/4/{$db_allrealestate[0].iProductId}/{$db_allrealestate[0].vImage}"/> </div>
												</div>
											</div>
										</div>
										{/if} 
									</td>
								</tr>
							</table>
						</td>
						<td valign="top">
							<table>
								<tr>
									<td><label> Street Address:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><textarea id="vStreetAddress" type="text" placeholder="Street Address" name="vStreetAddress" style="width:320px;height:100px">{$db_allrealestate[0].vStreetAddress}</textarea></td>
								</tr>
								<tr>
									<td><label>Country :</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><select id="iCountryId" name="iCountryId"  title="Country" onchange="getCountry(this.value);" style="width:320px;">
										<option value=''>--Select Country--</option>
										<option value='223'  {if 223 eq $db_allrealestate[0].iCountryId}selected{/if}>United States</option>
										{section name=i loop=$db_realcountry}
										{if $db_country[i].iCountryId neq 223}
										<option value='{$db_realcountry[i].iCountryId}' {if $db_realcountry[i].iCountryId eq $db_allrealestate[0].iCountryId}selected{/if}>{$db_realcountry[i].vCountry}</option>
										{/if}
										{/section}						 
										</select>
									</td>
								</tr>
								<tr>
									<td><label>State :</label></td>
								</tr>
								<tr>
									<td  class="Photo_title">
										<div class="showallstates">
											<select id="iStateId" name="iStateId"   title="State"  style="width:320px;" >
												<option value=''>--Select State--</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td><label>City:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="vCity" type="text" placeholder="City" name="vCity" value="{$db_allrealestate[0].vCity}" ></td>
								</tr>
								<tr>
									<td><label>Zip Code:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="iZipCode" type="text" placeholder="Zip Code" name="iZipCode" value="{$db_allrealestate[0].iZipCode}" onkeypress="return checknum(event);"></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="AddneweventTitle">Account Information:</div>
			<div class="reail_estate_info">
				<table>
                
					<tr>
						<td class="padding15px"><table>
								<tr>
									<td><label>First Name:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input type="text" id="vFirst" placeholder="First Name" name="vFirstName" value="{$db_allrealestate[0].vFirstName}" ></td>
								</tr>
								<tr>
									<td><label>Last Name:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="vLast" type="text" placeholder="Last Name" name="vLastName" value="{$db_allrealestate[0].vLastName}" ></td>
								</tr>
								<tr>
									<td><label>Phone:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="vPhone" type="text" placeholder="Phone" name="vPhone" value="{$db_allrealestate[0].vPhone}" onkeypress="return checknum(event);" ></td>
								</tr>
								<tr>
									<td><label>Agent Main Contact:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><textarea id="vAgentMainContact" type="text" placeholder="Agent Main Contact" name="vAgentMainContact" style="width:320px;height:100px">{$db_allrealestate[0].vAgentMainContact}</textarea></td>
								</tr>
							</table>
						</td>
						<td>
							<table>
								<tr>
									<td><label>Real Estate Farm:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="vRealEstateFirm" type="text" placeholder="Real Estate Farm" name="vRealEstateFirm" value="{$db_allrealestate[0].vRealEstateFirm}" ></td>
								</tr>
								<tr>
									<td><label>Agent Name:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="vAgentName" type="text" placeholder="Agent Name" name="vAgentName" value="{$db_allrealestate[0].vAgentName}" ></td>
								</tr>
								<tr>
									<td><label>Agent Email Address:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><input id="vAgentEmail" type="text" placeholder="Agent Email Address" name="vAgentEmail" value="{$db_allrealestate[0].vAgentEmail}" ></td>
								</tr>
								<tr>
									<td><label>Real Estate Office Contact:</label></td>
								</tr>
								<tr>
									<td  class="Photo_title"><textarea id="vRealEstateOfficeContact" type="text" placeholder="Real Estate Office Contact" name="vRealEstateOfficeContact" style="width:320px;height:100px">{$db_allrealestate[0].vRealEstateOfficeContact}</textarea></td>
								</tr>
								<tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="AddneweventTitle">Image Gallery</div>
			<div class="gallery_img">
				<input  type="hidden" id="totcount" name="totcount" value="{$totgal}"/>
				<div id="TextBoxesGroup"> {if $mode eq 'add'}
					<div id="TextBoxDiv0" >
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="2%"><input type="file" name="gallery[]" id="gallery"></td>
								<td width="40%"><input type="button"  class="btn" name="Add" id="addButton" style="padding:3px 15px;" value="Add"></td>
							</tr>
						</table>
					</div>
					{elseif  $mode eq 'edit' and $totgal eq 1 and $flag eq 0}
					<div id="TextBoxDiv0">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
								<td width="40%"><input type="button" class="btn" name="Add" id="addButton" style="padding:3px 15px;" value="Add"></td>
							</tr>
						</table>
					</div>
					{else}
					
					{section name=i loop=$db_product_gallery}
					<div id="TextBoxDiv{$smarty.section.i.index}">
						<input type="hidden" name="vOldGall[]" id="vOldGall" value="{$db_product_gallery[i].vGalImage}">
						<input type="hidden" name="iGalleryId[]" id="iGalleryId" value="{$db_product_gallery[i].iGalleryId}">
						<table width="85%%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="1%" valign="top"><input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
									{if $db_product_gallery[0].vGalImage neq ''} </br>
									<a href="#galdis{$smarty.section.i.index}" style="margin-left:5px;" id="popgal{$smarty.section.i.index}"><img src="{{$tconfig["front_images"]}}view.png"/></a>
									<div style="display:none;">
										<div id="galdis{$smarty.section.i.index}">
											<div class="">
												<div><img src="{$tconfig["tsite_upload_images_store"]}/4/{$db_product_gallery[i].iProductId}/{$db_product_gallery[i].vGalImage}"></div>
											</div>
										</div>
									</div>
									{literal}
									<script>
										$(document).ready(function(){
											$('#popgal{/literal}{$smarty.section.i.index}{literal}').fancybox({
												'overlayShow'	: true	,
												'transitionIn'	: 'elastic',
												'transitionOut'	: 'elastic',
												'margin' : '0',
												'padding' : '0',
												'scrolling' : 'no'
												
											});
										});
			
									</script>
									{/literal}
									{/if} </td>
								{if $smarty.section.i.index eq 0}
								<td width="20%" valign="top"><input type="button" class="btn" style="padding:3px 15px;" name="Add" id="addButton" value="Add"></td>
								{else}
								<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:2px 2px;" name="Remove" id="remove" value="Remove" onclick="deleterow({$smarty.section.i.index});">
								</td>
								{/if} </tr>
						</table>
					</div>
					{/section}
					{/if} </div>
				<div style="clear:both;"></div>
			</div>
			
			</div>
		</form>
		<div class="submitbutton_my_product">
			<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return createproduct();"/>
			<a href="{$site_url}/myproducts/4"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
	</div>
</div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
getId('{/literal}{$db_allrealestate[0].iCountryId}{literal}');
function getId(id){
	if($('#mode').val() == 'edit'){
		var countryId = id;
		getCountry(countryId);
	}
	
}
function getCountry(countryId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;	
        if($('#selectedstate').val() !=''){            
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
	var url = site_url+"/index.php?file=a-ajcountrieslist";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
	
		if($('.showallstates')){
			$('.showallstates').html(data);
		}
	});
}
</script>
<script type="text/javascript">

function createproduct()
{
	
    
    if($('#iPropertyTypeId')){
		if($('#iPropertyTypeId').val() ==''){
			$('#divContactid').html("Please enter Property Type").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.iPropertyTypeId.focus() ;
			return false;
		}
	}
    if($('#fAskingPrice')){
		if($('#fAskingPrice').val() ==''){
			$('#divContactid').html("Please enter Asking Price").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.fAskingPrice.focus() ;
			return false;
		}
	}
    if($('#iBedrooms')){
		if($('#iBedrooms').val() ==''){
			$('#divContactid').html("Please enter Bedrooms").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.iBedrooms.focus() ;
			return false;
		}
	}
    if($('#iBaths')){
		if($('#iBaths').val() ==''){
			$('#divContactid').html("Please enter Bathrooms").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.iBaths.focus() ;
			return false;
		}
	}
    
    if($('#fSqft')){
		if($('#fSqft').val() ==''){
			$('#divContactid').html("Please enter Sqft").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.fSqft.focus() ;
			return false;
		}
	}
    
    if($('#fLotSize')){
		if($('#fLotSize').val() ==''){
			$('#divContactid').html("Please enter Lot Size").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.fLotSize.focus() ;
			return false;
		}
	}
    if($('#vStreetAddress')){
		if($('#vStreetAddress').val() ==''){
			$('#divContactid').html("Please enter Street Address").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vStreetAddress.focus() ;
			return false;
		}
	}
    if($('#vCountry')){
		if($('#vCountry').val() ==''){
			$('#divContactid').html("Please enter Country").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vCountry.focus() ;
			return false;
		}
	}
    if($('#vState')){
		if($('#vState').val() ==''){
			$('#divContactid').html("Please enter State").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vState.focus() ;
			return false;
		}
	}
                           
    if($('#vCity')){
		if($('#vCity').val() ==''){
			$('#divContactid').html("Please enter City").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vCity.focus() ;
			return false;
		}
	}
    if($('#iZipCode')){
		if($('#iZipCode').val() ==''){
			$('#divContactid').html("Please enter Zip Code").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.iZipCode.focus() ;
			return false;
		}
	}
    if($('#tDescription')){
		if($('#tDescription').val() ==''){
			$('#divContactid').html("Please enter Property Description").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.tDescription.focus() ;
			return false;
		}
	}
    /*if($('#vImage')){
		if($('#vImage').val() ==''){
			$('#divContactid').html("Please Insert Image").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vImage.focus() ;
			return false;
		}
	}*/
    
    if($('#vFirst')){
		if($('#vFirst').val() ==''){ 
			$('#divContactid').html("Please enter FirstName").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vFirst.focus() ;
			return false;
		}
		}
	if($('#vLast')){
        
		if($('#vLast').val() ==''){
			$('#divContactid').html("Please enter LastName").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vLast.focus() ;
			return false;
		}
		}
  if($('#vPhone')){
        
	if($('#vPhone').val() ==''){
			$('#divContactid').html("Please enter Phone").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vPhone.focus() ;
			return false;
		}
		}
  if($('#vAgentMainContact')){
        
	if($('#vAgentMainContact').val() ==''){
			$('#divContactid').html("Please enter Agent Main Contact").addClass('errormsg').fadeTo(900,1);
             document.frmAddProduct.vAgentMainContact.focus() ;
			return false;
		}
		}
    if($('#vRealEstateFirm')){
        
	if($('#vRealEstateFirm').val() ==''){
			$('#divContactid').html("Please enter Real Estate Firm").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vRealEstateFirm.focus() ;
			return false;
		}
		}
    if($('#vAgentName')){
        
	if($('#vAgentName').val() ==''){
			$('#divContactid').html("Please enter Agent Name").addClass('errormsg').fadeTo(900,1);
             document.frmAddProduct.vAgentName.focus() ;
			return false;
		}
		}
    if($('#vAgentEmail')){
        
	if($('#vAgentEmail').val() ==''){
			$('#divContactid').html("Please enter Agent Email").addClass('errormsg').fadeTo(900,1);
             document.frmAddProduct.vAgentEmail.focus() ;
			return false;
		}
		else{
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			 var valid = emailRegex.test($('#vAgentEmail').val());
			  if (!valid) {
				if($('#vAgentEmail')){
					$('#divContactid').html("Invalid e-mail address");
                    document.frmAddProduct.vAgentEmail.focus() ;
					return false;
				}else{
					return true;
				}
			}
            }
            }
  if($('#vRealEstateOfficeContact')){
        
	if($('#vRealEstateOfficeContact').val() ==''){
			$('#divContactid').html("Please enter RealEstate Office Contact").addClass('errormsg').fadeTo(900,1);
            document.frmAddProduct.vRealEstateOfficeContact.focus() ;
			return false;
		}
		}
	$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addreal').hide();
	$('#addreal_loading').show();
	$("#frmAddProduct").ajaxForm({
		target: '#divContactid',		
		success: finish
		}).submit();
	document.body.scrollTop = 100;
    
}
function finish()

{
	window.location='{/literal}{$site_url}{literal}'+'/myproducts/4';
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



function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}


$(document).ready(function(){
	$('#test').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
$(document).ready(function(){
    var counter = $('#totcount').val();
    
    $("#addButton").click(function () {
    //alert($('#totcount').val());
    if($('#totcount').val() >= 5){
        alert("Only allow 5 images to upload.");
        return false;
    }   
 
    var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
       
    
        var html ='';
        html +='<table width="100%" border="0" cellspacing="0" cellpadding="0" id="TextBoxesGroup">';
	html +='<tr>';
		html +='<td width="1%"><input type="file" name="gallery[]" id="gallery"></td>';
		html +='<td width="40%"><input type="button" name="Remove" class="btnalt" style="padding:1px 1px;" id="remove" value="Remove" onclick="deleterow('+counter+');"></td>';
	html +='</tr>';
	html +='</table>';
       
        newTextBoxDiv.html(html);
        /*newTextBoxDiv.html('<label>Textbox #'+ counter + ' : </label>' +
        '<input type="text" name="textbox' + counter + 
        '" id="textbox' + counter + '" value="" >');*/
        
        newTextBoxDiv.appendTo("#TextBoxesGroup");
        counter = $('#totcount').val();
        counter++;
        //alert(counter);
        $('#totcount').val(counter);
        //alert(counter);
        
        $('.vTimeType ,.vServiceType ,.eDuration').click(function(){
            $(this).closest('table').find("input:checkbox").each(function(){        
                $(this).attr('checked',false)
            }) 
            $(this).attr('checked',true)
        })
    
    });
      
      $('.vTimeType,.vServiceType ,.eDuration').click(function(){
            $(this).closest('table').find("input:checkbox").each(function(){        
                $(this).attr('checked',false)
            }) 
            $(this).attr('checked',true)
        })  
  });

function deleterow(divid){
  //alert($('#totcount').val());
  //alert(divid);
  $("#TextBoxDiv" + divid).remove();
  var counter = $('#totcount').val()-1; ;
  //alert(counter);
   //counter--;
  $('#totcount').val(counter);
}
function ImageDelete(){
	var r=confirm("Are you sure to delete this image");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteImage");
		}
		
		if($('#frmadd')){
			$('#frmadd').submit();
		}
	  }
	else
	  {
		return false;
	  } 
	}
</script>
{/literal} 