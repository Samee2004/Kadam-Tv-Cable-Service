-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2024 at 06:47 PM
-- Server version: 10.5.21-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20887981_tv_cable_connection`
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
(14, 'Discovery Channel', 78, 8, '../assets/2125605931cf72529075e0ab2a98a016.webp', 3, 'SD');

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
(3, 'The Late Shri Annasaheb Vaze and his sons established the Kelkar Education Trust in 1979. This charitable Trust aims to reach out to all, irrespective of their standing in society, without any discrimination. Any voluntary donation to the Trust, is eligible for exemption under Section 80-G of the Income Tax Act, 1961.'),
(4, 'Professor (Dr.) Preeta Nilesh is a highly accomplished individual who serves as a college Principal, Head of the History Department, and Dean of Humanities and Social Sciences. With exceptional leadership skills, they effectively manage college administration, shape the curriculum of the history department, and coordinate various departments within the division. Their unwavering commitment to academic excellence and student success shines through their diverse range of responsibilities.');

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
(1, 'Tell me about the college', '3', 1),
(2, 'Tell me about the principal', '4', 1);

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
('hrushiop@gmail.com', '123456789', 'jgjy', 'khfgu', 'dhsvkj', '32', 'fkjdhgu', 'ghlrh', 'vglkre', '1234567890'),
('jdjznl@gmail.com', '123456789', 'Sam', 'Deep', 'Dam', '561', 'vvjsknc', 'jsdvlkx', '400042', '6789367829'),
('jef@gmail.com', 'qazxswedc', 'Ruchi', 'ahfou', 'jekhiu', 'b-21', 'hgut', 'kgut', '400042', '7539514560'),
('sam@gmail.com', 'qazxswedc', 'Samee', 'Deep', 'Damn', '21', 'mfvu', 'ad,khv', '400042', '7412589630'),
('sameekshakadam23@gmail.com', 'abc12345', 'sam', 'san', 'kam', 'ccb', 'vcvbls', 'hjfg', 'US', '1234567890'),
('samkk@gmail.com', 'qweasdzxc', 'Same', 'kvy', 'fkhv', '09', 'ekfkg', 'wkufgi', '400053', '9632587410');

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
('abc@gmail.com', '12345678', ',cxjv', 'fkgv', 'jh', 'jkg', 'hjf', 'ff', 'hjvf', '1234567890', 'a');

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
  `pack_validity_period` int(15) NOT NULL,
  `pack_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paidforpackage`
--

CREATE TABLE `paidforpackage` (
  `paid_subpack_id` int(11) DEFAULT NULL,
  `paid_trans_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paidforrechargepackage`
--

CREATE TABLE `paidforrechargepackage` (
  `paid_resubpack_id` int(11) DEFAULT NULL,
  `paid_trans_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `rechargeforpackage`
--

CREATE TABLE `rechargeforpackage` (
  `recharge_pack_id` int(11) NOT NULL,
  `recharge_sub_pack_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settopbox`
--

CREATE TABLE `settopbox` (
  `stb_number` varchar(25) NOT NULL,
  `stb_price` int(5) DEFAULT NULL,
  `stb_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribeforpackage`
--

CREATE TABLE `subscribeforpackage` (
  `subpack_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribepackage`
--

CREATE TABLE `subscribepackage` (
  `sub_pack_id` int(11) NOT NULL,
  `sub_start_date` date DEFAULT NULL,
  `sub_end_date` date DEFAULT NULL,
  `sub_cust_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `paidforpackage`
--
ALTER TABLE `paidforpackage`
  ADD KEY `paid_subpack_id` (`paid_subpack_id`),
  ADD KEY `paid_trans_id` (`paid_trans_id`);

--
-- Indexes for table `paidforrechargepackage`
--
ALTER TABLE `paidforrechargepackage`
  ADD KEY `paid_resubpack_id` (`paid_resubpack_id`),
  ADD KEY `paid_trans_id` (`paid_trans_id`);

--
-- Indexes for table `paidforsettopbox`
--
ALTER TABLE `paidforsettopbox`
  ADD KEY `Paid_stb_number` (`Paid_stb_number`),
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
-- Indexes for table `rechargeforpackage`
--
ALTER TABLE `rechargeforpackage`
  ADD PRIMARY KEY (`recharge_pack_id`),
  ADD KEY `recharge_sub_pack_id` (`recharge_sub_pack_id`);

--
-- Indexes for table `settopbox`
--
ALTER TABLE `settopbox`
  ADD PRIMARY KEY (`stb_number`);

--
-- Indexes for table `subscribeforpackage`
--
ALTER TABLE `subscribeforpackage`
  ADD KEY `subpack_id` (`subpack_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `subscribepackage`
--
ALTER TABLE `subscribepackage`
  ADD PRIMARY KEY (`sub_pack_id`),
  ADD KEY `sub_cust_id` (`sub_cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `chan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chatbot_button`
--
ALTER TABLE `chatbot_button`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `gen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `installs`
--
ALTER TABLE `installs`
  ADD CONSTRAINT `installs_ibfk_1` FOREIGN KEY (`stb_number`) REFERENCES `settopbox` (`stb_number`),
  ADD CONSTRAINT `installs_ibfk_2` FOREIGN KEY (`emp_email`) REFERENCES `employee` (`emp_email`),
  ADD CONSTRAINT `installs_ibfk_3` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`cust_email`);

--
-- Constraints for table `paidforpackage`
--
ALTER TABLE `paidforpackage`
  ADD CONSTRAINT `paidforpackage_ibfk_1` FOREIGN KEY (`paid_subpack_id`) REFERENCES `subscribepackage` (`sub_pack_id`),
  ADD CONSTRAINT `paidforpackage_ibfk_2` FOREIGN KEY (`paid_trans_id`) REFERENCES `payment` (`transaction_id`);

--
-- Constraints for table `paidforrechargepackage`
--
ALTER TABLE `paidforrechargepackage`
  ADD CONSTRAINT `paidforrechargepackage_ibfk_1` FOREIGN KEY (`paid_resubpack_id`) REFERENCES `rechargeforpackage` (`recharge_pack_id`),
  ADD CONSTRAINT `paidforrechargepackage_ibfk_2` FOREIGN KEY (`paid_trans_id`) REFERENCES `payment` (`transaction_id`);

--
-- Constraints for table `paidforsettopbox`
--
ALTER TABLE `paidforsettopbox`
  ADD CONSTRAINT `paidforsettopbox_ibfk_1` FOREIGN KEY (`Paid_stb_number`) REFERENCES `settopbox` (`stb_number`),
  ADD CONSTRAINT `paidforsettopbox_ibfk_2` FOREIGN KEY (`paid_trans_id`) REFERENCES `payment` (`transaction_id`);

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
-- Constraints for table `rechargeforpackage`
--
ALTER TABLE `rechargeforpackage`
  ADD CONSTRAINT `rechargeforpackage_ibfk_1` FOREIGN KEY (`recharge_sub_pack_id`) REFERENCES `subscribepackage` (`sub_pack_id`);

--
-- Constraints for table `subscribeforpackage`
--
ALTER TABLE `subscribeforpackage`
  ADD CONSTRAINT `subscribeforpackage_ibfk_1` FOREIGN KEY (`subpack_id`) REFERENCES `subscribepackage` (`sub_pack_id`),
  ADD CONSTRAINT `subscribeforpackage_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`pack_id`);

--
-- Constraints for table `subscribepackage`
--
ALTER TABLE `subscribepackage`
  ADD CONSTRAINT `subscribepackage_ibfk_1` FOREIGN KEY (`sub_cust_id`) REFERENCES `customer` (`cust_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
