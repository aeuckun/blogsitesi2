-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 03:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `categoryDate`) VALUES
(24, 'Linux', '2022-11-09 15:32:11'),
(25, 'Windows', '2022-11-09 15:32:34'),
(26, 'PHP', '2022-11-09 15:32:45'),
(27, 'Phones', '2022-11-09 20:33:02'),
(28, 'Camera', '2022-11-09 21:57:34'),
(29, 'Web', '2022-11-09 22:01:16'),
(30, 'PHP', '2022-11-09 22:04:34'),
(31, 'Html', '2022-11-09 22:21:13'),
(32, 'Design', '2022-11-09 22:22:14'),
(36, 'test', '2022-11-12 14:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `postTitle` varchar(200) NOT NULL,
  `postCat` varchar(200) NOT NULL,
  `postImage` varchar(200) NOT NULL,
  `postContent` varchar(10000) NOT NULL,
  `postDate` datetime NOT NULL DEFAULT current_timestamp(),
  `postAuthor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postTitle`, `postCat`, `postImage`, `postContent`, `postDate`, `postAuthor`) VALUES
(42, 'Windows 11: Everything you need to know', 'Windows', '150_00xBy0JjVybodfIwWxeGCkZ-1.webp', 'Windows 11 came out on October 5 with a gradual rollout. All supported PCs should now be able to upgrade easily through Windows Update in Windows 10, as the update is generally available.\r\nWindows 11 came out on October 5 with a gradual rollout. All supported PCs should now be able to upgrade easily through Windows Update in Windows 10, as the update is generally available.\r\nWindows 11 came out on October 5 with a gradual rollout. All supported PCs should now be able to upgrade easily through Windows Update in Windows 10, as the update is generally available.', '2022-11-09 22:17:39', 'MK'),
(43, 'The most advanced Penetration Testing Distribution', 'Linux', '453_1925e8c041331fe3ec13daa71856c9d9.jpg', 'Kali Linux is an open-source, Debian-based Linux distribution geared towards various information security tasks, such as Penetration Testing, Security Research, Computer Forensics and Reverse Engineering.\r\nKali Linux is an open-source, Debian-based Linux distribution geared towards various information security tasks, such as Penetration Testing, Security Research, Computer Forensics and Reverse Engineering.\r\nKali Linux is an open-source, Debian-based Linux distribution geared towards various information security tasks, such as Penetration Testing, Security Research, Computer Forensics and Reverse Engineering.\r\nKali Linux is an open-source, Debian-based Linux distribution geared towards various information security tasks, such as Penetration Testing, Security Research, Computer Forensics and Reverse Engineering.', '2022-11-09 22:18:20', 'MK'),
(44, 'What is PHP and Why we use it ?', 'PHP', '221_wp1958149.webp', 'PHP(short for Hypertext PreProcessor) is the most widely used open source and general purpose server side scripting language used mainly in web development to create dynamic websites and applications. It was developed in 1994 by Rasmus Lerdorf. A survey by W3Tech shows that almost 79% of the websites in their data are developed using PHP. It is not only used to build the web apps of many tech giants like Facebook but is also used to build many CMS (Content Management System) like WordPress, Drupal, Shopify, WooCommerce etc.\r\nPHP(short for Hypertext PreProcessor) is the most widely used open source and general purpose server side scripting language used mainly in web development to create dynamic websites and applications. It was developed in 1994 by Rasmus Lerdorf. A survey by W3Tech shows that almost 79% of the websites in their data are developed using PHP. It is not only used to build the web apps of many tech giants like Facebook but is also used to build many CMS (Content Management System) like WordPress, Drupal, Shopify, WooCommerce etc.', '2022-11-09 22:19:44', 'MK'),
(45, 'HTML for Absolute Beginners', 'Html', '973_303_4.png', 'While many guides on the internet attempt to teach HTML using a lot of mind-boggling theory, this tutorial will instead focus on giving you the practical skills to build your first site.\r\n\r\nThe aim is to show you ‘how’ to create your first web page without spending the entire tutorial focusing too much on the “why.”\r\n\r\nBy the end of this tutorial, you will have the know-how to create a basic website and we hope that this will inspire you to delve further into the world of HTML using our follow-on guides.', '2022-11-09 22:22:04', 'MK'),
(46, 'Creat your first Design ', 'Design', '186_334_718_795_3.png', 'Photoshop is very much popular among all the designers either they are graphic designers, web designers or interior designers because by Photoshop you will do almost everything in the field of designing. In Photoshop, there are so many powerful tools that allow a graphic designer to unleash their creativity & accuracy as well as complete grasp on the final design. Photoshop is best for modifying already created images, photos & fonts. Photoshop includes a lot of unique filters, special effects & tools.', '2022-11-09 22:24:17', 'MK'),
(47, 'Linux Mint 21 Cinnamon', 'Linux', '634_619_HD-wallpaper-linux-mint-mate-blue-logo-blue-neon-lights-linux-creative-blue-abstract-background-linux-mint-mate-logo-os-linux-mint-mate.jpg', 'Even though Linux Mint originally emerged from Ubuntu, it has developed into an almost completely independent distribution over time and can be considered on its own. Cinnamon is included by default in Linux Mint 20.3. On the one hand, Linux Mint uses software that is also available for Ubuntu and Debian, but also relies on its own programs. After the installation Banshee player and VLC player, LibreOffice, Firefox, Thunderbird as well as Gimp are contained. In addition, there are the own programs Mintbackup, the software management Mintinstall, the upload manager Mintupload as well as the troubleshooting tool Mintwifi. Additional packages with free or proprietary programs can usually be installed without problems.', '2022-11-09 22:26:41', 'MK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
