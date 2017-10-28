<?php

//
// config
// --------------------------------------------------
//
// follow the commend to edit :)
//

  // choose subscribe form version

  $version = 2; // 1 = save to txt file, 2 = mailchimp (recommend)





  // if $version = 1, save to txt file

  // file path of the txt file, edit the file name too for more safety
  // if it not work, set [newsletter.txt] chmoded to 777

  define('FILE_PATH', 'newsletter.txt'); // example: define('FILE_PATH', 'newsletter_folder/newsletter_more_safety.txt');





  // if $version = 2, mailchimp

  // mailchimp api key, for more info visit http://admin.mailchimp.com/account/api/

  define('MC_API_KEY', '96f10bc8458cf6f4fa51c3cac045cd3d-us17'); // example: define('MC_API_KEY', '96f10bc8458cf6f4fa51c3cac045cd3d-us17');

  // mailchimp list id, for more info visit http://admin.mailchimp.com/lists/

  define('MC_LIST_ID', 'c55a73208d'); // example: define('MC_LIST_ID', 'c55a73208d');





  // config finish

//
// script
// --------------------------------------------------
//
// DO NOT NEED EDIT, but you may still edit the success and error message
//
// search text below to find the message text
//
// --------------------------------------------------
//
// Subscription already exists
// Thank you! You have been successfully subscribed
// Subscription already exists
// Thank you! We just sent you a confirmation email
//
// --------------------------------------------------
//

  header('Expires: 0');
  header('Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0');
  header('Pragma: no-cache');
  header('Content-type: application/json');

  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    extract($_POST, EXTR_PREFIX_ALL, 'form');

    try {
      if ($version === 1) {
        fn_saveToFile($form_email);
      } elseif ($version === 2) {
        fn_mailChimp($form_email);
      }
    } catch(Exception $e) {
      $message = $e->getMessage();
			$code = $e->getCode();
		}

    echo json_encode(array(message => $message, code => $code));

  } else {
    exit('Only allow access via AJAX');
  }

  // save to file
  function fn_saveToFile($form_email) {
    if (defined('FILE_PATH')) {
      if (strpos(file_get_contents(FILE_PATH), $form_email) == true) {
        throw new Exception('A assinatura já existe.', 1); // error message
      } else {
        file_put_contents(FILE_PATH, date("Y-m-d H:i:s").' - '.$form_email."\n", FILE_APPEND | LOCK_EX); // LOCK_EX available since PHP 5.1.0+
        throw new Exception('Obrigado! Acabamos de enviar-lhe um e-mail de confirmação', 0); // success message
      }
    } else {
      throw new Exception('Um erro ocorreu. Por favor, tente novamente mais tarde.', 1); // error message
    }
  }

  // mailchimp
  function fn_mailChimp($form_email) {
    require_once('vendor/mailchimp/MCAPI.class.php');

    if(defined('MC_API_KEY') && defined('MC_LIST_ID')) {
      $api = new MCAPI(MC_API_KEY);
      if ($api->listSubscribe(MC_LIST_ID, $form_email) !== true) {
        if ($api->errorCode == 214) {
          throw new Exception('A assinatura já existe.', 1);
        } elseif ($api->errorCode == 104) {
          throw new Exception('Invalid API KEY', 1);
        } elseif ($api->errorCode == 200) {
          throw new Exception('Invalid LIST ID', 1);
        } else {
          throw new Exception($api->errorMessage, 1);
        }
      } else {
        throw new Exception('Obrigado! Acabamos de enviar-lhe um e-mail de confirmação.', 0); // success message
      }
    } else {
      throw new Exception('API KEY / LIST ID not defined', 1); // error message
    }
  }
?>