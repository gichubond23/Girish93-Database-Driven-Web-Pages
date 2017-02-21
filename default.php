<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class = "navbar navbar-inverse navbar-fixed-top" role= "navigation">
    <div class = "navbar-header">
    <a class = "navbar-brand" href = "#">Assign 1</a>
    </div>
    <div class = "navbar-collapse collapse">
    <form class = "navbar-form navbar-right" method="get" action="Part04_Search.php?Type=title">
    <div class = "form-group">
    <a class = "navbar-brand" href = "#">Your Name Here</a>
    <input type = "text" placeholder="Search Paintings" class="form-class" name="title">
  <button type="submit" class="btn btn-primary">Search</button>
    </div>
    
    </form>
   
    <ul class = "nav navbar-nav navbar-left">
        <li class = "active"><a href = "default.php">Home</a></li>
        <li><a href = "about.php">About Us</a></li>
        <li class = "dropdown">
        <a href= "#" class= "dropdown-toggle" data-toggle = "dropdown">Pages<b class = "caret"></b> </a>
        <ul class = "dropdown-menu">
        <li><a href = "Part01_ArtistsDataList.php">Artists Data List(Part 1)</a></li>
       <li><a href="Part02_ArtistsDataList.php?id=19">Single Artist(Part 2)</a></li>
  <li><a href="Part03_SingleWork.php?id=99&artworkid=394">Single Work(Part 3)</a></li>
        <li><a href = "Part04_Search.php">Search</a></li>
        </ul>
        </li>
        </ul>
        </div>
        </div>
   <div class = "jumbotron">
   <h1>Welcome to Project #3</h1>
   <p>This is the third project for Your Name Here for Your Course Here</p>
   </div>
   <div class = "row">
   <div class = "col-md-2">
     <h3><span class = "glyphicon glyphicon-info-sign"></span> About Us</h3>
     <p>What this is all about and other stuff</p>
     <a href="about.php" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</a>
     </div>
     <div class = "col-md-2">
     <h3><span class = "glyphicon glyphicon-list"></span> Artist List</h3>
     <p>Displays a list of artist names as links</p>
     <a href="Part01_ArtistsDataList.php" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</a>
     </div>
     <div class = "col-md-2">
     <h3><span class = "glyphicon glyphicon-user"></span> Single Artist</h3>
     <p>Displays information for a single artist</p>
     <a href="Part02_ArtistsDataList.php?id=19" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</a>
     </div>
     <div class = "col-md-2">
     <h3><span class = "glyphicon glyphicon-picture"></span> Single Work</h3>
     <p>Displays information for a single work</p>
     <a href="Part03_SingleWork.php?id=99&artworkid=394" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</a>
     </div>
     <div class = "col-md-2">
     <h3><span class = "glyphicon glyphicon-search"></span> Search</h3>
     <p>Perform search on ArtWorks Tables</p>
     <a href="Part04_Search.php" class="btn btn-default"><span class="glyphicon glyphicon-link"></span>Visit Page</a>
     </div>
     </div> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>