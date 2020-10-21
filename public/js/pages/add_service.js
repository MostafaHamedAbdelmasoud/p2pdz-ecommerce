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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/add_service.js":
/*!*******************************************!*\
  !*** ./resources/js/pages/add_service.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $("#service_main_cat").on('change', function () {
    $("#service_sub_cat").css({
      'display': 'block'
    });
    $("#service_sub_cat option").removeAttr('selected');
    $("#service_sub_cat option:first-of-type").attr('selected', true);
    $(".service_sub_cat_opt").removeClass('active-sub-cat-opt');
    $(".sub_cat_opt_" + $(this).val()).addClass('active-sub-cat-opt');
  });
  $('#addNewNotificationBtnContainer button').on('click', function () {
    ToastLoading.fire({
      icon: 'info',
      html: '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>'
    });
    var form = new FormData();
    form.append('label', $("#service_label").val());
    form.append('main_cat', $("#service_main_cat").val());
    form.append('sub_cat', $("#service_sub_cat").val());
    form.append('quantity', $("#service_quantity").val());
    form.append('description', $("#add_service_desc").val());
    form.append('image', $('#service_image').prop('files')[0]);
    form.append('tags', $("#service_tags").val());
    form.append('duration', $("#service_time").val());
    form.append('requirments', $("#service_requirments").val());
    axios.post('/services/', form, {
      headers: {
        'Content-Type': 'multipart/form-data'
      },
      onUploadProgress: function onUploadProgress(progressEvent) {
        if (progressEvent.lengthComputable) {
          console.log(progressEvent.loaded + ' ' + progressEvent.total);
          /* var progress = ((progressEvent.loaded / progressEvent.total) * 100) + '%';
            $("#edit_credit_modal .progress").addClass('d-block');
            $("#edit_credit_modal .progress > div").css({ width: progress }); */
        }
      }
    }).then(function (response) {
      console.log(JSON.stringify(response));

      if (response.data.error == 1) {
        window.Toast.fire({
          icon: 'error',
          title: response.data.message
        });
      } else {
        //$("#add_service_tab_box input, #add_service_tab_box textarea").val(null);
        Swal.fire({
          icon: 'success',
          title: 'تمت إضافة الخدمة بنجاح',
          text: 'جارى مراجعة الخدمة بواسطة الإدارة و سيتم إشعارك فور الإنتهاء',
          footer: '<div style="text-align:center;font-size:16px"><a href="/">الرئيسة &nbsp; <i class="fas fa-home"></i></a> &nbsp;&nbsp;&nbsp; <a href="/my_services">خدماتى &nbsp; <i class="fas fa-layer-group"></i></a></div>',
          confirmButtonText: 'إغلاق',
          customClass: {
            confirmButton: 'mt-3'
          }
        });
        $(".service_box input, .service_box textarea").val(null);
      }
    });
  });
});
/* /ready() */

/***/ }),

/***/ 3:
/*!*************************************************!*\
  !*** multi ./resources/js/pages/add_service.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/pages/add_service.js */"./resources/js/pages/add_service.js");


/***/ })

/******/ });