-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 02:15 AM
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
  `PostDetail` longtext DEFAULT NULL,
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
(3, '', '<p>as</p>', '2022-12-21 17:21:19', NULL, 1, '', 'c5b69a0f100b5cce56630979fc618f5b.jpg', NULL, 'admin', NULL, 1),
(4, '', '<p>isi test</p>', '2022-12-21 17:22:54', NULL, 1, '', 'a629b0bd5b21d918d6713247d4a4f53a.png', NULL, 'admin', NULL, 4),
(5, '', '<p>test 2</p>', '2022-12-21 17:23:48', NULL, 1, '', '22260f462995e827292927ee96ffe04f.png', NULL, 'admin', NULL, 1),
(6, 'test3', '<p>test3</p>', '2022-12-21 17:26:18', NULL, 1, 'test3', '22260f462995e827292927ee96ffe04f.png', NULL, 'admin', NULL, 4),
(7, 'test4', '<p>asda</p>', '2022-12-22 12:37:31', NULL, 1, 'test4', 'a77650e92313aec3bbf49a34936f830a.jpg', NULL, 'admin', NULL, 1),
(8, 'test5', '<p>test5</p>', '2022-12-22 17:54:34', '2022-12-27 19:02:46', 0, 'test5', '0c9accec3e47dc5a521180f9900027f1.jpg', NULL, 'admin', NULL, 4),
(9, 'test5', '<p>test5</p>', '2022-12-22 17:55:13', '2022-12-27 19:03:12', 0, 'test5', '0c9accec3e47dc5a521180f9900027f1.jpg', NULL, 'admin', NULL, 4),
(10, 'test6', '<p>test</p>', '2022-12-22 17:55:30', NULL, 1, 'test6', '34c468e9e36407576a308c9c6cb0e699.jpg', NULL, 'admin', NULL, 4),
(11, 'test7', '<p>tes</p>', '2022-12-22 18:01:30', NULL, 1, 'test7', '7097d56904b57699c67a120de9d33c9e.jpg', NULL, 'admin', NULL, 1),
(12, 'test8', '<p>tes</p>', '2022-12-22 18:03:30', NULL, 1, 'test8', '0c9accec3e47dc5a521180f9900027f1.jpg', NULL, 'admin', NULL, 1),
(13, 'testtt', '<p>tes</p>', '2022-12-22 18:19:47', '2022-12-27 19:03:21', 0, 'testtt', '0c9accec3e47dc5a521180f9900027f1.jpg', NULL, 'admin', NULL, 1),
(14, 'sas1', '<p>asfagw</p>', '2022-12-22 18:23:32', NULL, 1, 'sas1', '4c5741eba0ea66112364e96d6a11de29.jpg', NULL, 'admin', NULL, 4),
(15, 'sas1', '<p>asfagw</p>', '2022-12-22 18:24:38', NULL, 1, 'sas1', '4c5741eba0ea66112364e96d6a11de29.jpg', NULL, 'admin', NULL, 4),
(16, 'sas1', '<p>asfagw</p>', '2022-12-22 18:25:49', '2022-12-27 19:03:27', 0, 'sas1', '4c5741eba0ea66112364e96d6a11de29.jpg', NULL, 'admin', NULL, 4),
(17, 'test10', '<p>tes</p>', '2022-12-22 18:30:44', NULL, 1, 'test10', 'f151179458f097d0ad6a9a1e307332a8.jpg', NULL, 'admin', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblstruk`
--

CREATE TABLE `tblstruk` (
  `Struk` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
