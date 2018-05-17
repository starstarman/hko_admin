function getDateDiff(dateTimeStamp) {
    var result;
    var minute = 1000 * 60;
    var hour = minute * 60;
    var day = hour * 24;
    var halfamonth = day * 15;
    var month = day * 30;
    var now = new Date().getTime();
    var diffValue = now - dateTimeStamp;
    if (diffValue < 0) {
        return;
    }
    var monthC = diffValue / month;
    var weekC = diffValue / (7 * day);
    var dayC = diffValue / day;
    var hourC = diffValue / hour;
    var minC = diffValue / minute;
    if (monthC >= 1) {
        if (monthC <= 12)
            result = "" + parseInt(monthC) + "��ǰ";
        else {
            result = "" + parseInt(monthC / 12) + "��ǰ";
        }
    }
    else if (weekC >= 1) {
        result = "" + parseInt(weekC) + "��ǰ";
    }
    else if (dayC >= 1) {
        result = "" + parseInt(dayC) + "��ǰ";
    }
    else if (hourC >= 1) {
        result = "" + parseInt(hourC) + "Сʱǰ";
    }
    else if (minC >= 1) {
        result = "" + parseInt(minC) + "����ǰ";
    } else {
        result = "�ո�";
    }

    return result;
};