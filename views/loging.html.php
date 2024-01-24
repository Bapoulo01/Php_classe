<?php


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/loging.css">

    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <form method="post" action="<?=WEBROOT;?>">
        <h4>Page Connexion</h4>     
        <hr>
        <div>
            <label>Login</label>
            <input type="text" name="login" placeholder="login">
        </div>
        <div>
            <label>password</label>
             <input type="password" name="mdp" placeholder="password">
           
        </div>  
        <!-- <input type="submit" value="Se connecter" name="connect"> -->
    <button type=submit name="send" value=""> Se connecter</button>
    <div>
        <?php if (isset($message)) {
            echo($message);
        }?>
    </div>
    </form>
</body>
</html>