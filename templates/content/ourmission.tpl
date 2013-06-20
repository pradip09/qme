


<div id="services_box" class="desboard_body" style="padding-top:1px;">
<!--heading start here -->    
    <div class="heading" style="padding-left:26px;">
      <div class="line">Our Mission</div>
     </div>
<!--heading end here -->    



<div style="padding:0px 25px;">
{if  $db_mission|@count gt 0}
{section name=i loop=$db_mission}

<div class="text2" style="margin:0px; padding:0px; border-bottom:none;">{$db_mission[i].lContents}</div>
{/section}
{else}
{/if}
</div>
</div>

</div>
</div>

