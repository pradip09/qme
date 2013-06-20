<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>QME Connections</h1>
		</div>
		<div class="cl"></div>
		<div class="UploadVideoBtn"> <a href="{$site_url}/myqmeinadd/add"><img src="{$tconfig["front_images"]}add_qmein.png" alt="Add Post Job" title="Add Qme Connections" border="0" /></a> </div>
		<div class="QmeinContentPart">
			<div class="ProcessingIndication Navigation Myaccount" id="qmein_loading">Please Wait All QmeIn are Loading...</div>
			<div id="displayqmein"></div>
		</div>
	</div>
	<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript" language="javascript">

displaymyqmein(0,'{/literal}{$iUserId}{literal}');


$(document).ready(function() {
		$('#box1').selectbox({debug: true});
		$('#box2').selectbox({debug: true});
		$('#box3').selectbox({debug: true});
		$('#box4').selectbox({debug: true});
		$('#box5').selectbox({debug: true});
		$('#box6').selectbox({debug: true});
	});
</script>
{/literal} 