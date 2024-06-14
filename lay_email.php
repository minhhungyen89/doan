<?php
    require "connect.php"; 
    $email = $_GET['email'];
    mysqli_set_charset($connect,'UTF8');
    $sql = "SELECT email FROM  thong_tin_ca_nhan WHERE email = '$email' ";
    $result = $connect->query($sql);
        for($i=0;$i<$result->num_rows;$i++)
        {
            $row = $result -> fetch_assoc();
            if($row['email'] === $email){echo $email;}}?>