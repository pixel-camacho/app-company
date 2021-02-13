<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
</head>
<body>
    <?php echo $this->showMessages();?>

        <form action="<?php echo constant('URL');?>/signup/newUser" method="post">
        <h2>Registrar</h2>
        <p>
           <label for="username">Username</label>
           <input type="text" name="username" id="username">
        </p>
        <p>
           <label for="password">Password</label>
           <input type="password" name="password" id="password">
        </p>
        <p>
           <input type="submit" value="Iniciar sesión">
        </p>
        </form>
</body>
</html>