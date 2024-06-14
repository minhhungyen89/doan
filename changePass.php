<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet"  href="tai_khoan.css">
    <style>
    #imageCrouse{
    width:180px;
    height:180px;}
    </style>
    <title>Đổi mật khẩu </title>
    <link rel='icon' href="icon.jpg" type image/x-icon">
</head>
<body>
<?php require 'layout.php';?>
    <div class="main">
        <div class='boxTaiKhoan'>  
            <div class='title'><b> Thay đổi mật khẩu </b></div>
            <?php 
                $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
                require 'connect.php';
                $sql = "SELECT nguoi_dung.ten_dang_nhap,nguoi_dung.avatar,thong_tin_ca_nhan.ho_va_ten,thong_tin_ca_nhan.gioi_tinh,thong_tin_ca_nhan.ngay_sinh,
                thong_tin_ca_nhan.so_dien_thoai,thong_tin_ca_nhan.email,thong_tin_ca_nhan.truong
                FROM nguoi_dung INNER JOIN thong_tin_ca_nhan ON nguoi_dung.ten_dang_nhap = thong_tin_ca_nhan.ten_dang_nhap WHERE nguoi_dung.ten_dang_nhap = '$ten_dang_nhap'";
                $result = $connect->query($sql);
                if ($result->num_rows > 0)  
                    {for($i=0;$i<$result->num_rows;$i++)
                    {   $row = $result -> fetch_assoc();
                        echo "<div class='menu_avatar'>";
                        echo "<div  style='background: url(avatar/account/".$row['avatar']."); background-size: cover;' class='avatar'></div>";
                        echo "<div class='ten_dang_nhap'>".$row['ten_dang_nhap']."</div>";
                        echo "</div>";}}?><br>
            <div class='menu_items'> Mật khẩu cũ: <input type='password' id='PassOld_input'>
            <button type="button" id="PassOld_toggle"  data-select='PassOld' class="bi bi-eye-slash"></button></div>
            <div class='menu_items' style='border:none;color:red;' id='checkPass' ></div><br>
            <div class='menu_items' style='display:none' id='PassNew'> Mật khẩu mới: <input type='password' id='PassNew_input'>
            <button type="button" id="PassNew_toggle"  data-select='PassNew' class="bi bi-eye-slash"></button></div><br>
            <div class='menu_items' style='display:none' id='checkPassNew'> Nhập lại mật khẩu: <input type='password' id='checkPassNew_input'>
            <button type="button" id="checkPassNew_toggle" data-select='checkPassNew' class="bi bi-eye-slash"></button></div>
            <div class='menu_items' style='border:none;display:none' id='boxChangePass'>
            <button type="button" style='width:350px;margin-left:25px;font-size:100%;' onclick='changePassword()'> Đổi mật khẩu </button></div>
            <div class='tinh_nang'> 
                <button onclick='goBack()'> Quay lại </button>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
// Phần nút Quay lại
    function goBack() {
        window.history.back();
    }
// Phần hiển thị hoặc ẩn mật khẩu
    document.querySelectorAll('.bi').forEach(function(button){
        button.onclick = function(){
        var select = button.dataset.select;
        var passwordInput = document.querySelector("#"+select+ "_input");
        var toggleButton = document.querySelector("#"+select+ "_toggle");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.className = "bi bi-eye";
        } else {
            passwordInput.type = "password";
            toggleButton.className = "bi bi-eye-slash";
        }}});
// Phần xác nhận mật khẩu cũ:  Cần nghiên cứu và tối ưu
    var typingTimer;
    var doneTypingInterval = 2500; // Thời gian chờ, ví dụ: 2.5 giây
    // Khi người dùng bắt đầu nhập
    document.querySelector("#PassOld_input").addEventListener('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);});
    // Khi người dùng ngừng nhập
    document.querySelector("#PassOld_input").addEventListener('keydown', function () {
        clearTimeout(typingTimer);});
    // Xử lý khi ngừng nhập
    function doneTyping() {
        const mat_khau = document.querySelector("#PassOld_input").value;
        fetch(`checkPass.php?mat_khau=${mat_khau}`).then(response => response.text()).then(response => {
        if (response.trim() === 'Mật khẩu đúng') {
            document.querySelector("#checkPass").innerHTML = '';
            document.querySelector("#PassNew").style.display = "block";
            document.querySelector("#checkPassNew").style.display = "block";
            document.querySelector("#boxChangePass").style.display = "block";
        } else {
            document.querySelector("#boxChangePass").style.display = "none";
            document.querySelector("#PassNew").style.display = "none";
            document.querySelector("#checkPassNew").style.display = "none";
            document.querySelector("#checkPass").innerHTML = response;}})
        ;};
// Phần thay đổi mật khẩu
    function changePassword(){
    var passNew = document.querySelector("#PassNew_input").value; 
    var checkPassNew = document.querySelector("#checkPassNew_input").value;
    if (passNew === '' || checkPassNew === ''){
        alert("Ô nhập lại mật khẩu phải hoặc ô mật khẩu mới trống ! ");}
    else if (passNew.length< 8){
        alert("Mật khẩu mới cần ít nhất 8 ký tự !");}
    else if(checkPassNew != passNew){
        alert("Ô nhập lại mật khẩu phải trùng với mật khẩu mới !");}
    else{ 
        fetch(`passNew.php?passNew=${passNew}`).then(response => response.text())
        .then(response => { alert(`${response}`);window.location.href = "taiKhoan.php";})
        ;}};
</script>
</body>
</html>