<?php
session_start();

$error = '';

if (isset($_SESSION['username'])) {
    header('Location: Lat3_4a.php');
    exit();
}

if (isset($_POST['login'])) {
    if ($_POST['username'] === 'admin' && $_POST['password'] === 'admin') {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: Lat3_4a.php');
        exit();
    } else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if ($error) echo '<p><b>' . htmlspecialchars($error) . '</b></p>'; ?>
    <form action="Lat3_4login.php" method="post">
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
