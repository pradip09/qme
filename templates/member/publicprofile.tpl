<!DOCTYPE html>
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/default.css" type="text/css" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="{$tconfig["tsite_url"]}/public/nivoslider/nivo-slider.css" type="text/css" media="screen" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script type="text/javascript" src="{$tconfig["tsite_url"]}/public/nivoslider/jquery.nivo.slider.publicprofile.js"></script>



<script type="text/javascript" src="{$tconfig["front_javascript"]}latest/sportsprofile.js"></script>


<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif:400italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif:700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif:700italic" rel="stylesheet" type="text/css">
	
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/reset.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/text.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/960.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/icons.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/buttons.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/profile.css" />
<!--<link rel="stylesheet" href="{$tconfig["front_css"]}latest/select/Selectyze.jquery.css" />-->


<div class="clear"></div>
<div id="member_profile_wrap">
	{if $db_banner|@count gt 0}
	<div class="container_12" id="member_container">
		
		
		 <div class="grid_12" id="member_top">
			{if $db_banner|@count eq 1}
				<style type="text/css">
					#slider {
					  overflow: hidden;   
					}
					</style>
					<img src="{$tconfig["tsite_upload_images_member"]}{$db_banner[0].iMemberId}/banner/{$db_banner[0].vBannerImage}" data-thumb="{$tconfig["tsite_upload_images_member"]}{$db_banner[0].iMemberId}/banner/{$db_banner[0].vBannerImage}" alt="" title="" width="941"/>
				{/if}
				{if $db_banner|@count gt 1}
				<style type="text/css">
					#slider {
					height: 290px;
					  overflow: hidden;   
					}
					</style>
				<div id="slider" class="nivoSlider">
					{section name=i loop=$db_banner}
						<img src="{$tconfig["tsite_upload_images_member"]}{$db_banner[i].iMemberId}/banner/{$db_banner[i].vBannerImage}" data-thumb="{$tconfig["tsite_upload_images_member"]}{$db_banner[i].iMemberId}/banner/{$db_banner[i].vBannerImage}" alt="" title="" height="333"/>
					{/section}
				</div>
				{/if}

				<!--<img src="{$tconfig["front_images"]}banner_noimage.png" width="941"/>-->

						
			  <div class="grid_3" id="member_profile">		
				<div class="member_img">
					       {if $mem_info[0].vProfileImage eq '' || $db_user[0].vProfileImage eq ''} <img src="{$tconfig["front_images"]}login-photo.png" width="101px;" height="105px;" alt="" title="" /> {else} <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/{$db_user[0].vProfileImage}" alt="" title="" width="101px;" height="105px;"/> {/if}
			       </div>
			       <div id="member_summary">
				       <span class="member_title">{$db_user[0].vName}</span>
				       <span class="member_place">Lives in {$db_user[0].vCountry} </span>
				       <br>
				       <span class="member_points">Points: <a href="#">{$Total_pnts}</a> </span>
			       </div> 
		</div>  
		</div>		 
	 <div class="grid_12" id="member_bottom">        
		<div class="imageslist_container_member">		
		<ul class="imageslist">		
			 <li><a href="{$site_url}/public_frientlist/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}friends.png"  width="102px" height="102px;" class="imgshadow_light"><span>Fans & Friends {$frnd_count}</span></a></li>
			 
			 <li><a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}" >
			<img src="{$tconfig["front_images"]}mystore.png"  width="102px" height="102px;" class="imgshadow_light"><span style="color:#FF9216">My Store</span></a></li>
			
		       
			<li><a href="{$site_url}/public_videos/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}public-video-icon.jpg"   width="102px" height="102px;" class="imgshadow_light"><span>Videos</span></a></li>
			
			 <li><a href="{$site_url}/publicCompaign/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}carr.png" class="imgshadow_light" width="102px" height="102px;"><span>Campaigns {$totCampaign}</span></a></li>
			
			
					
		</ul>
		
	</div> 		
	<div class="imageslist_container_member">		
		<ul class="imageslist">
			
			 <li><a href="{$site_url}/publicJob/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}jobs.png"  width="102px" height="102px;" class="imgshadow_light"><span>Job {$totJob}</span></a></li>
			
			 <li><a href="{$site_url}/public_fund_capmp/{$db_user[0].vMemberUrl}" >
			<img src="{$tconfig["front_images"]}suppotme.png"  width="102px" height="102px;" class="imgshadow_light"><span style="color:#FF9216">My Charities</span></a></li>	  
			
			<!--<li><a href="javascript:void(0);" >
			<img src="{$tconfig["front_images"]}noimage.jpg"  width="102px" height="102px;" class="imgshadow_light"><span style="color:#FF9216">My Charities</span></a></li>-->			  
			
			<li><a href="{$site_url}/publiPhotoalbum/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}photos.png"  width="102px" height="102px;" class="imgshadow_light"><span>Photo {$totPhoto}</span></a></li>
			
			<li><a href="javascript:void(0);">
			<img src="{$tconfig["front_images"]}contest-icon.jpg"   width="102px" height="102px;" class="imgshadow_light"><span>Contests</span></a></li>
		       
			
						
		</ul>
	</div> 
    
        <div class="members_area">
                <ul class="navaccept_member" >
			{if $db_user[0].iMemberId neq $mem_info[0].iMemberId}			
			 {if $check_frnd eq 'Notsend'}<li id="linkfan"><a href="javascript:void(0);" class="linkfan linkbtn" onclick="send_frndrequest('{$db_user[0].iMemberId}','send');" style="color: #fff">Become a fan</a></li>{/if}					 
			 {if $check_frnd eq 'Requested'}<li ><a  href="javascript:void(0);" class="linkfan linkbtn" onclick="send_frndrequest('{$db_user[0].iMemberId}','accept');" >Respond to Friend</a></li>{/if}
			 {if $check_frnd eq 'Pending'}<li ><a  href="javascript:void(0);" class="linkfan linkbtn" >Request Sent</a></li>{/if}
			 {if $check_frnd eq 'Approve'}<li  ><a  href="javascript:void(0);"class="linkfan linkbtn" >Friend</a></li>{/if}
			 {/if}
			<li> <a href="#Share" class="linkshare1 linkbtn" id="pubilcshare" style="color: #fff">Share</a></li>
			{if $db_user[0].iMemberId neq $mem_info[0].iMemberId}			
			<li><a href="#popmsg" class="linkmessage linkbtn" style="color: #fff" id="commenticon" >Send Message</a></li>
			{/if}
			
                </ul>
         
	</div> 
    
</div>
    
  <div id="baselink" class="baselink_position">            
         <ul>
                 <li><a href="#Memstatus" id="status">Member Status</a></li>		 
		 {if $db_generalsetting[0].eBizContact eq 'Yes' || $db_generalsetting[0].eBizContact eq ''}
                 <li><a href="#bizcontactDiv" id="bizcontactId" style="color:#FF9216">Biz Contacts</a></li>
		 {/if}
		  {if $db_generalsetting[0].eShowIntrest eq 'Yes'}
                  <li><a href="#interestcontactDiv" id="interestcontactId">Interests</a></li>
		 {/if}
		  {if $event neq 0}
		 <li ><a href="{$site_url}/public_events/{$db_user[0].vMemberUrl}">My Event</a></li>
		 {/if}
		 {if $blog neq 0}	
                 <li><a href="{$site_url}/public_blogs/{$db_user[0].vMemberUrl}">Blog</a></li>
		 {/if}
		 {if $aboutus neq 0}
		<li ><a href="{$site_url}/public_aboutus/{$db_user[0].vMemberUrl}">About</a></li>
		{/if}
        </ul>  
 </div>
  
  
  
  	
</div>
{else}	

  <div class="container_12" id="member_container" style="height: 297px;">
    <div class="grid_3" id="member_profile">
		
		 <div class="member_img" style="top:7px;">
				{if $mem_info[0].vProfileImage eq '' || $db_user[0].vProfileImage eq ''} <img src="{$tconfig["front_images"]}login-photo.png" width="101px;" height="105px;" alt="" title="" /> {else} <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/{$db_user[0].vProfileImage}" alt="" title="" width="101px;" height="105px;"/> {/if}
		</div>
		<div id="member_summary" style="top:1px;">
			<span class="member_title">{$db_user[0].vName}</span>
			<span class="member_place">Lives in {$db_user[0].vCountry} </span>
			<br>
			<span class="member_points">Points: <a href="#">{$Total_pnts}</a> </span>
		</div>
		
   </div>
     <div class="grid_12" id="member_bottom" style="top: 121px;">        
		<div class="imageslist_container_member">		
		<ul class="imageslist">		
			
			<li><a href="{$site_url}/public_frientlist/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}friends.png"  width="102px" height="102px;" class="imgshadow_light"><span>Fans & Friends {$frnd_count}</span></a></li>
			 
			 <li><a href="{$site_url}/publicMystore/{$db_user[0].vMemberUrl}" >
			<img src="{$tconfig["front_images"]}mystore.png"  width="102px" height="102px;" class="imgshadow_light"><span style="color:#FF9216">My Store</span></a></li>
			
		       
			<li><a href="{$site_url}/public_videos/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}public-video-icon.jpg"   width="102px" height="102px;" class="imgshadow_light"><span>Videos</span></a></li>
			
			 <li><a href="{$site_url}/publicCompaign/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}carr.png" class="imgshadow_light" width="102px" height="102px;"><span>Campaigns {$totCampaign}</span></a></li>
			
			 		
		</ul>
		
	</div> 		
	<div class="imageslist_container_member">		
		<ul class="imageslist">		
			 <li><a href="{$site_url}/publicJob/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}jobs.png"  width="102px" height="102px;" class="imgshadow_light"><span>Job {$totJob}</span></a></li>
			
			
			 <li><a href="{$site_url}/public_fund_capmp/{$db_user[0].vMemberUrl}" >
			<img src="{$tconfig["front_images"]}suppotme.png"  width="102px" height="102px;" class="imgshadow_light"><span style="color:#FF9216">My Charities</span></a></li>	  
			
			<!--<li><a href="javascript:void(0);" >
			<img src="{$tconfig["front_images"]}noimage.jpg"  width="102px" height="102px;" class="imgshadow_light"><span style="color:#FF9216">My Charities</span></a></li>			  -->
			
			<li><a href="{$site_url}/publiPhotoalbum/{$db_user[0].vMemberUrl}">
			<img src="{$tconfig["front_images"]}photos.png"  width="102px" height="102px;" class="imgshadow_light"><span>Photo {$totPhoto}</span></a></li>
			
			<li><a href="javascript:void(0);">
			<img src="{$tconfig["front_images"]}contest-icon.jpg"   width="102px" height="102px;" class="imgshadow_light"><span>Contests</span></a></li>			
		</ul>
	</div> 
    
        <div class="members_area">
                 <ul class="navaccept_member" >
			{if $db_user[0].iMemberId neq $mem_info[0].iMemberId}			
			 {if $check_frnd eq 'Notsend'}<li id="linkfan"><a href="javascript:void(0);" class="linkfan linkbtn" onclick="send_frndrequest('{$db_user[0].iMemberId}','send');" style="color: #fff">Become a fan</a></li>{/if}					 
			 {if $check_frnd eq 'Requested'}<li ><a  href="javascript:void(0);" class="linkfan linkbtn" onclick="send_frndrequest('{$db_user[0].iMemberId}','accept');" >Respond to Friend</a></li>{/if}
			 {if $check_frnd eq 'Pending'}<li ><a  href="javascript:void(0);" class="linkfan linkbtn" >Request Sent</a></li>{/if}
			 {if $check_frnd eq 'Approve'}<li  ><a  href="javascript:void(0);"class="linkfan linkbtn" >Friend</a></li>{/if}
			 {/if}
			<li> <a href="#Share" class="linkshare1 linkbtn" id="pubilcshare" style="color: #fff">Share</a></li>
			{if $db_user[0].iMemberId neq $mem_info[0].iMemberId}			
			<li><a href="#popmsg" class="linkmessage linkbtn" style="color: #fff" id="commenticon" >Send Message</a></li>
			{/if}
			
                </ul>
         
	</div> 
    
  </div>
<div id="baselink" class="baselink_position">            
         <ul>
		 
                 <li><a href="#Memstatus" id="status">Member Status</a></li>		 
		 {if $db_generalsetting[0].eBizContact eq 'Yes' || $db_generalsetting[0].eBizContact eq ''}
                 <li><a href="#bizcontactDiv" id="bizcontactId" style="color:#FF9216">Biz Contacts</a></li>
		 {/if}
		  {if $db_generalsetting[0].eShowIntrest eq 'Yes'}
                  <li><a href="#interestcontactDiv" id="interestcontactId">Interests</a></li>
		 {/if}
		  {if $event neq 0}
		 <li ><a href="{$site_url}/public_events/{$db_user[0].vMemberUrl}">My Event</a></li>
		 {/if}
		 {if $blog neq 0}	
                 <li><a href="{$site_url}/public_blogs/{$db_user[0].vMemberUrl}">Blog</a></li>
		 {/if}
		 {if $aboutus neq 0}
		<li ><a href="{$site_url}/public_aboutus/{$db_user[0].vMemberUrl}">About</a></li>
		{/if}
        </ul>  
 </div>
  </div>	
	
{/if}	
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
							<tr ><td></td><td></td><td align="right"><div class="aboutus_link"><a href="#Share{$db_user[0].iMemberId}" id="share{$db_user[0].iMemberId}" class="share"><input type="button" value="Share this contact" style="cursor:pointer;"/></a></div></td></tr>
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
	
	
	
	<div class="clear"></div>
	<div class="container_12" id="nfllower_container">

	<div class="grid_7 alpha" id="nfllower_left">
		
		<div class="nflpostbox">
			 <textarea  id="comment" name="comment" cols="30" rows="3" class="nflpostupdate" onfocus="if(this.value=='Share your thoughts here ,{$mem_info[0].vName}?') this.value='';" onblur="if(this.value=='') this.value='Share your thoughts here ,{$mem_info[0].vName}?';" >Share your thoughts here ,{$mem_info[0].vName}?</textarea>
			 <button class="btn btnOrange postbtn" id="selector"  onclick="submitcomment('Public',{$db_user[0].iMemberId});"><span class="posticon"></span>Post Update</button>
		
		 <div style="display:none">
			<div id="popmsg" class="readpoppup">
			
				<div><textarea rows="4" cols="50" class="textarea" id="private_comment" ></textarea></div> 							
				<div class="btncommnet">
					<input class="btnbg " type="button" value="Send message" onclick="submitcomment('Private','{$db_user[0].iMemberId}');" style="float:right;margin-right: 0px;">
					<div class="cl"></div>
				</div>
			
			</div>
		</div>
				
		</div>
		 <div class="clear"></div>
		
		
		<div class="activitybox_nfl">
			  <h3><span class="activityicon"></span>Activity Feed</h3>
		
			<div id="activity_feed"></div>
		</div>
		 
         <div class="newsbox_nfl" style="margin-top: 6px;">     
			<ul class="tabs"> 
			 <li class="active" rel="tab1"><span class="relevant_icon"></span>Relevant News</li>
			  {if $db_distresult[0]['vMemberUrl'] neq ''}
			 <li ><span class="qmunity_icon"></span> <a style="text-decoration:none;color:#fff;"  href="{$site_url}/{$db_distresult[0]['vMemberUrl']}" > Qmunity News</a></li>
			 {else}
			  <li rel="tab1"><span class="qmunity_icon"></span> Qmunity News</li>
			  {/if}
			   {if $db_cityresult[0]['vMemberUrl'] neq ''}
			 <li ><span class="city_icon"></span>   <a style="text-decoration:none;color:#fff;"  href="{$site_url}/{$db_cityresult[0]['vMemberUrl']}" > City News</a></li>
			{else}
			 <li rel="tab1"><span class="city_icon"></span> City News</li>
			 {/if}			
		     </ul>
		<div class="tab_container"> 
			<div id="tab1" > 
				<div id="relevent_news"></div>
				<div class="clear"></div>
			</div>
		</div> 
 
	</div>
		   
		
	 <div class="ad">
        
        
        <img src="http://192.168.1.12/qme/public/css/images/profile/ad.jpg" width="324" height="282">
        
        </div>
	
	
	</div>
	<div class="grid_5 omega" id="nfllower_right">
		<div class="qedbox">
			<h3><span class="qedicon"></span>Favorites I am Following</h3>
			 
			
		
		</div>		
		<div class="clear"></div>
		<div class="spacer10"></div>
		
		<div class="qedbox">
			<h3><span class="hearticon"></span>Friends and Fans</h3>
			 {if $db_user[0].iMemberId neq $mem_info[0].iMemberId}
		      <div id="add_frnd_div" class="friendstr">
				{if $check_frnd eq 'Notsend'}<a href="javascript:void(0);" onclick="send_frndrequest('{$db_user[0].iMemberId}','send');" class="frnd_btn">Add Friend</a>{/if}
				{if $check_frnd eq 'Requested'}<a href="javascript:void(0);" onclick="send_frndrequest('{$db_user[0].iMemberId}','accept');" class="respond_frnd_btn">Respond to Friend </a>{/if}
				{if $check_frnd eq 'Pending'}<a href="javascript:void(0);" class="frnd_req_btn">Friend Request Sent</a>{/if}
				{if $check_frnd eq 'Approve'}<a href="javascript:void(0);" class="frnd_btn">Friend</a>{/if}
				<!--{if $check_frnd eq 'Blocked'}<a href="javascript:void(0);">Blocked</a>{/if}-->
		       </div>
		     <div class="cl"></div>  <!-- <span class="border_left"></span>-->
		    {/if}
			<div id="recent_frnd"></div>
		
		
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


</html>

{literal}
<script>
displaypublicprofile(1,'{/literal}{$db_user[0].iMemberId}{literal}');
publicreleventnews(1,'{/literal}{$db_user[0].iMemberId}{literal}');
displayrecentFriend(1,'{/literal}{$db_user[0].iMemberId}{literal}');

$(document).ready(function(){
$('#commenticon').fancybox({
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
$('#pubilcshare').fancybox({
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
if (eType == 'Public') {
document.getElementById('comment').focus();
}


	var extra = '';
	if($('#comment')){
		if(($('#comment').val() =='')){
			
			//$('#statusmsg').html("Please first enter your comment").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			
			if (eType == 'Public') {
				 var vDescription = $('#comment').val();
			}else if(eType == 'Private'){
				var vDescription = $('#private_comment').val();
			}
			extra+='&vDescription='+encodeURIComponent(vDescription.replace("//","backslash"));
		}
	}
	extra+='&eType='+eType;
	extra+='&iMemberId='+id;
	//alert(extra);
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
			if(data == 'Private'){
				var html='';
				html+='<div  class="signing" style="height:100px;">';
				html+='<div  style="text-align:center;line-height:93px;color:#5E5E5E;" class="errormsg">Message send Successfully.</div>';
				html+='<div>';
				//alert(html);
				$(document).ready(function () {				
					$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no','onComplete': function() { 
					$("#fancybox-wrap, #fancybox-overlay").delay(2000).fadeOut(); 
					}});
				});
				
			}
			$('#private_comment').val('');
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
			$('#linkfan').html('<a href="javascript:void(0);" class="linkfan linkbtn">Request Sent</a>');
			$('.friendstr').html('<a href="javascript:void(0);" class="frnd_req_btn">Friend Request Sent</a>');
		}else if(data == 'Accept'){
			$('#linkfan').html('<a href="javascript:void(0);" class="linkfan linkbtn">Friend</a>');
			$('.friendstr').html('<a href="javascript:void(0);" class="frnd_btn">Friend</a>');
		}
	});
}
</script>
{/literal}