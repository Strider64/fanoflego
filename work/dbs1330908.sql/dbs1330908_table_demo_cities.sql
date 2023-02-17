
-- --------------------------------------------------------

--
-- Table structure for table `demo_cities`
--

CREATE TABLE `demo_cities` (
  `id` int(11) NOT NULL,
  `state_id` int(12) NOT NULL,
  `name` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo_cities`
--

INSERT INTO `demo_cities` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Lusaka'),
(2, 2, 'Lilongwe'),
(3, 3, 'Luanda'),
(4, 4, 'Gaborone'),
(5, 3, 'Livonia');
