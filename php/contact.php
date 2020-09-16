<?php

if ($_POST) {
    $visitor_name = '';
    $visitor_email = '';
    $visitor_phone = '';
    $visitor_message = '';

    if (isset($_POST['visitorName'])) {
        $visitor_name = filter_var($_POST['visitorName'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['visitorEmail'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitorEmail']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }

    if (isset($_POST['visitorMessage'])) {
        $visitor_message = htmlspecialchars($_POST['visitorMessage']);
    }

    $recipient = '';
    $email_title = 'Possible Client';

    $headers = 'MIME=Version: 1.0' . "\r\n".'Content-type: text/html; charset=utf-8' . "\r\n" .'From: ' . $visitor_email . "\r\n";

    if (mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Thank you for contacting me, $visitor_name. I will get back to you as soon as possible!</p>";
    } else {
        echo '<p>Sorry, that email did not go through.</p>';
    }
} else {
    echo '<p>Something went wrong</p>';
}

?>