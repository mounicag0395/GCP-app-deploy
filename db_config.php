<?php
// $db_name = "testProject";
// $conn = mysqli_connect(null,
//                            "root",
//                            "",
//                            null,
//                            null,
//                            "localhost");
//  $db = "monica";
$conn = mysqli_connect(null,
                           getenv('PRODUCTION_DB_USERNAME'),
                           getenv('PRODUCTION_DB_PASSWORD'),
                           null,
                           null,
                           getenv('PRODUCTION_CLOUD_SQL_INSTANCE'));
 $db = getenv('DEVELOPMENT_DB_NAME');
// @mysql_connect(getenv('MYSQL_DSN'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD')) or die ("Problem with sql");
  if ($conn->connect_error) {
    die("Could not connect to database: $conn->connect_error " .
        "[$conn->connect_errno]");
  }else{
  	$conn->select_db($db);
  }

?>