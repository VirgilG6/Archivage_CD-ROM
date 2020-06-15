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

<head><center>

  <?php

  function  ConsulterBD ()
  {

global $option ;  // indiquer que la variable est une variable globale

if (  ($option == 'delete') or ($option == 'UPDATE1') )
  $IdCourant = $_GET['IdL'];
else  $IdCourant = -1 ;

echo "<br><br><br><br><br><br>";
  //--- Début de table en HTML
echo "<center>" ;
echo "<table class='container'>" ;
echo "<caption>Liste des Logiciels</caption>  ";
echo "<tr> <th>Id</th> <th>Libellé</th><th>Ref</th><th>Suppression</th> <th>Modification</th> </tr>" ;


  //--- Connection au SGBDR 
$DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation de la requête
$Requete = "Select * From tlogiciel ;" ;

  //--- Exécution de la requête (fin du script possible sur erreur ...)
$Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- Enumération des lignes du résultat de la requête
while (  $ligne = mysqli_fetch_array($Resultat)  )
{
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table 
  echo "<tr>\n" ;
  echo "<td align=center>" . $ligne['IdL']        . "</td>\n" ;

  if (  ($option == 'UPDATE1') )
  {
    if ( $IdCourant == $ligne['IdL'] )
    {
      echo "<form action='logiciel.php'>";
      // echo "<td><INPUT TYPE=TEXT NAME='IdL' Value='" . $ligne['IdL']    . "'></td>\n" ;
      echo "<td><INPUT class='inpt' TYPE=TEXT NAME='LibelleL' Value='" . $ligne['LibelleL'] . "'></td>\n" ;

      echo "<td><SELECT name='IdS'>";

      Function liste(){
           //--- Connection au SGBDR  &  //--- Ouverture de la base de données
        $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
        mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation de la requête
        $Requete2 = "Select IdS From tsupport ;";

  //--- Exécution de la requête (fin du script possible sur erreur ...)
        $Resultat2 = mysqli_query ( $DataBase, $Requete2 , MYSQLI_USE_RESULT )  or  die(mysql_error() ) ;

  //--- Enumération des lignes du résultat de la requête
        while (  $ligne = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  )

        {
          //--- Afficher les nom des personne dans une liste deroulante  
          echo "<option name='IdS'>".$ligne['IdS']."</option>";
        }
      }
      liste();

      echo "</SELECT></td>";

      // echo "<td><INPUT class='inpt' TYPE=TEXT NAME='Ref' Value='" . $ligne['Ref']    . "'></td>\n" ;
    }
    else
     { // echo "<td>" . $ligne['IdL']       . "</td>\n" ;
   echo "<td>" . $ligne['LibelleL']    . "</td>\n" ;
   echo "<td>" . $ligne['Ref'] . "</td>\n" ;
 }
}
else
     { // echo "<td>" . $ligne['IdL']       . "</td>\n" ;
   echo "<td>" . $ligne['LibelleL']    . "</td>\n" ;
   echo "<td>" . $ligne['Ref'] . "</td>\n" ;
 }

 if (  ($option == 'delete') )
 {
  if ( $IdCourant == $ligne['IdL'] )
  {
    echo "<td><A HREF='logiciel.php?option=delete2&IdL=" . $ligne['IdL'] . "'><button>Confirmer</button></A></td>";
    echo "<td><A HREF='logiciel.php'><button class='annul'>Annuler</A>";
    echo "</td>\n" ;
  }
}

else if (  ($option == 'UPDATE1') )
{
  if ( $IdCourant == $ligne['IdL'] )
  {
//      echo "<td><A HREF='Exo-07.php?OPTION=UPDATE2&Id=" . $ligne['Id'] . "'>Enregistrer</A></td>";
    echo "<td><INPUT TYPE=HIDDEN Name='option' Value='modif'>";
    echo "<INPUT TYPE=HIDDEN Name='IdL' Value='".$ligne['IdL']."'>
    <INPUT class='btnn' TYPE=submit Value='Enregistrer'>";
    echo "</form></td>";
    echo "<td><A HREF='logiciel.php'><button class='annul'>Annuler</button></A>";
    echo "</td>\n" ;
  }
}
else
  { echo "<td>" ."<a class='idsupp'  href='logiciel.php?option=delete&IdL=".$ligne['IdL']."'>Supprimer</a>". "</td>\n";
echo "<td>" ."<a class='idmodif' href='logiciel.php?option=UPDATE1&IdL=".$ligne['IdL']."'>Modifier</a>". "</td>\n";

// echo "<td>" ."<a class='iddetail'  href='test1.php?option=details&IdL=".$ligne['IdL']."'>Détail</a>". "</td>\n";
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

function  SupprimerBD (/* $IdRecherche*/ )
{

//-- récupérer le param 'Id'
  if ( ! isset($_GET['IdL']) ) return;

  $IdRecherche = $_GET['IdL'] ;

  echo "<center> <b> Suppression du logiciel '" . $IdRecherche ;
  echo "' de la Base de Donnees </b><br><br>" ;

  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Pr�paration de la requ�te
  $Requete2 = "Delete From tlogiciel Where IdL='". $IdRecherche ."' Limit 1;" ;

  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
  $Resultat2 = mysqli_query ( $DataBase, $Requete2 )  or  die(mysqli_error($DataBase) ) ;

  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
//  mysql_free_result ( $Resultat ) ;

  //--- D�connection de la base de donn�es
  mysqli_close ( $DataBase ) ;
}

function  UpdateBD()
{

  $IdL     = $_GET['IdL'    ] ; // params
  $log    = $_GET['LibelleL'   ] ;
  $ref    = $_GET['IdS'   ] ;


  //--- Connection au SGBDR
  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation de la requête
  $Requete3 =  "UPDATE tlogiciel SET LibelleL='".$log."' , Ref='".$ref."'  WHERE IdL=".$IdL.";" ;

  //--- Exécution de la requête (fin du script possible sur erreur ...)
  $Resultat3 = mysqli_query ( $DataBase, $Requete3 ) or die(mysqli_error($DataBase));

  //--- Déconnection de la base de données
  mysqli_close ( $DataBase ) ;
}

$option = 'RIEN' ; // par défaut

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
      case "modif" : UpdateBD()  ;    break;
      case "insert"  : AjouterBD(); break;
      default : echo "option inconnue !<br>";
    }
  }
}

ConsulterBD();
?>

<a class="aa" href="ajouterlogiciel.php">Ajouter un logiciel</a>
</center>


<br><br>
</BODY>
</HTML>