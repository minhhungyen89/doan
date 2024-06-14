<?php 
    require 'connect.php';
    // Nhận dữ liệu JSON từ request
    $data = json_decode(file_get_contents('php://input'), true);
    $idGroup = $data[0];
    for ($i = 1; $i < count($data); $i++) {
        $idPerson = $data[$i];
        $sql = "INSERT INTO `thanh_vien_nhom`(`ten_dang_nhap`, `ma_nhom`) VALUES ('$idPerson', '$idGroup')";
        if($connect->query($sql) == TRUE){   echo 'Success';  }
        else {           echo 'Failed';}}
    $connect->close();?>