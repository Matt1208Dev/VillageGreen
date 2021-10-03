-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 03 oct. 2021 à 18:16
-- Version du serveur :  8.0.22
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `village_green`
--
CREATE DATABASE IF NOT EXISTS `village_green` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `village_green`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `p_del_moy_com_fact`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_del_moy_com_fact` (OUT `result` INT)  BEGIN

SELECT ROUND(AVG(DATEDIFF(`ord_bil_date`, `ord_date`))) AS `Delai`
FROM `orders`
WHERE `ord_bil_date` NOT LIKE 'null';

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_parent_id` int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_parent_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_parent_id`) VALUES
(1, 'Guitares', NULL),
(2, 'Basses', NULL),
(3, 'Batteries', NULL),
(4, 'Claviers', NULL),
(5, 'Studio', NULL),
(6, 'Sono', NULL),
(7, 'Accessoires', NULL),
(8, 'Guitares Electriques', 1),
(9, 'Guitares Classiques', 1),
(10, 'Guitares Acoustiques & Electro-acoustiques', 1),
(11, 'Guitare Gauchers', 1),
(12, 'Basses Electriques', 2),
(13, 'Basses Acoustiques', 2),
(14, 'Basses Semi-acoustiques', 2),
(15, 'Ukulélés', 1),
(16, 'Autres instruments à cordes pincées', NULL),
(17, 'Accessoires Guitares/Basses', 7),
(18, 'Batteries Acoustiques', 3),
(19, 'Batteries Electroniques', 3),
(20, 'Accessoires Batteries', 7);

-- --------------------------------------------------------

--
-- Structure de la table `commercials`
--

DROP TABLE IF EXISTS `commercials`;
CREATE TABLE IF NOT EXISTS `commercials` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `com_lastname` varchar(50) NOT NULL,
  `com_firstname` varchar(50) NOT NULL,
  `com_type` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `com_username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commercials`
--

INSERT INTO `commercials` (`com_id`, `com_lastname`, `com_firstname`, `com_type`, `com_username`, `com_pass`) VALUES
(1, 'Wyatt', 'Sean', 'Professionnel', 'swyatt', 'Swyatt2021'),
(2, 'Fischer', 'Lynn', 'Professionnel', NULL, NULL),
(3, 'Bush', 'Blair', 'Professionnel', NULL, NULL),
(4, 'Stephenson', 'Allen', 'Professionnel', NULL, NULL),
(5, 'Wilkinson', 'Sheila', 'Particulier', NULL, NULL),
(6, 'WEB', 'WEB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `cus_id` int NOT NULL AUTO_INCREMENT,
  `cus_lastname` varchar(50) NOT NULL,
  `cus_firstname` varchar(30) NOT NULL,
  `cus_sex` int NOT NULL,
  `cus_bil_address` varchar(255) NOT NULL,
  `cus_bil_postalcode` varchar(5) NOT NULL,
  `cus_bil_city` varchar(30) NOT NULL,
  `cus_del_address` varchar(255) NOT NULL,
  `cus_del_postalcode` varchar(5) NOT NULL,
  `cus_del_city` varchar(30) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_mail` varchar(255) NOT NULL,
  `cus_pass` varchar(255) DEFAULT NULL,
  `cus_type` varchar(15) NOT NULL,
  `cus_coef` int NOT NULL,
  `cus_com_id` int DEFAULT NULL,
  PRIMARY KEY (`cus_id`),
  KEY `cus_rep_id` (`cus_com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_lastname`, `cus_firstname`, `cus_sex`, `cus_bil_address`, `cus_bil_postalcode`, `cus_bil_city`, `cus_del_address`, `cus_del_postalcode`, `cus_del_city`, `cus_phone`, `cus_mail`, `cus_pass`, `cus_type`, `cus_coef`, `cus_com_id`) VALUES
(1, 'Julien', 'Jade', 1, 'P.O. Box 589, 2728 Faucibus Road', '57322', 'Opprebais', 'Ap #291-7296 Neque Rd.', '74630', 'Tumbler Ridge', '154918534', 'mauris@eutelluseu.edu', NULL, 'Particulier', 40, 5),
(2, 'Fernandez', 'Syrine', 1, 'Ap #722-1789 Consequat Rd.', '2899', 'Maria', '480 Convallis Street', '76111', 'Worcester', '575453461', 'Phasellus.fermentum@Maurismagna.edu', NULL, 'Particulier', 40, 5),
(3, 'Noel', 'Emma', 1, '2365 Erat Av.', '32559', 'Steenokkerzeel', 'Ap #179-4965 Commodo Avenue', '62043', 'Colledimacine', '698962896', 'velit.Cras.lorem@estvitaesodales.co.uk', NULL, 'Particulier', 40, 5),
(4, 'Barbier', 'Éléna', 1, '567-4288 Nonummy Av.', '92179', 'Nederhasselt', '334-7788 Habitant Rd.', '63072', 'Sasaram', '840271109', 'aliquet.libero@sociisnatoque.com', NULL, 'Particulier', 40, 5),
(5, 'Renault', 'Marine', 1, 'P.O. Box 417, 1528 Justo Av.', '10516', 'Nemoli', 'Ap #904-1818 Adipiscing Street', '28089', 'Linares', '340916457', 'Sed@NullaaliquetProin.co.uk', '$2y$10$HguM6tpJVSt3EjWnklveeOp2Wp0bJECzWLAPsbG3k3JOdH34T6oa2', 'Particulier', 40, 5),
(6, 'Albert', 'Clara', 1, '427-9890 Risus. Av.', '60795', 'Toltén', '543-6128 Fermentum Avenue', '53414', 'Walhain-Saint-Paul', '127821122', 'diam.Pellentesque.habitant@cursus.org', NULL, 'Particulier', 40, 5),
(7, 'Gillet', 'Alexia', 1, 'P.O. Box 733, 3384 Vitae Av.', '71923', 'Devon', '8572 Nibh. St.', '28141', 'Puri', '811766516', 'Donec@eratneque.edu', NULL, 'Particulier', 40, 5),
(8, 'Morin', 'Solene', 1, 'P.O. Box 123, 3946 Odio Street', '29823', 'Portree', 'P.O. Box 463, 8746 Eleifend, Street', '91305', 'San Massimo', '803167652', 'nibh.vulputate.mauris@egestas.com', NULL, 'Particulier', 40, 5),
(9, 'Vidal', 'Manon', 1, '600-9668 Nulla. Street', '29479', 'Vorselaar', '969-703 Mauris Street', '60532', 'Verrès', '619228269', 'ut@acsem.ca', NULL, 'Particulier', 40, 5),
(10, 'Roux', 'Ambre', 1, 'Ap #702-6655 Mauris Avenue', '46507', 'Aylmer', 'Ap #129-2616 Nulla St.', '27389', 'Smolensk', '530302353', 'mauris.ut@arcuVestibulum.edu', NULL, 'Particulier', 40, 5),
(11, 'Roche', 'Célia', 1, 'Ap #386-8760 Semper Road', '20084', 'Rupelmonde', '579-1148 Dis Avenue', '99933', 'Asso', '598133004', 'sociis@sedleoCras.net', NULL, 'Professionnel', 20, 3),
(12, 'Fournier', 'Elsa', 1, '9222 Vulputate Street', '47240', 'Getafe', '2671 Tellus Avenue', '65076', 'Llandovery', '224951980', 'pellentesque.tellus.sem@dolorsit.org', NULL, 'Professionnel', 20, 1),
(13, 'Guyot', 'Marion', 1, '8293 Ultrices Road', '52874', 'Mol', '379-7644 Maecenas Street', '97477', 'Carmarthen', '679902597', 'Integer.eu.lacus@elementumlorem.co.uk', NULL, 'Professionnel', 20, 3),
(14, 'Laine', 'Juliette', 1, 'P.O. Box 555, 5879 Sodales Rd.', '8507', 'Trevignano Romano', 'Ap #373-2950 Et St.', '46673', 'East Jakarta', '673672349', 'Suspendisse.sagittis.Nullam@Donecconsectetuer.ca', NULL, 'Professionnel', 20, 4),
(15, 'Francois', 'Lauriane', 1, 'Ap #238-2377 Dictum Ave', '78854', 'Blitar', 'Ap #842-7895 Lorem Ave', '50408', 'Wardin', '959483273', 'amet.faucibus.ut@sapiencursus.edu', NULL, 'Professionnel', 20, 3),
(16, 'Barre', 'Julia', 1, '837-3657 Felis Avenue', '75573', 'Fernie', 'P.O. Box 246, 4267 Odio. Rd.', '67730', 'Hamme', '220694746', 'turpis.egestas.Fusce@mi.org', NULL, 'Professionnel', 20, 1),
(17, 'Denis', 'Maïlé', 1, '498-5780 Sem, St.', '90424', 'Glasgow', 'P.O. Box 105, 6773 Ipsum. Ave', '4265', 'Swan Hills', '268385804', 'mauris.Morbi@nullamagnamalesuada.ca', NULL, 'Professionnel', 20, 4),
(18, 'Paris', 'Élise', 1, 'Ap #664-9234 Enim. Ave', '94676', 'Osorno', 'Ap #215-735 Sed Rd.', '65559', 'Jedburgh', '103541285', 'lacus.Mauris@orciinconsequat.com', NULL, 'Professionnel', 20, 2),
(19, 'Roussel', 'Yüna', 1, '501-7804 Nam Av.', '12557', 'Betim', 'P.O. Box 543, 6630 Tortor St.', '15728', 'Peterhead', '296035718', 'at@Nullamlobortisquam.com', NULL, 'Professionnel', 20, 4),
(20, 'Louis', 'Sarah', 1, '1085 Vehicula Rd.', '68238', 'Bella', '9404 Dolor, Ave', '42317', 'Asti', '676106827', 'consectetuer.mauris.id@molestiesodalesMauris.org', NULL, 'Professionnel', 20, 4),
(21, 'Royer', 'Dylan', 0, '3091 Nunc Av.', '2456', 'Saint-Dizier', '137-9567 Nam Rd.', '61458', 'Bandırma', '962260786', 'malesuada.fames@nonvestibulumnec.net', NULL, 'Professionnel', 20, 4),
(22, 'Picard', 'Lorenzo', 0, 'P.O. Box 734, 3404 Eget St.', '3029', 'Boca del Río', 'P.O. Box 888, 2666 Sit St.', '50536', 'Pointe-au-Pic', '869309269', 'neque.sed@at.com', NULL, 'Professionnel', 20, 1),
(23, 'Dumont', 'Gabriel', 0, 'Ap #608-6775 Natoque Rd.', '20980', 'Dalbeattie', '395-4116 Enim Av.', '38675', 'Napier', '525929150', 'vitae@vitaeodio.com', NULL, 'Professionnel', 20, 2),
(24, 'Blanchard', 'Corentin', 0, '3759 Enim, Street', '75749', 'Borchtlombeek', 'Ap #999-3125 Aliquet. St.', '49242', 'Lanester', '420510403', 'sit.amet@velitegetlaoreet.co.uk', NULL, 'Professionnel', 20, 2),
(25, 'Henry', 'Killian', 0, 'Ap #910-4587 Lacus. Road', '73860', 'Barasat', 'Ap #353-9582 Vulputate St.', '8040', 'Annapolis', '646326706', 'lacus.varius@ategestas.org', NULL, 'Professionnel', 20, 2),
(26, 'Gay', 'Tom', 0, 'P.O. Box 747, 7235 Cursus Rd.', '68253', 'Caprino Bergamasco', 'P.O. Box 614, 3174 Semper Rd.', '79530', 'Lithgow', '626795129', 'nunc@erategetipsum.edu', NULL, 'Professionnel', 20, 4),
(27, 'Noel', 'Ethan', 0, '586-3803 Condimentum. Rd.', '90672', 'Marzabotto', '323-447 Proin Street', '45815', 'Bognor Regis', '536350008', 'non.hendrerit.id@urnaVivamusmolestie.net', NULL, 'Professionnel', 20, 1),
(28, 'Rodriguez', 'Mathis', 0, 'P.O. Box 887, 8715 Pede, Av.', '18141', 'Contulmo', '710-2522 Egestas. Road', '71273', 'Inírida', '482025438', 'nunc.nulla@bibendumfermentummetus.org', NULL, 'Professionnel', 20, 4),
(29, 'Pons', 'Diego', 0, '5649 Magna, Rd.', '14481', 'Cerami', 'Ap #911-8453 Tincidunt St.', '95953', 'Chungju', '167308729', 'Phasellus.vitae.mauris@nulla.ca', NULL, 'Professionnel', 20, 3),
(30, 'Maillard', 'Léonard', 0, 'P.O. Box 206, 9826 Quisque St.', '23952', 'Hereford', 'P.O. Box 280, 1245 Pellentesque Rd.', '47370', 'Monte Patria', '393010109', 'Mauris@Nullamnisl.net', NULL, 'Professionnel', 20, 2),
(31, 'Picard', 'Yohan', 0, '4790 Laoreet Street', '60197', 'Romford', 'P.O. Box 550, 4708 Maecenas St.', '50008', 'Edmundston', '517450533', 'Maecenas.ornare@mattisornare.ca', NULL, 'Particulier', 40, 5),
(32, 'Duval', 'Adrien', 0, 'P.O. Box 767, 6601 Dignissim Rd.', '58315', 'Cali', '939-4689 Natoque Road', '59781', 'Sawahlunto', '822577352', 'neque@nequeNullamut.co.uk', NULL, 'Particulier', 40, 5),
(33, 'Vincent', 'Bruno', 0, 'P.O. Box 498, 113 Eget, St.', '14366', 'Andenne', 'Ap #951-5343 Odio Av.', '5550', 'Hay-on-Wye', '686134694', 'vel.est.tempor@nonbibendum.ca', NULL, 'Particulier', 40, 5),
(34, 'Charles', 'Martin', 0, '971-5517 Tristique Road', '69958', 'Sant\'Arsenio', '943-1355 Diam. Rd.', '30094', 'Puerto Carreño', '199750580', 'bibendum.fermentum.metus@taciti.org', NULL, 'Particulier', 40, 5),
(35, 'Rey', 'Gabin', 0, 'P.O. Box 919, 4656 Ipsum St.', '54613', 'HŽlŽcine', '8265 Vivamus Road', '44648', 'Fort Wayne', '202443483', 'elit@vestibulum.net', NULL, 'Particulier', 40, 5),
(36, 'Faure', 'Kilian', 0, '7476 Iaculis Ave', '62708', 'Pontedera', '361-4267 Lectus Avenue', '84197', 'Villahermosa', '124145340', 'sit.amet.ante@aliquamarcu.com', NULL, 'Particulier', 40, 5),
(37, 'Huet', 'Tom', 0, '5605 Ligula Rd.', '48473', 'Chennai', 'P.O. Box 581, 4017 Ridiculus Av.', '36737', 'Coinco', '486493683', 'Aenean.eget.magna@justonecante.ca', NULL, 'Particulier', 40, 5),
(38, 'Guerin', 'Louis', 0, '562-4918 Nunc Street', '33026', 'White Rock', 'Ap #183-6792 Lorem Street', '41364', 'Stratford-upon-Avon', '121810160', 'Etiam@Phasellus.com', NULL, 'Particulier', 40, 5),
(39, 'Nicolas', 'Hugo', 0, '7481 Consequat Street', '66563', 'Idaho Falls', 'Ap #148-107 Sed Rd.', '89923', 'Liedekerke', '898751603', 'lacus.Quisque.imperdiet@utnulla.com', NULL, 'Particulier', 40, 5),
(40, 'Meunier', 'Ethan', 0, '8962 Purus St.', '1776', 'Craco', '651-5039 Et, St.', '81741', 'Vremde', '760565982', 'in.molestie@Suspendisse.com', NULL, 'Particulier', 40, 5),
(42, 'Doe', 'John', 0, '1 rue de Nowhere', '75000', 'Paris', '1 rue de Nowhere', '75000', 'Paris', '0612345678', 'john.doe@gmail.com', '$2y$10$nqeUg3eqTzkuKXVmxeBgfeLzq/MC5bKsnwJ4fktG5gsbSJkW.kaLG', 'Particulier', 40, NULL),
(45, 'Doe', 'Jane', 1, '1 rue de Nowhere', '75000', 'Paris', '12 rue de Nowhere', '75000', 'Paris', '0635123456', 'jane.doe@gmail.com', '$2y$10$EiEeqUIgqVxmKu7j3kpxVu7TRltcY46GybDbVsgm75d8rN6dYZOgu', 'Professionnel', 20, NULL),
(46, 'Doe', 'Johnny', 1, '12 ', '75000', 'BE GOO CITY', '12 ', '75000', 'BE GOO CITY', '0612345678', 'johnny.doe@gmail.com', '$2y$10$RyQ54vfDRzg5NDSdbyQPp.USyelLPjHXRA08cWaAdrUHAKJciqbIq', 'Professionnel', 20, NULL),
(47, 'Cardin', 'Pierre', 0, '2 Rue du Style', '75000', 'Paris', '2 Rue du Style', '75000', 'Paris', '0798765432', 'ald8-YU@kl3.fr', '$2y$10$NLStHp4GUiBUh9h6q4Gnx.tT5mtRm4KGE/P8ZRHJMtyeYuZ/UUas2', 'Professionnel', 20, NULL),
(48, 'allard', 'audrey', 1, 'rue de nul part', '60220', 'campeaux', 'rue de nul part', '60220', 'campeaux', '0608844507', 'allard.audrey60@gmail.com', '$2y$10$a3i3tQGhLWp0MHK46lkR3O8frCDq7IlmMhiBC9mIJ7txQCI4RASya', 'Particulier', 40, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `delivery_details`
--

DROP TABLE IF EXISTS `delivery_details`;
CREATE TABLE IF NOT EXISTS `delivery_details` (
  `dde_id` int NOT NULL AUTO_INCREMENT,
  `dde_qty` int NOT NULL,
  `dde_ode_id` int NOT NULL,
  `dde_del_date` date NOT NULL,
  PRIMARY KEY (`dde_id`),
  KEY `dde_ode_id` (`dde_ode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `delivery_details`
--

INSERT INTO `delivery_details` (`dde_id`, `dde_qty`, `dde_ode_id`, `dde_del_date`) VALUES
(1, 1, 1, '2021-01-23'),
(2, 1, 2, '2021-02-15'),
(3, 1, 3, '2021-03-20'),
(4, 1, 4, '2021-04-25'),
(5, 1, 5, '2021-04-20'),
(6, 1, 6, '2021-02-15'),
(7, 1, 7, '2021-06-17'),
(8, 1, 8, '2021-06-17');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int NOT NULL AUTO_INCREMENT,
  `ord_date` date NOT NULL,
  `ord_discount` decimal(4,2) DEFAULT NULL,
  `ord_pay_method` varchar(10) NOT NULL,
  `ord_ost_id` int NOT NULL,
  `ord_cus_id` int NOT NULL,
  `ord_del_time` date DEFAULT NULL,
  `ord_bil_date` date DEFAULT NULL,
  `ord_com_id` int DEFAULT NULL,
  `ord_del_address` varchar(255) DEFAULT NULL,
  `ord_del_postalcode` varchar(5) DEFAULT NULL,
  `ord_del_city` varchar(30) DEFAULT NULL,
  `ord_del_phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `ord_ost_id` (`ord_ost_id`),
  KEY `ord_cus_id` (`ord_cus_id`),
  KEY `ord_com_id` (`ord_com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`ord_id`, `ord_date`, `ord_discount`, `ord_pay_method`, `ord_ost_id`, `ord_cus_id`, `ord_del_time`, `ord_bil_date`, `ord_com_id`, `ord_del_address`, `ord_del_postalcode`, `ord_del_city`, `ord_del_phone`) VALUES
(1, '2021-01-20', '5.00', 'Comptant', 7, 5, '2021-01-23', '2021-01-23', NULL, NULL, NULL, NULL, NULL),
(2, '2021-02-10', '0.00', 'Comptant', 7, 8, '2021-02-15', '2021-02-15', NULL, NULL, NULL, NULL, NULL),
(3, '2021-03-14', '0.00', 'Comptant', 7, 39, '2021-03-19', '2021-03-20', NULL, NULL, NULL, NULL, NULL),
(4, '2021-04-17', '10.00', 'Différé', 6, 14, '2021-04-21', '2021-04-25', NULL, NULL, NULL, NULL, NULL),
(5, '2021-04-10', '10.00', 'Différé', 6, 25, '2021-04-19', '2021-04-20', NULL, NULL, NULL, NULL, NULL),
(6, '2021-05-04', '0.00', 'Différé', 7, 17, '2021-05-15', '2021-05-15', NULL, NULL, NULL, NULL, NULL),
(7, '2021-06-14', '0.00', 'Différé', 3, 29, '2021-06-18', NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2021-09-01', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2021-09-02', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2021-09-02', NULL, 'Différé', 1, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2021-09-02', NULL, 'Comptant', 8, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2021-09-02', NULL, 'Comptant', 2, 42, '2021-09-09', NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2021-09-02', NULL, 'Comptant', 1, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2021-09-06', NULL, 'Comptant', 1, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2021-09-07', NULL, 'Comptant', 1, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '2021-09-07', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2021-09-07', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2021-09-07', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2021-09-07', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '2021-09-07', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2021-09-07', NULL, 'Comptant', 8, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2021-09-07', NULL, 'Comptant', 8, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '2021-09-07', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2021-09-07', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2021-09-08', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2021-09-08', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2021-09-08', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2021-09-13', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2021-09-13', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '2021-09-15', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '2021-09-15', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '2021-09-16', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2021-09-16', NULL, 'Différé', 8, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2021-09-16', NULL, 'Comptant', 8, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, '2021-09-16', NULL, 'Comptant', 8, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2021-09-16', NULL, 'Comptant', 9, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2021-09-22', NULL, 'Comptant', 9, 42, NULL, NULL, 6, '1 rue de Nowhere', '75000', 'Paris', '0612345678'),
(55, '2021-09-22', NULL, 'Comptant', 9, 42, '2021-09-27', NULL, 6, '1 rue de Nowhere', '75000', 'Paris', '0612345678'),
(56, '2021-09-22', NULL, 'Comptant', 8, 42, '2021-09-27', NULL, 6, '1 rue de Nowhere', '75000', 'Paris', '0612345678'),
(57, '2021-09-24', NULL, 'Comptant', 8, 42, '2021-09-29', NULL, 6, '1 rue de Nowhere', '75000', 'Paris', '0612345678'),
(58, '2021-09-24', NULL, 'Comptant', 9, 42, '2021-09-29', NULL, 6, '1 rue de Nowhere', '75000', 'Paris', '0612345678');

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `ode_id` int NOT NULL AUTO_INCREMENT,
  `ode_qty` int NOT NULL,
  `ode_tot_exc_tax` decimal(7,2) NOT NULL,
  `ode_tax_rate` decimal(4,2) NOT NULL,
  `ode_tot_all_tax_inc` decimal(7,2) NOT NULL,
  `ode_pro_id` int DEFAULT NULL,
  `ode_ord_id` int NOT NULL,
  `ode_ost_id` int DEFAULT NULL,
  `ode_com_id` int DEFAULT NULL,
  PRIMARY KEY (`ode_id`),
  KEY `ode_ord_id` (`ode_ord_id`),
  KEY `ode_ost_id` (`ode_ost_id`),
  KEY `order_details_ibfk_1` (`ode_pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`ode_id`, `ode_qty`, `ode_tot_exc_tax`, `ode_tax_rate`, `ode_tot_all_tax_inc`, `ode_pro_id`, `ode_ord_id`, `ode_ost_id`, `ode_com_id`) VALUES
(1, 1, '549.00', '20.00', '659.80', 1, 1, 5, NULL),
(2, 1, '579.00', '20.00', '694.80', 2, 2, 5, NULL),
(3, 1, '649.00', '20.00', '778.80', 3, 3, 5, NULL),
(4, 1, '469.00', '20.00', '562.80', 4, 4, 5, NULL),
(5, 1, '499.00', '20.00', '598.80', 5, 5, 5, NULL),
(6, 1, '429.00', '20.00', '514.80', 6, 6, 5, NULL),
(7, 1, '689.00', '20.00', '826.80', 7, 7, 5, NULL),
(8, 1, '579.00', '20.00', '694.80', 2, 7, 5, NULL),
(9, 1, '598.80', '20.00', '718.56', 3, 11, 8, NULL),
(10, 1, '598.80', '20.00', '718.56', 3, 12, 1, NULL),
(18, 1, '466.80', '20.00', '560.16', 5, 17, 1, NULL),
(19, 1, '1197.60', '20.00', '1437.12', 8, 17, 1, NULL),
(20, 1, '466.80', '20.00', '560.16', 5, 18, 1, NULL),
(21, 1, '1197.60', '20.00', '1437.12', 8, 18, 1, NULL),
(26, 1, '466.80', '20.00', '560.16', 5, 21, 1, NULL),
(27, 1, '418.80', '20.00', '502.56', 4, 21, 1, NULL),
(28, 1, '466.80', '20.00', '560.16', 5, 22, 1, NULL),
(29, 1, '418.80', '20.00', '502.56', 4, 22, 1, NULL),
(30, 1, '1197.60', '20.00', '1437.12', 8, 23, 8, NULL),
(31, 1, '1134.00', '20.00', '1360.80', 12, 23, 8, NULL),
(32, 1, '598.80', '20.00', '718.56', 3, 24, 1, NULL),
(33, 1, '508.80', '20.00', '610.56', 2, 25, 1, NULL),
(34, 2, '1142.40', '20.00', '1370.88', 13, 26, 8, NULL),
(36, 1, '768.60', '20.00', '922.32', 7, 28, 8, NULL),
(37, 1, '616.00', '20.00', '739.20', 1, 29, 3, NULL),
(38, 1, '1142.40', '20.00', '1370.88', 13, 30, 1, NULL),
(39, 1, '544.60', '20.00', '653.52', 5, 30, 2, NULL),
(40, 1, '488.60', '20.00', '586.32', 4, 31, 8, NULL),
(41, 1, '404.60', '20.00', '485.52', 6, 32, 8, NULL),
(42, 1, '375.20', '20.00', '450.24', 9, 32, 8, NULL),
(43, 1, '593.60', '20.00', '712.32', 2, 33, 8, NULL),
(44, 1, '698.60', '20.00', '838.32', 3, 33, 8, NULL),
(45, 1, '375.20', '20.00', '450.24', 9, 34, 8, NULL),
(46, 1, '375.20', '20.00', '450.24', NULL, 34, 8, NULL),
(47, 1, '375.20', '20.00', '450.24', 9, 35, 8, NULL),
(48, 1, '375.20', '20.00', '450.24', NULL, 35, 8, NULL),
(49, 1, '375.20', '20.00', '450.24', 9, 36, 8, NULL),
(50, 1, '375.20', '20.00', '450.24', NULL, 36, 8, NULL),
(51, 1, '1397.20', '20.00', '1676.64', 8, 37, 8, NULL),
(52, 1, '768.60', '20.00', '922.32', 7, 37, 8, NULL),
(53, 1, '593.60', '20.00', '712.32', 2, 38, 8, NULL),
(54, 1, '598.80', '20.00', '718.56', 3, 39, 8, NULL),
(56, 1, '508.80', '20.00', '610.56', 2, 41, 8, NULL),
(57, 1, '508.80', '20.00', '610.56', 2, 42, 8, NULL),
(58, 1, '418.80', '20.00', '502.56', 4, 43, 8, NULL),
(59, 1, '346.80', '20.00', '416.16', 6, 43, 8, NULL),
(60, 1, '418.80', '20.00', '502.56', 4, 44, 8, NULL),
(61, 1, '346.80', '20.00', '416.16', 6, 44, 8, NULL),
(62, 1, '1397.20', '20.00', '1676.64', 8, 45, 1, NULL),
(63, 1, '1323.00', '20.00', '1587.60', 12, 45, 8, NULL),
(64, 2, '598.80', '20.00', '718.56', 3, 46, 8, NULL),
(65, 1, '1397.20', '20.00', '1676.64', 8, 47, 1, NULL),
(66, 1, '1397.20', '20.00', '1676.64', 8, 48, 1, NULL),
(67, 1, '528.00', '20.00', '633.60', 1, 49, 8, NULL),
(68, 2, '508.80', '20.00', '610.56', 2, 50, 8, NULL),
(69, 1, '768.60', '20.00', '922.32', 7, 51, 8, NULL),
(70, 2, '593.60', '20.00', '712.32', 2, 51, 8, NULL),
(71, 1, '768.60', '20.00', '922.32', 7, 52, 8, NULL),
(72, 2, '593.60', '20.00', '712.32', 2, 52, 8, NULL),
(73, 1, '768.60', '20.00', '922.32', 7, 53, 1, NULL),
(74, 2, '593.60', '20.00', '712.32', 2, 53, 8, NULL),
(75, 1, '1142.40', '20.00', '1370.88', 13, 54, 1, NULL),
(76, 1, '375.20', '20.00', '450.24', NULL, 55, 1, NULL),
(77, 1, '593.60', '20.00', '712.32', 2, 56, 8, 6),
(78, 1, '1323.00', '20.00', '1587.60', 12, 57, 8, 6),
(79, 1, '404.60', '20.00', '485.52', 6, 57, 8, 6),
(80, 1, '593.60', '20.00', '712.32', 2, 58, 1, 6),
(81, 2, '375.20', '20.00', '450.24', 9, 58, 1, 6);

--
-- Déclencheurs `order_details`
--
DROP TRIGGER IF EXISTS `after_insert_order_details`;
DELIMITER $$
CREATE TRIGGER `after_insert_order_details` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
    UPDATE products
    SET pro_phy_stk = products.pro_phy_stk - NEW.ode_qty
    WHERE pro_id = NEW.ode_pro_id;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `after_update_order_details`;
DELIMITER $$
CREATE TRIGGER `after_update_order_details` AFTER UPDATE ON `order_details` FOR EACH ROW BEGIN
    IF NEW.ode_ost_id = 8
    THEN
    UPDATE products
    SET pro_phy_stk = products.pro_phy_stk + NEW.ode_qty
    WHERE pro_id = NEW.ode_pro_id;
    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
CREATE TABLE IF NOT EXISTS `order_status` (
  `ost_id` int NOT NULL AUTO_INCREMENT,
  `ost_label` varchar(25) NOT NULL,
  PRIMARY KEY (`ost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `order_status`
--

INSERT INTO `order_status` (`ost_id`, `ost_label`) VALUES
(1, 'En cours de traitement'),
(2, 'En préparation'),
(3, 'Expédiée'),
(4, 'Livrée'),
(5, 'Facturée'),
(6, 'Retard de paiement'),
(7, 'Soldée'),
(8, 'Annulée'),
(9, 'En cours'),
(10, 'Terminée');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pro_id` int NOT NULL AUTO_INCREMENT,
  `pro_ref` varchar(15) NOT NULL,
  `pro_label` varchar(50) NOT NULL,
  `pro_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pro_ppet` decimal(7,2) NOT NULL,
  `pro_spet` decimal(7,2) NOT NULL,
  `pro_photo` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pro_phy_stk` int NOT NULL,
  `pro_lock` int NOT NULL,
  `pro_add_date` datetime NOT NULL,
  `pro_modif_date` date DEFAULT NULL,
  `pro_sup_id` int NOT NULL,
  `pro_cat_id` int NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `pro_sup_id` (`pro_sup_id`),
  KEY `pro_cat_id` (`pro_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`pro_id`, `pro_ref`, `pro_label`, `pro_desc`, `pro_ppet`, `pro_spet`, `pro_photo`, `pro_phy_stk`, `pro_lock`, `pro_add_date`, `pro_modif_date`, `pro_sup_id`, `pro_cat_id`) VALUES
(1, 'RYB88', 'Fender Stratocaster', '3 micros simple bobinage, corps aulne, manche érable', '440.00', '660.00', 'jpg', 2, 0, '2015-12-24 00:00:00', '2021-09-27', 1, 8),
(2, 'KFDJ4U8', 'Fender Telecaster', '1 micro simple bobinage et 1 double, corps aulne, manche érable', '424.00', '424.00', 'jpg', 2, 1, '2014-08-21 00:00:00', '2021-09-24', 1, 8),
(3, '2845JGO2', 'Cort MBC-1', '1 micro simple bobinage et 1 double Manson, corps aulne, manche érable, touche palissandre', '499.00', '748.50', 'jpg', 3, 0, '2016-06-11 00:00:00', NULL, 2, 8),
(4, 'JDFI387', 'Cort Action', '2 micros simple, corps acajou, manche érable', '349.00', '523.50', 'jpg', 4, 0, '2018-09-01 00:00:00', NULL, 2, 12),
(5, '2JD7Y2', 'Epiphone LesPaul Standard Plus Pro', '2 micros Burstbucker, corps acajou, manche acajou, touche palissandre', '389.00', '583.50', 'jpg', 4, 0, '2013-06-05 00:00:00', NULL, 3, 8),
(6, 'FG700', 'Yamaha FG 700', 'corps palissandre, manche acajou, touche palissandre', '289.00', '433.50', 'jpg', 4, 0, '2014-04-02 00:00:00', '2021-08-24', 4, 10),
(7, '2845JGO2LH', 'Cort MBC-1 LH', 'Version gaucher 1 micro simple bobinage et 1 double Manson, corps aulne, manche érable, touche palissandre', '390.00', '585.00', 'jpg', 4, 0, '2016-06-11 00:00:00', '2021-09-16', 2, 11),
(8, 'SG Junior VC', 'Gibson SG Junior', 'Corps en acajou\r\nManche en acajou\r\nTouche en palissandre\r\nRepères \"points\"\r\nProfil du manche: Slim Taper\r\nSillet Graph Tech\r\nRayon de la touche: 12\"\r\nLargeur au sillet: 43 mm\r\nDiapason: 628 mm\r\n1 micro Dog Ear P90\r\n1 réglage de volume\r\n1 réglage de tonali', '998.00', '1497.00', 'jpg', 1, 0, '2021-08-03 00:00:00', '2021-09-27', 3, 8),
(9, 'BT1 ', 'Taylor Baby Taylor Walnut', 'Small Body Dreadnought\r\nTable en épicéa de Sitka massif\r\nBarrage en X\r\nFond et éclisses en contreplaqué de noyer\r\nManche en érable\r\nTouche en ébène\r\nRepères \"points\"\r\n19 frettes\r\nDiapason: 578 mm (22 3/4\")\r\nLargeur au sillet: 42,8 mm (1 11/16\")\r\nSillets d', '268.00', '402.00', 'jpg', -2, 0, '0000-00-00 00:00:00', '2021-08-04', 11, 10),
(12, 'Explorer Antiqu', 'Gibson Explorer Antique Natural', 'Corps en acajou\r\nManche en acajou\r\nProfil du manche: Slim Taper\r\nLargeur au sillet: 43 mm\r\nTouche en palissandre\r\nDiapason: 628 mm\r\n22 frettes Medium traitées à froid\r\nSillet TekToid\r\nRepères \"points\"\r\nChevalet Tune-o-matic en aluminum\r\nCordier Stop Bar e', '945.00', '1417.50', 'jpg', 3, 0, '2021-08-04 00:00:00', '2021-08-10', 3, 8),
(13, 'Les Paul Tribut', 'Gibson Les Paul Tribute STB LH', 'Version gaucher\r\nCorps en acajou\r\nPoids du corps réduit (Ultra Modern Weight Relief)\r\nTable en érable\r\nManche en érable\r\nTouche en palissandre\r\nProfil du manche: Arrondi\r\nSillet TekToid\r\nLargeur au sillet: 43 mm\r\nDiapason: 628 mm\r\n22 frettes Medium', '816.00', '1224.00', 'jpg', 3, 0, '2021-08-04 00:00:00', '2021-09-27', 3, 11),
(20, 'PlusTop Pro LH', 'Epiphone LesPaul Standard', 'Version gaucher\r\nCollection \"Inspired by Gibson\"\r\nCorps en acajou\r\nTable en érable flammé AA\r\nFilet couleur crème\r\nManche en acajou\r\nProfil du manche: 60 Slim Taper C\r\nTouche en laurier indien\r\nLargeur au sillet: 43 mm (1,693\")\r\nDiapason: 629 mm (24,75\")\r', '350.00', '525.00', 'jpg', 5, 0, '2021-09-16 00:00:00', NULL, 3, 11),
(21, 'Mexican Standar', 'Fender Stratocaster', 'Alder body\r\nMaple neck\r\nMaple fretboard\r\nMatte neck finish\r\n22 Frets\r\nScale: 648 mm\r\nNut width: 42 mm\r\nPickups: 3 New Player AlNiCo V single coils\r\nVolume, tone (neck and middle) and tone control (bridge)\r\n5-Way switch\r\n2-Point tremolo\r\nStandard sealed ma', '450.00', '675.00', 'JPG', 5, 0, '2021-09-16 00:00:00', NULL, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `sup_id` int NOT NULL AUTO_INCREMENT,
  `sup_type` varchar(15) DEFAULT NULL,
  `sup_name` varchar(50) DEFAULT NULL,
  `sup_address` varchar(255) NOT NULL,
  `sup_postalcode` int NOT NULL,
  `sup_city` varchar(30) NOT NULL,
  `sup_contact` varchar(30) NOT NULL,
  `sup_phone` int NOT NULL,
  `sup_mail` varchar(255) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `suppliers`
--

INSERT INTO `suppliers` (`sup_id`, `sup_type`, `sup_name`, `sup_address`, `sup_postalcode`, `sup_city`, `sup_contact`, `sup_phone`, `sup_mail`) VALUES
(1, 'Fabricant', 'Fender Musical Instruments Corporation', 'CP 742, 6133 Dis Avenue', 170977, 'Owensboro', 'Maite Medina', 594370721, 'Morbi.accumsan@fermentum.org'),
(2, 'Fabricant', 'Cort Instruments Korea', '361-3922 Turpis Route', 38364, 'Peutie', 'Vincent Holt', 897853749, 'risus.varius@laoreetipsumCurabitur.org'),
(3, 'Importateur', 'Epiphone America', '2636 Sit Av.', 36187, 'Mastung', 'Kasimir Hall', 355647271, 'ornare@uteratSed.ca'),
(4, 'Importateur', 'YAMAHA Instruments Corp.', '9602 Felis Ave', 30250, 'Malang', 'Georgia Puckett', 561885439, 'Duis@orci.net'),
(5, 'Importateur', 'Ipsum Suspendisse Sagittis Foundation', '923 Mus. Chemin', 547696, 'Pontevedra', 'Adara Mcfarland', 868471863, 'amet.lorem.semper@Curabiturvellectus.edu'),
(6, 'Fabricant', 'Nisl Nulla Eu LLC', '6734 Nonummy Ave', 7666, 'Cape Breton Island', 'Wang Mendez', 549789445, 'feugiat@arcuVestibulum.ca'),
(7, 'Fabricant', 'Commodo Tincidunt Nibh LLC', '937-8749 Neque Rd.', 220676, 'Kruibeke', 'Lacy Tillman', 998931745, 'aliquet.libero@fringilla.net'),
(8, 'Importateur', 'Rhoncus Proin Nisl LLP', '4373 Donec Avenue', 476625, 'Saint-Malo', 'Shelly Byers', 338398015, 'libero.Integer@dolorelit.co.uk'),
(9, 'Fabricant', 'Torquent Per PC', '767-1244 Nibh. Rue', 65406, 'Novosibirsk', 'Daryl Head', 490881135, 'quis@mauris.edu'),
(10, 'Importateur', 'Mollis Phasellus Libero LLC', 'CP 428, 8955 At, Av.', 8616, 'Hugli-Chinsurah', 'Randall Cain', 978679508, 'lobortis@Crasconvallisconvallis.co.uk'),
(11, 'Importateur', 'Leo Elementum Sem LLP', 'CP 760, 133 Dignissim. Rue', 39066, 'Jeongeup', 'Brianna Britt', 709321935, 'quis.accumsan@nuncsed.net'),
(12, 'Importateur', 'Cursus Diam PC', 'Appartement 867-8513 Morbi Chemin', 64685, 'Sant\'Ilario dello Ionio', 'Yoshio Howard', 806326758, 'ac.metus@semegestas.ca'),
(13, 'Fabricant', 'Accumsan Limited', '137-1235 Nonummy Chemin', 56453, 'San Vicente', 'Nehru Wiley', 907797030, 'aliquam.arcu@Namporttitorscelerisque.edu'),
(14, 'Importateur', 'Egestas Urna PC', 'Appartement 929-7748 Eu Avenue', 64787, 'Miranda', 'Dieter Bowers', 379815833, 'non.ante.bibendum@ipsum.edu'),
(15, 'Importateur', 'Natoque Inc.', 'CP 730, 9920 Urna. Route', 66229, 'Montpelier', 'Bertha Spears', 818213612, 'ipsum@elitpharetra.org');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_produits_fournisseurs`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `v_produits_fournisseurs`;
CREATE TABLE IF NOT EXISTS `v_produits_fournisseurs` (
`Contact` varchar(30)
,`DateAjout` datetime
,`idFournisseur` int
,`idProduit` int
,`Libelle` varchar(50)
,`Mail` varchar(255)
,`Nom` varchar(50)
,`PA HT` decimal(7,2)
,`PV HT` decimal(7,2)
,`RefProduit` varchar(15)
,`Stock` int
,`Telephone` int
,`TypeFournisseur` varchar(15)
,`Verrou` int
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_produits_fournisseurs`
--
DROP TABLE IF EXISTS `v_produits_fournisseurs`;

DROP VIEW IF EXISTS `v_produits_fournisseurs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_produits_fournisseurs`  AS  select `products`.`pro_id` AS `idProduit`,`products`.`pro_ref` AS `RefProduit`,`products`.`pro_label` AS `Libelle`,`products`.`pro_ppet` AS `PA HT`,`products`.`pro_spet` AS `PV HT`,`products`.`pro_phy_stk` AS `Stock`,`products`.`pro_lock` AS `Verrou`,`products`.`pro_add_date` AS `DateAjout`,`suppliers`.`sup_id` AS `idFournisseur`,`suppliers`.`sup_type` AS `TypeFournisseur`,`suppliers`.`sup_name` AS `Nom`,`suppliers`.`sup_contact` AS `Contact`,`suppliers`.`sup_phone` AS `Telephone`,`suppliers`.`sup_mail` AS `Mail` from (`products` join `suppliers` on((`products`.`pro_sup_id` = `suppliers`.`sup_id`))) ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`cus_com_id`) REFERENCES `commercials` (`com_id`);

--
-- Contraintes pour la table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD CONSTRAINT `delivery_details_ibfk_1` FOREIGN KEY (`dde_ode_id`) REFERENCES `order_details` (`ode_id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ord_ost_id`) REFERENCES `order_status` (`ost_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ord_cus_id`) REFERENCES `customers` (`cus_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`ord_com_id`) REFERENCES `commercials` (`com_id`);

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`ode_pro_id`) REFERENCES `products` (`pro_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ode_ord_id`) REFERENCES `orders` (`ord_id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`ode_ost_id`) REFERENCES `order_status` (`ost_id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`pro_sup_id`) REFERENCES `suppliers` (`sup_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`pro_cat_id`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
