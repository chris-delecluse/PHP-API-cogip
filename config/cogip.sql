-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 05 juin 2022 à 13:40
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cogip`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`) VALUES
(1, 'Diwaa', 'diwacode@gmail.com', '$2y$10$vAHe8EMuDZLdiGMRKAQxVe6pvhXqfVgWh0w5z1QCoYtws5khxwX7a');

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `CompaniesId` int(11) NOT NULL,
  `Id_Type` int(11) NOT NULL,
  `company_name` varchar(70) NOT NULL,
  `country` varchar(25) NOT NULL,
  `vat_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`CompaniesId`, `Id_Type`, `company_name`, `country`, `vat_number`) VALUES
(1, 1, 'Raviga', 'United States', 'US456654342'),
(2, 1, 'Dunder Mifflin', 'United States', 'US678765765'),
(3, 1, 'Jouets Jean-Michel', 'France ', 'FR677544000'),
(4, 2, 'Belgalol', 'Belgique ', 'BE0876654665'),
(5, 2, 'Pierre Cailloux', 'France ', 'FR678908654'),
(6, 2, 'Proximdr', 'Belgique ', 'BE0876985665'),
(7, 1, 'Exemple', 'United States', 'US456123456'),
(8, 2, 'test', 'Belgique ', 'BE0876654665'),
(9, 2, 'Second test', 'Belgique ', 'BE0876654665'),
(10, 2, 'billy', 'Belgique ', 'BE0876654665'),
(11, 1, 'testt ', 'Belgique aze', 'BE0876654665'),
(12, 2, 'dsffds', 'Belgique ', 'BE0876654665'),
(13, 1, 'dsffdssfdf', 'Belgique ', 'BE0876654665'),
(14, 2, 'Diwaaentreprise', 'Belgique ', 'BE0876654665'),
(15, 1, 'test', 'France ', 'BE0876654665');

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `Id_Invoice` int(11) NOT NULL,
  `Id_Company` int(11) NOT NULL,
  `Id_People` int(11) NOT NULL,
  `number_invoice` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`Id_Invoice`, `Id_Company`, `Id_People`, `number_invoice`, `date`) VALUES
(10, 5, 10, 'F20123404-007', '2022-05-01'),
(11, 4, 10, 'B20123404-007', '2022-05-01'),
(12, 4, 10, 'B20123404-007', '2022-05-01');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

CREATE TABLE `people` (
  `Id_People` int(11) NOT NULL,
  `Id_Company` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`Id_People`, `Id_Company`, `firstname`, `lastname`, `email`, `Phone`) VALUES
(10, 7, 'Delecluse', 'Christopher', 'christopherdeleclusepro@gmail.com', 477870150),
(13, 10, 'delecluse', 'marieclaire', 'Marie-claire.Delecluse@gmail.com', 477870150),
(14, 7, 'test', 'fetch', 'test.fetch@gmail.com', 477870150),
(15, 7, 'secondTest', 'fetch', 'test.fetch@gmail.com', 477870150);

-- --------------------------------------------------------

--
-- Structure de la table `type_company`
--

CREATE TABLE `type_company` (
  `Id_Type` int(11) NOT NULL,
  `Type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_company`
--

INSERT INTO `type_company` (`Id_Type`, `Type`) VALUES
(1, 'Client'),
(2, 'Provider');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`CompaniesId`),
  ADD KEY `Id_Type` (`Id_Type`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`Id_Invoice`),
  ADD KEY `Id_Company` (`Id_Company`),
  ADD KEY `Id_People` (`Id_People`);

--
-- Index pour la table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`Id_People`),
  ADD KEY `Id_Company` (`Id_Company`);

--
-- Index pour la table `type_company`
--
ALTER TABLE `type_company`
  ADD PRIMARY KEY (`Id_Type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `CompaniesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `Id_Invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `people`
--
ALTER TABLE `people`
  MODIFY `Id_People` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `type_company`
--
ALTER TABLE `type_company`
  MODIFY `Id_Type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`Id_Type`) REFERENCES `type_company` (`Id_Type`);

--
-- Contraintes pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`Id_Company`) REFERENCES `companies` (`CompaniesId`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`Id_People`) REFERENCES `people` (`Id_People`);

--
-- Contraintes pour la table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`Id_Company`) REFERENCES `companies` (`CompaniesId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
