$(window).ready(function(){
    
  // recalculate formsTable responsiveness because it's display attribute was none
  var meta_tags_loaded = 0;
  $("#seo_tab").click(function(){
    setTimeout(function(){
      if(meta_tags_loaded==0){
        meta_tags_loaded=1;
        // activate data tables
        window.metaTagsTable = $('#meta_tags_table').DataTable({
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
            url: "/meta_tags",
            type: 'GET',
            "data": {
              account_type : 'admin',
            },
          },
          "columnDefs": [
            { "orderable": true, "targets": 0 },
          ],
          columns: [
              
            {data: 'id', name: 'id', 'visible': false},
            {data: 'meta_tag', name: 'meta_tag' },
            
            {
              sortable: false,
              className: "tabel-actions",
              "render": function ( data, type, full, meta ) {
                  return '<button class="bg-primary dt-btn" onclick="App.MetaTagController().editMeta('+full.id+')"><i class="material-icons">edit</i></button><button class="bg-danger dt-btn" onclick="App.MetaTagController().deleteMeta('+full.id+')"><i class="material-icons">delete_forever</i></button>';
  
              }
            },
  
  
          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function() {
          },
        });
      }
      metaTagsTable.responsive.recalc();
    }, 300);
    
  });


 

  
  

  

})/* /window ready */