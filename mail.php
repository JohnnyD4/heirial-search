<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $comments = $_POST['comments'];

  $message = '
  <html>
      <head>
          <title>Title Here</title>
      </head>
      <body>
      <p>Name: ' . $name . '</p>
      <p>Email Address: ' . $email . '</p>
      <p>Phone Number: ' . $phone . '</p>
      <p>Comments: ' . $comments . '</p>
  ';

  $message = wordwrap($message, 70);
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <noreply@KOPhotos.com>' . "\r\n";

  mail('jdavis@launchthat.com', 'New Client on Site', $message, $headers);
?>