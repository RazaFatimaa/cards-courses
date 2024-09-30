<?php include("navbar.php");?>
<!DOCTYPE html>
<html>
<head>
<link   rel="icon"     type="image/png"    href= "image/logo.png">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

form {
  border: 3px solid #f1f1f1;
  font-family: Arial;
}

.container {
  padding: 20px;
  background-color: #f1f1f1;
}

input[type=text], input[type=submit] {
  width: 100%;
  padding: 12px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=checkbox] {
  margin-top: 16px;
}

input[type=submit] {
  background-color:#808080;
  color: white;
  border: none;
}

input[type=submit]:hover {
  opacity: 0.8;
}
</style>

</head>
<body>

<h1  style = "text-align:center; padding:15px 15px;">A littele about us</h1>
<h2 style = "text-align:center; padding:15px 15px;">We are an online small scaled business based in Riyadh.</h2>
<h2 style = "text-align:center; padding:15px 15px;">As card making art is not well-known amongst many in Riyadh, this is what the website will help promote.</h2>

<img style="flex:center; height:500px; width:1300px; margin:50;" src="images/map.png"></img>



<h1 style = "text-align:center;">Welcome!</h1>
<h1 style = "text-align:center;">A place where you can easily find solutions and ask questions</h1>

<h1 style = "text-align:center;">Help us improve our service by leaving a review!</h1>
</br>
<form action="review_reg.php" class="container" method="POST">
    <h1>Reviews/Inquries</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

     <label for="review"><b>Review/Inqurey</b></label>
    <input type="text" placeholder="Enter review" name="review" id="review" required>

	 <input value="Submit Review" type="submit" class="btn">
	

	
  </form>
 
 
 </br>
 <h1 style = "text-align:center; ">Subscribe for latest updates</h1>
</br> 
 <form action="newsletter_reg.php" class="container" method="POST">
    <h1>Subscribe for latest updates</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>


	 <input value="Subscribe" type="submit" class="btn">
	

	
  </form>
 
 </br>
  <script src="script.js"></script>
 
  <script src="script.js"></script>

</body>
</html>

<?php

include'footer.php'

?>

