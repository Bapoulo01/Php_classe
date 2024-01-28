<?php
if(!isset($_GET["page"])) {
    $page=1;
}else{$page=$_GET["page"];}
$taille=count($etudiantlist  );
$nombre_ligne=4;
$nombre_page=ceil($taille/$nombre_ligne);
// var_dump($nombre_page );
$position=($page-1)*$nombre_ligne;
$tab=array_slice($etudiantlist  , $position, $nombre_ligne);
// var_dump($tab);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.classe.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <title>liste classe</title>
</head>
<body>
<section>
        <div class="Dashboard">
            <div class="infos">
                <div class="profil"><img src="img/X.png" alt=""></div>
                  <h3>Prénom & Nom:<?= $_SESSION["userConnect"]["prenom"]." ". $_SESSION["userConnect"]["nom"]?></h3>
                  <h3>Année: <?= $anneeEncours["libAs"]?></h3>
                  <?php if( $_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
                    <h3>Classe: L2 Devweb</h3>
                  <?php endif ?>
                  <h3>Role: <?= $_SESSION["userConnect"]["role"]?></h3>
            </div>
        
            <?php if( $_SESSION["userConnect"]["role"]=="ROLE_AC"):?>
            <a href="<?=WEBROOT;?>/?action=show-demande-ac"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list ">tous les Demandes</a>
        <?php endif ?>

        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
            <a href="<?=WEBROOT;?>/?action=show-demande"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list ">Mes Demandes</a>
        <?php endif ?>
        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_RP"):?>
            <a href="<?=WEBROOT;?>/?action=liste-classe"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list ">Liste classe</a>
            <a href="<?=WEBROOT;?>/?action=liste-etudiant"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list ">Liste Etudiant</a>

        <?php endif ?>
     
            
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" >Se Déconnecter</a>
        </div>
        <div class="prof-body">
        <div class="container">
                <h3>LISTE DES ETUDIANTS</h3>
                <a href="<?=WEBROOT;?>/?action=new-etudiant"><button class="button" type="submit">Ajouter</button></a>
                <table class="table-style">
                    <thead>
                        <tr>
                            <td>Prénom</td>
                            <td>Nom</td>
                            <td>Classe</td>
                        </tr>
                    </thead>
                    <?php foreach ($etudiantlist as  $value):?>
                    <tbody>
                        <tr>
                            <td><?=$value["prenom"]?></td>
                            <td><?=$value["nom"]?></td>
                            <td><?=$value["Id_class"]?></td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                </table>
                <div class="page">
                    <a href=""><span class="fa fa-long-arrow-left"></span></a>
                    <?php for ($i=1; $i <=$nombre_page ; $i++):?>
                  <a href="<?=WEBROOT;?>/?action=liste-etudiant&page=<?= $i?>"><?= $i ?> </a>
                <?php endfor?>
                    <a href=""><span class="fa fa-long-arrow-right"></span></a>
                </div>
            </div>
        </div>
        </section>
</body>
</html>