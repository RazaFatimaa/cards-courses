<?php

@include 'config.php';

if(isset($_POST['add_portfolio'])){
   $b_name = $_POST['b_name'];
   $b_price = $_POST['b_price'];
   $b_image = $_FILES['b_image']['name'];
   $b_image_tmp_name = $_FILES['b_image']['tmp_name'];
   $b_image_folder = 'uploaded_img/'.$b_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `portfolios`(name, price, image) VALUES('$b_name', '$b_price', '$b_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($b_image_tmp_name, $b_image_folder);
      $message[] = 'portfolio add succesfully';
   }else{
      $message[] = 'could not add the portfolio';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `portfolios` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:portfolio_admin.php');
      $message[] = 'portfolio has been deleted';
   }else{
      header('location:portfolio_admin.php');
      $message[] = 'portfolio could not be deleted';
   };
};

if(isset($_POST['update_portfolio'])){
   $update_p_id = $_POST['update_b_id'];
   $update_p_name = $_POST['update_b_name'];
   $update_p_price = $_POST['update_b_price'];
   $update_p_image = $_FILES['update_b_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_b_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_b_image;

   $update_query = mysqli_query($conn, "UPDATE `portfolios` SET name = '$update_b_name', price = '$update_b_price', image = '$update_b_image' WHERE id = '$update_b_id'");

   if($update_query){
      move_uploaded_file($update_b_image_tmp_name, $update_b_image_folder);
      $message[] = 'portfolio updated succesfully';
      header('location:portfolio_admin.php');
   }else{
      $message[] = 'portfolio could not be updated';
      header('location:portfolio_admin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Portfolio</title>

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

<section>

<form action="" method="post" class="add-portfolio-form" enctype="multipart/form-data">
   <h3>add a new portfolio</h3>
   <input type="text" name="b_name" placeholder="enter the bussiness name" class="box" required>
   </br>
   <input type="number" name="b_price" min="0" placeholder="enter the price per product" class="box" required>
   </br>
   <input type="file" name="b_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   </br>
   <input type="submit" value="add the portfolio" name="add_portfolio" class="btn">
</form>

</section>

<section class="display-portfolio-table">

   <table>

      <thead>
         <th>portfolio image</th>
         <th>portfolio name</th>
         <th>Price per poduct</th>
         
      </thead>

      <tbody>
         <?php
         
            $select_portfolios = mysqli_query($conn, "SELECT * FROM `portfolios`");
            if(mysqli_num_rows($select_portfolios) > 0){
               while($row = mysqli_fetch_assoc($select_portfolios)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>SAR<?php echo $row['price']; ?>/-</td>
            
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no portfolio added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `portfolios` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_b_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_b_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_b_price" value="<?php echo $fetch_edit['price']; ?>">
      <input type="file" class="box" required name="update_b_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_portfolio" class="btn">
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