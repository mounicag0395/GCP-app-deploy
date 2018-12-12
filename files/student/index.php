<?php
session_start();
// print_r($_GET);
if(isset($_SESSION['id'])&&isset($_SESSION['loginType'])&&$_SESSION['loginType']=="student")
{
	if(isset($_POST["Fid"])&&isset($_POST["msg"])){
		require '../../db_config.php';
		$sql = "INSERT INTO `message` (`msg`, `Sid`, `Fid`) VALUES ('".$_POST["msg"]."', ".$_SESSION['id'].", ".$_POST["Fid"].")";
				if($result = $conn->query($sql)){
					die( "<center style='green:red;'>Saved Successfully</center>");
				}else
					die ("<center style='color:red;'>Some thing went wrong</center>");
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
    paddingadding: 8px;
    text-align: center;			
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
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
		<h1>Student</h1>
<?php
		require '../../db_config.php';
		$sql = "SELECT * FROM `rating` m, `faculty` f, `department` d,course c WHERE m.Sid = ".$_SESSION['id']." AND m.Fid = f.Fid AND f.Did = d.Did AND f.Cid=c.Cid";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
    	// output data of each row
			echo "<table class='table'>";
			echo "<tr><th>Rating</th><th>From</th><th>Department</th><th>Course</th></tr>";
	    	while($row = $result->fetch_assoc()) {

	        	echo "<tr> <td><div> ".$row['number']."</div></td><td><div> ".$row['fname']."</div></td><td><div> ".$row['Dname']."</div></td><td><div> ".$row['Cname']."</div></td></tr>";
	   		}
	   		echo "</table>";
		} else {
	    	echo "0 results";
		}
		echo "<div class='button'>Send Message</div></div>";
		echo "<form class='form' method='post'>
		<h1>Send Message</h1>
		<input type='text' name='msg'>
		<select name='Fid'>";	
		$sql1 = "select * From faculty";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result1->fetch_assoc()) {
				    			
				    		echo "<option value='".$row1['Fid']."'>".$row1['fname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add faculty first</center>";
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