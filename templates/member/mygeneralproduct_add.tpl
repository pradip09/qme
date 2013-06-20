<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>{$vStoreCategory}</h1>
		</div>
		<div class="cl"></div>
		<div class="MyPhotoContentPart">
				<div class="ProcessingIndication Navigation Myaccount" id="additem_loading">Please wait while your general product is uploading.</div>
			<div id="addgeneral" class="myphoto_album"> {if $mode eq 'add'}
				<div class="AddneweventTitle">Add Product</div>
				{else}
				<div class="AddneweventTitle">Edit Product</div>
				{/if}
				<div id="divContactid" class="error_massage"></div>
				<div id="divmsgidinner" class="myphoto_blankspace"></div>
				<form id="frmAddProduct" name="frmAddProduct" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmygeneralproduct_a">
					<input type="hidden" name="iProductId" id="iProductId" value="{$db_allproduct[0].iProductId}" />
					<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allproduct[0].vProductImage}" />
					<input type="hidden" name="mode" id="mode" value="{$mode}"/>
					<div class="photo_form_box">
						<table>
							<tr>
								<td class="padding15px"><table>
										<tr>
											<td><label>Product Name :</label></td>
										</tr>
										<tr>
											<td  class="Photo_title"><input id="vProductName" type="text" placeholder="Product Name" name="vProductName" value="{$db_allproduct[0].vProductName}"></td>
										</tr>
										<tr>
											<td><label>Seller Name:</label></td>
										</tr>
										<tr>
											<td  class="Photo_title"><input id="vSellerName" type="text" placeholder="Seller Name" name="vSellerName" value="{$db_allproduct[0].vSellerName}"></td>
										</tr>
										<tr>
											<td><label>Price:</label>
											</td>
										</tr>
										<tr>
											<td  class="Photo_title"><input id="fPrice" type="text" placeholder="Price" name="fPrice" value="{$db_allproduct[0].fPrice}" onkeypress="return checknum(event);">
											</td>
										</tr>
										<tr>
											<td><label>Shipping cost :</label>
											</td>
										</tr>
										<tr>
											<td  class="Photo_title"><input id="iShippingCost" type="text" placeholder="Shipping Cost" name="iShippingCost" value="{$db_allproduct[0].iShippingCost}" onkeypress="return checknum(event);">
											</td>
										</tr>
									</table></td>
								<td valign="top"><table>
										<tr>
											<td><label>Description:</label></td>
										</tr>
										<tr>
											<td  class="Photo_title"><textarea id="tDescription" type="text" placeholder="Description" name="tDescription" style="width:320px;height:100px">{$db_allproduct[0].tDescription}</textarea></td>
										</tr>
										<tr>
											<td><label>Upload Product image :</label></td>
										</tr>
										<tr>
											<td><div class="imagedisplay">
													<input type="file" name="vProductImage" id="vProductImage" value="{$db_allproduct[0].vProductImage}" onchange="CheckValidFile(this.value,this.name)"/>
													{if $db_allproduct[0].vProductImage neq ''}
													<div class="viewimage"><a href="#view1" id="test"><img src="{{$tconfig["front_images"]}}view.png"/></a></div>
												</div>
												<div style="display:none;">
													<div id="view1">
														<div>
															<div> <img src="{$tconfig["tsite_upload_images_store"]}/1/{$db_allproduct[0].iProductId}/{$db_allproduct[0].vProductImage}"/> </div>
														</div>
													</div>
												</div></td>
										</tr>
										{else}
										{/if}
									</table>
								</td>
							</tr>
						</table>
					</div>
				</form>
				<div class="submitbutton">
					<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return createproduct();"/>
					<a href="{$site_url}/myproducts/1"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
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
	if($('#vSellerName')){
		if($('#vSellerName').val() ==''){
			$('#divContactid').html("Please enter seller Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#tDescription')){
		if($('#tDescription').val() ==''){
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
	if($('#iShippingCost')){
		if($('#iShippingCost').val() ==''){
			$('#divContactid').html("Please enter shipping cost").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addgeneral').hide();
	$('#additem_loading').show();
	$("#frmAddProduct").ajaxForm({
		target: '#divContactid',
		success: finish
		}).submit();
	
}
function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myproducts/1';
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