<?php
  require_once('includes/connect.php');
  $result = $pdo->prepare($sql);

  if (!$_POST['search']) {
	echo 'please return to the home page and enter a search query';
	exit;
} else {
	$search=$_POST['search'];

$sql = "SELECT *  FROM movies WHERE (name LIKE :search OR  synopsisshort LIKE :search) ";
$search_result = $pdo->prepare($sql);  //prepares and stores the SQL statement in $result
/*we use the bindValue method of the pdo statement object to bind a value (%swimming%) 
to the parameter :search and then use the execute method to execute the query stored in $result */
$search_result->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
$search_result -> execute();
// this gets the theme that was passed in the URL and places it in $link

if (isset($_GET['id'])) {
  $id = $_GET['id'];

} else {
  $id = 1; // the default page to show

}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>tile here</title>
<meta name="description" content="blank">
<meta name="author" content="Your Name">
<link rel="stylesheet" href="css/style.css" media ="screen">
<link rel="text/javascript" href="menu.js" media ="screen">
<!-- <link rel="stylesheet" href="css/print.css" media ="print"> -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
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
			 <li><a href="film.php">link4</a></li> 
			<li>  <div class="searchcontainer">
    <form action="search_result.php" method="post" id="searchform">
    <div class="searchcontent"><input type="submit" i class="fas fa-search" name="submit" value ="fas fa-search"></i>
      <input type="text" placeholder="Search flixlist"/>
  </form>
  </div>
  </div>
		</ul>
	</nav></nav>
</div>
</header> 
<div class="genre-container">
	<p>select a genre to view films of the genre</p>
<t6>search results</t6>
    <h2>Search Results</h2>
		<p>Please click a link for more detailed information</p>
		<ul>
		<?php
		// Parse the result set
		foreach($search_result as $row) { 
echo $row['name'];
// echo '<div class="grid-item">';
// echo '<img src="images/covers/'.$row['cover'].'"/>';
// echo '<t7>' . $row['name'] . '</t7>'; // information title
// echo '<br>';
// echo '<p>'.$row['synopsisshort'] . '</p>'; // pre-formatted information to display
// echo '<a href="film.php?id='.$row['id'].'" class="button button2">view</a>';
// echo'</div>';
}
			?>


<!-- while ($row = PDO_fetch_array($r_query)){  
echo '<div class="grid-item"">';
$image_name = $row['cover'];
echo '<img src="images/covers/'.$image_name.'"/>';
echo '<t7>' . $row['name'] . '</t7>'; // information title
echo '<br>';
echo '<p>'.$row['synopsisshort'] . '</p>'; // pre-formatted information to display
echo '<a href="film.php?id='.$row['id'].'" class="button button2">view</a>';
echo'</div>';
}
?> -->
  </div>
</div>
	<footer>
	</footer>
</div>
</div>
</div>
    </body>
</html>