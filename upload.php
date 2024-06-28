<?php
    session_start();
    require 'connect.php';
    $userName = $_SESSION['ten_dang_nhap'];
// Kiểm tra nếu có dữ liệu được gửi từ form
if ($_FILES['file']) {
    $file = $_FILES['file'];
    $inputBox = trim($_POST['inputBox']); 
    $groupId = $_POST['groupId']; 
    $id_post = rand(10000000,99999999);  
    // Đường dẫn lưu trữ ảnh trên server
    $file = $_FILES["file"];
    $file_name = $file["name"];
    $fileExt = explode(".", $file_name);
    $fileActualExt = strtolower(end($fileExt));
    $currentDateTime = date('h-i-s');
    $imageFullName = $id_post . "." . $currentDateTime . "." . $fileActualExt;
    $uploadFile = 'uploads/'.$imageFullName;
        // Di chuyển file ảnh từ thư mục tạm lên thư mục lưu trữ
        if ($uploadFile !='' && !empty($inputBox)) {
            move_uploaded_file($file['tmp_name'], $uploadFile)
            $sql = "INSERT INTO `post`(`id_post`, `ma_nhom`,`nguoi_dang`,`urlImage`, `content`) VALUES (N'$id_post',N'$groupId',N'$userName',N'$uploadFile',N'$inputBox')";
            if($connect->query($sql) === TRUE){
                echo "hình ảnh $ nội dung ";
            }}
        if(!empty($inputBox)) {
                $sql = "INSERT INTO `post`(`id_post`, `ma_nhom`,`nguoi_dang`, `content`) VALUES (N'$id_post',N'$groupId',N'$userName', N'$inputBox')";
                if($connect->query($sql) === TRUE){
                    echo "nội dung";
                }
            }
        if($uploadFile != '')  {
            move_uploaded_file($file['tmp_name'], $uploadFile)
            $sql = "INSERT INTO `post`(`id_post`, `ma_nhom`,`nguoi_dang`,`urlImage`) VALUES (N'$id_post',N'$groupId',N'$userName', N'$uploadFile')";
            if($connect->query($sql) === TRUE){
                echo "hình ảnh";
            }
        }
} else {
    echo 'Lỗi';
}?>
