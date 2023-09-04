<?php

include 'config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brigadistas</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="css/styleindex.css">
   <link rel="stylesheet" href="../css/header.css">
</head>
<body>
   
   

 <!-- Menu de navegacion-->

 <div class="container__menu">

<div class="menu">

  <input type="checkbox" id="check__menu">
  <label for="check__menu" class="lbl-menu">
    <span id="spn1"></span>
    <span id="spn2"></span>
    <span id="spn3"></span>
  </label>

  <img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="70px" alt="logoSena">


  <nav>
    <ul>
     <!--  <li><img src="../img/LogoSenaBlanco.png"  width="70px" alt="logoSena"></li> -->
      <li><a href="#" id="selected">Inicio</a></li>
      <li><a onclick="window.location.href='../index.php'"><span class="material-symbols-outlined">Salir</span></a></li>
    </ul>
  </nav>
</div>
</div>


<div class="container">

<section class="products">
        <div class="container">

   <h1 class="heading">Conoce a nuestros Brigadistas</h1>
   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conexion, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">Cel: <?php echo $fetch_product['contact']; ?></div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['contact']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="Alertar" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>



<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>