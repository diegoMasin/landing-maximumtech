<?php

  require 'vendor/phpmailer/PHPMailerAutoload.php';

//
// config start
// --------------------------------------------------
// follow the commend to edit :)
//
  $email = 'contato@maximumtech.com.br'; // Your email address
  $name = 'Maximum Tech'; // Your name
  $subject = 'Mensagem de Contato do Site'; // Subject line
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
      $mail->SMTPDebug = 4;
      $mail->isSMTP();
      $mail->Host = 'smtp.zoho.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'contato@maximumtech.com.br';
      $mail->Password = 'trizayferetrigan';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;
      // UTF-8
      $mail->CharSet = 'UTF-8';
      // set who the message is to be sent from
      $mail->setFrom($email, $name);
      // set who the message is to be sent to
      $mail->addAddress($email, $name);
      // set the subject line
      $mail->Subject = $subject;
      // read an HTML message body from an external file, convert referenced images to embedded,
      //and convert the HTML into a basic plain-text alternative body
      $mail->msgHTML($body);
      // replace the plain text body with one created manually
      $mail->AltBody = 'This is a plain-text message body';
      // send the message
      // note that we don't need check the response from this because it will throw an exception if it has trouble
      $mail->send();
      throw new Exception('Obrigado! Sua mensagem foi enviada.', 0); // success message
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