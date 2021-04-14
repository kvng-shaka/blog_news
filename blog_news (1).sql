-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 09:52 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_users`
--

CREATE TABLE `blog_users` (
  `id` int(50) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_users`
--

INSERT INTO `blog_users` (`id`, `fullname`, `phone`, `email`, `username`, `password`) VALUES
(1, 'kvng zvlv', '09056643276', 'test@email.com', 'kvngshaka', 'kvngshakazulu'),
(2, 'kvng Shaka', '07034562898', 'test@email.com', 'jacks', 'lvddjckov'),
(3, 'daghghjsk kjkhgsxa', '07069716578', 'amber@roses.com', 'adafsf', 'asdefeg'),
(4, 'daghghjsk kjkhgsxa', '5636864546', 'dgdsfg@fdhbrtg.fgf', 'kvngshaka', 'opkimnjbhuygv'),
(5, 'Betty Sanders', '07069716578', 'test@email.com', 'dre', 'password'),
(6, 'Gigi Williams', '07034562898', 'w.gig@email.com', 'gigi', 'williams'),
(7, 'Ed Storm', '0806536253', 'storm.burna@gmail.com', 'Headies', 'awshbuiibfdbjdiufubd'),
(8, 'Happy Someone', '07076446573', 'test@gmail.com', 'Alan Walker', 'onmywayto yo mommahouse'),
(9, 'hi everyone', '23456789000', 'dwayne@mich.com', 'hi', 'hieveyone'),
(10, 'bnlkiivduhk inblvdsj', 'lkjnvudihk', 'lkjkuvjdfihv@jndkhi.ihc', 'ihcdbicui', 'jdbujcvbiucd'),
(11, 'Eldotc Vibz', '07066337276', 'eldotc@email.com', 'eldotc', 'lolade'),
(12, 'adeseasle', '08160180201', 'harsix009@gmail.com', 'oba_king', 'omobabalawo'),
(13, 'Liverpool LOST', '08076543218', 'lol@liverpool.com', 'canon', 'liverpool'),
(14, 'Ayodeji Adekunle', '07037949021', 'ayodejiadekunle@gmail.com', 'ayodesh12', 'qqqqqqqq');

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `id` int(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `body` varchar(10000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date_created` varchar(20) NOT NULL DEFAULT 'current_timestamp(6)',
  `date_edited` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`id`, `title`, `body`, `image`, `username`, `date_created`, `date_edited`) VALUES
(1, 'Motivational Speaker', 'kjcvjfvkvkjbkjivk kjkvf\r\nkdhvk[title]  sdfghj\r\n jkbkds   [body]  sdfghfhf\r\njdkvsd    [submit]  \r\nkndk    [imgUpload]  Array\r\n        (\r\njbkd.nld[name] 022.jpg\r\n       ,bdk     [type]  image/jpeg\r\n            [tmp_name]  C:xampp	mpphp3634.tmp\r\n        ,dvjks    [error]  0\r\n    ,jbkd        [size] 2299225\r\n        )kjklvudvhksndl', '', 'jacks', '0000-00-00 00:00:00.', '0000-00-00'),
(2, 'Motivational Speaker', 'kjcvjfvkvkjbkjivk kjkvf\r\nkdhvk[title]  sdfghj\r\n jkbkds   [body]  sdfghfhf\r\njdkvsd    [submit]  \r\nkndk    [imgUpload]  Array\r\n        (\r\njbkd.nld[name] 022.jpg\r\n       ,bdk     [type]  image/jpeg\r\n            [tmp_name]  C:xampptmpphp3634.tmp\r\n        ,dvjks    [error]  0\r\n    ,jbkd        [size] 2299225\r\n        )kjklvudvhksndl', '1145.jpg', 'kvngshaka', '0000-00-00 00:00:00.', '0000-00-00'),
(5, 'Implants', 'Populo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare theophrastus reprehendunt vel. Et commodo menandri eam.\r\nPopulo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare theophrastus reprehendunt vel. Et commodo menandri eam.\r\nPopulo tritani laboramus ex mei, no eum iuvaret ceteros euripidis, ne alia sadipscing mei. Te inciderint cotidieque pro, ei iisque docendi qui, ne accommodare theophrastus reprehendunt vel. Et commodo menandri eam.', '1037.jpg', 'Alan Walker', '0000-00-00 00:00:00.', '0000-00-00'),
(6, 'Motivational Speaker', 'kjcvjfvkvkjbkjivk kjkvf\r\nkdhvk[title]  sdfghj\r\n jkbkds   [body]  sdfghfhf\r\njdkvsd    [submit]  \r\nkndk    [imgUpload]  Array\r\n        (\r\njbkd.nld[name] 022.jpg\r\n       ,bdk     [type]  image/jpeg\r\n            [tmp_name]  C:xampptmpphp3634.tmp\r\n        ,dvjks    [error]  0\r\n    ,jbkd        [size] 2299225\r\n        )kjklvudvhksndl', '1145.jpg', 'gigi', '0000-00-00 00:00:00.', '0000-00-00'),
(7, 'hello THERE!!!', 'Checking the network cables, modem and router\r\nReconnecting to Wi-Fi\r\nRunning Windows Network Diagnostics', 'bit2.jpg', 'dre', '0000-00-00 00:00:00.', '0000-00-00'),
(8, 'Hello THERE!!!', 'Checking the network cables, modem and router\r\nReconnecting to Wi-Fi\r\nRunning Windows Network DiagnosticsChecking the network cables, modem and router\r\nReconnecting to Wi-Fi\r\nRunning Windows Network DiagnosticsChecking the network cables, modem and router\r\nReconnecting to Wi-Fi\r\nRunning Windows Network DiagnosticsChecking the network cables, modem and router\r\nReconnecting to Wi-Fi\r\nRunning Windows Network DiagnosticsChecking the network cables, modem and router\r\nReconnecting to Wi-Fi\r\nRunning Windows Network Diagnostics', 'cheetah.jpg', 'eldotc', '0000-00-00 00:00:00.', '2/29/2020 11:47:57'),
(9, 'Software development', 'i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!\r\ni just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!i just wanna be part of your symphony ,when you hold me tight and i let go..symphony!!', 'IMG_20200112_195416.jpg', 'hi', '0000-00-00 00:00:00.', '2/29/2020 12:34:00'),
(10, 'Mr Deji', 'kziucsndkhzxuhdjbk;snkblyhubisuvakkgvmjkuhybvkdzjsjnkkuhisbaklizaalkajkfurnkadjvb kbkfduyvbla', 'lion.jpg', 'oba_king', '0000-00-00 00:00:00.', '2/29/2020 13:30:52'),
(11, 'Watford 3-0 Liverpool: Liverpool unburdened as unbeaten run comes to end', 'As Jurgen Klopp tried to deliver his assessment of Liverpool shock Premier League defeat at Watford, he found himself having to speak louder than he probably would have liked. Despite the microphones and speakers set up in the press conference room within the bowels of Vicarage Road, the noise of celebrating Watford fans just outside was virtually drowning him out. Trent Alexander-Arnold, Virgil van Dijk, Dejan Lovren, Roberto Firmino, Andy Robertson, Liverpool Liverpool loss was the biggest margin of defeat for a side starting the day top of the Premier League since November 2015 But that is exactly what happened. We can just try to win football games again.', 'liverpool.jpg', 'canon', '3/1/2020 13:53:41', '3/1/2020 13:53:41'),
(12, 'The key questions in Sunday pivotal El Clasico', 'Neither team has looked particularly convincing this season, both have been hit by significant injury blows, and Real now have a Champions League home defeat to bounce back from, so there are plenty of uncertainties heading into a game that is likely to be tense and closely contested.', 'clasico.jpg', 'canon', '3/1/2020 13:58:54', '3/1/2020 13:58:54'),
(13, 'Tyson Fury v Deontay Wilder III before Olympics, July, says promoter Bob Arum', 'Deontay Wilder will fight Britain WBC heavyweight world champion Tyson Fury for a third time this summer, according to promoter Bob Arum.\r\n\r\nThe pair drew their first fight in 2018 and last weekend Fury stopped Wilder in the seventh round to win the title.\r\n\r\nThe American had 30 days to call a rematch and Arum, Fury US promoter, says he has been formally notified by Wilder team that they are doing so.', 'fury.jpg', 'kvngshaka', '3/1/2020 14:01:31', '3/1/2020 14:01:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_users`
--
ALTER TABLE `blog_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_users`
--
ALTER TABLE `blog_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
