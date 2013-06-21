$(document).ready(function(){
$('#browsejob').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#postjob').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});

$('#postcamp').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
$('#browsecamp').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
/*$('.btncommercial').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
$('.btnradio').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
$('.btnwebsite').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});
$('.btnbuy').fancybox({
	'overlayShow'	: true,
	'transitionIn'	: 'elastic',
	'transitionOut'	: 'elastic',
	'margin' : '0',
	'padding' : '0',
	'scrolling' : 'no'
	
});*/

});




function Loginpopform(){
	$("#divpoploginmsgid").removeClass('popup-err').addClass('errormsg_login').text('Validar....').fadeIn(1000);
	var extra='';
	if($('#vLoginEmail')){
		if($('#vLoginEmail').val() ==''){
			$("#divpoploginmsgid").html('Por favor ingrese nombre de usuario').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var vLoginEmail = $('#vLoginEmail').val();
			var msg = isValidEmail(vLoginEmail);
			if(msg !='0'){
				$("#divpoploginmsgid").html(msg).addClass('errormsg_login').fadeTo(900,1);
				return false;
			}else{
				extra+='&vLoginEmail='+vLoginEmail;
			}
		}
	}
	if($('#vLoginPassword')){
		if($('#vLoginPassword').val() ==''){
			$('#divpoploginmsgid').html("Por favor ingrese su contrase&ntilde;a").addClass('errormsg_login').fadeTo(900,1);
			return false;
		}else{
			 var vLoginPassword = $('#vLoginPassword').val();
			extra+='&vLoginPassword='+vLoginPassword;
		}
	}
	
	var url = site_url+"/index.php?file=a-ajpoplogin";
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		if(data=='success'){
			//$('#divloginmsg').html("Se registra con éxito").addClass('errormsg_login').fadeTo(900,1);
			if($('#file')){
                            if($('#file').val() !=''){
                                    var file = $('#file').val();
                                    if(file == 'productdetail'){
                                        if($('#iProductId')){
                                            if($('#iProductId').val() !=''){
                                                    var iProductId = $('#iProductId').val();
                                            }
                                        }
                                        window.location=site_url+"/"+file+"/"+iProductId;
                                    }else{
                                        window.location=site_url+"/"+file;
                                    }
                            }
                        }
                        
		}else {if(data=='inactivemem'){
			$('#divpoploginmsgid').html("Su cuenta ha sido el contacto con Inactive.Please administrtor").addClass('errormsg_login').fadeTo(900,1);
		}else{
			$('#divpoploginmsgid').html("Su nombre de usuario y contrase&ntilde;a missmatch").addClass('errormsg_login').fadeTo(900,1);
		}}
                //$('#productlist_loading').hide();
                
       });
	
}
