-- Identification de la base --

USE village_green;

-- USER : VISITOR --

CREATE USER 'visitor'@'%' IDENTIFIED BY 'TvP4VgPc!';
GRANT SELECT
ON  village_green.products
TO 'visitor'@'%';

-- USER : CUSTOMER --

CREATE USER 'customer'@'%' IDENTIFIED BY 'Ccbp&aTmitV!';
GRANT SELECT
ON  village_green.*
TO 'customer'@'%';
GRANT CREATE, UPDATE
ON  village_green.orders
TO 'customer'@'%';
GRANT CREATE, UPDATE
ON  village_green.customers
TO 'customer'@'%';

-- USER : MANAGER --

CREATE USER 'manager'@'localhost' IDENTIFIED BY 'McMp&uATiDvG!';
GRANT SELECT, UPDATE
ON  village_green.*
TO 'manager'@'localhost';

-- USER : ADMINISTRATOR -- 

CREATE USER 'administrator'@'localhost' IDENTIFIED BY 'aMaToTD&cDoC!';
GRANT SELECT, UPDATE, CREATE, DELETE
ON  village_green.*
TO 'administrator'@'localhost';