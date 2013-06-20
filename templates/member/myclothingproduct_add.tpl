<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>{$vStoreCategory}</h1>
		</div>
		<div class="cl"></div>
		<div class="MyPhotoContentPart">
			<ul>
				<div class="ProcessingIndication Navigation Myaccount" id="addcloth_loading">Please wait while your clothing product is uploading.</div>
				<div id="addcloth" class="myphoto_album"> {if $mode eq 'add'}
					<div class="AddneweventTitle">Add Product</div>
					{else}
					<div class="AddneweventTitle">Edit Product</div>
					{/if}
					<div id="divContactid" class="error_massage"></div>
					<div id="divmsgidinner" class="myphoto_blankspace"></div>
					<form id="frmAddProduct" name="frmAddProduct" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyclothingproduct_a">
						<input type="hidden" name="iProductId" id="iProductId" value="{$db_allclothing[0].iProductId}" />
						<input type="hidden" name="iStoreCategoryId" id="iStoreCategoryId" value="{$db_allclothing[0].iStoreCategoryId}" />
						<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allclothing[0].vProductImage}" />
						<input type="hidden" name="mode" id="mode" value="{$mode}" />
						<div class="photo_form_box">
							<table width="100%">
								<tr>
									<td style="width:47%;">
										<table>
											<tr>
												<td><label>Product Name :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vProductName" type="text" placeholder="Product Name" name="vProductName" value="{$db_allclothing[0].vProductName}"></td>
											<tr>
												<td><label>Product Size:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vProductSize" type="text" placeholder="Product Size" name="vProductSize" value="{$db_allclothing[0].vProductSize}"></td>
											</tr>
											<tr>
												<td><label>Product Color:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vProductColor" type="text" placeholder="Product Color" name="vProductColor" value="{$db_allclothing[0].vProductColor}"></td>
											</tr>
											<tr>
												<td><label>Custom Color:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vCustomColor" type="text" placeholder="Custom Color" name="vCustomColor" value="{$db_allclothing[0].vCustomColor}"></td>
											</tr>
											<tr>
												<td><label>Quantity:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="iQuantity" type="text" placeholder="Quantity" name="iQuantity" value="{$db_allclothing[0].iQuantity}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label>Purchase Limit:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="iPurchaseLimit" type="text" placeholder="Purchase Limit" name="iPurchaseLimit" value="{$db_allclothing[0].iPurchaseLimit}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label>Upload image :</label></td>
											</tr>
											<tr>
												<td><div class="edit_pro_imagedisplay">
														<input type="file" name="vProductImage" id="vProductImage" value="{$db_allclothing[0].vProductImage}" onchange="CheckValidFile(this.value,this.name)"/>
														{if $db_allclothing[0].vProductImage neq ''}
														<div class="viewimage"><a href="#view1" id="test"><img src="{{$tconfig["front_images"]}}view.png"/></a></div>
													</div>
													<div style="display:none;">
														<div id="view1">
															<div>
																<div> <img src="{$tconfig["tsite_upload_images_store"]}/2/{$db_allclothing[0].iProductId}/{$db_allclothing[0].vProductImage}"/> </div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											{else}											
											{/if}
										</table>
									</td>
									<td valign="top">
										<table>
											<tr>
												<td><label> Product Description:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><textarea id="tProductDescription" type="text" placeholder="Product Description" name="tProductDescription" style="width:320px;height:100px">{$db_allclothing[0].tProductDescription}</textarea></td>
											</tr>
											<tr>
												<td><label>Purchase Note:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><textarea id="tPurchaseNote" type="text" placeholder="Purchase Note" name="tPurchaseNote" style="width:320px;height:100px">{$db_allclothing[0].tPurchaseNote}</textarea></td>
											</tr>
											<tr>
												<td><label>Price:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="fPrice" type="text" placeholder="Price" name="fPrice" value="{$db_allclothing[0].fPrice}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label>Handelling cost :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="fHandlingCost" type="text" placeholder="Handeling Cost" name="fHandlingCost" value="{$db_allclothing[0].fHandlingCost}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label><input type="checkbox" id="eHideProduct" name="eHideProduct"{if $db_allclothing[0].eHideProduct eq 'Yes'}checked{/if}> Hide Product?</label></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<div class="cl"></div>
						</div>
					</form>
					<div class="submitbutton">
						<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return createproduct();"/>
						<a href="{$site_url}/myproducts/2"><img src="{$tconfig["front_images"]}cancle.png"/></a>
					</div>
				</div>
			</ul>
		</div>
	</div>
	<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">

function createproduct()
{
	
	
	/*if($('#iStoreId')){
		if($('#iStoreId').val() ==''){
			$('#divContactid').html("Please select store Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}*/
	if($('#vProductName')){
		if($('#vProductName').val() ==''){
			$('#divContactid').html("Please enter product Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	if($('#tProductDescription')){
		if($('#tProductDescription').val() ==''){
			$('#divContactid').html("Please enter text").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}	
	
	if($('#mode').val() =='add')
	{
			if($('#vProductImage').val() ==''){
			$('#divContactid').html("Please select Image").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#fPrice')){
		if($('#fPrice').val() ==''){
			$('#divContactid').html("Please enter price").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#fHandlingCost')){
		if($('#fHandlingCost').val() ==''){
			$('#divContactid').html("Please enter Handling cost").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addcloth').hide();
	$('#addcloth_loading').show();
	$("#frmAddProduct").ajaxForm({
		target: '#divContactid',
		success: finish
		}).submit();
	
}
function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myproducts/2';
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

</script>
{/literal} 