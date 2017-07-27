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
        $result=$conn->query($queryAddSlider);
        if($result){
            $conn->close();
            return true;
        }else{
            $conn->close();
            return false;
        }
    }
    function getSliderInfo(){
        $mysql = new Mysql();
        $conn = $mysql->connect();
        $querySlider = "select `index`,`img` from slider order by `index`";
        $result=$conn->query($querySlider);
        $conn->close();
        return $result;
    }
}