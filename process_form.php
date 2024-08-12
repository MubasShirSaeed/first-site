<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Instantiate PHPMailer
    $mail = new PHPMailer(true); // Passing true enables exceptions

    try {
        //Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output (set to 2 for more detailed debugging)
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'mubashi03077072161@gmail.com'; // Gmail username (your email address)
        $mail->Password = 'flcv libz ubdc abcy'; // Generated app password for 2FA
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, 'ssl' also accepted
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom($email, $name); // Sender's email address and name
        $mail->addAddress('mubashi03077072161@gmail.com', 'Recipient Name'); // Add a recipient

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'New message from contact form';
        $mail->Body    = "<p><b>Name:</b> {$name}</p>
                          <p><b>Email:</b> {$email}</p>
                          <p><b>Message:</b><br>{$message}</p>";

        $mail->send();
        $message1 = 'THANK YOU';
$message = 'Your Message has been sent';

// HTML and PHP mixed to create the card and button
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sent Confirmation</title>
    <style>
    body{
            background-color: rgb(58, 54, 54);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;}
        .body{
            font-family: "Javanese Text",serif;
            display:flex;
             justify-content: center;
             justify-items: center;
         }
        .card {
            background-color: #EABE67;
            color: #252D5E;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 20px auto;
            text-align: center;
             opacity: 0; /* Initially hidden */
            transform: scale(0.5); /* Initial size */
            animation: popOut 0.5s forwards cubic-bezier(0.2, 0.8, 0.2, 1);
            
        }
          @keyframes popOut {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #252D5E;
            color: white;
            text-decoration: none;
    
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body >
    <div class="body">
    <div class="card">
        <h3>'.$message1.'</h3>
        <p>' . $message . '</p>
        <a href="index.html" class="button">Back</a>
    </div>
    </div>
</body>
</html>';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} else {
    // Redirect back to the form if accessed directly
    header("Location: index.html");
    exit;
}
?>
