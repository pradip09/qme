<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.datepicker.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.widget.js"></script>
<script language="JavaScript" src="http://jqueryui.com/ui/jquery.ui.core.js"></script>
<script language="JavaScript" src="http://jqueryui.com/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="{$tconfig["front_javascript"]}datepicker/css/jquery.datepick.css" type="text/css" />
<script language="JavaScript" src="{$tconfig["front_javascript"]}datepicker/js/jquery.datepick.js"></script>

<div id="content_wrap" style="margin-bottom: -80px;">
<div class="grid_2 alpha" id="inner_leftnav">
		<ul id="mota_menu">
			
			<li><a href="{$site_url}/browsejob" class="jobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postjob" class="postjobs">Browse Jobs</a></li>
			<li><a href="{$site_url}/postcampaign" class="postcampaignactive">Post Campaigns</a></li>
			<li><a href="{$site_url}/browsecampaign" class="browsecampaign">Browse Jobs</a></li>
			
		</ul>
		<!-- mota menu ends here-->
</div>
	
	<div class="grid_10 omega" id="inner_rightcontent">
	<div id="breadcrums">Post Campaign</div>
		{if $iUserId neq ''}
		<div id="addcamp" class="PostCampaignCenterPart">
			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">Create a Campaign</div>
			</div>
			<div id="postCampaignMsg" style="text-align:center;line-height:24px; color:red; font-size:18px;"></div>
			<div class="ProcessingIndication Navigation Myaccount" id="countcamp_loading">Please wait while members are counting.</div>
			<div class="ProcessingIndication Navigation Myaccount" id="campaign_loading">Please wait while Campaign is posting.</div>
			<form id="frmPostCampaign" name="frmPostCampaign" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajpostcampaign">			
					<input type="hidden" name="mode" id="mode" value="add" />		
			<table cellspacing="7" cellpadding="0">		
				
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Ad Name :</td>
					<td class="postcom_input">
						<div class="input_side_text"><input type="text" id="vCampaignName" name="vCampaignName" value="" maxlength="30"/></div>
						
						
						<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[1].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Ad Content :</td>
					<td>
						<textarea id="tContent" name="tContent" rows="7" cols="60" style="width:428px;"></textarea>
						<!--<textarea id="wysiwyg" name="textfield" rows="10" cols="75"></textarea>-->
					</td>
				</tr>
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Ad Image :</td>
					<td class="postcom_input_image">
					<input type="file" id="vImage" name="vImage" value="" onchange="CheckValidFile(this.value,this.id)"/>
					</td>
				</tr>
				<tr>
					<td class="postcom_label" valign="middle"><span class="mandatory">*</span>Industry :</td>
					<td> <div class="myprofile_select_box">
							<select name="vIndustry" id="vIndustry">
								    <option value="">Please Select</option>
								    {if  $db_industry|@count gt 0}
								    {section name=i loop=$db_industry}
								    <option value="{$db_industry[i].iIndustryId}" {if $db_industry[i].iIndustryId eq $db_campaign[0].vIndustry}selected{/if}>{$db_industry[i].iIndustry}</option>
								    {/section}
								    {/if}
						       </select>
					     </div></td>
				</tr>
				</table>
			<table>
			<div class="postcom_input" style="margin-left:60px;color:#000;"> Select the interests you want to share your campaign with:-<div>
				<tr>
					<td class="postcom_label" valign="middle"><span class="mandatory">*</span><strong>Campaign Interest</strong> :</td>
					<td class="postcom_input">
					<div class="myprofile_select_box">
						{if  $db_interest|@count gt 0}
						<div class="event_skill" style="height:75px;float:left;">
						{section name=j loop=$db_interest}
							<div class="event_slikk_inner"><input type="checkbox" value="{$db_interest[j].iInterestId}" id="iInterestId" name="iInterestId[]"/>{$db_interest[j].vInterest}</div>
						{/section}
						</div>
						{/if}
						<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[2].vToolTipText}
									</span>
							</a>
						</div>
					</div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Other Interest:</td>
					<td class="postcom_input"><input type="text" id="vOtherinterest" name="vOtherinterest"  value="{$db_campaign[0].vOtherinterest}" style="width:326px;"/>
					</td>
				</tr>
			</table>
			<table>
				<div class="postcom_input" style="margin-left:60px;color:#000;"> Select the Skill of your ad:-<div>
				<tr>
			<td class="postcom_label" valign="middle"><span class="mandatory">*</span><strong>Campaign Skill</strong> :</td>
			<td class="postcom_input"><div class="myprofile_select_box"> {if  $db_skill|@count gt 0}
					<div class="event_skill" style="height:75px;float:left;">{section name=j loop=$db_skill}
						<div class="event_slikk_inner">
							<input type="checkbox" value="{$db_skill[j].iSkillId}" id="iSkillId" name="iSkillId[]" {if $db_skill[j].iSkillId|in_array:$relatedArr}checked{/if}/>{$db_skill[j].vSkill}</div>
						{/section} </div>
					{/if}
					<div class="question_mark_btn"> <a class="tooltip" href="javascript:void(0);"> <img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" /> <span class="custom help"> <img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" /> {$db_tooltips[3].vToolTipText} </span> </a> </div>
				</div></td>
			</tr>
			<tr>
				<td class="postcom_label">Other Skill:</td>
				<td class="postcom_input"><input type="text" id="vOtherskill" name="vOtherskill"  value="{$db_campaign[0].vOtherinterest}" style="width:326px;"/>
				</td>
			</tr>
			<tr>
				<td class="postcom_label"><span class="mandatory">*</span>Select Your Country:</td>
				<td class="postcom_input"><select name="iCountryId" id="iCountryId" onchange="getCountry(this.value);"  class="inpuname">
						<option value="">--Select Country--</option>
						<option value='223' >United States</option>
						{if  $db_mycountry|@count gt 0}
						{section name=i loop=$db_mycountry}
						{if $db_country[i].iCountryId neq 223}
						<option value='{$db_mycountry[i].iCountryId}' {if $db_mycountry[i].iCountryId eq $db_campaign[0].iCountryId}selected{/if}>{$db_mycountry[i].vCountry}</option>
						{/if}
						{/section}
						{/if}			
						
					</select>
				</td>
			</tr>
			<tr>
				<td class="postcom_label"><span class="mandatory">*</span>Select Your State:</td>
				<td class="postcom_input"><div id="showall">
						<select name="iStateId" id="iStateId" class="inpuname">
							<option value="">-Select State-</option>
						</select>
					</div></td>
			</tr>
			<tr>
				<td class="postcom_label"><span class="mandatory">*</span>City :</td>
				<td class="postcom_input"><input type="text" id="vCity" name="vCity"  style="width:278px;"/>
				</td>
			</tr>
					
				
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Choose a zip code :</td>
					<td class="postcom_input"><input type="text" id="vZipCode" name="vZipCode" onkeypress="return checkprice(event);" style="width:278px;"/>
					</td>
				</tr>
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Choose mile radius<br />
						from your location :</td>
					<td class="postcom_input"><input type="text" id="vMileRadius" name="vMileRadius" onkeypress="return checkprice(event);" style="width:278px;"/>
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Is this a national campaign?</td>
						
					<td class="postcom_checkboxbtn">
						<input type="checkbox" id="eIsNational" name="eIsNational" /> Yes
						<!--<input type="checkbox" />No-->
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Is this a local campaign?</td>
					<td class="postcom_checkboxbtn">
						<input type="checkbox" id="eIsLocal" name="eIsLocal" /> Yes
				               </div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Do you Want this ad to appear in QME Search Engine Results?</td>
					<td class="postcom_checkboxbtn">
						<input type="checkbox" id="eIsLocal" name="eIsLocal"/> Yes
						<div class="aboutus_link">
							<a href="#Learnmorecamp" id="learnmorecamp">Learn more</a><br/>
				                </div>
						<div style="display:none;">
							<div id="Learnmorecamp" class="signing">
							{$db_static_pages[0].lContents}
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Ad Start Date :</td>
					<td class="postcom_input">
						<div class="input_side_text"><input type="text" id="dStartDate" name="dStartDate" onclick="createDatePicker();" value=""/></div>
						<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[4].vToolTipText}
									</span>
							</a>
						</div>
						<!--<img src="{$tconfig["front_images"]}date-icon.png" class="Vmiddle" alt="" title="" />--></td>
				</tr>
				<tr>
					<td class="postcom_label">Ad Finish Date :</td>
					<td class="postcom_input">
						<div class="input_side_text"><input type="text" id="dFinishDate" name="dFinishDate" onclick="createDatePicker();" value=""/></div>
						<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[5].vToolTipText}
									</span>
							</a>
						</div>
						<!--<img src="{$tconfig["front_images"]}date-icon.png" class="Vmiddle" alt="" title="" />--></td>
				</tr>
				<tr>
					<td class="postcom_label"><span class="mandatory">*</span>Points for viewing ad :</td>
					<td class="postcom_input">
						<div class="input_side_text"><input type="text" id="iPointsViewingAd" name="iPointsViewingAd" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[6].vToolTipText}
									</span>
							</a>
						</div>	
					</td>
				</tr>
			</table>
			
			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">Radio Ad</div>
			</div>
			<table cellspacing="7" cellpadding="0">
				<tr>
					<td class="postcom_label">Upload Mp3 File :</td>
					<td class="postcom_input_image">
						<input type="file" id="vMp3File" name="vMp3File" value="" onchange="CheckValidAudioFile(this.value,this.id)"/>

					</td>
				</tr>
				<tr>
					<td class="postcom_label">Points to Listen To <br />
						radio ad :</td>
					<td class="postcom_input">
						<div class="input_side_text"><input type="text" id="iPointsListenAd" name="iPointsListenAd" value=""  onkeypress="return checkprice(event);"/></div>
						<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[7].vToolTipText}
									</span>
							</a>
						</div>
						</td>
				</tr>
			</table>
			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">Commercial Ad</div>
			</div>
			<table cellspacing="7" cellpadding="0">
				<tr>
					<td class="postcom_label">Upload Video File :</td>
					<td class="postcom_input_image">
						<input type="file" id="vVideoFile" name="vVideoFile" value="" onchange="CheckValidVideoFile(this.value,this.id)"/>
					<!--	<input type="text" class="input_image_txt" />
						<input type="button" value="Browse" />-->
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Points to view <br />
						Commercial ad :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iPointsCommercialAd" name="iPointsCommercialAd" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[8].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
			</table>
			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">WebLink Option</div>
			</div>
			<table cellspacing="7" cellpadding="0">
				<tr>
					<td class="postcom_label">Ad URL :</td>
					<td class="postcom_input">
					<input type="text" id="vURL" name="vURL" value="" onchange="checkurl(this.value)"/>
					</td>
				</tr>
				<tr><td class="postcom_label"></td><td class="postcom_input"><div style="color:#000">[ You have to mention "http://" before link]</div></td></tr>
				<tr>
					<td class="postcom_label">Points to visit <br />
						This memeber site :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iPointsWeblinkAd" name="iPointsWeblinkAd" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[9].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
			</table>
			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">BuyLink Option</div>
			</div>
			<table cellspacing="7" cellpadding="0">
				<tr>
					<td class="postcom_label">Buy Link URL :</td>
					<td class="postcom_input">
					<input type="text" id="vBuyLinkURL" name="vBuyLinkURL" value="" onchange="checkurl(this.value)"/>
					</td>
				</tr>
				<tr><td class="postcom_label"></td><td class="postcom_input"><div style="color:#000">[ You have to mention "http://" before link]</div></td></tr>
				<tr>
					<td class="postcom_label">Item Cost :</td>
					<td class="postcom_input">
					<input type="text" id="iItemCost" name="iItemCost" value="" onkeypress="return checkprice(event);"/>
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Discount :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iItemDiscount" name="iItemDiscount" value="" maxlength="3" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[10].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
				<!--<tr>
					<td class="postcom_label">Discount translate into points when <br/>members buy :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iPontsWhenBuy" name="iPontsWhenBuy" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[10].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>-->
				
			</table>

				<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">Share Option</div>
			</div>
			<table cellspacing="7" cellpadding="0">
				<tr>
					<td class="postcom_label">Point when memebers share to their extended network</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iPointsWhenShare" name="iPointsWhenShare" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[11].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
		                <tr>
			            <td class="postcom_label5">Earn Points</td>
			            <td class="postcom_checkboxbtn" style="color:#000"">
						<input type="checkbox" id="eEarnPoints" name="eEarnPoints" {if $db_campaign[0].eEarnPoints eq 'Yes'}checked{/if}/>
				    </td>
		                </tr>
		                <tr>
			            <td class="postcom_label5">Purchase Points</td>
			            <td class="class="postcom_checkboxbtn" style="color:#000"">
						<input type="checkbox" id="ePurchagePoints" name="ePurchagePoints" {if $db_campaign[0].ePurchagePoints eq 'Yes'}checked{/if}/>
				    </td>
		                </tr>
			</table>



			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">Members who match campaign</div>
			</div>
			<div><a href="#" onclick="getCountCampaign();" style="text-decoration:none;"><input type="button" style="cursor:pointer;margin-left: 173px;"  value="Search to see campaign results" class="cone_save_btnbg" title="Click search to get your result"></a></div>
			<table cellspacing="7" cellpadding="0">
				<tr>
					<td class="postcom_label">Number of members who match this campaign in my community:</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iNumMatchInCommunity" name="iNumMatchInCommunity" placeholder="0" readonly="true"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[12].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label5">Share with this group?</td>
					<td class="postcom_checkboxbtn" style="color:#000">
						<input type="checkbox" id="eSendEachMyCommunity" name="eSendEachMyCommunity" /> Yes
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Number of members 
						who match this 
						campaign outside
						of my community:</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iNumMatchOutCommunity" name="iNumMatchOutCommunity" placeholder="0" readonly="true"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[14].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label5">Share with this group?</td>
					<td class="postcom_checkboxbtn" style="color:#000">
						<input type="checkbox" id="eSendEachOutCommunity" name="eSendEachOutCommunity" /> Yes
					</td>
				</tr>
				<tr>
					<td class="postcom_label">Number of members 
						who support biz in 
						my community :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iNumSupportBiz" name="iNumSupportBiz" placeholder="0" readonly="true"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[13].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
				<tr>
					<td class="postcom_label5">Share with this group?</td>
					<td class="postcom_checkboxbtn" style="color:#000">
						<input type="checkbox" id="eSendEachSupportBiz" name="eSendEachSupportBiz" /> Yes
					</td>
				</tr>
				
				<tr>
				<td></td>
				<td></td>
				</tr>
				<tr>
					
				<table width="100%" border="0"> 			
				    <tr>
							<td class="postcom_label5">Total Estimated Reach:</td>
					<td class="postcom_checkboxbtn postcom_result" id="total" style="line-height: 33px;text-align:right;color:#000;">0</td>
							<!--<td class="post_search"><a href="#" onclick="getCountCampaign(this.value);" style="text-decoration:none;"><input type="button" style="cursor:pointer;"  value="Search to see campaign results" class="cone_save_btnbg" title="Click search to get your result"></a></td>-->
				    </tr>			
				</table>	
					
				
				</tr>
			</table>
			<div class="PostCampaignTitle">
				<div class="qmeooppostcamp">Number of clicks for this campaign</div>
			</div>
			
			<table cellspacing="7" cellpadding="0">
				<!--<tr>
					<td class="postcom_label">Max Ad Views :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iMaxAdViews" name="iMaxAdViews" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[16].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>-->
				<tr>
					<td class="postcom_label">Max Ad Clicks :</td>
					<td class="postcom_input">
					<div class="input_side_text"><input type="text" id="iMaxAdClicks" name="iMaxAdClicks" value="" onkeypress="return checkprice(event);"/></div>
					<div class="question_mark_btn">
							<a class="tooltip" href="javascript:void(0);">
								<img src="{$tconfig["front_images"]}question-mark.png" class="questionmark_icon" alt="" title="" />
									<span class="custom help">
										<img src="{$tconfig["front_images"]}Help.png" class="help_img" height="48" width="48" />
											{$db_tooltips[17].vToolTipText}
									</span>
							</a>
						</div>
					</td>
				</tr>
			</table>
			 </form><div class="postcom_input_btn"><input onclick="return validatePostCampaignForm();" type="button" value="Submit Your Campaign"  class="btnbg" style="float:left;cursor:pointer;"/>
<a href="{$site_url}/qmeoops" class="btnbg" style="float:left; text-decoration:none;">Cancel</a>
					
			</div>
			<div id='previewData'></div>
			<div style="clear:both;"></div>
		</div>
		{else}
		<div class="PostCampaignCenterPart">
<div class="BroCampToptxt" style="text-align:center;color:red;">Please Login first and then post a job.</div>
</div>
		{/if}
		<!--<div style="padding-bottom:5px;"><img src="{$tconfig["front_images"]}brocampbotcurve.png" alt="" title="" border="0" /></div>-->
	</div>
	


<div class="cl"></div>
</div>
</div>
</div>	

{literal}
<script type="text/javascript">
        $(function() {
	$('#dStartDate').datepick({dateFormat: 'mm-dd-yyyy'});
	
});
	$(function() {
	$('#dFinishDate').datepick({dateFormat: 'mm-dd-yyyy'});
	
});

</script>
<script type="text/javascript">
function getCountCampaign()
{
var extra ='';
var chks = document.getElementsByName('iInterestId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
                alert("Please select at least one Interest.");
                chks[0].focus();
                return false;
        }
var chkss = document.getElementsByName('iSkillId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chkss.length; i++)
        {
                if (chkss[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
                alert("Please select at least one Skill.");
                chkss[0].focus();
                return false;
        }
if($('#iInterestId')){
       if(!$('#iInterestId').is(':checked')){
	       //alert("Please Select at least one Interest");
	       return false;
       }else{
		var iInterestId = $('#iInterestId').val();
	       extra+='&iInterestId='+iInterestId;
       }
}
if($('#iSkillId')){
       if(!$('#iSkillId').is(':checked')){
	       //alert("Please Select at least one Skill");
	       return false;
       }else{
		var iSkillId = $('#iSkillId').val();
	       extra+='&iSkillId='+iSkillId;
       }
}
if($('#iCountryId')){
       if($('#iCountryId').val() ==''){
	       alert("Please Select your Country");
	       return false;
       }else{
		var iCountryId = $('#iCountryId').val();
	       extra+='&iCountryId='+iCountryId;
       }
}
if($('#iStateId')){
       if($('#iStateId').val() ==''){
	       alert("Please Select your State");
	       return false;
       }else{
		var iStateId = $('#iStateId').val();
	       extra+='&iStateId='+iStateId;
       }
}        
if($('#vCity')){
       if($('#vCity').val() ==''){
	       alert("Please enter your City");
	       return false;
       }else{
		var vCity = $('#vCity').val();
	       extra+='&vCity='+vCity;
       }
}        
if($('#vZipCode')){
       if($('#vZipCode').val() ==''){
	       alert("Please enter Zip code");
	       return false;
       }else{
		var vZipCode = $('#vZipCode').val();
	       extra+='&vZipCode='+vZipCode;
       }
} 	 
if($('#vMileRadius')){
       if($('#vMileRadius').val() ==''){
	       alert("Please enter Mile");
	       return false;
       }else{
		var vMileRadius = $('#vMileRadius').val();
	       extra+='&vMileRadius='+vMileRadius;
       }
}         
	
	var allData = $('#frmPostCampaign').serialize();
	$('#countcamp_loading').show();
	var url = site_url+"/index.php?file=a-ajCampaigncnt";
	var pars = '&'+allData;
	//alert(url+pars);
	$.post(url+pars,
            function(data) {
		$('#countcamp_loading').hide();
                var test = eval(data);
		$('#iNumMatchInCommunity').val(test[0]);
		$('#iNumMatchInCommunity').addClass("grncount");
		$('#iNumMatchOutCommunity').val(test[1]);
		$('#iNumMatchOutCommunity').addClass("grncount");
		$('#iNumSupportBiz').val(test[2]);
		$('#iNumSupportBiz').addClass("grncount");
		document.getElementById('total').innerHTML=test[3];
		$('#total').addClass("grncount");
	});
}
</script>

<script type="text/javascript" language="javascript">

$(document).ready(function() {
$('#vInterest').selectbox({debug: true});
$('#box11').selectbox({debug: true});
});



function validatePostCampaignForm(){

	if($('#vCampaignName').val() ==''){
		$('#postCampaignMsg').html("Please enter Campaign Name").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	if($('#tContent').val() ==''){
		$('#postCampaignMsg').html("Please enter Text").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	if($('#vImage').val() ==''){
              if($('#mode').val() =='add'){
		$('#postCampaignMsg').html("Please enter Image").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	      }
	}
	if($('#vIndustry').val() ==''){
		$('#postCampaignMsg').html("Please select one Industry").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	var chks = document.getElementsByName('iInterestId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chks.length; i++)
        {
                if (chks[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
               $('#postCampaignMsg').html("Please Select at least one Interest").addClass('errormsg').fadeTo(900,1);
                chks[0].focus();
                return false;
        }
       var chkss = document.getElementsByName('iSkillId[]');
        var hasChecked = false;
        // Get the checkbox array length and iterate it to see if any of them is selected
        for (var i = 0; i < chkss.length; i++)
        {
                if (chkss[i].checked)
                {
                        hasChecked = true;
                        break;
                }
        }
        // if ishasChecked is false then throw the error message
        if (!hasChecked)
        {
                $('#postCampaignMsg').html("Please Select at least one Skill").addClass('errormsg').fadeTo(900,1);
                chkss[0].focus();
                return false;
        }
	/*if(!$('#iInterestId').is(':checked')){
		$('#postCampaignMsg').html("Please Select at least one Interest").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	
	if(!$('#iSkillId').is(':checked')){
		$('#postCampaignMsg').html("Please Select at least one Skill").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}*/
	if($('#iCountryId').val() ==''){
		$('#postCampaignMsg').html("Please Select your Country").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	if($('#iStateId').val() ==''){
		$('#postCampaignMsg').html("Please Select your State").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	if($('#vCity').val() ==''){
		$('#postCampaignMsg').html("Please enter Your City").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#vZipCode').val() ==''){
		$('#postCampaignMsg').html("Please enter Zip code").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#vMileRadius').val() ==''){
		$('#postCampaignMsg').html("Please enter Mile Radius").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else if($('#dStartDate').val() ==''){
		$('#postCampaignMsg').html("Please enter Campaign Start Date").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	/*else if($('#dFinishDate').val() ==''){
		$('#postCampaignMsg').html("Please enter Campaign Finish Date").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}*/
	else if($('#iPointsViewingAd').val() ==''){
		$('#postCampaignMsg').html("Please enter Poing for viewing ad").addClass('errormsg').fadeTo(900,1);
		document.body.scrollTop = 100;
		return false;
	}
	else
	{
		$('#postCampaignMsg').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
		$('#campaign_loading').show();
		$('#addcamp').hide();
		$("#frmPostCampaign").ajaxForm({
			target: '#postCampaignMsg',
			 success : finish
			}).submit();
		document.body.scrollTop = 100;
	}
}
function finish()
{	window.location='{/literal}{$site_url}{literal}'+'/postcampaign/';
}

function CheckValidFile(val,name)
{	
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'gif' || a == 'GIF' || a == 'jpg'  ||a == 'JPG' ||a == 'jpeg' ||a == 'JPEG' ||a == 'png'  )
	return true;
	//alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!');
	document.getElementById(name).value = "";
	$('#postCampaignMsg').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Image (gif,jpg,jpeg)  Files!!!').addClass('errormsg').fadeTo(900,1);
	document.body.scrollTop = 100;
	return false; 
}

function CheckValidAudioFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp3' || a == 'MP3' )
	return true;
	//alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!');
	document.getElementById(name).value = "";
	$('#postCampaignMsg').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Audio (mp3)  Files!!!').addClass('errormsg').fadeTo(900,1);
	document.body.scrollTop = 100;
	return false; 
}

function CheckValidVideoFile(val,name)
{
	var a = val.substring(val.lastIndexOf('.') + 1).toLowerCase();
	if(a == 'mp4' || a == 'MP4' || a== 'avi' || a == 'AVI' || a == 'flv' || a == 'FLV')
	return true;
	//alert('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (mp4, flv, avi)  Files!!!');
	document.getElementById(name).value = "";
	$('#postCampaignMsg').html('The extension ' + a.toUpperCase() + ' is not valid. Please Upload only Video (mp4, flv, avi)  Files!!!').addClass('errormsg').fadeTo(900,1);
	document.body.scrollTop = 100;
	return false; 
}
function checkurl(value){
var myVariable =  value;
if(/^([a-z]([a-z]|\d|\+|-|\.)*):(\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?((\[(|(v[\da-f]{1,}\.(([a-z]|\d|-|\.|_|~)|[!\$&'\(\)\*\+,;=]|:)+))\])|((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=])*)(:\d*)?)(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*|(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)|((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)){0})(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(myVariable)) {
  //alert("valid url");
 
} else {
   $('#postCampaignMsg').html("Please enter valid Url").addClass('errormsg').fadeTo(900,1);
}
}
$(document).ready(function(){
$('#learnmorecamp').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});

</script>
<script>
function getCountry(CountryId)
{
	//alert(CountryId);
	var extra ='';
	extra+='&CountryId='+CountryId;
	if($('#selectedstate')){
        if($('#selectedstate').val() !=''){
         var selectedstate = $('#selectedstate').val();
         extra+='&selectedstate='+selectedstate;   
        }
        
	}
	var url = site_url+"/index.php?file=a-ajpublcampcntlist";
	
	var pars = extra;
	$.post(url+pars,
            function(data) {
		//alert(data);
		if($('#showall')){
			$('#showall').html(data);
		}
	});
}
</script>


{/literal}