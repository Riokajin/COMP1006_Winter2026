<?php
include 'connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

include 'header.php';
?>
<h1>Edit Blog Post</h1>

<form action="update.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

    <label>Title:</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

    <label>Date:</label><br>
    <input type="date" name="date" value="<?php echo $post['date']; ?>" required><br><br>

    <label>Body:</label><br>
    <textarea name="body" rows="10" cols="50" required><?php echo htmlspecialchars($post['body']); ?></textarea><br><br>

    <label>Category:</label><br>
    <input type="text" name="category" value="<?php echo htmlspecialchars($post['category']); ?>" required><br><br>

    <button type="submit">Update Post</button>

</form>
<?php include 'footer.php'; ?>