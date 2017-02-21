<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/process.css" rel="stylesheet">
    <link href="css/process2.css" rel="stylesheet">
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
 <li><a href="Part02_ArtistsDataList.php?id=19">Single Artist(Part 2)</a></li>
  <li><a href="Part03_SingleWork.php?id=99&artworkid=394">Single Work(Part 3)</a></li>
  <li><a href="Part04_Search.php">Search</a></li>
  </ul>
  </li>
  </ul>
  </div>
  </div>
  <div class="container">
  ::before
  <div class="page-header">
  <h1>Search Results</h1>
  </div>
  <div class="panel panel-default">
  <div class="panel-body bg-grey">
  <form method="post" action="process.php">
  <input type="radio" name="Filter" value=1 checked>Filter by Title:<br>
  <input type="text" name="Enter" class="input"><br><br>
  <input type="radio" name="Filter" value=2>Filter by Decription:<br><br>
  <input type="radio" name="Filter" value=3>No Filter(show all artworks):<br><br>
  <button type="submit" class="btn btn-primary">Filter</button>
  </form>
  </div>
  </div>
  </div>

<?php include 'dbconnection.php' ?>

<?php
$title=$_POST['Enter'];
$desc=$_POST['Enter2'];
$radio=$_POST['Filter'];


$querystring="SELECT ArtistID,Title,Description,ImageFileName,ArtWorkID FROM artworks WHERE Title LIKE '%$title%';";
$querystring.="SELECT ArtistID,Title,Description,ImageFileName,ArtWorkID FROM artworks WHERE Description LIKE '%$desc%';";
$querystring.="SELECT ArtistID,Title,Description,ImageFileName,ArtWorkID FROM artworks;";


?>
<div class="container">
<?php if(isset($radio)){ $fbt="unchecked"; $fbd="unchecked"; ?>
<?php if($connection->multi_query($querystring)){  $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
<?php if($radio==1) { $fbt="checked"; ?>
<div class="row">
<div class="col-sm-2">
<a href="<?php echo "Part03_SingleWork.php?id=".$row['ArtistID']."&artworkid=".$row['ArtWorkID']." " ?>" class="image"><?php echo '<img src="original images/art/works/square-medium/'.$row['ImageFileName'].'.jpg" alt="'.$row['Title'].'">' ?></a>
</div>
<div class="col-sm-4">
<p class="title"><strong><?php echo '<a href="Part03_SingleWork.php?id='.$row['ArtistID'].'&artworkid='.$row["ArtWorkID"].'">'.$row['Title'].'</a>' ?></strong></p>
<p class="desc"><?php if(empty($row['Description'])) {echo '<h1>Content not present</h1>';}else {echo $row['Description'];} ?></p>
</div>
</div>
<?php }} ?>

<?php $connection->next_result(); $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
<?php if($radio==2) { $fbt="checked"; ?>
<div class="row">
<div class="col-sm-2">
<a href="<?php echo "Part03_SingleWork.php?id=".$row['ArtistID']."&artworkid=".$row['ArtWorkID']." " ?>"><?php echo '<img src="original images/art/works/square-medium/'.$row['ImageFileName'].'.jpg" alt="'.$row['Title'].'">' ?></a>
</div>
<div class="col-sm-4">
<p class="title"><strong><?php echo '<a href="Part03_SingleWork.php?id='.$row['ArtistID'].'&artworkid='.$row["ArtWorkID"].'">'.$row['Title'].'</a>' ?></strong></p>
<?php
$store=$desc;
$re="<span style='background:yellow;'>".$store."</span>";
$keywords = array($re);
$string = $row['Description'];

if(isset($keywords)) 
    {
    foreach($keywords as $word)
        {
        $pattern = $word;
        $string = str_ireplace($store,$pattern, $string);
        }
    }
?>
<p class="desc"><?php if(empty($string)) {echo '<h1>Content not present</h1>';}else {echo $string;} ?></p>
</div>
</div>
<?php }} ?>
<?php $connection->next_result(); $result=$connection->store_result(); while($row = $result->fetch_assoc()){ ?>
<?php if($radio==3) {$fbt="checked"; ?>
<div class="row">
<div class="col-sm-2">
<a href="<?php echo "Part03_SingleWork.php?id=".$row['ArtistID']."&artworkid=".$row['ArtWorkID']." " ?>"><?php echo '<img src="original images/art/works/square-medium/'.$row['ImageFileName'].'.jpg" alt="'.$row['Title'].'">' ?></a>
</div>
<div class="col-sm-4">
<p class="title"><strong><?php echo '<a href="Part03_SingleWork.php?id='.$row['ArtistID'].'&artworkid='.$row["ArtWorkID"].'">'.$row['Title'].'</a>' ?></strong></p>
<p class="desc"><?php if(empty($row['Description'])) {echo '<h1>Content not present</h1>';}else {echo $row['Description'];} ?></p>
</div>
</div>
<?php }} ?>
<?php }} ?>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


