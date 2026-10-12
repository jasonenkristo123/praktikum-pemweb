<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: Lat3_4login.php');
    exit();
}

$cd  = isset($_COOKIE['cd_order'])  ? $_COOKIE['cd_order']  : 0;
$dvd = isset($_COOKIE['dvd_order']) ? $_COOKIE['dvd_order'] : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>
    <p>Logged in as: <b><?php echo htmlspecialchars($_SESSION['username']); ?></b> | <a href="Lat3_4logout.php">Logout</a></p>
    <hr>
    <h2>Order Form</h2>
    <form action="Lat3_4b.php" method="post">
        <p>Order CD, amount: <input type="text" name="cd_order" value="<?php echo htmlspecialchars((string)$cd); ?>" size="2" maxlength="2"></p>
        <p>Order DVD, amount: <input type="text" name="dvd_order" value="<?php echo htmlspecialchars((string)$dvd); ?>" size="2" maxlength="2"></p>
        <input type="submit" value="Add To Cart" name="submit">
    </form>
</body>
</html>
