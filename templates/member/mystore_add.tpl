
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>	

<div id="services_box" class="desboard_body">
				<div class="desboard-left">
					<div class="user_name_myaccount">
				<div class="user_photo"><a href="#">
					{if $vProfileImage eq ''}
					
					<img src="{$tconfig["front_images"]}user_img.png" alt="" />
					{else}
					
					<img src="{$tconfig["tsite_upload_images_member"]}/{$mem_info[0].iMemberId}/2_{$mem_info[0].vProfileImage}" alt="" />
					{/if}
				</a></div>
				
				
				
				{$Name}
				
		</div>
					<div class="cl"></div>
					
					{include file="member/myaccountleft.tpl"}
				</div>
				<div class="desboard-right">
					<div class="MyVedioTitle">
						<h1>My Store</h1>
						
					</div>
					<div class="cl"></div>
					
					<div class="MyPhotoContentPart">
				            <ul>
						
				  <div class="myphoto_album">
					{if $mode eq 'add'}					
					<div class="AddneweventTitle">Add Store</div>
					{else}
					<div class="AddneweventTitle">Edit Store</div>
					{/if}
					<div id="divContactid" class="error_massage"></div>
					
					<div id="divmsgidinner" class="myphoto_blankspace"></div>
					
					
					<form id="frmAddStore" name="frmAddStore" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmystore_a">
							
							<input type="hidden" name="iStoreId" id="iStoreId" value="{$db_allstore[0].iStoreId}" />
							<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_allstore[0].vStoreImage}" />
							<input type="hidden" name="mode" id="mode" value="{$mode}" />
							<div class="photo_form_box">
							<table>
								<tr>
									<td>
										<label>Store name :</label>
									</td>
								</tr>
								<tr>
									<td  class="Photo_title">
										<input id="vStoreName" type="text" placeholder="Store Name" name="vStoreName" value="{$db_allstore[0].vStoreName}">
									</td>
								</tr>
								<tr>
									<td>
										<label>Select image :</label>
									</td>
								</tr>
								<tr>
									<td> 
										<div class="imagedisplay"><input type="file" name="vStoreImage" id="vStoreImage" value="{$db_allstore[0].vStoreImage}" onchange="CheckValidFile(this.value,this.name)"/>
										{if $db_allstore[0].vStoreImage neq ''}
								    
											  <div class="viewimage"><a href="#view1" id="test"><img src="{{$tconfig["front_images"]}}view.png"/></a></div></div>
											
											  
											  <div style="display:none;">
												      <div id="view1">
												      <div>
												      <div>
														<img src="{$tconfig["tsite_upload_images_store"]}/{$db_allstore[0].iStoreId}/{$db_allstore[0].vStoreImage}"/>
												      </div>
												      </div>
												      </div>
											  </div>
											  {else}
											  </div>
										{/if}
								    </td>
								</tr>
								
								<tr>
								
									<td  class="myphoto_sub_cal_btn">
									</td>
								</tr>
							</table>
							
							
							</div>
					</form>
					
				<div class="submitbutton">	
				<input type="image" src="{$tconfig["front_images"]}btn_submit.png" value="Submit" onclick="return createstore();"/>	
					<a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}cancle.png"/></a>
				</div>
				  </div>
				
					    </ul>
					</div>
				</div>
				<div class="cl"></div>
			</div>
</div>
{literal}
<script type="text/javascript">

function createstore()
{
	
	
	if($('#vStoreName')){
		if($('#vStoreName').val() ==''){
			$('#divContactid').html("Please enter store Name").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#mode').val() =='add')
	{
			if($('#vStoreImage').val() ==''){
			$('#divContactid').html("Please select Image").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#frmAddStore").ajaxForm({
		target: '#divContactid',
		success: finish
		}).submit();
	
}
function finish()
{
				window.location='{/literal}{$site_url}{literal}'+'/mystore/';
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




