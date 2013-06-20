<!--Contant Part Start Here-->
<div id="wraper">
	<div class="contant">
	<div class="platinum_box" style="height:49px; background:#FFFFFF;">
		  <div class="top_beg_img"><img src="{$tconfig["front_images"]}beg_img.png" alt="" /></div>
          <div class="cotizador_text">Cotizador virtual</div>
    </div>

<!--Category Box Start Here-->
<div class="category_box" style="margin-bottom:8px;">
	<div class="contant_white_bg">
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="top">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="5"></td>
                          </tr>
                          <tr>
                            <td>
                            <table width="98%" border="0" align="center" cellpadding="2" cellspacing="0">
                          <tr>
                            <td>
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				 <td height="20" align="left" valign="top" class="codigo_text" width="20%">Codigo</td>
				  <td height="20" align="left" valign="top" class="codigo_text" width="20%">Producto</td>
				  <td height="20" align="center" valign="top" class="codigo_text" width="20%">Cantidad</td>
				  <td height="20" align="center" valign="top" class="codigo_text" width="20%">Confilrmar</td>
				  <td height="20" align="left" valign="top" class="codigo_text" width="20%">Observaciones</td>
				</tr>
				
				<tr>
					<td colspan="5"><div id="carproductId"><div></td>
				</tr>
			      </table>
                         	
                                  </tr>
                              </table>
                            
                          </tr>
           		  </table>
                            </td>
                          </tr>
                    </table>

                </td>
              </tr>
        </table>

    </div>
	<div id="displaybuttonid"></div>	
</div>
    
</div>



	
<!--Category Box End Here-->

       
<div class="cl"></div>
<!--Right Part End Here-->
<!--Slide Part End Here-->
{literal}
<script>
function submitRequest(){
	var extra = '';
	var url = site_url+"/index.php?file=a-quotationrequest";
	var pars = extra;
	
	$.post(url+pars,
            function(data) {
		var html='';
			html+='<div class="popup_box" style="height:auto;">';
			html+='<div  style="text-align:center;line-height:24px;" class="errormsg">'+data+'</div>';
			html+='<div>';
			//alert(html);
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			});
	});
}

displaycartproduct(0);


function Deleteitems(){
	
var productidstr = '';
	$('input[type=checkbox]').each(function () {
		if(this.checked) {
			productidstr = productidstr+$(this).attr("value")+ ",";
		}
		//alert(productidstr);
            });
            productidstr = productidstr.substring(0, productidstr.length - 1);
	    
	    if(productidstr !=''){
		var extra = '';
		extra+='&productidstr='+productidstr;
		var url = site_url+"/index.php?file=a-ajdeleteproductcart";
		var pars = extra;
		
		$.post(url+pars,
			function(data) {
			//alert(data);return false;
			var html='';
			html+='<div class="popup_box" style="height:auto;">';
			html+='<div  style="text-align:center;line-height:24px;" class="errormsg">'+data+'</div>';
			html+='<div>';
			//alert(html);
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			});
			displaycartproduct(0);
			displayslider();
		    });
	    }else{
		var html='';
		html+='<div class="popup_box" style="height:auto;">';
		html+='<div  style="text-align:center;line-height:24px;" class="errormsg">Por favor, seleccione al menos un producto para eliminar de la cesta.</div>';
		html+='<div>';
		//alert(html);
		$(document).ready(function () {				
			$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		});
		return false;
	    }
	    
	    
	
}
function emptycart()
{
	var html='';
		html+='<div class="popup_box" style="height:60px;">';			  	
		html+='<div  style="text-align:center;line-height:24px;" class="errormsg">&iquest;Est&aacute; seguro que desea eliminar todo el art&iacute;culo?</div>';
		html+='<div class="cancelar_btn" style="margin-left:190px;margin-top:10px;" ><a href="#" onclick="$.fancybox.close();">Cancelar</a></div>';
		html+='<div class="cancelar_btn" style="margin-left:15px;margin-top:10px;"><a href="#" onclick="DeleteAll();">S&iacute;</a></div>';
		html+='<div>';
		$(document).ready(function () {				
			$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
		});
		return false;
}

function DeleteAll()
{
	
		
		var url = site_url+"/index.php?file=a-ajemptycart";
		$.post(url,
			function(data) {
			//alert(data);return false;
			var html='';
			html+='<div class="popup_box" style="height:auto;">';
			html+='<div  style="text-align:center;line-height:24px;" class="errormsg">'+data+'</div>';
			html+='<div>';
			//alert(html);
			$(document).ready(function () {				
				$.fancybox(html,{'modal':false,'margin' : '0','padding' : '0','scrolling' : 'no'});
			});
			displaycartproduct(0);
			displayslider();
		    });
	    
}
</script>
{/literal}

