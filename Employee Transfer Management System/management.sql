-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 07:54 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(111, 'admin', 'admin'),
(112, 'shahzaib', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `suser` varchar(50) NOT NULL,
  `spass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `suser`, `spass`) VALUES
(101, 'Arif', '1234'),
(102, 'hamza', '1234'),
(103, 'danial', '1234'),
(104, 'dany', '1234'),
(107, 'dua', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `empid` int(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `designation` varchar(32) NOT NULL,
  `nationality` varchar(32) NOT NULL,
  `cnic` varchar(20) NOT NULL,
  `jdate` varchar(20) NOT NULL,
  `workexp` varchar(20) NOT NULL,
  `salary` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`empid`, `first_name`, `last_name`, `address`, `contact`, `designation`, `nationality`, `cnic`, `jdate`, `workexp`, `salary`) VALUES
(101, 'Arif', 'Samad', 'Sector 4-1, karachi', '0345-3305509', 'Team Lead', 'Pakistani', '4101-321789-03', '03-oct-2007', '8 years ', '45000'),
(102, 'hamza', 'qazi', 'Gulshan block 3', '0311-6547894', 'HR Manager', 'Pakistani', '4103-987123-03', '17-jul-2006', '10 years', '70000'),
(103, 'danial', 'raza', 'gulberg block 1', '0312-6543217', 'Manager', 'Pakistani', '4301-6543217-02', '03-dec-2010', '6 years ', '60000'),
(104, 'dany', 'zafar', 'Torinto', '0345-1236549', 'G-Manager', 'Canadian', '4105-2136548-03', '02-jul-2012', '2 years', '35000'),
(107, 'dua', 'mumtaz', 'North Nazimabad', '0345-4525631', 'Director', 'Pakistani', '4101-321456-03', '28-Aug-2012', '6 years', '75000');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `trans_id` int(32) NOT NULL,
  `empid` int(32) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `from_designation` varchar(32) NOT NULL,
  `to_designation` varchar(32) NOT NULL,
  `jdate` varchar(15) NOT NULL,
  `workexp` varchar(10) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `request` varchar(255) NOT NULL,
  `req_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`trans_id`, `empid`, `fullname`, `from_designation`, `to_designation`, `jdate`, `workexp`, `salary`, `request`, `req_status`) VALUES
(1, 101, 'Arif Samad', 'Team Lead', 'Project Manager', '03-oct-2007', '8 years', '60,000', 'i am working here for past 4 years.', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1114;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `empid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `trans_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
