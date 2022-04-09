<?php
session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Sessions</title>
</head>
<body>
    <h1>
        Thank you
        <?php echo $name; ?>
        you have subscribed with the email
        <?php echo $email; ?>
    </h1>
    <a href="page3.php">Go to page 3</a>
</body>
</html>