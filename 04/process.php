<?php
require "includes/header.php";


$firstName = $_POST["first_name"];
$lastName = $_POST["last_name"];
$address = $_POST["address"];
$email = $_POST['email'];
$items = $_POST['items'];

?>



<main>
    <?php echo "<h2> Thanks for your order" . $firstName . "</h2>"; ?>

    <h3> Items Ordered </h3>
    <ul>
        <?php foreach ($items as $item => $quantity): ?>
        <li><?php $item ?> - <?php $quantity ?> </li>
        <?php endforeach; ?>
    </ul>

</main>

<!-- send email using mail function -->
 mail($to, $subject, $message);


 
<?php 
require "includes/footer.php";
?>