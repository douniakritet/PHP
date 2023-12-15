-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 12:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orientation`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `nom_deplom` varchar(128) NOT NULL,
  `niveau` varchar(128) NOT NULL,
  `filiere` varchar(128) NOT NULL,
  `ecole` varchar(128) NOT NULL,
  `annee` date NOT NULL,
  `pdf` varchar(259) NOT NULL,
  `id_parcour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcours`
--

INSERT INTO `parcours` (`id`, `nom_deplom`, `niveau`, `filiere`, `ecole`, `annee`, `pdf`, `id_parcour`) VALUES
(37, 'lp', '3 ans', 'info', 'est', '0000-00-00', 'pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `confirmpassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `created_at`, `confirmpassword`) VALUES
(37, 'Dounia', 'KT', 'kritetdounia@gmail.com', '$2y$10$2Vwhvi.Lu7GKrMevr.bH.ehjz8zReGgQEWIbntRUkNBxNBP68dDgC', '1234556788', 'female', '2023-12-06 12:22:25', 'dounia2001'),
(38, 'sara', 'krietet', 'sara@gmail.com', '$2y$10$JwUyTdgz3wRcYjScfY/onOGR.lkHnBcdKucntueFRFf01yAvjsP5e', '1234578990', 'female', '2023-12-06 20:47:05', 'sara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id_parcour`),
  ADD KEY `fk_id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id_parcour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
