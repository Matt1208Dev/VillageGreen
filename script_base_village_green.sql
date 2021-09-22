
--  BASE VillageGreen --

-- CREATION DE LA BASE --

DROP DATABASE IF EXISTS village_green;

CREATE DATABASE village_green CHARACTER SET 'utf8mb4';

USE village_green;

-- CREATION DE LA TABLE categories --

CREATE TABLE `categories` (
     `cat_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `cat_name` VARCHAR(50) NOT NULL,
     `cat_parent_id` INT UNSIGNED,
     KEY `cat_parent_id` (`cat_id`)
)
ENGINE = innoDB;

-- CREATION DE LA TABLE suppliers --

CREATE TABLE `suppliers` (
     `sup_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `sup_type` VARCHAR(15),
     `sup_name` VARCHAR(50),
     `sup_address` VARCHAR(255) NOT NULL,
     `sup_postalcode` INT NOT NULL,
     `sup_city` VARCHAR(30) NOT NULL,
     `sup_contact` VARCHAR(30) NOT NULL,
     `sup_phone` INT NOT NULL,
     `sup_mail` VARCHAR(255) NOT NULL
)
ENGINE = innoDB;

-- CREATION DE LA TABLE brands --

-- CREATE TABLE `brands` (
--      `bra_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--      `bra_label` varchar(50) NOT NULL,
--      `bra_sup_id` INT NOT NULL,
--      FOREIGN KEY (`bra_sup_id`) REFERENCES `suppliers`(`sup_id`),
-- )
-- ENGINE = innoDB;

-- CREATION DE LA TABLE products --

CREATE TABLE `products` (
     `pro_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `pro_ref` VARCHAR(15) NOT NULL,
     `pro_label` VARCHAR(50) NOT NULL,
     `pro_desc` VARCHAR(255) NOT NULL,
     `pro_ppet` DECIMAL(7,2) NOT NULL,
     `pro_spet` DECIMAL(7,2) NOT NULL,
     `pro_photo` VARCHAR(255),
     `pro_phy_stk` INT NOT NULL,
     `pro_lock` INT NOT NULL,
     `pro_add_date` DATE NOT NULL,
     `pro_modif_date` DATE DEFAULT NULL,
     `pro_sup_id` INT NOT NULL,
     `pro_cat_id` INT NOT NULL,
     -- `pro_bra_id` INT NOT NULL,
     FOREIGN KEY (`pro_sup_id`) REFERENCES `suppliers`(`sup_id`),
     FOREIGN KEY (`pro_cat_id`) REFERENCES `categories`(`cat_id`)
     -- FOREIGN KEY (`pro_bra_id`) REFERENCES `brands`(`bra_id`)
)
ENGINE = innoDB;

-- CREATION DE LA TABLE sales_representants --

CREATE TABLE `commercials` (
     `com_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `com_lastname` varchar(50) NOT NULL,
     `com_firstname` varchar(50) NOT NULL,
     `com_type` VARCHAR(15),
     `com_username` VARCHAR(50),
     `com_pass` VARCHAR(255)
)
ENGINE = innoDB;

-- CREATION DE LA TABLE customers --

CREATE TABLE `customers` (
     `cus_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `cus_lastname` VARCHAR(50) NOT NULL,        
     `cus_firstname`   VARCHAR(30) NOT NULL,      
     `cus_sex`   INT NOT NULL,              
     `cus_bil_address` VARCHAR(255)  NOT NULL,
     `cus_bil_postalcode` VARCHAR(5) NOT NULL,       
     `cus_bil_city`  VARCHAR(30) NOT NULL,   
     `cus_del_address` VARCHAR(255)  NOT NULL, 
     `cus_del_postalcode` VARCHAR(5) NOT NULL,        
     `cus_del_city`  VARCHAR(30) NOT NULL,        
     `cus_phone`   VARCHAR(20) NOT NULL,         
     `cus_mail`   VARCHAR(255) NOT NULL UNIQUE,
     `cus_pass`   VARCHAR(255) NOT NULL        
     `cus_type`   VARCHAR(15) NOT NULL,            
     `cus_coef`   INT(3) NOT NULL,
     `cus_com_id` INT,
     FOREIGN KEY (`cus_com_id`) REFERENCES `commercials`(`com_id`)
)
ENGINE = innoDB;

-- CREATION DE LA TABLE order_status --

CREATE TABLE `order_status` (
     `ost_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `ost_label` varchar(25) NOT NULL
)
ENGINE = innoDB;

-- CREATION DE LA TABLE orders --

CREATE TABLE `orders` (
     `ord_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `ord_date` DATE NOT NULL,
     `ord_discount` DECIMAL(4,2),
     `ord_pay_method` VARCHAR(10) NOT NULL,
     `ord_ost_id` INT NOT NULL,
     `ord_cus_id` INT NOT NULL,
     `ord_del_time` DATE,
     `ord_bil_date` DATE,
     `ord_com_id` INT NOT NULL,
     `ord_del_address` VARCHAR(255)  NOT NULL, 
     `ord_del_postalcode` VARCHAR(5) NOT NULL,        
     `ord_del_city`  VARCHAR(50) NOT NULL,        
     `ord_del_phone`   VARCHAR(20) NOT NULL,
     FOREIGN KEY (`ord_ost_id`) REFERENCES `order_status`(`ost_id`),
     FOREIGN KEY (`ord_cus_id`) REFERENCES `customers`(`cus_id`),
     FOREIGN KEY (`ord_com_id`) REFERENCES `commercials`(`com_id`)
)
ENGINE = innoDB;

-- CREATION DE LA TABLE order_details --

CREATE TABLE `order_details` (
     `ode_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `ode_qty` INT NOT NULL,
     `ode_tot_exc_tax` DECIMAL(7,2) NOT NULL,
     `ode_tax_rate` DECIMAL(4,2) NOT NULL,
     `ode_tot_all_tax_inc` DECIMAL(7,2) NOT NULL,
     `ode_pro_id` INT NOT NULL,
     `ode_ord_id` INT NOT NULL,
     `ode_ost_id` INT NOT NULL,
     `ode_com_id` INT NOT NULL,
     FOREIGN KEY (`ode_pro_id`) REFERENCES `products`(`pro_id`) ON DELETE SET NULL,
     FOREIGN KEY (`ode_ord_id`) REFERENCES `orders`(`ord_id`),
     FOREIGN KEY (`ode_ost_id`) REFERENCES `order_status`(`ost_id`),
     FOREIGN KEY (`ode_com_id`) REFERENCES `commercials`(`com_id`)
)
ENGINE = innoDB;

-- CREATION DE LA TABLE delivery_details --

CREATE TABLE `delivery_details` (
     `dde_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
     `dde_qty` INT NOT NULL,
     `dde_ode_id` INT NOT NULL,
     `dde_del_date` DATE NOT NULL,
     FOREIGN KEY (`dde_ode_id`) REFERENCES `order_details`(`ode_id`)
)
ENGINE = innoDB;