<?php 
            require 'connect.php';
            $groupId = $_GET['groupId'];
            mysqli_set_charset($connect,'UTF8');    
                $sql = "SELECT post.gio_dang,post.content,post.urlImage,nguoi_dung.avatar,thong_tin_ca_nhan.ho_va_ten
                FROM post   INNER JOIN  nguoi_dung ON nguoi_dung.ten_dang_nhap = post.nguoi_dang
                INNER JOIN thong_tin_ca_nhan ON thong_tin_ca_nhan.ten_dang_nhap = nguoi_dung.ten_dang_nhap
                WHERE post.ma_nhom = '$groupId' AND post.gio_dang <= NOW() ORDER BY post.gio_dang DESC ; "; // ASC: giảm dần
            $result = $connect->query($sql); 
            if ($result->num_rows == 0)     {   echo '<h3 class="text-center"> Chưa có bài đăng nào ! </h3>';  } 
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
                        if ($row['urlImage'] != ''){
                            echo '<div class="card-image col-sm-3">'; 
                            echo '<img src="'.$row['urlImage'].'" class="img-thumbnail img-fluid"></div>';
                            echo '<p class="card-text text-start">'.$row['content'].'</p></div>';
                        }else{
                        echo '<p class="card-text text-start fw-bold">'.$row['content'].'</p></div>';}
                        echo '      </div></div><div class="col-sm-1 flex-grow-1"></div></div>';}
                    }
                        
            $connect->close();?>