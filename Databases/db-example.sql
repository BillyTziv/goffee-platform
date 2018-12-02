-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 11 Ιουλ 2018 στις 19:19:41
-- Έκδοση διακομιστή: 10.1.28-MariaDB
-- Έκδοση PHP: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `taskmanager`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `clients`
--

CREATE TABLE `clients` (
  `id` int(12) NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 NOT NULL,
  `coffee` varchar(64) CHARACTER SET utf8 NOT NULL,
  `sugar` varchar(64) CHARACTER SET utf8 NOT NULL,
  `address` varchar(64) CHARACTER SET utf8 NOT NULL,
  `comments` varchar(64) CHARACTER SET utf8 NOT NULL,
  `profile_image` varchar(256) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Πελάτες για τα κουμπιά';

--
-- Άδειασμα δεδομένων του πίνακα `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `email`, `coffee`, `sugar`, `address`, `comments`, `profile_image`) VALUES
(1, 'anastatios', '827ccb0eea8a706c4c34a16891f84e7b', 'anastasios@gmail.com', 'Frape', 'ΜΕΤ', 'Καρδαμίτσια, Φιλικής Εταιρείας 39', 'Μαύρη ζάχαρη', ''),
(3, 'tester', 'f5d1278e8109edd94e1e4197e04873b9', 'tester@gmail.com', 'Hot chocolate', 'MET', 'Ρήγα Φεραίου 32, Νομαρχία', 'Επιπλέον γάλα εβαπορέ αφράτο', 'tester_profile.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `orders`
--

CREATE TABLE `orders` (
  `id` int(250) NOT NULL,
  `product` varchar(64) CHARACTER SET utf8 NOT NULL,
  `sugar` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT 'MET',
  `address` varchar(128) CHARACTER SET utf8 NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `status` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  `order_date` date NOT NULL,
  `order_time` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Product orders';

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`id`, `product`, `sugar`, `address`, `name`, `comment`, `status`, `order_date`, `order_time`) VALUES
(3, 'Latto', 'ΜΕΤ', 'Ρήγα Φεραίου 21, Ιωάννινα', 'Ιωάννης Κορδαλάς', 'Extra Ζάχαρη', '3', '2018-06-16', '12:00'),
(4, 'Frape', 'ΜΕΤ', 'Φιλικής Εταιρείας', 'Ιωάννης Τζιβάρας', 'Λίγα παγάκια μέσα', '3', '2018-06-30', '21:00'),
(5, 'Frape', 'ΣΚ', 'Μαρίκας Κοτοπούλη 43', 'Μαρία Διαμάντη', 'Καθόλου παγάκια, αχτύπητος', '3', '2018-06-21', '10:00'),
(6, 'Guppa', 'ΜΕΤ', 'Καρδαμίτσια', 'Μιχαήλ Νίκος', 'Με λίγη ζάχαρη', '3', '2018-06-30', '08!00'),
(7, 'Cappuchino', 'ΓΛΚ', 'Φιλικής Εταιρείας 2η πάροδος, Καρδαμίτσια, Ιωάννινα', 'Χαράλαμπος Παπαδόπουλήδης Αναστάσιος', '-', '2', '2018-06-23', '12:00'),
(8, 'Τσαι του βουνου', 'ΣΚ', 'Αναστασιοπούλου 2', 'Απόστολος Γιώτης', 'Το τσάι το θε΄λω σε χαμηλό ποτήρι και με πολύ ζάχαρη γιατί έχω πρόβλημα με την καρδιά. Επιπλέον να μην χυθεί.', '3', '2018-06-16', '08!00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `owners`
--

CREATE TABLE `owners` (
  `id` int(12) NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 NOT NULL,
  `shopid` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `owners`
--

INSERT INTO `owners` (`id`, `username`, `password`, `email`, `shopid`) VALUES
(1, 'Andromeda', '827ccb0eea8a706c4c34a16891f84e7b', 'andromeda@gmail.com', 0),
(2, 'Spyridwn', '827ccb0eea8a706c4c34a16891f84e7b', 'spyridwn@gmail.com', 0),
(3, 'Amalia', '827ccb0eea8a706c4c34a16891f84e7b', 'Amalia@gmail.com', 0),
(4, 'Nikos', '827ccb0eea8a706c4c34a16891f84e7b', 'nikos@gmail.com', 0),
(5, 'Nikos', '827ccb0eea8a706c4c34a16891f84e7b', 'nikos@gmail.com', 0),
(6, 'Nikos', '827ccb0eea8a706c4c34a16891f84e7b', 'nikos@gmail.com', 0),
(7, 'Nikos', '827ccb0eea8a706c4c34a16891f84e7b', 'nikos@gmail.com', 0),
(8, 'Nikos', '827ccb0eea8a706c4c34a16891f84e7b', 'nikos@gmail.com', 0),
(9, 'Nikos', '827ccb0eea8a706c4c34a16891f84e7b', 'nikos@gmail.com', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shops`
--

CREATE TABLE `shops` (
  `shopid` int(12) NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 NOT NULL,
  `address` varchar(64) CHARACTER SET utf8 NOT NULL,
  `town` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `shops`
--

INSERT INTO `shops` (`shopid`, `password`, `email`, `address`, `town`) VALUES
(325212, '4e2304affac92fd2641187574b7d51db', 'vtzivaras@gmail.com', 'Καρδαμίτσια, Φιλικής Εταιρείας 39', 'Ιωάννινα');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `taskName` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) DEFAULT NULL,
  `person` varchar(255) DEFAULT NULL,
  `entryDate` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `tasks`
--

INSERT INTO `tasks` (`id`, `rating`, `taskName`, `deadline`, `person`, `entryDate`, `comment`, `status`) VALUES
(1, 3, 'Ημέρας παράδωσης σελίδων +3 μέρες?', '', 'Giannis Tzoumpas', '2017-09-14', '+3 μέρες αύξηση σε όλα τα πακέτα', 1),
(2, 3, 'Υλικό για portfolio', '', 'Giannis Tzoumpas', '2017-09-14', 'Έχω κάνει επικοινωνία υπενθύμισης στην γραφίστρια', 1),
(3, 3, ' Χαρακτηριστικά πίνακα/ Μορφοποίηση ', '', 'Giannis Tzoumpas', '2017-09-14', 'Χρειάζομαι τα specs  και desk και mobile', 1),
(4, 3, 'Διόρθωση της επικοινωνίας', '', 'Tzivaras Vasilis', '2017-09-14', 'Επείγων ', 1),
(5, 3, 'Εξαγωγή χαρακτηριστικών τέλειου πίνακα', '14/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Ύψος κελιών, γραμματοσειρά, μέγεθος γραμματοσειράς και spaces before and after', 1),
(6, 3, 'Τιμές στο hosting', '14/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Να μπούν τιμές στο hosting service που έχουμε. Κάπως.', 1),
(7, 2, 'Sign in στα κοσμήματα', '17/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Κάπως να μπορώ να δω μερικά απο το portfolio , όχι όλα. Με λογαριασμούς.', 1),
(8, 2, 'Προσθήκη τιμής για μεταφορά hosting', '17/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Κάπου να μπει και αυτό, τιμές για μεταφορά hosting.', 1),
(9, 1, 'Δημιουργία tab στο μενού με τις υπηρεσίες', '30/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Το tab θα έχει Γραφιστική, hosting υπηρεσία, μετάφραση και δακτυλογράφηση.', 1),
(10, 1, 'Δημιουργία σελίδα για δακτυλογράφηση', '30/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Σελίδα για την δακτυλογράφηση, πληροφορίες στο τέλος του doc που έφτιαξε ο Γιαννης.', 1),
(11, 1, 'Σελίδα για την μετάφραση', '30/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Σελιδα αποκλειστικά για τις μεταφράσεις που κάνουμε.', 1),
(12, 1, 'Σελίδα για γραφιστική', '30/09/2017', 'Tzivaras Vasilis', '14/09/2017', 'Σελίδα για την γραφισιτκή που έχουμε, ενδεχομέως να δείξουμε και κάποια δουλεια μας.', 1),
(13, 1, 'Second theme', '', 'Giannis Tzoumpas', '2017-09-17', 'Σύγκριση του δεύτερου theme που ίσως χρειαστούμε.', 1),
(14, 3, 'SM Μαρία ', '', 'Giannis Tzoumpas', '2017-09-17', 'Δημιουργία content για τα sm  του Στάθη', 1),
(15, 2, 'Μπαταρίες Για newsletter', '', 'Giannis Tzoumpas', '', 'Αποστολή newsletter την τρίτη (Μπαταριές) ', 1),
(16, 2, 'Τηλέφωνο στον Ζαχαροπλάστη ', '', 'Giannis Tzoumpas', '2017-09-17', 'Τηλέφωνο στον Ζαχαροπλάστη την Δευτέρα', 1),
(17, 2, 'Τηλέφωνο στον Κοσμηματοπώλη  ', '', 'Giannis Tzoumpas', '2017-09-17', 'Τηλέφωνο στον Κοσμηματοπώλη την Δευτέρα', 1),
(18, 1, 'Εκκρεμότητες email  ', '', 'Giannis Tzoumpas', '2017-09-17', 'Typografos,iprint υπενθύμιση email', 1),
(19, 1, 'Γραφιστικά Μάγου', '', 'Giannis Tzoumpas', '2017-09-17', 'Επικοινωνία για την μακέτα του μάγου Τρίτη πρωί ', 1),
(20, 1, 'Φιλια Αρτας', '', 'Giannis Tzoumpas', '2017-09-17', 'Επικοινωνία για επιβεβαίωση μακέτας ', 1),
(21, 1, 'Δημιουργία δικού μας φυλλαδίου ', '', 'Giannis Tzoumpas', '2017-09-17', 'Δημιουργία δικού μας φυλλαδίου 10,000 τεμ Α5', 1),
(22, 1, 'Δημιουργία βινύλιου με στοιχεία πάνω  ', '', 'Giannis Tzoumpas', '2017-09-17', 'Δημιουργία βινύλιου με λογότυπα και στοιχεία πάνω ', 1),
(23, 1, 'Bill/Κάρτες/Φυλλάδια/Βινύλια ', '', 'Giannis Tzoumpas', '2017-09-17', 'Να δώσω στο Bill Κάρτες Φυλλάδια Βινύλια ', 1),
(24, 2, 'Διανομή Banner', '', 'Giannis Tzoumpas', '2017-09-17', 'Διανομή Banner Αύριο στις 8 το πρωί ', 1),
(25, 2, 'Δοκιμαστικό', '30/09/2017', 'Tzivaras Vasilis', '25/09/2017', 'Σβήσε το.', 1),
(26, 2, 'πληρωμη του ιντερνετ', '2017-10-07', 'Giannis Tzoumpas', '2017-09-25', 'πληρωμη του ιντερνετ 40ευρω', 1),
(27, 2, 'TEst', '29/09/2017', 'Giannis Tzoumpas', '26/09/2017', 'Hello there', 1),
(28, 1, 'testtitle', '2018-06-16', 'Tzivaras Vasilis', '16/06/2018', 'Some comments here.', 1),
(29, 2, 'Freddo Espresso', '2018-06-17', 'Βασίλης Τζιβάρας', '17/06/2018', '12:00 πμ', 1),
(30, 3, 'Cappucino', '2018-06-16', 'Βασίλης Τζιβάρας', '17/06/2018', 'Αμέσως να παει', 1),
(31, 2, 'Frape', '2018-06-15', 'Βασίλης Τζιβάρας', '21/06/2018', '', 1),
(32, 3, 'Cappucino', '2018-06-22', 'Γιάννης Τζούμπας', '21/06/2018', 'Καρδαμίτσια, Φιλικής Εταιρείας 39', 1),
(33, 2, 'Frape', '2018-06-22', 'Βασίλης Τζιβάρας', '21/06/2018', 'Σκέτο αχτύπητο', 1),
(34, 1, 'Nes Cafe', '2018-06-16', 'Βασίλης Τζιβάρας', '21/06/2018', 'Με extra γάλα', 1),
(35, 3, 'Frape', '2018-06-29', 'Βασίλης Τζιβάρας', '21/06/2018', 'Σκέτο σε χαμηλό ποτήρι', 1),
(36, 1, 'Cappucino', 'Με δύο επιπλέον μπισκότα και extra γάλα', 'Βασίλης Τζιβάρας', 'Αποστόλου Δημήτρης', 'Μαρίκας Κοτοπούλη 32, Αμπελόκηποι', 0),
(37, 2, 'Freddo Espresso', 'Χωρίς καλαμάκι σε χαμηλό ποτήρι', 'Βασίλης Τζιβάρας', 'Αγγέλου Νικος', 'Ρήγα Φεραίου 21, Καρδαμίτσια', 0),
(38, 3, 'Latte', '2018-06-22', 'Γιάννης Τζούμπας', '', 'Απλά και ελληνικά', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `realName` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`username`, `password`, `realName`) VALUES
('vasilis', '4e2304affac92fd2641187574b7d51db', 'Βασίλης Τζιβάρας'),
('jBonn', '990ca2b6df7da23b208a7be997b4996a', 'Γιάννης Τζούμπας');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shopid`);

--
-- Ευρετήρια για πίνακα `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT για πίνακα `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
