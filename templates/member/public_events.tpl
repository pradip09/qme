<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div class="desboard_body" id="services_boxinnerbg">

<div class="public_pro_container">
	<div class="top_album_title">
	<div class="top_album_img">
		<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" />
	</div>
	        <div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
	</div>
	<div class="myphoto_album_img">
	<div class="myphoto_album_title">{$db_user[0].vName}'s Events</div>
		<div class="QmeinContentPart PostInnerContentPart" style="padding:15px 0 0 22px">
				<div class="ProcessingIndication Navigation Myaccount" id="mypostjob_loading">Please Wait All Jobs Loading...</div>	
					{if  $event_info|@count gt 0}
					{section name=i loop=$event_info}
						<div class="blog_listing_centerpart" style="padding: 5px 70px;">
							<div class="bloglisting_reapt_box">
								<div class="blog_list_img">
									<img src="{$event_info[i].vEventImage}" alt="" title="" width="100" height="100" />
								</div>
								<div class="bloglisting_reapt_cont">
									<div class="blog_list_title">{$event_info[i].vTitle}</div>
									{$event_info[i].vDescription}<br />
									<span>Location:</span>&nbsp; {$event_info[i].vLocation}
									<div class="blog_reapt_date">{$event_info[i].dEventDate}</div>
									<div class="like_photo"><a href="javascript:void(0);" id="likepublic{$event_info[i].iEventId}" onclick="qmelikepublic('{$event_info[i].iEventId}','{$mem_info[0].iMemberId}','Event','{$event_info[i].iEventId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$event_info[i].iEventId}" onclick="showcomment('{$event_info[i].iEventId}','{$mem_info[0].iMemberId}','Event','{$event_info[i].iEventId}');">Comment</a><a href="javascript:void(0);" id="countcom{$event_info[i].iEventId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$event_info[i].iEventId}" class="share">Share</a></div>
									<div class="BrowseJobLikeLink">
										<a href="#FullDesc{$event_info[i].iEventId}" id="fulldesc{$event_info[i].iEventId}" class="descevent">Read more...</a>
									</div>
									<div style="display:none">
										<div id="FullDesc{$event_info[i].iEventId}" class="readpoppup">
												<div class="popuptext">{$event_info[i].vFullDescription}</div>
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
	numcom('{/literal}{$event_info[i].iEventId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Event','{/literal}{$event_info[i].iEventId}{literal}');
		qmelikepublic('{/literal}{$event_info[i].iEventId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Event','{/literal}{$event_info[i].iEventId}{literal}','0');
		function numcom(iRecentId,iUserId,type,itemid)
		{
		
		var extra ='';
		extra+='&iRecentId='+iRecentId;
		extra+='&iUserId='+iUserId;
		extra+='&type='+type;
		extra+='&itemid='+itemid;
		var url = site_url+"/index.php?file=a-ajcountcomment";
		var pars = extra;
		//alert(url+pars);
		$.post(url+pars,
		function(data) {
		
			id = data.split('&');
			var Data = id[0];
			var Id = id[1];
			$('#countcom'+Id+'').html(Data);
		});
		}
		
		function qmelikepublic(iRecentId,iUserId,type,itemid,start)
		{
		
		var extra ='';
		extra+='&start='+start;
		extra+='&iRecentId='+iRecentId;
		extra+='&iUserId='+iUserId;
		extra+='&type='+type;
		extra+='&itemid='+itemid;
		var url = site_url+"/index.php?file=a-ajlikeitem";
		var pars = extra;
		
		$.post(url+pars,
		function(data) {
		
			id = data.split('&');
			var Data = id[0];
			var Id = id[1];
		
			$('#likepublic'+Id+'').html(Data);
		});
		}
		function showcomment(IRecentId,IUserId,Type,Itemid)
		{
			
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
		
			var url = site_url+"/index.php?file=a-ajcommentlist";
			var pars = extra;
			
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
			function savecomment(IRecentId,IUserId,Type,Itemid)
			{
				
			var extra ='';
			extra+='&iRecentId='+IRecentId;
			extra+='&iUserId='+IUserId;
			extra+='&type='+Type;
			extra+='&itemid='+Itemid;
			var comment = $('#usercomment').val();
			extra+='&comment='+comment;
			var url = site_url+"/index.php?file=a-ajcommentlist";
			var pars = extra;
			$.post(url+pars,
			function(data) {
			$(document).ready(function () {				
                            $.fancybox(data,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                            
                        });
				
				});
			}
</script>
{/literal}
					{/section}
					{else}
					<div style="text-align:center;color:red;">No Events available</div>
					{/if}
		</div>
				<div class="cl">	
			</div>
		</div>
	</div>
</div>



{literal}
<script type="text/javascript">
displaypublicprofilejob(0,'{/literal}{$iMemberid}{literal}');


$(document).ready(function(){
$('.descevent').fancybox({
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
