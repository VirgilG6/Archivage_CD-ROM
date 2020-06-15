# Présentation de l'application d'archivage des CD-ROM
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Accueil.png)

## Installation
1. Créer un espace de stockage sur votre ordinateur (exemple: archivage_CD-ROM):
```
cd archivage_CD-ROM
```

2. Cloner le projet en utilisant la commande suivante: 
```
git clone https://github.com/VirgilG6/Archivage_CD-ROM
```


## Objectif
### Contexte
Au cours de ma formation en BTS SIO (Services Informatiques aux Organisations) option SLAM (Solutions Logicielles et Applications Métiers), j’ai été amené à réaliser un PPE (Projet Personnel Encadré) sur l’archivage de CD-ROM. Pour ce PPE, j’ai dû réaliser une application web pour l’archivage des CD-ROM.

### Objet de la mission
L’objet de la mission était de créer une application web pour l’archivage des CD-ROM.


## Étapes
### Étape 1
La première étape, était de faire le Modèle Entité Association (MEA), le Modèle Relationnel (MR) et le Modèle Physique de Données (MPD).

#### Modèle Entité Association (MEA)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/MCD.png)

#### Modèle Relationnel (MR)
```
Logiciels (Ref, Libellé)
Supports (Id, Libellé, #Ref)

```

#### Modèle Physique de Données (MPD)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/MPD.png)

### Étape 2
Après avoir fait le Modèle Entité Association, le Modèle Relationnel et le Modèle Physique de Données, nous avons pu créer la base de données et faire des tests SQL.

#### Création de la base de données
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Im_BD.png)

#### Tests SQL
##### Lister tout ce qu’il y a dans la table logiciel
```
SELECT LibelleL
FROM tlogiciel
```

##### Lister les logiciels étant sur le support 1
```
SELECT LibelleL 
FROM tlogiciel
WHERE Ref=1
```

##### Compter les logiciels d’un support
```
SELECT count(LibelleL)
FROM tlogiciel where ref=1
```

##### Support sans logiciel
```
SELECT Libelles
FROM tsupport
WHERE Ids Not In (Select Ref From tlogiciel)
```

##### Afficher le nombre de logiciel de chaque support
```
SELECT count(Ref) AS nombre_logiciels, Libelles, Ref
FROM tlogiciel l
JOIN tsupport s ON l.Ref = s.Ids
GROUP BY Ref
```

### Étape 3


### Étape 4



## Conclusion
### Difficultés rencontrées
Les difficultés rencontrées sont 

### Compétences
#### Situations obligatoires
Participation à un projet d’évolution d’un SI (solution applicative et d’infrastructure portant prioritairement sur le domaine de spécialité du candidat).  
Prise en charge d’incidents et de demandes d’assistance liés au domaine de spécialité du candidat.  
Élaboration de documents relatifs à la production et à la fourniture.

#### Compétences mises en œuvre
A1.4.1, Participation à un projet.  
A4.1.1, Proposition d'une solution applicative.  
A4.1.2, Conception ou adaptation de l'interface utilisateur d'une solution applicative.  
A4.1.3, Conception ou adaptation d'une base de données.  
A4.1.9, Rédaction d'une documentation technique.  
A4.1.10, Rédaction d'une documentation d'utilisation.

### Comment l'application pourrait être amélioré ?

