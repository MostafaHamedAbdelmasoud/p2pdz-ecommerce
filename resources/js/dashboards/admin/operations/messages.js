$(window).ready(function(){
    
    // recalculate formsTable responsiveness because it's display attribute was none
    var messages_loaded = 0;
    $("#messages_tab").click(function(){
      if(messages_loaded==0){
        messages_loaded=1;
        // activate data tables
        window.messagesTable = $('#all_messages_table').DataTable({
          responsive: true,
          "pagingType": "full_numbers",
          "pageLength": 10,
          "ajax": {
            url: "/messages",
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
            {data: 'user', name: 'user' },
            {data: 'content', name: 'content' },
            {data: 'seen', name: 'seen' },
            {data: 'created_at', name: 'created_at' },
            
            {
              sortable: false,
              className: "tabel-actions",
              "render": function ( data, type, full, meta ) {
                  return '<button class="bg-danger dt-btn" onclick="App.MessageController().deleteMessage('+full.id+')"><i class="material-icons">delete_forever</i></button>';

              }
            },


          ],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function() {
          },
        });
      }
        messagesTable.responsive.recalc();
    });


   

    
    

    

  })/* /window ready */