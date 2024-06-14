<?php 
    session_start();
    require "connect.php"; 
    if(!isset($_SESSION['ten_dang_nhap'])){ 
        $passNew = $_GET['passNew'];
        $email = $_GET['email'];
        $sql = "SELECT ten_dang_nhap FROM  thong_tin_ca_nhan WHERE email = '$email'";
        $result = $connect->query($sql);
        for($i=0;$i<$result->num_rows;$i++)
        {   $row = $result -> fetch_assoc();
            $ten_dang_nhap = $row['ten_dang_nhap'] ;}}
    if(isset($_SESSION['ten_dang_nhap'])){ 
        $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
        $passNew = $_GET['passNew'];}
    $sql = "UPDATE `nguoi_dung` SET mat_khau='$passNew' WHERE ten_dang_nhap = '$ten_dang_nhap'";
    $result = $connect->query($sql);
    if($connect->query($sql) === TRUE)
    {echo "Bạn đã đổi mật khẩu thành công !";};
    $connect->close();?>