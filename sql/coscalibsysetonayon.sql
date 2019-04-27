-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2017 at 05:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coscalibsys`
--
CREATE DATABASE IF NOT EXISTS `coscalibsys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `coscalibsys`;

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

DROP TABLE IF EXISTS `admintbl`;
CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `admintbl`
--

TRUNCATE TABLE `admintbl`;
--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `name`, `user`, `pass`) VALUES
(1, 'Ken', 'admin', 'admin'),
(2, 'Jaypee', 'jaypee', 'adminadmin'),
(3, 'Charlyn', 'cha', 'adminadmin'),
(4, 'Jasmin', 'jas', 'adminadmin'),
(6, 'Pui', 'puihaha', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booktbl`
--

DROP TABLE IF EXISTS `booktbl`;
CREATE TABLE `booktbl` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `borrowed` enum('y','n') NOT NULL,
  `status` enum('y','n') NOT NULL,
  `book_image` blob NOT NULL,
  `book_path` varchar(100) NOT NULL,
  `uploaded_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `booktbl`
--

TRUNCATE TABLE `booktbl`;
--
-- Dumping data for table `booktbl`
--

INSERT INTO `booktbl` (`id`, `name`, `author`, `category`, `date`, `borrowed`, `status`, `book_image`, `book_path`, `uploaded_date`) VALUES
(1, 'Book of Eli', 'Sam Moffie', 'Drama', '2017-06-07', 'n', 'y', '', 'img/bookslib/bookofeli.jpg', '2017-06-07'),
(2, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Science Fiction', '2017-06-08', 'n', 'y', '', 'img/bookslib/thegreatgatsby.jpeg', '2017-06-07'),
(3, 'The Grapes of Wrath', 'John Steinbeck', 'Science Fiction', '2017-06-16', 'n', 'y', '', 'img/bookslib/thegrapesofwrath.jpg', '2017-06-07'),
(4, 'Nineteen Eighty-Four', 'George Orwell', 'Novel', '2017-06-23', 'n', 'y', '', 'img/bookslib/nineteeneightyfour.jpg', '2017-06-07'),
(5, 'Ulysses', 'James Joyce', 'Novel', '2017-06-22', 'n', 'y', '', 'img/bookslib/ulysses.jpg', '2017-06-07'),
(6, 'Lolita', 'Vladimir Nabokov', 'Novel', '2017-05-29', 'n', 'y', '', 'img/bookslib/lolita.jpg', '2017-06-07'),
(7, 'You Too Can Have a Body Like Mine ', 'Alexandra Kleeman', 'Literary Fiction', '0000-00-00', 'n', 'y', '', 'img/bookslib/youtoocanhaveabodylikemine.jpg', '2017-06-07'),
(8, 'Girl at War', 'Sara Novi', 'Literary Fiction', '2017-02-16', 'n', 'y', '', 'img/bookslib/girlatwar.jpg', '2017-06-07'),
(9, 'The Invasion of the Tearling', 'Erika Johansen', 'Literary Fiction', '2016-03-19', 'n', 'y', '', 'img/bookslib/theinvasionoftearling.jpg', '2017-06-07'),
(10, 'The Fact of a Body: A Murder and a Memoir', 'Alexandria Marzano-Lesnevich', 'Biographies', '2017-05-29', 'n', 'y', '', 'img/bookslib/thefactofabody.jpg', '2017-06-07'),
(11, 'Al Franken, Giant of the Senate', 'Al Franken', 'Biographies', '2017-05-29', 'n', 'y', '', 'img/bookslib/giantofthesenate.jpg', '2017-06-07'),
(12, 'My Life with Bob', 'Alexandria Marzano-Lesnevich', 'Biographies', '2017-04-23', 'n', 'y', '', 'img/bookslib/mylifewithbob.jpg', '2017-06-07'),
(13, 'Love and Trouble: A Midlife Reckoning', 'Claire Dederer', 'Biographies', '2015-05-16', 'n', 'y', '', 'img/bookslib/loveandtrouble.jpg', '2017-06-07'),
(14, 'The Great Treehouse War', 'Lisa Graff', 'Biographies', '2016-09-28', 'n', 'y', '', 'img/bookslib/thegreattreehousewar.jpg', '2017-06-07'),
(15, 'In a Perfect World', 'Trish Doller', 'Travel', '2016-02-14', 'n', 'y', '', 'img/bookslib/inaperfectworld.jpg', '2017-06-07'),
(16, 'Carson Crosses Canada', 'Linda Bailey', 'Travel', '2016-07-15', 'n', 'y', '', 'img/bookslib/carsoncrossescanada.jpg', '2017-06-07'),
(17, 'You & a Bike & a Road', 'Eleanor Davis', 'Travel', '2016-05-12', 'n', 'y', '', 'img/bookslib/youandabikeandaroad.jpg', '2017-06-07'),
(18, 'The Excursionist', 'J.D. Sumner', 'Travel', '2017-05-29', 'n', 'y', '', 'img/bookslib/theexcursionist.jpg', '2017-06-07'),
(19, 'Hold Back The Stars', 'Katie Khan', 'Religion', '2016-08-12', 'n', 'y', '', 'img/bookslib/holdbackthestars.jpg', '2017-06-07'),
(20, 'Waking Up: A Guide to Spirituality Without Religion ', 'Sam Harris', 'Religion', '2014-01-29', 'n', 'y', '', 'img/bookslib/wakingup.jpg', '2017-06-07'),
(21, 'The Sacred and the Profane: The Nature of Religion', 'Mircea Eliade', 'Religion', '2015-01-23', 'n', 'y', '', 'img/bookslib/thesacredandprofane.jpg', '2017-06-07'),
(22, 'Breaking the Spell: Religion as a Natural Phenomenon ', 'Daniel Dennett', 'Religion', '2015-07-19', 'n', 'y', '', 'img/bookslib/breakingthespell.jpg', '2017-06-07'),
(23, 'One of Us Is Lying', 'Karen McManus', 'Mystery', '2015-06-14', 'n', 'y', '', 'img/bookslib/oneofusislying.jpg', '2017-06-07'),
(24, 'The Long Drop', 'Denise Mina', 'Mystery', '2014-09-23', 'n', 'y', '', 'img/bookslib/thelongdrop.jpg', '2017-06-07'),
(25, 'You will Pay', 'Lisa Jackson', 'Mystery', '2013-12-12', 'n', 'y', '', 'img/bookslib/youwillpay.jpg', '2017-06-07'),
(26, 'Note to Self', 'Connor Franta', 'Poetry', '2016-11-13', 'n', 'y', '', 'img/bookslib/notetoself.jpg', '2017-06-07'),
(27, 'Town Is by the Sea', 'Joanne Schwartz', 'Poetry', '2017-08-17', 'n', 'y', '', 'img/bookslib/townisbythesea.jpg', '2017-06-07'),
(28, 'The Pocketbook of Sunshine and Rain', 'Nenia Campbell', 'Poetry', '2016-02-22', 'n', 'y', '', 'img/bookslib/thepocketbookofsunshineandrain.jpg', '2017-06-07'),
(29, 'The Universe of Us', 'Lang Leav', 'Poetry', '2013-03-21', 'n', 'y', '', 'img/bookslib/theuniverseofus.jpg', '2017-06-07'),
(30, 'Sad Girls', 'Lang Leav', 'Poetry', '2015-06-28', 'n', 'y', '', 'img/bookslib/sadgirls.jpg', '2017-06-07'),
(31, 'Heartless', 'Jonaxx', 'Romance', '2015-01-31', 'n', 'y', '', 'img/14-06-2017-1497414954.jpg', '2017-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `reporttbl`
--

DROP TABLE IF EXISTS `reporttbl`;
CREATE TABLE `reporttbl` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_author` varchar(100) NOT NULL,
  `book_category` varchar(50) NOT NULL,
  `book_path` varchar(100) NOT NULL,
  `penalty` enum('y','n') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `reporttbl`
--

TRUNCATE TABLE `reporttbl`;
--
-- Dumping data for table `reporttbl`
--

INSERT INTO `reporttbl` (`id`, `user_id`, `book_id`, `name`, `borrow_date`, `return_date`, `book_title`, `book_author`, `book_category`, `book_path`, `penalty`) VALUES
(1, 1, 1, 'ken', '2017-06-24', '2017-06-24', 'Book of Eli', 'Sam Moffie', 'Drama', 'img/bookslib/bookofeli.jpg', 'n'),
(2, 1, 1, 'ken', '2017-06-24', '2017-06-28', 'Book of Eli', 'Sam Moffie', 'Drama', 'img/bookslib/bookofeli.jpg', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

DROP TABLE IF EXISTS `usertbl`;
CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `status` enum('y','n') NOT NULL,
  `num_of_books` int(11) NOT NULL,
  `borrowed_status` enum('y','n') NOT NULL,
  `penalty_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `usertbl`
--

TRUNCATE TABLE `usertbl`;
--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `fullname`, `lname`, `fname`, `user`, `pass`, `status`, `num_of_books`, `borrowed_status`, `penalty_date`) VALUES
(1, 'Cosca, Kendrick', 'Cosca', 'Kendrick', 'ken', 'kencosca32', 'y', 0, 'y', NULL),
(2, 'Gutierrez, Jasmin', 'Gutierrez', 'Jasmin', 'jas', 'jasmin329', 'y', 0, 'y', NULL),
(3, 'Dala, Jaypee', 'Dala', 'Jaypee', '201511808', '123456', 'y', 0, 'y', NULL),
(4, 'Nisperos, Charlyn', 'Nisperos', 'Charlyn', '201511942', 'admin123', 'y', 0, 'y', NULL),
(8, 'Purificacion, Chryzjan', 'Purificacion', 'Chryzjan', '201512722', '1234', 'y', 0, 'y', NULL),
(9, 'Lim, Chesster', 'Lim', 'Chesster', '201510664', '1234', 'y', 0, 'y', NULL),
(10, 'Gaspar, Cayle Anielle', 'Gaspar', 'Cayle Anielle', '201511083', '1234', 'y', 0, 'y', NULL),
(11, 'Nepomuceno, Jeanina', 'Nepomuceno', 'Jeanina', '201511316', '1234', 'y', 0, 'y', NULL),
(12, 'Egana, Sherry Gil', 'Egana', 'Sherry Gil', '201510289', '1234', 'y', 0, 'y', NULL),
(21, 'Coscos, Hanz Apple', 'Coscos', 'Hanz Apple', '201511961', '1234', 'y', 0, 'y', NULL),
(22, 'Vitug, Joshua', 'Vitug', 'Joshua', '201511918', '1234', 'y', 0, 'y', NULL),
(23, 'Erum, Timothy', 'Erum', 'Timothy', '201511799', '1234', 'y', 0, 'y', NULL),
(24, 'Cunanan, Trisha', 'Cunanan', 'Trisha', '201512033', '1234', 'y', 0, 'y', NULL),
(25, 'Lee, Christine', 'Lee', 'Christine', '201510266', '1234', 'y', 0, 'y', NULL),
(26, 'Esdicul, Katrina', 'Esdicul', 'Katrina', '201511337', '1234', 'y', 0, 'y', NULL),
(27, 'Carino, Marwin', 'Carino', 'Marwin', '201511185', '1234', 'y', 0, 'y', NULL),
(28, 'Balboa, Jane', 'Balboa', 'Jane', '201511430', '1234', 'y', 0, 'y', NULL),
(29, 'Villanes, Katrin', 'Villanes', 'Katrin', '201511594', '1234', 'y', 0, 'y', NULL),
(30, 'Estopace, Aileen', 'Estopace', 'Aileen', '201511224', '1234', 'y', 0, 'y', NULL),
(31, 'Navarra, Wheny', 'Navarra', 'Wheny', '201511570', '1234', 'y', 0, 'y', NULL),
(32, 'Cosme, Kyla Nicole', 'Cosme', 'Kyla Nicole', '201510996', '1234', 'y', 0, 'y', NULL),
(33, 'Victorino, Micaella', 'Victorino', 'Micaella', '201511670', '1234', 'y', 0, 'y', NULL),
(34, 'Villarama, Hanna Mae', 'Villarama', 'Hanna Mae', '201512959', '1234', 'y', 0, 'y', NULL),
(35, 'Ramos, John Mark', 'Ramos', 'John Mark', '201512794', '1234', 'y', 0, 'y', NULL),
(36, 'Luna, Marco Jules', 'Luna', 'Marco Jules', '201512795', '1234', 'y', 0, 'y', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booktbl`
--
ALTER TABLE `booktbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporttbl`
--
ALTER TABLE `reporttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `booktbl`
--
ALTER TABLE `booktbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `reporttbl`
--
ALTER TABLE `reporttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
