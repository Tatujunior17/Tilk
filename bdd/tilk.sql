-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 25, 2020 at 07:43 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tilk`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `description_commentaire` varchar(50) NOT NULL,
  `idpost_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `description_commentaire`, `idpost_commentaire`) VALUES
(16, 'Essaie cela : color : red;', 21);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `titre_post` varchar(45) NOT NULL,
  `lien_post` varchar(200) DEFAULT NULL,
  `description_post` varchar(200) NOT NULL,
  `idutil` int(11) DEFAULT NULL,
  `idcom_post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `titre_post`, `lien_post`, `description_post`, `idutil`, `idcom_post`) VALUES
(21, 'Erreur dans mon code', 'https://codepen.io/ricardoolivaalonso/embed/KKwqLQy?height=265&theme-id=default&default-tab=css,result', 'Je ne comprend pas mon erreur.', 13, NULL),
(22, 'Codenpen bug', 'https://codepen.io/soju22/embed/jOErGWO?height=265&theme-id=default&default-tab=css,result', 'Ou se trouve mon erreur.', 14, NULL),
(23, 'Comment changer de couleur', 'https://codepen.io/borntofrappe/embed/QWwZYJd?height=265&theme-id=default&default-tab=css,result', 'Je trouve pas comment changer la couleur.', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom_utilisateur` varchar(20) NOT NULL,
  `prenom_utilisateur` varchar(20) NOT NULL,
  `email_utilisateur` varchar(50) NOT NULL,
  `mdp_utilisateur` varchar(255) NOT NULL,
  `vkey_utilisateur` varchar(100) DEFAULT NULL,
  `verifie_utilisateur` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `email_utilisateur`, `mdp_utilisateur`, `vkey_utilisateur`, `verifie_utilisateur`) VALUES
(15, 'Andre', 'Da Silva', 'andredasilva@hotmail.com', '12345', 'bfcef50b94825903b95582f9e18ef6d2', 1),
(14, 'De Oliveira', 'Karina', 'karina_oliveira@hotmail.com', '12345', '3aed2c9ccff5ac109cea13505e12f27c', 1),
(13, 'Rodrigues', 'Ivane', 'ivane_rodrigues@hotmail.com', '12345', '107b7d837007c283fc336571acd13988', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `id_utilisateur` (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
