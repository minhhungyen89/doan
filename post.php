<?php 
            require 'connect.php';
            $groupId = $_GET['groupId'];
            mysqli_set_charset($connect,'UTF8');
            if (isset($_GET['time']) && !empty($_GET['time'])) { $time = $_GET['time']; 
                $gio_dang = date('Y-m-d H:i', strtotime(str_replace('/', '-', $time)));
                $sql = "SELECT post.gio_dang,content.content,nguoi_dung.avatar,thong_tin_ca_nhan.ho_va_ten
                    FROM post   INNER JOIN content ON content.id_post = post.id_post    INNER JOIN  nguoi_dung ON nguoi_dung.ten_dang_nhap = post.nguoi_dang
                    INNER JOIN thong_tin_ca_nhan ON thong_tin_ca_nhan.ten_dang_nhap = nguoi_dung.ten_dang_nhap
                    WHERE post.ma_nhom = '$groupId' AND post.gio_dang <= '$gio_dang' ORDER BY post.gio_dang DESC LIMIT 3; "; } // ASC: giảm dần
            else{    
                $sql = "SELECT post.gio_dang,content.content,nguoi_dung.avatar,thong_tin_ca_nhan.ho_va_ten
                FROM post   INNER JOIN content ON content.id_post = post.id_post    INNER JOIN  nguoi_dung ON nguoi_dung.ten_dang_nhap = post.nguoi_dang
                INNER JOIN thong_tin_ca_nhan ON thong_tin_ca_nhan.ten_dang_nhap = nguoi_dung.ten_dang_nhap
                WHERE post.ma_nhom = '$groupId' AND post.gio_dang <= NOW() ORDER BY post.gio_dang DESC LIMIT 3; "; } // ASC: giảm dần
            $result = $connect->query($sql); 
            if ($result->num_rows == 0)     {   echo 'Lỗi';  } 
            else{
                for($i=0;$i<$result->num_rows;$i++) 
                {    $row = $result -> fetch_assoc();
                    $gio_dang = date('H:i d/m/Y', strtotime($row['gio_dang']));
                        echo '<div class="row mt-2" style="padding:0;width:99%;">';
                        echo '<div class="col-sm-1 flex-grow-1" >';
                        echo '<img src="avatar/account/'.$row['avatar'].'" class="rounded-circle img-fluid"></div>';
                        echo '<div class="col-sm-10" style="padding:0"><div class="card">';
                        echo '<div class="card-header d-flex border-bottom-0" style="padding:0;background:white;">';
                        echo '<div class="p-2 fw-bold" style="font-size:115%;">'.$row['ho_va_ten'].'</div>';
                        echo '<div class="p-2">  </div><div class="p-2">  </div>';
                        echo '<div class="p-2"id="post'.$i.'">'.$gio_dang.'</div>';
                        echo '<div class="p-2"></div></div>';
                        echo '<div class="card-body" style="padding:0px 10px 0px 20px;">';
                        echo '<h4 class="card-title text-start"> Tiêu đề post </h4>';
                        echo '<div class="card-image col-sm-3">'; 
                        echo '<img src="icon.jpg" class="img-thumbnail img-fluid"></div>';
                        echo '<p class="card-text text-start">'.$row['content'].'</p></div>';
                        echo '      
            </div>
        </div>
        <div class="col-sm-1 flex-grow-1">
        </div>
    </div>';}
                    }
                        
            $connect->close();?>
            <!-- <div class="d-flex flex-column card-footer bg-light">
                    <div class="p-1 bg-info text-start"> Có 3 tin nhắn </div>
                    <div class=" bg-primary text-start" style="font-size:95%;">
                        <i class="bi bi-arrow-return-left"></i> Trả lời</div>
                </div> -->