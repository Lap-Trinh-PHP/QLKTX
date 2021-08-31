-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 07:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_ktx`
--

-- --------------------------------------------------------

--
-- Table structure for table `diennuoc`
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
-- Dumping data for table `diennuoc`
--

INSERT INTO `diennuoc` (`idHoaDon`, `idPhong`, `soDienIn`, `soDienOut`, `soNuocIn`, `soNuocOut`) VALUES
(1, 100, 22, 42, 57, 67);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
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
-- Table structure for table `hopdong`
--

CREATE TABLE `hopdong` (
  `idHopDong` int(11) NOT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `idPhong` int(11) DEFAULT NULL,
  `ngayLap` date DEFAULT NULL,
  `ngayBatDau` date DEFAULT NULL,
  `ngayKetThuc` date DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hopdong`
--

INSERT INTO `hopdong` (`idHopDong`, `idSinhVien`, `idPhong`, `ngayLap`, `ngayBatDau`, `ngayKetThuc`, `status`) VALUES
(0, 2018602128, 100, '2021-08-05', '2021-08-16', '2021-08-30', 'Chưa ở');

-- --------------------------------------------------------

--
-- Table structure for table `kyluat`
--

CREATE TABLE `kyluat` (
  `idKyLuat` int(11) NOT NULL,
  `tenKyLuat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `chiTiet` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ngayLap` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kyluat`
--

INSERT INTO `kyluat` (`idKyLuat`, `tenKyLuat`, `idSinhVien`, `chiTiet`, `ngayLap`) VALUES
(1, 'Ra ngoài sau 22h', 2018602126, 'hihi', '2021-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `idPhong` int(11) NOT NULL,
  `soLuongSv` int(11) DEFAULT NULL,
  `tinhTrang` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `option` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`idPhong`, `soLuongSv`, `tinhTrang`, `option`) VALUES
(100, 10, 'xấu', 'có đầy đủ nóng lạnh, điều hòa, nước ổn'),
(101, 10, 'tốt', 'full option'),
(102, 20, 'Tốt', 'Điều hòa');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
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
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`idSinhVien`, `hoTen`, `ngaySinh`, `gioiTinh`, `soCMND`, `SDT`, `khoa`, `lopHoc`) VALUES
(2018602126, 'Nguyễn Duy Đồng', '2021-08-01', 0, '123456789', '032555648', 'Kế toán', 'Kiểm toán'),
(2018602128, 'Trần Sơn Đỉnh', '2000-07-28', 0, '1254911', '6510131', 'Công nghệ thông tin', 'Kỹ thuật phần mềm 1');

-- --------------------------------------------------------

--
-- Table structure for table `taisan`
--

CREATE TABLE `taisan` (
  `idTaiSan` int(11) NOT NULL,
  `idSinhVien` int(11) DEFAULT NULL,
  `idPhong` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `ngayMuon` date DEFAULT NULL,
  `ngayTra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taisan`
--

INSERT INTO `taisan` (`idTaiSan`, `idSinhVien`, `idPhong`, `soLuong`, `ngayMuon`, `ngayTra`) VALUES
(1, 2018602128, 100, 2, '2021-09-02', '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `thutien`
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
-- Table structure for table `tructuquan`
--

CREATE TABLE `tructuquan` (
  `idTruc` int(11) NOT NULL,
  `idPhong` int(11) NOT NULL,
  `tangTruc` int(11) NOT NULL,
  `ngayBatDau` date NOT NULL,
  `ngayKetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tructuquan`
--

INSERT INTO `tructuquan` (`idTruc`, `idPhong`, `tangTruc`, `ngayBatDau`, `ngayKetThuc`) VALUES
(1, 100, 2, '2021-08-02', '2021-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diennuoc`
--
ALTER TABLE `diennuoc`
  ADD PRIMARY KEY (`idHoaDon`),
  ADD KEY `fk_DienNuoc_phong` (`idPhong`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idHoaDon`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Indexes for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`idHopDong`),
  ADD KEY `idSinhVien` (`idSinhVien`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Indexes for table `kyluat`
--
ALTER TABLE `kyluat`
  ADD PRIMARY KEY (`idKyLuat`),
  ADD KEY `idSinhVien` (`idSinhVien`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`idPhong`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`idSinhVien`);

--
-- Indexes for table `taisan`
--
ALTER TABLE `taisan`
  ADD PRIMARY KEY (`idTaiSan`),
  ADD KEY `fk_TaiSan_SV` (`idSinhVien`),
  ADD KEY `fk_TaiSan_phong` (`idPhong`);

--
-- Indexes for table `thutien`
--
ALTER TABLE `thutien`
  ADD PRIMARY KEY (`maThu`),
  ADD KEY `idSinhVien` (`idSinhVien`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Indexes for table `tructuquan`
--
ALTER TABLE `tructuquan`
  ADD PRIMARY KEY (`idTruc`),
  ADD KEY `idPhong` (`idPhong`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kyluat`
--
ALTER TABLE `kyluat`
  MODIFY `idKyLuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `idSinhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2018602129;

--
-- AUTO_INCREMENT for table `tructuquan`
--
ALTER TABLE `tructuquan`
  MODIFY `idTruc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diennuoc`
--
ALTER TABLE `diennuoc`
  ADD CONSTRAINT `fk_DienNuoc_phong` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Constraints for table `hopdong`
--
ALTER TABLE `hopdong`
  ADD CONSTRAINT `hopdong_ibfk_1` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`),
  ADD CONSTRAINT `hopdong_ibfk_2` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Constraints for table `kyluat`
--
ALTER TABLE `kyluat`
  ADD CONSTRAINT `kyluat_ibfk_1` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`);

--
-- Constraints for table `taisan`
--
ALTER TABLE `taisan`
  ADD CONSTRAINT `fk_TaiSan_SV` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`),
  ADD CONSTRAINT `fk_TaiSan_phong` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Constraints for table `thutien`
--
ALTER TABLE `thutien`
  ADD CONSTRAINT `thutien_ibfk_1` FOREIGN KEY (`idSinhVien`) REFERENCES `sinhvien` (`idSinhVien`),
  ADD CONSTRAINT `thutien_ibfk_2` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);

--
-- Constraints for table `tructuquan`
--
ALTER TABLE `tructuquan`
  ADD CONSTRAINT `tructuquan_ibfk_1` FOREIGN KEY (`idPhong`) REFERENCES `phong` (`idPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
