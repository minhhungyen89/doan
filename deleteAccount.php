<?php 
    session_start();
    require "connect.php"; 
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
    $sql = "DELETE FROM thong_tin_ca_nhan WHERE ten_dang_nhap = '$ten_dang_nhap'";
    $sql1 = "DELETE FROM dang_ky WHERE ten_dang_nhap = '$ten_dang_nhap'";
    $sql2 = "DELETE FROM nguoi_dung WHERE ten_dang_nhap = '$ten_dang_nhap'";  
    $connect->query($sql);$connect->query($sql1);$connect->query($sql2);
    // Kiểm tra xem có bao nhiêu dòng bị xóa
    $affected_rows = $connect->affected_rows;
    if ($affected_rows > 0) {
        echo 'Thành công';
    };
    $connect->close();?>