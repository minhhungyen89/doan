<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body><br>
<?php   
    require 'connect.php';
    $groupId = $_GET['groupId'];
    mysqli_set_charset($connect,'UTF8');
    $sql = "SELECT * FROM thanh_vien_nhom WHERE ma_nhom = '$groupId'";
    $result = $connect->query($sql);
    $numRows = $result->num_rows; 
    echo "<caption style='font-size:120%;'> Nhóm hiện có ".$numRows." thành viên </caption>"; ?>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Thành viên</th>
        <th>Vai trò</th>
        <th>Ngày vào</th>
      </tr>
    </thead>
    <tbody><?php
    for($i=0;$i<$numRows;$i++)
    {   $row = $result -> fetch_assoc();
        $ten_dang_nhap = $row['ten_dang_nhap'];
        if($row['chuc_vu'] == "2"){
            $chuc_vu = "Người tạo nhóm";}
        if($row['chuc_vu'] == "1"){
            $chuc_vu = "Quản trị viên";}
        if($row['chuc_vu'] == "0"){
            $chuc_vu = "Thành viên nhóm";}
        $ngay_vao = date('d-m-Y', strtotime($row['ngay_vao']));   
        echo "<tr>";
        echo "<td>".$ten_dang_nhap."</td>";
        echo "<td>".$chuc_vu."</td>";
        echo "<td>".$ngay_vao."</td></tr>";}?>
    </tbody>
  </table>
</body>
</html>