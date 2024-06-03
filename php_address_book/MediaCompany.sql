CREATE TABLE customer (
    customer_id     INT NOT NULL AUTO_INCREMENT,
    firstname       VARCHAR(20),
    lastname        VARCHAR(20),
    phone           INT,       
    recievescatalog BOOL,
    lastorderdate   DATE,
    billing_address INT,

    PRIMARY KEY(customer_id),
    FOREIGN KEY(billing_address) REFERENCES address(address_id)
);

CREATE TABLE address (
    address_id INT NOT NULL AUTO_INCREMENT,
    type       x,
    line1      VARCHAR(20),
    line2      VARCHAR(20),
    apt        VARCHAR(5),
    city       VARCHAR(20),
    state      VARCHAR(2),
    zip        e,

    PRIMARY KEY(address_id)
);

CREATE TABLE invoice (
    invoice_id       INT NOT NULL AUTO_INCREMENT,
    customer_id      INT,
    shipping_address INT,
    shipping_id      INT,
    date             DATE,
    PRIMARY KEY(invoice_id),
    FOREIGN KEY(billing_address) REFERENCES address(address_id)  
);

CREATE TABLE shipping (
    shipping_id INT NOT NULL AUTO_INCREMENT,
    carrier     VARCHAR(20),
    type        VARCHAR(20),
    price       FLOAT,

    PRIMARY KEY(invoice_id)   
);

CREATE TABLE invoice_line (
    invoice_id   INT,
    inventory_id INT,
    qty          INT
);

CREATE TABLE inventory (
    inventory_id INT NOT NULL AUTO_INCREMENT,
    title        VARCHAR(40),
    artist       VARCHAR(40),
    releasedate  DATE,
    media_id     INT,
    label_id     INT,
    price        FLOAT,

    PRIMARY KEY(inventory_id)
    FOREIGN KEY(x) REFERENCES doc(y)
);

CREATE TABLE label (
    label_id INT NOT NULL AUTO_INCREMENT,
    name     VARCHAR(),

    PRIMARY KEY(media_id)      
);

CREATE TABLE media (
    media_id INT NOT NULL AUTO_INCREMENT,
    type     VARCHAR(),
    qty      INT,

    PRIMARY KEY(media_id)  
);