<?php

include_once 'config.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$contact_no = $_POST['contact_no'];

   $sql = "INSERT INTO student(s_id,first_name,last_name, email,  contact_no)
             VALUES(NULL, '$first_name' ,'$last_name', '$email', '$contact_no')";


      $result = mysqli_query($conn, $sql);


      if ($result) {
             	# code...
				include_once'registration.php';
            echo '<script>alert("Registeration Succesful!")</script>';

             }       
  else{
  	echo "Error in registration ";
  }




?>