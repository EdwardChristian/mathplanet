-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 04, 2019 la 08:26 PM
-- Versiune server: 10.1.38-MariaDB
-- Versiune PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `mathplanet`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `user` text NOT NULL,
  `parola` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `admin`
--

INSERT INTO `admin` (`ID`, `user`, `parola`) VALUES
(2, 'admin', '$2y$10$OIhn1mOMnOzeHoYqqy0G0OhPqsowCHLRY/hz4v7ZPkerSgmVD3H3O');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `dictionar`
--

CREATE TABLE `dictionar` (
  `id` int(11) NOT NULL,
  `Termen` text NOT NULL,
  `Descriere` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `dictionar`
--

INSERT INTO `dictionar` (`id`, `Termen`, `Descriere`) VALUES
(3, 'Teorema lui Pitagora', 'Teorema lui Pitagora este una dintre cele mai cunoscute teoreme din geometria euclidianÄƒ, constituind o relaÈ›ie Ã®ntre cele trei laturi ale unui triunghi dreptunghic. Teorema lui Pitagora afirmÄƒ cÄƒ Ã®n orice triunghi dreptunghic, suma pÄƒtratelor catetelor este egalÄƒ cu pÄƒtratul ipotenuzei (latura opusÄƒ unghiului drept). Teorema poate fi scrisÄƒ sub forma unei relaÈ›ii Ã®ntre cele trei laturi a, b È™i c, cÃ¢teodatÄƒ denumitÄƒ relaÈ›ia lui Pitagora: a^2 + b^2 = c^2 ; unde c reprezintÄƒ lungimea ipotenuzei, iar a È™i b lungimile celorlalte douÄƒ laturi ale triunghiului.'),
(6, 'Teorema lui Thales', 'O paralela dusa la una din laturile unui triunghi determina pe celelalte doua laturi segmente proportionale. '),
(7, 'Teorema cosinusului', 'ÃŽn geometria planÄƒ, teorema cosinusului, cunoscutÄƒ È™i sub numele de teorema lui Pitagora generalizatÄƒ stabileÈ™te relaÈ›ia dintre lungimea unei laturi a unui triunghi Ã®n funcÈ›ie de celelalte douÄƒ laturi ale sale È™i cosinusul unghiului dintre ele. '),
(8, 'Teorema fundamentalÄƒ a algebrei', '\r\nTeorema fundamentalÄƒ a algebrei afirmÄƒ cÄƒ orice polinom neconstant cu o singurÄƒ variabilÄƒ È™i coeficienÈ›i complecÈ™i are cel puÈ›in o rÄƒdÄƒcinÄƒ complexÄƒ. ÃŽntrucÃ¢t mulÈ›imea numerelor reale este inclusÄƒ Ã®n cea complexÄƒ, automat include È™i polinoamele cu coeficienÈ›i reali. '),
(9, 'Teorema fundamentalÄƒ a aritmeticii', '\r\nTeorema fundamentalÄƒ a aritmeticii sau Teorema factorizÄƒrii unice este o teoremÄƒ care afirmÄƒ cÄƒ orice numÄƒr Ã®ntreg poate fi exprimat Ã®n mod unic ca produs de numere prime. \r\n'),
(10, 'Teorema medianei', 'ÃŽn geometria planÄƒ, teorema medianei stabileÈ™te o relaÈ›ie Ã®ntre lungimea unei mediane dintr-un triunghi È™i lungimile laturilor triunghiului.. \r\nÃŽntr-un triunghi dreptunghic lungimea medianei corespunzÄƒtoare unghiului drept este egalÄƒ cu jumÄƒtate din lungimea ipotenuzei. '),
(11, 'Teorema sinusurilor', 'ÃŽn geometrie, teorema sinusurilor este o teoremÄƒ care stabileÈ™te relaÈ›ia dintre valorile laturilor unui triunghi È™i sinusurile unghiurilor dintre ele. '),
(12, 'Teorema bisectoarei', 'ÃŽn geometrie, teorema bisectoarei exprimÄƒ o relaÈ›ie Ã®ntre lungimile segmentelor determinate de bisectoarea unui unghi al triunghiului pe latura pe care cade È™i cele ale laturilor acelui unghi. '),
(13, 'Teorema ariilor', 'ÃŽn orice triunghi dreptunghic, produsul lungimii catetelor este egal cu produsul dintre lungimea ipotenuzei È™i lungimea Ã®nÄƒlÈ›imii corespunzÄƒtoare acesteia. Justificarea este imediatÄƒ, considerÃ¢nd cÄƒ aria triunghiului are aceeaÈ™i valoare, indiferent de care laturÄƒ este consideratÄƒ \"bazÄƒ\". \r\nConsecinÈ›Äƒ: Lungimea Ã®nÄƒlÈ›imii dusÄƒ din vÃ¢rful unghiului drept este egalÄƒ cu produsul lungimii catetelor Ã®mpÄƒrÈ›it la lungimea ipotenuzei. '),
(14, 'Teorema', 'Teorema reprezintÄƒ o afirmaÈ›ie al cÄƒrei adevÄƒr se stabileÈ™te prin demonstraÈ›ie.\r\n\r\nFiecare ramurÄƒ a matematicii este constituitÄƒ dintr-un È™ir de teoreme, demonstraÈ›ia fiecÄƒreia dintre ele sprijinindu-se pe teorema care o precedÄƒ.'),
(15, 'Sinus', 'Sinus (sin) este o funcÈ›ie trigonometricÄƒ periodicÄƒ, definitÄƒ Ã®n contextul unui triunghi dreptunghic ca fiind raportul dintre cateta opusÄƒ È™i ipotenuzÄƒ. Este o funcÈ›ie imparÄƒ. Curba care reprezintÄƒ grafic valorile funcÈ›iei sinus se numeÈ™te sinusoidÄƒ.\r\n\r\nA fost introdus de gÃ¢nditorul arab Al-Battani prin anii 830 e.n.'),
(16, 'Cosinus', 'Cosinus (cos) este o funcÈ›ie trigonometricÄƒ periodicÄƒ, definitÄƒ Ã®n contextul unui triunghi dreptunghic ca fiind raportul dintre cateta alÄƒturatÄƒ È™i ipotenuzÄƒ.'),
(17, 'Tangenta', 'Tangenta (abreviatÄƒ tg sau tan) este o funcÈ›ie trigonometricÄƒ periodicÄƒ, definitÄƒ Ã®n contextul unui triunghi dreptunghic ca fiind raportul dintre cateta opusÄƒ È™i cateta alÄƒturatÄƒ:'),
(18, 'Cotangenta', 'Cotangenta (abreviatÄƒ ctg sau cot) este o funcÈ›ie trigonometricÄƒ periodicÄƒ, definitÄƒ Ã®n contextul unui triunghi dreptunghic ca fiind raportul dintre cateta alÄƒturatÄƒ È™i cateta opusÄƒ'),
(19, 'Punct', 'o Ã®nÅ£epÄƒturÄƒ de ac fÄƒrÄƒ grosime, pe o suprafaÅ£Äƒ.'),
(20, 'Drepte paralele', 'douÄƒ drepte coplanare ce nu au un punct comun.');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `intrebari`
--

CREATE TABLE `intrebari` (
  `ID` int(11) NOT NULL,
  `intrebare` text NOT NULL,
  `raspuns` text NOT NULL,
  `V1` text NOT NULL,
  `V2` text NOT NULL,
  `V3` text NOT NULL,
  `V4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `intrebari`
--

INSERT INTO `intrebari` (`ID`, `intrebare`, `raspuns`, `V1`, `V2`, `V3`, `V4`) VALUES
(1, 'Cat este rezultatul calculului: (24*30)/72 ?', 'a', '10', '20', '13,5', '24'),
(5, '1 + 2 + 3 + ... + 1000 = ?', '500500', '0', '0', '0', '0'),
(6, 'Patratul lui 58 = ?', '3364', '0', '0', '0', '0'),
(7, 'Cati divizori are 18?', 'c', '7', '5', '6', '2'),
(8, 'Partea intreaga a lui 3,141528 este = ?', '3', '0', '0', '0', '0'),
(10, 'Care este numarul maxim de solutii ale ecuatiei\r\n x^336 + x^335 + ... + x^2 + x + 1 = 0', '336', '0', '0', '0', '0'),
(11, 'Solutia unica a ecuatiei \r\nx^2 + 2x + 1 = 0', '-1', '0', '0', '0', '0'),
(12, 'Solutia pozitiva a ecuatiei x^2 = 4 este', '2', '0', '0', '0', '0'),
(13, 'Care este aria triunghiului dreptunghic ABC ,stiind ca AB=3 , BC=4 si AC=5 ?', '6', '0', '0', '0', '0'),
(14, 'Cati ari are un hectar?', '100', '0', '0', '0', '0'),
(15, 'sin^2(x) + cos^2(x) = ?', '1', '0', '0', '0', '0'),
(16, 'Cu ce este egal sin(2x)?', 'c', 'sin^2(x)', '-cos(2x)', '2sin(x)cos(x)', 'sin(x)cos(x)'),
(21, 'Rezultatul calcului 3*10-60:3', 'd', '-50', '30', '60', '10'),
(22, 'Aria unui cerc este egala cu 100Ï€cm^2. Raza acestui cerc este egala cu:', '10', '0', '0', '0', '0'),
(23, 'Rezultatul calculului 10 + (3+7):10 este', '11', '0', '0', '0', '0'),
(24, 'Sase caiete de acelasi fel costa in total 18 lei. Trei dintre aceste caiete costa in total', 'c', '6', '3', '9', '12'),
(25, 'Inversul lui 2 este', 'b', '0.2', '1/2', '-2', '2 nu are invers'),
(26, 'In triunghiul echilateral ABC, masura unghiului B este', '60', '0', '0', '0', '0'),
(27, 'Produsul numerelor intregi din intervalul [1;2] este', '2', '0', '0', '0', '0');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `dictionar`
--
ALTER TABLE `dictionar`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `intrebari`
--
ALTER TABLE `intrebari`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `dictionar`
--
ALTER TABLE `dictionar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `intrebari`
--
ALTER TABLE `intrebari`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
