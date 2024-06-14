<?php 
    session_start();
    require "connect.php"; 
    if(!isset($_SESSION['ten_dang_nhap'])){ echo "guest";}
    if(isset($_SESSION['ten_dang_nhap'])){ 
        mysqli_set_charset($connect,'UTF8');
        $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
        $sql = "SELECT chuc_vu FROM  nguoi_dung WHERE ten_dang_nhap = '$ten_dang_nhap'";
        $result = $connect->query($sql);
        for($i=0;$i<$result->num_rows;$i++)
            {   $row = $result -> fetch_assoc();
                if($row['chuc_vu'] == '2'){echo 'admin';}
                else if ($row['chuc_vu'] == '1'){ echo 'teacher';}
                else {echo 'student';}}}?> 