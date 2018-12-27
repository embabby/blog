$(document).ready(function(){
  $('.checker').on('click',function(){
    $('.fixed_menu').toggleClass('isVisible');
    if ($('.fixed_menu').hasClass('isVisible')) {
      $('.fixed_menu').animate({
        left: 0
      },500);
      $('body').animate({
        paddingLeft: '30%'
      },500);
    } else {
      $('.fixed_menu').animate({
        left: '-30%'
      },500);
      $('body').animate({
        paddingLeft: 0
      },500);
    }
  });

  $('.fixed_menu button').each(function() {
    $(this).prepend('<span></span>');
  });

  $('.border-left').on('hover',function () {
    $(this).find('span').eq(0).animate({
      width: '100%'
  },400);
  },function () {
    $(this).find('span').eq(0).animate({
      width: 0
    },400);
  });


  $('.add-product .nav-item').on('click', function(){
    /*
    var cityname = $(this).children().data('lan');
    var act = $('.nav-item.active a').data('lan');
    */
    $(this).addClass('active').siblings().removeClass('active');
/*
    $('.'+cityname).show();
    $('.'+act).hide();
*/    
  });

  var navH = $('nav.navbar-light').innerHeight()+$('section.head').innerHeight(),
      footerH = $('footer').innerHeight();
      winH= $(window).height();
  $('#Slider1, .carousel-inner, .carousel-item').height(winH - navH);
  // $('.login, .contact\\').height(winH - (navH + footerH));
    // console.log(footerH);

});