-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for macebook
DROP DATABASE IF EXISTS `macebook`;
CREATE DATABASE IF NOT EXISTS `macebook` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `macebook`;

-- Dumping structure for table macebook.follow
DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `followed_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table macebook.follow: ~1 rows (approximately)
INSERT INTO `follow` (`follow_id`, `follower_id`, `followed_id`, `created_at`, `updated_at`) VALUES
	(1, '1', '2', '2023-03-26 08:29:56', '2023-03-26 08:29:56');

-- Dumping structure for table macebook.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_suite` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_zipcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_geo_lat` double(8,6) NOT NULL,
  `address_geo_lng` double(9,6) NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_catchPhrase` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_bs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table macebook.users: ~10 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `address_street`, `address_suite`, `address_city`, `address_zipcode`, `address_geo_lat`, `address_geo_lng`, `phone`, `website`, `company_name`, `company_catchPhrase`, `company_bs`, `created_at`, `updated_at`) VALUES
	(1, 'Leanne Graham', 'Bret', 'Sincere@april.biz', 'Kulas Light', 'Apt. 556', 'Gwenborough', '92998-3874', -37.315900, 81.149600, '1-770-736-8031 x56442', 'hildegard.org', 'Romaguera-Crona', 'Multi-layered client-server neural-net', 'harness real-time e-markets', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(2, 'Ervin Howell', 'Antonette', 'Shanna@melissa.tv', 'Victor Plains', 'Suite 879', 'Wisokyburgh', '90566-7771', -43.950900, -34.461800, '010-692-6593 x09125', 'anastasia.net', 'Deckow-Crist', 'Proactive didactic contingency', 'synergize scalable supply-chains', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(3, 'Clementine Bauch', 'Samantha', 'Nathan@yesenia.net', 'Douglas Extension', 'Suite 847', 'McKenziehaven', '59590-4157', -68.610200, -47.065300, '1-463-123-4447', 'ramiro.info', 'Romaguera-Jacobson', 'Face to face bifurcated interface', 'e-enable strategic applications', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(4, 'Patricia Lebsack', 'Karianne', 'Julianne.OConner@kory.org', 'Hoeger Mall', 'Apt. 692', 'South Elvis', '53919-4257', 29.457200, -164.299000, '493-170-9623 x156', 'kale.biz', 'Robel-Corkery', 'Multi-tiered zero tolerance productivity', 'transition cutting-edge web services', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(5, 'Chelsey Dietrich', 'Kamren', 'Lucio_Hettinger@annie.ca', 'Skiles Walks', 'Suite 351', 'Roscoeview', '33263', -31.812900, 62.534200, '(254)954-1289', 'demarco.info', 'Keebler LLC', 'User-centric fault-tolerant solution', 'revolutionize end-to-end systems', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(6, 'Mrs. Dennis Schulist', 'Leopoldo_Corkery', 'Karley_Dach@jasper.info', 'Norberto Crossing', 'Apt. 950', 'South Christy', '23505-1337', -71.419700, 71.747800, '1-477-935-8478 x6430', 'ola.org', 'Considine-Lockman', 'Synchronised bottom-line interface', 'e-enable innovative applications', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(7, 'Kurtis Weissnat', 'Elwyn.Skiles', 'Telly.Hoeger@billy.biz', 'Rex Trail', 'Suite 280', 'Howemouth', '58804-1099', 24.891800, 21.898400, '210.067.6132', 'elvis.io', 'Johns Group', 'Configurable multimedia task-force', 'generate enterprise e-tailers', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(8, 'Nicholas Runolfsdottir V', 'Maxime_Nienow', 'Sherwood@rosamond.me', 'Ellsworth Summit', 'Suite 729', 'Aliyaview', '45169', -14.399000, -120.767700, '586.493.6943 x140', 'jacynthe.com', 'Abernathy Group', 'Implemented secondary concept', 'e-enable extensible e-tailers', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(9, 'Glenna Reichert', 'Delphine', 'Chaim_McDermott@dana.io', 'Dayna Park', 'Suite 449', 'Bartholomebury', '76495-3109', 24.646300, -168.888900, '(775)976-6794 x41206', 'conrad.com', 'Yost and Sons', 'Switchable contextually-based project', 'aggregate real-time technologies', '2023-03-26 08:21:48', '2023-03-26 08:21:48'),
	(10, 'Clementina DuBuque', 'Moriah.Stanton', 'Rey.Padberg@karina.biz', 'Kattie Turnpike', 'Suite 198', 'Lebsackbury', '31428-2261', -38.238600, 57.223200, '024-648-3804', 'ambrose.net', 'Hoeger LLC', 'Centralized empowering task-force', 'target end-to-end models', '2023-03-26 08:21:48', '2023-03-26 08:21:48');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
