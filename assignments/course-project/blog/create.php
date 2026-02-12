<?php 
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Blog Post</title>
    </head>
    <body>

        <h1>Create a New Blog Post</h1>
        
        <form action ="store.php" method="POST">
            <label>Title:</label><br>
            <input type="text" name="title" required><br><br>

            <label>Date:</label><br>
            <input type="date" name="date" required><br><br>

            <label>Body:</label><br>
            <textarea name="body" rows="10" cols="50" required></textarea><br><br>

            <label>Category:</label><br>
            <input type="text" name="category" required><br><br>

            <button type="submit">Save Post</button>
        </form>

    </body>
</html>