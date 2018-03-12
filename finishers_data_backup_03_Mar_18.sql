CREATE DATABASE IF NOT EXISTS finishers;

USE finishers;

DROP TABLE IF EXISTS login_activity;

CREATE TABLE `login_activity` (
  `activity_id` varchar(15) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `activity_details` text NOT NULL,
  `activity_date_time` datetime NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_activity VALUES("act_id_010318_1","Admin","Logged out of the system.","2018-03-01 08:39:51");
INSERT INTO login_activity VALUES("act_id_010318_4","Admin","Logged into the system.","2018-03-01 08:35:04");
INSERT INTO login_activity VALUES("act_id_010318_5","Admin","System was able to succesfully verify you as the user with the name: Admin","2018-03-01 10:36:25");
INSERT INTO login_activity VALUES("act_id_020318_1","Admin","Logged out of the system.","2018-03-02 04:57:31");
INSERT INTO login_activity VALUES("act_id_020318_5","Admin","Logged into the system.","2018-03-02 04:55:15");
INSERT INTO login_activity VALUES("act_id_030318_8","Admin","Logged into the system.","2018-03-03 12:16:38");
INSERT INTO login_activity VALUES("act_id_280218_1","Nana Gyan","Logged out of the system.","2018-02-28 01:49:31");
INSERT INTO login_activity VALUES("act_id_280218_2","Nana Gyan","Logged out of the system.","2018-02-28 11:02:02");
INSERT INTO login_activity VALUES("act_id_280218_3","Admin","Logged out of the system.","2018-02-28 11:18:33");
INSERT INTO login_activity VALUES("act_id_280218_4","Admin","Logged out of the system.","2018-02-28 04:15:44");
INSERT INTO login_activity VALUES("act_id_280218_6","Admin","Logged out of the system.","2018-02-28 11:00:16");
INSERT INTO login_activity VALUES("act_id_280218_7","Admin","Logged into the system.","2018-02-28 01:50:17");
INSERT INTO login_activity VALUES("act_id_280218_9","Nana Gyan","Logged into the system.","2018-02-28 01:49:59");



DROP TABLE IF EXISTS login_details;

CREATE TABLE `login_details` (
  `login_id` varchar(15) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_details VALUES("log_010318_1860","Admin","2018-03-01 05:11:21","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_010318_4079","Admin","2018-03-01 08:35:04","2018-03-01 08:39:51");
INSERT INTO login_details VALUES("log_020318_5116","Admin","2018-03-02 04:55:15","2018-03-02 04:57:31");
INSERT INTO login_details VALUES("log_030318_8975","Admin","2018-03-03 12:16:38","0000-00-00 00:00:00");
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
INSERT INTO login_details VALUES("log_240218_2229","Admin","2018-02-24 10:53:42","2018-02-24 10:57:30");
INSERT INTO login_details VALUES("log_260218_0914","Admin","2018-02-26 11:29:50","2018-02-26 11:31:03");
INSERT INTO login_details VALUES("log_260218_1049","Admin","2018-02-26 04:36:41","2018-02-26 10:14:27");
INSERT INTO login_details VALUES("log_260218_1944","Admin","2018-02-26 11:34:51","2018-02-26 11:36:47");
INSERT INTO login_details VALUES("log_260218_5264","Admin","2018-02-26 11:37:05","2018-02-26 11:42:28");
INSERT INTO login_details VALUES("log_260218_6532","Admin","2018-02-26 10:59:16","2018-02-26 11:27:54");
INSERT INTO login_details VALUES("log_260218_6804","Admin","2018-02-26 11:28:06","2018-02-26 11:29:27");
INSERT INTO login_details VALUES("log_270218_2638","Admin","2018-02-27 02:32:42","2018-02-27 02:32:55");
INSERT INTO login_details VALUES("log_270218_4667","Admin","2018-02-27 10:41:04","2018-02-27 11:23:08");
INSERT INTO login_details VALUES("log_270218_5908","Admin","2018-02-27 02:28:15","2018-02-27 02:30:15");
INSERT INTO login_details VALUES("log_280218_0615","Admin","2018-02-28 10:59:20","2018-02-28 10:59:44");
INSERT INTO login_details VALUES("log_280218_1021","Nana Gyan","2018-02-28 01:33:21","2018-02-28 01:35:45");
INSERT INTO login_details VALUES("log_280218_1158","Admin","2018-02-28 10:01:51","2018-02-28 01:33:12");
INSERT INTO login_details VALUES("log_280218_4225","Nana Gyan","2018-02-28 11:00:24","2018-02-28 11:01:37");
INSERT INTO login_details VALUES("log_280218_4251","Nana Gyan","2018-02-28 01:38:44","2018-02-28 01:49:31");
INSERT INTO login_details VALUES("log_280218_5381","Admin","2018-02-28 08:10:35","2018-02-28 08:25:24");
INSERT INTO login_details VALUES("log_280218_6035","Nana Gyan","2018-02-28 11:01:46","2018-02-28 11:02:02");
INSERT INTO login_details VALUES("log_280218_7122","Admin","2018-02-28 01:50:17","2018-02-28 04:15:44");
INSERT INTO login_details VALUES("log_280218_7335","Admin","2018-02-28 11:02:17","2018-02-28 11:18:32");
INSERT INTO login_details VALUES("log_280218_8025","Admin","2018-02-28 11:00:08","2018-02-28 11:00:16");
INSERT INTO login_details VALUES("log_280218_9912","Nana Gyan","2018-02-28 01:49:59","2018-02-28 01:50:09");



DROP TABLE IF EXISTS login_security;

CREATE TABLE `login_security` (
  `user_name` varchar(200) NOT NULL,
  `security_question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`user_name`)
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



DROP TABLE IF EXISTS user_privileges;

CREATE TABLE `user_privileges` (
  `user_name` varchar(200) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `can_add_user` tinyint(1) NOT NULL,
  `can_edit_user` tinyint(1) NOT NULL,
  `can_back_up_data` tinyint(1) NOT NULL,
  `can_view_user_activity` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
