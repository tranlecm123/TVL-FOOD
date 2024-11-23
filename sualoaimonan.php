<?php
include('includes/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM mon_an WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Món ăn không tồn tại.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $mo_ta = $_POST['mo_ta'];
    $hinh_anh = $_FILES['hinh_anh']['name'];
    if ($hinh_anh) {
        move_uploaded_file($_FILES['hinh_anh']['tmp_name'], "image/" . $hinh_anh);
        $sql_update = "UPDATE mon_an SET ten = '$ten', gia = $gia, mo_ta = '$mo_ta', hinh_anh = '$hinh_anh' WHERE id = $id";
    } else {
        $sql_update = "UPDATE mon_an SET ten = '$ten', gia = $gia, mo_ta = '$mo_ta' WHERE id = $id";
    }

    if ($conn->query($sql_update) === TRUE) {
        echo "Món ăn đã được cập nhật.";
        header('Location: quanlymonan.php');
    } else {
        echo "Lỗi khi cập nhật món ăn: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="stylesheet" href="sualoaimonan.css">
    <meta charset="UTF-8">
    <title>Sửa Món Ăn</title>
</head>
<body>
    <h1>Sửa Món Ăn</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Tên Món:</label>
        <input type="text" name="ten" value="<?php echo $row['ten']; ?>" required><br><br>

        <label>Giá:</label>
        <input type="number" name="gia" value="<?php echo $row['gia']; ?>" required><br><br>

        <label>Mô Tả:</label>
        <textarea name="mo_ta" required><?php echo $row['mo_ta']; ?></textarea><br><br>

        <label>Hình Ảnh:</label>
        <input type="file" name="hinh_anh" accept="image/*"><br><br>
        <img src="image/<?php echo $row['hinh_anh']; ?>" width="100"><br><br>

        <input type="submit" value="Cập Nhật Món">
    </form>

    <br>
    <a href="quanlymonan.php">Trở về Quản Lý Món Ăn</a>
</body>
</html>
