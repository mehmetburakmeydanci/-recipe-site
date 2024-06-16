-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 May 2024, 14:37:58
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yemek_tarifleri`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `uye_id` int(11) NOT NULL,
  `admin_ad` varchar(20) DEFAULT NULL,
  `admin_soyad` varchar(20) DEFAULT NULL,
  `admin_kullanici_adi` varchar(20) DEFAULT NULL,
  `sifre` varchar(150) DEFAULT NULL,
  `uye_pp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`uye_id`, `admin_ad`, `admin_soyad`, `admin_kullanici_adi`, `sifre`, `uye_pp`) VALUES
(1, 'Agit', 'Erdem', 'zargex', '$2y$10$xjx3RKrC6c8PLp0.rIoua.774NEZlJ/wY6GWbPxYHqnR4ziO9.7lu', 'xx');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dolaplar`
--

CREATE TABLE `dolaplar` (
  `uye_id` int(11) NOT NULL,
  `dolap_id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `dolaplar`
--

INSERT INTO `dolaplar` (`uye_id`, `dolap_id`, `kullanici_adi`) VALUES
(1, 31231, 'agit'),
(186925, 894012, 'fffffffffffffffff'),
(272415, 678389, 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dolap_malzemeleri`
--

CREATE TABLE `dolap_malzemeleri` (
  `dolap_id` int(11) DEFAULT NULL,
  `malzeme_id` int(11) DEFAULT NULL,
  `malzeme_adi` varchar(255) NOT NULL,
  `uye_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `dolap_malzemeleri`
--

INSERT INTO `dolap_malzemeleri` (`dolap_id`, `malzeme_id`, `malzeme_adi`, `uye_id`) VALUES
(894012, 3, '', 186925),
(894012, 7, '', 186925),
(894012, 10, '', 186925),
(894012, 4, '', 186925),
(31231, 1, '', 1),
(31231, 2, '', 1),
(31231, 3, '', 1),
(31231, 7, '', 1),
(31231, 10, '', 1),
(31231, 4, '', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favoriler`
--

CREATE TABLE `favoriler` (
  `id` int(11) NOT NULL,
  `tarif_id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `kullanici_adi` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `favoriler`
--

INSERT INTO `favoriler` (`id`, `tarif_id`, `uye_id`, `kullanici_adi`, `url`) VALUES
(76, 14, 1, 'Agit', ''),
(97, 13, 186925, 'fffffffffffffffff', ''),
(98, 15, 186925, 'fffffffffffffffff', ''),
(99, 14, 186925, 'fffffffffffffffff', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(255) NOT NULL,
  `kategori_url` varchar(255) NOT NULL,
  `kategori_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_ad`, `kategori_url`, `kategori_img`) VALUES
(1, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(2, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(3, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(4, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(5, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(6, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(7, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(8, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(9, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(10, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(11, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(12, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(13, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(14, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(15, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(16, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(17, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(18, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(19, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(20, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(21, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(22, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(23, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(24, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(25, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(26, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(27, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(28, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(29, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(30, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(31, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(32, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(33, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(34, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(35, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(36, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(37, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(38, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(39, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(40, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(41, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(42, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(43, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(44, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(45, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(46, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(47, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(48, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(49, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(50, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'uploads/tatli-kurabiye.jpg'),
(51, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(52, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg'),
(53, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'uploads/tatli-kurabiye.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `malzemeler`
--

CREATE TABLE `malzemeler` (
  `malzeme_id` int(11) NOT NULL,
  `malzeme_adi` varchar(255) NOT NULL,
  `grup_id` int(11) DEFAULT NULL,
  `grup_adi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `malzemeler`
--

INSERT INTO `malzemeler` (`malzeme_id`, `malzeme_adi`, `grup_id`, `grup_adi`) VALUES
(1, 'Süt', 2, 'Süt Ürünleri'),
(2, 'Yumurta', 6, 'Yumurta ve Yumurta Ürünleri'),
(3, 'Un', 3, 'Tahıl ve Bakliyat'),
(4, 'Şeker', 5, 'Yağlar ve Tatlandırıcılar'),
(5, 'Tuz', 5, 'Yağlar ve Tatlandırıcılar'),
(6, 'Zeytinyağı', 5, 'Yağlar ve Tatlandırıcılar'),
(7, 'Maya', 3, 'Tahıl ve Bakliyat'),
(8, 'Domates', 4, 'Meyve ve Sebzeler'),
(9, 'Biber', 4, 'Meyve ve Sebzeler'),
(10, 'Pirinç', 3, 'Tahıl ve Bakliyat'),
(11, 'Karpuz', 4, 'Meyve ve Sebzeler'),
(12, 'Kavun', 4, 'Meyve ve Sebzeler'),
(13, 'Bulgur', 3, 'Tahıl ve Bakliyat');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tarifler`
--

CREATE TABLE `tarifler` (
  `tarif_id` int(11) NOT NULL,
  `kategori_ad` varchar(50) NOT NULL,
  `kategori_url` varchar(255) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `sure` varchar(255) DEFAULT NULL,
  `boyut` varchar(20) DEFAULT NULL,
  `kalori` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icindekiler` text DEFAULT NULL,
  `hazirlanis` text DEFAULT NULL,
  `tarih` text NOT NULL,
  `goruntulenme` int(11) NOT NULL,
  `fav` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tarifler`
--

INSERT INTO `tarifler` (`tarif_id`, `kategori_ad`, `kategori_url`, `baslik`, `sure`, `boyut`, `kalori`, `resim`, `url`, `icindekiler`, `hazirlanis`, `tarih`, `goruntulenme`, `fav`) VALUES
(13, 'Tatlılar & Kurabiyeler', 'tatlilar-ve-kurabiyeler', 'Tarçınlı Cevizli Kurabiye: Sıcacık Fırından Gelen Mutluluk!', '30 Dakika', '5 Kişilik', '2500 Kalori', 'uploads/kurabiye.png', 'tarcinli-cevizli-kurabiye\n', '1,2,3', 'Mantının hamuru için un hariç diğer malzemeleri yoğurma kabına alıp karıştırın.,\r\nYavaş yavaş unu ekleyerek ele yapışmayan sert bir hamur elde edene kadar yoğurun.,\r\nHamurdan dilediğiniz büyüklükte bezeler yapıp üzerini nemli bir bezle kapatın.,\r\nİç harcı için soğanı rendeleyip kıyma ve baharatlarıyla birlikte yoğurun.,\r\nBezeleri oklava yardımıyla ince açıp çay bardağı yardımıyla yuvarlak kalıp çıkarın.,\r\nÜzerine iç harcından koyup resimlerdeki gibi önce yarım daire şeklinde katlayıp kenarlarını iyice kapatıp daha sonra iki ucunu birleştirin.,\r\nArtan hamurları tekrar beze yapıp aynı işlemi tekrarlayın.,\r\nHazırladığınız mantıları bol kızgın yağda pişirin.,\r\nFazlalık yağını alması için önce kağıt havlu serili bir tabağa, daha sonra da servis tabağına alın.,\r\nSalçalı sos için tereyağını eritip nane ve salçayı kavurun., Üzerine yarım çay bardağı kadar sıcak su döküp karıştırın.,\r\nMantının üzerine önce sarımsaklı yoğurt, daha sonra da salçalı sostan gezdirin.', '12.12.2023', 123, 2),
(14, 'Ekmek & Hamur İşleri', 'ekmek-ve-hamur-isleri', 'Kaşarlı Tavuklu Pide Lezzeti: Ev Mutfağında Yaratıcı Dokunuşlar!', '30 Dakika', '5 Kişilik', '2500 Kalori', 'uploads/pide.jpg', 'kasarli-tavuklu-pide\n', '4,5,6', 'Mantının hamuru için un hariç diğer malzemeleri yoğurma kabına alıp karıştırın.,\r\nYavaş yavaş unu ekleyerek ele yapışmayan sert bir hamur elde edene kadar yoğurun.,\r\nHamurdan dilediğiniz büyüklükte bezeler yapıp üzerini nemli bir bezle kapatın.,\r\nİç harcı için soğanı rendeleyip kıyma ve baharatlarıyla birlikte yoğurun.,\r\nBezeleri oklava yardımıyla ince açıp çay bardağı yardımıyla yuvarlak kalıp çıkarın.,\r\nÜzerine iç harcından koyup resimlerdeki gibi önce yarım daire şeklinde katlayıp kenarlarını iyice kapatıp daha sonra iki ucunu birleştirin.,\r\nArtan hamurları tekrar beze yapıp aynı işlemi tekrarlayın.,\r\nHazırladığınız mantıları bol kızgın yağda pişirin.,\r\nFazlalık yağını alması için önce kağıt havlu serili bir tabağa, daha sonra da servis tabağına alın.,\r\nSalçalı sos için tereyağını eritip nane ve salçayı kavurun., Üzerine yarım çay bardağı kadar sıcak su döküp karıştırın.,\r\nMantının üzerine önce sarımsaklı yoğurt, daha sonra da salçalı sostan gezdirin.', '12.12.2023', 82, 2),
(15, 'Makarna & Hamur İşleri', 'makarna-ve-hamur-isleri', 'Ev Yapımı Çıtır Mantı: Geleneksel Lezzetin Yeniden Tanımı!', '30 Dakika', '5 Kişilik', '2500 Kalori', 'uploads/manti.jpeg', 'ev-yapimi-citir-manti\n', '1,2,3', 'Mantının hamuru için un hariç diğer malzemeleri yoğurma kabına alıp karıştırın.,\r\nYavaş yavaş unu ekleyerek ele yapışmayan sert bir hamur elde edene kadar yoğurun.,\r\nHamurdan dilediğiniz büyüklükte bezeler yapıp üzerini nemli bir bezle kapatın.,\r\nİç harcı için soğanı rendeleyip kıyma ve baharatlarıyla birlikte yoğurun.,\r\nBezeleri oklava yardımıyla ince açıp çay bardağı yardımıyla yuvarlak kalıp çıkarın.,\r\nÜzerine iç harcından koyup resimlerdeki gibi önce yarım daire şeklinde katlayıp kenarlarını iyice kapatıp daha sonra iki ucunu birleştirin.,\r\nArtan hamurları tekrar beze yapıp aynı işlemi tekrarlayın.,\r\nHazırladığınız mantıları bol kızgın yağda pişirin.,\r\nFazlalık yağını alması için önce kağıt havlu serili bir tabağa, daha sonra da servis tabağına alın.,\r\nSalçalı sos için tereyağını eritip nane ve salçayı kavurun., Üzerine yarım çay bardağı kadar sıcak su döküp karıştırın.,\r\nMantının üzerine önce sarımsaklı yoğurt, daha sonra da salçalı sostan gezdirin.', '12.12.2023', 111, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tema_ayarlari`
--

CREATE TABLE `tema_ayarlari` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `site_adi` varchar(255) DEFAULT NULL,
  `slogan` varchar(255) DEFAULT NULL,
  `intro_gorsel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tema_ayarlari`
--

INSERT INTO `tema_ayarlari` (`id`, `logo`, `site_adi`, `slogan`, `intro_gorsel`) VALUES
(1, 'yemeksehri.jpeg', 'YEMEK TARİFLERİ', 'Her Yemek Bir Hikayedir <br> Tariflerimizle Hikayenizi Yaratın!', '826964.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `sifre` varchar(50) NOT NULL,
  `uye_id` int(11) NOT NULL,
  `pp` varchar(200) DEFAULT 'uploads/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`ad`, `soyad`, `kullanici_adi`, `sifre`, `uye_id`, `pp`) VALUES
('agit', 'erdem', 'Agit', 'agit1234', 1, 'uploads/default.png'),
('yigit', 'erdem', 'yigit', 'sifre1234', 3, 'uploads/default.png'),
('kullanici3', 'soyad3', 'kullanici', 'sifre1234', 4, 'uploads/default.png'),
('qwewqe', 'qweqwe', 'ewqwqeqwe', 'qweqwe', 5, 'uploads/default.png'),
('test', 'test', 'test', '$2y$10$KiGgC1.mdgXU0JbRI9mIt.rYZqcV4zX9OqLVDWadDU9', 8, 'uploads/default.png'),
('deneme', 'deneme', 'deneme', '$2y$10$c8vU5WeOIng2AIea.jOl0.ds0Bp1UqYtu3fdBzcM/fp', 9, 'uploads/default.png'),
('kullanici2', 'kullanici2', 'kullanici2', 'kullanici2', 10, 'uploads/default.png'),
('kullanici3', 'kullanici3', 'kullanici3', 'kullanici3', 11, 'uploads/default.png'),
('kullanici4', 'kullanici4', 'kullanici45', '$2y$10$duUFOirlZBKhx9AWpjhenO47scHX7TxxDD1VaZR.OJn', 12, 'uploads/default.png'),
('kullanici7', 'kullanici7', 'kullanici7', 'kullanici7', 13, 'uploads/default.png'),
('kullanici8', 'kullanici8', 'kullanici8', 'kullanici8', 14, 'uploads/default.png'),
('fffffffffffffffffwqeqwe', 'fffffffffffffffffasdasd', 'fffffffffffffffff', '$2y$10$DTgf4wPNcx4KFeK65cEVhuXweNMWugGi70P1lhDKYeG', 186925, 'uploads/default.png'),
('sdfsdfsdf', 'sdfsdfsdf', 'sdfsdfsdf', 'sdfsdfsdf', 272415, 'uploads/default.png'),
('ergdfgd', 'fgdfgdfg', 'dfgdfgd', 'fgdfgdfg', 446791, 'uploads/default.png'),
('qweqw', 'qweqw', 'qweqw', 'qweqw', 784686, 'uploads/default.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `uye_id` int(11) DEFAULT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `yorum_baslik` varchar(100) DEFAULT NULL,
  `yorum` text DEFAULT NULL,
  `yorum_date` datetime DEFAULT current_timestamp(),
  `yorum_durum` enum('beklemede','onaylandı') DEFAULT 'beklemede'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uye_id`);

--
-- Tablo için indeksler `dolaplar`
--
ALTER TABLE `dolaplar`
  ADD PRIMARY KEY (`uye_id`),
  ADD UNIQUE KEY `uye_id` (`uye_id`);

--
-- Tablo için indeksler `favoriler`
--
ALTER TABLE `favoriler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarif` (`tarif_id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `malzemeler`
--
ALTER TABLE `malzemeler`
  ADD PRIMARY KEY (`malzeme_id`);

--
-- Tablo için indeksler `tarifler`
--
ALTER TABLE `tarifler`
  ADD PRIMARY KEY (`tarif_id`);

--
-- Tablo için indeksler `tema_ayarlari`
--
ALTER TABLE `tema_ayarlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`),
  ADD UNIQUE KEY `uye_id` (`uye_id`),
  ADD UNIQUE KEY `uye_id_2` (`uye_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`),
  ADD KEY `uye_id` (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `favoriler`
--
ALTER TABLE `favoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Tablo için AUTO_INCREMENT değeri `malzemeler`
--
ALTER TABLE `malzemeler`
  MODIFY `malzeme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `tarifler`
--
ALTER TABLE `tarifler`
  MODIFY `tarif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tablo için AUTO_INCREMENT değeri `tema_ayarlari`
--
ALTER TABLE `tema_ayarlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `dolaplar`
--
ALTER TABLE `dolaplar`
  ADD CONSTRAINT `dolaplar_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uyeler` (`uye_id`);

--
-- Tablo kısıtlamaları `favoriler`
--
ALTER TABLE `favoriler`
  ADD CONSTRAINT `fk_tarif` FOREIGN KEY (`tarif_id`) REFERENCES `tarifler` (`tarif_id`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`uye_id`) REFERENCES `uyeler` (`uye_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
