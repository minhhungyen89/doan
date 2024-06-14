<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet"  href="layout.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="position:fixed;top:0;z-index: 1;background-color:lightgrey;">
        <div class="container-fluid" >
            <img src="photo/logo.jpg" class='logo'alt="Logo">
            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Lớp/Nhóm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="learn.php">Trò chuyện </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Bài Tập
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"> Sắp tới</a></li>
                    <li><a class="dropdown-item" href="#"> Đã hoàn thành</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"> Quá hạn</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <input class="form-control BoxSearch" type="text" placeholder="Tìm kiếm nhóm, lớp, bạn bè,....." ">
                </li>
                </ul>
            </div>
            <div class=" navbar-collapse" >
            <?php 
                session_start();
                if(!isset($_SESSION['ten_dang_nhap'])){ 
                    echo'<button class="btn btn-outline-success register" onclick="register()" type="button">Đăng ký</button>';}
                if(isset($_SESSION['ten_dang_nhap'])){ 
                    echo '<i id="notification" class="bi bi-bell"></i>';}?> 
            </div>
            <?php 
                if(!isset($_SESSION['ten_dang_nhap'])){
                    echo '<button class="btn btn-outline-success login" onclick="login()" type="button">Đăng nhập</button>'; }
                if(isset($_SESSION['ten_dang_nhap'])){
                    $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
                    require 'connect.php';
                            $sql = "SELECT avatar FROM nguoi_dung WHERE ten_dang_nhap = '$ten_dang_nhap'";
                            $result = $connect->query($sql);
                            for($i=0;$i<$result->num_rows;$i++)
                            {
                                $row = $result -> fetch_assoc();
                                echo "<a href='taiKhoan.php' style='position:relative;left:-3px'><img src='avatar/account/".$row['avatar']."'id = 'avatar' alt='avatar'></a>";}}?>
        </div> 
    </nav>
    <div style='height:56px;'> </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 
    function login() {
        window.location.href = "login.php";
    }
    function register() {
        window.location.href = "register.php";
    }
</script>
