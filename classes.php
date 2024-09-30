<?php

@include 'config.php';




if(isset($_POST['update_class'])){
   $update_p_id = $_POST['update_c_id'];
   $update_c_name = $_POST['update_c_name'];
    $update_c_detail = $_POST['update_c_detail'];
   $update_c_price = $_POST['update_c_price'];
   

   $update_query = mysqli_query($conn, "UPDATE `classes` SET name = '$update_c_name',detail = '$update_c_detail', price = '$update_c_price' WHERE id = '$update_c_id'");

   if($update_query){
      move_uploaded_file($update_c_name,$update_c_detail,$update_c_price );
      $message[] = 'class updated succesfully';
      header('location:class_admin.php');
   }else{
      $message[] = 'class could not be updated';
      header('location:class_admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

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

<?php include 'navbar.php'; ?>

<div class="container">


<section class="display-class-table">

   <table>

      <thead>
         <th>class name</th>
		 <th>class details</th>
         <th>class price</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_classes = mysqli_query($conn, "SELECT * FROM `classes`");
            if(mysqli_num_rows($select_classes) > 0){
               while($row = mysqli_fetch_assoc($select_classes)){
         ?>

         <tr>
           
            <td><?php echo $row['name']; ?></td>
			<td><?php echo $row['detail']; ?></td>
            <td>SAR<?php echo $row['price']; ?>/-</td>
            <td>
			<a href="registration.php" >Register</a>

               
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no class added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `classes` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
    
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_c_name" value="<?php echo $fetch_edit['name']; ?>">
	  <input type="text" class="box" required name="update_c_detail" value="<?php echo $fetch_edit['detail']; ?>">
      <input type="number" min="0" class="box" required name="update_c_price" value="<?php echo $fetch_edit['price']; ?>">
     
      <input type="submit" value="update the prodcut" name="update_class" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>