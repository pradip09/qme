<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductlist.js"></script>
<input type="hidden" name="iProductId" id="iProductId" value="{$db_productdetail[0].iProductId}">
<div id="wraper">
	<div class="contant">
	<div class="platinum_box">
    	{if $parentcat  eq '3'}
	<div class="platinum_img" style="background:url({$tconfig["front_images"]}pltinum_img.png) no-repeat;"></div>
	{elseif $parentcat eq '9'}
	<div class="platinum_img" style="background:url({$tconfig["front_images"]}blue_img.png) no-repeat;"></div>
	{elseif $parentcat eq '10'}
	<div class="platinum_img" style="background:url({$tconfig["front_images"]}kits_eventos_img.png) no-repeat;"></div>
	{elseif $parentcat eq '11'}
	<div class="platinum_img" style="background:url({$tconfig["front_images"]}sugerencias_img.png) no-repeat;"></div>
	{elseif $parentcat eq '38'}
	<div class="platinum_img" style="background:url({$tconfig["front_images"]}gold_img.png) no-repeat;"></div>
	{/if}
	
    	<div class="platinum_right_part">
        	<div class="platinum_right_bg">
            	<div class="right_top_part" style="width:100%; padding-top:6px;">
                        <h2 style="margin-left:5px;">Tiene algo en mente ?</h2>
		
			    <input name="keyword" id="keyword" type="text" class="input2" placeholder="Palabra clave"  style="margin-left:5px;" value="{$keyword}" />
                            <select name="iParentId" id="iParentId" onchange="getchildcategory(this.value);" class="select_input1">
                            	<option value="">------Elija una linea------</option>
				{section name=i loop=$pareArr}
				<option value='{$pareArr[i].iCategoryId}' {if $iParentId eq $pareArr[i].iCategoryId}selected{/if}>{$pareArr[i].vCategory}</option>
				{/section}
                            </select>
                             <span id="divchildcatId">
				<select name="iCategoryId" id="iCategoryId" class="select_input1">
					<option value="">----Elija una Categoria----</option>
				</select>
				</span>

				
                            <div class="buscar_btn" style="margin-top:5px; margin-right:5px;" title="Buscar">
				<a href="javascript:void(0);" onclick="GetProducts(0);">Buscar</a></div>
                      </div>
		
            </div>
            <div class="productos_text" style="font-size:17px; padding-top:12px;">Productos de clase, interes y utilidad para sus mejores clientes.</div>
        </div>  
    </div>

<!--Category Box Start Here-->
<input type="hidden" name="fPrice{$db_productdetail[0].iProductId}" id="fPrice{$db_productdetail[0].iProductId}" value="{$db_productdetail[0].fPrice}">
<div class="category_box" style="width:877px;">
	<div class="left_box">
    	<div class="category_box1">
         
	 {if $db_productdetail[0].vImage neq ''}
       	  <div class="category_img1">
		
		<a href="#bigimageid" id="popbigimageid">
			<div id="divreplaceimageid">
			<img src="{$tconfig["tsite_upload_images_product"]}{$db_productdetail[0].iProductId}/{$db_productdetail[0].vImage}" width="248px" height="247px"/>
			</div>
		</a>
		
	  </div>
          {else}
          <div class="category_img1"><img src="{$tconfig["front_images"]}noimage.png" width="248px" height="247px"/></div>
          {/if}
            
	    <div class="category_text1">{$db_productdetail[0].vTitle}<span>
	    {if $iUserId eq ''} 
	    <a href="#LoginId" id="loginpop">
		<img title="Agregar al carrito" src="{$tconfig["front_images"]}plus_img.png">
	    </a>
	    {else}
	    <a href="javascript:void(0);" onClick="getAjaxCart('Add','{$db_productdetail[0].iProductId}');" >
		<img title="Agregar al carrito" src="{$tconfig["front_images"]}plus_img.png">
	    </a>
	    {/if}
	    </span> <br />
		<strong>{$db_productdetail[0].vProductCode}</strong></div>
            </div>
            
            <div class="volver_box">
           	  <div class="tambien_text">Tambien
		  en:</div>
                {section name=i loop=$db_gal}
			<div class="beg_img">
				<img src="{$db_gal[i]['vGalImagenew']}" alt="" width="88" height="66" onclick="replaceiamge('{$db_gal[i]["vGalImagemain"]}','{$db_gal[i]["iProductId"]}');" style="cursor:pointer;"/>
			</div>
		{/section}
		<div class="beg_img"><img src="{$tconfig["front_images"]}volver_img1.png" alt="" /></div>
            </div>
        </div>
    
    <div class="right_box">
    	<div class="producos_part">
	<div class="producos_top">Productos relacionados</div>	
		{if $relArr|@count gt 0}
		{section name=i loop=$relArr max=4}
			{if $smarty.section.i.index % 2 neq 0}
			<div class="img_1" style="margin:0px;"><a href="{$site_url}/productdetail/{$relArr[i].iProductId}" title="{$relArr[i].vTitle}"><img src="{$relArr[i].vImage}" width="141" height="140"/></a></div>
			{else}
			<div class="img_1" ><a href="{$site_url}/productdetail/{$relArr[i].iProductId}" title="{$relArr[i].vTitle}"><img src="{$relArr[i].vImage}" alt="" width="141" height="140"/></a></div>
			{/if}
		{/section}
		{else}
		Ning&uacute;n otro producto relacionado que se encuentra.
		{/if}
	</div>
	  
    </div>
    <div class="clear"></div>
    <div style="margin-bottom:118px; clear:both;">
	  <div class="descripcion" style="float:left;"><h4>Descripcion: <span>{$db_productdetail[0].vProductCode}</span></h4>
           	<div class="descripcion_text">{$db_productdetail[0].tDescription}</div>
            </div>
        <div class="tag_gray_bg" style="margin: 8px 0 0 5px; height:81px;">TAGS: <br />
	{$db_productdetail[0].vTag}	
	</div>
	
        </div>
    
</div>
<div style="display:none;">
{include file='content/popuplogin.tpl'}
</div>
<div style="display:none;">
	<div id="bigimageid">
		<div class="popup_box" style="height:auto;width:600px;">
			<div id="galimageid">
			<img src="{$tconfig["tsite_upload_images_product"]}{$db_productdetail[0].iProductId}/{$db_productdetail[0].vImage}"/>
			</div>
		</div>	
	</div>	
</div>

{literal}
<script type="text/javascript">

function getProducthome(){
	$('#productdatafrm').submit();
}

$(document).ready(function(){
$('#popbigimageid').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
function replaceiamge(image,id){
	if($('#divreplaceimageid')){
		var html ='';
		html +='<img src="'+image+'" width="248px" height="247px"/>';
		$('#divreplaceimageid').html(html);
	}
	if($('#galimageid')){
		var html ='';
		html +='<img src="'+image+'"/>';
		$('#galimageid').html(html);
	}
	
}
</script>
{/literal}
	</div>