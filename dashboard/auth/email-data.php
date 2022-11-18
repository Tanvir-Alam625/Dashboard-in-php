<?php
require_once('../db_connect/db_connect.php');
session_start();
// input value store into variables 
$name = htmlspecialchars(trim($_POST["name"]));
$email = htmlspecialchars(trim($_POST["email"]));
$message = htmlspecialchars(trim($_POST["message"]));
// form validation logic 
if(!$name && !$email && !$message){
    $_SESSION["message_error"]= "Input Field required!";
    header("location: ../../index.php#contact");
}
    // DB query 
    $message_query = "INSERT INTO `messages` (Name, Email, Message) VALUES ('$name', '$email', '$message')";
	mysqli_query($db_connect, $message_query);
    // php mailer code 
    //======================================================================
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require '../../vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                    //Enable verbose debug output
        $mail->isSMTP();                                         //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                //Enable SMTP authentication
        $mail->Username   = 'mdtanviralamht731@gmail.com';       //SMTP username
        $mail->Password   = 'hvaeikqwwovfyneq';                  //SMTP password
        $mail->SMTPSecure = 'tls';                               //Enable implicit TLS encryption
        $mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("$email", "$name"); 
        $mail->addAddress('86tanviralam@gmail.com', 'Tanvir Alam');
        //Content
        $mail->isHTML(true);                             
        $mail->Subject = "Client Message $name";
        // message body html template
        $mail->Body    = "
        <div style='width: 600px; margin:0px auto; background:#fcfdff;'>

        <h2 style='text-align:center; background:#2269F5; padding:20px; font-size: 25px;  font-weight: 400; color: aliceblue; letter-spacing: 1px;'>Hello, I'm $name</h2>
        <div style='padding: 0px 10px;'>
                <p style='font-size: 16px; font-weight: 300; font-family: Georgia, 'Times New Roman', Times, serif; padding: 20px 0px;'>
                   $message
                </p>
        </div>
        <h5 style='text-align:center; background:#464646; padding:10px; font-size: 12px;  font-weight: 300; color: aliceblue; margin: 0px;'>$email</h5>
        </div>
        ";
        // success message 
        $_SESSION["mail_sent_message"]= "Congratulation your message sent!";
        header("location: ../../index.php#contact");
        $mail->send();
    } catch (Exception $e) {
        // error message 
        $_SESSION["message_error"]= "server error!";
        header("location: ../../index.php#contact");
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>