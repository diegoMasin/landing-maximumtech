<?php

  require 'vendor/phpmailer/PHPMailerAutoload.php';

//
// config start
// --------------------------------------------------
// follow the commend to edit :)
//
  $email = 'contato@maximumtech.com.br'; // Your email address
  $name = 'Srº Diego Masin'; // Your name
  $subject = 'Formulário de Contato da Maximum Tech'; // Subject line
  $body = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      <p><strong style="width: 80px;">Name: </strong>' . $_POST['name'] . '</p>
      <p><strong style="width: 80px;">Email: </strong>' . $_POST['email'] . '</p>
      <p><strong style="width: 80px;">Message: </strong>' . $_POST['message'] . '</p>
    </body>
  </html>
  ';
//
// config end
// --------------------------------------------------
//

//
// script
// --------------------------------------------------
// you may edit the success message
//

  /* PHP headers with AJAX */
  header('Expires: 0');
  header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
  header('Pragma: no-cache');
  /* Json */
  header('Content-type: application/json');

  /* AJAX check  */
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    /* AJAX function */
    extract($_POST, EXTR_PREFIX_ALL, 'form');

    try {
      // create a new PHPMailer instance
      $mail = new PHPMailer(true);

      //Server settings
      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'contato@maximumtech.com.br';                 // SMTP username
      $mail->Password = 'trizayferetrigan';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('contato@maximumtech.com.br', 'Mailer');
      $mail->addAddress('diegoifce@gmail.com', 'Joe User');     // Add a recipient

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Here is the subject';
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      throw new Exception('Obrigado! A mensagem foi enviada.', 0); // success message
    } catch (phpmailerException $e) {
      $message = $e->getMessage();
      $code = 1;
      echo json_encode(array(message => $message, code => $code));
    } catch (Exception $e) {
      $message = $e->getMessage();
      $code = $e->getCode();
      echo json_encode(array(message => $message, code => $code));
    }
  } else {
    exit('Only allow access via AJAX');
  }
?>