<?php
    require "connect.php"; 
    $ten_dang_nhap = $_GET['ten_dang_nhap'];
    mysqli_set_charset($connect,'UTF8');
    $sql = "SELECT ten_dang_nhap FROM  nguoi_dung";
    $result = $connect->query($sql);
    for($i=0;$i<$result->num_rows;$i++)
        {   $row = $result -> fetch_assoc();
            if($row['ten_dang_nhap'] === $ten_dang_nhap){echo $ten_dang_nhap.' đã tồn tại';}
            else {echo '';}}?>