<?php
//this links to the includes folder and the connect.php
//which allows me to connect to the database
  require_once('includes/connect.php');

 //this says if when it checks the year and it is set and is not NULL
//then the varable id is equal to year from the database
  if (isset($_GET['year'])) {
  $year= $_GET['year'];
} else {
  $year='200';// if no year is returned then the
  // default page to show will be one with year equal to 200
}

//then echo the movie variable in special characters  will return as a function
//with all the conversions made
//this helps to prevent sql injection
echo $year;
$year=htmlspecialchars($year,ENT_QUOTES, 'UTF-8');

//prepares the genre result set
// this prepares and stores the SQL statement in 
//a variable called $resultMovie
//then if the result genre :genre is like genre then 
//execute the query
$year_sql = "SELECT * FROM movies WHERE year LIKE :year";
$resultyear= $pdo -> prepare($year_sql);
$resultyear->bindValue(':year', '%' .$year.'%',PDO::PARAM_STR);
$resultyear -> execute();

//this says if when it checks the id and it is set and is not NULL
//then the varable id is equal t id from the database
if (isset($_GET['id'])) {
  $id = $_GET['id'];

} else {
  $id = 1; // if no id is returned then the
  // default page to show will be one with an id of one

}
// this is the SQL to get the movie recordset
// to select from the movies table when the id is equal
//to the id colected from before
$sql = "SELECT *  FROM movies WHERE id = :id";
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
<link rel="stylesheet" href="css/dropbutton.css" media ="screen">
<link rel="text/javascript"" href="menu.js" media ="screen">
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
		<header><div id="headercontainer"></div>
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
      <input type="text" placeholder="Search.." name="search" searchbar>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </form>
     </div>
  </div>
		
</ul>
	</nav></nav>
</div>
</header> 

<!-- i then open the genre and grid containers which contains the css styling from style.css
then i add my buttons which all have a year attatched to them which links back to the  php and 
assigns a genre to serach through the database for-->
<div class="genre-container">
	<p>select a range of years to view films from that range</p>
<t6> years</t6>
<a href="year.php?year=194" class="button">1940's</a>
<a href="year.php?year=196" class="button">1960's</a>
<a href="year.php?year=197" class="button">1970's</a>
<a href="year.php?year=198" class="button">1980's</a>
<a href="year.php?year=199"  class="button">1990's</a>
<a href="year.php?year=200"  class="button">2000's</a>
<a href="year.php?year=201"  class="button" >2010's</a>

<br>
<!-- echos the genre name, so that the user can see whta year they have selected -->
<t6><?php echo $year; ?>0</t6>

<div class="grid-container">

 <!-- this begins a php foreach loop whih states that
 for each of the results that the loops will create
 a row which will echo:
 the movie name, the movie cover image, the short synopsis, and the 
 button for linking to the film.php page -->
<?php 
foreach($resultyear as $row) 
     { 
echo '<div class="grid-item"">';
$image_name = $row['cover'];
echo '<img src="images/covers/'.$image_name.'"/>';
echo '<t7>' . $row['name'] . '</t7>'; // information title
echo '<br>';
echo '<p>'.$row['synopsisshort'] . '</p>'; // pre-formatted information to display
echo '<a href="film.php?id='.$row['id'].'" class="button button2">view</a>';
echo'</div>';
}
?>
</div>
</div> 

<!-- this adds alot of line brreaks which create space between the bottom of the form and the footer -->
<br><br><br><br><br><br>

<!-- creates a footer which spans the width of the page , before adding the styles of the bookwork and copyright links -->
<div id="footer">
	<p><span class="links"><a href="bookwork/bookwork.pdf">bookwork </a>| <a href="copyright.php">copyright&image credit</a></span>flixlist</p>
</div>
</body>
</html>