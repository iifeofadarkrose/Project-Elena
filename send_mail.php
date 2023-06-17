<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";

    $mail = new PHPMailer(true);
	
    $mail->CharSet = "UTF-8";
    $mail->IsHTML(true);

   
    $email = $_POST["email"];
	$email_template = "template_mail.html";

    $body = file_get_contents($email_template);
	$body = str_replace('%email%', $email, $body);


    $mail->addAddress("vacheslav69moss@gmail.com");   // Здесь введите Email, куда отправлять
	$mail->setFrom($email);
    $mail->Subject = "[Form request]";
    $mail->MsgHTML($body);

if (!$mail->send()) {
    $message = 'Ошибка';
  } else {
    $message = 'Данные отправлены!';
  }

  $response = ['message' => $message];

  header('location: index.html');
  echo json_encode($response);
?>