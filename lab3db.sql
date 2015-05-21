-- phpMyAdmin SQL Dump
-- version 4.0.10.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 03:32 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lab3db`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab3_secrets`
--

CREATE TABLE IF NOT EXISTS `lab3_secrets` (
  `group_number` int(20) NOT NULL,
  `secret` varchar(500) NOT NULL,
  `sent_by_group` int(11) NOT NULL,
  KEY `group_number_2` (`group_number`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab3_secrets`
--

INSERT INTO `lab3_secrets` (`group_number`, `secret`, `sent_by_group`) VALUES
(2, 'j{ºªš—:¼?.%Á7T\r{’ô', 0),
(3, 'j{ºªS–;½>/$À6Uz“õ', 0),
(4, 'j{ºªq‘<º9(#Ç1R}”ò', 0),
(5, 'j{ºª÷=»8)"Æ0S\n|•ó', 0),
(6, 'j{ºªâ“>¸;*!Å3P	–ð', 0),
(7, 'j{ºªü’?¹:+ Ä2Q~—ñ', 0),
(8, 'j{ºª‡0¶5$/Ë=^q˜þ', 0),
(9, 'j{ºª¡œ1·4%.Ê<_p™ÿ', 0),
(10, 'j{ºª¨•‚1‘Ä~?Ê0à', 0),
(11, 'j{ºª¨ƒ0ÅŽ>ËŒ1á', 0),
(12, 'j{ºª¨M€3“Æ|=È2â', 0),
(13, 'j{ºª¨„\02’Ç}Œ<ÉŽ3ã', 0),
(14, 'j{ºª¨¦†5•Àz‹;Î‰4ä', 0),
(15, 'j{ºª¨ ‡4”Á{Š:Ïˆ5å', 0),
(16, 'j{ºª¨5„7—Âx‰9Ì‹6æ\Z', 0),
(17, 'j{ºª¨+…6–Ãyˆ8ÍŠ7ç', 0),
(18, 'j{ºª¨PŠ9™Ìv‡7Â…8è', 0),
(19, 'j{ºª¨v‹\n8˜Íw†6Ã„9é', 0),
(20, 'j{ºªš–\02’Ç}Œ<ÉŽ3ã', 0),
(21, 'j{ºªš|€3“Æ|=È2â', 0),
(22, 'j{ºªšNƒ0ÅŽ>ËŒ1á', 0),
(23, 'j{ºªš‡‚1‘Ä~?Ê0à', 0),
(24, 'j{ºªš¥…6–Ãyˆ8ÍŠ7ç', 0),
(25, 'j{ºªš#„7—Âx‰9Ì‹6æ\Z', 0),
(26, 'j{ºªš6‡4”Á{Š:Ïˆ5å', 0),
(27, 'j{ºªš(†5•Àz‹;Î‰4ä', 0),
(28, 'j{ºªšS‰:šÏu„4Á†;ë', 0),
(29, 'j{ºªšuˆ	;›Ît…5À‡:ê', 0),
(1, 'laR8Z6t2rxAVc', 0),
(0, '¶6', 0),
(0, '¦ÍØ›óŒ‹¿zã¬', 3),
(0, '¶3', 3),
(3, 'ä8Ä', 3),
(2, 'ÓWQÇ-å', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
