<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductlist.js"></script>
<!--Contant Part Start Here-->
<div id="wraper">
	<div class="contant">
	<div class="platinum_box">
    	<div class="platinum_img" style="background:url({$tconfig["front_images"]}blue_img.png) no-repeat;"></div>
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
            <div class="productos_text" style="font-size:17px; padding-top:12px;">los mejores promocionales y obsequios para<br />sus actividades de merchandising.</div>
        </div>  
    </div>

<!--Category Box Start Here-->
<div class="category_box">
	<div id="productlist"></div>
</div>
	
<!--Category Box End Here-->

       
<div class="cl"></div>
{literal}
<script type="text/javascript">
var iParentId = '{/literal}{$iParentId}{literal}';
var iCategoryId = '{/literal}{$iCategoryId}{literal}';

if(iParentId !='' || iCategoryId !=''){
	getchildcategory(iParentId,iCategoryId);
}
GetProducts(0);

</script>
{/literal}



				