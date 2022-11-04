-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2022 at 03:57 PM
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
-- Database: `pet_adoption_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `admin_login_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_login_id`, `admin_name`) VALUES
(2, 1, 'admin'),
(3, 6, 'Martin Mbithi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(200) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`) VALUES
(1, 'sysadmin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'administrator'),
(3, 'lilnutenchi', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Owner'),
(5, 'lilmart', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Adopter'),
(6, 'm@rtMb!th!', 'fe01ce2a7fbac8fafaed7c982a04e229', 'administrator'),
(7, 'jfraking', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Owner'),
(8, 'hillmoses', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Adopter');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(200) NOT NULL,
  `payment_pet_adoption_id` int(200) NOT NULL,
  `payment_ref` varchar(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `payment_means` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_pet_adoption_id`, `payment_ref`, `payment_amount`, `payment_date`, `payment_means`) VALUES
(9, 13, 'RBAZKXO0I6', '500', '2022-11-04 12:51:58.440298', 'Cash'),
(11, 12, '8UE5VB2AO4', '500', '2022-11-04 12:52:05.962658', 'Cash'),
(12, 14, 'EM7A1KZXP8', '500', '2022-11-04 14:57:11.386377', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(200) NOT NULL,
  `pet_owner_id` int(200) NOT NULL,
  `pet_type` varchar(200) NOT NULL,
  `pet_breed` varchar(200) NOT NULL,
  `pet_age` varchar(200) NOT NULL,
  `pet_health_status` varchar(200) NOT NULL,
  `pet_description` longtext NOT NULL,
  `pet_adoption_status` varchar(200) NOT NULL DEFAULT 'Available',
  `pet_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_owner_id`, `pet_type`, `pet_breed`, `pet_age`, `pet_health_status`, `pet_description`, `pet_adoption_status`, `pet_image`) VALUES
(1, 2, 'Cat', 'Male', '3 Months', 'Healthy', 'Very wonderful kitty cat kitten.', 'Adopted', 'kitty-cat-kitten-pet-45201.jpeg'),
(2, 2, 'Cat', 'Female', '3 Months', 'Ill', 'Very sweet kitty ', 'Available', 'cat-sweet-kitty-animals-57416.jpeg'),
(3, 2, 'Cat', 'Female', '4  Months', 'Healthy', 'A Very wonderful kitty', 'Available', 'cat-pet-animal-domestic-104827.jpeg'),
(4, 2, 'Cat', 'Female', '3 Months', 'Healthy', 'A very healthy, wonderful cat.', 'Available', 'pexels-photo-669015.jpeg'),
(5, 2, 'Dog', 'German Sheperd ', '3 Months', 'Healthy', 'A lovely pet, ready for having for  a new owner', 'Available', 'puppy-1903313_960_720.jpg'),
(6, 4, 'Dog', 'Puppy', '4  Months', 'Healthy', 'Very playfully pet.', 'Adopted', 'terrier-1851108_960_720.jpg'),
(7, 4, 'Cat', 'Kitten', '5 Months', 'Healthy', 'A very playful kitten.', 'Available', 'file-20220804-9397-c9swv9.avif'),
(8, 2, 'Dog', 'Chiwawa', '5 Months', 'Healthy', 'Gorgeous chiwawa', 'Adopted', 'ask_aaha_pet_overweight_teaser.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adopter`
--

CREATE TABLE `pet_adopter` (
  `pet_adopter_id` int(200) NOT NULL,
  `pet_adopter_login_id` int(200) NOT NULL,
  `pet_adopter_name` varchar(200) NOT NULL,
  `pet_adopter_email` varchar(200) NOT NULL,
  `pet_adopter_phone_number` varchar(200) NOT NULL,
  `pet_adopter_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_adopter`
--

INSERT INTO `pet_adopter` (`pet_adopter_id`, `pet_adopter_login_id`, `pet_adopter_name`, `pet_adopter_email`, `pet_adopter_phone_number`, `pet_adopter_address`) VALUES
(1, 5, 'Lil Mat', 'lilmart@gmail.com', '987654321', '120 Kikima'),
(2, 8, 'Hillary Moses', 'moseshill900@gmail.com', '09882323423', '120 Localhost');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `pet_adoption_id` int(200) NOT NULL,
  `pet_adoption_pet_id` int(200) NOT NULL,
  `pet_adoption_pet_adopter_id` int(200) NOT NULL,
  `pet_adoption_date` varchar(200) NOT NULL,
  `pet_adoption_payment_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `pet_adoption_return_status` varchar(200) NOT NULL DEFAULT 'Not Returned',
  `pet_adoption_ref` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`pet_adoption_id`, `pet_adoption_pet_id`, `pet_adoption_pet_adopter_id`, `pet_adoption_date`, `pet_adoption_payment_status`, `pet_adoption_return_status`, `pet_adoption_ref`) VALUES
(12, 1, 1, '2022-11-04', 'Paid', 'Not Returned', 'ADP-U-4632'),
(13, 6, 2, '2022-11-04', 'Paid', 'Not Returned', 'ADP-X-4612'),
(14, 8, 1, '2022-11-04', 'Paid', 'Not Returned', 'ADP-Y-2308');

-- --------------------------------------------------------

--
-- Table structure for table `pet_owner`
--

CREATE TABLE `pet_owner` (
  `pet_owner_id` int(200) NOT NULL,
  `pet_owner_login_id` int(200) NOT NULL,
  `pet_owner_name` varchar(200) NOT NULL,
  `pet_owner_email` varchar(200) NOT NULL,
  `pet_owner_contacts` varchar(200) NOT NULL,
  `pet_owner_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_owner`
--

INSERT INTO `pet_owner` (`pet_owner_id`, `pet_owner_login_id`, `pet_owner_name`, `pet_owner_email`, `pet_owner_contacts`, `pet_owner_address`) VALUES
(2, 3, 'Lil Tunenchi', 'liltunechi90@htmail.com', '098765432', '120 New Oleans'),
(4, 7, 'James Fraking ', 'jg8909@gmail.com', '+254755642323', '120 Localhost');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `AdminLoginId` (`admin_login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `PaymentAdoptionId` (`payment_pet_adoption_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `PetOwnerId` (`pet_owner_id`);

--
-- Indexes for table `pet_adopter`
--
ALTER TABLE `pet_adopter`
  ADD PRIMARY KEY (`pet_adopter_id`),
  ADD KEY `PetAdopterLoginId` (`pet_adopter_login_id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`pet_adoption_id`),
  ADD KEY `PetAdoptionPetId` (`pet_adoption_pet_id`),
  ADD KEY `PetAdoptionAdopterId` (`pet_adoption_pet_adopter_id`);

--
-- Indexes for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD PRIMARY KEY (`pet_owner_id`),
  ADD KEY `PetOwnerLoginId` (`pet_owner_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pet_adopter`
--
ALTER TABLE `pet_adopter`
  MODIFY `pet_adopter_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `pet_adoption_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pet_owner`
--
ALTER TABLE `pet_owner`
  MODIFY `pet_owner_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `AdminLoginId` FOREIGN KEY (`admin_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `PaymentAdoptionId` FOREIGN KEY (`payment_pet_adoption_id`) REFERENCES `pet_adoption` (`pet_adoption_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `PetOwnerId` FOREIGN KEY (`pet_owner_id`) REFERENCES `pet_owner` (`pet_owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_adopter`
--
ALTER TABLE `pet_adopter`
  ADD CONSTRAINT `PetAdopterLoginId` FOREIGN KEY (`pet_adopter_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `PetAdoptionAdopterId` FOREIGN KEY (`pet_adoption_pet_adopter_id`) REFERENCES `pet_adopter` (`pet_adopter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PetAdoptionPetId` FOREIGN KEY (`pet_adoption_pet_id`) REFERENCES `pet` (`pet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD CONSTRAINT `PetOwnerLoginId` FOREIGN KEY (`pet_owner_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
