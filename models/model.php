<?php

require_once("../orm/orm.php");

jsonToArr();

//fonction qui retoune tous les user
function findAllUsers():array{
  return JsonToArr("users");
}



// fonction qui retourne les annees
function fillAllEtudiant():array{
  $users = findAllUsers();
  $Etudiants =[];
  foreach ($users as $user) { //authentification
    if ($user["role"]=="ROLE_ETUDIANT") {
      $Etudiants[]=$user;
    }
  }
  // $Etudiants=JsonToArr("etudiants");
  return $Etudiants ;
}

//fonction pour la connexion
function findEtuduantsById($etudiantId):array|null{
  $Etudiants =fillAllEtudiant(); //recuperer les user
  foreach ($Etudiants as $etudiant) { //authentification
    if ($etudiant["id"]==$etudiantId) {
      // var_dump($etudiant);
      // die(ok);
      return $etudiant;
    }
  }
   return null;
}

// fonction qui retourne les annees
function findAllAnnee():array{
  $Annees=JsonToArr("annees");
  return $Annees;
}

//fonction des classe
function findAllClasse(){
  $classes=JsonToArr("classe");
  return $classes;
}

//fonction des classe
function findClasse($idClasse):string|null{
  $classe=JsonToArr("classe");
  foreach ($classes as $key => $classe) {
    if ($classe['idC']==idClasse) {
      return $classe['libelleC'];
    }
  }
  return $null;
}

// fonction pour l'iD de la classe
function findClasseById($idClasse):array|null{
  $classes=JsonToArr("classe");
  foreach ($classes as $key => $classe) {
    if ($classe['idC']==$idClasse) {
      return $classe;
    }
  }
  return $null;
}

// fonction pour l'iD de la classe
function findEtudiantByClasseId($idClasse):array|null{
  $Etudiants =fillAllEtudiant();
  $Etu=[];
  foreach ($Etudiants as $etudiant) {
    if ($etudiant["Id_class"]) {
      $Etu[]=$etudiant;
    }
  }
      return $Etu;
}

// fonction qui retourne la fusion demande et etudiant
function findAllDemande():array{
  $Demandes=JsonToArr("Demandes");
  $DemandesEtu=[];
  foreach ($Demandes as $demande) { //recupere l'etudiantID
    $etudiantId=$demande['id_et'];
    $etudiant=findEtuduantsById($etudiantId);
    $classe=findClasseById($etudiant["Id_class"]);
    $merge=array_merge($classe,$etudiant); //merge classe et etudiant
    $DemandesEtu[]=array_merge($merge,$demande);
  }

  return $DemandesEtu;
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

//ajout classe
function addClasse(array $newClasse):void{
   arrayToJson($newClasse, "classe");
}

//ajout etudiant
function addEtudiant(array $newEtudiant):void{
  arrayToJson($newEtudiant, "users");
}



function getID(string $target){
return count(JsonToArr($target))+1;
}