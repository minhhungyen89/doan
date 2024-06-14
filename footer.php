<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        footer {
            width:100%;
            border-top: 1px solid lightgrey;
            background-color: lightgrey;
        }
        .footer-content {
            padding-top: 10px;
            display: flex;
        }
        .footer-content--item {
            width: 35%;
            margin-left: 5px;
            position: relative;
        }
        .name-web {
            font-size: 50px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            color: rgb(16, 71, 148);
            text-align: center;
        }
        .version {
            position: absolute;
            top: 65px; 
            left: 150px; 
            color: red;
            text-align: center;
            font-size: 130%;
            }
        .title-footer {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <footer>
        <div class="footer-content">
            <div class="footer-content--item">
            <p class="name-web">PBS KIDS</p>
            <span class="version">ver 1.5.4</span>
            </div>
            <div class="footer-content--item">
                <h4 class="title-footer">Liên hệ</h4>
                <div class="box">
                    <p><i class="bi bi-telephone"></i> Số điện thoại: 0344677200</p>
                    <p><i class="bi bi-envelope"></i> Email: pbskidshumg@gmail.com</p>
                </div>
            </div>
            <div class="footer-content--item">
                <h4 class="title-footer">Địa chỉ</h4>
                <div class="box">
                    <p>Cơ quản chủ quản: Trường Đại Học Mỏ Địa Chất </p>
                    <p>Văn phòng: Phòng 401,Trường Đại Học Mỏ Địa Chất</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>