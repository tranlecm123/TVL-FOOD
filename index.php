<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <link rel="stylesheet" href="cardtieude.css">
   
    <meta charset="UTF-8">
    <title>TVL FOOD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .banner {
            width: 100%;
            height: auto; 
            max-height: 200px;
            display: block;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .nav-links {
            text-align: center;
            margin-bottom: 20px;
        }

        .nav-links a {
            margin: 0 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #0056b3;
        }

     
        .category-section {
            border: 2px solid #ccc; 
            padding: 20px; 
            margin: 20px 0; 
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .category-header {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .products {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product {
            width: 200px;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .product h3 {
            margin: 10px 0;
        }

        .product a {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .product a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <img src="image/TVLFood.png" alt="TVL Food Logo" class="banner">

    <h1>Danh Sách Món Ăn</h1>

    <div class="nav-links">
        <a href="quanlymonan.php">Quản Lý Món Ăn</a>
        <a href="giohang.php">Xem Giỏ Hàng</a>
    </div>

    <div class="category-section">
        <div class="category-header">
            <h2>Các Loại Đồ Ăn</h2>
        </div>
        <div class="products">
            <?php
            $sql = "SELECT * FROM mon_an WHERE loai='doan'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<h3>" . $row['ten'] . "</h3>";
                    echo "<img src='image/" . $row['hinh_anh'] . "' alt='" . $row['ten'] . "'>";
                    echo "<p>" . $row['mo_ta'] . "</p>";
                    echo "<p>Giá: " . number_format($row['gia'], 0, ',', '.') . " VNĐ</p>";
                    echo "<a href='addtocart.php?id=" . $row['id'] . "'>Thêm vào giỏ hàng</a>";
                    echo "</div>";
                }
            } else {
                echo "<p style='text-align: center;'>Chưa có món ăn nào!</p>";
            }
            ?>
        </div>
    </div>
    <div class="category-section">
        <div class="category-header">
            <h2>Các Loại Đồ Uống</h2>
        </div>
        <div class="products">
            <?php
            $sql = "SELECT * FROM mon_an WHERE loai='douong'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<h3>" . $row['ten'] . "</h3>";
                    echo "<img src='image/" . $row['hinh_anh'] . "' alt='" . $row['ten'] . "'>";
                    echo "<p>" . $row['mo_ta'] . "</p>";
                    echo "<p>Giá: " . number_format($row['gia'], 0, ',', '.') . " VNĐ</p>";
                    echo "<a href='addtocart.php?id=" . $row['id'] . "'>Thêm vào giỏ hàng</a>";
                    echo "</div>";
                }
            } else {
                echo "<p style='text-align: center;'>Chưa có đồ uống nào!</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
