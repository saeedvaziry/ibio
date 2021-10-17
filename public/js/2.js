(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/info/Info.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/page-settings/info/Info.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'Info',
  data: function data() {
    return {
      form: {
        name: this.$page.props.user.name,
        name_en: this.$page.props.user.name_en,
        bio: this.$page.props.user.bio,
        bio_en: this.$page.props.user.bio_en
      },
      saving: false,
      fa: true
    };
  },
  methods: {
    save: function save() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.saving = true;
                _context.next = 3;
                return _this.$inertia.post(route('page-settings.info'), _this.form, {
                  preserveScroll: true,
                  preserveState: true
                });

              case 3:
                _this.saving = false;

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/info/Info.vue?vue&type=template&id=b5663f1c&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/page-settings/info/Info.vue?vue&type=template&id=b5663f1c& ***!
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
    [
      _c(
        "v-card",
        { staticClass: "mb-5" },
        [
          _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
            _vm._v("تصویر پروفایل")
          ]),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "flex items-center mb-5" },
            [
              _c("v-avatar", {
                ref: "avatar",
                staticClass: "ml-3 md:ml-5",
                attrs: {
                  user: _vm.$page.props.user,
                  size: "w-16 h-16 md:w-20 md:h-20",
                  font: "text-md md:text-2xl",
                  upload: ""
                }
              }),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "flex items-center" },
                [
                  _c(
                    "v-button",
                    {
                      attrs: { type: "secondary", small: "" },
                      on: {
                        click: function($event) {
                          return _vm.$refs.avatar.selectFile()
                        }
                      }
                    },
                    [_vm._v("آپلود")]
                  ),
                  _vm._v(" "),
                  _vm.$page.props.user.avatar
                    ? _c(
                        "v-button",
                        {
                          staticClass: "mr-2",
                          attrs: { type: "color", color: "red", small: "" },
                          on: {
                            click: function($event) {
                              _vm.$inertia.visit(
                                _vm.route("page-settings.info.avatar"),
                                { method: "delete" }
                              )
                            }
                          }
                        },
                        [
                          _c("span", { staticClass: "md:hidden" }, [
                            _vm._v("حذف")
                          ]),
                          _vm._v(" "),
                          _c("span", { staticClass: "hidden md:block" }, [
                            _vm._v("حذف تصویر")
                          ])
                        ]
                      )
                    : _vm._e()
                ],
                1
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-card", [
        _c(
          "div",
          { staticClass: "flex items-center justify-between mb-5" },
          [
            _c("v-title", { attrs: { small: "" } }, [_vm._v("اطلاعات عمومی")]),
            _vm._v(" "),
            _c("div", { staticClass: "flex items-center justify-end" }, [
              _c("span", { staticClass: "w-16 text-left" }, [_vm._v("فارسی")]),
              _vm._v(" "),
              _c("label", { staticClass: "switch mx-2" }, [
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.fa,
                      expression: "fa"
                    }
                  ],
                  attrs: { type: "checkbox" },
                  domProps: {
                    checked: Array.isArray(_vm.fa)
                      ? _vm._i(_vm.fa, null) > -1
                      : _vm.fa
                  },
                  on: {
                    change: function($event) {
                      var $$a = _vm.fa,
                        $$el = $event.target,
                        $$c = $$el.checked ? true : false
                      if (Array.isArray($$a)) {
                        var $$v = null,
                          $$i = _vm._i($$a, $$v)
                        if ($$el.checked) {
                          $$i < 0 && (_vm.fa = $$a.concat([$$v]))
                        } else {
                          $$i > -1 &&
                            (_vm.fa = $$a
                              .slice(0, $$i)
                              .concat($$a.slice($$i + 1)))
                        }
                      } else {
                        _vm.fa = $$c
                      }
                    }
                  }
                }),
                _vm._v(" "),
                _c("span", { staticClass: "slider active" })
              ]),
              _vm._v(" "),
              _c("span", { staticClass: "w-16 text-right" }, [
                _vm._v("انگلیسی")
              ])
            ])
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "form",
          [
            _vm.fa
              ? [
                  _c("v-input", {
                    staticClass: "mb-4",
                    attrs: {
                      name: "name",
                      label: "نام من",
                      error:
                        _vm.$page.props.errors.info &&
                        _vm.$page.props.errors.info.name
                    },
                    model: {
                      value: _vm.form.name,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "name", $$v)
                      },
                      expression: "form.name"
                    }
                  }),
                  _vm._v(" "),
                  _c("v-textarea", {
                    attrs: {
                      name: "bio",
                      label: "درباره من",
                      error:
                        _vm.$page.props.errors.bio &&
                        _vm.$page.props.errors.info.bio
                    },
                    model: {
                      value: _vm.form.bio,
                      callback: function($$v) {
                        _vm.$set(_vm.form, "bio", $$v)
                      },
                      expression: "form.bio"
                    }
                  })
                ]
              : _c(
                  "div",
                  { staticClass: "ltr" },
                  [
                    _c("v-input", {
                      staticClass: "mb-4",
                      attrs: {
                        name: "name_en",
                        label: "Name",
                        error:
                          _vm.$page.props.errors.info &&
                          _vm.$page.props.errors.info.name_en
                      },
                      model: {
                        value: _vm.form.name_en,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "name_en", $$v)
                        },
                        expression: "form.name_en"
                      }
                    }),
                    _vm._v(" "),
                    _c("v-textarea", {
                      attrs: {
                        name: "bio_en",
                        label: "Bio",
                        error:
                          _vm.$page.props.errors.bio_en &&
                          _vm.$page.props.errors.info.bio_en
                      },
                      model: {
                        value: _vm.form.bio_en,
                        callback: function($$v) {
                          _vm.$set(_vm.form, "bio_en", $$v)
                        },
                        expression: "form.bio_en"
                      }
                    })
                  ],
                  1
                ),
            _vm._v(" "),
            _c(
              "v-button",
              {
                staticClass: "mt-5",
                attrs: { loading: _vm.saving },
                on: { click: _vm.save }
              },
              [_vm._v("ذخیره")]
            )
          ],
          2
        )
      ])
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/page-settings/info/Info.vue":
/*!********************************************************!*\
  !*** ./resources/js/views/page-settings/info/Info.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Info_vue_vue_type_template_id_b5663f1c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Info.vue?vue&type=template&id=b5663f1c& */ "./resources/js/views/page-settings/info/Info.vue?vue&type=template&id=b5663f1c&");
/* harmony import */ var _Info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Info.vue?vue&type=script&lang=js& */ "./resources/js/views/page-settings/info/Info.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Info_vue_vue_type_template_id_b5663f1c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Info_vue_vue_type_template_id_b5663f1c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/page-settings/info/Info.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/page-settings/info/Info.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/views/page-settings/info/Info.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Info.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/info/Info.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Info_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/page-settings/info/Info.vue?vue&type=template&id=b5663f1c&":
/*!***************************************************************************************!*\
  !*** ./resources/js/views/page-settings/info/Info.vue?vue&type=template&id=b5663f1c& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Info_vue_vue_type_template_id_b5663f1c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Info.vue?vue&type=template&id=b5663f1c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/info/Info.vue?vue&type=template&id=b5663f1c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Info_vue_vue_type_template_id_b5663f1c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Info_vue_vue_type_template_id_b5663f1c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);