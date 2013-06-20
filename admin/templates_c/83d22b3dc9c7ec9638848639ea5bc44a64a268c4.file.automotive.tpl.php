<?php /* Smarty version Smarty-3.0.7, created on 2012-12-05 10:34:57
         compiled from "/var/www/qme/admin/templates/automotive/automotive.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85056112650bed5f9da3385-05755243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83d22b3dc9c7ec9638848639ea5bc44a64a268c4' => 
    array (
      0 => '/var/www/qme/admin/templates/automotive/automotive.tpl',
      1 => 1354683890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85056112650bed5f9da3385-05755243',
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
/index.php?file=at-automotive&mode=view">Automotive</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Automotive<?php }else{ ?>Edit Automotive<?php }?></li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs"  >
	<div class="conthead">
		<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
		<h2 class="left">Add Automotive</h2>
		<?php }else{ ?>
		
		<h2 class="left">Edit Automotive</h2>
		<?php }?>
	</div>
	<div class="contentbox" id="tabs-1" style="padding:20px;">

              <form id="frmadd" name="frmadd" action="index.php?file=at-automotive_a" enctype="multipart/form-data" method="post">
        
          			<input type="hidden" name="iProductId" id="iProductId" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['iProductId'];?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vVehicleImage'];?>
" />
                <input type="hidden" name="selectedmodel" id="selectedmodel" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['model'];?>
"/>
                <input type="hidden" name="selectedstore" id="selectedstore" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['iStoreId'];?>
"/>
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<div class="container top " style="padding:20px;">
					<div class="conthead">
						<h2>Basic Vehicle Information</h2>
					</div>
                    
		    	<div style="float:left; padding:2px; width:450px;">
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select  style="width:220px;" id="iMemberId" name="Data[iMemberId]"  title="Member" lang="*" onchange="getMember(this.value);" >
						<option value=''>--Select Member--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_Automember')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_Automember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
' <?php if ($_smarty_tpl->getVariable('db_Automember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId']==$_smarty_tpl->getVariable('db_automotive')->value[0]['iMemberId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_Automember')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vName'];?>
</option>
						<?php endfor; endif; ?>
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
                    <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>                                 
                    <option value=''> - Select Type - </option>                    
                    <option value="New">New</option>
                    <option value="Used">Used</option>
                    <option value="Rebuildable">Rebuildable</option>
                    <option value="Salvaged">Salvaged</option>                                                          
                    <?php }else{ ?>

                     <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_automotive')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value=''> - Select Type - </option>                    
                    <option value="New" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vType']=="New"){?>selected="selected"<?php }?>>New</option>
                    <option value="Used" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vType']=="Used"){?>selected="selected"<?php }?>>Used</option>
                    <option value="Rebuildable" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vType']=="Rebuildable"){?>selected="selected"<?php }?>>Rebuildable</option>
                    <option value="Salvaged" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vType']=="Salvaged"){?>selected="selected"<?php }?>>Salvaged</option>                                                          
                   <?php endfor; endif; ?>
                    <?php }?>

					</select>                    
				</div>
                
                <div class="inputboxes">
				<label for="textfield"><strong>Year:</strong></label>
                <select id="iYear" name="Data[iYear]" lang="*" title="Year" style="width:220px;">			
		        <option value=''> - Select Year - </option>
		        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['name'] = 'yr';
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'] = (int)1950;
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['loop'] = is_array($_loop=2021) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['yr']['total']);
?>
		        <option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['yr']['index'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['yr']['index']==$_smarty_tpl->getVariable('db_automotive')->value[0]['iYear']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['yr']['index'];?>
</option>
		        <?php endfor; endif; ?>
	            </select>
				</div>
                

				
                <div class="inputboxes">
					<label for="textfield"><strong>Make:</strong></label>
					<select id="iMakeId" name="Data[make]"  title="Make" lang="*" onchange="getMake(this.value);" style="width:220px;">
						<option value=''>--Select Make--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_automake')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_automake')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vMake'];?>
' <?php if ($_smarty_tpl->getVariable('db_automake')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vMake']==$_smarty_tpl->getVariable('db_automotive')->value[0]['make']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_automake')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vMake'];?>
</option>
						<?php endfor; endif; ?>
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
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['fPrice'];?>
" onkeypress="return checkprice(event);" lang="*" title="Price" maxlength="12"/>
				</div>				 
                <div class="inputboxes">
					<label for="textfield"><strong>Value/MSRP:</strong></label>
					<input type="text" id="fMsrp" name="Data[fMsrp]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['fMsrp'];?>
" onkeypress="return checkprice(event);" lang="*" title="Value/MSRP" maxlength="12"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Mileage:</strong></label>
					<input type="text" id="iMileage" name="Data[iMileage]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['iMileage'];?>
" onkeypress="return checkprice(event);" lang="*" title="Mileage"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>VIN:</strong></label>
					<input type="text" id="vVin" name="Data[vVin]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vVin'];?>
"  lang="*" title="VIN" />
				</div>
                
		
	</div>
	<div style="float:left; padding:2px; width:450px;">               
	       
                <div class="inputboxes">
					<label for="textfield"><strong>Transmission:</strong></label>
					<select id="vTransmission" name="Data[vTransmission]" lang="*" title="Transmission" style="width:220px;">
                    <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>                                 
                    <option value=''> - Select Transmission - </option>                    
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>                                                                              
                    <?php }else{ ?>                                          
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_automotive')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value=''> - Select Transmission - </option>                    
                    <option value="Automatic" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vTransmission']=="Automatic"){?>selected="selected"<?php }?>>Automatic</option>
                    <option value="Manual" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vTransmission']=="Manual"){?>selected="selected"<?php }?>>Manual</option>                                                                             
                    <?php endfor; endif; ?>
                    <?php }?>                   
					</select>                    
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Body Style:</strong></label>
					<select id="vBodyStyle" name="Data[vBodyStyle]" lang="*" title="Body Style" style="width:220px;">
                    <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>                                 
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
                    <?php }else{ ?>   
                     <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_automotive')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value=''> - Select Body Style - </option>                    
                    <option value="Convertable" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Convertable"){?>selected="selected"<?php }?>>Convertable</option>
                    <option value="Coupe" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Coupe"){?>selected="selected"<?php }?>>Coupe</option>
                    <option value="Hatchback" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Hatchback"){?>selected="selected"<?php }?>>Hatchback</option>
                    <option value="Salvaged" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Salvaged"){?>selected="selected"<?php }?>>Salvaged</option>                                                           
                    <option value="Sedan" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Sedan"){?>selected="selected"<?php }?>>Sedan</option>
                    <option value="Sports Utility" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Sports Utility"){?>selected="selected"<?php }?>>Sports Utility</option>
                    <option value="Truck" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Truck"){?>selected="selected"<?php }?>>Truck</option>
                    <option value="Van" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Van"){?>selected="selected"<?php }?>>Van</option>
                    <option value="Wagon" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vBodyStyle']=="Wagon"){?>selected="selected"<?php }?>>Wagon</option>                                                                                                                                                            
                    <?php endfor; endif; ?>
                     <?php }?>                          
					</select>                    
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Engine Type:</strong></label>
					<input type="text" id="vEngineType" name="Data[vEngineType]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vEngineType'];?>
"  lang="*" title="Engine Type" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Fuel Type:</strong></label>
					<input type="text" id="vFuelType" name="Data[vFuelType]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vFuelType'];?>
"  lang="*" title="Fuel Type" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Drive Train:</strong></label>
					<input type="text" id="vDriveTrain" name="Data[vDriveTrain]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vDriveTrain'];?>
"  lang="*" title="Drive Train" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Doors:</strong></label>
					<input type="text" id="vDoors" name="Data[vDoors]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vDoors'];?>
"  lang="*" title="Doors" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Exterior Color:</strong></label>
					<input type="text" id="vExteriorColor" name="Data[vExteriorColor]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vExteriorColor'];?>
"  lang="*" title="Exterior Color" />
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Interior Color:</strong></label>
					<input type="text" id="vInteriorColor" name="Data[vInteriorColor]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vInteriorColor'];?>
" lang="*" title="Interior Color" />
				</div>
                
                <div class="inputboxes">
					<label for="textfield" ><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['eStatus']=='Active'){?>selected<?php }?>>Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['eStatus']=='Inactive'){?>selected<?php }?>>Inactive</option>
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
                        <label for="textfield" style="width:300px;"><strong>Vehicle Safety and Security<?php echo print_r($_smarty_tpl->getVariable('safetyArr')->value);?>
</strong></label><br /><br />                       
                            <hr />                        
				            <div style="width:170px; float:left; padding:5px;" >
                            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_vehicle_safety_security')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
					        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']%6==0&&$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']!=0){?>
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          <?php }?>
					       <input type="checkbox" id="iVehicleSafetyId[]" name="iVehicleSafetyId[]" value="<?php echo $_smarty_tpl->getVariable('db_vehicle_safety_security')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleSafetyId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_vehicle_safety_security')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleSafetyId'],$_smarty_tpl->getVariable('safetyArr')->value)){?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->getVariable('db_vehicle_safety_security')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vVehicleSafety'];?>
<br />
				            <?php endfor; endif; ?>                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong>Comfort and Convenience</strong></label><br /><br />                       
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_vehicle_comfort_convenience')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
					        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']%10==0&&$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']!=0){?>
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          <?php }?>
					       <input type="checkbox" id="iVehicleComfortId[]" name="iVehicleComfortId[]" value="<?php echo $_smarty_tpl->getVariable('db_vehicle_comfort_convenience')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleComfortId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_vehicle_comfort_convenience')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleComfortId'],$_smarty_tpl->getVariable('comfortArr')->value)){?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->getVariable('db_vehicle_comfort_convenience')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vVehicleComfort'];?>
<br />
				            <?php endfor; endif; ?>                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong>Audio and Entertainment</strong></label><br /><br />                        
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                                        <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_vehicle_audio_entertainment')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
					        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']%3==0&&$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']!=0){?>
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          <?php }?>
					       <input type="checkbox" id="iVehicleaudioId[]" name="iVehicleaudioId[]" value="<?php echo $_smarty_tpl->getVariable('db_vehicle_audio_entertainment')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleaudioId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_vehicle_audio_entertainment')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleaudioId'],$_smarty_tpl->getVariable('audioArr')->value)){?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->getVariable('db_vehicle_audio_entertainment')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vVehicleAudio'];?>
<br />
				            <?php endfor; endif; ?>                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong>Mechanical and Accessories</strong></label><br /><br />                       
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_vehicle_mechanical_accessaries')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
					        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']%3==0&&$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']!=0){?>
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          <?php }?>
					       <input type="checkbox" id="iVehicleMechanicalId[]" name="iVehicleMechanicalId[]" value="<?php echo $_smarty_tpl->getVariable('db_vehicle_mechanical_accessaries')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleMechanicalId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_vehicle_mechanical_accessaries')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleMechanicalId'],$_smarty_tpl->getVariable('mechanicArr')->value)){?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->getVariable('db_vehicle_mechanical_accessaries')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vVehicleMechanical'];?>
<br />
				            <?php endfor; endif; ?>                                                            
			            	</div>
                    	</div>
                        
                        <div class="inputboxes">
                        <label for="textfield" style="width:300px"><strong >Vehicle's Condition and History</strong></label><br /><br />                        
                            <hr />                        
				            <div style="width:170px; float:left;padding:5px;">
                            <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_vehicle_condition_history')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
					        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']%4==0&&$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']!=0){?>
						     </div>
						    <div style="width:170px; float:left;padding:5px;">
					          <?php }?>
					       <input type="checkbox" id="iVehicleConditionId[]" name="iVehicleConditionId[]" value="<?php echo $_smarty_tpl->getVariable('db_vehicle_condition_history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleConditionId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_vehicle_condition_history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iVehicleConditionId'],$_smarty_tpl->getVariable('conditionArr')->value)){?> checked="checked"<?php }?> /><?php echo $_smarty_tpl->getVariable('db_vehicle_condition_history')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vVehicleCondition'];?>
<br />
				            <?php endfor; endif; ?>                                                            
			            	</div>
                    	</div>
                        
                        </div>
                        <div class="container" style="padding:15px;">
					       <div class="conthead">
						   <h2>Comments/Description</h2>                       
					       </div>
                           <div class="inputboxes">
							<label for="textarea" style="width:500px;"><strong>Maximum 2500 Characters for Comments/Desc</strong></label><br />                            
							<textarea rows="6" cols="90" id="tDescription" name="Data[tDescription]" class="inputbox"  lang="*" title="Comments/Description" maxlength="2500"><?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['tDescription'];?>
</textarea>
						    </div> 
                            <div class="inputboxes">
					         <label for="textfield" style="width:500px;"><strong>External Link for More Details/Book Value/Images/Vedio:</strong></label><br /><br />
					        <input type="text" id="vExternalLink" name="Data[vExternalLink]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vExternalLink'];?>
"  lang="*" title="External Link" size="92" />
				            </div>                                                    
                    	</div>
                        <div class="container" style="padding:15px;">					       
                           
					<div class="inputboxes" >
					<label for="textfield" ><strong>Upload Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vVehicleImage']==''){?>
					<input type="file" id="vVehicleImage" name="vVehicleImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vVehicleImage'];?>
"  title="Vehicle Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }else{ ?>
					<input type="file" id="vVehicleImage" name="vVehicleImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vVehicleImage'];?>
"  title="Vehicle Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					<?php }?>
			
					<?php if ($_smarty_tpl->getVariable('db_automotive')->value[0]['vVehicleImage']!=''){?>
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<p style="margin-left:120px;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_store"];?>
/3/<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vVehicleImage'];?>
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
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_automotive_gallery')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<input type="hidden" name="vOldGall[]" id="vOldGall" value="<?php echo $_smarty_tpl->getVariable('db_automotive_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGalImage'];?>
">
						<input type="hidden" name="iGalleryId[]" id="iGalleryId" value="<?php echo $_smarty_tpl->getVariable('db_automotive_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iGalleryId'];?>
">                        
						<table width="85%%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td width="1%" valign="top">
								<input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
								<?php if ($_smarty_tpl->getVariable('db_automotive_gallery')->value[0]['vGalImage']!=''){?>
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
/3/<?php echo $_smarty_tpl->getVariable('db_automotive_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iProductId'];?>
/<?php echo $_smarty_tpl->getVariable('db_automotive_gallery')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vGalImage'];?>
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
                <div class="container" style="padding:15px;">
					       <div class="conthead">
						   <h2>Seller's Contact Information</h2>                       
					       </div>
                           <div class="inputboxes">
					         <br /><label for="textfield" ><strong>Your City Name:</strong></label>
					        <input type="text" id="vCity" name="Data[vCity]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vCity'];?>
"  lang="*" title="City Name" />
				            </div>
                            <div class="inputboxes">
					         <br /><label for="textfield" ><strong>Contact Name:</strong></label>
					        <input type="text" id="vContactName" name="Data[vContactName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vContactName'];?>
"  lang="*" title="Contact Name" />
				            </div> 
                             <div class="inputboxes">
					         <br /><label for="textfield"><strong>Dealership Name:</strong></label>
					        <input type="text" id="vDealershipName" name="Data[vDealershipName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vDealershipName'];?>
"  lang="*" title="Dealership Name" />
				            </div> 
                            <div class="inputboxes">
							<label for="textarea"><strong>Dealership Address</strong></label>                           
							<textarea rows="4" cols="30" id="vDealershipAddress" name="Data[vDealershipAddress]" class="inputbox"  lang="*" title="Dealership Address"><?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vDealershipAddress'];?>
</textarea>
						    </div>
                            <div class="inputboxes">
					        <label for="textfield"><strong>Dealership Number:</strong></label>
					        <input type="text" id="vDealerNumber" name="Data[vDealerNumber]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['vDealerNumber'];?>
" onkeypress="return checkprice(event);" lang="*" title="Dealership Number" maxlength="12"/>
				            </div>
                             
                           </div>
                         </div>
                          <div style="padding:0 20px 20px 20px;">
               			     <?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
   				           <input type="submit" value="Add Product" class="btn" onclick="return validate(document.frmadd);" title="Add Product" style="margin-left:157px;"/> 
   				             <?php }else{ ?>
   				            <input type="submit" value="Edit Product" class="btn" onclick="return validate(document.frmadd);" title="Edit Product" style="margin-left:157px;"/>
   				             <?php }?>
				             <input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		                 </div>    
                             </form>	              
                 </div>
        	     </div>

<script type="text/javascript">
getId('<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['make'];?>
');
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
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'at-automotive';
    window.location=admin_url+"/index.php?file=at-automotive&mode=view";
    return false;
}

</script>
<script>
getId('<?php echo $_smarty_tpl->getVariable('db_automotive')->value[0]['iMemberId'];?>
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



