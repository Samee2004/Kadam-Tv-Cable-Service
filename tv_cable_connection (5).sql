-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2024 at 08:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tv cable connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `chan_id` int(11) NOT NULL,
  `Chan_name` varchar(100) NOT NULL,
  `chan_price` int(5) NOT NULL,
  `chan_genre` int(11) NOT NULL,
  `chan_img` varchar(5000) DEFAULT NULL,
  `chan_language` int(11) DEFAULT NULL,
  `chan_quality` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`chan_id`, `Chan_name`, `chan_price`, `chan_genre`, `chan_img`, `chan_language`, `chan_quality`) VALUES
(19, 'STAR JALSHA MOVIES HD ', 15, 1, '../assets/6e74f7fa3f45864a56981c771c34382d.webp', 5, 'HD'),
(20, 'Sony Max HD', 4, 1, '../assets/127bfdb4994b951f71a7a80db81d1c20.webp', 3, 'HD'),
(21, '& Flix', 15, 1, '../assets/1a023f63d2cacfd98d2b77a36ab40842.webp', 2, 'SD'),
(23, 'FILAMCHI_BHOJPURI ', 5, 1, '../assets/67a4f8b5c98b06a60cbdfbc69bb5a77b.webp', 14, 'SD'),
(24, 'Colors Gujarati Cinema ', 1, 1, '../assets/ed73dc136e21323d78ebadb015b3a9ce.webp', 15, 'SD'),
(25, 'Zee-Picchar ', 10, 1, '../assets/e48eeab0fcf9cfe8992d6a03b7307e9c.webp', 13, 'SD'),
(26, 'ASIANET MOVIES', 19, 1, '../assets/bb4c80529a9456daebba18db8624c552.webp', 9, 'SD'),
(27, 'ZEE TALKIES HD ', 19, 1, '../assets/86f721861e4bbceaeb0a1ee95008e1ef.webp', 8, 'HD'),
(28, 'ALANKAR TV ', 4, 1, '../assets/77d22a451b092385800aebdd9043c0cf.webp', 7, 'SD'),
(29, 'J Movie ', 3, 1, '../assets/4c123cd866696268fa5c96fa78270a4e.webp', 6, 'SD'),
(30, 'Maa Movies HD', 19, 1, '../assets/29e5179deaca7995b200f5c6e9c63c6e.webp', 10, 'HD');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(255) NOT NULL,
  `qts` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `qts`) VALUES
(1, 'What would like to talk about ?'),
(2, 'bye '),
(3, 'As both free-to-air and pay channels shall have to be carried in the digital domain in an encrypted format, both shall be receivable with the same Set Top Box. '),
(4, 'A subscriber can get a Set Top Box as mentioned below:\r\n•A subscriber has to buy on the outright basis the set top box from the Multi system operator.\r\n•A subscriber can also get a Set Top Box against a security amount paid to Multi System Operator or Cable Operator.\r\n\r\n                                                         ');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot_button`
--

CREATE TABLE `chatbot_button` (
  `cb_id` int(11) NOT NULL,
  `cb_name` varchar(100) NOT NULL,
  `cb_number` varchar(100) NOT NULL,
  `qt_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot_button`
--

INSERT INTO `chatbot_button` (`cb_id`, `cb_name`, `cb_number`, `qt_id`) VALUES
(3, '                                                            Where and from whom can I get a Set Top', '3', 1),
(4, 'Will the Set Top Box also make available free to air channels along with pay?channels? ', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_issue` varchar(1000) NOT NULL,
  `complaint_date` date DEFAULT NULL,
  `complaint_status` varchar(15) DEFAULT NULL,
  `complaint_cust` varchar(100) DEFAULT NULL,
  `complaint_emp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `complaint_issue`, `complaint_date`, `complaint_status`, `complaint_cust`, `complaint_emp`) VALUES
(2, 'gie;audfjnlvm,', '2024-02-07', 'Unresolvable', NULL, NULL),
(3, 'isueee isueeeee,', '2024-02-07', 'Solved', 'hrushiop9988@gmail.com', 'tech@gmail.com'),
(4, 'hehehhehhehehe,', '2024-02-07', 'Pending', 'hrushiop9988@gmail.com', NULL),
(5, 'dasb hfcuxi asivuk,', '2024-02-21', 'Pending', 'sam@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_email` varchar(100) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `cust_fname` varchar(50) NOT NULL,
  `cust_mname` varchar(50) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_flat` varchar(50) NOT NULL,
  `cust_building` varchar(50) NOT NULL,
  `cust_street` varchar(50) NOT NULL,
  `cust_pincode` varchar(50) NOT NULL,
  `cust_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_email`, `cust_password`, `cust_fname`, `cust_mname`, `cust_lname`, `cust_flat`, `cust_building`, `cust_street`, `cust_pincode`, `cust_phone`) VALUES
('hrushiop9988@gmail.com', '123456789', 'Hrushi', 'khfgu', 'dhsvkj', '32', 'fkjdhgu', 'ghlrh', 'Choose your pincode', '1234567678'),
('hrushiop@gmail.com', '0987654321', 'uhfdud', 'hfud', 'cdd', 'gsfsdg', 'rsf', 'ipgknsfsFfngvcteadv', 'Choose your pincode', '1234567890'),
('jdjznl@gmail.com', '123456789', 'Sam', 'Deep', 'Dam', '561', 'vvjsknc', 'jsdvlkx', '400042', '6789367829'),
('jef@gmail.com', 'qazxswedc', 'Ruchi', 'ahfou', 'jekhiu', 'b-21', 'hgut', 'kgut', '400042', '7539514560'),
('sam@gmail.com', '123456789', 'Samee', 'Deep', 'Damn', '21', 'mfvuhh', 'ad,khv', '400042', '7412589630'),
('samkk@gmail.con', 'qweasdzxc', 'Samee', 'kvy', 'fkhv', '098', 'ekfkg', 'wkufgi h', '400042', '9632587418');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_email` varchar(100) NOT NULL,
  `emp_password` varchar(50) NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_mname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_flat` varchar(50) NOT NULL,
  `emp_building` varchar(50) NOT NULL,
  `emp_street` varchar(50) NOT NULL,
  `emp_city` varchar(50) NOT NULL,
  `emp_phone` varchar(10) NOT NULL,
  `emp_role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_email`, `emp_password`, `emp_fname`, `emp_mname`, `emp_lname`, `emp_flat`, `emp_building`, `emp_street`, `emp_city`, `emp_phone`, `emp_role`) VALUES
('admin@gmail.com', '123456789', 'admin', 'xyz', 'abc', 'jegfuf', 'jhi', 'kluyi', 'ngd', '1234567890', 'a'),
('manager@gmail.com', '123456789', 'gefwhld', 'fvdc ', 'efdcs', 'vdsxz', 'dscxz', 'dscxz', 'dcsxz', '1234567890', 'm'),
('tech@gmail.com', '123456789', 'tech', 'tech2', 'tech3', '111', 'dwc', 'ecwsaz', 'wdcax', '1234567890', 't');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `gen_id` int(11) NOT NULL,
  `gen_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`gen_id`, `gen_name`) VALUES
(1, 'Movies'),
(6, 'Gec'),
(7, 'News'),
(8, 'Info'),
(9, 'Music'),
(10, 'Kids'),
(11, 'Lifestyle'),
(12, 'Premium Services'),
(13, 'Sports'),
(14, 'Travel'),
(15, 'Regional'),
(16, 'Spiritual');

-- --------------------------------------------------------

--
-- Table structure for table `installs`
--

CREATE TABLE `installs` (
  `installs_id` int(11) NOT NULL,
  `installs_req_date` date DEFAULT NULL,
  `installs_req_time` time DEFAULT NULL,
  `installs_date` date DEFAULT NULL,
  `installs_status` varchar(25) DEFAULT NULL,
  `stb_number` varchar(25) DEFAULT NULL,
  `emp_email` varchar(100) DEFAULT NULL,
  `cust_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `installs`
--

INSERT INTO `installs` (`installs_id`, `installs_req_date`, `installs_req_time`, `installs_date`, `installs_status`, `stb_number`, `emp_email`, `cust_email`) VALUES
(2, '2024-02-29', '16:00:00', NULL, 'Assigned', 'STB1234-5678-9012', 'tech@gmail.com', 'sam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`lang_id`, `lang_name`) VALUES
(2, 'ENGLISH'),
(3, 'HINDI'),
(4, 'HINDI(dubbed)'),
(5, 'BANGLA'),
(6, ' TAMIL'),
(7, 'ORIYA'),
(8, 'MARATHI'),
(9, 'MALAYALAM'),
(10, 'TELUGU'),
(11, 'URDU'),
(12, 'PUNJABI'),
(13, 'KANNADA'),
(14, 'BHOJPURI'),
(15, 'GUJARATI'),
(16, 'ASSAMESE'),
(17, 'KOREAN');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `offer_name` varchar(50) NOT NULL,
  `offer_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pack_id` int(11) NOT NULL,
  `pack_name` varchar(200) NOT NULL,
  `pack_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pack_id`, `pack_name`, `pack_price`) VALUES
(6, 'Super Filmy Pack', 230),
(7, 'Filmy HD Pack', 100),
(8, 'Fimly SD Pack', 150);

-- --------------------------------------------------------

--
-- Table structure for table `package_has_channel`
--

CREATE TABLE `package_has_channel` (
  `phc_package_id` int(11) NOT NULL,
  `phc_channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_has_channel`
--

INSERT INTO `package_has_channel` (`phc_package_id`, `phc_channel_id`) VALUES
(7, 19),
(7, 20),
(7, 27),
(7, 30),
(6, 19),
(6, 20),
(6, 21),
(6, 23),
(6, 24),
(6, 25),
(6, 26),
(6, 27),
(6, 28),
(6, 29),
(6, 30),
(8, 21),
(8, 23),
(8, 24),
(8, 25),
(8, 26),
(8, 28),
(8, 29);

-- --------------------------------------------------------

--
-- Table structure for table `paidforrecharge`
--

CREATE TABLE `paidforrecharge` (
  `paid_recharge_id` int(11) DEFAULT NULL,
  `paid_trans_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paidforrecharge`
--

INSERT INTO `paidforrecharge` (`paid_recharge_id`, `paid_trans_id`) VALUES
(1, 'pay_NdG658LtrZV8Go'),
(2, 'pay_NehrksMhtJW74K');

-- --------------------------------------------------------

--
-- Table structure for table `paidforsettopbox`
--

CREATE TABLE `paidforsettopbox` (
  `Paid_stb_number` varchar(25) DEFAULT NULL,
  `paid_trans_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paidforsubscription`
--

CREATE TABLE `paidforsubscription` (
  `paid_sub_id` int(11) DEFAULT NULL,
  `paid_trans_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paidforsubscription`
--

INSERT INTO `paidforsubscription` (`paid_sub_id`, `paid_trans_id`) VALUES
(1, 'pay_NZ6nHU06ktmXgD'),
(3, 'pay_NdG780wbBP2YSk'),
(7, 'pay_NdUpiCFA9EifxP');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transaction_id` varchar(25) NOT NULL,
  `pay_mode` varchar(15) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  `pay_time` time DEFAULT NULL,
  `pay_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`transaction_id`, `pay_mode`, `pay_amount`, `pay_date`, `pay_time`, `pay_status`) VALUES
('', 'online', 424, '0000-00-00', '15:49:20', 'success'),
('pay_NdG658LtrZV8Go', 'online', 405, '2024-02-21', '01:32:37', 'success'),
('pay_NdG780wbBP2YSk', 'online', 405, '2024-02-21', '01:33:38', 'success'),
('pay_NdUoirop1yezxn', 'online', 424, '2024-02-21', '15:56:32', 'success'),
('pay_NdUpiCFA9EifxP', 'online', 424, '2024-02-21', '15:57:29', 'success'),
('pay_NehpM71F0TPijG', 'online', 424, '2024-02-24', '17:19:09', 'success'),
('pay_NehrksMhtJW74K', 'online', 424, '2024-02-24', '17:21:25', 'success'),
('pay_NZ6nHU06ktmXgD', 'online', 20, '2024-02-10', '13:50:32', 'success'),
('pay_NZ6zBBRiL3lZIe', 'online', 20, '2024-02-10', '14:01:48', 'success'),
('pay_NZ70t1IYoxjHGN', 'online', 20, '2024-02-10', '14:03:24', 'success'),
('pay_NZ74qyFBhFsGeW', 'online', 20, '2024-02-10', '14:07:10', 'success'),
('pay_NZ7Py8ECbHx5Du', 'online', 20, '2024-02-10', '14:27:09', 'success'),
('pay_NZrTqBmdkUOu6o', 'online', 20, '2024-02-12', '11:30:44', 'success'),
('pay_NZvOKom4KWXvqz', 'online', 5, '2024-02-12', '15:20:16', 'success'),
('pay_NZwK9codBc2HQU', 'online', 15, '2024-02-12', '16:15:00', 'success'),
('pay_NZxpwQ7uVNQ3tk', 'online', 5, '2024-02-12', '17:43:48', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `pur_cust_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseoffer`
--

CREATE TABLE `purchaseoffer` (
  `pur_id` int(11) DEFAULT NULL,
  `off_offer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rechargeforsubscription`
--

CREATE TABLE `rechargeforsubscription` (
  `recharge_id` int(11) NOT NULL,
  `recharge_sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rechargeforsubscription`
--

INSERT INTO `rechargeforsubscription` (`recharge_id`, `recharge_sub_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settopbox`
--

CREATE TABLE `settopbox` (
  `stb_number` varchar(25) NOT NULL,
  `stb_price` int(5) DEFAULT NULL,
  `stb_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settopbox`
--

INSERT INTO `settopbox` (`stb_number`, `stb_price`, `stb_status`) VALUES
('jguv', 76556, 'Damaged'),
('STB1234-5678-9012', 900, 'Assigned'),
('STB1234-5678-9013', 400, 'Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `subscribeforchannel`
--

CREATE TABLE `subscribeforchannel` (
  `subchan_id` int(11) DEFAULT NULL,
  `channel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribeforchannel`
--

INSERT INTO `subscribeforchannel` (`subchan_id`, `channel_id`) VALUES
(1, 19),
(3, 19),
(3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `subscribeforpackage`
--

CREATE TABLE `subscribeforpackage` (
  `subpack_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribeforpackage`
--

INSERT INTO `subscribeforpackage` (`subpack_id`, `package_id`) VALUES
(1, 3),
(3, 4),
(3, 5),
(7, 1),
(7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sub_id` int(11) NOT NULL,
  `sub_start_date` date DEFAULT NULL,
  `sub_end_date` date DEFAULT NULL,
  `sub_cust_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `sub_start_date`, `sub_end_date`, `sub_cust_id`) VALUES
(1, '2024-02-06', '2024-02-01', 'hrushiop9988@gmail.com'),
(2, '2024-02-21', '2024-03-21', 'hrushiop@gmail.com'),
(3, '2024-02-21', '2024-03-21', 'hrushiop@gmail.com'),
(4, '2024-02-21', '2024-03-21', 'sam@gmail.com'),
(7, '2024-02-24', '2024-03-24', 'sam@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`chan_id`),
  ADD KEY `chan_genre` (`chan_genre`),
  ADD KEY `chan_language` (`chan_language`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot_button`
--
ALTER TABLE `chatbot_button`
  ADD PRIMARY KEY (`cb_id`),
  ADD KEY `qt_id` (`qt_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `complaint_cust` (`complaint_cust`),
  ADD KEY `complaint_emp` (`complaint_emp`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_email`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_email`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indexes for table `installs`
--
ALTER TABLE `installs`
  ADD PRIMARY KEY (`installs_id`),
  ADD KEY `stb_number` (`stb_number`),
  ADD KEY `emp_email` (`emp_email`),
  ADD KEY `cust_email` (`cust_email`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `package_has_channel`
--
ALTER TABLE `package_has_channel`
  ADD KEY `phc_package_id` (`phc_package_id`),
  ADD KEY `phc_channel_id` (`phc_channel_id`);

--
-- Indexes for table `paidforrecharge`
--
ALTER TABLE `paidforrecharge`
  ADD KEY `paid_recharge_id` (`paid_recharge_id`),
  ADD KEY `paid_trans_id` (`paid_trans_id`);

--
-- Indexes for table `paidforsettopbox`
--
ALTER TABLE `paidforsettopbox`
  ADD KEY `Paid_stb_number` (`Paid_stb_number`),
  ADD KEY `paid_trans_id` (`paid_trans_id`);

--
-- Indexes for table `paidforsubscription`
--
ALTER TABLE `paidforsubscription`
  ADD KEY `paid_sub_id` (`paid_sub_id`),
  ADD KEY `paid_trans_id` (`paid_trans_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `pur_cust_id` (`pur_cust_id`);

--
-- Indexes for table `purchaseoffer`
--
ALTER TABLE `purchaseoffer`
  ADD KEY `pur_id` (`pur_id`),
  ADD KEY `off_offer_id` (`off_offer_id`);

--
-- Indexes for table `rechargeforsubscription`
--
ALTER TABLE `rechargeforsubscription`
  ADD PRIMARY KEY (`recharge_id`),
  ADD KEY `recharge_sub_id` (`recharge_sub_id`);

--
-- Indexes for table `settopbox`
--
ALTER TABLE `settopbox`
  ADD PRIMARY KEY (`stb_number`);

--
-- Indexes for table `subscribeforchannel`
--
ALTER TABLE `subscribeforchannel`
  ADD KEY `subchan_id` (`subchan_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `subscribeforpackage`
--
ALTER TABLE `subscribeforpackage`
  ADD KEY `subpack_id` (`subpack_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `sub_cust_id` (`sub_cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `chan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chatbot_button`
--
ALTER TABLE `chatbot_button`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `installs`
--
ALTER TABLE `installs`
  MODIFY `installs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rechargeforsubscription`
--
ALTER TABLE `rechargeforsubscription`
  MODIFY `recharge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_ibfk_1` FOREIGN KEY (`chan_genre`) REFERENCES `genre` (`gen_id`),
  ADD CONSTRAINT `channels_ibfk_2` FOREIGN KEY (`chan_language`) REFERENCES `language` (`lang_id`);

--
-- Constraints for table `chatbot_button`
--
ALTER TABLE `chatbot_button`
  ADD CONSTRAINT `chatbot_button_ibfk_1` FOREIGN KEY (`qt_id`) REFERENCES `chatbot` (`id`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`complaint_cust`) REFERENCES `customer` (`cust_email`),
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`complaint_emp`) REFERENCES `employee` (`emp_email`);

--
-- Constraints for table `installs`
--
ALTER TABLE `installs`
  ADD CONSTRAINT `installs_ibfk_1` FOREIGN KEY (`stb_number`) REFERENCES `settopbox` (`stb_number`),
  ADD CONSTRAINT `installs_ibfk_2` FOREIGN KEY (`emp_email`) REFERENCES `employee` (`emp_email`),
  ADD CONSTRAINT `installs_ibfk_3` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`cust_email`);

--
-- Constraints for table `package_has_channel`
--
ALTER TABLE `package_has_channel`
  ADD CONSTRAINT `package_has_channel_ibfk_1` FOREIGN KEY (`phc_package_id`) REFERENCES `packages` (`pack_id`),
  ADD CONSTRAINT `package_has_channel_ibfk_2` FOREIGN KEY (`phc_channel_id`) REFERENCES `channels` (`chan_id`);

--
-- Constraints for table `paidforrecharge`
--
ALTER TABLE `paidforrecharge`
  ADD CONSTRAINT `paidforrecharge_ibfk_1` FOREIGN KEY (`paid_recharge_id`) REFERENCES `rechargeforsubscription` (`recharge_id`),
  ADD CONSTRAINT `paidforrecharge_ibfk_2` FOREIGN KEY (`paid_trans_id`) REFERENCES `payment` (`transaction_id`);

--
-- Constraints for table `paidforsettopbox`
--
ALTER TABLE `paidforsettopbox`
  ADD CONSTRAINT `paidforsettopbox_ibfk_1` FOREIGN KEY (`Paid_stb_number`) REFERENCES `settopbox` (`stb_number`),
  ADD CONSTRAINT `paidforsettopbox_ibfk_2` FOREIGN KEY (`paid_trans_id`) REFERENCES `payment` (`transaction_id`);

--
-- Constraints for table `paidforsubscription`
--
ALTER TABLE `paidforsubscription`
  ADD CONSTRAINT `paidforsubscription_ibfk_1` FOREIGN KEY (`paid_sub_id`) REFERENCES `subscription` (`sub_id`),
  ADD CONSTRAINT `paidforsubscription_ibfk_2` FOREIGN KEY (`paid_trans_id`) REFERENCES `payment` (`transaction_id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`pur_cust_id`) REFERENCES `customer` (`cust_email`);

--
-- Constraints for table `purchaseoffer`
--
ALTER TABLE `purchaseoffer`
  ADD CONSTRAINT `purchaseoffer_ibfk_1` FOREIGN KEY (`pur_id`) REFERENCES `purchase` (`purchase_id`),
  ADD CONSTRAINT `purchaseoffer_ibfk_2` FOREIGN KEY (`off_offer_id`) REFERENCES `offer` (`offer_id`);

--
-- Constraints for table `rechargeforsubscription`
--
ALTER TABLE `rechargeforsubscription`
  ADD CONSTRAINT `rechargeforsubscription_ibfk_1` FOREIGN KEY (`recharge_sub_id`) REFERENCES `subscription` (`sub_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`sub_cust_id`) REFERENCES `customer` (`cust_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
