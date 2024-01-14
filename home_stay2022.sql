-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 07:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_stay2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `dis_name` varchar(225) NOT NULL,
  `remark` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `pro_id`, `dis_name`, `remark`) VALUES
(1, 1, 'ເມືອງ ວຽງຄຳ', ''),
(2, 1, 'ເມືອງ ໝື່ນ', ''),
(4, 1, 'ເມືອງ ໂພນໂຮງ', ''),
(5, 1, 'ເມືອງ ຊະນະຄາມ', ''),
(6, 1, 'ເມືອງ ແກ້ວອຸດົມ', ''),
(7, 1, 'ເມືອງ ເຟືອງ', ''),
(8, 1, 'ເມືອງ ຫີນເຫີບ', ''),
(9, 1, 'ເມືອງ ກາສີ', ''),
(10, 1, 'ເມືອງ ແມດ', ''),
(11, 1, 'ເມືອງ ວັງວຽງ', ''),
(12, 1, 'ເມືອງ ທຸລະຄົມ', ''),
(14, 2, 'ເມືອງ ຈັນທະບູລີ', ''),
(15, 2, 'ເມືອງ ໄຊເສດຖາ', ''),
(16, 2, 'ເມືອງ ສີໂຄດຕະບອງ', ''),
(17, 2, 'ເມືອງ ສີສັດຕະນາກ', ''),
(18, 2, 'ເມືອງ ຫາດຊາຍຟອງ', ''),
(19, 2, 'ເມືອງ ນາຊາຍທອງ', ''),
(20, 2, 'ເມືອງ ໄຊທານີ', ''),
(21, 2, 'ເມືອງ ສັງທອງ', ''),
(22, 2, 'ເມືອງ ໃໝ່ປາກງື່ມ', ''),
(23, 6, 'ເມືອງ ບຸນໃຕ້', ''),
(24, 6, 'ເມືອງ ຂວາ', ''),
(25, 6, 'ເມືອງ ໃໝ່', ''),
(26, 6, 'ເມືອງ ຍອດອູ', ''),
(27, 6, 'ເມືອງ ຜົ້ງສາລີ', ''),
(28, 6, 'ເມືອງ ສຳພັນ', ''),
(29, 6, 'ເມືອງ ບຸນເໜືອ', ''),
(30, 8, 'ເມືອງ ຫຼວງນຳ້ທາ', ''),
(31, 8, 'ເມືອງ ສິງ', ''),
(32, 8, 'ເມືອງ ລອງ', ''),
(33, 8, 'ເມືອງ ວຽງພູຄາ', ''),
(34, 8, 'ເມືອງ ນາແລ', ''),
(35, 10, 'ເມືອງ ຫ້ວຍຊາຍ', ''),
(36, 10, 'ເມືອງ ຕົ້ນເຜິ້ງ', ''),
(37, 10, 'ເມືອງ ເມິງ', ''),
(38, 10, 'ເມືອງ ຜາອຸດົມ', ''),
(39, 10, 'ເມືອງ ປາກທາ', ''),
(40, 3, 'ເມືອງ ຫຼາ', ''),
(41, 3, 'ເມືອງ ນາໝໍ້', ''),
(42, 3, 'ເມືອງ ໄຊ', ''),
(43, 3, 'ເມືອງ ງາ', ''),
(44, 3, 'ເມືອງ ແບງ', ''),
(45, 3, 'ເມືອງ ຮຸນ', ''),
(46, 3, 'ເມືອງ ປາກແບງ', ''),
(47, 4, 'ເມືອງ ຫຼວງພະບາງ', ''),
(48, 4, 'ເມືອງ ຊຽງເງິນ', ''),
(49, 4, 'ເມືອງ ນານ', ''),
(50, 4, 'ເມືອງ ປາກອູ', ''),
(51, 4, 'ເມືອງ ນຳ້ບາກ', ''),
(52, 4, 'ເມືອງ ງອຍ', ''),
(53, 4, 'ເມືອງ ປາກແຊງ', ''),
(54, 4, 'ເມືອງ ໂພນໄຊ', ''),
(55, 4, 'ເມືອງ ຈອມເພັດ', ''),
(56, 4, 'ເມືອງ ວຽງຄຳ', ''),
(57, 4, 'ເມືອງ ພູຄູນ', ''),
(58, 4, 'ເມືອງ ໂພນທອງ', ''),
(59, 11, 'ເມືອງ ບໍ່ແຕນ', ''),
(60, 11, 'ເມືອງ ຫົງສາ', ''),
(61, 11, 'ເມືອງ ແກ່ນທ້າວ', ''),
(62, 11, 'ເມືອງ ຄອບ', ''),
(63, 11, 'ເມືອງ ເງິນ', ''),
(64, 11, 'ເມືອງ ປາກລາຍ', ''),
(65, 11, 'ເມືອງ ພຽງ', ''),
(66, 11, 'ເມືອງ ທົ່ງມີໄຊ', ''),
(67, 11, 'ເມືອງ ໄຊຍະບູລີ', ''),
(68, 11, 'ເມືອງ ຊຽງຮ່ອນ', ''),
(69, 11, 'ເມືອງ ໄຊສະຖານ', ''),
(70, 12, 'ເມືອງ ຊຳເໜືອ', ''),
(71, 12, 'ເມືອງ ຊຽງຄໍ້', ''),
(72, 12, 'ເມືອງ ຮ້ຽມ', ''),
(73, 12, 'ເມືອງ ວຽງໄຊ', ''),
(74, 12, 'ເມືອງ ຫົວເມືອງ', ''),
(75, 12, 'ເມືອງ ຊຳໃຕ້', ''),
(76, 12, 'ເມືອງ ສົບເບົາ', ''),
(77, 12, 'ເມືອງ ແອດ', ''),
(78, 12, 'ເມືອງ ກວ້ນ', ''),
(79, 12, 'ເມືອງ ຊ່ອນ', ''),
(80, 7, 'ເມືອງ ແປກ(ໂພນສະຫວັນ)', ''),
(81, 7, 'ເມືອງ ຄຳ', ''),
(82, 7, 'ເມືອງ ໜອງແຮດ', ''),
(83, 7, 'ເມືອງ ຄູນ', ''),
(84, 7, 'ເມືອງ ໝອກ', ''),
(85, 7, 'ເມືອງ ພູກູດ', ''),
(86, 7, 'ເມືອງ ຜາໄຊ', ''),
(87, 9, 'ເມືອງ ລ້ອງແຈ້ງ', ''),
(88, 9, 'ເມືອງ ທ່າໂທມ', ''),
(89, 9, 'ເມືອງ ອະນຸວົງ', ''),
(90, 9, 'ເມືອງ ລ້ອງຊານ', ''),
(91, 9, 'ເມືອງ ຮົ່ມ', ''),
(92, 19, 'ເມືອງ ປາກຊັນ', ''),
(93, 19, 'ເມືອງ ທ່າພະບາດ', ''),
(94, 19, 'ເມືອງ ປາກກະດິງ', ''),
(95, 19, 'ເມືອງ ຄຳເກີດ(ຫຼັກ20)', ''),
(96, 19, 'ເມືອງ ບໍລິຄັນ', ''),
(97, 19, 'ເມືອງ ວຽງທອງ', ''),
(98, 19, 'ເມືອງ ໄຊຈຳພອນ', ''),
(99, 20, 'ເມືອງ ທ່າແຂກ', ''),
(100, 20, 'ເມືອງ ມະຫາໄຊ', ''),
(101, 20, 'ເມືອງ ໜອງບົກ', ''),
(102, 20, 'ເມືອງ ຫີນບູນ', ''),
(103, 20, 'ເມືອງ ຍົມມະລາດ', ''),
(104, 20, 'ເມືອງ ບົວລະພາ', ''),
(105, 20, 'ເມືອງ ນາກາຍ', ''),
(106, 20, 'ເມືອງ ເຊບັ້ງໄຟ', ''),
(107, 20, 'ເມືອງ ໄຊບົວທອງ', ''),
(108, 20, 'ເມືອງ ຄູນຄຳ', ''),
(109, 16, 'ເມືອງ ໄກສອນ ພົມວິຫານ', ''),
(110, 16, 'ເມືອງ ອຸທຸມພອນ', ''),
(111, 16, 'ເມືອງ ອາດສະພັງທອງ', ''),
(112, 16, 'ເມືອງ ພີນ', ''),
(113, 16, 'ເມືອງ ເຊໂປນ', ''),
(114, 16, 'ເມືອງ ນອງ', ''),
(115, 16, 'ເມືອງ ທ່າປາງທອງ', ''),
(116, 16, 'ເມືອງ ສອງຄອນ', ''),
(117, 16, 'ເມືອງ ຈຳພອນ', ''),
(118, 16, 'ເມືອງ ຊົນນະບູລີ', ''),
(119, 16, 'ເມືອງ ໄຊບູລີ', ''),
(120, 16, 'ເມືອງ ວິລະບູລີ', ''),
(121, 16, 'ເມືອງ ອາດສະພອນ', ''),
(122, 16, 'ເມືອງ ໄຊພູທອງ', ''),
(123, 16, 'ເມືອງ ພະລານໄຊ', ''),
(124, 17, 'ເມືອງ ລາລະວັນ', ''),
(125, 17, 'ເມືອງ ລະຄອນເພັງ', ''),
(126, 17, 'ເມືອງ ວາປີ', ''),
(127, 17, 'ເມືອງ ເລົ່າງາມ', ''),
(128, 17, 'ເມືອງ ຕຸ້ມລານ', ''),
(129, 17, 'ເມືອງ ຕະໂອ້ຍ', ''),
(130, 17, 'ເມືອງ ຄົງເຊໂດນ', ''),
(131, 17, 'ເມືອງ ສະມ້ວຍ', ''),
(132, 15, 'ເມືອງ ປາກເຊ', ''),
(133, 15, 'ເມືອງ ຊະນະສົມບູນ', ''),
(134, 15, 'ເມືອງ ບາຈຽງຈະເລີນສຸກ', ''),
(135, 15, 'ເມືອງ ປາກຊ່ອງ', ''),
(136, 15, 'ເມືອງ ປະທຸມພອນ', ''),
(137, 15, 'ເມືອງ ໂພນທອງ', ''),
(138, 15, 'ເມືອງ ຈຳປາສັກ', ''),
(139, 15, 'ເມືອງ ສຸຂຸມາ', ''),
(140, 15, 'ເມືອງ ມູນລະປະໂມກ', ''),
(141, 15, 'ເມືອງ ໂຂງ', ''),
(142, 13, 'ເມືອງ ທ່າແຕງ', ''),
(143, 13, 'ເມືອງ ລະມາມ', ''),
(144, 13, 'ເມືອງ ກະລຶມ', ''),
(145, 13, 'ເມືອງ ດັກຈຶງ', ''),
(146, 14, 'ເມືອງ ໄຊເຊດຖາ', ''),
(147, 14, 'ເມືອງ ສາມັກຄີໄຊ', ''),
(148, 14, 'ເມືອງ ສະໜາມໄຊ', ''),
(149, 14, 'ເມືອງ ຊານໄຊ', ''),
(150, 14, 'ເມືອງ ພູວົງ', '');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `i_id` int(5) NOT NULL,
  `ren_id` int(5) NOT NULL,
  `i_numuser` int(10) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `tel` varchar(225) NOT NULL,
  `check_in` datetime NOT NULL,
  `status_price` int(5) NOT NULL,
  `i_remark` varchar(225) NOT NULL,
  `u_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`i_id`, `ren_id`, `i_numuser`, `fname`, `lname`, `tel`, `check_in`, `status_price`, `i_remark`, `u_id`) VALUES
(2, 1, 11, 'ທ້າວ ທ່າຊັນ', 'ແກ້ວມະນີວົງ', '02056865726', '2023-12-10 19:27:25', 11, '', 2),
(3, 2, 11111, 'ທ້າວ ສີຄານ', 'ທຳມະວົງ', '02077335121', '2023-12-10 20:32:41', 22, '', 2),
(4, 3, 36535253, 'ໝີ່', 'ລົດຕຳຍຳກຸ້ງ', '1', '2023-12-10 20:33:06', 11, '', 2),
(5, 4, 34534534, 'ທ້າວ', 'ທ່າຊັນ', '2342555', '2023-12-11 10:55:42', 22, '', 2),
(6, 5, 232342, 'ທ້າວ ສົມພານ', 'ວັງເວິນ', '2342', '2023-12-13 14:02:54', 22, '', 2),
(7, 1, 234234, 'ນາງ ພາວະດີ', 'ອຸດທະວົງ', '1', '2023-12-13 14:46:55', 22, '', 11),
(8, 2, 564534, 'ທ້າວ ອ໊ອດດີ້', 'ວັງເວິນ', '1', '2023-12-13 14:49:32', 11, '', 11),
(9, 5, 675675, 'ນາງ ພາວະດີ', 'ອຸດທະວົງ', '45674', '2023-12-13 14:50:16', 22, '', 2),
(10, 3, 32342, 'ນາງ ພາວະດີ', 'ອຸດທະວົງ', '02077335121', '2023-12-14 23:01:42', 11, '', 11),
(11, 3, 657657, 'gcvh', 'hgvgh', '02056865726', '2023-12-20 22:35:34', 22, '', 13),
(12, 6, -1, 'tery', 'vanthavy', '02055555555', '2023-12-25 13:38:09', 22, 'wow', 13),
(13, 4, 0, 'ນາງ ວານິດາ', 'ຊົງ', '02056865726', '2023-12-26 12:58:23', 11, '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pay_for_room`
--

CREATE TABLE `pay_for_room` (
  `pay_id` int(5) NOT NULL,
  `bill_no` int(10) NOT NULL,
  `i_id` int(10) NOT NULL,
  `ren_id` int(10) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `numuser` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `check_out` date DEFAULT NULL,
  `pay_remark` varchar(225) NOT NULL,
  `u_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pay_for_room`
--

INSERT INTO `pay_for_room` (`pay_id`, `bill_no`, `i_id`, `ren_id`, `price`, `numuser`, `name`, `check_out`, `pay_remark`, `u_id`) VALUES
(1, 1012, 3, 2, '80000.00', 11111, 'ທ້າວ ຕັ້ງ ມະນີວົງ', '2023-12-11', '', 2),
(2, 1014, 5, 4, '150000.00', 34534534, 'ທ້າວ ທ່າຊັນ', '2023-12-13', '', 2),
(3, 1013, 4, 3, '150000.00', 36535253, 'ໝີ່ ລົດຕຳຍຳກຸ້ງ', '2023-12-13', '', 2),
(4, 1025, 2, 1, '80000.00', 11, 'ທ້າວ ທ່າຊັນ ແກ້ວມະນີວົງ', '2023-12-13', '', 2),
(5, 1017, 6, 5, '80000.00', 232342, 'ທ້າວ ສົມພານ ວັງເວິນ', '2023-12-13', '', 2),
(6, 1018, 10, 3, '150000.00', 32342, 'ນາງ ພາວະດີ ອຸດທະວົງ', '2023-12-20', '', 13),
(7, 1019, 11, 3, '150000.00', 657657, 'gcvh hgvgh', '2023-12-20', '', 13),
(8, 1020, 6, 5, '80000.00', 232342, 'ທ້າວ ສົມພານ ວັງເວິນ', '2023-12-24', '', 13),
(9, 1022, 2, 1, '80000.00', 11, 'ທ້າວ ທ່າຊັນ ແກ້ວມະນີວົງ', '2023-12-24', '', 13),
(10, 1024, 12, 6, '80000.00', -1, 'tery vanthavy', '2023-12-25', '', 13);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pro_id` int(5) NOT NULL,
  `pro_name` varchar(225) NOT NULL,
  `remark` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pro_id`, `pro_name`, `remark`) VALUES
(1, 'ແຂວງ ວຽງຈັນ', ''),
(2, 'ນະຄອນຫຼວງວຽງຈັນ', ''),
(3, 'ແຂວງ ອຸດົມໄຊ', ''),
(4, 'ແຂວງ ຫຼວງພະບາງ', ''),
(6, 'ແຂວງ ຜົ້ງສາລີ', ''),
(7, 'ແຂວງ ຊຽງຂວາງ', ''),
(8, 'ແຂວງ ຫຼວງນຳ້ທາ', ''),
(9, 'ແຂວງ ໄຊສົມບູນ', ''),
(10, 'ແຂວງ ບໍ່ແກ້ວ', ''),
(11, 'ແຂວງ ໄຊຍະບູລີ', ''),
(12, 'ແຂວງ ຫົວພັນ', ''),
(13, 'ແຂວງ ເຊກອງ', ''),
(14, 'ແຂວງ ອັດຕະປື', ''),
(15, 'ແຂວງ ຈຳປາສັກ', ''),
(16, 'ແຂວງ ສະຫວັນນະເຂດ', ''),
(17, 'ແຂວງ ສາລາວັນ', ''),
(19, 'ແຂວງ ບໍລິຄຳໄຊ', ''),
(20, 'ແຂວງ ຄຳມ່ວນ', '');

-- --------------------------------------------------------

--
-- Table structure for table `room_for_rent`
--

CREATE TABLE `room_for_rent` (
  `ren_id` int(5) NOT NULL,
  `room_id` int(5) NOT NULL,
  `ren_number` varchar(225) NOT NULL,
  `ren_price` decimal(12,2) NOT NULL,
  `time_price` decimal(12,2) NOT NULL,
  `status_room` varchar(225) NOT NULL,
  `ren_remark` varchar(225) NOT NULL,
  `u_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_for_rent`
--

INSERT INTO `room_for_rent` (`ren_id`, `room_id`, `ren_number`, `ren_price`, `time_price`, `status_room`, `ren_remark`, `u_id`) VALUES
(1, 1, 'A001', '80000.00', '48000.00', '2', '', 2),
(2, 1, 'A002', '80000.00', '48000.00', '0', '', 2),
(3, 2, 'B001', '150000.00', '90000.00', '2', '', 2),
(4, 2, 'B002', '150000.00', '90000.00', '0', '', 2),
(5, 1, 'A003', '80000.00', '48000.00', '2', '', 2),
(6, 1, 'A0011', '80000.00', '48000.00', '2', '11', 13);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_id` int(5) NOT NULL,
  `room_name` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  `room_remark` varchar(225) NOT NULL,
  `u_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_id`, `room_name`, `img`, `room_remark`, `u_id`) VALUES
(1, 'ຫ້ອງທຳມະດາ', '../upload/1.webp1702209674.webp', '', 2),
(2, 'ຫ້ອງພິເສດ', '../upload/2.jpg1702209688.jpg', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `dob` date NOT NULL,
  `tel` varchar(225) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_id` int(5) NOT NULL,
  `vill_id` int(5) NOT NULL,
  `vill_now` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `u_remark` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `fname`, `lname`, `gender`, `dob`, `tel`, `pro_id`, `dis_id`, `vill_id`, `vill_now`, `status`, `username`, `password`, `image`, `u_remark`) VALUES
(2, 'cc', 'dyy', 'M', '2004-02-12', '02056865726', 3, 42, 12, 'ບ້ານ ໂນນສະຫວ່າງ', 'admin', 'aa', '202cb962ac59075b964b07152d234b70', 'aady.png', ''),
(11, 'ໂບກີ້', 'ສົມພູນຸດ', 'F', '2023-12-13', '020555555', 1, 1, 2, 'ບ້ານ ໂນນສະຫວ່າງ', 'counter', 'bokee', 'c4ca4238a0b923820dcc509a6f75849b', '../upload/404700891_1515164125982766_4865805946963097684_n.jpg1703085949.jpg', ''),
(12, 'ນາງ ພາວະດີ', 'ອຸດທະວົງ', 'F', '2023-12-13', '020999', 1, 1, 2, 'ບ້ານ ໂນນສະຫວ່າງ', 'clean', 'pawa', 'c4ca4238a0b923820dcc509a6f75849b', 'pawadee.png', ''),
(13, 'bokee', 'som', 'M', '2023-12-20', '23423423', 1, 1, 2, 'ບ້ານ ໂນນສະຫວ່າງ', 'admin', 'kee', 'c4ca4238a0b923820dcc509a6f75849b', '404700891_1515164125982766_4865805946963097684_n.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `vill_id` int(10) NOT NULL,
  `vill_name` varchar(225) NOT NULL,
  `pro_id` int(5) NOT NULL,
  `dis_id` int(5) NOT NULL,
  `remark` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`vill_id`, `vill_name`, `pro_id`, `dis_id`, `remark`) VALUES
(2, 'ບ້ານ ໂນນສະຫວ່າງ', 1, 1, ''),
(5, 'ບ້ານ ນາເຄືອ', 1, 1, ''),
(6, 'ບ້ານ ໂພນໝີ', 1, 1, ''),
(9, 'ບ້ານ ໂພນໝີ', 1, 2, ''),
(10, 'ບ້ານ ນາທອງ', 1, 1, ''),
(11, 'ບ້ານ ນາເຄືອ', 1, 4, ''),
(12, 'ບ້ານ ດອນແກ້ວ', 3, 42, ''),
(13, 'ບ້ານ ບໍ່', 3, 42, ''),
(14, 'ບ້ານ ໜອງແມງດາ', 3, 42, ''),
(15, 'ບ້ານ ເວີນແທ່ນ', 2, 20, ''),
(16, 'ບ້ານ ມູດ', 4, 48, ''),
(17, 'ບ້ານ ບວມເລົາ', 11, 64, ''),
(18, 'ບ້ານ ພູວຽງ', 7, 85, ''),
(19, 'ບ້ານ ນາຊາຍທອງ', 7, 85, ''),
(20, 'ບ້ານ ຮະງວມ', 7, 85, ''),
(21, 'ບ້ານ ນາປ່າໄຜ່', 1, 5, ''),
(22, 'ບ້ານ ນາບົວຈະເລີນ', 1, 5, ''),
(23, 'ບ້ານ ນາໝໍ້', 1, 5, ''),
(24, 'ບ້ານ ນາຕາດ', 1, 2, ''),
(25, 'ບ້ານ ພູຫົວຊ້າງ', 9, 89, ''),
(26, 'ບ້ານ ນາຫວານນ້ອຍ', 3, 42, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `ren_id` (`ren_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `pay_for_room`
--
ALTER TABLE `pay_for_room`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `i_id` (`i_id`),
  ADD KEY `ren_id` (`ren_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `room_for_rent`
--
ALTER TABLE `room_for_rent`
  ADD PRIMARY KEY (`ren_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vill_id` (`vill_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`vill_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `i_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pay_for_room`
--
ALTER TABLE `pay_for_room`
  MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `pro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `room_for_rent`
--
ALTER TABLE `room_for_rent`
  MODIFY `ren_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `vill_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`);

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`ren_id`) REFERENCES `room_for_rent` (`ren_id`),
  ADD CONSTRAINT `information_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `pay_for_room`
--
ALTER TABLE `pay_for_room`
  ADD CONSTRAINT `pay_for_room_ibfk_1` FOREIGN KEY (`i_id`) REFERENCES `information` (`i_id`),
  ADD CONSTRAINT `pay_for_room_ibfk_2` FOREIGN KEY (`ren_id`) REFERENCES `room_for_rent` (`ren_id`),
  ADD CONSTRAINT `pay_for_room_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `room_for_rent`
--
ALTER TABLE `room_for_rent`
  ADD CONSTRAINT `room_for_rent_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_type` (`room_id`),
  ADD CONSTRAINT `room_for_rent_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `room_type`
--
ALTER TABLE `room_type`
  ADD CONSTRAINT `room_type_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`vill_id`) REFERENCES `village` (`vill_id`);

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `village_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
