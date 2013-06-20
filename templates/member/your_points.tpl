<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body"> {include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right">
     <div class="MyVedioTitle">
            <h1>My Points Activity</h1>
    </div>
      <div class="bredcums">
            <a href="{$site_url}/buypoints">My Points</a> > Your Points
    </div>
    <div class="tabber" style="margin-left:25px;">
    <!--Point Activity start here-->
    <div class="tabbertab">
        <h4>My Earn Points Activity</h4>
    
    <div class="buy_point_cont">
            <div class="points_box">
                    <table cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                    <tr>
                                        
                                            <th width="122px">Section</th>
                                            <th width="228px">Details</th>
                                            <th width="101px">Points</th>
                                            <th width="111px">Date</th>
                                    </tr>
                            </thead>
                    </table>
                     <div class="pntoverflow">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            {if  $points|@count gt 0}
                            {section name=i loop=$points}
                            
                            <tbody>
                                    <tr>
                                            <td width="122px">{$points[i].eType}</td>
                                             {if $points[i].eType eq 'Campaign'}
                                            <td width="229px">
                                                {if $points[i].vName neq ''}
                                               {$points[i].vName},{$points[i].vCampaignName},{$points[i].tDescription}
                                               {else}
                                               Admin,{$points[i].vCampaignName},{$points[i].tDescription}
                                               {/if}
                                            </td>
                                            {else}
                                              <td width="229px">
                                               {$points[i].tDescription}
                                            
                                            </td>
                                              {/if}
                                            <td width="101px">{$points[i].iPoint}</td>
                                            <td >{$points[i].dAddedDate}</td>
                                    </tr>
                            </tbody>
                            {/section}
                          
                            <tbody style="font-weight:bold; ">
                                    <tr>
                                            <td style="text-align:right; padding-right:10px; font-size:16px;" colspan="2">Total Points</td>
                                            <td style="font-size:16px;">{$total}</td>
                                            <td></td>
                                        
                                    </tr>
                                    
                                   
                            </tbody>
                             
                                    
                                  
                                
                            {else}
                            <tbody>
                                    <tr>
                                            <td style="text-align:center;color:red;" colspan="3">No point details available in your points activity</td>
                                            
                                    </tr>
                            </tbody>
                            {/if}
                    </table>
                     </div>
            </div>
            <div class="cl"></div>
        </div>
        </div>
        <!--Point Activity End here-->
        <!--Campaign Activity start here-->
         <div class="tabbertab">
            <h4>My Campaign Activity</h4>
            <div class="buy_point_cont">
            <div class="points_box">
                    <table cellpadding="0" cellspacing="0" width="100%">
                            <thead>
                                    <tr>
                                          
                                            <th width="122px">Campaign Name</th>
                                            <th width="228px">Details</th>
                                            <th width="101px">Points</th>
                                            <th width="111px">Date</th>
                                    </tr>
                            </thead>
                    </table>
                     <div class="pntoverflow">
                    <table cellpadding="0" cellspacing="0" width="100%">
                            {if  $campaign|@count gt 0}
                            {section name=i loop=$campaign}
                            
                            <tbody>
                                    <tr>
                                                      
                                            <td width="122px">{$campaign[i].vCampaignName}</td>
                                            <td width="229px">{$Name}&nbsp;{$campaign[i].tDescription}</td>
                                            <td width="101">{$campaign[i].iPoint}</td>
                                            <td>{$campaign[i].dAddedDate}</td>
                                            
                                    </tr>
                            </tbody>
                             {/section}
                            <tbody style="font-weight:bold; ">
                                    <tr>
                                                     
                                            <td style="text-align:right; padding-right:10px; font-size:16px;" colspan="2">Total Points</td>
                                            <td style="font-size:16px;">{$total1}</td>
                                          
                                    </tr>
                            </tbody>
                        
                            {else}
                            <tbody>
                                    <tr>
                                            <td style="text-align:center;color:red;" colspan="3">No campaign details available in your points activity</td>
                                            
                                    </tr>
                            </tbody>
                        
                            {/if}
                    </table>
                     </div>
            </div>
            <div class="cl"></div>
        </div>
         </div>
        <!--Campaign Activity End here-->
        
    </div>
    </div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
 document.write('<style type="text/css">.tabber{display:none;}</style>');
$(document).ready(function(){
$('.popuppoints').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});

</script>
{/literal} 