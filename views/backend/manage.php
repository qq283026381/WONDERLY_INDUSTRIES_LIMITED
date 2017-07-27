<?php
require "../../util/controllers/verify.php";
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
    <script src="../../assets-mg/js/scripts.js"></script>
    <script src="../../assets-mg/js/manage.js"></script>
    <script>
        var $ = jQuery.noConflict();
        $(function () {
            $('#courseMenu').tabify();
            $('#studentMenu').tabify();
            $('#courseSelectMenu').tabify();
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
            <li><a href="#studentManage">学生管理</a></li>
            <li><a href="#courseSelectManage">选课管理</a></li>
        </ul>
    </div>

    <div class="center_content">
        <div class="right_wrap">
            <div class="right_content" id="homeManage">
                <h2>轮播图清单</h2>
                <table id="slider-table" class="rounded-corner"></table>
                <ul id="courseMenu" class="tabsmenu">
                    <li class="active"><a href="#addSlider">添加轮播图</a></li>
                </ul>
                <div id="addSlider" class="tabcontent">
                    <h3>选择轮播图</h3>
                    <form class="form" action="../../util/ajax-mg/addSlider.php" enctype="multipart/form-data" method="post" onsubmit="return checkImg();">
                        <div class="form_row">
                            <label for="sliderImg">优先级:</label>
                            <input type="number" min="1" autocomplete="off" placeholder="输入 1 以上的整数" class="form_input" name="sliderIndex" id="sliderIndex"/>
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
                            <span class="redStar">*</span> 轮播图尺寸930*475
                        </p>
                        <p>
                            <span class="redStar">*</span> 优先级只能设置正整数
                        </p>
                    </div>
                </div>
            </div>
            <div class="right_content" id="studentManage">
                <h2>学生清单</h2>
                <table class="rounded-corner">
                    <thead>
                    <tr>
                        <th></th>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>班级</th>
                        <th>专业</th>
                        <th>公寓</th>
                        <th>籍贯</th>
                        <th>注册</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut.
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr class="odd">
                        <td><input title="" type="checkbox" name=""/></td>
                        <td>2014011482</td>
                        <td>罗霞</td>
                        <td>女</td>
                        <td>软工1403</td>
                        <td>软件工程</td>
                        <td>学三</td>
                        <td>湖北</td>
                        <td>true</td>
                        <td><a href="#"><img src="../../assets-mg/img/edit.png" alt="" title="" border="0"/></a></td>
                        <td><a href="#"><img src="../../assets-mg/img/trash.gif" alt="" title="" border="0"/></a></td>
                    </tr>
                    <tr class="even">
                        <td><input title="" type="checkbox" name=""/></td>
                        <td>2014012568</td>
                        <td>李刚</td>
                        <td>男</td>
                        <td>计科1402</td>
                        <td>计算机科学</td>
                        <td>学四</td>
                        <td>湖南</td>
                        <td>true</td>
                        <td><a href="#"><img src="../../assets-mg/img/edit.png" alt="" title="" border="0"/></a></td>
                        <td><a href="#"><img src="../../assets-mg/img/trash.gif" alt="" title="" border="0"/></a></td>
                    </tr>


                    </tbody>
                </table>

                <div class="form_sub_buttons">
                    <a href="#" class="button green">Edit selected</a>
                    <a href="#" class="button red">Delete selected</a>
                </div>

                <ul id="studentMenu" class="tabsmenu">
                    <li class="active"><a href="#addStudent">添加学生信息</a></li>
                    <li><a href="#selectStudent">查询学生信息</a></li>

                </ul>
                <div id="addStudent" class="tabcontent">
                    <h3>学生信息</h3>
                    <form class="form">
                        <div class="form_row">
                            <label for="studentId">学号:</label>
                            <input class="form_input" name="" id="studentId"/>
                        </div>
                        <div class="form_row">
                            <label for="studentName">姓名:</label>
                            <input class="form_input" name="" id="studentName"/>
                        </div>
                        <div class="form_row">
                            <label for="studentGender">性别:</label>
                            <input class="form_input" name="" id="studentGender">
                        </div>
                        <div class="form_row">
                            <label for="studentClass">班级:</label>
                            <input class="form_input" name="" id="studentClass">
                        </div>
                        <div class="form_row">
                            <label for="studentSpecialty">专业:</label>
                            <input class="form_input" name="" id="studentSpecialty">
                        </div>
                        <div class="form_row">
                            <label for="apartment">公寓:</label>
                            <input class="form_input" name="" id="apartment">
                        </div>
                        <div class="form_row">
                            <label for="studentNative">籍贯:</label>
                            <input class="form_input" name="" id="studentNative">
                        </div>
                        <div class="form_row">
                            <label for="registerInfo">注册:</label>
                            <input class="form_input" name="" id="registerInfo">
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div id="selectStudent" class="tabcontent">
                    <h3>查询学生</h3>
                    <div class="form">
                        <div id="">
                            <div class="form_row">
                                <label for="searchStudentId">学号:</label>
                                <input class="form_input" name="" id="searchStudentId"/>
                            </div>
                            <div class="form_row">
                                <label for="searchStudentName">姓名:</label>
                                <input class="form_input" name="" id="searchStudentName"/>
                            </div>
                            <div class="form_row">
                                <label for="searchStudentGender">性别:</label>
                                <input class="form_input" name="" id="searchStudentGender">
                            </div>
                            <div class="form_row">
                                <label for="searchStudentClass">班级:</label>
                                <input class="form_input" name="" id="searchStudentClass">
                            </div>
                            <div class="form_row">
                                <label for="searchstudentSpecialty">专业:</label>
                                <input class="form_input" name="" id="searchstudentSpecialty">
                            </div>
                            <div class="form_row">
                                <label for="searchApartment">公寓:</label>
                                <input class="form_input" name="" id="searchApartment">
                            </div>
                            <div class="form_row">
                                <label for="searchStudentNative">籍贯:</label>
                                <input class="form_input" name="" id="searchStudentNative">
                            </div>
                            <div class="form_row">
                                <label for="searchRegisterInfo">注册:</label>
                                <input class="form_input" name="" id="searchRegisterInfo">
                            </div>
                            <div class="form_row">
                                <input type="submit" value="查询" class="form_submit">
                            </div>
                        </div>

                        <table class="rounded-corner">
                            <thead>
                            <tr>
                                <th></th>
                                <th>课程号</th>
                                <th>课程名</th>
                                <th>授课教师</th>
                                <th>授课时间</th>
                                <th>授课地点</th>
                                <th>授课学期</th>
                                <th>先导课程</th>
                                <th>课程学分</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <td colspan="12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod tempor
                                    incididunt ut.
                                </td>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr class="odd">
                                <td><input title="" type="checkbox" name=""/></td>
                                <td>KB1257O1</td>
                                <td>高等数学</td>
                                <td>罗霞</td>
                                <td>2-10周</td>
                                <td>2-2-411</td>
                                <td>1</td>
                                <td>无</td>
                                <td>3</td>
                            </tr>
                            <tr class="even">
                                <td><input title="" type="checkbox" name=""/></td>
                                <td>KB1264O1</td>
                                <td>线性代数</td>
                                <td>李刚</td>
                                <td>3-14周</td>
                                <td>2-2-302</td>
                                <td>2</td>
                                <td>KB1257O1</td>
                                <td>3</td>
                            </tr>


                            </tbody>
                        </table>

                        <div class="clear"></div>
                    </div>
                </div>

                <div class="toogle_wrap">
                    <div class="trigger"><a href="#">Toggle with text</a></div>

                    <div class="toggle_container">
                        <p>
                            Lorem ipsum <a href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum <a
                                    href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>

            </div>
            <div class="right_content" id="courseSelectManage">
                <h2>选课清单</h2>
                <table class="rounded-corner">
                    <thead>
                    <tr>
                        <th></th>
                        <th>学号</th>
                        <th>课程号</th>
                        <th>开课学期</th>
                        <th>成绩</th>
                        <th>学分</th>
                        <th>绩点</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <td colspan="12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut.
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    <tr class="odd">
                        <td><input title="" type="checkbox" name=""/></td>
                        <td>2014011482</td>
                        <td>KB1257O1</td>
                        <td>1</td>
                        <td>76</td>
                        <td>3</td>
                        <td>2</td>
                        <td><a href="#"><img src="../../assets-mg/img/edit.png" alt="" title="" border="0"/></a></td>
                        <td><a href="#"><img src="../../assets-mg/img/trash.gif" alt="" title="" border="0"/></a></td>
                    </tr>
                    <tr class="even">
                        <td><input title="" type="checkbox" name=""/></td>
                        <td>2014011482</td>
                        <td>KB1257O1</td>
                        <td>1</td>
                        <td>80</td>
                        <td>3</td>
                        <td>3</td>
                        <td><a href="#"><img src="../../assets-mg/img/edit.png" alt="" title="" border="0"/></a></td>
                        <td><a href="#"><img src="../../assets-mg/img/trash.gif" alt="" title="" border="0"/></a></td>
                    </tr>


                    </tbody>
                </table>

                <div class="form_sub_buttons">
                    <a href="#" class="button green">Edit selected</a>
                    <a href="#" class="button red">Delete selected</a>
                </div>
                <ul id="courseSelectMenu" class="tabsmenu">
                    <li class="active"><a href="#addCourseSelect">添加成绩</a></li>
                    <li><a href="#selectCourseSelect">查询成绩</a></li>
                </ul>
                <div id="addCourseSelect" class="tabcontent">
                    <h3>添加记录</h3>
                    <form class="form">
                        <div class="form_row">
                            <label for="studentSelectId">学号:</label>
                            <input class="form_input" name="" id="studentSelectId"/>
                        </div>
                        <div class="form_row">
                            <label for="courseSelectId">课程号:</label>
                            <input class="form_input" name="" id="courseSelectId"/>
                        </div>
                        <div class="form_row">
                            <label for="courseSelectTerm">开课学期:</label>
                            <input class="form_input" name="" id="courseSelectTerm">
                        </div>
                        <div class="form_row">
                            <label for="studentSelectScore">成绩:</label>
                            <input class="form_input" name="" id="studentSelectScore">
                        </div>
                        <div class="form_row">
                            <label for="studentSelectCredit">学分:</label>
                            <input class="form_input" name="" id="studentSelectCredit">
                        </div>
                        <div class="form_row">
                            <label for="studentSelectPoint">绩点:</label>
                            <input class="form_input" name="" id="studentSelectPoint">
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </form>
                </div>
                <div id="selectCourseSelect" class="tabcontent">
                    <h3>查询记录</h3>
                    <div class="form">
                        <div class="form_row">
                            <label for="SearchStudentSelectId">学号:</label>
                            <input class="form_input" name="" id="SearchStudentSelectId"/>
                        </div>
                        <div class="form_row">
                            <label for="searchCourseSelectId">课程号:</label>
                            <input class="form_input" name="" id="searchCourseSelectId"/>
                        </div>
                        <div class="form_row">
                            <label for="searchCourseSelectTerm">开课学期:</label>
                            <input class="form_input" name="" id="searchCourseSelectTerm">
                        </div>
                        <div class="form_row">
                            <input type="submit" class="form_submit" value="添加"/>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>


                <div class="toogle_wrap">
                    <div class="trigger"><a href="#">Toggle with text</a></div>

                    <div class="toggle_container">
                        <p>
                            Lorem ipsum <a href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Lorem ipsum <a
                                    href="#">dolor sit amet</a>, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                    </div>
                </div>

            </div>
        </div><!-- end of right content-->


        <div class="sidebar" id="sidebar">
            <h2>Page Section</h2>
            <ul id="sideMenu">
                <li class="active"><a href="#courseManage">课程管理</a></li>
                <li><a href="#studentManage">学生管理</a></li>
                <li><a href="#courseSelectManage">选课管理</a></li>
            </ul>


            <h2>User Settings</h2>

            <ul>
                <li><a href="#">Edit user</a></li>
                <li><a href="#">Add users</a></li>
                <li><a href="#">Manage users</a></li>
                <li><a href="#">Help</a></li>
            </ul>

            <h2>通知</h2>
            <div class="sidebar_section_text">
                通知内容
            </div>

        </div>


        <div class="clear"></div>
    </div> <!--end of center_content-->
    <div class="footer">
    </div>
</div>
</body>
</html>