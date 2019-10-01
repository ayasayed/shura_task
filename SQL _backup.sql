-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2019 at 02:47 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shura_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_childrens` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `sub_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `title`, `username`, `password`, `no_of_childrens`, `birth_date`, `sub_id`, `created_at`, `updated_at`) VALUES
(2, 'omnia ali', 'hr', 'omnia', '1234567224', 0, '1990-07-12', 10, '2019-09-27 22:00:00', '2019-09-30 20:07:38'),
(5, 'alia mohamed', 'developer', 'alia11', '34567814', 3, '1990-05-05', 0, NULL, '2019-09-30 21:41:02'),
(7, 'mohamed ahmed', 'web developer', 'mohamed', '567891', 0, '1998-05-05', 5, NULL, NULL),
(8, 'hend ahmed', 'developer', 'hend', 'hend@1996', 1, '1996-02-02', 5, '2019-09-30 13:12:36', '2019-09-30 13:12:36'),
(10, 'fatma saeed', 'doctor', 'fatma1996', 'fatma@162', 0, '1996-12-02', 5, '2019-09-30 13:37:49', '2019-09-30 17:25:32'),
(12, 'sama ahmed', 'developer', 'sama@1990', '53146890', 0, '1998-09-11', 2, '2019-09-30 14:00:12', '2019-09-30 14:00:12'),
(13, 'aya ahmed', 'developer', 'aya@16788', '2345678908765u', 0, '2000-09-04', 2, '2019-09-30 14:04:12', '2019-09-30 20:08:59'),
(18, 'ahmed ahmed', 'hr', 'ahmed2045', 'ahmed2000', 0, '2000-09-11', 13, '2019-09-30 17:41:08', '2019-09-30 17:41:08'),
(21, 'amani ali', 'developer', 'amani1345', 'amani34567', 0, '1990-09-11', 7, '2019-09-30 18:10:28', '2019-09-30 20:06:22'),
(22, 'aya sayed', 'manager', 'ayasayed', '1234567', 0, '1996-11-07', 12, '2019-09-30 20:07:05', '2019-09-30 20:07:05'),
(23, 'aya sayed', 'developer', 'ayasayed2', '1234567876543', 0, '2019-10-08', 22, '2019-09-30 21:46:35', '2019-09-30 21:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_28_204240_create_employees_table', 1),
(2, '2019_09_29_124137_add_foreign_to_employees_table', 2),
(5, '2019_10_01_000759_create_projects_table', 3),
(6, '2019_10_01_002029_create_tasks_table', 3),
(7, '2019_10_01_004110_create_task_employee_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starData` date NOT NULL,
  `endDate` date NOT NULL,
  `budget` double(30,3) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startData` date NOT NULL,
  `endDate` date NOT NULL,
  `progress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_employee`
--

CREATE TABLE `task_employee` (
  `emp_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `task_employee`
--
ALTER TABLE `task_employee`
  ADD KEY `task_employee_emp_id_foreign` (`emp_id`),
  ADD KEY `task_employee_task_id_foreign` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task_employee`
--
ALTER TABLE `task_employee`
  ADD CONSTRAINT `task_employee_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `task_employee_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
