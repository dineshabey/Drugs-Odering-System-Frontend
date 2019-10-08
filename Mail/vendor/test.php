<?php
echo '<style>.topbar { display:none;}</style>';
$page = '1';
//$name = ($_POST['name']);
//$phone1 = ($_POST['phone1']);
//$phone2 = ($_POST['phone2']);
//$address = ($_POST['address']);
//$i_name = ($_POST['i_name']);
//$quantity = ($_POST['quantity']);
$name = "Test Mail";
$phone1 = "07656565";
$phone2 = "07656565";
$address = "07656565";
$i_name = "07656565";
$quantity = "07656565";


 $full_mail = 'Item :' . $i_name . '<br>'.'Customer Name :' . $name . '<br>' . 'Quantity :' . $quantity . '<br>' . 'Phone No 1:' . $phone1 . '<br>' . 'Phone No 2:' . $phone2 . '<br>' . 'Address:' . $address . '<br>';

//GO TO GMAIL SETTING & ON THIS SERVICES
//https://myaccount.google.com/u/0/lesssecureapps?pli=1
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'autoload.php';
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
//    $mail->Username = 'mdccitsolution@gmail.com';                 // SMTP username
//    $mail->Password = 'Icecream#';                           // SMTP password
    $mail->Username = 'lionminimart@gmail.com';                 // SMTP username
    $mail->Password = 'lion3310';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('dinabeysinghe@gmail.com', 'Mill');
    $mail->addAddress('dinabeysinghe@gmail.com');     // Add a recipient
    //  $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    //Attachments
    //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $name;
    $mail->Body = '<HTML><h1>' . $full_mail . '<h1></Htaml>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    if ($page == 1) {
       $confirm_msg = 200;
       
       echo $confirm_msg;
       
//        echo '<script>window.location.href = "../../index.php?Name=MyValue'";</script>';
//        echo '<script>window.location.href = "../../index.php?msg=200";</script>';
        
    }else{
        
//        echo '<script>window.location.href = "../../index.php";</script>';  
    }

    exit();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
//    header('Location: ../../index.php');
}
