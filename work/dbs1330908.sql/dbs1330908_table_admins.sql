
-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `security` varchar(60) NOT NULL DEFAULT 'newbie',
  `hashed_password` varchar(255) NOT NULL,
  `validation` varchar(255) DEFAULT NULL,
  `new_date` datetime NOT NULL DEFAULT '2021-01-24 00:00:00',
  `update_date` datetime NOT NULL DEFAULT '2021-01-24 00:00:00',
  `birthday` date NOT NULL DEFAULT '1970-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `phone`, `security`, `hashed_password`, `validation`, `new_date`, `update_date`, `birthday`) VALUES
(2, 'John', 'Pepp', 'jrpepp@pepster.com', 'Strider64', NULL, 'sysop', '$2y$10$iMhyg4Dnh2Ur9rrVsO7DVupCXqLBYEPyar/6Li2Hwesvx5WrehflK', NULL, '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1964-08-28'),
(38, 'John', 'Smith', 'pepster@pepster.com', 'Gimli', '', 'member', '$2y$10$mtGUJvYiUgljCxRxGleniObTCdGBm3Niq4rYk6iRSb5UYAVnI.KKm', 'validate', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1964-08-28'),
(39, 'Bob', 'Pepp', 'strider64@gmail.com', 'Boris', '', 'member', '$2y$10$Nk4lytiitw5yyLU0viLvwuEhSJFa2pqX8FJA6BsnPBdoOptgTHs6q', 'validate', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1970-01-01'),
(40, 'Freddy', 'Krueger', 'example@email.com', 'Gandalf', '', 'newbie', '$2y$10$eTrBEODfAayUrmLLxLNTHe7oIbz/xsHOSwclJurPC/qAaX2PjKi4m', 'T4NHGpmrOItZ1MK38dvokyUuW07bnAY6529cxSeLFj', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1970-01-01'),
(41, 'Robert', 'Pepp', 'strider64@gmail.com', 'Bilbo', '', 'member', '$2y$10$EbTDbLJoSbEgvTlSQnvc/.V.N1xMzKwrYI9bo8o2son5mvPTXQVfS', 'validate', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1970-01-01'),
(42, 'sasa', 'fdfd', 'siroq9988@gmail.com', 'siroq9988', '525-636-6525', 'newbie', '$2y$10$StLEg/PElCWhXXqovbn4Gevj.TUN1dEfWdkouersN6RtDi9BN9llq', 'cJpYqTx62BRMeNAdrsaLokD9341Zy5nSE78hKtf0VU', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1970-01-01'),
(43, 'Bob', 'Pepp', 'strider64@gmail.com', 'Bobby', '', 'member', '$2y$10$aUWEiRHGokg9aik0lQaFL.I7OjASzlGDat/D.kBWOYITt9CrCETRK', 'validate', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1964-08-28'),
(44, 'John', 'Pepp', 'strider64@gmail.com', 'Frodo', '', 'member', '$2y$10$2janZCYvnbRmy4EpuMSWPOYurNFqXYLkcR.yAMzONJWwBmMvgK.Yu', 'validate', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1970-01-01'),
(45, 'John', 'Pepp', 'pepster@pepster.com', 'Samwise', '', 'member', '$2y$10$NyRiEQL9WZ.oo6HOL9nZzel5g8UanhWHzTYVAEx4dkrUcLiJ7X3Au', 'validate', '2021-01-24 00:00:00', '2021-01-24 00:00:00', '1970-01-01');
