-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2012 at 09:58 PM
-- Server version: 5.1.63-0ubuntu0.11.04.1
-- PHP Version: 5.3.5-1ubuntu7.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ufredis`
--

-- --------------------------------------------------------

--
-- Table structure for table `balance_history`
--

CREATE TABLE IF NOT EXISTS `balance_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_type` varchar(10) NOT NULL COMMENT '(W-withdraw, I-Invest, C-Comission, P-Payment From Gateway)',
  `information` text NOT NULL,
  `amount` float NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `balance_history`
--

INSERT INTO `balance_history` (`history_id`, `user_id`, `transaction_type`, `information`, `amount`, `payment_status`, `create_date`, `modified_date`) VALUES
(1, 1, 'C', 'For interest', 5, 0, '2012-10-28 22:05:25', '2012-10-28 10:05:05'),
(2, 1, 'C', 'For interest', 5, 0, '2012-10-28 16:17:02', '2012-10-28 10:17:02'),
(3, 1, 'C', 'For interest', 5, 0, '2012-10-28 16:22:02', '2012-10-28 10:22:02'),
(4, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:52:17', '2012-10-30 10:52:17'),
(5, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:52:17', '2012-10-30 10:52:17'),
(6, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:53:17', '2012-10-30 10:53:17'),
(7, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:53:17', '2012-10-30 10:53:17'),
(8, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:54:17', '2012-10-30 10:54:17'),
(9, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:54:17', '2012-10-30 10:54:17'),
(10, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:55:17', '2012-10-30 10:55:17'),
(11, 1, 'I', 'For interest', 2, 0, '2012-10-30 16:55:17', '2012-10-30 10:55:17'),
(12, 1, 'P', 'Purchase Credit', 50, 0, '2012-11-02 00:00:00', '2012-11-02 15:09:06'),
(13, 1, 'I', 'Invest Credit', 20, 1, '2012-11-02 00:00:00', '2012-11-02 15:24:38'),
(14, 1, 'I', 'Invest Credit', 20, 1, '2012-11-02 00:00:00', '2012-11-02 15:37:08'),
(15, 1, 'P', 'Purchase Credit', 50, 0, '2012-11-06 00:00:00', '2012-11-06 16:14:35'),
(16, 1, 'W', 'Withdraw Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:14:42'),
(17, 1, 'W', 'Withdraw Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:18:55'),
(18, 1, 'W', 'Withdraw Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:19:33'),
(19, 1, 'W', 'Withdraw Credit', 50, 0, '2012-11-07 00:00:00', '2012-11-07 14:19:45'),
(20, 1, 'W', 'Withdraw Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:30'),
(21, 1, 'W', 'Withdraw Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:35'),
(22, 1, 'W', 'Withdraw Credit', 23, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:45'),
(23, 1, 'W', 'Withdraw Credit', 32, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:48'),
(24, 1, 'W', 'Withdraw Credit', 23, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:51'),
(25, 1, 'W', 'Withdraw Credit', 23, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:54'),
(26, 1, 'W', 'Withdraw Credit', 32, 0, '2012-11-07 00:00:00', '2012-11-07 14:26:57'),
(27, 1, 'W', 'Withdraw Credit', 23, 0, '2012-11-07 00:00:00', '2012-11-07 14:27:00'),
(28, 1, 'P', 'Purchase Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:56:21'),
(29, 1, 'P', 'Purchase Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 14:58:55'),
(30, 1, 'P', 'Purchase Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 15:10:39'),
(31, 1, 'P', 'Purchase Credit', 10, 0, '2012-11-07 00:00:00', '2012-11-07 15:12:02'),
(32, 1, 'P', 'Purchase Credit', 10, 0, '2012-11-07 00:00:00', '2012-11-07 15:12:51'),
(33, 1, 'P', 'Purchase Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 15:26:56'),
(34, 1, 'P', 'Purchase Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 15:28:01'),
(35, 1, 'P', 'Purchase Credit', 20, 0, '2012-11-07 00:00:00', '2012-11-07 15:47:19'),
(36, 1, 'P', 'Purchase Credit', 50, 0, '2012-11-07 00:00:00', '2012-11-07 15:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `int_country_codes`
--

CREATE TABLE IF NOT EXISTS `int_country_codes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(200) DEFAULT NULL,
  `iso_code` varchar(100) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Dumping data for table `int_country_codes`
--

INSERT INTO `int_country_codes` (`Id`, `country_name`, `iso_code`, `country_code`) VALUES
(1, 'Afghanistan', 'AF / AFG', '93'),
(2, 'Albania', 'AL / ALB', '355'),
(3, 'Algeria', 'DZ / DZA', '213'),
(4, 'Andorra', 'AD / AND', '376'),
(5, 'Angola', 'AO / AGO', '244'),
(6, 'Antarctica', 'AQ / ATA', '672'),
(7, 'Argentina', 'AR / ARG', '54'),
(8, 'Armenia', 'AM / ARM', '374'),
(9, 'Aruba', 'AW / ABW', '297'),
(10, 'Australia', 'AU / AUS', '61'),
(11, 'Austria', 'AT / AUT', '43'),
(12, 'Azerbaijan', 'AZ / AZE', '994'),
(13, 'Bahrain', 'BH / BHR', '973'),
(14, 'Bangladesh', 'BD / BGD', '880'),
(15, 'Belarus', 'BY / BLR', '375'),
(16, 'Belgium', 'BE / BEL', '32'),
(17, 'Belize', 'BZ / BLZ', '501'),
(18, 'Benin', 'BJ / BEN', '229'),
(19, 'Bhutan', 'BT / BTN', '975'),
(20, 'Bolivia', 'BO / BOL', '591'),
(21, 'Bosnia and Herzegovina', 'BA / BIH', '387'),
(22, 'Botswana', 'BW / BWA', '267'),
(23, 'Brazil', 'BR / BRA', '55'),
(24, 'Brunei', 'BN / BRN', '673'),
(25, 'Bulgaria', 'BG / BGR', '359'),
(26, 'Burkina Faso', 'BF / BFA', '226'),
(27, 'Burma (Myanmar)', 'MM / MMR', '95'),
(28, 'Burundi', 'BI / BDI', '257'),
(29, 'Cambodia', 'KH / KHM', '855'),
(30, 'Cameroon', 'CM / CMR', '237'),
(31, 'Canada', 'CA / CAN', '1'),
(32, 'Cape Verde', 'CV / CPV', '238'),
(33, 'Central African Republic', 'CF / CAF', '236'),
(34, 'Chad', 'TD / TCD', '235'),
(35, 'Chile', 'CL / CHL', '56'),
(36, 'China', 'CN / CHN', '86'),
(37, 'Christmas Island', 'CX / CXR', '61'),
(38, 'Cocos (Keeling) Islands', 'CC / CCK', '61'),
(39, 'Colombia', 'CO / COL', '57'),
(40, 'Comoros', 'KM / COM', '269'),
(41, 'Cook Islands', 'CK / COK', '682'),
(42, 'Costa Rica', 'CR / CRC', '506'),
(43, 'Croatia', 'HR / HRV', '385'),
(44, 'Cuba', 'CU / CUB', '53'),
(45, 'Cyprus', 'CY / CYP', '357'),
(46, 'Czech Republic', 'CZ / CZE', '420'),
(47, 'Congo', 'CD / COD', '243'),
(48, 'Denmark', 'DK / DNK', '45'),
(49, 'Djibouti', 'DJ / DJI', '253'),
(50, 'Ecuador', 'EC / ECU', '593'),
(51, 'Egypt', 'EG / EGY', '20'),
(52, 'El Salvador', 'SV / SLV', '503'),
(53, 'Equatorial Guinea', 'GQ / GNQ', '240'),
(54, 'Eritrea', 'ER / ERI', '291'),
(55, 'Estonia', 'EE / EST', '372'),
(56, 'Ethiopia', 'ET / ETH', '251'),
(57, 'Falkland Islands', 'FK / FLK', '500'),
(58, 'Faroe Islands', 'FO / FRO', '298'),
(59, 'Fiji', 'FJ / FJI', '679'),
(60, 'Finland', 'FI / FIN', '358'),
(61, 'France', 'FR / FRA', '33'),
(62, 'French Polynesia', 'PF / PYF', '689'),
(63, 'Gabon', 'GA / GAB', '241'),
(64, 'Gambia', 'GM / GMB', '220'),
(65, 'Gaza Strip', '/', '970'),
(66, 'Georgia', 'GE / GEO', '995'),
(67, 'Germany', 'DE / DEU', '49'),
(68, 'Ghana', 'GH / GHA', '233'),
(69, 'Gibraltar', 'GI / GIB', '350'),
(70, 'Greece', 'GR / GRC', '30'),
(71, 'Greenland', 'GL / GRL', '299'),
(72, 'Guatemala', 'GT / GTM', '502'),
(73, 'Guinea', 'GN / GIN', '224'),
(74, 'Guinea-Bissau', 'GW / GNB', '245'),
(75, 'Guyana', 'GY / GUY', '592'),
(76, 'Haiti', 'HT / HTI', '509'),
(77, 'Holy See (Vatican City)', 'VA / VAT', '39'),
(78, 'Honduras', 'HN / HND', '504'),
(79, 'Hong Kong', 'HK / HKG', '852'),
(80, 'Hungary', 'HU / HUN', '36'),
(81, 'Iceland', 'IS / IS', '354'),
(82, 'India', 'IN / IND', '91'),
(83, 'Indonesia', 'ID / IDN', '62'),
(84, 'Iran', 'IR / IRN', '98'),
(85, 'Iraq', 'IQ / IRQ', '964'),
(86, 'Ireland', 'IE / IRL', '353'),
(87, 'Isle of Man', 'IM / IMN', '44'),
(88, 'Israel', 'IL / ISR', '972'),
(89, 'Italy', 'IT / ITA', '39'),
(90, 'Ivory Coast', 'CI / CIV', '225'),
(91, 'Japan', 'JP / JPN', '81'),
(92, 'Jordan', 'JO / JOR', '962'),
(93, 'Kazakhstan', 'KZ / KAZ', '7'),
(94, 'Kenya', 'KE / KEN', '254'),
(95, 'Kiribati', 'KI / KIR', '686'),
(96, 'Kosovo', '/', '381'),
(97, 'Kuwait', 'KW / KWT', '965'),
(98, 'Kyrgyzstan', 'KG / KGZ', '996'),
(99, 'Laos', 'LA / LAO', '856'),
(100, 'Latvia', 'LV / LVA', '371'),
(101, 'Lebanon', 'LB / LBN', '961'),
(102, 'Lesotho', 'LS / LSO', '266'),
(103, 'Liberia', 'LR / LBR', '231'),
(104, 'Libya', 'LY / LBY', '218'),
(105, 'Liechtenstein', 'LI / LIE', '423'),
(106, 'Lithuania', 'LT / LTU', '370'),
(107, 'Luxembourg', 'LU / LUX', '352'),
(108, 'Macau', 'MO / MAC', '853'),
(109, 'Macedonia', 'MK / MKD', '389'),
(110, 'Madagascar', 'MG / MDG', '261'),
(111, 'Malawi', 'MW / MWI', '265'),
(112, 'Malaysia', 'MY / MYS', '60'),
(113, 'Maldives', 'MV / MDV', '960'),
(114, 'Mali', 'ML / MLI', '223'),
(115, 'Malta', 'MT / MLT', '356'),
(116, 'Marshall Islands', 'MH / MHL', '692'),
(117, 'Mauritania', 'MR / MRT', '222'),
(118, 'Mauritius', 'MU / MUS', '230'),
(119, 'Mayotte', 'YT / MYT', '262'),
(120, 'Mexico', 'MX / MEX', '52'),
(121, 'Micronesia', 'FM / FSM', '691'),
(122, 'Moldova', 'MD / MDA', '373'),
(123, 'Monaco', 'MC / MCO', '377'),
(124, 'Mongolia', 'MN / MNG', '976'),
(125, 'Montenegro', 'ME / MNE', '382'),
(126, 'Morocco', 'MA / MAR', '212'),
(127, 'Mozambique', 'MZ / MOZ', '258'),
(128, 'Namibia', 'NA / NAM', '264'),
(129, 'Nauru', 'NR / NRU', '674'),
(130, 'Nepal', 'NP / NPL', '977'),
(131, 'Netherlands', 'NL / NLD', '31'),
(132, 'Netherlands Antilles', 'AN / ANT', '599'),
(133, 'New Caledonia', 'NC / NCL', '687'),
(134, 'New Zealand', 'NZ / NZL', '64'),
(135, 'Nicaragua', 'NI / NIC', '505'),
(136, 'Niger', 'NE / NER', '227'),
(137, 'Nigeria', 'NG / NGA', '234'),
(138, 'Niue', 'NU / NIU', '683'),
(139, 'Norfolk Island', '/ NFK', '672'),
(140, 'North Korea', 'KP / PRK', '850'),
(141, 'Norway', 'NO / NOR', '47'),
(142, 'Oman', 'OM / OMN', '968'),
(143, 'Pakistan', 'PK / PAK', '92'),
(144, 'Palau', 'PW / PLW', '680'),
(145, 'Panama', 'PA / PAN', '507'),
(146, 'Papua New Guinea', 'PG / PNG', '675'),
(147, 'Paraguay', 'PY / PRY', '595'),
(148, 'Peru', 'PE / PER', '51'),
(149, 'Philippines', 'PH / PHL', '63'),
(150, 'Pitcairn Islands', 'PN / PCN', '870'),
(151, 'Poland', 'PL / POL', '48'),
(152, 'Portugal', 'PT / PRT', '351'),
(153, 'Puerto Rico', 'PR / PRI', '1'),
(154, 'Qatar', 'QA / QAT', '974'),
(155, 'Republic of the Congo', 'CG / COG', '242'),
(156, 'Romania', 'RO / ROU', '40'),
(157, 'Russia', 'RU / RUS', '7'),
(158, 'Rwanda', 'RW / RWA', '250'),
(159, 'Saint Barthelemy', 'BL / BLM', '590'),
(160, 'Saint Helena', 'SH / SHN', '290'),
(161, 'Saint Pierre and Miquelon', 'PM / SPM', '508'),
(162, 'Samoa', 'WS / WSM', '685'),
(163, 'San Marino', 'SM / SMR', '378'),
(164, 'Sao Tome and Principe', 'ST / STP', '239'),
(165, 'Saudi Arabia', 'SA / SAU', '966'),
(166, 'Senegal', 'SN / SEN', '221'),
(167, 'Serbia', 'RS / SRB', '381'),
(168, 'Seychelles', 'SC / SYC', '248'),
(169, 'Sierra Leone', 'SL / SLE', '232'),
(170, 'Singapore', 'SG / SGP', '65'),
(171, 'Slovakia', 'SK / SVK', '421'),
(172, 'Slovenia', 'SI / SVN', '386'),
(173, 'Solomon Islands', 'SB / SLB', '677'),
(174, 'Somalia', 'SO / SOM', '252'),
(175, 'South Africa', 'ZA / ZAF', '27'),
(176, 'South Korea', 'KR / KOR', '82'),
(177, 'Spain', 'ES / ESP', '34'),
(178, 'Sri Lanka', 'LK / LKA', '94'),
(179, 'Sudan', 'SD / SDN', '249'),
(180, 'Suriname', 'SR / SUR', '597'),
(181, 'Swaziland', 'SZ / SWZ', '268'),
(182, 'Sweden', 'SE / SWE', '46'),
(183, 'Switzerland', 'CH / CHE', '41'),
(184, 'Syria', 'SY / SYR', '963'),
(185, 'Taiwan', 'TW / TWN', '886'),
(186, 'Tajikistan', 'TJ / TJK', '992'),
(187, 'Tanzania', 'TZ / TZA', '255'),
(188, 'Thailand', 'TH / THA', '66'),
(189, 'Timor-Leste', 'TL / TLS', '670'),
(190, 'Togo', 'TG / TGO', '228'),
(191, 'Tokelau', 'TK / TKL', '690'),
(192, 'Tonga', 'TO / TON', '676'),
(193, 'Tunisia', 'TN / TUN', '216'),
(194, 'Turkey', 'TR / TUR', '90'),
(195, 'Turkmenistan', 'TM / TKM', '993'),
(196, 'Tuvalu', 'TV / TUV', '688'),
(197, 'Uganda', 'UG / UGA', '256'),
(198, 'Ukraine', 'UA / UKR', '380'),
(199, 'United Arab Emirates', 'AE / ARE', '971'),
(200, 'United Kingdom', 'GB / GBR', '44'),
(201, 'United States', 'US / USA', '1'),
(202, 'Uruguay', 'UY / URY', '598'),
(203, 'Uzbekistan', 'UZ / UZB', '998'),
(204, 'Vanuatu', 'VU / VUT', '678'),
(205, 'Venezuela', 'VE / VEN', '58'),
(206, 'Vietnam', 'VN / VNM', '84'),
(207, 'Wallis and Futuna', 'WF / WLF', '681'),
(208, 'West Bank', '/', '970'),
(209, 'Yemen', 'YE / YEM', '967'),
(210, 'Zambia', 'ZM / ZMB', '260'),
(211, 'Zimbabwe', 'ZW / ZWE', '263');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE IF NOT EXISTS `investments` (
  `investment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `investment_amount` float DEFAULT NULL,
  `payment_method` varchar(100) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '(0-unpaid, 1-paid)',
  `created_date` date DEFAULT NULL,
  `modifying_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `draw_count` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`investment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`investment_id`, `user_id`, `investment_amount`, `payment_method`, `payment_status`, `created_date`, `modifying_date`, `draw_count`) VALUES
(1, 1, 100, '', 0, '2012-10-30', '2012-10-30 10:55:17', 4),
(2, 1, 20, 'account', 1, '2012-11-02', '2012-11-02 15:23:52', 0),
(3, 1, 20, 'account', 1, '2012-11-02', '2012-11-02 15:24:38', 0),
(4, 1, 20, 'From Account Balance', 1, '2012-11-02', '2012-11-02 15:37:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `paid_status` tinyint(1) NOT NULL,
  `show_status` tinyint(4) NOT NULL DEFAULT '1',
  `date_created` date NOT NULL,
  `modifying_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `user_id`, `amount`, `payment_method`, `paid_status`, `show_status`, `date_created`, `modifying_date`) VALUES
(1, 1, 50, 'Liberty', 0, 0, '2012-11-02', '2012-11-02 14:55:41'),
(2, 1, 50, 'Liberty', 0, 0, '2012-11-02', '2012-11-02 14:57:04'),
(3, 1, 50, 'Liberty', 0, 0, '2012-11-02', '2012-11-02 14:58:41'),
(4, 1, 20, 'Liberty', 0, 0, '2012-11-02', '2012-11-02 14:59:21'),
(5, 1, 50, 'Liberty', 0, 0, '2012-11-02', '2012-11-02 15:08:21'),
(6, 1, 50, 'Liberty', 0, 0, '2012-11-02', '2012-11-02 15:09:06'),
(7, 1, 50, 'Liberty', 0, 0, '2012-11-06', '2012-11-06 16:14:35'),
(8, 1, 20, 'Liberty', 0, 0, '2012-11-07', '2012-11-07 14:56:21'),
(9, 1, 20, 'Liberty', 0, 0, '2012-11-07', '2012-11-07 14:58:55'),
(10, 1, 20, 'Liberty', 0, 0, '2012-11-07', '2012-11-07 15:10:39'),
(11, 1, 10, 'Liberty', 0, 0, '2012-11-07', '2012-11-07 15:12:02'),
(12, 1, 10, 'Liberty', 0, 0, '2012-11-07', '2012-11-07 15:12:51'),
(13, 1, 20, 'Liberty', 0, 0, '2012-11-07', '2012-11-07 15:26:56'),
(14, 1, 20, 'Liberty', 1, 0, '2012-11-07', '2012-11-07 15:28:01'),
(15, 1, 20, 'Liberty', 0, 1, '2012-11-07', '2012-11-07 15:47:19'),
(16, 1, 50, 'Liberty', 0, 1, '2012-11-07', '2012-11-07 15:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_informations`
--

CREATE TABLE IF NOT EXISTS `user_informations` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_user_id` int(11) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) CHARACTER SET ucs2 NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `balance` float NOT NULL DEFAULT '0',
  `mobile` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `activating_code` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL COMMENT '(Active-1, Inactive-0)',
  `create_date` datetime NOT NULL,
  `modifying_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_informations`
--

INSERT INTO `user_informations` (`user_id`, `parent_user_id`, `parent_email`, `fname`, `lname`, `gender`, `email`, `passwd`, `balance`, `mobile`, `birthdate`, `address`, `city`, `country`, `activating_code`, `is_active`, `create_date`, `modifying_date`) VALUES
(1, 0, '', 'asd', 'asd', '', 'asdasd@asd.com', 'e10adc3949ba59abbe56e057f20f883e', 794, '123123', '0000-00-00', 'asd', 'asd', 'Afghanistan', '', 1, '0000-00-00 00:00:00', '2012-11-07 15:48:08'),
(2, 0, 'asdasd@asd.com', 'asd', 'asd', '', 'shakil.bokul@gmail.com', '260ca9dd8a4577fc00b7bd5810298076', 10, '123123', '0000-00-00', 'asd', 'asd', 'Afghanistan', '', 1, '0000-00-00 00:00:00', '2012-11-07 15:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_accounts`
--

CREATE TABLE IF NOT EXISTS `withdraw_accounts` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `withdraw_amount` float DEFAULT NULL,
  `withdraw_mathod` varchar(100) DEFAULT NULL,
  `account_no` varchar(100) NOT NULL,
  `information` varchar(200) DEFAULT NULL,
  `paid_status` tinyint(1) DEFAULT NULL COMMENT '(Paid-1,Unpaid-0)',
  `create_date` date DEFAULT NULL,
  `modifying_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `withdraw_accounts`
--

INSERT INTO `withdraw_accounts` (`withdraw_id`, `user_id`, `withdraw_amount`, `withdraw_mathod`, `account_no`, `information`, `paid_status`, `create_date`, `modifying_date`) VALUES
(1, 1, 20, 'Liberty', 'u1111', NULL, 0, '2012-11-07', '2012-11-07 14:14:42'),
(2, 1, 20, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:18:55'),
(3, 1, 20, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:19:33'),
(4, 1, 50, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:19:45'),
(5, 1, 20, 'Liberty', '5345325435', NULL, 0, '2012-11-07', '2012-11-07 14:26:30'),
(6, 1, 20, 'Liberty', '3452345', NULL, 0, '2012-11-07', '2012-11-07 14:26:35'),
(7, 1, 23, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:26:45'),
(8, 1, 32, 'Liberty', 'Liberty', NULL, 1, '2012-11-07', '2012-11-07 14:26:48'),
(9, 1, 23, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:26:51'),
(10, 1, 23, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:26:54'),
(11, 1, 32, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:26:57'),
(12, 1, 23, 'Liberty', 'Liberty', NULL, 0, '2012-11-07', '2012-11-07 14:27:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
