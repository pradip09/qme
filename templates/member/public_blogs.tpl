<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div class="desboard_body" id="services_boxinnerbg">

<div class="public_pro_container">
	<div class="top_album_title">
	<div class="top_album_img">
		{if $db_user[0].vProfileImage neq ''}
		<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" />
		{else}
		<img src="{$tconfig["front_images"]}user_img.png" height="70" width="70"/>
		{/if}
	</div>
	        <div class="album_name">{$db_user[0].vName}</div>
		<div class="cl"></div>
		<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
	</div>
	<div class="myphoto_album_img">
	<div class="myphoto_album_title">{$db_user[0].vName}'s Blogs</div>
		<div class="QmeinContentPart PostInnerContentPart" >
				<div class="ProcessingIndication Navigation Myaccount" id="mypostjob_loading">Please Wait All Blogs are Loading...</div>	
                                    {if  $BlogListArr|@count gt 0}
                                    {section name=i loop=$BlogListArr}
                                        <div class="blog_listing_centerpart"  style="padding: 5px 85px;">
                                            <div class="bloglisting_reapt_box">
                                                <div class="blog_list_img"><img src="{$BlogListArr[i].vImage}" alt="" title="" /></div>
                                                <div class="bloglisting_reapt_cont">
                                                    <div class="bloglisting_reapt_conttext">
                                                        <div class="blog_list_title" style="color:#999795;" >{$BlogListArr[i].vBlogTitle}</div>
                                                        {$BlogListArr[i].vText}
                                                        <div class="blog_reapt_date">{$BlogListArr[i].dCreateDate}</div>
                                                        <div class="BrowseJobLikeLink">
                                                            <a href="#Fulltext{$BlogListArr[i].iBlogId}" class="blogtext" id="fulltext{$BlogListArr[i].iBlogId}" title="Read more">Read more...</a>
                                                        </div>
                                                    <div class="like_photo"><a href="javascript:void(0);" id="likepublic{$BlogListArr[i].iBlogId}" onclick="qmelikepublic('{$BlogListArr[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$BlogListArr[i].iBlogId}','1');">Qlike</a> . <a href="javascript:void(0);" id="comment{$BlogListArr[i].iBlogId}" onclick="showcomment('{$BlogListArr[i].iBlogId}','{$mem_info[0].iMemberId}','Blog','{$BlogListArr[i].iBlogId}');">Comment</a><a href="javascript:void(0);" id="countcom{$BlogListArr[i].iBlogId}" style="margin-left:2px;text-decoration:none;"></a> . <a href="#Share" id="share{$BlogListArr[i].iBlogId}" class="share">Share</a></div>
						    </div>
						    </div>
                                                </div>
                                            
                                        
                                        <div style="display:none;">
                                              <style>
                                                #fancybox-title-float-main{
                                                    display:none;
                                                }
                                                
                                              </style>
                                                            <div id="Fulltext{$BlogListArr[i].iBlogId}" class="readpoppup">
                                                                <div class="popuptext">{$BlogListArr[i].vFullText}</div>
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
	numcom('{/literal}{$BlogListArr[i].iBlogId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Blog','{/literal}{$BlogListArr[i].iBlogId}{literal}');
		qmelikepublic('{/literal}{$BlogListArr[i].iBlogId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','Blog','{/literal}{$BlogListArr[i].iBlogId}{literal}','0');
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
                                    <div style="text-align:center;color:red;">No Blogs available</div>
                                    {/if}
		</div>
				<div class="cl">	
			</div>
		</div>
	</div>
</div>



{literal}
<script type="text/javascript">
$(document).ready(function(){
$('.blogtext').fancybox({
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
