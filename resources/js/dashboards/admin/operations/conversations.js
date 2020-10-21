$(document).ready(function(){
  // recalculate formsTable responsiveness because it's display attribute was none
  var conversations_loaded = 0;
  $("#conversations_tab").click(function(){
    

    setTimeout(function(){
      if(conversations_loaded==0){
        conversations_loaded=1;
        // activate data tables
     

        window.conversationsTable = $('#conversations_table').DataTable({
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
            url: "chat/conversations/admin",
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

            {data: 'from_user_id', name: 'from_user_id' },
            {data: 'to_user_id', name: 'to_user_id' },
            {data: 'created_at', name: 'created_at' },
            {
              sortable: false,
              className: "tabel-actions",
              "render": function ( data, type, full, meta ) {
                  return '<button class="dt-btn" style="background-color:#2196f3;" onclick="App.ConversationController().viewConversation('+full.id+')"><i class="fas fa-comments"></i></button>';
                /* <button class="bg-danger dt-btn" onclick="App.AdController().deleteAd('+full.id+')"><i class="material-icons">delete_forever</i></button> */
              }
            },
  
  
          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function() {
          },
        });
      }
      conversationsTable.responsive.recalc();
    }, 300);
    
  });


 

  
  

  

})/* /window ready */