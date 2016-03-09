-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2016 at 09:24 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvchocolates`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrizione` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descrizione` (`descrizione`),
  KEY `descrizione_2` (`descrizione`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `descrizione`) VALUES
(2, 'al latte'),
(1, 'bianco'),
(3, 'fondente');

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE IF NOT EXISTS `clienti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `citta` varchar(100) NOT NULL,
  `cap` varchar(5) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`id`, `nome`, `cognome`, `email`, `indirizzo`, `citta`, `cap`, `provincia`) VALUES
(1, 'Massimiliano', '', '', '', '', '', 'GO'),
(2, 'MASSIMILIANO', '', '', '', '', '', 'GO');

-- --------------------------------------------------------

--
-- Table structure for table `giacenze`
--

CREATE TABLE IF NOT EXISTS `giacenze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codice` varchar(11) NOT NULL,
  `qta` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codice` (`codice`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `giacenze`
--

INSERT INTO `giacenze` (`id`, `codice`, `qta`) VALUES
(8, 'MINK1', 2),
(9, 'GIANDUJA', 0),
(10, 'GUANABIANCO', 3),
(11, 'GUANA1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordini`
--

CREATE TABLE IF NOT EXISTS `ordini` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `totale` int(11) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_clienteid` (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ordini`
--

INSERT INTO `ordini` (`id`, `cliente_id`, `data`, `totale`, `note`) VALUES
(18, 18, '2016-03-07', 500, '');

-- --------------------------------------------------------

--
-- Table structure for table `ordini_dettagli`
--

CREATE TABLE IF NOT EXISTS `ordini_dettagli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordine_id` int(11) NOT NULL,
  `codice_prodotto` varchar(20) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `quantita` int(11) NOT NULL,
  `totale` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ordine` (`ordine_id`),
  KEY `idx_prodottocodice` (`codice_prodotto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ordini_dettagli`
--

INSERT INTO `ordini_dettagli` (`id`, `ordine_id`, `codice_prodotto`, `prezzo`, `quantita`, `totale`) VALUES
(25, 18, 'GUANA1', 500, 1, 500);

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE IF NOT EXISTS `prodotti` (
  `codice` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descrizione` text,
  `ingredienti` text NOT NULL,
  `conservazione` text NOT NULL,
  `scadenza` varchar(100) NOT NULL,
  `dimensioni` varchar(100) NOT NULL,
  `peso_netto` int(11) NOT NULL,
  `prezzo` int(11) NOT NULL,
  `url_immagine` varchar(200) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`codice`),
  KEY `id_categoria` (`id_categoria`),
  KEY `codice` (`codice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`codice`, `nome`, `descrizione`, `ingredienti`, `conservazione`, `scadenza`, `dimensioni`, `peso_netto`, `prezzo`, `url_immagine`, `id_categoria`) VALUES
('Caffe', 'Caffe Portorico', NULL, '', '', '', '', 0, 0, '', 0),
('GIANDUJA', 'GIANDUJA', 'Tavoletta di cioccolato GIANDUJA', 'pasta di cacao, zucchero di canna, burro di cacao, vaniglia. Cacao min. 74%. Può contenere tracce di nocciole, mandorle, pistacchi, noci, latte.', 'conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.', '14 mesi', '9 x 15,5 x 1,2 cm', 50, 660, 'http://www.thechocolatelife.info/thechocolatelife/NING_ARCHIVE/discussions/1-1000/954-creminooct2011.jpg', 2),
('GUANA1', 'GUANA - cioccolato fondente', 'Tavoletta di cioccolato fondente extra al 74%', 'pasta di cacao, zucchero di canna, burro di cacao, vaniglia. Cacao min. 74%. Può contenere tracce di nocciole, mandorle, pistacchi, noci, latte.', 'conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.', '14 mesi', '9 x 15,5 x 1,2 cm', 50, 500, 'https://c1.staticflickr.com/3/2369/2458986998_c81485c2db_z.jpg?zz=1', 3),
('GUANABIANCO', 'GUANABIANCO', 'Tavoletta di cioccolato al latte CON NOCCIOLE', 'pasta di cacao, zucchero di canna, burro di cacao, vaniglia. Cacao min. 74%. Può contenere tracce di nocciole, mandorle, pistacchi, noci, latte.', 'conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.', '14 mesi', '9 x 15,5 x 1,2 cm', 50, 660, 'http://www.oxicoa.com/WebRoot/StoreIT5/Shops/16077/5284/F35A/BE49/183C/7522/3E95/9310/D5A5/Nocciolato_al_latte_Oxicoa.jpg', 2),
('MINK1', 'MINK', 'Tavoletta di cioccolato al latte', 'pasta di cacao, zucchero di canna, burro di cacao, vaniglia, latte. Cacao min. 30%.', 'conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.', '8 mesi', '9 x 15,5 x 1 cm', 75, 299, 'https://c1.staticflickr.com/5/4027/4429686185_0e5ac89112_z.jpg?zz=1', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
