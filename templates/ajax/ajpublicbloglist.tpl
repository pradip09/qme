{if  $relevent_news|@count gt 0}
{section name=i loop=$relevent_news}

        <div class="activity_reapt_box">
            
		<div class="activity_img">                    
                    <img src="{$relevent_news[i].vImage}" width="98" height="58" />
                </div>
		<div class="activity_text">{$relevent_news[i].vTitle}</div>
                
	 </div>

{/section}

<div class="more_recent_activity">
    {if $totRec gt $rec_limit}
        <a onclick="publicreleventnews({$start},{$iMemberId})" style="cursor:pointer;">More Recent Activity <img src="{$tconfig["front_images"]}bot-arrow.png" alt="" title="" /></a>
    {else}
        <div>No More Recent Activity..</div>
    {/if}    
</div>

{/if}