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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/order.js":
/*!*************************************!*\
  !*** ./resources/js/pages/order.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#send-image').on('click', function () {
    $("#attachment").toggleClass('open-attachment');
    $('#customFile').val(null);
    $(".custom-file-label").text('إختر صورة');
  });
  $('#customFile').on('change', function () {
    //get the file name
    var fileName = $(this).val(); //replace the "Choose a file" label

    $(this).next('.custom-file-label').html(fileName);
  });
  /* add reply */

  $("#send-reply").click(function () {
    ToastLoading.fire({
      icon: 'info',
      html: '&nbsp; برجاء الإنتظار<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
    });
    $("#reply-progress").css({
      width: '0%'
    });
    $("#progress").fadeIn();
    var reply = $("#reply").val();
    var form = new FormData();
    form.append('image', $('#customFile').prop('files')[0]);
    form.append('reply', reply);
    axios.post('/orders/' + window.orderID + '/reply', form, {
      headers: {
        'Content-Type': 'multipart/form-data'
      },
      onUploadProgress: function onUploadProgress(progressEvent) {
        if (progressEvent.lengthComputable) {
          //console.log(progressEvent.loaded + ' ' + progressEvent.total);
          var progress = progressEvent.loaded / progressEvent.total * 100 + '%'; //$("#add_currency_modal .progress").addClass('d-block');

          $("#reply-progress").css({
            width: progress
          });
        }
      }
    }).then(function (response) {
      $("#reply-progress").css({
        width: '0%'
      });
      $("#progress").fadeOut();

      if (response.data.error == 0) {
        window.Toast.fire({
          icon: 'success',
          title: response.data.message
        });
        var replyImage = '';

        if (response.data.replyImage != '') {
          replyImage = response.data.replyImage;
        }

        $("#order-replies").append("\n        <div class=\"order-reply post\">\n          <div class=\"order-reply-user\">\n              <div class=\"post-user-image\">\n                <div class=\"post-image-circle\">\n                  <img\n                    src=\"" + response.data.image + "\"\n                    alt=\"\">\n                </div>\n              </div>\n              <div class=\"\">\n                <p>" + response.data.user + "</p>\n                <p>" + response.data.time + "</p>\n              </div>\n            </div>\n            <!-- /.order-reply-user -->\n\n            <div class=\"order-reply-text\">\n              " + response.data.comment + "\n            </div>\n            " + replyImage + "\n          </div>\n        </div>\n        ");
        $("#reply").val(null);
        $('#customFile').val(null);
        $(".custom-file-label").text('إختر صورة');
      } else {
        window.Toast.fire({
          icon: 'error',
          title: response.data.message
        });
      }
    });
  });
  /* check partner new comments */

  function checkNewComments() {
    var partner_id = window.partnerID;

    if ($(".partner-comment").length > 0) {
      var last_comment = $(".partner-comment").last().attr('data-comment-id');
    } else {
      var last_comment = 0;
    }

    axios.get('/orders/' + window.orderID + '/new-comments', {
      params: {
        partner_id: partner_id,
        last_comment: last_comment,
        order_state: window.orderState
      }
    }).then(function (response) {
      if (response.data.error == 0) {
        if (response.data.replies.length > 0) {
          window.Toast.fire({
            icon: 'success',
            title: response.data.message
          });
          response.data.replies.forEach(function (el) {
            var replyImage = '';

            if (el.replyImage != '') {
              replyImage = el.replyImage;
            }

            $("#order-replies").append("\n  \n                <div class=\"order-reply post partner-comment\" data-comment-id=\"" + el.id + "\"\n                data-comment-user-id=\"" + partner_id + "\">\n                  <div class=\"order-reply-user\">\n                      <div class=\"post-user-image\">\n                        <div class=\"post-image-circle\">\n                          <img\n                            src=\"" + el.image + "\"\n                            alt=\"\">\n                        </div>\n                      </div>\n                      <div class=\"\">\n                        <p>" + el.user + "</p>\n                        <p>" + el.time + "</p>\n                      </div>\n                    </div>\n                    <!-- /.order-reply-user -->\n        \n                    <div class=\"order-reply-text\">\n                      " + el.comment + "\n                    </div>\n                    " + replyImage + "\n                  </div>\n                </div>\n              ");
          });
        }

        if (window.userID != window.serviceUserID) {
          if (response.data.state != window.orderState) {
            if (response.data.state == 2) {
              var message = 'تم إنهاء الطلب بواسطة البائع';
              var icon = 'success';
              $("#order-td-state").text('إنتهى');
            }

            if (response.data.state == 3) {
              var message = 'تم إلغاء الطلب بواسطة البائع';
              var icon = 'warning';
              $("#order-td-state").text('ملغى');
            }

            Swal.fire('تغيرت حالة الطلب', message, icon);
            window.orderState = response.data.state;
          }
        }
      }
    })["catch"](function (error) {}).then(function () {
      // always executed
      setTimeout(checkNewComments, 1000);
    });
  }

  checkNewComments();
  /* rate the order */

  $(".star").click(function () {
    var rate = parseInt($(this).attr('id').split('-')[1]);
    ToastLoading.fire({
      icon: 'info',
      html: '&nbsp; برجاء الإنتظار<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
    });
    axios.post('/orders/' + window.orderID + '/rate', {
      rate: rate
    }).then(function (response) {
      if (response.data.error == 0) {
        window.Toast.fire({
          icon: 'success',
          title: response.data.message
        });
        var newRate = '';
        var starClass = '';
        var i;

        for (i = 1; i <= 5; i++) {
          if (rate >= i) {
            starClass = 'active-star';
          } else {
            starClass = '';
          }

          newRate += '<i class="fas fa-star ' + starClass + ' rated-star"></i>';
        }

        $("#stars").html(newRate);
        Swal.fire({
          title: 'هل تود إضافة تعليق على الخدمة ؟',
          text: "إضافة تعليق يساعد المشترون الجدد فى تحديد جودة الخدمة",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم, إضافة تعليق!'
        }).then(function (result) {
          if (result.value) {
            Swal.fire({
              position: 'center-center',
              icon: 'success',
              title: 'جارى تحويلك لخدمة',
              showConfirmButton: false,
              timer: 1500
            });
            window.location.href = "/services/" + window.serviceID + "/" + window.serviceLabel + "?action=new-comment";
          }
        });
      } else {
        window.Toast.fire({
          icon: 'error',
          title: response.data.message
        });
      }
    });
  });
  $("#report-btn").click(function () {
    Swal.fire({
      title: "تقديم شكوى",
      showCancelButton: true,
      confirmButtonText: 'إرسال <i class="far fa-paper-plane"></i>',
      cancelButtonText: "إلغاء",
      customClass: {
        confirmButton: 'btn btn-success btn-lg mx-2',
        cancelButton: 'btn btn-danger btn-lg mx-2'
      },
      buttonsStyling: false,
      showLoaderOnConfirm: true,
      html: "\n      <div id=\"post_issue\">\n        <textarea class=\"form-control\" style=\"text-align:justify;min-height:100px;margin-bottom:15px;font-size:16px;padding:10px;\" id=\"post_issue_textarea\" placeholder=\"\u0642\u0645 \u0628\u0643\u062A\u0627\u0628\u0629 \u0627\u0644\u0634\u0643\u0648\u0649 \u0647\u0646\u0627 \u0628\u0634\u0643\u0644 \u0645\u0641\u0635\u0644\"></textarea>\n      </div>\n      ",
      preConfirm: function preConfirm() {
        if (!$("#post_issue_textarea").val()) {
          Swal.showValidationMessage('بعض الحقول مطلوبة');
        } else {
          return axios.post('/orders/' + window.orderID + '/issue', {
            issue: $("#post_issue_textarea").val()
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
        }
      }
    });
    $("#post_issue_textarea").focus();
  });
  $('#endOrder').on('click', function () {
    Swal.fire({
      title: "هل أنت متأكد ؟",
      text: "لن تتمكن من تغيير الحالة مرة آخرى",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "إلغاء",
      confirmButtonText: "إستمرار"
    }).then(function (result) {
      if (result.value) {
        axios.put('/orders/' + window.orderID + '/state', {
          newState: 2
        }).then(function (response) {
          if (response.data.error == 0) {
            window.Toast.fire({
              icon: 'success',
              title: response.data.message
            });
            $(".order-state-btn").removeClass('active-seller-state');
            $("#endOrder").addClass('active-seller-state');
          } else {
            window.Toast.fire({
              icon: 'error',
              title: response.data.message
            });
          }
        });
      }
    });
  });
  $('#cancelOrder').on('click', function () {
    Swal.fire({
      title: "هل أنت متأكد ؟",
      text: "لن تتمكن من تغيير الحالة مرة آخرى",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "إلغاء",
      confirmButtonText: "إستمرار"
    }).then(function (result) {
      if (result.value) {
        axios.put('/orders/' + window.orderID + '/state', {
          newState: 3
        }).then(function (response) {
          if (response.data.error == 0) {
            window.Toast.fire({
              icon: 'success',
              title: response.data.message
            });
            $(".order-state-btn").removeClass('active-seller-state');
            $("#cancelOrder").addClass('active-seller-state');
          } else {
            window.Toast.fire({
              icon: 'error',
              title: response.data.message
            });
          }
        });
      }
    });
  });
});
/* /ready() */

/***/ }),

/***/ 8:
/*!*******************************************!*\
  !*** multi ./resources/js/pages/order.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/pages/order.js */"./resources/js/pages/order.js");


/***/ })

/******/ });