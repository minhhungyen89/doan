<?php 
    session_start();
    require 'connect.php';
    // Nhận dữ liệu JSON từ request
    $data = json_decode(file_get_contents('php://input'), true);
    $groupId =  $data[0];  $userName =  $data[1];  $content =  $data[2]; 
    $id_post = rand(10000000,99999999);  
    $sql1 = "INSERT INTO `post`(`id_post`, `ma_nhom`, `nguoi_dang`) VALUES (N'$id_post',N'$groupId',N'$userName')";
    if($connect->query($sql1) === TRUE){
        $sql2 = "INSERT INTO `content`(`id_post`, `loai_hinh`, `content`) VALUES (N'$id_post',N'nội dung',N'$content')";
        if($connect->query($sql2) === TRUE){
            echo "nội dung";
        }}
    $connect->close();?>