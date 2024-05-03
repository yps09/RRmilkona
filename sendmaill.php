

<?php
                    include 'connection.php';
					 // ================
                    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$mail = new PHPMailer;                              // Passing `true` enables exceptions

                    // ===================  

                    if(isset($_POST['submit'])){

                    $name=$_POST['name'];
                    $distributortable=$_POST['your-designation'];
                    $company=$_POST['company-name'];
                    $email=$_POST['email'];
                    $mobile=$_POST['your-mobile'];
                    $country=$_POST['c-s-c'];
                    $message=$_POST['Message'];
                    $captcha=$_POST['ctext'];

                    $insertquery = "INSERT INTO distributor(id,name,distributortable,company,email,mobile,country,message) VALUES (1,'$name','$distributortable','$company','$email','$mobile','$country','$message')";


                    //$res= mssql_query($insertquery,$con);
						//mssql_query($query,$dbc)
						 $res=sqlsrv_query($con,$insertquery);
						
						
if($res){
    //Server settings
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'webmail.rrmilkona.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'enquiry@rrmilkona.com';                 // SMTP username
    $mail->Password = 'Enquiry@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ]
];	
	
    $mail->Port = 25;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('enquiry@rrmilkona.com', 'enquiry@rrmilkona.com');
    $mail->addAddress('info@rrmilkona.com');     // Add a recipient
    //$mail->addReplyTo('piyushmishra2501@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Enquiry Contact From' ;

	$mailContent = "<table width='50%'>
    <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9;'>
    Name
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $name
    </td>
    </tr>
     <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9;'>
    Distributortable
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $distributortable
    </td>
    </tr>
    <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9;'>
    Company
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $company
    </td>
    </tr>
    <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9;'>
    Email
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $email
    </td>
    </tr>
    <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9'>
    Mobile
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $mobile
    </td>
    </tr>

    <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9;'>
    Country
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $country
    </td>
    </tr>

    <tr>
    <td style='border:1px solid black; color:white; background:#b44040c9;'>
    Message
    </td>
    <td style='border:1px solid black; color:white; background:#dc0d2a;'>
    $message
    </td>
    </tr>
    
    
    
    </table>
<h2></h2>
";

    $mail->Body    = $mailContent ;
    $mail->send();

if(!$mail->send()){
    echo '';
    echo 'Error: '. $mail->ErrorInfo;
	
}else{
	echo '';
	//header("Location: http://rrmilkona.com/index.html");
	
 
}
	if($res==true){
							header("Location: thankq.html");
							exit();
						}
	
}
					
						
											/*	if( $res === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
			echo "Query: ".$insertquery."<br />";
			echo "Connection: ".$con."<br />";
        }
    }
}	*/					
}
						

?>