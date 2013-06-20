<?php /* Smarty version Smarty-3.0.7, created on 2012-07-19 15:46:51
         compiled from "/var/www/qme_theme/admin/templates/members/member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15477875845007de9330a627-89913065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65cef6209ed73441df9199fa32700c59a788c8d2' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/members/member.tpl',
      1 => 1342688496,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15477875845007de9330a627-89913065',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
datetimepicker.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script>
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>

<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			<ul class="tabhead">
			    <li style="background:none !important; border:none !important;"><a href="#tab-profile">My Profile</a></li>
			    <li style="background:none !important; border:none !important;"><a href="#tab-photo">My Photos</a></li>
			    <li style="background:none !important; border:none !important;"><a href="#tab-song">My Songs</a></li>
			    
			    <li style="background:none !important; border:none !important;"><a href="#tab-postjob">Post Job</a></li>
			    <li style="display:none; background:none !important; border:none !important;"><a href="#tab-addpostjob">Post Job</a></li>
			</ul>
		</div>
	</div>	
	<div id="tabs" style="background:transparent !important; color:#666 !important; border: none !important;">
		<div id="tab-profile" style="padding:0 !important;">
			<form id="frmadd" name="frmadd" action="index.php?file=m-member_a" method="post" enctype="multipart/form-data">
				<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vMyImage'];?>
" />
				<div class="container half left">
					<div class="conthead">
						<h2>Personal Information</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
						<label for="textfield"><strong>Name:</strong></label>
						<input type="text" id="vName" name="Data[vName]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vName'];?>
" lang="*" title="Name"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Email Address:</strong></label>
							<input type="text" id="vEmail"  name="Data[vEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vEmail'];?>
"/>
						</div>
				
						<div class="inputboxes">
							<label for="textfield"><strong>Gender:</strong></label>
							<select id="eGender" name="Data[eGender]" lang="*">
								<option value="0" selected="selected">Select Gender</option>
								<option value="Male" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eGender']=='Male'){?>selected<?php }?>>Male</option>
								<option value="Female" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eGender']=='Female'){?>selected<?php }?>>Female</option>
								<option value="Unspecified" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eGender']=='Unspecified'){?>selected<?php }?>>Unspecified</option>
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Occupation:</strong></label>
							<input type="text" id="vOccupation" name="Data[vOccupation]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vOccupation'];?>
" lang="*" title="Occupation"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Education:</strong></label>
							<input type="text" id="vEducation" name="Data[vEducation]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vEducation'];?>
" lang="*" title="Education"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Birthdate:</strong></label>
							<input type="text" id="dBirthdate" name="Data[dBirthdate]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['dBirthdate'];?>
" lang="*" title="Birthdate"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Skillset:</strong></label>
							<?php if (count($_smarty_tpl->getVariable('skill')->value)>0){?>
							<select id="eSkillset" name="Data[eSkillset]">
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('skill')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<option value="<?php echo $_smarty_tpl->getVariable('skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"<?php ob_start();?><?php echo $_smarty_tpl->getVariable('skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eSkillset']==$_tmp1){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
							<?php endfor; endif; ?>
							<?php }?>
							</select>
						</div>
				
						<div class="inputboxes">
							<label for="textfield"><strong>Other Skill?:</strong></label>
							<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vOtherSkill'];?>
" title="Other Skill"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Interest:</strong></label>
							<?php if (count($_smarty_tpl->getVariable('interest')->value)>0){?>
							<select multiple name="eInterest[]" id="eInterest">
							<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('interest')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<option value="<?php echo $_smarty_tpl->getVariable('interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
"<?php if (in_array($_smarty_tpl->getVariable('interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']],$_smarty_tpl->getVariable('relatedArr')->value)){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
							<?php endfor; endif; ?>
							<?php }?>
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>About:</strong></label>
							<textarea type="text" id="vAbout" name="Data[vAbout]" class="inputbox" lang="*"  title="About" rows="10" cols="50"><?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vAbout'];?>
</textarea>
						</div>	
					</div>
				</div>
				<div class="container half right">
					<div class="conthead">
						<h2>Contact Information</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
							<label for="textfield"><strong>Address:</strong></label>
							<input type="text" id="vAddress" name="Data[vAddress]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vAddress'];?>
" lang="*" title="Address"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Phone:</strong></label>
							<input type="text" id="vPhone"  name="Data[vPhone]" class="inputbox" lang="*N" title="Phone" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vPhone'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>City:</strong></label>
							<input type="text" id="vCity" name="Data[vCity]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vCity'];?>
" lang="*" title="City"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Country:</strong></label>
							<input type="text" id="vCountry" name="Data[vCountry]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vCountry'];?>
" lang="*" title="Country"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>State:</strong></label>
							<input type="text" id="vState" name="Data[vState]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vState'];?>
" lang="*" title="State"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>ZipCode</strong></label>
							<input type="text" id="iZipCode" name="Data[iZipCode]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iZipCode'];?>
" lang="*" title="ZipCode"/>
						</div>	
					</div>
				</div>
				<div class="container half right">
					<div class="conthead">
						<h2>Social Networking</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
							<label for="textfield"><strong>Facebook:</strong>
						</div>
						<div>
							<a href="http://www.facebook.com" style="text-decoration:none;"><input type="button" style="cursor:pointer;" name="facebook" value="Facebook"></a>Connect Your Profile With FaceBook</label>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Twitter:</strong>
						</div>
						<div>
							<a href="http://www.twitter.com" style="text-decoration:none;"><input type="button" style="cursor:pointer;" name="twitter" value="Twitter"></a>Connect Your Profile With Twitter</label>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>MySpace:</strong>
						</div>
						<div>
							<a href="http://www.myspace.com" style="text-decoration:none;"><input type="button" style="cursor:pointer;" name="myspace" value="Myspace"></a>Connect Your Profile With MySpace</label>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Google+:</strong>
						</div>
						<div>
							<a href="https://plus.google.com/" style="text-decoration:none;"><input type="button" style="cursor:pointer;" name="google+" value="Google+"></a>Connect Your Profile With Google+</label>
						</div>
					</div>
				</div>
				<div class="container half right">
					<div class="conthead">
						<h2>General Settings</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
							<input type="checkbox" id="eShowEmailAddress" name="eShowEmailAddress" value="Yes" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eShowEmailAddress']=='Yes'){?>checked<?php }?>>
							<label for="textfield"><strong>Show Email Address as Public:</strong></label>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Hide Online Status:</strong></label>
							<input type="checkbox" id="eHideOnlineStatus" name="eHideOnlineStatus" value="Yes" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eHideOnlineStatus']=='Yes'){?>checked<?php }?>>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Share Your Favourites?:</strong></label>
							<input type="checkbox" id="eShareYourFavorites" name="eShareYourFavorites" value="Yes" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eShareYourFavorites']=='Yes'){?>checked<?php }?>>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Share Your Fans:</strong></label>
							<input type="checkbox" id="eShareYourFans" name="eShareYourFans" value="Yes" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eShareYourFans']=='Yes'){?>checked<?php }?>>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Profile(Private or Public?):</strong></label>
							<input type="checkbox" id="eProfile" name="eProfile" value="Private" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eProfile']=='Private'){?>checked<?php }?>>
						</div>		
					</div>
				</div>
				<div class="container half left">
					<div class="conthead">
						<h2>Upload Image and Banners</h2>
					</div>
					<div class="contentbox">
						<div style="display:block;">
							<div class="inputboxes">
								<label for="textfield"><strong>Upload new image:</strong></label>
								<input type="file" id="vMyImage" name="vMyImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vMyImage'];?>
"  title="MyImage" onchange="CheckValidFile(this.value,this.name)"/>
								
							</div>
							<?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['vMyImage']!=''){?>
							<div>
									<a href="#viewmember" id="member_image"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
view.png"/></a>
									<img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
delete.png" onclick="ImageDelete();"/>
							</div>
							<div>
								<div style="display:none;">
									<div id="viewmember">
										<div class="popup_box">
										    <div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_member"];?>
<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vMyImage'];?>
" /></div>
										</div>
									</div>
								</div>
								
							</div>
							<?php }?>
						</div>
						
						<label for="textfield"><strong>Banner:</strong></label>
						<input  type="hidden" id="totcount" name="totcount" value="<?php echo $_smarty_tpl->getVariable('totgal')->value;?>
"/>
						<div id="TextBoxesGroup">
						<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				
						<div id="TextBoxDiv0">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
									<td width="40%"><input type="button" name="Add" class="btn" value="Add"></td>
								</tr>
							</table>	
						</div>
						<?php }elseif($_smarty_tpl->getVariable('mode')->value=='edit'&&$_smarty_tpl->getVariable('totgal')->value==1&&$_smarty_tpl->getVariable('flag')->value==0){?>
						<div id="TextBoxDiv0">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
									<td width="40%"><input type="button" class="btn" name="Add" id="addButton" value="Add"></td>
								</tr>
							</table>	
						</div>
						<?php }else{ ?>
					
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_banner_gal')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<input type="hidden" name="vOldGall[]" id="vOldGall" value="<?php echo $_smarty_tpl->getVariable('db_banner_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vBannerImage'];?>
">
								<input type="hidden" name="iBannerId[]" id="iBannerId" value="<?php echo $_smarty_tpl->getVariable('db_banner_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iBannerId'];?>
">
								<table width="85%%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="1%" valign="top">
											<input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
											<?php if ($_smarty_tpl->getVariable('db_banner_gal')->value[0]['vBannerImage']!=''){?>
											</br>
											<a href="#galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" style="margin-left:5px;" id="popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
view.png"/></a>
												<div style="display:none;">
													<div id="galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
														<div class="popup_box">
														<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_member"];?>
<?php echo $_smarty_tpl->getVariable('db_banner_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_banner_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vBannerImage'];?>
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
								<td width="20%" valign="top"><input type="button" class="btn" style="padding:3px 7px;" name="Add" id="addButton" value="Add"></td>
								<?php }else{ ?>
								<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:4px 3px;" name="Remove" id="remove" value="Remove" onclick="deleterow(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
);">
								</td>
								<?php }?>
								
							</tr>
							</table>	
						</div>
					<?php endfor; endif; ?>
					<?php }?>
						</div>	
						
						
					<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
					<input type="submit" value="Create Member" class="btn" onclick="return validate(document.frmadd);" title="Create Event"/>
					<?php }else{ ?>
					<input type="submit" value="Modify Member" class="btn" onclick="return validate(document.frmadd);" title="Modify Event"/>
					<?php }?>
					<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>					
					</div>
				</div>
			</form>
		</div>
		
		<div id="tab-photo" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;">
			<?php $_template = new Smarty_Internal_Template("photo/photo.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>
		<div id="tab-song" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;">
			<?php $_template = new Smarty_Internal_Template("song/song.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>
		
		
		
		<div id="tab-postjob" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;">
			<?php $_template = new Smarty_Internal_Template("postjob/view-mpostjob.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>
		
		<div id="tab-addpostjob" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;">
			<?php $_template = new Smarty_Internal_Template("postjob/mpostjob.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>	
	
		<div style="clear: both"></div>
	</div>
	
</div>

<script type="text/javascript">
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
		html +='<td width="40%"><input type="button" name="Remove" class="btnalt" style="padding:4px 3px;" id="remove" value="Remove" onclick="deleterow('+counter+');"></td>';
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
  
  
  function redirectcancel(){
	
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'm-member';
    window.location=admin_url+"/index.php?file=m-member&mode=view";
    return false;
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

$(document).ready(function(){
	$('#member_image').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});
/*$(document).ready(function(){
	$('#profile_image').fancybox({
		'overlayShow'	: true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic',
		'margin' : '0',
		'padding' : '0',
		'scrolling' : 'no'
		
	});
});*/

</script>

<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dBirthdate').datepicker({dateFormat: 'yy-mm-dd'});});
 });
 </script>
