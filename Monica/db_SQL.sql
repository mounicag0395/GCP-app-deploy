--get all course taken by ECE students right now
 SELECT DISTINCT  c1.Cname FROM `course` c1,`department` d1 where 
 	c1.semesterNum IN 
 		(SELECT s.semesterNum FROM `student` s,`department` d WHERE 
 		d.Dname='ECE' AND 
 		s.Did = d.Did)AND 
 	d1.Did = c1.Did AND 
 	d1.Dname='ECE';

 	

-- department of student with highest average rating
SELECT d.Dname FROM student s,(SELECT Sid,AVG(number) AS 'avg' FROM rating GROUP BY Sid) r1,department d WHERE 
	s.Sid = r1.Sid AND 
	r1.avg =(SELECT MAX(r.avg) FROM (SELECT Sid,AVG(number) AS 'avg' FROM rating GROUP BY Sid) r) AND 
	s.Did = d.Did;



-- all student names for department CIVIL
SELECT Sname from student s, department d WHERE s.Did = d.Did AND d.Dname = 'CIVIL';


-- all messages from student st7 to faculty fact8
SELECT m.msg FROM student s,faculty f, message m WHERE 
	m.Sid = s.Sid AND 
	m.Fid = f.Fid AND 
	f.fname = 'fact8' AND 
	s.Sname = 'std7';


--schedule for courses in department IT
SELECT s.days,s.StartTime,s.EndTime,s.RoomNo FROM schedule s,course c,department d WHERE 
	s.Cid = c.Cid AND 
	c.Did = d.Did AND 
	d.Dname = 'IT';

