<?php
// process-upload.php
// This page receives the uploaded file, moves it to the uploads folder, and displays the uploaded image back to the user

// Check if a file was uploaded and no errors occurred
if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {

    // Store the original file name
    $fileName = $_FILES['profile_image']['name'];

    // Temporary file path on the server
    $temPath = $_FILES['profile_image']['tmp_name'];

    // Destination path inside the uploads folder
    $destination = "uploads/" . $fileName;

    // Move the file from the temporary folder to the uploads folder
    // move_uploaded_file() is the correct function for this
    if(move_uploaded_file($temPath, $destination)) {
        $message = "Upload successful";
    } else {
        $message = "Error: Could not save the uploaded file.";
    }
} else {
    // This runs if no file was uploaded or an error occurred
        $message = "No file was uploaded.";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Upload Result</title>
    </head>
    <body>

        <!-- Display the upload status message -->
        <h1><?php echo $message; ?></h1>

        <!-- If the file exists, display it -->
        <?php if(isset($destination) && file_exists($destination)) : ?>
            <p>Your uploaded image:</p>
            <img src="<?php echo $destination; ?>" width="300">
        <?php endif; ?>
    </body>
</html>