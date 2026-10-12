<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit;
}

include_once 'c_programKerja.php';

$controller = new c_programKerja();
$controller->invoke();
?>