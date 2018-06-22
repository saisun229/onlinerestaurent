<?php
$to      = 'shilpavorsu@gmail.com';
$subject = 'Hai';
$message = 'hello';
$headers = 'From: chittishilpa4@gmail.com' . "\r\n" .
    'Reply-To: chittishilpa4@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?> 