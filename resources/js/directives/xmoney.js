import Vue from "vue";
Vue.directive("xmoney", function (el) {
    let value = el.value.split(",").join("");
    value = value.toEnglishDigits();
    if (isNaN(value)) {
        value = el.value.replace(/\D/g, "");
    }
    let result = "";
    let valueArray = value.split("");
    let resultArray = [];
    let counter = 0;
    let temp = "";
    for (let i = valueArray.length - 1; i >= 0; i--) {
        temp += valueArray[i];
        counter++;
        if (counter === 3) {
            resultArray.push(temp);
            counter = 0;
            temp = "";
        }
    }
    if (counter > 0) {
        resultArray.push(temp);
    }
    for (let i = resultArray.length - 1; i >= 0; i--) {
        let resTemp = resultArray[i].split("");
        for (let j = resTemp.length - 1; j >= 0; j--) {
            result += resTemp[j];
        }
        if (i > 0) {
            result += ",";
        }
    }
    el.value = result;
});

String.prototype.toEnglishDigits = function () {
    var id = {
        "۰": "0",
        "۱": "1",
        "۲": "2",
        "۳": "3",
        "۴": "4",
        "۵": "5",
        "۶": "6",
        "۷": "7",
        "۸": "8",
        "۹": "9",
    };
    return this.replace(/[^0-9.]/g, function (w) {
        return id[w] || w;
    });
};
