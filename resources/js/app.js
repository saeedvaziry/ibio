require('./bootstrap');
require('./configs/index');
require('./filters/dateformat');
require('./components');

import Vue from 'vue';
import {App} from '@inertiajs/inertia-vue';

Vue.mixin({methods: {route}});

window.Event = new Vue();

const el = document.getElementById('app')

export default new Vue({
    data() {
        return {
            csrf_token: window.app.csrf_token
        }
    },
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`./views/${name}`).then(module => module.default),
        },
    }),
    mounted() {
        window.addEventListener('popstate', () => {
            this.$inertia.reload({preserveScroll: true, preserveState: false})
        });
    }
}).$mount(el);
