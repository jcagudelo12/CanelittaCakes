<?php if(isset($_POST["username"]))  
{
	// Read the form values
	$success = false;
	$userName = isset( $_POST['username'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['username'] ) : "";
	$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
	$message = isset( $_POST['contact_message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['contact_message'] ) : "";
	
	//Headers
	$to = ""; // Your email address goes here
    $subject = 'Contact Us';
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	//body message
	$message = "Name: ". $userName . "<br>
	Email: ". $senderEmail . "<br>
	Message: " . $message . "";
	
	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);
      
    echo ($send_email) ? '<div class="success">Email has been sent successfully.</div>' : 'Error sending. Please try again later.';
}
else
{
	echo '<div class="failed">Error: Faild to send. Please try again later.</div>';
}
?>