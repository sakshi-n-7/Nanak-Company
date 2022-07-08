<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load composer's autoloader
require 'vendor/autoload.php';

// =================================================

include("admin/dbconst.php");
$conn=mysqli_connect(HOST,USER,PASSWORD,DB) or die("not connected");

// if($_SERVER['REQUEST_METHOD'] == "POST")
 if(isset($_POST['xsub']))
{
$name =$_POST['xname'];
$email = $_POST['xmail'];
$treat = $_POST['xtreat'];
$mobile = $_POST['xcon'];



$mail = new PHPMailer(true); // Passing `true` enables exceptions
try {
//Server settings
$mail->SMTPDebug = 0; // Enable verbose debug output
$mail->isSMTP(); // Set mailer to use SMTP
$mail->Host = 'smtp.hostinger.in'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'info@acuacupressure.in'; // SMTP username 
$mail->Password = 'Babu@1234'; // SMTP password cpanel mail password
$mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to
//Recipients
$mail->setFrom('info@acuacupressure.in', 'Treatment'); //website cpanel mail id jaha se ayega
$mail->addAddress('acuacupressure@gmail.com', 'acuacupressure.in'); 

//Content

$mail->isHTML(true); // Set email format to HTML
$mail->Subject = "Treatment";
$mail->Body = "<div style='border:2px solid gray;'>
                    <span style='font-size:25px;'>Name : ".$name."</span><br>
                    <span style='font-size:25px;'>Email : ".$email."</span><br>
                    <span style='font-size:25px;'>Treatment : ".$treat."</span><br>
                    <span style='font-size:25px;'>Mobile : ".$mobile."</span><br>
                </div>";



$mail->send();
echo "<SCRIPT type='text/javascript'> //not showing me this
alert('Thank You! We will contact you shortly ');
window.location.replace(\"https://acuacupressure.in\");
</SCRIPT>";

} catch (Exception $e) {
echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
?>

