-- create teble queries
CREATE TABLE `candidates` (
  `cand_id` int(11) NOT NULL,
  `elec_id` int(11) NOT NULL,
  `cand_name` varchar(220) NOT NULL,
  `cand_add` varchar(400) DEFAULT NULL,
  `symbol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `elections` (
  `elec_id` int(15) NOT NULL,
  `elec_name` varchar(220) NOT NULL,
  `no_cand` int(30) NOT NULL,
  `sd` date NOT NULL,
  `ed` date NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `voters` (
  `username` varchar(225) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE voters
  ADD PRIMARY KEY (username);


CREATE TABLE `votes` (
  `vote_id` int(20) NOT NULL,
  `cand_id` int(20) NOT NULL,
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inset a new user in user table
INSERT INTO `voters` (`username`, `password`, `email`, `address`) VALUES
('Admin', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 'admin@gmail.com', 'Shankar Bhawan\r\nBITS Pilani\r\nRajasthan'),
('amit', '0754b34cf57bc01d13ec9e604ca974ef9e698a6f', 'amit709@gmail.com', 'k-99,\r\nMalabar Hill,\r\nMumbai.'),
('Ankita', '05b32add97ab627cdd839e3dd07a11d7cb15baa7', 'Ankitaroy@gmail.com', 'Fh-11, MohanBagh, Gangtok,Sikkim.'),
('david', '32339611df027ade1e4c7ce52fc19d50c05be10e', 'davidDC@gmail.com', 'U-55, Prakash Gang, Vishakhapatnam'),
('Laalsingh', 'f0e5c532e2a5ab226c45e18cdf355c81ba5bd4df', 'laalsingh@gmail.com', '90 Gautami Heights, Rohtak, Haryana'),
('rahul', '06d0880acf1cbfb87e70a0fcada38f5d49449b87', 'rahul_cs@gmail.com', '45 Mohini Apartments\r\nKarol Bagh \r\nDelhi'),
('rinku', '502b7dfff6fb4dc619b4933e1cb122df34605430', 'rinkusama@gmail.com', '5,B3-87\r\nSpolion city\r\nKolkata'),
('sam', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0', 'dsfjsdfkljsdflkjsdkaj', 'adadddfjsfkjsdfjasoasjosdjfkosaj'),
('sarabjit', '3608a6d1a05aba23ea390e5f3b48203dbb7241f7', 'sarabjit8@gmail.com', 'LI-87\r\nRajiv Gandhi Nagar\r\nAmritsar'),
('Simmi', 'e4c5b6f760e81738b6b06237b97275a6a0f07753', 'simmiraj@gmail.com', 'YU-88, Near Bhagat Chowk, Ludhiana');

-- Insert a new candidate in candidates table
INSERT INTO `candidates` (`cand_id`, `elec_id`, `cand_name`, `cand_add`, `symbol`) VALUES
-- (7, 6, 'Ramu', 'FH-99, \r\nChamparan\r\nBihar', '../assets/images/cand_photos544771Acer_Wallpaper_02_5000x2813.jpg');
(2, 2, 'Shayam', '14, Mohini Apartments\r\nKarol Bagh\r\nDelhi.', '../assets/images/cand_photos408724Acer_Wallpaper_02_5000x2813.jpg'),
(4, 2, 'Mohan', 'Lalkuan, Nainital\r\nUttarakhand', '../assets/images/cand_photos448051Acer_Wallpaper_01_5000x2814.jpg'),
(5, 6, 'Mohanjodaro', 'Indus valley', '../assets/images/cand_photos770308Planet9_Wallpaper_5000x2813.jpg'),
(6, 6, 'Akbar', 'I/55\r\nLodhi colony\r\nDelhi', '../assets/images/cand_photos166407Acer_Wallpaper_03_5000x2814.jpg'),
(7, 6, 'Ramu', 'FH-99, \r\nChamparan\r\nBihar', '../assets/images/cand_photos544771Acer_Wallpaper_02_5000x2813.jpg'),
(9, 7, 'Yeta Keets', '11 Maxwell Apartments\r\nPanji, Goa', '../assets/images/cand_photos593675Planet9_Wallpaper_5000x2813.jpg'),
(10, 7, 'Salunkhe', 'G-787, Ring Road\r\nPonda', '../assets/images/cand_photos590150Acer_Wallpaper_01_5000x2814.jpg'),
(11, 7, 'Daya Patel', 'House no. 55\r\nNear jetty,\r\nMargao', '../assets/images/cand_photos465890Acer_Wallpaper_02_5000x2813.jpg'),
(12, 6, 'Abdul Samad', '45, Raju City, Near Rajiv Chowk, Delhi', '../assets/images/cand_photos131663Indian_Election_Symbol_Telephone.png'),
(13, 6, 'Daijobu Singh', 'I/44 Rajiv Gandhi Nagar, Indore', '../assets/images/cand_photos523868download.png');

-- Query to register a vote
INSERT INTO `votes` (`vote_id`, `cand_id`, `username`) VALUES
(3, 2, 'rahul'),
(4, 2, 'sarabjit'),
(6, 2, 'amit'),
(9, 5, 'rahul'),
(11, 7, 'sarabjit'),
(12, 7, 'amit'),
(13, 2, 'sam'),
(15, 7, 'rinku'),
(16, 7, 'sam'),
(17, 9, 'rahul'),
(19, 11, 'sam');


-- Here user with username rahul gave vote to candidate with candidate id 2.

-- Inset an election in elections table
INSERT INTO `elections` (`elec_id`, `elec_name`, `no_cand`, `sd`, `ed`, `status`) VALUES
-- (6, 'Rajya sabha', 6, '2023-04-05', '2023-04-26', 'Active Now');
(2, 'LOK sabha', 2, '2023-03-27', '2023-04-07', 'Expired'),
(6, 'Rajya sabha', 6, '2023-04-05', '2023-04-26', 'Active Now'),
(7, 'Goa Election', 3, '2023-04-10', '2023-05-22', 'Active Now'),
(8, 'Kerala Election', 10, '2023-04-12', '2023-05-18', 'Upcoming'),
(9, 'Nagal Mundi Relection', 6, '2023-04-29', '2023-05-11', 'Upcoming'),
(11, 'Karnataka Election', 9, '2023-04-21', '2023-05-17', 'Upcoming'),
(12, 'Bihar Election', 2, '2023-04-17', '2023-04-30', 'Upcoming'),
(13, 'Parsakhera Re-election', 5, '2023-04-22', '2023-04-23', 'Upcoming'),
(14, 'Maharashtra election', 14, '2023-04-12', '2023-04-30', 'Upcoming'),
(15, 'UP Election', 10, '2023-04-25', '2023-05-25', 'Upcoming');

-- Retrieve number of votes for each candidate given that cand_id is given
SELECT COUNT(*) FROM votes WHERE cand_id=2;

-- Total number of vote casted in an elecction if election id is known
SELECT COUNT(*) as count FROM (SELECT votes.cand_id, votes.username, candidates.elec_id FROM votes INNER JOIN candidates ON votes.cand_id = candidates.cand_id) AS q1 WHERE q1.elec_id=6;

-- percentage of votes received by a candidate when elec_id and cand_id is known here cand_id=7 and elec_id=6
SELECT (100* (SELECT CAST(COUNT(*) AS decimal(9,2)) FROM votes WHERE cand_id=7)/(SELECT CAST(COUNT(*) AS decimal(9,2)) as count FROM (SELECT votes.cand_id, votes.username, candidates.elec_id FROM votes INNER JOIN candidates ON votes.cand_id = candidates.cand_id) AS q1 WHERE q1.elec_id=6)) AS percentage_votes;

-- retrieve the the winner of an election when elec_id is known
CREATE VIEW candv AS (SELECT cand_id,COUNT(*) as count FROM votes WHERE cand_id IN (SELECT cand_id FROM candidates WHERE elec_id=6) GROUP BY cand_id);
SELECT cand_name FROM candidates WHERE cand_id IN (SELECT cand_id FROM candv WHERE count=(SELECT MAX(count) FROM candv));
DROP VIEW candv;

-- retrieve rank of each candidate
CREATE VIEW candv AS (SELECT cand_id,COUNT(*) as count FROM votes WHERE cand_id IN (SELECT cand_id FROM candidates WHERE elec_id=6) GROUP BY cand_id);
CREATE VIEW result AS (SELECT cand_id,RANK() OVER (ORDER BY count desc) election_rank FROM candv);
SELECT candidates.cand_name, result.election_rank FROM candidates INNER JOIN result ON candidates.cand_id = result.cand_id;
DROP VIEW candv;
DROP VIEW result;

-- Delete a user from database
DELETE FROM voters WHERE username = 'amit';

-- Update user info(here email)
UPDATE voters SET email = 'rahul745@gmail.com' WHERE username = 'rahul';

