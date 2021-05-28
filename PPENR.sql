-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 mai 2021 à 10:32
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ppenr`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `ID_CLASSE` int NOT NULL AUTO_INCREMENT,
  `ID_PROF` smallint NOT NULL,
  `LIBELLE_CLASSE` char(4) NOT NULL,
  PRIMARY KEY (`ID_CLASSE`),
  KEY `FK_CLASSE_PROFESSEUR` (`ID_PROF`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`ID_CLASSE`, `ID_PROF`, `LIBELLE_CLASSE`) VALUES
(1, 3, 'SIO1'),
(2, 5, 'SIO2');

-- --------------------------------------------------------

--
-- Structure de la table `demarche`
--

DROP TABLE IF EXISTS `demarche`;
CREATE TABLE IF NOT EXISTS `demarche` (
  `ID_DEMARCHE` smallint NOT NULL AUTO_INCREMENT,
  `ID_ETUDIANT` smallint NOT NULL,
  `ID_MOYEN` smallint NOT NULL,
  `ID_SALARIE` smallint NOT NULL,
  `DATE_DEMARCHE` datetime NOT NULL,
  `COMMENTAIRE` char(255) NOT NULL,
  PRIMARY KEY (`ID_DEMARCHE`),
  KEY `FK_DEMARCHE_ETUDIANT` (`ID_ETUDIANT`),
  KEY `FK_DEMARCHE_MOYENCOM` (`ID_MOYEN`),
  KEY `FK_DEMARCHE_ENTREPRISE` (`ID_SALARIE`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demarche`
--

INSERT INTO `demarche` (`ID_DEMARCHE`, `ID_ETUDIANT`, `ID_MOYEN`, `ID_SALARIE`, `DATE_DEMARCHE`, `COMMENTAIRE`) VALUES
(1, 1, 1, 1, '2020-09-21 00:00:00', 'attente_rep'),
(2, 1, 2, 1, '2020-09-28 00:00:00', 'relance'),
(3, 1, 3, 2, '2020-09-30 00:00:00', 'mort'),
(4, 1, 3, 2, '2020-09-30 00:00:00', 'mort'),
(5, 1, 4, 2, '2020-09-21 00:00:00', 'un espoir'),
(6, 1, 4, 12, '2020-09-21 00:00:00', 'en attente'),
(7, 2, 1, 1, '2020-09-21 00:00:00', 'en attente'),
(8, 2, 2, 1, '2020-09-27 00:00:00', 'un espoir'),
(9, 2, 4, 1, '2020-09-30 00:00:00', 'fiche recherche envoyée'),
(10, 2, 4, 5, '2020-09-30 00:00:00', 'un espoir'),
(11, 3, 3, 10, '2020-09-21 00:00:00', 'en attente'),
(12, 3, 4, 4, '2020-09-28 00:00:00', 'en attente'),
(13, 22, 1, 1, '2020-10-10 00:00:00', 'fiche recherche reçue');

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `ID_CLASSE` int NOT NULL,
  `ID_PROF` smallint NOT NULL,
  `MATIERE` varchar(10) NOT NULL,
  `NB_HEURES` smallint NOT NULL,
  PRIMARY KEY (`ID_CLASSE`,`ID_PROF`),
  KEY `FK_ENSEIGNER_PROFESSEUR` (`ID_PROF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseigner`
--

INSERT INTO `enseigner` (`ID_CLASSE`, `ID_PROF`, `MATIERE`, `NB_HEURES`) VALUES
(1, 1, 'DEV', 16),
(1, 2, 'RES', 16),
(1, 3, 'FRANCCEE', 3),
(1, 4, 'FCasseTEte', 4),
(2, 5, 'JEUXVIDES', 16);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `ID_ENTREPRISE` smallint NOT NULL AUTO_INCREMENT,
  `NOM_ENTREPRISE` char(32) NOT NULL,
  `ADRESSE_ENTREPRISE` char(255) NOT NULL,
  `CP_ENTREPRISE` char(5) NOT NULL,
  `VILLE_ENTREPRISE` char(32) NOT NULL,
  `TEL_ENTREPRISE` char(10) NOT NULL,
  `EMAIL_ENTREPRISE` char(32) NOT NULL,
  `REFUS_ANNEESIO1` tinyint(1) NOT NULL DEFAULT '0',
  `REFUS_ANNEE_SIO2` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_ENTREPRISE`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_ENTREPRISE`, `NOM_ENTREPRISE`, `ADRESSE_ENTREPRISE`, `CP_ENTREPRISE`, `VILLE_ENTREPRISE`, `TEL_ENTREPRISE`, `EMAIL_ENTREPRISE`, `REFUS_ANNEESIO1`, `REFUS_ANNEE_SIO2`) VALUES
(1, 'KIANO', 'RUE BACH', '22300', 'LANNION', '0101010101', 'KIANO@GMAIL.COM', 0, 0),
(2, 'GERANO', 'RUE MOZRAT', '22300', 'LANNION', '0202020202', 'GERano@GMAIL.COM', 0, 1),
(3, 'MINCESIE', 'RUE BETOVEN', '22300', 'LANNION', '0303030303', 'MINCESIE@GMAIL.COM', 0, 0),
(4, 'ABIKI', 'RUE DVORAK', '22100', 'DINAN', '0404040404', 'ABIKI@GMAIL.COM', 0, 0),
(5, 'VONOLE', 'RUE BARTOK', '22720', 'TREGASTEL', '0505050505', 'VONOLE@GMAIL.COM', 0, 0),
(6, 'SUSA', 'RUE LICORNE', '22300', 'LANNION', '0606060606', 'SUSA@GMAIL.COM', 1, 0),
(7, 'BREIZHTICOT', 'RUE LICORNE', '22300', 'LANNION', '0707070707', 'BREIZHTICOT@GMAIL.COM', 1, 0),
(8, 'COMPTEURDUR', 'RUE LICORNE', '22300', 'LANNION', '0808080808', 'COMPTEURDUR@GMAIL.COM', 0, 0),
(9, 'APITICOM', 'RUE LICORNE', '22300', 'LANNION', '0909090909', 'APITICOM@GMAIL.COM', 0, 0),
(10, 'COMCOM', 'RUE LICORNE', '22300', 'LANNION', '1010101010', 'COMCOM@GMAIL.COM', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etre_contacter`
--

DROP TABLE IF EXISTS `etre_contacter`;
CREATE TABLE IF NOT EXISTS `etre_contacter` (
  `ID_DEMARCHE` smallint NOT NULL,
  `ID_SALARIE` smallint NOT NULL,
  PRIMARY KEY (`ID_DEMARCHE`,`ID_SALARIE`),
  KEY `FK_ETRE_CONTACTER_SALARIE` (`ID_SALARIE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etre_contacter`
--

INSERT INTO `etre_contacter` (`ID_DEMARCHE`, `ID_SALARIE`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 3),
(5, 7),
(6, 5),
(7, 2),
(8, 1),
(9, 2),
(10, 5),
(11, 10),
(12, 6),
(22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `ID_ETUDIANT` smallint NOT NULL AUTO_INCREMENT,
  `ID_PROF` smallint NOT NULL,
  `ID_CLASSE` int NOT NULL,
  `ID_SPECIALITE` smallint NOT NULL,
  `NOM_ETUDIANT` char(32) NOT NULL,
  `PRENOM_ETUDIANT` char(32) NOT NULL,
  `ADR_ETUDIANT` char(32) NOT NULL,
  `CP_ETUDIANT` char(5) NOT NULL,
  `VILLE_ETUDIANT` char(32) NOT NULL,
  `EMAIL` char(32) NOT NULL,
  `TEL_ETUDIANT` char(10) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ETUDIANT`),
  KEY `FK_ETUDIANT_PROFESSEUR` (`ID_PROF`),
  KEY `FK_ETUDIANT_CLASSE` (`ID_CLASSE`),
  KEY `FK_ETUDIANT_SPECIALIT�` (`ID_SPECIALITE`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_ETUDIANT`, `ID_PROF`, `ID_CLASSE`, `ID_SPECIALITE`, `NOM_ETUDIANT`, `PRENOM_ETUDIANT`, `ADR_ETUDIANT`, `CP_ETUDIANT`, `VILLE_ETUDIANT`, `EMAIL`, `TEL_ETUDIANT`, `MDP`) VALUES
(1, 1, 1, 1, 'RENAULT', 'KYLLIAN', 'LESREMPARTS', '29300', 'MORLES', 'KRENAULT@GMAIL.COM', '1010101010', '05e3a88f3de87faf87f6b5d208c1b270465f11f9f723b68ead99ffdf92e8b6fa'),
(2, 2, 1, 2, 'CORSON', 'KYLLIAN', 'LESMACHICOULIS', '22300', 'CAMLEZ', 'KCORSON@GMAIL.COM', '1010101011', '65f4cdf605f92cccf06c3b911e70b641865fde031848e3624696ed50d06075c5'),
(3, 2, 1, 2, 'FIN', 'YOHAN', 'PONTLEVIS', '22300', 'ROSPEZ', 'YFIN@GMAIL.COM', '1010101012', '58c694d1cb6f82523535e9f0b75443bab7d111fc834d1fd750abbc8bc5801f90'),
(4, 2, 1, 1, 'RUIZ', 'OLIVIO', 'ENCIENTE', '22300', 'LERHU', 'ORUIZ@GMAIL.COM', '1010101013', '851b7bb0dcc9c2a6ffe497db798f04b1d027aba5807ecf8bdcbd1c66a7b1f484'),
(5, 1, 1, 1, 'RUIZ', 'ALIVIO', 'BENCIENTE', '22300', 'ALERHU', 'ARUIZ@GMAIL.COM', '1010101014', 'b6ac2588c95459a06a8f507c98909f41371ac6e10cd8920bc713188d4f4de490'),
(6, 2, 1, 1, 'RUIZ', 'BLIVIO', 'BENCIENTE', '22300', 'BLERHU', 'BRUIZ@GMAIL.COM', '1010101015', '785b80222f733ab95dea24e9f5e9bbb7071bc2a2b172dc1b0d4d5cef0e4a07f3'),
(7, 2, 1, 1, 'RUIZ', 'CLIVIO', 'CENCIENTE', '22300', 'CLERHU', 'CRUIZ@GMAIL.COM', '1010101016', '02c862384e3642a1080a1d2f7daa0985bb32b27cb041c912989939603204e412'),
(8, 3, 1, 1, 'RUIZ', 'DLIVIO', 'DENCIENTE', '22300', 'DLERHU', 'DRUIZ@GMAIL.COM', '1010101017', '4610a61f723c7f2304ca8b64b62a7deb6424e1d276a64232198d6a2c7c45490b'),
(9, 3, 1, 1, 'RUIZ', 'ELIVIO', 'EENCIENTE', '22300', 'ELERHU', 'ERUIZ@GMAIL.COM', '1010101018', '68311d4e444327cf85712fa414f4328ddc350abb277db0c602adb72579d8dc6d'),
(10, 3, 1, 1, 'RUIZ', 'FLIVIO', 'FENCIENTE', '22300', 'FLERHU', 'FRUIZ@GMAIL.COM', '1010101019', 'c900ec4f05bea5b5282ad6c05ee20e0c1379ceace69711aebe4dfd588e6ed552'),
(11, 3, 1, 2, 'FIN', 'ZYOHAN', 'ZPONTLEVIS', '22300', 'ZROSPEZ', 'ZFIN@GMAIL.COM', '1010101020', 'fadc413c39145577429deef1f35908f2ae3541ff858115c7a5c8e424da8195f8'),
(12, 3, 1, 2, 'FIN', 'WYOHAN', 'WPONTLEVIS', '22300', 'WROSPEZ', 'WFIN@GMAIL.COM', '1010101021', 'ea133e2b14359eca8afab8ad96fd33e569c0e69d39254a7c1781a3bc66e58ed4'),
(13, 1, 1, 2, 'FIN', 'VYOHAN', 'VPONTLEVIS', '22300', 'VROSPEZ', 'VFIN@GMAIL.COM', '1010101022', 'af830b453bc6b9ecc87271bc33fa3351f2103c567f59fb3e1a4900dd9c6db40d'),
(14, 1, 1, 2, 'FIN', 'TYOHAN', 'TPONTLEVIS', '22300', 'TROSPEZ', 'TFIN@GMAIL.COM', '1010101023', '0fa60fed54d797f9347d7f1428e3de6052cfd5cf6e1475b602a55878b233b022'),
(15, 3, 1, 2, 'FIN', 'AYOHAN', 'APONTLEVIS', '22300', 'AROSPEZ', 'AFIN@GMAIL.COM', '1010101024', '94b0f763b4e0933c39dd8605b312a2d07369cfb93f23411ee2dac7436635d73b'),
(16, 4, 1, 2, 'FIN', 'BYOHAN', 'BPONTLEVIS', '22300', 'BROSPEZ', 'BFIN@GMAIL.COM', '1010101025', 'e5d763997daf662bac82cdde94dfeaf1ce686b3f647ea5a5f7ee9bd81dcc6b43'),
(17, 4, 1, 2, 'FIN', 'CYOHAN', 'CPONTLEVIS', '22300', 'CROSPEZ', 'CFIN@GMAIL.COM', '1010101026', '137b3724e56adf701b05a148d16fd19d56a8ba4628aa140ceb575d53ae899cfb'),
(18, 4, 1, 2, 'FIN', 'DYOHAN', 'DPONTLEVIS', '22300', 'DROSPEZ', 'DFIN@GMAIL.COM', '1010101027', 'bf7b97782b5989eb615ff757d16b04d04e4c145e9659feb9e0e869c6a9334125'),
(19, 4, 1, 2, 'FIN', 'EYOHAN', 'EPONTLEVIS', '22300', 'EROSPEZ', 'EFIN@GMAIL.COM', '1010101028', '550ec2f933297b664c7f9667e02cf56ed5ecbce37d5c3cdec2f3d1e11a3ed27c'),
(20, 4, 1, 2, 'FIN', 'FYOHAN', 'FPONTLEVIS', '22300', 'FROSPEZ', 'FFIN@GMAIL.COM', '1010101029', '40f38cb0fe276054bdbf237c8c22a28d2fdb64b7fa00ba562e300993cf361b8e'),
(21, 4, 1, 2, 'FIN', 'GYOHAN', 'GPONTLEVIS', '22300', 'GROSPEZ', 'GFIN@GMAIL.COM', '1010101030', 'cc4e9183b51e2ac43b11aa4432f540ee9adbeab1182f9d5769027fa4837e552d'),
(22, 5, 2, 2, 'HENAFF', 'MELVIN', 'GRASSES', '22808', 'GRACE', 'MHENNAFF@GMAIL.COM', '1010101300', '32a598188730d355b2b2e49365217ee32798232affbc46e2ca4f4eed2bebfca7');

-- --------------------------------------------------------

--
-- Structure de la table `moyencom`
--

DROP TABLE IF EXISTS `moyencom`;
CREATE TABLE IF NOT EXISTS `moyencom` (
  `ID_MOYEN` smallint NOT NULL AUTO_INCREMENT,
  `LIBELLE_MOYEN` char(32) NOT NULL,
  PRIMARY KEY (`ID_MOYEN`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `moyencom`
--

INSERT INTO `moyencom` (`ID_MOYEN`, `LIBELLE_MOYEN`) VALUES
(1, 'telephone'),
(2, 'démarchage'),
(3, 'couriel'),
(4, 'entretien');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `ID_PROF` smallint NOT NULL AUTO_INCREMENT,
  `NOM_PROF` char(32) NOT NULL,
  `PRENOM_PROF` char(32) NOT NULL,
  `EMAIL` char(32) NOT NULL,
  `TEL_PROF` char(10) NOT NULL,
  `MDP` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_PROF`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`ID_PROF`, `NOM_PROF`, `PRENOM_PROF`, `EMAIL`, `TEL_PROF`, `MDP`) VALUES
(1, 'RISSER', 'NAT', 'NRISSER@GMAIL.COM', '0606060606', '6469e60bd99627dd7492fc01cccb905a13d6fc53ba9d9de545e4ec4a73840895'),
(2, 'DUBOIS', 'NAT', 'NDUBOIS@GMAIL.COM', '1616161616', '65e7188616893faca94e4b2156a0888b553968e79a42c1f2392ea0b937f63187'),
(3, 'PEILLON', 'HER', 'HPEILLON@GMAIL.COM', '2626262626', '6d848a6358d39b9e47ae68b374bca513523d936ffaa12786f0511085ab6cb7bf'),
(4, 'LHOSTIS', 'ISA', 'ILHOSTIS@GMAIL.COM', '3636363636', '93d87c36a5a9e061a6eec405fbae35556455c7f6ed3dad5b26b946aef9bcb211'),
(5, 'RICHARD', 'RIC', 'RRICHARD@GMAIL.COM', '4646464646', '619be52922d05b989934efcfa19648fe28a871520634deeb5e8386ed42fd22f1');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

DROP TABLE IF EXISTS `salarie`;
CREATE TABLE IF NOT EXISTS `salarie` (
  `ID_SALARIE` smallint NOT NULL AUTO_INCREMENT,
  `ID_ENTREPRISE` smallint NOT NULL,
  `NOM_SALARIE` char(32) NOT NULL,
  `PRENOM_SALARIE` char(32) NOT NULL,
  `TEL_SALARIE` char(10) NOT NULL,
  `EMAIL_SALARIE` char(32) NOT NULL,
  PRIMARY KEY (`ID_SALARIE`),
  KEY `FK_SALARIE_ENTREPRISE` (`ID_ENTREPRISE`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`ID_SALARIE`, `ID_ENTREPRISE`, `NOM_SALARIE`, `PRENOM_SALARIE`, `TEL_SALARIE`, `EMAIL_SALARIE`) VALUES
(1, 1, 'KIANONO', 'BACH', '0101010111', 'KIANONO.KIANO@GMAIL.COM'),
(2, 1, 'NOKIANO', 'BACH', '0101011111', 'NOKIANO.KIANO@GMAIL.COM'),
(3, 2, 'GERANONO', 'MOZRAT', '0202020212', 'GERANONO.GERANO@GMAIL.COM'),
(4, 2, 'AGERANONO', 'MOZRAT', '0202020222', 'AGERANONO.GERANO@GMAIL.COM'),
(5, 2, 'BGERANONO', 'MOZRAT', '0202020232', 'BGERANONO.GERANO@GMAIL.COM'),
(6, 2, 'CGERANONO', 'MOZRAT', '0202020242', 'CGERANONO.GERANO@GMAIL.COM'),
(7, 2, 'DGERANONO', 'MOZRAT', '0202020252', 'DGERANONO.GERANO@GMAIL.COM'),
(8, 2, 'EGERANONO', 'MOZRAT', '0202020252', 'EGERANONO.GERANO@GMAIL.COM'),
(9, 3, 'AMINCESIE', 'BETOVEN', '0303030313', 'MINCESIE@GMAIL.COM'),
(10, 3, 'BMINCESIE', 'BETOVEN', '0303030323', 'BMINCESIE@GMAIL.COM'),
(11, 3, 'CMINCESIE', 'BETOVEN', '0303030333', 'CMINCESIE@GMAIL.COM'),
(12, 4, 'AABIKI', 'DVORAK', '0404040404', 'AABIKI@GMAIL.COM'),
(13, 5, 'AVONOLE', 'BARTOK', '0505050515', 'AVONOLE@GMAIL.COM'),
(14, 5, 'BVONOLE', 'BARTOK', '0505050525', 'BVONOLE@GMAIL.COM'),
(15, 6, 'SUSA', 'LICORNE', '0606060616', 'ASUSA@GMAIL.COM'),
(16, 7, 'ABREIZHTICOT', 'LICORNE', '0707070717', 'ABREIZHTICOT@GMAIL.COM'),
(17, 7, 'BBREIZHTICOT', 'LICORNE', '0707070727', 'BBREIZHTICOT@GMAIL.COM'),
(18, 8, 'ACOMPTEURDUR', 'LICORNE', '0808080808', 'ACOMPTEURDUR@GMAIL.COM'),
(19, 8, 'BCOMPTEURDUR', 'LICORNE', '0808080818', 'BCOMPTEURDUR@GMAIL.COM'),
(20, 8, 'CCOMPTEURDUR', 'LICORNE', '0808080828', 'CCOMPTEURDUR@GMAIL.COM'),
(21, 8, 'DCOMPTEURDUR', 'LICORNE', '0808080838', 'DCOMPTEURDUR@GMAIL.COM'),
(22, 9, 'AAPITICOM', 'LICORNE', '0909090919', 'AAPITICOM@GMAIL.COM'),
(23, 10, 'ACOMCOM', 'LICORNE', '1010101010', 'COMCOM@GMAIL.COM');

-- --------------------------------------------------------

--
-- Structure de la table `souhaiter`
--

DROP TABLE IF EXISTS `souhaiter`;
CREATE TABLE IF NOT EXISTS `souhaiter` (
  `ID_PROF` smallint NOT NULL,
  `ID_STAGE` smallint NOT NULL,
  `PRIORITE` smallint NOT NULL,
  PRIMARY KEY (`ID_PROF`,`ID_STAGE`),
  KEY `FK_SOUHAITER_STAGE` (`ID_STAGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `souhaiter`
--

INSERT INTO `souhaiter` (`ID_PROF`, `ID_STAGE`, `PRIORITE`) VALUES
(5, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `ID_SPECIALITE` smallint NOT NULL AUTO_INCREMENT,
  `ID_PROF` smallint NOT NULL,
  `LIBELLE_SPECIALITE` char(4) NOT NULL,
  PRIMARY KEY (`ID_SPECIALITE`),
  KEY `FK_SPECIALIT�_PROFESSEUR` (`ID_PROF`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`ID_SPECIALITE`, `ID_PROF`, `LIBELLE_SPECIALITE`) VALUES
(1, 1, 'SLAM'),
(2, 2, 'SISR');

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `ID_STAGE` smallint NOT NULL AUTO_INCREMENT,
  `ID_ETUDIANT` smallint NOT NULL,
  `ID_SALARIE` smallint NOT NULL,
  `DATE_FIN` date NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `ETAT` char(2) NOT NULL,
  `STATUT_CONVENTION` char(10) NOT NULL,
  PRIMARY KEY (`ID_STAGE`),
  KEY `FK_STAGE_ETUDIANT` (`ID_ETUDIANT`),
  KEY `FK_STAGE_SALARIE` (`ID_SALARIE`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `stage`
--

INSERT INTO `stage` (`ID_STAGE`, `ID_ETUDIANT`, `ID_SALARIE`, `DATE_FIN`, `DATE_DEBUT`, `ETAT`, `STATUT_CONVENTION`) VALUES
(1, 22, 2, '2020-02-29', '2020-01-01', 'AT', ''),
(2, 7, 1, '2021-05-29', '2020-07-01', 'OK', '');

-- --------------------------------------------------------

--
-- Structure de la table `visiter`
--

DROP TABLE IF EXISTS `visiter`;
CREATE TABLE IF NOT EXISTS `visiter` (
  `ID_PROF` smallint NOT NULL,
  `ID_STAGE` smallint NOT NULL,
  `DATE_VISITE` date NOT NULL,
  `COMMENTAIRES` varchar(50) DEFAULT NULL,
  `HEURE_PREVUE` time NOT NULL,
  PRIMARY KEY (`ID_PROF`,`ID_STAGE`),
  KEY `FK_VISITER_STAGE` (`ID_STAGE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `visiter`
--

INSERT INTO `visiter` (`ID_PROF`, `ID_STAGE`, `DATE_VISITE`, `COMMENTAIRES`, `HEURE_PREVUE`) VALUES
(5, 1, '2021-01-31', 'RAS', '10:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


CREATE TABLE motif_refus(
  ID_STAGE INTEGER(5),
  MOTIF VARCHAR(20),
  PRIMARY KEY (ID_STAGE)
);
