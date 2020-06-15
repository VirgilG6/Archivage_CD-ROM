    <?php

  $log    = $_GET['log'] ; // valeurs à insérer
  $IdS     = $_GET['IdS'] ;
  $mtn    = $_GET['mention'] ;
  $conc    = $log. ' - ' .$mtn ; // concaténation de $log et de $mention


  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation des requêtes

 if ( empty($mtn)){ // Si $mtn est vide je renvoi la requete 4

  $Requete4 = "INSERT INTO tlogiciel ( LibelleL, Ref )
        VALUES ( '$log','$IdS' );" ;

  $Resultat4 = mysqli_query ( $DataBase, $Requete4 )  or  die(mysqli_error($DataBase) ) ;
  }

  else{ // sinon je renvoi la requete 5

    $Requete5 = "INSERT INTO tlogiciel ( LibelleL, Ref )
        VALUES ( '$conc','$IdS' );" ;

  $Resultat5 = mysqli_query ( $DataBase, $Requete5 )  or  die(mysqli_error($DataBase) ) ;

  //--- Déconnection de la base de données
  mysqli_close ( $DataBase ) ;
  }

  header('Location: logiciel.php'); // Permet la redirection après exécution de la requête 
    exit();
?>
