import Vue from 'vue';// filters

Vue.filter('xmoney', value => {
    const letters = {
        "0": "۰",
        "1": "۱",
        "2": "۲",
        "3": "۳",
        "4": "۴",
        "5": "۵",
        "6": "۶",
        "7": "۷",
        "8": "۸",
        "9": "۹",
    };
    let result = '';
    if (value) {
        let valueArray = value.toString().split('');
        let resultArray = [];
        let counter = 0;
        let temp = '';
        for (let i = valueArray.length - 1; i >= 0; i--) {
            temp += valueArray[i];
            counter++;
            if (counter === 3) {
                resultArray.push(temp);
                counter = 0;
                temp = '';
            }
        }
        if (counter > 0) {
            resultArray.push(temp);
        }
        for (let i = resultArray.length - 1; i >= 0; i--) {
            let resTemp = resultArray[i].split('');
            for (let j = resTemp.length - 1; j >= 0; j--) {
                result += letters[resTemp[j]];
            }
            if (i > 0) {
                result += ','
            }
        }
    }
    return result;
});
