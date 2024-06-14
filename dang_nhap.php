<?php 
    session_start();
    require 'connect.php';
    // Nhận dữ liệu JSON từ request
    $data = json_decode(file_get_contents('php://input'), true);
    $userName =  $data[0];  $password =  $data[1];
    $sql = "SELECT ten_dang_nhap, mat_khau FROM nguoi_dung WHERE ten_dang_nhap = '$userName' and mat_khau ='$password'";
    $result = $connect->query($sql);
    if ($result->num_rows == 0)     {   echo 'Failed';  } 
    else{
        for($i=0;$i<$result->num_rows;$i++)
        {
            $row = $result -> fetch_assoc();
            $ten_dang_nhap = $row['ten_dang_nhap'];
            // $math = random(1000;9999);
            $_SESSION['ten_dang_nhap']= $ten_dang_nhap ;
            // $cookieValue = $ten_dang_nhap + $math;
            // setcookie('PBSKIDS', $cookieValue , time() + (86400 * 30), "/");
            echo 'Success';  }}
    $connect->close();?>