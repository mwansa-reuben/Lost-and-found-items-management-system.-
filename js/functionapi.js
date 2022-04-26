function getRootPath() {
    var pathName = window.location.pathname.substring(1);
    var webName = pathName == '' ? '' : pathName.substring(0, pathName.indexOf('/'));
    return window.location.protocol + '//' + window.location.host + '/' + webName;
}

//function to loop through inputs to ensure they are all not empty
function validateFields(className = String) {
    var inputFilled = true;
    var elements = $(`.${className}`);
    for (let i = 0; i < elements.length; i++) {
        if (!$(elements[i]).val().trim()) {
            warn($(elements[i]), "This Field is required!", $(elements[i]).attr('type'));
            inputFilled = false;
        }
    }
    return inputFilled;
}


//function to flag an error
function warn(el = Element, msg = String, type = String) {
    var text, elementType;
    $(el).css({ color: red });
    if (type == hType) {
        text = $(el).text();
        $(el).text(msg);
    } else if (type == selectType) {
        text = $(el).val();
    } else if (type == 'textarea') {
        $(el).val(msg);
    } else if (!$(el).prop(elType).trim().includes(textType)) {
        elementType = $(el).prop(elType);
        text = $(el).val();
        $(el).prop(elType, textType);
        $(el).val(msg);
    } else {
        text = $(el).val();
        $(el).prop(elType, textType);
        $(el).val(msg);
    }
    setTimeout(() => {
        $(el).css({ color: black });
        if (type !== hType) {
            $(el).prop(elType, elementType);
            $(el).val(text);
        } else {
            $(el).text(text);
        }
    }, 2000);
}


function ajaxRequest(url, data, beforeSend, success, error) {
    $.ajax({
        type: "post",
        url: url,
        data: data,
        dataType: "json",
        beforeSend: beforeSend,
        success: function(response) {
            if (response.status == done) {
                success(response);
            } else error;
        }
    });
}

function ajaxFileRequest(url, data, beforeSend, success, error) {
    $.ajax({
        type: "post",
        url: url,
        data: data,
        dataType: "json",
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: beforeSend,
        success: function(response) {
            if (response.status == done) {
                success(response);
            } else error(response);
        }
    });
}

function formatCurrency(num, currency) {
    return Intl.NumberFormat('eng-ZM', {
        style: 'currency',
        currency: currency,
    }).format(num);
}

function addBtnLoader(el = Object, text = String, isSubmit = Boolean, w = Number, h = Number) {
    isSubmit ?
        $(el).html(`${text}<div class="submit-spin"  style="width:${w}px;height:${h}px"></div>`) :
        $(el).html(`${text}<div class="spin"  style="width:${w}px;height:${h}px"></div>`)
}

// time counter.
var
    dur = 0,
    timeInterval = 0,
    time = 0,
    tSecs = 0,
    hh, mm, ss;

function timeCount(el, onTimeUp) {
    tSecs = time;
    var h = Math.floor(tSecs / 3600);
    var m = Math.floor(tSecs % 3600 / 60);
    var s = Math.floor(tSecs % 3600 % 60);
    h.toString().length > 1 ? hh = h : hh = `0${h}`
    m.toString().length > 1 ? mm = m : mm = `0${m}`
    s.toString().length > 1 ? ss = s : ss = `0${s}`
    $(el).text(`${hh}:${mm}:${ss}`);
    if (time <= 0) {
        clearInterval(timeInterval);
    }
    time--;
}

function responseDisplay(el, text, before) {
    $(el).html(text);
    setTimeout(() => {
        $(el).html(before);
    }, 2000);
}