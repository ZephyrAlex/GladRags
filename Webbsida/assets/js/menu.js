jQuery(document).ready(function(){ 
    
    var navOffSet = jQuery(".logga").offset().top;
    
    //jQuery(".menu-placeholder").height(jQuery(".menu-trigger").outerHeight());
    
    
    jQuery(window).scroll(function(){
        var scrollPos = jQuery(window).scrollTop();
        
        if (scrollPos >= 50){
            jQuery(".logga").addClass("fixed1");
        } else {
            jQuery(".logga").removeClass("fixed1");
        }
        
    });
    
});