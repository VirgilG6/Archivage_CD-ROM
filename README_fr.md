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

##### Support sans logiciel
```
SELECT Libelles
FROM tsupport
WHERE Ids Not In (Select Ref From tlogiciel)
```


### Étape 3
La troisième étape, était de faire l’organisation des pages et leur maquettage.

#### Organisation des pages
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Orga_pages.png)

#### Maquettage
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Maquette_1.png)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Maquette_2.png)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Maquette_3.png)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Maquette_4.png)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Maquette_5.png)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Maquette_6.png)

### Étape 4
La quatrième étape a été de faire les ajouts, les modifications et les suppressions de logiciel et de support.

#### Ajout logiciel
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/ajout_logi.png)

#### Modifier logiciel
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/modif_logi.png)

#### Supprimer logiciel
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/suppr_logi.png)

#### Ajout support
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/ajout_support.png)

#### Modifier support
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/modif_support.png)

#### Supprimer support
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/suppr_support.png)

#### Détails support
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/details_support.png)

### Étape 5
La dernière étape, a été de faire les statistiques.

#### Lister les logiciels étant sur le support voulu
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/list_logi_sur_support.png)

#### Compter les logiciels d’un support 
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/compt_logi.png)

#### Voir le nombre de logiciel de chaque support
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/voir_nbr_logi.png)

## Conclusion
### Difficultés rencontrées


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
L’application pourrait être amélioré par une meilleure interface et plus de statistiques.
