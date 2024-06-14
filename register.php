<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Đăng ký </title>
    <link rel='icon' href="icon.jpg" type image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>   
</head>
<body>
<?php require 'layout.php'; ?>
<!-- container-fluid: full rộng,h-100: full cao -->
<div class="container-fluid h-100">
    <div class='row'>
        <!-- SỬ DỤNG CỘT THỨ 1 ĐÊN CỘT 5 -->
        <div class="col-lg-6">
            <img class="img-fluid" src='photo/PBSKIDS.gif' />
        </div>
        <!-- SỬ DỤNG CỘT THỨ 7 ĐÊN CỘT 12 -->
        <div class="col-md-6">
            <div class="offset-md-1"> <!-- Offset thêm vào để cách nhau cột 6 -->
            <!-- Thông báo các lỗi sai -->  <!-- https://www.w3schools.com/bootstrap5/tryit.asp?filename=trybs_alerts_fade&stacked=h --> 
                <div class="alert alert-danger" style='width:290px;height:55px;margin:5px 0px 0px 250px;'  role="alert">
                    <div id='notification' style='font-weight: bold;color: red;position:relative;left:0px;font-size:medium'></div>
                </div>
                <h1 class='text-center' style=' margin-top:20px;margin-bottom: 25px;color:#384fa1;'> Đăng ký tài khoản </h1>
                <form>
                    <div class='form-group'>
                        <div style="display: grid; grid-template-columns:65% 35%;">
                            <input type='text' data-input='Họ và tên' style='width: 475px !important;font-size:120%;text-align:center;' class='form-control'  id="HoVaTen" autocomplete='off' placeholder=" Họ và tên " /> 
                            <i class="bi bi-person-bounding-box form-group" style="font-size: 200%; color:grey;padding-left: 63px;" id="buttonHoVaTen"> </i>
                        </div>
                    </div><br>
                    <div class='form-group'>
                        <div style="display: grid; grid-template-columns:65% 35%;">
                            <input type='text' data-input="Tên đăng nhập" style='width: 475px !important;font-size:120%;text-align:center;' class='form-control'  id="userName" autocomplete='off' placeholder=" Tên đăng nhập "/> 
                            <i class="bi bi-person form-group" style="font-size: 200%; color:grey; padding-left: 63px;" id="buttonuserName"> </i>
                        </div>
                    </div><br>
                    <div class='form-group'>
                        <div style="display: grid; grid-template-columns:65% 11% 24%;">
                            <input type='password' data-input="Mật khẩu" style='width: 475px !important;font-size:120%;text-align:center;' class='form-control'  id="password" autocomplete='off' placeholder=" Mật khẩu "/> 
                            <i class="bi bi-eye-slash form-group" style="font-size: 200%;color:grey; padding-left: 15px;" type="button" id="toggleButton" onclick="togglePasswordVisibility()" ></i>
                            <i class="bi bi bi-key form-group" style="font-size: 200%;color:grey; padding-left: 3px;"  id="buttonpassword"> </i>
                    </div><br>
                    <div class='form-group'>
                        <div style="display: grid; grid-template-columns:65% 35%;">
                            <input type='text' data-input="Số điện thoại" style='width: 475px !important;font-size:120%;text-align:center;' class='form-control' id='phoneNumber' autocomplete='off' placeholder=" Số điện thoại "/> 
                            <i class="bi bi-telephone form-group" style="font-size: 200%;color:grey; padding-left: 63px;" id="buttonphoneNumber""> </i>
                    </div><br>
                    <div class='form-group'>
                        <div style="display: grid; grid-template-columns:65% 35%;">
                            <input type='text' data-input="Email/Gmail" style='width: 475px !important;font-size:120%;text-align:center;' class='form-control' id="gmail" autocomplete='off' placeholder=" Email/Gmail "/> 
                            <i class="bi bi-envelope form-group"  style="font-size: 200%; color:grey; padding-left: 63px;"id="buttongmail"> </i>
                        </div>
                    </div><br><br>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" style='width: 475px' data-bs-target="#myModal">Tạo tài khoản</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Đăng Ký Tài Khoản </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
            <-_->  Chào bạn <span id ='modalName'></span>! <-_-> <br>
            Bây giờ, bạn có thể học những bài học bổ ích qua PBSKIDS nhé!<br>
            Tên đăng nhập:  <span id ='modalUser' style='font-weight: bold'></span><br>
            Mật khẩu:  <span id ='modalPass' style='font-weight: bold'></span><br>
            Đừng quên tải ảnh đại diện và cập nhập thông tin cá nhân để bạn bè có thể tìm ra bạn nhé !<br>
            <span style='font-weight: Italic'>Cảm ơn bạn đã tin tưởng và đồng hành cùng chúng tôi! </span>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 
   // Phần hiển thị hoặc ẩn mật khẩu
   function togglePasswordVisibility() {
        var passwordInput = document.querySelector("#password");
        var toggleButton = document.querySelector("#toggleButton");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.className = "bi bi-eye";
        } else {
            passwordInput.type = "password";
            toggleButton.className = "bi bi-eye-slash";}};
    // Kiểm tra thông tin trước khi đăng ký
    document.querySelector('.btn-primary').disabled = true; // Vô hiệu hóa nút đăng ký
    document.querySelector('.alert-danger').style.display = 'none' ; // Ẩn div thông báo
    // Lấy tất cả các phần tử input
    var inputs = document.getElementsByTagName('input');
    const listKey = {}; // Tập hợp điều kiện đúng
    // Lặp qua mỗi phần tử input và gán sự kiện  
    for (var i = 1; i < inputs.length; i++) {
        inputs[i].addEventListener('keydown', function () {  // Khi người dùng bắt đầu rời phím   {blur  keyup}
            var inputsID = this.id; startTyping(inputsID,listKey);});}
    // Hiển thị nút đăng ký 
    function hienthiDangky(listKey) {
    // Sử dụng Object.keys() để lấy mảng chứa tất cả các keys trong listKey
    const lengthKey = Object.keys(listKey).length;   // độ dài của mảng chứa keys
    if (lengthKey == 5) {
        var registerButton = document.querySelector('.btn-primary');
        registerButton.disabled = false;
        registerButton.addEventListener("click", function() {
            dang_ky(listKey);});
    } else {
        document.querySelector('.btn-primary').disabled = true;
    }}   // console.log(listKey,lengthKey);
     // Lưu tài khoản vào MySQL và hiển thị thông báo
    function dang_ky(listKey)   {
        const json = JSON.stringify(listKey);
        // console.log(json);
          fetch('dang_ky.php', {
            method: 'POST', 
            headers: {  'Content-Type': 'application/json' },
            body: json ,})
        .then(response => response.text())
        .then(response => {if (response.trim() === 'Thành công!'){
        document.querySelector('#modalName').innerHTML = listKey['HoVaTen'];
        document.querySelector('#modalUser').innerHTML = listKey['userName'];
        document.querySelector('#modalPass').innerHTML = listKey['password'];};})}
    // trở về bạn đầu khi modal tắt
        $(document).ready(function(){
    // Bắt sự kiện khi modal đóng
    $('#myModal').on('hidden.bs.modal', function () {
        window.location.href = "login.php";});});
    // Khởi tạo biến 
    var typingTimer;
    // Hàm bắt đầu đếm thời gian chờ
    function startTyping(inputsID,listKey) {
        // Xóa timeout trước nếu đã được thiết lập
        clearTimeout(typingTimer);
        typingTimer = setTimeout(function() {
            doneTyping(inputsID,listKey);}, 1612);}   // 1612: key mã hóa
    // Xử lý từng input
    function doneTyping(inputsID,listKey) {
        var inputElement = document.querySelector(`#${inputsID}`);  // Truy vấn id: inputsID
        var inputValue = inputElement.value.trim();    // Gia trị của inputsID bỏ cách 2 đầu
        var buttonInput = 'button' + inputsID.toString(); // `button${inputsID}`
        // Truy cập và sử dụng dataset
        var inputDataset = inputElement.dataset.input;
        if(inputValue === "") 
        {   False(buttonInput,inputsID);
            document.querySelector('#notification').innerHTML = inputDataset + ' đang trống !';}
        // Kiểm tra tên học sinh
        else if(inputsID === "HoVaTen"){
            const regex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;   // Biểu thức kiểm tra ký tự đặc biệt
            if(/\d/.test(inputValue) === true || regex.test(inputValue) === true || inputValue.length < 4){  
                False(buttonInput,inputsID); 
                document.querySelector('#notification').innerHTML = inputDataset + ' không hợp lệ !';}
            else{True(buttonInput,inputValue,inputsID);}}
        // Kiểm tra mật khẩu
        else if ( inputsID === "password")
        {   const letter = /[a-zA-Z]/.test(inputValue);
           const number = /\d/.test(inputValue);
            const specialCharacter = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(inputValue);
            if(inputValue.length < 8)
            {   key=" min ";Password(buttonInput,inputDataset,inputValue,key,inputsID);}
            else if (letter && number && specialCharacter )
            {    key=" mạnh ";Password(buttonInput,inputDataset,inputValue,key,inputsID);}
            else if (letter && number || letter && specialCharacter || specialCharacter && number )
            {   key=" trung bình ";Password(buttonInput,inputDataset,inputValue,key,inputsID);}
            else{ var key = " yếu ";Password(buttonInput,inputDataset,inputValue,key,inputsID);}}
         // Kiểm tra số điện thoại 
        else if( inputsID === "phoneNumber"){
            const phoneRegex = /^[0-9]{10}$/; // Biểu thức kiểm tra gồm 10 số và không chữ hoặc ký tự đặc biệt
            if(phoneRegex.test(inputValue) === false)
            {   False(buttonInput,inputsID);
                document.querySelector('#notification').innerHTML = inputDataset + ' không hợp lệ !';}
            else{True(buttonInput,inputValue,inputsID);}}
        // Kiểm tra gmail
        else if( inputsID === "gmail"){   
            const gmailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;     // Biểu thức kiểm tra định dạng gmail/email
            if(gmailRegex.test(inputValue) === false)
            {   False(buttonInput,inputsID);
                document.querySelector('#notification').innerHTML = inputDataset + ' không hợp lệ !';}
            else{
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    if(this.responseText === ''){
                        document.querySelector("#notification").innerHTML = "";
                        True(buttonInput,inputValue,inputsID);}
                    else{ False(buttonInput,inputsID);
                        document.querySelector("#notification").innerHTML = inputDataset + " đã đăng ký PBSKIDS";}}};
                xhr.open('GET',"lay_email.php?email="+ inputValue,true);
                xhr.send();}}
         // Kiểm tra tên đăng nhập
        else if( inputsID === "userName")   
            {   const specialCharacter = /[!@#$%^&*()_=|+{}\[\]:;<>,.?~\\/-]/.test(inputValue);
                if(specialCharacter){
                    False(buttonInput,inputsID);
                    document.querySelector('#notification').innerHTML = inputDataset + ' có ký tự đặc biệt';
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200){
                            if(this.responseText != ''){
                                False(buttonInput,inputsID);document.querySelector('#notification').innerHTML = this.responseText;}
                            else{True(buttonInput,inputValue,inputsID);}}};
                    xhr.open('GET',"lay_ten_dang_nhap.php?ten_dang_nhap="+ inputValue,true);
                    xhr.send();}}}
    // phần hiện thông báo đúng sai
    function True(buttonInput,inputValue,inputsID){
        document.querySelector('.alert-danger').style.display = 'none';
        document.querySelector(`#${buttonInput}`).className = "bi-check2";
        document.querySelector(`#${buttonInput}`).style.color = "green";
        listKey[inputsID] = inputValue;hienthiDangky(listKey);};
    function False(buttonInput,inputsID){
        document.querySelector('.alert-danger').style.display = 'block';
        document.querySelector(`#${buttonInput}`).className = "bi-exclamation-lg";
        document.querySelector(`#${buttonInput}`).style.color = "red";
        document.querySelector('#notification').style.color = 'red';
        delete listKey[inputsID];hienthiDangky(listKey);};
    function  Password(buttonInput,inputDataset,inputValue,key,inputsID){
        document.querySelector('.alert-danger').style.display = 'block';
        if (key.trim() === "mạnh"){
            document.querySelector('#notification').innerHTML = inputDataset + key; 
            document.querySelector('#notification').style.color = 'green';
            document.querySelector(`#${buttonInput}`).className = "bi-check2";
            document.querySelector(`#${buttonInput}`).style.color = "green";
            listKey[inputsID] = inputValue;hienthiDangky(listKey);}
        else if (key.trim() === "yếu"){
            document.querySelector('#notification').innerHTML = inputDataset + key; 
            document.querySelector('#notification').style.color = 'black';
            document.querySelector(`#${buttonInput}`).className = "bi-check2";
            document.querySelector(`#${buttonInput}`).style.color = "green";
            listKey[inputsID] = inputValue;hienthiDangky(listKey);}
        else if (key.trim() === "trung bình"){
            document.querySelector('#notification').innerHTML = inputDataset + key; 
            document.querySelector('#notification').style.color = 'yellow';
            document.querySelector(`#${buttonInput}`).className = "bi-check2";
            document.querySelector(`#${buttonInput}`).style.color = "green";
            listKey[inputsID] = inputValue;hienthiDangky(listKey);}
        else {delete listKey[inputsID];hienthiDangky(listKey);
            document.querySelector('#notification').innerHTML = inputDataset + " cần tối thiểu 8 ký tự";}}
</script>
</body>
</html>