<!DOCTYPE html>
<html lang="en">
<body><br>
<?php   
    require 'connect.php';
    $groupId = $_GET['groupId'];
    mysqli_set_charset($connect,'UTF8');
    $sql = "SELECT * FROM nhom WHERE ma_nhom = '$groupId'";
    $result = $connect->query($sql);
    $row = $result -> fetch_assoc();
    $ma_nhom = $row['ma_nhom'];
    $ten_nhom = $row['ten_nhom'];
    $loai_hinh = $row['loai_hinh'];
    $che_do = $row['che_do'];
    $mo_ta = $row['mo_ta'];
    $ngay_tao = date('d-m-Y', strtotime($row['ngay_tao']));
    if(mb_strlen($ten_nhom, 'UTF-8') > 45){
        echo "<h4 style='font-family: Arial, sans-serif;'> Chào mừng bạn đến với ".$ten_nhom."</h4>";
    }else if (mb_strlen($ten_nhom, 'UTF-8') > 20){
        echo "<h3 style='font-family: Arial, sans-serif;'> Chào mừng bạn đến với ".$ten_nhom."</h3>";
    }else{
        echo "<h2 style='font-family: Arial, sans-serif;'> Chào mừng bạn đến với ".$ten_nhom."</h2>";}
    if($loai_hinh == 'Lớp học'){
        echo "<img class='mx-auto d-block' style='height:200px;' src='photo/WelcomeClass.png'/>";
    }else{
        echo "<img class='mx-auto d-block' style='height:200px;' src='photo/WelcomeGroup.png'/>";}
    echo '<div class="d-flex justify-content-between mb-1">';
    echo '<div class="text-start ml-2">';
    echo "<h5 > Mã nhóm: ".$ma_nhom."</h5></div>";
    echo '<div class="text-end mr-2">';
    echo "<h5> Ngày thành lập: ".$ngay_tao."</h5></div></div>";
    $sql1 = "SELECT ten_dang_nhap FROM thanh_vien_nhom WHERE ma_nhom = '$groupId'";
    $result1 = $connect->query($sql1);
    $numRows = $result1->num_rows;
    echo '<div class="d-flex justify-content-between mb-1">';
    echo '<div class="text-start ml-2">';
    if($che_do =='Công khai'){
        echo "<h5 > Chế độ: <i class='bi bi-globe' style='font-size:130%;margin-left:5px;color:grey;'></i>".$che_do."</h5></div>";}
        else{   echo "<h5 > Chế độ: <i class='bi bi-lock' style='font-size:130%;margin-left:5px;color:grey;'></i>".$che_do."</h5></div>";}
    echo '<div class="text-end mr-2">';
    echo "<h5> Số lượng thành viên:<i class='bi bi-person'  style='font-size:130%;margin-left:20px;color:grey;'></i>".$numRows."</h5></div></div>";
    echo "<h5 class='text-start'> Mô tả: </h5>";
    echo "<p class='text-start ms-4' style='font-size:110%;text-indent:40px;text-align:justify;'>".$mo_ta."</p>";?> 
</body>
</html>