DROP TABLE users;
DROP TABLE requests;
DROP DATABASE helplist;

CREATE DATABASE helplist;

CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(100),
    email varchar(100),
    gid varchar(100),
    isTeachr int,
    PRIMARY KEY (id)
);

CREATE TABLE requests(
	id text,
	postId int NOT NULL AUTO_INCREMENT,
		uId text,
    reqText text,
    classId int(10),
		PRIMARY KEY (postId)

);

CREATE TABLE classrooms(
 	teacherId text,
	teacherName text,
	classId int NOT NULL AUTO_INCREMENT,
	className text,
	PRIMARY KEY (classId)

);
