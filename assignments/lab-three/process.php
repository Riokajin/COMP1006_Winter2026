<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Week 4 - Lab Three Contact Form Submission </title>
        <!-- I absolutely copied the layout I already made for index.php to process.php and just edited the title and removed the body information. -->
    </head>
    <body>
        <?php
        //Sanitize user input
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

        // Array to store validation errors
        $errors = [];

        // Validate first name
        if ($first_name === null || $first_name === '') {
            $errors[] = "Please enter your first name.";
        }

        // Validate last name
        if ($last_name === null || $last_name === '') {
            $errors[] = "Please enter your last name.";
        } 
        // Validate email
        if ($email === null || $email === '') {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email address.";
        }
        // Validate the message
        if ($message === null || $message === '') {
            $errors[] = "Message is required.";
        }

        //check for errors

        if (!empty($errors)) {
            echo "<ul>";
            foreach($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            exit; // stop the script so the success message doesn't show
        }
        // mail($to, $subject, $message);
        ?>
        <!-- if no errors, show the confirmation message -->
        <h2>Thank you, <?php echo $first_name; ?>!</h2>
        <p>Your message has been received.</p>

        <h3>Your Submission</h3>
        <ul>
            <li>First Name: <?php echo $first_name; ?></li>
            <li>Last Name: <?php echo $last_name; ?></li>
            <li>Email: <?php echo $email; ?></li>
            <li>Message: <?php echo $message; ?></li>
        </ul>
        
    </body>
</html>