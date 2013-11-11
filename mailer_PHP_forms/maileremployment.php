<?php
ob_start() 
?>

<?php

/**
 * Send contact form message
 */

#YOUR E-MAIL
define('TO', 'samad@tangierino.com, abdel@tangierino.com, bill@tangierino.com, tara@tangierino.com, dilyana@tangierino.com');
##E-MAIL SUBJECT
define('SUBJECT', 'Employment Inquiry');


$message = 'Message from: ' . $_POST['name'] . ' <'.$_POST['email'].'>' . "\n
Phone Number: " . $_POST['phone'] . "\n
Message: " . $_POST['message'];


if (mail(TO, SUBJECT, $message)){
	echo 'Success! Thank you for contacting us. You will be automatically redirected back home in 5 seconds.';
	header("Refresh: 5; ../index.html");
}else{
	echo 'Error occurred while sending email. We may be having technical difficulties, please try again in a little while, or email us directly at info@tangierino.com. Thank you. You will be automatically redirected to the homepage in a few seconds.';
	header("Refresh: 8; ../index.html");

}

/**
* end of file
*/
?>
<?php
ob_end_flush(); 
?>
