-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 08:26 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buradio_quiz_dec2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `sl` varchar(5) CHARACTER SET utf8 NOT NULL,
  `que` text CHARACTER SET utf8 NOT NULL,
  `option1` varchar(222) CHARACTER SET utf8 NOT NULL,
  `option2` varchar(222) CHARACTER SET utf8 NOT NULL,
  `option3` varchar(222) CHARACTER SET utf8 NOT NULL,
  `option4` varchar(222) CHARACTER SET utf8 NOT NULL,
  `userans` varchar(5) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `sl`, `que`, `option1`, `option2`, `option3`, `option4`, `userans`) VALUES
(1, '১', 'শেখ মুজিবুর রহমানকে কত সালে \"বঙ্গবন্ধু\" উপাধিতে ভূষিত করা হয়?', '১৯৫২ সালের ২৩ এপ্রিল', '১৯৬৩ সালের ২৩ এপ্রিল', '১৯৬৩ সালের ২৩ ফেব্রুয়ারি', '১৯৬৯ সালের ২৩ ফেব্রুয়ারি', 'a1'),
(2, '২', 'বঙ্গবন্ধু কলকাতা ইসলামিয়া কলেজে বেকার হোস্টেলের কত নাম্বার কক্ষে থাকতেন? ', '২ নাম্বার', '৪ নাম্বার', '২১ নাম্বার', '২৪ নাম্বার', 'a2'),
(3, '৩', 'বাংলাদেশের ডাকটিকিটে প্রথমবারের মতো আমরা শহীদ বুদ্ধিজীবীদের পাই,', '১৪ ডিসেম্বর ১৯৯১', '১৪ ডিসেম্বর ১৯৯৩', '১৪ ডিসেম্বর ১৯৯৫', '১৪ ডিসেম্বর ২০০০', 'a3'),
(4, '৪', '\"ওয়ার ক্রাইমস ফ্যাক্টস ফাইন্ডিং কমিটি\"-র শনাক্তকৃত সারা দেশে বধ্যভূমির সংখ্যা কত?', '৯৪২টি', '৩৬৯টি', '৭৮৮টি', '৩২৭টি', 'a4'),
(5, '৫', '৬-দফার চতুর্থ দফায় কিসের দাবি উত্থাপন করা হয়?', 'মুদ্রা সংক্রান্ত', 'কর ধার্য্য সংক্রান্ত', 'শাসণ ক্ষমতা সংক্রান্ত', 'নিরাপত্তা সংক্রান্ত', 'a5'),
(6, '৬', 'মুক্তিযুদ্ধে সাহসিকতার জন্য দ্বিতীয় বীরত্বসূচক উপাধি কী?', 'বীরশ্রেষ্ঠ', 'বীর বিক্রম', 'বীর উত্তম', 'বীর প্রতীক', 'a6'),
(7, '৭', '১৯৭০ এর নির্বাচনে আওয়ামী লীগ কতটি আসন পায়?', '২৭৭', '২৮১', '২৯২', '২৮৮', 'a7'),
(8, '৮', 'জাতিসংঘের কত তম অধিবেশনে প্রথম কেউ বাংলায় ভাষণ দেন?', '১১ তম', '৩২ তম', '২৯ তম', '২৬ তম', 'a8'),
(9, '৯', 'মুক্তিবাহিনী গঠিত হয় কবে?', '১০ মার্চ', '১১ মার্চ', '১০ এপ্রিল', '১১ জুলাই', 'a9'),
(10, '১০', '\"এ দেশের মাটি চাই, মানুষ নয়\"- উক্তিটি কার?', 'জুলফিকার আলী  ভুট্টো', 'নুরুল আমীন', 'জেনারেল ইয়াহিয়া খান', 'মুহাম্মদ আলী জিন্নাহ', 'a10'),
(11, '১১', 'মুজিবনগর সরকারকে “গার্ড অব অনার” প্রদান করেন কে?', 'এম হোসেন আলী', 'মাহবুব উদ্দিন আহমেদ', 'মোশতাক আলী', 'ইউসুফ আলী', 'a11'),
(12, '১২', 'মুক্তিযুদ্ধের সংরক্ষিত স্থান \"শহীদ সাগর\" কোথায় অবস্থিত?', 'বরিশাল', 'রাজশাহী', 'যশোর', 'নাটোর', 'a12'),
(13, '১৩', 'মুক্তিযুদ্ধকালীন জাতিসংঘের মহাসচীব কে ছিলেন?', 'উ থান্ট', 'এন্তোনিও গুতারেস', 'বান কি মুন', 'ত্রিগভে হাভডেন লি', 'a13'),
(14, '১৪', 'মুজিবনগর সরকারের অস্থায়ী রাষ্ট্পতি ছিলেন কে?', 'এম মুনসুর আলী', 'শেখ মুজিবুর রহমান', 'তাজউদ্দিন আহমেদ', 'সৈয়দ নজরুল ইসলাম', 'a14');

-- --------------------------------------------------------

--
-- Table structure for table `quizallans`
--

CREATE TABLE `quizallans` (
  `id` int(11) NOT NULL,
  `ar1` text NOT NULL,
  `ar2` text NOT NULL,
  `ar3` text NOT NULL,
  `ar4` text NOT NULL,
  `ar5` text NOT NULL,
  `ar6` text NOT NULL,
  `ar7` text NOT NULL,
  `ar8` text NOT NULL,
  `ar9` text NOT NULL,
  `ar10` text NOT NULL,
  `ar11` text NOT NULL,
  `ar12` text NOT NULL,
  `ar13` text NOT NULL,
  `ar14` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizallans`
--

INSERT INTO `quizallans` (`id`, `ar1`, `ar2`, `ar3`, `ar4`, `ar5`, `ar6`, `ar7`, `ar8`, `ar9`, `ar10`, `ar11`, `ar12`, `ar13`, `ar14`) VALUES
(1, '4', '4', '1', '1', '2', '3', '4', '3', '4', '3', '2', '4', '1', '4');

-- --------------------------------------------------------

--
-- Table structure for table `quizans`
--

CREATE TABLE `quizans` (
  `id` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `a1` text NOT NULL,
  `a2` text NOT NULL,
  `a3` text NOT NULL,
  `a4` text NOT NULL,
  `a5` text NOT NULL,
  `a6` text NOT NULL,
  `a7` text NOT NULL,
  `a8` text NOT NULL,
  `a9` text NOT NULL,
  `a10` text NOT NULL,
  `a11` text NOT NULL,
  `a12` text NOT NULL,
  `a13` text NOT NULL,
  `a14` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `totalmarks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `step1` varchar(10) NOT NULL,
  `marks1` int(10) NOT NULL,
  `selectionround2` varchar(10) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  `marks2` int(10) NOT NULL,
  `selectionround3` varchar(10) NOT NULL,
  `time` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `marks3` int(10) NOT NULL,
  `questart` varchar(20) NOT NULL,
  `quend` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `id` int(11) NOT NULL,
  `timer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`id`, `timer`) VALUES
(1, '10:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option 1` (`option1`);

--
-- Indexes for table `quizallans`
--
ALTER TABLE `quizallans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizans`
--
ALTER TABLE `quizans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `quizallans`
--
ALTER TABLE `quizallans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizans`
--
ALTER TABLE `quizans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
