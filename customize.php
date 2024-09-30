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
      $file_name=$_FILES['file']['name'];
      $tmp_name=$_FILES['file']['tmp_name'];

   $insert_query = mysqli_query($conn, "INSERT INTO `customize`(cc_opening,cc_type,cc_frontcolor,cc_backcolor,cc_insidecolor,cc_textoutside, cc_textinside, cc_description, cc_image) VALUES('$cc_opening' , '$cc_type' , '$cc_frontcolor' , '$cc_backcolor' , '$cc_insidecolor' , '$cc_textoutside', '$cc_textinside', '$cc_description', '$file_name')") or die('query failed');

   if($insert_query){

    //upload file in folder
    move_uploaded_file($tmp_name,"C:\\xampp\\htdocs\\card&course\\uploaded_img\\".$file_name);  
              $new = "".$file_name;
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

 $file_name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];


   $update_query = mysqli_query($conn, "UPDATE `customize` SET opening = '$update_cc_opening', opening type= '$update_cc_type',frontcolor = '$update_cc_frontcolor',backcolor = '$update_cc_backcolor' ,insidecolor = '$update_cc_insidecolor',image = '$file_name',textoutside = '$update_cc_textoutside',textinside= '$update_cc_textinside',description = '$update_cc_description' WHERE cc_id = '$update_cc_id'");

   if($update_query){
   	  move_uploaded_file($tmp_name,"C:\\xampp\\htdocs\\card_course\\uploaded_img\\".$file_name);  
              $new = "".$file_name;
  
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
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include 'user_header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Customize your Greeting Card</h3>
	<label for="greeting card">Choose how your greeting card opens:</label>
	<select id="cc_opening" name="cc_opening">
    <option value="Vertical">Vertical</option>
    <option value="Horizontal">Horizontal</option>
    <option value="Other">Other</option>
	</select>
	</br>
	</br>
	<label for="cc_type">If you chose other please enter which kind of card would you want:</label><br>
	<input type="text" id="cc_type" name="cc_type">
	</br>
	</br>
	<label for="front-color">Select a color for the cards front-side:</label>
	<input type="color" id="cc_frontcolor" name="cc_frontcolor" >
	</br>
	</br>
	<label for="back-color">Select a color for the cards back-side:</label>
	<input type="color" id="cc_backcolor" name="cc_backcolor" >
	</br>
	</br>
	<label for="inside-color">Select a color for the cards In-side:</label>
	<input type="color" id="cc_insidecolor" name="cc_insidecolor" >
	</br>
	</br>
	<label for="cc_outsidetext">What text would you like to be written on the outside of your greeting card</label><br>
	<input type="textoutside" id="cc_textoutside" name="cc_textoutside">
	</br>
	</br>
	<label for="cc_outsidetext">What text would you like to be written in the inside of your greeting card</label><br>
	<input type="cc_textinside" id="cc_textinside" name="cc_textinside">
	</br>
	</br>
	  <div class="form-group">
                    <label for="image" class="col-lg-4 control-label">Upload Image:</label>
                    <div class="col-lg-6">
                      <input  id="image" title="Date required"  name="file" type="file" width="48" height="48" required />
                    </div>
                  </div>
	</br>
	</br>
	<label for="description">Please describe furthur how you would want your card to look like </label><br>
	<input type="cc_description" id="cc_description" name="cc_description">
	</br>
	</br>
	<input type="submit" value="Customize" name="add_product" class="btn">
	
</form>

</section>

</div>


<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>