// loadMessages function is user only ( not admin )
        // loadMessages function does all the work for fetching messages ( normal load / load new / load previous )
        loadMessages: function(loadPrevious){
          var self = this;

          // check if this run is for loading previous messages or just ( normal / new )
          if( (typeof loadPrevious !== 'undefined' ? loadPrevious : false) ){
            // previous messages loading / check if there is no previous requests to load previous messages
            if(this.loadPreviousMessages){
              // no previous axios request now disable the ability to make new requests , if the user scrolled to bottom will be activated later when this request finish
              this.loadPreviousMessages = false;
              axios.get('/messages/',{
                params: {
                  previous_messages : true,
                  account_type      : 'user',
                  bottom_message    : parseInt($(".header-message-row:last-of-type").data('id'), 10),
                }
              })
              .then(function (response) {
                if(response.data.data.length){
                  for (var i = 0; i < response.data.data.length; i++) {
                    $("#messagesWrapper .simplebar-content").append('<div data-id="'+response.data.data[i].id+'" class="header-message-row '+response.data.data[i].seen_class+'"><div class="messageSeenIcon">'+response.data.data[i].seen_icon+'</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>'+response.data.data[i].content+'</div></div></div>');
                  }
                  // reactivate the ability to make new requests for loading previous messages
                  self.loadPreviousMessages = true;
                } else {
                  $("#messagesWrapper .simplebar-content").append('<p class="p-3 text-danger">No more Messages found.</p>');
                }
                // set new messages counter
                $(".messagesCounter").text(response.data.number_of_unseen_messages);
                // reactivate open messages click event
                $(".header-message-row").off('click');
                $(".header-message-row").click(function(){
                  self.openMessage($(this).data('id'));
                });
              })
              /* /axios */
            }
            
          } else {
            
            // normal messages loading
            axios.get('/messages/',{
              params: {
                previous_messages : false,
                account_type      : 'user',
                top_message       : (parseInt($(".header-message-row:first-of-type").data('id'), 10)) ? parseInt($(".header-message-row:first-of-type").data('id'), 10) : 0,
                first_load        : $("#messagesWrapper .simplebar-content").is(':empty'),
              }
            })
            .then(function (response) {
              // remove first loading animation if exists
              $(".messagesWrapperLoading").css('display', 'none');


              // check to see if this is the first load or not
              if($("#messagesWrapper .simplebar-content").is(':empty')){
                if(response.data.data.length){
                  $("#messagesWrapper .simplebar-content").html('');
                  for (var i = 0; i < response.data.data.length; i++) {
                    $("#messagesWrapper .simplebar-content").append('<div data-id="'+response.data.data[i].id+'" class="header-message-row '+response.data.data[i].seen_class+'"><div class="messageSeenIcon">'+response.data.data[i].seen_icon+'</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>'+response.data.data[i].content+'</div></div></div>');
                  }
                  // activate load Previous messages
                  $('#messagesWrapper .simplebar-content-wrapper').on('scroll', function() {
                    if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                      self.loadMessages(true); // true = Previous messages = key for the same functions that fetchs messages
                    }
                  })
                } else {
                  $("#messagesWrapper .simplebar-content").html('<p class="p-3 text-danger">No Messages found.</p>');
                }
              } else {
                // not the first load // reverse
                if(response.data.data.length){
                  for (var i = 0; i < response.data.data.length; i++) {
                    $("#messagesWrapper .simplebar-content").prepend('<div data-id="'+response.data.data[i].id+'" class="header-message-row '+response.data.data[i].seen_class+'"><div class="messageSeenIcon">'+response.data.data[i].seen_icon+'</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>'+response.data.data[i].content+'</div></div></div>');
                  }
                }
              }
              // set new messages counter
              $(".messagesCounter").text(response.data.number_of_unseen_messages);
              // reactivate open message click event
              $(".header-message-row").off('click');
              $(".header-message-row").click(function(){
                self.openMessage($(this).data('id'));
              });
            }).catch((error) => {
                // error
            }).then(() => {
                // always executed
                setTimeout(function(){
                  //self.loadMessages();
                }, 10000);
            });
            /* /axios */
          }
          
          
        },/* /loadMessages() */
