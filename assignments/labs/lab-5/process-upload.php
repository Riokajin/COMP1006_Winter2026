<?php
// upload.php
// This page displays a form that allows the user to upload an image.
// The form must use POST and multipart/form-data to send file data.
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Upload Profile Picture</title>
    </head>
    <body>
        <h1>Upload a Profile Picture</h1>
        <!-- 
        The enctype attribute is required for file uploads.
        Without it, the file will NOT be sent to the server.
         -->
        <form action="process-upload.php" method="POST" enctype="multipart/form-data">
            <!-- File input field -->
             <label for="profile_image">Choose an image:</label><br>
             <input type="file" name="profile_image" id="profile_image" required><br><br>

             <!-- Submit button -->
              <button type="submit">Upload Image</button>
        </form>
    </body>
</html>