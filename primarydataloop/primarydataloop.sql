DROP DATABASE IF EXISTS primarydataloop;
CREATE DATABASE primarydataloop;

USE primarydataloop;

GRANT ALL ON * TO 'primarydataloop'@'localhost' IDENTIFIED BY '';

SOURCE user.sql;
CALL UserNew('admin', 'password');
SOURCE app-Fortune.sql;
