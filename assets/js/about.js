/**
 * Created by Bonnenu on 2017/7/20.
 */
showAbout();
window.onload=function () {
  initIframeHeight();
};


function showAbout() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp = new XMLHttpRequest();
    }
    else {
        // IE6, IE5 浏览器执行代码
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("detail").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getAbout.php", true);
    xmlhttp.send();
}