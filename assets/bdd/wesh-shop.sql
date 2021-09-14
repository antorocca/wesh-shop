-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2021 at 11:31 AM
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
-- Database: `wesh-shop`
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
  `prix` float NOT NULL,
  `stock` int(11) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `nom`, `description`, `photo`, `prix`, `stock`, `marque`, `type`) VALUES
(1, 'Iphone 12', 'Iphone 12 Apple,Lorem ipsum dolor sit amet, consectetur adipisicing elit. \r\nCorrupti facere rerum reiciendis ipsum repellendus, ad praesentium, quo, ducimus voluptatum commodi esse voluptatem eaque natus ut assumenda soluta sit dolores laudantium!Lorem ipsum dolor sit amet, consectetur adipisicing elit. \r\nCorrupti facere rerum reiciendis ipsum repellendus, ad praesentium, quo, ducimus voluptatum commodi esse voluptatem eaque natus ut assumenda soluta sit dolores laudantium!', 'iphone12.png', 1000, 150, 'Apple', 'Téléphone'),
(2, 'Samsung Galaxy S20', 'Un samsung S20,sit amet consectetur adipisicing elit. Voluptatibus deleniti repellat nesciunt illum, sit amet consectetur adipisicing elit. Voluptatibus deleniti repellat nesciunt illum.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Non architecto fuga eum autem soluta quidem veritatis iure, delectus nisi, ipsa eos explicabo similique fugit assumenda at modi, laborum accusantium distinctio maiores cupiditate porro nulla ut? Magnam ullam inventore maiores eligendi non dolore dolores, numquam fugit?', 'samsung.jpg', 500, 150, 'Samsung', 'Téléphone'),
(3, 'Playstation 5', 'Playstation 5, Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero.Lorem ipsum dolor sit amet consectetur adipisicing elit. Non architecto fuga eum autem soluta quidem veritatis iure.\r\n\r\nDelectus nisi, ipsa eos explicabo similique fugit assumenda at modi, laborum accusantium distinctio maiores cupiditate porro nulla ut? Magnam ullam inventore maiores eligendi non dolore dolores, numquam fugit?Lorem ipsum dolor sit amet consectetur adipisicing elit. Non architecto fuga eum autem soluta.', 'ps5.jpg', 600, 0, 'Sony', 'Console de jeux video'),
(4, 'Redmi Note 10 5G', 'De l\'Antarctique à l\'espace, la série Redmi Note a envahi le monde entier.\r\nNotre approche consiste à sans cesse nous remettre en question et à dépasser nos limites. Maintenant c\'est votre tour !\r\nTestez vos limites et découvrez de quoi vous êtes capable.', 'redmiNote10.png', 299, 52, 'Xiaomi', 'Téléphone'),
(5, 'Xbox Series X', 'La Xbox Series X permet d’obtenir des fréquences d’images incroyablement fluides allant jusqu’à 120 images par seconde tout en offrant les performances visuelles de la technologie HDR.\r\nPlongez dans des univers avec des personnages plus détaillés, une lumière mieux maîtrisée et des détails hors du commun avec une résolution 4K immersive.', 'xboxSerieX.jpg', 599, 1, 'Microsoft', 'Console de jeux video'),
(6, 'Nintendo Switch', 'Profitez de l\'expérience de votre console de salon même sans téléviseur.\r\nLa Nintendo Switch peut se transformer pour s\'adapter à votre situation, de manière à ce que vous puissiez profiter de vos jeux quel que soit votre rythme de vie.\r\n\r\nC\'est une nouvelle ère où vous ne devez plus adapter votre quotidien pour pouvoir jouer, c\'est désormais votre console qui s\'adapte à votre style de vie.\r\n\r\nProfitez de vos jeux où, quand et avec qui vous le souhaitez !', 'nintendo-switch.png', 299, 38, 'Nintendo', 'Console de jeux video'),
(7, 'Xbox Series S', 'La nouvelle génération de jeux rend notre plus grande bibliothèque numérique disponible sur la Xbox la plus compacte à ce jour.\r\nAvec des mondes plus dynamiques, des temps de chargement réduits et l’ajout du Xbox Game Pass (vendu séparément), la Xbox Series S entièrement numérique est le meilleur rapport qualité-prix du monde du gaming.\r\n\r\n', 'xboxSerieS.jpg', 500, 100, 'Microsoft', 'Console de jeux video'),
(8, 'Huaweï P40 Pro+', 'Huaweï P40 Pro+ est un smartphone d\'exception.\r\nSa quintuple caméra conçue avec Leica et son capteur Ultra Vision de 50 MP révolutionnent la photographie sur smartphone, tandis que son capteur cinématographique de 40 MP en font un véritable studio portable.\r\nJouissez d\'une vitesse à couper le souffle grâce au processeur Kirin 990 5G embarqué et laissez-vous bercer par ses lignes douces et épurées.', 'huaweiP40.png', 359, 54, 'Huaweï', 'Téléphone'),
(9, 'Playstation 4 slim 500 go', 'Le jeu. Redéfini.\r\nDécouvrez une PS4 plus élégante et plus compacte, avec une puissance dédiée aux joueurs.\r\n\r\nUn nouveau look, une PS4 plus fine\r\n\r\nDécouvrez des couleurs vivantes et brillantes avec des graphismes HDR à couper le souffle.\r\nOrganisez vos jeux et applications, et partagez avec vos amis à l\'aide d\'une nouvelle interface très intuitive.\r\nStockez vos jeux, applications, captures d\'écran et vidéos avec les options 500 Go et 1 To.\r\nLes plus grands films, les plus grandes séries télé, et toutes vos applications préférées pour le divertissement.', 'ps4Slim.jpg', 299, 250, 'Sony', 'Console de jeux video'),
(10, 'Samsung Galaxy A12', 'Le Samsung Galaxy A12 est un smartphone entrée de gamme équipé d\'un SoC Mediatek couplé à 3, 4 ou 6 Go de RAM et 32, 64 ou 128 Go de stockage, extensible via microSD.\r\nIl possède 4 capteurs photo à l\'arrière : le principal à 48 mégapixels, un ultra grand-angle à 5 mégapixels, un objectif macro et un capteur de profondeur.\r\nIl a une batterie de 5000 mAh compatible charge rapide (15 W).', 'samusung-galaxy-a12.jpg', 159, 252, 'Samsung', 'Téléphone'),
(11, 'GNRSPTY Polo Homme Manches Courtes', 'Coton\r\nEau froide, lavable en machine ou à la main.\r\nType de col: Boutonné\r\nTaille normale\r\nManche courte', 'polo-homme-GNRSPTY.jpg', 13, 26, 'GNRSPTY', 'Vêtement'),
(12, 'Polo homme polycton - Gris foncé', 'Polo homme mélange coton polyester, manches courtes, disponible du S au 5XL\r\n\r\n- Composition : 65% polyester - 35 % coton - 200 g/m2\r\n\r\n- patte de boutonnage 3 boutons ton sur ton\r\n\r\n- col et bas de manches en bord côte 1x1\r\n\r\n- bande de propreté au col, coutures renforcées aux épaules\r\n\r\n- entretien facile', 'polo-Sols.jpg', 19, 36, 'Sol\'s', 'Vêtement'),
(13, 'Pantalon chino kaki', 'Elégant et décontracté à la fois, LTC nous propose un pantalon chino pour homme. Associez-le à une paire de mocassins ou de sneakers.\r\n-Marques: LTC\r\n-Genre: Homme\r\n-Composition: 98% Coton - 2% Elasthanne\r\n-Coupe: Chino\r\n-Fermeture: Zippée\r\n-Hauteur de taille: Normale\r\n-Détails: 4 poches - Finitions et surpiqûres travaillées.', 'chino-kaki.jpg', 49, 12, 'LTC', 'Vêtement'),
(14, 'Pantalon homme noir a rayures', 'Pantalon  homme à rayure de couleur noir\r\n\r\nModèle de coupe slim\r\n\r\nBandes blanches sur les cotés\r\n\r\nFermeture zip métalique et bouton\r\n\r\nComposition: 63% polyesthère 33% viscose 4% élasthane\r\n\r\nLe mannequin mesure 1M82  il porte une taille W31', 'pantalon-homme-noir-rayure.jpg', 49, 12, 'LTC', 'Vêtement'),
(15, 'Chemise Le Temps des Cerises homme Polo blanc à motif floral', 'Chemise Le Temps des Cerises homme modèle Pold en coton blanc imprimé de motif floral.\r\n\r\n- Chemise homme Le Temps des Cerises\r\n- Modèle Pold à manches longues\r\n- 100% Coton - coupe ajustée\r\n- Coloris blanc imprimé de motif floral galaxy\r\n- Revers de manches contrastés\r\n- Galon de finition noir marqué le temps des cerises sur l\'intérieur\r\n- Boutons blanc nacré gravés Le Temps des Cerises', 'chemise-motif-fleurs.jpg', 68, 56, 'LTC', 'Vêtement'),
(16, 'Bracelet en Or Infinite', '-Fabriqué en Italie\r\n-Vient avec un emballage personnalisé et une boîte Medusa.\r\n-Délivrée avec certificat d\'authenticité qui peut être utilisé à des fins d\'assurance.\r\n-Tous les bijoux sont estampés en fonction de leur pureté d\'or.\r\n-Chaque achat est couvert par une garantie de 100 jours contre les défectuosités. Ne couvre pas les dommages physiques.\r\n-Bijoux Medusa n’est pas un revendeur ou un partenaire officiel Versace, tous nos bijoux sont des créations de Medusa.', 'bracelet-infinite.jpg', 150, 36, 'Médusa', 'Bijoux'),
(17, 'Bague en Or Rubia', '-Fabriqué en Italie\r\n-Vient avec un emballage personnalisé et une boîte Medusa.\r\n-Délivrée avec certificat d\'authenticité qui peut être utilisé à des fins d\'assurance.\r\n-Tous les bijoux sont estampés en fonction de leur pureté d\'or.\r\n-Chaque achat est couvert par une garantie de 100 jours contre les défectuosités. Ne couvre pas les dommages physiques.', 'bague-rubia.jpg', 249, 16, 'Médusa', 'Bijoux'),
(18, 'Boucles d\'oreilles huggies décorées 10 mm', 'Mise sur la simplicité et l\'élégance avec ces boucles d\'oreilles huggies ! Ornées de pierres scintillantes sur chaque anneau, ces boucles d’oreilles vont habiller tes oreilles et agrémenter toutes tes tenues.', 'boucle-huggies.jpg', 69, 29, 'Marie', 'Bijoux'),
(19, 'Collier amas de pendentifs longs coquillages et plumes', 'Ce genre de collier va aussi bien avec des tenues décontractées qu’avec des tenues plus habillées ! La chaîne couleur dorée comporte un amas de pendentifs avec des coquillages, des plumes corail et de petites perles d\'imitation.', 'collier-plume.jpg', 46, 46, 'Marie', 'Bijoux'),
(20, 'Meuble TV Bois de manguier & métal', 'La collection HARLEM trouvera une place de choix dans votre intérieur grâce à sa structure noble en bois massif. Avec ses éléments en métal noir et ses lignes droites, cette collection revisite les codes du style industriel en y insufflant un esprit bistrot ! Et n\'oublions pas ses nombreux espaces de rangements qui la rendront aussi pratique qu\'authentique.\r\n\r\nCaractéristiques techniques:\r\n-Plateaux & tiroirs: Bois de Manguier massif\r\n-Piètement et poignées : Métal noir\r\n-Coloris: Naturel\r\n-2 tiroirs\r\n-1 niche\r\n-Charge maximale du plateau TV : 50kg\r\n-Charge maximale des tiroirs : 15kg\r\n-Charge maximale des niches : 20kg\r\n-Dimensions totales : L120x P45x H50cm\r\n-Dimensions des tiroirs : L50 x P43 x H14cm', 'meuble-harlem.jpg', 249, 6, 'Harlem', 'Ameublement'),
(21, 'Chaise en cuir synthétique noir et pieds en bois plaqué noyer', 'Vous souhaitez trouver du mobilier qui impose en un tournemain son caractère à votre pièce à vivre ? Alors, vous allez adorer notre chaise Polo noire, superbe nouveauté de notre collection Vintage.\r\n\r\nSobre et élégante avec son cuir synthétique au coloris synonyme de chic et de modernité, notre chaise Polo noire vous séduira par ses proportions agréables H 69. Vous aimerez son piètement en noyer légèrement incliné et son assise accueillante.', 'chaise-bois-et-noir.jpg', 89, 23, 'Polo', 'Ameublement'),
(22, 'Chaise en fer forgé AREB', 'Chaise en fer forgé artisanale décorée d\'arabesque en fer plein\r\n\r\nPour l\'aménagement d\'un salon de jardin complet, nous vous invitons à visiter notre page consacrée aux Tables de jardin en zellige marocaines avec piètement en fer forgé de 40 ou 75 cm de hauteur.\r\n\r\n-Hauteur: 100 cm\r\n-Hauteur de l\'assise: 45 cm\r\n-Profondeur de l\'assise: 42 cm', 'chaise-fer-forge.jpg', 65, 45, 'Areb', 'Ameublement'),
(23, 'Chevet artisanal modèle Loup déco chalet', 'Chevet artisanal modèle loup déco chalet montagne\r\nCréation artisanale sur mesure en bois 100% écologique.\r\nen pin ou épicéa.\r\nce chevet est présenté en bois brut\r\nModèle loup pas de tiroir, 1 porte\r\nDim 50H x 45L x 32P cm', 'chevet-loup2.jpg', 209, 6, 'Déco Chalet Montange', 'Ameublement'),
(24, 'Meuble artisanal en cageots', 'Étagère ancienne à tiroirs réalisée à partir de cageots anciens. Trois tiroirs sur glissière h8, 5/l45/p29.\r\nCharme pour cet objet unique.\r\nDimensions étagère h40/l49/p30.', 'etagere-artisanale-en-cageots_original.png', 46, 26, 'Beber', 'Ameublement'),
(31, 'Les fleurs du mal - Belin Gallimard', '1857 : la publication des Fleurs du Mal fait scandale et vaut à leur auteur, Charles Baudelaire, un procès retentissant.\r\nAujourd\'hui encore, la modernité subversive de ce recueil de poèmes, riche d\'images et de symboles, ne peut qu\'étonner : alliance inédite de la volupté et de la souffrance, exaltation du mal, fascination pour la laideur comme pour la beauté...\r\nDes profondeurs de la ville aux paradis artificiels, du spleen à l\'évasion, suivez le poète dans son cheminement vers l\'idéal.\r\nDans le volume, de nombreuses activités d\'appropriation et d\'étude de la langue, ainsi qu\'un cahier photos et un groupement de textes en lien avec le parcours associé « Alchimie poétique : la boue et l\'or » (Nouveaux programmes, Bac 2020). Groupements de textes : Transfiguration poétique Ennui, spleen et mélancolie', '8-09-2021_07.21.04_Les fleurs du mal - Belin Gallimard.jpg', 3.2, 20, 'Charles Baudelaire', 'Livre');

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
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `firstname`, `mdp`, `address`, `ville`, `role`) VALUES
(21, 'c@gmail.com', 'Monsieur-c', 'Prenom-c', '$2y$10$qpvb2iVpbzN4QU8Y.Z1vsOV8RaMYgM9VQzBH.euZi6t1YmC4HC4oa', 'rue c', 'villeC', 'ban'),
(22, 'd@gmail.com', 'Monsieur-d', 'Prenom-d', '$2y$10$pr.o82q0Pidn45ZinfSX/uULBeaVwh5QaNinCZNAdA0ZVwY.UH70e', 'rue d', 'villeD', 'ban'),
(23, 'rocca83910@gmail.com', 'Rocca', 'Antony', '$2y$10$jt1wVieGXHoxRZm9jpFCOu7mRaQ80.oPODepN5kpRxh2SPFWYXObe', '27 grand rue', 'Pourrieres', 'admin'),
(24, 'a@gmail.com', 'Monsieur-a', 'Prenom-a', '$2y$10$yMTKbvToKtuZozPKrWTT1OwMGkoQel4ebF0yyxulMVNgAYHD/S1HS', 'rue a', 'villeA', 'seller'),
(25, 'b@gmail.com', 'Monsieur-Monsieur-b', 'Prenom-b', '$2y$10$R.dMv8/Ees3dmWQQhThGBOZv8hUHIeNh99kWgxok3eFv4nfbJM3Tm', 'rue b', 'villeB', 'user'),
(26, 'g@gmail.com', 'Monsieur-g', 'Prenom-g', '$2y$10$c9Ghey6xMOZIRgtVqBIBVewpV8A/ALF4j5VJH1kcMsmIkEkPn7Fae', 'rue g', 'villeG', 'user'),
(32, 'w@gmail.com', 'Monsieur-w', 'Prenom-w', '$2y$10$ZADoygxYVf5xwKaNacK.nuPR3iMiM6N7zPRVNRnIRCMyI6y0Az3/y', 'rue w', 'villeW', 'user'),
(33, 'e@gmail.com', 'Monsieur-e', 'Prenom-e', '$2y$10$kofxwQSY9X6M2q6BS3deoeuVPQwhAHLpAON1wQzCT2YoaXIzc3LgO', 'rue e', 'villeE', 'user'),
(34, 'f@gmail.com', 'Monsieur-f', 'Prenom-f', '$2y$10$pzHwgxkG3LcsCMnm26zFJ.bVZcydR7ctLIm9xYVoDhreGcqC9p2x.', 'rue f', 'VilleF', 'user'),
(37, 'v@gmail.com', 'Monsieur-v', 'Prenom-v', '$2y$10$44jhHAThXbA7MziMtIkyV.R6ydpoOrSaFtxOArXxOkLaDdcgkSn5C', 'rue v', 'VilleV', 'user'),
(40, 'p@gmail.com', 'Monsieur-p', 'Prenom-p', '$2y$10$ph5vnUpU0UYWZwSRY4kmcupMVrR4kav4Y1bOy1j8h62IxvMijDKkS', 'rue p', 'villeP', 'user'),
(41, 'm@gmail.com', 'Monsieur-m', 'Prenom-m', '$2y$10$wAoubwL8MlG4kFL6CbGq.eYLtb5bLpWcNVxDH54rIunMlOBRmJEry', 'rue m', 'villeM', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vetement`
--

CREATE TABLE `vetement` (
  `id` int(11) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `vetement`
--
ALTER TABLE `vetement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `vetement`
--
ALTER TABLE `vetement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
