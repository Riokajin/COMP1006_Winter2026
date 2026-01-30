<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Week 4 - Lab Three Contact Form </title>
    </head>
    <body>
        <h1>Contact Us</h1>

        <form action="process.php" method="post">

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>

            <br><br>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>

            <br><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <br><br>

            <label for="message">Message</label><br>
            <textarea id="message" name ="message" required></textarea>

            <br><br>

            <button type ="submit">Send Message</button>
        </form>
    </body>
</html>