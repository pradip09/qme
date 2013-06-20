<?php /* Smarty version Smarty-3.0.7, created on 2013-06-06 08:52:02
         compiled from "/home/qmemedia/public_html/admin/templates/members/member.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150030519051b094021a7d03-89895021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6876f0e4d4ed0684c441ad8b822b9d3e50a318c7' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/members/member.tpl',
      1 => 1370526703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150030519051b094021a7d03-89895021',
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
<script>
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>
<div id="breadcrumb">
	<ul>
		<li><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=m-member&mode=view">Member</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Member<?php }else{ ?>Edit Member<?php }?></li>
	</ul>
</div>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			<ul class="tabhead">
				<li style="background:none !important; border:none !important;"><a href="#tab-profile" onclick="hidemessage()">My Profile</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-photo" onclick="hidemessage()">My Photos</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-song" onclick="hidemessage()">My Songs</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-video" onclick="hidemessage()">My Videos</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-blog" onclick="hidemessage()">My Blogs</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-event" onclick="hidemessage()">My Events</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-postjob" onclick="hidemessage()">Post Job</a></li>
				<li style="display:none; background:none !important; border:none !important;"><a href="#tab-addpostjob">Post Job</a></li>
				<li style="background:none !important; border:none !important;"><a href="#tab-postcampaign" onclick="hidemessage()">Post Campaign</a></li>
				<li style="display:none; background:none !important; border:none !important;"><a href="#tab-addpostcampaign">Post Campaign</a></li>
			</ul>
		</div>
	</div>
	<div>  <?php if ($_smarty_tpl->getVariable('var_msg_new')->value!=''){?>
		<div class="status success" id="errormsgdiv">
			<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p>
			<p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" /> <?php echo $_smarty_tpl->getVariable('var_msg_new')->value;?>
</p>
		</div>
		<div></div>
		<?php }elseif($_smarty_tpl->getVariable('var_msg')->value!=''){?>
		<div class="status success" id="errormsgdiv">
			<p class="closestatus"><a href="javascript:void(0);" title="Close" onclick="hidemessage();">x</a></p>
			<p><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tpanel_img'];?>
icons/icon_success.png" title="Success" /> <?php echo $_smarty_tpl->getVariable('var_msg')->value;?>
</p>
		</div>
		<div></div>
		<?php }?> </div>
	<div id="tabs" style="background:transparent !important; color:#666 !important; border: none !important;">
		<div id="tab-profile" style="padding:0 !important;">
			<form id="frm" name="frm" action="index.php?file=m-member_a" enctype="multipart/form-data" method="post">			
				<input type="hidden" name="iMemberId" id="iMemberId" value="<?php echo $_smarty_tpl->getVariable('iMemberId')->value;?>
" />
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vProfileImage'];?>
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
							<input type="text" id="vEmail" name="Data[vEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vEmail'];?>
"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Password:</strong></label>							
							<input type="password" id="vPassword"  name="Data[vPassword]" class="inputbox"  lang="*" title="Password" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vPassword'];?>
"/>
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Identifier: </strong></label>
							<select id="eGender" name="Data[eGender]" lang="*" title="Gender" style="width:224px;">
								<option value="">Select Gender</option>
								<option value="Male" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eGender']=='Male'){?>selected<?php }?>>Male</option>
								<option value="Female" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eGender']=='Female'){?>selected<?php }?>>Female</option>
								<option value="Business" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eGender']=='Business'){?>selected<?php }?>>Business</option>
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Type: </strong></label>
							<select id="eType" name="Data[eType]" lang="*" title="eType" style="width:224px;">
								<option value="">Select Type</option>
								<option value="Member" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eType']=='Member'){?>selected<?php }?>>Member</option>
								<option value="Business" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eType']=='Business'){?>selected<?php }?>>Business</option>
								<option value="Sports" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eType']=='Sports'){?>selected<?php }?>>Sports</option>
								
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Studied At:</strong></label>
							<input type="text" name="Data[vStudiedAt]" class="inputbox" id="vStudiedAt" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vStudiedAt'];?>
" lang="*" title="StudiedAt"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Degree:</strong></label>
							<input type="text" name="Data[vDegree]" class="inputbox" id="vDegree" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vDegree'];?>
" lang="*" title="Degree"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Worked At:</strong></label>
							<input type="text" name="Data[vWorkedAt]" class="inputbox" id="vWorkedAt" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vWorkedAt'];?>
" lang="*" title="WorkedAt"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Occupation:</strong></label>
							<input type="text" id="vOccupation" name="Data[vOccupation]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vOccupation'];?>
" lang="*" title="Occupation"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Birthdate:</strong></label>
							<input type="text" id="dBirthdate" name="Data[dBirthdate]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['dBirthdate'];?>
" lang="*" title="Birthdate"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Country:</strong></label>
							<select name="Data[iCountryId]" id="iCountryId" onchange="getCountry(this.value);" style="width:224px;" class="inputbox" lang="*" title="Country">
								<option value="">--Select Country--</option>
								<?php if (count($_smarty_tpl->getVariable('db_mycountry')->value)>0){?>
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_mycountry')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<option value='<?php echo $_smarty_tpl->getVariable('db_mycountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_mycountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId']==$_smarty_tpl->getVariable('db_mem')->value[0]['iCountryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_mycountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
								<?php endfor; endif; ?>
								<?php }?>				
							
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>State:</strong></label>							
							<div id="showallstates">
								<select name="iStateId" id="iStateId" class="inputbox" lang="*"  title="State">
									<option value="">-Select-</option>
								</select>
							</div>							
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>City:</strong></label>
							<input type="text" name="Data[vCity]" class="inputbox" id="vCity" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vCity'];?>
" title="city" lang="*" />
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Address:</strong></label>
							<input type="text" name="Data[vAddress]" class="inputbox" id="vAddress" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vAddress'];?>
" title="address" lang="*"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Zip Code:</strong></label>
							<input type="text" name="Data[vZipCode]" class="inputbox" id="vZipCode" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vZipCode'];?>
" title="zip code" onkeypress="return checkmobile(event);" lang="*" />
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Phone No:</strong></label>
							<input type="text" name="Data[vPhone]" class="inputbox" id="vPhone" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vPhone'];?>
" title="Phone No" onkeypress="return checkmobile(event);" lang="*" />
						</div>
						<div class="inputboxes">
							<label><strong>Interests:</strong></label>
							<br/>
							<?php if (count($_smarty_tpl->getVariable('db_interestt')->value)>0){?>
							<div class="event_skill">
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_interestt')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<div class="event_slikk_inner">
									<input type="checkbox" value="<?php echo $_smarty_tpl->getVariable('db_interestt')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'];?>
" id="iInterestId" name="Data[iInterestId][]" <?php if (in_array($_smarty_tpl->getVariable('db_interestt')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iInterestId'],$_smarty_tpl->getVariable('relatedArr')->value)){?>checked<?php }?> lang="*" title="Interest" />
									<?php echo $_smarty_tpl->getVariable('db_interestt')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vInterest'];?>

								</div>
								<?php endfor; endif; ?>
							</div>
							<?php }?>
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Interest:</strong></label>
							<input type="text" name="Data[vOtherInterest]" class="inputbox" id="vOtherInterest" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vOtherInterest'];?>
" title="Other Interest" />
						</div>
						<div class="inputboxes">
							<label><strong>Skills:</strong></label>
							<br/>
							<?php if (count($_smarty_tpl->getVariable('db_skill1')->value)>0){?>
							<div class="event_skill">
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_skill1')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<div class="event_slikk_inner">
									<input type="checkbox" value="<?php echo $_smarty_tpl->getVariable('db_skill1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iSkillId'];?>
" id="iSkillId" name="Data[iSkillId][]" <?php if (in_array($_smarty_tpl->getVariable('db_skill1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['iSkillId'],$_smarty_tpl->getVariable('skillArr')->value)){?>checked<?php }?> lang="*" title="Skill"/>
									<?php echo $_smarty_tpl->getVariable('db_skill1')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['vSkill'];?>

								</div>
								<?php endfor; endif; ?>
							</div>
						<?php }?>
						</div>						
						<div class="inputboxes">
							<label for="textfield"><strong>Other Skill:</strong></label>
							<input type="text" id="vOtherSkill" name="Data[vOtherSkill]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vOtherSkill'];?>
" title="Other Skill" />
						</div>
					</div>
				</div>				
				<div class="container half right">
					<div class="conthead">
						<h2>Biz Contact</h2>
					</div>
					<div class="contentbox">
						<div class="inputboxes">
							<label for="textfield"><strong>BizName:</strong></label>
							<input type="text" class="inputbox" name="Data[vBizName]" id="vBizName" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vBizName'];?>
" lang="*" title="BizName"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Address:</strong></label>
							<input type="text" id="vBizAddress" name="Data[vBizAddress]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vBizAddress'];?>
" lang="*" title="Address"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Phone:</strong></label>
							<input type="text" id="vBizPhone"  name="Data[vBizPhone]" class="inputbox" lang="*" title="Phone no"  value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vBizPhone'];?>
" onkeypress="return checkmobile(event);"/>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>Email Address:</strong></label>
							<input type="text" id="vBizEmail"  name="Data[vBizEmail]" class="inputbox"  lang="*{E}" title="E-mail" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vBizEmail'];?>
"/>
						</div>
						
						<div class="inputboxes">
							<label for="textfield"><strong>Country:</strong></label>
							<select name="Data[iBizCountryId]" class="inputbox" id="iBizCountryId" style="width:224px;" onchange="getCount(this.value);" lang="*" title="BizCountry">
								<option value="">--Select Country--</option>
								<?php if (count($_smarty_tpl->getVariable('db_mycountry')->value)>0){?>
								<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_mycountry')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
									<option value='<?php echo $_smarty_tpl->getVariable('db_mycountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_mycountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId']==$_smarty_tpl->getVariable('db_mem')->value[0]['iBizCountryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_mycountry')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
								<?php endfor; endif; ?>
								<?php }?>
										
							</select>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>State:</strong></label>
							<div id="showstates" >
								<select name="Data[iBizStateId]" id="iBizStateId" class="inputbox" style="width:305px;" lang="*" title="Biz State">
									<option value="">-Select-</option>
								</select>
							</div>
						</div>
						<div class="inputboxes">
							<label for="textfield"><strong>City:</strong></label>
							<input type="text" id="vBizCity" name="Data[vBizCity]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vBizCity'];?>
" lang="*" title="City"/>
						</div>
						<div class="inputboxes" style="margin-left:133px;">							
							<input type="checkbox" id="eNonProfit" name="Data[eNonProfit]" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eNonProfit']=='Yes'){?>checked<?php }?>/>
							&nbsp;Are you a non profit ?<br/>
							<input type="checkbox" id="eChruch" name="Data[eChruch]" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eChruch']=='Yes'){?>checked<?php }?>/>
							&nbsp;Are you a Church ?<br/>
							<input type="checkbox" id="ePolitician" name="Data[ePolitician]" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['ePolitician']=='Yes'){?>checked<?php }?>/>
							&nbsp;Are you a politician ?<br/>
							<input type="checkbox" id="eFundraiser" name="Data[eFundraiser]" <?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['eFundraiser']=='Yes'){?>checked<?php }?>/>
							&nbsp;Are you a Fundraiser ?<br/>
						</div>
						<div class="inputboxes">
						<strong>List your website:</strong><br />
							<br />
							<div class="inputboxes">														
								<label for="textfield"><strong>1:</strong></label>							
								<input type="text" class="inputbox"  id="vWebsite1" name="Data[vWebsite1]" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vWebsite1'];?>
"/>
							</div>
							<div class="inputboxes">														
								<label for="textfield"><strong>2:</strong></label>							
								<input type="text" class="inputbox" id="vWebsite2" name="Data[vWebsite2]" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vWebsite2'];?>
"/>
							</div>
							<div class="inputboxes">														
								<label for="textfield"><strong>3:</strong></label>							
								<input type="text" class="inputbox"  id="vWebsite3" name="Data[vWebsite3]" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vWebsite3'];?>
"/>
							</div>														
						</div>
					</div>
				</div>
				<div class="container half right">
					<div class="conthead">
						<h2>General Settings</h2>
					</div>
					<div class="General_Settings_profilepage">
						<div id="divSettingmsgid" style="text-align:center;line-height:24px; height:25px; padding-right:8px;width: 605px;color:red;"></div>
						<table>
							<!--<form id="frmMyGeneralSetting" name="frmMyGeneralSetting" method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->getVariable('site_url')->value;?>
/index.php?file=a-ajmygeneralsetting">-->
								<input type="hidden" id="iGeneralSettingId" name = "iGeneralSettingId" value = "<?php echo $_smarty_tpl->getVariable('db_gen_setting')->value[0]['iGeneralSettingId'];?>
"/>
								<tr>
									<td class="qme_language">My QME Language</td>
								</tr>
								<tr>
									<td><div class="SelectTextBoxMyPro" style="border:none;">
											<select name="vLanguage" id="vLanguage" style="width:150px;" class="inputbox" lang="*" title="Language">
												<option value="3">English</option>								
												<?php if (count($_smarty_tpl->getVariable('db_language')->value)>0){?>
												<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_language')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
												<option value='<?php echo $_smarty_tpl->getVariable('db_language')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLangId'];?>
' <?php if ($_smarty_tpl->getVariable('db_language')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iLangId']==$_smarty_tpl->getVariable('db_mem')->value[0]['iLangId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_language')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vLanguage'];?>
</option>
												<?php endfor; endif; ?>
												<?php }?>
											</select>
										</div></td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowEmail" name="eShowEmail" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowEmail']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowEmail']==''){?>checked<?php }?>/>
										&nbsp;Show Email Address as Public ?</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowBusinessNumber" name="eShowBusinessNumber" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowBusinessNumber']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowBusinessNumber']==''){?>checked<?php }?>/>
										&nbsp;Show my business Number</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eSupportBusiness" name="eSupportBusiness" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eSupportBusiness']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eSupportBusiness']==''){?>checked<?php }?> />
										&nbsp;I Support Businesses in my community</td>
								</tr>
								<!--			<tr>
						<td><input type="checkbox" id="eShowRelationshipStatus" name="eShowRelationshipStatus" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowRelationshipStatus']=='Yes'){?>checked<?php }?>/>&nbsp;Show your relationship status</td>
					</tr>-->
								<tr>
									<td><input type="checkbox" id="eShowBusinessAddress" name="eShowBusinessAddress" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowBusinessAddress']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowBusinessAddress']==''){?>checked<?php }?> />
										&nbsp;Show your business address</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eHideOnlineStatus" name="eHideOnlineStatus" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eHideOnlineStatus']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowBusinessAddress']==''){?>checked<?php }?>/>
										&nbsp;Hide Online Status</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eBizContact" name="eBizContact" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eBizContact']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eBizContact']==''){?>checked<?php }?>/>
										&nbsp;Show your Biz Contact in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowSkill" name="eShowSkill" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowSkill']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowSkill']==''){?>checked<?php }?>/>
										&nbsp;Show your Skill in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowIntrest" name="eShowIntrest" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowIntrest']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowIntrest']==''){?>checked<?php }?>/>
										&nbsp;Show your Intrest in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowOccupation" name="eShowOccupation" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowOccupation']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowOccupation']==''){?>checked<?php }?>/>
										&nbsp;Show your Occupation in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowStudiedat" name="eShowStudiedat" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowStudiedat']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowStudiedat']==''){?>checked<?php }?>/>
										&nbsp;Show your Studied At in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShowDegreein" name="eShowDegreein" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowDegreein']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShowDegreein']==''){?>checked<?php }?>/>
										&nbsp;Show your Degree in your public profile</td>
								</tr>
								<tr>
									<td><input type="checkbox" id="eShareFavourite" name="eShareFavourite" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShareFavourite']=='Yes'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eShareFavourite']==''){?>checked<?php }?> />
										&nbsp;Share Your Favorites ?</td>
								</tr>
								<tr>
									<td class="qme_language">Profile Private or Public ? Private is  only visible to members who you have in your network.</td>
								</tr>
								<tr>
									<td><div class="SelectTextBoxMyPro" style="border:none;">
											<select name="eIsPrivatePublic" id="eIsPrivatePublic" style="width:150px;" class="inputbox">
												<option value="Private" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eIsPrivatePublic']=='Private'){?>selected<?php }?>>Private</option>
												<option value="Public" <?php if ($_smarty_tpl->getVariable('db_gen_setting')->value[0]['eIsPrivatePublic']=='Public'||$_smarty_tpl->getVariable('db_gen_setting')->value[0]['eIsPrivatePublic']==''){?>selected<?php }?>>
												Public
												</option>
											</select>
										</div></td>
								</tr>
								
								
							<!--</form>	-->						
						</table>			
					</div>
				</div>				
				<div class="container half left">
					<div class="conthead">
						<h2>Upload Image and Banners</h2>
					</div>
					<div class="contentbox">
						<div style="display:block;">
							<div class="inputboxes">
								<label for="textfield"><strong>Profile image:</strong></label>
								<?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['vProfileImage']==''){?>
								<input type="file" id="vProfileImage" name="vProfileImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vProfileImage'];?>
"  title=" Profile Image" onchange="CheckValidFile(this.value,this.name)" style="width: 201px;margin-right: 87px;" lang="*"/>
								<?php }else{ ?>
								<input type="file" id="vProfileImage" name="vProfileImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vProfileImage'];?>
"  onchange="CheckValidFile(this.value,this.name)" style="width: 201px;margin-right: 87px;" />
								<?php }?>
							<?php if ($_smarty_tpl->getVariable('db_mem')->value[0]['vProfileImage']!=''){?>
							<div style="margin-top: 10px;"> <a href="#viewmember" id="member_image"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a> <img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/> </div>
							</div>
							
							<div>
								<div style="display:none;">
									<div id="viewmember">
										<div class="popup_box">
											<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_member"];?>
<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iMemberId'];?>
/<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['vProfileImage'];?>
" /></div>
										</div>
									</div>
								</div>
							</div>
							<?php }?> </div>
						<label for="textfield"><strong>Banner:</strong></label>
						<input  type="hidden" id="totcount" name="totcount" value="<?php echo $_smarty_tpl->getVariable('totgal')->value;?>
"/>
						<div id="TextBoxesGroup">
							<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
							<div id="TextBoxDiv0">
								<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
										<td width="60%"><input type="file" name="gallery[]" id="gallery"></td>
										<td width="40%"><input type="button" name="Add" class="btn" value="Add" id="addButton" style="padding-top: 5px;padding-bottom: 5px;margin-left: -72px;"></td>
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
										<td width="1%" valign="top"><input type="file" name="gallery[]" style="margin-bottom:5px;" id="gallery" >
											<?php if ($_smarty_tpl->getVariable('db_banner_gal')->value[0]['vBannerImage']!=''){?> </br>
											<a href="#galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
" style="margin-left:5px;" id="popgal<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
view.png"/></a>
											<div style="display:none;">
												<div id="galdis<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
">
													<div class="popup_box">
														<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_member"];?>
<?php echo $_smarty_tpl->getVariable('db_banner_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iMemberId'];?>
/banner/<?php echo $_smarty_tpl->getVariable('db_banner_gal')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vBannerImage'];?>
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
											
											<?php }?> </td>
										<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['i']['index']==0){?>
										<td width="20%" valign="top"><input type="button" class="btn" style="padding-top: 5px;padding-bottom: 5px;" name="Add" id="addButton" value="Add"></td>
										<?php }else{ ?>
										<td width="20%" valign="top" align=left><input type="button" class="btnalt" style="padding:4px 3px;" name="Remove" id="remove" value="Remove" onclick="deleterow(<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['i']['index'];?>
);">
										</td>
										<?php }?> </tr>
								</table>
							</div>
							<?php endfor; endif; ?>
							<?php }?>
						</div>
						<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
							<input type="submit" value="Add Member" class="btn" onclick="return validate(document.frm);" title="Add Member" style="margin-left: 140px;"/>
						<?php }else{ ?>
							<input type="submit" value="Edit Member" class="btn" onclick="return validate(document.frm);" title="Edit Member" style="margin-left: 140px;"/>
						<?php }?>						
						<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
					</div>
				</div>
			</form>
		</div>
		<div id="tab-photo" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("photo/photo.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<div id="tab-song" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("song/song.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<div id="tab-video" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("video/video.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<div id="tab-blog" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("blog/blog.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<div id="tab-event" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("events/event.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<div id="tab-postjob" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("postjob/view-mpostjob.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<!--<div id="tab-addpostjob" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("postjob/mpostjob.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>-->
		<div id="tab-postcampaign" style="padding:0 !important; background:transparent !important; color:#666 !important; border: none !important;"> <?php $_template = new Smarty_Internal_Template("postcampaign/view-mpostcampaign.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> </div>
		<div style="clear: both"></div>
	</div>
	<div style="clear: both"></div>
</div>

<script type="text/javascript">

function hidemessage(){
    jQuery("#errormsgdiv").slideUp();
}


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
		
		if($('#frm')){
			$('#frm').submit();
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

function checkmobile(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	if (unicodes!=8)
	{ 
	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 46 )){
	            return true;
		}else{
			return false;
		}
	}
}


</script>
<script type="text/javascript">
getId('<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iCountryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iMemberId'];?>
');
function getId(id,id1){
	//alert("hi");
	var CountryId = id;
	var iMemberId = id1;		
	getCountry(CountryId,iMemberId);	
}
function getCountry(CountryId,iMemberId)
{
	//alert(CountryId);
	//alert(iMemberId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	extra+='&iMemberId='+iMemberId;
	//alert(extra);
	
	if($('#selectedstate')){
		if($('#selectedstate').val() !=''){
			var selectedstate = $('#selectedstate').val();
			extra+='&selectedstate='+selectedstate;   
		}        
	}
	
	//alert("ok");
	var url = admin_url+"/index.php?file=m-statelist";
	//alert(url);
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		//alert(data);
		if($('#showallstates')){
			$('#showallstates').html(data);			
		}
	});
}
</script>
<script type="text/javascript">
getId('<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iBizCountryId'];?>
','<?php echo $_smarty_tpl->getVariable('db_mem')->value[0]['iMemberId'];?>
');
function getId(id,id1){
	//alert("hi Biz");
	var CountryId = id;
	var iMemberId = id1;		
	getCount(CountryId,iMemberId);	
}
function getCount(CountryId,iMemberId)
{
	//alert(CountryId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	extra+='&iMemberId='+iMemberId;
	//alert(extra);
	
	if($('#selectedstate')){
		if($('#selectedstate').val() !=''){
			var selectedstate = $('#selectedstate').val();
			extra+='&selectedstate='+selectedstate;   
		}        
	}
	
	//alert("ok");
	var url = admin_url+"/index.php?file=m-bizstatelist";
	//alert(url);
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		//alert(data);
		if($('#showtates')){
			$('#showstates').html(data);
		}
	});
}
</script>
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dBirthdate').datepicker({dateFormat: 'mm-dd-yy'});});
 });
 </script>
 