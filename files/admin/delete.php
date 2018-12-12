<?php
session_start();
require '../../db_config.php';
if(isset($_SESSION['id'])&&isset($_SESSION['loginType'])&&$_SESSION['loginType']=="admin")
{
	if(isset($_GET["table"])&&$_GET["table"] == "department"){
		if(isset($_GET["id"])){
			$res1 = $conn->query("SELECT * FROM `student` WHERE Did = ".$_GET["id"]);
			$res2 = $conn->query("SELECT * FROM `faculty` WHERE Did = ".$_GET["id"]);
			$res3 = $conn->query("SELECT * FROM `course` WHERE Did = ".$_GET["id"]);
			if($res1->num_rows > 0||$res2->num_rows > 0||$res3->num_rows > 0){
				echo "<center style='color:red;'>Cannot Delete because used as foreign in some other table please delete those before</center>";
			}else{
				$res1 = $conn->query("DELETE FROM `department` WHERE `department`.`Did` = ".$_GET["id"]);
				if($res1){
					echo "<center style='color:green;'>Deleted successfully</center>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "student"){
		if(isset($_GET["id"])){
			$res1 = $conn->query("SELECT * FROM `message` WHERE Sid = ".$_GET["id"]);
			$res2 = $conn->query("SELECT * FROM `rating` WHERE Sid = ".$_GET["id"]);
			if($res1->num_rows > 0||$res2->num_rows > 0){
				echo "<center style='color:red;'>Cannot Delete because used as foreign in some other table please delete those before</center>";
			}else{
				$res1 = $conn->query("DELETE FROM `student` WHERE `student`.`Sid` = ".$_GET["id"]);
				if($res1){
					echo "<center style='color:green;'>Deleted successfully</center>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}
	else if(isset($_GET["table"])&&$_GET["table"] == "faculty"){
		if(isset($_GET["id"])){
			$res1 = $conn->query("SELECT * FROM `message` WHERE Fid = ".$_GET["id"]);
			$res2 = $conn->query("SELECT * FROM `rating` WHERE Fid = ".$_GET["id"]);
			if($res1->num_rows > 0||$res2->num_rows > 0){
				echo "<center style='color:red;'>Cannot Delete because used as foreign in some other table please delete those before</center>";
			}else{
				$res1 = $conn->query("DELETE FROM `faculty` WHERE `faculty`.`Fid` = ".$_GET["id"]);
				if($res1){
					echo "<center style='color:green;'>Deleted successfully</center>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "course"){
		if(isset($_GET["id"])){
			$res1 = $conn->query("SELECT * FROM `schedule` WHERE Cid = ".$_GET["id"]);
			if($res1->num_rows > 0){
				echo "<center style='color:red;'>Cannot Delete because used as foreign in some other table please delete those before</center>";
			}else{
				$res1 = $conn->query("DELETE FROM `course` WHERE `course`.`Cid` = ".$_GET["id"]);
				if($res1){
					echo "<center style='color:green;'>Deleted successfully</center>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_GET["table"])&&$_GET["table"] == "schedule"){
		if(isset($_GET["id"])){
			$res1 = $conn->query("DELETE FROM `schedule` WHERE `schedule`.`Secid` = ".$_GET["id"]);
			if($res1){
				echo "<center style='color:green;'>Deleted successfully</center>";
			}else
				echo "<center style='color:red;'>Some thing went wrong</center>";
		}
	}else{
		echo "<center style='color:red;'>Wrong Request</center>";
	}
}
else
{
	header('Location: /');
}
?>