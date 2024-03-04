<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Send_email extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    require APPPATH.'libraries/phpmailer/src/Exception.php';
    require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
    require APPPATH.'libraries/phpmailer/src/SMTP.php';
  }
  
  public function index()
  {
    // PHPMailer object
    $response = false;
    $mail = new PHPMailer();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host     = 'smtp.gmail.com'; //sesuaikan sesuai nama domain hosting/server yang digunakan
    $mail->SMTPAuth = true;
    $mail->Username = 'api.diengcyber@gmail.com'; // user email
    $mail->Password = 'AaSsDd#3'; // password email
    $mail->SMTPSecure = 'tls';
    $mail->Port     = 587;
    $mail->SMTPDebug  = 2; 

    $mail->setFrom('api.diengcyber@gmail.com', 'DIENG CYBER API'); // user email
    $mail->addReplyTo('api.diengcyber@gmail.com', 'DIENG CYBER API'); //user email

    // Add a recipient
    // $mail->addAddress('hisamusama@gmail.com'); // email tujuan pengiriman email
    $mail->addAddress('db.diengcyber@gmail.com'); // email tujuan pengiriman email

    // Email subject
    $mail->Subject = 'MOMIKU Database'; //subject email

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content
    $mailContent = "<h1>Momiku DB backup ".date('d-m-Y')."</h1>
    <p>".date('Y-m-d H:i:s')."<p>
    <p>folder backup/db_backup.sql.gz.</p>"; // isi email
    $mail->Body = $mailContent;

    // Attachment files
    $mail->addStringAttachment(file_get_contents('./backup/db_backup.sql.gz'), 'db_backup.sql.gz');

    // Send email
    if(!$mail->send()){
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
      echo 'Message has been sent';
    }
  }
  
  public function hapus_file()
  {
      if (file_exists('./backup/db_backup.sql.gz')) {
          unlink('./backup/db_backup.sql.gz');
      }
  }

}