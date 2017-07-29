<?php
//require "../../util/controllers/verify.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="../../assets-mg/css/manage.css"/>
    <link href='http://fonts.googleapis.com/css?family=Belgrano' rel='stylesheet' type='text/css'>
    <!-- jQuery file -->
    <script src="../../assets-mg/js/jquery.min.js"></script>
    <script src="../../assets-mg/js/jquery.tabify.js" charset="utf-8"></script>
    <script src="../../assets-mg/js/manage.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function () {
            $('#categoryTabMenu').tabify();
            $('#contactTabMenu').tabify();
            $('#submenu').tabify();
            $('#sideMenu').tabify();

            $(".toggle_container").hide();
            $(".trigger").click(function () {
                $(this).toggleClass("active").next().slideToggle("slow");
                return false;
            });
        });
        $(document).ready(function () {
            $('#sideMenu>li').click(function () {
                $('html, body').animate({scrollTop: 0}, 'slow');
            });
        });
    </script>
</head>
<body>
<div id="panelwrap">
    <div class="header">
        <div class="title">欢迎</div>
        <div class="header_right">Welcome Admin, <a href="#" class="settings">Settings</a> <a
                    href="../../util/controllers/LogoutController.php" class="logout">Logout</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#" class="selected">管理</a></li>
            </ul>
        </div>
    </div>

    <div class="submenu">
        <ul id="submenu">
            <li class="active"><a href="#homeManage">首页管理</a></li>
            <li><a href="#aboutManage">关于管理</a></li>
            <li><a href="#categoryManage">分类管理</a></li>
            <li><a href="#productManage">产品管理</a></li>
            <li><a href="#contactManage">联系管理</a></li>
        </ul>
    </div>

    <div class="center_content">
        <div class="right_wrap">
            <div class="right_content" id="homeManage">
                <h2>轮播图清单</h2>
                <table id="slider-table" class="rounded-corner"></table>
                <ul class="tabsmenu">
                    <li class="active"><a href="#addSlider">添加轮播图</a></li>
                </ul>
                <div id="addSlider" class="tabcontent">
                    <h3>选择轮播图</h3>
                    <form class="form" action="../../util/ajax-mg/addSlider.php" enctype="multipart/form-data"
                          method="post" onsubmit="return checkImg();">
                        <div class="form_row">
                            <label for="sliderImg">优先级:</label>
                            <input type="number" min="1" autocomplete="off" required placeholder="输入 1 以上的整数"
                                   class="form_input" name="sliderIndex" id="sliderIndex"/>
                            <span class="warming"></span>
                        </div>
                        <div class="form_row">
                            <label for="sliderImg">图片:</label>
                            <input type="file" name="newSliderImg" id="sliderImg"/>
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div class="toogle_wrap">
                    <div class="trigger"><a href="#">Tips</a></div>
                    <div class="toggle_container">
                        <p>
                            <span class="redStar">*</span> 轮播图尺寸950*475
                        </p>
                        <p>
                            <span class="redStar">*</span> 轮播图只能上传jpg文件
                        </p>
                        <p>
                            <span class="redStar">*</span> 优先级只能设置正整数
                        </p>
                        <p>
                            <span class="redStar">*</span> 优先级可重复
                        </p>
                    </div>
                </div>
            </div>
            <div class="right_content" id="categoryManage">
                <h2>分类清单</h2>
                <table id="category-table" class="rounded-corner">
                    <thead>
                    <tr>
                        <th>优先级</th>
                        <th>分类名</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody id="menu-list"></tbody>
                </table>
                <ul id="categoryTabMenu" class="tabsmenu">
                    <li class="active"><a href="#addMenu">添加分类</a></li>
                    <li><a href="#addSubmenu">添加子类</a></li>
                </ul>
                <div id="addMenu" class="tabcontent">
                    <h3>新增分类</h3>
                    <form class="form" action="../../util/ajax-mg/addMenu.php"
                          method="post">
                        <div class="form_row">
                            <label for="menuIndex">优先级:</label>
                            <input type="number" min="1" autocomplete="off" required placeholder="输入 1 以上的整数"
                                   class="form_input" name="menuIndex" id="menuIndex"/>
                            <span class="warming"></span>
                        </div>
                        <div class="form_row">
                            <label for="categoryMenu">分类:</label>
                            <input oninput="checkMenu();" required class="form_input" autocomplete="off"
                                   name="categoryMenu" id="categoryMenu"/>
                            <p id="menuWarming" class="warming">该分类名已经存在。</p>
                        </div>
                        <div class="form_row">
                            <input type="submit" id="menuSubmit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div id="addSubmenu" class="tabcontent">
                    <h3>新增子类</h3>
                    <form class="form" action="../../util/ajax-mg/addSubmenu.php"
                          method="post">
                        <div class="form_row">
                            <label for="submenuIndex">优先级:</label>
                            <input type="number" min="1" autocomplete="off" required placeholder="输入 1 以上的整数"
                                   class="form_input" name="submenuIndex" id="submenuIndex"/>
                            <span class="warming"></span>
                        </div>
                        <div class="form_row">
                            <label for="categorySubmenu">子类:</label>
                            <input oninput="checkSubmenu();" required class="form_input" autocomplete="off" name="categorySubmenu" id="categorySubmenu"/>
                            <p id="submenuWarming" class="warming">该子类名已经存在！</p>
                        </div>
                        <div class="form_row">
                            <label for="categoryParent">父类:</label>
                            <select required class="form_input" name="categoryParent" id="categoryParent">
                                <option value="SCREWS">SCREWS</option>
                            </select>
                        </div>
                        <div class="form_row">
                            <input id="submenuSubmit" type="submit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div class="toogle_wrap">
                    <div class="trigger"><a href="#">Tips</a></div>
                    <div class="toggle_container">
                        <p>
                            <span class="redStar">*</span> 务必先添加分类再添加子类
                        </p>
                    </div>
                </div>

                <h2>子类清单</h2>
                <table id="category-table" class="rounded-corner">
                    <thead>
                    <tr>
                        <th>优先级</th>
                        <th>子类名</th>
                        <th>父级栏</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody id="submenu-list"></tbody>
                </table>
            </div>
            <div class="right_content" id="productManage">
                <h2>产品清单</h2>
                <table id="product-table" class="rounded-corner">
                    <thead>
                    <tr>
                        <th>优先级</th>
                        <th>图片</th>
                        <th>描述</th>
                        <th>规格</th>
                        <th>分类</th>
                        <th>编辑</th>
                        <th>删除</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="even">
                        <td>2</td>
                        <td>Drywall Screw WDL-M001A.jpg</td>
                        <td>WDL-M001A Black PH
                            Bugle head phillips drywall screw Fine thread
                            Material: Carbon Steel(C1008 ,C1018,C1022 Hardened),Stainless Steel
                            Finish:Zinc Plated,Nickle Plated,Brass Plated,Black Oxide,Black&Grey Phosphated,Ruspert
                        </td>
                        <td>Main Size: 3.5x13~55 #6x1/2’’~2-1/4’’
                            3.9x13~60 #7x1/2’’~2-1/2’’
                            4.2x16~75 #8x5/8’’~3’’
                            4.8x50~150 #10x2’’~6’’
                            5.5x50~150 #12x2’’~6’’
                        </td>
                        <td>Drywall Screw</td>
                        <td><a><img src="../../assets-mg/img/edit.png" border="0"> </a></td>
                        <td><a><img src="../../assets-mg/img/trash.gif" border="0"> </a></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="12">产品清单结束</td>
                    </tr>
                    </tfoot>
                </table>

                <ul class="tabsmenu">
                    <li class="active"><a href="#addSlider">添加轮播图</a></li>
                </ul>
                <div id="addSlider" class="tabcontent">
                    <h3>选择轮播图</h3>
                    <form class="form" action="../../util/ajax-mg/addSlider.php" enctype="multipart/form-data"
                          method="post" onsubmit="return checkImg();">
                        <div class="form_row">
                            <label for="sliderImg">优先级:</label>
                            <input type="number" min="1" autocomplete="off" required placeholder="输入 1 以上的整数"
                                   class="form_input" name="sliderIndex" id="sliderIndex"/>
                            <span class="warming"></span>
                        </div>
                        <div class="form_row">
                            <label for="sliderImg">图片:</label>
                            <input type="file" name="newSliderImg" id="sliderImg"/>
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div class="toogle_wrap">
                    <div class="trigger"><a href="#">Tips</a></div>
                    <div class="toggle_container">
                        <p>
                            <span class="redStar">*</span> 轮播图尺寸950*475
                        </p>
                        <p>
                            <span class="redStar">*</span> 轮播图只能上传jpg文件
                        </p>
                        <p>
                            <span class="redStar">*</span> 优先级只能设置正整数
                        </p>
                        <p>
                            <span class="redStar">*</span> 优先级可重复
                        </p>
                    </div>
                </div>
            </div>
            <div class="right_content" id="aboutManage">
                <h2>页面内容</h2>
                <table class="rounded-corner">
                    <thead>
                    <tr>
                        <th>内容</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd">
                        <td id="about-page-content"></td>
                    </tr>
                    </tbody>
                </table>
                <ul class="tabsmenu">
                    <li class="active"><a href="#revise-about">修改内容</a></li>
                </ul>
                <div id="revise-about" class="tabcontent">
                    <h3>修改关于我们内容</h3>
                    <form id="update-about-form" class="form" action="../../util/ajax-mg/reviseAbout.php" method="post">
                        <div class="form_row">
                            <label for="about-content">内容：</label>
                            <textarea autocomplete="off" onmouseover="this.select();" class="form_input"
                                      name="about-content" id="about-content"></textarea>
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="修改"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div class="toogle_wrap">
                    <div class="trigger"><a href="#">Tips</a></div>
                    <div class="toggle_container">
                        <p>
                            鼠标移动到内容里即可全部选中
                        </p>
                    </div>
                </div>
            </div>
            <div class="right_content" id="contactManage">
                <ul id="contactTabMenu" class="tabsmenu">
                    <li class="active"><a href="#reviseAddress">修改地址</a></li>
                    <li><a href="#reviseContactPic">修改图片</a></li>
                </ul>
                <div id="reviseAddress" class="tabcontent">
                    <h3>修改地址</h3>
                    <form class="form" action="../../util/ajax-mg/reviseAddress.php" method="post">
                        <div id="address-row" class="form_row">
                            <label for="revise-address">地址：</label>
                            <textarea class="form_input" onmouseover="this.select();" name="revise-address"
                                      id="revise-address"></textarea>
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="修改"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div id="reviseContactPic" class="tabcontent">
                    <h3>修改图片(490*275)</h3>
                    <form enctype="multipart/form-data" action="../../util/ajax-mg/reviseContactPic.php" method="post"
                          class="form" onsubmit="return checkContactImg();">
                        <div id="contact-pic" class="form_row"></div>
                        <div class="form_row">
                            <label for="searchCourseSelectId">新图片：</label>
                            <input type="file" name="revise-contact-pic" id="revise-contact-pic"/>
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="修改"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div id="guest-list">
                    <h2>客户列表</h2>
                    <table class="rounded-corner">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Country</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>E-mail</th>
                            <th>Message</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <td colspan="12">点击邮件即可弹窗邮件工具。</td>
                        </tr>
                        </tfoot>
                        <tbody id="guest-info"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end of right content-->


        <div class="sidebar" id="sidebar">
            <h2>Page Section</h2>
            <ul id="sideMenu">
                <li class="active"><a href="#homeManage">首页管理</a></li>
                <li><a href="#aboutManage">关于管理</a></li>
                <li><a href="#contactManage">联系管理</a></li>
            </ul>
            <h2>返回主网页</h2>
            <ul>
                <li><a href="../../" target="_blank">主网页</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div> <!--end of center_content-->
    <div class="footer">
    </div>
</div>

<div id="revise-mask" class="mask">
    <div id="revise-box" class="box">
        <div class="revise-box-title">
            <h2>Detail</h2>
            <div id="close-box" class="close">
            </div>
        </div>
        <div id="revise-detail" class="revise-detail">
        </div>
    </div>
</div>
<img src="" id="tempImg" dynsrc="" style="display:none"/>
</body>
</html>