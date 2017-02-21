<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/Part02_ArtistsDataListnew.css" rel="stylesheet">
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
  <form class = "navbar-form navbar-right" method="post" action="navbarform.php">
  <div class="form-group">
  <a class="navbar-brand" href="#">Your Name Here</a>
  <input type="text" placeholder="Search Paintings" class="form-class" name="Type">
  <button-type="submit" class="btn btn-primary">Search</button>
  </div>
  </form>

  <ul class="nav navbar-nav navbar-left">
  <li><a href="default.php">Home</a></li>
  <li class="active"><a href="about.php">About Us</a></li>
  <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages<b class="caret"></b></a>
  <ul class="dropdown-menu">
  <li><a href="Part01_ArtistsDataList.php">Artists Data List(Part 1)</a></li>
  <li><a href="Part01_ArtistsDataList.php">Single Artist(Part 2)</a></li>
  <li><a href="Part01_ArtistsDataList.php">Single Work(Part 3)</a></li>
  <li><a href="Part04_Search.php">Search</a></li>
  </ul>
  </li>
  </ul>
  </div>
  </div>
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
  
$querystring="SELECT a.FirstName,a.LastName,a.ArtistID,a.Details,a.YearOfBirth,a.YearOfDeath,a.Nationality,a.ArtistLink FROM artists a WHERE a.ArtistID=5;";
$querystring.="SELECT b.ImageFileName,b.Title,b.YearOfWork,b.ArtistID,b.ArtWorkID FROM artworks b WHERE b.ArtistID=5;";
  
  
  

  


?>
  <div class="container">
  ::before
  <div class="page-header">
  <?php if($connection->multi_query($querystring)){ $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
  <h1><?php echo $row['FirstName']." ".$row['LastName'] ?></h1>
  </div>
  <div class="col-sm-4">
  <?php echo  '<img src="original images/art/artists/medium/'.$row['ArtistID'].'.jpg" class="img-thumbnail" alt="'.$row["FirstName"]." ".$row["LastName"].'">' ?>
  <p class="para"><?php if(empty($row['Details'])) {echo '<h1>Content not present</h1>';}else {echo $row['Details'];} ?></p>
  <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-heart"></span> Add to Favourites List</a>
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title"><strong>Artist Details<strong></h3>
  </div>
  <table class="table table-bordered table-striped">
  <tbody>
  <tr>
  <td><strong>Date:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['YearOfBirth']."-".$row['YearOfDeath'] ?></td>
  </tr>
  <tr>
  <td><strong>Nationality:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['Nationality'] ?></td>
  </tr>
  <tr>
  <td class="detail"><strong>More Info:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<a href="http://en.wikipedia.org/wiki/Van_Gogh">'.$row['ArtistLink'].'</a>' ?></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  


  <div class="container">
 
  <h3 class="Artby"><?php echo "Art By"." ".$row['FirstName']." ".$row['LastName'] ?></h3>
  
  <?php } ?>
  <?php $connection->next_result(); $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
  <div class="col-md-3">
  <div class="thumbnail text-center" >
  <div class="img-thumbnail" text-align="center">
  <a href="<?php echo "Part03_SingleWork.php?id=".$row['ArtistID']."&artworkid=".$row['ArtWorkID']." " ?>"><?php echo '<img src="original images/art/works/square-medium/'.$row['ImageFileName'].'.jpg">' ?></a>
  </div>
  <p><a href="<?php echo "Part03_SingleWork.php?id=".$row['ArtistID']."&artworkid=".$row['ArtWorkID']." " ?>"><?php echo $row['Title'].","." ".$row['YearOfWork'] ?></a></p>
  <a href="<?php echo "Part03_SingleWork.php?id=".$row['ArtistID']."&artworkid=".$row['ArtWorkID']." " ?>" class="btn btn-primary"><span class="glyphicon glyphicon-info-sign"></span> View</a>
  <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-gift"></span> Wish</a>
  <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a>
  </div>
  </div>
  <?php }} ?>
  </div>
  </div>
 



   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 </body>
</html>