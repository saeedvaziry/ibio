import { h } from "vue";
import { App as InertiaApp } from "@inertiajs/inertia-vue3";

const el = document.getElementById("app");

export default {
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
};
