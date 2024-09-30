<!DOCTYPE html>
<html>
<head>
<link   rel="icon"     type="image/png"    href= "image/logo.png">

<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}



/* Container for flexboxes */
.row {
  display: -webkit-flex;
  display: flex;
}

/* Create three unequal columns that sits next to each other */
.column {
  padding: 130px ;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Left and right column */
.column.side {
   -webkit-flex: 1;
   -ms-flex: 1;
   flex: 1;
}

/* Middle column */
.column.middle {
  -webkit-flex: 2;
  -ms-flex: 2;
  flex: 2;
}



/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
  .row {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

.clr{
clear:both;	
}
</style>
</head>
<body>


<div class="row">
  <div class="column side" >
  
  </div>
  <?php include("chatbot.php");?>
   
   <div class="clr"></div>
  
  </div>
</body>
</html>
