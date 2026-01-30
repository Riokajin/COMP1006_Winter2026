<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Week 4 - Lab Three Contact Form </title>
    </head>
    <body>
        <!-- Page heading for the contact form -->
        <h1>Contact Us</h1>

        <!-- Form sends data to process.php using POST -->
        <form action="process.php" method="post">

            <!-- First Name field (required for client-side validation) -->
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>

            <br><br>

            <!-- Last Name required -->
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>

            <br><br>

            <!-- email required -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <br><br>

            <!-- message required -->
            <label for="message">Message</label><br>
            <textarea id="message" name ="message" required></textarea>

            <br><br>

            <!-- Submit button to send the form -->
            <button type ="submit">Send Message</button>
        </form>
    </body>
</html>