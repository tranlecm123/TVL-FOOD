<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $mo_ta = $_POST['mo_ta'];
    $hinh_anh = $_FILES['hinh_anh']['name'];
    $loai = $_POST['loai']; 


    move_uploaded_file($_FILES['hinh_anh']['tmp_name'], "images/" . $hinh_anh);

    $sql = "INSERT INTO mon_an (ten, gia, mo_ta, hinh_anh, loai) VALUES ('$ten', $gia, '$mo_ta', '$hinh_anh', '$loai')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: quanlymonan.php'); 
        exit();
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="stylesheet" href="themmonan.css">
    <meta charset="UTF-8">
    <title>Thêm Món Mới</title>
</head>
<body>
    <h1>Thêm Món Mới</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Tên Món:</label>
        <input type="text" name="ten" required><br><br>
        
        <label>Giá:</label>
        <input type="number" name="gia" required><br><br>
        
        <label>Mô Tả:</label>
        <textarea name="mo_ta" required></textarea><br><br>
        
        <label>Hình Ảnh:</label>
        <input type="file" name="hinh_anh" accept="image/*" required><br><br>
        
        <label>Loại Món:</label>
        <select name="loai" required>
            <option value="doan">Đồ Ăn</option>
            <option value="douong">Đồ Uống</option>
        </select><br><br>

        <input type="submit" value="Thêm Món">
    </form>

    <br><br>
    <a href="quanlymonan.php" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px; transition: background-color 0.3s ease;">Trở Về</a>
</body>
</html>
