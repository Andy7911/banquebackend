-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 jan. 2020 à 00:57
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  "api_client"
--

-- --------------------------------------------------------

--
-- Structure de la table "clients"
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE "clients" ;

--
-- Déchargement des données de la table "clients"
--

SET IDENTITY_INSERT "clients" ON ;
INSERT INTO "clients" ("id", "nom", "lastname", "age", "solde", "credit") VALUES
(1, 'james', 'lautira', 22, 2000, 70),
(2, 'Eddy', 'Jacque', 28, 2000, 300000),
(3, 'Benard', 'gay', 25, 2000, 400),
(4, 'gozalez', 'poirreau', 25, 1000, 1250),
(18, 'Wilson ', 'Moise', 52, 40000, 400),
(19, 'Obama', 'Barack', 52, 400000, 50000);

SET IDENTITY_INSERT "clients" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "inventaire"
--

DROP TABLE IF EXISTS `inventaire`;
CREATE TABLE "inventaire" ;

--
-- Déchargement des données de la table "inventaire"
--

SET IDENTITY_INSERT "inventaire" ON ;
INSERT INTO "inventaire" ("id", "item", "description", "price", "stock", "created", "modified") VALUES
(1, 'Télévision', '35 Pouce ecran 1080p', '300', 10, '2010-02-10 00:00:00', '2010-02-10 05:00:00'),
(2, 'Condo Familiale', 'Dimesion de 200 pi carré', '2000000', 10, '2010-02-10 00:00:00', '2010-02-10 05:00:00');

SET IDENTITY_INSERT "inventaire" OFF;

-- --------------------------------------------------------

--
-- Structure de la table "panier"
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE "panier" ;

--
-- Déchargement des données de la table "panier"
--

SET IDENTITY_INSERT "panier" ON ;
INSERT INTO "panier" ("idclient", "iditem", "nb") VALUES
(1, 2, 1),
(1, 1, 2),
(4, 2, 1);

SET IDENTITY_INSERT "panier" OFF;

--
-- Déclencheurs "panier"
--
DROP TRIGGER IF EXISTS `increment`;
DELIMITER $$
CREATE TRIGGER `increment` AFTER INSERT ON `panier` FOR EACH ROW BEGIN
 
   IF NEW.iditem = 1 THEN
    UPDATE panier set nb = nb +1 WHERE iditem=NEW.iditem;
   END IF;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
