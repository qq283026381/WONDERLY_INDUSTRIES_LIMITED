<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/26
 * Time: 15:04
 */
require "../mysql/slider.php";
$slider = new Slider();
$content = "";
$result = $slider->getSliderInfo();
if ($result->num_rows > 0) {
    $content .= "<thead><tr><th>优先级</th><th>图片</th><th>预览</th><th>Edit</th><th>Delete</th></tr></thead>";
    $content .= "<tfoot><tr><td colspan='12'>sdfasffs</td></tr></tfoot>";
    $content .= "<tbody>";
    $i = 0;
    while ($row = $result->fetch_array()) {
        $index = $row['index'];
        $img = $row['img'];
        if ($i % 2 == 0) {
            $content .= "<tr class='even'>";
        }else{
            $content .= "<tr class='odd'>";
        }
        $content .= "<td>" . $index . "</td><td>" . $img . "</td><td><img class='slider-overview' src='../../assets/imgs/slider/" . $img . "' alt='" . $img . "' /></td><td><a href='../../util/controllers/ReviseSliderController.php?img=" . $img . "'><img src='../../assets-mg/img/edit.png' border='0'/> </a></td><td><a href='../../util/ajax-mg/deleteSlider.php?img=" . $img . "'><img src='../../assets-mg/img/trash.gif' border='0'/> </a></td></tr>";
        $i++;
    }
    $content .= "</tbody>";
}
echo $content;