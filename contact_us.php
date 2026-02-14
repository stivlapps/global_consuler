<!DOCTYPE html>
<html lang="zxx">
<?php
include ("includes/config.php");



if (isset($_REQUEST['subscribe'])) {
    extract($_REQUEST);
    $date = date('Y-m-d H:i:s');
    $fields = array(

        'email' => addslashes($email_subscribe),


        'created_at' => addslashes($date),

    );

    $addQuery = "INSERT INTO `newsletter` (`" . implode('`,`', array_keys($fields)) . "`)"
        . " VALUES ('" . implode("','", array_values($fields)) . "')";

    $stmt1 = $db->query($addQuery);
    header("Location:contact_us.php");
    exit();
} ?>

<?php

$units = $db->query("SELECT * FROM `settings`")->fetch();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


if (isset($_REQUEST['appointment'])) {
    extract($_REQUEST);

    $fields = array(
        'name' => ($name),
        'country' => ($country),
        'service' => ($service),
        'mobile' => ($phone),
        'email' => ($email),
        'address' => ($address),
        'date' => date('Y-m-d', strtotime($date)),
        'time' => ($time),

    );
    $fieldsList = array();
    foreach ($fields as $field => $value) {
        $fieldsList[] = '`' . $field . '`' . '=' . "'" . $value . "'";
    }

    $addQuery = "INSERT INTO `appointment` (`" . implode('`,`', array_keys($fields)) . "`)"
        . " VALUES ('" . implode("','", array_values($fields)) . "')";

    $stmt1 = $db->query($addQuery);

    //Abhishek edit
    $server_smtp = "smtp.hostinger.com";
    $server_imap = "imap.hostinger.com";
    $email_account = "info@globalconsular.services";
    $email_password = "GlobalCon@123";
    $string = $service;
    $lowerStr = strtolower($string);
      
      // Capitalize the first letter
      $fservice = ucwords($lowerStr);
      $st2 = strtolower($country);
      $fcountry=ucwords($st2);



    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Username = $email_account;
    $mail->Password = $email_password;
    $mail->setFrom($email_account, "");
    $mail->addReplyTo($email_account, "");
    $mail->addAddress($email, "$name");


    $mail->Subject = "Appointment Confirmed for $service";

    $TemplateMessage = "<body style='font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: hsl(0, 0%, 96%);'>
    <div style='max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
        <div style='text-align: background-color: #ffffff;'>
            <a href='https://globalconsular.services/index.php'><img src='https://globalconsular.services/admin/upload/logo/1712751640.png' alt='logo'  style='width: 30%; margin-bottom: 20px;'></a>
        </div>
        <div style='padding: 20px; background-color: #ffffff; border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd;'>
           <h1 style=\'color: #333;\'>Appointment Details</h1>
        <p style=\'color: #666;margin-bottom: 20px;\'>Dear " . $name . ",</p>
        <p style=\'color: #666;margin-bottom: 20px;\'>This email is to inform you that a appointment has been Confirmed.</p>
        <p style=\'color: #666;margin-bottom: 20px;\'>Below are the details of the application:</p>
        <ul>
            <li><strong>Applicant Name:</strong> " . $name . "</li>
            <li><strong>Country:</strong> $country</li>
            <li><strong>Purpose of Visit:</strong> $fservice</li>
            <li><strong>Appointment:</strong> " . date('d-m-Y', strtotime($date)) . "</li>
        </ul>
        <p style='color: #666;margin-bottom: 20px;'>Please review the contact details and proceed with the necessary actions accordingly.</p>
        
        <p style=\'color: #666;margin-bottom: 20px;\'>For any inquiries or assistance, please do not hesitate to contact us.</p>
        <p style=\'color: #666;margin-bottom: 20px;\'>Best regards,<br>Global Consular Team</p>
        </div>
        <div style='padding: 5px; text-align: center; color: #777;background-image: url(https://globalconsular.services/admin/upload/logo/bgfoot.jpg);'>
          <table cellpadding='0' cellspacing='0' border='0' width='300' align='center'>
                <tr>
                    <td width='280' align='center'>
                        <table cellpadding='0' cellspacing='0' border='0' width='275'>
                            <tr>
                                <td align='center'>
                                  <a href='https://www.facebook.com/people/Global-Consular-Services/61558880248190/'><img src='https://globalconsular.services/admin/upload/logo/facebookicon.png' width='32px' height='32px' alt='facebook' vspace='10' hspace='10'/></a>
                                </td>
                                <td width='1px'></td>
                                <td align='center'>
                                  <a href='https://twitter.com/ConsularGlobal'><img src='https://globalconsular.services/admin/upload/logo/twittericon.png' width='32px' height='32px' alt='twitter' vspace='10' hspace='10'/></a>
                                </td>
                               <td width='1px'></td>
                                
                                <td align='center'>
                                  <a href='https://instagram.com/globalconsular/'><img src='https://globalconsular.services/admin/upload/logo/instagram.png' width='32px' height='32px' instagram' vspace='10' hspace='10'/></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p style='color: white; font-size: small; text-align: left;'>Unit-201, 2nd Floor,Webel IT Park(Phase-II),Rajarhat, DH Block(Newtown), Action Area 1D, Newtown, West Bengal 700160.</p>
        </div>
    </div>
</body>
";

    $mail->MsgHTML($TemplateMessage);
    $mail->Send();
    //section 1
    //end of edit one
    //section 2
    //Abhishek edit
    $server_smtp = "smtp.hostinger.com";
    $server_imap = "imap.hostinger.com";
    $email_account = "info@globalconsular.services";
    $email_password = "GlobalCon@123";
    $recipient = "sayankolkata.1995@gmail.com";

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Username = $email_account;
    $mail->Password = $email_password;

    $mail->setFrom($email_account, "");
    $mail->addReplyTo($email_account, "");
    $mail->addAddress($recipient, "");



    $mail->Subject = "Contact Message";

    $TemplateMessage = "<body style='font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: hsl(0, 0%, 96%);'>
    <div style='max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
        <div style='text-align: background-color: #ffffff;'>
           <a href='https://globalconsular.services/index.php'><img src='https://globalconsular.services/admin/upload/logo/1712751640.png' alt='logo'  style='width: 30%; margin-bottom: 20px;'></a>
        </div>
        <div style='padding: 20px; background-color: #ffffff; border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd;'>
           <h1 style=\'color: #333;\'>Appointment Details</h1>
        <p style='color: #666;margin-bottom: 20px;'>Dear Admin,</p>
        <p style='color: #666;margin-bottom: 20px;'>This email is to confirm that a new client has submitted their contact details.</p>
        <p style='color: #666;margin-bottom: 20px;'>Below are the contact details for information:</p>
        <ul>
            <li><strong>Contact Person Name:</strong> " . $name . "</li>
            <li><strong>Country:</strong> $country</li>
            <li><strong>Purpose of Visit:</strong> $fservice</li>

            <li><strong>Appointment:</strong> " . date('d-m-Y', strtotime($date)) . "</li>
        </ul>
        <p style='color: #666;margin-bottom: 20px;'>Please review the contact details and proceed with the necessary actions accordingly.</p>
        
        <p style=\'color: #666;margin-bottom: 20px;\'>Best regards,<br>Global Consular Team</p>
        </div>
        <div style='padding: 5px; text-align: center; color: #777;background-image: url(https://globalconsular.services/admin/upload/logo/bgfoot.jpg);'>
          <table cellpadding='0' cellspacing='0' border='0' width='300' align='center'>
                <tr>
                    <td width='280' align='center'>
                        <table cellpadding='0' cellspacing='0' border='0' width='275'>
                            <tr>
                                 <td align='center'>
                                  <a href='https://www.facebook.com/people/Global-Consular-Services/61558880248190/'><img src='https://globalconsular.services/admin/upload/logo/facebookicon.png' width='32px' height='32px' alt='facebook' vspace='10' hspace='10'/></a>
                                </td>
                                <td width='1px'></td>
                                <td align='center'>
                                  <a href='https://twitter.com/ConsularGlobal'><img src='https://globalconsular.services/admin/upload/logo/twittericon.png' width='32px' height='32px' alt='twitter' vspace='10' hspace='10'/></a>
                                </td>
                               <td width='1px'></td>
                                
                                <td align='center'>
                                  <a href='https://instagram.com/globalconsular/'><img src='https://globalconsular.services/admin/upload/logo/instagram.png' width='32px' height='32px' instagram' vspace='10' hspace='10'/></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p style='color: white; font-size: small;text-align: left;'>Unit-201, 2nd Floor,Webel IT Park(Phase-II),Rajarhat, DH Block(Newtown), Action Area 1D, Newtown, West Bengal 700160.</p>
        </div>
    </div>
</body>
";

    $mail->MsgHTML($TemplateMessage);
    // $mail->Send();



    $_SESSION['successMessage'] = "Appointment Submitted Successfully";
    header("Location:contact_us.php");
    exit();

}
//end of edit 

////////////////////////////////////////////////////
if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $date = date('Y-m-d H:i:s');
    $fields = array(
        'name' => addslashes($name),
        'phone' => addslashes($phone),
        'email' => addslashes($email),
        'subject' => addslashes($subject),
        'message' => addslashes($message),
        'created_at' => addslashes($date),

    );






    $addQuery = "INSERT INTO `contact` (`" . implode('`,`', array_keys($fields)) . "`)"
        . " VALUES ('" . implode("','", array_values($fields)) . "')";

    $stmt1 = $db->query($addQuery);
    // edit by Abhishek


    $server_smtp = "smtp.hostinger.com";
    $server_imap = "imap.hostinger.com";
    $email_account = "info@globalconsular.services";
    $email_password = "GlobalCon@123";



    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Username = $email_account;
    $mail->Password = $email_password;
    $mail->setFrom($email_account, "");
    $mail->addReplyTo($email_account, "");
    $mail->addAddress($email, "$name");


    $mail->Subject = "Contact Message Confirmed";

    $TemplateMessage = "<body style='font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: hsl(0, 0%, 96%);'>
    <div style='max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
        <div style='text-align: background-color: #ffffff;'>
         <a href='https://globalconsular.services/index.php'><img src='https://globalconsular.services/admin/upload/logo/1712751640.png' alt='logo'  style='width: 30%; margin-bottom: 20px;'></a>
        </div>
        <div style='padding: 20px; background-color: #ffffff; border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd;'>
          <h1 style='color: #333;'>Contact Details</h1>
        <p style='color: #666;margin-bottom: 20px;'>Dear " . $name . ",</p>
        <p style='color: #666;margin-bottom: 20px;'>This email confirms that your contact information has been successfully received</p>
        <p style='color: #666;margin-bottom: 20px;'>Below are the contact details for information:</p>
        <ul>
            <li><strong>Applicant Name:</strong> " . $name . "</li>
            <li><strong>Subject :</strong> " . $subject . "</li>
            <li><strong>Message :</strong> " . $message . "</li>
            <li><strong>Date of Sending Email:</strong> " . date('d-m-Y', strtotime($date)) . "</li>
        </ul>
        <p style='color: #666;margin-bottom: 20px;'>Please review the contact details and proceed with the necessary actions accordingly. We will connect with you soon.</p>
        <p style=\'color: #666;margin-bottom: 20px;\'>Best regards,<br>Global Consular Team</p>
        </div>
        <div style='padding: 5px; text-align: center; color: #777;background-image: url(https://globalconsular.services/admin/upload/logo/bgfoot.jpg);'>
          <table cellpadding='0' cellspacing='0' border='0' width='300' align='center'>
                <tr>
                    <td width='280' align='center'>
                        <table cellpadding='0' cellspacing='0' border='0' width='275'>
                            <tr>
                                <td align='center'>
                                  <a href='https://www.facebook.com/people/Global-Consular-Services/61558880248190/'><img src='https://globalconsular.services/admin/upload/logo/facebookicon.png' width='32px' height='32px' alt='facebook' vspace='10' hspace='10'/></a>
                                </td>
                                <td width='1px'></td>
                                <td align='center'>
                                  <a href='https://twitter.com/ConsularGlobal'><img src='https://globalconsular.services/admin/upload/logo/twittericon.png' width='32px' height='32px' alt='twitter' vspace='10' hspace='10'/></a>
                                </td>
                               <td width='1px'></td>
                                
                                <td align='center'>
                                  <a href='https://instagram.com/globalconsular/'><img src='https://globalconsular.services/admin/upload/logo/instagram.png' width='32px' height='32px' instagram' vspace='10' hspace='10'/></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p style='color: white; font-size: small; text-align: left;'>Unit-201, 2nd Floor,Webel IT Park(Phase-II),Rajarhat, DH Block(Newtown), Action Area 1D, Newtown, West Bengal 700160.</p>
        </div>
    </div>
</body>
";
    $mail->MsgHTML($TemplateMessage);
    $mail->Send();
    //section 2


    $server_smtp = "smtp.hostinger.com";
    $server_imap = "imap.hostinger.com";
    $email_account = "info@globalconsular.services";
    $email_password = "GlobalCon@123";
    $recipient = "sayankolkata.1995@gmail.com";
   //$recipient="ab.dey2000@gmail.com";

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Username = $email_account;
    $mail->Password = $email_password;

    $mail->setFrom($email_account, "");
    $mail->addReplyTo($email_account, "");
    $mail->addAddress($recipient, "");


    $mail->Subject = "Contact Message ";

    $TemplateMessage = "<body style='font-family: Arial, sans-serif; line-height: 1.6; margin: 0; padding: 0; background-color: hsl(0, 0%, 96%);'>
    <div style='max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);'>
        <div style='text-align: background-color: #ffffff;'>
           <a href='https://globalconsular.services/index.php'><img src='https://globalconsular.services/admin/upload/logo/1712751640.png' alt='logo'  style='width: 30%; margin-bottom: 20px;'></a>
        </div>
        <div style='padding: 20px; background-color: #ffffff; border-top: 1px solid #dddddd; border-bottom: 1px solid #dddddd;'>
           <h1 style=\'color: #333;\'>Appointment Details</h1>
        <p style='color: #666;margin-bottom: 20px;'>Dear Admin,</p>
        <p style='color: #666;margin-bottom: 20px;'>This email is to confirm that a new client has submitted their contact details.</p>
        <p style='color: #666;margin-bottom: 20px;'>Below are the contact details for information:</p>
        <ul>
            <li><strong>Contact Person Name:</strong> " . $name . "</li>
            <li><strong>Subject :</strong> " . $subject . "</li>
            <li><strong>Message :</strong> " . $message . "</li>
            <li><strong>Date of Sending Email:</strong> " . date('d-m-Y', strtotime($date)) . "</li>
        </ul>
        <p style='color: #666;margin-bottom: 20px;'>Please review the contact details and proceed with the necessary actions accordingly.</p>
        
        <p style=\'color: #666;margin-bottom: 20px;\'>Best regards,<br>Global Consular Team</p>
        </div>
        <div style='padding: 5px; text-align: center; color: #777;background-image: url(https://globalconsular.services/admin/upload/logo/bgfoot.jpg);'>
          <table cellpadding='0' cellspacing='0' border='0' width='300' align='center'>
                <tr>
                    <td width='280' align='center'>
                        <table cellpadding='0' cellspacing='0' border='0' width='275'>
                            <tr>
                                <td align='center'>
                                  <a href='https://www.facebook.com/people/Global-Consular-Services/61558880248190/'><img src='https://globalconsular.services/admin/upload/logo/facebookicon.png' width='32px' height='32px' alt='facebook' vspace='10' hspace='10'/></a>
                                </td>
                                <td width='1px'></td>
                                <td align='center'>
                                  <a href='https://twitter.com/ConsularGlobal'><img src='https://globalconsular.services/admin/upload/logo/twittericon.png' width='32px' height='32px' alt='twitter' vspace='10' hspace='10'/></a>
                                </td>
                               <td width='1px'></td>
                                
                                <td align='center'>
                                  <a href='https://instagram.com/globalconsular/'><img src='https://globalconsular.services/admin/upload/logo/instagram.png' width='32px' height='32px' instagram' vspace='10' hspace='10'/></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <p style='color: white; font-size: small;text-align: left;'>Unit-201, 2nd Floor,Webel IT Park(Phase-II),Rajarhat, DH Block(Newtown), Action Area 1D, Newtown, West Bengal 700160.</p>
        </div>
    </div>
</body>
";

    $mail->MsgHTML($TemplateMessage);
    // $mail->Send();
//end of edit 
    $_SESSION['successMessage'] = "Details Submmited Successfully";
    header("Location:contact_us.php");
    exit();

}

?>

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="description" content="Global Consular Service">
    <meta name="author" content="">

    <!-- Favicon and touch Icons -->
    <link href="assets/img/logo_new.png" rel="shortcut icon" type="image/png">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="assets/img/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
    <link href="assets/img/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
    <link href="assets/img/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

    <!-- Page Title -->
    <title>Global Consular Service</title>

    <!-- Styles Include -->
    <link rel="stylesheet" href="assets/css/main.css">

</head>


<body>

    <?php include 'includes/header.php'; ?>

    <!-- Aside Info -->


    <!-- Main Wrapper-->
    <main class="wrapper">
        <!-- Page Header -->
        <div class="wptb-page-heading" style="background-image: url('assets/img/background/page-header-bg.jpg');">
            <div class="container">
                <div class="wptb-item--inner">
                    <h2 class="wptb-item--title ">Contact Us</h2>
                    <div class="wptb-breadcrumb-wrap">
                        <!-- <ul class="wptb-breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><span>Contact Us</span></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <section class="wptb-contact-page-wrapper-two">
            <div class="container">
                <div class="wptb-contact-infos">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="wptb-image-box1 wow fadeInLeft">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <img src="assets/img/more/4.jpg" alt="img">
                                    </div>
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--icon">
                                            <img src="assets/img/more/mail.png" alt="icon">
                                        </div>
                                        <h4 class="wptb-item--title">Send Us Mail</h4>
                                        <p class="wptb-item--description">
                                            <a
                                                href="mailto:<?php echo $units['email'] ?>"><?php echo $units['email'] ?></a>
                                            <!-- <br>
                                            <a href="mailto:info.immigway@email.com">info@globalconsular.services</a> -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="wptb-image-box1 wow fadeInLeft">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <img src="assets/img/more/5.jpg" alt="img">
                                    </div>
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--icon">
                                            <img src="assets/img/more/phone.png" alt="icon">
                                        </div>
                                        <h4 class="wptb-item--title">Call Us Anytime</h4>
                                        <p class="wptb-item--description">
                                            <a
                                                href="tel:<?php echo $units['phn_no'] ?>"><?php echo $units['phn_no'] ?></a>
                                            <br>
                                            <!-- <a href="tel:+98765432122814">(+91) 654 321 228 14</a> -->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="wptb-image-box1 wow fadeInLeft">
                                <div class="wptb-item--inner">
                                    <div class="wptb-item--image">
                                        <img src="assets/img/more/6.jpg" alt="img">
                                    </div>
                                    <div class="wptb-item--holder">
                                        <div class="wptb-item--icon">
                                            <img src="assets/img/more/map-pin.png" alt="icon">
                                        </div>
                                        <h4 class="wptb-item--title">Visit Our Office</h4>
                                        <!-- <p class="wptb-item--description"> <?php echo $units['address'] ?></p> -->
                                        <a class="btn--readmore" href="#" id="services" onclick="openModal()">
                                            <p class="wptb-item--description" onclick="openModal(event)">Take
                                                Appointment</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="gmapbox mr-top-20 wow fadeInUp">
                    <iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        id="gmap_canvas"
                        src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Webel%20It%20Park,%20DH%20Block(Newtown),%20Action%20Area%20I,%20PHASE%20II,%20Newtown,%20Kolkata,%20Chakpachuria,%20West%20Bengal%20%20Kolkata+(Global%20Consular)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                    <a href='https://www.easybooking.eu/produkte/julia-hotelsoftware'>Hotelprogramm Buchungssystem</a>
                    <script type='text/javascript'
                        src='https://embedmaps.com/google-maps-authorization/script.js?id=c05e0d96248099c5bf5a555a259558d6a4b0bee1'></script>
                </div> -->

                <div class="wptb-contact-form-two mr-top-100">
                    <div class="wptb-form--wrapper">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="wptb-heading pd-right-30">
                                    <div class="wptb-item--inner text-end">
                                        <h2 class="wptb-item--title mt-0"> <span>Write us what you <br>
                                                want to Know</span></h2>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-7">
                                <form class="wptb-form" action="" method="post">
                                    <div class="wptb-form--inner">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 mb-4">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Name*" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-4">
                                                <div class="form-group">
                                                    <input type="number" name="phone" class="form-control"
                                                        placeholder="Phone No">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-4">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="E-mail*" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 mb-4">
                                                <div class="form-group">
                                                    <input type="text" name="subject" class="form-control"
                                                        placeholder="Subject">
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-12 mb-4">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control"
                                                        placeholder="Message"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-lg-12">
                                                <div class="wptb-item--button text-center">
                                                    <input class="btn" type="submit" value="Contact Us" name="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Newsletter -->
        <div class="wptb-newsletter bg-image" style="background-image: url('assets/img/background/bg-16.jpg');">
            <div class="container">
                <div class="wptb-item--inner">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <h1 class="wptb-item--title wow fadeInLeft">Subscribe for Updates</h1>
                        </div>
                        <div class="col-md-6">
                            <form class="newsletter-form" method="post">
                                <div class="form-group">
                                    <input type="email" name="email_subscribe" class="form-control"
                                        placeholder="Enter your email" required>
                                </div>
                                <button type="submit" name="subscribe" class="btn-readmore style-icon">
                                    <span class="btn-readmore--icon"> <i class="bi bi-send"></i> </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="col-md-5 offset-md-1" style='margin-left: 30.333333%;'>
                    <div class="wptb-appointment-form-one">
                        <div class="wptb-form--wrapper" style='top:55px;'>
                            <form class="wptb-form" action="" method="post">
                                <div class="wptb-form--inner">
                                    <div class="wptb-heading">
                                        <div class="wptb-item--inner text-center">
                                            <h2 class="wptb-item--title" id="appointment" style="font-size: 24px;">
                                                <span>Book An
                                                    Appointment</span>
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <select name="country" class="form-control" required
                                                    style='display:block;'>
                                                    <option value="">Select Country</option>
                                                    <?php $countrys = $db->query("SELECT * FROM `countries` where `is_del`=0 ")->fetchAll();
                                                    foreach ($countrys as $country) {
                                                        ?>
                                                        <option value="<?php echo $country['name'] ?>">
                                                            <?php echo strtoupper($country['name']) ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <select name="service" id="selectService" class="form-control">
                                                    <option value="">Select Service</option>
                                                    <?php $services = $db->query("SELECT * FROM `service_categories` where `is_del`=0 ")->fetchAll();
                                                    foreach ($services as $service) {
                                                        ?>
                                                        <option value="<?php echo $service['title'] ?>">
                                                            <?php echo strtoupper($service['title']) ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Your Full Name*" autocomplete="off" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <input type="number" name="phone" class="form-control"
                                                    placeholder="Phone No" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Email*" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <input type="address" name="address" class="form-control"
                                                    placeholder="Address" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="date" id='datepicker'
                                                    class="flatpickr form-control" placeholder="Select Date" required
                                                    autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-6 mb-4">
                                            <div class="form-group">
                                                <input type="text" name="time" id="timepicker"
                                                    class="timepicker form-control" placeholder="Select Time" required
                                                    autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-lg-12">
                                            <div class="wptb-item--button text-center">
                                                <input class="btn" type="submit" value="Make Appointment"
                                                    name="appointment">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>


    <!-- Core JS -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Framework -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- WOW Scroll Effect -->
    <script src="plugins/wow/wow.min.js"></script>

    <!-- Swiper Slider -->
    <script src="plugins/swiper/swiper-bundle.min.js"></script>

    <!-- Odometer Counter -->
    <script src="plugins/odometer/appear.js"></script>
    <script src="plugins/odometer/odometer.js"></script>

    <!-- Fancybox -->
    <script src="plugins/fancybox/jquery.fancybox.min.js"></script>

    <!-- Flatpickr -->
    <!-- <script src="plugins/flatpickr/flatpickr.min.js"></script> -->

    <!-- Nice Select -->
    <!-- <script src="plugins/nice-select/jquery.nice-select.min.js"></script> -->

    <!-- Theme Custom JS -->
    <script src="assets/js/theme.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">

    <script>
        $(function () {
            // Initialize timepicker
            $('#timepicker').timepicker({
                timeFormat: 'HH:mm', // Set the time format
                interval: 15, // Set the interval between each option
                scrollbar: true // Enable scrollbar for easier selection
            });
        });
    </script>
    <script>


        $(function () {
            $("#datepicker").datepicker({
                dateFormat: 'dd-mm-yy', // Set the date format
                minDate: 0 // Set minimum date to today
            });
        });
    </script>
    <script>
        // Get the modal element
        let modal = document.getElementById("myModal");

        // Function to open modal
        function openModal() {
            // Prevent default behavior
            event.preventDefault();
            console.log('hello');

            // Display the modal
            modal.style.display = "block";
        }

        // Close the modal when clicking outside of it
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        };
    </script>


</body>

</html>