<?php
// Connect to the database and load the header
require 'connect.php';


session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'header.php';
?>

<h1 class="mb-4">Create a New Blog Post</h1>

<form action="store.php" method="POST" enctype="multipart/form-data" class="mb-5">

    <div class="mb-3">
        <label class="form-label">Title:</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Date:</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Body:</label>
        <textarea name="body" rows="10" cols="50" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Category:</label>
        <input type="text" name="category" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload Image:</label>
        <input type="file" name="image" class="form-control">
    </div>

    

    <button type="submit" class="btn btn-success">Save Post</button>
</form>

<?php require 'footer.php'; ?>