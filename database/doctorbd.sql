-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 07:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ambn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulances`
--

INSERT INTO `ambulances` (`id`, `user_id`, `ambn`, `phone`, `type`, `district`, `details`, `image`, `created_at`, `updated_at`) VALUES
(8, 21, 'amb544', 1521450823, 'Normal Ambulance', 'Comilla', 'dfgsad dfgfd dfgfdg', 'amb544-2019-04-225cbdc4accf492.png', '2019-03-08 07:02:43', '2019-04-22 07:42:04'),
(9, 21, 'amb564', 1521450823, 'Icu Ambulance', 'Dhaka', 'sddds', 'amb564-2019-04-225cbdc4a245b61.png', '2019-03-08 07:03:10', '2019-04-22 07:41:54'),
(12, 12, 'UN-AMB-101', 1521450823, 'Icu Ambulance', 'Dhaka', 'sdf', 'un-amb-101-2019-04-195cb9f5e537407.png', '2019-04-19 10:23:01', '2019-04-19 10:23:01'),
(13, 20, 'DMC-100', 1521450823, 'Icu Ambulance', 'Dhaka', NULL, 'dmc-100-2019-04-195cba1a1523d3c.png', '2019-04-19 12:57:25', '2019-04-19 12:57:25'),
(14, 21, 'Ananda 101', 1521450823, 'Icu Ambulance', 'Dhaka', 'asdfsd', 'ananda-101-2019-04-195cba5d58bb81d.png', '2019-04-19 17:44:24', '2019-04-19 17:44:24'),
(15, 12, 'UN-Am-201', 1521450823, 'Frezzing Ambulance', 'Comilla', 'asdf sdfsdf', 'un-am-201-2019-04-225cbd3ed086b5f.png', '2019-04-21 22:10:56', '2019-04-21 22:10:56'),
(16, 20, 'DMC - 203', 1521450823, 'Ac Ambulance', 'Dhaka', 'asd sdfsdfsdf', 'dmc-203-2019-04-225cbde80baf571.png', '2019-04-22 10:12:59', '2019-04-22 10:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_bookings`
--

CREATE TABLE `ambulance_bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ambulance_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ambulance_bookings`
--

INSERT INTO `ambulance_bookings` (`id`, `ambulance_id`, `user_id`, `mobile_no`, `created_at`, `updated_at`) VALUES
(3, 12, 12, '0193755888', '2019-04-19 15:44:51', '2019-04-19 15:44:51'),
(5, 14, 21, '0133755888', '2019-04-19 17:48:59', '2019-04-19 17:48:59'),
(7, 12, 12, '0193755888', '2019-04-20 18:07:06', '2019-04-20 18:07:06'),
(8, 12, 12, '0173755888', '2019-04-21 13:02:58', '2019-04-21 13:02:58'),
(9, 15, 12, '0173755888', '2019-04-22 11:20:29', '2019-04-22 11:20:29'),
(10, 15, 12, '0133755888', '2019-04-22 11:20:39', '2019-04-22 11:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `squantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `user_id`, `sname`, `scost`, `squantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'ICU', '5000', '12', '2019-03-31 13:33:59', '2019-03-31 13:33:59'),
(3, 1, 'CCU', '512', '10', '2019-03-31 13:40:07', '2019-03-31 13:42:47'),
(4, 12, 'ICU', '5000', '12', '2019-04-19 10:24:09', '2019-04-22 06:09:51'),
(5, 12, 'CCU', '1000', '10', '2019-04-19 10:24:24', '2019-04-19 10:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `dashboards`
--

CREATE TABLE `dashboards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_password_resets`
--

CREATE TABLE `dashboard_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 'Barguna', NULL, NULL),
(2, 'Barisal', NULL, NULL),
(3, 'Bhola', NULL, NULL),
(4, 'Jhalokati', NULL, NULL),
(5, 'Patuakhali', NULL, NULL),
(6, 'Pirojpur', NULL, NULL),
(7, 'Bandarban', NULL, NULL),
(8, 'Brahmanbaria', NULL, NULL),
(9, 'Chandpur', NULL, NULL),
(10, 'Chittagong', NULL, NULL),
(11, 'Comilla', NULL, NULL),
(12, 'Cox\'s Bazar', NULL, NULL),
(13, 'Feni', NULL, NULL),
(14, 'Khagrachhari', NULL, NULL),
(15, 'Lakshmipur', NULL, NULL),
(16, 'Noakhali', NULL, NULL),
(17, 'Rangamati', NULL, NULL),
(18, 'Dhaka', NULL, NULL),
(19, 'Faridpur', NULL, NULL),
(20, 'Gazipur', NULL, NULL),
(21, 'Gopalganj', NULL, NULL),
(22, 'Kishoreganj', NULL, NULL),
(23, 'Madaripur', NULL, NULL),
(24, 'Manikganj', NULL, NULL),
(25, 'Munshiganj', NULL, NULL),
(26, 'Narayanganj', NULL, NULL),
(27, 'Narsingdi', NULL, NULL),
(28, 'Rajbari', NULL, NULL),
(29, 'Shariatpur', NULL, NULL),
(30, 'Tangail', NULL, NULL),
(31, 'Bagerhat', NULL, NULL),
(32, 'Chuadanga', NULL, NULL),
(33, 'Jessore', NULL, NULL),
(34, 'Jhenaidah', NULL, NULL),
(35, 'Khulna', NULL, NULL),
(36, 'Kushtia', NULL, NULL),
(37, 'Magura', NULL, NULL),
(38, 'Meherpur', NULL, NULL),
(39, 'Narail', NULL, NULL),
(40, 'Satkhira', NULL, NULL),
(41, 'Jamalpur', NULL, NULL),
(42, 'Mymensingh', NULL, NULL),
(43, 'Netrakona', NULL, NULL),
(44, 'Sherpur', NULL, NULL),
(45, 'Bogra', NULL, NULL),
(46, 'Chapainawabganj', NULL, NULL),
(47, 'Joypurhat', NULL, NULL),
(48, 'Naogaon', NULL, NULL),
(49, 'Natore', NULL, NULL),
(50, 'Pabna', NULL, NULL),
(51, 'Rajshahi', NULL, NULL),
(52, 'Sirajganj', NULL, NULL),
(53, 'Dinajpur', NULL, NULL),
(54, 'Gaibandha', NULL, NULL),
(55, 'Kurigram', NULL, NULL),
(56, 'Lalmonirhat', NULL, NULL),
(57, 'Nilphamari', NULL, NULL),
(58, 'Panchagarh', NULL, NULL),
(59, 'Rangpur', NULL, NULL),
(60, 'Thakurgaon', NULL, NULL),
(61, 'Habiganj', NULL, NULL),
(62, 'Moulvibazar', NULL, NULL),
(63, 'Sunamganj', NULL, NULL),
(64, 'Sylhet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialty_id` int(10) DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `chambers` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_fees` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `specialty_id`, `designation`, `degree`, `district`, `chambers`, `phone`, `service_fees`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 3, 7, 'nuerologist', 'MBBS', 'Dhaka', 'Lab aid', NULL, NULL, '90.38327633343238', '23.741727135778106', '2019-03-23 14:02:07', '2019-04-19 06:21:10'),
(2, 13, 2, 'Cardiology', 'MBBS', 'Dhaka', 'Square hospital, Kolabagan', NULL, NULL, '90.38160609767806', '23.75290111103065', '2019-03-23 14:02:07', '2019-04-19 06:26:21'),
(4, 15, 4, 'Dentist', 'MBBS', 'Barguna', 'Dhaka Dental College, Mirpur 14', '1621450823', '800', '90.38757430430985', '23.799547632482685', '2019-03-29 06:15:29', '2019-04-22 10:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialty`
--

CREATE TABLE `doctor_specialty` (
  `id` int(10) UNSIGNED NOT NULL,
  `specialty_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_specialty`
--

INSERT INTO `doctor_specialty` (`id`, `specialty_name`, `created_at`, `updated_at`) VALUES
(1, 'Anesthesia', NULL, NULL),
(2, 'Cardiology (Heart, Cardiac Surgery, Cardiovascular, Hypertension, Blood Pressure)', NULL, NULL),
(3, 'Colorectal Surgery (Surgery of Anal Canal, Rectum, etc.)', NULL, NULL),
(4, 'Dentistry (Dental, Orthodontics, Maxillofacial Surgery, Scaling)', NULL, NULL),
(5, 'Dermatology (Skin, Venereology, Sexual, Hair, Allergy)', NULL, NULL),
(6, 'Endocrinology (Diabetes, Hormones, Thyroid, etc.)', NULL, NULL),
(7, 'ENT (Ear, Nose & Throat, Otorhinolaryngology)', NULL, NULL),
(8, 'Gastroenterology (Stomach, Pancreas and Intestine)', NULL, NULL),
(9, 'General Physician (All or any common diseases and health issues)', NULL, NULL),
(10, 'General Surgery (Incision, Operation)', NULL, NULL),
(11, 'Gynaecologic Oncology (Cancer of Female Reproductive System)', NULL, NULL),
(12, 'Gynaecology and Obstetrics (Pregnancy, Menstrual, Uterus, Female)', NULL, NULL),
(13, 'Haematology (Blood related diseases)', NULL, NULL),
(14, 'Hepato-Biliary- Pancreatic Surgery', NULL, NULL),
(15, 'Hepatology (Liver, Gallbladder, Biliary system)', NULL, NULL),
(16, 'Infectious Diseases', NULL, NULL),
(17, 'Infertility', NULL, NULL),
(18, 'Medicine (All Diseases of Adults)', NULL, NULL),
(19, 'Neonatology (New Born Issues)', NULL, NULL),
(20, 'Nephrology (Kidney, Ureter, Urinary Bladder)', NULL, NULL),
(21, 'Neuromedicine (Brain, Spinal Cord, Nerve)', NULL, NULL),
(22, 'Neurosurgery (Surgery of Brain, Spinal Cord and Nerve)', NULL, NULL),
(23, 'Nutritionist (Food, Diet, Weight Management)', NULL, NULL),
(24, 'Oncology (Cancer)', NULL, NULL),
(25, 'Ophthalmology (Eye, Vision, Cataracts, etc.)', NULL, NULL),
(26, 'Orthopaedics (Bone, Joint, Fractures)', NULL, NULL),
(27, 'Other Speciality (not mentioned in the list)', NULL, NULL),
(28, 'Paediatric Surgery (Surgery for Children)', NULL, NULL),
(29, 'Paediatrics (Child or Infant any disease)', NULL, NULL),
(30, 'Pain Management', NULL, NULL),
(31, 'Physical Medicine (Paralysis, Pain Management)', NULL, NULL),
(32, 'Physiotherapy', NULL, NULL),
(33, 'Plastic Surgery, Reconstruction or Cosmetic Surgery', NULL, NULL),
(34, 'Psychiatry (Mental Health, Drug Abuse, Depression, etc.)', NULL, NULL),
(35, 'Respiratory Medicine (Pulmonary, Lung Diseases, Bronchitis etc.)', NULL, NULL),
(36, 'Rheumatology (Arthritis, Joint, Soft Tissue problems)', NULL, NULL),
(37, 'Sex Specialist(Venereology)', NULL, NULL),
(38, 'Speech and Language Therapy', NULL, NULL),
(39, 'Thoracic Surgery (Surgery in Chest, Lung, etc.)', NULL, NULL),
(40, 'Urology (Surgery for Kidney, Ureter or Urinary Bladder)', NULL, NULL),
(41, 'Vascular Surgery (e.g. Surgery of Blood Vessels)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ldt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `gender`, `dob`, `bg`, `district`, `address`, `ldt`, `number`, `fid`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Foysal Ahmed', 'male', '1995-10-28', 'A+', 'Dhaka', 'Sector # 10 , Uttara, Bangladesh', '2019-03-21', '01521450823', 'admin', 'foysal@gmail.com', '$2y$10$k3XqORVeCDr08JzXhB76cuI73bfVRc4CjucbeNi.VSfd0f6ADhhES', 'LmfqsiWsrQXddUVPukzxz5C9F4IEzN3G5x1V3o7Y7BSCjwE42R6CqCSm6q0N', '2019-03-05 00:41:33', '2019-04-22 11:35:44'),
(2, 'Niamul Haque', 'male', '2019-01-18', 'B-', 'Rangamati', 'Dhanmondi 27, Dhaka - 1205', '2019-02-04', '01721450823', 'fa.com/n', 'niam@gmail.com', '$2y$10$IJohMNjM2N.HAJxbxbvAAOA1Gv2BZSRjTXpC69QhEpkhD9YnDx2/G', 'DpgtXFW6ZEDHrrlAtgFMpg83IHxJCrsh7r6KEUfo1r3omWnimkOGYXGvuc3y', '2019-03-31 16:05:01', '2019-04-22 11:17:08');

-- --------------------------------------------------------

--
-- Table structure for table `donor_password_resets`
--

CREATE TABLE `donor_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `vname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vlink` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `vname`, `vlink`, `created_at`, `updated_at`) VALUES
(1, 'video name', '<iframe width=\"540\" height=\"315\" src=\"https://www.youtube.com/embed/CDgJf5ztpnc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-03-29 04:18:57', '2019-03-29 04:51:50'),
(2, 'test  name 2', '<iframe width=\"540\" height=\"315\" src=\"https://www.youtube.com/embed/kskWZSRAoeg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-03-29 04:31:07', '2019-03-29 04:31:07'),
(3, 'test  name 3', '<iframe width=\"540\" height=\"315\" src=\"https://www.youtube.com/embed/ykMmO9aaYPw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-03-29 04:31:48', '2019-03-29 04:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(10) DEFAULT '1',
  `hname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hemail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `user_id`, `category_id`, `hname`, `district`, `slogan`, `hemail`, `phone`, `aphone`, `address`, `longitude`, `latitude`, `image`, `created_at`, `updated_at`) VALUES
(1, 12, 2, 'United Hospital', 'Dhaka', 'Best Hospital in Bangladesh', 'tipu4142@gmail.com', '1521450823', '01837237303', 'Plot 15 Rd No 71, Dhaka 1212 ,Bangladesh', '90.41534198829117', '23.80486397545841', 'united-2019-03-265c9a3db7028bd.jpg', '2019-03-26 06:14:08', '2019-04-18 14:05:56'),
(3, 18, 1, 'Mukti Hospital', 'Comilla', 'Best Hospital in Comilla', 'mukti_hospital@gmail.com', '1521450823', '1521450823', 'Mukti Hospital, Sashongacha, Comilla.', '91.16876157665172', '23.46598115106545', 'tipu-2019-04-195cb945f495888.jpg', '2019-04-18 21:14:27', '2019-04-18 21:57:12'),
(4, 19, 1, 'Comilla Medical College & Hospital', 'Comilla', 'Best Hospital in Comilla', 'comillamedical@gmail.com', '1521450823', '1521450823', 'Sector # 10 , Uttara\r\nBangladesh', '91.20294135760264', '23.451502693909173', 'comilla-2019-04-195cb9d111f1f95.jpg', '2019-04-18 22:15:39', '2019-04-19 08:09:44'),
(5, 20, 1, 'ঢাকা মেডিকেল কলেজ', 'Dhaka', 'Government Hospital in Dhaka', 'dmc@gmail.com', '1521450823', '1521450823', 'new market, Dhaka', '90.39783061712717', '23.725744583444442', '-2019-04-195cb9cf9fb64dc.jpg', '2019-04-19 07:31:13', '2019-04-19 07:39:43');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_category`
--

CREATE TABLE `hospital_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_category`
--

INSERT INTO `hospital_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'General Hospital / Clinic', NULL, NULL),
(2, 'Diagnostic Center', NULL, NULL),
(3, 'Dental Clinic', NULL, NULL),
(4, 'Skin and Dermatology Hospital / Clinic', NULL, NULL),
(5, 'Cancer Hospital / Clinic', NULL, NULL),
(6, 'Eye Hospital / Clinic', NULL, NULL),
(7, 'Cardiac / Heart Hospital', NULL, NULL),
(8, 'Other Specialized Hospital / Clinic ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_03_180359_create_roles_table', 1),
(4, '2018_12_03_184753_create_role_user_table', 1),
(5, '2018_12_03_184953_create_permissions_table', 1),
(6, '2018_12_03_185027_create_permission_role_table', 1),
(7, '2019_02_11_001002_create_donors_table', 1),
(8, '2019_02_11_001003_create_donor_password_resets_table', 1),
(12, '2019_03_05_070207_create_dashboards_table', 1),
(13, '2019_03_05_070208_create_dashboard_password_resets_table', 1),
(14, '2019_01_18_070359_create_ambulances_table', 1),
(15, '2019_01_23_073544_create_doctors_table', 1),
(16, '2019_01_31_203818_create_hospitals_table', 2),
(17, '2019_03_26_220349_create_doctor_specialty_table', 3),
(19, '2019_02_04_090525_create_education_table', 4),
(20, '2019_03_29_140428_create_hospital_category_table', 5),
(23, '2019_03_29_195737_create_districts_table', 6),
(29, '2019_01_31_200636_create_seats_table', 7),
(30, '2019_02_04_085046_create_tests_table', 7),
(31, '2019_02_04_085718_create_costs_table', 7),
(33, '2019_04_19_191345_create_ambulance_bookings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Super Admin', '2019-03-05 09:52:53', '2019-03-05 09:52:53'),
(2, 'doctor', 'Doctor User', '2019-03-05 09:52:53', '2019-03-05 09:52:53'),
(3, 'hospital', 'Hospital Admin', '2019-03-05 22:07:54', '2019-03-05 22:07:54'),
(4, 'ambulance', 'Ambulance service admin', '2019-03-05 22:07:54', '2019-03-05 22:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(2, 1, 1),
(17, 2, 3),
(18, 3, 12),
(20, 2, 13),
(21, 2, 15),
(23, 3, 18),
(24, 3, 19),
(25, 3, 20),
(26, 4, 21),
(27, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `icu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ccu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nicu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `tname`, `tcost`, `created_at`, `updated_at`) VALUES
(1, 12, 'Urine Test 2', '300', '2019-03-31 11:39:56', '2019-03-31 11:41:34'),
(2, 12, 'Ucg', '300 tk', '2019-03-31 11:41:54', '2019-03-31 11:41:54'),
(3, 12, 'Blood', '1000', '2019-03-31 11:42:18', '2019-03-31 11:42:18'),
(4, 12, 'Chest X-ray', '3000', '2019-03-31 11:42:42', '2019-03-31 11:42:42'),
(5, 12, 'Urine Test', '400 tk', '2019-04-17 20:20:01', '2019-04-17 20:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `show_pass`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Abul Kalam', 'admin@gmail.com', '$2y$10$xdGktaanmo8ad7leKnUxnOrH/nYuFvLh7v5WprDi8f363wYvAQhOm', '123456', '1', '70jsefSMZ1ixTE8tQrughwc0w3HIM9aIGGYUo1T64j0nSOYKaG6wNG9G3ywr', NULL, '2019-04-22 09:01:39'),
(3, 'Dr. Shohan Ahmed', 'doctor@gmail.com', '$2y$10$QbIIkONLtEpMYRcs8SbxieQCf0z6/fJtIp3O1IF1JgsVJvQbQy59e', '1234', '1', 'T9yBMaGM9X1YHkaTJuBfQw3agb3NrXyrST3AfAbAmscHNOeLKd6LN1J4dW09', NULL, '2019-04-22 09:02:24'),
(12, 'United Hospital', 'hospital@gmail.com', '$2y$10$1xIafIDR/cWSX3Z3Bdzfeu9l/b8JvPfrvN0haxru6MkZIlA0Bx5LK', '123', '1', 'CNF3EsXGEkoNKkRz85zl2dGeTx9V6QVti7ZPlxlQYCjckwamHV0DtxizDgTz', '2019-03-26 06:14:08', '2019-04-19 06:01:31'),
(13, 'Dr. Azizul Haque', 'aziz_doc@gmail.com', '$2y$10$ud7.dirai3KGZq9o1/QT9On3HVozjnmDp5oqOhDC0O0lpx1105pOS', '123', '1', '2TcdFQ3e2L7CbhLE0z3PbmeVr78CcN1qCTeyWjBLXcbQzyayDhwo7bUEKXgc', '2019-03-29 03:48:20', '2019-04-19 06:26:21'),
(15, 'Tipu Sultan', 'tipu4142@gmail.com', '$2y$10$UeaoX2UZwB51MaZpFYw/tulXFoiIckjqfDmAG9trJ8td1kyjnk.nC', '123', '1', 'LImtsBxyrFVjk4S5bWngX3ZS33mIIhzjVXww2pNYUeU4tYGmnLRYDsenz6zw', '2019-03-29 06:15:29', '2019-04-22 10:56:39'),
(18, 'Mukti Hospital', 'mukti@gmail.com', '$2y$10$RFkfXepqP4gXWjlIf4BuQ.CTZZO0f.pgXkbPO9vkV8dO7/iFM6GXu', '123', '1', 'e30GzCiNB7ZCcTXa53aBwRKypLVCVydq8VHj6Ru7lsuqoVKaKkc67Hg1acYi', '2019-04-18 21:14:27', '2019-04-18 21:14:27'),
(19, 'Comilla Medical College & Hospital', 'comillamedical@gmial.com', '$2y$10$qhhf/5Wn1Fbc5bchHBgH3eB.HahedmXDRutZDZL57ueVmTu7VS8Pm', '123', '1', NULL, '2019-04-18 22:15:39', '2019-04-18 22:15:39'),
(20, 'ঢাকা মেডিকেল কলেজ', 'dmc@gmail.com', '$2y$10$j.Il4dN2e1kjJa8GhXu7A.zi56oX46XZ/NL9rMGTdydWJO7CissoS', '123', '1', 'DDZaeZRlStgGsfcNT57twZ2ypdK5ddibU9DCvGksIA53B8k5qCzlC4UqgSls', '2019-04-19 07:31:12', '2019-04-22 10:16:55'),
(21, 'Anondo Ambulance service', 'ananda@gmail.com', '$2y$10$uxPz2TFEOOSUdhj2N3y9NejM3hNxRbY0UwJQrKa.XKYfNE7WWm1Ei', '123', '1', 'Xxr2KcVCJL5irQpKPXcn1MJUBUmazT405ms1tNc6FgPxHmqHBlrE1wUJdQXZ', '2019-04-19 17:42:06', '2019-04-19 17:42:06'),
(22, 'Tipu Sultan', 'tipu@gmail.com', '$2y$10$EQa4FoRh7vz99QcQ/i2tq.R8/FeLlb2GfQMxl0DgAmP2xlbkUYdGK', '123', '1', 'jl4HIaJOwCu0mLtysyYX2sygda3eo2FWCIF4SjvNLMfeRD65Ld8d5NJvxxOd', '2019-04-22 09:41:09', '2019-04-22 09:41:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ambulances_ambn_unique` (`ambn`);

--
-- Indexes for table `ambulance_bookings`
--
ALTER TABLE `ambulance_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboards`
--
ALTER TABLE `dashboards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dashboards_email_unique` (`email`);

--
-- Indexes for table `dashboard_password_resets`
--
ALTER TABLE `dashboard_password_resets`
  ADD KEY `dashboard_password_resets_email_index` (`email`),
  ADD KEY `dashboard_password_resets_token_index` (`token`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_specialty`
--
ALTER TABLE `doctor_specialty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donors_email_unique` (`email`);

--
-- Indexes for table `donor_password_resets`
--
ALTER TABLE `donor_password_resets`
  ADD KEY `donor_password_resets_email_index` (`email`),
  ADD KEY `donor_password_resets_token_index` (`token`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_category`
--
ALTER TABLE `hospital_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulances`
--
ALTER TABLE `ambulances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ambulance_bookings`
--
ALTER TABLE `ambulance_bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dashboards`
--
ALTER TABLE `dashboards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_specialty`
--
ALTER TABLE `doctor_specialty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospital_category`
--
ALTER TABLE `hospital_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
