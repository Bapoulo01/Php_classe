


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.classe.css">

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
            <a href="<?=WEBROOT;?>/?action=show-demande-ac"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>tous les Demandes</a>
        <?php endif ?>

        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
            <a href="<?=WEBROOT;?>/?action=show-demande"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Mes Demandes</a>
        <?php endif ?>
        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_RP"):?>
            <a href="<?=WEBROOT;?>/?action=liste-classe"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Liste classe</a>
            <a href="<?=WEBROOT;?>/?action=liste-classe"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Liste Etudiant</a>

        <?php endif ?>
     
            
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" ></span>Se Déconnecter</a>
        </div>
        <div class="prof-body">
            <div class="container">
                <h3>LISTE DES CLASSES</h3>
                <a href="<?=WEBROOT;?>/?action=new-classe"><button class="button" type="submit" name="">Ajouter <span class="fa fa-plus" ></span></button></a>
                <table class="table-style">
                    <thead>
                        <tr>
                    
                            <td>Libelle</td>
                            <td>Etudiants</td>
                        </tr>
                    </thead>
                    <?php 
                    foreach ($classe as  $value):?>
                    <tbody>
                        <tr>
                        <td><?=$value["libelleC"]?></td>
                            <td>
                                <a href=""><button class="bo" type="submit">Liste des Etudiants</button></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
        </section>
</body>
</html>