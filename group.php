<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href="icon.jpg" type image/x-icon">
    <?php   
    require 'connect.php';
    $groupId = $_GET['groupId'];
    mysqli_set_charset($connect,'UTF8');
    $sql = "SELECT * FROM nhom WHERE ma_nhom = '$groupId'";
    $result = $connect->query($sql);
    $row = $result -> fetch_assoc();
    $ten_nhom = $row['ten_nhom'];
    $avatar = $row['avatar'];
    echo "<title>".$ten_nhom."</title>";?>
<style>
.background-div {
    background-size: cover; 
    background-position: center;
    height:auto;
}
.person-list {
    max-width: 500px;
    max-height: 330px; 
    overflow-y: scroll; }
#showGroup{
    width: 100%;
    height: 465px;
    overflow-y: scroll;
    padding: 0PX 5px;
}
/* Thanh cuộn */
::-webkit-scrollbar{
    width: 10px;
    background-color:#f1efef;
}
::-webkit-scrollbar-thumb{
    background-color:lightgrey;
    border-radius:5px;
}
.select-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.select-list li:hover{
    background-color: #e0e0e0;
}
.select-list div {
    display: inline-block;
    padding: 5px 10px;
    cursor: pointer;
    width: 99%;
}
.personName{
    font-weight:bold;
    font-size:120%;
}
.personID{
    font-size:110%;
}
.select:hover{
    background-color: lightgrey;
    color:black;
    cursor: pointer;}
#inputBox {
    width: 650px;
    padding: 10px;
    box-sizing: border-box;
    resize: none; /* Không cho phép thay đổi kích thước */
    height: 40px; 
    position: relative;
    overflow: hidden; /* Ẩn thanh cuộn */
    line-height: 1.5em; /* Độ rộng giữa 2 dòng */
    transition: margin-top 0.3s ease; /* Hiệu ứng chuyển đổi */}
#inputBox.long-text {   
    overflow-y: auto; 
    height: 80px; 
    margin-top: -50px; }
.flex-row{
    color: grey;
    cursor: pointer;}
.flex-row:hover{
    color: black;}
#boxInput{
    position:fixed;
    bottom:10px;
    left:345px;
    height:40px;
    display:none;
}
</style>
</head>
<body id='body'> 
<?php require 'layout.php'; 
  mysqli_set_charset($connect,'UTF8');
$sql1 = "SELECT chuc_vu FROM thanh_vien_nhom WHERE ma_nhom = '$groupId' and ten_dang_nhap = '$ten_dang_nhap'";
$result1 = $connect->query($sql1);
$row1 = $result1 -> fetch_assoc();
$chuc_vu = $row1['chuc_vu']; 
echo '<input type="hidden" id="chuc_vu" value="'.$chuc_vu.'"/>';
?>
<div class="container-fluid  text-center">
    <div class="row">
        <div class=" col-sm-3 text-muted flex-column-reverse" style='background-color: #f1efef;'>
            <div class="mb-3 mt-2 align-items-center d-flex" onclick='window.history.back();' style='cursor: pointer;'>
                <div style='margin-left:60px;' class='p-2'> <i class="bi bi-chevron-compact-left"></i></div> 
                <div class='p-2'>Tất cả các nhóm </div> </div>
            <div class="p-1 border border-end-0 border-start-0 ">
                <?php   echo "<img style='height:100px;' class='rounded ' src='avatar/group/".$avatar."' alt='avatar group'>"; ?>
            </div>
            <div class="p-2 mt-3 select" data-select="home"> Trang chủ </div>
            <div class="p-2 select" data-select="post" > Bài đăng </div>
            <div class="p-2 select" data-select="call"> Cuộc họp </div>
            <div class="p-2"> Bài tập </div>
            <div class="p-2"> Điểm </div>
            <div class="p-2"data-bs-toggle="collapse" data-bs-target="#demo">Tính năng <i class="bi bi-caret-down"></i></div>
            <div id="demo" data-select="personGroup" class="collapse p-2 select">
                Thành viên nhóm
            </div>
            <div id="demo" class="collapse p-2">
                Rời khỏi nhóm
            </div>
            <div id="demo" class="collapse p-2">
                Giải tán nhóm
            </div>
        </div>
        <div class="col-sm-9 flex-column-reverse bg-light" style="border-left:1px solid grey;">
            <?php
                echo '<div class="d-flex mb-3" style="border-bottom:1px solid lightgrey;">';
                echo '<div class="align-items-center d-flex">';
                echo "<div class='p-1'><img style='height:50px;' class='rounded' src='avatar/group/".$avatar."' alt='avatar group'></div>";
                echo'<div title="'.$ten_nhom.'" style=" cursor: pointer;">
                <h4 class="text-truncate " style="width:400px;text-align:left; margin-left:10px;" >'.$ten_nhom.'</h4></div></div>'; ?>
                <div class="flex-fill text-muted align-items-center d-flex" style='font-size:115%'>
                     <div class="p-2 ms-auto meeting"> <i class="bi bi-camera-video"></i></div>
                    <div class="p-2 meeting" >Họp ngay </div>
                    <div class="p-̀̀̀2 addPerson"style='margin-left:30px;' ><i class="bi bi-person-add"></i></div>                        
                    <div class="p-2 addPerson" > Thêm thành viên </div>
                </div>
        </div>
        <div class="p-1  flex-fill" id="showGroup"></div>
        <div style="position:fixed;bottom:10px;left:320px;display:none;" id="footer">
            <button type="button" class="btn btn-primary" id="writePost">
            <i class="bi bi-pencil-square"></i> Cuộc hội thoại mới </button>
        </div>
        <div class="flex-row" id="boxInput">
            <div class="p-1" style="margin-right:10px;"><i class="bi bi-plus-circle" style="font-size:130%;"></i></div>
            <div class="p-1" style="margin-right:10px;"><i class="bi bi-image" style="font-size:130%;"></i></div>
            <div class="p-1" style="margin-right:10px;"><i class= 'bi bi-file-earmark-plus' style="font-size:130%;"> </i></div>
            <textarea id="inputBox" placeholder="Aa" class="form-control"></textarea>
                <i class="bi bi-emoji-smile p-2" style="font-size:120%;position:relative;left:-40px"></i>
                <i class="bi bi-send p-2" style="font-size:120%;position:relative;left:-30px"></i>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" style="height: 1000px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                    echo '<div class="modal-title" style="font-weight: bold;">Thêm thành viên vào ' . $ten_nhom . '</div>';
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="height: 435px;">
                <p> Nhập tên đăng nhập hoặc tên học sinh vào ô tìm kiếm </p>
                <input type="text" id="searchPerson" class="form-control" placeholder="Tìm kiếm"> 
                <div style='position: relative;'>
                    <div id='selectPerson' style='position: absolute; z-index: 2;'>
                    </div>
                    <div class="toast" style='position: absolute; z-index: 2;' >
                        <div class="toast-header">
                            <strong class="me-auto">Thông báo </strong>
                        </div>
                        <div class="toast-body">
                            <p id='toastNotice'></p>
                        </div>
                    </div>
                    <div class="person-list" style='position: relative; z-index: 1;'> 
                    <ul  class="select-list" id='Person'> </ul> </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class=" btn btn-light btn-block"> Hủy bỏ </button>
                <button type="button"  id='addPerson' class=" btn btn-primary btn-block"> Thêm thành viên</button>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
var groupId = "<?php echo $groupId; ?>"; 
document.querySelector('#body').style.display = 'none';
    fetch(`checkAccount.php`).then(response => response.text()).then(response => { 
        if(response.trim() != "guest" ){
            fetch(`searchGroup.php?groupID=`+groupId).then(response => response.text()).then(response => {
                if(response.trim() != "Bạn chưa có trong nhóm" ){
                    document.querySelector('#body').style.display = 'block';
                }else{
                    window.location.href = "eror.php";
                }})}
        else{   window.location.href = "eror.php";}})
document.querySelectorAll(".meeting").forEach(function(e) {
    e.addEventListener('click', function(event) {
        event.preventDefault();
        var windowFeatures = "width=1000,height=500,left=150,top=50,toolbar=no,location=no";
        let url = `meeting.php?groupID=${encodeURIComponent(groupId)}`;
        window.open(url, '_blank',windowFeatures);
        });
});
//  click vào Thêm thanh viên 
const chuc_vu = document.querySelector('#chuc_vu').value;
document.querySelectorAll(".addPerson").forEach(function(e) {
    e.addEventListener('click', function() {
    if(chuc_vu != 0){
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false});
            myModal.show();
    }else{
        var myModal = new bootstrap.Modal(document.getElementById('notice'), {
            keyboard: false});
            myModal.show();
        document.querySelector('#notice_text').innerHTML = 'Bạn không thể thêm thành viên vào nhóm ! ';
    }});});
//  Chức năng tìm kiếm ở phần thêm thành viên  
var listPerson = []; listPerson.push(groupId); var typingTimer;
document.querySelector("#searchPerson").addEventListener('keyup', function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping,2504);}); 
document.querySelector("#searchPerson").addEventListener('keydown', function () {
    clearTimeout(typingTimer);});
function doneTyping() { 
    var searchPerson = document.querySelector("#searchPerson").value;
    if ( searchPerson != ""){   
        fetch(`layAccount.php?person=${searchPerson}`).then(response => response.text())
            .then(response => { 
                document.querySelector('#selectPerson').style.display = 'block';
                document.querySelector('#selectPerson').innerHTML = response;
                document.querySelectorAll(".optionPerson").forEach(function(e) {
                e.addEventListener('click', function() {
                    var personID = e.dataset.person;
                    var personName = e.dataset.name;
                    var personAvatar = e.dataset.avatar;
                    fetch(`checkMember.php?groupId=${groupId}&personID=${personID}`)
                    .then(response => response.text()).then(response => {
                        if (response.trim() === ''){
                            const li = document.createElement('li');
                            var parentDiv = document.createElement("div");
                            parentDiv.classList.add("d-flex");
                            var childDiv1 = document.createElement("div");
                            childDiv1.classList.add("background-div","rounded-circle");
                            childDiv1.style.backgroundImage = "url(avatar/account/" + personAvatar + ")";
                            childDiv1.style.width = '20%';
                            var childDiv2 = document.createElement("div");
                            childDiv2.classList.add("d-flex","flex-column");
                            childDiv2.style.width = '65%';
                            var childDiv3 = document.createElement("div");
                            childDiv3.classList.add("personName",);
                            childDiv3.innerHTML = personName;
                            var childDiv4 = document.createElement("div");
                            childDiv4.classList.add("personID");
                            childDiv4.innerHTML = personID; listPerson.push(personID);
                            var childDiv5 = document.createElement("div");
                            childDiv5.classList.add("d-flex","justify-content-center","align-items-center","exit" );
                            childDiv5.style.width = '15%';
                            childDiv5.dataset.idPerson = personID;
                            childDiv5.innerHTML = '<i class="bi bi-x-lg"></i>';
                            childDiv5.style.fontSize = '45px';
                            parentDiv.appendChild(childDiv1);parentDiv.appendChild(childDiv2);
                            childDiv2.appendChild(childDiv3);childDiv2.appendChild(childDiv4);
                            parentDiv.appendChild(childDiv5);;li.appendChild(parentDiv);
                            document.querySelector('#Person').append(li);
                            document.querySelector('#selectPerson').style.display = 'none'; 
                            document.querySelectorAll(".exit").forEach(function(e) {
                            e.addEventListener('click', function() {
                                var idPerson = e.dataset.idPerson;
                                listPerson.splice(listPerson.indexOf(idPerson), 1);
                                // Xóa phần tử li chưa nút x
                                this.parentElement.remove();})})
                        }else{
                            document.querySelector('#selectPerson').style.display = 'none';
                            document.querySelector('#toastNotice').innerHTML = personName + ' đã vào nhóm ngày: ' + response;
                            // https://www.w3schools.com/bootstrap5/tryit.asp?filename=trybs_toast&stacked=h
                            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
                            var toastList = toastElList.map(function(toastEl) {
                                return new bootstrap.Toast(toastEl)})
                            toastList.forEach(toast => toast.show())    }})
                    });});});
    }else{document.querySelector('#selectPerson').innerHTML = '';}}
// Thêm thành viên: Kiểm tra thành viên + thêm vào cơ sở dữ liệu
document.querySelector("#addPerson").addEventListener('click', function () {
        if(listPerson.length > 0){              //console.log(listPerson);
            const json = JSON.stringify(listPerson);
            fetch('addPerson.php', {
                method: 'POST', 
                headers: {  'Content-Type': 'application/json' },
                body: json ,})
            .then(response => response.text())
            .then(response => {if (response.trim() == 'Success'){
                swal("Thêm thành viên thành công !","","success");
                setInterval(function() { location.reload(); }, 2004);}
            else{ 
                swal("Thêm thành viên thất bại !","","error");
                setInterval(function() { location.reload(); }, 2004);}})
        }else{
            document.querySelector('#toastNotice').innerHTML = 'Không có người nào được thêm vào nhóm !';
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl)})
                toastList.forEach(toast => toast.show())        }})
// Trang home, post, call của nhóm 
document.querySelectorAll('.select').forEach(function(e){
    e.onclick = function(){
        var address = e.dataset.select;
        // document.querySelector('#showGroup').style.display = 'block';
        document.querySelector('#footer').style.display = 'none'; 
        document.querySelector('#boxInput').style.display = 'none'; 
        e.style.backgroundColor = 'lightgrey';
        const addresses = ['home', 'post', 'call','personGroup'];
        for (let i = 0; i < addresses.length; i++) {
        if (address !== addresses[i]) {
            document.querySelector(`[data-select="${addresses[i]}"]`).style.backgroundColor = '#f1efef';}}
        if(address == "post"){
            document.querySelector('#footer').style.display = 'block';
            // document.querySelector('#showGroup').style.display = 'flex';
            // document.querySelector('#showGroup').classList.add("flex-column-reverse");
               // Cuộn thanh scroll 
        var myContainer = document.getElementById('showGroup');
        myContainer.addEventListener('scroll', function() {
           if (myContainer.scrollTop === 0) {
            var time = document.getElementById('post2').innerText;
            console.log(time);
            fetch(`${address}.php?groupId=${groupId}&time=${time}`).then(response => response.text())
            .then(response => { 
                var newDiv = document.createElement('div');
                // parentDiv.classList.add("d-flex");
                newDiv.innerHTML = 'm';
                var currentDiv = document.getElementById('showGroup');
                currentDiv.insertBefore(newDiv, currentDiv.firstChild);})
           }})
        } 
        fetch(`${address}.php?groupId=`+groupId).then(response => response.text())
            .then(response => { document.querySelector("#showGroup").innerHTML = response;})
     
        }})

           
// Cuộc hội thoại mới
document.querySelector("#writePost").addEventListener('click', function () {
        document.querySelector('#footer').style.display = 'none';
        document.querySelector('#boxInput').style.display = 'flex'; })
// Nhập cuộc hội thoại mới
const inputBox = document.getElementById('inputBox');
inputBox.addEventListener('input', () => {
    if (inputBox.value.length > 100) {
        inputBox.classList.add('long-text');
    } else {
        inputBox.classList.remove('long-text');}});
// Gửi post 
document.querySelector(".bi-send").addEventListener('click', function () {
    var inputBox = document.querySelector("#inputBox").value.trim();
    var ten_dang_nhap = "<?php echo $ten_dang_nhap; ?>"; 
    if(inputBox != ""){
        var post = [];      
        post.push(groupId);    post.push(ten_dang_nhap);   post.push(inputBox);
        const json = JSON.stringify(post);
        fetch('savePost.php', {
            method: 'POST', 
            headers: {  'Content-Type': 'application/json' },
            body: json ,})
        .then(response => response.text())
        .then(response => {console.log(response);})
    }})
</script>
</body>
</html>