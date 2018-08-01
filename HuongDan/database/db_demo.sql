-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th7 27, 2018 lúc 03:48 PM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangxephangclb`
--

DROP TABLE IF EXISTS `bangxephangclb`;
CREATE TABLE IF NOT EXISTS `bangxephangclb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauLacBo` int(11) NOT NULL,
  `Diem` int(5) NOT NULL,
  `HangCauLacBo` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauLacBo` (`idCauLacBo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bangxephangclb`
--

INSERT INTO `bangxephangclb` (`id`, `idCauLacBo`, `Diem`, `HangCauLacBo`) VALUES
(1, 1, 1304, 22),
(2, 2, 1500, 13),
(3, 3, 1590, 9),
(4, 4, 1741, 5),
(5, 5, 1582, 10),
(6, 6, 1001, 68),
(7, 7, 1101, 57),
(8, 8, 1244, 37),
(9, 9, 1257, 36),
(10, 10, 1405, 14),
(11, 11, 991, 74),
(12, 12, 1300, 30),
(13, 13, 920, 72),
(14, 14, 910, 71),
(15, 15, 1301, 28),
(16, 16, 1201, 41),
(17, 17, 1202, 40),
(18, 18, 1002, 64),
(19, 19, 1226, 38),
(20, 20, 869, 79);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangxephangclbgiaidau`
--

DROP TABLE IF EXISTS `bangxephangclbgiaidau`;
CREATE TABLE IF NOT EXISTS `bangxephangclbgiaidau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SoTran` int(3) DEFAULT NULL,
  `SoTranThang` int(3) DEFAULT NULL,
  `SoTranHoa` int(3) DEFAULT NULL,
  `SoTranThua` int(3) DEFAULT NULL,
  `BanThang` int(3) DEFAULT NULL,
  `BanThua` int(3) DEFAULT NULL,
  `HieuSo` int(3) DEFAULT NULL,
  `TheVang` int(3) DEFAULT NULL,
  `TheDo` int(3) DEFAULT NULL,
  `ChiSoFairplay` int(3) DEFAULT NULL,
  `Diem` int(3) DEFAULT NULL,
  `idGiaiDau` int(11) NOT NULL,
  `idCauLacBo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idGiaiDau` (`idGiaiDau`),
  KEY `idCauLacBo` (`idCauLacBo`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bangxephangclbgiaidau`
--

INSERT INTO `bangxephangclbgiaidau` (`id`, `SoTran`, `SoTranThang`, `SoTranHoa`, `SoTranThua`, `BanThang`, `BanThua`, `HieuSo`, `TheVang`, `TheDo`, `ChiSoFairplay`, `Diem`, `idGiaiDau`, `idCauLacBo`) VALUES
(65, 5, 2, 1, 2, 8, 6, 2, 5, 0, -7, 7, 4, 1),
(66, 5, 5, 0, 0, 10, 2, 8, 4, 1, -9, 15, 4, 2),
(67, 5, 5, 0, 0, 9, 1, 8, 9, 0, -12, 15, 4, 3),
(68, 5, 3, 1, 1, 16, 5, 11, 7, 0, -9, 10, 4, 4),
(69, 5, 3, 1, 1, 8, 7, 1, 6, 1, -12, 10, 4, 5),
(70, 5, 1, 2, 2, 4, 7, -3, 5, 0, -7, 5, 4, 6),
(71, 5, 0, 1, 4, 2, 7, -5, 5, 2, -15, 1, 4, 7),
(72, 5, 1, 1, 3, 5, 8, -3, 12, 0, -16, 4, 4, 8),
(73, 5, 1, 1, 3, 5, 9, -4, 6, 0, -9, 4, 4, 9),
(74, 5, 5, 0, 0, 12, 4, 8, 10, 0, -13, 15, 4, 10),
(75, 5, 1, 3, 1, 3, 3, 0, 4, 0, -5, 6, 4, 11),
(76, 5, 1, 4, 0, 10, 7, 3, 5, 0, -7, 7, 4, 12),
(77, 5, 1, 1, 3, 5, 9, -4, 9, 1, -17, 4, 4, 13),
(78, 5, 1, 1, 3, 7, 12, -5, 6, 0, -8, 4, 4, 14),
(79, 5, 1, 2, 2, 6, 8, -2, 6, 0, -8, 5, 4, 15),
(80, 5, 0, 2, 3, 2, 7, -5, 8, 0, -11, 2, 4, 16),
(81, 5, 1, 3, 1, 10, 8, 2, 8, 0, -11, 6, 4, 17),
(82, 5, 2, 1, 2, 8, 9, -1, 7, 0, -10, 7, 4, 18),
(83, 5, 2, 1, 2, 6, 6, 0, 6, 0, -8, 7, 4, 19),
(84, 5, 0, 2, 3, 3, 14, -11, 10, 1, -18, 2, 4, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caulacbo`
--

DROP TABLE IF EXISTS `caulacbo`;
CREATE TABLE IF NOT EXISTS `caulacbo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenDayDu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TenVietTat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TruSo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayThanhLap` date DEFAULT NULL,
  `BietDanh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SanVanDong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LichSu` longtext COLLATE utf8_unicode_ci,
  `SucChua` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChuTich` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhAnhCauLacBo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnhCauLacBo_lon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `caulacbo`
--

INSERT INTO `caulacbo` (`id`, `TenDayDu`, `TenVietTat`, `TruSo`, `NgayThanhLap`, `BietDanh`, `SanVanDong`, `LichSu`, `SucChua`, `ChuTich`, `HinhAnhCauLacBo`, `HinhAnhCauLacBo_lon`) VALUES
(1, 'Arsenal', 'ARS', 'London', '1886-12-18', 'Pháo thủ', 'Emirates', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Arsenal l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp c&oacute; trụ sở tại Holloway, London, hiện đang thi đấu tại Giải b&oacute;ng đ&aacute; Ngoại hạng Anh, giải đấu cấp cao nhất trong hệ thống b&oacute;ng đ&aacute; Anh.</p>', '60432', 'Sir Chips Keswick', 'Arsenal.png', 'Arsenal_big.png'),
(2, 'Liverpool', 'LIV', 'Tập đoàn Fenway Sports', '1892-03-15', 'The Reds', 'Anfield', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Liverpool (viết tắt Liverpool F.C.) l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp Anh, c&oacute; trụ sở tại th&agrave;nh phố Liverpool, hạt Merseyside, hiện đang chơi tại giải b&oacute;ng đ&aacute; Ngoại hạng Anh. T&iacute;nh đến nay, Liverpool đ&atilde; 18 lần v&ocirc; địch nước Anh, gi&agrave;nh được 7 C&uacute;p FA, 8 C&uacute;p Li&ecirc;n đo&agrave;n Anh, 15 Si&ecirc;u c&uacute;p Anh, 5 C&uacute;p v&ocirc; địch ch&acirc;u &Acirc;u (C&uacute;p C1), 3 C&uacute;p UEFA (C&uacute;p C2) v&agrave; 3 Si&ecirc;u c&uacute;p ch&acirc;u &Acirc;u.</p>', '54074', 'Tom Werner', 'Liverpool.png', 'Liverpool_big.png'),
(3, 'Manchester Utd', 'MU', 'Manchester', '1878-06-08', 'Quỷ đỏ', 'Old Trafford', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Manchester United l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp c&oacute; trụ sở tại Old Trafford, Greater Machester, Anh. C&acirc;u lạc bộ đang chơi tại Giải b&oacute;ng đ&aacute; Ngoại hạng Anh, giải đấu h&agrave;ng đầu trong hệ thống b&oacute;ng đ&aacute; Anh.</p>', '75643', 'Manchester United plc', 'MU.png', 'MU_big.png'),
(4, 'Manchester City', 'MC', 'The Citizens', '1894-12-12', 'Etihad', 'Etihad', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Manchester City l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp, đặt trụ sở tại th&agrave;nh phố Manchester, nước Anh. Manchester City đ&atilde; 4 lần v&ocirc; địch giải b&oacute;ng đ&aacute; Ngoại hạng Anh, 5 lần đoạt c&uacute;p FA v&agrave; 1 lần đoạt c&uacute;p C2 ch&acirc;u &Acirc;u.</p>', '55097', 'Mansour bin Zayed Al Nahyan', 'ManCity.png', 'ManCity_big.png'),
(5, 'Tottenham', 'TOT', 'London', '1882-09-05', 'Gà', 'Wembley', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Tottenham Hotspur l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; ở Lu&acirc;n Đ&ocirc;n, thủ đ&ocirc; Vương quốc Li&ecirc;n hiệp Anh v&agrave; Bắc Ireland. C&acirc;u lạc bộ c&ograve;n c&oacute; c&aacute;c t&ecirc;n gọi kh&aacute;c như Spurs, The Spurs, Tottenham hay Lilywhites.</p>', '90000', 'Daniel Levy', '1531580538ToT_nho.png', '1531580538ToT.png'),
(6, 'Bournemouth', 'AFCB', 'Edmund Mitchell', '1899-07-14', 'AFCB', 'Dean Court', '<p>A.F.C. Bournemouth l&agrave; một đội b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp đang thi đấu tại giải Ngoại Hạng Anh. Đội b&oacute;ng thi đấu tr&ecirc;n s&acirc;n Vitality ở Kings Park, Boscombe, Bournemouth, Dorset được th&agrave;nh lập năm 1899.</p>', '11360', 'Edmund Mitchell', '1531581144Bou.png', '1531581144Bou_lon.png'),
(7, 'Brighton Hove Albion', 'BRI', 'Falmer Stadium', '1901-06-24', 'The Seagulls', 'Falmer Stadium', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Brighton &amp; Hove Albion l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp c&oacute; trụ sở tại th&agrave;nh phố Brighton and Hove, East Sussex, Anh, thường được gọi đơn giản l&agrave; Brighton.</p>', '30750', 'Tony Bloom', '1531581478briton_nho.png', '1531581478briton.png'),
(8, 'Burnley', 'BUR', 'Burnley', '1882-07-14', 'Burnley', 'Turf Moor', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Burnley, với biệt danh The Clarets của người h&acirc;m mộ, l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp của Anh đặt trụ sở tại Burnley, Lancashire.</p>', '22546', 'Barry Kilby', '1531581954burnley_nho.png', '1531581954burnley.png'),
(9, 'Cardiff City', 'CC', 'The Bluebirds', '2018-07-14', 'The Bluebirds', 'Cardiff City', '<p>Cardiff City Football Club l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp của xứ Wales c&oacute; trụ sở tại Cardiff, xứ Wales. C&acirc;u lạc bộ th&agrave;nh lập năm 1899.</p>', '26828', 'Vincent Tan', '1531582343cardiff_nho.png', '1531582343cardiff.png'),
(10, 'Chelsea', 'CFC', 'The Blues', '1905-03-10', 'The Blues', 'Stamford Bridge', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Chelsea l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp c&oacute; trụ sở tại Fulham, Lu&acirc;n Đ&ocirc;n, hiện đang thi đấu tại Premier League của Anh. Th&agrave;nh lập năm 1905, s&acirc;n nh&agrave; của c&acirc;u lạc bộ kể từ đ&oacute; đến nay l&agrave; Stamford Bridge.</p>', '41631', 'Roman Abramovich', '1531582581chel_nho.png', '1531582581chel.png'),
(11, 'Crystal Palace', 'CP', 'Crystal Palace', '1905-09-10', 'Những chú đại bàng', 'Selhurst Park', '<p>Crystal Palace F.C. l&agrave; 1 c&acirc;u lạc bộ b&oacute;ng đ&aacute; Anh ở ph&iacute;a nam Lu&acirc;n Đ&ocirc;n, Anh. M&ugrave;a giải 2012-2013, Palace v&ocirc; địch giải Hạng nhất Anh, thăng hạng v&agrave; l&ecirc;n chơi ở Giải b&oacute;ng đ&aacute; Ngoại hạng Anh sau khi đ&aacute;nh bại Watford F.C. ở trận play-off.</p>', '26309', 'Jason Wong', '1531582897pal_nho.png', '1531582897pal.png'),
(12, 'Everton', 'EVE', 'The Toffee', '1878-07-14', 'The Toffee', 'Goodison Park', '<p>Everton F.C. / Ɛvərtən / l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; ở Liverpool, Anh, hiện đang thi đấu tại Premier League, một trong những giải đấu h&agrave;ng đầu của b&oacute;ng đ&aacute; Anh</p>', '40569', 'Bill Kenwright', '1531583134e_nho.png', '1531583134e.png'),
(13, 'Fulham', 'FUL', 'Fulham', '2018-07-14', 'The Cottagers', 'Craven Cottage', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Fulham l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp của Anh đặt tại Fulham. Th&agrave;nh lập năm 1879, Fulham hiện l&agrave; CLB b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp l&acirc;u đời nhất ở London.</p>', '26000', 'Mohamed Fayed', '1531583330f_nho.png', '1531583330f.png'),
(14, 'Huddersfield Town', 'HT', 'Huddersfield Town', '1908-08-15', 'The Terriers', 'Kirklees', '<p>Huddersfield Town Association Football Club l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp c&oacute; trụ sở tại thị trấn Huddersfield, West Yorkshire, Anh.</p>', '24500', 'Dean Hoyle', '1531583477h_nho.png', '1531583477h.png'),
(15, 'Leicester City', 'LEI', 'Leicester City', '1884-07-14', 'The Foxes', 'King Power', '<p>Leicester City Football Club, c&ograve;n được biết đến l&agrave; The Foxes, l&agrave; một đội b&oacute;ng chuy&ecirc;n nghiệp ở Anh đặt trụ sở tại s&acirc;n vận động King Power ở Leicester.</p>', '32262', 'Vichai Srivaddhanaprabha', '1531583675l_no.png', '1531583675l.png'),
(16, 'Newcastle United', 'NEW', 'Newcastle United', '2018-07-14', 'Chích chòe', 'St James Park', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Newcastle United l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp Anh đặt trụ sở tại th&agrave;nh phố Newcastle ở miền Đ&ocirc;ng Bắc nước Anh. S&acirc;n nh&agrave; của c&acirc;u lạc bộ l&agrave; St James&#39; Park với sức chứa 52.387 kh&aacute;n giả.&nbsp;</p>', '52387', 'Benitez', '1531583803n_nho.png', '1531583803n.png'),
(17, 'Southampton', 'SOU', 'Hampshire', '1895-11-21', 'SOU', 'St Mary s Stadium', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Southampton l&agrave; một đội b&oacute;ng đ&aacute; Anh, c&oacute; biệt danh The Saints, c&oacute; trụ sở tại th&agrave;nh phố Southampton, Hampshire, Anh. C&acirc;u lạc bộ đang thi đấu tại giải Ngoại hạng Anh.&nbsp;</p>', '32690', 'Nicola Cortese', '1531583936s_nho.png', '1531583936s.png'),
(18, 'Watford', 'WA', 'Hertfordshire', '1881-07-14', 'Hornets', 'Vicarage Road', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Watford l&agrave; c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp của Anh đặt trụ sở tại Hertfordshire, Anh. Đội b&oacute;ng c&ograve;n được biết đến với biệt danh the Hornets.&nbsp;</p>', '21500', 'Vicarage Road', '1531584065w_nho.png', '1531584065w.png'),
(19, 'West Ham United', 'WH', 'West Ham United', '2018-07-14', 'The Hammers', 'Olympic', '<p>West Ham United l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp Anh đặt trụ sở v&ugrave;ng ph&iacute;a đ&ocirc;ng th&agrave;nh phố London, thủ đ&ocirc; nước Anh. West Ham United đ&atilde; 3 lần đoạt c&uacute;p FA v&agrave; 1 lần đoạt c&uacute;p c&aacute;c c&acirc;u lạc bộ đoạt c&uacute;p b&oacute;ng đ&aacute; quốc gia ch&acirc;u &Acirc;u v&agrave; c&uacute;p C2 ch&acirc;u &Acirc;u.</p>', '60000', 'Jason Wong', '1531584423w_nho.png', '1531584423w.png'),
(20, 'Wolvehampton', 'WW', 'Wolvehampton Wanderers', '1877-07-14', 'Sói', 'Molineux', '<p>C&acirc;u lạc bộ b&oacute;ng đ&aacute; Wolvehampton Wanderers l&agrave; một c&acirc;u lạc bộ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp đại diện cho th&agrave;nh phố Wolverhampton, trong v&ugrave;ng West Midlands của Anh v&agrave; hiện đang chơi ở Football League Championship.</p>', '29031', 'Fosun International', '1531584350w.png', '1531584350w-lon.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caulacbo_giaidau`
--

DROP TABLE IF EXISTS `caulacbo_giaidau`;
CREATE TABLE IF NOT EXISTS `caulacbo_giaidau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauLacBo` int(11) NOT NULL,
  `idGiaiDau` int(11) NOT NULL,
  `XepHang` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauLacBo` (`idCauLacBo`),
  KEY `idGiaiDau` (`idGiaiDau`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `caulacbo_giaidau`
--

INSERT INTO `caulacbo_giaidau` (`id`, `idCauLacBo`, `idGiaiDau`, `XepHang`) VALUES
(105, 1, 4, NULL),
(106, 2, 4, NULL),
(107, 3, 4, NULL),
(108, 4, 4, NULL),
(109, 5, 4, NULL),
(110, 6, 4, NULL),
(111, 7, 4, NULL),
(112, 8, 4, NULL),
(113, 9, 4, NULL),
(114, 10, 4, NULL),
(115, 11, 4, NULL),
(116, 12, 4, NULL),
(117, 13, 4, NULL),
(118, 14, 4, NULL),
(119, 15, 4, NULL),
(120, 16, 4, NULL),
(121, 17, 4, NULL),
(122, 18, 4, NULL),
(123, 19, 4, NULL),
(124, 20, 4, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauthu`
--

DROP TABLE IF EXISTS `cauthu`;
CREATE TABLE IF NOT EXISTS `cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ChieuCao` int(3) DEFAULT NULL,
  `CanNang` int(3) DEFAULT NULL,
  `ViTriSoTruong` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoAo` int(3) NOT NULL,
  `ChanThuan` tinyint(4) DEFAULT NULL,
  `LuocSuCauThu` longtext COLLATE utf8_unicode_ci,
  `idNguoiDung` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNguoiDung` (`idNguoiDung`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cauthu`
--

INSERT INTO `cauthu` (`id`, `ChieuCao`, `CanNang`, `ViTriSoTruong`, `SoAo`, `ChanThuan`, `LuocSuCauThu`, `idNguoiDung`) VALUES
(1, 189, 75, 'thumon', 1, 1, '<p style=\"text-align:justify\"><strong>Loris Sven Karius</strong>&nbsp;(sinh ng&agrave;y 22 th&aacute;ng 6 năm 1993) l&agrave; một cầu thủ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp người Đức chơi ở vị tr&iacute;&nbsp;thủ m&ocirc;n&nbsp;cho c&acirc;u lạc bộ ở giải&nbsp;Premier League&nbsp;Liverpool. Anh từng đ&aacute; cho&nbsp;c&aacute;c cấp độ trẻ của Đức.</p>\r\n\r\n<p style=\"text-align:justify\">Sinh ra tại&nbsp;Biberach, Karius bắt đầu sự nghiệp với c&acirc;u lạc bộ&nbsp;Stuttgart&nbsp;trước khi chuyển đến chơi cho&nbsp;Manchester City&nbsp;v&agrave;o năm 2009. Sau hai năm ở đội trẻ Manchester City, anh trở về Đức chơi cho&nbsp;Mainz 05. Tại đ&acirc;y, anh đ&atilde; tạo được t&ecirc;n tuổi l&agrave; thủ m&ocirc;n h&agrave;ng đầu&nbsp;Bundesliga&nbsp;trước khi chuyển đến chơi cho Liverpool v&agrave;o năm 2016 với ph&iacute; chuyển nhượng 4.7&nbsp; triệu bảng.</p>', 2),
(2, 175, 67, 'hauve', 2, 2, '<p>Nathaniel Clyne Edwin l&agrave; một cầu thủ b&oacute;ng đ&aacute; người Anh chơi ở vị tr&iacute; hậu vệ phải cho C&acirc;u lạc bộ b&oacute;ng đ&aacute; Anh Liverpool v&agrave; đội tuyển b&oacute;ng đ&aacute; quốc gia Anh.</p>', 3),
(3, 193, 92, 'hauve', 4, 1, '<p style=\"text-align:justify\"><strong>Virgil van Dijk&nbsp;</strong>(sinh ng&agrave;y 8 th&aacute;ng 7 năm 1991) l&agrave; một trong những cầu thủ chuy&ecirc;n nghiệp người H&agrave; Lan chơi cho CLB&nbsp;Premier League&nbsp;Liverpool&nbsp;v&agrave;&nbsp;đội tuyển b&oacute;ng đ&aacute; quốc gia H&agrave; Lan.</p>\r\n\r\n<p style=\"text-align:justify\">Sau khi bắt đầu sự nghiệp của m&igrave;nh với&nbsp;Groningen, anh chuyển đến&nbsp;Celtic&nbsp;v&agrave;o năm 2013, nơi anh gi&agrave;nh chức v&ocirc; địch Scotland v&agrave; được đặt t&ecirc;n trong đội h&igrave;nh ti&ecirc;u biểu trong cả hai m&ugrave;a của anh ấy, v&agrave; cũng gi&agrave;nh chiến thắng tại&nbsp;Scottish Premiership&nbsp;ở giải đấu thứ hai. Th&aacute;ng 9 năm 2015, anh gia nhập Southampton. Anh gia nhập Liverpool v&agrave;o th&aacute;ng Gi&ecirc;ng năm 2018.</p>\r\n\r\n<p style=\"text-align:justify\">Van Dijk c&oacute; trận ra mắt cho đội tuyển H&agrave; Lan v&agrave;o năm 2015.</p>', 4),
(4, 188, 86, 'hauve', 6, 2, '<p style=\"text-align:justify\"><strong>Dejan Lovren</strong>&nbsp;(sinh ng&agrave;y&nbsp;5 th&aacute;ng 7&nbsp;năm&nbsp;1989) l&agrave; cầu thủ b&oacute;ng đ&aacute;&nbsp;người Croatia&nbsp;thi đấu ở vị tr&iacute;&nbsp;trung vệ&nbsp;cho c&acirc;u lạc bộ&nbsp;Liverpool&nbsp;v&agrave;&nbsp;Đội tuyển b&oacute;ng đ&aacute; quốc gia Croatia.</p>\r\n\r\n<p style=\"text-align:justify\">Lovren bắt đầu sự nghiệp tại&nbsp;Dinamo Zagreb&nbsp;trước khi đến&nbsp;Olympique Lyonnais&nbsp;v&agrave;o th&aacute;ng 1 năm 2010. Anh đ&atilde; c&oacute; tại đ&acirc;y một danh hiệu&nbsp;C&uacute;p b&oacute;ng đ&aacute; Ph&aacute;p&nbsp;trước khi đến&nbsp;Southampton&nbsp;v&agrave;o m&ugrave;a h&egrave; năm 2013. Một năm sau đ&oacute;, anh gia nhập&nbsp;Liverpool&nbsp;với ph&iacute; chuyển nhượng 20 triệu &pound;.</p>\r\n\r\n<p style=\"text-align:justify\">Anh c&oacute; trận đấu đầu ti&ecirc;n cho&nbsp;đội tuyển Croatia&nbsp;v&agrave;o năm 2009 v&agrave; từng tham dự hai giải đấu lớn c&ugrave;ng đội tuyển l&agrave;&nbsp;World Cup 2014&nbsp;v&agrave;&nbsp;World Cup 2018.</p>', 5),
(5, 175, 72, 'tienve', 7, 3, '<p>James Philip Milner l&agrave; một cầu thủ b&oacute;ng đ&aacute; người Anh hiện đang chơi ở vị tr&iacute; tiền vệ c&aacute;nh hoặc tiền vệ trung t&acirc;m cho c&acirc;u lạc bộ Liverpool. Anh từng chơi cho Leeds United, Swindon Town, Newcastle United, Aston Villa v&agrave; Manchester City.</p>', 7),
(6, 178, 64, 'hauve', 26, 1, '<p style=\"text-align:justify\">Với sự ổn định v&agrave; to&agrave;n diện, Robertson đang l&agrave; lựa chọn số 1 ở vị tr&iacute; hậu vệ tr&aacute;i tại Liverpool. D&ugrave; cho Moreno đ&atilde; b&igrave;nh phục chấn thương th&igrave; rất kh&oacute; để ng&ocirc;i&nbsp;sao người T&acirc;y Ban Nha đ&ograve;i lại vị tr&iacute;. Những thống k&ecirc; của Robertson ở Premier League m&ugrave;a n&agrave;y tốt hơn hẳn Moreno.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nRobertson đ&aacute;nh chặn b&igrave;nh qu&acirc;n 1,2 lần mỗi trận, th&ocirc;ng số tương tự của Moreno chỉ l&agrave; 0,8 lần/trận. Ng&ocirc;i sao 24 tuổi chỉ bị đối thủ qua người 0,7 lần/trận, &iacute;t hơn 1,2 lần/trận của Moreno. Ở lĩnh vực tấn c&ocirc;ng, Robertson tạo ra 1,0 cơ hội v&agrave; sở hữu 4 đường kiến tạo th&agrave;nh b&agrave;n, trong khi đồng đội người T&acirc;y Ban Nha chỉ tạo ra 0,8 cơ hội v&agrave; kh&ocirc;ng sở hữu pha kiến tạo n&agrave;o.</p>', 6),
(7, 182, 68, 'tienve', 14, 2, '<p style=\"text-align:justify\"><strong>Jordan Brian Henderson</strong>&nbsp;(sinh ng&agrave;y 17 Th&aacute;ng 6, 1990) l&agrave; một cầu thủ b&oacute;ng đ&aacute; người Anh đang chơi cho c&acirc;u lạc bộ ở&nbsp;Premier League&nbsp;Liverpool&nbsp;v&agrave; đội tuyển&nbsp;Anh. L&agrave; một tiền vệ anh đ&atilde; c&oacute; một đồng cho mượn tại&nbsp;Coventry City&nbsp;trong năm 2009. Anh đ&atilde; gi&agrave;nh được cap 1 quốc tế của m&igrave;nh cho đội tuyển&nbsp;Anh, trước đ&oacute; dưới 19, dưới 20 v&agrave; dưới-21 tuổi, Henderson được theo học tại trường Cao đẳng Thể thao Cộng đồng&nbsp;Farringdon&nbsp;trước khi gia nhập&nbsp;Sunderland A.F.C.&nbsp;l&agrave; một thanh ni&ecirc;n.</p>', 8),
(8, 172, 73, 'tienve', 20, 1, '<p style=\"text-align:justify\"><strong>Adam David Lallana</strong>&nbsp;(sinh ng&agrave;y 10 th&aacute;ng 5 năm 1988) l&agrave; một&nbsp;cầu thủ b&oacute;ng đ&aacute;&nbsp;chuy&ecirc;n nghiệp của&nbsp;Anh&nbsp;hiện đang chơi ở vị tr&iacute; tiền vệ tấn c&ocirc;ng cho c&acirc;u lạc bộ&nbsp;Liverpool&nbsp;v&agrave;&nbsp;đội tuyển b&oacute;ng đ&aacute; quốc gia Anh.</p>\r\n\r\n<p style=\"text-align:justify\">Anh bắt đầu sự nghiệp khi c&ograve;n trẻ với Bournemouth trước khi chuyển sang Southampton v&agrave;o năm 2000, nơi anh trở th&agrave;nh một cầu thủ b&oacute;ng đ&aacute; chuy&ecirc;n nghiệp v&agrave;o năm 2006. Sau khi một thời gian cho Bournemouth mượn, Lallana trở lại đội Southampton khi đội được l&ecirc;n hạng tham gia&nbsp;Giải b&oacute;ng đ&aacute; Ngoại hạng Anh, v&agrave; trở th&agrave;nh đội trưởng v&agrave;o năm 2012.</p>\r\n\r\n<p style=\"text-align:justify\">Lallana đ&atilde; được tham gia đội tuyển quốc gia Anh thi đấu quốc tế v&agrave;o năm 2013 v&agrave; được chọn tham gia&nbsp;giải v&ocirc; địch b&oacute;ng đ&aacute; thế giới 2014.</p>', 9),
(9, 180, 72, 'tienve', 21, 2, '<p style=\"text-align:justify\"><strong>Alexander Mark David Oxlade-Chamberlain</strong>&nbsp;(&nbsp;sinh ng&agrave;y 15 th&aacute;ng 8 năm 1993) l&agrave; một cầu thủ&nbsp;b&oacute;ng đ&aacute;&nbsp;người Anh hiện đang thi đấu ở vị tr&iacute;&nbsp;tiền vệ&nbsp;cho c&acirc;u lạc bộ&nbsp;Liverpool&nbsp;tại&nbsp;Giải ngoại hạng Anh. Anh c&oacute; thể thi đấu ở vị tr&iacute; tiền vệ c&aacute;nh hoặc tiền vệ trung t&acirc;m.</p>\r\n\r\n<p style=\"text-align:justify\">Sau m&agrave;n tr&igrave;nh diễn nổi bật với&nbsp;Southampton&nbsp;ở m&ugrave;a 2010-2011, Chamberlain gia nhập&nbsp;Arsenal&nbsp;v&agrave;o th&aacute;ng 8 năm 2011. Ghi 2 b&agrave;n trong 3 trận đầu ti&ecirc;n cho CLB mới, Oxlade-Chamberlain trở th&agrave;nh cầu thủ người Anh trẻ nhất ghi b&agrave;n trong lịch sử&nbsp;UEFA Champions League. Anh cũng chiếm một vị tr&iacute; đ&aacute; ch&iacute;nh thường xuy&ecirc;n trong&nbsp;đội U-21 Anh. Anh rời Arsenal để đầu qu&acirc;n cho k&igrave;nh địch của đội l&agrave; Liverpool v&agrave;o th&aacute;ng 8 năm 2017.</p>\r\n\r\n<p style=\"text-align:justify\">Oxlade-Chamberlain c&oacute; trận ra mắt cho đội tuyển Anh v&agrave;o ng&agrave;y 26 th&aacute;ng 5 năm 2012 gặp&nbsp;Na Uy&nbsp;trong một&nbsp;trận đấu giao hữu. Sau đ&oacute;, anh bất ngờ được triệu tập trong đội h&igrave;nh Tam sư tại&nbsp;giải v&ocirc; địch b&oacute;ng đ&aacute; ch&acirc;u &Acirc;u 2012, trở th&agrave;nh cầu thủ trẻ thứ hai từng đại diện cho tuyển Anh thi đấu tại s&acirc;n chơi cấp ch&acirc;u lục sau&nbsp;Wayne Rooney.</p>', 10),
(10, 188, 78, 'tienve', 27, 1, '<p style=\"text-align:justify\"><strong>Fabinho c&oacute; t&ecirc;n đầy đủ l&agrave;&nbsp;F&aacute;bio Henrique Tavares</strong>, sinh ng&agrave;y 23 th&aacute;ng 10 năm 1993.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Tiền vệ người Brazil bắt đầu sự nghiệp b&oacute;ng đ&aacute; tại c&acirc;u lạc bộ&nbsp;Fluminense (Brazil) nhưng anh chỉ trụ lại đ&acirc;y khoảng một th&aacute;ng trước khi chuyển sang CLB Rio Ave (Bồ Đ&agrave;o Nha) với một bản hợp đồng 6 năm. Tuy nhi&ecirc;n, điều th&uacute; vị l&agrave; anh lại kh&ocirc;ng hề kho&aacute;c &aacute;o đội b&oacute;ng mới d&ugrave; chỉ 1 lần.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Fabinho được đội b&oacute;ng chủ quản đem cho mượn tại Real Madrid v&agrave; AS Monaco trong 3 năm trước khi ch&iacute;nh thức được Rio Ave b&aacute;n đứt cho đội b&oacute;ng C&ocirc;ng quốc. Tại đ&acirc;y, từ một tiền hậu vệ c&aacute;nh phải, anh đ&atilde; vươn m&igrave;nh trở th&agrave;nh một trong những tiền vệ ph&ograve;ng ngự xuất sắc nhất thế giới.</p>\r\n\r\n<p style=\"text-align:justify\">Tiền vệ cao 1m88 n&agrave;y c&oacute; thể chơi tốt ở vị tr&iacute; hậu vệ phải cũng như tiền vệ trung t&acirc;m. Anh được đ&aacute;nh gi&aacute; l&agrave; một cầu thủ c&oacute; lối chơi th&ocirc;ng minh nhưng cũng đầy tốc độ. Fabinho c&oacute; những n&eacute;t rất giống với Sergio Busquest của Barcelona khi đều l&agrave; những người cao&nbsp;gần tương đương nhau (Busquest cao 1m89) v&agrave; đều c&oacute; thể h&igrave;nh mỏng cơm hơn so với c&aacute;c đồng nghiệp c&ugrave;ng vị tr&iacute;.&nbsp;</p>', 11),
(11, 172, 64, 'tienve', 8, 3, '<p>Th&aacute;ng 8/2017, Liverpool v&agrave; RB Leipzig đ&atilde; thống nhất mức ph&iacute; chuyển nhượng tiền vệ Naby Keita l&agrave; 48 triệu bảng. Ng&ocirc;i sao người Guinea sẽ gia nhập Liverpool theo bản hợp đồng 5 năm.</p>', 12),
(12, 175, 78, 'tiendao', 11, 2, '<p>Mohamed Salah Ghaly l&agrave; một cầu thủ b&oacute;ng đ&aacute; người Ai Cập hiện đang chơi ở vị tr&iacute; tiền đạo c&aacute;nh cho c&acirc;u lạc bộ Liverpool v&agrave; l&agrave; th&agrave;nh vi&ecirc;n của đội tuyển Ai Cập. Anh đ&atilde; từng gi&agrave;nh giải cầu thủ trẻ t&agrave;i năng nhất năm ch&acirc;u Phi của CAF v&agrave;o năm 2012.</p>', 13),
(13, 175, 69, 'tiendao', 19, 1, '<p>Sadio Man&eacute; l&agrave; cầu thủ b&oacute;ng đ&aacute; người S&eacute;n&eacute;gal thi đấu ở vị tr&iacute; tiền vệ c&aacute;nh cho c&acirc;u lạc bộ Liverpool tại Premier League v&agrave; Đội tuyển b&oacute;ng đ&aacute; quốc gia Senegal.&nbsp;</p>', 14),
(14, 193, 88, 'thumon', 22, 2, '<p style=\"text-align:justify\"><strong>Simon Luc Hildebert&nbsp; Mignolet</strong>&nbsp;(sinh ng&agrave;y 6 th&aacute;ng 3 năm 1988) l&agrave; cầu thủ b&oacute;ng đ&aacute; người&nbsp;Bỉ&nbsp;thi đấu ở vị tr&iacute;&nbsp;thủ m&ocirc;n&nbsp;cho c&acirc;u lạc bộ&nbsp;Liverpool&nbsp;v&agrave;&nbsp;Đội tuyển b&oacute;ng đ&aacute; quốc gia Bỉ.</p>\r\n\r\n<p style=\"text-align:justify\">Mignolet bắt đầu sự nghiệp tại Giải hạng nh&igrave; Bỉ trong m&agrave;u &aacute;o&nbsp;Sint-Truiden&nbsp;năm 2004, nơi anh gắn b&oacute; 6 năm v&agrave; c&oacute; 100 lần ra s&acirc;n với 1 b&agrave;n thắng. Sau đ&oacute;, anh chuyển đến&nbsp;Premier League&nbsp;kho&aacute;c &aacute;o&nbsp;Sunderland&nbsp;v&agrave;o th&aacute;ng 6 năm 2010&nbsp;với ph&iacute; chuyển nhượng 2 triệu. Sau ba năm, anh chuyển đến Liverpool v&agrave;o th&aacute;ng 6 năm 2013 với ph&iacute; chuyển nhượng 9 triệu.</p>', 15),
(15, 175, 74, 'tienve', 5, 2, '<p>Georginio Gregion Emile Wijnaldum l&agrave; một cầu thủ b&oacute;ng đ&aacute; người H&agrave; Lan hiện chơi ở vị tr&iacute; Tiền vệ tại c&acirc;u lạc bộ Liverpool v&agrave; Đội tuyển b&oacute;ng đ&aacute; quốc gia H&agrave; La</p>', 16),
(16, 188, 80, 'tiendao', 29, 2, '<p>Dominic Ayodele &quot;Dom&quot; Solanke-Mitchell l&agrave; cầu thủ b&oacute;ng đ&aacute; người Anh thi đấu ở vị tr&iacute; tiền đạo cho c&acirc;u lạc bộ Liverpool v&agrave; đội tuyển b&oacute;ng đ&aacute; quốc gia Anh.</p>', 17),
(17, 169, 72, 'tiendao', 23, 1, '<p>Xherdan Shaqiri l&agrave; tiền vệ c&aacute;nh người Thụy Sĩ gốc Albania. Anh thi đấu ở vị tr&iacute; tiền vệ c&aacute;nh phải cho c&acirc;u lạc bộ Liverpool v&agrave; đội tuyển Thụy Sĩ.</p>', 18),
(19, 175, 69, 'hauve', 66, 1, '<p style=\"text-align:justify\">Liverpool lu&ocirc;n c&oacute; một cầu thủ trẻ l&agrave;m mọi người kỳ vọng theo từng năm, đến thời điểm n&agrave;y, người đ&oacute; l&agrave; Trent Alexander-Arnold. T&agrave;i năng của Alexander-Arnold được n&oacute;i đến rất nhiều lần trước đ&acirc;y, ch&agrave;ng trai trẻ c&oacute; thể chơi ở vị tr&iacute; hậu vệ tr&aacute;i lẫn tiền vệ, l&agrave; người được đ&aacute;nh gi&aacute; rất cao tại học viện Liverpool những năm qua.</p>', 20),
(20, 195, 89, 'hauve', 32, 2, '<p>Job Jo&euml;l Andre Matip l&agrave; cầu thủ b&oacute;ng đ&aacute; người Cameroon hiện đang thi đấu cho c&acirc;u lạc bộ Liverpool tại Premier League v&agrave; Đội tuyển b&oacute;ng đ&aacute; quốc gia Cameroon.</p>', 23),
(21, 181, 76, 'tiendao', 9, 2, '<p>Roberto Firmino Barbosa de Oliveira l&agrave; cầu thủ b&oacute;ng đ&aacute; Brazil đang chơi ở vị tr&iacute; tiền vệ tấn c&ocirc;ng cho C&acirc;u lạc bộ b&oacute;ng đ&aacute; Anh Liverpool&nbsp;</p>', 24),
(22, 188, 76, 'tiendao', 15, 1, '<p>Daniel Andre &quot;Danny&quot; Sturridge l&agrave; cầu thủ b&oacute;ng đ&aacute; người Anh thi đấu cho West Bromwich Albion theo thỏa thuận cho mượn từ Liverpool v&agrave; Đội tuyển Anh. Thường ra s&acirc;n ở vị tr&iacute; tiền đạo, nhưng đ&ocirc;i khi Sturrigdge lui về đ&aacute; như một tiền vệ c&aacute;nh.&nbsp;</p>', 25),
(23, 171, 65, 'hauve', 18, 1, '<p style=\"text-align:justify\">Hậu vệ Alberto Moreno chuyển đến Liverpool v&agrave;o năm 2014, từ đ&oacute; đến nay anh đ&atilde; thi đấu rất nhiều trận đấu cho The Kop. M&ugrave;a giải vừa qua, cầu thủ người T&acirc;y Ban Nha chỉ ra s&acirc;n 18 lần tr&ecirc;n mọi mặt trận, HLV Klopp kh&ocirc;ng đ&aacute;nh gi&aacute; cao khả năng ph&ograve;ng thủ của ng&ocirc;i sao sinh năm 1992. Tuy nhi&ecirc;n, những sự thay đổi của cầu thủ 25 tuổi gi&uacute;p anh dần lấy lại niềm tin nơi &ocirc;ng thầy người Đức. Giai đoạn đầu m&ugrave;a n&agrave;y Moreno được ra s&acirc;n kh&aacute; nhiều v&agrave; anh cũng chơi kh&aacute; tốt, m&agrave;n tr&igrave;nh diễn của anh t&iacute;ch cực hơn rất nhiều so với m&ugrave;a giải trước.</p>', 26),
(24, 186, 81, 'hauve', 17, 2, '<p style=\"text-align:justify\"><strong>Klavan&nbsp;</strong>khởi nghiệp trong m&agrave;u &aacute;o đội b&oacute;ng nhỏ b&eacute; Elva v&agrave;o năm 2001. Đến năm 2003, tức l&agrave; khi mới 17 tuổi, cầu thủ sinh năm 1985 đ&atilde; c&oacute; chiến t&iacute;ch đầu ti&ecirc;n khi gi&agrave;nh c&uacute; đ&uacute;p danh hiệu ở Estonia c&ugrave;ng CLB Flora. V&agrave;o năm 2005, Klavan chuyển sang thi đấu ở giải VĐQG H&agrave; Lan trong v&ograve;ng 7 năm tiếp theo trong m&agrave;u &aacute;o hai CLB Heracles Almelo v&agrave; AZ Alkmaar. Trong giai đoạn hai m&ugrave;a giải 2008/09, Klavan bắt đầu chứng tỏ được gi&aacute; trị tại đội b&oacute;ng mới AZ Alkmaar khi c&ugrave;ng c&aacute;c đồng đội tạo n&ecirc;n chiến t&iacute;ch 28 trận bất bại để đăng quang chức v&ocirc; địch dưới sự dẫn dắt của HLV Van Gaal.</p>', 27),
(25, 191, 81, 'tienve', 16, 2, '<p>- Grujic năm nay 19 tuổi, sinh ng&agrave;y 13 th&aacute;ng 4 năm 1996. Anh đ&atilde; chơi cho đủ mọi lứa tuổi của của tuyển Serbia từ U16 đến U21<br />\r\n- Anh ra s&acirc;n lần đầu cho Red Star Belgrade khi mới chỉ 17 tuổi. Đ&acirc;y l&agrave; lần đầu ti&ecirc;n c&oacute; một cầu thủ chuyển từ đội b&oacute;ng n&agrave;y sang LFC<br />\r\n- Grujic hiện l&agrave; nh&agrave; đương kim v&ocirc; địch thế giới U20 c&ugrave;ng tuyển Serbia<br />\r\n- Với chiều cao 1m92, anh sẽ l&agrave; cầu thủ cao nhất h&agrave;ng tiền vệ Liverpool<br />\r\n- L&ograve; đạo tạo của Grujic từng sản sinh ra những cầu thủ xuất sắc như Dejan Stankovic, Nemanja Vidic hay Aleksandar Kolarov&nbsp;<br />\r\n- Ở Red Star Belgrade, Grujic mặc &aacute;o số 8</p>', 28),
(26, 178, 76, 'tiendao', 99, 3, '<p>Daniel William John &quot;Danny&quot; Ings l&agrave; cầu thủ b&oacute;ng đ&aacute; người Anh chơi ở vị tr&iacute; tiền đạo ở giải Premier League cho c&acirc;u lạc bộ Liverpool v&agrave; đội tuyển Anh. Ings bắt đầu sự nghiệp của anh ấy cho c&acirc;u lạc bộ trẻ của Southampton.</p>', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chanthuong`
--

DROP TABLE IF EXISTS `chanthuong`;
CREATE TABLE IF NOT EXISTS `chanthuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenChanThuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `PhanLoaiChanThuong` tinyint(4) DEFAULT NULL,
  `ThoiGianHoiPhuc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chanthuong`
--

INSERT INTO `chanthuong` (`id`, `TenChanThuong`, `PhanLoaiChanThuong`, `ThoiGianHoiPhuc`) VALUES
(1, 'Chấn thương gân kheo', 1, 12),
(2, 'Chấn thương gót chân', 1, 8),
(3, 'Gãy xương chân', 1, 50),
(4, 'Đau đầu', 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chienthuat`
--

DROP TABLE IF EXISTS `chienthuat`;
CREATE TABLE IF NOT EXISTS `chienthuat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenChienThuat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDungChienThuat` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chienthuat`
--

INSERT INTO `chienthuat` (`id`, `TenChienThuat`, `NoiDungChienThuat`) VALUES
(1, 'Tiki Taka', '<p style=\"text-align:justify\">Về nguy&ecirc;n tắc, c&oacute; thể diễn giải Tiqui-Taca l&agrave; lối chơi kết hợp giữa &quot;chuyền&quot; (Tiqui) v&agrave; &quot;chạy&quot; (Taca). Những đường chuyền của Tiqui-Taca đa phần ở cự ly trung b&igrave;nh - ngắn v&agrave; tần số di chuyển kh&ocirc;ng b&oacute;ng của cầu thủ ở mức cao. Cơ bản 2 yếu tố n&agrave;y đan xen với nhau, l&agrave;m cho đội chơi Tiqui-Taca lu&ocirc;n kiểm so&aacute;t được b&oacute;ng v&agrave; c&oacute; cơ hội xuy&ecirc;n ph&aacute; h&agrave;ng ph&ograve;ng ngự đối phương.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Kết quả hình ảnh cho Tiqui taqua\" src=\"http://static.bongdacuocsong.net/uploaded/trungnghia/2017_03_23/anh_phu_3_tiqui-taca_ptqi.png\" style=\"height:328px; width:590px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Như đ&atilde; n&oacute;i, Tiqui-Taca l&agrave; chuyền v&agrave; chạy. B&oacute;ng được chuyền sệt, v&agrave; chuyền li&ecirc;n tục từ cầu thủ n&agrave;y sang cầu thủ kh&aacute;c. C&aacute;c cầu thủ kh&ocirc;ng c&oacute; b&oacute;ng phải linh động di chuyển để đ&oacute;n b&oacute;ng. Nhưng v&igrave; chỉ tăng tốc v&agrave; di chuyển trong phạm vi ngắn n&ecirc;n cầu thủ mất sức kh&ocirc;ng nhiều; ngược lại, đội đối phương nếu kh&ocirc;ng th&iacute;ch nghi sẽ bị mất sức do đeo b&aacute;m v&agrave; dễ bị rối loạn đội h&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\">Nh&igrave;n chung, cũng như nhiều loại h&igrave;nh chiến thuật kh&aacute;c, chiến thuật n&agrave;y cần c&oacute; sự co gi&atilde;n nhịp nh&agrave;ng li&ecirc;n tục, khi h&agrave;ng c&ocirc;ng d&acirc;ng cao, h&agrave;ng thủ cũng phải d&acirc;ng cao v&agrave; ngược lại để đảm bảo cự ly đội h&igrave;nh hợp l&yacute;.</p>'),
(2, 'Tấn công tổng lực', '<p style=\"text-align:justify\"><img alt=\"Bóng đá tổng lực không cho đối phương khoảng trống để phát triển bóng\" src=\"http://img.v97.bdpcdn.net/Assets/Media/2016/03/25/67/cruyff250316-02.jpg\" style=\"height:228px; width:590px\" /></p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;ch l&yacute; giải đơn giản nhất cho cụm từ b&oacute;ng đ&aacute; tổng lực l&agrave; hậu vệ cũng c&oacute; thể tấn c&ocirc;ng v&agrave; tiền đạo cũng tham gia ph&ograve;ng ngự. N&oacute;i c&aacute;ch kh&aacute;c, tất cả cầu thủ c&ugrave;ng tham gia tấn c&ocirc;ng (trừ thủ m&ocirc;n) v&agrave; tất cả cầu thủ c&ugrave;ng tham gia ph&ograve;ng ngự. Mọi cầu thủ di chuyển linh hoạt, li&ecirc;n tục ho&aacute;n đổi vị tr&iacute; cho nhau.</p>\r\n\r\n<p style=\"text-align:justify\">Khi mất b&oacute;ng, những cầu thủ đứng gần b&oacute;ng nhất sẽ ập v&agrave;o v&acirc;y r&aacute;p cầu thủ đối phương thay v&igrave; lững thững đợi hậu vệ đang d&acirc;ng cao tấn c&ocirc;ng l&ugrave;i về bắt người. Khi c&oacute; b&oacute;ng, những cầu thủ tuyến sau cũng &agrave;o l&ecirc;n như một cơn cuồng phong khiến h&agrave;ng thủ đối phương hết đường chống đỡ.</p>\r\n\r\n<p style=\"text-align:justify\">N&ecirc;n nhớ thời điểm ấy chiến thuật b&oacute;ng đ&aacute; c&ograve;n kh&aacute; sơ khai, mọi đội b&oacute;ng đều bắt người theo kiểu một k&egrave;m một v&agrave; mỗi hậu vệ đều được huấn luyện vi&ecirc;n chỉ định b&aacute;m theo một cầu thủ tấn c&ocirc;ng nhất định b&ecirc;n ph&iacute;a đối phương, chứ chưa khai sinh chiến thuật ph&ograve;ng ngự khu vực.</p>'),
(3, 'Tacadada', '<p style=\"text-align:justify\">Taca-Dada c&oacute; 2 vấn đề then chốt: Kiểm so&aacute;t b&oacute;ng v&agrave; Triển khai bi&ecirc;n.&nbsp;Vậy l&agrave;m thế n&agrave;o để ph&aacute;t huy được 2 điều n&agrave;y?&nbsp;Đầu ti&ecirc;n, Taca-dada c&oacute; thể h&igrave;nh dung ngay ra một thế trận triển khai b&oacute;ng nhanh dồn b&oacute;ng ra bi&ecirc;n v&agrave; đưa v&agrave;o khu vực v&ograve;ng cấm để ăn b&agrave;n.&nbsp;Sơ đồ ph&ugrave; hợp nhất cho lối đ&aacute; n&agrave;y: 4-2-2-2, c&aacute;c sơ đồ kh&aacute;c cũng chăng chỉ l&agrave; những biến thể của n&oacute;.&nbsp;Như vậy ch&uacute;ng ta phải sở hữu bộ c&aacute;nh khỏe, đầy tốc độ, tạt dẻo; những tiền đạo cao to, sức khỏe, chọn vị tr&iacute; v&agrave; dứt điểm tốt để tận dụng những quả tạt một c&aacute;ch triệt để nhất.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Kết quả hình ảnh cho Tacadada\" src=\"http://file.vforum.vn/hinh/2015/09/zalo-screenshot-3-10-2015-1734624.png\" style=\"height:374px; width:590px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Taca-Dada l&agrave; lối chơi thi&ecirc;n về tấn c&ocirc;ng bi&ecirc;n với xu hướng d&acirc;ng cao của 2 hậu vệ c&aacute;nh. V&igrave; vậy, ch&uacute;ng ta phải lựa chọn những hậu vệ b&aacute;m bi&ecirc;n dẻo dai, tạt dẻo quẹo, l&ecirc;n c&ocirc;ng về thủ một c&aacute;ch đều đặn. Ngo&agrave;i ra tiền vệ ph&ograve;ng ngự cũng rất quan trọng, một tiền vệ ph&ograve;ng ngự tốt sẽ khỏa lấp khoảng trống c&aacute;c hậu vệ để lại, h&oacute;a giải những t&igrave;nh huống phản c&ocirc;ng nhanh của đối thủ.&nbsp;</p>'),
(4, 'Quick Passing', '<p style=\"text-align:justify\"><img alt=\"Kết quả hình ảnh cho Quick Passing\" src=\"https://pbs.twimg.com/media/Bz6hKPTCMAI2fQZ.jpg\" style=\"height:393px; width:590px\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;Quick Passing ở đ&acirc;y l&agrave; lối đ&aacute; truyền thống đ&atilde; trở th&agrave;nh thương hiệu của Arsenal dưới thời HLV Wenger, n&oacute; kh&aacute;c hẳn với lối đ&aacute; &ldquo;tiki-taka&rdquo; m&agrave; nhiều cổ động vi&ecirc;n Arsenal hay n&oacute;i c&aacute;ch th&acirc;n mật hơn l&agrave; Gooner vẫn hay hiểu nhầm. Cả 2 lối chơi &ldquo;tiki-taka&rdquo; v&agrave; &ldquo;quick passing&rdquo; đều l&agrave; ban bật b&oacute;ng nhanh nhưng Quick Passing c&oacute; xu hướng lu&ocirc;n tiến về ph&iacute;a trước, c&ograve;n tiki taka lại c&oacute; xu hướng bật nhả để l&agrave;m gi&atilde;n đội h&igrave;nh đối phương rồi sau đ&oacute; mới thức hiện c&aacute;c phương ph&aacute;p tấn c&ocirc;ng.</p>'),
(5, 'CATENACCIO', '<p style=\"text-align:justify\">Thuật ngữ &ldquo;Catenaccio&rdquo; &ndash; nghĩa l&agrave; &ldquo;c&aacute;i then cửa&rdquo; - thường được sử dụng để thay thế cho cụm từ &ldquo;defensive football&rdquo; (b&oacute;ng đ&aacute; ph&ograve;ng ngự), nhưng tr&ecirc;n thực tế, n&oacute; l&agrave; một hệ thống ph&ograve;ng ngự cụ thể đ&atilde; l&agrave;m thay đổi c&aacute;ch thức ph&ograve;ng ngự của c&aacute;c đội b&oacute;ng sau n&agrave;y, v&agrave; gi&uacute;p mở rộng kh&aacute;i niệm về một sweeper.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Kết quả hình ảnh cho Catenaccio”\" src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Catenaccio.png/220px-Catenaccio.png\" style=\"height:551px; width:400px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Trong khi huấn luyện vi&ecirc;n người &Aacute;o Karl Rappan l&agrave; người đầu ti&ecirc;n thử nghiệm một sweeper ph&iacute;a sau tuyến ph&ograve;ng ngự, th&igrave; chiến lược gia người Italia Nereo Rocco đ&atilde; phổ biến n&oacute; đến nước &Yacute; c&ugrave;ng Triestina, nơi &ocirc;ng li&ecirc;n tục thay đổi hệ thống chiến thuật của m&igrave;nh nhưng lu&ocirc;n duy tr&igrave; một sweeper trong đội h&igrave;nh.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doihinh`
--

DROP TABLE IF EXISTS `doihinh`;
CREATE TABLE IF NOT EXISTS `doihinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenDoiHinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnhDoiHinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoTranThang` int(11) DEFAULT NULL,
  `SoTranThua` int(11) DEFAULT NULL,
  `SoTranHoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doihinh`
--

INSERT INTO `doihinh` (`id`, `TenDoiHinh`, `HinhAnhDoiHinh`, `SoTranThang`, `SoTranThua`, `SoTranHoa`) VALUES
(1, '4-4-2 Cổ Điển', '4-4-2 Cổ Điển.png', 11, 0, 2),
(2, '4-3-3', '4-3-3.png', 8, 0, 1),
(7, '5-3-2', '15299132905-3-2.png', 1, 2, 1),
(8, '5-4-1', '15310561955-4-1.png', 5, 1, 0),
(9, '4-2-3-1', '15310563174-2-3-1.png', 1, 5, 0),
(10, '3-5-2', '15310564973-5-2.png', 2, 2, 0),
(11, '3-1-4-2', '15310565503-1-4-2.png', 1, 1, 5),
(12, '3-4-3', '15310565963-4-3.png', 5, 4, 1),
(13, '4-1-2-1-2', '15310567214-1-2-1-2.png', 5, 5, 2),
(14, '4-1-4-1', '15310567944-1-4-1.png', 12, 1, 6),
(15, '4-2-4', '15310568334-2-4.png', 9, 4, 2),
(16, '4-3-3 Tiền đạo ảo', '15310569014-3-3.png', 2, 1, 1),
(17, '4-4-2 Kim Cương', '15310570224-4-2 Kim Cương.png', 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaidau`
--

DROP TABLE IF EXISTS `giaidau`;
CREATE TABLE IF NOT EXISTS `giaidau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenGiaiDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NamBatDauMuaGiai` date DEFAULT NULL,
  `NamKetThucMuaGiai` date DEFAULT NULL,
  `MuaGiaiHienTai` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaidau`
--

INSERT INTO `giaidau` (`id`, `TenGiaiDau`, `NamBatDauMuaGiai`, `NamKetThucMuaGiai`, `MuaGiaiHienTai`) VALUES
(1, 'Premier league', '2017-09-05', '2018-05-10', 0),
(4, 'Premier league', '2018-06-14', '2019-02-27', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaotrinhtap`
--

DROP TABLE IF EXISTS `giaotrinhtap`;
CREATE TABLE IF NOT EXISTS `giaotrinhtap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenBaiTap` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDungBaiTap` text COLLATE utf8_unicode_ci,
  `ThoiLuongTapToiDa` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaotrinhtap`
--

INSERT INTO `giaotrinhtap` (`id`, `TenBaiTap`, `NoiDungBaiTap`, `ThoiLuongTapToiDa`) VALUES
(2, 'Tập thể lực ( Nhảy cóc)', '<p>&ndash; Ng&agrave;y 1 &ndash; 2, nhảy 10 c&aacute;i mỗi ng&agrave;y.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 3 &ndash; 4, nhảy 20 c&aacute;i mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần nhảy 10 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 5 &ndash; 6, nhảy 30 c&aacute;i mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần nhảy 15 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Cứ thế tiếp tục đến hết một th&aacute;ng (Nhiều hơn sau đ&oacute; c&agrave;ng tốt).</p>\r\n\r\n<p>* Lưu &yacute;: Chỉ bật nhảy bằng ch&acirc;n tr&ecirc;n nền s&acirc;n b&igrave;nh thường, kh&ocirc;ng được bật cầu thang.</p>', 30),
(3, 'Tập thể lực ( Nhảy dây)', '<p>&ndash; Ng&agrave;y thứ 1 &ndash; 2, nhảy d&acirc;y 100 c&aacute;i mỗi ng&agrave;y.</p>\r\n\r\n<p>&ndash; Ng&agrave;y thứ 3 &ndash; 4, nhảy d&acirc;y 200 c&aacute;i mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần 100 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Ng&agrave;y thứ 5 &ndash; 6, nhảy d&acirc;y 300 c&aacute;i mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần 150 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Cứ thế tiếp tục đến hết một th&aacute;ng (Nhiều hơn sau đ&oacute; c&agrave;ng tốt).</p>', 30),
(4, 'Tập thể lực ( Hít đất)', '<p>&ndash; Ng&agrave;y thứ 1 &ndash; 2, h&iacute;t đất 10 c&aacute;i mỗi ng&agrave;y. H&iacute;t xong c&ograve;n khỏe vẫn kh&ocirc;ng được h&iacute;t nữa.</p>\r\n\r\n<p>&ndash; Ng&agrave;y thứ 3 &ndash; 4, l&ecirc;n 20 c&aacute;i mỗi ng&agrave;y. Nếu chưa h&iacute;t li&ecirc;n tục được 20 c&aacute;i th&igrave; c&oacute; thể chia ra mỗi lần 10 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Ng&agrave;y thứ 5 &ndash; 6, l&ecirc;n 30 c&aacute;i mỗi ng&agrave;y. Nếu chưa h&iacute;t li&ecirc;n tục được 30 c&aacute;i th&igrave; c&oacute; thể chia ra mỗi lần 15 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Cứ thế tiếp tục đến hết một th&aacute;ng (Nhiều hơn sau đ&oacute; c&agrave;ng tốt).</p>', 30),
(8, 'Tập thể lực ( Chạy bộ)', '<p>&ndash; Ng&agrave;y 1 &ndash; 2, chạy 1 km mỗi ng&agrave;y.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 3 &ndash; 4, chạy 2 km mỗi ng&agrave;y. C&oacute; thể chạy 1 km rồi đi bộ hồi sức, hoặc nghỉ 5 ph&uacute;t rồi chạy tiếp.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 5 &ndash; 6, chạy 3 km mỗi ng&agrave;y. C&oacute; thể chạy 1.5 km rồi đi bộ hồi sức, hoặc nghỉ 5 ph&uacute;t rồi chạy tiếp.</p>\r\n\r\n<p>&ndash; Cứ thế tiếp tục đến hết một th&aacute;ng (Nhiều hơn sau đ&oacute; c&agrave;ng tốt).</p>', 30),
(10, 'Tập thể lực ( Gập bụng)', '<p>&ndash; Ng&agrave;y 1 &ndash; 2, gập 10 c&aacute;i mỗi ng&agrave;y.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 3 &ndash; 4, gập 20 c&aacute;i mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần gập 10 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 5 &ndash; 6, gập 30 c&aacute;i mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần gập 15 c&aacute;i, giữa 2 lần c&aacute;ch nhau 1 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Cứ thế tiếp tục đến hết một th&aacute;ng (Nhiều hơn sau đ&oacute; c&agrave;ng tốt).</p>\r\n\r\n<p>* Lưu &yacute;: Đừng thấy gập những c&aacute;i đầu dễ d&agrave;ng m&agrave; gập vượt khung, đ&atilde; c&oacute; trường hợp đau bụng, tổn thương cơ.</p>', 30),
(11, 'Tập thể lực ( Bức tốc)', '<p>&ndash; Ng&agrave;y 1 &ndash; 2, bứt tốc 10 lượt mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần 5 lượt, giữa 2 lần c&aacute;ch nhau 3-5 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 3 &ndash; 4, bứt tốc 20 lượt mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần 10 lượt, giữa 2 lần c&aacute;ch nhau 3-5 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Ng&agrave;y 5 &ndash; 6, bứt tốc 30 lượt mỗi ng&agrave;y. C&oacute; thể chia ra mỗi lần 15 lượt, giữa 2 lần c&aacute;ch nhau 3-5 ph&uacute;t.</p>\r\n\r\n<p>&ndash; Cứ thế tiếp tục đến hết một th&aacute;ng (Nhiều hơn sau đ&oacute; c&agrave;ng tốt).</p>', 30),
(12, 'Tập khởi động', '<p>&ndash; Kỹ thuật căng cơ ( K&eacute;o gi&atilde;n cơ thể để tăng tầm vận động c&aacute;c khớp).<br />\r\n&ndash; Kỹ thuật khởi động kh&ocirc;ng b&oacute;ng ( Chạy bộ chậm, thả lỏng to&agrave;n th&acirc;n để tăng tuần ho&agrave;n m&aacute;u v&agrave; oxy đến cơ bắp).<br />\r\n&ndash; Kỹ thuật khởi động c&oacute; b&oacute;ng</p>', 15),
(13, 'Tập kỹ thuật ( Tâng bóng)', '<p>Khi t&acirc;ng b&oacute;ng thực hiện xen kẽ giữa t&acirc;ng b&oacute;ng cao v&agrave; thấp hoặc li&ecirc;n tục t&acirc;ng b&oacute;ng thấp kh&ocirc;ng vượt qu&aacute; đầu gối.</p>\r\n\r\n<p>T&acirc;ng b&oacute;ng li&ecirc;n tục bằng nhiều bộ phận của cơ thể như ch&iacute;nh diện mu b&agrave;n ch&acirc;n, m&aacute; trong, m&aacute; ngo&agrave;i b&agrave;n ch&acirc;n, đầu, đ&ugrave;i&hellip;</p>\r\n\r\n<p>T&acirc;ng b&oacute;ng phối hợp với c&aacute;c bước di chuyển hoặc chạy dọc theo những đường thẳng v&agrave; đường gấp kh&uacute;c.</p>\r\n\r\n<ol>\r\n	<li>T&acirc;ng b&oacute;ng bằng mu b&agrave;n ch&acirc;n:</li>\r\n</ol>\r\n\r\n<p>Bước 1: Hai ch&acirc;n thả lỏng</p>\r\n\r\n<p>Bước 2: 2 mu b&agrave;n ch&acirc;n chạm b&oacute;ng lần lượt, mu của ch&acirc;n đ&aacute; b&oacute;ng t&aacute;c dụng 1 lực vừa phải</p>\r\n\r\n<p>Ch&uacute; &yacute;: với b&agrave;i tập n&agrave;y, người chơi ch&uacute; &yacute; lưng v&agrave; h&ocirc;ng giữ thẳng, chỉ di chuyển 2 ch&acirc;n l&ecirc;n xuống để đ&aacute; b&oacute;ng, trọng t&acirc;m cơ thể đặt ở h&ocirc;ng.</p>\r\n\r\n<ol start=\"2\">\r\n	<li>T&acirc;ng b&oacute;ng bằng đ&ugrave;i:</li>\r\n</ol>\r\n\r\n<p>Bước 1: Người đứng thẳng v&agrave; thả lỏng</p>\r\n\r\n<p>Bước 2: đ&ugrave;i nhấc cao, vu&ocirc;ng g&oacute;c 90 độ với phần th&acirc;n tr&ecirc;n (giống như b&agrave;i tập n&acirc;ng cao đ&ugrave;i). Chạm b&oacute;ng lần lượt đ&ugrave;i tr&aacute;i v&agrave; phải để t&acirc;ng b&oacute;ng</p>\r\n\r\n<p>Ch&uacute; &yacute;: b&agrave;i tập n&agrave;y cũng c&oacute; những ch&uacute; &yacute; tương tự như b&agrave;i tập t&acirc;ng bắng bằng mu b&agrave;n ch&acirc;n, lung v&agrave; h&ocirc;ng giữ thẳng, n&acirc;ng đ&ugrave;i cao l&ecirc;n vừa tầm v&agrave; t&aacute;c dụng lực vừa đủ để kiểm so&aacute;t b&oacute;ng, trọng t&acirc;m đặt ở h&ocirc;ng. Nhưng b&agrave;i tập n&agrave;y lại hao sức lực v&agrave; dễ mất thăng bằng hơn b&agrave;i tập trước n&ecirc;n cần người chơi cố gắng ki&ecirc;n tr&igrave;.</p>', 30),
(14, 'Tập kỹ thuật ( Di chuyển)', '<h2><span style=\"font-size:16px\">1. Kỹ thuật chạy trong b&oacute;ng đ&aacute;</span></h2>\r\n\r\n<p><span style=\"font-size:16px\">Kỹ thuật chạy gồm: Chạy thường, gi&acirc;̣t lùi, chạy theo ziczac,&hellip;.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Khi chạy trọng t&acirc;m c&aacute;c cầu thủ b&oacute;ng đ&aacute; thường thấp, bước chạy ngằn, tay đ&aacute;nh rộng sang ngang nhiều hơn so với VĐV điền kinh.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Đ&ocirc;̣ng tác chạy gi&acirc;̣t lùi, chạy lùi kh&ocirc;ng c&acirc;̀n nh&acirc;́t thi&ecirc;́t phải t&ocirc;́c đ&ocirc;̣ nhanh hỏi phải c&oacute; sự phối hợp thoải m&aacute;i kh&ocirc;ng g&ograve; b&oacute;.</span></p>\r\n\r\n<h3><span style=\"font-size:16px\">2. Kỹ thuật dừng đột ngột</span></h3>\r\n\r\n<p><span style=\"font-size:16px\">Đ&ograve;i hỏi cầu thủ phải dùng lực bàn ch&acirc;n đ&ecirc;̉ bám sát mặt đ&acirc;́t hạ th&acirc;́p trọng t&acirc;m cơ th&ecirc;̉ đ&ecirc;̉ quay ngược với hướng đang di chuyển một độ nghi&ecirc;ng nhất định.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">B&agrave;n ch&acirc;n dung lực đạp đất, cơ thể hạ thấp để giảm qu&aacute;n t&iacute;nh v&agrave; lực x&ocirc;ng về ph&iacute;a trước.</span></p>\r\n\r\n<h3><span style=\"font-size:16px\">3.&nbsp;Kỹ thu&acirc;̣t thay đ&ocirc;̉i th&acirc;n hình</span></h3>\r\n\r\n<p><span style=\"font-size:16px\">Trong thi đấu b&oacute;ng đ&aacute; lu&ocirc;n c&oacute; sự thay đổi giữa tấn c&ocirc;ng v&agrave; ph&ograve;ng thủ, giữa vị tr&iacute; của c&aacute;c cầu thủ do v&acirc;̣y đòi hỏi các bé c&acirc;̀n phải chuyển th&acirc;n nhanh, bất ngờ ở mỗi tỉnh huống cụ thể đ&ograve;i hỏi.</span></p>\r\n\r\n<h3><span style=\"font-size:16px\">4. Kỹ thuật bật nhảy trong b&oacute;ng đ&aacute;</span></h3>\r\n\r\n<p><span style=\"font-size:16px\">B&acirc;̣t &nbsp;nhảy đ&ecirc;̉ thực hi&ecirc;̣n các đ&ocirc;̣ng tác tranh bóng tr&ecirc;n kh&ocirc;ng. Sức b&acirc;̣t, khả năng chọn đà và lực dậm nhảy, năng lực ph&aacute;n đo&aacute;n điểm rơi, thời gian dậm nhảy&hellip;quyết định kết quả của động t&aacute;c tranh b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Kỹ năng b&acirc;̣t nhảy chia làm 2 loại là d&acirc;̣m nhảy 1 ch&acirc;n và d&acirc;̣m nhảy 2 ch&acirc;n.</span></p>\r\n\r\n<h3><span style=\"font-size:16px\">5. Kỹ thuật đi bộ trong b&oacute;ng đ&aacute;</span></h3>\r\n\r\n<p><span style=\"font-size:16px\">Trong thi đấu b&oacute;ng đ&aacute; đi bộ chủ yếu được sử dụng để tranh thủ nghỉ, h&ocirc;̀i phục sức lực.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Khi đi b&ocirc;̣, các em có th&ecirc;̉ quan sát, từ đó chọn vị&nbsp;tr&iacute; ph&ugrave; hợp v&agrave; lập tức tham gia v&agrave;o c&aacute;c t&igrave;nh huống.</span></p>', 120),
(15, 'Tập kỹ thuật ( Đá bóng bằng lòng bàn chân)', '<p><span style=\"font-size:14px\"><strong>Đ&aacute; b&oacute;ng nằm tại chỗ ( chia l&agrave;m 5 bước):</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Chạy đ&agrave; thẳng với hướng b&oacute;ng.</span></li>\r\n	<li><span style=\"font-size:14px\">Đặt ch&acirc;n trụ</span></li>\r\n	<li><span style=\"font-size:14px\">Vung ch&acirc;n lăng</span></li>\r\n	<li><span style=\"font-size:14px\">Tiếp x&uacute;c b&oacute;ng.</span></li>\r\n	<li><span style=\"font-size:14px\">Kết th&uacute;c.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Đ&aacute; b&oacute;ng lăn sệt</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Đ&aacute; b&oacute;ng lăn từ ph&iacute;a trước tới: trước hết cần ph&aacute;n đo&aacute;n thời điểm vung ch&acirc;n v&agrave; vị tr&iacute; b&oacute;ng lăn tới để tiếp x&uacute;c b&oacute;ng được ch&iacute;nh x&aacute;c.</span></li>\r\n	<li><span style=\"font-size:14px\">Đ&aacute; b&oacute;ng đang lăn về trước: ch&acirc;n trụ n&ecirc;n đặt trước về ph&iacute;a trước quả b&oacute;ng.</span></li>\r\n	<li><span style=\"font-size:14px\">Trường hợp b&oacute;ng lăn từ c&aacute;c b&ecirc;n tới về ph&iacute;a ch&acirc;n trụ th&igrave; n&ecirc;n đặt ch&acirc;n trụ hơi xa về ph&iacute;a b&ecirc;n của b&oacute;ng.</span><img alt=\"Hướng dẫn kỹ thuật đá bóng bằng lòng bàn chân - 1\" src=\"https://sites.google.com/site/caulacbohvbp/_/rsrc/1346755618529/home/huan-luyen-dhao-tao/huan-luyen-thu-mon/bai-3-ky-thuat-da-bong-bang-long-ban-chan/2.png\" /></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Đ&aacute; b&oacute;ng nửa nảy</strong></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Phải đ&aacute; b&oacute;ng ngay những quả b&oacute;ng từ tr&ecirc;n cao rơi xuống vừa nảy từ đất l&ecirc;n m&agrave; kh&ocirc;ng l&agrave;m độ ngt&aacute;c giữ b&oacute;ng.</span></li>\r\n	<li><span style=\"font-size:14px\">Trước hết phải ph&aacute;n đo&aacute;n tốc độ bay v&agrave; điểm rơi của b&oacute;ng, từ đ&oacute; nhanh ch&oacute;ng di chuyển chọn vịtr&iacute; cho việc đặt ch&acirc;n trụ</span></li>\r\n</ul>\r\n\r\n<h3><span style=\"font-size:14px\"><strong>Tập luyện s&uacute;t b&oacute;ng</strong></span></h3>\r\n\r\n<p><span style=\"font-size:14px\">Khi bạn muốn tập kỹ thuật s&uacute;t b&oacute;ng n&agrave;y th&igrave; bạn c&oacute; thể m&ocirc; phỏng kh&ocirc;ng b&oacute;ng, tại chỗ thực hiện động t&aacute;c đ&aacute;nh lăng, xoay bẻ b&agrave;n ch&acirc;n ra ngo&agrave;i.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Vẽ đường chạy đ&agrave; v&agrave; điểm đặt b&oacute;ng, ch&acirc;n trụ rồi thực hiện kỹ thuật chạy đ&agrave;, đặt ch&acirc;n trụ, vung ch&acirc;n lăng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Đặt b&oacute;ng chết: D&ugrave;ng gầm b&agrave;n ch&acirc;n đ&egrave; l&ecirc;n ph&iacute;a trước của b&oacute;ng, người kia tập chạy đ&agrave; r&ugrave;i đặt ch&acirc;n trụ rồi tiếp x&uacute;c b&oacute;ng.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Hướng dẫn kỹ thuật đá bóng bằng lòng bàn chân - 2\" src=\"https://sites.google.com/site/caulacbohvbp/_/rsrc/1346755918161/home/huan-luyen-dhao-tao/huan-luyen-thu-mon/bai-3-ky-thuat-da-bong-bang-long-ban-chan/3.png\" /></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Đặt b&oacute;ng chết: Đ&aacute; v&agrave;o c&aacute;c điểm cố định tr&ecirc;n tường v&agrave; tập từ chậm đến nhanh, từ nhẹ, gần sautăng dần cự ly v&agrave; lực đ&aacute;.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Tập hai người hoặc với nhiều người sẽ kết hợp di chuyển v&agrave; đ&aacute; c&aacute;c loại b&oacute;ng đang lăn sệt.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Tập s&uacute;t cầu m&ocirc;n với b&oacute;ng chết v&agrave; c&aacute;c loại b&oacute;ng đang lăn sệt.</span></p>', 30),
(16, 'Tập kỹ thuật ( Đá bóng bằng mu bàn chân)', '<h3><span style=\"font-size:14px\"><strong>Đ</strong><strong>&aacute; b&oacute;ng nằm tại chỗ</strong></span></h3>\r\n\r\n<p><span style=\"font-size:14px\">Do đặc điểm khi tiếp x&uacute;c giữa b&agrave;n ch&acirc;n (bằng mu trong) v&agrave; b&oacute;ng n&ecirc;n c&aacute;ch chạy đ&agrave; của kiểu đ&aacute; n&agrave;y phải chếch với hướng đ&aacute; b&oacute;ng đi khoảng 450.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi chạy tốc độ phải tăng dần, độ d&agrave;i bước chạy ngắn, tần số cao để dễ điều chỉnh ở bước cuối c&ugrave;ng trước khi đặt ch&acirc;n trụ.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Động t&aacute;c lăng ch&acirc;n về trước bắt đầu bằng việc lấy khớp h&ocirc;ng l&agrave;m trụ, d&ugrave;ng đ&ugrave;i vung cẳng ch&acirc;n từ sau ra trước.</span></p>\r\n\r\n<h3><span style=\"font-size:14px\"><strong>Đ&aacute; b&oacute;ng nằm tại chỗ</strong></span></h3>\r\n\r\n<p><span style=\"font-size:14px\"><strong><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/mu-ban-chan-1_1.png\" /></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\">Tiếp x&uacute;c với b&oacute;ng l&agrave; cạnh trong b&agrave;n ch&acirc;n, t&iacute;nh từ ng&oacute;n ch&acirc;n c&aacute;i tới ph&iacute;a trong mắt c&aacute; ch&acirc;n<br />\r\nSau khi b&oacute;ng rời ch&acirc;n th&igrave; tiếp tục lăng ch&acirc;n về ph&iacute;a trước, theo qu&aacute;n t&iacute;nh bước về trước 1 v&agrave;i bước để giảm tốc độ của cơ thể v&agrave; 2 tay dang rộng tự nhi&ecirc;n để giữ thăng bằng v&agrave; trở lại hoạt động b&igrave;nh thường.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Đ&aacute; b&oacute;ng lăn sệt</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Căn cứ v&agrave;o hướng b&oacute;ng lăn, ph&aacute;n đo&aacute;n tốc độ rồi nhanh ch&oacute;ng chọn vị tr&iacute; th&iacute;ch hợp, đảm bảo đ&uacute;ng điểm đặt ch&acirc;n trụ, v&agrave; thời điểm tiếp x&uacute;c b&oacute;ng để đ&aacute; b&oacute;ng đi theo đ&uacute;ng hướng dự định.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi đ&aacute; c&aacute;c loại b&oacute;ng đang lăn sệt th&igrave; mũi b&agrave;n ch&acirc;n trụ lu&ocirc;n phải thẳng hướng với hướng đ&aacute; b&oacute;ng đi, đầu gối hơi khụyu thấp, th&acirc;n người nghi&ecirc;ng về trước một b&ecirc;n với b&oacute;ng.</span></p>', 30),
(17, 'Tập kỹ thuật ( Đỡ bóng)', '<p><span style=\"font-size:14px\"><strong>Khống chế b&oacute;ng sệt</strong>&nbsp;t&ugrave;y theo thối quen v&agrave; bối cảnh lực thi đấu&nbsp;cầu thủ thường d&ugrave;ng l&ograve;ng b&agrave;n ch&acirc;n, m&aacute; ngo&agrave;i hoặc gầm gi&agrave;y (sử dụng nhiều trong Futsal) để thực hiện khống chế b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Kỹ thuật khống chế b&oacute;ng</strong>&nbsp;bằng l&ograve;ng trong v&agrave; l&ograve;ng ngo&agrave;i ch&acirc;n kh&aacute; tương tự nhau d&ugrave;ng ch&acirc;n tiếp x&uacute;c b&oacute;ng ch&acirc;n hơi thả lỏng khi b&oacute;ng tới k&eacute;o nhẹ ch&acirc;n về tạo lực h&atilde;m gi&uacute;p b&oacute;ng nảy ra theo &yacute; muốn. C&ograve;n động t&aacute;c kh&ocirc;ng chế b&oacute;ng bằng gầm c&oacute; sự kh&aacute;c biệt l&agrave; lợi dụng lục ma s&aacute;t giữa gầm gi&agrave;y v&agrave; mặt s&acirc;n để h&atilde;m lực b&oacute;ng theo &yacute; muốn.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Khống chế b&oacute;ng bổng</strong>&nbsp;thường được sử dụng khi bắt c&aacute;c đường chuyền d&agrave;i vượt tuyến từ đồng đội hoặc khi b&oacute;ng rơi tự do. T&ugrave;y theo tầm b&oacute;ng m&agrave;&nbsp;cầu thủ c&oacute; thể sử dụng mu b&agrave;n ch&acirc;n, m&aacute; trong, m&aacute; ngo&agrave;i, đ&ugrave;i hoặc ngực để khống chế b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Sử dụng m&aacute; trong, m&aacute; ngo&agrave;i v&agrave; mu b&agrave;n ch&acirc;n: trước ti&ecirc;n bạn cần x&aacute;c định điểm rơi của b&oacute;ng khi b&oacute;ng tới d&ugrave;ng ch&acirc;n chặn b&oacute;ng hơi r&uacute;t ch&acirc;n để tạo lực h&atilde;m. Đối với d&ugrave;i v&agrave; ngực cũng tưng tự chỉ kh&aacute;c phần tiếp x&uacute;c với b&oacute;ng th&ocirc;i.</span></p>', 60),
(18, 'Tập kỹ thuật ( Dẫn bóng)', '<p><span style=\"font-size:14px\">&ndash; Dẫn b&oacute;ng bằng l&ograve;ng b&agrave;n ch&acirc;n<br />\r\n&ndash; Dẫn b&oacute;ng bằng mu giữa b&agrave;n ch&acirc;n<br />\r\n&ndash; Dẫn b&oacute;ng bằng mu ngo&agrave;i b&agrave;n ch&acirc;n</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Cầu thủ thực hiện, HLV bấm giờ. B&agrave;i tập được thực hiện như sau:</strong></p>\r\n\r\n<p>&ndash; Cầu thủ dẫn b&oacute;ng tốc độ 20 m&eacute;t từ chấm giữa s&acirc;n đến vị tr&iacute; cọc.</p>\r\n\r\n<p>&ndash; Sau đ&oacute; dẫn b&oacute;ng d&iacute;c dắc qua 5 cọc.</p>\r\n\r\n<p>&ndash; Kết th&uacute;c 5 cọc th&igrave; thực hiện s&uacute;t b&oacute;ng v&agrave;o cầu m&ocirc;n.</p>\r\n\r\n<p><strong>Ch&uacute; &yacute;:</strong></p>\r\n\r\n<p>&ndash; Thời gian thực hiện b&agrave;i tập khoảng 11 &ndash; 12 gi&acirc;y l&agrave; đạt.</p>\r\n\r\n<p>&ndash; Thời gian b&agrave;i tập được t&iacute;nh từ l&uacute;c cầu thủ chạm b&oacute;ng ở giữa s&acirc;n cho tới khi s&uacute;t b&oacute;ng. HLV dừng thời gian tại thời điểm cầu thủ s&uacute;t b&oacute;ng rời ch&acirc;n.</p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng lăn sệt bằng l&ograve;ng b&agrave;n ch&acirc;n</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Mũi ch&acirc;n trụ đối diện với hướng b&oacute;ng đến, đầu gối hơi khuỵu, một b&ecirc;n vai hướng về ph&iacute;a b&oacute;ng đến; Ch&acirc;n giữ b&oacute;ng, mở mũi ch&acirc;n ra ngo&agrave;i, gan b&agrave;n ch&acirc;n nằm song song với mặt đất, l&ograve;ng b&agrave;n ch&acirc;n hướng về ph&iacute;a trước.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng nửa nảy bằng l&ograve;ng b&agrave;n ch&acirc;n</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/giu-bong-2.png\" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\">Gối ch&acirc;n trụ hơi thấp, th&acirc;n người sau khi giữ b&oacute;ng hướng vận động hơi lệch so với b&oacute;ng. Ch&acirc;n giữ b&oacute;ng đưa l&ecirc;n, cẳng ch&acirc;n thả lỏng, mũi ch&acirc;n bẻ cong l&ecirc;n, l&ograve;ng b&agrave;n ch&acirc;n tiếp x&uacute;c b&oacute;ng, b&oacute;ng vận h&agrave;nh theo hướng với mặt đất th&agrave;nh một g&oacute;c nhỏ hơn 90o.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng tr&ecirc;n kh&ocirc;ng bằng l&ograve;ng b&agrave;n ch&acirc;n</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/giu-bong-3.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ch&acirc;n đưa l&ecirc;n, hướng l&ograve;ng b&agrave;n ch&acirc;n về hướng b&oacute;ng bay đến để đ&oacute;n b&oacute;ng, khi b&oacute;ng chạm v&agrave;o ch&acirc;n lập tức k&eacute;o ch&acirc;n ra sau l&agrave;m giảm lực, giữ b&oacute;ng ở dưới ch&acirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng nửa nảy bằng gan b&agrave;n ch&acirc;n</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/giu-bong-4.png\" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\">Ch&acirc;n trụ đặt một b&ecirc;n ph&iacute;a sau so với điểm b&oacute;ng rơi, mũi ch&acirc;n đối diện với hướng b&oacute;ng đến.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng lăn sệt bằng gan b&agrave;n ch&acirc;n</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/giu-bong-5.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Th&acirc;n người đứng đối diện với hướng b&oacute;ng đến, th&acirc;n hơi ng&atilde; về ph&iacute;a trước, ch&acirc;n trụ đặt một b&ecirc;n b&oacute;ng, mũi ch&acirc;n đối diện với hướng b&oacute;ng đến, đầu gối hơi khuỵu xuống, đồng thời ch&acirc;n giữ b&oacute;ng đưa l&ecirc;n, khớp gối co lại,b&agrave;n ch&acirc;n co l&ecirc;n l&agrave;m cho gan b&agrave;n ch&acirc;n hợp với mặt đất th&agrave;nh một g&oacute;c nhỏ hơn 90o</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng lăn sệt</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">B&oacute;ng lăn qua dưới ch&acirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi giữ b&oacute;ng, tiếp x&uacute;c b&oacute;ng ở vị tr&iacute; hơi cao so với mặt đất.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Sau khi giữ b&oacute;ng, b&oacute;ng chưa nằm ở vị tr&iacute; tốt nhất.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Sau khi giữ b&oacute;ng th&acirc;n người chưa kịp rướn tạo n&ecirc;n khoảng c&aacute;ch về thời gian giữa giữ b&oacute;ng v&agrave; rướn l&ecirc;n hơi d&agrave;i n&ecirc;n kh&ocirc;ng thể kịp thời khống chế được b&oacute;ng v&agrave; tạo ra sai s&oacute;t.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong><em>Giữ b&oacute;ng nửa nảy</em></strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">B&oacute;ng lọt qua ch&acirc;n chủ yếu l&agrave; do sự ph&aacute;n đo&aacute;n thiếu ch&iacute;nh x&aacute;c đường phản xạ từ mặt đất l&ecirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Lực tiếp x&uacute;c b&oacute;ng, do điểm tiếp x&uacute;c b&oacute;ng l&agrave;m ảnh hưởng đến việc thực hiện động t&aacute;c tiếp theo</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Th&ocirc;ng thường người ta sẽ nghĩ giữ b&oacute;ng lăn sệt, th&igrave; ngược lại giữ b&oacute;ng nảy cao</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi giữ b&oacute;ng nủa nảy, hay giữ b&oacute;ng lăn sệt cũng xuất hiện hiện tượng n&agrave;y</span></p>', 120),
(19, 'Tập kỹ thuật ( Đánh đầu)', '<p><span style=\"font-size:14px\"><strong>a. Di động t&igrave;m vị tr&iacute;</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Phải ph&aacute;n đo&aacute;n ch&iacute;nh x&aacute;c tốc độ bay v&agrave; hướng bay của quả b&oacute;ng, sau đ&oacute; chọn điểm tiếp x&uacute;c b&oacute;ng, sau đ&oacute; di động chiếm vị tr&iacute; v&agrave; nhảy l&ecirc;n đ&aacute;nh đầu</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>b. Động t&aacute;c của th&acirc;n</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Kỹ thuật đ&aacute;nh đầu ph&acirc;n ra c&aacute;c kiểu sau</span></p>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Đứng tại chổ đ&aacute;nh đầu ch&iacute;nh diện</span></p>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Đứng tại chổ đ&aacute;nh đầu bằng tr&aacute;n b&ecirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chạy đ&agrave; đ&aacute;nh đầu bằng tr&aacute;n giữa</span></p>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chạy đ&agrave; đ&aacute;nh đầu bằngtr&aacute;n b&ecirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Nhảy l&ecirc;n đ&aacute;nh đầu bằng tr&aacute;n giữa hoặc tr&aacute;n b&ecirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Đ&aacute;nh đầu kiểu c&aacute; nhảy</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>c. Tiếp x&uacute;c giữa đầu v&agrave; b&oacute;ng</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Nhiệm vụ chủ yếu của giai đoạn n&agrave;y l&agrave; t&iacute;nh ch&iacute;nh x&aacute;c của đ&aacute;nh đầu.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>N&oacute; bao gồm:</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Một l&agrave; sử dụng bộ phận n&agrave;o đ&oacute; của đầu để tiếp x&uacute;c b&oacute;ng</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Hai l&agrave;, d&ugrave;ng bộ phận n&agrave;o đ&oacute; của đầu để tiếp x&uacute;c với bộ phận nhất định n&agrave;o của b&oacute;ng</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Thời gian đầu ti&ecirc;n tiếp x&uacute;c b&oacute;ng phải tu&acirc;n thủ nguy&ecirc;n tắc sau: khi đầu tiếp x&uacute;c b&oacute;ng đ&oacute; cũng l&agrave; l&uacute;c động t&aacute;c gập th&acirc;n đạt tốc độ lớn nhất..</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>d. Động t&aacute;c kết th&uacute;c sau khi đầu tiếp x&uacute;c b&oacute;ng</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi thực hiện động t&aacute;c đ&aacute;nh đầu xong th&igrave; động t&aacute;c kế tiếp l&agrave; nhanh ch&oacute;ng di chuyển giữthăng bằng quan s&aacute;t v&agrave; thực hiện c&aacute;c động t&aacute;c kỹ thuật kh&aacute;c . Một l&agrave; sử dụng bộ phận n&agrave;o đ&oacute; của đầu đểtiếp x&uacute;c b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>IV. Đ&aacute;nh đầu ch&iacute;nh diện bằng tr&aacute;n giữa:</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>1.Yếu lĩnh động t&aacute;c kỹ thuật đ&aacute;nh đầu bằng tr&aacute;n giữa</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/danh-dau-3.png\" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\">Th&acirc;n người đối diện với hướng b&oacute;ng đến,mắt quan s&aacute;t sự vận động của quả b&oacute;ng, hai ch&acirc;n dạng ra hai b&ecirc;n hoặc trước sau, đầu gối hơi thấp xuống trọng t&acirc;m cơ thể rơi v&agrave;o ch&acirc;n trụ, hai vai bu&ocirc;ng lỏng tự nhi&ecirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi b&oacute;ng đến gần th&acirc;n người, ngả người như c&aacute;nh cung để tạo lực, hai ch&acirc;n d&ugrave;ng lực đạp đất, nhanh ch&oacute;ng gập người ra trước, hơi k&eacute;o cằm xuống, trong khoảnh khắc khi tiếp x&uacute;c với b&oacute;ng, cổ l&agrave;m động t&aacute;c đ&aacute;nh mạnh, d&ugrave;ng tr&aacute;n giữa đ&aacute;nh v&agrave;o b&oacute;ng th&acirc;n tr&ecirc;n theo đ&agrave; m&agrave; đ&aacute;nh về ph&iacute;a trước.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>2</strong>.<strong>Yếu lĩnh đ&aacute;nh đầu khi chạy</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Yếu lĩnh động t&aacute;c đ&aacute;nh đầu khi chạy với động t&aacute;c đứng tại chổ đ&aacute;nh đầu hầu như kh&ocirc;ng c&oacute; g&igrave; thay đổi.C&oacute; kh&aacute;c l&agrave; bước đầu ti&ecirc;n phải chạy t&igrave;m vị tr&iacute; th&iacute;ch hợp</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">3. Đứng tại chỗ đ&aacute;nh đầu</span></h3>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/danh-dau-4.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Loại kỹ thuật động t&aacute;c n&agrave;y thường được sửdụng chuyền b&oacute;ng qua khỏi đầu hoặc sử dụng khiđối phương tấn c&ocirc;ng chuyền b&oacute;ng cao qua đầu</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>4. Chạy l&ecirc;n đ&aacute;nh đầu</strong></span></p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/danh-dau-5.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Chạy đ&agrave; nhảy l&ecirc;n đ&aacute;nh đầu c&oacute; thể d&ugrave;ng một hoặc cả hai ch&acirc;n giậm nhảy, tuỳ theo g&oacute;c độ của b&oacute;ng m&agrave; chọn vị tr&iacute; m&agrave; chạy nhanh đến điểm giậm nhảy, bước cuối trước khi nhảy l&ecirc;n hơi rộng một t&iacute;,ch&acirc;n giậm nhảy đạp đất nhảy l&ecirc;n, c&ograve;n ch&acirc;n kia co gối đ&aacute;nh l&ecirc;n, khuỷ tay tự nhi&ecirc;n giơ l&ecirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>5. Kỹ thuật đ&aacute;nh đầu ra ph&iacute;a sau</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/danh-dau-6.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Động t&aacute;c n&agrave;y ph&acirc;n ra hai loại: đứng tại chổ v&agrave; nhảy l&ecirc;n đ&aacute;nh đầu.Khi b&oacute;ng đến gần cơ thể ở tr&ecirc;n kh&ocirc;ng, ưỡn ngực, mở bụng ra, cằm gh&igrave;m xuống,th&acirc;n ngả ra sau hướng l&ecirc;n ph&iacute;a tr&ecirc;n, d&ugrave;ng ch&iacute;nh giữa đỉnh đầu chạm ph&iacute;a dưới của b&oacute;ng l&agrave;m cho b&oacute;ng bật bay l&ecirc;n cao bay về ph&iacute;a sau.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>1.Kỹ thuật đ&aacute;nh đầu tại chổ bằng tr&aacute;n b&ecirc;n</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Căn cứ tốc độ vận h&agrave;nh của quả b&oacute;ng, trục chuyển động của quả b&oacute;ng m&agrave; kịp thời di động đến vị tr&iacute; .Hai ch&acirc;n dạng ra trước-sau hoặc hai b&ecirc;n ch&acirc;n trước phải đạt theo hướng b&oacute;ng đi, trọng t&acirc;mchuyển dần dần ra ch&acirc;n trước, mắt quan s&aacute;t b&oacute;ng, đầu gối ch&acirc;n trước hơi khỵu xuống, hai c&aacute;nh tay dangtự nhi&ecirc;n.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi b&oacute;ng bay đến tr&ecirc;n kh&ocirc;ng trước mặt, d&ugrave;ng lực đạp đất, mũi b&agrave;n ch&acirc;n di chuyển hướngth&iacute;ch hợp, th&acirc;n người chuyển theo hướng b&oacute;ng bay đi, đồng thời d&ugrave;ng lực đ&aacute;nh đầu v&agrave;o b&oacute;ng, l&agrave;m chotr&aacute;n b&ecirc;n đ&aacute;nh tr&uacute;ng v&agrave;o phần giữa ph&iacute;a sau của quả b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>2. Chạy đ&aacute;nh đầu bằng tr&aacute;n b&ecirc;n</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Yếu lĩnh động t&aacute;c cũng giống như đứng tại chổ đ&aacute;nh đầu bằng tr&aacute;n b&ecirc;n.Điều kh&aacute;c biệt l&agrave;động t&aacute;c được thực hiện khi chạy nhanh, v&agrave; ch&uacute; &yacute; giữ tư thế c&acirc;n bằng cho cơ thể sau khi ho&agrave;n th&agrave;nhđộng t&aacute;c.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>3. Bật l&ecirc;n đ&aacute;nh đầu bằng b&ecirc;n</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"\" src=\"http://sanchoi.com.vn/Content/images/luyen-tap-bong-da/2014/11/danh-dau-7.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ph&acirc;n l&agrave;m hai loại: đứng tại chổ giậm nhảy bật cao đ&aacute;nh đầu, chạy đ&agrave;</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Những y&ecirc;u cầu khi đ&aacute;nh đầu</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi đ&aacute;nh đầu mắt phải mở để quan s&aacute;t b&oacute;ng</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi b&oacute;ng tiếp x&uacute;c với đầu phải gồng ngườil&ecirc;n để đề ph&ograve;ng chấn thương khớp cổ .</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Khi đ&aacute;nh đầu phải dứt kho&aacute;t kh&ocirc;ng sợ sệt,thả lỏng người rất dễ g&acirc;y ra chấn thương</span></p>', 60),
(20, 'Tập kỹ thuật ( Truy cản)', '<h2><span style=\"font-size:14px\">1. Bước&nbsp;1</span></h2>\r\n\r\n<p><span style=\"font-size:14px\">Tiến đến trước mặt đối thủ thật nhanh để kh&ocirc;ng cho họ thời gian v&agrave; kh&ocirc;ng giản xử l&yacute; b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Che chắn trước mặt đối thủ v&agrave; chờ cơ hội tốt nhất để tấn c&ocirc;ng</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Đ&ocirc;i khi chỉ đặt đối thủ dưới &aacute;p lực cũng khiến họ phạm lỗi n&agrave;o đ&oacute;.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Tiến đến trước mặt đối thủ thật nhanh để kh&ocirc;ng cho họ thời gian v&agrave; kh&ocirc;ng giản xử l&yacute; b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Che chắn trước mặt đối thủ v&agrave; chờ cơ hội tốt nhất để tấn c&ocirc;ng</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Đ&ocirc;i khi chỉ đặt đối thủ dưới &aacute;p lực cũng khiến họ phạm lỗi n&agrave;o đ&oacute;.</span></p>\r\n\r\n<h2><span style=\"font-size:14px\">2. Bước&nbsp;2</span></h2>\r\n\r\n<p><span style=\"font-size:14px\">Khi bạn nghĩ c&oacute; thể đoạt được tr&aacute;i b&oacute;ng, sức nặng cơ thể n&ecirc;n dồn về ph&iacute;a trước để chuẩn bị tranh b&oacute;ng bằng l&ograve;ng trong b&agrave;n ch&acirc;n.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Điều đ&oacute; sẽ khiến đối thủ của bạn hoặc phải chuyền b&oacute;ng hoặc phải đưa b&oacute;ng qua bạn.</span></p>\r\n\r\n<h2><span style=\"font-size:14px\">3. Bước 3</span></h2>\r\n\r\n<p><span style=\"font-size:14px\">Nếu quả b&oacute;ng bị mắc giữa ch&acirc;n bạn v&agrave; ch&acirc;n đối thủ, h&atilde;y để ch&acirc;n bạn b&ecirc;n dưới tr&aacute;i b&oacute;ng để l&agrave;m n&oacute; văng ra.<br />\r\nĐảm bảo l&agrave; ch&acirc;n v&agrave; mắt c&aacute; của bạn thật vững chắc suốt pha tranh b&oacute;ng.<br />\r\nBạn sẽ dễ bị thương hơn nếu bạn kh&ocirc;ng thực sự chuẩn bị đầy đủ cho pha tranh b&oacute;ng</span></p>', 60),
(21, 'Tập kỹ thuật ( Chuồi bóng)', '<h2><span style=\"font-size:14px\">1. Nghệ thuật chuồi b&oacute;ng</span></h2>\r\n\r\n<p><span style=\"font-size:14px\">Những&nbsp;huấn luyện vi&ecirc;n dạy đ&aacute; b&oacute;ng cơ bản&nbsp;định nghĩa rằng nghệ thuật chuồi b&oacute;ng l&agrave; đoạt b&oacute;ng gọn g&agrave;ng, kiểm so&aacute;t n&oacute; hoặc ph&aacute; ra ngo&agrave;i để tr&aacute;nh nguy hiểm cho phần s&acirc;n nh&agrave;. Ở đ&acirc;y kh&ocirc;ng c&oacute; chuyện truy cản th&ocirc; bạo hoặc l&agrave;m hại đối phương. Việc t&iacute;nh to&aacute;n đ&uacute;ng thời điểm l&agrave; phần cốt l&otilde;i của kỹ năng chuồi b&oacute;ng giỏi. Bạn phải biết khi n&agrave;o cần nỗ lực đoạt b&oacute;ng. Đừng quyết định chuồi b&oacute;ng qu&aacute; sớm v&igrave; bạn c&oacute; thể sẽ bị lừa qua. H&atilde;y xem x&eacute;t vị tr&iacute; của người hậu vệ b&ecirc;n đội m&igrave;nh, quyết định h&agrave;nh động khi bạn l&agrave; người cuối c&ugrave;ng c&oacute; thể can thiệp. Thay v&igrave; lao v&agrave;o, bạn n&ecirc;n cố gắng k&egrave;m đối phương lại v&agrave; chờ đồng đội quay về phần s&acirc;n nh&agrave;. Trong mọi trường hợp, bạn n&ecirc;n &ldquo;lừa&rdquo; (k&igrave;m h&atilde;m) đối phương cho đến khi bạn cảm thấy đ&atilde; đến l&uacute;c tấn c&ocirc;ng. Chỉ chuồi b&oacute;ng khi bạn nghĩ bạn đ&atilde; c&oacute; cơ hội thuận lợi để lấy b&oacute;ng. Tuy nhi&ecirc;n, khi đ&atilde; quyết định chuồi b&oacute;ng, bạn n&ecirc;n thật quyết đo&aacute;n. C&aacute;c c&uacute; chuồi b&oacute;ng do dự kh&ocirc;ng chỉ tạo cho đối phương thời cơ thuận lợi để giữ lấy b&oacute;ng, m&agrave; c&ograve;n c&oacute; thể dẫn đến chấn thương.</span></p>\r\n\r\n<h2><span style=\"font-size:14px\">2. Trượt người chuồi b&oacute;ng</span></h2>\r\n\r\n<p><span style=\"font-size:14px\">Trượt người chuồi b&oacute;ng l&agrave; c&aacute;ch hiệu quả nhất để ph&aacute; b&oacute;ng. Thế nhưng ta cần t&iacute;nh to&aacute;n thời điểm ch&iacute;nh x&aacute;c, nếu kh&ocirc;ng sẽ rất nguy hiểm. Đ&acirc;y kh&ocirc;ng phải l&agrave; giải ph&aacute;p cho những người chưa th&agrave;nh thạo bởi v&igrave; n&oacute; thường l&agrave;m cho đối phương t&eacute; ng&atilde;. Khi ấy, nếu kh&ocirc;ng bị phạt trực tiếp th&igrave; người chuồi b&oacute;ng cũng nhận thẻ nếu chuồi nguy hiểm. Tuy nhi&ecirc;n, trượt người chuồi b&oacute;ng c&oacute; thể sẽ rất nguy hiểm, đặc biệt l&agrave; khi c&aacute;c tiền đạo d&ugrave;ng c&uacute; chuồi b&oacute;ng ấy để lấy b&oacute;ng trong ch&acirc;n hậu vệ ngay trong v&ograve;ng cấm địa đối phương. Vấn đề cốt l&otilde;i l&agrave; giữ tốc độ theo đối phương v&agrave; trượt người khi anh ta &iacute;t để &yacute; nhất, chuồi tr&uacute;ng b&oacute;ng trước khi tr&uacute;ng ch&acirc;n anh ta v&agrave; l&agrave;m anh ta ng&atilde;. H&atilde;y cố chuồi b&oacute;ng sao cho bạn vẫn đứng v&agrave; chạy được c&ugrave;ng với b&oacute;ng trước khi đối phương c&oacute; thời gian đứng dậy v&agrave; đuổi kịp.</span></p>\r\n\r\n<h2><span style=\"font-size:14px\">3. Cản b&oacute;ng</span></h2>\r\n\r\n<p><span style=\"font-size:14px\">Một số người&nbsp;cho rằng kiểu chuồi b&oacute;ng phổ biến nhất trong b&oacute;ng đ&aacute; l&agrave; &ldquo;cản b&oacute;ng&rdquo;. T&igrave;nh huống n&agrave;y xảy ra khi cả hai đối thủ c&ugrave;ng đến gần quả b&oacute;ng ở c&ugrave;ng một thời điểm. Khi gặp t&igrave;nh huống đối mặt 50-50 n&agrave;y, bạn cần phải tr&aacute;nh lao v&agrave;o đối phương ở những ph&uacute;t ch&oacute;t. L&agrave;m như thế sẽ rất dễ g&acirc;y chấn thương. H&atilde;y chặn đối phương bằng một c&uacute; chuồi b&oacute;ng mạnh. Đặt trọng lượng cơ thể của bạn l&ecirc;n tr&ecirc;n quả b&oacute;ng để gia tăng sức mạnh l&ecirc;n c&uacute; truy cản. Nếu chọn vị tr&iacute; v&agrave; tư thế đ&uacute;ng cũng như với một ch&uacute;t quyết đo&aacute;n, bạn sẽ gi&agrave;nh chiến thắng cho d&ugrave; đối phương to khỏe hơn.</span></p>', 60),
(22, 'Tập kỹ thuật ( Kèm người)', '<p>Đ&acirc;y l&agrave; chiến lược kết hợp kỹ thuật g&acirc;y &aacute;p lực l&ecirc;n đối thủ bằng tấn c&ocirc;ng đoạt b&oacute;ng hoặc đeo b&aacute;m k&egrave;m người. Khi tiếp cận gần đối phương, hậu vệ be mặt họ bằng những bước di chuyển ngắn, quan s&aacute;t chờ đợi cơ hội gi&agrave;nh b&oacute;ng. Tuy nhi&ecirc;n, bạn cũng phải đảm bảo sẵn s&agrave;ng chạy đua với đối phương nếu cần. Kỹ thuật ph&ograve;ng ngự n&agrave;y đ&ograve;i hỏi bạn hướng vị tr&iacute; cơ thể về ph&iacute;a đối phương v&agrave; chuẩn bị cắt b&oacute;ng trước khi họ nhận đường chuyền hoặc chạy theo hướng bảo vệ khung th&agrave;nh đội nh&agrave;.</p>\r\n\r\n<p>1. &Aacute;p s&aacute;t thật nhanh</p>\r\n\r\n<p>Di chuyển thật nhanh đến gần đối thủ đang c&oacute; b&oacute;ng. G&acirc;y &aacute;p lực c&agrave;ng nhanh cho cầu thủ đối phương, anh ta sẽ c&agrave;ng phải đưa ra quyết định sớm. Khi chịu &aacute;p lực cao thường sẽ hay c&oacute; những sai s&oacute;t. Với cầu thủ tấn c&ocirc;ng đối phương, anh ta sẽ c&oacute; &iacute;t thời gian để quan s&aacute;t v&agrave; t&igrave;m người chuyền b&oacute;ng, hoặc kh&ocirc;ng c&oacute; khoảng trống để dẫn b&oacute;ng d&agrave;i.</p>\r\n\r\n<p>2. Giảm tốc độ&nbsp;</p>\r\n\r\n<p>Những hậu vệ sau khi &aacute;p s&aacute;t đối thủ nhưng lại nhao v&agrave;o cướp b&oacute;ng qu&aacute; vội v&agrave;ng sẽ dễ bị đối phương vượt qua chỉ bằng một pha đẩy b&oacute;ng tho&aacute;t đi đơn giản. Bằng c&aacute;ch tiếp cận nhanh nhưng sau đ&oacute; giảm tốc độ xuống với những bước chạy ngắn, giữ một khoảng c&aacute;ch hợp l&yacute;, hậu vệ sẽ kh&oacute; bị đ&aacute;nh bại hơn nhiều.</p>\r\n\r\n<p>Quan trọng l&agrave; x&aacute;c định thời điểm ph&ugrave; hợp để giảm tốc độ xuống. L&uacute;c mới tập c&oacute; thể ch&uacute;ng ta sẽ chưa biết ngay được cự ly bao nhi&ecirc;u l&agrave; hợp l&yacute;. Nhưng dần dần bằng kinh nghiệm, ch&uacute;ng ta sẽ tự &yacute; thức được khoảng c&aacute;ch ph&ugrave; hợp để ngăn chặn đối thủ hiệu quả, kh&ocirc;ng qu&aacute; gần hoặc qu&aacute; xa. Với c&aacute; nh&acirc;n người viết, ước chừng cự ly một sải tay l&agrave; hợp l&yacute;.</p>', 60),
(23, 'Tập kỹ thuật ( Sút bóng)', '<p><span style=\"font-size:14px\">Mục đ&iacute;ch khi sử dụng kỹ thuật s&uacute;t b&oacute;ng bằng mu b&agrave;n ch&acirc;n: S&uacute;t phạt c&oacute; định trước khung th&agrave;nh, s&uacute;t phạt g&oacute;c, những c&uacute; s&uacute;t kết th&uacute;c v&agrave;o cầu m&ocirc;n để ghi b&agrave;n,&hellip;..</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Để tập luyện thuận thục bạn n&ecirc;n tập luyện theo nhưng bước sau đ&acirc;y:</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><img alt=\"ky-thuat-sut-bong-1\" src=\"https://bongda.choithethao.vn/wp-content/uploads/2016/10/ky-thuat-sut-bong-1-300x110.png\" style=\"height:157px; width:428px\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Luyện tập chạy đ&agrave; v&agrave; s&uacute;t cầu m&ocirc;n: Lấy đ&agrave; khoảng 3 đến 5 bước ch&acirc;n sau đ&oacute; chạy đ&agrave; đặt ch&acirc;n trụ song song với b&oacute;ng =&gt; gập ch&acirc;n s&uacute;t sau đ&oacute; duỗi thẳng người đẩy về ph&iacute;a trước tạo l&uacute;c mạnh đẩy b&oacute;ng đi xa. Vị tr&iacute; tiếp b&oacute;ng l&agrave; bằng mu b&agrave;n ch&acirc;n. Điểm tiếp b&oacute;ng quyết định độ xo&aacute;y v&agrave; quỷ đạo bay của b&oacute;ng; điểm tiếp x&uacute;c c&agrave;ng xa t&acirc;m b&oacute;ng th&igrave; độ xo&aacute;y b&oacute;ng tăng l&ecirc;n v&agrave; ngược lại.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li><em><strong>Chạy đ&agrave;:</strong></em></li>\r\n</ol>\r\n\r\n<p>&ndash; Thẳng hướng b&oacute;ng (Chếch từ 5-10 độ, đối với người ch&acirc;n d&agrave;i), tốc độ tăng dần đều, bước cuối d&agrave;i.</p>\r\n\r\n<ol start=\"2\">\r\n	<li><em><strong>Ch&acirc;n trụ:</strong></em></li>\r\n</ol>\r\n\r\n<p>&ndash; Đặt ngang v&agrave; c&aacute;ch b&oacute;ng 10-15cm (khoảng c&aacute;ch đặt ch&acirc;n trụ c&oacute; thể điều chỉnh, t&ugrave;y thuộc v&agrave;o tầm v&oacute;c v&agrave; th&oacute;i quen của từng người), lần lượt đặt từ g&oacute;t, m&aacute; ngo&agrave;i rồi cả b&agrave;n ch&acirc;n.</p>\r\n\r\n<p>&ndash; Mũi ch&acirc;n trụ thẳng hướng s&uacute;t b&oacute;ng.</p>\r\n\r\n<p>&ndash; Đầu gối khuỵu, to&agrave;n bộ trọng t&acirc;m cơ thể dồn v&agrave;o ch&acirc;n trụ.</p>\r\n\r\n<ol start=\"3\">\r\n	<li><strong><em>Ch&acirc;n lăng:</em></strong></li>\r\n</ol>\r\n\r\n<p>&ndash; Vung từ sau về trước. Tốc độ vung ch&acirc;n lăng v&agrave; tốc độ chạy đ&agrave; l&agrave; hai yếu tố quyết định uy lực của c&uacute; đ&aacute; (c&uacute; s&uacute;t).</p>\r\n\r\n<ol start=\"4\">\r\n	<li><em><strong>Tiếp x&uacute;c b&oacute;ng:</strong></em></li>\r\n</ol>\r\n\r\n<p><em><strong><img alt=\"biquyet2\" src=\"http://www.compete.vn/vnt_upload/news/06_2017/biquyet2.jpg\" /></strong></em></p>\r\n\r\n<p>&ndash; Duỗi hết mu, cổ ch&acirc;n giữ chắc.</p>\r\n\r\n<p>&ndash; Điểm tiếp x&uacute;c l&agrave; t&acirc;m b&oacute;ng, điểm chạm l&agrave; mu b&agrave;n ch&acirc;n (chỗ buộc d&acirc;y giầy).</p>\r\n\r\n<ol start=\"5\">\r\n	<li><strong><em>Kết th&uacute;c:</em></strong></li>\r\n</ol>\r\n\r\n<p>&ndash; Khi thực hiện v&agrave; kết th&uacute;c động t&aacute;c, hai tay vung tự nhi&ecirc;n, th&acirc;n người hơi đổ về ph&iacute;a trước v&agrave; lao theo hướng b&oacute;ng.</p>', 120),
(24, 'Tập kỹ thuật ( Chuyền ngắn)', '<p>Chuyền nhanh l&agrave;m cho tr&aacute;i b&oacute;ng sớm được đưa l&ecirc;n tr&ecirc;n v&agrave; hạn chế khả năng m&acirc;t quyền kiếm so&aacute;t b&oacute;ng.</p>\r\n\r\n<p>L&ograve;ng b&agrave;n ch&acirc;n (mặt trong ch&acirc;n) gi&uacute;p chuyền ch&iacute;nh x&aacute;c nhất.</p>\r\n\r\n<p>Tuy nhi&ecirc;n n&oacute; lại kh&oacute; gia tăng sức mạnh v&agrave; cũng dễ khiến đối thủ nhận ra bạn đang dự định chuyền b&oacute;ng đi đ&acirc;u.</p>\r\n\r\n<p>Do những điều tr&ecirc;n, tốt nhất chỉ n&ecirc;n d&ugrave;ng kĩ năng đ&oacute; để thực hiện những đường chuyền ngắn</p>\r\n\r\n<hr />\r\n<p><strong>Bước một</strong></p>\r\n\r\n<p>Một c&aacute;ch l&yacute; tưởng, bạn sẽ muốn tiếp x&uacute;c với tr&aacute;i b&oacute;ng theo một g&oacute;c 30 độ để bạn c&oacute; kh&ocirc;ng gian để di chuyển ch&acirc;n thuận tới.</p>\r\n\r\n<p>Đưa ch&acirc;n kh&ocirc;ng thuận gần đến b&ecirc;n cạnh tr&aacute;i b&oacute;ng, sử dụng tay để giữ thăng bằng, giữ đầu thẳng v&agrave; mắt tập trung v&agrave;o tr&aacute;i b&oacute;ng.</p>\r\n\r\n<hr />\r\n<p><strong>Bước hai</strong></p>\r\n\r\n<p>Giữ mắt c&aacute; ch&acirc;n chắc chắn, đưa ch&acirc;n thuận sang ngang v&agrave; đ&aacute; v&agrave;o t&acirc;m tr&aacute;i b&oacute;ng (để giữ n&oacute; tr&ecirc;n mặt s&acirc;n) bằng m&aacute; trong ch&acirc;n.</p>\r\n\r\n<p>Với c&aacute;ch chuyền đ&oacute;, bạn c&oacute; lẽ sẽ khiến tr&aacute;i b&oacute;ng ở tầm thấp để đồng đội c&oacute; thể dễ d&agrave;ng khống chế n&oacute;.</p>\r\n\r\n<hr />\r\n<p><strong>Bước ba</strong></p>\r\n\r\n<p>Lực bạn dồn v&agrave;o đường chuyền cũng rất đ&aacute;ng ch&uacute; &yacute;.</p>\r\n\r\n<p>Phải d&ugrave;ng ch&acirc;n đ&aacute; b&oacute;ng để tăng sức mạnh, tuy nhi&ecirc;n độ mạnh của đường chuyền c&ograve;n phụ thuộc v&agrave;o việc đồng đội của bạn, v&agrave; những cầu th&uacute; đối phương, đang ở bao xa.</p>\r\n\r\n<p>Bạn sẽ c&agrave;ng ng&agrave;y c&agrave;ng thuần thục việc đ&aacute;nh gi&aacute; điều tr&ecirc;n khi bạn chơi b&oacute;ng nhiều hơn</p>', 60),
(25, 'Tập kỹ thuật ( Chuyền dài)', '<p>Để thực hiện một đường chuyền thấp đủ vượt qua đối thủ, bạn phải d&ugrave;ng mu b&agrave;n ch&acirc;n v&agrave; đ&aacute; mạnh tr&aacute;i b&oacute;ng.</p>\r\n\r\n<p>N&oacute; c&oacute; thể ph&aacute; vỡ h&agrave;ng ph&ograve;ng ngự nhưng vẫn giữ được quả b&oacute;ng ở tr&ecirc;n mặt đất để đồng đội c&oacute; thể chạy l&ecirc;n đ&oacute;n đường chuyền.</p>\r\n\r\n<hr />\r\n<p><strong>Bước một</strong></p>\r\n\r\n<p>Vị tr&iacute; tiếp b&oacute;ng cũng giống như khi thực hiện đường chuyền ngắn bằng l&ograve;ng ch&acirc;n.</p>\r\n\r\n<p>Tiếp x&uacute;c với tr&aacute;i b&oacute;ng ở một g&oacute;c 30 độ để bạn c&oacute; kh&ocirc;ng gian để di chuyển ch&acirc;n thuận tới.</p>\r\n\r\n<p>Đặt ch&acirc;n kh&ocirc;ng thuận ngay b&ecirc;n cạnh tr&aacute;i b&oacute;ng, sử dụng tay để giữ thăng bằng, cổ thẳng trong khi mắt tập trung v&agrave;o tr&aacute;i b&oacute;ng.</p>\r\n\r\n<hr />\r\n<p><strong>Bước hai</strong></p>\r\n\r\n<p>Để giữ tr&aacute;i b&oacute;ng bay thấp, bạn phải tập trung giữ tr&aacute;i b&oacute;ng ở b&ecirc;n dưới đầu gối v&agrave; kh&ocirc;ng để ch&acirc;n bị nghi&ecirc;ng.</p>\r\n\r\n<p>Đ&aacute; v&agrave;o t&acirc;m quả b&oacute;ng bằng mu b&agrave;n ch&acirc;n trong khi c&aacute;c ng&oacute;n ch&acirc;n hướng xuống dưới.</p>\r\n\r\n<hr />\r\n<p><strong>Bước ba</strong></p>\r\n\r\n<p>Đưa ch&acirc;n thuận theo đ&agrave; tiến l&ecirc;n để gia tăng lực chuyền</p>', 60);
INSERT INTO `giaotrinhtap` (`id`, `TenBaiTap`, `NoiDungBaiTap`, `ThoiLuongTapToiDa`) VALUES
(26, 'Tập kỹ thuật ( Bắt bóng)', '<h2><span style=\"font-size:14px\">1. B&agrave;i tập&nbsp;di chuyển đổ người bắt b&oacute;ng 2 b&ecirc;n:</span></h2>\r\n\r\n<h3><span style=\"font-size:14px\">B&agrave;i tập 1: Bắt b&oacute;ng xệt</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chuẩn bị:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">HLV chuẩn bị c&aacute;c vật cản để Thủ m&ocirc;n di chuyển qua c&aacute;c vật cản đ&oacute;.</span></li>\r\n	<li><span style=\"font-size:14px\">Cần 1 hoặc 2 người phục vụ tiếp b&oacute;ng cho thủ m&ocirc;n thực hiện đổ người bắt b&oacute;ng.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; C&aacute;c bước thực hiện:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B1: Thủ m&ocirc;n di chuyển qua c&aacute;c vật cản được bố tr&iacute; bởi HLV.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B2: Sau đ&oacute; người phục vụ đ&aacute; b&oacute;ng xệt sang 1 b&ecirc;n. Thủ m&ocirc;n lập tức đổ người bắt b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B3: Sau khi thủ m&ocirc;n vừa bắt được tr&aacute;i b&oacute;ng; người phục vụ tiếp tục đ&aacute; b&oacute;ng xệt sang b&ecirc;n ngược lại.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B4: Thủ m&ocirc;n lập tức đứng dậy v&agrave; tiếp tục đổ người bắt b&oacute;ng.</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">B&agrave;i tập 2: Bắt b&oacute;ng bổng hoặc b&oacute;ng ngang người</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">Tương tự như b&agrave;i tập 1, chỉ kh&aacute;c điều l&agrave; người phục vụ sẽ tung b&oacute;ng cho thủ m&ocirc;n bắt b&oacute;ng bổng.</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">B&agrave;i tập 3: Kết hợp bắt b&oacute;ng bổng v&agrave; xệt:</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chuẩn bị:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Giống b&agrave;i tập 1 v&agrave; 2.</span></li>\r\n	<li><span style=\"font-size:14px\">Cần th&ecirc;m 1 người phục vụ n&eacute;m b&oacute;ng ở vị tr&iacute; xuất ph&aacute;t của Thủ m&ocirc;n.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; C&aacute;c bước thực hiện:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B1: Thực hiện y hệt b&agrave;i tập 1.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B2: Thực hiện xong b&agrave;i tập 1 quay sau chạy qua c&aacute;c vật cản về vị tr&iacute; xuất ph&aacute;t.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B3: Người phục vụ tung b&oacute;ng cho Thủ m&ocirc;n thực hiện giống b&agrave;i tập 2.</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Ch&uacute; &yacute;:&nbsp;</strong>C&oacute; thể thực hiện với b&oacute;ng Tennis để n&acirc;ng cao độ kh&oacute;.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Xem tham khảo Video buổi tập phản xạ của Thủ m&ocirc;n Thibaut Courtois:</span></p>\r\n\r\n<h2><span style=\"font-size:14px\">2. B&agrave;i tập phản xạ bất k&igrave;</span></h2>\r\n\r\n<h3><span style=\"font-size:14px\">B&agrave;i tập 1: Phản xạ bắt b&oacute;ng ở vị tr&iacute; bất k&igrave;</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chuẩn bị:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">HLV chuẩn bị 10 quả b&oacute;ng xếp ngang khu vực 16m50 v&agrave; song song với khung th&agrave;nh.</span></li>\r\n	<li><span style=\"font-size:14px\">Mỗi quả b&oacute;ng đặt c&aacute;ch nhau khoảng 30 cm.</span></li>\r\n	<li><span style=\"font-size:14px\">Cần 1 đến 2 người phục vụ.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; C&aacute;c bước thực hiện:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B1: Cầu thủ thực hiện s&uacute;t lần lượt c&aacute;c quả b&oacute;ng từ tr&aacute;i qua phải hoặc ngược lại t&ugrave;y v&agrave;o ch&acirc;n thuận của người phục vụ. S&uacute;t b&oacute;ng v&agrave;o vị tr&iacute; bất k&igrave; trong khung th&agrave;nh.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B2: Thủ m&ocirc;n thực hiện phản xạ bắt b&oacute;ng theo từng c&uacute; s&uacute;t của người phục vụ.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B3: Khi thủ m&ocirc;n vừa bắt được tr&aacute;i b&oacute;ng th&igrave; người phục vụ lập tức s&uacute;t tr&aacute;i b&oacute;ng tiếp theo.</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">B&agrave;i tập 2: Phản xạ bắt b&oacute;ng Tennis</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chuẩn bị:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Vợt Tennis, nhiều b&oacute;ng Tennis.</span></li>\r\n	<li><span style=\"font-size:14px\">Cần tối thiểu 2 người phục vụ.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; C&aacute;c bước thực hiện:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B1: 1 người phục vụ tiếp b&oacute;ng. 1 người cầm vợt Tennis đ&aacute;nh b&oacute;ng về ph&iacute;a cầu m&ocirc;n với lực vừa phải.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B2: Thủ m&ocirc;n thực hiện phản xạ bắt b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B3: Sau khi thủ m&ocirc;n vừa bắt b&oacute;ng th&igrave; lập tức đ&aacute;nh quả b&oacute;ng tiếp theo về ph&iacute;a khung th&agrave;nh.</span></p>', 60),
(27, 'Tập kỹ thuật ( Đấm bóng)', '<p><span style=\"font-size:14px\">Bước 1: Người phục vụ tung hoặc s&uacute;t b&oacute;ng v&agrave;o tầm trung v&agrave;o người thủ m&ocirc;n.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Bước 2: Thủ m&ocirc;n x&aacute;c định hướng b&oacute;ng v&agrave; điểm rơi của b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Bước 3:&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Nếu b&oacute;ng lăn v&agrave;o giữa thủ m&ocirc;n th&igrave;:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Hai ch&acirc;n của thủ m&ocirc;n đứng rộng bằng vai.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Người hơi c&uacute;i xuống.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Hai tay vươn d&agrave;i nắm s&aacute;t v&agrave;o nhau &nbsp;v&agrave; đấm thẳng v&agrave;o quả b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Nếu b&oacute;ng lăn sang hai b&ecirc;n của thủ m&ocirc;n th&igrave;:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Ch&acirc;n trụ của thủ m&ocirc;n chếch l&ecirc;n 1 g&oacute;c 30 độ.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Đổ người theo hướng mũi ch&acirc;n.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Đến đ&acirc;y th&igrave; thủ m&ocirc;n c&oacute; thể thực hiện theo 2 c&aacute;ch:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">C&aacute;ch 1: Đấm b&oacute;ng bằng 1 tay khi b&oacute;ng đến thủ m&ocirc;n vươn 1 tay l&ecirc;n đến vị tr&iacute; thuận lơi nhất th&igrave; đấm thẳng v&agrave;o phần dưới của quả b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">C&aacute;ch 2: Đấm b&oacute;ng bằng 2 tay khi b&oacute;ng đến thủ m&ocirc;n đưa hai tay l&ecirc;n nắm s&aacute;t lại v&agrave; đấm thẳng v&agrave;o quả b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ch&uacute; &yacute;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Thủ m&ocirc;n cần x&aacute;c định ch&iacute;nh x&aacute;c hướng v&agrave; điểm rơi của quả b&oacute;ng.</span></p>', 60),
(28, 'Tập kỹ thuật ( Sút bóng bằng lòng bàn chân)', '<p><span style=\"font-size:14px\"><img alt=\"\" src=\"https://sites.google.com/site/caulacbohvbp/_/rsrc/1346755618529/home/huan-luyen-dhao-tao/huan-luyen-thu-mon/bai-3-ky-thuat-da-bong-bang-long-ban-chan/2.png\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">+&nbsp;<strong>B1</strong>: Quan s&aacute;t</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Ngắm mục ti&ecirc;u dứt điểm, đường b&oacute;ng dứt điểm</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+&nbsp;<strong>B2</strong>: Chạy đ&agrave;&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Để s&uacute;t được mạnh ngo&agrave;i điểm tiếp x&uacute;c b&oacute;ng với b&agrave;n ch&acirc;n th&igrave; c&aacute;c bạn phải chạy đ&agrave; hoặc lấy đ&agrave; tốt, v&agrave; quan trọng ở bước cuối c&ugrave;ng trụ ch&acirc;n tr&aacute;i, hoặc ch&acirc;n phải đối với người thuận ch&acirc;n tr&aacute;i phải vững, đồng thời lấy thế của đ&agrave; chạy s&uacute;t b&oacute;ng co ch&acirc;n nhiều về đăng sau</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+&nbsp;<strong>B3</strong>: S&uacute;t b&oacute;ng ( c&oacute; 2 kiểu )</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Điểm tiếp x&uacute;c giữa ch&acirc;n v&agrave; b&oacute;ng l&agrave; l&ograve;ng&nbsp;của b&agrave;n ch&acirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">. S&uacute;t thẳng</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Điểm tiếp x&uacute;c giữa ch&acirc;n v&agrave; b&oacute;ng l&agrave; 1 g&oacute;c 90 độ sẽ gi&uacute;p b&oacute;ng đi thẳng về hướng mục ti&ecirc;u</span></p>\r\n\r\n<p><span style=\"font-size:14px\">. S&uacute;t xo&aacute;y</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Điểm tiếp x&uacute;c giữa ch&acirc;n v&agrave; b&oacute;ng l&agrave; 1 g&oacute;c 30 &ndash; 40 độ t&ugrave;y v&agrave;o độ xo&aacute;y đồng thời đưa ch&acirc;n l&ecirc;n theo hướng s&uacute;t</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><em><strong>Ch&uacute; &yacute;&nbsp;</strong></em></span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ S&uacute;t b&oacute;ng bằng l&ograve;ng&nbsp;b&agrave;n ch&acirc;n b&agrave;n ch&acirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ S&uacute;t thẳng&nbsp;sẽ gi&uacute;p b&oacute;ng đi mạnh v&agrave; chuẩn x&aacute;c theo hướng thẳng về ph&iacute;a thủ m&ocirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ S&uacute;t xo&aacute;y sẽ l&agrave;m cho tr&aacute;i b&oacute;ng c&oacute; quỹ đạo kh&oacute; lường, thủ m&ocirc;n sẽ kh&oacute; bắt được b&oacute;ng hơn nhưng độ ch&iacute;nh x&aacute;c kh&ocirc;ng cao</span></p>', 60),
(29, 'Tập kỹ thuật ( Phối hợp)', '<h2><span style=\"font-size:16px\">B&agrave;i tập 1:&nbsp;Phối hợp giữa 2 cầu thủ A v&agrave; B</span></h2>\r\n\r\n<p><span style=\"font-size:16px\"><strong>C&aacute;c bước thực hiện:</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">1. A, B đứng thẳng h&agrave;ng nhau.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">2. Cầu thủ A chuyền b&oacute;ng cho B, B l&agrave;m tường bật ch&eacute;o sang tr&aacute;i hoặc phải cho cầu thủ A lao v&agrave;o đỡ b&oacute;ng rồi dứt điểm ch&eacute;o g&oacute;c.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Xem video hướng dẫn sau:</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><span style=\"font-size:16px\">B&agrave;i tập 2: Phối hợp 3 cầu thủ A, B, C</span></h2>\r\n\r\n<p><span style=\"font-size:16px\"><strong>C&aacute;c bước thực hiện:</strong></span></p>\r\n\r\n<p><span style=\"font-size:16px\">1. A, B, C đứng thẳng h&agrave;ng. C đứng ở giữa s&acirc;n, A đứng ở v&ograve;ng cung 16m50, B đứng ở giữa A v&agrave; C.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">2. Cầu thủ C chuyền b&oacute;ng ch&eacute;o sang tr&aacute;i hoặc phải.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">3. B di chuyển đ&oacute;n b&oacute;ng ở hướng C chuyền. Đồng thời A di chuyển theo hướng ngược với B.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">4. B chuyền b&oacute;ng v&agrave;o giữa v&ograve;ng cấm. A di chuyển đ&oacute;n b&oacute;ng v&agrave; dứt điểm ch&eacute;o g&oacute;c.</span></p>', 120),
(30, 'Tập kỹ thuật ( Đá Vô-lê)', '<h3><span style=\"font-size:14px\">Bước 1: Quan s&aacute;t</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">Ngắm mục ti&ecirc;u dứt điểm, đường b&oacute;ng dứt điểm</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">Bước 2: Chạy đ&agrave;</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">Cần nắm r&otilde; quỹ đạo của b&oacute;ng để chạy đ&agrave; ph&ugrave; hợp dứt điểm đ&uacute;ng tr&aacute;i b&oacute;ng</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">Bước 3: S&uacute;t b&oacute;ng</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">S&uacute;t b&oacute;ng khi b&oacute;ng vẫn c&ograve;n đang ở tr&ecirc;n cao v&agrave; dứt điểm thẳng về ph&iacute;a khung th&agrave;nh</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Ch&uacute; &yacute;:</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ V&ocirc; l&ecirc; sẽ gi&uacute;p b&oacute;ng đi rất mạnh v&agrave; căng nhưng sẽ kh&oacute; chuẩn x&aacute;c</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ X&aacute;c định quỹ đạo của b&oacute;ng v&agrave; đường b&oacute;ng thật chuẩn x&aacute;c mới thực hiện được kỹ thuật n&agrave;y</span></p>', 35),
(31, 'Tập kỹ thuật ( Đá phạt)', '<h3><span style=\"font-size:14px\">Bước 1: Quan s&aacute;t</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">+ Đ&aacute; phạt trực tiếp: Cần x&aacute;c định&nbsp;đường b&oacute;ng hướng hướng b&oacute;ng s&uacute;t phạt</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Đ&aacute; phạt gi&aacute;n tiếp: Cần định hướng hướng chuyền v&agrave; chiến thuật đ&aacute; phạt của đội b&oacute;ng</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">Bước 2: Lấy đ&agrave;</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">Lấy đ&agrave; c&aacute;ch b&oacute;ng 3 &ndash; 5 bước ch&acirc;n rồi thực hiện c&aacute;c kỹ thuật chuyền b&oacute;ng s&uacute;t b&oacute;ng cho ph&ugrave; hợp</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">Bước 3: Đ&aacute; phạt</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">+ Đ&aacute; phạt trực tiếp: Thực hiện kỹ thuật s&uacute;t b&oacute;ng để s&uacute;t b&oacute;ng về ph&iacute;a cầu g&ocirc;n</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Đ&aacute; phạt gi&aacute;n tiếp: Thực hiện kỹ thuật chuyền b&oacute;ng, tạt b&oacute;ng để thực hiện đ&aacute; phạt</span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>Ch&uacute; &yacute;:</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ Cần tu&acirc;n thủ luật đ&aacute; phạt để tr&aacute;nh phạm luật</span></p>\r\n\r\n<p><span style=\"font-size:14px\">+ C&oacute; thể phối hợp đ&aacute; phạt để g&acirc;y bất ngờ cho thủ m&ocirc;n</span></p>', 65),
(32, 'Tập kỹ thuật ( Phản xạ)', '<h3><span style=\"font-size:14px\">B&agrave;i tập 1: Phản xạ bắt b&oacute;ng ở vị tr&iacute; bất k&igrave;</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chuẩn bị:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">HLV chuẩn bị 10 quả b&oacute;ng xếp ngang khu vực 16m50 v&agrave; song song với khung th&agrave;nh.</span></li>\r\n	<li><span style=\"font-size:14px\">Mỗi quả b&oacute;ng đặt c&aacute;ch nhau khoảng 30 cm.</span></li>\r\n	<li><span style=\"font-size:14px\">Cần 1 đến 2 người phục vụ.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; C&aacute;c bước thực hiện:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B1: Cầu thủ thực hiện s&uacute;t lần lượt c&aacute;c quả b&oacute;ng từ tr&aacute;i qua phải hoặc ngược lại t&ugrave;y v&agrave;o ch&acirc;n thuận của người phục vụ. S&uacute;t b&oacute;ng v&agrave;o vị tr&iacute; bất k&igrave; trong khung th&agrave;nh.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B2: Thủ m&ocirc;n thực hiện phản xạ bắt b&oacute;ng theo từng c&uacute; s&uacute;t của người phục vụ.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B3: Khi thủ m&ocirc;n vừa bắt được tr&aacute;i b&oacute;ng th&igrave; người phục vụ lập tức s&uacute;t tr&aacute;i b&oacute;ng tiếp theo.</span></p>\r\n\r\n<h3><span style=\"font-size:14px\">B&agrave;i tập 2: Phản xạ bắt b&oacute;ng Tennis</span></h3>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; Chuẩn bị:</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"font-size:14px\">Vợt Tennis, nhiều b&oacute;ng Tennis.</span></li>\r\n	<li><span style=\"font-size:14px\">Cần tối thiểu 2 người phục vụ.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:14px\">&ndash; C&aacute;c bước thực hiện:</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B1: 1 người phục vụ tiếp b&oacute;ng. 1 người cầm vợt Tennis đ&aacute;nh b&oacute;ng về ph&iacute;a cầu m&ocirc;n với lực vừa phải.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B2: Thủ m&ocirc;n thực hiện phản xạ bắt b&oacute;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">B3: Sau khi thủ m&ocirc;n vừa bắt b&oacute;ng th&igrave; lập tức đ&aacute;nh quả b&oacute;ng tiếp theo về ph&iacute;a khung th&agrave;nh.</span></p>', 65);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaotrinh_luyentap_cauthu`
--

DROP TABLE IF EXISTS `giaotrinh_luyentap_cauthu`;
CREATE TABLE IF NOT EXISTS `giaotrinh_luyentap_cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauThu` int(11) NOT NULL,
  `idGiaoTrinhTap` int(11) NOT NULL,
  `idLichLuyenTap` int(11) NOT NULL,
  `KetQuaLuyenTap` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idGiaoTrinhTap` (`idGiaoTrinhTap`),
  KEY `idLichLuyenTap` (`idLichLuyenTap`)
) ENGINE=InnoDB AUTO_INCREMENT=340 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaotrinh_luyentap_cauthu`
--

INSERT INTO `giaotrinh_luyentap_cauthu` (`id`, `idCauThu`, `idGiaoTrinhTap`, `idLichLuyenTap`, `KetQuaLuyenTap`) VALUES
(2, 1, 2, 1, 'Hoàn thành 60'),
(3, 5, 2, 1, 'Hoàn thành'),
(6, 1, 3, 1, 'Hoàn thành'),
(104, 8, 28, 8, 'Hoàn thành'),
(105, 8, 30, 8, 'Hoàn thành'),
(145, 7, 15, 2, 'Hoàn thành'),
(146, 7, 17, 2, 'Hoàn thành'),
(147, 7, 20, 2, 'Hoàn thành'),
(163, 13, 15, 2, 'Hoàn thành 99'),
(164, 13, 17, 2, 'Hoàn thành'),
(165, 13, 20, 2, 'Hoàn thành'),
(172, 7, 12, 2, 'Hoàn thành'),
(178, 13, 12, 2, 'Hoàn thành'),
(191, 10, 19, 8, 'Hoàn thành'),
(192, 10, 23, 8, 'Hoàn thành'),
(199, 9, 12, 7, 'Hoàn thành'),
(200, 9, 14, 7, 'Hoàn thành'),
(201, 5, 10, 9, 'Chưa hoàn thành'),
(202, 5, 12, 9, 'Chưa hoàn thành'),
(203, 5, 14, 9, 'Chưa hoàn thành'),
(204, 6, 10, 9, 'Hoàn thành'),
(205, 6, 12, 9, 'Hoàn thành'),
(206, 6, 14, 9, 'Hoàn thành'),
(207, 5, 2, 8, 'Hoàn thành'),
(208, 5, 4, 8, 'Hoàn thành'),
(209, 5, 12, 8, 'Hoàn thành'),
(210, 11, 2, 8, 'Hoàn thành'),
(211, 11, 3, 8, 'Hoàn thành'),
(212, 11, 20, 8, 'Hoàn thành'),
(246, 9, 17, 7, 'Hoàn thành'),
(254, 17, 17, 7, 'Hoàn thành'),
(256, 20, 17, 7, 'Hoàn thành'),
(260, 24, 17, 7, 'Hoàn thành'),
(263, 4, 4, 7, NULL),
(264, 4, 10, 7, NULL),
(265, 4, 12, 7, NULL),
(266, 4, 21, 7, NULL),
(267, 3, 4, 7, NULL),
(268, 3, 10, 7, NULL),
(269, 3, 12, 7, NULL),
(270, 3, 21, 7, NULL),
(271, 2, 10, 7, NULL),
(272, 2, 12, 7, NULL),
(273, 2, 17, 7, NULL),
(274, 2, 21, 7, NULL),
(275, 7, 4, 7, NULL),
(276, 7, 10, 7, NULL),
(277, 7, 12, 7, NULL),
(278, 7, 21, 7, NULL),
(279, 6, 3, 7, NULL),
(280, 6, 4, 7, NULL),
(281, 6, 10, 7, NULL),
(282, 6, 12, 7, NULL),
(283, 6, 17, 7, NULL),
(284, 2, 2, 16, 'Hoàn thành'),
(285, 2, 4, 16, 'Hoàn thành'),
(286, 2, 10, 16, 'Hoàn thành'),
(287, 2, 12, 16, 'Hoàn thành'),
(288, 3, 2, 16, 'Hoàn thành'),
(289, 3, 4, 16, 'Hoàn thành'),
(290, 3, 10, 16, 'Hoàn thành'),
(291, 3, 12, 16, 'Hoàn thành'),
(292, 4, 2, 16, 'Hoàn thành'),
(293, 4, 4, 16, 'Hoàn thành'),
(294, 4, 10, 16, 'Hoàn thành'),
(295, 4, 12, 16, 'Hoàn thành'),
(296, 6, 2, 16, 'Hoàn thành'),
(297, 6, 4, 16, 'Hoàn thành'),
(298, 6, 10, 16, 'Hoàn thành'),
(299, 6, 12, 16, 'Hoàn thành'),
(300, 7, 19, 14, 'Hoàn thành'),
(301, 7, 21, 14, 'Hoàn thành'),
(302, 7, 25, 14, 'Hoàn thành'),
(303, 8, 19, 14, 'Hoàn thành'),
(304, 8, 21, 14, 'Hoàn thành'),
(305, 8, 25, 14, 'Hoàn thành'),
(306, 9, 19, 14, 'Hoàn thành'),
(307, 9, 21, 14, 'Hoàn thành'),
(308, 9, 25, 14, 'Hoàn thành'),
(309, 10, 19, 14, 'Hoàn thành'),
(310, 10, 21, 14, 'Hoàn thành'),
(311, 10, 25, 14, 'Hoàn thành'),
(312, 11, 19, 14, 'Hoàn thành'),
(313, 11, 21, 14, 'Hoàn thành'),
(314, 11, 25, 14, 'Hoàn thành'),
(315, 16, 12, 18, 'Hoàn thành'),
(316, 16, 16, 18, 'Hoàn thành'),
(317, 16, 30, 18, 'Hoàn thành'),
(318, 17, 12, 18, 'Hoàn thành'),
(319, 17, 16, 18, 'Hoàn thành'),
(320, 17, 30, 18, 'Hoàn thành'),
(321, 21, 12, 18, 'Hoàn thành'),
(322, 21, 16, 18, 'Hoàn thành'),
(323, 21, 30, 18, 'Hoàn thành'),
(324, 22, 12, 18, 'Hoàn thành'),
(325, 22, 16, 18, 'Hoàn thành'),
(326, 22, 30, 18, 'Hoàn thành'),
(327, 26, 12, 18, 'Hoàn thành'),
(328, 26, 16, 18, 'Hoàn thành'),
(329, 26, 30, 18, 'Hoàn thành'),
(330, 16, 18, 16, 'Hoàn thành'),
(331, 16, 19, 16, 'Hoàn thành'),
(332, 17, 18, 16, 'Hoàn thành'),
(333, 17, 19, 16, 'Hoàn thành'),
(334, 21, 18, 16, 'Hoàn thành'),
(335, 21, 19, 16, 'Hoàn thành'),
(336, 22, 18, 16, 'Hoàn thành'),
(337, 22, 19, 16, 'Hoàn thành'),
(338, 26, 18, 16, 'Hoàn thành'),
(339, 26, 19, 16, 'Hoàn thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huanluyenvien`
--

DROP TABLE IF EXISTS `huanluyenvien`;
CREATE TABLE IF NOT EXISTS `huanluyenvien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LuocSuHuanLuyen` longtext COLLATE utf8_unicode_ci,
  `idNguoiDung` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idNguoiDung`),
  KEY `idNguoiDung` (`idNguoiDung`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `huanluyenvien`
--

INSERT INTO `huanluyenvien` (`id`, `LuocSuHuanLuyen`, `idNguoiDung`) VALUES
(1, NULL, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kynang`
--

DROP TABLE IF EXISTS `kynang`;
CREATE TABLE IF NOT EXISTS `kynang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenKyNang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ChiTiet` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kynang`
--

INSERT INTO `kynang` (`id`, `TenKyNang`, `ChiTiet`) VALUES
(1, 'Chạy nhanh', NULL),
(2, 'Đánh đầu', NULL),
(3, 'Lãnh đạo', NULL),
(4, 'Tổ chức trận đấu', NULL),
(5, 'Thể lực bền', '<p>Thể lực bền</p>'),
(6, 'Không chiến', '<p>Kh&ocirc;ng chiến</p>'),
(7, 'Nhảy cao', '<p>Nhảy cao</p>'),
(8, 'Thăng bằng', '<p>Thăng bằng</p>'),
(9, 'Rê bóng', '<p>R&ecirc; b&oacute;ng</p>'),
(10, 'Giữ bóng', '<p>Giữ b&oacute;ng</p>'),
(11, 'Kèm người', '<p>K&egrave;m người</p>'),
(12, 'Cắt bóng', '<p>Cắt b&oacute;ng</p>'),
(13, 'Tranh bóng', '<p>Tranh b&oacute;ng</p>'),
(14, 'Xoạc bóng', '<p>Xoạc b&oacute;ng</p>'),
(15, 'Dứt điểm', '<p>Dứt điểm</p>'),
(16, 'Tạt bóng', '<p>Tạt b&oacute;ng</p>'),
(17, 'Chuyền ngắn', '<p>Chuyền ngắn</p>'),
(18, 'Chuyền dài', '<p>Chuyền d&agrave;i</p>'),
(19, 'Sút xa', '<p>S&uacute;t xa</p>'),
(20, 'Chọn vị trí', '<p>Chọn vị tr&iacute;</p>'),
(21, 'Tầm nhìn', '<p>Tầm nh&igrave;n</p>'),
(22, 'Phản ứng', '<p>Phản ứng</p>'),
(23, 'Phản xạ', '<p>Phản xạ</p>'),
(24, 'Bắt bóng', '<p>Bắt b&oacute;ng</p>'),
(25, 'Đổ người', '<p>Đổ người</p>'),
(26, 'Chiến binh', '<p>Chiến binh</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kynang_cauthu`
--

DROP TABLE IF EXISTS `kynang_cauthu`;
CREATE TABLE IF NOT EXISTS `kynang_cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idKyNang` int(11) NOT NULL,
  `idCauThu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idKyNang` (`idKyNang`),
  KEY `idCauThu` (`idCauThu`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kynang_cauthu`
--

INSERT INTO `kynang_cauthu` (`id`, `idKyNang`, `idCauThu`) VALUES
(1, 3, 1),
(2, 22, 1),
(3, 1, 2),
(4, 5, 2),
(5, 8, 2),
(6, 10, 2),
(13, 3, 7),
(18, 1, 9),
(19, 5, 9),
(20, 23, 1),
(21, 24, 1),
(22, 25, 1),
(23, 13, 2),
(24, 3, 3),
(25, 4, 3),
(26, 5, 3),
(27, 6, 3),
(28, 8, 3),
(29, 12, 3),
(30, 13, 3),
(31, 14, 3),
(32, 17, 3),
(33, 11, 4),
(34, 12, 4),
(35, 13, 4),
(36, 20, 4),
(37, 26, 4),
(38, 18, 3),
(39, 26, 3),
(40, 6, 5),
(41, 13, 5),
(42, 26, 5),
(43, 1, 6),
(44, 4, 7),
(45, 5, 7),
(46, 12, 7),
(47, 17, 7),
(48, 18, 7),
(49, 9, 9),
(50, 10, 9),
(51, 3, 10),
(52, 8, 10),
(53, 12, 10),
(54, 13, 10),
(55, 14, 10),
(56, 17, 10),
(57, 18, 10),
(58, 20, 10),
(59, 22, 10),
(60, 26, 10),
(61, 15, 8),
(62, 16, 8),
(63, 17, 8),
(64, 20, 8),
(65, 4, 11),
(66, 8, 11),
(67, 9, 11),
(68, 12, 11),
(69, 17, 11),
(70, 18, 11),
(71, 19, 11),
(72, 21, 11),
(73, 1, 12),
(74, 8, 12),
(75, 9, 12),
(76, 10, 12),
(77, 15, 12),
(78, 22, 12),
(79, 1, 13),
(80, 5, 13),
(81, 15, 13),
(82, 22, 14),
(83, 23, 14),
(84, 25, 14),
(85, 5, 15),
(86, 7, 15),
(87, 1, 17),
(88, 4, 17),
(89, 8, 17),
(90, 9, 17),
(91, 10, 17),
(92, 1, 19),
(93, 11, 20),
(94, 13, 20),
(95, 20, 20),
(96, 5, 21),
(97, 9, 21),
(98, 10, 21),
(99, 15, 21),
(100, 2, 24),
(101, 3, 24),
(102, 1, 22),
(103, 6, 22),
(104, 7, 22),
(105, 9, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichkham`
--

DROP TABLE IF EXISTS `lichkham`;
CREATE TABLE IF NOT EXISTS `lichkham` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NgayKham` date NOT NULL,
  `CaKham` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaDiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDungDieuTri` text COLLATE utf8_unicode_ci,
  `idPhacDoDieuTri` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPhacDoDieuTri` (`idPhacDoDieuTri`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichkham`
--

INSERT INTO `lichkham` (`id`, `NgayKham`, `CaKham`, `DiaDiem`, `NoiDungDieuTri`, `idPhacDoDieuTri`) VALUES
(1, '2018-06-01', 'Sáng', 'Tòa nhà 5a', 'Khám tổng quát, Thuốc Anileneu 50mg', 2),
(2, '2018-06-06', 'Sáng', 'Tòa nhà 5a', 'Khám tổng quát', 1),
(3, '2018-06-10', 'Chiều', 'Tòa nhà 5a', 'Chụp X-Ray', 1),
(4, '2018-06-14', 'Sáng', 'Tòa nhà 5B, Lầu 2', 'Phẫu thuật cắt bỏ khối u', 1),
(5, '2018-06-01', 'Sáng', 'Sân 5A', 'Khám tổng quát', 3),
(6, '2018-06-22', 'Sáng', 'Tòa nhà 5a', 'Uống cocain', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichluyentap`
--

DROP TABLE IF EXISTS `lichluyentap`;
CREATE TABLE IF NOT EXISTS `lichluyentap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NgayLuyenTap` date NOT NULL,
  `GioLuyenTap` time DEFAULT NULL,
  `CaLuyenTap` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DiaDiem` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idHuanLuyenVien` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idHuanLuyenVien` (`idHuanLuyenVien`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichluyentap`
--

INSERT INTO `lichluyentap` (`id`, `NgayLuyenTap`, `GioLuyenTap`, `CaLuyenTap`, `DiaDiem`, `idHuanLuyenVien`) VALUES
(1, '2018-06-06', '08:00:00', 'Ca sáng', 'Sân tập A', 1),
(2, '2018-06-24', '08:00:00', 'Ca sáng', 'Sân tập B', 1),
(3, '2018-06-14', '08:00:00', 'Ca sáng', 'Sân tập B', 1),
(7, '2018-07-30', '08:00:00', 'Ca sáng', 'Sân tập A', 1),
(8, '2018-07-10', '08:00:00', 'Ca sáng', 'Sân tập A', 1),
(9, '2018-07-15', '13:30:00', 'Ca trưa', 'Sân tập A', 1),
(13, '2018-06-24', '13:30:00', 'Ca trưa', 'Sân tập B', 1),
(14, '2018-08-08', '13:30:00', 'Ca trưa', 'Sân tập A', 1),
(15, '2018-07-16', '13:30:00', 'Ca trưa', 'Sân tập A', 1),
(16, '2018-08-02', '08:00:00', 'Ca sáng', 'Sân tập A', 1),
(17, '2018-09-08', '08:00:00', 'Ca sáng', 'Sân tập A', 1),
(18, '2018-08-16', '08:00:00', 'Ca sáng', 'Sân tập A', 1),
(19, '2018-08-23', '08:00:00', 'Ca sáng', 'Sân tập A', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `QuocTich` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GioiTinh` tinyint(1) DEFAULT NULL,
  `NoiSinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhDaiDien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `username`, `password`, `HoTen`, `ChucVu`, `Email`, `NgaySinh`, `QuocTich`, `GioiTinh`, `NoiSinh`, `HinhDaiDien`, `remember_token`) VALUES
(1, 'admin', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Thi Trường Minh', 'admin', 'admin@gmail.com', '1996-08-29', 'Việt Nam', 0, 'Hồ Chí Minh city', '15315699271529339959IMG_20170914_170410_HDR.jpg', '0bCa1xLY1GlkHCwDHLAwG1PQyD7VSZWLRmWtkpcSi8tV2gH1j8idYxbxLf9X'),
(2, 'karius', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Loris Karius', 'cauthu', 'karius@gmail.com', '1993-06-22', 'Đức', 1, 'Biberach an der Riß', '1531571301karius.png', 'EWIYJ6sa75KaYHRQjaxy5WqWvVWh5bRdyj2rXyEv0SYp8mhD2i3H7TuSyV6y'),
(3, 'clyne', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Nathaniel Clyne', 'cauthu', 'clyne@gmail.com', '1991-04-05', 'Anh', 1, 'Stockwell', '1531572804clyne.png', NULL),
(4, 'dijk', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Virgil van Dijk', 'cauthu', 'dijk@gmail.com', '1991-07-08', 'Hà Lan', 1, 'Breda', '1531572967dijk.png', NULL),
(5, 'lovren', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Dejan Lovren', 'cauthu', 'lovren@gmail.com', '1989-07-05', 'Croatia', 1, 'Zenica', '1531573254lovren.png', NULL),
(6, 'robertson', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Andrew Robertson', 'cauthu', 'robertson@gmail.com', '1994-03-11', 'Scotland', 1, 'Glasgow', '1531573468roberson.png', NULL),
(7, 'milner', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'James Milner', 'cauthu', 'milner@gmail.com', '1986-01-04', 'Anh', 1, 'Leed', '1531573687milner.png', NULL),
(8, 'henderson', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Jordan Henderson', 'cauthu', 'henderson@gmail.com', '1990-06-17', 'Anh', 1, 'Sunderland', '1531573792henderson.png', NULL),
(9, 'lallana', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Adam Lallana', 'cauthu', 'lallana@gmail.com', '1988-05-10', 'Anh', 1, 'St Albans', '1531574025lallana.png', NULL),
(10, 'chamberlain', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Alex Ox Chamberlain', 'cauthu', 'chamberlain@gmail.com', '1993-08-15', 'Anh', 1, 'Portsmouth', '1531574199chamberlain.png', NULL),
(11, 'fabinho', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Fabinho', 'cauthu', 'fabinho@gmail.com', '1993-10-23', 'Brazil', 1, 'Brazil', '1531574385fabinho.png', NULL),
(12, 'keita', '$2y$10$pe2OjM7eqfi7F5oFmEIA.e7PLpDbEj/3721f0IqPHMEJQtWyH369m', 'Naby Keita', 'cauthu', 'keita@gmail.com', '1995-02-10', 'Guinea', 1, 'Guinea', '1531574603keita.png', 'lwgelb5WcupSNlWT7f8VbJAm3UvmxzDq8PXasUEmk6v0InQ7Ek5CNZ5f2vMt'),
(13, 'salah', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Mohamed Salah', 'cauthu', 'salah@gmail.com', '1992-06-15', 'Ai Cập', 1, 'Nagrig', 'Players_Home4.png', NULL),
(14, 'mane', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Sadio Mané', 'cauthu', 'mane@gmail.com', '1992-04-10', 'Senegal', 1, 'Sédhiou', '1531574815mane.png', NULL),
(15, 'mignolet', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Simon Mignolet', 'cauthu', 'mignolet@gmail.com', '1988-03-06', 'Bỉ', 1, 'Sint Truiden', '1531571553mignolet.png', NULL),
(16, 'wijnaldum', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Geo Wijnaldum', 'cauthu', 'wijnaldum@gmail.com', '1990-11-11', 'Hà Lan', 1, 'Rotterdam', '1531575134wijnaldum.png', NULL),
(17, 'solanke', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Dominic Solanke', 'cauthu', 'solanke@gmail.com', '1997-09-14', 'Anh', 1, 'Basingstoke', '1531575347solanke.png', NULL),
(18, 'shaqiri', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Xherdan Shaqiri', 'cauthu', 'shaqiri@gmail.com', '1991-10-10', 'Thụy Sĩ', 1, 'Gjiilan', '1531575511shariqi.png', NULL),
(19, 'anhkhoa', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Vương Anh Khoa', 'admin', 'vuonganhkhoa96@gmail.com', '1996-11-07', 'Việt Nam', 0, 'Ho Chi Minh', '1531575671img1.png', NULL),
(20, 'arnold', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Trent Alexander Arnold', 'cauthu', 'arnold@gmail.com', '1998-10-07', 'Anh', 1, 'liverpool', '1531575858arnold.png', NULL),
(21, 'klopp', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Jürgen Klopp', 'huanluyenvien', 'klopp@gmail.com', '1967-06-16', 'Đức', 0, 'Stuttgart', '1530501889manager.png', '5j6UJngu4dckTyAmkzmxdt285tDl8EZ4p3PMk42Z6uCnrJFMBzlLGZsU29lp'),
(22, 'nhanvienyte', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Nabil Fekir', 'nhanvienyte', 'nhanvienyte@gmail.com', '1967-09-08', 'Anh', 0, 'London', '153157648915314978143ad4c3d79cd7d16daff312baadcbbc71d6630c12.jpeg', NULL),
(23, 'matip', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Joel Matip', 'cauthu', 'matip@gmail.com', '1991-08-08', 'Cameroon', 1, 'Bochum', '1531576215matip.png', NULL),
(24, 'firmino', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Roberto Firmino', 'cauthu', 'firmino@gmail.com', '1991-10-02', 'Brazil', 1, 'alagoas', '1531576659firmino.png', NULL),
(25, 'stu', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Daniel Sturridge', 'cauthu', 'stu@gmail.com', '1989-09-01', 'Anh', 1, 'Birmingham', '1531576798stu.png', NULL),
(26, 'moreno', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Alberto Moreno', 'cauthu', 'moreno@gmail.com', '1992-07-05', 'Spain', 1, 'Sevilla', '1531577253moreno.png', NULL),
(27, 'klavan', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Ragnar Klavan', 'cauthu', 'klavan@gmail.com', '1985-10-30', 'Estonia', 1, 'Estonia', '1531577505klavan.png', NULL),
(28, 'gru', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Marko Grujic', 'cauthu', 'gru@gmail.com', '1996-04-13', 'Serbia', 1, 'Serbia', '1531577714gru.png', NULL),
(29, 'ings', '$2y$10$zHhfOWw9cvnNB7OKBak2keXFw5n0tmjVwHR2Da9ieZ3ew4pqKnJJq', 'Danny Ings', 'cauthu', 'ings@gmail.com', '1992-07-23', 'Anh', 1, 'Liverpool', '1531577862ings.png', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phacdodieutri`
--

DROP TABLE IF EXISTS `phacdodieutri`;
CREATE TABLE IF NOT EXISTS `phacdodieutri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TrinhTuThucHien` text COLLATE utf8_unicode_ci,
  `TienDoHoiPhuc` tinyint(3) DEFAULT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phacdodieutri`
--

INSERT INTO `phacdodieutri` (`id`, `TrinhTuThucHien`, `TienDoHoiPhuc`, `GhiChu`) VALUES
(1, '1. Khám tổng quát\r\n2. Chụp X-Ray\r\n3. Phẩu thuật\r\n4. Uống Cacain', 1, NULL),
(2, 'Thuốc Anileneu 50mg', NULL, NULL),
(3, '1. Khám tổng quát\r\n2. Chích Aquafina', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongdo`
--

DROP TABLE IF EXISTS `phongdo`;
CREATE TABLE IF NOT EXISTS `phongdo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ChiSoPhongDo` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongdo`
--

INSERT INTO `phongdo` (`id`, `ChiSoPhongDo`) VALUES
(1, 5),
(2, 4),
(3, 3),
(4, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongdo_cauthu`
--

DROP TABLE IF EXISTS `phongdo_cauthu`;
CREATE TABLE IF NOT EXISTS `phongdo_cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauThu` int(11) NOT NULL,
  `idPhongDo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idPhongDo` (`idPhongDo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phongdo_cauthu`
--

INSERT INTO `phongdo_cauthu` (`id`, `idCauThu`, `idPhongDo`) VALUES
(1, 1, 1),
(2, 2, 4),
(3, 3, 1),
(4, 4, 4),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 2),
(9, 9, 4),
(10, 10, 3),
(11, 11, 4),
(12, 12, 2),
(13, 13, 2),
(14, 14, 3),
(15, 15, 4),
(16, 16, 1),
(17, 17, 3),
(19, 19, 2),
(20, 20, 2),
(21, 21, 3),
(22, 22, 3),
(23, 23, 3),
(24, 24, 3),
(25, 25, 3),
(26, 26, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtichcauthu`
--

DROP TABLE IF EXISTS `thanhtichcauthu`;
CREATE TABLE IF NOT EXISTS `thanhtichcauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DiemSo` float(10,1) DEFAULT NULL,
  `SoDuongChuyen` int(11) DEFAULT NULL,
  `ChuyenThanhCong` int(11) DEFAULT NULL,
  `SoKienTao` int(5) DEFAULT NULL,
  `SoLanSut` int(5) DEFAULT NULL,
  `SoBanThang` int(5) DEFAULT NULL,
  `SoTranGiuSachLuoi` int(5) DEFAULT NULL,
  `SoLanCanPha` int(5) DEFAULT NULL,
  `TheVang` int(5) DEFAULT NULL,
  `TheDo` int(5) DEFAULT NULL,
  `idCauThu` int(11) NOT NULL,
  `idTranDau` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idTranDau` (`idTranDau`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtichcauthu`
--

INSERT INTO `thanhtichcauthu` (`id`, `DiemSo`, `SoDuongChuyen`, `ChuyenThanhCong`, `SoKienTao`, `SoLanSut`, `SoBanThang`, `SoTranGiuSachLuoi`, `SoLanCanPha`, `TheVang`, `TheDo`, `idCauThu`, `idTranDau`) VALUES
(10, 6.6, 25, 25, 0, 1, 0, 1, 6, 0, 0, 14, 9),
(11, 6.3, 16, 16, 0, 1, 0, 1, 3, 0, 0, 19, 9),
(12, 7.0, 16, 16, 1, 2, 0, 1, 7, 0, 0, 3, 9),
(13, 4.9, 15, 10, 0, 0, 0, 1, 1, 0, 0, 20, 9),
(14, 5.1, 13, 13, 0, 0, 0, 1, 1, 0, 0, 6, 9),
(15, 6.6, 21, 20, 0, 4, 0, 1, 3, 0, 1, 10, 9),
(16, 5.2, 12, 12, 0, 3, 0, 1, 0, 0, 0, 9, 9),
(17, 6.5, 29, 29, 0, 1, 0, 1, 2, 0, 0, 11, 9),
(18, 8.3, 31, 30, 1, 3, 2, 1, 1, 0, 0, 12, 9),
(19, 6.0, 21, 21, 0, 2, 0, 1, 1, 0, 0, 13, 9),
(20, 6.5, 31, 31, 0, 5, 0, 1, 1, 1, 0, 21, 9),
(21, 5.2, 13, 13, 0, 0, 0, 0, 8, 0, 0, 14, 26),
(22, 5.5, 15, 14, 0, 1, 0, 0, 4, 0, 0, 2, 26),
(23, 7.4, 19, 19, 1, 2, 1, 0, 7, 0, 0, 3, 26),
(24, 5.1, 15, 15, 0, 1, 0, 0, 3, 2, 0, 4, 26),
(25, 5.2, 17, 17, 1, 1, 0, 0, 0, 0, 0, 6, 26),
(26, 6.8, 15, 15, 0, 3, 1, 0, 4, 0, 0, 5, 26),
(27, 5.6, 31, 30, 0, 1, 0, 0, 1, 0, 0, 9, 26),
(28, 5.0, 20, 20, 0, 2, 0, 0, 0, 0, 0, 11, 26),
(29, 7.0, 21, 20, 1, 3, 1, 0, 1, 0, 0, 12, 26),
(30, 4.9, 17, 17, 0, 2, 0, 0, 0, 0, 0, 13, 26),
(31, 5.6, 16, 16, 0, 3, 0, 0, 3, 1, 0, 21, 26),
(32, 6.7, 22, 22, 0, 2, 0, 1, 6, 0, 0, 14, 36),
(33, 7.4, 33, 33, 1, 1, 0, 1, 6, 0, 0, 19, 36),
(34, 8.9, 31, 31, 2, 3, 3, 1, 13, 1, 0, 20, 36),
(35, 9.3, 29, 24, 1, 5, 5, 1, 6, 0, 0, 3, 36),
(36, 8.3, 33, 21, 1, 5, 0, 1, 5, 0, 0, 6, 36),
(37, 8.3, 31, 31, 0, 4, 1, 1, 5, 0, 0, 10, 36),
(38, 6.0, 11, 11, 0, 5, 0, 1, 1, 0, 0, 9, 36),
(39, 6.6, 32, 32, 0, 1, 0, 1, 2, 0, 0, 11, 36),
(40, 8.3, 21, 21, 2, 2, 2, 1, 1, 0, 0, 12, 36),
(41, 8.4, 33, 33, 1, 3, 1, 1, 2, 0, 0, 13, 36),
(42, 7.1, 21, 21, 0, 6, 0, 1, 2, 0, 0, 21, 36),
(43, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 14, 37),
(44, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 19, 37),
(45, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 37),
(46, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 37),
(47, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 6, 37),
(48, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 37),
(49, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 12, 37),
(50, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 37),
(51, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11, 37),
(52, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 13, 37),
(53, 2.8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 21, 37),
(54, 6.9, 20, 20, 0, 3, 0, 1, 5, 0, 0, 14, 47),
(55, 7.6, 21, 21, 2, 1, 0, 1, 3, 0, 0, 19, 47),
(56, 8.4, 31, 30, 1, 2, 1, 1, 3, 0, 0, 20, 47),
(57, 9.0, 31, 31, 1, 5, 1, 1, 5, 0, 0, 3, 47),
(58, 7.5, 31, 31, 0, 4, 0, 1, 21, 0, 0, 6, 47),
(59, 7.5, 31, 31, 0, 4, 0, 1, 4, 0, 0, 10, 47),
(60, 8.4, 34, 34, 0, 4, 2, 1, 2, 0, 0, 12, 47),
(61, 5.0, 20, 20, 0, 2, 0, 0, 0, 0, 0, 11, 47),
(62, 5.3, 0, 0, 0, 4, 0, 1, 3, 0, 0, 9, 47),
(63, 7.6, 45, 45, 0, 6, 0, 1, 2, 0, 0, 13, 47),
(64, 7.4, 15, 15, 0, 3, 1, 1, 3, 0, 0, 21, 47);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

DROP TABLE IF EXISTS `thongbao`;
CREATE TABLE IF NOT EXISTS `thongbao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(255) DEFAULT NULL,
  `NoiDung` text,
  `NgayThongBao` date DEFAULT NULL,
  `idNguoiGui` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idNguoiGui` (`idNguoiGui`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`id`, `TieuDe`, `NoiDung`, `NgayThongBao`, `idNguoiGui`) VALUES
(1, 'Thông báo chuyển địa điểm tập', 'Do lý do đột xuất, nên chúng ta sẽ chuyển địa điểm tập tại sân A vào ngày mai.\r\nCảm ơn các bạn đã đọc', '2018-07-05', 21),
(2, 'Thông báo kế hoạch tập luyện', 'Do phải chuẩn bị tốt nhất cho trận đấu ngày mai, nên toàn bộ các cầu thủ sẽ tập trung sớm hơn vào lúc 7:00 AM.', '2018-07-03', 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinchanthuong_cauthu`
--

DROP TABLE IF EXISTS `thongtinchanthuong_cauthu`;
CREATE TABLE IF NOT EXISTS `thongtinchanthuong_cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ngaychanthuong` date NOT NULL,
  `NgayHoiPhuc` date DEFAULT NULL,
  `TinhTrangChanThuong` tinyint(4) NOT NULL,
  `TinhTrangRaSan` tinyint(2) DEFAULT NULL,
  `idCauThu` int(11) NOT NULL,
  `idChanThuong` int(11) NOT NULL,
  `idPhacDoDieuTri` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idChanThuong` (`idChanThuong`),
  KEY `idPhacDoDieuTri` (`idPhacDoDieuTri`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinchanthuong_cauthu`
--

INSERT INTO `thongtinchanthuong_cauthu` (`id`, `ngaychanthuong`, `NgayHoiPhuc`, `TinhTrangChanThuong`, `TinhTrangRaSan`, `idCauThu`, `idChanThuong`, `idPhacDoDieuTri`) VALUES
(1, '2018-06-01', '2018-06-02', 0, 1, 1, 4, 2),
(2, '2018-06-08', NULL, 1, 0, 1, 1, 1),
(3, '2018-06-01', '2018-07-10', 1, 1, 5, 2, 2),
(4, '2018-06-03', '2018-06-07', 0, 1, 1, 4, 2),
(5, '2018-06-01', '2018-06-15', 0, 1, 1, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

DROP TABLE IF EXISTS `thuoc`;
CREATE TABLE IF NOT EXISTS `thuoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenThuoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc`
--

INSERT INTO `thuoc` (`id`, `TenThuoc`, `GhiChu`) VALUES
(1, 'Protein Powder', 'Protein Powder là protein ở dạng bột đạm, được sản xuất từ hai nguồn nguyên liệu chính là sữa bò và hạt đậu nành. Sản phẩm này hỗ trợ tốt cho các VĐV thể thao, đặc biệt là các VĐV thể hình để tăng cơ bắp. Protein Powder cũng có thể dùng để tăng cường sức khỏe cho những người già yếu'),
(2, 'Fish Oil', 'Tác dụng của dầu cá là hỗ trợ tuần hoàn, bảo vệ tim mạch, ngăn ngừa các bệnh tim mạch, cao huyết áp, xơ vữa động mạch, nhồi máu cơ tim. Đối với các vận động viên và người tập thể thao, dầu cá không chỉ giúp cơ thể đối phó với chấn thương, sưng, viêm, mà nó còn giúp bôi trơn các khớp xương'),
(3, 'Creatine', 'Creatine là một hợp chất cung cấp năng lượng cho cơ bắp, rất tốt cho các VĐV thể thao. Với hợp chất này, hệ thống năng lượng Creatine phosphate trong cơ thể được tăng cường, giúp thời gian tập luyện được lâu hơn. Mặt khác, Creatin còn có khả năng khai thác nguồn năng lượng bùng nổ vào thời điểm quan trọng của tập luyện và thi đấu'),
(4, 'BCAA', 'BCAA (Branched Chain Amino Acids) là các khối protein, rất cần thiết cho cơ thể, được xếp vào danh sách các acid amino thiết yếu. BCAA có công dụng bổ trợ rất tốt cho các VĐV, đặc biệt là VĐV thể hình'),
(5, 'Vitamin D', 'Vitamin D đóng vai trò rất lớn trong việc hấp thu canxi, giúp xương mạnh. Ngoài ra, Vitamin D làm tăng canxi máu, tăng phospho máu, tăng thải canxi niệu. Ở điều kiện bình, cơ thể có thể tự tổng hợp Vitamin D nhờ da dưới tác dụng của ánh nắng mặt trời'),
(6, 'Coconut Oil', 'Dầu dừa nguyên chất có các khoáng chất quan trọng và một số vitamin tan trong chất béo như canxi, magiê, beta-carotene, vitamin A, D, E, K mà cơ thể có thể hấp thụ. Các vi lượng trong dầu dừa còn có tác dụng giúp ích cho sức khỏe của con người');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` text,
  `TomTat` text,
  `NoiDung` longtext,
  `Hinh` varchar(255) DEFAULT NULL,
  `NgayDang` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TomTat`, `NoiDung`, `Hinh`, `NgayDang`) VALUES
(2, 'Ba Lan không chỉ có Lewandowski', '<p>&quot;Lewan l&agrave; thủ lĩnh t&agrave;i năng v&agrave; l&agrave; một trong những cầu thủ xuất sắc nhất thế giới nhưng c&aacute;c cầu thủ c&ograve;n lại của ch&uacute;ng t&ocirc;i cũng rất đ&aacute;ng gờm.&quot; HLV Ba Lan ph&aacute;t biểu.</p>', '<p>Ai cũng biết Robert Lewandowski l&agrave; c&acirc;y săn b&agrave;n h&agrave;ng đầu Ch&acirc;u &Acirc;u trong những năm gần đ&acirc;y n&ecirc;n khi nh&igrave;n v&agrave;o đội tuyển&nbsp;<a href=\"http://www.bongda.com.vn/Ba+Lan-search/\" target=\"_blank\">Ba Lan</a>, người h&acirc;m mộ chỉ thấy anh l&agrave; cầu thủ nổi bật nhất. HLV Nawalka đ&atilde; cố gắng k&eacute;o sự ch&uacute; &yacute; của mọi người bớt khỏi cầu thủ n&agrave;y, &ocirc;ng cho rằng&nbsp;<strong>&lsquo;Đại b&agrave;ng trắng&rsquo; c&ograve;n rất nhiều cầu thủ đ&aacute;ng gờm kh&aacute;c</strong>.</p>\r\n\r\n<p><img alt=\"Ba Lan không chỉ có Lewandowski - Bóng Đá\" src=\"http://media.bongda.com.vn/files/hoanghai.nguyen/2018/06/19/glik-1-1653.jpg\" style=\"height:365px; width:648px\" /></p>\r\n\r\n<h2>&nbsp;Glik l&agrave; chốt chặn đ&aacute;ng tin cậy ở h&agrave;ng ph&ograve;ng ngự.</h2>\r\n\r\n<p>Sự chuẩn bị của Ba Lan trước&nbsp;<a href=\"http://www.bongda.com.vn/22h00-ngay-19-06-ba-lan-vs-senegal-ki-thuat-dau-suc-manh-d450759.html\" target=\"_blank\">trận đấu gặp Senegal</a>&nbsp;đang rất su&ocirc;n sẻ. Vấn đề duy nhất họ gặp phải l&agrave; chấn thương lưng của Kamil Glik &ndash; hậu vệ tốt nhất của họ trong l&uacute;c tập luyện. Nhiều khả năng trung vệ của Monaco sẽ vắng mặt trong trận tranh t&agrave;i n&agrave;y nhưng HLV của Ba Lan cho rằng anh sẽ kịp b&igrave;nh phục.</p>\r\n\r\n<p><a href=\"http://www.bongda.com.vn/truoc-dai-chien-ba-lan-thuyen-truong-senegal-tang-tro-cung-len-tan-may-xanh-d450800.html\">Trước đại chiến Ba Lan, thuyền trưởng Senegal t&acirc;ng tr&ograve; cưng l&ecirc;n tận m&acirc;y xanh</a></p>\r\n\r\n<p><a href=\"http://www.bongda.com.vn/22h00-ngay-19-06-ba-lan-vs-senegal-ki-thuat-dau-suc-manh-d450759.html\">22h00 ng&agrave;y 19/06, Ba Lan vs Senegal: Kĩ thuật đấu sức mạnh</a></p>\r\n\r\n<p>Ngo&agrave;i ra ở h&agrave;ng ph&ograve;ng ngự họ cũng c&oacute; sự g&oacute;p mặt của Łukasz Piszczek (Dortmund), hậu vệ c&aacute;nh phải vẫn giữ được phong độ tốt của m&igrave;nh từ khi gia nhập đội b&oacute;ng của Đức từ năm 2010. Sự chắc chắn trong ph&ograve;ng ngự của anh đ&atilde; khiến CLB n&agrave;y&nbsp;k&iacute; hợp đồng với&nbsp;anh tới 2020.</p>\r\n\r\n<p><img alt=\"Ba Lan không chỉ có Lewandowski - Bóng Đá\" src=\"http://media.bongda.com.vn/files/hoanghai.nguyen/2018/06/19/skysports-poland-arsenal_4323563-1654.jpg\" style=\"height:432px; width:768px\" /></p>\r\n\r\n<h2>&nbsp;Ba Lan c&oacute; hai thủ m&ocirc;n giỏi l&agrave; Szczesny v&agrave;&nbsp;Fabianski.</h2>\r\n\r\n<p>Trước khung th&agrave;nh, Ba Lan sở hữu kh&ocirc;ng chỉ một hay hai thủ m&ocirc;n rất xuất sắc l&agrave; Fabianski (Swansea) v&agrave; Szczesny (Juventus). Fabianski đ&atilde; c&oacute; một m&agrave;n tr&igrave;nh diễn rất ấn tượng ở Premier League m&ugrave;a giải qua d&ugrave; CLB của anh xuống hạng. Kh&ocirc;ng thủ th&agrave;nh n&agrave;o c&oacute; số lần cứu thua nhiều hơn anh (137).<br />\r\nTrong khi người g&aacute;c đền của Juve cũng c&oacute; tới 14/20 trận ở mọi giải đấu giữ sạch lưới cho CLB m&igrave;nh d&ugrave; phải chia sẻ vị tr&iacute; với Gianluigi Buffon.</p>\r\n\r\n<p>Ở h&agrave;ng tiền vệ, Jakub Blaszczykowski (Wolfburg) sẽ c&oacute; lần thứ 100 kho&aacute;c &aacute;o đội tuyển quốc gia. Tuy m&ugrave;a giải qua cầu thủ n&agrave;y rất hiếm khi được ra s&acirc;n ở CLB nhưng Ba Lan vẫn rất cần kinh nghiệm qu&iacute; b&aacute;u của anh.</p>\r\n\r\n<p><img alt=\"Ba Lan không chỉ có Lewandowski - Bóng Đá\" src=\"http://media.bongda.com.vn/files/hoanghai.nguyen/2018/06/19/piotr-zielinski-controls-the-ball-during-the-international-friendly-match-1655.jpg\" style=\"height:409px; width:615px\" /></p>\r\n\r\n<h2>&nbsp;Piotr Zielinski đang được Liverpool r&aacute;o riết săn đ&oacute;n.</h2>\r\n\r\n<p>Hỗ trợ cho&nbsp;<a href=\"http://www.bongda.com.vn/Lewandowski-search/\" target=\"_blank\">Lewandowski</a>&nbsp;ở h&agrave;ng c&ocirc;ng sẽ l&agrave; cầu thủ Piotr Zielinski của Napoli. Cầu thủ 24 tuổi người Ba Lan l&agrave; một mẫu tiền vệ tuyệt vời. Anh được xem l&agrave; thủ lĩnh của&nbsp;tuyến giữa&nbsp;khi thể hiện được lối chơi s&aacute;ng tạo v&agrave; hỗ trợ đồng đội hết m&igrave;nh. Hiện Zielinski đang được Liverpool li&ecirc;n hệ.</p>\r\n\r\n<p>V&agrave; nếu Ba Lan cần một người s&aacute;t c&aacute;nh cạnh tiền đạo Bayern Munich th&igrave; đ&atilde; c&oacute; trung phong Arkadiusz Milik. Trong m&ugrave;a giải qua ở Napoli, Milik lại gặp v&ocirc; v&agrave;n kh&oacute; khăn v&igrave; chấn thương nhưng nếu đ&aacute; đ&uacute;ng phong độ của m&igrave;nh anh sẽ rất đ&aacute;ng sợ với khả năng dứt điểm cực tốt của m&igrave;nh.</p>', '1529412091piotr-zielinski-controls-the-ball-during-the-international-friendly-match-1655.jpg', '2018-06-19'),
(3, 'World Cup 2018 là một giải đấu kì lạ!', '<p>Giải đấu b&oacute;ng đ&aacute; lớn nhất năm nay mới chỉ chưa đi hết một v&ograve;ng đấu đầu ti&ecirc;n, nhưng c&oacute; vẻ n&oacute; đ&atilde; đem đến cho nhiều người sự bất ngờ kh&ocirc;ng thể tả.</p>', '<p>Hệ thống ph&acirc;n cấp ở&nbsp;c&aacute;c giải đấu b&oacute;ng đ&aacute;&nbsp;vẫn thường được ban tổ chức giải đấu quyết định khi đưa ra 4 nh&oacute;m kh&aacute;c nhau, v&agrave; tr&ecirc;n thực tế, chẳng ai nghi ngờ việc&nbsp;<a href=\"http://www.bongda.com.vn/brazil-search/\" target=\"_blank\">Brazil</a>, Đức, Argentina lại c&ugrave;ng đẳng cấp với Thuỵ Sĩ, Mexico hay Iceland... N&oacute;i như vậy để ch&uacute;ng ta hiểu được tại sao giải đấu năm nay lại l&agrave; một giải đấu k&igrave; lạ.</p>\r\n\r\n<p><img alt=\"World 2018 tại nước Nga thật kì lạ! - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/06/19/sport-preview-golden-boot-1451.jpg\" style=\"height:420px; width:630px\" /></p>\r\n\r\n<h2>&nbsp;Gi&aacute; trị của 3 ng&ocirc;i sao n&agrave;y c&oacute; thể nhiều hơn cả một đội h&igrave;nh tại World Cup.</h2>\r\n\r\n<p>Trong lịch sử của c&aacute;c v&ograve;ng chung kết&nbsp;<a href=\"http://www.bongda.com.vn/world+cup+2018-search/\" target=\"_blank\">World Cup</a>, dĩ nhi&ecirc;n l&agrave; vẫn c&oacute; những bất ngờ như Hungary h&ugrave;ng mạnh vẫn bị T&acirc;y Đức đ&aacute;nh bại 3-2 ở trận chung kết năm 1954, d&ugrave; trước đ&oacute; 2 đội đ&atilde; gặp nhau ở v&ograve;ng bảng v&agrave; tỉ số khi đ&oacute; l&agrave; 8-3 cho đội b&oacute;ng của Ferenc Puskas. Nhưng nếu chỉ t&iacute;nh trong một giải đấu th&igrave; trước giờ chưa c&oacute; một k&igrave; đại hội n&agrave;o &quot;kh&oacute; hiểu&quot; như năm nay.</p>\r\n\r\n<p><a href=\"http://www.bongda.com.vn/bi-an-chan-thuong-salah-tat-ca-deu-ngo-ngang-d450855.html\">B&iacute; ẩn chấn thương Salah: Tất cả đều ngỡ ng&agrave;ng!</a></p>\r\n\r\n<p><a href=\"http://www.bongda.com.vn/thua-mexico-tuyen-duc-gian-lay-truyen-thong-d450812.html\">Thua Mexico, tuyển Đức &#39;giận lẫy&#39; truyền th&ocirc;ng</a></p>\r\n\r\n<p>M&agrave;n &quot;hạ s&aacute;t&quot; Ả Rập X&ecirc; &Uacute;t của chủ nh&agrave; Nga ho&aacute; ra lại l&agrave; một sự &quot;giả dối&quot; với con mắt người h&acirc;m mộ. Bởi nếu chỉ t&iacute;nh 8 đội tuyển được đ&aacute;nh gi&aacute; cao nhất l&agrave; Brazil,&nbsp;<a href=\"http://www.bongda.com.vn/T%C3%A2y+Ban+Nha-search/\" target=\"_blank\">T&acirc;y Ban Nha</a>, Đức, Ph&aacute;p, Anh, Bỉ, Argentina, Bồ Đ&agrave;o Nha, th&igrave; kh&ocirc;ng ai trong số n&agrave;y c&oacute; m&agrave;n tr&igrave;nh diễn qu&aacute; ấn tượng, thậm ch&iacute; họ c&ograve;n bị l&ocirc;i ra l&agrave;m tr&ograve; cười sau khi trận đấu với c&aacute;c đối thủ chiếu dưới kết th&uacute;c.</p>\r\n\r\n<p><img alt=\"World 2018 tại nước Nga thật kì lạ! - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/06/19/15292712627954-1455.jpg\" style=\"height:370px; width:629px\" /></p>\r\n\r\n<h2>&nbsp;Đ&atilde; rất l&acirc;u rồi Brazil mới phải kh&oacute; khăn trước những đội b&oacute;ng nhỏ như vậy.</h2>\r\n\r\n<p>Đội tuyển&nbsp;<a href=\"http://www.bongda.com.vn/b%E1%BB%89-search/\" target=\"_blank\">Bỉ</a>&nbsp;thắng 3-0 trước Panama nhưng ai cũng biết họ gần như bế tắc cả 45 ph&uacute;t đầu ti&ecirc;n, v&agrave; nếu kh&ocirc;ng c&oacute; Dries Mertens bỗng ngẫu hứng với c&uacute; dứt điểm tuyệt đẹp th&igrave; kh&ocirc;ng ai biết Bỉ c&oacute; thể l&agrave;m c&aacute;ch n&agrave;o m&agrave; xuy&ecirc;n ph&aacute; được h&agrave;ng ph&ograve;ng ngự của Roman Torres v&agrave; c&aacute;c đồng đội.</p>\r\n\r\n<p>Trong khi đ&oacute; Ph&aacute;p v&agrave;&nbsp;<a href=\"http://www.bongda.com.vn/5-diem-nhan-tunisia-1-2-anh-khi-var-khong-phai-la-dong-minh-d450795.html\" target=\"_blank\">Anh phải thực sự h&uacute; v&iacute;a v&igrave; đối thủ</a>, họ cần nhờ đến những t&igrave;nh huống may mắn hoặc cuối trận mới c&oacute; thể kết liễu được đối thủ. C&ograve;n Argentina v&agrave; Brazil đ&atilde; để lại một sự thất vọng c&ugrave;ng cực khi chỉ kiếm được 1 điểm trong thế trận chẳng biết chơi b&oacute;ng thế n&agrave;o.</p>\r\n\r\n<p>Thậm ch&iacute; đương kim v&ocirc; địch thế giới&nbsp;<a href=\"http://www.bongda.com.vn/%C4%91%E1%BB%A9c-search/\" target=\"_blank\">Đức</a>&nbsp;c&ograve;n &quot;chết gục&quot; trước một Mexico kh&ocirc;ng được đ&aacute;nh gi&aacute; cao. Nếu điều n&agrave;y được n&oacute;i ở trước giải đấu c&oacute; lẽ kh&ocirc;ng c&oacute; ai tin trừ người d&acirc;n Mexico. Bởi Đức kh&ocirc;ng giống với 2 &ocirc;ng lớn ở Nam Mỹ, họ lu&ocirc;n c&oacute; sự ổn định rất cao v&agrave; c&aacute;c tuyển thủ đều l&agrave; những người qu&aacute; quen thuộc với kh&aacute;n giả.</p>\r\n\r\n<p><img alt=\"World 2018 tại nước Nga thật kì lạ! - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/06/19/germany-mexico-lozano-earthquake-1459.jpg\" style=\"height:351px; width:630px\" /></p>\r\n\r\n<h2>&nbsp;Thậm ch&iacute; ĐKVĐ Đức c&ograve;n thất bại &ecirc; chề trước Mexico, điều chưa bao giờ xảy ra trước đ&oacute;.</h2>\r\n\r\n<p>Những kết quả bất ngờ n&agrave;y đ&atilde; cho thấy, kh&ocirc;ng phải c&aacute;c đội b&oacute;ng lớn đ&atilde; yếu đi m&agrave; do những kẻ &quot;l&oacute;t đường&quot; đ&atilde; lột x&aacute;c với c&aacute;ch l&agrave;m b&oacute;ng đ&aacute; trong nhiều năm qua. Giờ đ&acirc;y World Cup c&oacute; vẻ tương đồng với giải Ngoại hạng Anh, khi m&agrave; bất cứ đội b&oacute;ng n&agrave;o cũng c&oacute; thể bị đ&aacute;nh bại hoặc cầm ch&acirc;n bởi những c&aacute;i t&ecirc;n m&agrave; kh&ocirc;ng ai d&aacute;m nghĩ họ sẽ l&agrave;m được.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i, đ&acirc;y l&agrave; một t&iacute;n hiệu đ&aacute;ng mừng với sự ph&aacute;t triển chung của m&ocirc;n thể thao n&agrave;y. Những đội b&oacute;ng nhỏ đ&atilde; thực sự đi đ&uacute;ng hướng trong kế hoạch ph&aacute;t triển kỹ năng chuy&ecirc;n m&ocirc;n. v&agrave; như vậy sự cạnh tranh cũng sẽ được đưa l&ecirc;n một tầm mới. C&aacute;c giải đấu sẽ kh&ocirc;ng c&ograve;n l&agrave; cuộc chơi ri&ecirc;ng của những đội b&oacute;ng quen thuộc với kh&aacute;n giả m&agrave; sẽ trải đều cơ hội cho tất cả những th&agrave;nh vi&ecirc;n kh&aacute;c.</p>\r\n\r\n<p><img alt=\"World 2018 tại nước Nga thật kì lạ! - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/06/19/iceland-team-1502.jpg\" style=\"height:419px; width:630px\" /></p>\r\n\r\n<h2>&nbsp;Trước đ&oacute; kh&ocirc;ng nhiều người để &yacute; đến đội tuyển Iceland.</h2>\r\n\r\n<p>Th&ecirc;m nữa, b&oacute;ng đ&aacute; ph&aacute;t triển ở một khu vực nhất định n&agrave;o đ&oacute; cũng k&eacute;o theo người h&acirc;m mộ, v&agrave; d&acirc;n tr&iacute; từ đ&oacute; cũng sẽ được tăng l&ecirc;n, &iacute;t nhất ở kh&iacute;a cạnh giải tr&iacute;. Ngo&agrave;i ra, c&aacute;i lợi của b&oacute;ng đ&aacute; về những sự ph&acirc;n biệt sắc tộc hay quan điểm ch&iacute;nh trị c&oacute; khi cũng sẽ dung ho&agrave; với m&ocirc;n thể thao n&agrave;y với người h&acirc;m mộ.</p>\r\n\r\n<p><strong>World Cup 2018 l&agrave; một giải đấu k&igrave; lạ</strong>&nbsp;nhưng n&oacute; lại mang đến một điều t&iacute;ch cực lớn lao cho sự ph&aacute;t triển chung của b&oacute;ng đ&aacute;. Trước mắt ch&uacute;ng ta vẫn c&ograve;n rất nhiều trận đấu hấp dẫn, v&agrave; h&atilde;y c&ugrave;ng thưởng thức trọn vẹn để thấy được sự cuốn h&uacute;t của n&oacute;!</p>', '1529412303iceland-team-1502.jpg', '2018-06-19'),
(4, 'Liverpool chơi tất tay, phá kỷ lục chuyển nhượng 158 triệu bảng', '<p>Trước sự cạnh tranh của Chelsea, Liverpool buộc phải nhanh ch&oacute;ng ho&agrave;n tất mục ti&ecirc;u chuyển nhượng m&agrave; họ theo đuổi suốt m&ugrave;a H&egrave; năm nay.</p>', '<p>Sau thất bại ở trận chung kết Champions League, HLV Jurgen Klopp muốn tăng cường lực lượng để trở lại mạnh mẽ hơn. Ch&iacute;nh v&igrave; thế,&nbsp;Liverpool&nbsp;nhanh ch&oacute;ng&nbsp;c&ocirc;ng bố thương vụ Fabinho đến từ AS Monaco với gi&aacute; 44 triệu bảng. Tuy nhi&ecirc;n, bất nhi&ecirc;u th&ocirc;i l&agrave; chưa đủ để l&agrave;m h&agrave;i l&ograve;ng HLV Jurgen Klopp.</p>\r\n\r\n<p><img alt=\"SỐC: Liverpool chơi tất tay, giật thương vụ 158 triệu bảng - Bóng Đá\" src=\"http://media.bongda.com.vn/files/hai.phan/2018/06/25/asasas-2319.jpg\" style=\"height:525px; width:787px\" /></p>\r\n\r\n<p>Theo đ&oacute;, &ocirc;ng đ&atilde; c&oacute; &yacute; định mang Nabil Fekir về s&acirc;n Anfield nhưng thương vụ n&agrave;y đ&atilde; thất bại. Ngay lập tức,&nbsp;<strong>The Kop chuyển hướng sang t&agrave;i năng trẻ đang đ&aacute; ng&agrave;y c&agrave;ng l&ecirc;n ch&acirc;n của Real Madrid, Marco Asensio.</strong></p>\r\n\r\n<p>Để thuyết phục Real Madrid ngồi v&agrave;o b&agrave;n đ&agrave;m ph&aacute;n, b&aacute;o ch&iacute; T&acirc;y Ban Nha loan tin, Liverpool đ&atilde; đưa ra lời đề nghị trị gi&aacute; 158 triệu bảng, qua đ&oacute; c&oacute; thể ph&aacute; kỷ lục chuyển nhượng của CLB do&nbsp;Virgil van Dijk đang nắm giữ với gi&aacute; 75 triệu bảng.</p>\r\n\r\n<p>Lợi thế cho Liverpool l&agrave; Real Madrid cũng đang rất cần tiền để bổ sung lực lượng khi m&agrave; Cristiano Ronaldo đ&atilde; c&oacute; dấu hiệu tuổi t&aacute;c, c&ograve;n tương lai Gareth Bale th&igrave; bất định. Chưa kể, Liverpool cũng muốn sớm ho&agrave;n tất thương vụ n&agrave;y trước sự d&ograve;m ng&oacute; từ ph&iacute;a Liverpool.</p>', '1530078005gettyimages-983819216.jpg', '2018-06-27'),
(5, 'Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool', '<p>Tiền vệ t&acirc;n binh người Brazil đ&atilde; c&oacute; m&agrave;n ra mắt đội b&oacute;ng ho&agrave;n hảo với chiến thắng 7-0 trong trận giao hữu tiền m&ugrave;a giải.</p>', '<p style=\"text-align:justify\">Như đ&atilde; biết, đội chủ s&acirc;n Anfield đ&atilde; nhanh ch&oacute;ng ho&agrave;n tất bản hợp đồng bom tấn từ AS Monaco chỉ 2 ng&agrave;y sau thất bại trước Real Madrid trong trận chung kết Champions League 2018.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Tiền vệ ng&ocirc;i sao Fabinho&nbsp;ng&agrave;y h&ocirc;m qua đ&atilde; ch&iacute;nh thức kho&aacute;c &aacute;o c&acirc;u lạc bộ v&agrave; ra s&acirc;n trong trận giao hữu m&agrave; họ gi&agrave;nh chiến thắng đậm đ&agrave; 7-0 trước Chester. Đ&acirc;y l&agrave; trận đấu đầu ti&ecirc;n của anh tại nước Anh v&agrave;&nbsp;<strong>c&aacute; nh&acirc;n ng&ocirc;i sao n&agrave;y đ&atilde; c&oacute; những phản ứng về trải nghiệm đầu ti&ecirc;n tại đ&acirc;y tr&ecirc;n mạng x&atilde; hội Twitter</strong>.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/08/36780741_504030366697096_5072897976246992896_n-1502.jpg\" style=\"height:505px; width:860px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;Trận đấu đầu ti&ecirc;n cho đội. Một sự khởi đầu tốt đẹp! Fabinho chia sẻ.</h2>\r\n\r\n<p style=\"text-align:justify\">Mặc d&ugrave; đ&atilde; chuyển đến&nbsp;<a href=\"http://www.bongda.com.vn/liverpool-search/\" target=\"_blank\">Liverpool</a>&nbsp;từ l&acirc;u, nhưng người h&acirc;m mộ đội b&oacute;ng cũ của anh ở Ph&aacute;p vẫn rất tiếc nuối. V&agrave; họ&nbsp;cũng đăng l&ecirc;n những d&ograve;ng trạng th&aacute;i đầy cảm x&uacute;c để đ&aacute;p lại những chia sẻ của Fabinho.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/08/36838693_504033436696789_8992722457584467968_n-1508.jpg\" style=\"height:184px; width:625px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;&quot;Ch&uacute;ng t&ocirc;i đang rất nhớ bạn&quot; (tiếng Ph&aacute;p), t&agrave;i khoản Piotre71 chia sẻ với những biểu tượng buồn.</h2>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/08/36802328_504033523363447_5302177465244844032_n-1508.jpg\" style=\"height:219px; width:621px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;Người kh&aacute;c lại viết: &quot;L&agrave;m ơn h&atilde;y quay lại Fabi&quot;.</h2>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/08/36788321_504033520030114_5913561807812820992_n-1508.jpg\" style=\"height:222px; width:625px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">Chung cảm x&uacute;c với c&aacute;c fan h&acirc;m mộ, Jic&eacute; viết: &quot;L&agrave;m ơn h&atilde;y về nh&agrave;&quot;.&nbsp;</h2>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/08/36825333_504033456696787_94573238532702208_n-1508.jpg\" style=\"height:422px; width:621px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">Một người kh&aacute;c chỉ đưa ra một clip ngắn về sự nhớ nhung trong t&igrave;nh y&ecirc;u.&nbsp;</h2>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Fabinho chia sẻ cảm xúc sau chiến thắng đầu tiên với Liverpool - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/08/36838721_504033550030111_636587399639465984_n-1509.jpg\" style=\"height:618px; width:620px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;T&agrave;i khoản n&agrave;y c&ograve;n lấy t&agrave;i tử Leonardo DiCaprio l&agrave;m trạng th&aacute;i của m&igrave;nh chia sẻ nỗi nhớ Fabinho.</h2>\r\n\r\n<p style=\"text-align:justify\">Phản ứng của NHM AS Monaco đ&atilde; cho thấy bản hợp đồng của HLV Jurgen Klopp thực hiện hồi đầu h&egrave; l&agrave; rất đ&aacute;ng mong đợi trong m&ugrave;a giải mới 2018-19. Fabinho c&oacute; thể sẽ ra mắt giải Ngoại hạng Anh v&agrave;o ng&agrave;y 12 th&aacute;ng 08 khi Liverpool tiếp đ&oacute;n West Ham United tr&ecirc;n s&acirc;n nh&agrave;.</p>', '1531058729maxresdefault.jpg', '2018-07-08'),
(6, 'Klopp nói gì về màn ra mắt của dàn bom tấn Liverpool', '<p>Klopp thừa nhận &ocirc;ng rất h&agrave;i l&ograve;ng với những g&igrave; m&agrave; 2 t&acirc;n binh Naby Keita v&agrave; Fabinho đ&atilde; l&agrave;m được trong trận đấu ra mắt Liverpool v&agrave;o ng&agrave;y h&ocirc;m qua.</p>', '<p style=\"text-align:justify\">Trong l&uacute;c sự ch&uacute; &yacute; từ giới mộ điệu được dồn về World Cup 2018, th&igrave; Liverpool đ&atilde; c&oacute; trận đấu giao hữu khởi động đầu ti&ecirc;n cho m&ugrave;a H&egrave; năm nay với chiến thắng 7-0 trước CLB địa phương Chester.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Klopp nói gì về màn ra mắt của dàn bom tấn Liverpool? - Bóng Đá\" src=\"http://media.bongda.com.vn/files/anh.vu/2018/07/08/3a_1-1521.jpg\" style=\"height:461px; width:860px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;2 tiền vệ t&acirc;n binh của Liverpool đều đ&atilde; c&oacute; trận đấu ra mắt v&agrave;o h&ocirc;m qua</h2>\r\n\r\n<p style=\"text-align:justify\">Trong trận đấu n&agrave;y, 2 t&acirc;n binh đang nhận được rất nhiều sự kỳ vọng từ NHM l&agrave;&nbsp;Naby Keita&nbsp;v&agrave;&nbsp;Fabinho&nbsp;đều đ&atilde; ra s&acirc;n thi đấu. Cụ thể nếu Fabinho g&oacute;p mặt ngay từ đầu, th&igrave; Keita chỉ c&oacute; mặt tr&ecirc;n s&acirc;n sau khi Klopp thay hẳn một đội h&igrave;nh mới trong hiệp 2.</p>\r\n\r\n<p style=\"text-align:justify\">N&oacute;i về m&agrave;n tr&igrave;nh diễn của bộ đ&ocirc;i tiền vệ trung t&acirc;m n&agrave;y, vị chiến lược gia người Đức đ&atilde; cho biết:&nbsp;<em>&quot;Nếu bạn kh&ocirc;ng n&oacute;i được ng&ocirc;n ngữ chung với to&agrave;n đội, mọi chuyện sẽ trở n&ecirc;n kh&ocirc;ng hề dễ d&agrave;ng trong tuần đầu ti&ecirc;n, nhưng tất cả đều ổn.&rdquo;</em></p>\r\n\r\n<p style=\"text-align:justify\"><em>&ldquo;Fabinho sẽ cần th&ecirc;m một ch&uacute;t thời gian để th&iacute;ch nghi. Naby đ&atilde; cảm thấy tốt hơn trong hiệp đấu thứ 2. Ch&uacute;ng t&ocirc;i biết r&otilde; khả năng của họ.&nbsp;<strong>Họ sẽ c&oacute; th&ecirc;m 2-3 trận đấu nữa, v&agrave; khi đ&oacute; ch&uacute;ng ta sẽ thấy được 2 cầu thủ n&agrave;y c&oacute; thể l&agrave;m được những g&igrave;</strong>.&rdquo;</em></p>\r\n\r\n<p style=\"text-align:justify\"><em>&ldquo;Naby đến từ Leipzig, đội b&oacute;ng c&oacute; lối chơi kh&aacute; tương đồng với Liverpool. Cậu ấy rất sắc b&eacute;n v&agrave; c&oacute; m&agrave;n thể hiện tốt, suy nghĩ nhanh v&agrave; biết phải l&agrave;m g&igrave; trong những t&igrave;nh huống phản c&ocirc;ng, pressing, nh&atilde;n quan chiến thuật.&quot;</em></p>\r\n\r\n<p style=\"text-align:justify\"><em>&quot;C&ograve;n Monaco c&oacute; một phong c&aacute;ch ho&agrave;n to&agrave;n kh&aacute;c, do đ&oacute; Fabinho sẽ cần th&ecirc;m thời gian. C&oacute; điều một điều kh&ocirc;ng cần b&agrave;n c&atilde;i đ&oacute; l&agrave; cậu ấy l&agrave; một ch&acirc;n chuyền chất lượng, cậu ấy rất đa năng v&agrave; c&oacute; thể chơi nhiều vị tr&iacute;.&rdquo;</em></p>', '15310588363a_1-1521.jpg', '2018-07-08'),
(7, 'Xherdan Shaqiri sẽ chơi ở đâu trong đội hình của Liverpool', '<p>Sẽ l&agrave; một b&agrave;i to&aacute;n kh&oacute; d&agrave;nh cho huấn luyện vi&ecirc;n Jurgen Klopp trong việc bố tr&iacute; ng&ocirc;i sao người Thuỵ Sĩ chơi b&oacute;ng trong tư duy chiến thuật của &ocirc;ng.</p>', '<p style=\"text-align:justify\">Tiền vệ sinh năm 1991 l&agrave; một mẫu cầu thủ s&aacute;ng tạo,&nbsp;<strong>anh c&oacute; thể chơi được ở vị tr&iacute; tiền đạo c&aacute;nh phải hoặc hộ c&ocirc;ng trong sơ đồ 4-2-3-1 của chiến lược gia người Đức</strong>. Nhưng khi nh&igrave;n v&agrave;o những nh&acirc;n tố tr&ecirc;n h&agrave;ng c&ocirc;ng của đội b&oacute;ng n&agrave;y, nhiều người sẽ hiểu rằng anh chỉ c&oacute; thể chơi ở vị tr&iacute; &#39;số 10&#39; v&igrave; Mohamed Salah sẽ lu&ocirc;n được &#39;bi&ecirc;n chế&#39; ở vị tr&iacute; c&aacute;nh phải.</p>\r\n\r\n<p style=\"text-align:justify\">Kể từ khi Philippe Coutinho ra đi, HLV Klopp đ&atilde; kh&ocirc;ng c&ograve;n ai c&oacute; thể khoả lấp được những g&igrave; anh để lại ph&iacute;a sau Roberto Firmino, nhưng sự xuất hiện của Shaqiri hiện tại c&oacute; thể khiến hệ thống chiến thuật của đội b&oacute;ng &aacute;o đỏ gặp một số vấn đề.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Xherdan Shaqiri sẽ chơi ở đâu trong đội hình của Liverpool? - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/14/thumb_67960_default_news_size_5-1440.jpeg\" style=\"height:516px; width:860px\" /></p>\r\n\r\n<h2 style=\"text-align:center\">&nbsp;Liverpool sẽ c&oacute; nhiều việc phải l&agrave;m để ph&aacute;t huy hết sức s&aacute;ng tạo của Shaqiri.</h2>\r\n\r\n<p style=\"text-align:justify\">Nửa sau m&ugrave;a giải vừa qua l&agrave; khoảng thời gian&nbsp;Liverpool&nbsp;đ&atilde; kh&ocirc;ng c&ograve;n chơi với sơ đồ 4-2-3-1 quen thuộc m&agrave; họ đ&atilde; chuyển sang phong c&aacute;ch 4-3-3 c&acirc;n bằng hơn. Đ&oacute; l&agrave; cũng hệ quả từ sự xuất hiện của Alex Oxlade-Chamberlain, người đ&atilde; kết hợp với Jordan Henderson v&agrave; James Milner để tạo ra bộ 3 ở khu vực trung tuyến của The Kop. V&agrave; dự bị cho họ l&agrave;&nbsp;Georginio Wijnaldum c&ugrave;ng với Adam Lallana.</p>\r\n\r\n<p style=\"text-align:justify\">Thế nhưng, chấn thương nghi&ecirc;m trọng của cựu tiền vệ Arsenal đ&atilde; khiến ban l&atilde;nh đạo Liverpool phải tức tốc mang về những sự bổ sung mới cho h&agrave;ng tiền vệ. Naby Keita đ&atilde; c&oacute; mặt từ trước v&agrave; Fabinho l&agrave; c&aacute;i t&ecirc;n đến sau, nhưng bộ đ&ocirc;i n&agrave;y vẫn được hiểu l&agrave; những tấm khi&ecirc;n chắn ph&iacute;a trước h&agrave;ng ph&ograve;ng ngự của đội b&oacute;ng.</p>\r\n\r\n<p style=\"text-align:justify\">Mặc d&ugrave; vậy, sự đa năng của Fabinho c&oacute; thể đem đến cho Klopp nhiều sự lựa chọn chiến thuật. &Ocirc;ng c&oacute; thể bố tr&iacute; Keita v&agrave; Fabinho chơi như 2 tiền vệ ph&ograve;ng ngự, ph&iacute;a tr&ecirc;n sẽ l&agrave; &#39;số 10&#39; Shaqiri, v&agrave; bộ 3 quen thuộc ở khu vực cấm địa đội bạn, Sadio Mane - Firmino - Salah.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Xherdan Shaqiri sẽ chơi ở đâu trong đội hình của Liverpool? - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/14/xherdan-shaqiri-1441.jpg\" style=\"height:575px; width:860px\" /></p>\r\n\r\n<h2 style=\"text-align:justify\">&nbsp;Tiền vệ người Thuỵ Sĩ c&oacute; thể chơi tốt ở vị tr&iacute; hộ c&ocirc;ng của đội b&oacute;ng.</h2>\r\n\r\n<p style=\"text-align:justify\">Vấn đề c&oacute; thể nảy sinh ở đ&acirc;y l&agrave; sự li&ecirc;n kết ngược với phong c&aacute;ch của Coutinho ở vai tr&ograve; kết nối c&aacute;c tuyến. Khi được triển khai ở trung t&acirc;m, tiền vệ người Brazil c&oacute; xu hướng dạt sang c&aacute;nh tr&aacute;i để tận dụng sở trường ở c&aacute;i ch&acirc;n phải (s&uacute;t xa) của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\">Điều n&agrave;y v&ocirc; t&igrave;nh đ&atilde; khiến vai tr&ograve; của Mane cũng như Firmino bị thay đổi trong từng thời điểm của trận đấu, v&agrave; n&oacute; cũng cho ph&eacute;p c&aacute; nh&acirc;n tiền đạo người Senegal chơi tự do hơn rất nhiều để ph&aacute;t huy sở trường tốc độ của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\">Nhưng nếu ch&uacute;ng ta đặt vai tr&ograve; của Shaqiri tương tự những g&igrave; Coutinho đ&atilde; l&agrave;m, đ&oacute; l&agrave; HLV Klopp chỉ đạo anh chơi dạt bi&ecirc;n phải v&agrave; sử dụng c&aacute;i ch&acirc;n tr&aacute;i của m&igrave;nh l&agrave;m vũ kh&iacute; tung ra những c&uacute; n&atilde; đại b&aacute;c th&igrave; điều n&agrave;y kh&ocirc;ng thật sự ổn. Bởi nếu như vậy, n&oacute; sẽ c&oacute; thể can thiệp v&agrave;o c&aacute;ch chơi của Salah, một người rất th&iacute;ch &#39;rẽ tr&aacute;i&#39; để l&agrave;m điều tương tự.</p>\r\n\r\n<p style=\"text-align:justify\">Bất chấp hiệu quả c&oacute; đến hay kh&ocirc;ng ở m&ugrave;a giải mới, nhưng chắc chắn tiền đạo người Ai Cập sẽ được ưu ti&ecirc;n l&agrave;m điều đ&oacute; v&igrave; những g&igrave; anh đ&atilde; thể hiện ở m&ugrave;a trước. V&agrave; nếu&nbsp;<a href=\"http://www.bongda.com.vn/xherdan+shaqiri-search/\" target=\"_blank\">Shaqiri</a>&nbsp;ph&aacute; vỡ &#39;luật lệ&#39; n&agrave;y, c&oacute; thể sẽ l&agrave; một thất bại tổng thể của đội b&oacute;ng v&ugrave;ng Merseyside.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"Xherdan Shaqiri sẽ chơi ở đâu trong đội hình của Liverpool? - Bóng Đá\" src=\"http://media.bongda.com.vn/files/toan.vu/2018/07/14/thumb_67950_default_news_size_5-1441.jpeg\" style=\"height:516px; width:860px\" /></p>\r\n\r\n<h2 style=\"text-align:center\"><span style=\"font-size:14px\">&nbsp;Shaqiri chắc chắn kh&ocirc;ng muốn sống lại k&yacute; ức m&agrave;u đỏ thảm hại ở Bayern Munich.</span></h2>\r\n\r\n<p style=\"text-align:justify\">Vấn đề thứ 2 kh&ocirc;ng xuất ph&aacute;t từ chuy&ecirc;n m&ocirc;n nhưng c&oacute; thể sẽ khiến Shaqiri lụi t&agrave;n ở đội b&oacute;ng mới. C&aacute;ch đ&acirc;y v&agrave;i năm, tiền vệ n&agrave;y đ&atilde; phải bỏ tiền t&uacute;i ra để được rời khỏi Bayern Munich v&agrave; gia nhập Inter Milan, sau đ&oacute; l&agrave; Stoke City. Tất cả chỉ v&igrave; anh kh&ocirc;ng muốn phải ngồi nh&igrave;n c&aacute;c đồng đội thi đấu.</p>\r\n\r\n<p style=\"text-align:justify\">Nếu HLV Klopp gắn b&oacute; với sơ đồ 4-3-3 của m&igrave;nh hoặc thậm ch&iacute; t&igrave;m được một cầu thủ kh&aacute;c để chơi trong vai tr&ograve; số 10, Shaqiri chắc chắn kh&ocirc;ng c&oacute; cơ hội để cạnh tranh với Salah ở h&agrave;nh lang c&aacute;nh phải. V&agrave; đ&oacute; c&oacute; thể l&agrave; nguồn cơn của qu&aacute; khứ... khoảng thời gian m&agrave; Shaqiri kh&ocirc;ng bao giờ muốn nhớ lại.</p>\r\n\r\n<p style=\"text-align:justify\">C&aacute;i gi&aacute; m&agrave; Liverpool bỏ ra để chi&ecirc;u mộ ng&ocirc;i sao 27 tuổi n&agrave;y l&agrave; kh&ocirc;ng qu&aacute; lớn, nhưng nếu mua anh về chỉ để dự bị th&igrave; c&oacute; vẻ sẽ kh&ocirc;ng ổn cho cả đội b&oacute;ng cũng như c&aacute; nh&acirc;n Shaqiri. V&agrave; đ&acirc;y l&agrave; điều HLV Klopp cần nghĩ tới nếu muốn tận dụng hết t&agrave;i năng của cầu thủ được mệnh danh l&agrave; Messi của d&atilde;y Alpes!</p>', '1531585771shaqiri.jpeg', '2018-07-14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiso`
--

DROP TABLE IF EXISTS `tiso`;
CREATE TABLE IF NOT EXISTS `tiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauLacBo` int(11) NOT NULL,
  `idTranDau` int(11) NOT NULL,
  `idGiaiDau` int(11) NOT NULL,
  `TiSo` int(3) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauLacBo` (`idCauLacBo`),
  KEY `idTranDau` (`idTranDau`),
  KEY `idGiaiDau` (`idGiaiDau`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiso`
--

INSERT INTO `tiso` (`id`, `idCauLacBo`, `idTranDau`, `idGiaiDau`, `TiSo`, `TrangThai`) VALUES
(13, 3, 7, 4, 2, 1),
(14, 4, 7, 4, 0, -1),
(15, 5, 8, 4, 0, 0),
(16, 6, 8, 4, 0, 0),
(17, 2, 9, 4, 2, 1),
(18, 1, 9, 4, 0, -1),
(19, 7, 10, 4, 0, -1),
(20, 8, 10, 4, 1, 1),
(21, 9, 11, 4, 1, -1),
(22, 10, 11, 4, 4, 1),
(23, 11, 12, 4, 1, 0),
(24, 12, 12, 4, 1, 0),
(25, 13, 13, 4, 0, -1),
(26, 14, 13, 4, 3, 1),
(27, 15, 14, 4, 1, 0),
(28, 16, 14, 4, 1, 0),
(29, 17, 15, 4, 4, 1),
(30, 18, 15, 4, 1, -1),
(31, 19, 16, 4, 2, 1),
(32, 20, 16, 4, 0, -1),
(33, 3, 17, 4, 2, 1),
(34, 15, 17, 4, 0, -1),
(35, 16, 18, 4, 1, -1),
(36, 5, 18, 4, 2, 1),
(37, 14, 19, 4, 2, -1),
(38, 10, 19, 4, 3, 1),
(39, 6, 20, 4, 1, 1),
(40, 9, 20, 4, 0, -1),
(41, 18, 21, 4, 2, 1),
(42, 7, 21, 4, 1, -1),
(43, 13, 22, 4, 1, -1),
(44, 11, 22, 4, 2, 1),
(45, 20, 23, 4, 1, 0),
(46, 12, 23, 4, 1, 0),
(47, 17, 24, 4, 2, 0),
(48, 8, 24, 4, 2, 0),
(49, 1, 25, 4, 3, 0),
(50, 4, 25, 4, 3, 0),
(51, 2, 26, 4, 3, 1),
(52, 19, 26, 4, 1, -1),
(53, 9, 27, 4, 2, 1),
(54, 16, 27, 4, 0, -1),
(55, 5, 28, 4, 3, 1),
(56, 13, 28, 4, 2, -1),
(57, 19, 29, 4, 3, 1),
(58, 6, 29, 4, 0, -1),
(59, 15, 30, 4, 2, 0),
(60, 20, 30, 4, 2, 0),
(61, 12, 31, 4, 3, 0),
(62, 17, 31, 4, 3, 0),
(63, 8, 32, 4, 1, -1),
(64, 18, 32, 4, 3, 1),
(65, 10, 33, 4, 1, 1),
(66, 1, 33, 4, 0, -1),
(67, 4, 34, 4, 4, 1),
(68, 14, 34, 4, 0, -1),
(69, 7, 35, 4, 0, -1),
(70, 3, 35, 4, 1, 1),
(71, 11, 36, 4, 0, -1),
(72, 2, 36, 4, 1, 1),
(73, 2, 37, 4, 2, 1),
(74, 7, 37, 4, 0, -1),
(75, 1, 38, 4, 3, 1),
(76, 19, 38, 4, 0, -1),
(77, 3, 39, 4, 2, 1),
(78, 5, 39, 4, 0, -1),
(79, 20, 40, 4, 0, -1),
(80, 4, 40, 4, 4, 1),
(81, 13, 41, 4, 1, 1),
(82, 8, 41, 4, 0, -1),
(83, 17, 42, 4, 1, -1),
(84, 15, 42, 4, 2, 1),
(85, 6, 43, 4, 2, 0),
(86, 12, 43, 4, 2, 0),
(87, 14, 44, 4, 2, 0),
(88, 9, 44, 4, 2, 0),
(89, 18, 45, 4, 0, 0),
(90, 11, 45, 4, 0, 0),
(91, 16, 46, 4, 0, -1),
(92, 10, 46, 4, 2, 1),
(93, 15, 47, 4, 1, -1),
(94, 2, 47, 4, 2, 1),
(95, 11, 48, 4, 0, 0),
(96, 17, 48, 4, 0, 0),
(97, 12, 49, 4, 3, 1),
(98, 14, 49, 4, 0, -1),
(99, 7, 50, 4, 1, 0),
(100, 13, 50, 4, 1, 0),
(101, 8, 51, 4, 1, -1),
(102, 3, 51, 4, 2, 1),
(103, 10, 52, 4, 2, 1),
(104, 6, 52, 4, 1, -1),
(105, 19, 53, 4, 0, 0),
(106, 16, 53, 4, 0, 0),
(107, 4, 54, 4, 5, 1),
(108, 20, 54, 4, 0, -1),
(109, 9, 55, 4, 0, -1),
(110, 1, 55, 4, 2, 1),
(111, 18, 56, 4, 2, -1),
(112, 5, 56, 4, 3, 1),
(113, 5, 57, 4, NULL, NULL),
(114, 2, 57, 4, NULL, NULL),
(115, 4, 58, 4, NULL, NULL),
(116, 13, 58, 4, NULL, NULL),
(117, 6, 59, 4, NULL, NULL),
(118, 15, 59, 4, NULL, NULL),
(119, 16, 60, 4, NULL, NULL),
(120, 1, 60, 4, NULL, NULL),
(121, 14, 61, 4, NULL, NULL),
(122, 11, 61, 4, NULL, NULL),
(123, 10, 62, 4, NULL, NULL),
(124, 9, 62, 4, NULL, NULL),
(125, 18, 63, 4, NULL, NULL),
(126, 3, 63, 4, NULL, NULL),
(127, 20, 64, 4, NULL, NULL),
(128, 8, 64, 4, NULL, NULL),
(129, 12, 65, 4, NULL, NULL),
(130, 19, 65, 4, NULL, NULL),
(131, 17, 66, 4, NULL, NULL),
(132, 7, 66, 4, NULL, NULL),
(133, 13, 67, 4, NULL, NULL),
(134, 18, 67, 4, NULL, NULL),
(135, 3, 68, 4, NULL, NULL),
(136, 20, 68, 4, NULL, NULL),
(137, 11, 69, 4, NULL, NULL),
(138, 16, 69, 4, NULL, NULL),
(139, 15, 70, 4, NULL, NULL),
(140, 14, 70, 4, NULL, NULL),
(141, 9, 71, 4, NULL, NULL),
(142, 4, 71, 4, NULL, NULL),
(143, 2, 72, 4, NULL, NULL),
(144, 17, 72, 4, NULL, NULL),
(145, 8, 73, 4, NULL, NULL),
(146, 6, 73, 4, NULL, NULL),
(147, 7, 74, 4, NULL, NULL),
(148, 5, 74, 4, NULL, NULL),
(149, 19, 75, 4, NULL, NULL),
(150, 10, 75, 4, NULL, NULL),
(151, 1, 76, 4, NULL, NULL),
(152, 12, 76, 4, NULL, NULL),
(153, 19, 77, 4, NULL, NULL),
(154, 3, 77, 4, NULL, NULL),
(155, 14, 78, 4, NULL, NULL),
(156, 5, 78, 4, NULL, NULL),
(157, 1, 79, 4, NULL, NULL),
(158, 18, 79, 4, NULL, NULL),
(159, 20, 80, 4, NULL, NULL),
(160, 17, 80, 4, NULL, NULL),
(161, 16, 81, 4, NULL, NULL),
(162, 15, 81, 4, NULL, NULL),
(163, 4, 82, 4, NULL, NULL),
(164, 7, 82, 4, NULL, NULL),
(165, 12, 83, 4, NULL, NULL),
(166, 13, 83, 4, NULL, NULL),
(167, 10, 84, 4, NULL, NULL),
(168, 2, 84, 4, NULL, NULL),
(169, 9, 85, 4, NULL, NULL),
(170, 8, 85, 4, NULL, NULL),
(171, 6, 86, 4, NULL, NULL),
(172, 11, 86, 4, NULL, NULL),
(173, 2, 87, 4, NULL, NULL),
(174, 4, 87, 4, NULL, NULL),
(175, 8, 88, 4, NULL, NULL),
(176, 14, 88, 4, NULL, NULL),
(177, 11, 89, 4, NULL, NULL),
(178, 20, 89, 4, NULL, NULL),
(179, 13, 90, 4, NULL, NULL),
(180, 1, 90, 4, NULL, NULL),
(181, 18, 91, 4, NULL, NULL),
(182, 6, 91, 4, NULL, NULL),
(183, 15, 92, 4, NULL, NULL),
(184, 12, 92, 4, NULL, NULL),
(185, 7, 93, 4, NULL, NULL),
(186, 19, 93, 4, NULL, NULL),
(187, 3, 94, 4, NULL, NULL),
(188, 16, 94, 4, NULL, NULL),
(189, 5, 95, 4, NULL, NULL),
(190, 9, 95, 4, NULL, NULL),
(191, 17, 96, 4, NULL, NULL),
(192, 10, 96, 4, NULL, NULL),
(193, 19, 97, 4, NULL, NULL),
(194, 5, 97, 4, NULL, NULL),
(195, 16, 98, 4, NULL, NULL),
(196, 7, 98, 4, NULL, NULL),
(197, 6, 99, 4, NULL, NULL),
(198, 17, 99, 4, NULL, NULL),
(199, 9, 100, 4, NULL, NULL),
(200, 13, 100, 4, NULL, NULL),
(201, 1, 101, 4, NULL, NULL),
(202, 15, 101, 4, NULL, NULL),
(203, 20, 102, 4, NULL, NULL),
(204, 18, 102, 4, NULL, NULL),
(205, 12, 103, 4, NULL, NULL),
(206, 11, 103, 4, NULL, NULL),
(207, 10, 104, 4, NULL, NULL),
(208, 3, 104, 4, NULL, NULL),
(209, 4, 105, 4, NULL, NULL),
(210, 8, 105, 4, NULL, NULL),
(211, 14, 106, 4, NULL, NULL),
(212, 2, 106, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toathuoc`
--

DROP TABLE IF EXISTS `toathuoc`;
CREATE TABLE IF NOT EXISTS `toathuoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NgayKham` date NOT NULL,
  `NgayTaiKham` date DEFAULT NULL,
  `ChanDoan` text COLLATE utf8_unicode_ci NOT NULL,
  `idLichKham` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idLichKham` (`idLichKham`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `toathuoc`
--

INSERT INTO `toathuoc` (`id`, `NgayKham`, `NgayTaiKham`, `ChanDoan`, `idLichKham`) VALUES
(1, '2018-06-01', '2018-06-02', 'Bị đau đầu', 1),
(2, '2018-06-04', '2018-06-06', 'Bị chấn thương gân kheo', 2),
(3, '2018-06-08', '2018-06-10', 'Bị chấn thương gân kheo', 3),
(4, '2018-06-14', '2018-06-18', 'Chấn thương gân kheo', 4),
(5, '2018-06-01', '2018-06-15', 'Bị đau gót chân', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toathuoc_thuoc`
--

DROP TABLE IF EXISTS `toathuoc_thuoc`;
CREATE TABLE IF NOT EXISTS `toathuoc_thuoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idToaThuoc` int(11) NOT NULL,
  `idThuoc` int(11) NOT NULL,
  `SoLuong` int(5) DEFAULT NULL,
  `LieuLuong` text COLLATE utf8_unicode_ci,
  `GhiChu` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idToaThuoc` (`idToaThuoc`),
  KEY `idThuoc` (`idThuoc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `toathuoc_thuoc`
--

INSERT INTO `toathuoc_thuoc` (`id`, `idToaThuoc`, `idThuoc`, `SoLuong`, `LieuLuong`, `GhiChu`) VALUES
(1, 1, 1, 10, 'Uống 2 lần, mỗi lần 1 viên', NULL),
(2, 2, 3, 20, 'Uống 3 lần, mỗi lần 1 viên', NULL),
(3, 3, 3, 10, 'Uống 3 lần, mỗi lần 1 viên', NULL),
(4, 4, 3, 50, '5 lần, mỗi lần 10 viên', NULL),
(5, 4, 4, 20, '3 lần, mỗi lần 4 viên', NULL),
(6, 5, 4, 10, '2 lần, mỗi lần 2 viên', 'Uống trước khi ăn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trandau`
--

DROP TABLE IF EXISTS `trandau`;
CREATE TABLE IF NOT EXISTS `trandau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VongDau` int(11) NOT NULL,
  `NgayThiDau` date NOT NULL,
  `GioThiDau` time NOT NULL,
  `DiaDiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idDoiHinh` int(11) DEFAULT NULL,
  `idChienThuat` int(11) DEFAULT NULL,
  `TranDauCuaCLB` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idDoiHinh` (`idDoiHinh`),
  KEY `idChienThuat` (`idChienThuat`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trandau`
--

INSERT INTO `trandau` (`id`, `VongDau`, `NgayThiDau`, `GioThiDau`, `DiaDiem`, `idDoiHinh`, `idChienThuat`, `TranDauCuaCLB`) VALUES
(7, 1, '2018-06-05', '17:00:00', 'Old Trafford', NULL, NULL, 0),
(8, 1, '2018-06-05', '17:00:00', 'Wembley', NULL, NULL, 0),
(9, 1, '2018-06-05', '17:00:00', 'Anfield', 2, 2, 1),
(10, 1, '2018-06-05', '17:00:00', 'Vicarage Road', NULL, NULL, 0),
(11, 1, '2018-06-06', '17:00:00', 'Kirklees', NULL, NULL, 0),
(12, 1, '2018-06-06', '17:00:00', 'Falmer Stadium', NULL, NULL, 0),
(13, 1, '2018-06-06', '17:00:00', 'Craven Cottage', NULL, NULL, 0),
(14, 1, '2018-06-06', '17:00:00', 'King Power', NULL, NULL, 0),
(15, 1, '2018-06-06', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(16, 1, '2018-06-06', '17:00:00', 'Olympic', NULL, NULL, 0),
(17, 2, '2018-07-01', '16:00:00', 'Old Trafford', NULL, NULL, 0),
(18, 2, '2018-07-01', '18:30:00', 'St James Park', NULL, NULL, 0),
(19, 2, '2018-07-01', '18:30:00', 'Kirklees', NULL, NULL, 0),
(20, 2, '2018-07-01', '14:00:00', 'Dean Court', NULL, NULL, 0),
(21, 2, '2018-07-01', '17:00:00', 'Vicarage Road', NULL, NULL, 0),
(22, 2, '2018-07-01', '17:00:00', 'Craven Cottage', NULL, NULL, 0),
(23, 2, '2018-07-02', '17:00:00', 'Molineux', NULL, NULL, 0),
(24, 2, '2018-07-02', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(25, 2, '2018-07-02', '17:00:00', 'Emirates', NULL, NULL, 0),
(26, 2, '2018-07-02', '17:00:00', 'Anfield', 2, 2, 1),
(27, 3, '2018-07-07', '17:00:00', 'Cardiff City', NULL, NULL, 0),
(28, 3, '2018-07-07', '17:00:00', 'Wembley', NULL, NULL, 0),
(29, 3, '2018-07-07', '17:00:00', 'Olympic', NULL, NULL, 0),
(30, 3, '2018-07-07', '17:00:00', 'King Power', NULL, NULL, 0),
(31, 3, '2018-07-07', '17:00:00', 'Goodison Park', NULL, NULL, 0),
(32, 3, '2018-07-08', '17:00:00', 'Turf Moor', NULL, NULL, 0),
(33, 3, '2018-07-08', '17:00:00', 'Stamford Bridge', NULL, NULL, 0),
(34, 3, '2018-07-08', '17:00:00', 'Etihad', NULL, NULL, 0),
(35, 3, '2018-07-08', '17:00:00', 'Falmer Stadium', NULL, NULL, 0),
(36, 3, '2018-07-08', '17:00:00', 'Selhurst Park', 2, 2, 1),
(37, 4, '2018-07-12', '17:00:00', 'Anfield', 14, 3, 1),
(38, 4, '2018-07-12', '17:00:00', 'Emirates', NULL, NULL, 0),
(39, 4, '2018-07-13', '17:00:00', 'Old Trafford', NULL, NULL, 0),
(40, 4, '2018-07-13', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(41, 4, '2018-07-13', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(42, 4, '2018-07-13', '18:00:00', 'King Power', NULL, NULL, 0),
(43, 4, '2018-07-13', '17:00:00', 'Olympic', NULL, NULL, 0),
(44, 4, '2018-07-13', '17:00:00', 'Turf Moor', NULL, NULL, 0),
(45, 4, '2018-07-13', '17:00:00', 'Falmer Stadium', NULL, NULL, 0),
(46, 4, '2018-07-13', '17:00:00', 'Selhurst Park', NULL, NULL, 0),
(47, 5, '2018-07-21', '17:00:00', 'King Power', 14, 2, 1),
(48, 5, '2018-07-21', '17:00:00', 'Craven Cottage', NULL, NULL, 0),
(49, 5, '2018-07-21', '17:00:00', 'Dean Court', NULL, NULL, 0),
(50, 5, '2018-07-21', '17:00:00', 'Falmer Stadium', NULL, NULL, 0),
(51, 5, '2018-07-21', '17:00:00', 'Selhurst Park', NULL, NULL, 0),
(52, 5, '2018-07-22', '17:00:00', 'Kirklees', NULL, NULL, 0),
(53, 5, '2018-07-22', '17:00:00', 'Olympic', NULL, NULL, 0),
(54, 5, '2018-07-22', '17:00:00', 'Etihad', NULL, NULL, 0),
(55, 5, '2018-07-22', '17:00:00', 'Craven Cottage', NULL, NULL, 0),
(56, 5, '2018-07-22', '17:00:00', 'St James Park', NULL, NULL, 0),
(57, 6, '2018-07-28', '18:00:00', 'Wembley', 14, 1, 1),
(58, 6, '2018-07-28', '17:00:00', 'Kirklees', NULL, NULL, 0),
(59, 6, '2018-07-28', '17:00:00', 'Kirklees', NULL, NULL, 0),
(60, 6, '2018-07-29', '17:00:00', 'Goodison Park', NULL, NULL, 0),
(61, 6, '2018-07-29', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(62, 6, '2018-07-29', '17:00:00', 'Stamford Bridge', NULL, NULL, 0),
(63, 6, '2018-07-29', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(64, 6, '2018-07-29', '17:00:00', 'St James Park', NULL, NULL, 0),
(65, 6, '2018-07-29', '17:00:00', 'Goodison Park', NULL, NULL, 0),
(66, 6, '2018-07-29', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(67, 7, '2018-08-04', '17:00:00', 'Vicarage Road', NULL, NULL, 0),
(68, 7, '2018-08-04', '17:00:00', 'Old Trafford', NULL, NULL, 0),
(69, 7, '2018-08-05', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(70, 7, '2018-08-04', '17:00:00', 'St James Park', NULL, NULL, 0),
(71, 7, '2018-08-04', '17:00:00', 'King Power', NULL, NULL, 0),
(72, 7, '2018-08-04', '17:00:00', 'Anfield', 14, 1, 1),
(73, 7, '2018-08-05', '17:00:00', 'Vicarage Road', NULL, NULL, 0),
(74, 7, '2018-08-05', '17:00:00', 'Turf Moor', NULL, NULL, 0),
(75, 7, '2018-08-05', '17:00:00', 'Olympic', NULL, NULL, 0),
(76, 7, '2018-08-05', '17:00:00', 'Emirates', NULL, NULL, 0),
(77, 8, '2018-08-11', '17:00:00', 'Olympic', NULL, NULL, 0),
(78, 8, '2018-08-12', '17:00:00', 'Goodison Park', NULL, NULL, 0),
(79, 8, '2018-08-12', '17:00:00', 'Emirates', NULL, NULL, 0),
(80, 8, '2018-07-27', '17:00:00', 'Turf Moor', NULL, NULL, 0),
(81, 8, '2018-08-12', '17:00:00', 'St James Park', NULL, NULL, 0),
(82, 8, '2018-08-12', '17:00:00', 'Etihad', NULL, NULL, 0),
(83, 8, '2018-08-12', '17:00:00', 'Goodison Park', NULL, NULL, 0),
(84, 8, '2018-08-12', '17:00:00', 'Stamford Bridge', NULL, NULL, 1),
(85, 8, '2018-08-12', '17:00:00', 'Selhurst Park', NULL, NULL, 0),
(86, 8, '2018-08-12', '17:00:00', 'Turf Moor', NULL, NULL, 0),
(87, 9, '2018-08-19', '17:00:00', 'Anfield', NULL, NULL, 1),
(88, 9, '2018-08-19', '17:00:00', 'Selhurst Park', NULL, NULL, 0),
(89, 9, '2018-08-19', '17:00:00', 'Selhurst Park', NULL, NULL, 0),
(90, 9, '2018-08-19', '17:00:00', 'Kirklees', NULL, NULL, 0),
(91, 9, '2018-08-19', '17:00:00', 'Craven Cottage', NULL, NULL, 0),
(92, 9, '2018-08-19', '17:00:00', 'King Power', NULL, NULL, 0),
(93, 9, '2018-08-19', '17:00:00', 'Kirklees', NULL, NULL, 0),
(94, 9, '2018-08-19', '17:00:00', 'Old Trafford', NULL, NULL, 0),
(95, 9, '2018-08-19', '17:00:00', 'Wembley', NULL, NULL, 0),
(96, 9, '2018-08-19', '17:00:00', 'St Mary s Stadium', NULL, NULL, 0),
(97, 10, '2018-08-26', '17:00:00', 'Olympic', NULL, NULL, 0),
(98, 10, '2018-08-26', '17:00:00', 'St James Park', NULL, NULL, 0),
(99, 10, '2018-08-26', '17:00:00', 'Craven Cottage', NULL, NULL, 0),
(100, 10, '2018-08-26', '17:00:00', 'Cardiff City', NULL, NULL, 0),
(101, 10, '2018-08-26', '17:00:00', 'Emirates', NULL, NULL, 0),
(102, 10, '2018-08-26', '17:00:00', 'Kirklees', NULL, NULL, 0),
(103, 10, '2018-08-26', '17:00:00', 'Goodison Park', NULL, NULL, 0),
(104, 10, '2018-08-26', '17:00:00', 'Stamford Bridge', NULL, NULL, 0),
(105, 10, '2018-08-26', '17:00:00', 'Etihad', NULL, NULL, 0),
(106, 10, '2018-08-26', '16:00:00', 'Selhurst Park', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

DROP TABLE IF EXISTS `vaitro`;
CREATE TABLE IF NOT EXISTS `vaitro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenVaiTro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MieuTa` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`id`, `TenVaiTro`, `MieuTa`) VALUES
(1, 'Đội trưởng', NULL),
(2, 'Đội phó', NULL),
(3, 'Phạt góc trái', NULL),
(4, 'Phạt góc phải', NULL),
(5, 'Đá Penalty', NULL),
(6, 'Đá phạt', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro_cauthu`
--

DROP TABLE IF EXISTS `vaitro_cauthu`;
CREATE TABLE IF NOT EXISTS `vaitro_cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVaiTro` int(11) NOT NULL,
  `idCauThu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idVaiTro` (`idVaiTro`),
  KEY `idCauThu` (`idCauThu`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro_cauthu`
--

INSERT INTO `vaitro_cauthu` (`id`, `idVaiTro`, `idCauThu`) VALUES
(1, 1, 3),
(2, 2, 12),
(3, 3, 2),
(4, 4, 9),
(5, 5, 12),
(6, 6, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro_cauthu_trandau`
--

DROP TABLE IF EXISTS `vaitro_cauthu_trandau`;
CREATE TABLE IF NOT EXISTS `vaitro_cauthu_trandau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauThu` int(11) NOT NULL,
  `idVaiTro` int(11) NOT NULL,
  `idTranDau` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idVaiTro` (`idVaiTro`),
  KEY `idTranDau` (`idTranDau`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro_cauthu_trandau`
--

INSERT INTO `vaitro_cauthu_trandau` (`id`, `idCauThu`, `idVaiTro`, `idTranDau`) VALUES
(105, 3, 1, 9),
(106, 5, 2, 9),
(107, 2, 3, 9),
(108, 9, 4, 9),
(109, 12, 5, 9),
(110, 12, 6, 9),
(111, 3, 1, 26),
(112, 2, 2, 26),
(113, 2, 3, 26),
(114, 9, 4, 26),
(115, 12, 5, 26),
(116, 12, 6, 26),
(117, 3, 1, 36),
(118, 12, 2, 36),
(119, 2, 3, 36),
(120, 9, 4, 36),
(121, 12, 5, 36),
(122, 12, 6, 36),
(129, 3, 1, 37),
(130, 12, 2, 37),
(131, 2, 3, 37),
(132, 9, 4, 37),
(133, 12, 5, 37),
(134, 12, 6, 37),
(135, 3, 1, 47),
(136, 12, 2, 47),
(137, 2, 3, 47),
(138, 9, 4, 47),
(139, 12, 5, 47),
(140, 12, 6, 47),
(141, 3, 1, 57),
(142, 12, 2, 57),
(143, 2, 3, 57),
(144, 9, 4, 57),
(145, 12, 5, 57),
(146, 12, 6, 57),
(147, 3, 1, 72),
(148, 12, 2, 72),
(149, 2, 3, 72),
(150, 9, 4, 72),
(151, 12, 5, 72),
(152, 12, 6, 72);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri`
--

DROP TABLE IF EXISTS `vitri`;
CREATE TABLE IF NOT EXISTS `vitri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenViTri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ChiSoDong` tinyint(4) DEFAULT NULL,
  `ChiSoCot` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vitri`
--

INSERT INTO `vitri` (`id`, `TenViTri`, `ChiSoDong`, `ChiSoCot`) VALUES
(1, 'GK', 7, 2),
(2, 'LB', 6, 0),
(3, 'LCB', 6, 1),
(4, 'RCB', 6, 3),
(5, 'CB', 6, 2),
(6, 'RB', 6, 4),
(7, 'CDM', 4, 2),
(8, 'CF', 0, 2),
(9, 'LCM', 3, 1),
(10, 'RCM', 3, 3),
(11, 'LM', 3, 0),
(12, 'RM', 3, 4),
(13, 'CAM', 2, 2),
(14, 'SS', 1, 2),
(15, 'LW', 1, 0),
(16, 'RW', 1, 4),
(17, 'Dự Bị', NULL, NULL),
(18, 'LS', 0, 1),
(19, 'RS', 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri_cauthu`
--

DROP TABLE IF EXISTS `vitri_cauthu`;
CREATE TABLE IF NOT EXISTS `vitri_cauthu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauThu` int(11) NOT NULL,
  `idViTri` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idViTri` (`idViTri`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vitri_cauthu`
--

INSERT INTO `vitri_cauthu` (`id`, `idCauThu`, `idViTri`) VALUES
(3, 1, 1),
(5, 3, 3),
(6, 4, 3),
(7, 6, 2),
(8, 5, 7),
(10, 8, 9),
(11, 9, 9),
(14, 12, 12),
(16, 12, 13),
(18, 13, 11),
(19, 13, 15),
(20, 13, 16),
(25, 14, 1),
(27, 2, 2),
(28, 2, 6),
(29, 3, 4),
(30, 3, 5),
(31, 4, 4),
(32, 4, 5),
(33, 20, 3),
(34, 20, 4),
(35, 5, 9),
(36, 5, 10),
(40, 8, 10),
(41, 8, 11),
(42, 8, 12),
(43, 9, 10),
(44, 9, 11),
(45, 9, 12),
(46, 9, 13),
(47, 9, 14),
(48, 9, 15),
(54, 15, 7),
(55, 15, 9),
(56, 15, 10),
(57, 16, 8),
(69, 16, 14),
(70, 16, 18),
(71, 7, 7),
(72, 7, 9),
(73, 7, 10),
(74, 9, 16),
(84, 10, 6),
(85, 10, 7),
(86, 10, 10),
(87, 11, 7),
(88, 11, 9),
(89, 11, 10),
(90, 11, 13),
(91, 10, 12),
(92, 12, 14),
(93, 12, 15),
(94, 12, 16),
(95, 16, 19),
(96, 17, 11),
(97, 17, 12),
(98, 17, 15),
(99, 17, 16),
(100, 19, 6),
(101, 20, 5),
(102, 20, 6),
(103, 21, 8),
(104, 21, 14),
(105, 21, 18),
(106, 21, 19),
(107, 22, 8),
(108, 22, 11),
(109, 22, 12),
(110, 22, 14),
(111, 22, 15),
(112, 22, 16),
(113, 22, 18),
(114, 22, 19),
(115, 23, 2),
(116, 24, 3),
(117, 24, 4),
(118, 24, 5),
(119, 25, 9),
(120, 25, 10),
(121, 26, 8),
(122, 26, 18),
(123, 26, 19);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri_cauthu_trandau`
--

DROP TABLE IF EXISTS `vitri_cauthu_trandau`;
CREATE TABLE IF NOT EXISTS `vitri_cauthu_trandau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCauThu` int(11) NOT NULL,
  `idViTri` int(11) DEFAULT NULL,
  `idTranDau` int(11) NOT NULL,
  `NhiemVuCauThu` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idCauThu` (`idCauThu`),
  KEY `idViTri` (`idViTri`),
  KEY `idTranDau` (`idTranDau`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vitri_cauthu_trandau`
--

INSERT INTO `vitri_cauthu_trandau` (`id`, `idCauThu`, `idViTri`, `idTranDau`, `NhiemVuCauThu`) VALUES
(246, 14, 1, 9, 'Đá tổng lực'),
(247, 19, 6, 9, 'Đá tổng lực'),
(248, 3, 4, 9, 'Đá tổng lực'),
(249, 20, 3, 9, 'Đá tổng lực'),
(250, 6, 2, 9, 'Đá tổng lực'),
(251, 10, 7, 9, 'Đá tổng lực'),
(252, 9, 10, 9, 'Đá tổng lực'),
(253, 11, 9, 9, 'Đá tổng lực, hỗ trợ phòng ngự'),
(254, 12, 16, 9, 'Đá tổng lực'),
(255, 13, 15, 9, 'Đá tổng lực'),
(256, 21, 8, 9, 'Đá tổng lực, lùi sâu'),
(257, 26, NULL, 9, NULL),
(258, 25, NULL, 9, NULL),
(259, 17, NULL, 9, NULL),
(260, 15, NULL, 9, NULL),
(261, 24, NULL, 9, NULL),
(262, 23, NULL, 9, NULL),
(263, 22, NULL, 9, NULL),
(264, 14, 1, 26, 'Đá tổng lực'),
(265, 2, 6, 26, 'Đá tổng lực'),
(266, 3, 4, 26, 'Đá tổng lực'),
(267, 4, 3, 26, 'Đá tổng lực'),
(268, 6, 2, 26, 'Đá tổng lực'),
(269, 5, 7, 26, 'Đá tổng lực'),
(270, 9, 10, 26, 'Box-to-box'),
(271, 11, 9, 26, 'Đá hết mình'),
(272, 12, 16, 26, 'Đá hết mình'),
(273, 13, 15, 26, 'Đá hết mình, Quẩy cánh'),
(274, 21, 8, 26, 'Lùi sâu, tích cực phòng ngự'),
(275, 26, NULL, 26, NULL),
(276, 25, NULL, 26, NULL),
(277, 17, NULL, 26, NULL),
(278, 15, NULL, 26, NULL),
(279, 24, NULL, 26, NULL),
(280, 23, NULL, 26, NULL),
(281, 22, NULL, 26, NULL),
(283, 14, 1, 36, 'Đá tổng lực'),
(284, 19, 6, 36, 'Đá tổng lực'),
(285, 20, 4, 36, 'Đá tổng lực'),
(286, 3, 3, 36, 'Đá tổng lực'),
(287, 6, 2, 36, 'Đá tổng lực'),
(288, 10, 7, 36, 'Đá tổng lực'),
(289, 9, 10, 36, 'Đá tổng lực'),
(290, 11, 9, 36, 'Đá tổng lực'),
(291, 12, 16, 36, 'Đá tổng lực'),
(292, 13, 15, 36, 'Đá tổng lực'),
(293, 21, 8, 36, 'Đá tổng lực'),
(294, 26, NULL, 36, NULL),
(295, 25, NULL, 36, NULL),
(296, 17, NULL, 36, NULL),
(297, 15, NULL, 36, NULL),
(298, 24, NULL, 36, NULL),
(299, 23, NULL, 36, NULL),
(300, 22, NULL, 36, NULL),
(301, 14, 1, 37, 'Đá tổng lực'),
(302, 19, 6, 37, 'Đá tổng lực'),
(303, 20, 4, 37, 'Đá tổng lực'),
(304, 3, 3, 37, 'Đá tổng lực'),
(305, 6, 2, 37, 'Đá tổng lực'),
(306, 10, 7, 37, 'Đá tổng lực'),
(307, 12, 12, 37, 'Đá tổng lực'),
(308, 9, 10, 37, 'Đá tổng lực'),
(309, 11, 9, 37, 'Đá tổng lực'),
(310, 13, 11, 37, 'Đá tổng lực'),
(311, 21, 8, 37, 'Đá tổng lực'),
(312, 26, NULL, 37, NULL),
(313, 25, NULL, 37, NULL),
(314, 17, NULL, 37, NULL),
(315, 15, NULL, 37, NULL),
(316, 24, NULL, 37, NULL),
(317, 23, NULL, 37, NULL),
(318, 22, NULL, 37, NULL),
(319, 14, 1, 47, 'Đá tổng lực'),
(320, 19, 6, 47, 'Đá tổng lực'),
(321, 20, 4, 47, 'Đá tổng lực'),
(322, 3, 3, 47, 'Đá tổng lực'),
(323, 6, 2, 47, 'Đá tổng lực'),
(324, 10, 7, 47, 'Đá tổng lực'),
(325, 12, 12, 47, 'Đá tổng lực'),
(326, 11, 10, 47, 'Đá tổng lực'),
(327, 9, 9, 47, 'Đá tổng lực'),
(328, 13, 11, 47, 'Đá tổng lực'),
(329, 21, 8, 47, 'Đá tổng lực'),
(330, 26, NULL, 47, NULL),
(331, 25, NULL, 47, NULL),
(332, 17, NULL, 47, NULL),
(333, 15, NULL, 47, NULL),
(334, 24, NULL, 47, NULL),
(335, 23, NULL, 47, NULL),
(336, 22, NULL, 47, NULL),
(337, 14, 1, 57, 'Đá tổng lực'),
(338, 19, 6, 57, 'Đá tổng lực'),
(339, 20, 4, 57, 'Đá tổng lực'),
(340, 3, 3, 57, 'Đá tổng lực'),
(341, 6, 2, 57, 'Đá tổng lực'),
(342, 10, 7, 57, 'Đá tổng lực'),
(343, 12, 12, 57, 'Đá tổng lực'),
(344, 11, 10, 57, 'Đá tổng lực'),
(345, 9, 9, 57, 'Đá tổng lực'),
(346, 13, 11, 57, 'Đá tổng lực'),
(347, 21, 8, 57, 'Đá tổng lực'),
(348, 26, NULL, 57, NULL),
(349, 25, NULL, 57, NULL),
(350, 17, NULL, 57, NULL),
(351, 15, NULL, 57, NULL),
(352, 24, NULL, 57, NULL),
(353, 23, NULL, 57, NULL),
(354, 22, NULL, 57, NULL),
(355, 14, 1, 72, 'Đá tổng lực'),
(356, 19, 6, 72, 'Đá lùi sâu'),
(357, 20, 4, 72, 'Đá lùi sâu'),
(358, 3, 3, 72, 'Đá lùi sâu'),
(359, 6, 2, 72, 'Đá lùi sâu'),
(360, 10, 7, 72, 'Đá tổng lực, lùi'),
(361, 12, 12, 72, 'Đá tổng lực'),
(362, 11, 10, 72, 'Đá tổng lực'),
(363, 8, 9, 72, 'Hỗ trợ Tấn công'),
(364, 13, 11, 72, 'Đá tổng lực'),
(365, 21, 8, 72, 'Lùi sâu, tích cực phòng ngự'),
(366, 26, NULL, 72, NULL),
(367, 25, NULL, 72, NULL),
(368, 17, NULL, 72, NULL),
(369, 15, NULL, 72, NULL),
(370, 24, NULL, 72, NULL),
(371, 23, NULL, 72, NULL),
(372, 22, NULL, 72, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vitri_doihinh`
--

DROP TABLE IF EXISTS `vitri_doihinh`;
CREATE TABLE IF NOT EXISTS `vitri_doihinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idViTri` int(11) NOT NULL,
  `idDoiHinh` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idViTri` (`idViTri`),
  KEY `idDoiHinh` (`idDoiHinh`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vitri_doihinh`
--

INSERT INTO `vitri_doihinh` (`id`, `idViTri`, `idDoiHinh`) VALUES
(1, 1, 2),
(2, 6, 2),
(3, 4, 2),
(4, 3, 2),
(5, 2, 2),
(6, 7, 2),
(7, 10, 2),
(8, 9, 2),
(9, 16, 2),
(10, 15, 2),
(11, 8, 2),
(12, 1, 1),
(13, 6, 1),
(14, 4, 1),
(15, 3, 1),
(16, 2, 1),
(17, 12, 1),
(18, 10, 1),
(19, 9, 1),
(20, 11, 1),
(21, 19, 1),
(22, 18, 1),
(35, 1, 7),
(36, 6, 7),
(37, 4, 7),
(38, 5, 7),
(39, 3, 7),
(40, 2, 7),
(41, 7, 7),
(42, 10, 7),
(43, 9, 7),
(44, 19, 7),
(45, 18, 7),
(46, 1, 8),
(47, 6, 8),
(48, 4, 8),
(49, 5, 8),
(50, 3, 8),
(51, 2, 8),
(52, 12, 8),
(53, 10, 8),
(54, 9, 8),
(55, 11, 8),
(56, 8, 8),
(57, 1, 9),
(58, 6, 9),
(59, 4, 9),
(60, 3, 9),
(61, 2, 9),
(62, 7, 9),
(63, 12, 9),
(64, 9, 9),
(65, 11, 9),
(66, 13, 9),
(67, 8, 9),
(68, 1, 10),
(69, 4, 10),
(70, 5, 10),
(71, 3, 10),
(72, 7, 10),
(73, 12, 10),
(74, 10, 10),
(75, 9, 10),
(76, 11, 10),
(77, 19, 10),
(78, 18, 10),
(79, 1, 11),
(80, 4, 11),
(81, 5, 11),
(82, 3, 11),
(83, 7, 11),
(84, 12, 11),
(85, 10, 11),
(86, 9, 11),
(87, 11, 11),
(88, 19, 11),
(89, 18, 11),
(90, 1, 12),
(91, 4, 12),
(92, 5, 12),
(93, 3, 12),
(94, 12, 12),
(95, 10, 12),
(96, 9, 12),
(97, 11, 12),
(98, 16, 12),
(99, 15, 12),
(100, 8, 12),
(101, 1, 13),
(102, 6, 13),
(103, 4, 13),
(104, 3, 13),
(105, 2, 13),
(106, 7, 13),
(107, 10, 13),
(108, 9, 13),
(109, 13, 13),
(110, 19, 13),
(111, 18, 13),
(112, 1, 14),
(113, 6, 14),
(114, 4, 14),
(115, 3, 14),
(116, 2, 14),
(117, 7, 14),
(118, 12, 14),
(119, 10, 14),
(120, 9, 14),
(121, 11, 14),
(122, 8, 14),
(123, 1, 15),
(124, 6, 15),
(125, 4, 15),
(126, 3, 15),
(127, 2, 15),
(128, 10, 15),
(129, 9, 15),
(130, 16, 15),
(131, 15, 15),
(132, 19, 15),
(133, 18, 15),
(134, 1, 16),
(135, 6, 16),
(136, 4, 16),
(137, 3, 16),
(138, 2, 16),
(139, 7, 16),
(140, 10, 16),
(141, 9, 16),
(142, 16, 16),
(143, 14, 16),
(144, 15, 16),
(145, 1, 17),
(146, 6, 17),
(147, 4, 17),
(148, 3, 17),
(149, 2, 17),
(150, 7, 17),
(151, 12, 17),
(152, 11, 17),
(153, 13, 17),
(154, 19, 17),
(155, 18, 17);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangxephangclb`
--
ALTER TABLE `bangxephangclb`
  ADD CONSTRAINT `bangxephangclb_ibfk_1` FOREIGN KEY (`idCauLacBo`) REFERENCES `caulacbo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bangxephangclbgiaidau`
--
ALTER TABLE `bangxephangclbgiaidau`
  ADD CONSTRAINT `bangxephangclbgiaidau_ibfk_1` FOREIGN KEY (`idGiaiDau`) REFERENCES `giaidau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bangxephangclbgiaidau_ibfk_2` FOREIGN KEY (`idCauLacBo`) REFERENCES `caulacbo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `caulacbo_giaidau`
--
ALTER TABLE `caulacbo_giaidau`
  ADD CONSTRAINT `caulacbo_giaidau_ibfk_1` FOREIGN KEY (`idCauLacBo`) REFERENCES `caulacbo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `caulacbo_giaidau_ibfk_2` FOREIGN KEY (`idGiaiDau`) REFERENCES `giaidau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cauthu`
--
ALTER TABLE `cauthu`
  ADD CONSTRAINT `cauthu_ibfk_1` FOREIGN KEY (`idNguoiDung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giaotrinh_luyentap_cauthu`
--
ALTER TABLE `giaotrinh_luyentap_cauthu`
  ADD CONSTRAINT `giaotrinh_luyentap_cauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giaotrinh_luyentap_cauthu_ibfk_2` FOREIGN KEY (`idGiaoTrinhTap`) REFERENCES `giaotrinhtap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giaotrinh_luyentap_cauthu_ibfk_3` FOREIGN KEY (`idLichLuyenTap`) REFERENCES `lichluyentap` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `huanluyenvien`
--
ALTER TABLE `huanluyenvien`
  ADD CONSTRAINT `huanluyenvien_ibfk_1` FOREIGN KEY (`idNguoiDung`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kynang_cauthu`
--
ALTER TABLE `kynang_cauthu`
  ADD CONSTRAINT `kynang_cauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kynang_cauthu_ibfk_2` FOREIGN KEY (`idKyNang`) REFERENCES `kynang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `lichkham_ibfk_1` FOREIGN KEY (`idPhacDoDieuTri`) REFERENCES `phacdodieutri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichluyentap`
--
ALTER TABLE `lichluyentap`
  ADD CONSTRAINT `lichluyentap_ibfk_1` FOREIGN KEY (`idHuanLuyenVien`) REFERENCES `huanluyenvien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phongdo_cauthu`
--
ALTER TABLE `phongdo_cauthu`
  ADD CONSTRAINT `phongdo_cauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phongdo_cauthu_ibfk_2` FOREIGN KEY (`idPhongDo`) REFERENCES `phongdo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thanhtichcauthu`
--
ALTER TABLE `thanhtichcauthu`
  ADD CONSTRAINT `thanhtichcauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thanhtichcauthu_ibfk_2` FOREIGN KEY (`idTranDau`) REFERENCES `trandau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`idNguoiGui`) REFERENCES `nguoidung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongtinchanthuong_cauthu`
--
ALTER TABLE `thongtinchanthuong_cauthu`
  ADD CONSTRAINT `thongtinchanthuong_cauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thongtinchanthuong_cauthu_ibfk_2` FOREIGN KEY (`idChanThuong`) REFERENCES `chanthuong` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thongtinchanthuong_cauthu_ibfk_3` FOREIGN KEY (`idPhacDoDieuTri`) REFERENCES `phacdodieutri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tiso`
--
ALTER TABLE `tiso`
  ADD CONSTRAINT `tiso_ibfk_1` FOREIGN KEY (`idCauLacBo`) REFERENCES `caulacbo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiso_ibfk_2` FOREIGN KEY (`idTranDau`) REFERENCES `trandau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiso_ibfk_3` FOREIGN KEY (`idGiaiDau`) REFERENCES `giaidau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `toathuoc`
--
ALTER TABLE `toathuoc`
  ADD CONSTRAINT `toathuoc_ibfk_1` FOREIGN KEY (`idLichKham`) REFERENCES `lichkham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `toathuoc_thuoc`
--
ALTER TABLE `toathuoc_thuoc`
  ADD CONSTRAINT `toathuoc_thuoc_ibfk_1` FOREIGN KEY (`idThuoc`) REFERENCES `thuoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `toathuoc_thuoc_ibfk_2` FOREIGN KEY (`idToaThuoc`) REFERENCES `toathuoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `trandau`
--
ALTER TABLE `trandau`
  ADD CONSTRAINT `trandau_ibfk_1` FOREIGN KEY (`idChienThuat`) REFERENCES `chienthuat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trandau_ibfk_2` FOREIGN KEY (`idDoiHinh`) REFERENCES `doihinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vaitro_cauthu`
--
ALTER TABLE `vaitro_cauthu`
  ADD CONSTRAINT `vaitro_cauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaitro_cauthu_ibfk_2` FOREIGN KEY (`idVaiTro`) REFERENCES `vaitro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vaitro_cauthu_trandau`
--
ALTER TABLE `vaitro_cauthu_trandau`
  ADD CONSTRAINT `vaitro_cauthu_trandau_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaitro_cauthu_trandau_ibfk_2` FOREIGN KEY (`idTranDau`) REFERENCES `trandau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaitro_cauthu_trandau_ibfk_3` FOREIGN KEY (`idVaiTro`) REFERENCES `vaitro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vitri_cauthu`
--
ALTER TABLE `vitri_cauthu`
  ADD CONSTRAINT `vitri_cauthu_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vitri_cauthu_ibfk_2` FOREIGN KEY (`idViTri`) REFERENCES `vitri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vitri_cauthu_trandau`
--
ALTER TABLE `vitri_cauthu_trandau`
  ADD CONSTRAINT `vitri_cauthu_trandau_ibfk_1` FOREIGN KEY (`idCauThu`) REFERENCES `cauthu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vitri_cauthu_trandau_ibfk_2` FOREIGN KEY (`idTranDau`) REFERENCES `trandau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vitri_cauthu_trandau_ibfk_3` FOREIGN KEY (`idViTri`) REFERENCES `vitri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vitri_doihinh`
--
ALTER TABLE `vitri_doihinh`
  ADD CONSTRAINT `vitri_doihinh_ibfk_1` FOREIGN KEY (`idDoiHinh`) REFERENCES `doihinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vitri_doihinh_ibfk_2` FOREIGN KEY (`idViTri`) REFERENCES `vitri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
