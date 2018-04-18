-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2018 at 03:50 PM
-- Server version: 5.6.38-83.0-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saletanc_pipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `a_name` varchar(255) NOT NULL,
  `a_pass` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_num` varchar(255) NOT NULL,
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`a_name`, `a_pass`, `a_email`, `a_num`, `a_id`, `zip`, `city`, `street`, `country`, `state`) VALUES
('Aman Adhikari', 'amanneox', 'amanadhikari2@gmail.com', '9557672252', 1, '248001', 'Delhi', 'A -1111', 'India', 'UK'),
('Mansi Babbar', 'hello', 'mansi7babbar@gmail.com', '8802481024', 2, '110035', 'Delhi', 'B-4', 'India', 'Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `AppID` int(11) NOT NULL AUTO_INCREMENT,
  `AppDate` datetime NOT NULL,
  `AppDesc` text NOT NULL,
  `scrm_id` int(40) NOT NULL,
  `status` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AppID`),
  KEY `u_id` (`u_id`),
  KEY `scrm_id` (`scrm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`AppID`, `AppDate`, `AppDesc`, `scrm_id`, `status`, `u_id`, `datecreated`) VALUES
(19, '2018-04-01 12:00:00', 'New Appointment', 403, 'Lead completed by SDR', 6, '2018-04-12 20:37:58'),
(22, '2018-04-09 02:15:36', 'this is an update appointment', 0, 'Lead completed by SDR', 6, '2018-04-12 20:45:36'),
(23, '2018-04-13 02:16:17', 'this is a new appointment', 413, 'Lead completed by SDR', 6, '2018-04-12 20:46:17'),
(24, '2018-04-13 02:16:46', 'this is done', 404, 'Deal Closed', 6, '2018-04-12 20:46:46'),
(25, '2018-04-13 02:18:46', 'done', 406, 'Lead completed by SDR', 6, '2018-04-12 20:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`e_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#3a87ad',
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` varchar(50) NOT NULL DEFAULT 'true',
  `u_id` int(11) NOT NULL,
  `current_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `color`, `start`, `end`, `allDay`, `u_id`, `current_time`) VALUES
(5, 'test', 'ok', '#3a87ad', '2018-04-05 00:00:00', '2018-04-06 00:00:00', 'true', 9, '0000-00-00 00:00:00'),
(6, 'fmkfmkfmfk', 'fn', '#3a87ad', '2018-04-05 00:00:00', '2018-04-06 00:00:00', 'true', 6, '2018-04-12 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `scrm_id` int(40) NOT NULL AUTO_INCREMENT,
  `leadowner` varchar(30) NOT NULL,
  `leadownerid` varchar(20) NOT NULL,
  `company` varchar(40) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `title` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `directphone` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `website` varchar(40) NOT NULL,
  `leadsource` varchar(20) NOT NULL,
  `leadstatus` varchar(255) NOT NULL DEFAULT 'Not Set',
  `industry` varchar(20) NOT NULL,
  `subindustry` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `country` varchar(20) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `skypeid` varchar(20) NOT NULL,
  `salutation` varchar(20) NOT NULL,
  `secondry` varchar(20) NOT NULL,
  `linkedinid` varchar(20) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `emprange` varchar(255) NOT NULL,
  `revrange` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`scrm_id`),
  KEY `u_id` (`u_id`),
  KEY `scrm_id` (`scrm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=488 ;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`scrm_id`, `leadowner`, `leadownerid`, `company`, `firstname`, `lastname`, `title`, `email`, `phone`, `directphone`, `mobile`, `website`, `leadsource`, `leadstatus`, `industry`, `subindustry`, `address`, `city`, `state`, `pincode`, `country`, `desc`, `skypeid`, `salutation`, `secondry`, `linkedinid`, `notes`, `emprange`, `revrange`, `u_id`, `datecreated`) VALUES
(403, 'Project Manager Name', 'scrm_3102017045', 'Avon Beauty Products India Private Limit', 'Nandita Johar', 'Kitzman', 'CEO', 'Chau-kitzman0@gmail.com', '120', '120', '9651123456', 'http://www.bentonjohnbjr.com', '', 'Deal Closed', '', '', '4Th Floor Tower - C Global Business Prak', 'Orleans', 'Hey people', '', '', '', 'None', '', '', 'https://www.linkedin', 'New Appointment', '', '', 6, '2018-04-12 20:37:37'),
(404, 'Project Manager Name', 'scrm_3102017046', 'Floor & Furnishing', 'Mr. Nakul Khand', 'Adhikari', 'CEO', 'amanadhikari2@gmail.com', '2147483647', '2147483647', '9557672252', 'FKFNFNK', '', 'Deal Closed', '', '', 'S&F Tower Floor No 42 Sec 32 Industrial Area', 'India', 'Dev', '', '', '', 'none', '', '', 'dev', 'this is done', '', '', 6, '2018-04-12 20:37:37'),
(405, 'Project Manager Name', 'scrm_3102017047', 'Yum Restaurants India Private Limited (G', 'Mr. Niren  Chau', 'Kitzman', 'Director', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', '12Th Floor, Tower D Global Park -', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(406, 'Project Manager Name', 'scrm_3102017048', 'Aksasia Creations Pvt Ltd', 'Mr. Arvind Kuma', 'Frey', 'Director', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', 'Lead completed by SDR', '', '', 'Plot no. 142-I, NSEZ, Phase 2', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', 'done', '', '', 6, '2018-04-12 20:37:37'),
(407, 'Project Manager Name', 'scrm_3102017049', 'Sara Trans Industries', 'Mr. Jasbeer Sin', 'Haroldson', 'Director', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Plot No 76-77, NSEZ, Phase 2', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(408, 'Project Manager Name', 'scrm_3102017050', 'De Core Science & Technologies Ltd', 'Mr. Deepak Loom', 'Kitzman', 'Deputy General Manag', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Plot No. 59-H(B), NSEZ, Phase 2', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(409, 'Project Manager Name', 'scrm_3102017051', 'Continental Hardware Pvt Ltd', 'Mr. Davinder si', 'Frey', 'Director', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'Polt No-59-J(D) , SDF: G-1, NSEZ, Phase 2', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(410, 'Project Manager Name', 'scrm_3102017052', 'Suparshva Swabs India', 'Mr. Rahul Jain', 'Haroldson', 'Director IT', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Plot No. 129G/13 & SDF. No I-8 , NSEZ, Phase 2', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(411, 'Project Manager Name', 'scrm_3102017053', 'Advance Valves Global', 'Mr. Pranay S. G', 'Kitzman', 'Director', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Plot No  142 A & B, NSEZ, Phase 2', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(412, 'Project Manager Name', 'scrm_3102017054', 'Bhartiya Industries', 'Mr. Balbir Sing', 'Frey', 'Director', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'E-51, Sector 9 Noida', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(413, 'Project Manager Name', 'scrm_3102017055', 'Knk Bag Manufacturing Co', 'Mr. Deepak Shin', 'Haroldson', 'Director', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Plot No. 27 ,NSEZ', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(414, 'Project Manager Name', 'scrm_3102017056', 'Associated Lighting Co', 'Mr. Arjun Nath', 'Kitzman', 'Director IT', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Plot No-101 & 102 ,NSEZ ,Phase 2', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(415, 'Project Manager Name', 'scrm_3102017057', 'Guru Impex', 'Mr. Harsh Walia', 'Frey', 'Director', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'Plot No-95, NSEZ , Noida', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(416, 'Project Manager Name', 'scrm_3102017058', 'Vibgyor International', 'Mr. Vibhor Gupt', 'Haroldson', 'Director', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Plot No 173-174,NSEZ', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(417, 'Project Manager Name', 'scrm_3102017059', 'Lakeland Gloves & Safety Apparel Pvt Ltd', 'Mr. Vishal Kuma', 'Kitzman', 'Director', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'B-42, NSEZ', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(418, 'Project Manager Name', 'scrm_3102017060', 'Kris Flexipacks Pvt Ltd', 'ANINDYA SENGUPT', 'Frey', 'Chairman', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'Plot No 142A/55, 129G/45, NSEZ', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(419, 'Project Manager Name', 'scrm_3102017061', 'Sara-Trans Export Corp', 'Mr. Jasbeer Sin', 'Haroldson', 'Managing Director', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Plot No. 76-77, NSEZ', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(420, 'Project Manager Name', 'scrm_3102017062', 'American Express (India) Pvt  Ltd ', 'Mr. Sanjay Kaul', 'Kitzman', 'Vice President Of Fi', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Cyber City, Tower-C, DLF Bldg. No.8 , Sector-25, DLF City Ph-II', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(421, 'Project Manager Name', 'scrm_3102017063', 'Action Constructions Equipment Private L', 'Sorab Agarwal', 'Frey', 'CEO', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'Dudhola Link Road Dudhola Distt Palwal', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(422, 'Project Manager Name', 'scrm_3102017064', 'Aero Traders Private Limited', 'Mr. Alok  Praka', 'Haroldson', 'Chief Executive Offi', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'No 2168 Gurdwara Road Karol Bagh', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(423, 'Project Manager Name', 'scrm_3102017065', 'Aov International Private Limited', 'Mr. Rakesh Gaut', 'Kitzman', 'Vice President', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Sector - 59', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(424, 'Project Manager Name', 'scrm_3102017066', 'Aravali Printers & Publishers Private Li', 'Mr. Madan  Goel', 'Frey', 'Managing Director', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'W - 30, Phase=Ii, Industrial Area, Near Nathu Sweets Okhla', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(425, 'Project Manager Name', 'scrm_3102017067', 'CK Birla Group', 'Mr. Puneesh Lam', 'Haroldson', 'Client Technical Man', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', '8th Floor, Birla Tower, 25, Barakhamba Road, New Delhi, Delhi 110001', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(426, 'Project Manager Name', 'scrm_3102017068', 'Ballarpur Industries Limited', 'Mr. Vinit Thaku', 'Kitzman', 'Managing Director', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'First India Place Tower C\nmehrauli - Gurgaon Road', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(427, 'Project Manager Name', 'scrm_3102017069', 'Becton Dickinson', 'Mr.   Manoj Gop', 'Frey', 'Director Business De', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', '6th Floor Signature Tower B South City I Nh 8 .. ..', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(428, 'Project Manager Name', 'scrm_3102017070', 'Bharat Pumps & Compressors Limited', 'Mr. A K Jain', 'Haroldson', 'CEO', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Chander Mukhi Nariman Point', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(429, 'Project Manager Name', 'scrm_3102017071', 'Bhilwara Spinners Limited', 'Mr. Nirmal Kuma', 'Kitzman', 'Vice President - IT', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', '40 - 41 Bhilwara Bhawan Comm. Centre New Friends Colony', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(430, 'Project Manager Name', 'scrm_3102017072', 'Buisness Octane Private Limited', 'Mr. Dilip  Shar', 'Frey', 'Vice President', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', '15th Floor Building - 9a Dlf Cyber City, Phase - 3', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(431, 'Project Manager Name', 'scrm_3102017073', 'Centaur Group Of Hotels (Delhi)', 'Mr. Pradeep  Ga', 'Haroldson', 'Managing Director', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Indira Gandhi International Airport Gurgaon Road', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(432, 'Project Manager Name', 'scrm_3102017074', 'Consolidated Products Corporation Privat', 'Mr. Sahgal', 'Kitzman', 'Chief Executive Offi', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'F - 1 / 8 Phase I Okhla Industrial Area', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(433, 'Project Manager Name', 'scrm_3102017075', 'Dabur India Limited', 'Mr. Anand Burma', 'Frey', 'Vice President - Ope', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'Kaushambi', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(434, 'Project Manager Name', 'scrm_3102017076', 'Design For Manufacturing Foods Limited', 'Anuj Prasad', 'Haroldson', 'Director', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', '8381, Roshan Ara Road', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(435, 'Project Manager Name', 'scrm_3102017077', 'Haryana Dairy Development Cooperative Fe', 'Mr. Dhanpat  Si', 'Kitzman', 'Director', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Base No 21 - 22, Sahakarita Bhavan, Sec - 2', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(436, 'Project Manager Name', 'scrm_3102017078', 'Il & fs Transportation Networks Limted', 'Mr. Harish  Mat', 'Frey', 'CEO', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', '2nd Floor Mbs Corporate Office Tower, Ambiance Mall, Ambiance Iceland Nh-8', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(437, 'Project Manager Name', 'scrm_3102017079', 'Jbm Group', 'Mr. Mayank Verm', 'Haroldson', 'managing director', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', '601 Hemkunt Chambers 89 Nehru Place', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(438, 'Project Manager Name', 'scrm_3102017080', 'Le Passage To India Tours & Travel &Trav', 'Mr. Arjun  Shar', 'Kitzman', 'Director', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'E-29 Hauz Khas', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(439, 'Project Manager Name', 'scrm_3102017081', 'Mark & Space Telesystems Private Limited', 'Ms. Soshil Kuma', 'Frey', 'Director', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', '10th Floor 1002 Padma Tower - 15 Rajendra Place', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(440, 'Project Manager Name', 'scrm_3102017082', 'Mas Callnet India (P) LTD', 'Mr. Deepak  Kas', 'Haroldson', 'TECHNICAL DIRECTOR', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'No 603 Siddharth Bldg 96 Nehru Place', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(441, 'Project Manager Name', 'scrm_3102017083', 'Reliable Autotech', 'Mr. Saagar  Bha', 'Kitzman', 'CTO', 'Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Napp Township Narora', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(442, 'Project Manager Name', 'scrm_3102017084', 'Northern Railway', 'Mr. K  Kailash', 'Frey', 'CTO', 'Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', 'Baroda House', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(443, 'Project Manager Name', 'scrm_3102017085', 'Radiant Polymers Private Limited', 'Mr. Nitin  Bahl', 'Haroldson', 'Director', 'Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'A - 4/7 - 8 Site Iv Sahibabad Industrial Area', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(444, 'Project Manager Name', 'scrm_3102017086', 'RAJASTHAN SPINNING & WEAVING MILL LIMITE', 'Ashutosh Sharma', 'Kitzman', 'Director', '3Chau-kitzman@gmail.com', '120', '120', '9651', 'http://www.bentonjohnbjr.com', '', '', '', '', 'Bhilwara Towers A-12 Sector - 1', 'Orleans', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(445, 'Project Manager Name', 'scrm_3102017087', 'Rao Travel &Travel & Hospitalitys', 'Mr. Srinivas Ra', 'Frey', 'Chief Executive Offi', '2Theola-frey@frey.com', '120', '120', '0', 'http://www.chanayjeffreyaesq.com', '', '', '', '', '17 Vasant Enclavemarket', 'Livingston', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(446, 'Project Manager Name', 'scrm_3102017088', 'Ritco Travel &Travel & Hospitalitys', 'Mr. Ashok  Agar', 'Haroldson', 'Chief Executive Offi', '1Cheryl-haroldson@haroldson.org', '120', '120', '7017', 'http://www.chemeljameslcpa.com', '', '', '', '', 'Su - 20 Bhakaji Cama Bhawan Bhikaji Cama Place', 'Gloucester', '', '', '', '', '', '', '', 'https://www.linkedin', '', '', '', 6, '2018-04-12 20:37:37'),
(447, 'Project Manager Name', 'scrm_3102017089', 'Schneider Electronic India Private Limit', 'Mr. Olivier  Bl', '', 'CFO and Wholetime Di', '', '', '', '', '', '', '', '', '', 'Max House 2Nd Floor 1 Dr. Jha Marg Okhla', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(448, 'Project Manager Name', 'scrm_3102017090', 'GOLDWYN LTD', 'Mr. JAGPAL SHAR', '', 'Sr. Manager - IT', '', '', '', '', '', '', '', '', '', '15 & 16, Nsez, Noida, Uttar Pradesh 201305', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(449, 'Project Manager Name', 'scrm_3102017091', 'DLF GOLF & COUNTRY CLUB', 'Mr. Karan Bindr', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'DLF City, Phase-V', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(450, 'Project Manager Name', 'scrm_3102017092', 'National Textile Corpn', 'Shri Vivek Plaw', '', 'Chief Financial Offi', '', '', '', '', '', '', '', '', '', 'Core 4, Scope Complex 7, Lodi Road', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(451, 'Project Manager Name', 'scrm_3102017093', 'Advance HydrauTech Private Limited', 'Mr. Sudhir Gupt', '', 'Director', '', '', '', '', '', '', '', '', '', 'Khasra No. 86/ 23, Village Ghevra, Near Hiran Kudna Mor, Mundka Udyog Nagar, Rohtak Road', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(452, 'Project Manager Name', 'scrm_3102017094', 'Spencer Retail Limited', 'Mr. Vipin Bhand', '', 'Chief Operating Offi', '', '', '', '', '', '', '', '', '', 'LG 14, Crown Plaza, Sec - 15, Mathura Road', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(453, 'Project Manager Name', 'scrm_3102017095', 'Tata Ryerson Ltd', 'Mr. Manish Aror', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Plot No 33 B, Bata Hardware Road, N I T, N I T', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(454, 'Project Manager Name', 'scrm_3102017096', 'ASEEM Global', 'Mr. Narender Ku', '', 'Managing Director', '', '', '', '', '', '', '', '', '', '5476, South Basti Harphool Singh\nSadar Thana Road, Sadar Bazar', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(455, 'Project Manager Name', 'scrm_3102017097', 'Cantabil Retail India', 'Mr. Vijay bansa', '', 'Vice President', '', '', '', '', '', '', '', '', '', 'B-47, Lawrence Road, Industrial Area', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(456, 'Project Manager Name', 'scrm_3102017098', 'Tirupati Inks', 'Sanjiv Agrawal', '', 'Chief Executive Offi', '', '', '', '', '', '', '', '', '', 'D 109-112, GNEPIP, Surajpur Industrial Area, Site ? 5, Kasna', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(457, 'Project Manager Name', 'scrm_3102017099', 'Charoo Apparel Manufacturing Company', 'Mr. Vikram Kris', '', 'Managing Director', '', '', '', '', '', '', '', '', '', '12 School Lane Wing Choun India Delhi', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(458, 'Project Manager Name', 'scrm_3102017100', 'Chhabra Trading Company', 'Mr. AnilChabra', '', 'Ownner', '', '', '', '', '', '', '', '', '', '920, Station Road, Chandni Chowk', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(459, 'Project Manager Name', 'scrm_3102017101', 'Dayal Regency', 'Mr. Manoj Gosai', '', 'Vice President', '', '', '', '', '', '', '', '', '', 'B-718, Dlf City Phase Iv', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(460, 'Project Manager Name', 'scrm_3102017102', 'Indian Sugar Exim Corporation', 'Mr. Jayanti Bha', '', 'General Manager - IT', '', '', '', '', '', '', '', '', '', 'Ansal Plaza 2nd Floor C-block Khel Gaon Marg', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(461, 'Project Manager Name', 'scrm_3102017103', 'Satvik Impex', 'Mr. Dhruv Chand', '', 'General Manager - IT', '', '', '', '', '', '', '', '', '', '1 Anand Lok, Khel Gaon, Road', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(462, 'Project Manager Name', 'scrm_3102017104', 'Asia dwan hotel (delhi)', 'Mr. Mayer Vinay', '', 'Chief of Corporate C', '', '', '', '', '', '', '', '', '', 'C/2, 2nd Floor, Malviya Nagar, Malviya Nagar  New Delhi', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(463, 'Project Manager Name', 'scrm_3102017105', 'Southern Hotel', 'Ms. Sunita Lakk', '', 'General Manager - IT', '', '', '', '', '', '', '', '', '', '18/2, Arya Samaj Road, W.E.A Karol Bagh', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(464, 'Project Manager Name', 'scrm_3102017106', 'Great Indian Outdoors Private Limited', 'Mr. Balakrishna', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Sector 57 ,Phase 3 ,Sushant Lok Near Edan, Gurgaon', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(465, 'Project Manager Name', 'scrm_3102017107', 'Park Plaza Harinagar', 'Mr. Abhay Goel', '', 'Proprietor', '', '', '', '', '', '', '', '', '', 'Plot No. 1B, Sub District Center', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(466, 'Project Manager Name', 'scrm_3102017108', 'Residency Resorts Pvt. Ltd. (USI)', 'Mr. Sunil Kapoo', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Premises, Rao Tula Ram Marg, Delhi Cantt.', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(467, 'Project Manager Name', 'scrm_3102017109', 'Hi Tours India Private Limited', 'Mr. Prem Syal', '', 'Chief Executive Offi', '', '', '', '', '', '', '', '', '', '37, Regal Nuilding Parliament Street', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(468, 'Project Manager Name', 'scrm_3102017110', 'Hotel CityPark', 'Mr. Ramla Aggra', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Pitampura', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(469, 'Project Manager Name', 'scrm_3102017111', 'Nimitaya Hotel (Fortune hotel Gurgoan)', 'Ms. Samiksha Ma', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Global Arcade, Mehrauli-Gurgaon Road', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(470, 'Project Manager Name', 'scrm_3102017112', 'JHT hotel', 'Mr. Amit Khanna', '', 'Chief Executive Offi', '', '', '', '', '', '', '', '', '', 'S-21 Greater Kailash-I', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(471, 'Project Manager Name', 'scrm_3102017113', 'Travel &Travel & Hospitalityogy India', 'Mr. Santosh/Ms.', '', 'Chief Executive Offi', '', '', '', '', '', '', '', '', '', '212, 2ndFloor, Vardhman  Master Plaza, Plot No. 2 , DDA LSC Ghazipur', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(472, 'Project Manager Name', 'scrm_3102017114', 'Airport Residency', 'Mr. V Khosla', '', 'Director', '', '', '', '', '', '', '', '', '', 'Off highway 98  Dwarka Link Rd, Samalkha', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(473, 'Project Manager Name', 'scrm_3102017115', 'Interglobe Enterprise Limited', 'Mr. Kapil Bhati', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Block 2 B', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(474, 'Project Manager Name', 'scrm_3102017116', 'Magnum Components', 'Mr. Yogesh Batr', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'Plot No 166, Sector - 3, Imt Manesar', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(475, 'Project Manager Name', 'scrm_3102017117', 'Ram-Nath & Co.', 'Mr. Vivek Lal', '', 'Director', '', '', '', '', '', '', '', '', '', 'A 7, Greenpark Main, Near Sartaj Grand', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(476, 'Project Manager Name', 'scrm_3102017118', 'Overseas Carpets', 'Mr. O. P Garg', '', 'Proprietor', '', '', '', '', '', '', '', '', '', '85, Bharat Nagar, New Friends Colony', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(477, 'Project Manager Name', 'scrm_3102017119', 'Nikkon Air Freight Service Private Limit', 'Ms. Reena Bhasi', '', 'Director', '', '', '', '', '', '', '', '', '', '117,119,Jaina Tower-Ist, Satyam Cinema, Janakpuri District Centre', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(478, 'Project Manager Name', 'scrm_3102017120', 'Ruck Sack Tour Private Limited', 'Ms. Rani Puri', '', 'Proprietor', '', '', '', '', '', '', '', '', '', 'B 412', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(479, 'Project Manager Name', 'scrm_3102017121', 'Rao Travel &Travel & Hospitalitys', 'Mr. Srinivas Ra', '', 'Partner', '', '', '', '', '', '', '', '', '', '17 Vasant Enclavemarket', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(480, 'Project Manager Name', 'scrm_3102017122', 'Services International', 'Mr. Santosh Lak', '', 'Partner', '', '', '', '', '', '', '', '', '', 'D - 4 A-block Ring Road Lsc Naraina Vihar', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(481, 'Project Manager Name', 'scrm_3102017123', 'Lite Bite Foods', 'Mr. Rohit Aggar', '', 'Proprietor', '', '', '', '', '', '', '', '', '', '19, Ashi Building, ,rouse Avenue, ITO', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(482, 'Project Manager Name', 'scrm_3102017124', 'High Tours', 'Mr. Prem Sayal', '', 'Managing Director', '', '', '', '', '', '', '', '', '', '3334 37 Regal Building Parliament Street', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(483, 'Project Manager Name', 'scrm_3102017125', 'Kwality Dairy India', 'Mr. Ashok Kumar', '', 'Managing Director', '', '', '', '', '', '', '', '', '', 'F - 82, Shivaji Place,Rajouri Garden', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(484, 'Project Manager Name', 'scrm_3102017126', 'Bhushan Steel', 'Mr. Monica Aggr', '', 'Managing Director', '', '', '', '', '', '', '', '', '', '23, Site Iv, Sahibabad Industrial Area', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(485, 'Project Manager Name', 'scrm_3102017127', 'HSIL', 'Mr. Navin Goenk', '', 'VP of Finance', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(486, 'Project Manager Name', 'scrm_3102017128', 'Whirlpool of India', 'Mr. Sanjiv Verm', '', 'CFO', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37'),
(487, 'Project Manager Name', 'scrm_3102017129', 'Orix Auto Infrastructure Services', 'Ms. Shuchi Sigh', '', 'MD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 6, '2018-04-12 20:37:37');

-- --------------------------------------------------------

--
-- Table structure for table `log_call`
--

CREATE TABLE IF NOT EXISTS `log_call` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scrm_id` int(11) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `u_id` (`u_id`),
  KEY `scrm_id` (`scrm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `log_call`
--

INSERT INTO `log_call` (`log_id`, `log_date`, `scrm_id`, `u_id`) VALUES
(1, '2018-04-08 04:29:21', 1, 6),
(91, '2018-04-08 13:41:54', 171, 6),
(92, '2018-04-08 13:50:27', 170, 6),
(93, '2018-04-08 14:24:14', 169, 6),
(94, '2018-04-08 14:25:32', 171, 6),
(95, '2018-04-08 14:25:50', 172, 6),
(96, '2018-04-08 14:28:35', 173, 6),
(97, '2018-04-08 14:29:00', 171, 6),
(98, '2018-04-08 14:29:24', 171, 6),
(99, '2018-04-08 15:05:40', 173, 6),
(100, '2018-04-08 18:08:14', 171, 6),
(101, '2018-04-08 19:34:31', 173, 6),
(102, '2018-04-08 20:00:50', 172, 6),
(103, '2018-04-08 20:01:35', 172, 6),
(104, '2018-04-09 16:06:22', 169, 6),
(105, '2018-04-10 12:26:04', 174, 6),
(106, '2018-04-10 12:32:40', 179, 6),
(107, '2018-04-10 13:05:13', 218, 6),
(108, '2018-04-10 13:47:07', 207, 6),
(109, '2018-04-10 14:06:37', 213, 6),
(110, '2018-04-10 14:11:14', 179, 6),
(111, '2018-04-10 14:31:47', 1, 6),
(112, '2018-04-12 20:37:58', 403, 6),
(113, '2018-04-12 20:46:46', 404, 6),
(114, '2018-04-12 20:48:46', 406, 6);

-- --------------------------------------------------------

--
-- Table structure for table `log_email`
--

CREATE TABLE IF NOT EXISTS `log_email` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `send_to` varchar(50) NOT NULL,
  `send_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email_text` longtext NOT NULL,
  `scrm_id` int(40) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `log_email`
--

INSERT INTO `log_email` (`log_id`, `send_to`, `send_date`, `email_text`, `scrm_id`, `u_id`) VALUES
(1, 'abc@gmail.com', '2018-04-08 03:47:54', 'hello abc', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`m_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`name`, `email`, `pass`, `number`, `m_id`, `u_id`) VALUES
('Aman', 'amanadhikari2@gmail.com', 'amanneox123', '09557672252', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE IF NOT EXISTS `reminders` (
  `rem_id` int(11) NOT NULL AUTO_INCREMENT,
  `rem_date` datetime NOT NULL,
  `rem_title` varchar(255) NOT NULL,
  `rem_desc` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`rem_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`rem_id`, `rem_date`, `rem_title`, `rem_desc`, `u_id`) VALUES
(1, '2018-04-25 01:00:00', 'Title', 'Test', 6),
(2, '2018-04-12 02:01:00', 'Test2', 'Test', 6),
(3, '2018-04-12 02:01:00', 'Test2', 'Test', 6),
(4, '2018-04-13 01:59:00', 'abcd', 'Abcd', 6),
(5, '2018-04-13 01:59:00', 'abcd', 'Abcd', 6),
(6, '2018-04-26 10:11:00', 'dyy', 'yufuy', 6);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_head` varchar(255) NOT NULL,
  `t_body` longtext NOT NULL,
  `t_end` varchar(255) NOT NULL,
  `t_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_type` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`t_id`, `t_head`, `t_body`, `t_end`, `t_created`, `t_type`, `u_id`) VALUES
(7, 'Hi', 'This is a test', 'Bye', '2018-04-05 14:15:54', 'msg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_email`, `firstname`, `lastname`, `mobile`, `address`, `pincode`, `state`, `country`, `city`, `status`) VALUES
(1, 'mansi7babbar', 'hello', 'mansi7babbar@gmail.com', '', '', '', '', '', '', '', '', 'active'),
(6, 'amanneox', 'amanneox', 'amanadhikari2@gmail.com', 'Aman', 'Adhikari', '9557672252', 'A-19 Kewal Vihar Sahastradhara Road', '248001', 'Uttarakhand', 'India', 'Dehradun', 'active'),
(9, 'Medha', '9651471605', 'medha@saletancy.com', 'Medha', 'Dwivedi', '9651471605', 'Sanjay Nagar', '201002', 'UttarPradesh', 'India', 'Ghaziyabad', 'active'),
(10, 'test', 'test1234', 'amanadhikari@gmail.com', 'Anakin', 'Adhikari', '9557672252', 'A-19 Kewal Vihar Sahastradhara Road', '248001', 'UK', 'India', 'Dehradun', 'active'),
(11, 'abcdef', '123456789', 'gangesh@saletancy.com', 'Gangesh', 'Pathak', '9506798732', 'hds', '201002', 'dis', 'India', 'ghahha', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `log_call`
--
ALTER TABLE `log_call`
  ADD CONSTRAINT `log_call_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `log_email`
--
ALTER TABLE `log_email`
  ADD CONSTRAINT `log_email_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
