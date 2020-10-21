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
/******/ 	return __webpack_require__(__webpack_require__.s = 12);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/dashboards/faSelectorWidget.js":
/*!*****************************************************!*\
  !*** ./resources/js/dashboards/faSelectorWidget.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Developed by Harry K (xigeti.me/faselector)
$(document).ready(function () {
  $("#fa-selector").click(function () {
    openFaSelector($(this), event);
  }); // CONFIG
  //
  // FA VERSION
  //-----------
  // You can change the version of font awesome you're using to prevent any errors in icons.
  // The oldest version of font awesome currently supported on our CDN is 5.7.2.
  // If you're using an older version of font awesome, you will need to host a modified version of the icon json file.

  var FASIconVersion = "5.7.2"; // If you're using a locally hosted icon json file, add the url below.

  var FASiconUrl = "https://cdn.jsdelivr.net/gh/XigeTime/FontAwesome-Selector/cdn/faicons-v" + FASIconVersion + ".json"; //
  //
  // END CONFIG

  var faElCount = false,
      selectedFaIconList,
      faIcons;

  function selectFaIcon(icon, event) {// modify this to add your icon where desired
  }

  function openFaSelector(that, event) {
    if (event.target.parentElement.classList.contains("fa-child-container")) {
      if (event.target.getAttribute("onclick") != "selectFaIcon(this,event)") return false;
    } else if (!event.target.children.length) {
      loadJSON(function (response) {
        faIcons = JSON.parse(response);
        selectedFaIconList = JSON.parse(response).solid;
        event.target.classList.toggle('active');
        createFaElements(event);
        bindSearchTimers();
      });
    } else if (event.target.classList.contains("active")) {
      event.target.classList.toggle('active');
      event.target.children[0].style.display = "none";
    } else {
      event.target.classList.toggle('active');

      if (event.target.offsetHeight != event.target.children[0].style.bottom) {
        event.target.children[0].style.bottom = event.target.offsetHeight + 10;
      }

      event.target.children[0].style.display = "";
      event.target.children[0].children[0].focus();
    }
  }

  function toggleFaIconStyle(style, selectorNumber, event) {
    selectedFaIconList = style;
    var elem = document.querySelectorAll('.fa-child-container[data-num="' + selectorNumber + '"] > i');
    elem.forEach(function (elem) {
      elem.parentNode.removeChild(elem);
    });
    faSearchInput = document.querySelector('.fa-child-container[data-num="' + selectorNumber + '"] > input');
    var search = false;

    if (faSearchInput.value != "") {
      var search = true;
      faIconSearchResults = [];
      selectedFaIconList.forEach(function (icon) {
        if (icon.includes(faSearchInput.value)) {
          faIconSearchResults.push(icon);
        }
      });
      var style = faIconSearchResults;
    }

    populateFaIcons(search, faElCount, style);
  }

  function createFaElements(event) {
    // Create container element
    createContainer(event); // Add icon search

    createFaIconSearch(); // insert icons

    populateFaIcons(false, faElCount, selectedFaIconList);
  }

  function createContainer(event) {
    var faNode = document.createElement("div"),
        faChildNode = document.createElement("div"),
        style = document.createElement('style'),
        faDropPos = "top";

    if (!faElCount) {
      faElCount = 1;
    } else {
      faElCount++;
    } // Add attributes and style


    faNode.setAttribute("class", "fa-selector-container");
    faChildNode.setAttribute("class", "fa-child-container");
    faChildNode.setAttribute("style", "bottom:" + (event.target.offsetHeight + 10) + "px;");
    faChildNode.setAttribute("data-num", faElCount);
    event.target.setAttribute("data-num", faElCount);
    faContainerNode = faNode.appendChild(faChildNode);
  }

  function populateFaIcons(search, selectorNumber, style) {
    if (search == true) {
      iconsToPopulate = faIconSearchResults;
    } else {
      iconsToPopulate = selectedFaIconList;
    }

    iconsToPopulate.forEach(function (icon) {
      if (selectedFaIconList == faIcons.regular) {
        var prefix = "far";
      } else if (selectedFaIconList == faIcons.brands) {
        var prefix = "fab";
      } else {
        var prefix = "fas";
      }

      var i = document.createElement("i"),
          iconClassName = prefix + " fa-" + icon;
      i.setAttribute("class", iconClassName);
      i.setAttribute("onclick", "selectFaIcon(this,event)");
      faContainerNode.appendChild(i);
    });

    if (selectorNumber) {
      document.querySelector("#fa-selector[data-num='" + selectorNumber + "']").appendChild(faContainerNode);
    } else {
      document.querySelector("#fa-selector.active").appendChild(faContainerNode);
    }
  }

  function createFaIconSearch() {
    var searchNode = document.createElement("input");
    searchNode.setAttribute("class", "search-fa-selector");
    searchNode.setAttribute("placeholder", "Search icons...");
    searchNode.setAttribute("autofocus", "autofocus");
    faContainerNode.appendChild(searchNode);
  }

  function bindSearchTimers() {
    var faSearchTypingTimer;
    faSearchInterval = 500;
    document.querySelectorAll(".fa-child-container input").forEach(function (el) {
      el.addEventListener('keyup', function (event) {
        clearTimeout(faSearchTypingTimer);
        faSearchTypingTimer = setTimeout(runFaIconSearch(event), faSearchInterval);
      });
      el.addEventListener('keydown', clearTimeout(faSearchTypingTimer));
    });
  }

  function runFaIconSearch(event) {
    faIconSearchResults = [];
    faSearchInput = event.target.value;
    var selectorNumber = event.target.parentElement.getAttribute("data-num");
    var elem = document.querySelectorAll('.fa-child-container[data-num="' + selectorNumber + '"] > i');
    elem.forEach(function (elem) {
      elem.parentNode.removeChild(elem);
    });
    selectedFaIconList.forEach(function (icon) {
      if (icon.includes(faSearchInput)) {
        faIconSearchResults.push(icon);
      }
    });
    populateFaIcons(true, selectorNumber, selectedFaIconList);
    event.target.focus();
  }

  function loadJSON(callback) {
    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', FASiconUrl, true); // Replace 'my_data' with the path to your file

    xobj.onreadystatechange = function () {
      if (xobj.readyState == 4 && xobj.status == "200") {
        // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
        callback(xobj.responseText);
      }
    };

    xobj.send(null);
  }
});

/***/ }),

/***/ 12:
/*!***********************************************************!*\
  !*** multi ./resources/js/dashboards/faSelectorWidget.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/mostafa/Downloads/project mostaql/resources/js/dashboards/faSelectorWidget.js */"./resources/js/dashboards/faSelectorWidget.js");


/***/ })

/******/ });