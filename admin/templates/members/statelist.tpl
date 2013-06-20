 <select name="iStateId" id="iStateId" style="width:305px;" class="inpuname">
	<option value="">--- Select State ---</option>
	{if  $stateArr|@count gt 0}
	{section name=i loop=$stateArr}
	<option value='{$stateArr[i].iStateId}' {if $stateArr[i].iStateId eq $db_member[0].iStateId}selected{/if}>{$stateArr[i].vState}</option>
	{/section}
	{/if}
</select>