SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET time_zone = '+00:00';

CREATE DATABASE IF NOT EXISTS finishers;

USE finishers;

DROP TABLE IF EXISTS login_activity;

CREATE TABLE `login_activity` (
  `activity_id` varchar(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `activity_details` text NOT NULL,
  `activity_date_time` datetime NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `user_name` (`user_name`),
  CONSTRAINT `login_activity_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_activity VALUES("act_id_010318_1","Admin","Logged out of the system.","2018-03-01 08:39:51");
INSERT INTO login_activity VALUES("act_id_010318_4","Admin","Logged into the system.","2018-03-01 08:35:04");
INSERT INTO login_activity VALUES("act_id_010318_5","Admin","System was able to succesfully verify you as the user with the name: Admin","2018-03-01 10:36:25");
INSERT INTO login_activity VALUES("act_id_010418_0202","Admin","Logged into the system.","2018-04-01 10:40:20");
INSERT INTO login_activity VALUES("act_id_010418_0696","Admin","Logged into the system.","2018-04-01 08:22:40");
INSERT INTO login_activity VALUES("act_id_010418_0886","Admin","Logged out of the system.","2018-04-01 12:54:40");
INSERT INTO login_activity VALUES("act_id_010418_1068","Admin","Logged out of the system.","2018-04-01 08:50:01");
INSERT INTO login_activity VALUES("act_id_010418_1160","Admin","Logged out of the system.","2018-04-01 01:56:51");
INSERT INTO login_activity VALUES("act_id_010418_1258","Admin","Logged out of the system.","2018-04-01 01:22:01");
INSERT INTO login_activity VALUES("act_id_010418_1306","Admin","Logged out of the system.","2018-04-01 12:40:31");
INSERT INTO login_activity VALUES("act_id_010418_1962","Admin","Logged out of the system.","2018-04-01 07:11:31");
INSERT INTO login_activity VALUES("act_id_010418_3425","Admin","Logged into the system.","2018-04-01 12:27:23");
INSERT INTO login_activity VALUES("act_id_010418_3745","Admin","Logged into the system.","2018-04-01 12:31:13");
INSERT INTO login_activity VALUES("act_id_010418_3917","Admin","Logged out of the system.","2018-04-01 12:59:53");
INSERT INTO login_activity VALUES("act_id_010418_4276","Admin","Logged into the system.","2018-04-01 11:05:24");
INSERT INTO login_activity VALUES("act_id_010418_4720","Admin","Logged out of the system.","2018-04-01 09:17:54");
INSERT INTO login_activity VALUES("act_id_010418_4820","Admin","Logged into the system.","2018-04-01 09:18:04");
INSERT INTO login_activity VALUES("act_id_010418_4894","Admin","Logged out of the system.","2018-04-01 12:23:04");
INSERT INTO login_activity VALUES("act_id_010418_6325","Admin","Logged out of the system.","2018-04-01 12:27:16");
INSERT INTO login_activity VALUES("act_id_010418_6886","Admin","Logged into the system.","2018-04-01 12:54:46");
INSERT INTO login_activity VALUES("act_id_010418_7005","Admin","Logged into the system.","2018-04-01 12:23:27");
INSERT INTO login_activity VALUES("act_id_010418_7009","Admin","Logged out of the system.","2018-04-01 06:10:07");
INSERT INTO login_activity VALUES("act_id_010418_7226","Admin","Logged into the system.","2018-04-01 12:43:47");
INSERT INTO login_activity VALUES("act_id_010418_7250","Admin","Logged into the system.","2018-04-01 06:35:27");
INSERT INTO login_activity VALUES("act_id_010418_7260","Admin","Logged into the system.","2018-04-01 01:57:07");
INSERT INTO login_activity VALUES("act_id_010418_7841","Admin","Added a new payment of 1800 with receipt number 1480771","2018-04-01 09:38:07");
INSERT INTO login_activity VALUES("act_id_010418_8068","Admin","Logged into the system.","2018-04-01 08:50:08");
INSERT INTO login_activity VALUES("act_id_010418_8258","Admin","Logged into the system.","2018-04-01 01:22:08");
INSERT INTO login_activity VALUES("act_id_010418_8306","Admin","Logged into the system.","2018-04-01 12:40:38");
INSERT INTO login_activity VALUES("act_id_010418_8962","Admin","Logged into the system.","2018-04-01 07:11:38");
INSERT INTO login_activity VALUES("act_id_010418_9278","Admin","Logged into the system.","2018-04-01 08:52:09");
INSERT INTO login_activity VALUES("act_id_010418_9330","Admin","Logged out of the system.","2018-04-01 10:12:19");
INSERT INTO login_activity VALUES("act_id_010418_9562","Admin","Logged out of the system.","2018-04-01 09:57:39");
INSERT INTO login_activity VALUES("act_id_010418_9982","Admin","Logged out of the system.","2018-04-01 07:14:59");
INSERT INTO login_activity VALUES("act_id_020318_1","Admin","Logged out of the system.","2018-03-02 04:57:31");
INSERT INTO login_activity VALUES("act_id_020318_5","Admin","Logged into the system.","2018-03-02 04:55:15");
INSERT INTO login_activity VALUES("act_id_020418_0261","Admin","Logged out of the system.","2018-04-02 03:13:40");
INSERT INTO login_activity VALUES("act_id_020418_0346","Admin","Added a new payment of 1000 with receipt number 1480771","2018-04-02 01:47:10");
INSERT INTO login_activity VALUES("act_id_020418_0944","Admin","Logged out of the system.","2018-04-02 01:14:50");
INSERT INTO login_activity VALUES("act_id_020418_1004","Admin","Logged out of the system.","2018-04-02 12:13:21");
INSERT INTO login_activity VALUES("act_id_020418_1226","Admin","Logged into the system.","2018-04-02 01:43:41");
INSERT INTO login_activity VALUES("act_id_020418_2418","Admin","Logged out of the system.","2018-04-02 02:15:42");
INSERT INTO login_activity VALUES("act_id_020418_2770","Admin","Logged into the system.","2018-04-02 11:19:32");
INSERT INTO login_activity VALUES("act_id_020418_3324","Admin","Logged into the system.","2018-04-02 03:57:13");
INSERT INTO login_activity VALUES("act_id_020418_3922","Admin","Logged into the system.","2018-04-02 11:44:53");
INSERT INTO login_activity VALUES("act_id_020418_3940","Admin","Added a new payment of 20 with receipt number 1480771","2018-04-02 11:14:53");
INSERT INTO login_activity VALUES("act_id_020418_4126","Admin","Logged out of the system.","2018-04-02 01:43:34");
INSERT INTO login_activity VALUES("act_id_020418_4222","Admin","Logged into the system.","2018-04-02 11:43:44");
INSERT INTO login_activity VALUES("act_id_020418_5212","Admin","Logged into the system.","2018-04-02 11:42:05");
INSERT INTO login_activity VALUES("act_id_020418_5244","Admin","Logged into the system.","2018-04-02 04:00:25");
INSERT INTO login_activity VALUES("act_id_020418_5311","Admin","Logged into the system.","2018-04-02 11:25:35");
INSERT INTO login_activity VALUES("act_id_020418_5435","Admin","Logged out of the system.","2018-04-02 12:35:45");
INSERT INTO login_activity VALUES("act_id_020418_5553","Admin","Logged into the system.","2018-04-02 03:45:55");
INSERT INTO login_activity VALUES("act_id_020418_5654","Admin","Deleted an order with receipt number ","2018-04-02 01:16:05");
INSERT INTO login_activity VALUES("act_id_020418_5960","Admin","Updated an item with order ID poID_300318_733","2018-04-02 11:18:15");
INSERT INTO login_activity VALUES("act_id_020418_6105","Admin","Deleted an order with receipt number ","2018-04-02 01:23:36");
INSERT INTO login_activity VALUES("act_id_020418_6261","Admin","Logged into the system.","2018-04-02 03:13:46");
INSERT INTO login_activity VALUES("act_id_020418_6404","Admin","Logged into the system.","2018-04-02 12:14:06");
INSERT INTO login_activity VALUES("act_id_020418_6536","Admin","Logged into the system.","2018-04-02 11:59:16");
INSERT INTO login_activity VALUES("act_id_020418_6944","Admin","Logged into the system.","2018-04-02 01:14:56");
INSERT INTO login_activity VALUES("act_id_020418_7453","Admin","Logged out of the system.","2018-04-02 03:45:47");
INSERT INTO login_activity VALUES("act_id_020418_7644","Admin","Logged out of the system.","2018-04-02 04:01:07");
INSERT INTO login_activity VALUES("act_id_020418_7689","Admin","Logged into the system.","2018-04-02 02:44:27");
INSERT INTO login_activity VALUES("act_id_020418_7701","Admin","Logged into the system.","2018-04-02 10:31:17");
INSERT INTO login_activity VALUES("act_id_020418_8418","Admin","Logged into the system.","2018-04-02 02:15:48");
INSERT INTO login_activity VALUES("act_id_020418_8589","Admin","Logged out of the system.","2018-04-02 02:44:18");
INSERT INTO login_activity VALUES("act_id_020418_8839","Admin","Logged into the system.","2018-04-02 10:56:28");
INSERT INTO login_activity VALUES("act_id_020418_9436","Admin","Logged out of the system.","2018-04-02 11:59:09");
INSERT INTO login_activity VALUES("act_id_020418_9696","Admin","Added a new payment of 150 with receipt number 1480771","2018-04-02 01:56:09");
INSERT INTO login_activity VALUES("act_id_020418_9954","Admin","Logged out of the system.","2018-04-02 04:03:19");
INSERT INTO login_activity VALUES("act_id_030318_8","Admin","Logged into the system.","2018-03-03 12:16:38");
INSERT INTO login_activity VALUES("act_id_030418_0921","Admin","Logged out of the system.","2018-04-03 11:34:50");
INSERT INTO login_activity VALUES("act_id_030418_1051","Admin","Added Rimula 15W/40 item for the order poID_030418_3721","2018-04-03 08:51:41");
INSERT INTO login_activity VALUES("act_id_030418_1601","Admin","Added Barrels item for the order poID_030418_5890","2018-04-03 08:44:21");
INSERT INTO login_activity VALUES("act_id_030418_1719","Admin","Updated an order with receipt number 12456","2018-04-03 12:46:11");
INSERT INTO login_activity VALUES("act_id_030418_1896","Admin","Added a new order totalling ","2018-04-03 07:36:21");
INSERT INTO login_activity VALUES("act_id_030418_2309","Admin","Deleted an order with receipt number 61245","2018-04-03 12:43:52");
INSERT INTO login_activity VALUES("act_id_030418_3000","Admin","Logged into the system.","2018-04-03 08:26:43");
INSERT INTO login_activity VALUES("act_id_030418_3150","Admin","Logged out of the system.","2018-04-03 03:01:53");
INSERT INTO login_activity VALUES("act_id_030418_3201","Admin","Added HPV Oil item for the order poID_030418_5890","2018-04-03 08:43:43");
INSERT INTO login_activity VALUES("act_id_030418_3268","Admin","Logged out of the system.","2018-04-03 08:03:43");
INSERT INTO login_activity VALUES("act_id_030418_3414","Admin","Logged into the system.","2018-04-03 09:35:43");
INSERT INTO login_activity VALUES("act_id_030418_3640","Admin","Added Oil item for the order poID_030418_6240","2018-04-03 08:34:23");
INSERT INTO login_activity VALUES("act_id_030418_3721","Admin","Added a new order totalling ","2018-04-03 08:47:53");
INSERT INTO login_activity VALUES("act_id_030418_3786","Admin","Logged into the system.","2018-04-03 07:34:33");
INSERT INTO login_activity VALUES("act_id_030418_4119","Admin","Deleted an order with receipt number 125690","2018-04-03 12:45:14");
INSERT INTO login_activity VALUES("act_id_030418_4314","Admin","Logged out of the system.","2018-04-03 09:35:34");
INSERT INTO login_activity VALUES("act_id_030418_4377","Admin","Added a new order totalling ","2018-04-03 07:48:54");
INSERT INTO login_activity VALUES("act_id_030418_4781","Admin","Added a new payment of 1000 with receipt number 14807701","2018-04-03 08:57:54");
INSERT INTO login_activity VALUES("act_id_030418_5110","Admin","Added a new order totalling ","2018-04-03 08:28:35");
INSERT INTO login_activity VALUES("act_id_030418_5250","Admin","Logged into the system.","2018-04-03 03:02:05");
INSERT INTO login_activity VALUES("act_id_030418_5890","Admin","Added a new order totalling ","2018-04-03 08:43:05");
INSERT INTO login_activity VALUES("act_id_030418_6240","Admin","Added a new order totalling ","2018-04-03 08:33:46");
INSERT INTO login_activity VALUES("act_id_030418_6331","Admin","Added Spirax A 80W/90 item for the order poID_030418_3721","2018-04-03 08:48:56");
INSERT INTO login_activity VALUES("act_id_030418_6439","Admin","Logged into the system.","2018-04-03 12:49:06");
INSERT INTO login_activity VALUES("act_id_030418_7731","Admin","Added Tellus 68 item for the order poID_030418_3721","2018-04-03 08:49:37");
INSERT INTO login_activity VALUES("act_id_030418_8109","Admin","Deleted an order with receipt number 0","2018-04-03 12:43:38");
INSERT INTO login_activity VALUES("act_id_030418_8139","Admin","Logged out of the system.","2018-04-03 12:48:38");
INSERT INTO login_activity VALUES("act_id_030418_8388","Admin","Logged out of the system.","2018-04-03 08:07:18");
INSERT INTO login_activity VALUES("act_id_030418_8509","Admin","Deleted an item with ID itemID_300318_4","2018-04-03 12:44:18");
INSERT INTO login_activity VALUES("act_id_030418_8647","Admin","Added a new order totalling ","2018-04-03 07:44:28");
INSERT INTO login_activity VALUES("act_id_030418_8888","Admin","Logged into the system.","2018-04-03 12:41:28");
INSERT INTO login_activity VALUES("act_id_030418_8921","Admin","Logged into the system.","2018-04-03 11:34:58");
INSERT INTO login_activity VALUES("act_id_030418_8968","Admin","Logged out of the system.","2018-04-03 12:38:18");
INSERT INTO login_activity VALUES("act_id_030418_9009","Admin","Deleted an order with receipt number 32317","2018-04-03 12:43:29");
INSERT INTO login_activity VALUES("act_id_030418_9051","Admin","Logged into the system.","2018-04-03 08:51:49");
INSERT INTO login_activity VALUES("act_id_030418_9368","Admin","Logged into the system.","2018-04-03 08:03:59");
INSERT INTO login_activity VALUES("act_id_030418_9410","Admin","Added Bolts item for the order poID_030418_5110","2018-04-03 08:29:09");
INSERT INTO login_activity VALUES("act_id_040318_1","Admin","Logged into the system.","2018-03-04 09:43:21");
INSERT INTO login_activity VALUES("act_id_040318_8","Admin","Logged out of the system.","2018-03-04 09:43:38");
INSERT INTO login_activity VALUES("act_id_040418_1688","Admin","Logged into the system.","2018-04-04 11:54:21");
INSERT INTO login_activity VALUES("act_id_040418_1764","Admin","Logged out of the system.","2018-04-04 07:57:51");
INSERT INTO login_activity VALUES("act_id_040418_2155","Admin","Updated an item with order ID poID_030418_3721","2018-04-04 08:11:52");
INSERT INTO login_activity VALUES("act_id_040418_3945","Admin","Updated an item with order ID poID_030418_3721","2018-04-04 08:11:33");
INSERT INTO login_activity VALUES("act_id_040418_4325","Admin","Logged into the system.","2018-04-04 08:07:14");
INSERT INTO login_activity VALUES("act_id_040418_4460","Admin","Logged out of the system.","2018-04-04 06:50:44");
INSERT INTO login_activity VALUES("act_id_040418_4765","Admin","Logged into the system.","2018-04-04 02:41:14");
INSERT INTO login_activity VALUES("act_id_040418_7660","Admin","Logged into the system.","2018-04-04 06:51:07");
INSERT INTO login_activity VALUES("act_id_040418_7973","Admin","Logged out of the system.","2018-04-04 12:16:37");
INSERT INTO login_activity VALUES("act_id_040418_9448","Admin","Logged out of the system.","2018-04-04 11:47:29");
INSERT INTO login_activity VALUES("act_id_050418_0533","Admin","Logged out of the system.","2018-04-05 08:35:50");
INSERT INTO login_activity VALUES("act_id_050418_0659","Admin","Logged out of the system.","2018-04-05 11:12:40");
INSERT INTO login_activity VALUES("act_id_050418_0805","Admin","Logged out of the system.","2018-04-05 01:38:00");
INSERT INTO login_activity VALUES("act_id_050418_1139","Admin","Added HPV Oil item for the order poID_050418_7078","2018-04-05 10:15:11");
INSERT INTO login_activity VALUES("act_id_050418_1778","Admin","Logged into the system.","2018-04-05 07:19:31");
INSERT INTO login_activity VALUES("act_id_050418_2521","Admin","Added HPV Oil item for the order poID_050418_3221","2018-04-05 10:47:32");
INSERT INTO login_activity VALUES("act_id_050418_2891","Admin","Logged out of the system.","2018-04-05 12:46:22");
INSERT INTO login_activity VALUES("act_id_050418_2911","Admin","Logged into the system.","2018-04-05 10:46:32");
INSERT INTO login_activity VALUES("act_id_050418_2953","Admin","Logged into the system.","2018-04-05 01:13:12");
INSERT INTO login_activity VALUES("act_id_050418_2991","Admin","Logged into the system.","2018-04-05 12:46:32");
INSERT INTO login_activity VALUES("act_id_050418_3221","Admin","Added a new order totalling ","2018-04-05 10:47:03");
INSERT INTO login_activity VALUES("act_id_050418_3853","Admin","Logged out of the system.","2018-04-05 01:13:03");
INSERT INTO login_activity VALUES("act_id_050418_4669","Admin","Logged into the system.","2018-04-05 11:14:24");
INSERT INTO login_activity VALUES("act_id_050418_5307","Admin","Logged into the system.","2018-04-05 09:37:15");
INSERT INTO login_activity VALUES("act_id_050418_5439","Admin","Added Barrels item for the order poID_050418_7078","2018-04-05 10:15:45");
INSERT INTO login_activity VALUES("act_id_050418_5578","Admin","Logged out of the system.","2018-04-05 07:19:15");
INSERT INTO login_activity VALUES("act_id_050418_5740","Admin","Logged into the system.","2018-04-05 12:21:15");
INSERT INTO login_activity VALUES("act_id_050418_6568","Admin","Logged out of the system.","2018-04-05 10:04:16");
INSERT INTO login_activity VALUES("act_id_050418_6668","Admin","Logged into the system.","2018-04-05 10:04:26");
INSERT INTO login_activity VALUES("act_id_050418_7078","Admin","Added a new order totalling ","2018-04-05 10:05:07");
INSERT INTO login_activity VALUES("act_id_050418_7081","Admin","Logged out of the system.","2018-04-05 11:50:07");
INSERT INTO login_activity VALUES("act_id_050418_7450","Admin","Logged out of the system.","2018-04-05 11:29:07");
INSERT INTO login_activity VALUES("act_id_050418_7708","Admin","Logged into the system.","2018-04-05 07:07:57");
INSERT INTO login_activity VALUES("act_id_050418_7928","Admin","Updated an item with order ID poID_030418_3721","2018-04-05 09:58:17");
INSERT INTO login_activity VALUES("act_id_050418_8449","Admin","Logged out of the system.","2018-04-05 10:17:28");
INSERT INTO login_activity VALUES("act_id_050418_8640","Admin","Logged out of the system.","2018-04-05 12:21:08");
INSERT INTO login_activity VALUES("act_id_050418_9271","Admin","Logged into the system.","2018-04-05 11:48:49");
INSERT INTO login_activity VALUES("act_id_050418_9445","Admin","Logged into the system.","2018-04-05 01:44:09");
INSERT INTO login_activity VALUES("act_id_050418_9821","Admin","Added HPV Oil item for the order poID_050418_3221","2018-04-05 10:48:09");
INSERT INTO login_activity VALUES("act_id_060418_0016","Admin","Added a new order totalling ","2018-04-06 04:48:20");
INSERT INTO login_activity VALUES("act_id_060418_0145","Admin","Added HPV Oil item for the order poID_060418_3935","2018-04-06 10:10:10");
INSERT INTO login_activity VALUES("act_id_060418_0166","Admin","Added Barrels item for the order poID_060418_9956","2018-04-06 10:30:10");
INSERT INTO login_activity VALUES("act_id_060418_0376","Admin","Logged out of the system.","2018-04-06 10:32:10");
INSERT INTO login_activity VALUES("act_id_060418_0398","Admin","Deleted an order with receipt number 12345","2018-04-06 05:35:30");
INSERT INTO login_activity VALUES("act_id_060418_1086","Admin","Added HPV Oil item for the order poID_060418_2576","2018-04-06 10:33:21");
INSERT INTO login_activity VALUES("act_id_060418_1476","Admin","Logged into the system.","2018-04-06 10:32:21");
INSERT INTO login_activity VALUES("act_id_060418_1745","Admin","Logged into the system.","2018-04-06 07:24:31");
INSERT INTO login_activity VALUES("act_id_060418_1786","Admin","Logged out of the system.","2018-04-06 10:34:31");
INSERT INTO login_activity VALUES("act_id_060418_1898","Admin","Deleted an order with receipt number 0","2018-04-06 05:36:21");
INSERT INTO login_activity VALUES("act_id_060418_2143","Admin","Logged into the system.","2018-04-06 04:03:32");
INSERT INTO login_activity VALUES("act_id_060418_2543","Admin","Added Barrels item for the order poID_060418_2143","2018-04-06 06:50:52");
INSERT INTO login_activity VALUES("act_id_060418_2576","Admin","Added a new order totalling ","2018-04-06 10:32:32");
INSERT INTO login_activity VALUES("act_id_060418_2586","Admin","Logged out of the system.","2018-04-06 05:00:52");
INSERT INTO login_activity VALUES("act_id_060418_2645","Admin","Logged out of the system.","2018-04-06 07:24:22");
INSERT INTO login_activity VALUES("act_id_060418_2809","Admin","Logged out of the system.","2018-04-06 05:38:02");
INSERT INTO login_activity VALUES("act_id_060418_3143","Admin","Added a new order totalling ","2018-04-06 06:50:13");
INSERT INTO login_activity VALUES("act_id_060418_3525","Admin","Added a new order totalling ","2018-04-06 10:07:33");
INSERT INTO login_activity VALUES("act_id_060418_3566","Admin","Logged into the system.","2018-04-06 11:24:13");
INSERT INTO login_activity VALUES("act_id_060418_3935","Admin","Added a new order totalling ","2018-04-06 10:09:53");
INSERT INTO login_activity VALUES("act_id_060418_4249","Admin","Logged out of the system.","2018-04-06 01:03:44");
INSERT INTO login_activity VALUES("act_id_060418_4368","Admin","Logged into the system.","2018-04-06 05:30:34");
INSERT INTO login_activity VALUES("act_id_060418_4455","Admin","Added a new order totalling ","2018-04-06 07:25:44");
INSERT INTO login_activity VALUES("act_id_060418_4758","Admin","Logged out of the system.","2018-04-06 05:29:34");
INSERT INTO login_activity VALUES("act_id_060418_5342","Admin","Logged into the system.","2018-04-06 06:33:55");
INSERT INTO login_activity VALUES("act_id_060418_5555","Admin","Added Barrels item for the order poID_060418_4455","2018-04-06 07:25:55");
INSERT INTO login_activity VALUES("act_id_060418_5676","Admin","Added Barrels item for the order poID_060418_2576","2018-04-06 10:32:45");
INSERT INTO login_activity VALUES("act_id_060418_5686","Admin","Deleted an order with receipt number 12345","2018-04-06 10:34:25");
INSERT INTO login_activity VALUES("act_id_060418_5826","Admin","Added a new order totalling ","2018-04-06 10:24:45");
INSERT INTO login_activity VALUES("act_id_060418_6386","Admin","Added Rimula 15W/40 item for the order poID_060418_2576","2018-04-06 10:33:56");
INSERT INTO login_activity VALUES("act_id_060418_6454","Admin","Added a new order totalling ","2018-04-06 04:22:26");
INSERT INTO login_activity VALUES("act_id_060418_6735","Admin","Logged into the system.","2018-04-06 04:36:16");
INSERT INTO login_activity VALUES("act_id_060418_7423","Admin","Added Barrels item for the order poID_060418_9223","2018-04-06 06:47:27");
INSERT INTO login_activity VALUES("act_id_060418_7586","Admin","Deleted an order with receipt number 12","2018-04-06 10:34:17");
INSERT INTO login_activity VALUES("act_id_060418_7926","Admin","Added Barrels item for the order poID_060418_5826","2018-04-06 10:24:57");
INSERT INTO login_activity VALUES("act_id_060418_8009","Admin","Deleted an order with receipt number 1234567","2018-04-06 05:36:48");
INSERT INTO login_activity VALUES("act_id_060418_8225","Admin","Logged into the system.","2018-04-06 10:07:08");
INSERT INTO login_activity VALUES("act_id_060418_8345","Admin","Added Barrels item for the order poID_060418_3935","2018-04-06 10:10:38");
INSERT INTO login_activity VALUES("act_id_060418_8845","Admin","Added a new order totalling ","2018-04-06 07:24:48");
INSERT INTO login_activity VALUES("act_id_060418_9076","Admin","Added a new order totalling ","2018-04-06 04:58:29");
INSERT INTO login_activity VALUES("act_id_060418_9223","Admin","Added a new order totalling ","2018-04-06 06:47:09");
INSERT INTO login_activity VALUES("act_id_060418_9242","Admin","Logged out of the system.","2018-04-06 06:33:49");
INSERT INTO login_activity VALUES("act_id_060418_9607","Admin","Logged into the system.","2018-04-06 05:04:29");
INSERT INTO login_activity VALUES("act_id_060418_9635","Admin","Logged out of the system.","2018-04-06 04:36:09");
INSERT INTO login_activity VALUES("act_id_060418_9660","Admin","Logged into the system.","2018-04-06 06:04:29");
INSERT INTO login_activity VALUES("act_id_060418_9956","Admin","Added a new order totalling ","2018-04-06 10:29:59");
INSERT INTO login_activity VALUES("act_id_070418_0733","Admin","Added a new order totalling ","2018-04-07 05:02:50");
INSERT INTO login_activity VALUES("act_id_070418_2131","Admin","Logged into the system.","2018-04-07 01:41:52");
INSERT INTO login_activity VALUES("act_id_070418_2214","Admin","Logged into the system.","2018-04-07 11:42:02");
INSERT INTO login_activity VALUES("act_id_070418_2343","Admin","Added a new order totalling ","2018-04-07 05:03:52");
INSERT INTO login_activity VALUES("act_id_070418_3446","Admin","Logged out of the system.","2018-04-07 03:07:23");
INSERT INTO login_activity VALUES("act_id_070418_3590","Admin","Logged out of the system.","2018-04-07 04:22:33");
INSERT INTO login_activity VALUES("act_id_070418_4059","Admin","Logged into the system.","2018-04-07 03:58:24");
INSERT INTO login_activity VALUES("act_id_070418_4232","Admin","Logged into the system.","2018-04-07 11:12:04");
INSERT INTO login_activity VALUES("act_id_070418_4949","Admin","Logged out of the system.","2018-04-07 03:58:14");
INSERT INTO login_activity VALUES("act_id_070418_5031","Admin","Logged out of the system.","2018-04-07 01:41:45");
INSERT INTO login_activity VALUES("act_id_070418_5043","Admin","Added Barrels item for the order poID_070418_0733","2018-04-07 05:03:25");
INSERT INTO login_activity VALUES("act_id_070418_5318","Admin","Logged into the system.","2018-04-07 03:35:35");
INSERT INTO login_activity VALUES("act_id_070418_6672","Admin","Logged into the system.","2018-04-07 04:52:46");
INSERT INTO login_activity VALUES("act_id_070418_6843","Admin","Added a new order totalling ","2018-04-07 05:04:46");
INSERT INTO login_activity VALUES("act_id_070418_7072","Admin","Logged out of the system.","2018-04-07 04:51:47");
INSERT INTO login_activity VALUES("act_id_070418_7893","Admin","Logged out of the system.","2018-04-07 11:39:47");
INSERT INTO login_activity VALUES("act_id_070418_8121","Admin","Logged into the system.","2018-04-07 04:26:58");
INSERT INTO login_activity VALUES("act_id_070418_8218","Admin","Logged out of the system.","2018-04-07 03:35:28");
INSERT INTO login_activity VALUES("act_id_070418_8572","Admin","Logged out of the system.","2018-04-07 04:52:38");
INSERT INTO login_activity VALUES("act_id_070418_9446","Admin","Logged into the system.","2018-04-07 03:07:29");
INSERT INTO login_activity VALUES("act_id_070418_9643","Admin","Added a new order totalling ","2018-04-07 05:04:29");
INSERT INTO login_activity VALUES("act_id_070418_9833","Admin","Added Barrels item for the order poID_070418_0733","2018-04-07 05:03:09");
INSERT INTO login_activity VALUES("act_id_190318_2","Admin","Logged into the system.","2018-03-19 08:33:32");
INSERT INTO login_activity VALUES("act_id_190318_4","Admin","Logged into the system.","2018-03-19 09:14:54");
INSERT INTO login_activity VALUES("act_id_190318_5","Admin","Logged out of the system.","2018-03-19 08:34:05");
INSERT INTO login_activity VALUES("act_id_190318_9","Admin","Logged out of the system.","2018-03-19 09:20:59");
INSERT INTO login_activity VALUES("act_id_200318_4","Admin","Logged into the system.","2018-03-20 09:34:34");
INSERT INTO login_activity VALUES("act_id_200318_5","Admin","Logged out of the system.","2018-03-20 10:42:25");
INSERT INTO login_activity VALUES("act_id_200318_7","Admin","Logged out of the system.","2018-03-20 08:41:47");
INSERT INTO login_activity VALUES("act_id_230318_4","Admin","Logged into the system.","2018-03-23 07:19:44");
INSERT INTO login_activity VALUES("act_id_230318_6","Admin","Logged out of the system.","2018-03-23 07:20:26");
INSERT INTO login_activity VALUES("act_id_250318_2","Admin","Logged into the system.","2018-03-25 11:26:52");
INSERT INTO login_activity VALUES("act_id_250318_4","Admin","Logged out of the system.","2018-03-25 11:27:54");
INSERT INTO login_activity VALUES("act_id_260318_0","Admin","Logged into the system.","2018-03-26 11:48:20");
INSERT INTO login_activity VALUES("act_id_260318_1","Admin","Logged out of the system.","2018-03-26 03:27:31");
INSERT INTO login_activity VALUES("act_id_260318_2","Admin","Logged out of the system.","2018-03-26 12:18:32");
INSERT INTO login_activity VALUES("act_id_260318_3","Admin","Logged into the system.","2018-03-26 02:36:33");
INSERT INTO login_activity VALUES("act_id_260318_4","Admin","Logged into the system.","2018-03-26 01:31:34");
INSERT INTO login_activity VALUES("act_id_260318_5","Admin","Logged out of the system.","2018-03-26 02:36:25");
INSERT INTO login_activity VALUES("act_id_260318_6","Admin","Logged out of the system.","2018-03-26 01:31:26");
INSERT INTO login_activity VALUES("act_id_260318_7","Admin","Logged into the system.","2018-03-26 07:47:07");
INSERT INTO login_activity VALUES("act_id_260318_8","Admin","Logged into the system.","2018-03-26 03:27:38");
INSERT INTO login_activity VALUES("act_id_260318_9","Admin","Logged into the system.","2018-03-26 01:32:49");
INSERT INTO login_activity VALUES("act_id_270318_0","Admin","Logged into the system.","2018-03-27 12:41:40");
INSERT INTO login_activity VALUES("act_id_270318_1","Admin","Logged out of the system.","2018-03-27 12:24:11");
INSERT INTO login_activity VALUES("act_id_270318_2","Admin","Logged into the system.","2018-03-27 12:01:02");
INSERT INTO login_activity VALUES("act_id_270318_3","Admin","Logged out of the system.","2018-03-27 12:00:53");
INSERT INTO login_activity VALUES("act_id_270318_4","Admin","Logged out of the system.","2018-03-27 12:35:34");
INSERT INTO login_activity VALUES("act_id_270318_5","Admin","Logged into the system.","2018-03-27 12:27:15");
INSERT INTO login_activity VALUES("act_id_270318_6","Admin","Logged into the system.","2018-03-27 12:27:36");
INSERT INTO login_activity VALUES("act_id_270318_7","Admin","Logged out of the system.","2018-03-27 01:43:27");
INSERT INTO login_activity VALUES("act_id_270318_8","Admin","Logged into the system.","2018-03-27 12:19:58");
INSERT INTO login_activity VALUES("act_id_270318_9","Admin","Logged out of the system.","2018-03-27 12:13:19");
INSERT INTO login_activity VALUES("act_id_280218_1","Nana Gyan","Logged out of the system.","2018-02-28 01:49:31");
INSERT INTO login_activity VALUES("act_id_280218_2","Nana Gyan","Logged out of the system.","2018-02-28 11:02:02");
INSERT INTO login_activity VALUES("act_id_280218_3","Admin","Logged out of the system.","2018-02-28 11:18:33");
INSERT INTO login_activity VALUES("act_id_280218_4","Admin","Logged out of the system.","2018-02-28 04:15:44");
INSERT INTO login_activity VALUES("act_id_280218_6","Admin","Logged out of the system.","2018-02-28 11:00:16");
INSERT INTO login_activity VALUES("act_id_280218_7","Admin","Logged into the system.","2018-02-28 01:50:17");
INSERT INTO login_activity VALUES("act_id_280218_9","Nana Gyan","Logged into the system.","2018-02-28 01:49:59");
INSERT INTO login_activity VALUES("act_id_280318_0","Admin","Logged out of the system.","2018-03-28 01:56:50");
INSERT INTO login_activity VALUES("act_id_280318_1","Admin","Added a new payment of 533 with receipt number 4423","2018-03-28 12:28:21");
INSERT INTO login_activity VALUES("act_id_280318_2","Admin","Logged out of the system.","2018-03-28 01:31:52");
INSERT INTO login_activity VALUES("act_id_280318_3","Admin","Logged out of the system.","2018-03-28 04:01:33");
INSERT INTO login_activity VALUES("act_id_280318_4","Admin","Logged into the system.","2018-03-28 09:22:34");
INSERT INTO login_activity VALUES("act_id_280318_5","Admin","Logged out of the system.","2018-03-28 09:22:15");
INSERT INTO login_activity VALUES("act_id_280318_6","Admin","Logged into the system.","2018-03-28 01:56:56");
INSERT INTO login_activity VALUES("act_id_280318_7","Admin","Logged into the system.","2018-03-28 12:42:47");
INSERT INTO login_activity VALUES("act_id_280318_8","Admin","Logged into the system.","2018-03-28 01:31:58");
INSERT INTO login_activity VALUES("act_id_280318_9","Admin","Logged out of the system.","2018-03-28 09:24:59");
INSERT INTO login_activity VALUES("act_id_290318_0","Admin","Added a new order totalling ","2018-03-29 03:36:00");
INSERT INTO login_activity VALUES("act_id_290318_1","Admin","Logged out of the system.","2018-03-29 03:24:41");
INSERT INTO login_activity VALUES("act_id_290318_2","Admin","Logged out of the system.","2018-03-29 11:40:32");
INSERT INTO login_activity VALUES("act_id_290318_3","Admin","Added a new order totalling ","2018-03-29 03:28:13");
INSERT INTO login_activity VALUES("act_id_290318_4","Admin","Logged into the system.","2018-03-29 04:35:04");
INSERT INTO login_activity VALUES("act_id_290318_5","Admin","Added a new order totalling ","2018-03-29 04:23:55");
INSERT INTO login_activity VALUES("act_id_290318_6","Admin","Added a new order totalling ","2018-03-29 04:21:26");
INSERT INTO login_activity VALUES("act_id_290318_7","Admin","Logged into the system.","2018-03-29 03:24:47");
INSERT INTO login_activity VALUES("act_id_290318_8","Admin","Logged into the system.","2018-03-29 02:12:18");
INSERT INTO login_activity VALUES("act_id_290318_9","Admin","Logged into the system.","2018-03-29 12:03:09");
INSERT INTO login_activity VALUES("act_id_300318_0","Admin","Logged out of the system.","2018-03-30 12:17:40");
INSERT INTO login_activity VALUES("act_id_300318_0659","Admin","Added a new order totalling ","2018-03-30 07:06:00");
INSERT INTO login_activity VALUES("act_id_300318_1","Admin","Added a new order totalling ","2018-03-30 12:45:01");
INSERT INTO login_activity VALUES("act_id_300318_1247","Admin","Logged into the system.","2018-03-30 10:10:21");
INSERT INTO login_activity VALUES("act_id_300318_1349","Admin","Logged into the system.","2018-03-30 07:03:51");
INSERT INTO login_activity VALUES("act_id_300318_1587","Admin","Added Dress item for the order poID_300318_6277","2018-03-30 06:37:31");
INSERT INTO login_activity VALUES("act_id_300318_1856","Admin","Added a new order totalling ","2018-03-30 09:56:21");
INSERT INTO login_activity VALUES("act_id_300318_2","Admin","Added Spirax A 80W/90 item for the order poID_300318_1053","2018-03-30 12:45:32");
INSERT INTO login_activity VALUES("act_id_300318_2069","Admin","Logged into the system.","2018-03-30 10:46:42");
INSERT INTO login_activity VALUES("act_id_300318_3","Admin","Logged out of the system.","2018-03-30 12:34:23");
INSERT INTO login_activity VALUES("act_id_300318_3269","Admin","Added a new order totalling ","2018-03-30 10:47:03");
INSERT INTO login_activity VALUES("act_id_300318_3539","Admin","Logged out of the system.","2018-03-30 07:02:33");
INSERT INTO login_activity VALUES("act_id_300318_4","Admin","Added a new order totalling ","2018-03-30 12:32:54");
INSERT INTO login_activity VALUES("act_id_300318_4147","Admin","Logged out of the system.","2018-03-30 10:10:14");
INSERT INTO login_activity VALUES("act_id_300318_4577","Admin","Added Cups item for the order poID_300318_6277","2018-03-30 06:35:54");
INSERT INTO login_activity VALUES("act_id_300318_5","Admin","Added Die item for the order poID_300318_0946","2018-03-30 01:36:05");
INSERT INTO login_activity VALUES("act_id_300318_5287","Admin","Added Papers item for the order poID_300318_6277","2018-03-30 06:37:05");
INSERT INTO login_activity VALUES("act_id_300318_5546","Admin","Added Paste item for the order poID_300318_7336","2018-03-30 09:54:15");
INSERT INTO login_activity VALUES("act_id_300318_5836","Admin","Added Ghana made item for the order poID_300318_7336","2018-03-30 09:53:05");
INSERT INTO login_activity VALUES("act_id_300318_5959","Admin","Logged out of the system.","2018-03-30 10:46:35");
INSERT INTO login_activity VALUES("act_id_300318_6","Admin","Added Rimula 15W/40 item for the order poID_300318_4244","2018-03-30 01:01:06");
INSERT INTO login_activity VALUES("act_id_300318_6277","Admin","Added a new order totalling ","2018-03-30 06:35:26");
INSERT INTO login_activity VALUES("act_id_300318_6547","Admin","Added a new order totalling ","2018-03-30 10:10:56");
INSERT INTO login_activity VALUES("act_id_300318_6647","Admin","Added a new order totalling ","2018-03-30 06:31:06");
INSERT INTO login_activity VALUES("act_id_300318_7","Admin","Added a new order totalling ","2018-03-30 12:37:57");
INSERT INTO login_activity VALUES("act_id_300318_7447","Admin","Logged into the system.","2018-03-30 06:30:47");
INSERT INTO login_activity VALUES("act_id_300318_8","Admin","Logged into the system.","2018-03-30 12:17:48");
INSERT INTO login_activity VALUES("act_id_300318_8336","Admin","Added a new order totalling ","2018-03-30 09:52:18");
INSERT INTO login_activity VALUES("act_id_300318_8959","Admin","Logged out of the system.","2018-03-30 07:06:38");
INSERT INTO login_activity VALUES("act_id_300318_9","Admin","Logged into the system.","2018-03-30 12:34:29");
INSERT INTO login_activity VALUES("act_id_300318_9347","Admin","Logged out of the system.","2018-03-30 06:30:39");
INSERT INTO login_activity VALUES("act_id_300318_9566","Admin","Added Great item for the order poID_300318_0856","2018-03-30 09:57:39");
INSERT INTO login_activity VALUES("act_id_310318_0370","Admin","Logged into the system.","2018-03-31 05:38:50");
INSERT INTO login_activity VALUES("act_id_310318_0504","Admin","Logged out of the system.","2018-03-31 06:34:10");
INSERT INTO login_activity VALUES("act_id_310318_0738","Admin","Updated an item with order ID poID_300318_395","2018-03-31 07:46:10");
INSERT INTO login_activity VALUES("act_id_310318_1007","Admin","Updated an item with order ID poID_300318_117","2018-03-31 07:23:21");
INSERT INTO login_activity VALUES("act_id_310318_1110","Admin","Logged out of the system.","2018-03-31 08:15:11");
INSERT INTO login_activity VALUES("act_id_310318_1221","Admin","Logged into the system.","2018-03-31 03:00:21");
INSERT INTO login_activity VALUES("act_id_310318_1286","Admin","Updated an item with order ID poID_300318_085","2018-03-31 07:20:21");
INSERT INTO login_activity VALUES("act_id_310318_1477","Admin","Updated an item with order ID poID_300318_117","2018-03-31 07:35:41");
INSERT INTO login_activity VALUES("act_id_310318_1540","Admin","Logged into the system.","2018-03-31 11:07:31");
INSERT INTO login_activity VALUES("act_id_310318_1772","Admin","Logged into the system.","2018-03-31 03:26:11");
INSERT INTO login_activity VALUES("act_id_310318_1796","Admin","Logged out of the system.","2018-03-31 07:22:51");
INSERT INTO login_activity VALUES("act_id_310318_1828","Admin","Updated an item with order ID poID_300318_117","2018-03-31 07:44:41");
INSERT INTO login_activity VALUES("act_id_310318_2348","Admin","Logged into the system.","2018-03-31 07:47:12");
INSERT INTO login_activity VALUES("act_id_310318_2386","Admin","Logged out of the system.","2018-03-31 10:07:12");
INSERT INTO login_activity VALUES("act_id_310318_2440","Admin","Logged out of the system.","2018-03-31 11:07:22");
INSERT INTO login_activity VALUES("act_id_310318_2474","Admin","Logged into the system.","2018-03-31 09:32:22");
INSERT INTO login_activity VALUES("act_id_310318_2486","Admin","Logged into the system.","2018-03-31 10:07:22");
INSERT INTO login_activity VALUES("act_id_310318_2672","Admin","Logged out of the system.","2018-03-31 03:26:02");
INSERT INTO login_activity VALUES("act_id_310318_2896","Admin","Logged into the system.","2018-03-31 07:23:02");
INSERT INTO login_activity VALUES("act_id_310318_3248","Admin","Updated an item with order ID poID_300318_627","2018-03-31 07:47:03");
INSERT INTO login_activity VALUES("act_id_310318_3518","Admin","Updated an item with order ID poID_300318_117","2018-03-31 07:42:33");
INSERT INTO login_activity VALUES("act_id_310318_3810","Admin","Logged out of the system.","2018-03-31 08:16:23");
INSERT INTO login_activity VALUES("act_id_310318_3911","Admin","Logged out of the system.","2018-03-31 02:59:53");
INSERT INTO login_activity VALUES("act_id_310318_4048","Admin","Updated an item with order ID poID_300318_590","2018-03-31 07:46:44");
INSERT INTO login_activity VALUES("act_id_310318_4374","Admin","Logged out of the system.","2018-03-31 09:32:14");
INSERT INTO login_activity VALUES("act_id_310318_4396","Admin","Logged into the system.","2018-03-31 04:35:34");
INSERT INTO login_activity VALUES("act_id_310318_4488","Admin","Logged out of the system.","2018-03-31 05:07:24");
INSERT INTO login_activity VALUES("act_id_310318_5006","Admin","Logged into the system.","2018-03-31 01:33:25");
INSERT INTO login_activity VALUES("act_id_310318_5128","Admin","Updated an item with order ID poID_300318_117","2018-03-31 07:43:35");
INSERT INTO login_activity VALUES("act_id_310318_5541","Admin","Logged into the system.","2018-03-31 11:24:15");
INSERT INTO login_activity VALUES("act_id_310318_6038","Admin","Logged into the system.","2018-03-31 10:31:46");
INSERT INTO login_activity VALUES("act_id_310318_6119","Admin","Updated an item with order ID poID_300318_117","2018-03-31 07:58:36");
INSERT INTO login_activity VALUES("act_id_310318_6296","Admin","Logged out of the system.","2018-03-31 04:35:26");
INSERT INTO login_activity VALUES("act_id_310318_6642","Admin","Logged into the system.","2018-03-31 06:07:46");
INSERT INTO login_activity VALUES("act_id_310318_7255","Admin","Logged into the system.","2018-03-31 06:58:47");
INSERT INTO login_activity VALUES("act_id_310318_7292","Admin","Logged into the system.","2018-03-31 09:02:07");
INSERT INTO login_activity VALUES("act_id_310318_7441","Admin","Logged out of the system.","2018-03-31 11:24:07");
INSERT INTO login_activity VALUES("act_id_310318_7608","Admin","Logged into the system.","2018-03-31 02:07:47");
INSERT INTO login_activity VALUES("act_id_310318_7829","Admin","Logged into the system.","2018-03-31 05:14:47");
INSERT INTO login_activity VALUES("act_id_310318_8155","Admin","Logged out of the system.","2018-03-31 06:58:38");
INSERT INTO login_activity VALUES("act_id_310318_8259","Admin","Logged into the system.","2018-03-31 02:32:08");
INSERT INTO login_activity VALUES("act_id_310318_8341","Admin","Logged into the system.","2018-03-31 08:37:18");
INSERT INTO login_activity VALUES("act_id_310318_8438","Admin","Updated an item with order ID poID_300318_094","2018-03-31 07:45:48");
INSERT INTO login_activity VALUES("act_id_310318_8542","Admin","Logged out of the system.","2018-03-31 06:07:38");
INSERT INTO login_activity VALUES("act_id_310318_9063","Admin","Updated an order with receipt number 1480771","2018-03-31 03:40:09");
INSERT INTO login_activity VALUES("act_id_310318_9110","Admin","Logged out of the system.","2018-03-31 05:28:39");
INSERT INTO login_activity VALUES("act_id_310318_9159","Admin","Logged out of the system.","2018-03-31 02:31:59");
INSERT INTO login_activity VALUES("act_id_310318_9192","Admin","Logged out of the system.","2018-03-31 09:01:59");
INSERT INTO login_activity VALUES("act_id_310318_9469","Admin","Deleted an item with ID itemID_300318_1587","2018-03-31 08:07:29");
INSERT INTO login_activity VALUES("act_id_310318_9504","Admin","Logged into the system.","2018-03-31 06:34:19");
INSERT INTO login_activity VALUES("act_id_310318_9928","Admin","Logged out of the system.","2018-03-31 10:31:39");



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

INSERT INTO login_details VALUES("log_010318_1860","Admin","2018-03-01 05:11:21","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_010318_4079","Admin","2018-03-01 08:35:04","2018-03-01 08:39:51");
INSERT INTO login_details VALUES("log_010418_0202","Admin","2018-04-01 10:40:20","2018-04-01 06:10:07");
INSERT INTO login_details VALUES("log_010418_0696","Admin","2018-04-01 08:22:40","2018-04-01 08:50:01");
INSERT INTO login_details VALUES("log_010418_3425","Admin","2018-04-01 12:27:23","2018-04-01 12:54:40");
INSERT INTO login_details VALUES("log_010418_3745","Admin","2018-04-01 12:31:13","2018-04-01 12:40:31");
INSERT INTO login_details VALUES("log_010418_4276","Admin","2018-04-01 11:05:24","2018-04-02 01:14:49");
INSERT INTO login_details VALUES("log_010418_4820","Admin","2018-04-01 09:18:04","2018-04-01 09:57:39");
INSERT INTO login_details VALUES("log_010418_6886","Admin","2018-04-01 12:54:46","2018-04-01 01:22:01");
INSERT INTO login_details VALUES("log_010418_7005","Admin","2018-04-01 12:23:27","2018-04-01 12:27:16");
INSERT INTO login_details VALUES("log_010418_7226","Admin","2018-04-01 12:43:47","2018-04-02 04:03:19");
INSERT INTO login_details VALUES("log_010418_7250","Admin","2018-04-01 06:35:27","2018-04-01 07:11:31");
INSERT INTO login_details VALUES("log_010418_7260","Admin","2018-04-01 01:57:07","2018-04-01 10:12:19");
INSERT INTO login_details VALUES("log_010418_8068","Admin","2018-04-01 08:50:08","2018-04-01 09:17:54");
INSERT INTO login_details VALUES("log_010418_8258","Admin","2018-04-01 01:22:08","2018-04-01 01:56:51");
INSERT INTO login_details VALUES("log_010418_8306","Admin","2018-04-01 12:40:38","2018-04-01 12:59:53");
INSERT INTO login_details VALUES("log_010418_8962","Admin","2018-04-01 07:11:38","2018-04-01 07:14:59");
INSERT INTO login_details VALUES("log_010418_9278","Admin","2018-04-01 08:52:09","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020318_5116","Admin","2018-03-02 04:55:15","2018-03-02 04:57:31");
INSERT INTO login_details VALUES("log_020418_1226","Admin","2018-04-02 01:43:41","2018-04-02 02:15:42");
INSERT INTO login_details VALUES("log_020418_2770","Admin","2018-04-02 11:19:32","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020418_3324","Admin","2018-04-02 03:57:13","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020418_3922","Admin","2018-04-02 11:44:53","2018-04-02 12:13:21");
INSERT INTO login_details VALUES("log_020418_4222","Admin","2018-04-02 11:43:44","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020418_5212","Admin","2018-04-02 11:42:05","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020418_5244","Admin","2018-04-02 04:00:25","2018-04-02 04:01:07");
INSERT INTO login_details VALUES("log_020418_5311","Admin","2018-04-02 11:25:35","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020418_5553","Admin","2018-04-02 03:45:55","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_020418_6261","Admin","2018-04-02 03:13:46","2018-04-02 03:45:47");
INSERT INTO login_details VALUES("log_020418_6404","Admin","2018-04-02 12:14:06","2018-04-02 12:35:45");
INSERT INTO login_details VALUES("log_020418_6536","Admin","2018-04-02 11:59:16","2018-04-03 12:38:18");
INSERT INTO login_details VALUES("log_020418_6944","Admin","2018-04-02 01:14:56","2018-04-02 01:43:34");
INSERT INTO login_details VALUES("log_020418_7689","Admin","2018-04-02 02:44:27","2018-04-02 03:13:40");
INSERT INTO login_details VALUES("log_020418_7701","Admin","2018-04-02 10:31:17","2018-04-02 11:59:09");
INSERT INTO login_details VALUES("log_020418_8418","Admin","2018-04-02 02:15:48","2018-04-02 02:44:17");
INSERT INTO login_details VALUES("log_020418_8839","Admin","2018-04-02 10:56:28","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_030318_8975","Admin","2018-03-03 12:16:38","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_030418_2000","Admin","2018-04-03 08:26:42","2018-04-03 08:51:41");
INSERT INTO login_details VALUES("log_030418_3414","Admin","2018-04-03 09:35:43","2018-04-03 11:34:50");
INSERT INTO login_details VALUES("log_030418_3786","Admin","2018-04-03 07:34:33","2018-04-03 08:03:43");
INSERT INTO login_details VALUES("log_030418_4250","Admin","2018-04-03 03:02:04","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_030418_6439","Admin","2018-04-03 12:49:06","2018-04-03 03:01:53");
INSERT INTO login_details VALUES("log_030418_8888","Admin","2018-04-03 12:41:28","2018-04-03 12:48:38");
INSERT INTO login_details VALUES("log_030418_8921","Admin","2018-04-03 11:34:58","2018-04-04 12:16:37");
INSERT INTO login_details VALUES("log_030418_9051","Admin","2018-04-03 08:51:49","2018-04-03 09:35:34");
INSERT INTO login_details VALUES("log_030418_9368","Admin","2018-04-03 08:03:59","2018-04-03 08:07:17");
INSERT INTO login_details VALUES("log_040318_1026","Admin","2018-03-04 09:43:21","2018-03-04 09:43:38");
INSERT INTO login_details VALUES("log_040418_1688","Admin","2018-04-04 11:54:21","2018-04-05 12:21:08");
INSERT INTO login_details VALUES("log_040418_4325","Admin","2018-04-04 08:07:14","2018-04-04 11:47:29");
INSERT INTO login_details VALUES("log_040418_4765","Admin","2018-04-04 02:41:14","2018-04-04 06:50:44");
INSERT INTO login_details VALUES("log_040418_7660","Admin","2018-04-04 06:51:07","2018-04-04 07:57:51");
INSERT INTO login_details VALUES("log_050418_1778","Admin","2018-04-05 07:19:31","2018-04-05 08:35:49");
INSERT INTO login_details VALUES("log_050418_2911","Admin","2018-04-05 10:46:32","2018-04-06 01:03:44");
INSERT INTO login_details VALUES("log_050418_2953","Admin","2018-04-05 01:13:12","2018-04-05 01:38:00");
INSERT INTO login_details VALUES("log_050418_2991","Admin","2018-04-05 12:46:32","2018-04-05 01:13:03");
INSERT INTO login_details VALUES("log_050418_3669","Admin","2018-04-05 11:14:23","2018-04-05 11:29:07");
INSERT INTO login_details VALUES("log_050418_5307","Admin","2018-04-05 09:37:15","2018-04-05 10:04:16");
INSERT INTO login_details VALUES("log_050418_5740","Admin","2018-04-05 12:21:15","2018-04-05 12:46:22");
INSERT INTO login_details VALUES("log_050418_6668","Admin","2018-04-05 10:04:26","2018-04-05 10:17:28");
INSERT INTO login_details VALUES("log_050418_7708","Admin","2018-04-05 07:07:57","2018-04-05 07:19:14");
INSERT INTO login_details VALUES("log_050418_8445","Admin","2018-04-05 01:44:08","2018-04-05 11:12:40");
INSERT INTO login_details VALUES("log_050418_9271","Admin","2018-04-05 11:48:49","2018-04-05 11:50:07");
INSERT INTO login_details VALUES("log_060418_1476","Admin","2018-04-06 10:32:21","2018-04-06 10:34:31");
INSERT INTO login_details VALUES("log_060418_1745","Admin","2018-04-06 07:24:31","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_060418_2143","Admin","2018-04-06 04:03:32","2018-04-06 04:36:09");
INSERT INTO login_details VALUES("log_060418_3566","Admin","2018-04-06 11:24:13","2018-04-07 04:52:38");
INSERT INTO login_details VALUES("log_060418_4368","Admin","2018-04-06 05:30:34","2018-04-06 05:38:02");
INSERT INTO login_details VALUES("log_060418_5342","Admin","2018-04-06 06:33:55","2018-04-06 07:24:22");
INSERT INTO login_details VALUES("log_060418_6735","Admin","2018-04-06 04:36:16","2018-04-06 05:00:52");
INSERT INTO login_details VALUES("log_060418_8225","Admin","2018-04-06 10:07:08","2018-04-06 10:32:10");
INSERT INTO login_details VALUES("log_060418_9607","Admin","2018-04-06 05:04:29","2018-04-06 05:29:34");
INSERT INTO login_details VALUES("log_060418_9660","Admin","2018-04-06 06:04:29","2018-04-06 06:33:49");
INSERT INTO login_details VALUES("log_070418_2131","Admin","2018-04-07 01:41:52","2018-04-07 03:07:23");
INSERT INTO login_details VALUES("log_070418_2214","Admin","2018-04-07 11:42:02","2018-04-07 01:41:45");
INSERT INTO login_details VALUES("log_070418_4059","Admin","2018-04-07 03:58:24","2018-04-07 04:22:33");
INSERT INTO login_details VALUES("log_070418_4232","Admin","2018-04-07 11:12:04","2018-04-07 11:39:47");
INSERT INTO login_details VALUES("log_070418_5318","Admin","2018-04-07 03:35:35","2018-04-07 03:58:14");
INSERT INTO login_details VALUES("log_070418_6672","Admin","2018-04-07 04:52:46","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_070418_8121","Admin","2018-04-07 04:26:58","2018-04-07 04:51:47");
INSERT INTO login_details VALUES("log_070418_9446","Admin","2018-04-07 03:07:29","2018-04-07 03:35:28");
INSERT INTO login_details VALUES("log_190318_2108","Admin","2018-03-19 08:33:32","2018-03-19 08:34:05");
INSERT INTO login_details VALUES("log_190318_3940","Admin","2018-03-19 09:14:53","2018-03-19 09:20:59");
INSERT INTO login_details VALUES("log_190318_4402","Admin","2018-03-19 09:40:44","2018-03-20 08:41:47");
INSERT INTO login_details VALUES("log_200318_4708","Admin","2018-03-20 09:34:34","2018-03-20 10:14:47");
INSERT INTO login_details VALUES("log_200318_4940","Admin","2018-03-20 10:14:54","2018-03-20 10:42:25");
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
INSERT INTO login_details VALUES("log_230318_3819","Admin","2018-03-23 07:19:43","2018-03-23 07:20:26");
INSERT INTO login_details VALUES("log_240218_2229","Admin","2018-02-24 10:53:42","2018-02-24 10:57:30");
INSERT INTO login_details VALUES("log_250318_2123","Admin","2018-03-25 11:26:52","2018-03-25 11:27:54");
INSERT INTO login_details VALUES("log_260218_0914","Admin","2018-02-26 11:29:50","2018-02-26 11:31:03");
INSERT INTO login_details VALUES("log_260218_1049","Admin","2018-02-26 04:36:41","2018-02-26 10:14:27");
INSERT INTO login_details VALUES("log_260218_1944","Admin","2018-02-26 11:34:51","2018-02-26 11:36:47");
INSERT INTO login_details VALUES("log_260218_5264","Admin","2018-02-26 11:37:05","2018-02-26 11:42:28");
INSERT INTO login_details VALUES("log_260218_6532","Admin","2018-02-26 10:59:16","2018-02-26 11:27:54");
INSERT INTO login_details VALUES("log_260218_6804","Admin","2018-02-26 11:28:06","2018-02-26 11:29:27");
INSERT INTO login_details VALUES("log_260318_0057","Admin","2018-03-26 10:51:40","2018-03-26 11:17:03");
INSERT INTO login_details VALUES("log_260318_0077","Admin","2018-03-26 11:48:20","2018-03-26 12:18:32");
INSERT INTO login_details VALUES("log_260318_0211","Admin","2018-03-26 06:18:40","2018-03-26 06:43:01");
INSERT INTO login_details VALUES("log_260318_0259","Admin","2018-03-26 12:18:40","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_260318_1568","Admin","2018-03-26 05:37:31","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_260318_2309","Admin","2018-03-26 11:17:12","2018-03-27 12:13:19");
INSERT INTO login_details VALUES("log_260318_3376","Admin","2018-03-26 10:38:53","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_260318_3977","Admin","2018-03-26 02:36:33","2018-03-26 03:27:31");
INSERT INTO login_details VALUES("log_260318_4778","Admin","2018-03-26 05:39:34","2018-03-26 06:18:30");
INSERT INTO login_details VALUES("log_260318_4983","Admin","2018-03-26 01:31:34","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_260318_6393","Admin","2018-03-26 01:32:16","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_260318_7246","Admin","2018-03-26 07:47:07","2018-03-26 07:49:21");
INSERT INTO login_details VALUES("log_260318_7656","Admin","2018-03-26 07:49:27","2018-03-26 10:38:45");
INSERT INTO login_details VALUES("log_260318_7852","Admin","2018-03-26 06:43:07","2018-03-26 07:17:09");
INSERT INTO login_details VALUES("log_260318_8317","Admin","2018-03-26 05:12:18","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_260318_8364","Admin","2018-03-26 07:17:18","2018-03-26 07:47:01");
INSERT INTO login_details VALUES("log_260318_8580","Admin","2018-03-26 03:27:38","2018-03-26 05:12:06");
INSERT INTO login_details VALUES("log_260318_9693","Admin","2018-03-26 01:32:49","2018-03-26 02:36:25");
INSERT INTO login_details VALUES("log_270218_2638","Admin","2018-02-27 02:32:42","2018-02-27 02:32:55");
INSERT INTO login_details VALUES("log_270218_4667","Admin","2018-02-27 10:41:04","2018-02-27 11:23:08");
INSERT INTO login_details VALUES("log_270218_5908","Admin","2018-02-27 02:28:15","2018-02-27 02:30:15");
INSERT INTO login_details VALUES("log_270318_0037","Admin","2018-03-27 12:41:40","2018-03-27 01:07:15");
INSERT INTO login_details VALUES("log_270318_1352","Admin","2018-03-27 02:08:51","2018-03-27 02:38:56");
INSERT INTO login_details VALUES("log_270318_1375","Admin","2018-03-27 11:22:11","2018-03-27 11:56:06");
INSERT INTO login_details VALUES("log_270318_1588","Admin","2018-03-27 01:07:31","2018-03-27 01:43:06");
INSERT INTO login_details VALUES("log_270318_2033","Admin","2018-03-27 10:41:42","2018-03-27 11:22:05");
INSERT INTO login_details VALUES("log_270318_2648","Admin","2018-03-27 03:47:42","2018-03-27 04:22:31");
INSERT INTO login_details VALUES("log_270318_2684","Admin","2018-03-27 12:01:02","2018-03-27 12:35:34");
INSERT INTO login_details VALUES("log_270318_3297","Admin","2018-03-27 11:58:43","2018-03-28 12:28:21");
INSERT INTO login_details VALUES("log_270318_3777","Admin","2018-03-27 11:56:13","2018-03-27 11:57:44");
INSERT INTO login_details VALUES("log_270318_3941","Admin","2018-03-27 10:11:33","2018-03-27 10:41:35");
INSERT INTO login_details VALUES("log_270318_4267","Admin","2018-03-27 09:07:04","2018-03-27 09:46:39");
INSERT INTO login_details VALUES("log_270318_4298","Admin","2018-03-27 01:08:44","2018-03-27 01:23:04");
INSERT INTO login_details VALUES("log_270318_5000","Admin","2018-03-27 09:46:45","2018-03-27 10:11:23");
INSERT INTO login_details VALUES("log_270318_5323","Admin","2018-03-27 12:27:15","2018-03-27 01:07:24");
INSERT INTO login_details VALUES("log_270318_5366","Admin","2018-03-27 03:17:15","2018-03-27 03:47:03");
INSERT INTO login_details VALUES("log_270318_6523","Admin","2018-03-27 12:27:36","2018-03-27 12:00:53");
INSERT INTO login_details VALUES("log_270318_6889","Admin","2018-03-27 01:24:46","2018-03-27 01:43:27");
INSERT INTO login_details VALUES("log_270318_7462","Admin","2018-03-27 07:44:07","2018-03-27 08:10:20");
INSERT INTO login_details VALUES("log_270318_8224","Admin","2018-03-27 08:10:28","2018-03-27 08:36:42");
INSERT INTO login_details VALUES("log_270318_8972","Admin","2018-03-27 12:19:58","2018-03-27 12:24:11");
INSERT INTO login_details VALUES("log_270318_9085","Admin","2018-03-27 08:36:49","2018-03-27 08:59:35");
INSERT INTO login_details VALUES("log_270318_9248","Admin","2018-03-27 03:47:09","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_270318_9550","Admin","2018-03-27 04:22:39","2018-03-27 07:43:59");
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
INSERT INTO login_details VALUES("log_280318_0075","Admin","2018-03-28 04:01:40","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_280318_3266","Admin","2018-03-28 09:50:23","2018-03-28 10:15:10");
INSERT INTO login_details VALUES("log_280318_3410","Admin","2018-03-28 05:15:43","2018-03-28 05:40:01");
INSERT INTO login_details VALUES("log_280318_4571","Admin","2018-03-28 09:22:34","2018-03-28 09:24:59");
INSERT INTO login_details VALUES("log_280318_5279","Admin","2018-03-28 10:42:05","2018-03-29 11:40:32");
INSERT INTO login_details VALUES("log_280318_6105","Admin","2018-03-28 01:56:56","2018-03-28 09:22:14");
INSERT INTO login_details VALUES("log_280318_6118","Admin","2018-03-28 10:15:16","2018-03-28 10:41:57");
INSERT INTO login_details VALUES("log_280318_6512","Admin","2018-03-28 09:29:16","2018-03-28 02:48:30");
INSERT INTO login_details VALUES("log_280318_7650","Admin","2018-03-28 12:42:47","2018-03-28 01:31:52");
INSERT INTO login_details VALUES("log_280318_8061","Admin","2018-03-28 05:40:08","2018-03-28 05:55:40");
INSERT INTO login_details VALUES("log_280318_8153","Admin","2018-03-28 01:31:58","2018-03-28 01:56:50");
INSERT INTO login_details VALUES("log_280318_8214","Admin","2018-03-28 03:35:28","2018-03-28 04:01:33");
INSERT INTO login_details VALUES("log_280318_8568","Admin","2018-03-28 04:50:58","2018-03-28 05:15:37");
INSERT INTO login_details VALUES("log_280318_9706","Admin","2018-03-28 04:07:59","2018-03-28 04:32:24");
INSERT INTO login_details VALUES("log_290318_1799","Admin","2018-03-29 11:46:11","2018-03-29 11:46:22");
INSERT INTO login_details VALUES("log_290318_2647","Admin","2018-03-29 05:31:02","2018-03-29 05:35:54");
INSERT INTO login_details VALUES("log_290318_2677","Admin","2018-03-29 05:36:02","2018-03-29 08:22:08");
INSERT INTO login_details VALUES("log_290318_4014","Admin","2018-03-29 04:35:04","2018-03-29 05:00:39");
INSERT INTO login_details VALUES("log_290318_4952","Admin","2018-03-29 09:43:14","2018-03-29 10:21:48");
INSERT INTO login_details VALUES("log_290318_5256","Admin","2018-03-29 05:15:25","2018-03-29 05:20:33");
INSERT INTO login_details VALUES("log_290318_5377","Admin","2018-03-29 08:22:15","2018-03-29 08:22:38");
INSERT INTO login_details VALUES("log_290318_6200","Admin","2018-03-29 11:47:06","2018-03-30 12:17:40");
INSERT INTO login_details VALUES("log_290318_6465","Admin","2018-03-29 05:00:46","2018-03-29 05:12:50");
INSERT INTO login_details VALUES("log_290318_7592","Admin","2018-03-29 04:15:57","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_290318_7836","Admin","2018-03-29 05:13:07","2018-03-29 05:15:19");
INSERT INTO login_details VALUES("log_290318_7889","Admin","2018-03-29 03:24:47","2018-03-29 03:49:13");
INSERT INTO login_details VALUES("log_290318_8355","Admin","2018-03-29 02:12:18","2018-03-29 03:24:41");
INSERT INTO login_details VALUES("log_290318_9386","Admin","2018-03-29 05:20:39","2018-03-29 05:30:55");
INSERT INTO login_details VALUES("log_290318_9531","Admin","2018-03-29 03:49:19","2018-03-29 04:15:50");
INSERT INTO login_details VALUES("log_290318_9877","Admin","2018-03-29 12:03:09","2018-03-29 02:12:12");
INSERT INTO login_details VALUES("log_300318_0646","Admin","2018-03-30 01:34:20","2018-03-30 02:15:16");
INSERT INTO login_details VALUES("log_300318_1247","Admin","2018-03-30 10:10:21","2018-03-30 10:46:35");
INSERT INTO login_details VALUES("log_300318_1349","Admin","2018-03-30 07:03:51","2018-03-30 07:06:38");
INSERT INTO login_details VALUES("log_300318_2069","Admin","2018-03-30 10:46:42","2018-03-30 06:30:39");
INSERT INTO login_details VALUES("log_300318_3450","Admin","2018-03-30 02:42:23","2018-04-01 12:23:04");
INSERT INTO login_details VALUES("log_300318_3934","Admin","2018-03-30 12:59:53","2018-03-30 01:33:54");
INSERT INTO login_details VALUES("log_300318_7409","Admin","2018-03-30 02:17:27","2018-03-30 02:42:13");
INSERT INTO login_details VALUES("log_300318_7447","Admin","2018-03-30 06:30:47","2018-03-30 07:02:32");
INSERT INTO login_details VALUES("log_300318_8681","Admin","2018-03-30 12:17:48","2018-03-30 12:34:23");
INSERT INTO login_details VALUES("log_300318_9445","Admin","2018-03-30 09:37:29","2018-03-30 10:10:14");
INSERT INTO login_details VALUES("log_300318_9682","Admin","2018-03-30 12:34:29","2018-03-30 12:58:53");
INSERT INTO login_details VALUES("log_310318_0370","Admin","2018-03-31 05:38:50","2018-03-31 06:07:37");
INSERT INTO login_details VALUES("log_310318_0772","Admin","2018-03-31 03:26:10","2018-03-31 04:35:26");
INSERT INTO login_details VALUES("log_310318_1221","Admin","2018-03-31 03:00:21","2018-03-31 03:26:02");
INSERT INTO login_details VALUES("log_310318_1540","Admin","2018-03-31 11:07:31","2018-03-31 11:24:07");
INSERT INTO login_details VALUES("log_310318_2348","Admin","2018-03-31 07:47:12","2018-03-31 08:15:11");
INSERT INTO login_details VALUES("log_310318_2474","Admin","2018-03-31 09:32:22","2018-03-31 10:07:12");
INSERT INTO login_details VALUES("log_310318_2486","Admin","2018-03-31 10:07:22","2018-03-31 10:31:39");
INSERT INTO login_details VALUES("log_310318_2896","Admin","2018-03-31 07:23:02","2018-03-31 07:47:03");
INSERT INTO login_details VALUES("log_310318_4396","Admin","2018-03-31 04:35:34","2018-03-31 05:07:24");
INSERT INTO login_details VALUES("log_310318_5006","Admin","2018-03-31 01:33:25","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_310318_5541","Admin","2018-03-31 11:24:15","0000-00-00 00:00:00");
INSERT INTO login_details VALUES("log_310318_6038","Admin","2018-03-31 10:31:46","2018-03-31 11:07:22");
INSERT INTO login_details VALUES("log_310318_6292","Admin","2018-03-31 09:02:06","2018-03-31 09:32:14");
INSERT INTO login_details VALUES("log_310318_6642","Admin","2018-03-31 06:07:46","2018-03-31 06:34:10");
INSERT INTO login_details VALUES("log_310318_7255","Admin","2018-03-31 06:58:47","2018-03-31 07:22:51");
INSERT INTO login_details VALUES("log_310318_7608","Admin","2018-03-31 02:07:47","2018-03-31 02:31:59");
INSERT INTO login_details VALUES("log_310318_7829","Admin","2018-03-31 05:14:47","2018-03-31 05:28:39");
INSERT INTO login_details VALUES("log_310318_8259","Admin","2018-03-31 02:32:08","2018-03-31 02:59:53");
INSERT INTO login_details VALUES("log_310318_8341","Admin","2018-03-31 08:37:18","2018-03-31 09:01:59");
INSERT INTO login_details VALUES("log_310318_9110","Admin","2018-03-31 08:15:19","2018-03-31 08:16:23");
INSERT INTO login_details VALUES("log_310318_9504","Admin","2018-03-31 06:34:19","2018-03-31 06:58:38");



DROP TABLE IF EXISTS login_security;

CREATE TABLE `login_security` (
  `user_name` varchar(200) NOT NULL,
  `security_question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`user_name`),
  CONSTRAINT `login_security_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO login_security VALUES("Admin","When did you go to the College?","852852852062");



DROP TABLE IF EXISTS tblchequepayment;

CREATE TABLE `tblchequepayment` (
  `chqID` char(17) NOT NULL,
  `chqNumber` int(11) NOT NULL,
  `chqBank` text NOT NULL,
  `chqDate` date NOT NULL,
  PRIMARY KEY (`chqID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblchequepayment VALUES("chqID_030418_9771","128628","FBN","2018-11-17");



DROP TABLE IF EXISTS tblpaymenttracker;

CREATE TABLE `tblpaymenttracker` (
  `pmtID` char(17) NOT NULL,
  `poID` char(16) NOT NULL,
  `chqID` char(17) DEFAULT NULL,
  `pmtAmount` decimal(10,2) NOT NULL,
  `pmtType` char(10) NOT NULL,
  `pmtBalance` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`pmtID`),
  KEY `fk_purchase_order_id` (`poID`),
  KEY `fk_cheque_id` (`chqID`),
  CONSTRAINT `fk_cheque_id` FOREIGN KEY (`chqID`) REFERENCES `tblchequepayment` (`chqID`),
  CONSTRAINT `fk_purchase_order_id` FOREIGN KEY (`poID`) REFERENCES `tblpurchaseordertracker` (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblpaymenttracker VALUES("pmtID_030418_4781","poID_030418_3721","chqID_030418_9771","1000.00","Cheque","15.00");



DROP TABLE IF EXISTS tblpurchaseorderitems;

CREATE TABLE `tblpurchaseorderitems` (
  `itemID` char(17) NOT NULL,
  `poID` char(16) NOT NULL,
  `itemQuantity` int(11) NOT NULL,
  `itemUnit` char(15) NOT NULL,
  `itemDescription` text NOT NULL,
  `itemType` text NOT NULL,
  `itemUnitPrice` decimal(10,2) NOT NULL,
  `itemCost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`itemID`),
  KEY `fk_purchase_order_id_1` (`poID`),
  CONSTRAINT `fk_purchase_order_id_1` FOREIGN KEY (`poID`) REFERENCES `tblpurchaseordertracker` (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblpurchaseorderitems VALUES("itemID_030418_005","poID_030418_3721","3","Drums","Rimula 15W/40","Oil","105.00","315.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_030418_160","poID_030418_5890","12","Pieces","Barrels","Oil","112.00","1344.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_030418_320","poID_030418_5890","17","Drums","HPV Oil","Oil","100.00","1700.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_030418_364","poID_030418_6240","15","Drums","Oil","Oil","150.00","2250.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_030418_633","poID_030418_3721","5","Pieces","Spirax A 80W/90","Liquid","110.00","550.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_030418_773","poID_030418_3721","3","Drums","Tellus 68","Oil","105.00","315.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_050418_113","poID_050418_7078","10","Drums","HPV Oil","Oil","120.00","1200.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_050418_252","poID_050418_3221","12","Drums","HPV Oil","Liquid","102.30","1227.60");
INSERT INTO tblpurchaseorderitems VALUES("itemID_050418_543","poID_050418_7078","5","Drums","Barrels","Liquid","124.00","620.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_050418_982","poID_050418_3221","10","Pieces","HPV Oil","Oil","150.00","1500.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_014","poID_060418_3935","12","Drums","HPV Oil","Liquid","102.00","1224.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_108","poID_060418_2576","2","Pieces","HPV Oil","Liquid","2100.00","4200.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_254","poID_060418_2143","15","Drums","Barrels","Liquid","96.00","1440.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_555","poID_060418_4455","12","Drums","Barrels","Liquid","101.00","1212.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_567","poID_060418_2576","11","Drums","Barrels","Liquid","100.00","1100.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_638","poID_060418_2576","15","Pieces","Rimula 15W/40","Oil","255.00","3825.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_734","poID_060418_3935","10","Drums","Barrels","Liquid","111.00","1110.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_742","poID_060418_9223","10","Drums","Barrels","Liquid","105.00","1050.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_060418_792","poID_060418_5826","12","Drums","Barrels","Liquid","120.00","1440.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_070418_504","poID_070418_0733","6","Drums","Barrels","Liquid","1000.00","6000.00");
INSERT INTO tblpurchaseorderitems VALUES("itemID_070418_983","poID_070418_0733","10","Drums","Barrels","Liquid","1442.00","14420.00");



DROP TABLE IF EXISTS tblpurchaseordertracker;

CREATE TABLE `tblpurchaseordertracker` (
  `poID` char(16) NOT NULL,
  `poDate` date NOT NULL,
  `poStation` text NOT NULL,
  `poAmount` decimal(10,2) NOT NULL,
  `poReceiptNo` int(11) NOT NULL,
  PRIMARY KEY (`poID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tblpurchaseordertracker VALUES("poID_030418_3721","2018-09-04","T-HBV","1180.00","14807701");
INSERT INTO tblpurchaseordertracker VALUES("poID_030418_5890","2018-04-03","Tullow","3044.00","13579");
INSERT INTO tblpurchaseordertracker VALUES("poID_030418_6240","2018-04-03","Tigo","2250.00","123456");
INSERT INTO tblpurchaseordertracker VALUES("poID_050418_3221","2018-04-05","Tigo","2727.60","11223");
INSERT INTO tblpurchaseordertracker VALUES("poID_050418_7078","2018-04-05","S-HBV","1820.00","246810");
INSERT INTO tblpurchaseordertracker VALUES("poID_060418_2143","2018-04-06","Tigo","1440.00","101546");
INSERT INTO tblpurchaseordertracker VALUES("poID_060418_2576","2018-04-06","S-HBV","9125.00","231087");
INSERT INTO tblpurchaseordertracker VALUES("poID_060418_3935","2018-04-06","Tullow","2334.00","102134");
INSERT INTO tblpurchaseordertracker VALUES("poID_060418_4455","2018-04-06","Tullow","1212.00","124578");
INSERT INTO tblpurchaseordertracker VALUES("poID_060418_5826","2018-04-06","Tigo","1440.00","1235690");
INSERT INTO tblpurchaseordertracker VALUES("poID_060418_9223","2018-04-06","S-HBV","1050.00","156789");
INSERT INTO tblpurchaseordertracker VALUES("poID_070418_0733","2018-04-07","Tullow","20420.00","1234285");



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
  PRIMARY KEY (`user_name`),
  CONSTRAINT `user_privileges_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user_details` (`user_name`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




