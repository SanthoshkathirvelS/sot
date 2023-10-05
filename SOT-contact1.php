<?php
// Start a PHP session
session_start();

// Set PHP configurations for file uploads and execution time
ini_set('upload_max_filesize', '40000M');
ini_set('post_max_size', '40000M');
ini_set('max_input_time', 300000);
ini_set('max_execution_time', '-1');

// Require necessary PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/* Email Template Render for User */
function render_user_email($data)
{
    // Start output buffering
    ob_start();

    // Include the user email template
    include "SOT-contact.phtml";

    // Get the contents of the buffer and clean the buffer
    return ob_get_clean();
}

/* Email Template Render for Admin */
function render_admin_email($data)
{
    // Start output buffering
    ob_start();

    // Include the admin email template
    include "SOT-contact1.phtml";

    // Get the contents of the buffer and clean the buffer
    return ob_get_clean();
}

// Check if the HTTP request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
    $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['subject'] = isset($_POST['subject']) ? $_POST['subject'] : '';
    $data['number'] = isset($_POST['number']) ? $_POST['number'] : '';
    $data['message'] = isset($_POST['message']) ? $_POST['message'] : '';

    // Email templates for user and admin
    $body_user = render_user_email($data); // For user
    $subject_user = "Thank you for your message";

    $body_admin = render_admin_email($data); // For admin
    $subject_admin = "New message from contact us form";

    // Set the recipient's email address
    $to_user = $data['email'];
    $to_admin = 'arunkumarddd12@gmail.com'; // Update with the admin's email address

    $from = "arunkumarddd12@gmail.com";

    // PHPMailer Object for user
    $mail_user = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Enable SMTP debugging (if needed)
        // $mail_user->SMTPDebug = 3;

        // Set mailer to use SMTP
        $mail_user->isSMTP();

        // Set SMTP host name
        $mail_user->Host = "smtp.gmail.com";

        // Set this to true if SMTP host requires authentication to send email
        $mail_user->SMTPAuth = true;

        // Provide username and password
        $mail_user->Username = "arunkumarddd12@gmail.com";
        $mail_user->Password = "vxcgsipxgjnohigy"; // Update with your Gmail app password

        // If SMTP requires TLS encryption then set it
        $mail_user->SMTPSecure = "ssl";

        // Set TCP port to connect to
        $mail_user->Port = 465;

        // Set the sender's email address and name
        $mail_user->setFrom($from, "contact us details");

        // Add the recipient's email address
        $mail_user->addAddress($to_user);

        // Set email to be HTML
        $mail_user->isHTML(true);

        // Set the email subject and body
        $mail_user->Subject = $subject_user;
        $mail_user->Body = $body_user;

        // Send the email to the user
        $mail_user->send();
        echo "User email sent successfully!";
        $_SESSION['status'] = "success";
    } catch (Exception $e) {
        echo "User email could not be sent. Mailer Error: " . $mail_user->ErrorInfo;
        $_SESSION['status'] = "failure";
    }

    // PHPMailer Object for admin
    $mail_admin = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Enable SMTP debugging (if needed)
        // $mail_admin->SMTPDebug = 3;

        // Set mailer to use SMTP
        $mail_admin->isSMTP();

        // Set SMTP host name
        $mail_admin->Host = "smtp.gmail.com";

        // Set this to true if SMTP host requires authentication to send email
        $mail_admin->SMTPAuth = true;

        // Provide username and password
        $mail_admin->Username = "arunkumarddd12@gmail.com";
        $mail_admin->Password = "vxcgsipxgjnohigy"; // Update with your Gmail app password

        // If SMTP requires TLS encryption then set it
        $mail_admin->SMTPSecure = "ssl";

        // Set TCP port to connect to
        $mail_admin->Port = 465;

        // Set the sender's email address and name
        $mail_admin->setFrom($from, "contact us details");

        // Add the recipient's email address
        $mail_admin->addAddress($to_admin);

        // Set email to be HTML
        $mail_admin->isHTML(true);

        // Set the email subject and body
        $mail_admin->Subject = $subject_admin;
        $mail_admin->Body = $body_admin;

        // Send the email to the admin
        $mail_admin->send();
        echo "Admin email sent successfully!";
    } catch (Exception $e) {
        echo "Admin email could not be sent. Mailer Error: " . $mail_admin->ErrorInfo;
    }
}

// Additional application-specific code goes here

// Redirect to the index.php page
header("Location: index.php");
exit;
?>
