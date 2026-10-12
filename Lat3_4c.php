<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: Lat3_4login.php');
    exit();
}

$num_cd_order  = isset($_COOKIE['cd_order'])  ? $_COOKIE['cd_order']  : 0;
$num_dvd_order = isset($_COOKIE['dvd_order']) ? $_COOKIE['dvd_order'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
</head>
<body>
    <p>Logged in as: <b><?php echo htmlspecialchars($_SESSION['username']); ?></b> | <a href="Lat3_4logout.php">Logout</a></p>
    <hr>
    <p><u>Order Summary</u></p>
    <?php
        echo 'Ordered CD: '  . htmlspecialchars((string)$num_cd_order)  . ' pieces <br>';
        echo 'Ordered DVD: ' . htmlspecialchars((string)$num_dvd_order) . ' pieces <br>';
    ?>
    <br>
    <a href="Lat3_4a.php">Edit Order</a>
</body>
</html>