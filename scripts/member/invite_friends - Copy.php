<?php
	include(TPATH_ROOT.'/public/OpenInviter/openinviter.php');
$inviter=new OpenInviter();
$oi_services=$inviter->getPlugins(true);
$contents="<script type='text/javascript' src='$site_url/public/OpenInviter/more_examples/js/jquery.mousewheel-3.0.4.pack.js'></script>
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
        background:#fff;
    }
</style>.

<table>
	<tr>
		<td>
		<table>
";
$contents.=createHtmlServices('email',$site_url);
$contents.=createHtmlServices('social',$site_url);
$contents.='</table></td>
		<td></td>		
	</tr>
</table>';
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
    .crop_image_{$type} {  border:none;  height:90px; margin:0; padding:0; width:160px; }
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
				    <div class='bggray'>
					    <a href='$site_url/public/OpenInviter/more_examples/get_contacts.php?provider_box={$service}' id='{$service}'>
						    <div style='background-image:url($site_url/public/OpenInviter/more_examples/imgs/$service.png);' class='crop_image_{$type}'></div>
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