-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 03:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(53, 'PHP'),
(54, 'JavascriptES'),
(55, 'c#'),
(56, 'C++'),
(57, 'Kotlin'),
(58, 'Java'),
(59, 'Web development '),
(60, 'C'),
(61, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 136, 'Ibrahim ', '190ibrahimahmed@gmail.com', 'best ever', 'Approved', '2022-12-25'),
(3, 136, 'Jane', '190ibrahimahmed@gmail.com', 'fkggvv', 'Approved', '2023-01-03'),
(5, 136, '', '', '', 'Approved', '2023-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(136, 53, 'PHP from zero to hero', 'Ibrahim The GOAT', '2023-01-04', 'image_1.jpg', 'the best course ', 'Php, html, bootstrap', '4', 'published'),
(144, 53, 'rsb gf', 'bdfbd', '2023-01-05', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo quam, pretium porttitor metus ut, condimentum faucibus lorem. Maecenas at interdum odio, et bibendum nulla. Sed cursus finibus orci accumsan fringilla. Morbi dictum volutpat ullamcorper. Sed sit amet sem lacinia, pellentesque dui sed, maximus nunc. Mauris odio eros, hendrerit sed arcu sed, accumsan feugiat lacus. Integer eget euismod est. Etiam gravida sapien at dui venenatis pellentesque vel id leo.\r\n\r\nProin a purus eget nibh varius luctus eget nec turpis. Morbi in volutpat magna, cursus interdum enim. Aliquam eleifend venenatis libero, in posuere arcu laoreet vitae. Vivamus ac felis non odio ultrices tincidunt sit amet eget ante. Nunc in ex vitae tellus convallis lacinia. Nulla facilisis facilisis sem ut blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam ut velit risus. Donec tempor eu mi eu imperdiet. In imperdiet ex augue, ac dignissim massa ultricies sed. Cras ut tortor arcu. Praesent vitae eleifend magna. Cras ac ornare lectus. Integer eget luctus leo. Pellentesque rhoncus interdum ligula, finibus vulputate massa sodales finibus. Sed massa mi, eleifend eu facilisis eu, placerat vel est.\r\n\r\nProin aliquet gravida lectus. Quisque sagittis eu nulla non dapibus. Suspendisse et diam justo. Integer at erat eget urna feugiat tempus. Nullam feugiat nibh at scelerisque dignissim. Cras vel gravida augue. Suspendisse luctus imperdiet mi, dignissim condimentum urna tincidunt ut. Etiam feugiat lectus a felis molestie semper. Aenean venenatis, eros quis molestie placerat, sem erat vulputate tortor, vitae auctor urna elit eget libero. Cras ut pellentesque magna. Nam non ipsum quis diam congue blandit. Nam ultrices sit amet sem sed viverra. Suspendisse ac eleifend odio.\r\n\r\nSed volutpat lectus ante, eget facilisis tellus dapibus et. Donec vitae dignissim tortor, non tincidunt elit. Donec quam felis, cursus nec pretium ut, aliquet ullamcorper odio. Sed imperdiet odio ac tortor commodo pulvinar. Vestibulum molestie pulvinar ante, eget fringilla nibh vestibulum non. Nam congue felis eu aliquam viverra. Nulla non vulputate felis, nec dapibus ex.\r\n\r\nIn commodo lectus ut tellus suscipit fringilla. Donec sagittis ligula vitae velit pretium sodales. Morbi suscipit et sem non rhoncus. Proin volutpat interdum ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Etiam dictum molestie purus. Fusce ut cursus enim. Curabitur dapibus bibendum leo sit amet egestas. Nunc blandit sit amet nisl sit amet porttitor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas consectetur sollicitudin lacinia. Morbi quis efficitur justo. Fusce congue enim in odio rutrum ultricies. Vivamus ligula neque, sollicitudin a nisi ut, bibendum porttitor ante. Pellentesque pellentesque, urna sit amet luctus laoreet, nisl sem bibendum tortor, quis mattis lectus purus sed diam.', '', '', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(5, 'goat', '$2y$10$Cdh8Ao8prPOBhNgH9R0/Pe4V9AKIoJIurpAvNw19gyDuxMB0vKR4u', 'Ibrahim', 'Hi', '190ibrahimahmed@gmail.com', 'IMG_3669.JPG', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(6, 'Huthiafah', '$2y$10$xxGPIwpkKSMbq93ZYlU9ceaLOEgPwCNOlyTc6VLsO5twB44/Hx/dC', 'Huthiafah', 'Alshohari', 'alshohari@gmail.com', 'image_1.jpg', 'admin', '$2y$10$iusesomecrazystrings22'),
(7, 'JN8VJ8', '$2y$10$44Zl4z9mIvds2W3UiNpY8uj9Gbl/o4kPI5kyJaurfhiP31FR3proq', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'IMG_3652.JPG', 'admin', '$2y$10$iusesomecrazystrings22'),
(8, 'ibrahim2023', '$2y$10$eS4p6nrug.lWY15OE9nPA.T3AJAO.Pg/1gGqaR6j.zhyPsf4HPh2G', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(10, 'ibrahim', '$2y$10$FRCv/OIHMysAyNe4jA.xPeHqCt6ym4ug4LPYzjL/FSwU6B..guozm', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(11, 'kd', '$2y$10$SMGmpeWnH6EmbQaqfem9uuOmZgh1e010tp/In7r8dABbYL.wTGhNS', 'Ibrahim ', 'Ibrahim', '190ibrahimahmed@gmail.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(13, 'elif', 'elif', 'Elif', 'Saeed', 'elif@gamil.com', '', 'admin', '$2y$10$iusesomecrazystrings22'),
(14, 'antiquarian_user', '$2y$10$AxX.agxTAHDNjNct/5i6i.2.hBn/LPpsMo3BYXiS8VEQlG8UJYV2e', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(25, 'f', '$2y$10$DwP9iPg106wkMAuMFs8jI.QkqsFEJXFWMY5EmQZqvl/G4S0rQtTbW', '', '', '190ibrahimahmed@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(26, 'natcha', '$2y$10$uzHoNE2ZWvcHiiSxp7N53.3Xl7pJHodEZuzk2.q9lMx0tPBatm5Be', '', '', 'natcha@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(30, 'fgfgfddd', '$2y$10$Gk2PCHynlUrFDOT69X/cGOtLJjizXI3Rm6T.npQ0c9v//rwVgbvse', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'IMG_3670.JPG', 'admin', '$2y$10$iusesomecrazystrings22'),
(31, 'fdfbbf', '$2y$10$kZ2oHospSLhL467kW8DGXuLnQaflRI3NaXkvNVaP.XTgLf2fimg6y', 'Ibrahim Ahmed Mohammed', 'Ibrahim', '190ibrahimahmed@gmail.com', 'IMG_3683.JPG', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(33, 'shiny', '$2y$10$wSyT7KZRBWTGEk3XGbX.CO8Vf6pDgh.bktOnBJIOY09chDRsNdEGm', 'Chaimae', 'Ibrahim', 'shiny@gmail.com', 'IMG_3684.JPG', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(34, 'sun', '$2y$10$IVMn9Rk/47XVoL43cq67J.UGFwKejVKEZswmogr9g7Wen.EDsUnsO', 'Ibrahim Ahmed Mohammed', 'Ibrahim', 'sun@gmail.com', 'IMG_3685.JPG', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(35, 'Saeed', '$2y$10$ZyCgnv21wOABbQ.qnMbfbeHuTn8IRjI.6Ong0uRZ//DQfpwnh7fiC', '', '', 'saeed@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22'),
(36, 'Shiny6', '$2y$10$5fEVnGRz7g7lRZnP0NdDWuaTsgKU2qYzL4wbj5nJgihqIsnMbBj/a', '', '', 'shinyasalways@gmail.com', '', 'subscriber', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post_id` (`comment_post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
