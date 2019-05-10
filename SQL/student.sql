-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table student1.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `test_1` int(11) DEFAULT NULL,
  `test_2` int(11) DEFAULT NULL,
  `test_3` int(11) DEFAULT NULL,
  `term_paper_1` int(11) DEFAULT NULL,
  `term_paper_2` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- Data exporting was unselected.
-- Dumping structure for table student1.infos
CREATE TABLE IF NOT EXISTS `infos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `info` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table student1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table student1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table student1.students


-- Data exporting was unselected.
-- Dumping structure for table student1.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `n_gr` int(11) NOT NULL,
  `type_of_teaching` text COLLATE utf8_unicode_ci NOT NULL,
  `school_year` text COLLATE utf8_unicode_ci NOT NULL,
  `type_of_application` text COLLATE utf8_unicode_ci NOT NULL,
  `term` text COLLATE utf8_unicode_ci NOT NULL,
  `test_1` int(11) NOT NULL DEFAULT '0',
  `test_2` int(11) NOT NULL DEFAULT '0',
  `test_3` int(11) NOT NULL DEFAULT '0',
  `term_paper_1` int(11) NOT NULL DEFAULT '0',
  `term_paper_2` int(11) NOT NULL DEFAULT '0',
  `exam` int(11) NOT NULL DEFAULT '0',
  `espb` int(11) NOT NULL DEFAULT '0',
  `deadline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `signed_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table student1.t_fees


-- Data exporting was unselected.
-- Dumping structure for table student1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `students` (
  `student_id` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_name` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` text COLLATE utf8_unicode_ci NOT NULL,
  `city` text COLLATE utf8_unicode_ci NOT NULL,
  `pin` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `users_id` int(10) unsigned NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` int(11) NOT NULL,
  `mobile_num` int(11) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `students_users_id_foreign` (`users_id`),
  CONSTRAINT `students_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `t_fees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `school_year` text COLLATE utf8_unicode_ci,
  `study_year` text COLLATE utf8_unicode_ci,
  `status_of_registration` text COLLATE utf8_unicode_ci,
  `method_of_registration` text COLLATE utf8_unicode_ci,
  `type_of_payment` text COLLATE utf8_unicode_ci,
  `rate` int(11) DEFAULT NULL,
  `rate_number` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_deadline` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `t_fees_stud_id_foreign` (`stud_id`),
  CONSTRAINT `t_fees_stud_id_foreign` FOREIGN KEY (`stud_id`) REFERENCES `students` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table student1.exams
CREATE TABLE IF NOT EXISTS `exams` (
  `code` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code_stud` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `code_subject` int(10) unsigned NOT NULL,
  `code_act` int(10) unsigned NOT NULL,
  `points` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `espb` int(11) DEFAULT NULL,
  `deadline` text COLLATE utf8_unicode_ci,
  `date` text COLLATE utf8_unicode_ci,
  `signed_by` text COLLATE utf8_unicode_ci,
  `start` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`),
  KEY `exams_code_stud_foreign` (`code_stud`),
  KEY `exams_code_subject_foreign` (`code_subject`),
  KEY `exams_code_act_foreign` (`code_act`),
  CONSTRAINT `exams_code_act_foreign` FOREIGN KEY (`code_act`) REFERENCES `activities` (`id`),
  CONSTRAINT `exams_code_stud_foreign` FOREIGN KEY (`code_stud`) REFERENCES `students` (`student_id`),
  CONSTRAINT `exams_code_subject_foreign` FOREIGN KEY (`code_subject`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
