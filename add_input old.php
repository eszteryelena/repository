<?php
//set all values of the form to empty 
$movie=$reviewername=$rating=$review="";

//set all error messages to empty
$movieErr=$reviewernameErr=$ratingErr=$reviewErr="";

//connect to the database
require_once('includes/connect.php');
//check to see if form has been submitted, if not the blank entries will be displayed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // form was submitted, place data into appropriate variables
  $movie = $_POST["movie"];
  $reviewername = $_POST["reviewername"];
  $rating = $_POST["rating"];
  $review = $_POST["review"];

  // check if activity contains only letters and whitespace
      if (!preg_match("/^[a-zA-Z]*$/",$movie)) {
       $movieErr = "Only letters and white space allowed"; 
        }
// check if website URL is valid 
    if (!preg_match("/^[1-9][0-9]{0,15}$/",$rating)) {
      $ratingErr = "Invalid rating"; 


if($movieErr=="" && $ratingErr== "" ){
  try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert data into activity table using prepare statements
$sql = "INSERT INTO reviews (movie,reviewername,review,rating) VALUES (:movie, :reviewername, :review, :rating)";
     //prepare query for excecution and bind the parameters
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':movie', $movie);
        $stmt->bindParam(':reviewername', $reviewername);
        $stmt->bindParam(':review', $review);
        $stmt->bindParam(':rating', $rating);
      // Execute the query
        $stmt ->execute();


       //echo the number of affected rows, if $count is 1 the record (row) was successfully inserted
        $count = $stmt->rowCount();
        if($count == 1){
          echo "record added to database";
        }
        


    // close the database connection 
    $pdo = null;
  }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
 }}
?>

<!DOCTYPE HTML>
<html>  
<head>

<link rel="stylesheet" href="css/style.css" media ="screen">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css" media ="screen">
<link rel="text/javascript"" href="menu.js" media ="screen">

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
      <li><a href="add_review.php">add a review</a></li>  
      <li>  <div class="searchcontainer">
    <div class="searchcontent"><i class="fas fa-search"></i>
      <input type="search" placeholder="Search flixlist"/>
    </div>
  </div>
    </ul>
  </nav></nav>
</div>
</header> 
<img src="images/c.png" id="grad" alt="">

 <div class="centered">
<div id= "addr-container">
<!-- value="?php echo $movie;?" is code to retain what the user enters so they don’t have to re enter it all over again. -->
<!-- ?php echo $movieErr; ? is code to display the error messages for an invalid entry.-->
<h3><pre><i class="fas fa-pen"></i>   <i class="fas fa-arrow-right"></i>   <i class="fas fa-mouse-pointer"></i>   <i class="fas fa-arrow-right"></i>   <i class="fas fa-check-square"></i></pre></h3>

<h3>add your review</h3>
<h4>fill out the form below</h4>
<br>
<form method="post" action="add_input.php">
<h5>movie:</h5><br>
<input type="text" name="movie" placeholder ="movie name" value="<?php echo $movie;?>" required> <?php echo $movieErr;?> <br>

<h5> Enter Your Name: </h5><br>
<input type="text" name="reviewername"  placeholder ="enter your name" value="<?php echo $reviewername?>" required> <?php echo $movieErr;?> <br>

<h5>Review: </h5><br>
<textarea name="review" rows = "10" columns ="100" placeholder ="enter your review of the movie, say whatever you like!" required> <?php echo $review;?> </textarea><br>

<h5>rating:</h5> <br><input type="number" name="rating" value="<?php echo $rating;?>"  placeholder ="what do you rate the movie out of five?" size ="50" min="1" max="5" required ><?php echo $ratingErr; ?><br>

<?php } ?> 
<br>
<br>
<input type="submit" value ="submit" class="button">
</form>
</div>
</div>
</body>
</html>