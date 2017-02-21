<?php
$dbhost='localhost';
$username='root';
$password='';//Your DB password here
$dbname='';//Your Database name here

$connection=new mysqli("$dbhost","$username","$password","$dbname");

mysqli_select_db($connection,"artist");
if($connection->connect_error)
{
	die("Connection Failed".$connection->connect_error);
}
?>