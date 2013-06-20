<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<!--<style>
	#services_box { min-height:500px; }
</style>-->


<div class="desboard_body" id="services_boxinnerbg">
	
	<div class="public_pro_container">			
				<div class="ProcessingIndication Navigation Myaccount" id="request_loading">Please Wait Request List Loading...</div>
				
	                        <div class="ProcessingIndication Navigation Myaccount" id="searchdataqme" style="margin-top:-140px;">Please Wait searching process is running...</div>				
	                        <div id="displaysearchdata"></div>			
				<div class="cl"></div>			
			<div class="cl"> </div>
						
</div>
	
</div>	
<div class="cl"></div>
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
     <script type="text/javascript"  src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508285f6786947b5"></script>
   </div>
  </div>
</div>
{literal}
<script>
//alert('{/literal}{$type_2}{literal}');
selectmode_data('{/literal}{$type_2}{literal}','{/literal}{$keyword}{literal}');	
dispalysearch()
function dispalysearch()
{
	var extra = '';
	var url = site_url+"/index.php?file=a-ajsearchdata";
	var pars = extra;
	//alert(url+pars);
	$('#displaysearchdata').show();
	$('#searchdataqme').show();
	$.post(url+pars,
        function(data) {
		//alert(data);
		$('#searchmsg').html("").addClass('errormsg').fadeTo(900,1);
		$('#displaysearchdata').html(data);
		$('#displayactivity').hide();
		$('#recentactivity').hide();
		$('#displaysearchdata').show();
		$('#searchdataqme').hide();
	         
	});
	
}
$('#displaysearchdata').hide();
</script>
<!--<script type="text/javascript">
       $('#searchdataqme').show();
       setTimeout("displaysearchdata('0')", 800);
</script>-->
{/literal}
