<?php
session_start();

if(!isset($_SESSION['rol'])){
  header('location: login.php');
}else{
  if($_SESSION['rol'] != 2){
    header('location: login.php');
  }
}
 ?>
 <?php include_once 'includes/header.php' ?>

 <br>
 <div class="container">
  Rellene el siguiente formulario
  <br><br><br>
   <form action="#" method="post">
     <label for="">Departamento</label>
     <input type="text" name="departamento" value=""><br><br>
     <label for="">Fecha</label>
     <input type="date" name="" value=""><br><br>
     <label for="">Detalles del Problema</label>
     <textarea name="name" rows="8" cols="80" maxlength="250" placeholder="Max 250 caracteres"></textarea><br>
     <input type="submit" name="" value="Enviar">
   </form>
 </div>
<?php include_once 'includes/footer.php' ?>
