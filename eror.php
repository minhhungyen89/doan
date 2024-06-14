<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Truy cập không đúng !</title>
    <style>
        body{
            width:100%;
        }
        #image_eror{
            width:100%;
            display:flex;
            justify-content: center;
        }
        #image_eror img{
            width:65%;
        }
    </style>
</head>
<body>
<?php require 'layout.php'; ?>
<div id ='image_eror'>
    <img src = 'photo/404.jpg' alt='404'>
</div>
<?php require 'footer.php'; ?>
</body>
</html>