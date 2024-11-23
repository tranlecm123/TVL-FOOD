<?php
include('includes/config.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM mon_an WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 
    if ($stmt->execute()) {

        header('Location: quanlymonan.php');
        exit();
    } else {
        echo "Lỗi khi xóa món ăn: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Không có ID món ăn để xóa!";
}


$conn->close();
?>
