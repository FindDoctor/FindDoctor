/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.l = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };

/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};

/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};

/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

		eval("$(document).ready(function () {\n\tif (navigator.geolocation)\n\t\tnavigator.geolocation.getCurrentPosition(function (position) {\n\t\t\tinitMap(position.coords.latitude, position.coords.longitude);\n\t\t},\n\t\tfunction () {\n\t\t\tinitMap(-15.7217509, -48.0082761);\n\t\t});\n\telse\n\t\tinitMap(-15.7217509, -48.0082761);\n});\n\nfunction initMap(latitude, longitude) {\n\tvar uluru = {lat: latitude, lng: longitude};\n\n\tvar mapOptions = {\n\t\tcenter: uluru,\n\t\tzoom: 14,\n\t}\n\n\tvar map = new google.maps.Map(document.getElementById('map'), mapOptions);\n\n\tvar markerOptions = {\n\t\tposition: uluru,\n\t\tmap: map,\n\t\ttitle: \"Sua localização\"\n\t}\n\n\tvar marker = new google.maps.Marker(markerOptions);\n}\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2luZGV4LmpzPzhmZDUiXSwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuXHRpZiAobmF2aWdhdG9yLmdlb2xvY2F0aW9uKVxuXHRcdG5hdmlnYXRvci5nZW9sb2NhdGlvbi5nZXRDdXJyZW50UG9zaXRpb24oZnVuY3Rpb24gKHBvc2l0aW9uKSB7XG5cdFx0XHRpbml0TWFwKHBvc2l0aW9uLmNvb3Jkcy5sYXRpdHVkZSwgcG9zaXRpb24uY29vcmRzLmxvbmdpdHVkZSk7XG5cdFx0fSxcblx0XHRmdW5jdGlvbiAoKSB7XG5cdFx0XHRpbml0TWFwKC0xNS43MjE3NTA5LCAtNDguMDA4Mjc2MSk7XG5cdFx0fSk7XG5cdGVsc2Vcblx0XHRpbml0TWFwKC0xNS43MjE3NTA5LCAtNDguMDA4Mjc2MSk7XG59KTtcblxuZnVuY3Rpb24gaW5pdE1hcChsYXRpdHVkZSwgbG9uZ2l0dWRlKSB7XG5cdHZhciB1bHVydSA9IHtsYXQ6IGxhdGl0dWRlLCBsbmc6IGxvbmdpdHVkZX07XG5cblx0dmFyIG1hcE9wdGlvbnMgPSB7XG5cdFx0Y2VudGVyOiB1bHVydSxcblx0XHR6b29tOiAxNCxcblx0fVxuXG5cdHZhciBtYXAgPSBuZXcgZ29vZ2xlLm1hcHMuTWFwKGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdtYXAnKSwgbWFwT3B0aW9ucyk7XG5cblx0dmFyIG1hcmtlck9wdGlvbnMgPSB7XG5cdFx0cG9zaXRpb246IHVsdXJ1LFxuXHRcdG1hcDogbWFwLFxuXHRcdHRpdGxlOiBcIlN1YSBsb2NhbGl6YcOnw6NvXCJcblx0fVxuXG5cdHZhciBtYXJrZXIgPSBuZXcgZ29vZ2xlLm1hcHMuTWFya2VyKG1hcmtlck9wdGlvbnMpO1xufVxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvaW5kZXguanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);

	$('#logo-bottom').on( "click", function() {
	  $("html, body").animate({ scrollTop: 0 }, "slow");
	});




