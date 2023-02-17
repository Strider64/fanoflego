
-- --------------------------------------------------------

--
-- Table structure for table `hs_table`
--

CREATE TABLE `hs_table` (
  `id` int(3) NOT NULL,
  `player` varchar(40) DEFAULT NULL,
  `score` int(8) DEFAULT NULL,
  `played` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `correct` int(3) DEFAULT NULL,
  `totalQuestions` int(5) DEFAULT NULL,
  `wins` int(5) DEFAULT NULL,
  `day_of_year` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
