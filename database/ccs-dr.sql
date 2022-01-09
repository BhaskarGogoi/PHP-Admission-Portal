-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 03:08 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccs-dr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_firstname` varchar(50) NOT NULL,
  `a_lastname` varchar(50) NOT NULL,
  `a_username` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_firstname`, `a_lastname`, `a_username`, `a_email`, `a_password`) VALUES
(1, 'Bhaskarjyoti', 'Gogoi', 'bhaskar_gogoi', 'bgogoi.user@gmail.com', '$2y$10$dolpakijGZDlzC0vA41cte/U72IAe8LFafV9jyY.9q3e2dDtXQU1W'),
(2, 'Bibeka', 'Sarma', 'bsarma', 'bs@gmail.co', '$2y$10$q0HXsQER8syic8.3pY3ikuVBFCa22uOiZ.g4JZaYPTHDD.fkCDCOS');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_image`
--

CREATE TABLE `applicant_image` (
  `image_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(128) NOT NULL,
  `applicant_image_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_image`
--

INSERT INTO `applicant_image` (`image_id`, `applicant_id`, `application_id`, `applicant_image_status`) VALUES
(11, 19, 14, 1),
(12, 20, 15, 1),
(13, 21, 16, 1),
(14, 22, 17, 1),
(15, 10, 18, 1),
(16, 23, 19, 1),
(17, 24, 20, 1),
(20, 30, 23, 1),
(21, 1, 24, 1),
(22, 2, 25, 1),
(23, 3, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_marks`
--

CREATE TABLE `applicant_marks` (
  `applicant_marks_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `elective_1` int(4) NOT NULL,
  `elective_2` int(4) NOT NULL,
  `elective_3` int(4) NOT NULL,
  `elective_4` int(4) NOT NULL,
  `total_marks` int(3) NOT NULL,
  `aggregate_percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_marks`
--

INSERT INTO `applicant_marks` (`applicant_marks_id`, `applicant_id`, `application_id`, `elective_1`, `elective_2`, `elective_3`, `elective_4`, `total_marks`, `aggregate_percentage`) VALUES
(8, 19, 14, 57, 45, 77, 78, 257, 64.25),
(9, 20, 15, 78, 73, 76, 83, 310, 77.5),
(10, 21, 16, 56, 78, 59, 65, 258, 64.5),
(11, 22, 17, 56, 46, 59, 40, 201, 50.25),
(12, 10, 18, 78, 68, 74, 72, 292, 73),
(13, 23, 19, 89, 56, 26, 46, 217, 54.25),
(14, 24, 20, 96, 78, 89, 56, 319, 79.75),
(18, 30, 23, 78, 81, 85, 77, 321, 80.25),
(19, 1, 24, 88, 65, 78, 77, 308, 77),
(20, 2, 25, 56, 55, 86, 66, 263, 65.75),
(21, 3, 27, 56, 56, 35, 22, 169, 42.25);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile`
--

CREATE TABLE `applicant_profile` (
  `applicant_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_profile`
--

INSERT INTO `applicant_profile` (`applicant_id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(1, 'Bishal', 'Saikia', 'don', 'bis@gmail.com', '$2y$10$HLVIo5y74drRmyN.7i095eI8ozIJcAGINq1MXyg.4Crwmtm2QKi7u'),
(2, 'Abhilash', 'Gogoi', 'abhilash', 'abhi@gmail.com', '$2y$10$UTiIib4ezmKM3ziBAC5IQuzWeV/RmPWCPL4l1J54yJW3/jiU3ETF6'),
(3, 'Bhaskarjyoti', 'Gogoi', 'bgogoi', 'bgogoi.user@gmail.com', '$2y$10$zD/7iFGQICzEfqvi8uUVAOZg.9HHuZoJfqaExKvNUaY9/cdrFjaRe');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(128) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `course` varchar(10) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `fathers_name` varchar(128) NOT NULL,
  `mothers_name` varchar(128) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(100) NOT NULL,
  `caste` varchar(100) NOT NULL,
  `nationality` varchar(70) NOT NULL,
  `handicappe` varchar(5) NOT NULL,
  `ph_no` varchar(100) NOT NULL,
  `guardian_ph_no` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `city_village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pincode` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `applicant_id`, `course`, `first_name`, `last_name`, `fathers_name`, `mothers_name`, `gender`, `dob`, `religion`, `caste`, `nationality`, `handicappe`, `ph_no`, `guardian_ph_no`, `locality`, `city_village`, `district`, `state`, `pincode`) VALUES
(14, 19, 'DCA', 'Aman', 'Kumar', 'dfgdfg', 'dfggdf', 'Female', '0000-00-00', 'fgfgdf', 'General', 'dfgfdg', 'No', '9435576083', '9435008927', 'Pawai', 'Mumbai', 'sgsfg', 'Maharashtra', 785621),
(15, 20, 'DCA', 'Pankaj', 'Konwar', 'D Konwar', 'Marinalini Konwar', 'Male', '1997-05-25', 'Hindu', 'OBC', 'Indian', 'No', '9613459699', '9854124557', 'Jamuguri', 'Jamuguri', 'Golaghat', 'Assam', 785100),
(16, 21, 'PGDCA', 'Nikhil', 'Sharma', 'Nilesh Sharma', 'Malti Sharma', 'Male', '1983-07-12', 'Hindu', 'General', 'Indian', 'No', '9585584523', '4562354569', 'Pawai', 'Mumbai', 'Mumbai', 'Maharashtra', 400010),
(17, 22, 'DCA', 'Abinash ', 'Saikia', 'M Saikia', 'D Saikia', 'Male', '0000-00-00', 'Hindu', 'General', 'Indian', 'No', '9613459699', '9435008927', 'Bongaon', 'Bongaon', 'Golaghat', 'Assam', 785221),
(18, 10, 'BCA', 'Bhaskarjyoti', 'Gogoi', 'D K Gogoi', 'M Gogoi', 'Male', '1997-07-19', 'Hindu', 'OBC', 'Indian', 'No', '9435576083', '9435008927', 'Hamdoi Pathar', 'Golaghat', 'Golaghat', 'Assam', 785621),
(19, 23, 'PGDCA', 'John', 'Doe', 'Peter Doe', 'Julia Doe', 'Male', '1995-08-13', 'Christian', 'General', 'U.S', 'No', '9585584523', '6695923299', 'Whirpool Street', 'New York', 'New York', 'njdsvndj', 885615),
(20, 24, 'DCA', 'Rajesh', 'Bora', 'H Bora', 'D Bora', 'Male', '1996-08-23', 'Hindu', 'SC', 'Indian', 'No', '9435576083', '6695923299', 'Jamuguri', 'Jamuguri', 'Golaghat', 'Assam', 785660),
(23, 30, 'BCA', 'Bishal', 'Saikia', 'B Saikia', 'M Saikia', 'Male', '2018-10-03', 'Hindu', 'OBC', 'Indian', 'No', '9435576083', '9435008927', 'Jamuguri', 'Jamuguri', 'Golaghat', 'Assam', 785621),
(24, 1, 'BCA', 'Bishal', 'Saikia', 'M Saikai', 'Saikia Saikia', 'Male', '2018-10-22', 'Hindu', 'OBC', 'Indian', 'No', '9435576083', '9854124557', 'Jamuguri', 'Jamuguri', 'Golaghat', 'Assam', 785621),
(25, 2, 'BCA', 'Abhilash', 'Gogoi', 'aaa', 'bbb', 'Male', '2018-10-10', 'Hindu', 'OBC', 'Indian', 'No', '9435576083', '9435008927', 'Kacharihat', 'Kacharihat', 'Golaghat', 'Assam', 785621),
(26, 31, 'BCA', 'Diganta', 'Gogoi', 'jc', 'qfejkq', 'Male', '2018-11-17', 'sdaad', 'General', 'India', 'No', '7002072619', '07002072619', 'Golaghat', 'Golaghat', 'gOLAGHAT', 'Assam', 785621),
(27, 3, 'BCA', 'Bhaskarjyoti', 'Gogoi', 'jc', 'qfejkq', 'Male', '2018-11-29', 'wfwef', 'General', 'qewq', 'Yes', '07002072619', '09435576083', 'Golaghat', 'Golaghat', 'gOLAGHAT', 'Assam', 785621);

-- --------------------------------------------------------

--
-- Table structure for table `application_control`
--

CREATE TABLE `application_control` (
  `app_control_id` int(1) NOT NULL,
  `app_status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_control`
--

INSERT INTO `application_control` (`app_control_id`, `app_status`) VALUES
(1, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `application_status_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `application_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `percentage` int(3) NOT NULL,
  `application_status` varchar(15) NOT NULL,
  `submit_date` date NOT NULL,
  `verify_date` date NOT NULL,
  `rejected_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`application_status_id`, `applicant_id`, `application_id`, `firstname`, `lastname`, `percentage`, `application_status`, `submit_date`, `verify_date`, `rejected_reason`) VALUES
(3, 19, 64, 'Aman', 'Sahu', 41, 'Rejected', '2018-08-18', '2018-08-18', 'This is a test reason.'),
(4, 20, 15, 'Pankaj', 'Konwar', 78, 'Enrolled', '2018-08-18', '0000-00-00', '0'),
(5, 21, 16, 'Nikhil', 'Sharma', 65, 'Accepted', '2018-08-18', '2018-09-20', '0'),
(6, 22, 50, 'Abinash ', 'Saikia', 51, 'Rejected', '2018-08-19', '2018-08-19', 'Ene Reject Korilu'),
(7, 10, 18, 'Bhaskarjyoti', 'Gogoi', 73, 'Enrolled', '2018-08-19', '0000-00-00', '0'),
(8, 23, 19, 'John', 'Doe', 54, 'Submitted', '2018-08-19', '0000-00-00', '0'),
(9, 24, 20, 'Rajesh', 'Bora', 78, 'Short Listed', '2018-08-19', '2018-09-20', '0'),
(12, 30, 23, 'Bishal', 'Saikia', 80, 'Submitted', '2018-10-02', '0000-00-00', '0'),
(13, 2, 25, 'Abhilash', 'Gogoi', 66, 'Enrolled', '2018-10-03', '0000-00-00', '0'),
(14, 31, 26, 'Diganta', 'Gogoi', 0, 'Submitted', '2018-11-02', '0000-00-00', '0'),
(15, 3, 27, 'Bhaskarjyoti', 'Gogoi', 42, 'Submitted', '2018-12-23', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(128) NOT NULL,
  `blog_author` varchar(100) NOT NULL,
  `author_type` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `blog_content` text NOT NULL,
  `submit_date` varchar(11) NOT NULL,
  `cover_image_name` varchar(200) NOT NULL,
  `status` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_author`, `author_type`, `id`, `blog_content`, `submit_date`, `cover_image_name`, `status`) VALUES
(15, 'Stephen Hawking', 'Bibeka Sarma ', 'Student', 17, '<p>At the age of eleven, Stephen went to St. Albans School and then on to University College, Oxford (1952). He wanted to study mathematics but he pursued physics because it was not available at University College. After three years he was awarded a first class honours degree in natural science.</p><p>&nbsp;</p><p>In October 1962, Stephen arrived at the Department of Applied Mathematics and Theoretical Physics (DAMTP)&nbsp; at the University of Cambridge to do research in cosmology. After gaining his PhD (1965) with his thesis titled &#39;Properties of Expanding Universes&#39;, he became, first, a research fellow (1965) then Fellow for Distinction in Science (1969) at Gonville &amp; Caius college. In 1966 he won the Adams Prize for his essay &#39;Singularities and the Geometry of Space-time&#39;. Stephen moved to the Institute of Astronomy (1968), later moving back to DAMTP (1973), employed as a research assistant, and published his first academic book, The Large Scale Structure of Space-Time, with George Ellis. During the next few years, Stephen was elected a Fellow of the Royal Society (1974) and Sherman Fairchild Distinguished Scholar at the California Institute of Technology (1974). He became a Reader in Gravitational Physics at DAMTP (1975), progressing to Professor of Gravitational Physics (1977). He then held the position of Lucasian Professor of Mathematics (1979-2009).From 2009, Stephen was employed as the Dennis Stanton Avery and Sally Tsui Wong-Avery Director of Research at DAMTP.</p><p>&nbsp;</p><p>Professor Stephen Hawking worked on the basic laws which govern the universe. With Roger Penrose he showed that Einstein&#39;s general theory of relativity implied space and time would have a beginning in the Big Bang and an end in black holes (1970). One consequence of such a unification that he discovered was that black holes should not be completely black, but rather should emit &#39;Hawking&#39; radiation and eventually evaporate and disappear (1974). Towards the end of his life, Stephen was working with colleagues on a possible resolution to the black hole information paradox, where debate centres around the conservation of information.</p><p>&nbsp;</p><p>His many publications included The Large Scale Structure of Spacetime with G F R Ellis, General Relativity: An Einstein Centenary Survey, with W Israel, and 300 Years of Gravitation, with W Israel. Among the popular books Stephen Hawking published are his best seller A Brief History of Time, Black Holes and Baby Universes and Other Essays, The Universe in a Nutshell, The Grand Design and My Brief History.</p><p>&nbsp;</p><p>Professor Stephen Hawking received thirteen honorary degrees. He was awarded CBE (1982), Companion of Honour (1989) and the Presidential Medal of Freedom (2009). He was the recipient of many awards, medals and prizes, most notably the Fundamental Physics prize (2013), Copley Medal (2006) and the Wolf Foundation prize (1988). He was a Fellow of the Royal Society and a member of the US National Academy of Sciences and the Pontifical Academy of Sciences.</p><p>&nbsp;</p><p>In 1963 Stephen was diagnosed with ALS, a form of Motor Neurone Disease, shortly after his 21st birthday. In spite of being wheelchair-bound and dependent on a computerised voice system for communication Stephen continued to combine family life (he has three children and three grandchildren) with his research into theoretical physics, in addition to an extensive programme of travel and public lectures. Thanks to the Zero-G Corporation, he experienced weightlessness in 2007 and always hoped to make it into space one day.</p>', '29-09-2018', 'Stephen Hawking5bafabd11bdac7.20827472.jpg', 'Published'),
(16, '5 Ways Internet of Things Will Change Our Life', 'Bhaskarjyoti Gogoi', 'Admin', 1, '<p>The Information and Communication Technology development generates more and more things/objects that are becoming embedded with sensors and having the ability to communicate with other objects, that is transforming the physical world itself into an information and knowledge system.&nbsp;</p><p>Internet of Things (IoT) enables the things/objects in our environment to be active participants, i.e., they share information with other devices of the network. The things/objects are capable of recognizing events and changes in their surroundings and are reacting autonomously without human in interaction in an appropriate way.</p><p>According to Cisco, there were 13 billion Internet-connected devices by 2013 and it will be 50 by 2020. As we move into an increasingly connected world, devices will be enabled on every thing including:</p><p><strong>Health:</strong>&nbsp;People will wear devices that connect to the Internet for feedback on activities, health and fitness. The Internet of Things can transform the healthcare industry by helping doctors gain faster access to patients&rsquo; data. Wearable, Internet-connected sensor devices that track a patient&rsquo;s heart rate, pulse, or even blood pressure are increasingly affordable, compact and accurate<strong> </strong></p><p><strong>Homes:</strong>&nbsp;People will control nearly everything remotely, from how their residences are heated or cooled, to how often their gardens are watered. Homes will also have sensors that alert home owners to everything from electric short circuit to broken water pipes.</p><p><strong>Driving and traffic jams:&nbsp;</strong>Driving will get a lot safer. Traffic lights will be able to adjust to real-time traffic conditions such as when an emergency vehicle is approaching. Road sensors will make changes to the speed limit based on weather and accidents.</p><p><strong>Environment:</strong>&nbsp;Real-time readings from fields, forests, oceans, and cities detailing pollution levels, soil moisture, and resource extraction will allow for closer monitoring of potential problems.</p><p><strong>Goods and services:</strong>&nbsp;Factories and supply chains will have sensors and readers that precisely track materials to speed up and smooth their manufacture and distribution.</p><p>However, along with all these benefits arise concerns of security risks and breach of privacy. Smart meters improve energy usage by monitoring movements or presence of inhabitants in a house and shut down energy-consuming devices when no one is at home or in unoccupied rooms. However, if such records of our movements or absence in the house falls into the wrong hands, security could be compromised.</p><p>Having such privacy and security concerns about an upcoming technology is not new.&nbsp;If industries are able to consistently demonstrate the safe usage of IOT, it could really open up possibilities for a cleaner, better and productive life for all of us.</p>', '29-09-2018', '5 Ways Internet of Things Will Change Our Life5bafbff0119626.27323126.jpg', 'Published'),
(17, 'Testing an AmpliFi mesh point as a Wi-Fi extender', 'Pankaj Konwar ', 'Student', 20, '<p>When mesh router systems started appearing last year, I purchased a&nbsp;<a target="_blank" href="https://amplifi.com/">Ubiquiti AmpliFi</a>&nbsp;system for someone whose house was a worst case Wi-Fi scenario. The internet entered the home in the basement on the south side of the house, while the bedrooms are on the second floor in the north side.</p><p>I liked the AmpliFi line, sight unseen, because unlike most other mesh systems, it&nbsp;<strong>did not require you to register</strong>&nbsp;with Ubiquiti and it did not phone home with who knows&nbsp;<em>what</em>&nbsp;data about your network. Still, in October of last year, I griped that the AmpliFi mesh system&nbsp;<a href="http://computerworld.com/article/3126042/networking/what-the-ubiquiti-amplifi-mesh-router-is-missing.html">lacked remote control</a>. This is no longer true.&nbsp;</p><p>Last November, in &quot;<a href="http://computerworld.com/article/3144366/networking/getting-started-with-the-ubiquiti-amplifi-mesh-router.html">Getting started with the Ubiquiti AmpliFi mesh router</a>,&quot; I wrote that there were three AmpliFi models. This, too, is no longer true. The AmpliFi offerings have drastically changed.&nbsp;</p><p>The initial three models were all threesomes; a cube-shaped router and two candlestick-shaped mesh points (smart antennas).&nbsp;As&nbsp;<a href="https://arstechnica.com/gadgets/2016/07/spending-some-time-with-ubiquiti-labs-amplifi-home-wi-fi-mesh-system/">described by Ars Technica</a>&nbsp;last year, the models were the Standard ($200), LR ($300) and HD ($350).&nbsp;</p><p>Since then, Ubiquiti has discontinued the two cheaper threesomes (Standard and LR) and added the ability to buy just a router or just a mesh point.</p><p>What most intrigued me recently was a new feature of the candlestick mesh points &mdash;&nbsp;<a href="http://blog.amplifi.com/2017/04/25/ditch-the-wi-fi-extender-why-you-should-get-a-meshpoint-instead/">they can now extend&nbsp;<em>any&nbsp;</em>Wi-Fi network</a>. If you need just a&nbsp;<em>small</em>&nbsp;boost to your Wi-Fi range, it could be a great option.</p><p>A stand-alone mesh point paired with a non-Ubiquiti router still comes with some of the nice features of their threesome systems.</p><p><strong>Favorite features of AmpliFi mesh point</strong></p><p>One of my favorites is the 5 small blue LED lights on the mesh point itself. After initial configuration, these dots indicate the strength of the signal between the mesh point and the router. This makes moving the mesh point to improve the signal as easy as easy could be.</p><p>I also like that you can chose the frequency band that the mesh point uses to communicate with the router. If its fairly close to the router, you can use the faster 5 GHz band. If its farther away from the router, you can force it to use the longer range (but slower) 2.4 GHz band. Either way, the mesh point uses both frequency bands to communicate with your wireless devices.</p><p>And perhaps the biggest upside is that the mesh point appears to your devices with the same network name (SSID) as the network it is extending. My experience has been that switching SSIDs in different parts of a house is too much hassle for some people.</p><p>The mesh point sells for about $110. What follows are my initial experiences with it.&nbsp;</p><p><strong>Basic&nbsp;AmpliFi mesh point setup&nbsp;</strong></p><p>The basic setup procedure is to plug in the mesh point and run the AmpliFi app, telling it to &quot;Setup AmpliFi Standalone Mesh Point.&quot; The app should find the mesh point, show you the available Wi-Fi networks, then let you enter the password for the network you want to extend. Wait a minute or so, and that&#39;s that.</p><p>However, Ubiquiti documents only this initial setup. Anything else, and you&#39;re on your own. Even the most basic task of using the app to communicate with the mesh point, after setup, is not documented the&nbsp;<a href="https://amplifi.com/docs/AFi-P-HD_QSG.pdf">Quick Start Guide</a>, and there is no User Guide for a stand-alone mesh point.</p><p>The AmpliFi line is targeted at consumers, and industry-wide (not just Ubiquiti) vendors tend not to create useful documentation for consumers. Even if there is documentation initially, it is often abandoned and never updated.</p>', '02-10-2018', 'on opinionREVIEW Testing an AmpliFi mesh point as a Wi-Fi extender5bb3b650be60e3.50775658.jpg', 'Under Review'),
(18, 'Cisco introduces its first server built for AI and ML workloads', 'Bhaskarjyoti Gogoi ', 'Student', 10, '<p>Cisco has introduced its first Unified Compute System (UCS) server designed specifically to handle artificial intelligence (AI) and machine learning (ML) workloads. The Cisco UCS C480 ML is designed specifically for data scientists to perform AI and ML at every stage of the lifecycle.</p><p>It&rsquo;s not like Cisco whipped up all kinds of special sauce for this server; it&rsquo;s just a lot of very high-end components. The UCS C480 ML M5 rack server is a 4U device with the latest Intel Xeon processors and 8 Nvidia Tesla V100-32G GPUs with NVLink interconnects.</p><p>The top-of-the-line configuration features two Xeon processors, up to 128GB of DDR4 RAM, 24 SATA hard drives or SSDs, six NVMe SSD drives, and four x100G Virtual Interface Cards (VICs). The UCS C480 ML M5 is designed to work with Cisco&#39;s various servers and HyperFlex systems with GPUs.</p><p>Cisco says it is covering each stage of the AI and ML lifecycle with this server. That ranges from data collection and analysis near the edge to data preparation and training in the data center, to the real-time inference at the heart of AI. It&rsquo;s designed to let customers extract more intelligence from their data and use it to make better, faster decisions.</p><p>With its new DevNet AI Developer Center and DevNet Ecosystem Exchange, Cisco is also giving data scientists and developers the tools and resources to create a new generation of apps.</p><p><strong>Cisco UCS features&nbsp;</strong></p><p>There is actually quite a bit of software news around this announcement. The UCS server is designed to work with containerized apps and multicloud computing models for AI systems with data sets stored across multiple servers and services.</p><p>It&rsquo;s fully compatible with Cisco&rsquo;s AI solutions stack, which includes Cloudera&rsquo;s Data Science Workbench, which supports frameworks such as TensorFlow and PyTorch, Hortonworks&rsquo; Hadoop 3.1, containerized Apache Spark and Google TensorFlow analytic workloads, and MapR data pipelines.</p>', '03-10-2018', 'Cisco introduces its first server built for AI and ML workloads5bb4e75fce9394.18915126.jpg', 'Published'),
(19, 'gghgh', 'Bhaskarjyoti Gogoi ', 'Student', 10, '<p>ghfwefgrw</p>', '23-12-2018', 'gghgh5c1fc883ca52e8.42279949.jpg', 'Under Review');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_students`
--

CREATE TABLE `enrolled_students` (
  `es_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `roll_no` int(8) NOT NULL,
  `course` varchar(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `fathers_name` varchar(128) NOT NULL,
  `mothers_name` varchar(128) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` date NOT NULL,
  `religion` varchar(50) NOT NULL,
  `caste` varchar(10) NOT NULL,
  `nationality` varchar(128) NOT NULL,
  `ph_no` varchar(10) NOT NULL,
  `guardian_ph_no` varchar(10) NOT NULL,
  `locality` varchar(128) NOT NULL,
  `city_village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(128) NOT NULL,
  `pincode` int(8) NOT NULL,
  `enrolled_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_students`
--

INSERT INTO `enrolled_students` (`es_id`, `applicant_id`, `roll_no`, `course`, `firstname`, `lastname`, `fathers_name`, `mothers_name`, `gender`, `dob`, `religion`, `caste`, `nationality`, `ph_no`, `guardian_ph_no`, `locality`, `city_village`, `district`, `state`, `pincode`, `enrolled_year`) VALUES
(6, 20, 56, 'DCA', 'Pankaj', 'Konwar', 'D Konwar', 'Marinalini Konwar', 'Male', '1997-05-25', 'Hindu', 'OBC', 'Indian', '9613459699', '9854124557', 'Jamuguri', 'Jamuguri', 'Golaghat', 'Assam', 785100, 2018),
(7, 10, 1, 'BCA', 'Bhaskarjyoti', 'Gogoi', 'D K Gogoi', 'M Gogoi', 'Male', '1997-07-19', 'Hindu', 'OBC', 'Indian', '9435576083', '9435008927', 'Hamdoi Pathar', 'Golaghat', 'Golaghat', 'Assam', 785621, 2018),
(9, 2, 252, 'BCA', 'Abhilash', 'Gogoi', 'aaa', 'bbb', 'Male', '2018-10-10', 'Hindu', 'OBC', 'Indian', '9435576083', '9435008927', 'Kacharihat', 'Kacharihat', 'Golaghat', 'Assam', 785621, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `referral_code`
--

CREATE TABLE `referral_code` (
  `id` int(11) NOT NULL,
  `referral_code` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral_code`
--

INSERT INTO `referral_code` (`id`, `referral_code`, `status`) VALUES
(9, 930411, 'unused'),
(10, 2653360, 'unused'),
(11, 6497875, 'unused'),
(12, 9617881, 'unused'),
(13, 4819249, 'unused'),
(14, 6215675, 'unused'),
(15, 9220103, 'unused'),
(16, 5464925, 'unused'),
(17, 9764341, 'unused'),
(18, 2200889, 'unused');

-- --------------------------------------------------------

--
-- Table structure for table `result_bca`
--

CREATE TABLE `result_bca` (
  `result_id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `held_in` varchar(12) NOT NULL,
  `subject_1` varchar(100) NOT NULL,
  `subject_1_endSem` int(3) NOT NULL,
  `subject_1_inSem` int(3) NOT NULL,
  `subject_1_total` int(3) NOT NULL,
  `subject_2` varchar(100) NOT NULL,
  `subject_2_endSem` int(3) NOT NULL,
  `subject_2_inSem` int(3) NOT NULL,
  `subject_2_total` int(3) NOT NULL,
  `subject_3` varchar(100) NOT NULL,
  `subject_3_endSem` int(3) NOT NULL,
  `subject_3_inSem` int(3) NOT NULL,
  `subject_3_total` int(3) NOT NULL,
  `subject_4` varchar(100) NOT NULL,
  `subject_4_endSem` int(3) NOT NULL,
  `subject_4_inSem` int(3) NOT NULL,
  `subject_4_total` int(3) NOT NULL,
  `subject_5` varchar(100) NOT NULL,
  `subject_5_endSem` int(3) NOT NULL,
  `subject_5_inSem` int(3) NOT NULL,
  `subject_5_total` int(3) NOT NULL,
  `subject_6` varchar(100) NOT NULL,
  `subject_6_endSem` int(3) NOT NULL,
  `subject_6_inSem` int(3) NOT NULL,
  `subject_6_total` int(3) NOT NULL,
  `total_marks` int(3) NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_bca`
--

INSERT INTO `result_bca` (`result_id`, `roll_no`, `name`, `semester`, `held_in`, `subject_1`, `subject_1_endSem`, `subject_1_inSem`, `subject_1_total`, `subject_2`, `subject_2_endSem`, `subject_2_inSem`, `subject_2_total`, `subject_3`, `subject_3_endSem`, `subject_3_inSem`, `subject_3_total`, `subject_4`, `subject_4_endSem`, `subject_4_inSem`, `subject_4_total`, `subject_5`, `subject_5_endSem`, `subject_5_inSem`, `subject_5_total`, `subject_6`, `subject_6_endSem`, `subject_6_inSem`, `subject_6_total`, `total_marks`, `result`) VALUES
(1, 23, 'Bhaskarjyoti Gogoi', 'First', '2018-08-29', 'Computer Fundamentals', 22, 75, 97, 'Mathematics I', 55, 77, 132, 'Communicative English', 22, 22, 44, 'Digital Design', 22, 22, 44, 'Personality Development', 44, 24, 68, 'Laboratory', 42, 41, 83, 468, 'Pass'),
(2, 1, '', 'Fourth', '2018-09-04', 'Computer Fundamentals', 45, 12, 57, 'Mathematics I', 55, 12, 67, 'Communicative English', 55, 12, 67, 'Digital Design', 55, 12, 67, 'Personality Development', 55, 12, 67, 'Laboratory', 0, 0, 0, 325, 'Pass'),
(3, 2, '', 'Fourth', '2018-09-05', 'Numerical Analysis and Scientific Computing', 22, 22, 44, 'Database Management System', 22, 22, 44, 'Operating System', 22, 22, 44, 'System Software', 22, 22, 44, 'Laboratory', 22, 22, 44, 'Null', 0, 0, 0, 220, 'Pass'),
(5, 33, 'Abinash Saikia', 'Fifth', '2018-09-13', 'Data Communication and Computer Network', 44, 22, 66, 'Operation Research', 44, 22, 66, 'Software Engineering', 44, 22, 66, 'Minor Project', 44, 22, 66, 'Null', 0, 0, 0, 'Null', 0, 0, 0, 264, 'Pass'),
(7, 22, '', 'First', '2018-09-20', 'Computer Fundamentals', 55, 22, 77, 'Mathematics I', 55, 22, 77, 'Communicative English', 55, 22, 77, 'Digital Design', 55, 22, 77, 'Personality Development', 55, 22, 77, 'Laboratory', 55, 22, 77, 462, 'Pass'),
(8, 11, '', 'Second', '2018-09-12', 'Mathematics II', 66, 22, 88, 'Discrete Structure', 66, 22, 88, 'Data Structure', 66, 22, 88, 'Accounting and Financial Management', 66, 22, 88, 'Computer Architecture and Organization', 66, 22, 88, 'Laboratory', 66, 22, 88, 528, 'Pass'),
(10, 2322, 'Bhj', 'First', '2018-09-27', 'Computer Fundamentals', 55, 44, 99, 'Mathematics I', 55, 44, 99, 'Communicative English', 55, 44, 99, 'Digital Design', 55, 44, 99, 'Personality Development', 55, 44, 99, 'Laboratory', 55, 44, 99, 594, 'Pass'),
(11, 252, 'Abhilash Gogoi', 'First', '2017-10-11', 'Computer Fundamentals', 60, 22, 82, 'Mathematics I', 66, 22, 88, 'Communicative English', 66, 22, 88, 'Digital Design', 66, 22, 88, 'Personality Development', 66, 22, 88, 'Laboratory', 66, 22, 88, 522, 'Pass'),
(12, 23, 'Bhaskarjyoti Gogoi', 'Second', '2018-10-30', 'Mathematics II', 66, 20, 86, 'Discrete Structure', 67, 19, 86, 'Data Structure', 72, 17, 89, 'Accounting and Financial Management', 70, 20, 90, 'Computer Architecture and Organization', 55, 23, 78, 'Laboratory', 68, 22, 90, 519, 'Pass'),
(13, 23, 'Bhaskarjyoti Gogoi', 'Third', '2018-10-29', 'Mathematics III', 44, 19, 63, 'Theory of Computing', 45, 18, 63, 'Internet and Web Programming', 55, 17, 72, 'Computer Graphics', 66, 20, 86, 'Object Oriented Programming using JAVA', 70, 22, 92, 'Laboratory', 71, 21, 92, 468, 'Pass'),
(14, 23, 'Bhaskarjyoti Gogoi', 'Fourth', '2018-10-10', 'Numerical Analysis and Scientific Computing', 68, 23, 91, 'Database Management System', 69, 21, 90, 'Operating System', 70, 20, 90, 'System Software', 73, 23, 96, 'Laboratory', 60, 22, 82, 'Null', 0, 0, 0, 449, 'Pass'),
(15, 23, 'Bhaskarjyoti Gogoi', 'Fifth', '2018-10-16', 'Data Communication and Computer Network', 66, 20, 86, 'Operation Research', 67, 21, 88, 'Software Engineering', 74, 24, 98, 'Minor Project', 63, 23, 86, 'Null', 0, 0, 0, 'Null', 0, 0, 0, 358, 'Pass'),
(16, 23, 'Bhaskarjyoti Gogoi', 'Sixth', '2018-10-26', 'Major Project', 210, 40, 250, 'Null', 0, 0, 0, 'Null', 0, 0, 0, 'Null', 0, 0, 0, 'Null', 0, 0, 0, 'Null', 0, 0, 0, 250, 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `result_pgdca`
--

CREATE TABLE `result_pgdca` (
  `result_id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `held_in` varchar(12) NOT NULL,
  `subject_1` varchar(100) NOT NULL,
  `subject_1_endSem` int(3) NOT NULL,
  `subject_1_inSem` int(3) NOT NULL,
  `subject_1_total` int(3) NOT NULL,
  `subject_2` varchar(100) NOT NULL,
  `subject_2_endSem` int(3) NOT NULL,
  `subject_2_inSem` int(3) NOT NULL,
  `subject_2_total` int(3) NOT NULL,
  `subject_3` varchar(100) NOT NULL,
  `subject_3_endSem` int(3) NOT NULL,
  `subject_3_inSem` int(3) NOT NULL,
  `subject_3_total` int(3) NOT NULL,
  `subject_4` varchar(100) NOT NULL,
  `subject_4_endSem` int(3) NOT NULL,
  `subject_4_inSem` int(3) NOT NULL,
  `subject_4_total` int(3) NOT NULL,
  `subject_5` varchar(100) NOT NULL,
  `subject_5_endSem` int(3) NOT NULL,
  `subject_5_inSem` int(3) NOT NULL,
  `subject_5_total` int(3) NOT NULL,
  `subject_6` varchar(100) NOT NULL,
  `subject_6_endSem` int(3) NOT NULL,
  `subject_6_inSem` int(3) NOT NULL,
  `subject_6_total` int(3) NOT NULL,
  `total_marks` int(3) NOT NULL,
  `result` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_pgdca`
--

INSERT INTO `result_pgdca` (`result_id`, `roll_no`, `name`, `held_in`, `subject_1`, `subject_1_endSem`, `subject_1_inSem`, `subject_1_total`, `subject_2`, `subject_2_endSem`, `subject_2_inSem`, `subject_2_total`, `subject_3`, `subject_3_endSem`, `subject_3_inSem`, `subject_3_total`, `subject_4`, `subject_4_endSem`, `subject_4_inSem`, `subject_4_total`, `subject_5`, `subject_5_endSem`, `subject_5_inSem`, `subject_5_total`, `subject_6`, `subject_6_endSem`, `subject_6_inSem`, `subject_6_total`, `total_marks`, `result`) VALUES
(1, 11, '', '2018-09-05', 'Basic Information Technology', 44, 44, 88, 'Programming With C', 44, 44, 88, 'Internet Technology, E-Commerce', 44, 44, 88, 'Relational Database Management System, Using Oracle', 44, 44, 88, 'Data Communication And Computer Network', 44, 44, 88, 'Null', 0, 0, 0, 528, 'Pass'),
(2, 88, 'ghtgtr', '2018-08-29', 'Basic Information Technology', 55, 55, 110, 'Programming With C', 55, 55, 110, 'Internet Technology, E-Commerce', 55, 55, 110, 'Relational Database Management System, Using Oracle', 55, 55, 110, 'Data Communication And Computer Network', 55, 55, 110, 'Null', 0, 0, 0, 660, 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `semester_fees`
--

CREATE TABLE `semester_fees` (
  `transaction_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `student_name` varchar(128) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_date` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester_fees`
--

INSERT INTO `semester_fees` (`transaction_id`, `s_id`, `student_name`, `roll_no`, `semester`, `amount`, `payment_date`) VALUES
(10, 10, 'Bhaskarjyoti Gogoi', 1, 'Third Semester', 10000, '16-09-2018'),
(11, 10, 'Bhaskarjyoti Gogoi', 1, 'First Semester', 10000, '16-09-2018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(10, 'Bhaskarjyoti', 'Gogoi', 'bhaskar_gogoi', 'bgogoi.user@gmail.com', '$2y$10$woDGrHhxcz83lyQsEtBWK.6338/J3JgXfTjuZ4RxpaIi0gW.JOd5u'),
(15, 'Justin', 'Kujur', 'justin', 'justin@gmail.com', '$2y$10$Jw0sVTMzoQ32cEOt3xDe..ss/op2CrWhUUx3McBwj1pUJE70UK6DK'),
(16, 'Chandita', 'Kotoky', 'chandita', 'chandita@gmail.com', '$2y$10$Q4MahUUEgmCJnKdhHb5T5uBuP5v/IPf5DBWxOuDdr0kPygmOpIbRS'),
(17, 'Bibeka', 'Sarma', 'bibeka', 'bibeka@gmail.com', '$2y$10$7kMwetBZvkt0GvYGbjbVUuPma.jz1Dphj5WP8USsPCkbhR0ILnNfi'),
(19, 'Aman', 'Sahu', 'aman', 'aman@gmail.com', '$2y$10$ML0EndvarrZVKPJzU0Niy.AdGTGnWEwnCRNSZuINZcZNM5hVMUtbq'),
(20, 'Pankaj', 'Konwar', 'pankaj', 'pankaj2018@gmail.com', '$2y$10$xVg3.4iBXKvwZ7/ORDxxbeE387bJ6/HDGQxtZvMsUdoAe2Lfk7KGi'),
(21, 'Nikhil', 'Sharma', 'mumbiker_nikhil', 'nikkkhil@yahoo.com', '$2y$10$bVnzrobFbKoaOB3u/aJLJuOku2KzVe1zCiwDh8D1lPFnAstmFFKWm'),
(22, 'Abinash', 'Saikia', 'abinash_saikia2018', 'abSaikia@gmail.com', '$2y$10$YY/GiCC9X3LGK1.hDnMUweAVu0t0iSW6um7HmA39Aeg6KbKi4963W'),
(23, 'John', 'Doe', 'john_doe', 'jd@gmail.com', '$2y$10$q3cR29u6qOuCKrDhiIiKqO82IlUsue4PUjGu/qbtC7yP0Ys8p9uYi'),
(24, 'Rajesh', 'Bora', 'rbora', 'borarajesh@gmail.com', '$2y$10$POmpA3xPNbyB2dqwzmuluuk2szx8reGkqq1zwviKP03EZhSyz7ulq'),
(25, 'Mangalam', 'Singh', 'mangalam_singh', 'mangalam@gmail.com', '$2y$10$ZFkuOPA2.pXX8IlK6dVWcu5b/o7UM/n0p/xtXXPWZlZ/wDnrA.VH6'),
(27, 'Bibeka', 'Sarma', 'bsarma', 'bsarma@gmail.com', '$2y$10$fl5snPnt3PfJXkO8C38KB.kqlUQOtbsR97oBKrOTXpRnaFkVIRv5S'),
(30, 'Bishal', 'Saikia', 'bishal', 'bishal@gmail.com', '$2y$10$nlBl8iNbxxdGBkIvfR5VJ.wYLssnEpc3z5XhAlg0TKOG0lUimGlBO'),
(31, 'Diganta', 'Gogoi', 'diganta', 'dig@gmail.com', '$2y$10$zBd/nAYEolB2uVkt2IsHS./M8NtJ6mdJ0cpcIoXoNcexOkBmjw6Pq'),
(32, 'Bhaskarjyoti', 'Gogoi', 'fdgregrw', 'dfsdf@gmai.c', '$2y$10$OZFN7InDMBldnYQMPrRAZO4cUoJ7Z2NYDRBecl3VvRBNBBm/ciOuC'),
(33, 'wd', 'wewe', '656', 'wer@gm.com', '$2y$10$SKBfKBxIaKzoaxKsye39QuMl0vNO6g19nEhVKhi/QcGsWcs8GAAw.'),
(34, 'Shantanu', 'Sarma', 'ssarma', 'ssarma@gmail.com', '$2y$10$squjmHPkLFKB32enIoolV.tDuIjyvdJ.kftLv5qf9Loz6vOaf1KES');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `fees_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `semester` int(2) NOT NULL,
  `amount` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `applicant_image`
--
ALTER TABLE `applicant_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `s_id` (`applicant_id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `applicant_marks`
--
ALTER TABLE `applicant_marks`
  ADD PRIMARY KEY (`applicant_marks_id`),
  ADD KEY `s_id` (`applicant_id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `s_id` (`applicant_id`);

--
-- Indexes for table `application_control`
--
ALTER TABLE `application_control`
  ADD PRIMARY KEY (`app_control_id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`application_status_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `enrolled_students`
--
ALTER TABLE `enrolled_students`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `referral_code`
--
ALTER TABLE `referral_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_bca`
--
ALTER TABLE `result_bca`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `result_pgdca`
--
ALTER TABLE `result_pgdca`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `semester_fees`
--
ALTER TABLE `semester_fees`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`fees_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `applicant_image`
--
ALTER TABLE `applicant_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `applicant_marks`
--
ALTER TABLE `applicant_marks`
  MODIFY `applicant_marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `application_control`
--
ALTER TABLE `application_control`
  MODIFY `app_control_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `application_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `enrolled_students`
--
ALTER TABLE `enrolled_students`
  MODIFY `es_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `referral_code`
--
ALTER TABLE `referral_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `result_bca`
--
ALTER TABLE `result_bca`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `result_pgdca`
--
ALTER TABLE `result_pgdca`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester_fees`
--
ALTER TABLE `semester_fees`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `fees_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
