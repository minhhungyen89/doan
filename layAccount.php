<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='icon' href="icon.jpg" type image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
.background-div {
        background-size: cover; /* Hiển thị hình ảnh toàn màn hình */
        background-position: center; /* Căn giữa hình ảnh */
    }
.scrollable-list {
    max-width: 405px;
    max-height: 300px; 
    overflow-y: scroll; 
    border: 1px solid #ccc;
    background-color:#f1efef;
}
::-webkit-scrollbar{
    width: 10px;
    background-color:#f1efef;
}
::-webkit-scrollbar-thumb{
    background-color:lightgrey;
    border-radius:5px;
}
.selectable-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.selectable-list li:hover{
    background-color: #e0e0e0;
}
.selectable-list div {
    display: inline-block;
    padding: 5px 10px;
    cursor: pointer;
    width: 99%;
}
</style>
</head>
<body>
    <div class="scrollable-list shadow-lg border-bottom">
        <ul class="selectable-list">
        <?php
            require "connect.php"; 
            $person = $_GET["person"];
            mysqli_set_charset($connect,'UTF8');
            $sql = "SELECT thong_tin_ca_nhan.ho_va_ten,thong_tin_ca_nhan.ten_dang_nhap,nguoi_dung.avatar  FROM thong_tin_ca_nhan 
            INNER JOIN nguoi_dung ON nguoi_dung.ten_dang_nhap = thong_tin_ca_nhan.ten_dang_nhap 
            WHERE ho_va_ten LIKE '%$person%' OR thong_tin_ca_nhan.ten_dang_nhap LIKE '$person%'";
            $result = $connect->query($sql);
            if ($result->num_rows == 0)     
            {    echo '<li class="optionPerson">'; echo '<div style="font-weight:bold;width: 350px; ">';
                echo 'Không có kết quả cho tìm kiếm trên !</div></li>';
             } 
            else{
                for($i=0;$i<$result->num_rows;$i++)
                    {   $row = $result -> fetch_assoc();
                        $avatar = $row['avatar'];
                        echo '<li class="optionPerson" data-person="'.$row['ten_dang_nhap'].'" data-name="'.$row['ho_va_ten'].'"data-avatar="'.$avatar.'">';
                        echo '<div class="d-flex">';
                        echo '<div class="p-2 background-div rounded-circle" style="width:150px;background-image: url(avatar/account/'.$avatar.');"> </div>';
                        echo '<div class="p-2  d-flex flex-column ">'; 
                        echo '<div class="p-2 " style="font-weight:bold;font-size:120%;height:60px;">'.$row['ho_va_ten'].'</div>';
                        echo '<div class="p-2 " style="font-size:115%;">'.$row['ten_dang_nhap'].'</div>';
                        echo '</div> </div></li>';}}?>
        </ul>
    </div>
<!-- <input type="hidden"  class="optionPerson" name="'.$row['ten_dang_nhap'].'"  value="'.$row['ten_dang_nhap'].'"> -->
</body>
</html>
