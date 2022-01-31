require('./bootstrap');
require('./configs/index');
require('./filters/dateformat');
require('./filters/xmoney');
require('./directives/xmoney');
require('./components');

import Vue from 'vue';
import {App} from '@inertiajs/inertia-vue';

Vue.mixin({methods: {route}});

window.Event = new Vue();

const el = document.getElementById('app')

export default new Vue({
    data() {
        return {
            csrf_token: window.app.csrf_token,
            theme: localStorage.getItem('theme'),
            system_theme: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }
    },
    watch: {
        theme: function (newVal) {
            localStorage.setItem('theme', newVal);
            this.setTheme();
            this.$inertia.reload({preserveScroll: true, preserveState: true})
        }
    },
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`./views/${name}`).then(module => module.default),
        },
    }),
    mounted() {
        if (!this.theme) {
            this.theme = 'system';
            localStorage.setItem('theme', 'system')
        }
        this.setTheme();
        window.addEventListener('popstate', () => {
            this.$inertia.reload({preserveScroll: true, preserveState: false})
        });
    },
    methods: {
        setTheme() {
            if (this.theme === 'system') {
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.className = 'dark';
                } else {
                    document.documentElement.className = 'light';
                }
            } else {
                document.documentElement.className = this.theme;
            }
        }
    }
}).$mount(el);
