<?php

/**
 * Created by PhpStorm.
 * User: Bonnenu
 * Date: 2017/7/27
 * Time: 10:13
 */
class File
{
    function uploadJpg($file, $url)
    {
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileType = $file["type"];
        $fileSize = $file["size"];
        $fileError = $file["error"];
        if ((($fileType == "image/gif")
                || ($fileType == "image/jpeg")
                || ($fileType == "image/pjpeg"))
            && ($fileSize / 1024 < 200)
        ) {
            if ($fileError > 0) {
                switch ($fileError) {
                    case 1:
                        echo "<script>alert('图片太大，请重新选择图片。');history.back();</script>";
                        exit();
                    case 2:
                        echo "<script>alert('图片太大，请重新选择图片。');history.back();</script>";
                        exit();
                    case 3:
                        echo "<script>alert('图片只有部分上传，请重新选择图片。');history.back();</script>";
                        exit();
                    case 4:
                        echo "<script>alert('没有图片上传。');history.back();</script>";
                        exit();
                    case 5:
                        echo "<script>alert('服务器临时文件夹丢失，请联系管理员。');history.back();</script>";
                        exit();
                    case 6:
                        echo "<script>alert('服务器临时文件夹丢失，请联系管理员。。');history.back();</script>";
                        exit();
                    case 7:
                        echo "<script>alert('图片上传失败，请重新选择图片。');history.back();</script>";
                        exit();
                    default:
                        break;
                }
            } else {
                move_uploaded_file($fileTmpName,
                    $url . $fileName);
            }
        } else {
            echo "<script>alert('不支持上传" . $fileType . "类型图片，请重新选择图片。');history.back();</script>";
            exit();
        }
    }

    function deleteJpg($img, $url)
    {
        if ($img) {
            unlink($url . $img);
        }
    }
    function checkUrl($url){
        if(!file_exists($url)){
            mkdir($url);
        }
    }
}