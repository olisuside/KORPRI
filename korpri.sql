-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 05:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `korpri`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblabout`
--

CREATE TABLE `tblabout` (
  `alamat` mediumtext DEFAULT NULL,
  `contact` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `AdminPassword` varchar(255) DEFAULT NULL,
  `AdminEmail` varchar(255) DEFAULT NULL,
  `UserType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `UserName`, `AdminPassword`, `AdminEmail`, `UserType`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@email.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CategoryName` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CategoryName`, `id`) VALUES
('Kegiatan', 1),
('Pengumuman', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` int(111) NOT NULL,
  `PostTittle` longtext DEFAULT NULL,
  `PostDetail` text DEFAULT NULL,
  `PostingDetail` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImg` varchar(255) DEFAULT NULL,
  `ViewCounter` int(111) DEFAULT NULL,
  `PostKegBy` varchar(255) DEFAULT NULL,
  `LastUpBy` varchar(255) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`id`, `PostTittle`, `PostDetail`, `PostingDetail`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImg`, `ViewCounter`, `PostKegBy`, `LastUpBy`, `Category`) VALUES
(35, 'Kegiatan 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:07:57', NULL, 1, 'Kegiatan-1', '06bea915139c788832ba072da54d19a5.jpg', NULL, 'admin', NULL, 1),
(36, 'Kegiatan 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:08:19', NULL, 1, 'Kegiatan-2', 'fcd8d9f91a7019dd6d25bd91c60307df.jpg', NULL, 'admin', NULL, 1),
(37, 'Kegiatan 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:08:38', NULL, 1, 'Kegiatan-3', '06bea915139c788832ba072da54d19a5.jpg', NULL, 'admin', NULL, 1),
(38, 'Kegiatan 4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:08:59', NULL, 1, 'Kegiatan-4', '06bea915139c788832ba072da54d19a5.jpg', NULL, 'admin', NULL, 1),
(39, 'Kegiatan 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:09:19', '2023-01-11 04:12:52', 1, 'Kegiatan-5', 'fcd8d9f91a7019dd6d25bd91c60307df.jpg', 1, 'admin', NULL, 1),
(40, 'Pengumuman 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:09:35', NULL, 1, 'Pengumuman-1', 'b7b2905c1ef9e133880a281a577d500d.jpg', NULL, 'admin', NULL, 4),
(41, 'Pengumuman 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:09:52', NULL, 1, 'Pengumuman-2', 'ee4acd4f554d601bbbe780f1b44f714a.jpg', NULL, 'admin', NULL, 4),
(42, 'Pengumuman 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '2023-01-11 04:10:09', NULL, 1, 'Pengumuman-3', 'b7b2905c1ef9e133880a281a577d500d.jpg', NULL, 'admin', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblstruk`
--

CREATE TABLE `tblstruk` (
  `id` int(11) NOT NULL,
  `StrukturImg` longtext DEFAULT NULL,
  `StrukturDesc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstruk`
--

INSERT INTO `tblstruk` (`id`, `StrukturImg`, `StrukturDesc`) VALUES
(1, '72ec3abadf6276f0750f35a03b619be6.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae porta ex. Aliquam tempus pretium pretium. Aliquam consequat leo sit amet dui commodo dignissim. Pellentesque euismod est nibh, eget volutpat dolor rutrum at. Morbi eleifend, ex non mattis porttitor, ex lacus tincidunt augue, tristique tempus dolor libero in magna. Sed iaculis enim est, bibendum posuere nulla interdum id. Praesent pharetra venenatis nisi, non egestas mauris congue vitae. Integer congue pretium turpis, sed ullamcorper ligula dictum viverra. Aliquam erat volutpat. Maecenas viverra ligula nec mi placerat, id tincidunt orci condimentum. Pellentesque vulputate mauris commodo tincidunt laoreet.</p><p>Integer in condimentum eros. Sed egestas vel lacus in gravida. Donec rutrum dignissim sapien ut vehicula. Fusce rutrum, metus sed egestas tincidunt, risus est dictum nisl, a imperdiet elit lorem in felis. Nulla ex ipsum, vestibulum eget pellentesque id, lacinia vitae eros. Phasellus aliquam nisl at ligula elementum dictum. Donec tincidunt, mauris ac fringilla iaculis, lorem dolor hendrerit ligula, nec commodo lorem felis eget leo. Suspendisse a libero id metus volutpat bibendum. Nulla venenatis, arcu nec pellentesque efficitur, dolor metus efficitur dui, vel pellentesque felis enim nec libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac ligula a odio euismod posuere. Suspendisse vel ultrices lectus. Donec volutpat elementum velit quis accumsan. Proin ac justo ac mauris pulvinar varius. In vel ultrices magna. Nulla accumsan hendrerit finibus.</p><p>Sed ultrices commodo vehicula. Quisque viverra viverra aliquet. Donec cursus, nulla non pretium ullamcorper, ante nulla elementum nisi, vitae sagittis quam tortor non eros. Cras auctor consectetur ultricies. In hac habitasse platea dictumst. Donec tempus, neque eget tristique tincidunt, odio leo sagittis risus, a lobortis massa lorem fermentum sem. Mauris et lacus mollis, pulvinar turpis et, lobortis nisi. Nullam faucibus orci ac pharetra efficitur. Nullam venenatis tincidunt sollicitudin. Donec ac egestas lacus. Mauris tincidunt velit eget sollicitudin ultricies. Nullam vitae diam id tortor pulvinar imperdiet eu ac elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus accumsan leo suscipit, volutpat diam nec, ultricies ante.</p><p>Donec pellentesque ornare sagittis. In eu libero sit amet ex sollicitudin convallis. Curabitur dignissim pulvinar massa non malesuada. Vestibulum id vulputate mauris, efficitur mattis mi. Nunc elit arcu, laoreet eu iaculis ut, vulputate maximus felis. Sed eu nisl non tellus feugiat tristique ac a nisi. Cras sit amet velit eu erat pharetra aliquam nec eu magna. Sed eu congue quam. Morbi at turpis placerat, posuere massa eget, blandit nibh.</p><p>Duis eleifend mi sit amet condimentum varius. Cras hendrerit sagittis nibh, sit amet iaculis eros pharetra in. Phasellus placerat enim mi, quis suscipit felis vestibulum eu. Maecenas ornare orci at sapien viverra fringilla. Curabitur eu hendrerit odio. Aenean id lectus vel neque egestas dictum non vel nulla. Pellentesque malesuada ornare quam et pretium. Pellentesque semper neque sapien, a ullamcorper mauris blandit nec. Cras aliquet eu sem eget rutrum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserName` (`UserName`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category` (`Category`),
  ADD KEY `PostKegBy` (`PostKegBy`),
  ADD KEY `PostKegBy_2` (`PostKegBy`);

--
-- Indexes for table `tblstruk`
--
ALTER TABLE `tblstruk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD CONSTRAINT `poscatid` FOREIGN KEY (`Category`) REFERENCES `tblcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subadmin` FOREIGN KEY (`PostKegBy`) REFERENCES `tbladmin` (`UserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
