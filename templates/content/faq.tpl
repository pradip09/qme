<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jfaqlist.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<input type="hidden" id="iFAQCategoryId" name="iFAQCategoryId" value="{$db_faqcatnam[0]['iFAQCategoryId']}">
<div id="services_box_faq" class="desboard_body" >
<!--heading start here -->    
    <div class="heading">
      <div class="line">FAQ</div>
     </div>
<!--heading end here -->    



<div class="deliverimg_box" style="padding-right:0; width:96.5%;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="27%" valign="top" class="faqleftpart"><div class="faqheader">Category</div>
    
    <ul class="qmeleftmenu">
        
	{if  $db_faqcatnam|@count gt 0}
	{section name=i loop=$db_faqcatnam}
	    {if $db_faqcatnam[i].vCategory eq 'Buy Points'}	    
	    {else}
	    <li><a href="javascript:GetFaqCategory('{$db_faqcatnam[i].iFAQCategoryId}');" >{$db_faqcatnam[i].vCategory}</a></li>
	    {/if}
	{/section}
	{else}
	<li><a href="#">No Category Available</a></li>
	{/if}
    </ul>
    
    </td>
    <td valign="top">
    	<div class="faqright">
        <div class="faqgray">
        <h3>QME Asked Questions</h3>
        <h4>Find the answers that you need</h4><br />
	<div id="faqdivId">
	</div>
        </div>	
        
        </div>
    </td>
  </tr>
</table>

</div>
</div>

</div>
</div>

{literal}
<script type="text/javascript">

function GetFaqCategory(iFAQCategoryId){
	if($('#iFAQCategoryId')){
		$('#iFAQCategoryId').val(iFAQCategoryId);
	}
	GetFAQcategory(0);
}

GetFAQcategory(0);
</script>
{/literal}
