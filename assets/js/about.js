/**
 * Created by Bonnenu on 2017/7/20.
 */
showAbout();
window.onload = function () {
    initIframeHeight();
    setNavActive("about");
};


function showAbout() {
    var xmlhttp=returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("detail").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getAbout.php", true);
    xmlhttp.send();
}