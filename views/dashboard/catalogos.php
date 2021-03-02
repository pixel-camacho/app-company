
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link  href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo constant('URL')?>/public/css/catalogos.css">

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

        <div class="contenedor-tarjetas" id="cards">

       </div>
     
     <template id="template-card">
              <div class="card" >
                <a href="<?php echo constant('URL').'/dashboard/eliminarTarjeta?id='?>" title="Eliminar" id="eliminar"><i class="fas fa-times close"></i></a> 
                <img src="<?php echo constant('URL').'/public/img/printer.png';?>" alt="imagen de multifuncional">
                <h5>EMPTY</h5>
                <div class="especificaciones">
                <label>Cantidad</label>
                <span id="cantidad">0</span>
                <br>
                <label>Serie</label>
                <span id="serie">XXXXXXXXX</span>
            </div>
            <div class="botonera">
                   <button class="editar">
                         <i class="far fa-edit"></i>
                   </button>
               </div> 
               </div>
        </template>


<div id="popup" class="overlay">
    <div id="popupBody">
        <h2 id="title">Este es el tititulo</h2>
        <a id="cerrar" href="#">&times;</a>
        <div class="popupContent">
            <form action="#" method="post">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad">
            <label for="serie">Serie</label>
            <input type="text" name="serie" id="serie">
            </form>
        </div>
    </div>
</div> 

<script src="<?php echo constant('URL');?>/public/js/dashboard.js"></script>
<script src="<?php echo  constant('URL');?>/public/js/UI.js"></script>

<script>
 let multifuncionales = <?php echo $multifuncionales;?>;
 const ui = new UI();
 document.addEventListener('DOMContentLoaded', e => ui.renderCards(multifuncionales));

 document.getElementById('cards').addEventListener('click', e =>{
                                                    if(e.target.classList.contains('editar')){
                                                    ui.viewModal();
                                                      multifuncionales.forEach(element => {
                                                          if(e.target.id == element.idMultifuncional){
                                                              document.getElementById('title').textContent = `${element.marca} 
                                                                                                              ${element.modelo}`;
                                                              document.getElementById('cantidad').value = element.cantidad;
                                                              document.getElementById('serie').value = element.serie;
                                                          }
                                                      });
                                                    }
                                                     });
document.getElementById('cerrar').addEventListener('click', () => ui.hiddenModal())
</script>
