<?php
    // My modifications to mailer script from:
    // http://blog.teamtreehouse.com/create-ajax-contact-form
    // Added input sanitizing to prevent injection by AF

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $subject = html_entity_decode(filter_var($_POST["subject"], FILTER_SANITIZE_STRING), ENT_QUOTES);
				$subject = str_replace(array("\r","\n"),array(" "," "),$subject);
        $email = html_entity_decode(filter_var($_POST["email"], FILTER_SANITIZE_STRING), ENT_QUOTES);
        $message = trim(html_entity_decode(filter_var($_POST["message"], FILTER_SANITIZE_STRING), ENT_QUOTES));

        // Check that data was sent to the mailer.
        if ( empty($subject) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }
        
      
 
        // Set the recipient email address.
        $recipient = "scandroid311@gmail.com";

        // Set the email subject.
        //$subject = "New contact from $subject";

        // Build the email content.
        $email_content = "Subject: $subject\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: <$subject>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>
