// loadNotifications function is user only ( not admin )
        // loadNotifications function does all the work for fetching notifications ( normal load / load new / load previous )
        loadNotifications: function(loadPrevious){
   
            var self = this;
  
            // check if this run is for loading previous notifications or just ( normal / new )
            if( (typeof loadPrevious !== 'undefined' ? loadPrevious : false) ){
  
              // previous notifications loading / check if there is no previous requests to load previous notifications
              if(this.loadPreviousNotifications){
                // no previous axios request now disable the ability to make new requests if the user scrolled to bottom will be activated later when this request finish
                this.loadPreviousNotifications = false;
  
                axios.get('/notifications/',{
                  params: {
                    previous_notifications : true,
                    account_type           : 'user',
                    bottom_notification    : parseInt($(".header-notification-row:last-of-type").data('id'), 10),
                  }
                })
                .then(function (response) {
  
  
                  if(response.data.data.length){
  
                    for (var i = 0; i < response.data.data.length; i++) {
                      $("#notificationsWrapper .simplebar-content").append('<div data-id="'+response.data.data[i].id+'" class="header-notification-row '+response.data.data[i].seen_class+'"><div class="notificationSeenIcon">'+response.data.data[i].seen_icon+'</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>'+response.data.data[i].content+'</div></div></div>');
                    }
                    // reactivate the ability to make new requests for loading previous notifications
                    self.loadPreviousNotifications = true;
                  } else {
                    $("#notificationsWrapper .simplebar-content").append('<p class="p-3 text-danger">No more Notifications found.</p>');
                  }
  
                  // set new notifications counter
                  $(".notificationsCounter").text(response.data.number_of_new_notifications);
                  // reactivate open notification click event
                  $(".header-notification-row").off('click');
                  $(".header-notification-row").click(function(){
                    self.openNotification($(this).data('id'));
                  });
                })
                /* /axios */
                
              }
              
            } else {
              
              // normal notification loading
              axios.get('/notifications/',{
                params: {
                  previous_notifications : false,
                  account_type           : 'user',
                  top_notification       : (parseInt($(".header-notification-row:first-of-type").data('id'), 10)) ? parseInt($(".header-notification-row:first-of-type").data('id'), 10) : 0,
                  first_load             : $("#notificationsWrapper .simplebar-content").is(':empty'),
                }
              })
              .then(function (response) {
                
                // remove first loading animation if exists
                $(".notificationsWrapperLoading").css('display', 'none');
  
                // check to see if this is the first load or not
                if($("#notificationsWrapper .simplebar-content").is(':empty')){
                  if(response.data.data.length){
                    
                    for (var i = 0; i < response.data.data.length; i++) {
                      $("#notificationsWrapper .simplebar-content").append('<div data-id="'+response.data.data[i].id+'" class="header-notification-row '+response.data.data[i].seen_class+'"><div class="notificationSeenIcon">'+response.data.data[i].seen_icon+'</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>'+response.data.data[i].content+'</div></div></div>');
                    }
  
                    // activate load Previous notifications
                    $('#notificationsWrapper .simplebar-content-wrapper').on('scroll', function() {
                      if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                        self.loadNotifications(true); // true = Previous notifications = key for the same functions that fetchs notifications
                      }
                    })
  
                  } else {
                    $("#notificationsWrapper .simplebar-content").html('<p class="p-3 text-danger">No Notifications found.</p>');
                  }
                } else {
  
      
                  // not the first load
                  if(response.data.data.length){
                    for (var i = 0; i < response.data.data.length; i++) {
                      $("#notificationsWrapper .simplebar-content").prepend('<div data-id="'+response.data.data[i].id+'" class="header-notification-row '+response.data.data[i].seen_class+'"><div class="notificationSeenIcon">'+response.data.data[i].seen_icon+'</div><div><div class="notificationAndMessageloadingAnimation"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div><div>'+response.data.data[i].content+'</div></div></div>');
                    }
                  }
                }
  
                // set new notifications counter
                $(".notificationsCounter").text(response.data.number_of_new_notifications);
                // reactivate open notification click event
                $(".header-notification-row").off('click');
                $(".header-notification-row").click(function(){
                  self.openNotification($(this).data('id'));
                });
  
              }).catch((error) => {
                  // error
              }).then(() => {
                  // always executed
                  setTimeout(function(){
                    self.loadNotifications();
                  }, 5000);
              });
              /* /axios */
            }
  
  
            
            
          },/* /loadNotifications() */
  
  