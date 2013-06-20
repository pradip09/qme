<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>



<div id="services_box" class="desboard_body">{include file="member/myaccountleft.tpl"}</div>
<div class="desboard-right">
	<div id="post-update">
          <div class="post-title">
            <h1>Post an Update</h1>
          </div>
          <div class="post-content">
     
           <textarea name="status_desc" id="status_desc" cols="1" rows="2" onfocus="if(this.value=='{$db_post[0]['vValue']}') this.value='';" onblur="if(this.value=='') this.value='{$db_post[0]['vValue']}';" >{$db_post[0]['vValue']}</textarea>
            
          </div>
        </div>
	   
	   <div id="recent-acitivity">
          <h1>Recent Activities</h1>
          <form name="postcomment" id="postcomment" method="post"  enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajstatusupdate">
          <ul >
            <li class="first"><a href="{$site_url}/myinbox" class="r1"><span>[{$meminboxcnt}]</span> Inbox Mail</a></li>
            <li><a href="{$site_url}/myfriendlist" class="r2">My friends</a></li>
            <li><a href="{$site_url}/{$mem_info[0].vMemberUrl}" class="r3" style="margin-right: 54px;">View My Public Profile</a></li>
            <li class="last">
                  <input type="button" value="Submit" name="submit" onclick="statusupdate();">
                
             </li>
          </ul>
          </form>
        </div>
	   
	  
	
	<div class="ProcessingIndication Navigation Myaccount" id="request_loading">Please Wait Request List Loading...</div>
	<!--<div class="inbox_mail_frd_link"> <a href="{$site_url}/myinbox">[{$meminboxcnt}] Inbox Mail</a>|<a href="{$site_url}/myfriendlist">My friends</a>|<a href="{$site_url}/{$mem_info[0].vMemberUrl}">View Your Public Profile </a> </div>
	<div class="recent_activities_title" id="recentactivity">Recent Activities</div>-->
	<div class="ProcessingIndication Navigation Myaccount" id="recent_loading">Please Wait RecentActivity Loading...</div>
	<div class="ProcessingIndication Navigation Myaccount" id="searchdataqme">Please Wait searching process is running...</div>
	<div id="frndrequestdiv"></div>
	<div id="displayactivity"></div>
	<!--<div id="displaysearchdata"></div>-->
	 <div id="timeline-block" class="profile news">
            <div class="timeline-block-inner">
		<div class="timeline-header" style="background:none; padding:0px 17px;" id="nav_index">
                <ul class="clearfix">
                  <li class="r1 active" ><a class="active"  href="javascript:void(0);" >Relevant News</a></li>
		  {if $db_distresult[0]['vMemberUrl'] neq ''}
                 <a  href="{$site_url}/{$db_distresult[0]['vMemberUrl']}" > <li class="d1" >District News</li></a>
		  {else}
		  <li class="d1" ><a  href="javascript:void(0);" >Qmunity News</a></li>
		  {/if}
		  {if $db_cityresult[0]['vMemberUrl'] neq ''}
                <a  href="{$site_url}/{$db_cityresult[0]['vMemberUrl']}" >  <li class="c1 last" >City News</li></a>
		  {else}
		  <li class="c1 last" ><a  href="javascript:void(0);" >City News</a></li>
		  {/if}		
                </ul>
			   <div class="cl"></div>
              </div>
		    <div class="cl"></div>
		<div id="myaccount_news"></div>
	</div>
	</div>
</div>
<div class="cl"></div>
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

{/literal} 