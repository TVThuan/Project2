-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 02, 2019 lúc 10:57 AM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `MaAdmin` int(10) UNSIGNED NOT NULL,
  `TenAdmin` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SoDienThoai` varchar(12) NOT NULL,
  `DiaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`MaAdmin`, `TenAdmin`, `Email`, `Password`, `NgaySinh`, `GioiTinh`, `SoDienThoai`, `DiaChi`) VALUES
(1, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-06-09', 0, '0876487767', 'Gia Lâm - Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `Ma` int(10) UNSIGNED NOT NULL,
  `Final1` double(4,2) DEFAULT NULL,
  `Skill1` double(4,2) DEFAULT NULL,
  `Final2` double(4,2) DEFAULT NULL,
  `Skill2` double(4,2) DEFAULT NULL,
  `MaSinhVien` int(10) UNSIGNED NOT NULL,
  `MaMon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`Ma`, `Final1`, `Skill1`, `Final2`, `Skill2`, `MaSinhVien`, `MaMon`) VALUES
(1, 8.00, 3.00, NULL, 8.00, 1, 1),
(2, 7.00, 9.00, NULL, NULL, 2, 1),
(3, 7.00, 9.00, NULL, NULL, 3, 1),
(4, 5.00, 6.00, NULL, NULL, 1, 2),
(5, 6.00, 7.00, NULL, NULL, 2, 2),
(6, 7.00, 5.00, NULL, NULL, 3, 2),
(7, 6.00, 6.00, NULL, NULL, 1, 3),
(8, 5.00, 7.00, NULL, NULL, 2, 3),
(9, 8.00, 8.00, NULL, NULL, 3, 3),
(10, 5.00, 6.00, NULL, NULL, 1, 4),
(11, 6.00, 6.00, NULL, NULL, 2, 4),
(12, 7.00, 7.00, NULL, NULL, 3, 4),
(13, 6.00, 6.00, NULL, NULL, 1, 5),
(14, 5.00, 5.00, NULL, NULL, 2, 5),
(15, 7.00, 8.00, NULL, NULL, 3, 5),
(16, 6.00, 6.00, NULL, NULL, 1, 6),
(17, 7.00, 8.00, NULL, NULL, 2, 6),
(18, 8.00, 8.00, NULL, NULL, 3, 6),
(19, 6.00, 6.00, NULL, NULL, 1, 7),
(20, 7.00, 7.00, NULL, NULL, 2, 7),
(21, 6.00, 6.00, NULL, NULL, 3, 7),
(22, 5.00, 6.00, NULL, NULL, 1, 8),
(23, 7.00, 7.00, NULL, NULL, 2, 8),
(24, 8.00, 8.00, NULL, NULL, 3, 8),
(25, 5.00, 6.00, NULL, NULL, 1, 9),
(26, 6.00, 7.00, NULL, NULL, 2, 9),
(27, 8.00, 8.00, NULL, NULL, 3, 9),
(28, 5.00, 5.00, NULL, NULL, 1, 10),
(29, 6.00, 6.00, NULL, NULL, 2, 10),
(30, 7.00, 7.00, NULL, NULL, 3, 10),
(31, 3.00, 3.00, 3.00, 3.00, 4, 1),
(32, 4.00, 4.00, 3.00, 3.00, 5, 1),
(33, 5.00, 4.00, NULL, 4.00, 6, 1),
(34, 4.00, 4.00, 4.00, 4.00, 4, 2),
(35, 4.00, 4.00, 4.00, 4.00, 5, 2),
(36, 4.00, 4.00, 4.00, 4.00, 6, 2),
(37, 3.00, 4.00, NULL, NULL, 4, 3),
(38, 2.00, 5.00, NULL, NULL, 5, 3),
(39, 4.00, 4.00, NULL, NULL, 6, 3),
(40, 4.00, 4.00, 4.00, 4.00, 4, 4),
(41, 4.00, 4.00, 4.00, 4.00, 5, 4),
(42, 4.00, 4.00, 4.00, 4.00, 6, 4),
(43, 4.00, 4.00, 4.00, 4.00, 4, 5),
(44, 4.00, 4.00, 4.00, 4.00, 5, 5),
(45, 4.00, 4.00, 4.00, 4.00, 6, 5),
(46, 3.00, 4.00, 3.00, 3.00, 4, 6),
(47, 3.00, 5.00, 4.00, NULL, 5, 6),
(48, 4.00, 4.00, 4.00, 4.00, 6, 6),
(49, 4.00, 4.00, 4.00, 4.00, 4, 7),
(50, 4.00, 4.00, 4.00, 4.00, 5, 7),
(51, 4.00, 4.00, 4.00, 4.00, 6, 7),
(52, 4.00, 4.00, 4.00, 5.00, 4, 8),
(53, 4.00, 4.00, 4.00, 4.00, 5, 8),
(54, 4.00, 4.00, 4.00, 4.00, 6, 8),
(55, 4.00, 4.00, 4.00, 3.00, 4, 9),
(56, 4.00, 4.00, 3.00, 3.00, 5, 9),
(57, 4.00, 4.00, 3.00, 3.00, 6, 9),
(58, 4.00, 4.00, NULL, NULL, 4, 10),
(59, 4.00, 4.00, NULL, NULL, 5, 10),
(60, 4.00, 4.00, NULL, NULL, 6, 10),
(61, 6.00, 4.00, NULL, 4.00, 7, 1),
(62, 4.00, 4.00, 6.00, 6.00, 8, 1),
(63, 4.00, 4.00, 6.00, 6.00, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infobkacad`
--

CREATE TABLE `infobkacad` (
  `MaInFo` int(10) UNSIGNED NOT NULL,
  `Address` varchar(100) NOT NULL,
  `InFo_Address` varchar(100) NOT NULL,
  `Phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `infobkacad`
--

INSERT INTO `infobkacad` (`MaInFo`, `Address`, `InFo_Address`, `Phone`) VALUES
(1, 'BKACAD Hệ Doanh nghiệp', 'P213, Tầng 2, Tòa nhà A17,  Số 17 Tạ Quang Bửu, HBT, HN', '024-6650 7260'),
(2, 'BKACAD Hệ chứng chỉ Quốc tế', 'Tại Bách Khoa: P203, 17 Tạ Quang Bửu, HBT, HN', '0243-868 4321'),
(3, 'BKACAD Hệ chuyên gia Quốc tế', 'Tầng 5, Tòa nhà D5, Đại học Bách Khoa Hà Nội Số 1 Đại Cổ Việt, HBT, HN', '024-3623 1023'),
(4, 'BKACAD TP. Hồ Chí Minh', 'Số 15 Đường Chợ Lớn Phường 11, Quận 6, TP.  Hồ Chí Minh', '0918 55 46 55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

CREATE TABLE `khoa_hoc` (
  `MaKhoa` int(10) UNSIGNED NOT NULL,
  `TenKhoa` varchar(255) NOT NULL,
  `NamBatDau` year(4) NOT NULL,
  `NamKetThuc` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khoa_hoc`
--

INSERT INTO `khoa_hoc` (`MaKhoa`, `TenKhoa`, `NamBatDau`, `NamKetThuc`) VALUES
(1, 'Khóa 1', 2019, 2022),
(2, 'Khóa 2', 2019, 2022),
(3, 'Khóa 3', 2019, 2022),
(4, 'Khóa 4', 2019, 2022),
(5, 'Khóa 5', 2019, 2022),
(6, 'Khóa 6', 2019, 2022),
(7, 'Khóa 7', 2019, 2022),
(8, 'Khóa 8', 2019, 2022),
(9, 'Khóa 9', 2019, 2022),
(10, 'Khóa 10', 2019, 2022);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `MaLop` int(10) UNSIGNED NOT NULL,
  `TenLop` varchar(255) NOT NULL,
  `MaKhoa` int(10) UNSIGNED NOT NULL,
  `MaNganh` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc`
--

INSERT INTO `lop_hoc` (`MaLop`, `TenLop`, `MaKhoa`, `MaNganh`) VALUES
(1, 'BK1K1', 1, 1),
(2, 'BK2K1', 1, 1),
(4, 'BK3K1', 1, 1),
(5, 'BK1K2', 2, 1),
(6, 'BK2K2', 2, 1),
(7, 'BK3K2', 2, 1),
(8, 'BK1K3', 3, 1),
(9, 'BK2K3', 3, 1),
(10, 'BK3K3', 3, 1),
(11, 'BK1K4', 4, 1),
(12, 'BK2K4', 4, 1),
(13, 'BK3K4', 4, 1),
(14, 'BK1K5', 5, 1),
(15, 'BK2K5', 5, 1),
(16, 'BK3K5', 5, 1),
(17, 'BK1K6', 6, 2),
(18, 'BK2K6', 6, 2),
(19, 'BK3K6', 6, 2),
(20, 'BK1K7', 7, 2),
(21, 'BK2K7', 7, 2),
(22, 'BK3K7', 7, 2),
(23, 'BK1K8', 8, 2),
(24, 'BK2K8', 8, 2),
(25, 'BK3K8', 8, 2),
(26, 'BK1K9', 9, 2),
(27, 'BK2K9', 9, 2),
(28, 'BK3K9', 9, 2),
(30, 'BK1K10', 10, 2),
(31, 'BK2K10', 10, 2),
(32, 'BK3K10', 10, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(100, '2018_04_26_202807_tao_bang_nganh_hoc', 1),
(101, '2018_04_26_202831_tao_bang_mon_hoc', 1),
(102, '2018_04_26_202854_tao_bang_khoa_hoc', 1),
(103, '2018_04_26_202909_tao_bang_lop_hoc', 1),
(104, '2018_04_26_202925_tao_bang_sinh_vien', 1),
(105, '2018_04_26_202944_tao_bang_diem', 1),
(106, '2018_04_26_202958_tao_bang_admin', 1),
(107, '2018_05_21_013727_tao_bang_nganh_chi_tiet', 1),
(108, '2019_05_28_103938_info_bka', 1),
(109, '2019_05_28_112207_social_network', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `MaMon` int(10) UNSIGNED NOT NULL,
  `TenMon` varchar(100) NOT NULL,
  `HinhThucThi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`MaMon`, `TenMon`, `HinhThucThi`) VALUES
(1, 'PHP', 2),
(2, 'Database 1', 2),
(3, 'Dữ liệu giải thuật', 2),
(4, 'CSS', 2),
(5, 'Database 2', 2),
(6, 'Java', 2),
(7, '.Net', 2),
(8, 'PHP 2', 2),
(9, 'C', 2),
(10, 'C#', 2),
(11, 'Bảo mật', 2),
(12, 'Bảo mật dữ liệu', 2),
(13, 'Cấu trúc dữ liệu giải thuật', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_chi_tiet`
--

CREATE TABLE `nganh_chi_tiet` (
  `MaNganh` int(10) UNSIGNED NOT NULL,
  `MaMon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nganh_chi_tiet`
--

INSERT INTO `nganh_chi_tiet` (`MaNganh`, `MaMon`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(2, 11),
(2, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganh_hoc`
--

CREATE TABLE `nganh_hoc` (
  `MaNganh` int(10) UNSIGNED NOT NULL,
  `TenNganh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nganh_hoc`
--

INSERT INTO `nganh_hoc` (`MaNganh`, `TenNganh`) VALUES
(1, 'Lập Trình Máy Tính'),
(2, 'Quản Trị Mạng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `MaSinhVien` int(10) UNSIGNED NOT NULL,
  `TenSinhVien` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SoDienThoai` varchar(12) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `MaNganh` int(10) UNSIGNED NOT NULL,
  `MaKhoa` int(10) UNSIGNED NOT NULL,
  `MaLop` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`MaSinhVien`, `TenSinhVien`, `Email`, `Password`, `NgaySinh`, `GioiTinh`, `SoDienThoai`, `DiaChi`, `MaNganh`, `MaKhoa`, `MaLop`) VALUES
(1, 'sinhvien1', 'sinhvien1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-09-09', 1, '123456789', 'Gia Lâm - Hà Nội', 1, 1, 1),
(2, 'sinhvien2', 'sinhvien2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-06-08', 0, '12345546765', 'Hà Nội', 1, 1, 1),
(3, 'sinhvien3', 'sinhvien3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-09-09', 1, '3213213212', 'Bắc Ninh', 1, 1, 1),
(4, 'sinhvien4', 'sinhvien4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-06-15', 1, '56768732123', 'Bắc Ninh', 1, 1, 2),
(5, 'sinhvien5', 'sinhvien5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-06-13', 1, '123543635', 'Bắc Ninh', 1, 1, 2),
(6, 'sinhvien6', 'sinhvien6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-09-02', 1, '5433423321', 'Bắc Ninh', 1, 1, 2),
(7, 'sinhvien7', 'sinhvien7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-06-14', 1, '654432564', 'Hà Nội', 1, 1, 4),
(8, 'sinhhvien8', 'sinhvien8@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-06-13', 1, '5437642432', 'Bắc ninh', 1, 1, 4),
(9, 'sinhvien9', 'sinhvien9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-07-05', 1, '4324324343', 'Bắc ninh', 1, 1, 4),
(10, 'sinhvien10', 'sinhvien10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-09-09', 0, '1234657689', 'Hà Nội', 2, 6, 17),
(11, 'sinhvien11', 'sinhvien11@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-09-09', 0, '0098767343', 'Bắc ninh', 2, 6, 17),
(12, 'sinhvien12', 'sinhvien12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-09-09', 0, '654432432', 'Hà Nội', 2, 6, 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `socialnetwork`
--

CREATE TABLE `socialnetwork` (
  `MaSN` int(10) UNSIGNED NOT NULL,
  `FaceBook` varchar(100) NOT NULL,
  `Youtube` varchar(100) NOT NULL,
  `Twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `socialnetwork`
--

INSERT INTO `socialnetwork` (`MaSN`, `FaceBook`, `Youtube`, `Twitter`) VALUES
(1, 'https://www.facebook.com/Bkacad', 'www.youtube.com/bkacad', 'https://twitter.com/bkacad');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`MaAdmin`),
  ADD UNIQUE KEY `admin_email_unique` (`Email`),
  ADD UNIQUE KEY `admin_sodienthoai_unique` (`SoDienThoai`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`Ma`),
  ADD KEY `diem_masinhvien_foreign` (`MaSinhVien`),
  ADD KEY `diem_mamon_foreign` (`MaMon`);

--
-- Chỉ mục cho bảng `infobkacad`
--
ALTER TABLE `infobkacad`
  ADD PRIMARY KEY (`MaInFo`),
  ADD UNIQUE KEY `infobkacad_address_unique` (`Address`),
  ADD UNIQUE KEY `infobkacad_info_address_unique` (`InFo_Address`),
  ADD UNIQUE KEY `infobkacad_phone_unique` (`Phone`);

--
-- Chỉ mục cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  ADD PRIMARY KEY (`MaKhoa`),
  ADD UNIQUE KEY `khoa_hoc_tenkhoa_unique` (`TenKhoa`);

--
-- Chỉ mục cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`MaLop`),
  ADD UNIQUE KEY `lop_hoc_tenlop_unique` (`TenLop`),
  ADD KEY `lop_hoc_makhoa_foreign` (`MaKhoa`),
  ADD KEY `lop_hoc_manganh_foreign` (`MaNganh`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`MaMon`),
  ADD UNIQUE KEY `mon_hoc_tenmon_unique` (`TenMon`);

--
-- Chỉ mục cho bảng `nganh_chi_tiet`
--
ALTER TABLE `nganh_chi_tiet`
  ADD PRIMARY KEY (`MaNganh`,`MaMon`),
  ADD KEY `nganh_chi_tiet_mamon_foreign` (`MaMon`);

--
-- Chỉ mục cho bảng `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  ADD PRIMARY KEY (`MaNganh`),
  ADD UNIQUE KEY `nganh_hoc_tennganh_unique` (`TenNganh`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`MaSinhVien`),
  ADD UNIQUE KEY `sinh_vien_email_unique` (`Email`),
  ADD UNIQUE KEY `sinh_vien_sodienthoai_unique` (`SoDienThoai`),
  ADD KEY `sinh_vien_manganh_foreign` (`MaNganh`),
  ADD KEY `sinh_vien_makhoa_foreign` (`MaKhoa`),
  ADD KEY `sinh_vien_malop_foreign` (`MaLop`);

--
-- Chỉ mục cho bảng `socialnetwork`
--
ALTER TABLE `socialnetwork`
  ADD PRIMARY KEY (`MaSN`),
  ADD UNIQUE KEY `socialnetwork_facebook_unique` (`FaceBook`),
  ADD UNIQUE KEY `socialnetwork_youtube_unique` (`Youtube`),
  ADD UNIQUE KEY `socialnetwork_twitter_unique` (`Twitter`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `MaAdmin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `Ma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `infobkacad`
--
ALTER TABLE `infobkacad`
  MODIFY `MaInFo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khoa_hoc`
--
ALTER TABLE `khoa_hoc`
  MODIFY `MaKhoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `MaLop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `MaMon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nganh_hoc`
--
ALTER TABLE `nganh_hoc`
  MODIFY `MaNganh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  MODIFY `MaSinhVien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `socialnetwork`
--
ALTER TABLE `socialnetwork`
  MODIFY `MaSN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_mamon_foreign` FOREIGN KEY (`MaMon`) REFERENCES `mon_hoc` (`MaMon`) ON DELETE CASCADE,
  ADD CONSTRAINT `diem_masinhvien_foreign` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD CONSTRAINT `lop_hoc_makhoa_foreign` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa_hoc` (`MaKhoa`) ON DELETE CASCADE,
  ADD CONSTRAINT `lop_hoc_manganh_foreign` FOREIGN KEY (`MaNganh`) REFERENCES `nganh_hoc` (`MaNganh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nganh_chi_tiet`
--
ALTER TABLE `nganh_chi_tiet`
  ADD CONSTRAINT `nganh_chi_tiet_mamon_foreign` FOREIGN KEY (`MaMon`) REFERENCES `mon_hoc` (`MaMon`) ON DELETE CASCADE,
  ADD CONSTRAINT `nganh_chi_tiet_manganh_foreign` FOREIGN KEY (`MaNganh`) REFERENCES `nganh_hoc` (`MaNganh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sinh_vien_makhoa_foreign` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa_hoc` (`MaKhoa`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinh_vien_malop_foreign` FOREIGN KEY (`MaLop`) REFERENCES `lop_hoc` (`MaLop`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinh_vien_manganh_foreign` FOREIGN KEY (`MaNganh`) REFERENCES `nganh_hoc` (`MaNganh`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
