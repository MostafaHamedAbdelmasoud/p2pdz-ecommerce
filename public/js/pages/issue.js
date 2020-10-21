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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/issue.js":
/*!*************************************!*\
  !*** ./resources/js/pages/issue.js ***!
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
    axios.post('/issues/' + window.issueID + '/reply', form, {
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

    axios.get('/issues/' + window.issueID + '/new-comments', {
      params: {
        last_comment: last_comment
      }
    }).then(function (response) {
      console.log(JSON.stringify(response.data.issue.state));

      if (response.data.issue.state == 1) {
        $("#order-footer #new-reply-container, #order-footer button, #order-footer  hr").remove();
        $("#order-footer #closed-case").removeClass('d-none');
      }

      if (response.data.error == 0) {
        if (response.data.message != '') {
          window.Toast.fire({
            icon: 'success',
            title: response.data.message
          });
        }

        response.data.replies.forEach(function (el) {
          var replyImage = '';

          if (el.replyImage != '') {
            replyImage = el.replyImage;
          }

          $("#order-replies").append("\n          <div class=\"order-reply post partner-comment\" data-comment-id=\"" + el.id + "\"\n          data-comment-user-id=\"" + el.user_id + "\">\n            <div class=\"order-reply-user\">\n                <div class=\"post-user-image\">\n                  <div class=\"post-image-circle\">\n                    <img\n                      src=\"" + el.image + "\"\n                      alt=\"\">\n                  </div>\n                </div>\n                <div class=\"\">\n                  <p>" + el.user + "</p>\n                  <p>" + el.time + "</p>\n                </div>\n              </div>\n              <!-- /.order-reply-user -->\n  \n              <div class=\"order-reply-text\">\n                " + el.comment + "\n              </div>\n              " + replyImage + "\n            </div>\n          </div>\n          ");
        });
      }
    })["catch"](function (error) {}).then(function () {
      // always executed
      setTimeout(checkNewComments, 1000);
    });
  }

  checkNewComments();
  /* close case */

  $("#close-case").click(function () {
    // 
    Swal.fire({
      title: "هل أنت متأكد ؟",
      text: "لن تستطيع تغير الحالة مرة آخرى !",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: "إغلاق",
      cancelButtonText: "إلغاء"
    }).then(function (result) {
      if (result.value) {
        axios.post('/issues/' + window.issueID + '/close').then(function (response) {
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
    });
  });
});
/* /ready() */

/***/ }),

/***/ 4:
/*!*******************************************!*\
  !*** multi ./resources/js/pages/issue.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/pages/issue.js */"./resources/js/pages/issue.js");


/***/ })

/******/ });