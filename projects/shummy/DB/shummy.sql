-- phpMyAdmin SQL Dump
-- version 4.4.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2015 at 02:58 PM
-- Server version: 5.5.43-0+deb7u1-log
-- PHP Version: 5.4.41-0+deb7u1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Shummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `Type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Pan Africa Market', '1521 1st Ave, Seattle, WA', 47.608940, -122.340141, 'restaurant'),
(2, 'Buddha Thai & Bar', '2222 2nd Ave, Seattle, WA', 47.613590, -122.344391, 'bar'),
(3, 'The Melting Pot', '14 Mercer St, Seattle, WA', 47.624561, -122.356445, 'restaurant'),
(4, 'Ipanema Grill', '1225 1st Ave, Seattle, WA', 47.606365, -122.337654, 'restaurant'),
(5, 'Sake House', '2230 1st Ave, Seattle, WA', 47.612823, -122.345673, 'bar'),
(6, 'Crab Pot', '1301 Alaskan Way, Seattle, WA', 47.605961, -122.340363, 'restaurant'),
(7, 'Mama''s Mexican Kitchen', '2234 2nd Ave, Seattle, WA', 47.613976, -122.345467, 'bar'),
(8, 'Wingdome', '1416 E Olive Way, Seattle, WA', 47.617214, -122.326584, 'bar'),
(9, 'Piroshky Piroshky', '1908 Pike pl, Seattle, WA', 47.610126, -122.342834, 'restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `Meal_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` float NOT NULL,
  `Posted_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Meal_Photo` text NOT NULL,
  `Status` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`Meal_Id`, `User_Id`, `Title`, `Description`, `Price`, `Posted_Time`, `Meal_Photo`, `Status`, `address`) VALUES
(22, 2, 'Salade Nicoise', 'Les meilleures patates du monde!', 1.45, '2015-07-14 16:14:19', 'http://www.fromagesbergeron.com/upload/2013/07/salade-et-fromage-mariage-incontournable.jpg', 'demande', '41 rue Arson, 06300 Nice'),
(23, 2, 'Patates Frites', 'Les meilleures patates du monde!', 1.45, '2015-07-14 16:15:04', 'http://cdn.rougeframboise.com/wp-content/uploads/2014/07/5-aliments-a-eviter-pour-les-diabetiques-frites.jpg', 'proposition', '40 avenue gallieni nice'),
(24, 2, 'Couscous', 'Les meilleures patates du monde!', 1.45, '2015-07-14 16:15:38', 'http://a402.idata.over-blog.com/4/16/08/28/API/2012-03/24/couscous-aux-l-gumes_2.jpg', 'proposition', '20 rue Gubernatis nice'),
(25, 2, 'Ice Cream', 'Les meilleures patates du monde!', 1.45, '2015-07-14 16:16:50', 'http://images.4ever.eu/data/download/aliments-et-boissons/le-baton-glace-158934.jpg', 'proposition', '74 promenade des anglais nice'),
(27, 5, 'Poulet Frites', 'okok', 2, '2015-07-14 16:16:05', 'http://francoiscoulaud.fr/wp-content/uploads/2012/12/Le-Poulet-frites-n%C2%B05-des-recettes-recherch%C3%A9es.jpg', 'proposition', '1 quai des deux emmanuels nice'),
(39, 10, 'BAnana', 'ben', 14, '2015-07-15 05:51:22', './data/uploads/meals/Banana21.jpg', '', '30 rue de la republique nice'),
(40, 11, 'BBQ Ribs and Vegetables', 'Delicious tender ribs!', 6, '2015-07-15 05:51:10', './data/uploads/meals/6816478369_5a29c021bc_b.jpg', '', '24 avenue Jean Medecin Nice'),
(41, 11, 'Seasoned Beef and Salad', 'Seasoned Beef and Salad', 5, '2015-07-15 05:48:36', './data/uploads/meals/3658284817_058926d944_b.jpg', '', '12 rue Barla nice'),
(42, 11, 'Lasagna', 'Lasagna with 4 cheeses and red sauce', 7, '2015-07-15 05:49:00', './data/uploads/meals/15204287673_5dd9723415_z.jpg', '', '7 avenue Carabacel nice');

-- --------------------------------------------------------

--
-- Table structure for table `meal_order`
--

CREATE TABLE IF NOT EXISTS `meal_order` (
  `Order_Id` int(11) NOT NULL,
  `Time` datetime NOT NULL,
  `Price_Paid` float NOT NULL,
  `User_Id#` int(11) NOT NULL,
  `Meal_Id#` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posted`
--

CREATE TABLE IF NOT EXISTS `posted` (
  `User_Id#` int(11) NOT NULL,
  `Meal_Id#` int(11) NOT NULL,
  `Posted_Time` datetime NOT NULL,
  `Address_Of_Taken_Place` varchar(255) NOT NULL,
  `TakeAway_Or_Shipped` tinyint(1) NOT NULL,
  `Available_Until` datetime NOT NULL,
  `Available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `Rating_Id` int(11) NOT NULL,
  `Rated_User_Id` int(11) NOT NULL,
  `Rated_By_User_Id` int(11) NOT NULL,
  `Time` datetime NOT NULL,
  `Number_Of_Stars` int(5) NOT NULL,
  `Comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `Session_Id` int(11) NOT NULL,
  `Session_Login_Time` datetime NOT NULL,
  `Session_Logout_Time` datetime NOT NULL,
  `Host_Address` text NOT NULL,
  `User_Id#` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Birth_Date` date DEFAULT NULL,
  `User_Description` varchar(255) DEFAULT NULL,
  `User_Photo` blob,
  `User_Address` varchar(255) DEFAULT NULL,
  `Phone_Number` varchar(25) DEFAULT NULL,
  `Facebook_Account` varchar(200) DEFAULT NULL,
  `Creation_Date` datetime DEFAULT NULL,
  `Modification_Date` datetime DEFAULT NULL,
  `Account_Type#` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Email`, `Password`, `First_Name`, `Last_Name`, `Birth_Date`, `User_Description`, `User_Photo`, `User_Address`, `Phone_Number`, `Facebook_Account`, `Creation_Date`, `Modification_Date`, `Account_Type#`) VALUES
(2, 'admin@admin.com', 'admin', 'MOISE', 'Yoann', '0000-00-00', 'Salut les amis', 0x2e2f646174612f75706c6f6164732f6d65616c732f6176617461722e706e67, '18 rue de la rÃ©publique', '0620067', 'https://www.facebook.com/ymoise', NULL, NULL, NULL),
(3, 'ym@test.fr', 'pwd', 'Yoann', 'Moise', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'elmahdi.korfed@gmail.com', 'mdp', 'Elmahdik', 'KORFED', NULL, 'Co-funder of Shummy.', 0x2e2f646174612f75706c6f6164732f6d65616c732f676f6b752e6a7067, '34 avenue Saint Augustin 06200 Nice', '06.86.08.98.08', 'https://www.facebook.com/profile.php?id=100004452317302', NULL, NULL, NULL),
(8, 'yoann@gmail.com', 'yoann', 'Yoann', 'Moise', '1992-11-26', 'Hey I''m Yoann and I love chocolate', NULL, '20 rue Theodore Gasiglia, 06000 Nice', '0123456789', 'http://www.facebook.com/ymoise', NULL, NULL, NULL),
(9, 'kev@kikou.fr', 'kev', 'Kevin', 'Garro', '1992-01-06', NULL, NULL, '471 avenue Evarist Gallois 06400 Biot', NULL, NULL, NULL, NULL, NULL),
(10, 'barack@obama.com', 'obama', 'BALBOA', 'Rocky', '1961-08-04', 'I am the number one.', 0x2e2f646174612f75706c6f6164732f6d65616c732f73796c7665737465722d7374616c6c6f6e652d726f636b792e6a7067, '1600 Pennsylvania Ave NW, Washington, DC 20500', '732-757-2923', 'https://www.facebook.com/barackobama?fref=ts', NULL, NULL, NULL),
(11, 'roselynnchang@berkeley.edu', 'pass', 'Roselynn', 'Chang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'michael.garcia@sjsu.edu', 'pass', 'Michael', 'Gracia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`Type`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`Meal_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `meal_order`
--
ALTER TABLE `meal_order`
  ADD PRIMARY KEY (`Order_Id`),
  ADD UNIQUE KEY `Meal_Id#` (`Meal_Id#`),
  ADD KEY `User_Id#` (`User_Id#`);

--
-- Indexes for table `posted`
--
ALTER TABLE `posted`
  ADD PRIMARY KEY (`User_Id#`,`Meal_Id#`,`Posted_Time`),
  ADD KEY `Meal_Id#` (`Meal_Id#`),
  ADD KEY `Meal_Id#_2` (`Meal_Id#`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`Rating_Id`,`Rated_User_Id`,`Rated_By_User_Id`),
  ADD KEY `Rated_User_Id` (`Rated_User_Id`),
  ADD KEY `Rated_By_User_Id` (`Rated_By_User_Id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Session_Id`),
  ADD KEY `User_Id#` (`User_Id#`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `Account_Type#` (`Account_Type#`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `Meal_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `meal_order`
--
ALTER TABLE `meal_order`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `Rating_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `Session_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
