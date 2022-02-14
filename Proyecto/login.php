<?php
include_once 'includes/conexion.php';

session_start();
if (isset($_GET['cerrar_sesion'])) {
  session_unset();

  session_destroy();
}
if (isset($_SESSION['rol'])) {
  switch ($_SESSION['rol']) {
    case 1:
      header('location: Dashboard.php');
      break;

    case 2:
      header('location: ticket.php');
      break;

      default:
  }
}
if(isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $db = new Database();
  $query = $db->connect()->prepare('SELECT * FROM usuario WHERE rut = :username AND clave = :password');
  $query->execute(['username' =>$username , 'password' => $password]);

  $row = $query->fetch(PDO::FETCH_NUM);

  $nombreusuario = $row[1];
  $_SESSION['nombreusuario'] = $nombreusuario;
  $apellidousuario = $row[2];
  $_SESSION['apellidousuario'] = $apellidousuario;

  if($row == true){
    $rol = $row[4];

    $_SESSION['rol'] = $rol;
    switch ($rol) {
      case 1:
        header('location: Dashboard.php');
        break;

      case 2:
        header('location: ticket.php');
        break;

        default:
    }
  }else{
    // echo "usuario o contraseña incorrecta";
  }
}
// class Helper {
//   static function validar($username){
//     if (!preg_match("/^[0-9]+-[0-9kK]{1}/",$rutcompleto)) return false;
//     $rut = explode('-', $rutcompleto);
//     return strtolower($rut[1]) == helper::dv($rut[0]);
//   }
//   static function dv ($T){
//     $M=0;$S=1;
//     for(;$T;$T=floor($T/10))
//     $S=($S+$T%10*(9-$M++%6))%11;
//     return $S?$S-1:'k';
//   }
// }
// echo Helper::validar('1-9') ? 'es valido' : 'no es valido :(';
 ?>
 <html>
 <link href="css/login.css" rel="stylesheet">
 <script src="js/rut.js" charset="utf-8"></script>
 <script src="jquery-3.5.1.min.js"></script>
 <body>
   <div class="container">
    <img src="css/img/ESCUDO.png" alt="" class="escudo">
     <div class="center">
       <form action="#" method="post">
               <h2>Iniciar sesion</h2>
         <input name='username' type="text" oninput="checkRut(this)" placeholder="Ingrese RUT" autocomplete="off">
         <input type="password" name="password"  placeholder="Ingrese su clave" />
         <input type="submit" value="Ingresar">
        </form>
      </div>
     </div>



 </body>
 </html>
