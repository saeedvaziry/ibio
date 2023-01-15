require("./bootstrap");

// Import modules...
import { createApp } from "vue";
import { plugin as InertiaPlugin } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";

// import app modules
import Root from "./root";
import Filters from "./filters";

// create app
const app = createApp(Root);

// mixins
app.mixin({ methods: { route } });

// plugins
app.use(InertiaPlugin);

// filters
app.config.globalProperties.$filters = Filters;

// mount app
app.mount("#app");

// initial inertia progress
InertiaProgress.init({
    color: "#4179f5",
});
