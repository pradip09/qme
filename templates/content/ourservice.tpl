


<div id="services_box" class="desboard_body" style="padding-top:1px;">
<!--heading start here -->    
    <div class="heading" style="padding-left:26px;">
      <div class="line">Our Service</div>
     </div>
<!--heading end here -->    



<div style="padding:0px 25px;">
{if  $db_service|@count gt 0}
{section name=i loop=$db_service}

<div class="text2" style="border:none;" >{$db_service[i].lContents}</div>
{/section}
{else}
{/if}
</div>
</div>

</div>
</div>

