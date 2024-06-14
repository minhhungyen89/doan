<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="tai_khoan.css">
    <title> Thông tin tài khoản</title>
    <link rel='icon' href="icon.jpg" type image/x-icon">
    <style>
        .text-muted:hover{
            cursor: pointer;
            background-color: lightgrey;}
    </style>
</head>
<body>
    <?php require 'layout.php';?>
    <div class="main">
        <div class='boxTaiKhoan'>  
            <div class='title'><b>Thông tin tài khoản</b></div>
            <?php 
                $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
                require 'connect.php';
                mysqli_set_charset($connect,'UTF8');
                $sql = "SELECT nguoi_dung.ten_dang_nhap,nguoi_dung.avatar,thong_tin_ca_nhan.ho_va_ten,thong_tin_ca_nhan.gioi_tinh,thong_tin_ca_nhan.ngay_sinh,
                thong_tin_ca_nhan.so_dien_thoai,thong_tin_ca_nhan.email,thong_tin_ca_nhan.truong
                FROM nguoi_dung INNER JOIN thong_tin_ca_nhan ON nguoi_dung.ten_dang_nhap = thong_tin_ca_nhan.ten_dang_nhap WHERE nguoi_dung.ten_dang_nhap = '$ten_dang_nhap'";
                $result = $connect->query($sql);
                if ($result->num_rows > 0)  
                    {for($i=0;$i<$result->num_rows;$i++)
                    {   $row = $result -> fetch_assoc();
                        $ten_dang_nhap = $row['ten_dang_nhap'];
                        echo "<div class='menu_avatar'>";
                        echo "<div  style='background: url(avatar/account/".$row['avatar']."); background-size: cover;' class='avatar'><button data-select='avatar' style='margin-left:90px' class='icon bi bi-pencil'></button></div>";
                        echo "<div class='ten_dang_nhap'>".$ten_dang_nhap."</div>";
                        echo "</div>";
                        echo "<div class='menu_items'> Tên học sinh: ".$row['ho_va_ten']."<button data-select='tên học sinh' style='margin-left:100px' class='icon bi bi-pencil'></button>"."</div>";
                        echo "<div class='menu_items'> Giới tính: ".$row['gioi_tinh']."<button data-select='giới tính' style='margin-left:170px' class='icon bi bi-pencil'></button>"."</div>";
                        $ngay_sinh = date("d-m-Y", strtotime($row['ngay_sinh'])); // chuyển đổi sang dạng ngày tháng năm
                        echo "<div class='menu_items'> Ngày sinh: ".$ngay_sinh."<button data-select='ngày sinh' style='margin-left:100px' class='icon bi bi-pencil'></button>"."</div>";
                        echo "<div class='menu_items'> Số điện thoại: ".$row['so_dien_thoai']."<button data-select='số điện thoại' style='margin-left:80px' class='icon bi bi-pencil'></button>"."</div>";
                        echo "<div class='menu_items'> Email: ".$row['email']."<button data-select='email' style='margin-left:50px' class='icon bi bi-pencil'></button>"."</div>";
                        echo "<div class='menu_items'> Trường: ".$row['truong']."<button data-select='trường' style='margin-left:50px' class='icon bi bi-pencil'></button>"."</div>";}}
                else{
                    echo '<script language="javascript">window.location.href = "eror.php"</script>';
                }?>
            <div class='tinh_nang'> 
                <button onclick='changePassword()'> Đổi mật khẩu </button>
                <button onclick='logout()'> Đăng xuất </button>
                <button onclick='removeAccount()'> Xóa tài khoản</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="notice">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body text-danger" style="text-align:center;font-weight:bold;"></div>
            <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" >
                    <label for="password">Mật khẩu</label>
                    <i class="bi bi-eye-slash" style="font-size: 200%;position:relative;top:-55px;left:450px" type="button" id="toggleButton" onclick="togglePasswordVisibility()"> </i>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class=" btn btn-light btn-block"> Hủy bỏ </button>
                <button type="button"  id='submit' data-info='' class=" btn btn-primary btn-block">Đồng ý</button>
            </div>    
        </div>
    </div>
</div>
<!-- Chỉnh sửa thông tin tài khoản -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Cập nhập thông tin </h4>
            </div>
            <div class="modal-body text-danger" id='modal-body' style="text-align:center;font-weight:bold;"></div>
            <div class="form-floating mb-2" id='form-floating'>
                <input type="text" class="form-control" id="inputChange"/>
                <label id="labelChange" ></label>
            </div>
            <div style="justify-content: space-between" id='Gender'>
                <div class="form-check" style='margin-left: 100px;'>
                    <input type="radio" class="form-check-input" name="Gender" value="Nam" checked>
                    <label class="form-check-label">Nam</label>
                </div>
                <div class="form-check" style='margin-right: 100px;'>
                    <input type="radio" class="form-check-input" name="Gender" value="Nữ">
                    <label class="form-check-label">Nữ</label>
                </div>
            </div>
            <div class="custom-date-input" >
                <input type="date" class="form-control" id="dateInput" >
            </div>
            <div class="AccountAvatar">
                <form method="POST" action="avatarAccount.php" enctype="multipart/form-data"> 
                    <div style='width:200px'>
                        <div class="d-flex bg-light flex-column" style="height:215px">
                            <div class="p-2 m-3 text-muted" id="AccountAvatar"><i class="bi bi-cloud-upload"></i> Tải ảnh lên </div>
                            <input type="file" name="image" id='fileInput' style='display:none'>
                            <div class="p-2 m-3 text-muted" id="deleteAvatar"><i class="bi bi-trash"></i> Xóa ảnh </div>
                            <div class="p-2 m-2 text-warning" id='noticeAvatar' style='display:none;font-size:110%'>Ảnh không hợp lệ. Vui lòng chọn lại !</div>
                        </div>
                    </div>
                <button type="submit" id='avatarAccount' style='display:none;'>OK</button>
                </form>
                <div class="p-2 border-start bg-light flex-grow-1">
                    <img src="<?php echo 'avatar/account/'.$row['avatar'];?>" class="rounded-circle img-fluid" style='max-height:200px;width: auto;margin-left: 16%'>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" onclick="cancel()" class=" btn btn-light btn-block"> Hủy bỏ </button>
                <button type="button" id='ok'  class=" btn btn-primary btn-block"> Đồng ý</button>
                <button type="button" id="continue"  class=" btn btn-primary btn-block"> Lưu thay đổi </button>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script> 
// Phần thay đổi mật khẩu
    function changePassword(){
        var notice = new bootstrap.Modal(document.getElementById('notice'), {
            keyboard: false});
            notice.show();
        document.querySelector("#submit").dataset.info ='changePass';
        document.querySelector("#submit").dataset.info;
        document.querySelector('.modal-title').innerHTML = 'Quên mật khẩu';
        var ten_dang_nhap = "<?php echo $ten_dang_nhap; ?>";
        document.querySelector('.form-floating').style.display = 'none';
        document.querySelector('.modal-body').innerHTML = 'Bạn muốn đổi mật khẩu tài khoản: '+ ten_dang_nhap+'?';
        document.querySelector("#submit").addEventListener('click', function () {
            var info = document.querySelector("#submit").dataset.info;
            if(info == 'changePass'){window.location.href = "changePass.php";}   })}
// Phần đăng xuất
    function logout(){
        var notice = new bootstrap.Modal(document.getElementById('notice'), {
            keyboard: false});
            notice.show();
        document.querySelector("#submit").dataset.info ='logout';
        document.querySelector('.modal-title').innerHTML = 'Đăng xuất';
        var ten_dang_nhap = "<?php echo $ten_dang_nhap; ?>";
        document.querySelector('.form-floating').style.display = 'none';
        document.querySelector('.modal-body').innerHTML = 'Bạn muốn đăng xuất tài khoản: '+ ten_dang_nhap+'?';
        document.querySelector("#submit").addEventListener('click', function () {
            var info = document.querySelector("#submit").dataset.info;
            if(info == 'logout'){window.location.href = "Logout.php";}   })}
// Phần xóa tài khoản
    function removeAccount(){
        var notice = new bootstrap.Modal(document.getElementById('notice'), {
            keyboard: false,backdrop: 'static'});
            notice.show();  var noticeP = document.createElement("p");
        document.querySelector("#submit").dataset.info ='remoteAcc';
        document.querySelector('.modal-title').innerHTML = 'Xóa tài khoản';
        var ten_dang_nhap = "<?php echo $ten_dang_nhap; ?>";
        document.querySelector('.form-floating').style.display = 'none';
        document.querySelector('.modal-body').innerHTML = 'Bạn muốn xóa tài khoản: '+ ten_dang_nhap+'?';
        document.querySelector("#submit").addEventListener('click', function () {
            var info = document.querySelector("#submit").dataset.info;
            if(info == 'remoteAcc'){
                document.querySelector('.modal-body').innerHTML = "Bạn vui lòng nhập mật khẩu vào ô bên dưới !" ;
                document.querySelector('.form-floating').style.display = 'block';
                document.querySelector("#submit").dataset.info ='ok';
                var info = document.querySelector("#submit").dataset.info;
                if(info == "ok"){
                    document.querySelector("#submit").addEventListener('click', function () {
                        var mat_khau =  document.querySelector('#password').value;
                        fetch(`checkPass.php?mat_khau=`+mat_khau).then(response => response.text()).then(response => {
                        if(response.trim() == 'Mật khẩu đúng'){
                            document.querySelector("#submit").dataset.info ='delete';
                            document.querySelector('.modal-body').innerHTML = 'Tất cả thông tin liên quan đến tài khoản đều bị xóa !';
                            document.querySelector('.form-floating').style.display = 'none';
                            var info = document.querySelector("#submit").dataset.info;
                            if(info == "delete"){
                                document.querySelector("#submit").addEventListener('click', function () {
                                    location.reload();
                                })}
                    }else{
                        noticeP.innerHTML = "Bạn đã nhập sai mật khẩu !";
                        noticeP.classList.add("text-danger","text-center","fw-bold");
                        document.querySelector('.form-floating').appendChild(noticeP);
                    }})})}
            }})}
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
// Phần chỉnh sửa thông tin cá nhân
document.querySelectorAll('.icon').forEach(function(button){
    button.onclick = function(){
        select = button.dataset.select;
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false});
            myModal.show();
        document.querySelector('#modal-body').innerHTML = 'Bạn muốn thay đổi thông tin phần: '+ select+' ?';
        document.querySelector('.AccountAvatar').style.display = 'none';
        document.querySelector('#form-floating').style.display = 'none';
        document.querySelector('#continue').style.display = 'none';
        document.querySelector('#Gender').style.display = 'none';
        document.querySelector('.custom-date-input').style.display = 'none';
        document.querySelector('#ok').style.display = 'block';
        document.querySelector("#ok").addEventListener('click', function () {
            document.querySelector('#modal-body').innerHTML = "Bạn vui lòng nhập "+select+" mới: ";
            document.querySelector('#ok').style.display = 'none';
            document.querySelector("#continue").style.display = 'block';
            if(select.trim() != "giới tính" && select.trim() != "ngày sinh" && select.trim() != "avatar"){
            document.querySelector('.AccountAvatar').style.display = 'none';
            document.querySelector('#Gender').style.display = 'none';
            document.querySelector('.custom-date-input').style.display = 'none';
            document.querySelector('#form-floating').style.display = 'block';
            document.querySelector("#labelChange").textContent = select;
            if(select.trim() == "tên học sinh"){
                document.querySelector("#inputChange").value = "<?php echo $row['ho_va_ten']; ?>"; } 
            if(select.trim() == "số điện thoại"){
                document.querySelector("#inputChange").value = "<?php echo $row['so_dien_thoai']; ?>"; } 
            if(select.trim() == "email"){
                document.querySelector("#inputChange").value = "<?php echo $row['email']; ?>"; } 
            if(select.trim() == "trường"){
                document.querySelector("#inputChange").value = "<?php echo $row['truong']; ?>"; } 
            }else{
                if(select.trim() == "giới tính"){
                document.querySelector('.AccountAvatar').style.display = 'none';
                document.querySelector('#form-floating').style.display = 'none';
                document.querySelector('#Gender').style.display = 'flex';
                document.querySelector('.custom-date-input').style.display = 'none';}
                if(select.trim() == "ngày sinh"){
                document.querySelector('.AccountAvatar').style.display = 'none';
                document.querySelector('#form-floating').style.display = 'none';
                document.querySelector('#Gender').style.display = 'none';
                document.querySelector('.custom-date-input').style.display = 'block';    }
                if(select.trim() == "avatar"){
                document.querySelector('#form-floating').style.display = 'none';
                document.querySelector('#Gender').style.display = 'none';
                document.querySelector('.custom-date-input').style.display = 'none';
                document.querySelector('.AccountAvatar').style.display = 'flex';
                document.getElementById("AccountAvatar").addEventListener("click", function() {
                document.getElementById('fileInput').click();
                document.getElementById('fileInput').addEventListener('change', function(event) {
                    var file = event.target.files[0];
                    var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
                    if (!validImageTypes.includes(file.type)) {
                        document.querySelector('#noticeAvatar').style.display = 'block';
                        document.querySelector('.img-fluid').src = "<?php echo 'avatar/account/'.$row['avatar'];?>"}
                        else{ var reader = new FileReader();
                            document.querySelector('#noticeAvatar').style.display = 'none';
                            reader.onload = function(event) {
                                var imageURL = event.target.result;
                                document.querySelector('.img-fluid').src = imageURL;};
                                reader.readAsDataURL(file);}})      });
                document.getElementById("deleteAvatar").addEventListener("click", function() {
                    document.querySelector('#noticeAvatar').style.display = 'none';
                    document.querySelector('.img-fluid').src = "avatar/account/avatar.png";});}}
            document.querySelector("#continue").addEventListener('click', function () {
                if(select.trim() != "giới tính" && select.trim() != "ngày sinh" && select.trim() != "avatar"){
                var content = document.querySelector("#inputChange").value; }  
                else if(select.trim() == "giới tính"){
                    document.querySelectorAll('input[name="Gender"]').forEach(function(radio) {
                        if (radio.checked) {  content = radio.value; }
                })}else if(select.trim() == "avatar"){    
                    if(document.querySelector('#noticeAvatar').style.display == 'none')
                       { document.getElementById('avatarAccount').click();
                            return; }
                    else{   swal("File ảnh có dạng: ipg,png,gif","Ảnh không hợp lệ !","warning");
                        return; }
                }else{
                    var content = document.querySelector("#dateInput").value;   }
                fetch(`updateAccount.php?change=${select}&content=${content}`).then(response => response.text()).then(response => {
                swal(response,"","success");
                setInterval(function() { location.reload(); }, 2004);  })       })
        })}})
// Phần hủy bỏ của chỉnh sửa thông tin cá nhân
function cancel(){  select = '';   }
</script>
</body>
</html>