<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bài Viết </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet"  href="baiviet.css">
    <link rel='icon' href="icon.jpg" type image/x-icon">
</head>
<body>
    <?php require 'layout.php'; ?>
    <div id="demo" class="carousel slide p-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner" style="max-height:200px;">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <div class="p-3 border text-center" style = "background: rgb(233, 233, 233); max-width:70%;border-radius: 25px;">
                        <h3> Thông báo lễ tổng kết học kì II năm 2023 - 2024 </h3>
                        <p class="truncate-div">  Thông báo đến toàn thể học sinh và các vị phụ huynh về lễ tổng kết học kỳ II năm học 2023-2024. Buổi lễ sẽ được khai mạc vào lúc 8h sáng ngày 28/5/2024 tại hội trường lớn của nhà trường. 
                               Kính mời quý phụ huynh và các em học sinh tham dự đầy đủ và đúng giờ. Trân trọng ! </p> 
                               <span style="position: relative;left:350px; top:0px;font-size: 14px;"> 15:30 20/6/2024 </span>  
                    </div>
                </div>    
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <div class="p-3 border text-center" style = "background: rgb(233, 233, 233);max-width:70%;border-radius: 25px;">
                        <h3> Kết quả thi khảo sát cuối kì II năm 2023 - 2024 </h3>
                        <p class="truncate-div">  Thông báo cho toàn thể các em học sinh và các vị phu huynh. Kết quả thi cuối kì 2 đã có, quý phụ huynh và các em học sinh có thể tra cứu kết quả thi trên trang web của trường. Nếu có bất kỳ thắc mắc về điểm, quý phụ huynh vui lòng tới phòng A113 nhà trường để làm thủ tục phúc khảo.  </p>   
                        <span style="position: relative;left:350px; top:0px;font-size: 14px;"> 10:30 1/6/2024 </span>
                    </div>
                </div> 
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <div class="p-3 border text-center" style = "background: rgb(233, 233, 233); max-width:70%;border-radius: 25px;">
                        <h3> Lịch thi khảo sát cuối kì II năm 2023 - 2024  </h3>
                        <p class="truncate-div">  Thông báo cho toàn thể các em học sinh và các vị phu huynh. Lịch thi cuối kì II sẽ diễn ra từ 13-20/6/2024, lịch thi cụ thể của từng học sinh đã được thông báo trên nhóm lớp PBSKIDS. Mong các quý phụ huynh chú ý bảo ban các em ôn tập và đến thi đúng giờ ! </p>   
                        <span style="position: relative;left:350px; top:0px;font-size: 14px;"> 15:00 1/5/2024 </span>
                    </div>
                </div>  
            </div>
        </div>  
        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" style="background-color: grey;" ></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon" style="background-color: grey;"></span>
        </button>
    </div>
    <h3 class="title-documents">Bài Viết Nổi Bật</h3>
            <div class="documents-content">
                <div class="content-item-left">
                    <div class="content-left">
                        <div class="left-img">
                            <img id = "img-left" src="photo/book.jpg" alt="book">
                        </div>
                        <div class="content">
                            <h2> Những cuốn sách tranh dạy trẻ đúng giờ </h2>
                            <p>Đối với rất nhiều đứa trẻ, kỹ năng quản lý thời gian tốt thể hiện ở việc biết sắp xếp hoạt động để luôn đúng giờ.
                                Chính vì thế,..............
                            </p>
                            <input type="submit" value ="Xem thêm" class="readmore">
                        </div>
                    </div>
                    <div class="content-left">
                        <div class="left-img">
                            <img id = "img-left" src="photo/study.jpg" alt="study" >
                        </div>
                        <div class="content">
                            <h2>Làm thế nào để xử lý thói quen trì hoãn của trẻ?</h2>
                            <p>Bé chỉ làm bài tập về nhà vào phút cuối hoặc luôn trì hoãn hoàn thành việc cần làm khiến bạn lo lắng.  
                                Để xử lý thói quen xấu này,................</p>
                            <input type="submit" value ="Xem thêm" class="readmore">
                        </div>
                    </div>
                </div>
                <div class="content-item-right">
                    <div class ="content-right">
                        <div class="right-img">
                            <img id = "right-img" src="photo/pomodoro.jpg" alt="pomodoro" >
                        </div>
                        <div class="content">
                            <h3>5 cách áp dụng phương pháp Pomodoro với trẻ</h3>
                            <p>Được sáng tạo bởi một CEO người Ý từ năm 1980, Pomodoro giúp trẻ quản lý thời gian và tăng hiệu quả học tập, làm việc.</p>
                            <input type="submit" value ="Xem thêm" class="readmore">
                        </div>
                    </div>
                    <div class ="content-right">
                        <div class="right-img">
                            <img id = "right-img" src="photo/idea.jpg" alt="idea" >
                        </div>
                        <div class="content">
                            <h3>Các kỹ năng học tập cần biết với trẻ Tiểu học</h3>
                            <p>Học cách học, hoàn thành bài tập về nhà và ôn tập là những kỹ năng thiết yếu khi trẻ dần bước vào những năm cuối Tiểu học.</p>
                            <input type="submit" value ="Xem thêm" class="readmore">
                        </div>
                    </div>
                </div>
            </div>
        <?php require 'footer.php'; ?>
</body>
</html>