<?php
//
//
//

$to1 = $_POST['email'];
$subject1 = $_POST['subject'];
$txt = $_POST['message'];
$fname = $_POST['fname'];
// Always set content-type when sending HTML email
$to      = 'jitendra.2009@rediffmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: dhule@infinityagrotech.in' . "\r\n" .
    'Reply-To: dhule@infinityagrotech.in' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

 $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }

header("Location: index.php");
exit();
?>