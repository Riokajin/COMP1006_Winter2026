<?php
include 'connect.php';

$sql = "SELECT * FROM posts ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'header.php';
?>
<h1>All Blog Posts</h1>

<a href="create.php">Create New Post</a><br><br>

<?php foreach ($posts as $post): ?>
    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
    <p><strong>Date:</strong> <?php echo $post['date']; ?></p>
    <p><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>

    <a href="edit.php?id=<?php echo $post['id']; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $post['id']; ?>" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>

    <hr>
<?php endforeach; ?>
<?php include 'footer.php'; ?>