<?php
session_start();

ini_set('upload_max_filesize', '40000M');
ini_set('post_max_size', '40000M');
ini_set('max_input_time', 300000);
ini_set('max_execution_time', '-1');

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function render_user_email($data)
{
    ob_start();
    include "userBrochure-form.phtml";
    return ob_get_clean();
}

function render_admin_email($data)
{
    ob_start();
    include "adminBrochure-form.phtml";
    return ob_get_clean();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
    $body_user = render_user_email($data);
    $subject_user = "Thank you for your message";

    $body_admin = render_admin_email($data);
    $subject_admin = "New message from contact us form";

    $to_user = $data['email'];
    $to_admin = 'arunkumarddd12@gmail.com';
    $from = "arunkumarddd12@gmail.com";

    $mail_user = new PHPMailer\PHPMailer\PHPMailer(true);

    try {


        $mail_user->isSMTP();
        $mail_user->Host = "smtp.gmail.com";
        $mail_user->SMTPAuth = true;
        $mail_user->Username = "arunkumarddd12@gmail.com";
        $mail_user->Password = "vxcgsipxgjnohigy";
        $mail_user->SMTPSecure = "ssl";
        $mail_user->Port = 465;

        $mail_user->setFrom($from, "contact us details");
        $mail_user->addAddress($to_user);
        $mail_user->isHTML(true);

        $mail_user->Subject = 'Thank You for Downloading Our Brochure! ';
        $mail_user->Body = $body_user;

        $path = 'Creators-Course-Brochure.pdf';
        $mail_user->AddAttachment($path);
    
        $mail_user->send();
             echo "sent";
             $_SESSION['status'] = "success";
        } catch (Exception $e) {
            print_r(error_get_last());
                echo "Error: Message not accepted";
                $_SESSION['status'] = "failure";
        }
    $mail_admin = new PHPMailer\PHPMailer\PHPMailer(true);

    try {

        $mail_admin->isSMTP();
        $mail_admin->Host = "smtp.gmail.com";
        $mail_admin->SMTPAuth = true;
        $mail_admin->Username = "arunkumarddd12@gmail.com";
        $mail_admin->Password = "vxcgsipxgjnohigy";
        $mail_admin->SMTPSecure = "ssl";
        $mail_admin->Port = 465;
        $mail_admin->setFrom($from, "contact us details");

        $mail_admin->addAddress($to_admin);
        $mail_admin->isHTML(true);
        $mail_admin->Subject = $subject_admin;
        $mail_admin->Body = $body_admin;

        $mail_admin->send();
        $response['status'] = 'success';
        $response['message'] .= ' Admin email sent successfully!';
    } catch (Exception $e) {
        $response['status'] = 'failure';
        $response['message'] .= ' Admin email could not be sent. Mailer Error: ' . $mail_admin->ErrorInfo;
    }

  

}

//  header("Location: Creators-Course-Brochure.pdf");
exit;
?>