window.onload = function () {
    showSliderInfo();
    showAboutContent();
    slidebarMove();
    showGuestInfo();
    showAddress();
    showContactPic();
};

function slidebarMove() {
    function $(id) {
        return document.getElementById(id);
    }
    function scroll() {
        if (window.pageYOffset !== null)  //  ie9+ 和其他浏览器
        {
            return {
                left: window.pageXOffset,
                top: window.pageYOffset
            }
        }
        else if (document.compatMode === "CSS1Compat")  // 声明的了 DTD
        // 检测是不是怪异模式的浏览器 -- 就是没有 声明<!DOCTYPE html>
        {
            return {
                left: document.documentElement.scrollLeft,
                top: document.documentElement.scrollTop
            }
        }
        return { //  剩下的肯定是怪异模式的
            left: document.body.scrollLeft,
            top: document.body.scrollTop
        }
    }
    var pic = $("sidebar");
    var leader = 0;
    var target = 0;
    var timer = null;  // 定时器
    var top = pic.offsetTop;  // 50
    window.onscroll = function() {
        clearInterval(timer);
        target = scroll().top + top;  // 把最新的 scrolltop 给  target
        timer = setInterval(function() {
            leader = leader + (target - leader ) / 10;
            pic.style.top = leader + 'px';
        },30)
    }
}

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
    var fileSize = 0;
    if (browserCfg.firefox || browserCfg.chrome) {
        fileSize = obj_file.files[0].size;
    } else if (browserCfg.ie) {
        var obj_img = document.getElementById("tempImg");
        obj_img.dynsrc = obj_file.value;
        fileSize = obj_img.filesize;
    } else {
        alert(tipMsg);
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

function checkReviseImg() {
    var obj_file = document.getElementById("sliderImg");
    if (obj_file.value === "") {
        return true;
    } else {
        var maxsize = 200 * 1024;//150KB
        var errMsg = "上传的附件文件不能超过200KB！！！";
        var tipMsg = "您的浏览器暂不支持计算上传文件的大小，确保上传文件不要超过200KB，建议使用FireFox、Chrome浏览器。";
        var browserCfg = {};
        var ua = window.navigator.userAgent;
        if (ua.indexOf("MSIE") >= 1) {
            browserCfg.ie = true;
        } else if (ua.indexOf("Firefox") >= 1) {
            browserCfg.firefox = true;
        } else if (ua.indexOf("Chrome") >= 1) {
            browserCfg.chrome = true;
        }
        var fileSize = 0;
        if (browserCfg.firefox || browserCfg.chrome) {
            fileSize = obj_file.files[0].size;
        } else if (browserCfg.ie) {
            var obj_img = document.getElementById("tempImg");
            obj_img.dynsrc = obj_file.value;
            fileSize = obj_img.filesize;
        } else {
            alert(tipMsg);
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
}

function checkContactImg() {
    var obj_file = document.getElementById("revise-contact-pic");
    if (obj_file.value === "") {
        return false;
    } else {
        var maxsize = 200 * 1024;//150KB
        var errMsg = "上传的附件文件不能超过200KB！！！";
        var tipMsg = "您的浏览器暂不支持计算上传文件的大小，确保上传文件不要超过200KB，建议使用FireFox、Chrome浏览器。";
        var browserCfg = {};
        var ua = window.navigator.userAgent;
        if (ua.indexOf("MSIE") >= 1) {
            browserCfg.ie = true;
        } else if (ua.indexOf("Firefox") >= 1) {
            browserCfg.firefox = true;
        } else if (ua.indexOf("Chrome") >= 1) {
            browserCfg.chrome = true;
        }
        var fileSize = 0;
        if (browserCfg.firefox || browserCfg.chrome) {
            fileSize = obj_file.files[0].size;
        } else if (browserCfg.ie) {
            var obj_img = document.getElementById("tempImg");
            obj_img.dynsrc = obj_file.value;
            fileSize = obj_img.filesize;
        } else {
            alert(tipMsg);
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
}

function showSliderDetail(img) {
    getSliderDetail(img);
    $("#revise-mask").click(hideBox);
    $("#close-box").mouseenter(function () {
        $(this).fadeOut("fast", function () {
            $(this).css("background", "url('../../assets/imgs/icons/close-hover.png') no-repeat");
            $(this).fadeIn("fast");
        })
    }).mouseleave(function () {
        $(this).fadeOut("fast", function () {
            $(this).css("background", "url('../../assets/imgs/icons/close.png') no-repeat");
            $(this).fadeIn("fast");
        })
    });
    $("#close-box").click(hideBox);
    $("#revise-box").mouseenter(function () {
        $("#revise-mask").unbind()
    });
    $("#revise-box").mouseleave(function () {
        $("#revise-mask").click(hideBox)
    });
}

function hideBox() {
    $("#revise-box").fadeOut(200);
    $("#revise-mask").fadeOut(200);
}

function showBox() {
    $("#revise-mask").fadeIn(500, function () {
        $("#revise-box").fadeIn(300);
    });
}

function getSliderDetail(img) {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("revise-form").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax-mg/getSliderDetail.php?img="+img, true);
    xmlhttp.send();
}

function showAboutContent() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("about-page-content").innerHTML = xmlhttp.responseText;
            document.getElementById("about-content").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax-mg/getAboutContent.php", true);
    xmlhttp.send();
}

function showGuestInfo() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("guest-info").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax-mg/getGuestInfo.php", true);
    xmlhttp.send();
}

function showAddress() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("revise-address").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax-mg/getAddress.php", true);
    xmlhttp.send();
}
function showContactPic() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("contact-pic").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax-mg/getContactPic.php", true);
    xmlhttp.send();
}