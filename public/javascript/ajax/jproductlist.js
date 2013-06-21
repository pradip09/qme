function GetProducts(start){
    //alert('hi');
    var extra = '';	
    //alert(searchkeyword);
    //$('#productlist_loading').show();    
    extra+='&start='+start;
    
    
    if($('#keyword')){
	if($('#keyword').val() != ''){
	    var keyword = $('#keyword').val();
	    extra+='&keyword='+keyword;
	}
    }
    
    if($('#iParentId')){
	if($('#iParentId').val() != ''){
	    var iParentId = $('#iParentId').val();
	    extra+='&iParentId='+iParentId;
	}
    }
    
    if($('#iCategoryId')){
	if($('#iCategoryId').val() != ''){
	    var iCategoryId = $('#iCategoryId').val();
	    extra+='&iCategoryId='+iCategoryId;
	}
    }
    
    if($('#refcat')){
	if($('#refcat').val() != ''){
	    var refcat = $('#refcat').val();
	    extra+='&refcat='+refcat;
	}
    }
    
    
    //alert(extra);
    var url = site_url+"/index.php?file=a-ajproductlist";
    
    var pars = extra; 
    //alert(pars);
    //alert(url+pars);return false;
	
	$.post(url+pars,
            function(data) {
                //$('#productlist_loading').hide();
                //var khtml = data;
		$('#productlist').html(data);
       });
}


function GetPromotionProducts(start){
    var extra = '';	
    //alert(searchkeyword);
    //$('#productlist_loading').show();    
    extra+='&start='+start;
    
    if($('#keyword')){
	if($('#keyword').val() != ''){
	    var keyword = $('#keyword').val();
	    extra+='&keyword='+keyword;
	}
    }
    if($('#iParentId')){
	if($('#iParentId').val() != ''){
	    var iParentId = $('#iParentId').val();
	    extra+='&iParentId='+iParentId;
	}
    }
    if($('#iCategoryId')){
	if($('#iCategoryId').val() != ''){
	    var iCategoryId = $('#iCategoryId').val();
	    extra+='&iCategoryId='+iCategoryId;
	}
    }
    
    /*if(selStoreId != ''){
    extra+='&selStoreId='+selStoreId;
    }*/
    
    //alert(extra);
    var url = site_url+"/index.php?file=a-ajpromotionlist";
    
    var pars = extra; 
    
    //alert(url+pars);return false;
	
	$.post(url+pars,
            function(data) {
                
                //$('#productlist_loading').hide();
               // var khtml = data;
		$('#promotionlist').html(data);
       });
}


function GetCategory(start){
   var extra = '';	
    extra+='&start='+start;
    if($('#refcat')){
	if($('#refcat').val() != ''){
	    var refcat = $('#refcat').val();
	    extra+='&refcat='+refcat;
	}
    }
     var url = site_url+"/index.php?file=a-ajcatloglist";
    
    var pars = extra; 
    
    //alert(url+pars);return false;
	
	$.post(url+pars,
            function(data) {
                
                //$('#productlist_loading').hide();
               // var khtml = data;
		$('#categorytlist').html(data);
       });
}