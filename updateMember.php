<?php  
    if (isset($_POST['submit']))
    {   require "connect.php"; 
    mysqli_set_charset($connect,'UTF8');
    $member = $_POST['member'];
    $groupId = $_POST["groupId"];
    $position = $_POST["position"];
    if ($position == "goUp"){$chuc_vu = 1;}
    else{$chuc_vu = 0;}
    $sql = "UPDATE `thanh_vien_nhom` SET chuc_vu = '$chuc_vu' WHERE ten_dang_nhap = '$member' and ma_nhom = '$groupId'";
    if($connect->query($sql) === TRUE)
    {  
        echo '<script language="javascript">
                alert(" Thay đổi thành công!");
                window.history.back();
              </script>';
    }}?>