<?php
if (isset($_POST['submit'])) {
    session_start();
    require 'connect.php';
    $ma_nhom = rand(1000000, 9999999); 
    $nguoi_tao = $_SESSION['ten_dang_nhap'];
    $ten_nhom  = $_POST['ten_nhom'];
    $che_do  = $_POST['che_do'];
    $mo_ta  = $_POST['mo_ta'];
    $loai_hinh  = $_POST['loai_hinh'];
    if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) { 
    // 5 kiểu dữ liệu: tên,tên tạm thời, lỗi,kích cỡ,kiểu dữ liệu
    $file = $_FILES["image"];
    $file_name = $file["name"];
    $file_size = $file["size"];
    $file_tmp = $file["tmp_name"];
    $file_type = $file["type"];
    $file_error = $file["error"];
    //  phân chia tên tệp thành một mảng dựa trên dấu chấm,biến cuối tên file thành chữ thường
    $fileExt = explode(".", $file_name);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array("jpg", "jpeg", "png","gif");
    //  kiểm tra đuôi file có nằm trong array
    if (in_array($fileActualExt, $allowed)) {
        if ($file_error === 0) {
            if ($file_size < 7000000) {  //Dạng bit
                // Tạo đường dẫn ảnh: Tên file.số ngẫu nhiên.đuôi file
                $currentDateTime = date('d-m-Y');
                $imageFullName = $ma_nhom . "." . $currentDateTime . "." . $fileActualExt;
                // Đường dẫn thư mục lưu file
                $fileDestination = "avatar/group/".$imageFullName;
                $sql1 = "INSERT INTO `nhom`(`ma_nhom`, `ten_nhom`, `nguoi_tao`,`avatar`,`che_do`,`loai_hinh`,`mo_ta`) 
                VALUES ('$ma_nhom','$ten_nhom','$nguoi_tao','$imageFullName ','$che_do','$loai_hinh','$mo_ta')";
                if ($connect->query($sql1) === TRUE) {
                    $sql2 = "INSERT INTO `thanh_vien_nhom`(`ma_nhom`, `ten_dang_nhap`, `chuc_vu`) 
                    VALUES ('$ma_nhom','$nguoi_tao','2')";
                    if ($connect->query($sql2) === TRUE) {
                        // Tên file của người dùng và đường dẫn vào file máy chủ
                        move_uploaded_file($file_tmp, $fileDestination);    
                    echo '<script  language="javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script language="javascript"> swal("Tạo nhóm thành công !","","success");setInterval(function() { window.location.href = "index.php"; }, 2004);</script>';}}  
            } else {
                echo '<script language="javascript">alert("File quá lớn >7MB !");window.location.href = "index.php";</script>';
                exit();}
        } else {
            echo '<script language="javascript">alert("File bạn có lỗi !");window.location.href = "index.php";</script>';
            exit();}
    } else {
        echo '<script language="javascript">alert("File không đúng định dạng ảnh!");window.location.href = "index.php";</script>';
        exit();}
    }else{
        $sql1 = "INSERT INTO `nhom`(`ma_nhom`, `ten_nhom`, `nguoi_tao`,`avatar`,`che_do`,`loai_hinh`,`mo_ta`) 
        VALUES ('$ma_nhom','$ten_nhom','$nguoi_tao','icon.jpg','$che_do','$loai_hinh','$mo_ta')";
        if ($connect->query($sql1) === TRUE) {
            $sql2 = "INSERT INTO `thanh_vien_nhom`(`ma_nhom`, `ten_dang_nhap`, `chuc_vu`) 
            VALUES ('$ma_nhom','$nguoi_tao','2')";
            if ($connect->query($sql2) === TRUE) {
                echo '<script  language="javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script language="javascript"> swal("Tạo nhóm thành công !","","success");setInterval(function() { window.location.href = "index.php"; }, 2004);</script>';}}  
    }}?>
