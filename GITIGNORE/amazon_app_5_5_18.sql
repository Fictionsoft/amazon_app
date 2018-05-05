# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.5.5-10.1.25-MariaDB
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2018-05-05 17:09:12
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for amazon_app
DROP DATABASE IF EXISTS `amazon_app`;
CREATE DATABASE IF NOT EXISTS `amazon_app` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `amazon_app`;


# Dumping structure for table amazon_app.fit_f2lt_assign_jobs
DROP TABLE IF EXISTS `fit_f2lt_assign_jobs`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_assign_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_assign_jobs: 4 rows
/*!40000 ALTER TABLE `fit_f2lt_assign_jobs` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_assign_jobs` (`id`, `job_id`, `requirement_id`, `created`, `modified`) VALUES
	(4, 1, 2, '2017-09-08 12:52:16', '2017-09-08 12:52:16'),
	(3, 1, 1, '2017-09-08 12:52:16', '2017-09-08 12:52:16'),
	(5, 2, 3, '2017-09-08 14:17:57', '2017-09-08 14:17:57'),
	(6, 2, 4, '2017-09-08 14:17:57', '2017-09-08 14:17:57');
/*!40000 ALTER TABLE `fit_f2lt_assign_jobs` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_attachments
DROP TABLE IF EXISTS `fit_f2lt_attachments`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

# Dumping data for table amazon_app.fit_f2lt_attachments: ~0 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_attachments` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_attachments` (`id`, `name`, `path`, `mime_type`, `created`, `updated`, `ordering`) VALUES
	(48, 'test', '1.jpg', 'image/jpeg', '2017-09-30 22:08:04', '2017-09-30 22:08:04', 1);
/*!40000 ALTER TABLE `fit_f2lt_attachments` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_brands
DROP TABLE IF EXISTS `fit_f2lt_brands`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_brands: 4 rows
/*!40000 ALTER TABLE `fit_f2lt_brands` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_brands` (`id`, `name`, `status`, `created`, `modified`) VALUES
	(7, '0', 0, '2015-11-23 08:56:00', '2015-11-26 10:49:51'),
	(6, '0', 0, '2015-11-23 08:53:54', '2015-11-26 10:50:03'),
	(5, '0', 0, '2015-11-23 08:50:53', '2015-12-06 03:33:41'),
	(8, '0', 0, '2015-11-23 09:08:28', '2015-11-26 10:49:45');
/*!40000 ALTER TABLE `fit_f2lt_brands` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_categories
DROP TABLE IF EXISTS `fit_f2lt_categories`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_category_id` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(222) NOT NULL DEFAULT '0',
  `name` varchar(222) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_categories: ~9 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_categories` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_categories` (`id`, `main_category_id`, `slug`, `name`, `order`, `status`, `created`, `modified`, `photo`) VALUES
	(1, 1, 'women-s-clothing', 'Women\'s Clothing', 1, 1, '0000-00-00 00:00:00', '2015-11-21 04:57:30', 'before_you_start.PNG'),
	(2, 1, 'men-s-clothing', 'Men\'s Clothing', 2, 1, '2015-06-01 00:00:00', '2015-10-30 17:35:39', 'before_you_start.PNG'),
	(15, 14, 'footwear', 'Footwear', 4, 1, '0000-00-00 00:00:00', '2015-11-05 07:56:32', ''),
	(16, 13, 'jewellery', 'Jewellery', 5, 1, '0000-00-00 00:00:00', '2015-11-02 15:21:22', ''),
	(17, 13, 'watches', 'Watches', 6, 1, '0000-00-00 00:00:00', '2015-11-02 15:21:11', ''),
	(18, 10, 'perfumes', 'Perfumes', 7, 1, '0000-00-00 00:00:00', '2015-11-02 15:18:32', ''),
	(23, 1, 'servises', 'Servises', 8, 1, '2015-11-05 07:59:11', '2015-11-05 07:59:11', 'map.png'),
	(24, 9, 'progarmming', 'progarmming', 8, 1, '2015-11-07 10:48:10', '2015-11-07 10:48:10', 'create-your-own-website.gif'),
	(25, 1, 'pant', 'Pant', 9, 1, '2015-12-30 13:14:23', '2015-12-30 13:14:44', '1451456063_MA-J-011a-250x250.jpg');
/*!40000 ALTER TABLE `fit_f2lt_categories` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_category_sizes
DROP TABLE IF EXISTS `fit_f2lt_category_sizes`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_category_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_category_sizes: ~15 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_category_sizes` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_category_sizes` (`id`, `size_id`, `category_id`) VALUES
	(25, 1, 2),
	(26, 2, 2),
	(27, 3, 2),
	(33, 1, 14),
	(34, 2, 14),
	(35, 3, 14),
	(38, 4, 15),
	(39, 5, 15),
	(40, 2, 23),
	(41, 3, 24),
	(52, 1, 1),
	(53, 2, 1),
	(54, 3, 1),
	(56, 1, 25),
	(57, 2, 25);
/*!40000 ALTER TABLE `fit_f2lt_category_sizes` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_comments
DROP TABLE IF EXISTS `fit_f2lt_comments`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_comments: ~5 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_comments` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_comments` (`id`, `user_id`, `product_id`, `comment`, `created`, `updated`) VALUES
	(1, 114, 21, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2015-10-18 14:13:28', '2015-10-18 14:13:28'),
	(2, 114, 21, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2015-10-18 14:16:37', '2015-10-18 14:16:37'),
	(3, 114, 23, 'good', '2015-11-05 03:37:59', '2015-11-05 03:37:59'),
	(4, 114, 24, 'vary nice', '2015-11-07 14:46:29', '2015-11-07 14:46:29'),
	(5, 114, 46, 'fgdf', '2015-11-28 14:47:28', '2015-11-28 14:47:28');
/*!40000 ALTER TABLE `fit_f2lt_comments` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_countries
DROP TABLE IF EXISTS `fit_f2lt_countries`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `iso_code_2` char(2) NOT NULL DEFAULT '',
  `iso_code_3` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_countries_name_zen` (`name`),
  KEY `idx_iso_2_zen` (`iso_code_2`),
  KEY `idx_iso_3_zen` (`iso_code_3`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

# Dumping data for table amazon_app.fit_f2lt_countries: 243 rows
/*!40000 ALTER TABLE `fit_f2lt_countries` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_countries` (`id`, `name`, `iso_code_2`, `iso_code_3`) VALUES
	(240, 'Aaland Islands', 'AX', 'ALA'),
	(1, 'Afghanistan', 'AF', 'AFG'),
	(2, 'Albania', 'AL', 'ALB'),
	(3, 'Algeria', 'DZ', 'DZA'),
	(4, 'American Samoa', 'AS', 'ASM'),
	(5, 'Andorra', 'AD', 'AND'),
	(6, 'Angola', 'AO', 'AGO'),
	(7, 'Anguilla', 'AI', 'AIA'),
	(8, 'Antarctica', 'AQ', 'ATA'),
	(9, 'Antigua and Barbuda', 'AG', 'ATG'),
	(10, 'Argentina', 'AR', 'ARG'),
	(11, 'Armenia', 'AM', 'ARM'),
	(12, 'Aruba', 'AW', 'ABW'),
	(13, 'Australia', 'AU', 'AUS'),
	(14, 'Austria', 'AT', 'AUT'),
	(15, 'Azerbaijan', 'AZ', 'AZE'),
	(16, 'Bahamas', 'BS', 'BHS'),
	(17, 'Bahrain', 'BH', 'BHR'),
	(18, 'Bangladesh', 'BD', 'BGD'),
	(19, 'Barbados', 'BB', 'BRB'),
	(20, 'Belarus', 'BY', 'BLR'),
	(21, 'Belgium', 'BE', 'BEL'),
	(22, 'Belize', 'BZ', 'BLZ'),
	(23, 'Benin', 'BJ', 'BEN'),
	(24, 'Bermuda', 'BM', 'BMU'),
	(25, 'Bhutan', 'BT', 'BTN'),
	(26, 'Bolivia', 'BO', 'BOL'),
	(27, 'Bosnia and Herzegowina', 'BA', 'BIH'),
	(28, 'Botswana', 'BW', 'BWA'),
	(29, 'Bouvet Island', 'BV', 'BVT'),
	(30, 'Brazil', 'BR', 'BRA'),
	(31, 'British Indian Ocean Territory', 'IO', 'IOT'),
	(32, 'Brunei Darussalam', 'BN', 'BRN'),
	(33, 'Bulgaria', 'BG', 'BGR'),
	(34, 'Burkina Faso', 'BF', 'BFA'),
	(35, 'Burundi', 'BI', 'BDI'),
	(36, 'Cambodia', 'KH', 'KHM'),
	(37, 'Cameroon', 'CM', 'CMR'),
	(38, 'Canada', 'CA', 'CAN'),
	(39, 'Cape Verde', 'CV', 'CPV'),
	(40, 'Cayman Islands', 'KY', 'CYM'),
	(41, 'Central African Republic', 'CF', 'CAF'),
	(42, 'Chad', 'TD', 'TCD'),
	(43, 'Chile', 'CL', 'CHL'),
	(44, 'China', 'CN', 'CHN'),
	(45, 'Christmas Island', 'CX', 'CXR'),
	(46, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
	(47, 'Colombia', 'CO', 'COL'),
	(48, 'Comoros', 'KM', 'COM'),
	(49, 'Congo', 'CG', 'COG'),
	(50, 'Cook Islands', 'CK', 'COK'),
	(51, 'Costa Rica', 'CR', 'CRI'),
	(52, 'Cote D\'Ivoire', 'CI', 'CIV'),
	(53, 'Croatia', 'HR', 'HRV'),
	(54, 'Cuba', 'CU', 'CUB'),
	(55, 'Cyprus', 'CY', 'CYP'),
	(56, 'Czech Republic', 'CZ', 'CZE'),
	(57, 'Denmark', 'DK', 'DNK'),
	(58, 'Djibouti', 'DJ', 'DJI'),
	(59, 'Dominica', 'DM', 'DMA'),
	(60, 'Dominican Republic', 'DO', 'DOM'),
	(61, 'Timor-Leste', 'TL', 'TLS'),
	(62, 'Ecuador', 'EC', 'ECU'),
	(63, 'Egypt', 'EG', 'EGY'),
	(64, 'El Salvador', 'SV', 'SLV'),
	(65, 'Equatorial Guinea', 'GQ', 'GNQ'),
	(66, 'Eritrea', 'ER', 'ERI'),
	(67, 'Estonia', 'EE', 'EST'),
	(68, 'Ethiopia', 'ET', 'ETH'),
	(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
	(70, 'Faroe Islands', 'FO', 'FRO'),
	(71, 'Fiji', 'FJ', 'FJI'),
	(72, 'Finland', 'FI', 'FIN'),
	(73, 'France', 'FR', 'FRA'),
	(75, 'French Guiana', 'GF', 'GUF'),
	(76, 'French Polynesia', 'PF', 'PYF'),
	(77, 'French Southern Territories', 'TF', 'ATF'),
	(78, 'Gabon', 'GA', 'GAB'),
	(79, 'Gambia', 'GM', 'GMB'),
	(80, 'Georgia', 'GE', 'GEO'),
	(81, 'Germany', 'DE', 'DEU'),
	(82, 'Ghana', 'GH', 'GHA'),
	(83, 'Gibraltar', 'GI', 'GIB'),
	(84, 'Greece', 'GR', 'GRC'),
	(85, 'Greenland', 'GL', 'GRL'),
	(86, 'Grenada', 'GD', 'GRD'),
	(87, 'Guadeloupe', 'GP', 'GLP'),
	(88, 'Guam', 'GU', 'GUM'),
	(89, 'Guatemala', 'GT', 'GTM'),
	(90, 'Guinea', 'GN', 'GIN'),
	(91, 'Guinea-bissau', 'GW', 'GNB'),
	(92, 'Guyana', 'GY', 'GUY'),
	(93, 'Haiti', 'HT', 'HTI'),
	(94, 'Heard and Mc Donald Islands', 'HM', 'HMD'),
	(95, 'Honduras', 'HN', 'HND'),
	(96, 'Hong Kong', 'HK', 'HKG'),
	(97, 'Hungary', 'HU', 'HUN'),
	(98, 'Iceland', 'IS', 'ISL'),
	(99, 'India', 'IN', 'IND'),
	(100, 'Indonesia', 'ID', 'IDN'),
	(101, 'Iran (Islamic Republic of)', 'IR', 'IRN'),
	(102, 'Iraq', 'IQ', 'IRQ'),
	(103, 'Ireland', 'IE', 'IRL'),
	(104, 'Israel', 'IL', 'ISR'),
	(105, 'Italy', 'IT', 'ITA'),
	(106, 'Jamaica', 'JM', 'JAM'),
	(107, 'Japan', 'JP', 'JPN'),
	(108, 'Jordan', 'JO', 'JOR'),
	(109, 'Kazakhstan', 'KZ', 'KAZ'),
	(110, 'Kenya', 'KE', 'KEN'),
	(111, 'Kiribati', 'KI', 'KIR'),
	(112, 'Korea, Democratic People\'s Republic of', 'KP', 'PRK'),
	(113, 'Korea, Republic of', 'KR', 'KOR'),
	(114, 'Kuwait', 'KW', 'KWT'),
	(115, 'Kyrgyzstan', 'KG', 'KGZ'),
	(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO'),
	(117, 'Latvia', 'LV', 'LVA'),
	(118, 'Lebanon', 'LB', 'LBN'),
	(119, 'Lesotho', 'LS', 'LSO'),
	(120, 'Liberia', 'LR', 'LBR'),
	(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY'),
	(122, 'Liechtenstein', 'LI', 'LIE'),
	(123, 'Lithuania', 'LT', 'LTU'),
	(124, 'Luxembourg', 'LU', 'LUX'),
	(125, 'Macao', 'MO', 'MAC'),
	(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD'),
	(127, 'Madagascar', 'MG', 'MDG'),
	(128, 'Malawi', 'MW', 'MWI'),
	(129, 'Malaysia', 'MY', 'MYS'),
	(130, 'Maldives', 'MV', 'MDV'),
	(131, 'Mali', 'ML', 'MLI'),
	(132, 'Malta', 'MT', 'MLT'),
	(133, 'Marshall Islands', 'MH', 'MHL'),
	(134, 'Martinique', 'MQ', 'MTQ'),
	(135, 'Mauritania', 'MR', 'MRT'),
	(136, 'Mauritius', 'MU', 'MUS'),
	(137, 'Mayotte', 'YT', 'MYT'),
	(138, 'Mexico', 'MX', 'MEX'),
	(139, 'Micronesia, Federated States of', 'FM', 'FSM'),
	(140, 'Moldova', 'MD', 'MDA'),
	(141, 'Monaco', 'MC', 'MCO'),
	(142, 'Mongolia', 'MN', 'MNG'),
	(143, 'Montserrat', 'MS', 'MSR'),
	(144, 'Morocco', 'MA', 'MAR'),
	(145, 'Mozambique', 'MZ', 'MOZ'),
	(146, 'Myanmar', 'MM', 'MMR'),
	(147, 'Namibia', 'NA', 'NAM'),
	(148, 'Nauru', 'NR', 'NRU'),
	(149, 'Nepal', 'NP', 'NPL'),
	(150, 'Netherlands', 'NL', 'NLD'),
	(151, 'Netherlands Antilles', 'AN', 'ANT'),
	(152, 'New Caledonia', 'NC', 'NCL'),
	(153, 'New Zealand', 'NZ', 'NZL'),
	(154, 'Nicaragua', 'NI', 'NIC'),
	(155, 'Niger', 'NE', 'NER'),
	(156, 'Nigeria', 'NG', 'NGA'),
	(157, 'Niue', 'NU', 'NIU'),
	(158, 'Norfolk Island', 'NF', 'NFK'),
	(159, 'Northern Mariana Islands', 'MP', 'MNP'),
	(160, 'Norway', 'NO', 'NOR'),
	(161, 'Oman', 'OM', 'OMN'),
	(162, 'Pakistan', 'PK', 'PAK'),
	(163, 'Palau', 'PW', 'PLW'),
	(164, 'Panama', 'PA', 'PAN'),
	(165, 'Papua New Guinea', 'PG', 'PNG'),
	(166, 'Paraguay', 'PY', 'PRY'),
	(167, 'Peru', 'PE', 'PER'),
	(168, 'Philippines', 'PH', 'PHL'),
	(169, 'Pitcairn', 'PN', 'PCN'),
	(170, 'Poland', 'PL', 'POL'),
	(171, 'Portugal', 'PT', 'PRT'),
	(172, 'Puerto Rico', 'PR', 'PRI'),
	(173, 'Qatar', 'QA', 'QAT'),
	(174, 'Reunion', 'RE', 'REU'),
	(175, 'Romania', 'RO', 'ROU'),
	(176, 'Russian Federation', 'RU', 'RUS'),
	(177, 'Rwanda', 'RW', 'RWA'),
	(178, 'Saint Kitts and Nevis', 'KN', 'KNA'),
	(179, 'Saint Lucia', 'LC', 'LCA'),
	(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT'),
	(181, 'Samoa', 'WS', 'WSM'),
	(182, 'San Marino', 'SM', 'SMR'),
	(183, 'Sao Tome and Principe', 'ST', 'STP'),
	(184, 'Saudi Arabia', 'SA', 'SAU'),
	(185, 'Senegal', 'SN', 'SEN'),
	(186, 'Seychelles', 'SC', 'SYC'),
	(187, 'Sierra Leone', 'SL', 'SLE'),
	(188, 'Singapore', 'SG', 'SGP'),
	(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK'),
	(190, 'Slovenia', 'SI', 'SVN'),
	(191, 'Solomon Islands', 'SB', 'SLB'),
	(192, 'Somalia', 'SO', 'SOM'),
	(193, 'South Africa', 'ZA', 'ZAF'),
	(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
	(195, 'Spain', 'ES', 'ESP'),
	(196, 'Sri Lanka', 'LK', 'LKA'),
	(197, 'St. Helena', 'SH', 'SHN'),
	(198, 'St. Pierre and Miquelon', 'PM', 'SPM'),
	(199, 'Sudan', 'SD', 'SDN'),
	(200, 'Suriname', 'SR', 'SUR'),
	(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM'),
	(202, 'Swaziland', 'SZ', 'SWZ'),
	(203, 'Sweden', 'SE', 'SWE'),
	(204, 'Switzerland', 'CH', 'CHE'),
	(205, 'Syrian Arab Republic', 'SY', 'SYR'),
	(206, 'Taiwan', 'TW', 'TWN'),
	(207, 'Tajikistan', 'TJ', 'TJK'),
	(208, 'Tanzania, United Republic of', 'TZ', 'TZA'),
	(209, 'Thailand', 'TH', 'THA'),
	(210, 'Togo', 'TG', 'TGO'),
	(211, 'Tokelau', 'TK', 'TKL'),
	(212, 'Tonga', 'TO', 'TON'),
	(213, 'Trinidad and Tobago', 'TT', 'TTO'),
	(214, 'Tunisia', 'TN', 'TUN'),
	(215, 'Turkey', 'TR', 'TUR'),
	(216, 'Turkmenistan', 'TM', 'TKM'),
	(217, 'Turks and Caicos Islands', 'TC', 'TCA'),
	(218, 'Tuvalu', 'TV', 'TUV'),
	(219, 'Uganda', 'UG', 'UGA'),
	(220, 'Ukraine', 'UA', 'UKR'),
	(221, 'United Arab Emirates', 'AE', 'ARE'),
	(222, 'United Kingdom', 'GB', 'GBR'),
	(223, 'United States', 'US', 'USA'),
	(224, 'United States Minor Outlying Islands', 'UM', 'UMI'),
	(225, 'Uruguay', 'UY', 'URY'),
	(226, 'Uzbekistan', 'UZ', 'UZB'),
	(227, 'Vanuatu', 'VU', 'VUT'),
	(228, 'Vatican City State (Holy See)', 'VA', 'VAT'),
	(229, 'Venezuela', 'VE', 'VEN'),
	(230, 'Viet Nam', 'VN', 'VNM'),
	(231, 'Virgin Islands (British)', 'VG', 'VGB'),
	(232, 'Virgin Islands (U.S.)', 'VI', 'VIR'),
	(233, 'Wallis and Futuna Islands', 'WF', 'WLF'),
	(234, 'Western Sahara', 'EH', 'ESH'),
	(235, 'Yemen', 'YE', 'YEM'),
	(236, 'Serbia', 'RS', 'SRB'),
	(238, 'Zambia', 'ZM', 'ZMB'),
	(239, 'Zimbabwe', 'ZW', 'ZWE'),
	(241, 'Palestinian Territory', 'PS', 'PSE'),
	(242, 'Montenegro', 'ME', 'MNE'),
	(243, 'Guernsey', 'GG', 'GGY'),
	(244, 'Isle of Man', 'IM', 'IMN'),
	(245, 'Jersey', 'JE', 'JEY');
/*!40000 ALTER TABLE `fit_f2lt_countries` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_dashboards
DROP TABLE IF EXISTS `fit_f2lt_dashboards`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_dashboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_dashboards: 13 rows
/*!40000 ALTER TABLE `fit_f2lt_dashboards` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_dashboards` (`id`, `name`, `url`, `image`, `order`, `status`) VALUES
	(9, 'Users', 'users', '1428675836_MESSENGER_-_MSN.png', 8, 1),
	(16, 'Settings', 'settings', 'settings.png', 11, 1),
	(3, 'Categories', 'categories', 'category.png', 3, 0),
	(17, 'Products', 'products', 'products.png', 5, 0),
	(18, 'Faq', 'faqs', 'faq.png', 8, 0),
	(19, 'FAQ Category', 'faq_categories', 'faq_category.png', 7, 0),
	(20, 'Job Links', 'JobLinks', 'size.png', 7, 1),
	(21, 'Main Category', 'main_categories', 'main_category.png', 2, 0),
	(22, 'Brands', 'brands', '1448169359_brand_icon.png', 4, 0),
	(23, 'Sliders', 'Sliders', 'sliders_icon.png', 10, 0),
	(24, 'Requirements', 'requirements', 'clipboard6-128.png', 5, 1),
	(25, 'Jobs', 'jobs', '1501637254_jobs.png', 6, 1),
	(26, 'Email Template', 'EmailTemplates', '1501171140_emai_templates.png', 10, 0);
/*!40000 ALTER TABLE `fit_f2lt_dashboards` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_email_templates
DROP TABLE IF EXISTS `fit_f2lt_email_templates`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(222) NOT NULL,
  `url` varchar(222) NOT NULL,
  `subject` varchar(222) NOT NULL,
  `message` text NOT NULL,
  `special_note` text NOT NULL,
  `image` varchar(222) NOT NULL,
  `immediately` varchar(222) NOT NULL,
  `delivered` varchar(222) NOT NULL,
  `day` varchar(222) NOT NULL,
  `asin` varchar(222) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_email_templates: 2 rows
/*!40000 ALTER TABLE `fit_f2lt_email_templates` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_email_templates` (`id`, `template_name`, `url`, `subject`, `message`, `special_note`, `image`, `immediately`, `delivered`, `day`, `asin`, `status`, `created`, `modified`) VALUES
	(6, 'First Email Template', '', 'Test email subject', '<p>This is test email, pls do not reply</p>\r\n\r\n<p>Hello [[first-name]],<br />\r\n<br />\r\nJust wanted to say thank you for your order <strong>.</strong>Your<strong>&nbsp;[[product-name]]</strong> just shipped from Amazon fulfillment center and it&rsquo;s on your way.Your order will arrive soon! If you notice any issues with [[product-name]], please<strong>&nbsp;[[contact-link:contact us]]</strong> so we can resolve the issue as fast as possible (you can reply to this message).<br />\r\n[[order-link:Your order can be viewed on Amazon.com here]].<br />\r\n&nbsp;</p>\r\n\r\n<div style="margin-left:120px"><strong><u>Here is Details of shipping info :</u></strong></div>\r\n\r\n<div style="margin-left:120px">Product: [[product-name]]</div>\r\n\r\n<div style="margin-left:120px">Order Id: [[order-id]]</div>\r\n\r\n<div style="margin-left:120px">Purchase Date: [[purchase-date]]</div>\r\n\r\n<div style="margin-left:120px">Estimated Arrival Date: [[estimated-arrival]] &nbsp;</div>\r\n\r\n<p><br />\r\n<br />\r\n<br />\r\nNext week I will be sharing some Important info about <strong>[[product-name]]</strong><br />\r\n<br />\r\n<u>If you have any questions or issues, please do not hesitate to contact us.</u><strong><u>&nbsp;</u></strong><strong>[[contact-link:let us know]]</strong><br />\r\n<br />\r\n<br />\r\n<br />\r\nIf you do not receive your [[product-name]] within 7 days, please contact Amazon support. We will gladly help you. <a href="http://www.amazon.com/gp/help/customer/display.html?nodeId=518316">http://www.amazon.com/gp/help/customer/display.html?nodeId=518316</a><br />\r\n<br />\r\n<br />\r\nThank You<br />\r\nHave a great day!<br />\r\nBest regards<br />\r\n<strong>Ebax</strong> Customer Support Team</p>\r\n\r\n<div><br />\r\n<strong>[[store-link:See Now Our All Product]]</strong></div>\r\n', '', '', '2', 'Shipped', '', 'B01NBOUNHD,B01N7CR3GM', 1, '2017-10-14 22:15:11', '2018-03-03 22:08:58'),
	(7, 'Second Message Title goes here', '', 'Second message subject goes here', '<p>Message desc</p>\r\n', '', '', '1', 'Shipped', '', 'B01NBOUNHD,B01N7CR3GM', 1, '2018-03-10 11:46:40', '2018-03-10 11:46:40');
/*!40000 ALTER TABLE `fit_f2lt_email_templates` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_faqs
DROP TABLE IF EXISTS `fit_f2lt_faqs`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `answer` text,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_faqs: 6 rows
/*!40000 ALTER TABLE `fit_f2lt_faqs` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_faqs` (`id`, `faq_category_id`, `question`, `slug`, `answer`, `status`) VALUES
	(82, 10, 'Is it possible to give an add in startproject?', 'is-it-possible-to-give-an-add-in-startproject', 'No, it is not possible yet to give add post in startproject, but this feature will be added soon', 1),
	(83, 1, 'What is startproject payment policy?', 'what-is-startproject-payment-policy', 'startproject payment is very easy. You can pay using any Back Cart like (VISA, MASTER,American Express) and other. startproject payment is very easy. You can pay using any Back Cart like (VISA, MASTER,American Express) and other.', 1),
	(84, 9, 'What is startproject refund policy?', 'what-is-startproject-refund-policy', 'startproject refund policy is very easy. startproject will refund your cash within 7 days for any valid case.startproject refund policy is very easy. startproject will refund your cash within 7 days for any valid case.startproject refund policy is very easy. startproject will refund your cash within 7 days for any valid case.', 1),
	(85, 1, 'How can i make payment online?', 'how-can-i-make-payment-online', 'You can make payment thought startproject payment method in directly. You can make payment thought startproject payment method in directly. You can make payment thought startproject payment method in directly. You can make payment thought startproject payment method in directly. ', 1),
	(86, 9, 'Is it possible to get refund after buy a product from startproject', 'is-it-possible-to-get-refund-after-buy-a-product-from-startproject', 'Yes possible.', 1),
	(88, 2, 'How to pament method', 'how-to-pament-method', 'what is answer', 1);
/*!40000 ALTER TABLE `fit_f2lt_faqs` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_faq_categories
DROP TABLE IF EXISTS `fit_f2lt_faq_categories`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_faq_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `slug` varchar(222) NOT NULL,
  `note` text NOT NULL,
  `order` tinyint(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_faq_categories: 5 rows
/*!40000 ALTER TABLE `fit_f2lt_faq_categories` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_faq_categories` (`id`, `name`, `type`, `slug`, `note`, `order`, `status`) VALUES
	(1, 'Payment  Policy', 'Payment', 'payment-policy', '', 2, 1),
	(2, 'Account', 'General', 'account', '', 1, 1),
	(9, 'Refund Policy', 'Payment', 'refund-policy', '', 3, 1),
	(10, 'Add Posting', 'General', 'add-posting', '', 1, 1),
	(15, 'dfgsdg', 'General', '', '', 0, 1);
/*!40000 ALTER TABLE `fit_f2lt_faq_categories` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_jobs
DROP TABLE IF EXISTS `fit_f2lt_jobs`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_status` int(1) NOT NULL DEFAULT '0',
  `links` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_jobs: 2 rows
/*!40000 ALTER TABLE `fit_f2lt_jobs` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_jobs` (`id`, `name`, `job_description`, `job_status`, `links`, `status`, `created`, `updated`) VALUES
	(1, 'First Job', 'desc', 1, '', 1, '2017-09-08 12:51:32', '2017-09-08 13:04:28'),
	(2, 'Second Job', 'desc', 0, '', 1, '2017-09-08 14:17:57', '2017-09-08 14:17:57');
/*!40000 ALTER TABLE `fit_f2lt_jobs` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_job_links
DROP TABLE IF EXISTS `fit_f2lt_job_links`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_job_links` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `worker_job_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `links` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_job_links: ~3 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_job_links` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_job_links` (`id`, `worker_job_id`, `user_id`, `links`, `status`, `created`, `updated`) VALUES
	(1, 3, 152, 'Link1\r\nLink2\r\nLink3', 0, '2017-09-08', '2017-09-08'),
	(2, 3, 152, 'Link1\r\nLink2', 0, '2017-09-08', '2017-09-08'),
	(3, 4, 133, 'Link1\r\nLink2\r\nLink3\r\nLink4', 0, '2017-09-08', '2017-09-08');
/*!40000 ALTER TABLE `fit_f2lt_job_links` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_main_categories
DROP TABLE IF EXISTS `fit_f2lt_main_categories`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_main_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(222) NOT NULL,
  `order` tinyint(2) DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_main_categories: 6 rows
/*!40000 ALTER TABLE `fit_f2lt_main_categories` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_main_categories` (`id`, `name`, `slug`, `order`, `status`, `created`, `updated`) VALUES
	(1, 'Garments', 'garments', 2, 1, '0000-00-00 00:00:00', '2015-11-27 04:33:34'),
	(2, 'Electronics', 'electronics', 2, 1, '0000-00-00 00:00:00', '2015-10-30 16:59:19'),
	(9, 'Books', 'books', 4, 1, '0000-00-00 00:00:00', '2015-10-30 17:00:42'),
	(10, 'Cosmetics', 'cosmetics', 3, 1, '0000-00-00 00:00:00', '2015-10-30 17:00:03'),
	(13, 'Accessories', 'accessories', 5, 1, '2015-11-02 15:19:53', '2015-11-02 15:19:53'),
	(14, 'Others', 'others', 6, 1, '2015-11-02 15:20:11', '2015-11-02 15:20:11');
/*!40000 ALTER TABLE `fit_f2lt_main_categories` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_orders
DROP TABLE IF EXISTS `fit_f2lt_orders`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order` text,
  `order_id` varchar(50) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_orders: ~8 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_orders` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_orders` (`id`, `order`, `order_id`, `created`, `updated`) VALUES
	(5, '{"order":{"LatestShipDate":"2018-03-02T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-01T16:09:56Z","AmazonOrderId":"111-3137791-7297060","BuyerEmail":"7d8cybf36vg90b9@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-02T21:35:29Z","NumberOfItemsShipped":"1","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Yogini Panchal","OrderTotal":{"CurrencyCode":"USD","Amount":"5.99"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-02T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"JACKSONVILLE","PostalCode":"32256-3466","StateOrRegion":"FL","CountryCode":"US","Name":"Yogini Panchal","AddressLine1":"10059 AMHERST HILLS CT"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"111-3137791-7297060"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"18923280153522","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '111-3137791-7297060', '2018-03-10', '2018-03-10'),
	(6, '{"order":{"LatestShipDate":"2018-03-06T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-05T03:35:55Z","AmazonOrderId":"112-5293209-6932239","BuyerEmail":"5t86gx5kzqgw8ch@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-05T19:53:49Z","NumberOfItemsShipped":"1","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Dale Davis","OrderTotal":{"CurrencyCode":"USD","Amount":"5.99"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-06T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"NAPPANEE","PostalCode":"46550-1418","StateOrRegion":"IN","CountryCode":"US","Name":"Dale Davis","AddressLine1":"300 N HARTMAN ST"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"112-5293209-6932239"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"05245712114914","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '112-5293209-6932239', '2018-03-10', '2018-03-10'),
	(7, '{"order":{"LatestShipDate":"2018-03-07T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-05T19:04:53Z","AmazonOrderId":"113-1822737-1696260","BuyerEmail":"hph1xcgfq84zrkg@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-06T17:40:07Z","NumberOfItemsShipped":"2","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Tiffany Robert","OrderTotal":{"CurrencyCode":"USD","Amount":"11.98"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-07T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"MARRERO","PostalCode":"70072-6524","StateOrRegion":"LA","CountryCode":"US","Name":"tiffany robert","AddressLine1":"2756 ISABELLE DR"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"113-1822737-1696260"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"02173375963170","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}},{"QuantityOrdered":"1","Title":"iPhone 7 Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (Brown)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01MZZT8EI","SellerSKU":"FP-NR24-9YP2","OrderItemId":"36632805025242","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '113-1822737-1696260', '2018-03-10', '2018-03-10'),
	(8, '{"order":{"LatestShipDate":"2018-03-08T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-07T05:04:28Z","AmazonOrderId":"113-9814142-5193004","BuyerEmail":"bb20lbdbfxqdpmz@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-08T07:26:54Z","NumberOfItemsShipped":"1","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Stephen F. Hall","OrderTotal":{"CurrencyCode":"USD","Amount":"5.99"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-08T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"PLAINFIELD","PostalCode":"60544-9137","StateOrRegion":"ILLINOIS","CountryCode":"US","Name":"Stephen F. Hall","AddressLine1":"8380 OLD RIDGE RD"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"113-9814142-5193004"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"35357173555434","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '113-9814142-5193004', '2018-03-10', '2018-03-10'),
	(9, '{"order":{"LatestShipDate":"2018-03-02T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-01T16:09:56Z","AmazonOrderId":"111-3137791-7297060","BuyerEmail":"7d8cybf36vg90b9@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-02T21:35:29Z","NumberOfItemsShipped":"1","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Yogini Panchal","OrderTotal":{"CurrencyCode":"USD","Amount":"5.99"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-02T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"JACKSONVILLE","PostalCode":"32256-3466","StateOrRegion":"FL","CountryCode":"US","Name":"Yogini Panchal","AddressLine1":"10059 AMHERST HILLS CT"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"111-3137791-7297060"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"18923280153522","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '111-3137791-7297060', '2018-03-10', '2018-03-10'),
	(10, '{"order":{"LatestShipDate":"2018-03-06T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-05T03:35:55Z","AmazonOrderId":"112-5293209-6932239","BuyerEmail":"5t86gx5kzqgw8ch@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-05T19:53:49Z","NumberOfItemsShipped":"1","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Dale Davis","OrderTotal":{"CurrencyCode":"USD","Amount":"5.99"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-06T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"NAPPANEE","PostalCode":"46550-1418","StateOrRegion":"IN","CountryCode":"US","Name":"Dale Davis","AddressLine1":"300 N HARTMAN ST"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"112-5293209-6932239"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"05245712114914","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '112-5293209-6932239', '2018-03-10', '2018-03-10'),
	(11, '{"order":{"LatestShipDate":"2018-03-07T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-05T19:04:53Z","AmazonOrderId":"113-1822737-1696260","BuyerEmail":"hph1xcgfq84zrkg@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-06T17:40:07Z","NumberOfItemsShipped":"2","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Tiffany Robert","OrderTotal":{"CurrencyCode":"USD","Amount":"11.98"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-07T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"MARRERO","PostalCode":"70072-6524","StateOrRegion":"LA","CountryCode":"US","Name":"tiffany robert","AddressLine1":"2756 ISABELLE DR"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"113-1822737-1696260"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"02173375963170","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}},{"QuantityOrdered":"1","Title":"iPhone 7 Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (Brown)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01MZZT8EI","SellerSKU":"FP-NR24-9YP2","OrderItemId":"36632805025242","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '113-1822737-1696260', '2018-03-10', '2018-03-10'),
	(12, '{"order":{"LatestShipDate":"2018-03-08T07:59:59Z","OrderType":"StandardOrder","PurchaseDate":"2018-03-07T05:04:28Z","AmazonOrderId":"113-9814142-5193004","BuyerEmail":"bb20lbdbfxqdpmz@marketplace.amazon.com","IsReplacementOrder":"false","LastUpdateDate":"2018-03-08T07:26:54Z","NumberOfItemsShipped":"1","ShipServiceLevel":"SecondDay","OrderStatus":"Shipped","SalesChannel":"Amazon.com","IsBusinessOrder":"false","NumberOfItemsUnshipped":"0","PaymentMethodDetails":{"PaymentMethodDetail":"Standard"},"BuyerName":"Stephen F. Hall","OrderTotal":{"CurrencyCode":"USD","Amount":"5.99"},"IsPremiumOrder":"false","EarliestShipDate":"2018-03-08T07:59:59Z","MarketplaceId":"ATVPDKIKX0DER","FulfillmentChannel":"AFN","PaymentMethod":"Other","ShippingAddress":{"City":"PLAINFIELD","PostalCode":"60544-9137","StateOrRegion":"ILLINOIS","CountryCode":"US","Name":"Stephen F. Hall","AddressLine1":"8380 OLD RIDGE RD"},"IsPrime":"false","ShipmentServiceLevelCategory":"SecondDay","SellerOrderId":"113-9814142-5193004"},"items":[{"QuantityOrdered":"1","Title":"iPhone 6\\/6s Wallet Case - Card Holder With Smart protection & Lock System Magnet Flip Cover Case (black)","PromotionDiscount":{"CurrencyCode":"USD","Amount":"0.00"},"IsGift":"false","ASIN":"B01N7CR3GM","SellerSKU":"KL-PIQQ-ZTG9","OrderItemId":"35357173555434","ProductInfo":{"NumberOfItems":"1"},"QuantityShipped":"1","ItemPrice":{"CurrencyCode":"USD","Amount":"5.99"},"ItemTax":{"CurrencyCode":"USD","Amount":"0.00"}}]}', '113-9814142-5193004', '2018-03-10', '2018-03-10');
/*!40000 ALTER TABLE `fit_f2lt_orders` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_payments
DROP TABLE IF EXISTS `fit_f2lt_payments`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `payment_method_name` varchar(100) DEFAULT NULL,
  `payment_method_code` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `vendor_email` varchar(100) DEFAULT NULL,
  `vendor_name` varchar(50) DEFAULT NULL,
  `vendor_password` varchar(50) DEFAULT NULL,
  `transaction_mode` varchar(50) DEFAULT NULL,
  `test_url` varchar(255) DEFAULT NULL,
  `production_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_payments: 3 rows
/*!40000 ALTER TABLE `fit_f2lt_payments` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_payments` (`id`, `title`, `payment_method_name`, `payment_method_code`, `status`, `vendor_email`, `vendor_name`, `vendor_password`, `transaction_mode`, `test_url`, `production_url`) VALUES
	(1, 'Credit Card', 'Direct One', 'direct_one', 1, '', '', '', '0', '', ''),
	(2, 'Coin', 'iXenCenter', 'coin', 1, 'admin@ixencenter.com', '', '', '1', '', ''),
	(3, 'Cash', 'Cash', 'cash', 1, NULL, NULL, NULL, '1', NULL, NULL);
/*!40000 ALTER TABLE `fit_f2lt_payments` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_photos
DROP TABLE IF EXISTS `fit_f2lt_photos`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(222) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_photos: ~17 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_photos` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_photos` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
	(1, 20, '1443846080_404.png', '2015-10-02 21:21:20', '2015-10-02 21:21:20'),
	(23, 20, 'gallery2.jpg', '2015-10-03 00:45:36', '2015-10-03 00:45:36'),
	(24, 21, 'create-your-own-website.gif', '2015-10-31 11:19:57', '2015-10-31 11:19:57'),
	(26, 23, '1446607404_girl1.jpg', '2015-11-04 03:23:24', '2015-11-04 03:23:24'),
	(27, 23, 'gallery3.jpg', '2015-11-04 03:23:33', '2015-11-04 03:23:33'),
	(29, 24, '1446705651_gallery1.jpg', '2015-11-05 06:40:51', '2015-11-05 06:40:51'),
	(30, 25, '1446709842_girl3.jpg', '2015-11-05 07:50:42', '2015-11-05 07:50:42'),
	(31, 26, '1446710003_girl3.jpg', '2015-11-05 07:53:23', '2015-11-05 07:53:23'),
	(32, 27, 'recommend1.jpg', '2015-11-05 08:02:26', '2015-11-05 08:02:26'),
	(33, 37, '1448096941_shirt3.jpg', '2015-11-21 09:09:01', '2015-11-21 09:09:01'),
	(34, 37, '1448096946_shirt4.jpg', '2015-11-21 09:09:06', '2015-11-21 09:09:06'),
	(35, 37, '1448096951_shirt5.jpg', '2015-11-21 09:09:11', '2015-11-21 09:09:11'),
	(36, 39, '1448097173_shirt1.jpg', '2015-11-21 09:12:53', '2015-11-21 09:12:53'),
	(37, 39, '1448097181_shirt4.jpg', '2015-11-21 09:13:01', '2015-11-21 09:13:01'),
	(38, 45, '1448623816_1448092761_shirt5.jpg', '2015-11-27 11:30:16', '2015-11-27 11:30:16'),
	(39, 45, '1448624020_1448096931_shirt2.jpg', '2015-11-27 11:33:40', '2015-11-27 11:33:40'),
	(40, 50, 'singal_flaower.gif', '2015-11-30 06:06:43', '2015-11-30 06:06:43');
/*!40000 ALTER TABLE `fit_f2lt_photos` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_products
DROP TABLE IF EXISTS `fit_f2lt_products`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `availability` varchar(222) NOT NULL,
  `condition` varchar(222) NOT NULL,
  `slug` varchar(222) NOT NULL DEFAULT '0',
  `name` varchar(222) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cover_photo` varchar(222) NOT NULL DEFAULT '0',
  `product_size_photo` varchar(222) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_products: ~21 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_products` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_products` (`id`, `category_id`, `brand_id`, `availability`, `condition`, `slug`, `name`, `price`, `cover_photo`, `product_size_photo`, `description`, `status`, `created`, `modified`) VALUES
	(9, 2, 0, 'in stock', 'new', 'nice-three-pice', 'Nice three pice', 334.00, 'MA-P-546-130x130.jpg', 'WA-SK-006-250x250.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '0000-00-00 00:00:00', '2015-12-30 13:06:05'),
	(10, 2, 0, 'in stock', 'new', 'three-pice', 'Three pice', 343.00, 'MA-P-422-300x300.jpg', '0', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '2015-06-26 06:09:07', '2015-12-30 13:05:39'),
	(11, 25, 0, 'in stock', 'new', 'three-pice1', 'three pice1', 566.00, 'MA-J-018a-250x250.jpg', '0', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '2015-06-26 06:12:02', '2015-12-30 13:16:48'),
	(12, 1, 0, 'in stock', 'new', 'very-nice-three-pice', 'Very nice three pice', 334.00, 'WA-LF-043-130x130.jpg', 'WA-LF-044-250x250.jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '2015-06-26 06:13:05', '2015-12-30 13:02:16'),
	(13, 1, 0, '', '', 'very-nice-three-pice-one', 'Very nice three pice one', 334.00, 'gallery4.jpg', '0', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '2015-06-26 06:13:05', '2015-06-26 06:13:05'),
	(14, 1, 0, 'in stock', 'new', 'very-nice-three-pice-two', 'Very nice three pice two', 334.00, 'WA-SK-004-270x270.jpg', '0', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '2015-06-26 06:13:05', '2015-12-30 13:36:13'),
	(15, 25, 7, 'not in stock', 'old', 'very-nice-three-pice-three', 'Very nice three pice three', 334.00, 'MA-J-022-250x250.jpg', '0', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature', 1, '2015-06-26 06:13:05', '2015-12-30 13:18:35'),
	(18, 18, 0, 'in stock', 'new', 'nyc-bb-cream', 'NYC bb cream', 850.00, '__1__10_.JPG', '0', 'N.Y.C. New York Color BB Creme Instant Matte:\r\n\r\nEfficiency of a BB cream with a mattifying effect\r\nProvides instant mattifying coverage\r\nBeautifies, softens and smooths skin\r\nMinimizes the appearance of pores, lines and skin imperfections\r\nBrightens skin tone for a perfect flawless finish\r\nDermatologist tested', 1, '2015-07-02 19:41:14', '2015-12-30 13:09:41'),
	(19, 18, 0, 'in stock', 'new', 'l-or-al-true-match-foundation', 'L\'Oréal True Match Foundation', 1500.00, 'lorealtruematchfoundation1.jpg', '0', '', 1, '2015-07-02 19:52:18', '2015-12-30 13:09:20'),
	(20, 18, 0, 'in stock', 'new', 'loreal-shampoo', 'loreal shampoo', 650.00, 'image-393da55bdf809de0906b3edd6809dc65c38abc537a8c52eb868b5033e575d482-V.jpg', '0', '', 1, '2015-07-02 19:54:58', '2015-12-30 13:08:45'),
	(21, 0, 0, 'in stock', 'new', 'asdf', 'asdf', 34.00, 'WA-SK-013-270x270.jpg', '0', 'asdf', 1, '2015-10-03 00:46:05', '2015-12-30 13:34:23'),
	(23, 1, 0, 'in stock', 'new', 'three-pics', 'three pics', 1200.00, 'product6.jpg', '1448709221_product7.jpg', 'vary nice three pis', 1, '2015-11-04 03:22:09', '2015-11-28 11:13:41'),
	(24, 2, 0, '', '', 't-shart', 'T-shart', 500.00, '1446705638_gallery2.jpg', '0', 'rthjhgfdggfh', 1, '2015-11-05 06:40:38', '0000-00-00 00:00:00'),
	(25, 1, 0, 'in stock', 'new', 'thee-pice', 'Thee pice', 2400.00, 'product4.jpg', '1448709030_product7.jpg', 'Nice three pice', 1, '2015-11-05 07:50:28', '2015-11-28 11:10:30'),
	(26, 1, 0, 'in stock', 'new', 'thee-pics', 'Thee pics', 1200.00, 'product7.jpg', '1448708989_product6.jpg', 'nice three pics ', 1, '2015-11-05 07:53:11', '2015-11-28 11:09:49'),
	(44, 2, 6, 'in stock', 'old', 't-shirtm', 't-shirtm', 250.00, 'tshirt5.jpg', 'size4.jpg', 'Good', 1, '2015-11-24 08:54:14', '2015-11-28 11:08:50'),
	(45, 2, 7, 'in stock', 'new', 'shirt', 'Shirt', 500.00, '1448355569_shirt1.jpg', 'size7.jpg', 'Good shirt', 1, '2015-11-24 08:59:29', '2015-11-28 11:08:19'),
	(46, 2, 5, 'not in stock', 'old', 'smert-shirt', 'Smert shirt', 800.00, '1448355716_shirt2.jpg', 'size5.jpg', 'Good shirt', 1, '2015-11-24 09:01:56', '2015-11-28 11:07:49'),
	(47, 2, 5, 'not in stock', 'new', 't-shirt', 'T-shirt', 350.00, 'tshirt6.jpg', 'size3.jpg', 'Good t-shirt', 1, '2015-11-24 09:03:19', '2015-11-28 11:07:26'),
	(49, 25, 5, 'not in stock', 'old', 'shirt-two', 'Shirt two', 350.00, 'MA-J-013a-250x250.jpg', 'MA-J-017a-250x250.jpg', 'This shirt prices', 1, '2015-11-28 04:25:30', '2015-12-30 13:16:24'),
	(51, 25, 8, 'in stock', 'old', 'shart', 'shart', 565.00, 'MA-J-011a-250x250.jpg', 'MA-J-015a-250x250.jpg', 'fhgdfsg', 1, '2015-12-15 12:22:43', '2015-12-30 13:16:12');
/*!40000 ALTER TABLE `fit_f2lt_products` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_product_brands
DROP TABLE IF EXISTS `fit_f2lt_product_brands`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_product_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(222) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_product_brands: 0 rows
/*!40000 ALTER TABLE `fit_f2lt_product_brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `fit_f2lt_product_brands` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_product_keywords
DROP TABLE IF EXISTS `fit_f2lt_product_keywords`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_product_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_rank_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_product_keywords: 12 rows
/*!40000 ALTER TABLE `fit_f2lt_product_keywords` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_product_keywords` (`id`, `product_rank_id`, `keyword`, `created`, `modified`) VALUES
	(14, 7, 'Black Tablet ', '2017-05-04 16:26:31', '2017-05-04 16:26:31'),
	(13, 7, 'Mobile', '2017-05-04 16:23:44', '2017-05-04 16:23:44'),
	(4, 6, 'Mobile', '2017-05-02 22:39:56', '2017-05-02 22:39:56'),
	(5, 6, 'I Phone', '2017-05-02 22:40:15', '2017-05-02 22:40:15'),
	(16, 2, 'Life history', '2017-05-04 16:33:37', '2017-05-04 16:33:37'),
	(7, 5, 'Baby', '2017-05-02 22:40:42', '2017-05-02 22:40:42'),
	(8, 5, 'Child', '2017-05-02 22:40:58', '2017-05-02 22:40:58'),
	(18, 7, 'Tablet', '2017-05-06 10:34:24', '2017-05-06 10:34:24'),
	(10, 3, 'Book', '2017-05-02 22:42:33', '2017-05-02 22:42:33'),
	(11, 2, 'Good book', '2017-05-02 22:42:50', '2017-05-02 22:42:50'),
	(12, 1, 'Books', '2017-05-02 22:43:21', '2017-05-02 22:43:21'),
	(15, 7, 'Appeal Tablet', '2017-05-04 16:29:57', '2017-05-04 16:29:57');
/*!40000 ALTER TABLE `fit_f2lt_product_keywords` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_product_ranks
DROP TABLE IF EXISTS `fit_f2lt_product_ranks`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_product_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `asin` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `product` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_product_ranks: 5 rows
/*!40000 ALTER TABLE `fit_f2lt_product_ranks` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_product_ranks` (`id`, `user_id`, `asin`, `title`, `product`) VALUES
	(2, 152, 'B01N5I5EV7', 'The Missing Ones: An absolutely gripping thriller with a jaw-dropping twist (Detective Lottie Parker Book 1)', '{"ASIN":"B01N5I5EV7","DetailPageURL":"https:\\/\\/www.amazon.co.uk\\/Missing-Ones-absolutely-jaw-dropping-Detective-ebook\\/dp\\/B01N5I5EV7?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B01N5I5EV7","ItemLinks":{"ItemLink":[{"Description":"Add To Wishlist","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/registry\\/wishlist\\/add-item.html?asin.0=B01N5I5EV7&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B01N5I5EV7"},{"Description":"Tell A Friend","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/pdp\\/taf\\/B01N5I5EV7?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B01N5I5EV7"},{"Description":"All Customer Reviews","URL":"https:\\/\\/www.amazon.co.uk\\/review\\/product\\/B01N5I5EV7?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B01N5I5EV7"},{"Description":"All Offers","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B01N5I5EV7?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B01N5I5EV7"}]},"SalesRank":"7","SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL75_.jpg","Height":"75","Width":"49"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL160_.jpg","Height":"160","Width":"105"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL.jpg","Height":"500","Width":"327"},"ImageSets":{"ImageSet":{"@attributes":{"Category":"primary"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL30_.jpg","Height":"30","Width":"20"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL75_.jpg","Height":"75","Width":"49"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL75_.jpg","Height":"75","Width":"49"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL110_.jpg","Height":"110","Width":"72"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL._SL160_.jpg","Height":"160","Width":"105"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51UEDMjr1sL.jpg","Height":"500","Width":"327"}}},"ItemAttributes":{"Author":"Patricia Gibney","Binding":"Kindle Edition","EISBN":"9781786811509","Format":"Kindle eBook","IsAdultProduct":"0","Label":"Bookouture","Languages":{"Language":{"Name":"English","Type":"Published"}},"ListPrice":{"Amount":"99","CurrencyCode":"GBP","FormattedPrice":"\\u00a30.99"},"Manufacturer":"Bookouture","NumberOfPages":"424","ProductGroup":"eBooks","ProductTypeName":"ABIS_EBOOKS","PublicationDate":"2017-03-16","Publisher":"Bookouture","ReleaseDate":"2017-03-16","Studio":"Bookouture","Title":"The Missing Ones: An absolutely gripping thriller with a jaw-dropping twist (Detective Lottie Parker Book 1)"},"CustomerReviews":{"IFrameURL":"https:\\/\\/www.amazon.co.uk\\/reviews\\/iframe?akid=AKIAJQ5H73N4HMGFKJSA&alinkCode=xm2&asin=B01N5I5EV7&atag=fictionsoft-21&exp=2017-05-03T15%3A31%3A18Z&v=2&sig=ilgMB724SJ9hoTeFTMWon1FV37pQB6ldPrh46Ht7b4M%253D","HasReviews":"true"}}'),
	(3, 152, 'B018VMRHTU', 'Night School: (Jack Reacher 21)', '{"ASIN":"B018VMRHTU","DetailPageURL":"https:\\/\\/www.amazon.co.uk\\/Night-School-Jack-Reacher-21-ebook\\/dp\\/B018VMRHTU?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B018VMRHTU","ItemLinks":{"ItemLink":[{"Description":"Add To Wishlist","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/registry\\/wishlist\\/add-item.html?asin.0=B018VMRHTU&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B018VMRHTU"},{"Description":"Tell A Friend","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/pdp\\/taf\\/B018VMRHTU?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B018VMRHTU"},{"Description":"All Customer Reviews","URL":"https:\\/\\/www.amazon.co.uk\\/review\\/product\\/B018VMRHTU?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B018VMRHTU"},{"Description":"All Offers","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B018VMRHTU?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B018VMRHTU"}]},"SalesRank":"38","SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL75_.jpg","Height":"75","Width":"49"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL160_.jpg","Height":"160","Width":"104"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL.jpg","Height":"500","Width":"325"},"ImageSets":{"ImageSet":{"@attributes":{"Category":"primary"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL30_.jpg","Height":"30","Width":"20"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL75_.jpg","Height":"75","Width":"49"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL75_.jpg","Height":"75","Width":"49"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL110_.jpg","Height":"110","Width":"72"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL._SL160_.jpg","Height":"160","Width":"104"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NpIrkAXWL.jpg","Height":"500","Width":"325"}}},"ItemAttributes":{"Author":"Lee Child","Binding":"Kindle Edition","EISBN":"9781473508798","Format":"Kindle eBook","Label":"Transworld Digital","Languages":{"Language":{"Name":"English","Type":"Published"}},"ListPrice":{"Amount":"499","CurrencyCode":"GBP","FormattedPrice":"\\u00a34.99"},"Manufacturer":"Transworld Digital","NumberOfPages":"498","ProductGroup":"eBooks","ProductTypeName":"ABIS_EBOOKS","PublicationDate":"2016-11-07","Publisher":"Transworld Digital","ReleaseDate":"2016-11-07","Studio":"Transworld Digital","Title":"Night School: (Jack Reacher 21)"},"CustomerReviews":{"IFrameURL":"https:\\/\\/www.amazon.co.uk\\/reviews\\/iframe?akid=AKIAJQ5H73N4HMGFKJSA&alinkCode=xm2&asin=B018VMRHTU&atag=fictionsoft-21&exp=2017-05-03T15%3A31%3A49Z&v=2&sig=XE5wODTY79W366Np%252FtmQpCLoYYJ0i0YeNfpBvb7Beb4%253D","HasReviews":"true"}}'),
	(4, 152, 'B00ZUTQK46', 'Pampers Baby-Dry Pants - Size 5, Pack of 84', '{"ASIN":"B00ZUTQK46","ParentASIN":"B01433Z6KI","DetailPageURL":"https:\\/\\/www.amazon.co.uk\\/Pampers-Baby-Dry-Pants-Size-Pack\\/dp\\/B00ZUTQK46?psc=1&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00ZUTQK46","ItemLinks":{"ItemLink":[{"Description":"Add To Wishlist","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/registry\\/wishlist\\/add-item.html?asin.0=B00ZUTQK46&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00ZUTQK46"},{"Description":"Tell A Friend","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/pdp\\/taf\\/B00ZUTQK46?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00ZUTQK46"},{"Description":"All Customer Reviews","URL":"https:\\/\\/www.amazon.co.uk\\/review\\/product\\/B00ZUTQK46?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00ZUTQK46"},{"Description":"All Offers","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B00ZUTQK46?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00ZUTQK46"}]},"SalesRank":"9","SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL75_.jpg","Height":"75","Width":"75"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL.jpg","Height":"500","Width":"500"},"ImageSets":{"ImageSet":[{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PAAzNmcKL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PAAzNmcKL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PAAzNmcKL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PAAzNmcKL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PAAzNmcKL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PAAzNmcKL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DwlxNvE0L._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DwlxNvE0L._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DwlxNvE0L._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DwlxNvE0L._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DwlxNvE0L._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DwlxNvE0L.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51Yy87oh6EL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51Yy87oh6EL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51Yy87oh6EL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51Yy87oh6EL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51Yy87oh6EL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51Yy87oh6EL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51rQYk6KsDL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51rQYk6KsDL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51rQYk6KsDL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51rQYk6KsDL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51rQYk6KsDL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51rQYk6KsDL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51SluqUbfVL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51SluqUbfVL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51SluqUbfVL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51SluqUbfVL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51SluqUbfVL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51SluqUbfVL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51p5B3H0RbL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51p5B3H0RbL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51p5B3H0RbL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51p5B3H0RbL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51p5B3H0RbL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51p5B3H0RbL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PF3DoVxyL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PF3DoVxyL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PF3DoVxyL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PF3DoVxyL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PF3DoVxyL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51PF3DoVxyL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"primary"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51214OhCkKL.jpg","Height":"500","Width":"500"}}]},"ItemAttributes":{"Binding":"Misc.","Brand":"Pampers","Department":"unisex-baby","EAN":"4015400745570","EANList":{"EANListElement":["4015400745570","8001090311702"]},"Feature":["Up to 12 hours of dryness, in easy to change pants","The micro pearls absorb liquids up to 30 times their weight","Extra sleep-layer, quickly absorb liquids and locks them away from your baby\'s skin","Extra breathable, micropores enable vapour to travel from inside to outside of the diaper to help your baby stay dry","Stretchy waistband and leg cuffs adapt to baby shapes and movements for a proper fit in all positions"],"IsAdultProduct":"0","ItemDimensions":{"Height":"961","Length":"1201","Weight":"3.33","Width":"1803"},"Label":"Procter & Gamble","ListPrice":{"Amount":"1650","CurrencyCode":"GBP","FormattedPrice":"\\u00a316.50"},"Manufacturer":"Procter & Gamble","Model":"81551402","MPN":"81551402","PackageDimensions":{"Height":"953","Length":"1535","Weight":"657","Width":"1134"},"PackageQuantity":"1","PartNumber":"81551402","ProductGroup":"Health and Beauty","ProductTypeName":"HEALTH_PERSONAL_CARE","Publisher":"Procter & Gamble","Size":"Size 5","Studio":"Procter & Gamble","Title":"Pampers Baby-Dry Pants - Size 5, Pack of 84"},"OfferSummary":{"LowestNewPrice":{"Amount":"933","CurrencyCode":"GBP","FormattedPrice":"\\u00a39.33"},"TotalNew":"9","TotalUsed":"0","TotalCollectible":"0","TotalRefurbished":"0"},"Offers":{"TotalOffers":"1","TotalOfferPages":"1","MoreOffersUrl":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B00ZUTQK46?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00ZUTQK46","Offer":{"OfferAttributes":{"Condition":"New"},"OfferListing":{"OfferListingId":"qZOPKnpHiSqCsn%2BnhhgCE8B0lZCVorkiex44uSAnt6J949Mdz3VA2Xvn72%2FkfY9wwDE7HyeHMavEQatbTy1yhqaSGZ3eqxWf","Price":{"Amount":"933","CurrencyCode":"GBP","FormattedPrice":"\\u00a39.33"},"AmountSaved":{"Amount":"717","CurrencyCode":"GBP","FormattedPrice":"\\u00a37.17"},"PercentageSaved":"43","Availability":"Usually dispatched within 24 hours","AvailabilityAttributes":{"AvailabilityType":"now","MinimumHours":"23","MaximumHours":"23"},"IsEligibleForSuperSaverShipping":"1","IsEligibleForPrime":"1"}}},"CustomerReviews":{"IFrameURL":"https:\\/\\/www.amazon.co.uk\\/reviews\\/iframe?akid=AKIAJQ5H73N4HMGFKJSA&alinkCode=xm2&asin=B00ZUTQK46&atag=fictionsoft-21&exp=2017-05-03T15%3A32%3A29Z&v=2&sig=0u%252B3YkdmNUIStMqzQq7eoqCqzFnxI14GLpVa0ZTFdoo%253D","HasReviews":"true"}}'),
	(6, 152, 'B00QJDO0QC', 'Kindle Paperwhite E-reader, 6" High-Resolution Display (300 ppi) with Built-in Light, Wi-Fi (Black) - Includes Special Offers', '{"ASIN":"B00QJDO0QC","ParentASIN":"B00U879AII","DetailPageURL":"https:\\/\\/www.amazon.co.uk\\/Amazon-Kindle-Paperwhite-6-Inch-4GB-E-Reader\\/dp\\/B00QJDO0QC?psc=1&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00QJDO0QC","ItemLinks":{"ItemLink":[{"Description":"Add To Wishlist","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/registry\\/wishlist\\/add-item.html?asin.0=B00QJDO0QC&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00QJDO0QC"},{"Description":"Tell A Friend","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/pdp\\/taf\\/B00QJDO0QC?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00QJDO0QC"},{"Description":"All Customer Reviews","URL":"https:\\/\\/www.amazon.co.uk\\/review\\/product\\/B00QJDO0QC?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00QJDO0QC"},{"Description":"All Offers","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B00QJDO0QC?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00QJDO0QC"}]},"SalesRank":"14","SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL75_.jpg","Height":"75","Width":"75"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL.jpg","Height":"500","Width":"500"},"ImageSets":{"ImageSet":[{"@attributes":{"Category":"swatch"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/21OmyIzIENL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/21OmyIzIENL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/21OmyIzIENL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/21OmyIzIENL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/21OmyIzIENL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/21OmyIzIENL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NtjVRi9cL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NtjVRi9cL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NtjVRi9cL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NtjVRi9cL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NtjVRi9cL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51NtjVRi9cL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61T6b-uLpYL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61T6b-uLpYL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61T6b-uLpYL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61T6b-uLpYL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61T6b-uLpYL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61T6b-uLpYL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5149wY8vlwL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5149wY8vlwL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5149wY8vlwL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5149wY8vlwL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5149wY8vlwL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5149wY8vlwL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5194nYI5rIL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5194nYI5rIL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5194nYI5rIL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5194nYI5rIL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5194nYI5rIL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/5194nYI5rIL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51F5X5oPnBL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51F5X5oPnBL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51F5X5oPnBL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51F5X5oPnBL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51F5X5oPnBL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51F5X5oPnBL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/31YcZ7WkUyL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/31YcZ7WkUyL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/31YcZ7WkUyL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/31YcZ7WkUyL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/31YcZ7WkUyL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/31YcZ7WkUyL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/510ONl-WTfL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/510ONl-WTfL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/510ONl-WTfL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/510ONl-WTfL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/510ONl-WTfL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/510ONl-WTfL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"primary"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51DlL6nUXaL.jpg","Height":"500","Width":"500"}}]},"ItemAttributes":{"Binding":"Electronics","Brand":"Amazon","CatalogNumberList":{"CatalogNumberListElement":["53-003585","1600051006"]},"Color":"Black","EAN":"0848719056594","EANList":{"EANListElement":"0848719056594"},"Feature":["Unsurpassed high-resolution 300 ppi display - reads like real paper","Now with Bookerly, our exclusive font, designed to read easily and comfortably at all sizes","Built-in adjustable light - read day and night","Unlike tablets, no screen glare, even in bright sunlight","A single battery charge lasts weeks, not hours","Lighter than a paperback, holds thousands of books","Without leaving the page, exclusive features help you build your vocabulary and learn about characters","With Kindle Unlimited, you can read as much as you want, choosing from over 800,000 titles and thousands of audiobooks","Massive selection, low prices - over 1.5 million books less than \\u00a33.99 each"],"ItemDimensions":{"Height":"665","Length":"460","Weight":"45","Width":"36"},"Label":"Amazon","ListPrice":{"Amount":"10999","CurrencyCode":"GBP","FormattedPrice":"\\u00a3109.99"},"Manufacturer":"Amazon","Model":"DP75SDI","MPN":"DP75SDI","PackageDimensions":{"Height":"134","Length":"685","Weight":"75","Width":"551"},"PackageQuantity":"1","PartNumber":"DP75SDI","ProductGroup":"Amazon Ereaders","ProductTypeName":"AMAZON_BOOK_READER","Publisher":"Amazon","ReleaseDate":"2015-06-30","Size":"4 GB","Studio":"Amazon","Title":"Kindle Paperwhite E-reader, 6\\" High-Resolution Display (300 ppi) with Built-in Light, Wi-Fi (Black) - Includes Special Offers","UPC":"848719056594","UPCList":{"UPCListElement":"848719056594"}},"OfferSummary":{"LowestNewPrice":{"Amount":"10999","CurrencyCode":"GBP","FormattedPrice":"\\u00a3109.99"},"TotalNew":"1","TotalUsed":"0","TotalCollectible":"0","TotalRefurbished":"0"},"Offers":{"TotalOffers":"1","TotalOfferPages":"1","MoreOffersUrl":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B00QJDO0QC?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00QJDO0QC","Offer":{"OfferAttributes":{"Condition":"New"},"OfferListing":{"OfferListingId":"PBndSf5bLWCKwxlLRePrcsmOwfVfr0vb7muI6bZq0cjtml58kfrer6%2Bliq5G2HnJzNTr6bJsg6c5hTFKE%2FanAYTA7PU6Xfzr","Price":{"Amount":"10999","CurrencyCode":"GBP","FormattedPrice":"\\u00a3109.99"},"Availability":"Usually dispatched within 24 hours","AvailabilityAttributes":{"AvailabilityType":"now","MinimumHours":"0","MaximumHours":"0"},"IsEligibleForSuperSaverShipping":"1","IsEligibleForPrime":"1"}}},"CustomerReviews":{"IFrameURL":"https:\\/\\/www.amazon.co.uk\\/reviews\\/iframe?akid=AKIAJQ5H73N4HMGFKJSA&alinkCode=xm2&asin=B00QJDO0QC&atag=fictionsoft-21&exp=2017-05-03T15%3A37%3A39Z&v=2&sig=GKAZQmH8WB5ijRRvg4vK3CLu%252BtEu8%252ByBegrDm4k1q4E%253D","HasReviews":"true"}}'),
	(7, 152, 'B00Y3TM6CO', 'Fire Tablet, 7" Display, Wi-Fi, 8 GB (Black) - Includes Special Offers', '{"ASIN":"B00Y3TM6CO","ParentASIN":"B010BWE07A","DetailPageURL":"https:\\/\\/www.amazon.co.uk\\/Amazon-Fire-7-Inch-Tablet-8GB\\/dp\\/B00Y3TM6CO?psc=1&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00Y3TM6CO","ItemLinks":{"ItemLink":[{"Description":"Add To Wishlist","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/registry\\/wishlist\\/add-item.html?asin.0=B00Y3TM6CO&SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00Y3TM6CO"},{"Description":"Tell A Friend","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/pdp\\/taf\\/B00Y3TM6CO?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00Y3TM6CO"},{"Description":"All Customer Reviews","URL":"https:\\/\\/www.amazon.co.uk\\/review\\/product\\/B00Y3TM6CO?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00Y3TM6CO"},{"Description":"All Offers","URL":"https:\\/\\/www.amazon.co.uk\\/gp\\/offer-listing\\/B00Y3TM6CO?SubscriptionId=AKIAJQ5H73N4HMGFKJSA&tag=fictionsoft-21&linkCode=xm2&camp=2025&creative=12734&creativeASIN=B00Y3TM6CO"}]},"SalesRank":"34","SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL75_.jpg","Height":"75","Width":"75"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL.jpg","Height":"500","Width":"500"},"ImageSets":{"ImageSet":[{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51wPQSVpXiL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51wPQSVpXiL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51wPQSVpXiL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51wPQSVpXiL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51wPQSVpXiL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51wPQSVpXiL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51z2S-Lw1LL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51z2S-Lw1LL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51z2S-Lw1LL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51z2S-Lw1LL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51z2S-Lw1LL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51z2S-Lw1LL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61OqL2sySGL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61OqL2sySGL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61OqL2sySGL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61OqL2sySGL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61OqL2sySGL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61OqL2sySGL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/511nVMoGrML._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/511nVMoGrML._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/511nVMoGrML._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/511nVMoGrML._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/511nVMoGrML._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/511nVMoGrML.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61YuV3c-4fL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61YuV3c-4fL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61YuV3c-4fL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61YuV3c-4fL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61YuV3c-4fL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/61YuV3c-4fL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"primary"},"SwatchImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\\/\\/images-eu.ssl-images-amazon.com\\/images\\/I\\/51lLtJz8teL.jpg","Height":"500","Width":"500"}}]},"ItemAttributes":{"Binding":"Electronics","Brand":"Amazon","CatalogNumberList":{"CatalogNumberListElement":"53-003850"},"Color":"Black","EAN":"0848719080445","EANList":{"EANListElement":"0848719080445"},"Feature":["Beautiful 7\\" IPS display (171 ppi \\/ 1024 x 600). Available in four colours.","Fast 1.3 GHz quad-core processor and rear- and front-facing cameras.","Amazon Underground: All-new, one-of-a-kind app store experience where thousands of apps, games and in-app items are actually free -- including extra lives, unlocked levels, unlimited add-on packs and more","Prime members can stream thousands of Prime Video titles, access over a million book titles, thousands of audiobooks and two million songs","Prime members can download thousands of Prime Video movies and TV shows to watch offline anywhere","Enjoy more than 38 million songs, movies, TV shows, books, apps and games","Free unlimited cloud storage for all Amazon content and photos taken with Fire devices. Add a microSD card for up to 200GB of additional storage","Up to 7 hours of reading, surfing the web on Wi-Fi, watching video and listening to music","Stay connected with fast web browsing, e-mail and calendar support"],"ItemDimensions":{"Height":"752","Length":"453","Weight":"69","Width":"42"},"Label":"Amazon","ListPrice":{"Amount":"4999","CurrencyCode":"GBP","FormattedPrice":"\\u00a349.99"},"Manufacturer":"Amazon","Model":"SV98LN","MPN":"SV98LN","OperatingSystem":"Fire OS","PackageDimensions":{"Height":"134","Length":"945","Weight":"106","Width":"685"},"PartNumber":"SV98LN","ProductGroup":"Amazon Tablets","ProductTypeName":"AMAZON_TABLET","Publisher":"Amazon","ReleaseDate":"2015-09-30","Size":"8 GB","Studio":"Amazon","Title":"Fire Tablet, 7\\" Display, Wi-Fi, 8 GB (Black) - Includes Special Offers","UPC":"848719080445","UPCList":{"UPCListElement":"848719080445"}},"OfferSummary":{"LowestUsedPrice":{"Amount":"4217","CurrencyCode":"GBP","FormattedPrice":"\\u00a342.17"},"TotalNew":"0","TotalUsed":"6","TotalCollectible":"0","TotalRefurbished":"0"},"Offers":{"TotalOffers":"0","TotalOfferPages":"0","MoreOffersUrl":"0"},"CustomerReviews":{"IFrameURL":"https:\\/\\/www.amazon.co.uk\\/reviews\\/iframe?akid=AKIAJQ5H73N4HMGFKJSA&alinkCode=xm2&asin=B00Y3TM6CO&atag=fictionsoft-21&exp=2017-05-03T15%3A37%3A54Z&v=2&sig=GgdngFzuBukiNuixt%252FF6lRcu%252BFMgjwwBZhbgJFVB3Co%253D","HasReviews":"true"}}');
/*!40000 ALTER TABLE `fit_f2lt_product_ranks` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_requirements
DROP TABLE IF EXISTS `fit_f2lt_requirements`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requirement_type_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `present_ranking` varchar(50) NOT NULL,
  `present_status` varchar(255) NOT NULL,
  `required_status` varchar(255) NOT NULL,
  `start_date` varchar(50) NOT NULL DEFAULT '0000-00-00',
  `target_date` varchar(50) NOT NULL DEFAULT '0000-00-00',
  `reference_code` varchar(255) NOT NULL,
  `asin` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `links` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_assign` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_requirements: 5 rows
/*!40000 ALTER TABLE `fit_f2lt_requirements` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_requirements` (`id`, `user_id`, `requirement_type_id`, `amount`, `present_ranking`, `present_status`, `required_status`, `start_date`, `target_date`, `reference_code`, `asin`, `keyword`, `links`, `description`, `status`, `is_assign`, `created`, `modified`) VALUES
	(1, 149, 3, 0.00, '10', 'Pending', 'top 22', '2017-08-15', '2017-08-25', 'AML-2', 'B017DP5KWC', 'queen bed air mattress', 'http://www.lipsum.com/\r\nhttp://www.lipsum.com/\r\nhttp://www.lipsum.com/', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 1, 1, '2017-08-11 11:05:08', '2017-09-11 23:54:07'),
	(2, 151, 4, 0.00, '10', 'Pending', 'top 10', '2017-08-01', '2017-08-31', 'AML-2', 'B017DP5KWC', 'elevated air matterss', 'http://www.lipsum.com/\r\nhttp://www.lipsum.com/\r\nhttp://www.lipsum.com/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '2017-08-11 11:06:25', '2017-09-11 23:53:57'),
	(3, 148, 1, 0.00, '', 'Completed', 'top 11', '2017-08-01', '2017-08-31', 'AML-2', 'B017DP5KWC', 'bed air', 'http://www.lipsum.com/\r\nhttp://www.lipsum.com/\r\nhttp://www.lipsum.com/http://www.lipsum.com/', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 1, 1, '2017-08-11 11:09:16', '2017-09-08 14:17:57'),
	(4, 136, 3, 0.00, '', 'Pending', 'top 20', '2017-08-01', '2017-08-23', 'AML-2', 'B017DP5KWC', 'queen double air matterss', 'http://localhost/amazonapp/admin/requirements/update/4\r\nhttps://www.google.com/search?q=lorem+ipsum&ie=utf-8&oe=utf-8&client=firefox-b\r\nhttp://www.lipsum.com/\r\nhttps://www.w3schools.com/php/php_mysql_connect.asp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1, '2017-08-11 11:11:47', '2017-09-08 14:17:57'),
	(6, 136, 2, 45.00, '', 'Pending', 'Top 15', '2017-08-01', '2017-08-31', 'AML-5', 'B017DP5KWC', 'bed hfd', 'http://fictionsoft.com/demo/amazon_app/admin/requirements\r\nhttp://fictionsoft.com/demo/amazon_app/admin/requirements\r\nhttp://fictionsoft.com/demo/amazon_app/admin/requirements', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 0, '2017-08-27 00:04:00', '2017-08-29 22:12:22');
/*!40000 ALTER TABLE `fit_f2lt_requirements` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_requirement_types
DROP TABLE IF EXISTS `fit_f2lt_requirement_types`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_requirement_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_requirement_types: ~6 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_requirement_types` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_requirement_types` (`id`, `name`, `status`, `created`, `modified`) VALUES
	(1, 'Ranking', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Monthly Holding', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Vote', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Review', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'Purchase', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'Others', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `fit_f2lt_requirement_types` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_roles
DROP TABLE IF EXISTS `fit_f2lt_roles`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_roles` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_roles` (`id`, `name`, `status`, `created`, `modified`) VALUES
	(1, 'Admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Worker', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'Client', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'Seller', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `fit_f2lt_roles` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_schedules
DROP TABLE IF EXISTS `fit_f2lt_schedules`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_schedules: 6 rows
/*!40000 ALTER TABLE `fit_f2lt_schedules` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_schedules` (`id`, `time`, `status`, `created`, `modified`) VALUES
	(7, '12.00', 1, '2015-11-23 08:56:00', '2018-03-10 16:07:59'),
	(6, '0', 0, '2015-11-23 08:53:54', '2015-11-26 10:50:03'),
	(5, '0', 0, '2015-11-23 08:50:53', '2015-12-06 03:33:41'),
	(13, '55', 1, '2018-03-10 14:58:29', '2018-03-10 16:05:39'),
	(14, '33', 1, '2018-03-10 14:59:10', '2018-03-10 14:59:10'),
	(20, '12.00', 1, '2018-03-10 16:16:00', '2018-03-10 16:16:00');
/*!40000 ALTER TABLE `fit_f2lt_schedules` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_sellers
DROP TABLE IF EXISTS `fit_f2lt_sellers`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_sellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marketplace_id` varchar(222) NOT NULL DEFAULT '0',
  `seller_id` varchar(222) NOT NULL DEFAULT '0',
  `access_key_id` varchar(222) NOT NULL DEFAULT '0',
  `secret_access_key` varchar(222) NOT NULL DEFAULT '0',
  `msw_auth_token` varchar(222) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_sellers: 10 rows
/*!40000 ALTER TABLE `fit_f2lt_sellers` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_sellers` (`id`, `marketplace_id`, `seller_id`, `access_key_id`, `secret_access_key`, `msw_auth_token`, `created`, `modified`) VALUES
	(1, 'ATVPDKIKX0DER', 'A10YV6NTBY6VOS', 'AKIAJIEKAODR7KSYYMXQ', 'SCgP+biEsc3q/BUXDINJx/eQ82aONQp6jiqEVt4S', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'dsfg', 'sdfgsdfg', 'asdfs', 'asdf', 'asdf', '2017-10-18 21:21:13', '2017-10-18 21:21:13'),
	(3, 'Marketplace id', 'Seller id', 'Access key id', 'Secret access key ', 'Secret access key', '2017-10-18 21:36:34', '2017-10-18 21:36:34'),
	(4, 'asd', 'asdf', 'asdf', 'asdf', 'asdfsadf', '2017-10-18 21:48:41', '2017-10-18 21:48:41'),
	(5, 'Markerplace id', 'Seller id', 'Access Key id', 'Secrete access key', 'Msw', '2017-10-19 20:15:37', '2017-10-19 20:15:37'),
	(6, 'Markerplace id', 'Seller id', 'Access Key id', 'Secrete access key', 'Msw', '2017-10-19 20:17:31', '2017-10-19 20:17:31'),
	(7, '5355', '45645', '45645', 'asdfas', 'asdf', '2017-10-19 20:43:23', '2017-10-19 20:43:23'),
	(8, '1234567', '325356', '363645', '3456345', '356546', '2017-10-19 20:47:15', '2017-10-19 20:47:15'),
	(9, '1234567', '325356', '363645', '3456345', '356546', '2017-10-19 20:48:21', '2017-10-19 20:48:21'),
	(10, '1234567', '325356', '363645', '3456345', '356546', '2017-10-19 20:48:46', '2017-10-19 20:48:46');
/*!40000 ALTER TABLE `fit_f2lt_sellers` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_settings
DROP TABLE IF EXISTS `fit_f2lt_settings`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(222) NOT NULL,
  `value` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_settings: ~2 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_settings` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_settings` (`id`, `key`, `value`) VALUES
	(1, 'site_name', 'Amazon App'),
	(2, 'site_email', 'info@amzrockets.com');
/*!40000 ALTER TABLE `fit_f2lt_settings` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_sizes
DROP TABLE IF EXISTS `fit_f2lt_sizes`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size` varchar(50) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_sizes: ~5 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_sizes` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_sizes` (`id`, `size`, `order`, `status`, `created`, `modified`) VALUES
	(1, 'S', 1, 1, '0000-00-00 00:00:00', '2015-11-07 16:02:38'),
	(2, 'M', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'L', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, '32', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '34', 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `fit_f2lt_sizes` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_sliders
DROP TABLE IF EXISTS `fit_f2lt_sliders`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover_photo` varchar(255) NOT NULL,
  `name` varchar(222) NOT NULL DEFAULT '0',
  `slug` varchar(222) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_sliders: ~2 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_sliders` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_sliders` (`id`, `cover_photo`, `name`, `slug`, `order`, `status`, `created`, `modified`) VALUES
	(1, '1490357756_slider1.jpg', 'Slider1', 'slider1', 0, 1, '0000-00-00 00:00:00', '2017-03-24 19:15:56'),
	(2, '1488640046_slider2.jpg', 'slider2', 'slider2', 0, 1, '0000-00-00 00:00:00', '2017-03-04 22:07:26');
/*!40000 ALTER TABLE `fit_f2lt_sliders` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_users
DROP TABLE IF EXISTS `fit_f2lt_users`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) DEFAULT NULL,
  `seller_id` int(10) DEFAULT NULL,
  `first_name` varchar(222) DEFAULT NULL,
  `last_name` varchar(222) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(222) DEFAULT NULL,
  `password` varchar(222) DEFAULT NULL,
  `username` varchar(222) NOT NULL,
  `photo` varchar(222) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `token` varchar(255) NOT NULL,
  `token_generated` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

# Dumping data for table amazon_app.fit_f2lt_users: ~41 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_users` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_users` (`id`, `role_id`, `seller_id`, `first_name`, `last_name`, `phone`, `address_line1`, `address_line2`, `city`, `state`, `zip`, `country`, `email`, `password`, `username`, `photo`, `status`, `is_paid`, `token`, `token_generated`, `created`, `updated`) VALUES
	(114, 1, 1, 'Iqbal', 'Mirza', '345345', 'Uttara, Dhaka', 'Dhaka', 'Dhaka', '3343', '234324', 'Bangladesh', 'info@amzrockets.com', '5a2007541c6a802176bb5aa41c9c7311e38d3c41', 'info@amzrockets.com', 'run-128.png', 1, 0, '563a0bf2-63f4-4cb9-846a-0960076b473a', '2015-11-04 13:45:22', '2015-03-07 08:30:44', '2015-11-11 03:20:39'),
	(117, 0, NULL, 'larry', 'ulllman', '6456435', 'uttara', 'dhaka', 'Dhaka', 'Dhaka', 'Dhaka', 'Australia', 'test@user.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'test@user.com', '', 1, 1, '551c322d-8698-4ad3-999d-0350076b473a', '0000-00-00 00:00:00', '2015-04-01 20:00:13', NULL),
	(121, 0, NULL, 'rahman rdt', 'ert', '354', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'Antigua and Barbuda', 'mizan92sdfcse@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'mizan92sdfcse@gmail.com', '', 1, 0, '552d4f29-1200-49de-a94a-4d1fadec3cd2', '0000-00-00 00:00:00', '2015-04-14 17:32:25', NULL),
	(122, 0, NULL, 'John', 'Smith', '123445567', 'sdfvsws', 'sadfsdv', 'Redfern', 'NSW', '5000', '', 'opal.words@gmail.com', 'b360c28f1a36395a72b9320e54ce9348b25299af', 'opal.words@gmail.com', '', 1, 0, '55365ee2-e958-4bb1-aa71-4ff7adec3cd2', '0000-00-00 00:00:00', '2015-04-21 14:29:54', NULL),
	(123, 0, NULL, 'm', 'df', '345', 'dsf', 'sdf', 'Dhaka', 'sdf', 'df', '', 'mizadfn92cse@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'mizadfn92cse@gmail.com', '', 1, 0, '55365f82-1a7c-469e-942d-4070adec3cd2', '0000-00-00 00:00:00', '2015-04-21 14:32:34', NULL),
	(124, 0, NULL, 'Choton', 'Mondal', NULL, '', '', '', '', '', '', 'chotonmb@gmail.com', '01ef41131afbfcd03eaa5197465c1f69ce605eda', 'chotonmb@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-06-26 17:54:53', NULL),
	(125, 0, NULL, 'Mizanur', 'Rahman', NULL, '', '', '', '', '', '', 'mizan92@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'mizan92@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-06-27 09:45:29', NULL),
	(126, 0, NULL, 'Mizanur', 'Rahman', NULL, '', '', '', '', '', '', 'mizanur29cse@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'mizanur29cse@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-06-27 09:53:02', NULL),
	(127, 0, NULL, 'Mizanur', 'Rahman', NULL, '', '', '', '', '', '', 'mizan92cse@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'mizan92cse@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-06-27 10:24:36', NULL),
	(128, 0, NULL, 'Mizan fd', 'Khan', NULL, '', '', '', '', '', '', 'info@nibizsoft.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'info@nibizsoft.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-06-27 10:35:23', NULL),
	(129, 0, NULL, 'Ahad', 'khan', '0173456765', 'sorietpur', '', '', '', '', '', 'reeta.reza@gmail.com', '96a175687052ad9f193a8b0b741771aa4e7718ce', 'reeta.reza@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-06-30 11:28:37', '2015-11-05 06:49:14'),
	(130, 0, NULL, 'fg', 'fg', '54', 'df', 'df', 'df', '', '', 'Anguilla', 'addmin@test.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'addmin@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-10-29 15:41:04', '2015-11-04 03:05:15'),
	(132, 0, NULL, 'fg', 'gf', '1234', 'sdf', '', '', '', '', '', 'fsdf@test.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-04 03:16:38', '2015-11-04 03:16:56'),
	(133, 2, NULL, 'Rejaul', 'Korim', '01736348772', 'Pangsha', 'Rajbari', 'Rajbari', '', '', 'Bangladesh', 'rejaul@test.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'rejaul@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-04 12:33:51', NULL),
	(134, 0, NULL, 'Rejaul', 'Korim', '01736348772', 'Pangsha', 'Rajbari', 'Rajbari', '', '', 'Bangladesh', 'habib@test.com', '7a7abb5f17a4064628c5c94cd8181de77dbbd727', 'habib@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-04 12:36:12', NULL),
	(135, 0, NULL, 'Rejaul', 'Korim', '01736348772', 'Pangsha', 'Rajbari', 'Rajbarisdf', '', '', 'Saint Kitts and Nevis', 'hadbib@test.com', '7a7abb5f17a4064628c5c94cd8181de77dbbd727', 'hadbib@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-04 13:06:56', '2015-11-04 13:09:45'),
	(136, 3, NULL, 'rejaul', 'korim', '123456789098', 'pangsha', 'Rajbari', 'Rajbari', '', '', 'Bangladesh', 'abir@gmail.com', '319292d803dcee4f48776162af5d589f8056869e', 'asdfgh@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-04 16:04:50', NULL),
	(137, 3, NULL, 'Nahaid', 'Khan', '017456564534', 'Pangsha', '', '', '', '', '', 'nahid@test.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 08:25:21', NULL),
	(138, 0, NULL, 'Alimt', 'Khan', '01745668864', 'Rajbari', '', '', '', '', '', 'alim@test.com', 'b6dcda2c7ae72d36ebbe8bf4586a705bc309453e', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 08:29:45', NULL),
	(139, 0, NULL, 'AB', 'Azij', '0174579875', 'Dhaka', '', '', '', '', '', 'ab@test.com', 'e04ceb91a0e1e7f1759625ee9a86905b920a4c86', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 08:35:34', NULL),
	(140, 0, NULL, 'AB', 'Rohaim', '01734567654', 'pangsha', 'Rajbari', 'Rajbari', '', '', '', 'rohaim@test.com', '20222a8dc3d80fbfad8798979b60dcc9d0f989f2', 'rohaim@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 09:17:01', NULL),
	(141, 2, NULL, 'Abdullah', 'Almamun', '01934567654', '', '', '', '', '', '', 'abullah@test.com', '84c5320e5bb993c5d7c3397e191da0fb0fb11c2f', 'abullah@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 09:25:35', NULL),
	(142, 2, NULL, 'Khalid', 'Las', '09156346676', '', '', '', '', '', '', 'sadfin@test.com', '22059c89ab55060c64468d00248b09a9947e307b', 'sadfin@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 09:31:52', NULL),
	(143, 2, NULL, 'Roman', 'Mlo', '01895543', '', '', '', '', '', '', 'roman@test.com', 'f16639563a8bf20dde1e1647e121a29dc1f4c966', 'roman@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-05 09:39:26', NULL),
	(144, 0, NULL, 'er', 'er', '23', 'sf', 'sdf', 'sdf', '', '', 'Austria', 'addfmin@test.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'addfmin@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-11-06 16:54:02', '2015-11-06 16:55:02'),
	(145, 2, NULL, 'kumrul', 'hasan', '01723344565', 'pangsha', 'rajabari', 'kustia', '', '', 'Bangladesh', 'kumrul@gmali.com', '5abdc495e112c6cf00157c2e5fb60689b04be317', 'kumrul@gmali.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-12-14 00:41:17', NULL),
	(146, 0, NULL, 'df', 'jhl', '566', 'lkjl', 'lhh', 'hh', '', '', 'Bangladesh', 'hasan@gmail.com', 'fd269ff595db5639923df12711e8fb58ce27013c', 'hasan@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-12-14 00:46:52', NULL),
	(147, 0, NULL, 'fdfdf', 'gfg', 'tyy', 'asdf', 'ghj', 'asdf', '', '', 'Bangladesh', 'adfdfdfdmin@test.com', '22c317efae8405be51ad96bd44807659d2a10b4a', 'adfdfdfdmin@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-12-14 08:59:01', NULL),
	(148, 3, NULL, 'fdfdf', 'gfg', 'tyy', 'asdf', 'ghj', 'asdf', '', '', 'Bangladesh', 'saif@gmail.com', '22c317efae8405be51ad96bd44807659d2a10b4a', 'yyyyy@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-12-14 09:00:09', NULL),
	(149, 3, NULL, 'Abdullah', 'Almamuan', '01736454567', 'pangsha', 'Rajbari', 'Kustia', '', '', 'Bangladesh', 'abdullah@gmail.com', '84c5320e5bb993c5d7c3397e191da0fb0fb11c2f', 'abdullah@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-12-16 16:32:26', NULL),
	(150, 3, NULL, 'abdullah', 'Almamun', '01743645765', 'Rajbari', 'Pangsha', 'Kustia', '', '', '', 'abdullah@test.com', '84c5320e5bb993c5d7c3397e191da0fb0fb11c2f', 'abdullah@test.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2015-12-16 16:56:49', NULL),
	(151, 3, NULL, 'asdf', 'asdfdsa', '01734687898', 'asdf', 'asdf', '', '', '', '', 'employer@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'employer@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-04-09 00:28:55', '2017-08-01 21:35:36'),
	(152, 2, NULL, 'Mycal', 'Jakas', '34345', 'California', 'Hawiian', '', '', '', '', 'worker@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'worker@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-04-09 13:17:37', '2017-08-18 22:31:59'),
	(153, 3, NULL, 'Saiful', 'Isalam', '017364356', 'Sorieatput', '', '', '', '', '', 'saiful@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-08-11 14:33:21', '2017-08-11 14:33:21'),
	(154, 3, NULL, 'Bulbul', 'Ahmed', '017364356', 'Sorieatput', '', '', '', '', '', 'bulbul@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-08-11 14:44:07', '2017-08-11 14:44:07'),
	(155, 3, NULL, 'MR', 'Jhon', '017325467', 'California', '', '', '', '', '', 'jhon@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', '', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-08-11 14:54:44', '2017-08-11 14:54:44'),
	(156, 2, NULL, 'Mizanur', 'Rahman', '34', 'dhaka', '', '', '', '', '', 'mizan92cse@yahoo.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'mizan92cse@yahoo.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-09-10 20:22:54', '2017-09-10 20:31:07'),
	(157, 4, 3, 'MD', 'Abdullah', NULL, 'Dhaka', 'asdf', '', '', '', '', 'abdullahccs13@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'abdullahccs13@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-10-18 21:36:34', '2017-10-18 21:36:34'),
	(158, 4, 1, 'MD', 'Rejaul', NULL, 'Dhaka', 'Mohakhali', '', '', '', '', 'seller@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'seller@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-10-19 20:17:31', '2017-10-19 20:17:31'),
	(159, 4, 7, 'M', 'Silva', NULL, 'Dhaka', 'Dhanmondi', '', '', '', '', 'seller1@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'seller1@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-10-19 20:43:23', '2017-10-19 20:43:23'),
	(160, 4, 10, 'asd', 'ads', NULL, 'asd', 'asdf', '', '', '', '', 'aads@gmail.com', '7ef3d4a84f08c0905583341296559102b89c9a4e', 'aads@gmail.com', NULL, 1, 0, '', '0000-00-00 00:00:00', '2017-10-19 20:48:46', '2017-10-19 20:48:46');
/*!40000 ALTER TABLE `fit_f2lt_users` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_wish_lists
DROP TABLE IF EXISTS `fit_f2lt_wish_lists`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_wish_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table amazon_app.fit_f2lt_wish_lists: ~16 rows (approximately)
/*!40000 ALTER TABLE `fit_f2lt_wish_lists` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_wish_lists` (`id`, `user_id`, `product_id`, `status`, `created`, `modified`) VALUES
	(1, 0, 0, 0, '2015-10-16 15:58:39', '2015-10-16 15:58:39'),
	(2, 0, 0, 0, '2015-10-16 15:59:11', '2015-10-16 15:59:11'),
	(3, 0, 0, 0, '2015-10-16 16:00:36', '2015-10-16 16:00:36'),
	(4, 0, 0, 0, '2015-10-16 16:00:54', '2015-10-16 16:00:54'),
	(5, 0, 0, 0, '2015-10-16 16:01:58', '2015-10-16 16:01:58'),
	(6, 0, 13, 0, '2015-10-16 16:15:24', '2015-10-16 16:15:24'),
	(7, 0, 13, 0, '2015-10-16 16:26:01', '2015-10-16 16:26:01'),
	(8, 0, 13, 0, '2015-10-16 16:26:09', '2015-10-16 16:26:09'),
	(9, 0, 12, 0, '2015-10-16 16:26:21', '2015-10-16 16:26:21'),
	(27, 114, 23, 0, '2015-11-04 15:13:43', '2015-11-04 15:13:43'),
	(33, 114, 14, 0, '2015-11-10 16:50:20', '2015-11-10 16:50:20'),
	(34, 114, 46, 0, '2015-11-25 11:04:01', '2015-11-25 11:04:01'),
	(35, 114, 12, 0, '2015-11-25 11:05:13', '2015-11-25 11:05:13'),
	(36, 145, 23, 0, '2015-12-14 00:42:19', '2015-12-14 00:42:19'),
	(37, 149, 45, 0, '2015-12-16 16:34:18', '2015-12-16 16:34:18'),
	(38, 149, 23, 0, '2015-12-16 16:35:13', '2015-12-16 16:35:13');
/*!40000 ALTER TABLE `fit_f2lt_wish_lists` ENABLE KEYS */;


# Dumping structure for table amazon_app.fit_f2lt_worker_jobs
DROP TABLE IF EXISTS `fit_f2lt_worker_jobs`;
CREATE TABLE IF NOT EXISTS `fit_f2lt_worker_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

# Dumping data for table amazon_app.fit_f2lt_worker_jobs: 3 rows
/*!40000 ALTER TABLE `fit_f2lt_worker_jobs` DISABLE KEYS */;
REPLACE INTO `fit_f2lt_worker_jobs` (`id`, `job_id`, `user_id`, `created`, `modified`) VALUES
	(2, 1, 145, '2017-09-08 12:52:16', '2017-09-08 12:52:16'),
	(3, 1, 152, '2017-09-08 12:52:16', '2017-09-08 12:52:16'),
	(4, 2, 133, '2017-09-08 14:17:57', '2017-09-08 14:17:57');
/*!40000 ALTER TABLE `fit_f2lt_worker_jobs` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
