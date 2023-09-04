<?php

include '../db/conexion.php';

if(isset($_POST['add_product'])){
   $b_name = $_POST['p_name'];
   $b_contact = $_POST['p_price'];
   $b_image = $_FILES['p_image']['name'];
   $b_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $b_image_folder = 'uploaded_img/'.$b_image;

   $insert_query = mysqli_query($conexion, "INSERT INTO `brigadista`(name, contact, image) VALUES('$b_name', '$b_contact', '$b_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($b_image_tmp_name, $b_image_folder);
      $message[] = 'El brigadista se agregó correctamente';
   }else{
      $message[] = 'El brigadista no pudo ser agregado';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conexion, "DELETE FROM `brigadista` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:admin.php');
      $message[] = 'Brigadista eliminado';
   }else{
      header('location:admin.php');
      $message[] = 'El brigadista no pudo ser eliminado';
   };
};

if(isset($_POST['update_product'])){
   $update_b_id = $_POST['update_p_id'];
   $update_b_name = $_POST['update_p_name'];
   $update_b_contact = $_POST['update_p_price'];
   $update_b_image = $_FILES['update_p_image']['name'];
   $update_b_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_b_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conexion, "UPDATE `brigadista` SET name = '$update_b_name', contact = '$update_b_contact', image = '$update_b_image' WHERE id = '$update_b_id'");

   if($update_query){
      move_uploaded_file($update_b_image_tmp_name, $update_b_image_folder);
      $message[] = 'Brigadista editado correctamente';
      header('location:indexbrigad.php');
   }else{
      $message[] = 'El brigadista no pudo ser editado';
      header('location:indexbrigad.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gestión Brigadistas</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="styleindex.css">


</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


		<img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="70px" alt="logoSena">


		<nav>
			<ul>
				<li><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></li>
				<li><a href="../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>
					<li><a onclick="window.location.href='../php/rolFuncionario/indexfuncionario.php'"><span class="material-symbols-outlined">Salir</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Agregar nuevo Brigadista</h3>
   <input type="text" name="p_name" placeholder="ingrese su nombre completo" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="ingrese su edad" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="Agregar" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Foto</th>
         <th>Nombre</th>
         <th>Edad</th>
         <th>Accion</th>
      </thead>

      <tbody>
         <?php
         
            $select_products = mysqli_query($conexion, "SELECT * FROM `brigadista`");
            if(mysqli_num_rows($select_products) > 0){
               while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('¿Está seguro de que quiere eliminar esto?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>Ningún brigadista se ha agregado aún</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conexion, "SELECT * FROM `brigadista` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['contact']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="Editar brigadista" name="update_product" class="btn">
      <input type="reset" value="cancelar" id="close-edit" class="option-btn">
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