-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2022 at 04:31 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surti_cricket_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `previous_team` varchar(100) DEFAULT NULL,
  `formno` varchar(20) DEFAULT NULL,
  `memberno` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `photo` varchar(150) DEFAULT 'no_photo.jpg',
  `batting_style` varchar(200) NOT NULL DEFAULT 'No' COMMENT 'No / LEFT HAND/ RIGHT HAND',
  `bowling_style` varchar(200) NOT NULL DEFAULT 'No' COMMENT 'No/LEFT ARM FASTER/RIGHT ARM FASTER/LEFT ARM SPIN/RIGHT ARM SPIN/LEFT ARM MEDIUM FAST/RIGHT ARM MEDIUM FAST',
  `is_wk` varchar(10) NOT NULL DEFAULT 'No' COMMENT 'No, Yes',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1. Active 2. InActive',
  `created` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `previous_team`, `formno`, `memberno`, `age`, `phone`, `photo`, `batting_style`, `bowling_style`, `is_wk`, `status`, `created`) VALUES
(1, 'MITESH BHARATBHAI MODI', 'OM SAI', '1', '51', 39, '9979454094', '1.jpg', 'Right Handed', 'No', 'No', 1, ''),
(2, 'ANKIT DIPAKKUMAR BODIWALA', 'OM SAI', '2', '172', 38, '9374712725', '2.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(3, 'CHIRAG JANAKKUMAR KAPDIYA', 'OM SAI', '3', '165', 27, '8849101797', '3.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(4, 'DARSHIL RAKESHKUMAR SOPARIWALA', 'OM SAI ELEVEN', '4', '167', 23, '9537770140', '4.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(5, 'HEMANSHU B BHAJIYAWALA', 'OM SAI', '5', '161', 39, '9978955105', '5.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(6, 'YASH CHANDRESHKUMAR BODIWALA', 'OM SAI', '6', '173', 24, '9377612430', '6.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(7, 'BHAGATWALA SOMIL SANJAYBHAI ', 'KRISHNA ELEVEN', '7', '179', 28, '9173130899', '7.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(8, 'ROJAL BIPINCHANDRA GHEEWALA', 'KRISHNA ELEVEN', '8', '51', 30, '9687612353', '8.jpg', 'Right Handed', 'No', 'No', 1, ''),
(9, 'DENISH JAGDISHCHANDRA MEHTA', 'ROYAL CHALLENGRERS(MALI FALIYA)', '9', '72', 36, '9924355520', '9.jpg', 'Right Handed', 'No', 'No', 1, ''),
(10, 'RAVI YOGESHCHANDRA MODI', 'ROYAL CHALLENGRERS(MALI FALIYA)', '10', '75', 39, '9879157080', '10.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(11, 'SEMIL TAMAKUWALA', 'ROYAL CHALLENGRERS(MALI FALIYA)', '11', '70', 27, '8980610907', '11.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(12, 'HIREN JASHVANTLAL CHOKHAWALA', 'ROYAL CHALLENGRERS(MALI FALIYA)', '12', '71', 37, '9727252253', '12.jpg', 'Right Handed', 'No', 'No', 1, ''),
(13, 'JADAWALA FERIN PARESH', 'ROYAL CHALLENGRERS(MALI FALIYA)', '13', '69', 23, '9104151555', '13.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(14, 'JADAWALA PARESH PRAVINCHANDRA', 'ROYAL CHALLENGRERS(MALI FALIYA)', '14', '68', 50, '972366551', '14.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(15, 'ROSHAN P LAKDAWALA', '-', '15', '76', 35, '9825368656', '15.jpg', 'Right Handed', 'No', 'No', 1, ''),
(16, 'AASAY JAYesHBHAI ANAJWALA', 'ROYAL CHALLENGRERS(MALI FALIYA)', '16', '74', 26, '9537019872', '16.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(17, 'DEEP ANILBHAI DESAI', 'SAHAJ 11', '17', '63', 31, '9537006100', '17.jpg', 'Right Handed', 'No', 'No', 1, ''),
(18, 'GANDHI DHRUVIL ', '-', '18', '88', 20, '9909300397', '18.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(19, 'VANKAWALA AKASH', 'KRISHNA CRICKET CLUB', '19', '90', 29, '7405292628', '19.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(20, 'VILISH SHETHNA', 'SAMARPAN SUPERKING', '20', '92', 30, '7567564943', '20.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(21, 'VANKAWALA ANKIT ', 'KRISHNA CRICKET CLUB', '21', '91', 31, '9898340777', '21.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(22, 'DUDHWALA JENITH', 'SAMARPAN SUPERKING', '22', '83', 23, '9879070440', '22.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(23, 'PANWALA JALIN KETAN ', 'THE NEXT FIGHTER', '23', '99', 18, '9510627556', '23.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(24, 'HARSH P BEKAWALA', 'THE NEXT FIGHTER', '24', '112', 18, '9313422735', '24.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(25, 'KARAN N VANKAWALA', 'THE NEXT FIGHTER', '25', '97', 19, '7339784420', '25.jpg', 'Left Handed', 'Right Arm', 'No', 1, ''),
(26, 'AYUSH VIRESH AMICHANDWALA', '-', '26', '166', 19, '9327509402', '26.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(27, 'PINKESH KABRAWALA', 'OM SAI', '27', '54', 35, '7487870456', '27.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(28, 'LAKDAWALA JENIL AJAYKUMAR', 'KRISHNA 11', '28', '56', 29, '7229070550', '28.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(29, 'LAKDAWALA KRUNAL AJAYKUMAR', 'OM SAI ELEVEN', '29', '55', 24, '8469979925', '29.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(30, 'LAKIR JAYesHKUMAR GANDHI', 'KRISHNA 11', '30', '51', 26, '9033189039', '30.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(31, 'GANDHI VIJAL NARESH KUMAR', 'ROYAL 11', '31', '144', 32, '9904181348', '31.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(32, 'PARIML S GAJJAR', 'ROYAL CHALLENGRERS(MALI FALIYA)', '32', '73', 39, '9924544277', '32.jpg', 'No', 'Right Arm', 'No', 1, ''),
(33, 'VARIYAVWALA ROHAN JAGDISHBHAI ', 'GAME CHALLENGERS(GANCHI SHERI)', '33', '172', 32, '9067995035', '33.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(34, 'KEYUR MUKESH BHAI VANKAWALA', 'ROYAL 11', '34', '143', 33, '9909648593', '34.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(35, 'MARTIN INDRAVADAN CHOKHAWALA', 'SAHAJ 11', '35', '61', 29, '7984088838', '35.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(36, 'DHRUVISH H MODI', 'ABC 11', '36', '168', 33, '9726774776', '36.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(37, 'MODI AKASH H ', 'SAHAJ 11', '37', '57', 28, '8980339335', '37.jpg', 'LEFT ARM', 'Right Arm', 'No', 1, ''),
(38, 'DHARMESH BHARATBHAI GANDHI', 'ABC CLUB', '38', '40', 33, '8734867040', '38.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(39, 'DENISH PANWALA', 'ABC CLUB', '39', '4', 36, '9265822735', '39.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(40, 'JADAWALA UDIT D', '-', '40', '17', 25, '9033232026', '40.jpg', 'LEFT ARM', 'Right Arm', 'No', 1, ''),
(41, 'ANKIT KIRITKUMAR CHAHWALA', '', '41', '18', 35, '9376705032', '41.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(42, 'MRUNAL D JADAWALA', '-', '42', '31', 20, '9601018288', '42.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(43, 'RINKESH DEVENDRA MODI', 'ROVERS XI', '43', '32', 35, '9825327496', '43.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(44, 'MEHTA HARSH MANISHKUMAR ', '-', '44', '35', 22, '9427580356', '44.jpg', 'Right Handed', 'No', 'No', 1, ''),
(45, 'KAMLESH B MEHTA', 'SAHAJ 11', '45', '49', 42, '9427580356', '45.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(46, 'DHRUV KIRANKUMAR LALWALA', 'SAMARPAN SUPERKING', '46', '94', 19, '9328039066', '46.jpg', 'Right Handed', 'No', 'No', 1, ''),
(47, 'BEKAWALA YATRIKKUMAR ', 'FIGHTER 11', '47', '111', 39, '', '47.jpg', 'Right Handed', 'No', 'No', 1, ''),
(48, 'FENIL M SURTI', 'ROYAL STRIKER', '48', '89', 29, '8980022664', '48.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(49, 'PRATHAM S GODIWALA', '-', '49', '95', 19, '8866543734', '49.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(50, 'JASH KABRAWALA', '-', '50', '93', 27, '9824690007', '50.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(51, 'NEEL LAPSIWALA', 'GALAXI STUNNER', '51', '110', 18, '8799440134', '51.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(52, 'RAHUL LAPSIWALA', 'STUNNERS XI', '52', '84', 28, '8758690481', '52.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(53, 'ALISH GIRISHBHAI PASTAGIYA', 'STUNNERS XI', '53', '21', 31, '9426393233', '53.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(54, 'ROHAN PRADIPKUMAR PANWALA', 'STUNNERS XI', '54', '23', 31, '9974380992', '54.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(55, 'MITTAL BHADRESHKUMAR KABRAWALA', 'STUNNERS XI', '55', '150', 29, '8460301063', '55.jpg', 'Left Handed', 'Right Arm', 'No', 1, ''),
(56, 'VISHAL ANILKUMAR GHAEL', 'PLAYERS 11', '56', '146', 31, '9662062156', '56.jpg', 'Left Handed', 'No', 'Yes', 1, ''),
(57, 'KETAN DILIPBHAI PANWALA', 'FIGHTER 11', '57', '132', 40, '9898040198', '57.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(58, 'PARTH N BHAGAT', 'ROVERS XI', '58', '16', 25, '9879217003', '58.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(59, 'DEEP D GHEEWALA', 'ABC 11', '59', '15', 25, '7984408700', '59.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(60, 'YASH K LAKDAWALA', '', '60', '12', 27, '9033712894', '60.jpg', 'Right Handed', 'No', 'No', 1, ''),
(61, 'SMIT GHEEWALA', 'ABC TEAM', '61', '2', 23, '7990515571', '61.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(62, 'GHEEWALA DARSHAN D', '', '62', '3', 23, '9773081188', '62.jpg', 'No', 'Right Arm', 'No', 1, ''),
(63, 'CHIMPU DILIPKUMAR LAPSIWALA', 'GAME CHALLENGERS(GANCHI SHERI)', '63', '126', 37, '9004288880', '63.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(64, 'BRIJESH A KIKAGANESHWALA', 'CHOKSI ELEVEN', '64', '65', 38, '9727733230', '64.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(65, 'VASU VANKAWALA', 'CHOKSI ELEVEN', '65', '129', 24, '9265166030', '65.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(66, 'ASHISH P KELAWALA', 'CHOKSI ELEVEN', '66', '116', 29, '8000357709', '66.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(67, 'CHINTAN K GHEEWALA', 'CHOKSI ELEVEN', '67', '119', 37, '9375211100', '67.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(68, 'JAYesH R DALAL', 'CHOKSI ELEVEN', '68', '66', 49, '9377635100', '68.jpg', 'Right Handed', 'No', 'No', 1, ''),
(69, 'KARAN JARIWALA', 'CHOKSI ELEVEN', '69', '121', 29, '9824383821', '69.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(70, 'SAMARTH M KAPADIYA', 'CHOKSI ELEVEN', '70', '130', 24, '8460345467', '70.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(71, 'NISHIT RAKESH SOPARIWALA', 'CHOKSI ELEVEN', '71', '114', 22, '8160859060', '71.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(72, 'HARESH P KELAWALA ', 'CHOKSI ELEVEN', '72', '127', 43, '9825766530', '72.jpg', 'No', 'LEFT ARM', 'No', 1, ''),
(73, 'TWINKAL N WANKAWALA', 'CHOKSI ELEVEN', '73', '115', 41, '9825413147', '73.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(74, 'KRUNAL JARIWALA', 'CHOKSI ELEVEN', '74', '117', 36, '9825422282', '74.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(75, 'KETAN R DHABUWALA', 'CHOKSI ELEVEN', '75', '67', 42, '9898470119', '75.jpg', 'No', 'LEFT ARM', 'No', 1, ''),
(76, 'AAKASH VIJAYKUMAR GHEEWALA', 'CHOKSI ELEVEN', '76', '128', 23, '9099271500', '76.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(77, 'HIREN A HALATWALA', 'CHOKSI ELEVEN', '77', '120', 37, '9898247486', '77.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(78, 'BEKAWALA DEV KALPESH', 'THE NEXT FIGHTER', '78', '100', 19, '9731660129', '78.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(79, 'DIPAK GAJJAR', 'STAR CRICKET', '79', '40', 34, '7405146341', '79.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(80, 'MITESH ASMANIWALA', 'FIGHTER 11', '80', '48', 25, '7575075766', '80.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(81, 'PARIXIT KIRITKUMAR KATHAWALA', 'SHANKAR NAGAR', '81', '25', 35, '9904878181', '81.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(82, 'JATIN RAJESH CHAPATWALA', 'SHANKAR NAGAR', '82', '26', 39, '9979511748', '82.jpg', 'Right Handed', 'LEFT ARM', 'Yes', 1, ''),
(83, 'DHRUMIL ANILKUMAR VANKAWALA', 'SHANKAR NAGAR', '83', '24', 22, '9638213193', '83.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(84, 'ANKIT MUKESHBHAI KAPADIYA', 'SHANKAR NAGAR', '84', '31', 33, '9879270957', '84.jpg', 'Right Handed', 'No', 'No', 1, ''),
(85, 'LAKDAWALA RAHUL ASHOKKUMAR ', 'SHANKAR NAGAR', '85', '30', 37, '9724113015', '85.jpg', 'Right Handed', 'LEFT ARM', 'No', 1, ''),
(86, 'ABHISHEK M KAPADIYA', 'SHANKAR NAGAR', '86', '27', 37, '9825922331', '86.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(87, 'GHEEWALA ZENIL MANoJKUMAR', 'SHANKAR NAGAR', '87', '29', 21, '9998752688', '87.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(88, 'SANDIP ASHOKKUMAR JAIYAWALA  ', 'OM SAI', '88', '137', 30, '8849788957', '88.jpg', 'Left Handed', 'No', 'Yes', 1, ''),
(89, 'MODI KEVIN ATULKUMAR ', 'STAR XI', '89', '183', 27, '9824839953', '89.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(90, 'MEHUL MAGAJWALA', 'ROVERS XI', '90', '113', 25, '9825176158', '90.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(91, 'HIREN GANDHI', 'ROVERS XI', '91', '33', 38, '9879412334', '91.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(92, 'ASHUTOSH PARESHBHAI SOPARIWALA', '', '92', '172', 25, '7405350449', '92.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(93, 'MONTU BHARATBHAI BEKAWALA', 'FIGHTER 11', '93', '194', 40, '9664974252', '93.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(94, 'RAVI MUKESHBHAI GHAEL', 'SAHAJ 11', '94', '58', 35, '8140471755', '94.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(95, 'FENIL MUKESHBHAI GHAEL ', 'OM SAI', '95', '59', 31, '8780294463', '95.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(96, 'FENIL RAJESHKUMAR CYCLEWALA', 'OM SAI', '96', '169', 31, '9106940081', '96.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(97, 'TEJAS SURESHCHANDRA GANDHI', 'KRISHNA 11', '97', '51', 39, '9033836122', '97.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(98, 'GANDHI VIRAJ NITINBHAI', 'OM SAI ELEVEN', '98', '172', 25, '9484530901', '98.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(99, 'NAIMISH R TAMANKUWALA', 'OM SAI ELEVEN', '99', '172', 32, '9913489494', '99.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(100, 'NILESH DILIPBHAI GANDHI', 'CHOKSI ELEVEN', '100', '64', 41, '7777995632', '100.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(101, 'MANoJ DHANSHUKHLAL MODI', '-', '101', '11', 47, '9824150714', '101.jpg', 'Right Handed', 'No', 'No', 1, ''),
(102, 'GANDHI YASH', 'GAME CHALLENGERS(GANCHI SHERI)', '102', '', 26, '7405039220', '102.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(103, 'MONIL KAMALKUMAR GHAYEL', '-', '103', '172', 18, '9316290091', '103.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(104, 'MODI VATSAL A', 'COLLEGE', '104', '172', 23, '9724027711', '104.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(105, 'GANDHI VIVEK', 'SAHAJ 11', '105', '44', 33, '9727214000', '105.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(106, 'BHADRESH A KAPADIYA', 'SURTI MODH VANIK YUVAK MANDAL', '106', '41', 48, '8849034445', '106.jpg', 'Right Handed', 'No', 'No', 1, ''),
(107, 'VICKY DESAI', 'SAHAJ 11', '107', '62', 30, '9913704056', '107.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(108, 'RAJ DEEPAK JARIWALA', 'ROVERS XI', '108', '133', 34, '9825895067', '108.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(109, 'TAMANKUWALA JAINISH RAJENDRA', 'KRISHNA 11', '109', '172', 30, '9913119190', '109.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(110, 'KISHAN JAYNTILAL NANAVATI', 'OM SAI', '110', '170', 29, '7698747774', '110.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(111, 'DEV DHARMESH BHUTWALA', '-', '111', '172', 18, '8469037479', '111.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(112, 'ASMANIWALA NEVIL JAYesHKUMAR', 'ROYAL XI', '112', '172', 21, '9106544683', '112.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(113, 'ASHMANIWALA KEVIN AMISHKUMAR', 'COLLEGE TOURNAMENT', '113', '172', 19, '8320603038', '113.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(114, 'FIROZ BAKULBHAI KAPADIYA', 'GAME CHALLENGERS(GANCHI SHERI)', '114', '-', 30, '9898597000', '114.jpg', 'Left Handed', 'Right Arm', 'No', 1, ''),
(115, 'MODI DARSHAN KAMLESH', '-', '115', '172', 22, '9033348939', '115.jpg', 'Right Handed', 'LEFT ARM', 'No', 1, ''),
(116, 'RAHUL S GANDHI', 'FIGHTER 11', '116', '172', 38, '9913099121', '116.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(117, 'PARTH UTPAL VANKAWALA', '-', '117', '193', 20, '8758189329', '117.jpg', 'Right Handed', 'LEFT ARM', 'No', 1, ''),
(118, 'FENIL KAPADIYA', 'OMSAI', '118', '133', 43, '8866352700', '118.jpg', 'Right Handed', 'No', 'No', 1, ''),
(119, 'MEET GANDHI ', '-', '119', '172', 18, '9624258877', '119.jpg', 'Right Handed', 'LEFT ARM', 'No', 1, ''),
(120, 'HETVIK VIMALKUMAR B', '-', '120', '139', 15, '9879780235', '120.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(121, 'JAY VIJAYBHAI JOSHI', 'KRISHNA 11', '121', '134', 21, '6353469065', '121.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(122, 'HARNIL A BEKAWALA', 'FIGHTER 11', '122', '137', 17, '9825110254', '122.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(123, 'LAKDAWALA PRATHAM JATINKUMAR', 'SHANKAR NAGAR', '123', '47', 20, '8733987557', '123.jpg', 'No', 'LEFT ARM', 'No', 1, ''),
(124, 'KAPADIYA HIMANSHU', 'SHANKAR NAGAR', '124', '45', 39, '9099031418', '124.jpg', 'No', 'Right Arm', 'No', 1, ''),
(125, 'SHETHNA VATSAL DHARMESHBHAI', '-', '125', '172', 18, '9054407965', '125.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(126, 'SAGAR K GHAYAL', 'SMV AVENGERS', '126', '141', 30, '9662625980', '126.jpg', 'Left Handed', 'Right Arm', 'No', 1, ''),
(127, 'DR.ROSHI BOMBEWALA', 'SHANKAR NAGAR', '127', '39', 31, '9601761697', '127.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(128, 'DUDHWALA MEET DIVYesHBHAI', 'SMV AVENGERS', '128', '141', 18, '9925503077', '128.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(129, 'HARSHAL KISHORCHANDRA GANDHI', '-', '129', '172', 37, '9375938282', '129.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(130, 'PRAYASH JARIWALA', '-', '130', '6', 20, '8401244996', '130.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(131, 'VILIS ANILKUMAR MODI', 'ROVERS XI', '131', '152', 34, '7984179178', '131.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(132, 'DHARMESH VASANTLAL GANDHI', 'JAY BHARAT XI', '132', '86', 54, '9825770110', '132.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(133, 'KRISH NIKUNJKUMAR GANDHI', 'GALAXI STUNNER', '133', '178', 16, '9313229115', '133.jpg', 'Right Handed', 'No', 'No', 1, ''),
(134, 'GANDHI NIKUNJ GAMANLAL', 'GALAXI STUNNER', '134', '200', 45, '9825783964', '134.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(135, 'ATIT SHARADKUMAR DOCTAR', '-', '135', '82', 33, '-', '135.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(136, 'DEV NISHILKUMAR GANDHI', 'V-PLAYERS', '136', '141', 19, '9909064164', '136.jpg', 'Right Handed', 'LEFT ARM', 'No', 1, ''),
(137, 'NIHAL N GOODLUCK', '-', '137', '141', 38, '6355863003', '137.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(138, 'NEHAL YOGESH PANWALA', '-', '138', '42', 31, '9049649119', '138.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(139, 'GANDHI MANAV HEMANTKUMAR', '-', '139', '135', 17, '7573079513', '139.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(140, 'KANIYA BRIJESH RAJENDRAKUMAR', 'JAY BHARAT XI', '140', '96', 43, '7878444476', '140.jpg', 'Left Handed', 'No', 'Yes', 1, ''),
(141, 'TEJAS RAMESHCHANDRA VANKAWALA', 'JAY BHARAT XI', '141', '154', 63, '7600594279', '141.jpg', 'Right Handed', 'Right Arm', 'Yes', 1, ''),
(142, 'NIKHIL PRAVINCHANDRA KANIYA', 'JAY BHARAT XI', '142', '78', 40, '9825757283', '142.jpg', 'Right Handed', 'No', 'No', 1, ''),
(143, 'AKSHY CHANDRESHKUMAR PANWALA', 'JAY BHARAT XI', '143', '79', 36, '9925005320', '143.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(144, 'HARSHIL DHARMESHBHAI GANDHI', '-', '144', '87', 25, '9825165657', '144.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(145, 'PINKESH ASHOKKUMAR KALKATTAWALA', '-', '145', '43', 39, '9925298962', '145.jpg', 'Right Handed', 'No', 'Yes', 1, ''),
(146, 'GANDHI JAY NAYANKUMAR', '-', '146', '172', 17, '7984233926', '146.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(147, 'PRIT MAMRAWALA', 'SAMARPAN SUPERKING', '147', '172', 22, '9913359946', '147.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(148, 'SMITH JARIWALA', 'SAMARPAN SUPERKING', '148', '172', 27, '9227169666', '148.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(149, 'BHAVIN ASHITKUMAR SHETH', '-', '149', '149', 29, '9033712176', '149.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(150, 'GANDHI VARSHIL NAINESHKUMAR', '-', '150', '172', 25, '7285051261', '150.jpg', 'Left Handed', 'Right Arm', 'No', 1, ''),
(151, 'ISHAN RAJESHKUMAR DUDHWALA', 'GAME CHALLENGERS(GANCHI SHERI)', '151', '141', 28, '8866633070', '151.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(152, 'MAYANK NILESHKUMAR DALAL', 'GAME CHALLENGERS(GANCHI SHERI)', '152', '141', 26, '8460007313', '152.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(153, 'LOTWALA DHAVAL JAYWADAN', '-', '153', '141', 23, '7228970707', '153.jpg', 'No', 'LEFT ARM', 'Yes', 1, ''),
(154, 'BODHAWALA HARDIK BHAVINKUMAR', '-', '154', '172', 26, '-', '154.jpg', 'Right Handed', 'LEFT ARM', 'No', 1, ''),
(155, 'BODHAWALA JAY JIGNESHKUMAR', '-', '155', '172', 21, '-', '155.jpg', 'Left Handed', 'LEFT ARM', 'No', 1, ''),
(156, 'DHARMESH B BEKAWALA', 'FIGHTER 11', '156', '138', 44, '9825110295', '156.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(157, 'ISHAN BHAVIN RANGOONWALA', 'FIGHTER 11', '157', '133', 21, '9904986069', '157.jpg', 'Right Handed', 'Right Arm', 'No', 1, ''),
(158, 'SNEHAL GAJJAR', '-', '158', '131', 38, '8200866615', '158.jpg', 'Right Handed', 'Right Arm', 'No', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `shortname` varchar(10) NOT NULL,
  `ownername` varchar(200) DEFAULT NULL,
  `companyname` varchar(200) DEFAULT NULL,
  `team_logo` varchar(100) NOT NULL,
  `budget_point` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-Active,2- InActive',
  `tournament_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_modified` datetime DEFAULT NULL,
  `last_update_by_admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `shortname`, `ownername`, `companyname`, `team_logo`, `budget_point`, `status`, `tournament_id`, `created`, `last_modified`, `last_update_by_admin_id`) VALUES
(1, 'JAY AMBE 11', 'JA', 'Bantibhai Sopaliwala', '', 'ja_220304145838.jpg', 1200000, 1, 1, '2022-03-04 14:58:38', '2022-03-05 06:05:35', 1),
(2, 'MIVAAN XI', 'MXI', 'Bhavin Boghawala', '', 'mxi_220305060252.jpg', 1200000, 1, 1, '2022-03-05 06:02:52', '2022-03-05 06:03:10', 1),
(3, 'MODI FIGHTERS', 'MF', 'Viral Modi', '', 'mf_220305060354.jpg', 1200000, 1, 1, '2022-03-05 06:03:54', NULL, 1),
(4, 'SKYLINE SCORPIONS', 'SS', 'Snehal Mehta', '', 'ss_220305060503.jpg', 1200000, 1, 1, '2022-03-05 06:05:03', NULL, 1),
(5, 'SHREYA XI', 'SXI', 'Kamal Singwala', '', 'sxi_220305060632.jpg', 1200000, 1, 1, '2022-03-05 06:06:32', NULL, 1),
(6, 'KHUSHI FIGHTERS', 'KF', 'Piyush Bekawala', '', 'kf_220305060736.jpg', 1200000, 1, 1, '2022-03-05 06:07:36', NULL, 1),
(7, 'MODI YOGI WARRIORS', 'MW', 'Jigar Modi', '', 'myw_220305060827.jpg', 1200000, 1, 1, '2022-03-05 06:08:27', '2022-03-07 15:48:21', 1),
(8, 'LAKE FIELD XI', 'LFX', 'Bhadhresh Kapadiya', '', 'lfx_220307153219.jpg', 1200000, 1, 1, '2022-03-07 15:31:51', '2022-03-07 15:32:19', 1),
(9, 'TEAM AMBITION', 'TA', 'Ajay Chaliyawala', '', 'ta_220307153542.jpg', 1200000, 1, 1, '2022-03-07 15:35:42', '2022-03-07 16:17:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams_players`
--

DROP TABLE IF EXISTS `teams_players`;
CREATE TABLE IF NOT EXISTS `teams_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `sold_points` int(11) NOT NULL DEFAULT '0',
  `is_captain` int(11) NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL COMMENT 'Reserved / Sold',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams_players`
--

INSERT INTO `teams_players` (`id`, `team_id`, `player_id`, `tournament_id`, `sold_points`, `is_captain`, `status`, `created`) VALUES
(1, 1, 156, 1, 0, 0, 'Reserved', '2022-03-07 16:14:15'),
(2, 6, 57, 1, 0, 0, 'Reserved', '2022-03-07 16:14:52'),
(3, 7, 1, 1, 0, 0, 'Reserved', '2022-03-07 16:15:18'),
(4, 3, 67, 1, 0, 0, 'Reserved', '2022-03-07 16:15:49'),
(5, 8, 42, 1, 0, 0, 'Reserved', '2022-03-07 16:16:11'),
(6, 5, 32, 1, 0, 0, 'Reserved', '2022-03-07 16:16:30'),
(7, 2, 70, 1, 0, 0, 'Reserved', '2022-03-07 16:16:53'),
(8, 9, 100, 1, 0, 0, 'Reserved', '2022-03-07 16:17:17'),
(9, 4, 108, 1, 0, 0, 'Reserved', '2022-03-07 16:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `team_player_summary`
--

DROP TABLE IF EXISTS `team_player_summary`;
CREATE TABLE IF NOT EXISTS `team_player_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `entry_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

DROP TABLE IF EXISTS `tournament`;
CREATE TABLE IF NOT EXISTS `tournament` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `year` varchar(50) NOT NULL,
  `logo` text,
  `created_date` date NOT NULL,
  `details` text,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_login` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `name`, `email`, `password`, `year`, `logo`, `created_date`, `details`, `active`) VALUES
(1, 'Shree Surti Modh Vanik Athwa Panch Yuvak Mandal Premier League 2022', 'nishantmeva@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', '2021-22', 'logo.png', '2021-07-25', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
