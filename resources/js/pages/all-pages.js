$(document).ready(function () {










  $('#open-fixed-menu').on('click', function (e) {
    e.stopPropagation();
    $("#fixed-menu").addClass('visible-fixed-menu');
    $(window).click(function () {
      $("#fixed-menu").removeClass('visible-fixed-menu');
    });
  });

  $('#close-fixed-menu').on('click', function () {
    $("#fixed-menu").removeClass('visible-fixed-menu');
  });

  $('#fixed-menu').on('click', function (e) {
    e.stopPropagation();
  });


  $("#fixed-menu .one-tab").click(function () {
    $("#fixed-menu").removeClass('visible-fixed-menu');
  });







  $("#side-nav-money").click(function () {
    var el = $("#currencies_offers").offset().top;
    window.scroll({ top: el, left: 0, behavior: "smooth" });
  });

  $("#side-nav-phone").click(function () {
    var el = $("#credit_offers").offset().top;
    window.scroll({ top: el, left: 0, behavior: "smooth" });
  });


  $("#know-more, #side-nav-about").click(function () {
    var el = $("#about-site").offset().top;
    window.scroll({ top: el, left: 0, behavior: "smooth" });
  });
  $("#wide-nav-contact, #side-nav-contact").click(function (e) {
    e.preventDefault();
    var el = $("#ft-social").offset().top;
    window.scroll({ top: el, left: 0, behavior: "smooth" });
  });

  $("#wide-nav-packs, #side-nav-packs, #fixed-menu-packs").click(function (e) {
    e.preventDefault();
    var el = $("#packages-section").offset().top;
    window.scroll({ top: el, left: 0, behavior: "smooth" });
  });


  $("#go-up, #goUpMini").click(function () {
    window.scroll({ top: 0, left: 0, behavior: "smooth" });
  });







  $("#wide-nav-notification a").click(function (e) {
    e.stopPropagation();
    e.preventDefault();

    $("#notifications-wrapper").fadeToggle();

    $(window).click(function () {
      $("#notifications-wrapper").fadeOut();
    });



    $("#notifications-wrapper").html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');


    axios.get('/user/notifications/')
      .then(function (response) {
        $("#notifications-wrapper").html('');
        if (response.data.error == 0) {
          
          response.data.notifications.forEach(function(el){

            var notificationIcon = '<i class="fas fa-bell"></i>';
            if(el.seen > 0){
              var notificationIcon = '<i class="far fa-bell"></i>';
            }

            $("#notifications-wrapper").append(`
            
            <div class="one-notification notification-btn" data-notification-id="`+el.id+`">
                <div class="notification-icon">`+notificationIcon+`</div>
                <div class="notification-text">`+el.content+`</div>
                <div class="loading-notification"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
            </div>

            `);
          });


          $("#notifications-wrapper").append(`
            
            <div class="notifications-center">
                <a href="/notifications-center">مركز الإشعارات &nbsp; <i class="far fa-flag"></i></a>
            </div>

          `);

          openNotification();

        } else {

          $("#notifications-wrapper").append(`
          
            <div class="notifications-center" style="color: #d64535;border-bottom: 1px dashed #DDD;">
                لا يوجد إشعارات
            </div>

            <div class="notifications-center">
                <a href="/notifications-center">مركز الإشعارات &nbsp; <i class="far fa-flag"></i></a>
            </div>

          `);

        }
      });

  });



  function openNotification(){

    $(".notification-btn").off('click');

    $(".notification-btn").click(function(e){

      var notificationRow = $(this);
      notificationRow.find('.loading-notification').addClass('loading-notification-active');

      e.stopPropagation();
      var notificationID = $(this).attr('data-notification-id');
      
      axios.get('/user/notifications/'+notificationID)
      .then(function (response) {
     
        $('.loading-notification').removeClass('loading-notification-active');
        if (response.data.error == 0) {

          notificationRow.find('.notification-icon').html('<i class="far fa-bell"></i>');

          console.log( JSON.stringify(response.data.message) );

          Swal.fire({
            confirmButtonText: 'إغلاق',
            html: response.data.message.content ,
            customClass: {
              content: 'py-5',
              header: 'd-none',
              
            },
          })


          $(".swal2-container").click(function(e){
            e.stopPropagation();
          })

        }
      });


    })

  }
 




});/* /doc ready */