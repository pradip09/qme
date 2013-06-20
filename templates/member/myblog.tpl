<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>Blog Listing</h1>
			
		</div>
		<div class="cl"></div>
		<div class="blackgraylink"><a href="{$site_url}/myblogadd/add"><img src="{$tconfig["front_images"]}add_blog.png" alt="Add Blog" title="Add Blog" border="0" /></a></div>
		<div class="ProcessingIndication Navigation Myaccount" id="myblog_loading">Please Wait Blog Loading...</div>
		<div id="displaymyblog"></div>
	</div>
	<div class="cl"></div>
</div>
<!--body part end here -->
<!--footer part start here -->
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
displaymyblog(0,'{/literal}{$iUserId}{literal}');
</script>
{/literal} 