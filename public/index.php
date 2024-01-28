
<?php

define("WEBROOT","http://localhost:8000");
define("BD", "../bd/data.json");

// require_once("../orm/orm.php");
// jsonToArr();



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <?php if (isset($_REQUEST["action"])): ?>
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.css">
    <?php endif ?>
    <?php if (isset($_REQUEST["action"])): ?>
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.classe.css">
    <?php endif ?>
    <?php if (isset($_REQUEST["action"])): ?>
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.etudiant.css">
    <?php endif ?>
    <?php if (!isset($_REQUEST["action"])): ?>
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/loging.css">
    <?php endif ?>
   

    <!-- <link rel="stylesheet" href=""> -->
</head>
<body>

    <?php require_once('../controller/controller.php');?>
</body>
</html>

