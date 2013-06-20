<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.datepicker.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.widget.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.core.js"></script>
<script language="JavaScript" src="http://jqueryui.com/jquery-1.7.2.js"></script>
<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Events</h1>
		</div>
		<div class="cl"></div>
		<div class="blackgraylink" style="padding-top:19px;"><a href="{$site_url}/myaddevent/add"><img src="{$tconfig["front_images"]}add_event.png" alt="Add Event" title="Add Event" border="0" /></a> </div>
		<div class="new_eventcontent_part">
			<div class="ProcessingIndication Navigation Myaccount" id="myevent_loading">Please Wait All Events Loading...</div>
			<div class="new_event_toptable" id="eventlistdiv"> </div>
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
<script>
displaymyevent(0);
</script>
{/literal}