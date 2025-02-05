<?php
require 'php-mailler/PHPMailer.php';
require 'php-mailler/SMTP.php';
require 'php-mailler/Exception.php';


function sendEmailFromForm($name, $email, $subject, $message) {
  $receiving_email_address = 'abdullahalbaki009@gmail.com'; // Replace with your receiving email address

  $mail = new PHPMailer;
  
  $mail->isSMTP();
  $mail->Host = 'smtp-relay.brevo.com'; // Your SMTP server hostname
  $mail->SMTPAuth = true;
  $mail->Username = 'alaminsarkar177@gmail.com'; // Your SMTP username
  $mail->Password = 'grRJzOMvN8j3PXIZ'; // Your SMTP password
  $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
  $mail->Port = 587; // SMTP port
  
  $mail->setFrom($email, $name);
  $mail->addAddress($receiving_email_address);
  $mail->Subject = $subject;
  $mail->Body = $message;
  
  if ($mail->send()) {
    return true;
  } else {
    return 'An error occurred while sending the email: ' . $mail->ErrorInfo;
  }
}

// Example usage
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$result = sendEmailFromForm($name, $email, $subject, $message);

if ($result === true) {
  echo 'Email sent successfully!';
} else {
  echo 'An error occurred: ' . $result;
}
?>
