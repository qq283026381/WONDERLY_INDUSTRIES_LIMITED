<?php
require "../controllers/verify.php";
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/29
 * Time: 11:39
 */
require "../mysql/menu.php";
$menu = new Menu();
$item = isset($_GET['item']) ? $_GET['item'] : "";
$content = "";
$result = $menu->getSubmenuByItem($item);
$menuItems = $menu->getMenu();
if ($result->num_rows > 0) {
    $row = $result->fetch_array();
    $content .= "<form id=\"revise-form\" class=\"form\" action=\"../../util/ajax-mg/reviseSubmenu.php\"
                  method=\"post\" >";
    $content .= "<div class='form_row'>";
    $content .= "<label for='reviseSubmenuIndex' >优先级：</label>";
    $content .= "<input type='number' min='1' autocomplete='off' required placeholder='输入 1 以上的整数' value='" . $row['index'] . "' class='form_input' name='reviseSubmenuIndex' id='reviseSubmenuIndex' />";
    $content .= "</div>";
    $content .= "<div class='form_row'>";
    $content .= "<label for='reviseCategorySubmenu'>子类：</label>";
    $content .= "<input oninput=\"checkReviseSubmenu();\" value='" . $row['item'] . "' required=\"\" class=\"form_input\" autocomplete=\"off\" name=\"reviseCategorySubmenu\" id=\"reviseCategorySubmenu\">";
    $content .= "<input type='hidden' name='oldItem' value='" . $row['item'] . "' />";
    $content .= "</div>";
    $content .= "<div class='form_row'>";
    $content .= "<p id='reviseSubmenuWarning' class='warming'>该分类已经存在！</p></div>";
    $content .= "<div class='form_row'>";
    $content .= "<label for='reviseCategoryParent'>父类：</label>";
    $content .= "<select required class='form_input' name='reviseCategoryParent' id='reviseCategoryParent'>";
    while ($menuItem = $menuItems->fetch_array()) {
        if ($menuItem['item'] === $row['parent']) {
            $content .= "<option selected value='" . $menuItem['item'] . "'>" . $menuItem['item'] . "</option>";
        } else {
            $content .= "<option value='" . $menuItem['item'] . "'>" . $menuItem['item'] . "</option>";
        }
    }
    $content .= "</select>";
    $content .= "<div class=\"form_row\"><input type=\"submit\" id='reviseSubmenuBtn' class=\"form_submit\" value=\"更改\"/></div><div class=\"clear\"></div></form>";
}
echo $content;