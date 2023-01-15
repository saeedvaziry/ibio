window._ = require("lodash");

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let Emitter = require("tiny-emitter");
window.Emitter = new Emitter();
