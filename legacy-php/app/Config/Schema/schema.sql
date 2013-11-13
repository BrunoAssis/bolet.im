

DROP TABLE IF EXISTS `boletim`.`batch_grades`;
DROP TABLE IF EXISTS `boletim`.`batches`;
DROP TABLE IF EXISTS `boletim`.`courses`;
DROP TABLE IF EXISTS `boletim`.`grades`;
DROP TABLE IF EXISTS `boletim`.`periods`;
DROP TABLE IF EXISTS `boletim`.`school_grades`;
DROP TABLE IF EXISTS `boletim`.`schools`;
DROP TABLE IF EXISTS `boletim`.`students`;
DROP TABLE IF EXISTS `boletim`.`subjects`;
DROP TABLE IF EXISTS `boletim`.`users`;
DROP TABLE IF EXISTS `boletim`.`years`;


CREATE TABLE `boletim`.`batch_grades` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`subject_id` int(10) NOT NULL,
	`batch_id` int(10) NOT NULL,
	`period_id` int(10) NOT NULL,
	`grade` float(5,3) NOT NULL,
	`cumulative_avg` float(5,3) DEFAULT NULL,
	`students_number` int(10) NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `batch_grade_subject` (`subject_id`),
	KEY `batch_grade_batch` (`batch_id`),
	KEY `batch_grade_period` (`period_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`batches` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`school_id` int(10) NOT NULL,
	`course_id` int(10) NOT NULL,
	`year_id` int(10) NOT NULL,
	`description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL COMMENT '			',
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `batch_school` (`school_id`),
	KEY `batch_couse` (`course_id`),
	KEY `batch_year` (`year_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`courses` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`level` int(11) DEFAULT NULL,
	`description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`abbr` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`grades` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`student_id` int(10) NOT NULL,
	`subject_id` int(10) NOT NULL,
	`batch_id` int(10) NOT NULL,
	`period_id` int(10) NOT NULL,
	`grade` float(5,3) NOT NULL,
	`batch_ranking` int(10) DEFAULT NULL,
	`school_ranking` int(10) DEFAULT NULL,
	`cumulative_avg` float(5,3) DEFAULT NULL,
	`cumulative_avg_batch_ranking` int(10) DEFAULT NULL,
	`cumulative_avg_school_ranking` int(10) DEFAULT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `grade_student` (`student_id`),
	KEY `grade_subject` (`subject_id`),
	KEY `grade_batch` (`batch_id`),
	KEY `grade_period` (`period_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`periods` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`year_id` int(10) NOT NULL,
	`order` int(10) NOT NULL,
	`description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`abbr` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`start_date` date NOT NULL,
	`end_date` date NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `period_year` (`year_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`school_grades` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`subject_id` int(10) NOT NULL,
	`school_id` int(10) NOT NULL,
	`period_id` int(10) NOT NULL,
	`grade` float(5,3) NOT NULL,
	`cumulative_avg` float(5,3) DEFAULT NULL,
	`students_number` int(10) NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `school_grade_subject` (`subject_id`),
	KEY `school_grade_school` (`school_id`),
	KEY `school_grade_period` (`period_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`schools` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`students` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`user_id` int(10) DEFAULT NULL,
	`school_id` int(10) NOT NULL,
	`batch_id` int(10) NOT NULL,
	`name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`birthdate` date NOT NULL,
	`students_registry` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	KEY `student_user` (`user_id`),
	KEY `student_school` (`school_id`),
	KEY `student_batch` (`batch_id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`subjects` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`description` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`group` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email_verified` tinyint(1) NOT NULL,
	`email_token` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`active` tinyint(1) NOT NULL,
	`last_login` datetime NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`),
	UNIQUE KEY `email_unique` (`email`),
	KEY `by_email` (`email`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `boletim`.`years` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`year` int(4) NOT NULL,
	`created` datetime NOT NULL,
	`created_user_id` int(10) NOT NULL,
	`modified` datetime NOT NULL,
	`modified_user_id` int(10) NOT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

