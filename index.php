<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Trang chủ </title>
    <link rel='icon' href="icon.jpg" type image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"  href="index.css">  
</head>
<body>
    <?php require 'layout.php'; ?>
    <div >
         <button id='createGroup'><i class="bi bi-person-fill" style="position:relative;top:-3px"></i><i class="bi bi-person-fill" style="position:relative;left:-2px;top:-3px"></i><i class="bi bi-person-fill" style="position:relative;left:-25px;top:5px"></i>Tham gia hoặc tạo nhóm </button>
    </div>
    <div class='group'>
        <?php 
            require 'connect.php';
            mysqli_set_charset($connect,'UTF8');
            if(!isset($_SESSION['ten_dang_nhap'])){ 
                $ten_dang_nhap = 'Guest';}
            if(isset($_SESSION['ten_dang_nhap'])){ 
            $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
            $sql = "SELECT nhom.ten_nhom, nhom.avatar, nhom.che_do, nhom.ma_nhom FROM nhom INNER JOIN thanh_vien_nhom 
            ON nhom.ma_nhom = thanh_vien_nhom.ma_nhom WHERE thanh_vien_nhom.ten_dang_nhap = '$ten_dang_nhap'";
            $result = $connect->query($sql); 
            if ($result->num_rows == 0)     {   echo '';  } 
            else{
                for($i=0;$i<$result->num_rows;$i++)
                {
                    $row = $result -> fetch_assoc();
                    $ma_nhom = $row['ma_nhom'];
                    $ten_nhom = $row['ten_nhom'];
                    $avatar = $row['avatar'];
                    $che_do = $row['che_do'];
                    echo '<div class="group-box" data-click="'.$ma_nhom.'">';
                    echo "<div class='image-group'>";
                    echo "<img src='avatar/group/".$avatar."' ></div>";
                    echo "<div class='title-group truncate-div'>".$ten_nhom."</div>";
                    echo "<div class='item-group'>";
                    if($che_do ==='Công khai'){
                    echo "<i class='bi bi-globe' style='font-size:130%;margin-left:5px;color:grey;'></i><b>".$che_do." </b>";}
                    else{   echo "<i class='bi bi-lock' style='font-size:130%;margin-left:5px;color:grey;'></i><b>".$che_do." </b>";}
                    $sql1 = "SELECT ten_dang_nhap FROM thanh_vien_nhom  WHERE ma_nhom = '$ma_nhom'";
                    $result1 = $connect->query($sql1);
                    $numRows = $result1->num_rows;
                    echo    "<i class='bi bi-person'  style='font-size:130%;margin-left:50px;color:grey;'></i>".$numRows."</div></div> "; 
                    }}}$connect->close();?> 
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Tham gia hoặc tạo nhóm </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                        <input type="radio"  name="select" value="create-group" style='margin-left: 50px;'><b> Tạo nhóm  </b>
                        <input type="radio" name="select" value="join-group" style='margin-left: 150px;'><b> Tham gia nhóm </b>
                    <div id='create-group'>
                        <form method="POST" action="create_group.php" enctype="multipart/form-data"> 
                            <div class='avatar-group'>   
                                <i class= 'bi bi-file-earmark-plus'> </i>
                                <input type="file" name="image" id='fileInput' style='display:none'>
                                <div id="avatar-group" > </div>
                            </div>  
                            <div>
                                <div class="input-group">
                                    <label class="input-group-text" style='font-weight: bold' data-bs-toggle="tooltip"
                                    title="Không có ký tự đặc biệt, ít nhất 4 ký tự">Tên nhóm</label>
                                    <input type="text" id ='ten_nhom' name ='ten_nhom' class="form-control" >
                                </div><br>
                                <div class="input-group">
                                    <label class="input-group-text" style='font-weight: bold' data-bs-toggle="tooltip"
                                    title="Hãy chọn 1 trong 2" >Chế độ </label>
                                    <select name="che_do" class="form-select" id="che_do">
                                        <option value="Công khai"> Công khai</option>
                                        <option value="Riêng tư">Riêng tư</option>
                                    </select>
                                </div><br>
                                <div class="input-group loai_hinh">
                                    <label class="input-group-text" style='font-weight: bold' data-bs-toggle="tooltip"
                                    title="Hãy chọn 1 trong 2"> Loại hình </label>
                                    <select name="loai_hinh" class="form-select" id="loai_hinh">
                                        <option value="Nhóm">Nhóm</option>
                                        <option value="Lớp học">Lớp học</option>
                                    </select>
                                </div><br>
                                <!-- https://www.w3schools.com/bootstrap5/bootstrap_form_floating_labels.php -->
                                <div class="form-floating"> 
                                    <textarea class="form-control" id="comment" name="mo_ta" placeholder="Mô tả"></textarea>
                                    <label for="comment"> Mô tả</label>
                                </div><br>
                                <div class="d-grid">
                                    <button type="submit" name='submit' id='submit_create' class="btn btn-primary btn-block"> <-_-> Tạo ngay <-_-> </button>
                                </div>
                            </div>  
                        </form>
                    </div>
                    <div id='join-group' style='text-algin: center'>
                        <div class='avatar-group'>
                            <img  src='photo/join.png' alt='Join group' style='width:250px; height:auto; margin: 10px 0px 20px 0px;'>
                        </div>  
                        <div class="input-group">
                                <label class="input-group-text" style='font-weight: bold'>Mã nhóm</label>
                                <input type="text" id='ma_nhom' class="form-control" >
                        </div><br>
                        <div class="d-grid">
                                <button type="button" id='submit_join' class="btn btn-primary btn-block"> <-_-> Tham gia ngay <-_-> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="notice">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông báo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="text-align:center;font-weight:bold;color:red">
               <p id='notice_text'> <p>
            </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script> 
    document.querySelector('#createGroup').addEventListener('click', function () {
        fetch(`checkAccount.php`).then(response => response.text()).then(response => { 
            if(response.trim() != "guest" ){
                // Mở modal tạo hoặc tham gia nhóm
                var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                keyboard: false});
                myModal.show();
                document.querySelector('#create-group').style.display = 'none';
                document.querySelector('#join-group').style.display = 'none';
                // Truy vấn tất cả cả thẻ input có name = select 
                document.querySelectorAll('input[name="select"]').forEach(function(radio) {
                radio.addEventListener("change", function() {
                    var select = document.querySelector('input[name="select"]:checked').value;
                    if (select === 'create-group') {
                        document.querySelector('#join-group').style.display = 'none';
                        document.querySelector('#create-group').style.display = 'block'; 
                        document.querySelector('#submit_create').disabled = true; 
                        if(response.trim() === "student"){
                            document.querySelector('.loai_hinh').style.display = 'none';}
                        // Chọn tệp ( tải ảnh avatar group)
                        document.querySelector('.bi-file-earmark-plus').addEventListener('click', function() {
                            jQuery('.avatar-group').find('input[type="file"]').click();
                            document.getElementById('fileInput').addEventListener('change', function(event) {
                                var file = event.target.files[0];
                                if (file.type && !file.type.startsWith('image/')) {
                                    document.querySelector('.bi-file-earmark-plus').style.display='none';
                                    document.querySelector('#avatar-group').innerHTML = 'Ảnh không hợp lệ, vui lòng tải lại trang!'; 
                                    document.querySelector('#avatar-group').style.color = 'red';
                                    document.querySelector('#avatar-group').style.fontWeight = 'bold';}
                                else{var reader = new FileReader();
                                reader.onload = function(event) {
                                    var imageURL = event.target.result;
                                    var image = document.createElement('img');
                                    image.src = imageURL;
                                    image.style.maxWidth = '180px';  
                                    document.querySelector('.bi-file-earmark-plus').style.display='none';
                                    document.querySelector('#avatar-group').appendChild(image);};
                                reader.readAsDataURL(file);}
                                /*console.log('Đã chọn tệp:', input);*/  })});            
                    }if (select === 'join-group') {
                        document.querySelector('#create-group').style.display = 'none';
                        document.querySelector('#join-group').style.display = 'block'; 
                        document.querySelector('#submit_join').disabled = true; 
                        document.querySelector('#ma_nhom').addEventListener('keyup', function() {
                        var groupID = document.querySelector('#ma_nhom').value;
                        const check = /^[0-9]{7}$/;
                        if(check.test(groupID.trim()) === true)
                        {   document.querySelector('#submit_join').disabled = false;
                            document.querySelector('#submit_join').onclick = function() {
                            fetch(`searchGroup.php?groupID=`+groupID).then(response => response.text()).then(response => {
                                document.querySelector('#ma_nhom').value ='';
                                jQuery('#myModal').find('.btn-close').click();
                                var notice = new bootstrap.Modal(document.querySelector("#notice"));
                                notice.show();
                                if(response.trim() == 'Bạn chưa có trong nhóm'){
                                    var listPerson = [];listPerson.push(groupID);
                                    var ten_dang_nhap = "<?php echo $ten_dang_nhap; ?>";
                                    listPerson.push(ten_dang_nhap);
                                    const json = JSON.stringify(listPerson);
                                    fetch('addPerson.php', {
                                        method: 'POST', 
                                        headers: {  'Content-Type': 'application/json' },
                                        body: json ,})
                                    .then(response1 => response1.text())
                                    .then(response1 => {if (response1.trim() == 'Success'){
                                        document.querySelector('#notice_text').innerHTML= 'Tham gia nhóm thành công!';}
                                    else{ 
                                        document.querySelector('#notice_text').innerHTML= 'Tham gia nhóm thất bại';}})
                                }else{
                                    document.querySelector('#notice_text').innerHTML= response;}
                                })}
                        }else{document.querySelector('#submit_join').disabled = true;}})
                    }});});
                // Kiểm tra tên nhóm có trống hay không 
                document.querySelector('#ten_nhom').addEventListener('keyup', function() {
                    var ten_nhom = document.querySelector('#ten_nhom').value;
                    const regex = /[@#$%^&*()+\=\[\]{};':"\\|,.<>\/?]+/;   // Biểu thức kiểm tra ký tự đặc biệt
                    if (regex.test(ten_nhom) === false && ten_nhom.length >= 4){
                        document.querySelector('#submit_create').disabled = false; 
                    }else{
                        document.querySelector('#submit_create').disabled = true; }})
                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)})
            }else {
                var notice = new bootstrap.Modal(document.querySelector("#notice"));
                notice.show();
                document.querySelector('#notice_text').innerHTML = 'Bạn chưa đăng nhập. Vui lòng đăng nhập !';}})})
    listGroupId = []; 
    document.querySelectorAll(".group-box").forEach(function(e) {   
    listGroupId.push(e);
    e.addEventListener('click', function() {
        var group = e.dataset.click;
        window.location.href = "group.php?groupId=" + group;});}); 
    if(listGroupId.length <5){
        document.querySelector('footer').style.position = 'fixed';
        document.querySelector('footer').style.left = '0';
        document.querySelector('footer').style.bottom = '0';
    }
</script>
</html>