<?php  
    if (isset($_POST['submit']))
    {   require "connect.php"; 
    mysqli_set_charset($connect,'UTF8');
    $member = $_POST['member'];
    $groupId = $_POST["groupId"];
    $sql2 = "DELETE FROM thanh_vien_nhom WHERE ten_dang_nhap = '$member' AND ma_nhom = '$groupId'";
    $connect->query($sql2);
    $sql3 = "SELECT id_post FROM post WHERE nguoi_dang = '$member' AND ma_nhom = '$groupId'";
    $result3 = $connect->query($sql3);
    while ($row3 = $result3->fetch_assoc()) {
        $postId = $row3['id_post'];
        $sql4 = "DELETE FROM content WHERE id_post = '$postId'";
        $sql5 = "DELETE FROM post WHERE id_post = '$postId'";
        $connect->query($sql4);
        $connect->query($sql5);}
        echo '<script language="javascript">
        alert("Xóa thành viên thành công !");
        window.history.back();
      </script>';} ?>