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

eval("/**\n * This file is part of the O2System Framework package.\n *\n * For the full copyright and license information, please view the LICENSE\n * file that was distributed with this source code.\n *\n * @author         Steeve Andrian Salim\n * @copyright      Copyright (c) Steeve Andrian Salim\n */\n// ------------------------------------------------------------------------\nif ('serviceWorker' in navigator) {\n  navigator.serviceWorker.register('service-worker.js').then(function (registration) {\n    console.info('Service Worker registration successful with scope: ', registration.scope);\n  })[\"catch\"](function (err) {\n    console.error('Service Worker registration failed: ', err);\n  });\n} else {\n  console.error('Service Worker registration failed, insecure page, please serve your page over HTTPS or use localhost');\n}\n\n$('body').on('click', 'a', function (e) {\n  if ($(this).attr('href') == '#' || $(this).attr('href') == 'javascript:void(0)') {\n    e.preventDefault();\n  } else if (typeof $(this).attr('target') == 'undefined') {\n    e.preventDefault();\n    $('.active').removeClass('active');\n    var targetElement = $(this).data('target');\n\n    if (typeof targetElement == 'undefined') {\n      if ($('#page-sub-content').length == 0) {\n        targetElement = 'page-content';\n      } else {\n        targetElement = 'page-sub-content';\n      }\n    }\n\n    $(this).addClass('active');\n    $(this).closest('ul').find('.selected').removeClass('selected');\n    $(this).closest('li').addClass('selected');\n    window.history.pushState(null, null, $(this).attr('href'));\n    $('#' + targetElement).load($(this).attr('href'), function () {\n      $.getScript('/manage/themes/default/theme.js');\n    });\n  } else if ($(this).attr('target') == '_self') {\n    e.preventDefault();\n    window.location = $(this).attr('href');\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvbWFuYWdlL2FwcC5qcz9lZGI4Il0sIm5hbWVzIjpbIm5hdmlnYXRvciIsInNlcnZpY2VXb3JrZXIiLCJyZWdpc3RlciIsInRoZW4iLCJyZWdpc3RyYXRpb24iLCJjb25zb2xlIiwiaW5mbyIsInNjb3BlIiwiZXJyIiwiZXJyb3IiLCIkIiwib24iLCJlIiwiYXR0ciIsInByZXZlbnREZWZhdWx0IiwicmVtb3ZlQ2xhc3MiLCJ0YXJnZXRFbGVtZW50IiwiZGF0YSIsImxlbmd0aCIsImFkZENsYXNzIiwiY2xvc2VzdCIsImZpbmQiLCJ3aW5kb3ciLCJoaXN0b3J5IiwicHVzaFN0YXRlIiwibG9hZCIsImdldFNjcmlwdCIsImxvY2F0aW9uIl0sIm1hcHBpbmdzIjoiQUFBQTs7Ozs7Ozs7O0FBU0E7QUFFQSxJQUFJLG1CQUFtQkEsU0FBdkIsRUFBa0M7QUFDOUJBLFdBQVMsQ0FBQ0MsYUFBVixDQUNLQyxRQURMLENBQ2MsbUJBRGQsRUFFS0MsSUFGTCxDQUVVLFVBQVNDLFlBQVQsRUFBdUI7QUFDekJDLFdBQU8sQ0FBQ0MsSUFBUixDQUNJLHFEQURKLEVBRUlGLFlBQVksQ0FBQ0csS0FGakI7QUFJSCxHQVBMLFdBUVcsVUFBU0MsR0FBVCxFQUFjO0FBQ2pCSCxXQUFPLENBQUNJLEtBQVIsQ0FBYyxzQ0FBZCxFQUFzREQsR0FBdEQ7QUFDSCxHQVZMO0FBV0gsQ0FaRCxNQVlPO0FBQ0hILFNBQU8sQ0FBQ0ksS0FBUixDQUFjLHVHQUFkO0FBQ0g7O0FBRURDLENBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVUMsRUFBVixDQUFhLE9BQWIsRUFBc0IsR0FBdEIsRUFBMkIsVUFBU0MsQ0FBVCxFQUFXO0FBQ2xDLE1BQUdGLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLE1BQWIsS0FBd0IsR0FBeEIsSUFBK0JILENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLE1BQWIsS0FBd0Isb0JBQTFELEVBQWdGO0FBQzVFRCxLQUFDLENBQUNFLGNBQUY7QUFDSCxHQUZELE1BRU8sSUFBRyxPQUFPSixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVIsQ0FBYSxRQUFiLENBQVAsSUFBaUMsV0FBcEMsRUFBaUQ7QUFDcERELEtBQUMsQ0FBQ0UsY0FBRjtBQUNBSixLQUFDLENBQUMsU0FBRCxDQUFELENBQWFLLFdBQWIsQ0FBeUIsUUFBekI7QUFDQSxRQUFJQyxhQUFhLEdBQUdOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU8sSUFBUixDQUFhLFFBQWIsQ0FBcEI7O0FBRUEsUUFBRyxPQUFPRCxhQUFQLElBQXdCLFdBQTNCLEVBQXdDO0FBQ3BDLFVBQUdOLENBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCUSxNQUF2QixJQUFpQyxDQUFwQyxFQUF1QztBQUNuQ0YscUJBQWEsR0FBRyxjQUFoQjtBQUNILE9BRkQsTUFFTztBQUNIQSxxQkFBYSxHQUFHLGtCQUFoQjtBQUNIO0FBQ0o7O0FBRUROLEtBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsUUFBUixDQUFpQixRQUFqQjtBQUVBVCxLQUFDLENBQUMsSUFBRCxDQUFELENBQVFVLE9BQVIsQ0FBZ0IsSUFBaEIsRUFBc0JDLElBQXRCLENBQTJCLFdBQTNCLEVBQXdDTixXQUF4QyxDQUFvRCxVQUFwRDtBQUNBTCxLQUFDLENBQUMsSUFBRCxDQUFELENBQVFVLE9BQVIsQ0FBZ0IsSUFBaEIsRUFBc0JELFFBQXRCLENBQStCLFVBQS9CO0FBRUFHLFVBQU0sQ0FBQ0MsT0FBUCxDQUFlQyxTQUFmLENBQXlCLElBQXpCLEVBQStCLElBQS9CLEVBQXFDZCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVIsQ0FBYSxNQUFiLENBQXJDO0FBQ0FILEtBQUMsQ0FBRSxNQUFNTSxhQUFSLENBQUQsQ0FBeUJTLElBQXpCLENBQThCZixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFHLElBQVIsQ0FBYSxNQUFiLENBQTlCLEVBQW9ELFlBQVU7QUFDMURILE9BQUMsQ0FBQ2dCLFNBQUYsQ0FBWSxpQ0FBWjtBQUNILEtBRkQ7QUFHSCxHQXRCTSxNQXNCQSxJQUFHaEIsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRRyxJQUFSLENBQWEsUUFBYixLQUEwQixPQUE3QixFQUFzQztBQUN6Q0QsS0FBQyxDQUFDRSxjQUFGO0FBQ0FRLFVBQU0sQ0FBQ0ssUUFBUCxHQUFrQmpCLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUcsSUFBUixDQUFhLE1BQWIsQ0FBbEI7QUFDSDtBQUNKLENBN0JEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL21hbmFnZS9hcHAuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvKipcbiAqIFRoaXMgZmlsZSBpcyBwYXJ0IG9mIHRoZSBPMlN5c3RlbSBGcmFtZXdvcmsgcGFja2FnZS5cbiAqXG4gKiBGb3IgdGhlIGZ1bGwgY29weXJpZ2h0IGFuZCBsaWNlbnNlIGluZm9ybWF0aW9uLCBwbGVhc2UgdmlldyB0aGUgTElDRU5TRVxuICogZmlsZSB0aGF0IHdhcyBkaXN0cmlidXRlZCB3aXRoIHRoaXMgc291cmNlIGNvZGUuXG4gKlxuICogQGF1dGhvciAgICAgICAgIFN0ZWV2ZSBBbmRyaWFuIFNhbGltXG4gKiBAY29weXJpZ2h0ICAgICAgQ29weXJpZ2h0IChjKSBTdGVldmUgQW5kcmlhbiBTYWxpbVxuICovXG4vLyAtLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS1cblxuaWYgKCdzZXJ2aWNlV29ya2VyJyBpbiBuYXZpZ2F0b3IpIHtcbiAgICBuYXZpZ2F0b3Iuc2VydmljZVdvcmtlclxuICAgICAgICAucmVnaXN0ZXIoJ3NlcnZpY2Utd29ya2VyLmpzJylcbiAgICAgICAgLnRoZW4oZnVuY3Rpb24ocmVnaXN0cmF0aW9uKSB7XG4gICAgICAgICAgICBjb25zb2xlLmluZm8oXG4gICAgICAgICAgICAgICAgJ1NlcnZpY2UgV29ya2VyIHJlZ2lzdHJhdGlvbiBzdWNjZXNzZnVsIHdpdGggc2NvcGU6ICcsXG4gICAgICAgICAgICAgICAgcmVnaXN0cmF0aW9uLnNjb3BlXG4gICAgICAgICAgICApO1xuICAgICAgICB9KVxuICAgICAgICAuY2F0Y2goZnVuY3Rpb24oZXJyKSB7XG4gICAgICAgICAgICBjb25zb2xlLmVycm9yKCdTZXJ2aWNlIFdvcmtlciByZWdpc3RyYXRpb24gZmFpbGVkOiAnLCBlcnIpO1xuICAgICAgICB9KTtcbn0gZWxzZSB7XG4gICAgY29uc29sZS5lcnJvcignU2VydmljZSBXb3JrZXIgcmVnaXN0cmF0aW9uIGZhaWxlZCwgaW5zZWN1cmUgcGFnZSwgcGxlYXNlIHNlcnZlIHlvdXIgcGFnZSBvdmVyIEhUVFBTIG9yIHVzZSBsb2NhbGhvc3QnKTtcbn1cblxuJCgnYm9keScpLm9uKCdjbGljaycsICdhJywgZnVuY3Rpb24oZSl7XG4gICAgaWYoJCh0aGlzKS5hdHRyKCdocmVmJykgPT0gJyMnIHx8ICQodGhpcykuYXR0cignaHJlZicpID09ICdqYXZhc2NyaXB0OnZvaWQoMCknKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICB9IGVsc2UgaWYodHlwZW9mICQodGhpcykuYXR0cigndGFyZ2V0JykgPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAkKCcuYWN0aXZlJykucmVtb3ZlQ2xhc3MoJ2FjdGl2ZScpO1xuICAgICAgICB2YXIgdGFyZ2V0RWxlbWVudCA9ICQodGhpcykuZGF0YSgndGFyZ2V0Jyk7XG5cbiAgICAgICAgaWYodHlwZW9mIHRhcmdldEVsZW1lbnQgPT0gJ3VuZGVmaW5lZCcpIHtcbiAgICAgICAgICAgIGlmKCQoJyNwYWdlLXN1Yi1jb250ZW50JykubGVuZ3RoID09IDApIHtcbiAgICAgICAgICAgICAgICB0YXJnZXRFbGVtZW50ID0gJ3BhZ2UtY29udGVudCc7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHRhcmdldEVsZW1lbnQgPSAncGFnZS1zdWItY29udGVudCc7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdhY3RpdmUnKTtcblxuICAgICAgICAkKHRoaXMpLmNsb3Nlc3QoJ3VsJykuZmluZCgnLnNlbGVjdGVkJykucmVtb3ZlQ2xhc3MoJ3NlbGVjdGVkJyk7XG4gICAgICAgICQodGhpcykuY2xvc2VzdCgnbGknKS5hZGRDbGFzcygnc2VsZWN0ZWQnKTtcblxuICAgICAgICB3aW5kb3cuaGlzdG9yeS5wdXNoU3RhdGUobnVsbCwgbnVsbCwgJCh0aGlzKS5hdHRyKCdocmVmJykpO1xuICAgICAgICAkKCAnIycgKyB0YXJnZXRFbGVtZW50ICkubG9hZCgkKHRoaXMpLmF0dHIoJ2hyZWYnKSwgZnVuY3Rpb24oKXtcbiAgICAgICAgICAgICQuZ2V0U2NyaXB0KCcvbWFuYWdlL3RoZW1lcy9kZWZhdWx0L3RoZW1lLmpzJyk7XG4gICAgICAgIH0pO1xuICAgIH0gZWxzZSBpZigkKHRoaXMpLmF0dHIoJ3RhcmdldCcpID09ICdfc2VsZicpIHtcbiAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICB3aW5kb3cubG9jYXRpb24gPSAkKHRoaXMpLmF0dHIoJ2hyZWYnKTtcbiAgICB9XG59KTsiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/manage/app.js\n");

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

__webpack_require__(/*! /private/var/www/frameworks/o2system/boilerplates/nitro/resources/manage/app.js */"./resources/manage/app.js");
__webpack_require__(/*! /private/var/www/frameworks/o2system/boilerplates/nitro/resources/manage/app.scss */"./resources/manage/app.scss");
module.exports = __webpack_require__(/*! /private/var/www/frameworks/o2system/boilerplates/nitro/resources/manage/themes/default/theme.scss */"./resources/manage/themes/default/theme.scss");


/***/ })

/******/ });