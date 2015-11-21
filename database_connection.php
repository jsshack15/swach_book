<?

php define('DB_HOST', 'localhost');
 define('DB_NAME', 'practice'); 
 define('DB_USER','root'); 
 define('DB_PASSWORD',''); 
 $con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); $db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); if (mysqli_connect_errno($con))


 { 

 	echo "Failed to connect to MySQL: " . mysqli_connect_error(); } else { echo “Successfully connected to your database…”; 

 } 


 ?>

