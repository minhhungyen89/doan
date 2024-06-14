<?php
    session_start();
    require 'connect.php';
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
    if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) { 
         mysqli_set_charset($connect,'UTF8');
        $sql1 = "SELECT avatar FROM `nguoi_dung` WHERE ten_dang_nhap = '$ten_dang_nhap'";
        $result1 = $connect->query($sql1);
        $row1 = $result1 -> fetch_assoc();
        $avatar = "avatar/account/".$row1['avatar'];   unlink($avatar);
        $file = $_FILES["image"];
        $file_name = $file["name"];
        $file_tmp = $file["tmp_name"];
        $fileExt = explode(".", $file_name);
        $fileActualExt = strtolower(end($fileExt));
        $currentDateTime = date('H-i-d-m-Y');
        // Tạo đường dẫn ảnh: Tên file.số ngẫu nhiên.đuôi file
        $imageFullName = $ten_dang_nhap.".".$currentDateTime.".".$fileActualExt;
        $fileDestination = "avatar/account/".$imageFullName;
        $sql2 = "UPDATE `nguoi_dung` SET avatar= N'$imageFullName' WHERE ten_dang_nhap = '$ten_dang_nhap'";
        if ($connect->query($sql2) === TRUE) {
            move_uploaded_file($file_tmp, $fileDestination);    
            echo '<script language="javascript">window.location.href = "taiKhoan.php"</script>';
 }}else{
    $sql = "UPDATE `nguoi_dung` SET avatar= 'avatar.png' WHERE ten_dang_nhap = '$ten_dang_nhap'";
    if ($connect->query($sql) === TRUE) {
        echo '<script language="javascript">window.location.href = "taiKhoan.php"</script>';
}}?>
