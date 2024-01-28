<?php
// if(!isset($_GET["page"])) {
//     $page=1;
// }else{$page=$_GET["page"];}
// $taille=count($classe );
// $nombre_ligne=4;
// $nombre_page=ceil($taille/$nombre_ligne);
// // var_dump($nombre_page );
// $position=($page-1)*$nombre_ligne;
// $tab=array_slice($classe , $position, $nombre_ligne);
// var_dump($tab);
?>

<!-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.etudiant.css">

    <title>liste classe</title>
</head>
<body> -->
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
            <a href="<?=WEBROOT;?>/?action=show-demande-ac">tous les Demandes</a>
        <?php endif ?>

        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
            <a href="<?=WEBROOT;?>/?action=show-demande">Mes Demandes</a>
        <?php endif ?>
        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_RP"):?>
            <a href="<?=WEBROOT;?>/?action=liste-classe">Liste classe</a>
            <a href="<?=WEBROOT;?>/?action=liste-classe">Liste Etudiant</a>

        <?php endif ?>
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" >Se Déconnecter</a>
        </div>
        <div class="prof-body">
        <div class="container">
                <h3>AJOUTER UN ETUDIANT</h3>
                <form id="form" method="post" action="<?=WEBROOT;?>">
                    <div>
                        <label>Prénom</label>
                        <input  type="text" name="prenom">
                        <label style="margin-left: 10%;">Nom</label>
                        <input  type="text" name="nom">
                    </div>
                    <div >
                        <label >Login</label>
                        <input  style="margin-left: 4%;" type="text" name="login">
                        <label style="margin-left: 5%;">password</label>
                         <input  type="text" name="passwd">
                    </div>    
                    <div>
                        <label style="margin-left: -2%;">Classe</label>
                        <select  name="libelleC" id="">
                            <option value=""></option>
                            <option value="L1devweb">L1devweb</option>
                            <option value="L1G">L1GL</option>
                            <option value="L1Design">L1Design</option>
                        </select><br>
                    </div>
                    <a href=""><button class="but" type="button" name="action" value="form-add-etudiant">Ajouter</button></a>
            
                </form>
                
            </div>
        </div>
        </section>
<!-- </body>
</html> -->