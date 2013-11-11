<?php

/**
 * Send contact form message
 */

#YOUR E-MAIL
define('TO', 'samad@tangierino.com, bouchra@tangierino.com, abdel@tangierino.com');
##E-MAIL SUBJECT
define('SUBJECT', 'General Inquiry');


$message = 'Message from: ' . $_POST['name'] . ' <'.$_POST['email'].'>' . "\n
Phone Number: " . $_POST['phone'] . "\n
Message: " . $_POST['message'];


if (mail(TO, SUBJECT, $message)){
	echo 'ok';
}else{
	echo 'Error occurred while sending email';
}

/**
* end of file
*/
