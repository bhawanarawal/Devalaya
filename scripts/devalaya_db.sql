-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2025 at 11:23 AM
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
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT 'anonymous_user',
  `temple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, './temple_gallery/08-01-2025-1736339570-bhawana.jpg', 1),
(2, './temple_gallery/08-01-2025-1736339570-characteristics_of_computer.jpg', 1),
(3, './temple_gallery/08-01-2025-1736339570-coffee.jpg', 1),
(4, './temple_gallery/08-01-2025-1736345823-I0000iU7LEY1GfBc.jpg', 2),
(5, './temple_gallery/08-01-2025-1736345823-images.jpeg', 2),
(6, './temple_gallery/08-01-2025-1736345823-Introduction-to-databases-1-2048.webp', 2),
(7, './temple_gallery/08-01-2025-1736345823-Janet-Kwan_Maru-Bistro-2022-9.jpg', 2),
(8, './temple_gallery/08-01-2025-1736346005-rose.jpg', 3),
(9, './temple_gallery/08-01-2025-1736346005-Screenshot 2024-07-19 120050.png', 3),
(10, './temple_gallery/08-01-2025-1736346005-Screenshot 2024-07-19 121039.png', 3),
(11, './temple_gallery/08-01-2025-1736350359-', 1);

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
  `made_year` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temple`
--

INSERT INTO `temple` (`id`, `name`, `details`, `address`, `deity`, `made_year`) VALUES
(1, 'Ugratara', '                                        The Goddess Ugratara is the tutelary deity of Eastern Ganga dynasty kings of erstwhile Kalinga dynasty. Her ancient temple lies at Mulajharigarh village, Bhusandapur 65 kilometers from State capital Bhubaneswar, Orissa, India. The icon of Mother Tara is three-eyed and Chaturbhuja, holding potent weapons as sword, dagger, blue lotus and a drinking cup in her hands. She stands over a corpse on burning flames of funeral pyre. Serpent anklets and a serpent on crown are visible which clearly dates back to the time of the 11th-century Tantrik text Sadhanamala Tantra.[1] When later kings of Gajapati dynasty revered goddess Kali or Shyamakaali she had less importance and her worship received less attention. But many people belonging to Vasishtha Gotra revere her as Ishta devi. She is one among ten Mahavidya in Hindu Tantrik theology. She is very popular as Ugratara due to her fierce aspect, but benevolent to the adorers as Ekajata/Neela-Saraswati. Nearby railway station is Bhushandapur in Khordha district which is accessible from Bhubaneswar and Balugaon by local passenger trains. The main festivals here are Chaitra parba, Raja Parba, Sharadiya Durga Puja. She is worshipped in tantrik way and offered all tantrik fivefold paraphrenalias.[2]                                    ', ' Dadeldhura', 'Durga', '2020-01-08'),
(2, 'Badimalika', 'Badimalika Temple is a Hindu temple. It is located in Triveni Municipality, Bajura district of Sudurpashchim Province. It is one of the major temples in Nepal.[2] It is dedicated to Bhagwati. Malika Chaturdashi is its major festival. It is served by two priests, one representing the Kalikot district, and the other Bajura district .[3] Badimalika Triveni Patan OST by BEAIM', ' Bajura', 'shakti', '2025-01-09'),
(3, 'Melauli Bhagwati Temple', 'Melauli Bhagwati Temple is situated in the beautiful Duwachaur of 134 Ropani under Melauli Municipality under Tallo Swarad of Baitadi District, Sudurpaschim Province. This temple, located 12 kosh south from the district headquarters of Baitadi district, is built in pagoda style.\r\n\r\nThe temple is Located at a height of about 1700 meters above sea level, this temple is a beautiful piece of art. The region has a temperate climate. This temple can be reached by helicopter after a journey of 30 kilometers by vehicles running on the Patan Melauli section of the Patan Pancheswar road. The last reconstruction work of this temple, which has also been done from time to time, was started in the year 2038 B.S. and was completed in 2043 B.S.', ' Baitadi', 'Bhagwati Devi', '2025-01-16');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `temple`
--
ALTER TABLE `temple`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `temple`
--
ALTER TABLE `temple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `fk_favorite_temple_id` FOREIGN KEY (`temple_id`) REFERENCES `temple` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_temple_id_gallery` FOREIGN KEY (`temple_id`) REFERENCES `temple` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
