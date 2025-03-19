<?php

require "../mail/SMTP.php";
require "../mail/PHPMailer.php";
require "../mail/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

// Function to sanitize and validate input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Define variables
$fname = $lname = $phone = $email = $subject = $message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate each input
    $fname = sanitizeInput($_POST['fname']);
    $lname = sanitizeInput($_POST['lname']);
    $phone = sanitizeInput($_POST['phone']);
    $email = sanitizeInput($_POST['email']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);
   

    // Validate Name
    if (empty($fname)) {
        $errors[] = "First name is required";
    }

    if (empty($lname)) {
      $errors[] = "Last name is required";
  }

     // Validate Mobile
     if (empty($phone)) {
        $errors[] = "Phone Number is required";
    } elseif (!preg_match('/^\d{4,16}$/', $phone)) {
        $errors[] = "Phone Number should be numbers between 4 and 16 digits";
    }

    // Validate Email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate Message
    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If no errors, you can proceed with further actions
    if (empty($errors)) { 
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'et.website.message@gmail.com';
        $mail->Password = 'glalywegifqhgjhf';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('et.website.message@gmail.com', 'Skill-y');
        $mail->addReplyTo('et.website.message@gmail.com', 'Skill-y');
    
        // First email to 'info@skilly.co.nz'
        $mail->addAddress('info@skilly.co.nz');
        $mail->isHTML(true);
        $mail->Subject = 'Client message';
        $bodyContent = '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <style>
    table, td, div, h1, p {font-family: Arial, sans-serif;}
  </style>
</head>
<body style="margin:0;padding:0;">
  <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
    <tr>
      <td align="center" style="padding:0;">
        <table role="presentation" style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
          <tr>
            <td align="center" style="padding:0 0 0 0;background:#70bbd9;">
              <img src="https://skilly.co.nz/resources/img/email_banner.png" alt="" width="100%" style="height:auto;display:block;" />
            </td>
          </tr>
          <tr>
            <td style="padding:20px 10px 20px 10px;">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                <tr>
                  <td style="padding:0 0 36px 0;color:#153643;">
                    <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif; color:black;">Hey Mr. Madhawa,</h1>
                    <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif; color:black;"><b style="font-size: 1.3rem; color:black;">You have new email!</b> Exciting updates and important messages await your attention. Check your inbox to stay informed about the latest news, offers, and communications tailored just for you. Do not miss out on any vital information open your email now and discover what is waiting for you today!</p>
                    <p style="margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;">
                      <table>
                        <tr>
                          <th>Name</th>
                          <td><b>:</b> ' . $fname . '&nbsp;' . $lname . '</td>
                        </tr>
                        <tr>
                          <th>Mobile Number</th>
                          <td><b>:</b> ' . $phone . '</td>
                        </tr>
                        <tr>
                          <th>Email Address</th>
                          <td><b>:</b> ' . $email . '</td>
                        </tr>
                        <tr>
                          <th>Subject</th>
                          <td><b>:</b> ' . $subject . '</td>
                        </tr>
                        <tr>
                          <th>Message</th>
                          <td><b>:</b> ' . $message . '</td>
                        </tr>
                      </table>
                    </p>
                  </td>
                </tr>
                <tr>
                  <td style="width:260px;padding:0;vertical-align:top;color:#153643;">
                          <p style="margin:0 0 25px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><img src="https://skilly.co.nz/resources/img/sec3img.png" alt="" width="100%" style="height:auto;display:block;" /></p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:30px;background-image: linear-gradient(135deg,rgba(0,255,0,0.9),rgba(255, 115, 0, 0.9),rgba(0, 162, 255, 0.9));">
              <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;">
                <tr>
                  <td style="padding:0;width:50%;" align="left">
                    <p style="margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#000000;">
                      Copyright &#169; 2025 <a href="https://evotechsoftwaresolutions.com" style="color:#000000;text-decoration:underline;">Evon Technologies Software Solutions (PVT) Ltd.
                        <br>
                        EVOTECH
                      </a>
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>';
        $mail->Body = $bodyContent;
    
        if (!$mail->send()) {
            echo 'Service Unavailable. Please try again later';
        } else {
            echo 'Message Sent successfully';
        }
    
        // Clear recipients to send another email
        $mail->clearAddresses();
    
        // Second email to another email address
        $mail->addAddress($email); // Replace with the second email address
        $mail->Subject = 'Skill-y';
        $bodyContent = '<!DOCTYPE html>    
<html>    
<head>

<title></title>
<link rel="shortcut icon" href="https://email-tracking-assets.benchmarkemail.com/images/favicon.png">

<meta name="googlebot" content="noindex" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"/>
        <link rel="stylesheet" href="https://email-tracking-assets.benchmarkemail.com/style/dhtmlwindow.css" type="text/css" />
        <script type="text/javascript" src="https://email-tracking-assets.benchmarkemail.com/script/dhtmlwindow.js">
            /***********************************************
            * DHTML Window Widget-   Dynamic Drive (www.dynamicdrive.com)
            * This notice must stay intact for legal use.
            * Visit www.dynamicdrive.com for full source code
            ***********************************************/
        </script>
        <link rel="stylesheet" href="https://email-tracking-assets.benchmarkemail.com/style/modal.css" type="text/css" />
        <script type="text/javascript" src="https://email-tracking-assets.benchmarkemail.com/script/modal.js"></script>
        
<meta content="width=device-width, initial-scale=1.0" name="viewport">    
<style type="text/css">
    
/*** BMEMBF Start ***/
    
/* CMS V4 Editor Test */
    
[name=bmeMainBody]{min-height:1000px;}
    
@media only screen and (max-width: 480px){table.blk, table.tblText, .bmeHolder, .bmeHolder1, table.bmeMainColumn{width:100% ;} }    
    
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable td.tblCell{padding:0px 20px 20px 20px ;} }    
    
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable.bmeCaptionTableMobileTop td.tblCell{padding:20px 20px 0 20px ;} }    
    
@media only screen and (max-width: 480px){table.bmeCaptionTable td.tblCell{padding:10px ;} }    
    
@media only screen and (max-width: 480px){table.tblGtr{ padding-bottom:20px ;} }    
    
@media only screen and (max-width: 480px){td.blk_container, .blk_parent, .bmeLeftColumn, .bmeRightColumn, .bmeColumn1, .bmeColumn2, .bmeColumn3, .bmeBody{display:table ;max-width:600px ;width:100% ;} }    
    
@media only screen and (max-width: 480px){table.container-table, .bmeheadertext, .container-table { width: 95% ; } }    
    
@media only screen and (max-width: 480px){.mobile-footer, .mobile-footer a{ font-size: 13px ; line-height: 18px ; } .mobile-footer{ text-align: center ; } table.share-tbl { padding-bottom: 15px; width: 100% ; } table.share-tbl td { display: block ; text-align: center ; width: 100% ; } }    
    
@media only screen and (max-width: 480px){td.bmeShareTD, td.bmeSocialTD{width: 100% ; } }    
    
@media only screen and (max-width: 480px){td.tdBoxedTextBorder{width: auto ;} }
    
@media only screen and (max-width: 480px){th.tdBoxedTextBorder{width: auto ;} }
    

    
@media only screen and (max-width: 480px){table.blk, table[name=tblText], .bmeHolder, .bmeHolder1, table[name=bmeMainColumn]{width:100% ;} }
    
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable td[name=tblCell]{padding:0px 20px 20px 20px ;} }
    
@media only screen and (max-width: 480px){.bmeImageCard table.bmeCaptionTable.bmeCaptionTableMobileTop td[name=tblCell]{padding:20px 20px 0 20px ;} }
    
@media only screen and (max-width: 480px){table.bmeCaptionTable td[name=tblCell]{padding:10px ;} }
    
@media only screen and (max-width: 480px){table[name=tblGtr]{ padding-bottom:20px ;} }
    
@media only screen and (max-width: 480px){td.blk_container, .blk_parent, [name=bmeLeftColumn], [name=bmeRightColumn], [name=bmeColumn1], [name=bmeColumn2], [name=bmeColumn3], [name=bmeBody]{display:table ;max-width:600px ;width:100% ;} }
    
@media only screen and (max-width: 480px){table[class=container-table], .bmeheadertext, .container-table { width: 95% ; } }
    
@media only screen and (max-width: 480px){.mobile-footer, .mobile-footer a{ font-size: 13px ; line-height: 18px ; } .mobile-footer{ text-align: center ; } table[class="share-tbl"] { padding-bottom: 15px; width: 100% ; } table[class="share-tbl"] td { display: block ; text-align: center ; width: 100% ; } }
    
@media only screen and (max-width: 480px){td[name=bmeShareTD], td[name=bmeSocialTD]{width: 100% ; } }
    
@media only screen and (max-width: 480px){td[name=tdBoxedTextBorder]{width: auto ;} }
    
@media only screen and (max-width: 480px){th[name=tdBoxedTextBorder]{width: auto ;} }
    
           
    
@media only screen and (max-width: 480px){.bmeImageCard table.bmeImageTable{height: auto ; width:100% ; padding:20px ;clear:both; float:left ; border-collapse: separate;} }            
    
@media only screen and (max-width: 480px){.bmeMblInline table.bmeImageTable{height: auto ; width:100% ; padding:10px ;clear:both;} }
    
@media only screen and (max-width: 480px){.bmeMblInline table.bmeCaptionTable{width:100% ; clear:both;} }
    
@media only screen and (max-width: 480px){table.bmeImageTable{height: auto ; width:100% ; padding:10px ;clear:both; } }
    
@media only screen and (max-width: 480px){table.bmeCaptionTable{width:100% ;  clear:both;} }
    
@media only screen and (max-width: 480px){table.bmeImageContainer{width:100% ; clear:both; float:left ;} }            
    
@media only screen and (max-width: 480px){table.bmeImageTable td{padding:0px ; height: auto; } }            
    
@media only screen and (max-width: 480px){img.mobile-img-large{width:100% ; height:auto ;} }
    
@media only screen and (max-width: 480px){img.bmeRSSImage{max-width:320px; height:auto ;} }
    
@media only screen and (min-width: 640px){img.bmeRSSImage{max-width:600px ; height:auto ;} }            
    
@media only screen and (max-width: 480px){.trMargin img{height:10px;} }          
    
@media only screen and (max-width: 480px){div.bmefooter, div.bmeheader{ display:block ;} }  
    
@media only screen and (max-width: 480px){.tdPart{ width:100% ; clear:both; float:left ; } }
    
@media only screen and (max-width: 480px){table.blk_parent1, table.tblPart {width: 100% ; } }            
    
@media only screen and (max-width: 480px){.tblLine{min-width: 100% ;} }            
    
@media only screen and (max-width: 480px){.bmeMblCenter img { margin: 0 auto; } }   
    
@media only screen and (max-width: 480px){.bmeMblCenter, .bmeMblCenter div, .bmeMblCenter span  { text-align: center ; text-align: -webkit-center ; } }
    
@media only screen and (max-width: 480px){.bmeNoBr br, .bmeImageGutterRow, .bmeMblStackCenter .bmeShareItem .tdMblHide { display: none ; } }
    
@media only screen and (max-width: 480px){.bmeMblInline table.bmeImageTable, .bmeMblInline table.bmeCaptionTable, .bmeMblInline { clear: none ; width:50% ; } }
    
@media only screen and (max-width: 480px){.bmeMblInlineHide, .bmeShareItem .trMargin { display: none ; } }
    
@media only screen and (max-width: 480px){.bmeMblInline table.bmeImageTable img, .bmeMblShareCenter.tblContainer.mblSocialContain, .bmeMblFollowCenter.tblContainer.mblSocialContain{width: 100% ; } }
    
@media only screen and (max-width: 480px){.bmeMblStack> .bmeShareItem{width: 100% ; clear: both ;} }
    
@media only screen and (max-width: 480px){.bmeShareItem{padding-top: 10px ;} }            
    
@media only screen and (max-width: 480px){.tdPart.bmeMblStackCenter, .bmeMblStackCenter .bmeFollowItemIcon {padding:0px ; text-align: center ;} }
    
@media only screen and (max-width: 480px){.bmeMblStackCenter> .bmeShareItem{width: 100% ;} }
    
@media only screen and (max-width: 480px){ td.bmeMblCenter {border: 0 none transparent ;} }
    
@media only screen and (max-width: 480px){.bmeLinkTable.tdPart td{padding-left:0px ; padding-right:0px ; border:0px none transparent ;padding-bottom:15px ;height: auto ;} }
    
@media only screen and (max-width: 480px){.tdMblHide{width:10px ;} }            
    
@media only screen and (max-width: 480px){.bmeShareItemBtn{display:table ;} }
    
@media only screen and (max-width: 480px){.bmeMblStack td {text-align: left ;} }
    
@media only screen and (max-width: 480px){.bmeMblStack .bmeFollowItem{clear:both ; padding-top: 10px ;} }
    
@media only screen and (max-width: 480px){.bmeMblStackCenter .bmeFollowItemText{padding-left: 5px ;} }
    
@media only screen and (max-width: 480px){.bmeMblStackCenter .bmeFollowItem{clear:both ;align-self:center; float:none ; padding-top:10px;margin: 0 auto;} }            
    
@media only screen and (max-width: 480px){
    
.tdPart> table{width:100% ;}
    
}
    
@media only screen and (max-width: 480px){.tdPart>table.bmeLinkContainer{ width:auto ; } }
    
@media only screen and (max-width: 480px){.tdPart.mblStackCenter>table.bmeLinkContainer{ width:100% ;} } 
    
.blk_parent:first-child, .blk_parent{float:left;}            
    
.blk_parent:last-child{float:right;} 
    
</style>
</head>    
<body topmargin="0" leftmargin="0" style="height: 100% ; margin: 0; padding: 0; width: 100% ;min-width: 100%;">  
    
<table name="bmeMainBody" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255);"><tbody><tr><td align="center" valign="top" width="100%" style="border: none;">    
<table name="bmeMainColumnParentTable" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td name="bmeMainColumnParent" style="border-collapse: separate; border: none; border-radius: 0px; border-spacing: 0px; overflow: visible;">     
<table name="bmeMainColumn" class="bmeMainColumn" style="max-width: 100%; overflow: visible;" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody><tr id="section_1" class="flexible-section" data-columns="1" data-section-type="bmePreHeader"><td class="blk_container bmeHolder" name="bmePreHeader" align="center" valign="top" width="100%" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102); border: none;"></td></tr> <tr><td name="bmeMainContentParent" class="bmeHolder" align="center" valign="top" width="100%" style="border-collapse: separate; border: none; border-radius: 0px; border-spacing: 0px; overflow: hidden;">     
<table name="bmeMainContent" style="border-radius: 0px; border-collapse: separate; border-spacing: 0px; overflow: visible; border-color: transparent; border-width: 0px; border-style: none;" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"> <tbody><tr id="section_2" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder" name="bmeHeader" align="center" valign="top" width="100%" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255); border: none;"><div id="dv_7" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td style="border: none;">    
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 20px; border: none;"><img    
 src="https://skilly.co.nz/resources/img/logo.png" width="100" style="max-width: 100px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="108" class="keep-custom-width" data-customwidth="50"></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div>    
<div id="dv_8" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td style="border: none;">    
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="border: none;">    
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word; border: none;"><div style="line-height: 125%; text-align: center;"><span style="color: rgb(0, 0, 0); font-size: 40px;"><strong><span style="line-height: 125%; font-family: Georgia, Times,serif;">Hey ' . $fname . '&nbsp;' . $lname . ', Your</span></strong></span></div>    
<div style="line-height: 125%; text-align: center;"><span style="color: rgb(0, 0, 0); font-size: 40px;"><strong><span style="line-height: 125%; font-family: Georgia, Times,serif;">Email Sent</span></strong></span></div>    
<div style="line-height: 125%; text-align: center;"><span style="color: rgb(0, 0, 0); font-size: 40px;"><strong><span style="line-height: 125%; font-family: Georgia, Times,serif;">Succerssfully</span></strong></span></div></td></tr></tbody>    
</table></th></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_1" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td style="border: none;">    
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="border: none;">    
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word; border: none;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 16px; line-height: 150%;">Level Up Your Valuable Life with Skill-y!</span></div></td></tr></tbody>    
</table></th></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_9" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_image"><tbody><tr><td style="border: none;">    
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center" class="bmeImage" style="border-collapse: collapse; padding: 0px 20px; border: none;"><img    
 src="https://images.benchmarkemail.com/client597226/image16012423.png" class="mobile-img-large" width="560" style="max-width: 1276px; display: block; border-radius: 0px;" alt="" data-radius="0" border="0" data-original-max-width="1276"></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div></td></tr> <tr id="section_3" class="flexible-section" data-columns="1"><td class="blk_container bmeHolder bmeBody" name="bmeBody" align="center" valign="top" width="100%" bgcolor="#F1F1F1" style="background-color: rgb(241, 241, 241); color: rgb(54, 56, 56); border: none;">    
<div id="dv_21" class="blk_wrapper">    
<table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding: 20px 0px; border: none;" class="tblCellMain">    
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" class="tblLine"><tbody><tr><td style="border: none;"><span></span></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_3" class="blk_wrapper">    
<table class="blk" name="blk_text" width="600" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="border: none;">    
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th valign="top" align="center" class="tdPart" style="border: none;">    
<table name="tblText" style="float:left;" align="left" border="0" cellpadding="0" cellspacing="0" class="tblText" width="600"><tbody><tr><td name="tblCell" style="padding: 10px 20px; font-size: 14px; font-weight: 400; font-family: Arial, Helvetica, sans-serif; color: rgb(56, 56, 56); text-align: left; word-break: break-word; border: none;" align="left" valign="top" class="tblCell"><div style="line-height: 150%; text-align: center;"><span style="font-size: 16px; line-height: 150%; font-family: Helvetica, Arial, sans-serif;">Thank you for reaching out! We have successfully received your message and will get back to you as soon as possible. In the meantime, stay connected with us on social media for the latest updates, exclusive offers, and valuable insights on your study abroad journey!</span></div></td></tr></tbody>    
</table></th></tr></tbody>    
</table></td></tr></tbody>    
</table></div>    
<div id="dv_4" class="blk_wrapper">    
<table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding: 20px 0px; border: none;" class="tblCellMain">    
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" class="tblLine"><tbody><tr><td style="border: none;"><span></span></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_10" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_button"><tbody><tr><td width="20" style="border: none;"></td><td align="center" style="border: none;">    
<table class="tblContainer" cellspacing="0" cellpadding="0" border="0" width="100%"><tbody><tr><td height="10" style="border: none;"></td></tr><tr><td align="center" style="border: none;">    
<table cellspacing="0" cellpadding="0" border="0" class="bmeButton" align="center" style="border-collapse: separate;"><tbody><tr><td style="border-radius: 0px; border: 1px solid rgb(0, 0, 0); background-color: rgb(0, 0, 0); text-align: center; font-family: Arial, Helvetica, sans-serif; font-size: 14px; padding: 20px 40px; font-weight: bold; word-break: break-word; border-collapse: separate;border-radius: 2rem;" class="bmeButtonText"><span style="font-family:Arial, Verdana; font-size:14px;color:#FFFFFF;"><a style="color:#FFFFFF;text-decoration:none;" target="_blank" href="https://skilly.co.nz">VISIT US</a></span></td></tr></tbody>    
</table></td></tr><tr><td height="10" style="border: none;"></td></tr></tbody>    
</table></td><td width="20" style="border: none;"></td></tr></tbody>    
</table></div><div id="dv_2" class="blk_wrapper">    
<table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding: 20px 0px; border: none;" class="tblCellMain">    
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" class="tblLine"><tbody><tr><td style="border: none;"><span></span></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_12" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_text"><tbody><tr><td style="border: none;">    
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="bmeContainerRow"><tbody><tr><th class="tdPart" valign="top" align="center" style="border: none;">    
<table cellspacing="0" cellpadding="0" border="0" width="600" name="tblText" class="tblText" style="float:left; background-color:transparent;" align="left"><tbody><tr><td valign="top" align="left" name="tblCell" class="tblCell" style="padding: 10px 20px; font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: 400; color: rgb(56, 56, 56); text-align: left; word-break: break-word; border: none;"><div style="line-height: 150%; text-align: center;"><span style="font-size: 25px;"><strong><span style="line-height: 150%; font-family: Georgia, Times,serif; color: rgb(0, 0, 0);">CONNECT WITH US</span></strong></span></div>    
<div style="line-height: 150%; text-align: center;"><span style="font-size: 25px;"><strong><span style="line-height: 150%; font-family: Georgia, Times,serif; color: rgb(0, 0, 0);">ONLINE</span></strong></span></div></td></tr></tbody>    
</table></th></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_15" class="blk_wrapper">    
<table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding: 20px 0px; border: none;" class="tblCellMain">    
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" class="tblLine"><tbody><tr><td style="border: none;"><span></span></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_14" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_imagecaption" style="width: 600px;"><tbody><tr><td style="border: none;">    
<table cellspacing="0" cellpadding="0" class="bmeCaptionContainer" width="100%" style="padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px;border-collapse:separate;"><tbody><tr><td class="bmeImageContainerRow" valign="top" gutter="10" style="border: none;">    
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr><td class="tdPart" valign="top" style="border: none;">    
<table cellspacing="0" cellpadding="0" border="0" class="bmeImageContainer" width="100%" align="left" style="float:left;"><tbody><tr><td valign="top" name="tdContainer" style="border: none;">    
<table cellspacing="0" cellpadding="0" border="0" class="bmeImageTable" dimension="50%" imgid="1" style="float: right; width: 270px;" align="right" width="270" height="159"><tbody><tr><td name="bmeImgHolder" width="50%" align="center" valign="top" height="159" style="border: none;"><img    
 src="https://skilly.co.nz/resources/img/email_pic.png" class="mobile-img-large" style="max-width: 458px; display: block; border-radius: 0px;" alt="" data-radius="0" data-original-max-width="458" border="0" width="270"></td></tr></tbody>    
</table>    
<table cellspacing="0" cellpadding="0" border="0" class="bmeCaptionTable" style="float: left; width: 270px; word-break: break-word;" align="left" width="270"><tbody><tr><td name="tblCell" class="tblCell" valign="top" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; font-weight: normal; color: rgb(56, 56, 56); text-align: left; word-break: break-word; border: none;"><div style="line-height: 150%;"><span style="font-size: 25px; color: rgb(0, 0, 0);"><strong><span style="line-height: 150%; font-family: Georgia, Times,serif;">Follow Us Now</span></strong></span></div>    
<div style="line-height: 150%;"><span style="font-family: Helvetica, Arial, sans-serif; color: rgb(130, 130, 130);">Join our community and stay informed! Follow us now for expert study abroad tips, the latest updates, and exclusive opportunities. Engage, connect, and take the next step toward your international education journey with Skilly.co.nz!</span></div></td></tr></tbody>    
</table></td></tr></tbody>    
</table></td></tr></tbody>    
</table></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_17" class="blk_wrapper">    
<table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding: 20px 0px; border: none;" class="tblCellMain">    
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" class="tblLine"><tbody><tr><td style="border: none;"><span></span></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div></td></tr>  </tbody>    
</table> </td></tr> <tr id="section_5" class="flexible-section" data-columns="1" data-section-type="bmeFooter"><td class="blk_container bmeHolder" name="bmeFooter" align="center" valign="top" width="100%" bgcolor="#ffffff" style="background-color: rgb(255, 255, 255); color: rgb(102, 102, 102); border: none;"><div id="dv_26" class="blk_wrapper">    
<table cellspacing="0" cellpadding="0" border="0" name="blk_divider" width="600" class="blk"><tbody><tr><td style="padding: 20px 0px; border: none;" class="tblCellMain">    
<table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-top-width: 0px; border-top-style: none; min-width: 1px;" class="tblLine"><tbody><tr><td style="border: none;"><span></span></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_25" class="blk_wrapper">    
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_social_follow"><tbody><tr><td class="tblCellMain" align="center" style="padding-top:10px; padding-bottom:10px; padding-left:20px; padding-right:20px;">    
<table class="tblContainer mblSocialContain" cellspacing="0" cellpadding="0" border="0" align="center" style="text-align:center;"><tbody><tr><td class="tdItemContainer ui-sortable" >    
<table cellspacing="0" cellpadding="0" border="0" class="mblSocialContain" style="table-layout: auto;"><tbody><tr><td valign="top" name="bmeSocialTD"><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="facebook" style="float:left;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="20" style="padding-right:20px;height:20px;"><a href="https://www.facebook.com/share/17WKqDuzDR/?mibextid=wwXIfr" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: solid; border-width: 5px; border-color: rgb(0, 0, 0);border-radius: 2rem;" target="_blank"><img    
 src="https://skilly.co.nz/resources/img/footer/facebook.png" alt="Facebook" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>    
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="youtube" style="float:left;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="20" style="padding-right:20px;height:20px;"><a href="http://www.youtube.com/@Skillly" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: solid; border-width: 5px; border-color: rgb(0, 0, 0);border-radius: 2rem;" target="_blank"><img    
 src="https://skilly.co.nz/resources/img/footer/youtube.png" alt="YouTube" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>    
</table><!--[if gte mso 6]></td><td align="left" valign="top"><![endif]-->    
<table cellspacing="0" cellpadding="0" border="0" class="bmeFollowItem" type="instagram" style="float:left;" align="left"><tbody><tr><td align="left" class="bmeFollowItemIcon" gutter="20" width="20" style="height:20px;"><a href="https://api.whatsapp.com/send?phone=64273296864" target="_blank" style="display: inline-block;background-color: rgb(0, 0, 0);border-radius: 0px;border-style: solid; border-width: 5px; border-color: rgb(0, 0, 0);border-radius: 2rem;" target="_blank"><img    
 src="https://skilly.co.nz/resources/img/footer/whatsapp.png" alt="Instagram" style="display: block; max-width: 114px;" border="0" width="24" height="24"></a></td></tr></tbody>    
</table></td></tr></tbody>    
</table></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div><div id="dv_5" class="blk_wrapper">      
<table width="600" cellspacing="0" cellpadding="0" border="0" class="blk" name="blk_footer"><tbody><tr><td name="tblCell" class="tblCell" style="padding: 20px; word-break: break-word;" valign="top" align="left">    
<table cellpadding="0" cellspacing="0" border="0" width="100%"><tbody><tr><td name="bmeBadgeText" style="text-align:center; word-break: break-word;" align="center"><span id="spnFooterText" style="font-family: Arial, Helvetica, sans-serif; font-weight: normal; font-size: 11px; line-height: 140%;">This is an automated email    
    <br>Skill-y
    <br>9 Siltstone Street, Rolleston 7614, New Zealand
<br>+64 273 296 864</span>   
<br></span></td></tr><tr><td name="bmeBadgeImage" style="text-align:center;padding-top:20px;" align="center"><a href="https://evotechsoftwaresolutions.com" target="_new"><img    
 src="https://srilankatourexperts.com/resources/img/logo2.png" style="max-width:56px;" border="0"></a></td></tr></tbody>  
</span>

</td></tr><tr><td name="bmeBadgeImage" style="text-align:center;" align="center"><a href="https://evotechsoftwaresolutions.com" target="_new" style="color: black;font-family: Arial, Helvetica, sans-serif;font-size: 12px;text-decoration: none;">Design and Develop By<br><span style="text-decoration: underline;">Evon Technologies Software Solution (PVT) Ltd.</span></a></td></tr></tbody>    
</table></td></tr></tbody>    
</table></div></td></tr></tbody>    
</table></td></tr></tbody>    
</table></td></tr></tbody>    
</table>    
<!-- Test Path -->    
    
    <br />    
    <br /><div align="center">    
<div style="font-size: 11px; text-align: left;">    
    
</div></div>    
    <br />    
    <br /><!-- /Test Path -->    
</body>    
</html>
';
        $mail->Body = $bodyContent;
    
        if (!$mail->send()) {
            echo 'Service Unavailable for second email. Please try again later';
        }
    } else {
        echo $errors[0];
    }
    


}