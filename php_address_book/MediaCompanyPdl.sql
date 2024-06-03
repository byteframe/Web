CREATE DATABASE mediacompanytim;
USE mediacompanytim;

CREATE TABLE customer (
    id              INT NOT NULL AUTO_INCREMENT,
    firstname       VARCHAR(20),
    lastname        VARCHAR(20),
    phone           VARCHAR(20),       
    recievescatalog BOOL,
    lastorderdate   DATE,
    billing_address INT,

    PRIMARY KEY(id),
    FOREIGN KEY(billing_address) REFERENCES address(id)
);

CREATE TABLE address (
    id    INT NOT NULL AUTO_INCREMENT,
    type  INT,
    line1 VARCHAR(20),
    line2 VARCHAR(20),
    apt   VARCHAR(5),
    city  VARCHAR(20),
    state VARCHAR(2),
    zip   VARCHAR(10),

    PRIMARY KEY(id)
);

CREATE TABLE invoice (
    id               INT NOT NULL AUTO_INCREMENT,
    customer_id      INT,
    shipping_address INT,
    shipping_id      INT,
    date             DATE,

    PRIMARY KEY(id),
    FOREIGN KEY(shipping_address) REFERENCES address(id),
    FOREIGN KEY(shipping_id) REFERENCES shipping(id)
);

CREATE TABLE shipping (
    id      INT NOT NULL AUTO_INCREMENT,
    carrier VARCHAR(20),
    type    VARCHAR(20),
    price   DOUBLE,

    PRIMARY KEY(id)   
);

CREATE TABLE invoice_line (
    id           INT,
    inventory_id INT,
    qty          INT
);

CREATE TABLE inventory (
    id          INT NOT NULL AUTO_INCREMENT,
    title       VARCHAR(40),
    artist      VARCHAR(40),
    releasedate DATE,
    label_id    INT,
    media_id    INT,
    price       FLOAT,

    PRIMARY KEY(id),
    FOREIGN KEY(label_id) REFERENCES label(id),
    FOREIGN KEY(media_id) REFERENCES media(id)
);

CREATE TABLE label (
    id   INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(20),

    PRIMARY KEY(id)      
);

CREATE TABLE media (
    id   INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(20),
    qty  INT,

    PRIMARY KEY(id)  
);