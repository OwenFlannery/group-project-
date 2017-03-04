Use db;
DROP TABLE IF EXISTS BOOKS;
DROP TABLE IF EXISTS USED;
DROP TABLE IF EXISTS USERS; 

CREATE TABLE USERS (
USERID 	INT NOT NULL,
RNAME 	VARCHAR(20),
UNAME	VARCHAR(20),
PASS    VARCHAR(12),
PNUM    INT NOT NULL,
ADDR 	VARCHAR(25),
EMAIL	VARCHAR(25),
 CONSTRAINT USERS_PRIMARY_KEY PRIMARY KEY (USERID));

INSERT INTO USERS VALUES (20,'Nicole Burroughs','NicoleB1234','root',0851035828,
'6 new oak Estate, Carlow', 'NikkiNova123@gmail.com');

INSERT INTO USERS VALUES (25,'Mark Carey','MCarey2017','Password', 0879688225,'6A Killarney Court'
,'MarkCarey2017@gmail.com');

INSERT INTO USERS VALUES (50, 'John Byrne', 'JohnB9583', 'dublin1993', 087124892,
 '26 Parnell Street, Dublin','John09Byrne@gmail.com');
 /*
CREATE TABLE USED(
USERID INT NOT NULL,
BNAME 	VARCHAR(40),
AUTHOR	VARCHAR(40),
BPRICE	DOUBLE NOT NULL,
IMAGE 	VARCHAR(20),
CONDIT	VARCHAR(20),
TAG varchar(20),
PRODUCTID	INT NOT NULL,
 CONSTRAINT USED_PRIMARY_KEY PRIMARY KEY (PRODUCTID),
FOREIGN KEY (USERID) REFERENCES USERS(USERID));


INSERT INTO USED VALUES (20, 'The lord of the Rings','jrr tolkien', 10.00, 'images/lord.jpg', 'USED','fantasy', 1);
INSERT INTO USED VALUES (20, 'Harry Potter and The Cursed Child', 'JK Rowling', 15, 'images/cursed.jpg', 'USED','fantasy', 2);
INSERT INTO USED VALUES (20, 'The Shining','Stephen King', 12.00, 'images/shining.jpg', 'USED','fantasy', 3);
INSERT INTO USED VALUES (25, 'Halo: The Fall of Reach','Eric Nylund', 8.00, 'images/halo.jpg', 'USED','fantasy', 4);
INSERT INTO USED VALUES (25, 'The Green Mile','Stephen King', 11.00, 'images/green.jpg', 'USED','fantasy', 5);
INSERT INTO USED VALUES (25, 'Harry Potter and The Deathly Dallows', 'JK Rowling', 5.00, 'images/deathly.png', 'USED','fantasy', 6);
INSERT INTO USED VALUES (50, 'The Mist','Stephen King', 14.00, 'images/mist.jpg', 'USED','fantasy', 7);
INSERT INTO USED VALUES (50, 'Harry Potter and the Chamber of Secrets', 'JK Rowling', 10, 'images/chamber.jpg', 'USED','fantasy', 8);
INSERT INTO USED VALUES (50, 'DRACULA','Bram Stoker', 14, 'images/drac.jpg', 'USED','fantasy', 9);
INSERT INTO USED VALUES (50, 'Harry Potter and The Goblet of Fire', 'JK Rowling', 17, 'images/goblet.jpg', 'USED','fantasy', 10);
*/


create TABLE BOOKS(
USERID INT NOT NULL,
PRODUCTID INT NOT NULL,
NAME VARCHAR(45),
AUTHOR	VARCHAR(40),
BPRICE	DOUBLE NOT NULL,
IMAGE 	VARCHAR(45),
CONDIT	VARCHAR(20),
TAG VARCHAR(45),
CONSTRAINT BOOKS_PRIMARY_KEY PRIMARY KEY (PRODUCTID),
FOREIGN KEY (USERID) REFERENCES USERS(USERID)
);

INSERT INTO BOOKS VALUES (50, 11, 'The lord of the Rings','jrr tolkien', 20.00, '/./images/lord.jpg', 'NEW','fantasy');
INSERT INTO BOOKS VALUES (50, 12, 'Harry Potter and The Cursed Child', 'JK Rowling', 20.00, '/./images/cursed.jpg', 'USED','fantasy');
INSERT INTO BOOKS VALUES (50, 13, 'The Shining','Stephen King', 18.00, '/./images/shining.jpg', 'NEW','fantasy');
INSERT INTO BOOKS VALUES (20, 14, 'Halo: The Fall of Reach','Eric Nylund', 12.00, '/./images/halo.jpg', 'USED','fantasy');
INSERT INTO BOOKS VALUES (20, 15, 'The Green Mile','Stephen King', 25.00, '/./images/green.jpg', 'NEW','fantasy');
INSERT INTO BOOKS VALUES (20, 16, 'Harry Potter and The Deathly Dallows', 'JK Rowling', 10.00, '/./images/deathly.jpg', 'USED','fantasy');
INSERT INTO BOOKS VALUES (25, 17, 'The Mist','Stephen King', 24.00, '/./images/mist.jpg', 'NEW','fantasy');
INSERT INTO BOOKS VALUES (25, 18, 'Harry Potter and the Chamber of Secrets', 'JK Rowling',20.00, '/./images/chamber.jpg', 'USED','fantasy');
INSERT INTO BOOKS VALUES (25, 19, 'DRACULA','Bram Stoker', 30.00, '/./images/drac.jpg', 'NEW','fantasy');
INSERT INTO BOOKS VALUES (25, 20, 'Harry Potter and The Goblet of Fire', 'JK Rowling', 27.00, '/./images/goblet.jpg', 'USED','fantasy');


Select *
from USERS;


CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

drop table user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
);

INSERT INTO user values (1,'admin','owen@gmail.com','pass');
INSERT INTO user values (2,'danut','danut@gmail.com','pass');
INSERT INTO user values (3,'karl','knobhead@gmail.com','pass');

SELECT *
FROM BOOKS
WHERE CONDIT = "USED"
ORDER BY PRODUCTID ASC;

select * 
from user;

delete from user where username = 'dhfe';
