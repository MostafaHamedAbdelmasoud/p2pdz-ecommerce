
$(window).ready(function () {

  // recalculate formsTable responsiveness because it's display attribute was none
  var users_loaded = 0;
  $("#users_tab").click(function () {
    setTimeout(function () {

      if (users_loaded == 0) {
        users_loaded = 1;
        // activate data tables
        window.usersTable = $('#all_users_table').DataTable({
          language: {
            "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
            "sLoadingRecords": "جارٍ التحميل...",
            "sProcessing": "جارٍ التحميل...",
            "sLengthMenu": "أظهر _MENU_ مدخلات",
            "sZeroRecords": "لم يعثر على أية سجلات",
            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix": "",
            "sSearch": "ابحث:",
            "sUrl": "",
            "oPaginate": {
            "sFirst": "الأول",
            "sPrevious": "السابق",
            "sNext": "التالي",
            "sLast": "الأخير"
            },
            "oAria": {
            "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
            }
          },
          responsive: true,
          "pagingType": "full_numbers",
          "pageLength": 10,
          "ajax": {
            url: "/users",
            type: 'GET',
          },
          "columnDefs": [
            { "orderable": true, "targets": 0 },
            { className: "text-center", "targets": [3] },
            { className: "no-pd", "targets": [4] },
            
          ],
          columns: [
            { data: 'id', name: 'id', 'visible': false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            {
              sortable: false,

              "render": function (data, type, full, meta) {
                var state = '';
                var changeState;
                if (full.state == 1) { changeState = 0; state = 'checked'; } else { changeState = 1; }
                return '<div style="direction:ltr;"><input onchange="App.UserController().changeState(' + full.id + ', ' + changeState + ')" id="checkbox_' + full.id + '" type="checkbox" class="checkbox" style="display:none;" ' + state + '/><label for="checkbox_' + full.id + '" class="switch" style="margin:auto;"><span class="switch__circle"><span class="switch__circle-inner"></span></span><span class="switch__left">Off</span><span class="switch__right">On</span></label></div>';

              }
            },
            

            {
              sortable: false,

              "render": function (data, type, full, meta) {
                var verified = '';
                var changeVerification;
                if (full.verified == 1) { changeVerification = 0; verified = 'checked'; } else { changeVerification = 1; }
                return '<div style="direction:ltr;"><input onchange="App.UserController().changeVerification(' + full.id + ', ' + changeVerification + ')" id="verification_checkbox_' + full.id + '" type="checkbox" class="checkbox" style="display:none;" ' + verified + '/><label for="verification_checkbox_' + full.id + '" class="switch" style="margin:auto;"><span class="switch__circle"><span class="switch__circle-inner"></span></span><span class="switch__left">NO</span><span class="switch__right">YES</span></label></div>';

              }
            },



            {
              sortable: false,

              "render": function (data, type, full, meta) {
                
                var user_type = '';

                if (full.user_type == 0) { user_type = 'مشترى'; } else if( full.user_type == 1 ) { user_type = 'بائع'; } else if( full.user_type == 10 ){ user_type = 'إدارة'; }
                return `
                <div class="user-type" onclick="App.UserController().changeAccountType(` + full.id + `, '`+  full.email  +`')">
                  `+ user_type +` | <i class="fas fa-pen"></i>
                </div>`;

              }
            },

            
            


            {
              sortable: false,
              className: "tabel-actions",
              "render": function (data, type, full, meta) {

                return '<button class="dt-btn" onclick="App.UserController().deleteUser(' + full.id + ')"  style="background-color: #f44336;"> <i class="material-icons">delete_forever</i></button><button onclick="App.ConversationController().chatWithUser(' + full.id + ',  '+ full.name +')" class="dt-btn" style="background-color: #3f51b5;"><i class="far fa-comment-dots"></i></button>';

              }
            }

          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function () {
          },
        });

      }
      usersTable.responsive.recalc();
    }, 300);
  });



})/* /window ready */