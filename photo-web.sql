-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 04:55 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photo`
--
CREATE DATABASE `photo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `photo`;

-- --------------------------------------------------------

--
-- Table structure for table `accessories_details`
--

CREATE TABLE IF NOT EXISTS `accessories_details` (
  `ASC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ASC_NAME` varchar(35) NOT NULL,
  PRIMARY KEY (`ASC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `accessories_details`
--

INSERT INTO `accessories_details` (`ASC_ID`, `ASC_NAME`) VALUES
(1, 'MUG'),
(2, 'KITCHEN'),
(3, 'BAG'),
(4, 'WATER BAG'),
(5, 'T-SHIRT'),
(6, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `accessories_mst`
--

CREATE TABLE IF NOT EXISTS `accessories_mst` (
  `ASS_C_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DATE` varchar(25) NOT NULL,
  `BILL_NO` varchar(5) NOT NULL,
  `ORDER_NO` int(11) NOT NULL,
  `ORDER_REF_NO` varchar(25) NOT NULL,
  `CUSTOMER_ID` int(3) NOT NULL,
  `ASC_ID` int(3) NOT NULL,
  `QTY` bigint(3) NOT NULL,
  `RATE` bigint(10) NOT NULL,
  `TOTAL` double(10,2) NOT NULL,
  `FLAG` int(1) NOT NULL,
  PRIMARY KEY (`ASS_C_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `accessories_mst`
--

INSERT INTO `accessories_mst` (`ASS_C_ID`, `DATE`, `BILL_NO`, `ORDER_NO`, `ORDER_REF_NO`, `CUSTOMER_ID`, `ASC_ID`, `QTY`, `RATE`, `TOTAL`, `FLAG`) VALUES
(1, '09-04-2018', '1', 1, 'AS20180001', 1, 1, 2, 250, 500.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_mst`
--

CREATE TABLE IF NOT EXISTS `admin_mst` (
  `ADMIN_ID` int(3) NOT NULL AUTO_INCREMENT,
  `ADMIN_NAME` varchar(25) NOT NULL,
  `LOGIN_ID` varchar(25) NOT NULL,
  `LOGIN_PASSWORD` varchar(25) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_mst`
--

INSERT INTO `admin_mst` (`ADMIN_ID`, `ADMIN_NAME`, `LOGIN_ID`, `LOGIN_PASSWORD`) VALUES
(1, 'psbardoli', 'psbardoli', 'ps1230');

-- --------------------------------------------------------

--
-- Table structure for table `album_mst`
--

CREATE TABLE IF NOT EXISTS `album_mst` (
  `ALBUM_ID` int(3) NOT NULL AUTO_INCREMENT,
  `ALBUM_DATE` varchar(12) NOT NULL,
  `ALBUM_NAME` varchar(55) NOT NULL,
  `YEAR` int(2) NOT NULL,
  `FLAG` int(2) NOT NULL,
  PRIMARY KEY (`ALBUM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `album_mst`
--

INSERT INTO `album_mst` (`ALBUM_ID`, `ALBUM_DATE`, `ALBUM_NAME`, `YEAR`, `FLAG`) VALUES
(1, '09-04-2018', 'Outdoor Shooting', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `CUSTOMER_ID` int(3) NOT NULL AUTO_INCREMENT,
  `AC_OPEN` varchar(12) NOT NULL,
  `CUSTOMER_NAME` varchar(20) NOT NULL,
  `CUSTOMER_CONTACT` bigint(12) NOT NULL,
  `CUSTOMER_ADDRESS` text NOT NULL,
  `CUSTOMER_EMAIL` varchar(55) NOT NULL,
  `CUSTOMER_FB_NAME` text NOT NULL,
  `DATEOFBIRTH` varchar(12) NOT NULL,
  `CITY_NAME` varchar(25) NOT NULL,
  PRIMARY KEY (`CUSTOMER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`CUSTOMER_ID`, `AC_OPEN`, `CUSTOMER_NAME`, `CUSTOMER_CONTACT`, `CUSTOMER_ADDRESS`, `CUSTOMER_EMAIL`, `CUSTOMER_FB_NAME`, `DATEOFBIRTH`, `CITY_NAME`) VALUES
(1, '09-04-2018', 'Vishal Chauhan', 9978274939, 'Janta Society, Station Road, Bardoli', 'vishalchauhan307@gmail.com', 'vishal_chauhan', '26-May-1998', 'Bardoli');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `EMPLOYEE_ID` int(3) NOT NULL AUTO_INCREMENT,
  `AC_OPEN` varchar(12) NOT NULL,
  `EMPLOYEE_NAME` varchar(25) NOT NULL,
  `CONTACT_NO` bigint(12) NOT NULL,
  `DATEOFBIRTH` varchar(12) NOT NULL,
  `ADDRESS` text NOT NULL,
  `CITY_NAME` varchar(25) NOT NULL,
  `EMAIL_ID` varchar(55) NOT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`EMPLOYEE_ID`, `AC_OPEN`, `EMPLOYEE_NAME`, `CONTACT_NO`, `DATEOFBIRTH`, `ADDRESS`, `CITY_NAME`, `EMAIL_ID`) VALUES
(1, '09-04-2018', 'Harsh Patel', 8238231344, '20-Nov-1997', 'Navdurga Society, Near JM Patel High School, Bardoli', 'Bardoli', 'hp2036164@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `function_details`
--

CREATE TABLE IF NOT EXISTS `function_details` (
  `FUNCTION_ID` int(3) NOT NULL AUTO_INCREMENT,
  `FUNCTION_NAME` varchar(25) NOT NULL,
  PRIMARY KEY (`FUNCTION_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `function_details`
--

INSERT INTO `function_details` (`FUNCTION_ID`, `FUNCTION_NAME`) VALUES
(1, 'HALDI CEREMONY'),
(2, 'RECEPTION CEREMONY'),
(3, 'WEDDING CEREMONY');

-- --------------------------------------------------------

--
-- Table structure for table `image_mst`
--

CREATE TABLE IF NOT EXISTS `image_mst` (
  `IMAGE_ID` int(3) NOT NULL AUTO_INCREMENT,
  `IMAGE` text NOT NULL,
  `YEAR_ID` int(3) NOT NULL,
  `ALBUM_ID` int(3) NOT NULL,
  `FLAG` int(1) NOT NULL,
  PRIMARY KEY (`IMAGE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `image_mst`
--

INSERT INTO `image_mst` (`IMAGE_ID`, `IMAGE`, `YEAR_ID`, `ALBUM_ID`, `FLAG`) VALUES
(1, 'upload/images/IMG110418060452.jpg', 2, 1, 0),
(2, 'upload/images/IMG110418060412.jpg', 2, 1, 0),
(3, 'upload/images/IMG110418060424.jpg', 2, 1, 0),
(4, 'upload/images/IMG110418060457.jpg', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_mst`
--

CREATE TABLE IF NOT EXISTS `invoice_mst` (
  `INVOICE_ID` int(11) NOT NULL,
  `ORDER_NO` int(11) NOT NULL,
  `BILL_ID` int(11) NOT NULL,
  `BILL_NO` varchar(10) NOT NULL,
  `BILL_DATE` varchar(12) NOT NULL,
  PRIMARY KEY (`INVOICE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_mst`
--

INSERT INTO `invoice_mst` (`INVOICE_ID`, `ORDER_NO`, `BILL_ID`, `BILL_NO`, `BILL_DATE`) VALUES
(1, 1, 1, 'PS180001', '09-04-2018');

-- --------------------------------------------------------

--
-- Table structure for table `order_mst`
--

CREATE TABLE IF NOT EXISTS `order_mst` (
  `ORDER_ID` int(11) NOT NULL,
  `ORDER_NO` int(11) NOT NULL,
  `ORDER_REF_NO` varchar(11) NOT NULL,
  `ORDER_DATE` varchar(12) NOT NULL,
  `BOOKING_DATE` varchar(12) DEFAULT NULL,
  `CUSTOMER_ID` int(3) NOT NULL,
  `ORDER_TYPE` varchar(1) NOT NULL,
  `FUNCTION_ID` int(3) DEFAULT NULL,
  `FUNCTION_DATE` varchar(12) DEFAULT NULL,
  `FUNCTION_TIME` varchar(12) DEFAULT NULL,
  `NO_of_CAM` int(2) DEFAULT NULL,
  `NO_of_DSLR` int(2) NOT NULL,
  `NO_of_VIDEO` int(2) NOT NULL,
  `RATE_CAM` bigint(5) NOT NULL,
  `RATE_DSLR` bigint(5) NOT NULL,
  `RATE_VIDEO` bigint(5) NOT NULL,
  `LOCATION` varchar(25) DEFAULT NULL,
  `FLAG` int(2) NOT NULL,
  PRIMARY KEY (`ORDER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_mst`
--

INSERT INTO `order_mst` (`ORDER_ID`, `ORDER_NO`, `ORDER_REF_NO`, `ORDER_DATE`, `BOOKING_DATE`, `CUSTOMER_ID`, `ORDER_TYPE`, `FUNCTION_ID`, `FUNCTION_DATE`, `FUNCTION_TIME`, `NO_of_CAM`, `NO_of_DSLR`, `NO_of_VIDEO`, `RATE_CAM`, `RATE_DSLR`, `RATE_VIDEO`, `LOCATION`, `FLAG`) VALUES
(1, 1, 'OS20180001', '09-04-2018', '14-04-2018', 1, 'O', NULL, NULL, NULL, 2, 2, 2, 2500, 2500, 2500, 'Dumas', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_invoice_mst`
--

CREATE TABLE IF NOT EXISTS `p_invoice_mst` (
  `P_INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_BILL_NO` int(11) NOT NULL,
  `P_BILL_DATE` varchar(25) NOT NULL,
  `P_ORDER_ID` varchar(25) NOT NULL,
  `P_CUSTOMER_ID` int(11) NOT NULL,
  `ALBUM_NAME` varchar(150) NOT NULL,
  `PAPER_NAME` varchar(100) NOT NULL,
  `A_SIZE` varchar(20) DEFAULT NULL,
  `A_QTY` bigint(20) NOT NULL,
  `A_PRICE` bigint(20) NOT NULL,
  `A_TOTAL` bigint(20) NOT NULL,
  `FRAME_NAME` varchar(35) NOT NULL,
  `F_QTY` bigint(20) NOT NULL,
  `F_PRICE` bigint(20) NOT NULL,
  `F_TOTAL` bigint(20) NOT NULL,
  `M_FLAG` int(11) NOT NULL,
  PRIMARY KEY (`P_INVOICE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `p_invoice_mst`
--

INSERT INTO `p_invoice_mst` (`P_INVOICE_ID`, `P_BILL_NO`, `P_BILL_DATE`, `P_ORDER_ID`, `P_CUSTOMER_ID`, `ALBUM_NAME`, `PAPER_NAME`, `A_SIZE`, `A_QTY`, `A_PRICE`, `A_TOTAL`, `FRAME_NAME`, `F_QTY`, `F_PRICE`, `F_TOTAL`, `M_FLAG`) VALUES
(1, 1, '09-04-2018', 'PS20181', 1, 'Metallic', '', '12*36', 5, 125, 625, '', 0, 0, 0, 0),
(2, 2, '09-04-2018', 'PS20181', 1, 'NULL', 'Metallic', '12*36', 5, 125, 625, '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo_albumdetails`
--

CREATE TABLE IF NOT EXISTS `photo_albumdetails` (
  `PALBUM_ID` int(3) NOT NULL AUTO_INCREMENT,
  `CUSTOMER_ID` int(3) NOT NULL,
  `ORDER_NO` int(3) NOT NULL,
  `TYPE_ID` int(3) NOT NULL,
  `SUBTYPE_ID` int(3) NOT NULL,
  `QTY` int(3) NOT NULL,
  `SIZE` varchar(8) NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `TOTAL` decimal(10,2) NOT NULL,
  `FLAG` int(2) NOT NULL,
  PRIMARY KEY (`PALBUM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `photo_albumdetails`
--

INSERT INTO `photo_albumdetails` (`PALBUM_ID`, `CUSTOMER_ID`, `ORDER_NO`, `TYPE_ID`, `SUBTYPE_ID`, `QTY`, `SIZE`, `PRICE`, `TOTAL`, `FLAG`) VALUES
(1, 1, 1, 1, 1, 2, '12x30', '2500.00', '5000.00', 1),
(2, 1, 1, 2, 2, 1, '', '10000.00', '10000.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photography_mst`
--

CREATE TABLE IF NOT EXISTS `photography_mst` (
  `PHOTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `P_ORDER` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `ORDER_ID` varchar(25) NOT NULL,
  `ORDER_DATE` varchar(35) NOT NULL,
  `PHOTO_UID` varchar(100) DEFAULT NULL,
  `ALBUM_NAME` varchar(150) DEFAULT NULL,
  `PAPER_NAME` varchar(35) NOT NULL,
  `PHOTO_SIZE` varchar(10) NOT NULL,
  `PHOTO_QTY` bigint(20) NOT NULL,
  `PHOTO_RATE` bigint(20) NOT NULL,
  `FRAME_NAME` varchar(35) NOT NULL,
  `FRAME_QTY` bigint(20) NOT NULL,
  `FRAME_RATE` bigint(20) NOT NULL,
  `FLAG` int(1) NOT NULL,
  PRIMARY KEY (`PHOTO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `photography_mst`
--

INSERT INTO `photography_mst` (`PHOTO_ID`, `P_ORDER`, `CUSTOMER_ID`, `ORDER_ID`, `ORDER_DATE`, `PHOTO_UID`, `ALBUM_NAME`, `PAPER_NAME`, `PHOTO_SIZE`, `PHOTO_QTY`, `PHOTO_RATE`, `FRAME_NAME`, `FRAME_QTY`, `FRAME_RATE`, `FLAG`) VALUES
(1, 1, 1, 'PS20181', '09-04-2018', 'WAM001 - WAM005', 'NULL', 'Metallic', '12*36', 5, 125, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_mst`
--

CREATE TABLE IF NOT EXISTS `slider_mst` (
  `SLIDER_ID` int(2) NOT NULL AUTO_INCREMENT,
  `SLIDER_IMAGE` text NOT NULL,
  `FLAG` int(1) NOT NULL,
  PRIMARY KEY (`SLIDER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider_mst`
--

INSERT INTO `slider_mst` (`SLIDER_ID`, `SLIDER_IMAGE`, `FLAG`) VALUES
(1, 'upload/slider/banner-img-1.jpg', 0),
(2, 'upload/slider/banner-img-2.jpg', 0),
(3, 'upload/slider/banner-img-3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subtype_mst`
--

CREATE TABLE IF NOT EXISTS `subtype_mst` (
  `SUBTYPE_ID` int(3) NOT NULL AUTO_INCREMENT,
  `SUBTYPE_NAME` varchar(12) NOT NULL,
  `TYPE_ID` int(3) NOT NULL,
  PRIMARY KEY (`SUBTYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subtype_mst`
--

INSERT INTO `subtype_mst` (`SUBTYPE_ID`, `SUBTYPE_NAME`, `TYPE_ID`) VALUES
(1, 'Karizma', 1),
(2, 'PHOTO1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `type_mst`
--

CREATE TABLE IF NOT EXISTS `type_mst` (
  `TYPE_ID` int(3) NOT NULL AUTO_INCREMENT,
  `TYPE_NAME` varchar(25) NOT NULL,
  PRIMARY KEY (`TYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `type_mst`
--

INSERT INTO `type_mst` (`TYPE_ID`, `TYPE_NAME`) VALUES
(1, 'ALBUM'),
(2, 'MOVIE'),
(3, 'PP ALBUM'),
(4, 'LIVE');

-- --------------------------------------------------------

--
-- Table structure for table `video_mst`
--

CREATE TABLE IF NOT EXISTS `video_mst` (
  `VIDEO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VIDEO_DATE` varchar(12) NOT NULL,
  `VIDEO` text NOT NULL,
  `IMAGE` text NOT NULL,
  `DESCRIPTION` varchar(150) NOT NULL,
  `FLAG` int(1) NOT NULL,
  PRIMARY KEY (`VIDEO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `video_mst`
--

INSERT INTO `video_mst` (`VIDEO_ID`, `VIDEO_DATE`, `VIDEO`, `IMAGE`, `DESCRIPTION`, `FLAG`) VALUES
(5, '12-04-2018', 'https://www.youtube.com/embed/-ysOCzfLGwE', 'upload/videos/IMG120418040434.jpg', '', 0),
(6, '12-04-2018', 'https://www.youtube.com/embed/5GAQYlouVbs', 'upload/videos/IMG120418040419.jpg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year_mst`
--

CREATE TABLE IF NOT EXISTS `year_mst` (
  `YEAR_ID` int(3) NOT NULL AUTO_INCREMENT,
  `YEAR` bigint(4) NOT NULL,
  PRIMARY KEY (`YEAR_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `year_mst`
--

INSERT INTO `year_mst` (`YEAR_ID`, `YEAR`) VALUES
(2, 2015),
(3, 2016),
(4, 2017),
(5, 2018);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
