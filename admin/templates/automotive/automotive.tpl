
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=at-automotive&mode=view">Automotive</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Automotive{else}Edit Automotive{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs"  >
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Automotive</h2>
		{else}
		
		<h2 class="left">Edit Automotive</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1" style="padding:20px;">

              <form id="frmadd" name="frmadd" action="index.php?file=at-automotive_a" enctype="multipart/form-data" method="post">
        
          			<input type="hidden" name="iProductId" id="iProductId" value="{$db_automotive[0].iProductId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_automotive[0].vVehicleImage}" />
                <input type="hidden" name="selectedmodel" id="selectedmodel" value="{$db_automotive[0].model}"/>
                <input type="hidden" name="selectedstore" id="selectedstore" value="{$db_automotive[0].iStoreId}"/>
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div class="container top " style="padding:20px;">
					<div class="conthead">
						<h2>Basic Vehicle Information</h2>
					</div>
                    
		    	<div style="float:left; padding:2px; width:450px;">
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select  style="width:220px;" id="iMemberId" name="Data[iMemberId]"  title="Member" lang="*" onchange="getMember(this.value);" >
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_Automember}
						<option value='{$db_Automember[i].iMemberId}' {if $db_Automember[i].iMemberId eq $db_automotive[0].iMemberId}selected{/if}>{$db_Automember[i].vName}</option>
						{/section}
					</select>
					 
				</div>
				<!-- <div class="inputboxes">
					<label for="textfield"><strong>Store Name:</strong></label>
					<div class="showallstores">
					<select id="iStoreId" name="Data[iStoreId]" title="Store Name"  lang="*" style="width:220px;" >
						<option value=''>--Select Store Name--</option>                   
					</select>
					 </div>
                </div>-->					                
				<div class="inputboxes">
					<label for="textfield"><strong>Type:</strong></label>
					<select id="vType" name="Data[vType]" lang="*" title="Type" style="width:220px;">
                    {if $mode eq add}                                 
                    <option value=''> - Select Type - </option>                    
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                    <option value="Rebuildable">Rebuildable</option>
                    <option value="Salvaged">Salvaged</option>                                                          
                    {else}

                     {section name=i loop=$db_automotive}                               
                    <option value=''> - Select Type - </option>                    
                    <option value="New" {if $db_automotive[0].vType eq "New"}selected="selected"{/if}>New</option>
                    <option value="Used" {if $db_automotive[0].vType eq "Used"}selected="selected"{/if}>Used</option>
                    <option value="Rebuildable" {if $db_automotive[0].vType eq "Rebuildable"}selected="selected"{/if}>Rebuildable</option>
                    <option value="Salvaged" {if $db_automotive[0].vType eq "Salvaged"}selected="selected"{/if}>Salvaged</option>                                                          
                   {/section}
                    {/if}

					</select>                    
				</div>
                
                <div class="inputboxes">
				<label for="textfield"><strong>Year:</strong></label>
                <select id="iYear" name="Data[iYear]" lang="*" title="Year" style="width:220px;">			
		        <option value=''> - Select Year - </option>
		        {section name=yr start=1950 loop=2021 step=1}
		        <option value="{$smarty.section.yr.index}" {if $smarty.section.yr.index eq $db_automotive[0].iYear}selected{/if}>{$smarty.section.yr.index}</option>
		        {/section}
	            </select>
				</div>
                

				
                <div class="inputboxes">
					<label for="textfield"><strong>Make:</strong></label>
					<select id="iMakeId" name="Data[make]"  title="Make" lang="*" onchange="getMake(this.value);" style="width:220px;">
						<option value=''>--Select Make--</option>
						{section name=i loop=$db_automake}
						<option value='{$db_automake[i].vMake}' {if $db_automake[i].vMake eq $db_automotive[0].make}selected{/if}>{$db_automake[i].vMake}</option>
						{/section}
					</select>
					 
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>Model:</strong></label>
					<div class="showallmodels">
					<select id="model" name="Data[model]"   title="Model"  lang="*" style="width:220px;" >
						<option value=''>--Select Model--</option>                   
					</select>
					 </div>
                </div>
				<div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="{$db_automotive[0].fPrice}" onkeypress="return checkprice(event);" lang="*" title="Price" maxlength="12"/>
				</div>				 
                <div class="inputboxes">
					<label for="textfield"><strong>Value/MSRP:</strong></label>
					<input type="text" id="fMsrp" name="Data[fMsrp]" class="inputbox" value="{$db_automotive[0].fMsrp}" onkeypress="return checkprice(event);" lang="*" title="Value/MSRP" maxlength="12"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Mileage:</strong></label>
					<input type="text" id="iMileage" name="Data[iMileage]" class="inputbox" value="{$db_automotive[0].iMileage}" onkeypress="return checkprice(event);" lang="*" title="Mileage"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>VIN:</strong></label>
					<input type="text" id="vVin" name="Data[vVin]" class="inputbox" value="{$db_automotive[0].vVin}"  lang="*" title="VIN" />
				</div>
                
		
	</div>
	<div style="float:left; padding:2px; width:450px;">               
	       
                <div class="inputboxes">
					<label for="textfield"><strong>Transmission:</strong></label>
					<select id="vTransmission" name="Data[vTransmission]" lang="*" title="Transmission" style="width:220px;">
                    {if $mode eq add}                                 
                    <option value=''> - Select Transmission - </option>                    
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>                                                                              
                    {else}                                          
                    {section name=i loop=$db_automotive}                 
                    <option value=''> - Select Transmission - </option>                    
                    <option value="Automatic" {if $db_automotive[0].vTransmission eq "Automatic"}selected="selected"{/if}>Automatic</option>
                    <option value="Manual" {if $db_automotive[0].vTransmission eq "Manual"}selected="selected"{/if}>Manual</option>                                                                             
                    {/section}
                    {/if}                   
					</select>                    
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Body Style:</strong></label>
					<select id="vBodyStyle" name="Data[vBodyStyle]" lang="*" title="Body Style" style="width:220px;">
                    {if $mode eq add}                                 
                    <option value=''> - Select Body Style - </option>                    
                    <option value="Convertable">Convertable</option>
                    <option value="Coupe">Coupe</option>                                       
                    <option value="Hatchback">Hatchback</option>
                    <option value="Salvaged">Salvaged</option>                                      
                    <option value="Sedan">Sedan</option>
                    <option value="Sports Utility">Sports Utility</option>
                    <option value="Truck">Truck</option>
                    <option value="Van">Van</option>
                    <option value="Wagon">Wagon</option>                                                                                
                    {else}   
                     {section name=i loop=$db_automotive}                 
                    <option value=''> - Select Body Style - </option>                    
                    <option value="Convertable" {if $db_automotive[0].vBodyStyle eq "Convertable"}selected="selected"{/if}>Convertable</option>
                    <option value="Coupe" {if $db_automotive[0].vBodyStyle eq "Coupe"}selected="selected"{/if}>Coupe</option>
                    <option value="Hatchback" {if $db_automotive[0].vBodyStyle eq "Hatchback"}selected="selected"{/if}>Hatchback</option>
                    <option value="Salvaged" {if $db_automotive[0].vBodyStyle eq "Salvaged"}selected="selected"{/if}>Salvaged</option>                                                           
                    <option value="Sedan" {if $db_automotive[0].vBodyStyle eq "Sedan"}selected="selected"{/if}>Sedan</option>
                    <option value="Sports Utility" {if $db_automotive[0].vBodyStyle eq "Sports Utility"}selected="selected"{/if}>Sports Utility</option>
                    <option value="Truck" {if $db_automotive[0].vBodyStyle eq "Truck"}selected="selected"{/if}>Truck</option>
                    <option value="Van" {if $db_automotive[0].vBodyStyle eq "Van"}selected="selected"{/if}>Van</option>
                    <option value="Wagon" {if $db_automotive[0].vBodyStyle eq "Wagon"}selected="selected"{/if}>Wagon</option>                                                                                                                                                            
                    {/section}
                     {/if}                          
					</select>                    
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Engine Type:</strong></label>
					<input type="text" id="vEngineType" name="Data[vEngineType]" class="inputbox" value="{$db_automotive[0].vEngineType}"  lang="*" title="Engine Type" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Fuel Type:</strong></label>
					<input type="text" id="vFuelType" name="Data[vFuelType]" class="inputbox" value="{$db_automotive[0].vFuelType}"  lang="*" title="Fuel Type" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Drive Train:</strong></label>
					<input type="text" id="vDriveTrain" name="Data[vDriveTrain]" class="inputbox" value="{$db_automotive[0].vDriveTrain}"  lang="*" title="Drive Train" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Doors:</strong></label>
					<input type="text" id="vDoors" name="Data[vDoors]" class="inputbox" value="{$db_automotive[0].vDoors}"  lang="*" title="Doors" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Exterior Color:</strong></label>
					<input type="text" id="vExteriorColor" name="Data[vExteriorColor]" class="inputbox" value="{$db_automotive[0].vExteriorColor}"  lang="*" title="Exterior Color" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Interior Color:</strong></label>
					<input type="text" id="vInteriorColor" name="Data[vInteriorColor]" class="inputbox" value="{$db_automotive[0].vInteriorColor}" lang="*" title="Interior Color" />
				</div>
                
                <div class="inputboxes">
					<label for="textfield" ><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" {if $db_automotive[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_automotive[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>                    				
                </div>
	</div>
	<div style="clear:both;"></div>
                </div>
        
                <div class="container top " style="padding:15px;">
					<div class="conthead" >
						<h2 >Vehicle Options and History</h2>                       
					</div>
                    <div class="inputboxes">
                        <label for="textfield" style="width:300px;"><strong>Vehicle Safety and Security</strong></label><br /><br />                       
                            <hr />                        
				            <div style="width:170px; float:left; padding:5px;" >
                            {section name=j loop=$db_vehicle_safety_security}
					        {if $smarty.section.j.index % 6 == 0 && $smarty.section.j.index neq 0}
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          {/if}
					       <input type="checkbox" id="iVehicleSafetyId[]" name="iVehicleSafetyId[]" value="{$db_vehicle_safety_security[j].iVehicleSafetyId}" {if $db_vehicle_safety_security[j].iVehicleSafetyId|@in_array:$safetyArr} checked="checked"{/if} />{$db_vehicle_safety_security[j].vVehicleSafety}<br />
				            {/section}                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong>Comfort and Convenience</strong></label><br /><br />                       
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                            {section name=j loop=$db_vehicle_comfort_convenience}
					        {if $smarty.section.j.index % 10 == 0 && $smarty.section.j.index neq 0}
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          {/if}
					       <input type="checkbox" id="iVehicleComfortId[]" name="iVehicleComfortId[]" value="{$db_vehicle_comfort_convenience[j].iVehicleComfortId}" {if $db_vehicle_comfort_convenience[j].iVehicleComfortId|@in_array:$comfortArr} checked="checked"{/if} />{$db_vehicle_comfort_convenience[j].vVehicleComfort}<br />
				            {/section}                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong>Audio and Entertainment</strong></label><br /><br />                        
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                                        {section name=j loop=$db_vehicle_audio_entertainment}
					        {if $smarty.section.j.index % 3 == 0&& $smarty.section.j.index neq 0}
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          {/if}
					       <input type="checkbox" id="iVehicleaudioId[]" name="iVehicleaudioId[]" value="{$db_vehicle_audio_entertainment[j].iVehicleaudioId}" {if $db_vehicle_audio_entertainment[j].iVehicleaudioId|@in_array:$audioArr} checked="checked"{/if} />{$db_vehicle_audio_entertainment[j].vVehicleAudio}<br />
				            {/section}                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong>Mechanical and Accessories</strong></label><br /><br />                       
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                            {section name=j loop=$db_vehicle_mechanical_accessaries}
					        {if $smarty.section.j.index % 3 == 0&& $smarty.section.j.index neq 0}
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          {/if}
					       <input type="checkbox" id="iVehicleMechanicalId[]" name="iVehicleMechanicalId[]" value="{$db_vehicle_mechanical_accessaries[j].iVehicleMechanicalId}" {if $db_vehicle_mechanical_accessaries[j].iVehicleMechanicalId|@in_array:$mechanicArr} checked="checked"{/if} />{$db_vehicle_mechanical_accessaries[j].vVehicleMechanical}<br />
				            {/section}                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong >Vehicle's Condition and History</strong></label><br /><br />                        
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                            {section name=j loop=$db_vehicle_condition_history}
					        {if $smarty.section.j.index % 4 == 0&& $smarty.section.j.index neq 0}
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          {/if}
					       <input type="checkbox" id="iVehicleConditionId[]" name="iVehicleConditionId[]" value="{$db_vehicle_condition_history[j].iVehicleConditionId}" {if $db_vehicle_condition_history[j].iVehicleConditionId|@in_array:$conditionArr} checked="checked"{/if} />{$db_vehicle_condition_history[j].vVehicleCondition}<br />
				            {/section}                                                            
			            	</div>
                    	</div>
                        
                        </div>
                        <div class="container" style="padding:15px;">
					       <div class="conthead">
						   <h2>Comments/Description</h2>                       
					       </div>
                           <div class="inputboxes">
							<label for="textarea" style="width:500px;"><strong>Maximum 2500 Characters for Comments/Desc</strong></label><br />                            
							<textarea rows="6" cols="90" id="tDescription" name="Data[tDescription]" class="inputbox"  lang="*" title="Comments/Description" maxlength="2500">{$db_automotive[0].tDescription}</textarea>
						    </div> 
                            <div class="inputboxes">
					         <label for="textfield" style="width:500px;"><strong>External Link for More Details/Book Value/Images/Vedio:</strong></label><br /><br />
					        <input type="text" id="vExternalLink" name="Data[vExternalLink]" class="inputbox" value="{$db_automotive[0].vExternalLink}"  lang="*" title="External Link" size="92" />
				            </div>                                                    
                    	</div>
                        <div class="container" style="padding:15px;">					       
                           
					<div class="inputboxes" >
					<label for="textfield" ><strong>Upload Image:</strong></label>
					{if $db_automotive[0].vVehicleImage eq ''}
					<input type="file" id="vVehicleImage" name="vVehicleImage" class="inputbox" value="{$db_automotive[0].vVehicleImage}"  title="Vehicle Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{else}
					<input type="file" id="vVehicleImage" name="vVehicleImage" class="inputbox" value="{$db_automotive[0].vVehicleImage}"  title="Vehicle Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{/if}
			
					{if $db_automotive[0].vVehicleImage neq ''}
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin-left:120px;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_store"]}/3/{$db_automotive[0].iProductId}/{$db_automotive[0].vVehicleImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div><br /><br />
				
                                               			               
			<td width="50%" >
            <div style="border:#747474 solid 1px; padding:12px 20px; width:400px;position:relative;">
            
            <div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8;padding:0 3px;">More Image</div>			              
			<!--<label for="textfield" style="padding:5px;"><strong>More Image :</strong></label>-->
			<input  type="hidden" id="totcount" name="totcount" value="{$totgal}"/>
			<div id="TextBoxesGroup">
				{if $mode eq 'add'}
				
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
							<td width="1%" valign="top">
								<input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
								{if $db_automotive_gallery[0].vGalImage neq ''}
								</br>
									<a href="#galdis{$smarty.section.i.index}" style="margin-left:5px;" id="popgal{$smarty.section.i.index}"><img src="{{$tconfig["tsite_images"]}}view.png"/></a>
                                    
									<div style="display:none;">
									<div id="galdis{$smarty.section.i.index}">
										<div class="popup_box">
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
								{/if}
							</td>
							{if $smarty.section.i.index eq 0}
							<td width="20%" valign="top"><input type="button" class="btn" style="padding:3px 15px;" name="Add" id="addButton" value="Add"></td>
							{else}
							<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:2px 2px;" name="Remove" id="remove" value="Remove" onclick="deleterow({$smarty.section.i.index});">
							</td>
							{/if}
							
						</tr>
						</table>	
					</div>
					{/section}
				{/if}
			</div>	
			</div>
                </div>
                <div class="container" style="padding:15px;">
					       <div class="conthead">
						   <h2>Seller's Contact Information</h2>                       
					       </div>
                           <div class="inputboxes">
					         <br /><label for="textfield" ><strong>Your City Name:</strong></label>
					        <input type="text" id="vCity" name="Data[vCity]" class="inputbox" value="{$db_automotive[0].vCity}"  lang="*" title="City Name" />
				            </div>
                            <div class="inputboxes">
					         <br /><label for="textfield" ><strong>Contact Name:</strong></label>
					        <input type="text" id="vContactName" name="Data[vContactName]" class="inputbox" value="{$db_automotive[0].vContactName}"  lang="*" title="Contact Name" />
				            </div> 
                             <div class="inputboxes">
					         <br /><label for="textfield"><strong>Dealership Name:</strong></label>
					        <input type="text" id="vDealershipName" name="Data[vDealershipName]" class="inputbox" value="{$db_automotive[0].vDealershipName}"  lang="*" title="Dealership Name" />
				            </div> 
                            <div class="inputboxes">
							<label for="textarea"><strong>Dealership Address</strong></label>                           
							<textarea rows="4" cols="30" id="vDealershipAddress" name="Data[vDealershipAddress]" class="inputbox"  lang="*" title="Dealership Address">{$db_automotive[0].vDealershipAddress}</textarea>
						    </div>
                            <div class="inputboxes">
					        <label for="textfield"><strong>Dealership Number:</strong></label>
					        <input type="text" id="vDealerNumber" name="Data[vDealerNumber]" class="inputbox" value="{$db_automotive[0].vDealerNumber}" onkeypress="return checkprice(event);" lang="*" title="Dealership Number" maxlength="12"/>
				            </div>
                             
                           </div>
                         </div>
                          <div style="padding:0 20px 20px 20px;">
               			     {if $mode eq add}
   				           <input type="submit" value="Add Product" class="btn" onclick="return validate(document.frmadd);" title="Add Product" style="margin-left:157px;"/> 
   				             {else}
   				            <input type="submit" value="Edit Product" class="btn" onclick="return validate(document.frmadd);" title="Edit Product" style="margin-left:157px;"/>
   				             {/if}
				             <input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		                 </div>    
                             </form>	              
                 </div>
        	     </div>
{literal}
<script type="text/javascript">
getId('{/literal}{$db_automotive[0].make}{literal}');
function getId(id){
	
	if($('#action').val() == 'edit'){
		var makeId = id;
		getMake(makeId);
	}
	
}
function getMake(makeId)
{
	//alert(makeId);
	var extra ='';
	extra+='&makeId='+makeId;
	if($('#selectedmodel')){
        if($('#selectedmodel').val() !=''){
         var selectedmodel = $('#selectedmodel').val();
         extra+='&selectedmodel='+selectedmodel;   
        }
        
	}

	var url = admin_url+"/index.php?file=at-ajmakelist";
	var pars = extra;

	$.post(url+pars,
            function(data) {
	
		if($('.showallmodels')){
			$('.showallmodels').html(data);
		}
	});
}

function checkprice(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	//alert(unicodes);
	if (unicodes!=8)
	{ //backspace

	        if (unicodes>47 && unicodes<58){
	            return true;
		}else{
			return false;
		}
	}
}
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'at-automotive';
    window.location=admin_url+"/index.php?file=at-automotive&mode=view";
    return false;
}

</script>
<script>
getId('{/literal}{$db_automotive[0].iMemberId}{literal}');
function getId(id){
	
	if($('#action').val() == 'edit'){
		var memberId = id;
		getMember(memberId);
	}
	
}

function getMember(memberId)
{
	//alert(makeId);
	var extra ='';
	extra+='&memberId='+memberId;
	if($('#selectedstore')){
        if($('#selectedstore').val() !=''){
         var selectedstore = $('#selectedstore').val();
         extra+='&selectedstore='+selectedstore;   
        }
        
	}

	var url = admin_url+"/index.php?file=at-ajmemberlist";
	var pars = extra;

	$.post(url+pars,
            function(data) {
	
		if($('.showallstores')){
			$('.showallstores').html(data);
		}
	});
}
</script>
<script>
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
		html +='<td width="40%"><input type="button" name="Remove" class="btnalt" style="padding:2px 2px;" id="remove" value="Remove" onclick="deleterow('+counter+');"></td>';
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
function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}


</script>
<script type="text/javascript">
	CKEDITOR.replace( 'tText' );
</script>
{/literal}


