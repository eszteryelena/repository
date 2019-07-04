<?php
  //this links to the includes folder and the connect.php
//which allows me to connect to the database
  require_once('includes/connect.php');

  //this creates a variable called sql 
  //which selects from the movies table in my database
  $sql = "SELECT * FROM movies ";
  $result = $pdo->prepare($sql);
 
  // this prepares and stores the SQL statement in 
  //a variable called $result -->
  $result->execute();
?>

<!-- this opens the html tag, and the head tag -->
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- between the head tags I have placed the links which link the php page to other style sheets
and code. firstly i link my css page, and specify the media as screen
then I connect to three of the different fonts used throughout my website
then I have linked to the font awesome page, which gives me access to icons
and then i link to my javascript page -->
<title>flixlist</title>
<meta name="description" content="blank">
<meta name="author" content="Your Name">
<link rel="stylesheet" href="css/style.css" media ="screen">
<link rel="text/javascript"" href="menu.js" media ="screen">
<!-- <link rel="stylesheet" href="css/print.css" media ="print"> -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- closes the head tag and opens the body tag -->
</head>
<body>

	<!-- opens my header and creates the header container before coosing the div
then the navigation is begun, opening the class as stroke
which links to the underline properties specifies in my css
then i open ,the javascript for my menu which allows the menu buttons to be
underlined, i then class the fix list at te begining as a logo,
so that it doesnt have to obey the same navigational properties as the rest
of my navigation, and connect it to the h1 style
i then place my toggle in my menu which creates the menu drop down button 
when the screen is smaller than a certain size and then open the checkbox
and drop down menus so that it is possible for them to appear
afterwards i open  the rest of the ul as navigation links
then i link to my search container, and the mehod as post, after specifying 
the properties and create a form action which connect to the search php,
i then close the form and the nav and the header-->
	<div id ="headercontainer">
		<header><img src="images/c.png">
		  <div class="centerednav">
		  
<nav>
	<nav class = "stroke">
		<script src="menu.js"></script>
		<div id="logo"><h1>flixlist</h1></div>
		<label for="drop" class="toggle"><t2>menu</t2></label>
		<input type="checkbox" id="drop"/>
		<ul class="menu">					
			<li><a href="index.php" >home</a></li> 
			<li><a href="genre.php">by genre</a></li> 
			<li><a href="year.php">by year</a></li> 
				<li><a href="add_input.php">add a review</a></li> 
			<li>  <div class="searchcontainer">
       <form action="search_result.php" method ="post">
      <input type="text" placeholder="Search.." name="search" id="searchForm" searchbar>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </form>
    </div>
  </div>
		</ul>
	</nav></nav>
</div>

<!-- opens the centered div -->
<div class="centered">
<h2> welcome</h2>
<hr>
<br><t1>Welcome to Flixlist! We hope to help you decide on the next movie that you'll watch. So feel free to search, filter, browse or review our films!  </t1>
<br><br><br>

<!-- this used the aherf tags to create an anchor element the top tag links to when the button is pressed
to the a name tag -->
<h1><a href="#top"><i class="fas fa-arrow-circle-down"></i></a></h1>
</header>
</div>
<a name ="top"></a>
<!-- includes the php files which are in my includes for the randomly generated featured films -->
<?php include('includes/featured1.php'); ?>
<?php include('includes/featured2.php'); ?>
	
</div>
</div>
<!-- creates a footer which spans the width of the page , before adding the styles of the bookwork and copyright links -->
<div id="footer">
	<p><span class="links"><a href="bookwork/bookwork.pdf">bookwork </a>| <a href="copyright.php">copyright&image credit</a></span>flixlist</p>
</div>
</body>
</html>