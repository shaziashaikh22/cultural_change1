-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 10:30 AM
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
-- Table structure for table `job_descriptions`
--

CREATE TABLE `job_descriptions` (
  `id` int(100) NOT NULL,
  `round_id` int(100) DEFAULT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `phase_id` int(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `project_info` text DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_descriptions`
--

INSERT INTO `job_descriptions` (`id`, `round_id`, `user_type_id`, `phase_id`, `description`, `project_info`, `status`, `created`, `modified`) VALUES
(1, 1, 1, 1, 'An American actress hired you as her gardener. Your job is to take care of your client’s backyard by planting bushes, plants and placing pet houses and playgrounds for the children. To meet your client’s requirements, draft a plan by using the shape and brush tool.', 'I’d like to have a spacious garden with a variety of total 8 plants and 8 trees. A minimum of 10 bushes to keep us surrounded with greenary. For my 3 children, I would like to install for them two single swings, one slide and a seesaw. However, to have some relaxing time with my husband, please ensure there is a pool  in the garden.', 'Active', '2022-01-20', '2022-01-20'),
(2, 1, 2, 1, 'An American actress hired you as her carpenter. Your job is to take care of the installation of the doors and windows. Please draw in the plan of the architect where you want to place the doors and windows, according to your client’s requirements. You will have the brush and shapes tool available for this purpose. \r\n\r\nYou will start planning the installation of the windows and doors in the house after the architect finished with the plan. After you, your teammates (gardener and interior designer) will follow sequentially. For the planning phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and tools to be more efficient, when it is your turn.\r\n\r\nMake sure to pass on all the relevant information to your teammates.', 'I would like to have a very luminous home. Therefore, a minimum of five windows needs to be installed in my home. Besides that, I want the doors of the rooms and bathrooms to be of slide doors. All entrances to the house should be with normal doors and  I need a direct access to the garden.', 'Active', '2022-01-20', '2022-01-20'),
(3, 1, 3, 1, 'An American actress hired you as her architect. Your job is to design the layout of the house. Make sure to define each room of the house. You can do so, by using the shape tools to draw the plan. \r\n\r\nYou will be the first to start planning the layout of the house. After you, your teammates (carpenter, gardener and interior designer) will follow sequentially. For the planning phase, you will get 3 minutes to put in your inputs. Afterwards, while you are waiting on your teammates, you can test the whiteboard and tools to be more efficient.\r\nMake sure to pass on all the relevant information to your teammates.', 'I need 3 spacious bedrooms. One for my husband and me, one for my two daughters and another one for my son. Besides that, we need two bathrooms: one with a shower and one with a bathtub. Lastly, a spacious living area with an open kitchen area.', 'Active', '2022-01-20', '2022-01-20'),
(4, 1, 4, 1, 'An American actress hired you as her interior designer. Your job is to decorate her home. You have various furniture available to do so. Use the shape tool to mark where you want to place each required furniture. \r\n\r\nYou will start planning the interior of the house as soon as the architect, carpenter and gardener finished with the planning. After you made your plan, the group can move on to the execution phase. For the planning phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and tools to be more efficient, when it is your turn.\r\n\r\nMake sure to pass on all the relevant information to your team mates.', 'For the parent bedroom, I would like to have a double bed and two nightstands. Furthermore, one single bed in my son’s bedroom and for the twins bedroom two single beds. As we are a family of five people, we definitely need two cozy sofas. In our open kitchen area, a big dining table would be very nice.', 'Active', '2022-01-20', '2022-01-20'),
(5, 1, 1, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place (plant/install) the bushes, plants, pet houses and playgrounds in the garden according to your plan.', 'I’d like to have a spacious garden with a variety of total 8 plants and 8 trees. A minimum of 10 bushes to keep us surrounded with greenary. For my 3 children, I would like to install for them two single swings, one slide and a seesaw. However, to have some relaxing time with my husband, please ensure there is a pool  in the garden.', 'Active', '2022-01-20', '2022-01-20'),
(6, 1, 2, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place (install) the windows and doors according to your plan in to the built walls.', 'I would like to have a very luminous home. Therefore, a minimum of five windows needs to be installed in my home. Besides that, I want the doors of the rooms and bathrooms to be of slide doors. All entrances to the house should be with normal doors and  I need a direct access to the garden.', 'Active', '2022-01-20', '2022-01-20'),
(7, 1, 3, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place (build) the pre-defined walls (rooms) according to your plan. \r\n\r\nFor the Execution phase, you will get 3 minutes to put in your inputs. \r\n\r\nSame as before, you will work with your teammates in a sequential manner in the same order.', 'I need 3 spacious bedrooms. One for my husband and me, one for my two daughters and another one for my son. Besides that, we need two bathrooms: one with a shower and one with a bathtub. Lastly, a spacious living area with an open kitchen area.', 'Active', '2022-01-20', '2022-01-20'),
(8, 1, 4, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place the furniture into the house according to your plan. Make sure to use the furniture that suits best to your client’s wishes.', 'For the parent bedroom, I would like to have a double bed and two nightstands. Furthermore, one single bed in my son’s bedroom and for the twins bedroom two single beds. As we are a family of five people, we definitely need two cozy sofas. In our open kitchen area, a big dining table would be very nice.', 'Active', '2022-01-20', '2022-01-20'),
(25, 2, 1, 1, 'A couple hired you as their gardener. Same as in the first round: Your job is to take care of your client’s backyard by planting bushes, plants and playgrounds for the children. To meet your client’s requirements, draft a plan by using the shape and brush tool. \r\n\r\nHowever, in this round you will work simultaneously on the whiteboard with the architect, carpenter and interior designer. Therefore you get 5 minutes in total to finalize your planning.\r\n\r\nMake sure to pass on all the relevant information to your teammates.', 'Gardener: We enjoy spending time outside and like to look at the nature. Make sure to plant at least five trees into our garden. We would like to have a small water fountain, as we love to listen to the sound of water. Besides that, our daughter would enjoy a slide in the garden. Finally, a family swing would also look beautiful in our garden.', 'Active', '2022-01-20', '2022-01-20'),
(26, 2, 2, 1, 'A couple hired you as their carpenter. Same as in the first round: Your job is to take care of the installation of the doors and windows. Please draw in the plan of the architect where you want to place the doors and windows, according to your client’s requirements. You will have the brush and shapes tool available for this purpose. \r\n\r\nHowever, in this round you will work simultaneously on the whiteboard with the architect, gardener and interior designer. Therefore you get 5 minutes in total to finalize your planning. \r\n\r\nMake sure to pass on all the relevant information to your team mates.', 'Carpenter: We want to have two entrances to the house, a double door as the main entrance and a door in the kitchen. All rooms inside the house should have sliding doors. Furthermore, we want to have a lot of light in the living room, so make sure to install a window here. Lastly , the bedrooms, office and kitchen should have windows too.', 'Active', '2022-01-20', '2022-01-20'),
(27, 2, 3, 1, 'A couple hired you as their architect. Same as in the first round: Your job is to design the layout of the house. Make sure to define each room of the house. You can do so, by using the shape tools to draw the plan. \r\n\r\nHowever, in this round you will work simultaneously on the whiteboard with the carpenter, gardener and interior designer. Therefore you get 5 minutes in total to finalize your planning.\r\n\r\nMake sure to pass on all the relevant information to your teammates.', 'Architect: We need two large bedrooms: one for us and another one for our daughter. As my husband works from home, he definitely needs an office. This means, in total three rooms. Moreover, we want to have one bathroom with a bathtub. Furthermore, we want to have the large living room separated from the kitchen. Lastly, the kitchen should have a door leading to the backyard.', 'Active', '2022-01-20', '2022-01-20'),
(28, 2, 4, 1, 'A couple hired you as their interior designer. Same as in the first round: Your job is to decorate her home. You have various furniture available to do so. Use the shape tool to mark where you want to place each required furniture. \r\n\r\nHowever, in this round you will work simultaneously on the whiteboard with the architect, carpenter and gardener. Therefore you get 5 minutes in total to finalize your planning.\r\n\r\nMake sure to pass on all the relevant information to your teammates.', 'Designer: We like cozy evenings with the family. Therefore, a nice big sofa would be great in the living room. I would like to have a double bed in our bedroom. Furthermore, one single bed in my daughter\'s bedroom .  Having a carpet in each room (excl. kitchen) would add vibrancy. Furthermore, we need a small dining table in the kitchen. Finally, my husband definitely needs a table in his office and a standing lamp.', 'Active', '2022-01-20', '2022-01-20'),
(29, 2, 1, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place (plant/install) the bushes, plants, pet houses and playgrounds in the garden according to your plan.', 'Gardener: We enjoy spending time outside and like to look at the nature. Make sure to plant at least five trees into our garden. We would like to have a small water fountain, as we love to listen to the sound of water. Besides that, our daughter would enjoy a slide in the garden. Finally, a family swing would also look beautiful in our garden.', 'Active', '2022-01-20', '2022-01-20'),
(30, 2, 2, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place (install) the windows and doors according to your plan in to the built walls.', 'Carpenter: We want to have two entrances to the house, a double door as the main entrance and a door in the kitchen. All rooms inside the house should have sliding doors. Furthermore, we want to have a lot of light in the living room, so make sure to install a window here. Lastly , the bedrooms, office and kitchen should have windows too.', 'Active', '2022-01-20', '2022-01-20'),
(31, 2, 3, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place (build) the pre-defined walls (rooms) according to your plan. \r\n\r\nHere again, you will all be working simultaneously in the execution phase. You will get 5 minutes in total to finalize the execution phase.', 'Architect: We need two large bedrooms: one for us and another one for our daughter. As my husband works from home, he definitely needs an office. This means, in total three rooms. Moreover, we want to have one bathroom with a bathtub. Furthermore, we want to have the large living room separated from the kitchen. Lastly, the kitchen should have a door leading to the backyard.', 'Active', '2022-01-20', '2022-01-20'),
(32, 2, 4, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place the furniture into the house according to your plan. Make sure to use the furniture that suits best to your client’s wishes. \r\n\r\nHere again, you will all be working simultaneously in the execution phase. You will get 5 minutes in total to finalize the execution phase.', 'Designer: We like cozy evenings with the family. Therefore, a nice big sofa would be great in the living room. I would like to have a double bed in our bedroom. Furthermore, one single bed in my daughter\'s bedroom .  Having a carpet in each room (excl. kitchen) would add vibrancy. Furthermore, we need a small dining table in the kitchen. Finally, my husband definitely needs a table in his office and a standing lamp.', 'Active', '2022-01-20', '2022-01-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_descriptions`
--
ALTER TABLE `job_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key20` (`round_id`),
  ADD KEY `foreign_key21` (`user_type_id`),
  ADD KEY `foreign_key22` (`phase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_descriptions`
--
ALTER TABLE `job_descriptions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_descriptions`
--
ALTER TABLE `job_descriptions`
  ADD CONSTRAINT `foreign_key20` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`),
  ADD CONSTRAINT `foreign_key21` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`),
  ADD CONSTRAINT `foreign_key22` FOREIGN KEY (`phase_id`) REFERENCES `phases` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
