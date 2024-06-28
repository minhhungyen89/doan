<?php
session_start();
require "connect.php";
$ten_dang_nhap = $_SESSION['ten_dang_nhap'];
$groupId = $_GET['groupId'];
mysqli_set_charset($connect, 'UTF8');
$sql1 = "SELECT * FROM thanh_vien_nhom WHERE ma_nhom = '$groupId' AND chuc_vu != '0'";
$result1 = $connect->query($sql1);
$numAdmins = $result1->num_rows;
$sql = "SELECT chuc_vu FROM thanh_vien_nhom WHERE ten_dang_nhap = '$ten_dang_nhap' AND ma_nhom = '$groupId'";
$result = $connect->query($sql);
$userRole = $result->fetch_assoc()['chuc_vu'];
if ($numAdmins <= 1 && $userRole != '0'){
    echo "Lỗi";} 
else {
    $sql2 = "DELETE FROM thanh_vien_nhom WHERE ten_dang_nhap = '$ten_dang_nhap' AND ma_nhom = '$groupId'";
    $connect->query($sql2);
    $sql3 = "SELECT id_post FROM post WHERE nguoi_dang = '$ten_dang_nhap' AND ma_nhom = '$groupId'";
    $result3 = $connect->query($sql3);
    while ($row3 = $result3->fetch_assoc()) {
        $postId = $row3['id_post'];
        $sql4 = "DELETE FROM content WHERE id_post = '$postId'";
        $sql5 = "DELETE FROM post WHERE id_post = '$postId'";
        $connect->query($sql4);
        $connect->query($sql5);}
    echo "Thành công";} 
$connect->close();?>
