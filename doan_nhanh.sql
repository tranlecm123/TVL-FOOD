-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2024 lúc 08:06 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan_nhanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `mon_an_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_an`
--

CREATE TABLE `mon_an` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_an`
--

INSERT INTO `mon_an` (`id`, `ten`, `gia`, `hinh_anh`, `mo_ta`) VALUES
(1, 'Hamburger bò phô mai', 50000.00, 'image\\HamburgerBPM.jpg', 'Bánh mì kẹp thịt bò mềm, phô mai tan chảy và rau tươi ngon.'),
(2, 'Gà rán (1 miếng)', 30000.00, 'image\\garan1mieng.jpg', 'Gà rán giòn tan, thấm vị, ngon từng miếng.'),
(3, 'Khoai tây chiên', 25000.00, 'image\\khoaitaychien.jpg', 'Khoai tây thái que, chiên vàng, giòn rụm.'),
(4, 'Pizza xúc xích (mini)', 70000.00, 'image\\pizzaxx.jpg', 'Pizza cỡ nhỏ với xúc xích, phô mai, và sốt cà chua.'),
(5, 'Hotdog phô mai', 35000.00, 'image\\hotdogphomai.jpg', 'Xúc xích nóng hổi trong bánh mì mềm, phủ phô mai thơm béo.'),
(6, 'Sandwich thịt nguội', 40000.00, 'image\\sandwichtn.jpg', 'Bánh mì sandwich kẹp thịt nguội, rau xanh và sốt mayonaise.'),
(7, 'Bánh taco gà', 55000.00, 'image\\tacogaxe.jpg', 'Vỏ bánh giòn rụm, nhân gà xé và rau tươi.'),
(8, 'Mì Ý sốt bò bằm', 65000.00, 'image\\miysotbobam.jpg', 'Mì Ý truyền thống với sốt cà chua và thịt bò bằm.'),
(9, 'Bánh mì kebab', 45000.00, 'image\\banh-mi-tho-nhi-ky-kebab-3.jpg', 'Bánh mì kẹp thịt nướng kiểu Thổ Nhĩ Kỳ, rau và sốt đặc trưng.'),
(10, 'Salad rau củ quả', 30000.00, 'image\\saladraucuqua.jpg', 'Rau củ tươi mát, sốt nhẹ, tốt cho sức khỏe.'),
(11, 'Cánh gà nướng mật ong (3 cái)', 60000.00, 'image\\canhganuongmatong.jpg', 'Cánh gà đậm vị, nướng với mật ong thơm lừng.'),
(12, 'Nuggets gà (6 miếng)', 40000.00, 'image\\nuggetsga.jpg', 'Gà viên chiên giòn, tiện lợi, ngon miệng.'),
(13, 'Trà sữa trân châu đen', 30000.00, 'image\\trasuatt.jpg', 'Trà sữa đậm vị, thêm trân châu dai ngon.'),
(14, 'Sữa lắc vị dâu', 35000.00, 'image\\sualacvidau.jpg', 'Sữa lắc dâu tươi, thơm ngọt, mát lạnh.'),
(15, 'Bánh pancake sốt chocolate', 50000.00, 'image\\pancake-chocolate.jpg', 'Bánh pancake mềm xốp, phủ sốt chocolate ngọt ngào.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mon_an_id` (`mon_an_id`);

--
-- Chỉ mục cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`mon_an_id`) REFERENCES `mon_an` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
