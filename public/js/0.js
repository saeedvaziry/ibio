(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
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
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'RequestLinkType',
  data: function data() {
    return {
      form: {
        description: ''
      },
      submitting: false
    };
  },
  methods: {
    show: function show() {
      this.$refs.modal.show();
    },
    submit: function submit() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.submitting = true;
                _context.next = 3;
                return _this.$inertia.post(route('feature-requests.link-type'), _this.form, {
                  preserveState: true,
                  preserveScroll: true
                });

              case 3:
                if (_this.$page.props.flash.success) {
                  _this.$refs.modal.hide();
                }

                _this.submitting = false;

              case 5:
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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/contact/Index.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/page-settings/contact/Index.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_RequestLinkType__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../common/RequestLinkType */ "./resources/js/views/page-settings/common/RequestLinkType.vue");


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

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'PageContact',
  components: {
    RequestLinkType: _common_RequestLinkType__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  mounted: function mounted() {
    this.filterResult = this.$page.props.contacts;
  },
  data: function data() {
    return {
      form: {
        contact: '',
        url: ''
      },
      setContact: '',
      adding: false,
      filter: '',
      filterResult: []
    };
  },
  watch: {
    '$page.props.contacts': function $pagePropsContacts(newVal) {
      this.filterResult = newVal;
    },
    filter: function filter(newVal) {
      var _this = this;

      this.filterResult = [];
      this.$page.props.contacts.map(function (item) {
        var data = item.title.toLowerCase() + ' ' + item.value.toLowerCase();

        if (data.indexOf(newVal) >= 0) {
          _this.filterResult.push(item);
        }
      });
    }
  },
  methods: {
    showSet: function showSet(contact) {
      this.setContact = contact;
      this.form.contact = contact.value;
      this.form.url = contact.link ? contact.link.url : '';
      this.$refs.addModal.show();
    },
    add: function add() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this2.adding = true;
                _context.next = 3;
                return _this2.$inertia.post(route('page-settings.contact'), _this2.form, {
                  preserveScroll: true
                });

              case 3:
                if (_this2.$page.props.flash.success) {
                  _this2.$refs.addModal.hide();
                }

                _this2.adding = false;

              case 5:
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=template&id=ae9f5228&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=template&id=ae9f5228& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
  return _c("v-modal", { ref: "modal" }, [
    _c(
      "form",
      {
        on: {
          submit: function($event) {
            $event.preventDefault()
            return _vm.submit($event)
          }
        }
      },
      [
        _c(
          "div",
          { staticClass: "p-4" },
          [
            _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
              _vm._v("Let us know")
            ]),
            _vm._v(" "),
            _c("v-textarea", {
              attrs: {
                name: "description",
                error:
                  _vm.$page.props.errors.requestLinkType &&
                  _vm.$page.props.errors.requestLinkType.description,
                label: "Please let us know what we're missing 🧐"
              },
              model: {
                value: _vm.form.description,
                callback: function($$v) {
                  _vm.$set(_vm.form, "description", $$v)
                },
                expression: "form.description"
              }
            })
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
                    return _vm.$refs.modal.hide()
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
                attrs: { loading: _vm.submitting },
                on: { click: _vm.submit }
              },
              [_vm._v("Submit")]
            )
          ],
          1
        )
      ]
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/contact/Index.vue?vue&type=template&id=32e8b166&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/page-settings/contact/Index.vue?vue&type=template&id=32e8b166& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
    "page-settings",
    [
      _c(
        "div",
        { staticClass: "relative flex items-center mb-5" },
        [
          _c("v-input", {
            staticClass: "w-full",
            attrs: { placeholder: "Filter" },
            model: {
              value: _vm.filter,
              callback: function($$v) {
                _vm.filter = $$v
              },
              expression: "filter"
            }
          }),
          _vm._v(" "),
          _vm.filterResult.length === 0
            ? _c("div", { staticClass: "absolute right-0 mr-4 text-red-500" }, [
                _c(
                  "span",
                  {
                    staticClass: "cursor-pointer",
                    on: {
                      click: function($event) {
                        return _vm.$refs.requestLinkType.show()
                      }
                    }
                  },
                  [_vm._v("Not here?")]
                )
              ])
            : _vm._e()
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "grid grid-cols-2 md:grid-cols-3 gap-2" },
        _vm._l(_vm.filterResult, function(contact, i) {
          return _c(
            "v-card",
            {
              key: i,
              staticClass: "flex flex-col items-center justify-between"
            },
            [
              _c("img", {
                staticClass: "mb-4",
                attrs: {
                  src: __webpack_require__("./resources/img sync recursive ^\\.\\/.*\\.svg$")("./" + contact.value + ".svg"),
                  width: "30"
                }
              }),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "text-center" },
                [
                  _c("h2", { staticClass: "text-sm mb-4" }, [
                    _vm._v(_vm._s(contact.title))
                  ]),
                  _vm._v(" "),
                  _c(
                    "v-button",
                    {
                      attrs: {
                        type: contact.link ? "color" : "secondary",
                        color: "purple",
                        small: ""
                      },
                      on: {
                        click: function($event) {
                          return _vm.showSet(contact)
                        }
                      }
                    },
                    [_vm._v(_vm._s(contact.link ? "Update" : "Add"))]
                  )
                ],
                1
              )
            ]
          )
        }),
        1
      ),
      _vm._v(" "),
      _c("v-modal", { ref: "addModal" }, [
        _vm.setContact
          ? _c(
              "div",
              { staticClass: "p-4" },
              [
                _c("v-title", { staticClass: "mb-5", attrs: { small: "" } }, [
                  _vm._v(
                    _vm._s(_vm.setContact.link ? "Update" : "Add") +
                      " " +
                      _vm._s(_vm.setContact.title)
                  )
                ]),
                _vm._v(" "),
                _c("v-input", {
                  staticClass: "mb-4",
                  attrs: {
                    placeholder: _vm.setContact.placeholder,
                    value: _vm.form.url,
                    error:
                      _vm.$page.props.errors.add &&
                      _vm.$page.props.errors.add.url
                        ? "This field is required"
                        : ""
                  },
                  model: {
                    value: _vm.form.url,
                    callback: function($$v) {
                      _vm.$set(_vm.form, "url", $$v)
                    },
                    expression: "form.url"
                  }
                })
              ],
              1
            )
          : _vm._e(),
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
                    return _vm.$refs.addModal.hide()
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
                attrs: { loading: _vm.adding },
                on: { click: _vm.add }
              },
              [_vm._v(_vm._s(_vm.setContact.link ? "Update" : "Add"))]
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _c("request-link-type", { ref: "requestLinkType" })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/img sync recursive ^\\.\\/.*\\.svg$":
/*!******************************************!*\
  !*** ./resources/img sync ^\.\/.*\.svg$ ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./bitbucket.svg": "./resources/img/bitbucket.svg",
	"./discord.svg": "./resources/img/discord.svg",
	"./dribble.svg": "./resources/img/dribble.svg",
	"./email.svg": "./resources/img/email.svg",
	"./facebook.svg": "./resources/img/facebook.svg",
	"./github.svg": "./resources/img/github.svg",
	"./gitlab.svg": "./resources/img/gitlab.svg",
	"./instagram.svg": "./resources/img/instagram.svg",
	"./linkedin.svg": "./resources/img/linkedin.svg",
	"./logo.svg": "./resources/img/logo.svg",
	"./medium.svg": "./resources/img/medium.svg",
	"./phone.svg": "./resources/img/phone.svg",
	"./pinterest.svg": "./resources/img/pinterest.svg",
	"./reddit.svg": "./resources/img/reddit.svg",
	"./skype.svg": "./resources/img/skype.svg",
	"./snapchat.svg": "./resources/img/snapchat.svg",
	"./soundcloud.svg": "./resources/img/soundcloud.svg",
	"./spotify.svg": "./resources/img/spotify.svg",
	"./telegram.svg": "./resources/img/telegram.svg",
	"./tiktok.svg": "./resources/img/tiktok.svg",
	"./tumblr.svg": "./resources/img/tumblr.svg",
	"./twitch.svg": "./resources/img/twitch.svg",
	"./twitter.svg": "./resources/img/twitter.svg",
	"./viber.svg": "./resources/img/viber.svg",
	"./vimeo.svg": "./resources/img/vimeo.svg",
	"./vk.svg": "./resources/img/vk.svg",
	"./website.svg": "./resources/img/website.svg",
	"./whatsapp.svg": "./resources/img/whatsapp.svg",
	"./youtube.svg": "./resources/img/youtube.svg"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./resources/img sync recursive ^\\.\\/.*\\.svg$";

/***/ }),

/***/ "./resources/img/bitbucket.svg":
/*!*************************************!*\
  !*** ./resources/img/bitbucket.svg ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/bitbucket.svg?89d343f5efe6c351fcd6c00871221bb0";

/***/ }),

/***/ "./resources/img/discord.svg":
/*!***********************************!*\
  !*** ./resources/img/discord.svg ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/discord.svg?fee2b0c7763cd68020f7d8fd9ea2c593";

/***/ }),

/***/ "./resources/img/dribble.svg":
/*!***********************************!*\
  !*** ./resources/img/dribble.svg ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/dribble.svg?f47f43587ec131c9a510b2b742d6437d";

/***/ }),

/***/ "./resources/img/email.svg":
/*!*********************************!*\
  !*** ./resources/img/email.svg ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/email.svg?3a49bb5efe3d406cc94e42b7b2f244f5";

/***/ }),

/***/ "./resources/img/facebook.svg":
/*!************************************!*\
  !*** ./resources/img/facebook.svg ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/facebook.svg?60f532b73b8720aba4a9f3fb2d39c56d";

/***/ }),

/***/ "./resources/img/github.svg":
/*!**********************************!*\
  !*** ./resources/img/github.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/github.svg?aac90947fcba994b3530d3ff120bfda2";

/***/ }),

/***/ "./resources/img/gitlab.svg":
/*!**********************************!*\
  !*** ./resources/img/gitlab.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/gitlab.svg?db66f1db8b42d15252ca0f283abc420c";

/***/ }),

/***/ "./resources/img/instagram.svg":
/*!*************************************!*\
  !*** ./resources/img/instagram.svg ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/instagram.svg?825269601201a0ece278db25a848c8d3";

/***/ }),

/***/ "./resources/img/linkedin.svg":
/*!************************************!*\
  !*** ./resources/img/linkedin.svg ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/linkedin.svg?4b475fb3f54b3e35daa04295ec48df4c";

/***/ }),

/***/ "./resources/img/medium.svg":
/*!**********************************!*\
  !*** ./resources/img/medium.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/medium.svg?bad5a888d252fc08e4d77a10edbbc105";

/***/ }),

/***/ "./resources/img/phone.svg":
/*!*********************************!*\
  !*** ./resources/img/phone.svg ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/phone.svg?5ebfa455397b1a579c3fcb180f94aeaf";

/***/ }),

/***/ "./resources/img/pinterest.svg":
/*!*************************************!*\
  !*** ./resources/img/pinterest.svg ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/pinterest.svg?d8a44cc58536d5f706da07bea0dd7faa";

/***/ }),

/***/ "./resources/img/reddit.svg":
/*!**********************************!*\
  !*** ./resources/img/reddit.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/reddit.svg?fc79ce079da64ad3142465da62848597";

/***/ }),

/***/ "./resources/img/skype.svg":
/*!*********************************!*\
  !*** ./resources/img/skype.svg ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/skype.svg?d45d32fa41d87042155762dc9f30bcae";

/***/ }),

/***/ "./resources/img/snapchat.svg":
/*!************************************!*\
  !*** ./resources/img/snapchat.svg ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/snapchat.svg?830fa7f3ccd1a1e67205a65cf7c29cd4";

/***/ }),

/***/ "./resources/img/soundcloud.svg":
/*!**************************************!*\
  !*** ./resources/img/soundcloud.svg ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/soundcloud.svg?0b309ed60e3a8bd6e2bb8097209c8abc";

/***/ }),

/***/ "./resources/img/spotify.svg":
/*!***********************************!*\
  !*** ./resources/img/spotify.svg ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/spotify.svg?74d9e294ebad9bf3dc2f4268db77b670";

/***/ }),

/***/ "./resources/img/telegram.svg":
/*!************************************!*\
  !*** ./resources/img/telegram.svg ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/telegram.svg?c55528d4703de7ee1676b1d86e92af68";

/***/ }),

/***/ "./resources/img/tiktok.svg":
/*!**********************************!*\
  !*** ./resources/img/tiktok.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/tiktok.svg?acc1c1a7cfd070fa838b381212a91d2e";

/***/ }),

/***/ "./resources/img/tumblr.svg":
/*!**********************************!*\
  !*** ./resources/img/tumblr.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/tumblr.svg?f832c382c60e73a28d2d1b37d4a8b4e5";

/***/ }),

/***/ "./resources/img/twitch.svg":
/*!**********************************!*\
  !*** ./resources/img/twitch.svg ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/twitch.svg?e1f7813a81c4579705af8aec19b9aac0";

/***/ }),

/***/ "./resources/img/twitter.svg":
/*!***********************************!*\
  !*** ./resources/img/twitter.svg ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/twitter.svg?c4f438fa6064cce71e3a97aae3d9684a";

/***/ }),

/***/ "./resources/img/viber.svg":
/*!*********************************!*\
  !*** ./resources/img/viber.svg ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/viber.svg?99384e5805cd787c02d98b9869e14105";

/***/ }),

/***/ "./resources/img/vimeo.svg":
/*!*********************************!*\
  !*** ./resources/img/vimeo.svg ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/vimeo.svg?a94f73209b5a70895ece832166f02331";

/***/ }),

/***/ "./resources/img/vk.svg":
/*!******************************!*\
  !*** ./resources/img/vk.svg ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/vk.svg?9eaa3aa7f4f9c1ae745d6649a0fbd8dc";

/***/ }),

/***/ "./resources/img/website.svg":
/*!***********************************!*\
  !*** ./resources/img/website.svg ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/website.svg?82c43677d4e0c40659e07987ed1af959";

/***/ }),

/***/ "./resources/img/whatsapp.svg":
/*!************************************!*\
  !*** ./resources/img/whatsapp.svg ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/whatsapp.svg?8242a1532ce559c68370b20a10f7af56";

/***/ }),

/***/ "./resources/img/youtube.svg":
/*!***********************************!*\
  !*** ./resources/img/youtube.svg ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/youtube.svg?7a8202a8aa5df17bb4ce198158886a80";

/***/ }),

/***/ "./resources/js/views/page-settings/common/RequestLinkType.vue":
/*!*********************************************************************!*\
  !*** ./resources/js/views/page-settings/common/RequestLinkType.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _RequestLinkType_vue_vue_type_template_id_ae9f5228___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./RequestLinkType.vue?vue&type=template&id=ae9f5228& */ "./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=template&id=ae9f5228&");
/* harmony import */ var _RequestLinkType_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RequestLinkType.vue?vue&type=script&lang=js& */ "./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _RequestLinkType_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _RequestLinkType_vue_vue_type_template_id_ae9f5228___WEBPACK_IMPORTED_MODULE_0__["render"],
  _RequestLinkType_vue_vue_type_template_id_ae9f5228___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/page-settings/common/RequestLinkType.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_RequestLinkType_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./RequestLinkType.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_RequestLinkType_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=template&id=ae9f5228&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=template&id=ae9f5228& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RequestLinkType_vue_vue_type_template_id_ae9f5228___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./RequestLinkType.vue?vue&type=template&id=ae9f5228& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/common/RequestLinkType.vue?vue&type=template&id=ae9f5228&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RequestLinkType_vue_vue_type_template_id_ae9f5228___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RequestLinkType_vue_vue_type_template_id_ae9f5228___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/page-settings/contact/Index.vue":
/*!************************************************************!*\
  !*** ./resources/js/views/page-settings/contact/Index.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Index_vue_vue_type_template_id_32e8b166___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=32e8b166& */ "./resources/js/views/page-settings/contact/Index.vue?vue&type=template&id=32e8b166&");
/* harmony import */ var _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js& */ "./resources/js/views/page-settings/contact/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Index_vue_vue_type_template_id_32e8b166___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Index_vue_vue_type_template_id_32e8b166___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/page-settings/contact/Index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/page-settings/contact/Index.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/views/page-settings/contact/Index.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/contact/Index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/page-settings/contact/Index.vue?vue&type=template&id=32e8b166&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/views/page-settings/contact/Index.vue?vue&type=template&id=32e8b166& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_32e8b166___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./Index.vue?vue&type=template&id=32e8b166& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/page-settings/contact/Index.vue?vue&type=template&id=32e8b166&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_32e8b166___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Index_vue_vue_type_template_id_32e8b166___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);