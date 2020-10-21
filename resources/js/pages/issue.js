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

    axios.post('/issues/' + window.issueID + '/reply', form, {
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



    axios.get('/issues/' + window.issueID + '/new-comments', {
      params: {
        last_comment: last_comment,
      }
    })
      .then(function (response) {

        console.log( JSON.stringify(response.data.issue.state) );
        if( response.data.issue.state == 1 ){
          $("#order-footer #new-reply-container, #order-footer button, #order-footer  hr").remove();
          $("#order-footer #closed-case").removeClass('d-none');
        }

        if (response.data.error == 0) {

          if(response.data.message != ''){
            window.Toast.fire({
              icon: 'success',
              title: response.data.message,
            })
          }
          

          response.data.replies.forEach(function (el) {



            var replyImage = '';
            if (el.replyImage != '') {
              replyImage = el.replyImage;
            }


            $("#order-replies").append(`
          <div class="order-reply post partner-comment" data-comment-id="`+ el.id + `"
          data-comment-user-id="`+ el.user_id + `">
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



      }).catch((error) => {
      }).then(() => {
        // always executed
        setTimeout(checkNewComments, 1000);
      });
  }
  checkNewComments();



  /* close case */
  $("#close-case").click(function () {

    // 
    Swal.fire({
      title: "هل أنت متأكد ؟",
      text: "لن تستطيع تغير الحالة مرة آخرى !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "إغلاق",
      cancelButtonText: "إلغاء",
    }).then((result) => {
      if (result.value) {
        axios.post('/issues/' + window.issueID + '/close')
          .then(function (response) {
            if (response.data.error == 0) {

              window.Toast.fire({
                icon: 'success',
                title: response.data.message,
              })

            } else {

              window.Toast.fire({
                icon: 'error',
                title: response.data.message,
              })

            }
          });
      }
    })



  });





});/* /ready() */