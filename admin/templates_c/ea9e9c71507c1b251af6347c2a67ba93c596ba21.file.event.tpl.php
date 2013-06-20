<?php /* Smarty version Smarty-3.0.7, created on 2012-07-13 18:04:32
         compiled from "/var/www/qme_theme/admin/templates/events/event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1979657634500015d895a823-71372396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea9e9c71507c1b251af6347c2a67ba93c596ba21' => 
    array (
      0 => '/var/www/qme_theme/admin/templates/events/event.tpl',
      1 => 1342177781,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1979657634500015d895a823-71372396',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script language="JavaScript" src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_javascript"];?>
jquery.js"></script>
<script>
stateArr = new Array(<?php echo $_smarty_tpl->getVariable('stateArr')->value;?>
);
</script>
<div id="content">
	<form id="frmadd" name="frmadd" action="index.php?file=e-event_a" method="post" enctype="multipart/form-data">
        <!-- Table styles start -->           
        <div class="container half left">
		<div class="conthead">
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<h2 class="left">Create Event</h2>
			<?php }else{ ?>
			
			<h2 class="left">Modify Event</h2>
			<?php }?>
		</div>
                <div class="contentbox">
			
			
				<input type="hidden" name="action" id="action" value="<?php echo $_smarty_tpl->getVariable('mode')->value;?>
" />
				<input type="hidden" name="iEventId" id="iEventId" value="<?php echo $_smarty_tpl->getVariable('iEventId')->value;?>
" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
" />
					
					<div class="inputboxes">
						<label for="textfield"><strong>Event Title:</strong></label>
						<input type="text" id="vTitle" name="Data[vTitle]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vTitle'];?>
" lang="*" title="Title"/>
					</div>
					<div class="inputboxes">
						<label for="textfield"><strong>Event Location:</strong></label>
						<input type="text" id="vLocation" name="Data[vLocation]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vLocation'];?>
" lang="*" title="Location"/>
					</div>
					
					
					<div class="inputboxes">
						<label for="textfield"><strong>Event Description</strong></label>
						<input type="text" id="vDescription"  name="Data[vDescription]" class="inputbox" lang="*" title="Description" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vDescription'];?>
"/>
					</div>
					
					<div class="inputboxes">
						<label for="textfield"><strong>EventDate:</strong></label>
						<input type="text" id="dEventDate" name="Data[dEventDate]" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['dEventDate'];?>
" lang="*" title="EventDate"/>
					</div>
					
					<div style="display:block;">
					<div class="inputboxes">
						<label for="textfield"><strong>EventImage:</strong></label>
						<input type="file" id="vEventImage" name="vEventImage" class="inputbox" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
"  title="vEventImage" onchange="CheckValidFile(this.value,this.name)"/>
					</div>
					<?php if ($_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage']!=''){?>
					
					<div style="float:left; width:450px;">
					<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
view.png"/></a></div>
					<p style="margin:26px 0 10px 0;"><img src="<?php ob_start();?><?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_images"];?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
delete.png" onclick="ImageDelete();"/></p>
					
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
								<div><img src="<?php echo $_smarty_tpl->getVariable('tconfig')->value["tsite_upload_images_event"];?>
<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['iEventId'];?>
/<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vEventImage'];?>
" /></div>
								
								</div>
							</div>
						</div>
					</div>
					<?php }?>
					</div>
				<br><br><br><br>
			
			<?php if ($_smarty_tpl->getVariable('mode')->value=='add'){?>
			<input type="submit" value="Create Event" class="btn" onclick="return validate(document.frmadd);" title="Create Event"/>
			<?php }else{ ?>
			<input type="submit" value="Modify Event" class="btn" onclick="return validate(document.frmadd);" title="Modify Event"/>
			<?php }?>
			<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
				
                </div>
        </div>
	<div class="container half right">
                <div class="conthead">
                    	<h2>Vault File</h2>
                </div>
                <div class="contentbox">
			
			
			
			<div class="inputboxes">
			<label for="textfield"><strong>Item Description:</strong></label>
			<input type="text" id="vItemDescription"  name="Data[vItemDescription]" class="inputbox" lang="*" title="ItemDescription" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vItemDescription'];?>
"/>
			</div>
			<div class="inputboxes">
			<label for="textfield"><strong>Price(USD):</strong></label>
			<input type="text" id="vPrice"  name="Data[vPrice]" class="inputbox" lang="*N" title="vPrice" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['vPrice'];?>
" onkeypress="return checkprice(event);"/>
			</div>
			<div class="inputboxes">
			<label for="textfield"><strong>SalesLimit:</strong></label>
			<input type="text" id="iSalesLimit"  name="Data[iSalesLimit]" class="inputbox" lang="*N" title="SalesLimit" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['iSalesLimit'];?>
" onkeypress="return checkprice(event);"/>
			</div>
			<div class="inputboxes">
			<label for="textfield"><strong>TicketLimit:</strong></label>
			<input type="text" id="iTicketLimit"  name="Data[iTicketLimit]" class="inputbox" lang="*N" title="TicketLimit" value="<?php echo $_smarty_tpl->getVariable('db_eve')->value[0]['iTicketLimit'];?>
" onkeypress="return checkprice(event);"/>
			</div>
			<div class="inputboxes">
			<label for="textfield"><strong>Create As Ticket:</strong></label>
			<input type="checkbox" id="eCreateAsTicket" name="eCreateAsTicket" value="1" <?php if ($_smarty_tpl->getVariable('db_eve')->value[0]['eCreateAsTicket']==1){?>checked<?php }?>>
			</div>
			<div class="inputboxes">
			<label for="textfield"><strong>Hide Vault Entry:</strong></label>
			<input type="checkbox" id="eHideVaultEntry" name="eHideVaultEntry" value="1" <?php if ($_smarty_tpl->getVariable('db_eve')->value[0]['eHideVaultEntry']==1){?>checked<?php }?>>
			</div>  		
			
			
			
                
		</div>
		</form>
        <!-- Table styles end -->
</div>

<script>
function redirectcancel(){
    var admin_url = '<?php echo $_smarty_tpl->getVariable('admin_url')->value;?>
';
    var file = 'e-event';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=e-event&mode=view";
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

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
 
<script type="text/javascript">
 $(document).ready(function() {
 $(function() {$('#dEventDate').datepicker({dateFormat: 'yy-mm-dd'});});
 });
 </script>

