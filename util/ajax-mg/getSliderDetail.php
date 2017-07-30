<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 18:10
 */
require "../mysql/slider.php";
$slider = new Slider();
$img = isset($_GET['img']) ? $_GET['img'] : "";
$content = "";
$result = $slider->getSliderDetail($img);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $content.="<form id=\"revise-form\" class=\"form\" action=\"../../util/ajax-mg/reviseSlider.php\"
                  enctype=\"multipart/form-data\" method=\"post\" onsubmit=\"return checkReviseImg();\">";
    $content .= "<div class='form_row'>";
    $content .= "<label for='reviseSliderIndex' >优先级：</label>";
    $content .= "<input type='number' min='1' autocomplete='off' required placeholder='输入 1 以上的整数' value='" . $row['index'] . "' class='form_input' name='reviseSliderIndex' id='reviseSliderIndex' />";
    $content .= "</div>";
    $content .= "<div class='form_row'>";
    $content .= "<label>原图片：</label>";
    $content .= "<input type='hidden' name='oldImg' value='" . $row['img'] . "' />";
    $content .= "<img class='revise-img' src='../../assets/imgs/slider/" . $row['img'] . "' />";
    $content .= "</div>";
    $content .= "<div class=\"form_row\"><label for=\"reviseSliderImg\">新图片：</label><input type=\"file\" name=\"reviseSliderImg\" id=\"reviseSliderImg\"/></div>
<div class=\"form_row\"><input type=\"submit\" class=\"form_submit\" value=\"更改\"/></div><div class=\"clear\"></div></form>";
}
echo $content;