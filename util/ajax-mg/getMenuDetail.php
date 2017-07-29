<?php
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 9:46
 */
require "../mysql/menu.php";
$menu = new Menu();
$item = isset($_GET['item']) ? $_GET['item'] : "";
$content = "";
$result = $menu->getMenuByItem($item);
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $content .= "<form id=\"revise-form\" class=\"form\" action=\"../../util/ajax-mg/reviseMenu.php\"
                  method=\"post\" >";
    $content .= "<div class='form_row'>";
    $content .= "<label for='reviseMenuIndex' >优先级：</label>";
    $content .= "<input type='number' min='1' autocomplete='off' required placeholder='输入 1 以上的整数' value='" . $row['index'] . "' class='form_input' name='reviseMenuIndex' id='reviseMenuIndex' />";
    $content .= "</div>";
    $content .= "<div class='form_row'>";
    $content .= "<label for='reviseCategoryMenu'>分类：</label>";
    $content .= "<input oninput=\"checkReviseMenu();\" value='" . $row['item'] . "' required=\"\" class=\"form_input\" autocomplete=\"off\" name=\"reviseCategoryMenu\" id=\"reviseCategoryMenu\">";
    $content .= "</div>";
    $content .= "<div class=\"form_row\"><input type=\"submit\" class=\"form_submit\" value=\"更改\"/></div><div class=\"clear\"></div></form>";
}
echo $content;