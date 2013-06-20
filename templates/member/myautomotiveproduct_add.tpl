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
			<ul>
				<div class="ProcessingIndication Navigation Myaccount" id="addauto_loading">Please wait while your automotive product is uploading.</div>
				<div id="addauto" class="myphoto_album"> {if $mode eq 'add'}
					<div class="AddneweventTitle">Add Automotive Product</div>
					{else}
					<div class="AddneweventTitle">Edit Automotive Product</div>
					{/if}
					<div id="divContactid" class="error_massage"></div>
					<div id="divmsgidinner" class="myphoto_blankspace"></div>
					<form id="frmAddProduct" name="frmAddProduct" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyautomotiveproduct_a">
						<input type="hidden" name="iProductId" id="iProductId" value="{$db_allautomotive[0].iProductId}" />
						<input type="hidden" name="iStoreCategoryId" id="iStoreCategoryId" value="{$db_allautomotive[0].iStoreCategoryId}" />
						<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allautomotive[0].vVehicleImage}" />
						<input type="hidden" name="selectedmodel" id="selectedmodel" value="{$db_allautomotive[0].model}"/>
						<input type="hidden" name="mode" id="mode" value="{$mode}" />
						<div class="photo_form_box">
							<table class="automotive_table_top">
								<tr>
									<td><table>
											<tr>
												<td><label>Make :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><select id="iMakeId" name="make"  title="Make" lang="*" onchange="getMake(this.value);">
														<option value=''>--Select Make--</option>
														
														  {section name=i loop=$db_automake}
										
														<option value='{$db_automake[i].vMake}' {if $db_automake[i].vMake eq $db_allautomotive[0].make}selected{/if}>{$db_automake[i].vMake}</option>
														
														   {/section}
									
													</select>
												</td>
											</tr>
											<tr>
												<td><label>Model :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><div class="showallmodels">
														<select id="model" name="model"   title="Model"  lang="*">
															<option value=''>--Select Model--</option>
														</select>
													</div></td>
											</tr>
											<tr>
												<td><label>Body Style :</label></td>
											</tr>
											<tr>
												<td class="Photo_title"><select id="vBodyStyle" name="vBodyStyle" lang="*" title="Body Style">
														<option value=''> - Select Body Style - </option>
														<option value="Convertable" {if $db_allautomotive[0].vBodyStyle eq "Convertable"}selected="selected"{/if}>Convertable</option>
														<option value="Coupe" {if $db_allautomotive[0].vBodyStyle eq "Coupe"}selected="selected"{/if}>Coupe</option>
														<option value="Hatchback" {if $db_allautomotive[0].vBodyStyle eq "Hatchback"}selected="selected"{/if}>Hatchback</option>
														<option value="Salvaged" {if $db_allautomotive[0].vBodyStyle eq "Salvaged"}selected="selected"{/if}>Salvaged</option>
														<option value="Sedan" {if $db_allautomotive[0].vBodyStyle eq "Sedan"}selected="selected"{/if}>Sedan</option>
														<option value="Sports Utility" {if $db_allautomotive[0].vBodyStyle eq "Sports Utility"}selected="selected"{/if}>Sports Utility</option>
														<option value="Truck" {if $db_allautomotive[0].vBodyStyle eq "Truck"}selected="selected"{/if}>Truck</option>
														<option value="Van" {if $db_allautomotive[0].vBodyStyle eq "Van"}selected="selected"{/if}>Van</option>
														<option value="Wagon" {if $db_allautomotive[0].vBodyStyle eq "Wagon"}selected="selected"{/if}>Wagon</option>
													</select>
												</td>
											</tr>
										</table></td>
									<td><table>
											<tr>
												<td><label>Transmission :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><select id="vTransmission" name="vTransmission" lang="*" title="Transmission">
														<option value=''> - Select Transmission - </option>
														<option value="Automatic" {if $db_allautomotive[0].vTransmission eq "Automatic"}selected="selected"{/if}>Automatic</option>
														<option value="Manual" {if $db_allautomotive[0].vTransmission eq "Manual"}selected="selected"{/if}>Manual</option>
													</select>
												</td>
											</tr>
											
											<tr>
												<td><label>Vehicle Type :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title">
													<select id="vType" name="vType" >
														<option value="">--Select type--</option>
														{if  $db_vehicle_type|@count gt 0}
														{section name=i loop=$db_vehicle_type}
														<option value='{$db_vehicle_type[i].vName}' {if $db_vehicle_type[i].vName eq $db_allautomotive[0].vType}selected{/if}>{$db_vehicle_type[i].vName}</option>
														{/section}
														{/if}
													</select>
												</td>
											</tr>
											<tr>
												<td><label>Year :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><select id="iYear" name="iYear" title="Year">
														<option value=''> - Select Year - </option>
														
													 {section name=yr start=1950 loop=2021 step=1}
										
														<option value="{$smarty.section.yr.index}" {if $smarty.section.yr.index eq $db_allautomotive[0].iYear}selected{/if}>{$smarty.section.yr.index}</option>
														
												   {/section}
									
													</select>
												</td>
											</tr>
										</table></td>
								</tr>
								<tr>
									<td class="padding15px" valign="top"><table>
											<tr>
												<td><label>Engine Type :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vEngineType" type="text" placeholder="Engine Type" name="vEngineType" value="{$db_allautomotive[0].vEngineType}" ></td>
											</tr>
											<tr>
												<td><label>Fuel Type :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vFuelType" type="text" placeholder="Fuel Type" name="vFuelType" value="{$db_allautomotive[0].vFuelType}" ></td>
											</tr>
											<tr>
												<td><label>Drive Train :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vDriveTrain" type="text" placeholder="Drive Train" name="vDriveTrain" value="{$db_allautomotive[0].vDriveTrain}" ></td>
											</tr>
											<tr>
												<td><label>Price:</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="fPrice" type="text" placeholder="Price" name="fPrice" value="{$db_allautomotive[0].fPrice}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label>Value/MSRP :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="fMsrp" type="text" placeholder="Value/MSRP" name="fMsrp" value="{$db_allautomotive[0].fMsrp}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label>Upload main display image :</label></td>
											</tr>
											<tr>
												<td><div>
														<input type="file" name="vVehicleImage" id="vVehicleImage" value="{$db_allautomotive[0].vVehicleImage}" onchange="CheckValidFile(this.value,this.name)"/>
														{if $db_allautomotive[0].vVehicleImage neq ''}
														<div class="viewimage"><a href="#view1" id="test"><img src="{{$tconfig["front_images"]}}view.png"/></a></div>
													</div>
													<div style="display:none;">
														<div id="view1">
															<div>
																<div> <img src="{$tconfig["tsite_upload_images_store"]}/3/{$db_allautomotive[0].iProductId}/{$db_allautomotive[0].vVehicleImage}"/> </div>
															</div>
														</div>
													</div>
													{/if} </td>
											</tr>
										</table></td>
									<td valign="top"><table>
											<tr>
												<td><label>Doors :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vDoors" type="text" placeholder="Doors" name="vDoors" value="{$db_allautomotive[0].vDoors}" onkeypress="return checknum(event);"></td>
											</tr>
											<tr>
												<td><label>Exterior Color :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vExteriorColor" type="text" placeholder="Exterior Color" name="vExteriorColor" value="{$db_allautomotive[0].vExteriorColor}" ></td>
											</tr>
											<tr>
												<td><label>Interior Color :</label></td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vInteriorColor" type="text" placeholder="Interior Color" name="vInteriorColor" value="{$db_allautomotive[0].vInteriorColor}" ></td>
											</tr>
											<tr>
												<td><label>Mileage :</label>
												</td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="iMileage" type="text" placeholder="Mileage" name="iMileage" value="{$db_allautomotive[0].iMileage}" onkeypress="return checknum(event);">
												</td>
											</tr>
											<tr>
												<td><label>VIN :</label>
												</td>
											</tr>
											<tr>
												<td  class="Photo_title"><input id="vVin" type="text" placeholder="VIN" name="vVin" value="{$db_allautomotive[0].vVin}" >
												</td>
											</tr>
											<tr>
												<td>&nbsp;</td>
											</tr>
										</table></td>
								</tr>
							</table>
							<div class="AddneweventTitle">Vehicle Safety and Security</div>
							<div class="entertainment_checkbox">
								{section name=j loop=$db_vehicle_safety_security}
								<div class="my_pro_rept_checkbox">
									<input type="checkbox" id="iVehicleSafetyId[]" name="iVehicleSafetyId[]" value="{$db_vehicle_safety_security[j].iVehicleSafetyId}" {if $db_vehicle_safety_security[j].iVehicleSafetyId|@in_array:$safetyArr} checked="checked"{/if} />
									{$db_vehicle_safety_security[j].vVehicleSafety} </div>
								{/section}
								<div class="cl"></div>
							</div>
							<div class="AddneweventTitle">Comfort and Convenience</div>
							<div class="entertainment_checkbox">
								{section name=j loop=$db_vehicle_comfort_convenience}
								<div class="my_pro_rept_checkbox">
									<input type="checkbox" id="iVehicleComfortId[]" name="iVehicleComfortId[]" value="{$db_vehicle_comfort_convenience[j].iVehicleComfortId}" {if $db_vehicle_comfort_convenience[j].iVehicleComfortId|@in_array:$comfortArr} checked="checked"{/if} />
									{$db_vehicle_comfort_convenience[j].vVehicleComfort} </div>
								{/section}
								<div class="cl"></div>
							</div>
							<div class="AddneweventTitle">Audio and Entertainment</div>
							<div class="entertainment_checkbox"> {section name=j loop=$db_vehicle_audio_entertainment}
								{if $smarty.section.j.index % 3 == 0 && $smarty.section.j.index neq 0}
								{/if}
								<div class="my_pro_rept_checkbox">
									<input type="checkbox" id="iVehicleaudioId[]" name="iVehicleaudioId[]" value="{$db_vehicle_audio_entertainment[j].iVehicleaudioId}" {if $db_vehicle_audio_entertainment[j].iVehicleaudioId|@in_array:$audioArr} checked="checked"{/if} />
									{$db_vehicle_audio_entertainment[j].vVehicleAudio} </div>
								{/section}
								<div class="cl"></div>
							</div>
							<div class="AddneweventTitle">Mechanical and Accessories</div>
							<div class="entertainment_checkbox"> {section name=j loop=$db_vehicle_mechanical_accessaries}
								{if $smarty.section.j.index % 3 == 0 && $smarty.section.j.index neq 0}
								{/if}
								<div class="my_pro_rept_checkbox">
									<input type="checkbox" id="iVehicleMechanicalId[]" name="iVehicleMechanicalId[]" value="{$db_vehicle_mechanical_accessaries[j].iVehicleMechanicalId}" {if $db_vehicle_mechanical_accessaries[j].iVehicleMechanicalId|@in_array:$mechanicArr} checked="checked"{/if} />
									{$db_vehicle_mechanical_accessaries[j].vVehicleMechanical} </div>
								{/section}
								<div class="cl"></div>
							</div>
							<div class="AddneweventTitle">Vehicle's Condition and History</div>
							<div class="entertainment_checkbox"> {section name=j loop=$db_vehicle_condition_history}
								{if $smarty.section.j.index % 4 == 0 && $smarty.section.j.index neq 0}
								{/if}
								<div class="my_pro_rept_checkbox">
									<input type="checkbox" id="iVehicleConditionId[]" name="iVehicleConditionId[]" value="{$db_vehicle_condition_history[j].iVehicleConditionId}" {if $db_vehicle_condition_history[j].iVehicleConditionId|@in_array:$conditionArr} checked="checked"{/if} />
									{$db_vehicle_condition_history[j].vVehicleCondition} </div>
								{/section}
								<div class="cl"></div>
							</div>
							<div class="AddneweventTitle">Comments / Description</div>
							<div class="comment_dis_box">
								<table>
									<tr>
										<td><label> Comments and Description:</label></td>
									</tr>
									<tr>
										<td  class="Photo_title"><textarea id="tDescription" type="text" placeholder="Comments and Description" name="tDescription" style="width:450px;height:100px">{$db_allautomotive[0].tDescription}</textarea></td>
									</tr>
									<tr>
										<td><label> External Link for More Details/Book Value/Images/Vedio:</label></td>
									</tr>
									<tr>
										<td  class="Photo_title"><textarea id="vExternalLink" type="text" placeholder="External Link for More Details/Book Value/Images/Vedio" name="vExternalLink" style="width:450px;height:30px">{$db_allautomotive[0].vExternalLink}</textarea></td>
									</tr>
								</table>
							</div>
							<div class="AddneweventTitle">Image Gallery</div>
							<div class="gallery_img">
								<div>
									
									<!--<label for="textfield" style="padding:5px;"><strong>More Image :</strong></label>-->
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
										
										{section name=i loop=$db_automotive_gallery}
										<div id="TextBoxDiv{$smarty.section.i.index}">
											<input type="hidden" name="vOldGall[]" id="vOldGall" value="{$db_automotive_gallery[i].vGalImage}">
											<input type="hidden" name="iGalleryId[]" id="iGalleryId" value="{$db_automotive_gallery[i].iGalleryId}">
											<table width="85%%" border="0" cellspacing="0" cellpadding="0">
												<tr>
													<td width="1%" valign="top"><input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
														{if $db_automotive_gallery[0].vGalImage neq ''} </br>
														
														<a href="#galdis{$smarty.section.i.index}" style="margin-left:5px;" id="popgal{$smarty.section.i.index}"><img src="{{$tconfig["front_images"]}}view.png"/></a>
														<div style="display:none;">
															<div id="galdis{$smarty.section.i.index}">
																<div>
																	<div><img src="{$tconfig["tsite_upload_images_store"]}/3/{$db_automotive_gallery[i].iProductId}/{$db_automotive_gallery[i].vGalImage}"></div>
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
							<div class="AddneweventTitle">Seller's Contact Information</div>
							<div class="seller_info">
								<table>
									<tr>
										<td><table>
												<tr>
													<td><label>City Name :</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vCity" type="text" placeholder="City Name" name="vCity" value="{$db_allautomotive[0].vCity}" >
													</td>
												</tr>
												<tr>
													<td><label>Contact Name :</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vContactName" type="text" placeholder="Contact Name" name="vContactName" value="{$db_allautomotive[0].vContactName}" ></td>
												</tr>
												<tr>
													<td><label>Seller's Contact Number :</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vSellerNumber" type="text" placeholder="Contact Number" name="vSellerNumber" value="{$db_allautomotive[0].vSellerNumber}" onkeypress="return checknum(event);"></td>
												</tr>
												<tr>
													<td><label>Seller's Contact Email :</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vSellerEmail" type="text" placeholder="Seller Email" name="vSellerEmail" value="{$db_allautomotive[0].vSellerEmail}"  ></td>
												</tr>

												<tr>
													<td><label>Dealership Name :</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vDealershipName" type="text" placeholder="Dealership Name" name="vDealershipName" value="{$db_allautomotive[0].vDealershipName}" ></td>
												</tr>
											</table>
										</td>
										<td>
											<table>
												<tr>
													<td><label> Dealership Address:</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><textarea id="vDealershipAddress" type="text" placeholder="Dealership Address" name="vDealershipAddress" style="width:310px;height:100px">{$db_allautomotive[0].vDealershipAddress}</textarea>
													</td>
												</tr>
												<tr>
													<td><label>Dealership Number:</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vDealerNumber" type="text" placeholder="Dealership Number" name="vDealerNumber" value="{$db_allautomotive[0].vDealerNumber}" onkeypress="return checknum(event);"></td>
												</tr>
												<tr>
													<td><label>Dealership Contact Email:</label></td>
												</tr>
												<tr>
													<td  class="Photo_title"><input id="vDealerEmail" type="text" placeholder="Dealer Email" name="vDealerEmail" value="{$db_allautomotive[0].vDealerEmail}" ></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</form>
					<div class="submitbutton_my_product">
						<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return createproduct();"/>
						<a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}cancle.png"/></a> </div>
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
	
    
    if($('#vType')){
		if($('#vType').val() ==''){
			$('#divContactid').html("Please enter Type").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#iYear')){
		if($('#iYear').val() ==''){
			$('#divContactid').html("Please enter Year").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#make')){
		if($('#make').val() ==''){
			$('#divContactid').html("Please enter Make").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#model')){
		if($('#model').val() ==''){
			$('#divContactid').html("Please enter Model").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#fPrice')){
		if($('#fPrice').val() ==''){
			$('#divContactid').html("Please enter Price").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#fMsrp')){
		if($('#fMsrp').val() ==''){
			$('#divContactid').html("Please enter Value/MSRP").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#iMileage')){
		if($('#iMileage').val() ==''){
			$('#divContactid').html("Please enter Mileage").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vVin')){
		if($('#vVin').val() ==''){
			$('#divContactid').html("Please enter VIN").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vTransmission')){
		if($('#vTransmission').val() ==''){
			$('#divContactid').html("Please enter Transmission").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vBodyStyle')){
		if($('#vBodyStyle').val() ==''){
			$('#divContactid').html("Please enter Body Style").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vEngineType')){
		if($('#vEngineType').val() ==''){
			$('#divContactid').html("Please enter Engine Type").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vFuelType')){
		if($('#vFuelType').val() ==''){
			$('#divContactid').html("Please enter Fuel Type").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vDriveTrain')){
		if($('#vDriveTrain').val() ==''){
			$('#divContactid').html("Please enter Drive Train").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vDoors')){
		if($('#vDoors').val() ==''){
			$('#divContactid').html("Please enter Doors").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vExteriorColor')){
		if($('#vExteriorColor').val() ==''){
			$('#divContactid').html("Please enter Exterior Color").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
    if($('#vInteriorColor')){
		if($('#vInteriorColor').val() ==''){
			$('#divContactid').html("Please enter Interior Color").addClass('errormsg').fadeTo(900,1);
			return false;           
		}
         
	}
    if($('#vSellerEmail')){
	   
		    if($('#vSellerEmail').val() ==''){
			 if($('#divContactid')){
				$('#divContactid').html("Please Enter Seller Email").addClass('errormsg').fadeTo(900,1);
				return false;
			  }
		   }else{
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			 var valid = emailRegex.test($('#vSellerEmail').val());
			  if (!valid) {
				if($('#divContactid')){
					$('#divContactid').html("Invalid e-mail address").addClass('errormsg').fadeTo(900,1);
					return false;
				}else{
					return true;
				}
			}
			
			
		 }
	  }
      if($('#vDealerEmail')){
	   
		    if($('#vDealerEmail').val() ==''){
			 if($('#divContactid')){
				$('#divContactid').html("Please Enter Dealer Email").addClass('errormsg').fadeTo(900,1);
				return false;
			  }
		   }else{
			var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
			 var valid = emailRegex.test($('#vDealerEmail').val());
			  if (!valid) {
				if($('#divContactid')){
					$('#divContactid').html("Invalid E-mail address").addClass('errormsg').fadeTo(900,1);
					return false;
				}else{
					return true;
				}
			}
			
			
		 }
	  }	  
    	
	$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$('#addauto').hide();
	$('#addauto_loading').show();
	$("#frmAddProduct").ajaxForm({
		target: '#divContactid',
		success: finish
		}).submit();
	document.body.scrollTop = 100;
}
function finish()
{
	window.location='{/literal}{$site_url}{literal}'+'/myproducts/3';
}
function checknum(events)
{

	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if( ((unicodes>45 && unicodes<58) || unicodes == 39 || unicodes == 37  || unicodes == 9 || unicodes == 110 || unicodes == 45 || unicodes == 43)){
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
<script type="text/javascript">
getId('{/literal}{$db_allautomotive[0].make}{literal}');
function getId(id){
	
	if($('#mode').val() == 'edit'){
		var makeId = id;
		getMake(makeId);
	}
	
}
function getMake(makeId)
{
	var extra ='';
	extra+='&makeId='+makeId;
        if($('#selectedmodel').val() !=''){
            
         var selectedmodel = $('#selectedmodel').val();
         extra+='&selectedmodel='+selectedmodel;   
        }

	var url = site_url+"/index.php?file=a-ajmodellist";
	var pars = extra;
//alert(url+pars);
	$.post(url+pars,
            function(data) {
	
		if($('.showallmodels')){
			$('.showallmodels').html(data);
		}
	});
}

</script>
{/literal} 
