$(document).ready(function () {


  $("#service_main_cat").on('change', function(){

    $("#service_sub_cat").css({'display': 'block'});
    $("#service_sub_cat option").removeAttr('selected');
    $("#service_sub_cat option:first-of-type").attr('selected', true);
    $(".service_sub_cat_opt").removeClass('active-sub-cat-opt');
    $(".sub_cat_opt_"+$(this).val()).addClass('active-sub-cat-opt');
    
  });




  $('#addNewNotificationBtnContainer button').on('click', function () {

    ToastLoading.fire({
      icon: 'info',
      html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
    });

    var form = new FormData();
    form.append('label', $("#service_label").val());
    form.append('main_cat', $("#service_main_cat").val());
    form.append('sub_cat', $("#service_sub_cat").val());
    form.append('quantity', $("#service_quantity").val());
    form.append('description', $("#add_service_desc").val());
    form.append('image', $('#service_image').prop('files')[0]);
    form.append('tags', $("#service_tags").val());
    form.append('duration', $("#service_time").val());
    form.append('requirments', $("#service_requirments").val());


    axios.post('/services/', form, {
      headers: {
        'Content-Type': 'multipart/form-data'
      },
      onUploadProgress: (progressEvent) => {
        if (progressEvent.lengthComputable) {

          console.log(progressEvent.loaded + ' ' + progressEvent.total);
          /* var progress = ((progressEvent.loaded / progressEvent.total) * 100) + '%';

          $("#edit_credit_modal .progress").addClass('d-block');

          $("#edit_credit_modal .progress > div").css({ width: progress }); */

        }
      }
    }).then(function (response) {

      console.log(JSON.stringify(response));

      if (response.data.error == 1) {

        window.Toast.fire({
          icon: 'error',
          title: response.data.message
        })


      } else {

        //$("#add_service_tab_box input, #add_service_tab_box textarea").val(null);

        Swal.fire({
          icon: 'success',
          title: 'تمت إضافة الخدمة بنجاح',
          text: 'جارى مراجعة الخدمة بواسطة الإدارة و سيتم إشعارك فور الإنتهاء',
          footer: '<div style="text-align:center;font-size:16px"><a href="/">الرئيسة &nbsp; <i class="fas fa-home"></i></a> &nbsp;&nbsp;&nbsp; <a href="/my_services">خدماتى &nbsp; <i class="fas fa-layer-group"></i></a></div>',
          confirmButtonText: 'إغلاق',
          customClass: {
            confirmButton: 'mt-3',
          },
        })


        $(".service_box input, .service_box textarea").val(null);

      

      }


    });

  });


});/* /ready() */