-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2016 at 09:29 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
  PRIMARY KEY (`codice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`codice`, `nome`, `descrizione`, `ingredienti`, `conservazione`, `scadenza`, `dimensioni`, `peso_netto`, `prezzo`, `url_immagine`) VALUES
('GUANA1', 'GUANA - cioccolato fondente', 'Tavoletta di cioccolato fondente extra al 74%', 'pasta di cacao, zucchero di canna, burro di cacao, vaniglia. Cacao min. 74%. Può contenere tracce di nocciole, mandorle, pistacchi, noci, latte.', 'conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.', '14 mesi', '9 x 15,5 x 1,2 cm', 50, 500, 'https://c1.staticflickr.com/3/2369/2458986998_c81485c2db_z.jpg?zz=1'),
('MINK1', 'MINK', 'Tavoletta di cioccolato al latte', 'pasta di cacao, zucchero di canna, burro di cacao, vaniglia, latte. Cacao min. 30%.', 'conservare in luogo fresco e asciutto, max 18°C. Degustare a temperatura ambiente.', '8 mesi', '9 x 15,5 x 1 cm', 75, 299, 'https://c1.staticflickr.com/5/4027/4429686185_0e5ac89112_z.jpg?zz=1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `fk_ordini_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clienti` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ordini_dettagli`
--
ALTER TABLE `ordini_dettagli`
  ADD CONSTRAINT `fk_ordinidettagli_ordine` FOREIGN KEY (`ordine_id`) REFERENCES `ordini` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordinidettagli_prodotto` FOREIGN KEY (`codice_prodotto`) REFERENCES `prodotti` (`codice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
