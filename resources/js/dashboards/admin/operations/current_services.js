$(window).ready(function(){
    
  // recalculate formsTable responsiveness because it's display attribute was none
  var current_services_loaded = 0;
  $("#current_services_tab").click(function(){
    setTimeout(function(){
      if(current_services_loaded==0){
        current_services_loaded=1;
        // activate data tables
        window.currentServicesTable = $('#current_services_table').DataTable({
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
            url: "/services",
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
                  return '<img src="'+full.image+'" />';
  
              }
            },
            {data: 'user', name: 'user' },
            {data: 'description', name: 'description' },
            {data: 'created', name: 'created' },
            
            {
              sortable: false,

              "render": function (data, type, full, meta) {
                var availability = '';
                var changeAvailability;
                if (full.availability == 1) { changeAvailability = 0; availability = 'checked'; } else { changeAvailability = 1; }
                return '<div style="direction:ltr;"><input onchange="App.ServiceController().changeAvailability(' + full.id + ', ' + changeAvailability + ')" id="availability_checkbox_' + full.id + '" type="checkbox" class="checkbox" style="display:none;" ' + availability + '/><label for="availability_checkbox_' + full.id + '" class="switch" style="margin:auto;"><span class="switch__circle"><span class="switch__circle-inner"></span></span><span class="switch__left">OFF</span><span class="switch__right">ON</span></label></div>';

              }
            },

            {
              sortable: false,
              className: "tabel-actions",
              "render": function ( data, type, full, meta ) {
                  return `<button class="bg-primary dt-btn" onclick="App.ServiceController().editService('`+full.id+`', 'current_services_tab')"><i class="material-icons">visibility</i></button>`;
  
              }
            },
  
            
          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function() {
          },
        });
      }
      currentServicesTable.responsive.recalc();
    }, 300);
    
  });


 

  
  

  

})/* /window ready */