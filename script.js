$(function () {

  $('#header').hide();
  $('#header').fadeIn(1000);



  $(window).scroll(function () {
    $('.effect-fade').each(function () {
      var targetElement = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > targetElement - windowHeight) {
        $(this).addClass('effect-scroll');
      }
    });
  });
});

