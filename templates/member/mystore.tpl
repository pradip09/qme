<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductajax.js"></script>

<div id="services_box" class="desboard_body" style="padding-bottom:0px;"> {include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right" style="padding-bottom:30px;">
	<div class="MyVedioTitle">
		<h1>My Store</h1>
	</div>
	<div class="upgrade_store" style="float:right;padding-top: 14px;padding-right: 8px;"><a href="{$site_url}/mystoreplan"><img src="{$tconfig["front_images"]}upgrade_store.png"></a></div>
	<div class="cl"></div>
	<div class="mystore_container">
		<div id="store_listingDiv">
			<div id="page-right">
				<div class="group services-overview-item"><img width="157" height="140" alt="Brand &amp; Identity Design" title="Brand &amp; Identity Design" src="{$tconfig["tsite_upload_images_store"]}{$db_store[0].iStoreCategoryId}/2_{$db_store[0].vStoreImage}">
					<div class="gradiont"><img src="{$tconfig["front_images"]}gradiont.png" width="155" height="10" alt="" /></div>
					<div class="btn_view"><a href="{$site_url}/myproducts/{$db_store[0].iStoreCategoryId}"><img src="{$tconfig["front_images"]}btn_view.png" alt="" /></a></div>
					<a href="#" style="text-decoration:none;">
					<div class="item_title">{$db_store[0].vStoreCategory}</div>
					</a>
					<p class="txtp">{$db_store[0].tDescription}</p>
					<div style="text-align:center;">
					{if $tot_storeitem eq '' || $tot_storeitem < $db_storeplan[0].item_limit}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/mygeneralproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png"  alt="" /></a>
					{elseif $tot_storeitem < $db_storeplan[0].item_limit && $db_plan[0]['iPlanId'] == '1' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/mygeneralproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png"  alt="" /></a>
					{elseif $tot_storeitem < $bronze_limit && $db_plan[0]['iPlanId'] == '2' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/mygeneralproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png"  alt="" /></a>
					{elseif $tot_storeitem < $silver_limit && $db_plan[0]['iPlanId'] == '3' && $db_plan[0]['eTransactionStatus'] == 'Success'} 
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/mygeneralproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png"  alt="" /></a>
					{elseif $db_plan[0]['iPlanId'] == '4' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/mygeneralproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png"  alt="" /></a>
					{/if}
					</div>
				</div>
				<div class="group services-overview-item"><img width="157" height="140" alt="Brand &amp; Identity Design" title="Brand &amp; Identity Design" src="{$tconfig["tsite_upload_images_store"]}{$db_store[1].iStoreCategoryId}/2_{$db_store[1].vStoreImage}">
					<div class="gradiont"><img src="{$tconfig["front_images"]}gradiont.png" width="155" height="10" alt="" /></div>
					<div class="btn_view"><a href="{$site_url}/myproducts/{$db_store[1].iStoreCategoryId}"><img src="{$tconfig["front_images"]}btn_view.png" alt="" /></a></div>
					<a href="#" style="text-decoration:none;">
					<div class="item_title">{$db_store[1].vStoreCategory}</div>
					</a>
					<p class="txtp">{$db_store[1].tDescription}</p>
					<div style="text-align:center;">
					{if $tot_storeitem eq '' || $tot_storeitem < $db_storeplan[0].item_limit}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myclothingproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $db_storeplan[0].item_limit && $db_plan[0]['iPlanId'] == '1' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myclothingproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $bronze_limit && $db_plan[0]['iPlanId'] == '2' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myclothingproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $silver_limit && $db_plan[0]['iPlanId'] == '3' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myclothingproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $db_plan[0]['iPlanId'] == '4' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myclothingproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{/if}
					</div>
				</div>
				<div class="group services-overview-item"><img width="157" height="140" alt="Brand &amp; Identity Design" title="Brand &amp; Identity Design" src="{$tconfig["tsite_upload_images_store"]}{$db_store[2].iStoreCategoryId}/2_{$db_store[2].vStoreImage}">
					<div class="gradiont"><img src="{$tconfig["front_images"]}gradiont.png" width="155" height="10" alt="" /></div>
					<div class="btn_view"><a href="{$site_url}/myproducts/{$db_store[2].iStoreCategoryId}"><img src="{$tconfig["front_images"]}btn_view.png" alt="" /></a></div>
					<a href="#" style="text-decoration:none;">
					<div class="item_title">{$db_store[2].vStoreCategory}</div>
					</a>
					<p class="txtp">{$db_store[2].tDescription}</p>
					<div style="text-align:center;">
					{if $tot_storeitem eq '' || $tot_storeitem < $db_storeplan[0].item_limit}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myautomotiveproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $db_storeplan[0].item_limit && $db_plan[0]['iPlanId'] == '1' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myautomotiveproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $bronze_limit && $db_plan[0]['iPlanId'] == '2' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myautomotiveproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $silver_limit && $db_plan[0]['iPlanId'] == '3' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myautomotiveproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $db_plan[0]['iPlanId'] == '4' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myautomotiveproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{/if}
					</div>
				</div>
				<div class="group services-overview-item" style="margin-right:0;"><img width="157" height="140" alt="Brand &amp; Identity Design" title="Brand &amp; Identity Design" src="{$tconfig["tsite_upload_images_store"]}{$db_store[3].iStoreCategoryId}/2_{$db_store[3].vStoreImage}">
					<div class="gradiont"><img src="{$tconfig["front_images"]}gradiont.png" width="155" height="10" alt="" /></div>
					<div class="btn_view"><a href="{$site_url}/myproducts/{$db_store[3].iStoreCategoryId}"><img src="{$tconfig["front_images"]}btn_view.png" alt="" /></a></div>
					<a href="#" style="text-decoration:none;">
					<div class="item_title">{$db_store[3].vStoreCategory}</div>
					</a>
					<p class="txtp">{$db_store[3].tDescription}</p>
					<div style="text-align:center;">
					{if $tot_storeitem eq '' || $tot_storeitem < $db_storeplan[0].item_limit}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myrealestateproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $db_storeplan[0].item_limit && $db_plan[0]['iPlanId'] == '1' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myrealestateproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $bronze_limit && $db_plan[0]['iPlanId'] == '2' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myrealestateproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $tot_storeitem < $silver_limit && $db_plan[0]['iPlanId'] == '3' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myrealestateproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{elseif $db_plan[0]['iPlanId'] == '4' && $db_plan[0]['eTransactionStatus'] == 'Success'}
						<a class="btn-learn-more" title="Branding &amp; Identity Design Services" target="_self" href="{$site_url}/myrealestateproduct_add/add"><img src="{$tconfig["front_images"]}/btn_more.png" width="98" height="30" alt="" /></a>
					{/if}
					</div>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div class="my_str_upd_cont">
				<div class="top_upload_text">Upload a video or image to display on your store home page
				<div id="divContactid" class="error_massage"></div></div>
				<form name="formImage" id="formImage" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajuploadimage">
					<input  type="hidden" id="totcount" name="totcount" value="{$totgal}"/>
					
					<input type="hidden" name="mode" id="mode" value="{$mode}" />
					<div id="TextBoxesGroup">
						
						{if $totpublicdata eq 0 and $totgal eq 1 and $flag eq 0}
						<div id="TextBoxDiv0" >
							<div class="my_str_upd_video" >
								<label>Upload Video</label>
								<input  type="file" name="vVideoFile" id="vVideoFile" onchange="CheckValidVideoFile(this.value,this.id)">
							</div>
						<div class="my_str_upd_img" >
								<label>Upload image</label>
								<div class="reapt_div_file" >
									<input type="file" name="vImageFile[]" id="vImageFile" onchange="CheckValidFile(this.value,this.id)">
									<img style="cursor:pointer;" id="addButton" src="{$tconfig["front_images"]}add_store_btn.png"/> 
								</div>
						</div>
						</div>
						
						{else}
						<div id="TextBoxDiv0" >
							<input type="hidden" name="vOldVideo" id="vOldVideo" value="{$db_store_public_video[0].vFile}">
							<div  class="my_str_upd_video" >
								<label>Upload Video</label>
								<input  type="file" name="vVideoFile" id="vVideoFile" onchange="CheckValidVideoFile(this.value,this.id)">
								{if $db_store_public_video[0].vFile neq ''}
								<div class="viewimage" style="padding-right:206px;"> <a href="#Videofile" id="videofile"> <img  style="cursor:pointer;" src="{$tconfig["front_images"]}play-icon.png"/> </a> </div>
								<div style="display:none;">
									<div id="Videofile">
										<div>
											<div>
												<embed src="{$tconfig["tsite_music"]}/player.swf" height="300" width="430" allowscriptaccess="always" allowfullscreen="true" flashvars="&controlbar=over&file={$tconfig["tsite_upload_images_public_store_images"]}{$db_store_public_video[0].iMemberId}/{$db_store_public_video[0].vFile}&plugins=sharing-2"/>
												</object>
											</div>
										</div>
									</div>
								</div>
								<img  style="cursor:pointer;" src="{$tconfig["front_images"]}delete_btn.png" onclick="deletevideo();"/>
								{else}
								{/if}
								 
								 
							</div>
							{if $db_store_public_image[0].vFile eq ''}	
							<div class="my_str_upd_img" >
								<label>Upload image</label>
								<div class="reapt_div_file" >
									<input type="file" name="vImageFile[]" id="vImageFile" onchange="CheckValidFile(this.value,this.id)">
									<img style="cursor:pointer;" id="addButton" src="{$tconfig["front_images"]}add_store_btn.png"/> 
								</div>
							</div>
							{/if}
							{if  $db_store_public_image|@count gt 0}
							<div class="my_str_upd_img"><label>Upload Image</label></div>
							{section name=i loop=$db_store_public_image}
							<div id="TextBoxDiv{$smarty.section.i.index}">
								<input type="hidden" name="vOldImage[]" id="vOldImage" value="{$db_store_public_image[i].vFile}">
								<input type="hidden" name="iFileId[]" id="iFileId" value="{$db_store_public_image[i].iFileId}">
									
								<div class="reapt_div_file">
									<input type="file" name="vImageFile[]" id="vImageFile" onchange="CheckValidFile(this.value,this.id)"  >
									{if $db_store_public_image[i].vFile neq ''}
									<a href="#galdis{$smarty.section.i.index}" style="margin-left:5px;" id="popgal{$smarty.section.i.index}"><img style="cursor:pointer;" src="{{$tconfig["tsite_images"]}}view.png"/></a>
									
									<div style="display:none;">
										<div id="galdis{$smarty.section.i.index}">
											<div class="">
												<div><img src="{$tconfig["tsite_upload_images_public_store_images"]}{$db_store_public_image[i].iMemberId}/{$db_store_public_image[i].vFile}"></div>
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
									
									{if $smarty.section.i.index eq 0}									
										 <img name="Remove" id="remove" style="cursor:pointer;" src="{$tconfig["front_images"]}delete_str.png" onclick="deleterow({$smarty.section.i.index},{$db_store_public_image[i].iFileId});">
											<img id="addButton" style="cursor:pointer;" src="{$tconfig["front_images"]}add_store_btn.png"/>
									
									{else}									
										<img name="Remove" id="remove" style="cursor:pointer;" src="{$tconfig["front_images"]}remove_store.png" onclick="deleterow({$smarty.section.i.index},{$db_store_public_image[i].iFileId});">
									{/if} 
									</div>
								
							</div>
							{/section}
							{/if}
							</div>
						{/if}
					</div>
				</form>
				<div class="submitbutton_new">
					<input type="image" style="cursor:pointer;" src="{$tconfig["front_images"]}save-btn.png" value="Submit" onclick="uploadImage();"/>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
//displayallstore(0,'{/literal}{$iUserId}{literal}');


function uploadImage(){
	
	//alert("hi");
	/*if($('#vVideoFile').val() =='' || $('#vImageFile').val(1) =='' || $('#vImageFile').val(2) =='' || $('#vImageFile').val(3) =='') 
		{
			$('#divContactid').html("Please select one field").addClass('errormsg').fadeTo(900,1);
			return false;
		}*/
		
	
	$('#divContactid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);	
	$("#formImage").ajaxForm({
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
	
function CheckValidVideoFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'flv' || a == 'avi' || a == 'mp4')
	return true;
	alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (flv,mp4,avi)  Files!!!');
	document.getElementById(name).value = "";
	return false; 
}	
	
	



$(document).ready(function(){
    var counter = $('#totcount').val();
    
    $("#addButton").click(function () {
    //alert($('#totcount').val());
    if($('#totcount').val() >= 3){
        alert("Only allow 3 images to upload.");
        return false;
    }   
 
    var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
       
    
        var html ='';
        
	html +='<div id="TextBoxDiv0" >';	
		html +='<div class="reapt_div_file"><input type="file" name="vImageFile[]" id="vImageFile" onchange="CheckValidFile(this.value,this.id)">';
		html +='<img name="Remove" style="cursor:pointer;" id="remove" src="http://192.168.1.12/qme/public/images/remove_store.png" onclick="deleterow('+counter+');">';
		html +='</div>';	
	html +='</div>';
	
       
       
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

function deleterow(divid,imgid){
  //alert($('#totcount').val());
  //alert(divid);
  //alert(imgid);
  var extra = '&deleteimg=deleteimg';
	extra+='&FileId='+imgid;
	var url = site_url+"/index.php?file=a-ajuploadimage";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
		function(data) {
		window.location='{/literal}{$site_url}{literal}'+'/mystore/';
	});
  $("#TextBoxDiv" + divid).remove();
  var counter = $('#totcount').val()-1; ;
  //alert(counter);
   //counter--;
  $('#totcount').val(counter);
}

$(document).ready(function(){
$('#videofile').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});


function deletevideo()
{
	var videofile = $('#vOldVideo').val();
	var extra = '&deletevideo=deletevideo';
	//extra+='&videofile='+videofile;
	var url = site_url+"/index.php?file=a-ajuploadimage";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
		function(data) {
		window.location='{/literal}{$site_url}{literal}'+'/mystore/';
	});


}
	


</script>
{/literal} 