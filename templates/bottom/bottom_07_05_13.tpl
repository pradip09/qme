</div>
<div class="clear"></div>
<div id="outerfoot">
<div id="feedbackbtn"><a href="#Feedback" class="btnfeedback" id="feedback"></a></div>
	<div id="footer_wrap" class="container_12">
		<div class="grid_12" id="footer_top">
			<div class="grid_3 alpha" id="sitemap">
				<div id="sitemapwrap">
					<div class="footerhead"> <span id="icon1"></span> <span class="footertitle">Sitemap</span> </div>
					<!--footerhead div ends here-->
					<ul class="footerul">
						<li><a href="{$tconfig["tsite_url"]}/news">Latest News</a></li>
						<li><a href="{$tconfig["tsite_url"]}/qmeoops">QME Search</a></li>
						<!--<li><a href="{$tconfig["tsite_url"]}/contact">Contact Us</a></li>-->
						<li><a href="{$tconfig["tsite_url"]}/privacypolicy">Privacy Policy</a></li>
						<li><a href="{$tconfig["tsite_url"]}/aboutus">About Us</a></li>
						<li><a href="{$tconfig["tsite_url"]}/temsandcondition">Terms and Condition</a></li>
					</ul>
				</div>
				<!--sitemapwrap ends here-->
			</div>
			<!--sitemap div ends here-->
			<div class="grid_4" id="services">
				<div id="servicewrap">
					<div class="footerhead"> <span id="icon2"></span> <span class="footertitle">Services</span> </div>
					<!--footerhead div ends here-->
					<ul class="footerul">
						<li><a href="{$agencysupport_url}/overview">Services Overview</a></li>
						<li><a href="{$agencysupport_url}/branding-and-identity-design">Branding &amp; Identity</a></li>
						<li><a href="{$agencysupport_url}/print-collateral-design-services">Print Collateral Design</a></li>
						<li><a href="{$agencysupport_url}/web-interactive">Web &amp; Interactive</a></li>
						<li><a href="{$agencysupport_url}/package-design-services">Package Design</a></li>
					</ul>
					<ul class="footerul ulpadding">
						<li><a href="{$agencysupport_url}/3d-animation-design">3D &amp; Animation</a></li>
						<li><a href="{$agencysupport_url}/tv-film-video-production-services">TV Film &amp; Video</a></li>
						<li><a href="{$agencysupport_url}">Production</a></li>
						<li><a href="{$agencysupport_url}/email-marketing-services">Email Marketing</a></li>
						<li><a href="{$agencysupport_url}/strategic-planning">Strategic Planning</a></li>
					</ul>
				</div>
				<!--servicewrap ends here-->
			</div>
			<!--services links ends here-->
			<div class="grid_5 omega" id="contact">
				<div id="contactwrap">
					<div class="footerhead"> <span id="icon3"></span> <span class="footertitle">Contact us</span> </div>
					<!--footerhead div ends here-->
					<ul class="footerul">
						<li><a href="{$tconfig["tsite_url"]}/contact">Contact Us</a></li>
						<!--<li>1000 Kirk Ave, Suite 1000, Wilmington, DE 19806</li>
						<li class="email"><a href="#">customerservice@qmemedia.com</a></li>-->
					</ul>
					<div id="socialwrap">
						<!--<div class="footerhead nobg"> <span class="footertitle">Get Social</span></div>
						footerhead ends here-->
						<!--<ul class="social">
							<li class="facebook"><a href="#" title="facebook">facebook</a></li>
							<li class="twitter"><a href="#" title="twitter">twitter</a></li>
							<li class="youtube"><a href="#" title="youtube">youtube</a></li>
							<li class="google"><a href="#" title="google">google</a></li>
						</ul>-->
					</div>
					<!--socialwrap ends here-->
				</div>
				<!--contactwrap ends here-->
			</div>
			<!--content div ends here-->
		</div>
		<!--footer_top area ends here-->
		<div class="clear"></div>
		<div class="grid_12" id="footer_bottom">Copyright 2012 MYQME, Inc.<br />
		Website Design and Developed By QME & TECHIES TOWN 2012</div>
		<!--footer_bottom area-->
	</div>
	<!--footer wrapper end-->
</div>


</div>



<!---feedback popup start here--->
<div style="display:none;">
	<div id="Feedback" class="signing" style="padding-bottom:15px;">
		<div id="feedmsg" style="text-align:center;line-height:24px; color:red; font-size:18px;"></div>
		<div class="singheader"><img src="{$tconfig["front_images"]}feedback.png" width="148" height="35" alt="" /></div>
		<label class="feedbacktext">Subject</label>
		<input name="Subject" id="Subject" class="singinput" type="text" placeholder="Subject Here" />
		<label class="feedbacktext">Message</label>
		<textarea name="Message" id="Message" class="message" placeholder="Message here"></textarea>
		<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td>&nbsp;</td>
				<td align="right"><a href="javascript:void(0);" onclick="validatefeed();"><img src="{$tconfig["front_images"]}submit.png"/></a></td>
			</tr>
		</table>
	</div>
</div>

<!----feedback popup end here---->
{literal}
<script>
!function(d,s,id){
	var js,fjs=d.getElementsByTagName(s)[0];
	if(!d.getElementById(id)){
		js=d.createElement(s);
		js.id=id;js.src="//platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js,fjs);
	}
}(document,"script","twitter-wjs");
</script>
<script type="text/javascript">

if('{/literal}{$file}{literal}' == 'm-search_result')
{
	
}else{
	selectmode('campaign');	
}


function validatefeed(){
	$("#feedmsg").removeClass('popup-err').addClass('errormsg').text('Validating....').fadeIn(1000);
	var extra='';
	if($('#Subject')){
		if($('#Subject').val() ==''){
			$("#feedmsg").html('Please enter subject').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var vSubject = $('#Subject').val();
			extra+='&Subject='+vSubject;
		}
		
	}
	if($('#Message')){
		if($('#Message').val() ==''){
			$('#feedmsg').html("Please enter message").addClass('errormsg_login').fadeTo(900,1);
			return false;
		}else{
			 var vMessage = $('#Message').val();
			extra+='&Message='+vMessage;
		}
	}
	//alert(extra);
    var url = site_url+"/index.php?file=a-ajfeedback";
    var pars = extra;
    
	$.post(url+pars,
            function(data) {
                var khtml = '<div style="text-align:center;">Thank you for your feedback we will get back to you soon with answers. We appreciate you participating with QME in our beta testing phase of the MYQME site.</div>';
		//alert(khtml);
		if(data == 'success')
		{
		$('#Subject').val('');
		$('#Message').val('');
		 $('#feedmsg').val('');
		html='';
		html+='<div class="popup_box" style="height:auto;width:627px;">';
		html+='<div class="errormsg_login" style="font-size:17px;text-align:center;color:#E26700;">';
		html+=khtml;
		html+='</div>';
		html+='</div>';
		$(document).ready(function () {                                
		       $.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
	       });
	}
		else
		{
		    $('#feedmsg').html(data);
		}
		    
		
       });
}


</script>
<script>

$(document).ready(function(){
$('#feedback').fancybox({
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