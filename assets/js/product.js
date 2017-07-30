/**
 * Created by Bonnenu on 2017/7/23.
 */
showCategory();
showProduct();
window.onload = function () {
    initIframeHeight();
    setNavActive("product");
    categoryMove();
    showProductDetail();
};

function categoryMove() {
    var hHeight = $(".head").height();
    var nHeight = $(".nav").height();
    var height = hHeight + nHeight;
    $(window).scroll(function () {
        var scrollTop = $(document).scrollTop();
        if (scrollTop > height) {
            scrollTop -= height;
        } else {
            scrollTop = 0;
        }
        $(".left").stop().animate({"top": scrollTop}, 600);
    });
}

function showProductDetail(id) {
    getProductDetail(id);
    $("#product-detail-mask").click(hideBox);
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
    $("#product-detail-box").mouseenter(function () {
        $("#product-detail-mask").unbind()
    });
    $("#product-detail-box").mouseleave(function () {
        $("#product-detail-mask").click(hideBox)
    });
}

function hideBox() {
    $("#product-detail-box").fadeOut(200);
    $("#product-detail-mask").fadeOut(200);
}

function showBox() {
    $("#product-detail-mask").fadeIn(500, function () {
        $("#product-detail-box").fadeIn(300);
    });
}

function showCategory() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            var newNode = document.createElement("ul");
            newNode.innerHTML = xmlhttp.responseText;
            console.log(newNode);
            var lis = newNode.childNodes;
            console.log(lis);
            for (var i = 0; i < lis.length; i++) {
                var li = lis[i];
                li.onmouseover = function () {
                    var submenu = this.getElementsByTagName("ul");
                    if (submenu.length) {
                        submenu[0].style.display = "block";
                    }
                };
                li.onmouseout = function () {
                    var submenu = this.getElementsByTagName("ul");
                    if (submenu.length) {
                        submenu[0].style.display = "none";
                    }
                }
            }
            document.getElementById("menu-list").appendChild(newNode);
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getCategory.php", true);
    xmlhttp.send();
}


function showProduct() {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("productReval").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getProduct.php", true);
    xmlhttp.send();
}

function getProductDetail(id) {
    var xmlhttp = returnXmlhttp();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            document.getElementById("product-detail").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "../../util/ajax/getProductDetail.php?img=" + id, true);
    xmlhttp.send();
}

function backTop() {
    $("html,body").animate({scrollTop: 0}, 500);
}