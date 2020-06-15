# Presentation of the CD-ROM archiving application
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Accueil.png)

## Installation
1. Create storage space on your computer:
```
cd archivage_CD-ROM
```

2. Clone the project using the following command:
```
git clone https://github.com/VirgilG6/Archivage_CD-ROM
```


## Objective
### Background
During my training in BTS SIO (Computer Services to Organizations) option SLAM (Software Solutions and Business Applications), I had to carry out a PPE (Personal Supervised Project) on the archiving of CD-ROMs. For this EPP, I had to create a web application for archiving CD-ROMs.

### Object of the mission
The purpose of the mission was to create a web application for archiving CD-ROMs.


## Steps
### Step 1
The first step was to make the Association Entity Model (AEM), the Relational Model (RM) and the Physical Data Model (PDM).

#### Association Entity Model (AEM)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/MCD.png)

#### Relationship Model (RM)
```
Logiciels (Ref, Libellé)
Supports (Id, Libellé, #Ref)

```

#### Physical Data Model (PDM)
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/MPD.png)

### Step 2
After doing the Association Entity Model, the Relational Model and the Physical Data Model, we were able to create the database and do SQL tests.

#### Creation of the database
![alt text](https://github.com/VirgilG6/Archivage_CD-ROM/blob/master/assets/Im_BD.png)

#### SQL Testing
##### List everything in the software table
```
SELECT LibelleL
FROM tlogiciel
```

##### List software on support 1
```
SELECT LibelleL 
FROM tlogiciel
WHERE Ref=1
```

##### Count software from a support
```
SELECT count(LibelleL)
FROM tlogiciel where ref=1
```

##### Support without software
```
SELECT Libelles
FROM tsupport
WHERE Ids Not In (Select Ref From tlogiciel)
```

##### Display the number of software on each media
```
SELECT count(Ref) AS nombre_logiciels, Libelles, Ref
FROM tlogiciel l
JOIN tsupport s ON l.Ref = s.Ids
GROUP BY Ref
```

### Step 3


### Step 4



## Conclusion
### Difficulties encountered


### Skills
#### Mandatory situations
Participation in an IS evolution project (application and infrastructure solution focusing on the candidate's area of expertise).  
Handling of incidents and requests for assistance related to the candidate's area of specialty.  
Development of production and supply documents.

#### Skills implemented
A1.4.1, Project participation.  
A4.1.1, Proposal of an application solution.  
A4.1.2, Design or adaptation of the user interface of an application solution.  
A4.1.3, Database design or adaptation.  
A4.1.9, Preparation of technical documentation.  
A4.1.10, Writing of user documentation.

### How could the application be improved ?

