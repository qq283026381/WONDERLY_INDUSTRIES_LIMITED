window.onload = function () {
    showSliderInfo();
};

function returnXmlhttp() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp = new XMLHttpRequest();
    }
    else {
        // IE6, IE5 浏览器执行代码
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlhttp;
}

function showSliderInfo() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("slider-table").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax-mg/getSliderInfo.php", true);
    xmlhttp.send();
}

function checkImg() {
    var maxsize = 200 * 1024;//150KB
    var errMsg = "上传的附件文件不能超过200KB！！！";
    var tipMsg = "您的浏览器暂不支持计算上传文件的大小，确保上传文件不要超过200KB，建议使用FireFox、Chrome浏览器。";
    var sizeMsg = "请上传930*475尺寸的图片！";
    var browserCfg = {};
    var ua = window.navigator.userAgent;
    if (ua.indexOf("MSIE") >= 1) {
        browserCfg.ie = true;
    } else if (ua.indexOf("Firefox") >= 1) {
        browserCfg.firefox = true;
    } else if (ua.indexOf("Chrome") >= 1) {
        browserCfg.chrome = true;
    }
    var obj_file = document.getElementById("sliderImg");
    if (obj_file.value === "") {
        alert("请先选择上传文件");
        return false;
    }
    var fileSize ;
    var fileHeight;
    var fileWidth;
    var img=new Image();
    if (browserCfg.firefox || browserCfg.chrome) {
        fileSize = obj_file.files[0].size;
        img.src=obj_file;
    } else if (browserCfg.ie) {
        var obj_img = document.getElementById('sliderImg');
        obj_img.dynsrc = obj_file.value;
        fileSize = obj_img.filesize;
        img.src=obj_img;
    } else {
        alert(tipMsg);
        return false;
    }
    fileWidth=img.width;
    fileHeight=img.height;
    if (fileWidth !== 930 && fileHeight !== 475) {
        alert(sizeMsg);
        return false;
    }
    if (fileSize === -1) {
        alert(tipMsg);
        return false;
    } else if (fileSize > maxsize) {
        alert(errMsg);
        return false;
    } else {
        return true;
    }
}