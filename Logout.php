<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Logout </title>
</head>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['ten_dang_nhap'])){
        unset($_SESSION['ten_dang_nhap']);
        unset($_SESSION['chuc_vu']);
        header("Location: login.php");
        exit();}?>
</body>
</html>