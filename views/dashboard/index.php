<?php
$usuario  = $this->d['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/dashboard.css">
</head>
<body>
  <div class="contenedor">
  
    <div id="slider"> 
      <!--  <div id="toogle-btn">
            <span>&#9776</span>
        </div>-->
        <img src="<?php echo constant('URL');?>/public/img/perfil.jpg" alt="foto de perfil" class="perfil">
        <label>BIENVENIDO</label>
        <span class="user"><?php echo $usuario->getName() ?? 'USUARIO'; ?></span>
        <ul class="opciones">
            <li id="catalogos" style="color:#009688;">
                <i class="fas fa-list-ul"></i>
                <a href="#" style="color: #009688;" >CATALOGOS</a> 
            </li>
            <li>
                <i class="fas fa-book"></i>
                <a href="#">REPORTES</a>
            </li>
            <li>
                <i class="fas fa-qrcode"></i>
                <a href="#">QR</a>
            </li>
            <li>
                <i class="fas fa-sign-out-alt"></i>
                <a href="<?php echo constant('URL');?>/dashboard/salir">SALIR</a>
            </li>
        </ul>
    </div> 

    <?php include 'catalogos.php';?>

</div>
    <script src="<?php echo constant('URL');?>/public/js/dashboard.js"></script>
</body>
</html>