<html>
<head>
  <title> PHP</title>
  <link rel="stylesheet" type="text/css" href="stylecons.css">
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

function Detail(){

  $Ref= $_GET['IdS'];

//--- D�but de table en HTML
  echo "<center>" ;
  echo "<table class='container'><br>" ;
  echo "<p class='txttab'> Logiciel(s) présent sur le support " .$Ref. "</p>" ;
  echo "<tr> <th> Id </th> <th> Libellé </th> <th> Ref </th></tr>" ;

  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Pr�paration de la requ�te
  $Requete = "Select * From tlogiciel where Ref=".$Ref.";" ;

  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- Enum�ration des lignes du r�sultat de la requ�te
  while (  $ligne = mysqli_fetch_array($Resultat)  )
  {
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table
    echo "<tr>\n" ;
    echo "<td>" . $ligne['IdL']       . "</td>\n";
    echo "<td>" . $ligne['LibelleL']       . "</td>\n" ;
    echo "<td>" . $ligne['Ref']       . "</td>\n" ;
  }


  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
  mysqli_free_result ( $Resultat ) ;

  //--- D�connection de la base de donn�es
  mysqli_close ( $DataBase ) ;

  //--- Fin de table en HTML
  echo "</form>";
  echo "</table>";
  echo "</center>" ;


}


  if (count($_GET) !=0)
{
  if (isset($_GET['option']))
  {
      $option = $_GET['option'] ;

      switch ( $option )
      {
        case "details"  : Detail(); break;
        default : echo "option inconnue !<br>";
      }
  }
}

?>
<a class="aa" href="support.php">Retour en arrière</a>
</center>


<br><br>
</BODY>
</HTML>
