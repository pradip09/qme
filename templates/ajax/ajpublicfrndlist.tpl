{if  $frnddata|@count gt 0}
{section name=i loop=$frnddata}
<div class="OppurtunitiesReaptBox">
<div class="GumbohleftImge">
<a href="{$site_url}/{$frnddata[i].vMemberUrl}"><img src="{$frnddata[i].vProfileImage}" height="70" width="70"/></a>
</div>
<div class="GumbohContentTxt">

<!--<div class="browseedit_delete"><a href="http://192.168.1.12/qme/mypostjobadd/120">Edit</a> | <a onClick="deleteitem(120,'postjob');" href="#"> Delete</a></div>-->

<h5><a href="{$site_url}/{$frnddata[i].vMemberUrl}">{$frnddata[i].vName}</a></h5>
<div class="OppurtunitiesTxt">
<!--<div class="postjob_reapt_text">
    From : {$frnddata[i].vCity}</br>
    Degree : {$frnddata[i].vDegree}</br>
    Occupation : {$frnddata[i].vOccupation}</br>
</div>-->
<div class="postjob_reapt_text">
            {if $frnddata[i].eGender neq ''}
            Identifier: {$frnddata[i].eGender}</br>
            {/if}
            From : {if $frnddata[i].vCountry neq ''}{$frnddata[i].vCountry},{/if} {if $frnddata[i].vState neq ''}{$frnddata[i].vState},{/if}{if $frnddata[i].vCity neq ''}{$frnddata[i].vCity}{/if}</br>
            Degree : {if $frnddata[i].vStudiedAt neq ''}{$frnddata[i].vStudiedAt},{/if}{$frnddata[i].vDegree}</br>
            Occupation : {$frnddata[i].vOccupation}</br>            
    </div>
</div>
</div>
</div>
{/section}
{else}
<div style="text-align:center;color:red;">No Friends available.</div>
{/if}