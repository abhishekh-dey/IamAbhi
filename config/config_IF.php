<?php
$name = $_POST ['name'];
$visitor_email = $_POST ['email'];
$subject_visitor = $_POST ['subject'];
$message = $_POST ['message'];
if (!empty($name) || !empty($visitor_email) || !empty($subject_visitor) || !empty($message)) {
	$host = "sql208.epizy.com";
    $dbUsername = "epiz_25710857";
    $dbPassword = "uFXCO2qBIQMHe";
    $dbname = "epiz_25710857_contact_us";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From contact Where email = ? Limit 1";
     $INSERT = "INSERT Into contact (Name, Email, Subject, Message) values(?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $visitor_email);
     $stmt->execute();
     $stmt->bind_result($visitor_email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $name, $visitor_email, $subject_visitor, $message);
      $stmt->execute();
      echo "Message Sent Successfully.";
     } else {
      echo "One Message is yet to be replied to, please try again in sometime.";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>