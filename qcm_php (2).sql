-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 juin 2023 à 00:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `qcm_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `EMAIL_ADMIN` varchar(255) NOT NULL,
  `NOM_ADMIN` varchar(255) NOT NULL,
  `PRENOM_ADMIN` varchar(255) NOT NULL,
  `MDP_ADMIN` varchar(255) NOT NULL,
  `SEX` varchar(255) NOT NULL,
  `PHOTO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `EMAIL_ADMIN`, `NOM_ADMIN`, `PRENOM_ADMIN`, `MDP_ADMIN`, `SEX`, `PHOTO`) VALUES
(1, 'kpo.loua@inphb.ci', 'KPO', 'LOUA', 'phpsql', 'Masculin', NULL),
(2, 'konan.brou@inphb.ci', ' BROU', ' Konan Marcellin', 'uppro2223', 'Masculin', 'remercier1.jpg'),
(3, 'bi.goore@inphb.ci', '  GOORE', '  Bi Tra', 'java', 'Masculin', 'Michael_Jordan.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CATEGORIE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LIB_CATEGORIE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ID_CATEGORIE`, `LIB_CATEGORIE`) VALUES
('cat1', 'Amateur PHP'),
('cat2', 'Animateur PHP'),
('cat3', 'Développeur Web D01'),
('cat4', 'Développeur Web D02'),
('cat5', 'Concepteur site Web');

-- --------------------------------------------------------

--
-- Structure de la table `certificat`
--

CREATE TABLE `certificat` (
  `ID_CERTIF` int(11) NOT NULL,
  `MATRICULE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `DATE_VALIDATION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comprendre`
--

CREATE TABLE `comprendre` (
  `ID_TEST` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `MATRICULE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_CATEGORIE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `PHOTO` text NOT NULL,
  `SEXE` varchar(255) NOT NULL,
  `STATUT` varchar(255) NOT NULL,
  `DATE_ABANDON` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`MATRICULE`, `ID_CATEGORIE`, `EMAIL`, `NOM`, `PRENOM`, `MDP`, `PHOTO`, `SEXE`, `STATUT`, `DATE_ABANDON`) VALUES
('12345', 'cat5', 'mandelasourabie@gmail.com', 'SOURABIE', 'Prosper-Adrien', 'mandela', '', 'Masculin', '1', NULL),
('19INP00337', 'cat1', 'herman.kouakou@inphb.ci', 'KOUAKOU', 'Amoa Hermann', 'lavie', '', 'Masculin', '1', NULL),
('22INP00102', 'cat1', 'raoul.bikienga@inphb.ci', 'BIKIENGA', 'Raoul', 'one_piece', '', 'M', '0', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `ID_FORMATION` int(11) NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `ID_CATEGORIE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NOM_FORMATION` varchar(255) NOT NULL,
  `DESC_FORMATION` varchar(255) NOT NULL,
  `STATUT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`ID_FORMATION`, `ID_ADMIN`, `ID_CATEGORIE`, `NOM_FORMATION`, `DESC_FORMATION`, `STATUT`) VALUES
(1, 1, 'cat1', 'zezecvzv', 'formation1 formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1formation1form', 'Valide'),
(2, 1, 'cat1', 'eefcd', 'formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 formation2 ', 'Valide');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `ID_FORMATION` int(11) NOT NULL,
  `MATRICULE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE `question` (
  `ID_QUESTION` int(11) NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `ID_CATEGORIE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LIB_QUESTION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TYPE_QUESTION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `BN_REPONSE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `question`
--

INSERT INTO `question` (`ID_QUESTION`, `ID_ADMIN`, `ID_CATEGORIE`, `LIB_QUESTION`, `TYPE_QUESTION`, `BN_REPONSE`) VALUES
(1, 1, 'cat1', 'Qu\'est-ce que PHP signifie?', 'cocher_rep', 'PHP Hypertext Preprocessor'),
(2, 1, 'cat1', 'Quel est l\'opérateur pour la concaténation de chaînes de caractères en PHP?', 'cocher_rep', '.'),
(3, 1, 'cat1', 'Comment affichez-vous \"Bonjour\" en PHP?', 'saisir_rep', 'echo \"Bonjour\";'),
(4, 1, 'cat1', 'Comment définir une variable en PHP?', 'cocher_rep', 'avec le signe $'),
(25, 2, 'cat1', ' Comment accédez-vous à la valeur d\'un élément dans un tableau PHP?', 'saisir_rep', ' en utilisant la fonction array_value ()'),
(26, 1, 'cat2', ' Que fait la fonction suivante en PHP?  ``` function carre($nombre) {   return $nombre * $nombre; } ```', 'saisir_rep', ' Elle calcule le carré du nombre passé en paramètre.'),
(27, 1, 'cat2', ' Que fait la fonction suivante en PHP?  ``` function carre($nombre) {   return $nombre * $nombre; } ```', 'saisir_rep', ' Elle calcule le carré du nombre passé en paramètre.'),
(28, 1, 'cat2', ' Que fait la fonction suivante en PHP?  ``` function carre($nombre) {   return $nombre * $nombre; } ```', 'saisir_rep', ' Elle calcule le carré du nombre passé en paramètre.'),
(29, 1, 'cat3', ' . Exemple 5: ``` <?php $x = 1; while ($x < 5) {   echo $x;   $x++; } ?> ``` Quelle sera la dernière valeur affichée lors de l\'exécution?', 'saisir_rep', ' 4'),
(30, 2, 'cat1', ' Comment définir une variable en PHP?', 'cocher_rep', ' avec le signe $'),
(31, 2, 'cat1', 'Quelle fonction est utilisée pour afficher des données à l\'écran en PHP?', 'saisir_rep', 'echo()'),
(32, 3, 'cat1', 'Comment déclarez-vous une fonction en PHP?', 'saisir_rep', 'function functionName () {} '),
(33, 3, 'cat1', 'Comment effectuez-vous une redirection en PHP? ', 'cocher_rep', 'en utilisant la fonction header ()'),
(34, 3, 'cat1', 'Comment supprimez-vous les espaces vides d\'une chaîne en PHP?', 'saisir_rep', 'en utilisant la fonction trim ()'),
(35, 3, 'cat1', '. Comment supprimer un élément spécifique d\'un tableau en PHP?', 'saisir_rep', 'array_splice() '),
(36, 3, 'cat1', 'Quelle fonction est utilisée pour trouver la longueur d\'une chaîne de caractères en PHP?', 'cocher_rep', 'strlen()'),
(37, 3, 'cat1', 'Comment récupérer des données d\'un formulaire HTML en PHP?', 'saisir_rep', 'toutes les réponses ci-dessus'),
(38, 3, 'cat1', 'Quelle est la méthode HTTP utilisée pour soumettre des données de formulaire en PHP?', 'cocher_rep', 'POST'),
(39, 1, 'cat1', 'Comment définir une constante en PHP?', 'cocher_rep', 'define() '),
(40, 1, 'cat1', 'Comment convertir une chaîne de caractères en majuscules en PHP?', 'cocher_rep', 'strtoupper()'),
(41, 1, 'cat1', 'Comment ajouter un élément à la fin d\'un tableau en PHP?', 'cocher_rep', 'array_push()'),
(42, 1, 'cat1', 'Quelle fonction est utilisée pour récupérer la clé d\'un tableau en PHP? ', 'saisir_rep', 'key() '),
(43, 1, 'cat1', 'Comment fermer une session en PHP?', 'cocher_rep', 'session_destroy() '),
(44, 1, 'cat1', 'Comment insérer des données dans une base de données MySQL en PHP?', 'saisir_rep', 'avec la fonction mysqli_query() '),
(45, 2, 'cat1', 'Exemple 4: ``` <?php $tab = array(\"pomme\", \"banane\", \"orange\"; foreach($tab as $fruit) {   echo \"Le fruit est: $fruit\"; } ?> ``` QCM: Quelle est la ligne qui présente une erreur dans le code PHP ci-dessus?', 'cocher_rep', '2'),
(46, 2, 'cat1', ' Quelle est la différence entre les fonctions \"require\" et \"include\" en PHP?', 'cocher_rep', ' La fonction \"require\" génère une erreur fatale si le fichier inclus n\'est pas trouvé, tandis que la fonction \"include\" génère une erreur d\'avertissement.'),
(47, 2, 'cat1', 'Comment utilisez-vous la fonction \"mysqli_query\" pour exécuter une requête MySQL en PHP?', 'cocher_rep', 'mysqli_query($conn, $sql);'),
(48, 2, 'cat1', 'Comment utilisez-vous la fonction \"mysqli_fetch_assoc\" pour récupérer une ligne de résultats MySQL en PHP?', 'cocher_rep', 'mysqli_fetch_assoc($result);'),
(49, 3, 'cat1', ' Comment utilisez-vous la fonction \"mysqli_num_rows\" pour récupérer le nombre de lignes de résultats MySQL en PHP?', 'cocher_rep', ' mysqli_num_rows($sql);'),
(50, 3, 'cat2', '14.	Comment ajouter un élément à un tableau en PHP ?', 'saisir_rep', 'Toutes les réponses sont correctes'),
(51, 3, 'cat2', 'Laquelle des opérations suivantes est évaluée à « true » si les deux opérandes ne sont pas du même type de données ou n’ont pas la même valeur?', 'cocher_rep', '!==');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `ID_REPONSE` int(11) NOT NULL,
  `ID_QUESTION` int(11) NOT NULL,
  `LIB_REPONSE_A` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LIB_REPONSE_B` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LIB_REPONSE_C` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LIB_REPONSE_D` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `reponse`
--

INSERT INTO `reponse` (`ID_REPONSE`, `ID_QUESTION`, `LIB_REPONSE_A`, `LIB_REPONSE_B`, `LIB_REPONSE_C`, `LIB_REPONSE_D`) VALUES
(1, 4, ' foreach ($array as $value) {}', ' for ($i = 0; $i < count($array); $i++) {}', 'while ($i < count($array)) {} ', 'do {} while ($i < count($array)); '),
(2, 4, ' foreach ($array as $value) {}', ' for ($i = 0; $i < count($array); $i++) {}', 'while ($i < count($array)) {} ', 'do {} while ($i < count($array)); '),
(3, 4, ' en utilisant la fonction array_value ()', ' functionName function () {}   ', ' require ()', ' avec le signe $'),
(4, 26, ' Elle calcule la racine carrée du nombre passé en paramètre.', ' Elle calcule le carré du nombre passé en paramètre.', 'Elle calcule le cube du nombre passé en paramètre. ', ' Elle calcule la factorielle du nombre passé en paramètre.'),
(5, 27, ' Elle calcule la racine carrée du nombre passé en paramètre.', ' Elle calcule le carré du nombre passé en paramètre.', 'Elle calcule le cube du nombre passé en paramètre. ', ' Elle calcule la factorielle du nombre passé en paramètre.'),
(6, 28, ' Elle calcule la racine carrée du nombre passé en paramètre.', ' Elle calcule le carré du nombre passé en paramètre.', 'Elle calcule le cube du nombre passé en paramètre. ', ' Elle calcule la factorielle du nombre passé en paramètre.'),
(29, 29, ' 3', ' 7', ' 4', ' 5'),
(30, 30, ' avec le signe =', ' avec le mot-clé variable', ' avec le signe +', ' avec le signe $'),
(31, 31, 'echo()', 'print() ', 'display() ', 'show() '),
(32, 32, 'function functionName () {} ', 'functionName function () {} ', 'def functionName () {} ', 'functionName def () {}'),
(33, 33, 'en utilisant la fonction redirect () ', 'en utilisant la fonction header ()', 'en utilisant la fonction location ()', 'en utilisant la fonction forward ()'),
(34, 34, 'en utilisant la fonction trim ()', 'en utilisant la fonction ltrim ()', 'en utilisant la fonction rtrim () ', 'en utilisant la fonction clear ()'),
(35, 35, 'array_splice() ', 'array_push() ', 'array_pop()', 'array_shift() '),
(36, 36, 'strlen()', 'strlength()', 'charlength() ', 'textlength()'),
(37, 37, 'avec la fonction $_GET', 'avec la fonction $_POST ', 'avec la fonction $_REQUEST ', 'toutes les réponses ci-dessus'),
(38, 38, 'POST', 'GET ', 'PUT', 'DELETE'),
(39, 39, 'define() ', 'const()', 'var() ', 'set() '),
(40, 40, 'strtoupper()', 'toUpperCase() ', 'upperCase()', 'textUpper()'),
(41, 41, 'array_pop()', 'array_shift() ', 'array_push()', 'array_unshift()'),
(42, 42, 'array_key() ', 'key() ', 'array_keys()', 'keys() '),
(43, 43, 'session_close()', 'session_destroy() ', 'session_stop()', 'session_end() '),
(44, 44, 'avec la fonction mysqli_put()', 'avec la fonction mysqli_insert() ', 'avec la fonction mysqli_add() ', 'avec la fonction mysqli_query() '),
(45, 45, '3', '2', '4', '5'),
(46, 46, ' Il n\'y a pas de différence entre les deux.', ' La fonction \"require\" génère une erreur fatale si le fichier inclus n\'est pas trouvé, tandis que la fonction \"include\" génère une erreur d\'avertissement.', ' La fonction \"require\" ne peut être utilisée qu\'une seule fois par script, tandis que la fonction \"include\" peut être utilisée plusieurs fois.', 'La fonction \"include\" génère une erreur fatale si le fichier inclus n\'est pas trouvé, tandis que la fonction \"require\" génère une erreur d\'avertissement. '),
(47, 47, 'mysqli_query($conn, $sql);', 'mysqli_query($sql, $conn);', 'mysqli_query($sql);', 'mysqli_query($conn);'),
(48, 48, 'mysqli_fetch_assoc($result);', 'mysqli_fetch_assoc($row);', 'mysqli_fetch_assoc($conn);', 'mysqli_fetch_assoc($sql);'),
(49, 49, ' mysqli_num_rows($row);', ' mysqli_num_rows($result);', ' mysqli_num_rows($sql);', ' mysqli_num_rows($conn);'),
(50, 50, '$tableau [] = $nouvel_element ', 'array_push ($tableau, $nouvel_element)', '$tableau [count ($tableau)] = $nouvel_element;', 'Toutes les réponses sont correctes'),
(51, 51, '!==', '.===', '!=', '==');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `ID_TEST` int(11) NOT NULL,
  `MATRICULE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DATE_TEST` date NOT NULL,
  `DUREE_TEST` time NOT NULL,
  `NOTE` double NOT NULL,
  `STATUT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`ID_TEST`, `MATRICULE`, `DATE_TEST`, `DUREE_TEST`, `NOTE`, `STATUT`) VALUES
(1, '12345', '2023-06-11', '00:02:51', 12, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID_CATEGORIE`);

--
-- Index pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD PRIMARY KEY (`ID_CERTIF`),
  ADD KEY `MATRICULE` (`MATRICULE`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`);

--
-- Index pour la table `comprendre`
--
ALTER TABLE `comprendre`
  ADD PRIMARY KEY (`ID_TEST`,`ID_QUESTION`),
  ADD KEY `ID_QUESTION` (`ID_QUESTION`),
  ADD KEY `ID_TEST` (`ID_TEST`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`MATRICULE`),
  ADD KEY `ID_CATEGORIE` (`ID_CATEGORIE`),
  ADD KEY `ID_CATEGORIE_2` (`ID_CATEGORIE`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`ID_FORMATION`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`),
  ADD KEY `ID_CATEGORIE` (`ID_CATEGORIE`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`ID_FORMATION`),
  ADD KEY `MATRICULE` (`MATRICULE`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID_QUESTION`),
  ADD KEY `ID_ADMIN` (`ID_ADMIN`),
  ADD KEY `ID_CATEGORIE` (`ID_CATEGORIE`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`ID_REPONSE`),
  ADD KEY `ID_QUESTION` (`ID_QUESTION`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID_TEST`),
  ADD KEY `MATRICULE` (`MATRICULE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `certificat`
--
ALTER TABLE `certificat`
  MODIFY `ID_CERTIF` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `participer`
--
ALTER TABLE `participer`
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `question`
--
ALTER TABLE `question`
  MODIFY `ID_QUESTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `ID_TEST` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `certificat`
--
ALTER TABLE `certificat`
  ADD CONSTRAINT `certificat_ibfk_2` FOREIGN KEY (`MATRICULE`) REFERENCES `etudiant` (`MATRICULE`),
  ADD CONSTRAINT `certificat_ibfk_3` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Contraintes pour la table `comprendre`
--
ALTER TABLE `comprendre`
  ADD CONSTRAINT `comprendre_ibfk_1` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`),
  ADD CONSTRAINT `comprendre_ibfk_2` FOREIGN KEY (`ID_TEST`) REFERENCES `test` (`ID_TEST`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_1` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `formation_ibfk_2` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`MATRICULE`) REFERENCES `etudiant` (`MATRICULE`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`ID_CATEGORIE`) REFERENCES `categorie` (`ID_CATEGORIE`),
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`ID_QUESTION`) REFERENCES `question` (`ID_QUESTION`);

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`MATRICULE`) REFERENCES `etudiant` (`MATRICULE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
