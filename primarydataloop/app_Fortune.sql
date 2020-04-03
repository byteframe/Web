CREATE TABLE Fortunes(
    id      INT         NOT NULL,
    content TEXT        NOT NULL,
    title   VARCHAR(25) NOT NULL,
    primary key (id)
);

delimiter //
CREATE PROCEDURE FortuneGet(IN _id INT)
BEGIN
    SELECT content,title FROM Fortunes
    WHERE id = _id;
END;
//
delimiter ;

delimiter //
CREATE PROCEDURE FortuneSet(IN _id INT, IN _content TEXT, IN _title VARCHAR(25))
BEGIN
    REPLACE INTO Fortunes (id, content, title)
    VALUES(_id, _content, _title);
END;
//
delimiter ;
