


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.classe.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    <title>ajout classe</title>
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
                <!-- <div ><a href="liste.classe.html"><span style="margin: 1% 3%;font-size: 30px;cursor: pointer;color: black;" class="fa fa-arrow-circle-left"></a></span></div> -->
                <h3>AJOUTER UNE CLASSE </h3>
                <form method="post"  action="<?=WEBROOT;?>">
                    <div class="box">
                       <label for="">Nom de la classe</label><br>
                       <input type="text" name="libelle" id=""> 
                         <button class="but" type="submit" name="action" value="form-add-classe">Ajouter</button>

                    </div>
                 
                </form>
            </div>
        </div>
</section>
</body>
</html>