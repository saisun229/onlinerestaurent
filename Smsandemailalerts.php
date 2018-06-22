<?php

class Smsandemailalerts
{  
  
   function sendemail($to,$subject,$message)
   {
        $headers = "MIME-Version: 1.0\nContent-type:text/html;charset=UTF-8" . "\r\n";
        $headers.= 'From: noreply@cuisine.info'."\r\n".'X-Mailer: PHP/' . phpversion();  
        $result=mail($to, $subject, $message, $headers);
        return $result;
   }
}

?>