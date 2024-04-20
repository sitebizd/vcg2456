<?php
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    // You can do something with $name and $mobile here
    // For example, save them in a database

    // Send an email
    $to = 'vedchitragroups@gmail.com';
    $subject = 'New Contact Form Submission';
    $message = "Name: $name\nMobile: $mobile";
    $headers = 'From: webmaster@vedchitra.com';

    mail($to, $subject, $message, $headers);

    // Redirect to the thank you page
    header('Location: thanks.html');
    exit;
?>
