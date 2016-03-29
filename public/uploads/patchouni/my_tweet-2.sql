-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Février 2016 à 13:58
-- Version du serveur :  5.7.10
-- Version de PHP :  7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_tweet`
--

--
-- Contenu de la table `tp_favoris`
--

INSERT INTO `tp_favoris` (`id`, `user_id`, `tweet_id`, `fav_date`) VALUES
(1, 10, 6, '2016-02-18 18:55:59'),
(2, 10, 4, '2016-02-18 19:11:07'),
(3, 10, 5, '2016-02-18 19:43:25');

--
-- Contenu de la table `tp_follow`
--

INSERT INTO `tp_follow` (`id`, `follow_id`, `follower_id`, `follow_date`) VALUES
(7, 1, 2, '2016-02-18 00:00:00'),
(8, 1, 3, '2016-02-18 00:00:00'),
(9, 1, 4, '2016-02-18 00:00:00'),
(10, 1, 5, '2016-02-18 00:00:00'),
(11, 1, 7, '2016-02-18 00:00:00'),
(12, 1, 6, '2016-02-18 00:00:00'),
(13, 1, 8, '2016-02-18 00:00:00'),
(14, 1, 9, '2016-02-18 00:00:00'),
(15, 1, 10, '2016-02-18 00:00:00'),
(16, 2, 1, '2016-02-18 00:00:00'),
(17, 2, 3, '2016-02-18 00:00:00'),
(18, 2, 4, '2016-02-18 00:00:00'),
(19, 2, 5, '2016-02-18 00:00:00'),
(20, 2, 6, '2016-02-18 00:00:00'),
(61, 2, 7, '2016-02-18 00:00:00'),
(62, 2, 8, '2016-02-18 00:00:00'),
(63, 2, 9, '2016-02-18 00:00:00'),
(64, 2, 10, '2016-02-18 00:00:00'),
(65, 3, 1, '2016-02-18 00:00:00'),
(66, 3, 2, '2016-02-18 00:00:00'),
(67, 3, 4, '2016-02-18 00:00:00'),
(68, 3, 5, '2016-02-18 00:00:00'),
(69, 3, 6, '2016-02-18 00:00:00'),
(70, 3, 7, '2016-02-18 00:00:00'),
(71, 3, 8, '2016-02-18 00:00:00'),
(72, 3, 9, '2016-02-18 00:00:00'),
(73, 3, 10, '2016-02-18 00:00:00'),
(74, 4, 1, '2016-02-18 00:00:00'),
(75, 4, 2, '2016-02-18 00:00:00'),
(76, 4, 3, '2016-02-18 00:00:00'),
(77, 4, 5, '2016-02-18 00:00:00'),
(78, 4, 6, '2016-02-18 00:00:00'),
(79, 4, 7, '2016-02-18 00:00:00'),
(80, 4, 8, '2016-02-18 00:00:00'),
(81, 4, 9, '2016-02-18 00:00:00'),
(82, 4, 10, '2016-02-18 00:00:00'),
(83, 5, 1, '2016-02-18 00:00:00'),
(84, 5, 2, '2016-02-18 00:00:00'),
(85, 5, 3, '2016-02-18 00:00:00'),
(86, 5, 4, '2016-02-18 00:00:00'),
(87, 5, 6, '2016-02-18 00:00:00'),
(88, 5, 7, '2016-02-18 00:00:00'),
(89, 5, 8, '2016-02-18 00:00:00'),
(90, 5, 9, '2016-02-18 00:00:00'),
(91, 5, 10, '2016-02-18 00:00:00'),
(92, 6, 1, '2016-02-18 00:00:00'),
(93, 6, 2, '2016-02-18 00:00:00'),
(94, 6, 3, '2016-02-18 00:00:00'),
(95, 6, 4, '2016-02-18 00:00:00'),
(96, 6, 5, '2016-02-18 00:00:00'),
(97, 6, 6, '2016-02-18 00:00:00'),
(98, 6, 7, '2016-02-18 00:00:00'),
(99, 6, 8, '2016-02-18 00:00:00'),
(100, 6, 9, '2016-02-18 00:00:00'),
(101, 6, 10, '2016-02-18 00:00:00'),
(102, 7, 1, '2016-02-18 00:00:00'),
(103, 7, 2, '2016-02-18 00:00:00'),
(104, 7, 3, '2016-02-18 00:00:00'),
(105, 7, 4, '2016-02-18 00:00:00'),
(106, 7, 5, '2016-02-18 00:00:00'),
(107, 7, 6, '2016-02-18 00:00:00'),
(108, 7, 8, '2016-02-18 00:00:00'),
(109, 7, 9, '2016-02-18 00:00:00'),
(110, 7, 10, '2016-02-18 00:00:00'),
(111, 8, 1, '2016-02-18 00:00:00'),
(112, 8, 2, '2016-02-18 00:00:00'),
(113, 8, 3, '2016-02-18 00:00:00'),
(114, 8, 4, '2016-02-18 00:00:00'),
(115, 8, 5, '2016-02-18 00:00:00'),
(116, 8, 6, '2016-02-18 00:00:00'),
(117, 8, 7, '2016-02-18 00:00:00'),
(118, 8, 9, '2016-02-18 00:00:00'),
(119, 8, 10, '2016-02-18 00:00:00'),
(120, 9, 1, '2016-02-18 00:00:00'),
(121, 9, 2, '2016-02-18 00:00:00'),
(122, 9, 3, '2016-02-18 00:00:00'),
(123, 9, 4, '2016-02-18 00:00:00'),
(124, 9, 5, '2016-02-18 00:00:00'),
(125, 9, 6, '2016-02-18 00:00:00'),
(126, 9, 7, '2016-02-18 00:00:00'),
(127, 9, 8, '2016-02-18 00:00:00'),
(128, 9, 10, '2016-02-18 00:00:00'),
(129, 10, 1, '2016-02-18 00:00:00'),
(130, 10, 2, '2016-02-18 00:00:00'),
(131, 10, 3, '2016-02-18 00:00:00'),
(132, 10, 4, '2016-02-18 00:00:00'),
(133, 10, 5, '2016-02-18 00:00:00'),
(134, 10, 6, '2016-02-18 00:00:00'),
(135, 10, 7, '2016-02-18 00:00:00'),
(136, 10, 8, '2016-02-18 00:00:00'),
(137, 10, 9, '2016-02-18 00:00:00');

--
-- Contenu de la table `tp_messages`
--

INSERT INTO `tp_messages` (`id`, `content`, `destinataire_id`, `expediteur_id`, `destinataire_del`, `expediteur_del`, `view`, `view_date`, `message_date`) VALUES
(20, 'hey', 9, 10, 1, 0, 0, '2016-02-23 00:00:00', '2016-02-24 00:00:00'),
(21, 'hey', 10, 9, 0, 0, 0, '2016-02-24 00:00:00', '2016-02-23 00:00:00'),
(23, 'grhr', 10, 9, 0, 0, 0, '0000-00-00 00:00:00', '2016-02-17 12:18:34');

--
-- Contenu de la table `tp_replys`
--

INSERT INTO `tp_replys` (`id`, `user_id`, `tweet_id`, `content`, `reply_date`) VALUES
(1, 2, 3, 'c\'est la réponse', '2016-02-27 00:00:00'),
(2, 1, 3, 'encore un réponse', '2016-02-29 00:00:00'),
(4, 10, 3, 'rgr', '2016-02-19 12:02:17');

--
-- Contenu de la table `tp_retweets`
--

INSERT INTO `tp_retweets` (`id`, `user_id`, `tweet_id`, `content`, `date_retweet`) VALUES
(1, 7, 3, 'hmmmmm, c\'est trop bien!!!!', '2016-02-23 00:00:00'),
(2, 7, 4, 'petit test, voila quoi...', '2016-02-24 00:00:00'),
(3, 5, 4, 'abc def ghi jkl mno pqrs tuv wxyz ABC DEF GHI JKL MNO PQRS TUV WXYZ !"§ $%& /() =?* \'<> #|; ²³~ @`´ ©«» ¤¼× {} abc def ghi jkl mno pqrs tuv.', '2016-02-27 00:00:00'),
(4, 8, 6, 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz,', '2016-02-24 00:00:00');

--
-- Contenu de la table `tp_tweets`
--

INSERT INTO `tp_tweets` (`id`, `content`, `user_id`, `tweet_date`) VALUES
(3, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete accoun', 9, '2016-02-16 00:00:00'),
(4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et ma', 9, '2016-02-17 00:00:00'),
(5, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo', 10, '2016-02-23 00:00:00'),
(6, 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam v', 8, '2016-02-29 00:00:00'),
(7, 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the s', 7, '2016-02-04 00:00:00'),
(8, 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in.', 2, '2016-02-27 00:00:00'),
(9, 'A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alo', 1, '2016-02-26 00:00:00'),
(10, 'One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armo', 3, '2016-02-23 00:00:00');

--
-- Contenu de la table `tp_users`
--

INSERT INTO `tp_users` (`id`, `login`, `email`, `password`, `token`, `first_name`, `last_name`, `cpostal`, `adress`, `departement`, `region`, `city`, `country`, `connect`, `active`, `birthday`, `register_date`, `last_connection`, `sexe`, `cover`, `avatar`) VALUES
(1, 'sangoku', 'sangoku@ici.com', '38448ae821698a79e950161cfd59252470f7848e', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2016-02-18 00:00:00', '2016-02-18 00:00:00', NULL, NULL, NULL),
(2, 'onePunchMan', 'opm@opm.opm', '38448ae821698a79e950161cfd59252470f7848e', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2016-02-18 00:00:00', '2016-02-18 00:00:00', NULL, NULL, NULL),
(3, 'thomasAnderson', 'thomas.anderson@sion.com', '38448ae821698a79e950161cfd59252470f7848e', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2016-02-18 00:00:00', '2016-02-18 00:00:00', NULL, NULL, NULL),
(4, 'byob', 'byob@byob.byob', '38448ae821698a79e950161cfd59252470f7848e', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2016-02-18 00:00:00', '2016-02-18 00:00:00', NULL, NULL, NULL),
(5, 'test', 'test@t.fr', 'fb2e8d11eebd1df4f8627fbe7246bc2759c1d595', 'e96f7e3a7d7fea9a8f1d200fc3451af2', 'est', 'test', NULL, NULL, NULL, NULL, 'test', 'test', 0, 0, NULL, '2016-02-09 14:55:48', '2016-02-09 14:55:48', NULL, NULL, NULL),
(6, 'WarwickDavis', 'warwick.davis@h2g2.al', '38448ae821698a79e950161cfd59252470f7848e', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2016-02-18 00:00:00', '2016-02-18 00:00:00', NULL, NULL, NULL),
(7, 'root', 'root@root.fr', 'f561b1a3476aa8e5d2902044722e08bd5886c649', '40ce4314247c6b06d300b26cd79ae671', 'patchouni', 'test', NULL, NULL, NULL, NULL, 'test', 'test', 0, 0, NULL, '2016-02-09 16:34:08', '2016-02-09 16:34:08', NULL, NULL, NULL),
(8, 'patchouni', 'aka68@hotmail.fr', 'f561b1a3476aa8e5d2902044722e08bd5886c649', '04cafd561412f737e9f1bfcb3e6e3a14', 'ferz', 'zerfze', NULL, NULL, NULL, NULL, 'zrfez', 'fzerf', 0, 0, NULL, '2016-02-10 15:06:26', '2016-02-10 15:06:26', NULL, NULL, NULL),
(9, 'seraphin', 'test@gg.com', '8fb12dd21b85647e87fb251d5f49527a16fa49e6', 'b3083cd0ba5cf72b05f78a7cc4ff887a', 'fabien', 'boisset', NULL, NULL, NULL, NULL, 'lyon', 'france', 0, 0, NULL, '2016-02-16 14:01:53', '2016-02-16 14:01:53', NULL, NULL, NULL),
(10, 'mennad', 'mennad@mennad.mennad', '38448ae821698a79e950161cfd59252470f7848e', 'da1127e362b534a9281666f17c41fe98', 'mennad', 'mennad', NULL, NULL, NULL, NULL, 'mennad', 'mennad', 0, 0, NULL, '2016-02-17 11:54:47', '2016-02-17 11:54:47', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
