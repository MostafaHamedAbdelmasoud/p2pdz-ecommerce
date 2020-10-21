$(document).ready(function () {

  $('#send-image').on('click', function () {
    $("#attachment").toggleClass('open-attachment');
    $('#customFile').val(null);
    $(".custom-file-label").text('إختر صورة');
  });

  $('#customFile').on('change', function () {
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
  });




  /* add reply */
  $("#send-reply").click(function () {

    ToastLoading.fire({
      icon: 'info',
      html: '&nbsp; برجاء الإنتظار<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
    });



    $("#reply-progress").css({ width: '0%' });
    $("#progress").fadeIn();

    var reply = $("#reply").val();

    var form = new FormData();
    form.append('image', $('#customFile').prop('files')[0]);
    form.append('reply', reply);

    axios.post('/orders/' + window.orderID + '/reply', form, {
      headers: {
        'Content-Type': 'multipart/form-data'
      },
      onUploadProgress: (progressEvent) => {
        if (progressEvent.lengthComputable) {

          //console.log(progressEvent.loaded + ' ' + progressEvent.total);
          var progress = ((progressEvent.loaded / progressEvent.total) * 100) + '%';

          //$("#add_currency_modal .progress").addClass('d-block');

          $("#reply-progress").css({ width: progress });

        }
      }
    }).then(function (response) {

      $("#reply-progress").css({ width: '0%' });
      $("#progress").fadeOut();

      if (response.data.error == 0) {

        window.Toast.fire({
          icon: 'success',
          title: response.data.message,
        })

        var replyImage = '';
        if (response.data.replyImage != '') {
          replyImage = response.data.replyImage;
        }


        $("#order-replies").append(`
        <div class="order-reply post">
          <div class="order-reply-user">
              <div class="post-user-image">
                <div class="post-image-circle">
                  <img
                    src="`+ response.data.image + `"
                    alt="">
                </div>
              </div>
              <div class="">
                <p>`+ response.data.user + `</p>
                <p>`+ response.data.time + `</p>
              </div>
            </div>
            <!-- /.order-reply-user -->

            <div class="order-reply-text">
              `+ response.data.comment + `
            </div>
            `+ replyImage + `
          </div>
        </div>
        `);

        $("#reply").val(null);
        $('#customFile').val(null);
        $(".custom-file-label").text('إختر صورة');

      } else {

        window.Toast.fire({
          icon: 'error',
          title: response.data.message,
        })

      }
    });

  });










  /* check partner new comments */
  function checkNewComments() {

    var partner_id = window.partnerID;

    if ($(".partner-comment").length > 0) {
      var last_comment = $(".partner-comment").last().attr('data-comment-id');
    } else {
      var last_comment = 0;
    }



    axios.get('/orders/' + window.orderID + '/new-comments', {
      params: {
        partner_id: partner_id,
        last_comment: last_comment,
        order_state: window.orderState,
      }
    })
      .then(function (response) {




        if (response.data.error == 0) {

          if (response.data.replies.length > 0) {

            window.Toast.fire({
              icon: 'success',
              title: response.data.message,
            })

            response.data.replies.forEach(function (el) {



              var replyImage = '';
              if (el.replyImage != '') {
                replyImage = el.replyImage;
              }


              $("#order-replies").append(`
  
                <div class="order-reply post partner-comment" data-comment-id="`+ el.id + `"
                data-comment-user-id="`+ partner_id + `">
                  <div class="order-reply-user">
                      <div class="post-user-image">
                        <div class="post-image-circle">
                          <img
                            src="`+ el.image + `"
                            alt="">
                        </div>
                      </div>
                      <div class="">
                        <p>`+ el.user + `</p>
                        <p>`+ el.time + `</p>
                      </div>
                    </div>
                    <!-- /.order-reply-user -->
        
                    <div class="order-reply-text">
                      `+ el.comment + `
                    </div>
                    `+ replyImage + `
                  </div>
                </div>
              `);

            });

          }



          if (window.userID != window.serviceUserID) {
            if (response.data.state != window.orderState) {

              

              if (response.data.state == 2) {
                var message = 'تم إنهاء الطلب بواسطة البائع';
                var icon = 'success';
                $("#order-td-state").text('إنتهى');
              }
              if (response.data.state == 3) {
                var message = 'تم إلغاء الطلب بواسطة البائع';
                var icon = 'warning';
                $("#order-td-state").text('ملغى');
              }

              Swal.fire(
                'تغيرت حالة الطلب',
                message,
                icon
              )

              window.orderState = response.data.state;

            }
          }


        }



      }).catch((error) => {
      }).then(() => {
        // always executed
        setTimeout(checkNewComments, 1000);
      });
  }
  checkNewComments();











  /* rate the order */
  $(".star").click(function () {

    var rate = parseInt($(this).attr('id').split('-')[1]);

    ToastLoading.fire({
      icon: 'info',
      html: '&nbsp; برجاء الإنتظار<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
    });


    axios.post('/orders/' + window.orderID + '/rate', {
      rate: rate,
    }).then(function (response) {
      if (response.data.error == 0) {

        window.Toast.fire({
          icon: 'success',
          title: response.data.message,
        });


        var newRate = '';
        var starClass = '';
        var i;
        for (i = 1; i <= 5; i++) {

          if (rate >= i) {
            starClass = 'active-star';
          } else {
            starClass = '';
          }

          newRate += '<i class="fas fa-star ' + starClass + ' rated-star"></i>'

        }

        $("#stars").html(newRate);



        Swal.fire({
          title: 'هل تود إضافة تعليق على الخدمة ؟',
          text: "إضافة تعليق يساعد المشترون الجدد فى تحديد جودة الخدمة",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم, إضافة تعليق!'
        }).then((result) => {
          if (result.value) {

            Swal.fire({
              position: 'center-center',
              icon: 'success',
              title: 'جارى تحويلك لخدمة',
              showConfirmButton: false,
              timer: 1500
            })

            window.location.href = "/services/" + window.serviceID + "/" + window.serviceLabel + "?action=new-comment";


          }
        })



      } else {

        window.Toast.fire({
          icon: 'error',
          title: response.data.message,
        })

      }
    });


  });




  $("#report-btn").click(function () {

    Swal.fire({
      title: "تقديم شكوى",
      showCancelButton: true,
      confirmButtonText: 'إرسال <i class="far fa-paper-plane"></i>',
      cancelButtonText: "إلغاء",
      customClass: {
        confirmButton: 'btn btn-success btn-lg mx-2',
        cancelButton: 'btn btn-danger btn-lg mx-2',
      },
      buttonsStyling: false,
      showLoaderOnConfirm: true,
      html:
        `
      <div id="post_issue">
        <textarea class="form-control" style="text-align:justify;min-height:100px;margin-bottom:15px;font-size:16px;padding:10px;" id="post_issue_textarea" placeholder="قم بكتابة الشكوى هنا بشكل مفصل"></textarea>
      </div>
      `,
      preConfirm: () => {


        if (!$("#post_issue_textarea").val()) {
          Swal.showValidationMessage('بعض الحقول مطلوبة');
        } else {

          return axios.post('/orders/' + window.orderID + '/issue', {
            issue: $("#post_issue_textarea").val(),
          })
            .then(function (response) {

              if (response.data.error == 1) {
                throw new Error(response.data.message)
              }
              return response.data;
            }).catch(error => {
              Swal.showValidationMessage(
                `${error}`
              )
            });
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {

      if (result.value) {
        if (result.value.error == 1) {

          window.Toast.fire({
            icon: 'error',
            title: result.value.message
          })


        } else {
          window.Toast.fire({
            icon: 'success',
            title: result.value.message
          })

        }
      }


    })
    $("#post_issue_textarea").focus();
  });





  $('#endOrder').on('click', function () {
    Swal.fire({
      title: "هل أنت متأكد ؟",
      text: "لن تتمكن من تغيير الحالة مرة آخرى",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "إلغاء",
      confirmButtonText: "إستمرار",
    }).then((result) => {
      if (result.value) {
        axios.put('/orders/' + window.orderID + '/state', {
          newState: 2,
        })
          .then(function (response) {
            if (response.data.error == 0) {

              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              })

              $(".order-state-btn").removeClass('active-seller-state');
              $("#endOrder").addClass('active-seller-state');

            } else {

              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              })

            }
          });
      }
    })
  });

  $('#cancelOrder').on('click', function () {
    Swal.fire({
      title: "هل أنت متأكد ؟",
      text: "لن تتمكن من تغيير الحالة مرة آخرى",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "إلغاء",
      confirmButtonText: "إستمرار",
    }).then((result) => {
      if (result.value) {
        axios.put('/orders/' + window.orderID + '/state', {
          newState: 3,
        })
          .then(function (response) {
            if (response.data.error == 0) {

              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              })

              $(".order-state-btn").removeClass('active-seller-state');
              $("#cancelOrder").addClass('active-seller-state');

            } else {

              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              })

            }
          });
      }
    })
  });


});/* /ready() */