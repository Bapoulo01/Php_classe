<?php

require_once("../orm/orm.php");

jsonToArr();

//fonction qui retoune tous les user
function findAllUsers():array{
  return JsonToArr("users");
}



// fonction qui retourne les annees
function fillAllEtudiant():array{
 
  $Etudiants =[];
  $users = findAllUsers();
  foreach ($users as $user) { //authentification
    if ($user["role"]=="ROLE_ETUDIANT") {
      $Etudiants[]=$user;
    }
  }
  // $Etudiants=JsonToArr("etudiants");
  return $Etudiants ;
}

// fonction qui retourne les annees
function findAllAnnee():array{
  $Annees=JsonToArr("annees");
  return $Annees;
}

// fonction qui retourne les annees
function findAllDemande():array{
  $Demandes=JsonToArr("Demandes");
  return $Demandes;
}

//fonction pour la connexion
function connexion(string $login,string $mdp):array|null{
  $users = findAllUsers(); //recuperer les user
foreach ($users as $user) {
  if ($user["login"]==$login && $user["mdp"]==$mdp) {
    return $user;
  }
}
   return null;
}

//fonction pour la connexion
// function findEtuduantsById(int $etudiantId,):array{
//   $Etudiants =fillAllEtudiant(); //recuperer les user
//   foreach ($Etudiants as $etudiant) { //authentification
//     if ($etudiant["id_et"]==$etudiantId) {
//       return $etudiant;
//     }
//   }
//    return null;
// }

//fonction pour les annees en cours
function findAnneeEncours():array{
    $Annees=findAllAnnee();
foreach ($Annees as $annee) {
  if ($annee["etat"]==1) {
    return $annee;
  }
}
   return null;
}

//fonction pour demande de l'etudiant
function findDemandeByEtudiantAndAnnee(int $etudiantId,int $anneeId):array|null{
    $Demandes= findAllDemande();
    $DemandesEtu=[];
foreach ($Demandes as $demande) {
  if ($demande["id_et"]==$etudiantId && $demande["id_An"]==$anneeId) {
    $DemandesEtu[]=$demande;
  }
}
   return  $DemandesEtu ;
}

//ajout demande
function addDemande(array $newDemande):void{
  arrayToJson($newDemande, "Demandes");
}

?>
