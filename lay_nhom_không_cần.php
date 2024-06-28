<?php 
    session_start();
    require 'connect.php';
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
    $sql = "SELECT nhom.ten_nhom FROM nhom INNER JOIN thanh_vien_nhom ON nhom.ma_nhom = thanh_vien_nhom.ma_nhom WHERE thanh_vien_nhom.ten_dang_nhap = '$ten_dang_nhap'";
    $result = $connect->query($sql); 
    if ($result->num_rows == 0)     {   echo 'Failed';  } 
    else{
        for($i=0;$i<$result->num_rows;$i++)
        {
            $row = $result -> fetch_assoc();
            $ten_nhom = $row['ten_nhom'];
            $avatar = $row['avatar'];
            $che_do = $row['che_do'];
            echo $ten_nhom;}}
    $connect->close();?>