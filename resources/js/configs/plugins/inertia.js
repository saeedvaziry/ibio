import Vue from 'vue';
import {plugin} from '@inertiajs/inertia-vue';
import {InertiaProgress} from '@inertiajs/progress'

Vue.use(plugin);
InertiaProgress.init({
    delay: 0,
    color: '#BF0436',
    includeCSS: true,
    showSpinner: false,
})
