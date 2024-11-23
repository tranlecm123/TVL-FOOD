<?php
session_start();
include('includes/config.php');

if (isset($_GET['id'])) {
    $mon_an_id = $_GET['id'];
    $sql = "SELECT * FROM mon_an WHERE id = $mon_an_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $mon_an = $result->fetch_assoc();
        $item = [
            'id' => $mon_an['id'],
            'ten' => $mon_an['ten'],
            'gia' => $mon_an['gia'],
            'so_luong' => 1,
        ];
        
        if (!isset($_SESSION['gio_hang'])) {
            $_SESSION['gio_hang'] = [];
        }
        
        $_SESSION['gio_hang'][] = $item;
    }
}

header('Location: index.php');
exit();
