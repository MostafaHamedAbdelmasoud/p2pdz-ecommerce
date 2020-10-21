$(document).ready(function () {









  



























  function chatLoader() {
    return '<div class="chat-loader"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>';
  }
  function perfectScrollInit(element) {
    return new PerfectScrollbar(element, {
      wheelSpeed: 1,
      wheelPropagation: true,
      minScrollbarLength: 20
    });
  }



  /* load conversations */
  const conversationsContainer = document.querySelector('#conversations-container');
  window.conversations_container_handler;
  function loadConversations() {
    $("#conversations-rows").html(chatLoader());
    axios.get('chat/conversations')
      .then(function (response) {

        //console.log(JSON.stringify(response.data));

        if (response.data.conversations != '') {
          $("#conversations-rows").html(response.data.conversations);
          openConversation();
        } else {
          $("#conversations-rows").html('<div class="no-conversations-found">لا يوجد محادثات</div>');
        }


        window.conversations_container_handler = perfectScrollInit(conversationsContainer);
        conversationsContainer.addEventListener('ps-y-reach-end', function () {
          loadMoreConversations();
        });


        checkForNewConversations();

      });
    /* /axios */
  }
  loadConversations();



  // load more conversations
  var loadMoreConversationsInProgress = 0;
  function loadMoreConversations() {

    if (loadMoreConversationsInProgress == 0) {

      loadMoreConversationsInProgress = 1;
      var last_conversation = $("#conversations-rows .conversation-row:last-of-type");

      axios.get('chat/conversations/', {
        params: {
          last_conversation_id: last_conversation.attr('data-conversation-id'),
          last_conversation_row_id: last_conversation.attr("data-conversation-row-id")
        }
      })
        .then(function (response) {


          //console.log(JSON.stringify(response.data.conversations));

          var currentScroll = activeConversation.scrollHeight;

          if (response.data.conversations != '') {
            loadMoreConversationsInProgress = 0;
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



  var checkForNewConversationsHandler;
  var checkForNewConversations = function () {
    
    var top_conversation = $("#conversations-rows .conversation-row:first-of-type");

    axios.get('chat/conversations', {
      params: {
        top_conversation_id: top_conversation.attr('data-conversation-id'),
        top_conversation_row_id: top_conversation.attr("data-conversation-row-id")
      }
    })
      .then(function (response) {

        console.log(response.data.conversations_ids_array);

        if (response.data.conversations != '') {

          response.data.conversations_ids_array.forEach(function (conversation_row) {
            $('.conversation-row[data-conversation-id="' + conversation_row + '"]').remove();
          });
          $("#conversations-rows").prepend(response.data.conversations);
          
          openConversation();

          
          if(loadMoreConversationsInProgress==0){
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
  var active_chat = 0;
  var active_chat_refresh_timer = 1000;
  window.active_chat_handler;
  const activeConversation = document.querySelector('#active-conversation');
  function openConversation() {
    $(".conversation-row").off('click');
    $(".conversation-row").click(function () {

      $("#active-conversation-container .chat-header-label .chat-header-label-text").html( $(this).find('.conversation-row-partner-name').text());
      $("#active-conversation-container").addClass('visible');
      $("#active-conversation-replies").html(chatLoader());

      var conversation_id = $(this).attr('data-conversation-id')


      axios.get('chat/conversations/' + conversation_id)
        .then(function (response) {



          $("#active-conversation").attr('data-active-conversation-id', conversation_id);


          $("#active-conversation-replies").html(response.data.replies);

          active_chat = conversation_id;

          window.active_chat_handler = perfectScrollInit(activeConversation);
          activeConversation.scrollTop = activeConversation.scrollHeight;
          $("#chat_reply_form textarea").focus();


          $('.conversation-row[data-conversation-id="' + conversation_id + '"] .conversation-row-notseen-messages-count span').text('0');


          activeConversation.addEventListener('ps-y-reach-start', function () {
              loadMoreChatReplies();
          });
          activeConversation.addEventListener('ps-scroll-down', function () {
            if (activeConversation.scrollTop > ( activeConversation.scrollHeight - $("#active-conversation").height() - 200 ) ) {
              $("#scroll-down-go-down").removeClass('visible');
            } else {
              $("#scroll-down-go-down").addClass('visible');
            }
          });
          activeConversation.addEventListener('ps-scroll-up', function () {
            $("#scroll-down-go-down").removeClass('visible');
          });


        });
      /* /axios */

    });
  }/* /openConversation() */



  var loadMoreRepliesInProgress = 0;
  function loadMoreChatReplies() {

    if (loadMoreRepliesInProgress == 0) {

      loadMoreRepliesInProgress = 1;
      var topReply = $("#active-conversation-replies .conversation_reply_row:first-of-type");

      axios.get('chat/conversations/' + active_chat + '/previous-replies/', {
        params: {
          top_reply: topReply.attr('data-reply-id'),
        }
      })
        .then(function (response) {


          if (response.data.replies) {
            loadMoreRepliesInProgress = 0;
            $("#active-conversation-replies").prepend(response.data.replies);
            activeConversation.scrollTop = (topReply.offset().top - $("#active-conversation").height() - topReply.height() - 8);
            setTimeout(function(){
              $("#scroll-down-go-down").removeClass('visible');
            }, 10);
          } else {
            $("#active-conversation-replies").prepend("<p class='no-previous-replies'>إنتهت المحادثة</p>");
          }
          
          window.active_chat_handler.update();


        });
      /* /axios */

    }

  }/* /loadMoreChatReplies() */

  /* load partner new replies */
  var loadPartnerNewReplies = function () {

    if (active_chat != 0) {

      var partnerReplies = document.querySelectorAll(".partner_user_reply");

      if (partnerReplies.length > 0) {
        var lastPartnerReply = partnerReplies[partnerReplies.length - 1].getAttribute("data-reply-id");
      } else {
        var lastPartnerReply = 0;
      }


      axios.get('chat/conversations/' + active_chat + '/new-replies/', {
        params: {
          active_chat: active_chat,
          lastPartnerReply: lastPartnerReply,
        }
      })
        .then(function (response) {

          if (response.data.replies) {

            if (activeConversation.scrollTop == (activeConversation.scrollHeight - $("#active-conversation").height())) {
              $("#active-conversation-replies").append(response.data.replies);
              activeConversation.scrollTop = activeConversation.scrollHeight;
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
          setTimeout(loadPartnerNewReplies, active_chat_refresh_timer);
        });
      /* /axios */

    } else {
      setTimeout(loadPartnerNewReplies, active_chat_refresh_timer);
    }
  }
  loadPartnerNewReplies();

  // if there is new partner replies go down by clicking the new replies icon
  $("#new-partner-replies-go-down, #scroll-down-go-down").click(function () {
    $("#new-partner-replies-go-down").removeClass('visible');
    activeConversation.scroll({ top: activeConversation.scrollHeight, left: 0, behavior: "smooth" });
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

    axios.post('chat/conversations/' + conversation_id, {
      conversation_reply: conversation_reply,
    })
      .then(function (response) {

        if (response.data.error == 1) {

        } else {
          $("#active-conversation-replies").append(response.data.reply);
          activeConversation.scrollTop = activeConversation.scrollHeight;
          $("#chat_reply_form textarea").focus();
          clearTimeout(checkForNewConversationsHandler);
          checkForNewConversationsHandler = checkForNewConversations();
          

        }
        //console.log( JSON.stringify(response.data) );

      });/* /axios */

  });









  // go back to conversation from active conversation layer
  $("#back-to-conversations").click(function () {
    active_chat = 0;
    loadMoreRepliesInProgress = 0;
    $("#active-conversation-container").removeClass('visible');
    if (window.active_chat_handler) { window.active_chat_handler.destroy(); }
    window.active_chat_handler = null;
  });



  $("#toggleChat").click(function(){
    $("#toggleChat").addClass('hidden');
    $("#chat-container").addClass('visible');
  });


  $(".chat-close").click(function(){
    $("#toggleChat").removeClass('hidden');
    $("#chat-container").removeClass('visible');
  });

});/* /ready() */