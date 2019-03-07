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

CREATE TABLE requests(
	id int(10),
	postId int NOT NULL AUTO_INCREMENT,
    reqText text,
    classId int(10),
		PRIMARY KEY (postId)

);

CREATE TABLE classrooms(
 	teacherId int(10),
	classId int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (classId)

);
