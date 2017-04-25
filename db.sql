select * 
from userdb;

select * 
from books;

delete from userdb
where rname='';

CREATE TABLE `db`.`booSDFSDks` (
  `USERID` INT NOT NULL DEFAULT 10,
  `PRODUCTID` INT NOT NULL auto_increment,
  `NAME` VARCHAR(45) NULL,
  `AUTHOR` VARCHAR(45) NULL,
  `BPRICE` VARCHAR(45) NULL,
  `IMAGE` VARCHAR(45) NULL,
  `CONDIT` VARCHAR(45) NULL DEFAULT 'used',
  `TAG` VARCHAR(45) NULL DEFAULT 'fantasy',
  PRIMARY KEY (`PRODUCTID`));
  
  
INSERT INTO books (USERID,NAME,AUTHOR ,BPRICE,IMAGE,CONDIT,TAG)
VALUES 
(50,'Harry Potter And the Deathly Hallows part 2','Jk Rowling',10,'/./images/deathly.jpg','used','fantasy'),
(50,'Harry Potter And The Goblet Of Fire','Jk Rowling',10,'/./images/goblet.jpg','new','fantasy'),
(50,'Harry Potter and the Cursed Child','Jk Rowling',10,'/./images/cursed.jpg','used','fantasy'),
(50,'Harry Potter and The Chamber Of Secrets','Jk Rowling',10,'/./images/chamber.jpg','new','fantasy'),
(50,'Dracula','Bram Stoher',10,'/./images/drac.jpg','used','fantasy'),
(50,'The Green Mile ','Stpen King',10,'/./images/green.jpg','new','fantasy'),
(50,'The Mist','Stephen King',10,'/./images/mist.jpg','used','fantasy'),
(50,'Harry Potter and The Deathly Hallows','Jk Rowling',10,'/./images/hallows.jpg','new','fantasy'),
(50,'Halo The Fall Of Reach','Eric Nylund',10,'/./images/halo.jpg','used','fantasy');


SELECT * 
FROM books ORDER BY PRODUCTID ASC;

  
insert into userdb (userid,rname,uname,pass,pnum,address,email)
values
(10,'danut','danut123','pass','123456789','221B Baker Street','danut@gmail.com'),
(20,'owen','owen123','pass','123456789','221B Baker Street','owen@gmail.com'),
(30,'karl','karl123','pass','123456789','221B Baker Street','karl@gmail.com');

