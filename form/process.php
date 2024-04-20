<?php

// Set your recipient email address
$recipientEmail = "vedchitragroups@gmail.com";

// If the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $details = $_POST['details'];

  // Basic validation (more can be added)
  if (empty($name) || empty($email) || empty($details)) {
    echo "Please fill in all required fields.";
  } else {

    $subject = "Contact Form Submission from $name";

    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Mobile Number: $mobile\n";
    $message .= "Details:\n$details";

    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Send the email
    if (mail($recipientEmail, $subject, $message, $headers)) {
      // Redirect to the thank you page on success
      header('Location: thanks.html');
      exit;
    } else {
      echo "An error occurred while sending the email. Please try again later.";
    }
  }
}

?>
