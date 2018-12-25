<?php
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        //your site secret key
        $secret = '6LcG9n4UAAAAALkHWHbP4t23t2EEtjp4Bfcx6mR1';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){

        }else{
        	echo "recaptcha_error";
        	exit;
        }
        
}else{
        	echo "recaptcha_validation";
        	exit;
}

$fullname = $_POST['fullname'];
if(empty($fullname)){
    echo 'validation';
    exit;
}

$email = $_POST['email'];
if(empty($email)){
    echo 'validation';
    exit;
}

$budget = $_POST['budget'];
if(empty($budget)){
    echo 'validation';
    exit;
}

$message = $_POST['message'];
if(empty($message)){
    echo 'validation';
    exit;
}

$services = implode(" ",$_POST['services']);
if(empty($services)){
    echo 'validation';
    exit;
}

if(!empty($_FILES['file_source']['tmp_name'])){
    $filename1 = $_FILES['file_source']['name'];
    $sourcePath = $_FILES['file_source']['tmp_name'];       // Storing source path of the file in a variable
    $targetPath = "/var/www/html/finntia/uploads-attach/".$_FILES['file_source']['name']; // Target path where file is to be stored
    move_uploaded_file($sourcePath,$targetPath) ;
    
    $filename = "https://finntia.io/uploads-attach/".$filename1;
    
}else{
    $filename = "No document";
}


$to = "contact@finntia.io";

$subject = "Contact Us Details for ".$fullname;

$message1 = "<html><head></head><body>
<p>Hello,</p>
<table>
<tr>
<td width='25%'>FullName</td>
<td width='75%'>".$fullname."</td>
</tr>
<tr>
<td>Email</td>
<td>".$email."</td>
</tr>
<tr>
<td>Services</td>
<td>".$services."</td>
</tr>
<tr>
<td>Budget</td>
<td>Upto ".$budget."k</td>
</tr>
<tr>
<td>Message</td>
<td>".$message."</td>
</tr>
<tr>
<td>Attechment</td>
<td>".$filename."</td>
</tr>
<tr>
<td>Thanks</td>
<td></td>
</tr>
</table>
</body>
</html>";

// Always set content-type when sending HTML email

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: Finntia<contact@finntia.io>' . "\r\n";

mail($to,$subject,$message1,$headers);
echo "sent";
?>
