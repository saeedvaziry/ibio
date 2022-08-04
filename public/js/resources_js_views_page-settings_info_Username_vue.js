"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_page-settings_info_Username_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/page-settings/info/Username.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/page-settings/info/Username.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Username',
  data: function data() {
    return {
      searchQuery: this.$page.props.user.username,
      isTyping: false,
      isLoading: false,
      keyUp: false,
      saving: false,
      checked: false
    };
  },
  watch: {
    searchQuery: _.debounce(function () {
      this.isTyping = false;
    }, 700),
    isTyping: function isTyping(value) {
      if (!value && this.keyUp && this.searchQuery.length > 0) {
        this.search(this.searchQuery);
      }
    }
  },
  methods: {
    search: function search(searchQuery) {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.isLoading = true;
                _context.next = 3;
                return _this.$inertia.post(route('page-settings.info.check-username'), {
                  username: searchQuery
                });

              case 3:
                _this.keyUp = false;
                _this.isLoading = false;
                _this.checked = true;

              case 6:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    save: function save() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this2.saving = true;
                _context2.next = 3;
                return _this2.$inertia.post(route('page-settings.info.username'), {
                  username: _this2.searchQuery
                }, {
                  preserveScroll: true
                });

              case 3:
                _this2.saving = false;

              case 4:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  }
});

/***/ }),

/***/ "./resources/js/views/page-settings/info/Username.vue":
/*!************************************************************!*\
  !*** ./resources/js/views/page-settings/info/Username.vue ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Username_vue_vue_type_template_id_1b4aba9a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Username.vue?vue&type=template&id=1b4aba9a& */ "./resources/js/views/page-settings/info/Username.vue?vue&type=template&id=1b4aba9a&");
/* harmony import */ var _Username_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Username.vue?vue&type=script&lang=js& */ "./resources/js/views/page-settings/info/Username.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Username_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Username_vue_vue_type_template_id_1b4aba9a___WEBPACK_IMPORTED_MODULE_0__.render,
  _Username_vue_vue_type_template_id_1b4aba9a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/page-settings/info/Username.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/page-settings/info/Username.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/views/page-settings/info/Username.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Username_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Username.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/page-settings/info/Username.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Username_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/page-settings/info/Username.vue?vue&type=template&id=1b4aba9a&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/views/page-settings/info/Username.vue?vue&type=template&id=1b4aba9a& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Username_vue_vue_type_template_id_1b4aba9a___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Username_vue_vue_type_template_id_1b4aba9a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Username_vue_vue_type_template_id_1b4aba9a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Username.vue?vue&type=template&id=1b4aba9a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/page-settings/info/Username.vue?vue&type=template&id=1b4aba9a&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/page-settings/info/Username.vue?vue&type=template&id=1b4aba9a&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/page-settings/info/Username.vue?vue&type=template&id=1b4aba9a& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-card",
    [
      _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
        _vm._v("نام کاربری"),
      ]),
      _vm._v(" "),
      _c(
        "form",
        [
          _c("v-input", {
            staticClass: "mb-2",
            attrs: {
              "input-class": "ltr",
              name: "username",
              label:
                "این فیلد همان آدرس صفحه شماست که به صورت ibio.link/yourname خواهد بود",
            },
            on: {
              keyup: function ($event) {
                _vm.keyUp = true
              },
              input: function ($event) {
                _vm.isTyping = true
              },
            },
            model: {
              value: _vm.searchQuery,
              callback: function ($$v) {
                _vm.searchQuery = $$v
              },
              expression: "searchQuery",
            },
          }),
          _vm._v(" "),
          _c("div", { staticClass: "text-sm mb-5" }, [
            _vm.isLoading
              ? _c("span", { staticClass: "text-gray-500" }, [
                  _vm._v("درحال بررسی..."),
                ])
              : _vm.$page.props.errors.username
              ? _c("span", { staticClass: "text-red-500" }, [
                  _vm._v(_vm._s(_vm.$page.props.errors.username.username)),
                ])
              : _vm.checked
              ? _c("span", { staticClass: "text-green-500" }, [
                  _vm._v("تبریک! نام کاربری مورد نظر موجوده"),
                ])
              : _vm._e(),
          ]),
          _vm._v(" "),
          _c(
            "v-button",
            {
              attrs: {
                loading: _vm.saving,
                disabled: _vm.saving || _vm.isLoading,
              },
              on: { click: _vm.save },
            },
            [_vm._v("ذخیره")]
          ),
        ],
        1
      ),
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);