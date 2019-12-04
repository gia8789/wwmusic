-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 04, 2019 alle 18:51
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwmusic`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `brand`
--

INSERT INTO `brand` (`id_brand`, `name_brand`) VALUES
(1, 'Fender'),
(2, 'Ibanez'),
(3, 'Gibson'),
(4, 'Pearl'),
(5, 'Tama'),
(6, 'Yamaha');

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id_categ` int(5) NOT NULL,
  `name_categ` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`id_categ`, `name_categ`) VALUES
(1, 'Chitarre'),
(2, 'Bassi'),
(3, 'Tastiere'),
(4, 'Batterie');

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `id_product` int(7) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `categ_product` int(5) NOT NULL,
  `brand_product` int(5) NOT NULL,
  `description_product` varchar(2000) DEFAULT NULL,
  `price_product` double DEFAULT NULL,
  `image_product` varchar(200) DEFAULT NULL,
  `quantity_product` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `categ_product`, `brand_product`, `description_product`, `price_product`, `image_product`, `quantity_product`) VALUES
(1, 'Export Fusion', 4, 4, 'Il drum-set numero uno di vendite al mondo è tornato migliore che mai. La serie Export è un nome ogni batterista conosce. Qualsiasi batterista di successo di oggi è probabile che abbia iniziato a suonare su un kit Export. Questi kit hanno iniziato migliaia di batteristi offrendo contemporaneamente qualità e convenienza. Ora, 30 anni dopo, Export lo ripete. Grandi caratteristiche come la composizione dei fusti di ispirazione Reference, pedale grancassa P-930, supporti tom Opti-Loc, ed il sistema hardware completamente ridisegnato rendono il valore ancora più grande. La Serie Export di Pearl offre una ricetta acusticamente avanzata di strati di legni premium disposti strategicamente per massimizzare la risposta in frequenza di ogni componente. Come per tutti i tamburi Pearl, ogni fusto è formato dal processo di costruzione SST che utilizza calore estremo, giunzioni di precisione, l\'esclusiva Acoustiglue Pearl ed oltre 450kg di pressione idraulica per creare la migliore camera d\'aria acustica.', 699, 'export_fusion.png', 6),
(2, 'Les Paul Standard', 1, 3, 'La Les Paul Standard HP conserva molte caratteristiche Gibson popolari, tra cui il profilo asimmetrico del manico Slim Taper, migliorando l\'uso con un aggiornamento dei venerati pick-up humbucker PAF ed un top in acero figurato AAA+ con abbellimenti di alto livello. Il modello HP offre innovazioni all\'avanguardia per i chitarristi che guardano oltre, tra le quali un accesso veloce alla parte bassa della tastiera, larghezza del manico da solista, capotasto zero-fret e sellette regolabili in titanio. Una varietà timbrica eccezionale fornita da 4 potenziometri push-pull con DIP switch per oltre 150 possibilità di rewiring istantanei reversibili.', 2599, 'lespaul.png', 3),
(3, 'Precision American Standard', 2, 1, 'Il Precision Bass American Standard è lo stesso strumento robusto, potente e di successo di sempre, ma ora è migliorato grazie ad un pickup splittato \'60s Precision Bass Fender Custom Shop dal suono sismico. L\'ultima incarnazione della più moderna ed indistruttibile macchina da lavoro che rivoluzionò la musica pop, ancora più forte e più indispensabile che mai.', 1699, 'precision.png', 3),
(4, 'PSR SX700', 3, 6, 'La musica offre possibilità illimitate e la PSR-SX è attrezzata per supportare le tue avventure ai confini della creatività. Con un\'interfaccia utente completamente ridisegnata, nuove funzioni assegnabili, joystick e controller Live, puoi personalizzare le funzioni e il suono degli strumenti, ovunque ti portino i tuoi viaggi musicali. Perfetta per il songwriting, la PSR-SX è ricca di pattern ritmici (chiamati \"Style\") che abbracciano molti generi musicali, rendendola ideale per creare l\'accompagnamento delle tue idee musicali e una preziosa ispirazione per la tua prossima composizione o arrangiamento. Insieme a una straordinaria gamma di suoni espressivi e armonie vocali, la PSR-SX è la tua perfetta partner musicale. Ogni grande canzone inizia come un\'idea: una semplice melodia o un ritmo che si perfeziona con l\'accompagnamento e si organizza in un pezzo finito. Con una workstation arranger Yamaha PSR-SX700, troverai quel processo magico più fluido, più veloce e più intuitivo che mai.', 1129, 'psrsx700.png', 4),
(5, 'AM ULTRA Stratocaster MN Texas Tea', 1, 1, 'American Ultra è la serie di chitarre e bassi Fender più avanzata per musicisti esigenti che richiedono il massimo in termini di precisione, performance e suono. L\'American Ultra Stratocaster presenta un esclusivo profilo del manico \"Modern D\" con bordi della tastiera arrotondati per ore di comfort, mantre la parte inferiore del manico affusolata consente un accesso facile al registro più alto. Una tastiera a raggio composito da 10\"-14\" con 22 tasti medium-jumbo vogliono dire assoli facili e precisi, mentre i pickup Ultra Noiseless ed il cablaggio avanzato offrono infinite possibilità timbriche - senza ronzio. Questo strumento versatile ed all\'avanguardia ti ispirerà a spingere la tua musica versi nuovi livelli. Altre caratteristiche includono meccaniche sigillate, hardware cromato e capotasto in osso. Include anche una custodia rigida premium.', 1979, 'stratocaster.png', 3),
(6, 'American Professional Telecaster MN Black', 1, 1, 'Fender è guidata da una direttiva chiara e semplice: rendere migliore la vita dei musicisti. Mentre la Telecaster originale lo ha certamente fatto (e anche di più), alla Fender non erano contenti di riposare sugli allori. Il team di scienziati pazzi Fender ha esaminato ogni elemento con minuzia quasi microscopica. \"Se eravamo capaci di migliorarla con un nuovo design o con materiali moderni lo abbiamo fatto; se non c\'era bisogno di miglioramenti, abbiamo lasciato perdere\". Quando i trucioli di legno e fumi delle saldature si sono depositati, ciò che restava era l\'American Professional Telecaster - tutto il necessario per suonare al meglio. I pickup V-Mod Telecaster sono progettati utilizzando un mix brevettato di tipi di magneti in Alnico per i pick-up al manico e al ponte. Ogni pick-up è progettato specificamente per la sua posizione, creando un suono high-output con il calore vintage ed il suono frizzante e nitido che ha reso Fender una leggenda. I tasti narrow-tall sono più alti e stretti rispetto ai loro cugini medium jumbo, e sono particolarmente efficaci per il bending delle note e per suonare gli accordi con una intonazione perfetta su tutta la tastiera. Il circuito treble-bleed mantiene le alte frequenze quando si ruota verso il basso la manopola del volume per ridurre il gain, lasciando risplendere il suono, non importa come sia impostato il volume dello strumento.', 1589, 'telecaster.png', 2),
(7, 'BTB1826 NTL Natural', 2, 2, 'Senza dubbio, il tuo strumento dovrebbe eguagliare la qualità dei tuoi sforzi. Ad un certo punto viene in mente la parola \"boutique\": materiali selezionati, costruzione con manico neck-thru e componenti di alta qualità, il tutto in uno strumento meticolosamente realizzato. Ma per quanto riguarda il prezzo? E\' qui che entra in gioco Ibanez. La capacità di costruire con la qualità di un piccolo negozio in strumenti stimolanti ma accessibili è messa in mostra dai bassi della serie BTB.', 1539, 'btb1826.png', 3),
(8, 'RM52KH6C CCM', 4, 5, 'Le batterie entry-level Tama Rythm Mate forniscono bordi dei fusti precisi per la facilità di accordatura di cui hanno bisogno i batteristi principianti e la vasta gamma di accordature che richiedono i professionisti. I cerchi originali Tama Accu-Tune della cassa offrono una accordatura più veloce e più coerente dei cerchi metallici tradizionali. E se ciò non bastasse, l\'hardware è dotata di gambe a doppia staffa per una maggiore stabilità. Le batterie Tama Rhythm Mate hanno cambiato il modo di progettare i kit entry-level', 589, 'rm52kh6c.png', 2),
(9, 'PSR SX900', 3, 6, 'La PSR-SX900 è dotata del contenuto della workstation digitale Genos ammiraglia di Yamaha. Questo contenuto premium suona in modo sorprendente grazie al sistema di altoparlanti bi-amplificato all\'avanguardia con la sua ampia immagine stereo. Naviga rapidamente e facilmente utilizzando il luminoso touchscreen TFT a colori da 7\" o imposta i pulsanti assegnabili per accedere istantaneamente alle tue funzioni preferite. Yamaha ha dotato la Yamaha di altre nuove funzionalità, tra cui un joystick controller, Chord Looper, nuova struttura di insert degli effetti, sezione Style reset, una nuova action della tastiera Yamaha con un fantastico feeling e molto altro. Ogni grande canzone inizia come un\'idea: una semplice melodia o un ritmo che si perfeziona con l\'accompagnamento e si organizza in un pezzo finito. Con una workstation arranger Yamaha PSR-SX900, troverai quel processo magico più fluido e intuitivo che mai.', 1959, 'psrsx900.png', 2);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `categ_product` (`categ_product`),
  ADD KEY `brand_product` (`brand_product`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id_categ` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categ_product`) REFERENCES `category` (`id_categ`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_product`) REFERENCES `brand` (`id_brand`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
