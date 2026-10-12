<?php
session_start();

session_unset();
session_destroy();

header('Location: Lat3_4login.php');
exit();
?>
