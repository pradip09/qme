<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=pro-product&mode=view">General Item</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add General Item{else}Edit General Item{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add General Items</h2>
		{else}
		
		<h2 class="left">Edit General Items</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
        								    				             
              <form id="frmadd" name="frmadd" action="index.php?file=pro-product_a" enctype="multipart/form-data" method="post">
        
          			<input type="hidden" name="iProductId" id="iProductId" value="{$db_product[0].iProductId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_product[0].vProductImage}" />
                <!--<input type="hidden" name="selectedstore" id="selectedstore" value="{$db_product[0].iStoreId}"/>-->
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select  style="width:224px;" id="iMemberId" name="Data[iMemberId]"  title="Member" lang="*" onchange="getMember(this.value);" >
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_Genmember}
						<option value='{$db_Genmember[i].iMemberId}' {if $db_Genmember[i].iMemberId eq $db_product[0].iMemberId}selected{/if}>{$db_Genmember[i].vName}</option>
						{/section}
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
					<label for="textfield"><strong>Product Name:</strong></label>
					<input type="text" id="vProductName" name="Data[vProductName]" class="inputbox" value="{$db_product[0].vProductName}" lang="*" title="Product Name"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Seller Name:</strong></label>
					<input type="text" id="vSellerName" name="Data[vSellerName]" class="inputbox" value="{$db_product[0].vSellerName}" lang="*" title="Seller Name"/>
				</div>
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Description:</strong></label>
					<textarea id="tDescription" name="Data[tDescription]" class="inputbox" rows="6" cols="30"> {$db_product[0].tDescription}</textarea>
				</div>
				
				
					<div class="inputboxes">
					<label for="textfield" style="margin-bottom: 7px;"><strong>Upload New Image:</strong></label>
					{if $db_product[0].vProductImage eq ''}
					<input type="file" id="vProductImage" name="vProductImage" class="inputbox" value="{$db_product[0].vProductImage}"  title="Product Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{else}
					<input type="file" id="vProductImage" name="vProductImage" class="inputbox" value="{$db_product[0].vProductImage}"  title="Product Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{/if}
					
					{if $db_product[0].vProductImage neq ''}
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin-left: 120px;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_store"]}/1/{$db_product[0].iProductId}/{$db_product[0].vProductImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				<div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="{$db_product[0].fPrice}" onkeypress="return checkprice(event);" lang="*" title="Price" maxlength="12"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Shipping Cost:</strong></label>
					<input type="text" id="iShippingCost" name="Data[iShippingCost]" class="inputbox" value="{$db_product[0].iShippingCost}" onkeypress="return checkprice(event);" lang="*" title="Shipping Cost" maxlength="12"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" {if $db_product[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_product[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
                    
				</div>
                
               			{if $mode eq add}
   				<input type="submit" value="Add General Items" class="btn" onclick="return validate(document.frmadd);" title="Add General Items" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit General Items" class="btn" onclick="return validate(document.frmadd);" title="Edit General Items" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
        
</div>


        
	</div>
</div>
{literal}

<script type="text/javascript">
getId('{/literal}{$db_product[0].iMemberId}{literal}');
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

	var url = admin_url+"/index.php?file=pro-ajmemberlist";
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

function checkprice(events)
{
     
	var unicodes=events.charCode? events.charCode :events.keyCode;
	
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
    var file = 'pro-product';
    window.location=admin_url+"/index.php?file=pro-product&mode=view";
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
{/literal}


