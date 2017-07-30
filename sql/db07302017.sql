-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.25-MariaDB - mariadb.org binary distribution
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

-- Dumping data for table capgem.tbl_employee: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_employee` ENABLE KEYS */;

-- Dumping structure for table capgem.tbl_loan
CREATE TABLE IF NOT EXISTS `tbl_loan` (
  `loanId` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `memNo` int(10) NOT NULL,
  `accountCode` int(10) NOT NULL,
  `statusID` int(10) NOT NULL,
  `loanAmount` decimal(12,2) NOT NULL,
  `installmentType` int(10) NOT NULL,
  `dateStarted` date NOT NULL,
  PRIMARY KEY (`loanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table capgem.tbl_loan: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_loan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_loan` ENABLE KEYS */;

-- Dumping structure for table capgem.tbl_loantype
CREATE TABLE IF NOT EXISTS `tbl_loantype` (
  `accountCode` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `loanName` varchar(100) NOT NULL DEFAULT '0',
  `interest` decimal(12,2) NOT NULL,
  `deductions` decimal(12,2) NOT NULL,
  `terms` varchar(10) NOT NULL,
  PRIMARY KEY (`accountCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table capgem.tbl_loantype: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_loantype` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_loantype` ENABLE KEYS */;

-- Dumping structure for table capgem.tbl_members
CREATE TABLE IF NOT EXISTS `tbl_members` (
  `memNo` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `memName` varchar(50) NOT NULL,
  `memGender` char(1) NOT NULL,
  `memAddress` varchar(100) NOT NULL,
  `memEmail` varchar(100) NOT NULL,
  `memBirtdate` date NOT NULL,
  `memSpouse` varchar(50) NOT NULL,
  `memPicture` varchar(50) NOT NULL,
  PRIMARY KEY (`memNo`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table capgem.tbl_members: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_members` ENABLE KEYS */;

-- Dumping structure for table capgem.tbl_payments
CREATE TABLE IF NOT EXISTS `tbl_payments` (
  `paymentNo` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `loanId` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`paymentNo`),
  KEY `loanId` (`loanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table capgem.tbl_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;

-- Dumping structure for table capgem.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` int(11) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table capgem.tbl_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `username`, `password`, `access`, `verified`) VALUES
	(1, 'admin', 'admin', 0, 0),
	(2, 'clerk', 'clerk', 1, 0);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
