


<div id="services_boxinnerbg" class="desboard_body" style="padding-top:1px;">
<!--heading start here -->    
    <div class="heading" style="padding-left:26px;width:331px;">
      <div class="line">Terms and Conditions</div>
     </div>
<!--heading end here -->    



<div style="padding:0px 25px;">
{if  $db_sta|@count gt 0}
{section name=i loop=$db_sta}

<div class="text2" style="margin:0px; padding:0px; ">{$db_sta[i].lContents}</div>
{/section}
{else}
{/if}
</div>
</div>

</div>
</div>

