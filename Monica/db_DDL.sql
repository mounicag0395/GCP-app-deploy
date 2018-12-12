
-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB;


CREATE TABLE `course` (
  `Cid` int(11) NOT NULL AUTO_INCREMENT,
  `Cname` varchar(50) NOT NULL,
  `semesterNum` int(11) NOT NULL,
  `Did` int(5) NOT NULL,
  PRIMARY KEY (`Cid`),
  KEY `Did` (`Did`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Did` int(5) NOT NULL AUTO_INCREMENT,
  `Dname` varchar(50) NOT NULL,
  PRIMARY KEY (`Did`),
  UNIQUE KEY (`Dname`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Fid` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Did` int(5) NOT NULL,
  `Cid` int(11) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Fid`),
  UNIQUE KEY (`Uname`),
  KEY  (`Cid`),
  KEY  (`Did`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg` text NOT NULL,
  `Sid` int(4) NOT NULL,
  `Fid` int(5) NOT NULL,
  KEY `Sid` (`Sid`),
  KEY `Fid` (`Fid`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `number` int(2) NOT NULL,
  `Sid` int(4) NOT NULL,
  `Fid` int(5) NOT NULL,
  KEY `Fid` (`Fid`),
  KEY `Sid` (`Sid`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `days` int(3) NOT NULL,
  `StartTime` varchar(10) NOT NULL,
  `EndTime` varchar(10) NOT NULL,
  `RoomNo` int(3) NOT NULL,
  `Cid` int(5) NOT NULL,
  KEY `Cid` (`Cid`)
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Sid` int(4) NOT NULL AUTO_INCREMENT,
  `Sname` varchar(50) NOT NULL,
  `Phone` int(15) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Address` text NOT NULL,
  `semesterNum` int(11) NOT NULL,
  `Did` int(5) NOT NULL,
  `Uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Sid`),
  UNIQUE KEY (`Uname`),
  KEY  (`Did`)
) ENGINE=InnoDB;



--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Did`) REFERENCES `department` (`Did`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`Did`) REFERENCES `department` (`Did`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Sid`) REFERENCES `student` (`Sid`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`Fid`) REFERENCES `faculty` (`Fid`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`Fid`) REFERENCES `faculty` (`Fid`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`Sid`) REFERENCES `student` (`Sid`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Cid`) REFERENCES `course` (`Cid`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Did`) REFERENCES `department` (`Did`);
