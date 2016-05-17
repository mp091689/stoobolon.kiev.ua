$(function () {
  'use strict';

  //scroll
  $('html, body').animate({scrollTop: $('nav').offset().top}, 1500);

  //slider
  $('.jcarousel').jcarousel({
        wrap: 'circular'
      })
      .jcarouselAutoscroll({
        interval: 3000,
        target: '+=1',
        autostart: true
      });

  $('.jcarousel-prev').jcarouselControl({
    target: '-=1'
  });

  $('.jcarousel-next').jcarouselControl({
    target: '+=1'
  });

  //menu fixed
  var $menu = $("nav");
  $(window).scroll(function(){
    if ( $(this).scrollTop() > 392 && !$menu.hasClass("fixed") ){
      console.log('hi');
      $menu.addClass("fixed");
    } else
    if($(this).scrollTop() <= 392 && $menu.hasClass("fixed")) {
      $menu.removeClass("fixed");
    }
  });

});