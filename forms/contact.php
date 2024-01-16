<?php
 $to = 'binesschama1127@gmail.com';
 $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
 $from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
 $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
 $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
 $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
 
 if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
   $headers = [
     'From' => ($name ? "<$name> " : '') . $from,
     'Phone Number' => ($phone ? "<$phone> " : '') . $phone,
     'X-Mailer' => 'PHP/' . phpversion()
   ];
 
   mail($to, $subject, $message . "\r\n\r\nfrom: " . $_SERVER['REMOTE_ADDR'], $headers);
   die('OK');
 } else {
   die('Invalid address');
 }
 
?>
