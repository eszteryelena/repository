<?php
//this links to the includes folder and the connect.php
//which allows me to connect to the database
  require_once('includes/connect.php');

  //this creates a variable called sql 
  //which selects from the credit table in my database
  $sql = "SELECT * FROM credit ";

  // this prepares and stores the SQL statement in 
  //a variable called $result -->
  $result = $pdo->prepare($sql);

  //this then executes the result
  $result->execute();
?>

<!-- this opens the html tag, and the head tag -->
<!doctype html>
<html lang="en">
<head>

<!-- between the head tags I have placed the links which link the php page to other style sheets
and code. firstly i link my css page, and specify the media as screen
then I connect to three of the different fonts used throughout my website
then I have linked to the font awesome page, which gives me access to icons
and then i link to my javascript page -->
<meta charset="utf-8">
<title>flixlist</title>
<meta name="description" content="blank">
<meta name="author" content="Your Name">
<link rel="stylesheet" href="css/style.css" media ="screen">
<link rel="text/javascript" href="menu.js" media ="screen">
<!-- <link rel="stylesheet" href="css/print.css" media ="print"> -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i&display=swap" rel="stylesheet">
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

<!-- then the genre container is opened and inside i have placed the information 
and have opened styled containers such as the italics containers and then i have styled the 
titles and text -->
<div class="genre-container">
<t6>Copyright Fair Use</t6><br>
It is an important mention of the struggle that it took to find images for a movie website. If you reload the front page, you may notice a change in the featured film. These banners are where the problem began. Well it is possible to find some non-copyright sources of images, it was impossible to find others, or even some that looked like they could be from that film. In the end, I realised that my website would come under fair-use. Fair use is to allow for limited and reasonable uses as long as the use does not interfere with owners’ rights or impede their right to do with the work as they wish. However, there are limits and only a court has the final decision-making ability. Section 107 of the Copyright Act states:<br><br>
 <div id="italicscontainer"><t13><i>"the fair use of a copyrighted work, including such use by reproduction in copies or
phone records or by any other means specified by that section, for purposes such as
criticism, comment, news reporting, teaching (including multiple copies for classroom
use), scholarship, or research, is not an infringement of copyright."</t13></i></div><br>
So because my website is a review website, it is likely that the content does
come under fair use.<br><br>
<t6>Gifs and Copyright Law</t6><br>
According to Forbes:<br>
<div id="italicscontainer"><t13><i>“The trouble lies in using someone else’s original content to create and
share a GIF. This usage undermines the copyright owner’s ability to
control derivatives of their work, where or how their work is shared, and
their right to receive proceeds.”</t13></i></div><br>
According to Pete Van Valkenburg<br>
<div id="italicscontainer"><t13><i>“The trouble lies in using someone else’s original content to create and
share a GIF. This usage undermines the copyright owner’s ability to
control derivatives of their work, where or how their work is shared, and
their right to receive proceeds.”</t13></i></div><br>
<br>
The Fair use of a GIF is determined by not only by the essence of the GIF, but also by the creator and what its intended purpose was. In general something can come under fair use when the original material is used for a limited and "transformative" purpose, such as commentary, criticism or parody. The reviews on my website count as criticism, although that is different from the GIF’s purpose. According to Jeff John Roberts of Fortune: <br>
<div id="italicscontainer"><t13><i>“GIFs can be considered 'transformative' under copyright law because they do not undermine the market for the original work: "No one, for instance, is going to watch a Star Wars GIF instead of the original movie."
”</t13></i></div><br>
Attorney Rich Stim says the judges and lawmakers who created the fair use exception to copyright, did not want to limit its definition.<br>
<div id="italicscontainer"><t13><i>“Like free speech, they wanted it to have an expansive meaning that could be open to interpretation."
"</t13></i></div><br>
Since there is no standing legal decision on whether specifically creating a GIF from copyrighted material is technically infringement, these four factors are all taken into account when determining fair use:

<!-- this creates an ordered list which i have used to create bullet points-->
<ol>
  <li>The purpose and character of the use, including whether such use is of a commercial nature or is for non-profit or educational purposes</li>
  <li>The nature of the copyrighted work</li>
  <li>The amount and substantiality of the portion used in relation to the copyrighted work as a whole</li>
   <li>The effect of the use upon the potential market for or value of the copyrighted work.</li>
</ol>

So the doctrine of fair use creates a legal opening for copyrighted material to be remixed and repurposed, as long as the new use is derivative of the original and does not create economic competition for the copyright holders.<br>
Considering that my website, is for a non-profit purpose, as very little affect, as it is a school website, where likely the only people to view it are myself, my teacher and my class mates, I feel that the use of Gifs on my website come under the fair use doctrine of Gifs, as there is no economic competition with the copyright holders.<br><br>

<t6>Other Images</t6><br>
Other “banner” images have been taken from a copy-right free source, or have a creative commons licence, which allows me to use them as long as I give credit, which I will do below.
The images of the discs which are shown on the film.php page and the genre and year.php pages are images that have been taken by me from the discs that I have at home. While these discs and have copyright content inside them, I have been given permission for the purpose of this assignment by my computer science teacher Martin Burch.<br>
For the purpose of copyright if you feel that there is an infringement within my website, I suggest that you email me @eszterscarlettherbe@mmc.school.nz, with the nature of the infringement, and I will remove the image or find a solution.<br><br>
<t6>Image and Gif Credits:</t6>

<br><br>

<!-- i then open the grid container which contains the css styling from style.css
i then begin my table openeng the table headers -->
<div class="grid-container">
  <table>
  <tr>
    <th>movie</th>
    <th>image credit</th>
  </tr>

 <!-- this begins a php foreach loop whih states that
 for each of the results that the loops will create
 a row which will echo:
 the movie name in one row and the credit in the second row -->
<?php 
foreach($result as $row) 
     { 
echo '<tr>';
echo '<td><t7>' . $row['movie'] . '</t7></td>'; // information 
// echo '<br>';
echo '<td><p>'.$row['credit'] . '</p></td>'; // pre-formatted
echo '</tr>';
}
?>
</table>
  </div>
</div>
<!-- this adds alot of line brreaks which create space between the bottom of the form and the footer -->
<br><br><br><br><br>
<!-- creates a footer which spans the width of the page , before adding the styles of the bookwork and copyright links -->
<div id="footer">
  <p><span class="links"><a href="bookwork/bookwork.pdf">bookwork </a>| <a href="copyright.php">copyright&image credit</a></span>flixlist</p>
</div>
</body>
</html>