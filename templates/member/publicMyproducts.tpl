<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>


<div class="desboard_body" id="services_box">

<div class="myphoto_album_container">
	<div class="top_album_title">
	<div class="top_album_img"><a href="{$site_url}/{$db_user[0].vMemberUrl}">
            <img src="{$tconfig["tsite_upload_images_member"]}/{$db_user[0].iMemberId}/2_{$db_user[0].vProfileImage}" alt="" width="70" height="56" /></a>
		
	</div>
		<a href="{$site_url}/{$db_user[0].vMemberUrl}" style="text-decoration:none;color:#999795;"><div class="album_name">{$db_user[0].vName}</div></a>
		<!--<div class="photoalbums_text">Photoalbums</div>-->
		<div class="cl"></div>
	</div>

	<div class="myphoto_album_img">
	<div class="myphoto_album_title"><a href="{$site_url}/publicMyproducts/{$db_user[0].vMemberUrl}">{$db_user[0].vName}'s store</a> > {$db_user[0].vStoreName} store</div>
        </div>
                
					
					
					
					
				
				<div class="desboard-right" style="padding-bottom:30px;">
				
					
					<div class="graybox" style="margin-top:15px;">
						<div class="tabber">
							<div class="tabbertab">
								<h4>General Items</h4>
								<div class="UploadVideoBtn" style="padding-top: 19px;">
									
								</div>
								<div class="mystore_product_container">
									<div id="showMyproductDiv"></div>
								</div>
								
								<div class="cl"></div>
							</div>
							<div class="tabbertab">
								<h4>Clothing And Accessaries</h4>
								<div class="UploadVideoBtn" style="padding-top: 19px;">
									<a href="{$site_url}/myclothingproduct_add/add"><img src="{$tconfig["front_images"]}add-product.png" alt="Add Product" title="Add Product" border="0" /></a>
								</div>
								<div class="mystore_product_container">
									<div id="showClothingDiv"></div>
								</div>
								<div class="cl"></div>
							</div>
							<div class="tabbertab">
								<h4>Automotive</h4>
								<div class="UploadVideoBtn" style="padding-top: 19px;">
									<a href="{$site_url}/myautomotiveproduct_add/add"><img src="{$tconfig["front_images"]}add-product.png" alt="Add Product" title="Add Product" border="0" /></a>
								</div>
								<div class="automotive_container">
									<div id="showAutomotiveDiv"></div>
								</div>
								<div class="cl"></div>
							</div>
							<div class="tabbertab">
								<h4>Real Estate</h4>
								<div class="mystore_product_container">
									<div id="showRealestateDiv"></div>
								</div>
								<div class="cl"></div>
							</div>
							<div class="tabbertab">
								<h4>Fundraiser</h4>
								<p>No product available in this Category</p>
							</div>
						</div>
					</div>
					
					
					
					
				</div>
				<div class="cl"></div>
			</div>
                        </div>
			
			</div>
{literal}
<script type="text/javascript">
displaygeneralproduct(0,'{/literal}{$iStoreId}{literal}');
displayClothingproduct(0,'{/literal}{$iStoreId}{literal}');
displayAutomotiveproduct(0,'{/literal}{$iStoreId}{literal}');
displayRealestateproduct(0,'{/literal}{$iStoreId}{literal}');
</script>
{/literal}

