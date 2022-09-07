-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 09:01 AM
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
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` int(100) NOT NULL,
  `access_name` varchar(100) DEFAULT NULL,
  `access_description` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `access_name`, `access_description`, `status`, `created`, `modified`) VALUES
(1, 'Trees, Bushes, Indoor and Outdoor Pots', 'Gardener can access this area.', 'True', '2021-11-18 10:00:11', '2021-11-18 12:03:48'),
(2, 'Doors and Windows', 'Carpenter can access this area.', 'Active', '2021-11-18 12:05:01', '2021-11-18 12:05:01'),
(3, 'Rooms', 'Architect only access rooms.', 'Active', '2021-11-18 12:05:31', '2021-11-18 12:05:31'),
(4, 'Living Area, Bedroom area, Kitchen, Dining area, Bath area', 'Interior designer only access this area.', 'Active', '2021-11-18 12:05:31', '2021-11-18 12:05:31');

-- --------------------------------------------------------

--
-- Table structure for table `game_steps`
--

CREATE TABLE `game_steps` (
  `id` int(100) NOT NULL,
  `step_name` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_steps`
--

INSERT INTO `game_steps` (`id`, `step_name`, `status`, `created`, `modified`) VALUES
(1, 'round1_phase1', 'active', '2022-02-24 10:30:34', '2022-02-24 10:30:34'),
(2, 'round1_phase2', 'active', '2022-02-24 10:30:34', '2022-02-24 10:30:34'),
(3, 'round2_phase1', 'active', '2022-02-24 10:30:34', '2022-02-24 10:30:34'),
(4, 'round2_phase1', 'active', '2022-02-24 10:30:34', '2022-02-24 10:30:34');

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
(1, 1, 1, 1, 'An American actress hired you as her gardener. Your job is to take care of your client’s backyard by planting bushes, plants and placing playgrounds for the children. To meet your client’s requirements, draft a plan by using the shape and brush tool. \r\nYou will start planning the garden as soon as the architect and carpenter finished with the planning. After you, the interior designer will finish up with the details. For the planning phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and tools to be more efficient, when it is your turn.\r\nMake sure to pass on all the relevant information to your teammates.\r\n', 'I’d like to have a spacious garden with a variety of plants. For my 3 children, I would like to install for them two swings, one slide and a seesaw. However, to have some relaxing time with my husband, please ensure there is a lake for swimming in the garden. Of course, therefore I need a direct access to the garden. \r\n', 'Active', '2022-01-20', '2022-01-20'),
(2, 1, 2, 1, 'An American actress hired you as her carpenter. Your job is to take care of the installation of the doors and windows. Please draw in the plan of the architect where you want to place the doors and windows, according to your client’s requirements. You will have the brush and shapes tool available for this purpose. \r\nYou will start planning the installation of the windows and doors in the house after the architect finished with the plan. After you, your teammates (gardener and interior designer) will follow sequentially. For the planning phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and tools to be more efficient, when it is your turn.', 'I would like to have a very luminous home. Therefore, a minimum of five windows needs to be installed in my home. Besides that, I want the doors of the rooms to be of slide doors. All entrances to the house should be with normal doors.', 'Active', '2022-01-20', '2022-01-20'),
(3, 1, 3, 1, 'An American actress hired you as her architect. Your job is to design the layout of the house. Make sure to define each room of the house. You can do so, by using the shape tools to draw the plan. \r\nYou will be the first to start planning the layout of the house. After you, your teammates (carpenter, gardener and interior designer) will follow sequentially.  For the planning phase, you will get 3 minutes to put in your inputs. Afterwards, while you are waiting on your teammates, you can test the whiteboard and tools to be more efficient, when it is your turn again. \r\nMake sure to pass on all the relevant information to your teammates.', 'I need 3 spacious bedrooms. One for my husband and me, one for my two daughters and another one for my son. Besides that, we need two bathrooms: one with a shower and one with a bathtub. Lastly, a spacious living area with an open kitchen area.', 'Active', '2022-01-20', '2022-01-20'),
(4, 1, 4, 1, 'An American actress hired you as her interior designer. Your job is to decorate her home. You have various furniture available to do so. Use the shape tool to mark where you want to place each required furniture. \r\nYou will start planning the interior of the house as soon as the architect, carpenter and gardener finished with the planning. After you made your plan, the group can move on to the execution phase.  For the planning phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and tools to be more efficient, when it is your turn.\r\nMake sure to pass on all the relevant information to your team mates.', 'For the parent bedroom, I would like to have a double bed and two nightstands. Furthermore, one single bed in my son’s bedroom and for the twin\'s bedroom two single beds. As we are a family of five people, we definitely need two cozy sofa\'s. As we have an open kitchen area, a big dining table would be very nice.', 'Active', '2022-01-20', '2022-01-20'),
(5, 1, 1, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. \r\nTo do so, use the given cutouts to place (plant/install) the bushes, plants and playgrounds in the garden according to your plan. \r\nFor the Execution phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, \r\nyou can test the whiteboard and cut outs to be more efficient, when it is your turn.\r\nSame as before, you will work with your teammates in a sequential manner in the same order\r\n', 'I’d like to have a spacious garden with a variety of plants. For my 3 children, I would like to install for them two swings, one slide and a seesaw.\r\n However, to have some relaxing time with my husband, please ensure there is a pool for swimming in the garden. \r\nOf course, therefore I need a direct access to the garden.', 'Active', '2022-01-20', '2022-01-20'),
(6, 1, 2, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place (install) the windows and doors according to your plan in to the built walls. \r\nFor the execution phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and cut outs to be more efficient, when it is your turn.\r\nSame as before, you will work with your teammates in a sequential manner in the same order.', 'I would like to have a very luminous home. Therefore, a minimum of five windows needs to be installed in my home. Besides that, I want the doors of the rooms to be of slide doors. All entrances to the house should be with normal doors.', 'Active', '2022-01-20', '2022-01-20'),
(7, 1, 3, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place (build) the pre-defined walls (rooms) according to your plan. \r\nFor the execution phase, you will get 3 minutes to put in your inputs. \r\nSame as before, you will work with your teammates in a sequential manner in the same order.', 'I need 3 spacious bedrooms. One for my husband and me, one for my two daughters and another one for my son. Besides that, we need two bathrooms: one with a shower and one with a bathtub. Lastly, a spacious living area with an open kitchen area.', 'Active', '2022-01-20', '2022-01-20'),
(8, 1, 4, 2, 'Now that you and your team has set up a plan to build your client’s dream home, it is time to move on to the execution phase. To do so, use the given cutouts to place the furniture into the house according to your plan. Make sure to use the furniture that suits best to your client’s wishes. \r\nFor the Execution phase, you will get 3 minutes to put in your inputs. While you are waiting on your teammates, you can test the whiteboard and cut outs to be more efficient, when it is your turn. Same as before, you will work with your teammates in a sequential manner in the same order.', 'For the parent bedroom, I would like to have a double bed and two nightstands. Furthermore, one single bed in my son’s bedroom and for the twin\'s bedroom two single beds. As we are a family of five people, we definitely need two cozy sofa\'s. As we have an open kitchen area, a big dining table would be very nice.', 'Active', '2022-01-20', '2022-01-20'),
(25, 2, 1, 1, 'A couple hired you as their gardener. Same as in the first round: Your job is to take care of your client’s backyard by planting bushes, plants and placing playgrounds for the children. To meet your client’s requirements, draft a plan by using the shape and brush tool. \r\nHowever, in this round you will work simultaneously on the whiteboard with the architect, carpenter and interior designer. Therefore you get 5 minutes in total to finalize your planning.\r\nMake sure to pass on all the relevant information to your teammates.', 'We enjoy spending time outside and like to look at the nature. Make sure to plant at least five trees into our garden. We would like to have a small water fountain, as we love to listen to the sound of water. Besides that, our daughter would enjoy a slide in the garden. Finally, a family swing would also look beautiful in our garden.', 'Active', '2022-01-20', '2022-01-20'),
(26, 2, 2, 1, 'A couple hired you as their carpenter. Same as in the first round: Your job is to take care of the installation of the doors and windows. Please draw in the plan of the architect where you want to place the doors and windows, according to your client’s requirements. You will have the brush and shapes tool available for this purpose. \r\nHowever, in this round you will work simultaneously on the whiteboard with the architect, gardener and interior designer. Therefore you get 5 minutes in total to finalize your planning. \r\nMake sure to pass on all the relevant information to your team mates.', 'We want to have two entrances to the house one in the corridor and one in the kitchen. All rooms should have slide doors. Furthermore, we want to have a lot of light in the living room, so make sure to install big windows.', 'Active', '2022-01-20', '2022-01-20'),
(27, 2, 3, 1, 'A couple hired you as their architect. Same as in the first round: Your job is to design the layout of the house. Make sure to define each room of the house. You can do so, by using the shape tools to draw the plan. \r\nHowever, in this round you will work simultaneously on the whiteboard with the carpenter, gardener and interior designer. Therefore you get 5 minutes in total to finalize your planning.\r\nMake sure to pass on all the relevant information to your teammates.', 'We need two bedrooms: one for us and another one for our daughter. As my husband works from home, he definitely needs an office. This means, in total three rooms. Moreover, we want to have a bathroom between the two bedrooms. Furthermore, we want to have the living room separated from the kitchen. Lastly, the kitchen should have a door leading to the backyard.', 'Active', '2022-01-20', '2022-01-20'),
(28, 2, 4, 1, 'A couple hired you as their interior designer. Same as in the first round: Your job is to decorate her home. You have various furniture available to do so. Use the shape tool to mark where you want to place each required furniture. \r\nHowever, in this round you will work simultaneously on the whiteboard with the architect, carpenter and gardener. Therefore you get 5 minutes in total to finalize your planning.\r\nMake sure to pass on all the relevant information to your teammates.', 'We like cozy evenings with the family. Therefore, a nice big sofa would be great in the living room. Having some carpets and rugs would add vibrancy to all the rooms. Furthermore, we need a small dining table in the kitchen. Besides that, a bathtub in the bathroom is a must. Finally, my husband definitely needs a table in his office and a standing lamp.', 'Active', '2022-01-20', '2022-01-20'),
(29, 2, 1, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place (plant/install) the bushes, plants and playgrounds in the garden according to your plan. \r\nHere again, you will all be working simultaneously in the execution phase. You will get 5 minutes in total to finalize the execution phase.', 'We enjoy spending time outside and like to look at the nature. Make sure to plant at least five trees into our garden. We would like to have a small water fountain, as we love to listen to the sound of water. Besides that, our daughter would enjoy a slide in the garden. Finally, a family swing would also look beautiful in our garden.', 'Active', '2022-01-20', '2022-01-20'),
(30, 2, 2, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place (install) the windows and doors according to your plan in to the built walls. \r\nHere again, you will all be working simultaneously in the execution phase. You will get 5 minutes in total to finalize the execution phase.', 'We want to have two entrances to the house one in the corridor and one in the kitchen. All rooms should have slide doors. Furthermore, we want to have a lot of light in the living room, so make sure to install big windows.', 'Active', '2022-01-20', '2022-01-20'),
(31, 2, 3, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place (build) the pre-defined walls (rooms) according to your plan. \r\nHere again, you will all be working simultaneously in the execution phase. You will get 5 minutes in total to finalize the execution phase.', 'We need two bedrooms: one for us and another one for our daughter. As my husband works from home, he definitely needs an office. This means, in total three rooms. Moreover, we want to have a bathroom between the two bedrooms. Furthermore, we want to have the living room separated from the kitchen. Lastly, the kitchen should have a door leading to the backyard.', 'Active', '2022-01-20', '2022-01-20'),
(32, 2, 4, 2, 'Same as in the first round: It’s time to build your client’s dream home with your teammates. To do so, use the given cutouts to place the furniture into the house according to your plan. Make sure to use the furniture that suits best to your client’s wishes. \r\nHere again, you will all be working simultaneously in the execution phase. You will get 5 minutes in total to finalize the execution phase.', 'We like cozy evenings with the family. Therefore, a nice big sofa would be great in the living room. Having some carpets and rugs would add vibrancy to all the rooms. Furthermore, we need a small dining table in the kitchen. Besides that, a bathtub in the bathroom is a must. Finally, my husband definitely needs a table in his office and a standing lamp.', 'Active', '2022-01-20', '2022-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `login_for_matches`
--

CREATE TABLE `login_for_matches` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL COMMENT 'FK - users',
  `online_game_id` int(100) DEFAULT NULL COMMENT 'FK - online_games',
  `round_id` int(100) DEFAULT NULL COMMENT 'FK - rounds',
  `phase_id` int(100) DEFAULT NULL COMMENT 'FK- phases',
  `gamecode` varchar(100) DEFAULT NULL,
  `round_number` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `game_status` varchar(100) DEFAULT NULL,
  `waiting_screen` int(100) DEFAULT 0,
  `start_time` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_for_matches`
--

INSERT INTO `login_for_matches` (`id`, `user_id`, `online_game_id`, `round_id`, `phase_id`, `gamecode`, `round_number`, `status`, `game_status`, `waiting_screen`, `start_time`, `created`, `modified`) VALUES
(391, 9, 9, 2, 2, 'LUlgUt', 2, 'Completed', '', NULL, '18-07-22 02:46:17', '2022-07-08', '2022-07-08'),
(394, 10, 9, 2, 1, 'LUlgUt', 2, 'In Progress', '', NULL, NULL, '2022-07-20', '2022-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `new_surveys`
--

CREATE TABLE `new_surveys` (
  `id` int(100) NOT NULL,
  `survey_title` varchar(500) DEFAULT NULL,
  `survey_question` varchar(1000) DEFAULT NULL,
  `survey_answer` varchar(1000) DEFAULT NULL,
  `survey_description` varchar(10000) DEFAULT NULL,
  `survey_status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_surveys`
--

INSERT INTO `new_surveys` (`id`, `survey_title`, `survey_question`, `survey_answer`, `survey_description`, `survey_status`, `created`, `modified`) VALUES
(4, '', 'Did you have all the necessary information available to do your job in round 1 ?', '', '', '', '2021-12-09', '2021-12-16'),
(5, '', 'Did you have them in round 2 ?', '', '', '', '2021-12-09', '2021-12-16'),
(6, NULL, 'test question', NULL, NULL, NULL, '2021-12-09', '2021-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `online_games`
--

CREATE TABLE `online_games` (
  `id` int(100) NOT NULL,
  `game_name` varchar(100) DEFAULT NULL,
  `game_players_allowed` varchar(100) DEFAULT NULL,
  `players_turn` int(100) DEFAULT 1 COMMENT '1st turn is for architect, when architect turn over this field will update for second player id i.e for carpenter',
  `survey_id` int(100) DEFAULT NULL,
  `shape_group_id` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `online_games`
--

INSERT INTO `online_games` (`id`, `game_name`, `game_players_allowed`, `players_turn`, `survey_id`, `shape_group_id`, `status`, `start_time`, `created`, `modified`) VALUES
(1, 'test', '10', 3, NULL, NULL, 'active', '07:30', '2021-11-18 11:06:42', '2021-11-18 11:06:42'),
(2, 'hEc8yp', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-04 06:45:28', '2022-01-04 06:45:28'),
(3, '8mHYQp', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-04 06:49:13', '2022-01-04 06:49:13'),
(4, 'JqECEp', '4', 2, NULL, NULL, 'active', '02:00', '2022-01-04 10:15:35', '2022-01-04 10:15:35'),
(5, 'F7Ex2r', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-04 10:18:38', '2022-01-04 10:18:38'),
(6, 'Rg6ngq', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-04 11:41:21', '2022-01-04 11:41:21'),
(7, 'tHHPbI', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-04 12:11:24', '2022-01-04 12:11:24'),
(8, 'wIdejS', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-11 11:22:57', '2022-01-11 11:22:57'),
(9, 'LUlgUt', '6', 3, NULL, NULL, 'active', '04:00', '2022-01-11 11:23:49', '2022-01-11 11:23:49'),
(10, 'FEjFDK', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-13 08:04:25', '2022-01-13 08:04:25'),
(11, 'FqwIGM', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-13 09:08:08', '2022-01-13 09:08:08'),
(12, '1qcoG0', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-13 09:10:28', '2022-01-13 09:10:28'),
(13, 'F6anCk', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-18 19:07:21', '2022-01-18 19:07:21'),
(14, 'tLueEH', '4', 3, NULL, NULL, 'active', '02:00', '2022-01-18 19:08:16', '2022-01-18 19:08:16'),
(15, '6MbMkd', '4', 3, NULL, NULL, 'Active', '04:00', '2022-03-01 06:27:49', '2022-03-01 06:27:49'),
(16, '5uJeRZ', '4', 3, NULL, NULL, 'Active', '04:00', '2022-03-12 06:48:18', '2022-03-12 06:48:19');

-- --------------------------------------------------------

--
-- Table structure for table `online_game_histories`
--

CREATE TABLE `online_game_histories` (
  `id` int(100) NOT NULL,
  `online_game_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `score` int(100) DEFAULT NULL,
  `first_round_data` varchar(1000) DEFAULT NULL,
  `second_round_data` varchar(1000) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` int(100) NOT NULL,
  `phase_name` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `phase_name`, `status`, `created`, `modified`) VALUES
(1, 'Phase 1', 'Active', '2022-01-20', '2022-01-20'),
(2, 'Phase 2', 'Active', '2022-01-20', '2022-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `player_survey_answers`
--

CREATE TABLE `player_survey_answers` (
  `id` int(100) NOT NULL,
  `player_survey_question_id` int(100) DEFAULT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `game_name` varchar(100) DEFAULT NULL,
  `answer_txt` varchar(1000) DEFAULT NULL,
  `online_game_id` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `player_survey_questions`
--

CREATE TABLE `player_survey_questions` (
  `id` int(100) NOT NULL,
  `question_txt` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_survey_questions`
--

INSERT INTO `player_survey_questions` (`id`, `question_txt`, `status`, `created`, `modified`) VALUES
(1, 'Did you have all the necessary information available to do your job in round 1?', NULL, NULL, NULL),
(2, 'Did you have them in round 2?', NULL, NULL, NULL),
(3, 'Did it help you to work in parallel in the second round?', NULL, NULL, NULL),
(4, 'Do you think round 2 was quicker to accomplish?', NULL, NULL, NULL),
(5, 'If yes, why?', NULL, NULL, NULL),
(6, 'Did you perceive the information flow in round 2 as more efficient?', NULL, NULL, NULL),
(7, 'Where do you see the main difference between round 1 and 2, regarding the output?', NULL, NULL, NULL),
(8, 'What learning can you take from this game?', NULL, NULL, NULL),
(9, 'Where do you see the benefit for yourself in round 2?', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(100) NOT NULL,
  `question_type` varchar(100) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `answer` varchar(500) DEFAULT NULL,
  `question_group_id` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_type`, `description`, `answer`, `question_group_id`, `status`, `created`, `modified`) VALUES
(1, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'test2', 1, 'Enable', '2021-11-18 11:29:01', '2021-11-18 11:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `question_groups`
--

CREATE TABLE `question_groups` (
  `id` int(100) NOT NULL,
  `question_group_name` varchar(100) DEFAULT NULL,
  `question_group_description` varchar(10000) DEFAULT NULL,
  `question_status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_groups`
--

INSERT INTO `question_groups` (`id`, `question_group_name`, `question_group_description`, `question_status`, `created`, `modified`) VALUES
(1, 'abc', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Disable', '2021-11-18 11:25:22', '2021-11-18 11:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(100) NOT NULL,
  `date` date DEFAULT NULL,
  `game_code` varchar(100) DEFAULT NULL,
  `no_of_users` int(100) DEFAULT NULL,
  `outcome` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `date`, `game_code`, `no_of_users`, `outcome`, `status`, `created`, `modified`) VALUES
(1, '2021-11-26', 'h8h34bh', 5, '', '', '2021-11-26', '2021-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `game_step_id` int(100) DEFAULT NULL,
  `round_id` int(100) DEFAULT NULL,
  `phase_id` int(100) DEFAULT NULL,
  `game_code` varchar(100) DEFAULT NULL,
  `score` int(100) DEFAULT NULL,
  `given_time` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `end_time` varchar(100) DEFAULT NULL,
  `canvas_image` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `user_type_id`, `game_step_id`, `round_id`, `phase_id`, `game_code`, `score`, `given_time`, `start_time`, `end_time`, `canvas_image`, `date`, `status`, `created`, `modified`) VALUES
(658, 15, 3, 4, 2, 2, 'LUlgUt', 0, '03:00', NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA+gAAAI6CAYAAAC0ImJ0AAAAAXNSR0IArs4c6QAAIABJREFUeF7t1zERAAAIAzHwbxoZ/BAU9FKW7jgCBAgQIECAAAECBAgQIEDgXWDfEwhAgAABAgQIECBAgAABAgQIjIHuCQgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgABcK4T0AAAMN0lEQVQBAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBwe1QI77F0BAgAAAABJRU5ErkJggg==', '2022-07-19', 'Completed', '2022-07-19 13:24:30', '2022-07-19 01:25:01'),
(660, 10, 4, 4, 2, 2, 'LUlgUt', 0, '03:00', NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA+gAAAI6CAYAAAC0ImJ0AAAAAXNSR0IArs4c6QAAIABJREFUeF7t1zERAAAIAzHwbxoZ/BAU9FKW7jgCBAgQIECAAAECBAgQIEDgXWDfEwhAgAABAgQIECBAgAABAgQIjIHuCQgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgABcK4T0AAAMN0lEQVQBAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBjofoAAAQIECBAgQIAAAQIECAQEDPRACSIQIECAAAECBAgQIECAAAED3Q8QIECAAAECBAgQIECAAIGAgIEeKEEEAgQIECBAgAABAgQIECBgoPsBAgQIECBAgAABAgQIECAQEDDQAyWIQIAAAQIECBAgQIAAAQIEDHQ/QIAAAQIECBAgQIAAAQIEAgIGeqAEEQgQIECAAAECBAgQIECAgIHuBwgQIECAAAECBAgQIECAQEDAQA+UIAIBAgQIECBAgAABAgQIEDDQ/QABAgQIECBAgAABAgQIEAgIGOiBEkQgQIAAAQIECBAgQIAAAQIGuh8gQIAAAQIECBAgQIAAAQIBAQM9UIIIBAgQIECAAAECBAgQIEDAQPcDBAgQIECAAAECBAgQIEAgIGCgB0oQgQABAgQIECBAgAABAgQIGOh+gAABAgQIECBAgAABAgQIBAQM9EAJIhAgQIAAAQIECBAgQIAAAQPdDxAgQIAAAQIECBAgQIAAgYCAgR4oQQQCBAgQIECAAAECBAgQIGCg+wECBAgQIECAAAECBAgQIBAQMNADJYhAgAABAgQIECBAgAABAgQMdD9AgAABAgQIECBAgAABAgQCAgZ6oAQRCBAgQIAAAQIECBAgQICAge4HCBAgQIAAAQIECBAgQIBAQMBAD5QgAgECBAgQIECAAAECBAgQMND9AAECBAgQIECAAAECBAgQCAgY6IESRCBAgAABAgQIECBAgAABAga6HyBAgAABAgQIECBAgAABAgEBAz1QgggECBAgQIAAAQIECBAgQMBA9wMECBAgQIAAAQIECBAgQCAgYKAHShCBAAECBAgQIECAAAECBAgY6H6AAAECBAgQIECAAAECBAgEBAz0QAkiECBAgAABAgQIECBAgAABA90PECBAgAABAgQIECBAgACBgICBHihBBAIECBAgQIAAAQIECBAgYKD7AQIECBAgQIAAAQIECBAgEBAw0AMliECAAAECBAgQIECAAAECBAx0P0CAAAECBAgQIECAAAECBAICBnqgBBEIECBAgAABAgQIECBAgICB7gcIECBAgAABAgQIECBAgEBAwEAPlCACAQIECBAgQIAAAQIECBAw0P0AAQIECBAgQIAAAQIECBAICBjogRJEIECAAAECBAgQIECAAAECBrofIECAAAECBAgQIECAAAECAQEDPVCCCAQIECBAgAABAgQIECBAwED3AwQIECBAgAABAgQIECBAICBgoAdKEIEAAQIECBAgQIAAAQIECBwe1QI77F0BAgAAAABJRU5ErkJggg==', '2022-07-19', 'Completed', '2022-07-19 13:26:34', '2022-07-20 01:38:10');
INSERT INTO `results` (`id`, `user_id`, `user_type_id`, `game_step_id`, `round_id`, `phase_id`, `game_code`, `score`, `given_time`, `start_time`, `end_time`, `canvas_image`, `date`, `status`, `created`, `modified`) VALUES
(662, 10, 4, 2, 1, 2, 'LUlgUt', 200, '03:00', NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA+gAAAI6CAYAAAC0ImJ0AAAAAXNSR0IArs4c6QAAIABJREFUeF7t3Xu0pWddH/Dfu88+c2GSITOZ3EhCEggIROQSICAV46UKFDGJMaKt2vYPu4patbWt/iNp61povVBjg9qLdlW76gJEbkpTlBguhtAYLgFEyI1MQjKZkLmf69777XrfvfeZM5O5nTMzZ57n2Z+zCJOZ7LPf3/P5PrPO+Z733e+uwgcBAgQIECBAgAABAgQIECBwxgWqMz6BAQgQIECAAAECBAgQIECAAIFQ0G0CAgQIECBAgAABAgQIECCQgICCnkAIRiBAgAABAgQIECBAgAABAgq6PUCAAAECBAgQIECAAAECBBIQUNATCMEIBAgQIECAAAECBAgQIEBAQbcHCBAgQIAAAQIECBAgQIBAAgIKegIhGIEAAQIECBAgQIAAAQIECCjo9gABAgQIECBAgAABAgQIEEhAQEFPIAQjECBAgAABAgQIECBAgAABBd0eIECAAAECBAgQIECAAAECCQgo6AmEYAQCBAgQIECAAAECBAgQIKCg2wMECBAgQIAAAQIECBAgQCABAQU9gRCMQIAAAQIECBAgQIAAAQIEFHR7gAABAgQIECBAgAABAgQIJCCgoCcQghEIECBAgAABAgQIECBAgICCbg8QIECAAAECBAgQIECAAIEEBBT0BEIwAgECBAgQIECAAAECBAgQUNDtAQIECBAgQIAAAQIECBAgkICAgp5ACEYgQIAAAQIECBAgQIAAAQIKuj1AgAABAgQIECBAgAABAgQSEFDQEwjBCAQIECBAgAABAgQIECBAQEG3BwgQIECAAAECBAgQIECAQAICCnoCIRiBAAECBAgQIECAAAECBAgo6PYAAQIECBAgQIAAAQIECBBIQEBBTyAEIxAgQIAAAQIECBAgQIAAAQXdHiBAgAABAgQIECBAgAABAgkIKOgJhGAEAgQIECBAgAABAgQIECCgoNsDBAgQIECAAAECBAgQIEAgAQEFPYEQjECAAAECBAgQIECAAAECBBR0e4AAAQIECBAgQIAAAQIECCQgoKAnEIIRCBAgQIAAAQIECBAgQICAgm4PECBAgAABAgQIECBAgACBBAQU9ARCMAIBAgQIECBAgAABAgQIEFDQ7QECBAgQIECAAAECBAgQIJCAgIKeQAhGIECAAAECBAgQIECAAAECCro9QIAAAQIECBAgQIAAAQIEEhBQ0BMIwQgECBAgQIAAAQIECBAgQEBBtwcIECBAgAABAgQIECBAgEACAgp6AiEYgQABAgQIECBAgAABAgQIKOj2AAECBAgQIECAAAECBAgQSEBAQU8gBCMQIECAAAECBAgQIECAAAEF3R4gQIAAAQIECBAgQIAAAQIJCCjoCYRgBAIECBAgQIAAAQIECBAgoKDbAwQIECBAgAABAgQIECBAIAEBBT2BEIxAgAABAgQIECBAgAABAgQUdHuAAAECBAgQIECAAAECBAgkIKCgJxCCEQgQIECAAAECBAgQIECAgIJuDxAgQIAAAQIECBAgQIAAgQQEFPQEQjACAQIECBAgQIAAAQIECBBQ0O0BAgQIECBAgAABAgQIECCQgICCnkAIRiBAgAABAgQIECBAgAABAgq6PUCAAAECBAgQIECAAAECBBIQUNATCMEIBAgQIECAAAECBAgQIEBAQbcHCBAgQIAAAQIECBAgQIBAAgIKegIhGIEAAQIECBAgQIAAAQIECCjo9gABAgQIECBAgAABAgQIEEhAQEFPIAQjECBAgAABAgQIECBAgAABBd0eIECAAAECBAgQIECAAAECCQgo6AmEYAQCBAgQIECAAAECBAgQIKCg2wMECBAgQIAAAQIECBAgQCABAQU9gRCMQIAAAQIECBAgQIAAAQIEFHR7gAABAgQIECBAgAABAgQIJCCgoCcQghEIECBAgAABAgQIECBAgICCbg8QIECAAAECBAgQIECAAIEEBBT0BEIwAgECBAgQIECAAAECBAgQUNDtAQIECBAgQIAAAQIECBAgkICAgp5ACEYgQIAAAQIECBAgQIAAAQIKuj1AgAABAgQIECBAgAABAgQSEFDQEwjBCAQIECBAgAABAgQIECBAQEG3BwgQIECAAAECBAgQIECAQAICCnoCIRiBAAECBAgQIECAAAECBAgo6PYAAQIECBAgQIAAAQIECBBIQEBBTyAEIxAgQIAAAQIECBAgQIAAAQXdHiBAgAABAgQIECBAgAABAgkIKOgJhGAEAgQIECBAgAABAgQIECCgoNsDBAgQIECAAAECBAgQIEAgAQEFPYEQjECAAAECBAgQIECAAAECBBR0e4AAAQIECBAgQIAAAQIECCQgoKAnEIIRCBAgQIAAAQIECBAgQICAgm4PECBAgAABAgQIECBAgACBBAQU9ARCMAIBAgQIECBAgAABAgQIEFDQ7QECBAgQIECAAAECBAgQIJCAgIKeQAhGIECAAAECBAgQIECAAAECCro9QIAAAQIECBAgQIAAAQIEEhBQ0BMIwQgECBAgQIAAAQIECBAgQEBBtwcIECBAgAABAgQIECBAgEACAgp6AiEYgQABAgQIECBAgAABAgQIKOj2AAECBAgQIECAAAECBAgQSEBAQU8gBCMQIECAAAECBAgQIECAAAEF3R4gQIAAAQIECBAgQIAAAQIJCCjoCYRgBAIECBAgQIAAAQIECBAgoKDbAwQIECBAgAABAgQIECBAIAEBBT2BEIxAgAABAgQIECBAgAABAgQUdHuAAAECBAgQIECAAAECBAgkIKCgJxCCEQgQIECAAAECBAgQIECAgIJuDxAgQIAAAQIECBAgQIAAgQQEFPQEQjACAQIECBAgQIAAAQIECBBQ0O0BAgQIECBAgAABAgQIECCQgICCnkAIRiBAgAABAgQIECBAgAABAgq6PUCAAAECBAgQIECAAAECBBIQUNATCMEIBAgQIECAAAECBAgQIEBAQbcHCBAgQIAAAQIECBAgQIBAAgIKegIhGIEAAQIECBAgQIAAAQIECCjo9gABAgQIECBAgAABAgQIEEhAQEFPIAQjECBAgAABAgQIECBAgAABBd0eIECAAAECBAgQIECAAAECCQgo6AmEYAQCBAgQIECAAAECBAgQIKCg2wMECBAgQIAAAQIECBAgQCABAQU9gRCMQIAAAQIECBAgQIAAAQIEFHR7gAABAgQIECBAgAABAgQIJCCgoCcQghEIECBAgAABAgQIECBAgICCbg8QIECAAAECBAgQIECAAIEEBBT0BEIwAgECBAgQIECAAAECBAgQUNDtAQIECBAgQIAAAQIECBAgkICAgp5ACEYgQIAAAQIECBAgQIAAAQIKuj1AgAABAgQIECBAgAABAgQSEFDQEwjBCAQIECBAgAABAgQIECBAQEG3BwgQIECAAAECBAgQIECAQAICCnoCIRiBAAECBAgQIECAAAECBAgo6PYAAQIECBAgQIAAAQIECBBIQEBBTyAEIxAgQIAAAQIECBAgQIAAAQXdHiBAgAABAgQIECBAgAABAgkIKOgJhGAEAgQIECBAgAABAgQIECCgoNsDBAgQIECAAAECBAgQIEAgAQEFPYEQjECAAAECBAgQIECAAAECBBR0e4AAAQIECBAgQIAAAQIECCQgoKAnEIIRCBAgQIAAAQIECBAgQICAgm4PECBAgAABAgQIECBAgACBBAQU9ARCMAIBAgQIECBAgAABAgQIEFDQ7QECBAgQIECAAAECBAgQIJCAgIKeQAhGIECAAAECBAgQIECAAAECCro9QIAAAQIECBAgQIAAAQIEEhBQ0BMIwQgECBAgQIAAAQIECBAgQEBBtwcIECBAgAABAgQIECBAgEACAgp6AiEYgQABAgQIECBAgAABAgQIKOj2AAECBAgQIECAAAECBAgQSEBAQU8gBCMQIECAAAECBAgQIECAAAEF3R4gQIAAAQIECBAgQIAAAQIJCCjoCYRgBAIECBAgQIAAAQIECBAgoKDbAwQIECBAgAABAgQIECBAIAEBBT2BEIxAgAABAgQIECBAgAABAgQUdHuAAAECBAgQIECAAAECBAgkIKCgJxCCEQgQIECAAAECBAgQIECAgIJuDxAgQIAAAQIECBAgQIAAgQQEFPQEQjACAQIECBAgQIAAAQIECBBQ0O0BAgQIECBAgAABAgQIECCQgICCnkAIRiBAgAABAgQIECBAgAABAgq6PUCAAAECBAgQIECAAAECBBIQUNATCMEIBAgQIECAAAECBAgQIEBAQbcHCBAgQIAAAQIECBAgQIBAAgIKegIhGIEAAQIECBAgQIAAAQIECCjo9gABAgQIECBAgAABAgQIEEhAQEFPIAQjECBAgAABAgQIECBAgAABBd0eIECAAAECBAgQIECAAAECCQgo6AmEYAQCBAgQIECAAAECBAgQIKCg2wMECBAgQIAAAQIECBAgQCABAQU9gRCMQIAAAQIECBAgQIAAAQIEFHR7gAABAgQIECBAgAABAgQIJCCgoCcQghEIECBAgAABAgQIECBAgICCbg8QIECAAAECBAgQIECAAIEEBBT0BEIwAgECBAgQIECAAAECBAgQUNDtAQIECBAgQIAAAQIECBAgkICAgp5ACEYgQIAAAQIECBAgQIAAAQIKuj1AgAABAgQIECBAgAABAgQSEFDQEwjBCAQIECBAgAABAgQIECBAQEG3BwgQIECAAAECBAgQIECAQAICCnoCIRiBAAECBAgQIECAAAECBAgo6PYAAQIECBAgQIAAAQIECBBIQEBBTyAEIxAgQIAAAQIECBAgQIAAAQXdHiBAgAABAgQIECBAgAABAgkIKOgJhGAEAgQIECBAgAABAgQIECCgoNsDBAgQIECAAAECBAgQIEAgAQEFPYEQjECAAAECBAgQIECAAAECBBR0e4AAAQIECBAgQIAAAQIECCQgoKAnEIIRCBAgQIAAAQIECBAgQICAgm4PECBAgAABAgQIECBAgACBBAQU9ARCMAIBAgQIECBAgAABAgQIEFDQ7QECBAgQIECAAAECBAgQIJCAgIKeQAhGIECAAAECBAgQIECAAAECCro9QIAAAQIECBAgQIAAAQIEEhBQ0BMIwQgECBAgQIAAAQIECBAgQEBBtwcIECBAgAABAgQIECBAgEACAgp6AiEYgQABAgQIECBAgAABAgQIKOj2AAECBAgQIECAAAECBAgQSEBAQU8gBCMQIECAAAECBAgQIECAAAEF3R4gQIAAAQIECBAgQIAAAQIJCCjoCYRgBAIECBAgQIAAAQIECBAgoKDbAwQIECBAgAABAgQIECBAIAEBBT2BEIxAgAABAgQIECBAgAABAgQUdHuAAAECBAgQIECAAAECBAgkIKCgJxCCEQgQIECAAAECBAgQIECAgIJuDxAgQIAAAQIECBAgQIAAgQQEFPQEQjACAQIECBAgQIAAAQIECBBQ0O0BAgQIECBAgAABAgQIECCQgICCnkAIRiBAgAABAgQIECBAgAABAgq6PUCAAAECBAgQIECAAAECBBIQUNATCMEIBAgQIECAAAECBAgQIEBAQbcHCBAgQIAAAQIECBAgQIBAAgIKegIhGIEAAQIECBAgQIAAAQIECCjo9gABAgQIECBAgAABAgQIEEhAQEFPIAQjECBAgAABAgQIECBAgAABBd0eIECAAAECBAgQIECAAAECCQgo6AmEYAQCBAgQIECAAAECBAgQIKCg2wMECBAgQIAAAQIECBAgQCABAQU9gRCMQIAAAQIECBAgQIAAAQIEFHR7gAABAgQIECBAgAABAgQIJCCgoCcQghEIECBAgAABAgQIECBAgICCbg8QIECAAAECBAgQIECAAIEEBBT0BEIwAgECBAgQIECAAAECBAgQUNDtAQIECBAgQIAAAQIECBAgkICAgp5ACEYgQIAAAQIECBAgQIAAAQIKuj1AgAABAgQIECBAgAABAgQSEFDQEwjBCAQIECBAgAABAgQIECBAQEG3BwgQIECAAAECBAgQIECAQAICCnoCIRiBAAECBAgQIECAAAECBAgo6PYAAQIECBAgQIAAAQIECBBIQEBBTyAEIxAgQIAAAQIECBAgQIAAAQXdHiBAgAABAgQIECBAgAABAgkIKOgJhGAEAgQIECBAgAABAgQIECCgoNsDBAgQIECAAAECBAgQIEAgAQEFPYEQjECAAAECBAgQIECAAAECBBR0e4AAAQIECBAgQIAAAQIECCQgoKAnEIIRCBAgQIAAAQIECBAgQICAgm4PECBAgAABAgQIECBAgACBBAQU9ARCMAIBAgQIECBAgAABAgQIEFDQ7QECBAgQIECAAAECBAgQIJCAgIKeQAhGIECAAAECBAgQIECAAAECCro9QIAAAQIECBAgQIAAAQIEEhBQ0BMIwQgECBAgQIAAAQIECBAgQEBBtwcIECBAgAABAgQIECBAgEACAgp6AiEYgQABAgQIECBAgAABAgQIKOj2AAECBAgQIECAAAECBAgQSEBAQU8gBCMQIECAAAECBAgQIECAAAEF3R4gQIAAAQIECBAgQIAAAQIJCCjoCYRgBAIECBAgQIAAAQIECBAgoKDbAwQIECBAgAABAgQIECBAIAEBBT2BEIxAgAABAgQIECBAgAABAgQUdHuAAAECBAgQIECAAAECBAgkIKCgJxCCEQgQIECAAAECBAgQIECAgIJuDxAgQIAAAQIECBAgQIAAgQQEFPQEQjACAQIECBAgQIAAAQIECBBQ0O0BAgQIECBAgAABAgQIECCQgICCnkAIRiBAgAABAgQIECBAgAABAgq6PUCAAAECBAgQIECAAAECBBIQUNATCMEIBAgQIECAAAECBAgQIEBAQbcHCBAgQIAAAQIECBAgQIBAAgIKegIhGIEAAQIECBAgQIAAAQIECCjo9gABAgQIECBAgAABAgQIEEhAQEFPIAQjECBAgAABAgQIECBAgAABBd0eIECAAAECBAgQIECAAAECCQgo6AmEYAQCBAgQIECAAAECBAgQIKCg2wMECBAgQIAAAQIECBAgQCABAQU9gRCMQIAAAQIECBAgQIAAAQIEFHR7gAABAgQIECBAgAABAgQIJCCgoCcQghEIECBAgAABAgQIECBAgICCbg8QIECAAAECBAgQIECA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eZfzxCc+teO178tedaPfe+Dr+/u7n/tPbv4fc6f2CJ6NAAECBAikIaCgp5GDKQgQIECAwFEF7v69q6d37N+yfW523QXNg6pqsgp6XQ+/Xdm4Yf6hN/yrv3xOVU3YTyj83SBAgACBiRFQ0CcmagslQIAAgVwFbvu179m0cVNnR683v6l9DfqkffVufx5RR7e7Yc/j284696ab3t3PNUtzEyBAgACBYwlM2pd4u4EAAQIECGQncPvN126YOn/TF6LqXFK1L0LPbgknN3Dztu4RnXpQP3D7zg998803x+DkntBnEyBAgACBNAUU9DRzMRUBAgQIEFgSuP3ma7ud8876s4h4dUT0J/NF6DFVR3z029/6oRtc4u4vBwECBAiUKqCgl5qsdREgQIAAAQIECBAgQIBAVgIKelZxGZYAAQIECBAgQIAAAQIEShVQ0EtN1roIECBAgAABAgQIECBAICsBBT2ruAxLgAABAgQIECBAgAABAqUKKOilJmtdBAgQIECAAAECBAgQIJCVgIKeVVyGJUCAAAECBAgQIECAAIFSBRT0UpO1LgIECBAgQIAAAQIECBDISkBBzyouwxIgQIAAAQIECBAgQIBAqQIKeqnJWhcBAgQIECBAgAABAgQIZCWgoGcVl2EJECBAgAABAgQIECBAoFQBBb3UZK2LAAECBAgQIECAAAECBLISUNCzisuwBAgQIECAAAECBAgQIFCqgIJearLWRYAAAQIECBAgQIAAAQJZCSjoWcVlWAIECBAgQIAAAQIECBAoVUBBLzVZ6yJAgAABAgQIECBAgACBrAQU9KziMiwBAgQIECBAgAABAgQIlCqgoJearHURIECAAAECBAgQIECAQFYCCnpWcRmWAAECBAgQIECAAAECBEoVUNBLTda6CBAgQIAAAQIECBAgQCArAQU9q7gMS4AAAQIECBAgQIAAAQKlCijopSZrXQQIECBAgAABAgQIECCQlYCCnlVchiVAgAABAgQIECBAgACBUgUU9FKTtS4CBAgQIECAAAECBAgQyEpAQc8qLsMSIECAAAECBAgQIECAQKkCCnqpyVoXAQIECBAgQIAAAQIECGQloKBnFZdhCRAgQIAAAQIECBAgQKBUAQW91GStiwABAgQIECBAgAABAgSyElDQs4rLsAQIECBAgAABAgQIECBQqoCCXmqy1kWAAAECBAgQIECAAAECWQko6FnFZVgCBAgQIECAAAECBAgQKFVAQS81WesiQIAAAQIECBAgQIAAgawEFPSs4jIsAQIECBAgQIAAAQIECJQqoKCXmqx1ESBAgAABAgQIECBAgEBWAgp6VnEZlgABAgQIECBAgAABAgRKFVDQS03WuggQIECAAAECBAgQIEAgKwEFPau4DEuAAAECBAgQIECAAAECpQoo6KUma10ECBAgQIAAAQIECBAgkJWAgp5VXIYlQIAAAQIECBAgQIAAgVIFFPRSk7UuAgQIECBAgAABAgQIEMhKQEHPKi7DEiBAgAABAgQIECBAgECpAgp6qclaFwECBAgQIECAAAECBAhkJaCgZxWXYQkQIECAAAECBAgQIECgVAEFvdRkrYsAAQIECBAgQIAAAQIEshJQ0LOKy7AECBAgQIAAAQIECBAgUKqAgl5qstZFgAABAgQIECBAgAABAlkJKOhZxWVYAgQIECBAgAABAgQIEChVQEEvNVnrIkCAAAECBAgQIECAAIGsBBT0rOIyLAECBAgQIECAAAECBAiUKqCgl5qsdREgQIAAAQIECBAgQIBAVgIKelZxGZYAAQIECBAgQIAAAQIEShVQ0EtN1roIECBAgAABAgQIECBAICsBBT2ruAxLgAABAgQIECBAgAABAqUKKOilJmtdBAgQIECAAAECBAgQIJCVgIKeVVyGJUCAAAECBAgQIECAAIFSBRT0UpO1LgIECBAgQIAAAQIECBDISkBBzyouwxIgQIAAAQIECBAgQIBAqQIKeqnJWhcBAgQIECBAgAABAgQIZCWgoGcVl2EJECBAgAABAgQIECBAoFQBBb3UZK2LAAECBAgQIECAAAECBLISUNCzisuwBAgQIECAAAECBAgQIFCqgIJearLWRYAAAQIECBAgQIAAAQJZCSjoWcVlWAIECBAgQIAAAQIECBAoVUBBLzVZ6yJAgAABAgQIECBAgACBrAQU9KziMiwBAgQIECBAgAABAgQIlCqgoJearHURIECAAAECBAgQIECAQFYCCnpWcRmWAAECBAgQIECAAAECBEoVUNBLTda6CBAgQIAAAQIECBAgQCArAQU9q7gMS4AAAQIECBAgQIAAAQKlCijopSZrXQQIECBAgAABAgQIECCQlYCCnlVchiVAgAABAgQIECBAgACBUgUU9FKTtS4CBAgQIECAAAECBAgQyEpAQc8qLsMSIECAAAECBAgQIECAQKkCCnqpyVoXAQIECBAgQIAAAQIECGQloKBnFZdhCRAgQIAAAQIECBAgQKBUAQW91GStiwABAgQIECBAgAABAgSyElDQs4rLsAQIECBAgAABAgQIECBQqoCCXmqy1kWAAAECBAgQIECAAAECWQko6FnFZVgCBAgQIECAAAECBAgQKFVAQS81WesiQIAAAQIECBAgQIAAgawEFPSs4jIsAQIECBAgQIAAAQIECJQqoKCXmqx1ESBAgAABAgQIECBAgEBWAgp6VnEZlgABAgQIECBAgAABAgRKFVDQS03WuggQIECAAAECBAgQIEAgKwEFPau4DEuAAAECBAgQIECAAAECpQoo6KUma10ECBAgQIAAAQIECBAgkJWAgp5VXIYlQIAAAQIECBAgQIAAgVIFFPRSk7UuAgQIECBAgAABAgQIEMhKQEHPKi7DEiBAgAABAgQIECBAgECpAgp6qclaFwECBAgQIECAAAECBAhkJaCgZxWXYQkQIECAAAECBAgQIECgVAEFvdRkrYsAAQIECBAgQIAAAQIEshJQ0LOKy7AECBAgQIAAAQIECBAgUKqAgl5qstZFgAABAgQIECBAgAABAlkJKOhZxWVYAgQIECBAgAABAgQIEChVQEEvNVnrIkCAAAECBAgQIECAAIGsBBT0rOIyLAECBAgQIECAAAECBAiUKqCgl5qsdREgQIAAAQIECBAgQIBAVgIKelZxGZYAAQIECBAgQIAAAQIEShVQ0EtN1roIECBAgAABAgQIECBAICsBBT2ruAxLgAABAgQIECBAgAABAqUKKOilJmtdBAgQIECAAAECBAgQIJCVgIKeVVyGJUCAAAECBAgQIECAAIFSBRT0UpO1LgIECBAgQIAAAQIECBDISkBBzyouwxIgQIAAAQIECBAgQIBAqQIKeqnJWhcBAgQIECBAgAABAgQIZCWgoGcVl2EJECBAgAABAgQIECBAoFQBBb3UZK2LAAECBAgQIECAAAECBLISUNCzisuwBAgQIECAAAECBAgQIFCqgIJearLWRYAAAQIECBAgQIAAAQJZCSjoWcVlWAIECBAgQIAAAQIECBAoVUBBLzVZ6yJAgAABAgQIECBAgACBrAQU9KziMiwBAgQIECBAgAABAgQIlCqgoJearHURIECAAAECBAgQIECAQFYCCnpWcRmWAAECBAgQIECAAAECBEoVUNBLTda6CBAgQIAAAQIECBAgQCArAQU9q7gMS4AAAQIECBAgQIAAAQKlCijopSZrXQQIECBAgAABAgQIECCQlYCCnlVchiVAgAABAgQIECBAgACBUgUU9FKTtS4CBAgQIECAAAECBAgQyEpAQc8qLsMSIECAAAECBAgQIECAQKkCCnqpyVoXAQIECBAgQIAAAQIECGQloKBnFZdhCRAgQIAAAQIECBAgQKBUAQW91GStiwABAgQIECBAgAABAgSyElDQs4rLsAQIECBAgAABAgQIECBQqoCCXmqy1kWAAAECBAgQIECAAAECWQko6FnFZVgCBAgQIECAAAECBAgQKFVAQS81WesiQIAAAQIECBAgQIAAgawEFPSs4jIsAQIECBAgQIAAAQIECJQqoKCXmqx1ESBAgAABAgQIECBAgEBWAgp6VnEZlgABAgQIECBAgAABAgRKFVDQS03WuggQIECAAAECBAgQIEAgKwEFPau4DEuAAAECBAgQIECAAAECpQoo6KUma10ECBAgQIAAAQIECBAgkJWAgp5VXIYlQIAAAQIECBAgQIAAgVIFFPRSk7UuAgQIECBAgAABAgQIEMhKQEHPKi7DEiBAgAABAgQIECBAgECpAgp6qclaFwECBAgQIECAAAECBAhkJaCgZxWXYQkQIECAAAECBAgQIECgVAEFvdRkrYsAAQIECBAgQIAAAQIEshJQ0LOKy7AECBAgQIAAAQIECBAgUKqAgl5qstZFgAABAgQIECBAgAABAlkJKOhZxWVYAgQIECBAgAABAgQIEChVQEEvNVnrIkCAAAECBAgQIECAAIGsBBT0rOIyLAECBAgQIECAAAECBAiUKqCgl5qsdREgQIAAAQIECBAgQIBAVgIKelZxGZYAAQIECBAgQIAAAQIEShVQ0EtN1roIECBAgAABAgQIECBAICsBBT2ruAxLgAABAgQIECBAgAABAqUKKOilJmtdBAgQIECAAAECBAgQIJCVgIKeVVyGJUCAAAECBAgQIECAAIFSBRT0UpO1LgIECBAgQIAAAQIECBDISkBBzyouwxIgQIAAAQIECBAgQIBAqQIKeqnJWhcBAgQIECBAgAABAgQIZCWgoGcVl2EJECBAgAABAgQIECBAoFQBBb3UZK2LAAECBAgQIECAAAECBLISUNCzisuwBAgQIECAAAECBAgQIFCqgIJearLWRYAAAQIECBAgQIAAAQJZCSjoWcVlWAIECBAgQIAAAQIECBAoVUBBLzVZ6yJAgAABAgQIECBAgACBrAQU9KziMiwBAgQIECBAgAABAgQIlCqgoJearHURIECAAAECBAgQIECAQFYCCnpWcRmWAAECBAgQIECAAAECBEoVUNBLTda6CBAgQIAAAQIECBAgQCArAQU9q7gMS4AAAQIECBAgQIAAAQKlCijopSZrXQQIECBAgAABAgQIECCQlYCCnlVchiVAgAABAgQIECBAgACBUgUU9FKTtWq4vvIAAAPbSURBVC4CBAgQIECAAAECBAgQyEpAQc8qLsMSIECAAAECBAgQIECAQKkCCnqpyVoXAQIECBAgQIAAAQIECGQloKBnFZdhCRAgQIAAAQIECBAgQKBUAQW91GStiwABAgQIECBAgAABAgSyElDQs4rLsAQIECBAgAABAgQIECBQqoCCXmqy1kWAAAECBAgQIECAAAECWQko6FnFZVgCBAgQIECAAAECBAgQKFVAQS81WesiQIAAAQIECBAgQIAAgawEFPSs4jIsAQIECBAgQIAAAQIECJQqoKCXmqx1ESBAgAABAgQIECBAgEBWAgp6VnEZlgABAgQIECBAgAABAgRKFVDQS03WuggQIECAAAECBAgQIEAgKwEFPau4DEuAAAECBAgQIECAAAECpQoo6KUma10ECBAgQIAAAQIECBAgkJWAgp5VXIYlQIAAAQIECBAgQIAAgVIFFPRSk7UuAgQIECBAgAABAgQIEMhKQEHPKi7DEiBAgAABAgQIECBAgECpAgp6qclaFwECBAgQIECAAAECBAhkJaCgZxWXYQkQIECAAAECBAgQIECgVAEFvdRkrYsAAQIECBAgQIAAAQIEshJQ0LOKy7AECBAgQIAAAQIECBAgUKqAgl5qstZFgAABAgQIECBAgAABAlkJKOhZxWVYAgQIECBAgAABAgQIEChVQEEvNVnrIkCAAAECBAgQIECAAIGsBBT0rOIyLAECBAgQIECAAAECBAiUKqCgl5qsdREgQIAAAQIECBAgQIBAVgIKelZxGZYAAQIECBAgQIAAAQIEShVQ0EtN1roIECBAgAABAgQIECBAICsBBT2ruAxLgAABAgQIECBAgAABAqUKKOilJmtdBAgQIECAAAECBAgQIJCVgIKeVVyGJUCAAAECBAgQIECAAIFSBRT0UpO1LgIECBAgQIAAAQIECBDISkBBzyouwxIgQIAAAQIECBAgQIBAqQIKeqnJWhcBAgQIECBAgAABAgQIZCWgoGcVl2EJECBAgAABAgQIECBAoFQBBb3UZK2LAAECBAgQIECAAAECBLISUNCzisuwBAgQIECAAAECBAgQIFCqgIJearLWRYAAAQIECBAgQIAAAQJZCSjoWcVlWAIECBAgQIAAAQIECBAoVUBBLzVZ6yJAgAABAgQIECBAgACBrAQU9KziMiwBAgQIECBAgAABAgQIlCqgoJearHURIECAAAECBAgQIECAQFYCCnpWcRmWAAECBAgQIECAAAECBEoVUNBLTda6CBAgQIAAAQIECBAgQCArAQU9q7gMS4AAAQIECBAgQIAAAQKlCvx/e3Fk0cX34pkAAAAASUVORK5CYII=', '2022-07-20', 'Completed', '2022-07-20 13:38:12', '2022-07-20 07:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'admin', '2021-11-18 11:23:00', '2021-11-18 11:23:00'),
(2, 'user', '2021-11-18 11:23:00', '2021-11-18 11:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` int(100) NOT NULL,
  `round_no` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `round_no`, `status`, `created`, `deleted`) VALUES
(1, 1, 'Active', '2022-01-20', '2022-01-20'),
(2, 2, 'Active', '2022-01-20', '2022-01-20');

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
(300, 'Large Living Room', 'Large Living Room.png', '50px', '50px', 1, 3, 0, 0, 300, 1, '2022-04-18 07:31:03', '2022-04-18 07:31:03'),
(301, 'Living with Kitchen', 'Living with Kitchen.png', '80px', '50px', 1, 3, 200, 1, 0, 0, '2022-04-18 07:31:41', '2022-04-18 07:31:41'),
(302, 'Office', 'Office.png', '50px', '65px', 1, 3, 0, 0, 300, 1, '2022-04-18 07:32:10', '2022-04-18 07:32:10'),
(303, 'Small Bed Room', 'Small Bed Room.png', '40px', '60px', 1, 3, 0, 0, 0, 0, '2022-04-18 07:32:31', '2022-04-18 07:32:31'),
(304, 'Small Living Room', 'Small Living Room.png', '40px', '60px', 1, 3, 0, 0, 0, 0, '2022-04-18 07:32:48', '2022-04-18 07:32:48'),
(305, 'Kitchen', 'Kitchen.png', '50px', '70px', 1, 3, 0, 0, 200, 1, '2022-04-18 07:33:14', '2022-04-18 07:33:14'),
(306, 'corridor', 'corridor.png', '25px', '75px', 1, 3, 0, 0, 0, 0, '2022-04-18 07:33:36', '2022-04-18 07:33:36'),
(307, 'bath with shower', 'bath with shower.png', '40px', '60px', 1, 3, 150, 1, 0, 0, '2022-04-18 07:33:57', '2022-04-18 07:33:57'),
(308, 'bath with bathtub', 'bath with bathtub.png', '50px', '60px', 1, 3, 150, 1, 200, 1, '2022-04-18 07:34:15', '2022-04-18 07:34:15'),
(309, 'Big window', 'Big window.png', '12px', '100px', 2, 2, 200, 5, 300, 1, '2022-04-18 07:38:39', '2022-04-18 07:38:39'),
(310, 'window', 'window.png', '19px', '80px', 2, 2, 0, 0, 100, 0, '2022-04-18 07:39:04', '2022-04-18 07:39:04'),
(311, 'door', 'door.png', '40px', '40px', 3, 2, 100, 2, 200, 2, '2022-04-18 07:39:25', '2022-04-18 07:39:25'),
(312, 'double door', 'double_door.png', '40px', '80px', 3, 2, 0, 0, 200, 2, '2022-04-18 07:39:47', '2022-04-18 07:39:47'),
(313, 'sliding doors', 'sliding_doors.png', '14px', '150px', 3, 2, 100, 5, 200, 5, '2022-04-18 07:40:45', '2022-04-18 07:40:45'),
(314, 'tree1', 'tree_1.png', '40px', '40px', 4, 1, 50, 8, 100, 5, '2022-04-18 07:42:41', '2022-04-18 07:42:41'),
(315, 'tree2', 'tree_2.png', '40px', '40px', 4, 1, 50, 8, 100, 5, '2022-04-18 07:43:01', '2022-04-18 07:43:01'),
(316, 'tree3', 'tree_3.png', '40px', '40px', 4, 1, 50, 8, 100, 5, '2022-04-18 07:43:17', '2022-04-18 07:43:17'),
(317, 'plant1', 'plant_3.png', '40px', '40px', 4, 1, 50, 8, 50, 6, '2022-04-18 07:43:39', '2022-04-18 07:43:39'),
(318, 'plant2', 'plant_2.png', '40px', '40px', 4, 1, 50, 8, 50, 6, '2022-04-18 07:43:55', '2022-04-18 07:43:55'),
(319, 'plant3', 'plant_1.png', '40px', '40px', 4, 1, 50, 8, 50, 6, '2022-04-18 07:44:12', '2022-04-18 07:44:12'),
(320, 'bush1', 'bush_1.png', '40px', '40px', 9, 1, 30, 10, 50, 6, '2022-04-18 07:44:33', '2022-04-18 07:44:33'),
(321, 'bush2', 'bush_2.png', '40px', '40px', 9, 1, 30, 10, 50, 6, '2022-04-18 07:44:54', '2022-04-18 07:44:54'),
(322, 'bush3', 'bush_3.png', '40px', '40px', 9, 1, 30, 10, 50, 6, '2022-04-18 07:45:17', '2022-04-18 07:45:17'),
(323, 'Family swing', 'Family swing.png', '40px', '100px', 10, 1, 0, 0, 200, 1, '2022-04-18 07:46:13', '2022-04-18 07:46:13'),
(324, 'fountain', 'fountain.png', '60px', '60px', 10, 1, 0, 0, 200, 1, '2022-04-18 07:46:43', '2022-04-18 07:46:43'),
(325, 'pool', 'pool.png', '90px', '40px', 10, 1, 100, 1, 0, 0, '2022-04-18 07:47:15', '2022-04-18 07:47:15'),
(326, 'seesaw', 'seesaw.png', '90px', '25px', 10, 1, 50, 1, 0, 0, '2022-04-18 07:47:38', '2022-04-18 07:47:38'),
(328, 'slide', 'slide.png', '90px', '40px', 10, 1, 50, 1, 200, 1, '2022-04-18 07:48:31', '2022-04-18 07:48:31'),
(329, 'swing', 'swing.png', '60px', '90px', 10, 1, 50, 2, 0, 0, '2022-04-18 07:49:07', '2022-04-18 07:49:07'),
(330, 'carpet', 'carpet.png', '80px', '80px', 5, 4, 0, 0, 200, 1, '2022-04-18 07:56:38', '2022-04-18 07:56:38'),
(331, 'chair ', 'chair .png', '60px', '50px', 5, 4, 0, 0, 0, 0, '2022-04-18 07:57:03', '2022-04-18 07:57:03'),
(332, 'chair', 'chair.png', '60px', '50px', 5, 4, 0, 0, 0, 0, '2022-04-18 07:57:32', '2022-04-18 07:57:32'),
(333, 'sofa1', 'sofa_1.png', '50px', '100px', 5, 4, 150, 2, 500, 1, '2022-04-18 07:57:57', '2022-04-18 07:57:57'),
(334, 'sofa2', 'sofa_2.png', '50px', '100px', 5, 4, 150, 2, 500, 1, '2022-04-18 07:58:23', '2022-04-18 07:58:23'),
(335, 'double bed', 'double bed.png', '80px', '120px', 6, 4, 200, 1, 0, 0, '2022-04-18 07:59:30', '2022-04-18 07:59:30'),
(336, 'lamp', 'lamp.png', '60px', '60px', 6, 4, 0, 0, 200, 1, '2022-04-18 07:59:54', '2022-04-18 07:59:54'),
(337, 'single bed', 'single bed.png', '60px', '110px', 6, 4, 200, 3, 0, 0, '2022-04-18 08:00:18', '2022-04-18 08:00:18'),
(338, 'study', 'study.png', '90px', '60px', 6, 4, 0, 0, 200, 1, '2022-04-18 08:00:57', '2022-04-18 08:00:57'),
(339, 'table', 'table.png', '50px', '35px', 6, 4, 0, 0, 200, 1, '2022-04-18 08:01:22', '2022-04-18 08:01:22'),
(340, 'Small dining', 'Small dining.png', '80px', '80px', 7, 4, 0, 0, 400, 1, '2022-04-18 08:03:14', '2022-04-18 08:03:14'),
(341, 'Big dining', 'Big dining.png', '60px', '90px', 7, 4, 200, 1, 0, 0, '2022-04-18 08:03:48', '2022-04-18 08:03:48'),
(342, 'night stand', 'night stand.png', '40px', '40px', 6, 4, 100, 2, 0, 0, '2022-06-20 07:52:33', '2022-06-20 07:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `shape_groups`
--

CREATE TABLE `shape_groups` (
  `id` int(100) NOT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `shape_group_name` varchar(100) DEFAULT NULL,
  `shape_group_description` varchar(10000) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shape_groups`
--

INSERT INTO `shape_groups` (`id`, `user_type_id`, `shape_group_name`, `shape_group_description`, `created`, `modified`) VALUES
(1, 3, 'Floor Plans', 'ARCHITECT - Only Rooms Cutout', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(2, 2, 'Windows', 'CARPENTER - Only Doors and Windows', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(3, 2, 'Door', 'CARPENTER - Only Doors and Windows', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(4, 1, 'Plants & Trees', 'GARDENER - only Trees, Bushes, Indoor and Outdoor Pots', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(5, 4, 'Living Area', 'INTERIOR DESIGNER- Living Area cutouts includes sofa,table', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(6, 4, 'Bedroom', 'INTERIOR DESIGNER- Bedroom area cutouts includes bed, study table, sofa, lamp,  wardrobe', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(7, 4, 'Dinning', 'INTERIOR DESIGNER-Kitchen and Dining area cutouts includes Burner, basin, refrigerator, table, dining table ', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(9, 1, 'Pots', 'GARDENER - only Trees, Bushes, Indoor and Outdoor Pots', '2021-11-18 11:35:19', '2021-11-18 11:38:54'),
(10, 1, 'Garden', 'GARDENER - only Trees, Bushes, Indoor and Outdoor Pots', '2021-11-18 11:35:19', '2021-11-18 11:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(100) NOT NULL,
  `survey_name` varchar(100) DEFAULT NULL,
  `question_group_id` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `survey_name`, `question_group_id`, `status`, `created`, `modified`) VALUES
(1, 'test', 1, '', '2021-11-18 11:44:28', '2021-11-18 11:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `survey_results`
--

CREATE TABLE `survey_results` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `game_code` varchar(100) DEFAULT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `new_survey_id` int(100) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type_id` int(100) DEFAULT NULL,
  `role_id` int(100) DEFAULT NULL,
  `gamecode_name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type_id`, `role_id`, `gamecode_name`, `created`, `modified`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$UJaCN.mMujAF.S0/YMlzj.EJ53PD5j2vCAadl2tR0X36mc2.ww1Ca', 1, 1, '', '2021-11-18 07:42:13', '2022-02-16 07:56:49'),
(8, 'Parini Vyas', 'gardener@gmail.com', '$2y$10$zvCSVBRQfGYIHDSdPiFMdOIzIR9Te/go3dTqB5WOqRrGV2FwrH31O', 1, 2, 'LUlgUt', '2022-01-20 09:15:05', '2022-07-20 12:24:44'),
(9, 'Jeremy Jeremey ', 'carpenter@gmail.com', '$2y$10$yLLs2ZiFhMxTaf73/XYdK.gIeASec7mttpyxeCKCc0E0HRgjk/wS2', 2, 2, 'LUlgUt', '2022-01-20 09:15:51', '2022-07-12 09:44:13'),
(10, 'Virgil Wylie', 'designer@gmail.com', '$2y$10$IsZZ6YZd6S2mmnFRkIrCBuakvs4iX0vlRBtRfLj9cc5tixSQea5q2', 4, 2, 'LUlgUt', '2022-01-20 09:16:22', '2022-07-20 13:28:25'),
(15, 'Shazia Shaikh', 'architect@gmail.com', '$2y$10$awL49gVb2tUYFPbVn07siuXTJ2vkPLfxy0gmqTuEuCQ4.XYCUeDYS', 3, 2, 'LUlgUt', '2022-01-20 09:15:05', '2022-07-19 13:06:42'),
(93, 'xvd hjfbvhjfv', 'yy@gmail.com', '$2y$10$HfvayTX2br1t/ZIf2ZuAPeK14Hjq9HBsLO0rvMOeUWEeG6Y2Fe0cm', NULL, 2, '5uJeRZ', '2022-07-05 13:25:50', '2022-07-05 13:25:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(100) NOT NULL,
  `type_name` varchar(100) DEFAULT NULL,
  `access_id` int(100) DEFAULT NULL,
  `upload_image` varchar(1000) DEFAULT NULL,
  `user_type_status` varchar(100) DEFAULT NULL,
  `type_description` varchar(1000) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`, `access_id`, `upload_image`, `user_type_status`, `type_description`, `created`, `modified`) VALUES
(1, 'Gardener', 1, NULL, NULL, 'Lorem Ipsum is simply dummy text.', '2021-11-18 09:32:00', '2021-11-18 12:03:11'),
(2, 'Carpenter ', 2, NULL, NULL, 'Lorem Ipsum is simply dummy text.', '2021-11-18 12:04:23', '2021-11-18 12:04:23'),
(3, 'Architect', 3, NULL, NULL, NULL, NULL, NULL),
(4, 'Interior Designer ', 4, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_steps`
--
ALTER TABLE `game_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_descriptions`
--
ALTER TABLE `job_descriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key20` (`round_id`),
  ADD KEY `foreign_key21` (`user_type_id`),
  ADD KEY `foreign_key22` (`phase_id`);

--
-- Indexes for table `login_for_matches`
--
ALTER TABLE `login_for_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key16` (`user_id`),
  ADD KEY `foreign_key17` (`online_game_id`);

--
-- Indexes for table `new_surveys`
--
ALTER TABLE `new_surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_games`
--
ALTER TABLE `online_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key5` (`shape_group_id`),
  ADD KEY `foreign_key6` (`survey_id`),
  ADD KEY `foreign_key62` (`players_turn`);

--
-- Indexes for table `online_game_histories`
--
ALTER TABLE `online_game_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key7` (`online_game_id`),
  ADD KEY `foreign_key8` (`user_id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_survey_answers`
--
ALTER TABLE `player_survey_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_20` (`online_game_id`),
  ADD KEY `fk_21` (`player_survey_question_id`),
  ADD KEY `fk_22` (`user_id`),
  ADD KEY `fk_23` (`user_type_id`);

--
-- Indexes for table `player_survey_questions`
--
ALTER TABLE `player_survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key9` (`question_group_id`);

--
-- Indexes for table `question_groups`
--
ALTER TABLE `question_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key10` (`shape_group_id`),
  ADD KEY `foreign_key30` (`user_type_id`);

--
-- Indexes for table `shape_groups`
--
ALTER TABLE `shape_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key41` (`user_type_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key4` (`question_group_id`);

--
-- Indexes for table `survey_results`
--
ALTER TABLE `survey_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key11` (`user_id`),
  ADD KEY `foreign_key12` (`new_survey_id`),
  ADD KEY `foreign_key13` (`user_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key2` (`role_id`),
  ADD KEY `foreign_key3` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key1` (`access_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game_steps`
--
ALTER TABLE `game_steps`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_descriptions`
--
ALTER TABLE `job_descriptions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `login_for_matches`
--
ALTER TABLE `login_for_matches`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `new_surveys`
--
ALTER TABLE `new_surveys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `online_games`
--
ALTER TABLE `online_games`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `online_game_histories`
--
ALTER TABLE `online_game_histories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `player_survey_answers`
--
ALTER TABLE `player_survey_answers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `player_survey_questions`
--
ALTER TABLE `player_survey_questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_groups`
--
ALTER TABLE `question_groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=663;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `shape_groups`
--
ALTER TABLE `shape_groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `survey_results`
--
ALTER TABLE `survey_results`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- Constraints for table `login_for_matches`
--
ALTER TABLE `login_for_matches`
  ADD CONSTRAINT `foreign_key16` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `foreign_key17` FOREIGN KEY (`online_game_id`) REFERENCES `online_games` (`id`);

--
-- Constraints for table `online_games`
--
ALTER TABLE `online_games`
  ADD CONSTRAINT `foreign_key5` FOREIGN KEY (`shape_group_id`) REFERENCES `shape_groups` (`id`),
  ADD CONSTRAINT `foreign_key6` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`);

--
-- Constraints for table `online_game_histories`
--
ALTER TABLE `online_game_histories`
  ADD CONSTRAINT `foreign_key7` FOREIGN KEY (`online_game_id`) REFERENCES `online_games` (`id`),
  ADD CONSTRAINT `foreign_key8` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `player_survey_answers`
--
ALTER TABLE `player_survey_answers`
  ADD CONSTRAINT `fk_20` FOREIGN KEY (`online_game_id`) REFERENCES `online_games` (`id`),
  ADD CONSTRAINT `fk_21` FOREIGN KEY (`player_survey_question_id`) REFERENCES `player_survey_questions` (`id`),
  ADD CONSTRAINT `fk_22` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_23` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `foreign_key9` FOREIGN KEY (`question_group_id`) REFERENCES `question_groups` (`id`);

--
-- Constraints for table `shapes`
--
ALTER TABLE `shapes`
  ADD CONSTRAINT `foreign_key10` FOREIGN KEY (`shape_group_id`) REFERENCES `shape_groups` (`id`);

--
-- Constraints for table `shape_groups`
--
ALTER TABLE `shape_groups`
  ADD CONSTRAINT `foreign_key41` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `foreign_key4` FOREIGN KEY (`question_group_id`) REFERENCES `question_groups` (`id`);

--
-- Constraints for table `survey_results`
--
ALTER TABLE `survey_results`
  ADD CONSTRAINT `foreign_key11` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `foreign_key12` FOREIGN KEY (`new_survey_id`) REFERENCES `new_surveys` (`id`),
  ADD CONSTRAINT `foreign_key13` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `foreign_key2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `foreign_key3` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `user_types`
--
ALTER TABLE `user_types`
  ADD CONSTRAINT `foreign_key1` FOREIGN KEY (`access_id`) REFERENCES `accesses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
