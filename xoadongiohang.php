<?php
session_start();

if (isset($_GET['id'])) {
    $key = $_GET['id'];
    unset($_SESSION['gio_hang'][$key]);
}

header('Location: giohang.php');
exit();
