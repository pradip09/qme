<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}latest/easy.notification.js"></script>

<div class="container_12" id="wrapinner">
	<div class="grid_12" id="dashboard_wrap">
	 <div class="clear"></div>   
	<div class="grid_3 alpha" id="leftdashboard">{include file="member/myaccountleft.tpl"}</div>
	<div class="grid_9 omega" id="rightdashboard">   
    
	   <ul id="nav_top">
		<li>    
			<a href="{$site_url}/myinbox" class="btn btnTop round29 ">
			<span class="inbox"></span>Inbox 
			<span class="bluelink" style="font-family: 'Driod Sans', Arial;"><b>({$meminboxcnt} New)</b></span>
			</a>
		</li>			 
		<li>
			<a href="{$site_url}/myfriendlist" class="btn btnTop_active round29 ">
			<span class="friends"></span>My Friends 
			<span class="orangelink" style="font-family: 'Driod Sans', Arial;"><b>({$friendlist})</b></span>
			</a>
		</li>
			 
		<li>
			<a href="{$site_url}/{$mem_info[0].vMemberUrl}" class="btn btnTop round29 ">
			<span class="profileicon"></span> 
			<span class="orangelink" style="font-family: 'Driod Sans', Arial;"><b>View my profile Online</b></span>
			</a>
		</li>       
	  </ul>
   
     <div class="sep"></div>     
    <div class="clear"></div>    
     
     <div id="notifyarea">	
	
	
	<div class="steps">    
	<span class="step2"></span>
	<div id="stepstext">
		
		
	</div>
	<!--style="margin: 8px 0 0 0;float: left;-->
            <ul id="stepstext" >
                        <li style=" padding-top:0px; float:left;"><a href="{$site_url}/myprofile" style="text-decoration: none;color: #989DA4;">Profile setup</a></li>                        
                        <li class="current" style=" float:left;"><a href="{$site_url}/myprofile" style="text-decoration: none;"	>BizContact<br /> Setup</a></li>                        
                        <li style=" padding-top:0px; float:left;" class="desabled"><a href="{$site_url}/mypostcampaign" style="text-decoration: none;color: #989DA4">Post Campaigns</a></li>                        
                        <li class="disabled" style=" float:left;"><a href="{$site_url}/invite_friends" style="text-decoration: none;color: #989DA4">Invite friends &amp; earn money</a></li>                        
                        <li style=" padding:0px 0 0 16px; float:left;"class="disabled">Complete</li>
                
           </ul>
	</div>
        <div class="clear"></div>
        <div class="spacer10"></div>
        <div class="postbox">
		<textarea name="status_desc" id="status_desc" cols="25" rows="2" class="postupdate"  onfocus="if(this.value=='{$db_post[0]['vValue']}') this.value='';" onblur="if(this.value=='') this.value='{$db_post[0]['vValue']}';" >{$db_post[0]['vValue']}</textarea>
	     
	       <button class="btn btnGreypost postbtn" onclick="statusupdate();" id="btn_post" style="margin-top:7px;"><span class="posticon" ></span>Post Update</button>
	</div> 
	</div> 
     
     
     <div class="clear"></div>
     <div class="spacer10"></div>
     <div class="ProcessingIndication Navigation Myaccount" id="request_loading">Please Wait Request List Loading...</div>	
	<div class="ProcessingIndication Navigation Myaccount" id="recent_loading">Please Wait RecentActivity Loading...</div>
	<div class="ProcessingIndication Navigation Myaccount" id="searchdataqme">Please Wait searching process is running...</div>
	<div id="frndrequestdiv"></div>	
     <div class="activitybox">
         <h3><span class="activityicon"></span>Activity Feed</h3>
     <div id="displayactivity"></div>
     </div>
     
     
     <div class="clear"> </div>
     <div class="spacer10"></div>
         <div class="newsbox">     
			<ul class="tabs"> 
			 <li class="active" rel="tab1"><span class="relevant_icon"></span>Relevant News</li>
			  {if $db_distresult[0]['vMemberUrl'] neq ''}
			 <li ><span class="qmunity_icon"></span> <a  href="{$site_url}/{$db_distresult[0]['vMemberUrl']}" style="text-decoration:none;color:#fff;"> Qmunity News</a></li>
			 {else}
			  <li rel="tab1"><span class="qmunity_icon"></span> Qmunity News</li>
			  {/if}
			   {if $db_cityresult[0]['vMemberUrl'] neq ''}
			 <li ><span class="city_icon"></span>   <a  href="{$site_url}/{$db_cityresult[0]['vMemberUrl']}" style="text-decoration:none;color:#fff;"> City News</a></li>
			{else}
			 <li rel="tab1"><span class="city_icon"></span> City News</li>
			 {/if}			
		     </ul>
		<div class="tab_container"> 
			<div id="tab1" class="tab_content"> 
				<div id="myaccount_news"></div>
				<div class="clear"></div>
			</div>
		</div> 
 
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
{literal}
<script type="text/javascript">
displayfrndrequest(0);
displayrecentactivity(0,'{/literal}{$iUserId}{literal}');
displayreleventnews(1,'{/literal}{$iUserId}{literal}');
function statusupdate()
{
 document.getElementById('status_desc').focus();
	var extra = '';
	if($('#status_desc')){
		if(($('#status_desc').val() =='')){
			//$('#statusmsg').html("Please first enter status").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vDescription = $('#status_desc').val();
			extra+='&vDescription='+encodeURIComponent(vDescription.replace("//","backslash"));
		}
	}
	var eType = 'Public';
	extra+='&eType='+eType;
	$('#addqmein_loading').show();
	var url = site_url+"/index.php?file=a-ajstatusupdate";
	var pars = extra;
	//alert(url+pars);
	$.post(url+pars,
        function(data) {
		$('#addqmein_loading').hide();
		if(data == 'Public'){
			$('#comment').val('');
			window.location='{/literal}{$site_url}{literal}'+'/myaccount/';
		}
		
	});
}

</script>
<script type="text/javascript">
  
	$(function(){		   
		$.easyNotification({
	text: 'Your profile needs to be completed. Please complete your profile and earn <b>500 Qme Points</b>',
	parent: '#notifyarea',
	closeClassName: 'cross',
	closeText: 'Close'
});	
	});
</script>

{/literal} 
