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
/******/ 	return __webpack_require__(__webpack_require__.s = 17);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboards/admin/operations/users.js":
/*!***********************************************************!*\
  !*** ./resources/js/dashboards/admin/operations/users.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(window).ready(function () {
  // recalculate formsTable responsiveness because it's display attribute was none
  var users_loaded = 0;
  $("#users_tab").click(function () {
    setTimeout(function () {
      if (users_loaded == 0) {
        users_loaded = 1; // activate data tables

        window.usersTable = $('#all_users_table').DataTable({
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
          responsive: true,
          "pagingType": "full_numbers",
          "pageLength": 10,
          "ajax": {
            url: "/users",
            type: 'GET'
          },
          "columnDefs": [{
            "orderable": true,
            "targets": 0
          }, {
            className: "text-center",
            "targets": [3]
          }, {
            className: "no-pd",
            "targets": [4]
          }],
          columns: [{
            data: 'id',
            name: 'id',
            'visible': false
          }, {
            data: 'name',
            name: 'name'
          }, {
            data: 'email',
            name: 'email'
          }, {
            sortable: false,
            "render": function render(data, type, full, meta) {
              var state = '';
              var changeState;

              if (full.state == 1) {
                changeState = 0;
                state = 'checked';
              } else {
                changeState = 1;
              }

              return '<div style="direction:ltr;"><input onchange="App.UserController().changeState(' + full.id + ', ' + changeState + ')" id="checkbox_' + full.id + '" type="checkbox" class="checkbox" style="display:none;" ' + state + '/><label for="checkbox_' + full.id + '" class="switch" style="margin:auto;"><span class="switch__circle"><span class="switch__circle-inner"></span></span><span class="switch__left">Off</span><span class="switch__right">On</span></label></div>';
            }
          }, {
            sortable: false,
            "render": function render(data, type, full, meta) {
              var verified = '';
              var changeVerification;

              if (full.verified == 1) {
                changeVerification = 0;
                verified = 'checked';
              } else {
                changeVerification = 1;
              }

              return '<div style="direction:ltr;"><input onchange="App.UserController().changeVerification(' + full.id + ', ' + changeVerification + ')" id="verification_checkbox_' + full.id + '" type="checkbox" class="checkbox" style="display:none;" ' + verified + '/><label for="verification_checkbox_' + full.id + '" class="switch" style="margin:auto;"><span class="switch__circle"><span class="switch__circle-inner"></span></span><span class="switch__left">NO</span><span class="switch__right">YES</span></label></div>';
            }
          }, {
            sortable: false,
            "render": function render(data, type, full, meta) {
              var user_type = '';

              if (full.user_type == 0) {
                user_type = 'مشترى';
              } else if (full.user_type == 1) {
                user_type = 'بائع';
              } else if (full.user_type == 10) {
                user_type = 'إدارة';
              }

              return "\n                <div class=\"user-type\" onclick=\"App.UserController().changeAccountType(" + full.id + ", '" + full.email + "')\">\n                  " + user_type + " | <i class=\"fas fa-pen\"></i>\n                </div>";
            }
          }, {
            sortable: false,
            className: "tabel-actions",
            "render": function render(data, type, full, meta) {
              return '<button class="dt-btn" onclick="App.UserController().deleteUser(' + full.id + ')"  style="background-color: #f44336;"> <i class="material-icons">delete_forever</i></button><button onclick="App.ConversationController().chatWithUser(' + full.id + ',  ' + full.name + ')" class="dt-btn" style="background-color: #3f51b5;"><i class="far fa-comment-dots"></i></button>';
            }
          }],
          "order": [[0, 'desc']],
          "deferRender": true,
          "initComplete": function initComplete() {}
        });
      }

      usersTable.responsive.recalc();
    }, 300);
  });
});
/* /window ready */

/***/ }),

/***/ 17:
/*!*****************************************************************!*\
  !*** multi ./resources/js/dashboards/admin/operations/users.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/dashboards/admin/operations/users.js */"./resources/js/dashboards/admin/operations/users.js");


/***/ })

/******/ });