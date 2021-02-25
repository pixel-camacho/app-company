<?php
$usuario  = $this->d['usuario'];
$multifuncionales = $this->d['multifuncionales'];
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
    <link rel="stylesheet" href="<?php echo constant('URL');?>/public/css/slider.css">
</head>
<body>

<div class="contenedor">
    <?php include 'slider.php';?>
    <?php include 'catalogos.php';?>
</div>

</body>
</html>