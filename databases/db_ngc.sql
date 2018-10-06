-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Okt 2018 pada 02.56
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ngc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarticle`
--

CREATE TABLE `tbarticle` (
  `ArtclId` int(20) NOT NULL,
  `ArtclTitle` text NOT NULL,
  `ArtclContent` text NOT NULL,
  `ArtclType` text NOT NULL,
  `ArtclImage` text,
  `CreatedOn` varchar(20) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbarticle`
--

INSERT INTO `tbarticle` (`ArtclId`, `ArtclTitle`, `ArtclContent`, `ArtclType`, `ArtclImage`, `CreatedOn`, `CreatedBy`) VALUES
(27, 'Samsung di Antara Derasnya Cibiran dan Kegigihan', 'Jakarta - Tahun 1987, tampuk pimpinan Samsung diwarisi oleh Chairman Lee (Lee Kun Hee), saat itu brand Samsung praktis tidak terdengar di luar Korea. Samsung lebih dianggap sebagai perusahaan OEM, pembuat produk kelas dua yang murah, jauh di bawah produk-produk dari perusahaan raksasa Jepang seperti Sony, Toshiba dan Matsushita.\r\n\r\nChairman Lee ingin mengubah paradigma tersebut dan membuat Samsung menjadi produk kelas dunia, dan memproyeksikan 20 tahun ke depan, Samsung harus menjadi perusahaan kelas dunia terdepan.', 'a:1:{i:0;s:7:"Samsung";}', NULL, 'Wednesday, 12 Oct 20', '95'),
(29, 'Konsumsi Makanan Ini untuk Cegah Ketombe Bertambah Parah', 'Jakarta - Timbulnya ketombe kerap mengganggu penampilan dan percaya diri. Masalah kulit yang paling banyak dialami pria itu pun terkadang sulit diatasi dengan sampo saja. Agar kulit kepala lebih sehat dan ketombe segera menghilang, coba perbaiki pula pola makan Anda di keseharian. Disarankan untuk mengonsumsi asupan sehat dan perbanyak wortel.\r\n\r\nWortel ternyata bukan hanya baik untuk mata. Sayur berwarna oranye tersebut juga bagus untuk kesehatan kulit kepala. ', 'a:3:{i:0;s:4:"Food";i:1;s:7:"Samsung";i:2;s:10:"AngularJs ";}', NULL, 'Wednesday, 12 Oct 20', '95');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbcategory`
--

CREATE TABLE `tbcategory` (
  `CategoryId` int(5) NOT NULL,
  `CategoryName` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbcategory`
--

INSERT INTO `tbcategory` (`CategoryId`, `CategoryName`) VALUES
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
-- Struktur dari tabel `tbcomment`
--

CREATE TABLE `tbcomment` (
  `CommentId` int(10) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `ForumId` int(10) NOT NULL,
  `Comment` text NOT NULL,
  `CommentCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbcomment`
--

INSERT INTO `tbcomment` (`CommentId`, `CreatedBy`, `ForumId`, `Comment`, `CommentCreateDate`) VALUES
(80, 'faisal.alfareza', 22, 'ok sam', '2016-10-20 22:44:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbcomment_article`
--

CREATE TABLE `tbcomment_article` (
  `CommentArticleId` int(10) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `ArtclId` int(20) NOT NULL,
  `CommentArticle` text NOT NULL,
  `CommentArticleCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbcomment_article`
--

INSERT INTO `tbcomment_article` (`CommentArticleId`, `CreatedBy`, `ArtclId`, `CommentArticle`, `CommentArticleCreateDate`) VALUES
(5, 'faisal.alfareza', 29, 'hehe', '2016-10-25 22:16:30'),
(6, 'faisal.alfareza', 29, 'hahah', '2016-10-25 22:47:21'),
(7, 'faisal.alfareza', 29, 'aspasa', '2016-10-25 22:47:24'),
(8, 'faisal.alfareza', 29, 'asahkas', '2016-10-25 22:47:27'),
(9, 'faisal.alfareza', 29, 'sdkdfksdnv', '2016-10-25 22:47:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbforum`
--

CREATE TABLE `tbforum` (
  `ForumId` int(10) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `ForumTitle` varchar(50) NOT NULL,
  `ForumDesc` text NOT NULL,
  `ForumViewer` int(10) NOT NULL,
  `ForumCreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbforum`
--

INSERT INTO `tbforum` (`ForumId`, `CreatedBy`, `ForumTitle`, `ForumDesc`, `ForumViewer`, `ForumCreateDate`) VALUES
(22, 'faisal.alfareza', 'dwdw', 'wd', 0, '2016-10-20 11:56:41'),
(23, 'bamas.angkasa', 'URL Conversion Example', 'This example shows you how to setup TinyMCE to produce different results for its URLs in images and links. You can read more about these config options in the TinyMCE FAQ', 0, '2016-10-20 12:44:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblog`
--

CREATE TABLE `tblog` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_userid` int(11) NOT NULL,
  `log_useremail` text,
  `log_tipe` int(11) DEFAULT NULL,
  `log_desc` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblog`
--

INSERT INTO `tblog` (`log_id`, `log_time`, `log_userid`, `log_useremail`, `log_tipe`, `log_desc`) VALUES
(12, '2016-10-27 05:32:00', 95, 'faisal.alfareza@visionet.co.id', 2, 'create project Smart Appartmen'),
(51, '2016-10-27 06:51:02', 95, 'faisal.alfareza@visionet.co.id', 5, 'asign member Faisal Alfareza to project Smart Appartment'),
(52, '2016-10-27 06:51:02', 95, 'faisal.alfareza@visionet.co.id', 5, 'asign member Alde Sena Asprilla to project Smart Appartment'),
(61, '2016-10-27 07:07:36', 167, 'imas.setyawan@gmail.com', 1, 'logged in'),
(62, '2016-10-28 07:21:11', 167, 'imas.setyawan@gmail.com', 3, 'update resume Imas Deny Setyawanah'),
(65, '2016-10-29 07:24:10', 167, 'imas.setyawan@gmail.com', 5, 'asign project Website Portofolio - Neogeekscamp to member Imas Deny Setyawanah'),
(66, '2016-10-27 08:50:45', 167, 'imas.setyawan@gmail.com', 0, 'logged out'),
(69, '2016-10-27 09:03:23', 167, 'imas.setyawan@gmail.com', 1, 'logged in'),
(70, '2016-10-27 13:23:13', 152, 'alde.asprilla@visionet.co.id', 1, 'logged in'),
(71, '2016-10-27 13:35:44', 152, 'alde.asprilla@visionet.co.id', 0, 'logged out'),
(72, '2017-11-20 06:46:15', 95, 'faisal.alfareza@visionet.co.id', 1, 'logged in'),
(73, '2017-11-20 06:48:54', 95, 'faisal.alfareza@visionet.co.id', 2, 'create resume Faisal Alfareza'),
(74, '2017-11-20 06:49:10', 95, 'faisal.alfareza@visionet.co.id', 3, 'update resume Faisal Alfareza'),
(75, '2017-11-20 06:52:21', 95, 'faisal.alfareza@visionet.co.id', 0, 'logged out');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbnews`
--

CREATE TABLE `tbnews` (
  `NewsId` int(20) NOT NULL,
  `NewsTitle` text NOT NULL,
  `NewsContent` text NOT NULL,
  `NewsImage` text,
  `CreatedOn` varchar(20) NOT NULL,
  `CreatedBy` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbnews`
--

INSERT INTO `tbnews` (`NewsId`, `NewsTitle`, `NewsContent`, `NewsImage`, `CreatedOn`, `CreatedBy`) VALUES
(7, 'Crm OutBond Contact Center', 'Call center dioperasikan sebagai sebuah ruang lingkup kerja yang terbuka secara luas yang dikerjakan oleh sejumlah agen call center, dilengkapi dengan sebuah work station berupa computer bagi setiap agen, sebuah telepon set/headset yang terhubungan ke jaringan telekomunikasi, dan sebuah atau lebih stasiun pengawas. Call center juga dapat secara bebas dioperasikan atau dihubungkan dengan center tambahan, sering dihubungkan dengan jaringan komputer korporat, termasuk mainframe-nya, microcomputer, dan LAN. Ditambah lagi, jaringan data dan voice yang kemudian dipusatkan melalui sebuah link dengan teknologi baru yang disebut Computer Telephony Integration (CTI)..', '', 'Monday, 26 Sep 2016', ''),
(8, 'Innovation Center has launched the first version of the smart', 'Produk pertama dari innovation center yaitu SmartCity, yang digawangi oleh Bona Nugroho bersama rekannya Edo Setya Novandi berhasil direlease dalam versi beta 1.1 . Kesuksesan ini juga akan disusul oleh SmartMall yang ditangani oleh Fadel Trivandi', '', 'Monday, 26 Sep 2016', '96');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbproject`
--

CREATE TABLE `tbproject` (
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
-- Dumping data untuk tabel `tbproject`
--

INSERT INTO `tbproject` (`ProId`, `ProName`, `ProSites`, `ProDesc`, `ProStatus`, `CreatedOn`, `CreatedBy`, `Privilage`) VALUES
(27, 'CRM OutBond Contact Center', 'contactcenter.com', 'Dedicated for agent, helpfully agent to promote a customer project to customer', 'finish', 'Thursday, 08 Sep 201', '95', 1),
(30, 'Smart City', 'lippo-cikarang.com', 'The term “Smart City” dates back to 1990s. The original idea was to set a clear and remarkable path of progress for public institutions and private companies. This development resulted in a big improvement in the everyday life of regular citizens', 'onprogress', 'Saturday, 10 Sep 201', '95', 1),
(44, 'Android CRM Outbond Contact Center for Agent', 'crmcc-apps.com', 'Dedicated for agent, helpfully agent to promote a customer project to customer', 'finish', 'Sunday, 02 Oct 2016', '96', 0),
(46, 'Website Portofolio - Neogeekscamp', 'www.ngc-team.esyes', 'give a brief description about this project', 'onprogress', 'Tuesday, 04 Oct 2016', '95', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbresume`
--

CREATE TABLE `tbresume` (
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
-- Dumping data untuk tabel `tbresume`
--

INSERT INTO `tbresume` (`RsumId`, `RsumName`, `RsumTelp`, `RsumJob`, `RsumSkill1`, `RsumSkill2`, `RsumSkill3`, `RsumSkill4`, `RsumSkill5`, `RsumImage`, `SkillPercent`, `LastEducation1`, `LastEducation2`, `LastEducation3`, `Achieve1`, `Achieve2`, `Achieve3`, `BirthDate`, `Gender`, `Religion`, `CreatedOn`, `UserId`) VALUES
(75, 'Alde Sena Asprilla', 2147483647, 'Developer', 'Cooking', '', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-18102016172612000000.jpg', 89, 'Telkom Sandhy Putra Malang', '', '', '', '', '', '12 October 2016', 'male', 'islam', 'Tuesday, 18 Oct 2016', 152),
(76, 'Bamas Angkasa', 2147483647, 'Developer', 'Cooking', '', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-18102016172936000000.jpg', 89, 'Telkom Sandhy Putra Malang', '', '', '', '', '', '26 September 2016', 'male', 'islam', 'Tuesday, 18 Oct 2016', 100),
(78, 'Imas Deny Setyawanah', 2147483647, 'Developer', 'Mikrokontroller', 'Android', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-25102016064846000000.jpg', 99, 'ITN Malang', '', '', '', '', '', '27 October 2016', 'male', 'islam', 'Tuesday, 25 Oct 2016', 167),
(79, 'Faisal Alfareza', 2147483647, 'Frontend Developer', 'Angular JS', 'UI Design and Prototyping', '', '', '', 'http://localhost/ngc-team/assets/images/resume/resume-02102016084445000000.jpg', 90, 'Telkom Schools Malang', '', '', '', '', '', '', 'male', 'islam', 'Monday, 20 Nov 2017', 95);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbresume_project`
--

CREATE TABLE `tbresume_project` (
  `RsumProId` int(20) NOT NULL,
  `RsumId` int(20) NOT NULL,
  `ProId` int(20) NOT NULL,
  `AsignStatus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbresume_project`
--

INSERT INTO `tbresume_project` (`RsumProId`, `RsumId`, `ProId`, `AsignStatus`) VALUES
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
-- Struktur dari tabel `tbrole`
--

CREATE TABLE `tbrole` (
  `RoleId` int(20) NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbrole`
--

INSERT INTO `tbrole` (`RoleId`, `RoleName`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'anonymus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `UserId` int(20) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPass` varchar(100) NOT NULL,
  `UserStatus` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`UserId`, `UserEmail`, `UserPass`, `UserStatus`) VALUES
(95, 'faisal.alfareza@visionet.co.id', '$2a$08$PLjZ4KFu/2a7eB9Nwl3fnOY1H1Hfg4EY5A.tulgkN1WvIxYJhcl7q', '1'),
(96, 'admin@neogeeks.co.id', '$2a$08$j08MdPXpYbrtQAfO2tWUmOHvmnCPqa9dwXUVi1Nwwz.aeREEX1O/e', '1'),
(100, 'bamas.angkasa@visionet.co.id', '$2a$08$wWFjoUztAO.rFXua4ObeoO8LRFpuxNHegEu/qeIzRa3lVTrLsvxte', '1'),
(152, 'alde.asprilla@visionet.co.id', '$2a$08$Ayv9R/N/3XZsHj20OODteeLOWeT6saPTe0gTyHTij1.NRRIEwb06S', '1'),
(157, 'yayan.yayan98@gmail.com', '$2a$08$F73r6cIjH4QX2SjK/hX3rOFDPPYJuiT/ktemtT8HGgLeaZkppGa8e', '1'),
(167, 'imas.setyawan@gmail.com', '$2a$08$2o1TWOgvRgaDrU/dOjtCU.PBsbzTyIPpXg5qxeuQbBUBSr1wsZ4tK', '1'),
(168, 'sakinahasalalita@gmail.com', '$2a$08$eVdvCrgRTFEWgSjzFg87j.OFZxNNcoVy4vZAXBye2JYcUOkiiV3we', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser_role`
--

CREATE TABLE `tbuser_role` (
  `UserRoleId` int(20) NOT NULL,
  `UserId` int(20) NOT NULL,
  `RoleId` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser_role`
--

INSERT INTO `tbuser_role` (`UserRoleId`, `UserId`, `RoleId`) VALUES
(56, 95, 1),
(57, 96, 1),
(59, 100, 2),
(106, 152, 2),
(111, 157, 2),
(118, 167, 1),
(119, 168, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbarticle`
--
ALTER TABLE `tbarticle`
  ADD PRIMARY KEY (`ArtclId`);

--
-- Indexes for table `tbcategory`
--
ALTER TABLE `tbcategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `tbcomment`
--
ALTER TABLE `tbcomment`
  ADD PRIMARY KEY (`CommentId`),
  ADD KEY `ForumId` (`ForumId`) USING BTREE;

--
-- Indexes for table `tbcomment_article`
--
ALTER TABLE `tbcomment_article`
  ADD PRIMARY KEY (`CommentArticleId`),
  ADD KEY `ArtclId` (`ArtclId`);

--
-- Indexes for table `tbforum`
--
ALTER TABLE `tbforum`
  ADD PRIMARY KEY (`ForumId`);

--
-- Indexes for table `tblog`
--
ALTER TABLE `tblog`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbnews`
--
ALTER TABLE `tbnews`
  ADD PRIMARY KEY (`NewsId`);

--
-- Indexes for table `tbproject`
--
ALTER TABLE `tbproject`
  ADD PRIMARY KEY (`ProId`);

--
-- Indexes for table `tbresume`
--
ALTER TABLE `tbresume`
  ADD PRIMARY KEY (`RsumId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `tbresume_project`
--
ALTER TABLE `tbresume_project`
  ADD PRIMARY KEY (`RsumProId`),
  ADD KEY `RsumId` (`RsumId`),
  ADD KEY `ProId` (`ProId`);

--
-- Indexes for table `tbrole`
--
ALTER TABLE `tbrole`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`);

--
-- Indexes for table `tbuser_role`
--
ALTER TABLE `tbuser_role`
  ADD PRIMARY KEY (`UserRoleId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbarticle`
--
ALTER TABLE `tbarticle`
  MODIFY `ArtclId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbcategory`
--
ALTER TABLE `tbcategory`
  MODIFY `CategoryId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbcomment`
--
ALTER TABLE `tbcomment`
  MODIFY `CommentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `tbcomment_article`
--
ALTER TABLE `tbcomment_article`
  MODIFY `CommentArticleId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbforum`
--
ALTER TABLE `tbforum`
  MODIFY `ForumId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tblog`
--
ALTER TABLE `tblog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tbnews`
--
ALTER TABLE `tbnews`
  MODIFY `NewsId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbproject`
--
ALTER TABLE `tbproject`
  MODIFY `ProId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tbresume`
--
ALTER TABLE `tbresume`
  MODIFY `RsumId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `tbresume_project`
--
ALTER TABLE `tbresume_project`
  MODIFY `RsumProId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;
--
-- AUTO_INCREMENT for table `tbrole`
--
ALTER TABLE `tbrole`
  MODIFY `RoleId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `UserId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `tbuser_role`
--
ALTER TABLE `tbuser_role`
  MODIFY `UserRoleId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
