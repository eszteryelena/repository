<?php
 //this links to the includes folder and the connect.php
//which allows me to connect to the database
  require_once('includes/connect.php');

  //this creates a variable called sql 
  //which selects from the movies table in my database
  $sql = "SELECT * FROM movies ";

  // this prepares and stores the SQL statement in 
  //a variable called $resultMovie -->
  //executes the query
  $result = $pdo->prepare($sql);
  $result->execute();

//if issset($_POST['submit']) is used to check if a form has been submitted 
//prior to running the code, then the $search value is equal to this
  if (isset($_POST['search'])) {
  $search = $_POST['search'];

//Define the SQL statement that will be applied in prepare
// this is the SQL to get the search parameter
// to select from the movies table when the search is like
// the name or mainactors
$sql = "SELECT *  FROM movies WHERE (name LIKE :search OR mainactors LIKE :search) ";


// We use the bindValue method of the pdo statement object to bind a value (%search%) 
//to the parameter :search and then use the execute method to execute the query stored in $result
//prepared and stores the SQL statement in $result
$search_result = $pdo->prepare($sql); 
$search_result->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);
$search_result -> execute();

//if not the query will echo the top/most of the webpage so that they appear the same
// and post that there were no search results found
} else {
 echo '<!doctype html>'; echo '<html lang="en">'; echo '<head>';
echo'<title>','flixlist','</title>';
echo '<meta name="description" content="blank">'; echo '<meta name="author" content="Your Name">'; echo '<link rel="stylesheet" href="css/style.css" media ="screen">'; echo '<link rel="text/javascript"" href="menu.js" media ="screen">'; echo'<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">';
echo'</head>'; echo'<body>'; echo'<header>'; echo'<div id="headercontainer">';echo '</div>'; echo '<div class="centerednav">';
echo'<nav>'; echo'<nav class = "stroke">'; echo' <script src="menu.js">'; echo'</script>'; echo'<div id="logo">'; echo' <h1>flixlist</h1>'; echo' </div>';
   echo' <label for="drop" class="toggle"><t2>menu</t2></label>';
    echo'<input type="checkbox" id="drop"/>';
   echo' <ul class="menu">';     
    echo'<li>','<a href="index.php">home</a>','</li>' ; echo '<li>','<a href="genre.php">by genre</a>','</li> '; echo '<li>','<a href="year.php">by year</a>','</li> '; echo '<li>','<a href="add_input.php">add a review</a>','</li>'; echo'<li>','<div class="searchcontainer">'; echo'<form action="search_result.php">'; echo '<input type="text" placeholder="Search.." name="search" searchbar>'; echo'<button type="submit"><i class="fa fa-search"></i></button>';
   echo '</form>'; echo '</div>'; echo '</div>'; echo '</ul>'; echo'</nav>'; echo'</nav>'; echo'</div>'; echo'</header>' ;
echo'<div class="genre-container">';

  echo '<t6>', 'search results', '</t6><br>';
  echo 'no results found, please return to the home page and enter a search query';
  echo '<div id="footer">'; echo'<p>','<span class="links"><a href="/">bookwork </a>| <a href="copyright.php">copyright&image credit</a></span>flixlist', '</p>';
echo '</div>';
  
//then exit the search query
  exit;
}
?>

<!-- this opens the html tag, and the head tag -->
<!doctype html>
<html lang="en">
<head>
<title>flixlist</title>

<!-- between the head tags I have placed the links which link the php page to other style sheets
and code. firstly i link my css page, and specify the media as screen
then I connect to three of the different fonts used throughout my website
then I have linked to the font awesome page, which gives me access to icons
and then i link to my javascript page -->
<meta name="description" content="blank">
<meta name="author" content="Your Name">
<link rel="stylesheet" href="css/style.css" media ="screen">
<link rel="text/javascript" href="menu.js" media ="screen">
<!-- <link rel="stylesheet" href="css/print.css" media ="print"> -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- closes the head tag and opens the body tag -->
</head><body>

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
  </nav></nav>
</div>
</header> 

<!-- i then open the genre and grid containers which contains the css styling from style.css-->
<div class="genre-container">

<t6>search results for: <?php echo $search; ?></t6>
    <p>Please click one of the films below for more detailed information</p>
<div class="grid-container">

  <!-- this begins a php foreach loop whih states that
 for each of the results that the loops will create
 a row which will echo:
 the movie name, the movie cover image, the short synopsis, and the 
 button for linking to the film.php page -->
    <?php 
    foreach($search_result as $row){ 
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
?> <?php } ?> 

</div></div>

<!-- this adds alot of line brreaks which create space between the bottom of the form and the footer -->
<br><br><br><br><br><br>

<!-- creates a footer which spans the width of the page , before adding the styles of the bookwork and copyright links -->
  <div id="footer">
<p><span class="links"><a href="bookwork/bookwork.pdf">bookwork </a>| <a href="copyright.php">copyright&image credit</a></span>flixlist</p>
</div>
</body>
</html>