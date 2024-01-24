
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEBROOT;?>/css/style.css">
    <title>Test 01</title>
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
                <a href="<?=WEBROOT;?>/?action=new-demande">
                <button class="button" type="submit" name="action" value="">Nouveau</button>
                </a>
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
                            <th>Date</th>
                            <th>Type</th>
                            <th>Etat</th>
                            <th>Motif</th>
                        </tr>
                    </thead>

                <?php 
            
                    
                    foreach ($DemandesEtu as  $value):?>
                    <tbody>
                            <tr>
                                <td><?=$value["date"]?></td>
                                <td><?=$value["type"]?></td>
                                <td><?=$value["etat"]?></td>
                                <td><?=$value["motif"]?></td>
                            </tr> 
                    </tbody>
                    <?php endforeach;?>

                </table>
            </div>
    </section>
</body>
</html>