$(document).ready(function () {

  window.chatLoader = function () {
    return '<div class="chat-loader"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>';
  }

  window.perfectScrollInit = function (element) {
    return new PerfectScrollbar(element, {
      wheelSpeed: 1,
      wheelPropagation: false,
      minScrollbarLength: 20
    });
  }




  /* open sub conversation */
  window.active_sub_chat = 0;
  window.active_sub_chat_refresh_timer = 1000;
  window.active_sub_chat_handler;
  window.activeSubConversation = document.querySelector('#active-sub-conversation-replies');



  /* load conversations */
  window.conversationsContainer = document.querySelector('#conversations-container');
  window.conversations_container_handler;
  window.loadConversations = function () {

    if (window.userID > 0) {
      $("#conversations-rows").html(window.chatLoader());
      axios.get('/chat/conversations')
        .then(function (response) {

          //console.log(JSON.stringify(response.data));

          if (response.data.conversations != '') {
            $("#conversations-rows").html(response.data.conversations);
            openConversation();
          } else {
            $("#conversations-rows").html('<div class="no-conversations-found">لا يوجد محادثات</div>');
          }


          if (window.conversations_container_handler) {
            window.conversations_container_handler.update();
          } else {
            window.conversations_container_handler = perfectScrollInit(window.conversationsContainer);
            window.conversationsContainer.addEventListener('ps-y-reach-end', function () {
              window.loadMoreConversations();
            });
          }


          window.checkForNewConversations();

        });
      /* /axios */
    }


  }
  window.loadConversations();











  // load more conversations
  window.loadMoreConversationsInProgress = 0;
  window.loadMoreConversations = function () {


    if (window.loadMoreConversationsInProgress == 0) {

      window.loadMoreConversationsInProgress = 1;
      var last_conversation = $("#conversations-rows .conversation-row:last-of-type");

      axios.get('/chat/conversations/', {
        params: {
          last_conversation_id: last_conversation.attr('data-conversation-id'),
          last_conversation_row_id: last_conversation.attr("data-conversation-row-id")
        }
      })
        .then(function (response) {


          //console.log(JSON.stringify(response.data.conversations));

          var currentScroll = window.activeConversation.scrollHeight;

          if (response.data.conversations != '') {
            window.loadMoreConversationsInProgress = 0;
            $("#conversations-rows").append(response.data.conversations);
            openConversation();
          } else {
            $("#conversations-rows").append("<p class='no-previous-conversations'>إنتهت المحادثات</p>");
          }

          window.conversations_container_handler.update();




        });
      /* /axios */

    }

  }/* /loadMoreConversations() */



  window.checkForNewConversationsHandler;
  window.checkForNewConversations = function () {

    var top_conversation = $("#conversations-rows .conversation-row:first-of-type");

    axios.get('/chat/conversations', {
      params: {
        top_conversation_id: top_conversation.attr('data-conversation-id'),
        top_conversation_row_id: top_conversation.attr("data-conversation-row-id")
      }
    })
      .then(function (response) {

        $("#toggleChat-counter").text(response.data.countUnread);
        $("#notifications-counter > div").text(response.data.countNotifications);

        console.log(response.data.conversations_ids_array);

        if (response.data.conversations != '') {

          response.data.conversations_ids_array.forEach(function (conversation_row) {
            $('.conversation-row[data-conversation-id="' + conversation_row + '"]').remove();
          });
          $("#conversations-rows").prepend(response.data.conversations);

          openConversation();


          if (loadMoreConversationsInProgress == 0) {
            loadMoreConversationsInProgress = 1;
            window.conversations_container_handler.update();
            loadMoreConversationsInProgress = 0;
          } else {
            window.conversations_container_handler.update();
          }


        }



      }).catch((error) => {
      }).then(() => {
        // always executed
        checkForNewConversationsHandler = setTimeout(checkForNewConversations, 5000);
      });
    /* /axios */

  }/* /checkForNewConversations() */






































  /* open conversation */
  window.active_chat = 0;
  window.active_chat_refresh_timer = 1000;
  window.active_chat_handler;
  window.activeConversation = document.querySelector('#active-conversation');
  window.openConversation = function () {

    $(".conversation-row").off('click');
    $(".conversation-row").click(function () {



      // /////////////////////

      var partner_id = $(this).attr('data-partner-id');
      var conversation_id = $(this).attr('data-conversation-id');

      $("#active-conversation-container .chat-header-label .chat-header-label-text").html($(this).find('.conversation-row-partner-name').text());



      if (conversation_id == $('#active-conversation').attr('data-active-conversation-id')) {
        window.active_chat = conversation_id;
        $("#active-conversation-container").addClass('visible');
      } else {
        $("#active-conversation-container").addClass('visible');
        $("#active-conversation-replies").html(chatLoader());
        window.loadConversation(conversation_id, partner_id, 'widget');
      }







    });
  }/* /openConversation() */










  window.loadingConversationInPRogress = 0;
  window.loadConversation = function (conversation_id, partner_id, source, adminLocation) {

    adminLocation = typeof adminLocation !== 'undefined' ? adminLocation : true;

    if (window.loadingConversationInPRogress == 0) {

      window.active_chat = 0;

      window.loadingConversationInPRogress = 1;

      if (source == 'view') {
        if(adminLocation){
          $("#chat-widget").addClass('admin-view');
        }
        $(".blur-content").addClass('show-blur-content');
      } else if (source = 'widget') {
        $("#chat-widget").removeClass('admin-view');
        $(".blur-content").addClass('show-blur-content');
      }






      axios.get('/chat/conversations/' + conversation_id + '/partner/' + partner_id)
        .then(function (response) {






          if (window.active_chat_handler) {
            window.active_chat_handler.update();
          } else {
            window.active_chat_handler = perfectScrollInit(window.activeConversation);
          }



          $("#active-conversation-replies").html(response.data.replies);



          $("#active-conversation").attr('data-active-conversation-id', response.data.conversation_id);
          window.active_chat = response.data.conversation_id;





          window.activeConversation.scrollTop = window.activeConversation.scrollHeight;
          $("#chat_reply_form textarea").focus();


          $('.conversation-row[data-conversation-id="' + response.data.conversation_id + '"] .conversation-row-notseen-messages-count span').text('0');




          window.activeConversation.addEventListener('ps-y-reach-start', window.loadMoreChatReplies);
          window.activeConversation.addEventListener('ps-scroll-down', function () {
            if (window.activeConversation.scrollTop > (window.activeConversation.scrollHeight - $("#active-conversation").height() - 200)) {
              $("#scroll-down-go-down").removeClass('visible');
            } else {
              $("#scroll-down-go-down").addClass('visible');
            }
          });
          window.activeConversation.addEventListener('ps-scroll-up', function () {
            $("#scroll-down-go-down").removeClass('visible');
          });




          window.loadingConversationInPRogress = 0;



        });
      /* /axios */


    }

  }












  window.loadMoreRepliesInProgress = 0;
  window.loadMoreChatReplies = function () {

    

    if (window.loadMoreRepliesInProgress == 0) {

      window.loadMoreRepliesInProgress = 1;

      var top_reply = $("#active-conversation-replies .conversation_reply_row:first-of-type");





      axios.get('/chat/conversations/previous_replies/' + window.active_chat + '/' + top_reply.attr('data-reply-id'))
        .then(function (response) {

          //console.log( JSON.stringify(response.data) );


          if (response.data.replies) {
            
            

            $("#active-conversation-replies").prepend(response.data.replies);

            window.active_chat_handler.update();
            
            var previous_height = 0;
            top_reply.prevAll().each(function() {
              previous_height += $(this).outerHeight();
            });

            
            if( previous_height >  $("#active-conversation").height()){
              var newPosition =  previous_height + $("#active-conversation").height() + 14;
            } else {
              var newPosition =  previous_height ;
            }

            window.activeConversation.scrollTop = newPosition;
            setTimeout(function () {
              $("#scroll-down-go-down").removeClass('visible');
            }, 10);
          } else {
            $("#active-conversation-replies").prepend("<p class='no-previous-replies'>إنتهت المحادثة</p>");
            window.active_chat_handler.update();
          }
          
          
          window.loadMoreRepliesInProgress = 0;


        });
      /* /axios */

    }

  }/* /loadMoreChatReplies() */










  window.loadMoreSubRepliesInProgress = 0;
  window.loadMoreSubChatReplies = function () {

    if (window.loadMoreSubRepliesInProgress == 0) {

      window.loadMoreSubRepliesInProgress = 1;
      var topReply = $("#active-sub-conversation-replies .conversation_reply_row:first-of-type");


      axios.get('/chat/conversations/' + window.active_sub_chat + '/previous_replies/', {
        params: {
          top_reply: topReply.attr('data-reply-id'),
        }
      })
        .then(function (response) {

          console.log(JSON.stringify(response.data));

          //return;


          if (response.data.replies) {
            window.loadMoreSubRepliesInProgress = 0;
            $("#active-sub-conversation-replies").prepend(response.data.replies);
            window.activeSubConversation.scrollTop = (topReply.offset().top - $("#active-sub-conversation").height() - topReply.height() + 0);
            setTimeout(function () {
              $("#sub_conversation_scroll-down-go-down").removeClass('visible');
            }, 10);

          } else {
            $("#active-sub-conversation-replies").prepend("<p class='no-previous-replies'>إنتهت المحادثة</p>");
          }


          //window.active_sub_chat_handler.update();

        });
      /* /axios */

    }

  }







  /* load partner new replies */
  window.loadPartnerNewReplies = function () {

    if (window.active_chat != 0) {
      console.log(window.active_chat);
    } else {
      console.log(0);
    }


    if (window.active_chat != 0) {

      var partnerReplies = document.querySelectorAll(".partner_user_reply");

      if (partnerReplies.length > 0) {
        var lastPartnerReply = partnerReplies[partnerReplies.length - 1].getAttribute("data-reply-id");
      } else {
        var lastPartnerReply = 0;
      }


      axios.get('/chat/conversations/new_replies/' + window.active_chat + '/' + lastPartnerReply)
        .then(function (response) {

          if (response.data.replies) {

            if (window.activeConversation.scrollTop == (window.activeConversation.scrollHeight - $("#active-conversation").height())) {
              $("#active-conversation-replies").append(response.data.replies);
              window.activeConversation.scrollTop = window.activeConversation.scrollHeight;
            } else {
              $("#active-conversation-replies").append(response.data.replies);
              $("#new-partner-replies-go-down").addClass('visible');
              setTimeout(function () {
                $("#new-partner-replies-go-down").removeClass('visible');
              }, 3000);
            }
          }


        }).catch((error) => {
        }).then(() => {
          // always executed
          setTimeout(window.loadPartnerNewReplies, window.active_chat_refresh_timer);
        });
      /* /axios */

    } else {
      setTimeout(window.loadPartnerNewReplies, window.active_chat_refresh_timer);
    }
  }
  loadPartnerNewReplies();



  // if there is new partner replies go down by clicking the new replies icon
  $("#new-partner-replies-go-down, #scroll-down-go-down").click(function () {
    $("#new-partner-replies-go-down").removeClass('visible');
    window.activeConversation.scroll({ top: window.activeConversation.scrollHeight, left: 0, behavior: "smooth" });
  });





  // add new conversation reply
  $("#chat-reply-input textarea").keypress(function (e) {
    if (e.which == 13 && !e.shiftKey) {
      $(this).closest("form").submit();
      e.preventDefault();
    }
  });


  $("#chat_reply_form").on('submit', function (e) {
    e.preventDefault();

    var conversation_reply = $("#chat_reply_form textarea").val();
    var conversation_id = $("#active-conversation").attr('data-active-conversation-id');

    $("#chat_reply_form textarea").val(null);

    axios.post('/chat/conversations/' + conversation_id, {
      conversation_reply: conversation_reply,
    })
      .then(function (response) {

        if (response.data.error == 1) {

        } else {
          $("#active-conversation-replies").append(response.data.reply);
          window.activeConversation.scrollTop = window.activeConversation.scrollHeight;
          $("#chat_reply_form textarea").focus();
          clearTimeout(window.checkForNewConversationsHandler);
          window.checkForNewConversationsHandler = window.checkForNewConversations();


        }
        //console.log( JSON.stringify(response.data) );

      });/* /axios */

  });









  // go back to conversation from active conversation layer
  $("#back-to-conversations").click(function () {
    window.active_chat = 0;
    window.loadMoreRepliesInProgress = 0;
    $("#active-conversation-container").removeClass('visible');
    $("#chat-widget-controls").removeClass('visible');
  });


  $("#controls-sub-conversation").click(function () {
    $("#sub-conversation-container").addClass('d-flex');
    $('.sub-conversation-user-chat, #controls-sub-conversation').removeClass('active-sub-conversation-tab-active');
    $(this).addClass('active-sub-conversation-tab-active');
  });

  $("#sub_conversation_back-to-conversations").click(function () {
    window.active_sub_chat = 0;
    window.loadMoreSubRepliesInProgress = 0;
    $("#sub-conversation-container").removeClass('d-flex');
    $("#chat-widget-controls").removeClass('visible');
  });



  $("#toggleChat").click(function () {
    $("#toggleChat").addClass('hidden');
    $("#chat-widget").addClass('visible-chat');
    $(".blur-content").addClass('show-blur-content');
  });


  $(".chat-close").click(function () {
    $("#toggleChat").removeClass('hidden');
    $("#chat-widget").removeClass('visible-chat');
    $(".blur-content").removeClass('show-blur-content');
  });


  $("#sub_conversation_scroll-down-go-down").click(function () {
    window.activeSubConversation.scroll({ top: window.activeSubConversation.scrollHeight, left: 0, behavior: "smooth" });
  });





  $("#chat-add-image-btn").click(function () {

    window.Swal.fire({
      title: "قم بإختيار صورة",
      showCancelButton: true,
      confirmButtonText: "إرسال",
      cancelButtonText: "إلغاء",
      customClass: {
        confirmButton: 'btn btn-lg btn-success mx-2',
        cancelButton: 'btn btn-lg btn-danger mx-2',
      },
      buttonsStyling: false,
      showLoaderOnConfirm: true,
      html:
        `
      <div id="chat_image_modal">

        <input type="file" class="form-control" id="chat_image_inp" style="margin:10px auto;padding: 3px 5px !important;height: 40px;line-height: 26px !important;" />
        <div class="progress" style="display:none;">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width:0%"></div>
        </div>
      </div>
      `,
      preConfirm: () => {

        if (!$("#chat_image_inp").val()) {
          Swal.showValidationMessage('قم بإختيار صورة');
        } else {

          $("#uploadingImage").fadeIn();

          $("#chat-upload-progress .progress-bar").css({ width: '0%' });

          var form = new FormData();
          form.append('image', $('#chat_image_inp').prop('files')[0]);
          form.append('conversation_id', $("#active-conversation").attr('data-active-conversation-id'));




          return axios.post('/chat/conversations/' + window.active_chat + '/add_image', form, {
            headers: {
              'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: (progressEvent) => {
              if (progressEvent.lengthComputable) {

                //console.log(progressEvent.loaded + ' ' + progressEvent.total);
                var progress = ((progressEvent.loaded / progressEvent.total) * 100) + '%';

                $("#chat-upload-progress .progress-bar").css({ width: progress });

              }
            }
          })
            .then(function (response) {

              if (response.data.error == 1) {
                throw new Error(response.data.message)
              }
              return response.data;
            }).catch(error => {
              Swal.showValidationMessage(


                `${error}`

              )
            });
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {

      if (result.value) {
        if (result.value.error == 1) {

          window.Toast.fire({
            icon: 'error',
            title: result.value.message
          })


        } else {
          $("#uploadingImage").fadeOut();
          $("#active-conversation-replies").append(result.value.reply);
          window.activeConversation.scrollTop = window.activeConversation.scrollHeight;
          $("#chat_reply_form textarea").focus();
          clearTimeout(window.checkForNewConversationsHandler);
          window.checkForNewConversationsHandler = window.checkForNewConversations();

        }
      }


    })



  });



  $('.offer-user-chat').on('click', function () {


    $("#toggleChat").addClass('hidden');
    $("#chat-widget").addClass('visible-chat');
    $(".blur-content").addClass('show-blur-content');

   
    
    
    if( window.userID > 0 ){
      var partner_id =  $(this).attr('data-partner');
      var conversation_id = 0;
  
      $("#active-conversation-container .chat-header-label .chat-header-label-text").html( $(this).attr('data-partner-name'));
      $("#active-conversation-container").addClass('visible');
      $("#active-conversation-replies").html(chatLoader());
      window.loadConversation(conversation_id, partner_id, 'view', false);
    }
    
  });

  $('.offer-user-chat-false').on('click', function(){
    window.Toast.fire({
      icon: 'error',
      title: "لا يمكنك التواصل مع نفسك",
    })

  });


});/* /ready() */