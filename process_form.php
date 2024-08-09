<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoload.php file
require 'vendor/autoload.php'; // Adjust the path as necessary if you're using Composer

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
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
} else {
    // Redirect back to the form if accessed directly
    header("Location: index.html");
    exit;
}
?>
