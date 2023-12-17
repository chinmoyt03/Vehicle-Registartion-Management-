-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 03:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rto_management_system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DrivingLicenseRecord` ()  BEGIN
SELECT * FROM `drivinglicense` LEFT JOIN enroller ON drivinglicense.enrollerid=enroller.enrollerid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LLR_Record` ()  BEGIN
SELECT * from llr left join enroller ON llr.enrollerid=enroller.enrollerid LEFT JOIN state ON state.stateid=llr.stateid LEFT JOIN city ON city.cityid=llr.cityid LEFT JOIN vehicletype ON vehicletype.vehicletypeid=llr.vehicletypeid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PaymentRecord` ()  BEGIN
SELECT * from payment left join enroller ON payment.enrollerid=enroller.enrollerid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VehicleRegistrationRecord` ()  BEGIN
SELECT * FROM vehicleregistration LEFT JOIN enroller ON vehicleregistration.enrollerid=enroller.enrollerid LEFT JOIN state ON state.stateid=vehicleregistration.stateid LEFT JOIN city ON city.cityid=vehicleregistration.cityid LEFT JOIN vehicletype ON vehicletype.vehicletypeid = vehicleregistration.vehicletypeid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchid` int(10) NOT NULL,
  `branchname` varchar(25) NOT NULL,
  `branchaddress` text NOT NULL,
  `cityid` int(10) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `stateid` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--


-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` int(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `stateid` int(10) NOT NULL,
  `citycode` varchar(10) NOT NULL,
  `discription` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `city`, `stateid`, `citycode`, `discription`, `status`) VALUES
(1, 'ghy', 1, '781003', 'AS-01', 'Active')
;

-- --------------------------------------------------------

--
-- Table structure for table `drivinglicense`
--

CREATE TABLE `drivinglicense` (
  `drivinglicenseid` int(10) NOT NULL,
  `enrollerid` int(10) NOT NULL,
  `llrid` int(10) NOT NULL,
  `dltype` varchar(50) NOT NULL,
  `stateid` int(10) NOT NULL,
  `cityid` int(10) NOT NULL,
  `vehicletypeid` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `swdof` varchar(50) NOT NULL,
  `paddr` text NOT NULL,
  `taddr` text NOT NULL,
  `paddrduration` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `birthplace` varchar(25) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `identificationmarks` varchar(50) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `previousdl` varchar(50) NOT NULL,
  `applicationdate` date NOT NULL,
  `testdate` date NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `dlno` varchar(25) NOT NULL,
  `document` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `drivinglicense`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` int(10) NOT NULL,
  `emptype` varchar(20) NOT NULL,
  `branchid` int(10) NOT NULL,
  `empname` varchar(25) NOT NULL,
  `loginid` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `emptype`, `branchid`, `empname`, `loginid`, `password`, `status`) VALUES
(1, 'Admin', 5, 'Ratul', 'admin', 'abc', 'Active')
;

-- --------------------------------------------------------

--
-- Table structure for table `enroller`
--

CREATE TABLE `enroller` (
  `enrollerid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `enroller`
--


-- --------------------------------------------------------

--
-- Table structure for table `llr`
--

CREATE TABLE `llr` (
  `llrid` int(10) NOT NULL,
  `enrollerid` int(10) NOT NULL,
  `llrtype` varchar(50) NOT NULL,
  `stateid` int(10) NOT NULL,
  `cityid` int(10) NOT NULL,
  `vehicletypeid` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `swd` varchar(25) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `paddr` text NOT NULL,
  `taddr` text NOT NULL,
  `paddrduration` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `identificationmarks` text NOT NULL,
  `bloodgroup` varchar(25) NOT NULL,
  `applicationdate` date NOT NULL,
  `testdate` date NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `note` text NOT NULL,
  `document` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `llr`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(10) NOT NULL,
  `enrollerid` int(10) NOT NULL,
  `paymenttype` varchar(25) NOT NULL,
  `paidfor` varchar(20) NOT NULL,
  `paidid` int(10) NOT NULL,
  `paidamt` float(10,2) NOT NULL,
  `paiddate` date NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--


-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `qid` int(10) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `answer` varchar(25) NOT NULL,
  `img` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--


-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `statecode` varchar(10) NOT NULL,
  `discription` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `state`, `statecode`, `discription`, `status`) VALUES
(1, 'Karnataka', 'KA', 'Karnataka State RTO', 'Active'),
(2, 'Kerala', '22', 'Kerala state', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testid` int(10) NOT NULL,
  `enrollerid` int(10) NOT NULL,
  `examfor` varchar(25) NOT NULL,
  `qid` int(10) NOT NULL,
  `answer` varchar(10) NOT NULL,
  `marks` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--


-- --------------------------------------------------------

--
-- Table structure for table `vehicleregistration`
--

CREATE TABLE `vehicleregistration` (
  `vehicleregid` int(10) NOT NULL,
  `enrollerid` int(10) NOT NULL,
  `stateid` int(10) NOT NULL,
  `cityid` int(10) NOT NULL,
  `ownername` varchar(50) NOT NULL,
  `swdof` varchar(50) NOT NULL,
  `regtype` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `paddr` text NOT NULL,
  `taddr` text NOT NULL,
  `paddrduration` varchar(50) NOT NULL,
  `pancardno` varchar(25) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `vehiclepurchasedfrom` text NOT NULL,
  `vehicletypeid` int(10) NOT NULL,
  `vehicledetail` text NOT NULL,
  `chasisno` varchar(50) NOT NULL,
  `engineno` varchar(50) NOT NULL,
  `seatingcapacity` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `vehicleimg` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `vehicleno` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vehicleregistration`
--


-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `vehicletypeid` int(10) NOT NULL,
  `vehicletype` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `llrcost` float(100,2) NOT NULL,
  `dlcost` double(100,2) NOT NULL,
  `vehicleregcost` double(100,2) NOT NULL,
  `addresschangecost` double(100,2) NOT NULL,
  `dlrenewalcost` double(100,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicletype`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `drivinglicense`
--
ALTER TABLE `drivinglicense`
  ADD PRIMARY KEY (`drivinglicenseid`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `enroller`
--
ALTER TABLE `enroller`
  ADD PRIMARY KEY (`enrollerid`);

--
-- Indexes for table `llr`
--
ALTER TABLE `llr`
  ADD PRIMARY KEY (`llrid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testid`);

--
-- Indexes for table `vehicleregistration`
--
ALTER TABLE `vehicleregistration`
  ADD PRIMARY KEY (`vehicleregid`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`vehicletypeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branchid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `drivinglicense`
--
ALTER TABLE `drivinglicense`
  MODIFY `drivinglicenseid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enroller`
--
ALTER TABLE `enroller`
  MODIFY `enrollerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `llr`
--
ALTER TABLE `llr`
  MODIFY `llrid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `vehicleregistration`
--
ALTER TABLE `vehicleregistration`
  MODIFY `vehicleregid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `vehicletypeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
