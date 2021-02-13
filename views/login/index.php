<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../../public/css/login.css">
</head>
<body>
    <main>
        <?php echo $this->showMessages();?>
        <div class="box-login">
        <h1 class="title">ACCOUNT LOGIN</h1>
            <form action="<?php echo constant('URL');?>/login/authenticate" method="POST">
              <div class="input">
                <label>USERNAME</label>
                <i class="fa fa-user fa-2x icon"></i>
                <input type="text" name="username">
              </div>
              <div  class="input">
                <label>PASSWORD</label>
                <i class="fa fa-lock fa-2x icon"></i>
                <input type="password" name="password" id="password">
                <i class="fa fa-eye-slash show" id="view"></i>
              </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </main>
    <script src="../../public/js/login.js"></script>
</body>
</html>
</html>