-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 01, 2018 lúc 05:45 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbproject2_laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblchuyennganh`
--

CREATE TABLE `tblchuyennganh` (
  `maCN` int(10) UNSIGNED NOT NULL,
  `tenCN` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblchuyennganh`
--

INSERT INTO `tblchuyennganh` (`maCN`, `tenCN`) VALUES
(2, 'Lập Trình Máy Tính\r\n'),
(1, 'Mạng Máy Tính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbldiem`
--

CREATE TABLE `tbldiem` (
  `maSv` int(10) UNSIGNED NOT NULL,
  `maMon` int(10) UNSIGNED NOT NULL,
  `diemThiFinalLan1` int(11) DEFAULT NULL,
  `diemThiFinalLan2` int(11) DEFAULT NULL,
  `diemThiSkillLan1` int(11) DEFAULT NULL,
  `diemThiSkillLan2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbldiem`
--

INSERT INTO `tbldiem` (`maSv`, `maMon`, `diemThiFinalLan1`, `diemThiFinalLan2`, `diemThiSkillLan1`, `diemThiSkillLan2`) VALUES
(1, 1, 4, 6, 3, 7),
(1, 5, 8, NULL, 8, NULL),
(3, 1, 8, 0, 8, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblkhoahoc`
--

CREATE TABLE `tblkhoahoc` (
  `maKhoa` int(10) UNSIGNED NOT NULL,
  `tenKhoa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblkhoahoc`
--

INSERT INTO `tblkhoahoc` (`maKhoa`, `tenKhoa`) VALUES
(1, 'Khóa 1'),
(2, 'Khóa 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbllop`
--

CREATE TABLE `tbllop` (
  `maLop` int(10) UNSIGNED NOT NULL,
  `tenLop` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCN` int(10) UNSIGNED NOT NULL,
  `maKhoa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbllop`
--

INSERT INTO `tbllop` (`maLop`, `tenLop`, `maCN`, `maKhoa`) VALUES
(1, 'BKC01K1', 1, 1),
(2, 'BKC02K1', 1, 1),
(3, 'BKC03K1', 2, 1),
(4, 'BKC04K1', 2, 1),
(5, 'BKC04K2', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblmon`
--

CREATE TABLE `tblmon` (
  `maMon` int(10) UNSIGNED NOT NULL,
  `tenMon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCN` int(10) UNSIGNED NOT NULL,
  `Final` tinyint(4) NOT NULL,
  `Skill` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblmon`
--

INSERT INTO `tblmon` (`maMon`, `tenMon`, `maCN`, `Final`, `Skill`) VALUES
(1, 'ICT', 2, 1, 1),
(2, 'Java', 2, 1, 1),
(3, 'HTML , CSS , Javascript', 2, 1, 1),
(5, 'Hướng Đối Tượng', 2, 1, 1),
(7, 'C Cơ Bản', 2, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsinhvien`
--

CREATE TABLE `tblsinhvien` (
  `maSv` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PQ` int(11) NOT NULL,
  `hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` tinyint(1) NOT NULL,
  `diaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDienThoai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maLop` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsinhvien`
--

INSERT INTO `tblsinhvien` (`maSv`, `email`, `password`, `PQ`, `hoTen`, `ngaySinh`, `gioiTinh`, `diaChi`, `soDienThoai`, `maLop`) VALUES
(1, 'thuan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Trần Văn Thuân', '2018-06-09', 1, 'Bắc Ninh', '0986666666', 4),
(3, 'khanhlinh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Đỗ Khánh Linh', '1998-03-12', 0, 'Ninh Bình', '098888888812', 4),
(152002, 'kl@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Trần Văn P', '1998-02-11', 1, 'Bắc Ninh', '1234456779', 5),
(152004, 'assb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Nguyễn Văn C', '1998-12-12', 1, 'Ha nội', '1234564', 5),
(152005, 'dsadas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Bùi Văn A', '2018-11-12', 1, 'Ha nội', '0988888888', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblchuyennganh`
--
ALTER TABLE `tblchuyennganh`
  ADD PRIMARY KEY (`maCN`),
  ADD UNIQUE KEY `tblchuyennganh_tencn_unique` (`tenCN`);

--
-- Chỉ mục cho bảng `tbldiem`
--
ALTER TABLE `tbldiem`
  ADD PRIMARY KEY (`maSv`,`maMon`),
  ADD KEY `tbldiem_mamon_foreign` (`maMon`);

--
-- Chỉ mục cho bảng `tblkhoahoc`
--
ALTER TABLE `tblkhoahoc`
  ADD PRIMARY KEY (`maKhoa`),
  ADD UNIQUE KEY `tblkhoahoc_tenkhoa_unique` (`tenKhoa`);

--
-- Chỉ mục cho bảng `tbllop`
--
ALTER TABLE `tbllop`
  ADD PRIMARY KEY (`maLop`),
  ADD UNIQUE KEY `tbllop_tenlop_unique` (`tenLop`),
  ADD KEY `tbllop_macn_foreign` (`maCN`),
  ADD KEY `tbllop_makhoa_foreign` (`maKhoa`);

--
-- Chỉ mục cho bảng `tblmon`
--
ALTER TABLE `tblmon`
  ADD PRIMARY KEY (`maMon`),
  ADD UNIQUE KEY `tblmon_tenmon_unique` (`tenMon`),
  ADD KEY `tblmon_macn_foreign` (`maCN`);

--
-- Chỉ mục cho bảng `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  ADD PRIMARY KEY (`maSv`),
  ADD KEY `tblsinhvien_malop_foreign` (`maLop`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblchuyennganh`
--
ALTER TABLE `tblchuyennganh`
  MODIFY `maCN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tblkhoahoc`
--
ALTER TABLE `tblkhoahoc`
  MODIFY `maKhoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbllop`
--
ALTER TABLE `tbllop`
  MODIFY `maLop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tblmon`
--
ALTER TABLE `tblmon`
  MODIFY `maMon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  MODIFY `maSv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152006;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbldiem`
--
ALTER TABLE `tbldiem`
  ADD CONSTRAINT `tbldiem_mamon_foreign` FOREIGN KEY (`maMon`) REFERENCES `tblmon` (`maMon`),
  ADD CONSTRAINT `tbldiem_masv_foreign` FOREIGN KEY (`maSv`) REFERENCES `tblsinhvien` (`maSv`);

--
-- Các ràng buộc cho bảng `tbllop`
--
ALTER TABLE `tbllop`
  ADD CONSTRAINT `tbllop_macn_foreign` FOREIGN KEY (`maCN`) REFERENCES `tblchuyennganh` (`maCN`),
  ADD CONSTRAINT `tbllop_makhoa_foreign` FOREIGN KEY (`maKhoa`) REFERENCES `tblkhoahoc` (`maKhoa`);

--
-- Các ràng buộc cho bảng `tblmon`
--
ALTER TABLE `tblmon`
  ADD CONSTRAINT `tblmon_macn_foreign` FOREIGN KEY (`maCN`) REFERENCES `tblchuyennganh` (`maCN`);

--
-- Các ràng buộc cho bảng `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  ADD CONSTRAINT `tblsinhvien_malop_foreign` FOREIGN KEY (`maLop`) REFERENCES `tbllop` (`maLop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
