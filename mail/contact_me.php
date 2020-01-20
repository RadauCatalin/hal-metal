<?php
// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['dimension']) || empty($_POST['place']) || empty($_POST['dimension']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(500);
    exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$dimension = strip_tags(htmlspecialchars($_POST['dimension']));
$place = strip_tags(htmlspecialchars($_POST['place']));
$details = strip_tags(htmlspecialchars($_POST['details']));

// Create the email and send the message
$to = "hal.metalsrl@yahoo.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Cerere oferta site:  $name";
$body = "Ai primit o noua cerere de pe site-ul tau.\n\n" . "Aici ai detaliile:\n\nNume: $name\n\nEmail: $email\n\nTelefon: $phone\n\nDimensiune constructie:\n$dimension \n\nLocalitate proiect:\n$place \n\nDetalii constructie:\n$details";
$header = "From: office@halmetal.ro\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";

if (!mail($to, $subject, $body, $header))
    http_response_code(500);
?>
