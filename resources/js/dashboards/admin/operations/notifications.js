$(window).ready(function () {

  // recalculate formsTable responsiveness because it's display attribute was none
  var notifications_loaded = 0;

  $("#notifications_tab").click(function () {
    if (notifications_loaded == 0) {
      notifications_loaded = 1;
      // activate data tables
      window.notificationsTable = $('#all_notifications_table').DataTable({
        responsive: true,
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
        "pagingType": "full_numbers",
        "pageLength": 10,
        "ajax": {
          url: "/notifications/",
          "data": {
            account_type: 'admin',
          },
          type: 'GET',
        },
        "columnDefs": [
          { targets: [0], orderable: true },
        ],
        columns: [

          { data: 'id', name: 'id', 'visible': false },
          { data: 'content', name: 'content' },
          { data: 'count', name: 'count' },
          { data: 'views', name: 'views' },
          { data: 'created_at', name: 'created_at' },

          {
            sortable: false,
            className: "tabel-actions",
            "render": function (data, type, full, meta) {
              return '<button class="bg-primary dt-btn" onclick="App.NotificationController().editNotification(\'' + full.delete_token + '\')"><i class="material-icons">edit</i></button><button class="bg-danger dt-btn" onclick="App.NotificationController().deleteNotification(\'' + full.delete_token + '\')"><i class="material-icons">delete_forever</i></button>';

            }
          },

          {
            sortable: false,
            className: "tabel-actions",
            "render": function (data, type, full, meta) {

              // if(!full.sent){
                console.log('this is sent '+full.sent);
                return '<button class="bg-success dt-btn" onclick="App.NotificationController().emailNotification(\'' + full.id + '\')"><i class="fas fa-envelope-open"></i></button>';
              // }else{
                // return '';
              // }

            }
          },


        ],
        "order": [[0, "desc"]],
        "deferRender": true,
        "initComplete": function () {
        },
      });
    }
    notificationsTable.responsive.recalc();
  });









})/* /window ready */