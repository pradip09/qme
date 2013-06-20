 <div id="wraper">
	<div class="contant">

<!--Category Box Start Here-->
<div class="category_box">
	<div class="contant_white_bg">
      <form name="frmchangepassword" id="frmchangepassword">
    	<div class="contacto">Cambiar la contrase&ntilde;a</div>
        <div class="cl"></div>
		<div class="naingationmenu"><a href="{$site_url}/myaccount">Mi Cuenta</a> >Cambiar la contrase&ntilde;a</div>
        
        <div class="white_bg_right">
	     
	     <div id="divmsgid" style="text-align:right;line-height:24px; height:25px; padding-right:8px;width: 605px;"></div>
	       
		     <div class="inputchangepass">
		     <div class="inputtextpass">*contrase&ntilde;a antigua</div>
			    <input id="oldPassword" name="oldPassword" type="password" class="gray_input" title="contrase&ntilde;a antigua"/>
		     </div>
		     <div class="inputchangepass">
		     <div class="inputtextpass">*nueva contrase&ntilde;a</div>
			    <input id="newPassword" name="newPassword" type="password" class="gray_input" title="nueva contrase&ntilde;a"/>
		     </div>
		     
		     <div class="inputchangepass">
		      <div class="inputtextpass">*Confirmar la contrase&ntilde;a</div>
			    <input id="confPassword" name="confPassword" type="password" class="gray_input" title="Confirmar la contrase&ntilde;a"/>
		     </div>

            
       </div>
     
                     <div class="input_part" style="padding-bottom:15px;padding-left:361px; width:250px;">
     
                <input name="" type="button" title="Presentar" value="Presentar"  class="btn" onclick="validateform()" style="outline:none;"/>
				<input name="" title="Reajustar" type="button" value="Reajustar"  class="btn" style="outline:none;" onclick="clearform(document.frmchangepassword);"/>
          </div>
      </form>
    </div>    
</div>
	
<!--Category Box End Here-->

       
<div class="cl"></div>
<!--Right Part End Here-->


       
<!--Slide Part End Here-->

{literal}
<script type="text/javascript">
function clearform(frm)
{
       frm.reset();
}

function validateform(){
	$("#divmsgid").removeClass('popup-err').addClass('errormsg').text('Validating....').fadeIn(1000);
	var extra='';
	if($('#oldPassword')){
		if($('#oldPassword').val() ==''){
			$('#divmsgid').html("Por favor ingrese su contrase&ntilde;a antigua").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
				var oldPassword = $('#oldPassword').val();
				extra+='&oldPassword='+oldPassword;
			}
	}
	
	if($('#newPassword')){
		if($('#newPassword').val() ==''){
		     	$('#divmsgid').html("Por favor ingrese su nueva contrase&ntilde;a").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	
	if($('#confPassword')){
		if($('#confPassword').val() ==''){
			$('#divmsgid').html("Por favor ingrese su confirmar la contrase&ntilde;a").addClass('errormsg').fadeTo(900,1);
			return false;
		}
	}
	if($('#newPassword').val() != $('#confPassword').val()){
		$('#divmsgid').html("nueva contrase&ntilde;a y confirmaci&oacute;n de contrase&ntilde;a no coincide").addClass('errormsg').fadeTo(900,1);
		return false;
	}else{
		
		var confPassword = $('#confPassword').val();
		var newPassword = $('#newPassword').val();
		extra+='&newPassword='+newPassword;
	}
	
	
	

    var url = site_url+"/index.php?file=a-ajchangepassword";
    
    var pars = extra; 
  
    //alert(url+pars);return false;
	
	$.post(url+pars,
            function(data) {
                
		if(data =='success')
		{
		     $("#divmsgid").hide();
		    var khtml = "Contrase&ntilde;a cambiada successfilly";
		     $('#oldPassword').val('');
		     $('#newPassword').val('');
		     $('#confPassword').val('');
		     
		     var html='';
		     html+='<div class="popup_box" style="height:auto;">';
		     html+='<div class="errormsg_login" style="font-size:12px;text-align:center;">';
		     html+=khtml;
		     html+='</div>';
		     html+='</div>';
		     $(document).ready(function () {                                
				    $.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
                       });
		
		     
		     //$('#divmsgid').html(data);
		}
		else if(data=='notmatch')
		{
		     $('#divmsgid').html('Contrase&ntilde;a anterior no coincide');
		}
		
		else
		{
		     $('#divmsgid').html(data);
		}
                //$('#productlist_loading').hide();
                /*var khtml = data;
		$('#oldPassword').val('');
		$('#newPassword').val('');
		$('#confPassword').val('');
    		$('#divmsgid').html(data);*/
       });
}


 
</script>
{/literal}
