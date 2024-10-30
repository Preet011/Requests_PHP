-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 29 oct. 2024 à 13:08
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `societe2`
--

-- --------------------------------------------------------

--
-- Structure de la table `dirigeants`
--

CREATE TABLE `dirigeants` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `salaire` float NOT NULL,
  `date_embauche` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dirigeants`
--

INSERT INTO `dirigeants` (`id`, `prenom`, `nom`, `poste`, `salaire`, `date_embauche`) VALUES
(10, 'Corine', 'Martin', 'PDG', 3700, '2001-09-02'),
(11, 'Corine', 'Martin', 'PDG', 3700, '2001-09-02'),
(12, 'Corine', 'Martin', 'PDG', 3700, '2001-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `date_embauche` date NOT NULL,
  `salaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `prenom`, `nom`, `sexe`, `service`, `date_embauche`, `salaire`) VALUES
(1, 'Edouard', 'Hernandez', 'm', 'Comptabilité', '2016-02-21', 2000),
(3, 'Janet', 'Boulbi', 'f', 'ressources humaines', '2020-10-11', 2100),
(4, 'Bernard', 'Larivière', 'm', 'informatique', '2018-04-11', 2500),
(5, 'Gertrude', 'kadiata', 'f', 'Comptabilité', '2023-02-03', 2100),
(6, 'Louisie', 'Kadiata', 'f', 'Comptabilité', '2023-02-03', 2100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dirigeants`
--
ALTER TABLE `dirigeants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dirigeants`
--
ALTER TABLE `dirigeants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
