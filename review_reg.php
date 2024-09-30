<?php

include_once 'config.php';


$email = $_POST['email'];
$review = $_POST['review'];

   $sql = "INSERT INTO review(r_id, email, review)
             VALUES(NULL, '$email', '$review')";


      $result = mysqli_query($conn, $sql);


      if ($result) {
             	# code...
             include_once'contact.php';
            echo '<script>alert("Review Succesfully Submitted!")</script>';

             }       
  else{
  	echo "Error in submitting review";
  }




?>