<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
session_start();
$receiver=$_SESSION["email"];
$subject="Verification for Instagram";
$body=$_SESSION["otp"];
//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "youknowme1008@gmail.com";                 // SMTP username
    $mail->Password = "9879685539";                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom("youknowme1008@gmail.com", "youknowme1008@gmail.com");
    $mail->addAddress("$receiver", 'receiver');     // Add a recipient
 //   $mail->addReplyTo('info@example.com', 'Information');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "$subject";
    $mail->Body    = "Your OTP is $body";
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("Message has been sent");location="../home.html";</script>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ',$mail->ErrorInfo;

}