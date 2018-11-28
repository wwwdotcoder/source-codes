<?php 
$to = $applicant_email;
$mail             = new PHPMailer();
$body             = "Dear ".$applicant_name.","."<br/><br/>"."<p>Thank you for your interest in XXX!</p>

<p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>

<p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>

<p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>

<p>XXXXXX XXXXX<br/>
XXXXXX XXXXX<br/>
XXXXXX XXXXX<br/>
XXXXXX XXXXX<br/>
XXXXXX XXXXX
</p>

<p>XXXXXX XXXXX XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>

<p>XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX</p>

<br><br>
Warm Regards,<br>
LODHA Group";
 
$body             = eregi_replace("[\]",'',$body);
 $mail->IsSMTP(); // telling the class to use SMTP

$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = 'ssl';
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->Port       = 465 ;                    // set the SMTP port for the GMAIL server
$mail->MsgHTML($body);
$mail->Username   = "email@gmail.com"; // SMTP account username
$mail->Password   = "password";        // SMTP account password
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->Priority    = 1; 


$mail->SetFrom('email@gmail.com', 'Sender Name');
$mail->AddReplyTo($applicant_email,$applicant_name);

$mail->AddCC('ccemail@gmail.com', 'CC to sender name');

$mail->Subject    = "Subject name";

$mail->AltBody    = ""; // optional, comment out and test



$address = $applicant_email;
$mail->AddAddress($address, $applicant_name);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
for($x=0;$x<count($files);$x++){ //echo count($files); exit;
	$mail->AddAttachment($files[$x]);
} 
for($y=0;$y<count($files1);$y++){ //echo count($files); exit;
	$mail->AddAttachment($files1[$y]);
} 

$st = $mail->Send(); ?>