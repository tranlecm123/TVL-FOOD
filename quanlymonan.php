<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Món Ăn</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #007bff;
            font-size: 2.5em;
            margin-top: 30px;
        }

        h2 {
            text-align: center;
            color: #555;
            font-size: 1.8em;
            margin-top: 20px;
        }
        a {
            text-decoration: none;
            font-size: 1.2em;
            color: #fff;
            background-color: #007bff;
            padding: 12px 20px;
            border-radius: 8px;
            display: inline-block;
            margin: 15px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        a[href="index.php"] {
            background-color: #28a745;
        }

        a[href="index.php"]:hover {
            background-color: #218838;
        }

        a[href="themmonan.php"] {
            background-color: #ffc107;
        }

        a[href="themmonan.php"]:hover {
            background-color: #e0a800;
        }


        table {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }

        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        td img {
            max-width: 100px;
            border-radius: 8px;
        }

        td a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        td a:hover {
            background-color: #007bff;
            color: white;
        }

        .no-data {
            text-align: center;
            font-size: 1.2em;
            color: #888;
            padding: 20px;
        }
        td a {
            color: #007bff;
            text-decoration: none;
            padding: 8px;
            border-radius: 5px;
            background-color: #f8f9fa;
            font-weight: normal;
        }

        td a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Quản Lý Món Ăn</h1>

    <a href="index.php">Trở về trang chính</a>

    <br><br>

    <a href="themmonan.php">Thêm Món Ăn</a>

    <h2>Danh Sách Món Ăn</h2>
    <table>
        <tr>
            <th>Tên Món</th>
            <th>Giá</th>
            <th>Mô Tả</th>
            <th>Hình Ảnh</th>
            <th>Quản Lý</th>
        </tr>
        <?php
        $sql = "SELECT * FROM mon_an";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ten'] . "</td>";
                echo "<td>" . number_format($row['gia'], 0, ',', '.') . " VNĐ</td>";
                echo "<td>" . $row['mo_ta'] . "</td>";
                echo "<td><img src='image/" . $row['hinh_anh'] . "' alt='" . $row['ten'] . "' width='100'></td>";
                echo "<td>";
                echo "<a href='sualoaimonan.php?id=" . $row['id'] . "'>Sửa</a> ";
                echo "<a href='xoamonan.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\")'>Xóa</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='no-data'>Chưa có món ăn nào!</td></tr>";
        }
        ?>
    </table>
</body>
</html>
