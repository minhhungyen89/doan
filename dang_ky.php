<?php 
    require 'connect.php';
    // Nhận dữ liệu JSON từ request
    $data = json_decode(file_get_contents('php://input'), true);
    $userName =  $data['userName'];
    $password =  $data['password'];
    $HoVaTen =  $data['HoVaTen'];
    $phoneNumber =  $data['phoneNumber'];
    $gmail =  $data['gmail'];
    $sql1 = "INSERT INTO `nguoi_dung`(`ten_dang_nhap`, `mat_khau`) VALUES ('$userName', '$password')";
    $sql2 = "INSERT INTO `thong_tin_ca_nhan`(`ten_dang_nhap`, `ho_va_ten`, `so_dien_thoai`, `email`) VALUES ('$userName', '$HoVaTen', '$phoneNumber', '$gmail')";    
    if($connect->query($sql1) === TRUE && $connect->query($sql2) === TRUE) {
        echo 'Thành công!';        } else {           echo 'Lỗi: ' . $connect->error;}
    $connect->close();
?>