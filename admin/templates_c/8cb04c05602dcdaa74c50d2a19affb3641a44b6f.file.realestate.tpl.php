<?php /* Smarty version Smarty-3.0.7, created on 2012-11-27 20:41:29
         compiled from "/var/www/qme/admin/templates/realestate/realestate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152456398850b4d8217f3971-80752385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cb04c05602dcdaa74c50d2a19affb3641a44b6f' => 
    array (
      0 => '/var/www/qme/admin/templates/realestate/realestate.tpl',
      1 => 1354028692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152456398850b4d8217f3971-80752385',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=re-realestate&mode=view">Real Estate</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Real Estate<?php }else{ ?>Edit Real Estate<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs"  >
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Real Estate</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Real Estate</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1" style="padding:15px;">

              <form id="frmadd" name="frmadd" action="index.php?file=re-realestate_a" enctype="multipart/form-data" method="post">

                <input type="hidden" name="iProductId" id="iProductId" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iProductId'];?>
" />
                    
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vImage'];?>
" />
                 <input type="hidden" name="selectedstate" id="selectedstate" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vState'];?>
"/>
                 <input type="hidden" name="selectedstore" id="selectedstore" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iStoreId'];?>
"/>
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<div class="container top " style="padding:20px;">
					<div class="conthead">
						<h2>Property Information</h2>
					</div>
                    
		    	<div style="float:left; padding:2px; width:450px;">
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select  style="width:220px;" id="iMemberId" name="Data[iMemberId]"  title="Member" lang="*" onchange="getMember(this.value);" >
						<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_Realmember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
						<option value='<?php echo $_smarty_tpl->getVariable('db_Realmember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_Realmember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_realestate')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_Realmember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
						<?php endfor; endif; ?>
					</select>
					 
				</div>
				 <!--<div class="inputboxes">
					<label for="textfield"><strong>Store Name:</strong></label>
					<div class="showallstores">
					<select id="iStoreId" name="Data[iStoreId]" title="Store Name"  lang="*" style="width:220px;" >
						<option value=''>--Select Store Name--</option>                   
					</select>
					 </div>	
                     </div>-->			                
				<div class="inputboxes">
					<label for="textfield"><strong>Property Type:</strong></label>
					<select id="iPropertyTypeId" name="Data[iPropertyTypeId]" lang="*" style="width:220px;" title="Property Type">                                                     
                    <option value=''> - Select Property Type - </option>
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_real_estate_property')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>                    
                     <option value='<?php echo $_smarty_tpl->getVariable('db_real_estate_property')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPropertyTypeId'];?>
' <?php if ($_smarty_tpl->getVariable('db_real_estate_property')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iPropertyTypeId']==$_smarty_tpl->getVariable('db_realestate')->value[0]['iPropertyTypeId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_real_estate_property')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vPropertyType'];?>
</option>                                                                                               
                    <?php endfor; endif; ?>                    
					</select>                    
				</div>                                                				             
				<div class="inputboxes">
					<label for="textfield"><strong>Asking Price:</strong></label>
					<input type="text" id="fAskingPrice" name="Data[fAskingPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['fAskingPrice'];?>
" onkeypress="return checkprice(event);" lang="*" title="Asking Price" maxlength="12"/>
				</div>				 
                <div class="inputboxes">
					<label for="textfield"><strong>Bedrooms:</strong></label>
					<input type="text" id="iBedrooms" name="Data[iBedrooms]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iBedrooms'];?>
" onkeypress="return checkprice(event);" lang="*" title="Bedrooms" maxlength="12"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Bathrooms:</strong></label>
					<input type="text" id="iBaths" name="Data[iBaths]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iBaths'];?>
" onkeypress="return checkprice(event);" lang="*" title="Bathrooms" maxlength="12"/>
				</div>
		         <div class="inputboxes">
					<label for="textfield"><strong>Sqft:</strong></label>
					<input type="text" id="fSqft" name="Data[fSqft]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['fSqft'];?>
" onkeypress="return checkprice(event);" lang="*" title="Sqft" maxlength="12"/>
				</div>
                
	</div>
	<div style="float:left; padding:2px; width:450px;"> 
    
                <div class="inputboxes">
					<label for="textfield"><strong>Lot Size:</strong></label>
					<input type="text" id="fLotSize" name="Data[fLotSize]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['fLotSize'];?>
" onkeypress="return checkprice(event);" lang="*" title="Lot Size" maxlength="12"/>
				</div>
                                   	                      				                                  
                <div class="inputboxes">
							<label for="textarea" ><strong>Street Address:</strong></label>                           
							<textarea rows="3" cols="18" id="vStreetAddress" name="Data[vStreetAddress]" class="inputbox"  lang="*" title="Street Address" maxlength="100"><?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vStreetAddress'];?>
</textarea>
						    <!--<textarea rows="1" cols="40" id="vStreetAddress" name="Data[vStreetAddress]" class="inputbox"  lang="*" title="Street Address" maxlength="100"><?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vStreetAddress'];?>
</textarea>-->
                            </div>
                
                
                <div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select  style="width:220px;" id="iCountryId" name="Data[vCountry]"  title="Country" lang="*" onchange="getCountry(this.value);" >
						<option value=''>--Select Country--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_realcountry')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
						<option value='<?php echo $_smarty_tpl->getVariable('db_realcountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
' <?php if ($_smarty_tpl->getVariable('db_realcountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry']==$_smarty_tpl->getVariable('db_realestate')->value[0]['vCountry']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_realcountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
						<?php endfor; endif; ?>
					</select>
					 
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div class="showallstates">
					<select id="vState" name="Data[vState]" title="State"  lang="*" style="width:220px;" >
						<option value=''>--Select State--</option>                   
					</select>
					 </div>
                </div>
                <div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vCity'];?>
"  lang="*" title="City" />
				</div>  
                <div class="inputboxes">
					<label for="textfield"><strong>Zip Code:</strong></label>
					<input type="text" id="iZipCode" name="Data[iZipCode]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iZipCode'];?>
" onkeypress="return checkprice(event);" lang="*" title="Zip Code" maxlength="12"/>
				</div>
                
                
               
	</div>
	<div style="clear:both;"></div>
                </div>
        
                <div class="container" style="padding:15px;">
					       <div class="conthead">
						   <h2>Property Description</h2>                       
					       </div>
                           <div class="inputboxes">
							<label for="textarea" style="width:138px;"><strong>Description :</strong></label><br />                            
							<textarea rows="6" cols="81" id="tDescription" name="Data[tDescription]" class="inputbox"  lang="*" title="Description" ><?php echo stripslashes($_smarty_tpl->getVariable('db_realestate')->value[0]['tDescription']);?>
</textarea>
						    </div> 
                                                                               
                    	</div>
                        
                <div class="container" style="padding:15px;">
					       <div class="conthead">
						   <h2>Account Information</h2>                       
					       </div>
                           <div style="float:left; padding:2px; width:450px;">
                           <div class="inputboxes">
					         <label for="textfield" ><strong>First Name:</strong></label>
					        <input type="text" id="vFirstName" name="Data[vFirstName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vFirstName'];?>
"  lang="*" title="First Name" />
				            </div>
                            <div class="inputboxes">
					         <label for="textfield" ><strong>Last Name:</strong></label>
					        <input type="text" id="vLastName" name="Data[vLastName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vLastName'];?>
"  lang="*" title="Last Name" />
				            </div> 
                             <div class="inputboxes">
					         <label for="textfield"><strong>Phone:</strong></label>
					        <input type="text" id="vPhone" name="Data[vPhone]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vPhone'];?>
"  lang="*" title="Phone" onkeypress="return checkprice(event);" />
				            </div> 
                            <div class="inputboxes">							
					         <label for="textfield" style="width:300px"><strong>Show my Name and Phone on My Listing </strong></label>
					        <input type="checkbox" id="eShowNamePhone" name="eShowNamePhone" value="Yes" <?php if ($_smarty_tpl->getVariable('db_realestate')->value[0]['eShowNamePhone']=='Yes'){?>checked<?php }?>>
				            </div>
                            <div class="inputboxes">
					         <label for="textfield" ><strong>Real Estate Farm:</strong></label>
					        <input type="text" id="vRealEstateFirm" name="Data[vRealEstateFirm]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vRealEstateFirm'];?>
"  lang="*" title="Real Estate Farm" />
				            </div>
                            <div class="inputboxes">
					         <label for="textfield" ><strong>Agent Name:</strong></label>
					        <input type="text" id="vAgentName" name="Data[vAgentName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vAgentName'];?>
"  lang="*" title="Agent Name" />
				            </div>
                            </div>                           
                            
                            <div class="inputboxes">
							<label for="textfield"><strong>Agent Email Address:</strong></label>
							<input type="text" id="vAgentEmail"  name="Data[vAgentEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vAgentEmail'];?>
"/>
						    </div>
                            <div class="inputboxes">
							<label for="textarea"><strong>Agent Main Contact:</strong></label>                           
							<textarea rows="4" cols="18" id="vAgentMainContact" name="Data[vAgentMainContact]" class="inputbox"  lang="*" title="Agent contact" ><?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vAgentMainContact'];?>
</textarea>
						    </div>
                            <div class="inputboxes">
							<label for="textarea"><strong>Real Estate Office Contact</strong></label>                           
							<textarea rows="4" cols="18" id="vRealEstateOfficeContact" name="Data[vRealEstateOfficeContact]" class="inputbox"  lang="*" title="Office contact"><?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vRealEstateOfficeContact'];?>
</textarea>
						    </div>
                     <div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_realestate')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_realestate')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
					</select>                    				
                     </div>
                     </div>
                           
                    <div class="container" style="padding:15px;">
                    <div class="conthead">
		            <h2>Load Image</h2>                       
                    </div>
                    
                   
					<div class="inputboxes" >
					<label for="textfield"  style="margin-bottom: 7px;"><strong>Load Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_realestate')->value[0]['vImage']==''){?>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vImage'];?>
"  title="Load Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }else{ ?>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vImage'];?>
"  title="Load Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }?>
					
					<?php if ($_smarty_tpl->getVariable('db_realestate')->value[0]['vImage']!=''){?>
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<p style="margin-left: 120px;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_store"];?>
/4/<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vImage'];?>
" /></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div><br /><br />
	        <td width="50%" >
            <div style="border:#747474 solid 1px; padding:12px 20px; width:400px;position:relative;">
            
            <div style="position:absolute;top: -6px;line-height: 7px; font-size:18px;color: #333333; background: none repeat scroll 0 0 #f8f8f8;padding:0 3px;">More Image</div>			              
			<!--<label for="textfield" style="padding:5px;"><strong>More Image :</strong></label>-->
			<input  type="hidden" id="totcount" name="totcount" value="<?php echo $_smarty_tpl->getVariable('totgal')->value;?>
"/>
			<div id="TextBoxesGroup">
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				
				<div id="TextBoxDiv0" >
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="2%"><input type="file" name="gallery[]" id="gallery"></td>
						<td width="40%"><input type="button"  class="btn" name="Add" id="addButton" style="padding:3px 15px;" value="Add"></td>
					</tr>
					</table>	
				</div>
				<?php }elseif($_smarty_tpl->getVariable('mode')->value=='edit'&&$_smarty_tpl->getVariable('totgal')->value==1&&$_smarty_tpl->getVariable('flag')->value==0){?>
				<div id="TextBoxDiv0">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
						<td width="40%"><input type="button" class="btn" name="Add" id="addButton" style="padding:3px 15px;" value="Add"></td>
					</tr>
					</table>	
				</div>
				<?php }else{ ?>
					
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_product_gallery')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
					<div id="TextBoxDiv<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
						<input type="hidden" name="vOldGall[]" id="vOldGall" value="<?php echo $_smarty_tpl->getVariable('db_product_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGalImage'];?>
">
						<input type="hidden" name="iGalleryId[]" id="iGalleryId" value="<?php echo $_smarty_tpl->getVariable('db_product_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iGalleryId'];?>
">                        
						<table width="85%%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="1%" valign="top">
								<input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
								<?php if ($_smarty_tpl->getVariable('db_product_gallery')->value[0]['vGalImage']!=''){?>
								</br>
									<a href="#galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" style="margin-left:5px;" id="popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
view.png"/></a>
                                    
									<div style="display:none;">
									<div id="galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
										<div class="popup_box">
											<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_store"];?>
/4/<?php echo $_smarty_tpl->getVariable('db_product_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_product_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGalImage'];?>
"></div>
										</div>
									  </div>
									</div>
								
									
									<script>
										$(document).ready(function(){
											$('#popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
').fancybox({
												'overlayShow'	: true	,
												'transitionIn'	: 'elastic',
												'transitionOut'	: 'elastic',
												'margin' : '0',
												'padding' : '0',
												'scrolling' : 'no'
												
											});
										});
			
										</script>
									
								<?php }?>
							</td>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>
							<td width="20%" valign="top"><input type="button" class="btn" style="padding:3px 15px;" name="Add" id="addButton" value="Add"></td>
							<?php }else{ ?>
							<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:2px 2px;" name="Remove" id="remove" value="Remove" onclick="deleterow(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
);">
							</td>
							<?php }?>
							
						</tr>
						</table>	
					</div>
					<?php endfor; endif; ?>
				<?php }?>
			</div>	
			</div>
           </div>
          </div>
                          
			<div style="padding:0 20px 20px 20px;">
               			     <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
					<input type="submit" value="Add Product" class="btn" onclick="return validate(document.frmadd);" title="Add Product" style="margin-left:154px;"/> 
   				     <?php }else{ ?>
   				            <input type="submit" value="Edit Product" class="btn" onclick="return validate(document.frmadd);" title="Edit Product" style="margin-left:154px;"/>
   				      <?php }?>
				             <input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</div>
           </form>
           </div>
          </div>

<script type="text/javascript">
getId('<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['vCountry'];?>
');
function getId(id){
	
	if($('#action').val() == 'edit'){
		var countryId = id;
		getCountry(countryId);
	}
	
}



function getCountry(countryId)
{
	//alert(countryId);
	var extra ='';
	extra+='&countryId='+countryId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}

	var url = admin_url+"/index.php?file=re-ajcountrylist";
	var pars = extra;

	$.post(url+pars,
            function(data) {
	
		if($('.showallstates')){
			$('.showallstates').html(data);
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
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 're-realestate';
    window.location=admin_url+"/index.php?file=re-realestate&mode=view";
    return false;
}
</script>
<script>
getId('<?php echo $_smarty_tpl->getVariable('db_realestate')->value[0]['iMemberId'];?>
');
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

	var url = admin_url+"/index.php?file=re-ajmemberlist";
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




