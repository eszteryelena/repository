<!-- this opens a php  tag so that it is possible to code with php -->
<?php

//this sets all values of the form to empty, and introduces 
//the movie, review, rating and reviewer name variables 
$movie=$review=$rating=$reviewername="";

//this set all error messages to empty and introduces
//the movieErr, reviewErr, ratingErr and reviewerErr name variables 
$movieErr=$reviewErr=$ratingErr=$reviewernameErr="";

//this links to the includes folder and the connect.php
//which allows me to connect to the database
require_once('includes/connect.php');

//this determines whether the request was a POST or GET request. 
// in thi case it is a post request  and 
// can help determine whether to parse incoming parameters $_POST.
//and checks to see if form has been submitted, if not the blank entries will be displayed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// if the form was submitted, data is placed into appropriate variables
	$movie = ($_POST["movie"]);
    $reviewername =($_POST["reviewername"]);
	$review = $_POST["review"];
	$rating = ($_POST["rating"]);

//this checks if the movie input contains only letters and whitespace
    if (!preg_match("/^[a-z0-9 .]*$/",$movie)) {
       $movieErr = "Try again. Only letters, numbers and white space are allowed."; 
        }

//this checks if the reviewrname input contains only letters
    if (!preg_match("/^[a-zA-Z .]+$/",$reviewername)) {
	   $reviewernameErr = "Try again. Only letters and white space are allowed."; 
	        }
//this checks if the rating is a number between one and nine
    if (!preg_match("/^[0-9 \-]+$/",$rating)) {
      $ratingErr = "Invalid Rating"; 
  	}

//this says if there is a movie error or a rating error then set the PDO 
//error mode to exception 
if($ratingErr== "" && $movieErr == ""){
	try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//this runs a sql statement which then inserts the data into movie table using 
//prepare statements
$sql = "INSERT INTO reviews (movie,reviewername,review,rating) VALUES (:movie, :reviewername, :review, :rating)";
     //this prepares a query for excecution and bind the parameter
     // to the movie, review, reviewername, rating variables
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':movie', $movie);
        $stmt->bindParam(':reviewername', $reviewername);
        $stmt->bindParam(':review', $review);
        $stmt->bindParam(':rating', $rating);

     // this then executes the query
        $stmt ->execute();


     //this echos the number of affected rows, 
     //if $count is 1 the record (row) was successfully inserted
        $count = $stmt->rowCount();
        if($count == 1){
        	echo "record added to database";
        }
        


    // this then closes the database connection 
    $pdo = null;
	}
   	catch(PDOException $e)
    {
    echo $e->getMessage();
    }
 }}

?>

<!-- this opens the html tag, and the head tag -->
<!DOCTYPE HTML>
<html>  
<head>

<!-- between the head tags I have placed the links which link the php page to other style sheets
and code. firstly i link my css page, and specify the media as screen
then I connect to three of the different fonts used throughout my website
then I have linked to the font awesome page, which gives me access to icons
and then i link to my javascript page -->
<link rel="stylesheet" href="css/style.css" media ="screen">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="text/javascript"" href="menu.js" media ="screen">

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
</div>
  </div>
    </ul>
  </nav></nav>
</div>
</header> 

<!-- this is the image which is in the background and gives it the gradient id and an alt tag 
to say what the image is -->
<img src="images/c.png" id="grad" alt="background gradient">

<!-- opens the centered and addr-container divs i then add some icons at the images 
at the top  of the page -->
 <div class="centered">
<div id= "addr-container">
<h3><pre><i class="fas fa-pen"></i>   <i class="fas fa-arrow-right"></i>   <i class="fas fa-mouse-pointer"></i>   <i class="fas fa-arrow-right"></i>   <i class="fas fa-check-square"></i></pre></h3>

<!-- this begins the input of the container opeening the h3 text and creates a post 
form method so that the results will be posted back to the database  -->
<h3>add your review</h3>
<h4>fill out the form below</h4>
<br>
<form method="post" action="add_input.php">
<h5>movie:</h5><br>
<!-- this declares the input type as text, then the value to echo the movie variable and then echos the movie error if
the wrong input is placed in/ makes sure that the input is required -->
<input type="text" name="movie"  value="<?php echo $movie?>" placeholder ="movie name" required> <?php echo $movieErr;?> <br>


<h5> Enter Your Name: </h5><br>
<!-- this declares the input type as text, then the value to echo the reviewername variable and then echos the reviewername if
the wrong input is placed in/ makes sure that the input is required -->
<input type="text" name="reviewername" rows = "1" columns ="100" placeholder ="enter your name" value="<?php echo $reviewername;?>" required> <?php echo $reviewernameErr?> <br>


<h5>Review: </h5><br>
<!-- this declares the input type as text, then the value to echo the review variable aand opens the text area  -->
<textarea name="review" rows = "10" columns ="100" 
placeholder ="enter your review of the movie, say whatever you like!" value="<?php echo $review;?>" required> <?php echo $movieErr;?> </textarea><br>

<h5>rating out of five:</h5>
<!-- this declares the input type as text, then the value to echo the rating variable and echos the rating error 
the wrong input is placed in/ makes sure that the input is required -->
 <br><input type="number" name="rating" value="<?php echo $rating;?>"  min="1" max="5" placeholder ="1" size ="50" required ><?php echo $ratingErr; ?><br>


<br>
<br>
<!-- creates a submit button which links back to the database -->
<input type="submit" value ="submit" class="button">
</form>

<!-- this adds alot of line brreaks which create space between the bottom of the form and the footer -->
</div><br><br><br><br><br><br><br><br></div>
<div id="footer">
	<!-- creates a footer which spans the width of the page , before adding the styles of the bookwork and copyright links -->
<p><span class="links"><a href="bookwork/bookwork.pdf">bookwork </a>| <a href="copyright.php">copyright&image credit</a></span>flixlist</p>
</div>
</body>
</html>