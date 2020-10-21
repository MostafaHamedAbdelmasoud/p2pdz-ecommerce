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
/******/ 	return __webpack_require__(__webpack_require__.s = 19);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboards/admin/operations/notifications.js":
/*!*******************************************************************!*\
  !*** ./resources/js/dashboards/admin/operations/notifications.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(window).ready(function () {
  // recalculate formsTable responsiveness because it's display attribute was none
  var notifications_loaded = 0;
  $("#notifications_tab").click(function () {
    if (notifications_loaded == 0) {
      notifications_loaded = 1; // activate data tables

      window.notificationsTable = $('#all_notifications_table').DataTable({
        responsive: true,
        language: {
          "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
          "sLoadingRecords": "جارٍ التحميل...",
          "sProcessing": "جارٍ التحميل...",
          "sLengthMenu": "أظهر _MENU_ مدخلات",
          "sZeroRecords": "لم يعثر على أية سجلات",
          "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
          "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
          "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
          "sInfoPostFix": "",
          "sSearch": "ابحث:",
          "sUrl": "",
          "oPaginate": {
            "sFirst": "الأول",
            "sPrevious": "السابق",
            "sNext": "التالي",
            "sLast": "الأخير"
          },
          "oAria": {
            "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
          }
        },
        "pagingType": "full_numbers",
        "pageLength": 10,
        "ajax": {
          url: "/notifications/",
          "data": {
            account_type: 'admin'
          },
          type: 'GET'
        },
        "columnDefs": [{
          targets: [0],
          orderable: true
        }],
        columns: [{
          data: 'id',
          name: 'id',
          'visible': false
        }, {
          data: 'content',
          name: 'content'
        }, {
          data: 'count',
          name: 'count'
        }, {
          data: 'views',
          name: 'views'
        }, {
          data: 'created_at',
          name: 'created_at'
        }, {
          sortable: false,
          className: "tabel-actions",
          "render": function render(data, type, full, meta) {
            return '<button class="bg-primary dt-btn" onclick="App.NotificationController().editNotification(\'' + full.delete_token + '\')"><i class="material-icons">edit</i></button><button class="bg-danger dt-btn" onclick="App.NotificationController().deleteNotification(\'' + full.delete_token + '\')"><i class="material-icons">delete_forever</i></button>';
          }
        }, {
          sortable: false,
          className: "tabel-actions",
          "render": function render(data, type, full, meta) {
            // if(!full.sent){
            console.log('this is sent ' + full.sent);
            return '<button class="bg-success dt-btn" onclick="App.NotificationController().emailNotification(\'' + full.id + '\')"><i class="fas fa-envelope-open"></i></button>'; // }else{
            // return '';
            // }
          }
        }],
        "order": [[0, "desc"]],
        "deferRender": true,
        "initComplete": function initComplete() {}
      });
    }

    notificationsTable.responsive.recalc();
  });
});
/* /window ready */

/***/ }),

/***/ 19:
/*!*************************************************************************!*\
  !*** multi ./resources/js/dashboards/admin/operations/notifications.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/dashboards/admin/operations/notifications.js */"./resources/js/dashboards/admin/operations/notifications.js");


/***/ })

/******/ });