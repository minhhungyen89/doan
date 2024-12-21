<?php
    require "connect.php";
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require "PHPMailer-master/src/Exception.php"; 
    $emailQMK = $_GET['emailQMK'];
    $min = 100000; 
    $max = 999999;
    $random_number = mt_rand($min, $max);
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers     sandbox.smtp.mailtrap.io
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'email của bạn'; // SMTP username    9262747ab63cf0
        $mail->Password = 'sbay ybol wgnn meuj';   // SMTP password     c6bdaa17a54e8b
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL    TLS
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('email của bạn', 'PBSKIDS' ); 
        $mail->addAddress($emailQMK); 
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư mã xác nhận';
        $noidungthu = 'PBS-'.$random_number.' là mã xác nhận PBSKIDS của bạn.'; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true)));
        $mail->send();
        echo $random_number;
        } catch (Exception $e) {
           echo 'Error: ', $mail->ErrorInfo;}?>
