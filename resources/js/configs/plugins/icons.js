import Vue from 'vue';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

Vue.component('fa-icon', FontAwesomeIcon);

import {library} from '@fortawesome/fontawesome-svg-core';
import {
    faAddressCard, faArrowsAltV,
    faBars, faCamera, faChartBar, faChartPie,
    faChevronDown,
    faCog, faDesktop, faDonate,
    faEye,
    faLink, faMobile, faMobileAlt, faMoon, faPencilAlt, faTablet, faTabletAlt,
    faTachometerAlt, faTimes, faTrash
} from '@fortawesome/free-solid-svg-icons';
import {
    faInstagram,
    faTwitter
} from '@fortawesome/free-brands-svg-icons';

library.add(
    faChevronDown,
    faBars,
    faEye,
    faCog,
    faLink,
    faTachometerAlt,
    faAddressCard,
    faArrowsAltV,
    faPencilAlt,
    faTrash,
    faMoon,
    faChartPie,
    faChartBar,
    faCamera,
    faInstagram,
    faMobile,
    faTablet,
    faDesktop,
    faMobileAlt,
    faTabletAlt,
    faDonate,
    faTimes
);
