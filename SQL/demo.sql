-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2019 lúc 06:57 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `namecus` varchar(255) NOT NULL,
  `idnum` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nameem` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `nameservice` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `edate` date NOT NULL,
  `price` int(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `namecus`, `idnum`, `phone`, `nameem`, `room`, `category`, `nameservice`, `adate`, `edate`, `price`, `date`) VALUES
(22, 'Edward Perez', '232500477', '(590) 688-7586', 'Nguyễn Huỳnh Quang Hà', 106, 'Phòng đôi', 'Ăn sáng', '2019-11-26', '2019-11-24', 0, '2019-11-24 12:53:54'),
(23, 'Theresa Ward', '950965628', '(294) 631-3040', 'Nguyễn Huỳnh Quang Hà', 102, 'Phòng đơn', 'Ăn sáng', '2019-11-26', '2019-11-24', 0, '2019-11-24 12:54:20'),
(24, 'Angela Scott', '306860736', '(891) 737-7942', 'Nguyễn Trần Gia Huy', 101, 'Phòng đơn', 'Ăn sáng', '2019-11-23', '2019-11-24', 30000, '2019-11-24 12:54:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `idcat` int(11) NOT NULL,
  `namecat` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`idcat`, `namecat`, `price`, `description`, `ac`) VALUES
(1, 'Phòng đơn', 400000, '1 giường đơn, 1TV, 1 tủ lạnh mini, 1 bàn làm việc.', '18m2'),
(2, 'Phòng đôi', 600000, '1 giường đôi, 1TV, 1 tủ lạnh mini, 1 bàn làm việc.', '24m2'),
(3, 'Phòng gia đình', 800000, '3 giường đơn hoặc 1 giường đôi 1 giường đơn, 1TV, 1 tủ lạnh, 1 bàn làm việc có máy tính.', '30m2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idnum` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `adate` date NOT NULL,
  `edate` date NOT NULL,
  `idservice` int(11) NOT NULL DEFAULT 2,
  `checkin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `idnum`, `phone`, `room`, `adate`, `edate`, `idservice`, `checkin`) VALUES
(36, 'Jonathan Rivera', '341576562', '(547) 872-6643', 105, '2019-11-27', '2019-11-30', 2, 0),
(37, 'Rebecca Kelly', '530490164', '(649) 835-3654', 201, '2019-12-01', '2019-12-04', 1, 0),
(38, 'Julie Foster', '993460278', '(900) 532-0461', 101, '2019-11-28', '2019-12-06', 2, 0),
(41, 'Ralph Smith', '708029940', '(219) 213-7136', 202, '2019-11-25', '2019-11-29', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `email`
--

INSERT INTO `email` (`id`, `email`) VALUES
(1, 'giahuy@gmail.com'),
(2, '51702113@gmail.com'),
(3, 'giahuy0112@gmail.com'),
(4, 'concavang@gmail.com'),
(5, 'cauvang@yahoo.com.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `floor`
--

CREATE TABLE `floor` (
  `idfloor` int(11) NOT NULL,
  `floor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `floor`
--

INSERT INTO `floor` (`idfloor`, `floor`) VALUES
(1, 'Tầng 1'),
(2, 'Tầng 2'),
(3, 'Tầng 3'),
(4, 'Tầng 4'),
(5, 'Tầng 5'),
(6, 'Tầng 6'),
(7, 'Tầng 7'),
(8, 'Tầng 8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idcat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `idcat`) VALUES
(13, 'single1.jpg', 1),
(14, 'single2.jpg', 1),
(15, 'couple1.jpg', 2),
(16, 'couple2.jpg', 2),
(17, 'couple3.jpg', 2),
(18, 'family1.jpg', 3),
(19, 'family2.jfif', 3),
(20, 'family3.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `idroom` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `idcat` int(11) NOT NULL,
  `idfloor` int(11) NOT NULL,
  `isready` varchar(255) NOT NULL,
  `edate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`idroom`, `room`, `idcat`, `idfloor`, `isready`, `edate`) VALUES
(1, 101, 1, 1, 'not ready', '2019-12-06'),
(2, 102, 1, 1, 'not ready', '2019-11-28'),
(3, 103, 1, 1, 'ready', '0000-00-00'),
(4, 104, 1, 1, 'ready', '0000-00-00'),
(5, 105, 2, 1, 'not ready', '2019-11-30'),
(6, 106, 2, 1, 'not ready', '2019-11-29'),
(7, 107, 2, 1, 'ready', '0000-00-00'),
(8, 108, 2, 1, 'ready', '0000-00-00'),
(9, 201, 3, 2, 'not ready', '2019-12-04'),
(10, 202, 3, 2, 'not ready', '2019-11-29'),
(11, 203, 3, 2, 'ready', '0000-00-00'),
(12, 204, 3, 2, 'ready', '0000-00-00'),
(13, 205, 2, 2, 'ready', '0000-00-00'),
(14, 206, 2, 2, 'ready', '0000-00-00'),
(15, 207, 1, 2, 'ready', '0000-00-00'),
(16, 208, 1, 2, 'ready', '0000-00-00'),
(17, 301, 1, 3, 'ready', '0000-00-00'),
(18, 302, 1, 3, 'ready', '0000-00-00'),
(19, 303, 2, 3, 'ready', '0000-00-00'),
(20, 304, 2, 3, 'ready', '0000-00-00'),
(21, 305, 2, 3, 'ready', '0000-00-00'),
(22, 306, 2, 3, 'ready', '0000-00-00'),
(23, 307, 3, 3, 'ready', '0000-00-00'),
(24, 308, 3, 3, 'ready', '0000-00-00'),
(25, 401, 1, 4, 'ready', '0000-00-00'),
(26, 402, 1, 4, 'ready', '0000-00-00'),
(27, 403, 1, 4, 'ready', '0000-00-00'),
(28, 404, 1, 4, 'ready', '0000-00-00'),
(29, 405, 2, 4, 'ready', '0000-00-00'),
(30, 406, 2, 4, 'ready', '0000-00-00'),
(31, 407, 2, 4, 'ready', '0000-00-00'),
(32, 408, 2, 4, 'ready', '0000-00-00'),
(33, 501, 3, 5, 'ready', '0000-00-00'),
(34, 502, 3, 5, 'ready', '0000-00-00'),
(35, 503, 3, 5, 'ready', '0000-00-00'),
(36, 504, 3, 5, 'ready', '0000-00-00'),
(37, 505, 2, 5, 'ready', '0000-00-00'),
(38, 506, 2, 5, 'ready', '0000-00-00'),
(39, 507, 1, 5, 'ready', '0000-00-00'),
(40, 508, 1, 5, 'ready', '0000-00-00'),
(41, 601, 2, 6, 'ready', '0000-00-00'),
(42, 602, 2, 6, 'ready', '0000-00-00'),
(43, 603, 2, 6, 'ready', '0000-00-00'),
(44, 604, 2, 6, 'ready', '0000-00-00'),
(45, 605, 3, 6, 'ready', '0000-00-00'),
(46, 606, 3, 6, 'ready', '0000-00-00'),
(47, 607, 3, 6, 'ready', '0000-00-00'),
(48, 608, 3, 6, 'ready', '0000-00-00'),
(49, 609, 1, 6, 'ready', '0000-00-00'),
(50, 610, 1, 6, 'ready', '0000-00-00'),
(51, 701, 1, 7, 'ready', '0000-00-00'),
(52, 702, 1, 7, 'ready', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `idservice` int(11) NOT NULL,
  `nameservice` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`idservice`, `nameservice`, `price`) VALUES
(1, 'Ăn sáng', 30000),
(2, 'Không', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeuser`
--

CREATE TABLE `typeuser` (
  `idtype` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `typeuser`
--

INSERT INTO `typeuser` (`idtype`, `type`) VALUES
(0, 'user'),
(1, 'admin'),
(2, 'root');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idnum` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `idtype` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `name`, `idnum`, `phone`, `idtype`) VALUES
(1, 'root', 'root', '', '', '', 2),
(2, 'admin', 'admin', 'Nguyễn Huỳnh Quang Hà', '995747184', '(916) 864-3358', 1),
(3, 'admin2', 'admin', 'Nguyễn Trần Gia Huy', '321618635', '(439) 410-5921', 1),
(4, 'user1', '123', 'Angela Scott', '306860736', '(891) 737-7942', 0),
(5, 'user2', '123', 'Jonathan Rivera', '341576562', '(547) 872-6643', 0),
(6, 'user3', '123', 'Rebecca Kelly', '530490164', '(649) 835-3654', 0),
(7, 'user4', '123', 'Julie Foster', '993460278', '(900) 532-0461', 0),
(8, 'root2', 'root', 'Jeremy Bell', '993460278', '(459) 281-9652', 2),
(9, 'user5', '123', 'Edward Perez', '232500477', '(590) 688-7586', 0),
(10, 'user6', '123', 'Theresa Ward', '950965628\r\n', '(294) 631-3040', 0),
(11, 'user7', '123', 'Ralph Smith', '708029940', '(219) 213-7136', 0),
(12, 'user8', '123', 'Doris Jones', '519183853', '(508) 922-8538', 0),
(13, 'user9', '123', 'Susan Martin', '168005667', '(596) 656-6008', 0),
(14, 'user10', '123', 'Harold Murphy', '316232594', '(613) 350-7898', 0),
(15, 'user11', '123', 'Diana Green', '196186994', '(934) 572-2950', 0),
(16, 'trackhang', '123', 'Trác Hoàng Khang', '51702120', '17050201', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcat`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idservice_customer` (`idservice`);

--
-- Chỉ mục cho bảng `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`idfloor`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idcat_images` (`idcat`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`idroom`),
  ADD KEY `fk_idfloor` (`idfloor`),
  ADD KEY `fk_idcat` (`idcat`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idservice`);

--
-- Chỉ mục cho bảng `typeuser`
--
ALTER TABLE `typeuser`
  ADD PRIMARY KEY (`idtype`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `fk_idtype` (`idtype`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `idroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `idservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_idservice_customer` FOREIGN KEY (`idservice`) REFERENCES `service` (`idservice`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_idcat_images` FOREIGN KEY (`idcat`) REFERENCES `category` (`idcat`);

--
-- Các ràng buộc cho bảng `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_idcat` FOREIGN KEY (`idcat`) REFERENCES `category` (`idcat`),
  ADD CONSTRAINT `fk_idfloor` FOREIGN KEY (`idfloor`) REFERENCES `floor` (`idfloor`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_idtype` FOREIGN KEY (`idtype`) REFERENCES `typeuser` (`idtype`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
