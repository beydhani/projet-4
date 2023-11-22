-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 22 nov. 2023 à 14:50
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom_utilisateur`, `mot_de_passe`) VALUES
(1, 'JeanForteroche', '$2y$10$.DWyKb3GwaUgNIcuqzUmheRcksla5SRAM.PYMKycFfYB7UmmVDqNu');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `extrait` text NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `extrait`, `contenu`, `date_publication`) VALUES
(14, 'Anchorage', 'John se tenait au bord du lac Hood, à Anchorage, en contemplant les reflets scintillants des montagnes enneigées dans l\'eau calme. Les derniers rayons du soleil d\'été baignaient la ville d\'une lumière dorée. Il se sentait profondément connecté à cette nature majestueuse qui l\'entourait, une raison de plus pour laquelle il avait choisi de s\'installer dans cette ville étonnante.', 'John avait grandi dans une grande métropole, mais il avait toujours été fasciné par la nature et les grands espaces. Quand il eut l\'opportunité de déménager pour travailler à Anchorage, en Alaska, il n\'hésita pas un instant. La beauté sauvage de cet État lui offrait une échappatoire bienvenue de l\'agitation de la vie urbaine.\r\nSa première année à Anchorage fut une aventure. Il passa ses week-ends à explorer les vastes étendues de montagnes, de forêts et de lacs qui s\'étendaient à perte de vue. Il apprit à pêcher le saumon dans les rivières glaciaires, à skier sur les pistes enneigées, et à apprécier les aurores boréales qui dansaient dans le ciel nocturne.\r\nUn jour, lors d\'une de ses randonnées en montagne, John rencontra un groupe de personnes locales qui partageaient sa passion pour la nature. Ils étaient membres d\'un club de randonnée et l\'invitèrent à se joindre à eux. C\'est ainsi qu\'il fit la connaissance de Sarah, une jeune femme dynamique et passionnée par la faune et la flore locales.\r\nAu fil des mois, John et Sarah devinrent de proches amis, et leur amitié se transforma peu à peu en quelque chose de plus profond. Ils partageaient leur amour pour la nature, mais aussi pour la culture et l\'histoire de l\'Alaska. Ils visitèrent des musées, assistèrent à des festivals locaux, et découvrirent ensemble les petites merveilles cachées de la ville.\r\nUn soir d\'hiver, alors qu\'ils se promenaient le long du lac Hood, John s\'agenouilla dans la neige scintillante et demanda à Sarah de l\'épouser. Les étoiles brillaient au-dessus d\'eux, et le lac gelé était le témoin silencieux de leur engagement envers une vie partagée d\'aventures, d\'amour et de découvertes à Anchorage, la ville où ils avaient trouvé leur chez-soi au cœur de la nature sauvage de l\'Alaska.', '2023-11-18 22:59:52'),
(15, 'Fairbanks', 'John et Sarah avaient décidé de franchir une nouvelle étape dans leur aventure en Alaska en déménageant à Fairbanks, une ville située plus au nord. Ils avaient entendu parler de la beauté unique de cette région, de ses longs hivers et de ses nuits polaires. Alors qu\'ils s\'installaient dans leur nouvelle maison en bois à Fairbanks, une nouvelle phase de leur vie commençait, sous les aurores boréales qui illumineraient leur ciel nocturne.', 'Fairbanks était une toute nouvelle aventure pour John et Sarah. Ils avaient quitté Anchorage pour chercher de nouvelles expériences et s\'immerger davantage dans l\'Alaska profond. La ville, située dans le centre de l\'État, était célèbre pour ses hivers rigoureux et ses nuits polaires, mais elle offrait également une beauté incommensurable.\r\nLeurs premiers mois à Fairbanks furent un défi. Les températures glaciales, les journées courtes et les longues nuits d\'hiver étaient un contraste frappant par rapport à la douceur d\'Anchorage. Cependant, John et Sarah étaient déterminés à tirer le meilleur parti de cette nouvelle expérience. Ils se sont plongés dans la culture locale, en apprenant les traditions des populations autochtones et en participant à des festivals d\'hiver.\r\nL\'une des choses les plus impressionnantes à Fairbanks était la fréquence des aurores boréales. John et Sarah passaient souvent leurs soirées à l\'extérieur, à admirer les lumières colorées qui dansaient dans le ciel nocturne. C\'était un spectacle magique qui semblait renforcer leur lien déjà solide.\r\nIls ont également trouvé de nouvelles activités pour occuper leurs journées d\'hiver. Ils ont appris à conduire un traîneau à chiens, à faire du ski de fond, et à pêcher sur la glace. Leur amour pour la nature et l\'aventure n\'avait fait que croître depuis leur arrivée à Fairbanks.\r\nUn jour, lors d\'une randonnée en raquettes dans les montagnes environnantes, John s\'arrêta dans un paysage enneigé, s\'agenouilla devant Sarah et lui demanda de renouveler leur engagement. Il lui rappela qu\'ils avaient commencé leur aventure à Anchorage et qu\'ils avaient grandi ensemble à travers toutes les saisons de l\'Alaska. Les étoiles et les aurores boréales brillèrent au-dessus d\'eux, témoins de leur amour continu et de leur engagement à vivre une vie remplie de découvertes dans le nord glacial de l\'Alaska.\r\nFairbanks était devenue une autre étape mémorable dans leur histoire, une ville qui avait façonné leur amour et les avait rapprochés encore plus de la nature et de l\'essence même de l\'Alaska. Leurs aventures ne faisaient que commencer, avec la promesse de nombreuses nouvelles découvertes à venir dans ce coin éloigné et magnifique du monde.', '2023-11-18 23:01:54'),
(16, 'Juneau', 'Après leur passage à Fairbanks, John et Sarah ont choisi de poursuivre leur aventure à Juneau, la capitale de l\'Alaska. Ils avaient entendu parler de l\'incroyable beauté de cette ville côtière, de ses montagnes escarpées et de ses fjords majestueux. Alors qu\'ils arrivaient en ferry, John et Sarah étaient impatients de découvrir les merveilles de la région.', 'Juneau, la capitale de l\'Alaska, était un monde à part. Après leur expérience à Fairbanks, John et Sarah avaient décidé de s\'installer à Juneau pour découvrir une nouvelle facette de cet État incroyable. La ville était nichée entre les montagnes côtières et la mer, et sa beauté était à couper le souffle.\r\nIls vécurent dans une petite maison en bois surplombant un fjord, où ils pouvaient souvent apercevoir des baleines à bosse jouant dans les eaux scintillantes. Juneau offrait une abondance d\'activités de plein air, et John et Sarah en profitèrent pleinement. Ils faisaient de la randonnée sur les sentiers côtiers, partaient en kayak à la découverte des glaciers, et passaient du temps à pêcher dans les eaux riches en saumon.\r\nLa vie à Juneau était différente de tout ce qu\'ils avaient connu auparavant. Les hivers n\'étaient pas aussi froids qu\'à Fairbanks, mais ils étaient humides et sombres, avec des précipitations fréquentes. Cependant, cela ne les empêcha pas de s\'aventurer dans les forêts pluvieuses, où la végétation était luxuriante et les cascades abondaient.\r\nUn jour, pendant une excursion en bateau vers un glacier lointain, John demanda à Sarah de l\'épouser à nouveau, cette fois-ci en présence des majestueuses formations de glace. Avec un sourire radieux, elle accepta sa proposition, et ils célébrèrent leur engagement dans un environnement naturel aussi spectaculaire que leur amour l\'un pour l\'autre.\r\nJuneau était devenue une étape mémorable de leur voyage à travers l\'Alaska, une ville où ils avaient découvert la magie des fjords, la grâce des baleines, et la richesse de la culture autochtone. Leurs aventures les avaient rapprochés de la nature comme jamais auparavant, et ils attendaient avec impatience la prochaine destination qui les attendait dans ce vaste État.', '2023-11-18 23:04:16'),
(17, 'Sitka', 'Après avoir exploré Juneau, John et Sarah décidèrent de s\'installer à Sitka, une ville pittoresque sur la côte sud-est de l\'Alaska. C\'était là qu\'ils accueillirent leurs deux enfants, Emily et Liam, qui grandirent en découvrant la beauté de l\'Alaska depuis le berceau.', 'Sitka était une ville au charme intemporel. John et Sarah avaient choisi cet endroit pour offrir à leur famille un environnement naturel riche et un style de vie calme. Ils avaient trouvé une maison chaleureuse près de la côte, entourée d\'une forêt luxuriante.\r\nLa vie à Sitka était paisible. Les enfants, Emily et Liam, grandissaient en explorant les plages, en observant les aigles majestueux survolant les cieux et en participant à des randonnées familiales à travers les forêts anciennes. La ville offrait une multitude d\'opportunités pour s\'immerger dans la culture autochtone, apprendre l\'art de la pêche et découvrir les traditions locales.\r\nLes hivers à Sitka étaient doux en comparaison avec Fairbanks, mais ils apportaient des tempêtes impressionnantes venues du Pacifique. La famille passait des soirées blotties près de la cheminée, écoutant le crépitement du feu pendant que la pluie tambourinait sur les fenêtres.\r\nEmily et Liam grandissaient avec un profond respect pour la nature et une compréhension profonde de l\'importance de la préservation de l\'environnement. Ils partageaient les passions de leurs parents pour la randonnée, la pêche et l\'observation de la faune. Les aurores boréales qui apparaissaient de temps en temps dans le ciel d\'hiver étaient toujours un spectacle captivant pour eux.\r\nAlors que John et Sarah avaient commencé leur aventure en Alaska à Anchorage, traversé Fairbanks, vécu des moments magiques à Juneau, et fondé leur famille à Sitka, ils savaient que leur voyage à travers cet État extraordinaire n\'était pas terminé. L\'Alaska avait façonné leur vie de manière indélébile, et ils attendaient avec impatience les prochaines étapes de cette incroyable aventure en famille.', '2023-11-18 23:06:08'),
(18, 'Ketchikan', 'Après des années de découvertes à Sitka, John, Sarah, Emily et Liam prirent une décision audacieuse. Ils se dirigèrent vers Ketchikan, une ville pittoresque située à l\'extrême sud-est de l\'Alaska. Leurs enfants avaient grandi, et une nouvelle aventure les attendait à Ketchikan, une ville mystérieuse entourée d\'une nature sauvage luxuriante.', 'Ketchikan était une ville fascinante avec un passé mystérieux. Elle était célèbre pour son atmosphère envoûtante, ses légendes autochtones et ses vastes forêts pluviales. La famille s\'installa dans une maison en bois près du rivage, entourée par les bruits apaisants de la mer et de la forêt. La ville avait une aura de mystère qui intriguait John et Sarah. Ils se plongèrent dans les récits des Tlingits, le peuple autochtone de la région, qui partageaient des légendes anciennes sur les esprits de la forêt et les créatures mystiques. Emily et Liam étaient fascinés par ces histoires et passaient des heures à explorer les sentiers secrets de la forêt. Mais ce qui rendait Ketchikan encore plus mystérieuse, c\'étaient les événements étranges qui semblaient se produire de temps en temps. Des lumières étranges apparaissaient dans la forêt la nuit, et des histoires de rencontres avec des êtres inconnus circulaient parmi les habitants. John et Sarah étaient sceptiques, mais les récits étaient si fréquents qu\'ils commencèrent à se demander s\'il y avait une part de vérité dans ces histoires. Un soir d\'été, alors que la famille se promenait près de la plage, Emily et Liam dirent avoir vu une silhouette étrange dans les bois. Ils prétendirent avoir entendu des voix murmurantes et des chants étranges. John et Sarah cherchèrent, mais ne trouvèrent aucune trace de qui que ce soit. Cette nuit-là, alors que la famille se couchait, un étrange bruit résonna dans la maison. Ils se levèrent en sursaut et allumèrent toutes les lumières, mais ne trouvèrent aucune explication à ce qui s\'était passé. La famille commença à se demander si Ketchikan avait vraiment un côté mystérieux, ou si leur imagination leur jouait des tours. Et c\'est ainsi que leur histoire dans cette ville mystérieuse de Ketchikan se termina, avec des questions sans réponse et une aura d\'intrigue persistante. L\'Alaska avait une fois de plus révélé ses mystères, laissant John, Sarah, Emily et Liam se demander ce qui se cachait dans les profondeurs des forêts pluviales et au-delà des horizons de cette terre sauvage. Super.', '2023-11-18 23:07:41');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` datetime NOT NULL,
  `signalé` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_article`, `id_utilisateur`, `contenu`, `date_publication`, `signalé`) VALUES
(19, 14, 1, ' Bravo pour ce travail exceptionnel !', '2023-11-18 23:25:32', 0),
(20, 15, 1, ' Magnifique', '2023-11-18 23:25:32', 1),
(21, 16, 1, 'Nul !', '2023-11-18 23:25:32', 0),
(22, 17, 1, 'Wow très intéressant.', '2023-11-18 23:25:32', 0),
(23, 18, 1, 'Choqué !', '2023-11-18 23:25:32', 2),
(24, 14, 2, 'Très nul', '2023-11-18 23:25:32', 0),
(25, 15, 2, 'Bouh vous etes nul', '2023-11-18 23:25:32', 0),
(26, 16, 2, 'Trop mignon', '2023-11-18 23:25:32', 0),
(27, 17, 2, 'Bouh vous etes trop nul', '2023-11-18 23:25:32', 0),
(28, 18, 2, 'Bravo', '2023-11-18 23:25:32', 1),
(29, 14, 3, 'Pas cool', '2023-11-18 23:25:33', 0),
(30, 15, 3, 'Article très instructif !', '2023-11-18 23:25:33', 0),
(31, 16, 3, 'Pas convaincu par les arguments.', '2023-11-18 23:25:33', 0),
(32, 17, 3, 'Un éclairage intéressant sur le sujet.', '2023-11-18 23:25:33', 0),
(33, 18, 3, 'Je ne suis pas daccord.', '2023-11-18 23:25:33', 1),
(34, 14, 4, 'Merci pour cet article.', '2023-11-18 23:25:33', 0),
(35, 15, 4, 'Je mattendais à mieux.', '2023-11-18 23:25:33', 0),
(36, 16, 4, 'Très bien écrit !', '2023-11-18 23:25:33', 0),
(37, 17, 4, 'Manque de profondeur.', '2023-11-18 23:25:33', 0),
(38, 18, 4, 'Superbe analyse !', '2023-11-18 23:25:33', 1),
(39, 14, 5, 'Pas très original.', '2023-11-18 23:25:33', 0),
(40, 15, 5, 'Très détaillé et utile.', '2023-11-18 23:25:33', 0),
(41, 16, 5, 'Ça manque de clarté.', '2023-11-18 23:25:33', 0),
(42, 17, 5, 'Instructif et bien présenté.', '2023-11-18 23:25:33', 0),
(43, 18, 5, 'Jai adoré ce point de vue.', '2023-11-18 23:25:33', 0),
(44, 15, 6, 'Article très instructif !', '2023-11-18 23:28:46', 0),
(45, 16, 6, 'Pas convaincu par les arguments.', '2023-11-18 23:28:46', 0),
(46, 17, 6, 'Un éclairage intéressant sur le sujet.', '2023-11-18 23:28:46', 0),
(47, 18, 6, 'Je ne suis pas d\'accord.', '2023-11-18 23:28:46', 0),
(48, 14, 7, 'Merci pour cet article.', '2023-11-18 23:28:46', 0),
(49, 15, 7, 'Je m\'attendais à mieux.', '2023-11-18 23:28:46', 0),
(50, 16, 7, 'Très bien écrit !', '2023-11-18 23:28:46', 0),
(51, 17, 7, 'Manque de profondeur.', '2023-11-18 23:28:46', 0),
(52, 18, 7, 'Superbe analyse !', '2023-11-18 23:28:46', 0),
(53, 14, 8, 'Pas très original.', '2023-11-18 23:28:46', 0),
(54, 15, 8, 'Très détaillé et utile.', '2023-11-18 23:28:46', 0),
(55, 16, 8, 'Ça manque de clarté.', '2023-11-18 23:28:46', 0),
(56, 17, 8, 'Instructif et bien présenté.', '2023-11-18 23:28:46', 0),
(57, 18, 8, 'J\'ai adoré ce point de vue.', '2023-11-18 23:28:46', 0),
(58, 18, 2, 'Test', '2023-11-20 20:59:08', 0),
(66, 17, 2, 'Ah oui ', '2023-11-21 18:59:07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_utilisateur`, `email`, `mot_de_passe`) VALUES
(1, 'alban', 'alban@michel.com', '$2y$10$64wHuynq3IYk99eMDCdJ4Ojv/r32DqqS8nVAQA14FG8vfaMf5.J4q'),
(2, 'Jean', 'jean@jean.com', '$2y$10$PT1rEQH0JDP01KYsfatpX.1J8MfstEnJoh.S9AvLHWApBZvPhrwt6'),
(3, 'albert', 'albert@albert.com', '$2y$10$PeNhEeACpyBqJJZym1RrJ.INEDunfNiVN06VGrNzqO3OzRT3G9eoG'),
(4, 'Alberto', 'alberto@alberto.com', '$2y$10$/0sXTUJrp5zcfwV74yTnPeneZ.fxR1ywKnfq/3E.1wb8zfQNqXLSy'),
(5, 'paula', 'paula@paula.com', '$2y$10$elnz3KIz70qE5/ErDM.hOujP2pvCz3O5OfoRhGyTxl7ftlugHwnaS'),
(6, 'Lorenzo', 'lorenzo@lorenzo.com', '$2y$10$lTlf0LHLtpDI7zEdQrID..GfuuNpw7OfHABOWhOCNMSlIfgbSP8XC'),
(7, 'laurent', 'laurent@laurent.com', '$2y$10$b2GOQIycwkcXG1ejPQfqBe0Y4Ndzo31gbveL3T6naBZVTJXTD/Nga'),
(8, 'Marine', 'marine@marine.com', '$2y$10$MnYhFnXv7qEPcEzd.KnFCed10RPWzd8kcDp2pQfTJ8T2CfVOXUwJS'),
(9, 'paul', 'paul@paul.com', '$2y$10$rWLKQnoEfDpcyhIza3x8cOQY73w6HxZsnCGHi7bcdtW3T1ZH.c3jS'),
(10, 'Cancre', 'cancre@cancre.com', '$2y$10$3jmMxYt.K7muegWojtytz.4EQVqGU/nYx47HJZyI7w/gcPjMb3Ih.'),
(12, 'Marion', 'marion@marion.com', '$2y$10$OSZoZlGmFaXC4sKJPN2NFeRm67vNC7Qw25K2EhEVbLX3e.QApJiVe'),
(13, 'lord', 'lord@lord.com', '$2y$10$lEXeX9NsfP8ralcmd6dx7.IhzKpyxwqylPsgliOUpLeLXBoOLvsHO'),
(14, 'Aya', 'aya@aya.com', '$2y$10$olLuWb1TML06OH0q0Bv0DeV4PuL1N5awQYAApXQ5R1do49MjAPmBq'),
(15, 'Ilyass', 'ilyass@ilyass.com', '$2y$10$Q95DqzoeC/ERRSH4U0NfMOXLNDTXBNmR8VxZ1kF.gyGt6TAEUBMci'),
(16, 'Alphonse', 'alphonse@alphonse.com', '$2y$10$ZZp0V4mkeN9vo1i7MWKYE.tc812hfUD7Fs6nI5i9MYEmn2RFWM5Jy'),
(17, 'Lapin', 'lapin@lapin.com', '$2y$10$XHi4IB5fHFm1GjIfiT55keaV3R/zKopDSf0tNn5g3qZrt1w26ga9C');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
