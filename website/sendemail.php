<?php
    if(isset($_POST['email']))
    {
        $name = $_POST['name']; // Get Name value from HTML Form
        $email_id = $_POST['email'];
        $subject = $_POST['subject'];		// Get Email Value
        $mobile_no = $_POST['phone']; // Get Mobile No
        $msg = $_POST['message']; // Get Message Value
         
        $to = "satyamsoniii123@gmail.com"; // You can change here your Email
        $subject = "Enquiry from '$email_id' has been sent a mail"; // This is your subject
         
        // HTML Message Starts here    

          $message = wordwrap($message, 70, "\r\n");
       
 $message ="
        <html>
            <body>
                
<table  style='border-collapse: collapse; height: 100%; margin: 0; padding: 0; width: 100%; background-color: #e9eaec;' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td  style='height: 100%; margin: 0; padding: 50px 50px; width: 100%;' align='center' valign='top'><img src='' />
<table  style='border-collapse: collapse; border: 0; max-width: 600px!important;' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td  style='background-color: #ffffff; border-top: 10px solid #209550; padding-top: 0; padding-bottom: 0px; border-bottom: 10px solid black;' valign='top'>
<table style='min-width: 100%; border-collapse: collapse;' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td valign='top'>
<table  style='min-width: 100%; border-collapse: collapse;' border='0' width='100%' cellspacing='0' cellpadding='0' align='left'>
<tbody>
<tr>
<td  style='padding: 30px;' valign='top'>

<table style='border-top: 1px solid #dddddd; display: block; min-width: 100%; border-collapse: collapse; width: 100%;' border='0' width='100%' cellspacing='0' cellpadding='0' align='left'>
<tbody>
<tr>
<td style='color: #f58220; padding-top: 20px; padding-bottom: 3px;'><strong>Name</strong></td>
</tr>
<tr>
<td style='color: #2e3192; padding-top: 3px; padding-bottom: 20px;'>$name</td>
</tr>
</tbody>
<tbody>
<tr>
<td style='color: #f58220; padding-top: 20px; padding-bottom: 3px;'><strong>Email</strong></td>
</tr>
<tr>
<td style='color: #2e3192; padding-top: 3px; padding-bottom: 20px;'><a href='mailto:' target='_blank' rel='noopener'>$email_id</a></td>
</tr>
</tbody>
<tbody>
<tr>
<td style='color: #f58220; padding-top: 20px; padding-bottom: 3px;'><strong>Number</strong></td>
</tr>
<tr>
<td style='color: #2e3192; padding-top: 3px; padding-bottom: 20px;'>$mobile_no</td>
</tr>
</tbody>
<tbody>
<tr>
<td style='color: #f58220; padding-top: 20px; padding-bottom: 3px;'><strong>Message</strong></td>
</tr>
<tr>
<td style='color: #2e3192; padding-top: 3px; padding-bottom: 20px;'>$msg</td>
</tr>
</tbody>




</table>

</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td  style='background-color: #e9eaec; border-top: 0; border-bottom: 0; padding-top: 12px; padding-bottom: 12px;' valign='top'>
<table style='min-width: 100%; border-collapse: collapse;' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td valign='top'>
<table  style='min-width: 100%; border-collapse: collapse;' border='0' width='100%' cellspacing='0' cellpadding='0' align='left'>
<tbody>
<tr>
<td  style='word-break: break-word; color: #aaa; font-family: Helvetica; font-size: 12px; line-height: 150%; text-align: center; padding: 9px 18px 9px 18px;' valign='top'>Sent from <a style='color: #bbbbbb;' href='#' target='_blank' rel='noopener' data-saferedirecturl='#'>Just SST Design</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>

            </body>
        </html>
        ";
        // HTML Message Ends here
         
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
        // More headers
        $headers .= 'From: Enquiry From <hi@.com>' . "\r\n";
        
         $headers .= 'Reply-To: '.$email_id. "\r\n";
         
         // Give an email id on which you want get a reply. User will get a mail from this email id
        $headers .= 'Bcc:@gmail.com' . "\r\n"; // If you want add Bcc
         
        if(mail($to,$subject,$message,$headers)){
            // Message if mail has been sent
           header("Location: thanks.html");
        }
 
        else{
            // Message if mail has been not sent
            echo "<script>
                    alert('EMAIL FAILED');
                </script>";
        }
    }
?>

