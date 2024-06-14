<?php 
    require 'connect.php';
    $groupId = $_GET['groupId'];
    $personID = $_GET['personID'];
    $sql = "SELECT ngay_vao FROM thanh_vien_nhom WHERE ma_nhom = '$groupId' and ten_dang_nhap ='$personID'";
    $result = $connect->query($sql);
    if ($result->num_rows == 0)     {   echo '';  } 
    else{
            $row = $result -> fetch_assoc();
            $ngay_vao = date('d-m-Y', strtotime($row['ngay_vao']));
            echo $ngay_vao;  }  $connect->close();?>