DROP DATABASE JSPStoreDB;
CREATE DATABASE JSPStoreDB;
USE JSPStoreDB;

CREATE TABLE item (
  i_code     INTEGER       NOT NULL UNIQUE AUTO_INCREMENT,
  i_category VARCHAR(44)   NOT NULL,
  i_name     VARCHAR(44)   NOT NULL,
  i_vendor   VARCHAR(44)   NOT NULL,
  i_qty      SMALLINT      NOT NULL DEFAULT 1,
  i_price    DECIMAL(8,2)  NOT NULL DEFAULT 4.44,
  i_shipping DECIMAL(8,2)  NOT NULL DEFAULT 4.44,
  i_descript VARCHAR(4444) NOT NULL,
  i_picfile  VARCHAR(22),
 
  FOREIGN KEY(i_category) REFERENCES category(c_name),
  PRIMARY KEY(i_code)
) AUTO_INCREMENT = 0;

CREATE TABLE category (
  c_code   INTEGER     NOT NULL UNIQUE AUTO_INCREMENT,
  c_parent INTEGER,
  c_name   VARCHAR(44) NOT NULL,

  PRIMARY KEY(c_code)
) AUTO_INCREMENT = 0;

CREATE TABLE promo (
  p_month   INTEGER     UNIQUE NOT NULL,
  p_item1   VARCHAR(44) NOT NULL,
  p_item2   VARCHAR(44) NOT NULL,
  p_item3   VARCHAR(44) NOT NULL,

  FOREIGN KEY(p_item1) REFERENCES item(i_name),
  FOREIGN KEY(p_item1) REFERENCES item(i_name),
  FOREIGN KEY(p_item1) REFERENCES item(i_name),
  FOREIGN KEY(p_item1) REFERENCES item(i_name),
        
  PRIMARY KEY(p_month)
);

INSERT INTO item(i_category, i_name, i_vendor, i_qty, i_price, i_shipping, 
                 i_descript, i_picfile)
       VALUES('Tools', 'Hammer', 'AcmeCo', 44, 14.00, 5.00, 
              'is a tool meant to deliver blows to an object. The most common uses are for driving nails, fitting parts, and breaking up objects. Hammers are often designed for a specific purpose, and vary widely in their shape and structure. Usual features are a handle and a head, with most of the weight in the head. The basic design is hand-operated, but there are also many mechanically operated models for heavier uses.', 
              'hammer.png');
INSERT INTO item(i_category, i_name, i_vendor, i_qty, i_price, i_shipping, 
                 i_descript, i_picfile)
       VALUES('Technology', 'Computer', 'Del', 3, 500.00, 35.00, 
              'Computers take numerous physical forms. Early electronic computers were the size of a large room, consuming as much power as several hundred modern personal computers. [1] Today, computers can be made small enough to fit into a wrist watch and be powered from a watch battery. Society has come to recognize personal computers and their portable equivalent, the laptop computer, as icons of the information age.', 
              'computer.png');
INSERT INTO item(i_category, i_name, i_vendor, i_qty, i_price, i_shipping, 
                 i_descript, i_picfile)
       VALUES('Firearms', 'Pistol', 'PistolWhipped', 8, 250.00, 10.00, 
              'A handgun is a firearm designed to be held in the hand when used. This characteristic differentiates handguns as a general class of firearms from their larger cousins: long guns such as rifles and shotguns, mounted weapons like machine guns, and larger weapons such as artillery.', 
              'pistol.png');
INSERT INTO item(i_category, i_name, i_vendor, i_qty, i_price, i_shipping,
                 i_descript, i_picfile)
       VALUES('Books', 'Dictionary', 'AcmeCo', 11, 15.00, 2.50, 
              'This a list of words with their definitions, a list of characters with their glyphs, or a list of words with corresponding words in other languages. In a few languages, words can appear in many different forms.', 
              'dictionary.png');                            
              
INSERT INTO category(c_code, c_parent, c_name) 
       VALUES(1, NULL, 'Tools');
INSERT INTO category(c_code, c_parent, c_name) 
       VALUES(2, NULL, 'Technology');
INSERT INTO category(c_code, c_parent, c_name)  
       VALUES(3, NULL, 'Firearms');
INSERT INTO category(c_code, c_parent, c_name)  
       VALUES(4, NULL, 'Books');

INSERT INTO promo(p_month, p_item1, p_item2, p_item3) 
       VALUES(5, 'Computer', 'Pistol', 'Dictionary'); 

COMMIT;
