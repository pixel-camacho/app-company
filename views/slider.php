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

<script src="<?php echo constant('URL');?>/public/js/slider.js"></script>
