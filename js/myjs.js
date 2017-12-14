$(document).ready(function(){
    var amountScrolled = 300;
    
    //window loader
    /*$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
    */
     $(window).scroll(function() {
      //black overlay func
         $(".boverlay").attr('id', 'blackOverlay');
        var currentScrollTop = $(window).scrollTop();
         $('#blackOverlay').css('opacity',currentScrollTop/$('#blackOverlay').height());
         
        //back to top btn
        if ( $(window).scrollTop() > amountScrolled ) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $(".boverlay").removeAttr('id');
            $('a.back-to-top').fadeOut('slow');
	   }
      
      //slide anim func
    $(".slideanim").each(function(){
            var pos = $(this).offset().top;
            
            var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
                $(this).addClass("slide");
            }
          });
       
     });
    
    
        //back to top button
    $('a.back-to-top').click(function() {
      $('html, body').animate({
          scrollTop: 0
	       }, 700);
	   return false;
     });
    
    //banner items on hover
    $("#navhome")
        .mouseover(function() { 
            $(this).attr("src", "img/nav/navhome.png");
        })
        .mouseout(function() {
            $(this).attr("src", "img/nav/hoverhome.png");
        });
    $("#navposts")
        .mouseover(function() { 
            $(this).attr("src", "img/nav/navposts.png");
        })
        .mouseout(function() {
            $(this).attr("src", "img/nav/hoverposts.png");
        });
    $("#navtrips")
        .mouseover(function() { 
            $(this).attr("src", "img/nav/navtrips.png");
        })
        .mouseout(function() {
            $(this).attr("src", "img/nav/hovertrips.png");
        });
    $("#navprofile")
        .mouseover(function() { 
            $(this).attr("src", "img/nav/navprofile.png");
        })
        .mouseout(function() {
            $(this).attr("src", "img/nav/hoverprofile.png");
        });
    
    
    
}); 