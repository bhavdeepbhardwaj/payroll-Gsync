-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 16, 2022 at 01:22 PM
-- Server version: 8.0.31-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globalsy_sal_gsync23062022`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_employees`
--

CREATE TABLE `gs_employees` (
  `id` int NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_desg` varchar(255) NOT NULL,
  `emp_mail` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `emp_dept` varchar(255) NOT NULL,
  `emp_pan` varchar(255) NOT NULL,
  `emp_uan` varchar(255) DEFAULT 'NA',
  `emp_esi` varchar(255) DEFAULT 'NA',
  `emp_pic` longtext,
  `emp_paymode` varchar(150) NOT NULL,
  `emp_bank` varchar(255) DEFAULT 'NA',
  `emp_ifsc` varchar(255) DEFAULT 'NA',
  `emp_acc` varchar(255) DEFAULT 'NA',
  `emp_gsal` varchar(150) NOT NULL,
  `emp_food` varchar(50) DEFAULT NULL,
  `emp_travel` varchar(50) DEFAULT NULL,
  `emp_spl` varchar(80) DEFAULT NULL,
  `emp_meal` tinyint(1) NOT NULL,
  `emp_cab` tinyint(1) NOT NULL,
  `emp_stinc` varchar(150) DEFAULT NULL,
  `emp_inc` varchar(150) DEFAULT NULL,
  `emp_other` varchar(150) DEFAULT NULL,
  `emp_exitdate` date DEFAULT NULL,
  `emp_desp` longtext,
  `emp_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gs_employees`
--

INSERT INTO `gs_employees` (`id`, `emp_id`, `emp_name`, `emp_desg`, `emp_mail`, `doj`, `emp_dept`, `emp_pan`, `emp_uan`, `emp_esi`, `emp_pic`, `emp_paymode`, `emp_bank`, `emp_ifsc`, `emp_acc`, `emp_gsal`, `emp_food`, `emp_travel`, `emp_spl`, `emp_meal`, `emp_cab`, `emp_stinc`, `emp_inc`, `emp_other`, `emp_exitdate`, `emp_desp`, `emp_status`, `created_at`) VALUES
(1, 'GSync001', 'Test Name MM', 'Administrator', 'test@gmail.com', '2000-02-01', 'Sales', 'ABCDEF12354GM', '1236547890M', '9999885511M', NULL, 'Wire Transfer', 'ICICI', 'SBI000078M', '77886655111100', '90000000', '2500', '2500', '1200', 0, 1, '3500', '3500', '1000', '0000-00-00', 'Integer congue est nec magna accumsan, a mattis nulla pretium. Vestibulum quis orci scelerisque, venenatis est quis, tincidunt mauris. Awesome.', 1, '2022-07-21 00:00:00'),
(2, 'TEST', 'TEST', 'TEST', 'TEST@TEST.com', '2022-08-10', 'TEST', 'TEST', '', '', NULL, 'Bank Transfer', '', '', '', '10000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-10 22:10:25'),
(3, 'TEST1', 'TEST', 'TEST', 'test@werwe.com', '2022-08-01', 'TEST1', 'werewr', '', '', NULL, 'Bank Transfer', '', '', '', '10000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 13:04:32'),
(4, 'GSYNC015', 'Sonu K Babu', 'Subject Matter Expert', 'sonubabu562@gmail.com', '2020-03-05', 'GEE', 'EQHPB9596K', '101818493843', '', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317154', '35417', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 13:41:02'),
(9, 'GSYNC058', 'Sonia Titus', 'Quality Assurance Specialist', 'soniatitus457@yahoo.com', '2020-08-05', 'GEE', 'ADWPT5927G', '101542439258', '', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317227', '33333', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 13:54:46'),
(10, 'GSYNC077', 'Chetan Sharma', 'Project Engineer', 'chetan.sharma0806@gmail.com', '2020-12-07', 'GEE', 'CITPS9654P', '101397281460', '', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317294', '58000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 15:12:32'),
(11, 'GSYNC081', 'Rhytham Rathore', 'Sr. Digital Graphics Designer', 'rhythamrathore@gmail.com', '2021-02-01', 'Marketing', 'CGGPR3283Q', '101818493606', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317421', '35294', '2200', '2200', '0', 0, 0, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 15:18:21'),
(12, 'GSYNC098', 'Saurav Yadav', 'Subject Matter Expert', 'sauravy041@gmail.com', '2021-06-09', 'GEE', 'AIEPY9422C', '100666422109', '0', NULL, 'Bank Transfer', 'KMB', 'KKBK0005029', '6211706243', '35417', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 15:21:49'),
(13, 'GSYNC105', 'Atul Kumar Pandey', 'Digital marketing Specialist', '92atulpandey@gmail.com', '2021-08-09', 'Marketing', 'BIBPP5764J', '101818493597', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317138', '54000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 15:27:34'),
(14, 'GSYNC106', 'Shiny Atorthy', 'Digital Content Officer', 'shiny.atorthy2306@gmail.com', '2021-08-16', 'Marketing', '916010007799678', '0', '0', NULL, 'Bank Transfer', 'AXB', 'UTIB0000593', '916010007799678', '32000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 0, '2022-08-13 16:36:35'),
(15, 'GSYNC111', 'Sandeep Pandey', 'Sales Operations Manager', 'contactme.sandy07@gmail.com', '2021-11-22', 'GEE', 'BCYPP1947C', '100331201277', '0', NULL, 'Bank Transfer', 'HDFC', 'HDFC0000120', '1201140038047', '125000', '2200', '2200', '0', 0, 0, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 16:40:59'),
(16, 'GSYNC116', 'Rajat Mishra', 'Sales Enablement Consultant', 'harshmish1943@gmail.com', '2021-11-15', 'GEE', 'FQSPM5026F', '101818493858', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319807', '20000', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 16:44:58'),
(17, 'GSYNC121', 'Suryakant Mishra', 'Sr. Sales Enablement Consultant', 'suryakantm10@gmail.com', '2021-12-01', 'GEE', 'ERNPM5492L', '101558270091', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319815', '28887', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 16:49:02'),
(18, 'GSYNC129', 'Yash Aggarwal', 'Sales Enablement Consultant', 'yashgoyal794@gmail.com', '2022-02-01', 'GEE', 'DKDPA8530F', '101818493515', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319742', '25606', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 16:52:04'),
(19, 'GSYNC136', 'Rishab Mehra', 'Sr. Sales Enablement Consultant', 'rishabmehra4083h@gmail.com', '2022-03-15', 'GEE', 'CUSPM3016Q', '101818493870', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317081', '23709', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 16:54:48'),
(20, 'GSYNC137', 'Kuldeep Choudhary', 'Sr. Sales Enablement Consultant', 'sunnychdhr007@gmail.com', '2022-03-21', 'GEE', 'BCUPC1171M', '101818493827', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317146', '27503', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 16:58:30'),
(21, 'GSYNC138', 'Prerna Talwar', 'Training Specialist', 'sprerna1810@gmail.com', '2022-04-20', 'GEE', 'BFZPT8537C', '101682202737', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317162', '30348', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 18:39:01'),
(22, 'GSYNC143', 'Shivani Upadhyay', 'Administration Officer', 'Shivaniupadhyay843@gmail.com', '2022-06-01', 'Admin', 'AJAPU6232H', '101473056190', '0', NULL, 'Bank Transfer', 'Bandhan', 'BDBL000143', '52190042740368', '25800', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 0, '2022-08-13 19:17:09'),
(23, 'GSYNC144', 'Rohini Gangwar', 'HR Specialist', 'gangwar.rohini@gmail.com', '2022-06-14', 'HR Specialist', 'CIUPR7752N', '101839503810', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317235', '40000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 19:19:49'),
(24, 'GSYNC146', 'Somesh Mamgain', 'Sales Enablement Consultant', 'someshmamgain76@gmail.com', '2022-06-08', 'GEE', 'DZZPM7183M', '101746705030', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319734', '29300', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-13 19:23:17'),
(25, 'GSYNC147', 'Arun Kumar Chauhan', 'Sales Enablement Consultant', 'backstreet88130@gmail.com', '2022-06-09', 'GEE', 'BAGPC2442B', '', '', NULL, 'Bank Transfer', 'CBOI', 'CBIN0283626', '3806242615', '29300', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 0, '2022-08-13 19:27:10'),
(26, 'GSYNC149', 'Bharat Nebhnani', 'Data Analyst', 'bharatnebhnani5@gmail.com', '2022-06-27', 'IT', 'BSAPN3469B', '101839502964', '', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317103', '30000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-15 01:30:24'),
(27, 'GSYNC150', 'Abdul Qadir', 'Network  Communications Consultant', 'qadir.abdul7@gmail.com', '2022-06-28', 'IT', 'AAJPQ0141M', '0', '0', NULL, 'Bank Transfer', 'ICICI', 'ICIC0004183', '418301501329', '31800', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 0, '2022-08-15 01:40:08'),
(28, 'GSYNC151', 'Anjali Goswami', 'Sales Enablement Consultant', 'anjaligoswami142@gmail.com', '2022-06-21', 'GEE', 'DJPPA2014D', '', '', NULL, 'Bank Transfer', 'HDFC', 'HDFC0004263', '50100507054041', '21800', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 0, '2022-08-15 01:42:29'),
(29, 'GSYNC152', 'Chandan Kumar', 'Project Support Engg', 'chandanrajabb@gmail.com', '2022-07-04', 'GEE', 'CUHPK3962Q', '101175608033', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317219', '40000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-15 01:45:14'),
(30, 'GSYNC157', 'Rajat Kumar', 'Digital Marketing Officer', 'rthakran007@gmail.com', '2022-07-11', 'Marketing', 'ICZPK9769M', '101510716143', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317111', '15000', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-15 01:49:34'),
(31, 'GSYNC158', 'Rishabh Pathak', 'Sales Enablement Consultant', 'rishabh.rishu1995@gmail.com', '2022-07-11', 'GEE', 'CXEPP2718P', '101411786607', '0', NULL, 'Bank Transfer', 'HDFC', 'HDFC0000048', '50100288848754', '24800', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 0, '2022-08-15 01:52:37'),
(32, 'GSYNC159', 'Amit Raj Singh', 'Sales Enablement Consultant', 'negi.amit982@gmail.com', '2022-07-11', 'GEE', 'HQCPS0911M', '101028945592', '0', NULL, 'Bank Transfer', 'YES', 'YESB0000757', '075791900007764', '26800', '2200', '2200', '0', 1, 1, '2500', '0', '0', '2022-10-13', 'NA', 0, '2022-08-15 01:54:54'),
(33, 'GSYNC160', 'Swapnil Tyagi', 'Sales Enablement Consultant', 'swapnil4022@gmail.com', '2022-07-18', 'GEE', 'BPQPTI589B', '0', '0', NULL, 'Bank Transfer', 'BOB', 'BARB0VASGH', '33160100008134', '21000', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 0, '2022-08-15 11:37:38'),
(34, 'GSYNC161', 'Tshering Doma Lapcha', 'Sales Enablement Consultant', 'as0592397@gmail.com', '2022-07-18', 'GEE', 'BMTPL2980A', '101853002369', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317286', '21000', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-15 11:39:41'),
(35, 'GSYNC165', 'Bikram Mandal', 'Sales Enablement Consultant', 'iambikram08@gmail.com', '2022-07-18', 'GEE', 'DYNPM3729Q', '101685977881', '0', NULL, 'Bank Transfer', 'HDFC', 'HDFC0003949', '50100433828794', '25000', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 0, '2022-08-15 11:42:10'),
(36, 'GSYNC166', 'Tushar Aggarwal', 'Sales Enablement Consultant', 'aggart899@gmail.com', '2022-07-19', 'GEE', 'ECQPA9501L', '101627932099', '0', NULL, 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319793', '25000', '2200', '2200', '0', 1, 1, '2500', '0', '0', '0000-00-00', 'NA', 1, '2022-08-15 11:44:22'),
(37, 'GSYNC167', 'Subhasmita Malla', 'ZOHO Developer', 'malla.subhasmita@gmail.com', '2022-08-08', 'IT', 'BYXPM2808N', '101808255546', '0', NULL, 'Bank Transfer', 'ICICI', 'ICIC0007240', '305301502068', '45834', '0', '0', '0', 0, 0, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-08-15 11:47:13'),
(38, 'GSYNC168', 'Bhawna Kukreja', 'HR Specialist', 'bhawna8913@gmail.com', '2022-08-17', 'Globalsync', 'DPLPK7741M', '101303482392', '', 'profiles/bhawna kukrejabeautiful-latin-woman-avatar-character-icon-free-vector.jpg', 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317200', '61800', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-09-08 18:59:54'),
(39, 'GSYNC025', 'Dharmendra Kumar', 'Office Boy', 'dharmendra.bhagwane@gmail.com', '2020-03-16', 'Administration & Receptionist', 'AWKPK3198F', '101402994586', '', 'profiles/dharmendra kumarmen logo.jpg', 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710317308', '15000', '2200', '0', '0', 1, 0, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-10-08 09:28:39'),
(40, 'GSYNC140', 'Shivam Kumar Pandey', 'Book-Keeper', 'msp76580@gmail.com', '2022-05-02', 'Finance', 'DCLPP0537H', '101315997622', '', 'profiles/shivam kumar pandeymen logo.jpg', 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319785', '31518', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-10-08 10:04:24'),
(41, 'GSYNC169', 'DEEPAK KUMAR', 'Administration Officer', 'rudrakhi1503@gmail.com', '2022-09-12', 'Globalsync', 'EKJPK8137P', '101285354365', '', 'profiles/deepak kumarmen logo.jpg', 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036026', '52710319777', '30000', '2200', '0', '0', 1, 0, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-10-08 10:23:25'),
(42, 'GSYNC171', 'Bhavdeep Bhardwaj', 'Web Developer', 'bbharadwaj@gee.co', '2022-10-10', 'IT', 'DNHPB9425H', '', '', 'profiles/bhavdeep bhardwajmale-icon-4.jpg', 'Bank Transfer', 'STANDARD CHARTERED BANK', 'SCBL0036025', '53111338616', '41667', '2200', '2200', '0', 1, 1, '0', '0', '0', '0000-00-00', 'NA', 1, '2022-11-10 20:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `gs_emp_salary`
--

CREATE TABLE `gs_emp_salary` (
  `sal_id` int NOT NULL,
  `emp_sal_id` varchar(255) NOT NULL,
  `month_yr` date NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `a` varchar(30) DEFAULT NULL,
  `b` varchar(30) DEFAULT NULL,
  `c` varchar(30) DEFAULT NULL,
  `d` varchar(30) DEFAULT NULL,
  `e` varchar(30) DEFAULT NULL,
  `f` varchar(30) DEFAULT NULL,
  `g` varchar(30) DEFAULT NULL,
  `h` varchar(30) DEFAULT NULL,
  `i` varchar(30) DEFAULT NULL,
  `j` varchar(30) DEFAULT NULL,
  `k` varchar(30) DEFAULT NULL,
  `l` varchar(30) DEFAULT NULL,
  `m` varchar(30) DEFAULT NULL,
  `n` varchar(30) DEFAULT NULL,
  `o` varchar(30) DEFAULT NULL,
  `p` varchar(30) DEFAULT NULL,
  `q` varchar(30) DEFAULT NULL,
  `r` varchar(30) DEFAULT NULL,
  `s` varchar(30) DEFAULT NULL,
  `t` varchar(30) DEFAULT NULL,
  `u` varchar(30) DEFAULT NULL,
  `v` varchar(30) DEFAULT NULL,
  `w` varchar(30) DEFAULT NULL,
  `x` varchar(30) DEFAULT NULL,
  `y` varchar(30) DEFAULT NULL,
  `z` varchar(30) DEFAULT NULL,
  `aa` varchar(30) DEFAULT NULL,
  `ab` varchar(30) DEFAULT NULL,
  `ac` varchar(30) DEFAULT NULL,
  `ad` varchar(30) DEFAULT NULL,
  `ae` varchar(30) DEFAULT NULL,
  `pre_leave_bal` varchar(30) DEFAULT NULL,
  `total_ab` varchar(30) DEFAULT NULL,
  `total_upl` varchar(50) DEFAULT NULL,
  `total_p` varchar(30) DEFAULT NULL,
  `total_hd` varchar(30) DEFAULT NULL,
  `wo_ph` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `late_coming` varchar(30) DEFAULT NULL,
  `hd_bcoz_late` varchar(30) DEFAULT NULL,
  `leaves_adjusted` varchar(30) DEFAULT NULL,
  `sal_month_basic` varchar(255) DEFAULT NULL,
  `sal_month_hra` varchar(255) DEFAULT NULL,
  `sal_month_sa` varchar(255) DEFAULT NULL,
  `sal_month_oa` varchar(255) DEFAULT NULL,
  `emp_pf_cont` varchar(255) DEFAULT NULL,
  `empr_pf_cont` varchar(255) DEFAULT NULL,
  `emp_esic_cont` varchar(255) DEFAULT NULL,
  `empr_esic_cont` varchar(255) DEFAULT NULL,
  `daily_pay` varchar(255) DEFAULT NULL,
  `leave_bal_at_start` varchar(30) DEFAULT NULL,
  `fix_sal_month_pay` varchar(255) DEFAULT NULL,
  `tds_deduction` varchar(255) DEFAULT NULL,
  `penalty_adj` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `sandwhich_leave_deduction` varchar(30) DEFAULT NULL,
  `transport` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `food` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `other_inc_dues` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `arrears` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `inc_refferal` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `pre_month_qualified_app_ach` varchar(50) DEFAULT NULL,
  `qualified_percentage_pre_month` varchar(50) DEFAULT NULL,
  `inc_qualified` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `spl_allowance` varchar(255) DEFAULT NULL,
  `kw_installed` varchar(255) DEFAULT NULL,
  `install_inc` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `stack_inc` varchar(255) DEFAULT NULL,
  `adjustment` varchar(255) DEFAULT NULL,
  `net_salary` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `inc_amt` varchar(255) DEFAULT NULL,
  `clawback` varchar(255) DEFAULT NULL,
  `inc` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `deductions` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `earnings` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `transport_redeem` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `food_redeem` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '0',
  `adv_adj` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `otp_install` varchar(255) DEFAULT NULL,
  `otp_inc_install` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gs_emp_salary`
--

INSERT INTO `gs_emp_salary` (`sal_id`, `emp_sal_id`, `month_yr`, `employee_id`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `m`, `n`, `o`, `p`, `q`, `r`, `s`, `t`, `u`, `v`, `w`, `x`, `y`, `z`, `aa`, `ab`, `ac`, `ad`, `ae`, `pre_leave_bal`, `total_ab`, `total_upl`, `total_p`, `total_hd`, `wo_ph`, `late_coming`, `hd_bcoz_late`, `leaves_adjusted`, `sal_month_basic`, `sal_month_hra`, `sal_month_sa`, `sal_month_oa`, `emp_pf_cont`, `empr_pf_cont`, `emp_esic_cont`, `empr_esic_cont`, `daily_pay`, `leave_bal_at_start`, `fix_sal_month_pay`, `tds_deduction`, `penalty_adj`, `sandwhich_leave_deduction`, `transport`, `food`, `other_inc_dues`, `arrears`, `inc_refferal`, `pre_month_qualified_app_ach`, `qualified_percentage_pre_month`, `inc_qualified`, `spl_allowance`, `kw_installed`, `install_inc`, `stack_inc`, `adjustment`, `net_salary`, `status`, `inc_amt`, `clawback`, `inc`, `deductions`, `earnings`, `transport_redeem`, `food_redeem`, `adv_adj`, `otp_install`, `otp_inc_install`) VALUES
(1, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(10, 'GSync0012022-06', '2022-06-01', 'GSync001', 'AB', 'AB', 'P', 'AB', 'W/O', 'P', 'P', 'P', 'P', 'P', 'P', 'W/O', 'PH', 'P', 'P', 'P', 'P', 'P', 'W/O', 'P', 'P', 'P', 'P', 'P', 'P', 'W/O', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '1200', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', '2500', '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(11, '2022-06', '2022-06-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(16, 'GSync0012022-06-01', '2022-06-01', 'GSync001', 'AB', 'AB', 'P', 'W/O', 'W/O', 'P', 'P', 'P', 'P', 'P', 'P', 'W/O', 'PH', 'P', 'P', 'P', 'P', 'P', 'W/O', 'P', 'P', 'P', 'P', 'P', 'P', 'W/O', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '0', '0', '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(17, '2022-06-01', '2022-06-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(22, 'GSync0012022-05', '2022-05-01', 'GSync001', 'AB', 'AB', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'W/O', 'PH', 'P', 'P', 'P', 'P', 'P', 'W/O', 'P', 'P', 'P', 'P', 'P', 'P', 'W/O', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(23, '2022-05', '2022-05-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(25, 'GSync0012022-04', '2022-04-01', 'GSync001', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(26, '2022-04', '2022-04-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(28, 'GSync0012022-03', '2022-03-01', 'GSync001', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(29, 'GSync0022022-03', '2022-03-01', 'GSync002', 'P', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(30, '2022-03', '2022-03-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(31, 'GSync0012022-02', '2022-02-01', 'GSync001', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(32, 'GSync0022022-02', '2022-02-01', 'GSync002', 'P', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(33, '2022-02', '2022-02-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '0', '0', '0', '0', '0', NULL, NULL),
(34, 'GSync0012022-01', '2022-01-01', 'GSync001', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(35, 'GSync0022022-01', '2022-01-01', 'GSync002', 'P', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', NULL, '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', NULL, '2500.00', '30330.00', '', '', '', '6840.00', '0', '0', '0', '0', '0', NULL, NULL),
(36, 'GSync0012022-07', '2022-07-01', 'GSync001', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '2200.00', '2200.00', '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', '2500.00', '2500.00', '30330.00', '', '', '', '6840.00', '3200.00', '0', '0', '0', '0', NULL, NULL),
(37, 'GSync0022022-07', '2022-07-01', 'GSync002', 'P', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', '', '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', '2500.00', '2500.00', '30330.00', '', '', '', '6840.00', '1100.00', '0', '0', '0', '0', NULL, NULL),
(38, 'GSync0012022-08', '2022-08-01', 'GSync001', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '2200.00', '2200.00', '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', '2500.00', '2500.00', '30330.00', '', '', '', '6840.00', '3200.00', '52000', '1234', '4321', '0', NULL, NULL),
(39, 'GSync0022022-08', '2022-08-01', 'GSync002', 'P', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '', '', '', '', '', '1.00', '', '0.00', '', '21.70', '4340.00', '2500.00', '2500.00', '30330.00', '', '', '', '6840.00', '1100.00', '64000', '0', '0', '0', NULL, NULL),
(40, 'GSYNC0152022-08', '2022-08-01', 'GSYNC015', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', '4.50', '0.00', '0.00', '25.00', '0.00', '6.00', '0.00', '0.00', '0.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '815.81', '4.50', '23490.00', '', '', '', '2200.00', '2200.00', '', '', '', '1.00', '', '0.00', '', '18.50', '3696.00', '2500.00', '0.00', '29686.00', '', '', '', '6196.00', '0.00', '0', '2200', '2200', '0', NULL, NULL),
(41, 'GSYNC0152022-09', '2022-09-01', 'GSYNC015', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '22.50', '1.00', '7.00', '0.00', '0.00', '0.50', '14166.80', '7083.40', '7083.40', '7083.40', '1800.00', '1950.00', '0.00', '0.00', '1180.57', '', '33617.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '0.00', '0.00', '0.00', '0.00', '', '0.00', '1875.00', '0.00', '35492.00', '', '', '', '0.00', '8150.00', '43642.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(42, 'GSYNC0252022-09', '2022-09-01', 'GSYNC025', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '22.00', '0.00', '7.00', '0.00', '0.00', '1.00', '12000.00', '3000.00', '0.00', '0.00', '1440.00', '1560.00', '112.50', '487.50', '500.00', '', '13447.50', '0.00', '0.00', '', '0.00', '2126.67', '', '0.00', '', '0.00', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '13447.50', '', '', '', '', '5726.67', '19174.16', '0.00', '2126.67', '0.00', NULL, NULL),
(43, 'GSYNC0582022-09', '2022-09-01', 'GSYNC058', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'AB', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '21.50', '1.00', '7.00', '0.00', '0.00', '1.50', '13333.20', '6666.60', '6666.60', '6666.60', '1800.00', '1950.00', '0.00', '0.00', '1111.10', '', '31533.00', '0.00', '0.00', '', '2126.67', '2126.67', '', '0.00', '', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1533.00', '', '', '', '0.00', '38003.33', '39536.33', '2126.67', '2126.67', '30000.00', NULL, NULL),
(44, 'GSync0012022-09', '2022-09-01', 'GSync001', 'P', 'AB', 'P', 'AB', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', '', '2.00', '1.00', '0.00', '23.00', '0.00', '6.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '1290.00', '1800.00', '1950.00', '0.00', '0.00', '843.00', '3.00', '23490.00', '', '', '', '2200.00', '2200.00', '-1133.00', '3344.00', '1100.00', '1.00', '50.00', '4000.00', '1000.00', '21.70', '4340.00', '2500.00', '2500.00', '30330.00', '', '4400.00', '', '6840.00', '3200.00', '52000', '', '', '', NULL, NULL),
(49, 'GSYNC0772022-09', '2022-09-01', 'GSYNC077', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'AB', '', '', '1.00', '0.00', '22.00', '0.00', '7.00', '2.00', '0.00', '1.00', '23200.00', '11600.00', '11600.00', '11600.00', '1800.00', '1950.00', '0.00', '0.00', '1933.33', '', '56200.00', '0.00', '0.00', '', '2126.67', '2126.67', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '', '56200.00', '', '', '', '', '8003.33', '64203.33', '2126.67', '2126.67', '0.00', NULL, NULL),
(50, 'GSYNC0812022-09', '2022-09-01', 'GSYNC081', 'SD', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'PH', 'AB', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '22.00', '0.00', '7.00', '2.00', '0.00', '1.00', '14117.60', '7058.80', '7058.80', '7058.80', '1800.00', '1950.00', '0.00', '0.00', '1176.47', '', '33494.00', '0.00', '0.00', '', '2126.67', '2126.67', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '', '37747.33', '', '', '', '', '3750.00', '41497.33', '0.00', '0.00', '0.00', NULL, NULL),
(51, 'GSYNC0982022-09', '2022-09-01', 'GSYNC098', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-HD', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '22.50', '1.00', '7.00', '1.00', '0.00', '0.50', '14166.80', '7083.40', '7083.40', '7083.40', '1800.00', '1950.00', '0.00', '0.00', '1180.57', '', '33617.00', '0.00', '100.00', '', '2200.00', '2200.00', '', '0.00', '', '0.00', '0.00', '0.00', '0.00', '69.30', '13860.00', '1875.00', '0.00', '49252.00', '', '', '', '13860.00', '8250.00', '57502.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(52, 'GSYNC1052022-09', '2022-09-01', 'GSYNC105', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'AB', 'AB', '', '', '2.00', '0.00', '21.00', '0.00', '7.00', '1.00', '0.00', '2.00', '21600.00', '10800.00', '10800.00', '10800.00', '1800.00', '1950.00', '0.00', '0.00', '1800.00', '', '52200.00', '0.00', '0.00', '', '2053.33', '2053.33', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '52200.00', '', '', '', '', '7856.67', '60056.67', '2053.33', '2053.33', '0.00', NULL, NULL),
(53, 'GSYNC1112022-09', '2022-09-01', 'GSYNC111', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'LATE', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'SD', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '23.00', '0.00', '7.00', '2.00', '0.00', '0.00', '50000.00', '25000.00', '25000.00', '25000.00', '1800.00', '1950.00', '0.00', '0.00', '4166.67', '', '123200.00', '5000.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '', '', '0.00', '0.00', '479.70', '47970.00', '0.00', '0.00', '170570.00', '', '', '', '47970.00', '8750.00', '179320.00', '0.00', '0.00', '0.00', NULL, NULL),
(54, 'GSYNC1162022-09', '2022-09-01', 'GSYNC116', 'SD', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'AB', 'WFO-P', 'WFO-P', 'LATE', 'W/O', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-HD', 'WFO-P', 'WFO-P', 'PH', 'WFO-HD', 'WFO-P', 'W/O', 'LATE', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '20.00', '4.00', '7.00', '2.00', '0.00', '1.50', '11400.00', '5700.00', '1900.00', '0.00', '1596.00', '1729.00', '142.50', '617.50', '666.67', '', '17261.50', '0.00', '0.00', '', '2016.67', '2016.67', '', '0.00', '', '5.00', '', '1500.00', '0.00', '', '0.00', '0.00', '0.00', '18761.50', '', '', '', '1500.00', '8118.33', '26879.83', '2016.67', '2016.67', '0.00', NULL, NULL),
(55, 'GSYNC1212022-09', '2022-09-01', 'GSYNC121', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'SD', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'AB', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'LATE', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '22.00', '0.00', '7.00', '2.00', '0.00', '1.00', '12000.00', '6000.00', '6000.00', '4887.00', '1800.00', '1950.00', '0.00', '0.00', '962.90', '', '27087.00', '0.00', '0.00', '', '2126.67', '2126.67', '', '0.00', '', '9.00', '', '2700.00', '0.00', '', '0.00', '1250.00', '0.00', '31037.00', '', '', '', '2700.00', '8003.33', '39040.33', '2126.67', '2126.67', '0.00', NULL, NULL),
(56, 'GSYNC1292022-09', '2022-09-01', 'GSYNC129', 'LATE', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'AB', 'WFO-P', 'W/O', 'WFO-HD', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '20.50', '3.00', '7.00', '1.00', '0.00', '1.50', '11600.00', '5800.00', '5800.00', '1552.47', '1800.00', '1950.00', '0.00', '0.00', '853.53', '', '22952.47', '0.00', '800.00', '', '2053.33', '2053.33', '', '0.00', '', '6.00', '', '1800.00', '0.00', '69.30', '20790.00', '1250.00', '0.00', '45992.47', '', '', '', '22590.00', '8656.67', '54649.13', '2053.33', '2053.33', '0.00', NULL, NULL),
(57, 'GSYNC1362022-09', '2022-09-01', 'GSYNC136', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'SD', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '21.50', '1.00', '7.00', '2.00', '0.00', '1.50', '12000.00', '6000.00', '5709.00', '0.00', '1800.00', '1950.00', '0.00', '0.00', '790.30', '', '21909.00', '0.00', '200.00', '', '2126.67', '2126.67', '', '0.00', '', '6.00', '', '1800.00', '0.00', '', '0.00', '625.00', '0.00', '24134.00', '', '', '', '1800.00', '8203.33', '32337.33', '2126.67', '2126.67', '0.00', NULL, NULL),
(58, 'GSYNC1372022-09', '2022-09-01', 'GSYNC137', 'WFO-HD', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '21.50', '1.00', '7.00', '0.00', '0.00', '1.50', '12000.00', '6000.00', '6000.00', '3503.00', '1800.00', '1950.00', '0.00', '0.00', '916.77', '', '25703.00', '0.00', '0.00', '', '2126.67', '2126.67', '', '0.00', '', '4.00', '', '0.00', '0.00', '', '0.00', '1250.00', '0.00', '26953.00', '', '', '', '0.00', '8003.33', '34956.33', '2126.67', '2126.67', '0.00', NULL, NULL),
(59, 'GSYNC1382022-09', '2022-09-01', 'GSYNC138', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'LATE', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '23.00', '0.00', '7.00', '1.00', '0.00', '0.00', '12139.20', '6069.60', '6069.60', '6069.60', '1800.00', '1950.00', '0.00', '0.00', '1011.60', '', '28548.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '28548.00', '', '', '', '', '8150.00', '36698.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(60, 'GSYNC1402022-09', '2022-09-01', 'GSYNC140', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '23.00', '0.00', '7.00', '0.00', '0.00', '0.00', '12607.20', '6303.60', '6303.60', '6303.60', '1800.00', '1950.00', '0.00', '0.00', '1050.60', '', '29718.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '26718.00', '', '', '', '', '11150.00', '37868.00', '2200.00', '2200.00', '3000.00', NULL, NULL),
(61, 'GSYNC1442022-09', '2022-09-01', 'GSYNC144', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'WFO-HD', 'LATE', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '21.00', '2.00', '7.00', '1.00', '0.00', '1.50', '15733.33', '7866.67', '7866.67', '7866.67', '1800.00', '1950.00', '0.00', '0.00', '1333.33', '', '37533.33', '0.00', '0.00', '', '2090.00', '2090.00', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '31233.33', '', '', '', '', '14230.00', '45463.33', '2090.00', '2090.00', '6300.00', NULL, NULL),
(62, 'GSYNC1462022-09', '2022-09-01', 'GSYNC146', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '23.00', '0.00', '7.00', '0.00', '0.00', '0.00', '12000.00', '6000.00', '6000.00', '5300.00', '1800.00', '1950.00', '0.00', '0.00', '976.67', '', '27500.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '1.00', '', '0.00', '0.00', '', '0.00', '1875.00', '0.00', '29375.00', '', '', '', '0.00', '8150.00', '37525.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(63, 'GSYNC1492022-09', '2022-09-01', 'GSYNC149', 'WFO-P', 'SD', 'W/O', 'W/O', 'AB', 'AB', 'AB', 'AB', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '4.00', '0.00', '19.00', '0.00', '7.00', '0.00', '0.00', '1.50', '11000.00', '5500.00', '5500.00', '5500.00', '1800.00', '1950.00', '0.00', '0.00', '1000.00', '', '25700.00', '0.00', '0.00', '', '1723.33', '1723.33', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '25700.00', '', '', '', '', '7196.67', '32896.67', '1723.33', '1723.33', '0.00', NULL, NULL),
(64, 'GSYNC1522022-09', '2022-09-01', 'GSYNC152', 'WFO-P', 'SD', 'W/O', 'W/O', 'AB', 'AB', 'AB', 'AB', 'AB', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '5.00', '0.00', '18.00', '0.00', '7.00', '0.00', '0.00', '2.50', '14666.67', '7333.33', '7333.33', '7333.33', '1800.00', '1950.00', '0.00', '0.00', '1333.33', '', '34866.67', '0.00', '0.00', '', '1650.00', '1650.00', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '34866.67', '', '', '', '', '7050.00', '41916.67', '1650.00', '1650.00', '0.00', NULL, NULL),
(65, 'GSYNC1572022-09', '2022-09-01', 'GSYNC157', 'LATE', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'LATE', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'AB', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '21.50', '1.00', '7.00', '2.00', '0.00', '1.00', '11800.00', '2950.00', '0.00', '0.00', '1416.00', '1534.00', '110.63', '479.38', '500.00', '', '13223.38', '0.00', '0.00', '', '2090.00', '2090.00', '', '867.58', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '14090.95', '', '', '', '', '7720.00', '21810.96', '2090.00', '2090.00', '0.00', NULL, NULL),
(66, 'GSYNC1592022-09', '2022-09-01', 'GSYNC159', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'AB', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '2.00', '0.00', '21.00', '0.00', '7.00', '1.00', '0.00', '1.00', '11600.00', '5800.00', '5800.00', '2706.67', '1800.00', '1950.00', '0.00', '0.00', '893.33', '', '24106.67', '0.00', '0.00', '', '1980.00', '1980.00', '', '0.00', '', '1.00', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '24106.67', '', '', '', '0.00', '7710.00', '31816.67', '1980.00', '1980.00', '0.00', NULL, NULL),
(67, 'GSYNC1612022-09', '2022-09-01', 'GSYNC161', 'WFO-P', 'BL', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-HD', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '22.50', '1.00', '7.00', '0.00', '0.00', '0.50', '12000.00', '6000.00', '3000.00', '0.00', '1800.00', '1950.00', '0.00', '0.00', '700.00', '', '19200.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '2.00', '', '0.00', '0.00', '', '0.00', '1250.00', '0.00', '20450.00', '', '', '', '0.00', '8150.00', '28600.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(68, 'GSYNC1662022-09', '2022-09-01', 'GSYNC166', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '0.00', '0.00', '23.00', '0.00', '7.00', '0.00', '0.00', '0.00', '12000.00', '6000.00', '6000.00', '1000.00', '1800.00', '1950.00', '0.00', '0.00', '833.33', '', '23200.00', '0.00', '100.00', '', '2200.00', '2200.00', '', '0.00', '', '2.00', '', '0.00', '0.00', '', '0.00', '1250.00', '0.00', '24350.00', '', '', '', '0.00', '8250.00', '32600.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(69, 'GSYNC1672022-09', '2022-09-01', 'GSYNC167', 'WFH-P', 'WFH-P', 'W/O', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'W/O', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'PH', 'WFH-P', 'WFH-P', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', '', '', '0.00', '0.00', '23.00', '0.00', '7.00', '0.00', '0.00', '0.00', '18333.60', '9166.80', '9166.80', '9166.80', '1800.00', '1950.00', '0.00', '0.00', '1527.80', '', '44034.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '44034.00', '', '', '', '', '8150.00', '52184.00', '2200.00', '2200.00', '0.00', NULL, NULL),
(70, 'GSYNC1682022-09', '2022-09-01', 'GSYNC168', 'WFO-HD', 'WFO-P', 'W/O', 'W/O', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', '', '', '1.00', '0.00', '21.00', '2.00', '7.00', '0.00', '0.00', '0.00', '23072.00', '11536.00', '11536.00', '11536.00', '1800.00', '1950.00', '0.00', '0.00', '2060.00', '', '55880.00', '0.00', '0.00', '', '2053.33', '2053.33', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '55880.00', '', '', '', '', '7856.67', '63736.67', '2053.33', '2053.33', '0.00', NULL, NULL),
(71, 'GSYNC1692022-09', '2022-09-01', 'GSYNC169', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'PH', 'LATE', 'WFO-P', 'W/O', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'SD', '', '', '0.00', '0.00', '15.00', '0.00', '7.00', '2.00', '0.00', '0.00', '7600.00', '3800.00', '3800.00', '3800.00', '1800.00', '1950.00', '0.00', '0.00', '1000.00', '', '17200.00', '0.00', '0.00', '', '1393.33', '1393.33', '', '0.00', '', '', '', '0.00', '0.00', '', '0.00', '0.00', '0.00', '18519.00', '', '', '', '', '5144.33', '23736.67', '0.00', '1393.33', '0.00', NULL, NULL),
(244, 'GSync0012022-10', '2022-10-01', 'GSync001', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'UPL', 'WFO-P', 'WFO-P', 'WFO-P', 'UPL', 'W/O', 'WFO-P', 'WFO-P', 'UPL', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'PH', 'SD', 'AB', 'WFO-P', 'W/O', 'W/O', 'AB', '0.25', '3.00', '3.00', '16.00', '0.00', '9.00', '0.00', '0.00', '1.00', '10064.52', '5032.26', '5032.26', '1346.97', '1800.00', '1950.00', '0.00', '0.00', '826.00', '', '19676.00', '0.00', '500.00', '', '1774.19', '1774.19', '', '0.00', '0.00', '5.00', '', '1500.00', '0.00', '19.60', '5880.00', '625.00', '', '88093.00', '', '', '', '68292.00', '7798.39', '95891.39', '1774.19', '1774.19', '0.00', '101.52', '60912.00'),
(246, 'GSYNC0152022-10', '2022-10-01', 'GSYNC015', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'UPL', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '5.50', '0.00', '1.00', '21.00', '0.00', '9.00', '0.00', '0.00', '1.00', '14166.80', '7083.40', '7083.40', '7083.40', '1800.00', '1950.00', '0.00', '0.00', '1142.48', '3.00', '33617.00', '0.00', '0.00', '0.00', '2129.03', '2129.03', '', '0.00', '0.00', '0.00', '0.00', '0.00', '', '20.28', '4056.00', '1875.00', '0.00', '71984.00', '', '', '', '36492.00', '8008.06', '79992.06', '2129.03', '2129.03', '', '81.09', '32436.00'),
(247, 'GSYNC0252022-10', '2022-10-01', 'GSYNC025', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'W/O', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '4.00', '2.00', '0.00', '19.00', '0.00', '9.00', '1.00', '0.00', '2.00', '12000.00', '3000.00', '0.00', '0.00', '1440.00', '1560.00', '112.50', '487.50', '483.87', '3.00', '13447.50', '0.00', '0.00', '0.00', '0.00', '2058.06', '', '0.00', '0.00', '0.00', '', '0.00', '', '', '0.00', '0.00', '0.00', '13447.50', '', '', '', '0.00', '5658.06', '19105.56', '0.00', '2058.06', '', '', '0.00'),
(248, 'GSYNC0582022-10', '2022-10-01', 'GSYNC058', 'W/O', 'W/O', 'WFO-P', 'SD', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', '1.00', '2.00', '0.00', '19.00', '1.00', '9.00', '0.00', '0.00', '2.50', '13333.20', '6666.60', '6666.60', '6666.60', '1800.00', '1950.00', '0.00', '0.00', '1075.26', '', '31533.00', '0.00', '0.00', '0.00', '2022.58', '2022.58', '', '0.00', '0.00', '0.00', '0.00', '0.00', '', '0.00', '0.00', '0.00', '0.00', '6533.00', '', '', '', '0.00', '32795.16', '39328.16', '2022.58', '2022.58', '25000.00', '', '0.00'),
(249, 'GSYNC0772022-10', '2022-10-01', 'GSYNC077', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFH-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'LATE', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '7.75', '0.00', '0.00', '22.00', '0.00', '9.00', '1.00', '0.00', '0.00', '23200.00', '11600.00', '11600.00', '11600.00', '1800.00', '1950.00', '0.00', '0.00', '1870.97', '', '56200.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '56200.00', '', '', '', '0.00', '8150.00', '64350.00', '2200.00', '2200.00', '', '', '0.00'),
(250, 'GSYNC0812022-10', '2022-10-01', 'GSYNC081', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'AB', 'AB', 'AB', 'AB', 'LATE', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'SD', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '4.50', '4.00', '0.00', '17.00', '0.00', '9.00', '1.00', '0.00', '4.00', '14117.60', '7058.80', '7058.80', '7058.80', '1800.00', '1950.00', '0.00', '0.00', '1138.52', '', '33494.00', '0.00', '0.00', '', '1916.13', '1916.13', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '37326.26', '', '', '', '0.00', '3750.00', '41076.26', '0.00', '0.00', '', '', '0.00'),
(251, 'GSYNC0982022-10', '2022-10-01', 'GSYNC098', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-HD', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '6.50', '0.00', '0.00', '20.00', '2.00', '9.00', '0.00', '0.00', '1.00', '14166.80', '7083.40', '7083.40', '7083.40', '1800.00', '1950.00', '0.00', '0.00', '1142.48', '', '33617.00', '0.00', '0.00', '0.00', '2129.03', '2129.03', '', '0.00', '0.00', '0.00', '0.00', '0.00', '', '19.61', '3922.00', '625.00', '0.00', '58468.00', '', '', '', '24226.00', '8008.06', '66476.06', '2129.03', '2129.03', '', '50.76', '20304.00'),
(252, 'GSYNC1052022-10', '2022-10-01', 'GSYNC105', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'LATE', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '7.50', '0.00', '0.00', '20.00', '0.00', '9.00', '2.00', '0.00', '0.00', '21600.00', '10800.00', '10800.00', '10800.00', '1800.00', '1950.00', '0.00', '0.00', '1741.94', '', '52200.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '4000.00', '', '', '0.00', '', '', '0.00', '0.00', '', '56200.00', '', '', '', '0.00', '8150.00', '64350.00', '2200.00', '2200.00', '', '', '0.00'),
(253, 'GSYNC1112022-10', '2022-10-01', 'GSYNC111', 'W/O', 'W/O', 'WFH-HD', 'AB', 'WFH-P', 'AB', 'LATE', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', '0.12', '3.00', '0.00', '16.00', '1.00', '9.00', '2.00', '0.00', '3.00', '49193.55', '24596.77', '24596.77', '24596.77', '1800.00', '1950.00', '0.00', '0.00', '4032.26', '', '121183.87', '5000.00', '0.00', '', '1951.61', '1951.61', '', '0.00', '0.00', '', '', '0.00', '', '209.21', '20921.00', '0.00', '', '167380.10', '', '', '', '47293.00', '8750.00', '176130.10', '0.00', '0.00', '', '131.86', '26372.00'),
(254, 'GSYNC1162022-10', '2022-10-01', 'GSYNC116', 'W/O', 'W/O', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'UPL', 'UPL', 'UPL', 'SD', 'WFO-HD', 'WFO-P', 'WFO-HD', 'LATE', 'W/O', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-HD', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.00', '0.00', '3.00', '14.00', '4.00', '8.00', '2.00', '0.00', '1.50', '10645.16', '5322.58', '1774.19', '0.00', '1490.32', '1614.52', '133.06', '576.61', '645.16', '', '16118.55', '0.00', '0.00', '1.00', '1845.16', '1845.16', '', '0.00', '0.00', '6.00', '', '1800.00', '', '', '0.00', '0.00', '', '17917.55', '', '', '', '1800.00', '7504.84', '25423.39', '1845.16', '1845.16', '', '', '0.00'),
(255, 'GSYNC1212022-10', '2022-10-01', 'GSYNC121', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'SD', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-HD', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.50', '1.00', '0.00', '20.00', '1.00', '9.00', '0.00', '0.00', '1.50', '12000.00', '6000.00', '6000.00', '4887.00', '1800.00', '1950.00', '0.00', '0.00', '931.84', '', '27087.00', '0.00', '0.00', '', '2093.55', '2093.55', '', '0.00', '0.00', '4.00', '', '0.00', '', '', '0.00', '0.00', '', '27087.00', '', '', '', '0.00', '7937.10', '35024.10', '2093.55', '2093.55', '', '', '0.00'),
(257, 'GSYNC1362022-10', '2022-10-01', 'GSYNC136', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'LATE', 'AB', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFH-P', 'AB', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.25', '2.00', '0.00', '17.00', '1.00', '9.00', '2.00', '0.00', '1.00', '11419.35', '5709.68', '5432.76', '0.00', '1800.00', '1950.00', '0.00', '0.00', '764.81', '', '20761.79', '0.00', '0.00', '', '2022.58', '2022.58', '', '0.00', '0.00', '7.00', '', '2100.00', '', '', '0.00', '625.00', '', '23486.79', '', '', '', '2100.00', '7795.16', '31281.95', '2022.58', '2022.58', '', '', '0.00'),
(258, 'GSYNC1372022-10', '2022-10-01', 'GSYNC137', 'W/O', 'W/O', 'AB', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-HD', 'WFO-P', 'AB', 'LATE', 'WFO-HD', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.00', '2.00', '0.00', '16.00', '2.00', '9.00', '2.00', '0.00', '2.50', '11806.45', '5903.23', '5903.23', '3446.50', '1800.00', '1950.00', '0.00', '0.00', '887.19', '', '25259.40', '0.00', '100.00', '', '1987.10', '1987.10', '', '0.00', '0.00', '3.00', '', '0.00', '', '20.28', '6084.00', '0.00', '', '49447.40', '', '', '', '24288.00', '7824.19', '57271.60', '1987.10', '1987.10', '', '30.34', '18204.00'),
(259, 'GSYNC1382022-10', '2022-10-01', 'GSYNC138', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-HD', 'WFO-P', 'WFO-P', 'UPL', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'LATE', 'W/O', 'W/O', 'WFH-P', 'PH', 'UPL', 'AB', 'AB', 'W/O', 'W/O', 'WFO-P', '0.38', '2.00', '2.00', '16.00', '1.00', '9.00', '1.00', '0.00', '2.50', '11356.03', '5678.01', '5678.01', '5678.01', '1800.00', '1950.00', '0.00', '0.00', '978.97', '', '26590.06', '0.00', '0.00', '', '1880.65', '1880.65', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '26590.06', '', '', '', '0.00', '7511.29', '34101.35', '1880.65', '1880.65', '', '', '0.00'),
(260, 'GSYNC1402022-10', '2022-10-01', 'GSYNC140', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'AB', 'AB', 'AB', 'AB', 'W/O', 'W/O', 'WFH-P', 'PH', 'LATE', 'LATE', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.25', '4.00', '0.00', '16.00', '0.00', '9.00', '2.00', '0.00', '3.50', '12403.86', '6201.93', '6201.93', '6201.93', '1800.00', '1950.00', '0.00', '0.00', '1016.71', '', '29209.65', '0.00', '0.00', '', '1916.13', '1916.13', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '26209.65', '', '', '', '0.00', '10582.26', '36791.90', '1916.13', '1916.13', '3000.00', '', '0.00'),
(261, 'GSYNC1442022-10', '2022-10-01', 'GSYNC144', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'LATE', '0.25', '1.00', '0.00', '20.00', '0.00', '9.00', '1.00', '0.00', '1.00', '16000.00', '8000.00', '8000.00', '8000.00', '1800.00', '1950.00', '0.00', '0.00', '1290.32', '', '38200.00', '0.00', '0.00', '', '2129.03', '2129.03', '', '636.65', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '38836.65', '', '', '', '0.00', '8008.06', '46844.71', '2129.03', '2129.03', '', '', '0.00'),
(262, 'GSYNC1462022-10', '2022-10-01', 'GSYNC146', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'AB', 'AB', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '3.00', '2.00', '0.00', '20.00', '0.00', '9.00', '0.00', '0.00', '2.00', '12000.00', '6000.00', '6000.00', '5300.00', '1800.00', '1950.00', '0.00', '0.00', '945.16', '', '27500.00', '0.00', '0.00', '', '2058.06', '2058.06', '', '0.00', '0.00', '2.00', '', '0.00', '', '', '0.00', '625.00', '', '28125.00', '', '', '', '0.00', '7866.13', '35991.13', '2058.06', '2058.06', '', '', '0.00'),
(263, 'GSYNC1492022-10', '2022-10-01', 'GSYNC149', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFH-P', 'WFH-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '1.25', '0.00', '0.00', '22.00', '0.00', '9.00', '0.00', '0.00', '0.00', '12000.00', '6000.00', '6000.00', '6000.00', '1800.00', '1950.00', '0.00', '0.00', '967.74', '', '28200.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '28200.00', '', '', '', '0.00', '8150.00', '36350.00', '2200.00', '2200.00', '', '', '0.00'),
(264, 'GSYNC1522022-10', '2022-10-01', 'GSYNC152', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '1.25', '0.00', '0.00', '22.00', '0.00', '9.00', '0.00', '0.00', '0.00', '16000.00', '8000.00', '8000.00', '8000.00', '1800.00', '1950.00', '0.00', '0.00', '1290.32', '', '38200.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '38200.00', '', '', '', '0.00', '8150.00', '46350.00', '2200.00', '2200.00', '', '', '0.00'),
(265, 'GSYNC1572022-10', '2022-10-01', 'GSYNC157', 'W/O', 'W/O', 'WFO-HD', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'LATE', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'AB', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.00', '1.00', '0.00', '18.00', '1.00', '9.00', '2.00', '0.00', '1.50', '12000.00', '3000.00', '0.00', '0.00', '1440.00', '1560.00', '112.50', '487.50', '483.87', '', '13447.50', '0.00', '0.00', '', '2093.55', '2093.55', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '13447.50', '', '', '', '0.00', '7787.10', '21234.60', '2093.55', '2093.55', '', '', '0.00'),
(266, 'GSYNC1612022-10', '2022-10-01', 'GSYNC161', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'AB', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '1.00', '1.00', '0.00', '21.00', '0.00', '9.00', '0.00', '0.00', '1.00', '12000.00', '6000.00', '3000.00', '0.00', '1800.00', '1950.00', '0.00', '0.00', '677.42', '', '19200.00', '0.00', '0.00', '', '2129.03', '2129.03', '', '0.00', '0.00', '5.00', '', '1500.00', '', '', '0.00', '1250.00', '', '21950.00', '', '', '', '1500.00', '8008.06', '29958.06', '2129.03', '2129.03', '', '', '0.00'),
(267, 'GSYNC1662022-10', '2022-10-01', 'GSYNC166', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '2.50', '0.00', '0.00', '22.00', '0.00', '9.00', '0.00', '0.00', '0.00', '12000.00', '6000.00', '6000.00', '1000.00', '1800.00', '1950.00', '0.00', '0.00', '806.45', '', '23200.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '0.00', '4.00', '', '0.00', '', '', '0.00', '1250.00', '', '24450.00', '', '', '', '0.00', '8150.00', '32600.00', '2200.00', '2200.00', '', '', '0.00'),
(268, 'GSYNC1672022-10', '2022-10-01', 'GSYNC167', 'W/O', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'LATE', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'W/O', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'WFH-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFH-P', 'WFH-P', 'WFH-P', 'W/O', 'W/O', 'WFH-P', '2.50', '0.00', '0.00', '21.00', '0.00', '9.00', '1.00', '0.00', '0.00', '18333.60', '9166.80', '9166.80', '9166.80', '1800.00', '1950.00', '0.00', '0.00', '1478.52', '', '44034.00', '0.00', '0.00', '', '2200.00', '2200.00', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '44034.00', '', '', '', '0.00', '8150.00', '52184.00', '2200.00', '2200.00', '', '', '0.00'),
(269, 'GSYNC1682022-10', '2022-10-01', 'GSYNC168', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'AB', 'WFH-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'SD', 'WFO-HD', 'UPL', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFH-HD', 'AB', 'AB', 'AB', 'AB', 'AB', '0.25', '6.00', '1.00', '15.00', '2.00', '7.00', '0.00', '0.00', '1.00', '19138.06', '9569.03', '9569.03', '9569.03', '1800.00', '1950.00', '0.00', '0.00', '1993.55', '', '46045.16', '0.00', '0.00', '1.00', '1632.26', '1632.26', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '46044.16', '', '', '', '0.00', '7014.52', '53059.68', '1632.26', '1632.26', '', '', '0.00'),
(270, 'GSYNC1692022-10', '2022-10-01', 'GSYNC169', 'W/O', 'W/O', 'WFO-P', 'LATE', 'WFO-HD', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'LATE', 'LATE', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.00', '0.00', '0.00', '18.00', '1.00', '9.00', '3.00', '1.00', '0.00', '11612.90', '5806.45', '5806.45', '5806.45', '1800.00', '1950.00', '0.00', '0.00', '967.74', '', '27232.26', '0.00', '0.00', '0.00', '2129.03', '2129.03', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '29361.29', '', '', '', '0.00', '5879.03', '35240.32', '0.00', '2129.03', '', '', '0.00'),
(271, 'GSYNC1712022-10', '2022-10-01', 'GSYNC171', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFH-P', 'PH', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'WFO-P', '0.00', '0.00', '0.00', '16.00', '0.00', '6.00', '0.00', '0.00', '0.00', '11828.05', '5914.03', '5914.03', '5914.03', '1800.00', '1950.00', '0.00', '0.00', '1344.10', '', '27770.13', '0.00', '0.00', '', '1561.29', '1561.29', '', '0.00', '0.00', '', '', '0.00', '', '', '0.00', '0.00', '', '27770.13', '', '', '', '0.00', '6872.58', '34642.71', '1561.29', '1561.29', '', '', '0.00'),
(273, 'GSYNC1292022-10', '2022-10-01', 'GSYNC129', 'W/O', 'W/O', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'WFO-P', 'W/O', 'WFO-P', 'UPL', 'WFO-P', 'WFO-P', 'WFO-P', 'UPL', 'W/O', 'WFO-P', 'WFO-P', 'UPL', 'WFO-P', 'WFO-P', 'W/O', 'W/O', 'AB', 'PH', 'SD', 'AB', 'WFO-P', 'W/O', 'W/O', 'AB', '0.25', '3.00', '3.00', '16.00', '0.00', '9.00', '0.00', '0.00', '1.00', '10064.52', '5032.26', '5032.26', '1346.97', '1800.00', '1950.00', '0.00', '0.00', '826.00', '', '19676.00', '0.00', '500.00', '', '1774.19', '1774.19', '', '0.00', '0.00', '5.00', '', '1500.00', '', '19.60', '5880.00', '625.00', '', '27181.00', '', '', '', '7380.00', '7798.39', '34979.39', '1774.19', '1774.19', '', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_type` int NOT NULL DEFAULT '3',
  `user_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `user_type`, `user_status`) VALUES
(1, 'admin', '$2y$10$mqA/Q2zckikdSty6Fvqh5eyE9V0yzHVZnAYNurwhhAd30jrAIN9yO', '2022-02-24 08:37:57', 1, 1),
(2, 'finance', '$2y$10$dIx1ALQpWjbl57HPmHlOE.84Bm3jfxmKZ.dSiX30a3QldnRARzqiu', '2022-06-23 14:19:44', 2, 1),
(3, 'hr', '$2y$10$JCEwTCu0fHb6amWaUJMdF.wkP6NMUNEu27q4IG11zyqScj0LVEGxi', '2022-06-23 14:20:25', 2, 1),
(4, 'GSync001', '$2y$10$IkFcnneZvckFaqIQrJ6XDuZfT5r55FyjF25ghyhqS2mogm6bTb2JS', '2022-06-23 14:20:25', 3, 1),
(5, 'TEST', '$2y$10$gF/MWIY.GSckGfGy.b.tE.CbMx7OKtL4R/HUYbpbV2X5cHlaHPmVe', '2022-08-10 22:10:25', 3, 1),
(6, 'TEST1', '$2y$10$iwUmrBNqMbRIEHA46jm4T.3kN6BJ.KrdctmLTQ8mj94Py8k7ewli6', '2022-08-13 13:04:32', 3, 1),
(7, 'GSYNC015', '$2y$10$gEPrNrkwJlQWDH0lc.ojOuFPBrG343yHqcJTSofcQjLyGyJdTrvN6', '2022-08-13 13:41:02', 3, 1),
(12, 'GSYNC058', '$2y$10$fdmwVrAu/hquo5bOygN7peLBwytnQ/fn/DgiLS0XvB0Iw8dtSxGle', '2022-08-13 13:54:46', 3, 1),
(13, 'GSYNC077', '$2y$10$qrrmKHUuVSbgaSqUcBWbuOCoK9W05zS96WRMHFeWzeItAUwnCEXC2', '2022-08-13 15:12:32', 3, 1),
(14, 'GSYNC081', '$2y$10$kGJsn/FT8.sAMgHRaj5j4uvetwNf8F5WqgG.lI7lkXlh6xXbldbte', '2022-08-13 15:18:21', 3, 1),
(15, 'GSYNC098', '$2y$10$Ux7GCAGbKT0G40SSQ1PexOTdon1RZEiwsNifV1hjD.wPujMHPMizK', '2022-08-13 15:21:49', 3, 1),
(16, 'GSYNC105', '$2y$10$1MG/VOB/LQiqK5lIYNwxFe19WqkujbhZ3w3rMRMlMaETX2ZNgBDRm', '2022-08-13 15:27:34', 3, 1),
(17, 'GSYNC106', '$2y$10$uzDtyXDxucWxDrlvfcIAze4PPJLDMe46heksWk1p2ipNI.HXhCCoe', '2022-08-13 16:36:35', 3, 0),
(18, 'GSYNC111', '$2y$10$hrDOGxQ6RTwWQXamrG0ZP.YKbGqHoM99WxichL0QtRyQ6cSbOrnzq', '2022-08-13 16:40:59', 3, 1),
(19, 'GSYNC116', '$2y$10$XFpvVaVwbbdNnDPx/eVuU.pRHjCLMqdrW9k2QQN7IMnelARxE5PbK', '2022-08-13 16:44:58', 3, 1),
(20, 'GSYNC121', '$2y$10$AnrO9zJT6nmUumHq3bb0UOoLl7ZMIjdvBQQX4HX99KknCYvM6pRJm', '2022-08-13 16:49:02', 3, 1),
(21, 'GSYNC129', '$2y$10$H16MK6Ma6SPzgDr/IBLeQ.USigmbjjrfNgC30k68cp47Xi1Ifupiy', '2022-08-13 16:52:04', 3, 1),
(22, 'GSYNC136', '$2y$10$0/oaH4GDohTvfbjEOoSE..C/fhgyuBTtqPtYP2w6dVy9PtqeSwSYu', '2022-08-13 16:54:48', 3, 1),
(23, 'GSYNC137', '$2y$10$eBBxxRHT.AdAoNrf3jfkSe.zR2Nue63Tk/9sPQIplJIlu65fgAPqG', '2022-08-13 16:58:30', 3, 1),
(24, 'GSYNC138', '$2y$10$GR8T.piedm1/LhaP0zLreuVS7wZYGVDG0mwCswHUkJ6.aHl670U6e', '2022-08-13 18:39:01', 3, 1),
(25, 'GSYNC143', '$2y$10$5fwQKOoOmhvM4r7OOstWT.HweIX.McJzxhmryrW8Gor7w9dZpeiuW', '2022-08-13 19:17:09', 3, 0),
(26, 'GSYNC144', '$2y$10$WUEEMDEagGWVXNITkcujZeGOcMR6DYGWiEq7neNP.s5k.n9yYY3QS', '2022-08-13 19:19:49', 3, 1),
(27, 'GSYNC146', '$2y$10$vDOGWad9V3oB9C8CVLsheOIkZpJqLFkOBGwfYzHvddKUpMgyVPsZC', '2022-08-13 19:23:17', 3, 1),
(28, 'GSYNC147', '$2y$10$Y7f.X6SA.CPSwD/8LyfZvuhZsW5Hc0Xuh.iEORYV2oKzt3jZed5rG', '2022-08-13 19:27:10', 3, 0),
(29, 'GSYNC149', '$2y$10$rcjQcJeyGGYwdphJ/eoPFezLEVgm1jbBT54mkX38EEvuDN6eOC40C', '2022-08-15 01:30:24', 3, 1),
(30, 'GSYNC150', '$2y$10$u1x2oWeWCSn/ETMR7kwSruORMJNyJUgWpSIBiq.NasH0CmT350R7q', '2022-08-15 01:40:08', 3, 0),
(31, 'GSYNC151', '$2y$10$PxgydNk71A.ubMrI4KNReeYuxzL1YsiKoRgElRLnyeCTWYW4ExQ46', '2022-08-15 01:42:29', 3, 0),
(32, 'GSYNC152', '$2y$10$8M9cGKJjUCIcGn4nZVhph.OJA34YavdrQZ23JGOEkHy3WHlJFaY8C', '2022-08-15 01:45:14', 3, 1),
(33, 'GSYNC157', '$2y$10$/GI0FuygmE2q8.qdu6AtFO9FiLASNzapr1j0PKsoaPMbedtLJ3oiK', '2022-08-15 01:49:34', 3, 1),
(34, 'GSYNC158', '$2y$10$heQaZ/xgyFnOlJJC9XHWKOUMHnGAXeKPEfn4O9oncuv/BnDSFrVtW', '2022-08-15 01:52:37', 3, 0),
(35, 'GSYNC159', '$2y$10$t2.hqYRXszpZNJlsE.5XGuyFkAC7Vatl6/FAFja3cJTwkloHeATf6', '2022-08-15 01:54:54', 3, 0),
(36, 'GSYNC160', '$2y$10$XY5kgrwnd1vQiXlcm7nhPOFNPKZyDtKOEpnqabnYJ25FKEht6NsFK', '2022-08-15 11:37:38', 3, 0),
(37, 'GSYNC161', '$2y$10$T/b9oMS2wjAp/NjO464XbeqMa1Aj78WAGalnLFHXa.6yvXM8yKtFq', '2022-08-15 11:39:41', 3, 1),
(38, 'GSYNC165', '$2y$10$EneMVy/q/oHQn3e4NOCpcuNmU6uXjgtlBeGvgepc1zeQ663MyxLzO', '2022-08-15 11:42:10', 3, 0),
(39, 'GSYNC166', '$2y$10$uLYSDIG.oq7c5efVNfzrp./3Y/K4R8w6ioZnaFXnImVx187j3K8pO', '2022-08-15 11:44:22', 3, 1),
(40, 'GSYNC167', '$2y$10$Pz1Z5QI.upB/PKLenslnreJW4HIRC3nqx.JkiMaBNT68cWae.gg/C', '2022-08-15 11:47:13', 3, 1),
(41, 'GSYNC168', '$2y$10$1Z9ieMu/j0HZHZpt4YlTzOIXKWZqQGmgAWUFlt0IzI7YxhSuGuCoO', '2022-09-08 18:59:54', 3, 1),
(42, 'GSYNC025', '$2y$10$JWxPPFTkV8tvmjSht66P8e4jxXZvVeVjCcz0AlU86dwRq357GEDpe', '2022-10-08 09:28:39', 3, 1),
(43, 'GSYNC140', '$2y$10$SjnwE5NUVKQYgV2FjI/VaeBj9YdMhZs/P3kE87MkSXKTE1mfhaj0.', '2022-10-08 10:04:24', 3, 1),
(44, 'GSYNC169', '$2y$10$p5RleYS9VnFiCYTY068vPuBtXPuvO3g5vQLkbaYyhLF6O6Da6vaFC', '2022-10-08 10:23:25', 3, 1),
(45, 'GSYNC171', '$2y$10$uUP9FHX.DEIOjiFe8dsxseq4Jr/pG/WF8jiIP8Jo0l9XgQbtcZHTi', '2022-11-10 20:44:42', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_employees`
--
ALTER TABLE `gs_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gs_emp_salary`
--
ALTER TABLE `gs_emp_salary`
  ADD PRIMARY KEY (`sal_id`),
  ADD UNIQUE KEY `emp_sal_id` (`emp_sal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_employees`
--
ALTER TABLE `gs_employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `gs_emp_salary`
--
ALTER TABLE `gs_emp_salary`
  MODIFY `sal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
