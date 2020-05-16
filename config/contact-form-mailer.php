<? php
$name = $_POST ['name'];
$visitor_email = $_POST ['email'];
$subject_visitor = $_POST ['subject'];
$message = $_POST ['message'];

$email_from = 'admin@imabhi.tech';
$email_subject = "New Form Entry"	;
$email_body = "User Name: $name.\n".
					"User Email: $visitor_email.\n".
						"User Subject: $subject_visitor.\n".
							"User Message: $message.\n";
$to = "abhishekh20.dey@gmail.com";

$headers = "From: $email_from \r\n";

$headers .= "Reply-to: $visitor_email \r\n";

mail($to, $email_subject, $email_body, $headers);

header("Location: index.html");

?>
