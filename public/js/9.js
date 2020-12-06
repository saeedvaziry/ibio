(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[9],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/settings/Index.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/settings/Index.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  name: 'Settings',
  data: function data() {
    return {
      password: {
        current_password: '',
        password: '',
        password_confirmation: ''
      },
      submitting_password: false,
      enabling_two_factor: false,
      verifying_two_factor: false,
      verify_two_factor: '',
      disabling_two_factor: false,
      disable_two_factor: '',
      deletingAccount: false
    };
  },
  methods: {
    submitPassword: function submitPassword() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.submitting_password = true;
                _context.next = 3;
                return _this.$inertia.post(route('settings.password'), _this.password, {
                  preserveScroll: true
                });

              case 3:
                _this.submitting_password = false;

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    enableTwoFactor: function enableTwoFactor() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                _this2.enabling_two_factor = true;
                _context2.next = 3;
                return _this2.$inertia.post(route('settings.2fa.enable'), {}, {
                  preserveScroll: true
                });

              case 3:
                _this2.$refs.verify2FAModal.show();

                _this2.enabling_two_factor = false;

              case 5:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    verifyTwoFactor: function verifyTwoFactor() {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                _this3.verifying_two_factor = true;
                _context3.next = 3;
                return _this3.$inertia.post(route('settings.2fa.verify'), {
                  code: _this3.verify_two_factor
                }, {
                  preserveScroll: true
                });

              case 3:
                if (_this3.$page.props.flash.success) {
                  _this3.$refs.verify2FAModal.hide();
                }

                _this3.verifying_two_factor = false;

              case 5:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    disableTwoFactor: function disableTwoFactor() {
      var _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                _this4.disabling_two_factor = true;
                _context4.next = 3;
                return _this4.$inertia.post(route('settings.2fa.disable'), {
                  code: _this4.disable_two_factor
                }, {
                  preserveScroll: true
                });

              case 3:
                if (_this4.$page.props.flash.success) {
                  _this4.$refs.disable2FAModal.hide();
                }

                _this4.disabling_two_factor = false;

              case 5:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    },
    deleteAccount: function deleteAccount() {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                _this5.deletingAccount = true;

                _this5.$inertia.visit(route('settings'), {
                  method: 'delete',
                  preserveState: true,
                  only: []
                }).then(function () {
                  window.location.href = '/login';
                });

              case 2:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/settings/Index.vue?vue&type=template&id=23154785&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/settings/Index.vue?vue&type=template&id=23154785& ***!
  \************************************************************************************************************************************************************************************************************/
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
    "dashboard",
    [
      _c("v-title", { staticClass: "mb-5" }, [_vm._v("Settings")]),
      _vm._v(" "),
      _c(
        "v-card",
        { staticClass: "mb-8" },
        [
          _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
            _vm._v("Password")
          ]),
          _vm._v(" "),
          !_vm.$page.props.user.password_not_set
            ? _c("v-input", {
                staticClass: "mb-3",
                attrs: {
                  type: "password",
                  label: "Current Password",
                  name: "current_password",
                  error:
                    _vm.$page.props.errors.changePassword &&
                    _vm.$page.props.errors.changePassword.current_password
                },
                model: {
                  value: _vm.password.current_password,
                  callback: function($$v) {
                    _vm.$set(_vm.password, "current_password", $$v)
                  },
                  expression: "password.current_password"
                }
              })
            : _vm._e(),
          _vm._v(" "),
          _c("v-input", {
            staticClass: "mb-3",
            attrs: {
              type: "password",
              label: "New Password",
              name: "password",
              error:
                _vm.$page.props.errors.changePassword &&
                _vm.$page.props.errors.changePassword.password
            },
            model: {
              value: _vm.password.password,
              callback: function($$v) {
                _vm.$set(_vm.password, "password", $$v)
              },
              expression: "password.password"
            }
          }),
          _vm._v(" "),
          _c("v-input", {
            attrs: {
              type: "password",
              label: "Confirm Password",
              name: "password_confirmation",
              error:
                _vm.$page.props.errors.changePassword &&
                _vm.$page.props.errors.changePassword.password_confirmation
            },
            model: {
              value: _vm.password.password_confirmation,
              callback: function($$v) {
                _vm.$set(_vm.password, "password_confirmation", $$v)
              },
              expression: "password.password_confirmation"
            }
          }),
          _vm._v(" "),
          _c(
            "v-button",
            {
              staticClass: "mt-5",
              attrs: { loading: _vm.submitting_password },
              on: {
                click: function($event) {
                  return _vm.submitPassword()
                }
              }
            },
            [_vm._v("Save")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "v-card",
        { staticClass: "mb-8" },
        [
          _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
            _vm._v("Two factor authentication")
          ]),
          _vm._v(" "),
          _c("p", { staticClass: "mb-5" }, [
            _vm._v(
              "By enabling this, We'll ask you the 6 digits validation code (from your authenticator app) at any login attempts."
            )
          ]),
          _vm._v(" "),
          _c("v-alert", {
            staticClass: "mb-3",
            attrs: { errors: _vm.$page.props.errors.enable2FA }
          }),
          _vm._v(" "),
          _vm.$page.props.user.two_factor_enabled
            ? _c(
                "v-button",
                {
                  staticClass: "mt-5",
                  attrs: { type: "secondary" },
                  on: {
                    click: function($event) {
                      return _vm.$refs.disable2FAModal.show()
                    }
                  }
                },
                [_vm._v("Disable")]
              )
            : _c(
                "v-button",
                {
                  staticClass: "mt-5",
                  attrs: { loading: _vm.enabling_two_factor },
                  on: { click: _vm.enableTwoFactor }
                },
                [_vm._v("Enable")]
              )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-title", { staticClass: "mb-5" }, [_vm._v("Danger zone")]),
      _vm._v(" "),
      _c(
        "v-card",
        { staticClass: "mb-5", attrs: { border: "border-red-200" } },
        [
          _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
            _vm._v("Delete account")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "flex items-center justify-between" },
            [
              _c("p", { staticClass: "mr-3" }, [
                _vm._v(
                  "Your account will be temporarily deactivated and will not be accessible publicly. You will be logged out in the process, and the page will be re-activated when you login again."
                )
              ]),
              _vm._v(" "),
              _c(
                "v-button",
                {
                  attrs: { type: "color", color: "red" },
                  on: {
                    click: function($event) {
                      return _vm.$refs.deleteAccountModal.show()
                    }
                  }
                },
                [_vm._v("Delete")]
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-modal", { ref: "verify2FAModal" }, [
        _c(
          "div",
          { staticClass: "p-4" },
          [
            _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
              _vm._v("Verify")
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "mt-2" },
              [
                _c("v-alert", {
                  staticClass: "mb-3",
                  attrs: { errors: _vm.$page.props.errors.verify2FA }
                }),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _vm._v(
                    "Scan the below QR code with an authenticator app like\n                    "
                  ),
                  _c(
                    "a",
                    { staticClass: "text-primary-500", attrs: { href: "#" } },
                    [_vm._v("Google Authenticator")]
                  ),
                  _vm._v("\n                    or\n                    "),
                  _c(
                    "a",
                    { staticClass: "text-primary-500", attrs: { href: "#" } },
                    [_vm._v("Authy")]
                  ),
                  _vm._v(
                    "\n                    and enter the 6 digits code bellow to verify.\n                "
                  )
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _vm._v("Verification process will expire after 5 minutes.")
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "mb-4 w-full text-center" }, [
                  _c("div", {
                    staticClass: "inline-block",
                    domProps: { innerHTML: _vm._s(_vm.$page.props.data.qr) }
                  })
                ]),
                _vm._v(" "),
                _c("v-input", {
                  attrs: { name: "code", label: "6 digits code" },
                  model: {
                    value: _vm.verify_two_factor,
                    callback: function($$v) {
                      _vm.verify_two_factor = $$v
                    },
                    expression: "verify_two_factor"
                  }
                })
              ],
              1
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "px-4 py-3 flex justify-end" },
          [
            _c(
              "v-button",
              {
                attrs: { type: "secondary" },
                on: {
                  click: function($event) {
                    return _vm.$refs.verify2FAModal.hide()
                  }
                }
              },
              [_vm._v("Cancel")]
            ),
            _vm._v(" "),
            _c(
              "v-button",
              {
                staticClass: "ml-2",
                attrs: { type: "primary", loading: _vm.verifying_two_factor },
                on: { click: _vm.verifyTwoFactor }
              },
              [_vm._v("Verify")]
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("v-modal", { ref: "disable2FAModal" }, [
        _c(
          "div",
          { staticClass: "p-4" },
          [
            _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
              _vm._v("Disable")
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "mt-2" },
              [
                _c("v-alert", {
                  staticClass: "mb-3",
                  attrs: { errors: _vm.$page.props.errors.disable2FA }
                }),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _vm._v("Please enter the code from your authenticator app")
                ]),
                _vm._v(" "),
                _c("v-input", {
                  attrs: { name: "code", label: "6 digits code" },
                  model: {
                    value: _vm.disable_two_factor,
                    callback: function($$v) {
                      _vm.disable_two_factor = $$v
                    },
                    expression: "disable_two_factor"
                  }
                })
              ],
              1
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "px-4 py-3 flex justify-end" },
          [
            _c(
              "v-button",
              {
                attrs: { type: "secondary" },
                on: {
                  click: function($event) {
                    return _vm.$refs.disable2FAModal.hide()
                  }
                }
              },
              [_vm._v("Cancel")]
            ),
            _vm._v(" "),
            _c(
              "v-button",
              {
                staticClass: "ml-2",
                attrs: { type: "primary", loading: _vm.disabling_two_factor },
                on: { click: _vm.disableTwoFactor }
              },
              [_vm._v("Disable")]
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("v-modal", { ref: "deleteAccountModal" }, [
        _c(
          "div",
          { staticClass: "p-4" },
          [
            _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
              _vm._v("Delete account")
            ]),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "mt-2" },
              [
                _c("v-alert", {
                  staticClass: "mb-3",
                  attrs: { errors: _vm.$page.props.errors.deleteAccount }
                }),
                _vm._v(" "),
                _c("p", { staticClass: "mb-4" }, [
                  _vm._v(
                    "All of your account data will be deleted completely and it is impossible to restore it."
                  )
                ])
              ],
              1
            )
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "px-4 py-3 flex justify-end" },
          [
            _c(
              "v-button",
              {
                attrs: { type: "secondary" },
                on: {
                  click: function($event) {
                    return _vm.$refs.deleteAccountModal.hide()
                  }
                }
              },
              [_vm._v("Cancel")]
            ),
            _vm._v(" "),
            _c(
              "v-button",
              {
                staticClass: "ml-2",
                attrs: {
                  type: "color",
                  color: "red",
                  loading: _vm.deletingAccount
                },
                on: { click: _vm.deleteAccount }
              },
              [_vm._v("Delete")]
            )
          ],
          1
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/settings/Index.vue":
/*!***********************************************!*\
  !*** ./resources/js/views/settings/Index.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_23154785___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=23154785& */ "./resources/js/views/settings/Index.vue?vue&type=template&id=23154785&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/views/settings/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_23154785___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_23154785___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/settings/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/settings/Index.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/views/settings/Index.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/settings/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/settings/Index.vue?vue&type=template&id=23154785&":
/*!******************************************************************************!*\
  !*** ./resources/js/views/settings/Index.vue?vue&type=template&id=23154785& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_23154785___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=23154785& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/settings/Index.vue?vue&type=template&id=23154785&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_23154785___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_23154785___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);