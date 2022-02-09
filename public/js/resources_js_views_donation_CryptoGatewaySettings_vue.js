"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_donation_CryptoGatewaySettings_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: "CryptoGatewaySettings",
  data: function data() {
    return {
      jeebApi: this.$page.props.user.donation.jeeb_api,
      savingJeebApi: false,
      showJeebApiHelp: true,
      amounts: _toConsumableArray(this.$page.props.user.donation.amounts_usd),
      savingAmounts: false,
      amount: ''
    };
  },
  methods: {
    updateJeebApi: function updateJeebApi() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.savingJeebApi = true;
                _context.next = 3;
                return _this.$inertia.post(route('donation.settings.gateway-crypto.jeeb-api'), {
                  jeeb_api: _this.jeebApi
                }, {
                  preserveScroll: true
                });

              case 3:
                _this.savingJeebApi = false;

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    addAmount: function addAmount() {
      if (this.amount && this.amount !== '') {
        this.amounts.push(this.amount);
        this.updateAmounts();
      }
    },
    removeAmount: function removeAmount(index) {
      this.amounts.splice(index, 1);
      this.updateAmounts();
    },
    updateAmounts: function updateAmounts() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this2.savingAmounts = true;
                _context2.next = 3;
                return _this2.$inertia.post(route('donation.settings.gateway-crypto.amounts'), {
                  amounts: _this2.amounts
                }, {
                  preserveScroll: true
                });

              case 3:
                _this2.amount = '';
                _this2.savingAmounts = false;

              case 5:
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

/***/ "./resources/js/views/donation/CryptoGatewaySettings.vue":
/*!***************************************************************!*\
  !*** ./resources/js/views/donation/CryptoGatewaySettings.vue ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _CryptoGatewaySettings_vue_vue_type_template_id_7ab76630___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CryptoGatewaySettings.vue?vue&type=template&id=7ab76630& */ "./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=template&id=7ab76630&");
/* harmony import */ var _CryptoGatewaySettings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CryptoGatewaySettings.vue?vue&type=script&lang=js& */ "./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CryptoGatewaySettings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CryptoGatewaySettings_vue_vue_type_template_id_7ab76630___WEBPACK_IMPORTED_MODULE_0__.render,
  _CryptoGatewaySettings_vue_vue_type_template_id_7ab76630___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/donation/CryptoGatewaySettings.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoGatewaySettings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoGatewaySettings.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoGatewaySettings_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=template&id=7ab76630&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=template&id=7ab76630& ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoGatewaySettings_vue_vue_type_template_id_7ab76630___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoGatewaySettings_vue_vue_type_template_id_7ab76630___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CryptoGatewaySettings_vue_vue_type_template_id_7ab76630___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./CryptoGatewaySettings.vue?vue&type=template&id=7ab76630& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=template&id=7ab76630&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=template&id=7ab76630&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/donation/CryptoGatewaySettings.vue?vue&type=template&id=7ab76630& ***!
  \*************************************************************************************************************************************************************************************************************************************/
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
    "donation",
    [
      _c(
        "div",
        {
          staticClass:
            "bg-yellow-50 dark:bg-yellow-500 dark:bg-opacity-10 border-r-4 border-yellow-500 text-yellow-700 dark:text-gray-300 p-4 rounded-sm mb-5",
        },
        [
          _c("p", { staticClass: "leading-loose" }, [
            _vm._v(
              "تمامی پرداخت های کریپتو از طریق jeeb.io انجام میشه و مبالغ واریزی به کیف پول شما در jeeb.io واریز خواهد شد. بنابراین برای انتقال حمایت های دریافتی به حساب بانکیتون باید از طریق پنل کاربری jeeb.io اقدام کنید."
            ),
          ]),
        ]
      ),
      _vm._v(" "),
      _c(
        "v-card",
        { staticClass: "mb-5" },
        [
          _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
            _vm._v("تنظیمات درگاه پرداخت"),
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass:
                "bg-blue-50 dark:bg-blue-500 dark:bg-opacity-10 border-r-4 border-blue-500 text-blue-700 dark:text-gray-300 p-4 rounded-sm mb-5",
            },
            [
              _c(
                "p",
                {
                  staticClass: "cursor-pointer",
                  on: {
                    click: function ($event) {
                      _vm.showJeebApiHelp = true
                    },
                  },
                },
                [_vm._v("راهنمای دریافت API-Key جیب")]
              ),
              _vm._v(" "),
              _c(
                "ul",
                {
                  staticClass: "pr-10 list-disc mt-3",
                  class: { hidden: !_vm.showJeebApiHelp },
                },
                [
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v("ابتدا وارد وبسایت\n                    "),
                    _c(
                      "a",
                      { attrs: { href: "https://jeeb.io", target: "_blank" } },
                      [_vm._v("jeeb.io")]
                    ),
                    _vm._v(
                      "\n                    بشید و ثبت نام کنید\n                "
                    ),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v(
                      "به بخش درگاه ها برید و بر روی درگاه جدید کلیک کنید"
                    ),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v("نوع درگاه رو تجاری انتخاب کنید"),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v("یک عنوان برای درگاهتون انتخاب کنید"),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v(
                      "آدرس دامنه یا سرور پذیرنده رو https://ibio.link وارد کنید"
                    ),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v("بر روی دکمه ایجاد درگاه کلیک کنید"),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v(
                      "بعد از ساخت وارد بخش API KEY ها شوید و یک عنوان وارد کرده و بر روی ساخت کلید کلیک کنید"
                    ),
                  ]),
                  _vm._v(" "),
                  _c("li", { staticClass: "mb-2" }, [
                    _vm._v(
                      "کلید ساخته شده رو کپی کنید و توی فیلد زیر وارد کنید"
                    ),
                  ]),
                  _vm._v(" "),
                  _c("li", [
                    _vm._v("راهنمایی بیشتر در اینجا\n                    "),
                    _c(
                      "a",
                      {
                        attrs: {
                          href: "https://jeeb.io/faq",
                          target: "_blank",
                        },
                      },
                      [_vm._v("jeeb.io/faq")]
                    ),
                  ]),
                ]
              ),
            ]
          ),
          _vm._v(" "),
          _c(
            "form",
            {
              on: {
                submit: function ($event) {
                  $event.preventDefault()
                  return _vm.updateJeebApi.apply(null, arguments)
                },
              },
            },
            [
              _c("v-input", {
                staticClass: "mb-4",
                attrs: {
                  "input-class": "ltr",
                  name: "name",
                  label: "API-KEY جیب",
                  error:
                    _vm.$page.props.errors.jeebApi &&
                    _vm.$page.props.errors.jeebApi.jeeb_api,
                },
                model: {
                  value: _vm.jeebApi,
                  callback: function ($$v) {
                    _vm.jeebApi = $$v
                  },
                  expression: "jeebApi",
                },
              }),
              _vm._v(" "),
              _c(
                "v-button",
                {
                  staticClass: "mt-5",
                  attrs: { loading: _vm.savingJeebApi },
                  on: { click: _vm.updateJeebApi },
                },
                [_vm._v("ذخیره")]
              ),
            ],
            1
          ),
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-card",
        { staticClass: "mb-5" },
        [
          _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
            _vm._v("مبالغ حمایتی"),
          ]),
          _vm._v(" "),
          _c("p", { staticClass: "mb-5" }, [
            _vm._v(
              "گزینه مبلغ دلخواه بصورت پیشفرض از قبل وجود دارد و در صفحه حمایت نمایش داده میشود"
            ),
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "mb-5" },
            _vm._l(
              _vm.$page.props.user.donation.amounts_usd,
              function (amount, i) {
                return _c(
                  "div",
                  {
                    staticClass:
                      "inline-flex p-2 rounded-lg items-center justify-between bg-purple-100 dark:bg-purple-500 dark:bg-opacity-10 text-purple-600 ml-2 mb-2",
                  },
                  [
                    _c("div", { staticClass: "ml-4 font-sans" }, [
                      _vm._v("$" + _vm._s(amount)),
                    ]),
                    _vm._v(" "),
                    _c("fa-icon", {
                      staticClass: "cursor-pointer",
                      attrs: { icon: ["fas", "times"] },
                      on: {
                        click: function ($event) {
                          return _vm.removeAmount(i)
                        },
                      },
                    }),
                  ],
                  1
                )
              }
            ),
            0
          ),
          _vm._v(" "),
          _c(
            "form",
            {
              on: {
                submit: function ($event) {
                  $event.preventDefault()
                  return _vm.addAmount.apply(null, arguments)
                },
              },
            },
            [
              _c("v-input", {
                staticClass: "mb-4",
                attrs: {
                  money: "",
                  "input-class": "ltr",
                  name: "amount",
                  label: "مبلغ جدید (دلار)",
                  error:
                    _vm.$page.props.errors.amounts &&
                    _vm.$page.props.errors.amounts.amounts,
                },
                model: {
                  value: _vm.amount,
                  callback: function ($$v) {
                    _vm.amount = $$v
                  },
                  expression: "amount",
                },
              }),
              _vm._v(" "),
              _c(
                "v-button",
                {
                  staticClass: "mt-5",
                  attrs: { loading: _vm.savingAmounts },
                  on: { click: _vm.addAmount },
                },
                [_vm._v("افزودن مبلغ")]
              ),
            ],
            1
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