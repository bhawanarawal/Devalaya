-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2025 at 08:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devalaya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `details` text NOT NULL,
  `event_date` date NOT NULL,
  `contact` text NOT NULL,
  `temple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `details`, `event_date`, `contact`, `temple_id`) VALUES
(15, 'Deijat Mela', '                                                                                                                                                                                                                                                                                                                                                           Ugratara Deijat Mela in Dadeldhura is celebrated on the full moon night (Ratedi) and second day (Diusedi) of Kartik Purnima, which falls between mid-October and mid-November On Ashtami, the eighth day of the festival,devotees sacrifice a cow within the temple grounds. Locals exchange wedding gifts and celebrate late into the night.                                                                                                                                                                                                                                                                                                                 ', '2000-10-01', '9800670012', 8),
(16, 'Mahayagya ceremonies', '                                                                    Annual Mahayagya ceremonies bring people together, raising funds for religious tourism development while celebrating the regions shared heritage. As you explore the grounds, you may stumble upon a festival or ritual, offering a unique glimpse into local traditions and customs.                                                                                    ', '2000-01-11', '9678543812', 20),
(17, 'Melauli mela', '                                                                                                                                The Melauli Mela, held at the Melauli Bhagwati Temple in Baitadi, particularly during Kartik Shukla Chaturdashi and Purnima (October-November).  The mela features colorful processions, traditional music and dances, and captivating cultural performances.  A highlight is the Dhami ceremony, a ritualistic fire-walking display.                                                                                                     ', '2000-11-01', '9854321000', 18),
(18, 'Jaat Parva', '                                                                                         The Khat Jatra Mela, also known as Jaat Parva, is a grand religious festival held at the Shaileshwari Temple in Doti, Nepal, every 12 years.  Dedicated to Goddess Shaileshwari, the mela features a spectacular procession where the deitys idol is carried amidst traditional music, dances, and throngs of devotees.                   ', '2000-11-02', '9543219001', 17),
(19, 'Badi Malika Mela', '                                                                                                                        The Badimalika Mela is a significant religious festival held at the Badimalika Temple in Bajura, Nepal.  The mela takes place twice a year, with the main celebration occurring during the full moon of Bhadra (August-September).  Devotees trek for days through challenging terrain to reach the temple, seeking blessings and participating in prayers and rituals vibrant display of faith.                                                                                                            ', '2000-08-02', '9848484848', 9),
(20, 'Bijyanath Mela', '                                                                                The Bijyanath Mela is a significant religious festival held at the Bijyanath Temple in Silgadhi, Doti, Nepal.  It honors Lord Shiva and attracts devotees from far and wide. The mela typically takes place during Shivaratri (usually February/March). The Bijyanath Mela is an important expression of faith and community in the region.                                                                        ', '2000-02-01', '9800116677', 17);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT 'anonymous_user',
  `temple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `username`, `temple_id`) VALUES
(5, 'anonymous user', 8),
(6, 'anonymous user', 9),
(9, 'bhwbi.rawal@gmail.com', 8),
(28, 'anonymous user', 9);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `temple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_path`, `temple_id`) VALUES
(33, './temple_gallery/22-01-2025-1737565339-ugratara-1.jpg', 8),
(34, './temple_gallery/22-01-2025-1737565339-ugratara-2.jpg', 8),
(35, './temple_gallery/22-01-2025-1737565339-ugratara-3.jpg', 8),
(36, './temple_gallery/22-01-2025-1737565339-ugratara-4.png', 8),
(37, './temple_gallery/22-01-2025-1737565339-ugratara-5.jpg', 8),
(38, './temple_gallery/22-01-2025-1737565339-ugratara-6.png', 8),
(39, './temple_gallery/22-01-2025-1737565339-ugratara-7.jpg', 8),
(40, './temple_gallery/22-01-2025-1737565339-ugratara-8.jpg', 8),
(41, './temple_gallery/22-01-2025-1737565339-ugratara-9.jpg', 8),
(42, './temple_gallery/22-01-2025-1737565339-ugratara-10.webp', 8),
(43, './temple_gallery/22-01-2025-1737565339-ugratara-11.webp', 8),
(44, './temple_gallery/22-01-2025-1737565339-ugratara-12.webp', 8),
(45, './temple_gallery/22-01-2025-1737567538-badimalika.jpg', 9),
(46, './temple_gallery/22-01-2025-1737567538-badimalika-1.webp', 9),
(47, './temple_gallery/22-01-2025-1737567538-badimalika-3.jpg', 9),
(48, './temple_gallery/22-01-2025-1737567538-badimalika-4.jpg', 9),
(49, './temple_gallery/22-01-2025-1737567538-badimalika-5.jpg', 9),
(50, './temple_gallery/22-01-2025-1737567538-badimalika-6.jpg', 9),
(77, './temple_gallery/26-01-2025-1737906336-shaileshwori-7.jpeg', 17),
(78, './temple_gallery/26-01-2025-1737906336-shaileshwori-2.jpg', 17),
(79, './temple_gallery/26-01-2025-1737906336-shaileshwori-3.jpg', 17),
(80, './temple_gallery/26-01-2025-1737906336-shaileshwori-4.jpeg', 17),
(81, './temple_gallery/26-01-2025-1737906336-shaileshwori-6.jpeg', 17),
(82, './temple_gallery/26-01-2025-1737906336-shaileshwori-7.jpeg', 17),
(83, './temple_gallery/26-01-2025-1737906336-shaileshwori-8.jpeg', 17),
(84, './temple_gallery/26-01-2025-1737906336-shaileswori.jpg', 17),
(85, './temple_gallery/26-01-2025-1737906336-shaileswori-5.jpeg', 17),
(86, './temple_gallery/26-01-2025-1737906336-shilgadhi-9.jpg', 17),
(87, './temple_gallery/26-01-2025-1737906336-shilgadhi-10.jpg', 17),
(88, './temple_gallery/26-01-2025-1737906336-shilgadhi-11.jpg', 17),
(89, './temple_gallery/26-01-2025-1737906336-shilgadhi-12.jpg', 17),
(90, './temple_gallery/26-01-2025-1737906336-shilgadhi-13.jpg', 17),
(91, './temple_gallery/26-01-2025-1737906479-shaile.jpeg', 17),
(92, './temple_gallery/26-01-2025-1737907522-melauli.png', 18),
(93, './temple_gallery/26-01-2025-1737907522-melauli-1.jpeg', 18),
(94, './temple_gallery/26-01-2025-1737907522-melauli-2.jpeg', 18),
(95, './temple_gallery/26-01-2025-1737907522-melauli-3.jpeg', 18),
(96, './temple_gallery/26-01-2025-1737907522-melauli-4.jpeg', 18),
(97, './temple_gallery/26-01-2025-1737907522-melauli-5.jpeg', 18),
(98, './temple_gallery/26-01-2025-1737907522-melauli-6.jpeg', 18),
(99, './temple_gallery/26-01-2025-1737907522-melauli-7.jpeg', 18),
(100, './temple_gallery/26-01-2025-1737907522-melauli-8.jpeg', 18),
(101, './temple_gallery/26-01-2025-1737907522-melauli-9.jpeg', 18),
(102, './temple_gallery/26-01-2025-1737907523-melauli-10.jpeg', 18),
(103, './temple_gallery/26-01-2025-1737908308-triveni.jpg', 19),
(104, './temple_gallery/26-01-2025-1737908308-triveni-1.jpg', 19),
(105, './temple_gallery/26-01-2025-1737908308-triveni-2.jpeg', 19),
(106, './temple_gallery/26-01-2025-1737908308-triveni-3.jpeg', 19),
(107, './temple_gallery/26-01-2025-1737908308-triveni-4.jpeg', 19),
(108, './temple_gallery/26-01-2025-1737908308-triveni-5.jpeg', 19),
(109, './temple_gallery/26-01-2025-1737908308-triveni-6.jpg', 19),
(110, './temple_gallery/26-01-2025-1737908308-triveni-7.jpg', 19),
(111, './temple_gallery/26-01-2025-1737908308-triveni-8.jpg', 19),
(112, './temple_gallery/26-01-2025-1737908308-triveni-9.jpg', 19),
(113, './temple_gallery/26-01-2025-1737910722-shivpuri.jpg', 20),
(114, './temple_gallery/26-01-2025-1737910722-shivpuri-1.jpeg', 20),
(115, './temple_gallery/26-01-2025-1737910722-shivpuri-2.jpeg', 20),
(116, './temple_gallery/26-01-2025-1737910722-shivpuri-4.jpeg', 20),
(117, './temple_gallery/26-01-2025-1737910722-shivpuri-5.jpeg', 20),
(118, './temple_gallery/26-01-2025-1737910722-shivpuri-6.jpeg', 20),
(119, './temple_gallery/26-01-2025-1737910722-shivpuri-7.jpeg', 20),
(120, './temple_gallery/26-01-2025-1737910722-shivpuri-8.jpeg', 20),
(121, './temple_gallery/26-01-2025-1737910722-shivpuri-10.jpeg', 20),
(122, './temple_gallery/26-01-2025-1737910722-shivpuri-11.jpeg', 20),
(123, './temple_gallery/26-01-2025-1737910722-shivpuri-12.jpeg', 20),
(124, './temple_gallery/26-01-2025-1737910722-shivpuri-13.jpeg', 20),
(125, './temple_gallery/26-01-2025-1737910722-shivpuri-14.jpeg', 20),
(126, './temple_gallery/26-01-2025-1737913269-trip - Copy.jpeg', 21),
(127, './temple_gallery/26-01-2025-1737913269-trip.jpeg', 21),
(128, './temple_gallery/26-01-2025-1737913269-tripura - Copy.jpeg', 21),
(129, './temple_gallery/26-01-2025-1737913269-tripura.jpeg', 21),
(130, './temple_gallery/26-01-2025-1737913269-tripura-2 - Copy.jpeg', 21),
(131, './temple_gallery/26-01-2025-1737913269-tripura-3 - Copy.jpeg', 21),
(132, './temple_gallery/26-01-2025-1737913269-tripura-4 - Copy.jpeg', 21),
(133, './temple_gallery/26-01-2025-1737913269-tripura-4.jpeg', 21),
(134, './temple_gallery/26-01-2025-1737913269-tripura-5 - Copy.jpeg', 21),
(135, './temple_gallery/26-01-2025-1737913269-tripura-5.jpeg', 21),
(136, './temple_gallery/26-01-2025-1737913269-tripura-6 - Copy.jpeg', 21),
(137, './temple_gallery/26-01-2025-1737913269-tripura-6.jpeg', 21),
(138, './temple_gallery/26-01-2025-1737913269-tripura-7 - Copy.jpeg', 21),
(139, './temple_gallery/26-01-2025-1737913269-tripura-7.jpeg', 21),
(140, './temple_gallery/26-01-2025-1737913269-tripura-8 - Copy.jpeg', 21),
(141, './temple_gallery/26-01-2025-1737913269-tripura-8.jpeg', 21),
(142, './temple_gallery/26-01-2025-1737913269-tripura-9.jpg', 21),
(143, './temple_gallery/26-01-2025-1737913892-baij.jpeg', 22),
(144, './temple_gallery/26-01-2025-1737913892-baij-1.jpeg', 22),
(145, './temple_gallery/26-01-2025-1737913892-baij-2.jpeg', 22),
(146, './temple_gallery/26-01-2025-1737913892-baij-3.jpeg', 22),
(147, './temple_gallery/26-01-2025-1737913892-baij-4.jpeg', 22),
(148, './temple_gallery/26-01-2025-1737913892-baij-5.jpeg', 22),
(149, './temple_gallery/26-01-2025-1737913892-baij-6.jpeg', 22),
(160, './temple_gallery/17-02-2025-1739813898-par-1.jpg', 23),
(161, './temple_gallery/17-02-2025-1739813898-par-2.jpg', 23),
(163, './temple_gallery/17-02-2025-1739813898-par-4.jpg', 23),
(164, './temple_gallery/17-02-2025-1739813898-par-5.jpg', 23),
(165, './temple_gallery/17-02-2025-1739813898-par-6.jpeg', 23),
(166, './temple_gallery/17-02-2025-1739813898-par-8.jpeg', 23),
(167, './temple_gallery/17-02-2025-1739813898-par-9.jpeg', 23),
(168, './temple_gallery/17-02-2025-1739813898-par-10.jpeg', 23),
(169, './temple_gallery/17-02-2025-1739813898-par-11.jpeg', 23),
(170, './temple_gallery/17-02-2025-1739813898-par-12.jpeg', 23),
(171, './temple_gallery/17-02-2025-1739813898-par-13.jpeg', 23),
(172, './temple_gallery/17-02-2025-1739813898-par-14.jpeg', 23),
(185, './temple_gallery/17-02-2025-1739816433-ghatal.webp', 24),
(186, './temple_gallery/17-02-2025-1739816433-ghatal-1.webp', 24),
(187, './temple_gallery/17-02-2025-1739816433-ghatal-2.webp', 24),
(188, './temple_gallery/17-02-2025-1739816433-ghatal-3.webp', 24),
(189, './temple_gallery/17-02-2025-1739816433-ghatal-4.webp', 24),
(190, './temple_gallery/17-02-2025-1739816433-ghatal-5.webp', 24),
(191, './temple_gallery/17-02-2025-1739816433-ghatal-6.jpeg', 24),
(192, './temple_gallery/17-02-2025-1739816433-ghatal-7.jpeg', 24),
(193, './temple_gallery/17-02-2025-1739816433-ghatal-8.jpeg', 24),
(194, './temple_gallery/17-02-2025-1739816433-ghatal-9.jpeg', 24),
(195, './temple_gallery/17-02-2025-1739816433-ghatal-10.jpeg', 24),
(196, './temple_gallery/17-02-2025-1739816433-ghatal-11.jpeg', 24),
(197, './temple_gallery/17-02-2025-1739816433-ghatal-12.jpeg', 24),
(198, './temple_gallery/17-02-2025-1739816970-bhageswor.webp', 25),
(199, './temple_gallery/17-02-2025-1739816970-bhageswor-1.webp', 25),
(200, './temple_gallery/17-02-2025-1739816970-bhageswor-2.webp', 25),
(204, './temple_gallery/17-02-2025-1739817871-beheda.jpg', 27),
(205, './temple_gallery/17-02-2025-1739817871-beheda-1.jpeg', 27),
(206, './temple_gallery/17-02-2025-1739817871-beheda-2.jpeg', 27),
(207, './temple_gallery/17-02-2025-1739817871-beheda-3.jpeg', 27),
(208, './temple_gallery/17-02-2025-1739817871-beheda-4.jpeg', 27),
(209, './temple_gallery/17-02-2025-1739817871-beheda-5.jpeg', 27),
(210, './temple_gallery/17-02-2025-1739817871-beheda-6.jpeg', 27),
(211, './temple_gallery/17-02-2025-1739817871-beheda-7.jpeg', 27),
(212, './temple_gallery/17-02-2025-1739817871-beheda-8.jpeg', 27),
(213, './temple_gallery/17-02-2025-1739817871-beheda-9.jpeg', 27);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `source` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `quote`, `source`) VALUES
(9, 'You have a right to perform your prescribed duties, but you are not entitled to the fruits of your actions. Never consider yourself to be the cause of the results of your activities, nor be attached to inaction.', 'Bhagavad Gita'),
(10, 'Whenever there is a decline in righteousness and an increase in unrighteousness, O Arjuna, at that time I manifest myself on earth.', 'Bhagavad Gita'),
(11, 'When you are in doubt, it is always better to choose the path of truth', 'Mahabharata, Shanti Parva'),
(12, 'Meditate upon me, O Arjuna, with the mind and the senses under control, and free from all desires and distractions.', 'Shiva Purana'),
(13, 'A son should never abandon his father, nor a wife her husband, nor a brother his brother. The relationships we form are sacred.', 'Ramayana, Ayodhya'),
(14, 'The soul is neither born, and nor does it die; it is eternal, imperishable, and timeless', 'Bhagavad Gita'),
(15, 'When all hope is lost, and there is no way out, perseverance alone will keep you moving forward.', 'Mahabharata'),
(16, 'By offering your thoughts, deeds, and life in the service of the Divine, you will find yourself free from fear and doubt', 'Shiva Purana'),
(17, 'Dharma is the pillar of the world. Without dharma, the world is bound to fall into chaos.', 'Ramayana'),
(18, 'You are that, you are the one eternal truth, the Atman, which is beyond all names and forms.', 'Chandogya Upanishad'),
(19, 'The body is like a worn-out garment; it is the soul that never changes', ' Bhagavad Gita / Upanishads');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `commented_by` text NOT NULL,
  `temple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `commented_by`, `temple_id`) VALUES
(9, 3, '', 'anonymous user', 17),
(10, 5, '', 'anonymous user', 18),
(11, 3, '', 'anonymous user', 20),
(12, 2, '', 'anonymous user', 9),
(13, 3, '', 'anonymous user', 19),
(14, 5, '', 'anonymous user', 8),
(15, 4, '', 'Bhawana', 8);

-- --------------------------------------------------------

--
-- Table structure for table `temple`
--

CREATE TABLE `temple` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `details` text NOT NULL,
  `address` text NOT NULL,
  `deity` text NOT NULL,
  `made_year` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temple`
--

INSERT INTO `temple` (`id`, `name`, `details`, `address`, `deity`, `made_year`) VALUES
(8, 'Ugratara', '                                                                                Ugratara Bhagwati Temple is located in Amargadhi Municipality in Dadeldhura district. This temple is considered to be one of the 9 temples of Bhagwati in the far west of Nepal. Ugratara Bhagwati temple is built in pagoda style. No authentic inscription has been found regarding the origin of Ugratara temple. However, the legend of the origin of Ugratara Bhagwati Temple is interesting.\r\n                                                             For many years, Sanki caste lived in Latauli village near the place where Ugratara Bhagwati was located. Which is also clear from the shape of the current map. Around the present Ugratara Bhagwati temple, the Sanki castes of Latauli used to do agricultural work.\r\n\r\nOne day, a farmer of the same Sanki caste was ploughing, and the blade of the plow stuck in a stone, and blood flowed continuously from the stone, even though the Sanki tried many times to stop the blood, it did not stop. When the blood came in abundance, the river of blood started to flow. Even now this river is known by the name of Talanvakhola of this temple. To stop the bleeding in this way, when the same farmer brought Khichdi (made of meat) to the wound from the same stone, the bleeding stopped. After that, the stone was protected and the temple was built. That farmer became the priest there.\r\n\r\n                                                                     Ugratara comes alive with vivid rituals and traditions during the Deijat Mela. Each morning, processions bearing the goddess’s idol make their way to the temple from surrounding villages.\r\n\r\nPilgrims express devotion through ecstatic singing and dancing. At night, the dark hills echo with the blowing of conch shells and clanging damau and ruising cymbals. On Ashtami, the eighth day of the festival, devotees sacrifice a cow within the temple grounds.\r\n\r\nThe Mela also features more lighthearted traditions. Dozens of Hindu couples arrive to get married at the auspicious Ugratara temple. Locals exchange wedding gifts and celebrate late into the night. For many pilgrims, visiting Ugratara provides a rare chance to reconnect with far-flung family and friends.\r\n\r\n                                                                        ', ' Amargadhi Municipality, Dadeldhura District, Far-Western Nepal', 'Goddess Durga', 'Ugratara Bhagwati Temple is located in Amargadhi Municipality in Dadeldhura district. This temple is considered to be one of the 9 temples of Bhagwati in the far west of Nepal. Ugratara Bhagwati temple is built in pagoda style. No authentic inscription has been found regarding the origin of Ugratara temple. However, the legend of the origin of Ugratara Bhagwati Temple is interesting.Pilgrims express devotion through ecstatic singing and dancing. At night, the dark hills echo with the blowing of conch shells and clanging damau and ruising cymbals. On Ashtami, the eighth day of the festival, devotees sacrifice a cow within the temple grounds.  The Mela also features more lighthearted traditions. Dozens of Hindu couples arrive to get married at the auspicious Ugratara temple. Locals exchange wedding gifts and celebrate late into the night. For many pilgrims, visiting Ugratara provides a rare chance to reconnect with far-flung family and friends.'),
(9, 'Badimalika Temple', '                                        Badimalika Temple is a Hindu temple. It is located in Triveni Municipality, Bajura district of Sudurpashchim Province. It is one of the major temples in Nepal. It is dedicated to Bhagwati. Malika Chaturdashi is its major festival. It is served by two priests, one representing the Kalikot district, and the other Bajura district . Badimalika Triveni Patan .\r\nAccording to Hindu legend, when Sati Devis father Daksha Prajapati was performing a yagya, he invited all the Gods except Mahadev to the ceremony. Sati went to her fathers yagya ceremony and asked him why he had not invited her husband. Daksha Prajapati answered that Mahadev drank alcohol, smoked ganja, slept in cemeteries, wore a serpent around his neck, had dreadlocks, covered his body with ash, and wore tiger hide, hence he was unsuitable to attend such an important yagya. Unable to tolerate this insult to her husband, Sati jumped into the yagya fire and gave up her life.\r\n\r\nMahadev was so angered by her death that he sent Birbhadra and Bhoot gana to kill Daksha Prajapati and destroy the yagya. After exacting his vengeance, Mahadev started to mourn his wife. Mahadev traveled across the world carrying Satis corpse. During this time, Vishnu released his Sudarshan chakra and wounded Satis body so that it could be infested by insects and rot. As Satis body started to disintegrate, the ground on which her body parts fell became Shakti Peethas, places of worship. In this process, her left shoulder fell on the Mallagiri mountain. Mallagiri was then referred to as Malika.\r\nThe primary festival celebrated at Badimalika Temple is Malika Chaturdashi, attracting numerous devotees who partake in rituals and prayers. The temple is traditionally served by two priests, one representing the Kalikot District and the other from Bajura District.                                    ', ' Triveni Municipality, Bajura District', 'Goddess Bhagwati, also known as Malika, a manifestation of Shakti', ' Badimalika Temple is a Hindu temple. It is located in Triveni Municipality, Bajura district of Sudurpashchim Province. It is one of the major temples in Nepal. It is dedicated to Bhagwati. Malika Chaturdashi is its major festival. It is served by two priests, one representing the Kalikot district, and the other Bajura district . Badimalika Triveni Patan . According to Hindu legend, when Sati Devis father Daksha Prajapati was performing a yagya, he invited all the Gods except Mahadev to the ceremony. Sati went to her fathers yagya ceremony and asked him why he had not invited her husband. Daksha Prajapati answered that Mahadev drank alcohol, smoked ganja, slept in cemeteries, wore a serpent around his neck, had dreadlocks, covered his body with ash, and wore tiger hide, hence he was unsuitable to attend such an important yagya. Unable to tolerate this insult to her husband, Sati jumped into the yagya fire and gave up her life.'),
(17, 'Saileshwori Temple', '                                                                                Saileshwori Temple is one of the most revered religious sites in the Far-Western region of Nepal, located in Dipayal Silgadhi, the district headquarters of Doti District in Sudurpashchim Province. The temple is dedicated to the goddess Saileshwori, who is considered an incarnation of Goddess Parvati, the consort of Lord Shiva in Hindu mythology.\r\n\r\nThe temple holds significant cultural and spiritual importance for the local population and devotees from surrounding regions. It is believed that the goddess Saileshwori has the power to grant wishes and protect her devotees from misfortunes. As a result, the temple attracts a large number of pilgrims, especially during festivals and religious occasions.\r\n\r\nThe architecture of Saileshwori Temple reflects traditional Nepali temple design, with a pagoda-style structure and intricate wood carvings. The temple complex also includes smaller shrines dedicated to other deities, adding to its religious significance.\r\n\r\nThe temple is a focal point during major Hindu festivals like Dashain, and Tihar, and especially during the Navaratri festival, when thousands of devotees gather to offer prayers and participate in rituals. The temple’s location in the hilly town of Silgadhi also offers a serene and picturesque environment, with views of the surrounding mountains and valleys.\r\n\r\nIn addition to its religious importance, Saileshwori Temple plays a vital role in the cultural life of the people in Doti and the Far-Western region, serving as a center for various cultural activities and traditional practices. The temple is not only a place of worship but also a symbol of the rich cultural heritage of the Far-Western hills of Nepal.\r\n\r\nSaileshwori Temple is situated in Dipayal Silgadhi Municipality-6, Doti region of Nepal. It is one of the holy and religious temples of the Far West region. Goddess Saileswori is another structure among numerous others and individuals have extraordinary confidence in her, similar to some other types of Bhagwati/Durga,\r\n\r\nIt is assumed that the goddess would satisfy their predetermination wishes. On the occasion of Doli Jatra, Krishna Janmashtami, and Dashain a huge Jatra occurred in this temple. So Saileshwori temple should be visited once in life.The temple’s origins are steeped in legend and mythology. According to local belief, the goddess Saileshwori is a manifestation of Goddess Parvati, who, in this form, descended to protect the land and its people. The temple is said to have been established centuries ago, though the exact date of its construction is not well-documented. It is one of the 64 Shakti Peethas, where parts of Goddess Sati are believed to have fallen, making it a highly sacred site in the Shakti tradition of Hinduism.The temple is a center for various religious activities throughout the year. Daily rituals include the offering of flowers, fruits, and other items to the goddess. Special ceremonies are held during major Hindu festivals like Dashain and Tihar, where the temple becomes a focal point for community celebrations.\r\n\r\nNavaratri, the nine-night festival dedicated to the worship of the goddess, is especially significant at Saileshwori  Temple. During this period, the temple sees a surge of pilgrims who participate in rituals, chants, and the lighting of lamps (diyas) to honor the goddess. Animal sacrifices, a traditional practice in many parts of Nepal, are also performed at the temple during certain festivals, though this practice has been a subject of controversy and changing attitudes in recent years.                                                                        ', ' Dipayal Silgadhi Municipality-6, Doti', 'Goddess Saileshwori', 'Saileshwori Temple is one of the most revered religious sites in the Far-Western region of Nepal, located in Dipayal Silgadhi, the district headquarters of Doti District in Sudurpashchim Province. The temple is dedicated to the goddess Saileshwori, who is considered an incarnation of Goddess Parvati, the consort of Lord Shiva in Hindu mythology.  The temple holds significant cultural and spiritual importance for the local population and devotees from surrounding regions. It is believed that the goddess Saileshwori has the power to grant wishes and protect her devotees from misfortunes. As a result, the temple attracts a large number of pilgrims, especially during festivals and religious occasions.  The architecture of Saileshwori Temple reflects traditional Nepali temple design, with a pagoda-style structure and intricate wood carvings. The temple complex also includes smaller shrines dedicated to other deities, adding to its religious significance.'),
(18, 'Melauli Bhagwati temple', '                                        The Melauli Bhagwati temple is Considered the famous Shaktipeeth, the main worship of Melauli Bhagwati takes place on the Katrtik Shukla Chaturdashi, Asauj Navratri and Chaitra Navratri.\r\n\r\nThe authority of the priest extends through Ojha, Joshi, Bagh, Paintola to the Bhatta Brahmins of Pali. A fair is also held here during the festival of Gaura and devotees come all day long, but the festival held on the days of Kartik Shukla Chaturdashi and Purnima is remarkable.\r\n\r\nThere is a lot of enthusiasm in the devotees who come from different parts of Nepal and India to fill the fair in thousands. Deuda connoisseurs are addicted to Deuda day and night. Dol Jatra is also important. On the morning of the full moon at the time of sunrise, pilgrims come from far and wide to witness the unique sight of the Dhami burning for about an hour. The social significance of this festival is also that it reunites separated family members and separated friends.\r\n\r\nAccording to legend, the Melauli Bhagwati Mandir was established in the 11th century. During this period, Hindu-Muslim tensions were rising in India. To protect their Sanatan Dharma, the Katyura clan from Kumaon migrated to Kalitari in Nepal.\r\n\r\nEvery day, the villagers would take their cattle to graze in the forest. At dusk, they returned via the dangerous Simpad cliff and the easier Siroda trail. Strangely, their cows produced no milk at home although they fed all day.\r\n\r\nThe villagers grew suspicious and posted a shepherd to observe the cows. He discovered the cattle squirting milk over a rock in the Gwalekdhura bushes. Astounded, the owner surmised the rock held mystical powers.\r\n\r\nHe decided to carry the rock to the Mahakali River. But upon reaching the present temple site, he felt an urge to urinate. Placing the rock on the ground, he went to relieve himself. Returning, he found water trickling where the rock had been placed!Convinced this was the rock’s miraculous doing, the man installed it for worship. The temple was built around the enshrined rock, which remains visible today. Locals believe the temple sprang over the spot where the divine rock granted water.The Melauli Bhagwati Mandir stands as a timeless monument to traditional temple architecture. Its remote hilltop location only enhances the mystical atmosphere. The natural beauty that engulfs the shrine is sure to elevate your mood.\r\n\r\nAs you get lost in the spiritual aura, with the distant mountains blessing you, a sense of divine calm descends. The power of faith in the goddess is palpable, especially during festivities when thousands unite in devotion. Forget your worries and open your heart to the positive, healing energy that pervades this holy abode.\r\n\r\nWhether you’re religious or not, visiting Melauli Bhagwati Mandir is sure to be a magical experience. Let the divine mother goddess Bhagwati bless you with happiness, prosperity and the pure contentment that arises from being one with nature.The nearest airport is Dhangadhi, which has flights from Kathmandu and regional hubs. From there, take a bus or jeep to Baitadi district headquarters. The temple is 30 km away, connected by buses and shared jeeps plying the Patan-Melauli route.\r\n\r\nThe road quality is decent but the last stretch is quite steep. During monsoons, the grounds may get slippery. So travel carefully or hire a 4WD vehicle if possible.\r\n\r\nAccommodation options range from budget lodges to mid-range hotels in the Melauli Bazaar nearby. Limited amenities are available around the temple too.                                    ', ' under Melauli Municipality under Tallo Swarad of Baitadi District', 'Melauli Bhagwati', 'The Melauli Bhagwati temple is Considered the famous Shaktipeeth, the main worship of Melauli Bhagwati takes place on the Katrtik Shukla Chaturdashi, Asauj Navratri and Chaitra Navratri.  The authority of the priest extends through Ojha, Joshi, Bagh, Paintola to the Bhatta Brahmins of Pali. A fair is also held here during the festival of Gaura and devotees come all day long, but the festival held on the days of Kartik Shukla Chaturdashi and Purnima is remarkable.  There is a lot of enthusiasm in the devotees who come from different parts of Nepal and India to fill the fair in thousands. Deuda connoisseurs are addicted to Deuda day and night. Dol Jatra is also important. On the morning of the full moon at the time of sunrise, pilgrims come from far and wide to witness'),
(19, 'Triveni Temple', '                                        The Triveni Temple is dedicated to the concept of Triveni, which refers to the confluence of three sacred rivers: the Ganga, Yamuna, and Saraswati. These rivers are among the holiest in Hinduism, representing purification and the flow of divine energy. In Hindu belief, the confluence of these rivers is believed to be a place where one can achieve spiritual purification, attain salvation, and receive blessings.\r\n\r\nWhile there is no literal confluence of these three rivers at the temple, the name Triveni symbolizes the sacred union of these divine forces. The temple is therefore a place where devotees come to seek divine blessings and experience spiritual growth.The Triveni Temple is part of a larger religious pilgrimage circuit in the region. Many pilgrims make the journey to Khaptad from various parts of Nepal, often traveling on foot through rugged terrain. The journey to the temple is seen as both a physical and spiritual challenge, and completing the pilgrimage is considered a significant accomplishment.\r\n\r\nSeveral festivals are celebrated at the Triveni Temple throughout the year, with the most important being Dashain, Tihar, and other regional Hindu festivals. During these times, the temple sees an influx of devotees who come to offer prayers, participate in ceremonies, and celebrate with the local community.The Triveni Temple serves as a hub for various spiritual and religious practices. Devotees from all over Nepal and even from India visit the temple to offer prayers, perform rituals, and seek blessings. Pilgrims often bathe in the nearby sacred streams, following the belief that the waters will purify their body and soul.\r\n\r\nIn addition to regular worship, the temple is a center for spiritual reflection and meditation. Many visitors choose to spend time in quiet contemplation amidst the natural surroundings, connecting with their inner selves and the divine presence. The temple, with its tranquil environment, serves as a sanctuary for those seeking peace, healing, and spiritual insight.The Khaptad Baba (also known as Khaptad Swami) is an influential figure in the region and is associated with the Triveni Temple. He was a renowned Hindu ascetic and spiritual leader who spent much of his life meditating and practicing spirituality in the Khaptad region. It is believed that Khaptad Baba attained deep spiritual enlightenment in this area, and his presence continues to influence the temple and its surroundings.\r\n\r\nKhaptad Babas ashram is located in close proximity to the Triveni Temple, and many pilgrims visit both the temple and the ashram during their pilgrimage. His teachings, which emphasize simplicity, meditation, and connection to the divine, continue to inspire devotees who visit the area.The Triveni Temple in Khaptad is dedicated to the worship of Triveni, symbolizing the sacred confluence of three divine rivers—Ganga, Yamuna, and Saraswati—in Hinduism. These rivers are not deities in the traditional sense but are considered divine, personified, and revered for their spiritual significance.\r\n\r\nHowever, within the context of the Triveni Temple, the focus is on the concept of Triveni as a union of divine forces rather than a specific singular deity. The temple and its worship practices reflect the sacredness associated with the confluence of these rivers and the spiritual purity they represent.\r\n\r\nGanga: The Ganga river is worshiped as a goddess in Hinduism. She is considered the embodiment of purity, compassion, and the giver of life. Devotees believe that bathing in the waters of the Ganga purifies them from sins and grants spiritual liberation.\r\n\r\nYamuna: The Yamuna is another revered river goddess in Hinduism, closely associated with Lord Krishna. She is regarded as the source of spiritual sustenance, love, and devotion. The Yamunas waters are believed to have healing powers.\r\n\r\nSaraswati: Saraswati, the goddess of knowledge, wisdom, music, and arts, is also symbolized by the Saraswati river. Worship of Saraswati is believed to bestow wisdom and intellectual abilities upon the devotees.                                    ', ' khaptad', 'Ganga, Yamuna, and Saraswati', ' The Triveni Temple is dedicated to the concept of Triveni, which refers to the confluence of three sacred rivers: the Ganga, Yamuna, and Saraswati. These rivers are among the holiest in Hinduism, representing purification and the flow of divine energy. In Hindu belief, the confluence of these rivers is believed to be a place where one can achieve spiritual purification, attain salvation, and receive blessings.  While there is no literal confluence of these three rivers at the temple, the name Triveni symbolizes the sacred union of these divine forces. The temple is therefore a place where devotees come to seek divine blessings and experience spiritual growth.The Triveni Temple is part of a larger religious pilgrimage circuit in the region. Many pilgrims make the journey to Khaptad from various '),
(20, 'Shivapuri Dham', '                                        Nestled in Uttarbehadi (उत्तरबेहडी), within Dhangadhi Sub-metropolitan city, Ward no. 4, Shivpuri Dham (शिवपुरी धाम) is a revered religious destination in Nepal. Known as Uttar Rameshwaram Jyotirlinga Dham (उत्तर रामेश्वरम ज्योतिर्लिङ्ग धाम), it is home to the tallest Shiva Linga (शिवलिङ्ग) in Nepal, standing at an impressive 108 feet—36 feet below ground and 72 feet above. Its unique architecture and spiritual significance have made it a magnet for pilgrims and tourists alike, who seek both religious fulfillment and scenic beauty.\r\n\r\nThe Iconic Shiva LingaThe towering Shiva Linga is the focal point of the dham, allowing pilgrims to ascend a view tower with staircases on either side to touch and worship the sacred monument. A bull statue (नन्दीको मूर्ति)  sits directly in front of the Shiva Linga, symbolizing the traditional connection between Lord Shiva and his divine vehicle, Nandi.The expansive grounds of Shivpuri Dham are dotted with temples dedicated to various Hindu deities. Upon entering, visitors are greeted by the Nepal Ama (नेपाल आमा) statue, set amidst lush gardens. Temples such as the Ganesh Temple, Suryanarayan Temple, Ugratara Temple, Durga Temple and of course the Shiva Temple offer pilgrims numerous opportunities for worship and reflection.\r\n\r\nAt the heart of the complex is the sacred Panchayan Kundas (पञ्चायन कुण्ड), with the Shiva Kunda (शिव कुण्ड) being the most prominent. Other than Shiva Kunda there are also Ganesh Kunda (गणेश कुण्ड), Suryanarayan Kunda (सुर्यनायारण कुण्ड), Bishnu Kunda (बिष्णु कुण्ड), Durga Kunda (दुर्गा कुण्ड).  The Kundas play an important role during rituals, with devotees offering prayers and conducting religious ceremonies around them. The grand Mahashivaratri Mela (महाशिवरात्रि मेला) is held every year, and the Maha Aarati (महाआरती) is performed during the festivities, making it a major spiritual event in the region. On the occasion of Gaura Festival (गौरा पर्व), Holi Festival (होलि पर्व) and New Year (नयाँ बर्ष)  hundreds of devotees visit Shivapuri Dham. Not only during the Festivals but also on Each Monday and Saturday hundreds of devotees are attracted to Shivapuri Dham.Every year, Shivpuri Dham draws thousands of pilgrims during the Mahashivaratri Mela (महाशिवरात्रि मेला), a major Hindu festival dedicated to Lord Shiva. The dham becomes a vibrant center of devotion as pilgrims participate in rituals, prayers, and the spectacular Maha Aarati (महाआरती), conducted in front of the towering Shiva Linga. Additionally, the Gaura Parva (गौरा पर्व) is celebrated annually, honoring local traditions and customs.\r\n\r\nThese festivities attract not only Nepalese devotees but also pilgrims from nearby Indian cities such as Palia and Wangawa. According to the temple management, over 100 visitors arrive daily to seek blessings, explore the temple grounds, and participate in the various ceremonies held throughout the year.Apart from being a religious site, Shivpuri Dham also plays a key role in the local community through significant life ceremonies such as weddings and bratabandha (ब्रतबन्ध). These events are hosted within the dham’s well-maintained premises for a nominal fee, which directly contributes to the development and maintenance of the site. The revenue generated from these ceremonies supports ongoing efforts to expand and beautify the dham, ensuring it remains a spiritual hub for generations to come.                                    ', '  Dhangadhi Sub-metropolitan city, Ward no. 4', ' Lord Shiva', 'Nestled in Uttarbehadi (उत्तरबेहडी), within Dhangadhi Sub-metropolitan city, Ward no. 4, Shivpuri Dham (शिवपुरी धाम) is a revered religious destination in Nepal. Known as Uttar Rameshwaram Jyotirlinga Dham (उत्तर रामेश्वरम ज्योतिर्लिङ्ग धाम), it is home to the tallest Shiva Linga (शिवलिङ्ग) in Nepal, standing at an impressive 108 feet—36 feet below ground and 72 feet above. Its unique architecture and spiritual significance have made it a magnet for pilgrims and tourists alike, who seek both religious fulfillment and scenic beauty.  The Iconic Shiva LingaThe towering Shiva Linga is the focal point of the dham, allowing pilgrims to ascend a view tower with staircases on either side to touch and worship the sacred monument. A bull statue (नन्दीको मूर्ति)  sits directly in front of the Shiva Linga, symbolizing the traditional connection between Lord Shiva and his divine vehicle, Nandi.The expansive grounds of Shivpuri Dham are dotted with temples dedicated to various Hindu deities.'),
(21, 'Tripurasundari Temple', '                                        Tripurasundari is a village development committee located in the Baitadi District within the Sudurpashchim Province of western Nepal. The VDC got its name from Tripura Sundari Temple. At the time of the 1991 Nepal census, the village had a population of 2,487 and had 491 houses in the village.Tripura Sundari (Nepali: त्रिपुरासुन्दरी मन्दिर, बैतडी) is a religious Hindu temple located in Dasrathchand municipality of Baitadi district Nepal about 10 km west(about 20 minutes drive from headquarter) from headquarters of Baitadi. It is one among the seven Bhagwati temples of Nepal. This beautiful temple is located in the middle of the village Tripura in the uphills. Tripura Sundari is dedicated to the goddess Durga. The temple is painted with red which is also considered to be the symbol of the goddess Durga also identified as Adi Parashakti, goddess of war, a symbol of positivity(Divine forces), a hope. According to Hindu mythology, she is a warrior form of goddess Parvati wife of Shiva. She is usually depicted riding a lion and with 10 arms, each arm holding the special type of weapon given by other gods to her for her battle against the buffalo demon. The temples borrow a long story behind its creation and evolution in it. There are altogether seven Bhagwati Temples(Temples of Goddess Durga) in Baitadi. It is believed that these temples seven are devoted to the seven sisters of goddess Durga. This temple is dedicated to Ransaini (one sister among seven ) so the temple is also known as Ransaini Temple.\r\n\r\nMany festivals such as Dashain, Gaura, Sankranti, and Jaat are occasionally celebrated in the Temple. Many people from Nepal and India come here for the occasions to celebrate festivals and to worship goddess Bhagwati for their better and happy life and to get blessed by the goddess Durga.As one of the seven Bhagwati temples in Nepal, the Tripura Sundari Temple is one of the most religiously significant sites in Nepal with thousands of Hindu devotees gathering from across Nepal and India to celebrate special occasions such as Sankranti, Dashain, Gaura, and Jaat. The historical architectural aesthetics of the pagoda-style temple truly reflects the beauty and history of this temple and its local people, drawing in tourists from around the globe every year to marvel at its beauty.The Tripura Sundari Temple is 3 km south-west of Gothalapani, the main market of Dasharath Chand Municipality of Baitadi. Even though Nepal’s western border is across the Mahakali River, if they come from Pithoragarh in India, the devotees have to cross the Jhulaghat on the Mahakali River and climb up a steep hill. An alternative is a tarmac road, albeit a small one. The temple is situated on the south-facing mountain range.\r\n\r\n\r\nAccording to the legend of the origin of the Tripura Sundari outbreak, after Sati Devi sacrificed her body in Yajna Kund after she could not bear the insults given by Daksha Prajapati, Lord Shiva carried her body and wandered in many high mountains of Uttarakhand. Shaktipeeths started to be established wherever his limbs fell. It is believed that a special organ has fallen in the place where the Tripura Sundari temple is located.Tripura Sundari is also known as Ransaini. According to the mythology, Bhagwati Durga took the side of the gods in the Devasura war and according to the occasion of the victory of the gods in the war, Ranma did military work, so it is believed that the name of Bhagwati was corrupted from Ransainya and became ‘Ranasaini’ in the Bait Delhi language.\r\n\r\nAccording to another legend, regarding the origin of Tripura Sundari, in ancient times, Mouni of the Kshatriya caste of Kumaon Chamwat came and settled around the present Tripura temple. Due to the lack of expected growth in the newly planted areas, food had to be supplied from outside many times. In this context, Mouni named Sarang went towards Lower Sorad 9Swaraj0 in search of grain.After reaching a place called Rodi Deval, Panch Pathi bought barley and returned to Baitadi with a heavy load. As soon as she passes Nagarjuna on her way back, Mouni suddenly has a bowel movement. When you are about to carry a heavy load in one place after defecating, it is heard in the sky that ‘You are impure, there is water nearby, only carry a heavy load if you are clean’.\r\n\r\nIn places where water is a problem at other times, water was actually found that day. As Mouni purified himself and was carrying a heavy load again, when he reached the place where the present Tripurasundari temple is in the evening, another radio station came saying, ‘You leave me here and go home, you will progress, tell the important people of the village to come to the place where I am.’ After leaving the burden there, he told all the events in detail to Bhattakaji Daftari, a well-known village official, but Daftari did not care, thinking that it might be a ghost.\r\n\r\nMouni has again gone to the place where he left behind. At that time Akashvani came again saying, ‘Remind Bhattakaji once again, if he does not come again, I will punish him.’ But the office will not go. As punishment, 22 of Bhatta’s buffaloes and one crocodile fell to their death from a nearby moolevir. After experiencing such a predicament, Daftari went to the place where he was sitting and asking for forgiveness. He goes before the barley weight that has turned into stone and asks for forgiveness. At that time, if you had come the first time, you would have made a fortune.Now I will punish you. Akashvani said that Mouni Chhetri, who served me, goes before me when I take out my dola in the Yatra Utsav, even if you are a Brahmin, you should follow him. Accordingly, in Tripura’s fair 9 Jant0, Kashyap gotra Bhatt Brahmins sit behind and carry dola.\r\n\r\nWhen Mouni opened the bag of barley that she had brought, she found an idol of Bhagwati in it. In the Baitdeli language, the size of Panch Pathi is called Rain, and it is believed that Tripurasundari was named Rainsayani or Rainsaini because Panch Pathi came hidden under the weight of barley. A temple is built on a site where barley has been turned into heavy rock, while the actual idol of Bhagwati is kept in storage. It is taken out only during fairs.\r\n\r\nThere is no factual evidence as to how the worship of Bhagwati started in the beginning. According to a folk legend, a childless Brahmin named Puru Bhat of Dotitir lost his sight when he reached a little below the temple on his way to Haridwar via Baitadi. At that time, a voice came from the sky saying ‘O Brahmin, serve me, I will make your future bright’. According to this instruction, Puru Bhat started serving Bhagwati. Similarly, Mouni, Markand, Bohra and Guru Thari Kshatriyas of the local area have also been instructed to join their service. In this way even today, the work of guiding the temple managers is being done by the Chand Thakuris of the Rath branch.After serving Tripura Mai for a long time, Puru Bhat was married to a Kshatriya girl from Athabise village and the children born from her were Kshatriyas, on the orders of his mother, he could not work as a priest. Being children of priests, they started writing Pujara surname. After Puru Bhat, the worship of Tripura Mai started from the Pandeys who came from Kumaon Champawat and settled in Baitadi. Local Bhatta Brahmins were also recruited to assist the Pandeyas.\r\n\r\nThe Tripura Sundari temple is built in the middle of the chaur, which is about 300 meters long and 50 meters wide from north to south. The temple is believed to have been established three generations before the reign of Doteli ruler Nagi Malla. In the premises of the temple with a small forest, idols of Lord Shiva, Ganesha, and lions are placed and around the temple, bells are offered to the devotees for their abhishta siddhis. A huge kathe jhula (ping) is placed outside the temple.\r\n\r\n\r\nOn the Sankranti, Purnima and Amavasya days of each month, regular chanting is performed, while Durga Saptasati and Divya Stotras are recited from Ashwin Shukla Pratipada on Dasain. There is a special festival (Jant) on Ashad Shukla Navami and Dashami and Kartik Shukla Navami and Dashami. Locals who have gone from Baitadi to other places come there during Christmas and devotees also come in large numbers from Kumaon. At that time they sacrifice a goat or a goat. Once upon a time there was a custom of Deuki and that custom has disappeared now.                                    ', ' Baitadi', 'Goddess Tripura Sundari', '  Tripurasundari is a village development committee located in the Baitadi District within the Sudurpashchim Province of western Nepal. The VDC got its name from Tripura Sundari Temple. At the time of the 1991 Nepal census, the village had a population of 2,487 and had 491 houses in the village.Tripura Sundari (Nepali: त्रिपुरासुन्दरी मन्दिर, बैतडी) is a religious Hindu temple located in Dasrathchand municipality of Baitadi district Nepal about 10 km west(about 20 minutes drive from headquarter) from headquarters of Baitadi. It is one among the seven Bhagwati temples of Nepal. This beautiful temple is located in the middle of the village Tripura in the uphills. Tripura Sundari is dedicated to the goddess Durga. The temple is painted with red which is also considered to be the symbol of the goddess Durga also identified as Adi Parashakti, goddess of war, a symbol of positivity(Divine forces), a hope. According to Hindu mythology, she is a warrior form of goddess Parvati wife of Shiva. She is usually depicted riding a lion and with 10 arms, each arm holding the special type of weapon given by other gods to her for her battle against the buffalo demon. The temples borrow a long story behind its creation and evolution in it. There are altogether seven Bhagwati Temples(Temples of Goddess Durga) in Baitadi. '),
(22, 'Baidyanath Dham', '                                        The Baidyanath temple in the Accham district of Nepals 7th province is a place of great religious as well as historical significance. The temple is one of the four major religious temples of Lord Shiva in Nepal. Experience some of Nepals most unique cultures as the indigenous groups of Achham come together to perform various rituals and traditional dances during different festivals throughout the year to promote Achhams age-old culture and religious values.Baidyanath Dham, one of the four Shrines of Nepal, is a shrine of Lord Shiva located in Achham District in the confluence of the Budhi Ganga and Saraswati rivers in Achham district. The shrine has a school to teach Ved called Ved Bidyashram. In 2020, the government allocated NPR 2 million for Baidyanath Dham to upgrade Ved Bidyashram.The place has been mentioned in Skanda Purana in the section of Manas Khanda. When Ravan could not get the vision of Shiva by meditating in Kailash Parbat, he came to Baidyanath for mediation. Shiva appeared to him and granted his wish to attach 9 heads at this place. As Shiva acted as a Baidya, a doctor, this place is called Baidyanath.The place is mentioned by Abhaya Malla, the king of Achham in 1440 BS. He said the place has the capacity to cure all disease. Inscriptions of 17th century also mention the Shah Kings.[6] A Baiju Kumal is assigned as a Dwarpal and Jalakhar Joshi Baidya as the priest of this temple since the time of Abhaya Malla.\r\n\r\nThe place also houses the weapons of Gorkha Army that they left during the Unification of Nepal The legend says that when Gorkha army came to this place, they were blinded and had to retreat.\r\nIn Shivaratri pilgrims from Nepal and India visit this place.                                    ', ' 	Achham District', '	Shiva', ' The Baidyanath temple in the Accham district of Nepals 7th province is a place of great religious as well as historical significance. The temple is one of the four major religious temples of Lord Shiva in Nepal. Experience some of Nepals most unique cultures as the indigenous groups of Achham come together to perform various rituals and traditional dances during different festivals throughout the year to promote Achhams age-old culture and religious values.Baidyanath Dham, one of the four Shrines of Nepal, is a shrine of Lord Shiva located in Achham District in the confluence of the Budhi Ganga and Saraswati rivers in Achham district. The shrine has a school to teach Ved called Ved Bidyashram. In 2020, the government allocated NPR 2 million for Baidyanath Dham to upgrade Ved Bidyashram.The place has been mentioned in Skanda Purana in the section of Manas Khanda. When Ravan could not get the vision of Shiva by meditating in Kailash Parbat, he came to Baidyanath for mediation. Shiva appeared to him and granted his wish to attach 9 heads at this place. As Shiva acted as a Baidya, a doctor, this place is called Baidyanath.The place is mentioned by Abhaya Malla, the king of Achham in 1440 BS. He said the place has the capacity to cure all disease. Inscriptions of 17th century also mention the Shah Kings.[6] A Baiju Kumal is assigned as a Dwarpal and Jalakhar Joshi Baidya as the priest of this temple since the time of Abhaya Malla.  The place also houses the weapons of Gorkha Army that they left during the Unification of Nepal The legend says that when Gorkha army came to this place, they were blinded and had to retreat. In Shivaratri pilgrims from Nepal and India visit this place.'),
(23, 'Parshuram Dham', 'Sudurpaschim Province, positioned in the western part of Nepal, is a region blessed with a different array of religious, natural, and touristic treasures. Gauging across seven sections, this fiefdom is a haven for those seeking a spiritual and serene experience. Dadeldhura quarter, divided into nine cosmopolises, holds a special place in Sudurpaschims heritage, with each megacity boasting its own religious and natural milestones.Parshuram Dham is a name that resonates with spirituality, history, and natural beauty. Situated in Sudurpaschim Province, Nepal, this religious and tourist destination holds a significant place in the hearts of both pilgrims and travelers. Lets embark on a journey to uncover the enchanting allure of Parshuram Dham, a land where myth and reality intertwine.One of the prominent municipalities within Dadeldhura district is Amargadhi, a name deeply rooted in history and valor. This municipality is a tribute to the courageous Amar singh Thapa, a figure etched in the annals of bravery. Similarly, the religious tapestry of Dadeldhura district is woven with the threads of devotion and faith. Bhageshwar village, named after the renowned deity Bhageshwar, stands as a testament to the spiritual ethos of the regionParashuram Municipality, another facet of Dadeldhura district, derives its name from the legendary figure Parashuram. The municipality is graced by the presence of the sacred Mahakali river, which flows through its heart. With an area spanning 414.07 square kilometers and a population of 34,983, Parashuram district is a treasure trove of unique natural resources. Its significance in terms of tourism is undeniable, making it a destination of choice for travelers seeking both solace and adventure.The iconic Parshuram Dham is famed for its regular puja programs, with the grandest festivity being on the auspicious day of Makar Sankranti, observed on January 1st. During this time, a vibrant and cultivated fair takes place, drawing addicts from bordering sections and indeed businesses of India. The scrupulous operation of Parashuram megacity ensures that the show is both splendid and well-organized.', ' Parashuram Municipality, Dadeldhura district', 'Parshuram', 'Parshuram Dham is a name that resonates with spirituality, history, and natural beauty. Situated in Sudurpaschim Province, Nepal, this religious and tourist destination holds a significant place in the hearts of both pilgrims and travelers. Let’s embark on a journey to uncover the enchanting allure of Parshuram Dham, a land where myth and reality intertwine.One of the prominent municipalities within Dadeldhura district is Amargadhi, a name deeply rooted in history and valor. This municipality is a tribute to the courageous Amar singh Thapa, a figure etched in the annals of bravery. Similarly, the religious tapestry of Dadeldhura district is woven with the threads of devotion and faith. Bhageshwar village, named after the renowned deity Bhageshwar, stands as a testament to the spiritual ethos of the region.'),
(24, 'Ghatal Than', '                                        Ghatal Than is located in Amargadhi Municipality-3, along the banks of the serene Doti River and nestled in the foothills of the Mahabharat range, Ghatal Than Temple is a site of profound spiritual and cultural significance. The temple is a peaceful retreat surrounded by lush greenery, with the sound of flowing water adding to its tranquil atmosphere.\r\n\r\nThe legend of the temple dates back to the reign of Dotyali King Nagi Malla, whose seventh queen brought the deity Ghatal to this region as part of her dowry. This rich history is deeply intertwined with the customs and traditions of the local communities, who revere the temple as a sacred place of worship.\r\n\r\nThe temple’s architecture reflects its cultural heritage, with beautifully adorned shrines featuring colorful prayer flags, bells of various sizes, and statues of the deity Ghatal. The main shrine is a focal point of devotion, where devotees offer flowers, incense, and traditional tika during rituals. A nearby platform, marked with flags and bells, serves as a space for community gatherings and rituals.The Ghatal Than Temple comes alive during the annual Ghatal Jatra, a vibrant festival showcasing the unique customs of the region:\r\n\r\nThe Bohara of Chamsal bear the sacred urn, throne, and mark of the deity.\r\nThe Mahars of Bhagwati and Marakatte village carry the deity in a ceremonial doli.\r\nThe Madka bull is adorned with a sacred stick.\r\nThe Dalits of Hatigaun provide rhythmic beats on the Damaha, creating a celebratory atmosphere.\r\nSurrounded by pristine natural beauty, including a gently flowing river and dense forests, Ghatal Than Temple offers an immersive experience for visitors. It is not just a place of worship but also a cultural and natural haven that connects devotees and travelers to the spiritual essence of the region.                                    ', ' Amargadhi Municipality-3', 'Ghatal', 'Ghatal Than Temple is a site of profound spiritual and cultural significance. The temple is a peaceful retreat surrounded by lush greenery, with the sound of flowing water adding to its tranquil atmosphere.The legend of the temple dates back to the reign of Dotyali King Nagi Malla, whose seventh queen brought the deity Ghatal to this region as part of her dowry. This rich history is deeply intertwined with the customs and traditions of the local communities, who revere the temple as a sacred place of worship.The temple’s architecture reflects its cultural heritage, with beautifully adorned shrines featuring colorful prayer flags, bells of various sizes, and statues of the deity Ghatal.'),
(25, 'Bhageswor Temple', 'Nestled in the forest within the Bhageshwar Rural Municipality, this temple is a spiritual haven with deep-rooted mythological significance. The Bhageshwar Temple is dedicated to the deity Bhageshwar, who is believed to be an advisor to Lord Shiva. Worship is conducted here twice a year, during Shravan Purnima and Kartik Chaturdashi, making these occasions a spectacular sight for visitors.\r\n\r\nThis temple, located 17 kilometers from the district headquarters, can be reached via a two-and-a-half-hour drive or a five- to six-hour trek. Situated in the Mahabharata region, the Dhura Temple in Bhageshwar is the highest point in the rural municipality. The deity is accompanied by other significant figures such as Paso, Kailpal, Kanbetal, and Kalashaini. Worship here is restricted to select dates, ensuring its sacredness remains intact. The temple’s surrounding apple orchards and dharamshalas further enhance its charm, offering a serene and spiritual retreat.Bhageshwar Temple, located in Dadeldhura, Nepal, is a significant spiritual and historical site dedicated to Lord Shiva. This temple is an important pilgrimage destination for devotees, especially during the Maha Shivaratri festival. It is nestled in the beautiful hilly landscapes of the Far-Western region, offering a serene and divine atmosphere for worshippers and visitors.The name \"Bhageshwar\" is derived from Lord Shiva’s divine form as the Lord of Bhaga (Fate and Destiny). According to local legends, the temple’s Shiva Linga has been worshiped for centuries, believed to grant wishes and protect devotees from hardships. Many myths suggest that the temple has been a site of deep meditation and spiritual awakening for sages and yogis.Bhageshwar Temple stands as a symbol of traditional Nepali temple architecture, with intricate carvings and a peaceful ambiance. The temple complex is surrounded by lush green hills, offering breathtaking views that enhance the spiritual experience of visitors', ' Dadeldhura, Far-West Nepal', 'Lord Bhageswor', 'Nestled in the tranquil hills of Dadeldhura, Bhageshwar Temple is a revered pilgrimage site dedicated to Lord Shiva. This temple is a significant cultural and spiritual landmark in Far-Western Nepal, attracting devotees and travelers seeking blessings, peace, and a divine connection.The name \"Bhageshwar\" is derived from Lord Shiva’s divine form as the Lord of Bhaga (Fate and Destiny). According to local legends, the temple’s Shiva Linga has been worshiped for centuries, believed to grant wishes and protect devotees from hardships. Many myths suggest that the temple has been a site of deep meditation and spiritual awakening for sages and yogis.');
INSERT INTO `temple` (`id`, `name`, `details`, `address`, `deity`, `made_year`) VALUES
(27, 'Behdaba Temple', 'The famous temple of Behdaba in the forest of Urmarampur of Dhangadhi sub-metropolitan ward no. 16 of Kailali district. Earlier this place was called Beda. According to legend, when a Mahatma reached the place where he had obtained Shaligram after satisfying Shiva Parvati, he had to urinate on the ground, but Lord Shiva told him not to leave Shaligram on the ground before reaching the specified place. After a lot of trouble, the Mahatma allowed a wallet to hold him and went to urinate, but he did not tell him not to put the wallet on the ground. After some time, Vatuwala put it on the ground and went to his destination. When Mahatma returned after urinating, he was very surprised to see Shaligram on the ground. The Shaligram was lifted from the ground and buried. They could not lift the Mahatma. Later, when he saw the cows of the shepherds leaking milk in that place, he excavated the Shivalinga. From that time onwards, worship of the Shivalinga began. The present temple was built in 1982 by Balachand, Tulsi Mukhiya and Ladepujari. There are also temples of various other deities in this temple complex There is a Shivalinga inside this temple and Shaligram nearby. In this temple, a big fair is held on the great festival of Hindus, Shivaratri. Also, a big fair is held for 5 days during Dussehra festival. On that day, a large number of devotees from Nepal and neighboring India come. They also bathe in Sivaganga. This temple is very famous in India. According to the locals, chariots fly at night in the Behdaba Baba temple complex in this forest and from time to time the bells themselves ring at night. With the entry of the Tharu caste into the Terai, the importance of this temple has also increased a lot. The people have got the faith from Baba to fulfill the desires of the devotees, to take away the sufferings, to give milk by giving cows and buffalos milk excessively, to give milk.', ' Dhangadhi, Kailali', 'Shiva in the form of Behedababa', '.The temple derives its name from \"Beheda,\" which is believed to signify a place of spiritual awakening. According to local folklore, this temple holds divine energy where Lord Shiva grants boons to true devotees. Many believe that prayers offered at Behedababa Temple lead to prosperity, healing, and the fulfillment of desiresBehedababa Temple is surrounded by lush forests and a peaceful atmosphere, making it a perfect place for meditation and spiritual reflection. The temple architecture reflects traditional Hindu styles, with a beautifully sculpted Shiva Linga at its center. Devotees visit to pour holy water (jalabhishek) and offer Bilva leaves, a ritual deeply connected to Lord Shivas worship.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'bhwbi.rawal@gmail.com', '$2y$10$XdW8BEuGlWrizzUKjl8GMOO2Lb93JYpwBn2ZYQ2sk4avbdTRD4xbO', 'Bhawana', 0, 1, 1, 262144, 1736780006, 1739818680, 6),
(4, 'diya@gmail.com', '$2y$10$xV2FOIg0Z3vTDYooPMWRm.FknhczUGMGT/jvCInl6FlXh3BMmMFWS', 'diya rawal', 0, 1, 1, 131073, 1739627558, 1739818649, 0),
(5, 'usha@gmail.com', '$2y$10$P67srYeJXyKyeolzEeqjYewYEQou/MU5FJbdjmt6R3LC/jxHg7.a.', 'usha rawal', 0, 1, 1, 131072, 1739629709, NULL, 0),
(8, 'bishnu@gmail.com', '$2y$10$yTlh9DhorV.wRErSr3GnVe8O0OUCPj6ETDQUKpwRbiydcOcZ1dZSq', 'bishnu', 0, 1, 1, 131072, 1739808105, 1739808581, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_2fa`
--

CREATE TABLE `users_2fa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mechanism` tinyint(2) UNSIGNED NOT NULL,
  `seed` varchar(255) DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_otps`
--

CREATE TABLE `users_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mechanism` tinyint(2) UNSIGNED NOT NULL,
  `single_factor` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires_at` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_events_temple_id` (`temple_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_favorite_temple_id` (`temple_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_temple_id_gallery` (`temple_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews_temple_id` (`temple_id`);

--
-- Indexes for table `temple`
--
ALTER TABLE `temple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_2fa`
--
ALTER TABLE `users_2fa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_mechanism` (`user_id`,`mechanism`);

--
-- Indexes for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_otps`
--
ALTER TABLE `users_otps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_mechanism` (`user_id`,`mechanism`),
  ADD KEY `selector_user_id` (`selector`,`user_id`);

--
-- Indexes for table `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indexes for table `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `temple`
--
ALTER TABLE `temple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_2fa`
--
ALTER TABLE `users_2fa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_otps`
--
ALTER TABLE `users_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_temple_id` FOREIGN KEY (`temple_id`) REFERENCES `temple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `fk_favorite_temple_id` FOREIGN KEY (`temple_id`) REFERENCES `temple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_temple_id_gallery` FOREIGN KEY (`temple_id`) REFERENCES `temple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_temple_id` FOREIGN KEY (`temple_id`) REFERENCES `temple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
