DROP TABLE Users;
DROP TABLE Requests;
DROP DATABASE helplist;

CREATE DATABASE helplist;

CREATE TABLE Users(
	id int(10),
    email varchar(10),
    uid text,
    pwd text,
    isTeachr int
);

CREATE TABLE Requests(
	id int(10),
    reqText text,
    idTeachr int(10)
);
