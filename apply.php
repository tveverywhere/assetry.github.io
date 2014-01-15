<?php
if(isset($_REQUEST["email"])){
	$to      =  $_REQUEST["email"];
	$file = 'people.txt';
	// Open the file to get existing content
	$current = file_get_contents($file);
	// Append a new person to the file
	$current .= $to."\n";
	// Write the contents back to the file
	file_put_contents($file, $current);

	$subject = "Thank you for applying to The Assetry's BETA development programme";
	$message = "<b>Hi there,</b><br/><br/>

<p>Thank you very much for applying to The Assetry's BETA development programme.</p>

<p>If your application is successful, then this will be a great opportunity for you to help solve many of the problems that content owners face with regards to the management of their assets and rights.</p>

<p>A member of our team will be in contact shortly.</p>

<p>
Many thanks,<br/>
<b>The Assetry team</b><br /><img src='http://www.assetry.com/images/logo.png' /></p>";

	$headers = 'From: contact@theassetry.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion().
		'MIME-Version: 1.0' . "\r\n".
		'Content-type:text/html;charset=iso-8859-1' . "\r\n";
		
	mail($to, $subject, $message, $headers);

	$headers = 
		'From: contact@theassetry.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

	mail("contact@theassetry.com", "Assetry : Notification", "
		Yipee !
		".$to." has applied for The Assetry.
		Thank You !
		System Admin
	", $headers);
}
?>
Thank You!
