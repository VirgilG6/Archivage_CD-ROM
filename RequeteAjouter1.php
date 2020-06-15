<?php

    if ( ! isset($_GET['sup']) ) return; // Si le support n’est pas saisi, je renvoi  quand même une valeur (valeur nul)
  $sup    = $_GET['sup'] ; // valeurs à insérer

  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation des requêtes
  $Requete5 = "INSERT INTO tsupport ( LibelleS )
        VALUES ( '$sup');" ;

  $Resultat5 = mysqli_query ( $DataBase, $Requete5 )  or  die(mysqli_error($DataBase) ) ;

  //--- Déconnection de la base de données
  mysqli_close ( $DataBase ) ;

  header('Location: support.php'); // Permet la redirection après exécution de la requête 
  exit();
  
?>



