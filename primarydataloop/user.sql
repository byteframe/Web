CREATE TABLE Users(
    id    INT         NOT NULL AUTO_INCREMENT,
    name  VARCHAR(20) NOT NULL UNIQUE COLLATE latin1_bin,
    pass  BLOB        NOT NULL,
    primary key (id)
);

delimiter //
CREATE PROCEDURE UserExists(IN _name VARCHAR(20))
BEGIN
    SELECT COUNT(_name) FROM Users
    WHERE name = _name;
END;
//
delimiter ;

delimiter //
CREATE PROCEDURE UserGet(IN _id INT)
BEGIN
    SELECT name FROM Users
    WHERE id = _id;
END;
//
delimiter ;

delimiter //
CREATE PROCEDURE UserLogin(IN _name VARCHAR(20), IN _pass VARCHAR(20))
BEGIN
    SELECT id FROM Users
    WHERE name = _name
    AND pass = AES_ENCRYPT(_pass, '');
END;
//
delimiter ;

delimiter //
CREATE PROCEDURE UserNew(IN _name VARCHAR(20), IN _pass VARCHAR(20))
BEGIN
    INSERT INTO Users (name, pass)
    VALUES (_name, AES_ENCRYPT(_pass, ''));
END;
//
delimiter ;
