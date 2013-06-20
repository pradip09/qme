<div id="services_boxinnerbg" class="desboard_body">
				<div class="QmeNewsContainer">
					<div class="MyVedioTitle">
						<h1>QME News</h1>
						
					</div>
					<div class="cl"></div>
					<div class="QmeNewsContentPart">
				        {if  $data|@count gt 0}
				        {section name=i loop=$data}
							<div class="NewsReaptPart">
								<div class="NewsImage">
									<a href="{$site_url}/detail_news/{$data[i].iNewsId}"><img src="{$tconfig["tsite_upload_images_news"]}{$data[i].iNewsId}/1_{$data[i].vImage}" width="81px" height="81px"/></a>
								</div>
								<div class="NesContent">  
									<h5><a href="{$site_url}/detail_news/{$data[i].iNewsId}">{$data[i].vTitle}</a></h5>
									<div class="NewsContentTxt">{$data[i].vDescription}</div>
									<div class="PostonNews"> <strong>Posted on</strong>  {$data[i].dAddedDate}</div><div class="LikeCommentLinkNews"><a href="javascript:void(0);" id="likedata{$data[i].iNewsId}" onclick="qmelike('{$data[i].iNewsId}','{$mem_info[0].iMemberId}','news','{$data[i].iNewsId}','1');">Like</a><span>|</span>{if $mem_info[0].iMemberId eq ''}<a href="javascript:void(0);">Comment</a>{else}<a href="javascript:void(0);" onclick="showcomment('{$data[i].iNewsId}','{$mem_info[0].iMemberId}','news','{$data[i].iNewsId}');" id="comment{$data[i].iNewsId}">Comment</a><a id="countcom{$data[i].iNewsId}" style="margin-left:2px;text-decoration:none;color:#E26700;"></a>{/if}<span>|</span><a href="#Share" class="share">Share</a><a href="{$site_url}/detail_news/{$data[i].iNewsId}" style="float:right;">Read more...</a></div>
								</div>
								<div class="cl"></div>
							</div>
							
				{literal}
				<script type="text/javascript">
				numcom('{/literal}{$data[i].iNewsId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','news','{/literal}{$data[i].iNewsId}{literal}');
				qmelike('{/literal}{$data[i].iNewsId}{literal}','{/literal}{$mem_info[0].iMemberId}{literal}','news','{/literal}{$data[i].iNewsId}{literal}','0');
				
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
				
				function qmelike(iRecentId,iUserId,type,itemid,start)
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
								
								$('#likedata'+Id+'').html(Data);
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
				<script>
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
				</script>
				{/literal}
							
				        {/section}
					{/if}
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
				<div class="cl"></div>
			</div>
                        </div>