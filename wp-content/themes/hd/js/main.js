jQuery(document).ready(function(){
  
   jQuery(window).scroll(function() {
      if(jQuery(this).scrollTop() != 0) {
          jQuery('.button-top').fadeIn();   
      } else {
          jQuery('.button-top').fadeOut();
      }
    });
    jQuery('.button-top').click(function() {
        jQuery('body,html').animate({scrollTop:0},800);
    });
  
    jQuery(".toggle-block").click(function () {
        jQuery('.toggle-mnu').toggleClass("on");
        jQuery(".menu").slideToggle();
        return false;
    });
});