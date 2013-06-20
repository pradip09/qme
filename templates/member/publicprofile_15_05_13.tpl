<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/default.css" type="text/css" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery.nivo.slider.publicprofile.js"></script>

<!--body part start here -->


<div id="services_boxslid" class="wrapinner" style="padding-top:1px;">
	<div class="public_profile_container">
		{if $db_banner|@count gt 0}
		<div class="pub_pro_banner_bg">
			<div class="pub_pro_banner">
				{if $db_banner|@count eq 1}
				<style>
				  #slider {
				    overflow: hidden;   
				  }
				</style>
				<img src="{$tconfig["tsite_upload_images_member"]}{$db_banner[0].iMemberId}/banner/{$db_banner[0].vBannerImage}" data-thumb="{$tconfig["tsite_upload_images_member"]}{$db_banner[0].iMemberId}/banner/{$db_banner[0].vBannerImage}" alt="" title="" width="957px"/>
				{/if}
				{if $db_banner|@count gt 1}
				<style>
				  #slider {
				    height:300px;
				    overflow: hidden;   
				  }
				</style>
				
				<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					{section name=i loop=$db_banner}
						<img src="{$tconfig["tsite_upload_images_member"]}{$db_banner[i].iMemberId}/banner/{$db_banner[i].vBannerImage}" data-thumb="{$tconfig["tsite_upload_images_member"]}{$db_banner[i].iMemberId}/banner/{$db_banner[i].vBannerImage}" alt="" title="" />
					{/section}
				</div>
				</div>
				{/if}
			</div>
		</div>
		{/if}
	        <div class="cl"></div>
		</div>
		
		<div id="header-bottom">
		<div id="header-bottom-inner" style="height:200px;">
		
			
	 <div id="header-row-top">
          <div id="myaccount" class="grid_6 alpha">
            {if $db_banner|@count gt 0}
	    <div class="profile-pic">{if $mem_info[0].vProfileImage eq '' || $db_user[0].vProfileImage eq ''} <img src="{$tconfig["front_images"]}login-photo.png" alt="" title="" /> {else} <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/1_{$db_user[0].vProfileImage}" alt="" title="" /> {/if} </div>
          {else}
	    <div class="profile-pic_inner">{if $mem_info[0].vProfileImage eq '' || $db_user[0].vProfileImage eq ''} <img src="{$tconfig["front_images"]}login-photo.png" alt="" title="" style="width:97%;"/> {else} <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/1_{$db_user[0].vProfileImage}" alt="" title="" /> {/if} </div>
	    {/if}
	    <div class="profile-info">
              <h1>{$db_user[0].vName}</h1>
		    <a href="{$site_url}/myaccount"> <input name="myaccount" type="button" value="My Account"></a>
		    {if $db_user[0].eNonProfit eq 'Yes' or $db_user[0].eChruch eq 'Yes' or $db_user[0].ePolitician eq 'Yes' or $db_user[0].eFundraiser eq 'Yes'}
		     <a href="{$site_url}/public_fund_capmp/{$db_user[0].vMemberUrl}"><img src="{$tconfig["front_images"]}suppotme.png" width="104" height="32" alt="Support Me" title="Support Me" border="0" style="margin-left: 120px;margin-top: -30px;"/></a>
		     {/if}
            </div>
	    
          </div>
          <div id="points" class="hires_box" >
            <h2>Points</h2>
	      {if $Total_pnts|@count gt 0}
	      {section name=i loop=$Total_pnts}
	      <a href="#" >{$Total_pnts[i]}</a>
	      {/section}
	      {/if}
					
	   <!--<span style="color: #F26823;font-size: 38px;"> {$Total_pnts}</span>-->
            <!--<span><img src="{$tconfig["front_images"]}points.png" alt="Points" title="Points" border="0" /></span>-->
	  </div>
        </div>
			
			
			<div id="header-row-bottom"> 
          <!-- business-info-->
          <div class="business-info">
            <div class="business-top">
              <ul>
	       {if $db_user[0].vBizName neq ''}
                <li class="b1">
                  <label>Business</label>
                  <span>:</span><b>{$db_user[0].vBizName}</b> </li>
		{/if}
		{if $db_user[0].vEmail neq ''}
                <li class="e1">
                  <label>E-mail id</label>
                  <span>:</span><b>{$db_user[0].vEmail}</b></li>
		{/if}
		{if $db_user[0].vCity neq ''}
                <li class="l1">
                  <label>Lives in</label>
                  <span>:</span> <b>{$db_user[0].vCity}</b></li>
		 {/if}
		   {if $db_user[0].vCountry neq '' || $db_user[0].vState neq ''}
		  <li class="f1">
                  <label>From</label>
                  <span>:</span><b>{$db_user[0].vCountry} , {$db_user[0].vState}</b>
		  </li>
		  {/if}
              </ul>
            </div>
            <div class="member-info">
              <ul>
                <li><a href="#Memstatus" id="status">Member stats</a></li>
		{if $db_generalsetting[0].eShowSkill eq 'Yes'}
                <li><a href="#skillcontactDiv" id="skillcontactId">Skills</a></li>
		{/if}
		{if $db_generalsetting[0].eShowIntrest eq 'Yes'}
                <li class="last"><a href="#interestcontactDiv" id="interestcontactId">Interest</a></li>
		{/if}
              </ul>
            </div>
          </div>
          <!-- end business-info-->
          <div class="business-categories">
            <ul>
	     {if $db_generalsetting[0].eBizContact eq 'Yes' || $db_generalsetting[0].eBizContact eq ''}
              <li class="first">
                <div class="detail"><a href="#bizcontactDiv" id="bizcontactId"><img src="{$tconfig["front_images"]}biz-contact.png" alt="" title=""></a></div>
                <div class="title"> <span class="text"><a href="#">Biz Contact</a></span> <span class="count">&nbsp;</span> </div>
              </li>
	      {/if}
              <li>
                <div class="detail"><a href="{$site_url}/public_frientlist/{$db_user[0].vMemberUrl}" ><img src="{$tconfig["front_images"]}friends.png" alt="" title=""></a></div>
                <div class="title"> <span class="text"><a href="#">Friends</a></span> <span class="count">{$frnd_count}</span> </div>
              </li>
              <li>
                <div class="detail"><a href="{$site_url}/publiPhotoalbum/{$db_user[0].vMemberUrl}"><img src="{$tconfig["front_images"]}photos.png" alt="" title=""></a></div>
                <div class="title"> <span class="text"><a href="#">Photo</a></span> <span class="count">{$totPhoto}</span> </div>
              </li>
              <li>
                <div class="detail"><a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}"><img src="{$tconfig["front_images"]}mystore.png" alt="" title=""></a></div>
                <div class="title"> <span class="text"><a href="#">My Store</a></span> <span class="count">&nbsp;</span> </div>
              </li>
              <li>
                <div class="detail"><a href="{$site_url}/publicCompaign/{$db_user[0].vMemberUrl}"><img src="{$tconfig["front_images"]}carr.png" alt="" title=""></a></div>
                <div class="title"> <span class="text"><a href="#">Campaigns</a></span> <span class="count">{$totCampaign}</span> </div>
              </li>
              <li>
                <div class="detail"><a href="{$site_url}/publicJob/{$db_user[0].vMemberUrl}"><img src="{$tconfig["front_images"]}jobs.png" alt="" title=""></a></div>
                <div class="title"> <span class="text"><a href="#">Jobs</a></span> <span class="count">{$totJob}</span> </div>
              </li>
            </ul>
          </div>
        </div>
			<div style="display:none">
					<div id="Memstatus" class="bannerPopup" style="min-height: 150px; padding-top:0;">
						<h3>Member status</h3>
						<div class="bizpublic_secolink">
							<table style="padding-top:10px;width:100%" >
								{if $db_user[0].vName neq ''}
								<tr>
									<td>Member Name</td>
									<td><span>{$db_user[0].vName}</span></td>
								</tr>
								{/if}
								{if $db_user[0].eGender neq ''}
								<tr>
									<td>Identifier</td>
									<td><span>{$db_user[0].eGender}</span></td>
								</tr>
								{/if}
								{if $db_user[0].vCountry neq '' || $db_user[0].vState neq '' || $db_user[0].vCity neq ''}
								<tr>
									<td>From</td>
									<td><span>{$db_user[0].vCountry},{$db_user[0].vState},{$db_user[0].vCity}</span></td>
								</tr>
								{/if}
								{if $db_user[0].vStudiedAt neq '' || $db_user[0].vDegree neq ''}
								<tr>
									<td>Degree</td>
									<td><span>{$db_user[0].vStudiedAt},{$db_user[0].vDegree}</span></td>
								</tr>
								{/if}
								{if $db_user[0].vOccupation neq ''}
								<tr>
									<td>Occupation</td>
									<td><span>{$db_user[0].vOccupation}</span></td>
								</tr>
								{/if}
								
							</table>
						</div>
						<div style="clear:both;"></div>
					</div>
			 </div>
			
			</div>
				<div style="display:none">
					<div id="skillcontactDiv" class="bannerPopup" style="min-height:135px; width:289px; padding-top:0;">
						<h3 style="line-height:0px;font-size:22px;">Skill</h3>
						<div class="bizpublic_secolink" style="width:272px;">
							<div class="skill_popup"> {if  $db_relatedArr|@count gt 0}										
								{section name=i loop=$db_relatedArr}
								<div class="skill_popup_content">{$db_relatedArr[i]}</div>
								{/section}
								{/if} </div>
						</div>
						<div style="clear:both;"></div>
					</div>
					</div>
	
				
				
				<div style="display:none">
					<div id="interestcontactDiv" class="bannerPopup" style="min-height: 150px;  width:300px; padding-top:0;">
						<h3>Interest:</h3>
						<div class="bizpublic_secolink" style="width:272px;">
							<div class="skill_popup" style="text-align:center;padding-top:5px;color:#E26700"> {if  $db_relatedArrIntrest|@count gt 0}
								{section name=i loop=$db_relatedArrIntrest}
								<div class="skill_popup_content">{$db_relatedArrIntrest[i]}</div>
								{/section}
								{/if} </div>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				<div style="display:none">
					<div id="bizcontactDiv" class="bannerPopup" style="min-height: 150px; padding-top:0;">
						<h3>Biz Contact</h3>
						<div class="bizpublic_secolink">
							<table style="padding-top:10px;width:100%" >
								{if $db_user[0].vCountry neq ''}
								<tr>
									<td>Address</td>
									<td><span>{$db_user[0].vCountry}</span></td>
								</tr>
								{/if}
								<tr>
									<td></td>
									<td><span>{if $db_user[0].vAddress neq ''}{$db_user[0].vAddress},{/if} {if $db_user[0].vCity neq ''}{$db_user[0].vCity}{/if} {if $db_user[0].vState neq ''}-{$db_user[0].vState}{/if} {if $db_user[0].vZipCode neq ''}{$db_user[0].vZipCode}{/if}</span></td>
								</tr>
								{if $db_user[0].vPhone neq ''}
								<tr>
									<td>Contact</td>
									<td><span>{$db_user[0].vPhone}</span></td>
								</tr>
								{/if}
								{if $db_user[0].vEmail neq ''}
								<tr>
									<td>Email</td>
									<td><a style="text-decoration:none;" href="mailto:{$db_user[0].vEmail}"><span>{$db_user[0].vEmail}</span></a></td>
								</tr>
								{/if}
								{if $db_user[0].vWebsite1 neq ''}
								<tr>
									<td>Website</td>
									
									<td><a style="text-decoration:none;" href="{$db_user[0].vWebsite1}" target="_blank"><span>{$db_user[0].vWebsite1}</span></a></td>
								</tr>
								{/if}
								{if $db_user[0].vWebsite2 neq ''}
								<tr>
									<td></td>
									<td><a style="text-decoration:none;" href="{$db_user[0].vWebsite2}" target="_blank"><span>{$db_user[0].vWebsite2}</span></a></td>
								</tr>
								{/if}
								{if $db_user[0].vWebsite3 neq ''}
								<tr>
									<td></td>
									<td><a style="text-decoration:none;" href="{$db_user[0].vWebsite3}" target="_blank"><span>{$db_user[0].vWebsite3}</span></a></td>
								</tr>
								{/if}
								<!--{$urll}-->
								<tr ><td></td><td align="right"><div class="aboutus_link"><a href="#Share{$db_user[0].iMemberId}" id="share{$db_user[0].iMemberId}" class="share"><input type="button" value="Share this contact" style="cursor:pointer;"/></a></div></td></tr>
								<div style="display:none">
									<div id="Share{$db_user[0].iMemberId}" style="width:335px;background:#fff;padding:10px;text-align:center;height:35px;">
									<div class="social_icon">
									<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
										<a class="addthis_button_preferred_1"></a>
										<a class="addthis_button_preferred_2"></a>
										<a class="addthis_button_preferred_3"></a>
										<a class="addthis_button_preferred_4"></a>
										<a class="addthis_button_compact"></a>
										<a class="addthis_counter addthis_bubble_style"></a>
									</div>
								{literal}<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>{/literal}
								</div>
								</div>
							</table>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
			</div>
			</div>
			
			<div class="cl"></div>
		
		<div id="timeline_tab_content">
		<div id="timeline-col-left">
		<div id="composer">
            <div class="timeline-arrow"></div>
            <ul class="clearfix">
	     {if $song neq 0 || $songalb neq 0}	   
              <li class="ms"><a href="{$site_url}/public_songs/{$db_user[0].vMemberUrl}"><span>My Songs</span><i class="cp_arrow"></i></a></li>
	     {/if}
	      <!--<li class="ph"><a href="{$site_url}/publiPhotoalbum/{$db_user[0].vMemberUrl}">Photo</a></li>-->
	      
	      {if $VideoCategoryArr|@count gt 0 || $video|@count gt 0}	   
              <li class="vd"><a href="{$site_url}/public_videos/{$db_user[0].vMemberUrl}">Videos</a></li>
	      {/if}
	      {if $event neq 0}
              <li class="me"><a href="{$site_url}/public_events/{$db_user[0].vMemberUrl}">My Event</a></li>
	      {/if}
	      {if $blog neq 0}	      
              <li class="mb"><a href="{$site_url}/public_blogs/{$db_user[0].vMemberUrl}">My Blog</a></li>
	      {/if}
	      {if $aboutus neq 0}
              <li class="ab last"><a href="{$site_url}/public_aboutus/{$db_user[0].vMemberUrl}">About</a></li>
	      {/if}
		    <div class="cl"></div>
            </ul>
            <div class="timeline-composer">
             <div class="composer-content">
                <textarea  id="comment" name="comment" cols="1" rows="2" onfocus="if(this.value=='How are you feeling,{$mem_info[0].vName}?') this.value='';" onblur="if(this.value=='') this.value='How are you feeling,{$mem_info[0].vName}?';" >How are you feeling,{$mem_info[0].vName}?</textarea>
              </div>
		    
	      <div class="timeline-composer-post clearfix">
	        <input type="button" value="Post Comment" name="postcomment" onclick="submitcomment('Public',{$db_user[0].iMemberId});">
	       {if $db_user[0].iMemberId neq $mem_info[0].iMemberId}
	       <u><a href="javascript:void(0);" style="font-size: 13px;"onclick="submitcomment('Private',{$db_user[0].iMemberId});" >Send {$db_user[0].vName} a message</a></u>     
	      
	       <div class="cl"></div>
		<!-- <span class="border_left"></span>-->
		 <div id="add_frnd_div" style="float: left;">
			 {if $check_frnd eq 'Notsend'}<a style="text-decoration: underline;" href="javascript:void(0);" onclick="send_frndrequest('{$db_user[0].iMemberId}','send');" class="add_frnd_btn">Add Friend</a>{/if}
			 {if $check_frnd eq 'Requested'}<a style="text-decoration: underline;" href="javascript:void(0);" onclick="send_frndrequest('{$db_user[0].iMemberId}','accept');" class="respond_frnd_btn">Respond to Friend </a>{/if}
			 {if $check_frnd eq 'Pending'}<a style="text-decoration: underline;" href="javascript:void(0);" class="frnd_req_btn">Friend Request Sent</a>{/if}
			 {if $check_frnd eq 'Approve'}<a style="text-decoration: underline;" href="javascript:void(0);" class="frnd_btn">Friend</a>{/if}
			 <!--{if $check_frnd eq 'Blocked'}<a href="javascript:void(0);">Blocked</a>{/if}-->
		</div>
		 {/if}
                
		  <div class="cl"></div>
              </div>
	       
              
            </div>
          </div>
		
		
		 <div class="timeline-block news">
		 <div class="timeline-block-inner">
		  <div class="timeline-arrow"></div>
		  <div class="timeline-header">
                <ul class="clearfix">
                  <li class="r1 active"><a  href="javascript:void(0);" id="active">Relevant News</a></li>
		  {if $db_distresult[0]['vMemberUrl'] neq ''}
		  <li class="d1" ><a  href="{$site_url}/{$db_distresult[0]['vMemberUrl']}" >District News</a></li>
		  {else}
		  <li class="d1" ><a  href="javascript:void(0);" >District News</a></li>
		  {/if}
		  {if $db_cityresult[0]['vMemberUrl'] neq ''}
                  <li class="c1 last" ><a  href="{$site_url}/{$db_cityresult[0]['vMemberUrl']}" >City News</a></li>
		  {else}
		  <li class="c1 last" ><a  href="javascript:void(0);" >City News</a></li>
		  {/if}	
			   <div class="cl"></div>
                </ul>
              </div>
		     <div class="timeline-content"> 
			<div id="relevent_news"></div>
		    
		 </div>
		 </div>
		
		</div>
		
		</div>
		<div id="timeline-col-right"> 
		<div class="timeline-block feed">
		<div class="timeline-block-inner">
		<div class="timeline-header">
                <ul class="clearfix">
                  <li class="f1">Activity Feed</li>
                  <!--<li class="edit"><a href="#"></a></li>-->
			   <div class="cl"></div>
                </ul>
              </div>
		    <div id="activity_feed"></div>
		    
		</div>
		</div>
	
		
	    <div class="timeline-block recent-friend">
            <div class="timeline-block-inner">
              <div class="timeline-header">
            <ul class="clearfix">
	     
		     <li class="mrf">My Recent Friends</li>
		     {if $db_user[0].iMemberId neq $mem_info[0].iMemberId}
		      <div id="add_frnd_div" class="friendstr">
				{if $check_frnd eq 'Notsend'}<a href="javascript:void(0);" onclick="send_frndrequest('{$db_user[0].iMemberId}','send');" class="add_frnd_btn">Add Friend</a>{/if}
				{if $check_frnd eq 'Requested'}<a href="javascript:void(0);" onclick="send_frndrequest('{$db_user[0].iMemberId}','accept');" class="respond_frnd_btn">Respond to Friend </a>{/if}
				{if $check_frnd eq 'Pending'}<a href="javascript:void(0);" class="frnd_req_btn">Friend Request Sent</a>{/if}
				{if $check_frnd eq 'Approve'}<a href="javascript:void(0);" class="frnd_btn">Friend</a>{/if}
				<!--{if $check_frnd eq 'Blocked'}<a href="javascript:void(0);">Blocked</a>{/if}-->
		       </div>
		     <div class="cl"></div>  <!-- <span class="border_left"></span>-->
		    {/if}
                  
                </ul>
		<div class="cl"></div>
              </div>
		    <div id="recent_frnd"></div>
		    </div></div>
	    
              <div class="timeline-content">
	       
		
		
		
		
		 </div>
	    </div>
	    <div class="cl"></div>
</div>	
		
		</div>
		<div class="cl"></div>
	</div>
	</div>
</div>
</div>
<div style="display:none">
  <div id="Share" style="width:335px;background:#fff;padding:10px;text-align:center;height:35px;">
    <div class="social_icon">
      <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
       <a class="addthis_button_preferred_1"></a>
       <a class="addthis_button_preferred_2"></a>
       <a class="addthis_button_preferred_3"></a>
       <a class="addthis_button_preferred_4"></a>
       <a class="addthis_button_compact"></a>
       <a class="addthis_counter addthis_bubble_style"></a>
      </div>
     <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>
   </div>
  </div>
</div>
<!--body part end here -->
{literal}

<script>
displaypublicprofile(1,'{/literal}{$db_user[0].iMemberId}{literal}');
publicreleventnews(1,'{/literal}{$db_user[0].iMemberId}{literal}');
displayrecentFriend(1,'{/literal}{$db_user[0].iMemberId}{literal}');
</script>

{/literal}    

{literal}
<script type="text/javascript">
$(window).load(function() {
     
	$('#slider').nivoSlider({
		animSpeed: 50, // Slide transition speed
		pauseTime: 4000,// How long each slide will show
		afterLoad: function () { jQuery("#slider").css("background","#FFFFFF"); },
	});
       
    });
$(document).ready(function(){
$('.share').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
	
    
    
   
$(document).ready(function(){
$('#bizcontactId').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});

$(document).ready(function(){
$('#skillcontactId').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',	
	'scrolling' : 'no'	
});
});

$(document).ready(function(){
$('#interestcontactId').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});
$(document).ready(function(){
$('#status').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'	
});
});

function submitcomment(eType,id)
{
document.getElementById('comment').focus();

	var extra = '';
	if($('#comment')){
		if(($('#comment').val() =='')){
			
			//$('#statusmsg').html("Please first enter your comment").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vDescription = $('#comment').val();
			extra+='&vDescription='+encodeURIComponent(vDescription.replace("//","backslash"));
		}
	}
	extra+='&eType='+eType;
	extra+='&iMemberId='+id;
	$('#addqmein_loading').show();
	var url = site_url+"/index.php?file=a-ajstatusupdate";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
        function(data) {
		$('#addqmein_loading').hide();
		if(data == 'Public'){
			$('#comment').val('');
			displaypublicprofile(1,'{/literal}{$db_user[0].iMemberId}{literal}');
			$('#statusmsg').html('');
			
		}else{
			$('#comment').val('');
			$('#statusmsg').html('');
		}
		
	});
}
function send_frndrequest(id,type){
	
	
	var extra ='';
	extra+='&iMemberId='+id;
	extra+='&type='+type;
	var url = site_url+"/index.php?file=a-ajsendfrndrequest";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
		
		if(data == 'success'){
			$('#add_frnd_div').html('<a href="javascript:void(0);" class="frnd_req_btn">Friend Request Sent</a>');
			$('.friendstr').html('<a href="javascript:void(0);" class="frnd_req_btn">Friend Request Sent</a>');
		}else if(data == 'Accept'){
			$('#add_frnd_div').html('<a href="javascript:void(0);" class="frnd_btn">Friend</a>');
			$('.friendstr').html('<a href="javascript:void(0);" class="frnd_btn">Friend</a>');
		}
	});
}
</script>
{/literal}