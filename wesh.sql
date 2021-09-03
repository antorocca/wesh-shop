-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2021 at 06:38 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `Marque` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `nom`, `description`, `photo`, `prix`, `stock`, `Marque`, `type`) VALUES
(1, 'Iphone 12', 'Iphone 12 Apple,Lorem ipsum dolor sit amet, consectetur adipisicing elit. \r\nCorrupti facere rerum reiciendis ipsum repellendus, ad praesentium, quo, ducimus voluptatum commodi esse voluptatem eaque natus ut assumenda soluta sit dolores laudantium!Lorem ipsum dolor sit amet, consectetur adipisicing elit. \r\nCorrupti facere rerum reiciendis ipsum repellendus, ad praesentium, quo, ducimus voluptatum commodi esse voluptatem eaque natus ut assumenda soluta sit dolores laudantium!', 'iphone12.png', 1000, 150, 'Apple', 'Téléphone'),
(2, 'Samsung Galaxy S20', 'Un samsung S20,sit amet consectetur adipisicing elit. Voluptatibus deleniti repellat nesciunt illum, sit amet consectetur adipisicing elit. Voluptatibus deleniti repellat nesciunt illum.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Non architecto fuga eum autem soluta quidem veritatis iure, delectus nisi, ipsa eos explicabo similique fugit assumenda at modi, laborum accusantium distinctio maiores cupiditate porro nulla ut? Magnam ullam inventore maiores eligendi non dolore dolores, numquam fugit?', 'samsung.jpg', 500, 150, 'Samsung', 'Téléphone'),
(3, 'Playstation 5', 'Playstation 5, Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero.Lorem ipsum dolor sit amet consectetur adipisicing elit. Non architecto fuga eum autem soluta quidem veritatis iure.\r\n\r\nDelectus nisi, ipsa eos explicabo similique fugit assumenda at modi, laborum accusantium distinctio maiores cupiditate porro nulla ut? Magnam ullam inventore maiores eligendi non dolore dolores, numquam fugit?Lorem ipsum dolor sit amet consectetur adipisicing elit. Non architecto fuga eum autem soluta.', 'ps5.jpg', 600, 0, 'Sony', 'Console de jeux video'),
(4, 'Redmi Note 10 5G', 'De l\'Antarctique à l\'espace, la série Redmi Note a envahi le monde entier.\r\nNotre approche consiste à sans cesse nous remettre en question et à dépasser nos limites. Maintenant c\'est votre tour !\r\nTestez vos limites et découvrez de quoi vous êtes capable.', 'redmiNote10.png', 299, 52, 'Xiaomi', 'Téléphone'),
(5, 'Xbox Series X', 'La Xbox Series X permet d’obtenir des fréquences d’images incroyablement fluides allant jusqu’à 120 images par seconde tout en offrant les performances visuelles de la technologie HDR.\r\nPlongez dans des univers avec des personnages plus détaillés, une lumière mieux maîtrisée et des détails hors du commun avec une résolution 4K immersive.', 'xboxSerieX.jpg', 599, 1, 'Microsoft', 'Console de jeux video'),
(6, 'Nintendo Switch', 'Profitez de l\'expérience de votre console de salon même sans téléviseur.\r\nLa Nintendo Switch peut se transformer pour s\'adapter à votre situation, de manière à ce que vous puissiez profiter de vos jeux quel que soit votre rythme de vie.\r\n\r\nC\'est une nouvelle ère où vous ne devez plus adapter votre quotidien pour pouvoir jouer, c\'est désormais votre console qui s\'adapte à votre style de vie.\r\n\r\nProfitez de vos jeux où, quand et avec qui vous le souhaitez !', 'nintendo-switch.png', 299, 38, 'Nintendo', 'Console de jeux video'),
(7, 'Xbox Series S', 'La nouvelle génération de jeux rend notre plus grande bibliothèque numérique disponible sur la Xbox la plus compacte à ce jour.\r\nAvec des mondes plus dynamiques, des temps de chargement réduits et l’ajout du Xbox Game Pass (vendu séparément), la Xbox Series S entièrement numérique est le meilleur rapport qualité-prix du monde du gaming.\r\n\r\n', 'xboxSerieS.jpg', 500, 100, 'Microsoft', 'Console de jeux video'),
(8, 'HUAWEI P40 Pro+', 'Le HUAWEI P40 Pro+ est un smartphone d\'exception.\r\nSa quintuple caméra conçue avec Leica et son capteur Ultra Vision de 50 MP révolutionnent la photographie sur smartphone, tandis que son capteur cinématographique de 40 MP en font un véritable studio portable.\r\nJouissez d\'une vitesse à couper le souffle grâce au processeur Kirin 990 5G embarqué et laissez-vous bercer par ses lignes douces et épurées.', 'huaweiP40.png', 359, 54, 'Huaweï', 'Téléphone'),
(9, 'Playstation 4 slim 500 go', 'Le jeu. Redéfini.\r\nDécouvrez une PS4 plus élégante et plus compacte, avec une puissance dédiée aux joueurs.\r\n\r\nUn nouveau look, une PS4 plus fine\r\n\r\nDécouvrez des couleurs vivantes et brillantes avec des graphismes HDR à couper le souffle.\r\nOrganisez vos jeux et applications, et partagez avec vos amis à l\'aide d\'une nouvelle interface très intuitive.\r\nStockez vos jeux, applications, captures d\'écran et vidéos avec les options 500 Go et 1 To.\r\nLes plus grands films, les plus grandes séries télé, et toutes vos applications préférées pour le divertissement.', 'ps4Slim.jpg', 299, 250, 'Sony', 'Console de jeux video'),
(10, 'Samsung Galaxy A12', 'Le Samsung Galaxy A12 est un smartphone entrée de gamme équipé d\'un SoC Mediatek couplé à 3, 4 ou 6 Go de RAM et 32, 64 ou 128 Go de stockage, extensible via microSD.\r\nIl possède 4 capteurs photo à l\'arrière : le principal à 48 mégapixels, un ultra grand-angle à 5 mégapixels, un objectif macro et un capteur de profondeur.\r\nIl a une batterie de 5000 mAh compatible charge rapide (15 W).', 'samusung-galaxy-a12.jpg', 159, 252, 'Samsung', 'Téléphone');

-- --------------------------------------------------------

--
-- Table structure for table `historique`
--

CREATE TABLE `historique` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `idPanier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `role`) VALUES
(21, 'c@gmail.com', '$2y$10$qpvb2iVpbzN4QU8Y.Z1vsOV8RaMYgM9VQzBH.euZi6t1YmC4HC4oa', 'ban'),
(22, 'd@gmail.com', '$2y$10$pr.o82q0Pidn45ZinfSX/uULBeaVwh5QaNinCZNAdA0ZVwY.UH70e', 'ban'),
(23, 'rocca83910@gmail.com', '$2y$10$jt1wVieGXHoxRZm9jpFCOu7mRaQ80.oPODepN5kpRxh2SPFWYXObe', 'admin'),
(24, 'a@gmail.com', '$2y$10$yMTKbvToKtuZozPKrWTT1OwMGkoQel4ebF0yyxulMVNgAYHD/S1HS', 'user'),
(25, 'b@gmail.com', '$2y$10$R.dMv8/Ees3dmWQQhThGBOZv8hUHIeNh99kWgxok3eFv4nfbJM3Tm', 'user'),
(26, 'g@gmail.com', '$2y$10$c9Ghey6xMOZIRgtVqBIBVewpV8A/ALF4j5VJH1kcMsmIkEkPn7Fae', 'user'),
(32, 'w@gmail.com', '$2y$10$ZADoygxYVf5xwKaNacK.nuPR3iMiM6N7zPRVNRnIRCMyI6y0Az3/y', 'user'),
(33, 'e@gmail.com', '$2y$10$kofxwQSY9X6M2q6BS3deoeuVPQwhAHLpAON1wQzCT2YoaXIzc3LgO', 'user'),
(34, 'f@gmail.com', '$2y$10$pzHwgxkG3LcsCMnm26zFJ.bVZcydR7ctLIm9xYVoDhreGcqC9p2x.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_panier` (`idPanier`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`idUser`),
  ADD KEY `fk_article` (`idArticle`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `historique`
--
ALTER TABLE `historique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `fk_panier` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`id`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
