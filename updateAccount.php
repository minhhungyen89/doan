<?php 
    session_start();
    require "connect.php"; 
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
    $change = $_GET["change"];
    $content = $_GET["content"];
    if ($change == "tên học sinh"){
    $sql = " UPDATE `thong_tin_ca_nhan` SET ho_va_ten = N'$content' WHERE ten_dang_nhap='$ten_dang_nhap'";
    if($connect->query($sql) === TRUE)
    {  echo "Thay đổi tên học sinh thành công !";}}
    if ($change == "giới tính"){
    $sql = " UPDATE `thong_tin_ca_nhan` SET gioi_tinh = N'$content' WHERE ten_dang_nhap='$ten_dang_nhap'";
    if($connect->query($sql) === TRUE)
    {   echo "Thay đổi giới tính thành công !";}}
    if ($change == "ngày sinh"){
        $sql = " UPDATE `thong_tin_ca_nhan` SET ngay_sinh = N'$content' WHERE ten_dang_nhap='$ten_dang_nhap'";
        if($connect->query($sql) === TRUE)
        {   echo "Thay đổi ngày sinh thành công !";}}
    if ($change == "số điện thoại"){
    $sql = " UPDATE `thong_tin_ca_nhan` SET so_dien_thoai = N'$content' WHERE ten_dang_nhap='$ten_dang_nhap'";
    if($connect->query($sql) === TRUE)
    {   echo "Thay đổi số điện thoại thành công !";}}
    if ($change == "email"){
        $sql = " UPDATE `thong_tin_ca_nhan` SET email = N'$content' WHERE ten_dang_nhap='$ten_dang_nhap'";
        if($connect->query($sql) === TRUE)
        {   echo "Thay đổi email thành công !";}}
    if ($change == "trường"){
    $sql = " UPDATE `thong_tin_ca_nhan` SET truong = N'$content' WHERE ten_dang_nhap='$ten_dang_nhap'";
    if($connect->query($sql) === TRUE)
    {   echo "Thay đổi trường học thành công !";}}
    $connect ->close();?>