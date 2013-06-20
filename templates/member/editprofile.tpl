 
 <div id="wraper">
	<div class="contant">

<!--Category Box Start Here-->
<div class="category_box">
	<div class="contant_white_bg">
    <form name="editprofile" id="editprofile">
    	<div class="contacto">Editar perfil</div><br />


        <div class="cl"></div>
		<div class="naingationmenu"><a href="{$site_url}/myaccount">Mi Cuenta</a> > Editar perfil</div>
        
        <div class="white_bg_right">
	     <div id="divmsgid" style="text-align:right;line-height:24px; height:25px; padding-right:8px;width: 605px;"></div>
	  
	       
        	<div class="inputchangepass">
           	  <div class="inputtextpass">*Nombre de pila</div>
               	 <input name="vFirstName" type="text"  class="gray_input" id="vFirstName" value="{$userArr[0].vFirstName}"/>
	      </div>
		<div class="inputchangepass">
           	  <div class="inputtextpass">*Apellido</div>
               	 <input name="vLastName" type="text"  class="gray_input" id="vLastName" value="{$userArr[0].vLastName}"/>
	      </div>
            
            <div class="inputchangepass">
            	<div class="inputtextpass">*Correo Electr&oacute;nico</div>
                <input id="vEmail" name="vEmail" type="text"  class="gray_input" title="Correo Electr&oacute;nico" value="{$userArr[0].vEmail}"/>
            </div>
            
          <div class="inputchangepass" style="padding-bottom:15px;">
            	<div class="inputtextpass">*Telefono</div>
                <input id="vPhone" name="vPhone" type="text"  onkeypress="return chkValidPhone(event);" class="gray_input" title="Telefono" maxlength="15" value="{$userArr[0].vPhone}"/>
          </div>
          
          <div class="inputchangepass" style="padding-bottom:15px; padding-left:341px; width:250px;">
     
                <input name="presentar" type="button" value="presentar"  class="btn" onclick="validateform();"/>
	      <input name="" type="button" value="reajustar"  class="btn" onclick="clearform(document.editprofile);"/>
          </div>
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
function clearform(frm1)
{
       frm1.reset();
}

function validateform(){
      
       	$("#divmsgid").removeClass('popup-err').addClass('errormsg').text('Validating....').fadeIn(1000);
	var extra='';
	
	if($('#vFirstName')){
		if($('#vFirstName').val() ==''){
			$('#divmsgid').html("Por favor, introduzca el primer nombre").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vFirstName = $('#vFirstName').val();
			extra+='&vFirstName='+vFirstName;
		}
	}
	if($('#vLastName')){
		if($('#vLastName').val() ==''){
			$('#divmsgid').html("Por favor, ingrese el apellido").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vLastName = $('#vLastName').val();
			extra+='&vLastName='+vLastName;
		}
	}
	if($('#vEmail')){
		if($('#vEmail').val() ==''){
			$("#divmsgid").html('Por favor ingrese Correo Electr&oacute;nico').addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			var vEmail = $('#vEmail').val();
			var msg = isValidEmail(vEmail);
			if(msg !='0'){
				$("#divmsgid").html(msg).addClass('errormsg').fadeTo(900,1);
				return false;
			}else{
				extra+='&vEmail='+vEmail;
			}
		}
	}
	
	
	if($('#vPhone')){
		if($('#vPhone').val() ==''){
			$('#divmsgid').html("Por favor ingrese Telefono").addClass('errormsg').fadeTo(900,1);
			return false;
		}else{
			 var vPhone = $('#vPhone').val();
			extra+='&vPhone='+vPhone;
		}
	}
	
	
	

    var url = site_url+"/index.php?file=a-ajeditprofile";
    
    var pars = extra; 
  
    //alert(url+pars);return false;
	
	$.post(url+pars,
            function(data) {
       		if(data == 'successedit'){
		     window.location=site_url+"/myaccount/"+data;
		}else if(data == 'erroredit'){
		     window.location=site_url+"/myaccount/"+data;
		     
		}else if(data == 'emailexist'){
		 var_msg="Identificaci&oacute;n del correo electr&oacute;nico ya exist.please utilizar otro correo electr&oacute;nico de identificaci&oacute;n.";
		 $('#divmsgid').html(var_msg);    
		}
		
		
       });
}
   
</script>
{/literal}
