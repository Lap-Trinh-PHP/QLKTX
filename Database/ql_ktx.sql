-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 13, 2021 lúc 12:44 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ktx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diennuoc`
--

CREATE TABLE `diennuoc` (
  `idHoaDon` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `soDienIn` int(11) DEFAULT NULL,
  `soDienOut` int(11) DEFAULT NULL,
  `soNuocIn` int(11) DEFAULT NULL,
  `soNuocOut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diennuoc`
--

INSERT INTO `diennuoc` (`idHoaDon`, `idPhong`, `soDienIn`, `soDienOut`, `soNuocIn`, `soNuocOut`) VALUES
(1, 100, 22, 42, 57, 67);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idHoaDon` int(11) NOT NULL,
  `idPhong` int(11) DEFAULT NULL,
  `ngayLap` datetime DEFAULT NULL,
  `tienPhong` double DEFAULT NULL,
  `chiSoDienDau` int(11) DEFAULT NULL,
  `chiSoDienCuoi` int(11) DEFAULT NULL,
  `chiSoNuocDau` int(11) DEFAULT NULL,
  `chiSoNuocCuoi` int(11) DEFAULT NULL,
  `tongTien` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `idHopDong` int(11) NOT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `idPhong` int(11) DEFAULT NULL,
  `ngayLap` datetime DEFAULT NULL,
  `ngayBatDau` datetime DEFAULT NULL,
  `ngayKetThuc` datetime DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kyluat`
--

CREATE TABLE `kyluat` (
  `idKyLuat` int(11) NOT NULL,
  `tenKyLuat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `chiTiet` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ngayLap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kyluat`
--

INSERT INTO `kyluat` (`idKyLuat`, `tenKyLuat`, `idSinhVien`, `chiTiet`, `ngayLap`) VALUES
(1, 'Ra ngoài sau 22h', 2018602126, 'hihi', '2021-08-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `idPhong` int(11) NOT NULL,
  `soLuongSv` int(11) DEFAULT NULL,
  `tinhTrang` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `option` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`idPhong`, `soLuongSv`, `tinhTrang`, `option`) VALUES
(100, 10, 'tốt', 'có đầy đủ nóng lạnh, điều hòa, nước ổn'),
(101, 10, 'tốt', 'full option');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `idSinhVien` int(11) NOT NULL,
  `hoTen` varchar(30) NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `gioiTinh` int(1) DEFAULT NULL,
  `soCMND` char(20) DEFAULT NULL,
  `SDT` char(20) DEFAULT NULL,
  `khoa` varchar(30) DEFAULT NULL,
  `lopHoc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`idSinhVien`, `hoTen`, `ngaySinh`, `gioiTinh`, `soCMND`, `SDT`, `khoa`, `lopHoc`) VALUES
(2018602126, 'Nguyễn Duy Đồng', '2021-08-01', 0, '123456789', '032555648', 'Kế toán', 'Kiểm toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taisan`
--

CREATE TABLE `taisan` (
  `idTaiSan` int(11) NOT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `idPhong` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `ngayMuon` datetime DEFAULT NULL,
  `ngayTra` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thutien`
--

CREATE TABLE `thutien` (
  `maThu` int(11) NOT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `idPhong` int(11) DEFAULT NULL,
  `namHoc` int(5) DEFAULT NULL,
  `ngayThu` datetime DEFAULT NULL,
  `soTienThu` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tructuquan`
--

CREATE TABLE `tructuquan` (
  `idTruc` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `tangTruc` int(11) NOT NULL,
  `ngayBatDau` date NOT NULL,
  `ngayKetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tructuquan`
--

INSERT INTO `tructuquan` (`idTruc`, `idPhong`, `tangTruc`, `ngayBatDau`, `ngayKetThuc`) VALUES
(1, 100, 2, '2021-08-02', '2021-08-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `userName`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `diennuoc`
--
ALTER TABLE `diennuoc`
  ADD PRIMARY KEY (`idHoaDon`),
  ADD KEY `fk_DienNuoc_phong` (`idPhong`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idHoaDon`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`idHopDong`),
  ADD KEY `idSinhVien` (`idSinhVien`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Chỉ mục cho bảng `kyluat`
--
ALTER TABLE `kyluat`
  ADD PRIMARY KEY (`idKyLuat`),
  ADD KEY `idSinhVien` (`idSinhVien`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`idPhong`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`idSinhVien`);

--
-- Chỉ mục cho bảng `taisan`
--
ALTER TABLE `taisan`
  ADD PRIMARY KEY (`idTaiSan`),
  ADD KEY `fk_TaiSan_SV` (`idSinhVien`),
  ADD KEY `fk_TaiSan_phong` (`idPhong`);

--
-- Chỉ mục cho bảng `thutien`
--
ALTER TABLE `thutien`
  ADD PRIMARY KEY (`maThu`),
  ADD KEY `idSinhVien` (`idSinhVien`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Chỉ mục cho bảng `tructuquan`
--
ALTER TABLE `tructuquan`
  ADD PRIMARY KEY (`idTruc`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `kyluat`
--
ALTER TABLE `kyluat`
  MODIFY `idKyLuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `idSinhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018602128;

--
-- AUTO_INCREMENT cho bảng `tructuquan`
--
ALTER TABLE `tructuquan`
  MODIFY `idTruc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diennuoc`
--
ALTER TABLE `diennuoc`
  ADD CONSTRAINT `fk_DienNuoc_phong` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Các ràng buộc cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_1` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`),
  ADD CONSTRAINT `hopdong_ibfk_2` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Các ràng buộc cho bảng `kyluat`
--
ALTER TABLE `kyluat`
  ADD CONSTRAINT `kyluat_ibfk_1` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`);

--
-- Các ràng buộc cho bảng `taisan`
--
ALTER TABLE `taisan`
  ADD CONSTRAINT `fk_TaiSan_SV` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`),
  ADD CONSTRAINT `fk_TaiSan_phong` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Các ràng buộc cho bảng `thutien`
--
ALTER TABLE `thutien`
  ADD CONSTRAINT `thutien_ibfk_1` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`),
  ADD CONSTRAINT `thutien_ibfk_2` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Các ràng buộc cho bảng `tructuquan`
--
ALTER TABLE `tructuquan`
  ADD CONSTRAINT `tructuquan_ibfk_1` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
