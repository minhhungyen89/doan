<?php 
    session_start();
    require "connect.php"; 
    $groupID = $_GET['groupID'];
    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
    $sql = "SELECT che_do FROM nhom  WHERE ma_nhom = '$groupID'";
    $result = $connect->query($sql);
    if ($result->num_rows == 0)
    { echo "Không tìm thấy mã nhóm này trên PBSKIDS";}
    else{
        $row = $result -> fetch_assoc();
        $che_do = $row['che_do'];
        if($che_do == 'Riêng tư'){
            echo 'Nhóm/lớp học đang ở chế độ riêng tư.Vui lòng liên hệ với quản trị viên 
            của nhóm/lớp học để thêm bạn vào nhóm nhé !';
        }else{
            $sql1 = "SELECT ngay_vao FROM thanh_vien_nhom  WHERE ma_nhom = '$groupID' and ten_dang_nhap = '$ten_dang_nhap'";
            $result1 = $connect->query($sql1);
            if ($result1->num_rows == 0)
            { echo 'Bạn chưa có trong nhóm';}
            else{   
                $row1 = $result1 -> fetch_assoc();
                $ngay_vao = strval($row1['ngay_vao']);   // hoặc: (string) ; sprintf()  ;serialize()
                // Tách chuỗi thành các phần tử riêng biệt
                list($year, $month, $day) = explode('-', $ngay_vao);
                $transferDate = $day . '-' . $month . '-' . $year;
                echo 'Bạn đã tham gia nhóm/lớp học vào ngày: '.$transferDate;}}}   
$connect->close();?>