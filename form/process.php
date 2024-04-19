<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']); // Sanitize name input
  $mobile = trim($_POST['mobile']); // Sanitize mobile number input

  // Basic validation (replace with more robust validation if needed)
  if (empty($name) || empty($mobile)) {
    $error = 'Please fill in all required fields.';
  } else {
    // Send email notification (adjust email settings as needed)
    $to = 'vedchitragroups@gmail.com'; // Replace with your email address
    $subject = 'Contact Form Submission';
    $message = "Name: $name\nMobile Number: $mobile";
    $headers = 'From: noreply@vedchitra.com' . "\r\n" .
               'Reply-To: ' . $mobile . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
      // Redirect to thank you page upon successful email sending
      header('Location: thank_you.html');
      exit();
    } else {
      $error = 'There was a problem sending your message. Please try again later.';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Processing</title>
</head>
<body>
  <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php else: ?>
    <p>Thank you for contacting us! We will be in touch shortly.</p>
  <?php endif; ?>
</body>
</html>
