<div class="desboard_body" id="services_boxinnerbg" style="padding-top:1px;">
	<!--heading start here -->
	<div class="top_album_title" style="margin-left: 8px;margin-top: 22px;">
	<div class="top_album_img"><a href="{$site_url}/{$db_user[0].vMemberUrl}">
	{if $db_user[0].vProfileImage neq ''}
		<img src="{$tconfig["tsite_upload_images_member"]}{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt="" width="70" height="56" /></a>
		{else}
		<img src="{$tconfig["front_images"]}user_img.png" alt="" title="" width="70" height="56"/>
		{/if}
		<!--<img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/4_{$db_user[0].vProfileImage}" alt=""/>
		http://192.168.1.12/qme/uploads/member//28/4_13476080241902-super-bikes-wallpapers.jpg-->
	</div>
	</div>
	<div class="back_to _home"><a href="{$site_url}/{$db_user[0].vMemberUrl}"> <img src="{$tconfig["front_images"]}back-icon.png" alt="" /> Back to Home</a></div>
	     <!--   <a href="{$site_url}/{$db_myaboutus[0].vMemberUrl}" style="text-decoration:none;color:#999795;"><div class="album_name">{$db_myaboutus[0].vName}</div></a>-->
	<div class="heading">
		
		<div class="line">
			
			About us</div>
	</div>
	<!--heading end here -->
	<div class="who_we_are">
		<h1>
			Tell us about You or your company?...</h1>
		<p class="about_us">
			{$db_aboutus[0].vYourself}</p>
	</div>
	<div class="deliverimg_box">
		<h1 class="deliverimg_txt">
			Experience . Qualifications . Certifications . Education .</h1>
		<p class="about_us">
			{$db_aboutus[0].vYourexperience}</p>
		
		<div class="cl">
			&nbsp;</div>
	</div>
	<div class="cl">
		&nbsp;</div>
	<div class="box_shadow">
		&nbsp;</div>
	<div class="deliverimg_box" style="padding-right:0; width:96.5%;">
		<div class="our_mission_box">
			<h1 class="our_miss">
				Our Mission Statement ...</h1>
			<p class="about_us">
				{$db_aboutus[0].vYourmission}</p>
		</div>
		<div class="our_mission_box" style=" padding-left:38px;">
			<h1 class="our_miss">
				Our Service ...</h1>
			<p class="about_us">
				{$db_aboutus[0].vYourservice}</p>
		</div>
		<div class="cl">
			&nbsp;</div>
	</div>
	<div class="cl">
		&nbsp;</div>
	<div class="box_shadow">
		&nbsp;</div>
</div>
</div>