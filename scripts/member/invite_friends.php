<?php
$generalobj->checkFrontAuthntication();
include(TPATH_ROOT.'/OpenInviter/openinviter.php');
$inviter=new OpenInviter();
$oi_services=$inviter->getPlugins(true);
$contents="<script type='text/javascript' src='$site_url/OpenInviter/more_examples/js/jquery.mousewheel-3.0.4.pack.js'></script>
<link rel='stylesheet' href='css/style.css'/>
<script type='text/javascript'>
$(document).ready (function(){";
    $contents.=createJsServices('email');
    $contents.=createJsServices('social');
    $contents.="
});
</script>
<style>
    #fancybox-content{
        background:#f4f3ef;
	   border-radius:18px;
	   border:#d8d8d8;
	   width:580px !important;
    }
</style>
<div class='bggray'>
<table width='100%' cellpadding='0' cellspacing='0' border='0'>
	<tr>
		<td width='25%'>
		<table width='100%' cellpadding='0' cellspacing='0' border='0'>
";
$contents.=createHtmlServices('email',$site_url);
$contents.=createHtmlServices('social',$site_url);
$contents.='</table></td>
		<td width="75%" valign="top">
		<div class="header1">Your contacts are safe with us!</div>
		<div class="textheaer">We will not store your password or email with anyone without your permission</div>
		</td>		
	</tr>
</table></div>';
$smarty->assign("contents",$contents);

function createJsServices($type)
{
    global $oi_services;
    $contents="";
	foreach($oi_services[$type] as $service=>$data){
		
		if($service == 'gmail' || $service == 'yahoo' || $service == 'facebook' || $service == 'twitter' || $service == 'linkedin'){

			$contents.="$('#{$service}').fancybox({ 'autoScale' : true, 'overlayShow': true, 'overlayShow': true, 'transitionIn': 'elastic', 'transitionOut': 'none', 'type': 'iframe', 'autoDimensions': true });\n";
		}
	}
	return $contents;
}

function createHtmlServices($type,$site_url)
{
    global $oi_services;
    $contents="<style type='text/css'>
    .crop_image_{$type} {  border:none;  height:88px; margin:0; padding:0; width:160px;}
    .crop_image_{$type}:hover {opacity:0.4;  height:88px; margin:0; padding:0; width:160px;}
    </style>
    ";
    $nCols=5;$c=0;$r=-1;$smallImageWidth=164;$smallImageHeight=90;
//    $contents.="<div id='{$type}' style='float:left;'><table cellspacing='0' cellpadding='0' style='border: medium none;'>";
    foreach($oi_services[$type] as $service=>$data)
	if($service == 'gmail' || $service == 'yahoo' || $service == 'facebook' || $service == 'twitter' || $service == 'linkedin'){
            if (strpos($oi_services[$type][$service]['name'],'DEV')!==FALSE) unset($oi_services[$type][$service]);
	}

    foreach($oi_services[$type] as $service=>$data)
            {

		if($service == 'gmail' || $service == 'yahoo' || $service == 'facebook' || $service == 'twitter' || $service == 'linkedin'){
			$r++;
			//if ($c % $nCols==0) { $c=0; $contents.="<tr>"; }
			$contents.="
				   <tr><td align='center'>
				    <div style='padding:7px 0px;'>
					    <a href='$site_url/OpenInviter/more_examples/get_contacts.php?provider_box={$service}' id='{$service}'>
						    <div style='background-image:url($site_url/OpenInviter/more_examples/imgs/$service.png);' class='crop_image_{$type}'></div>
					    </a>
					</div>  
				    </td></tr>";
				$c++;
				//if ($c % $nCols==0) $contents.="</tr>";
		}else{
			$r++;$c++;
		}

            }
	   
  //  $contents.="</table></div>";
    
    return $contents;
}
?>