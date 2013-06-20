<?php /* Smarty version Smarty-3.0.7, created on 2013-01-06 23:46:32
         compiled from "/home/qmemedia/public_html/admin/templates/postjob/postjob.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179032360950ea6138895297-22444108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d43f8ca5422cf64f03354339183291e888254b8' => 
    array (
      0 => '/home/qmemedia/public_html/admin/templates/postjob/postjob.tpl',
      1 => 1356511725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179032360950ea6138895297-22444108',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

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
/index.php?file=pj-postjob&mode=view">Post Job</a></li>
		<li>/</li>
		<li class="current"><?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>Add Post Job<?php }else{ ?>Edit Post Job<?php }?></li>
	</ul>
</div>
<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<h2 class="left">Add Post</h2>
			<?php }else{ ?>
			<h2 class="left">Edit Post</h2>
			<?php }?>
		</div>
		<div class="contentbox" id="tabs-1">
			<form id="frmadd" name="frmadd" action="index.php?file=pj-postjob_a" enctype="multipart/form-data" method="post">
			<input type="hidden" name="iPostJobId" id="iPostJobId" value="<?php echo $_smarty_tpl->getVariable('iPostJobId')->value;?>
" />
			<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
			<input type="hidden" name="selectedstate" id="selectedstate" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['iStateId'];?>
"/>
				<div class="inputboxes">
					<label for="textfield"><strong>What skill are you looking for?:</strong></label>
					<input type="text" id="vSkill" name="Data[vSkill]" class="inputbox" lang="*" title="What skill are you looking for" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vSkill'];?>
"/>
				</div>
				
				<div class="inputboxes" >
					<label for="textfield" style="width:500px;"><strong>What do you need this person to do?:</strong></label>
				</div>
				<textarea id="tDescription" name="Data[tDescription]" class="inputbox" lang="*" title="What do you need this person to do" style="width:500px;height:123px;margin-left: 140px;"><?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['tDescription'];?>
</textarea>
				<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Skills:</strong></label>
					<?php if (count($_smarty_tpl->getVariable('db_skill')->value)>0){?>
					<select multiple name="iSkillId[]" id="iSkillId" title="Skills" lang="*" style="width:227px;">
						
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_skill')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value="<?php echo $_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSkillId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iSkillId'],$_smarty_tpl->getVariable('relatedArr')->value)){?> selected <?php }?>><?php echo $_smarty_tpl->getVariable('db_skill')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vSkill'];?>
</option>
						<?php endfor; endif; ?>
					</select>
					<?php }?>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Interests:</strong></label>
					<?php if (count($_smarty_tpl->getVariable('db_interest')->value)>0){?>
					<select multiple name="iInterestId[]" id="iInterestId" title="Interests" lang="*" style="width:227px;">
						
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_interest')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value="<?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iInterestId'];?>
" <?php if (in_array($_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iInterestId'],$_smarty_tpl->getVariable('relatedArrIntrest')->value)){?> selected <?php }?>><?php echo $_smarty_tpl->getVariable('db_interest')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vInterest'];?>
</option>
						<?php endfor; endif; ?>
					</select>
					<?php }?>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Other Interest:</strong></label>
					<input type="text" id="vOtherInterest" name="Data[vOtherInterest]" class="inputbox"  title="Other Interest" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vOtherInterest'];?>
"/>
				</div>
				 <div class="inputboxes">
					<label for="textfield"><strong>Country:</strong></label>
					<select id="iCountryId" name="Data[iCountryId]" lang="*" title="Country" onchange="getCountry(this.value)" style="width:227px;">
						<option value=''>--Select Country--</option>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('db_con')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
						<option value='<?php echo $_smarty_tpl->getVariable('db_con')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId'];?>
' <?php if ($_smarty_tpl->getVariable('db_con')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['iCountryId']==$_smarty_tpl->getVariable('db_postjob')->value[0]['iCountryId']){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('db_con')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['vCountry'];?>
</option>
						<?php endfor; endif; ?>
					</select>                
				</div>             
                                	 
				 <div class="inputboxes">
					<label for="textfield"><strong>State:</strong></label>
					<div id="showallstates">					
						<select id="iStateId" name="Data[iStateId]" title="State"  lang="*"  style="width:227px">							
						<option value=''>--Select State--</option>
					    </select>	
					</div>				 
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>City:</strong></label>
					<input type="text" id="vCity" name="Data[vCity]" class="inputbox" title="City" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vCity'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Zip:</strong></label>
					<input type="text" id="vZip" name="Data[vZip]" class="inputbox" title="Zip" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vZip'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Mile:</strong></label>
					<input type="text" id="vMile" name="Data[vMile]" class="inputbox" title="Mile" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['vMile'];?>
" onkeypress="return checkprice(event);"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
						<select id="eStatus" name="Data[eStatus]" style="width:224px;">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_postjob')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_postjob')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
					</select>
				</div>
				<br/>
				<br/>
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				<input type="submit" value="Add Post" class="btn" title="Add Post" onclick="return validate(document.frmadd);" style="margin-left:139px;"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Post" class="btn" title="Edit Post" onclick="return validate(document.frmadd);" style="margin-left:139px;"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
			</form>
		</div>
	</div>
</div>

<script>
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=pj-postjob&mode=view";
    return false;
}


</script>
<script>
getId('<?php echo $_smarty_tpl->getVariable('db_postjob')->value[0]['iCountryId'];?>
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
	var url = admin_url+"/index.php?file=pj-ajcountrylist";
	var pars = extra;
    //alert(url+pars);
	$.post(url+pars,
            function(data) {
      // alert(data);
		if($('#showallstates')){
			$('#showallstates').html(data);
          
		}
	});
}
</script>



