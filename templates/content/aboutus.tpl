<script type="text/javascript" src="{$tconfig["front_javascript"]}jquery.cycle.all.js"></script>
<div id="services_boxinnerbg" class="desboard_body" style="padding-top:1px;">
<!--heading start here -->    
    <div class="heading">
      <div class="line">About us </div>
     </div>
<!--heading end here -->    


<!--<div class="who_we_are">
<h1>Tell us about You or your company?...</h1>
<div class="about_us">{$aboutus[0].lContents}</div>
</div>
-->
<!--<div class="deliverimg_box">
<h1 class="deliverimg_txt">Experience . Qualification . Certifications. Education</h1>
<div class="about_us">{$experience[0].lContents} 
</div>
<div class="cl"></div>
</div>-->
<!--<div class="cl"></div>
<div class="box_shadow"></div>


<div class="deliverimg_box" style="padding-right:0; width:96.5%;">

<div class="our_mission_box">
<h1 class="our_miss">OUR MISSION STATEMENT ...</h1>
<div class="about_us">{$ourmission[0].lContents}</div>

</div>


<div class="our_mission_box" style=" padding-left:38px;">
<h1 class="our_miss">OUR SERVICE...</h1>
<div class="about_us">{$ourservice[0].lContents}</div>

</div>

<div class="cl"></div>
</div>-->


<div class="nav" style="float:right;margin-right:30px;">
  <a class="prev1" href="#"><img src="{$tconfig["front_images"]}pre_page.png" title="Previous" alt="previous" /></a> &nbsp;<a class="next1" href="#"><img src="{$tconfig["front_images"]}next_page.png" title="Next" alt="next" /></a>
</div>
<div id="aboutslideId"  class="deliverimg_box" style="margin-left:16px;">
    <img src="{$tconfig["front_images"]}qme_promo1.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo2.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo3.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo4.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo5.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo6.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo7.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo8.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo9.jpg" title="" alt=""/>
    <img src="{$tconfig["front_images"]}qme_promo10.jpg" title="" alt=""/>
</div>
<div class="nav" style="float:right;margin-right:30px;">
  <a class="prev1" href="#"><img src="{$tconfig["front_images"]}pre_page.png" title="Previous" alt="previous" /></a> &nbsp;<a class="next1" href="#"><img src="{$tconfig["front_images"]}next_page.png" title="Next" alt="next" /></a>
</div>
<div class="deliverimg_box">
  


</div>
<div class="cl"></div>

</div>
{literal}

<script>
$('#aboutslideId').cycle({
    fx:     'scrollHorz',
    prev:   '.prev1',
    next:   '.next1',
    timeout: 0
});
</script>
{/literal}
