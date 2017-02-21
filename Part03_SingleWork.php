<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/Part03_ArtistsDataList.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="navbar-header">
  <a class="navbar-brand" href="#">Assign 1</a>
  </div>
  <div class="navbar-collapse collapse">
  <form class = "navbar-form navbar-right" method="get" action="Part04_Search.php?Type=title">
  <div class="form-group">
  <a class="navbar-brand" href="#">Your Name Here</a>
  <input type="text" placeholder="Search Paintings" class="form-class" name="title">
  <button type="submit" class="btn btn-primary">Search</button>
  </div>
  </form>

  <ul class="nav navbar-nav navbar-left">
  <li><a href="default.php">Home</a></li>
  <li class="active"><a href="about.php">About Us</a></li>
  <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages<b class="caret"></b></a>
  <ul class="dropdown-menu">
  <li><a href="Part01_ArtistsDataList.php">Artists Data List(Part 1)</a></li>
  <li><a href="Part02_ArtistsDataList.php?id=19">Single Artist(Part 2)</a></li>
  <li><a href="Part03_SingleWork.php?id=99&artworkid=394">Single Work(Part 3)</a></li>
  <li><a href="Part04_Search.php">Search</a></li>
  </ul>
  </li>
  </ul>
  </div>
  </div>
  <?php
  $dbhost='localhost';
  $username='root';
  $password=''; //DB password here  
  $dbname=''; //DB name here

  $connection=new mysqli("$dbhost","$username","$password","$dbname");
  mysqli_select_db($connection,"artist");

  if($connection->connect_error)
  {
  	die("Connection Failed:".$connection->connect_error);
  }
$querystring="SELECT a.ArtistID,a.LastName,b.Description,b.YearOfWork,b.Medium,b.Title,b.OriginalHome,b.Width,b.Height,b.Cost,b.ImageFileName,b.ArtWorkID FROM artists a,artworks b WHERE a.ArtistID=".$_GET['id']." AND b.ArtWorkID=".$_GET['artworkid']." AND a.ArtistID=b.ArtistID;";
$querystring.="SELECT g.GenreName FROM artworks b,genres g,artworkgenres f WHERE b.ArtWorkID=f.ArtWorkID AND g.GenreID=f.GenreID AND 
b.ArtWorkID=".$_GET['artworkid'].";";
$querystring.="SELECT s.SubjectName FROM artworks b,subjects s,artworksubjects f WHERE b.ArtWorkID=f.ArtWorkID AND s.SubjectId=f.SubjectID AND b.ArtWorkID=".$_GET['artworkid'].";";
$querystring.="SELECT c.DateCompleted FROM orders c,orderdetails f,artworks b WHERE f.ArtWorkID=b.ArtWorkID AND c.OrderID=f.OrderID AND 
b.ArtWorkID=".$_GET['artworkid']." LIMIT 4;";
  
?>

<div class="container">
::before
<div class="page-header">
<?php if($connection->multi_query($querystring)){  $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
 <?php if(empty($_GET['id'])||$_GET['id']!=$row['ArtistID']||empty($_GET['artworkid'])||$_GET['artworkid']!=$row['ArtWorkID'])
  {
    header('Location:Error.php');
  } ?>
<h1><?php echo $row['Title'] ?></h1>
</div>
<div class="col-sm-4">
<h6>By <?php echo '<a href="Part02_ArtistsDataList.php?id='.$row['ArtistID'].'">' .$row['LastName'].'</a>'?></h6>
<a href="#image" data-toggle="modal"><?php echo  '<img src="original images/art/works/medium/'.$row['ImageFileName'].'.jpg" class="img-thumbnail" alt="'.$row["Title"].'">' ?></a>
</div>
<div class="col-sm-4">
<p class="desc"><?php if(empty($row['Description'])) {echo '<h1>Content not present</h1>';}else {echo $row['Description'];} ?></p>
<p class="price"><strong><?php echo "$".number_format($row['Cost'],2); ?></strong></p>
<p class="button"><a href="#" class="btn btn-default"><span class="glyphicon glyphicon-gift"></span> Add to Wish List</a>
<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span> Add to Shopping Cart</a></p><br>
<div class="firstpanel">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Product Details</h3>
</div>
<table class="table table-bordered table-striped">
<tbody>
<tr>
<td><strong>Date:</strong></td>
<td><?php echo $row['YearOfWork'] ?></td>
</tr>
<tr>
<td><strong>Medium:</strong></td>
<td><?php echo $row['Medium']?></td>
</tr>
<tr>
<td><strong>Dimensions:</strong></td>
<td><?php echo $row['Width']."cm"." "."x"." ".$row['Height']."cm" ?></td>
</tr>
<tr>
<td><strong>Home:</strong></td>
<td><?php echo $row['OriginalHome'] ?></td>
</tr>
<?php }?>
<tr>
<td><strong><p>Genres:</strong></td>
<td>
<?php $connection->next_result(); $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
<?php echo '<a href="#">'.$row['GenreName'].'</a>' ?><br>
<?php }?>
</td>
</tr>
<tr>
<td><strong>Subjects:</strong></td>
<td><?php $connection->next_result(); $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
<?php echo '<a href="#">'.$row['SubjectName'].'</a>' ?><br>
<?php }?>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="secondpanel">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Sales</h3>
</div>
<div class="panel-body">
<?php $connection->next_result(); $result=$connection->store_result(); 
if(mysqli_num_rows($result)==0){
echo '<h1>no sales</h1>';
}
else{
 while($row = $result->fetch_assoc()){
echo '<a href="#">'.date("d/m/y",strtotime($row['DateCompleted'])).'</a><br><br>';
}
}
?>
<?php }?>
</div>
</div>
</div>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<div class="modal fade" id="image" role="dialog">
  <div class="modal-dialog">
     <div class="modal-content">
     <?php if($connection->multi_query($querystring)){ $result=$connection->store_result(); while($row=$result->fetch_assoc()){  ?>
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="close">
         <span aria-hidden="true">&times;</span>
         </button>
         <h4><?php echo $row['Title']."(".$row['YearOfWork'].")"." by ".$row['LastName'] ?></h4>
      </div>
<div class="thumbnail text-center">
<?php echo  '<img src="original images/art/works/medium/'.$row['ImageFileName'].'.jpg" width=100%   alt="'.$row["Title"].'">' ?>
   </div>
    <?php }} ?>
   
<div class="modal-footer">
     <a class="btn btn-default" data-dismiss="modal">Close</a>
     </div>
     </div>
     </div>
     </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>