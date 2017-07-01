-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for capgem
CREATE DATABASE IF NOT EXISTS `capgem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `capgem`;

-- Dumping structure for table capgem.tbl_employee
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `empNo` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `empName` varchar(100) NOT NULL,
  `empGender` char(1) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empBirthdate` date NOT NULL,
  `empPicture` varchar(100) NOT NULL,
  `loanId` varchar(100) NOT NULL,
  PRIMARY KEY (`empNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table capgem.tbl_loan
CREATE TABLE IF NOT EXISTS `tbl_loan` (
  `loanID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `memNo` int(10) NOT NULL,
  `paymentNo` int(10) NOT NULL,
  `accountCode` int(10) NOT NULL,
  `statusID` int(10) NOT NULL,
  `loanAmount` decimal(12,2) NOT NULL,
  `installmentType` int(10) NOT NULL,
  `dateStarted` date NOT NULL,
  PRIMARY KEY (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table capgem.tbl_loantype
CREATE TABLE IF NOT EXISTS `tbl_loantype` (
  `accountCode` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `loanName` varchar(100) NOT NULL DEFAULT '0',
  `interest` decimal(12,2) NOT NULL,
  `deductions` decimal(12,2) NOT NULL,
  `terms` varchar(10) NOT NULL,
  PRIMARY KEY (`accountCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table capgem.tbl_members
CREATE TABLE IF NOT EXISTS `tbl_members` (
  `memNo` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `memUsername` varchar(50) NOT NULL DEFAULT '0',
  `memPassword` varchar(50) NOT NULL DEFAULT '0',
  `memName` varchar(50) NOT NULL,
  `memGender` char(1) NOT NULL,
  `memAddress` varchar(100) NOT NULL,
  `memEmail` varchar(100) NOT NULL,
  `memBirtdate` date NOT NULL,
  `memSpouse` varchar(50) NOT NULL,
  `memPicture` varchar(50) NOT NULL,
  PRIMARY KEY (`memNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
