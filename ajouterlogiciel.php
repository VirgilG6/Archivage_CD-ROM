<html>
<head>
  <title> AJOUT </title>
  <link rel="stylesheet" type="text/css" href="stylecons.css">
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
<center>
<table class="container"><br><br><br>
<!-- <b> <h1>Ajout d'un logiciel</h1> </b> -->
<div class="div1">
	<h2>Ajouter un logiciel</h2>
	 <form action="RequeteAjouter2.php" >
   Saisir le nom du logiciel : <input type="text" name="log" value=""><br>
   <!-- Id du support choisi : <input type="text" name="IdS" value=""><br>
    -->
    Choix du support : <br><SELECT name='IdS'>
    <?php 

  Function liste(){

    
        //--- Connection au SGBDR  &  //--- Ouverture de la base de données
   $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
  mysqli_select_db ( $DataBase, "bdppe" ) ;
    
  //--- Préparation de la requête
  $Requete = "Select IdS,LibelleS From tsupport ;";
             
  //--- Exécution de la requête (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete , MYSQLI_USE_RESULT )  or  die(mysql_error() ) ;

  //--- Enumération des lignes du résultat de la requête
  while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  )
            
        {
          //--- Afficher les nom des personne dans une liste deroulante  
          echo "<option value='".$ligne['IdS']."'>".$ligne['LibelleS']."</option>";
        }
      }

      liste();
    ?>
    </SELECT><br>
    <br>

   Mention complementaire : <input type="text" name="mention" value=""><br>
   <input class="btn" type=submit value="Ajouter" >

 </form>
</div>

 <caption> <b> Listes des logiciels </b> </caption>
<tr> <td><strong>Id</strong></td><td><strong>Libelle</strong></td></tr><br>

 <?php

function ConsulterBD()
{

	//--- Connection au SGBDR

  $DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es
  mysqli_select_db ( $DataBase, "bdppe" ) ;
  $Requete = "Select * From tlogiciel";
  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
  $Resultat = mysqli_query ( $DataBase, $Requete )  or  die(mysqli_error($DataBase) ) ;

  //--- Enum�ration des lignes du r�sultat de la requ�te
  while (  $ligne = mysqli_fetch_array($Resultat)  )
  {
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table
    echo "<tr>\n" ;
    echo "<td>" . $ligne['IdL']       . "</td>\n" ;
    echo "<td>" . $ligne['LibelleL']       . "</td>\n" ;
    echo "</tr>\n" ;
  }

  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
  mysqli_free_result ( $Resultat ) ;


  //--- D�connection de la base de donn�es
  mysqli_close ( $DataBase ) ;

  }

if (count($_GET) !=0)
{
if (isset($_GET['option']))
{
    $option = $_GET['option'] ;

    switch ( $option )
    {
      case "delete"  : SupprimerBD(); break;
      case "modifier"  : UpdateBD(); break;
      // case "ajouter"  : AjouterBD(); break;
      case "insert"  : AjouterBD(); break;
      // case "update"  : echo "option = update !<br> "; break;
      default : echo "option inconnue !<br>";
    }
}
}

ConsulterBD();

 ?>



</center>
</table>
</body>
</html>
