/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/scripts/scripts.js":
/*!***********************************!*\
  !*** ./assets/scripts/scripts.js ***!
  \***********************************/
/***/ (() => {

eval("var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');\nvar themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');\n\n// Change the icons inside the button based on previous settings\nif (localStorage.getItem('color-theme') === 'dark' || !('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {\n  themeToggleLightIcon.classList.remove('hidden');\n} else {\n  themeToggleDarkIcon.classList.remove('hidden');\n}\nvar themeToggleBtn = document.getElementById('theme-toggle');\nthemeToggleBtn.addEventListener('click', function () {\n  // toggle icons inside button\n  themeToggleDarkIcon.classList.toggle('hidden');\n  themeToggleLightIcon.classList.toggle('hidden');\n\n  // if set via local storage previously\n  if (localStorage.getItem('color-theme')) {\n    if (localStorage.getItem('color-theme') === 'light') {\n      document.documentElement.classList.add('dark');\n      localStorage.setItem('color-theme', 'dark');\n    } else {\n      document.documentElement.classList.remove('dark');\n      localStorage.setItem('color-theme', 'light');\n    }\n\n    // if NOT set via local storage previously\n  } else {\n    if (document.documentElement.classList.contains('dark')) {\n      document.documentElement.classList.remove('dark');\n      localStorage.setItem('color-theme', 'light');\n    } else {\n      document.documentElement.classList.add('dark');\n      localStorage.setItem('color-theme', 'dark');\n    }\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6WyJ0aGVtZVRvZ2dsZURhcmtJY29uIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsInRoZW1lVG9nZ2xlTGlnaHRJY29uIiwibG9jYWxTdG9yYWdlIiwiZ2V0SXRlbSIsIndpbmRvdyIsIm1hdGNoTWVkaWEiLCJtYXRjaGVzIiwiY2xhc3NMaXN0IiwicmVtb3ZlIiwidGhlbWVUb2dnbGVCdG4iLCJhZGRFdmVudExpc3RlbmVyIiwidG9nZ2xlIiwiZG9jdW1lbnRFbGVtZW50IiwiYWRkIiwic2V0SXRlbSIsImNvbnRhaW5zIl0sInNvdXJjZXMiOlsid2VicGFjazovL2JhcmVib25lcy8uL2Fzc2V0cy9zY3JpcHRzL3NjcmlwdHMuanM/MDQ4YyJdLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgdGhlbWVUb2dnbGVEYXJrSWNvbiA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd0aGVtZS10b2dnbGUtZGFyay1pY29uJyk7XG52YXIgdGhlbWVUb2dnbGVMaWdodEljb24gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgndGhlbWUtdG9nZ2xlLWxpZ2h0LWljb24nKTtcblxuLy8gQ2hhbmdlIHRoZSBpY29ucyBpbnNpZGUgdGhlIGJ1dHRvbiBiYXNlZCBvbiBwcmV2aW91cyBzZXR0aW5nc1xuaWYgKGxvY2FsU3RvcmFnZS5nZXRJdGVtKCdjb2xvci10aGVtZScpID09PSAnZGFyaycgfHwgKCEoJ2NvbG9yLXRoZW1lJyBpbiBsb2NhbFN0b3JhZ2UpICYmIHdpbmRvdy5tYXRjaE1lZGlhKCcocHJlZmVycy1jb2xvci1zY2hlbWU6IGRhcmspJykubWF0Y2hlcykpIHtcbiAgICB0aGVtZVRvZ2dsZUxpZ2h0SWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcbn0gZWxzZSB7XG4gICAgdGhlbWVUb2dnbGVEYXJrSWNvbi5jbGFzc0xpc3QucmVtb3ZlKCdoaWRkZW4nKTtcbn1cblxudmFyIHRoZW1lVG9nZ2xlQnRuID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3RoZW1lLXRvZ2dsZScpO1xuXG50aGVtZVRvZ2dsZUJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcblxuICAgIC8vIHRvZ2dsZSBpY29ucyBpbnNpZGUgYnV0dG9uXG4gICAgdGhlbWVUb2dnbGVEYXJrSWNvbi5jbGFzc0xpc3QudG9nZ2xlKCdoaWRkZW4nKTtcbiAgICB0aGVtZVRvZ2dsZUxpZ2h0SWNvbi5jbGFzc0xpc3QudG9nZ2xlKCdoaWRkZW4nKTtcblxuICAgIC8vIGlmIHNldCB2aWEgbG9jYWwgc3RvcmFnZSBwcmV2aW91c2x5XG4gICAgaWYgKGxvY2FsU3RvcmFnZS5nZXRJdGVtKCdjb2xvci10aGVtZScpKSB7XG4gICAgICAgIGlmIChsb2NhbFN0b3JhZ2UuZ2V0SXRlbSgnY29sb3ItdGhlbWUnKSA9PT0gJ2xpZ2h0Jykge1xuICAgICAgICAgICAgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNsYXNzTGlzdC5hZGQoJ2RhcmsnKTtcbiAgICAgICAgICAgIGxvY2FsU3RvcmFnZS5zZXRJdGVtKCdjb2xvci10aGVtZScsICdkYXJrJyk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnZGFyaycpO1xuICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ2NvbG9yLXRoZW1lJywgJ2xpZ2h0Jyk7XG4gICAgICAgIH1cblxuICAgICAgICAvLyBpZiBOT1Qgc2V0IHZpYSBsb2NhbCBzdG9yYWdlIHByZXZpb3VzbHlcbiAgICB9IGVsc2Uge1xuICAgICAgICBpZiAoZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNsYXNzTGlzdC5jb250YWlucygnZGFyaycpKSB7XG4gICAgICAgICAgICBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xhc3NMaXN0LnJlbW92ZSgnZGFyaycpO1xuICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ2NvbG9yLXRoZW1lJywgJ2xpZ2h0Jyk7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xhc3NMaXN0LmFkZCgnZGFyaycpO1xuICAgICAgICAgICAgbG9jYWxTdG9yYWdlLnNldEl0ZW0oJ2NvbG9yLXRoZW1lJywgJ2RhcmsnKTtcbiAgICAgICAgfVxuICAgIH1cblxufSk7Il0sIm1hcHBpbmdzIjoiQUFBQSxJQUFJQSxtQkFBbUIsR0FBR0MsUUFBUSxDQUFDQyxjQUFjLENBQUMsd0JBQXdCLENBQUM7QUFDM0UsSUFBSUMsb0JBQW9CLEdBQUdGLFFBQVEsQ0FBQ0MsY0FBYyxDQUFDLHlCQUF5QixDQUFDOztBQUU3RTtBQUNBLElBQUlFLFlBQVksQ0FBQ0MsT0FBTyxDQUFDLGFBQWEsQ0FBQyxLQUFLLE1BQU0sSUFBSyxFQUFFLGFBQWEsSUFBSUQsWUFBWSxDQUFDLElBQUlFLE1BQU0sQ0FBQ0MsVUFBVSxDQUFDLDhCQUE4QixDQUFDLENBQUNDLE9BQVEsRUFBRTtFQUNuSkwsb0JBQW9CLENBQUNNLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLFFBQVEsQ0FBQztBQUNuRCxDQUFDLE1BQU07RUFDSFYsbUJBQW1CLENBQUNTLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLFFBQVEsQ0FBQztBQUNsRDtBQUVBLElBQUlDLGNBQWMsR0FBR1YsUUFBUSxDQUFDQyxjQUFjLENBQUMsY0FBYyxDQUFDO0FBRTVEUyxjQUFjLENBQUNDLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFZO0VBRWpEO0VBQ0FaLG1CQUFtQixDQUFDUyxTQUFTLENBQUNJLE1BQU0sQ0FBQyxRQUFRLENBQUM7RUFDOUNWLG9CQUFvQixDQUFDTSxTQUFTLENBQUNJLE1BQU0sQ0FBQyxRQUFRLENBQUM7O0VBRS9DO0VBQ0EsSUFBSVQsWUFBWSxDQUFDQyxPQUFPLENBQUMsYUFBYSxDQUFDLEVBQUU7SUFDckMsSUFBSUQsWUFBWSxDQUFDQyxPQUFPLENBQUMsYUFBYSxDQUFDLEtBQUssT0FBTyxFQUFFO01BQ2pESixRQUFRLENBQUNhLGVBQWUsQ0FBQ0wsU0FBUyxDQUFDTSxHQUFHLENBQUMsTUFBTSxDQUFDO01BQzlDWCxZQUFZLENBQUNZLE9BQU8sQ0FBQyxhQUFhLEVBQUUsTUFBTSxDQUFDO0lBQy9DLENBQUMsTUFBTTtNQUNIZixRQUFRLENBQUNhLGVBQWUsQ0FBQ0wsU0FBUyxDQUFDQyxNQUFNLENBQUMsTUFBTSxDQUFDO01BQ2pETixZQUFZLENBQUNZLE9BQU8sQ0FBQyxhQUFhLEVBQUUsT0FBTyxDQUFDO0lBQ2hEOztJQUVBO0VBQ0osQ0FBQyxNQUFNO0lBQ0gsSUFBSWYsUUFBUSxDQUFDYSxlQUFlLENBQUNMLFNBQVMsQ0FBQ1EsUUFBUSxDQUFDLE1BQU0sQ0FBQyxFQUFFO01BQ3JEaEIsUUFBUSxDQUFDYSxlQUFlLENBQUNMLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLE1BQU0sQ0FBQztNQUNqRE4sWUFBWSxDQUFDWSxPQUFPLENBQUMsYUFBYSxFQUFFLE9BQU8sQ0FBQztJQUNoRCxDQUFDLE1BQU07TUFDSGYsUUFBUSxDQUFDYSxlQUFlLENBQUNMLFNBQVMsQ0FBQ00sR0FBRyxDQUFDLE1BQU0sQ0FBQztNQUM5Q1gsWUFBWSxDQUFDWSxPQUFPLENBQUMsYUFBYSxFQUFFLE1BQU0sQ0FBQztJQUMvQztFQUNKO0FBRUosQ0FBQyxDQUFDIiwiaWdub3JlTGlzdCI6W10sImZpbGUiOiIuL2Fzc2V0cy9zY3JpcHRzL3NjcmlwdHMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./assets/scripts/scripts.js\n");

/***/ }),

/***/ "./assets/styles/style.scss":
/*!**********************************!*\
  !*** ./assets/styles/style.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9hc3NldHMvc3R5bGVzL3N0eWxlLnNjc3MiLCJtYXBwaW5ncyI6IjtBQUFBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vYmFyZWJvbmVzLy4vYXNzZXRzL3N0eWxlcy9zdHlsZS5zY3NzP2Y2YzgiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./assets/styles/style.scss\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/scripts": 0,
/******/ 			"style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunkbarebones"] = self["webpackChunkbarebones"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["style"], () => (__webpack_require__("./assets/scripts/scripts.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["style"], () => (__webpack_require__("./assets/styles/style.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;