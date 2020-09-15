<?php
  
    require ("phpMailer/class.phpmailer.php");
    require ("phpMailer/PHPMailerAutoload.php");
  
    if(isset($_POST['submit'])){
        $name=$_POST['first_name']; // Get Name value from HTML Form
        $lname=$_POST['last_name'];
        $mobile=$_POST['phone'];  // Get Mobile No
        $email=$_POST['email'];  // Get Email Value
        $message=$_POST['message']; // Get Message Value
          
          
        $mail = new PHPMailer();
          
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Your Domain Name
        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->SMTPSecure='tls';
        $mail->Username = "rockstarharsh29@gmail.com"; // Your Email ID
        $mail->Password = "sunilagarwal"; // Password of your email id
          
       $mail->setFrom('rockstarharsh29@gmail.com','customer');
        $mail->AddAddress ("siddhicollectionpatna@gmail.com"); // On which email id you want to get the message
        // $mail->AddCC ("siddhicollectionpatna@gmail.com");
          
        $mail->IsHTML(true);
          
        $mail->Subject = "Enquiry from Website submitted by $name"; // This is your subject
          
        // HTML Message Starts here
          
        $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$mobile</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$message</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
          
              
        if(!$mail->Send()) {
            // Message if mail has been sent
            echo "<script>
                alert('Submission failed.');
            </script>";
        }
        else {
            // Message if mail has been not sent
            
           echo "<script>
            alert('We have received your mail. We will get back to you shortly!!');
            window.location.href='shop.html';
            </script>";
  
    }
}
?>