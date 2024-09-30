<?php

@include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search</title>
   <link rel="icon" type="image/x-icon" href="fac.PNG">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="stylec.css">

</head>
<body>
   
<?php @include 'navbar.php'; ?>

<section class="heading">
    <h3>Search</h3>
    
</section>

<section class="search-form">
    <form action="" method="POST">
        <input type="text" class="box" placeholder="search..." name="search_box">
        <input type="submit" class="btn" value="search" name="search_btn">
    </form>
</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">

      <?php
        if(isset($_POST['search_btn'])){
         $search_box = mysqli_real_escape_string($conn, $_POST['search_box']);
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_box}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="products.php" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
            <h3><?php echo $fetch_products['name']; ?></h3>
            <div class="price">SAR<?php echo $fetch_products['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>
     
      <?php
         }
            }else{
                
            }
        }else{
            
        }
      ?>
 
   </div>

</section>

<section class="products" style="padding-top: 0;">

   <div class="box-container">
<?php
        if(isset($_POST['search_btn'])){
         $search_box = mysqli_real_escape_string($conn, $_POST['search_box']);
         $select_classes = mysqli_query($conn, "SELECT * FROM `classes` WHERE name LIKE '%{$search_box}%'") or die('query failed');
         if(mysqli_num_rows($select_classes) > 0){
            while($fetch_classes = mysqli_fetch_assoc($select_classes)){
      ?>
      <form action="" method="POST" class="box">
         
         <div class="price">SAR <?php echo $fetch_classes['price']; ?>/-</div>
         <div class="name"><?php echo $fetch_classes['name']; ?></div>
		 <div class="detail"><?php echo $fetch_classes['detail']; ?></div>
         
         <input type="hidden" name="product_id" value="<?php echo $fetch_classes['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_classes['name']; ?>">
		  <input type="hidden" name="product_name" value="<?php echo $fetch_classes['detail']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_classes['price']; ?>">
         <button><a href="registration.php" >Register</a></button>
      </form>

      <?php
         }
            }else{
                
            }
        }else{
            
        }
       ?>
   </div>

</section>
<section class="products" style="padding-top: 0;">

   <div class="box-container">

</div>
    </section>
</section>
<?php @include 'footer.php'; ?>

<script src="script.js"></script>

</body>
</html>