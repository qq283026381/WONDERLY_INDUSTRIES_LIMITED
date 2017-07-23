/**
 * Created by Bonnenu on 2017/7/23.
 */
showContact();
window.onload=function () {
    initIframeHeight();
    setNavActive("contact");
};
function showContact() {
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
            document.getElementById("address").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getContact.php", true);
    xmlhttp.send();
}
function addGuest() {
    var name,company,region,phone,fax,email,message;
    name=guestInfo.name.value?guestInfo.name.value:"";
    company=guestInfo.company.value?guestInfo.company.value:"";
    region=guestInfo.region.value?guestInfo.region.value:"";
    phone=guestInfo.phone.value?guestInfo.phone.value:"";
    fax=guestInfo.fax.value?guestInfo.fax.value:"";
    email=guestInfo.email.value?guestInfo.email.value:"";
    message=guestInfo.message.value?guestInfo.message.value:"";
    alert(name+company+region+phone+fax+email+message);
}