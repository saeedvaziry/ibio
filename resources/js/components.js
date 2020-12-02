import Vue from "vue";

// layouts
Vue.component('app', require('./layouts/App').default);
Vue.component('dashboard', require('./layouts/Dashboard').default);

// components
Vue.component('v-container', require('./components/Container').default);
Vue.component('v-avatar', require('./components/Avatar').default);
Vue.component('v-title', require('./components/Title').default);
Vue.component('v-dropdown', require('./components/DropDown').default);
Vue.component('v-dropdown-item', require('./components/DropDownItem').default);
Vue.component('v-input', require('./components/Input').default);
Vue.component('v-label', require('./components/Label').default);
Vue.component('v-button', require('./components/Button').default);
Vue.component('v-loader', require('./components/Loader').default);
Vue.component('v-alert', require('./components/Alert').default);
Vue.component('v-sidebar', require('./components/Sidebar').default);
Vue.component('v-sidebar-item', require('./components/SidebarItem').default);
Vue.component('v-card', require('./components/Card').default);
Vue.component('v-select', require('./components/Select').default);
Vue.component('v-modal', require('./components/Modal').default);
Vue.component('v-toast', require('./components/Toast').default);
