<?php
// $sql = "select * From admin";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["Aid"]. " - email: " . $row["email"]. " " . $row["password"]. "<br>";
//     }
// } else {
//     echo "0 results";
// }
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <!-- <p class="message">Already registered? <a href="#">Sign In</a></p> -->
    </form>
    <form class="login-form" method="post" action="validate.php">
      <input type="text" name="uname" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
      <div>
      	  <div class="radioInputs"><input type="radio" name="loginType" value="admin"> <span>Admin</span></div>
  		  <div class="radioInputs"><input type="radio" name="loginType" value="student"> <span>Student</span></div>
  		  <div class="radioInputs"><input type="radio" name="loginType" value="faculty"> <span>Faculty</span></div>
      </div>
      <button>login</button>
      <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
    </form>
  </div>
</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main.js"></script>
</body>
</html>