<div id="breadcrumb">
	<ul>
		<li><img src="{$tconfig.tpanel_img}/icon_breadcrumb.png" alt="Location" /></li>
		<li><a href="{$admin_url}/index.php?file=home-dashboard">Dashboard</a></li>
		<li>/</li>
		<li><a href="{$admin_url}/index.php?file=fan-faq_nfl&mode=view">FAQs</a></li>
		<li>/</li>
		<li class="current">{if $mode eq 'add'}Add FAQs{else}Edit FAQs{/if}</li>
	</ul>
</div>
<div id="content">
<div class="container" id="tabs">
	<div class="conthead">
		{if $mode eq add}
		<h2 class="left">Add FAQ</h2>
		{else}
		
		<h2 class="left">Edit FAQ</h2>
		{/if}
	</div>
	<div class="contentbox" id="tabs-1">
            
		<form id="frmadd" name="frmadd" action="index.php?file=fan-faq_nfl_a" enctype="multipart/form-data" method="post">
				<input type="hidden" name="iFAQId" id="iFAQId" value="{$iFAQId}" />
				
				<input type="hidden" name="action" id="action" value="{$mode}" />
				<div class="inputboxes">
					<label for="textfield"><strong>FAQ Category:</strong></label>
					<select id="iFAQCategoryId" name="Data[iFAQCategoryId]" lang="*" title="Category" style="width:203px;">
						<option value=''>Select FAQ category</option>
						{section name=i loop=$db_faqcate}
						<option value='{$db_faqcate[i].iFAQCategoryId}' {if $db_faqcate[i].iFAQCategoryId eq $db_faq[0].iFAQCategoryId}selected{/if}>{$db_faqcate[i].vCategory}</option>
						{/section}
					</select>
				</div>
				<div class="inputboxes">
					<label for="textfield"><strong>Question:</strong></label>
					<input type="text" id="vQuestion" name="Data[vQuestion]" class="inputbox" value="{$db_faq[0].vQuestion}" lang="*" title="Question" style="width:582px"/>
				</div>
				<div class="inputboxes">
					<label style="margin-bottom:7px;" for="textfield"><strong>Answer:</strong></label>
					<textarea id="tAnswer" name="Data[tAnswer]" class="inputbox" title="Answer"  lang="*" style="width: 582px;height: 174px;">{$db_faq[0].tAnswer}</textarea>
				</div>
				
				

				<div class="inputboxes">
					<label for="textfield"><strong>Order No :</strong></label>
					<select id="iOrderNo" name="Data[iOrderNo]" title="Order No"  lang="*">
						<option value=''>Select Order  No</option>
						{if $mode eq add}
							{while ($totalRec+1) >= $initOrder}
								<option value="{$initOrder}" {if $db_faq[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>
							{/while}
						{else}
							{while ($totalRec) >= $initOrder}
								<option value="{$initOrder}" {if $db_faq[0].iOrderNo eq $initOrder}selected{/if}>{$initOrder++}</option>
							{/while}
						{/if}
					</select>
				</div>
				
				<div class="inputboxes">
					<label for="textfield"><strong>Status:</strong></label>
					<select id="eStatus" name="Data[eStatus]">
						<option value="Active" {if $db_faq[0].eStatus eq Active}selected{/if}>Active</option>
						<option value="Inactive" {if $db_faq[0].eStatus eq Inactive}selected{/if}>Inactive</option>
					</select>
				</div>
				
               			{if $mode eq add}
   				<input type="submit" value="Add Question" class="btn" onclick="return validate(document.frmadd);" title="Add Question"  style="margin-left: 140px;"/>
   				{else}
   				<input type="submit" value="Edit Question" class="btn" onclick="return validate(document.frmadd);" title="Edit Question"  style="margin-left: 140px;"/>
   				{/if}
				<input type="button" value="Cancel" class="btnalt" title="Cancel" onclick="redirectcancel();"/>

		</form>
	</div>
</div>
</div>
{literal}
<script>
function redirectcancel(){
    var admin_url = '{/literal}{$admin_url}{literal}';
    var file = 'fan-faq_nfl';
   // alert(admin_url+"/index.php?file=u-user&mode=view");
    window.location=admin_url+"/index.php?file=fan-faq_nfl&mode=view";
    return false;
}

</script>
{/literal}


