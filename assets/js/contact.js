/**
 * Created by Bonnenu on 2017/7/23.
 */
showContact();
window.onload = function () {
    initIframeHeight();
    setNavActive("contact");
};

function showContact() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("address").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getContact.php", true);
    xmlhttp.send();
}