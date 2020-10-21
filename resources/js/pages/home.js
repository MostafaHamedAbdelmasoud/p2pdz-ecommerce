$(document).ready(function () {

  

  /* ************** SCROLL SKELETON START ************** */
  var lastScrollTop = 0;

  var currencies_section_scroll = 0;
  var allowCurrenciesCounters = 1;

  $(window).scroll(function (event) {
    var st = $(this).scrollTop();
    if (st > lastScrollTop) {
      /* page downscroll code */

      
     /*  if( (st > ($('#currencies-statics').offset().top - 200)) && allowCurrenciesCounters == 1){
        allowCurrenciesCounters = 0;
        //alert(allowCurrenciesCounters);
        $('#currencies-statics .count').each(function () {
          $(this).prop('Counter',0).animate({
              Counter: $(this).text()
          }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
          });
        });
      } */



      console.log('scroll going down');
    } else {
      /* page upscroll code */


      console.log('scroll going up');
    }


    // scroll detection
    lastScrollTop = st;
  });
  /* ************** SCROLL SKELETON END ************** */







});/* /ready() */


