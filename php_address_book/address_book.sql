CREATE DATABASE address_book;
USE address_book;

CREATE TABLE contact (
    id      INT NOT NULL AUTO_INCREMENT,
    name    VARCHAR(20),
    address VARCHAR(20),
    city    VARCHAR(20),
    state   VARCHAR(20),
    zip     VARCHAR(20),
    phone   VARCHAR(20),
    email   VARCHAR(20),

    PRIMARY KEY(id)
);
