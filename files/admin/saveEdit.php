<?php
session_start();
require '../../db_config.php';
// print_r($_POST);
if(isset($_SESSION['id'])&&isset($_SESSION['loginType'])&&$_SESSION['loginType']=="admin")
{
	if(isset($_POST["tableName"])&&$_POST["tableName"] == "department"){
		if(isset($_POST["id"])){
			if($_POST["id"]=="new"){
				// $sql = "UPDATE `department` SET `Dname`='".$_POST["Dname"]."' WHERE `Did` = ".$_POST["id"];
				$sql = "INSERT INTO `department` (`Did`, `Dname`) VALUES (NULL, '".$_POST["Dname"]."')";
				if($result = $conn->query($sql)){
					echo "<center style='green:red;'>Saved Successfully</center>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";

			}else{
				$sql = "UPDATE `department` SET `Dname`='".$_POST["Dname"]."' WHERE `Did` = ".$_POST["id"];
				if($result = $conn->query($sql)){
					echo "<center style='green:red;'>Saved Successfully</center>";
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_POST["tableName"])&&$_POST["tableName"] == "student"){
		if(isset($_POST["Sid"])){
			if($_POST["Sid"]=="new"){
				$sql =  "INSERT INTO `student` (`Sid`, `Sname`, `Phone`, `Gender`, `Address`, `semesterNum`, `Did`, `Uname`, `password`) VALUES (NULL, '".$_POST["Sname"]."', ".intval($_POST["Phone"]).", '".$_POST["Gender"]."', '".$_POST["Address"]."', ".intval($_POST["semesterNum"]).", ".intval($_POST["Did"]).", '".$_POST["Uname"]."', '".$_POST["pass"]."')";
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}else{
				$sql = "UPDATE `student` SET `Sname`='".$_POST["Sname"]."' , `Phone`=".intval($_POST["Phone"])." , `Gender`='".$_POST["Gender"]."' , `Address`='".$_POST["Address"]."' , `semesterNum`=".intval($_POST["semesterNum"])." , `Did`=".intval($_POST["Did"])." , `Uname`='".$_POST["Uname"]."' WHERE `Sid` = ".$_POST["Sid"];
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
					echo "<center style='color:red;'>Some thing went wrong</center>";
				}
		}
	}else if(isset($_POST["tableName"])&&$_POST["tableName"] == "faculty"){
		if(isset($_POST["Fid"])){
			if($_POST["Fid"]=="new"){
				$sql = "INSERT INTO `faculty` (`Fid`, `fname`, `email`, `Did`, `Cid`, `Uname`, `password`) VALUES (NULL, '".$_POST["fname"]."', '".$_POST["email"]."', ".intval($_POST["Did"]).", ".intval($_POST["Cid"]).", '".$_POST["Uname"]."', '".$_POST["pass"]."')";				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
				// print_r($result);
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}else{
				$sql = "UPDATE `faculty` SET `fname`='".$_POST["fname"]."' , `email`='".$_POST["email"]."' , `Did`=".intval($_POST["Did"])." , `Cid`=".intval($_POST["Cid"])." , `Uname`='".$_POST["Uname"]."' WHERE `Fid` = ".$_POST["Fid"];
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
				// print_r($result);
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_POST["tableName"])&&$_POST["tableName"] == "schedule"){
		if(isset($_POST["Secid"])){
			if($_POST["Secid"]){
				$sql = "INSERT INTO `schedule` (`days`, `StartTime`, `EndTime`, `RoomNo`, `Cid`) VALUES (".intval($_POST["days"]).", ".intval($_POST["StartTime"]).", ".intval($_POST["EndTime"]).", ".intval($_POST["RoomNo"]).", ".intval($_POST["Cid"]).")";
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
				// print_r($result);
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}else{
				$sql = "UPDATE `schedule` SET `days`=".intval($_POST["days"])." , `StartTime`='".intval($_POST["StartTime"])."' , `Cid`=".intval($_POST["Cid"])." , `EndTime`=".intval($_POST["EndTime"])." , `RoomNo`='".intval($_POST["RoomNo"])."' WHERE `Secid` = ".$_POST["Secid"];
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
				// print_r($result);
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}else if(isset($_POST["tableName"])&&$_POST["tableName"] == "course"){
		if(isset($_POST["Cid"])){
			if($_POST["Cid"]=="new"){
				$sql = "INSERT INTO `course` (`Cid`, `Cname`, `semesterNum`, `Did`) VALUES (NULL, '".$_POST["Cname"]."', ".intval($_POST["semesterNum"]).", ".intval($_POST["Did"]).")";
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
				// print_r($result);
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}else{
				$sql = "UPDATE `course` SET `Cname`='".$_POST["Cname"]."' , `semesterNum`='".intval($_POST["semesterNum"])."' , `Did`=".intval($_POST["Did"])." WHERE `Cid` = ".$_POST["Cid"];
				// echo $sql;
				$result = $conn->query($sql);
				if($result){
					echo "<center style='green:red;'>Saved Successfully</center>";
					// echo $result;
				}else
				// print_r($result);
					echo "<center style='color:red;'>Some thing went wrong</center>";
			}
		}
	}
}else{
	header('Location: /');
}
?>