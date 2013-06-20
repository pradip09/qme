<!DOCTYPE html>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}latest/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}latest/Selectyze.jquery.js"></script>
<script type="text/javascript" src="{$tconfig["front_javascript"]}latest/scripts.js"></script>
<!--[if IE]>
<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif:400italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif:700" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Serif:700italic" rel="stylesheet" type="text/css">
  
<![endif]-->
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/reset.css" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/text.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/960.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/icons.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/style.css" />
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/buttons.css" />

<!--[if lt IE 9]>
<script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" href="{$tconfig["front_css"]}latest/ie8.css" />
<![endif]--> 


  
   <div id="accordian">
   
<div class="user_photo">   
 <div id="info">
  <h1 class="profile">{$Name}</h1>
  <h3 class= "place" >Lives in {$mem_info[0]['vState']}, {$mem_info[0]['vCity']} </h3>
   <div class="photo_a">
  {if {$mem_info[0].vProfileImage} eq ''}
  <img src="{$tconfig["front_images"]}user_img.png" alt="" /> 
  {else}
  <img src="{$tconfig["tsite_upload_images_member"]}{$mem_info[0].iMemberId}/{$mem_info[0].vProfileImage}"title="profile image name" /> 
 {/if}
  
  {if $vProfileImage neq ''} 
    <div class="image_change_menu"><ul class="arrow_box"><li><a href="#" onclick="select_file()">Edit</a></li><li><a href="#" onclick="delete_image();">Delete</a></li></ul></div>
    
    {else}
    <div class="image_change_menu image_edit_menu"><ul class="arrow_box"><li><a href="#" onclick="select_file()">Edit</a></li></ul></div>
    {/if}
   </div>
  <p><a href="#" title="complte your profile" >50%</a> profile completed</p>
  
  </div>   <!--info div ends here-->
  </div>
  
    <nav>
      <ul id="nav">
        <li><a href="#"><span id="accordian_icon1"></span>Profile</a>
          <ul  class="activepanel">
            <li ><a href="{$site_url}/myaccount">My Home</a></li>
            <li><a href="{$site_url}/myprofile">My Profile Setup</a></li>
            <li><a href="{$site_url}/myabout">Add About You</a></li>
            <li><a href="{$site_url}/{$mem_info[0].vMemberUrl}">View My Profile</a></li>
          </ul>
        </li>
        <li ><a href="#"><span id="accordian_icon2"></span>Media &amp; News</a>
          <ul> <!--use active class on ul to show its current page status-->
            <li ><a href="{$site_url}/myphoto">My Photo</a></li>
                <li ><a href="{$site_url}/myvideo">My Videos</a></li>
                <li ><a href="{$site_url}/mysong">My Songs</a></li>
                <li ><a href="{$site_url}/myevent">Post Event</a></li>
                <li ><a href="{$site_url}/myblog">Post Blogs</a></li>
          </ul>
        </li>
        <li ><a href="#"><span id="accordian_icon3"></span>Resources</a>
          <ul>
           <li ><a href="{$site_url}/mypostcampaign">Post Campaign</a></li>
                <li ><a href="{$site_url}/mypostjob">Post Jobs</a></li>
		{if $tot_storeitem eq '0' || $tot_storeitem eq ''}
                <li ><a href="{$site_url}/mystoreplan">Create a Store</a></li>
		{else}
		 <li ><a href="{$site_url}/mystore">Create a Store</a></li>
		{/if}
		{if $mem_info[0].eNonProfit eq 'Yes' or $mem_info[0].eChruch eq 'Yes' or $mem_info[0].ePolitician eq 'Yes' or $mem_info[0].eFundraiser eq 'Yes'}
                <li ><a href="{$site_url}/myfundraiser">Fundraiser</a></li>
		{else}
		{/if}
                <li ><a href="{$site_url}/mystore">My Store</a></li>
          </ul>
        </li>
        <li><a href="#"><span id="accordian_icon4"></span>Invite Friends</a>
          <ul>
          <li ><a href="{$site_url}/invite_friends">Invite Friends</a></li>
                <li ><a href="{$site_url}/qmein">QME Connections</a></li>
          </ul>
        </li>
        <li><a href="#"><span id="accordian_icon5"></span>My Points</a>
          <ul>
            <li ><a href="{$site_url}/buypoints">My Points</a></li>
                <li ><a href="#">Total: {$Tot_pnts}</a></li>
          </ul>
        </li>
       
      </ul>
    </nav>
  </div>



<form name="profile_image" id="profile_image" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajmyimages">
		<div id="divImageId"></div>
		<input type="hidden" value="insert" name="vOperation" id="vOperation1"/>
		<input type="file" name="vProfileImage" id="vProfileImage" onchange="save_image()"/>
</form>
{literal}
<script type="text/javascript">

$('#profile_image').hide();

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
$.noConflict();

/*var msg='{/literal}{$close_msg}{literal}';

$(window).load(function () {
  if(msg == 1){

	  jQuery("#my-profile").css("dispaly","!important");
	  jQuery(".mp-icon").css("color","#2D3035");
	  jQuery(".field-inner-1").css("background","#f99819");
	  jQuery('#my-profile').slideDown("slow");
	  jQuery('#my-profile-span').removeClass('down-arrow').addClass('left-arrow');
  }
});*/
  
/*

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
});*/
</script>
{/literal}


