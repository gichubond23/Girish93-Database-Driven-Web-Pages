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


$querystring="SELECT Title,Description FROM artworks WHERE Title LIKE '%girl%' LIMIT 1;";
$querystring.="SELECT Title,Description FROM artworks WHERE Description LIKE '%medici%' LIMIT 1";


if($connection->multi_query($querystring)){  
$result=$connection->store_result();
while($row = $result->fetch_assoc())
{
echo $row['Title'];
}
echo '<br>';
$connection->next_result();
$result=$connection->store_result();
while($row = $result->fetch_assoc())
{
$store="Medici";
$replace="<mark>".$store."</mark>";
$keywords = array($replace);
$string = $row['Description'];
 

if(isset($keywords)) // For keyword search this will highlight all keywords in the results.
    {
    foreach($keywords as $word)
        {
        $pattern = $word;
        $string = str_replace($store,$pattern, $string);

        }
    }
 // We mecho ust compare the original string to the string altered in the loop to avoid having a string printed with no matches.

    echo $string;
   
    
    
}
}
?>
