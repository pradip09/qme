<?php /* Smarty version Smarty-3.0.7, created on 2012-07-20 13:19:16
         compiled from "/var/www/qme_theme/admin/templates/postcampaign/postcampaign.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99216010150090d7c9b6cd0-01428429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0910b79019ae7047bc19b21f0a8980c3597b80b' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/postcampaign/postcampaign.tpl',
      1 => 1342770548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99216010150090d7c9b6cd0-01428429',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_admin_creditor_url"];?>
/ckeditor.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
datetimepicker.js"></script>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tcp_javascript'];?>
jwplayer.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />

<div id="content">
	<div class="container" id="tabs">
		<div class="conthead">
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<h2 class="left">Post Campaign</h2>
			<?php }else{ ?>
			<h2 class="left">Edit Campaign</h2>
			<?php }?>
		</div>
	</div>
	<div class="contentbox" style="padding:0 !important">
		<form id="frmadd" name="frmadd" action="index.php?file=pc-postcampaign_a" enctype="multipart/form-data" method="post">
		<input type="hidden" name="iCampaignId" id="iCampaignId" value="<?php echo $_smarty_tpl->getVariable('iCampaignId')->value;?>
" />
		<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
		<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vImage'];?>
" />
		<input type="hidden" name="vOldMp3" id="vOldMp3" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMp3File'];?>
" />
		<input type="hidden" name="vOldVideo" id="vOldVideo" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vVideoFile'];?>
" />
		
		<div class="container half left">
			<div class="conthead">
				<h2>Create a Campaign</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Name</strong></label>
					<input type="text" id="vCampaignName" name="Data[vCampaignName]" class="inputbox" lang="*" title="Ad Name" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vCampaignName'];?>
"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Content</strong></label>
				</div>
				<textarea id="tContent" name="Data[tContent]" class="inputbox" title="Ad Content"><?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['tContent'];?>
</textarea>
				<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Image:</strong></label>
					<?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['vImage']==''){?>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vImage'];?>
"  title="Ad Image" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
					<?php }else{ ?>
					<input type="file" id="vImage" name="vImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vImage'];?>
"  title="Ad Image" onchange="CheckValidFile(this.value,this.name)"/>
					<?php }?>
					
					<?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['vImage']!=''){?>
					<div style="float:right; width:358px;">
						<div style="float:left; margin:10px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
						<p style="margin:10px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_campaign"];?>
/admin/<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iAdminId'];?>
/<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vImage'];?>
" /></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
				<div style="clear:both;"></div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Campaign Interest:</strong></label>
					<input type="text" id="vInterest" name="Data[vInterest]" class="inputbox" title="Campaign Interest" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vInterest'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Industry:</strong></label>
					<input type="text" id="vIndustry" name="Data[vIndustry]" class="inputbox" title="Industry" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vIndustry'];?>
"/>
				</div>
				<input type="hidden" name="box1" value="0" /> <input type="checkbox" name="box1" value="1" />
				<!--<div class="inputboxes">
					<label for="textfield"><strong>Is this a local community campaign?:</strong></label>
					<input type="hidden" name="cBox[0]" value="" />
					<label for="textfield"><input type="checkbox" id="cBox" name="cBox[0]" value="Yes" <?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['eIsLocal']=='Yes'){?>checked<?php }?>><strong>Yes</strong></label>
					<input type="hidden" name="cBox[1]" value="" />
					<label for="textfield"><input type="checkbox" id="cBox" name="cBox[1]" value="No" <?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['eIsLocal']=='No'){?>checked<?php }?>><strong>No</strong></label>
				</div>
				-->
				<div class="inputboxes">
					<label for="textfield"><strong>Choose a zip code:</strong></label>
					<input type="text" id="vZipCode" name="Data[vZipCode]" class="inputbox" title="Zip Code" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vZipCode'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose mile radius from your location:</strong></label>
					<input type="text" id="vMileRadius" name="Data[vMileRadius]" class="inputbox" title="Zip Code" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMileRadius'];?>
"/>
				</div>
				<!--
				<div class="inputboxes">
					<label for="textfield"><strong>Is this a National community campaign?:</strong></label>
					<label for="textfield"><input type="checkbox" id="eIsNational" name="eIsNational[0]" value="Yes" <?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['eIsNational']=='Yes'){?>checked<?php }?>><strong>Yes</strong></label>
					<label for="textfield"><input type="checkbox" id="eIsNational" name="eIsNational[1]" value="No" <?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['eIsNational']=='No'){?>checked<?php }?>><strong>No</strong></label>
				</div>
				-->
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Start Date:</strong></label>
					<input type="text" id="dStartDate" name="Data[dStartDate]" class="inputbox" title="Ad Start Date" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['dStartDate'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ad Finish Date:</strong></label>
					<input type="text" id="dFinishDate" name="Data[dFinishDate]" class="inputbox" title="Ad Finish Date" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['dFinishDate'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Points for viewing Ad:</strong></label>
					<input type="text" id="iPointsViewingAd" name="Data[iPointsViewingAd]" class="inputbox" title="Points for viewing Ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iPointsViewingAd'];?>
"/>
				</div>
				
				
			</div>
		</div>
		
		<div class="container half right">
			<div class="conthead">
				<h2>Radio Ad</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<div>
						<label for="textfield"><strong>Upload Mp3 File:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMp3File']==''){?>
						<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMp3File'];?>
"  title="Mp3 File" lang="*" onchange="CheckAudioValidFile(this.value,this.id)"/>
						<?php }else{ ?>
						<input type="file" id="vMp3File" name="vMp3File" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMp3File'];?>
"  title="Mp3 File" onchange="CheckAudioValidFile(this.value,this.id)"/>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMp3File']!=''){?>
					<div style="float:left; width:450px;">
						<div style="width:260px; float:left; margin-left:135px;">
							<object type="application/x-shockwave-flash" data="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer-bubble.swf" width="250" height="65" id="dewplayer" name="dewplayer">
								<param name="wmode" value="transparent" />
								<param name="movie" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/dewplayer-bubble.swf" />
								<param name="flashvars" value="mp3=<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_campaign"];?>
/admin/<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iAdminId'];?>
/<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vMp3File'];?>
&amp;showtime=1&amp;randomplay=1&amp;nopointer=1" />
							</object>
						</div>
						<div style="width:50px; float:right">
							<p style="margin:10px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp3=ob_get_clean();?><?php echo $_tmp3;?>
delete.png" onclick="Mp3Delete();"/></p>
						</div>
					</div>
					<?php }?>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts to Listen To radio ad:</strong></label>
					<input type="text" id="iPointsListenAd" name="Data[iPointsListenAd]" class="inputbox" title="Ponts to Listen To radio ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iPointsListenAd'];?>
"/>
				</div>
				
				
			</div>
		</div>
		
		<div class="container half right">
			<div class="conthead">
				<h2>Commercial Ad</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<div>
						<label for="textfield"><strong>Upload Video File:</strong></label>
						<?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['vVideoFile']==''){?>
						<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vVideoFile'];?>
"  title="VideoFile" lang="*" onchange="CheckAudioValidFile(this.value,this.id)"/>
						<?php }else{ ?>
						<input type="file" id="vVideoFile" name="vVideoFile" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vVideoFile'];?>
"  title="VideoFile" onchange="CheckAudioValidFile(this.value,this.id)"/>
						<?php }?>
					</div>
					<?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['vVideoFile']!=''){?>
					<div style="float:left; width:450px;">
						<div id="video-container">Loading the player ...
							<input type="hidden" id="playerUrl" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value['tsite_music'];?>
/player.swf">
							<input type="hidden" id="videoUrl" value="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_campaign"];?>
/admin/<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iAdminId'];?>
/<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vVideoFile'];?>
">
						</div>
						<div style="width:50px; float:left">
							<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp4=ob_get_clean();?><?php echo $_tmp4;?>
delete.png" onclick="videoDelete();"/></p>
						</div>
					</div>
					<?php }?>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Points to view Commercial ad:</strong></label>
					<input type="text" id="iPointsCommercialAd" name="Data[iPointsCommercialAd]" class="inputbox" title="Ponts to view Commercial ad" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iPointsCommercialAd'];?>
"/>
				</div>
			</div>
		</div>
		
		
		<div class="container half right">
			<div class="conthead">
				<h2>WebLink Option</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Ad URL:</strong></label>
					<input type="text" id="vURL" name="Data[vURL]" class="inputbox" title="Ad URL" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vURL'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts to visit This memeber site:</strong></label>
					<input type="text" id="iPointsWeblinkAd" name="Data[iPointsWeblinkAd]" class="inputbox" title="Ponts to visit This memeber site" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iPointsWeblinkAd'];?>
"/>
				</div>
			</div>
		</div>
		
		<div class="container half right">
			<div class="conthead">
				<h2>BuyLink Option</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Buy Link URL:</strong></label>
					<input type="text" id="vBuyLinkURL" name="Data[vBuyLinkURL]" class="inputbox" title="Buy Link URL" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['vBuyLinkURL'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Ponts When Members buy:</strong></label>
					<input type="text" id="iPontsWhenBuy" name="Data[iPontsWhenBuy]" class="inputbox" title="Points When Members buy" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iPontsWhenBuy'];?>
"/>
				</div>
			</div>
		</div>
		
		<div class="container half right">
			<div class="conthead">
				<h2>Share Option</h2>
			</div>
			<div class="contentbox">
				<label for="textfield"><strong>Point when memebers share to their extended network:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iPointsWhenShare" name="Data[iPointsWhenShare]" class="inputbox" title="Point when memebers share to their extended network" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iPointsWhenShare'];?>
"/>
				</div>
			</div>
		</div>
		
		
		<div class="container half right">
			<div class="conthead">
				<h2>Who Match this campaign</h2>
			</div>
			<div class="contentbox">
				
				<label for="textfield"><strong>Number of members who match this campaign in my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumMatchInCommunity" name="Data[iNumMatchInCommunity]" class="inputbox" title="Number of members who match this amp- aign in my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iNumMatchInCommunity'];?>
"/>
				</div>
				
				<label for="textfield"><strong>Number of members who match this campaign outside of my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumMatchOutCommunity" name="Data[iNumMatchOutCommunity]" class="inputbox" title="Number of members who match this campaign outside of my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iNumMatchOutCommunity'];?>
"/>
				</div>
				
				<label for="textfield"><strong>Number of members who support biz in my community:</strong></label>
				<div class="inputboxes">
					<input type="text" id="iNumSupportBiz" name="Data[iNumSupportBiz]" class="inputbox" title="Number of members who support biz in my community" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iNumSupportBiz'];?>
"/>
				</div>
			</div>
		</div>
		
		
		<div class="container half left">
			<div class="conthead">
				<h2>Member of View/click</h2>
			</div>
			<div class="contentbox">
				<div class="inputboxes">
					<label for="textfield"><strong>Max Ad Views:</strong></label>
					<input type="text" id="iMaxAdViews" name="Data[iMaxAdViews]" class="inputbox" title="Max Ad Views" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iMaxAdViews'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Max Ad Clicks:</strong></label>
					<input type="text" id="iMaxAdClicks" name="Data[iMaxAdClicks]" class="inputbox" title="Max Ad Clicks" lang="*" value="<?php echo $_smarty_tpl->getVariable('db_postcampaign')->value[0]['iMaxAdClicks'];?>
"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status :</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" <?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['eStatus']=='Active'){?>selected<?php }?> >Active</option>
						<option value="Inactive" <?php if ($_smarty_tpl->getVariable('db_postcampaign')->value[0]['eStatus']=='Inactive'){?>selected<?php }?> >Inactive</option>
					</select>
				</div>
				
				<br><br><br>
				
				<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
				<input type="submit" value="Add Post" class="btn" title="Add Post" onclick="return validate(document.frmadd);"/>
				<?php }else{ ?>
				<input type="submit" value="Edit Post" class="btn" title="Edit Post" onclick="return validate(document.frmadd);"/>
				<?php }?>
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
				
			</div>
			
		</div>
		
		
		
		<div style="clear:both;"></div>
		</form>
	</div>
	
</div>

<script>
function redirectcancel(){

    window.location="<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
/index.php?file=pc-postcampaign&mode=view";
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


function Mp3Delete(){
	var r=confirm("Are you sure to delete this Mp3");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteMp3");
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
function videoDelete(){
	var r=confirm("Are you sure to delete this video");
	if (r==true)
	  {
		if($('#action')){
			$('#action').val("DeleteVideo");
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
	CKEDITOR.replace( 'tContent' );

	$(document).ready(function() {
	$(function() {$('#dStartDate').datepicker({dateFormat: 'yy-mm-dd'});});
	});
	
	$(document).ready(function() {
	$(function() {$('#dFinishDate').datepicker({dateFormat: 'yy-mm-dd'});});
	});
</script>

<script type="text/javascript">
	var playerUrl;
	var videoUrl;
	playerUrl = $('#playerUrl').val();	
	videoUrl = $('#videoUrl').val();
	jwplayer("video-container").setup({
	    flashplayer: playerUrl,
	    file: videoUrl,
	      plugins: {
		"sharing-2": {
		  code: "",
		  link: ""
		}
	      },
	    height: 270,
	    width: 450
	});
</script>

