<?php
require "includes/header.php";

//  TODO: connect to the database 
require "includes/connect.php";
//   TODO: Grab form data (no validation or sanitization for this lab)
$first = $_POST['first_name'];
$last = $_POST['last_name'];
$email = $_POST['email'];
/*
  1. Write an INSERT statement with named placeholders
  2. Prepare the statement
  3. Execute the statement with an array of values
  

*/

$sql = "INSERT INTO subscribers (first_name, last_name, email) VALUES (:first, :last, :email)";

$stmt = $conn->prepare($sql);

$stmt->execute([
    ':first' => $first,
    ':last' => $last,
    ':email' => $email
]);

?>


    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>

        <!-- TODO: Display a confirmation message -->
        <!-- Example: "Thanks, Name! You have been added to our mailing list." -->

        <p>
            Thanks, <?php echo htmlspecialchars($first); ?>! You have been added to our mailing list.
        </p>


        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>

    <?php require "includes/footer.php"; ?>