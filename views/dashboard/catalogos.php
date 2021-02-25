<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link  href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo constant('URL')?>/public/css/catalogos.css">
</head>
<body>
<?php echo $this->showMessages();?>
<div class="dashboard">
        <h2 class="title">Mis catalogos</h2>
        <div class="filter">
        <label class="search">Filtro:</label>
        <span class="option">
            <i class="fas fa-print"></i>
            Multifuncionales
        </span>
        <span class="option">
            <i class="fas fa-wrench"></i>
            Refacciones
        </span>
        <span class="option">
            <i class="fas fa-fill-drip"></i>
            Tonner
        </span>
    </div>
        <hr class="separator">

        <div class="contenedor-tarjetas">
       <?php foreach($multifuncionales as $multifuncional) {?>
        <?php if(count($multifuncionales) > 0) { ?>     
            <div class="card">
                <a href="<?php echo constant('URL').'/dashboard/eliminarTarjeta?id='.$multifuncional->getIdMultifuncional();?>" title="Eliminar"><i class="fas fa-times close"></i></a> 
                <img src="<?php echo constant('URL').'/public/img/printer.png';?>" alt="imagen de multifuncional">
                <h5><?php echo $multifuncional->getMarca().' '.$multifuncional->getModelo() ?? 'EMPTY'; ?></h5>
                <div class="especificaciones">
                <label>Cantidad</label>
                <span><?php  echo $multifuncional->getCantidad().' pz' ?? 0; ?></span>
                <br>
                <label>Serie</label>
                <span><?php echo $multifuncional->getSerie() ?? 'XXXXXXXXX';?></span>
            </div>
            <div class="botonera">
                   <a href="#" title="Editar">
                         <i class="far fa-edit"></i>
                   </a>
               </div> 
            </div>
            <?php } else { ?>
                <h4>Catalo vacio</h4>
                <?php }?>
    <?php } ?>
</div>
<script src="<?php echo constant('URL');?>/public/js/dashboard.js"></script>
</body>
</html>