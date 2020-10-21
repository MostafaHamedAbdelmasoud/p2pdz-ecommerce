/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 13);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboards/admin/main.js":
/*!***********************************************!*\
  !*** ./resources/js/dashboards/admin/main.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.App = new Vue({
  el: '#app',
  data: {
    edit_service_id: 0,
    service_source: ''
  },
  methods: {
    UserController: function UserController() {
      var self = this;
      return {
        changeVerification: function changeVerification(id, _changeVerification) {
          axios.put('/users/' + id + '/varification', {
            new_verification: _changeVerification
          }).then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }

            window.usersTable.ajax.reload(null, false);
          });
        },

        /* /changeVerification() */
        changeAccountType: function changeAccountType(id, email) {
          Swal.fire({
            title: 'تعديل نوع حساب',
            showCancelButton: true,
            confirmButtonText: 'تحديث',
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <h3 style=\"color: #2196f3;direction:ltr;\">" + email + "</h3>\n            <div>\n              <select id=\"choose-account-type\" class=\"form-control\">\n                <option selected disabled>\u0625\u062E\u062A\u0631 \u0646\u0648\u0639 \u0627\u0644\u062D\u0633\u0627\u0628</option>\n                <option value=\"0\">\u0645\u0634\u062A\u0631\u0649</option>\n                <option value=\"1\">\u0628\u0627\u0626\u0639</option>\n                <option value=\"10\">\u0625\u062F\u0627\u0631\u0629</option>\n              </select>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#choose-account-type").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                return axios.post('/users/' + id + '/account_type', {
                  account_type: $("#choose-account-type").val(),
                  account_id: id,
                  account_email: email
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.usersTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /changeAccountType() */
        changeState: function changeState(id, _changeState) {
          axios.put('/users/' + id + '/state', {
            new_state: _changeState
          }).then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }

            window.usersTable.ajax.reload(null, false);
          });
        },

        /* /changeState() */
        deleteUser: function deleteUser(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: window.translation.cancel,
            confirmButtonText: window.translation.yes_delete
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/users/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.usersTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteUser() */

      };
      /* /return */
    },

    /* /UserController() */
    CurrencyController: function CurrencyController() {
      var self = this;
      return {
        addCurrency: function addCurrency() {
          var self = this;
          Swal.fire({
            title: "إضافة عملة",
            showCancelButton: true,
            confirmButtonText: window.translation.add,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"add_currency_modal\">\n              <input type=\"text\" class=\"form-control mb-3 rtl-input\" placeholder=\"\u0636\u0639 \u0625\u0633\u0645 \u0627\u0644\u0639\u0645\u0644\u0629 \u0647\u0646\u0627\" id=\"currency_title\" />\n              <input type=\"file\" class=\"form-control\" id=\"currency_icon\" style=\"margin:10px auto;padding: 4px;height: 40px;\" />\n              <div class=\"progress\" style=\"display:none;\">\n                  <div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width:0%\"></div>\n              </div>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#currency_title").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                $("#add_currency_modal .progress > div").css({
                  width: '0%'
                });
                var form = new FormData();
                form.append('image', $('#currency_icon').prop('files')[0]);
                form.append('currency_title', $("#currency_title").val());
                return axios.post('/currencies', form, {
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  },
                  onUploadProgress: function onUploadProgress(progressEvent) {
                    if (progressEvent.lengthComputable) {
                      //console.log(progressEvent.loaded + ' ' + progressEvent.total);
                      var progress = progressEvent.loaded / progressEvent.total * 100 + '%';
                      $("#add_currency_modal .progress").addClass('d-block');
                      $("#add_currency_modal .progress > div").css({
                        width: progress
                      });
                    }
                  }
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.currenciesTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /addCurrency() */
        editCurrency: function editCurrency(id, name) {
          Swal.fire({
            title: 'تعديل بيانات عملة',
            showCancelButton: true,
            confirmButtonText: window.translation.save,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"edit_currency_modal\">\n              <input type=\"text\" class=\"form-control mb-3 rtl-input\" value=\"" + name + "\" placeholder=\"" + window.translation.ar_label + "\" id=\"edit_currency_title\" />\n              <input type=\"file\" class=\"form-control\" id=\"edit_currency_icon\" style=\"margin:10px auto;padding: 4px;height: 40px;\" />\n              <small class=\"text-danger\">" + window.translation.choose_image_if_you_wanna_change_it + "</small>\n              <div class=\"progress\" style=\"display:none;\">\n                  <div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width:0%\"></div>\n              </div>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#edit_currency_title").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                $("#edit_currency_modal .progress > div").css({
                  width: '0%'
                });
                var form = new FormData();
                form.append('image', $('#edit_currency_icon').prop('files')[0]);
                form.append('currency_title', $("#edit_currency_title").val());
                return axios.post('/currencies/' + id, form, {
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  },
                  onUploadProgress: function onUploadProgress(progressEvent) {
                    if (progressEvent.lengthComputable) {
                      //console.log(progressEvent.loaded + ' ' + progressEvent.total);
                      var progress = progressEvent.loaded / progressEvent.total * 100 + '%';
                      $("#edit_currency_modal .progress").addClass('d-block');
                      $("#edit_currency_modal .progress > div").css({
                        width: progress
                      });
                    }
                  }
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.currenciesTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /editCurrency() */
        deleteCurrency: function deleteCurrency(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: window.translation.cancel,
            confirmButtonText: window.translation.yes_delete
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/currencies/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.currenciesTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteCurrency() */

      };
    },

    /* /CurrencyController() */
    CreditController: function CreditController() {
      var self = this;
      return {
        addCredit: function addCredit() {
          var self = this;
          Swal.fire({
            title: "إضافة شبكة رصيد",
            showCancelButton: true,
            confirmButtonText: window.translation.add,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"add_credit_modal\">\n              <input type=\"text\" class=\"form-control mb-3 rtl-input text-center\" placeholder=\"\u0636\u0639 \u0625\u0633\u0645 \u0627\u0644\u0634\u0631\u0643\u0629 \u0647\u0646\u0627\" id=\"credit_title\" />\n              <input type=\"file\" class=\"form-control\" id=\"credit_icon\" style=\"margin:10px auto;padding: 4px;height: 40px;\" />\n              <div class=\"progress\" style=\"display:none;\">\n                  <div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width:0%\"></div>\n              </div>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#credit_title").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                $("#add_credit_modal .progress > div").css({
                  width: '0%'
                });
                var form = new FormData();
                form.append('image', $('#credit_icon').prop('files')[0]);
                form.append('credit_title', $("#credit_title").val());
                return axios.post('/credits', form, {
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  },
                  onUploadProgress: function onUploadProgress(progressEvent) {
                    if (progressEvent.lengthComputable) {
                      //console.log(progressEvent.loaded + ' ' + progressEvent.total);
                      var progress = progressEvent.loaded / progressEvent.total * 100 + '%';
                      $("#add_credit_modal .progress").addClass('d-block');
                      $("#add_credit_modal .progress > div").css({
                        width: progress
                      });
                    }
                  }
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.creditsTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /addCredit() */
        editCredit: function editCredit(id, name) {
          Swal.fire({
            title: 'تعديل بيانات شبكة رصيد',
            showCancelButton: true,
            confirmButtonText: window.translation.save,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"edit_credit_modal\">\n              <input type=\"text\" class=\"form-control mb-3 rtl-input text-center\" value=\"" + name + "\" placeholder=\"" + window.translation.ar_label + "\" id=\"edit_credit_title\" />\n              <input type=\"file\" class=\"form-control\" id=\"edit_credit_icon\" style=\"margin:10px auto;padding: 4px;height: 40px;\" />\n              <small class=\"text-danger\">" + window.translation.choose_image_if_you_wanna_change_it + "</small>\n              <div class=\"progress\" style=\"display:none;\">\n                  <div class=\"progress-bar progress-bar-striped\" role=\"progressbar\" style=\"width:0%\"></div>\n              </div>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#edit_credit_title").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                $("#edit_credit_modal .progress > div").css({
                  width: '0%'
                });
                var form = new FormData();
                form.append('image', $('#edit_credit_icon').prop('files')[0]);
                form.append('credit_title', $("#edit_credit_title").val());
                return axios.post('/credits/' + id, form, {
                  headers: {
                    'Content-Type': 'multipart/form-data'
                  },
                  onUploadProgress: function onUploadProgress(progressEvent) {
                    if (progressEvent.lengthComputable) {
                      //console.log(progressEvent.loaded + ' ' + progressEvent.total);
                      var progress = progressEvent.loaded / progressEvent.total * 100 + '%';
                      $("#edit_credit_modal .progress").addClass('d-block');
                      $("#edit_credit_modal .progress > div").css({
                        width: progress
                      });
                    }
                  }
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.creditsTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /editCredit() */
        deleteCredit: function deleteCredit(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: window.translation.cancel,
            confirmButtonText: window.translation.yes_delete
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/credits/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.creditsTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteCredit() */

      };
    },

    /* /CreditController() */
    ConversationController: function ConversationController() {
      var self = this;
      return {
        viewConversation: function viewConversation(id) {
          $("#controls-sub-conversation").click();
          $("#active-sub-conversation-replies").html(window.chatLoader());
          $("#chat-widget-controls").addClass('visible');
          $("#toggleChat").addClass('hidden');
          $("#chat-widget").addClass('visible-chat');
          $(".blur-content").addClass('show-blur-content');
          $("#sub-conversation-container").addClass('d-flex');
          var conversation_id = id;
          axios.get('chat/conversations/admin/read/' + conversation_id).then(function (response) {
            $("#conversationUserOne").html(response.data.info.from_user_name);
            $("#conversationUserTwo").html(response.data.info.to_user_name);
            $("#controls-sub-conversation-first-user").html(response.data.info.from_user_img + response.data.info.from_username);
            $("#controls-sub-conversation-first-user").attr('data-partner-id', response.data.info.from_user_id);
            $("#controls-sub-conversation-second-user").html(response.data.info.to_user_img + response.data.info.to_username);
            $("#controls-sub-conversation-second-user").attr('data-partner-id', response.data.info.to_user_id); // open sub chat user chat

            $('.sub-conversation-user-chat').off('click');
            $('.sub-conversation-user-chat').click(function () {
              $('.sub-conversation-user-chat, #controls-sub-conversation').removeClass('active-sub-conversation-tab-active');
              $(this).addClass('active-sub-conversation-tab-active');
              var partner_id = $(this).attr('data-partner-id');
              var conversation_id = 0; // display main chat layout

              $("#sub-conversation-container").removeClass('d-flex');
              $("#active-conversation-container .chat-header-label .chat-header-label-text").html($(this).find(".sub-chat-users-tab").text());
              $("#active-conversation-container").addClass('visible');
              window.loadConversation(conversation_id, partner_id, 'widget');
              /* 
                              if (conversation_id == $('#active-conversation').attr('data-active-conversation-id')) {
                                window.active_chat = conversation_id;
                                $("#active-conversation-container").addClass('visible');
                              } else {
              
                              } */
            });

            if (window.active_sub_chat_handler) {
              window.active_sub_chat_handler.update();
            } else {
              window.active_sub_chat_handler = window.perfectScrollInit(window.activeSubConversation);
            }

            $("#active-sub-conversation").attr('data-active-sub-conversation-id', conversation_id);
            $("#active-sub-conversation-replies").html(response.data.replies);
            window.active_sub_chat = conversation_id;
            window.activeSubConversation.scrollTop = window.activeSubConversation.scrollHeight;
            window.activeSubConversation.addEventListener('ps-y-reach-start', function () {
              loadMoreSubChatReplies();
            });
            window.activeSubConversation.addEventListener('ps-scroll-down', function () {
              if (window.activeSubConversation.scrollTop > window.activeSubConversation.scrollHeight - $("#active-sub-conversation").height() - 200) {
                $("#sub_conversation_scroll-down-go-down").removeClass('visible');
              } else {
                $("#sub_conversation_scroll-down-go-down").addClass('visible');
              }
            });
            window.activeSubConversation.addEventListener('ps-scroll-up', function () {
              $("#sub_conversation_scroll-down-go-down").removeClass('visible');
            });
          });
          /* /axios */
        },

        /* /viewConversation() */
        chatWithUser: function chatWithUser(id, name) {
          $("#sub-conversation-container").removeClass('d-flex');
          $("#chat-widget-controls").removeClass('visible');
          $("#toggleChat").addClass('hidden');
          $("#chat-widget").addClass('visible-chat');
          $(".blur-content").addClass('show-blur-content'); // /////////////////////

          var partner_id = id;
          var conversation_id = 0;
          $("#active-conversation-container .chat-header-label .chat-header-label-text").html(name);

          if (conversation_id == $('#active-conversation').attr('data-active-conversation-id') && conversation_id != 0) {
            window.active_chat = conversation_id;
            $("#active-conversation-container").addClass('visible');
          } else {
            $("#active-conversation-container").addClass('visible');
            $("#active-conversation-replies").html(chatLoader());
            window.loadConversation(conversation_id, partner_id, 'widget');
          }
        }
        /* /chatWithUser() */

      };
      /* /return */
    },

    /* /ConversationController() */
    NotificationController: function NotificationController() {
      var slef = this;
      return {
        addNotification: function addNotification() {
          Swal.fire({
            title: 'إضافة إشعار',
            showCancelButton: true,
            confirmButtonText: window.translation.add,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"add_notification_modal\">\n              <textarea class=\"form-control\" style=\"direction:rtl ;text-align:canter !important;min-height:100px;\" id=\"add_notification_textarea\" placeholder=\"\u0625\u0643\u062A\u0628 \u0627\u0644\u0625\u0634\u0639\u0627\u0631 \u0647\u0646\u0627\"></textarea>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#add_notification_textarea").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                return axios.post('/notifications', {
                  notification_content: $("#add_notification_textarea").val(),
                  notification_audience: 'Universal'
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.notificationsTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /addNotification() */
        editNotification: function editNotification(id) {
          var id = id;
          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.get('/notifications/' + id).then(function (response) {
            if (response.data.error == 0) {
              console.log(response.data);
              Swal.fire({
                title: 'تعديل إشعار',
                showCancelButton: true,
                confirmButtonText: window.translation.save,
                cancelButtonText: window.translation.cancel,
                customClass: {
                  confirmButton: 'button is-primary is-rounded m-3',
                  cancelButton: 'button is-danger is-rounded'
                },
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                html: "\n                <div id=\"edit_notification_modal\">\n                  <textarea class=\"form-control\" style=\"direction:rtl;text-align:center;min-height:100px;\" id=\"edit_notification_textarea\">" + response.data.content + "</textarea>\n                </div>\n                ",
                preConfirm: function preConfirm() {
                  if (!$("#edit_notification_textarea").val()) {
                    Swal.showValidationMessage(window.translation.fields_required);
                  } else {
                    return axios.put('/notifications/' + id, {
                      notification: $("#edit_notification_textarea").val()
                    }).then(function (response) {
                      if (response.data.error == 1) {
                        throw new Error(response.data.message);
                      }

                      return response.data;
                    })["catch"](function (error) {
                      Swal.showValidationMessage("".concat(error));
                    });
                  }
                },
                allowOutsideClick: function allowOutsideClick() {
                  return !Swal.isLoading();
                }
              }).then(function (result) {
                if (result.value) {
                  if (result.value.error == 1) {
                    window.Toast.fire({
                      icon: 'error',
                      title: result.value.message
                    });
                  } else {
                    window.Toast.fire({
                      icon: 'success',
                      title: result.value.message
                    });
                    window.notificationsTable.ajax.reload(null, false);
                  }
                }
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /editNotification() */
        emailNotification: function emailNotification(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: '',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_sent,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios.get('/email/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.notificationsTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        },

        /* /emailNotification() */
        deleteNotification: function deleteNotification(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_delete,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/notifications/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.notificationsTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteNotification() */

      };
      /* /return */
    },

    /* /NotificationController () */
    ComplaintController: function ComplaintController() {
      var self = this;
      return {
        deleteComplaint: function deleteComplaint(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_delete,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/issues/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.issuesTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
      };
    },
    QuestionController: function QuestionController() {
      var self = this;
      return {
        addQuestion: function addQuestion() {
          Swal.fire({
            title: 'إضافة سؤال',
            showCancelButton: true,
            confirmButtonText: window.translation.add,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"add_question_modal\">\n              <textarea class=\"form-control\" style=\"text-align:center;min-height:70px;margin-bottom: 20px;font-family:'Tajawal';\" id=\"add_question_textarea\" placeholder=\"\u0636\u0639 \u0627\u0644\u0633\u0624\u0627\u0644 \u0647\u0646\u0627\"></textarea>\n              <textarea class=\"form-control\" style=\"text-align:center;min-height:70px;font-family:'Tajawal';\" id=\"add_answer_textarea\" placeholder=\"\u0636\u0639 \u0627\u0644\u0625\u062C\u0627\u0628\u0629 \u0647\u0646\u0627\"></textarea>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#add_question_textarea").val() || !$("#add_answer_textarea").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                return axios.post('/questions', {
                  question: $("#add_question_textarea").val(),
                  answer: $("#add_answer_textarea").val()
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.questionsTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /addQuestion() */
        editQuestion: function editQuestion(id) {
          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.get('/questions/' + id).then(function (response) {
            if (response.data.error == 0) {
              console.log(response.data);
              Swal.fire({
                title: 'تعديل سؤال',
                showCancelButton: true,
                confirmButtonText: window.translation.save,
                cancelButtonText: window.translation.cancel,
                customClass: {
                  confirmButton: 'button is-primary is-rounded m-3',
                  cancelButton: 'button is-danger is-rounded'
                },
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                html: "\n                  <div id=\"edit_question_modal\">\n                    \n                    <textarea class=\"form-control\" style=\"text-align:center;min-height:70px;margin-bottom: 20px;font-family:'Tajawal';\" id=\"edit_question_textarea\" placeholder=\"\u0636\u0639 \u0627\u0644\u0633\u0624\u0627\u0644 \u0647\u0646\u0627\">" + response.data.question.question + "</textarea>\n\n                    <textarea class=\"form-control\" style=\"text-align:center;min-height:70px;font-family:'Tajawal';\" id=\"edit_answer_textarea\" placeholder=\"\u0636\u0639 \u0627\u0644\u0625\u062C\u0627\u0628\u0629 \u0647\u0646\u0627\">" + response.data.question.answer + "</textarea>\n                  </div>\n                ",
                preConfirm: function preConfirm() {
                  if (!$("#edit_question_textarea").val() || !$("#edit_answer_textarea").val()) {
                    Swal.showValidationMessage(window.translation.fields_required);
                  } else {
                    return axios.put('/questions/' + response.data.question.id, {
                      question: $("#edit_question_textarea").val(),
                      answer: $("#edit_answer_textarea").val()
                    }).then(function (response) {
                      if (response.data.error == 1) {
                        throw new Error(response.data.message);
                      }

                      return response.data;
                    })["catch"](function (error) {
                      Swal.showValidationMessage("".concat(error));
                    });
                  }
                },
                allowOutsideClick: function allowOutsideClick() {
                  return !Swal.isLoading();
                }
              }).then(function (result) {
                if (result.value) {
                  if (result.value.error == 1) {
                    window.Toast.fire({
                      icon: 'error',
                      title: result.value.message
                    });
                  } else {
                    window.Toast.fire({
                      icon: 'success',
                      title: result.value.message
                    });
                    window.questionsTable.ajax.reload(null, false);
                  }
                }
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* editQuestion */
        deleteQuestion: function deleteQuestion(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_delete,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/questions/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.questionsTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteQuestion() */

      };
      /* /return */
    },

    /* /QuestionController() */
    AdController: function AdController() {
      var self = this;
      return {
        editAd: function editAd(id, label) {
          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.get('/ads/' + id).then(function (response) {
            if (response.data.error == 0) {
              console.log(response.data);
              Swal.fire({
                title: '<div style="display:flex;font-size: 20px;"><i class="material-icons">edit</i> &nbsp;&nbsp; ' + label + "</div>",
                showCancelButton: true,
                confirmButtonText: window.translation.save,
                cancelButtonText: window.translation.cancel,
                customClass: {
                  confirmButton: 'button is-primary is-rounded m-3',
                  cancelButton: 'button is-danger is-rounded'
                },
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                html: "\n                <div id=\"edit_ad_modal\">\n                  <textarea class=\"form-control\" style=\"direction:ltr;text-align:left;min-height:100px;\" id=\"edit_ad_textarea\">" + response.data.ad.code + "</textarea>\n                </div>\n                ",
                preConfirm: function preConfirm() {
                  if (!$("#edit_ad_textarea").val()) {
                    Swal.showValidationMessage(window.translation.fields_required);
                  } else {
                    return axios.put('/ads/' + response.data.ad.id, {
                      code: $("#edit_ad_textarea").val()
                    }).then(function (response) {
                      if (response.data.error == 1) {
                        throw new Error(response.data.message);
                      }

                      return response.data;
                    })["catch"](function (error) {
                      Swal.showValidationMessage("".concat(error));
                    });
                  }
                },
                allowOutsideClick: function allowOutsideClick() {
                  return !Swal.isLoading();
                }
              }).then(function (result) {
                if (result.value) {
                  if (result.value.error == 1) {
                    window.Toast.fire({
                      icon: 'error',
                      title: result.value.message
                    });
                  } else {
                    window.Toast.fire({
                      icon: 'success',
                      title: result.value.message
                    });
                    window.adsTable.ajax.reload(null, false);
                  }
                }
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /editAd() */
        deleteAd: function deleteAd(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_delete,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/ads/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.adsTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteAd() */

      };
    },

    /* /AdController() */
    MetaTagController: function MetaTagController() {
      var self = this;
      return {
        addMeta: function addMeta() {
          Swal.fire({
            title: window.translation.add_meta_tag,
            showCancelButton: true,
            confirmButtonText: window.translation.add,
            cancelButtonText: window.translation.cancel,
            customClass: {
              confirmButton: 'button is-primary is-rounded m-3',
              cancelButton: 'button is-danger is-rounded'
            },
            buttonsStyling: false,
            showLoaderOnConfirm: true,
            html: "\n            <div id=\"add_meta_modal\">\n              <textarea class=\"form-control\" style=\"direction:ltr;text-align:left;min-height:100px;\" id=\"add_meta_textarea\"><meta property=\"\" content=\"\" /></textarea>\n            </div>\n            ",
            preConfirm: function preConfirm() {
              if (!$("#add_meta_textarea").val()) {
                Swal.showValidationMessage(window.translation.fields_required);
              } else {
                return axios.post('/meta_tags', {
                  meta: $("#add_meta_textarea").val()
                }).then(function (response) {
                  if (response.data.error == 1) {
                    throw new Error(response.data.message);
                  }

                  return response.data;
                })["catch"](function (error) {
                  Swal.showValidationMessage("".concat(error));
                });
              }
            },
            allowOutsideClick: function allowOutsideClick() {
              return !Swal.isLoading();
            }
          }).then(function (result) {
            if (result.value) {
              if (result.value.error == 1) {
                window.Toast.fire({
                  icon: 'error',
                  title: result.value.message
                });
              } else {
                window.Toast.fire({
                  icon: 'success',
                  title: result.value.message
                });
                window.metaTagsTable.ajax.reload(null, false);
              }
            }
          });
        },

        /* /addMeta() */
        editMeta: function editMeta(id) {
          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.get('/meta_tags/' + id).then(function (response) {
            if (response.data.error == 0) {
              console.log(response.data);
              Swal.fire({
                title: window.translation.edit_meta_tag,
                showCancelButton: true,
                confirmButtonText: window.translation.save,
                cancelButtonText: window.translation.cancel,
                customClass: {
                  confirmButton: 'button is-primary is-rounded m-3',
                  cancelButton: 'button is-danger is-rounded'
                },
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                html: "\n                <div id=\"edit_meta_modal\">\n                  <textarea class=\"form-control\" style=\"direction:ltr;text-align:left;min-height:100px;\" id=\"edit_meta_textarea\">" + response.data.meta.meta_tag + "</textarea>\n                </div>\n                ",
                preConfirm: function preConfirm() {
                  if (!$("#edit_meta_textarea").val()) {
                    Swal.showValidationMessage(window.translation.fields_required);
                  } else {
                    return axios.put('/meta_tags/' + response.data.meta.id, {
                      meta: $("#edit_meta_textarea").val()
                    }).then(function (response) {
                      if (response.data.error == 1) {
                        throw new Error(response.data.message);
                      }

                      return response.data;
                    })["catch"](function (error) {
                      Swal.showValidationMessage("".concat(error));
                    });
                  }
                },
                allowOutsideClick: function allowOutsideClick() {
                  return !Swal.isLoading();
                }
              }).then(function (result) {
                if (result.value) {
                  if (result.value.error == 1) {
                    window.Toast.fire({
                      icon: 'error',
                      title: result.value.message
                    });
                  } else {
                    window.Toast.fire({
                      icon: 'success',
                      title: result.value.message
                    });
                    window.metaTagsTable.ajax.reload(null, false);
                  }
                }
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /editMeta() */
        deleteMeta: function deleteMeta(id) {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_delete,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/meta_tags/' + id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  window.metaTagsTable.ajax.reload(null, false);
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteMeta() */

      };
    },

    /* /MetaTagController() */
    ServiceController: function ServiceController() {
      var self = this;
      return {
        editService: function editService(id, service_source) {
          self.service_source = service_source;

          if (service_source == 'new_services_tab') {
            $("#accept-service-btn").css({
              'visibility': 'visible'
            });
          } else {
            $("#accept-service-btn").css({
              'visibility': 'hidden'
            });
          }

          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.get('/services/' + id).then(function (response) {
            if (response.data.error == 0) {
              console.log(response.data);
              self.edit_service_id = response.data.service.id;
              $("#edit_service_label").val(response.data.service.label);
              $("#edit_service_main_cat").html('<option selected>' + response.data.service.main_category + '</option>');
              $("#edit_service_sub_cat").html('<option selected>' + response.data.service.sub_category + '</option>');
              $("#edit_service_quantity").val(response.data.service.quantity);
              $("#edit_service_desc").val(response.data.service.description);
              $("#edit_service_tags").val(response.data.service.tags);
              var duration = '';

              if (response.data.service.duration == 1) {
                duration = 'يوم أو أقل';
              } else if (response.data.service.duration == 2) {
                duration = 'يومان';
              } else if (response.data.service.duration == 3) {
                duration = 'ثلاثة أيام';
              } else if (response.data.service.duration == 4) {
                duration = 'أربعة أيام';
              } else if (response.data.service.duration == 5) {
                duration = 'خمسة أيام';
              } else if (response.data.service.duration == 6) {
                duration = 'ستة أيام';
              } else if (response.data.service.duration == 7) {
                duration = 'سبعة أيام';
              } else if (response.data.service.duration == 14) {
                duration = 'أسبوعان';
              } else if (response.data.service.duration == 21) {
                duration = 'ثلاثة أسابيع';
              } else if (response.data.service.duration == 30) {
                duration = 'شهر';
              }

              $("#edit_service_time").html('<option selected>' + duration + '</option>');
              $("#edit_service_requirments").val(response.data.service.requirements);
              $("#edit_service_tab").click();
              ToastLoading.close();
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /editService() */
        acceptService: function acceptService() {
          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.post('/services/' + self.edit_service_id + '/accept').then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
              window.newServicesTable.ajax.reload(null, false);

              if (window.currentServicesTable) {
                window.currentServicesTable.ajax.reload(null, false);
              }

              $("#new_services_tab").click();
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /acceptService() */
        changeAvailability: function changeAvailability(id, availability) {
          ToastLoading.fire({
            icon: 'info',
            html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
          });
          axios.put('/services/' + id, {
            availability: availability
          }).then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
              window.currentServicesTable.ajax.reload(null, false);
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /changeAvailability() */
        deleteService: function deleteService() {
          Swal.fire({
            title: window.translation.are_you_sure,
            text: window.translation.cant_revert,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: window.translation.yes_delete,
            cancelButtonText: window.translation.cancel
          }).then(function (result) {
            if (result.value) {
              axios["delete"]('/services/' + self.edit_service_id).then(function (response) {
                if (response.data.error == 0) {
                  window.Toast.fire({
                    icon: 'success',
                    title: response.data.message
                  });
                  $("#" + self.service_source).click();

                  if (self.service_source == 'current_services_tab') {
                    window.currentServicesTable.ajax.reload(null, false);
                  } else {
                    window.newServicesTable.ajax.reload(null, false);
                  }
                } else {
                  window.Toast.fire({
                    icon: 'error',
                    title: response.data.message
                  });
                }
              });
            }
          });
        }
        /* /deleteService() */

      };
    },

    /* /ServiceController() */
    SettingsController: function SettingsController() {
      var self = this;
      return {
        changeProfilePicture: function changeProfilePicture() {
          $("#change-profile-picture-form .progress > div").css({
            width: '0%'
          });
          var form = new FormData();
          form.append('image', $('#profile-picture-input').prop('files')[0]);
          axios.post('/users/profile-picture', form, {
            headers: {
              'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function onUploadProgress(progressEvent) {
              if (progressEvent.lengthComputable) {
                //console.log(progressEvent.loaded + ' ' + progressEvent.total);
                var progress = progressEvent.loaded / progressEvent.total * 100 + '%';
                $("#change-profile-picture-form .progress").addClass('d-block');
                $("#change-profile-picture-form .progress > div").css({
                  width: progress
                });
              }
            }
          }).then(function (response) {
            $("#change-profile-picture-form .progress").removeClass('d-block');
            $('#profile-picture-input').val(null);
            $('.profile-picture-label').text(window.translation.profile_picture);

            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
              $(".currentUserTabImg img").attr('src', response.data.thumb);
              $(".dashboard-menu-side-character-img img").attr('src', response.data.card);
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /changeProfilePicture() */
        changeSocial: function changeSocial() {
          var fb = $("#fb-url").val();
          var tw = $("#tw-url").val();
          var yt = $("#yt-url").val();
          var ins = $("#ins-url").val();
          axios.put('/settings/social', {
            fb: fb,
            tw: tw,
            yt: yt,
            ins: ins
          }).then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /changeSocial() */
        changeContact: function changeContact() {
          var phoneText = $("#phone-text").val();
          var emailText = $("#email-text").val();
          axios.put('/settings/contact', {
            phoneText: phoneText,
            emailText: emailText
          }).then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        },

        /* /changeContact */
        changeAbout: function changeAbout() {
          var about = $("#about-text").val();
          axios.put('/settings/about', {
            aboutText: about
          }).then(function (response) {
            if (response.data.error == 0) {
              window.Toast.fire({
                icon: 'success',
                title: response.data.message
              });
            } else {
              window.Toast.fire({
                icon: 'error',
                title: response.data.message
              });
            }
          });
        }
        /* /changeAbout */

      };
    }
    /* /settingsController */

  },

  /* /methods() */
  mounted: function mounted() {
    var self = this;
    $(document).ready(function () {});
    /* /ready */
  }
  /* /mounted() */

});

/***/ }),

/***/ 13:
/*!*****************************************************!*\
  !*** multi ./resources/js/dashboards/admin/main.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/dashboards/admin/main.js */"./resources/js/dashboards/admin/main.js");


/***/ })

/******/ });