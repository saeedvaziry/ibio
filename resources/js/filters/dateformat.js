import Vue from 'vue';
import moment from "moment";

require('moment-timezone');

Vue.filter('dateformat', function (value, type = 'simple') {
    if (type === 'simple') {
        return moment(value).tz(moment.tz.guess()).format('YYYY-MM-DD hh:mm:ss')
    }
    if (type === 'only-date') {
        return moment(value).tz(moment.tz.guess()).format('YYYY-MM-DD')
    }
});
