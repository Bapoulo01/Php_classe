<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.etudiant.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>Liste des etudiant</title>
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
            <a href="<?=WEBROOT;?>/?action=liste-classe"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Liste classe</a>
            <a href="<?=WEBROOT;?>/?action=liste-etudiant"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Liste Etudiant</a>

            <?php endif ?>
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" >Se Déconnecter</a>
        </div>
        <div class="prof-body">
            <div class="container">
                <div ><a href="liste.classe.html"><span style="margin: 1% 3%;font-size: 30px;cursor: pointer;color: black;" class="fa fa-arrow-circle-left"></a></span></div>
                <h3>LISTE DES ETUDIANTS DE <?=$classe["libelleC"];?></h3>
                <table class="table-style">
                    <thead>
                        <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                        </tr>
                    </thead>
                    <?php foreach ($etu_Class as  $value):?>
                        <tbody> 
                           <tr>
                               <td><?=$value["prenom"];?></td>
                               <td><?=$value["nom"];?></td>

                           </tr>
                        </tbody>
                        <?php endforeach ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>