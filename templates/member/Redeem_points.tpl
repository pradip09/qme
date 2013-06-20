<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jquery.form.js"></script>
<script language="JavaScript" src="{$tconfig["front_javascript"]}ajax/jmainajax.js"></script>

<div id="services_box" class="desboard_body"> {include file="member/myaccountleft.tpl"} </div>
<div class="desboard-right">
      <div class="MyVedioTitle">
	      <h1>Redeem Points</h1>
      </div>
      <div class="cl"></div>
      <div class="bredcums" style="padding-top:14px;">
	      <a href="{$site_url}/buypoints">My Points</a> > Redeem Points
      </div>
      <div class="rdm_point_cont">
	  <div class="rdm_qus_box">
	  
		  <div class="rdm_qus_rpt_box"><span><strong>Q.</strong> Can I redeem my QME earn points for cash?</span><br />
		      <strong>A.</strong>  Yes! When your QME earn points value at least $25 US dollars same as 2,500 points, you will be given the option of redeeming them into cash. QME earn points may also be used to promote your own campaign, buy products or promotions from other QME campaigns, and much more.
		  </div>
  
		  <div class="rdm_qus_rpt_box last">
		      <span><strong>Q.</strong> What is the value of points?</span><br />
		      <strong>A.</strong> One QME point equals one penny, meaning that each QME earn point is the equivalent of one cent. 100 points equals one dollar, 1,000 points equals ten dollars, and so forth. Upon registering with QME, each member will receive 500 complimentary QME points after completing their profile setup
		  </div>
	  </div>
	  <form name="addmyread" id="addmyread" method="post" enctype="multipart/form-data" action="{$site_url}/index.php?file=a-ajredeempoints">
	  <input type="hidden" id="totpnt" name="totpnt" value="{$total_points}"/>
	  <div class="right_rdm_part">
	  <div class="total_qme_points">
		 Your total QME earn points : <strong>{$total_points}</strong>
	  </div>
	  <div id="divmsgid" class="error_massage" style="margin-left: -138px;margin-top: -22px;font-size: 14px;"></div>
	  {if $total_points > 2500}
	  <div class="qmd_dollar_txt">
		  Enter points you want to redeem?&nbsp;<input type="text"  id="dollaramt" name="dollaramt" onkeypress="return checkmobile(event);"/>
	  </div>
	  
	  <div class="rdm_paymt_box">
		  <strong>Choose methods to receive your payments?</strong><br />
		  Paypal &nbsp;&nbsp;<input type="checkbox" name="payment[]" id="check1" onchange="altcheck(this.id);" value="Paypal"/><br />
		  I want QME to mail me a check&nbsp;&nbsp;<input type="checkbox" name="payment[]" id="check2" onchange="altcheck(this.id);" value="check"/><br />
		  I want a QME pre paid debit card&nbsp;&nbsp;<input type="checkbox" name="payment[]" id="check3" onchange="altcheck(this.id);" value="debit card"/>
	  </div>
	     <div class="rdm_btn"><img src="{$tconfig["front_images"]}redm-btn.png" alt="" title=""  onclick="readSubmit();"/></div>
	   {/if}
	  
	  </div>
	  </form>
	   
	  <div class="cl"></div>
      </div>
  </div>
<div class="cl"></div>
</div>
</div>
{literal}
<script type="text/javascript">

function altcheck(id){
      
      if(id == 'check1')
      {
	    $('#check2').attr('checked',false);
	    $('#check3').attr('checked',false);
      }
      if(id == 'check2')
      {
	    $('#check3').attr('checked',false);
	    $('#check1').attr('checked',false);
      }
      if(id == 'check3')
      {
	    $('#check1').attr('checked',false);
	    $('#check2').attr('checked',false);
      }
      
}
function  readSubmit(){
      
if($('#dollaramt')){
	     if($('#dollaramt').val() ==''){
		     $('#divmsgid').html("Please enter points").addClass('errormsg').fadeTo(900,1);
		     return false;
	     }
      }
var pnt='{/literal}{$total_points}{literal}';

if(parseInt($('#dollaramt').val()) < parseInt(pnt)){
      $('#divmsgid').html("Please enter greater amount than your qme points").addClass('errormsg').fadeTo(900,1);
      return false;
}
var chks = document.getElementsByName('payment[]');
var hasChecked = false;
 
  for (var i = 0; i < chks.length; i++)
  {
	  if (chks[i].checked) 
	  {
		  hasChecked = true;
		  break;
	  }else{
	    
	  }
  }
  // if ishasChecked is false then throw the error message
  if (!hasChecked)
  {
	  $('#divmsgid').html("Please select at least one option").addClass('errormsg').fadeTo(900,1);
	  chks[0].focus();
	  return false;
  }

//var test= $('#check1').val();

$('#divmsgid').html("Processing your request....").addClass('errormsg').fadeTo(900,1);
	$("#addmyread").ajaxForm({
		target: '#divmsgid',
		success: finish
		}).submit();
 
}
function finish()
{
      window.location='{/literal}{$site_url}{literal}'+'/Redeem_points/';
}
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

function checkmobile(events)
{
      //var abc= $('#dollaramt').val();
      /*if($('#dollaramt').val() < 2500){
	      $('#divmsgid').html("Please enter greater points than 2500").addClass('errormsg').fadeTo(900,1);
	      //return false ;
      }*/
	var unicodes=events.charCode? events.charCode :events.keyCode;
	if (unicodes!=8)
	{ 
	        if( ((unicodes>47 && unicodes<58) || unicodes == 43 || unicodes == 46 )){
	            return true;
		}else{
			return false;
		}
	}
      
}
</script>
{/literal} 