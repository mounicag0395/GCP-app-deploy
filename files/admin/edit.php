<?php
session_start();
require '../../db_config.php';
// print_r($_GET);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../../main.css">
</head>
<body>
<?php
if(isset($_SESSION['id'])&&isset($_SESSION['loginType'])&&$_SESSION['loginType']=="admin")
{
	if(isset($_GET["table"])&&$_GET["table"] == "department"){
		if(isset($_GET["id"])){

			if($_GET["id"]=="new"){
				echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Department</h1><input type='text' placeholder='Department name' name='Dname'  maxlength='50'><input type='text' value='new' name='id' hidden><input type='text' value='department' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";
			}else{
				$sql = "SELECT * FROM `department` WHERE `department`.`Did` = ".$_GET["id"];
				if($result = $conn->query($sql)){
					$row = $result->fetch_assoc();
					echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Department</h1><input type='text' name='Dname' value='".$row["Dname"]."' maxlength='50'><input type='text' value='".$row["Did"]."' name='id' hidden><input type='text' value='department' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "student"){
		if(isset($_GET["id"])){
			if($_GET["id"]=="new"){
				echo "<form class='form' action ='saveEdit.php' method='post'><h1>Student</h1><input type='text' name='Sname' placeholder='Name' maxlength='50'><input type='text' name='Phone' placeholder='Phone number' maxlength='50'><input type='text' name='Gender' placeholder='Gender' maxlength='4'><input type='text' name='Address' placeholder='Address' maxlength='50'><input type='text' name='semesterNum' placeholder='Semester' maxlength='50'><select type='text' name='Did'>";
					$sql1 = "select * From department";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result1->fetch_assoc()) {
				    		
				    			echo "<option value='".$row1['Did']."'>".$row1['Dname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						die("<center style='color:red;'>Add Departments first</center>");
					}
				echo "</select><input type='text' name='Uname' placeholder='Username' maxlength='50'><input type='password' name='pass' placeholder='password' maxlength='50'><input type='text' value='new' name='Sid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";
			}else{
				$sql = "SELECT * FROM `student` WHERE `student`.`Sid` = ".$_GET["id"];
				if($result = $conn->query($sql)){
					$row = $result->fetch_assoc();
					echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Student</h1><input type='text' name='Sname' value='".$row["Sname"]."' maxlength='50'><input type='text' name='Phone' value='".$row["Phone"]."' maxlength='50'><input type='text' name='Gender' value='".$row["Gender"]."' maxlength='50'><input type='text' name='Address' value='".$row["Address"]."' maxlength='50'><input type='text' name='semesterNum' value='".$row["semesterNum"]."' maxlength='50'><select type='text' name='Did'>";
					$sql1 = "select * From department";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result1->fetch_assoc()) {
				    		if($row1['Did'] == $row['Did'])
				    			echo "<option value='".$row1['Did']."' selected='selected'>".$row1['Dname']."</option>";
				    		else
				    			echo "<option value='".$row1['Did']."'>".$row1['Dname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Departments first</center>";
					}
					
					echo "</select><input type='text' name='Uname' value='".$row["Uname"]."' maxlength='50'><input type='text' value='".$row["Sid"]."' name='Sid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";
				}
			}
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "faculty"){
		if(isset($_GET["id"])){
			if($_GET["id"]=="new"){
					echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Faculty</h1><input type='text' name='fname' placeholder='Name' maxlength='50'><input type='email' name='email' placeholder='Email' maxlength='50'><select type='text' name='Did'>";
					$sql1 = "select * From department";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result1->fetch_assoc()) {
				    		
				    			echo "<option value='".$row1['Did']."'>".$row1['Dname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Departments first</center>";
					}
					echo "</select><select type='text' name='Cid'>";
					$result2 = $conn->query("select * From course");
					if ($result2->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result2->fetch_assoc()) {
				    			echo "<option value='".$row1['Cid']."'>".$row1['Cname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Course first</center>";
					}
					
					echo "</select><input type='text' name='Uname' placeholder='Username' maxlength='50'><input type='password' name='pass' placeholder='password' maxlength='50'><input type='text' value='new' name='Fid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";
			}else{
				$sql = "SELECT * FROM `faculty` WHERE `faculty`.`Fid` = ".$_GET["id"];
				if($result = $conn->query($sql)){
					$row = $result->fetch_assoc();
					echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Faculty</h1><input type='text' name='fname' value='".$row["fname"]."' maxlength='50'><input type='email' name='email' value='".$row["email"]."' maxlength='50'><select type='text' name='Did'>";
					$sql1 = "select * From department";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result1->fetch_assoc()) {
				    		if($row1['Did'] == $row['Did'])
				    			echo "<option value='".$row1['Did']."' selected='selected'>".$row1['Dname']."</option>";
				    		else
				    			echo "<option value='".$row1['Did']."'>".$row1['Dname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Departments first</center>";
					}
					echo "</select><select type='text' name='Cid'>";
					$result2 = $conn->query("select * From course");
					if ($result2->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result2->fetch_assoc()) {
				    		if($row1['Cid'] == $row['Cid'])
				    			echo "<option value='".$row1['Cid']."' selected='selected'>".$row1['Cname']."</option>";
				    		else
				    			echo "<option value='".$row1['Cid']."'>".$row1['Cname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Course first</center>";
					}
					
					echo "</select><input type='text' name='Uname' value='".$row["Uname"]."' maxlength='50'><input type='text' value='".$row["Fid"]."' name='Fid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";

				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}			
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "schedule"){
		if(isset($_GET["id"])){
			if($_GET["id"]=="new"){
				echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Schedule</h1><input type='text' name='days' placeholder='Number of days' maxlength='50'><input type='number' name='StartTime' placeholder='Start Time' max='24'><select type='text' name='Cid'>";
				$result2 = $conn->query("select * From course");
				if ($result2->num_rows > 0) {
		    	// output data of each row
			    	while($row1 = $result2->fetch_assoc()) {
			    			echo "<option value='".$row1['Cid']."'>".$row1['Cname']."</option>";

			        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
			   		}
				}else{
					echo "<center style='color:red;'>Add Course first</center>";
				}
				
				echo "</select><input type='number' name='EndTime' placeholder='End Time' max='24'><input type='number' name='RoomNo' placeholder='Room No' maxlength='50'><input type='text' value='new' name='Secid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";

			}else{
				$sql = "SELECT * FROM `schedule` WHERE `schedule`.`Secid` = ".$_GET["id"];
				if($result = $conn->query($sql)){
					$row = $result->fetch_assoc();
					echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Schedule</h1><input type='text' name='days' value='".$row["days"]."' maxlength='50'><input type='number' name='StartTime' value='".$row["StartTime"]."' max='24'><select type='text' name='Cid'>";
					$result2 = $conn->query("select * From course");
					if ($result2->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result2->fetch_assoc()) {
				    		if($row1['Cid'] == $row['Cid'])
				    			echo "<option value='".$row1['Cid']."' selected='selected'>".$row1['Cname']."</option>";
				    		else
				    			echo "<option value='".$row1['Cid']."'>".$row1['Cname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Course first</center>";
					}
					
					echo "</select><input type='number' name='EndTime' value='".$row["EndTime"]."' max='24'><input type='number' name='RoomNo' value='".$row["RoomNo"]."' maxlength='50'><input type='text' value='".$row["Secid"]."' name='Secid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";

				}else{
					echo "<center style='color:red;'>Some thing went wrong</center>";
				}	
			}
			
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "course"){
		if(isset($_GET["id"])){
			if($_GET["id"]=="new"){
				echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Course</h1><input type='text' name='Cname' placeholder='Course Name' maxlength='50'><input type='number' name='semesterNum' placeholder='Semester Number' max='24'><select type='text' name='Did'>";
				$result2 = $conn->query("select * From department");
				if ($result2->num_rows > 0) {
		    	// output data of each row
			    	while($row1 = $result2->fetch_assoc()) {
			    			echo "<option value='".$row1['Did']."'>".$row1['Dname']."</option>";

			        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
			   		}
				}else{
					echo "<center style='color:red;'>Add Course first</center>";
				}
				
				echo "</select><input type='text' value='new' name='Cid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";
			}else{
				$sql = "SELECT * FROM `course` WHERE `course`.`Cid` = ".$_GET["id"];
				if($result = $conn->query($sql)){
					$row = $result->fetch_assoc();
					echo "<form class='form'  action ='saveEdit.php' method='post'><h1>Course</h1><input type='text' name='Cname' value='".$row["Cname"]."' maxlength='50'><input type='number' name='semesterNum' value='".$row["semesterNum"]."' max='24'><select type='text' name='Did'>";
					$result2 = $conn->query("select * From department");
					if ($result2->num_rows > 0) {
			    	// output data of each row
				    	while($row1 = $result2->fetch_assoc()) {
				    		if($row1['Did'] == $row['Did'])
				    			echo "<option value='".$row1['Did']."' selected='selected'>".$row1['Dname']."</option>";
				    		else
				    			echo "<option value='".$row1['Did']."'>".$row1['Dname']."</option>";

				        	// echo "<tr> <td><div> ".$row['Dname']."</div></td><td> <a href='delete.php?table=department&id=".$row['Did']."'>Delete</a> </td><td><a href='edit.php?table=department&id=".$row['Did']."'>Edit</a></td> </tr>";
				   		}
					}else{
						echo "<center style='color:red;'>Add Course first</center>";
					}
					
					echo "</select><input type='text' value='".$row["Cid"]."' name='Cid' hidden><input type='text' value='".$_GET["table"]."' name='tableName' hidden><button type='submit' value='Save'>Save</button></form>";

				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
			
		}
	}
}else{
	header('Location: /');
}
?>
</body>
</html>