#-------------------------------------------------------------------------------
#  Effacer la BD (si elle existait d�j�)
#
DROP DATABASE IF EXISTS BDPPE ;

#-------------------------------------------------------------------------------
#  Cr�er la BD
#

CREATE DATABASE BDPPE ;

#-------------------------------------------------------------------------------
#  Utiliser la BD
#

USE BDPPE ;

#-------------------------------------------------------------------------------
#  Cr�er la Table
#

CREATE TABLE tsupport
(	IdS		INT		NOT NULL 	PRIMARY KEY	AUTO_INCREMENT,
	LibelleS 	CHAR( 100 )	NOT NULL

) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_bin;


#-------------------------------------------------------------------------------
#  Cr�er la Table
#

CREATE TABLE tlogiciel
(	IdL		  INT		NOT NULL 	PRIMARY KEY	AUTO_INCREMENT,
	LibelleL  CHAR( 100 )	NOT NULL ,
    Ref       INT NOT NULL ,

    FOREIGN KEY (Ref) REFERENCES Tsupport(IdS) ON DELETE CASCADE

) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_bin;


INSERT INTO Tsupport(IdS,LibelleS)		
VALUES		( 0,''),
			( 1,'1 disquette 3 "1/4 - Word 2.0c'),
			( 2,'4 x 10 Disquette 3 "1/4 - Borland C++ 2.0'),
			( 3,'CD-R Perso n°75 - Half Life'),
			( 4,'CD-R Magazine Machin n°45 Avril 1996'),
			( 5,'Disque Dur Externe :/Jeux-Installation');

INSERT INTO Tlogiciel(LibelleL, Ref)
VALUES		( 'Word 2.0C', 				1 ),
			( 'Access 97',				0 ),
			( 'Bordland c++ 2.0', 		2 ),
			( 'UltraEdit-32 V6.20a VF',	4 ),
			( 'Half Life', 				3 ),
			( 'Patch HalfLife 1.1.1.0',	5 ),
			( 'Thief2 Demo',			4 );













































































































#-------------------------------------------------------------------------------

-- INSERT INTO Tsupport(LibelleS) VALUES ('1 disquette 3 "1/4 - Word 2.0c'),
-- 			('4 x 10 Disquette 3 "1/4'),
-- 			( 'CD-R Perso n°75' ),
-- 			( 'CD-R' ),
-- 			( 'Disque Dur Externe' );


-- INSERT INTO tlogiciel(LibelleL) VALUES ('Word 2.0C'),
-- 			('Access 97'),
-- 			( 'Bordland c++ 2.0' ),
-- 			( 'UltraEdit-32 V6.20a VF' ),
-- 			( 'Half Life' ),
-- 			( 'Patch HalfLife 1.1.1.0' ),
-- 			( 'Thief2 Demo' );
