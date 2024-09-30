<?php

@include 'config.php';

if(isset($_POST['add_product'])){
		$cc_opening = $_POST['cc_opening'];
		$cc_type = $_POST['cc_type'];
		$cc_frontcolor = $_POST['cc_frontcolor'];
		$cc_backcolor = $_POST['cc_backcolor'];
		$cc_insidecolor = $_POST['cc_insidecolor'];
		$cc_textoutside = $_POST['cc_textoutside'];
		$cc_textinside = $_POST['cc_textinside'];
	    $cc_description = $_POST['cc_description'];
   $cc_image = $_FILES['cc_image']['name'];
   $cc_image_tmcc_opening = $_FILES['cc_image']['name'];
   $cc_image_folder = 'uploaded_img/'.$cc_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `customize`(cc_opening,cc_type,cc_frontcolor,cc_backcolor,cc_insidecolor,cc_textoutside, cc_textinside, cc_description, cc_image) VALUES('$cc_opening' , '$cc_type' , '$cc_frontcolor' , '$cc_backcolor' , '$cc_insidecolor' , '$cc_textoutside', '$cc_textinside', '$cc_description', '$cc_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($cc_image_tmcc_opening, $cc_image_folder);
      $message[] = 'image added succesfully';
   }else{
      $message[] = 'could not add the image';
   }
};

if(isset($_GET['delete'])){
   $delete_p_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `customize` WHERE cc_id = $delete_cc_id ") or die('query failed');
   if($delete_query){
      header('location:customize.php');
      $message[] = 'product has been deleted';
   }else{
      header('location:customize.php');
      $message[] = 'product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_cc_id = $_POST['update_cc_id'];
   $update_cc_opening = $_POST['update_cc_opening'];
	$update_cc_type = $_POST['update_cc_type'];
	$update_cc_frontcolor = $_POST['update_cc_frontcolor'];
	$update_cc_backcolor = $_POST['update_cc_backcolor'];
	$update_cc_insidecolor = $_POST['update_cc_insidecolor'];
	$update_cc_textoutside = $_POST['update_cc_textoutside'];
	$update_cc_textinside = $_POST['update_cc_textinside'];
	$update_cc_description = $_POST['update_cc_description'];
	$update_cc_image = $_FILES['update_cc_image']['name'];
	$update_cc_image_tmcc_opening = $_FILES['update_cc_image']['tmcc_opening'];
	$update_cc_image_folder = 'uploaded_img/'.$update_cc_image;

   $update_query = mysqli_query($conn, "UPDATE `customize` SET opening = '$update_cc_opening', opening type= '$update_cc_type',frontcolor = '$update_cc_frontcolor',backcolor = '$update_cc_backcolor' ,insidecolor = '$update_cc_insidecolor',image = '$update_cc_image',textoutside = '$update_cc_textoutside',textinside= '$update_cc_textinside',description = '$update_cc_description' WHERE cc_id = '$update_cc_id'");

   if($update_query){
      move_uploaded_file($update_cc_image_tmcc_opening, $update_cc_image_folder);
      $message[] = 'product updated succesfully';
      header('location:customize.php');
   }else{
      $message[] = 'product could not be updated';
      header('location:customize.php');
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="wp_idth=device-wp_idth, initial-scale=1.0">
   <title>Customize your card</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/design.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'header.php'; ?>

<div class="container">



<section class="display-product-table">

   <table>

      <thead>
         <th>Opening</th>
         <th>Type of Card(Other)</th>
         <th>Front Color</th>
		 <th>Back Color</th>
		 <th>Inside Color</th>
		  <th>Text on the Outside</th>
		  <th>Text on the Inside</th>
		  <th>Uploaded Image</th>
		  <th>Greeting Cards Description</th>
		 
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conn, "SELECT * FROM `customize`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

				<tr>
				<td><?php echo $row['cc_opening']; ?></td>
				<td><?php echo $row['cc_type']; ?></td>
				<td><?php echo $row['cc_frontcolor']; ?></td>
				<td><?php echo $row['cc_backcolor']; ?></td>
				<td><?php echo $row['cc_insidecolor']; ?></td>
				<td><?php echo $row['cc_textoutside']; ?></td>
				<td><?php echo $row['cc_textinside']; ?></td>
            <td><img src="uploaded_img/<?php echo $row['cc_image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['cc_description']; ?></td>
            
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no product added</div>";
            };
         ?>
      </tbody>
   </table>

</section>



</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>