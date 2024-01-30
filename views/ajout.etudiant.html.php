

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.etudiant.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>ajout etudiant</title>
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
            <a href="<?=WEBROOT;?>/?action=show-demande-ac">tous les Demandes</a>
        <?php endif ?>

        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_ETUDIANT"):?>
            <a href="<?=WEBROOT;?>/?action=show-demande">Mes Demandes</a>
        <?php endif ?>
        <?php if( $_SESSION["userConnect"]["role"]=="ROLE_RP"):?>
            <a href="<?=WEBROOT;?>/?action=liste-classe"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Liste classe</a>
            <a href="<?=WEBROOT;?>/?action=liste-etudiant"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Liste Etudiant</a>

        <?php endif ?>
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" >Se Déconnecter</a>
        </div>
        <div class="prof-body">
        <div class="container">
                <h3>AJOUTER UN ETUDIANT</h3>
                <form  method="post" action="<?=WEBROOT;?>">
                    <div class="box">
                        <label>Prénom</label>
                        <input  type="text" name="prenom">
                        <label style="margin-left: 10%;">Nom</label>
                        <input  type="text" name="nom">
                    </div>
                    <div class="box" >
                        <label >Login</label>
                        <input  style="margin-left: 4%;" type="text" name="login">
                        <label style="margin-left: 5%;">password</label>
                         <input  type="text" name="passwd">
                    </div>    
                    <div class="box">
                        <label style="margin-left: 2%;">Classe</label>
                        <select  name="libelleC" id="">
                            <option value=""></option>
                            <?php foreach ( $classelist as $value):?>
                                <option value="<?=$value["idC"]?>"><?=$value["libelleC"]?></option> 
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button class="but" type="submit" name="action" value="form-add-etudiant">Ajouter</button>
                </form>
                
            </div>
        </div>
    </section>
</body>
</html>

