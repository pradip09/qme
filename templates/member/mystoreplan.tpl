<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
	
		{include file="member/myaccountleft.tpl"} </div>
	<!--right part start here -->
	<div class="desboard-right">
		<div class="MyVedioTitle">
			<h1>My Store</h1>
		</div>
		<div class="cl"></div>
	<div class="paddingleftright graybox1">
		<!--heaing start -->
		
		
		<!--heaing end -->
		<div class="graybox graybox_select_plan">
			<!--menu tab start here -->
			<div class="tabber">
				<!--personal infomation start here -->
				<div class="tabbertab_pan">
					<div class="plan_top_title">
						<ul>
							<li>General Items</li>
							<li>Clothing and Accessaries</li>
							<li>Automotive</li>
							<li class="last">Real Estate</li>
						</ul>
					</div>
					<div class="per_info_container">
						<div class="per_info_top_text"> <strong>Welcome</strong> to MYQME store section. MYQME offers you one of a kind  store tools where you have the versatility to create product entries for multiple industries. </div>
						<div class="choose_plan_title">Begin by Choosing a plan</div>
						<div class="choose_plan_bg"><div class="choose_plan_border_bg">
								<div class="plan_reapt_box">
									<div class="free_plan_title">Free Starter </div>
									<div class="plan_price"></div>
									<div class="plan_text">
										<ul>
											<li>Up to {$db_storeplan[0].item_limit} store items</li>
											
										</ul>
									</div>
								{if $db_plan[0]['iPlanId'] eq '2'}
								{elseif $db_plan[0]['iPlanId'] eq '3'}
								{elseif $db_plan[0]['iPlanId'] eq '4'}
								{else}
										{if $tot_storeitem eq '0' || $tot_storeitem eq ''}
											<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}img_create.png" alt="Create" title="Create" /></a></div>
										{elseif $tot_storeitem < $free_limit}
											<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}view-plan.png" alt="View" title="View" /></a></div>
										{else}
											
										{/if}
								{/if}
								</div>
								<div class="plan_reapt_box">
								<form id="frmplan3" name="frmplan3" method="post" enctype="multipart/form-data" action="{$site_url}/mystoreupgrade">
									<input type="hidden" value="2" name="id" id="id"/>
									<div class="bronze_plan_title">Bronze level Store</div>
									<div class="plan_price">&nbsp;</div>
									<div class="plan_text">
										<ul>
											<li>${$db_storeplan[1].fPrice} Per Month up to {$db_storeplan[1].item_limit}</li>
										</ul>
									</div>
								{if $db_plan[0]['iPlanId'] eq '3'}
								{elseif $db_plan[0]['iPlanId'] eq '4' && $db_plan[0]['eTransactionStatus'] == 'Success' && $tot_storeitem < ($db_storeplan[1].item_limit)+($db_storeplan[0].item_limit)}
										<div class="upgrade_btn"><a href="#" onclick="checksubmit();"><img src="{$tconfig["front_images"]}degrade_btn.png" alt="Degrade" title="Degrade" /></a></div>
								{elseif $db_plan[0]['iPlanId'] eq '4'}
								{else}
										{if $db_plan[0]['iPlanId'] == '2' && $db_plan[0]['eTransactionStatus'] == 'Success'}
											{if $tot_storeitem eq '0' || $tot_storeitem eq '' || $tot_storeitem eq $db_storeplan[0].item_limit}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}img_create.png" alt="Create" title="Create" /></a></div>
											{elseif $tot_storeitem < $bronze_limit}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}view-plan.png" alt="View" title="View" /></a></div>
											{else}
											
											{/if}
										{elseif $db_plan[0]['iPlanId'] == '2' && $db_plan[0]['eTransactionStatus'] == 'Cancelled'}
											<div class="upgrade_btn" style="margin-top: -12px;padding: 0px 25px; text-align: justify; color: red; font-size: 14px;">We apologize your plan was not upgrade due to a payment issue. You may try again with a different card or contact our payment management department.<a style="text-decoration:none;"href="{$site_url}/contact">Contact Us..</a></div>
										{else}
											<div class="upgrade_btn"><a href="#" onclick="document.getElementById('frmplan3').submit();"><img src="{$tconfig["front_images"]}upgrade-btn.png" alt="Upgrade" title="Upgrade" /></a></div>
										{/if}
								{/if}
								</form>	
								</div>
								<div class="plan_reapt_box">
								<form id="frmplan2" name="frmplan2" method="post" enctype="multipart/form-data" action="{$site_url}/mystoreupgrade">
								<input type="hidden" value="3" name="id" id="id"/>
									<div class="bronze_plan_title">Silver level Store</div>
									<div class="plan_price">&nbsp;</div>
									<div class="plan_text">
										<ul>
											<li>${$db_storeplan[2].fPrice} Per Month up to {$db_storeplan[2].item_limit}</li>
										</ul>
									</div>
								{if $db_plan[0]['iPlanId'] eq '4' && $db_plan[0]['eTransactionStatus'] == 'Success' && $tot_storeitem < ($db_storeplan[2].item_limit)+($db_storeplan[0].item_limit)}
										<div class="upgrade_btn"><a href="#" onclick="checksubmit();"><img src="{$tconfig["front_images"]}degrade_btn.png" alt="Degrade" title="Degrade" /></a></div>
								{elseif $db_plan[0]['iPlanId'] eq '4'}
								{else}
										{if $db_plan[0]['iPlanId'] == '3' && $db_plan[0]['eTransactionStatus'] == 'Success'}
											{if $tot_storeitem eq '0' || $tot_storeitem eq '' || $tot_storeitem eq $db_storeplan[1].item_limit || $tot_storeitem eq $db_storeplan[0].item_limit}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}img_create.png" alt="Create" title="Create" /></a></div>
											{elseif $tot_storeitem < $silver_limit}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}view-plan.png" alt="View" title="View" /></a></div>
											{else}
												
											{/if}
										{elseif $db_plan[0]['iPlanId'] == '3' && $db_plan[0]['eTransactionStatus'] == 'Cancelled'}
											<div class="upgrade_btn" style="padding: 0px 25px; text-align: justify; color: red; font-size: 14px;">Your plan is not upgrade due to payment issue.Now your payment status is cancelled.Please contact to administrator.</div>											
										{else}
											<div class="upgrade_btn"><a href="#" onclick="document.getElementById('frmplan2').submit();"><img src="{$tconfig["front_images"]}upgrade-btn.png" alt="Upgrade" title="Upgrade" /></a></div>
										{/if}
								{/if}
								</form>
								</div>
								
								<div class="gold_reapt_box">
								<form id="frmplan1" name="frmplan1" method="post" enctype="multipart/form-data" action="{$site_url}/mystoreupgrade">
								<input type="hidden" value="4" name="id" id="id"/>
									<div class="gold_plan_title">Gold level Store</div>
									<div class="plan_price">&nbsp;</div>
									<div class="plan_text">
										<ul>
											<li>${$db_storeplan[3].fPrice} Per Month {$db_storeplan[3].item_limit} + items</li>
										</ul>
									</div>
										{if $db_plan[0]['iPlanId'] == '4' && $db_plan[0]['eTransactionStatus'] == 'Success'}
											{if $tot_storeitem eq '0' || $tot_storeitem eq '' || $tot_storeitem eq $db_storeplan[2].item_limit || $tot_storeitem eq $db_storeplan[0].item_limit}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}img_create.png" alt="Create" title="Create" /></a></div>
											{elseif $tot_storeitem > $gold_limit}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}view-plan.png" alt="View" title="View" /></a></div>
											{else}
												<div class="upgrade_btn"><a href="{$site_url}/mystore"><img src="{$tconfig["front_images"]}view-plan.png" alt="View" title="View" /></a></div>
											{/if}
										{elseif $db_plan[0]['iPlanId'] == '4' && $db_plan[0]['eTransactionStatus'] == 'Cancelled'}
											<div class="upgrade_btn" style="padding: 0px 25px; text-align: justify; color: red; font-size: 14px;">Your plan is not upgrade due to payment issue.Now your payment status is cancelled.Please contact to administrator.</div>
										{else}
											<!--<div class="upgrade_btn"><a href="#"  class="upgradebtn">Upgrade</a></div>-->
											<div class="upgrade_btn"><a href="#" onclick="document.getElementById('frmplan1').submit();"><img src="{$tconfig["front_images"]}upgrade-btn.png" alt="Upgrade" title="Upgrade" /></a></div>
										{/if}
								</form></div>
								<div class="cl"></div>
								
							</div>
							<div class="cl"></div>
						</div>
					</div>
				</div>
			</div>
			<!--menu tab start end -->
		</div>
	</div></div>
	<!--right part start end-->
	<div class="cl"></div>
</div>

{literal}
<script>

/*function check(a){
	var test=a;
	window.location = 'index.php?file=m-mystoreupgrade&id='+test;
}*/

</script>
{/literal}
