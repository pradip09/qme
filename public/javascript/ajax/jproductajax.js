function displayallstore(start,iMemberId){
	var extra ='';
	extra+='&start='+start;
	extra+='&iMemberId='+iMemberId;
	var url = site_url+"/index.php?file=a-ajmystore";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#store_listingDiv')){
			$('#store_listingDiv').html(data);
		}
	});
	
}

// general items 
function displayallproduct(start,iStoreCategoryId){
	var extra ='';
	extra+='&start='+start;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajmygeneralproduct";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showMyproductDiv')){
			$('#showMyproductDiv').html(data);
		}
	});
}

//clothing products list
function displayallClothingproduct(start,iStoreCategoryId){
	var extra ='';
	extra+='&start='+start;
	extra+='&start='+start;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajmyclothingproduct";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showClothingDiv')){
			$('#showClothingDiv').html(data);
		}
	});
	
}

function displayallAutomotiveproduct(start,iStoreCategoryId){
	var extra ='';
	extra+='&start='+start;
	extra+='&start='+start;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajmyautomotiveproduct";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showAutomotiveDiv')){
			$('#showAutomotiveDiv').html(data);
		}
	});
	
}

function displayallRealestateproduct(start,iStoreCategoryId){
	var extra ='';
	extra+='&start='+start;
	extra+='&start='+start;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajmyrealestateproduct";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showRealestateDiv')){
			$('#showRealestateDiv').html(data);
		}
	});
	
}

function showPublicGeneralProduct(start,iMemberId,iStoreCategoryId)
{
	var extra ='';
	extra+='&start='+start;
	extra+='&iMemberId='+iMemberId;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajpub_general_product";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showProductId')){
			$('#showProductId').html(data);
			$('#linkstore').hide();
		}
	});
}
function showPublicClothingProduct(start,iMemberId,iStoreCategoryId)
{
	var extra ='';
	extra+='&start='+start;
	extra+='&iMemberId='+iMemberId;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajpub_clothing_product";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showProductId')){
			$('#showProductId').html(data);
			$('#linkstore').hide();
		}
	});
}
function showPublicAutomotiveProduct(start,iMemberId,iStoreCategoryId)
{
	var extra ='';
	extra+='&start='+start;
	extra+='&iMemberId='+iMemberId;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajpub_automotive_product";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showProductId')){
			$('#showProductId').html(data);
			$('#linkstore').hide();
		}
	});
}
function showPublicRealestateProduct(start,iMemberId,iStoreCategoryId)
{
	var extra ='';
	extra+='&start='+start;
	extra+='&iMemberId='+iMemberId;
	extra+='&iStoreCategoryId='+iStoreCategoryId;
	var url = site_url+"/index.php?file=a-ajpub_realestate_product";
	var pars = extra;
	$.post(url+pars,
            function(data) {
		if($('#showProductId')){
			$('#showProductId').html(data);
			$('#linkstore').hide();
		}
	});
}