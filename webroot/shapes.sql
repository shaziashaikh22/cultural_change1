-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 10:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cultural_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `shapes`
--

CREATE TABLE `shapes` (
  `id` int(100) NOT NULL,
  `shape_name` varchar(100) DEFAULT NULL,
  `shape_image` varchar(10000) DEFAULT NULL,
  `width` varchar(100) DEFAULT '50',
  `height` varchar(100) DEFAULT '50',
  `shape_group_id` int(100) DEFAULT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `score` int(100) DEFAULT 100,
  `cutout_limit_r1` int(100) DEFAULT NULL,
  `score_round2` int(100) DEFAULT NULL,
  `cutout_limit_r2` int(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`id`, `shape_name`, `shape_image`, `width`, `height`, `shape_group_id`, `user_type_id`, `score`, `cutout_limit_r1`, `score_round2`, `cutout_limit_r2`, `created`, `modified`) VALUES
(299, 'Large Bed Room', 'Large Bed Room.png', '50px', '50px', 1, 3, 300, 3, 300, 2, '2022-04-18 07:30:41', '2022-04-18 07:30:41'),
(300, 'Large Living Room', 'Large Living Room.png', '50px', '50px', 1, 3, 0, 0, 200, 1, '2022-04-18 07:31:03', '2022-04-18 07:31:03'),
(301, 'Open kitchen and living room', 'Living with Kitchen.png', '80px', '50px', 1, 3, 200, 1, 0, 0, '2022-04-18 07:31:41', '2022-04-18 07:31:41'),
(302, 'Office', 'Office.png', '50px', '65px', 1, 3, 0, 0, 300, 1, '2022-04-18 07:32:10', '2022-04-18 07:32:10'),
(303, 'Small Bed Room', 'Small Bed Room.png', '40px', '60px', 1, 3, 0, 0, 0, 0, '2022-04-18 07:32:31', '2022-04-18 07:32:31'),
(304, 'Small Living Room', 'Small Living Room.png', '40px', '60px', 1, 3, 0, 0, 0, 0, '2022-04-18 07:32:48', '2022-04-18 07:32:48'),
(305, 'Kitchen', 'Kitchen.png', '50px', '70px', 1, 3, 0, 0, 200, 1, '2022-04-18 07:33:14', '2022-04-18 07:33:14'),
(306, 'corridor', 'corridor.png', '25px', '75px', 1, 3, 0, 0, 0, 0, '2022-04-18 07:33:36', '2022-04-18 07:33:36'),
(307, 'Bathroom with shower', 'bath with shower.png', '40px', '60px', 1, 3, 200, 1, 0, 0, '2022-04-18 07:33:57', '2022-04-18 07:33:57'),
(308, 'Bathroom with bathtub', 'bath with bathtub.png', '50px', '60px', 1, 3, 200, 1, 200, 1, '2022-04-18 07:34:15', '2022-04-18 07:34:15'),
(309, 'Window', 'Big window.png', '12px', '100px', 2, 2, 100, 5, 100, 5, '2022-04-18 07:38:39', '2022-04-18 07:38:39'),
(311, 'door', 'door.png', '40px', '40px', 3, 2, 250, 2, 300, 1, '2022-04-18 07:39:25', '2022-04-18 07:39:25'),
(313, 'sliding doors', 'sliding_doors.png', '14px', '150px', 3, 2, 100, 5, 100, 4, '2022-04-18 07:40:45', '2022-04-18 07:40:45'),
(314, 'tree1', 'tree_1.png', '40px', '40px', 4, 1, 50, 8, 60, 5, '2022-04-18 07:42:41', '2022-04-18 07:42:41'),
(315, 'tree2', 'tree_2.png', '40px', '40px', 4, 1, 50, 8, 60, 5, '2022-04-18 07:43:01', '2022-04-18 07:43:01'),
(316, 'tree3', 'tree_3.png', '40px', '40px', 4, 1, 50, 8, 60, 5, '2022-04-18 07:43:17', '2022-04-18 07:43:17'),
(317, 'plant1', 'plant_3.png', '40px', '40px', 4, 1, 50, 8, 0, 0, '2022-04-18 07:43:39', '2022-04-18 07:43:39'),
(318, 'plant2', 'plant_2.png', '40px', '40px', 4, 1, 50, 8, 0, 0, '2022-04-18 07:43:55', '2022-04-18 07:43:55'),
(319, 'plant3', 'plant_1.png', '40px', '40px', 4, 1, 50, 8, 0, 0, '2022-04-18 07:44:12', '2022-04-18 07:44:12'),
(320, 'bush1', 'bush_1.png', '40px', '40px', 9, 1, 30, 10, 0, 0, '2022-04-18 07:44:33', '2022-04-18 07:44:33'),
(321, 'bush2', 'bush_2.png', '40px', '40px', 9, 1, 30, 10, 0, 0, '2022-04-18 07:44:54', '2022-04-18 07:44:54'),
(322, 'bush3', 'bush_3.png', '40px', '40px', 9, 1, 30, 10, 0, 0, '2022-04-18 07:45:17', '2022-04-18 07:45:17'),
(323, 'Family swing', 'Family swing.png', '40px', '100px', 10, 1, 0, 0, 500, 1, '2022-04-18 07:46:13', '2022-04-18 07:46:13'),
(324, 'fountain', 'fountain.png', '60px', '60px', 10, 1, 0, 0, 500, 1, '2022-04-18 07:46:43', '2022-04-18 07:46:43'),
(325, 'pool', 'pool.png', '90px', '40px', 10, 1, 200, 1, 0, 0, '2022-04-18 07:47:15', '2022-04-18 07:47:15'),
(326, 'seesaw', 'seesaw.png', '90px', '25px', 10, 1, 50, 1, 0, 0, '2022-04-18 07:47:38', '2022-04-18 07:47:38'),
(328, 'slide', 'slide.png', '90px', '40px', 10, 1, 50, 1, 200, 1, '2022-04-18 07:48:31', '2022-04-18 07:48:31'),
(329, 'swing', 'swing.png', '60px', '90px', 10, 1, 50, 2, 0, 0, '2022-04-18 07:49:07', '2022-04-18 07:49:07'),
(330, 'carpet', 'carpet.png', '80px', '80px', 5, 4, 0, 0, 50, 4, '2022-04-18 07:56:38', '2022-04-18 07:56:38'),
(331, 'chair ', 'chair .png', '60px', '50px', 5, 4, 0, 0, 0, 0, '2022-04-18 07:57:03', '2022-04-18 07:57:03'),
(332, 'chair', 'chair.png', '60px', '50px', 5, 4, 0, 0, 0, 0, '2022-04-18 07:57:32', '2022-04-18 07:57:32'),
(333, 'sofa', 'sofa_1.png', '50px', '100px', 5, 4, 150, 2, 100, 1, '2022-04-18 07:57:57', '2022-04-18 07:57:57'),
(334, 'sofa', 'sofa_2.png', '50px', '100px', 5, 4, 150, 2, 100, 1, '2022-04-18 07:58:23', '2022-04-18 07:58:23'),
(335, 'double bed', 'double bed.png', '80px', '120px', 6, 4, 200, 1, 200, 1, '2022-04-18 07:59:30', '2022-04-18 07:59:30'),
(336, 'Standing lamp', 'lamp.png', '60px', '60px', 6, 4, 0, 0, 200, 1, '2022-04-18 07:59:54', '2022-04-18 07:59:54'),
(337, 'single bed', 'single bed.png', '60px', '110px', 6, 4, 200, 3, 200, 1, '2022-04-18 08:00:18', '2022-04-18 08:00:18'),
(338, 'study', 'study.png', '90px', '60px', 6, 4, 0, 0, 0, 0, '2022-04-18 08:00:57', '2022-04-18 08:00:57'),
(339, 'table', 'table.png', '50px', '35px', 6, 4, 0, 0, 200, 1, '2022-04-18 08:01:22', '2022-04-18 08:01:22'),
(340, 'Small dining table', 'Small dining.png', '80px', '80px', 7, 4, 0, 0, 400, 1, '2022-04-18 08:03:14', '2022-04-18 08:03:14'),
(341, 'Big dining table', 'Big dining.png', '60px', '90px', 7, 4, 200, 1, 0, 0, '2022-04-18 08:03:48', '2022-04-18 08:03:48'),
(342, 'night stand', 'night stand.png', '40px', '40px', 6, 4, 100, 2, 0, 0, '2022-06-20 07:52:33', '2022-06-20 07:52:33'),
(343, 'Double door', 'double_door.png', '10px', '60px', 3, 2, 0, 0, 300, 1, '2022-08-19 06:03:47', '2022-08-19 06:03:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key10` (`shape_group_id`),
  ADD KEY `foreign_key30` (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shapes`
--
ALTER TABLE `shapes`
  ADD CONSTRAINT `foreign_key10` FOREIGN KEY (`shape_group_id`) REFERENCES `shape_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
