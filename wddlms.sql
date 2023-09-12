SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wddlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`id`, `password`) VALUES
('admin2001', 'amc2001');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `scheduled_by` varchar(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `subtitle` varchar(256) NOT NULL,
  `time` varchar(128) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `scheduled_by`, `title`, `subtitle`, `time`, `date`) VALUES
(2, 'Dilshard Ahamed', 'Webdesign Development', 'HTML - First Term Exam', '0900:1200', '2022-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `name`, `email`, `address`, `designation`, `password`) VALUES
('LEC001', 'Dilshard Ahamed', 'dilaha@bcas.ac', 'Colombo 6, Sri Lanka', 'Senior Professor', 'dilwdddil'),
('LSC002', 'Irfan Ibrahim', 'irfan@bcas.ac', 'Dehiwala, Sri Lanka', 'Head of Computer Science', 'qwerty123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `courses` varchar(256) NOT NULL,
  `id` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `email`, `address`, `courses`, `id`, `password`) VALUES
('Ahamed Careem', 'amcareem@gmail.com', 'Mount Lavinia', 'Web Design Development, SDLC, Security, MSCP', '0001', 'pizza20!'),
('Jeff Bezos', 'jeffbezos@amazon.com', 'Galle', 'Business Management, Financial Accounting, Management Accounting', '0002', 'Batman123'),
('Elon Musk', 'elontesla@gmail.com', 'Jaffna', 'Chemical Engineering, Mechanical Engineering, English', '0003',  'ironmantesla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
