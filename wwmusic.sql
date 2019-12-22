-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 22, 2019 alle 18:07
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
(1, 'Export Fusion', 4, 4, '<p>Il drum-set numero uno di vendite al mondo &egrave; tornato migliore che mai. La serie Export &egrave; un nome ogni batterista conosce. Qualsiasi batterista di successo di oggi &egrave; probabile che abbia iniziato a suonare su un kit Export. Questi kit hanno iniziato migliaia di batteristi offrendo contemporaneamente qualit&agrave; e convenienza. Ora, 30 anni dopo, Export lo ripete. Grandi caratteristiche come la composizione dei fusti di ispirazione Reference, pedale grancassa P-930, supporti tom Opti-Loc, ed il sistema hardware completamente ridisegnato rendono il valore ancora pi&ugrave; grande. La Serie Export di Pearl offre una ricetta acusticamente avanzata di strati di legni premium disposti strategicamente per massimizzare la risposta in frequenza di ogni componente. Come per tutti i tamburi Pearl, ogni fusto &egrave; formato dal processo di costruzione SST che utilizza calore estremo, giunzioni di precisione, l&#39;esclusiva Acoustiglue Pearl ed oltre 450kg di pressione idraulica per creare la migliore camera d&#39;aria acustica.</p>\r\n', 699, 'samples/drum_sample.jpeg', 6),
(2, 'Les Paul Standard', 1, 3, '<p>La Les Paul Standard HP conserva molte caratteristiche Gibson popolari, tra cui il profilo asimmetrico del manico Slim Taper, migliorando l&#39;uso con un aggiornamento dei venerati pick-up humbucker PAF ed un top in acero figurato AAA+ con abbellimenti di alto livello. Il modello HP offre innovazioni all&#39;avanguardia per i chitarristi che guardano oltre, tra le quali un accesso veloce alla parte bassa della tastiera, larghezza del manico da solista, capotasto zero-fret e sellette regolabili in titanio. Una variet&agrave; timbrica eccezionale fornita da 4 potenziometri push-pull con DIP switch per oltre 150 possibilit&agrave; di rewiring istantanei reversibili.</p>\r\n', 2599, 'samples/guitar_sample.jpeg', 10),
(3, 'Precision American Standard', 2, 1, '<p>Il Precision Bass American Standard &egrave; lo stesso strumento robusto, potente e di successo di sempre, ma ora &egrave; migliorato grazie ad un pickup splittato &#39;60s Precision Bass Fender Custom Shop dal suono sismico. L&#39;ultima incarnazione della pi&ugrave; moderna ed indistruttibile macchina da lavoro che rivoluzion&ograve; la musica pop, ancora pi&ugrave; forte e pi&ugrave; indispensabile che mai.</p>\r\n', 1699, 'samples/bass_sample.jpeg', 3),
(4, 'PSR SX700', 3, 6, '<p>La musica offre possibilit&agrave; illimitate e la PSR-SX &egrave; attrezzata per supportare le tue avventure ai confini della creativit&agrave;. Con un&#39;interfaccia utente completamente ridisegnata, nuove funzioni assegnabili, joystick e controller Live, puoi personalizzare le funzioni e il suono degli strumenti, ovunque ti portino i tuoi viaggi musicali. Perfetta per il songwriting, la PSR-SX &egrave; ricca di pattern ritmici (chiamati &quot;Style&quot;) che abbracciano molti generi musicali, rendendola ideale per creare l&#39;accompagnamento delle tue idee musicali e una preziosa ispirazione per la tua prossima composizione o arrangiamento. Insieme a una straordinaria gamma di suoni espressivi e armonie vocali, la PSR-SX &egrave; la tua perfetta partner musicale. Ogni grande canzone inizia come un&#39;idea: una semplice melodia o un ritmo che si perfeziona con l&#39;accompagnamento e si organizza in un pezzo finito. Con una workstation arranger Yamaha PSR-SX700, troverai quel processo magico pi&ugrave; fluido, pi&ugrave; veloce e pi&ugrave; intuitivo che mai.</p>\r\n', 1129, 'samples/keyboard_sample.jpeg', 4),
(5, 'AM ULTRA Stratocaster MN Texas Tea', 1, 1, '<p>American Ultra &egrave; la serie di chitarre e bassi Fender pi&ugrave; avanzata per musicisti esigenti che richiedono il massimo in termini di precisione, performance e suono. L&#39;American Ultra Stratocaster presenta un esclusivo profilo del manico &quot;Modern D&quot; con bordi della tastiera arrotondati per ore di comfort, mantre la parte inferiore del manico affusolata consente un accesso facile al registro pi&ugrave; alto. Una tastiera a raggio composito da 10&quot;-14&quot; con 22 tasti medium-jumbo vogliono dire assoli facili e precisi, mentre i pickup Ultra Noiseless ed il cablaggio avanzato offrono infinite possibilit&agrave; timbriche - senza ronzio. Questo strumento versatile ed all&#39;avanguardia ti ispirer&agrave; a spingere la tua musica versi nuovi livelli. Altre caratteristiche includono meccaniche sigillate, hardware cromato e capotasto in osso. Include anche una custodia rigida premium.</p>\r\n', 1979, 'samples/guitar_sample.jpeg', 3),
(6, 'American Professional Telecaster MN Black', 1, 1, '<p>Fender &egrave; guidata da una direttiva chiara e semplice: rendere migliore la vita dei musicisti. Mentre la Telecaster originale lo ha certamente fatto (e anche di pi&ugrave;), alla Fender non erano contenti di riposare sugli allori. Il team di scienziati pazzi Fender ha esaminato ogni elemento con minuzia quasi microscopica. &quot;Se eravamo capaci di migliorarla con un nuovo design o con materiali moderni lo abbiamo fatto; se non c&#39;era bisogno di miglioramenti, abbiamo lasciato perdere&quot;. Quando i trucioli di legno e fumi delle saldature si sono depositati, ci&ograve; che restava era l&#39;American Professional Telecaster - tutto il necessario per suonare al meglio. I pickup V-Mod Telecaster sono progettati utilizzando un mix brevettato di tipi di magneti in Alnico per i pick-up al manico e al ponte. Ogni pick-up &egrave; progettato specificamente per la sua posizione, creando un suono high-output con il calore vintage ed il suono frizzante e nitido che ha reso Fender una leggenda. I tasti narrow-tall sono pi&ugrave; alti e stretti rispetto ai loro cugini medium jumbo, e sono particolarmente efficaci per il bending delle note e per suonare gli accordi con una intonazione perfetta su tutta la tastiera. Il circuito treble-bleed mantiene le alte frequenze quando si ruota verso il basso la manopola del volume per ridurre il gain, lasciando risplendere il suono, non importa come sia impostato il volume dello strumento.</p>\r\n', 1589, 'samples/guitar_sample.jpeg', 2),
(7, 'BTB1826 NTL Natural', 2, 2, '<p>Senza dubbio, il tuo strumento dovrebbe eguagliare la qualit&agrave; dei tuoi sforzi. Ad un certo punto viene in mente la parola &quot;boutique&quot;: materiali selezionati, costruzione con manico neck-thru e componenti di alta qualit&agrave;, il tutto in uno strumento meticolosamente realizzato. Ma per quanto riguarda il prezzo? E&#39; qui che entra in gioco Ibanez. La capacit&agrave; di costruire con la qualit&agrave; di un piccolo negozio in strumenti stimolanti ma accessibili &egrave; messa in mostra dai bassi della serie BTB.</p>\r\n', 1539, 'samples/bass_sample.jpeg', 3),
(8, 'RM52KH6C CCM', 4, 5, '<p>Le batterie entry-level Tama Rythm Mate forniscono bordi dei fusti precisi per la facilit&agrave; di accordatura di cui hanno bisogno i batteristi principianti e la vasta gamma di accordature che richiedono i professionisti. I cerchi originali Tama Accu-Tune della cassa offrono una accordatura pi&ugrave; veloce e pi&ugrave; coerente dei cerchi metallici tradizionali. E se ci&ograve; non bastasse, l&#39;hardware &egrave; dotata di gambe a doppia staffa per una maggiore stabilit&agrave;. Le batterie Tama Rhythm Mate hanno cambiato il modo di progettare i kit entry-level</p>\r\n', 589, 'samples/drum_sample.jpeg', 2),
(9, 'PSR SX900', 3, 6, '<p>La PSR-SX900 &egrave; dotata del contenuto della workstation digitale Genos ammiraglia di Yamaha. Questo contenuto premium suona in modo sorprendente grazie al sistema di altoparlanti bi-amplificato all&#39;avanguardia con la sua ampia immagine stereo. Naviga rapidamente e facilmente utilizzando il luminoso touchscreen TFT a colori da 7&quot; o imposta i pulsanti assegnabili per accedere istantaneamente alle tue funzioni preferite. Yamaha ha dotato la Yamaha di altre nuove funzionalit&agrave;, tra cui un joystick controller, Chord Looper, nuova struttura di insert degli effetti, sezione Style reset, una nuova action della tastiera Yamaha con un fantastico feeling e molto altro. Ogni grande canzone inizia come un&#39;idea: una semplice melodia o un ritmo che si perfeziona con l&#39;accompagnamento e si organizza in un pezzo finito. Con una workstation arranger Yamaha PSR-SX900, troverai quel processo magico pi&ugrave; fluido e intuitivo che mai.</p>\r\n', 1959, 'samples/keyboard_sample.jpeg', 2),
(22, 'TRBX174 Metallic Red', 2, 6, '<p>Yamaha ha rinnovato la lineup dei bassi con una nuova serie: i TRBX. Pensati e progettati da bassisti per i bassisti tenendo in considerazione tutte le caratteristiche e le qualit&agrave; che desiderano per soddisfare le loro esigenze di musicisti, questa nuova linea di bassi &egrave; la scelta perfetta sia per i professionisti che per i semplici appasionati. Il manico pi&ugrave; &#39;veloce&#39; mai progettato da Yamaha ti metter&agrave; a tuo agio fin dal primo approccio con lo strumento, il corpo in mogano insieme ad un nuovissimo sistema di preamp ti garantir&agrave; invece una gamma ampissima di sonorit&agrave; attorno a cui scolpire il suono perfetto per il tuo stile. La serie TRBX174 &egrave; stata pensata per coloro che iniziano a suonare ma vogliono un prodotto affidabile e realizzato con la professionalit&agrave; e la qualit&agrave; che contraddistinguono Yamaha.</p>\r\n', 299, 'samples/bass_sample.jpeg', 5),
(24, 'GENOS', 3, 6, '<p>Realizzata con una tecnologia Yamaha appositamente sviluppata, la qualit&agrave; sonora di ogni Voice in Genos &egrave; al di l&agrave; di qualsiasi altra workstation digitale che tu abbia mai suonato. Tutto quello che senti, che sia il bellissimo pianoforte CFX, l&#39;esuberante Kino String o le Revo Drums, ti spazzer&agrave; via. La tecnologia AEM (Articulation Element Modeling) simula le caratteristiche degli strumenti musicali. Durante una performance questa tecnologia suona in tempo reale i campioni appropriati, in base a cosa e come si suona. I campioni sono associati e articolati facilmente - come accade naturalmente su uno strumento acustico reale. I kit Revo! Drum ricreano i suoni di batteria pi&ugrave; realistici. Anche quando suoni pi&ugrave; volte lo stesso tasto, il suono avr&agrave; sempre una sfumatura diversa, rendendolo incredibilmente naturale e realistico</p>\r\n', 2999, 'samples/keyboard_sample.jpeg', 1),
(26, 'SBP2F5', 4, 6, '<p>Cos&igrave; come accadde con l&#39;introduzione della Stage Custom nel 1995, YAMAHA definisce nuovamente gli standard di valore e suono. La nuova Stage Custom eredita fusti in legno di betulla al 100%, con hardware migliorato. Il fusto &egrave; un fattore chiave nella capacit&agrave; di un tamburo di &quot;rimbombare&quot;, o risuonare. Di conseguenza, la Stage Custom impiega il 100% di Betulla - un classico nel campo dei drum kit di alta classe. Inoltre, con la sua struttura a sei strati, la Stage Custom trasmette con precisione le vibrazioni prodotte sulla superficie d&#39;impatto, ottenendo prestazioni che travolgono qualunque cosa nella stessa categoria.</p>\r\n', 599, 'samples/drum_sample.jpeg', 3);

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
  ADD UNIQUE KEY `name+brand_unique` (`name_product`,`brand_product`) USING BTREE,
  ADD KEY `categ_foreign` (`categ_product`) USING BTREE,
  ADD KEY `brand_foreign` (`brand_product`) USING BTREE;

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
  MODIFY `id_product` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
