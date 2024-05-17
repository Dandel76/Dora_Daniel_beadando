-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 17. 17:25
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `lolbuild`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `builds`
--

CREATE TABLE `builds` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `champion` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `item1` varchar(200) NOT NULL,
  `item2` varchar(200) NOT NULL,
  `item3` varchar(200) NOT NULL,
  `item4` varchar(200) NOT NULL,
  `item5` varchar(200) NOT NULL,
  `item6` varchar(200) NOT NULL,
  `item7` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `builds`
--

INSERT INTO `builds` (`id`, `user`, `champion`, `role`, `item1`, `item2`, `item3`, `item4`, `item5`, `item6`, `item7`) VALUES
(19, 'Teszt', 'Aatrox', 'top', '3001', '3001', '3001', '3001', '3001', '3001', '3340'),
(21, 'Dandel76', 'Corki', 'top', '3001', '3001', '3001', '3001', '3001', '3001', '3340'),
(23, 'Dandel76', 'Aatrox', 'top', '3001', '1001', '3001', '3001', '3001', '3001', '3340');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `champions`
--

CREATE TABLE `champions` (
  `id` int(6) NOT NULL,
  `name` varchar(140) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `champions`
--

INSERT INTO `champions` (`id`, `name`, `tags`) VALUES
(1, 'Annie', 'mage,ranged,recommended'),
(2, 'Olaf', 'fighter,melee'),
(3, 'Galio', 'tank,support,melee'),
(4, 'TwistedFate', 'assassin,pusher,ranged'),
(5, 'XinZhao', 'fighter,assassin,melee'),
(6, 'Urgot', 'fighter,ranged'),
(7, 'LeBlanc', 'assassin,mage,ranged'),
(8, 'Vladimir', 'fighter,mage,ranged'),
(9, 'Fiddlesticks', 'mage,jungler,ranged'),
(10, 'Kayle', 'fighter,support'),
(11, 'MasterYi', 'carry,melee,recommended'),
(12, 'Alistar', 'tank,pusher,melee'),
(13, 'Ryze', 'mage,ranged,recommended'),
(14, 'Sion', 'fighter,melee'),
(15, 'Sivir', 'carry,pusher,ranged,recommended'),
(16, 'Soraka', 'support,ranged,recommended'),
(17, 'Teemo', 'support,stealth,ranged'),
(18, 'Tristana', 'carry,ranged,recommended'),
(19, 'Warwick', 'fighter,jungler,melee,recommended'),
(20, 'Nunu', 'fighter,melee,jungler,recommended'),
(21, 'MissFortune', 'ranged,carry'),
(22, 'Ashe', 'carry,ranged,recommended'),
(23, 'Tryndamere', 'carry,melee'),
(24, 'Jax', 'fighter,melee'),
(25, 'Morgana', 'mage,support,ranged'),
(26, 'Zilean', 'mage,support,ranged'),
(27, 'Singed', 'fighter,melee'),
(28, 'Evelynn', 'assassin,stealth,melee'),
(29, 'Twitch', 'carry,stealth,ranged'),
(30, 'Karthus', 'mage,ranged'),
(31, 'Chogath', 'fighter,mage,melee'),
(32, 'Amumu', 'tank,melee'),
(33, 'Rammus', 'tank,melee,recommended'),
(34, 'Anivia', 'mage,ranged'),
(35, 'Shaco', 'assassin,stealth,melee'),
(36, 'DrMundo', 'fighter,melee'),
(37, 'Sona', 'support,ranged,recommended'),
(38, 'Kassadin', 'assassin,mage,melee'),
(39, 'Irelia', 'assassin,melee'),
(40, 'Janna', 'support,ranged'),
(41, 'Gangplank', 'carry,melee'),
(42, 'Corki', 'ranged,carry'),
(43, 'Karma', 'support,ranged, mage'),
(44, 'Taric', 'tank,support,melee,recommended'),
(45, 'Veigar', 'mage,ranged'),
(48, 'Trundle', 'fighter,melee'),
(50, 'Swain', 'mage,ranged'),
(51, 'Caitlyn', 'carry,ranged'),
(53, 'Blitzcrank', 'fighter,melee'),
(54, 'Malphite', 'fighter,melee'),
(55, 'Katarina', 'assassin,melee,recommended'),
(56, 'Nocturne', 'assassin,melee'),
(57, 'Maokai', 'tank,pusher,melee'),
(58, 'Renekton', 'fighter,melee'),
(59, 'JarvanIV', 'fighter,melee'),
(60, 'Elise', 'mage,jungler,ranged,melee'),
(61, 'Orianna', 'mage,ranged'),
(62, 'Wukong', 'fighter,melee,stealth'),
(63, 'Brand', 'mage,ranged'),
(64, 'LeeSin', 'assassin,melee'),
(67, 'Vayne', 'carry,ranged,assassin,stealth'),
(68, 'Rumble', 'mage, melee, pusher'),
(69, 'Cassiopeia', 'mage,ranged'),
(72, 'Skarner', 'fighter,jungler,melee'),
(74, 'Heimerdinger', 'mage,pusher,ranged'),
(75, 'Nasus', 'fighter,pusher,melee,recommended'),
(76, 'Nidalee', 'support,pusher'),
(77, 'Udyr', 'fighter,melee,jungler'),
(78, 'Poppy', 'fighter,assassin,melee'),
(79, 'Gragas', 'fighter,melee'),
(80, 'Pantheon', 'assassin,melee'),
(81, 'Ezreal', 'carry,ranged'),
(82, 'Mordekaiser', 'fighter,pusher,melee'),
(83, 'Yorick', 'fighter,pusher,melee'),
(84, 'Akali', 'assassin,melee,stealth'),
(85, 'Kennen', 'mage,ranged'),
(86, 'Garen', 'fighter,melee,recommended'),
(89, 'Leona', 'tank,melee'),
(90, 'Malzahar', 'mage,ranged'),
(91, 'Talon', 'assassin,melee'),
(92, 'Riven', 'fighter,melee'),
(96, 'KogMaw', 'ranged,carry'),
(98, 'Shen', 'tank,support,melee'),
(99, 'Lux', 'mage,support,ranged'),
(101, 'Xerath', 'mage,ranged'),
(102, 'Shyvana', 'fighter,melee'),
(103, 'Ahri', 'assassin,mage,ranged'),
(104, 'Graves', 'carry,ranged'),
(105, 'Fizz', 'fighter,assassin,melee'),
(106, 'Volibear', 'tank,fighter,jungler,melee'),
(107, 'Rengar', 'fighter,jungler,melee,stealth'),
(110, 'Varus', 'carry,ranged'),
(111, 'Nautilus', 'tank,melee'),
(112, 'Viktor', 'mage,ranged,pusher'),
(113, 'Sejuani', 'tank,jungler,melee'),
(114, 'Fiora', 'carry,melee'),
(115, 'Ziggs', 'mage,ranged,pusher'),
(117, 'Lulu', 'support,ranged'),
(119, 'Draven', 'carry,ranged'),
(120, 'Hecarim', 'fighter,jungler,melee'),
(121, 'Khazix', 'assassin,melee,jungler,stealth'),
(122, 'Darius', 'fighter,melee'),
(126, 'Jayce', 'fighter,melee,ranged'),
(131, 'Diana', 'fighter,jungler,melee,mage'),
(133, 'Quinn', 'carry,ranged'),
(134, 'Syndra', 'mage,ranged'),
(143, 'Zyra', 'mage,pusher, ranged'),
(154, 'Zac', 'fighter,melee'),
(156, 'Aatrox', 'fighter,meele'),
(157, 'Akshan', 'ranged'),
(158, 'Aphelios', 'ranged'),
(159, 'AurelionSol', 'ranged,mage'),
(160, 'Azir', 'ranged, mage'),
(161, 'Braum', 'meele,support'),
(162, 'Camille', 'meele,fighter'),
(163, 'Ekko', 'meele, mage'),
(164, 'Gnar', 'ranged,meele,fighter'),
(165, 'Gwen', 'meele,mage'),
(166, 'Illaoi', 'meele,fighter'),
(167, 'Ivern', 'ranged,jungle,support'),
(168, 'Jhin', 'ranged,carry'),
(169, 'Jinx', 'ranged,carry'),
(170, 'Kaisa', 'ranged,carry'),
(171, 'Kalista', 'ranged,carry'),
(172, 'Kayn', 'meele,assasin,fighter,jungle'),
(173, 'Kindred', 'ranged,jungle'),
(174, 'Kled', 'meele,fighter'),
(175, 'Ksante', 'meele,tank,fighter'),
(176, 'Lillia', 'meele,mage,jungle'),
(177, 'Lissandra', 'ranged,mage'),
(178, 'Lucian', 'ranged,carry'),
(180, 'Neeko', 'ranged,mage'),
(181, 'Nilah', 'ranged,carry'),
(182, 'Ornn', 'meele,tank'),
(183, 'Pyke', 'meele,assasin,support'),
(184, 'Qiyana', 'meele,assasin'),
(185, 'Rakan', 'meele,support'),
(186, 'Reksai', 'meele,fighter,jungle'),
(187, 'Rell', 'meele,support'),
(188, 'Renata', 'ranged,support'),
(189, 'Samira', 'ranged,meele,carry'),
(190, 'Senna', 'ranged,carry,support'),
(191, 'Seraphine', 'ranged,support'),
(192, 'Sett', 'meele,fighter'),
(193, 'Sylas', 'meele,mage'),
(194, 'Tahmkench', 'meele,tank'),
(195, 'Taliyah', 'ranged,mage'),
(196, 'Velkoz', 'ranged,mage'),
(197, 'Vex', 'ranged,mage'),
(198, 'Viego', 'meele,fighter,jungle'),
(199, 'Xayah', 'ranged,carry'),
(200, 'Yasuo', 'meele,carry'),
(201, 'Yone', 'meele,carry'),
(238, 'Zed', 'assassin,melee'),
(254, 'Vi', 'fighter,melee'),
(267, 'Nami', 'support,ranged'),
(412, 'Thresh', 'tank,ranged,support');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `items`
--

CREATE TABLE `items` (
  `id` int(6) NOT NULL,
  `name` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `items`
--

INSERT INTO `items` (`id`, `name`) VALUES
(1001, 'Boots of Speed'),
(1004, 'Faerie Charm'),
(1006, 'Rejuvenation Bead'),
(1011, 'Giant\'s Belt'),
(1018, 'Cloak of Agility'),
(1026, 'Blasting Wand'),
(1027, 'Sapphire Crystal'),
(1028, 'Ruby Crystal'),
(1029, 'Cloth Armor'),
(1031, 'Chain Vest'),
(1033, 'Null-Magic Mantle'),
(1036, 'Long Sword'),
(1037, 'Pickaxe'),
(1038, 'B. F. Sword'),
(1039, 'Hunter\'s Machete'),
(1042, 'Dagger'),
(1043, 'Recurve Bow'),
(1051, 'Brawler\'s Gloves'),
(1052, 'Amplifying Tome'),
(1053, 'Vampiric Scepter'),
(1054, 'Doran\'s Shield'),
(1055, 'Doran\'s Blade'),
(1056, 'Doran\'s Ring'),
(1057, 'Negatron Cloak'),
(1058, 'Needlessly Large Rod'),
(2003, 'Health Potion'),
(3001, 'Abyssal Scepter'),
(3003, 'Archangel\'s Staff'),
(3004, 'Manamune'),
(3006, 'Berserker\'s Greaves'),
(3009, 'Boots of Swiftness'),
(3020, 'Sorcerer\'s Shoes'),
(3022, 'Frozen Mallet'),
(3023, 'Twin Shadows'),
(3024, 'Glacial Shroud'),
(3025, 'Iceborn Gauntlet'),
(3026, 'Guardian Angel'),
(3027, 'Rod of Ages'),
(3028, 'Chalice of Harmony'),
(3031, 'Infinity Edge'),
(3035, 'Last Whisper'),
(3037, 'Mana Manipulator'),
(3040, 'Seraph\'s Embrace'),
(3041, 'Mejai\'s Soulstealer'),
(3042, 'Muramana'),
(3044, 'Phage'),
(3046, 'Phantom Dancer'),
(3047, 'Ninja Tabi'),
(3050, 'Zeke\'s Herald'),
(3056, 'Ohmwrecker'),
(3057, 'Sheen'),
(3060, 'Banner of Command'),
(3065, 'Spirit Visage'),
(3067, 'Kindlegem'),
(3068, 'Sunfire Cape'),
(3069, 'Shurelya\'s Reverie'),
(3070, 'Tear of the Goddess'),
(3071, 'The Black Cleaver'),
(3072, 'The Bloodthirster'),
(3074, 'Ravenous Hydra (Melee Only)'),
(3075, 'Thornmail'),
(3077, 'Tiamat (Melee Only)'),
(3078, 'Trinity Force'),
(3082, 'Warden\'s Mail'),
(3083, 'Warmog\'s Armor'),
(3084, 'Overlord\'s Bloodmail'),
(3085, 'Runaan\'s Hurricane (Ranged Only)'),
(3086, 'Zeal'),
(3087, 'Statikk Shiv'),
(3089, 'Rabadon\'s Deathcap'),
(3090, 'Wooglet\'s Witchcap'),
(3091, 'Wit\'s End'),
(3092, 'Shard of True Ice'),
(3093, 'Avarice Blade'),
(3096, 'Philosopher\'s Stone'),
(3097, 'Emblem of Valor'),
(3098, 'Kage\'s Lucky Pick'),
(3100, 'Lich Bane'),
(3101, 'Stinger'),
(3102, 'Banshee\'s Veil'),
(3105, 'Aegis of the Legion'),
(3106, 'Madred\'s Razors'),
(3107, 'Runic Bulwark'),
(3108, 'Fiendish Codex'),
(3110, 'Frozen Heart'),
(3111, 'Mercury\'s Treads'),
(3114, 'Malady'),
(3115, 'Nashor\'s Tooth'),
(3116, 'Rylai\'s Crystal Scepter'),
(3117, 'Boots of Mobility'),
(3123, 'Executioner\'s Calling'),
(3124, 'Guinsoo\'s Rageblade'),
(3128, 'Deathfire Grasp'),
(3131, 'Sword of the Divine'),
(3134, 'The Brutalizer'),
(3135, 'Void Staff'),
(3136, 'Haunting Guise'),
(3139, 'Mercurial Scimitar'),
(3140, 'Quicksilver Sash'),
(3141, 'Sword of the Occult'),
(3142, 'Youmuu\'s Ghostblade'),
(3143, 'Randuin\'s Omen'),
(3144, 'Bilgewater Cutlass'),
(3145, 'Hextech Revolver'),
(3146, 'Hextech Gunblade'),
(3151, 'Liandry\'s Torment'),
(3152, 'Will of the Ancients'),
(3153, 'Blade of the Ruined King'),
(3154, 'Wriggle\'s Lantern'),
(3155, 'Hexdrinker'),
(3156, 'Maw of Malmortius'),
(3157, 'Zhonya\'s Hourglass'),
(3158, 'Ionian Boots of Lucidity'),
(3159, 'Grez\'s Spectral Lantern'),
(3165, 'Morellonomicon'),
(3166, 'Bonetooth Necklace'),
(3172, 'Zephyr'),
(3173, 'Eleisa\'s Miracle'),
(3174, 'Athene\'s Unholy Grail'),
(3180, 'Odyn\'s Veil'),
(3181, 'Sanguine Blade'),
(3184, 'Entropy'),
(3185, 'The Lightbringer'),
(3186, 'Kitae\'s Bloodrazor'),
(3187, 'Hextech Sweeper'),
(3188, 'Blackfire Torch'),
(3190, 'Locket of the Iron Solari'),
(3196, 'Augment: Power'),
(3197, 'Augment: Gravity'),
(3198, 'Augment: Death'),
(3200, 'The Hex Core'),
(3206, 'Spirit of the Spectral Wraith'),
(3207, 'Spirit of the Ancient Golem'),
(3209, 'Spirit of the Elder Lizard'),
(3222, 'Mikael\'s Crucible'),
(3340, 'Totem Ward'),
(3363, 'Farsight Ward'),
(3364, 'Control Ward');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `from_user` varchar(60) NOT NULL,
  `to_user` varchar(60) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- A tábla adatainak kiíratása `messages`
--

INSERT INTO `messages` (`id`, `timestamp`, `from_user`, `to_user`, `message`) VALUES
(13, '2024-05-10 19:14:17', 'Teszt', 'Dandel76', 'Szia'),
(14, '2024-05-10 19:26:22', 'Dandel76', 'Teszt', 'dsadsa'),
(15, '2024-05-11 11:05:01', 'Teszt2', 'Dandel76', 'Szniasz'),
(16, '2024-05-11 11:05:35', 'Dandel76', 'Teszt2', 'ne írogass'),
(17, '2024-05-17 14:31:13', 'Dandel76', 'Teszt', 'dsa'),
(18, '2024-05-17 14:41:17', 'Dandel76', 'Teszt', 'dsa'),
(19, '2024-05-17 15:03:39', 'Dandel76', 'Teszt', 'dsa'),
(20, '2024-05-17 15:09:46', 'Dandel76', 'Teszt', 'dsadsa'),
(21, '2024-05-17 15:12:51', 'Dandel76', 'Teszt', 'dsa'),
(22, '2024-05-17 15:15:36', 'Dandel76', 'Teszt', 'dsadsa'),
(23, '2024-05-17 15:23:45', 'Dandel76', 'Teszt', 'dsa');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `shortname` varchar(20) NOT NULL,
  `longname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `roles`
--

INSERT INTO `roles` (`id`, `shortname`, `longname`) VALUES
(1, 'top', 'Felső ösvény'),
(2, 'jg', 'Dzsungel'),
(3, 'mid', 'Középső ösvény'),
(4, 'adc', 'Alső ösvény'),
(5, 'sup', 'Támogató');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `nem` varchar(10) NOT NULL,
  `szuldat` date NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `jog` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pswd`, `nem`, `szuldat`, `profilepic`, `jog`) VALUES
(1, 'Dandel76', 'Dandelke@gmail.com', '$2y$10$40ZrjXus51STOSnVadkQtOgIa9KC0vZqch3UMts2V2DzkX3H/VnYO', 'ferfi', '2002-06-10', '../img/profilepic/0a67746added8789e807974cd2f48c4e.jpg', 'admin'),
(10, 'Teszt', 'tesztelek@gmail.com', '$2y$10$PPr0Kz/RBiH7jWPazjoviuFozbWyadhHJCNHBdA4nj7yFTFyQwB/K', 'ferfi', '2002-06-10', '../img/lol.png', 'user'),
(11, 'Teszt2', 'tesztelek2@gmail.com', '$2y$10$OqP2nlmgi7BW/BBorQh/fe4PTBYFyrU8TGE47bTqHlO.2q7.hL4We', 'no', '1994-03-02', '../img/lol.png', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `builds`
--
ALTER TABLE `builds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- A tábla indexei `champions`
--
ALTER TABLE `champions`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_user` (`from_user`),
  ADD KEY `to_user` (`to_user`);

--
-- A tábla indexei `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `builds`
--
ALTER TABLE `builds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
