-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Nov 2018 pada 05.38
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smartprint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_article`
--

CREATE TABLE `ms_article` (
  `ArtclId` int(20) NOT NULL,
  `ArtclTitle` text NOT NULL,
  `ArtclContent` text NOT NULL,
  `ArtclType` text NOT NULL,
  `ArtclImage` text,
  `CreatedOn` varchar(20) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_article`
--

INSERT INTO `ms_article` (`ArtclId`, `ArtclTitle`, `ArtclContent`, `ArtclType`, `ArtclImage`, `CreatedOn`, `CreatedBy`) VALUES
(27, 'Samsung di Antara Derasnya Cibiran dan Kegigihan', 'Jakarta - Tahun 1987, tampuk pimpinan Samsung diwarisi oleh Chairman Lee (Lee Kun Hee), saat itu brand Samsung praktis tidak terdengar di luar Korea. Samsung lebih dianggap sebagai perusahaan OEM, pembuat produk kelas dua yang murah, jauh di bawah produk-produk dari perusahaan raksasa Jepang seperti Sony, Toshiba dan Matsushita.\r\n\r\nChairman Lee ingin mengubah paradigma tersebut dan membuat Samsung menjadi produk kelas dunia, dan memproyeksikan 20 tahun ke depan, Samsung harus menjadi perusahaan kelas dunia terdepan.', 'a:1:{i:0;s:7:"Samsung";}', NULL, 'Wednesday, 12 Oct 20', '95'),
(29, 'Konsumsi Makanan Ini untuk Cegah Ketombe Bertambah Parah', 'Jakarta - Timbulnya ketombe kerap mengganggu penampilan dan percaya diri. Masalah kulit yang paling banyak dialami pria itu pun terkadang sulit diatasi dengan sampo saja. Agar kulit kepala lebih sehat dan ketombe segera menghilang, coba perbaiki pula pola makan Anda di keseharian. Disarankan untuk mengonsumsi asupan sehat dan perbanyak wortel.\r\n\r\nWortel ternyata bukan hanya baik untuk mata. Sayur berwarna oranye tersebut juga bagus untuk kesehatan kulit kepala. ', 'a:3:{i:0;s:4:"Food";i:1;s:7:"Samsung";i:2;s:10:"AngularJs ";}', NULL, 'Wednesday, 12 Oct 20', '95');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_batch_merchant`
--

CREATE TABLE `ms_batch_merchant` (
  `MerchantId` int(20) NOT NULL,
  `MerchantQueueNumber` bigint(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_batch_merchant`
--

INSERT INTO `ms_batch_merchant` (`MerchantId`, `MerchantQueueNumber`) VALUES
(2, 2),
(1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_category`
--

CREATE TABLE `ms_category` (
  `CategoryId` int(5) NOT NULL,
  `CategoryName` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_category`
--

INSERT INTO `ms_category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Realm Database'),
(2, 'AngularJs '),
(3, 'Samsung'),
(4, 'Food'),
(5, 'Samsung'),
(25, 'Assalamualaikum'),
(26, 'nyanyi'),
(27, 'ehm'),
(28, 'haai'),
(29, 'risa'),
(30, 'skolah'),
(31, 'bimo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_merchant`
--

CREATE TABLE `ms_merchant` (
  `MerchantId` int(20) NOT NULL,
  `MerchantCode` varchar(6) NOT NULL,
  `MerchantName` varchar(50) NOT NULL,
  `MerchantAddress` text NOT NULL,
  `MerchantDesc` text,
  `MerchantTelp` text NOT NULL,
  `MerchantEmail` text NOT NULL,
  `EstablishedDate` varchar(30) DEFAULT NULL,
  `HowManyFeedback` bigint(100) DEFAULT NULL,
  `WorkTime` varchar(30) DEFAULT NULL,
  `LongLat` varchar(50) DEFAULT NULL,
  `UserId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_merchant`
--

INSERT INTO `ms_merchant` (`MerchantId`, `MerchantCode`, `MerchantName`, `MerchantAddress`, `MerchantDesc`, `MerchantTelp`, `MerchantEmail`, `EstablishedDate`, `HowManyFeedback`, `WorkTime`, `LongLat`, `UserId`) VALUES
(1, 'MSTRO', 'Maestro Percetakan', 'Jl. Raya Gubeng No.30, Gubeng, Surabaya City, East Java 60281', 'Maestro merupakan perusahaan outlet fotokopi, digital printing dan advertising terbesar di Malang dengan konsep pelayanan ONE STOP SERVICE. Semua dikerjakan di satu tempat mulai dari desain, produksi sampai produk jadi. Dengan didukung dengan tenaga- tenaga yang selalu berinovasi, profesional, berpengalaman dan berdedikasi tinggi serta teknologi terkini. Maestro siap memberikan layanan terbaik di bidangnya.', '(031) 5051888', 'info@maestrophotocopy.com', '2006', 5, '08.00-21.00', '12', 171),
(2, 'MJST', 'Majesty Printing', 'Jl. Brigjend Slamet Riadi No.44, Oro-oro Dowo, Klojen, Kota Malang, Jawa Timur 65112', 'Majesty Printing telah berdiri sejak tahun 2005. Seiring dengan berjalannya waktu, Majesty Printing selalu berinovasi dengan menghadirkan produk-produk yang dibutuhkan oleh masyarakat. Mulai dari print banner indoor, outdoor, laser, T-shirt, hingga cetak offset dapat terlayani. Selain itu, pembuatan produk-produk seperti brosur, undangan, pin, mug, kalender, buku, hingga branding kendaraan juga dapat terlayani, sehingga Majesty Printing menjadi One Stop Printing, yaitu pelayanan di bidang printing di mana masyarakat bisa mendapatkan berbagai produk printing sekaligus di satu tempat.\r\n\r\nBerbekal pengalaman lebih dari sepuluh tahun, Majesty Printing berkomitmen untuk terus memberikan pelayanan yang terbaik di bidangnya, sembari tetap mempertahankan kualitas hasil cetakan yang dihasilkan. Sehingga harga yang ditetapkan dengan kualitas yang didapatkan selalu lebih murah.', '0341-369800,0818387744,0818387744', 'majesty_printing@yahoo.com,majesty.printing@gmail.com', '2005', 0, '08.00–12.00', 'qsq', 152);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_news`
--

CREATE TABLE `ms_news` (
  `NewsId` int(20) NOT NULL,
  `NewsTitle` text NOT NULL,
  `NewsContent` text NOT NULL,
  `NewsImage` text,
  `CreatedOn` varchar(20) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_news`
--

INSERT INTO `ms_news` (`NewsId`, `NewsTitle`, `NewsContent`, `NewsImage`, `CreatedOn`, `CreatedBy`) VALUES
(7, 'Crm OutBond Contact Center', 'Call center dioperasikan sebagai sebuah ruang lingkup kerja yang terbuka secara luas yang dikerjakan oleh sejumlah agen call center, dilengkapi dengan sebuah work station berupa computer bagi setiap agen, sebuah telepon set/headset yang terhubungan ke jaringan telekomunikasi, dan sebuah atau lebih stasiun pengawas. Call center juga dapat secara bebas dioperasikan atau dihubungkan dengan center tambahan, sering dihubungkan dengan jaringan komputer korporat, termasuk mainframe-nya, microcomputer, dan LAN. Ditambah lagi, jaringan data dan voice yang kemudian dipusatkan melalui sebuah link dengan teknologi baru yang disebut Computer Telephony Integration (CTI)..', '', 'Monday, 26 Sep 2016', ''),
(8, 'Innovation Center has launched the first version of the smart', 'Produk pertama dari innovation center yaitu SmartCity, yang digawangi oleh Bona Nugroho bersama rekannya Edo Setya Novandi berhasil direlease dalam versi beta 1.1 . Kesuksesan ini juga akan disusul oleh SmartMall yang ditangani oleh Fadel Trivandi', '', 'Monday, 26 Sep 2016', '96');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_project`
--

CREATE TABLE `ms_project` (
  `ProId` int(20) NOT NULL,
  `ProName` varchar(50) NOT NULL,
  `ProSites` varchar(50) NOT NULL,
  `ProDesc` text NOT NULL,
  `ProStatus` varchar(20) NOT NULL,
  `CreatedOn` varchar(20) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `Privilage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_project`
--

INSERT INTO `ms_project` (`ProId`, `ProName`, `ProSites`, `ProDesc`, `ProStatus`, `CreatedOn`, `CreatedBy`, `Privilage`) VALUES
(27, 'CRM OutBond Contact Center', 'contactcenter.com', 'Dedicated for agent, helpfully agent to promote a customer project to customer', 'finish', 'Thursday, 08 Sep 201', '95', 1),
(30, 'Smart City', 'lippo-cikarang.com', 'The term “Smart City” dates back to 1990s. The original idea was to set a clear and remarkable path of progress for public institutions and private companies. This development resulted in a big improvement in the everyday life of regular citizens', 'onprogress', 'Saturday, 10 Sep 201', '95', 1),
(44, 'Android CRM Outbond Contact Center for Agent', 'crmcc-apps.com', 'Dedicated for agent, helpfully agent to promote a customer project to customer', 'finish', 'Sunday, 02 Oct 2016', '96', 0),
(46, 'Website Portofolio - Neogeekscamp', 'www.ngc-team.esyes', 'give a brief description about this project', 'onprogress', 'Tuesday, 04 Oct 2016', '95', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_resume`
--

CREATE TABLE `ms_resume` (
  `RsumId` int(20) NOT NULL,
  `RsumName` varchar(50) NOT NULL,
  `RsumTelp` int(20) NOT NULL,
  `RsumJob` varchar(50) NOT NULL,
  `RsumSkill1` varchar(50) NOT NULL,
  `RsumSkill2` varchar(50) DEFAULT NULL,
  `RsumSkill3` varchar(50) DEFAULT NULL,
  `RsumSkill4` varchar(50) DEFAULT NULL,
  `RsumSkill5` varchar(50) DEFAULT NULL,
  `RsumImage` text,
  `SkillPercent` int(100) NOT NULL,
  `LastEducation1` varchar(50) NOT NULL,
  `LastEducation2` varchar(50) DEFAULT NULL,
  `LastEducation3` varchar(50) DEFAULT NULL,
  `Achieve1` varchar(50) DEFAULT NULL,
  `Achieve2` varchar(50) DEFAULT NULL,
  `Achieve3` varchar(50) DEFAULT NULL,
  `BirthDate` varchar(20) NOT NULL,
  `Gender` text NOT NULL,
  `Religion` text NOT NULL,
  `CreatedOn` varchar(20) NOT NULL,
  `UserId` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_resume`
--

INSERT INTO `ms_resume` (`RsumId`, `RsumName`, `RsumTelp`, `RsumJob`, `RsumSkill1`, `RsumSkill2`, `RsumSkill3`, `RsumSkill4`, `RsumSkill5`, `RsumImage`, `SkillPercent`, `LastEducation1`, `LastEducation2`, `LastEducation3`, `Achieve1`, `Achieve2`, `Achieve3`, `BirthDate`, `Gender`, `Religion`, `CreatedOn`, `UserId`) VALUES
(75, 'Alde Sena Asprilla', 2147483647, 'Developer', 'Cooking', '', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-18102016172612000000.jpg', 89, 'Telkom Sandhy Putra Malang', '', '', '', '', '', '12 October 2016', 'male', 'islam', 'Tuesday, 18 Oct 2016', 152),
(76, 'Bamas Angkasa', 2147483647, 'Developer', 'Cooking', '', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-18102016172936000000.jpg', 89, 'Telkom Sandhy Putra Malang', '', '', '', '', '', '26 September 2016', 'male', 'islam', 'Tuesday, 18 Oct 2016', 100),
(78, 'Imas Deny Setyawanah', 2147483647, 'Developer', 'Mikrokontroller', 'Android', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-25102016064846000000.jpg', 99, 'ITN Malang', '', '', '', '', '', '27 October 2016', 'male', 'islam', 'Tuesday, 25 Oct 2016', 167),
(79, 'Faisal Alfareza', 2147483647, 'Frontend Developer', 'Angular JS', 'UI Design and Prototyping', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-02102016084445000000.jpg', 90, 'Telkom Schools Malang', '', '', '', '', '', '', 'male', 'islam', 'Monday, 20 Nov 2017', 95);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_resume_project`
--

CREATE TABLE `ms_resume_project` (
  `RsumProId` int(20) NOT NULL,
  `RsumId` int(20) NOT NULL,
  `ProId` int(20) NOT NULL,
  `AsignStatus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_resume_project`
--

INSERT INTO `ms_resume_project` (`RsumProId`, `RsumId`, `ProId`, `AsignStatus`) VALUES
(202, 73, 30, '1'),
(208, 73, 30, '1'),
(215, 75, 30, '1'),
(216, 76, 30, '1'),
(217, 76, 27, '1'),
(219, 73, 46, '1'),
(220, 76, 46, '1'),
(223, 75, 46, '1'),
(239, 73, 27, '0'),
(247, 78, 27, ''),
(248, 78, 30, '0'),
(260, 78, 46, '0'),
(261, 79, 30, ''),
(262, 79, 27, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_role`
--

CREATE TABLE `ms_role` (
  `RoleId` int(20) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_role`
--

INSERT INTO `ms_role` (`RoleId`, `RoleName`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'merchant');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user`
--

CREATE TABLE `ms_user` (
  `UserId` int(20) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPass` varchar(100) NOT NULL,
  `UserStatus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_user`
--

INSERT INTO `ms_user` (`UserId`, `UserEmail`, `UserPass`, `UserStatus`) VALUES
(95, 'user@smartprint.com', '$2a$08$PLjZ4KFu/2a7eB9Nwl3fnOY1H1Hfg4EY5A.tulgkN1WvIxYJhcl7q', '1'),
(172, 'admin@smartprint.com', '$2a$08$XhpviPzBRFm9WnoTAunnQOeo0aJPqqClerJ7XNYSYaLcwq2ijNLkq', '1'),
(171, 'merchant@smartprint.com', '$2a$08$7Hibs89mDtmQfL4qtGgPBOG.AN9X8IHBFfzF1HmCgLt/PC0AsRA/6', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_user_role`
--

CREATE TABLE `ms_user_role` (
  `UserRoleId` int(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  `RoleId` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_user_role`
--

INSERT INTO `ms_user_role` (`UserRoleId`, `UserId`, `RoleId`) VALUES
(56, 95, 2),
(122, 171, 3),
(123, 172, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_document`
--

CREATE TABLE `tr_document` (
  `QueueNumber` varchar(100) NOT NULL,
  `DocumentId` int(20) NOT NULL,
  `MerchantId` int(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  `Status` enum('requested','inprogress','finished') NOT NULL,
  `UploadedOn` varchar(70) DEFAULT NULL,
  `ProcessedOn` varchar(20) DEFAULT NULL,
  `FinishedOn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_document`
--

INSERT INTO `tr_document` (`QueueNumber`, `DocumentId`, `MerchantId`, `UserId`, `Status`, `UploadedOn`, `ProcessedOn`, `FinishedOn`) VALUES
('MJST-95-02112018-094331-1', 65, 2, 95, 'inprogress', 'Friday, 02 Nov 2018 09:43:31', NULL, NULL),
('MJST-95-02112018-094331-2', 66, 2, 95, 'requested', 'Friday, 02 Nov 2018 09:43:31', NULL, NULL),
('MSTRO-95-02112018-095354-1', 67, 1, 95, 'requested', 'Friday, 02 Nov 2018 09:53:54', NULL, NULL),
('MSTRO-95-02112018-100653-2', 68, 1, 95, 'inprogress', 'Friday, 02 Nov 2018 10:06:53', NULL, NULL),
('MSTRO-95-02112018-100653-3', 69, 1, 95, 'inprogress', 'Friday, 02 Nov 2018 10:06:53', NULL, NULL),
('MSTRO-95-02112018-164250-4', 70, 1, 95, 'requested', 'Friday, 02 Nov 2018 16:42:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_document_detail`
--

CREATE TABLE `tr_document_detail` (
  `DocumentId` int(20) NOT NULL,
  `DocumentName` varchar(50) NOT NULL,
  `DocumentType` varchar(15) NOT NULL,
  `LinkFileUrl` text NOT NULL,
  `FileName` text NOT NULL,
  `Note` text,
  `EstimationTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_document_detail`
--

INSERT INTO `tr_document_detail` (`DocumentId`, `DocumentName`, `DocumentType`, `LinkFileUrl`, `FileName`, `Note`, `EstimationTime`) VALUES
(65, 'Tugas Basis Data - Praktek Mysql', '.docx', 'E:/xampp/htdocs/project-codeigniter/smart-print/assets/images/uploads/upload-documents/MJST95-02112018-094331/TUGAS_PERTEMUAN_2_-_STORE_PROCEDURE.docx', 'TUGAS_PERTEMUAN_2_-_STORE_PROCEDURE.docx', 'Mohon untuk dicetak dengan rapi dan baik, karena akan dipergunakan sebagai dokumen penting untuk masa depan', ''),
(66, 'Tugas Basis Data - Praktek Mysql', '.docx', 'E:/xampp/htdocs/project-codeigniter/smart-print/assets/images/uploads/upload-documents/MJST95-02112018-094331/TUGAS_PERTEMUAN_3_-_TRIGGER.docx', 'TUGAS_PERTEMUAN_3_-_TRIGGER.docx', 'Mohon untuk dicetak dengan rapi dan baik, karena akan dipergunakan sebagai dokumen penting untuk masa depan', ''),
(67, 'Ticket Pergi - Visionet', '.PDF', 'E:/xampp/htdocs/project-codeigniter/smart-print/assets/images/uploads/upload-documents/MSTRO95-02112018-095354/QLCBXJ.PDF', 'QLCBXJ.PDF', 'Bewarna & Kertas Folio', '09 November 2018'),
(68, 'Tugas Bahasa Indonesia', '.docx', 'E:/xampp/htdocs/project-codeigniter/smart-print/assets/images/uploads/upload-documents/MSTRO95-02112018-100652/TUGAS_2_-_161116039_Faisal_Alfareza_-_Koreksi_Artikel_-_Penggunaan_Smartphone_dan_Interaksi_Sosial_Pada_Remaja.docx', 'TUGAS_2_-_161116039_Faisal_Alfareza_-_Koreksi_Artikel_-_Penggunaan_Smartphone_dan_Interaksi_Sosial_Pada_Remaja.docx', 'pelayanan di bidang printing di mana masyarakat bisa mendapatkan berbagai produk printing sekaligus di satu tempat', '07 November 2018'),
(69, 'Tugas Bahasa Indonesia', '.docx', 'E:/xampp/htdocs/project-codeigniter/smart-print/assets/images/uploads/upload-documents/MSTRO95-02112018-100652/TUGAS_4_-_161116039_Faisal_Alfareza_-_Teks_3_Bahasa.docx', 'TUGAS_4_-_161116039_Faisal_Alfareza_-_Teks_3_Bahasa.docx', 'pelayanan di bidang printing di mana masyarakat bisa mendapatkan berbagai produk printing sekaligus di satu tempat', '07 November 2018'),
(70, 'UTS Pemrograman Perangkat Bergerak (PPB) - Subari', '.pdf', 'E:/xampp/htdocs/project-codeigniter/smart-print/assets/images/uploads/upload-documents/MSTRO95-02112018-164249/(Subari)_UTS_PPB_(Kelas-P).pdf', '(Subari)_UTS_PPB_(Kelas-P).pdf', 'Yang bagus dan rapi, nanti orangnya ngamuk ihihi ..', '10 November 2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_article`
--
ALTER TABLE `ms_article`
  ADD PRIMARY KEY (`ArtclId`);

--
-- Indexes for table `ms_batch_merchant`
--
ALTER TABLE `ms_batch_merchant`
  ADD KEY `MerchantId` (`MerchantId`);

--
-- Indexes for table `ms_category`
--
ALTER TABLE `ms_category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `ms_merchant`
--
ALTER TABLE `ms_merchant`
  ADD PRIMARY KEY (`MerchantId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `ms_news`
--
ALTER TABLE `ms_news`
  ADD PRIMARY KEY (`NewsId`);

--
-- Indexes for table `ms_project`
--
ALTER TABLE `ms_project`
  ADD PRIMARY KEY (`ProId`);

--
-- Indexes for table `ms_resume`
--
ALTER TABLE `ms_resume`
  ADD PRIMARY KEY (`RsumId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `ms_resume_project`
--
ALTER TABLE `ms_resume_project`
  ADD PRIMARY KEY (`RsumProId`),
  ADD KEY `RsumId` (`RsumId`),
  ADD KEY `ProId` (`ProId`);

--
-- Indexes for table `ms_role`
--
ALTER TABLE `ms_role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- Indexes for table `ms_user_role`
--
ALTER TABLE `ms_user_role`
  ADD PRIMARY KEY (`UserRoleId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- Indexes for table `tr_document`
--
ALTER TABLE `tr_document`
  ADD PRIMARY KEY (`QueueNumber`),
  ADD KEY `DocumentId` (`DocumentId`),
  ADD KEY `MerchantId` (`MerchantId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tr_document_detail`
--
ALTER TABLE `tr_document_detail`
  ADD PRIMARY KEY (`DocumentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_article`
--
ALTER TABLE `ms_article`
  MODIFY `ArtclId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `ms_category`
--
ALTER TABLE `ms_category`
  MODIFY `CategoryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `ms_merchant`
--
ALTER TABLE `ms_merchant`
  MODIFY `MerchantId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ms_news`
--
ALTER TABLE `ms_news`
  MODIFY `NewsId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ms_project`
--
ALTER TABLE `ms_project`
  MODIFY `ProId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `ms_resume`
--
ALTER TABLE `ms_resume`
  MODIFY `RsumId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `ms_resume_project`
--
ALTER TABLE `ms_resume_project`
  MODIFY `RsumProId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `ms_role`
--
ALTER TABLE `ms_role`
  MODIFY `RoleId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_user`
--
ALTER TABLE `ms_user`
  MODIFY `UserId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `ms_user_role`
--
ALTER TABLE `ms_user_role`
  MODIFY `UserRoleId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `tr_document_detail`
--
ALTER TABLE `tr_document_detail`
  MODIFY `DocumentId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ms_batch_merchant`
--
ALTER TABLE `ms_batch_merchant`
  ADD CONSTRAINT `ms_batch_merchant_ibfk_1` FOREIGN KEY (`MerchantId`) REFERENCES `ms_merchant` (`MerchantId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tr_document`
--
ALTER TABLE `tr_document`
  ADD CONSTRAINT `tr_document_ibfk_1` FOREIGN KEY (`MerchantId`) REFERENCES `ms_merchant` (`MerchantId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_document_ibfk_2` FOREIGN KEY (`DocumentId`) REFERENCES `tr_document_detail` (`DocumentId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
