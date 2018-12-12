INSERT INTO `department` (`Did`, `Dname`) VALUES 
(NULL, 'ECE'), 
(NULL, 'EEE'), 
(NULL, 'MECH'), 
(NULL, 'CIVIL'), 
(NULL, 'CME'), 
(NULL, 'IT'), 
(NULL, 'CSE'),
(NULL, 'DNA'),
(NULL, 'RNA');

INSERT INTO `student` (`Sid`, `Sname`, `Phone`, `Gender`, `Address`, `semesterNum`, `Did`, `Uname`, `password`) VALUES 
(NULL, 'std1', '123456', 'M', 'xyz,\r\nabc', '1', '2', 'abcd1', 'abcd1'), 
(NULL, 'std2', '1234567', 'F', 'abc,\r\nabc', '2', '3', 'abcd2', 'abcd2'), 
(NULL, 'std3', '12345678', 'M', 'xml,\r\nabc', '3', '4', 'abcd3', 'abcd3'), 
(NULL, 'std4', '123456789', 'M', 'css,\r\nabc', '4', '6', 'abcd4', 'abcd4'), 
(NULL, 'std5', '12345678', 'M', 'node,\r\nabc', '5', '1', 'abcd5', 'abcd5'), 
(NULL, 'std6', '1234567', 'F', 'sksi,\r\nabc', '6', '4', 'abcd6', 'abcd6'), 
(NULL, 'std7', '123456', 'M', 'sdfv,\r\nabc', '3', '1', 'abcd7', 'abcd7'), 
(NULL, 'std8', '1234567', 'F', 'dga,\r\nabc', '1', '1', 'abcd8', 'abcd8'),
(NULL, 'std9', '1253467', 'm', 'mnb\r\nlih', '5', '4', 'abcd9', 'abcd9'),
(NULL, 'std10', '12345678', 'f', 'son\r\ndad', '3', '1', 'abcd10', 'abcd10');

INSERT INTO `course` (`Cid`, `Cname`, `semesterNum`, `Did`) VALUES
(NULL, 'AES', '2', '5'), 
(NULL, 'BEE', '1', '6'),
(NULL, 'BECM', '5', '2'),
(NULL, 'MATHS', '2', '1'),
(NULL, 'AC', '3', '1'),
(NULL, 'EDC', '6', '4'),
(NULL, 'DE', '1', '6'),
(NULL, 'EMI', '7', '7'),
(NULL, 'NA', '8', '5'),
(NULL, 'PHYSIC', '1', '6');

INSERT INTO `faculty` (`Fid`, `fname`, `email`, `Did`, `Cid`, `Uname`, `password`) VALUES 
(NULL, 'fact1', 'fact1@abcd.com', '5', '2', 'fact1', 'fact1'),
(NULL, 'fact2', 'fact2@abcd.com', '7', '3', 'fact2', 'fact2'),
(NULL, 'fact3', 'fact3@gmail.com', '2', '4', 'fact3', 'fact3'),
(NULL, 'fact4', 'fact4@abcd.com', '5', '1', 'fact4', 'fact4'),
(NULL, 'fact5', 'fact5@abcd.com', '2', '2', 'fact5', 'fact5'),
(NULL, 'fact6', 'fact6@abcd.com', '3', '6', 'fact6', 'fact6'),
(NULL, 'fact7', 'fact7@abcd.com', '7', '4', 'fact7', 'fact7'),
(NULL, 'fact8', 'fact8@abcd.com', '7', '8', 'fact8', 'fact8'),
(NULL, 'fact9', 'fact9@abcd.com', '1', '9', 'fact9', 'fact9'),
(NULL, 'fact10', 'fact10@abcd.com', '4', '5', 'fact10', 'fact10') ;

INSERT INTO `schedule` (`days`, `StartTime`, `EndTime`, `RoomNo`, `Cid`) VALUES 
('35', '11', '12', '301', '2'),
('55', '10', '15', '25', '3'),
('45', '12', '21', '201', '9'),
('65', '9', '12', '205', '6'),
('75', '12', '14', '300', '1'),
('25', '11', '13', '222', '4'),
('16', '10', '18', '11', '5'),
('15', '9', '15', '13', '7'),
('12', '8', '12', '5', '8'),
('85', '17', '20', '88', '10');

INSERT INTO `message` (`msg`, `Sid`, `Fid`) VALUES 
('msg1', '3', '1'),
('msg2', '4', '7'),
('msg3', '1', '1'),
('msg4', '2', '7'),
('msg5', '6', '10'),
('msg6', '5', '8'),
('msg7', '3', '9'),
('msg8', '5', '5'),
('msg9', '7', '10'),
('msg10', '7', '8');

INSERT INTO `rating` (`number`, `Sid`, `Fid`) VALUES 
('5', '2', '1'),
('8', '4', '1'),
('2', '6', '7'),
('1', '8', '10'),
('3', '6', '9'),
('4', '4', '9'),
('6', '4', '6'),
('7', '6', '9'),
('9', '3', '10'),
('10', '7', '9');

INSERT INTO `admin` (`Aid`, `email`, `password`) VALUES 
(NULL, 'aid1@abcd.com', 'aid1'),
(NULL, 'sun@abcd.com', 'sun1'),
(NULL, 'now@abcd.com', 'now1'),
(NULL, 'hit@abcd.com', 'hit1'),
(NULL, 'guy@abcd.com', 'guy1'),
(NULL, 'buy@abcd.com', 'buy1'),
(NULL, 'fan@abcd.com', 'fan1'),
(NULL, 'key@abcd.com', 'key1'),
(NULL, 'dad@abcd.com', 'dad1'),
(NULL, 'mom@abcd.com', 'mom1');