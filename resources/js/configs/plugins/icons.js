import Vue from 'vue';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';

Vue.component('fa-icon', FontAwesomeIcon);

import {library} from '@fortawesome/fontawesome-svg-core';
import {
    faAddressCard, faArrowsAltV,
    faBars,
    faChevronDown,
    faCog,
    faEye,
    faLink, faMoon, faPencilAlt,
    faTachometerAlt, faTrash
} from '@fortawesome/free-solid-svg-icons';
import {
    faTwitter
} from '@fortawesome/free-brands-svg-icons';

library.add(faChevronDown);
library.add(faBars);
library.add(faEye);
library.add(faCog);
library.add(faLink);
library.add(faTachometerAlt);
library.add(faAddressCard);
library.add(faArrowsAltV);
library.add(faPencilAlt);
library.add(faTrash);
library.add(faMoon);
