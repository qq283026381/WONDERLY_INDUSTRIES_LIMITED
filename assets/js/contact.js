/**
 * Created by Bonnenu on 2017/7/23.
 */
showContact();
window.onload=function () {
    initIframeHeight();
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
    var name,position,company,region,address,postCode,phone,fax,email;
    name=guestInfo.name.value?guestInfo.name.value:"";
    position=guestInfo.position.value?guestInfo.position.value:"";
    company=guestInfo.company.value?guestInfo.company.value:"";
    region=guestInfo.region.value?guestInfo.region.value:"";
    address=guestInfo.address.value?guestInfo.address.value:"";
    postCode=guestInfo.postCode.value?guestInfo.postCode.value:"";
    phone=guestInfo.phone.value?guestInfo.phone.value:"";
    fax=guestInfo.fax.value?guestInfo.fax.value:"";
    email=guestInfo.email.value?guestInfo.email.value:"";
    alert(name+position+company+region+address+postCode+phone+fax+email);
}