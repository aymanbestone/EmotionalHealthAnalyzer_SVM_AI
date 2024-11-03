<?php
$db_host="localhost";
$db_name="exo13";
$db_user="root";
$db_pass="";

$civilite=array('H'=>'m.','F'=>'Mme.');
try{
    $db= new pdo (
  "mysql:host=$db_host;dbname=$db_name;charset=utf8",
  $db_user,
  $db_pass



    );
} catch ( Exception $e ){


die("vous avez une error de connexion au base de donne :".  $e->getMessage()  ) ;


}






#ici la connexion à la BDD


?>