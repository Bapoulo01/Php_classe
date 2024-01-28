<?php

require_once('../models/model.php');

// $test=JsonToArr("Demandes");
// echo"<pre>";
// var_dump($test);
// echo"</pre>";
//  die;
session_start(); //demarrer la session



$anneeEncours=findAnneeEncours();

if (isset($_POST["send"])) {
    $userConnect=connexion($_POST["login"],$_POST["mdp"]);
    if( $userConnect!=null){
        $_SESSION["userConnect"]=$userConnect;  // authentification 
       if ($userConnect["role"]=="ROLE_ETUDIANT") {
        //  require_once('../views/show.demande.html.php');
        header("location:".WEBROOT."/?action=show-demande");
       }elseif ($userConnect["role"]=="ROLE_AC") {
        // header("location:".WEBROOT."/?action=show-demande-ac");
        $demandeAC= findAllDemande();
                 require_once('../views/demande.ac.html.php');

       }
       elseif ($userConnect["role"]=="ROLE_RP") {
        $_SESSION["userConnect"]=$userConnect;
        $classelist=findAllClasse();
        require_once('../views/lister.classe.html.php');
       }
    }else{
     $message="Mot de pass Incorrect";
         require_once('../views/loging.html.php');

        header("location".WEBROOT);
    }
    

}else
if(isset($_REQUEST["action"])){
    if ($_REQUEST["action"]!="send" && !isset($_SESSION["userConnect"]) ) {
        header("location".WEBROOT);
    // require_once('../views/loging.html.php');
    exit;
}
    if ($_GET["action"]=="show-demande") {
        $DemandesEtu= findDemandeByEtudiantAndAnnee( $_SESSION["userConnect"]["id"],$anneeEncours["idA"]);
        require_once('../views/show.demande.html.php');
    }elseif($_REQUEST["action"]=="new-demande"){
       
     require_once("../views/form.demande.html.php");
    }
    elseif($_REQUEST["action"]=="liste-classe"){
        $classelist=findAllClasse();
        require_once('../views/lister.classe.html.php');
       }
       elseif($_REQUEST["action"]=="liste-etudiant"){
            $etudiantlist=fillAllEtudiant();
        require_once('../views/lister.etudiant.html.php');
       }
       elseif($_REQUEST["action"]=="new-classe"){
        require_once('../views/ajout.classe.html.php');
       }
       elseif($_REQUEST["action"]=="new-etudiant"){
       
        require_once('../views/ajout.etudiant.html.php');
       }

    elseif($_REQUEST["action"]=="show-demande-ac"){
        $DemandeAc= findAllDemande();
        require_once("../views/demande.ac.html.php");
       }
       elseif($_REQUEST["action"]=="deconnect "){
        unset( $_SESSION["userConnect"]);
        session_destroy();
        header("location".WEBROOT);
       }

      if ($_REQUEST  ["action"]=="form-add-demande") {
           // traitement d'ajout
        $newDemande=[
                "idD"=>uniqid(),
                "type"=>$_POST["type"],
                "etat"=>"en cours",
                "date"=>date("d/m/Y"),
                "id_An"=>$anneeEncours["idA"],
                "motif"=>$_POST["motif"],
                "id_et"=>$_SESSION["userConnect"]["id"],
            ];
            addDemande($newDemande);
             $_SESSION ["DemandesEtu"][]="newDemande"; //ajouter a la liste de demandes

            header("location:".WEBROOT."/?action=show-demande");
        // require_once('../views/show.demande.html.php');
    
    }
    if ($_REQUEST  ["action"]=="form-add-classe") {
        // traitement d'ajout
     $newClasse=[
        "idC"=>uniqid(),
        "libelleC"=>$_POST["libelle"]
      
         ];
         addClasse($newClasse);
 
         header("location:".WEBROOT."/?action=liste-classe");
     // require_once('../views/show.demande.html.php');
 
 }

 if ($_REQUEST  ["action"]=="form-add-etudiant") {
    // traitement d'ajout
    $newEtudiant=[
    "id"=>uniqid(),
    "nom"=>$_POST["nom"],
    "prenom"=>$_POST["prenom"],
    "login"=>$_POST["login"],
    "mdp"=>$_POST["passwd"],
    "role"=>"ROLE_ETUDIANT"
  
     ];
     addEtudiant( $newEtudiant);

     header("location:".WEBROOT."/?action=liste-etudiant");

}
}
     //Page par defaut
else {
  
    require_once('../views/loging.html.php');
}

?>