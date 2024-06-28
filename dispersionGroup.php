    <div class="container mt-5">
        <div class="btn-container">
            <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#content1"> Nâng cấp thành viên </button>
            <button class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#content2">Xóa thành viên </button>
            <button class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#content3">Chỉnh sửa thông tin </button>
            <button class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#content4">Hạ cấp thành viên </button>
        </div>
        <div id="content1" class="collapse mt-3">
        <?php  
             session_start();
             require "connect.php"; 
             $groupId = $_GET['groupId'];
             $ten_dang_nhap = $_SESSION['ten_dang_nhap'];
            mysqli_set_charset($connect,'UTF8');
            $sql = "SELECT ten_dang_nhap FROM thanh_vien_nhom WHERE ma_nhom = '$groupId' and chuc_vu = '0'and ten_dang_nhap != '$ten_dang_nhap'";
            $result = $connect->query($sql);
            echo "<form method='POST' action='updateMember.php'>";
            echo "<input type='hidden' value='goUp' name='position'/>";
            echo "<input type='hidden' value='".$groupId."' name='groupId'/>";
            echo '<label for="sel1" class="form-label h4"> Chọn thành viên cần thăng cấp: </label><select class="form-select" id="sel1" name="member">';
            for($i=0;$i<$result->num_rows;$i++)
                {
                    $row = $result -> fetch_assoc();
                    echo "<option required value='".$row['ten_dang_nhap']."'>".$row['ten_dang_nhap']."</option>";
            } echo "</select>";
            echo '<button type="submit" name="submit" class="btn btn-primary mt-3">Thăng cấp</button></form>';
           $connect->close()?>
        </div>
        <div id="content2" class="collapse mt-3">
        <?php  
            require "connect.php"; 
            $groupId = $_GET['groupId'];
            mysqli_set_charset($connect,'UTF8');
            $sql = "SELECT ten_dang_nhap FROM thanh_vien_nhom WHERE ma_nhom = '$groupId' and chuc_vu != '2' and ten_dang_nhap != '$ten_dang_nhap'";
            $result = $connect->query($sql);
            echo "<form method='POST' action='deleteMember.php'>";
            echo "<input type='hidden' value='".$groupId."' name='groupId'/>";
            echo '<label for="sel1" class="form-label h4"> Chọn thành viên muốn xóa : </label><select class="form-select" id="sel1" name="sellist1">';
            for($i=0;$i<$result->num_rows;$i++)
                {
                    $row = $result -> fetch_assoc();
                    echo "<option required value='".$row['ten_dang_nhap']."'>".$row['ten_dang_nhap']."</option>";
            } echo "</select>";
            echo '<button type="submit" name="submit" class="btn btn-primary mt-3">Xóa bỏ </button></form>';
           $connect->close()?>
        </div>
        <div id="content3" class="collapse mt-3">Tính năng đang nâng cấp !</div>
        <div id="content4" class="collapse mt-3">
        <?php  
             require "connect.php"; 
             $groupId = $_GET['groupId']; 
            mysqli_set_charset($connect,'UTF8');
            $sql = "SELECT ten_dang_nhap FROM thanh_vien_nhom WHERE ma_nhom = '$groupId' and chuc_vu = '1' and ten_dang_nhap != '$ten_dang_nhap'";
            $result = $connect->query($sql);
            echo "<form method='POST' action='updateMember.php'>";
            echo "<input type='hidden' value='down' name='position'/>";
            echo "<input type='hidden' value='".$groupId."' name='groupId'/>";
            echo '<label for="sel1" class="form-label h4"> Chọn thành viên cần hạ cấp: </label><select class="form-select" id="sel1" name="member">';
            for($i=0;$i<$result->num_rows;$i++)
                {
                    $row = $result -> fetch_assoc();
                    echo "<option required value='".$row['ten_dang_nhap']."'>".$row['ten_dang_nhap']."</option>";
            } echo "</select>";
            echo '<button type="submit" name="submit" class="btn btn-primary mt-3">Hạ cấp</button></form>';
           $connect->close()?>
        </div>
    </div>

