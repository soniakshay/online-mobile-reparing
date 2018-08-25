-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2016 at 03:06 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `comname`
--

CREATE TABLE `comname` (
  `comid` int(20) NOT NULL,
  `comname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comname`
--

INSERT INTO `comname` (`comid`, `comname`) VALUES
(1, 'samsung'),
(2, 'Nokia '),
(6, 'Asus'),
(7, 'radmi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `uname`, `pwd`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proid` int(20) NOT NULL,
  `comid` int(20) NOT NULL,
  `proname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proid`, `comid`, `proname`) VALUES
(8, 6, 'Zenfon Laser 2'),
(12, 2, 'N72'),
(13, 1, 'galaxy Y');

-- --------------------------------------------------------

--
-- Table structure for table `ragister`
--

CREATE TABLE `ragister` (
  `rid` int(20) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `imei` varchar(100) NOT NULL,
  `detail` varchar(50) NOT NULL,
  `stocknm1` varchar(100) NOT NULL,
  `qty1` int(20) NOT NULL,
  `stocknm2` varchar(100) NOT NULL,
  `qty2` int(20) NOT NULL,
  `stocknm3` varchar(100) NOT NULL,
  `qty3` int(20) NOT NULL,
  `stocknm4` varchar(100) NOT NULL,
  `qty4` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `date` varchar(100) NOT NULL,
  `edate` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `tachid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ragister`
--

INSERT INTO `ragister` (`rid`, `cname`, `email`, `phoneno`, `addr`, `model`, `imei`, `detail`, `stocknm1`, `qty1`, `stocknm2`, `qty2`, `stocknm3`, `qty3`, `stocknm4`, `qty4`, `price`, `date`, `edate`, `status`, `tachid`) VALUES
(78, 'akshay', 'akshayysonii@yahoo.in', '8000623262', '  anand', 'zenfone2', '85858', 'Damage', '21', 1, '', 0, '', 0, '21', 0, 700, '04-02-2015', '12-10-2015', 1, 8),
(79, 'milan', 'milan@gmail.com', '87877878', 'anand', 'zenfone2', '8777', 'Water Damage', '21', 1, '', 0, '', 0, '', 0, 700, '06-02-2015', '10-12-2015', 1, 0),
(80, 'yagnic', 'ya@gmailcom', '787878', 'nand', 'zenfone2', '8787878', 'Damage', '22', 1, '', 0, '', 0, '', 0, 200, '04-02-2016', '06-02-2016', 0, 8),
(81, 'kano', 'kano@gmail.com', '878788', 'anand', 'zenfone2', '444444', 'damage', '22', 1, '', 0, '', 0, '', 0, 300, '04-02-2016', '04-02-2016', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(20) NOT NULL,
  `techid` int(20) NOT NULL,
  `stockid` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` int(20) NOT NULL,
  `add` varchar(50) NOT NULL,
  `imei` varchar(50) NOT NULL,
  `battryno` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `estdate` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(20) NOT NULL,
  `proid` int(20) NOT NULL,
  `stocknm` varchar(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `proid`, `stocknm`, `qty`, `date`) VALUES
(21, 8, 'lcd', 25, '2016-01-23'),
(22, 8, 'mic', 26, '2016-01-23'),
(23, 8, 'speaker', 30, '2016-01-23'),
(24, 8, 'motherbord', 30, '2016-01-23'),
(25, 8, 'touchpad', 30, '2016-01-23'),
(26, 8, 'ic', 30, '2016-01-23'),
(27, 8, 'connector', 30, '2016-01-23'),
(28, 12, 'lcd', 29, '2016-01-23'),
(29, 12, 'mic', 30, '2016-01-23'),
(30, 12, 'speaker', 30, '2016-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `technision`
--

CREATE TABLE `technision` (
  `techid` int(20) NOT NULL,
  `tachname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technision`
--

INSERT INTO `technision` (`techid`, `tachname`) VALUES
(8, 'purv  '),
(10, 'akshay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comname`
--
ALTER TABLE `comname`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `ragister`
--
ALTER TABLE `ragister`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `technision`
--
ALTER TABLE `technision`
  ADD PRIMARY KEY (`techid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comname`
--
ALTER TABLE `comname`
  MODIFY `comid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ragister`
--
ALTER TABLE `ragister`
  MODIFY `rid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `technision`
--
ALTER TABLE `technision`
  MODIFY `techid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
