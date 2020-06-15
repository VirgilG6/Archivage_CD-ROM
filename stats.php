<html>
<head>
	<title> Statistiques </title>
	<link rel="stylesheet" type="text/css" href="stylecons.css">
	<meta charset="utf-8">
</head>
<body>
	<nav>
		<ul class="menu">
			<li><a class="aaa" href="index.php">Accueil</a></li>
			<li><a class="aaa" href="logiciel.php">Table Logiciel</a></li>
			<li><a class="aaa" href="support.php">Table Support</a></li>
			<li><a class="aaa" href="Stats.php">Statistiques</a></li>
		</ul>
	</nav>

	<!  Envoyer l'entête d'un tableau HTML  !>
	<!  avec une ligne de titres rappelant le nom des champs de la table de la base de données  !>
	<center><table class="container"><br><br><br><br>

		<h1> Requete </h1>

		<?php
		echo "<form>";
		echo "<p>Lister les logiciels etant sur le support voulu</p><SELECT name='numsup'>";

		Function liste(){
           //--- Connection au SGBDR  &  //--- Ouverture de la base de données
			$DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
			mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation de la requête
			$Requete2 = "Select IdS,LibelleS From tsupport ;";

  //--- Exécution de la requête (fin du script possible sur erreur ...)
			$Resultat2 = mysqli_query ( $DataBase, $Requete2 , MYSQLI_USE_RESULT )  or  die(mysql_error() ) ;

  //--- Enumération des lignes du résultat de la requête
			while (  $ligne = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  )

			{
          //--- Afficher les nom des personne dans une liste deroulante  
				echo "<option value='".$ligne['IdS']."'>".$ligne['LibelleS']."</option>";
			}
		}
		liste();

		echo "</SELECT><br><br>";
		echo "<input class='btn' type='submit' value='Valider'<br>";
		echo "</form>";


		echo "<form>";
		echo "<p>Compter les logiciels du support voulu</p><SELECT name='numsup2'>";

		Function liste2(){
           //--- Connection au SGBDR  &  //--- Ouverture de la base de données
			$DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de données
			mysqli_select_db ( $DataBase, "bdppe" ) ;

  //--- Préparation de la requête
			$Requete2 = "Select IdS,LibelleS From tsupport ;";

  //--- Exécution de la requête (fin du script possible sur erreur ...)
			$Resultat2 = mysqli_query ( $DataBase, $Requete2 , MYSQLI_USE_RESULT )  or  die(mysql_error() ) ;

  //--- Enumération des lignes du résultat de la requête
			while (  $ligne = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  )

			{
          //--- Afficher les nom des personne dans une liste deroulante  
				echo "<option value='".$ligne['IdS']."'>".$ligne['LibelleS']."</option>";
			}
		}
		liste2();

		echo "</SELECT><br><br>";
		echo "<input class='btn' type='submit' value='Valider'<br>";
		echo "</form>";
		


		echo "<p><strong>Voir le nombre de logiciel de chaque support</strong></p>";
		echo "<A HREF='stats.php?option=requete'><input class='btn' type='submit' value='Afficher'></input></A>";
		

		function Function1()
		{
			if (! isset($_GET['numsup'])) return;

			$num  = $_GET['numsup'] ;

			echo "<hr color='black'>";

			echo "<tr> <td><strong>Id logiciel</strong></td><td><strong>Nom logiciel</strong></td><td><strong>Ref Support</strong></td></tr><br>";

			echo "<p>Liste des Logiciels sur le support " .$num.    "</p>";
  //--- Connection au SGBDR

			$DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es

			mysqli_select_db ( $DataBase, "bdppe" ) ;


			$Requete2 = 'Select * From tlogiciel 
			WHERE Ref="'.$num.'"';

  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
			$Resultat2 = mysqli_query ( $DataBase, $Requete2 )  or  die(mysqli_error($DataBase) ) ;

  //--- Enum�ration des lignes du r�sultat de la requ�te
			while (  $ligne = mysqli_fetch_array($Resultat2)  )
			{
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table
				echo "<tr>\n" ;
				echo "<td>" . $ligne['IdL']       . "</td>\n" ;
				echo "<td>" . $ligne['LibelleL']  . "</td>\n" ;
				echo "<td>" . $ligne['Ref']       . "</td>\n" ;
				echo "</tr>\n" ;
			}


  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
			mysqli_free_result ( $Resultat2 ) ;


  //--- D�connection de la base de donn�es
			mysqli_close ( $DataBase ) ;
		}
		
		function Function2(){

			if (! isset($_GET['numsup2'])) return;

			$num2  = $_GET['numsup2'] ;

			echo "<hr color='black'>";

			echo "<td><strong>Nombre de Logiciels</strong></td>";

  //--- Connection au SGBDR

			$DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es

			mysqli_select_db ( $DataBase, "bdppe" ) ;


			$Requete3 = 'Select count(LibelleL)
			from tlogiciel where Ref="'.$num2.'"';

  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
			$Resultat3 = mysqli_query ( $DataBase, $Requete3 )  or  die(mysqli_error($DataBase) ) ;

  //--- Enum�ration des lignes du r�sultat de la requ�te
			while (  $ligne = mysqli_fetch_array($Resultat3)  )
			{
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table

				echo "<p>Nombre logiciel sur le Support " .$num2.    "</p>";
				echo "<tr>\n" ;
				echo "<td>" . $ligne['count(LibelleL)']       . "</td>\n" ;

				echo "</tr>\n" ;
			}

  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
			mysqli_free_result ( $Resultat3 ) ;


  //--- D�connection de la base de donn�es
			mysqli_close ( $DataBase ) ;
		}


		function Function3()
		{
			echo "<hr color='black'>";
			echo "<td><strong>Nombre de Logiciel(s)</strong></td><td><strong>Nom du support</strong></td><td><strong>Ref</strong></td>";

  //--- Connection au SGBDR

			$DataBase = mysqli_connect ( "localhost" , "root" , "" ) ;

  //--- Ouverture de la base de donn�es

			mysqli_select_db ( $DataBase, "bdppe" ) ;


			$Requete3 = 'SELECT count(Ref) AS nombre_logiciels, LibelleS, Ref
			FROM tlogiciel l
			JOIN tsupport s ON l.Ref = s.Ids
			GROUP BY Ref
			';

  //--- Ex�cution de la requ�te (fin du script possible sur erreur ...)
			$Resultat3 = mysqli_query ( $DataBase, $Requete3 )  or  die(mysqli_error($DataBase) ) ;

  //--- Enum�ration des lignes du r�sultat de la requ�te
			while (  $ligne = mysqli_fetch_array($Resultat3)  )
			{
    //--- Afficher une ligne du tableau HTML pour chaque enregistrement de la table

				echo "<tr>\n" ;
				echo "<td>" . $ligne['nombre_logiciels']       . "</td>\n" ;
				echo "<td>" . $ligne['LibelleS']       . "</td>\n" ;
				echo "<td>" . $ligne['Ref']       . "</td>\n" ;

				echo "</tr>\n" ;
			}

  //--- Lib�rer l'espace m�moire du r�sultat de la requ�te
			mysqli_free_result ( $Resultat3 ) ;


  //--- D�connection de la base de donn�es
			mysqli_close ( $DataBase ) ;
		}



		if (isset($_GET['numsup'])){
			Function1();
		}

		if (isset($_GET['numsup2'])){
			Function2();
		}

		if (count($_GET) !=0)
		{
			if (isset($_GET['option']))
			{
				$option = $_GET['option'] ;

				switch ( $option )
				{
					case "requete"  : Function3(); break;
					default : echo "option inconnue !<br>";
				}
			}
		}

		?>

	</center>

	<br><br>
</BODY>
</HTML>

