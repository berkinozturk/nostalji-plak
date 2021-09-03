-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 Tem 2021, 22:54:55
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `musiconline_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Album'),
(2, 'Vinyl'),
(3, 'EP'),
(4, 'LP');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`) VALUES
(68, 46, '0001', 'Completed', 'GBP');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_artist` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL DEFAULT 'default_image.jpg',
  `products_embed_spotify` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `product_price`, `product_quantity`, `product_description`, `product_artist`, `product_image`, `products_embed_spotify`) VALUES
(1, 'GDL Retro Canta Pikap T317 - Mavi (Dahili Sarjli)\r\n', 4, 20.99, 1, '• Gdl Retro Canta Nostaljik Pikap T317\r\n\r\n• Dâhili Hoparlör ( Baska bir cihaz baglamaniza gerek yok, direkt prize tak?p çalistirabilirsiniz. )\r\n\r\n• 33-45-78 Rpm Hiz secenegi (Otomatik & Manuel)\r\n\r\n• Asansor Sistemi kol ile kontrol', 'Trivium', 'gdl2.png', ''),
(2, 'Crownwell Pikap Cantali Onden Hoparlorlu Kirmizi Renk\r\n', 4, 20.99, 4, 'Nostaljik tarz olup, modernize edilmistir. Tamam? ahsap malzemeden üretilmistir. Dis bölümü suni deri kaplamadir.', 'Crownwell', 'crown.png', NULL),
(3, 'Ktools Retro K216 Siyah Pikap', 4, 20.99, 4, 'Rakiplerinden farkli olarak ayakta ayaklarinin üzerinde durabilen plak :)', 'KTOOLS', 'ktools.png', NULL),
(4, 'Lenco Classic Phono TT-110 Siyah Hoparlorlu Bluetoothlu Retro Pikap Plak Calar', 4, 35.49, 12, 'Modernlik, teknoloji, kolay kullanim ve kalitenin birlesimi. Karsinizda Lenco Classic Phono TT-110. Pikap endustrisinde 75 yili askin deneyimi ile Hollandali Lenco standartlari yeniden sekillendiriyor.', 'Lenco', 'lenco2.png', ''),
(5, 'The Stone Roses Plak', 4, 18.99, 4, 'The Stone Roses 1983\'te Manchester\'da kurulmus ingiliz rock müzik grubudur. 1980 sonlari ve 1990 baslarinda Madchester akiminin önde gelen gruplarindan biriydi. Grubun en basarili ekibi vokalist Ian Brown, gitarist John Squire, basçi Mani ve davulcu Reni\'den olusuyor.', 'The Stone Roses', 'image_5.jpg', 'https://open.spotify.com/embed/album/0um9FI6BLBldL5POP4D4Cw'),
(6, 'The Dark Side Of The Moon Plak', 4, 35.49, 44, 'The Dark Side of the Moon 1 Mart 1973 tarihi cikisli Pink Floyd albümüdür. Haziran 1972 ve Ocak 1973 arasinda, o yillarin en gelismis kayit teknikleri kullanilarak, Abbey Road Studios\'ta kaydedilmistir. Bütün sarki sözleri Roger Waters\'a aittir. 45 milyondan fazla satmis, 740 hafta boyunca listelerde kalmistir.', 'Pink Floyd', 'image_6.jpg', 'https://open.spotify.com/embed/album/2WT1pbYjLJciAR26yMebkH'),
(7, 'Gdl Retro TR-W282 Ahsap Canta Pikap', 4, 20, 16, 'Resim en kisa zamanda eklenecektir.', 'GDL', 'default_image.jpg', NULL),
(8, 'Whatever People Say I Am, That\'s What I\'m Not', 4, 19.59, 8, 'Containing thirteen tracks including the hit single \"I Bet That You Look Good on the Dancefloor\", Whatever People Say I Am, That’s What I’m Not is a remarkable modern British debut. The first album from Sheffield-based rockers, Whatever People Say I Am, That’s What I’m Not was the fastest selling debut album in UK chart history. ', 'The Arctic Monkeys', 'image_8.jpg', NULL),
(9, 'Let It Be', 4, 23.95, 7, 'Twelfth and final studio album by the acclaimed British pop rock group, originally released in 1970. The album was conceived at a time when the band\'s members grew increasingly hostile to each other, impeding their creative process. It was recorded and projected for release (under its original title of \'Get Back\') before their album \'Abbey Road\' (1969); for this reason, some critics and fans argue that \'Abbey Road\' should be considered the group\'s final album and \'Let It Be\' the penultimate. The album contains the tracks \'Across the Universe\', \'Let It Be\', \'The Long and Winding Road\' and \'Get Back\'.', 'The Beatles', 'image_9.jpg', NULL),
(10, 'QUIQA T105 AHSAP RETRO PIKAP', 4, 18.99, 12, 'Retro tasarimi ve Stereo hoparloru sayesinde hem zaman icinde yolculuk hem de muzik dinlemenin keyfine varacaksiniz. Ergonomik yapisi, teknik özellikleri ve kolayca tedarik edilebilen universal yedek parçalarinin yani sira 2 yil garanti süresi bulunmaktadir.', 'Quiqa', 'quiqa.png', NULL),
(28, 'Lenco TCD-2500 Retro Pikap', 4, 14.99, 8, 'Gerçek müzik severlerin markas? Lenco nun Retro tarzi üretimi ile müzik dinleme keyfini ve sevdiginiz radyo kanallarinda gezinmenizi saglayan süper bir retro ahsap tasarim.\r\nBu tasarim pikap yalnizca kulaklarinizi degil, ayni zamanda göz zevkinizi de hitap edecektir.\r\nic mekan dekorasyonunuza zenginlik katacaktir. Kaliteli ve net sesi ile maksimum keyif alacaksiniz.', 'Lenco', 'lenco.jpg', NULL),
(29, 'GDL Retro Çanta Pikap T317 - Vip (Dahili Sarjli)', 3, 12.99, 12, 'Özellikleri\r\n• Gdl Retro Canta Nostaljik Pikap T317\r\n\r\n• Dâhili Hoparlor ( Baska bir cihaz baglamaniza gerek yok, direk prize takip çalistirabilirsiniz. )\r\n\r\n• 33-45-78 Rpm Hiz seçenegi (Otomatik & Manuel)\r\n\r\n• Asansör Sistemi kol ile kontrol\r\n• Otomatik & Manuel Durdurulabilen tabla\r\n• Üniversal igneli\r\n\r\n• Tüm plaklari tas plakda dâhil çalar\r\n• Kulakl?k çikisi, Aux girisli ve line Out harici çikis\r\n• Sarjli 3-4 Saat arasi yada direk fise takip calistirmak\r\n• Güç Kaynagi 230/50 Hz\r\n• 2 Yil Garanti', 'GDL Retro', 'gdl.jpg', NULL),
(30, 'ION Superior LP 7in1 Ahsap Hoparlorlu Pikap', 2, 18.49, 19, '47 x 38.1 x 24.3 santimetrelik olculerden olusur.\r\n\r\n8.6 kilogram agirligindadir.\r\n\r\n45 RPM adaptore sahiptir.', 'ION Audio', 'ion.png', NULL),
(36, 'Ion Mustang Lp 4-in-1 Pikap Kirmizi', 3, 123, 1, '4-in-1 music center\r\n\r\nFord Mustang Lisansli Urun\r\n\r\n3.5 AUX Baglanti\r\n\r\nAM/FM Radio', 'ION Audio', 'mustang.png', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `reports`
--

INSERT INTO `reports` (`report_id`, `product_id`, `order_id`, `product_price`, `product_title`, `product_quantity`) VALUES
(41, 20, 68, 23, 'DEMO 3', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrator` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `administrator`) VALUES
(18, 'berkinozturk', 'berkin.bir@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Tablo için AUTO_INCREMENT değeri `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
