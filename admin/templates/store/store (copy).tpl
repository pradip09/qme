<script type="text/javascript" src="{$tconfig["tsite_admin_creditor_url"]}/ckeditor.js"></script>
<script language="JavaScript" src="{$tconfig["tsite_javascript"]}jquery.js"></script>

<div id="content">

<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add Item</h2>
		{else}
		
		<h2 class="left">Edit Item</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=st-store_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iItemId" id="iItemId" value="{$db_store[0].iItemId}" />
				<input type="hidden" name="vOldImage" id="vOldImage" value="{$db_store[0].vItemImage}" />
				<input type="hidden" name="action" id="action" value="{$mode}" />
				
				<div class="inputboxes">
					<label for="textfield"><strong>Item Name:</strong></label>
					<input type="text" id="vItemName" name="Data[vItemName]" class="inputbox" value="{$db_store[0].vItemName}" lang="*" title="Item Name"/>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Member:</strong></label>
					<select id="iMemberId" name="Data[iMemberId]" lang="*" title="Member">
						<option value=''>--Select Member--</option>
						{section name=i loop=$db_storeMember}
						<option value='{$db_storeMember[i].iMemberId}' {if $db_storeMember[i].iMemberId eq $db_store[0].iMemberId}selected{/if}>{$db_storeMember[i].vName}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Item Description:</strong></label>
				</div>
				<p>
					<textarea id="tItemDescription" name="Data[tItemDescription]" class="inputbox" title="Item Description" style="width:900px; height:200px">{$db_store[0].tItemDescription}</textarea>
				</p>
				<div class="inputboxes">
					<label for="textfield"><strong>Purchase Note:</strong></label>
					<textarea id="tPurchaseNote" name="Data[tPurchaseNote]" class="inputbox" title="Purchase Note" style="width:720px;">{$db_store[0].tPurchaseNote}</textarea>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose Item Size:</strong></label>
					<label for="textfield"><input type="checkbox" id="vItemSize[]" name="vItemSize[]" value="XS(extra small)" {section name=i loop=$db_size} {if $db_size[i] eq 'XS(extra small)'} checked="checked" {/if}{/section}/>XS(extra small)</label>
					<label for="textfield"><input type="checkbox" id="vItemSize[]" name="vItemSize[]" value="S" {section name=i loop=$db_size}{if $db_size[i] eq 'S'} checked="checked" {/if}{/section}/>S</label>
					<label for="textfield"><input type="checkbox" id="vItemSize[]" name="vItemSize[]" value="L" {section name=i loop=$db_size}{if $db_size[i] eq 'L'} checked="checked" {/if}{/section}/>L</label>
					<label for="textfield"><input type="checkbox" id="vItemSize[]" name="vItemSize[]" value="XL" {section name=i loop=$db_size}{if $db_size[i] eq 'XL'} checked="checked" {/if}{/section}/>XL</label>
					<label for="textfield"><input type="checkbox" id="vItemSize[]" name="vItemSize[]" value="XXL" {section name=i loop=$db_size}{if $db_size[i] eq 'XXL'} checked="checked" {/if}{/section}/>XXL</label>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Choose Item Color:</strong></label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Red" {section name=i loop=$db_color} {if $db_color[i] eq 'Red'} checked="checked" {/if}{/section}/>Red</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Orange" {section name=i loop=$db_color} {if $db_color[i] eq 'Orange'} checked="checked" {/if}{/section}/>Orange</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Yellow" {section name=i loop=$db_color} {if $db_color[i] eq 'Yellow'} checked="checked" {/if}{/section}/>Yellow</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Green" {section name=i loop=$db_color} {if $db_color[i] eq 'Green'} checked="checked" {/if}{/section}/>Green</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Purple" {section name=i loop=$db_color} {if $db_color[i] eq 'Purple'} checked="checked" {/if}{/section}/>Purple</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Black" {section name=i loop=$db_color} {if $db_color[i] eq 'Black'} checked="checked" {/if}{/section}/>Black</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="White" {section name=i loop=$db_color} {if $db_color[i] eq 'White'} checked="checked" {/if}{/section}/>White</label>
					<label for="textfield" style="width:100px;"><input type="checkbox" id="vItemColor[]" name="vItemColor[]" value="Gray" {section name=i loop=$db_color} {if $db_color[i] eq 'Gray'} checked="checked" {/if}{/section}/>Gray</label>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Custom Color:</strong></label>
					<input type="text" id="Data[vCustomColor]" name="Data[vCustomColor]" class="inputbox" value="{$db_store[0].vCustomColor}" title="Custom Color"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Quantity:</strong></label>
					<input type="text" id="Data[iQuantity]" name="Data[iQuantity]" class="inputbox" value="{$db_store[0].iQuantity}" title="Quantity" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Purchase Limit:</strong></label>
					<input type="text" id="Data[iPurchaseLimit]" name="Data[iPurchaseLimit]" class="inputbox" value="{$db_store[0].iQuantity}" title="Purchase Limit" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Price:</strong></label>
					<input type="text" id="Data[fPrice]" name="Data[fPrice]" class="inputbox" value="{$db_store[0].fPrice}" title="Price" onkeypress="return checkprice(event);"/>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Handling Cost:</strong></label>
					<input type="text" id="Data[fHandlingCost]" name="Data[fHandlingCost]" class="inputbox" value="{$db_store[0].fHandlingCost}" title="Handling Cost" onkeypress="return checkprice(event);"/>
				</div>
				
				<div style="display:block;width:1000px;">
					<div style="width:303px;float:left;" class="inputboxes">
					<label for="textfield" style="margin-bottom: 7px;"><strong>Upload New Image:</strong></label>
					{if $db_store[0].vItemImage eq ''}
					<input type="file" id="vItemImage" name="vItemImage" class="inputbox" value="{$db_store[0].vItemImage}"  title="vItemImage" lang="*" onchange="CheckValidFile(this.value,this.name)"/>
					{else}
					<input type="file" id="vItemImage" name="vItemImage" class="inputbox" value="{$db_store[0].vItemImage}"  title="vItemImage" onchange="CheckValidFile(this.value,this.name)"/>
					{/if}
					</div>
					{if $db_store[0].vItemImage neq ''}
					<div style="float:left; width:450px;">
						<div style="float:left; margin:26px 5px 0px 26px;"><a href="#view1" id="test"><img src="{{$tconfig["tsite_images"]}}view.png"/></a></div>
						<p style="margin:26px 0 10px 0;"><img src="{{$tconfig["tsite_images"]}}delete.png" onclick="ImageDelete();"/></p>
						<div style="display:none;">
							<div id="view1">
								<div class="popup_box">
									<div><img src="{$tconfig["tsite_upload_images_store"]}{$db_store[0].iMemberId}/{$db_store[0].vItemImage}" /></div>
								</div>
							</div>
						</div>
					</div>
					{/if}
				</div>
				<div style="clear:both;"></div>
				
				
				<div class="inputboxes">
					<label for="textfield"><strong>Hide Item:</strong></label>
					<input type="checkbox" id="eHideItem" name="eHideItem" value="1" {if $db_store[0].eHideItem eq 'Yes'}checked{/if}>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_store[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_store[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Item" class="btn" onclick="return validate(document.frmadd);" title="Add Item"/>
   				{else}
   				<input type="submit" value="Edit Item" class="btn" onclick="return validate(document.frmadd);" title="Edit Item"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>
		</form>
	</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'st-store';
    window.location=admin_url+"/index.php?file=st-store&mode=view";
    return false;
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
	CKEDITOR.replace( 'tItemDescription' );
</script>
{/literal}


