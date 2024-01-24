
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.css">
    <title>new</title>
</head>
<body>
<section>
        <div class="Dashboard">
            <div class="infos">
            <div class="profil"><img src="img/X.png" alt=""></div>
            <h3>Prénom & Nom:<?= $_SESSION["userConnect"]["prenom"]." ". $_SESSION["userConnect"]["nom"]?></h3>
            <h3>Année: <?= $anneeEncours["libAs"]?></h3>
                  <h3>Classe: L2 Devweb</h3>
                  <h3>Role: <?= $_SESSION["userConnect"]["role"]?></h3>
            </div>
        
            <a href="<?=WEBROOT;?>/?action=show-demande"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-list "></span>Demande</a>
            <a href="<?=WEBROOT;?>"><span style="color: white;size: 100px;margin: 5% 3%;" class="fa fa-sign-out" ></span>Se Déconnecter</a>
        </div>
        <div class="prof-body">
            <div class="container">
                <h3>Annee Scolaire: 2023-2024</h3>
                <form class="Form2" method="post" action="<?=WEBROOT;?>">
                    <label style="margin-left: 3%;">Type</label>
                    <select name="type" id="">
                        <option value="Absence">Absence</option>
                        <option value="Suspension">Suspension</option>
                        <option value="Annulation">Annulation</option>
                    </select>
                    <button class="bout" type="submit" name="">OK</button>
                    <div>
                        <label style="margin-left: 3%;">Motif</label><br>
                        <textarea name="motif" id="" cols="50" rows="15"></textarea> 
                        <div>
                            <button class="bt" type="reset" name="">Annuler</button>
                            <button class="but" type="submit" name="action" value="form-add-demande">Envoyer</button>
                        </div>
                
                    </div>
                   
                    
                </form>
                 
    
            </div>
        </div>
    </section>
</body>
</html>