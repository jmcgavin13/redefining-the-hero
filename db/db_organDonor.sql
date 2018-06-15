-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Mar 28, 2017 at 08:21 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: db_organDonor
--

-- --------------------------------------------------------

--
-- Table structure for table tbl_campaign
--

CREATE TABLE tbl_campaign (
  campaign_id tinyint(3) unsigned NOT NULL,
  campaign_desc text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tbl_campaign
--

INSERT INTO tbl_campaign (campaign_id, campaign_desc) VALUES
(1, 'There are currently over 1,500 Ontarians waiting for a lifesaving organ transplant. This is the only treatment option available to them.\r\n\r\nThere exists a hero in all of us. When you register to become a donor, you let those waiting know that you would help them if you could. It costs $0 and takes less than 2 minutes to register.');

-- --------------------------------------------------------

--
-- Table structure for table tbl_info
--

CREATE TABLE tbl_info (
  info_id tinyint(3) unsigned NOT NULL,
  info_desc varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tbl_info
--

INSERT INTO tbl_info (info_id, info_desc) VALUES
(1, 'In Ontario, someone dies every 3 days because they did not receive a transplant in time.'),
(2, 'One organ donor can help up to 8 individuals and one tissue donor can help up to 75 others.'),
(3, 'Age does not disqualify you from becoming a donor. The oldest organ donor was over 90 years old.'),
(4, 'Each donor is considered on a case-by-case basis. A long-term or serious illness does not necessarily disqualify you from becoming a donor.');

-- --------------------------------------------------------

--
-- Table structure for table tbl_landImg
--

CREATE TABLE tbl_landImg (
  landImg_id tinyint(3) unsigned NOT NULL,
  landImg_img varchar(150) NOT NULL,
  landImg_desc varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tbl_landImg
--

INSERT INTO tbl_landImg (landImg_id, landImg_img, landImg_desc) VALUES
(1, 'header_img_1.jpg', 'photo of Ryan Dyson'),
(2, 'header_img_2.jpg', 'photo of Jordan McGavin'),
(3, 'header_img_3.jpg', 'photo of Dan Bodden'),
(4, 'header_img_4.jpg', 'photo of Amanda Mercer'),
(5, 'header_img_5.jpg', 'photo of firefighter 1'),
(7, 'header_img_7.jpg', 'photo of Shannon Enwright');

-- --------------------------------------------------------

--
-- Table structure for table tbl_photos
--

CREATE TABLE tbl_photos (
  photos_id tinyint(3) unsigned NOT NULL,
  photos_img varchar(150) NOT NULL,
  photos_desc varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tbl_photos
--

INSERT INTO tbl_photos (photos_id, photos_img, photos_desc) VALUES
(1, 'kid.jpg', 'Photo of child at the doctors'),
(2, 'heart_donation.jpg', 'heart being passed to another hand'),
(3, 'heart.jpg', 'doctor holding heart'),
(4, 'kidney.jpg', 'kidney in an ER'),
(5, 'organ-bag.jpg', 'organ donor bag'),
(6, 'kidney-machine.jpg', 'kidney machine');

-- --------------------------------------------------------

--
-- Table structure for table tbl_stats
--

CREATE TABLE tbl_stats (
  stats_id tinyint(3) unsigned NOT NULL,
  stats_title varchar(100) NOT NULL,
  stats_num varchar(75) NOT NULL,
  stats_legend varchar(100) NOT NULL,
  stats_icon varchar(30) NOT NULL,
  stats_idName varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tbl_stats
--

INSERT INTO tbl_stats (stats_id, stats_title, stats_num, stats_legend, stats_icon, stats_idName) VALUES
(1, 'WAITING LIST', '1528', 'As of December 31, 2016', 'fi-clipboard-notes', 'waitingListNo'),
(2, 'LIVES SAVED', '13300', 'As of 2003', 'fi-heart', 'livesSavedNo'),
(3, '% OF ONTARIANS', '31', 'Registered as organ donors', 'fi-torsos-all', 'registeredDonorsNo');

-- --------------------------------------------------------

--
-- Table structure for table tbl_user
--

CREATE TABLE tbl_user (
  user_id tinyint(3) unsigned NOT NULL,
  user_name varchar(100) NOT NULL,
  user_pass varchar(75) NOT NULL,
  user_ip varchar(50) NOT NULL,
  user_level varchar(100) NOT NULL DEFAULT '1',
  user_email varchar(100) NOT NULL,
  user_loginAttempt varchar(10) NOT NULL DEFAULT '0',
  user_lastlogin varchar(100) NOT NULL,
  user_logins int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table tbl_user
--

INSERT INTO tbl_user (user_id, user_name, user_pass, user_ip, user_level, user_email, user_loginAttempt, user_lastlogin, user_logins) VALUES
(4, 'admin', '31d667fd3527c8e884774c1104ab3bc43cd7b0c7c3ff4bc238527d21906d8879', '::1', '1', 'dyson_ryan@hotmail.com', '0', 'March 27, 2017, 1:06 pm', 13),
(7, 'rdyson', '511abf3692d7ebf4fa1eaa03c3fb6e1c50d028a7179083c4465b7b50aabd2a19', '::1', '2', 'rdyson@uwo.ca', '0', 'March 28, 2017, 2:18 pm', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table tbl_campaign
--
ALTER TABLE tbl_campaign
  ADD PRIMARY KEY (campaign_id);

--
-- Indexes for table tbl_info
--
ALTER TABLE tbl_info
  ADD PRIMARY KEY (info_id);

--
-- Indexes for table tbl_landImg
--
ALTER TABLE tbl_landImg
  ADD PRIMARY KEY (landImg_id);

--
-- Indexes for table tbl_photos
--
ALTER TABLE tbl_photos
  ADD PRIMARY KEY (photos_id);

--
-- Indexes for table tbl_stats
--
ALTER TABLE tbl_stats
  ADD PRIMARY KEY (stats_id);

--
-- Indexes for table tbl_user
--
ALTER TABLE tbl_user
  ADD PRIMARY KEY (user_id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table tbl_campaign
--
ALTER TABLE tbl_campaign
  MODIFY campaign_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tbl_info
--
ALTER TABLE tbl_info
  MODIFY info_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tbl_landImg
--
ALTER TABLE tbl_landImg
  MODIFY landImg_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tbl_photos
--
ALTER TABLE tbl_photos
  MODIFY photos_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tbl_stats
--
ALTER TABLE tbl_stats
  MODIFY stats_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tbl_user
--
ALTER TABLE tbl_user
  MODIFY user_id tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
