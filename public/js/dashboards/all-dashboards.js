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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardComponent.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['csrf', 'username', 'user_type', 'user_img_card', 'user_img_thumb'],
  data: function data() {
    return {
      tabs: [],
      isOpend: false,
      openNotifications: false,
      openMessages: false,
      loadPreviousNotifications: true,
      loadPreviousMessages: true,
      change_password: '',
      log_out: ''
    };
  },
  created: function created() {
    this.tabs = this.$children;
  },
  methods: {
    openTab: function openTab(tabs, selectedTab) {
      tabs.forEach(function (tab) {
        tab.isActive = tab.id == selectedTab.id;
        tab.isGroupOpen = false;

        if (tab.group) {
          tab.$children.forEach(function (subTab) {
            subTab.isActive = false;
          });
        }
      });
      this.isOpend = false;
    },
    openSubTab: function openSubTab(groupTab, subTab) {
      this.tabs.forEach(function (tab) {
        tab.isActive = tab.id == groupTab.id;

        if (tab.group) {
          if (tab.id != groupTab.id) {
            tab.$children.forEach(function (child) {
              child.isActive = false;
            });
          }
        }
      });
      groupTab.$children.forEach(function (tab) {
        tab.isActive = tab.id == subTab.id;
      });
      this.isOpend = false;
    },
    openSubMenu: function openSubMenu(selectedTab) {
      this.tabs.forEach(function (tab) {
        if (tab.id == selectedTab.id) {
          if (tab.isGroupOpen) {
            tab.isGroupOpen = false;
          } else {
            tab.isGroupOpen = true;
          }
        } else {
          tab.isGroupOpen = false;
        }
      });
    },
    changePassword: function changePassword(auth, id) {
      // if changing the logged in account password ( auth = true ) by default 
      // no need to provide parameters but must provide false if admin changing user password
      auth = typeof auth !== 'undefined' ? auth : true; // if changing user account password by admin we need the account id

      id = typeof id !== 'undefined' ? id : false;
      Swal.fire({
        title: window.translation.change_password,
        showCancelButton: true,
        confirmButtonText: window.translation.save,
        cancelButtonText: window.translation.cancel,
        customClass: {
          confirmButton: 'button is-primary is-rounded m-3',
          cancelButton: 'button is-danger is-rounded'
        },
        buttonsStyling: false,
        showLoaderOnConfirm: true,
        html: "<input id=\"old_password\" type=\"password\" placeholder=\"" + window.translation.old_password + "\" class=\"form-control change_password_field text-center\">\n            <input id=\"new_password\" type=\"password\" placeholder=\"" + window.translation.new_password + "\" class=\"form-control change_password_field text-center\">\n            <input id=\"new_password_confirmation\" type=\"password\" placeholder=\"" + window.translation.new_password_confirmation + "\" class=\"form-control change_password_field text-center\">",
        preConfirm: function preConfirm() {
          var old_password = $("#old_password").val();
          var new_password = $("#new_password").val();
          var new_password_confirmation = $("#new_password_confirmation").val();

          if (!old_password || !new_password || !new_password_confirmation) {
            Swal.showValidationMessage('Please fill in all fields');
          } else {
            return axios.put('/users/' + id + '/password', {
              logged_in: auth,
              user_id: id,
              old_password: old_password,
              new_password: new_password,
              new_password_confirmation: new_password_confirmation
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
          window.Toast.fire({
            icon: 'success',
            title: result.value.message
          });
        }
      });
    }
    /* changePassword() */

  },
  mounted: function mounted() {
    var self = this;
    $(window).ready(function () {
      self.change_password = window.translation.change_password;
      self.log_out = window.translation.log_out;

      if (self.$props.user_type == 0) {// user only functionality
      } else {// admin only functionality
        }
      /* if(window.translation.domain =="www.koooramubasher.com" || window.translation.domain == "koooramubasher.com" || window.translation.domain == '127.0.0.1:8000'){
       } else {
        $("#vue-dashboard").html('');
      } */

    });
    /* /ready() */
  }
  /* /mounted() */

});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardElementComponent.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    'id': {
      required: true
    },
    'label': {
      required: true
    },
    'icon': {
      required: true
    },
    'selected': {
      "default": false
    },
    'group': {
      "default": false
    },
    'groupOpen': {
      "default": false
    },
    'no_tab': {
      "default": false
    }
  },
  data: function data() {
    return {
      isActive: false,
      isGroupOpen: false,
      elementId: false
    };
  },
  methods: {},
  computed: {},
  mounted: function mounted() {
    this.isActive = this.selected;
    this.isGroupOpen = this.groupOpen;
    this.elementId = this.id.toLowerCase().replace(/ /g, '_');
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--18-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--18-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\nthead > tr > th{\r\n  background-color: #5568d2 !important;\n}\n.dashboard{\r\n  display: flex;\r\n  height: 100vh;\r\n  text-align: center;\n}\n.dashboard-menu-side{\r\n  width: 280px;\r\n  height: 100vh;\r\n  color: var(--main-color);\r\n  background-color: #343a40;\r\n  position: absolute;\r\n  top: 0;\r\n  left: 0;\r\n  transform: translate3d(-30% , 0, 0);\r\n  padding: 0 2px;\r\n  box-shadow: 1px 0px 30px #2f3033;\r\n  z-index: 20;\r\n  transition: visibility 0.2s ease, opacity 0.2s ease, transform 0.2s ease;\r\n  background: linear-gradient(90deg, #5a5a5ab0 0%, rgba(24, 24, 24, 0.88) 48%, #343a40 99%);\n}\n[dir=\"rtl\"] .dashboard-menu-side{\r\n  right: 0;\r\n  transform: translate3d(30% , 0, 0);\n}\n.dashboard-menu-side , .dashboard-menu-side .simplebar-content-wrapper{\r\n  visibility: hidden;\r\n  opacity: 0;\n}\n.dashboard-menu-side .simplebar-content-wrapper{\r\n  transition: visibility 0.2s, opacity 0.2s ease;\n}\n.opendMenu, .opendMenu .simplebar-content-wrapper, [dir=\"rtl\"] .opendMenu, [dir=\"rtl\"]  .opendMenu .simplebar-content-wrapper{\r\n  transform: translate3d(0 , 0, 0);\r\n  visibility: visible;\r\n  opacity: 1;\r\n  transition: visibility 0.2s ease, opacity 0.2s ease, transform 0.2s ease;\n}\n.dashboard-menu-side-close{\r\n  height: 100%;\r\n  width: 100%;\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  border-radius: 50%;\r\n  padding-top: 2px;\r\n  font-size: 26px;\n}\n[dir='rtl'] .dashboard-menu-side-close{\r\n  left: 5px;\r\n  right: auto;\n}\n.dashboard-menu-side-close:hover{\r\n  background-color: rgb(43, 43, 43);\r\n  color: #FFF;\r\n  box-shadow: 0 0 5px #31de6d;\n}\n.dashboard-menu-side-character-img{\r\n  height: 175px;\r\n  padding: 0 15px;\r\n  display: flex;\r\n  align-items: center;\r\n  direction: ltr;\n}\n.dashboard-main-profile-img{\r\n  justify-content: center;\r\n  border-radius: 50%;\r\n  height: 150px;\r\n  flex: 1;\r\n  width: 140px;\r\n  display: flex;\r\n  padding-right: 22px;\n}\n.dashboard-menu-vertical-btns{\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  align-items: center;\r\n  margin-right: auto;\r\n  margin-top: 66px;\n}\n.dashboard-menu-vertical-btns > div{\r\n  color: #ffffff;\r\n  display: flex;\r\n  justify-content: center;\r\n  align-items: center;\r\n  border: 1px solid #DDD;\r\n  height: 35px;\r\n  width: 50px;\r\n  margin: 5px 0;\r\n  border: 3px solid #ffffff2e;\r\n  border-radius: 10px;\n}\n.dashboard-menu-vertical-btns > div:nth-of-type(1){\r\n  position: absolute;\r\n  top: 6px;\r\n  right: 10px;\r\n  border: 1px solid var(--light-border-color);\r\n  color: #FFF;\r\n  width: 50px;\r\n  height: 50px;\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  cursor: pointer;\r\n  border-radius: 50%;\r\n  font-size: 22px;\r\n  background-color: rgba(255,255,255,.15);\n}\n.dashboard-menu-side-character-img img{\r\n  -o-object-fit: cover;\r\n     object-fit: cover;\r\n  height: 150px;\r\n  width: 150px;\r\n  border-radius: 50%;\r\n  box-shadow: 0px 0px 13px #3a3a3a5e;\r\n  border: 4px solid #fafafa33;\n}\n.dashboard-menu-side-tabs-container{\r\n  border: 2px solid #fafafa33;\r\n  border-bottom: 0;\r\n  overflow: hidden;\r\n  padding: 5px;\r\n  margin: 5px;\r\n  border-radius: 5px;\n}\n.dashboard-menu-side-tabs{\r\n  height: calc( 100vh - 175px );\r\n  background-color: #ffffff;\r\n  position: relative;\r\n  padding: 0 5px 15px;\r\n  border-bottom: navajowhite;\r\n  box-shadow: 0 0 13px #0000005e inset;\r\n  border-bottom: none;\r\n  border-radius: 3px;\n}\n.dashboard-content-side{\r\n  flex: 1;\n}\n.dashboard-content-side-header{\r\n  display: flex;\r\n  padding: 12px 10px 10px 10px;\r\n  border-bottom: 1px solid rgba(221, 221, 221, 0.326);\r\n  background-color: var(--main-color);\r\n  z-index: 19;\r\n  position: relative;\r\n  box-shadow: 0px 0px 5px grey;\r\n  height: 74px;\n}\n.dashboard-menu-side-toggle-tab{\r\n  border: 1px solid var(--light-border-color);\r\n  color: #FFF;\r\n  width: 50px;\r\n  height: 50px;\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  cursor: pointer;\r\n  border-radius: 50%;\r\n  font-size: 22px;\r\n  margin-right: auto;  \r\n  background-color: rgba(255,255,255,.15);\n}\n[dir=\"rtl\"] .dashboard-menu-side-toggle-tab{\r\n  margin-left: auto;\r\n  margin-right: 0;\n}\n.dashboard-menu-side-toggle-tab:hover , .go-home-icon:hover{\r\n  background-color: rgb(43, 43, 43);\r\n  color: #FFF;\r\n  box-shadow: 0 0 5px #31de6d;\n}\n.dashboard-tab{\r\n  display: flex;\r\n  padding: 5px 0;\r\n  cursor: pointer;\r\n  text-transform: capitalize;\r\n  text-shadow: 0 0 1px var(--gray);\r\n  border-bottom: 1px solid #DDD;\r\n  background-color: #ffffff;\r\n  border-bottom: 0;\r\n  color: #343a40;\r\n  box-shadow: 0 0 5px grey;\r\n  border-radius: 3px;\r\n  margin: 5px 0;\n}\n.messages, .notifications{\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  cursor: pointer;\n}\n.messages > div:nth-of-type(2), .notifications > div:nth-of-type(2){\r\n  font-size: 24px;\r\n  width: 60px;\r\n  cursor: pointer;\n}\n.messages > div:nth-of-type(2):hover, .notifications > div:nth-of-type(2):hover{\r\n  color: grey;\n}\n.messagesAndNotifications{\r\n  display: flex;\r\n  margin: 0 0 0 20px;\r\n  color: #FFF;\r\n  display: none;\n}\n.messagesAndNotifications > div{\r\n  position: relative;\r\n  border: 1px solid var(--light-border-color);\r\n  border-radius: 60px;\r\n  background-color: rgba(255,255,255,.15);\r\n  width: 50px;\r\n  align-items: center;\r\n  margin: 0 10px;\n}\n.notificationsCounter, .messagesCounter{\r\n  position: absolute;\r\n  top: -2px;\r\n  left: -10px;\r\n  background-color: #ff000073;\r\n  padding: 0 5px;\r\n  min-width: 25px;\r\n  height: 25px;\r\n  border-radius: 25px;\n}\n.dashboard-tab:not(.dashboard-tab-sub):hover, .active-dashboard-tab{\r\n  background-color: rgb(58, 58, 58);\r\n  color: #FFF;\r\n  border-bottom: 0;\r\n  background: linear-gradient(90deg, #5a5a5ab0 0%, rgba(24, 24, 24, 0.88) 48%, #343a40 99%);\r\n  box-shadow: 0 0 5px grey;\r\n  border-radius: 3px;\n}\n.dashboard-tab-icon{\r\n  width: 40px;\r\n  border-right: 1px solid var(--dark);\r\n  font-size: 20px;\n}\n[dir=\"rtl\"] .dashboard-tab-icon{\r\n  border-left: 1px solid #c7c7c7;\r\n  border-right: none;\n}\n.dashboard-tab-label{\r\n  flex: 1;\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  text-align: left;\r\n  padding-left: 10px;\n}\n[dir=\"rtl\"] .dashboard-tab-label{\r\n  text-align: right;\r\n  padding-right: 10px;\r\n  padding-left: 0\n}\n.dashboard-tab-sub{\r\n  background-color: #FFF;\r\n  box-shadow: none !important;\r\n  border-top: 1px solid #DDD;\r\n  display: none;\n}\n.dashboard-tab-sub:hover, .active-sub-dashboard-tab{\r\n  background-color: #cccccc !important;\r\n  color: #000;\n}\n.active-dashboard-group-tab {\r\n  margin-bottom: 10px;\r\n  border-radius: 3px;\r\n  overflow: hidden;\r\n  box-shadow: 0px 0px 5px #00000082;\n}\n.active-dashboard-group-tab {\r\n  background-color: #3f51b53d;\n}\n.active-dashboard-group-tab > div{\r\n  background-color: transparent;\n}\n.active-dashboard-group-tab > div:nth-of-type(1){\r\n  background-color: #27272787;\r\n  color: #FFF;\n}\n.active-dashboard-group-tab .dashboard-tab-sub{\r\n  border-radius: 0;\r\n  transform: translate3d(0 , 0, 0) !important;\r\n  font-size: 13px !important;\r\n  padding: 8px 0;\n}\n.active-dashboard-group-tab .dashboard-tab-sub .dashboard-tab-icon{\r\n  font-size: 13px !important;\n}\n.active-dashboard-group-tab > div:nth-of-type(1){\r\n  border-bottom-left-radius: 0 !important;\r\n  border-bottom-right-radius: 0 !important;\n}\n.active-dashboard-group-tab .dashboard-tab-sub{\r\n  display: flex;\n}\n.active-dashboard-group-tab .active-dashboard-tab{\r\n  margin: 0 !important;\n}\n.active-dashboard-group-tab .dashboard-tab-sub{\r\n  margin: 0;\n}\n.dashboard-tab-group > div:nth-of-type(1) .dashboard-tab-label{\r\n  display: flex;\r\n  flex-direction: row;\n}\n.active-dashboard-group-tab > div{\r\n  margin: 0;\n}\n.dashboard-tab-group  > div:nth-of-type(1) .dashboard-tab-label > div{\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center\n}\n.dashboard-tab-group  > div:nth-of-type(1) .dashboard-tab-label > div:nth-of-type(1){\r\n  flex: 1;\n}\n.dashboard-tab-group  > div:nth-of-type(1) .dashboard-tab-label > div:nth-of-type(2){\r\n  width: 40px;\r\n  text-align: center;\n}\n.currentUser{\r\n  position: relative;\r\n  width: calc( 100% - 190px );\r\n  max-width: 200px;\r\n  margin-left: 10px;\r\n  border: 1px solid var(--light-border-color);\r\n  border-radius: 51px;\r\n  background-color: rgba(255,255,255,.15);\r\n  transition: border-radius 0.2s ease;\n}\n.currentUserTab{\r\n  height: 50px;\r\n  display: flex;\r\n  justify-content: center;\r\n  color: #FFF;\r\n  font-size: 25px;\r\n  cursor: pointer;\n}\n.currentUserTab > div{\r\n  display: flex;\r\n  justify-content: center;\r\n  line-height: 50px;\n}\n.currentUserTab > div:nth-of-type(2){\r\n  flex: 1;\n}\n.currentUserTab > div > div:nth-of-type(1){\r\n  padding-left: 5px;\r\n  white-space: nowrap;\r\n  overflow: hidden;\r\n  text-overflow: ellipsis;\n}\n.currentUserTab > div > div:nth-of-type(2){\r\n  padding: 0 5px 0 15px;\n}\n.currentUserOperations{\r\n  width: 100%;\r\n  visibility: hidden;\r\n  border-radius: 6px;\r\n  box-shadow: 0px 0px 10px #80808087;\r\n  position: relative;\r\n  z-index: 20;\n}\n.currentUserOperations > div{\r\n  background-color: #fff;\r\n  transition: all 0.3s ease;\r\n  opacity: 0;\n}\n.currentUserOperations > div:nth-of-type(1){\r\n  transform: translateY(10px);\n}\n.currentUserOperations > div:nth-of-type(2){\r\n  transform: translateY(20px);\n}\n.currentUserOperations > div:hover{\r\n  background-color: #EEE;\n}\n.changePassword{\r\n  border-bottom: 1px solid #DDD;\r\n  border-radius: 5px 5px 0 0;\n}\n.logoutForm{\r\n  border-radius: 0 0 5px 5px;\n}\n.currentUser:hover{\r\n  border-bottom: none;\r\n  border-radius: 10px 10px 0 0;\n}\n.currentUser:hover .currentUserOperations{\r\n  visibility: visible;\r\n  transition: all 0.3s ease;\n}\n.table .thead-dark th{\r\n  background-color: #343a40 !important;\n}\n.currentUser:hover .currentUserOperations > div{\r\n  transform: translateY(0);\r\n  opacity: 1;\r\n  box-shadow: 0px 0px 5px #13131357;\n}\n.currentUser:hover .currentUserOperations > div:nth-of-type(1){\r\n  border-bottom: none;\r\n  border-radius: 0;\r\n  height: 46px;\n}\n.currentUser button{\r\n  width: 100%;\r\n  height: 100%;\r\n  background-color: transparent;\r\n  border: none;\r\n  padding: 10px;\r\n  color: grey;\r\n  outline: none;\r\n  display: flex;\n}\n.currentUser button > div:nth-of-type(1){\r\n  flex: 1;\n}\n.currentUser button:hover{\r\n  color: #000\n}\n.currentUserTabImg img{\r\n  height: 40px;\r\n  border-radius: 40px;\r\n  width: 40px;\r\n  -o-object-fit: cover;\r\n     object-fit: cover;\r\n  margin: 4px;\n}\n.mdl-tooltip{\r\n  font-size: 14px;\r\n  background-color: #f14668a1;\n}\n.tt{\r\n  outline: none !important;\n}\n#notificationsWrapper, #messagesWrapper{\r\n  position: absolute;\r\n  top: 64px;\r\n  left: -10px;\r\n  width: 270px;\r\n  visibility: hidden;\r\n  opacity: 0;\r\n  transition: visibility 0.2s ease, opacity 0.2s ease;\n}\n.notifications-content-wrapper, .messages-content-wrapper{\r\n  background-color: #FFF;\r\n  box-shadow: 1px 1px 5px grey;\r\n  color: grey;\r\n  border-radius: 3px;\r\n  max-height: 280px;\n}\n#notificationsWrapper .simplebar-content-wrapper, #messagesWrapper .simplebar-content-wrapper{\r\n  visibility: hidden;\r\n  transition: visibility 0.2s ease\n}\n#notificationsWrapper.notificationOpend, #notificationsWrapper.notificationOpend .simplebar-content-wrapper,   #messagesWrapper.messageOpend, #messagesWrapper.messageOpend .simplebar-content-wrapper{\r\n  visibility: visible;\r\n  opacity: 1;\n}\n#notificationsWrapper::before, #messagesWrapper::before{\r\n  content: '';\r\n  display: inline-block;\r\n  border: 10px solid #FFF;\r\n  position: absolute;\r\n  left: 24px;\r\n  top: -20px;\r\n  border-right-color: transparent;\r\n  border-left-color: transparent;\r\n  border-top-color: transparent;\n}\n#notificationsWrapper .scroll-content > .header-notification-row,  #messagesWrapper .scroll-content > .header-message-row{\r\n  border-bottom: 1px solid #DDD;\r\n  width: 100%;\r\n  height: 40px;\r\n  line-height: 40px;\r\n  display: flex;\n}\n#notificationsWrapper .scroll-content > .header-notification-row > div, #messagesWrapper .scroll-content > .header-message-row > div{\r\n  padding: 0 5px;\n}\n#notificationsWrapper .scroll-content > .header-notification-row > div:nth-of-type(1), #messagesWrapper .scroll-content > .header-message-row > div:nth-of-type(1){\r\n  width: 40px;\r\n  border-right: 1px solid #DDD;\n}\n#notificationsWrapper .scroll-content > .header-notification-row > div:nth-of-type(2), #messagesWrapper .scroll-content > .header-message-row > div:nth-of-type(2){\r\n  flex: 1;\r\n  white-space: nowrap;\r\n  overflow: hidden;\r\n  text-overflow: ellipsis;\r\n  position: relative;\n}\n#notificationsWrapper .scroll-content > .header-notification-row > div:nth-of-type(2) > div:nth-of-type(2), #messagesWrapper .scroll-content > .header-message-row > div:nth-of-type(2) > div:nth-of-type(2){\r\n  white-space: nowrap;\r\n  overflow: hidden;\r\n  text-overflow: ellipsis;\r\n  position: relative;\r\n  width: 100%;\n}\n.header-notifications-label, .header-messages-label{\r\n  text-align: left;\r\n  text-transform: capitalize;\r\n  font-weight: 600;\r\n  padding: 5px;\r\n  color: #FFF;\r\n  background-color: var(--main-color);\r\n  box-shadow: 1px 1px 3px grey;\r\n  position: relative;\r\n  z-index: 1;\n}\n.header-notification-row:hover, .header-message-row:hover{\r\n  color: #b80707bd;\n}\n.notSeen{\r\n  background-color: #EEE;\n}\n.notificationAndMessageloadingAnimation{\r\n  position: absolute;\r\n  top: 0;\r\n  left: 0;\r\n  right: 0;\r\n  margin: auto;\r\n  background-color: #fff;\r\n  opacity: 0;\r\n  visibility: hidden;\r\n  transition: visibility 0.2s ease, opacity 0.2s ease;\n}\n.notificationAndMessageloadingAnimation .lds-ellipsis div{\r\n  top: 14px;\n}\n.notificationAndMessageloadingAnimation-active{\r\n  visibility: visible;\r\n  opacity: 0.6;\n}\n.messagesWrapperLoading, .notificationsWrapperLoading{\r\n  background-color: #FFF;\r\n  box-shadow: 1px 1px 5px grey;\r\n  width: 100%;\n}\r\n\r\n\r\n/* settings */\n.settings_container .simplebar-content{\r\n  display: flex;\r\n  flex-wrap: wrap;\r\n  justify-content: center\n}\n.settings-box{\r\n  width: 48%;\r\n  border: 1px solid #DDD;\r\n  padding: 0 15px 15px 15px;\r\n  margin: 1%;\n}\n.settings-box-label{\r\n  border-bottom: 1px dashed #DDD;\r\n  text-align: left;\r\n  padding: 10px 0;\r\n  color: var(--main-color);\r\n  font-weight: 600;\r\n  margin-bottom: 10px;\n}\n[dir='rtl'] .settings-box-label{\r\n  text-align: right;\n}\n@media screen and (max-width: 800px){\n.settings-box{\r\n    width: calc(100% - 20px );\r\n    padding: 10px;\r\n    margin: 10px;\n}\n}\n.element_content_container{\r\n  height: calc( 100vh - 110px );\r\n  padding: 20px;\r\n  position: relative;\n}\n.element_content_container_label{\r\n  text-align: left;\r\n  border-bottom: 1px solid #DDD;\r\n  color: #dc3545;\r\n  background-color: #EEE;\r\n  padding: 10px;\r\n  text-transform: capitalize;\r\n  font-weight: bold;\r\n  margin: 0 !important;\r\n  font-size: 20px;\n}\n[dir=\"rtl\"] .element_content_container_label{\r\n  text-align: right;\n}\n.dash-btn{\r\n  background-color: var(--main-color) !important;\n}\n.go-home-icon{\r\n  border: 1px solid var(--light-border-color);\r\n  color: #FFF;\r\n  width: 50px;\r\n  height: 50px;\r\n  display: flex;\r\n  flex-direction: column;\r\n  justify-content: center;\r\n  cursor: pointer;\r\n  border-radius: 50%;\r\n  font-size: 22px;\r\n  margin: 0 15px;\r\n  background-color: rgba(255,255,255,.15);\n}\n.go-home-icon a{\r\n  color: #FFF;\n}\r\n\r\n\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--18-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--18-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.dashboard-element, .dashboard-element .simplebar-content{\r\n  visibility: hidden;\r\n  opacity: 0;\r\n  will-change: opacity, visibility;\n}\n.activeDashboardElement{\r\n  position: absolute;\r\n  top: 74px;\r\n  left: 0;\r\n  width: 100%;\r\n  z-index: 1;\n}\n.activeDashboardElement .activeDashboardElement{\r\n  top: 0;\n}\n.activeDashboardElement, .activeDashboardElement .simplebar-content{\r\n  visibility: visible;\r\n  opacity: 1;\r\n  transition: visibility 0.1s, opacity 0.3s ease;\n}\r\n\r\n\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--18-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--18-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--18-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--18-2!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardComponent.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--18-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--18-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--18-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--18-2!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardElementComponent.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=template&id=01ab55f4&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardComponent.vue?vue&type=template&id=01ab55f4& ***!
  \*********************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "dashboard",
      attrs: { id: "vue-dashboard" },
      on: {
        click: function($event) {
          _vm.openNotifications = false
          _vm.openMessages = false
        }
      }
    },
    [
      _c(
        "div",
        {
          staticClass: "dashboard-menu-side",
          class: { opendMenu: _vm.isOpend }
        },
        [
          _c("div", { staticClass: "dashboard-menu-side-character-img" }, [
            _c("div", { staticClass: "dashboard-main-profile-img" }, [
              _c("img", { attrs: { src: this.$props.user_img_card } })
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "dashboard-menu-vertical-btns" }, [
              _c("div", [
                _c(
                  "div",
                  {
                    staticClass: "dashboard-menu-side-close tt",
                    attrs: { id: "tt1" },
                    on: {
                      click: function($event) {
                        _vm.isOpend = false
                      }
                    }
                  },
                  [_c("i", { staticClass: "fas fa-times" })]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "mdl-tooltip mdl-tooltip--left",
                    attrs: { "data-mdl-for": "tt1" }
                  },
                  [_vm._v("Close Menu")]
                )
              ]),
              _vm._v(" "),
              _c("div", [_vm._v("8")]),
              _vm._v(" "),
              _c("div", [_vm._v("9")])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "dashboard-menu-side-tabs-container" }, [
            _c(
              "div",
              { staticClass: "dashboard-menu-side-tabs" },
              _vm._l(_vm.tabs, function(tab) {
                return _c("div", { key: tab.id }, [
                  !tab.group
                    ? _c(
                        "div",
                        {
                          staticClass: "dashboard-tab",
                          class: {
                            "active-dashboard-tab": tab.isActive,
                            "d-none": tab.no_tab
                          },
                          attrs: { id: tab.elementId },
                          on: {
                            click: function($event) {
                              return _vm.openTab(_vm.tabs, tab)
                            }
                          }
                        },
                        [
                          _c("div", { staticClass: "dashboard-tab-icon" }, [
                            _c("i", { class: tab.icon })
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "dashboard-tab-label" }, [
                            _vm._v(_vm._s(tab.label))
                          ])
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  tab.group
                    ? _c(
                        "div",
                        {
                          staticClass: "dashboard-tab-group",
                          class: {
                            "active-dashboard-group-tab": tab.isGroupOpen
                          }
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass: "dashboard-tab",
                              class: { "active-dashboard-tab": tab.isActive },
                              on: {
                                click: function($event) {
                                  $event.stopPropagation()
                                  return _vm.openSubMenu(tab)
                                }
                              }
                            },
                            [
                              _c("div", { staticClass: "dashboard-tab-icon" }, [
                                _c("i", { class: tab.icon })
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                { staticClass: "dashboard-tab-label" },
                                [
                                  _c("div", [_vm._v(_vm._s(tab.label))]),
                                  _vm._v(" "),
                                  _c("div", [
                                    tab.isGroupOpen
                                      ? _c("i", {
                                          staticClass: "fas fa-chevron-up"
                                        })
                                      : _vm._e(),
                                    _vm._v(" "),
                                    !tab.isGroupOpen
                                      ? _c("i", {
                                          staticClass: "fas fa-chevron-down"
                                        })
                                      : _vm._e()
                                  ])
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _vm._l(tab.$children, function(subtab) {
                            return _c(
                              "div",
                              {
                                key: subtab.id,
                                staticClass: "dashboard-tab dashboard-tab-sub",
                                class: {
                                  "active-sub-dashboard-tab": subtab.isActive,
                                  "d-none": subtab.no_tab
                                },
                                attrs: { id: subtab.elementId },
                                on: {
                                  click: function($event) {
                                    return _vm.openSubTab(tab, subtab)
                                  }
                                }
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "dashboard-tab-icon" },
                                  [_c("i", { class: subtab.icon })]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "dashboard-tab-label" },
                                  [_vm._v(_vm._s(subtab.label))]
                                )
                              ]
                            )
                          })
                        ],
                        2
                      )
                    : _vm._e()
                ])
              }),
              0
            )
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "dashboard-content-side",
          on: {
            click: function($event) {
              _vm.isOpend = false
            }
          }
        },
        [
          _c("div", { staticClass: "dashboard-content-side-header" }, [
            _c(
              "div",
              {
                staticClass: "dashboard-menu-side-toggle-tab tt",
                attrs: { id: "tt2" },
                on: {
                  click: function($event) {
                    $event.stopPropagation()
                    _vm.isOpend = true
                  }
                }
              },
              [_c("i", { staticClass: "fas fa-bars" })]
            ),
            _vm._v(" "),
            _c(
              "div",
              {
                staticClass: "mdl-tooltip mdl-tooltip--right",
                attrs: { "data-mdl-for": "tt2" }
              },
              [_vm._v("Open Menu")]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "messagesAndNotifications" }, [
              _c(
                "div",
                {
                  staticClass: "notifications",
                  on: {
                    click: function($event) {
                      $event.stopPropagation()
                      return _vm.viewNotifications()
                    }
                  }
                },
                [
                  _c("div", [
                    this.$props.user_type == 0
                      ? _c("div", { staticClass: "notificationsCounter" }, [
                          _vm._v("0")
                        ])
                      : _vm._e()
                  ]),
                  _vm._v(" "),
                  _vm._m(0),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "mdl-tooltip mdl-tooltip--bottom",
                      attrs: { "data-mdl-for": "tt3" }
                    },
                    [_vm._v("View Notifications")]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      class: { notificationOpend: _vm.openNotifications },
                      attrs: { id: "notificationsWrapper" },
                      on: {
                        click: function($event) {
                          $event.stopPropagation()
                        }
                      }
                    },
                    [
                      _c("div", { staticClass: "header-notifications-label" }, [
                        _vm._v("Notifications")
                      ]),
                      _vm._v(" "),
                      _vm._m(1),
                      _vm._v(" "),
                      _c("div", {
                        staticClass: "notifications-content-wrapper",
                        attrs: { "data-scrollbar": "" }
                      })
                    ]
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "div",
                {
                  staticClass: "messages",
                  on: {
                    click: function($event) {
                      $event.stopPropagation()
                      return _vm.viewMessages()
                    }
                  }
                },
                [
                  _c("div", [
                    this.$props.user_type == 0
                      ? _c("div", { staticClass: "messagesCounter" }, [
                          _vm._v("0")
                        ])
                      : _vm._e()
                  ]),
                  _vm._v(" "),
                  _vm._m(2),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass: "mdl-tooltip mdl-tooltip--bottom",
                      attrs: { "data-mdl-for": "tt4" }
                    },
                    [_vm._v("View Messages")]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      class: { messageOpend: _vm.openMessages },
                      attrs: { id: "messagesWrapper" },
                      on: {
                        click: function($event) {
                          $event.stopPropagation()
                        }
                      }
                    },
                    [
                      _c("div", { staticClass: "header-messages-label" }, [
                        _vm._v("Messages")
                      ]),
                      _vm._v(" "),
                      _vm._m(3),
                      _vm._v(" "),
                      _c("div", {
                        staticClass: "messages-content-wrapper",
                        attrs: { "data-scrollbar": "" }
                      })
                    ]
                  )
                ]
              )
            ]),
            _vm._v(" "),
            _vm._m(4),
            _vm._v(" "),
            _c("div", { staticClass: "currentUser" }, [
              _c("div", { staticClass: "currentUserTab" }, [
                _c("div", { staticClass: "currentUserTabImg" }, [
                  _c("img", { attrs: { src: this.$props.user_img_thumb } })
                ]),
                _vm._v(" "),
                _c("div", [
                  _c("div", [_vm._v(_vm._s(_vm.username))]),
                  _vm._m(5)
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "currentUserOperations" }, [
                _c("div", { staticClass: "changePassword" }, [
                  _c(
                    "button",
                    {
                      on: {
                        click: function($event) {
                          return _vm.changePassword()
                        }
                      }
                    },
                    [
                      _c("div", [_vm._v(_vm._s(_vm.change_password))]),
                      _vm._m(6)
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "logoutForm" }, [
                  _c(
                    "form",
                    { attrs: { action: "/users/logout", method: "POST" } },
                    [
                      _c("input", {
                        attrs: { type: "hidden", name: "_token" },
                        domProps: { value: _vm.csrf }
                      }),
                      _vm._v(" "),
                      _c("button", { attrs: { type: "submit" } }, [
                        _c("div", [_vm._v(_vm._s(_vm.log_out))]),
                        _vm._m(7)
                      ])
                    ]
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _vm._t("default")
        ],
        2
      )
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "tt", attrs: { id: "tt3" } }, [
      _c("i", { staticClass: "far fa-bell" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "notificationsWrapperLoading" }, [
      _c("div", { staticClass: "lds-ellipsis" }, [
        _c("div"),
        _c("div"),
        _c("div"),
        _c("div")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "tt", attrs: { id: "tt4" } }, [
      _c("i", { staticClass: "far fa-envelope" })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "messagesWrapperLoading" }, [
      _c("div", { staticClass: "lds-ellipsis" }, [
        _c("div"),
        _c("div"),
        _c("div"),
        _c("div")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "go-home-icon" }, [
      _c("a", { attrs: { href: "/" } }, [
        _c("i", { staticClass: "fas fa-home" })
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [_c("i", { staticClass: "far fa-user" })])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [
      _c("i", { staticClass: "material-icons" }, [_vm._v("vpn_key")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [_c("i", { staticClass: "fas fa-power-off" })])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=template&id=4632c48c&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DashboardElementComponent.vue?vue&type=template&id=4632c48c& ***!
  \****************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass: "dashboard-element",
      class: { activeDashboardElement: _vm.isActive }
    },
    [_vm._t("default")],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/DashboardComponent.vue":
/*!********************************************************!*\
  !*** ./resources/js/components/DashboardComponent.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DashboardComponent_vue_vue_type_template_id_01ab55f4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DashboardComponent.vue?vue&type=template&id=01ab55f4& */ "./resources/js/components/DashboardComponent.vue?vue&type=template&id=01ab55f4&");
/* harmony import */ var _DashboardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DashboardComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/DashboardComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./DashboardComponent.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _DashboardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DashboardComponent_vue_vue_type_template_id_01ab55f4___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DashboardComponent_vue_vue_type_template_id_01ab55f4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/DashboardComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/DashboardComponent.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/DashboardComponent.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--18-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--18-2!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardComponent.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/DashboardComponent.vue?vue&type=template&id=01ab55f4&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/DashboardComponent.vue?vue&type=template&id=01ab55f4& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_template_id_01ab55f4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardComponent.vue?vue&type=template&id=01ab55f4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardComponent.vue?vue&type=template&id=01ab55f4&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_template_id_01ab55f4___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardComponent_vue_vue_type_template_id_01ab55f4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/DashboardElementComponent.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/DashboardElementComponent.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DashboardElementComponent_vue_vue_type_template_id_4632c48c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DashboardElementComponent.vue?vue&type=template&id=4632c48c& */ "./resources/js/components/DashboardElementComponent.vue?vue&type=template&id=4632c48c&");
/* harmony import */ var _DashboardElementComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DashboardElementComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/DashboardElementComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./DashboardElementComponent.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _DashboardElementComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DashboardElementComponent_vue_vue_type_template_id_4632c48c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DashboardElementComponent_vue_vue_type_template_id_4632c48c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/DashboardElementComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/DashboardElementComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/DashboardElementComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardElementComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--18-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--18-2!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardElementComponent.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_18_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_18_2_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/DashboardElementComponent.vue?vue&type=template&id=4632c48c&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/DashboardElementComponent.vue?vue&type=template&id=4632c48c& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_template_id_4632c48c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./DashboardElementComponent.vue?vue&type=template&id=4632c48c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DashboardElementComponent.vue?vue&type=template&id=4632c48c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_template_id_4632c48c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DashboardElementComponent_vue_vue_type_template_id_4632c48c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/dashboards/all-dashboards.js":
/*!***************************************************!*\
  !*** ./resources/js/dashboards/all-dashboards.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('dashboard', __webpack_require__(/*! ./../components/DashboardComponent.vue */ "./resources/js/components/DashboardComponent.vue")["default"]);
Vue.component('dashboard_element', __webpack_require__(/*! ./../components/DashboardElementComponent.vue */ "./resources/js/components/DashboardElementComponent.vue")["default"]);
window.Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: function onOpen(toast) {
    toast.addEventListener('mouseenter', Swal.stopTimer);
    toast.addEventListener('mouseleave', Swal.resumeTimer);
  }
});
window.ToastLoading = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timerProgressBar: true,
  onOpen: function onOpen(toast) {
    toast.addEventListener('mouseenter', Swal.stopTimer);
    toast.addEventListener('mouseleave', Swal.resumeTimer);
  }
});

/***/ }),

/***/ 11:
/*!*********************************************************!*\
  !*** multi ./resources/js/dashboards/all-dashboards.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/dashboards/all-dashboards.js */"./resources/js/dashboards/all-dashboards.js");


/***/ })

/******/ });