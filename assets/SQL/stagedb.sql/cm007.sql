-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 20, 2024 at 11:26 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cm007`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `story_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `userid` varchar(15) NOT NULL,
  `date_added` date DEFAULT NULL,
  PRIMARY KEY (`story_id`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`story_id`, `title`, `location`, `description`, `category`, `image`, `userid`, `date_added`) VALUES
(19, 'Self-catering cottages', 'Dunfermline', 'Find your perfect accommodation in Dunfermline in this selection of friendly B&Bs, cosy self-catering cottages and more.', 'Hotel', 'assets/uploads/dunfermline-skyline.jpg', 'admin', '2023-04-01'),
(14, 'The Isle of Skye', 'Inverness', 'Youâ€™ll also get to explore Eilean Donan Castle and make a quick visit to Loch Ness before we return to Inverness.Our one-day adventure wouldnâ€™t be complete without a quick visit to Loch Ness. The dark waters of this loch carry Scotlandâ€™s greatest unsolved mystery, making it one of our biggest tourist attractions! ', 'Nature', 'assets/uploads/The Isle of Skye.jpg', 'user1', '2023-03-27'),
(12, 'Dundee Trip', 'Invergodon', 'Dundee is a coastal city on the Firth of Tay estuary in eastern Scotland. Its regenerated waterfront has 2 nautical museums: RRS Discovery, Dundee is a coastal city on the Firth of Tay estuary in eastern Scotland. Its regenerated waterfront has 2 nautical museums: RRS Discovery, ', 'Landscape', 'assets/uploads/logo 150px.png', 'user1', '2023-03-26'),
(17, 'Fife Coastal ', 'Fife', 'Explore golden beaches and fishing villages on a self-guided walking holiday along the Fife Coastal Path. The trail spans the industrial landscapes of North Queensferry and wends along the Scottish coastline all the way to Newport-on-Tay.', 'Nightlife', 'assets/uploads/fife.jpg', 'user1', '2023-03-27'),
(18, 'Dunfermline', 'Dunfermline', 'Dunfermline is a city in Fife and was once the capital of Scotland!. In May 2022, Dunfermline became Scotland\'s newest city as part of HM The Queen\'s Platinum Jubilee celebrations.  ', 'Club', 'assets/uploads/dunfermline.jpg', 'admin', '2023-04-02'),
(20, 'Walking Tour', 'Edinburgh', 'This walking tour of up to three hours can be offered in a number of sites within Edinburgh. The Royal Mile, The New Town, The Museums and Art Galleries, Princess street and Gardens, the list goes on. ', 'Landscape', 'assets/uploads/SD.jpg', 'admin', '2023-04-01'),
(24, 'Family Holidays', 'Glasgow', 'This walking tour of up to three hours can be offered in a number of sites within Edinburgh. The Royal Mile, The New Town, The Museums and Art Galleries, Princess street and Gardens, the list goes on. ', 'Nature', 'assets/uploads/family-at-national-museum.jpeg', 'Admin', '2023-04-03'),
(25, ' Farms Glamping 2', 'Inverness', 'Scotland has some superb options for a family break from holiday parks to resort hotels. Make sure to book a few months in advance for the school holidays. The Museums and Art Galleries,  Princess ', 'Club', 'assets/uploads/glamping-hot-tub.jpeg', 'RGU', '2023-04-04'),
(26, 'National Museum 3', 'Dundee', 'Not sure where to go on a family break in Scotland? Check out these itineraries for family trips in the north, east or south west. Not sure where to go on a family break in Scotland? Check.  ', 'Nightlife', 'assets/uploads/dunfermline-skyline.jpg', 'User1', '2023-04-04'),
(27, '2 Dunfermline 31', 'others', 'dngjdknf dnfkjgn dnd fngld nfkngd fngkld fngkld fngkld fngkd nkldf ndflj gndljf gldnfg ndfklg ndlfngdnflgj ndlkfngl dfngldn fgndlf gdlkfng dnflg dlfgnl dfngldnf gklnd lfgnldkfnglkdf ', 'Nightlife', 'assets/uploads/dunfermline.jpg', 'rgu2', '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `phone`, `email`, `hashed_password`, `is_admin`) VALUES
(2, 'unwa', 'iubvuyhj', 8754, '896hjb@jbk.vhj', '$2y$10$OWoU4Sq9D130O9d9hSxIyOWmVm1xCKp6kYNhHK41AKftRXcdoNH4C', 1),
(3, 'user', 'user', 987654, 'user@example.co', '$2y$10$4QWA.TpvMAtlc609Y5nIbeEVfCcON8jCTpeH/7BpSw7jxT.AJoMvO', 0),
(8, 'Admin', 'Example', 98765, 'admin@example.co', '$2y$10$MfMxVX6jYxKMno1GaLVg6uu/6kiNYtRJJo50TnE4rrASXUc/DfaG6', 1),
(6, 'retrytuiyuolgkyfdtsraewstyu', 'tfiyguligkyfdtysaerwtsrydtiufygouhi;p', 54678, 'trfyujghf@fghgjg.com', '$2y$10$HBC8IlANYE4Cgyfi.2T0DuMXHIeiTGixifGj782XOx6XPqx.RFgzC', 0),
(7, 'User1', 'User1', 786586970, 'user@user.co', '$2y$10$iogXadfnSEIMIfSvDgejTuGG7vE23Ji3GilI2qfxilmGtLoAg.62G', 0),
(10, 'RGU', 'SOC', 98745684, 'rgu@rgu.co', '$2y$10$RvRqXAKDaLOn.jPk3E4D4utHhhDUy5BUs0V/ENuMyBlMSrFCkSRuq', 0),
(15, 'Admin2', 'newAdmin', 8979338, 'admin2@example.co', '$2y$10$JppOeqWsDLTtUuVMlYCaW.tbxGwX4g4yCONSxRNON1fiCii29dfC6', 1),
(16, 'rgu2', 'new rgu', 93874589, 'rgu2@rgu.co', '$2y$10$8yxJRGvPAmZD8ptJb0Kxl.UTzHWvf8YmJAqR5zPvezpjdQoHM5LiG', 0),
(17, 'ADmin3', 'admin3', 93345, 'admin3@example.co', '$2y$10$YXueQrzptxsgScq06RZNI.Qa4ilq.SB43O/A4jbkHQ7JwUYpn.8W6', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
