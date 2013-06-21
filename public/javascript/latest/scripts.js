$(document).ready(function() {
		$('.btnget,.btnlogo,.btnfeedback,.btnlearn,.btnlearnsm').append('<span class="hover"></span>').each(function () {
	  		var $span = $('> span.hover', this).css('opacity', 0);
	  		$(this).hover(function () {
	    		$span.stop().fadeTo(600, 1);
	 		}, function () {
	   	$span.stop().fadeTo(500, 0);
	  		});
		});
	});
	
	
	
	$(document).ready(function(){
		
  $("#nav > li > a").on("click", function(e){
    if($(this).parent().has("ul")) {
      e.preventDefault();
    }
    
	
	   if(!$(this).hasClass("open")) {
      // hide any open menus and remove all other classes
      $("#nav li ul").slideUp(350);
      $("#nav li a").removeClass("open");
      
      // open our new menu and add the open class
      $(this).next("ul").slideDown(350);
      $(this).addClass("open");
    }
    
    else if($(this).hasClass("open")) {
      $(this).removeClass("open");
      $(this).next("ul").slideUp(350);
    }
	
	
  });
});
	
	
	
$(document).ready(function() {
	var uli = "nav li ul"
	

if($(uli).hasClass("activepanel")) {
	$("#nav li").removeClass("open");
      // hide any open menus and remove all other classes
     $("ul.activepanel").slideDown(350);
     $("ul.activepanel").parent("li").children().addClass("open");
      // open our new menu and add the open class
      //$(this).next("ul").slideUp(350);
      //$(this).removeClass("open");
    }

else {
	
	alter("no active class");
	}
		
	});
	
$(document).ready(function() {

	$(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});



