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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/manage/app.js":
/*!*********************************!*\
  !*** ./resources/manage/app.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("/**\n * This file is part of the O2System Framework package.\n *\n * For the full copyright and license information, please view the LICENSE\n * file that was distributed with this source code.\n *\n * @author         Steeve Andrian Salim\n * @copyright      Copyright (c) Steeve Andrian Salim\n */\n// ------------------------------------------------------------------------\nif ('serviceWorker' in navigator) {\n  navigator.serviceWorker.register('service-worker.js').then(function (registration) {\n    console.info('Service Worker registration successful with scope: ', registration.scope);\n  })[\"catch\"](function (err) {\n    console.error('Service Worker registration failed: ', err);\n  });\n} else {\n  console.error('Service Worker registration failed, insecure page, please serve your page over HTTPS or use localhost');\n} // $('body').on('click', 'a', function(e){\n//     if(typeof $(this).attr('target') == 'undefined') {\n//         e.preventDefault();\n//         $('.active').removeClass('active');\n//         var targetElement = $(this).data('target');\n//         if(typeof targetElement == 'undefined') {\n//             if($('#page-sub-content').length == 0) {\n//                 targetElement = 'page-content';\n//             } else {\n//                 targetElement = 'page-sub-content';\n//             }\n//         }\n//         $(this).addClass('active');\n//         $(this).closest('ul').find('.selected').removeClass('selected');\n//         $(this).closest('li').addClass('selected');\n//         window.history.pushState(null, null, $(this).attr('href'));\n//         $( '#' + targetElement ).load($(this).attr('href'), function(){\n//             $.getScript('/manage/themes/default/theme.js');\n//         });\n//     } else if($(this).attr('target') == '_self') {\n//         e.preventDefault();\n//         window.location = $(this).attr('href');\n//     }\n// });//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvbWFuYWdlL2FwcC5qcz9lZGI4Il0sIm5hbWVzIjpbIm5hdmlnYXRvciIsInNlcnZpY2VXb3JrZXIiLCJyZWdpc3RlciIsInRoZW4iLCJyZWdpc3RyYXRpb24iLCJjb25zb2xlIiwiaW5mbyIsInNjb3BlIiwiZXJyIiwiZXJyb3IiXSwibWFwcGluZ3MiOiJBQUFBOzs7Ozs7Ozs7QUFTQTtBQUVBLElBQUksbUJBQW1CQSxTQUF2QixFQUFrQztBQUM5QkEsV0FBUyxDQUFDQyxhQUFWLENBQ0tDLFFBREwsQ0FDYyxtQkFEZCxFQUVLQyxJQUZMLENBRVUsVUFBU0MsWUFBVCxFQUF1QjtBQUN6QkMsV0FBTyxDQUFDQyxJQUFSLENBQ0kscURBREosRUFFSUYsWUFBWSxDQUFDRyxLQUZqQjtBQUlILEdBUEwsV0FRVyxVQUFTQyxHQUFULEVBQWM7QUFDakJILFdBQU8sQ0FBQ0ksS0FBUixDQUFjLHNDQUFkLEVBQXNERCxHQUF0RDtBQUNILEdBVkw7QUFXSCxDQVpELE1BWU87QUFDSEgsU0FBTyxDQUFDSSxLQUFSLENBQWMsdUdBQWQ7QUFDSCxDLENBRUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFFQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL21hbmFnZS9hcHAuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFRoaXMgZmlsZSBpcyBwYXJ0IG9mIHRoZSBPMlN5c3RlbSBGcmFtZXdvcmsgcGFja2FnZS5cbiAqXG4gKiBGb3IgdGhlIGZ1bGwgY29weXJpZ2h0IGFuZCBsaWNlbnNlIGluZm9ybWF0aW9uLCBwbGVhc2UgdmlldyB0aGUgTElDRU5TRVxuICogZmlsZSB0aGF0IHdhcyBkaXN0cmlidXRlZCB3aXRoIHRoaXMgc291cmNlIGNvZGUuXG4gKlxuICogQGF1dGhvciAgICAgICAgIFN0ZWV2ZSBBbmRyaWFuIFNhbGltXG4gKiBAY29weXJpZ2h0ICAgICAgQ29weXJpZ2h0IChjKSBTdGVldmUgQW5kcmlhbiBTYWxpbVxuICovXG4vLyAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cblxuaWYgKCdzZXJ2aWNlV29ya2VyJyBpbiBuYXZpZ2F0b3IpIHtcbiAgICBuYXZpZ2F0b3Iuc2VydmljZVdvcmtlclxuICAgICAgICAucmVnaXN0ZXIoJ3NlcnZpY2Utd29ya2VyLmpzJylcbiAgICAgICAgLnRoZW4oZnVuY3Rpb24ocmVnaXN0cmF0aW9uKSB7XG4gICAgICAgICAgICBjb25zb2xlLmluZm8oXG4gICAgICAgICAgICAgICAgJ1NlcnZpY2UgV29ya2VyIHJlZ2lzdHJhdGlvbiBzdWNjZXNzZnVsIHdpdGggc2NvcGU6ICcsXG4gICAgICAgICAgICAgICAgcmVnaXN0cmF0aW9uLnNjb3BlXG4gICAgICAgICAgICApO1xuICAgICAgICB9KVxuICAgICAgICAuY2F0Y2goZnVuY3Rpb24oZXJyKSB7XG4gICAgICAgICAgICBjb25zb2xlLmVycm9yKCdTZXJ2aWNlIFdvcmtlciByZWdpc3RyYXRpb24gZmFpbGVkOiAnLCBlcnIpO1xuICAgICAgICB9KTtcbn0gZWxzZSB7XG4gICAgY29uc29sZS5lcnJvcignU2VydmljZSBXb3JrZXIgcmVnaXN0cmF0aW9uIGZhaWxlZCwgaW5zZWN1cmUgcGFnZSwgcGxlYXNlIHNlcnZlIHlvdXIgcGFnZSBvdmVyIEhUVFBTIG9yIHVzZSBsb2NhbGhvc3QnKTtcbn1cblxuLy8gJCgnYm9keScpLm9uKCdjbGljaycsICdhJywgZnVuY3Rpb24oZSl7XG4vLyAgICAgaWYodHlwZW9mICQodGhpcykuYXR0cigndGFyZ2V0JykgPT0gJ3VuZGVmaW5lZCcpIHtcbi8vICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuLy8gICAgICAgICAkKCcuYWN0aXZlJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuLy8gICAgICAgICB2YXIgdGFyZ2V0RWxlbWVudCA9ICQodGhpcykuZGF0YSgndGFyZ2V0Jyk7XG5cbi8vICAgICAgICAgaWYodHlwZW9mIHRhcmdldEVsZW1lbnQgPT0gJ3VuZGVmaW5lZCcpIHtcbi8vICAgICAgICAgICAgIGlmKCQoJyNwYWdlLXN1Yi1jb250ZW50JykubGVuZ3RoID09IDApIHtcbi8vICAgICAgICAgICAgICAgICB0YXJnZXRFbGVtZW50ID0gJ3BhZ2UtY29udGVudCc7XG4vLyAgICAgICAgICAgICB9IGVsc2Uge1xuLy8gICAgICAgICAgICAgICAgIHRhcmdldEVsZW1lbnQgPSAncGFnZS1zdWItY29udGVudCc7XG4vLyAgICAgICAgICAgICB9XG4vLyAgICAgICAgIH1cblxuLy8gICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuLy8gICAgICAgICAkKHRoaXMpLmNsb3Nlc3QoJ3VsJykuZmluZCgnLnNlbGVjdGVkJykucmVtb3ZlQ2xhc3MoJ3NlbGVjdGVkJyk7XG4vLyAgICAgICAgICQodGhpcykuY2xvc2VzdCgnbGknKS5hZGRDbGFzcygnc2VsZWN0ZWQnKTtcblxuLy8gICAgICAgICB3aW5kb3cuaGlzdG9yeS5wdXNoU3RhdGUobnVsbCwgbnVsbCwgJCh0aGlzKS5hdHRyKCdocmVmJykpO1xuLy8gICAgICAgICAkKCAnIycgKyB0YXJnZXRFbGVtZW50ICkubG9hZCgkKHRoaXMpLmF0dHIoJ2hyZWYnKSwgZnVuY3Rpb24oKXtcbi8vICAgICAgICAgICAgICQuZ2V0U2NyaXB0KCcvbWFuYWdlL3RoZW1lcy9kZWZhdWx0L3RoZW1lLmpzJyk7XG4vLyAgICAgICAgIH0pO1xuLy8gICAgIH0gZWxzZSBpZigkKHRoaXMpLmF0dHIoJ3RhcmdldCcpID09ICdfc2VsZicpIHtcbi8vICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuLy8gICAgICAgICB3aW5kb3cubG9jYXRpb24gPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcbi8vICAgICB9XG4vLyB9KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/manage/app.js\n");

/***/ }),

/***/ "./resources/manage/app.scss":
/*!***********************************!*\
  !*** ./resources/manage/app.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvbWFuYWdlL2FwcC5zY3NzPzFkODEiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUEiLCJmaWxlIjoiLi9yZXNvdXJjZXMvbWFuYWdlL2FwcC5zY3NzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiLy8gcmVtb3ZlZCBieSBleHRyYWN0LXRleHQtd2VicGFjay1wbHVnaW4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/manage/app.scss\n");

/***/ }),

/***/ "./resources/manage/themes/default/theme.scss":
/*!****************************************************!*\
  !*** ./resources/manage/themes/default/theme.scss ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvbWFuYWdlL3RoZW1lcy9kZWZhdWx0L3RoZW1lLnNjc3M/MDJiOCJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQSIsImZpbGUiOiIuL3Jlc291cmNlcy9tYW5hZ2UvdGhlbWVzL2RlZmF1bHQvdGhlbWUuc2Nzcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8vIHJlbW92ZWQgYnkgZXh0cmFjdC10ZXh0LXdlYnBhY2stcGx1Z2luIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/manage/themes/default/theme.scss\n");

/***/ }),

/***/ 0:
/*!****************************************************************************************************************!*\
  !*** multi ./resources/manage/app.js ./resources/manage/app.scss ./resources/manage/themes/default/theme.scss ***!
  \****************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Applications/MAMP/htdocs/o2system/boilerplate/nitro/resources/manage/app.js */"./resources/manage/app.js");
__webpack_require__(/*! /Applications/MAMP/htdocs/o2system/boilerplate/nitro/resources/manage/app.scss */"./resources/manage/app.scss");
module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/o2system/boilerplate/nitro/resources/manage/themes/default/theme.scss */"./resources/manage/themes/default/theme.scss");


/***/ })

/******/ });