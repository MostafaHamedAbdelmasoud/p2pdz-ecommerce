window.App = new Vue({

  el: '#app',

  data: {

  },


  methods: {


    ServiceController: function () {

      var self = this;

      return {

        addService: function () {



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

            console.log(JSON.stringify(response) );

            if (response.data.error == 1) {

              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              })


            } else {

              //$("#add_service_tab_box input, #add_service_tab_box textarea").val(null);
              
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              })

              //window.creditsTable.ajax.reload(null, false);

            }


          });



        },/* /addService() */

      }/* /return */


    },/* /ServiceController() */



  },
  /* /methods() */




  mounted: function () {

    var self = this;

    $(document).ready(function () {




    });/* /ready */

  },
  /* /mounted() */


});