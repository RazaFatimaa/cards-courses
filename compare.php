<?php

@include 'config.php';


if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `compare` WHERE id = '$remove_id'");
   header('location:compare.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `compare`");
   header('location:compare.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping compare</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/design.css">

</head>
<body>

<?php include 'user_header.php'; ?>

<div class="container">

<section class="shopping-compare">

   <h1 class="heading">shopping Comparission - helps you to compare product image & price</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_compare = mysqli_query($conn, "SELECT * FROM `compare`");
         $grand_total = 0;
         if(mysqli_num_rows($select_compare) > 0){
            while($fetch_compare = mysqli_fetch_assoc($select_compare)){
         ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_compare['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_compare['name']; ?></td>
            <td>SAR<?php echo number_format($fetch_compare['price']); ?>/-</td>
            
            <td><a href="compare.php?remove=<?php echo $fetch_compare['id']; ?>" onclick="return confirm('remove item from compare?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
          
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="products.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            
            <td><a href="compare.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>