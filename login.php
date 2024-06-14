<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng nhập </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require 'layout.php'; ?>
<!-- container-fluid: full rộng,h-100: full cao -->
<div class="container-fluid h-100" id='body'>
    <div class='row'>
        <!-- SỬ DỤNG CỘT THỨ 1 ĐÊN CỘT 5 -->
        <div class="col-lg-6">
            <img class="img-fluid" src='photo/PBSKIDS.jpg' />
        </div>
        <!-- SỬ DỤNG CỘT THỨ 7 ĐÊN CỘT 12 -->
        <div class="col-md-6">
            <div class="offset-md-1"> <!-- Offset thêm vào để cách nhau cột 6 -->
                <h1 class='text-center' style=' margin-top:40px;margin-bottom:20px;'> Đăng nhập </h1>
                <form method="POST"id='form'>
                    <div class='form-group'>
                        <label> <H4>Tên đăng nhập </H4> </label>
                        <div style="display: grid; grid-template-columns:65% 35%;">
                            <input type='text' style='width: 475px !important;' required class='form-control' id="userName" autocomplete="off"> 
                            <i class="bi bi-person form-group" style="font-size: 200%; padding-left: 63px;"> </i>
                        </div>
                    </div><br><br>
                    <div class='form-group'>
                        <label><h4> Mật khẩu </h4></label>
                        <div style="display: grid; grid-template-columns:65% 35%;">
                            <input type="password" style="width: 475px !important;" required class="form-control" id="password" autocomplete="current-password">
                            <i class="bi bi-eye-slash form-group" style="font-size: 200%; padding-left: 63px;" type="button" id="toggleButton" onclick="togglePasswordVisibility()"> </i>
                    </div><br>
                    <div class='form-group form-check'>
                        <input type='checkbox' style="font-size: 130%;" class='form-check-input' />
                        <label class='form-check-lable' style="font-size: 130%;"> Nhớ mật khẩu</label>
                    </div><br>
                    <button type="submit" class="btn btn-primary " style='width: 475px;height:45px;'> Đăng nhập </button>
                </form><br><br>
                <button type="button" class="btn btn-primary" id='openModal'style='width: 175px;margin-left:160px;border:none;color:blue;background-color:white;font-size: 135%;'>Quên mật khẩu</button>
                <!-- The Modal bootstrap 5:  --> <!-- https://www.w3schools.com/bootstrap5/tryit.asp?filename=trybs_modal&stacked=h --> 
                <div class="modal fade" id="myModal" >
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Quên mật khẩu</h4>   
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>   <!-- Nút X  -->
                            </div>
                            <div class="modal-body">
                                <form id='formEmail'>
                                    <input type="text" id="input_email" style='width: 80%' placeholder="Nhập email đăng ký với PBSKIDS">
                                    <button type="button" style='margin-left: 10px;height:30px' onmouseover="this.style.color='black'; this.style.border='2px solid grey';" 
                                    onmouseout="this.style.color='grey'; this.style.border='none';"id="submitQMK">Submit</button>
                                    <br><br><div id = 'noticeQMK' style='color:red; text-align: center;'></div>
                                </form>
                                <form id='formKey'>
                                    <div> PBSKIDS đã gửi email mã xác nhận đến: <span id ='emailQMK'></span></div><br>
                                    <label style='font-weight:bold;'>PBS-</label>
                                    <input type="text" id="input_key" style='width: 35%;'>
                                    <button type="button" style='margin-left: 50px;height:30px;'onmouseover="this.style.color='black'; this.style.border='2px solid grey';" 
                                    onmouseout="this.style.color='grey'; this.style.border='none';" id="keyQMK">Xác Nhận</button>
                                    <br><br><div id = 'noticeKey' style='color:red; text-align: center;'></div>
                                </form>
                                <form id='formPass'>
                                    <label style='font-weight:bold;margin-bottom:5px;'>Đặt mật khẩu mới: </label><br>
                                    <input type="password" id="password2" style='width: 65%;'>
                                    <i class="bi bi-eye-slash" style="font-size: 150%;position:relative;top:3px;left:-36px" type="button" id="toggleButton2" onclick="togglePasswordVisibility2()"> </i>
                                    <button type="button" id="savePass" onmouseover="this.style.color='black'; this.style.border='2px solid grey';" 
                                    onmouseout="this.style.color='grey'; this.style.border='none';">Lưu thay đổi</button>
                                    <br><br><div id = 'noticePass' style='color:red; text-align: center;'></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Success">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thông báo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Đăng nhập thành công !
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Failed">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thông báo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="text-align:center;font-weight:bold;color:red">
        Tên đăng nhập hoặc mật khẩu không đúng !
      </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 
    document.querySelector('#body').style.display = 'none';
    fetch(`checkAccount.php`).then(response => response.text()).then(response => { 
        if(response.trim() === "guest" ){
            document.querySelector('#body').style.display = 'block';}
        else{   window.location.href = "eror.php";}})
    // Phần hiển thị hoặc ẩn mật khẩu
    function togglePasswordVisibility() {
        var passwordInput = document.querySelector("#password");
        var toggleButton = document.querySelector("#toggleButton");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.className = "bi bi-eye";
        } else {
            passwordInput.type = "password";
            toggleButton.className = "bi bi-eye-slash";}}
    function togglePasswordVisibility2() {
        var passwordInput2 = document.querySelector("#password2");
        var toggleButton2 = document.querySelector("#toggleButton2");
        if (passwordInput2.type === "password") {
            passwordInput2.type = "text";
            toggleButton2.className = "bi bi-eye";
        } else {
            passwordInput2.type = "password";
            toggleButton2.className = "bi bi-eye-slash";}}
    // Lấy dữ liệu từ form
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#form').onsubmit= dangNhap;});
    function dangNhap() {
        var login = [];
        const userName = document.querySelector('#userName').value;
        const password = document.querySelector('#password').value;
        login.push(userName);    login.push(password);
        const json = JSON.stringify(login);
        fetch('dang_nhap.php', {
            method: 'POST', 
            headers: {  'Content-Type': 'application/json' },
            body: json ,})
        .then(response => response.text())
        .then(response => {if (response.trim() === 'Success'){
            var Success = new bootstrap.Modal(document.querySelector("#Success"), {
            keyboard: false,   // chặn tắt modal bằng bàn phím
            backdrop: 'static'});   // chặn tắt modal khi nhắn ra bên ngoài modal)
            Success.show();
            // viết tiếp
            window.location.href = "index.php";}
        else{ 
            var Failed = new bootstrap.Modal(document.querySelector("#Failed"))
            Failed.show();}})
       return false;}
    // Quên mật khẩu   
    document.getElementById('openModal').addEventListener('click', function () {
    var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
      keyboard: false
    });
    myModal.show();
  });
    var myModal =  document.querySelector("#myModal"); 
    myModal.addEventListener('show.bs.modal', function () {
        // Vô hiệu hóa nút Submit và ẩn phần điền mã xác nhận và nhập pass mới
        document.querySelector("#submitQMK").disabled = true;
        document.querySelector('#formKey').style.display = 'none' ;
        document.querySelector('#formPass').style.display = 'none' ;
        var typingTimer;  // Khi người dùng bắt đầu nhập
        document.querySelector("#input_email").addEventListener('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping,1000);}); // Thời gian chờ, ví dụ: 1 giây
        // Khi người dùng ngừng nhập
            document.querySelector("#input_email").addEventListener('keydown', function () {
            clearTimeout(typingTimer);});
        // Xử lý khi ngừng nhập
        function doneTyping() { 
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //hàm chính quy để kiểm tra định dạng email
            var email = (document.querySelector("#input_email").value).trim();
            if (emailRegex.test(email) === true) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    if(this.responseText === ''){
                        document.querySelector("#noticeQMK").innerHTML = "Không tìm thấy Email trên PBSKID";
                        document.querySelector("#submitQMK").disabled = true;}
                    else{
                        document.querySelector("#noticeQMK").innerHTML = "";
                        document.querySelector("#submitQMK").disabled = false;
                        $Email = this.responseText;}}};
                xhr.open('GET',"lay_email.php?email="+ email,true);
                xhr.send();}
            else {
                document.querySelector("#submitQMK").disabled = true;
                document.querySelector("#noticeQMK").innerHTML = "Email không đúng định dạng"}};
    document.getElementById("submitQMK").onclick = function() {
        document.querySelector('#formEmail').style.display = 'none';
        document.querySelector('#formKey').style.display = 'block';
        document.querySelector("#emailQMK").innerHTML = $Email; 
        fetch(`quen_mat_khau.php?emailQMK=${$Email}`).then(response => response.text()).then(response => {
        document.querySelector("#keyQMK").onclick = function() {
            if(document.querySelector("#input_key").value == response)
                {   document.querySelector('#formKey').style.display = 'none';     
                    document.querySelector('#formPass').style.display = 'block';
                    document.querySelector("#savePass").onclick = function() {
                        passNew = document.querySelector("#password2").value;
                        fetch(`passNew.php?passNew=${passNew}&email=${$Email}`).then(response => response.text()).then(response => { 
                        document.querySelector("#noticePass").innerHTML = response;})}
                }else{
                    document.querySelector("#noticeKey").innerHTML = "Mã xác nhận không đúng !";}}})}})
</script>
</body>
</html>