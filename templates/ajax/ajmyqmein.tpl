{if  $QmeInArr|@count gt 0}
{section name=i loop=$QmeInArr}
<div class="OppurtunitiesReaptBox">
        <div class="GumbohleftImge">
                <div class="GumbohImge">
			{if $QmeInArr[i].iAdminId neq '0'}
				<img src="{$tconfig["front_images"]}admin_user.png" alt=" " title="" border="0" />
			{else}
				
				<img src="{$tconfig["front_images"]}member_user.png" alt=" " title="" border="0" />
			{/if}
		</div>

                
        </div>
        <div class="GumbohContentTxt">
	   		<div class="browseedit_delete">
			 	<a href="{$site_url}/myqmeinadd/{$QmeInArr[i].iQmeInId}">Edit</a> | <a href="#" onclick="deleteitem({$QmeInArr[i].iQmeInId},'qmein');"> Delete</a>
			</div>
			<div class="qmein_reapt_div">
				<div><span class="graytext">{$QmeInArr[i].Connect_With}</span></div>
				<div>Date : <span>{$QmeInArr[i].dAddedDate}</span></div>
				<div>Points : <span>{$QmeInArr[i].iPointsWhenConnect}</span></div>
			</div>
	
        <!--<a href="#readJob{$QmeInArr[i].iQmeInId}" class="description">Read more..</a><br/>-->
	
	<!--<div style="display:none">
        <div id="readJob{$QmeInArr[i].iQmeInId}" class="readpoppup">
        <div><div class="popupheadding">{$QmeInArr[i].vSkill}</div>
        <div class="popuptext">{$QmeInArr[i].tDescription}</div></div>
        </div>
</div>-->
</div>
</div>
{/section}
<div class="page_link">
	<span style="padding-left:10px; float:left;">{$recmsg}</span>
	<span class="nav" style="float:right"><div align="right" id="paging">
        {$pages}
        </div></span>	
</div>
{else}
<div style="text-align:center;color:red;">No Qme Connections available</div>

{/if}

	