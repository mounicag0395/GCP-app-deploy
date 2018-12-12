<?php
require 'db_config.php';
 if((isset($_POST['uname'])&&isset($_POST['pass'])&&isset($_POST['loginType'])))
	{
		$uname=$_POST['uname'];
		$pass=$_POST['pass'];
		if($_POST['loginType']=='admin')
		{
			$query="SELECT * From `admin` WHERE `email`='$uname' AND `password`='$pass'";
			if($res=$conn->query($query))
			{	
				if($res->num_rows > 0)
				{	$val=$res->fetch_assoc();
					include 'session.php';
					$_SESSION['id']=$val['Aid'];
					$_SESSION['loginType']='admin';
					// print_r($_SESSION);
					header('Location: files/admin');
				}
				else
				{
					echo "<center style='color:red;'>Wrong Password or Id</center>";
				}
			}
			else
			{
				echo "<center style='color:red;'>Wrong Password or Id</center>";
			}
		}
		else if($_POST['loginType']=='student')
		{
			$query="SELECT * FROM `student` WHERE `Uname`='$uname' AND `password`='$pass'";
			if($res=$conn->query($query))
			{	
				if($res->num_rows > 0)
				{	$val=$res->fetch_assoc();
					include 'session.php';
					$_SESSION['id']=$val['Sid'];
					$_SESSION['loginType']='student';

					header('Location: files/student');
				}
				else
				{
					echo "<center style='color:red;'>Wrong Password or Id</center>";
				}
			}
			else
			{
				echo "<center style='color:red;'>Wrong Password or Id</center>";
			}
		}
		else if($_POST['loginType']=='faculty')
		{
			$query="SELECT * FROM `faculty` WHERE `Uname`='$uname' AND `password`='$pass'";
			if($res=$conn->query($query))
			{	
				if($res->num_rows > 0)
				{	$val=$res->fetch_assoc();
					include 'session.php';
					$_SESSION['id']=$val['Fid'];
					$_SESSION['loginType']='faculty';
					header('Location: files/faculty');
				}
				else
				{
					echo "<center style='color:red;'>Wrong Password or Id</center>";
				}
			}
			else
			{
				echo "<center style='color:red;'>Wrong Password or Id</center>";
			}
		}
	}
	else
	{
		header('Location: index.php');
	}
?>