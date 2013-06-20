<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body">
	
		{include file="member/myaccountleft.tpl"} </div>
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Friend List</h1>
			
		</div>
		
		<div class="cl"></div>
		  <div class="bredcums"><a href="{$site_url}/myaccount">My Account</a> > My Friend List</div>
		<div class="ProcessingIndication Navigation Myaccount" id="myblog_loading">Please Wait Friend List Loading...</div>
		<div id="displaymyfriends"></div>
	</div>
	<div class="cl"></div>
</div>
<!--body part end here -->
<!--footer part start here -->
</div>
{literal}
<script type="text/javascript">
displaymyallfriends(0);
</script>
{/literal} 