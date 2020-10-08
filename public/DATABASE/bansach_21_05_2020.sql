-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2020 lúc 03:22 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhsp`
--

CREATE TABLE `anhsp` (
  `masp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `tenanh` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `anhsp`
--

INSERT INTO `anhsp` (`masp`, `tenanh`) VALUES
('SP19052020102033', 'img/TieuThuyet/nhagiakim.jpg'),
('SP19052020102533', 'img/TieuThuyet/dauchantrencat.jpg'),
('SP19052020103033', 'img/TieuThuyet/ketromsach.jpg'),
('SP19052020103133', 'img/TieuThuyet/nhietdongonngu.jpg'),
('SP19052020103233', 'img/TieuThuyet/kemda.jpg'),
('SP19052020103533', 'img/TruyenNgan/cafecungtonny.jpg'),
('SP19052020103633', 'img/TruyenNgan/thuongnguoi.jpg'),
('SP19052020103733', 'img/TruyenNgan/cutinminhhanhphuc.jpg'),
('SP19052020103833', 'img/TruyenNgan/nha.jpg'),
('SP19052020103933', 'img/TruyenNgan/secocachdunglo.jpg'),
('SP19052020104033', 'img/KyNangSong/kheoankheonoi.jpg'),
('SP19052020104133', 'img/KyNangSong/chienthuat.jpg'),
('SP19052020104233', 'img/KyNangSong/ailay.jpg'),
('SP19052020104333', 'img/KyNangSong/sucmanhtiemthuc.jpg'),
('SP19052020104433', 'img/KyNangSong/lamnguoithuvi.jpg'),
('SP19052020104533', 'img/TamLy/tudientamly.jpg'),
('SP19052020104633', 'img/TamLy/danluanvecamxuc.jpg'),
('SP19052020104733', 'img/TamLy/toimuonchet.jpg'),
('SP19052020104833', 'img/TamLy/trucgiacsieulinh.jpg'),
('SP19052020104933', 'img/TamLy/hieuungdengas.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdh`
--

CREATE TABLE `chitietdh` (
  `id` int(11) NOT NULL,
  `madh` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `masp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdh`
--

INSERT INTO `chitietdh` (`id`, `madh`, `masp`, `soluong`, `dongia`) VALUES
(1, 'DH200520200100', 'SP19052020102033', 1, 62500),
(2, 'DH200520200200', 'SP19052020102033', 1, 62500),
(3, 'DH200520200300', 'SP19052020103033', 1, 60000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsp`
--

CREATE TABLE `chitietsp` (
  `masp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `kichthuoc` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `sotrang` int(11) NOT NULL,
  `nhaxb` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `tacgia` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `trongluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsp`
--

INSERT INTO `chitietsp` (`masp`, `kichthuoc`, `sotrang`, `nhaxb`, `tacgia`, `trongluong`) VALUES
('SP19052020102033', '13x20,5cm', 224, 'NXB Văn Học', 'Paulo Coelho', 280),
('SP19052020102533', '14,5x20,5cm', 432, 'NXB Tổng Hợp TPHCM', 'Nguyên Phong', 450),
('SP19052020103033', '15,5x23cm', 572, 'NXB Văn Học', 'Markus Zusak', 600),
('SP19052020103133', '14,5x20,5cm', 232, 'NXB Hà Nội', 'Ki Ju Lee', 250),
('SP19052020103233', '14x20,5cm', 237, 'NXB Hội Nhà Văn', 'Yonezawa Honobu', 250),
('SP19052020103533', '13x20cm', 268, 'NXB Trẻ', 'Tony Buổi Sáng', 240),
('SP19052020103633', '20x12,5cm', 216, 'NXB Phụ Nữ Việt Nam', 'Hall Of Dreamers', 260),
('SP19052020103733', '13x20,5cm', 216, 'NXB Văn Hóa Văn Nghệ', 'Mèo Xù', 210),
('SP19052020103833', '13x20,5cm', 208, 'NXB Văn Hóa Văn Nghệ', 'Nguyễn Bảo Trung', 220),
('SP19052020103933', '13x20,5cm', 320, 'NXB Văn Học', 'Tuệ Nhi', 300),
('SP19052020104033', '14,5x20,5cm', 406, 'NXB Văn Học', 'Trác Nhã', 420),
('SP19052020104133', '17x22cm', 132, 'NXB Thế Giới', 'Yến G', 150),
('SP19052020104233', '13x20,5cm', 128, 'NXB Tổng Hợp TPHCM', 'Phương Anh', 150),
('SP19052020104333', '14,5x20,5cm', 336, 'NXB Tổng Hợp TPHCM', 'Joseph Murphyc', 350),
('SP19052020104633', '20x12cm', 222, 'NXB Hồng Đức', 'Dylan Evans', 250),
('SP19052020104433', '14,5x20,5cm', 304, 'NXB Tổng Hợp TPHCM', 'Edward De Bono', 320),
('SP19052020104533', '20,5x14cm', 448, 'NXB Thế Giới', 'Shozo Shibuya', 450),
('SP19052020104733', '20x14cm', 238, 'NXB Công Thương', 'Beak Se Hee', 250),
('SP19052020104833', '13x20,5cm', 271, 'NXB Hồng Đức', 'Osho', 300),
('SP19052020104933', '14,5x20,5', 432, 'NXB Thanh Niên', 'Robin Stern', 450);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasp`
--

CREATE TABLE `danhgiasp` (
  `id` int(11) NOT NULL,
  `masp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `makh` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `sao` int(1) NOT NULL,
  `binhluan` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasp`
--

INSERT INTO `danhgiasp` (`id`, `masp`, `makh`, `sao`, `binhluan`) VALUES
(1, 'SP19052020102033', 'NV19052020093725', 5, 'dỡ'),
(2, 'SP19052020102533', 'NV19052020093825', 5, 'quá dỡ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `madh` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `makh` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `tongtien` int(11) NOT NULL,
  `trangthai` varchar(5) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`madh`, `makh`, `tongtien`, `trangthai`) VALUES
('DH200520200100', 'NV19052020093725', 62500, '1'),
('DH200520200200', 'NV19052020093725', 62500, '1'),
('DH200520200300', 'NV19052020093925', 60000, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sodiachi`
--

CREATE TABLE `sodiachi` (
  `id` int(11) NOT NULL,
  `manv` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `sdt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sodiachi`
--

INSERT INTO `sodiachi` (`id`, `manv`, `diachi`, `sdt`) VALUES
(1, 'NV19052020093725', 'Đà Nẵng', 337725252),
(2, 'NV19052020093825', 'Đà Nẵng', 337726266),
(3, 'NV19052020093925', 'Đà Nẵng', 125253612),
(4, 'NV19052020094025', 'Đà Nẵng', 227622135);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `manv` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `taikhoan` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `quyen` varchar(4) COLLATE utf8_vietnamese_ci NOT NULL,
  `trangthai` varchar(4) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`manv`, `taikhoan`, `password`, `quyen`, `trangthai`) VALUES
('NV19052020093725', 'Khach hang', '$2y$10$w4v942hhTNqc4hnjPUZdJegFdevKP/j5iHwJPcPE5pSJil/N.XaL6', '0', '1'),
('NV19052020093825', 'nhanvien02', '$2y$10$26.KaD8T6AZidYfrTqGqTeVOGyPwS5qnbu4b4iBBBTt/c.BQutfNe', '0', '1'),
('NV19052020093925', 'nhanvien03', '$2y$10$26.KaD8T6AZidYfrTqGqTeVOGyPwS5qnbu4b4iBBBTt/c.BQutfNe', '0', '1'),
('NV19052020094025', 'quanly', '$2y$10$26.KaD8T6AZidYfrTqGqTeVOGyPwS5qnbu4b4iBBBTt/c.BQutfNe', '1', '1'),
('NV19102020093828', 'admim', '$2y$10$94r7aJ3leqmYPk9v0MXM7.QIor4CaOwWCTF9iTCHCNsmY73w5nih6', '2', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloaisp`
--

CREATE TABLE `theloaisp` (
  `loaisp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `tentl` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `theloaisp`
--

INSERT INTO `theloaisp` (`loaisp`, `tentl`) VALUES
('TL19052020102033', 'Tiểu Thuyết'),
('TL19052020103533', 'Truyện Ngắn'),
('TL19052020104033', 'Kỹ Năng Sống'),
('TL19052020104533', 'Tâm Lý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinnv`
--

CREATE TABLE `thongtinnv` (
  `manv` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `tennv` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `gioitinh` varchar(4) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinnv`
--

INSERT INTO `thongtinnv` (`manv`, `tennv`, `diachi`, `gioitinh`) VALUES
('NV19052020093725', 'Nguyễn Văn Minh', 'Đà Nẵng', 'Nam'),
('NV19052020093825', 'Nguyễn Ngọc Huyền', 'Đà Nẵng', 'Nữ'),
('NV19052020093925', 'Nguyễn Hưng', 'Đà Nẵng', 'Nam'),
('NV19052020094025', 'Trần Thị Lý', 'Đà Nẵng', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinsp`
--

CREATE TABLE `thongtinsp` (
  `masp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `tensp` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `loaisp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinsp`
--

INSERT INTO `thongtinsp` (`masp`, `tensp`, `loaisp`, `soluong`, `gia`) VALUES
('SP19052020102033', 'Nhà Giả Kim', 'TL19052020102033', 999, 52200),
('SP19052020102533', 'Dấu Chân Trên Cát', 'TL19052020102033', 999, 80240),
('SP19052020103033', 'Kẻ Trộm Sách', 'TL19052020102033', 999, 140400),
('SP19052020103133', 'Nhiệt Độ Ngôn Ngữ', 'TL19052020102033', 999, 66000),
('SP19052020103233', 'Kem Đá', 'TL19052020102033', 999, 61200),
('SP19052020103533', 'Cà Phê Cùng Tony', 'TL19052020103533', 999, 63000),
('SP19052020103633', 'Thương Người Năm Ấy Rời Xa Năm Này', 'TL19052020103533', 999, 68800),
('SP19052020103733', 'Cứ Tin Mình Hạnh Phúc', 'TL19052020103533', 999, 59500),
('SP19052020103833', 'Nhà', 'TL19052020103533', 999, 87200),
('SP19052020103933', 'Sẽ Có Cách Đừng Lo', 'TL19052020103533', 999, 48300),
('SP19052020104033', 'Khéo Ăn Nói Sẽ Có Được Thiên Hạ', 'TL19052020104033', 999, 71500),
('SP19052020104133', 'Chiến Thuật Loại Bỏ Lo Lắng', 'TL19052020104033', 999, 71200),
('SP19052020104233', 'Ai Lấy Miếng Pho Mát Của Tôi', 'TL19052020104033', 999, 32640),
('SP19052020104333', 'Sức Mạnh Tiềm Thức', 'TL19052020104033', 999, 73440),
('SP19052020104433', 'Làm Người Thú Vị', 'TL19052020104033', 999, 87040),
('SP19052020104533', 'Từ Điển Tâm Lý', 'TL19052020104533', 999, 102400),
('SP19052020104633', 'Dẫn Luận Về Cảm Xúc', 'TL19052020104533', 999, 56000),
('SP19052020104733', ' Tôi Muốn Chết Nhưng Tôi Thèm Ăn Tteokbokki', 'TL19052020104533', 999, 60500),
('SP19052020104833', 'Trực Giác Siêu Linh', 'TL19052020104533', 999, 72000),
('SP19052020104933', 'Hiệu Ứng Đèn Gas', 'TL19052020104533', 999, 84500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'ad', 'ad', NULL, '$2y$10$26.KaD8T6AZidYfrTqGqTeVOGyPwS5qnbu4b4iBBBTt/c.BQutfNe', NULL, '2020-05-19 06:54:41', '2020-05-19 06:54:41'),
(9, 'tai', 'tai123', NULL, '$2y$10$26.KaD8T6AZidYfrTqGqTeVOGyPwS5qnbu4b4iBBBTt/c.BQutfNe', NULL, '2020-05-19 06:56:27', '2020-05-19 06:56:27'),
(13, 'tai2', 'tai1234', NULL, '$2y$10$A1lAfwDUZO/rF4o73a7u6eDMTMkXB.PSBfH94kz.FOc0aNImfcWgi', NULL, '2020-05-21 03:23:09', '2020-05-21 03:23:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xemtruocsp`
--

CREATE TABLE `xemtruocsp` (
  `id` int(11) NOT NULL,
  `masp` varchar(16) COLLATE utf8_vietnamese_ci NOT NULL,
  `anh` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `xemtruocsp`
--

INSERT INTO `xemtruocsp` (`id`, `masp`, `anh`) VALUES
(1, 'SP19052020102033', 'img/TieuThuyet/nhagiakim.jpg'),
(2, 'SP19052020102533', 'img/TieuThuyet/dauchantrencat.jpg'),
(3, 'SP19052020103033', 'img/TieuThuyet/ketromsach.jpg'),
(4, 'SP19052020103133', 'img/TieuThuyet/nhietdongonngu.jpg'),
(5, 'SP19052020103233', 'img/TieuThuyet/kemda.jpg'),
(6, 'SP19052020103533', 'img/TruyenNgan/cafecungtonny.jpg'),
(7, 'SP19052020103633', 'img/TruyenNgan/thuongnguoi.jpg'),
(8, 'SP19052020103733', 'img/TruyenNgan/cutinminhhanhphuc.jpg'),
(9, 'SP19052020103833', 'img/TruyenNgan/nha.jpg'),
(10, 'SP19052020103933', 'img/TruyenNgan/secocachdunglo.jpg'),
(11, 'SP19052020104033', 'img/KyNangSong/kheoankheonoi.jpg'),
(12, 'SP19052020104133', 'img/KyNangSong/chienthuat.jpg'),
(13, 'SP19052020104233', 'img/KyNangSong/ailay.jpg'),
(14, 'SP19052020104333', 'img/KyNangSong/sucmanhtiemthuc.jpg'),
(15, 'SP19052020104433', 'img/KyNangSong/lamnguoithuvi.jpg'),
(16, 'SP19052020104533', 'img/TamLy/tudientamly.jpg'),
(17, 'SP19052020104633', 'img/TamLy/danluanvecamxuc.jpg'),
(18, 'SP19052020104733', 'img/TamLy/toimuonchet.jpg'),
(19, 'SP19052020104833', 'img/TamLy/trucgiacsieulinh.jpg'),
(20, 'SP19052020104933', 'img/TamLy/hieuungdengas.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdh_ibfk_1` (`masp`),
  ADD KEY `madh` (`madh`);

--
-- Chỉ mục cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD KEY `masp` (`masp`);

--
-- Chỉ mục cho bảng `danhgiasp`
--
ALTER TABLE `danhgiasp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masp` (`masp`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `sodiachi`
--
ALTER TABLE `sodiachi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manv` (`manv`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `theloaisp`
--
ALTER TABLE `theloaisp`
  ADD PRIMARY KEY (`loaisp`);

--
-- Chỉ mục cho bảng `thongtinnv`
--
ALTER TABLE `thongtinnv`
  ADD PRIMARY KEY (`manv`);

--
-- Chỉ mục cho bảng `thongtinsp`
--
ALTER TABLE `thongtinsp`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `loaisp` (`loaisp`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `xemtruocsp`
--
ALTER TABLE `xemtruocsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masp` (`masp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhgiasp`
--
ALTER TABLE `danhgiasp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sodiachi`
--
ALTER TABLE `sodiachi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `xemtruocsp`
--
ALTER TABLE `xemtruocsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  ADD CONSTRAINT `anhsp_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `thongtinsp` (`masp`);

--
-- Các ràng buộc cho bảng `chitietdh`
--
ALTER TABLE `chitietdh`
  ADD CONSTRAINT `chitietdh_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `thongtinsp` (`masp`),
  ADD CONSTRAINT `chitietdh_ibfk_2` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`);

--
-- Các ràng buộc cho bảng `chitietsp`
--
ALTER TABLE `chitietsp`
  ADD CONSTRAINT `chitietsp_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `thongtinsp` (`masp`);

--
-- Các ràng buộc cho bảng `danhgiasp`
--
ALTER TABLE `danhgiasp`
  ADD CONSTRAINT `danhgiasp_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `thongtinsp` (`masp`),
  ADD CONSTRAINT `danhgiasp_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `thongtinnv` (`manv`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `thongtinnv` (`manv`);

--
-- Các ràng buộc cho bảng `sodiachi`
--
ALTER TABLE `sodiachi`
  ADD CONSTRAINT `sodiachi_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `thongtinnv` (`manv`);

--
-- Các ràng buộc cho bảng `thongtinnv`
--
ALTER TABLE `thongtinnv`
  ADD CONSTRAINT `thongtinnv_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `taikhoan` (`manv`);

--
-- Các ràng buộc cho bảng `thongtinsp`
--
ALTER TABLE `thongtinsp`
  ADD CONSTRAINT `thongtinsp_ibfk_1` FOREIGN KEY (`loaisp`) REFERENCES `theloaisp` (`loaisp`);

--
-- Các ràng buộc cho bảng `xemtruocsp`
--
ALTER TABLE `xemtruocsp`
  ADD CONSTRAINT `xemtruocsp_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `thongtinsp` (`masp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
