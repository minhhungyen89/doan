<?php 
    session_start();
    require "connect.php"; 
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
    $mat_khau = $_GET['mat_khau'];
    $sql = "SELECT ten_dang_nhap,mat_khau FROM nguoi_dung WHERE ten_dang_nhap = '$ten_dang_nhap' AND mat_khau = '$mat_khau' ";
    $result = $connect->query($sql);
    if($result->num_rows > 0){  
        echo 'Mật khẩu đúng';
    }else{
        echo"Bạn đã nhập sai mật khẩu. Vui lòng thử lại !";};
        $connect->close();?>