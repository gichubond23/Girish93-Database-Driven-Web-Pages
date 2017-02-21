<?php
  $dbhost='localhost';
  $username='root';
  $password='';//DB password here
  $dbname='';//DB name here

  $connection=new mysqli("$dbhost","$username","$password","$dbname");
  mysqli_select_db($connection,"artist");
  if($connection->connect_error)
  {
  	die("Connection Failed:".$connection->connect_error);
  }
  $querystring="SELECT c.DateCompleted,f.ArtWorkID,f.OrderID FROM orders c,orderdetails f,artworks b WHERE f.ArtWorkID=b.ArtWorkID AND c.OrderID=f.OrderID AND 
b.ArtWorkID=120;";
  
if($connection->multi_query($querystring))
{
$result=$connection->store_result();
if (mysqli_num_rows($result)==0){
echo "null";
}
else
{
while($row =$result->fetch_assoc()){
echo $row['DateCompleted'];
}
}
}
?>