<?php
// Tableau en json (ajout)

function arrayToJson(array $newdata, string $key){
    $dec=JsonToArr();
    $dec[$key][]=$newdata;
   $json=json_encode($dec);
  file_put_contents(BD, $json );


}
//Json en tableau
function JsonToArr(string $key=null):array{
    $json=file_get_contents(BD);
   $dec=json_decode($json,true);
   if( $key==null) return  $dec;
   return  $dec[$key];

//   echo"<pre>";
//     var_dump($dec["Demandes"]);
//   echo"</pre>";
//  die;


}

?>