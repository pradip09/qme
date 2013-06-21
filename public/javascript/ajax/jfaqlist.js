function GetFAQcategory(start){
    //alert('hi');
    var extra = '';	
    
    extra+='&start='+start;
    
    if($('#iFAQCategoryId')){
	if($('#iFAQCategoryId').val() != ''){
	    var iFAQCategoryId = $('#iFAQCategoryId').val();
	    extra+='&iFAQCategoryId='+iFAQCategoryId;
	}
    }else{
	extra+='&iFAQCategoryId='+start;
    }
    
    
    
    
    //alert(extra);
    var url = site_url+"/index.php?file=a-ajfaq";
    
    var pars = extra; 
    //alert(pars);
    //alert(url+pars);return false;
	
	$.post(url+pars,
            function(data) {
                //$('#productlist_loading').hide();
                //var khtml = data;
		//alert(data);
		$('#faqdivId').html(data);
       });
}
