<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        h1 {
            color: #007bff;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
            font-size: 18px;
        }

        td {
            font-size: 16px;
        }
        tr.empty {
            text-align: center;
            color: #6c757d;
            font-style: italic;
        }
        a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #c82333;
        }
        p {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
        }
        a[href='index.php'] {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a[href='index.php']:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Giỏ Hàng</h1>
    <table>
        <tr>
            <th>Tên Món</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Thao Tác</th>
        </tr>
        <?php
        $total_price = 0;
        if (isset($_SESSION['gio_hang']) && count($_SESSION['gio_hang']) > 0) {
            foreach ($_SESSION['gio_hang'] as $key => $item) {
                echo "<tr>";
                echo "<td>" . $item['ten'] . "</td>";
                echo "<td>" . number_format($item['gia'], 0, ',', '.') . " VNĐ</td>";
                echo "<td>" . $item['so_luong'] . "</td>";
                echo "<td><a href='xoadongiohang.php?id=$key'>Xóa</a></td>";
                echo "</tr>";
                $total_price += $item['gia'] * $item['so_luong'];
            }
        } else {
            echo "<tr><td colspan='4'>Giỏ hàng của bạn chưa có sản phẩm nào.</td></tr>";
        }
        ?>
    </table>
    <p>Tổng Tiền: <?php echo number_format($total_price, 0, ',', '.') . " VNĐ"; ?></p>
    <a href="index.php">Quay lại Sảnh Chính</a>
</body>
</html>
