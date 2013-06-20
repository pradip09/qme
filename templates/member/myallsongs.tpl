
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>
<div id="services_box" class="desboard_body" style="padding-bottom:0px;">
				
					
					{include file="member/myaccountleft.tpl"}
					
				</div>
				<div class="desboard-right" style="padding-bottom:30px;">
					
						<div class="MyVedioTitle MyVedioTitle_mysong">
								<h1>My Songs</h1></div>
					
					<div class="UploadVideoBtn" style="padding-top: 19px;">
								
								<a href="{$site_url}/mysong" style="float:left;margin-left:10px;margin-top:13px;color:#3EC10B">Back to MySongs</a>
								<a href="{$site_url}/mysongalbum/add"><img src="{$tconfig["front_images"]}create.png" alt="Create Album" title="Create Album" border="0" /></a>
						<a href="{$site_url}/mysongdetail/add"><img src="{$tconfig["front_images"]}upload-song.png" alt="Upload Songs" title="Upload Songs" /></a>
						<!---<a href="#" id=""><img src="{$tconfig["front_images"]}back_btn.png" alt="Back Album" title="Back Album" border="0" /></a>--->
					</div>
					
					<div class="mysong_detail_container">
						<div class="mysong_top_box">
							
							<div class="mysong_box_bg">
								<div class="mysong_box_img">
									<img src="{$db_songalbums[0].vImage}" alt="" title="" style="border-radius:9px;" />
								</div>	
							</div>
							<div class="mysong_detail">
								<div class="mysong_name_detail">{$db_songalbums[0].vSongAlbum}</div> 
								<!--<span>Composers :</span>Anirudh Ravichander<br />
								<span>Lyricists :</span>Anirudh Ravichander<br />
								<span>Actors :</span>Xyz , xyz<br />
								<span>Label :</span>sony bmg<br />
								<span>Released :</span>2012-->
							</div>
						</div>
						<div class="mysong_list">
							<table>
								<div class="mysong_container">
								<div class="ProcessingIndication Navigation Myaccount" id="allsongs_loading">Please Wait Songs Loading...</div>				
								<div id="myallsongs"></div>
								</div>
								
								
							</table>
						</div>
					</div>
					
				</div>
				<div class="cl"></div>
			</div>
</div>


{literal}
<script type="text/javascript">
getallsongs(0,0);



</script>
{/literal}

