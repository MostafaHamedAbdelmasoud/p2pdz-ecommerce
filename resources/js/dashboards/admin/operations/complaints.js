
$(window).ready(function () {

  // recalculate formsTable responsiveness because it's display attribute was none
  var issues_loaded = 0;
  $("#support_tab").click(function () {
    setTimeout(function () {

      if (issues_loaded == 0) {
        issues_loaded = 1;
        // activate data tables
        window.issuesTable = $('#complaints_table').DataTable({
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
            url: "/issues",
            type: 'GET',
          },
          "columnDefs": [
            { "orderable": true, "targets": 0 },
            { className: "text-center", "targets": [3] },
            { className: "no-pd", "targets": [4] },
            
          ],
          columns: [
            { data: 'id', id: 'id', 'visible': false },
            { data: 'user', user: 'name' },
            { data: 'complaint', name: 'complaint' },
            { data: 'state', name: 'state' },
            { data: 'time', name: 'time' },
           


            {
              sortable: false,
              className: "tabel-actions",
              "render": function (data, type, full, meta) {

                return `
                <a target="_blank" href="complaints/`+full.id+`" class="dt-btn bg-primary"  style="background-color: ;">
                  <i class="fas fa-external-link-square-alt"></i>
                </a>
                <button class="dt-btn" onclick="App.ComplaintController().deleteComplaint(`+full.id+`)"  style="background-color: #f44336;">
                <i class="material-icons">delete_forever</i></button>`;

              }
            }

          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function () {
          },
        });

      }
      issuesTable.responsive.recalc();

      setInterval( function () {
        window.issuesTable.ajax.reload( null, false ); // user paging is not reset on reload
      }, 2000 );


    }, 300);
  });



})/* /window ready */