import moment from "moment-timezone";

export default {
    dateTime(value, type = "simple") {
        if (type === "simple") {
            return moment(value).tz(moment.tz.guess()).format("YYYY-MM-DD hh:mm:ss");
        }
        if (type === "only-date") {
            return moment(value).tz(moment.tz.guess()).format("YYYY-MM-DD");
        }
    },
};
