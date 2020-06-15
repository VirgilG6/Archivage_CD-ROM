<html>
<head>
  <title> PHP</title>
  <link rel="stylesheet" type="text/css" href="stylecons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <meta charset="utf-8">

</head>
<body>
  <nav>
	<ul class="menu">
		<li><a class="aaa" href="index.php">Accueil</a></li>
		<li><a class="aaa" href="logiciel.php">Table Logiciel</a></li>
		<li><a class="aaa" href="support.php">Table Support</a></li>
		<li><a class="aaa" href="stats.php">Statistiques</a></li>
	</ul>
	</nav>


<!  Envoyer l'entête d'un tableau HTML  !>
<!  avec une ligne de titres rappelant le nom des champs de la table de la base de données  !>
<head><center>

<?php
$option = "PRINT" ; 
  
function  ConsulterBD ()
{

global $option ;  // indiquer que la variable est une variable globale

  if (  ($option == 'delete')  Or ($option == 'UPDATE1') )
      $IdCourant = $_GET['IdS'];
    
  //else  $IdCourant = -1 ;

  echo "<br><br><br><br><br><br>";
  //--- Début de table en HTML
  echo "<center>" ;
  echo "<table class='container'>" ;
  echo "<caption>Liste des Supports</caption>  ";
  echo "<tr> <th>Id</th> <th>Libellé</th><th>Suppression</th> <th>Modification</th><th>Détails</th> </tr>" ;
  

  //--- Connection au SGBDR 
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation de la requête
  $Requete = "Select * From tsupport ;" ;
    
  //--- Exécution de la requête (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- Enumération des lignes du résultat de la requête
  while (  $ligne = mysqli_fetch_array($Resultat)  )
  {
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
    echo "<tr>\n" ;
    echo "<td align=center>" . $ligne['IdS']        . "</td>\n" ;

  if (  ($option == 'UPDATE1') )
  {
    if ( $IdCourant == $ligne['IdS'] )
    {
      echo "<form action='support.php'>";
      echo "<td><INPUT class='inpt' TYPE=TEXT NAME='sup' Value='" . $ligne['LibelleS'] . "'></td>\n" ;
    }
  else
    {
      echo "<td>" . $ligne['LibelleS']    . "</td>\n" ;
    }
  }
   else
     { 
      echo "<td>" . $ligne['LibelleS']    . "</td>\n" ;
    }

      if (  ($option == 'delete') )
  {
    if ( $IdCourant == $ligne['IdS'] )
    {
      echo "<td><A HREF='support.php?option=delete2&IdS=" . $ligne['IdS'] . "'><button>Confirmer</button></A></td>";
      echo "<td><A HREF='support.php'><button class='annul'>Annuler</button></A>";
        echo "</td>\n" ;
    }
  }

  else if (  ($option == 'UPDATE1') )
  {
    if ( $IdCourant == $ligne['IdS'] )
    {
      echo "<td><INPUT TYPE=HIDDEN Name='option' Value='UPDATE2'>";
      echo "<INPUT class='inpt' TYPE=HIDDEN Name='IdS' Value='".$ligne['IdS']."'>
      <INPUT class='btnn' TYPE=submit Value='Enregistrer'>";
      echo "</form></td>";
      echo "<td><A HREF='support.php'><button class='annul'>Annuler</button></A>";
        echo "</td>\n" ;
    }
  }
    else
  { echo "<td>" ."<a class='idsupp'  href='support.php?option=delete&IdS=".$ligne['IdS']."'>Supprimer</a>". "</td>\n";
    echo "<td>" ."<a class='idmodif' href='support.php?option=UPDATE1&IdS=".$ligne['IdS']."'>Modifier</a>". "</td>\n";
//    echo "<td>" ."<a class='iddetail'  href='detail.php?option=details&IdS=".$ligne['IdS']."'>Détail</a>". "</td>\n";
   echo "<td><a href='detail.php?option=details&IdS=".$ligne['IdS']."'><i class='fas fa-eye'></i></a></td>";
  }
    echo "</tr>\n" ;
  }

  //--- Libérer l'espace mémoire du résultat de la requête
  mysqli_free_result ( $Resultat ) ;

  //--- Déconnection de la base de données
  mysqli_close ( $DataBase ) ;  

  //--- Fin de table en HTML
  echo "</table>" ;
  echo "<br>" ;
  echo "</center>" ;
}

  function  SupprimerBD ()
{

//-- récupérer le param 'Id'
  if ( ! isset($_GET['IdS']) ) return;

    $IdRecherche = $_GET['IdS'] ;

  echo "<center> <b> Suppression du support'" . $IdRecherche ;
  echo "' de la Base de Donnees </b><br><br>" ;

  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Pr�paration de la requ�te
  $Requete2 = "Delete From tsupport Where IdS='". $IdRecherche ."' Limit 1;" ;

  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
  $Resultat2 = mysqli_query ( $DataBase, $Requete2 )  or  die(mysqli_error($DataBase) ) ;

  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
//  mysql_free_result ( $Resultat ) ;

  //--- D�connection de la base de donn�es
  mysqli_close ( $DataBase ) ;
}

function  UpdateBD()
{

  $IdS     = $_GET['IdS'    ] ; // params
  $sup    = $_GET['sup'   ] ;


  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "bdppe" ) ;
  
  //--- Préparation des requêtes
  $Requete = "UPDATE tsupport  SET  LibelleS='".$sup."' WHERE IdS=".$IdS.";" ;

  //--- Exécution de la requête (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete ) or die(mysqli_error($DataBase));

  //--- Déconnection de la base de données
  mysqli_close ( $DataBase ) ;

}



  if (count($_GET) !=0)
{
  if (isset($_GET['option']))
  {
      $option = $_GET['option'] ;

      switch ( $option )
      {
        case "delete"  : break;
        case "delete2"  : SupprimerBD(); break;
        case "UPDATE1" : break;
        case "UPDATE2" : UpdateBD()  ;    break;
        // case "details"  : Detail(); break;
        case "insert"  : AjouterBD(); break;
        default : echo "option inconnue !<br>";
      }
  }
}

ConsulterBD();


?>
<a class="aa" href="ajoutersupport.php">Ajouter un support</a>
</center>


<br><br>
</BODY>
</HTML>
