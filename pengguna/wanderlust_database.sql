-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 03:28 PM
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
-- Database: `wanderlust`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `jabatan`) VALUES
(1, 'Ketua Administrator'),
(2, 'Administrator I'),
(3, 'Administrator II');

-- --------------------------------------------------------

--
-- Table structure for table `fotowisata`
--

CREATE TABLE `fotowisata` (
  `foto_id` int(11) NOT NULL,
  `tempatwisata_id` int(11) NOT NULL,
  `link_foto` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotowisata`
--

INSERT INTO `fotowisata` (`foto_id`, `tempatwisata_id`, `link_foto`, `urutan`) VALUES
(1, 1, 'Danau Toba 1.png', 1),
(2, 1, 'Danau Toba 2.png', 2),
(3, 1, 'Danau Toba 3.png', 3),
(4, 1, 'Danau Toba 4.png', 4),
(5, 1, 'Danau Toba 5.png', 5),
(6, 1, 'Danau Toba 6.png', 6),
(7, 2, 'Labuan Bajo 1.png', 1),
(8, 2, 'Labuan Bajo 2.png', 2),
(9, 2, 'Labuan Bajo 3.png', 3),
(10, 2, 'Labuan Bajo 4.png', 4),
(11, 2, 'Labuan Bajo 5.png', 5),
(12, 2, 'Labuan Bajo 6.png', 6),
(13, 3, 'Candi Borobudur 1.png', 1),
(14, 3, 'Candi Borobudur 2.png', 2),
(15, 3, 'Candi Borobudur 3.png', 3),
(16, 3, 'Candi Borobudur 4.png', 4),
(17, 3, 'Candi Borobudur 5.png', 5),
(18, 3, 'Candi Borobudur 6.png', 6),
(19, 4, 'Pantai Parangtritis 1.png', 1),
(20, 4, 'Pantai Parangtritis 2.png', 2),
(21, 4, 'Pantai Parangtritis 3.png', 3),
(22, 4, 'Pantai Parangtritis 4.png', 4),
(23, 4, 'Pantai Parangtritis 5.png', 5),
(24, 4, 'Pantai Parangtritis 6.png', 6),
(25, 5, 'Trans Studio Bandung 1.png', 1),
(26, 5, 'Trans Studio Bandung 2.png', 2),
(27, 5, 'Trans Studio Bandung 3.png', 3),
(28, 5, 'Trans Studio Bandung 4.png', 4),
(29, 5, 'Trans Studio Bandung 5.png', 5),
(30, 5, 'Trans Studio Bandung 6.png', 6),
(31, 6, 'Trans Studio Cibubur 1.png', 1),
(32, 6, 'Trans Studio Cibubur 2.png', 2),
(33, 6, 'Trans Studio Cibubur 3.png', 3),
(34, 6, 'Trans Studio Cibubur 4.png', 4),
(35, 6, 'Trans Studio Cibubur 5.png', 5),
(36, 6, 'Trans Studio Cibubur 6.png', 6),
(37, 7, 'Trans Snow Bekasi 1.png', 1),
(38, 7, 'Trans Snow Bekasi 2.png', 2),
(39, 7, 'Trans Snow Bekasi 3.png', 3),
(40, 7, 'Trans Snow Bekasi 4.png', 4),
(41, 7, 'Trans Snow Bekasi 5.png', 5),
(42, 7, 'Trans Snow Bekasi 6.png', 6),
(43, 8, 'Jawa Timur Park 1.png', 1),
(44, 8, 'Jawa Timur Park 2.png', 2),
(45, 8, 'Jawa Timur Park 3.png', 3),
(46, 8, 'Jawa Timur Park 4.png', 4),
(47, 8, 'Jawa Timur Park 5.png', 5),
(48, 8, 'Jawa Timur Park 6.png', 6),
(49, 9, 'Jawa Timur Park II 1.png', 1),
(50, 9, 'Jawa Timur Park II 2.png', 2),
(51, 9, 'Jawa Timur Park II 3.png', 3),
(52, 9, 'Jawa Timur Park II 4.png', 4),
(53, 9, 'Jawa Timur Park II 5.png', 5),
(54, 9, 'Jawa Timur Park II 6.png', 6),
(55, 10, 'Jawa Timur Park III 1.png', 1),
(56, 10, 'Jawa Timur Park III 2.png', 2),
(57, 10, 'Jawa Timur Park III 3.png', 3),
(58, 10, 'Jawa Timur Park III 4.png', 4),
(59, 10, 'Jawa Timur Park III 5.png', 5),
(60, 10, 'Jawa Timur Park III 6.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `paketwisata`
--

CREATE TABLE `paketwisata` (
  `paket_id` int(11) NOT NULL,
  `tempatwisata_id` int(11) NOT NULL,
  `foto_paket` varchar(255) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(12,2) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paketwisata`
--

INSERT INTO `paketwisata` (`paket_id`, `tempatwisata_id`, `foto_paket`, `nama_paket`, `deskripsi`, `harga`, `jumlah_tiket`, `tanggal_mulai`, `tanggal_berakhir`) VALUES
(1, 1, 'Paket Danau Toba.png', 'Samosir Island Boat Tour', 'Lake tour by traditional boat around Samosir Island, including a visit to a Batak cultural village.', 150000.00, 48, NULL, NULL),
(2, 1, 'Paket Danau Toba.png', 'Toba Cultural Family Package', 'The family package includes a Batak museum tour, dance performance, and local lunch.', 600000.00, 20, NULL, NULL),
(3, 1, 'Paket Danau Toba.png', 'Trekking + Hot Spring Experience', 'Walk to Holbung Hill and soak in Aek Rangat (natural hot springs).', 300000.00, 30, NULL, NULL),
(4, 2, 'Paket Labuan Bajo.png', 'Komodo Island Day Trip', 'Komodo Island visit, trekking with rangers, and snorkeling at Pink Beach.', 1200000.00, 20, NULL, NULL),
(5, 2, 'Paket Labuan Bajo.png', 'Sunset Sailing Tour', 'Afternoon tour with a pinisi ship, including dinner on board and the best sunset spots.', 750000.00, 30, NULL, NULL),
(6, 2, 'Paket Labuan Bajo.png', '2D1N Liveaboard Adventure', 'Stay on the boat, visit several islands (Padar, Komodo, Kanawa), complete with snorkeling gear & guide.', 2500000.00, 20, NULL, NULL),
(7, 3, 'Paket Candi Borobudur.png', 'Borobudur Sunrise Tour', 'Watch the sunrise from the top of the temple with a local guide.', 300000.00, 50, NULL, NULL),
(8, 3, 'Paket Candi Borobudur.png', 'Borobudur & Village Cycling Package', 'Cycling around the surrounding villages while watching the activities of the residents and handicrafts.', 450000.00, 20, NULL, NULL),
(9, 3, 'Paket Candi Borobudur.png', 'Borobudur + Mendut Temple Combo Tour', 'Entrance tickets and tours to two historic temples complete with historical narration from the guide.', 300000.00, 50, NULL, NULL),
(10, 4, 'Paket Pantai Parangtritis.png', 'ATV Adventure Ride', 'Riding along the sandy beach with an ATV, suitable for beginners and families', 100000.00, 60, NULL, NULL),
(11, 4, 'Paket Pantai Parangtritis.png', 'Sunset Horse Carriage Ride (Andong)', 'Horse-drawn carriage ride along the beach at dusk, maximum 3 people.', 75000.00, 40, NULL, NULL),
(12, 4, 'Paket Pantai Parangtritis.png', 'Sandboarding Experience at Gumuk Pasir', 'Glide over the dunes like snowboarding, board rental included.', 50000.00, 30, NULL, NULL),
(13, 5, 'Paket Trans Studio Bandung.png', 'One-Day Admission Pass', 'Access to all indoor rides and themed shows all day long.', 250000.00, 100, NULL, NULL),
(14, 5, 'Paket Trans Studio Bandung.png', 'VIP Fast Track Package', 'Entrance ticket + special queue without long queue + meal voucher.', 400000.00, 50, NULL, NULL),
(15, 5, 'Paket Trans Studio Bandung.png', 'Family 4-Pack Promo', 'Family package includes tickets, meal coupons and mini souvenirs.', 950000.00, 40, NULL, NULL),
(16, 6, 'Paket Trans Studio Cibubur.png', 'Regular Admission + Show Access', 'Entrance tickets to all performance zones and theaters.', 250000.00, 100, NULL, NULL),
(17, 6, 'Paket Trans Studio Cibubur.png', 'Family Adventure Package (4 pax)', 'Family ticket + snacks + priority access to 3 popular rides.', 900000.00, 26, NULL, NULL),
(18, 7, 'Paket Trans Snow World Bekasi.png', '2-Hour Snow Play Pass', 'Snow area access + shoe and jacket rental + snow slide access.', 135000.00, 98, NULL, NULL),
(19, 7, 'Paket Trans Snow World Bekasi.png', 'Ski Trial Lesson', 'Short basic ski training with an instructor (including equipment).', 250000.00, 40, NULL, NULL),
(20, 7, 'Paket Trans Snow World Bekasi.png', 'Family Snow Fun Package (4 pax)', 'Includes all equipment, entrance tickets, and free hot chocolate.', 600000.00, 28, NULL, NULL),
(21, 8, 'Paket Jawa Timur Park.png', 'Regular Combo Ticket', 'Access to all rides, science centers, and themed swimming pools.', 120000.00, 100, NULL, NULL),
(22, 8, 'Paket Jawa Timur Park.png', 'Family Thrill Package (4 pax)', 'Family ticket + 1 souvenir + arcade game voucher.', 450000.00, 50, NULL, NULL),
(23, 9, 'Paket Jawa Timur Park II.png', 'All-Access Wildlife Ticket', 'Pass tickets to Batu Secret Zoo, Animal Museum, and Eco Green Park.', 130000.00, 100, NULL, NULL),
(24, 9, 'Paket Jawa Timur Park II.png', 'Animal Encounter & Feeding Package', 'Ticket + interactive experience feeding giraffes, birds and reptiles.', 175000.00, 50, NULL, NULL),
(25, 10, 'Paket Jawa Timur Park III.png', 'Dino Park + The Legend Star Combo Ticket', 'Access to the world of animatronic dinosaurs and a museum of wax statues of world figures.', 130000.00, 100, NULL, NULL),
(26, 10, 'Paket Jawa Timur Park III.png', 'Family Dino Explorer Package', 'Includes tickets, interactive kids tour, and themed photobooth.', 500000.00, 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `metode_pembayaran` enum('e-wallet') NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_verifikasi` enum('selesai','ditolak') NOT NULL,
  `tanggal_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `transaksi_id`, `metode_pembayaran`, `bukti_pembayaran`, `status_verifikasi`, `tanggal_bayar`) VALUES
(1, 2, 'e-wallet', 'foto.png', 'selesai', '2025-06-12 09:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `pemilikwisata`
--

CREATE TABLE `pemilikwisata` (
  `pw_id` int(11) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `foto_instansi` varchar(255) NOT NULL,
  `alamat_bisnis` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `siup` varchar(255) NOT NULL,
  `status` enum('approved','rejected','review') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemilikwisata`
--

INSERT INTO `pemilikwisata` (`pw_id`, `jabatan`, `instansi`, `foto_instansi`, `alamat_bisnis`, `npwp`, `siup`, `status`) VALUES
(5, 'Pemilik', 'Kementerian Pariwisata Republik Indonesia', 'Kemenkraf.png', 'Jl. Kemakmuran Bangsa, No.5, RT 08/RW 01, Kel. Makmur, Kec. Jayaraya, Bandung, Jawa Barat, Indonesia 40455', '', '', 'approved'),
(6, 'Pemilik', 'Jawa Timur Park Group', 'Jawa Timur Park Group.png', 'Jl. Kejayaan Semesta No.II, RT 04/RW 05, Kel. Jaya, Kec. Jayadunia, Bandung, Jawa Barat, Indonesia 40655', '', '', 'approved'),
(7, 'Pemilik', 'Trans Studio Group', 'Trans Entertainment.png', 'Jl. Kesejahteraan Abadi No.3A, RT 001/RW 005, Kel. Sejati, Kec. Abadiraya, Bandung, Jawa Barat, Indonesia 40512', '', '', 'approved'),
(8, '', '', '', 'Jl. Kesaktian Negara No.3AII, RT 003/RW005, Kel. Sakti, Kec. Kenegaraan, Bandung, Jawa Barat, Indonesia 40550', '', '', 'review');

-- --------------------------------------------------------

--
-- Table structure for table `tempatwisata`
--

CREATE TABLE `tempatwisata` (
  `tempatwisata_id` int(11) NOT NULL,
  `pw_id` int(11) NOT NULL,
  `nama_lokasi` varchar(255) NOT NULL,
  `alamat_lokasi` varchar(255) NOT NULL,
  `jenis_wisata` enum('Other','Nature','Cultural','Historical','Religion','Theme Park') NOT NULL,
  `waktu_buka` time NOT NULL,
  `waktu_tutup` time NOT NULL,
  `deskripsi` text NOT NULL,
  `sumir` text NOT NULL,
  `nomor_pic` varchar(255) NOT NULL,
  `surat_izin` varchar(255) NOT NULL,
  `status` enum('review','active','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempatwisata`
--

INSERT INTO `tempatwisata` (`tempatwisata_id`, `pw_id`, `nama_lokasi`, `alamat_lokasi`, `jenis_wisata`, `waktu_buka`, `waktu_tutup`, `deskripsi`, `sumir`, `nomor_pic`, `surat_izin`, `status`) VALUES
(1, 5, 'Toba Lake', 'Samosir Regency, Northern Sumatra', 'Nature', '08:00:00', '22:00:00', 'Lake Toba is the largest volcanic lake in Southeast Asia, located in North Sumatra, Indonesia. Surrounded by lush green mountains and cool, fresh air, the lake offers breathtaking natural scenery and a peaceful atmosphere. At its center lies Samosir Island, the cultural heart of the Batak people, where visitors can explore traditional villages such as Tomok and Ambarita. Tourists can enjoy a variety of activities, from swimming and boating to experiencing local cultural performances, making Lake Toba a perfect destination for both nature and cultural tourism.', 'The cultural heart of Batak people in the shape of a lake and island', '0812-1212-2121', '', 'active'),
(2, 5, 'Labuan Bajo', 'West Manggarai, East Nusa Tenggara', 'Nature', '08:00:00', '20:00:00', 'Labuan Bajo, located on the western tip of Flores Island in Indonesia, is a charming coastal town known as the gateway to Komodo National Park, home of the legendary Komodo dragons. Surrounded by turquoise waters, lush hills, and stunning island views, Labuan Bajo offers unforgettable experiences such as island hopping, diving in vibrant coral reefs, and witnessing magical sunsets from hilltops. With its unique blend of natural beauty and adventure, Labuan Bajo has become one of Indonesia’s top travel destinations for nature lovers and explorers alike.', 'A stunning coastal gateway to Komodo dragons and world-class marine adventures', '0812-1212-2121', '', 'active'),
(3, 5, 'Borobudur Temple', 'Magelang Regency, Central Java', 'Cultural', '08:00:00', '17:00:00', 'Borobudur Temple, located in Central Java, Indonesia, is the world’s largest Buddhist monument and a UNESCO World Heritage Site. Built in the 9th century, this majestic temple features intricate stone carvings and a grand architectural design shaped like a mandala, symbolizing the path to enlightenment. Surrounded by lush green hills and misty mornings, Borobudur offers a serene and spiritual experience, especially at sunrise when the first light bathes the ancient stones in a golden glow. As a masterpiece of history, culture, and spirituality, Borobudur remains one of Indonesia’s most iconic and revered landmarks.', 'The world’s largest Buddhist monument blending spiritual grandeur and ancient artistry', '0812-1212-2121', '', 'active'),
(4, 5, 'Parangtritis Beach', 'Bantul Regency, Yogyakarta', 'Nature', '07:00:00', '17:00:00', 'Parangtritis Beach, located about 27 kilometers south of Yogyakarta, is one of the most famous coastal destinations in Java, Indonesia. Known for its wide stretch of black volcanic sand and powerful waves from the Indian Ocean, the beach offers dramatic ocean views and a mystical atmosphere deeply rooted in Javanese mythology. Visitors can enjoy activities such as horse-drawn carriage rides along the shore, sandboarding on nearby dunes, or simply relaxing while watching the sunset. Parangtritis is not only a scenic getaway but also a place rich in cultural and spiritual significance.', 'A mystical beach with dramatic waves and deep-rooted Javanese legends', '0812-1212-2121', '', 'active'),
(5, 7, 'Trans Studio Bandung', 'Bandung, West Java', 'Theme Park', '10:00:00', '20:00:00', 'Trans Studio Bandung, located within Trans Studio Mall in Bandung, West Java, is one of the world’s largest indoor theme parks, opened in 2011 and spanning over 4.2 hectares. It features 20 thrilling rides across three themed zones—Studio Central, Lost City, and Magic Corner—including high-speed attractions like the Yamaha Racing Coaster that launches riders from 0 to 100 km/h in just a few seconds. With live Broadway-style shows, family-friendly offerings, and diverse facilities such as restaurants, prayer rooms, and parking, it delivers an all-weather entertainment experience tailored for visitors of all ages.', 'A massive indoor theme park offering thrilling rides and theatrical entertainment', '0813-1313-3131', '', 'active'),
(6, 7, 'Trans Studio Cibubur', 'Depok, West Java', 'Theme Park', '10:00:00', '20:00:00', 'Trans Studio Cibubur, nestled on the 3rd floor of Trans Studio Mall Cibubur in Depok, West Java, is one of Indonesia’s largest indoor theme parks, launched in July 2019 within a mixed-use complex featuring a mall, apartments, and hotel. It spans about 4 hectares and comprises five themed zones—Adventure, Sci‑Fi City, Beach Walk, Lagoon, and Trans Central Station—with 14 world-class rides such as the boomerang roller coaster, interactive dark rides like Zombie Wars, immersive 4D theater experiences, bundled with family-friendly attractions like snow playgrounds and Magic Bike. Whether seeking thrilling adventures or leisurely fun regardless of weather, Trans Studio Cibubur delivers a complete, all‑age entertainment experience.', 'An indoor amusement park combining futuristic zones with family-friendly fun', '0813-1313-3131', '', 'active'),
(7, 7, 'Trans Snow World Bekasi', 'Bekasi, West Java', 'Theme Park', '10:00:00', '20:00:00', 'Trans Snow World Bekasi is Indonesia’s largest indoor snow playground located on the third floor of Transpark Mall Juanda in East Bekasi, West Java, offering a chilly escape from tropical heat since March 2019. Spread over roughly 4,000 m²—with about 3,000 m² under artificial snow—it features a variety of snow-themed attractions such as ski slopes, chairlift rides, groomed sledding areas, zorb balls, and a dedicated snow playground. Operating daily from around 11 AM to early evening, visitors enjoy two hours of frosty fun (typically included with ticket purchase), complete with rental of snow boots, socks, and access to eateries, lockers, prayer rooms, and souvenir shops . This immersive winter-themed experience is perfect for families and anyone seeking unique indoor entertainment.', 'A tropical country’s winter escape with real snow and ski experiences', '0813-1313-3131', '', 'active'),
(8, 6, 'Jawa Timur Park I', 'Batu, East Java', 'Theme Park', '10:00:00', '20:00:00', 'Jawa Timur Park 1, nestled at about 800 m above sea level in Batu, East Java, is a vibrant “Science & Coaster Park” that seamlessly blends educational exhibits and thrilling rides across its 11-hectare grounds. Featuring over 60 attractions—including adrenaline-pumping coasters like Superman, Dragon, and Pendulum 360°, interactive Science Center, and cultural showcases like the Galeri Etnik Nusantara and Indonesia Heritage Museum—it offers immersive learning experiences alongside fun for visitors of all ages. From water play in the Funtastic Swimming Pool to panoramic mountain views aboard the Sky Swinger and Sky Ride, it truly caters to families seeking both excitement and enrichment in one destination', 'An exciting fusion of science education and amusement park thrills', '0813-1313-3131', '', 'active'),
(9, 6, 'Jawa Timur Park II', 'Batu, East Java', 'Theme Park', '10:00:00', '20:00:00', 'Jawa Timur Park 2 in Batu, East Java, is a sprawling 22-hectare educational and recreational complex that combines the modern Batu Secret Zoo, the immersive Museum Satwa (wildlife museum), and the interactive Eco Green Park. Visitors can wander through themed animal habitats—from tropical forests to African savannahs—feed giraffes and camels, explore dioramas of extinct creatures and insect exhibits, and enjoy playful eco-themed attractions such as the upside-down house, hydroponic garden, and Jungle Adventure train . With bundled tickets covering all three zones, plus options like e-bike rentals for easier navigation, it’s a fun, family-focused day out that’s both entertaining and enriching.', 'A unique blend of zoo, museum, and eco-park for immersive family learning', '0813-1313-3131', '', 'active'),
(10, 6, 'Jawa Timur Park III', 'Batu, East Java', 'Theme Park', '10:00:00', '20:00:00', 'Jawa Timur Park 3, located in Batu, East Java, is a sprawling integrated entertainment complex combining education, nature, and fun across four themed zones: Dino Park, The Legend Star wax museum, World Music Museum, and Fun Tech Plaza. Covering around 16 hectares, its Dino Park features life‑sized animatronic dinosaurs and immersive attractions like a Five‑Ages Train and Raptor Spinner, offering both thrill and learning about prehistoric eras. Visitors can also meet famous figures in realistic wax form, explore global musical instruments, and engage with high‑tech games and exhibits—all within a scenic mountain setting at around 1,200 m altitude, open daily for family‑friendly indoor-outdoor entertainment.', 'A prehistoric-themed attraction with life-sized dinosaurs and interactive exhibits', '0813-1313-3131', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `topup_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jumlah` decimal(12,2) NOT NULL,
  `metode_pembayaran` enum('gopay','dana','shopeepay','bank_transfer','lainnya') NOT NULL,
  `status` enum('menunggu','disetujui','ditolak') DEFAULT 'menunggu',
  `tanggal_pengajuan` datetime DEFAULT current_timestamp(),
  `tanggal_verifikasi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `wisatawan_id` int(11) NOT NULL,
  `tempatwisata_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `status` enum('pending','dibayarkan','dibatalkan') NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `tanggal_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `wisatawan_id`, `tempatwisata_id`, `paket_id`, `jumlah_tiket`, `total_harga`, `status`, `tanggal_kunjungan`, `tanggal_transaksi`) VALUES
(1, 4, 6, 17, 2, 1800000, 'pending', '2025-06-30', '2025-06-12 09:39:45'),
(2, 4, 7, 18, 2, 270000, 'pending', '2025-06-13', '2025-06-12 09:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ulasan_id` int(11) NOT NULL,
  `wisatawan_id` int(11) NOT NULL,
  `tempatwisata_id` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_ulasan` datetime NOT NULL,
  `status_ulasan` enum('ditampilkan','disembunyikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','pw','wisatawan') NOT NULL,
  `profilepicture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `no_telepon`, `password`, `role`, `profilepicture`) VALUES
(1, 'Muhammad Taqi Izdihar', 'mti@gmail.com', '0813-1655-6908', '$2y$10$Rk2rjWyt31lIvzz2iIETyO.gaYBAQbVcE5mlV4Y.Grsgwq.qJeBhC', 'admin', ''),
(2, 'Riska Dea Bakri', 'rdb@gmail.com', '0821-8075-0761', '$2y$10$auHPrBhvXMp2rP9H3vquIuJQN5ePuWX2zdQ3VeMkFLhtQzpbmwoN6', 'admin', ''),
(3, 'Faiz Syafiq Nabily', 'fsn@gmail.com', '0838-7709-0632', '$2y$10$RZlMgdU/EIJifQtBsb3TfOevtaIn9wdcjT2JG739uGfYj1PhkwuGi', 'admin', ''),
(4, 'Relysian Ray Rovers', 'relysian@gmail.com', '0812-1212-2121', '$2y$10$IQ83N5JEP2Fpgm544S.vVeX1MH9CdbPYqyAR4kxn1EDox4yZpLY5.', 'wisatawan', ''),
(5, 'Muhammad Alnilam Lambda', 'alnilam@gmail.com', '0813-1313-3131', '$2y$10$IzUW1mumzAZmPGbYJDlnUO5TECWQSPIHCmlUu3viXr1gi6iCsSh3u', 'pw', 'Alnilam.png'),
(6, 'Muhammad Alnitah Hides', 'alnitah@gmail.com', '0814-1414-4141', '$2y$10$nEzS05cYDsJKw4oKRdniOe3cO3F/7KS/7BiMMGZrROtNde2VvPJZq', 'pw', 'Alnitah.png'),
(7, 'Mutiara Mintaka Maveen', 'maveen@gmail.com', '0815-1515-5151', '$2y$10$KkD6KNcZoHE1k0qk.BVNS.N.bL4AlRv9jbRrBG50rvGVf.DdmFVmS', 'pw', 'Mintaka.png'),
(8, 'Chris Charlie', 'chris@gmail.com', '0815-1515-5151', '$2y$10$mMfbteufLava.vm1CXHEF.Y9.aZkBXotn2Yptd2Ryh.olIr8bRBRi', 'pw', '');

-- --------------------------------------------------------

--
-- Table structure for table `wisatawan`
--

CREATE TABLE `wisatawan` (
  `wisatawan_id` int(11) NOT NULL,
  `tanggal_registrasi` datetime DEFAULT current_timestamp(),
  `preferensi_kategori` enum('Nature','Cultural','Historical','Other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisatawan`
--

INSERT INTO `wisatawan` (`wisatawan_id`, `tanggal_registrasi`, `preferensi_kategori`) VALUES
(4, '2025-06-09 19:24:04', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wisatawan_id` int(11) NOT NULL,
  `tempatwisata_id` int(11) NOT NULL,
  `tanggal_disimpan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD KEY `admin_fk` (`admin_id`);

--
-- Indexes for table `fotowisata`
--
ALTER TABLE `fotowisata`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `id_lokasi` (`tempatwisata_id`);

--
-- Indexes for table `paketwisata`
--
ALTER TABLE `paketwisata`
  ADD PRIMARY KEY (`paket_id`),
  ADD KEY `id_lokasi` (`tempatwisata_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `transaksi_fk` (`transaksi_id`);

--
-- Indexes for table `pemilikwisata`
--
ALTER TABLE `pemilikwisata`
  ADD KEY `identitas_pw` (`pw_id`);

--
-- Indexes for table `tempatwisata`
--
ALTER TABLE `tempatwisata`
  ADD PRIMARY KEY (`tempatwisata_id`),
  ADD KEY `lokasi_pw` (`pw_id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`topup_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_tempat_fk` (`tempatwisata_id`),
  ADD KEY `transaksi_user_fk` (`wisatawan_id`),
  ADD KEY `paket_id_fk` (`paket_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ulasan_id`),
  ADD KEY `tempatwisata_id_fk` (`tempatwisata_id`),
  ADD KEY `wisatawan_id_fk` (`wisatawan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wisatawan`
--
ALTER TABLE `wisatawan`
  ADD KEY `wisatawan_fk` (`wisatawan_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD UNIQUE KEY `wisatawan_id` (`wisatawan_id`,`tempatwisata_id`),
  ADD KEY `id_lokasi` (`tempatwisata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotowisata`
--
ALTER TABLE `fotowisata`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `paketwisata`
--
ALTER TABLE `paketwisata`
  MODIFY `paket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tempatwisata`
--
ALTER TABLE `tempatwisata`
  MODIFY `tempatwisata_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `topup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ulasan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`admin_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fotowisata`
--
ALTER TABLE `fotowisata`
  ADD CONSTRAINT `id_lokasi` FOREIGN KEY (`tempatwisata_id`) REFERENCES `tempatwisata` (`tempatwisata_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paketwisata`
--
ALTER TABLE `paketwisata`
  ADD CONSTRAINT `paketwisata_ibfk_1` FOREIGN KEY (`tempatwisata_id`) REFERENCES `tempatwisata` (`tempatwisata_id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `transaksi_fk` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`transaksi_id`);

--
-- Constraints for table `pemilikwisata`
--
ALTER TABLE `pemilikwisata`
  ADD CONSTRAINT `identitas_pw` FOREIGN KEY (`pw_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempatwisata`
--
ALTER TABLE `tempatwisata`
  ADD CONSTRAINT `lokasi_pw` FOREIGN KEY (`pw_id`) REFERENCES `pemilikwisata` (`pw_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `paket_id_fk` FOREIGN KEY (`paket_id`) REFERENCES `paketwisata` (`paket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_tempat_fk` FOREIGN KEY (`tempatwisata_id`) REFERENCES `tempatwisata` (`tempatwisata_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_user_fk` FOREIGN KEY (`wisatawan_id`) REFERENCES `wisatawan` (`wisatawan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `tempatwisata_id_fk` FOREIGN KEY (`tempatwisata_id`) REFERENCES `tempatwisata` (`tempatwisata_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wisatawan_id_fk` FOREIGN KEY (`wisatawan_id`) REFERENCES `wisatawan` (`wisatawan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wisatawan`
--
ALTER TABLE `wisatawan`
  ADD CONSTRAINT `wisatawan_fk` FOREIGN KEY (`wisatawan_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`wisatawan_id`) REFERENCES `wisatawan` (`wisatawan_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`tempatwisata_id`) REFERENCES `tempatwisata` (`tempatwisata_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
