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

eval("$('#tipoPaciente').click(function () {\n\t$('#tipoCadastro').hide();\n\t$('#crm').remove();\n\t$('#formCadastro').show();\n});\n\n$('#tipoMedico').click(function () {\n\t$('#tipoCadastro').hide();\n\t$('#cpf').remove();\n\t$('#formCadastro').show();\n});\n\n$('#alterar_dados_btn').click(function () {\n\t$('#alterarDados').show();\n\t$( \"input\" ).prop( \"disabled\", false );\n\t$('#voltar_btn').show();\n\t$('#alterar_dados_btn').hide();\n});\n\n$('#voltar_btn').click(function () {\n\t$( \"input\" ).prop( \"disabled\", true );\n\t$('#alterarDados').hide();\n\t$('#voltar_btn').hide();\n\t$('#alterar_dados_btn').show();\n});\n\n\n\n\nif($(\"#consultorios-list\").children().length >= 5){\n\t$(\"#consultorios-btn\").hide();\n}\n\n\n$('#btn-add').click(function(){\n\t$('#li_novo_consultorio').show();\n\t$(this).hide();\n});\n\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL3JlZ2lzdGVyLmpzPzU0NTUiXSwic291cmNlc0NvbnRlbnQiOlsiJCgnI3RpcG9QYWNpZW50ZScpLmNsaWNrKGZ1bmN0aW9uICgpIHtcblx0JCgnI3RpcG9DYWRhc3RybycpLmhpZGUoKTtcblx0JCgnI2NybScpLnJlbW92ZSgpO1xuXHQkKCcjZm9ybUNhZGFzdHJvJykuc2hvdygpO1xufSk7XG5cbiQoJyN0aXBvTWVkaWNvJykuY2xpY2soZnVuY3Rpb24gKCkge1xuXHQkKCcjdGlwb0NhZGFzdHJvJykuaGlkZSgpO1xuXHQkKCcjY3BmJykucmVtb3ZlKCk7XG5cdCQoJyNmb3JtQ2FkYXN0cm8nKS5zaG93KCk7XG59KTtcblxuJCgnI2FsdGVyYXJfZGFkb3NfYnRuJykuY2xpY2soZnVuY3Rpb24gKCkge1xuXHQkKCcjYWx0ZXJhckRhZG9zJykuc2hvdygpO1xuXHQkKCBcImlucHV0XCIgKS5wcm9wKCBcImRpc2FibGVkXCIsIGZhbHNlICk7XG5cdCQoJyN2b2x0YXJfYnRuJykuc2hvdygpO1xuXHQkKCcjYWx0ZXJhcl9kYWRvc19idG4nKS5oaWRlKCk7XG59KTtcblxuJCgnI3ZvbHRhcl9idG4nKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cdCQoIFwiaW5wdXRcIiApLnByb3AoIFwiZGlzYWJsZWRcIiwgdHJ1ZSApO1xuXHQkKCcjYWx0ZXJhckRhZG9zJykuaGlkZSgpO1xuXHQkKCcjdm9sdGFyX2J0bicpLmhpZGUoKTtcblx0JCgnI2FsdGVyYXJfZGFkb3NfYnRuJykuc2hvdygpO1xufSk7XG5cblxuXG5cbmlmKCQoXCIjY29uc3VsdG9yaW9zLWxpc3RcIikuY2hpbGRyZW4oKS5sZW5ndGggPj0gNSl7XG5cdCQoXCIjY29uc3VsdG9yaW9zLWJ0blwiKS5oaWRlKCk7XG59XG5cblxuJCgnI2J0bi1hZGQnKS5jbGljayhmdW5jdGlvbigpe1xuXHQkKCcjbGlfbm92b19jb25zdWx0b3JpbycpLnNob3coKTtcblx0JCh0aGlzKS5oaWRlKCk7XG59KTtcblxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvcmVnaXN0ZXIuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);