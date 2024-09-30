<?php

include_once 'config.php';


$email = $_POST['email'];


   $sql = "INSERT INTO newsletter(n_id, email)
             VALUES(NULL, '$email')";


      $result = mysqli_query($conn, $sql);


      if ($result) {
             	# code...
             include_once'contact.php';
            echo '<script>alert("Subscribed !")</script>';

             }       
  else{
  	echo "Error in Subscription";
  }




?>