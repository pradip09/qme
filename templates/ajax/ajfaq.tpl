{if  $FaqArr|@count gt 0}
{section name=i loop=$FaqArr}

	<div class="text"><strong>Q.</strong> {$FaqArr[i].vQuestion}</div>
    	<p class="text2"><strong>A.</strong> {$FaqArr[i].tAnswer}</p>
{/section}
{else}
	<div class="text" style="text-align: center;line-height: 24px;color: red;font-size: 18px;opacity: 1;">No question available in this category</div>

{/if}




