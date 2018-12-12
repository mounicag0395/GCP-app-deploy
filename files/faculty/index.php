<?php
session_start();
// print_r($_GET);
if(isset($_SESSION['id'])&&isset($_SESSION['loginType'])&&$_SESSION['loginType']=="faculty")
{
	if(isset($_POST["Sid"])&&isset($_POST["number"])){
		require '../../db_config.php';
		$sql = "INSERT INTO `rating` (`number`, `Sid`, `Fid`) VALUES ('".$_POST["number"]."', ".$_POST["Sid"].", ".$_SESSION['id'].")";
				if($result = $conn->query($sql)){
					die( "<center style='green:red;'>Saved Successfully</center>");
				}else
					die("<center style='color:red;'>Some thing went wrong</center>");
	}
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../main.css">

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
form{
	display: none;
}
</style>
</head>
<body>
	<div id="wrapper">
		<h1>Faculty</h1>
<?php
		require '../../db_config.php';
		$sql = "SELECT * FROM `message` m, `student` s, department d WHERE m.Fid = ".$_SESSION['id']." AND m.Sid = s.Sid AND s.Did = d.Did";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Message</th><th>From</th><th>Department</th><th>Semester</th></tr>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['msg']."</div></td><td><div> ".$row['Sname']."</div></td><td><div> ".$row['Dname']."</div></td><td><div> ".$row['semesterNum']."</div></td></tr>";
	   		}
	   		echo "</table>";
		} else {	
	    	echo "0 results";
		}
		echo "<div class='button'>Add Rating</div></div>";
		echo "<form class='form' method='post'>
		<h1>Add Rating</h1>
		<input type='number' name='number' max='10' maxlength='2'>
		<select name='Sid'>";	
		$sql1 = "select * From student";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result1->fetch_assoc()) {
				    			
				    		echo "<option value='".$row1['Sid']."'>".$row1['Sname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Student first</center>";
					}
		echo "
		</select><button type='submit'>Save</button>
    <div class='button' style='background-color: red;'>Close</div>
		</form>";
?>
	<script type="text/javascript" src="../../jquery.js"></script>
	<script type="text/javascript">
		$(".button").click(function(){	
   			$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
		});
	</script>
</body>
</html>
<?php
}else{
	header('Location: /');
}
?>