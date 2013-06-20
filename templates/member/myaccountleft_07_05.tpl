<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>

<div id="left-sidebar" class="grid_3 alpha omega"> 

        <!--user-block-->
        <div class="user_photo">
          <div class="photo_a">
		{if $vProfileImage eq ''} 
				<img src="{$tconfig["front_images"]}user_img.png" alt="" /> 
			{else} 
				<img src="{$tconfig["tsite_upload_images_member"]}{$mem_info[0].iMemberId}/5_{$mem_info[0].vProfileImage}" alt="" /> 
			{/if}
			{if $vProfileImage neq ''} 
			<div class="image_change_menu"><ul class="arrow_box"><li><a href="#" onclick="select_file()">Edit</a></li><li><a href="#" onclick="delete_image();">Delete</a></li></ul></div>
			
			{else}
			<div class="image_change_menu image_edit_menu"><ul class="arrow_box"><li><a href="#" onclick="select_file()">Edit</a></li></ul></div>
			{/if} 
	</div>
          <h1>{$Name}</h1>
          <p>Lives in ({$mem_info[0]['vCountry']} )</p>
        </div>
        <!--end user-block--> 
	   
	   <div id="user-option"> 
          
          <!--My Profile-->
          <div class="field-block">
            <div class="field-title field-inner-1">
              <h1 class="mp-icon">My Profile</h1>
              <span class="down-arrow" id="my-profile-span"></span></div>
            <div class="field-content" style="display:none;" id="my-profile">
              <ul>
                <li class="mp1"><a href="{$site_url}/myaccount">My Home</a></li>
                <!--<li class="mp2"><a href="#">My Profile Setup </a></li>-->
		<li  class="mp2"><a href="{$site_url}/myprofile" >My Profile Setup</a></li>
               <!-- <li class="mp3"><a href="#">Add About You </a></li>-->
		<li  class="mp3"> <a href="{$site_url}/myabout" > Add About You</a></li>
                <li class="mp4 last"><a href="{$site_url}/{$mem_info[0].vMemberUrl}">View My Profile</a></li>
              </ul>
            </div>
          </div>
          <!--end My Profile--> 
          
          <!--Media & News-->
          <div class="field-block">
            <div class="field-title field-inner-2" id="flip1">
              <h1 class="mn-icon">Media &amp; News</h1>
              <span class="down-arrow"></span></div>
            <div class="field-content" style="display:none;">
              <ul>
                <li class="mn1"><a href="{$site_url}/myphoto">My Photo</a></li>
                <li class="mn2"><a href="{$site_url}/myvideo">My Videos</a></li>
                <li class="mn3"><a href="{$site_url}/mysong">My Songs</a></li>
                <li class="mn4"><a href="{$site_url}/myevent">Post Event</a></li>
                <li class="mn5 last"><a href="{$site_url}/myblog">Post Blogs</a></li>
              </ul>
            </div>
          </div>
          <!-- end Media & News--> 
          
          <!--Resource-->
          <div class="field-block">
            <div class="field-title field-inner-3">
              <h1 class="rs-icon">Resource</h1>
              <span class="down-arrow"></span></div>
            <div class="field-content"  style="display:none;">
              <ul>
                <li class="rs1"><a href="{$site_url}/mypostcampaign">Post Campaign</a></li>
                <li class="rs2"><a href="{$site_url}/mypostjob">Post Jobs</a></li>
		{if $tot_storeitem eq '0' || $tot_storeitem eq ''}
                <li class="rs3"><a href="{$site_url}/mystoreplan">Create a Store</a></li>
		{else}
		 <li class="rs3"><a href="{$site_url}/mystore">Create a Store</a></li>
		{/if}
		{if $mem_info[0].eNonProfit eq 'Yes' or $mem_info[0].eChruch eq 'Yes' or $mem_info[0].ePolitician eq 'Yes' or $mem_info[0].eFundraiser eq 'Yes'}
                <li class="rs4"><a href="{$site_url}/myfundraiser">Fundraiser</a></li>
		{else}
		{/if}
                <li class="rs5 last"><a href="{$site_url}/mystore">My Store</a></li>
              </ul>
            </div>
          </div>
          
          <!-- end Resource--> 
          
          <!--Invite Friends-->
          <div class="field-block">
            <div class="field-title field-inner-4">
              <h1 class="if-icon">Invite Friends</h1>
              <span class="down-arrow"></span></div>
            <div class="field-content"  style="display:none;">
              <ul>
                <li class="if1"><a href="{$site_url}/invite_friends">Invite Friends</a></li>
                <li class="if2 last"><a href="{$site_url}/qmein">QME Connections</a></li>
              </ul>
            </div>
          </div>
          <!--end Invite Friends--> 
          
          <!--My Points-->
          <div class="field-block">
            <div class="field-title last field-inner-5">
              <h1 class="mpt-icon">My Points</h1>
              <span class="down-arrow"></span></div>
              <div class="field-content"  style="display:none;">
              <ul>
		<li class="mpt1"><a href="{$site_url}/buypoints">My Points</a></li>
                <li class="mpt1"><a href="#">Total: {$Tot_pnts}</a></li>
              </ul>
            </div>
          </div>
          <!--end My Points--> 
          
        </div>
	   
	   

<!--<div class="user_name_myaccount">
	<div class="user_photo">
		<div class="photo_a">
			{if $vProfileImage eq ''} 
				<img src="{$tconfig["front_images"]}user_img.png" alt="" /> 
			{else} 
				<img src="{$tconfig["tsite_upload_images_member"]}/{$mem_info[0].iMemberId}/2_{$mem_info[0].vProfileImage}" alt="" /> 
			{/if} 
			{if $vProfileImage neq ''} 
			<div class="image_change_menu"><ul class="arrow_box"><li><a href="#" onclick="select_file()">Edit</a></li><li><a href="#" onclick="delete_image();">Delete</a></li></ul></div>
			{else}
			<div class="image_change_menu image_edit_menu"><ul class="arrow_box"><li><a href="#" onclick="select_file()">Edit</a></li></ul></div>
			{/if}
		</div>
	</div>
	{$Name} 
</div>

<div class="cl"></div>
<div class="my_account">
	<ul>
		<li {if $file eq 'm-myaccount'} class="liactive" {/if}><a href="{$site_url}/myaccount" {if $file eq 'm-myaccount'} class="active" {/if}><img src="{$tconfig["front_images"]}myaccount_icon0.png" alt="" />My Account</a></li>
		<li {if $file eq 'm-myprofile'} class="liactive" {/if}><a href="{$site_url}/myprofile" {if $file eq 'm-myprofile'} class="active" {/if}><img src="{$tconfig["front_images"]}myaccount_icon1.png" alt="" />My Profile Setup<img src="{$tconfig["front_images"]}1.png" alt="" class="num_txt_img" /></a></li>
		<li {if $file eq 'm-myabout' or $file eq 'm-myabout'} class="liactive" {/if}>
		<a href="{$site_url}/myabout" {if $file eq 'm-myabout' or $file eq 'm-myabout'} class="active" {/if}> <img src="{$tconfig["front_images"]}myaccount_icon2.png" alt="" />Add About You</a>
		</li>
		<li {if $file eq 'm-myphoto' or $file eq 'm-myallphotos'} class="liactive" {/if}>
		<a href="{$site_url}/myphoto" {if $file eq 'm-myphoto' or $file eq 'm-myallphotos'} class="active" {/if}> <img src="{$tconfig["front_images"]}myaccount_icon2.png" alt="" />My Photos</a>
		</li>
		<li {if $file eq 'm-myvideo' or $file eq 'm-myallvideos' or $file eq 'm-myvideoalbum' or $file eq 'm-myvideodetail'} class="liactive" {/if}>
		<a href="{$site_url}/myvideo" {if $file eq 'm-myvideo' or $file eq 'm-myallvideos' or $file eq 'm-myvideoalbum' or $file eq 'm-myvideodetail'} class="active" {/if}><img src="{$tconfig["front_images"]}myaccount_icon3.png" alt="" />My Videos</a>
		</li>
		<li {if $file eq 'm-mysong' or $file eq 'm-mysongdetail' or $file eq 'm-myallsongs'} class="liactive" {/if}>
		<a href="{$site_url}/mysong" {if $file eq 'm-mysong' or $file eq 'm-myallsongs' or $file eq 'm-mysongdetail' or $file eq 'm-mysongalbum'} class="active" {/if}> <img src="{$tconfig["front_images"]}myaccount_icon4.png" alt="" />My Songs</a>
		</li>
		<li {if $file eq 'm-myblog' or $file eq 'm-myblogadd'} class="liactive" {/if}>
		<a href="{$site_url}/myblog" {if $file eq 'm-myblog' or $file eq 'm-myblogadd'} class="active" {/if} class="padingleft"> <img src="{$tconfig["front_images"]}myaccount_icon5.png" alt="" width="24" height="19" />My Blog</a>
		</li>
		<li {if $file eq 'm-myevent' or $file eq 'm-myaddevent'} class="liactive" {/if}>
		<a href="{$site_url}/myevent" {if $file eq 'm-myevent' or $file eq 'm-myaddevent'} class="active" {/if} class="padingleft"><img src="{$tconfig["front_images"]}myevent.png" alt="" />My Events</a>
		</li>
		<li {if $file eq 'm-mypostjob' or $file eq 'm-mypostjobadd'} class="liactive" {/if}>
		<a href="{$site_url}/mypostjob" {if $file eq 'm-mypostjob' or $file eq 'm-mypostjobadd'} class="active" {/if} class="padingleft" ><img src="{$tconfig["front_images"]}postjob.png" alt="" />Post Jobs</a>
		</li>
		<li {if $file eq 'm-mystore' or $file eq 'm-mystoreplan' or $file eq 'm-mystore_add' or $file eq 'm-myproducts' or $file eq 'm-mygeneralproductdetail' or $file eq 'm-mygeneralproduct_add' or $file eq 'm-myclothingproductdetail' or $file eq 'm-myclothingproduct_add' or $file eq 'm-myautomotiveproductdetail' or $file eq 'm-myautomotiveproduct_add' or $file eq 'm-myrealestateproductdetail' or $file eq 'm-myrealestateproduct_add'} class="liactive" {/if}>
		{if $tot_storeitem eq '0' || $tot_storeitem eq ''}
		<a href="{$site_url}/mystoreplan" {if $file eq 'm-mystore' or $file eq 'm-mystoreplan' or $file eq 'm-mystore_add' or $file eq 'm-myproducts' or $file eq 'm-mygeneralproductdetail' or $file eq 'm-mygeneralproduct_add' or $file eq 'm-myclothingproductdetail' or $file eq 'm-myclothingproduct_add' or $file eq 'm-myautomotiveproductdetail' or $file eq 'm-myautomotiveproduct_add' or $file eq 'm-myrealestateproductdetail' or $file eq 'm-myrealestateproduct_add'} class="active" {/if}><img src="{$tconfig["front_images"]}my-store.png" alt="" /> My store</a>
		{else}
		<a href="{$site_url}/mystore" {if $file eq 'm-mystore' or $file eq 'm-mystoreplan' or $file eq 'm-mystore_add' or $file eq 'm-myproducts' or $file eq 'm-mygeneralproductdetail' or $file eq 'm-mygeneralproduct_add' or $file eq 'm-myclothingproductdetail' or $file eq 'm-myclothingproduct_add' or $file eq 'm-myautomotiveproductdetail' or $file eq 'm-myautomotiveproduct_add' or $file eq 'm-myrealestateproductdetail' or $file eq 'm-myrealestateproduct_add'} class="active" {/if}><img src="{$tconfig["front_images"]}my-store.png" alt="" /> My store</a>
		{/if}
		</li>
		<!--<li {if $file eq 'm-mystore' or $file eq 'm-mystoreplan' or $file eq 'm-mystore_add' or $file eq 'm-myproducts' or $file eq 'm-mygeneralproductdetail' or $file eq 'm-mygeneralproduct_add' or $file eq 'm-myclothingproductdetail' or $file eq 'm-myclothingproduct_add' or $file eq 'm-myautomotiveproductdetail' or $file eq 'm-myautomotiveproduct_add' or $file eq 'm-myrealestateproductdetail' or $file eq 'm-myrealestateproduct_add'} class="liactive" {/if}><a href="{$site_url}/mystoreplan" {if $file eq 'm-mystore' or $file eq 'm-mystoreplan' or $file eq 'm-mystore_add' or $file eq 'm-myproducts' or $file eq 'm-mygeneralproductdetail' or $file eq 'm-mygeneralproduct_add' or $file eq 'm-myclothingproductdetail' or $file eq 'm-myclothingproduct_add' or $file eq 'm-myautomotiveproductdetail' or $file eq 'm-myautomotiveproduct_add' or $file eq 'm-myrealestateproductdetail' or $file eq 'm-myrealestateproduct_add'} class="active" {/if}><img src="{$tconfig["front_images"]}my-store.png" alt="" /> My store</a></li>-->
		<!--<li {if $file eq 'm-mypostcampaign' or $file eq 'm-myaddpostcampaign'} class="liactive" {/if}>
		<a href="{$site_url}/mypostcampaign" {if $file eq 'm-mypostcampaign'  or $file eq 'm-myaddpostcampaign'} class="active" {/if} > <img src="{$tconfig["front_images"]}post-campaign.png" alt="" />Post Campaign</a>
		</li>
		{if $mem_info[0].eNonProfit eq 'Yes' or $mem_info[0].eChruch eq 'Yes' or $mem_info[0].ePolitician eq 'Yes' or $mem_info[0].eFundraiser eq 'Yes'}
		<li {if $file eq 'm-myfundraiser'} class="liactive" {/if}><a href="{$site_url}/myfundraiser" {if $file eq 'm-myfundraiser'} class="active" {/if}> <img src="{$tconfig["front_images"]}fund.png" alt="" />Fundraiser</a> </li>
		{else}
		{/if}
		<li {if $file eq 'm-qmein' or $file eq 'm-myqmeinadd'} class="liactive" {/if}>
		<a href="{$site_url}/qmein" {if $file eq 'm-qmein' or $file eq 'm-myqmeinadd'} class="active" {/if}> <img src="{$tconfig["front_images"]}myaccount_icon7.png" alt="" />Qme Connections</a>
		</li>
		<li {if $file eq 'm-invite_friends'} class="liactive" {/if}><a href="{$site_url}/invite_friends" {if $file eq 'm-invite_friends'} class="active" {/if}> <img src="{$tconfig["front_images"]}myaccount_icon8.png" alt="" />Invite Friends</a> </li>
		<li {if $file eq 'm-buypoints'} class="liactive" {/if}><a href="{$site_url}/buypoints" {if $file eq 'm-buypoints'} class="active" {/if}><img src="{$tconfig["front_images"]}myaccount_icon9.png" alt="" />My Points</a> </li>
	</ul>
</div>-->
<form name="profile_image" id="profile_image" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyimages">
		<div id="divImageId"></div>
		<input type="hidden" value="insert" name="vOperation" id="vOperation1"/>
		<input type="file" name="vProfileImage" id="vProfileImage" onchange="save_image()"/>
</form>
{literal}
<script type="text/javascript">

$('#profile_image').hide();
//$('#vProfileImage').hide();

$(document).ready(function(){
$('#imgupload').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
});
function select_file(){
  
	$('#vProfileImage').click();
	//$('#edit_img').html('<div class="image_change_menu"><ul class="arrow_box"><li><a href="#">Edit</a></li><li><a href="#">Delete</a></li></ul></div>');
}
function save_image(){
		
		$('#vOperation1').val('insert');
		
		$("#profile_image").ajaxForm({
				target: '#divImageId',
				success: function(data){
						window.location = '{/literal}{$script}{literal}';
				}
				}).submit();	
}
function delete_image(){
		
		confirm('Are You Sure Delete your Profile Image ?');
		$('#vOperation1').val('delete');		
		$("#profile_image").ajaxForm({
				target: '#divImageId',
				success: function(data){
						window.location = '{/literal}{$script}{literal}';
				}
				}).submit();
}

</script>

<script> 
var msg='{/literal}{$close_msg}{literal}';

$(window).load(function () {
  if(msg == 1){

	  jQuery("#my-profile").css("dispaly","!important");
	  jQuery(".mp-icon").css("color","#2D3035");
	  jQuery(".field-inner-1").css("background","#f99819");
	  jQuery('#my-profile').slideDown("slow");
	  jQuery('#my-profile-span').removeClass('down-arrow').addClass('left-arrow');
  }
});
  


jQuery(document).ready(function(){
    jQuery(".field-inner-1").click(function(){

//alert("I am here");
  jQuery(".field-inner-1").css("background","#f99819");
   jQuery(".mp-icon").css("color","#fff");
     
 if (jQuery(this).next(".field-content").is(":hidden")) {
    jQuery(this).next(".field-content").slideDown("slow");
   	jQuery(this).children('span').removeClass('down-arrow').addClass('left-arrow');
	
		
    } else {
	    jQuery(".field-inner-1").css("background","#f7f7f7");
		jQuery(".mp-icon").css("color","#2D3035");
        jQuery(this).next(".field-content").slideUp("slow");
	    jQuery(this).children('span').removeClass('left-arrow').addClass('down-arrow');
	}
  
  });
    jQuery(".field-inner-2").click(function(){
  jQuery(".field-inner-2").css("background","#f99819");
   jQuery(".mn-icon").css("color","#fff");
     
 if (jQuery(this).next(".field-content").is(":hidden")) {
    jQuery(this).next(".field-content").slideDown("slow");
   	jQuery(this).children('span').removeClass('down-arrow').addClass('left-arrow');
		
    } else {
	    jQuery(".field-inner-2").css("background","#f7f7f7");
		jQuery(".mn-icon").css("color","#2D3035");
        jQuery(this).next(".field-content").slideUp("slow");
	   jQuery(this).children('span').removeClass('left-arrow').addClass('down-arrow');
    }
  
  });
  
   jQuery(".field-inner-3").click(function(){
  jQuery(".field-inner-3").css("background","#f99819");
   jQuery(".rs-icon").css("color","#fff");
     
 if (jQuery(this).next(".field-content").is(":hidden")) {
    jQuery(this).next(".field-content").slideDown("slow");
   	jQuery(this).children('span').removeClass('down-arrow').addClass('left-arrow');
		
    } else {
	    jQuery(".field-inner-3").css("background","#f7f7f7");
		jQuery(".rs-icon").css("color","#2D3035");
        jQuery(this).next(".field-content").slideUp("slow");
	   jQuery(this).children('span').removeClass('left-arrow').addClass('down-arrow');
    }
  
  });
  
   jQuery(".field-inner-4").click(function(){
  jQuery(".field-inner-4").css("background","#f99819");
   jQuery(".if-icon").css("color","#fff");
     
 if (jQuery(this).next(".field-content").is(":hidden")) {
    jQuery(this).next(".field-content").slideDown("slow");
   	jQuery(this).children('span').removeClass('down-arrow').addClass('left-arrow');
		
    } else {
	    jQuery(".field-inner-4").css("background","#f7f7f7");
		jQuery(".if-icon").css("color","#2D3035");
        jQuery(this).next(".field-content").slideUp("slow");
	   jQuery(this).children('span').removeClass('left-arrow').addClass('down-arrow');
    }
  
  });
  
   jQuery(".field-inner-5").click(function(){
  jQuery(".field-inner-5").css("background","#f99819");
   jQuery(".mpt-icon").css("color","#fff");
     
 if (jQuery(this).next(".field-content").is(":hidden")) {
    jQuery(this).next(".field-content").slideDown("slow");
   	jQuery(this).children('span').removeClass('down-arrow').addClass('left-arrow');
		
    } else {
	    jQuery(".field-inner-5").css("background","#f7f7f7");
		jQuery(".mpt-icon").css("color","#2D3035");
        jQuery(this).next(".field-content").slideUp("slow");
	   jQuery(this).children('span').removeClass('left-arrow').addClass('down-arrow');
    }
  
  });
});
</script>
{/literal}


