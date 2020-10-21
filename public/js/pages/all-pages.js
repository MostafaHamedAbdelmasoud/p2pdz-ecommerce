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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/all-pages.js":
/*!*****************************************!*\
  !*** ./resources/js/pages/all-pages.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#open-fixed-menu').on('click', function (e) {
    e.stopPropagation();
    $("#fixed-menu").addClass('visible-fixed-menu');
    $(window).click(function () {
      $("#fixed-menu").removeClass('visible-fixed-menu');
    });
  });
  $('#close-fixed-menu').on('click', function () {
    $("#fixed-menu").removeClass('visible-fixed-menu');
  });
  $('#fixed-menu').on('click', function (e) {
    e.stopPropagation();
  });
  $("#fixed-menu .one-tab").click(function () {
    $("#fixed-menu").removeClass('visible-fixed-menu');
  });
  $("#side-nav-money").click(function () {
    var el = $("#currencies_offers").offset().top;
    window.scroll({
      top: el,
      left: 0,
      behavior: "smooth"
    });
  });
  $("#side-nav-phone").click(function () {
    var el = $("#credit_offers").offset().top;
    window.scroll({
      top: el,
      left: 0,
      behavior: "smooth"
    });
  });
  $("#know-more, #side-nav-about").click(function () {
    var el = $("#about-site").offset().top;
    window.scroll({
      top: el,
      left: 0,
      behavior: "smooth"
    });
  });
  $("#wide-nav-contact, #side-nav-contact").click(function (e) {
    e.preventDefault();
    var el = $("#ft-social").offset().top;
    window.scroll({
      top: el,
      left: 0,
      behavior: "smooth"
    });
  });
  $("#wide-nav-packs, #side-nav-packs, #fixed-menu-packs").click(function (e) {
    e.preventDefault();
    var el = $("#packages-section").offset().top;
    window.scroll({
      top: el,
      left: 0,
      behavior: "smooth"
    });
  });
  $("#go-up, #goUpMini").click(function () {
    window.scroll({
      top: 0,
      left: 0,
      behavior: "smooth"
    });
  });
  $("#wide-nav-notification a").click(function (e) {
    e.stopPropagation();
    e.preventDefault();
    $("#notifications-wrapper").fadeToggle();
    $(window).click(function () {
      $("#notifications-wrapper").fadeOut();
    });
    $("#notifications-wrapper").html('<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>');
    axios.get('/user/notifications/').then(function (response) {
      $("#notifications-wrapper").html('');

      if (response.data.error == 0) {
        response.data.notifications.forEach(function (el) {
          var notificationIcon = '<i class="fas fa-bell"></i>';

          if (el.seen > 0) {
            var notificationIcon = '<i class="far fa-bell"></i>';
          }

          $("#notifications-wrapper").append("\n            \n            <div class=\"one-notification notification-btn\" data-notification-id=\"" + el.id + "\">\n                <div class=\"notification-icon\">" + notificationIcon + "</div>\n                <div class=\"notification-text\">" + el.content + "</div>\n                <div class=\"loading-notification\"><div class=\"lds-ellipsis\"><div></div><div></div><div></div><div></div></div></div>\n            </div>\n\n            ");
        });
        $("#notifications-wrapper").append("\n            \n            <div class=\"notifications-center\">\n                <a href=\"/notifications-center\">\u0645\u0631\u0643\u0632 \u0627\u0644\u0625\u0634\u0639\u0627\u0631\u0627\u062A &nbsp; <i class=\"far fa-flag\"></i></a>\n            </div>\n\n          ");
        openNotification();
      } else {
        $("#notifications-wrapper").append("\n          \n            <div class=\"notifications-center\" style=\"color: #d64535;border-bottom: 1px dashed #DDD;\">\n                \u0644\u0627 \u064A\u0648\u062C\u062F \u0625\u0634\u0639\u0627\u0631\u0627\u062A\n            </div>\n\n            <div class=\"notifications-center\">\n                <a href=\"/notifications-center\">\u0645\u0631\u0643\u0632 \u0627\u0644\u0625\u0634\u0639\u0627\u0631\u0627\u062A &nbsp; <i class=\"far fa-flag\"></i></a>\n            </div>\n\n          ");
      }
    });
  });

  function openNotification() {
    $(".notification-btn").off('click');
    $(".notification-btn").click(function (e) {
      var notificationRow = $(this);
      notificationRow.find('.loading-notification').addClass('loading-notification-active');
      e.stopPropagation();
      var notificationID = $(this).attr('data-notification-id');
      axios.get('/user/notifications/' + notificationID).then(function (response) {
        $('.loading-notification').removeClass('loading-notification-active');

        if (response.data.error == 0) {
          notificationRow.find('.notification-icon').html('<i class="far fa-bell"></i>');
          console.log(JSON.stringify(response.data.message));
          Swal.fire({
            confirmButtonText: 'إغلاق',
            html: response.data.message.content,
            customClass: {
              content: 'py-5',
              header: 'd-none'
            }
          });
          $(".swal2-container").click(function (e) {
            e.stopPropagation();
          });
        }
      });
    });
  }
});
/* /doc ready */

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/pages/all-pages.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/pages/all-pages.js */"./resources/js/pages/all-pages.js");


/***/ })

/******/ });