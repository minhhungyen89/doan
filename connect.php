<?php 
    $severname = "localhost";
    $username = "root";
    $pass = "";
    $db = "pbskids";
    $connect = new mysqli($severname,$username,$pass,$db);
    if ($connect->connect_error){
        die("Kết nối không thành công !".$connect->connect_error);
    }