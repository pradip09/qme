<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body"> {include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right">
	<div class="MyVedioTitle">
		<h1>Buy points</h1>
	</div>
	<div class="cl"></div>
	{if $point_msg neq ''}
	<div class="notification_msg">{$point_msg}</div>
	{/if}
	<div class="UploadVideoBtn" style="padding-top: 19px;">
		<!---<a href="#" id=""><img src="{$tconfig["front_images"]}back_btn.png" alt="Back Album" title="Back Album" border="0" /></a>--->
	</div>
	<div class="MyPhotoContentPart">
		<div id="white_box" style="width:697px;">
			<div style="width:345px; float:left;">
			
			<div class="img_box"> <img src="{$tconfig["front_images"]}buypoints1.png" alt="" />

				<span>{$db_res[0].vDescription}</span>
				<div class="click_btn"><a href="#Aboutpoints" id="aboutpoints" class="popuppoints">Learn About Points</a></div>
				<div class="cl"></div>
			</div>
			<div style="display:none;">
				<div id="Aboutpoints" class="buypointpopup"> {if  $db_faqcat|@count gt 0}
					<div class="faqgray">
						<h3>QME Asked Questions</h3>
						<h4>Find the answers that you need</h4>
						<br />
						<div class="righ_scrollbar">
						{section name=i loop=$db_faqcat}
						<div class="text"><strong>Q.</strong>&nbsp{$db_faqcat[i].vQuestion} </div>
						<p class="text2"><strong>A.</strong>&nbsp{$db_faqcat[i].tAnswer} </p>
						{/section} 
						</div>
					{/if} 
					</div>
			</div>
			</div>
				
			<div class="img_box"> <img src="{$tconfig["front_images"]}buypoints3.png" alt="" />
				
				<span style="height:37px;">{$db_res[2].vDescription}</span>
				<div class="mytotalpoint">{$total_points}</div>
				<div class="click_btn"><a href="{$site_url}/your_points" id="actionrewards" class="popuppoints2">View Your Points.Campaign Activity</a></div>
				<div class="cl"></div>
			</div>
			<!--<div style="display:none;">
					<div id="Actionrewards" class="buypointpopup">
						<div class="faqgray">
							<h3>QME Asked Questions</h3>
							<h4>Find the answers that you need</h4><br />
							<div class="text"><strong>Q.</strong>What is MYMQE.COM?</div>
							<p class="text2"><strong>A.</strong>  Welcome to the next generation of social media! Here at QME, the possibilities are endless. We bring a unique blend of social media, successful business tools, and live support straight to your fingertips. QME creates the perfect scenario for job placement, talent search, entertainment, and so much more! Have something to share with the world? Then let QME help you build and showcase it. When you join our Q’munity, we begin combining your interests, experience, wants, and needs to find amazing offers that fit your lifestyle. Find amazing deals, job opportunities, and discover fresh talent and get paid to do it with QME! Get Q’ed in today!</p>	
						</div>	
					</div>
			</div>-->
			</div>
			
			
			<div class="img_box"> <img src="{$tconfig["front_images"]}buypoints2.png" alt="" />
				
				<span>{$db_res[1].vDescription}</span>
				<div class="click_btn"><a href="{$site_url}/buymore_points" id="buypoints" class="popuppoints1">Enter to Buy More Points</a></div>
				<div class="cl"></div>
			</div>
			<!--<div style="display:none;">
					<div id="Buypoints" class="buypointpopup">
						<div class="faqgray">
							<h3>QME Asked Questions</h3>
							<h4>Find the answers that you need</h4><br />
							<div class="text"><strong>Q.</strong>What is post job?</div>
							<p class="text2"><strong>A.</strong>  Post jobs are jobs that members or businesses post to fill in a position or outsource a freelance project. Members can post job opportunities to match experience professionals to perform their next project. View qualify members profile, see work they have done, see testimonials what people on the platform are saying about that member track record, vet member, get references all from the QME platform.</p>	
						</div>	
					</div>
			</div>-->
			
		
			<div class="img_box"> <img src="{$tconfig["front_images"]}buypoints4.png" alt="" />
				
				<span>{$db_res[3].vDescription}</span>
				<div class="click_btn"><a href="{$site_url}/Redeem_points" id="redeem" class="popuppoints3">Enter to Redeem Points</a></div>
				<div class="cl"></div>
			</div>
			<div style="display:none;">
				<div id="Redeem" class="buypointpopup">
					<div class="faqgray">
						<h3>QME Asked Questions</h3>
						<h4>Find the answers that you need</h4>
						<br />
						<div class="text"><strong>Q.</strong>How do I Post a Campaign?</div>
						<p class="text2"><strong>A.</strong> Businesses or individuals looking to market themselves or a product can do so on QME by selecting “Post Campaign” on the QME OPPS page or directly from their profile dashboard. When creating a campaign, members have the ability to include images, video commercials, radio spots, text, direct buy links, and more. Local businesses may choose to target a select geographic area, while national campaigns can choose to target members that hold certain interests or attributes. After you have created your campaign, select “Submit your Campaign” at the bottom of the page.</p>
					</div>
				</div>
			</div>
			
			
			
			<div class="cl"></div>
		</div>
	</div>
</div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">
 
$(document).ready(function(){
$('.popuppoints').fancybox({
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