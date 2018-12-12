<?php
session_start();
// print_r($_GET);
if(isset($_SESSION['id'])&&isset($_SESSION['loginType'])&&$_SESSION['loginType']=="admin")
{
?>
<html>
<head>
	<title></title>
<style type="text/css">
*{
	margin: 0px;
	padding: 0px;
}
#wrapper{
	left:50%;
	position: absolute;
	transform:translateX(-50%);
	min-width: 600px;
	display: inline-block;
	margin:50px auto;
    background-color: white;
    padding: 10px;
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
ul li{
	text-decoration: underline;
	list-style: none;
	text-align: center;
	margin-top: 10px;
}
/*td:first-child {background: #CCC}*/
.table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.table td, .table th {
    border: 1px solid #ddd;
    padding: 8px;
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
h1{
	padding:10px;
	text-align: center;
}
.button{
	font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #4CAF50;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
    display: block;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
}
a{
	color:black;
}
</style>
</head>
<body>
	<div id="wrapper">
<?php
if(isset($_GET["change"])){
	if($_GET["change"] == "department"){
		require '../../db_config.php';
		echo "<h1>Department</h1>";
		$sql = "select * From department";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Department</th><th></th><th></th>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
	   		}
	   		echo "</table>";
		} else {
	    	echo "0 results";
		}
		echo "<a class='button'  href='edit.php?table=".$_GET["change"]."&id=new'>Add New</a>";
	}else if($_GET["change"] == "student"){
		require '../../db_config.php';
		echo "<h1>Student</h1>";
		$sql = "SELECT * FROM `student` s JOIN `department` d on s.Did = d.Did";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Name</th><th>Phone number</th><th>Gender</th><th>Address</th><th>Semester</th><th>Department</th><th>User name</th><th></th><th></th></tr>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['Sname']."</div></td><td><div> ".$row['Phone']."</div></td><td><div> ".$row['Gender']."</div></td><td><div> ".$row['Address']."</div></td><td><div> ".$row['semesterNum']."</div></td><td><div> ".$row['Dname']."</div></td><td><div> ".$row['Uname']."</div></td><td> <a href='delete.php?table=student&id=".$row['Sid']."'>Delete</a></td><td> <a href='edit.php?table=student&id=".$row['Sid']."'>Edit</a> </td></tr>";
	   		}
	   		echo "</table>";
		} else {
	    	echo "0 results";
		}
		echo "<a class='button'  href='edit.php?table=".$_GET["change"]."&id=new'>Add New</a>";

	}else if($_GET["change"] == "faculty"){
		require '../../db_config.php';
		echo "<h1>Faculty</h1>";
		$sql = "SELECT * FROM `faculty` f ,`department` d,`course` c WHERE f.Did = d.Did AND f.Cid = c.Cid";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Name</th><th>Email Id</th><th>Department</th><th>Course</th><th>User name</th><th></th><th></th></tr>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['fname']."</div></td><td><div> ".$row['email']."</div></td><td><div> ".$row['Dname']."</div></td><td><div> ".$row['Cname']."</div></td><td><div> ".$row['Uname']."</div></td><td> <a href='delete.php?table=faculty&id=".$row['Fid']."'>Delete</a></td><td> <a href='edit.php?table=faculty&id=".$row['Fid']."'>Edit</a> </td></tr>";
	   		}
	   		echo "</table>";
		} else {
	    	echo "0 results";
		}
		echo "<a class='button'  href='edit.php?table=".$_GET["change"]."&id=new'>Add New</a>";

	}else if($_GET["change"] == "course"){
		require '../../db_config.php';
		echo "<h1>Course</h1>";	
		$sql = "SELECT * FROM `course` c JOIN `department` d on c.Did = d.Did";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Name</th><th>Semester</th><th>Department</th><th></th><th></th></tr>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['Cname']."</div></td><td><div> ".$row['semesterNum']."</div></td><td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=course&id=".$row['Cid']."'>Delete</a></td><td> <a href='edit.php?table=course&id=".$row['Cid']."'>Edit</a> </td></tr>";
	   		}
	   		echo "</table>";
		} else {
	    	echo "0 results";
		}
		echo "<a class='button'  href='edit.php?table=".$_GET["change"]."&id=new'>Add New</a>";

	}else if($_GET["change"] == "schedule"){
		require '../../db_config.php';
		echo "<h1>Schedule</h1>";
		$sql = "SELECT * FROM `schedule` se, `department` d, `course` c WHERE c.Cid = se.Cid AND c.Did = d.Did";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Days</th><th>Start Time</th><th>End Time</th><th>Room No</th><th>Course Name</th><th>Department</th><th></th><th></th></tr>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['days']."</div></td><td><div> ".$row['StartTime']."</div></td><td><div> ".$row['EndTime']."</div></td><td><div> ".$row['RoomNo']."</div></td><td><div> ".$row['Cname']."</div></td><td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=schedule&id=".$row['Secid']."'>Delete</a></td><td> <a href='edit.php?table=schedule&id=".$row['Secid']."'>Edit</a> </td></tr>";
	   		}
	   		echo "</table>";
		} else {
	    	echo "0 results";
		}
		echo "<a class='button'  href='edit.php?table=".$_GET["change"]."&id=new'>Add New</a>";

	}else{
		echo "<center style='color:red;'>Wrong Request</center>";
	}
}
else{
?>
		<ul>
			<li><a href='?change=department'>Departments</a></li>
			<li><a href='?change=student'>Students</a></li>
			<li><a href='?change=faculty'>Faculty</a></li>
			<li><a href='?change=schedule'>Schedule</a></li>
			<li><a href='?change=course'>Courses</a></li>
		</ul>
<?php
}	
?>
	</div>
</body>
</html>
<?php
}else{
	header('Location: /');
}
?>