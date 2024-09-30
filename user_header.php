<link rel="stylesheet" href="css/design.css">
<header class="header">

   <div class="flex">

      <a href="home.php" class="logo">Cards & Courses</a>

      <nav class="navbar">
		 <a href="search.php" class="fa fa-search" aria-hidden="true"></a>
         <a href="products.php">Products</a>
		 <a href="customize.php">Customize</a>
		
		 

      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>
	  
	  <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `compare`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="compare.php" class="cart">Compare<span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>