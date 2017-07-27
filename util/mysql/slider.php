<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 8:10
 */
class Slider
{

    /**
     * Slider constructor.
     */
    public function __construct()
    {
        require "mysql.php";
    }

    function addSlider($index, $img)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryAddSlider = "insert into `slider` (`index`,`img`) VALUES ( '" . $index . "' , '" . $img . "' )";
        $result = $conn->query($queryAddSlider);
        $conn->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getSliderInfo()
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySlider = "select `index`,`img` from slider order by `index`";
        $result = $conn->query($querySlider);
        $conn->close();
        return $result;
    }

    function getSliderDetail($img)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySliderDetail = "select `index`,`img` from slider where `img` = '" . $img . "'";
        $result=$conn->query($querySliderDetail);
        $conn->close();
        return $result;
    }

    function deleteSlider($img)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryDeleteSlider = "delete from slider where img = '" . $img . "'";
        $result = $conn->query($queryDeleteSlider);
        $conn->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function updateSlider($oldImg, $img, $index)
    {
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $queryUpdateSlider = "update slider set `img` = '" . $img . "' , `index` = '" . $index . "' where `img` = '" . $oldImg . "'";
        $result = $conn->query($queryUpdateSlider);
        $conn->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}