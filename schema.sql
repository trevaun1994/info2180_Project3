/* Database: CheapoMail */

DROP DATABASE IF EXISTS CheapoMail;    /* Create Database */
CREATE DATABASE CheapoMail;
USE CheapoMail;

/* Create User Table */

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(35) NOT NULL,
  `lastname` char(35) NOT NULL,
  `password` char(255) NOT NULL,
  `username` char(35) NOT NULL,
  `admin` boolean,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

/* Create Message Table */

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` char(255) NOT NULL,
  `subject` char(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipient_ids` int(11) NOT NULL,
  `date_sent` DATE NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


/* Create Message_read Table */

CREATE TABLE IF NOT EXISTS `Message_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `reader_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `User`(`firstname`,`lastname`,`password`,`username`,`admin`) VALUES  /* Addes a default admin */
  ("admin","admin","Password1","admin",TRUE);
  
INSERT INTO `User`(`firstname`,`lastname`,`password`,`username`,`admin`) VALUES  /* Addes a default user */
  ("Trevaun","Miller","Password1","trevaun1994",FALSE);
  
INSERT INTO `User`(`firstname`,`lastname`,`password`,`username`,`admin`) VALUES  /* Addes a default user */
  ("Akil","Nassor","Password1","akil1",FALSE);
  
INSERT INTO `User`(`firstname`,`lastname`,`password`,`username`,`admin`) VALUES  /* Addes a default user */
  ("Romario","Moncrieffe","Password1","romrooney",FALSE);
  
INSERT INTO `Message`(`body`,`subject`,`user_id`,`recipient_ids`,`date_sent`) VALUES  
("Romario likes to play football and attend UWI carnival","Moncrieffe's Hobbies",4,2,'1995-04-32');

INSERT INTO `Message`(`body`,`subject`,`user_id`,`recipient_ids`,`date_sent`) VALUES  
("Romario likes to play football and attend UWI carnival","Moncrieffe's Hobbies",4,3,'2343-04-32');

INSERT INTO `Message`(`body`,`subject`,`user_id`,`recipient_ids`,`date_sent`) VALUES  
("Trevaun likes to play GTA7 and attend UWI carnival ... every year","Trev's Hobbies",2,4,'2004-04-32');

INSERT INTO `Message`(`body`,`subject`,`user_id`,`recipient_ids`,`date_sent`) VALUES  
("Your are invited to my wedding ceremony this Saturday","Moncrieffe's Wedding",4,2,'2106-04-32');

INSERT INTO `Message`(`body`,`subject`,`user_id`,`recipient_ids`,`date_sent`) VALUES  
("Ok so the first when never worked out so this is the new wedding date (December 75th, 2102)","Moncrieffe's Second Wedding",4,3,'2016-04-32');