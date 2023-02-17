
-- --------------------------------------------------------

--
-- Table structure for table `trivia_questions`
--

CREATE TABLE `trivia_questions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `hidden` varchar(15) COLLATE latin1_german2_ci NOT NULL DEFAULT 'no',
  `question` text COLLATE latin1_german2_ci NOT NULL,
  `answer1` char(100) COLLATE latin1_german2_ci NOT NULL,
  `answer2` char(100) COLLATE latin1_german2_ci NOT NULL,
  `answer3` char(100) COLLATE latin1_german2_ci NOT NULL,
  `answer4` char(100) COLLATE latin1_german2_ci NOT NULL,
  `correct` int(1) NOT NULL,
  `category` varchar(60) COLLATE latin1_german2_ci NOT NULL,
  `play_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `day_of_week` int(3) NOT NULL DEFAULT '0',
  `day_of_year` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Dumping data for table `trivia_questions`
--

INSERT INTO `trivia_questions` (`id`, `user_id`, `hidden`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correct`, `category`, `play_date`, `day_of_week`, `day_of_year`) VALUES
(109, 1, 'no', 'In optics is a hole or an opening through which light travels. More specifically, the [blank] and focal length of an optical system determine the cone angle of a bundle of rays that come to a focus in the image plane. An optical system typically has many openings or structures that limit the ray bundles', 'Bokeh', 'Aperture', 'IBIS', 'Focal Length', 2, 'photography', '2022-02-13 22:56:53', 7, 0),
(110, 1, 'no', '[Blank] is the length of time when the film or digital sensor inside the camera is exposed to light, also when a camera\'s shutter is open when taking a photograph. The amount of light that reaches the film or image sensor is proportional to the [Blank].', 'Shutter Speed or Exposure Time', 'ISO', '', '', 1, 'photography', '2021-03-09 10:39:46', 1, 0),
(111, 1, 'no', 'In Digital Photography [blank] measures the sensitivity of the image sensor. The same principles apply as in film photography – the lower the number the less sensitive your camera is to light and the finer the grain.', 'IBIS', 'Shutter Speed or Exposure Time', 'ISO', '', 3, 'photography', '2021-02-26 20:51:57', 2, 0),
(112, 1, 'no', 'The [blank], which is also known as the [blank], is the ratio of the lens focal length to the diameter of the entrance pupil. In simple terms, [blank] is the number that your camera shows you when you change the size of the lens aperture.', 'ISO or Shutter Speed', 'Aperture or ISO', 'Shutter Speed or Aperture', 'f-stop or f-number', 4, 'photography', '2020-09-27 13:05:27', 3, 0),
(113, 1, 'no', '[blank] was a landscape photographer and environmentalist known for his black-and-white images of the American West. He helped found Group f/64, an association of photographers advocating \"pure\" photography which favored sharp focus and the use of the full tonal range of a photograph. ', 'Robert Capa', 'Ansel Adams', 'Steve McCurry', 'David Bailey', 2, 'photography', '2020-09-27 13:05:27', 4, 0),
(114, 1, 'no', '[Blank] was one of the earliest photographers in American history, best known for his scenes of the Civil War. He studied under inventor Samuel F. B. Morse, who pioneered the daguerreotype technique in America. [Blank] opened his own studio in New York in 1844, and photographed Andrew Jackson, John Quincy Adams, and Abraham Lincoln, among other public figures.', 'Robert Capa', 'Steve McCurry', 'Ansel Adams', 'Matthew Brady', 4, 'photography', '2020-09-27 13:05:27', 5, 0),
(115, 1, 'no', 'The [Blank] is a method of estimating correct daylight exposures without a light meter. ... As the rule is based on incident light, rather than reflected light as with most camera light meters, very bright or very dark subjects are compensated for.', 'Sunny 8 Rule', 'Sunny 16 Rule', 'Cloudy 11 Rule', 'Rule of 3rds', 2, 'photography', '2021-02-27 06:49:54', 6, 0),
(116, 1, 'no', 'An English transliteration of a Japanese word that means \"haze\" or \"blur.\" [Blank] refers to the out-of-focus areas in a photograph with limited depth of field, particularly around, but not limited to, the highlight areas. [Blank] appears as little circles in the unsharp areas. Depending upon the shape of the opening formed by the blades of the lens\'s aperture, the circles appear either more or less circular.', 'Bracketing', 'Chromatic Aberration', 'Color Depth', 'Bokeh', 4, 'photography', '2020-09-27 13:05:27', 7, 0),
(117, 1, 'no', 'A [Blank] camera is one that utilizes a mirror system to reflect the light (or latent image) coming through the lens to a visible screen. The image seen in the camera\'s viewfinder is identical to what strikes the camera\'s imaging sensor (or film plane). This system provides the most accurate way to frame and focus. The [Blank] system avoids the parallax problem that plagues most direct view cameras.', 'shutter', 'reflex', 'flux', 'flash', 2, 'photography', '2020-09-27 13:05:27', 1, 0),
(118, 1, 'no', 'The camera\'s ability to correct color cast or tint under different lighting conditions including daylight, indoor, fluorescent lighting, and electronic flash. Is known as? ', 'Color Calibration', 'White Balance', '', '', 2, 'photography', '2021-02-27 06:52:13', 2, 0),
(119, 1, 'no', '[Blank] is an American portrait photographer. She is best known for her engaging portraits—particularly of celebrities—which often feature subjects in intimate settings and poses. ', 'Cindy Sherman', 'Ruth Bernhard', 'Annie Leibovitz', 'Graciela Iturbide', 3, 'photography', '2020-09-27 13:05:27', 3, 0),
(120, 1, 'no', 'An [Blank] digitally replicates the field of view of the area captured by the camera lens. While once considered a poor replacement for optical viewfinders, newer [Blank]s containing a million-plus pixels and faster refresh times have become quite accurate, in many cases approaching the clarity levels of optical finders. An advantage of [Blank]s is their ability to display exposure data and grids on demand.', 'Electronic Viewfinder (EVF)', 'Rangefinder and Reflex Viewfinders (RRVF)', 'Spot Metering', 'RGB Color Space', 1, 'photography', '2020-09-27 13:05:27', 4, 0),
(121, 1, 'no', 'Adding to or subtracting from the \"correct\" exposure time indicated by the camera\'s light meter, which results in a final exposure that is either lighter or darker than the recommended [Blank] time. Most cameras allow for [Blank] in 1/2, 1/3, or full-stop increments. Note that the \"correct\" exposure is not necessarily the \"best\" exposure.', 'ISO', 'Focal Length', 'Exposure Compensation', 'Shutter Speed', 3, 'photography', '2020-09-27 13:05:27', 5, 0),
(122, 1, 'no', 'Literally, the measure of how much of the background and foreground area before and beyond your subject is in focus.', 'ISO', 'Aperture', 'f-stop or f-number', 'Depth of Field', 4, 'photography', '2020-09-27 13:05:27', 6, 0),
(123, 1, 'no', 'Who took the famous picture of six United States Marines raising the U.S. flag atop Mount Suribachi during the Battle of Iwo Jima in the final stages of the Pacific War? ', 'Steve McCurry', 'Joseph John Rosenthal', 'Robert Cappa', '', 2, 'photography', '2020-09-27 13:05:27', 7, 0),
(124, 1, 'no', 'What two former U.S. Presidents was Pete Souza the official White House photographer for? ', 'Carter and Obama', 'Reagan and Obama', 'Clinton and Obama', 'Bush and Clinton', 2, 'photography', '2020-09-27 13:05:27', 1, 0),
(125, 1, 'no', 'In general, strictly based on how the image will look after you \"fix\" it, it is better to overexpose a photo than underexpose it?\n\n', 'True', 'False', '', '', 1, 'photography', '2020-09-27 13:05:27', 2, 0),
(126, 1, 'no', 'What YouTube Photographer/Personality says the \"L-Mount Alliance\" funny in his videos? ', 'Matt Granger', 'Jared Polin', 'David Oastler', 'Dave McKeegan', 2, 'photography', '2020-09-27 13:05:27', 3, 0),
(127, 1, 'no', 'Who was the famous photographer that took the picture of the sailor kissing a dental nurse celebrating V-J Day? ', 'Robert Capa', 'Alfred Eisenstaedt', 'Charles Kerlee', 'Joe Rosenthal', 2, 'photography', '2020-09-27 13:05:27', 4, 0),
(128, 1, 'no', 'What is the best photography camera in 2020 from Sony in taking action still shots for professional photographers?', 'Sony A9II', 'Sony A7III', 'Sony A7RIV', 'Sony 6600', 1, 'photography', '2020-09-27 13:05:27', 5, 0),
(129, 1, 'no', 'You want to take picture of an object that is far away and get the best close up shot that you can. What native Sony lens would be the very best for taking that type of shot? ', 'Sony FE 135mm f/1.8 GM Lens', 'Sony FE 85mm F1.8 E-Mount Lens', 'Sony FE 24-240mm F3.5-6.3 OSS E-Mount Camera Lens', 'Sony FE 600mm f/4 GM OSS E-Mount Lens', 4, 'photography', '2020-09-27 13:05:27', 6, 0),
(130, 1, 'no', 'What is the proper way to balance a Wimberley WH-200 Gimbal Tripod Head II?', 'It doesn\'t matter as you can lock it in place', 'You don\'t have to balance the camera system', 'So it points down when let go of the camera', 'Balance, lens doesn\'t move when let go of it', 4, 'photography', '2020-09-27 13:05:27', 7, 0),
(131, 1, 'no', 'Neil Leifer photograph a famous boxer knocking out another famous boxer in 1965? ', 'Muhammad Ali vs. George Foreman', 'Muhammad Ali vs. Sonny Liston', 'Muhammad Ali vs. Joe Frazier', 'George Foreman -vs- Leon Spinks', 2, 'photography', '2020-09-27 13:13:46', 7, 0),
(132, 1, 'no', 'The Sony A9/A9II is great for taking what kinds of pictures?', 'Action', 'Portraits', 'Landscapes', '', 1, 'photography', '2020-09-29 13:41:01', 2, 0),
(133, 2, 'no', 'What is the new flagship MirrorLess camera for Sony?', 'Sony A9 II', 'Sony A7R IV', 'Sony A1', '', 3, 'photography', '2021-08-13 14:35:21', 0, NULL),
(135, 2, 'no', 'In 1972 a South Vietnamese plane accidentally dropped napalm on its own troops and civilians. A nine-year-old Kim Phuc with her clothes ripped off by burning the clothes while she ran. Who was this photographer? ', 'Eddie Adams', 'Alfred Eisenstaedt', 'Joe Rosenthal', 'Nick Ut', 4, 'photography', '2021-12-17 21:21:41', 0, NULL),
(140, 2, 'no', 'Who was the first U.S. President to have his picture taken and the image still exists? ', 'William Henry Harrison', 'Teddy Roosevelt', 'John Quincy Adams', 'Abe Lincoln', 3, 'photography', '2021-12-18 16:24:13', 0, NULL),
(141, 2, 'no', 'Who was the first person to walk on the moon?', 'Neil Armstrong', 'Buzz Aldrin', 'Soupy Sales', 'Alan Shepard', 1, 'space', '2022-02-10 13:22:20', 0, NULL),
(142, 2, 'no', 'Who was the first American in space?', 'Alan B. Shepard, Jr.', 'John Glenn', 'Yuri A. Gagarin', 'Neil Alden Armstrong', 1, 'space', '2022-02-10 20:58:01', 0, NULL),
(143, 2, 'no', 'What two planets are considered gas giants (composed mainly of hydrogen and helium)?', 'Jupiter and Saturn', 'Uranus and Neptune', 'Mercury and Mars', '', 1, 'space', '2022-02-10 21:04:38', 0, NULL),
(144, 2, 'no', 'What planet was demoted from planetary status and is now considered a dwarf planet?', 'Neptune', 'Pluto', 'Uranus', 'Dwarf', 2, 'space', '2022-02-10 21:08:55', 0, NULL),
(145, 2, 'no', 'Rand Peltzer is warned by the shop\'s owner that three rules must be obeyed by a Mogwai Owner: 1)Keep it away from bright light, 2) Don\'t get any water on it, 3) and never ever feed it after midnight. What is the name of the movie?', 'Cujo', 'Gremlins', 'Short Circuit', 'The Thing', 2, 'movie', '2022-02-10 22:53:41', 0, NULL),
(146, 2, 'no', 'Joel had all the normal teenage fantasies...cars, girls, money. Then his parents left for a week, and all his fantasies came true. What is the name of that movie?', 'Top Gun', 'Hoosiers', 'Risky Business', 'Caddyshack', 3, 'movie', '2022-02-10 22:56:09', 0, NULL),
(147, 2, 'no', 'What actor from the movie \"Dead Poets Society\" plays Dr. James Wilson on the TV show \"House\"?', 'Ethan Hawke', 'Tom Cruise', 'Robert Sean Leonard', 'James Waterston', 3, 'movie', '2022-02-13 13:57:08', 0, NULL),
(148, 2, 'no', 'A coach with a checkered past and a local drunk train a small town high school basketball team to become a top contender for the championship. What is the name of the movie?', 'Heroes', 'Friday Night Lights', 'Blue Chips', 'Hoosiers', 4, 'movie', '2022-02-13 13:59:33', 0, NULL),
(149, 2, 'no', 'What actor provided the voice for Darth Vader for the movie Star Wars(1977)?', 'David Prowse', 'James Earl Jones', 'Sean Connery', '', 2, 'movie', '2022-02-13 14:01:08', 0, NULL),
(150, 2, 'no', 'A talented pool hustler has stayed out of the game for years, must go back to his old ways when his little brother gets involved with his enemy, the very man who held him back from greatness. What is the name of this movie?', 'The Color of Money', 'Matchstick Men', 'The Hustler', 'Poolhall Junkies', 4, 'movie', '2022-02-13 14:03:28', 0, NULL),
(151, 2, 'no', 'What actor portrayed Frodo Baggins in the \"Lord of the Rings\" trilogy? ', 'Elijah Wood', 'John Rhys-Davies', 'Ian Mckellen', 'Sean Astin', 1, 'movie', '2022-02-13 16:23:51', 0, NULL),
(152, 2, 'no', 'Who portrayed George M. Cohan in the movie \"Yankee Doodle Dandy\"?', 'Fred Astaire', 'James Stewart', 'Gene Kelly', 'James Cagney', 4, 'movie', '2022-02-13 22:12:27', 0, NULL),
(153, 2, 'no', 'Who were the two main actors in the movie \"Casablanca\"?', 'Humphrey Bogart and Audrey Hepburn', 'Humphrey Bogart and Lauren Bacall', 'Humphrey Bogart and Katharine Hepburn', 'Humphrey Bogart and Ingrid Bergman', 4, 'movie', '2022-02-14 07:33:55', 0, NULL),
(154, 2, 'no', '\"You Maniacs! You blew it up! Ah, damn you! God damn you all to hell! \" What movie did this famous line come from?', 'Planet of the Apes (1968)', 'The Day After Tomorrow', 'The Matrix', 'Soylent Green', 1, 'movie', '2022-02-14 07:37:24', 0, NULL),
(155, 2, 'no', 'What movie did Dennis Hopper make his debut in?', 'True Grit', 'Rebel Without a Cause', 'Speed', 'Easy Rider', 2, 'movie', '2022-02-14 15:40:47', 0, NULL),
(156, 2, 'no', 'A young boy is arrested for writing a computer virus and is banned from using a computer until his 18th Birthday. What is the name of the movie?', 'The Net', 'Wargames', 'Hackers', 'Code Breakers', 3, 'movie', '2022-02-14 15:42:55', 0, NULL),
(157, 2, 'no', 'What movie did the following come from? \"Ray, people will come Ray. They\'ll come to Iowa for reasons they can\'t even fathom. They\'ll turn up your driveway not knowing for sure why they\'re doing it...\" (Hint: Stars Kevin Costner)', 'The Natural', 'Field Of Dreams', 'Eight Men Out', 'Pride of the Yankees', 2, 'movie', '2022-02-14 21:59:33', 0, NULL),
(158, 2, 'no', 'Follow the Sun was about what real life golf pro?', 'Bobby Jones', 'Arnold Palmer', 'Ben Hogan', 'Jack Nicklaus', 3, 'movie', '2022-02-14 22:01:25', 0, NULL),
(159, 2, 'no', 'What team did the Detroit Tigers play in the 1984 World Series? ', 'San Francisco Giants', 'San Diego Padries', 'Los Angeles Dodgers', 'St. Louis Cardinals', 2, 'sport', '2022-11-26 19:18:35', 0, NULL),
(160, 2, 'no', 'What other sport did Kirk Gibson excel in college besides baseball?', 'Basketball', 'Wrestling', 'Football', '', 3, 'sport', '2022-11-26 19:40:46', 0, NULL),
(161, 2, 'no', 'Who was the manager of the 1984 Detroit Tigers?', 'Billy Martin', 'Alan Trammell', 'Sparky Anderson', 'A. J. Hinch', 3, 'sport', '2022-11-26 19:49:35', 0, NULL);