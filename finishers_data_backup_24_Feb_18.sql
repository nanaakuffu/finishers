CREATE DATABASE IF NOT EXISTS finishers;

USE finishers;

DROP TABLE IF EXISTS login_activity;

CREATE TABLE `login_activity` (
  `activity_id` varchar(15) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `activity_details` text NOT NULL,
  `activity_date_time` datetime NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `user_name` (`user_name`),
  CONSTRAINT `login_activity_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_activity VALUES("act_id_170218_0","Admin","Added Admin as new user","2018-02-17 10:02:00");
INSERT INTO login_activity VALUES("act_id_200218_5","Admin","Added a new user: Nana Gyan","2018-02-20 10:02:00");
INSERT INTO login_activity VALUES("act_id_210218_0","Admin","Updated your account details","2018-02-21 04:02:00");
INSERT INTO login_activity VALUES("act_id_210218_6","Admin","Updated your account details","2018-02-21 04:02:00");
INSERT INTO login_activity VALUES("act_id_210218_8","Admin","Updated your account details","2018-02-21 03:02:00");



DROP TABLE IF EXISTS login_details;

CREATE TABLE `login_details` (
  `login_id` varchar(15) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `user_name` (`user_name`),
  CONSTRAINT `login_details_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_details VALUES("log_210218_1024","Admin","2018-02-21 03:43:21","2018-02-21 03:47:30");
INSERT INTO login_details VALUES("log_210218_1226","Admin","2018-02-21 04:17:01","2018-02-21 04:58:17");
INSERT INTO login_details VALUES("log_210218_1724","Admin","2018-02-21 09:17:51","2018-02-21 09:19:28");
INSERT INTO login_details VALUES("log_210218_2529","Admin","2018-02-21 07:54:12","2018-02-21 08:54:02");
INSERT INTO login_details VALUES("log_210218_3374","Admin","2018-02-21 09:25:33","2018-02-21 09:27:06");
INSERT INTO login_details VALUES("log_210218_5016","Admin","2018-02-21 04:15:05","2018-02-21 04:16:54");
INSERT INTO login_details VALUES("log_210218_6979","Admin","2018-02-21 05:16:36","2018-02-21 05:26:06");
INSERT INTO login_details VALUES("log_210218_8054","Admin","2018-02-21 03:48:28","2018-02-21 03:52:09");
INSERT INTO login_details VALUES("log_220218_1369","Admin","2018-02-22 09:53:51","2018-02-22 10:49:00");
INSERT INTO login_details VALUES("log_220218_3326","Admin","2018-02-22 08:57:13","2018-02-22 09:53:44");
INSERT INTO login_details VALUES("log_220218_5133","Admin","2018-02-22 04:28:35","2018-02-22 04:39:20");
INSERT INTO login_details VALUES("log_220218_7764","Admin","2018-02-22 08:31:17","2018-02-22 08:57:07");
INSERT INTO login_details VALUES("log_220218_7804","Admin","2018-02-22 04:41:27","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_230218_0312","Admin","2018-02-23 10:42:10","2018-02-23 11:10:53");
INSERT INTO login_details VALUES("log_230218_5986","Admin","2018-02-23 03:41:35","2018-02-23 03:41:42");
INSERT INTO login_details VALUES("log_240218_2229","Admin","2018-02-24 10:53:42","0000-00-00 00:00:00");



DROP TABLE IF EXISTS login_security;

CREATE TABLE `login_security` (
  `user_name` varchar(200) NOT NULL,
  `security_question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`user_name`),
  CONSTRAINT `login_security_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_security VALUES("Admin","When did you go to the College?","852852852062");



DROP TABLE IF EXISTS user_details;

CREATE TABLE `user_details` (
  `user_name` varchar(200) NOT NULL,
  `user_password` text NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL,
  `edited_by` varchar(200) NOT NULL,
  `date_edited` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user_details VALUES("Admin","61261130313721353131313131331138213","Administrator","Nana","Baah","Akuffu","Admin","2018-02-17 10:02:30","Admin","2018-02-21 04:02:15","0");
INSERT INTO user_details VALUES("Nana Gyan","41241138213521333139213921311136213","Administrator","Nana","Baah","Gyan","Admin","2018-02-20 10:02:35","","0000-00-00 00:00:00","0");



