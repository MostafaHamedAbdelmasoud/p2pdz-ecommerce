$(window).ready(function(){
    
  // recalculate formsTable responsiveness because it's display attribute was none
  var credits_loaded = 0;
  $("#credits_tab").click(function(){
    setTimeout(function(){
      if(credits_loaded==0){
        credits_loaded=1;
        // activate data tables
        window.creditsTable = $('#credits_table').DataTable({
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
            url: "/credits",
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
            {
              sortable: false,
              "render": function ( data, type, full, meta ) {
                  return '<img src="'+full.icon+'" />';
  
              }
            },
            {data: 'title', name: 'title' },
            {
              sortable: false,
              className: "tabel-actions",
              "render": function ( data, type, full, meta ) {
                  return '<button class="bg-primary dt-btn" onclick="App.CreditController().editCredit('+full.id+', \''+full.title+'\')"><i class="material-icons">edit</i></button><button class="bg-danger dt-btn" onclick="App.CreditController().deleteCredit('+full.id+')"><i class="material-icons">delete_forever</i></button>';
  
              }
            },
  
  
          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function() {
          },
        });
      }
      creditsTable.responsive.recalc();
    }, 300);
    
  });


 

  
  

  

})/* /window ready */