<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jproductlist.js"></script>

<!--Contant Part Start Here-->
<div id="wraper">
	<div class="contant">
	<div class="platinum_box">
    	<div class="promo_img"></div>
		<div class="platinum_right_part">
        	<div class="platinum_right_bg">
            	<div class="right_top_part" style="width:100%; padding-top:6px;">
                        <h2 style="margin-left:5px;">&iquest;Tiene algo en mente?</h2>
			    <input name="keyword" id="keyword" type="text" class="input2" placeholder="Palabra clave"  style="margin-left:5px;" value="{$keyword}" />
			    
			    <select name="iParentId" id="iParentId" onchange="getchildcategory(this.value);" class="select_input1">
                            	<option value="">------Elija una l&iacute;nea------</option>
				{section name=i loop=$pareArr}
				<option value='{$pareArr[i].iCategoryId}' {if iParentId eq $pareArr[i].iCategoryId}selected{/if}>{$pareArr[i].vCategory}</option>
				{/section}
                            </select>
                             <span id="divchildcatId">
			     <select name="iCategoryId" id="iCategoryId" class="select_input1">
                            	<option value="">------Elija una categor&iacute;a------</option>
				</select>
				</span>
			 
                            <div class="buscar_btn" style="margin-top:5px; margin-right:5px;" title="Buscar">
				<a href="javascript:void(0);" onclick="GetPromotionProducts(0);">Buscar</a></div>
                      </div>
		
            </div>
            <div class="productos_text" style="font-size:17px; padding-top:12px;">los mejores promocionales y obsequios para<br />sus actividades de merchandising.</div>
        </div>  
    </div>

<!--Category Box Start Here-->
<div class="category_box">
	<div id="promotionlist"></div>
</div>	
<!--Category Box End Here-->

       
<div class="cl"></div>
{literal}
<script type="text/javascript">
GetPromotionProducts(0);

var iParentId = '{/literal}{$iParentId}{literal}';
var iCategoryId = '{/literal}{$iCategoryId}{literal}';

if(iParentId !='' || iCategoryId !=''){
	getchildcategory(iParentId);	
}
</script>
{/literal}
