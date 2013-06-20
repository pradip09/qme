<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>
<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=cl-clothing&mode=view">Clothing and Accessories</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add Clothing and Accessories{else}Edit Clothing and Accessories{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Clothing and Accessories</h2>
		{else}
		
		<h2 class="left">Edit Clothing and Accessories</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
        								    				             
              <form id="frmadd" name="frmadd" action="index.php?file=cl-clothing_a" enctype="multipart/form-data" method="post">
        
          			<input type="hidden" name="iProductId" id="iProductId" value="{$db_clothing[0].iProductId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_clothing[0].vProductImage}" />
				<input type="hidden" name="selectedstore" id="selectedstore" value="{$db_clothing[0].iStoreId}"/>
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
                
                <div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select  style="width:224px;" id="iMemberId" name="Data[iMemberId]"  title="Member" lang="*" onchange="getMember(this.value);" >
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_Clothmember}
						<option value='{$db_Clothmember[i].iMemberId}' {if $db_Clothmember[i].iMemberId eq $db_clothing[0].iMemberId}selected{/if}>{$db_Clothmember[i].vName}</option>
						{/section}
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
					<label for="textfield"><strong>Product Name:</strong></label>
					<input type="text" id="vProductName" name="Data[vProductName]" class="inputbox" value="{$db_clothing[0].vProductName}" lang="*" title="Product Name"/>
				</div>
                
                <div class="inputboxes">
					<label for="textfield"><strong>Product Description:</strong></label>
					<textarea id="tProductDescription" name="Data[tProductDescription]" class="inputbox" rows="6" cols="30"> {$db_clothing[0].tProductDescription}</textarea>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Purchase Note:</strong></label>
					<textarea id="tPurchaseNote" name="Data[tPurchaseNote]" class="inputbox" rows="6" cols="30"> {$db_clothing[0].tPurchaseNote}</textarea>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Product Size:</strong></label>
					<input type="text" id="vProductSize" name="Data[vProductSize]" class="inputbox" value="{$db_clothing[0].vProductSize}" lang="*" title="Product Size"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Product Color:</strong></label>
					<input type="text" id="vProductColor" name="Data[vProductColor]" class="inputbox" value="{$db_clothing[0].vProductColor}" lang="*" title="Product Color"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Custom Color:</strong></label>
					<input type="text" id="vCustomColor" name="Data[vCustomColor]" class="inputbox" value="{$db_clothing[0].vCustomColor}" lang="*" title="Custom Color"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Quantity:</strong></label>
					<input type="text" id="iQuantity" name="Data[iQuantity]" class="inputbox" value="{$db_clothing[0].iQuantity}" onkeypress="return checkprice(event);" lang="*" title="Quantity"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Purchase Limit:</strong></label>
					<input type="text" id="iPurchaseLimit" name="Data[iPurchaseLimit]" class="inputbox" value="{$db_clothing[0].iPurchaseLimit}" onkeypress="return checkprice(event);" lang="*" title="Purchase Limit"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="fPrice" name="Data[fPrice]" class="inputbox" value="{$db_clothing[0].fPrice}" onkeypress="return checkprice(event);" lang="*" title="Price" maxlength="12"/>
				</div>
                <div class="inputboxes">
					<label for="textfield"><strong>HandlingCost:</strong></label>
					<input type="text" id="fHandlingCost" name="Data[fHandlingCost]" class="inputbox" value="{$db_clothing[0].fHandlingCost}" onkeypress="return checkprice(event);" lang="*" title="Handling Cost" maxlength="12"/>
				</div>
                
					<div class="inputboxes">
					<label for="textfield" style="margin-bottom: 7px;"><strong>Upload New Image:</strong></label>
					{if $db_clothing[0].vProductImage eq ''}
					<input type="file" id="vProductImage" name="vProductImage" class="inputbox" value="{$db_clothing[0].vProductImage}"  title="Product Image" lang="*" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{else}
					<input type="file" id="vProductImage" name="vProductImage" class="inputbox" value="{$db_clothing[0].vProductImage}"  title="Product Image" onchange="CheckValidFile(this.value,this.name)" style="width:203px;"/>
					{/if}
					
					{if $db_clothing[0].vProductImage neq ''}
					<div style="float:left; width:450px;margin-top: 5px;">
						<div style="float:left; margin-left: 74px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin-left: 120px;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_store"]}/2/{$db_clothing[0].iProductId}/{$db_clothing[0].vProductImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
                <div class="inputboxes">
			<label for="textfield"><strong>Hide Product:</strong></label>					
			<input type="checkbox" id="eHideProduct" name="eHideProduct" value="Yes" {if $db_clothing[0].eHideProduct eq 'Yes'}checked{/if}>Yes
                                                				                  
			</div>
                <div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]" style="width:220px;">
						<option value="Active" {if $db_clothing[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_clothing[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>                    
				</div>
                
               			{if $mode eq add}
   				<input type="submit" value="Add Product" class="btn" onclick="return validate(document.frmadd);" title="Add Clothing and Accessories" style="margin-left:140px;"/>
   				{else}
   				<input type="submit" value="Edit Product" class="btn" onclick="return validate(document.frmadd);" title="Edit Clothing and Accessories" style="margin-left:140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
        
</div>


        
	</div>
</div>
{literal}

<script type="text/javascript">
getId('{/literal}{$db_clothing[0].iMemberId}{literal}');
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

	var url = admin_url+"/index.php?file=cl-ajmemberlist";
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
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'cl-clothing';
    window.location=admin_url+"/index.php?file=cl-clothing&mode=view";
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


