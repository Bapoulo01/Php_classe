<?php
if(!isset($_GET["page"])) {
    $page=1;
}else{$page=$_GET["page"];}
$taille=count($demandeAC );
$nombre_ligne=5;
$nombre_page=ceil($taille/$nombre_ligne);
// var_dump($nombre_page );
$position=($page-1)*$nombre_ligne;
$tab=array_slice($demandeAC , $position, $nombre_ligne);
// var_dump($tab);
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>Test 01</title>
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
            <a href="<?=WEBROOT;?>/?action=show-demande-ac"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>tous les Demandes</a>
        <?php endif ?>

        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
            <a href="<?=WEBROOT;?>/?action=show-demande"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Mes Demandes</a>
        <?php endif ?>
            
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" ></span>Se Déconnecter</a>
        </div>
        <div class="prof-body">
            <div class="container">
                <h3>Annee Scolaire: 2023-2024</h3>
                <form>
                    <label style="margin-left: 3%;">Etat</label>
                    <select  name="etat" id="">
                        <option value="En cours">En cours</option>
                        <option value="Refuser">Refuser</option>
                        <option value="accepter">Accepter</option>
                    </select>
                    <button class="bout" type="submit">OK</button>
                </form>
                <table class="table-style">
                    <thead>
                        <tr>
                            <th>Etudiant</th>
                            <th>Classe</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Etat</th>
                            <th>Motif</th>
                        </tr>
                    </thead>

                <?php 
                    foreach ($tab as  $value):?>
                    <tbody>
                            <tr>
                                <td><?=$value["prenom"] ." ".$value["nom"]?></td>
                                <td><?=$value["libelleC"]?></td>
                                <td><?=$value["date"]?></td>
                                <td><?=$value["type"]?></td>
                                <td><?=$value["etat"]?></td>
                                <td><?=$value["motif"]?></td>
                            </tr> 
                    </tbody>
                    <?php endforeach;?>

                </table>
                <div class="page">
                    <a href=""><span class="fa fa-long-arrow-left"></span></a>
                    <?php for ($i=1; $i <=$nombre_page ; $i++):?>
                    <a href="<?=WEBROOT;?>/?action=show-demande-ac&page=<?= $i?>"><?= $i ?> </a>
                    <?php endfor?>
                    <a href=""><span class="fa fa-long-arrow-right"></span></a>
                </div>
              
            </div>
    </section>
</body>
</html>