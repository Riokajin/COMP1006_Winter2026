<?php
//TODO:
require "includes/header.php";
require "includes/connect.php";
// subscribers.php
// Displays a list of all subscribers in the database.
/*
  TODO:
  1. Write a SELECT query to get all subscribers
  2. Add ORDER BY subscribed_at DESC
  3. Prepare the statement
  4. Execute the statement
  5. Fetch all results into $subscribers
*/

$sql = "SELECT * FROM subscribers ORDER BY subscribed_at DESC";

$stmt = $conn->prepare($sql);

$stmt->execute();

// Fetch all rows as an associative array
$subscribers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="container mt-4">
  <h1>Subscribers</h1>

  <?php if (count($subscribers) === 0): ?>
    <p>No subscribers yet.</p>
  <?php else: ?>
    <table class="table table-bordered mt-3">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Subscribed</th>
        </tr>
      </thead>
      <tbody>
        <!-- TODO: Loop through $subscribers and output each row -->
         <?php foreach ($subscribers as $s): ?>
          <tr>
            <td><?php echo $s['id']; ?></td>
            <td><?php echo htmlspecialchars($s['first_name']); ?></td>
            <td><?php echo htmlspecialchars($s['last_name']);?></td>
            <td><?php echo htmlspecialchars($s['email']);?></td>
            <td><?php echo $s['subscribed_at']; ?></td>
          </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>

  <p class="mt-3">
    <a href="index.php">Back to Subscribe Form</a>
  </p>
</main>

<?php require "includes/footer.php"; ?>
