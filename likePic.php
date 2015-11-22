<?php
$host = 'localhost';
$user = 'root';
$pass = 'ashiva';

mysql_connect($host, $user, $pass);

mysql_select_db('demo');
$img_id=$_POST['id'];
$query="update image_table set like_counter= like_counter+1 where image_id='$img_id'";
$var=mysql_query($query);
$query1="select * from image_table where image_id='$img_id'";	
$result=mysql_query($query1);
$row=mysql_fetch_array($result);
echo $row['like_counter'];
//echo $_POST['id']
?>