DROP TABLE users;
DROP TABLE requests;
DROP DATABASE helplist;

CREATE DATABASE helplist;

CREATE TABLE users(
		id int NOT NULL AUTO_INCREMENT,
    email varchar(10),
    uid text,
    pwd text,
    isTeachr bit,
		PRIMARY KEY (id)
);

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `oauth_provider` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
 `oauth_uid` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
 `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
 `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
 `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `created` datetime NOT NULL,
 `modified` datetime NOT NULL,
  isTeachr bit,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE requests(
	id text,
	postId int NOT NULL AUTO_INCREMENT,
		userUid text,
    reqText text,
    classId int(10),
		PRIMARY KEY (postId)

);

CREATE TABLE classrooms(
 	teacherId int(10),
	classId int NOT NULL AUTO_INCREMENT,
	className text,
	PRIMARY KEY (classId)

);
